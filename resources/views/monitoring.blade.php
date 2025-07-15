@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Monitoring Sensor</h2>

    {{-- Tabel Data Sensor --}}
    <div class="card mb-4">
        <div class="card-header">Data Terbaru</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Waktu</th>
                        <th>Suhu (°C)</th>
                        <th>Kelembaban (%)</th>
                        <th>Kelembaban Tanah (%)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
                            <td>{{ $item->temperature }}</td>
                            <td>{{ $item->humidity }}</td>
                            <td>{{ $item->soil }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Grafik Sensor --}}
    <div class="card">
        <div class="card-header">Grafik Monitoring</div>
        <div class="card-body">
            <canvas id="sensorChart" height="100"></canvas>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    fetch('/api/data-sensor')
        .then(response => response.json())
        .then(data => {
            const labels = data.map(item => new Date(item.created_at).toLocaleTimeString());
            const temperature = data.map(item => item.temperature);
            const humidity = data.map(item => item.humidity);
            const soil = data.map(item => item.soil);

            const ctx = document.getElementById('sensorChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels,
                    datasets: [
                        {
                            label: 'Suhu (°C)',
                            data: temperature,
                            borderColor: 'red',
                            backgroundColor: 'rgba(255, 0, 0, 0.1)',
                            fill: true,
                            tension: 0.4
                        },
                        {
                            label: 'Kelembaban Udara (%)',
                            data: humidity,
                            borderColor: 'blue',
                            backgroundColor: 'rgba(0, 0, 255, 0.1)',
                            fill: true,
                            tension: 0.4
                        },
                        {
                            label: 'Kelembaban Tanah (%)',
                            data: soil,
                            borderColor: 'green',
                            backgroundColor: 'rgba(0, 255, 0, 0.1)',
                            fill: true,
                            tension: 0.4
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'top' },
                        title: {
                            display: true,
                            text: 'Grafik Sensor Data'
                        }
                    }
                }
            });
        });
</script>
@endsection
