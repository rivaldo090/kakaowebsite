<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SensorData; // Sesuaikan dengan modelmu

class SensorViewController extends Controller
{
    public function index()
    {
        $data = SensorData::latest()->take(20)->get();
        return view('monitoring', compact('data')); // atau 'monitoring' jika view-nya bernama monitoring.blade.php
    }
}
