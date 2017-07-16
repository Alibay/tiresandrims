<?php

namespace App\Http\Controllers\Car;

use App\Car\Modification;
use App\Http\Controllers\Controller;

class ModificationController extends Controller
{

    public function apiFindModifications ( $generationId )
    {
        return Modification::where('generation_id', $generationId)->get();
    }

}
