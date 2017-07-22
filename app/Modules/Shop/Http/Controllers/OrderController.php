<?php

namespace App\Modules\Shop\Http\Controllers;

use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function myOrders ()
    {
        return view('shop.order.my');
    }
}
