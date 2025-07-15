<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SensorData;

class SensorController extends Controller
{
    /**
     * Simpan data sensor dari perangkat (Raspberry Pi).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'temperature' => 'required|numeric',
            'humidity'    => 'required|numeric',
            'soil'        => 'required|numeric',
        ]);

        SensorData::create($validated);

        return response()->json(['message' => 'Data berhasil disimpan']);
    }

    /**
     * Tampilkan semua data sensor (opsional).
     */
    public function index()
    {
        return SensorData::latest()->take(100)->get();
    }

    /**
     * Ambil data untuk grafik (opsional).
     */
    public function grafik()
    {
        $data = SensorData::orderBy('created_at', 'desc')->take(20)->get()->reverse()->values();
        return response()->json($data);
    }

    /**
     * Ambil data sensor terbaru (untuk ditampilkan di dashboard Flutter)
     */
    public function latestSensor()
    {
        $latest = SensorData::latest()->first();

        if (!$latest) {
            return response()->json([
                'soil_moisture' => null,
                'air_humidity'  => null,
                'temperature'   => null,
            ]);
        }

        return response()->json([
            'soil_moisture' => $latest->soil,
            'air_humidity'  => $latest->humidity,
            'temperature'   => $latest->temperature,
        ]);
    }
}
