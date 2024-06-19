-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Bulan Mei 2024 pada 21.40
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dkp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` char(36) NOT NULL,
  `nama_menu` varchar(60) NOT NULL,
  `kategori_menu` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `deskripsi_menu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id` char(36) NOT NULL,
  `id_user` char(36) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `banyak_pengunjung` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `status_booking` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`id`, `id_user`, `tanggal`, `waktu`, `banyak_pengunjung`, `pesan`, `bukti_pembayaran`, `status_booking`) VALUES
('cf1ee576-1222-11ef-a5b9-74d4dd0c3086', '9a4b2c38-1221-11ef-a5b9-74d4dd0c3086', '2024-05-15', '01:50:00', 2, 'test', 'bukti transfer workshop.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` char(36) NOT NULL,
  `role` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `no_hp` varchar(60) NOT NULL,
  `alamat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `role`, `email`, `password`, `nama`, `no_hp`, `alamat`) VALUES
('71f6eb5b-1221-11ef-a5b9-74d4dd0c3086', 'admin', 'rafi@gmail.com', '$2y$10$c8DLAl7e3BNUB5taX1AN5.XPdxawpeBOXlhLDoAjhfk9huepwn1.u', 'Rafi', '086799867557', 'jalan ciremai ujung'),
('9a4b2c38-1221-11ef-a5b9-74d4dd0c3086', 'orderer', 'user@gmail.com', '$2y$10$c8DLAl7e3BNUB5taX1AN5.XPdxawpeBOXlhLDoAjhfk9huepwn1.u', 'User Test', '086782424', 'Jl Test');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `reservasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
