<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    const TYPE_INTEGER = 'INTEGER';
    const TYPE_FLOAT = 'FLOAT';
    const TYPE_STRING = 'STRING';
    const TYPE_ENUM = 'ENUM';

    public static $types = [
        self::TYPE_INTEGER,
        self::TYPE_FLOAT,
        self::TYPE_STRING,
        self::TYPE_ENUM,
    ];
}
