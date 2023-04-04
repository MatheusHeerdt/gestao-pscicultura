<?php

namespace App\Repositories;

use App\Models\Fish;
use App\Models\User;
use Illuminate\Support\Collection;
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

    /**
     * @param Int $userId
     * @return mixed
     */
    public function getTotalByUser(Int $userId): int
    {
        return (int)$this
            ->selectRaw('SUM(quantity) as fish_total')
            ->where('user_id', $userId)
            ->value('fish_total');

    }

    /**
     * @param int $userId
     * @return Collection
     */
    public function getPiscesGrowthByUser(int $userId) : Collection
    {
        return $this
            ->selectRaw('AVG(size) as size_avg,
            DATE_FORMAT(created_at, "%d/%m/%Y") as created_date,
            DATE_FORMAT(created_at, "%m") as created_month')
            ->where('user_id', $userId)
            ->groupBy('id')
            ->get();
    }

    /**
     * @param int $userId
     * @return int
     */
    public function getPiscesGrowthAverageByUser(int $userId): int
    {
        return (int)$this
            ->selectRaw('AVG(size) as size_avg')
            ->where('user_id', $userId)
            ->value('size_avg');

    }

    /**
     * @param int $userId
     * @return int
     */
    public function getPiscesAgeAverageByUser(int $userId): int
    {
        return (int)$this
            ->selectRaw('AVG(age) as age_avg')
            ->where('user_id', $userId)
            ->value('age_avg');

    }
}
