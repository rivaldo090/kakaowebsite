<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wattering;
use App\Models\History;

class WatteringController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input request
        $validated = $request->validate([
            'min_humidity' => 'required|integer|min:0|max:100',
            'max_humidity' => 'required|integer|min:0|max:100|gte:min_humidity',
            'mode' => 'required|in:otomatis,manual',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        try {
            // Simpan ke tabel watterings
            Wattering::create($validated);

            // Simpan ke tabel history
            History::create([
                'tanggal' => now()->toDateString(),
                'jenis' => 'penyiraman',
                'jam_mulai' => $validated['jam_mulai'],
                'jam_selesai' => $validated['jam_selesai'],
            ]);

            return redirect()->back()->with('success', 'Pengaturan penyiraman berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan pengaturan: ' . $e->getMessage());
        }
    }
}
