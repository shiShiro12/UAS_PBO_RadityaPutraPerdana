-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2026 at 08:00 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas_pbo_ti1d_raditya_putra_perdana`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_mahasiswa`
--

CREATE TABLE `table_mahasiswa` (
  `id_mahasiswa` int NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `semester` int NOT NULL,
  `tarif_ukt_nominal` decimal(10,2) NOT NULL,
  `jenis_pembiayaan` enum('Mandiri','Bidikmisi','Prestasi') NOT NULL,
  `golongan_ukt` varchar(10) DEFAULT NULL,
  `nama_wali` varchar(100) DEFAULT NULL,
  `nomor_kip_kuliah` varchar(30) DEFAULT NULL,
  `dana_saku_subsidi` decimal(10,2) DEFAULT NULL,
  `nama_instansi_beasiswa` varchar(100) DEFAULT NULL,
  `minimal_ipk_syarat` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `table_mahasiswa`
--

INSERT INTO `table_mahasiswa` (`id_mahasiswa`, `nama_mahasiswa`, `nim`, `semester`, `tarif_ukt_nominal`, `jenis_pembiayaan`, `golongan_ukt`, `nama_wali`, `nomor_kip_kuliah`, `dana_saku_subsidi`, `nama_instansi_beasiswa`, `minimal_ipk_syarat`) VALUES
(1, 'Raditya Putra Perdana', '240101001', 2, 4500000.00, 'Mandiri', 'Golongan 4', 'Budi Perdana', NULL, NULL, NULL, NULL),
(2, 'Amelia Cahaya', '240101002', 2, 5500000.00, 'Mandiri', 'Golongan 5', 'Hendra Cahaya', NULL, NULL, NULL, NULL),
(3, 'Bagas Saputra', '240101003', 4, 3500000.00, 'Mandiri', 'Golongan 3', 'Siti Aminah', NULL, NULL, NULL, NULL),
(4, 'Citra Lestari', '240101004', 4, 4500000.00, 'Mandiri', 'Golongan 4', 'Joko Lestari', NULL, NULL, NULL, NULL),
(5, 'Dimas Nugraha', '240101005', 6, 5500000.00, 'Mandiri', 'Golongan 5', 'Agus Nugraha', NULL, NULL, NULL, NULL),
(6, 'Eka Wahyuni', '240101006', 6, 3500000.00, 'Mandiri', 'Golongan 3', 'Sri Wahyuni', NULL, NULL, NULL, NULL),
(7, 'Fajar Ramadhan', '240101007', 2, 4500000.00, 'Mandiri', 'Golongan 4', 'Rudi Ramadhan', NULL, NULL, NULL, NULL),
(8, 'Gita Permata', '240101008', 2, 0.00, 'Bidikmisi', NULL, NULL, 'KIP-2024-00192', 1200000.00, NULL, NULL),
(9, 'Hendra Wijaya', '240101009', 2, 0.00, 'Bidikmisi', NULL, NULL, 'KIP-2024-00283', 1200000.00, NULL, NULL),
(10, 'Indah Sari', '240101010', 4, 0.00, 'Bidikmisi', NULL, NULL, 'KIP-2023-00541', 1200000.00, NULL, NULL),
(11, 'Kevin Sanjaya', '240101011', 4, 0.00, 'Bidikmisi', NULL, NULL, 'KIP-2023-00912', 1200000.00, NULL, NULL),
(12, 'Larasati Putri', '240101012', 6, 0.00, 'Bidikmisi', NULL, NULL, 'KIP-2022-00334', 1250000.00, NULL, NULL),
(13, 'Muhammad Rizky', '240101013', 6, 0.00, 'Bidikmisi', NULL, NULL, 'KIP-2022-00711', 1250000.00, NULL, NULL),
(14, 'Nadia Utami', '240101014', 2, 0.00, 'Bidikmisi', NULL, NULL, 'KIP-2024-00445', 1200000.00, NULL, NULL),
(15, 'Oka Sulistyo', '240101015', 2, 1000000.00, 'Prestasi', NULL, NULL, NULL, NULL, 'Djarum Foundation', 3.50),
(16, 'Putri Handayani', '240101016', 2, 0.00, 'Prestasi', NULL, NULL, NULL, NULL, 'Beasiswa BI (Bank Indonesia)', 3.40),
(17, 'Rian Hidayat', '240101017', 4, 1500000.00, 'Prestasi', NULL, NULL, NULL, NULL, 'Yayasan Toyota Astra', 3.30),
(18, 'Sinta Bella', '240101018', 4, 0.00, 'Prestasi', NULL, NULL, NULL, NULL, 'Beasiswa Unggulan Kemendikbud', 3.75),
(19, 'Taufik Hidayat', '240101019', 6, 1000000.00, 'Prestasi', NULL, NULL, NULL, NULL, 'Djarum Foundation', 3.50),
(20, 'Vina Alvionita', '240101020', 6, 0.00, 'Prestasi', NULL, NULL, NULL, NULL, 'Beasiswa Kaltim Cemerlang', 3.25),
(21, 'Wisnu Wardhana', '240101021', 2, 1200000.00, 'Prestasi', NULL, NULL, NULL, NULL, 'BCA Finance Scholarship', 3.50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_mahasiswa`
--
ALTER TABLE `table_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_mahasiswa`
--
ALTER TABLE `table_mahasiswa`
  MODIFY `id_mahasiswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
