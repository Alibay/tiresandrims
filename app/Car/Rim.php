<?php

namespace App\Car;

use Illuminate\Database\Eloquent\Model;

class Rim extends Model
{
    const TYPE_NAME = 'RIM';

    protected $table = 'car_rims';
}
