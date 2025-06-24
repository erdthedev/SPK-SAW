-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2025 at 09:07 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_saw`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(11) NOT NULL,
  `alternatif` varchar(255) NOT NULL,
  `input_penilaian` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `alternatif`, `input_penilaian`, `created_at`, `updated_at`) VALUES
(8, 'Aji Sasongko', '1.00', '2025-05-23 16:45:42', '2025-05-23 16:49:31'),
(9, 'andreas Suryo Langgeng W', '1.00', '2025-05-23 16:45:58', '2025-05-23 16:50:15'),
(10, 'Anisa Febriyanti', '1.00', '2025-05-23 16:46:12', '2025-05-23 16:50:42'),
(11, 'Ardi Nugroho', '1.00', '2025-05-23 16:46:20', '2025-05-23 16:51:13'),
(12, 'Bayu Jati Wardana', '1.00', '2025-05-23 16:46:30', '2025-05-23 16:51:44'),
(13, 'Bonifasius Anom R', '1.00', '2025-05-23 16:46:50', '2025-05-23 16:52:25'),
(14, 'Adigdya Cahyadi', '1.00', '2025-05-23 16:53:53', '2025-05-23 16:55:52'),
(15, 'Adventnia Dian Kristina', '1.00', '2025-05-23 16:54:42', '2025-05-23 16:56:18'),
(16, 'Agnes Herdiana Ayu Wulandari', '1.00', '2025-05-23 16:54:57', '2025-05-23 16:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id` int(11) NOT NULL,
  `id_alternatif` varchar(5) NOT NULL,
  `nilai` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id`, `id_alternatif`, `nilai`) VALUES
(1, '8', '0.95'),
(2, '9', '0.97'),
(3, '10', '0.90'),
(4, '11', '0.98'),
(5, '12', '0.94'),
(6, '13', '0.95'),
(7, '14', '0.89'),
(8, '15', '0.85'),
(9, '16', '0.94');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `kode_kriteria` varchar(50) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `bobot` float NOT NULL,
  `jenis` enum('Benefit','Cost') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `kode_kriteria`, `nama_kriteria`, `bobot`, `jenis`) VALUES
(2, 'C1', 'Disiplin', 20, 'Benefit'),
(3, 'C2', 'Kualitas', 20, 'Benefit'),
(4, 'C3', 'Kuantitas', 15, 'Benefit'),
(5, 'C4', 'Kerjasama', 15, 'Benefit'),
(6, 'C5', 'Inisiatif', 10, 'Benefit'),
(7, 'C6', 'SOP', 10, 'Benefit'),
(8, 'C7', 'Sosial', 10, 'Benefit');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(39, 8, 2, '90.00'),
(40, 8, 3, '86.00'),
(41, 8, 4, '85.00'),
(42, 8, 5, '88.00'),
(43, 8, 6, '88.00'),
(44, 8, 7, '85.00'),
(45, 8, 8, '85.00'),
(46, 9, 2, '95.00'),
(47, 9, 3, '90.00'),
(48, 9, 4, '80.00'),
(49, 9, 5, '90.00'),
(50, 9, 6, '80.00'),
(51, 9, 7, '90.00'),
(52, 9, 8, '90.00'),
(53, 10, 2, '85.00'),
(54, 10, 3, '80.00'),
(55, 10, 4, '80.00'),
(56, 10, 5, '80.00'),
(57, 10, 6, '80.00'),
(58, 10, 7, '85.00'),
(59, 10, 8, '85.00'),
(60, 11, 2, '90.00'),
(61, 11, 3, '90.00'),
(62, 11, 4, '95.00'),
(63, 11, 5, '90.00'),
(64, 11, 6, '80.00'),
(65, 11, 7, '90.00'),
(66, 11, 8, '90.00'),
(67, 12, 2, '88.00'),
(68, 12, 3, '85.00'),
(69, 12, 4, '85.00'),
(70, 12, 5, '88.00'),
(71, 12, 6, '88.00'),
(72, 12, 7, '84.00'),
(73, 12, 8, '85.00'),
(74, 13, 2, '91.00'),
(75, 13, 3, '85.00'),
(76, 13, 4, '91.00'),
(77, 13, 5, '80.00'),
(78, 13, 6, '85.00'),
(79, 13, 7, '91.00'),
(80, 13, 8, '85.00'),
(81, 14, 2, '85.00'),
(82, 14, 3, '80.00'),
(83, 14, 4, '78.00'),
(84, 14, 5, '80.00'),
(85, 14, 6, '75.00'),
(86, 14, 7, '85.00'),
(87, 14, 8, '85.00'),
(88, 15, 2, '80.00'),
(89, 15, 3, '75.00'),
(90, 15, 4, '75.00'),
(91, 15, 5, '80.00'),
(92, 15, 6, '76.00'),
(93, 15, 7, '79.00'),
(94, 15, 8, '80.00'),
(95, 16, 2, '88.00'),
(96, 16, 3, '85.00'),
(97, 16, 4, '89.00'),
(98, 16, 5, '85.00'),
(99, 16, 6, '88.00'),
(100, 16, 7, '88.00'),
(101, 16, 8, '80.00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` enum('admin','user','guest') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `email`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Erdinus', 'admin', '$2y$10$gYQD8r7nTZCp.Pbw9qNL.Ojwd1K9qv/ZnhCnbyO0K8lpN9En3r3wq', NULL, 'admin', '2025-05-02 21:19:15', '2025-05-25 20:31:13'),
(2, 'manager', 'manager', '$2y$10$BsouUmmNMmnVUoGu3d5Xyu1DkAMN.SPMr6ZD.f.h5qbxLNsHxUg9C', NULL, 'user', '2025-05-25 16:57:17', '2025-05-25 16:57:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alternatif` (`id_alternatif`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
