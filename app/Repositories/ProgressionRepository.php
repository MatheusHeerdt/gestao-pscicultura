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

    /**
     * @param $userId
     * @return mixed
     */
    public function getPiscesGrowthByUser($userId)
    {
        return $this
        ->selectRaw('AVG(size) as size_avg,
            DATE_FORMAT(created_at, "%d/%m/%Y") as created_date,
            DATE_FORMAT(created_at, "%m") as created_month')
        ->where('user_id', $userId)
        ->groupBy('id')
        ->get();
    }
}
