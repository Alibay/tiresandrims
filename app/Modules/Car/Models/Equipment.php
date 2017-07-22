<?php

namespace App\Modules\Car\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table = 'car_equipments';

    public function rim ()
    {
        return $this->belongsTo('App\Modules\Car\Models\Rim');
    }

    public function tire ()
    {
        return $this->belongsTo('App\Modules\Car\Models\Tire');
    }
}
