-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Mei 2020 pada 02.12
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dblatihan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `progclass_perpustakaan`
--

CREATE TABLE IF NOT EXISTS `progclass_perpustakaan` (
  `id` int(11) NOT NULL,
  `isbn` varchar(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `progclass_perpustakaan`
--

INSERT INTO `progclass_perpustakaan` (`id`, `isbn`, `judul`, `pengarang`, `penerbit`) VALUES
(1, '110-912', 'Filosofi Teras', 'Henry Manampiring', 'Buku Kompas'),
(2, '012-323', 'Think & Grow Rich', 'Napoleon Hill', 'Gramedia'),
(3, '391-282', 'Start With Why', 'Simon Sinek', 'Bukukita'),
(4, '612-051', 'Psychology of Money ', 'Morgan Housel', 'Gramedia Digital');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `progclass_perpustakaan`
--
ALTER TABLE `progclass_perpustakaan`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `progclass_perpustakaan`
--
ALTER TABLE `progclass_perpustakaan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
