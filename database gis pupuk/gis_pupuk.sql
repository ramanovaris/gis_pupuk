-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05 Mar 2022 pada 15.04
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gis_pupuk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agama`
--

CREATE TABLE `agama` (
  `kd_agama` int(11) NOT NULL,
  `nama_agama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `agama`
--

INSERT INTO `agama` (`kd_agama`, `nama_agama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(4, 'tes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `kd_jk` int(11) NOT NULL,
  `jk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`kd_jk`, `jk`) VALUES
(1, 'perempuan'),
(2, 'laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kandang`
--

CREATE TABLE `kandang` (
  `kd_kandang` int(11) NOT NULL,
  `alamat_kandang` varchar(100) NOT NULL,
  `lintang` varchar(20) NOT NULL,
  `bujur` varchar(20) NOT NULL,
  `kd_kec` int(11) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `jumlah_pupuk` int(100) NOT NULL,
  `harga_pupuk` int(100) NOT NULL,
  `terakhir_diubah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kandang`
--

INSERT INTO `kandang` (`kd_kandang`, `alamat_kandang`, `lintang`, `bujur`, `kd_kec`, `id_pemilik`, `jumlah_pupuk`, `harga_pupuk`, `terakhir_diubah`) VALUES
(20, 'Panggung', '-3.751213', '114.757087', 1, 36, 140, 8000, '2019-06-13 12:38:10'),
(21, 'Panggung', '-3.762363', '114.757214', 1, 37, 125, 9000, '2019-06-13 10:54:22'),
(25, 'Panggung', '-3.759122', '114.75162', 1, 44, 110, 9000, '2019-06-13 12:39:27'),
(26, 'Panggung', '-3.764364', '114.742717', 1, 38, 100, 10000, '2019-06-13 12:41:30'),
(27, 'Panggung', '-3.764364', '114.742717', 1, 39, 205, 10000, '2019-06-13 12:44:16'),
(28, 'Panggung Baru', '-3.743698', '114.697174', 1, 40, 800, 10000, '2019-06-13 12:45:20'),
(29, 'Panggung Baru', '-3.743698', '114.697174', 1, 41, 103, 10000, '2019-06-13 12:46:03'),
(30, 'Ujung Batu', '-3.74224', '114.70565', 1, 42, 80, 10000, '2019-06-13 12:47:01'),
(31, 'Ujung Batu', '-3.74368', '114.697349', 1, 43, 100, 10000, '2019-06-13 12:47:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `kd_kec` int(11) NOT NULL,
  `nama_kec` varchar(100) NOT NULL,
  `lat` varchar(20) NOT NULL,
  `lng` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`kd_kec`, `nama_kec`, `lat`, `lng`) VALUES
(1, 'Pelaihari', '-3.7000', '114.7379412'),
(2, 'Jorong', 'fdf', 'fdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik`
--

CREATE TABLE `pemilik` (
  `id_pemilik` int(11) NOT NULL,
  `nama_pemilik` varchar(100) NOT NULL,
  `alamat` varchar(125) NOT NULL,
  `kd_kec` int(11) NOT NULL,
  `kd_agama` int(11) NOT NULL,
  `kd_jk` int(11) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemilik`
--

INSERT INTO `pemilik` (`id_pemilik`, `nama_pemilik`, `alamat`, `kd_kec`, `kd_agama`, `kd_jk`, `no_hp`, `foto`) VALUES
(28, 'Super Admin', 'Panggung', 2, 1, 2, '082236941504', 'no_pic.jpg'),
(36, 'Hary Cahyono', 'Panggung', 1, 1, 2, '08125165991', 'admin_08062019_162540.jpeg'),
(37, 'Suprianto', 'Panggung', 1, 1, 2, '082236941504', 'no_pic.jpg'),
(38, 'Rusmadi', 'Panggung', 1, 1, 2, '085249685182', 'no_pic.jpg'),
(39, 'Zahiba', 'Panggung', 1, 1, 2, '081250459133', 'no_pic.jpg'),
(40, 'Adom', 'Panggung Baru', 1, 1, 2, '081521524566', 'no_pic.jpg'),
(41, 'Nurhani', 'Panggung Baru', 1, 1, 1, '082282849209', 'no_pic.jpg'),
(42, 'H. Husairi', 'Ujung Batu', 1, 1, 2, '085249801318', 'no_pic.jpg'),
(43, 'Hairani', 'Ujung Batu', 1, 1, 2, '085345699879', 'no_pic.jpg'),
(44, ' M. Heriyanto', 'Panggung', 1, 1, 2, '085787686379', 'no_pic.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tgl_daftar` datetime NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `level` varchar(100) NOT NULL DEFAULT 'user',
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `tgl_daftar`, `id_pemilik`, `level`, `status`) VALUES
(25, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2019-05-19 21:04:28', 28, 'Superadmin', 'terdaftar'),
(33, 'Hary', '32ddf7f7ea881de28d1273f0012dc8d3', '2019-06-06 10:23:21', 36, 'user', 'terdaftar'),
(34, 'Suprianto', '70a5f35fe76907557536ee3143f76577', '2019-06-12 17:48:51', 37, 'user', 'terdaftar'),
(35, 'Rusmadi', 'a3620acf624f2fb68dd558eec2d83076', '2019-06-12 17:49:54', 38, 'user', 'terdaftar'),
(36, 'Zahiba', '73f1053b83d0c598911d93f2354edb59', '2019-06-12 17:50:54', 39, 'user', 'terdaftar'),
(37, 'Adom', '9d975148cd7d9913f20908669061482a', '2019-06-12 17:52:43', 40, 'user', 'belum terdaftar'),
(38, 'Nurhani', '5416a35b1fa74c604937ca6f5cb6fa75', '2019-06-12 17:54:19', 41, 'user', 'terdaftar'),
(39, 'Husairi', 'ccfe731cf86d607303f7147eb3c12719', '2019-06-12 17:55:21', 42, 'user', 'terdaftar'),
(40, 'Hairani', '92814cf9910ed854839e52135e284ac4', '2019-06-12 17:56:05', 43, 'user', 'terdaftar'),
(41, 'Heri', '94c4fd4a8d28a9c37a873c3240e06704', '2019-06-12 17:57:32', 44, 'user', 'terdaftar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`kd_agama`);

--
-- Indexes for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`kd_jk`);

--
-- Indexes for table `kandang`
--
ALTER TABLE `kandang`
  ADD PRIMARY KEY (`kd_kandang`),
  ADD KEY `kd_kec` (`kd_kec`),
  ADD KEY `id_pemilik` (`id_pemilik`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`kd_kec`);

--
-- Indexes for table `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id_pemilik`),
  ADD KEY `kd_kec` (`kd_kec`),
  ADD KEY `kd_agama` (`kd_agama`),
  ADD KEY `kd_jk` (`kd_jk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_pemilik` (`id_pemilik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `kd_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `kd_jk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kandang`
--
ALTER TABLE `kandang`
  MODIFY `kd_kandang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `kd_kec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id_pemilik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kandang`
--
ALTER TABLE `kandang`
  ADD CONSTRAINT `kandang_ibfk_1` FOREIGN KEY (`id_pemilik`) REFERENCES `pemilik` (`id_pemilik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kandang_ibfk_3` FOREIGN KEY (`kd_kec`) REFERENCES `kecamatan` (`kd_kec`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  ADD CONSTRAINT `pemilik_ibfk_1` FOREIGN KEY (`kd_agama`) REFERENCES `agama` (`kd_agama`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemilik_ibfk_2` FOREIGN KEY (`kd_kec`) REFERENCES `kecamatan` (`kd_kec`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemilik_ibfk_3` FOREIGN KEY (`kd_jk`) REFERENCES `jenis_kelamin` (`kd_jk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_pemilik`) REFERENCES `pemilik` (`id_pemilik`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
