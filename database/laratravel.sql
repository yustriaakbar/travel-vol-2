-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 08:04 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laratravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `asal`
--

CREATE TABLE `asal` (
  `kd_asal` bigint(20) UNSIGNED NOT NULL,
  `kota_asal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jalan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asal`
--

INSERT INTO `asal` (`kd_asal`, `kota_asal`, `nama_jalan`) VALUES
(1, 'NGANJUK', 'Jl. Dr. Sutomo 6 No.02, Bogo Kidul, Bogo');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `kd_bank` bigint(20) UNSIGNED NOT NULL,
  `nasabah_bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rekening_bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`kd_bank`, `nasabah_bank`, `nama_bank`, `rekening_bank`, `photo`) VALUES
(1, 'Yustria Akbar', 'BNI', '8-888-888-888', 'frontend/img/bank/bni-icon.jpg'),
(2, 'Yustria Akbar', 'MANDIRI', '8-888-888-888', 'frontend/img/bank/mandiri-icon.jpg'),
(3, 'Yustria Akbar', 'BCA', '8-888-888-888', 'frontend/img/bank/bca-icon.jpg'),
(4, 'Yustria Akbar', 'BRI', '8-888-888-888', 'frontend/img/bank/bri-icon.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `kd_jadwal` bigint(20) UNSIGNED NOT NULL,
  `kd_mobil` bigint(20) UNSIGNED NOT NULL,
  `kd_tujuan` bigint(20) UNSIGNED NOT NULL,
  `kd_asal` bigint(20) UNSIGNED NOT NULL,
  `jam_berangkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_tiba` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`kd_jadwal`, `kd_mobil`, `kd_tujuan`, `kd_asal`, `jam_berangkat`, `jam_tiba`, `harga`) VALUES
(1, 1, 2, 1, '07:00:00', '09:30:00', '100000'),
(2, 2, 1, 1, '08:00:00', '10:30:00', '100000'),
(3, 3, 4, 1, '09:30:00', '15:00:00', '140000'),
(4, 4, 3, 1, '08:30:00', '13:00:00', '120000');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `kd_konfirmasi` bigint(20) UNSIGNED NOT NULL,
  `kd_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rekening` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_transfer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2020_10_08_072928_create_tujuan_table', 2),
(5, '2020_10_08_072958_create_asal_table', 2),
(6, '2020_10_08_073017_create_mobil_table', 2),
(7, '2020_10_08_073027_create_jadwal_table', 2),
(8, '2020_10_13_200436_create_bank_table', 3),
(9, '2020_10_13_200500_create_order_table', 3),
(11, '2020_10_14_153423_add_column_on_users_table', 4),
(13, '2020_10_13_200515_create_konfirmasi_table', 5),
(14, '2020_10_22_002434_create_tiket_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `kd_mobil` bigint(20) UNSIGNED NOT NULL,
  `nama_mobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plat_mobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas_mobil` int(255) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`kd_mobil`, `nama_mobil`, `plat_mobil`, `kapasitas_mobil`, `status`) VALUES
(1, 'ELF2009', 'AG 4514 BLN\r\n', 14, '1'),
(2, 'ELF2010', 'AG 4891 BLN', 14, '1'),
(3, 'ELF2011', 'AG 1320 BTN', 14, '1'),
(4, 'ELF2012', 'AG 1026 TRL', 14, '1');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` bigint(20) UNSIGNED NOT NULL,
  `kd_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kd_tiket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kd_jadwal` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `kd_bank` bigint(20) UNSIGNED NOT NULL,
  `nama_pemesan_tiket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_beli_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_berangkat_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penumpang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ktp_penumpang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kursi_penumpang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `kd_order`, `kd_tiket`, `kd_jadwal`, `id_user`, `kd_bank`, `nama_pemesan_tiket`, `tgl_beli_order`, `tgl_berangkat_order`, `nama_penumpang`, `ktp_penumpang`, `no_kursi_penumpang`, `expired_order`, `status_order`) VALUES
(44, 'vUzrRQ', 'R5iBxY', 1, 1, 2, 'Yustria Akbar', '2020-11-22 01:44:20', '2020-11-25', 'yustria', '123456', '1', '2020-11-23 01:44:20', '2'),
(45, 'vUzrRQ', 'R5iBxY', 1, 1, 2, 'Yustria Akbar', '2020-11-22 01:44:20', '2020-11-25', 'akbar', '123456', '2', '2020-11-23 01:44:20', '2');

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
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_tiket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_jadwal` bigint(20) UNSIGNED NOT NULL,
  `nama_tiket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kursi_tiket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ktp_penumpang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_tiket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_tiket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_tiket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_tgl_tiket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id`, `kd_order`, `kd_tiket`, `kd_jadwal`, `nama_tiket`, `kursi_tiket`, `ktp_penumpang`, `harga_tiket`, `photo_tiket`, `status_tiket`, `create_tgl_tiket`, `create_admin`) VALUES
