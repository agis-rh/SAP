-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28 Feb 2015 pada 04.07
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `penilaian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang_studi`
--

CREATE TABLE IF NOT EXISTS `bidang_studi` (
  `bidang_kode` varchar(6) NOT NULL,
  `bidang_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bidang_studi`
--

INSERT INTO `bidang_studi` (`bidang_kode`, `bidang_nama`) VALUES
('BS-001', 'Teknik Informatika'),
('BS-002', 'Otomotif'),
('BS-003', 'Farmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `guru_kode` varchar(5) NOT NULL,
  `kompetensi_kode` varchar(6) NOT NULL,
  `guru_nip` varchar(20) NOT NULL,
  `guru_nama` varchar(30) NOT NULL,
  `guru_alamat` text NOT NULL,
  `guru_telepon` varchar(15) NOT NULL,
  `email_guru` varchar(30) NOT NULL,
  `image_guru` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`guru_kode`, `kompetensi_kode`, `guru_nip`, `guru_nama`, `guru_alamat`, `guru_telepon`, `email_guru`, `image_guru`) VALUES
('G-001', 'KK-001', '11111110', 'Dudi Hendrayana S.Kom', 'Darmaraja', '085272110087', 'dudihendrayana@gmail.com', 'parampaa.jpg'),
('G-002', 'KK-001', '11111112', 'Asep Ridwan S.Pd', 'Lemahsugih', '085211234075', 'asep_ridwan@yahoo.co.id', ''),
('G-003', 'KK-001', '11111113', 'Yusuf S.Pd', 'Bantarujeg', '085272110087', 'yusuf@gmail.com', ''),
('G-004', 'KK-001', '11111114', 'Dede Sopyan S.Pd', 'Sarikuning', '085860803103', 'deso@gmail.com', ''),
('G-005', 'KK-001', '11111115', 'Akhmad S.Pd', 'Cicariang', '085860803103', 'akhmad@yahoo.com', ''),
('G-006', 'KK-001', '11111116', 'Didin Jaenal S.Pd', 'Lemahputih', '085860803103', 'dije@yahoo.com', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
`id_kelas` int(10) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(8, 'XII RPL D'),
(19, 'XII RPL A '),
(27, 'XII RPL B'),
(28, 'XII RPL C'),
(29, 'X RPL A'),
(30, 'X RPL B'),
(31, 'X RPL C'),
(32, 'X RPL D'),
(33, 'XI RPL A'),
(34, 'XI RPL B'),
(35, 'XI RPL C'),
(36, 'XI RPL D'),
(37, 'X TKR A'),
(38, 'X TKR B'),
(39, 'X TKR C'),
(40, 'XI TKR A'),
(41, 'XI TKR B'),
(42, 'XI TKR C'),
(43, 'XII TKR A'),
(44, 'XII TKR B'),
(45, 'X FARMASI'),
(46, 'XI FARMASI'),
(47, 'X TSM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kompetensi_keahlian`
--

CREATE TABLE IF NOT EXISTS `kompetensi_keahlian` (
  `kompetensi_kode` varchar(6) NOT NULL,
  `bidang_kode` varchar(6) NOT NULL,
  `kompetensi_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kompetensi_keahlian`
--

INSERT INTO `kompetensi_keahlian` (`kompetensi_kode`, `bidang_kode`, `kompetensi_nama`) VALUES
('KK-001', 'BS-001', 'Rekayasa Perangkat Lunak (RPL)'),
('KK-002', 'BS-002', 'Teknik Kendaraan Ringan (TKR)'),
('KK-003', 'BS-003', 'Farmasi'),
('KK-004', 'BS-002', 'Teknik Speda Motor (TSM)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE IF NOT EXISTS `log` (
`id_log` int(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `aktifitas` text NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=169 ;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`id_log`, `id_user`, `aktifitas`, `waktu`) VALUES
(57, 'root@local', 'menambahkan nilai', '2015-02-27 17:55:07'),
(58, 'root@local', 'menambahkan nilai', '2015-02-27 17:55:07'),
(59, 'root@local', 'menambahkan nilai', '2015-02-27 17:55:07'),
(60, 'root@local', 'menambahkan nilai', '2015-02-27 17:55:07'),
(61, 'root@local', 'menambahkan nilai', '2015-02-27 17:55:07'),
(62, 'root@local', 'menambahkan nilai', '2015-02-27 17:55:07'),
(63, 'root@local', 'menambahkan nilai', '2015-02-27 17:55:07'),
(64, 'root@local', 'menambahkan nilai', '2015-02-27 17:55:07'),
(65, 'root@local', 'menambahkan nilai', '2015-02-27 17:55:07'),
(66, 'root@local', 'menambahkan nilai', '2015-02-27 17:55:07'),
(67, 'root@local', 'menambahkan nilai', '2015-02-27 17:55:07'),
(68, 'root@local', 'menambahkan nilai', '2015-02-27 17:55:07'),
(69, 'root@local', 'menambahkan nilai', '2015-02-27 17:55:07'),
(70, 'root@local', 'menambahkan nilai', '2015-02-27 17:55:07'),
(71, 'root@local', 'menambahkan nilai', '2015-02-27 17:55:07'),
(72, 'root@local', 'menambahkan nilai', '2015-02-27 17:55:07'),
(73, 'root@local', 'menambahkan nilai', '2015-02-27 17:55:07'),
(74, 'root@local', 'menambahkan nilai', '2015-02-27 17:55:07'),
(75, 'root@local', 'menambahkan nilai', '2015-02-27 17:55:07'),
(76, 'root@local', 'menambahkan nilai', '2015-02-27 17:55:07'),
(77, 'root@local', 'menambahkan nilai', '2015-02-27 17:55:07'),
(78, 'root@local', 'menambahkan nilai', '2015-02-27 17:55:07'),
(79, 'root@local', 'menambahkan nilai', '2015-02-27 17:55:07'),
(80, 'root@local', 'menambahkan nilai', '2015-02-27 17:55:07'),
(81, 'root@local', 'menambahkan nilai', '2015-02-27 17:55:07'),
(82, 'root@local', 'menambahkan nilai', '2015-02-27 17:55:07'),
(83, 'root@local', 'menambahkan nilai', '2015-02-27 17:55:07'),
(84, 'root@local', 'menambahkan nilai', '2015-02-27 17:55:07'),
(85, 'root@local', 'menambahkan nilai', '2015-02-27 21:41:49'),
(86, 'root@local', 'menambahkan nilai', '2015-02-27 21:41:49'),
(87, 'root@local', 'menambahkan nilai', '2015-02-27 21:41:49'),
(88, 'root@local', 'menambahkan nilai', '2015-02-27 21:41:49'),
(89, 'root@local', 'menambahkan nilai', '2015-02-27 21:41:49'),
(90, 'root@local', 'menambahkan nilai', '2015-02-27 21:41:49'),
(91, 'root@local', 'menambahkan nilai', '2015-02-27 21:41:49'),
(92, 'root@local', 'menambahkan nilai', '2015-02-27 21:41:49'),
(93, 'root@local', 'menambahkan nilai', '2015-02-27 21:41:49'),
(94, 'root@local', 'menambahkan nilai', '2015-02-27 21:41:49'),
(95, 'root@local', 'menambahkan nilai', '2015-02-27 21:41:49'),
(96, 'root@local', 'menambahkan nilai', '2015-02-27 21:41:49'),
(97, 'root@local', 'menambahkan nilai', '2015-02-27 21:41:49'),
(98, 'root@local', 'menambahkan nilai', '2015-02-27 21:41:49'),
(99, 'root@local', 'menambahkan nilai', '2015-02-27 21:41:49'),
(100, 'root@local', 'menambahkan nilai', '2015-02-27 21:41:49'),
(101, 'root@local', 'menambahkan nilai', '2015-02-27 21:41:49'),
(102, 'root@local', 'menambahkan nilai', '2015-02-27 21:41:49'),
(103, 'root@local', 'menambahkan nilai', '2015-02-27 21:41:49'),
(104, 'root@local', 'menambahkan nilai', '2015-02-27 21:41:49'),
(105, 'root@local', 'menambahkan nilai', '2015-02-27 21:41:49'),
(106, 'root@local', 'menambahkan nilai', '2015-02-27 21:41:49'),
(107, 'root@local', 'menambahkan nilai', '2015-02-27 21:41:49'),
(108, 'root@local', 'menambahkan nilai', '2015-02-27 21:41:49'),
(109, 'root@local', 'menambahkan nilai', '2015-02-27 21:41:49'),
(110, 'root@local', 'menambahkan nilai', '2015-02-27 21:41:49'),
(111, 'root@local', 'menambahkan nilai', '2015-02-27 21:41:49'),
(112, 'root@local', 'menambahkan nilai', '2015-02-27 21:41:49'),
(113, 'root@local', 'menambahkan nilai', '2015-02-28 08:03:39'),
(114, 'root@local', 'menambahkan nilai', '2015-02-28 08:03:39'),
(115, 'root@local', 'menambahkan nilai', '2015-02-28 08:03:39'),
(116, 'root@local', 'menambahkan nilai', '2015-02-28 08:03:39'),
(117, 'root@local', 'menambahkan nilai', '2015-02-28 08:03:40'),
(118, 'root@local', 'menambahkan nilai', '2015-02-28 08:03:40'),
(119, 'root@local', 'menambahkan nilai', '2015-02-28 08:03:40'),
(120, 'root@local', 'menambahkan nilai', '2015-02-28 08:03:40'),
(121, 'root@local', 'menambahkan nilai', '2015-02-28 08:03:40'),
(122, 'root@local', 'menambahkan nilai', '2015-02-28 08:03:40'),
(123, 'root@local', 'menambahkan nilai', '2015-02-28 08:03:40'),
(124, 'root@local', 'menambahkan nilai', '2015-02-28 08:03:40'),
(125, 'root@local', 'menambahkan nilai', '2015-02-28 08:03:40'),
(126, 'root@local', 'menambahkan nilai', '2015-02-28 08:03:40'),
(127, 'root@local', 'menambahkan nilai', '2015-02-28 08:03:40'),
(128, 'root@local', 'menambahkan nilai', '2015-02-28 08:03:40'),
(129, 'root@local', 'menambahkan nilai', '2015-02-28 08:03:40'),
(130, 'root@local', 'menambahkan nilai', '2015-02-28 08:03:40'),
(131, 'root@local', 'menambahkan nilai', '2015-02-28 08:03:40'),
(132, 'root@local', 'menambahkan nilai', '2015-02-28 08:03:40'),
(133, 'root@local', 'menambahkan nilai', '2015-02-28 08:03:40'),
(134, 'root@local', 'menambahkan nilai', '2015-02-28 08:03:40'),
(135, 'root@local', 'menambahkan nilai', '2015-02-28 08:03:40'),
(136, 'root@local', 'menambahkan nilai', '2015-02-28 08:03:40'),
(137, 'root@local', 'menambahkan nilai', '2015-02-28 08:03:40'),
(138, 'root@local', 'menambahkan nilai', '2015-02-28 08:03:40'),
(139, 'root@local', 'menambahkan nilai', '2015-02-28 08:03:40'),
(140, 'root@local', 'menambahkan nilai', '2015-02-28 08:03:40'),
(141, 'root@local', 'menambahkan nilai', '2015-02-28 08:52:20'),
(142, 'root@local', 'menambahkan nilai', '2015-02-28 08:52:20'),
(143, 'root@local', 'menambahkan nilai', '2015-02-28 08:52:20'),
(144, 'root@local', 'menambahkan nilai', '2015-02-28 08:52:20'),
(145, 'root@local', 'menambahkan nilai', '2015-02-28 08:52:20'),
(146, 'root@local', 'menambahkan nilai', '2015-02-28 08:52:20'),
(147, 'root@local', 'menambahkan nilai', '2015-02-28 08:52:20'),
(148, 'root@local', 'menambahkan nilai', '2015-02-28 08:52:20'),
(149, 'root@local', 'menambahkan nilai', '2015-02-28 08:52:20'),
(150, 'root@local', 'menambahkan nilai', '2015-02-28 08:52:20'),
(151, 'root@local', 'menambahkan nilai', '2015-02-28 08:52:20'),
(152, 'root@local', 'menambahkan nilai', '2015-02-28 08:52:20'),
(153, 'root@local', 'menambahkan nilai', '2015-02-28 08:52:20'),
(154, 'root@local', 'menambahkan nilai', '2015-02-28 08:52:20'),
(155, 'root@local', 'menambahkan nilai', '2015-02-28 08:52:20'),
(156, 'root@local', 'menambahkan nilai', '2015-02-28 08:52:20'),
(157, 'root@local', 'menambahkan nilai', '2015-02-28 08:52:20'),
(158, 'root@local', 'menambahkan nilai', '2015-02-28 08:52:20'),
(159, 'root@local', 'menambahkan nilai', '2015-02-28 08:52:20'),
(160, 'root@local', 'menambahkan nilai', '2015-02-28 08:52:20'),
(161, 'root@local', 'menambahkan nilai', '2015-02-28 08:52:20'),
(162, 'root@local', 'menambahkan nilai', '2015-02-28 08:52:20'),
(163, 'root@local', 'menambahkan nilai', '2015-02-28 08:52:20'),
(164, 'root@local', 'menambahkan nilai', '2015-02-28 08:52:20'),
(165, 'root@local', 'menambahkan nilai', '2015-02-28 08:52:20'),
(166, 'root@local', 'menambahkan nilai', '2015-02-28 08:52:20'),
(167, 'root@local', 'menambahkan nilai', '2015-02-28 08:52:20'),
(168, 'root@local', 'menambahkan nilai', '2015-02-28 08:52:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
`id_nilai` int(11) NOT NULL,
  `siswa_nisn` varchar(15) NOT NULL,
  `guru_kode` varchar(5) NOT NULL,
  `id_ujian` int(10) NOT NULL,
  `sk_kode` varchar(10) NOT NULL,
  `nilai` double NOT NULL,
  `nilai_huruf` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=327 ;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `siswa_nisn`, `guru_kode`, `id_ujian`, `sk_kode`, `nilai`, `nilai_huruf`) VALUES
(131, '12131780', 'G-002', 3, '070-KK-13', 87, ' Sembilan Puluh Tujuh'),
(132, '12131781', 'G-002', 3, '070-KK-13', 84, ' Delapan Puluh Empat'),
(133, '12131782', 'G-002', 3, '070-KK-13', 90, ' Sembilan Puluh '),
(134, '12131784', 'G-002', 3, '070-KK-13', 78, ' Tujuh Puluh Delapan'),
(135, '12131785', 'G-002', 3, '070-KK-13', 87, ' Delapan Puluh Tujuh'),
(136, '12131786', 'G-002', 3, '070-KK-13', 72, ' Tujuh Puluh Dua'),
(137, '12131787', 'G-002', 3, '070-KK-13', 78, ' Tujuh Puluh Delapan'),
(138, '12131788', 'G-002', 3, '070-KK-13', 76, ' Tujuh Puluh Enam'),
(139, '12131789', 'G-002', 3, '070-KK-13', 85, ' Delapan Puluh Lima'),
(140, '12131790', 'G-002', 3, '070-KK-13', 65, ' Enam Puluh Lima'),
(141, '12131791', 'G-002', 3, '070-KK-13', 70, ' Tujuh Puluh '),
(142, '12131792', 'G-002', 3, '070-KK-13', 76, ' Tujuh Puluh Enam'),
(143, '12131793', 'G-002', 3, '070-KK-13', 77, ' Tujuh Puluh Tujuh'),
(144, '12131794', 'G-002', 3, '070-KK-13', 72, ' Tujuh Puluh Dua'),
(145, '12131795', 'G-002', 3, '070-KK-13', 75, ' Tujuh Puluh Lima'),
(146, '12131796', 'G-002', 3, '070-KK-13', 82, ' Delapan Puluh Dua'),
(147, '12131797', 'G-002', 3, '070-KK-13', 80, ' Delapan Puluh '),
(148, '12131798', 'G-002', 3, '070-KK-13', 73, ' Tujuh Puluh Tiga'),
(149, '12131799', 'G-002', 3, '070-KK-13', 79, ' Tujuh Puluh Sembilan'),
(150, '12131801', 'G-002', 3, '070-KK-13', 67, ' Enam Puluh Tujuh'),
(151, '12131804', 'G-002', 3, '070-KK-13', 79, ' Tujuh Puluh Sembilan'),
(152, '12131805', 'G-002', 3, '070-KK-13', 75, ' Tujuh Puluh Lima'),
(153, '12131806', 'G-002', 3, '070-KK-13', 82, ' Delapan Puluh Dua'),
(154, '12131807', 'G-002', 3, '070-KK-13', 91, ' Sembilan Puluh Satu'),
(155, '12131808', 'G-002', 3, '070-KK-13', 74, ' Tujuh Puluh Empat'),
(156, '12131809', 'G-002', 3, '070-KK-13', 75, ' Tujuh Puluh Lima'),
(157, '12131810', 'G-002', 3, '070-KK-13', 77, ' Tujuh Puluh Tujuh'),
(158, '12131811', 'G-002', 3, '070-KK-13', 76, ' Tujuh Puluh Enam'),
(243, '12131780', 'G-001', 5, '070-KK-19', 90, 'Sembilan Puluh'),
(244, '12131781', 'G-001', 5, '070-KK-19', 84, ' Delapan Puluh Empat'),
(245, '12131782', 'G-001', 5, '070-KK-19', 86, ' Delapan Puluh Enam'),
(246, '12131784', 'G-001', 5, '070-KK-19', 79, ' Tujuh Puluh Sembilan'),
(247, '12131785', 'G-001', 5, '070-KK-19', 80, ' Delapan Puluh '),
(248, '12131786', 'G-001', 5, '070-KK-19', 75, ' Tujuh Puluh Lima'),
(249, '12131787', 'G-001', 5, '070-KK-19', 80, ' Delapan Puluh '),
(250, '12131788', 'G-001', 5, '070-KK-19', 79, ' Tujuh Puluh Sembilan'),
(251, '12131789', 'G-001', 5, '070-KK-19', 80, ' Delapan Puluh '),
(252, '12131790', 'G-001', 5, '070-KK-19', 73, ' Tujuh Puluh Tiga'),
(253, '12131791', 'G-001', 5, '070-KK-19', 77, ' Tujuh Puluh Tujuh'),
(254, '12131792', 'G-001', 5, '070-KK-19', 80, ' Delapan Puluh '),
(255, '12131793', 'G-001', 5, '070-KK-19', 80, ' Delapan Puluh '),
(256, '12131794', 'G-001', 5, '070-KK-19', 71, ' Tujuh Puluh Satu'),
(257, '12131795', 'G-001', 5, '070-KK-19', 81, ' Delapan Puluh Satu'),
(258, '12131796', 'G-001', 5, '070-KK-19', 83, ' Delapan Puluh Tiga'),
(259, '12131797', 'G-001', 5, '070-KK-19', 85, ' Delapan Puluh Lima'),
(260, '12131798', 'G-001', 5, '070-KK-19', 76, ' Tujuh Puluh Enam'),
(261, '12131799', 'G-001', 5, '070-KK-19', 84, ' Delapan Puluh Empat'),
(262, '12131801', 'G-001', 5, '070-KK-19', 75, ' Tujuh Puluh Lima'),
(263, '12131804', 'G-001', 5, '070-KK-19', 84, ' Delapan Puluh Empat'),
(264, '12131805', 'G-001', 5, '070-KK-19', 80, ' Delapan Puluh '),
(265, '12131806', 'G-001', 5, '070-KK-19', 79, ' Tujuh Puluh Sembilan'),
(266, '12131807', 'G-001', 5, '070-KK-19', 86, ' Delapan Puluh Enam'),
(267, '12131808', 'G-001', 5, '070-KK-19', 76, ' Tujuh Puluh Enam'),
(268, '12131809', 'G-001', 5, '070-KK-19', 78, ' Tujuh Puluh Delapan'),
(269, '12131810', 'G-001', 5, '070-KK-19', 77, ' Tujuh Puluh Tujuh'),
(270, '12131811', 'G-001', 5, '070-KK-19', 80, ' Delapan Puluh '),
(299, '12131780', 'G-003', 6, '070-KK-17', 88, ' Delapan Puluh Delapan'),
(300, '12131781', 'G-003', 6, '070-KK-17', 87, ' Delapan Puluh Tujuh'),
(301, '12131782', 'G-003', 6, '070-KK-17', 85, ' Delapan Puluh Lima'),
(302, '12131784', 'G-003', 6, '070-KK-17', 79, ' Tujuh Puluh Sembilan'),
(303, '12131785', 'G-003', 6, '070-KK-17', 80, ' Delapan Puluh '),
(304, '12131786', 'G-003', 6, '070-KK-17', 76, ' Tujuh Puluh Enam'),
(305, '12131787', 'G-003', 6, '070-KK-17', 78, ' Tujuh Puluh Delapan'),
(306, '12131788', 'G-003', 6, '070-KK-17', 78, ' Tujuh Puluh Delapan'),
(307, '12131789', 'G-003', 6, '070-KK-17', 80, ' Delapan Puluh '),
(308, '12131790', 'G-003', 6, '070-KK-17', 76, ' Tujuh Puluh Enam'),
(309, '12131791', 'G-003', 6, '070-KK-17', 78, ' Tujuh Puluh Delapan'),
(310, '12131792', 'G-003', 6, '070-KK-17', 80, ' Delapan Puluh '),
(311, '12131793', 'G-003', 6, '070-KK-17', 80, ' Delapan Puluh '),
(312, '12131794', 'G-003', 6, '070-KK-17', 77, ' Tujuh Puluh Tujuh'),
(313, '12131795', 'G-003', 6, '070-KK-17', 79, ' Tujuh Puluh Sembilan'),
(314, '12131796', 'G-003', 6, '070-KK-17', 83, ' Delapan Puluh Tiga'),
(315, '12131797', 'G-003', 6, '070-KK-17', 84, ' Delapan Puluh Empat'),
(316, '12131798', 'G-003', 6, '070-KK-17', 77, ' Tujuh Puluh Tujuh'),
(317, '12131799', 'G-003', 6, '070-KK-17', 80, ' Delapan Puluh '),
(318, '12131801', 'G-003', 6, '070-KK-17', 75, ' Tujuh Puluh Lima'),
(319, '12131804', 'G-003', 6, '070-KK-17', 78, ' Tujuh Puluh Delapan'),
(320, '12131805', 'G-003', 6, '070-KK-17', 80, ' Delapan Puluh '),
(321, '12131806', 'G-003', 6, '070-KK-17', 76, ' Tujuh Puluh Enam'),
(322, '12131807', 'G-003', 6, '070-KK-17', 85, ' Delapan Puluh Lima'),
(323, '12131808', 'G-003', 6, '070-KK-17', 76, ' Tujuh Puluh Enam'),
(324, '12131809', 'G-003', 6, '070-KK-17', 79, ' Tujuh Puluh Sembilan'),
(325, '12131810', 'G-003', 6, '070-KK-17', 78, ' Tujuh Puluh Delapan'),
(326, '12131811', 'G-003', 6, '070-KK-17', 80, ' Delapan Puluh ');

--
-- Trigger `nilai`
--
DELIMITER //
CREATE TRIGGER `penilaian` BEFORE INSERT ON `nilai`
 FOR EACH ROW BEGIN
INSERT INTO log
(id_log,id_user,aktifitas,waktu)
VALUES
('',CURRENT_USER,'menambahkan nilai',now());

END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE IF NOT EXISTS `pengaturan` (
`id_pengaturan` int(10) NOT NULL,
  `nama_sekolah` varchar(30) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `title` varchar(50) NOT NULL,
  `keterangan_aplikasi` text NOT NULL,
  `paging` int(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`id_pengaturan`, `nama_sekolah`, `alamat_sekolah`, `title`, `keterangan_aplikasi`, `paging`) VALUES
(1, 'SMKN 1 Lemahsugih', 'jln. Raya Padarek-Bandung', 'Sistem Aplikasi Penilaian', 'Aplikasi Penilaian', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profesi`
--

CREATE TABLE IF NOT EXISTS `profesi` (
`id_profesi` int(5) NOT NULL,
  `nama_profesi` varchar(30) NOT NULL,
  `keterangan_profesi` text NOT NULL,
  `profesi_aktif` enum('Y','N') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `profesi`
--

INSERT INTO `profesi` (`id_profesi`, `nama_profesi`, `keterangan_profesi`, `profesi_aktif`) VALUES
(1, 'Administrator', 'Administrator of application', 'Y'),
(2, 'Kepala Sekolah', 'Kepala Sekolah SMKN 1 Lemahsugih', 'Y'),
(3, 'Wakasek Kurikulum', 'Wakasek kurikulum di SMKN 1 Lemahsugih', 'Y'),
(4, 'Guru', 'Guru pengajar siswa disekolah SMKN 1 Lemahsugih', 'Y'),
(5, 'Siswa', 'Siswa SMKN 1 Lemahsugih', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `siswa_nisn` varchar(15) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `kompetensi_kode` varchar(10) NOT NULL,
  `siswa_nama` varchar(30) NOT NULL,
  `siswa_jk` enum('L','P') NOT NULL,
  `siswa_alamat` text NOT NULL,
  `siswa_tgl_lahir` date NOT NULL,
  `siswa_tmpt_lahir` varchar(15) NOT NULL,
  `email_siswa` varchar(30) NOT NULL,
  `kontak_siswa` varchar(15) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`siswa_nisn`, `id_kelas`, `kompetensi_kode`, `siswa_nama`, `siswa_jk`, `siswa_alamat`, `siswa_tgl_lahir`, `siswa_tmpt_lahir`, `email_siswa`, `kontak_siswa`, `image`) VALUES
('12131780', 8, 'KK-001', 'Agis Rahma Herdiana', 'L', 'Godabaya', '1996-06-14', 'Majalengka', 'agislaksamana46@gmail.com', '085860803101', 'c2.png'),
('12131781', 8, 'KK-001', 'Ai Yupitasari', 'P', 'Sindanghurip', '1996-07-12', 'Majalengka', 'aiyupitasari@yahoo.com', '085272110087', ''),
('12131782', 8, 'KK-001', 'Ali Akbar', 'L', 'Mananti', '1996-07-17', 'Majalengka', 'aliakbar@yahoo.com', '082250889044', ''),
('12131784', 8, 'KK-001', 'Asep Saepul Milah', 'L', 'Gunung Larang', '1996-08-09', 'Majalengka', 'asep_saepul@yahoo.co.id', '082250889044', ''),
('12131785', 8, 'KK-001', 'Awan Hermawan', 'L', 'Cipining', '1996-02-23', 'Majalengka', 'awan.hermawan@gmail.com', '085272110087', ''),
('12131786', 8, 'KK-001', 'Dede Restu Anggi Jaya', 'P', 'Cigobang', '1996-08-08', 'Majaengka', 'dede_restu@yahoo.com', '085860803888', ''),
('12131787', 8, 'KK-001', 'Depin Kurnia', 'L', 'Cisalak', '1996-05-09', 'Majalengka', 'devin.kurnia@yahoo.com', '082250889012', ''),
('12131788', 8, 'KK-001', 'Dian Anriani', 'P', 'Borogojol', '1997-10-09', 'Majalengka', 'Dian_anriani@yahoo.co.id', '082250889044', ''),
('12131789', 8, 'KK-001', 'Eneng Ratih Y', 'P', 'Lemahputih', '1996-09-15', 'Majalengka', 'eneng@yahoo.com', '082250889044', ''),
('12131790', 8, 'KK-001', 'Evi Puput Firdayanti', 'P', 'Kalapadua', '1996-03-09', 'Majalengka', 'evi@yahoo.com', '085860803888', ''),
('12131791', 8, 'KK-001', 'Firda Yanti Wasman', 'P', 'Pasirhanja', '1996-09-08', 'Majalengka', 'firda@gmail.com', '082250889012', ''),
('12131792', 8, 'KK-001', 'Gupron Ambali', 'L', 'Padarek', '1996-05-16', 'Majalengka', 'gupron@yahoo.com', '082250889044', ''),
('12131793', 8, 'KK-001', 'Herman Nurfalah', 'L', 'Malongpong', '1996-03-02', 'Majalengka', 'Herman.nurfalah@gmail.com', '085272110087', ''),
('12131794', 8, 'KK-001', 'Ina Marlina', 'P', 'Babakansari', '1996-11-09', 'Majalengka', 'ina@gmail.com', '082250889012', ''),
('12131795', 8, 'KK-001', 'Jajang Maulana', 'L', 'Padarek', '1996-05-24', 'Majalengka', 'jajang@yahoo.com', '085272110087', ''),
('12131796', 8, 'KK-001', 'Lilis Bainul Harisa', 'P', 'Babakansari', '1996-09-25', 'Majalengka', 'lilis@yahoo.com', '085860803888', ''),
('12131797', 8, 'KK-001', 'M.Surya Pradana', 'L', 'Batujurung', '1996-01-02', 'Majalengka', 'surya@gmail.com', '085272110087', ''),
('12131798', 8, 'KK-001', 'Mita Resa', 'P', 'Gunung Seurueh', '1996-08-19', 'Majalengka', 'mita@yahoo.com', '082250889012', ''),
('12131799', 8, 'KK-001', 'Nedi Pradana', 'L', 'Cikondang', '1997-02-04', 'Majalengka', 'nedy@yahoo.com', '085272110087', ''),
('12131801', 8, 'KK-001', 'Nurhayati', 'P', 'Sadawangi', '1996-03-02', 'Majalengka', 'nurhayati@yahoo.com', '082250889044', ''),
('12131804', 8, 'KK-001', 'Rizky Firmansyah', 'L', 'Sadawangi', '1995-11-05', 'Majalengka', 'rizki@gmail.com', '082250889012', ''),
('12131805', 8, 'KK-001', 'Silvia Nengsih', 'P', 'Wantah', '1996-08-09', 'Majalengka', 'silvi@gmail.com', '082250889044', ''),
('12131806', 8, 'KK-001', 'Siti Sahanah', 'P', 'Kalapadua', '1996-07-17', 'Majalengka', 'siti@yahoo.com', '085272110087', ''),
('12131807', 8, 'KK-001', 'Sunardi', 'L', 'Tarikolot', '1996-01-10', 'Majalengka', 'sunardi@gmail.com', '082250889044', ''),
('12131808', 8, 'KK-001', 'Tiana Gilang F', 'L', 'Sadawangi', '1996-09-09', 'Majalengka', 'gilang@yahoo.com', '082250889012', ''),
('12131809', 8, 'KK-001', 'Titin Suhartini', 'P', 'Rancabolang', '1996-09-16', 'Majalengka', 'titin@yahoo.com', '082250889044', ''),
('12131810', 8, 'KK-001', 'Wiwin Windarti', 'P', 'Gunung Sereuh', '1996-10-09', 'Majalengka', 'wiwin@yahoo.com', '082250889012', ''),
('12131811', 8, 'KK-001', 'Yola Anita', 'P', 'Tarikolot', '1996-10-09', 'Majalengka', 'yola@gmail.com', '082250889077', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `standar_kompetensi`
--

CREATE TABLE IF NOT EXISTS `standar_kompetensi` (
  `sk_kode` varchar(10) NOT NULL,
  `kompetensi_kode` varchar(6) NOT NULL,
  `sk_nama` varchar(100) NOT NULL,
  `sk_kelas` varchar(10) NOT NULL,
  `sk_semester` varchar(20) NOT NULL,
  `sk_kkm` double NOT NULL,
  `guru_kode` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `standar_kompetensi`
--

INSERT INTO `standar_kompetensi` (`sk_kode`, `kompetensi_kode`, `sk_nama`, `sk_kelas`, `sk_semester`, `sk_kkm`, `guru_kode`) VALUES
('070-DKK-01', 'KK-001', 'Merakit Personal Komputer', 'X', '2', 75, 'G-001'),
('070-DKK-02', 'KK-001', 'Melakukan Instalasi Sistem Operasi Dasar', 'X', '2', 75, 'G-001'),
('070-DKK-03', 'KK-001', 'Menerapkan Keselamatan Kerja dan Lingkungan Hidup', 'X', '2', 75, 'G-001'),
('070-DKK-04', 'KK-001', 'Mengoperasikan Program Aplikasi (Office 2007)', 'X', '1', 75, 'G-006'),
('070-KK-01', 'KK-001', 'Menerapkan Elektronika Analog dan Digital Dasar', 'X', '1', 75, 'G-005'),
('070-KK-02', 'KK-001', 'Menerapkan Algoritma Pemrograman Tingkat Dasar', 'X', '1', 75, 'G-004'),
('070-KK-03', 'KK-001', 'Menerapkan Algoritma Pemrograman Tingkat Lanjut', 'X', '2', 75, 'G-004'),
('070-KK-04', 'KK-001', 'Menerapkan Aplikasi Basis Data l', 'X', '2', 75, 'G-004'),
('070-KK-05', 'KK-001', 'Menerapkan Aplikasi Basis Data ll', 'XI', '3', 75, 'G-004'),
('070-KK-06', 'KK-001', 'Memahami Pemrograman Berbasis Visual Dekstop', 'XI', '4', 75, 'G-001'),
('070-KK-07', 'KK-001', 'Membuat Software Aplikasi Basis Dekstop', 'XI', '3', 75, 'G-001'),
('070-KK-08', 'KK-001', 'Mengoperasikan Sistem Operasi Jaringan Komputer', 'X', '2', 75, 'G-004'),
('070-KK-09', 'KK-001', 'Menerapkan Bahasa Pemrograman SQL Dasar', 'XI', '3', 75, 'G-003'),
('070-KK-10', 'KK-001', 'Menerapkan Bahasa Pemrograman SQL Lanjut', 'XI', '4', 75, 'G-003'),
('070-KK-11', 'KK-001', 'Menerapkan Dasar-Dasar Web Statis', 'X', '2', 75, 'G-002'),
('070-KK-12', 'KK-001', 'Membuat Web Dinamis Tingkat Dasar', 'XI', '3', 75, 'G-002'),
('070-KK-13', 'KK-001', 'Membuat Web Dinamis Tingkat Lanjut', 'XI', '4', 75, 'G-002'),
('070-KK-14', 'KK-001', 'Membuat Aplikasi Teks dan Dekstop Berbasis Objek (C++)', 'XI', '4', 75, 'G-004'),
('070-KK-15', 'KK-001', 'Menggunakan Bahasa Pemrograman Perancangan', 'XII', '5', 75, 'G-001'),
('070-KK-16', 'KK-001', 'Merancang Program Aplikasi Berbasis Objek (JAVA)', 'XII', '5', 75, 'G-004'),
('070-KK-17', 'KK-001', 'Membuat Aplikasi Basis Data Menggunakan SQL', 'XII', '5', 75, 'G-003'),
('070-KK-18', 'KK-001', 'Mengintegrasikan Basis Data dengan Web', 'XII', '5', 75, 'G-002'),
('070-KK-19', 'KK-001', 'Membuat Program Aplikasi Basis Data (Oracle)', 'XII', '6', 75, 'G-001'),
('070-KK-20', 'KK-001', 'Membuat Aplikasi Web Berbasis Java Server Page', 'XII', '6', 75, 'G-002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian`
--

CREATE TABLE IF NOT EXISTS `ujian` (
`id_ujian` int(10) NOT NULL,
  `nama_ujian` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `ujian`
--

INSERT INTO `ujian` (`id_ujian`, `nama_ujian`, `keterangan`) VALUES
(3, 'Ujian Akhir Semester (UAS)', 'Ujian yang dilaksanakan pada akhir semester'),
(4, 'Ujian Tengah Semester (UTS)', 'Ujian yang dilaksanakan pada pertengahan semester 1 & 2'),
(5, 'Ujian Kenaikan Kelas (UKK)', 'Ujian yang dilaksanakan untuk menentukan kenaikan kelas'),
(6, 'Ulangan Harian', 'Ulangan yang dilaksanakan ditiap kelas oleh Guru mata pelajaran'),
(7, 'Kuis', 'Kuis untuk setiap mata pelajaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(10) NOT NULL,
  `nama_user` varchar(60) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_profesi` int(5) NOT NULL,
  `image_user` varchar(150) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `level` varchar(15) NOT NULL,
  `aktif` enum('Y','N') NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `id_profesi`, `image_user`, `no_hp`, `alamat`, `email`, `level`, `aktif`, `last_login`) VALUES
('12131780', 'Agis Rahma Herdiana', '12131780', 'e864e42a6adec5a6698c7194b932fc69', 5, '', '085860803101', 'Godabaya', 'agislaksamana46@gmail.com', 'user', 'Y', '2015-02-28 08:36:52'),
('12131781', 'Ai Yupitasari', '12131781', '4483b72531d0acfc7796c4968861bbbb', 5, '', '085272110087', 'Sindanghurip', 'aiyupitasari@yahoo.com', 'user', 'Y', '0000-00-00 00:00:00'),
('12131782', 'Ali Akbar', '12131782', 'edd99b50d504de448d8d7d24cd7ea47a', 5, '', '082250889044', 'Mananti', 'aliakbar@yahoo.com', 'user', 'Y', '0000-00-00 00:00:00'),
('12131784', 'Asep Saepul Milah', '12131784', 'b48db9d5da22dcb311704cc0dc7b9b7b', 5, '', '082250889044', 'Gunung Larang', 'asep_saepul@yahoo.co.id', 'user', 'Y', '2015-02-28 08:44:26'),
('12131785', 'Awan Hermawan', '12131785', '19571c16644c2d95b73ca3f801258f6d', 5, '', '085272110087', 'Cipining', 'awan.hermawan@gmail.com', 'user', 'Y', '0000-00-00 00:00:00'),
('12131786', 'Dede Restu Anggi Jaya', '12131786', '183262562acbc9f46e1e5128dfba0c4b', 5, '', '085860803888', 'Cigobang', 'dede_restu@yahoo.com', 'user', 'Y', '0000-00-00 00:00:00'),
('12131787', 'Depin Kurnia', '12131787', '3c533c3474aea718fc6482f578033360', 5, '', '082250889012', 'Cisalak', 'devin.kurnia@yahoo.com', 'user', 'Y', '0000-00-00 00:00:00'),
('12131788', 'Dian Anriani', '12131788', 'c3a7c01cbd4d839d8ee9efa2f4320fb9', 5, '', '082250889044', 'Borogojol', 'Dian_anriani@yahoo.co.id', 'user', 'Y', '0000-00-00 00:00:00'),
('12131789', 'Eneng Ratih Y', '12131789', 'c9d40a873b8c8cdaf4d005f5672d6ff6', 5, '', '082250889044', 'Lemahputih', 'eneng@yahoo.com', 'user', 'Y', '0000-00-00 00:00:00'),
('12131790', 'Evi Puput Firdayanti', '12131790', 'c87d431aab2aaa1e516fd52a27293369', 5, '', '085860803888', 'Kalapadua', 'evi@yahoo.com', 'user', 'Y', '0000-00-00 00:00:00'),
('12131791', 'Firda Yanti Wasman', '12131791', 'd703dd329cb4c4e1230c87a5aa4b05b4', 5, '', '082250889012', 'Pasirhanja', 'firda@gmail.com', 'user', 'Y', '0000-00-00 00:00:00'),
('12131792', 'Gupron Ambali', '12131792', '79dd8555a6fea067cd8d022a869824f8', 5, '', '082250889044', 'Padarek', 'gupron@yahoo.com', 'user', 'Y', '0000-00-00 00:00:00'),
('12131793', 'Herman Nurfalah', '12131793', 'a3adf30f5b8cb9f68e5fb4fa171c5a62', 5, '', '085272110087', 'Malongpong', 'Herman.nurfalah@gmail.com', 'user', 'Y', '0000-00-00 00:00:00'),
('12131794', 'Ina Marlina', '12131794', 'd769d8b2cee167fd032704a215a4506e', 5, '', '082250889012', 'Babakansari', 'ina@gmail.com', 'user', 'Y', '0000-00-00 00:00:00'),
('12131795', 'Jajang Maulana', '12131795', '2543793ea893a5ac4937a647a7c38f5c', 5, '', '085272110087', 'Padarek', 'jajang@yahoo.com', 'user', 'Y', '0000-00-00 00:00:00'),
('12131796', 'Lilis Bainul Harisa', '12131796', '948deedae34d772c2bf2c518e047efbc', 5, '', '085860803888', 'Babakansari', 'lilis@yahoo.com', 'user', 'Y', '0000-00-00 00:00:00'),
('12131797', 'M.Surya Pradana', '12131797', '3f0b5eedc929e413b85b53a9a306e8f4', 5, '', '085272110087', 'Batujurung', 'surya@gmail.com', 'user', 'Y', '0000-00-00 00:00:00'),
('12131798', 'Mita Resa', '12131798', 'bf9b94836f6837c1951724c6e7bac3a5', 5, '', '082250889012', 'Gunung Seurueh', 'mita@yahoo.com', 'user', 'Y', '0000-00-00 00:00:00'),
('12131799', 'Nedi Pradana', '12131799', '9c1a4bcb05f8b12f14927b72c555c801', 5, '', '085272110087', 'Cikondang', 'nedy@yahoo.com', 'user', 'Y', '0000-00-00 00:00:00'),
('12131801', 'Nurhayati', '12131801', '68a8ff48089c8fb7be0cb3155b3bb085', 5, '', '082250889044', 'Sadawangi', 'nurhayati@yahoo.com', 'user', 'Y', '0000-00-00 00:00:00'),
('12131804', 'Rizky Firmansyah', '12131804', '2ecaad9417f2b810c5fa7f70f7d48986', 5, '', '082250889012', 'Sadawangi', 'rizki@gmail.com', 'user', 'Y', '0000-00-00 00:00:00'),
('12131805', 'Silvia Nengsih', '12131805', '6a5043826bd8fc346cb3866ea245485c', 5, '', '082250889044', 'Wantah', 'silvi@gmail.com', 'user', 'Y', '0000-00-00 00:00:00'),
('12131806', 'Siti Sahanah', '12131806', '7584a431d4c4b71c683163d92afe7bc7', 5, '', '085272110087', 'Kalapadua', 'siti@yahoo.com', 'user', 'Y', '0000-00-00 00:00:00'),
('12131807', 'Sunardi', '12131807', 'f13762c6927cccf71ac030848ff20566', 5, '', '082250889044', 'Tarikolot', 'sunardi@gmail.com', 'user', 'Y', '0000-00-00 00:00:00'),
('12131808', 'Tiana Gilang F', '12131808', 'ed8342c73533490f90b3c8383fb15066', 5, '', '082250889012', 'Sadawangi', 'gilang@yahoo.com', 'user', 'Y', '0000-00-00 00:00:00'),
('12131809', 'Titin Suhartini', '12131809', 'b99b2621f56bd3b446968bd8d3a71d7f', 5, '', '082250889044', 'Rancabolang', 'titin@yahoo.com', 'user', 'Y', '0000-00-00 00:00:00'),
('12131810', 'Wiwin Windarti', '12131810', '8c0d6f71dfc70c0da48e1aef58b96ca7', 5, '', '082250889012', 'Gunung Sereuh', 'wiwin@yahoo.com', 'user', 'Y', '0000-00-00 00:00:00'),
('12131811', 'Yola Anita', '12131811', 'de122f90d1fdf458eacad4803dd2e72a', 5, '', '082250889077', 'Tarikolot', 'yola@gmail.com', 'user', 'Y', '0000-00-00 00:00:00'),
('G-001', 'Dudi Hendrayana S.Kom', '11111110', '8270b3084d30ab3d95a7d58dbb15ed73', 4, '', '085272110087', 'Darmaraja', 'dudihendrayana@gmail.com', 'user', 'Y', '2015-02-28 10:04:10'),
('G-002', 'Asep Ridwan S.Pd', '11111112', '059fc16810ff3db79cac7a5a0527f490', 4, '', '085211234075', 'Lemahsugih', 'asep_ridwan@yahoo.co.id', 'user', 'Y', '2015-02-28 08:40:30'),
('G-003', 'Yusuf S.Pd', '11111113', 'e6fcbf2f00cdb394fc250461c81e9b03', 4, '', '085272110087', 'Bantarujeg', 'yusuf@gmail.com', 'user', 'Y', '2015-02-28 08:44:59'),
('G-004', 'Dede Sopyan S.Pd', '11111114', '6b82348c2a81f59880e606092e2f891f', 4, '', '085860803103', 'Sarikuning', 'deso@gmail.com', 'user', 'Y', '0000-00-00 00:00:00'),
('G-005', 'Akhmad S.Pd', '11111115', '2fb85690d59ca4e7d06b323b22d04588', 4, '', '085860803103', 'Cicariang', 'akhmad@yahoo.com', 'user', 'Y', '2015-02-27 20:13:39'),
('G-006', 'Didin Jaenal S.Pd', '11111116', '1732209fed2284843c77adaeab82ee82', 4, '', '085860803103', 'Lemahputih', 'dije@yahoo.com', 'user', 'Y', '0000-00-00 00:00:00'),
('US-001', 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'ismey.jpg', '085860803101', 'Majalengka', 'admin@detik.com', 'admin', 'Y', '2015-02-28 09:56:18'),
('US-010', 'Kepala Sekolah SMKN 1 Lemahsugih', 'kepsek', '8561863b55faf85b9ad67c52b3b851ac', 2, '', '082250889044', 'Majalengka', 'kepsek@gmail.com', 'user', 'Y', '2015-02-28 07:50:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wali_murid`
--

CREATE TABLE IF NOT EXISTS `wali_murid` (
`wali_id` int(10) NOT NULL,
  `siswa_nisn` varchar(15) NOT NULL,
  `wali_nama_ayah` varchar(30) NOT NULL,
  `wali_nama_ibu` varchar(30) NOT NULL,
  `wali_pekerjaan_ayah` varchar(30) NOT NULL,
  `wali_pekerjaan_ibu` varchar(30) NOT NULL,
  `wali_alamat` text NOT NULL,
  `wali_telepon` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `wali_murid`
--

INSERT INTO `wali_murid` (`wali_id`, `siswa_nisn`, `wali_nama_ayah`, `wali_nama_ibu`, `wali_pekerjaan_ayah`, `wali_pekerjaan_ibu`, `wali_alamat`, `wali_telepon`) VALUES
(1, '12131780', 'Rudi', 'Reni', 'Wiraswasta', 'Ibu rumah tangga', 'Majalengka', '085860803101');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang_studi`
--
ALTER TABLE `bidang_studi`
 ADD PRIMARY KEY (`bidang_kode`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
 ADD PRIMARY KEY (`guru_kode`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
 ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kompetensi_keahlian`
--
ALTER TABLE `kompetensi_keahlian`
 ADD PRIMARY KEY (`kompetensi_kode`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
 ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
 ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
 ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indexes for table `profesi`
--
ALTER TABLE `profesi`
 ADD PRIMARY KEY (`id_profesi`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
 ADD PRIMARY KEY (`siswa_nisn`);

--
-- Indexes for table `standar_kompetensi`
--
ALTER TABLE `standar_kompetensi`
 ADD PRIMARY KEY (`sk_kode`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
 ADD PRIMARY KEY (`id_ujian`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wali_murid`
--
ALTER TABLE `wali_murid`
 ADD PRIMARY KEY (`wali_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
MODIFY `id_kelas` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
MODIFY `id_log` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=169;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=327;
--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
MODIFY `id_pengaturan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `profesi`
--
ALTER TABLE `profesi`
MODIFY `id_profesi` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
MODIFY `id_ujian` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `wali_murid`
--
ALTER TABLE `wali_murid`
MODIFY `wali_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
