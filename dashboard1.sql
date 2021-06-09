-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 28, 2019 at 01:39 AM
-- Server version: 5.7.24-log
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dashboard1`
--

-- --------------------------------------------------------

--
-- Table structure for table `databuku`
--

CREATE TABLE `databuku` (
  `id` int(11) NOT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `judulbuku` varchar(100) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahunterbit` int(5) NOT NULL,
  `ISBN` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `databuku`
--

INSERT INTO `databuku` (`id`, `id_cat`, `judulbuku`, `penulis`, `penerbit`, `tahunterbit`, `ISBN`) VALUES
(1, 1, 'A Darker Shade of Magic - Sihir Kelam', 'V.E.SCHWAB', 'Gramedia Pustaka Utama', 2019, 9786020623320),
(7, 2, 'Good Bye Day', 'Arnold Leonard', 'Anugrah Publisher', 2018, 9786926409621),
(9, 1, 'TherMelian - Revelation', 'Shenny MS', 'Elex Media Komputindo', 2018, 9786020292021),
(10, 1, 'TherMelian - Chronicle', 'Shenny MS', 'Elex Media Komputindo', 2018, 9786020292076),
(11, 1, 'TherMelian - Recollection', 'Shenny MS', 'Elex Media Komputindo', 2018, 9786020312658),
(12, 2, 'Kisses to Remember', 'kurumi Tasaki', 'Gramedia Pustaka Utama', 2017, 9786024282875),
(13, 2, 'Salju Pertama Di Hokkaido', 'Angelique Puspadewi', 'Gramedia Pustaka Utama', 2017, 9786020376684),
(14, 4, 'Psychic Detective Yakumo - The Light Beyond the Darkness', 'Manabu Kaminaga', 'Clover', 2017, 9786024280185),
(15, 4, 'Pshycic Detective Yakumo - Connected Feelings', 'Manabu Kaminaga', 'Clover', 2017, 978602428446),
(16, 2, 'Tulisan Ghani', 'Radin Azkia', 'Loveable', 2018, 9786025406540650),
(17, 2, 'I Want to Eat Your Pancreas - kimi no suizou wo tabetai', 'Sumino Yoru', 'Penerbit Haru', 2018, 9786026383457),
(18, 3, 'Garis Waktu', 'Fiersa Besari', 'Mediakita', 2018, 9789797945921),
(20, 4, 'Ryugajou Nanana Burried Treasure', 'Ootorino Kazuma', 'Shining Rose Media', 2016, 978602735840),
(21, 3, 'Candid', 'Obata Yasumi', 'Shining Rose Media', 2017, 986021831694),
(22, 2, 'Cloud Above My bed', 'Malashantii', 'Elex Media Komputindo', 2018, 9786020497921),
(23, 6, 'Salah Jurusan - Tentukan Pilihan, Temukan Tujuan', 'Rusydan Ubaidi Hamdani', 'Transmedia', 2014, 978602103601),
(24, 5, 'Tips dan Trik Jaringan Wireless', 'Victoria', 'Elex Media Komputindo', 2014, 9786020261820),
(25, 5, 'Java Untuk Pemula', 'Jubilee Enterprise', 'Elex Media Komputindo', 2014, 9786020255453),
(26, 5, ' 24 Jam Belajar PHP', 'Edy Winarno ST, M.Eng', 'Elex Media Komputindo', 2014, 9786020249483),
(27, 6, 'Goodbye, Things: Hidup Minimalis ala Orang Jepang', 'Fumio Sasaki', 'Gramedia Pustaka Utama', 2018, 9786020398402),
(28, 6, 'Sebuah Seni untuk Bersikap bodo amat', 'mark manson', 'Gramedia Pustama Utama', 2018, 9786024526986),
(32, 5, 'Kolaborasi Code Igniter dan AJAX dalam Perancangan CMS', 'Anton Subagia', 'Elex Media Komputindo', 2018, 9786020459332),
(34, 5, 'Membangun Aplikasi Web dengan Metode OOP ', 'Anton Subagia', 'Elex Media Komputindo', 2018, 9786020457413);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_cat` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_cat`, `nama_kategori`) VALUES
(1, 'Fantasi'),
(3, 'Fiksi'),
(4, 'Mystery'),
(6, 'Non-Fiksi'),
(2, 'Romance'),
(5, 'Teknologi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Username`, `Email`, `Password`) VALUES
(5, 'admin', 'Admin@Admin.com', '$2y$10$wJ28uVxsb42/A/nqNmiBsux8wUlQd/3v6larL6d4RqfwdHf8iswpO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `databuku`
--
ALTER TABLE `databuku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_cat`),
  ADD KEY `nama_kategori` (`nama_kategori`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `databuku`
--
ALTER TABLE `databuku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `databuku`
--
ALTER TABLE `databuku`
  ADD CONSTRAINT `kategori` FOREIGN KEY (`id_cat`) REFERENCES `kategori` (`id_cat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
