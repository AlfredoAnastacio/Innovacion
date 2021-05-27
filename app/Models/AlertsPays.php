<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class AlertsPays extends Model
{
    protected $table = 'alerts_pays';


    protected $fillable = [
        'user_id','level_pay','name','total_pay','status_pay','range_id','tree'
    ];


    public static function referAmountLevel($refers,$user_id,$tree)
    {

        $iterator=0;
        $name = User::where('user_id',$user_id)->first();
        $range = Status::where('user_id',$user_id)->first();
        $range_id = $range->range;
        $range_name = Range::where('range_id',$range_id)->first()->range;

        if(isset($refers[2]))
        {
            $verified_alert =  AlertsPays::where('user_id','=',$user_id)->where('level_pay','=','Nivel 2')->where('range_id','=',$range_id)->where('tree',$tree)->exists();
            $verified_pay =  PaysCompleted::where('user_id','=',$user_id)->where('level_pay','=','Nivel 2')->where('range_id','=',$range_id)->where('tree',$tree)->exists();


            if(!$verified_alert && !$verified_pay)
            {
                foreach($refers[2] as $user)
                 {
                     $investment = Investment::where('user_id',$user->user_id)->where('state',$range_name)->latest()->exists();

                    if($investment)
                     {
                           $iterator++;
                      }

                    }


                    if(count($refers[2]) == 4 && $iterator ==4)

                    {

                        $rent = Commission::where('user_id',$user_id)->where('commission_level',2)->where('tree',$tree)->sum('total');
                        self::insertDB($user_id,'Nivel 2',$rent,$name->name,'Sin pagar',$range_id,$tree);

                    }


            }



        }



        if(isset($refers[4]))
        {

            $iterator=0;
            $verified_alert =  AlertsPays::where('user_id','=',$user_id)->where('level_pay','=','Nivel 4')->where('range_id','=',$range_id)->where('tree',$tree)->exists();
            $verified_pay =  PaysCompleted::where('user_id','=',$user_id)->where('level_pay','=','Nivel 4')->where('range_id','=',$range_id)->where('tree',$tree)->exists();
         if(!$verified_alert && !$verified_pay)
            {


            foreach($refers[4] as $user)
            {
                $investment = Investment::where('user_id',$user->user_id)->where('state',$range_name)->latest()->exists();
                if( $investment)
                {
                    $iterator++;
                }

            }


                if(count($refers[4]) == 16 && $iterator == 16)
                {

                    $rent = Commission::where('user_id',$user_id)->where('commission_level',4)->where('tree',$tree)->sum('total');
                    self::insertDB($user_id,'Nivel 4',$rent,$name->name,'Sin pagar',$range_id,$tree);

                }


            }


        }


        if(isset($refers[7]))
        {
            $iterator=0;
            $verified_alert =  AlertsPays::where('user_id','=',$user_id)->where('level_pay','=','Nivel 7')->where('range_id','=',$range_id)->where('tree',$tree)->exists();
            $verified_pay =  PaysCompleted::where('user_id','=',$user_id)->where('level_pay','=','Nivel 7')->where('range_id','=',$range_id)->where('tree',$tree)->exists();
        if(!$verified_alert && !$verified_pay)
            {


            foreach($refers[7] as $user)
            {
                $investment = Investment::where('user_id',$user->user_id)->where('state',$range_name)->latest()->exists();

                if($investment)
                {
                    $iterator++;
                }
            }


                if(count($refers[7]) == 128 && $iterator == 128)
                {

                    $rent = Commission::where('user_id',$user_id)->where('commission_level','=','7')->where('tree',$tree)->sum('total');
                    self::insertDB($user_id,'Nivel 7',$rent,$name->name,'Sin pagar',$range_id,$tree);

                }

            }
        }


    }

    private static function insertDB($user_id,$level,$total_pay,$name,$status,$range_id,$tree) {

        DB::table('alerts_pays')->insert([
            [
                'user_id'=> $user_id,
                'level_pay' => $level,
                'total_pay' => $total_pay,
                'name' => $name,
                'status_pay' => $status,
                'tree'  => $tree,
                'range_id'=>$range_id,
                'created_at' => Carbon::now(),
            ],
        ]);
    }

    // Función para obtener la rentabilidad
    public static function getRentabilidad($id, $t) {

        // return AlertsPays::where('user_id',$id)->sum('total_pay');
        return AlertsPays::where('user_id',$id)->where('tree', $t)->sum('total_pay');
    }

}
