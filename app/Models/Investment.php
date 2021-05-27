<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Investment extends Model {

    protected $table = 'investments';

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id','state','pay','tree','created_at'
    ];

    //Retorna una colección de los referidos y sus inversiones
    public static function getInvestments($refers,$levels) {
        if (isset($refers) && isset($levels)) {
            // dd($levels);
            for ($i=1 ; $i <= $levels; $i++) {
                $investment[$i]= Investment::iterator($refers[$i]);
            }
        }

        return $investment;
    }

    private static function iterator($refers) {//Método para recorrer los referidos y sus inversiones, retorna cada inversión que haya hecho

        $pays=collect();

        foreach ($refers as $refer) {
            // dd($refers);
            if(isset($refer->user_id)){
                $range_id = Status::where('user_id',$refer->user_id)->first()->range;
                // $range_id = Status::where('user_id', 1111)->first()->range;
                // dd($range_id);
                $range = Range::where('range_id',$range_id)->first();
                $range_name = $range->range;
                $investments = Investment::where('user_id','=',$refer->user_id)->where('state',$range_name)->with('user')->latest()->get();
                $pays = $pays->concat($investments);
            }
        }

        return $pays;
    }

    public static function amountInvestment($investments, $t) {
        // dd($investments);
        $total = 0;
        if ($investments != NULL){
            $total = $investments->pay;
        }

        return $total;
    }

    public function user() {
        return $this->belongsTo(User::class,'user_id','user_id');
    }
}
