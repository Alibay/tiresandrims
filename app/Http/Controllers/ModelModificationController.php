<?php

namespace App\Http\Controllers;

use App\ModelModification;

class ModelModificationController extends Controller
{

    public function apiFindModifications ( $generationId )
    {
        return ModelModification::all()->where('generation_id', $generationId);
    }

}
