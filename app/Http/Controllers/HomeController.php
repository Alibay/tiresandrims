<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index ()
    {
        return view('welcome');
    }

    public function dashboard ()
    {
        return view('dashboard');
    }
}