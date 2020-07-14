-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2020 pada 10.34
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-budget`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(15) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `foto` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `nik`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `hp`, `pekerjaan`, `pendidikan`, `agama`, `jenis_kelamin`, `foto`, `status`, `level`, `created_at`, `created_by`) VALUES
(11, 'admin', '', '01425e4e021748f61f2b77becb81b9c2d397ed5fb2bd2bd25f818b15fb69d4f0e5fb41130b746cff4528cf56d86d50444f1fb1338589276b7bccd78cf0b93ecd', '1235678', 'Administrator', 'Serang', '1997-02-01', 'Kele', '', '', 'SD Sederajat', '', 'Laki-Laki', '.jpg', 'Aktif', 1, '2020-06-17 12:25:09', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pengajuan`
--

CREATE TABLE `detail_pengajuan` (
  `id` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `qty` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `biaya` bigint(20) NOT NULL,
  `status_detail` int(11) DEFAULT NULL,
  `foto` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pengajuan`
--

INSERT INTO `detail_pengajuan` (`id`, `id_pengajuan`, `deskripsi`, `qty`, `satuan`, `biaya`, `status_detail`, `foto`) VALUES
(5, 1, 'Kabel', 3, 'Pcs', 52000, 1, '1-512.png'),
(11, 1, 'Kabel', 2, 'Unit', 37000, 1, '1-11.png'),
(12, 10, 'Kabel', 2, 'Unit', 50000, NULL, NULL),
(14, 10, 'Kabel', 2, 'Unit', 50000, NULL, NULL),
(16, 0, 'Kabel', 2, 'Unit', 500000, NULL, NULL),
(17, 4, 'Kabel', 2, 'Unit', 5000, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `direktur`
--

CREATE TABLE `direktur` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(15) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `foto` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `direktur`
--

INSERT INTO `direktur` (`id`, `username`, `email`, `password`, `nik`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `hp`, `pekerjaan`, `pendidikan`, `agama`, `jenis_kelamin`, `foto`, `status`, `level`, `created_at`, `created_by`) VALUES
(11, 'direktur', '', '01425e4e021748f61f2b77becb81b9c2d397ed5fb2bd2bd25f818b15fb69d4f0e5fb41130b746cff4528cf56d86d50444f1fb1338589276b7bccd78cf0b93ecd', '1235678', 'Direktur', 'Serang', '1997-02-01', 'Kele', '', '', 'SD Sederajat', '', 'Laki-Laki', '.jpg', 'Aktif', 3, '2020-06-17 12:25:09', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(15) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `foto` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `username`, `email`, `password`, `nik`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `hp`, `jabatan`, `pendidikan`, `agama`, `jenis_kelamin`, `foto`, `status`, `level`, `created_at`, `created_by`) VALUES
(11, 'karyawan', '', '01425e4e021748f61f2b77becb81b9c2d397ed5fb2bd2bd25f818b15fb69d4f0e5fb41130b746cff4528cf56d86d50444f1fb1338589276b7bccd78cf0b93ecd', '1235678598895552', 'Karyawan', 'Serang', '1997-02-01', 'Kele', '6258855522200', 'Bendahara', 'D2', 'Islam', 'Laki-Laki', '12356785988955522.png', 'Aktif', 2, '2020-06-28 10:31:44', 11),
(12, 'admin', 'username@gmail.com', '01425e4e021748f61f2b77becb81b9c2d397ed5fb2bd2bd25f818b15fb69d4f0e5fb41130b746cff4528cf56d86d50444f1fb1338589276b7bccd78cf0b93ecd', '5855555555555555', 'Siapa Aja', 'Serang', '1997-02-08', 'asd', '089676490971', 'Staff', 'S1', 'Islam', 'Laki-Laki', '58555555555555555.png', 'Aktif', 2, '2020-06-28 07:52:27', 11),
(13, 'username', 'usasd@gmail.com', '01425e4e021748f61f2b77becb81b9c2d397ed5fb2bd2bd25f818b15fb69d4f0e5fb41130b746cff4528cf56d86d50444f1fb1338589276b7bccd78cf0b93ecd', '3604042020301565', 'Nama Lengkap', 'Serang', '1989-02-08', 'asdasdsa', '6289676490958', 'Staff', 'D2', 'Islam', 'Laki-Laki', '360_4042_0203_0123_12.png', 'Aktif', 2, '2020-06-28 10:33:36', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(150) NOT NULL,
  `link` varchar(200) NOT NULL,
  `icon` varchar(150) NOT NULL,
  `sub_menu` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `warna` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `nama_menu`, `link`, `icon`, `sub_menu`, `level`, `warna`) VALUES
(1, 'Dashboard', 'Dashboard', 'fas fa-tachometer-alt', 0, 1, 'text-warning'),
(3, 'Profil', 'Profil', 'fas fa-id-card-alt', 0, 1, 'text-primary'),
(4, 'Pengajuan Advance', 'Pengajuan_Advance', 'fab fa-angular', 0, 1, 'text-success'),
(5, 'Pengajuan Expanse', 'Pengajuan_Expanse', 'fas fa-balance-scale', 0, 1, 'text-danger'),
(25, 'Daftar Karyawan', 'Daftar_Karyawan', 'fas fa-people-arrows', 0, 1, 'text-secondary'),
(26, 'Settings', 'Settings', 'fas fa-tools', 0, 1, 'text-info'),
(27, 'Dashboard', 'Dashboard', 'fas fa-tachometer-alt', 0, 2, 'text-warning'),
(28, 'Profil', 'Profil', 'fas fa-id-card-alt', 0, 2, 'text-primary'),
(29, 'Pengajuan Advance', 'Pengajuan_Advance', 'fab fa-angular', 0, 2, 'text-success'),
(30, 'Pengajuan Expanse', 'Pengajuan_Expanse', 'fas fa-balance-scale', 0, 2, 'text-danger');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL,
  `no_pengajuan` varchar(30) NOT NULL,
  `tgl_pengajuan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jumlah_uang` bigint(20) NOT NULL,
  `status` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `no_pengajuan`, `tgl_pengajuan`, `jumlah_uang`, `status`, `id_karyawan`, `keterangan`) VALUES
(1, '01/e-Budget/VI/2020', '2020-06-23 19:17:53', 50000, 3, 11, 'Biaya Maintenance PT....'),
(2, '02/e-Budget/VI/2020', '2020-06-24 14:15:38', 600000, 3, 11, 'Biyay'),
(3, '03/e-Budget/VI/2020', '2020-06-24 14:19:21', 400000, 0, 11, 'SayangBanget'),
(4, '04/e-Budget/VI/2020', '2020-06-24 14:21:02', 58879, 0, 11, 'jhasdjas'),
(5, '05/e-Budget/VI/2020', '2020-06-24 14:21:58', 566465, 0, 11, 'asdasd'),
(6, '06/e-Budget/VI/2020', '2020-06-24 14:26:04', 78788, 0, 11, 'asdasdas'),
(7, '07/e-Budget/VI/2020', '2020-06-24 14:27:19', 522266, 0, 11, 'asdassdgsfgs'),
(8, '08/e-Budget/VI/2020', '2020-06-24 14:28:22', 8258886, 0, 11, 'assdjskjdf'),
(9, '09/e-Budget/VI/2020', '2020-06-24 14:29:09', 8556, 0, 11, 'asfbvbxcxcv'),
(10, '10/e-Budget/VI/2020', '2020-06-24 14:31:07', 555554, 0, 11, 'ahgsdhgasdghjasd'),
(11, '11/e-Budget/VI/2020', '2020-06-24 19:02:16', 5000000, 0, 11, 'Oke Banget'),
(12, '12/e-Budget/VI/2020', '2020-06-24 19:02:51', 25000, 0, 11, 'lumayan beli rokok'),
(13, '13/e-Budget/VI/2020', '2020-06-24 19:03:54', 65000, 0, 11, 'Oke Sayang'),
(14, '14/e-Budget/VI/2020', '2020-06-24 19:05:24', 56200, 0, 11, 'asdasd'),
(15, '15/e-Budget/VI/2020', '2020-06-24 19:05:46', 65014, 0, 11, 'sdfgdfre'),
(16, '16/e-Budget/VI/2020', '2020-06-24 19:06:23', 65000, 0, 11, 'adasdasd'),
(17, '17/e-Budget/VI/2020', '2020-06-24 19:07:41', 6500000, 0, 11, '600000'),
(18, '18/e-Budget/VI/2020', '2020-06-24 19:08:34', 6500, 0, 11, 'Ayoo'),
(19, '19/e-Budget/VI/2020', '2020-06-25 07:21:49', 2000, 0, 11, 'asdasd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `nama_akses` varchar(150) NOT NULL,
  `level` int(11) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_group`
--

INSERT INTO `user_group` (`id`, `nama_akses`, `level`, `link`) VALUES
(1, 'Administrator', 1, 'admin'),
(2, 'Karyawan', 2, 'karyawan'),
(3, 'Direktur', 3, 'direktur');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_pengajuan`
--
ALTER TABLE `detail_pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `direktur`
--
ALTER TABLE `direktur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `detail_pengajuan`
--
ALTER TABLE `detail_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `direktur`
--
ALTER TABLE `direktur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
