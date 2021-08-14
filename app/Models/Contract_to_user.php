<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract_to_user extends Model
{
    use SoftDeletes;

    protected $table = 'contract_to_users';

    protected $fillable = [
        'user_id', 'sponsor_id', 'contract'
    ];
}
