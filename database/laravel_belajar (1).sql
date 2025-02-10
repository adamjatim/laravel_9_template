-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Feb 2025 pada 09.38
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_belajar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cars`
--

INSERT INTO `cars` (`id`, `name`, `brand`, `year`, `price`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Avanza', 'Toyota', 2022, 400000.00, '2025-02-04 21:26:43', '2025-02-04 21:26:43', 'available'),
(2, 'Xpander', 'Mitsubishi', 2021, 450000.00, '2025-02-04 21:26:43', '2025-02-04 21:26:43', 'available'),
(3, 'Ertiga', 'Suzuki', 2023, 400000.00, '2025-02-04 21:26:43', '2025-02-04 21:26:43', 'available');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_01_29_175039_create_cars_table', 2),
(11, '2025_01_29_182654_create_user_car_table', 3),
(17, '2025_01_29_191329_create_rentals_table', 4),
(18, '2025_02_03_074214_add_status_to_cars_table', 5);

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
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `rental_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('active','completed','cancelled') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rentals`
--

INSERT INTO `rentals` (`id`, `user_id`, `car_id`, `rental_date`, `end_date`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-02-05', '2025-02-08', 1200000.00, 'active', '2025-02-04 22:42:13', '2025-02-04 22:42:13'),
(2, 2, 2, '2025-02-05', '2025-02-10', 2000000.00, 'completed', '2025-02-04 22:42:13', '2025-02-04 22:42:13'),
(6, 1, 1, '2025-02-05', '2025-02-08', 1200000.00, 'active', '2025-02-04 23:14:37', '2025-02-04 23:14:37'),
(7, 2, 2, '2025-02-05', '2025-02-10', 2000000.00, 'completed', '2025-02-04 23:14:37', '2025-02-04 23:14:37'),
(8, 5, 3, '2025-02-05', '2025-02-10', 2000000.00, 'completed', '2025-02-04 23:14:37', '2025-02-04 23:14:37');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_car`
--

CREATE TABLE `user_car` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_car`
--

INSERT INTO `user_car` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'User Car 1', 'user1@example.com', '$2y$12$POoXRO1jtt/SVSSgZvv0sO3WHu8JPRPUTGHmSDTebynjY1Gsvr80.', '2025-02-04 22:41:42', '2025-02-04 22:41:42'),
(2, 'User Car 2', 'user2@example.com', '$2y$12$nW/QIDjl7sJNV8sjizVeiO77u78yuVcrDq4QL2Vbl0o4SH5gkB4RC', '2025-02-04 22:41:42', '2025-02-04 22:41:42'),
(5, 'User Car 1', 'frontman12@gmail.com', '$2y$12$J.woJ4qBmpvWasSNxClQp.oWzJ.hNrColH6c1boxCFwX2dDWRZkCW', '2025-02-04 23:08:02', '2025-02-04 23:08:02'),
(6, 'User Car 2', 'frontman2@gmail.com', '$2y$12$ZSCSUIxK0KQguhlSqtbHE.J27sCdFm7DesrHDbtt4IpFuH5A6oAEa', '2025-02-04 23:08:03', '2025-02-04 23:08:03'),
(10, 'User Car 1', 'frontman1@gmail.com', '$2y$12$Vn5aBJFumXyBNKO0VMs8LumNRFN.SWjcmGWDeEu9h20WMZp3kpHL.', '2025-02-04 23:09:31', '2025-02-04 23:09:31'),
(11, 'User Car 2', 'squid2@gmail.com', '$2y$12$A3HeaMwit/AygneoW.KMgOT6snDy9shF/d2iqskCRQgzm54a7aiya', '2025-02-04 23:09:32', '2025-02-04 23:09:32'),
(12, 'User Car 2', 'goguma1@gmail.com', '$2y$12$1j6YzaFb6Vi4oAPeUuJZNOPTbGaJlSz/WKNjbzyORFcWGYnWthWWK', '2025-02-04 23:09:32', '2025-02-04 23:09:32'),
(19, 'User Car 1', 'slashed2@gmail.com', '$2y$12$lGxnKd.527j36acLX22iu.dm94itIp/.S07WieF4CnFFdpvnrJFKe', '2025-02-04 23:16:45', '2025-02-04 23:16:45'),
(20, 'User Car 2', 'trushed1@gmail.com', '$2y$12$jUhOoR.VPDbr5hNCrdB3ZOZKGtEmxUwPrXP2mN3s.2cT1LM18xgSC', '2025-02-04 23:16:45', '2025-02-04 23:16:45'),
(21, 'User Car 3', 'dracko5@gmail.com', '$2y$12$37HytxASTxI1gFz4syarBOqMcmHCf85Zx1bApW1wcHBdrEQwiZ8b2', '2025-02-04 23:16:45', '2025-02-04 23:16:45');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_user_id_foreign` (`user_id`),
  ADD KEY `rentals_car_id_foreign` (`car_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `user_car`
--
ALTER TABLE `user_car`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_car_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_car`
--
ALTER TABLE `user_car`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rentals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_car` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
