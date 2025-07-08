@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-100 via-white to-green-50 py-10 px-4">
    <div class="max-w-xl mx-auto bg-white/90 backdrop-blur-sm p-8 rounded-2xl shadow-xl border border-green-200 animate-fadeIn">
        <h2 class="text-3xl font-bold text-green-700 mb-6 text-center drop-shadow-sm">
            📟 Tambah Device Baru
        </h2>

        {{-- Pesan berhasil --}}
        @if(session('success'))
            <div class="mb-6 p-4 rounded-lg bg-green-100 text-green-700 border border-green-300 shadow">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.devices.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="device_name" class="block text-gray-700 font-medium mb-1">📛 Nama Device</label>
                <input type="text" name="device_name" id="device_name" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400 transition duration-300 shadow-sm">
            </div>

            <div>
                <label for="device_type" class="block text-gray-700 font-medium mb-1">🧬 Tipe Device</label>
                <input type="text" name="device_type" id="device_type" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400 transition duration-300 shadow-sm">
            </div>

            <div>
                <label for="device_status" class="block text-gray-700 font-medium mb-1">⚙️ Status Device</label>
                <select name="device_status" id="device_status" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400 transition duration-300 shadow-sm bg-white">
                    <option value="">-- Pilih Status --</option>
                    <option value="aktif">🟢 Aktif</option>
                    <option value="nonaktif">🔴 Nonaktif</option>
                </select>
            </div>

            <div>
                <label for="user_id" class="block text-gray-700 font-medium mb-1">👤 ID Pemilik (User)</label>
                <input type="number" name="user_id" id="user_id" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400 transition duration-300 shadow-sm">
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                    💾 Simpan Device
                </button>
            </div>
        </form>
    </div>
</div>

<style>
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
.animate-fadeIn {
    animation: fadeIn 0.6s ease-out;
}
</style>
@endsection
