<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelembapanTanah;
use App\Models\Suhu;
use App\Models\Komponen;

class DashboardController extends Controller
{
    public function index()
    {
        $kelembapan_terbaru = KelembapanTanah::latest()->first();
        $suhu_terbaru = Suhu::latest()->first();
        $komponen = Komponen::latest()->first();

        return view('dashboard', [
            'kelembapan' => $kelembapan_terbaru ? $kelembapan_terbaru->nilai : null,
            'suhu' => $suhu_terbaru ? $suhu_terbaru->nilai : null,

            'statusLampu' => $komponen ? $komponen->lampu : 'Tidak Diketahui',
            'waktuLampu' => $komponen ? $komponen->updated_at->format('Y-m-d H:i:s') : '-',

            'statusPemupukan' => $komponen ? $komponen->pemupukan : 'Tidak Diketahui',
            'waktuPemupukan' => $komponen ? $komponen->updated_at->format('Y-m-d H:i:s') : '-',

            'statusPenyiraman' => $komponen ? $komponen->penyiraman : 'Tidak Diketahui',
            'waktuPenyiraman' => $komponen ? $komponen->updated_at->format('Y-m-d H:i:s') : '-',
        ]);
    }
}
