<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelembapanTanah;
use App\Models\Suhu;

class DashboardController extends Controller
{
    public function index()
    {
        $kelembapan_terbaru = KelembapanTanah::latest()->first();
        $suhu_terbaru = Suhu::latest()->first();

        return view('dashboard', [
            'kelembapan' => $kelembapan_terbaru ? $kelembapan_terbaru->nilai : null,
            'suhu' => $suhu_terbaru ? $suhu_terbaru->nilai : null,
        ]);
    }
}
