-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Feb 2021 pada 04.24
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_products`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `category` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `name`, `category`, `price`, `qty`) VALUES
(1, 'Matematika', 'Buku', 10000, 1),
(2, 'IPA', 'Buku', 10000, 5),
(3, 'Algoritma dan Pemrograman', 'Buku', 100000, 10),
(4, 'Struktur Data', 'Buku', 100000, 5),
(5, 'Harddisk 1TB', 'Komputer', 650000, 2),
(20, 'PHP 7', 'Buku', 120000, 2),
(21, 'Python 3', 'Buku', 200000, 5),
(22, 'RAM 8GB', 'Komputer', 300000, 7),
(23, 'Dilan 1990', 'Buku', 110000, 13),
(27, 'Dilan 1991', 'Buku', 125000, 15),
(28, 'Monitor LG', 'Komputer', 1000000, 3),
(39, 'Panci', 'Alat Dapur', 50000, 12),
(41, 'Kulkas', 'Peralatan', 250000, 2),
(42, 'Setrika', 'Alat Rumah Tangga', 120000, 5),
(44, 'Baskom', 'Alat Dapur', 10000, 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `nama`, `email`) VALUES
(1, 'Muhamad Jukahpin', 'muhamadjukahpin@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
