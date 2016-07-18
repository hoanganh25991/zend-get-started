-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2016 at 09:44 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rooms`
--

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `roomid` int(11) NOT NULL AUTO_INCREMENT,
  `roomname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`roomid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomid`, `roomname`, `description`, `created`) VALUES
(6, 'Room 01', 'Life creation', '2016-07-04 00:00:00'),
(7, 'Room 02', 'Life creation', '2016-07-04 00:00:00'),
(8, 'Room 03', 'Ejic', '2016-07-04 00:00:00'),
(9, 'Room 04', 'ejic', '2016-07-04 00:00:00'),
(10, 'Room 05', 'Ejic', '2016-07-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `id` char(32) NOT NULL DEFAULT '',
  `name` char(32) NOT NULL DEFAULT '',
  `modified` int(11) DEFAULT NULL,
  `lifetime` int(11) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `name`, `modified`, `lifetime`, `data`) VALUES
('44ilv65141bned7dqqhnk3ddn7', 'my_storage_namespace', 1468311001, 1440, '{"id":"9","username":"olahaha","ip_address":"::1","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/51.0.2704.103 Safari\\/537.36"}'),
('44ilv65141bned7dqqhnk3ddn7', 'my_storage_namespaceokaka', 1468299616, 1440, '{"id":"9","username":"olahaha","ip_address":"::1","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/51.0.2704.103 Safari\\/537.36"}'),
('bth8nudmg350mib7ikinhs0eq3', 'my_storage_namespace', 1468403241, 1440, '{"id":"9","username":"olahaha","ip_address":"::1","user_agent":"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/51.0.2704.103 Safari\\/537.36"}');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `names` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `names`, `password`, `email`, `level`, `department`, `created`) VALUES
(1, 'ltda-IT', 'Le Tuan Duy Anh', '123456', 'duyanh@gmail.com', 'admin', 'IT', '2016-07-04 08:28:57'),
(2, 'hungbn2', 'Bui Nhu Hung', '123456', 'nhuhung@gmail.com', 'admin', 'IT', '2016-07-04 08:28:49'),
(3, 'lnh-QL', 'Le Nam Hai', '123456', 'namhai@gmail.com', 'member', 'IT', '2016-07-04 09:07:00'),
(8, 'mahoamd01', 'mahoamad', '123456', 'wer@gmail.com', 'member', 'sale', '2016-07-04 09:07:36'),
(9, 'olahaha', 'oal ka ba', '123456', 'oaka@gamil.com', 'member', 'IT', '2016-07-04 09:07:08');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
