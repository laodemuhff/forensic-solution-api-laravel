-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Agu 2019 pada 18.23
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `apps`
--

CREATE TABLE `apps` (
  `id_aplikasi` int(10) NOT NULL,
  `nama_aplikasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `apps`
--

INSERT INTO `apps` (`id_aplikasi`, `nama_aplikasi`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Autopsy', NULL, '2019-08-08 12:48:34', '2019-08-08 12:48:34'),
(2, 'Encase', NULL, '2019-08-08 12:48:55', '2019-08-08 12:48:55'),
(3, 'Foremost', NULL, '2019-08-08 12:49:01', '2019-08-08 12:49:01'),
(4, 'FTK/LAB', NULL, '2019-08-08 12:49:08', '2019-08-08 12:49:08'),
(5, 'F-Response', NULL, '2019-08-08 12:49:17', '2019-08-08 12:49:17'),
(6, 'FTK Imager', NULL, '2019-08-08 12:49:40', '2019-08-08 12:49:40'),
(7, 'IEF', NULL, '2019-08-08 12:49:46', '2019-08-08 12:49:46'),
(8, 'Redline', NULL, '2019-08-08 12:49:54', '2019-08-08 12:49:54'),
(9, 'Regripper', NULL, '2019-08-08 12:50:06', '2019-08-08 12:50:06'),
(10, 'SkypeAlyzer', NULL, '2019-08-08 13:11:14', '2019-08-08 13:11:14'),
(11, 'Volatility', NULL, '2019-08-08 13:11:31', '2019-08-08 13:11:31'),
(12, 'X-Ways', NULL, '2019-08-08 13:11:37', '2019-08-08 13:11:37'),
(13, 'Santoku', NULL, '2019-08-08 13:11:43', '2019-08-08 13:11:43'),
(14, 'DEFT', NULL, '2019-08-08 13:11:49', '2019-08-08 13:11:49'),
(15, 'PALADIN', NULL, '2019-08-08 13:11:55', '2019-08-08 13:11:55'),
(16, 'SANS', NULL, '2019-08-08 13:12:00', '2019-08-08 13:12:00'),
(17, 'AFLogical OSE', NULL, '2019-08-08 13:12:08', '2019-08-08 13:12:08'),
(18, 'Laron', NULL, '2019-08-08 13:12:13', '2019-08-08 13:12:13'),
(19, 'Andriler', NULL, '2019-08-08 13:12:23', '2019-08-08 13:12:23'),
(20, 'UFED', NULL, '2019-08-08 13:12:26', '2019-08-08 13:12:26'),
(21, 'XRY', NULL, '2019-08-08 13:12:32', '2019-08-08 13:12:32'),
(22, 'MOBILedit', NULL, '2019-08-08 13:12:40', '2019-08-08 13:12:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aturan`
--

CREATE TABLE `aturan` (
  `id_aturan` int(10) NOT NULL,
  `nama_aturan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `chars`
--

CREATE TABLE `chars` (
  `id_karakteristik` int(10) NOT NULL,
  `nama_karakteristik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_karakteristik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `chars`
--

INSERT INTO `chars` (`id_karakteristik`, `nama_karakteristik`, `jenis_karakteristik`, `created_at`, `updated_at`) VALUES
(1, 'very easy', 'required skill', '2019-07-20 02:03:50', '2019-07-20 02:03:50'),
(2, 'easy', 'required skill', '2019-07-20 02:07:16', '2019-07-20 02:07:16'),
(3, 'medium', 'required skill', '2019-07-20 02:07:25', '2019-07-20 02:07:25'),
(4, 'difficult', 'required skill', '2019-07-20 02:07:38', '2019-07-20 02:07:38'),
(7, 'very difficult', 'required skill', '2019-08-08 13:16:55', '2019-08-08 13:16:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gabungan`
--

CREATE TABLE `gabungan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_aturan` int(10) NOT NULL,
  `id_karakteristik` int(10) NOT NULL,
  `id_aplikasi` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_aturan` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_10_06_141110_create_aplikasi_table', 1),
(2, '2018_10_06_141110_create_karakteristik_table', 2),
(3, '2018_10_06_141110_create_aturan_table', 3),
(4, '2019_10_06_141110_create_aturan_table', 4),
(5, '2018_10_06_141110_create_history_table', 5),
(6, '2019_10_06_141110_create_gabungan_table', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `admin`) VALUES
(1, 'Hanif Rizal', 'hanifrizal@outlook.com', NULL, '$2y$10$QTMOBVmQ.0m4sVqFihSDIOGHEShBhiQsRxcA/nPTqXIDVaz.nBzkW', 'qeXFiCK2IK0HAGGtO7EiQXy53ELvE8BsO0gw9cxkWDFT5t3Z4PSeaVmJyMgV', '2019-03-30 03:30:56', '2019-03-30 03:31:36', 1),
(2, 'investigator', 'investigator@gmail.com', NULL, '$2y$10$0j/gHlJS.6mnqOfVLvI1C.ifkRJ.vUvZn884CAxNlwfgdKaRXKVeG', NULL, '2019-07-16 05:48:58', '2019-07-17 09:06:37', 0),
(3, 'asdasda', 'aasdas@gmail.com', NULL, '$2y$10$PD49GG.LknOsKM75nQPdje1A2iE3apaEf3IuankkuB.GA7KYosmQO', NULL, '2019-08-08 10:48:13', '2019-08-08 10:48:13', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`id_aplikasi`);

--
-- Indeks untuk tabel `aturan`
--
ALTER TABLE `aturan`
  ADD PRIMARY KEY (`id_aturan`);

--
-- Indeks untuk tabel `chars`
--
ALTER TABLE `chars`
  ADD PRIMARY KEY (`id_karakteristik`);

--
-- Indeks untuk tabel `gabungan`
--
ALTER TABLE `gabungan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aturan` (`id_aturan`),
  ADD KEY `id_karakteristik` (`id_karakteristik`),
  ADD KEY `id_aplikasi` (`id_aplikasi`);

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_aturan` (`id_aturan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `apps`
--
ALTER TABLE `apps`
  MODIFY `id_aplikasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `aturan`
--
ALTER TABLE `aturan`
  MODIFY `id_aturan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `chars`
--
ALTER TABLE `chars`
  MODIFY `id_karakteristik` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `gabungan`
--
ALTER TABLE `gabungan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gabungan`
--
ALTER TABLE `gabungan`
  ADD CONSTRAINT `fk_gabungan_aplikasi` FOREIGN KEY (`id_aplikasi`) REFERENCES `apps` (`id_aplikasi`),
  ADD CONSTRAINT `fk_gabungan_aturan` FOREIGN KEY (`id_aturan`) REFERENCES `aturan` (`id_aturan`),
  ADD CONSTRAINT `fk_gabungan_karakteristik` FOREIGN KEY (`id_karakteristik`) REFERENCES `chars` (`id_karakteristik`);

--
-- Ketidakleluasaan untuk tabel `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `fk_history_aturan` FOREIGN KEY (`id_aturan`) REFERENCES `aturan` (`id_aturan`),
  ADD CONSTRAINT `fk_history_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
