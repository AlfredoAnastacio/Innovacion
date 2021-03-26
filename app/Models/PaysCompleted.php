<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaysCompleted extends Model
{
    protected $table = 'pays_completed';


    protected $fillable = [
        'user_id','level_pay','name','total_pay','status_pay','range_id','tree'
    ];


    public static function getPays($user_id,$range_id,$op)
    {

        $pays = new PaysCompleted();
        $verified= $pays->where('user_id',$user_id)->where('range_id')->exists();


        if(!$verified)
    {

        
        switch ($op) {
            case 1:
                
                
                $pays_completed= $pays->where('user_id',$user_id)->where('range_id',$range_id)->get();
                return $pays_completed;
            
            case 2:
                $pays_completed= $pays->where('user_id',$user_id)->where('range_id',$range_id)->get();
                $total_pays = count($pays_completed);
                return $total_pays;
            
            default:
                return 0;
        break;
    }
}

    return 0;
    }
}
