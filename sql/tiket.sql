-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 27 Des 2017 pada 19.11
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kursi`
--

CREATE TABLE `detail_kursi` (
  `id` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `id_kursi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `film_studio`
--

CREATE TABLE `film_studio` (
  `id` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `id_studio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `film_studio`
--

INSERT INTO `film_studio` (`id`, `id_film`, `id_studio`) VALUES
(32, 19, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jam`
--

CREATE TABLE `jam` (
  `id` int(11) NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jam`
--

INSERT INTO `jam` (`id`, `jam`) VALUES
(1, '00:00:00'),
(2, '00:05:00'),
(3, '00:10:00'),
(4, '00:15:00'),
(5, '00:20:00'),
(6, '00:25:00'),
(7, '00:30:00'),
(8, '00:35:00'),
(9, '00:40:00'),
(10, '00:45:00'),
(11, '00:50:00'),
(12, '00:55:00'),
(13, '01:00:00'),
(14, '01:05:00'),
(15, '01:10:00'),
(16, '01:15:00'),
(17, '01:20:00'),
(18, '01:25:00'),
(19, '01:30:00'),
(20, '01:35:00'),
(21, '01:40:00'),
(22, '01:45:00'),
(23, '01:50:00'),
(24, '01:55:00'),
(25, '02:00:00'),
(26, '02:05:00'),
(27, '02:10:00'),
(28, '02:15:00'),
(29, '02:20:00'),
(30, '02:25:00'),
(31, '02:30:00'),
(32, '02:35:00'),
(33, '02:40:00'),
(34, '02:45:00'),
(35, '02:50:00'),
(36, '02:55:00'),
(37, '03:00:00'),
(38, '03:05:00'),
(39, '03:10:00'),
(40, '03:15:00'),
(41, '03:20:00'),
(42, '03:25:00'),
(43, '03:30:00'),
(44, '03:35:00'),
(45, '03:40:00'),
(46, '03:45:00'),
(47, '03:50:00'),
(48, '03:55:00'),
(49, '04:00:00'),
(50, '04:05:00'),
(51, '04:10:00'),
(52, '04:15:00'),
(53, '04:20:00'),
(54, '04:25:00'),
(55, '04:30:00'),
(56, '04:35:00'),
(57, '04:40:00'),
(58, '04:45:00'),
(59, '04:50:00'),
(60, '04:55:00'),
(61, '05:00:00'),
(62, '05:05:00'),
(63, '05:10:00'),
(64, '05:15:00'),
(65, '05:20:00'),
(66, '05:25:00'),
(67, '05:30:00'),
(68, '05:35:00'),
(69, '05:40:00'),
(70, '05:45:00'),
(71, '05:50:00'),
(72, '05:55:00'),
(73, '06:00:00'),
(74, '06:05:00'),
(75, '06:10:00'),
(76, '06:15:00'),
(77, '06:20:00'),
(78, '06:25:00'),
(79, '06:30:00'),
(80, '06:35:00'),
(81, '06:40:00'),
(82, '06:45:00'),
(83, '06:50:00'),
(84, '06:55:00'),
(85, '07:00:00'),
(86, '07:05:00'),
(87, '07:10:00'),
(88, '07:15:00'),
(89, '07:20:00'),
(90, '07:25:00'),
(91, '07:30:00'),
(92, '07:35:00'),
(93, '07:40:00'),
(94, '07:45:00'),
(95, '07:50:00'),
(96, '07:55:00'),
(97, '08:00:00'),
(98, '08:05:00'),
(99, '08:10:00'),
(100, '08:15:00'),
(101, '08:20:00'),
(102, '08:25:00'),
(103, '08:30:00'),
(104, '08:35:00'),
(105, '08:40:00'),
(106, '08:45:00'),
(107, '08:50:00'),
(108, '08:55:00'),
(109, '09:00:00'),
(110, '09:05:00'),
(111, '09:10:00'),
(112, '09:15:00'),
(113, '09:20:00'),
(114, '09:25:00'),
(115, '09:30:00'),
(116, '09:35:00'),
(117, '09:40:00'),
(118, '09:45:00'),
(119, '09:50:00'),
(120, '09:55:00'),
(121, '10:00:00'),
(122, '10:05:00'),
(123, '10:10:00'),
(124, '10:15:00'),
(125, '10:20:00'),
(126, '10:25:00'),
(127, '10:30:00'),
(128, '10:35:00'),
(129, '10:40:00'),
(130, '10:45:00'),
(131, '10:50:00'),
(132, '10:55:00'),
(133, '11:00:00'),
(134, '11:05:00'),
(135, '11:10:00'),
(136, '11:15:00'),
(137, '11:20:00'),
(138, '11:25:00'),
(139, '11:30:00'),
(140, '11:35:00'),
(141, '11:40:00'),
(142, '11:45:00'),
(143, '11:50:00'),
(144, '11:55:00'),
(145, '12:00:00'),
(146, '12:05:00'),
(147, '12:10:00'),
(148, '12:15:00'),
(149, '12:20:00'),
(150, '12:25:00'),
(151, '12:30:00'),
(152, '12:35:00'),
(153, '12:40:00'),
(154, '12:45:00'),
(155, '12:50:00'),
(156, '12:55:00'),
(157, '13:00:00'),
(158, '13:05:00'),
(159, '13:10:00'),
(160, '13:15:00'),
(161, '13:20:00'),
(162, '13:25:00'),
(163, '13:30:00'),
(164, '13:35:00'),
(165, '13:40:00'),
(166, '13:45:00'),
(167, '13:50:00'),
(168, '13:55:00'),
(169, '14:00:00'),
(170, '14:05:00'),
(171, '14:10:00'),
(172, '14:15:00'),
(173, '14:20:00'),
(174, '14:25:00'),
(175, '14:30:00'),
(176, '14:35:00'),
(177, '14:40:00'),
(178, '14:45:00'),
(179, '14:50:00'),
(180, '14:55:00'),
(181, '15:00:00'),
(182, '15:05:00'),
(183, '15:10:00'),
(184, '15:15:00'),
(185, '15:20:00'),
(186, '15:25:00'),
(187, '15:30:00'),
(188, '15:35:00'),
(189, '15:40:00'),
(190, '15:45:00'),
(191, '15:50:00'),
(192, '15:55:00'),
(193, '16:00:00'),
(194, '16:05:00'),
(195, '16:10:00'),
(196, '16:15:00'),
(197, '16:20:00'),
(198, '16:25:00'),
(199, '16:30:00'),
(200, '16:35:00'),
(201, '16:40:00'),
(202, '16:45:00'),
(203, '16:50:00'),
(204, '16:55:00'),
(205, '17:00:00'),
(206, '17:05:00'),
(207, '17:10:00'),
(208, '17:15:00'),
(209, '17:20:00'),
(210, '17:25:00'),
(211, '17:30:00'),
(212, '17:35:00'),
(213, '17:40:00'),
(214, '17:45:00'),
(215, '17:50:00'),
(216, '17:55:00'),
(217, '18:00:00'),
(218, '18:05:00'),
(219, '18:10:00'),
(220, '18:15:00'),
(221, '18:20:00'),
(222, '18:25:00'),
(223, '18:30:00'),
(224, '18:35:00'),
(225, '18:40:00'),
(226, '18:45:00'),
(227, '18:50:00'),
(228, '18:55:00'),
(229, '19:00:00'),
(230, '19:05:00'),
(231, '19:10:00'),
(232, '19:15:00'),
(233, '19:20:00'),
(234, '19:25:00'),
(235, '19:30:00'),
(236, '19:35:00'),
(237, '19:40:00'),
(238, '19:45:00'),
(239, '19:50:00'),
(240, '19:55:00'),
(241, '20:00:00'),
(242, '20:05:00'),
(243, '20:10:00'),
(244, '20:15:00'),
(245, '20:20:00'),
(246, '20:25:00'),
(247, '20:30:00'),
(248, '20:35:00'),
(249, '20:40:00'),
(250, '20:45:00'),
(251, '20:50:00'),
(252, '20:55:00'),
(253, '21:00:00'),
(254, '21:05:00'),
(255, '21:10:00'),
(256, '21:15:00'),
(257, '21:20:00'),
(258, '21:25:00'),
(259, '21:30:00'),
(260, '21:35:00'),
(261, '21:40:00'),
(262, '21:45:00'),
(263, '21:50:00'),
(264, '21:55:00'),
(265, '22:00:00'),
(266, '22:05:00'),
(267, '22:10:00'),
(268, '22:15:00'),
(269, '22:20:00'),
(270, '22:25:00'),
(271, '22:30:00'),
(272, '22:35:00'),
(273, '22:40:00'),
(274, '22:45:00'),
(275, '22:50:00'),
(276, '22:55:00'),
(277, '23:00:00'),
(278, '23:05:00'),
(279, '23:10:00'),
(280, '23:15:00'),
(281, '23:20:00'),
(282, '23:25:00'),
(283, '23:30:00'),
(284, '23:35:00'),
(285, '23:40:00'),
(286, '23:45:00'),
(287, '23:50:00'),
(288, '23:55:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jam_tayang`
--

CREATE TABLE `jam_tayang` (
  `id` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `id_jam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jam_tayang`
--

INSERT INTO `jam_tayang` (`id`, `id_film`, `id_jam`) VALUES
(24, 19, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `studio`
--

CREATE TABLE `studio` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `studio`
--

INSERT INTO `studio` (`id`, `nama`) VALUES
(1, 'Amaris'),
(2, 'Edelweiss');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detailtransaksi`
--

CREATE TABLE `tbl_detailtransaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` char(15) NOT NULL,
  `id_film` int(10) DEFAULT NULL,
  `no_kursi` int(11) DEFAULT NULL,
  `id_lokasi` int(11) DEFAULT NULL,
  `jumlah_beli` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_film`
--

CREATE TABLE `tbl_film` (
  `id_film` int(11) NOT NULL,
  `judul` varchar(25) NOT NULL,
  `sinopsis` varchar(150) NOT NULL,
  `mulai_tayang` date NOT NULL,
  `selesai_tayang` date NOT NULL,
  `durasi` varchar(20) NOT NULL,
  `cover` varchar(200) NOT NULL,
  `featured` enum('1','0') NOT NULL DEFAULT '0',
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `slug` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_film`
--

INSERT INTO `tbl_film` (`id_film`, `judul`, `sinopsis`, `mulai_tayang`, `selesai_tayang`, `durasi`, `cover`, `featured`, `status`, `slug`) VALUES
(19, 'adsaasddad', 'asdxcc1231', '2017-12-01', '2017-12-02', '22', 'f2c2683a42ce12533cc9f8bc02c71483.jpg', '1', '1', 'adsaasddad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_genre`
--

CREATE TABLE `tbl_genre` (
  `id_genre` int(10) NOT NULL,
  `genre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_genre`
--

INSERT INTO `tbl_genre` (`id_genre`, `genre`) VALUES
(4, 'Anime'),
(7, 'Horror'),
(8, 'Lian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_genrefilm`
--

CREATE TABLE `tbl_genrefilm` (
  `id` int(11) NOT NULL,
  `id_film` int(10) NOT NULL,
  `id_genre` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_genrefilm`
--

INSERT INTO `tbl_genrefilm` (`id`, `id_film`, `id_genre`) VALUES
(41, 19, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kursi`
--

CREATE TABLE `tbl_kursi` (
  `id` int(11) NOT NULL,
  `no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lokasi`
--

CREATE TABLE `tbl_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` char(15) NOT NULL,
  `id_member` int(15) UNSIGNED NOT NULL,
  `tgl_beli` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_harga` int(20) NOT NULL,
  `status` enum('lunas','menunggu','batal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `address`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, 'Dl6C9SfE7Cy6G6y.XX5OUu', 1268889823, 1514362395, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', 'agung', '$2y$08$z0H/Zd8sdIk/ZKIhskWsq.QFe.pl9H93oAW9GeLQ2FC7uog2yzGzy', NULL, 'cintarembo@gmail.com', NULL, NULL, NULL, NULL, 1513850860, NULL, 1, 'Agung', 'Kurniawan', 'jalan pertanian', '089629050760'),
(3, '::1', 'agung', '$2y$08$Ae3me6KJfh5ToDYlhDAfMeNiGzH8OMD9IfR4IorS7DCYq4UI2otum', NULL, 'cintarembo@gmail.com', NULL, NULL, NULL, NULL, 1513850876, NULL, 1, 'Agung', 'Kurniawan', 'jalan pertanian', '089629050760'),
(4, '::1', 'lkjlkjasldjklj', '$2y$08$Bw8IIpkxmolP89nWI1OwauoVMO74xwJO37SrLCnYqymnMtbNiEBNO', NULL, 'abcd@abcd.com', NULL, NULL, NULL, NULL, 1514041800, NULL, 1, 'asda', 'jlkjkj', 'kjakldjsakj', '080989'),
(5, '::1', 'lkjkljkj', '$2y$08$c5UmEhEwzLtfri3rAx2O9OREI0UKWhyqR9L5yx4BCNhS7H.RGXWQO', NULL, 'jkl@jkl.com', NULL, NULL, NULL, NULL, 1514042043, NULL, 1, 'agung', 'kurni', 'asdadsad', '12313232');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 3, 2),
(5, 4, 2),
(6, 5, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_kursi`
--
ALTER TABLE `detail_kursi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_detail` (`id_detail`,`id_kursi`),
  ADD KEY `id_kursi` (`id_kursi`);

--
-- Indexes for table `film_studio`
--
ALTER TABLE `film_studio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_film` (`id_film`,`id_studio`),
  ADD KEY `id_studio` (`id_studio`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jam_tayang`
--
ALTER TABLE `jam_tayang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_film` (`id_film`,`id_jam`),
  ADD KEY `id_jam` (`id_jam`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studio`
--
ALTER TABLE `studio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_detailtransaksi`
--
ALTER TABLE `tbl_detailtransaksi`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_film` (`id_film`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `no_kursi` (`no_kursi`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indexes for table `tbl_film`
--
ALTER TABLE `tbl_film`
  ADD PRIMARY KEY (`id_film`),
  ADD KEY `judul` (`judul`);

--
-- Indexes for table `tbl_genre`
--
ALTER TABLE `tbl_genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `tbl_genrefilm`
--
ALTER TABLE `tbl_genrefilm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_film` (`id_film`),
  ADD KEY `id_genre` (`id_genre`);

--
-- Indexes for table `tbl_kursi`
--
ALTER TABLE `tbl_kursi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_member` (`id_member`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_kursi`
--
ALTER TABLE `detail_kursi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `film_studio`
--
ALTER TABLE `film_studio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jam`
--
ALTER TABLE `jam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;
--
-- AUTO_INCREMENT for table `jam_tayang`
--
ALTER TABLE `jam_tayang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `studio`
--
ALTER TABLE `studio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_film`
--
ALTER TABLE `tbl_film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_genre`
--
ALTER TABLE `tbl_genre`
  MODIFY `id_genre` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_genrefilm`
--
ALTER TABLE `tbl_genrefilm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `tbl_kursi`
--
ALTER TABLE `tbl_kursi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_kursi`
--
ALTER TABLE `detail_kursi`
  ADD CONSTRAINT `detail_kursi_ibfk_1` FOREIGN KEY (`id_detail`) REFERENCES `tbl_detailtransaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_kursi_ibfk_2` FOREIGN KEY (`id_kursi`) REFERENCES `tbl_kursi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `film_studio`
--
ALTER TABLE `film_studio`
  ADD CONSTRAINT `film_studio_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `tbl_film` (`id_film`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `film_studio_ibfk_2` FOREIGN KEY (`id_studio`) REFERENCES `studio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jam_tayang`
--
ALTER TABLE `jam_tayang`
  ADD CONSTRAINT `jam_tayang_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `tbl_film` (`id_film`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jam_tayang_ibfk_2` FOREIGN KEY (`id_jam`) REFERENCES `jam` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_detailtransaksi`
--
ALTER TABLE `tbl_detailtransaksi`
  ADD CONSTRAINT `tbl_detailtransaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tbl_transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detailtransaksi_ibfk_5` FOREIGN KEY (`id_film`) REFERENCES `tbl_film` (`id_film`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detailtransaksi_ibfk_6` FOREIGN KEY (`id_lokasi`) REFERENCES `tbl_lokasi` (`id_lokasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_genrefilm`
--
ALTER TABLE `tbl_genrefilm`
  ADD CONSTRAINT `tbl_genrefilm_ibfk_3` FOREIGN KEY (`id_film`) REFERENCES `tbl_film` (`id_film`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_genrefilm_ibfk_4` FOREIGN KEY (`id_genre`) REFERENCES `tbl_genre` (`id_genre`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `tbl_transaksi_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
