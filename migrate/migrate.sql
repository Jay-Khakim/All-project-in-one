-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 22, 2020 at 01:19 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `migrate`
--

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `oneyeargb` decimal(6,0) UNSIGNED NOT NULL,
  `oneyearus` decimal(6,0) UNSIGNED NOT NULL,
  `fiveyeargb` decimal(6,0) UNSIGNED NOT NULL,
  `fiveyearus` decimal(6,0) UNSIGNED NOT NULL,
  `militarugb` decimal(6,0) UNSIGNED NOT NULL,
  `militaryus` decimal(6,0) UNSIGNED NOT NULL,
  `u21gb` decimal(6,0) UNSIGNED NOT NULL,
  `u21us` decimal(6,0) UNSIGNED NOT NULL,
  `minpricegb` decimal(6,0) UNSIGNED NOT NULL,
  `minpriceus` decimal(6,0) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`oneyeargb`, `oneyearus`, `fiveyeargb`, `fiveyearus`, `militarugb`, `militaryus`, `u21gb`, `u21us`, `minpricegb`, `minpriceus`) VALUES
('30', '40', '125', '140', '5', '8', '2', '3', '15', '20'),
('30', '40', '125', '140', '5', '8', '2', '3', '15', '20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` mediumint(8) UNSIGNED NOT NULL,
  `title` varchar(10) DEFAULT NULL,
  `secret` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(255) NOT NULL,
  `registration_date` datetime NOT NULL,
  `user_level` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `class` char(20) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `state_country` char(25) NOT NULL,
  `zcode_pcode` char(10) NOT NULL,
  `phone` char(15) DEFAULT NULL,
  `paid` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `title`, `secret`, `first_name`, `last_name`, `email`, `password`, `registration_date`, `user_level`, `class`, `address1`, `address2`, `city`, `state_country`, `zcode_pcode`, `phone`, `paid`) VALUES
(1, 'Mr', '', 'Jay', 'Khakim', 'mgmediajay@gmail.com', '$2y$10$e4CX0qbEGKZVkh469Bn.UuLcW8TgjMpO3.OQhwZ.2.NLOSIA9EwHu', '2020-06-15 10:40:33', 0, '30', 'Sergeli-7-18-28', NULL, 'Tashkent', 'Uzbekistan', '100010', '+998903378856', 'yes'),
(2, 'Mr', '', 'James', 'Smith', 'jsmith@myisp.com', '$2y$10$PF8Ah2IYT7znBehnqQGgROadLJ5gaGc7ZbwhJbmxfgEGDNihmtkUS', '2020-06-16 15:53:24', 1, '30', '2 The Street.', 'The Village', 'Townsville.', 'UK', 'EX7 9PP', '01234 777 888', 'yes'),
(3, 'Mr', '', 'Jack', 'Smith', 'jsmith@outcook.com', '$2y$10$6kou4RWDepkk1i2PJ3l3nuEtpScjdhcWWbENbG2uKzkylATdNgtPC', '2020-06-16 15:55:43', 0, '125', '2 The Street.', NULL, 'Samarkand', 'CA', '33040', '+998901234567', 'yes'),
(4, 'Mr', '', 'Mike', 'Rosoft', 'miker@myisp.com', '$2y$10$sofymcB8/RQDW7ssxE2DoehJ2iGJzsAzvH.9p.OHGtPquvDY71OYK', '2020-06-16 15:56:33', 0, '5', '2 The Street.', NULL, 'Samarkand', 'CA', '33040', '8901234567', 'no'),
(5, NULL, '', 'Olive', 'Branch', 'obranch@myisp.co.uk', '$2y$10$ThaekSGq7EpfPG9PjWn2cuFKFGgSdypMjfjJ9sRSkgOwlme4oktea', '2020-06-16 16:06:36', 0, '5', 'Sergeli-7-18-28', NULL, 'Tashkent', 'Uzbekistan', '100010', '8903378856', 'no'),
(6, 'Mr', '', 'Frank', 'Incense', 'fincense@myisp.net', '$2y$10$n9k6z0atHhcRSkmEbcG7jOsJjoEhTma7V0WxcsJkK1lkO4kyIxZ9u', '2020-06-16 16:07:03', 0, '2', '2 The Street.', NULL, 'Samarkand', 'CA', '33040', '8901234567', 'no'),
(7, NULL, '', 'Annie', 'Versary', 'aversary@myisp.com', '$2y$10$bwG/4hTIRYc.gSelfCiCQetJTN.QxRZRBqry/rKDswDYHC.LN1v1S', '2020-06-16 16:14:29', 0, '15', '2 The Street.', NULL, 'Samarkand', 'CA', '33040', '8901234567', 'yes'),
(8, 'Mr', '', 'Terry', 'Fide', 'tfide@myisp.de', '$2y$10$QfdnbCrF3Vzr6R/mh9i71OW1k1W75JsS9PPly8fjpBzVjSkyL0Quy', '2020-06-16 16:17:43', 0, '125', 'Sergeli-7-18-28', NULL, 'Tashkent', 'Uzbekistan', '100010', '8903378856', 'no'),
(9, 'Mrs', '', 'Rose', 'Bush', 'rbush@myisp.co.uk', '$2y$10$rVXZgtspXti4/6aNqb..2OEBIm/4R53hSRjbIxe6g2yEtbEewuUG.', '2020-06-16 16:20:56', 0, '2', '2 The Street', 'The Village', 'Townsville.', 'KR', '47041', '+821082934580', 'no'),
(10, 'Ms', '', 'Annie', 'Mossity', 'amositty@myisp.org.uk', '$2y$10$sVIK/cB.XQk2loVfTCHWMO3TU5d4jMshQZ49C3.8NSqhOPzYMIZk6', '2020-06-16 16:22:02', 0, '2', '2 The Street', 'The Village', 'The Village', 'KR', '47', NULL, 'yes'),
(11, 'Mr', 'Bobby', 'Javokhirbek', 'Khakimjonov', 'javohir@gmail.com', '$2y$10$RPXuipSHfFcVE6cXe7rLo.BZFL7eoGtTL8V5CrPuBBoCJ.lNG.rTW', '2020-06-19 17:16:37', 0, '30', 'Sergeli-7-18-28', NULL, 'Tashkent', 'Uzbekistan', '100010', '8903378856', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
