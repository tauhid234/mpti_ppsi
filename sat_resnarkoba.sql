-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2020 at 02:49 PM
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
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `nama_team` varchar(100) NOT NULL,
  `foto_lokasi` varchar(100) NOT NULL,
  `latitude` longtext NOT NULL,
  `longtitude` longtext NOT NULL,
  `keterangan` longtext NOT NULL,
  `tanggal` date NOT NULL,
  `status_laporan` varchar(50) NOT NULL,
  `nomer_kasus` varchar(100) NOT NULL,
  `proses_laporan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_proses`
--

CREATE TABLE `laporan_proses` (
  `id` int(11) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `nama_team` varchar(100) NOT NULL,
  `foto_lokasi_proses` varchar(100) NOT NULL,
  `latitude_proses` longtext NOT NULL,
  `longtitude_proses` longtext NOT NULL,
  `keterangan_proses` longtext NOT NULL,
  `tanggal_proses` date NOT NULL,
  `status_laporan` varchar(100) NOT NULL,
  `nomer_kasus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat_tugas`
--

CREATE TABLE `surat_tugas` (
  `id` int(11) NOT NULL,
  `nomer_kasus` varchar(50) NOT NULL,
  `nama_team` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `polsek` varchar(100) NOT NULL,
  `an_tersangka` varchar(100) NOT NULL,
  `foto_tersangka` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `tgl_lahir` varchar(100) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `pendidikan_terakhir` varchar(20) NOT NULL,
  `pekerjaan` longtext NOT NULL,
  `warganegara` varchar(40) NOT NULL,
  `alamat` longtext NOT NULL,
  `status_tersangka` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `nama_team` varchar(100) NOT NULL,
  `status_team` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tersangka`
--

CREATE TABLE `tersangka` (
  `kd_tersangka` varchar(50) NOT NULL,
  `kd_laporan` varchar(50) NOT NULL,
  `pasal` varchar(50) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `umur` varchar(20) NOT NULL,
  `pekerjaan` varchar(40) NOT NULL,
  `warganegara` varchar(20) NOT NULL,
  `alamat` longtext NOT NULL,
  `foto` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `status_tersangka` varchar(50) NOT NULL,
  `barang_bukti` longtext NOT NULL
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
  `jabatan` longtext NOT NULL,
  `nama_team` varchar(50) NOT NULL,
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

INSERT INTO `user` (`nrp`, `password`, `nama`, `pangkat`, `jabatan`, `nama_team`, `foto`, `tgl_lahir`, `umur`, `berat_badan`, `tinggi_badan`, `email`, `no_hp`, `alamat`, `unit`, `status_user`) VALUES
('1602373343', '$2y$10$rxpo5PMTeW34w9cuoaSvXeQZhO3T3OEX29SXCO8pZEroLC5OEYIFa', 'deru', 'BRIPDA', '', '', 'deru.jpg', '1997-09-11', '23', '55', '170', 'maintainer12@gmail.com', '087896965454', '', 'Polsek Pancoran', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_proses`
--
ALTER TABLE `laporan_proses`
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
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laporan_proses`
--
ALTER TABLE `laporan_proses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
