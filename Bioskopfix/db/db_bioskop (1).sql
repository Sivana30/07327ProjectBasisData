-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jun 2022 pada 09.36
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bioskop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `film`
--

CREATE TABLE `film` (
  `id_film` varchar(10) NOT NULL,
  `judul_film` varchar(30) NOT NULL,
  `durasi_film` int(10) NOT NULL,
  `sampul_film` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kursi`
--

CREATE TABLE `kursi` (
  `id_kursi` varchar(30) NOT NULL,
  `nama_kursi` varchar(30) NOT NULL,
  `status` enum('Tersedia','Tidak Tersedia') NOT NULL,
  `studio_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kursi`
--

INSERT INTO `kursi` (`id_kursi`, `nama_kursi`, `status`, `studio_id`) VALUES
('KRS01', '1A', 'Tidak Tersedia', 'STD1'),
('KRS02', '2A', 'Tidak Tersedia', 'STD1'),
('KRS03', '3A', 'Tidak Tersedia', 'STD1'),
('KRS04', '4A', 'Tidak Tersedia', 'STD1'),
('KRS05', '5A', 'Tersedia', 'STD1'),
('KRS06', '6A', 'Tersedia', 'STD1'),
('KRS07', '7A', 'Tersedia', 'STD1'),
('KRS08', '8A', 'Tersedia', 'STD1'),
('KRS09', '9A', 'Tersedia', 'STD1'),
('KRS10', '10A', 'Tersedia', 'STD1'),
('KRS11', '1B', 'Tidak Tersedia', 'STD1'),
('KRS12', '2B', 'Tersedia', 'STD1'),
('KRS13', '3B', 'Tersedia', 'STD1'),
('KRS14', '4B', 'Tersedia', 'STD1'),
('KRS15', '5B', 'Tersedia', 'STD1'),
('KRS16', '6B', 'Tersedia', 'STD1'),
('KRS17', '7B', 'Tersedia', 'STD1'),
('KRS18', '8B', 'Tersedia', 'STD1'),
('KRS19', '9B', 'Tersedia', 'STD1'),
('KRS20', '10B', 'Tersedia', 'STD1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(10) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `username`, `password`) VALUES
('pgw1', 'Amelia', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `studio`
--

CREATE TABLE `studio` (
  `id_studio` varchar(11) NOT NULL,
  `nama_studio` varchar(30) NOT NULL,
  `jadwal` varchar(50) NOT NULL,
  `film_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `studio`
--

INSERT INTO `studio` (`id_studio`, `nama_studio`, `jadwal`, `film_id`) VALUES
('STD1', 'Studio1', 'Jam 10:00 - 12:00', 'FLM00001'),
('STD2', 'Studio1', 'Jam 13:00 - 15:00', 'FLM00002'),
('STD3', 'Studio1', 'Jam 16:00 - 18:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` varchar(30) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `jumlah_tiket` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
