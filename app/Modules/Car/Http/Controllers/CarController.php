<?php

namespace App\Modules\Car\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Car\Models\Brand;

class CarController extends Controller
{
    public function my ()
    {
        return view('car.car.my');
    }

    public function add ()
    {
        $brands = Brand::all();

        return view('car.car.add', compact('brands'));
    }
}
