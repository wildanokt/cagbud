-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2019 at 12:48 PM
-- Server version: 10.1.36-MariaDB
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
-- Database: `cagar-budaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `id_situs` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `komentar` mediumtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `id_situs` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `deskripsi` mediumtext NOT NULL,
  `foto` varchar(256) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `id_situs`, `id_user`, `deskripsi`, `foto`, `date_created`) VALUES
(1, 3, 2, 'tes', 'laporan_vvv_Batu1.jpg', '2019-11-17 09:31:07');

-- --------------------------------------------------------

--
-- Table structure for table `situs`
--

CREATE TABLE `situs` (
  `id` int(11) NOT NULL,
  `nama_situs` varchar(256) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_situs` varchar(256) NOT NULL,
  `deskripsi` mediumtext NOT NULL,
  `foto` varchar(256) NOT NULL DEFAULT 'default.png',
  `kondisi` mediumtext NOT NULL,
  `is_verif` int(1) NOT NULL,
  `jalan` varchar(256) NOT NULL,
  `kecamatan` varchar(256) NOT NULL,
  `kota` varchar(256) NOT NULL,
  `provinsi` varchar(256) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `situs`
--

INSERT INTO `situs` (`id`, `nama_situs`, `id_user`, `kode_situs`, `deskripsi`, `foto`, `kondisi`, `is_verif`, `jalan`, `kecamatan`, `kota`, `provinsi`, `date_created`) VALUES
(3, 'vvv Batu', 2, '12312 kkkanskdn 212w n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam semper varius ante sit amet lacinia. Nullam et molestie ante. Sed ligula felis, luctus id mollis tincidunt, aliquam eu justo. Praesent non turpis nibh. Curabitur id massa rhoncus, varius nisi vel, placerat urna. Duis vitae tellus ac neque condimentum ornare. Ut rutrum magna non fermentum consectetur. Praesent volutpat cursus scelerisque. Duis iaculis pharetra elit, vel tincidunt tellus pharetra ut. Nam placerat erat ac libero viverra mattis. Nulla pellentesque pellentesque tellus, ut ornare est elementum at. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent orci arcu, aliquam nec interdum ac, pellentesque sit amet nisl. Sed congue ornare orci, ac blandit elit tincidunt eu. Donec pellentesque finibus ultricies. Cras tincidunt metus quam, in cursus risus tincidunt eu.', 'situs_vvv_Batu.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam semper varius ante sit amet lacinia. Nullam et molestie ante. Sed ligula felis, luctus id mollis tincidunt, aliquam eu justo. Praesent non turpis nibh. Curabitur id massa rhoncus, varius nisi vel, placerat urna. Duis vitae tellus ac neque condimentum ornare. Ut rutrum magna non fermentum consectetur. Praesent volutpat cursus scelerisque. Duis iaculis pharetra elit, vel tincidunt tellus pharetra ut. Nam placerat erat ac libero viverra mattis. Nulla pellentesque pellentesque tellus, ut ornare est elementum at. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent orci arcu, aliquam nec interdum ac, pellentesque sit amet nisl. Sed congue ornare orci, ac blandit elit tincidunt eu. Donec pellentesque finibus ultricies. Cras tincidunt metus quam, in cursus risus tincidunt eu.', 1, 'jl. batu angin', 'pandan asin', 'banyuresik', 'jawa utara', '2019-11-17 03:35:28'),
(4, 'Candi Batu', 2, 'aaaa', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam semper varius ante sit amet lacinia. Nullam et molestie ante. Sed ligula felis, luctus id mollis tincidunt, aliquam eu justo. Praesent non turpis nibh. Curabitur id massa rhoncus, varius nisi vel, placerat urna. Duis vitae tellus ac neque condimentum ornare. Ut rutrum magna non fermentum consectetur. Praesent volutpat cursus scelerisque. Duis iaculis pharetra elit, vel tincidunt tellus pharetra ut. Nam placerat erat ac libero viverra mattis. Nulla pellentesque pellentesque tellus, ut ornare est elementum at. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent orci arcu, aliquam nec interdum ac, pellentesque sit amet nisl. Sed congue ornare orci, ac blandit elit tincidunt eu. Donec pellentesque finibus ultricies. Cras tincidunt metus quam, in cursus risus tincidunt eu.', 'situs_Candi_Batu.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam semper varius ante sit amet lacinia. Nullam et molestie ante. Sed ligula felis, luctus id mollis tincidunt, aliquam eu justo. Praesent non turpis nibh. Curabitur id massa rhoncus, varius nisi vel, placerat urna. Duis vitae tellus ac neque condimentum ornare. Ut rutrum magna non fermentum consectetur. Praesent volutpat cursus scelerisque. Duis iaculis pharetra elit, vel tincidunt tellus pharetra ut. Nam placerat erat ac libero viverra mattis. Nulla pellentesque pellentesque tellus, ut ornare est elementum at. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent orci arcu, aliquam nec interdum ac, pellentesque sit amet nisl. Sed congue ornare orci, ac blandit elit tincidunt eu. Donec pellentesque finibus ultricies. Cras tincidunt metus quam, in cursus risus tincidunt eu.', 1, 'jl. batu angin', 'pandan asin', 'banyuresik', 'jawa utara', '2019-11-17 03:35:39'),
(5, 'Candi Batu', 2, 'aaaa', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam semper varius ante sit amet lacinia. Nullam et molestie ante. Sed ligula felis, luctus id mollis tincidunt, aliquam eu justo. Praesent non turpis nibh. Curabitur id massa rhoncus, varius nisi vel, placerat urna. Duis vitae tellus ac neque condimentum ornare. Ut rutrum magna non fermentum consectetur. Praesent volutpat cursus scelerisque. Duis iaculis pharetra elit, vel tincidunt tellus pharetra ut. Nam placerat erat ac libero viverra mattis. Nulla pellentesque pellentesque tellus, ut ornare est elementum at. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent orci arcu, aliquam nec interdum ac, pellentesque sit amet nisl. Sed congue ornare orci, ac blandit elit tincidunt eu. Donec pellentesque finibus ultricies. Cras tincidunt metus quam, in cursus risus tincidunt eu.', 'situs_Candi_Batu.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam semper varius ante sit amet lacinia. Nullam et molestie ante. Sed ligula felis, luctus id mollis tincidunt, aliquam eu justo. Praesent non turpis nibh. Curabitur id massa rhoncus, varius nisi vel, placerat urna. Duis vitae tellus ac neque condimentum ornare. Ut rutrum magna non fermentum consectetur. Praesent volutpat cursus scelerisque. Duis iaculis pharetra elit, vel tincidunt tellus pharetra ut. Nam placerat erat ac libero viverra mattis. Nulla pellentesque pellentesque tellus, ut ornare est elementum at. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent orci arcu, aliquam nec interdum ac, pellentesque sit amet nisl. Sed congue ornare orci, ac blandit elit tincidunt eu. Donec pellentesque finibus ultricies. Cras tincidunt metus quam, in cursus risus tincidunt eu.', 0, 'jl. batu angin', 'pandan asin', 'banyuresik', 'jawa utara', '2019-11-10 14:10:16');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(256) NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `foto` varchar(256) NOT NULL DEFAULT 'default.png',
  `is_active` int(1) NOT NULL,
  `user_level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `nomor_telepon`, `email`, `password`, `foto`, `is_active`, `user_level`) VALUES
(1, 'admin', '', 'admin', 'wildan', 'default.png', 1, 1),
(2, 'Wildan Oktavian', '123456788903', 'oktavianwww@gmail.com', '$2y$10$EV1Go6Lt3Q4Ac5njue5s8urer1DF3BPG/iyeC2h54cpttRV4JnIei', 'profil_Wildan_Oktavian.jpg', 1, 0),
(3, 'james bernard', '', 'oktavianvvv@gmail.com', '$2y$10$HJmkBhGqSWOsWCEy5iAsQOq.7aP4J0Hed8gI11xT.ADUrBs5mprmO', 'default.png', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `token` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_situs` (`id_situs`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_situs` (`id_situs`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `situs`
--
ALTER TABLE `situs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `situs`
--
ALTER TABLE `situs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `situs` FOREIGN KEY (`id_situs`) REFERENCES `situs` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`id_situs`) REFERENCES `situs` (`id`),
  ADD CONSTRAINT `laporan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `situs`
--
ALTER TABLE `situs`
  ADD CONSTRAINT `situs_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
