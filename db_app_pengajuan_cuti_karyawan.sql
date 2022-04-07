-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2022 at 06:01 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_app_pengajuan_cuti_karyawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `cutis`
--

CREATE TABLE `cutis` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nik` varchar(150) DEFAULT NULL,
  `mulai_cuti` date DEFAULT NULL,
  `akhir_cuti` date DEFAULT NULL,
  `lama_cuti` int(11) DEFAULT NULL,
  `alasan_cuti` text DEFAULT NULL,
  `jenis_cuti` varchar(255) DEFAULT NULL,
  `bukti_cuti` varchar(255) DEFAULT NULL,
  `status_cuti_id_by_manager` int(11) DEFAULT NULL,
  `status_cuti_id_by_senior_manager` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cutis`
--

INSERT INTO `cutis` (`id`, `user_id`, `nik`, `mulai_cuti`, `akhir_cuti`, `lama_cuti`, `alasan_cuti`, `jenis_cuti`, `bukti_cuti`, `status_cuti_id_by_manager`, `status_cuti_id_by_senior_manager`) VALUES
(1, 1, '12312121', '2022-04-06', '2022-04-08', 3, 'Kurang enak badan', 'Sakit', '1_2022-04-06_3.png', NULL, 3),
(3, 1, NULL, '2022-04-13', '2022-04-16', 4, 'Kurang enak badan', 'Sakit', '1_2022-04-13_4.png', 2, 2),
(4, 1, '12345', '2022-04-15', '2022-04-16', 2, 'Kegiatan Meeting', 'Dinas Keluar Kota', '1_2022-04-15_2.png', 1, 2),
(5, 1, '12345', '2022-04-24', '2022-04-25', 2, 'Meeting', 'Dinas Keluar Kota', '1_2022-04-24_2.png', 1, 1),
(6, 1, '12345', '2022-04-21', '2022-04-22', 2, 'Sakit', 'Sakit', '1_2022-04-21_2.png', 2, NULL),
(7, 6, '54321', '2022-04-13', '2022-04-15', 3, 'Meeting', 'Dinas Keluar Kota', '6_2022-04-13_2.png', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Karyawan'),
(2, 'Manager'),
(3, 'Senior Manager');

-- --------------------------------------------------------

--
-- Table structure for table `status_cuti`
--

CREATE TABLE `status_cuti` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_cuti`
--

INSERT INTO `status_cuti` (`id`, `name`) VALUES
(1, 'process'),
(2, 'approve'),
(3, 'return'),
(4, 'reject');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `roles_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `roles_id`) VALUES
(1, 'Hendra Wijaya', 'hendarwijaya@mail.com', '$2y$10$BSI04tRqCiF2z5E1weW0TunwUTSmpFj7ohx8s2SX50xACqOmJWtnq', 1),
(2, 'Eka Gustian', 'ekagustian@mail.com', '$2y$10$BSI04tRqCiF2z5E1weW0TunwUTSmpFj7ohx8s2SX50xACqOmJWtnq', 2),
(3, 'Adama Setiawan', 'adamasetiawan@mail.com', '$2y$10$BSI04tRqCiF2z5E1weW0TunwUTSmpFj7ohx8s2SX50xACqOmJWtnq', 3),
(6, 'Indah Lestari', 'indahlestari@mail.com', '$2y$10$BSI04tRqCiF2z5E1weW0TunwUTSmpFj7ohx8s2SX50xACqOmJWtnq', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cutis`
--
ALTER TABLE `cutis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_id` (`user_id`),
  ADD KEY `fk_status_cuti_id_by_manager` (`status_cuti_id_by_manager`) USING BTREE,
  ADD KEY `fk_status_cuti_id_by_senior_manager` (`status_cuti_id_by_senior_manager`) USING BTREE;

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_cuti`
--
ALTER TABLE `status_cuti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_roles_id` (`roles_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cutis`
--
ALTER TABLE `cutis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_cuti`
--
ALTER TABLE `status_cuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cutis`
--
ALTER TABLE `cutis`
  ADD CONSTRAINT `fk_status_cuti_id_by_manager ` FOREIGN KEY (`status_cuti_id_by_manager`) REFERENCES `status_cuti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_status_cuti_id_by_senior_manager ` FOREIGN KEY (`status_cuti_id_by_senior_manager`) REFERENCES `status_cuti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_roles_id` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
