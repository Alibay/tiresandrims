<?php

namespace App\Http\Controllers;

use App\ModelGeneration;

class ModelGenerationController extends Controller
{

    public function apiFindGenerations ( $modelId )
    {
        return ModelGeneration::all()->where('model_id', $modelId);
    }

}
