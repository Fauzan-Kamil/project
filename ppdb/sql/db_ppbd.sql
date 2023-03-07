-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2022 at 04:59 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ppbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `ttl` varchar(75) NOT NULL,
  `alamat` varchar(75) NOT NULL,
  `orang_tua` varchar(50) NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `rata_un` int(50) NOT NULL,
  `ijazah` varchar(75) NOT NULL,
  `status` enum('Menunggu Konfirmasi','Terima','Cadangkan','Tidak Diterima') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `gender`, `ttl`, `alamat`, `orang_tua`, `asal_sekolah`, `rata_un`, `ijazah`, `status`) VALUES
(1, 'Dhivas Dharma Saputra', 'Laki-laki', 'Jakarta,2022-09-19', 'Taman Tridaya Indah II, Tambun', 'sadsad', '', 0, '', 'Cadangkan'),
(2, 'Fauzan  Kamil', 'Laki-laki', 'Jakarta,2022-09-28', 'Tridayasakti, Tambun Selatan', 'sadsad', 'sadsada', 16, '', 'Menunggu Konfirmasi'),
(4, '', '', ',', '', '', '', 0, '913-aaaa.pdf', 'Terima'),
(5, '', '', ',', '', '', '', 0, '943-aaaa.pdf', 'Terima'),
(6, 'Fauzan  Kamil', 'Laki-laki', 'Jakarta,2022-09-28', 'aaltaqa', 'sadsad', 'sadsada', 56, '283-aaaa.pdf', ''),
(7, '', '', ',', '', '', '', 0, '235-aaaa.pdf', ''),
(8, 'Dayna', 'Laki-laki', 'Jakarta,2022-09-28', 'asdsad', 'sadas', 'asdas', 16, '765-Pert-2-Selasa-20Sept22-F7A5-Deep Learning-201910225162-Dhivas Dharma Sa', 'Cadangkan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email`, `password`, `level`) VALUES
(1, 'Dhivas', 'admin', 'dhivasdharmaaa@gmail.com', 'asd', 'admin'),
(7, 'Fauzan Kamil', 'kamil', 'kamilbotax33@gmail.com', 'asdasd', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
