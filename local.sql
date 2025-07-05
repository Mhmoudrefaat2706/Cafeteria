-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2025 at 12:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `local`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(191) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(191) NOT NULL,
  `owner` varchar(191) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Hot Drinks', 'Warm and cozy beverages', '2025-07-04 10:54:52', '2025-07-04 10:54:52'),
(2, 'Cold Drinks', 'Refreshing iced drinks', '2025-07-04 10:54:52', '2025-07-04 10:54:52'),
(3, 'Juices', 'Fresh fruit juices', '2025-07-04 10:54:52', '2025-07-04 10:54:52'),
(4, 'Sodas', 'Carbonated soft drinks', '2025-07-04 10:54:52', '2025-07-04 10:54:52'),
(5, 'Energy Drinks', 'Boost your energy instantly', '2025-07-04 10:54:52', '2025-07-04 10:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) NOT NULL,
  `payload` longtext NOT NULL,
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
  `id` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
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
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2025_06_28_144139_create_table_rooms', 1),
(5, '2025_06_28_144754_create_users_table', 1),
(6, '2025_06_28_144901_create_categories_table', 1),
(7, '2025_06_28_144910_create_products_table', 1),
(8, '2025_06_28_144919_create_orders_table', 1),
(9, '2025_06_28_151313_add_foreign_key_ro_orders_table', 1),
(10, '2025_06_28_152749_add_foreign_key_to_users', 1),
(11, '2025_06_28_162813_drop_column_from_rooms_table', 1),
(12, '2025_06_28_170645_add_coloumn_to_users_table', 1),
(13, '2025_06_28_182748_add_column_to_orders_table', 1),
(14, '2025_06_29_145818_add_column_quantity_to_products_table', 1),
(15, '2025_06_29_150106_add_column_quantity_to_orders_table', 1),
(16, '2025_06_29_194544_add_social_columns_to_users_table', 1),
(17, '2025_06_30_130655_drop_column_quantity_from_products_table', 1),
(18, '2025_06_30_130843_add_column_quantity_to_products_table', 1),
(19, '2025_07_01_130234_drop_column_date_from_orders_table', 1),
(20, '2025_07_01_130317_add_column_date_to_orders_table', 1),
(21, '2025_07_01_152310_create_order_product_table', 1),
(22, '2025_07_01_160607_drop_column_ext_num_from_users_table', 1),
(23, '2025_07_01_160709_add_column_ext_num_to_users_table', 1),
(24, '2025_07_01_162111_add_column_to_order_product_table', 1),
(25, '2025_07_03_180609_update_user_id_in_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('processing','cancelled','done') NOT NULL DEFAULT 'processing',
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `amount` decimal(10,2) NOT NULL,
  `notes` text DEFAULT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL DEFAULT '2025-07-04'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `status`, `quantity`, `amount`, `notes`, `room_id`, `user_id`, `date`) VALUES
(6, '2025-07-04 13:56:26', '2025-07-04 11:22:27', 'cancelled', 3, 200.00, 'no ice', 2, 5, '2025-07-04'),
(7, '2025-07-05 13:56:26', '2025-07-05 13:56:26', 'done', 7, 900.00, NULL, 2, 5, '2025-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `name`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 6, 9, '', 1, 20.00, '2025-07-04 13:57:59', '2025-07-04 13:57:59'),
(2, 6, 7, '', 2, 80.00, '2025-07-04 13:57:59', '2025-07-04 13:57:59'),
(3, 7, 12, '', 2, 0.00, '2025-07-04 13:59:51', '2025-07-04 13:59:51'),
(4, 6, 2, '', 1, 50.00, '2025-07-11 13:59:51', '2025-07-11 13:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
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
  `name` varchar(191) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `name`, `image`, `description`, `price`, `category_id`, `quantity`) VALUES
(1, '2025-07-04 10:54:52', '2025-07-04 10:54:52', 'Espresso', 'https://source.unsplash.com/200x200/?espresso', 'Strong and bold espresso shot.', 2.50, 1, 1),
(2, '2025-07-04 10:54:52', '2025-07-04 10:54:52', 'Cappuccino', 'https://source.unsplash.com/200x200/?cappuccino', 'Creamy milk foam and espresso.', 3.00, 1, 1),
(3, '2025-07-04 10:54:52', '2025-07-04 10:54:52', 'Americano', 'https://source.unsplash.com/200x200/?americano', 'Espresso with hot water.', 2.00, 1, 1),
(4, '2025-07-04 10:54:52', '2025-07-04 10:54:52', 'Iced Latte', 'https://source.unsplash.com/200x200/?iced-latte', 'Cold milk over espresso.', 3.50, 2, 1),
(5, '2025-07-04 10:54:52', '2025-07-04 10:54:52', 'Iced Mocha', 'https://source.unsplash.com/200x200/?iced-mocha', 'Cold chocolate and coffee mix.', 4.00, 2, 1),
(6, '2025-07-04 10:54:52', '2025-07-04 10:54:52', 'Orange Juice', 'https://source.unsplash.com/200x200/?orange-juice', 'Freshly squeezed orange.', 2.75, 3, 1),
(7, '2025-07-04 10:54:52', '2025-07-04 10:54:52', 'Apple Juice', 'https://source.unsplash.com/200x200/?apple-juice', 'Crisp apple juice.', 2.50, 3, 1),
(8, '2025-07-04 10:54:52', '2025-07-04 10:54:52', 'Mango Juice', 'https://source.unsplash.com/200x200/?mango-juice', 'Sweet mango drink.', 3.00, 3, 1),
(9, '2025-07-04 10:54:52', '2025-07-04 10:54:52', 'Coca-Cola', 'https://source.unsplash.com/200x200/?coca-cola', 'Classic soda.', 1.50, 4, 1),
(10, '2025-07-04 10:54:52', '2025-07-04 10:54:52', 'Pepsi', 'https://source.unsplash.com/200x200/?pepsi', 'Refreshing Pepsi.', 1.50, 4, 1),
(11, '2025-07-04 10:54:52', '2025-07-04 10:54:52', 'Sprite', 'https://source.unsplash.com/200x200/?sprite', 'Lemon-lime soda.', 1.50, 4, 1),
(12, '2025-07-04 10:54:52', '2025-07-04 10:54:52', 'Red Bull', 'https://source.unsplash.com/200x200/?redbull', 'Gives you wings!', 3.00, 5, 1),
(13, '2025-07-04 10:54:52', '2025-07-04 10:54:52', 'Monster Energy', 'https://source.unsplash.com/200x200/?monster-energy', 'Extreme energy boost.', 3.25, 5, 1),
(14, '2025-07-04 10:54:52', '2025-07-04 10:54:52', 'Latte', 'https://source.unsplash.com/200x200/?latte', 'Smooth espresso and milk.', 2.80, 1, 1),
(15, '2025-07-04 10:54:52', '2025-07-04 10:54:52', 'Iced Tea', 'https://source.unsplash.com/200x200/?iced-tea', 'Cool and refreshing.', 2.20, 2, 1);

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
(2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('hjMQ53uKruSWWeTxe7uL4S8B2w7vvRqiznNk2DwI', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVjNRTXV1OFdzUkNzbGFYSFk2bHB3N3Y1WlZOeVdJRkNsREtpU0I0dSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL2hvbWUiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo2O30=', 1751710512),
('vn1dxHeoMuvfbtuolMFrbW1q8kl7A4dKpZOpPFg8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSUx5a01JTmNNeWJPUFVlRFdPbXZaSmN4TXl1SGx1UkMwSEhkbUlQdSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1751643617);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(191) DEFAULT 'user',
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `google_id` varchar(191) DEFAULT NULL,
  `facebook_id` varchar(191) DEFAULT NULL,
  `avatar` varchar(191) DEFAULT NULL,
  `provider` varchar(191) DEFAULT NULL,
  `ext_num` bigint(20) UNSIGNED DEFAULT 20252001
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `room_id`, `image`, `google_id`, `facebook_id`, `avatar`, `provider`, `ext_num`) VALUES
(1, 'Bob Smith', 'bob@example.com', '2025-07-04 10:54:51', '$2y$12$Uo44GOq6.rQS9rey3a7dMuqTI1X8F0YFR3xdPHDbZX3ZjVXKrO7kO', 'laravelproject123123', '2025-07-04 10:54:51', '2025-07-04 10:54:51', 'user', 1, 'https://source.unsplash.com/200x200/?man', NULL, NULL, NULL, NULL, 20012025),
(2, 'Charlie Brown', 'charlie@example.com', '2025-07-04 10:54:51', '$2y$12$b1CKBzMCY5SiZqITIENV4OlkU6In3C9IWgIwo8xwA5QYBmE3uM7t.', 'laravelproject123123', '2025-07-04 10:54:51', '2025-07-04 10:54:51', 'user', 2, 'https://source.unsplash.com/200x200/?guy', NULL, NULL, NULL, NULL, 20012025),
(3, 'Diana Prince', 'diana@example.com', '2025-07-04 10:54:51', '$2y$12$mZESLWAxWUp67ilnpKFKSuAdm5JCQn7qpStKWP/8lxuKEMPJ7hNRG', 'laravelproject123123', '2025-07-04 10:54:51', '2025-07-04 10:54:51', 'user', 2, 'https://source.unsplash.com/200x200/?girl', NULL, NULL, NULL, NULL, 20012025),
(4, 'Ethan Clark', 'ethan@example.com', '2025-07-04 10:54:52', '$2y$12$dPNPJvbH9NZJvdMI26Wu2uoAiiEqhlONmQspWV9YBPT6gJr5TBH3q', 'nxtNVovBMF2JgStl1L0yHfvrwxZxGOAN0jJ6B1R8swA2hVnfN74XBUAfL0Kq', '2025-07-04 10:54:52', '2025-07-04 10:54:52', 'admin', 1, 'https://source.unsplash.com/200x200/?man-face', NULL, NULL, NULL, NULL, 20012025),
(5, 'mariam ahmed', 'mariam@example.com', NULL, '$2y$12$4UKWtPSKwm6PxiGxgeEbyuoDZpUKTRWtpSI2vXzEryf1LTqDdZHQy', NULL, '2025-07-04 10:55:50', '2025-07-04 10:55:50', 'user', NULL, NULL, NULL, NULL, NULL, NULL, 20252001),
(6, 'hala', 'hala@example.com', NULL, '$2y$12$BBqcUPAt1j3ZJ/De6LDMhu9/gq78lhaNsp2DyQl2rCUXADACZP7pS', NULL, '2025-07-05 07:13:40', '2025-07-05 07:13:40', 'user', NULL, NULL, NULL, NULL, NULL, NULL, 20252001);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_order_id_foreign` (`order_id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
