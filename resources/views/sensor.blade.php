@extends('layouts.main')

@section('title', 'Monitoring Sensor Kakao')

@section('content')
<div class="container mx-auto py-8">
    <h2 class="text-3xl font-bold mb-6 text-center">Monitoring Sensor Kakao</h2>

    <div id="sensor-data" class="bg-white shadow-md rounded-lg p-6 text-lg text-gray-700 text-center">
        <p>Memuat data sensor...</p>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function fetchSensorData() {
        fetch("{{ route('sensor.latest') }}")
            .then(res => res.json())
            .then(data => {
                const el = document.getElementById("sensor-data");
                if (data && data.suhu !== undefined) {
                    el.innerHTML = `
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                            <div class="p-4 bg-blue-100 rounded shadow">
                                <h3 class="font-semibold">Suhu</h3>
                                <p class="text-2xl text-blue-700">${data.suhu} °C</p>
                            </div>
                            <div class="p-4 bg-green-100 rounded shadow">
                                <h3 class="font-semibold">Kelembapan Udara</h3>
                                <p class="text-2xl text-green-700">${data.kelembapan_udara} %</p>
                            </div>
                            <div class="p-4 bg-yellow-100 rounded shadow">
                                <h3 class="font-semibold">Kelembapan Tanah</h3>
                                <p class="text-2xl text-yellow-700">${data.kelembapan_tanah} %</p>
                            </div>
                            <div class="p-4 bg-gray-100 rounded shadow">
                                <h3 class="font-semibold">Waktu</h3>
                                <p class="text-base text-gray-800">${new Date(data.created_at).toLocaleString()}</p>
                            </div>
                        </div>
                    `;
                } else {
                    el.innerHTML = '<p class="text-yellow-600">Belum ada data sensor yang valid.</p>';
                }
            })
            .catch(error => {
                console.error('Fetch error:', error);
                document.getElementById("sensor-data").innerHTML = '<p class="text-red-600">Gagal memuat data sensor.</p>';
            });
    }

    fetchSensorData();
    setInterval(fetchSensorData, 5000);
</script>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script src="/js/echo.js"></script>

<script>
    window.Echo.channel('sensor-channel')
        .listen('.sensor.updated', (e) => {
            console.log('📡 Broadcast diterima:', e.sensor);
            // Kamu bisa update DOM di sini juga, misalnya:
            document.getElementById("sensor-data").innerHTML = `
                <ul>
                    <li>Suhu: ${e.sensor.suhu} °C</li>
                    <li>Kelembapan Udara: ${e.sensor.kelembapan_udara} %</li>
                    <li>Kelembapan Tanah: ${e.sensor.kelembapan_tanah} %</li>
                </ul>
            `;
        });
</script>

@endpush
