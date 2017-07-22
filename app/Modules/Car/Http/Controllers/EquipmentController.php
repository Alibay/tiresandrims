<?php

namespace App\Modules\Car\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Car\Models\Equipment;

class EquipmentController extends Controller
{
    public function apiFindEquipments( $modificationId )
    {
        return Equipment::with(['rim', 'tire'])
            ->where('modification_id', $modificationId)
            ->get();
    }
}
