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
        $input['size'] = $fish->size;

        return $this->calculateProgression($input, $fish);
    }


    /**
     * @param $input
     * @param $fish
     * @return mixed
     */
    public function calculateProgression($input, $fish): mixed
    {
        $size = $fish->size;

        $rationInfo = $this->getRationInfo($size);
        $input['ration_type'] = $rationInfo['type'];
        $input['daily_meals'] = $rationInfo['meals_per_day'];
        $total = (($fish->quantity * $size) / 1000) * $rationInfo['multiplier'];

        $water_temperature = $input['water_temperature'];

        if ($water_temperature < 16) {
            $input['ration_type'] = 0;
            $input['daily_meals'] = 0;
            $input['daily_total'] = 0;
        } else {
            $input['daily_total'] = $this->getDailyTotal($total, $water_temperature);
        }

        if ($input['daily_meals'] !=0){
            $input['meal_total'] = $input['daily_total'] / $input['daily_meals'];
        }else{
            $input['meal_total'] = 0;
        }

        return $input;
    }

    private function getDailyTotal($total, $water_temperature)
    {
        if ($water_temperature <= 20) {
            return ($total / 100) * 60;
        } elseif ($water_temperature <= 24) {
            return ($total / 100) * 80;
        } elseif ($water_temperature <= 29) {
            return $total;
        } elseif ($water_temperature <= 32) {
            return ($total / 100) * 80;
        } else {
            return 0;
        }
    }

    /**
     * @param $size
     * @return int[]
     */
    private function getRationInfo($size): array
    {
        $info = array(
            array('type' => 1, 'meals_per_day' => 5, 'max_size' => 5, 'multiplier' => 14),
            array('type' => 2, 'meals_per_day' => 4, 'max_size' => 10, 'multiplier' => 8),
            array('type' => 2, 'meals_per_day' => 3, 'max_size' => 20, 'multiplier' => 5),
            array('type' => 2, 'meals_per_day' => 3, 'max_size' => 50, 'multiplier' => 4.5),
            array('type' => 3, 'meals_per_day' => 3, 'max_size' => 150, 'multiplier' => 3.4),
            array('type' => 4, 'meals_per_day' => 3, 'max_size' => 250, 'multiplier' => 3),
            array('type' => 5, 'meals_per_day' => 2, 'max_size' => 400, 'multiplier' => 2.2),
            array('type' => 5, 'meals_per_day' => 2, 'max_size' => 600, 'multiplier' => 1.4),
            array('type' => 5, 'meals_per_day' => 2, 'max_size' => 800, 'multiplier' => 1),
            array('type' => 5, 'meals_per_day' => 2, 'max_size' => 1300, 'multiplier' => 0.8),
            array('type' => 5, 'meals_per_day' => 2, 'max_size' => PHP_INT_MAX, 'multiplier' => 0.6),
        );

        foreach ($info as $item) {
            if ($size <= $item['max_size']) {
                return $item;
            }
        }

        return $info[0];
    }


//    public function calculateProgression($input, $fish)
//    {
//        $size = $fish->size;
//        $quantity = $fish->quantity;
//
//        if ($size <= 5) {
//            $input['ration_type'] = 1;
//            $input['daily_meals'] = 5;
//            $total = (($quantity * $size) / 100) * (14);
//        } elseif ($size <= 10) {
//            $input['ration_type'] = 2;
//            $input['daily_meals'] = 4;
//            $total = (($quantity * $size) / 100) * (8);
//        } elseif ($size <= 20) {
//            $input['ration_type'] = 2;
//            $input['daily_meals'] = 3;
//            $total = (($quantity * $size) / 100) * (5);
//        } elseif ($size <= 50) {
//            $input['ration_type'] = 2;
//            $input['daily_meals'] = 3;
//            $total = (($quantity * $size) / 100) * (4.5);
//        } elseif ($size <= 150) {
//            $input['ration_type'] = 3;
//            $input['daily_meals'] = 3;
//            $total = (($quantity * $size) / 100) * (3.4);
//        } elseif ($size <= 250) {
//            $input['ration_type'] = 4;
//            $input['daily_meals'] = 3;
//            $total = (($quantity * $size) / 100) * (3);
//        } elseif ($size <= 400) {
//            $input['ration_type'] = 5;
//            $input['daily_meals'] = 2;
//            $total = (($quantity * $size) / 100) * (2.2);
//        } elseif ($size <= 600) {
//            $input['ration_type'] = 5;
//            $input['daily_meals'] = 2;
//            $total = (($quantity * $size) / 100) * (1.4);
//        } elseif ($size <= 800) {
//            $input['ration_type'] = 5;
//            $input['daily_meals'] = 2;
//            $total = (($quantity * $size) / 100);
//        } elseif ($size <= 1300) {
//            $input['ration_type'] = 5;
//            $input['daily_meals'] = 2;
//            $total = (($quantity * $size) / 100) * (0.8);
//        } else {
//            $input['ration_type'] = 5;
//            $input['daily_meals'] = 2;
//            $total = (($quantity * $size) / 100) * (0.6);
//        }
//
//        $water_temperature = $input['water_temperature'];
//
//        if ($water_temperature < 16) {
//            $input['ration_type'] = 0;
//            $input['daily_meals'] = 0;
//            $input['daily_total'] = 0;
//        } else if ($water_temperature <= 20) {
//            $input['daily_total'] = ($total / 100) * 60;
//        } else if ($water_temperature <= 24) {
//            $input['daily_total'] = ($total / 100) * 80;
//        } else if ($water_temperature <= 29) {
//            $input['daily_total'] = $total;
//        } else if ($water_temperature <= 32) {
//            $input['daily_total'] = ($total / 100) * 80;
//        } else {
//            $input['ration_type'] = 0;
//            $input['daily_meals'] = 0;
//            $input['daily_total'] = 0;
//        }
//
//        $input['meal_total'] = $input['daily_total'] / $input['daily_meals'];
//        return $input;
//    }

}
