-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2021 at 10:59 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kalasan`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` enum('l','p') DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `categories` int(11) NOT NULL,
  `mst_group` int(11) NOT NULL,
  `address` text NOT NULL,
  `is_local` enum('1','0') NOT NULL,
  `is_leave` enum('1','0') NOT NULL,
  `is_active` enum('1','0') NOT NULL,
  `born_date` datetime NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `gender`, `phone`, `categories`, `mst_group`, `address`, `is_local`, `is_leave`, `is_active`, `born_date`, `description`) VALUES
(1, 'Hamdan Amirullah', 'l', '+6283840271196', 2, 2, 'xxx', '1', '0', '1', '2021-01-11 00:00:00', 'xxx'),
(2, 'Firdaus', 'l', '+6281904727573', 2, 2, 'zzz', '1', '0', '1', '2021-01-21 00:00:00', 'zzz'),
(3, 'Mashudi Rohmat', 'l', '+6285725849356', 2, 1, 'Kaliajir lor, rt 08 rw 08 Berbah, Depok, Yogyakarta', '0', '1', '1', '1994-11-08 00:00:00', 'Asli Wonogiri, Kuliah di Amikom jurusan S1 Sistem Informasi angkatan 2017'),
(4, 'Luluk Fadiyah', 'p', '+6285540313781', 2, 1, 'Kaliajir lor, rt 08 rw 08 Berbah, Depok, Yogyakarta', '1', '0', '1', '1996-06-18 00:00:00', 'S1 Jurusan Ilmu Komputer, \r\nBerkerja di Git Solution sebagai System Analyst'),
(5, 'Erda', 'l', '123', 2, 4, 'eee', '1', '0', '1', '2021-01-20 00:00:00', 'eee'),
(6, 'Vivi', 'p', '123', 2, 4, 'www', '1', '0', '1', '2021-01-20 00:00:00', 'www'),
(7, 'Dios Nor Ardiyansyah', 'l', '123', 2, 3, 'www', '1', '0', '1', '2021-01-12 00:00:00', 'www'),
(8, 'Bella', 'p', '123', 2, 3, 'www', '1', '0', '1', '2021-01-18 00:00:00', 'www'),
(9, 'Nurul Qomar', 'l', '123', 2, 5, 'www', '1', '0', '1', '2021-01-13 00:00:00', 'wwww'),
(10, 'Anggi', 'l', '123', 2, 5, 'ss', '1', '0', '1', '2021-01-20 00:00:00', 'aaa'),
(26, 'Ariefcha Anugrah', 'l', '+6281282455364', 2, 1, 'Jl. Janti, Kalasan, Depok, Sleman', '0', '1', '1', '1993-07-22 00:00:00', 'Asli Karawang, berkerja di Hotel Fornt One Ring Road');

-- --------------------------------------------------------

--
-- Table structure for table `mst_categories`
--

CREATE TABLE `mst_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_categories`
--

INSERT INTO `mst_categories` (`id`, `name`, `is_active`) VALUES
(1, 'Pra remaja', '1'),
(2, 'Remaja', '1'),
(4, 'GP', '1'),
(5, 'Caberawit', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_group`
--

CREATE TABLE `mst_group` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_group`
--

INSERT INTO `mst_group` (`id`, `name`, `is_active`) VALUES
(1, 'Babarsari', '1'),
(2, 'Pundungrejo', '1'),
(3, 'Babadan', '1'),
(4, 'Bogem', '1'),
(5, 'Sambisari', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mst_group` int(11) NOT NULL,
  `role` enum('kmm_klp','kmm_desa','ppd') DEFAULT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `mst_group`, `role`, `is_active`) VALUES
(1, 'dimas', '7d49e40f4b3d8f68c19406a58303f826', 'Mashudi Rohmat', 1, 'kmm_desa', '1'),
(2, 'rosa', '84109ae4b4178430b8174b1dfef9162b', 'Rosa Permana Putra', 1, 'kmm_klp', '1'),
(4, 'ariefcha', '343ef3fcedd5abfdeb98f42a095f8f12', 'Ariefcha Anugrah A', 1, 'ppd', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_categories`
--
ALTER TABLE `mst_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_group`
--
ALTER TABLE `mst_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `mst_categories`
--
ALTER TABLE `mst_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mst_group`
--
ALTER TABLE `mst_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
