-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2019 at 10:31 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ahbi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `user` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user`, `name`, `pass`) VALUES
('admin', 'admin', '111111');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` int(30) NOT NULL,
  `color` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `pic` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ID` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `color`, `qty`, `pic`) VALUES
(1, 'Bifold', 450000, 'Black', 10, 'upload/bifold-dark-1.jpg'),
(3, 'Box Belt', 1000000, 'Brown', 10, 'upload/box-belt-brown-1.jpg'),
(4, 'Box', 900000, 'Black', 10, 'upload/box-black-1.jpg'),
(5, 'Box', 900000, 'Brown', 10, 'upload/box-brown-1.jpg'),
(6, 'Box', 900000, 'Light Brown', 10, 'upload/box-lightbrown-1.jpg'),
(7, 'Card', 300000, 'Black', 20, 'upload/card-dark-1.jpg'),
(8, 'Card', 300000, 'Red', 20, 'upload/card-red-4.jpg'),
(9, 'Case', 350000, 'Black', 20, 'upload/case-dark.jpg'),
(10, 'Case', 350000, 'Brown', 20, 'upload/case-brown.jpg'),
(11, 'Case', 350000, 'Lavender', 20, 'upload/case-lavender.jpg'),
(12, 'Case', 350000, 'Pink', 20, 'upload/case-pink.jpg'),
(13, 'Case', 350000, 'Red', 20, 'upload/case-red.jpg'),
(14, 'Chic Cube', 1200000, 'Black', 10, 'upload/chic-cube-black-1.jpg'),
(15, 'Cross', 450000, 'Brown', 15, 'upload/cross-brown-1.jpg'),
(16, 'Cross', 450000, 'Navy', 15, 'upload/cross-darknavy-2.jpg'),
(17, 'Cross', 450000, 'Gray', 15, 'upload/cross-gray-1.jpg'),
(18, 'Element', 450000, 'Green', 20, 'upload/element-green.jpg'),
(19, 'Element', 450000, 'Gray', 20, 'upload/element-gray.jpg'),
(20, 'Lim Long', 1000000, 'Black', 15, 'upload/limlong-dark.jpg'),
(21, 'Lim Long', 1000000, 'Blue', 15, 'upload/limlong-blue.jpg'),
(22, 'Lim Long', 1000000, 'Gray', 15, 'upload/limlong-gray.jpg'),
(23, 'Lim Long', 1000000, 'Green', 15, 'upload/limlong-green.jpg'),
(24, 'Long ID', 1000000, 'Black', 15, 'upload/longid-dark-2.jpg'),
(25, 'Long ID', 1000000, 'Blue', 15, 'upload/longid-blue-2.jpg'),
(27, 'Mini', 350000, 'Black', 20, 'upload/mini-black-1.jpg'),
(28, 'Mini', 350000, 'Mint', 20, 'upload/mini-mint-1.jpg'),
(29, 'Mini', 350000, 'Gray', 20, 'upload/mini-lightgray-2.jpg'),
(30, 'Mini Wallet', 450000, 'Black', 30, 'upload/mini-wallet-black-1.jpg'),
(31, 'Mini Wallet', 450000, 'White', 30, 'upload/mini-wallet-white-1.jpg'),
(32, 'Mini Wallet', 450000, 'Pink', 30, 'upload/mini-wallet-pink-1.jpg'),
(33, 'Mini', 350000, 'White', 20, 'upload/mini-white-1.jpg'),
(34, 'V Bifold', 450000, 'Black', 20, 'upload/v-bifold-dark-2.jpg'),
(35, 'V Bifold', 450000, 'Green', 20, 'upload/v-bifold-green-2.jpg'),
(36, 'V Bifold', 450000, 'Red', 20, 'upload/v-bifold-red-1.jpg'),
(37, 'V Wallet', 1000000, 'Black', 20, 'upload/V-Wallet-dark-2.jpg'),
(38, 'V Wallet', 1000000, 'Green', 20, 'upload/V-Wallet-green-2.jpg'),
(39, 'V Wallet', 1000000, 'Red', 20, 'upload/V-Wallet-brown-1.jpg'),
(40, 'Wrist', 700000, 'Black', 30, 'upload/wrist-dark-1.jpg'),
(41, 'Wrist', 700000, 'Green', 30, 'upload/wrist-green-1.jpg'),
(42, 'Wrist', 700000, 'Red', 30, 'upload/wrist-red-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ord`
--

CREATE TABLE IF NOT EXISTS `ord` (
  `iduser` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `color` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `pic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ord`
--

INSERT INTO `ord` (`iduser`, `id`, `name`, `price`, `color`, `qty`, `pic`) VALUES
('anhthuu', 3, 'Box Belt', 1000000, 'Brown', 1, 'upload/box-belt-brown-1.jpg'),
('anhthuu', 5, 'Box', 900000, 'Brown', 1, 'upload/box-brown-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `user` varchar(20) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `dob` datetime NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`user`, `pass`, `name`, `dob`, `phone`, `email`) VALUES
('anhthuu', '141298', 'Thư', '1998-12-14 00:00:00', '0000000000', 'anhthu141298@gmail.com'),
('user1', '123456', 'user1', '2000-02-01 00:00:00', '1234567890', '123456@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
