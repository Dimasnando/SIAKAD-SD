-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 08, 2024 at 03:19 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s_akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `haris`
--

CREATE TABLE `haris` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `haris`
--

INSERT INTO `haris` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Senin', '2023-10-29 10:10:44', '2023-10-29 10:10:44'),
(2, 'Selasa', '2023-10-29 10:10:51', '2023-10-29 10:10:51'),
(3, 'Rabu', '2023-10-29 10:11:03', '2023-10-29 10:11:03'),
(4, 'Kamis', '2023-10-29 10:11:13', '2023-10-29 10:11:13'),
(6, 'Jumat', '2023-10-29 10:11:29', '2023-10-29 10:11:29'),
(7, 'Sabtu', '2023-10-29 10:11:36', '2023-10-29 10:11:36');

-- --------------------------------------------------------

--
-- Table structure for table `informases`
--

CREATE TABLE `informases` (
  `id` int NOT NULL,
  `foto` varchar(255) NOT NULL,
  `isi` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informases`
--

INSERT INTO `informases` (`id`, `foto`, `isi`, `created_at`, `updated_at`) VALUES
(1, '1698652549_Screenshot_1.png', 'ini nah isi', '2023-10-30 07:55:49', '2023-10-30 07:55:49'),
(2, '1698655160_WhatsApp Image 2023-10-26 at 10.53.41 (1).jpeg', 'nah he lorem', '2023-10-30 08:39:20', '2023-10-30 08:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `jadwals`
--

CREATE TABLE `jadwals` (
  `id` int NOT NULL,
  `kelas_id` int NOT NULL,
  `mapel_id` int NOT NULL,
  `tahun_id` int NOT NULL,
  `pegawai_id` int NOT NULL,
  `hari_id` int NOT NULL,
  `jam` varchar(100) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwals`
--

INSERT INTO `jadwals` (`id`, `kelas_id`, `mapel_id`, `tahun_id`, `pegawai_id`, `hari_id`, `jam`, `created_at`, `updated_at`) VALUES
(13, 31, 148, 1, 9, 7, '10:00', '2023-12-14 04:06:29', '2023-12-25 06:48:20'),
(14, 31, 149, 1, 9, 1, '10:00', '2023-12-14 04:07:26', '2023-12-14 04:07:26'),
(16, 31, 154, 1, 9, 1, '14:37', '2023-12-25 07:36:02', '2023-12-25 07:36:02');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_siswas`
--

CREATE TABLE `jadwal_siswas` (
  `id` int NOT NULL,
  `pegawai_id` int NOT NULL,
  `jadwal_id` int NOT NULL,
  `siswa_id` int NOT NULL,
  `tahun_id` int NOT NULL,
  `kelas_id` int NOT NULL,
  `mapel_id` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `jadwal_siswas`
--

INSERT INTO `jadwal_siswas` (`id`, `pegawai_id`, `jadwal_id`, `siswa_id`, `tahun_id`, `kelas_id`, `mapel_id`, `created_at`, `updated_at`) VALUES
(18, 9, 13, 10, 1, 31, 148, '2023-12-14 04:06:35', '2023-12-14 04:06:35'),
(19, 9, 14, 10, 1, 31, 149, '2023-12-14 04:07:34', '2023-12-14 04:07:34'),
(20, 9, 13, 11, 1, 31, 148, '2023-12-14 05:11:27', '2023-12-14 05:11:27'),
(21, 9, 16, 10, 1, 31, 154, '2023-12-25 07:36:14', '2023-12-25 07:36:14'),
(22, 9, 16, 13, 1, 31, 154, '2023-12-25 07:36:18', '2023-12-25 07:36:18'),
(23, 9, 14, 11, 1, 31, 149, '2023-12-27 08:11:02', '2023-12-27 08:11:02'),
(24, 9, 13, 13, 1, 31, 148, '2023-12-27 08:32:58', '2023-12-27 08:32:58');

-- --------------------------------------------------------

--
-- Table structure for table `kelases`
--

CREATE TABLE `kelases` (
  `id` int NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pegawai_id` int NOT NULL,
  `tahun_id` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelases`
--

INSERT INTO `kelases` (`id`, `kelas`, `nama`, `pegawai_id`, `tahun_id`, `created_at`, `updated_at`) VALUES
(31, '1', 'A', 11, 1, '2023-12-13 08:29:54', '2023-12-13 08:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `mapels`
--

CREATE TABLE `mapels` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapels`
--

INSERT INTO `mapels` (`id`, `uuid`, `nama`, `created_at`, `updated_at`) VALUES
(148, '6d1ccc81-77f0-42c3-a587-5ed7f57d67b4', 'Bahasa Indonesia', '2023-12-13 01:30:06', '2023-12-24 23:11:46'),
(149, '94487960-b927-4908-8cd9-45a0282c5e87', 'Matematika', '2023-12-13 20:58:15', '2023-12-24 23:11:57'),
(150, '8648e448-4ed0-495d-abf8-e886b501baed', 'Seni', '2023-12-24 23:12:06', '2023-12-24 23:12:06'),
(151, '811ad07a-41ef-4270-9ff2-eddc19b0c770', 'Pendidikan Agama', '2023-12-24 23:12:16', '2023-12-24 23:12:16'),
(152, 'f2dd0d2b-9c67-468b-a8fa-1a1c5e7ba33a', 'Pendidikan Jasmani', '2023-12-24 23:12:26', '2023-12-24 23:12:26'),
(153, '351b30c1-937b-4854-ab20-7c5b36bf6276', 'Bahasa Inggris', '2023-12-24 23:12:34', '2023-12-24 23:12:34'),
(154, '7934ea49-dc54-4df7-b15d-55932caf68be', 'Baca Tulis Al-Qur\'an', '2023-12-24 23:13:03', '2023-12-24 23:13:03'),
(155, '6ab39d67-56d5-4684-97de-6adfd2d6c611', 'IPAS', '2023-12-24 23:13:08', '2023-12-24 23:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_10_135219_create_pendaftars_table', 1),
(6, '2023_04_10_135243_create_pembayarans_table', 1),
(7, '2023_04_10_140025_create_siswas_table', 1),
(8, '2023_04_10_143050_create_mapels_table', 1),
(9, '2023_04_10_143122_create_pegawais_table', 1),
(10, '2023_04_11_005442_create_nilais_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilais`
--

CREATE TABLE `nilais` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pegawai_id` int NOT NULL,
  `jadwal_id` int NOT NULL,
  `jadwal_siswa_id` int NOT NULL,
  `nilai` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa_id` int DEFAULT NULL,
  `tahun_id` int DEFAULT NULL,
  `kelas_id` int DEFAULT NULL,
  `mapel_id` int NOT NULL,
  `jenis` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilais`
--

INSERT INTO `nilais` (`id`, `uuid`, `pegawai_id`, `jadwal_id`, `jadwal_siswa_id`, `nilai`, `siswa_id`, `tahun_id`, `kelas_id`, `mapel_id`, `jenis`, `created_at`, `updated_at`) VALUES
(77, '3a93e7e1-cd26-4548-8126-a96d87c38ef6', 9, 13, 18, '80', 10, 1, 31, 148, 'harian', '2023-12-13 21:12:09', '2023-12-13 21:12:09'),
(78, '07fef32a-3fce-4fb4-aa73-040a8fa0d914', 9, 13, 18, '90', 10, 1, 31, 148, 'pts', '2023-12-13 21:12:20', '2023-12-13 21:12:20'),
(79, '700a51d2-edc6-42a0-aa16-64c8be130a80', 9, 13, 18, '100', 10, 1, 31, 148, 'pas', '2023-12-13 21:12:27', '2023-12-13 21:12:27'),
(80, '3ea19625-f9da-4d58-ad2e-e406759315c7', 9, 14, 19, '10', 10, 1, 31, 149, 'harian', '2023-12-13 21:13:10', '2023-12-13 21:13:10'),
(81, '015f1295-4c98-4dc3-9c90-fc28687c9bbf', 9, 14, 19, '20', 10, 1, 31, 149, 'pts', '2023-12-13 21:13:16', '2023-12-13 21:13:16'),
(82, '2e473a71-b38e-4ee0-9931-189e7cd3e458', 9, 14, 19, '30', 10, 1, 31, 149, 'pas', '2023-12-13 21:13:22', '2023-12-13 21:13:22'),
(83, '34ad4816-5c64-409a-954a-85128981997c', 9, 13, 20, '50', 11, 1, 31, 148, 'harian', '2023-12-13 22:11:57', '2023-12-13 22:11:57'),
(85, '2588e84b-0b98-4d5f-80a3-9db18993aa4e', 9, 16, 22, '90', 13, 1, 31, 154, 'harian', '2023-12-25 00:39:53', '2023-12-25 00:39:53'),
(86, 'b46c18dd-21cd-4fb1-be39-172ebba797c6', 9, 14, 23, '60', 11, 1, 31, 149, 'harian', '2023-12-27 01:11:26', '2023-12-27 01:11:26'),
(87, '2f331581-cbef-45a6-89ca-0959d91c738d', 9, 14, 23, '70', 11, 1, 31, 149, 'pts', '2023-12-27 01:11:31', '2023-12-27 01:11:31'),
(88, '845785ee-0285-473a-b1da-3785bac7da54', 9, 14, 23, '80', 11, 1, 31, 149, 'pas', '2023-12-27 01:11:36', '2023-12-27 01:11:36'),
(89, '3eccdf28-1e46-4eed-ba36-491ba2afab81', 9, 13, 24, '100', 13, 1, 31, 148, 'harian', '2023-12-27 01:33:33', '2023-12-27 01:33:33'),
(90, 'c035c4f3-31ae-4aac-82ea-4091514d103f', 9, 13, 24, '80', 13, 1, 31, 148, 'pts', '2023-12-27 01:33:39', '2023-12-27 01:33:39'),
(91, '4a21e16e-825a-4cf4-a619-310d7f021528', 9, 13, 24, '80', 13, 1, 31, 148, 'pas', '2023-12-27 01:33:46', '2023-12-27 01:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawais`
--

CREATE TABLE `pegawais` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawais`
--

INSERT INTO `pegawais` (`id`, `uuid`, `nama`, `nip`, `jabatan`, `created_at`, `updated_at`) VALUES
(8, '1d79c7c8-e479-44b6-89bb-1a8a8705b051', 'DELNEDI ZISWAN, M.Pd', '19701223 200701 1 007', 'Kepsek', '2023-05-10 18:52:50', '2023-05-21 00:24:01'),
(9, '27613d0d-0c9a-4db8-a199-3690408f2710', 'EKO PURWADI, S.Si', '19810208 200803 1 001', 'Guru', '2023-05-21 00:24:46', '2023-05-21 00:24:46'),
(10, '9023262e-d638-4422-9872-fef1b3e42c6c', 'EKO SAPUTRO, S.Pd', '19760107 201001 1 004', 'Guru', '2023-05-21 00:26:00', '2023-05-21 00:26:00'),
(11, '061698d0-6243-477d-a38e-8b574b953618', 'SUMINI, S.Ag', '197101052007012006', 'Guru', '2023-05-21 00:26:30', '2023-05-21 00:26:30'),
(12, '18584f91-faff-4f51-b50b-8126c3dd51c8', 'SU\'IB, S.Ag', '197310042008011001', 'Guru', '2023-05-21 00:27:03', '2023-09-28 01:31:38'),
(58, 'fe8885c0-ad02-45f9-8faa-6716427ef69a', 'MARYATI, S.IP', '-', 'Staff', '2023-05-21 00:59:56', '2023-05-21 00:59:56'),
(59, '48adfcbc-3595-4df8-87e5-ac3e978020a2', 'HARIADI', '-', 'Staff', '2023-05-21 01:00:27', '2023-05-21 01:00:27'),
(60, '84b8eef6-5134-4e9b-b093-47987f62136b', 'NUR CAHYANTO', '-', 'Staff', '2023-05-21 01:00:54', '2023-05-21 01:00:54'),
(61, 'b747ad81-dc36-45e7-b3a4-e8d70bc5b507', 'M. DEFRI GUSTIAN', '-', 'Staff', '2023-05-21 01:01:14', '2023-05-21 01:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`id`, `uuid`, `nama`, `jk`, `tempat`, `ttl`, `alamat`, `nis`, `hp`, `created_at`, `updated_at`) VALUES
(10, '4d14f0f5-fdea-4b80-91ea-852bbf2023c0', 'Bedul', 'Laki-Laki', 'Jakarta', '2023-10-27', 'lambur 5', '11123235499', '085215156165456', '2023-10-27 00:09:40', '2023-10-27 00:11:01'),
(11, 'e4e3cc8c-cbca-4f49-af1a-a18d0ef69364', 'Samsul', 'Laki-Laki', 'Jambi', '1999-01-08', 'Pondok', '9789078967', '0811565464', '2023-10-29 06:00:07', '2023-10-29 06:00:07'),
(12, 'e4e3cc8c-cbca-4f49-af1a-a18d0ef69364', 'Sugiharto\r\n', 'Laki-Laki', 'Jambi', '1999-01-08', 'Pondok', '9789078967', '0811565464', '2023-10-29 06:00:07', '2023-10-29 06:00:07'),
(13, 'e4e3cc8c-cbca-4f49-af1a-a18d0ef69364', 'Tukiyem\r\n', 'Laki-Laki', 'Jambi', '1999-01-08', 'Pondok', '9789078967', '0811565464', '2023-10-29 06:00:07', '2023-10-29 06:00:07'),
(14, 'e4e3cc8c-cbca-4f49-af1a-a18d0ef69364', 'Brandon\r\n', 'Laki-Laki', 'Jambi', '1999-01-08', 'Pondok', '9789078967', '0811565464', '2023-10-29 06:00:07', '2023-10-29 06:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `tahuns`
--

CREATE TABLE `tahuns` (
  `id` int NOT NULL,
  `nama` varchar(225) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahuns`
--

INSERT INTO `tahuns` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, '2023', '2023-10-27 07:43:30', '2023-10-27 07:50:23'),
(2, '2024', '2023-10-30 07:40:37', '2023-10-30 07:40:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Dev','Guru','Siswa') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pegawai_id` int DEFAULT NULL,
  `siswa_id` int DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `role`, `name`, `username`, `email`, `email_verified_at`, `password`, `pegawai_id`, `siswa_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '756e6a13-4e27-4525-a327-c5b4b60d1249', 'Dev', 'Admin', 'admin', NULL, NULL, '$2y$10$WXZFYE1wqkaGxWP.6EU/KOGTO15f9wKBx8vpGvS4Z5F/rEmzNmHke', NULL, NULL, NULL, '2023-04-10 17:57:04', '2023-04-10 17:57:04'),
