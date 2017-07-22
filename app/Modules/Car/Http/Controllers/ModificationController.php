<?php

namespace App\Modules\Car\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Car\Models\Modification;

class ModificationController extends Controller
{

    public function apiFindModifications ( $generationId )
    {
        return Modification::where('generation_id', $generationId)->get();
    }
}
