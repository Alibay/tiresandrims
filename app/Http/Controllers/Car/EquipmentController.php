<?php

namespace App\Http\Controllers\Car;

use App\Car\Equipment;
use App\Http\Controllers\Controller;

class EquipmentController extends Controller
{
    public function apiFindEquipments( $modificationId )
    {
        return Equipment::with(['rim', 'tire'])
            ->where('modification_id', $modificationId)
            ->get();
    }
}
