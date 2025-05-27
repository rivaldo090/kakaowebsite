<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Hitung total user dan device
        $total_user = DB::table('user')->count();
        $total_device = DB::table('device')->count();

        // Ambil daftar user
        $konsumen = DB::table('user')->select('username', 'user_id')->get();

        // Ambil daftar device
        $produk = DB::table('device')->select('device_name', 'user_id')->get();

        return view('dashboard_admin', compact('total_user', 'total_device', 'konsumen', 'produk'));
    }

    public function users()
    {
        $users = DB::table('user')->get();
        return view('admin.users', compact('users'));
    }

    public function devices()
    {
        $devices = DB::table('device')->get();
        return view('admin.devices', compact('devices'));
    }
}
