<?php

namespace App\Http\Controllers\Car;

use App\Car\Generation;
use App\Http\Controllers\Controller;

class GenerationController extends Controller
{

    public function apiFindGenerations ( $modelId )
    {
        return Generation::where('model_id', $modelId)->get();
    }

}
