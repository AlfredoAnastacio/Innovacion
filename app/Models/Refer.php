<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Refer extends Model
{
    protected $table = 'refers';

    protected $fillable = [
        'sponsor_id','user_id','refer_by_admin','tree_sponsor'
    ];

    public $timestamps = false;

    //Obtiene los Referidos del usuario
    public static function getRefers($user_id,$op,$tree) {

        $refers[1] = Refer::where('sponsor_id',$user_id)->where('tree_sponsor',$tree)->with('user')->get();  // Referidos directos (Nivel 1)

        $total_refers = count($refers[1]);
        $aux=1;
        // for ($i=2;$i<8;$i++) { //Referidos de nivel 2 a 7   LO QUE ESTABA
        for ($i=2;$i<15;$i++) { //Referidos de nivel 2 a 14

            $refers[$i] = collect();
            $refers[$i] = self::iterator($refers[$aux],$op);

            $total_refers = $total_refers + count($refers[$i]);
            $aux++;
            if ($refers[$i]->isEmpty()) {
                unset($refers[$i]);
                break;
            }
        }
        if ($op==1) {
            return $total_refers;
        }
        return $refers;
    }

    public static function iterator($refers,$op) { //Método auxiliar para traer los referidos usando la relación con User
        $all_refers=collect();
        foreach($refers as $query) {
            if (isset($query->user_id)) {

                $refer = $query->user_id;

                $refer_admin = Refer::where('user_id',$refer)->first()->refer_by_admin;
                if ($refer_admin == 1 && $op == 2) {
                    continue;
                } else {
                    $refers = Refer::where('sponsor_id',$refer)->where('tree_sponsor',1)->with('user')->get();
                    $all_refers = $all_refers->concat($refers);
                }
            }
        }
        return $all_refers;
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id','user_id');
    }

    public function sponsor() {
        return $this->belongsTo(User::class, 'sponsor_id','user_id');
    }
}
