<?php

namespace App\Repositories;

use App\Models\Progression;
use Prettus\Repository\Eloquent\BaseRepository;

class ProgressionRepository extends BaseRepository
{
    //
    /**
     * @return string
     */
    public function model(): string
    {
        return Progression::class;
    }
}
