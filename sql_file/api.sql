-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 29, 2021 at 05:41 AM
-- Server version: 10.3.28-MariaDB-log-cll-lve
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahswfmbw_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Small', '2021-04-26 17:43:20', '2021-04-28 18:03:50'),
(2, 'Big', '2021-04-26 17:43:20', '2021-04-26 17:43:20'),
(4, 'Small Pizza', '2021-04-28 17:51:14', '2021-04-28 17:51:14'),
(5, 'Small Barger', '2021-04-28 17:56:51', '2021-04-28 17:56:51'),
(6, 'Kacci', '2021-04-28 18:03:36', '2021-04-28 18:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_type` char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cod',
  `payment_status` tinyint(1) NOT NULL DEFAULT 0,
  `order_status` enum('Processing','Shipped','Delivered','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Processing',
  `user_id` int(11) NOT NULL,
  `items` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `payment_type`, `payment_status`, `order_status`, `user_id`, `items`, `phone`, `address`, `created_by`, `updated_at`) VALUES
(6, 'cod', 0, 'Shipped', 14, '{&#34;2&#34;:{&#34;item&#34;:{&#34;id&#34;:2,&#34;name&#34;:&#34;Pizza 2&#34;,&#34;sku&#34;:&#34;sku123457&#34;,&#34;description&#34;:&#34;Big Pizza&#34;,&#34;category_id&#34;:&#34;1&#34;,&#34;price&#34;:&#34;10.00&#34;,&#34;image&#34;:&#34;http://api.ahsweet.me/images/1619545383piz1.jpg&#34;,&#34;created_at&#34;:&#34;2021-04-27T17:27:56.000000Z&#34;,&#34;updated_at&#34;:&#34;2021-04-27T17:27:56.000000Z&#34;,&#34;category&#34;:{&#34;id&#34;:1,&#34;name&#34;:&#34;Small&#34;,&#34;created_at&#34;:&#34;2021-04-26T17:43:20.000000Z&#34;,&#34;updated_at&#34;:&#34;2021-04-26T17:43:20.000000Z&#34;}},&#34;qty&#34;:1},&#34;3&#34;:{&#34;item&#34;:{&#34;id&#34;:3,&#34;name&#34;:&#34;Pizza 3&#34;,&#34;sku&#34;:&#34;sku123458&#34;,&#34;description&#34;:&#34;Big Pizza&#34;,&#34;category_id&#34;:&#34;1&#34;,&#34;price&#34;:&#34;10.00&#34;,&#34;image&#34;:&#34;http://api.ahsweet.me/images/1619545383piz1.jpg&#34;,&#34;created_at&#34;:&#34;2021-04-27T17:28:10.000000Z&#34;,&#34;updated_at&#34;:&#34;2021-04-27T17:28:10.000000Z&#34;,&#34;category&#34;:{&#34;id&#34;:1,&#34;name&#34;:&#34;Small&#34;,&#34;created_at&#34;:&#34;2021-04-26T17:43:20.000000Z&#34;,&#34;updated_at&#34;:&#34;2021-04-26T17:43:20.000000Z&#34;}},&#34;qty&#34;:1},&#34;4&#34;:{&#34;item&#34;:{&#34;id&#34;:4,&#34;name&#34;:&#34;Pizza 4&#34;,&#34;sku&#34;:&#34;sku123459&#34;,&#34;description&#34;:&#34;Small Pizza&#34;,&#34;category_id&#34;:&#34;1&#34;,&#34;price&#34;:&#34;10.00&#34;,&#34;image&#34;:&#34;http://api.ahsweet.me/images/1619545383piz1.jpg&#34;,&#34;created_at&#34;:&#34;2021-04-27T17:28:34.000000Z&#34;,&#34;updated_at&#34;:&#34;2021-04-27T17:28:34.000000Z&#34;,&#34;category&#34;:{&#34;id&#34;:1,&#34;name&#34;:&#34;Small&#34;,&#34;created_at&#34;:&#34;2021-04-26T17:43:20.000000Z&#34;,&#34;updated_at&#34;:&#34;2021-04-26T17:43:20.000000Z&#34;}},&#34;qty&#34;:1},&#34;6&#34;:{&#34;item&#34;:{&#34;id&#34;:6,&#34;name&#34;:&#34;Pizza 6&#34;,&#34;sku&#34;:&#34;sku123462&#34;,&#34;description&#34;:&#34;Small Pizza&#34;,&#34;category_id&#34;:&#34;1&#34;,&#34;price&#34;:&#34;10.00&#34;,&#34;image&#34;:&#34;http://api.ahsweet.me/images/1619545383piz1.jpg&#34;,&#34;created_at&#34;:&#34;2021-04-27T17:29:03.000000Z&#34;,&#34;updated_at&#34;:&#34;2021-04-27T17:29:03.000000Z&#34;,&#34;category&#34;:{&#34;id&#34;:1,&#34;name&#34;:&#34;Small&#34;,&#34;created_at&#34;:&#34;2021-04-26T17:43:20.000000Z&#34;,&#34;updated_at&#34;:&#34;2021-04-26T17:43:20.000000Z&#34;}},&#34;qty&#34;:1}}', '01738088325', 'Mirpur', NULL, '2021-04-28 16:57:54'),
(7, 'cod', 0, 'Processing', 14, '{&#34;2&#34;:{&#34;item&#34;:{&#34;id&#34;:2,&#34;name&#34;:&#34;Pizza 2&#34;,&#34;sku&#34;:&#34;sku123457&#34;,&#34;description&#34;:&#34;Big Pizza&#34;,&#34;category_id&#34;:&#34;1&#34;,&#34;price&#34;:&#34;10.00&#34;,&#34;image&#34;:&#34;http://api.ahsweet.me/images/1619545383piz1.jpg&#34;,&#34;created_at&#34;:&#34;2021-04-27T17:27:56.000000Z&#34;,&#34;updated_at&#34;:&#34;2021-04-27T17:27:56.000000Z&#34;,&#34;category&#34;:{&#34;id&#34;:1,&#34;name&#34;:&#34;Small&#34;,&#34;created_at&#34;:&#34;2021-04-26T17:43:20.000000Z&#34;,&#34;updated_at&#34;:&#34;2021-04-26T17:43:20.000000Z&#34;}},&#34;qty&#34;:2},&#34;3&#34;:{&#34;item&#34;:{&#34;id&#34;:3,&#34;name&#34;:&#34;Pizza 3&#34;,&#34;sku&#34;:&#34;sku123458&#34;,&#34;description&#34;:&#34;Big Pizza&#34;,&#34;category_id&#34;:&#34;1&#34;,&#34;price&#34;:&#34;10.00&#34;,&#34;image&#34;:&#34;http://api.ahsweet.me/images/1619545383piz1.jpg&#34;,&#34;created_at&#34;:&#34;2021-04-27T17:28:10.000000Z&#34;,&#34;updated_at&#34;:&#34;2021-04-27T17:28:10.000000Z&#34;,&#34;category&#34;:{&#34;id&#34;:1,&#34;name&#34;:&#34;Small&#34;,&#34;created_at&#34;:&#34;2021-04-26T17:43:20.000000Z&#34;,&#34;updated_at&#34;:&#34;2021-04-26T17:43:20.000000Z&#34;}},&#34;qty&#34;:1},&#34;4&#34;:{&#34;item&#34;:{&#34;id&#34;:4,&#34;name&#34;:&#34;Pizza 4&#34;,&#34;sku&#34;:&#34;sku123459&#34;,&#34;description&#34;:&#34;Small Pizza&#34;,&#34;category_id&#34;:&#34;1&#34;,&#34;price&#34;:&#34;10.00&#34;,&#34;image&#34;:&#34;http://api.ahsweet.me/images/1619545383piz1.jpg&#34;,&#34;created_at&#34;:&#34;2021-04-27T17:28:34.000000Z&#34;,&#34;updated_at&#34;:&#34;2021-04-27T17:28:34.000000Z&#34;,&#34;category&#34;:{&#34;id&#34;:1,&#34;name&#34;:&#34;Small&#34;,&#34;created_at&#34;:&#34;2021-04-26T17:43:20.000000Z&#34;,&#34;updated_at&#34;:&#34;2021-04-26T17:43:20.000000Z&#34;}},&#34;qty&#34;:2},&#34;8&#34;:{&#34;item&#34;:{&#34;id&#34;:8,&#34;name&#34;:&#34;Pizza 7&#34;,&#34;sku&#34;:&#34;sku123464&#34;,&#34;description&#34;:&#34;Small Pizza&#34;,&#34;category_id&#34;:&#34;1&#34;,&#34;price&#34;:&#34;10.00&#34;,&#34;image&#34;:&#34;http://api.ahsweet.me/images/1619545383piz1.jpg&#34;,&#34;created_at&#34;:&#34;2021-04-27T17:38:26.000000Z&#34;,&#34;updated_at&#34;:&#34;2021-04-27T17:38:26.000000Z&#34;,&#34;category&#34;:{&#34;id&#34;:1,&#34;name&#34;:&#34;Small&#34;,&#34;created_at&#34;:&#34;2021-04-26T17:43:20.000000Z&#34;,&#34;updated_at&#34;:&#34;2021-04-26T17:43:20.000000Z&#34;}},&#34;qty&#34;:1}}', '01738088325', 'Mirpur', NULL, '2021-04-28 16:57:58');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `sku`, `description`, `category_id`, `price`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Pizza 1', 'Pizza123456', 'Pizza456', 1, 10.00, 'http://api.ahsweet.me/images/1619545383piz1.jpg', '2021-04-27 17:27:39', '2021-04-28 19:57:02'),
(2, 'Pizza 2', 'sku123457', 'Big Pizza', 1, 10.00, 'http://api.ahsweet.me/images/1619545383piz1.jpg', '2021-04-27 17:27:56', '2021-04-27 17:27:56'),
(3, 'Pizza 3', 'sku123458', 'Big Pizza', 1, 10.00, 'http://api.ahsweet.me/images/1619545383piz1.jpg', '2021-04-27 17:28:10', '2021-04-27 17:28:10'),
(4, 'Pizza 4', 'sku123459', 'Small Pizza', 1, 10.00, 'http://api.ahsweet.me/images/1619545383piz1.jpg', '2021-04-27 17:28:34', '2021-04-27 17:28:34'),
(5, 'Pizza 5', 'sku123461', 'Small Pizza', 1, 10.00, 'http://api.ahsweet.me/images/1619545383piz1.jpg', '2021-04-27 17:28:52', '2021-04-27 17:28:52'),
(6, 'Pizza 6', 'sku123462', 'Small Pizza', 1, 10.00, 'http://api.ahsweet.me/images/1619545383piz1.jpg', '2021-04-27 17:29:03', '2021-04-27 17:29:03'),
(7, 'Pizza 7', 'sku123463', 'Small Pizza', 1, 10.00, 'http://api.ahsweet.me/images/1619545383piz1.jpg', '2021-04-27 17:34:52', '2021-04-27 17:34:52'),
(8, 'Pizza 7', 'sku123464', 'Small Pizza', 1, 10.00, 'http://api.ahsweet.me/images/1619545383piz1.jpg', '2021-04-27 17:38:26', '2021-04-27 17:38:26'),
(9, 'Pizza 8', 'sku123465', 'Small Pizza', 1, 10.00, 'http://api.ahsweet.me/images/1619545383piz1.jpg', '2021-04-27 17:38:52', '2021-04-27 17:38:52'),
(10, 'Pizza 9', 'sku123466', 'Small Pizza', 1, 10.00, 'http://api.ahsweet.me/images/1619545383piz1.jpg', '2021-04-27 17:43:03', '2021-04-28 20:07:18'),
(11, 'Pizza 10', 'sku123467', 'Small Pizza', 2, 10.00, 'http://api.ahsweet.me/images/1619546024piz1.jpg', '2021-04-27 17:53:44', '2021-04-28 20:03:40'),
(12, 'Pizza 11', 'sku123468', 'Small Pizza', 2, 10.00, 'http://api.ahsweet.me/images/1619546038piz1.jpg', '2021-04-27 17:53:58', '2021-04-27 17:53:58'),
(13, 'Kacci', 'Kacci', 'Kacci', 6, 20.00, NULL, '2021-04-28 19:52:16', '2021-04-28 19:54:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` enum('user','admin','','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `user_type`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(14, 'sweet', 'sweet92@gmail.com', 'user', NULL, '12345678', NULL, '2021-04-25 14:18:27', '2021-04-25 14:18:27'),
(15, 'Pizza', 'ahsweet92@gmail.com', 'admin', NULL, '12345678', NULL, '2021-04-26 15:28:21', '2021-04-26 15:28:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
