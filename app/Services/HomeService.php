<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\FishRepository;
use App\Repositories\ProgressionRepository;
use App\Repositories\TankRepository;
use Illuminate\Support\Collection;

class HomeService
{
    /** @var ProgressionRepository $progressionRepository  */
    private ProgressionRepository $progressionRepository;

    /** @var FishRepository $fishRepository @
     */
    private FishRepository $fishRepository;

    /** @var TankRepository $tankRepository @
     */
    private TankRepository $tankRepository;

    public function __construct()
    {
        $this->progressionRepository = app(ProgressionRepository::class);
        $this->fishRepository = app(FishRepository::class);
        $this->tankRepository = app(TankRepository::class);

    }

    /**
     * @param User $user
     * @return int
     */
    public function getUserTanksTotal(User $user): int
    {
        return $user->tanks()->count();
    }

    /**
     * @param int $userId
     * @return int
     */
    public function getUserPiscesTotal(int $userId): int
    {
        return $this->fishRepository->getTotalByUser($userId);
    }

    /**
     * @param int $userId
     * @return array
     */
    public function getUserPiscesGrowth(int $userId): array
    {
        $pisces =  $this->fishRepository->getPiscesGrowthByUser($userId);
        $piscesArray = null;
        foreach ($pisces as $fish) {
            $piscesArray['pisces_growth'][] = $fish->size_avg;
            $piscesArray['created_date'][] = $fish->created_date;
            $piscesArray['created_month'][] = $fish->created_month;
        }

        return $piscesArray;
    }

    public function getUserPiscesGrowthAverage($userId)
    {
        return $this->fishRepository->getPiscesGrowthAverageByUser($userId);
    }

    /**
     * @param int $userId
     * @return null
     */
    public function getUserPiscesAgeAverage(int $userId)
    {
        return $this->fishRepository->getPiscesAgeAverageByUser($userId);
    }


}
