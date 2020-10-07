-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2020 at 04:37 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sat_resnarkoba`
--

-- --------------------------------------------------------

--
-- Table structure for table `laporan_awal`
--

CREATE TABLE `laporan_awal` (
  `id` int(11) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `latitude` longtext NOT NULL,
  `longtitude` longtext NOT NULL,
  `keterangan` longtext NOT NULL,
  `foto_location` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_awal`
--

INSERT INTO `laporan_awal` (`id`, `unit`, `latitude`, `longtitude`, `keterangan`, `foto_location`, `tanggal`, `status`) VALUES
(1, 'Polsek Pancoran', '-7.090910999999999', '107.668887', 'berjalan ke dpo', 'manggarai.jpg', '2020-10-07', 'awal');

-- --------------------------------------------------------

--
-- Table structure for table `surat_tugas`
--

CREATE TABLE `surat_tugas` (
  `id` int(11) NOT NULL,
  `nomer_kasus` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `polsek` varchar(100) NOT NULL,
  `an_tersangka` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `tgl_lahir` varchar(100) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `pendidikan_terakhir` varchar(20) NOT NULL,
  `pekerjaan` longtext NOT NULL,
  `warganegara` varchar(40) NOT NULL,
  `alamat` longtext NOT NULL,
  `status_tersangka` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_tugas`
--

INSERT INTO `surat_tugas` (`id`, `nomer_kasus`, `nama`, `tanggal`, `polsek`, `an_tersangka`, `jenis_kelamin`, `tgl_lahir`, `agama`, `pendidikan_terakhir`, `pekerjaan`, `warganegara`, `alamat`, `status_tersangka`) VALUES
(1, '445', 'tauhid,tes', '2020-10-07', 'Polsek Pancoran', 'tes', 'Laki - laki', '2020-07-07', 'Islam', 'sd', 'tes3', 'wna', 'fgg', 'belum tertangkap');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `nrp` varchar(50) NOT NULL,
  `nama_team` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tersangka`
--

CREATE TABLE `tersangka` (
  `kd_tersangka` varchar(50) NOT NULL,
  `kd_laporan` varchar(50) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `umur` varchar(20) NOT NULL,
  `pekerjaan` varchar(40) NOT NULL,
  `warganegara` varchar(20) NOT NULL,
  `alamat` longtext NOT NULL,
  `foto` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `status_tersangka` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nrp` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pangkat` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `umur` varchar(20) NOT NULL,
  `berat_badan` varchar(20) NOT NULL,
  `tinggi_badan` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` longtext NOT NULL,
  `unit` varchar(100) NOT NULL,
  `status_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nrp`, `password`, `nama`, `pangkat`, `foto`, `tgl_lahir`, `umur`, `berat_badan`, `tinggi_badan`, `email`, `no_hp`, `alamat`, `unit`, `status_user`) VALUES
('1601335271', '$2y$10$568Dpj/XXzuzF/iRbKh1xO88exoZVVt1Fbo4uPEgohcrAPoNb5l3K', 'tauhid', 'BRIPDA', 'no-photo.jpg', '2020-09-29', '0', '55', '172', 'syifatauhid@gmail.com', '081546049359', 'tes', 'Polsek Pancoran', 'intel'),
('1601338419', '$2y$10$QCVRD3.jyVLQPV2WTEshd.1H7ZV5bpC8F4LpUov0RrAJTENcTyZTe', 'deru10', 'BRIPKA', 'deru.jpg', '1997-08-22', '23', '60', '165', 'tes@gmail.com', '081546049359', 'tes admin', 'Polsek Metro Setiabudi', 'admin'),
('1601593877', '$2y$10$SiswjONE4q1xCXvWjrf8Au8wMF40m8DY9OctYMMlTy2kxZLHofXUy', 'balqish', 'BRIPDA', 'no-photo.jpg', '2006-07-23', '14', '55', '160', 'syifatauhid@gmail.com', '085710156969', 'tes', 'Polsek Pancoran', 'admin'),
('1601595521', '$2y$10$GtSFC6SL2njN.UtmTZfwNe84cZCDKkIZRX3gvhTTJpDYQ6m.v2Ubm', 'tes', 'BRIPKA', 'no-photo.jpg', '1998-10-20', '22', '45', '155', 'tes@gmail.com', '081546049359', 'tes', 'Polsek Pancoran', 'intel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laporan_awal`
--
ALTER TABLE `laporan_awal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporan_awal`
--
ALTER TABLE `laporan_awal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
