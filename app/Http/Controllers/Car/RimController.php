<?php

namespace App\Http\Controllers\Car;

use App\Car\Brand;
use App\Http\Controllers\Controller;

class RimController extends Controller
{

    public function searchByCar()
    {
        $brands = Brand::all();

        return view('car.rim.searchByCar', [
            'brands' => $brands
        ]);
    }
}
