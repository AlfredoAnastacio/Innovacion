<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'name', 'email', 'password','document','rol','telephone','user_id','username','lastname','rol'
    ];


    public function refers(){

        return $this->hasMany(Refer::class,'sponsor_id','user_id');
    }

    public function investments(){

        return $this->hasMany(Investment::class,'user_id','user_id');
    }

    public function commissions(){

        return $this->hasMany(Commission::class,'user_id','user_id');
    }

    public function range(){

        return $this->belongsTo(Status::class,'user_id','user_id');
    }


}
