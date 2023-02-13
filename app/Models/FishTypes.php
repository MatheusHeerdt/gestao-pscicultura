<?php

namespace App\Models;

class FishTypes
{
    public const TILAPIA = 0;

    /**
     * @return int[]
     */
    public static function getLabels(): array
    {
        return [
            self::TILAPIA => 'Tilápia',
        ];
    }

    /**
     * @return int|string
     */
    public static function getLabel(int $type = self::TILAPIA): int|string
    {
        return self::getLabels()[$type];
    }

}
