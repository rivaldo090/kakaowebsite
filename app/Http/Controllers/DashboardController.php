<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SensorData;
use App\Models\Komponen;
use App\Models\History;

class DashboardController extends Controller
{
    /**
     * Menampilkan data sensor dan status komponen ke dashboard Blade.
     */
    public function index()
    {
        $sensor = SensorData::latest()->first();
        $komponen = Komponen::latest()->first();

        // Ambil status pencahayaan dari history
        $latestLampuLog = History::where('jenis', 'pencahayaan')->latest()->first();
        $statusLampu = ($latestLampuLog && $latestLampuLog->jam_selesai === null) ? 'Aktif' : 'Non-Aktif';
        $waktuLampu = $latestLampuLog ? $latestLampuLog->updated_at->format('Y-m-d H:i:s') : '-';

        return view('dashboard', [
            'kelembapan'         => $sensor?->soil ?? 'Belum ada data',
            'suhu'               => $sensor?->temperature ?? 'Belum ada data',

            'statusLampu'        => $statusLampu,
            'waktuLampu'         => $waktuLampu,

            'statusPemupukan'    => $komponen ? ($komponen->pemupukan ? 'Aktif' : 'Non-Aktif') : 'Tidak Diketahui',
            'waktuPemupukan'     => $komponen?->updated_at?->format('Y-m-d H:i:s') ?? '-',

            'statusPenyiraman'   => $komponen ? ($komponen->penyiraman ? 'Aktif' : 'Non-Aktif') : 'Tidak Diketahui',
            'waktuPenyiraman'    => $komponen?->updated_at?->format('Y-m-d H:i:s') ?? '-',
        ]);
    }

    /**
     * Mengirim data sensor & status komponen sebagai response JSON (dipakai JS).
     */
    public function latestSensor()
    {
        $sensor = SensorData::latest()->first();
        $komponen = Komponen::latest()->first();

        // Ambil status pencahayaan dari history
        $latestLampuLog = History::where('jenis', 'pencahayaan')->latest()->first();
        $statusLampu = ($latestLampuLog && $latestLampuLog->jam_selesai === null) ? 'Aktif' : 'Non-Aktif';
        $updatedAt = $latestLampuLog ? $latestLampuLog->updated_at->format('Y-m-d H:i:s') : '-';

        return response()->json([
            'kelembapan'         => $sensor?->soil ?? 0,
            'suhu'               => $sensor?->temperature ?? 0,
            'statusLampu'        => $statusLampu,
            'statusPemupukan'    => $komponen ? ($komponen->pemupukan ? 'Aktif' : 'Non-Aktif') : 'Tidak Diketahui',
            'statusPenyiraman'   => $komponen ? ($komponen->penyiraman ? 'Aktif' : 'Non-Aktif') : 'Tidak Diketahui',
            'updatedAt'          => $updatedAt,
        ]);
    }
}
