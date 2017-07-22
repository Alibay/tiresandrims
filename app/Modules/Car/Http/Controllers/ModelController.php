<?php

namespace App\Modules\Car\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Car\Models\Model;

class ModelController extends Controller
{

    public function apiFindModels ( $brandId )
    {
        return Model::where('brand_id', $brandId)->get();
    }

}
