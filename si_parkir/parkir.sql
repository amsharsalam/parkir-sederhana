-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16 Apr 2018 pada 08.30
-- Versi Server: 10.1.28-MariaDB
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
-- Database: `parkir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `id_laporan` varchar(10) NOT NULL,
  `tgl_parkir` varchar(30) NOT NULL,
  `plat_nomor` varchar(30) NOT NULL,
  `pendapatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mobil`
--

CREATE TABLE `tb_mobil` (
  `platnomor` varchar(10) NOT NULL,
  `waktu_masuk` varchar(30) NOT NULL,
  `jam_masuk` varchar(30) NOT NULL,
  `waktu_keluar` varchar(30) NOT NULL,
  `jam_keluar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mobil`
--

INSERT INTO `tb_mobil` (`platnomor`, `waktu_masuk`, `jam_masuk`, `waktu_keluar`, `jam_keluar`) VALUES
('A1234D', '14-04-2018 05:51:47', '', '', ''),
('W1234L', '14-04-2018 05:52:00', '', '14-04-2018 06:46:47', ''),
('D1234S', '14-04-2018 05:52:11', '', '14-04-2018 06:46:39', ''),
('D456Y', '14-04-2018 06:11:41', '', '14-04-2018', '07:03:46'),
('B432A', '14-04-2018 06:18:06', '', '14-04-2018 06:46:34', ''),
('GY5332', '14-04-2018', '06:53:49', '14-04-2018', '14-04-2018');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mobil2`
--

CREATE TABLE `tb_mobil2` (
  `plat_nomor` char(6) NOT NULL,
  `waktu_masuk_date` date NOT NULL,
  `waktu_masuk_time` time NOT NULL,
  `waktu_keluar_date` date NOT NULL,
  `waktu_keluar_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mobil2`
--

INSERT INTO `tb_mobil2` (`plat_nomor`, `waktu_masuk_date`, `waktu_masuk_time`, `waktu_keluar_date`, `waktu_keluar_time`) VALUES
('ac44rd', '2018-04-10', '04:00:15', '2018-04-11', '11:00:26'),
('ac44rd', '2018-04-10', '04:00:15', '2018-04-11', '11:00:26'),
('ac44ld', '2018-04-10', '04:00:15', '2018-04-11', '11:00:26'),
('ac44kd', '2018-04-10', '04:00:15', '2018-04-11', '11:00:26'),
('ac44rd', '2018-04-11', '04:00:15', '2018-04-11', '11:00:26'),
('abcd', '2018-02-13', '02:08:04', '2018-02-13', '23:54:06'),
('34454', '2018-03-04', '23:42:59', '2018-03-04', '12:09:59'),
('56767', '2018-04-14', '21:45:24', '2018-04-14', '12:32:43'),
('345d', '2018-01-01', '04:23:44', '2018-01-01', '18:01:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_parkir`
--

CREATE TABLE `tb_parkir` (
  `lantai` varchar(10) NOT NULL,
  `ruang_parkir` varchar(10) NOT NULL,
  `platnomor` varchar(10) NOT NULL,
  `posisi` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_parkir`
--

INSERT INTO `tb_parkir` (`lantai`, `ruang_parkir`, `platnomor`, `posisi`, `status`) VALUES
('1', '101', '', 'kiri', '0'),
('1', '102', '', 'kanan', '0'),
('1', '103', '', 'kiri', '0'),
('1', '104', '', 'kanan', '0'),
('1', '105', '', 'kiri', '0'),
('1', '106', '', 'kanan', '0'),
('1', '107', '', 'kiri', '0'),
('1', '108', '', 'kanan', '0'),
('2', '201', '', 'kiri', '0'),
('2', '202', '', 'kanan', '0'),
('2', '203', '', 'kiri', '0'),
('2', '204', '', 'kanan', '0'),
('2', '205', '', 'kiri', '0'),
('2', '206', '', 'kanan', '0'),
('3', '301', '', 'kiri', '0'),
('3', '302', '', 'kanan', '0'),
('3', '305', '', 'kiri', '0'),
('3', '306', '', 'kanan', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `lavel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `lavel`) VALUES
(1, 'admin', '12345', 'admin'),
(2, 'petugasmasuk', '12345', 'petugasmasuk'),
(3, 'petugasruang', '12345', 'petugasruang'),
(4, 'petugaskeluar', '12345', 'petugaskeluar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
