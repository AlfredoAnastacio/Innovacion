<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    protected $table = 'users';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id', 'sponsor_id', 'contract', 'name', 'rol', 'email', 'document','telephone', 'wallet', 'password'
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
