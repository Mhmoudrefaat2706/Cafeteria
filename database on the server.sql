-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: sql5.freesqldatabase.com
-- Generation Time: Jun 29, 2025 at 02:45 PM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql5787285`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Hot Drinks', 'Warm and cozy beverages', '2025-06-28 18:15:55', '2025-06-28 18:15:55'),
(2, 'Cold Drinks', 'Refreshing iced drinks', '2025-06-28 18:15:55', '2025-06-28 18:15:55'),
(3, 'Juices', 'Fresh fruit juices', '2025-06-28 18:15:55', '2025-06-28 18:15:55'),
(4, 'Sodas', 'Carbonated soft drinks', '2025-06-28 18:15:55', '2025-06-28 18:15:55'),
(5, 'Energy Drinks', 'Boost your energy instantly', '2025-06-28 18:15:55', '2025-06-28 18:15:55');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2025_06_28_144139_create_table_rooms', 1),
(4, '2025_06_28_144754_create_users_table', 1),
(5, '2025_06_28_144901_create_categories_table', 1),
(6, '2025_06_28_144910_create_products_table', 1),
(7, '2025_06_28_144919_create_orders_table', 1),
(8, '2025_06_28_151313_add_foreign_key_ro_orders_table', 1),
(9, '2025_06_28_152749_add_foreign_key_to_users', 1),
(10, '2025_06_28_162813_drop_column_from_rooms_table', 1),
(11, '2025_06_28_170645_add_coloumn_to_users_table', 1),
(12, '2025_06_28_182748_add_column_to_orders_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('processing','out for delivery','done') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'processing',
  `amount` decimal(10,2) NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `status`, `amount`, `notes`, `room_id`, `user_id`, `date`) VALUES
(1, '2025-06-28 18:35:53', '2025-06-28 18:35:53', 'processing', '10.50', 'Extra sugar in drinks', 1, 1, '2025-06-28'),
(2, '2025-06-28 18:35:53', '2025-06-28 18:35:53', 'out for delivery', '7.20', 'No ice in juice', 1, 2, '2025-06-28'),
(3, '2025-06-28 18:35:53', '2025-06-28 18:35:53', 'done', '5.00', 'Order done by user', 1, 3, '2025-06-28'),
(4, '2025-06-28 18:35:53', '2025-06-28 18:35:53', 'processing', '12.75', 'Urgent delivery', 1, 4, '2025-06-28'),
(5, '2025-06-28 18:35:53', '2025-06-28 18:35:53', 'done', '8.60', 'With straw', 1, 5, '2025-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(8,2) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `name`, `image`, `description`, `price`, `category_id`) VALUES
(1, '2025-06-28 18:15:56', '2025-06-28 18:15:56', 'Espresso', 'https://source.unsplash.com/200x200/?espresso', 'Strong and bold espresso shot.', '2.50', 1),
(2, '2025-06-28 18:15:56', '2025-06-28 18:15:56', 'Cappuccino', 'https://source.unsplash.com/200x200/?cappuccino', 'Creamy milk foam and espresso.', '3.00', 1),
(3, '2025-06-28 18:15:56', '2025-06-28 18:15:56', 'Americano', 'https://source.unsplash.com/200x200/?americano', 'Espresso with hot water.', '2.00', 1),
(4, '2025-06-28 18:15:56', '2025-06-28 18:15:56', 'Iced Latte', 'https://source.unsplash.com/200x200/?iced-latte', 'Cold milk over espresso.', '3.50', 2),
(5, '2025-06-28 18:15:56', '2025-06-28 18:15:56', 'Iced Mocha', 'https://source.unsplash.com/200x200/?iced-mocha', 'Cold chocolate and coffee mix.', '4.00', 2),
(6, '2025-06-28 18:15:56', '2025-06-28 18:15:56', 'Orange Juice', 'https://source.unsplash.com/200x200/?orange-juice', 'Freshly squeezed orange.', '2.75', 3),
(7, '2025-06-28 18:15:56', '2025-06-28 18:15:56', 'Apple Juice', 'https://source.unsplash.com/200x200/?apple-juice', 'Crisp apple juice.', '2.50', 3),
(8, '2025-06-28 18:15:56', '2025-06-28 18:15:56', 'Mango Juice', 'https://source.unsplash.com/200x200/?mango-juice', 'Sweet mango drink.', '3.00', 3),
(9, '2025-06-28 18:15:56', '2025-06-28 18:15:56', 'Coca-Cola', 'https://source.unsplash.com/200x200/?coca-cola', 'Classic soda.', '1.50', 4),
(10, '2025-06-28 18:15:56', '2025-06-28 18:15:56', 'Pepsi', 'https://source.unsplash.com/200x200/?pepsi', 'Refreshing Pepsi.', '1.50', 4),
(11, '2025-06-28 18:15:56', '2025-06-28 18:15:56', 'Sprite', 'https://source.unsplash.com/200x200/?sprite', 'Lemon-lime soda.', '1.50', 4),
(12, '2025-06-28 18:15:56', '2025-06-28 18:15:56', 'Red Bull', 'https://source.unsplash.com/200x200/?redbull', 'Gives you wings!', '3.00', 5),
(13, '2025-06-28 18:15:56', '2025-06-28 18:15:56', 'Monster Energy', 'https://source.unsplash.com/200x200/?monster-energy', 'Extreme energy boost.', '3.25', 5),
(14, '2025-06-28 18:15:56', '2025-06-28 18:15:56', 'Latte', 'https://source.unsplash.com/200x200/?latte', 'Smooth espresso and milk.', '2.80', 1),
(15, '2025-06-28 18:15:56', '2025-06-28 18:15:56', 'Iced Tea', 'https://source.unsplash.com/200x200/?iced-tea', 'Cool and refreshing.', '2.20', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL),
(2, '2025-06-29 00:00:00', '2025-06-29 00:00:00'),
(3, '2025-06-29 13:30:18', '2025-06-29 13:30:18'),
(4, '2025-06-28 18:16:00', '2025-06-28 18:16:00');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('t5Gyg9GNmejX3qfyB4Qdb0V1naDIlG8z0xo1o6N9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Avast/137.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVVFHcGVsZnNoZnRUODFrSEZNNDN4OFhLTjJITnc1OTVSdzBtSVdQRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi1hZGQtb3JkZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751208317),
('WhgiMKof2Q77tQN4TR8UmtoXQLnWIFGsDkFhwisn', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieFpPOVMxUDloeWh4Ukc3WWh6T1FETXR3U1JOOWVDcXA3T3kyODdsTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi1hZGQtb3JkZXI/aW5wdXRfc2VhcmNoPXRlYSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751204559);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'user',
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ext_num` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `room_id`, `ext_num`, `image`) VALUES
(1, 'Bob Smith', 'bob@example.com', '2025-06-28 18:15:53', '$2y$12$jtu8DZ/NocwQYPM1uy0gA.QQdk2iePS0Z79KguNwWGx6iPof539UO', 'laravelproject123123', '2025-06-28 18:15:53', '2025-06-28 18:15:53', 'user', 1, 20012025, 'https://source.unsplash.com/200x200/?man'),
(2, 'Charlie Brown', 'charlie@example.com', '2025-06-28 18:15:53', '$2y$12$Xm6iyPJ6oMljAdSCTUP6E.iTHdeAJVrH0d5VZ/iOkv8/FyHTaGJbG', 'laravelproject123123', '2025-06-28 18:15:53', '2025-06-28 18:15:53', 'user', 2, 20012025, 'https://source.unsplash.com/200x200/?guy'),
(3, 'Diana Prince', 'diana@example.com', '2025-06-28 18:15:54', '$2y$12$JpdhPswBEv15LGUmC5lyy.OJBaUkYmt2W0ET5QVPPHINZRBd3wCZ6', 'laravelproject123123', '2025-06-28 18:15:54', '2025-06-28 18:15:54', 'user', 2, 20012025, 'https://source.unsplash.com/200x200/?girl'),
(4, 'Ethan Clark', 'ethan@example.com', '2025-06-28 18:15:54', '$2y$12$Slpx3u.XknGeYLxk6kRohOMC7GzDsw7lV1PoLjevo3hkeNzbbgp5G', 'laravelproject123123', '2025-06-28 18:15:54', '2025-06-28 18:15:54', 'user', 1, 20012025, 'https://source.unsplash.com/200x200/?man-face'),
(5, 'Test User', 'test@example.com', '2025-06-28 18:15:59', '$2y$12$4fZJ2gX5bmpXOU.kM586RO./QK4IFHY5xwgoGQmLs8WX58/VxeE3q', 'j5KluJ5I2P', '2025-06-28 18:16:00', '2025-06-28 18:16:00', 'user', 1, 20012025, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
