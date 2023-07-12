-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2023 at 06:07 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4login`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'site admin'),
(2, 'user', 'regular user');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'hrd@SPWM.ac.id', 1, '2023-01-25 19:05:31', 1),
(2, '::1', 'hrd@SPWM.ac.id', 1, '2023-01-25 19:08:50', 1),
(3, '::1', 'hrd@SPWM.ac.id', 1, '2023-01-25 19:10:37', 1),
(4, '::1', 'ketua@SPWM.ac.id', 2, '2023-01-25 19:47:06', 1),
(5, '::1', 'ketua@SPWM.ac.id', 2, '2023-01-25 19:47:39', 1),
(6, '::1', 'hrd@SPWM.ac.id', 1, '2023-01-25 19:47:44', 1),
(7, '::1', 'hrd@SPWM.ac.id', 1, '2023-01-26 02:49:37', 1),
(8, '::1', 'ketua@SPWM.ac.id', 2, '2023-01-26 02:50:18', 1),
(9, '::1', 'hrd@SPWM.ac.id', 1, '2023-01-26 02:50:27', 1),
(10, '::1', 'hrd@SPWM.ac.id', 1, '2023-01-27 00:28:51', 1),
(11, '::1', 'ketua@SPWM.ac.id', 2, '2023-01-27 00:39:25', 1),
(12, '::1', 'hrd@SPWM.ac.id', 1, '2023-01-27 00:39:46', 1),
(13, '::1', 'hrd@SPWM.ac.id', 1, '2023-01-31 18:23:06', 1),
(14, '::1', 'yonathantobias@gmail.com', NULL, '2023-01-31 20:51:43', 0),
(15, '::1', 'hrd', NULL, '2023-01-31 20:51:51', 0),
(16, '::1', 'hrd@SPWM.ac.id', 1, '2023-01-31 20:52:31', 1),
(17, '::1', 'hrd@SPWM.ac.id', 1, '2023-02-01 01:14:24', 1),
(18, '::1', 'hrd@SPWM.ac.id', 1, '2023-02-01 22:11:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-users', 'manage all users'),
(2, 'manage-profile', 'manage user profile');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `data_cuti`
--

CREATE TABLE `data_cuti` (
  `id_cuti` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tanggal_cuti` date NOT NULL,
  `alasan_cuti` varchar(255) DEFAULT NULL,
  `validasi_hrd` varchar(255) NOT NULL DEFAULT 'no',
  `validasi_ketua` varchar(255) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_cuti`
--

INSERT INTO `data_cuti` (`id_cuti`, `id_pegawai`, `tanggal_cuti`, `alasan_cuti`, `validasi_hrd`, `validasi_ketua`) VALUES
(2, 3, '2023-01-23', '', 'yes', 'yes'),
(3, 5, '2023-01-23', '', 'yes', 'yes'),
(4, 5, '2023-01-24', '', 'yes', 'yes'),
(5, 5, '2023-01-25', 'Menikah', 'yes', 'yes'),
(6, 5, '2023-01-26', 'Menikah', 'yes', 'yes'),
(7, 5, '2023-01-27', 'Menikah', 'yes', 'yes'),
(8, 6, '2023-01-23', '', 'yes', 'yes'),
(9, 11, '2023-01-23', '', 'yes', 'yes'),
(12, 18, '2023-01-26', '', 'yes', 'yes'),
(13, 18, '2023-01-31', '', 'yes', 'yes'),
(14, 24, '2023-01-09', '', 'yes', 'yes'),
(15, 24, '2023-01-10', '', 'yes', 'yes'),
(16, 24, '2023-01-12', '', 'yes', 'yes'),
(17, 24, '2023-01-13', '', 'yes', 'yes'),
(18, 24, '2023-01-26', '', 'yes', 'yes'),
(19, 42, '2023-01-10', '', 'yes', 'yes'),
(20, 29, '2023-01-27', '', 'yes', 'yes'),
(21, 49, '2023-02-01', '', 'yes', 'yes'),
(22, 51, '2023-01-30', '', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id` int(11) NOT NULL,
  `nip` varchar(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `cuti` int(11) NOT NULL DEFAULT 12,
  `id_divisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pegawai`
--

INSERT INTO `data_pegawai` (`id`, `nip`, `nama`, `cuti`, `id_divisi`) VALUES
(1, '1778/A', 'Ns. Nanik Dwi Astutik, S.Kep., M.Kes', 12, 1),
(2, '05/A/AKP', 'Ns. Oda Debora, S.Kep., M.Kep', 12, 1),
(3, '2018.01.24/', 'Ns. Yafet Pradikatama Prihanto, M.Kep', 12, 1),
(4, '07/A/AKP', 'Ns. Elizabeth Yun-Yun Vinsur, M.Kep', 12, 1),
(5, '2016.01.14/', 'Ns. Maria Prieska Putri P. Ati, S.Kep., M.Kes', 15, 1),
(6, '1098/A', 'Emy Sutiyarsih, S.Kep., Ns., M.Kes', 12, 11),
(7, '1674/A', 'Ns. Monika Luhung, S.Kep., M.Kes', 12, 11),
(8, '1780/A', 'Ns. Ellia Ariesti, S.Kep., M.Kep', 12, 11),
(9, '16/ KHS', 'Sr. Felisitas Misc. MAN', 12, 11),
(10, '09/A/AKP', 'Ns. Ifa Pannya Sakti, S.Kep., M.Kes.', 12, 11),
(11, '1283/A', 'Wibowo, S.Kep., Ns. M.Biomed', 12, 8),
(12, '2019.01.31/', 'Sugiyanto, S.Si, M.Farm., Apt', 12, 8),
(13, '2019.01.33/', 'Luluk Anisyah, S.Si, M.Farm., Apt', 12, 8),
(14, '2019.01.34/', 'Ani Riani Hasana, S.Farm., M.Farm., Apt', 12, 8),
(15, '2021.01.44/', 'Venny Kurnia Andika, S.Si., M.Biotech', 12, 8),
(16, '2022.01.49/', 'apt. Sirilus Deodatus Sawu, S.Farm., M.Farm', 12, 8),
(17, '1675/A', 'Wienda Setyowati, Se', 12, 7),
(18, '1685/A', 'Kristina Rini Susanti', 12, 7),
(19, '2018.02.20/', 'Magdalena Novitasari Dwi Susanti, Amd', 12, 7),
(20, '2020.02.43/', 'Agnesia Retno Yulianing Putri, SE', 12, 7),
(21, '-', 'Alicia Dinda Gracia Putri, S.Tr.Ak', 12, 7),
(22, '-', 'Atanasius Omega Dewantara, SE', 12, 7),
(23, '08/A/Akp', 'Eli Lea Widhia Purwandhani , Sst', 12, 6),
(24, '2016.01.15.', 'Ns. Narita Diatanti, S.Kep ', 12, 6),
(25, '2019.02.25/', 'Raswati Prapti Rahayu,S.St', 12, 6),
(26, '2022.01.46/', 'Vincensia Dea Prasetya Putri, Amd.Kes', 12, 6),
(27, '2020.01.42/', 'Devanus Lahardo, A.Md., S.Farm', 12, 6),
(28, '2022.01.48/', 'Ns. Oktavia Indriyani, S.Kep', 12, 6),
(29, '2015.01.11/', 'Ns. Berlianny Venny Sipollo, S.Kep., MNS', 12, 5),
(30, '10/A/AKP', 'Ns. Febrina Secsaria Handini, S.Kep., M.Kep', 12, 5),
(31, '2017.01.17/', 'Ns. Achmad Syukkur, S.Kep., M.Kep', 12, 5),
(32, '2017.01.16.', 'Ns. Yustina Emi Setyobudi, S.Kep', 12, 5),
(33, '01/A/AKP.', 'Wisoedhanie Widi Anugrahanti, SKM., M.Kes', 12, 4),
(34, '2019.01.27/', 'Nanta Sigit, S.Si., M.T', 12, 4),
(35, '2019.01.28/', 'Rea Ariyanti, S.Tr.Keb., M.K.M.', 12, 4),
(36, '2019.01.32/', 'Romaden Marbun, Amd.Per.Kes., SKM, M.AP', 12, 4),
(37, '2021.01.45/', 'Nita Dwi Nur Aini, S.ST., M.Kes', 12, 4),
(38, '472/B', 'V.R. Tri Joko Kumoro', 12, 3),
(39, '04/C/AKP.', 'David Ardianto', 12, 3),
(40, '-', 'Luhur Pambudi', 12, 3),
(41, '-', 'Rusdi Abdul Gani', 12, 3),
(42, '03/C/Akp.', 'Yuli Hariadi Widodo', 12, 3),
(43, '1463/A', 'Pujiono ', 12, 2),
(44, '429/ B', 'Jurianto', 12, 2),
(45, '428/B', 'Emmanuel Setyo Wibowo', 12, 2),
(46, '450/B', 'Agus Widodo', 12, 2),
(47, '445/B', 'Miasih', 12, 2),
(48, '427/B', 'Indarti', 12, 2),
(49, '2018.02.21/', 'Natalia Hendri Susanti', 12, 2),
(50, '2020.02.38/', 'Ferra Meladiana, S.IP', 12, 9),
(51, '2020.02.39/', 'Dyla Ayu Puspitasari, S.IP', 12, 9),
(52, '2019.02.35/', 'Yeremia Victor Rondonuwu, S.Kom', 12, 10);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'Dosen S1 Keperawatan'),
(2, 'Rumah Tangga'),
(3, 'Satpam + Sopir'),
(4, 'Dosen DIV MIK'),
(5, 'Dosen Profesi Ners'),
(6, 'Tendik'),
(7, 'Tendik - Admin'),
(8, 'Dosen Prodi S1 Farmasi'),
(9, 'Perpustakaan'),
(10, 'IT'),
(11, 'Dosen D3 Keperawatan');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1674693959, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.svg',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `full_name`, `user_image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'hrd@SPWM.ac.id', 'HRD', NULL, 'default.svg', '$2y$10$EthcG5kMf7FExDjz5dQJIOzMHdqIcPkhz/2tjoku9TxUyRiT350qO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-01-25 19:05:27', '2023-01-25 19:05:27', NULL),
(2, 'ketua@SPWM.ac.id', 'Ketua', NULL, 'default.svg', '$2y$10$EiAAGAZcHSbOnWk/KpaoI.yzV4mK8n0Mx3dMQMwEFhnfZCTu/0bR.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-01-25 19:47:03', '2023-01-25 19:47:03', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `data_cuti`
--
ALTER TABLE `data_cuti`
  ADD PRIMARY KEY (`id_cuti`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_divisi` (`id_divisi`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_cuti`
--
ALTER TABLE `data_cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `Reset_Cuti` ON SCHEDULE EVERY 1 YEAR STARTS '2023-01-01 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO update data_pegawai set cuti=12$$

CREATE DEFINER=`root`@`localhost` EVENT `HapusCuti` ON SCHEDULE EVERY 1 YEAR STARTS '2023-01-01 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO TRUNCATE data_cuti$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
