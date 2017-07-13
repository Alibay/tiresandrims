<?php

namespace App\Http\Controllers;

use App\Equipment;

class EquipmentController extends Controller
{
    public function apiFindEquipments( $modificationId )
    {
        return Equipment::with(['rim', 'tire'])
            ->where('modification_id', $modificationId)
            ->get();
    }
}
