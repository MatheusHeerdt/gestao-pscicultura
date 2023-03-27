<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tank extends Model
{
    use SoftDeletes;
    protected $table = 'tanks';

    protected $fillable = [
        'user_id',
        'name',
        'volume',
        'fish_id'
    ];

    /**
     * @return string[]
     */
    public static function rules(): array
    {
        return [
            'name' => 'required|string',
            'volume' => 'required|int',
            'fish_id' => 'required|int'
        ];
    }

    /**
     * @return HasOne
     */
    public function user() : HasOne
    {
        return $this->hasOne(User::class,'id', 'user_id');
    }

    /**
     * @return HasOne
     */
    public function fish() : HasOne
    {
        return $this->hasOne(Fish::class,'id', 'fish_id');
    }
}
