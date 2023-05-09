<?php

namespace App\Repositories;

use App\Models\Tank;
use Illuminate\Support\Collection;
use Prettus\Repository\Eloquent\BaseRepository;

class TankRepository extends BaseRepository
{

    public function model()
    {
        return Tank::class;
    }

    /**
     * @param $user
     * @return Collection
     */
    public function getUserTanks($user): Collection
    {
        return $this
            ->where('user_id', $user->id)
            ->pluck('name', 'id');
    }
}
