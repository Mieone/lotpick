-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2018 at 01:12 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lara_auth`
--

-- --------------------------------------------------------

--
-- Table structure for table `gp_details`
--

CREATE TABLE IF NOT EXISTS `gp_details` (
  `gp_id` int(10) NOT NULL AUTO_INCREMENT,
  `vendor_id` varchar(250) NOT NULL,
  `gp_name` varchar(250) NOT NULL,
  `received_at` date NOT NULL,
  `status` int(10) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`gp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `gp_details`
--

INSERT INTO `gp_details` (`gp_id`, `vendor_id`, `gp_name`, `received_at`, `status`, `created_date`) VALUES
(1, 'Head Run ', 'GP 10', '2018-09-25', 1, '2018-09-26 17:42:27'),
(2, 'My cafe', 'G 09', '2018-09-26', 1, '2018-09-26 18:29:33'),
(3, 'Presentience', 'Gp11', '2018-09-26', 1, '2018-09-26 18:51:55'),
(4, 'Head Run ', 'Gp 456', '2018-09-27', 1, '2018-09-27 12:27:03'),
(5, 'Presentience', 'q123', '2018-09-27', 1, '2018-09-27 12:32:43'),
(6, 'Presentience', 'gp123', '2018-09-27', 1, '2018-09-27 12:43:12'),
(7, 'Presentience', 'test Gp', '2018-09-27', 1, '2018-09-27 12:52:35'),
(8, 'My cafe', 'Fp 12', '2018-09-27', 1, '2018-09-27 14:09:10'),
(9, 'My cafe', '12gp', '2018-09-27', 1, '2018-09-27 14:38:39'),
(10, 'Presentience', 'Gw', '2018-09-27', 1, '2018-09-27 17:02:29'),
(11, 'My cafe', 'q234', '2018-09-27', 1, '2018-09-27 17:21:25'),
(12, 'My cafe', '123we', '2018-09-27', 1, '2018-09-27 18:14:00'),
(13, 'My cafe', 'gp qw', '2018-09-27', 1, '2018-09-27 18:38:39'),
(14, 'Head Run ', '12 gp', '2018-09-27', 1, '2018-09-27 18:41:21'),
(15, 'My cafe', 'bp 123', '2018-09-27', 1, '2018-09-27 18:52:35'),
(16, 'My cafe', 'q12a', '2018-09-28', 1, '2018-09-28 12:44:19'),
(17, 'My cafe', 'cafe 12', '2018-09-28', 1, '2018-09-28 14:30:24');

-- --------------------------------------------------------

--
-- Table structure for table `lat_locations`
--

