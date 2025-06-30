<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SensorData;
use App\Events\DataSensorUpdated;

class SensorDataController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'suhu' => 'required|numeric',
            'kelembapan_udara' => 'required|numeric',
            'kelembapan_tanah' => 'required|numeric',
        ]);

        $data = SensorData::create($request->only('suhu', 'kelembapan_udara', 'kelembapan_tanah'));

        broadcast(new DataSensorUpdated($data))->toOthers();

        return response()->json(['status' => 'success', 'data' => $data]);
    }
}
