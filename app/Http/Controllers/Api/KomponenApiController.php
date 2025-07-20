<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Komponen;

class KomponenApiController extends Controller
{
    // Simpan status terbaru dari komponen
    public function store(Request $request)
    {
        $request->validate([
            'lampu' => 'required|boolean',
            'penyiraman' => 'required|boolean',
            'pemupukan' => 'required|boolean',
        ]);

        Komponen::create([
            'lampu'      => $request->lampu ? 'Aktif' : 'Nonaktif',
            'penyiraman' => $request->penyiraman ? 'Aktif' : 'Nonaktif',
            'pemupukan'  => $request->pemupukan ? 'Aktif' : 'Nonaktif',
        ]);

        return response()->json(['message' => 'Status komponen berhasil disimpan']);
    }

    // Ambil status terakhir
    public function show()
    {
        $komponen = Komponen::latest()->first();
        return response()->json($komponen);
    }
}
