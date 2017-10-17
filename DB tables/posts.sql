-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2017 at 07:26 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` mediumint(9) NOT NULL,
  `title` varchar(200) NOT NULL,
  `body` longtext NOT NULL,
  `date_created` varchar(200) NOT NULL,
  `date_modified` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `date_created`, `date_modified`) VALUES
(112, '?>\'\'123', 'dasda', '2017-10-13 00:03:57', '2017-10-13 00:14:01'),
(114, 'Hello1', 'Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello ', '2017-10-13 17:43:27', '2017-10-17 20:24:10'),
(115, 'Yoooo', 'Yoooooo Yoooooo Yoooooo Yoooooo Yoooooo Yoooooo Yoooooo Yoooooo Yoooooo ', '2017-10-13 19:10:13', ''),
(118, '456', '789', '2017-10-14 17:51:38', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
