<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TreeRanges extends Model
{
    use SoftDeletes;
    protected $table = 'lider_tree_ranges';

    protected $fillable = [
        'user_id','tree','range'
    ];

    public $timestamps = false;
}
