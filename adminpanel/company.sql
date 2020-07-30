-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 16, 2020 at 04:38 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminpaneldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_uz` varchar(255) NOT NULL,
  `name_ru` varchar(255) NOT NULL,
  `company_type` enum('local','foreign') NOT NULL,
  `address` tinytext NOT NULL,
  `address_uz` tinytext NOT NULL,
  `address_ru` tinytext NOT NULL,
  `phone` char(15) NOT NULL,
  `company_code` varchar(60) NOT NULL,
  `descripiton` text NOT NULL,
  `description_uz` text NOT NULL,
  `description_ru` text NOT NULL,
  `meta_des` text NOT NULL,
  `meta_des_uz` text NOT NULL,
  `meta_des_ru` text NOT NULL,
  `tags` tinytext NOT NULL,
  `tags_uz` tinytext NOT NULL,
  `tags_ru` tinytext NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `sort` enum('1','2','3','4','5') NOT NULL,
  `email` varchar(80) NOT NULL,
  `website` varchar(80) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `category`, `name`, `name_uz`, `name_ru`, `company_type`, `address`, `address_uz`, `address_ru`, `phone`, `company_code`, `descripiton`, `description_uz`, `description_ru`, `meta_des`, `meta_des_uz`, `meta_des_ru`, `tags`, `tags_uz`, `tags_ru`, `status`, `sort`, `email`, `website`, `image`) VALUES
(1, 'Oziq-o&#39;vqat', 'LLC “FARPRIDE UNITY”', 'LLC “FARPRIDE UNITY”', 'LLC “FARPRIDE UNITY”', 'local', 'Mozortagi street 54, Poloson town, Oltiariq district, Fergana region', 'Fargona viloyati, Oltiariq tumani, Poloson shahri, Mozortagi ko&#39;chasi, 54', 'Mozortagi street 54, Poloson town, Oltiariq district, Fergana region', '998916815688', 'L1', 'adfadfasdfasdfasdf', 'adfadfasdfasdfasdf', 'adfadfasdfasdfasdf', 'adfadfasdfasdfasdf', 'adfadfasdfasdfasdf', 'adfadfasdfasdfasdf', 'fruit, vegetables, export', 'meva, sabzavot, export', 'fruit, vegetables, export', 1, '4', 'FarPride2020@mail.ru', 'No', 'uploads/companyLLC “FARPRIDE UNITY”.png'),
(2, 'Xom-ashiyo', 'Strong Partners', 'Strong Partners', 'Strong Partners', 'local', '	Tashkent', '	To&#39;shkent', '	Tashkent', '974046964', 'not set', 'Our company is one of the leading companies in our country in the import and export of confectionery, raw materials, and various types of products.', 'Компаниямиз мамлакатимизда қандолат маҳсулотлари, хом ашё ва турли хил маҳсулотларни олиб кириш ва експорт қилишда етакчи компаниялардан бири ҳисобланади.', 'Наша компания является одной из ведущих в нашей стране по импорту и экспорту кондитерских изделий, конлитерского сырья, а также разного рода продукций.&nbsp;', 'Not set', 'Not set', 'Not set', 'company, row materials, local ', 'company, row materials, local', 'company, row materials, local', 1, '1', 'marufpardaev@bk.ru', 'str.uz', 'uploads/companyStrong Partners.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
