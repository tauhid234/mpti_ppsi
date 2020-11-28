-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Nov 2020 pada 07.02
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

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
-- Struktur dari tabel `laporan`
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
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id`, `unit`, `nama_team`, `foto_lokasi`, `latitude`, `longtitude`, `keterangan`, `tanggal`, `status_laporan`, `nomer_kasus`, `proses_laporan`) VALUES
(1, 'Polsek Pancoran', 'Knights Prime of Power', 'c.jpg', '-6.4660193999999995', '106.7992893', 'target berada di manggarai', '2020-11-02', 'awal', 'NK0', 'selesai'),
(2, 'Polsek Pancoran', 'Eradicate Drugs', 'manggarai.jpg', '-6.1747', '106.827', 'target di lokasi', '2020-11-08', 'awal', 'NK1', 'selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_proses`
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
-- Dumping data untuk tabel `laporan_proses`
--

INSERT INTO `laporan_proses` (`id`, `unit`, `nama_team`, `foto_lokasi_proses`, `latitude_proses`, `longtitude_proses`, `keterangan_proses`, `tanggal_proses`, `status_laporan`, `nomer_kasus`) VALUES
(1, 'Polsek Pancoran', 'Knights Prime of Power', 'manggarai.jpg', '-6.3876732', '106.7477564', 'tersangka didepok', '2020-11-02', 'sudah selesai', 'NK0'),
(2, 'Polsek Pancoran', 'Eradicate Drugs', 'tugu_kujang.jpg', '-6.23074', '106.9013733', 'tersangka ada', '2020-11-08', 'sudah selesai', 'NK1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_tugas`
--

CREATE TABLE `surat_tugas` (
  `id` int(11) NOT NULL,
  `nomer_kasus` varchar(50) NOT NULL,
  `nama_team` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `polsek` varchar(100) NOT NULL,
  `an_tersangka` varchar(100) NOT NULL,
  `foto_tersangka` longtext NOT NULL,
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
-- Dumping data untuk tabel `surat_tugas`
--

INSERT INTO `surat_tugas` (`id`, `nomer_kasus`, `nama_team`, `tanggal`, `tanggal_selesai`, `polsek`, `an_tersangka`, `foto_tersangka`, `jenis_kelamin`, `tgl_lahir`, `agama`, `pendidikan_terakhir`, `pekerjaan`, `warganegara`, `alamat`, `status_tersangka`) VALUES
(1, 'NK0', 'Knights Prime of Power', '2020-11-02', '2020-11-02', 'Polsek Pancoran', 'tester', '', 'Laki - laki', '2020-11-02', 'Hindu', 's1', 'buruh', 'wna', 'tanjung barat', 'tertangkap'),
(3, 'NK1', 'Eradicate Drugs', '2020-11-07', '2020-11-08', 'Polsek Pancoran', 'orang1', 'suspect.jpg', 'Laki - laki', '2020-11-08', 'Protestan', 'd3', 'freelance', 'wna', 'sidoarjo', 'tertangkap'),
(4, 'NK2', 'Knights Prime of Power', '2020-11-08', '0000-00-00', 'Polsek Pancoran', 'pocong', 'download.jpg', 'Laki - laki', '2020-11-08', 'Protestan', 'sd', 'tes', 'wni', 'kuburan', 'belum tertangkap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `nama_team` varchar(100) NOT NULL,
  `status_team` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `team`
--

INSERT INTO `team` (`id`, `nama_anggota`, `unit`, `nama_team`, `status_team`) VALUES
(1, 'tauhid', 'Polsek Pancoran', 'Knights Prime of Power', 'sedang_penyelidikan'),
(2, 'cek', 'Polsek Pancoran', 'Eradicate Drugs', ''),
(3, 'test', 'Polsek Tanjung Priok', 'Eradicate Drugs', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tersangka`
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
-- Dumping data untuk tabel `tersangka`
--

INSERT INTO `tersangka` (`kd_tersangka`, `kd_laporan`, `pasal`, `tanggal`, `nama`, `alias`, `umur`, `pekerjaan`, `warganegara`, `alamat`, `foto`, `unit`, `status_tersangka`, `barang_bukti`) VALUES
('KDT1604330979', 'KDL1604330979', 'Pasal 1 angka 6 jo 111,112, 129', '2020-11-02', 'tester', 'res', '29', 'tes', 'wna', 'lenteng agung', 'qrcode.png', 'Polsek Pancoran', 'tertangkap', '1kg sabu, 2kg ganja'),
('KDT1604814309', 'KDL1604814309', 'Pasal 1 angka 6 jo 111,112, 129', '2020-11-08', 'orang1', 'tes', '22', 'manager', 'wni', 'jl panjaitan', '1.1.jpg', 'Polsek Pancoran', 'tertangkap', '1kg sabu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nrp`, `password`, `nama`, `pangkat`, `jabatan`, `nama_team`, `foto`, `tgl_lahir`, `umur`, `berat_badan`, `tinggi_badan`, `email`, `no_hp`, `alamat`, `unit`, `status_user`) VALUES
('1602373343', '$2y$10$rxpo5PMTeW34w9cuoaSvXeQZhO3T3OEX29SXCO8pZEroLC5OEYIFa', 'deru', 'BRIPDA', 'AKBP', '', 'deru.jpg', '1997-09-11', '23', '55', '170', 'maintainer12@gmail.com', '087896965454', '', 'Polsek Pancoran', 'admin'),
('1604325910', '$2y$10$k0OdsT1LRgcL3hbrpA.OPO4RF/Pd9VMPb3Vb0z2d8OHMTpNrz4Yti', 'tauhid', 'BRIPDA', 'IPDA', 'Knights Prime of Power', 'nestjs.png', '1998-04-05', '22', '58', '173', 'syifatauhid@gmail.com', '081546049359', 'Bojong Gede', 'Polsek Pancoran', 'intel'),
('1604759380', '$2y$10$7S4y5dTP43cwN/xZmHT/r.QxHS0hxDsrxOdWbsWPSxArBV1RsGytu', 'syifa', 'AIPTU', 'IPTU', '', 'tauhid.jpg', '1998-04-05', '22', '58', '173', 'syifatauhid@gmail.com', '081546049359', 'tes admin jabatan', 'Polsek Pancoran', 'admin'),
('1604760195', '$2y$10$H7N1hgOY1865OhE4/z6gWeYKIkyrEoRVQ88PbOh0VmNzKNEsPrZHm', 'cek12', 'AKBP', 'AKP', 'Eradicate Drugs', 'qrcode.png', '2020-11-07', '0', '45', '123', 'tes@gmail.com', '12345678', 'tes', 'Polsek Pancoran', 'intel'),
('1604815121', '$2y$10$GVM5rFqLZRI5fd3/Xktd7u7ak48G5y6P2K.xIB1iHYcg/InaLDmBi', 'tester', 'AIPDA', 'AKP', '', '2.jpg', '2020-11-08', '0', '45', '145', 'marketing@leonjayamandiri.com', '0879654321', 'tes', 'Polsek Pancoran', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan_proses`
--
ALTER TABLE `laporan_proses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_tugas`
--
ALTER TABLE `surat_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `laporan_proses`
--
ALTER TABLE `laporan_proses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `surat_tugas`
--
ALTER TABLE `surat_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
