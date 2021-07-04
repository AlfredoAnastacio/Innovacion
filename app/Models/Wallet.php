<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        'user_id', 'wallet'
    ];

    protected $table ='wallet_payment_channel';
}