-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2020 pada 21.43
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.14

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
(11, 'admin', '', '01425e4e021748f61f2b77becb81b9c2d397ed5fb2bd2bd25f818b15fb69d4f0e5fb41130b746cff4528cf56d86d50444f1fb1338589276b7bccd78cf0b93ecd', '1235678', 'Administrator', 'Serang', '1997-02-01', 'Kele', '', '', 'SD Sederajat', '', 'Laki-Laki', 'admin.png', 'Aktif', 1, '2020-06-17 12:25:09', 1);

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
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pengajuan`
--

INSERT INTO `detail_pengajuan` (`id`, `id_pengajuan`, `deskripsi`, `qty`, `satuan`, `biaya`, `status_detail`, `foto`) VALUES
(1, 1, 'Tiket Pesawat', 5, 'Pcs', 2000000, 1, '1-1.jpg'),
(2, 1, 'Makan', 5, 'Pcs', 200000, 0, NULL),
(3, 1, 'Makan', 5, 'Pcs', 200000, 0, NULL),
(4, 1, 'Makan', 5, 'Pcs', 200000, 0, NULL),
(5, 1, 'Makan', 5, 'Pcs', 200000, 0, NULL),
(6, 1, 'Makan', 5, 'Pcs', 200000, 0, NULL),
(7, 1, 'Makan', 5, 'Pcs', 200000, 0, NULL),
(8, 1, 'Makan', 5, 'Pcs', 200000, 0, NULL),
(9, 1, 'Makan', 5, 'Pcs', 200000, 0, NULL),
(10, 1, 'Makan', 5, 'Pcs', 200000, 0, NULL),
(11, 1, 'Makan', 5, 'Pcs', 200000, 0, NULL),
(12, 1, 'Makan', 5, 'Pcs', 200000, 0, NULL),
(13, 1, 'Makan', 5, 'Pcs', 200000, 0, NULL),
(14, 1, 'Makan', 5, 'Pcs', 200000, 0, NULL),
(15, 1, 'Makan', 5, 'Pcs', 200000, 0, NULL),
(16, 1, 'Makan', 5, 'Pcs', 200000, 0, NULL),
(17, 1, 'Makan', 5, 'Pcs', 200000, 0, NULL),
(18, 1, 'Makan', 5, 'Pcs', 200000, 0, NULL),
(19, 1, 'Makan', 5, 'Pcs', 200000, 0, NULL),
(20, 1, 'Makan', 5, 'Pcs', 200000, 0, NULL),
(21, 1, 'Makan', 5, 'Pcs', 200000, 0, NULL),
(22, 1, 'Makan', 5, 'Pcs', 200000, 1, '1-22.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `direktur`
--

CREATE TABLE `direktur` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `direktur`
--

INSERT INTO `direktur` (`id`, `username`, `email`, `password`, `nama_lengkap`, `foto`, `status`, `level`, `created_at`, `created_by`) VALUES
(0, 'direktur', 'direktur@gmail.com', '01425e4e021748f61f2b77becb81b9c2d397ed5fb2bd2bd25f818b15fb69d4f0e5fb41130b746cff4528cf56d86d50444f1fb1338589276b7bccd78cf0b93ecd', 'Direktur', 'direktur.png', 'Aktif', 3, '2020-07-01 17:00:54', 11);

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
(4, 'Pengajuan Advance', 'Pengajuan_Advance', 'fab fa-angular', 0, 1, 'text-success'),
(5, 'Pengajuan Expanse', 'Pengajuan_Expanse', 'fas fa-balance-scale', 0, 1, 'text-danger'),
(25, 'Daftar Karyawan', 'Daftar_Karyawan', 'fas fa-people-arrows', 0, 1, 'text-secondary'),
(26, 'Buku Besar', 'Buku_Besar', 'fas fa-book', 0, 1, 'text-warning'),
(27, 'Dashboard', 'Dashboard', 'fas fa-tachometer-alt', 0, 2, 'text-warning'),
(28, 'Profil', 'Profil', 'fas fa-id-card-alt', 0, 2, 'text-primary'),
(29, 'Pengajuan Advance', 'Pengajuan_Advance', 'fab fa-angular', 0, 2, 'text-success'),
(30, 'Pengajuan Expanse', 'Pengajuan_Expanse', 'fas fa-balance-scale', 0, 2, 'text-danger'),
(31, 'Setting', 'Setting', 'fas fa-tools', 0, 1, 'text-primary'),
(32, 'Dashboard', 'Dashboard', 'fas fa-tachometer-alt', 0, 3, 'text-warning'),
(33, 'Pengajuan Advance', 'Pengajuan_Advance', 'fab fa-angular', 0, 3, 'text-success'),
(34, 'Pengajuan Expanse', 'Pengajuan_Expanse', 'fas fa-balance-scale', 0, 3, 'text-danger'),
(35, 'Daftar Karyawan', 'Daftar_Karyawan', 'fas fa-people-arrows', 0, 3, 'text-secondary'),
(36, 'Buku Besar', 'Buku_Besar', 'fas fa-book', 0, 3, 'text-warning');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL,
  `no_pengajuan` varchar(30) NOT NULL,
  `tgl_pengajuan` datetime NOT NULL DEFAULT current_timestamp(),
  `jumlah_uang` bigint(20) NOT NULL,
  `status` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `no_pengajuan`, `tgl_pengajuan`, `jumlah_uang`, `status`, `id_karyawan`, `keterangan`) VALUES
(1, '01/e-Budget/VII/2020', '2020-07-05 01:18:56', 10000000, 4, 11, 'Tranportasi Malaysia\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kec` varchar(100) NOT NULL,
  `saldo_awal` bigint(20) NOT NULL,
  `pimpinan` int(11) NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `nama_perusahaan`, `alamat`, `provinsi`, `kota`, `kec`, `saldo_awal`, `pimpinan`, `logo`) VALUES
(0, 'PT. Anexco', 'Jl. Raya Jalan', 'Banten', 'Serang', 'Kramatwatu', 50500000, 0, 'Perusahaan2.png');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
