<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SensorData;

class SensorController extends Controller
{
    /**
     * Menerima dan menyimpan data sensor dari Raspberry Pi atau perangkat lain.
     */
    public function store(Request $request)
    {
        // Validasi input dari request
        $validated = $request->validate([
            'temperature'    => 'required|numeric',
            'humidity'       => 'required|numeric',
            'soil_moisture'  => 'required|numeric',
            'lamp_status'    => 'required|boolean',
            'water_pump'     => 'required|boolean',
            'fertilizer'     => 'required|boolean',
        ]);

        // Simpan data ke database
        $sensorData = SensorData::create($validated);

        // Respon JSON berhasil
        return response()->json([
            'message' => 'Data sensor berhasil disimpan',
            'data' => $sensorData
        ], 201);
    }
}
