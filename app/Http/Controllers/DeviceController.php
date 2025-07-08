<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeviceController extends Controller
{
    // Tampilkan semua device langsung di dashboard admin
    public function index()
    {
        $devices = DB::table('devices')->get();
        $total_user = DB::table('users')->count();
        $total_device = DB::table('devices')->count();

        return view('dashboard_admin', compact('devices', 'total_user', 'total_device'));
    }

    // Tampilkan form tambah device
    public function create()
    {
        $users = DB::table('users')->get(); // supaya bisa pilih user
        return view('tambah_device', compact('users'));
    }

    // Simpan device baru
    public function store(Request $request)
    {
        $request->validate([
            'device_name'   => 'required|string|max:255',
            'device_type'   => 'required|string|max:255',
            'device_status' => 'required|string|max:255',
            'user_id'       => 'nullable|exists:users,id',
        ]);

        DB::table('devices')->insert([
            'device_name'   => $request->device_name,
            'device_type'   => $request->device_type,
            'device_status' => $request->device_status,
            'user_id'       => $request->user_id,
        ]);

        return back()->with('success', '✅ Device berhasil ditambahkan.');
    }

    // Form edit device
    public function edit($id)
    {
        $device = DB::table('devices')->where('device_id', $id)->first();
        $users = DB::table('users')->get();

        if (!$device) {
            return redirect()->route('admin.devices.index')->with('error', 'Device tidak ditemukan.');
        }

        return view('admin.devices.edit', compact('device', 'users'));
    }

    // Update data device
    public function update(Request $request, $id)
    {
        $request->validate([
            'device_name'   => 'required|string|max:255',
            'device_type'   => 'required|string|max:255',
            'device_status' => 'required|string|max:255',
            'user_id'       => 'nullable|exists:users,id',
        ]);

        DB::table('devices')->where('device_id', $id)->update([
            'device_name'   => $request->device_name,
            'device_type'   => $request->device_type,
            'device_status' => $request->device_status,
            'user_id'       => $request->user_id,
        ]);

        return redirect()->route('admin.devices.index')->with('success', '✅ Device berhasil diperbarui.');
    }

    // Hapus device
    public function destroy($id)
    {
        DB::table('devices')->where('device_id', $id)->delete();

        return redirect()->route('admin.devices.index')->with('success', '🗑️ Device berhasil dihapus.');
    }
}
