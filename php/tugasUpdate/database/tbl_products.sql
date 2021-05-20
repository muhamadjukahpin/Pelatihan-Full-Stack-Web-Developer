-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Feb 2021 pada 15.35
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
(6, 'PHP 7', 'Buku', 120000, 2),
(7, 'Python 3', 'Buku', 200000, 5),
(8, 'RAM 8GB', 'Komputer', 300000, 7),
(9, 'Dilan 1990', 'Buku', 110000, 13),
(10, 'Dilan 1991', 'Buku', 125000, 15),
(11, 'Monitor LG', 'Komputer', 1000000, 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
