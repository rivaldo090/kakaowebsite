<?php

namespace App\Http\Controllers;

use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;
use Illuminate\Http\Request;

class MqttController extends Controller
{
    public function subscriber()
    {
        $server = 'localhost'; // atau IP broker MQTT
        $port = 1883;
        $clientId = 'laravel-client';

        // Buat client MQTT
        $mqtt = new MqttClient($server, $port, $clientId);

        // Konfigurasi koneksi
        $settings = (new ConnectionSettings)
            ->setUsername('your_username') // Jika broker tidak pakai username, bisa dihapus
            ->setPassword('pass');

        // Koneksikan client
        $mqtt->connect($settings, true);

        // Subscribe ke topik
        $mqtt->subscribe('sensor/data', function (string $topic, string $message) {
            echo "Data diterima dari topik [$topic]: $message\n";
        }, 0); // QoS 0

        // Loop agar tetap menerima data
        while ($mqtt->isConnected()) {
            $mqtt->loop(true); // dengan true: blocking mode
        }

        // Disconnect jika keluar dari loop
        $mqtt->disconnect();
    }
}
