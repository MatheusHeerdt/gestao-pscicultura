<?php

namespace App\Repositories;

use App\Models\Tank;
use Prettus\Repository\Eloquent\BaseRepository;

class TankRepository extends BaseRepository
{

    public function model()
    {
     return Tank::class;
    }
}
