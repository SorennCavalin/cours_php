-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2022 at 11:10 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bijoux`
--

-- --------------------------------------------------------

--
-- Table structure for table `bijoux`
--

CREATE TABLE `bijoux` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bijoux`
--

INSERT INTO `bijoux` (`id`, `titre`, `description`, `date`) VALUES
(1, 'Bague', 'Bague Manon Or Blanc Oxyde De ', '2022-07-04'),
(2, 'Boucles D\'oreilles', 'Boucles D\'oreilles Puces Victoria Or Blanc Diamant', '2022-08-04'),
(3, 'Collier', 'Chaîne Imanie Maille Singapour Or Jaune', '2022-09-04'),
(4, 'Bracelet', 'Bracelet Jonc Brita Plaque Or Jaune', '2022-10-04'),
(5, 'Montre', 'Coffret De Montre Connectée Lotus Smart Watch', '2022-11-04'),
(6, 'Pendentif', 'Pendentif Or Jaune 375/1000 Tonneau Gravable', '2022-12-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bijoux`
--
ALTER TABLE `bijoux`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bijoux`
--
ALTER TABLE `bijoux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
