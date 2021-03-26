<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Commission extends Model
{
    protected $table = 'commissions';


    protected $fillable = [
        'commission_level','user_id','refer_id','total','created_at','commission_type', 'tree'
    ];



    /*
    *
    *
    *
    * Método para calcular las comisiones del usuario logeado
    *
    */


    public static function selfCommissions($investments,$levels,$user_id,$tree){

         
        $range_id = Status::where('user_id',$user_id)->first()->range;
        $range = Range::where('range_id',$range_id)->first();    
        $range_name = $range->range;
       
       

        for ($i=2; $i<=$levels ; $i++) {
                $commission = self::getLevelCommission($i);
                if($commission != 0){
                    foreach ($investments[$i] as $refer){

                        if(isset($refer->pay)){
                            
                            
                            $verified_commission = Commission::where('refer_id','=',$refer->user_id)->where('user_id','=',$user_id)->where('tree',$tree)->exists();
                            $verified_commission_level = Commission::where('refer_id','=',$refer->user_id)->where('user_id','=',$user_id)->where('commission_level',$i)->where('tree',$tree)->exists();

                            
                            $level_inversion = Investment::where('user_id',$refer->user_id)->where('state',$range_name)->exists();
                          
                            $refer_by_admin = Refer::where('user_id',$refer->user_id)->first();

                            if(isset($refer_by_admin->refer_by_admin))
                            {
                                $refer_by_admin = $refer_by_admin->refer_by_admin;
                            }
                            
                            
                            if($level_inversion)
                            {
                                
                                $level_inversion = Investment::where('user_id',$refer->user_id)->where('state',$range_name)->first()->state;
                            }
                            else{
                                $level_inversion = false;
                            }

                           
                            if(!$verified_commission && $range_name == $level_inversion && $refer_by_admin!=1  && !$verified_commission_level)
                            {
                                
                                
    
                                self::insertDB($user_id,$i,$refer->pay*$commission,$refer->user_id,0,$tree);
                            }
                            
                            
                        }
                        
                    }
                }
            }

            
    }



private static function insertDB($user_id,$level,$total,$refer_id,$type,$tree)  // Método para insertar comisiones en la Base de Datos
{
    DB::table('commissions')->insert([
        ['user_id'=> $user_id,
        'commission_level' => $level,
        'total' => $total,
        'refer_id' => $refer_id,
        'commission_type' => $type,
        'tree' => $tree,
         'created_at' => Carbon::now(),
         
    ],


        ]);


}


private static function getLevelCommission($level)  //Obtiene el porcentaje de comisión para calcular compensación para el usuario

{

      switch ($level) {
         
            case '2':
                return 0.75;


            case '4':
                return 0.125;


            case '7':
                return 0.078125;

            default:
            return 0;


    }
}

public static function amountCommission($id)

{

    return Commission::where('user_id',$id)->where('commission_type',0)->sum('total');
  

}


public function user()
{
    return $this->belongsTo(User::class, 'user_id','user_id');
}

   }


