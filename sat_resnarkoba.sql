-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2020 at 04:22 PM
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

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `unit`, `nama_team`, `foto_lokasi`, `latitude`, `longtitude`, `keterangan`, `tanggal`, `status_laporan`, `nomer_kasus`, `proses_laporan`) VALUES
(1, 'Polsek Pancoran', 'Knights Prime of Power', 'c.jpg', '-6.4660579', '106.79932910000001', 'tes ', '2020-10-17', 'awal', 'NK0', 'selesai');

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

--
-- Dumping data for table `laporan_proses`
--

INSERT INTO `laporan_proses` (`id`, `unit`, `nama_team`, `foto_lokasi_proses`, `latitude_proses`, `longtitude_proses`, `keterangan_proses`, `tanggal_proses`, `status_laporan`, `nomer_kasus`) VALUES
(1, 'Polsek Pancoran', 'Knights Prime of Power', 'detos.jpg', '-7.090910999999999', '107.668887', 'tes laporan proses', '2020-10-18', 'sudah selesai', 'NK0');

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

INSERT INTO `surat_tugas` (`id`, `nomer_kasus`, `nama_team`, `tanggal`, `tanggal_selesai`, `polsek`, `an_tersangka`, `jenis_kelamin`, `tgl_lahir`, `agama`, `pendidikan_terakhir`, `pekerjaan`, `warganegara`, `alamat`, `status_tersangka`) VALUES
(1, 'NK0', 'Knights Prime of Power', '2020-10-17', '2020-10-18', 'Polsek Pancoran', 'tes 123', 'Laki - laki', '2020-10-17', 'Budha', 's2', 'tes', 'wni', 'f', 'tertangkap'),
(2, 'NK1', 'Valkyrie Light', '2020-10-17', '0000-00-00', 'Polsek Pancoran', 'tes321', 'Perempuan', '2020-10-17', 'Katolik', 's1', 'tes bb', 'wna', 'cvb', 'belum tertangkap');

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

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `nama_anggota`, `unit`, `nama_team`, `status_team`) VALUES
(1, 'tauhid', 'Polsek Pancoran', 'Knights Prime of Power', ''),
(2, 'balqish', 'Polsek Pancoran', 'Knights Prime of Power', ''),
(3, 'teri', 'Polsek Kebayoran Lama', 'Eagle Eye Knights', ''),
(4, 'rheza', 'Polsek Pancoran', 'Eagle Eye Knights', ''),
(5, 'darma', 'Polsek Pancoran', 'Valkyrie Light', 'sedang_penyelidikan');

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

--
-- Dumping data for table `tersangka`
--

INSERT INTO `tersangka` (`kd_tersangka`, `kd_laporan`, `pasal`, `tanggal`, `nama`, `alias`, `umur`, `pekerjaan`, `warganegara`, `alamat`, `foto`, `unit`, `status_tersangka`, `barang_bukti`) VALUES
('KDT1603024856', 'KDL1603024856', 'Pasal 1 angka 5 jo Pasal 113', '2020-10-18', 'tes 123', '456', '45', 'buruh', 'wni', 'bogo', 'nestjs.png', 'Polsek Pancoran', 'tertangkap', 'blablablablblablbla');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nrp` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pangkat` varchar(50) NOT NULL,
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

INSERT INTO `user` (`nrp`, `password`, `nama`, `pangkat`, `nama_team`, `foto`, `tgl_lahir`, `umur`, `berat_badan`, `tinggi_badan`, `email`, `no_hp`, `alamat`, `unit`, `status_user`) VALUES
('1602373018', '$2y$10$55EJ1BNsPgXPHZg0gF0dnudxIBb6uQ8ymkd8R534E2quCuW9MKZgu', 'tauhid', 'BRIPDA', 'Knights Prime of Power', 'tauhid.jpg', '1998-04-05', '22', '55', '173', 'syifatauhid@gmail.com', '081546049359', '', 'Polsek Pancoran', 'intel'),
('1602373175', '$2y$10$rf3fFtRKgK.kAV9mNUU8LeGNe1fCED9F.I7KoL8j9G29hkeGqxZdy', 'balqish', 'BRIPKA', 'Knights Prime of Power', 'qrcode.png', '2006-07-23', '14', '55', '160', 'balqishfitri1@gmail.com', '085610156969', 'tes', 'Polsek Pancoran', 'intel'),
('1602373271', '$2y$10$PgrbmY5PMQ7JotZfYxhgDOUxJqKB2ohq4U9Ad5EXtBb4n9R1KAw/O', 'teri', 'BRIPDA', 'Eagle Eye Knights', 'no-photo.jpg', '1998-08-11', '22', '60', '165', 'teri@gamil.com', '085674743232', 'tes', 'Polsek Kebayoran Lama', 'intel'),
('1602373343', '$2y$10$rxpo5PMTeW34w9cuoaSvXeQZhO3T3OEX29SXCO8pZEroLC5OEYIFa', 'deru', 'BRIPDA', '', 'deru.jpg', '1997-09-11', '23', '55', '170', 'maintainer12@gmail.com', '087896965454', '', 'Polsek Pancoran', 'admin'),
('1602373522', '$2y$10$.AWGCF9nAmJbnxivsmEdhOuJAqC82wZG1a7HFacEcUs9FLaPYH0gG', 'dion', 'BRIPDA', '', 'kucing.jpg', '1999-12-11', '21', '51', '160', 'dion@gmail.com', '089680355861', 'tes', 'Polsek Kebayoran Lama', 'admin'),
('1602375639', '$2y$10$ZBgC3a6zibLJzp2W3xKFIOil1e9DUgzCZO16w4i77oUgejSgUnhRe', 'rheza', 'BRIPDA', 'Eagle Eye Knights', 'orang.jpg', '1996-10-11', '24', '55', '170', 'rheza@gmail.com', '089651733966', 'tes', 'Polsek Pancoran', 'intel'),
('1602412416', '$2y$10$OFOqUuJrzuGalwlr47cOFOiBVAnynvDguNANue8SfvcRaA/nG4.IO', 'darma', 'BRIPDA', 'Valkyrie Light', 'manggarai.jpg', '1987-06-11', '33', '55', '175', 'darma@gmail.com', '087656568989', 'tes', 'Polsek Pancoran', 'intel');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
