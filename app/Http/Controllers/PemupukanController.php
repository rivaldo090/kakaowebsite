<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pupuk;
use App\Models\History; // <- Tambahkan ini

class PemupukanController extends Controller
{
    public function index()
    {
        return view('pemupukan');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_pupuk' => 'required|string',
            'jumlah' => 'required|numeric',
            'fertilization_dates' => 'required|array',
            'fertilization_dates.*' => 'date',
        ]);

        foreach ($validated['fertilization_dates'] as $date) {
            // Simpan ke tabel pupuks
            Pupuk::create([
                'jenis_pupuk' => $validated['jenis_pupuk'],
                'jumlah' => $validated['jumlah'],
                'tanggal' => $date,
            ]);

            // Simpan ke tabel histories
            History::create([
                'tanggal' => $date,
                'jenis' => 'pemupukan',
                'jam_mulai' => now()->format('H:i'),
                'jam_selesai' => now()->addMinutes(10)->format('H:i'), // Contoh durasi
            ]);
        }

        return redirect()->route('history')->with('success', 'Data pemupukan berhasil disimpan.');
    }
}
