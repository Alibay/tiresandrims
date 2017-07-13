<?php

namespace App\Http\Controllers;

use App\BrandModel;

class BrandModelController extends Controller
{

    public function apiFindModels ( $brandId )
    {
        return BrandModel::all()->where('brand_id', $brandId);
    }

}
