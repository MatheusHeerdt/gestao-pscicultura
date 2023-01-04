<?php

namespace App\Models;

class FishTypes
{
        public const TILAPIA = 0;

    public function getLabels()
    {
     return [self::TILAPIA];
    }
}
