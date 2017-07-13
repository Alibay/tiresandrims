<?php

namespace App\Http\Controllers;

use App\Brand;

class RimController extends Controller
{

    public function searchByCar()
    {
        $brands = Brand::all();

        return view('rim.searchByCar', [
            'brands' => $brands
        ]);
    }
}
