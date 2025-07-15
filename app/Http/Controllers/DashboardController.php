<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SensorData;
use App\Models\Komponen;

class DashboardController extends Controller
{
    /**
     * Menampilkan data sensor dan status komponen ke dashboard Blade.
     */
    public function index()
    {
        $sensor = SensorData::latest()->first();
        $komponen = Komponen::latest()->first();

        return view('dashboard', [
            'kelembapan' => $sensor?->soil ?? 'Belum ada data',
            'suhu' => $sensor?->temperature ?? 'Belum ada data',

            'statusLampu' => $komponen?->lampu ?? 'Tidak Diketahui',
            'waktuLampu' => $komponen?->updated_at?->format('Y-m-d H:i:s') ?? '-',

            'statusPemupukan' => $komponen?->pemupukan ?? 'Tidak Diketahui',
            'waktuPemupukan' => $komponen?->updated_at?->format('Y-m-d H:i:s') ?? '-',

            'statusPenyiraman' => $komponen?->penyiraman ?? 'Tidak Diketahui',
            'waktuPenyiraman' => $komponen?->updated_at?->format('Y-m-d H:i:s') ?? '-',
        ]);
    }

    /**
     * Mengirim data sensor & status komponen sebagai response JSON (dipakai JS).
     */
    public function latestSensor()
    {
        $sensor = SensorData::latest()->first();
        $komponen = Komponen::latest()->first();

        return response()->json([
            'kelembapan' => $sensor?->soil,
            'suhu' => $sensor?->temperature,
            'statusLampu' => $komponen?->lampu,
            'statusPemupukan' => $komponen?->pemupukan,
            'statusPenyiraman' => $komponen?->penyiraman,
            'updatedAt' => $komponen?->updated_at?->format('Y-m-d H:i:s'),
        ]);
    }
}
