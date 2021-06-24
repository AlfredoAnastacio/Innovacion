<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LiderTreeRange extends Model
{
    protected $table = 'lider_tree_ranges';

    public $timestamps = false;

    protected $fillable = [
        'user_id', 'tree', 'range', 'code_tree'
    ];
}
