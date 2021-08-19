<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use SoftDeletes;

    protected $table = 'contracts';

    protected $fillable = [
        'user_id', 'contract', 'range'
    ];

    //Obtiene los Referidos del usuario
    public static function getRefers($user_id, $op, $id) {
        // dd($id);
        // $refers[1] = User::where('sponsor_id',$user_id)->get();  // Referidos directos (Nivel 1)
        $refers[1] = User::where('sponsor_id',$user_id)->where('contract', $id)->get();  // Referidos directos (Nivel 1)
        // dd($refers[1]);

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

    public static function iterator($refers,$op) {
        $all_refers=collect();
        foreach($refers as $query) {
            if (isset($query->user_id)) {

                $refer = $query->user_id;

                $refer_admin = User::where('user_id',$refer)->first()->sponsor_id;
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
}
