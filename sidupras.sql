-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2022 at 03:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sidupras`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Bangunan Desa'),
(2, 'Transportasi Desa'),
(3, 'Telekomunikasi Desa'),
(4, 'Pendukung Ekonomi Desa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengaduan`
--

CREATE TABLE `tb_pengaduan` (
  `pengaduan_id` int(11) NOT NULL,
  `pengaduan_warga_id` int(11) NOT NULL,
  `pengaduan_kategori_id` int(11) NOT NULL,
  `pengaduan_sarpras_id` int(11) NOT NULL,
  `pengaduan_petugas_id` int(11) DEFAULT NULL,
  `pengaduan_isi` text NOT NULL,
  `pengaduan_foto` varchar(50) NOT NULL,
  `pengaduan_lng` varchar(50) DEFAULT NULL,
  `pengaduan_lat` varchar(50) DEFAULT NULL,
  `pengaduan_status` enum('Menunggu','Diterima','Selesai','Ditolak') NOT NULL DEFAULT 'Menunggu',
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengaduan`
--

INSERT INTO `tb_pengaduan` (`pengaduan_id`, `pengaduan_warga_id`, `pengaduan_kategori_id`, `pengaduan_sarpras_id`, `pengaduan_petugas_id`, `pengaduan_isi`, `pengaduan_foto`, `pengaduan_lng`, `pengaduan_lat`, `pengaduan_status`, `created_at`, `updated_at`) VALUES
(1, 25, 1, 1, 38, 'Dinding retak', 'product-5.png', '', '', 'Selesai', '2022-07-28', '2022-07-28'),
(2, 26, 2, 2, 38, 'ambrol', 'product-5.png', '110.35707592964174', '-7.615981732975055', 'Ditolak', '2022-07-28', '2022-07-28'),
(3, 26, 1, 1, 38, 'Atap Bocor', 'product-5.png', '', '', 'Diterima', '2022-07-28', '2022-07-28'),
(4, 26, 2, 2, 38, 'Tiang retak', 'product-5.png', '', '', 'Diterima', '2022-07-28', '2022-07-28'),
(7, 25, 2, 2, NULL, 'asfsdfaf', 'Laporan TA Full.docx', '', '', 'Ditolak', '2022-08-09', '2022-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `petugas_id` int(11) NOT NULL,
  `petugas_user_id` int(11) NOT NULL,
  `petugas_email` varchar(50) NOT NULL,
  `petugas_nama` varchar(50) NOT NULL,
  `petugas_notelp` varchar(50) DEFAULT NULL,
  `petugas_alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`petugas_id`, `petugas_user_id`, `petugas_email`, `petugas_nama`, `petugas_notelp`, `petugas_alamat`) VALUES
