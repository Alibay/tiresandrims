<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    const TYPE_COUNTRY = 'COUNTRY';
    const TYPE_REGION = 'REGION';
    const TYPE_CITY = 'CITY';

    public static $types = [
        self::TYPE_COUNTRY,
        self::TYPE_REGION,
        self::TYPE_CITY,
    ];
}
