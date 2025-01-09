-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2024 at 07:45 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app-crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `addto_carts`
--

CREATE TABLE `addto_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `type`, `description`, `created_at`, `updated_at`) VALUES
(32, 'Designer Hand Bags', 'Fashion', 'Epitome of luxury and style...', '2024-09-23 02:58:59', '2024-09-23 03:02:01'),
(33, 'Designer Belts', 'Fashion', 'add a touch of luxury to any outfit', '2024-09-23 03:05:51', '2024-09-23 03:05:51');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `expiration_date` date NOT NULL,
  `status` enum('active','inactive','expired') COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('percentage','fixed_amount') COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `uuid`, `model_type`, `model_id`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, '9bd0a2ce-322e-4195-8030-66ff916f0c02', 'App\\Models\\Product', 38, '', '_4cd9f352-9727-4fa7-b47b-bc2043dee0d0 - Copy - Copy', '_4cd9f352-9727-4fa7-b47b-bc2043dee0d0---Copy---Copy.jpg', 'image/jpeg', 'public', 'public', 181551, '[]', '[]', '[]', '[]', 1, '2024-09-22 03:09:51', '2024-09-22 03:09:51'),
(2, 'aa40bdee-aaf1-4372-91ce-e9bcc15e1e2d', 'App\\Models\\Product', 39, '', 'image with slogan Thankyou for your support (2) - Copy - Copy', 'image-with-slogan-Thankyou-for-your-support-(2)---Copy---Copy.png', 'image/png', 'public', 'public', 152002, '[]', '[]', '[]', '[]', 2, '2024-09-22 05:19:12', '2024-09-22 05:19:12'),
(9, '924de958-8d7a-43f9-8687-d2523716051d', 'App\\Models\\Category', 33, '', 'Screenshot_23-9-2024_143416_www.independent.co.uk', 'Screenshot_23-9-2024_143416_www.independent.co.uk.jpeg', 'image/jpeg', 'public', 'public', 530979, '[]', '[]', '[]', '[]', 7, '2024-09-23 03:05:51', '2024-09-23 03:05:51'),
(11, 'e0c789c5-aa1f-42d9-83d5-785e8b31611a', 'App\\Models\\Product', 44, '', 'Screenshot_23-9-2024_144330_wwd.com', 'Screenshot_23-9-2024_144330_wwd.com.jpeg', 'image/jpeg', 'public', 'public', 112023, '[]', '[]', '[]', '[]', 9, '2024-09-23 05:46:07', '2024-09-23 05:46:07'),
(12, '1bc3c250-b9b1-4b51-bb16-557b76f17004', 'App\\Models\\Product', 46, '', 'Screenshot_23-9-2024_174547_wwd.com', 'Screenshot_23-9-2024_174547_wwd.com.jpeg', 'image/jpeg', 'public', 'public', 62982, '[]', '[]', '[]', '[]', 10, '2024-09-23 06:15:55', '2024-09-23 06:15:55'),
(13, 'a0426155-1346-4961-bb86-87fc2c8a276c', 'App\\Models\\Product', 47, '', 'Screenshot_23-9-2024_17481_wwd.com', 'Screenshot_23-9-2024_17481_wwd.com.jpeg', 'image/jpeg', 'public', 'public', 52859, '[]', '[]', '[]', '[]', 11, '2024-09-23 06:18:12', '2024-09-23 06:18:12'),
(14, 'be4b4941-fc1e-43a1-8a8d-c362af4ce5b1', 'App\\Models\\Product', 48, '', 'Screenshot_23-9-2024_175020_wwd.com', 'Screenshot_23-9-2024_175020_wwd.com.jpeg', 'image/jpeg', 'public', 'public', 55727, '[]', '[]', '[]', '[]', 12, '2024-09-23 06:20:30', '2024-09-23 06:20:30'),
(15, 'c52b3d33-af39-46ef-b3d7-c1e0fc33e2e2', 'App\\Models\\Product', 49, '', 'Screenshot_23-9-2024_175341_wwd.com', 'Screenshot_23-9-2024_175341_wwd.com.jpeg', 'image/jpeg', 'public', 'public', 29216, '[]', '[]', '[]', '[]', 13, '2024-09-23 06:23:48', '2024-09-23 06:23:48'),
(16, 'd7a1aa51-6e7d-443c-86f0-3eada5be9a4a', 'App\\Models\\Product', 51, '', 'Screenshot_23-9-2024_1809_www.glamour.com', 'Screenshot_23-9-2024_1809_www.glamour.com.jpeg', 'image/jpeg', 'public', 'public', 36303, '[]', '[]', '[]', '[]', 14, '2024-09-23 06:30:16', '2024-09-23 06:30:16'),
(17, 'ee7a820c-dda7-4eb8-be4e-d0fcf5dd5ef9', 'App\\Models\\Product', 52, '', 'Screenshot_23-9-2024_18142_www.glamour.com', 'Screenshot_23-9-2024_18142_www.glamour.com.jpeg', 'image/jpeg', 'public', 'public', 47765, '[]', '[]', '[]', '[]', 15, '2024-09-23 06:31:50', '2024-09-23 06:31:50'),
(18, 'a258d163-0f99-49f2-b4e8-818d3223962a', 'App\\Models\\Product', 53, '', 'Screenshot_23-9-2024_18338_www.glamour.com', 'Screenshot_23-9-2024_18338_www.glamour.com.jpeg', 'image/jpeg', 'public', 'public', 85466, '[]', '[]', '[]', '[]', 16, '2024-09-23 06:33:46', '2024-09-23 06:33:46'),
(19, '2f536473-204e-42a3-811b-0639d342ad7d', 'App\\Models\\Product', 54, '', 'Screenshot_23-9-2024_18452_www.glamour.com', 'Screenshot_23-9-2024_18452_www.glamour.com.jpeg', 'image/jpeg', 'public', 'public', 79858, '[]', '[]', '[]', '[]', 17, '2024-09-23 06:34:59', '2024-09-23 06:34:59'),
(20, '62410906-b8eb-4eb9-a560-904d4d56ee04', 'App\\Models\\Category', 32, '', 'image with slogan Thankyou for your support (1) - Copy', 'image-with-slogan-Thankyou-for-your-support-(1)---Copy.png', 'image/png', 'public', 'public', 152001, '[]', '[]', '[]', '[]', 18, '2024-09-24 04:08:13', '2024-09-24 04:08:13'),
(21, '522098ec-e3d0-4f82-b95d-8ba76d9ff81d', 'App\\Models\\Product', 56, '', 'Screenshot_23-9-2024_175020_wwd.com', 'Screenshot_23-9-2024_175020_wwd.com.jpeg', 'image/jpeg', 'public', 'public', 55727, '[]', '[]', '[]', '[]', 19, '2024-09-28 23:50:00', '2024-09-28 23:50:00');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_31_063240_create_products_table', 1),
(7, '2024_08_14_071404_create_categories_table', 1),
(8, '2024_08_15_104433_add_category_id_to_products_table', 1),
(9, '2024_08_21_033009_create_variation_table', 2),
(10, '2024_08_21_033109_add_product_id_to_variations', 3),
(11, '2024_08_21_055153_add_category_to_products_table', 4),
(12, '2024_09_09_071703_create_customers_table', 5),
(13, '2024_09_09_091330_create_deals_table', 6),
(14, '2024_09_20_052918_add_brand_av_size_av_color_to_products_table', 7),
(15, '2024_09_20_053814_drop_qty_from_products_table', 8),
(16, '2024_08_02_053143_create_media_table', 9),
(17, '2024_09_24_113021_create_addto_carts_table', 10);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `availableSize` double(8,2) NOT NULL,
  `availableColor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `created_at`, `updated_at`, `category_id`, `brand`, `availableSize`, `availableColor`) VALUES