(6, 'vUzrRQ', 'R5iBxY', 1, 'yustria', '1', '123456', 'Rp. 200.000', NULL, '2', '2020-11-22 01:48:22', 'Yustria Akbar'),
(7, 'vUzrRQ', 'R5iBxY', 1, 'akbar', '2', '123456', 'Rp. 200.000', NULL, '2', '2020-11-22 01:48:22', 'Yustria Akbar');

-- --------------------------------------------------------

--
-- Table structure for table `tujuan`
--

CREATE TABLE `tujuan` (
  `kd_tujuan` bigint(20) UNSIGNED NOT NULL,
  `kota_tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jalan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tujuan`
--

INSERT INTO `tujuan` (`kd_tujuan`, `kota_tujuan`, `nama_jalan`) VALUES
(1, 'SURABAYA', NULL),
(2, 'MALANG', NULL),
(3, 'YOGYAKARTA', NULL),
(4, 'SEMARANG', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tlp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_ktp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `img`, `tlp`, `no_ktp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Yustria Akbar', 'admin@gmail.com', NULL, '$2y$10$DfwXQi/PZQsSsWdCgPUuuuDBBYHWCQx1yHRqlNhX1kmopc2fu7LGK', NULL, 'admin', NULL, '082145672762', '3518112012990008', 'Jl. Bumi marina emas barat IV no. 61', '2020-10-07 10:42:55', '2020-10-07 10:42:55'),
(2, 'Pemesan', 'pemesan@gmail.com', NULL, '$2y$10$g5wI/7B3CbSQGows8gcHOeJsC7R6ROWiob/RUqH1js7KiS.b9kDL2', NULL, 'pelanggan', NULL, '082232427593', '33171210980006', 'Jl. A Yani No. 61', '2020-10-14 08:19:40', '2020-10-14 08:19:40'),
(16, 'pelanggan 2', 'pelanggan2@gmail.com', NULL, '$2y$10$g5wI/7B3CbSQGows8gcHOeJsC7R6ROWiob/RUqH1js7KiS.b9kDL2', NULL, 'pelanggan', NULL, '082234567987', '123456778', 'nganjuk', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asal`
--
ALTER TABLE `asal`
  ADD PRIMARY KEY (`kd_asal`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`kd_bank`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kd_jadwal`),
  ADD KEY `jadwal_kd_mobil_foreign` (`kd_mobil`),
  ADD KEY `jadwal_kd_tujuan_foreign` (`kd_tujuan`),
  ADD KEY `jadwal_kd_asal_foreign` (`kd_asal`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`kd_konfirmasi`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`kd_mobil`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `order_kd_jadwal_foreign` (`kd_jadwal`),
  ADD KEY `order_id_user_foreign` (`id_user`),
  ADD KEY `order_kd_bank_foreign` (`kd_bank`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tiket_kd_jadwal_foreign` (`kd_jadwal`);

--
-- Indexes for table `tujuan`
--
ALTER TABLE `tujuan`
  ADD PRIMARY KEY (`kd_tujuan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asal`
--
ALTER TABLE `asal`
  MODIFY `kd_asal` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `kd_bank` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `kd_jadwal` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `kd_konfirmasi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `kd_mobil` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `kd_tujuan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_kd_asal_foreign` FOREIGN KEY (`kd_asal`) REFERENCES `asal` (`kd_asal`),
  ADD CONSTRAINT `jadwal_kd_mobil_foreign` FOREIGN KEY (`kd_mobil`) REFERENCES `mobil` (`kd_mobil`),
  ADD CONSTRAINT `jadwal_kd_tujuan_foreign` FOREIGN KEY (`kd_tujuan`) REFERENCES `tujuan` (`kd_tujuan`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `order_kd_bank_foreign` FOREIGN KEY (`kd_bank`) REFERENCES `bank` (`kd_bank`),
  ADD CONSTRAINT `order_kd_jadwal_foreign` FOREIGN KEY (`kd_jadwal`) REFERENCES `jadwal` (`kd_jadwal`);

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_kd_jadwal_foreign` FOREIGN KEY (`kd_jadwal`) REFERENCES `jadwal` (`kd_jadwal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
