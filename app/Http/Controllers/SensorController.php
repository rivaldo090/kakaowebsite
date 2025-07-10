<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SensorData;

class SensorDataController extends Controller
{
    /**
     * Menyimpan data sensor dari Raspberry Pi.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'suhu' => 'required|numeric',
            'kelembaban_udara' => 'required|numeric',
            'kelembaban_tanah' => 'required|numeric',
            'status_lampu' => 'nullable|string',
            'status_pemupukan' => 'nullable|string',
            'status_penyiraman' => 'nullable|string',
        ]);

        $data = SensorData::create($validated);

        return response()->json([
            'message' => 'Data sensor berhasil disimpan',
            'data' => $data,
        ], 201);
    }

    /**
     * Menampilkan data sensor terbaru.
     */
    public function latest()
    {
        $latest = SensorData::latest()->first();

        return response()->json([
            'data' => $latest,
        ]);
    }

    /**
     * Menampilkan semua data sensor (opsional).
     */
    public function index()
    {
        return response()->json([
            'data' => SensorData::orderBy('created_at', 'desc')->get(),
        ]);
    }
}
