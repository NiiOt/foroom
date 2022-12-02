-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2017 at 12:30 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eduhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `foroomreplies`
--

CREATE TABLE IF NOT EXISTS `foroomreplies` (
  `postID` int(11) NOT NULL,
  `info` text NOT NULL,
  `replierID` int(11) NOT NULL,
  `replydate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foroomreplies`
--

INSERT INTO `foroomreplies` (`postID`, `info`, `replierID`, `replydate`) VALUES
(1, 'Maybe we can try', 2, '2017-05-30 05:04:01'),
(13, 'adsaas', 2, '2017-05-30 13:43:57'),
(13, '                asdsadsadas', 2, '2017-05-30 13:46:07'),
(12, '                     dasdsadsa', 2, '2017-05-30 13:46:16'),
(11, '                     dsadsadas', 2, '2017-05-30 13:46:22'),
(10, '                     sadsadsad', 2, '2017-05-30 13:46:29'),
(8, '             no problem        ', 2, '2017-05-30 13:47:01'),
(7, '  gfdfgdhfgn', 2, '2017-05-30 13:47:13'),
(7, '                     ;lkjhgfds', 2, '2017-05-30 13:47:22'),
(6, 'kjhgfdsasdfghj', 2, '2017-05-30 13:47:39'),
(5, 'lkjhgfdsa', 2, '2017-05-30 13:47:49'),
(7, '                     ;lkjhgfdsa', 2, '2017-05-30 13:47:59'),
(7, 'aLL IS WELL', 2, '2017-05-30 13:48:16'),
(7, 'DASDASLJN', 2, '2017-05-30 13:50:37'),
(3, 'ASDSADAS', 2, '2017-05-30 13:51:08'),
(3, 'Yh ', 2, '2017-05-30 13:51:57'),
(3, 'sdadas', 2, '2017-05-30 13:54:19'),
(4, 'fsadas', 2, '2017-05-30 13:54:33'),
(14, 'asdas\n', 2, '2017-05-30 13:56:35'),
(15, 'zxcvxxcvxvvcx', 2, '2017-05-30 14:00:59'),
(16, 'WERQQEQW', 2, '2017-05-30 14:15:49'),
(14, 'JIIMIM', 2, '2017-05-30 14:46:16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
