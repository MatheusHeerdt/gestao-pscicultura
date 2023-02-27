<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Progression extends Model
{
    use SoftDeletes;
    protected $table = 'fish_progression';

    protected $fillable = [
        'user_id',
        'fish_id',
        'tank_id',
        'daily_meals',
        'meal_total',
        'daily_total',
        'water_temperature',
    ];

    /**
     * @return string[]
     */
    public static function rules(): array
    {
        return [
            'daily_meals' => 'required|int',
            'meal_total' => 'required|int',
            'daily_total' => 'required|int',
            'water_temperature' => 'required|int'
        ];
    }

    public function fish() : HasOne
    {
        return $this->hasOne(Fish::class,'id', 'fish_id');
    }

    public function tank() : HasOne
    {
        return $this->hasOne(Tank::class,'id', 'tank_id');
    }

    public function user() : HasOne
    {
        return $this->hasOne(User::class,'id', 'user_id');
    }
}
