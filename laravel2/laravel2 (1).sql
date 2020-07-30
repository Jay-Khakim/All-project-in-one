-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 24, 2020 at 07:04 PM
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
-- Database: `laravel2`
--

-- --------------------------------------------------------

--
-- Table structure for table `asfasdfasdfar123rqwerqe_categories`
--

CREATE TABLE `asfasdfasdfar123rqwerqe_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asfasdfasdfar123rqwerqe_categories`
--

INSERT INTO `asfasdfasdfar123rqwerqe_categories` (`id`, `title`, `desc`, `img`, `alias`, `created_at`, `updated_at`) VALUES
(1, 'Phones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac sodales lorem. Cras nunc libero, varius eu ante sed, feugiat gravida urna. Curabitur sem ligula, volutpat non velit id, venenatis venenatis mi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.', 'categories.jpg', 'phones', '2020-07-22 19:00:00', '2020-07-22 19:00:00'),
(2, 'Cameras', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac sodales lorem. Cras nunc libero, varius eu ante sed, feugiat gravida urna. Curabitur sem ligula, volutpat non velit id, venenatis venenatis mi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.', 'avds_large.jpg', 'cameras', '2020-07-23 13:56:19', '2020-07-23 13:56:19'),
(3, 'Laptops', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac sodales lorem. Cras nunc libero, varius eu ante sed, feugiat gravida urna. Curabitur sem ligula, volutpat non velit id, venenatis venenatis mi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.', 'categories.jpg', 'laptops', '2020-07-23 13:57:09', '2020-07-23 13:57:09');

-- --------------------------------------------------------

--
-- Table structure for table `asfasdfasdfar123rqwerqe_failed_jobs`
--

CREATE TABLE `asfasdfasdfar123rqwerqe_failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `asfasdfasdfar123rqwerqe_migrations`
--

CREATE TABLE `asfasdfasdfar123rqwerqe_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asfasdfasdfar123rqwerqe_migrations`
--

INSERT INTO `asfasdfasdfar123rqwerqe_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_07_21_115624_create_products_table', 1),
(5, '2020_07_21_122734_add_new_to_products_table', 1),
(6, '2020_07_22_110726_create_product_images_table', 1),
(7, '2020_07_23_132730_create_categories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `asfasdfasdfar123rqwerqe_password_resets`
--

CREATE TABLE `asfasdfasdfar123rqwerqe_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `asfasdfasdfar123rqwerqe_products`
--

CREATE TABLE `asfasdfasdfar123rqwerqe_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `in_stock` tinyint(1) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `new_price` int(11) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asfasdfasdfar123rqwerqe_products`
--

INSERT INTO `asfasdfasdfar123rqwerqe_products` (`id`, `title`, `price`, `in_stock`, `description`, `created_at`, `updated_at`, `new_price`, `category_id`) VALUES
(1, 'Product 1', 782, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, NULL, 700, 1),
(2, 'Product 2', 584, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, NULL, 550, 2),
(3, 'Product 3', 933, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, NULL, 900, 3),
(4, 'Product 4', 1288, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, NULL, NULL, 1),
(5, 'Product 5', 403, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, NULL, NULL, 2),
(6, 'Product 6', 622, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, NULL, NULL, 3),
(7, 'Product 7', 1142, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, NULL, NULL, 1),
(8, 'Product 8', 763, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, NULL, NULL, 2),
(9, 'Product 9', 1034, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, NULL, NULL, 3),
(10, 'Product 10', 1177, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `asfasdfasdfar123rqwerqe_product_images`
--

CREATE TABLE `asfasdfasdfar123rqwerqe_product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asfasdfasdfar123rqwerqe_product_images`
--

INSERT INTO `asfasdfasdfar123rqwerqe_product_images` (`id`, `img`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'details_1.jpg', 1, NULL, NULL),
(3, 'details_2.jpg', 1, NULL, NULL),
(5, 'details_3.jpg', 1, NULL, NULL),
(7, 'details_4.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `asfasdfasdfar123rqwerqe_users`
--

CREATE TABLE `asfasdfasdfar123rqwerqe_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asfasdfasdfar123rqwerqe_categories`
--
ALTER TABLE `asfasdfasdfar123rqwerqe_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asfasdfasdfar123rqwerqe_failed_jobs`
--
ALTER TABLE `asfasdfasdfar123rqwerqe_failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asfasdfasdfar123rqwerqe_migrations`
--
ALTER TABLE `asfasdfasdfar123rqwerqe_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asfasdfasdfar123rqwerqe_password_resets`
--
ALTER TABLE `asfasdfasdfar123rqwerqe_password_resets`
  ADD KEY `asfasdfasdfar123rqwerqe_password_resets_email_index` (`email`);

--
-- Indexes for table `asfasdfasdfar123rqwerqe_products`
--
ALTER TABLE `asfasdfasdfar123rqwerqe_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asfasdfasdfar123rqwerqe_product_images`
--
ALTER TABLE `asfasdfasdfar123rqwerqe_product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asfasdfasdfar123rqwerqe_product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `asfasdfasdfar123rqwerqe_users`
--
ALTER TABLE `asfasdfasdfar123rqwerqe_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `asfasdfasdfar123rqwerqe_users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asfasdfasdfar123rqwerqe_categories`
--
ALTER TABLE `asfasdfasdfar123rqwerqe_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `asfasdfasdfar123rqwerqe_failed_jobs`
--
ALTER TABLE `asfasdfasdfar123rqwerqe_failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asfasdfasdfar123rqwerqe_migrations`
--
ALTER TABLE `asfasdfasdfar123rqwerqe_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `asfasdfasdfar123rqwerqe_products`
--
ALTER TABLE `asfasdfasdfar123rqwerqe_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `asfasdfasdfar123rqwerqe_product_images`
--
ALTER TABLE `asfasdfasdfar123rqwerqe_product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `asfasdfasdfar123rqwerqe_users`
--
ALTER TABLE `asfasdfasdfar123rqwerqe_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asfasdfasdfar123rqwerqe_product_images`
--
ALTER TABLE `asfasdfasdfar123rqwerqe_product_images`
  ADD CONSTRAINT `asfasdfasdfar123rqwerqe_product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `asfasdfasdfar123rqwerqe_products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
