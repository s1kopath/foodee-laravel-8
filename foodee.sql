-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2022 at 02:33 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodee`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_number` int(11) NOT NULL,
  `category_status` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `order_number`, `category_status`, `added_on`, `created_at`, `updated_at`) VALUES
(1, 'Charles Frazier', 813, 0, '2015-07-04 00:00:00', '2022-05-06 06:27:55', '2022-05-06 06:27:55'),
(2, 'Sean Carroll', 202, 0, '1978-04-09 00:00:00', '2022-05-06 06:27:59', '2022-05-06 06:27:59'),
(3, 'Felix Mitchell', 53, 1, '2001-10-13 00:00:00', '2022-05-06 06:28:02', '2022-05-06 06:28:02'),
(4, 'Kuame Travis', 122, 1, '1986-04-28 00:00:00', '2022-05-06 06:32:25', '2022-05-06 06:32:25'),
(5, 'Brent Guerra', 56, 1, '2021-10-04 00:00:00', '2022-05-06 06:32:32', '2022-05-06 06:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_type` int(11) NOT NULL,
  `coupon_value` int(11) NOT NULL,
  `cart_min_value` int(11) NOT NULL,
  `expired_on` datetime NOT NULL,
  `coupon_status` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `coupon_type`, `coupon_value`, `cart_min_value`, `expired_on`, `coupon_status`, `added_on`, `created_at`, `updated_at`) VALUES
(1, 'Ut fugit dolor qui', 1, 55, 84, '2008-10-05 00:00:00', 0, '1974-09-18 00:00:00', '2022-05-06 06:28:35', '2022-05-06 06:28:35'),
(2, 'Non voluptatem aute', 0, 53, 93, '1980-10-25 00:00:00', 1, '1994-06-13 00:00:00', '2022-05-06 06:28:42', '2022-05-06 06:28:42');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boys`
--

CREATE TABLE `delivery_boys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `delivery_boy_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_boy_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_boy_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_boy_status` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_boys`
--

INSERT INTO `delivery_boys` (`id`, `delivery_boy_name`, `delivery_boy_phone_number`, `delivery_boy_password`, `delivery_boy_status`, `added_on`, `created_at`, `updated_at`) VALUES
(1, 'Edward Molina', '+1 (413) 126-3219', '12345678', 0, '2016-06-15 00:00:00', '2022-05-06 06:28:15', '2022-05-06 06:28:15'),
(2, 'Olivia Heath', '+1 (562) 432-4162', '12345678', 0, '2021-09-10 00:00:00', '2022-05-06 06:28:23', '2022-05-06 06:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `dish_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dish_detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `dish_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dish_status` int(11) NOT NULL,
  `full` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_price` double(8,2) DEFAULT NULL,
  `half` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `half_price` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`id`, `category_id`, `dish_name`, `dish_detail`, `dish_image`, `dish_status`, `full`, `full_price`, `half`, `half_price`, `created_at`, `updated_at`) VALUES
(1, 4, 'Shea Brady', 'Adipisicing neque an', 'BackendSourceFiles/images/dish/20220506120510.jpg', 1, NULL, 436.00, NULL, 218.00, '2022-05-06 06:29:10', '2022-05-06 06:32:44'),
(2, 4, 'Sonya Carroll', 'Qui perferendis dolo', 'BackendSourceFiles/images/dish/20220506120522.jpg', 1, NULL, 909.00, NULL, 454.50, '2022-05-06 06:29:22', '2022-05-06 06:32:50'),
(3, 3, 'Ferris Hinton', 'Labore obcaecati qui', 'BackendSourceFiles/images/dish/20220506120528.jpg', 1, NULL, 526.00, NULL, 263.00, '2022-05-06 06:29:28', '2022-05-06 06:31:30'),
(4, 3, 'Zeus Schultz', 'Sunt aut modi quis v', 'BackendSourceFiles/images/dish/20220506120534.jpg', 1, NULL, 819.00, NULL, 409.50, '2022-05-06 06:29:34', '2022-05-06 06:31:17'),
(5, 3, 'Mira Ellison', 'Aliquid proident si', 'BackendSourceFiles/images/dish/20220506120545.jpg', 1, NULL, 623.00, NULL, 392.00, '2022-05-06 06:29:45', '2022-05-06 06:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_29_150035_create_categories_table', 1),
(5, '2021_07_29_220605_create_delivery_boys_table', 1),
(6, '2021_07_29_222916_create_coupons_table', 1),
(7, '2021_07_30_152041_create_dishes_table', 1),
(8, '2021_08_09_152225_create_customers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', '$2y$10$A2Au/80sP4I/n/M31IR6yOUviY1g4SqrXapPtPhHf8nAMqCjgrDDm', NULL, '2022-05-06 06:25:12', '2022-05-06 06:25:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_coupon_code_unique` (`coupon_code`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_phone_number_unique` (`phone_number`);

--
-- Indexes for table `delivery_boys`
--
ALTER TABLE `delivery_boys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `delivery_boys_delivery_boy_phone_number_unique` (`delivery_boy_phone_number`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_boys`
--
ALTER TABLE `delivery_boys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
