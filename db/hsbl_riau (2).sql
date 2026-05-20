-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2026 at 04:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hsbl_riau`
--

-- --------------------------------------------------------

--
-- Table structure for table `blacklist_teams`
--

CREATE TABLE `blacklist_teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kompetisiEventId` bigint(20) UNSIGNED NOT NULL,
  `statusBlackList` varchar(255) NOT NULL,
  `startDateBlackList` date NOT NULL,
  `endStartDateBlackList` date NOT NULL,
  `createdby` varchar(255) NOT NULL,
  `modby` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blacklist_teams`
--

INSERT INTO `blacklist_teams` (`id`, `kompetisiEventId`, `statusBlackList`, `startDateBlackList`, `endStartDateBlackList`, `createdby`, `modby`, `created_at`, `updated_at`) VALUES
(1, 1, 'false', '2026-04-05', '2026-04-11', '1', NULL, '2026-04-04 22:08:57', '2026-04-04 22:16:54'),
(2, 4, 'false', '2026-05-17', '2026-05-19', '12', NULL, '2026-05-17 00:46:49', '2026-05-17 04:20:08');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `datjerseys`
--

CREATE TABLE `datjerseys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `events_id` bigint(20) NOT NULL,
  `isHome` tinyint(1) NOT NULL,
  `path_jersey` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `datjerseys`
--

INSERT INTO `datjerseys` (`id`, `events_id`, `isHome`, `path_jersey`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'jersey/YR9oXefE28EuYQ3ekSbV7pfqGVqNEszTVUGKuAhr.jpg', '2026-05-09 21:38:25', '2026-05-09 21:38:25');

-- --------------------------------------------------------

--
-- Table structure for table `datkompetisis`
--

CREATE TABLE `datkompetisis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `seasonId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `datkompetisis`
--

INSERT INTO `datkompetisis` (`id`, `name`, `seasonId`, `created_at`, `updated_at`) VALUES
(5, 'Riau Pos HSBL Putra 2025', 2, '2026-03-28 06:34:25', '2026-03-28 06:34:25'),
(7, 'Riau Pos HSBL Putri 2025', 2, '2026-03-28 06:40:40', '2026-03-28 06:40:40'),
(8, 'Riau Pos HSBL Campur 2025', 2, '2026-05-02 04:35:32', '2026-05-02 04:35:32'),
(9, 'Riau Pos HSBL Putra 2026 SIAK', 4, '2026-05-16 21:13:29', '2026-05-16 21:13:29'),
(10, 'Riau Pos HSBL Putra 2026 Dumai', 5, '2026-05-17 01:49:44', '2026-05-17 01:49:44'),
(11, 'Kampung Durian Runtuh Putra', 7, '2026-05-20 04:31:43', '2026-05-20 04:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `datofficials`
--

CREATE TABLE `datofficials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `official_name` varchar(255) NOT NULL,
  `eventsId` bigint(20) NOT NULL,
  `path_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `datofficials`
--

INSERT INTO `datofficials` (`id`, `official_name`, `eventsId`, `path_image`, `created_at`, `updated_at`) VALUES
(5, 'Indomaret', 1, 'official/FTFYcJv4tJhi6WrCTCNVzWdlfovnTyxcPJWgi23v.jpg', '2026-05-09 20:18:56', '2026-05-09 20:37:08');

-- --------------------------------------------------------

--
-- Table structure for table `datrefroles`
--

CREATE TABLE `datrefroles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_role` varchar(255) NOT NULL,
  `createdby` varchar(255) NOT NULL,
  `modby` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `datrefroles`
--

INSERT INTO `datrefroles` (`id`, `nama_role`, `createdby`, `modby`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'AUTO', 'AUTO', '2026-03-01 13:25:49', '2026-03-01 13:25:49'),
(2, 'Admin', 'AUTO', 'AUTO', '2026-03-01 13:25:49', '2026-03-01 13:25:49'),
(3, 'User', 'AUTO', 'AUTO', '2026-03-01 13:25:49', '2026-03-01 13:25:49');

-- --------------------------------------------------------

--
-- Table structure for table `datusers`
--

CREATE TABLE `datusers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `wilayah` varchar(255) DEFAULT NULL,
  `kompetisi_event_id` varchar(255) DEFAULT NULL,
  `createdby` varchar(255) DEFAULT NULL,
  `modby` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `datusers`
