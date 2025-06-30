<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pencahayaan;
use App\Models\History;
use Illuminate\Support\Carbon;

class PencahayaanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'intensitas' => 'required|numeric|min:0|max:100',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        Pencahayaan::create([
            'intensitas' => $request->intensitas,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        History::create([
            'tanggal' => Carbon::now()->toDateString(),
            'jenis' => 'pencahayaan',
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect()->back()->with('success', 'Pengaturan pencahayaan berhasil disimpan.');
    }

    public function kontrolManual(Request $request)
    {
        $status = $request->input('manual_control');

        History::create([
            'tanggal' => Carbon::now()->toDateString(),
            'jenis' => 'pencahayaan_manual',
            'status' => $status,
            'jam_mulai' => Carbon::now()->toTimeString(),
        ]);

        if ($status === 'on') {
            return redirect()->back()->with('success', 'Lampu diaktifkan.');
        } else {
            return redirect()->back()->with('success', 'Lampu dimatikan.');
        }
    }
}
