-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2025 at 11:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@example.com', '$2y$10$zBtdeOwqMLAxpyfEFsTnY.1PC.o..RXyIikxz.RdIBz2eEwtq7aKG', 'Male', '2025-06-17 02:58:10', '2025-06-17 02:58:10'),
(2, 'manager', 'manager@example.com', '$2y$10$efHJNH3lhdlJjCXl.m7.0uwCQmrPZIUtnz7XWDsdOCiaTxNUBcm8.', 'Female', '2025-06-17 02:58:10', '2025-06-17 02:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `gallery` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `name`, `price`, `category`, `gallery`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Oppo Mobile', '20000', 'mobile', 'https://assetscdn1.paytm.com/images/catalog/product/M/MO/MOBOPPO-A52-6-GFUTU6297453D3D253C/1592019058170_0..png', 'a smartphone with 8gb ram and much more feature', NULL, NULL),
(2, 'Samsung TV', '10000', 'tv', 'https://i.gadgets360cdn.com/products/televisions/large/1548154685_832_panasonic_32-inch-lcd-full-hd-tv-th-l32u20.jpg', 'a smart tv with much more feature', NULL, NULL),
(3, 'LG TV', '15000', 'tv', 'https://4.imimg.com/data4/PM/KH/MY-34794816/lcd-500x500.png', 'a smart with much more feature', NULL, NULL),
(4, 'panasonic fridge', '10000', 'fridge', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTFx-2-wTOcfr5at01ojZWduXEm5cZ-sRYPJA&usqp=CAU', 'a fridge with much more feature', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `approve` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2020_10_17_220918_create_orders_table', 1),
(3, '2021_05_13_115423_create_users_table', 1),
(4, '2021_05_13_133411_create_products_table', 1),
(5, '2021_05_16_095518_create_comments_table', 1),
(6, '2021_05_17_134755_create_photos_table', 1),
(7, '2021_06_01_150329_create_collections_table', 1),
(9, '2021_06_09_075220_create_admins_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `gallery` varchar(255) NOT NULL,
  `gallery2` varchar(255) NOT NULL,
  `gallery3` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category`, `gallery`, `gallery2`, `gallery3`, `description`, `short_description`, `created_at`, `updated_at`) VALUES
(1, 'Oppo Mobile', '20000', 'mobile', 'https://assetscdn1.paytm.com/images/catalog/product/M/MO/MOBOPPO-A52-6-GFUTU6297453D3D253C/1592019058170_0..png', 'https://assetscdn1.paytm.com/images/catalog/product/M/MO/MOBOPPO-A52-6-GFUTU6297453D3D253C/1592019058170_0..png', 'https://assetscdn1.paytm.com/images/catalog/product/M/MO/MOBOPPO-A52-6-GFUTU6297453D3D253C/1592019058170_0..png', 'a smartphone with 8gb ram and much more feature', '8GB RAM smartphone', NULL, NULL),
(2, 'Samsung TV', '10000', 'tv', 'https://i.gadgets360cdn.com/products/televisions/large/1548154685_832_panasonic_32-inch-lcd-full-hd-tv-th-l32u20.jpg', 'https://i.gadgets360cdn.com/products/televisions/large/1548154685_832_panasonic_32-inch-lcd-full-hd-tv-th-l32u20.jpg', 'https://i.gadgets360cdn.com/products/televisions/large/1548154685_832_panasonic_32-inch-lcd-full-hd-tv-th-l32u20.jpg', 'a smart tv with much more feature', 'Smart TV with HD display', NULL, NULL),
(3, 'LG TV', '15000', 'tv', 'https://4.imimg.com/data4/PM/KH/MY-34794816/lcd-500x500.png', 'https://4.imimg.com/data4/PM/KH/MY-34794816/lcd-500x500.png', 'https://4.imimg.com/data4/PM/KH/MY-34794816/lcd-500x500.png', 'a smart with much more feature', 'LG Smart TV', NULL, NULL),
(4, 'panasonic fridge', '10000', 'fridge', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTFx-2-wTOcfr5at01ojZWduXEm5cZ-sRYPJA&usqp=CAU', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTFx-2-wTOcfr5at01ojZWduXEm5cZ-sRYPJA&usqp=CAU', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTFx-2-wTOcfr5at01ojZWduXEm5cZ-sRYPJA&usqp=CAU', 'a fridge with much more feature', 'Panasonic refrigerator', NULL, NULL),
(5, 'Oppo Mobile', '20000', 'mobile', 'https://assetscdn1.paytm.com/images/catalog/product/M/MO/MOBOPPO-A52-6-GFUTU6297453D3D253C/1592019058170_0..png', 'https://assetscdn1.paytm.com/images/catalog/product/M/MO/MOBOPPO-A52-6-GFUTU6297453D3D253C/1592019058170_0..png', 'https://assetscdn1.paytm.com/images/catalog/product/M/MO/MOBOPPO-A52-6-GFUTU6297453D3D253C/1592019058170_0..png', 'a smartphone with 8gb ram and much more feature', '8GB RAM smartphone', NULL, NULL),
(6, 'Samsung TV', '10000', 'tv', 'https://i.gadgets360cdn.com/products/televisions/large/1548154685_832_panasonic_32-inch-lcd-full-hd-tv-th-l32u20.jpg', 'https://i.gadgets360cdn.com/products/televisions/large/1548154685_832_panasonic_32-inch-lcd-full-hd-tv-th-l32u20.jpg', 'https://i.gadgets360cdn.com/products/televisions/large/1548154685_832_panasonic_32-inch-lcd-full-hd-tv-th-l32u20.jpg', 'a smart tv with much more feature', 'Smart TV with HD display', NULL, NULL),
(7, 'LG TV', '15000', 'tv', 'https://4.imimg.com/data4/PM/KH/MY-34794816/lcd-500x500.png', 'https://4.imimg.com/data4/PM/KH/MY-34794816/lcd-500x500.png', 'https://4.imimg.com/data4/PM/KH/MY-34794816/lcd-500x500.png', 'a smart with much more feature', 'LG Smart TV', NULL, NULL),
(8, 'panasonic fridge', '10000', 'fridge', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTFx-2-wTOcfr5at01ojZWduXEm5cZ-sRYPJA&usqp=CAU', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTFx-2-wTOcfr5at01ojZWduXEm5cZ-sRYPJA&usqp=CAU', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTFx-2-wTOcfr5at01ojZWduXEm5cZ-sRYPJA&usqp=CAU', 'a fridge with much more feature', 'Panasonic refrigerator', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'anil', 'anil@sidhu.com', '$2y$10$BxX3/AFI.nHCJ99TzVOoaOpu9M0Olulk3daD.IJ9LCaThWrA1LGbO', 'male', NULL, NULL),
(2, 'jarry', 'jarry@gmail.com', '$2y$10$kDfVFJWUbocsGmThsSBkFODbvPZxFVDY5HiBGy5jNI0nF1yamVxVa', 'male', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
