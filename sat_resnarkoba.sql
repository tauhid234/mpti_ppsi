-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2020 at 02:21 AM
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
('1601338419', '$2y$10$QCVRD3.jyVLQPV2WTEshd.1H7ZV5bpC8F4LpUov0RrAJTENcTyZTe', 'deru', 'BRIPKA', 'deru.jpg', '1997-08-22', '23', '60', '165', 'tes@gmail.com', '081546049359', 'tes admin', 'Polsek Metro Setiabudi', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
