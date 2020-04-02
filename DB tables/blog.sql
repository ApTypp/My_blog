-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2020 at 08:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments`
(
    `id`            int(11)      NOT NULL,
    `post_id`       int(11)      NOT NULL,
    `author`        varchar(200) NOT NULL,
    `date_created`  varchar(200) NOT NULL,
    `comments_body` mediumtext   NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `date_created`, `comments_body`)
VALUES (3, 112, 'anonymous', '2017-10-13 19:50:45', 'first comment'),
       (10, 114, 'anonymous', '2017-10-13 23:07:38', 'heyyy'),
       (11, 115, 'anonymous', '2017-10-13 23:24:21', 'yee nigga'),
       (18, 112, 'anonymous', '2017-10-14 00:57:22', 'second comment'),
       (21, 116, 'anonymous', '2017-10-14 15:02:31', 'it works, really?'),
       (24, 118, 'anonymous', '2017-10-16 19:16:11', '123');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts`
(
    `id`            mediumint(9) NOT NULL,
    `title`         varchar(200) NOT NULL,
    `body`          longtext     NOT NULL,
    `date_created`  varchar(200) NOT NULL,
    `date_modified` varchar(200) NOT NULL,
    `author`        int(11)      NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `date_created`, `date_modified`, `author`)
VALUES (112, '?>\'\'123', 'dasda', '2017-10-13 00:03:57', '2017-10-13 00:14:01', 0),
       (114, 'Hello1',
        'Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello Hello hello ',
        '2017-10-13 17:43:27', '2017-10-17 20:24:10', 0),
       (115, 'Yoooo', 'Yoooooo Yoooooo Yoooooo Yoooooo Yoooooo Yoooooo Yoooooo Yoooooo Yoooooo ', '2017-10-13 19:10:13',
        '', 0),
       (118, '456', '789', '2017-10-14 17:51:38', '', 0),
       (121, 'test', 'test5', '2020-04-02 21:04:16', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users`
(
    `id`           int(11)      NOT NULL,
    `username`     varchar(20)  NOT NULL,
    `password`     varchar(255) NOT NULL,
    `date_created` varchar(200) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `date_created`)
VALUES (20, 'qwert', '$2y$07$f05a228e13b3d194af696OOk2w3jIIwsDJNiK8x4LmPfeWrXfvzE2', '2020-04-02 20:55:21');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote`
(
    `id`      int(11) NOT NULL,
    `post_id` int(11) NOT NULL,
    `user_id` int(11) NOT NULL,
    `status`  int(11) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`id`, `post_id`, `user_id`, `status`)
VALUES (0, 112, 20, 1),
       (0, 0, 0, 0),
       (0, 0, 0, -1),
       (0, 0, 0, 0),
       (0, 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 28;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
    MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 122;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
