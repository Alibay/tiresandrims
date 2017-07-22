<?php

namespace App\Modules\Shop\Helpers;

class PriceHelper
{
    const MODE_UP = 'UP';
    const MODE_DOWN = 'DOWN';
    const MODE_NEAR = 'NEAR';

    public static $mode = [
        self::MODE_UP,
        self::MODE_DOWN,
        self::MODE_NEAR,
    ];

    public static function round (int $price, int $module, $mode = self::MODE_NEAR )
    {
        $down = ((int) ($price / $module) * $module);
        if ($down == $price || $mode == self::MODE_DOWN)
            return $down;

        if ($mode == self::MODE_UP)
            return $price + $module;

        return $price < ($down + $module / 2) ? $down : $down + $module;
    }
}