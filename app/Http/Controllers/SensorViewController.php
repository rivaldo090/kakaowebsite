<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sensor;

class SensorViewController extends Controller
{
    public function index()
{
    return view('sensor'); // atau 'monitoring' jika nama file-nya monitoring.blade.php
}
}


