-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2018 at 02:29 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shopfreak`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cid` int(255) NOT NULL AUTO_INCREMENT,
  `uid` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `uid`, `pid`) VALUES
(3, 2, 2),
(4, 2, 4),
(5, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `oid` int(100) NOT NULL AUTO_INCREMENT,
  `uid` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `rid` int(100) NOT NULL,
  `invoice` int(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `uid`, `pid`, `rid`, `invoice`, `address`) VALUES
(1, 2, 2, 4, 0, '1433, K.G. Bose Nagar'),
(2, 2, 4, 4, 0, '1433, K.G. Bose Nagar'),
(3, 2, 4, 4, 0, '1433, K.G. Bose Nagar'),
(4, 2, 2, 4, 0, '1433, K.G. Bose Nagar'),
(5, 2, 4, 4, 0, '1433, K.G. Bose Nagar'),
(6, 2, 4, 4, 0, '1433, K.G. Bose Nagar'),
(7, 2, 2, 4, 0, '1433, K.G. Bose Nagar'),
(8, 2, 4, 4, 45, '1433, K.G. Bose Nagar'),
(9, 2, 4, 4, 45, '1433, K.G. Bose Nagar');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `pid` int(100) NOT NULL AUTO_INCREMENT,
  `rid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `type` varchar(100) NOT NULL,
  `image` longblob,
  `price` varchar(10000) NOT NULL,
  `upload_date` date DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `rid`, `name`, `company`, `description`, `type`, `image`, `price`, `upload_date`) VALUES
(1, 4, 'ds', 'sd', 'd', 'shades', NULL, '5354', NULL),
(2, 4, 'sdf', 'sdf', 'dsf', 'mtshirt', NULL, 'sdf', NULL),
(3, 4, 'j', 'kh', 'kh', 'mtshirt', NULL, 'kh', '2018-03-27'),
(4, 4, 'mn', 'jj', 'lknl', 'mtshirt', NULL, '45', '2018-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `uid` int(255) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`uid`, `first_name`, `last_name`, `username`, `password`, `address`, `type`) VALUES
(2, 'Vedant', 'Jain', 'vedantjain.jain@gmail.com', '$2y$10$3XJu7ioM1POTDKng1Mkg8eDPLyUcOSdbm8xB1AOjXq/FVVICRkxBm', '1433, K.G. Bose Nagar', 'customer'),
(3, 'Keshav', 'Sharma', 'k@gmail.com', '$2y$10$u60.Dr9kz.6Uws8KUsToVubgPtekOazMgTNE3IejyYVfkDjCJ94/K', 'urfitgouygiuyb', 'customer'),
(4, 'Vedant', 'Jain', 'retailer@gmail.com', '$2y$10$Wq2t1o5FT1g0bXxcl6o02uzXlB7TrfxQ58/WJqLhy3BLzluSesTUK', '1433, K.G. Bose Nagar', 'retailer');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
