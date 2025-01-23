-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2025 at 07:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekap_nilai`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','Mahasiswa','Dosen') NOT NULL DEFAULT 'Mahasiswa',
  `kode_verifikasi` varchar(10) DEFAULT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `email`, `password`, `level`, `kode_verifikasi`, `username`) VALUES
(15, '22.01.4745', 'Ilham Elvian Yahya', 'vian@students.amikom.ac.id', '', 'Mahasiswa', '493c7b43e7', ''),
(17, '22.01.4764', 'Naufal Ardiansyah', 'naufal@students.amikom.ac.id', '', 'Mahasiswa', '9ad60b3b97', 'Naufal'),
(18, '22.01.4777', 'Rizqy Eka', 'ekok@students.amikom.ac.id', '', 'Mahasiswa', 'de8115254e', 'ekok'),
(19, '22.01.4780', 'Risky Martin', 'martin@students.amikom.ac.id', '', 'Mahasiswa', '70c31c27fa', 'Martin'),
(20, '22.01.4784', 'Yulfan Nur Hidayat', 'yulfan@students.amikom.ac.id', '', 'Mahasiswa', '5487947a29', 'Yulfan'),
(21, '22.01.4735', 'Risang Edi Sinawang', 'awang@students.amikom.ac.id', '', 'Mahasiswa', '07d369a675', 'Awang');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id` int(11) NOT NULL,
  `kode_mata_kuliah` varchar(20) NOT NULL,
  `nama_mata_kuliah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id`, `kode_mata_kuliah`, `nama_mata_kuliah`) VALUES
(1, 'DT104', 'Kepemimpinan'),
(2, 'DT131', 'Pemrograman Phyton'),
(3, 'DT132', 'Manajemen Stratejik'),
(4, 'DT167', 'Komunikasi dan Negosiasi'),
(5, 'DT191', 'Rekayasa Perangkat Lunak'),
(6, 'DT290', 'Bahasa Indonesia'),
(7, 'DT220', 'Struktur Data'),
(8, 'DT190', 'Multimedia');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` int(11) DEFAULT NULL,
  `mata_kuliah_id` int(11) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `nama_mata_kuliah` varchar(100) DEFAULT NULL,
  `nim` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `mahasiswa_id`, `mata_kuliah_id`, `nilai`, `nama_mata_kuliah`, `nim`) VALUES
(4, 12, 1, 85, NULL, ''),
(5, 13, 1, 85, NULL, ''),
(6, 12, 2, 70, NULL, ''),
(7, 13, 2, 60, NULL, ''),
(8, 14, 5, 75, NULL, ''),
(10, 16, 7, 82, NULL, ''),
(11, 16, 1, 85, NULL, ''),
(13, 17, 4, 94, NULL, ''),
(14, 17, 5, 70, NULL, ''),
(15, 17, 7, 90, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` enum('Admin','Mahasiswa','Dosen') NOT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `kode_verifikasi` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `level`, `nim`, `kode_verifikasi`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', '', 'Admin', NULL, NULL),
(6, 'Dosen', 'd5bbfb47ac3160c31fa8c247827115aa', 'Dosen', 'Dosen', NULL, NULL),
(7, 'Asisten Dosen', '02099aec8a53b954db0194eedad2c4f9', 'Asisten Dosen', 'Dosen', NULL, NULL),
(12, 'Vian', '355bd34540f4a0f0ce321f42c1b66b98', 'Ilham Elvian Yahya', 'Mahasiswa', '22.01.4745', '493c7b'),
(13, 'Naufal', 'c23ff576b099ad9d63451d0df246cead', 'Naufal Ardiansyah', 'Mahasiswa', '22.01.4764', '9ad60b'),
(14, 'ekok', 'c0f55f0c1906b347d2de5bcac9259e77', 'Rizqy Eka', 'Mahasiswa', '22.01.4777', 'de8115'),
(15, 'Martin', '34f74c049edea51851c6924f4a386762', 'Risky Martin', 'Mahasiswa', '22.01.4780', '70c31c'),
(16, 'Yulfan', '1239b24f5e9f413841eeafd568e7cfdf', 'Yulfan Nur Hidayat', 'Mahasiswa', '22.01.4784', '548794'),
(17, 'Awang', 'c74958002a013604878bac04d3fcdccd', 'Risang Edi Sinawang', 'Mahasiswa', '22.01.4735', '07d369');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_mata_kuliah` (`kode_mata_kuliah`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`),
  ADD KEY `mata_kuliah_id` (`mata_kuliah_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`mata_kuliah_id`) REFERENCES `mata_kuliah` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
