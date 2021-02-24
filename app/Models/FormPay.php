<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormPay extends Model
{
    protected $table = 'form_pays';
    protected $fillable = [
        'user_id','entity','number','type','document'
    ];
}
