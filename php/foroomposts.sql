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
-- Table structure for table `foroomposts`
--

CREATE TABLE IF NOT EXISTS `foroomposts` (
  `id` int(11) NOT NULL,
  `info` text NOT NULL,
  `posterID` int(11) NOT NULL,
  `postdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foroomposts`
--

INSERT INTO `foroomposts` (`id`, `info`, `posterID`, `postdate`) VALUES
(1, 'HEP PLEASE', 1, '2017-05-30 04:26:17'),
(2, 'WCan someone please help me with the routing algorithm?', 1, '0000-00-00 00:00:00'),
(3, 'Is anyone home??', 1, '2017-05-30 04:43:58'),
(4, 'asdsadad', 1, '2017-05-30 04:46:33'),
(5, 'asdasda', 1, '2017-05-30 04:47:24'),
(6, 'Please i need help for the software', 1, '2017-05-30 04:48:35'),
(7, 'This one is kind of working', 1, '2017-05-30 04:49:01'),
(8, 'Kimdasda', 1, '2017-05-30 04:49:17'),
(9, 'When all is said and done....', 1, '2017-05-30 05:23:12'),
(10, 'All id dada', 1, '2017-05-30 05:24:26'),
(11, 'MY NAME IS MACHARTY. CAN I KNOW SOMEONE HERE??', 1, '2017-05-30 05:32:38'),
(12, 'rewerter', 1, '2017-05-30 11:17:58'),
(13, 'SADS', 1, '2017-05-30 13:05:23'),
(14, 'Testing after the reply feature', 1, '2017-05-30 13:54:59'),
(15, 'asfdghjkl', 1, '2017-05-30 14:00:52'),
(16, 'FRWRWER', 1, '2017-05-30 14:15:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foroomposts`
--
ALTER TABLE `foroomposts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foroomposts`
--
ALTER TABLE `foroomposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
