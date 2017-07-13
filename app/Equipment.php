<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table = 'equipments';

    public function rim ()
    {
        return $this->belongsTo('App\Rim');
    }

    public function tire ()
    {
        return $this->belongsTo('App\Tire');
    }
}
