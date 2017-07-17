<?php

namespace App\Car;

use Illuminate\Database\Eloquent\Model;

class DetailModel extends Model
{
    protected $table = 'car_detail_models';

    public function brand ()
    {
        return $this->belongsTo('App\Car\DetailBrand');
    }
}
