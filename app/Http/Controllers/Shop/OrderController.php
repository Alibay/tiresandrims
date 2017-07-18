<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function myOrders ()
    {
        return view('shop.order.my');
    }
}