--

INSERT INTO `datusers` (`id`, `username`, `password`, `email`, `phone`, `role`, `status`, `alamat`, `wilayah`, `kompetisi_event_id`, `createdby`, `modby`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$12$f3vyj0rvxKtvNveaMGrqOuCS/QjBLJdYiPZJeZcwCzbkLvBuWLc1S', 'admin@example.com', '123456789', '1', 'active', 'Jl. Admin No.1', NULL, NULL, '1', NULL, '2026-03-01 13:25:49', '2026-03-01 13:25:49'),
(2, 'AdminPekanbaru', '$2y$12$XzW3cXBZcjpQnxzOksavPenB7OpP/RuCUPDx.TvutppFtIwBp7P4K', 'admin@example.com', '123456789', '2', 'active', 'Jl. Pekanbaru No.1', '1', NULL, '1', NULL, '2026-03-01 13:25:49', '2026-03-01 13:25:49'),
(3, 'UserPekanbaru', '$2y$12$NnlirMuRElHk8Y8GH7OdL.hHqT0ez4oh/iYxTlY2t2ioRafiNv0HW', 'admin@example.com', '123456789', '3', 'active', 'Jl. Pekanbaru No.1', '1', NULL, '1', NULL, '2026-03-01 13:25:50', '2026-03-01 13:25:50'),
(11, 'adminMedan', '$2y$12$PHbDLb1rc9VHTEs8ZItjN.ESc4MdkPkHFOEjSYRGjSC6cvFvwn44m', 'adminMedan@gmail.com', '081212121212', '2', 'active', 'fasdf', '5', NULL, 'admin', NULL, '2026-05-16 21:12:20', '2026-05-16 21:12:20'),
(12, 'adminSiak', '$2y$12$iaInkF4AzWQRsb1gzvTbt.nWnnA87UH4lhMlFqRck0y69Z.lbZSva', 'adminSiak@gmail.com', '0812121212121', '2', 'active', 'fsdf', '5', NULL, 'admin', NULL, '2026-05-16 21:15:12', '2026-05-16 21:15:12'),
(13, 'usersm1siak', '$2y$12$gqPS6iuQfYpAgBxhauIn9eHjyv4P9ve83r/Mx5kdwG4tnkUNeQk1O', 'usersm1siak@gmail.com', '081212121333', '3', 'active', NULL, '5', '8,9', 'adminSiak', NULL, '2026-05-16 23:19:36', '2026-05-16 23:19:36'),
(14, 'Khairul', '$2y$12$BJ53rqbdskMOI5agI8XhOu0V0fvsJHhkYD0DWVUTX72V1F353JnQm', 'Khairul@gmail.com', '081212121331212', '3', 'active', NULL, '1', '4,6,7,1,5', 'AdminPekanbaru', '2', '2026-05-20 03:34:26', '2026-05-20 03:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `dat_events_scores`
--

CREATE TABLE `dat_events_scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kompetisi_id` bigint(20) NOT NULL,
  `firstTeam_id` bigint(20) NOT NULL,
  `secondTeam_id` bigint(20) NOT NULL,
  `datebegin` datetime NOT NULL,
  `time_begin` time NOT NULL,
  `score_first_teeam` int(11) DEFAULT NULL,
  `score_second_teeam` int(11) DEFAULT NULL,
  `isFinal` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dat_kompetisi_events`
--

CREATE TABLE `dat_kompetisi_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idSekolah` bigint(20) UNSIGNED NOT NULL,
  `namaTeam` varchar(255) NOT NULL,
  `idKompetisi` bigint(20) UNSIGNED NOT NULL,
  `idSeries` bigint(20) UNSIGNED NOT NULL,
  `leader` varchar(255) NOT NULL,
  `kunciData` varchar(255) NOT NULL,
  `verifData` varchar(255) NOT NULL,
  `createdby` bigint(20) UNSIGNED NOT NULL,
  `modby` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dat_kompetisi_events`
--

INSERT INTO `dat_kompetisi_events` (`id`, `idSekolah`, `namaTeam`, `idKompetisi`, `idSeries`, `leader`, `kunciData`, `verifData`, `createdby`, `modby`, `created_at`, `updated_at`) VALUES
(1, 1, 'lontong malam12', 7, 2, 'test12', 'true', 'true', 1, 1, '2026-04-04 09:01:25', '2026-04-05 06:08:53'),
(4, 1, 'pecal ayam', 5, 2, 'hendra', 'false', 'false', 1, NULL, '2026-04-05 06:10:08', '2026-04-05 06:10:08'),
(5, 1, 'The Squad', 8, 2, 'Budi', 'false', 'false', 1, NULL, '2026-05-02 04:36:29', '2026-05-02 04:36:29'),
(6, 1, 'The Squad2', 5, 2, 'Budi', 'false', 'false', 1, NULL, '2026-05-11 00:42:32', '2026-05-11 00:42:32'),
(7, 1, 'The Squad3', 5, 2, 'Budi3', 'false', 'false', 1, NULL, '2026-05-11 00:43:07', '2026-05-11 00:43:07'),
(8, 3, 'lontong gulai', 9, 4, 'budi', 'false', 'true', 1, 1, '2026-05-16 23:10:06', '2026-05-17 00:58:31'),
(9, 3, 'lontong malam', 9, 4, 'anton', 'false', 'false', 1, NULL, '2026-05-16 23:10:30', '2026-05-16 23:10:30'),
(10, 4, 'lontong pical', 9, 4, 'supri', 'false', 'true', 1, 12, '2026-05-16 23:15:55', '2026-05-17 00:06:57'),
(11, 5, 'Chicago Bulls', 10, 5, 'albert', 'false', 'false', 1, NULL, '2026-05-17 01:56:54', '2026-05-17 01:56:54'),
(12, 6, 'Golden State Warriors', 10, 5, 'pacul', 'false', 'false', 1, NULL, '2026-05-17 01:57:21', '2026-05-17 01:57:21'),
(13, 7, 'Maildankawankawan', 11, 6, 'Mail', 'false', 'false', 1, NULL, '2026-05-20 04:34:07', '2026-05-20 04:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `dat_menu_children`
--

CREATE TABLE `dat_menu_children` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `labelMenu` varchar(255) NOT NULL,
  `parentId` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `roleId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dat_menu_children`
--

INSERT INTO `dat_menu_children` (`id`, `labelMenu`, `parentId`, `path`, `roleId`, `created_at`, `updated_at`) VALUES
(1, 'Manage User Admin', 1, '/admin/manage_admin', 1, '2026-03-01 13:25:50', '2026-03-01 13:25:50'),
(2, 'Manage Roles', 1, '/admin/manage_roles', 1, '2026-03-01 13:25:50', '2026-03-01 13:25:50'),
(20, 'Manage Menus', 1, '/admin/menus', 1, NULL, NULL),
(22, 'Manage Session', 1, '/admin/session', 1, '2026-03-01 13:32:05', '2026-03-01 13:32:05'),
(23, 'Manage kompetisi', 1, '/admin/kompetisi', 1, '2026-03-01 13:53:43', '2026-03-01 13:53:43'),
(24, 'List User', 13, '/admin/masterUser/list', 3, '2026-03-17 12:12:35', '2026-03-17 12:13:00'),
(25, 'Manage Series', 1, '/admin/series', 1, '2026-03-28 00:15:41', '2026-03-28 00:15:41'),
(26, 'Manage Sekolah', 1, '/admin/sekolah', 1, '2026-03-28 19:21:31', '2026-03-28 19:21:31'),
(27, 'Team List', 14, '/admin/kompetisi/team_list', 1, '2026-04-04 00:26:21', '2026-04-04 00:26:21'),
(28, 'Team Verification', 14, '/admin/kompetisi/team_verification', 1, '2026-04-04 00:27:33', '2026-04-04 00:27:33'),
(29, 'HSBL Black List', 14, '/admin/kompetisi/black_list', 1, '2026-04-04 00:29:35', '2026-04-04 00:29:35'),
(30, 'Dashboard', 16, '/admin/eventsScore', 1, '2026-05-09 22:23:35', '2026-05-09 22:23:51'),
(31, 'Team List', 17, '/admin/kompetisi/team_list', 2, '2026-05-16 20:58:15', '2026-05-16 20:58:15'),
(32, 'Team Verification', 17, '/admin/kompetisi/team_verification', 2, '2026-05-16 20:58:45', '2026-05-16 20:58:45'),
(33, 'HSBL Black List', 17, '/admin/kompetisi/black_list', 2, '2026-05-16 20:59:10', '2026-05-16 20:59:10'),
(34, 'Dashboard', 18, '/admin/eventsScore', 2, '2026-05-16 21:00:56', '2026-05-16 21:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `dat_menu_parents`
--

CREATE TABLE `dat_menu_parents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `labelMenu` varchar(255) NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `roleId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dat_menu_parents`
--

INSERT INTO `dat_menu_parents` (`id`, `labelMenu`, `path`, `roleId`, `created_at`, `updated_at`) VALUES
(1, 'Events', '#', 1, '2026-03-01 13:25:50', '2026-03-28 19:23:15'),
(13, 'Master User', '#', 2, '2026-03-17 12:11:39', '2026-03-17 12:11:51'),
(14, 'Kompetisi', '#', 1, '2026-04-04 00:25:32', '2026-04-04 00:26:32'),
(16, 'Events Scrore', '#', 1, '2026-05-09 22:21:47', '2026-05-09 22:21:47'),
(17, 'Kompetisi', '#', 2, '2026-05-16 20:57:17', '2026-05-16 20:57:17'),
(18, 'Events Scrore', '#', 2, '2026-05-16 21:00:14', '2026-05-16 21:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `dat_pesertas`
--

CREATE TABLE `dat_pesertas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_sekolah` bigint(20) NOT NULL,
  `id_events` bigint(20) NOT NULL,
  `namaLengkap` varchar(255) NOT NULL,
  `id_posisi` bigint(20) NOT NULL,
  `NIK` int(11) NOT NULL,
  `nomor_jersey` int(11) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `nomor_handphone` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `path_kk` varchar(255) NOT NULL,
  `path_akte` varchar(255) NOT NULL,
  `path_ijazah` varchar(255) NOT NULL,
  `path_biodata_lapor` varchar(255) NOT NULL,
  `path_surat_keterangan_ortu` varchar(255) NOT NULL,
  `path_photo` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `create_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dat_pesertas`
--

INSERT INTO `dat_pesertas` (`id`, `id_sekolah`, `id_events`, `namaLengkap`, `id_posisi`, `NIK`, `nomor_jersey`, `tgl_lahir`, `nama_ayah`, `nama_ibu`, `status`, `nomor_handphone`, `alamat`, `email`, `path_kk`, `path_akte`, `path_ijazah`, `path_biodata_lapor`, `path_surat_keterangan_ortu`, `path_photo`, `created_by`, `create_by`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 'Muhammad Fajri', 7, 1212121212, 12, '2026-05-07', 'test', 'test', 1, '121212', 'test', 'fm1441h@gmail.com', 'dokument/path_kk_1778074554_4mBTEQF6.pdf', 'dokument/path_akte_1778074554_A7Kq6BqX.pdf', 'dokument/path_ijazah_1778074554_ehYTKBES.pdf', 'dokument/path_biodata_lapor_1778074554_gkI2CvQ8.pdf', 'dokument/path_surat_keterangan_ortu_1778074554_1tqzb7aI.pdf', 'dokument/path_photo_1778075400_2EplVxTO.png', 'system', 'system', '2026-05-06 06:35:54', '2026-05-06 06:50:51'),
(4, 1, 1, 'Khairul Fikri', 3, 1212121212, 12, '2026-05-07', 'test', 'test', 1, '121212', 'test', 'fm1441h@gmail.com', 'dokument/path_kk_1778331126_Dh1KafPz.pdf', 'dokument/path_akte_1778331126_8cMQTCGk.pdf', 'dokument/path_ijazah_1778331126_fbCwLdqb.pdf', 'dokument/path_biodata_lapor_1778331126_mdaDAH8b.pdf', 'dokument/path_surat_keterangan_ortu_1778331126_eQQ0J429.pdf', 'dokument/path_photo_1778331126_JBDxK3TC.png', 'system', 'system', '2026-05-09 05:52:06', '2026-05-09 05:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `dat_posisis`
--

CREATE TABLE `dat_posisis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaPosisi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dat_posisis`
--

INSERT INTO `dat_posisis` (`id`, `namaPosisi`, `created_at`, `updated_at`) VALUES
(3, 'Point Guard (PG)', '2026-05-02 05:57:18', '2026-05-02 05:57:18'),
(4, 'Shooting Guard (SG)', '2026-05-02 06:32:49', '2026-05-02 06:32:49'),
(6, 'Power Forward (PF)', '2026-05-02 06:35:20', '2026-05-02 06:35:20'),
(7, 'Center (C)', '2026-05-02 06:36:02', '2026-05-02 06:36:02');

-- --------------------------------------------------------

--
-- Table structure for table `dat_seasons`
--

CREATE TABLE `dat_seasons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `path_template_izinOrtu` varchar(255) DEFAULT NULL,
  `path_template_izin_kepala_sekolah` varchar(255) DEFAULT NULL,
  `regulasi` varchar(255) DEFAULT NULL,
  `syarat_pendaftaran` varchar(255) DEFAULT NULL,
  `roster` varchar(255) DEFAULT NULL,
  `seriesId` int(11) DEFAULT NULL,
  `createdby` varchar(255) NOT NULL,
  `modby` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dat_seasons`
--

INSERT INTO `dat_seasons` (`id`, `name`, `path_template_izinOrtu`, `path_template_izin_kepala_sekolah`, `regulasi`, `syarat_pendaftaran`, `roster`, `seriesId`, `createdby`, `modby`, `created_at`, `updated_at`) VALUES
(2, 'Riau Pos HSBL 2025', 'sessions/tpIAvcvUirDKDoLFW2aow79iLm1AaobehRQS8jcg.pdf', 'sessions/tpIAvcvUirDKDoLFW2aow79iLm1AaobehRQS8jcg.pdf', NULL, NULL, NULL, 2, '1', '1', '2026-03-28 06:17:35', '2026-03-28 06:17:35'),
(3, 'Riau Pos HSBL 2026', 'sessions/tpIAvcvUirDKDoLFW2aow79iLm1AaobehRQS8jcg.pdf', 'sessions/tpIAvcvUirDKDoLFW2aow79iLm1AaobehRQS8jcg.pdf', NULL, NULL, NULL, 2, '1', '1', '2026-03-28 06:17:50', '2026-03-28 06:17:50'),
(4, 'Riau Pos HSBL 2025 SIAK', 'sessions/tpIAvcvUirDKDoLFW2aow79iLm1AaobehRQS8jcg.pdf', 'sessions/tpIAvcvUirDKDoLFW2aow79iLm1AaobehRQS8jcg.pdf', NULL, NULL, NULL, 2, '1', '1', '2026-05-16 21:13:04', '2026-05-16 21:13:04'),
(5, 'Riau Pos HSBL 2026 Dumai', 'sessions/tpIAvcvUirDKDoLFW2aow79iLm1AaobehRQS8jcg.pdf', 'sessions/7YdA2mzBZ90SsFhnvN0mKuEXWsa7UNoIExD75F8r.pdf', NULL, NULL, NULL, 2, '1', '1', '2026-05-17 01:49:02', '2026-05-17 01:49:02'),
(6, 'BASKET KAMPUNG', 'sessions/UrzBtfRzXbOxmxxJdYL1TH4rMpi71SpOx0FAnI4P.pdf', 'sessions/iyIjXMDZNM9UmFGgrmrxpFZl04gZvkxkzozsOKMe.pdf', 'sessions/9L8aOE7FG8WscXFmqMA4anGSFFPtHfag1ETqCJtM.pdf', 'sessions/sc6k1HCGCiKrv6XrOzPgiKoqGAXNZBB3rhNhvXr0.pdf', 'sessions/If0sTGcX3GlS4q38Do3x0ethm6xPNqEKmDyF8MIf.pdf', 2, '1', '1', '2026-05-20 04:27:48', '2026-05-20 04:27:48'),
(7, 'Kampung durian runtuh 2026', 'sessions/ohCncrGdEPFLZVmL85BxozLgc9Iz0ejJf8VsG3UJ.pdf', 'sessions/Fk18vV8D5cR5tNO51vwaPwesmPVVT03UR15ZhGO1.pdf', 'sessions/TEdRNmO1l3FgS5m5URTDOwK0WVEonZkVFPQaqKwu.pdf', 'sessions/CDEMA2bFeNzl1v6G8vWP2qqw6XwFYsjWNcfvhChZ.pdf', 'sessions/Na4zTtbhRYKsicoJm8wEunqz3PTQHHyA6iaxwC3m.pdf', 6, '1', '1', '2026-05-20 04:31:12', '2026-05-20 04:31:12');

-- --------------------------------------------------------

--
-- Table structure for table `dat_sekolahs`
--

CREATE TABLE `dat_sekolahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaSekolah` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `createdby` bigint(20) UNSIGNED NOT NULL,
  `modby` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dat_series`
--

CREATE TABLE `dat_series` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `createdby` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dat_series`
--

INSERT INTO `dat_series` (`id`, `name`, `createdby`, `created_at`, `updated_at`) VALUES
(2, 'Pekanbaru', '1', '2026-03-28 00:57:16', '2026-03-28 00:57:16'),
(3, 'Medan', '1', '2026-03-28 00:57:25', '2026-03-28 00:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `dat_wilayahs`
--

CREATE TABLE `dat_wilayahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaWilayah` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dat_wilayahs`
--

INSERT INTO `dat_wilayahs` (`id`, `namaWilayah`, `created_at`, `updated_at`) VALUES
(1, 'Pekanbaru', '2026-03-01 13:25:50', '2026-03-01 13:25:50'),
(2, 'Kampar', '2026-03-01 13:25:50', '2026-03-01 13:25:50'),
(3, 'Rokan Hilir', '2026-03-01 13:25:50', '2026-03-01 13:25:50'),
(4, 'Rokan Hulu', '2026-03-01 13:25:50', '2026-03-01 13:25:50'),
(5, 'Siak', '2026-03-01 13:25:50', '2026-03-01 13:25:50'),
(6, 'Indragiri Hilir', '2026-03-01 13:25:50', '2026-03-01 13:25:50'),
(7, 'Indragiri Hulu', '2026-03-01 13:25:50', '2026-03-01 13:25:50'),
(8, 'Kuantan Singingi', '2026-03-01 13:25:50', '2026-03-01 13:25:50'),
(9, 'Pelalawan', '2026-03-01 13:25:50', '2026-03-01 13:25:50'),
(10, 'Bengkalis', '2026-03-01 13:25:50', '2026-03-01 13:25:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_10_15_084350_create_datusers_table', 1),
(5, '2025_10_15_091618_create_datrefroles_table', 1),
(6, '2026_01_05_075338_create_dat_seasons_table', 1),
(7, '2026_02_03_163516_create_dat_wilayahs_table', 1),
(8, '2026_02_03_165001_create_dat_menu_parents_table', 1),
(9, '2026_02_03_165024_create_dat_menu_children_table', 1),
(10, '2026_03_01_201245_create_datkompetisis_table', 1),
(11, '2026_03_28_074627_create_dat_series_table', 2),
(12, '2026_04_04_041333_create_dat_sekolahs_table', 3),
(14, '2026_04_04_124747_create_dat_kompetisi_events_table', 4),
(15, '2026_04_05_024941_create_blacklist_teams_table', 5),
(16, '2026_05_02_122442_create_dat_posisis_table', 6),
(17, '2026_05_03_072327_create_dat_pesertas_table', 7),
(18, '2026_05_09_131624_create_datofficials_table', 8),
(19, '2026_05_09_131637_create_datjerseys_table', 9),
(20, '2026_05_10_103749_create_dat_events_scores_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Wc6hAeZA9H5gKgKZ59OXbYcQl1N6t0RHqRjtlLk9', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNU1XVm9zNWxBcFVBMHlWVXhwR0R4S1dvSzdMcWpXWjg1SXBoNzVXcCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9tZW51cyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1779287388);

-- --------------------------------------------------------

--
-- Table structure for table `users`
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blacklist_teams`
--
ALTER TABLE `blacklist_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `datjerseys`
--
ALTER TABLE `datjerseys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datkompetisis`
--
ALTER TABLE `datkompetisis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datofficials`
--
ALTER TABLE `datofficials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datrefroles`
--
ALTER TABLE `datrefroles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datusers`
--
ALTER TABLE `datusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dat_events_scores`
--
ALTER TABLE `dat_events_scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dat_kompetisi_events`
--
ALTER TABLE `dat_kompetisi_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dat_menu_children`
--
ALTER TABLE `dat_menu_children`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dat_menu_parents`
--
ALTER TABLE `dat_menu_parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dat_pesertas`
--
ALTER TABLE `dat_pesertas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dat_posisis`
--
ALTER TABLE `dat_posisis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dat_seasons`
--
ALTER TABLE `dat_seasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dat_sekolahs`
--
ALTER TABLE `dat_sekolahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dat_series`
--
ALTER TABLE `dat_series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dat_wilayahs`
--
ALTER TABLE `dat_wilayahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `blacklist_teams`
--
ALTER TABLE `blacklist_teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `datjerseys`
--
ALTER TABLE `datjerseys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `datkompetisis`
--
ALTER TABLE `datkompetisis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `datofficials`
--
ALTER TABLE `datofficials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `datrefroles`
--
ALTER TABLE `datrefroles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `datusers`
--
ALTER TABLE `datusers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dat_events_scores`
--
ALTER TABLE `dat_events_scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dat_kompetisi_events`
--
ALTER TABLE `dat_kompetisi_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dat_menu_children`
--
ALTER TABLE `dat_menu_children`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `dat_menu_parents`
--
ALTER TABLE `dat_menu_parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `dat_pesertas`
--
ALTER TABLE `dat_pesertas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dat_posisis`
--
ALTER TABLE `dat_posisis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dat_seasons`
--
ALTER TABLE `dat_seasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dat_sekolahs`
--
ALTER TABLE `dat_sekolahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dat_series`
--
ALTER TABLE `dat_series`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dat_wilayahs`
--
ALTER TABLE `dat_wilayahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
