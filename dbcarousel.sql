-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2018 at 07:19 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcarousel`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `nik` int(9) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`nik`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_dosen` int(10) NOT NULL,
  `rfid` int(10) NOT NULL,
  `nik` varchar(15) NOT NULL,
  `images` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_dosen`, `rfid`, `nik`,`images`, `nama`, `jabatan`, `jenis_kelamin`) VALUES
(6, 11851, '410100381', 'Ade Hendri Hendrawan S.Kom., M.Kom ', 'Kaprodi', 'Laki-laki'),
(7, 11846, '410100454', 'Ritzkal S.Kom., M.Kom', 'Kepala Lab NCC', 'Laki-laki'),
(8, 11761, '410100382', 'Bayu Adhi Prakosa S.Kom., M.T', 'Dosen Tetap', 'Laki-laki');

-- --------------------------------------------------------

--
-- Table structure for table `tbkehadiran`
--

CREATE TABLE `tbkehadiran` (
  `id` int(11) NOT NULL,
  `rfid` int(10) NOT NULL,
  `jamdatang` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jampulang` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbkehadiran`
--

INSERT INTO `tbkehadiran` (`id`, `rfid`, `jamdatang`, `jampulang`, `status`) VALUES
(1, 11846, '2018-03-28 17:18:35', '2018-03-28 17:19:05', '2'),
(2, 11761, '2018-03-28 17:29:04', '2018-03-28 17:29:49', '2'),
(3, 11851, '2018-03-28 17:33:15', '2018-03-28 17:36:14', '2'),
(4, 11902, '2018-03-28 17:38:38', '2018-03-28 17:39:05', '2'),
(5, 11851, '2018-03-28 17:58:14', '2018-03-28 17:58:32', '2'),
(6, 11851, '2018-04-03 10:42:46', '2018-04-03 10:44:48', '2'),
(7, 11761, '2018-04-03 10:42:52', '2018-04-03 10:44:57', '2'),
(8, 11846, '2018-04-03 10:42:59', '2018-04-03 10:45:04', '2'),
(9, 11761, '2018-04-04 10:09:22', '2018-04-04 10:11:54', '2'),
(10, 11851, '2018-04-04 10:09:29', '2018-04-04 10:11:03', '2'),
(11, 11846, '2018-04-04 10:09:36', '2018-04-04 10:12:00', '2'),
(12, 11851, '2018-04-04 10:11:21', '2018-04-04 10:12:15', '2'),
(13, 11761, '2018-04-05 03:41:07', '2018-04-05 10:14:16', '2'),
(14, 11846, '2018-04-05 03:41:14', '2018-04-05 10:14:08', '2'),
(15, 11851, '2018-04-05 03:42:07', '2018-04-05 10:14:22', '2'),
(16, 11851, '2018-04-06 11:06:13', '2018-04-06 11:16:37', '2'),
(17, 11761, '2018-04-06 11:06:19', '2018-04-06 11:16:43', '2'),
(18, 11846, '2018-04-06 11:06:26', '2018-04-06 11:16:51', '2'),
(20, 11851, '2018-04-11 04:44:27', '2018-04-11 12:17:22', '2'),
(21, 11846, '2018-04-11 04:44:33', '2018-04-11 12:17:28', '2'),
(22, 11851, '2018-04-13 06:55:41', '2018-04-13 07:31:50', '2'),
(23, 11851, '2018-04-13 07:32:32', '2018-04-13 07:32:48', '2'),
(24, 11851, '2018-04-13 07:33:44', '2018-04-13 07:34:15', '2'),
(25, 11851, '2018-04-13 07:34:38', '2018-04-13 07:37:21', '2'),
(26, 11851, '2018-04-13 07:37:55', '2018-04-13 07:44:31', '2'),
(27, 11846, '2018-04-13 07:45:33', '2018-04-13 07:46:10', '2'),
(29, 11846, '2018-04-16 07:49:23', '2018-04-16 07:49:48', '2'),
(30, 11761, '2018-04-20 09:45:13', '2018-04-20 10:02:26', '2'),
(31, 11846, '2018-04-20 09:45:19', '2018-04-20 10:01:59', '2'),
(32, 11851, '2018-04-20 09:45:25', '2018-04-20 10:02:46', '2'),
(33, 11761, '2018-04-23 15:03:20', '2018-04-23 15:10:04', '2'),
(34, 11846, '2018-04-23 15:03:44', '2018-04-23 15:11:38', '2'),
(35, 11851, '2018-04-23 15:04:15', '2018-04-23 15:13:21', '2'),
(36, 11846, '2018-04-24 03:57:56', '2018-04-24 03:58:36', '2'),
(37, 11846, '2018-04-24 14:45:43', '2018-04-24 14:46:36', '2'),
(38, 11846, '2018-04-24 14:48:31', '2018-04-24 14:48:41', '2'),
(39, 11846, '2018-04-24 14:55:57', '2018-04-24 15:03:37', '2'),
(40, 11846, '2018-04-25 09:26:35', '2018-04-25 09:26:55', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`rfid`),
  ADD UNIQUE KEY `rfid_2` (`rfid`),
  ADD KEY `rfid` (`rfid`);

--
-- Indexes for table `tbkehadiran`
--
ALTER TABLE `tbkehadiran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbkehadiran`
--
ALTER TABLE `tbkehadiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
