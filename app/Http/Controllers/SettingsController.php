<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Routing\Controller;

class SettingsController extends Controller
{
    public function params ()
    {
        $settings = Settings::all();

        return view('settings.params', compact('settings'));
    }
}