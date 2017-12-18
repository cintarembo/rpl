-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 18 Des 2017 pada 15.19
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
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` char(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detailtransaksi`
--

CREATE TABLE `tbl_detailtransaksi` (
  `id_transaksi` char(15) NOT NULL,
  `id_film` int(10) NOT NULL,
  `no_kursi` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `jumlah_beli` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_film`
--

CREATE TABLE `tbl_film` (
  `id_film` int(11) NOT NULL,
  `judul` varchar(25) NOT NULL,
  `sinopsis` varchar(150) NOT NULL,
  `tanggal_tayang` date NOT NULL,
  `jam_tayang` time(2) NOT NULL,
  `durasi` varchar(20) NOT NULL,
  `harga` int(20) NOT NULL,
  `cover` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_film`
--

INSERT INTO `tbl_film` (`id_film`, `judul`, `sinopsis`, `tanggal_tayang`, `jam_tayang`, `durasi`, `harga`, `cover`) VALUES
(3, 'The Sims', 'Sinopsis', '2017-12-30', '07:00:00.00', '07:00', 2, '89d139510fdde070a2751545458abc92.png');

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
  `id_film` int(10) NOT NULL,
  `id_genre` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_genrefilm`
--

INSERT INTO `tbl_genrefilm` (`id_film`, `id_genre`) VALUES
(3, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kursi`
--

CREATE TABLE `tbl_kursi` (
  `no_kursi` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
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
-- Struktur dari tabel `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id_member` int(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(75) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` char(15) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_member`
--

INSERT INTO `tbl_member` (`id_member`, `username`, `password`, `nama`, `alamat`, `email`, `no_hp`, `status`) VALUES
(1, 'rikki', 'abcd', 'Rikki Erlando', 'Jalan senang', 'erlandorikki@gmail.com', '089629050', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` char(15) NOT NULL,
  `id_member` int(15) NOT NULL,
  `tgl_beli` date NOT NULL,
  `total_harga` int(20) NOT NULL,
  `status` enum('lunas','menunggu','batal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_detailtransaksi`
--
ALTER TABLE `tbl_detailtransaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_film` (`id_film`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `no_kursi` (`no_kursi`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indexes for table `tbl_film`
--
ALTER TABLE `tbl_film`
  ADD PRIMARY KEY (`id_film`),
  ADD KEY `judul` (`judul`),
  ADD KEY `harga` (`harga`);

--
-- Indexes for table `tbl_genre`
--
ALTER TABLE `tbl_genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `tbl_genrefilm`
--
ALTER TABLE `tbl_genrefilm`
  ADD KEY `id_film` (`id_film`),
  ADD KEY `id_genre` (`id_genre`);

--
-- Indexes for table `tbl_kursi`
--
ALTER TABLE `tbl_kursi`
  ADD PRIMARY KEY (`no_kursi`);

--
-- Indexes for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_member` (`id_member`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_film`
--
ALTER TABLE `tbl_film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_genre`
--
ALTER TABLE `tbl_genre`
  MODIFY `id_genre` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_kursi`
--
ALTER TABLE `tbl_kursi`
  MODIFY `no_kursi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id_member` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_detailtransaksi`
--
ALTER TABLE `tbl_detailtransaksi`
  ADD CONSTRAINT `tbl_detailtransaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tbl_transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detailtransaksi_ibfk_3` FOREIGN KEY (`no_kursi`) REFERENCES `tbl_kursi` (`no_kursi`),
  ADD CONSTRAINT `tbl_detailtransaksi_ibfk_4` FOREIGN KEY (`id_lokasi`) REFERENCES `tbl_lokasi` (`id_lokasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detailtransaksi_ibfk_5` FOREIGN KEY (`id_film`) REFERENCES `tbl_film` (`id_film`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `tbl_transaksi_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `tbl_member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
