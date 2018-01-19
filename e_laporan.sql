-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for e_laporan
CREATE DATABASE IF NOT EXISTS `e_laporan` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `e_laporan`;

-- Dumping structure for table e_laporan.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e_laporan.admins: ~0 rows (approximately)
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `name`, `email`, `job_status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Pengecek Laporan', 'cek@email.com', 'cek laporan setiap bidang', '$2y$10$CY1mQpA4RQkZMbjxUjTJF.LYQG6fZF6RbTIxXO8EcDwmVkAxFAHo2', 'HBFVEijSkbf9sYInK0zeCOlPOCO5eA8kJdZNZYn0nqDwlXNe5bNhKEDvWdko', '2018-01-17 10:44:40', '2018-01-17 10:44:40');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Dumping structure for table e_laporan.laporans
CREATE TABLE IF NOT EXISTS `laporans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `namafile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `laporans_users_id_foreign` (`users_id`),
  CONSTRAINT `laporans_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e_laporan.laporans: ~2 rows (approximately)
/*!40000 ALTER TABLE `laporans` DISABLE KEYS */;
INSERT INTO `laporans` (`id`, `namafile`, `file`, `status`, `catatan`, `users_id`, `created_at`, `updated_at`) VALUES
	(1, 'asdadad', '1516107798.pdf', 'Fix', 'tidak ada catatan', 1, '2018-01-16 13:03:18', '2018-01-17 17:05:49'),
	(2, 'asdadadadda', 'pdf', 'Revisi', 'Reivisi Nomor dan isi', 1, '2018-01-16 13:10:52', '2018-01-17 17:21:07'),
	(3, 'asdaddadadasd', '4. JURNAL CHAIRUNNISA.pdf.pdf', 'Belum terverifikasi', 'Belum ada catatan', 1, '2018-01-16 13:12:08', '2018-01-16 13:12:08');
/*!40000 ALTER TABLE `laporans` ENABLE KEYS */;

-- Dumping structure for table e_laporan.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e_laporan.migrations: ~3 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2018_01_16_053630_create_admins_table', 1),
	(4, '2018_01_16_120437_create_laporans_table', 2),
	(5, '2018_01_19_030716_create_profils_table', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table e_laporan.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e_laporan.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table e_laporan.profils
CREATE TABLE IF NOT EXISTS `profils` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(10) unsigned NOT NULL,
  `nama_lembaga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eselonisasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kab_kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_fax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_kantor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pimpinan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp_pimpinan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_pimpinan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_gedung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profils_users_id_foreign` (`users_id`),
  CONSTRAINT `profils_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e_laporan.profils: ~0 rows (approximately)
/*!40000 ALTER TABLE `profils` DISABLE KEYS */;
INSERT INTO `profils` (`id`, `users_id`, `nama_lembaga`, `eselonisasi`, `provinsi`, `kab_kota`, `alamat`, `no_telp`, `no_fax`, `email_kantor`, `website`, `nama_pimpinan`, `no_hp_pimpinan`, `foto_pimpinan`, `foto_gedung`, `created_at`, `updated_at`) VALUES
	(1, 1, 'UPTD BLK BALIKPAPAN', 'III', 'KALIMANTAN TIMUR', 'KOTA BALIKPAPAN', 'JL. SEPINGGAN BARU NO.31 KOTA BALIKPAPAN', '08115988854', '0542-762681', 'blki.bpn@gmail.com', 'http://www.kios3in1.net/062/1profil.php', 'SUHARTONO, ST', '08115988854', '260321.jpg', '1492483169998.jpg', '2018-01-19 08:12:31', '2018-01-19 08:12:31');
/*!40000 ALTER TABLE `profils` ENABLE KEYS */;

-- Dumping structure for table e_laporan.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e_laporan.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Bidang1', 'bidang1@email.com', '$2y$10$KRl02dZbg5LHW9oj6sp.vO42joJb07nt3WnyFWnamhxEpgP3LtDmy', 'RUYikGY9AsHgG3iGJyjCSWpvdhYp5XcbV9TsaPvqoXX0JUceVubENNnfU8ff', '2018-01-16 05:39:57', '2018-01-16 05:39:57'),
	(2, 'Bidang2', 'bidang2@email.com', '$2y$10$rQoJkQMzkOBKDfw4LJ.c/uBQzuQDobjYqdV/sHY.uGOKm0Zsy9mx.', '1QuEtb5vGOUxb41uJp7gJMEovkpeBPRz6aGpOUOS7JrhCmmapWeLzESc208o', '2018-01-16 10:30:14', '2018-01-16 10:30:14');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
