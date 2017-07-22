<?php

namespace App\Modules\Shop\Http\Controllers;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function show ()
    {
        return view('shop.product.show');
    }
}
