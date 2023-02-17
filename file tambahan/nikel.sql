-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2023 at 03:22 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nikel`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kendaraans`
--

CREATE TABLE `jadwal_kendaraans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kendaraan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_kendaraans`
--

INSERT INTO `jadwal_kendaraans` (`id`, `tanggal`, `status`, `kendaraan_id`, `created_at`, `updated_at`) VALUES
(1, '2023-02-16', 'telah diservice', 1, '2023-02-16 11:55:59', '2023-02-16 12:02:44'),
(2, '2023-02-11', 'telah diservice', 1, '2023-02-16 12:05:02', '2023-02-16 12:05:38');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraans`
--

CREATE TABLE `kendaraans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_inventaris` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nopol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kendaraan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konsumsi_bbm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kendaraans`
--

INSERT INTO `kendaraans` (`id`, `nomor_inventaris`, `merk`, `nopol`, `jenis_kendaraan`, `konsumsi_bbm`, `status`, `created_at`, `updated_at`) VALUES
(1, 'KPS100001AO', 'Honda Brio Satya S', 'B 7896 UUT', 'Angkutan Orang', '18', 'menunggu persetujuan', '2023-02-16 05:53:09', '2023-02-16 05:53:09'),
(2, 'KCB100001AO', 'Daihatsu Ayla 1.0L X AT DLX', 'D 7634 NYT', 'Angkutan Orang', '20', 'tersedia', '2023-02-16 05:53:50', '2023-02-16 09:40:39'),
(3, 'KPS200001AB', 'Suzuki Carry Flat Deck', 'B 2683 UKL', 'Angkutan Barang', '10', 'menunggu persetujuan', '2023-02-16 05:54:41', '2023-02-16 18:16:17'),
(4, 'KCB200001AB', 'Hino Ranger Dump FM 340', 'D 6739 BVT', 'Angkutan Barang', '14', 'tersedia', '2023-02-16 05:55:10', '2023-02-16 05:55:10');

-- --------------------------------------------------------

--
-- Table structure for table `laporans`
--

CREATE TABLE `laporans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_laporan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persetujuan_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persetujuan_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kendaraan_id` bigint(20) UNSIGNED NOT NULL,
  `user_id_1` bigint(20) UNSIGNED NOT NULL,
  `user_id_2` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporans`
--

INSERT INTO `laporans` (`id`, `no_laporan`, `nik`, `nama`, `persetujuan_1`, `persetujuan_2`, `tanggal_peminjaman`, `tanggal_pengembalian`, `status`, `kendaraan_id`, `user_id_1`, `user_id_2`, `created_at`, `updated_at`) VALUES
(1, '1676561486-3', '3516032209820001', 'Mohammad Ilham Alfarizqi', 'telah disetujui', 'menunggu persetujuan', '2023-02-17', '2023-02-18', 'belum disetujui', 1, 2, 3, '2023-02-16 08:31:26', '2023-02-16 09:33:56'),
(2, '1676564066-3', '3516032209820008', 'Nova Green and Red', 'telah disetujui', 'telah disetujui', '2023-02-17', '2023-02-19', 'dikembalikan', 3, 4, 2, '2023-02-16 09:14:26', '2023-02-16 10:39:04'),
(3, '1676564262-2', '3516032209820999', 'ilham alfa', 'tidak disetujui', 'tidak disetujui', '2023-02-24', '2023-02-27', 'tidak disetujui', 2, 2, 5, '2023-02-16 09:17:42', '2023-02-16 09:40:39'),
(4, '1676596577-3', '546345789874532', 'Nova Green and Red', 'menunggu persetujuan', 'menunggu persetujuan', '2023-02-25', '2023-02-25', 'belum disetujui', 3, 3, 2, '2023-02-16 18:16:17', '2023-02-16 18:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_16_014727_create_kendaraans_table', 1),
(7, '2023_02_16_014833_create_jadwal_kendaraans_table', 1),
(8, '2023_02_16_014817_create_laporans_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nik`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'ADM999999999', 'admin@nikel.com', NULL, 1, '$2y$10$gRjGblUj4K5lHwvzaiOwLertSm8RuT36yuaj7U4ftKzIg5Dj2nFMK', NULL, '2023-02-16 05:45:00', '2023-02-16 12:17:33'),
(2, 'Manager', 'MNG111111111', 'manager@nikel.com', NULL, 0, '$2y$10$uUWtw4FEPIf.U1hJCZiR.eFcOfQGohNmgknrfmpZMXM7xxv8KQadS', NULL, '2023-02-16 05:45:35', '2023-02-16 05:45:35'),
(3, 'HRGA', 'HRG222222222', 'hrga@nikel.com', NULL, 0, '$2y$10$2hIUiIM7Z6hr7H4OIL7uL.JSkRXhr4zfP1R6zdFr0Schku/jjst/u', NULL, '2023-02-16 05:46:05', '2023-02-16 05:46:05'),
(4, 'Finance', 'FNC333333333', 'finance@nikel.com', NULL, 0, '$2y$10$qr9Ec1RwELer37dgjVFxaeI1GaoohSbl1istREleK/XlGPEYaPk0C', NULL, '2023-02-16 05:46:40', '2023-02-16 05:46:40'),
(5, 'Operation', 'OPR444444444', 'operation@nikel.com', NULL, 0, '$2y$10$PjJhaV13aBX0KWgq87gmLeJhWmXtjpYxPywh0KlRa8dXb5wC1aqh.', NULL, '2023-02-16 05:47:16', '2023-02-16 05:47:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwal_kendaraans`
--
ALTER TABLE `jadwal_kendaraans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_kendaraans_kendaraan_id_foreign` (`kendaraan_id`);

--
-- Indexes for table `kendaraans`
--
ALTER TABLE `kendaraans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kendaraans_nomor_inventaris_unique` (`nomor_inventaris`),
  ADD UNIQUE KEY `kendaraans_nopol_unique` (`nopol`);

--
-- Indexes for table `laporans`
--
ALTER TABLE `laporans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `laporans_no_laporan_unique` (`no_laporan`),
  ADD KEY `laporans_kendaraan_id_foreign` (`kendaraan_id`),
  ADD KEY `laporans_user_id_1_foreign` (`user_id_1`),
  ADD KEY `laporans_user_id_2_foreign` (`user_id_2`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nik_unique` (`nik`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_kendaraans`
--
ALTER TABLE `jadwal_kendaraans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kendaraans`
--
ALTER TABLE `kendaraans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `laporans`
--
ALTER TABLE `laporans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_kendaraans`
--
ALTER TABLE `jadwal_kendaraans`
  ADD CONSTRAINT `jadwal_kendaraans_kendaraan_id_foreign` FOREIGN KEY (`kendaraan_id`) REFERENCES `kendaraans` (`id`);

--
-- Constraints for table `laporans`
--
ALTER TABLE `laporans`
  ADD CONSTRAINT `laporans_kendaraan_id_foreign` FOREIGN KEY (`kendaraan_id`) REFERENCES `kendaraans` (`id`),
  ADD CONSTRAINT `laporans_user_id_1_foreign` FOREIGN KEY (`user_id_1`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `laporans_user_id_2_foreign` FOREIGN KEY (`user_id_2`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
