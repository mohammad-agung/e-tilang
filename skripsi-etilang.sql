-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Sep 2020 pada 10.57
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi-etilang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kesatuan`
--

CREATE TABLE `tbl_kesatuan` (
  `id_kesatuan` int(11) NOT NULL,
  `nama_kesatuan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_kesatuan`
--

INSERT INTO `tbl_kesatuan` (`id_kesatuan`, `nama_kesatuan`, `alamat`, `status`) VALUES
(4, 'POLRES Palu', 'Jalan Taman Gor Palu, Sulawesi Tengah', 1),
(6, 'POLRES Sigi', '', 1),
(7, 'POLRES Donggala', '', 1),
(8, 'POLRES parimo', '', 1),
(9, 'POLRES Poso', '', 1),
(10, 'POLRES Morowali', '', 1),
(11, 'POLRES Morowali Utara', '', 1),
(12, 'POLRES Touna', '', 1),
(13, 'POLRES Banggai', '', 1),
(14, 'POLRES Bangkep', '', 1),
(15, 'POLRES Toli-Toli', '', 1),
(16, 'POLRES Buol', '', 1),
(24, 'DITALANTAS POLDA Sulteng', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelanggaran_r2r3`
--

CREATE TABLE `tbl_pelanggaran_r2r3` (
  `id_pelanggaran` bigint(20) NOT NULL,
  `nama_kesatuan` varchar(255) NOT NULL,
  `golongan_usia` varchar(50) NOT NULL,
  `jenis_roda` varchar(50) NOT NULL,
  `Helm_teguran` int(11) NOT NULL,
  `Helm_tilang` int(11) NOT NULL,
  `kecepatan_teguran` int(11) NOT NULL,
  `kecepatan_tilang` int(11) NOT NULL,
  `kelengkapan_teguran` int(11) NOT NULL,
  `kelengkapan_tilang` int(11) NOT NULL,
  `surat_surat_teguran` int(11) NOT NULL,
  `surat_surat_tilang` int(11) NOT NULL,
  `boncenganlebih_teguran` int(11) NOT NULL,
  `boncenganlebih_tilang` int(11) NOT NULL,
  `markarambu_teguran` int(11) NOT NULL,
  `markarambu_tilang` int(11) NOT NULL,
  `melawanarus_teguran` int(11) NOT NULL,
  `melawanarus_tilang` int(11) NOT NULL,
  `lampuutama_teguran` int(11) NOT NULL,
  `lampuutama_tilang` int(11) NOT NULL,
  `gunakanhp_teguran` int(11) NOT NULL,
  `gunakanhp_tilang` int(11) NOT NULL,
  `lain_lain_teguran` int(11) NOT NULL,
  `lain_lain_tilang` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelanggaran_r4`
--

CREATE TABLE `tbl_pelanggaran_r4` (
  `id_pelanggaran` bigint(20) NOT NULL,
  `nama_kesatuan` varchar(255) NOT NULL,
  `golongan_usia` varchar(50) NOT NULL,
  `jenis_kendaraan` varchar(255) NOT NULL,
  `kecepatan_teguran` int(11) NOT NULL,
  `kecepatan_tilang` int(11) NOT NULL,
  `kelengkapan_teguran` int(11) NOT NULL,
  `kelengkapan_tilang` int(11) NOT NULL,
  `surat_surat_teguran` int(11) NOT NULL,
  `surat_surat_tilang` int(11) NOT NULL,
  `muatan_teguran` int(11) NOT NULL,
  `muatan_tilang` int(11) NOT NULL,
  `markarambu_teguran` int(11) NOT NULL,
  `markarambu_tilang` int(11) NOT NULL,
  `melawanarus_teguran` int(11) NOT NULL,
  `melawanarus_tilang` int(11) NOT NULL,
  `sabukeselamatan_teguran` int(11) NOT NULL,
  `sabukeselamatan_tilang` int(11) NOT NULL,
  `gunakanhp_teguran` int(11) NOT NULL,
  `gunakanhp_tilang` int(11) NOT NULL,
  `lain_lain_teguran` int(11) NOT NULL,
  `lain_lain_tilang` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL,
  `id_kesatuan` int(11) NOT NULL,
  `tanggal_buat` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_pembaruan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `level`, `id_kesatuan`, `tanggal_buat`, `tanggal_pembaruan`, `status`) VALUES
(17, 'admin', 'admin', '$2y$10$xEhVjwl/xa2Gc1qsx97Kk.yIAD/LqgXcTvT6xEfR12PmKAJ3K3vky', 'admin', 24, '2020-09-02 08:17:57', '2020-09-02 08:25:49', 1),
(18, 'user polres palu', 'user', '$2y$10$cF9RJWeYCsxcBfNYeaDjo.01cdk9S.FQJPElJlRQV3UCj8hHCt/t2', 'user', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(19, 'user POLRES Donggala', 'userdua', '$2y$10$38Vk1JgGF2./HHviVDDIPukc6eH6xDtKeLM/mQ6Az5eKZjaxjD6MK', 'user', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_kesatuan`
--
ALTER TABLE `tbl_kesatuan`
  ADD PRIMARY KEY (`id_kesatuan`);

--
-- Indeks untuk tabel `tbl_pelanggaran_r2r3`
--
ALTER TABLE `tbl_pelanggaran_r2r3`
  ADD PRIMARY KEY (`id_pelanggaran`);

--
-- Indeks untuk tabel `tbl_pelanggaran_r4`
--
ALTER TABLE `tbl_pelanggaran_r4`
  ADD PRIMARY KEY (`id_pelanggaran`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_kesatuan` (`id_kesatuan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_kesatuan`
--
ALTER TABLE `tbl_kesatuan`
  MODIFY `id_kesatuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tbl_pelanggaran_r2r3`
--
ALTER TABLE `tbl_pelanggaran_r2r3`
  MODIFY `id_pelanggaran` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_pelanggaran_r4`
--
ALTER TABLE `tbl_pelanggaran_r4`
  MODIFY `id_pelanggaran` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`id_kesatuan`) REFERENCES `tbl_kesatuan` (`id_kesatuan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
