-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Sep 2019 pada 19.02
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `risetpens`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `saldo` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `usersadmin`
--

CREATE TABLE `usersadmin` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bagian` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telp` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `usersadmin`
--

INSERT INTO `usersadmin` (`id`, `nama_lengkap`, `alamat`, `bagian`, `telp`, `email`, `username`, `password`) VALUES
(5, 'ilham fatkur', 'Babatan 3c No12 Kec Wiyung', 'HRRD', '081332214377', 'ideveloper210698@gmail.com', 'ilham', '53L9db0sHmYVSKTGXqvfchycN3jGoXtdDWpLOYI561xVhcAPYonI0T51vWJyXe7E'),
(7, 'Puspita', 'Wiyung', 'SDM', '0813322143324', 'ideveloper210698@gmail.com', 'puspita', 'QKbAI17W4yOSZRWxdoLXGiry4WDC7bsfibLg1Ou568JsgLF7eU+10r/5FTajbrIt'),
(8, 'Eko Febri', 'Manukan', 'HRD', '081332214377', 'ideveloper210698@gmail.com', 'eko', 'QKbAI17W4yOSZRWxdoLXGiry4WDC7bsfibLg1Ou568JsgLF7eU+10r/5FTajbrIt'),
(9, 'Dini Adiarnita', 'Penjaringan', '', '081332214377', 'ideveloper210698@gmail.com', 'dini', 'QKbAI17W4yOSZRWxdoLXGiry4WDC7bsfibLg1Ou568JsgLF7eU+10r/5FTajbrIt');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `usersadmin`
--
ALTER TABLE `usersadmin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `usersadmin`
--
ALTER TABLE `usersadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
