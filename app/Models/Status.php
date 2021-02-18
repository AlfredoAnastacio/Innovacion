<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_id','range','state'
    ];

    public static function getRange($request,$range_str=NULL)
    {
        foreach ($request as $range)
        {

            $range_str =$range;
        }


        switch ($range_str)
        {
            case 'Plata':
                $range = 1;
                break;

            case 'Oro':
                $range = 2;
                break;

            case'Platino':
                $range = 3;
                break;
            case 'Diamante':
                $range = 4;
                break;
            default:
                $range = 1;
                break;
        }
        return $range;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','user_id');
    }

    public function Range()
    {
        return $this->hasOne(Range::class, 'range_id','range');
    }

}
