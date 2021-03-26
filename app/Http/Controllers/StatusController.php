<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Refer;
use App\Models\Investment;
use App\Models\Commission;
use App\Models\AlertsPays;
use App\Models\Status;
use Illuminate\Support\Facades\DB;
use App\Models\PaysCompleted;

use App\Models\Range;

use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{


    /**
     * Método para actualizar el estado del usuario, según su Rango y Estado de pagos
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

       if($id == Auth::id() || Auth::user()->isAdmin())
       {

           $update_status = new Status();
           $investments = new Investment();
           $commissions = new Commission();
           $refers_list = new Refer();
           $sponsorTree = Refer::where('sponsor_id',$id)->orderBy('tree_sponsor','desc')->first();


             
               
               $user = $update_status->where('user_id',$id)->first();
               $range =  (int)$user->range;
               $range_name=Range::where('range_id',$range)->first();
               
               
           if($sponsorTree != NULL)
           {
            $sponsorTree = $sponsorTree->tree_sponsor;
               for($t=1; $t <= $sponsorTree; $t++)
               {
                   $refers =$refers_list->getRefers($id,0,$t);
                   
                   AlertsPays::referAmountLevel($refers,$id,$t);
                }
                
                //$total_refers = $refers_list->getRefers($id,1);
                $iterator=0;
                
                $pay = $investments->where('user_id','=',$id)->where('state',$range_name->range)->latest()->exists();
                
                
                
                //Valida si realizó el pago para activarlo, al igual que si el rango aumenta
                if($pay)
                {
                    
                    
                    
                    
                    if(count($refers) == 7 && count($refers[7])==128)
                    {
                        
                        
                        foreach($refers[7] as $user)
                        {
                            $investment = Investment::where('user_id',$user->user_id)->where('state','=',$range_name->range)->where('tree',$sponsorTree)->exists();
                            if($investment)
                            {
                                $iterator++;
                            }
                        }
                        
                        if($iterator == 128)
                        { 
                            
                            $user_id=Auth::id();
                            $verified_pay = PaysCompleted::where('user_id',$user_id)->where('level_pay','Nivel 7')->where('range_id',$range)->where('tree',$sponsorTree)->exists();
                            if($verified_pay)
                            {
                                
                                if($range>=5)
                                {
                                    $range=5;
                                }
                                
                                else{
                                    
                                    $range = $range+1;
                                }
                                
                                
                                
                                
                                
                                
                                $range_name=Range::where('range_id',$range)->first();
                                if($range < 5)
                                {
                                    $investments->user_id = $user_id;
                                    $investments->pay = $range_name->total_investment;
                                    $investments->state = $range_name->range;
                                    $investments->save();
                                    
                                }
                                
                                $refers_list->where('sponsor_id','=',$id)->where('tree_sponsor',$sponsorTree)->delete();
                                $commissions->where('user_id','=',$id)->where('tree',$sponsorTree)->delete();
                                
                            }
                            
                            
                            
                        }
                        
                        
                        
                    }
                    
                }
            }
                $range_str = $range;
                DB::table('status')->where('user_id','=',$id)
                ->update(
                ['state' => "Activo",'range' => $range_str]


            );
                if(Auth::user()->isAdmin())
                {
                    return redirect('admin/users');
                }

        else{
            DB::table('status')->where('user_id','=',$id)
            ->update(
            ['state' => "Inactivo"]);

        }

   
    }

        return redirect()->action('UserController@show',$id);
       
    }

}
