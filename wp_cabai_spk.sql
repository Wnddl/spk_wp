-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2025 at 04:18 PM
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
-- Database: `wp_cabai_spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_alternatif`
--

CREATE TABLE `wp_alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `kode_alternatif` varchar(10) NOT NULL,
  `nama_alternatif` varchar(255) NOT NULL,
  `vektor_s` float NOT NULL,
  `vektor_v` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wp_alternatif`
--

INSERT INTO `wp_alternatif` (`id_alternatif`, `kode_alternatif`, `nama_alternatif`, `vektor_s`, `vektor_v`) VALUES
(1, 'A1', 'HIBRIDIA F1', 0, 0),
(2, 'A2', 'SONAR F1', 0, 0),
(3, 'A3', 'TANJUNG F1', 0, 0),
(4, 'A4', 'HOT BEAUTY F1', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_bobot`
--

CREATE TABLE `wp_bobot` (
  `id_kriteria` int(11) NOT NULL,
  `nilai_bobot` double NOT NULL,
  `hasil_bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wp_bobot`
--

INSERT INTO `wp_bobot` (`id_kriteria`, `nilai_bobot`, `hasil_bobot`) VALUES
(28, 0.27, 0.40298507462687),
(29, 0.2, 0.29850746268657),
(30, 0.2, 0.29850746268657);

-- --------------------------------------------------------

--
-- Table structure for table `wp_kriteria`
--

CREATE TABLE `wp_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(5) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `tipe_kriteria` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wp_kriteria`
--

INSERT INTO `wp_kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`, `tipe_kriteria`) VALUES
(27, 'K1', 'TINGGI TANAMAN', 'benefit'),
(28, 'K2', 'JUMLAH CABANG', 'benefit'),
(29, 'K3', 'JUMLAH DAUN', 'benefit'),
(30, 'K4', 'UMUR PANEN', 'cost'),
(31, 'K5', 'HARGA BENIH', 'cost');

-- --------------------------------------------------------

--
-- Table structure for table `wp_nilai`
--

CREATE TABLE `wp_nilai` (
  `id_nilai` int(6) NOT NULL,
  `ket_nilai` varchar(45) NOT NULL,
  `jum_nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wp_nilai`
--

INSERT INTO `wp_nilai` (`id_nilai`, `ket_nilai`, `jum_nilai`) VALUES
(1, 'SANGAT (TINGGI/BANYAK)', 5),
(2, '(TINGGI/BANYAK)', 4),
(3, 'CUKUP (TINGGI/BANYAK)', 3),
(4, 'SEDIKIT (PENDEK/BANYAK)', 2),
(5, 'RENDAH (SANGAT SEDIKIT/SANGAT PENDEK)', 1),
(6, 'SANGAT CEPAT(MURAH)', 1),
(7, 'CEPAT/MURAH', 2),
(8, 'SEDANG', 3),
(9, 'MAHAL/LAMA', 4),
(10, 'SANGAT MAHAL/LAMA(>90HARI)', 5);

-- --------------------------------------------------------

--
-- Table structure for table `wp_rangking`
--

CREATE TABLE `wp_rangking` (
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai_rangking` double NOT NULL,
  `nilai_normalisasi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wp_rangking`
--

INSERT INTO `wp_rangking` (`id_alternatif`, `id_kriteria`, `nilai_rangking`, `nilai_normalisasi`) VALUES
(1, 27, 0, 0),
(2, 28, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_user`
--

CREATE TABLE `wp_user` (
  `id_pengguna` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wp_user`
--

INSERT INTO `wp_user` (`id_pengguna`, `nama_lengkap`, `username`, `password`) VALUES
(1, 'guru', 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_alternatif`
--
ALTER TABLE `wp_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `wp_bobot`
--
ALTER TABLE `wp_bobot`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `wp_kriteria`
--
ALTER TABLE `wp_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `wp_nilai`
--
ALTER TABLE `wp_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `wp_rangking`
--
ALTER TABLE `wp_rangking`
  ADD PRIMARY KEY (`id_alternatif`,`id_kriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `wp_user`
--
ALTER TABLE `wp_user`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_alternatif`
--
ALTER TABLE `wp_alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `wp_kriteria`
--
ALTER TABLE `wp_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `wp_nilai`
--
ALTER TABLE `wp_nilai`
  MODIFY `id_nilai` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wp_user`
--
ALTER TABLE `wp_user`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wp_bobot`
--
ALTER TABLE `wp_bobot`
  ADD CONSTRAINT `wp_bobot_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `wp_kriteria` (`id_kriteria`);

--
-- Constraints for table `wp_rangking`
--
ALTER TABLE `wp_rangking`
  ADD CONSTRAINT `rangking_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `wp_alternatif` (`id_alternatif`),
  ADD CONSTRAINT `rangking_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `wp_kriteria` (`id_kriteria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
