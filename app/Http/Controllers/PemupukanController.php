<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemupukan;
use App\Models\History; // Tambahkan ini

class PemupukanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'jenis_pupuk' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:1',
            'fertilization_dates' => 'required|array|min:1',
            'fertilization_dates.*' => 'date',
        ]);

        foreach ($request->fertilization_dates as $tanggal) {
            // Simpan ke tabel pemupukan
            Pemupukan::create([
                'jenis_pupuk' => $request->jenis_pupuk,
                'jumlah' => $request->jumlah,
                'tanggal_pemupukan' => $tanggal,
            ]);

            // Simpan juga ke tabel history
            History::create([
                'jenis' => 'pemupukan',
                'tanggal' => $tanggal,
                'jam_mulai' => now()->format('H:i'),
                'jam_selesai' => now()->addMinutes(5)->format('H:i'),
            ]);
        }

        return redirect()->back()->with('success', 'Pengaturan pemupukan berhasil disimpan.');
    }
}
