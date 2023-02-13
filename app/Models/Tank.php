<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tank extends Model
{
    protected $table = 'tanks';
    protected $fillable = [
        'user_id',
        'name',
        'volume',
        'fish_id'
    ];
}
