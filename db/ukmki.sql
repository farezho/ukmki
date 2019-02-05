-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 03, 2019 at 12:26 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukmki`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `nama_lengkap` varchar(70) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`nama_lengkap`, `username`, `password`, `alamat`, `no_hp`, `email`) VALUES
('admin', 'admin', '5ebe2294ecd0e0f08eab7690d2a6ee69', 'Behind the screen', '101010101010', 'admin@example.com'),
('Meida Chairunnisa', 'meidacz', '0192023a7bbd73250516f069df18b500', 'Jababeka, Cikarang', '085693714656', 'meidacz@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `amanah`
--

CREATE TABLE `amanah` (
  `kode_amanah` int(155) NOT NULL,
  `deskripsi_amanah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amanah`
--

INSERT INTO `amanah` (`kode_amanah`, `deskripsi_amanah`) VALUES
(1, 'Pengurus SKI Fakultas'),
(2, 'Pengurus UKMKI'),
(3, 'Bukan Pengurus UKMKI/SKI Fakultas'),
(4, 'Alumni UKMKI/SKI Fakultas');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `nama_lengkap` varchar(70) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `kode_fakultas` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `kode_amanah` int(155) NOT NULL,
  `kode_kdr` int(155) NOT NULL,
  `kode_exc` int(155) NOT NULL,
  `nama_mentor` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`nama_lengkap`, `nim`, `kode_fakultas`, `alamat`, `no_hp`, `kode_amanah`, `kode_kdr`, `kode_exc`, `nama_mentor`) VALUES
('Siapa Aku', '1010101010', 'FK', 'Liat aja di KTP', '12345678910', 2, 2, 1, 'Maaf Lupa'),
('Farah Maulidiyah', '1302142186', 'FST', 'Kota Deltamas, Cikarang Pusat', '085723640597', 3, 1, 3, '-');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `kode_fakultas` varchar(15) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`kode_fakultas`, `deskripsi`) VALUES
('FEB', 'Fakultas Ekonomi dan Bisnis'),
('FF', 'Fakultas Farmasi'),
('FH', 'Fakultas Hukum'),
('FIB', 'Fakultas Ilmu Budaya'),
('FISIP', 'Fakultas Sosial dan Politik'),
('FK', 'Fakultas Kedokteran'),
('FKG', 'Fakultas Kedokteran Gigi'),
('FKH', 'Fakultas Kedokteran Hewan'),
('FKM', 'Fakultas Kesehatan Masyarakat'),
('FKP', 'Fakultas Keperawatan'),
('FPK', 'Fakultas Perikanan dan Kelautan'),
('FPSI', 'Fakultas Psikologi'),
('FST', 'Fakultas Sains dan Teknologi'),
('FV', 'Fakultas Vokasi');

-- --------------------------------------------------------

--
-- Table structure for table `status_exc`
--

CREATE TABLE `status_exc` (
  `kode_exc` int(155) NOT NULL,
  `deskripsi_exc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_exc`
--

INSERT INTO `status_exc` (`kode_exc`, `deskripsi_exc`) VALUES
(1, 'Sudah ada kelompok'),
(2, 'Belum ada kelompok'),
(3, 'Tidak bersedia mengikuti mentoring');

-- --------------------------------------------------------

--
-- Table structure for table `status_kdr`
--

CREATE TABLE `status_kdr` (
  `kode_kdr` int(155) NOT NULL,
  `deskripsi_kdr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_kdr`
--

INSERT INTO `status_kdr` (`kode_kdr`, `deskripsi_kdr`) VALUES
(1, 'Pra Mula'),
(2, 'Mula (Sudah PDK 1)'),
(3, 'Madya (Sudah PDK 2)'),
(4, 'Utama (Sudah PDK 3)');

-- --------------------------------------------------------

--
-- Table structure for table `superuser`
--

CREATE TABLE `superuser` (
  `nama_lengkap` varchar(70) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superuser`
--

INSERT INTO `superuser` (`nama_lengkap`, `username`, `password`, `alamat`, `no_hp`, `email`) VALUES
('Superuser', 'superuser', '334c8ea142c6a932a8cb2692c4435505', 'Behind The Screen', '101010101010', 'superuser@example.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `amanah`
--
ALTER TABLE `amanah`
  ADD PRIMARY KEY (`kode_amanah`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `kode_amanah` (`kode_amanah`),
  ADD KEY `kode_kdr` (`kode_kdr`),
  ADD KEY `kode_exc` (`kode_exc`),
  ADD KEY `kode_fakultas` (`kode_fakultas`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`kode_fakultas`);

--
-- Indexes for table `status_exc`
--
ALTER TABLE `status_exc`
  ADD PRIMARY KEY (`kode_exc`);

--
-- Indexes for table `status_kdr`
--
ALTER TABLE `status_kdr`
  ADD PRIMARY KEY (`kode_kdr`);

--
-- Indexes for table `superuser`
--
ALTER TABLE `superuser`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amanah`
--
ALTER TABLE `amanah`
  MODIFY `kode_amanah` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status_exc`
--
ALTER TABLE `status_exc`
  MODIFY `kode_exc` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_kdr`
--
ALTER TABLE `status_kdr`
  MODIFY `kode_kdr` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`kode_amanah`) REFERENCES `amanah` (`kode_amanah`),
  ADD CONSTRAINT `anggota_ibfk_2` FOREIGN KEY (`kode_exc`) REFERENCES `status_exc` (`kode_exc`),
  ADD CONSTRAINT `anggota_ibfk_3` FOREIGN KEY (`kode_fakultas`) REFERENCES `fakultas` (`kode_fakultas`),
  ADD CONSTRAINT `anggota_ibfk_4` FOREIGN KEY (`kode_kdr`) REFERENCES `status_kdr` (`kode_kdr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
