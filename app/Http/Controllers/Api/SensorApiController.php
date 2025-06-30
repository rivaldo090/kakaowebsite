<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sensor;

class SensorApiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'kelembaban_tanah' => 'required|numeric',
            'kelembaban_udara' => 'required|numeric',
            'suhu' => 'required|numeric',
        ]);

        Sensor::create($request->all());

        return response()->json(['message' => 'Data berhasil disimpan']);
    }
}
