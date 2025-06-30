<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use Illuminate\Support\Carbon;
use App\Models\Wattering;

class WatteringController extends Controller
{

public function store(Request $request)
{
    // Simpan ke tabel Watterings
    Wattering::create([
        'min_humidity' => $request->min_humidity,
        'max_humidity' => $request->max_humidity,
        'mode' => 'otomatis', // Atau ambil dari input user jika ada
        'jam_mulai' => $request->jam_mulai,
        'jam_selesai' => $request->jam_selesai,
    ]);

    // Simpan ke tabel History
    History::create([
        'tanggal' => \Carbon\Carbon::now()->toDateString(),
        'jenis' => 'penyiraman',
        'jam_mulai' => $request->jam_mulai,
        'jam_selesai' => $request->jam_selesai,
    ]);

    return redirect()->back()->with('success', 'Pengaturan penyiraman berhasil disimpan.');
}

}
