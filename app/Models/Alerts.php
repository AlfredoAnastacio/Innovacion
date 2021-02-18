<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class Alerts extends Model
{
    protected $table = 'alerts';


    protected $fillable = [
        'user_id','alert_type','name'
    ];


 


private static function insertDB($user_id,$alert,$name) 
{
    

    DB::table('alerts')->insert([
        ['user_id'=> $user_id,
        'alert_type' => $alert,      
        'name' => $name,
        'created_at' => Carbon::now(),
    ],


        ]);


}


public static function investmentAlert($user_id,$refers)
{
    $user = User::where('user_id',$user_id)->first();
    $last = Investment::where('user_id',$user_id)->latest()->first();
    
    if($last != NULL)
    {
        
        $last = $last->created_at->toDateString();
        $date = Carbon::now()->diffInDays($last) ;

        $query = Alerts::where('user_id',$user_id)->where('alert_type','=','Sin invertir')->first();
        if($query != NULL){
            Alerts::where('user_id',$user_id)->where('alert_type','=','Sin invertir')->delete();
        }
        
        
        if($date >= 7 && count($refers[1]) < 2)
        {
            $query = Alerts::where('user_id',$user_id)->where('alert_type','=','Sin referidos')->first();

            if($query==NULL)
            {
                self::insertDB($user_id,'Sin referidos',$user->username);

            }
            
        }
        
        

        else{
            Alerts::where('user_id',$user_id)->where('alert_type','=','Sin referidos')->delete();
        }
        
        
    }

    else {
        
        $date_created = $user->created_at->toDateString();
        $date = Carbon::now()->diffInDays($date_created) ;
        $query = Alerts::where('user_id',$user_id)->where('alert_type','=','Sin invertir')->first();
         if($date >= 7 && $query == NULL)
         {
            
             self::insertDB($user_id,'Sin invertir',$user->username);
             
         }

     }

    



}
public static function comprobantAlert($user_id)
{
    $user = User::where('user_id',$user_id)->first();
    self::insertDB($user_id,'Revisar comprobante',$user->username);
   
}

}
