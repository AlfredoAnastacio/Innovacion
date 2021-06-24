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
        'name',
        'email',
        'password',
        'city',
        'document',
        'country',
        'rol',
        'telephone',
        'user_id',
        'username',
        'lastname',
        'rol',
        'nivel_tree',
        'code_tree',
        'range',
        'state',
        'sponsor_id',
        'refer_by_admin',
        'tree_sponsor'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
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
