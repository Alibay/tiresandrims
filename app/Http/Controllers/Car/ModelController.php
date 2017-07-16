<?php

namespace App\Http\Controllers\Car;

use App\Car\Model;
use App\Http\Controllers\Controller;

class ModelController extends Controller
{

    public function apiFindModels ( $brandId )
    {
        return Model::where('brand_id', $brandId)->get();
    }

}
