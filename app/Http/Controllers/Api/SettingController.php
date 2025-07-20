<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pencahayaan;
use App\Models\Wattering;
use App\Models\Pupuk;

class SettingController extends Controller
{
    public function index()
    {
        $lampu = Pencahayaan::latest()->first();
        $penyiraman = Wattering::latest()->first();
        $pemupukan = Pupuk::latest()->first();

        return response()->json([
            'status' => 'ok',
            'lampu' => [
                'on' => $lampu?->status === 'on',
                'start' => $lampu?->start_time ?? '00:00',
                'end' => $lampu?->end_time ?? '00:00',
            ],
            'penyiraman' => [
                'start' => $penyiraman?->jam_mulai ?? '00:00',
                'end' => $penyiraman?->jam_selesai ?? '00:00',
                'min_soil' => (int)($penyiraman?->min_humidity ?? 30),
                'max_soil' => (int)($penyiraman?->max_humidity ?? 70),
                'mode' => $penyiraman?->mode ?? 'otomatis',
            ],
            'pemupukan' => [
                'date' => $pemupukan?->tanggal ?? date('Y-m-d'),
                'start' => $pemupukan?->jam_mulai ?? '19.30',
                'end' => $pemupukan?->jam_selesai ?? '19.31',
                'jenis' => $pemupukan?->jenis_pupuk ?? '-',
                'jumlah' => $pemupukan?->jumlah ?? '-',
            ]
        ]);
    }
}
