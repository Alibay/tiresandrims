<?php

namespace App\Modules\Car\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Car\Models\Generation;

class GenerationController extends Controller
{

    public function apiFindGenerations ( $modelId )
    {
        return Generation::where('model_id', $modelId)->get();
    }

}
