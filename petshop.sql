-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 16, 2019 at 06:10 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

DROP TABLE IF EXISTS `pets`;
CREATE TABLE IF NOT EXISTS `pets` (
  `petID` varchar(20) NOT NULL,
  `petType` varchar(50) NOT NULL,
  `petgender` varchar(20) NOT NULL,
  `petAge` int(11) NOT NULL,
  `registerStatus` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`petID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`petID`, `petType`, `petgender`, `petAge`, `registerStatus`, `username`) VALUES
('D102', 'Tiger', 'Female', 7, 'Incomplete', 'puvendra_dasan'),
('C1523', 'Rabbit', 'Female', 8, 'Approved', 'puvendra_dasan'),
('A123', 'Parrot', 'Male', 5, 'Approved', 'Yuga10'),
('B145', 'Kangaroo', 'Male', 12, 'Incomplete', 'Yuga10'),
('R781', 'Hamster', 'Male', 3, 'Incomplete', 'puvendra_dasan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type_user` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`, `type_user`) VALUES
('Yuga10', 'yugathesyuga@gmail.com', 'abcd1234', 'Admin'),
('dc96059', 'puvendradasan1699@gmail.com', 'yuga', 'Owner'),
('puvendra_dasan', 'abcdW@gmail.com', 'puven', 'Owner'),
('Pave', 'pavitheran@gmail.com', 'pave', 'Admin'),
('yuven', 'mac.yuven@gmail.com', 'yuven', 'Owner'),
('kushala12', 'kushala12@gmail.com', '1111', 'Admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
