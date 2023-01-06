<?php

namespace App\Repositories;

use App\Models\Fish;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Interface FishRepositoryRepository.
 *
 * @package namespace App\Repositories;
 */
class FishRepository extends BaseRepository
{
    //
    public function model()
    {
       return Fish::class;
    }
}
