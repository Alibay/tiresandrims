<?php

namespace App\Modules\Car\Models;

use Illuminate\Database\Eloquent\Model;

class Rim extends Model
{
    const TYPE_NAME = 'RIM';

    protected $table = 'car_rims';
}
