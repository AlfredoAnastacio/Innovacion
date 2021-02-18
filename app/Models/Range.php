<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Range extends Model
{
    protected $table = 'ranges';

    protected $fillable = [
        'range_id','range','total_investment'
    ];

}
