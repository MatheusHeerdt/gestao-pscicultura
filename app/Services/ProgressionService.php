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
    }

    /**
     * @param array $input
     * @return array
     */
    public function handleProgression(array $input): array
    {
        $tank = $this->tankRepository->find($input['tank_id']);
        $fish = $tank->fish;
        $input['fish_id'] = $tank->fish_id;

        return $this->calculateProgression($input, $fish);
    }

    public function calculateProgression($input, $fish)
    {
        $size = $fish->size;
        $quantity = $fish->quantity;

        if ($size <= 5) {
            $input['ration_type'] = 1;
            $input['daily_meals'] = 5;
            $total = (($quantity * $size) / 100) * (14);
        } elseif ($size <= 10) {
            $input['ration_type'] = 2;
            $input['daily_meals'] = 4;
            $total = (($quantity * $size) / 100) * (8);
        } elseif ($size <= 20) {
            $input['ration_type'] = 2;
            $input['daily_meals'] = 3;
            $total = (($quantity * $size) / 100) * (5);
        } elseif ($size <= 50) {
            $input['ration_type'] = 2;
            $input['daily_meals'] = 3;
            $total = (($quantity * $size) / 100) * (4.5);
        } elseif ($size <= 150) {
            $input['ration_type'] = 3;
            $input['daily_meals'] = 3;
            $total = (($quantity * $size) / 100) * (3.4);
        } elseif ($size <= 250) {
            $input['ration_type'] = 4;
            $input['daily_meals'] = 3;
            $total = (($quantity * $size) / 100) * (3);
        } elseif ($size <= 400) {
            $input['ration_type'] = 5;
            $input['daily_meals'] = 2;
            $total = (($quantity * $size) / 100) * (2.2);
        } elseif ($size <= 600) {
            $input['ration_type'] = 5;
            $input['daily_meals'] = 2;
            $total = (($quantity * $size) / 100) * (1.4);
        } elseif ($size <= 800) {
            $input['ration_type'] = 5;
            $input['daily_meals'] = 2;
            $total = (($quantity * $size) / 100);
        } elseif ($size <= 1300) {
            $input['ration_type'] = 5;
            $input['daily_meals'] = 2;
            $total = (($quantity * $size) / 100) * (0.8);
        } else {
            $input['ration_type'] = 5;
            $input['daily_meals'] = 2;
            $total = (($quantity * $size) / 100) * (0.6);
        }

        $water_temperature = $input['water_temperature'];

        if ($water_temperature < 16) {
            $input['ration_type'] = 0;
            $input['daily_meals'] = 0;
            $input['daily_total'] = 0;
        } else if ($water_temperature <= 20) {
            $input['daily_total'] = ($total / 100) * 60;
        } else if ($water_temperature <= 24) {
            $input['daily_total'] = ($total / 100) * 80;
        } else if ($water_temperature <= 29) {
            $input['daily_total'] = $total;
        } else if ($water_temperature <= 32) {
            $input['daily_total'] = ($total / 100) * 80;
        } else {
            $input['ration_type'] = 0;
            $input['daily_meals'] = 0;
            $input['daily_total'] = 0;
        }

        $input['meal_total'] = $input['daily_total'] / $input['daily_meals'];
        return $input;
    }

}