(17, 'd48b1964-afde-4a19-8192-8db7d555657b', 'Guru', NULL, 'ekopur', NULL, NULL, '$2y$10$1oWCzQ4rLgGSCb1S4MeXX.unfl2QvCPx4EQJ8OmQdRiA2wzhGo8ue', 9, NULL, NULL, '2023-10-29 05:58:51', '2023-10-30 00:25:18'),
(18, '81da124a-3554-4115-b1f2-b6dd61146e8f', 'Siswa', NULL, 'bedul', NULL, NULL, '$2y$10$5eSPbyU8cGS3o3MM82q4mu6iyojnQr75EvOsvHdopK6400xo/4Rzu', NULL, 10, NULL, '2023-10-29 20:06:33', '2023-10-30 00:25:52'),
(19, 'd24039b8-341d-48ef-ae30-9c421b1c1ef1', 'Guru', NULL, 'mini', NULL, NULL, '$2y$10$tKi7e72FetHc8KaXZNBI.ehyx5iDijt.3VgL9RSzjJiT265DuQbcC', 11, NULL, NULL, '2023-11-16 18:34:46', '2023-11-16 18:34:46');

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
-- Indexes for table `haris`
--
ALTER TABLE `haris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informases`
--
ALTER TABLE `informases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_siswas`
--
ALTER TABLE `jadwal_siswas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelases`
--
ALTER TABLE `kelases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapels`
--
ALTER TABLE `mapels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_siswa_id` (`jadwal_siswa_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahuns`
--
ALTER TABLE `tahuns`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `haris`
--
ALTER TABLE `haris`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `informases`
--
ALTER TABLE `informases`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jadwal_siswas`
--
ALTER TABLE `jadwal_siswas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kelases`
--
ALTER TABLE `kelases`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `mapels`
--
ALTER TABLE `mapels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tahuns`
--
ALTER TABLE `tahuns`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nilais`
--
ALTER TABLE `nilais`
  ADD CONSTRAINT `nilais_ibfk_1` FOREIGN KEY (`jadwal_siswa_id`) REFERENCES `jadwal_siswas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