(44, 'Coach Polished Pebble Leather Shoulder Bag', '197.50', 'Materials: Leather Closure: Zipper closure Features: Multiple straps for styling versatility Designer bag style: Shoulder bag', '2024-09-23 05:46:07', '2024-09-23 06:12:22', 32, 'Coach', 1.00, 'Black'),
(46, 'Marc Jacobs The Jacquard Medium Tote Bag', '3005.00', 'Materials: Woven jacquard  Closure: Top zip closure Features: Top handle, removable and adjustable webbing strap, two interior zip pockets, two slip pockets Designer bag style: Tote bag', '2024-09-23 06:15:55', '2024-09-26 04:59:40', 32, 'Marc Jacobs', 1.00, 'Grey'),
(47, 'Gucci Aphrodite Medium Shoulder Bag', '2290.00', '1 zipper pocket, adjustable shoulder strap, sold with an additional strap that can be attached to the bag with a buckle closure', '2024-09-23 06:18:12', '2024-09-23 06:35:33', 32, 'Gucci', 2.00, 'Hibiscus red, black, brown, green, light pink, beige cotton canvas, beige and black canvas'),
(48, 'Prada Medium Leather Bag', '2950.00', 'Two compartments, detachable 95 cm logo-print embroidered woven tape strap, detachable adjustable 110 cm leather shoulder strap', '2024-09-23 06:20:30', '2024-09-23 06:21:29', 32, 'Prada', 3.00, 'Black, White, Water Lily, Cornflower, Sand, Clay Grey, Carmel'),
(49, 'Celine Classique Triomphe Bag', '4150.00', 'three main compartments, inner zipped pocket, and flat pocket, adjustable strap with a minimum drop 17 in', '2024-09-23 06:23:48', '2024-09-23 06:23:48', 32, 'Celine', 0.00, 'Black'),
(50, 'Hermès Epsom Birkin Bag', '1600.00', 'Clochette, lock, two keys', '2024-09-23 06:25:25', '2024-09-23 06:25:25', 32, 'Hermès', 1.00, 'Black, Red'),
(51, 'Loewe Anagram Buckle Leather Belt', '450.00', 'Loewe’s Anagram appears to be the logo du jour for fashion girls, and we love it on this skinny pebbled calfskin belt in a pop of bright blue. Since the Spanish house was founded as a leather collective, you know their accessories are top quality.', '2024-09-23 06:30:16', '2024-09-23 06:30:16', 33, 'Loewe Anagram', 5.00, 'Blue'),
(52, 'Gucci Marmont Leather Belt', '420.00', 'The current logo mania can almost certainly be attributed to Gucci’s recent reign. Opt for this Italian-made belt with a brushed gold “GG” logo buckle and gorgeous cream leather', '2024-09-23 06:31:50', '2024-09-23 06:31:50', 33, 'Gucci', 3.00, 'black, camel and blush'),
(53, 'Altuzarra Corset Belt', '450.00', 'Looking to up your belt game? Level up with a corset style like this structured leather piece. Cinch it over a T-shirt dress or even a crisp button-up shirt for an edgy take.', '2024-09-23 06:33:46', '2024-09-23 06:35:47', 33, 'Altuzarra', 2.00, 'Red, Brown'),
(54, 'Prada Saffiano Leather Belt', '795.00', 'Crafted in Prada’s signature scratch-resistant Saffiano leather, this belt also boasts the brand’s iconic triangular logo. It’s sophisticated enough to be dressed up or down, making it a forever staple worth its price tag.', '2024-09-23 06:34:59', '2024-09-23 06:35:57', 33, 'Prada', 3.00, 'Beige, white'),
(55, 'Neville Raymond', '926.00', 'Sit do totam repelle', '2024-09-27 05:21:14', '2024-09-27 05:21:14', 32, 'Labore vitae eiusmod', 57.00, 'Corrupti deleniti n'),
(56, 'Eric Hensley', '885.00', 'Veniam aspernatur q', '2024-09-28 23:49:59', '2024-09-28 23:49:59', 32, 'Sit quo qui odio eni', 54.00, 'Voluptatem ad at adi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bernard William', 'fyweg@mailinator.com', NULL, '$2y$10$wUvZZReszAay1afg9ofusuhhRFwTHgVU4ivtw1.XjuFTZUiGknCry', 'w33qaF9X5lRnfz2rTCTOPSJp9b3obQB2K4rvjCrYIoOFaYCs3MSwL9R5yodd', '2024-08-22 00:55:58', '2024-08-22 01:03:50'),
(2, 'intern', 'interntrekkies@gmail.com', NULL, '$2y$10$QV0RhIvYGcv6eE00s7kQDOo6lMBemtQWMH/bVSUyBCSYbPqrKE40C', NULL, '2024-09-02 23:32:33', '2024-09-02 23:32:33');

-- --------------------------------------------------------

--
-- Table structure for table `variation`
--

CREATE TABLE `variation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addto_carts`
--
ALTER TABLE `addto_carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addto_carts_product_id_foreign` (`product_id`),
  ADD KEY `addto_carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `variation`
--
ALTER TABLE `variation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variation_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addto_carts`
--
ALTER TABLE `addto_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `variation`
--
ALTER TABLE `variation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addto_carts`
--
ALTER TABLE `addto_carts`
  ADD CONSTRAINT `addto_carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `addto_carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `variation`
--
ALTER TABLE `variation`
  ADD CONSTRAINT `variation_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
