-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Bulan Mei 2025 pada 14.32
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bibitkakaodb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `device`
--

CREATE TABLE `device` (
  `device_id` int(11) NOT NULL,
  `device_name` varchar(255) NOT NULL,
  `device_type` varchar(100) NOT NULL,
  `device_status` varchar(50) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `histori_pemupukan`
--

CREATE TABLE `histori_pemupukan` (
  `history_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `action_type` enum('manual','scheduled') NOT NULL,
  `schedule_date` date DEFAULT NULL,
  `action_timestamp` timestamp NULL DEFAULT current_timestamp(),
  `updated_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `histori_pencahayaan`
--

CREATE TABLE `histori_pencahayaan` (
  `history_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `manual_control` tinyint(1) NOT NULL,
  `schedule_start` time DEFAULT NULL,
  `schedule_end` time DEFAULT NULL,
  `change_type` varchar(50) NOT NULL,
  `action_timestamp` timestamp NULL DEFAULT current_timestamp(),
  `updated_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `histori_penyiraman`
--

CREATE TABLE `histori_penyiraman` (
  `history_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `min_humidity` float(5,2) NOT NULL,
  `max_humidity` float(5,2) NOT NULL,
  `schedule_1_start` time DEFAULT NULL,
  `schedule_1_end` time DEFAULT NULL,
  `schedule_2_start` time DEFAULT NULL,
  `schedule_2_end` time DEFAULT NULL,
  `change_type` enum('manual','automatic') NOT NULL,
  `action_timestamp` timestamp NULL DEFAULT current_timestamp(),
  `updated_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelembapan_tanah`
--

CREATE TABLE `kelembapan_tanah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(5, '2025_05_13_090353_add_username_to_users_table', 2),
(8, '2025_05_13_100818_add_role_to_users_table', 3),
(9, '2025_05_27_114750_create_kelembapan_tanah_table', 3),
(10, '2025_05_27_131827_create_suhu_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemupukan`
--

CREATE TABLE `pemupukan` (
  `schedule_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `schedule_date` date NOT NULL,
  `last_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pencahayaan`
--

CREATE TABLE `pencahayaan` (
  `lighting_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `manual_control` tinyint(1) NOT NULL DEFAULT 0,
  `schedule_start` time DEFAULT NULL,
  `schedule_end` time DEFAULT NULL,
  `last_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyiraman`
--

CREATE TABLE `penyiraman` (
  `watering_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `min_humidity` float(5,2) NOT NULL,
  `max_humidity` float(5,2) NOT NULL,
  `schedule_1_start` time DEFAULT NULL,
  `schedule_1_end` time DEFAULT NULL,
  `schedule_2_start` time DEFAULT NULL,
  `schedule_2_end` time DEFAULT NULL,
  `last_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suhus`
--

CREATE TABLE `suhus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nilai` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `pass`, `email`, `role`, `created_at`, `updated_at`) VALUES
(1, 'user1', '$2y$12$ZCloOAnY5WuVD2jX5bUhDefQ8TkTsED9qk9kBVg7JgXCwVTSs768.', 'aldoea12@gmail.com', 'user', '2025-05-17 15:46:45', '2025-05-17 07:02:11'),
(2, 'risa', '$2y$12$YAH7rHBQx2cc11ynnMHan.9lhS1df8.h1mCihpP5b0xjyZULXK4vW', 'robihood150@gmail.com', 'admin', '2025-05-20 11:34:00', '2025-05-18 00:10:44'),
(3, 'user2', '$2y$12$Nu7iPqlvJXfa2RgIgVvnVOGIK0sGXVPEvNkBNYzTYSUuFmKaCzO0e', 'shimpalama75369@gmail.com', 'user', '2025-05-20 07:06:30', '2025-05-20 07:06:30'),
(4, 'lala', '$2y$12$yV6bfBDsU6MAyhbGcP5DaenDedhUwHeHiFRrHgriNCVFPhBnIDZNG', 'risa@gmail.com', 'user', '2025-05-20 21:28:16', '2025-05-20 21:28:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`device_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `histori_pemupukan`
--
ALTER TABLE `histori_pemupukan`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `fk_fertilizer_device_id_3` (`device_id`),
  ADD KEY `fk_fertilizer_updated_by` (`updated_by`);

--
-- Indeks untuk tabel `histori_pencahayaan`
--
ALTER TABLE `histori_pencahayaan`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `fk_lighting_device_id_1` (`device_id`),
  ADD KEY `fk_lighting_updated_by` (`updated_by`);

--
-- Indeks untuk tabel `histori_penyiraman`
--
ALTER TABLE `histori_penyiraman`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `fk_watering_device_id` (`device_id`),
  ADD KEY `fk_watering_updated_by` (`updated_by`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelembapan_tanah`
--
ALTER TABLE `kelembapan_tanah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pemupukan`
--
ALTER TABLE `pemupukan`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `fk_fertilizer_device_id` (`device_id`);

--
-- Indeks untuk tabel `pencahayaan`
--
ALTER TABLE `pencahayaan`
  ADD PRIMARY KEY (`lighting_id`),
  ADD KEY `fk_lighting_device_id` (`device_id`);

--
-- Indeks untuk tabel `penyiraman`
--
ALTER TABLE `penyiraman`
  ADD PRIMARY KEY (`watering_id`),
  ADD KEY `fk_watering_device_id_1` (`device_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `suhus`
--
ALTER TABLE `suhus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `device`
--
ALTER TABLE `device`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `histori_pemupukan`
--
ALTER TABLE `histori_pemupukan`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `histori_pencahayaan`
--
ALTER TABLE `histori_pencahayaan`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `histori_penyiraman`
--
ALTER TABLE `histori_penyiraman`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelembapan_tanah`
--
ALTER TABLE `kelembapan_tanah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pemupukan`
--
ALTER TABLE `pemupukan`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pencahayaan`
--
ALTER TABLE `pencahayaan`
  MODIFY `lighting_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penyiraman`
--
ALTER TABLE `penyiraman`
  MODIFY `watering_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `suhus`
--
ALTER TABLE `suhus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `device`
--
ALTER TABLE `device`
  ADD CONSTRAINT `device_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `histori_pemupukan`
--
ALTER TABLE `histori_pemupukan`
  ADD CONSTRAINT `fk_fertilizer_device_id_3` FOREIGN KEY (`device_id`) REFERENCES `device` (`device_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_fertilizer_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `histori_pencahayaan`
--
ALTER TABLE `histori_pencahayaan`
  ADD CONSTRAINT `fk_lighting_device_id_1` FOREIGN KEY (`device_id`) REFERENCES `device` (`device_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_lighting_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `histori_penyiraman`
--
ALTER TABLE `histori_penyiraman`
  ADD CONSTRAINT `fk_watering_device_id` FOREIGN KEY (`device_id`) REFERENCES `device` (`device_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_watering_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemupukan`
--
ALTER TABLE `pemupukan`
  ADD CONSTRAINT `fk_fertilizer_device_id` FOREIGN KEY (`device_id`) REFERENCES `device` (`device_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pencahayaan`
--
ALTER TABLE `pencahayaan`
  ADD CONSTRAINT `fk_lighting_device_id` FOREIGN KEY (`device_id`) REFERENCES `device` (`device_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penyiraman`
--
ALTER TABLE `penyiraman`
  ADD CONSTRAINT `fk_watering_device_id_1` FOREIGN KEY (`device_id`) REFERENCES `device` (`device_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
