<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public static $assignTypes = [
        'PRODUCT',
        'RIM',
        'TIRE',
        'DETAIL_BRAND',
        'DETAIL_MODEL', 
        'MODIFICATION',
        'GENERATION',
        'MODEL',
        'BRAND',
        'USER'
    ];
}
