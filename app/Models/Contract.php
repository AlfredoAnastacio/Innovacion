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
    public static function getRefers($user_id, $op, $contract) {

        $refers[1] = User::where('sponsor_id',$user_id)->where('contract', $contract)->get();  // Referidos directos (Nivel 1)
        // dd($refers[1]);

        $total_refers = count($refers[1]);
        // dd($total_refers);
        $aux=1;
        for ($i=2;$i<8;$i++) { //Referidos de nivel 2 a 7   LO QUE ESTABA
        // for ($i=2;$i<15;$i++) { //Referidos de nivel 2 a 14

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
        // dd($refers);
        return $refers;
    }

    public static function iterator($refers,$op) {
        $all_refers=collect();
        // dd($refers);
        foreach($refers as $query) {
            if (isset($query->user_id)) {
                // dd($query->user_id);
                // dd($op);
                $refer = $query->user_id;

                $refer_admin = User::where('sponsor_id',$refer)->first();
                $refer_admin = ($refer_admin == true) ? 1 : 0 ;
                // dd($refer_admin);
                if ($refer_admin == 1 && $op == 2) {
                    continue;
                } else {
                    // dd('hol');
                    $refers = User::where('sponsor_id',$refer)->get();
                    $all_refers = $all_refers->concat($refers);
                    // dd($all_refers);
                }
            }
        }
        return $all_refers;
    }
}
