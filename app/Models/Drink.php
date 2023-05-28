<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'empty_bottle_weight',
        'shot_weight',
        'shot_remaining',
    ];
}
