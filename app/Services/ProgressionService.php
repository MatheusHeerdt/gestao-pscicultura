<?php

namespace App\Services;

use App\Repositories\FishRepository;
use App\Repositories\ProgressionRepository;
use App\Repositories\TankRepository;

class ProgressionService
{

    /** @var ProgressionRepository $progressionCotroller @
     */
    private $progressionRepository;

    /** @var ProgressionService $progressionService @
     */
    private $progressionService;

    /** @var FishRepository $fishRepository @
     */
    private $fishRepository;

    /** @var TankRepository $tankRepository @
     */
    private $tankRepository;
    public function __construct()
    {
        $this->progressionRepository = app(ProgressionRepository::class);
        $this->fishRepository = app(FishRepository::class);
        $this->tankRepository = app(TankRepository::class);
        $this->progressionService = app(ProgressionService::class);
    }

    /**
     * @param array $input
     * @return array
     */
    public function calculateProgression(array $input): array
    {
        $tank = $this->tankRepository->find($input['tank_id']);
        $fish = $tank->fish();
        dd($input, $tank, $fish);

        return $input;
    }

}
