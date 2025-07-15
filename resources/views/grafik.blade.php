<!DOCTYPE html>
<html>
<head>
    <title>Grafik Realtime Sensor</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
    <h2>Grafik Realtime Sensor Suhu, Kelembapan Udara & Tanah</h2>

    <canvas id="sensorChart" width="600" height="300"></canvas>
    <canvas id="soilChart" width="600" height="300" style="margin-top:40px;"></canvas>

    <script>
        const ctx1 = document.getElementById('sensorChart').getContext('2d');
        const chart1 = new Chart(ctx1, {
            type: 'line',
            data: {
                labels: [],
                datasets: [
                    {
                        label: 'Suhu (°C)',
                        borderColor: 'red',
                        data: [],
                        tension: 0.3
                    },
                    {
                        label: 'Kelembapan Udara (%)',
                        borderColor: 'blue',
                        data: [],
                        tension: 0.3
                    }
                ]
            }
        });

        const ctx2 = document.getElementById('soilChart').getContext('2d');
        const chart2 = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: [],
                datasets: [
                    {
                        label: 'Kelembapan Tanah (%)',
                        borderColor: 'green',
                        data: [],
                        tension: 0.3
                    }
                ]
            }
        });

        function fetchData() {
            $.get('/api/data-sensor', function (data) {
                const labels = data.map(d => new Date(d.created_at).toLocaleTimeString());
                const suhu = data.map(d => d.temperature);
                const kelembapan = data.map(d => d.humidity);
                const tanah = data.map(d => d.soil);

                chart1.data.labels = labels;
                chart1.data.datasets[0].data = suhu;
                chart1.data.datasets[1].data = kelembapan;
                chart1.update();

                chart2.data.labels = labels;
                chart2.data.datasets[0].data = tanah;
                chart2.update();
            });
        }

        fetchData(); // load awal
        setInterval(fetchData, 5000); // refresh tiap 5 detik
    </script>
</body>
</html>
