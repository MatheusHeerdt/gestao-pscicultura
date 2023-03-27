<?php

namespace App\Services;

use App\Repositories\FishRepository;
use App\Repositories\ProgressionRepository;
use App\Repositories\TankRepository;

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

    public function getUserTanksTotal()
    {
        return null;
    }

    /**
     * @return
     */
    public function getUserPiscesTotal()
    {
        return null;
    }

    public function getUserPiscesGrowth()
    {
        return null;
    }

    public function getUserPiscesGrowthAverage()
    {
        return null;
    }

    public function getUserPiscesAgeAverage()
    {
        return null;
    }


}
