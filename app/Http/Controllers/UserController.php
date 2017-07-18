<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function settings ()
    {
        return view('user.settings');
    }
}