-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2015 at 06:01 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `receipe`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE IF NOT EXISTS `ingredients` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`) VALUES
(7, 'Potato'),
(8, 'Tomato'),
(12, 'Onion'),
(23, 'Cheese'),
(28, 'Butter'),
(29, 'Bread'),
(30, 'Jam'),
(31, 'Rice'),
(32, 'Wheat Flour'),
(33, 'Egg');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `rId` int(11) NOT NULL,
  `recID` int(11) NOT NULL,
  `uId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rId`, `recID`, `uId`) VALUES
(15, 25, 2),
(16, 25, 3),
(17, 26, 2),
(18, 26, 3),
(19, 27, 2);

-- --------------------------------------------------------

--
-- Table structure for table `receipes`
--

CREATE TABLE IF NOT EXISTS `receipes` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `uid` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `imageName` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipes`
--

INSERT INTO `receipes` (`id`, `name`, `description`, `uid`, `rating`, `imageName`) VALUES
(25, 'Soup', '			Add Water', 1, 2, ''),
(27, 'Fried Rice', 'wvwevewvevewv', 1, 1, ''),
(35, 'Cake', '', 1, 0, ''),
(47, 'Sandwich', 'qacqcqcqcccc', 1, 0, 'image/sandwich1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `receipesingredients`
--

CREATE TABLE IF NOT EXISTS `receipesingredients` (
  `rId` int(11) NOT NULL,
  `ingId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipesingredients`
--

INSERT INTO `receipesingredients` (`rId`, `ingId`) VALUES
(10, 7),
(10, 8),
(10, 12),
(13, 7),
(13, 8),
(13, 12),
(13, 23),
(13, 28),
(14, 7),
(14, 8),
(14, 12),
(14, 23),
(14, 28),
(15, 7),
(15, 8),
(15, 12),
(15, 23),
(15, 28),
(16, 7),
(16, 8),
(16, 12),
(17, 7),
(17, 8),
(17, 12),
(18, 7),
(18, 8),
(18, 12),
(19, 7),
(19, 8),
(19, 12),
(20, 7),
(20, 8),
(20, 12),
(21, 7),
(21, 8),
(21, 12),
(22, 7),
(22, 8),
(22, 12),
(23, 7),
(23, 8),
(23, 12),
(24, 7),
(24, 8),
(24, 12),
(25, 7),
(25, 8),
(25, 12),
(26, 28),
(26, 29),
(27, 31),
(35, 28),
(35, 32),
(35, 33);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `password`) VALUES
(1, 'abc', 'admin', '12345'),
(2, 'xyz', 'user', '12345'),
(3, 'lmn', 'user', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rId`);

--
-- Indexes for table `receipes`
--
ALTER TABLE `receipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `receipes`
--
ALTER TABLE `receipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
