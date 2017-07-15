<?php

namespace App\Http\Controllers\Car;

use App\Car\Model;
use App\Http\Controllers\Controller;

class ModelController extends Controller
{

    public function apiFindModels ( $brandId )
    {
        return Model::all()->where('brand_id', $brandId);
    }

}
