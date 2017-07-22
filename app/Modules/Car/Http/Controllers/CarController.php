<?php

namespace App\Modules\Car\Http\Controllers;

use App\Http\Controllers\Controller;

class CarController extends Controller
{
    public function my ()
    {
        return view('car.car.my');
    }

    public function add ()
    {
        return view('car.car.add');
    }
}
