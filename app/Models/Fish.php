<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
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

    /**
     * @return string[]
     */
    public static function rules(): array
    {
        return [
          'type' => 'required|int',
          'quantity' => 'required|int',
          'age' => 'required|int',
          'size' => 'required|int',
          'name' => 'required|string'
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
     * @return BelongsTo
     */
    public function tank() : BelongsTo
    {
        return $this->belongsTo(Fish::class,'id', 'tank_id');
    }
}
