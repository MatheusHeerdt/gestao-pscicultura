<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fish extends Model
{
    use SoftDeletes;
    protected $table = 'fish';

    protected $fillable = [
        'user_id',
        'type',
        'quantity',
        'age',
        'size',
        'name',
    ];

    public static function rules()
    {
        return [
          'type' => 'required|int',
          'quantity' => 'required|int',
          'age' => 'required|int',
          'size' => 'required|int',
          'name' => 'required|string'
        ];
    }
}
