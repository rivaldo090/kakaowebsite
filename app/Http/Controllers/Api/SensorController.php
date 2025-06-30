<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SensorData;

class SensorController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'suhu' => 'required|numeric',
            'kelembapan_udara' => 'required|numeric',
            'kelembapan_tanah' => 'required|numeric',
        ]);

        SensorData::create($validated);

        return response()->json(['message' => 'Data berhasil disimpan'], 201);
    }
}
