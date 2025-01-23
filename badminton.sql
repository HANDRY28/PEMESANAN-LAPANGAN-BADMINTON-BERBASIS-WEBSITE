-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jan 2025 pada 11.34
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `badminton`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_212279`
--

CREATE TABLE `admin_212279` (
  `212279_id_user` int(3) NOT NULL,
  `212279_username` varchar(20) NOT NULL,
  `212279_password` varchar(20) NOT NULL,
  `212279_nama` varchar(50) NOT NULL,
  `212279_no_handphone` varchar(15) NOT NULL,
  `212279_email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `admin_212279`
--

INSERT INTO `admin_212279` (`212279_id_user`, `212279_username`, `212279_password`, `212279_nama`, `212279_no_handphone`, `212279_email`) VALUES
(8, 'handry', 'han2005', 'Julius J Kwasua', '0822387589199', 'han@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bayar_212279`
--

CREATE TABLE `bayar_212279` (
  `212279_id_bayar` int(11) NOT NULL,
  `212279_id_sewa` int(11) NOT NULL,
  `212279_bukti` text NOT NULL,
  `212279_tanggal_upload` date NOT NULL,
  `212279_konfirmasi` varchar(50) NOT NULL DEFAULT 'Belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `bayar_212279`
--

INSERT INTO `bayar_212279` (`212279_id_bayar`, `212279_id_sewa`, `212279_bukti`, `212279_tanggal_upload`, `212279_konfirmasi`) VALUES
(56, 127, '652df538ee439.png', '2023-10-17', 'Terkonfirmasi'),
(57, 128, '652df606de5e8.png', '2023-10-17', 'Terkonfirmasi'),
(59, 129, '676118198afb7.jpg', '2024-12-17', 'Terkonfirmasi'),
(60, 135, '6777449ddf60c.jpg', '2025-01-03', 'Sudah Bayar'),
(61, 136, '67774bee55850.jpg', '2025-01-03', 'Sudah Bayar'),
(62, 138, '6778cd7ff2c1e.jpeg', '2025-01-04', 'Sudah Bayar'),
(63, 139, '6778f77d9afe2.jpeg', '2025-01-04', 'Sudah Bayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapangan_212279`
--

CREATE TABLE `lapangan_212279` (
  `212279_id_lapangan` int(11) NOT NULL,
  `212279_nama` varchar(35) NOT NULL,
  `212279_keterangan` text NOT NULL,
  `212279_harga` int(11) NOT NULL,
  `212279_foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `lapangan_212279`
--

INSERT INTO `lapangan_212279` (`212279_id_lapangan`, `212279_nama`, `212279_keterangan`, `212279_harga`, `212279_foto`) VALUES
(23, 'Lapangan 1', 'Alamat : Kilo 10', 50000, '67774c368a9bf.jpg'),
(24, 'Lapangan 2', 'Alamat : Kilo 12', 40000, '6775856619f9a.jpg'),
(25, 'Lapangan 3', 'Alamat : Kilo 13', 30000, '67758573f34a4.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa_212279`
--

CREATE TABLE `sewa_212279` (
  `212279_id_sewa` int(11) NOT NULL,
  `212279_id_user` int(11) NOT NULL,
  `212279_id_lapangan` int(11) NOT NULL,
  `212279_tanggal_pesan` date NOT NULL,
  `212279_lama_sewa` int(11) NOT NULL,
  `212279_jam_mulai` datetime NOT NULL,
  `212279_jam_habis` datetime NOT NULL,
  `212279_harga` int(11) NOT NULL,
  `212279_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `sewa_212279`
--

INSERT INTO `sewa_212279` (`212279_id_sewa`, `212279_id_user`, `212279_id_lapangan`, `212279_tanggal_pesan`, `212279_lama_sewa`, `212279_jam_mulai`, `212279_jam_habis`, `212279_harga`, `212279_total`) VALUES
(123, 98, 23, '2023-05-03', 2, '2023-05-03 16:23:00', '2023-05-03 18:23:00', 30000, 60000),
(124, 0, 0, '2023-10-17', 0, '0000-00-00 00:00:00', '1970-01-01 01:00:00', 0, 0),
(125, 0, 0, '2023-10-17', 0, '0000-00-00 00:00:00', '1970-01-01 01:00:00', 0, 0),
(126, 98, 0, '2023-10-17', 0, '0000-00-00 00:00:00', '1970-01-01 01:00:00', 30000, 30000),
(127, 98, 24, '2023-10-17', 2, '2023-10-17 09:43:00', '2023-10-17 11:43:00', 20000, 40000),
(128, 98, 25, '2023-10-17', 2, '2023-10-17 09:48:00', '2023-10-17 11:48:00', 30000, 60000),
(129, 100, 24, '2024-12-17', 14, '2024-12-10 14:56:00', '2024-12-11 04:56:00', 20000, 280000),
(137, 102, 25, '2025-01-04', 2, '2025-01-04 14:30:00', '2025-01-04 16:30:00', 30000, 60000),
(138, 100, 24, '2025-01-04', 2, '2025-01-04 14:55:00', '2025-01-04 16:55:00', 40000, 80000),
(139, 104, 24, '2025-01-04', 17, '2025-01-04 17:55:00', '2025-01-05 10:55:00', 40000, 680000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_212279`
--

CREATE TABLE `user_212279` (
  `212279_id_user` int(11) NOT NULL,
  `212279_email` varchar(50) NOT NULL,
  `212279_password` varchar(32) NOT NULL,
  `212279_no_handphone` varchar(20) NOT NULL,
  `212279_jenis_kelamin` varchar(10) NOT NULL,
  `212279_nama_lengkap` varchar(60) NOT NULL,
  `212279_alamat` text NOT NULL,
  `212279_foto` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_212279`
--

INSERT INTO `user_212279` (`212279_id_user`, `212279_email`, `212279_password`, `212279_no_handphone`, `212279_jenis_kelamin`, `212279_nama_lengkap`, `212279_alamat`, `212279_foto`) VALUES
(102, 'munira@gmail.com', 'munira123', '12345677', 'Perempuan', 'muniraa', 'bulan', '677589a801a9a.jpg'),
(100, 'janhandry@gmail.com', '12345678', '', 'Laki-laki', '', 'dom', ''),
(103, 'jihann@gmail.com', 'han2005', '1234565', 'Perempuan', 'jihann', 'kilo 9', '6778cdd07bf29.jpeg'),
(104, 'jihan12@gmail.com', '12345678', '', 'Perempuan', '', 'kilo10', ''),
(105, 'jan12@gmail.com', '12345678', '123456789101112', 'Laki-Laki', 'jan', 'saturn', '6778fc5e49e5d.png'),
(106, 'gus@gmail.com', '12345678', '12345678910111', 'Laki-Laki', 'gus', 'dom', '6778fd478e6aa.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_212279`
--
ALTER TABLE `admin_212279`
  ADD PRIMARY KEY (`212279_id_user`);

--
-- Indeks untuk tabel `bayar_212279`
--
ALTER TABLE `bayar_212279`
  ADD PRIMARY KEY (`212279_id_bayar`);

--
-- Indeks untuk tabel `lapangan_212279`
--
ALTER TABLE `lapangan_212279`
  ADD PRIMARY KEY (`212279_id_lapangan`);

--
-- Indeks untuk tabel `sewa_212279`
--
ALTER TABLE `sewa_212279`
  ADD PRIMARY KEY (`212279_id_sewa`);

--
-- Indeks untuk tabel `user_212279`
--
ALTER TABLE `user_212279`
  ADD PRIMARY KEY (`212279_id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin_212279`
--
ALTER TABLE `admin_212279`
  MODIFY `212279_id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `bayar_212279`
--
ALTER TABLE `bayar_212279`
  MODIFY `212279_id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `lapangan_212279`
--
ALTER TABLE `lapangan_212279`
  MODIFY `212279_id_lapangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `sewa_212279`
--
ALTER TABLE `sewa_212279`
  MODIFY `212279_id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT untuk tabel `user_212279`
--
ALTER TABLE `user_212279`
  MODIFY `212279_id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
