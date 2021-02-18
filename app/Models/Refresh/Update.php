<?php
namespace App\Models\Refresh;
use Illuminate\Database\Eloquent\Model;
use App\Models\Refer;
use App\Models\Investment;
use App\Models\Commission;
use App\Models\Range;
use App\Models\Status;
use App\Models\AlertsPays;
use App\Models\Alerts;
use App\Models\PaysCompleted;
use Illuminate\Support\Facades\DB;



class Update extends Model
{



public static function refreshCommission($user_id){


    $user = $user_id;
    $refers = Refer::getRefers($user,2);
    
    if(Refer::where('user_id',$user)->first() == NULL)
    {
        Refer::create(['user_id'=> $user, 'sponsor_id' => 1]);
    }

   
    $levels = count($refers);  //Cantidad de Referidos por nivel
    $investments = Investment::getInvestments($refers,$levels);



    if(isset($investments) && isset($refers))
    {


          
            Commission::selfCommissions($investments,$levels,$user);
          


    }


    self::refreshStatus($user_id);

}


private static function refreshStatus($user_id)
{
         $update_status = new Status();
           $investments = new Investment();
           $commissions = new Commission();
           $refers_list = new Refer();

           $user = $update_status->where('user_id',$user_id)->first();
           $range =  (int)$user->range;
           $range_name=Range::where('range_id',$range)->first();

           $refers =$refers_list->getRefers($user_id,0);
         
           if($user_id !=1 )
           {

               AlertsPays::referAmountLevel($refers,$user_id);
           }
           
           $total_refers = $refers_list->getRefers($user_id,1);
           $iterator=0;

           $pay = $investments->where('user_id','=',$user_id)->where('state',$range_name->range)->latest()->exists();



            //Valida si realizó el pago para activarlo, al igual que si el rango aumenta
            if($pay)
            {
              
                


                if(count($refers) == 7 && count($refers[7])==128)
                {
                    
                    
                    foreach($refers[7] as $user)
                    {
                        $investment = Investment::where('user_id',$user->user_id)->where('state','=',$range_name->range)->latest()->exists();
                       if( $investment )
                       {
                            $iterator++;
                       }
                    }
                    
                    if($iterator == 128)
                    {

                       

                        $range_name=Range::where('range_id',$range)->first();
                        $verified_pay = PaysCompleted::where('user_id',$user_id)->where('level_pay',$range_name->range)->where('range_id',$range)->exists();

                        if($verified_pay)
                        {

                            if($range>=5)
                            {
                                $range=5;
                            }
    
                            else{
    
                                $range = $range+1;
                            }

                            if($range < 5)
                            {
                                $investments->user_id = $user_id;
                                $investments->pay = $range_name->total_investment;
                                $investments->state = $range_name->range;
                                $investments->save();
    
                            }
    

                            
                            
                            $refers_list->where('sponsor_id','=',$user_id)->delete();
                            $commissions->where('user_id','=',$user_id)->delete();

                        }
                        

                    }
                   


                }

                $range_str = $range;
                DB::table('status')->where('user_id','=',$user_id)
                ->update(
                ['state' => "Activo",'range' => $range_str]


            );
               
        }

        else{
            DB::table('status')->where('user_id','=',$user_id)
            ->update(
            ['state' => "Inactivo"]);

        }
    

       
    

 
        self::refreshAlert($user_id);


}


private static function refreshAlert($user_id)

{
    if($user_id != 1)
    {

        $refers = Refer::getRefers($user_id,0);

        Alerts::investmentAlert($user_id,$refers);
    }
}

}