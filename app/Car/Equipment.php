<?php

namespace App\Car;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table = 'car_equipments';

    public function rim ()
    {
        return $this->belongsTo('App\Car\Rim');
    }

    public function tire ()
    {
        return $this->belongsTo('App\Car\Tire');
    }
}