CREATE TABLE IF NOT EXISTS `lat_locations` (
  `lat_loc_id` int(10) NOT NULL AUTO_INCREMENT,
  `lat_id` varchar(250) NOT NULL,
  `location_id` varchar(250) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(10) NOT NULL DEFAULT '1' COMMENT '1=>Not picked, 2=>Picked Up',
  `picked_date` datetime DEFAULT NULL,
  PRIMARY KEY (`lat_loc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `lat_locations`
--

INSERT INTO `lat_locations` (`lat_loc_id`, `lat_id`, `location_id`, `created_date`, `status`, `picked_date`) VALUES
(1, 'L05', 'dfsfs', '2018-09-26 17:44:59', 1, NULL),
(2, 'L 01', 'hyd', '2018-09-26 17:47:14', 1, NULL),
(3, 'L 02', 'hyd2', '2018-09-26 18:14:43', 1, NULL),
(4, 'L 03', 'hyd3', '2018-09-26 18:15:44', 1, NULL),
(5, 'L11', 'LOC11', '2018-09-26 18:52:32', 1, NULL),
(6, '123', 'eqw', '2018-09-27 12:28:36', 1, NULL),
(7, '123d', 'hyddd', '2018-09-27 18:14:29', 1, NULL),
(8, '12 ss', '12 gtt hh', '2018-09-27 18:45:49', 1, NULL),
(9, 'lbp 123', 'lo 123', '2018-09-27 18:53:39', 1, NULL),
(10, 'L  01', 'hy', '2018-09-28 10:53:47', 1, NULL),
(11, 'cafe 12', 'lc 12', '2018-09-28 14:31:30', 1, NULL),
(12, 'q12ww', '12', '2018-09-28 14:39:55', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lot_details`
--

CREATE TABLE IF NOT EXISTS `lot_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `lot_id` varchar(250) NOT NULL,
  `gp` varchar(250) NOT NULL,
  `src` varchar(250) NOT NULL,
  `received_at` date NOT NULL,
  `status` int(10) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lot_gp_data`
--

CREATE TABLE IF NOT EXISTS `lot_gp_data` (
  `lg_id` int(10) NOT NULL AUTO_INCREMENT,
  `gp_id` varchar(250) NOT NULL,
  `lot_id` varchar(250) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`lg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `lot_gp_data`
--

INSERT INTO `lot_gp_data` (`lg_id`, `gp_id`, `lot_id`, `created_date`) VALUES
(1, 'GP 10', 'L 01', '2018-09-26 17:42:41'),
(2, 'GP 10', 'L 02', '2018-09-26 17:43:05'),
(3, 'GP 10', 'L 03', '2018-09-26 17:43:38'),
(4, 'G 09', 'L 09', '2018-09-26 18:29:41'),
(5, 'Gp11', 'L11', '2018-09-26 18:52:05'),
(6, 'Gp 456', '3442', '2018-09-27 12:27:26'),
(7, 'Gp 456', '123', '2018-09-27 12:27:47'),
(8, 'q123', 'q12', '2018-09-27 12:32:53'),
(9, 'Fp 12', 'lot 12', '2018-09-27 14:30:01'),
(10, 'Fp 12', 'l78', '2018-09-27 14:30:36'),
(11, 'Fp 12', 'q12233', '2018-09-27 14:32:44'),
(12, 'Fp 12', '122', '2018-09-27 14:34:09'),
(13, '12gp', '12w', '2018-09-27 14:38:45'),
(14, '12gp', '1lp5', '2018-09-27 14:38:57'),
(15, '12gp', '12q4', '2018-09-27 14:39:51'),
(16, 'q123', '12ss', '2018-09-27 14:40:26'),
(17, 'q123', '12q', '2018-09-27 14:44:33'),
(18, 'Gw', '12', '2018-09-27 17:02:39'),
(19, 'q234', '12l', '2018-09-27 17:22:04'),
(20, '123we', '12dl', '2018-09-27 18:14:06'),
(21, '123we', '12ww', '2018-09-27 18:14:12'),
(22, 'gp qw', '1267', '2018-09-27 18:38:45'),
(23, 'gp qw', '1qq', '2018-09-27 18:40:55'),
(24, '12 gp', '12 ss', '2018-09-27 18:41:29'),
(25, '12 gp', '12 g', '2018-09-27 18:41:36'),
(26, 'bp 123', 'lbp 123', '2018-09-27 18:52:43'),
(27, 'bp 123', 'lbp1234', '2018-09-27 18:52:54'),
(28, 'q12a', 'q1267', '2018-09-28 12:44:25'),
(29, 'q12a', 'q12345', '2018-09-28 12:44:32'),
(30, 'q12a', 'q23', '2018-09-28 12:44:44'),
(31, 'cafe 12', 'l q1', '2018-09-28 14:30:30'),
(32, 'cafe 12', 'q12ww', '2018-09-28 14:30:36');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(500) NOT NULL,
  `price` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`) VALUES
(1, 'Apple', '100'),
(2, 'Banana', '40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `email` varchar(500) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `password`, `updated_at`, `created_at`) VALUES
(1, 'test', 'test@gmail.com', '', '12345', '2018-09-24 11:23:45', '2018-09-24 11:23:45'),
(2, 'test2', 'test2@gmail.com', '1537795229.jpg', '$2y$10$3KsF9Vv1FLPkkyGlh3dloeWzOY43hzUPjJva5PHQgxiBwbGnHtTrO', '2018-09-24 13:20:29', '2018-09-24 13:20:02'),
(3, 'yerre', 'te@gmail.com', '', '$2y$10$JjvAx7ox3Yv5JxpwWlRSzeJBRE5MeTudhx1TZMG8MNz9gtnF1J4Ca', '2018-09-24 17:20:12', '2018-09-24 17:20:12'),
(4, 'erwr', 'admin@gmail.com', '', '$2y$10$2YayJRT6hIMk55QBmhF61eJaStj5zRq9AV6hyMTpVGmqwCdm0csRm', '2018-09-25 04:25:44', '2018-09-25 04:25:44'),
(5, 'dfsf', 'fdfsf@gmail.com', '', '$2y$10$wgsjg9JMI7Fm3xM/H4XSpeX8FnNnyk1BZC/6sFT815yzQqn4CuTrK', '2018-09-25 05:06:16', '2018-09-25 05:06:16'),
(6, 'dfdsfs', 'fdfsf11@gmail.com', '', '$2y$10$pXrDYCkyQJue/BdYaAB2R.JiLDoWVLXO8h/S6KtgI.mACOqC3lAQ6', '2018-09-25 13:20:08', '2018-09-25 13:20:08');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE IF NOT EXISTS `vendors` (
  `vendor_id` int(10) NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(500) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>Inactive',
  PRIMARY KEY (`vendor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendor_id`, `vendor_name`, `status`) VALUES
(1, 'My cafe', 1),
(2, 'Bangalore ', 1),
(3, 'Presentience', 1),
(4, 'test', 1),
(5, 'test2', 0),
(6, 'test3', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