(2, 38, 'petugas@gmail.com', 'petugas', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sarpras`
--

CREATE TABLE `tb_sarpras` (
  `sarpras_id` int(11) NOT NULL,
  `sarpras_nama` varchar(30) NOT NULL,
  `sarpras_gambar` varchar(100) NOT NULL,
  `sarpras_ket` varchar(20) NOT NULL,
  `sarpras_dibuat` date NOT NULL,
  `sarpras_kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sarpras`
--

INSERT INTO `tb_sarpras` (`sarpras_id`, `sarpras_nama`, `sarpras_gambar`, `sarpras_ket`, `sarpras_dibuat`, `sarpras_kategori_id`) VALUES
(1, 'Masjid', 'product-5.png', '1 Unit', '2022-07-01', 1),
(2, 'Jembatan', 'product-5.png', '10 meter', '0000-00-00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `user_email` varchar(128) NOT NULL,
  `user_image` varchar(128) NOT NULL,
  `user_password` varchar(256) NOT NULL,
  `user_notelp` varchar(13) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `user_is_active` int(1) NOT NULL,
  `user_created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_name`, `user_email`, `user_image`, `user_password`, `user_notelp`, `user_role_id`, `user_is_active`, `user_created`) VALUES
(1, 'Superuser', 'admin@gmail.com', '1653461191.png', '$2y$10$68BeukhbpyDoTWUAg26SgenGWuhkp6m5.xap9BZivUVOnscdIMjZa', '', 1, 1, '0000-00-00 00:00:00'),
(38, 'petugas', 'petugas@gmail.com', 'default.jpg', '$2y$10$xI475bZHcKYy.PQBY533Oe3Sik0BUiLy7VFXrx41UKEX1kFo19e1y', '', 2, 1, '0000-00-00 00:00:00'),
(69, 'Warga', 'warga@gmail.com', 'avatar-1.png', '$2y$10$.oIUA5cYIYsgBr7lwb5XZeQl.Xm8eCOzRneosOus2yFdUWWubBu3C', '2472835789', 3, 0, '2022-07-26 22:12:13'),
(70, 'Ahmad', 'ahmad@gmail.com', 'avatar-1.png', '$2y$10$/pV.uuYDXNmrtnQ4ZeIake99lA0tnVpeFchUNriWwpBndlQCcSzNi', '74358798525', 3, 1, '2022-07-26 22:28:54'),
(71, 'paidi', 'paidi@gmail.com', 'avatar-1.png', '$2y$10$svyStnKys5D8xpIGMWFDHuvSgE1UzeUdIqrB14dSiFQ8Nk2wKi85K', '345235', 3, 0, '2022-07-26 22:37:44'),
(72, 'Warga', 'warga@gmail.com', 'avatar-1.png', '$2y$10$Zv7RdRqfVLIarfNpcE9BhOCZbBSavnIc735BJjyj/nicsg0LH0PAq', '323525235', 3, 0, '2022-07-26 22:47:36'),
(73, 'Yoz', 'yoz@gmail.com', 'avatar-1.png', '$2y$10$BxOTxJKfOuBgAZKVAzLpp.8yN5Qgv.vT3bWwHlw0Hj8Uun3ke3L8i', '34535345', 3, 0, '2022-07-28 08:51:41'),
(74, 'ujang', 'ujang@gmail.com', 'avatar-1.png', '$2y$10$AFbxSnrycBQ2En34ovayLeO13myGfT5SQez7ENjAlu1UeKkY2AWgi', '353453', 3, 1, '2022-07-29 13:51:30'),
(75, 'paijo', 'paijo@gmail.com', 'avatar-1.png', '$2y$10$nhEK6QBxBHkqv80LQqOETeeeTpichv00tJSX2A4rU.ihwuaniP9JG', '574457747', 3, 1, '2022-08-08 22:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_role`
--

CREATE TABLE `tb_user_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user_role`
--

INSERT INTO `tb_user_role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Petugas'),
(3, 'Warga');

-- --------------------------------------------------------

--
-- Table structure for table `tb_warga`
--

CREATE TABLE `tb_warga` (
  `warga_id` int(11) NOT NULL,
  `warga_user_id` int(11) NOT NULL,
  `warga_nik` varchar(20) DEFAULT NULL,
  `warga_nama` varchar(50) NOT NULL,
  `warga_email` varchar(50) NOT NULL,
  `warga_password` varchar(256) NOT NULL,
  `warga_image` varchar(30) NOT NULL,
  `warga_notelp` varchar(20) DEFAULT NULL,
  `warga_alamat` text DEFAULT NULL,
  `warga_is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_warga`
--

INSERT INTO `tb_warga` (`warga_id`, `warga_user_id`, `warga_nik`, `warga_nama`, `warga_email`, `warga_password`, `warga_image`, `warga_notelp`, `warga_alamat`, `warga_is_active`) VALUES
(25, 72, '214214124', 'Warga', 'warga@gmail.com', '$2y$10$Zv7RdRqfVLIarfNpcE9BhOCZbBSavnIc735BJjyj/nicsg0LH0PAq', 'avatar-1.png', '323525235', 'Mulungan', 1),
(26, 73, '45235325325', 'Yoz', 'yoz@gmail.com', '$2y$10$BxOTxJKfOuBgAZKVAzLpp.8yN5Qgv.vT3bWwHlw0Hj8Uun3ke3L8i', 'avatar-1.png', '34535345', 'Sleman', 1),
(27, 74, '352352352', 'ujang', 'ujang@gmail.com', '$2y$10$AFbxSnrycBQ2En34ovayLeO13myGfT5SQez7ENjAlu1UeKkY2AWgi', 'avatar-1.png', '353453', 'rumah', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  ADD PRIMARY KEY (`pengaduan_id`),
  ADD KEY `fk_sarpras` (`pengaduan_sarpras_id`),
  ADD KEY `fk_warga` (`pengaduan_warga_id`),
  ADD KEY `fk_kategori_sarpras` (`pengaduan_kategori_id`),
  ADD KEY `fk_petugas` (`pengaduan_petugas_id`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`petugas_id`),
  ADD KEY `fk_petugas_user_id` (`petugas_user_id`);

--
-- Indexes for table `tb_sarpras`
--
ALTER TABLE `tb_sarpras`
  ADD PRIMARY KEY (`sarpras_id`),
  ADD KEY `fk_kategori` (`sarpras_kategori_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_role_id` (`user_role_id`);

--
-- Indexes for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tb_warga`
--
ALTER TABLE `tb_warga`
  ADD PRIMARY KEY (`warga_id`),
  ADD KEY `fk_user_id` (`warga_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  MODIFY `pengaduan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `petugas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_sarpras`
--
ALTER TABLE `tb_sarpras`
  MODIFY `sarpras_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_warga`
--
ALTER TABLE `tb_warga`
  MODIFY `warga_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  ADD CONSTRAINT `fk_kategori_sarpras` FOREIGN KEY (`pengaduan_kategori_id`) REFERENCES `tb_kategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_petugas` FOREIGN KEY (`pengaduan_petugas_id`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sarpras` FOREIGN KEY (`pengaduan_sarpras_id`) REFERENCES `tb_sarpras` (`sarpras_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_warga` FOREIGN KEY (`pengaduan_warga_id`) REFERENCES `tb_warga` (`warga_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD CONSTRAINT `fk_petugas_user_id` FOREIGN KEY (`petugas_user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_sarpras`
--
ALTER TABLE `tb_sarpras`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`sarpras_kategori_id`) REFERENCES `tb_kategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `fk_role_id` FOREIGN KEY (`user_role_id`) REFERENCES `tb_user_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_warga`
--
ALTER TABLE `tb_warga`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`warga_user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
