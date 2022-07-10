-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2022 at 11:55 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel8ecommercedaraz`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `group_id`, `url`, `name`, `Description`, `image`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(3, 5, 'mobile-and-accessories', 'Mobile and accessories', 'Mobile and accessories', '1645904403.jpg', '1645508279.jpeg', 0, '2022-02-22 00:31:25', '2022-02-26 14:40:03'),
(4, 5, 'mobile', 'Mobile', 'testing', '1645507926.jpg', '1645519323.jpg', 0, '2022-02-22 00:32:06', '2022-02-26 14:42:05'),
(5, 7, 'T-shirt', 'T Shirt', 'This is a small  description about T-shirt', '1645905123.jpg', '1645904849.jpg', 0, '2022-02-26 14:47:29', '2022-06-07 06:55:50'),
(6, 7, 'jeans', 'Jeans', 'This a small description about jeans', '1645905786.jpeg', '1645905786.jpeg', 0, '2022-02-26 15:03:06', '2022-06-07 06:11:15'),
(7, 5, 'laptop', 'Laptop', 'This a small description about laptop', '1645912476.jpg', '1645911333.webp', 0, '2022-02-26 16:35:33', '2022-02-26 16:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_limit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `visibility_status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `offer_name`, `product_id`, `coupon_code`, `coupon_limit`, `coupon_type`, `coupon_price`, `start_datetime`, `end_datetime`, `status`, `visibility_status`, `created_at`, `updated_at`) VALUES
(3, 'Get 5% off on all sale', NULL, 'ABCD56', '2', '1', '5', '2022-04-21 14:04:00', '2022-04-20 14:08:00', 0, 1, '2022-04-18 21:00:15', '2022-04-20 05:15:36');

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
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `url`, `name`, `Description`, `status`, `created_at`, `updated_at`) VALUES
(5, 'electronics', 'Electronics', 'This is a Small Description', 0, '2022-02-21 19:29:19', '2022-06-07 06:53:01'),
(6, 'fashion', 'fashion', 'This is a Small Description', 0, '2022-02-21 19:29:46', '2022-02-24 05:28:28'),
(7, 'Men', 'Men', 'This is a Small Description', 0, '2022-02-21 19:30:14', '2022-02-24 05:28:46');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_19_105310_create_groups_table', 2),
(6, '2022_02_21_103218_create_categories_table', 3),
(7, '2022_02_22_060621_create_products_table', 4),
(8, '2022_02_22_111242_create_subcategorys_table', 5),
(9, '2022_03_30_013434_create_orders_table', 6),
(10, '2022_03_30_014804_create_order_items_table', 6),
(11, '2022_04_15_144806_create_wishlists_table', 7),
(12, '2022_04_16_231426_create_coupons_table', 8),
(13, '2022_04_21_033921_create_sliders_table', 9),
(14, '2022_05_05_034010_create_ratings_table', 10),
(15, '2022_05_06_223008_create_reviews_table', 11),
(16, '2022_06_08_103815_create_table_userverifyemails', 12),
(17, '2022_06_08_105257_create_user_verify_emails_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tracking_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracking_msg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_mode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` tinyint(4) NOT NULL DEFAULT '0',
  `order_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=pendding, 1=completed,2=cancelled',
  `cancel_reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notify` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `tracking_no`, `tracking_msg`, `payment_mode`, `payment_id`, `payment_status`, `order_status`, `cancel_reason`, `notify`, `created_at`, `updated_at`) VALUES
(29, 6, 'ecommerce6200', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-13 08:42:51', '2022-06-13 08:42:51'),
(30, 6, 'ecommerce8071', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-13 08:48:09', '2022-06-13 08:48:09'),
(31, 6, 'ecommerce9924', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-13 08:52:04', '2022-06-13 08:52:04'),
(32, 6, 'ecommerce9030', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-13 09:01:19', '2022-06-13 09:01:19'),
(33, 6, 'ecommerce9383', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-13 11:34:31', '2022-06-13 11:34:31'),
(34, 6, 'ecommerce8727', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-13 11:36:52', '2022-06-13 11:36:52'),
(35, 6, 'ecommerce2325', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-13 11:43:45', '2022-06-13 11:43:45'),
(36, 6, 'ecommerce7461', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-13 11:46:10', '2022-06-13 11:46:10'),
(37, 6, 'ecommerce6313', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-13 11:50:13', '2022-06-13 11:50:13'),
(38, 6, 'ecommerce8925', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-13 11:54:31', '2022-06-13 11:54:31'),
(39, 6, 'ecommerce3209', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-13 12:01:10', '2022-06-13 12:01:10'),
(40, 6, 'ecommerce8710', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-13 12:02:45', '2022-06-13 12:02:45'),
(41, 6, 'ecommerce1745', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-13 12:14:46', '2022-06-13 12:14:46'),
(42, 6, 'ecommerce9659', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-13 12:17:40', '2022-06-13 12:17:40'),
(43, 6, 'ecommerce4155', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-13 12:19:49', '2022-06-13 12:19:49'),
(44, 6, 'ecommerce3878', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-13 12:31:11', '2022-06-13 12:31:11'),
(45, 6, 'ecommerce9151', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-13 12:34:59', '2022-06-13 12:34:59'),
(46, 14, 'ecommerce9028', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-13 23:15:31', '2022-06-13 23:15:31'),
(47, 14, 'ecommerce4455', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-13 23:23:55', '2022-06-13 23:23:55'),
(48, 16, 'ecommerce4296', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-13 23:35:09', '2022-06-13 23:35:09'),
(49, 21, 'ecommerce8474', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-13 23:54:51', '2022-06-13 23:54:51'),
(50, 24, 'ecommerce7527', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-14 05:49:14', '2022-06-14 05:49:14'),
(51, 24, 'ecommerce8491', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-14 06:34:33', '2022-06-14 06:34:33'),
(52, 25, 'ecommerce3836', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-14 07:24:18', '2022-06-14 07:24:18'),
(53, 25, 'ecommerce9838', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-14 08:10:42', '2022-06-14 08:10:42'),
(54, 27, 'ecommerce9376', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-14 09:15:13', '2022-06-14 09:15:13'),
(55, 27, 'ecommerce1713', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-14 09:27:53', '2022-06-14 09:27:53'),
(56, 6, 'ecommerce9277', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-14 10:29:14', '2022-06-14 10:29:14'),
(57, 6, 'ecommerce3356', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-14 10:36:28', '2022-06-14 10:36:28'),
(58, 6, 'ecommerce9755', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-14 10:38:31', '2022-06-14 10:38:31'),
(59, 6, 'ecommerce4173', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-14 12:08:36', '2022-06-14 12:08:36'),
(60, 6, 'ecommerce5939', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-14 12:12:55', '2022-06-14 12:12:55'),
(61, 6, 'ecommerce9773', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-14 12:21:57', '2022-06-14 12:21:57'),
(62, 6, 'ecommerce8498', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-14 12:40:47', '2022-06-14 12:40:47'),
(63, 6, 'ecommerce6156', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-14 13:05:19', '2022-06-14 13:05:19'),
(64, 6, 'ecommerce9919', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-14 13:13:39', '2022-06-14 13:13:39'),
(65, 6, 'ecommerce6247', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-14 13:16:43', '2022-06-14 13:16:43'),
(66, 6, 'ecommerce1155', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-14 22:48:13', '2022-06-14 22:48:13'),
(67, 6, 'ecommerce8507', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-14 22:59:44', '2022-06-14 22:59:44'),
(68, 6, 'ecommerce6066', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-14 23:02:36', '2022-06-14 23:02:36'),
(69, 6, 'ecommerce5723', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-14 23:04:08', '2022-06-14 23:04:08'),
(70, 6, 'ecommerce1738', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-14 23:08:37', '2022-06-14 23:08:37'),
(71, 6, 'ecommerce5513', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-14 23:10:38', '2022-06-14 23:10:38'),
(72, 6, 'ecommerce7560', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-14 23:17:40', '2022-06-14 23:17:40'),
(73, 6, 'ecommerce4259', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-15 13:17:21', '2022-06-15 13:17:21'),
(74, 6, 'ecommerce2407', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-15 13:20:23', '2022-06-15 13:20:23'),
(75, 6, 'ecommerce6711', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-15 13:24:24', '2022-06-15 13:24:24'),
(76, 36, 'ecommerce4738', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-16 00:58:12', '2022-06-16 00:58:12'),
(77, 36, 'ecommerce3278', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-16 01:29:55', '2022-06-16 01:29:55'),
(78, 36, 'ecommerce9020', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-16 07:53:28', '2022-06-16 07:53:28'),
(79, 36, 'ecommerce7085', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-16 08:00:16', '2022-06-16 08:00:16'),
(80, 37, 'ecommerce9316', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-19 00:25:23', '2022-06-19 00:25:23'),
(81, 37, 'ecommerce1651', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-19 01:59:37', '2022-06-19 01:59:37'),
(82, 37, 'ecommerce6369', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-19 02:02:10', '2022-06-19 02:02:10'),
(83, 37, 'ecommerce8343', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-19 02:04:28', '2022-06-19 02:04:28'),
(84, 38, 'ecommerce9983', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-19 19:14:06', '2022-06-19 19:14:06'),
(85, 37, 'ecommerce4211', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-20 00:01:35', '2022-06-20 00:01:35'),
(86, 38, 'ecommerce4868', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-20 00:10:04', '2022-06-20 00:10:04'),
(87, 38, 'ecommerce3152', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-20 00:40:55', '2022-06-20 00:40:55'),
(88, 38, 'ecommerce1950', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-20 00:45:31', '2022-06-20 00:45:31'),
(89, 38, 'ecommerce5988', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-20 00:49:36', '2022-06-20 00:49:36'),
(90, 37, 'ecommerce5986', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-20 01:17:10', '2022-06-20 01:17:10'),
(91, 37, 'ecommerce4891', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-20 01:22:12', '2022-06-20 01:22:12'),
(92, 37, 'ecommerce6695', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-20 01:22:49', '2022-06-20 01:22:49'),
(93, 37, 'ecommerce1948', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-20 01:31:34', '2022-06-20 01:31:34'),
(94, 37, 'ecommerce9605', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-20 01:36:55', '2022-06-20 01:36:55'),
(95, 37, 'ecommerce1579', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-20 01:39:52', '2022-06-20 01:39:52'),
(96, 38, 'ecommerce6514', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-24 05:55:01', '2022-06-24 05:55:01'),
(97, 38, 'ecommerce5092', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-24 06:59:05', '2022-06-24 06:59:05'),
(98, 38, 'ecommerce4175', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-24 07:03:17', '2022-06-24 07:03:17'),
(99, 38, 'ecommerce8868', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-24 07:06:37', '2022-06-24 07:06:37'),
(100, 38, 'ecommerce4088', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-24 07:07:40', '2022-06-24 07:07:40'),
(101, 38, 'ecommerce9459', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-24 07:17:33', '2022-06-24 07:17:33'),
(102, 40, 'ecommerce7333', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-06-28 07:42:15', '2022-06-28 07:42:15'),
(103, 37, 'ecommerce6467', NULL, 'Cash on Delivery', NULL, 0, 0, NULL, 0, '2022-07-01 05:32:46', '2022-07-01 05:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `tax_amt` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `price`, `tax_amt`, `quantity`, `created_at`, `updated_at`) VALUES
(31, 29, 23, 38999, NULL, 1, '2022-06-13 08:42:51', '2022-06-13 08:42:51'),
(32, 30, 22, 33999, NULL, 1, '2022-06-13 08:48:09', '2022-06-13 08:48:09'),
(33, 31, 21, 45999, NULL, 1, '2022-06-13 08:52:04', '2022-06-13 08:52:04'),
(34, 32, 23, 38999, NULL, 1, '2022-06-13 09:01:19', '2022-06-13 09:01:19'),
(35, 33, 22, 33999, NULL, 1, '2022-06-13 11:34:31', '2022-06-13 11:34:31'),
(36, 34, 21, 45999, NULL, 1, '2022-06-13 11:36:52', '2022-06-13 11:36:52'),
(37, 35, 24, 58999, NULL, 1, '2022-06-13 11:43:45', '2022-06-13 11:43:45'),
(38, 36, 22, 33999, NULL, 1, '2022-06-13 11:46:10', '2022-06-13 11:46:10'),
(39, 37, 22, 33999, NULL, 1, '2022-06-13 11:50:13', '2022-06-13 11:50:13'),
(40, 38, 22, 33999, NULL, 1, '2022-06-13 11:54:31', '2022-06-13 11:54:31'),
(41, 39, 22, 33999, NULL, 1, '2022-06-13 12:01:10', '2022-06-13 12:01:10'),
(42, 40, 22, 33999, NULL, 1, '2022-06-13 12:02:45', '2022-06-13 12:02:45'),
(43, 41, 22, 33999, NULL, 1, '2022-06-13 12:14:46', '2022-06-13 12:14:46'),
(44, 42, 22, 33999, NULL, 1, '2022-06-13 12:17:40', '2022-06-13 12:17:40'),
(45, 43, 23, 38999, NULL, 1, '2022-06-13 12:19:49', '2022-06-13 12:19:49'),
(46, 44, 23, 38999, NULL, 1, '2022-06-13 12:31:11', '2022-06-13 12:31:11'),
(47, 45, 22, 33999, NULL, 1, '2022-06-13 12:34:59', '2022-06-13 12:34:59'),
(48, 46, 23, 38999, NULL, 1, '2022-06-13 23:15:31', '2022-06-13 23:15:31'),
(49, 47, 23, 38999, NULL, 1, '2022-06-13 23:23:55', '2022-06-13 23:23:55'),
(50, 48, 21, 45999, NULL, 1, '2022-06-13 23:35:09', '2022-06-13 23:35:09'),
(51, 49, 24, 58999, NULL, 1, '2022-06-13 23:54:51', '2022-06-13 23:54:51'),
(52, 50, 11, 99000, NULL, 1, '2022-06-14 05:49:14', '2022-06-14 05:49:14'),
(53, 50, 5, 99000, NULL, 1, '2022-06-14 05:49:14', '2022-06-14 05:49:14'),
(54, 51, 22, 33999, NULL, 1, '2022-06-14 06:34:33', '2022-06-14 06:34:33'),
(55, 52, 21, 45999, NULL, 1, '2022-06-14 07:24:18', '2022-06-14 07:24:18'),
(56, 53, 20, 38999, NULL, 1, '2022-06-14 08:10:42', '2022-06-14 08:10:42'),
(57, 54, 20, 38999, NULL, 2, '2022-06-14 09:15:13', '2022-06-14 09:15:13'),
(58, 55, 19, 25999, NULL, 1, '2022-06-14 09:27:53', '2022-06-14 09:27:53'),
(59, 56, 21, 45999, NULL, 1, '2022-06-14 10:29:14', '2022-06-14 10:29:14'),
(60, 57, 22, 33999, NULL, 1, '2022-06-14 10:36:28', '2022-06-14 10:36:28'),
(61, 58, 23, 38999, NULL, 1, '2022-06-14 10:38:31', '2022-06-14 10:38:31'),
(62, 59, 11, 99000, NULL, 1, '2022-06-14 12:08:36', '2022-06-14 12:08:36'),
(63, 60, 17, 27999, NULL, 2, '2022-06-14 12:12:55', '2022-06-14 12:12:55'),
(64, 61, 4, 35999, NULL, 1, '2022-06-14 12:21:57', '2022-06-14 12:21:57'),
(65, 62, 14, 87999, NULL, 2, '2022-06-14 12:40:47', '2022-06-14 12:40:47'),
(66, 63, 20, 38999, NULL, 1, '2022-06-14 13:05:19', '2022-06-14 13:05:19'),
(67, 63, 11, 99000, NULL, 1, '2022-06-14 13:05:19', '2022-06-14 13:05:19'),
(68, 63, 9, 58999, NULL, 1, '2022-06-14 13:05:19', '2022-06-14 13:05:19'),
(69, 63, 5, 99000, NULL, 1, '2022-06-14 13:05:19', '2022-06-14 13:05:19'),
(70, 64, 23, 38999, NULL, 1, '2022-06-14 13:13:39', '2022-06-14 13:13:39'),
(71, 65, 24, 58999, NULL, 1, '2022-06-14 13:16:43', '2022-06-14 13:16:43'),
(72, 66, 21, 45999, NULL, 1, '2022-06-14 22:48:13', '2022-06-14 22:48:13'),
(73, 67, 11, 99000, NULL, 1, '2022-06-14 22:59:44', '2022-06-14 22:59:44'),
(74, 68, 20, 38999, NULL, 2, '2022-06-14 23:02:36', '2022-06-14 23:02:36'),
(75, 69, 22, 33999, NULL, 1, '2022-06-14 23:04:08', '2022-06-14 23:04:08'),
(76, 70, 5, 99000, NULL, 2, '2022-06-14 23:08:37', '2022-06-14 23:08:37'),
(77, 71, 4, 35999, NULL, 2, '2022-06-14 23:10:38', '2022-06-14 23:10:38'),
(78, 72, 8, 29999, NULL, 3, '2022-06-14 23:17:40', '2022-06-14 23:17:40'),
(79, 72, 13, 36999, NULL, 1, '2022-06-14 23:17:40', '2022-06-14 23:17:40'),
(80, 73, 21, 45999, NULL, 1, '2022-06-15 13:17:21', '2022-06-15 13:17:21'),
(81, 73, 22, 33999, NULL, 1, '2022-06-15 13:17:21', '2022-06-15 13:17:21'),
(82, 74, 23, 38999, NULL, 1, '2022-06-15 13:20:23', '2022-06-15 13:20:23'),
(83, 75, 23, 38999, NULL, 1, '2022-06-15 13:24:24', '2022-06-15 13:24:24'),
(84, 76, 23, 38999, NULL, 1, '2022-06-16 00:58:12', '2022-06-16 00:58:12'),
(85, 76, 21, 45999, NULL, 1, '2022-06-16 00:58:12', '2022-06-16 00:58:12'),
(86, 76, 10, 99000, NULL, 1, '2022-06-16 00:58:12', '2022-06-16 00:58:12'),
(87, 76, 9, 58999, NULL, 1, '2022-06-16 00:58:12', '2022-06-16 00:58:12'),
(88, 77, 5, 99000, NULL, 1, '2022-06-16 01:29:55', '2022-06-16 01:29:55'),
(89, 78, 24, 58999, NULL, 1, '2022-06-16 07:53:28', '2022-06-16 07:53:28'),
(90, 78, 23, 38999, NULL, 1, '2022-06-16 07:53:28', '2022-06-16 07:53:28'),
(91, 78, 21, 45999, NULL, 1, '2022-06-16 07:53:28', '2022-06-16 07:53:28'),
(92, 79, 24, 58999, NULL, 1, '2022-06-16 08:00:16', '2022-06-16 08:00:16'),
(93, 79, 11, 99000, NULL, 1, '2022-06-16 08:00:16', '2022-06-16 08:00:16'),
(94, 79, 12, 88999, NULL, 1, '2022-06-16 08:00:16', '2022-06-16 08:00:16'),
(95, 79, 5, 99000, NULL, 1, '2022-06-16 08:00:16', '2022-06-16 08:00:16'),
(96, 80, 24, 58999, NULL, 1, '2022-06-19 00:25:23', '2022-06-19 00:25:23'),
(97, 81, 23, 38999, NULL, 1, '2022-06-19 01:59:37', '2022-06-19 01:59:37'),
(98, 82, 21, 45999, NULL, 1, '2022-06-19 02:02:10', '2022-06-19 02:02:10'),
(99, 83, 24, 58999, NULL, 1, '2022-06-19 02:04:28', '2022-06-19 02:04:28'),
(100, 84, 6, 99000, NULL, 2, '2022-06-19 19:14:06', '2022-06-19 19:14:06'),
(101, 85, 10, 99000, NULL, 1, '2022-06-20 00:01:35', '2022-06-20 00:01:35'),
(102, 86, 23, 38999, NULL, 1, '2022-06-20 00:10:04', '2022-06-20 00:10:04'),
(103, 87, 24, 58999, NULL, 1, '2022-06-20 00:40:55', '2022-06-20 00:40:55'),
(104, 88, 5, 99000, NULL, 1, '2022-06-20 00:45:31', '2022-06-20 00:45:31'),
(105, 89, 15, 55999, NULL, 1, '2022-06-20 00:49:36', '2022-06-20 00:49:36'),
(106, 90, 10, 99000, NULL, 1, '2022-06-20 01:17:10', '2022-06-20 01:17:10'),
(107, 92, 7, 51999, NULL, 1, '2022-06-20 01:22:49', '2022-06-20 01:22:49'),
(108, 93, 13, 36999, NULL, 1, '2022-06-20 01:31:34', '2022-06-20 01:31:34'),
(109, 94, 3, 25999, NULL, 1, '2022-06-20 01:36:55', '2022-06-20 01:36:55'),
(110, 95, 9, 58999, NULL, 1, '2022-06-20 01:39:52', '2022-06-20 01:39:52'),
(111, 96, 16, 23999, NULL, 1, '2022-06-24 05:55:01', '2022-06-24 05:55:01'),
(112, 97, 21, 45999, NULL, 1, '2022-06-24 06:59:05', '2022-06-24 06:59:05'),
(113, 98, 4, 35999, NULL, 1, '2022-06-24 07:03:17', '2022-06-24 07:03:17'),
(114, 98, 5, 99000, NULL, 1, '2022-06-24 07:03:17', '2022-06-24 07:03:17'),
(115, 99, 4, 35999, NULL, 1, '2022-06-24 07:06:37', '2022-06-24 07:06:37'),
(116, 99, 5, 99000, NULL, 1, '2022-06-24 07:06:37', '2022-06-24 07:06:37'),
(117, 100, 4, 35999, NULL, 1, '2022-06-24 07:07:40', '2022-06-24 07:07:40'),
(118, 100, 5, 99000, NULL, 1, '2022-06-24 07:07:40', '2022-06-24 07:07:40'),
(119, 101, 21, 45999, NULL, 1, '2022-06-24 07:17:33', '2022-06-24 07:17:33'),
(120, 101, 23, 38999, NULL, 1, '2022-06-24 07:17:33', '2022-06-24 07:17:33'),
(121, 102, 23, 38999, NULL, 1, '2022-06-28 07:42:15', '2022-06-28 07:42:15'),
(122, 103, 23, 38999, NULL, 2, '2022-07-01 05:32:46', '2022-07-01 05:32:46'),
(123, 103, 21, 45999, NULL, 2, '2022-07-01 05:32:46', '2022-07-01 05:32:46'),
(124, 103, 4, 35999, NULL, 2, '2022-07-01 05:32:46', '2022-07-01 05:32:46'),
(125, 103, 5, 99000, NULL, 2, '2022-07-01 05:32:46', '2022-07-01 05:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('msufyansheikh66.st@gmail.com', '$2y$10$FAgZfZABb9qTcnOYmUNnJue5YN.n7mp1mUq633jZahzb4lp9oMdcW', '2022-06-28 07:46:40');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `small_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_highlight_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_highlights` longtext COLLATE utf8mb4_unicode_ci,
  `p_description_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_description` longtext COLLATE utf8mb4_unicode_ci,
  `p_details_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_details` longtext COLLATE utf8mb4_unicode_ci,
  `sale_tag` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `original_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_price` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_amt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `priority` int(11) NOT NULL DEFAULT '0',
  `new_arrival_products` tinyint(4) NOT NULL DEFAULT '0',
  `feature_products` tinyint(4) NOT NULL DEFAULT '0',
  `popular_products` tinyint(4) NOT NULL DEFAULT '0',
  `offers_products` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `meta_title` mediumtext COLLATE utf8mb4_unicode_ci,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `meta_keyword` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sub_category_id`, `name`, `url`, `small_description`, `image`, `p_highlight_heading`, `p_highlights`, `p_description_heading`, `p_description`, `p_details_heading`, `p_details`, `sale_tag`, `original_price`, `offer_price`, `tax_amt`, `quantity`, `priority`, `new_arrival_products`, `feature_products`, `popular_products`, `offers_products`, `status`, `meta_title`, `meta_description`, `meta_keyword`, `created_at`, `updated_at`) VALUES
(1, 1, 'Red Mi Note 7 Pro', 'red-note-7-pro', 'Enjoy a seamless and efficient smartphone experience, thanks to the powerful 2.0 GHz Qualcomm Snapdragon 675 processor. Whether you\'re playing games, watching videos, or browsing the Internet, the Redmi Note 7 Pro delivers a super-fast performance. It also comes with 64 GB of storage capacity, so you can store all your pictures and music with ease.', '1650741861.png', 'HighLights', 'Enjoy a seamless and efficient smartphone experience, thanks to the powerful 2.0 GHz Qualcomm Snapdragon 675 processor. Whether you\'re playing games, watching videos, or browsing the Internet, the Redmi Note 7 Pro delivers a super-fast performance. It also comes with 64 GB of storage capacity, so you can store all your pictures and music with ease.', 'Product Description', 'It\'s time to go big with the Redmi Note 7 Pro\'s 16-cm (6.3) FHD+ Dot Notch display. Powered by a 2.0 GHz Qualcomm Snapdragon 675 processor and 4 GB of RAM, this smartphone lets you experience the next level of performance and control. With a (48 MP + 5 MP) dual-rear camera, a 13 MP front camera, and features such as Face Unlock and 4K Video Recording, the Redmi Note 7 Pro truly puts a new spin on your smartphone experience.', 'Specification', '<ul><li><font color=\"#636363\">6 GB RAM | 64 GB ROM | Expandable Upto 256 GB</font></li><li><font color=\"#636363\">16.0 cm (6.3 inch) Full HD+ Display</font></li><li><font color=\"#636363\">48MP + 5MP | 13MP Front Camera</font></li><li><font color=\"#636363\">4000 mAh Li-polymer Battery</font></li><li><font color=\"#636363\">Qualcomm Snapdragon 675 Processor</font></li><li><font color=\"#636363\">Splash Proof - Protected by P2i</font></li><li><font color=\"#636363\">Quick Charge 4.0 Support</font></li><li><font color=\"#636363\">Brand Warranty of 1 Year Available for Mobile and 6 Months for Accessories</font></li></ul>', 'New', '16000', '12500', '16', 60, 0, 1, 0, 0, 0, 0, 'Red mi Note 7 pro', 'Red mi Note 7 pro, mi brand new featured mobile phone', 'Red mi Note 7 pro, mi brand new featured mobile phone', '2022-02-24 11:16:46', '2022-06-09 22:30:50'),
(2, 1, 'REDMI Note 10S', 'RED-MI-Note-10S', 'The 64 MP quad camera setup on this mobile phone allows you to capture the stunning landscape photography around you and delivers smooth image processing. Also, you can utilize various modes such as Timelapse and Night mode to further enhance the image quality which is captured in dark light settings.', '1650742174.jpg', 'HighLight', 'Unleash the gaming enthusiasm in you with the powerful Redmi Note 10s smartphone. This mobile phone features a 16.33 cm (6.42) Super AMOLED display to ensure a smooth viewing and gaming experience. Also, it is driven by an efficient Helio G95 processor and HyperEngine Game Technology that lets you enjoy stellar performance and seamless gaming', 'Product Description', 'Powered by a Helio G95 processor and HyperEngine Game Technology, the Redmi Note 10s smartphone ensures seamless and sustained gaming performance with flawless picture quality, thus letting you defeat your virtual opponents like a warrior.', 'Specification', '<ul><li><font color=\"#636363\">6 GB RAM | 64 GB ROM | Expandable Upto 512 GB</font></li><li><font color=\"#636363\">16.33 cm (6.43 inch) Full HD+ Super AMOLED Display</font></li><li><font color=\"#636363\">64MP + 8MP + 2MP + 2MP | 13MP Front Camera</font></li><li><font color=\"#636363\">5000 mAh Lithium-Ploymer Battery</font></li><li><font color=\"#636363\">Mediatek Helio G95 Processor</font></li><li><font color=\"#636363\">1 Year Manufacturer Warranty for Phone and 6 Months Warranty for In the Box Accessories</font></li></ul>', 'Future', '36000', '30000', NULL, 0, 0, 1, 0, 0, 0, 0, 'REDMI Note 10S', 'REDMI Note 10S, mi brand new featured mobile phone', 'REDMI Note 10S, mi brand new featured mobile phone', '2022-03-07 12:28:43', '2022-06-09 20:44:40'),
(3, 2, 'SAMSUNG Galaxy F22', 'samsung-galaxy-f22', 'Bid goodbye to screen stuttering, poor display quality, and low-resolution photos by getting your hands on the Samsung Galaxy F22 smartphone. Featuring a 90 Hz refresh rate, HD+ sAMOLED display, and True 48 MP quad-rear camera, this smartphone is sure to be your ideal companion for entertainment, gaming, and communication. What\'s more, its 6000 mAh battery ensures that a full charge can last for an entire day.', '1650742538.jpg', 'HighLights', 'Quick Charge 4.0 Support\r\nBrand Warranty of 1 Year Available for Mobile and 6 Months for Accessories', 'Product Description', 'The Samsung Galaxy F22 smartphone comes with an HD+ sAMOLED display, which delivers rich and vivid visuals, irrespective of the content you\'re watching. Also, you can enjoy a smooth scrolling experience with minimal motion blur, thanks to the 90 Hz refresh rate.', 'Specification', '<ul><li><font color=\"#636363\">4 GB RAM | 64 GB ROM | Expandable Upto 1 TB</font></li><li><font color=\"#636363\">16.26 cm (6.4 inch) HD+ Display</font></li><li><font color=\"#636363\">48MP + 8MP + 2MP + 2MP | 13MP Front Camera</font></li><li><font color=\"#636363\">6000 mAh Lithium-ion Battery</font></li><li><font color=\"#636363\">MediaTek Helio G80 Processor</font></li><li><font color=\"#636363\">1 Year Warranty Provided by the Manufacturer from Date of Purchase</font></li></ul>', 'New', '26999', '25999', NULL, 6, 7, 1, 0, 0, 0, 0, 'SAMSUNG Galaxy F22', 'SAMSUNG Galaxy F22, samsung brand new featured mobile phone', 'SAMSUNG Galaxy F22, samsung brand new featured mobile phone', '2022-04-23 10:59:44', '2022-06-09 22:25:36'),
(4, 2, 'SAMSUNG Galaxy F23 5G', 'SAMSUNG-Galaxy-F23-5G', 'Powered by a fast Qualcomm Snapdragon 750G processor, the Samsung Galaxy F23 smartphone lets you play games, watch movies, and do more with negligible latency, thus intensifying your productivity.', '1654716359.jpg', 'HighLights', 'Boasting an innovative RAM Plus feature, this 5G smartphone lets you enjoy an expanded RAM capacity of up to 12 GB. As a result, you can seamlessly shuffle between gaming, streaming of movies, video calling and much more, at the same time', 'Product Description', 'Transform your daily entertainment and gaming sessions into a thrilling experience by bringing home the Samsung Galaxy F23 5G mobile phone. This phone features a 16.25 (6.4) Full HD+ Infinity-U Display and a fast refresh rate of up to 120 Hz so that you can enjoy a seamless browsing and stunning visual experience. It runs on a Snapdragon 750G processor, which allows you to indulge in intense and productive gaming sessions. Also, it comes with a Auto Data Switching feature so that you can effortlessly switch to a secondary SIM network when the primary SIM loses its network.', 'Specification', '<ul><li><font color=\"#636363\">6 GB RAM | 128 GB ROM | Expandable Upto 1 TB</font></li><li><font color=\"#636363\">16.76 cm (6.6 inch) Full HD+ Display</font></li><li><font color=\"#636363\">50MP + 8MP + 2MP | 8MP Front Camera</font></li><li><font color=\"#636363\">5000 mAh Lithium Ion Battery</font></li><li><font color=\"#636363\">Qualcomm Snapdragon 750G Processor</font></li><li><font color=\"#636363\">1 Year Warranty Provided by the Manufacturer from Date of Purchase</font></li></ul>', 'New', '36999', '35999', NULL, 5, 5, 0, 0, 1, 0, 0, 'SAMSUNG Galaxy F23 5G', 'SAMSUNG Galaxy F23 5G samsung new featured mobile phone', 'SAMSUNG Galaxy F23 5G samsung new featured mobile phone', '2022-06-08 19:59:53', '2022-06-22 23:46:21'),
(5, 2, 'SAMSUNG Galaxy S22 ultra 5G', 'SAMSUNG-Galaxy-S22-ultra 5G', 'Fingerprint (under display, ultrasonic), accelerometer, gyro, proximity, compass, barometer Samsung DeX, Samsung Wireless DeX (desktop experience support) Bixby natural language commands and dictation Samsung Pay (Visa, MasterCard certified) Ultra Wideband (UWB) support', '1654717920.jpg', 'HighLights', 'Fingerprint (under display, ultrasonic), accelerometer, gyro, proximity, compass, barometer Samsung DeX, Samsung Wireless DeX (desktop experience support) Bixby natural language commands and dictation Samsung Pay (Visa, MasterCard certified) Ultra Wideband (UWB) support', 'Product Description', 'Fingerprint (under display, ultrasonic), accelerometer, gyro, proximity, compass, barometer Samsung DeX, Samsung Wireless DeX (desktop experience support) Bixby natural language commands and dictation Samsung Pay (Visa, MasterCard certified) Ultra Wideband (UWB) support', 'Specification', '<ul><li><font color=\"#636363\">12 GB RAM | 256 GB ROM</font></li><li><font color=\"#636363\">17.27 cm (6.8 inch) Display</font></li><li><font color=\"#636363\">108MP Rear Camera</font></li><li><font color=\"#636363\">5000 mAh Battery</font></li><li><font color=\"#636363\">1 Year</font></li></ul>', 'new', '100000', '99000', NULL, 60, 5, 1, 0, 0, 0, 0, 'SAMSUNG Galaxy S22 ultra 5G', 'SAMSUNG Galaxy S22 ultra 5G, samsung brand new featured mobile phone', 'SAMSUNG Galaxy S22 ultra 5G, samsung brand new featured mobile phone', '2022-06-08 20:50:58', '2022-06-10 06:26:51'),
(6, 2, 'Samsung Galaxy S10+', 'Samsung-Galaxy-S10+', 'Get ready to explore the next generation of powerful computing and mobile photography with the Samsung Galaxy S10. It comes with an Intelligent Camera that automatically optimizes its settings to give you picture-perfect photos. That\'s not all, the Samsung S10 has the Infinity-O Display and a seamless design that make this smartphone a true masterpiece.', '1654719988.jpg', 'HighLights', 'The Samsung S10 is designed to give you a smartphone experience like never before. How? It has no notch and no distractions, which make it a smartphone worth showing off. Its Precise Laser Cutting, On-screen Security, and its Dynamic AMOLED screen ensure that this smartphone is easy on your eyes while also enhancing your user experience.', 'Product Description', 'Get ready to explore the next generation of powerful computing and mobile photography with the Samsung Galaxy S10. It comes with an Intelligent Camera that automatically optimizes its settings to give you picture-perfect photos. That\'s not all, the Samsung S10 has the Infinity-O Display and a seamless design that make this smartphone a true masterpiece.', 'Specification', '<ul><li><font color=\"#636363\">8 GB RAM | 512 GB ROM | Expandable Upto 512 GB</font></li><li><font color=\"#636363\">15.49 cm (6.1 inch) Quad HD+ Display</font></li><li><font color=\"#636363\">16MP + 12MP | 10MP Front Camera</font></li><li><font color=\"#636363\">3400 mAh Lithium-ion Battery</font></li><li><font color=\"#636363\">Exynos 9 9820 Processor</font></li><li><font color=\"#636363\">Brand Warranty of 1 Year Available for Mobile and 6 Months for Accessories</font></li></ul><p><br></p>', 'New', '100000', '99000', NULL, 60, 7, 0, 1, 0, 0, 0, 'Samsung Galaxy S10+ Plus', 'Samsung Galaxy S10+ Plus, samsung brand new featured mobile phone', 'Samsung Galaxy S10+ Plus, samsung brand new featured mobile phone', '2022-06-08 21:26:28', '2022-06-22 20:57:17'),
(7, 3, 'Vivo V23e', 'Vivo-V23e', 'This mobile phone features a Fluorite AG Glass that glows when it comes in contact with multiple lights. Also, the matte texture and diffused surface coating on its body allow you to get a firm grip and safety against fingerprints', '1654804849.jpg', 'HighLights', 'The Vivo V23e mobile comes with a thickness of around 7.32 mm and a weight of about 172 g so that you can easily carry it wherever you go.', 'Product Description', 'Indulge in unlimited entertainment with the Vivo V23e smartphone. Furthermore, this mobile phone is powered by MediaTek Dimensity 810 processor that allows you to enjoy a seamless performance. Also, Moreover, it is equipped with a 4050 mAh battery so that you can keep playing your favorite games without worrying about the battery running out. Finally, thanks to the Funtouch OS feature, you can enjoy a range of personalized features on this phone.', 'Specification', '<div><font color=\"#636363\"><br></font></div><ul><li><font color=\"#636363\">8 GB RAM | 128 GB ROM | Expandable Upto 1 TB</font></li><li><font color=\"#636363\">16.36 cm (6.44 inch) Full HD+ AMOLED Display</font></li><li><font color=\"#636363\">50MP + 8MP + 2MP | 44MP Front Camera</font></li><li><font color=\"#636363\">4050 mAh Lithium Battery</font></li><li><font color=\"#636363\">Mediatek Dimensity 810 Processo</font>r</li></ul>', 'New', '52999', '51999', NULL, 60, 7, 0, 1, 0, 0, 0, 'vivo V23e 5G', 'vivo V23e 5G, samsung brand new featured mobile phone', 'vivo V23e 5G, samsung brand new featured mobile phone', '2022-06-09 21:00:49', '2022-06-22 20:57:45'),
(8, 3, 'vivo Y20s', 'vivo-Y20s', 'Thanks to this mobile phone’s 18 W Fast Charge technology and 5,000 mAh battery, you can enjoy the convenience of charging your device on the go and long hours of battery power. It also supports OTG reverse charging', '1654807513.jpg', 'HighLights', 'You can use the side fingerprint sensor to enjoy instantaneous and intuitive unlocking of the mobile phone. And, the Face Wake technology gives you another way to unlock your phone in a few seconds', 'Product Description', 'The Vivo Y20G supports 18 W Fast Charge and is equipped with a 5000 mAh battery so that you can conveniently charge your phone on the go and bid adieu to low-battery problems. Thanks to its 2 MP Bokeh camera, your portrait shots will look more realistic, natural, and have greater depth. And, with its 4D Game Vibration 2.0 feature, you can enjoy immersive gaming, free of distracting alerts and incoming calls, ensuring your victory at all times.', 'Specification', '<ul><li><font color=\"#636363\">4 GB RAM | 64 GB ROM | Expandable Upto 256 GB</font></li><li><font color=\"#636363\">16.54 cm (6.51 inch) HD+ Display</font></li><li><font color=\"#636363\">13MP + 2MP + 2MP | 8MP Front Camera</font></li><li><font color=\"#636363\">5000 mAh Li-ion Battery</font></li><li><font color=\"#636363\">MediaTek Helio P35 Processor</font></li><li><font color=\"#636363\">1 Year for Handset and 6 Months for In-box Accessories</font></li></ul>', 'New', '30999', '29999', NULL, 60, 5, 0, 1, 0, 0, 0, 'vivo Y20s', 'vivo Y20s, vivo brand new featured mobile phone', 'vivo Y20s, vivo brand new featured mobile phone', '2022-06-09 21:45:13', '2022-06-22 20:56:28'),
(9, 3, 'Vivo V19', 'Vivo-V19', 'Its 8-megapixel super wide-angle selfie camera helps broaden your selfie perspective by up to 25.6 degrees, helping you look your absolute best.', '1654815618.jpg', 'HighLights', 'The V19 features a dual-front camera system, which includes a 32-megapixel main camera and an 8-megapixel super wide-angle camera, to ensure that your selfie game is on a whole new level.', 'Product Description', 'Enjoy a true blue smartphone experience with the V19 handset from Vivo. Featuring a Qualcomm Snapdragon 712 processor and up to 8 GB of RAM, this smartphone delivers power-packed performance that will blow your mind. Its 4,500-mAh battery helps you use this device for long hours, so you are always prepared for more.', 'Specification', '<ul><li><font color=\"#636363\">8 GB RAM | 128 GB ROM | Expandable Upto 512 GB</font></li><li><font color=\"#636363\">16.36 cm (6.44 inch) Full HD+ Display</font></li><li><font color=\"#636363\">48MP + 8MP + 2MP + 2MP | 32MP + 8MP Dual Front Camera</font></li><li><font color=\"#636363\">4500 mAh Lithium-ion Battery</font></li><li><font color=\"#636363\">Qualcomm Snapdragon 712 AIE Processor</font></li><li><font color=\"#636363\">1 Year for Handset and 6 Months for In-box Accessories</font></li></ul>', 'New', '59999', '58999', NULL, 60, 7, 0, 1, 0, 0, 0, 'Vivo V19', 'Vivo V19, vivo brand new featured mobile phone', 'Vivo V19, vivo brand new featured mobile phone', '2022-06-10 00:00:18', '2022-06-22 20:59:13'),
(10, 3, 'Vivo X60 Pro', 'Vivo-X60-Pro', 'The Vivo X60 Pro makes use of the ZEISS Co-engineered Imaging System that enhances smartphone photography. This way, you can capture beautiful images that look professional and are distortion-free.', '1654816374.jpg', 'HighLights', 'This mobile phone can replicate the swirly bokeh effect of the classic ZEISS Biotar lens. This way, you can add a surreal effect to the images that you capture.', 'Product Description', 'The Vivo X60 Pro features a 48 MP triple rear camera so that you can indulge in your passion for photography. Its Pro Sports Mode enables better focusing and addresses camera shakes so that you can capture sports events with clarity and without shakes. And, thanks to the 120 Hz refresh rate of the mobile phone, you can enjoy smooth graphics so that while gaming, the visuals are blur-free.', 'Specification', '<ul><li><font color=\"#636363\">12 GB RAM | 256 GB ROM</font></li><li><font color=\"#636363\">16.66 cm (6.56 inch) Full HD+ Display</font></li><li><font color=\"#636363\">48MP + 13MP + 13MP | 32MP Front Camera</font></li><li><font color=\"#636363\">4200 mAh Lithium-ion Battery</font></li><li><font color=\"#636363\">Qualcomm Snapdragon 870 Processor</font></li><li><font color=\"#636363\">AMOLED Display</font></li><li><font color=\"#636363\">1 Year for Handset and 6 Months for In-box Accessories</font></li></ul>', 'New', '100000', '99000', NULL, 60, 7, 0, 1, 0, 0, 0, 'Vivo X60 Pro', 'Vivo X60 Pro, vivo brand new featured mobile phone', 'vivo Y20s, vivo brand new featured mobile phone', '2022-06-10 00:12:54', '2022-06-22 20:59:44'),
(11, 1, 'Xiaomi 12 Pro', 'Xiaomi-12-Pro', 'Evolving from our constant pursuit of excellence in creating what you are longing for, Xiaomi 12 Pro is now ready to master every scene with a pro-grade 50MP triple camera array, WQHD+ dynamic 120Hz display, the most advanced Snapdragon® 8 Gen 1 chipset yet, and intelligent 120W Xiaomi HyperCharge', '1654819148.jpg', 'HighLights', 'Introducing the triple 50MP master camera array with enhanced cinematography technology. Xiaomi 12 Pro helps you to make every moment yours.', 'Product Description', 'The LTPO display panel has been awarded a Seamless Pro certification by SGS on account of the intelligent and power-efficient refresh rate adaptability in different usage scenarios. In one single swipe, the display can adjust from as low as 1Hz to 120Hz refresh rate.', 'Specification', '<ul><li><font color=\"#636363\">12 GB RAM | 256 GB ROM</font></li><li><font color=\"#636363\">17.09 cm (6.73 inch) Full HD+ AMOLED Display</font></li><li><font color=\"#636363\">50MP Rear Camera</font></li><li><font color=\"#636363\">4600 mAh Battery</font></li><li><font color=\"#636363\">Snapdragon@ 8 Gen 1 Processor</font></li><li><font color=\"#636363\">12 Months</font></li></ul>', 'New', '100000', '99000', NULL, 60, 5, 0, 1, 0, 0, 0, 'Xiaomi 12 Pro', 'Xiaomi 12 Pro, mi brand new featured mobile phone', 'Xiaomi 12 Pro, mi brand new featured mobile phone', '2022-06-10 00:48:19', '2022-06-22 21:00:45'),
(12, 1, 'Xiaomi Mi Note 10 Pro', 'Xiaomi-Mi-Note -10-Pro', '2.3GHz Qualcomm Snapdragon 720G with 8nm octa core processor, 48MP rear camera with 8MP ultra-wide, 2MP super macro, 2MP portrait camera. Night mode, 960fps slowmotion', '1654822162.jpg', 'HighLights', '2.3GHz Qualcomm Snapdragon 720G with 8nm octa core processor, 48MP rear camera with 8MP ultra-wide, 2MP super macro, 2MP portrait camera. Night mode, 960fps slowmotion', 'Product Description', '2.3GHz Qualcomm Snapdragon 720G with 8nm octa core processor, 48MP rear camera with 8MP ultra-wide, 2MP super macro, 2MP portrait camera. Night mode, 960fps slowmotion, AI scene recognition, pro color, HDR, pro mode. 16MP front facing camera 16.94 centimeters (6.67-inch) FHD+ full screen dot display LCD multi-touch capacitive touchscreen with 2400 x 1080 pixels resolution 5020mAh lithium-polymer large battery providing talk-time of 29 hours and standby time of 556 hours | 18W fast charger in-box Memory, Storage & SIM: 4GB RAM | 128GB storage | Dual SIM (nano+nano) + Dedicated SD card slot Alexa Hands-Free capable: Download the Alexa app on to use Alexa hands-free. Play music, make calls, hear news, open apps, navigate, and more, using just your voice, while on-the-go. Just ask and Alexa will respond instantly.', 'Specification', '<ul><li><font color=\"#636363\">4 GB RAM | 128 GB ROM</font></li><li><font color=\"#636363\">16.94 cm (6.67 inch) Display</font></li><li><font color=\"#636363\">48MP Rear Camera</font></li><li><font color=\"#636363\">5020 mAh Battery</font></li><li><font color=\"#636363\">12 months</font></li></ul>', 'New', '89999', '88999', NULL, 60, 7, 0, 1, 0, 0, 0, 'Xiaomi Mi Note 10 Pro', 'Xiaomi Mi Note 10 Pro, mi brand new featured mobile phone', 'Xiaomi Mi Note 10 Pro, mi brand new featured mobile phone', '2022-06-10 01:49:22', '2022-06-22 21:01:04'),
(13, 5, 'Oppo Reno 6 Pro', 'Oppo-Reno-6-Pro', 'Powered by AI algorithms, the Bokeh Flare Portrait Video feature runs multiple computations every second to convert the background lights to offer a dream-like effect to your videos.', '1654823085.png', 'HighLights', 'This technology lets you shoot videos against the sun as well as after sunset. This smartphone features OPPO Live HDR and Ultra Night Video algorithms that optimises the ambient light automatically to let you shoot detailed videos.', 'Product Description', 'If life captured through a lens is what excites you or intrigues you, then OPPO Reno6 Pro 5G Diwali Edition can help you click stunning, immersive, and lifelike photos and videos. This OPPO smartphone features Bokeh Flare Portrait Video, AI Highlight Video, and Focus Tracking to capture AI-powered high-quality videos, 64 MP AI Quad Camera to click crystal-clear photos and videos, and a MediaTek Dimensity 1200 processor for seamless multitasking.', 'Specification', '<ul><li><font color=\"#636363\">12 GB RAM | 256 GB ROM</font></li><li><font color=\"#636363\">16.64 cm (6.55 inch) Full HD+ Display</font></li><li><font color=\"#636363\">64MP + 8MP + 2MP + 2MP | 32MP Front Camera</font></li><li><font color=\"#636363\">4500 mAh Lithium-ion Polymer Battery</font></li><li><font color=\"#636363\">MediaTek Dimensity 1200 Processor</font></li><li><font color=\"#636363\">65W SuperVOOC 2.0 Charging</font></li><li><font color=\"#636363\">3D Borderless Screen</font></li><li><font color=\"#636363\">Bokeh Flare Portrait Video | AI Highlight Video | OPPO Reno Glow 2.0</font></li><li><font color=\"#636363\">Brand Warranty of 1 Year Available for Mobile Including Battery and 6 Months for Accessories</font></li></ul>', 'New', '37999', '36999', NULL, 60, 7, 1, 0, 0, 0, 0, 'Oppo Reno 6 Pro', 'Oppo Reno 6 Pro, oppo brand new featured mobile phone', 'Oppo Reno 6 Pro, oppo brand new featured mobile phone', '2022-06-10 02:04:45', '2022-06-10 06:03:56'),
(14, 5, 'OPPO Reno4 Pro', 'OPPO-Reno4-Pro', 'Smooth and aesthetic! This phone’s 3D curved design will be one worth flaunting.', '1654824208.png', 'HighLights', 'From smoother scrolling to fluid animations, you can count on this phone to do every task well, thanks to its high refresh rate (90 Hz).', 'Product Description', 'The OPPO Reno4 Pro smartphone will leave you impressed with its set of features, including the Super AMOLED screen, a 3D curved design, and a 3D multi-cooling system. That’s not all, it boasts a 32 MP selfie camera so that you can click picture-perfect shots. Oh, and when it comes to fun, OPPO\'s features such as the Decision Spinner and Lab Ringtone will pave the way for an unforgettable smartphone usage experience.', 'Specification', '<ul><li><font color=\"#636363\">8 GB RAM | 128 GB ROM | Expandable Upto 256 GB</font></li><li><font color=\"#636363\">16.51 cm (6.5 inch) Full HD+ Display</font></li><li><font color=\"#636363\">48MP + 8MP + 2MP + 2MP | 32MP Front Camera</font></li><li><font color=\"#636363\">4000 mAh Lithium-ion Polymer Battery</font></li><li><font color=\"#636363\">Qualcomm Snapdragon 720G Octa Core Processor</font></li><li><font color=\"#636363\">65W SuperVOOC 2.0</font></li><li><font color=\"#636363\">90Hz AMOLED Display | 3D Borderless Screen</font></li><li><font color=\"#636363\">Brand Warranty of 1 Year Available for Mobile Including Battery and 6 Months for Accessories</font></li></ul>', 'New', '89999', '87999', NULL, 60, 7, 1, 0, 0, 0, 0, 'OPPO Reno4 Pro', 'OPPO Reno4 Pro, oppo brand new featured mobile phone', 'OPPO Reno4 Pro, oppo brand new featured mobile phone', '2022-06-10 02:23:28', '2022-06-10 02:23:28'),
(15, 5, 'OPPO K10', 'OPPO-K10', 'Oppo K10 boasts a stunning design that is eye-catching. Moreover, its dirt-resistant and scratch-proof matte build makes it adventure-ready and durable', '1654824901.jpg', 'HighLights', 'Powered by AI, the camera that is equipped on Oppo K10 helps you capture colour-enriched photos during your travels that are breathtakingly beautiful.', 'Product Description', 'Get the photographer in you to light with Oppo K10. Designed specifically for camera lovers this phone comes with a 50 MP triple camera setup. Thanks to its varied camera features such as Night Scape Mode, Night Flare Portraits, and Bokeh Mode helps capture mesmerising images with crystal-clear imagery. The 16 MP selfie camera captures stunning selfies and helps you boost your social media presence. Powered by Qualcomm Snapdragon 680 with 6 nm architecture, this phone enhances your operational efficiency and gets you on top of your game. Featuring 6 GB of RAM and 128 GB of internal storage, you can practically store all that you want in your phone. Furthermore, this phone boasts a Dynamic RAM Expansion technology that converts unused memory into RAM, thereby, increasing the efficiency of your phone.', NULL, '<ul><li><font color=\"#636363\">6 GB RAM | 128 GB ROM | Expandable Upto 1 TB</font></li><li><font color=\"#636363\">16.74 cm (6.59 inch) Full HD+ Display</font></li><li><font color=\"#636363\">50MP + 2MP + 2MP | 16MP Front Camera</font></li><li><font color=\"#636363\">5000 mAh Lithium Ion Battery</font></li><li><font color=\"#636363\">Qualcomm Snapdragon 680 Processor</font></li><li><font color=\"#636363\">33W SUPERVOOC Charger | Dual Speaker | Super Adaptive Refresh Rate</font></li><li><font color=\"#636363\">AI Photo Suite | OPPO Glow Design with Dirt and Scratch Resistant</font></li><li><font color=\"#636363\">1 Year Manufacturer Warranty for Phone and 6 Months Warranty for In-Box Accessories</font></li></ul>', 'New', '56999', '55999', NULL, 60, 7, 1, 0, 0, 0, 0, 'OPPO K10', 'OPPO K10, oppo brand new featured mobile phone', 'OPPO K10, oppo brand new featured mobile phone', '2022-06-10 02:35:01', '2022-06-10 02:35:01'),
(16, 5, 'OPPO A12', 'OPPO-A12', 'This Oppo A12 smartphone features a 3D Diamond Blaze design, which makes it look stunning and attractive.', '1654825524.jpg', 'HighLights', 'Whether you’re watching movies or playing games, the Oppo A12’s 15.79-cm (6.22) Waterdrop Eye Protection display is here to offer you a stunning and immersive viewing experience. Moreover, the Blue Light Shield filters out the harmful blue light so your eyes are protected and also don’t get strained from viewing the screen for long hours.', 'Product Description', 'Flaunt this stylish and classy Oppo A12 smartphone in front of all your friends and be the envy of all eyes. It features an alluring 3D Diamond Blaze design, which further takes its look up by a notch. The 15.79 cm (6.22) display, with Blue Light Shield, offers an immersive viewing experience, while protecting your eyes from the harmful blue light. Also, you can quickly and securely unlock this phone and enjoy its amazing features with just a touch, thanks to the fingerprint sensor.', 'Specification', '<ul><li><font color=\"#636363\">3 GB RAM | 32 GB ROM | Expandable Upto 256 GB</font></li><li><font color=\"#636363\">15.8 cm (6.22 inch) HD+ Display</font></li><li><font color=\"#636363\">13MP + 2MP | 5MP Front Camera</font></li><li><font color=\"#636363\">4230 mAh Battery</font></li><li><font color=\"#636363\">MediaTek Helio P35 Processor</font></li><li><font color=\"#636363\">Brand Warranty of 1 Year Available for Mobile Including Battery and 6 Months for Accessories</font></li></ul>', 'New', '24999', '23999', NULL, 60, 5, 0, 0, 1, 0, 0, NULL, NULL, NULL, '2022-06-10 02:42:32', '2022-06-22 23:39:17'),
(17, 6, 'Tecno POVA 2', 'Tecno-POVA-2', 'The Tecno Pova 2 is a beautiful mixture of form and content that provides a superior user experience in the long run', '1654826272.jpg', 'HighLights', 'It guarantees smooth performance and seamless use backed by a considerable processor layout', 'Product Description', 'The Tecno Pova 2 is a beautiful mixture of form and content that provides a superior user experience in the long run. It guarantees smooth performance and seamless use backed by a considerable processor layout. A 48MP main camera on the rear front, along with a 7000mAh battery enables the influencers to continue with their shooting tasks for prolonged hours. The brand has also incorporated a sidewise fingerprint sensor within the device.', 'Specification', '<ul><li><font color=\"#636363\">4 GB RAM | 64 GB ROM | Expandable Upto 256 GB</font></li><li><font color=\"#636363\">17.65 cm (6.95 inch) Full HD+ Display</font></li><li><font color=\"#636363\">48MP + 2MP + 2MP + 2MP | 8MP Front Camera</font></li><li><font color=\"#636363\">6999 mAh Battery</font></li><li><font color=\"#636363\">MediaTek Helio G85 Processor</font></li><li><font color=\"#636363\">1 Year Warranty for Handset, 6 Months for Accessories</font></li></ul>', 'New', '28999', '27999', NULL, 60, 7, 0, 0, 1, 0, 0, 'Tecno POVA 2', 'Tecno POVA 2, tecno brand new featured mobile phone', 'Tecno POVA 2, tecno brand new featured mobile phone', '2022-06-10 02:57:52', '2022-06-22 23:39:35'),
(18, 6, 'Tecno Spark Go', 'Tecno-Spark-Go', 'Tecno Spark Go 2022 is an amazing investment under 10k, assuring great performance with stability', '1654826790.jpg', 'HighLights', 'The smartphone gets an organised AI enhanced camera setup on the rear side backed by a massive 5000mAh battery, promising seamless operations and prolonged talk time once completely charged.', 'Product Description', 'Tecno Spark Go 2022 is an amazing investment under 10k, assuring great performance with stability. The smartphone gets an organised AI enhanced camera setup on the rear side backed by a massive 5000mAh battery, promising seamless operations and prolonged talk time once completely charged.', 'Specification', '<ul><li><font color=\"#636363\">2 GB RAM | 32 GB ROM</font></li><li><font color=\"#636363\">16.66 cm (6.56 inch) HD+ Display</font></li><li><font color=\"#636363\">13MP Rear Camera</font></li><li><font color=\"#636363\">5000 mAh Battery</font></li><li><font color=\"#636363\">Helio A20 Processor</font></li><li><font color=\"#636363\">12 Month</font></li></ul>', 'New', '17999', '16999', NULL, 60, 7, 0, 0, 0, 0, 0, NULL, NULL, NULL, '2022-06-10 03:06:30', '2022-06-10 03:06:30'),
(19, 6, 'Tecno spark 7', 'Tecno-spark-7', 'Tecno Spark 7 is fashionable and luxurious Do you want something luxurious on your phone? We got it. Our stylish camera panel brings you a fashionable and dynamic phone. Pick SPARK, be the shining star.', '1654827268.jpg', 'HighLights', 'Your visual feast will go to a new and more delicate realm. SPARK 7 is equipped with Super High Resolution?720*1600?and 6.5\" large screen?16.55CM?to enhance your viewing experience in an all-round way. You can\'t miss the exquisite vision.', 'Product Description', 'Tecno Spark 7 is fashionable and luxurious Do you want something luxurious on your phone? We got it. Our stylish camera panel brings you a fashionable and dynamic phone. Pick SPARK, be the shining star. Your visual feast will go to a new and more delicate realm. SPARK 7 is equipped with Super High Resolution?720*1600?and 6.5\" large screen?16.55CM?to enhance your viewing experience in an all-round way. You can\'t miss the exquisite vision.', 'Specification', '<ul><li><font color=\"#636363\">2 GB RAM | 32 GB ROM | Expandable Upto 256 GB</font></li><li><font color=\"#636363\">16.56 cm (6.52 inch) HD+ Display</font></li><li><font color=\"#636363\">16MP Rear Camera | 8MP Front Camera</font></li><li><font color=\"#636363\">6000 mAh Battery</font></li><li><font color=\"#636363\">Helio A25 Processor</font></li><li><font color=\"#636363\">One Year Warranty for Handset, 6 Months for Accessories</font></li></ul>', 'New', '26999', '25999', NULL, 60, 7, 0, 0, 1, 0, 0, 'Tecno spark 7', 'Tecno spark 7, tecno brand new featured mobile phone', 'Tecno spark 7, tecno brand new featured mobile phone', '2022-06-10 03:14:28', '2022-06-22 23:39:54'),
(20, 6, 'Tecno Camon 18', 'Tecno-Camon-18', 'Tecno Camon 18 sports a large 6.8-inch FHD+ LCD display with 1080 x 2460 pixels resolution, 395 PPI, a peak brightness of 500 nits, a center-positioned punch-hole cutout to house the selfie camera.', '1654827707.jpg', 'HighLights', 'It runs on Android 11 OS with HiOS 8.0 custom skin out of the box and packs a 5000mAh battery with 18W fast charging support.', 'Product Description', 'Tecno Camon 18 sports a large 6.8-inch FHD+ LCD display with 1080 x 2460 pixels resolution, 395 PPI, a peak brightness of 500 nits, a center-positioned punch-hole cutout to house the selfie camera. It runs on Android 11 OS with HiOS 8.0 custom skin out of the box and packs a 5000mAh battery with 18W fast charging support. There is a whopping 48MP snapper on the front for selfies and video chats and a side-mounted fingerprint sensor for security.', 'Specification', '<ul><li><font color=\"#636363\">4 GB RAM | 128 GB ROM | Expandable Upto 512 GB</font></li><li><font color=\"#636363\">17.27 cm (6.8 inch) Full HD+ Display</font></li><li><font color=\"#636363\">48MP + 2MP + 2MP | 48MP Front Camera</font></li><li><font color=\"#636363\">5000 mAh Battery</font></li><li><font color=\"#636363\">MediaTek Helio G85 Processor</font></li><li><font color=\"#636363\">Brand Warranty 1 Year for Handset &amp;amp; 6 Months for Accessories</font></li></ul>', 'New', '39999', '38999', NULL, 60, 7, 1, 0, 0, 0, 0, 'Tecno Camon 18', 'Tecno Camon 18, tecno brand new featured mobile phone', 'Tecno Camon 18, tecno brand new featured mobile phone', '2022-06-10 03:21:47', '2022-06-10 12:08:31'),
(21, 4, 'realme 9 5G', 'realme-9-5G', 'This phone boasts a Dimensity 810 5G processor that can clock up to 2.4 GHz and is powered by a sophisticated 6 nm architecture, making your experience flawless and minimising the time it takes to interface with your preferred app.', '1654828325.jpg', 'HighLights', 'This phone\'s 16.51 cm (6.5) LCD display ensures that you have a great movie-watching or gaming experience. This phone also has a stunning 90 Hz refresh rate and 180 Hz touch sampling rate, ensuring that every flick and flip is incredibly gentle.', 'Product Description', 'With a 2.4 GHz processor and an innovative 6 nm architecture, the realme 9 5G is all set to be your reliable and efficient workmate. The 16.51 cm (6.5) LCD display along with the refresh rate of 90 Hz enhances the visual and operational experience. The 16 MP front camera is sure to quench your selfie thirst by creating beautiful imagery. The Street Photography Mode allows you to capture images even in low light conditions. This phone offers 4 GB of RAM and 64 GB of internal storage making it suitable for extensive usage', 'Specification', '<ul><li><font color=\"#636363\">4 GB RAM | 64 GB ROM | Expandable Upto 1 TB</font></li><li><font color=\"#636363\">16.51 cm (6.5 inch) Full HD+ Display</font></li><li><font color=\"#636363\">48MP + 2MP + 2MP | 16MP Front Camera</font></li><li><font color=\"#636363\">Mediatek Dimensity 810 Processor</font></li><li><font color=\"#636363\">1 Year Warranty for Phone and 6 Months Warranty for In-Box Accessories</font></li></ul>', 'New', '46999', '45999', NULL, 60, 7, 0, 0, 1, 0, 0, 'realme 9 5G', 'realme 9 5G, realme brand new featured mobile phone', 'realme 9 5G, realme brand new featured mobile phone', '2022-06-10 03:32:05', '2022-06-22 23:45:26'),
(22, 4, 'realme 5i', 'realme-5i', 'Drawing inspiration from the first rays of the Sun, this design depicts the young generation’s enthusiasm and endless possibilities.', '1654828985.jpg', 'HighLights', 'Housing a massive 5000 mAh battery, which comes with the AI power-saving technology, this phone will stay juiced up for all your tasks. This mighty powerhouse delivers a standby time of up to 30 days. Thanks to the reverse-charging technology, this phone can now act as a powerbank for your other devices.', 'Product Description', 'The Realme 5i is here to meet your smartphone demands seamlessly as it houses a massive 5000 mAh battery and is powered by a 2.0 GHz Qualcomm Snapdragon 665 AIE Processor. Make photography a serious business with its AI Quad camera that features a 12 MP Primary Lens, 8 MP Ultra Wide-Angle Lens, 2 MP Super Macro Lens and 2 MP Portrait Lens.', 'Specification', '<ul><li><font color=\"#636363\">4 GB RAM | 64 GB ROM</font></li><li><font color=\"#636363\">16.56 cm (6.52 inch) HD+ Display</font></li><li><font color=\"#636363\">12MP + 8MP + 2MP + 2MP | 8MP Front Camera</font></li><li><font color=\"#636363\">5000 mAh Battery</font></li><li><font color=\"#636363\">Qualcomm Snapdragon 665 2 GHz Processor</font></li><li><font color=\"#636363\">Sunrise Design</font></li><li><font color=\"#636363\">Reverse Charging</font></li><li><font color=\"#636363\">Brand Warranty of 1 Year Available for Mobile and 6 Months for Accessories</font></li></ul>', 'New', '34999', '33999', NULL, 60, 7, 1, 0, 0, 0, 0, 'Realme Q5i', 'Realme Q5i, realme brand new featured mobile phone', 'Realme Q5i, realme brand new featured mobile phone', '2022-06-10 03:42:29', '2022-06-10 03:43:05'),
(23, 4, 'realme Narzo 30 5G', 'realme-Narzo-30-5G', 'The realme Narzo Pro 5G comes with 5G technology that reduces network latency while offering high download speed. This smartphone also offers 5G+5G Dual SIM Dual Standby, smart 5G power saving, and lowers power consumption to offer an exciting mobile computing experience.', '1654829606.jpg', 'HighLights', 'The Dimensity 700 5G Processor is built on a 7nm process, and it offers impressive gaming performance. It increases the speed of both the CPU and GPU for a fast and smooth experience.', 'Product Description', 'High-speed internet, smooth gaming, and stunning photos, the realme Narzo Pro 5G is a power-packed smartphone for impressive performance. This smartphone features the 5G Technology for high-speed web browsing, the Dimensity 700 5G Processor for smooth gaming, and a 5000 mAh Massive Battery for hours of uninterrupted performance.', 'Specification', '<ul><li><font color=\"#636363\">6 GB RAM | 128 GB ROM | Expandable Upto 1 TB</font></li><li><font color=\"#636363\">16.51 cm (6.5 inch) Full HD+ Display</font></li><li><font color=\"#636363\">48MP + 2MP + 2MP | 16MP Front Camera</font></li><li><font color=\"#636363\">5000 mAh Battery</font></li><li><font color=\"#636363\">MediaTek Dimensity 700 (MT6833) Processor</font></li><li><font color=\"#636363\">1 Year Warranty for Mobile and 6 Months for Accessories</font></li></ul>', 'New', '39999', '38999', NULL, 60, 7, 1, 0, 0, 0, 0, 'Realme Narzo 30 5G', 'Realme Narzo 30 5G, realme brand new featured mobile phone', 'Realme Narzo 30 5G, realme brand new featured mobile phone', '2022-06-10 03:53:26', '2022-06-10 03:53:26'),
(24, 4, 'realme GT Neo 3', 'realme-GT-Neo-3', 'The Realme GT NEO 3 smartphone features an impressive 5000 mAh battery that supports 80 W SuperDart Charge and powers your phone up to 50% in 12 minutes and up to 100% in 33 minutes. Moreover, the \"Fast Charge with Display On\" feature supports fast charging even while playing. This way you can beat all your peers and stay on top of online gaming', '1654830549.jpg', 'HighLights', 'This phone is equipped with an excellent Dimensity 8100 5G processor, which allows for the phone\'s speed and top-notch performance. The processor readily delivers increased performance with higher efficiency, with an AnTuTu score of over 8,00,000 and Octa-core Processor architecture with 5 nm technology. MediaTek\'s HyperEngine 5.0 Game Optimization Engine enhances the gaming experience and facilitates uninterrupted gaming with unmatched fun.', 'Product Description', 'Unleash the suppressed gamer in you and enjoy a top-notch user interface with the Realme GT NEO 3 smartphone. This phone is designed in such a way that it attracts the onlookers and performs so well that you can’t keep it down for a minute. This phone features an exquisite Dimensity 8100 5G processor that facilitates a silky smooth operation and delivers elevated performance. Additionally, the 50 MP Wide-angle Triple Camera of this phone enables you to take stunning photos and videos that last long in your cherished memories. Furthermore, the monstrous 5000 mAh battery and 80 W SuperDart Charge technology powers your phone in a short period of time and backs you up for an extended time', 'Specification', '<ul><li><font color=\"#636363\">8 GB RAM | 128 GB ROM</font></li><li><font color=\"#636363\">17.02 cm (6.7 inch) Full HD+ Display</font></li><li><font color=\"#636363\">50MP + 8MP + 2MP | 16MP Front Camera</font></li><li><font color=\"#636363\">5000 mAh Lithium Ion Battery</font></li><li><font color=\"#636363\">Mediatek Dimensity 8100 Processor</font></li><li><font color=\"#636363\">1 Year Manufacturer Warranty for Phone and 6 Months Warranty for In-Box Accessories</font></li></ul>', 'New', '59999', '58999', NULL, 60, 7, 0, 1, 0, 0, 0, 'realme GT Neo 3', 'realme GT Neo 3, realme brand new featured mobile phone', 'realme GT Neo 3, realme brand new featured mobile phone', '2022-06-10 04:09:09', '2022-06-22 23:41:11');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `star_rated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `prod_id`, `star_rated`, `created_at`, `updated_at`) VALUES
(1, '5', '1', '1', '2022-05-05 19:35:50', '2022-05-05 19:35:50'),
(3, '5', '3', '3', '2022-05-05 20:20:17', '2022-05-05 20:32:15'),
(4, '5', '2', '3', '2022-05-25 14:08:56', '2022-05-25 14:08:56'),
(5, '38', '6', '3', '2022-06-19 19:16:38', '2022-06-19 19:16:38'),
(6, '37', '24', '5', '2022-06-19 23:23:25', '2022-06-19 23:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_review` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `prod_id`, `user_review`, `created_at`, `updated_at`) VALUES
(1, '37', '24', 'Nice set', '2022-06-19 23:24:03', '2022-06-19 23:24:03');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` mediumtext COLLATE utf8mb4_unicode_ci,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `link` mediumtext COLLATE utf8mb4_unicode_ci,
  `link_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `heading`, `description`, `link`, `link_name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, '1654437815.jpg', 0, '2022-04-21 00:05:28', '2022-06-05 09:03:35'),
(2, NULL, NULL, NULL, NULL, '1654436581.jpg', 0, '2022-04-21 00:07:58', '2022-06-05 08:43:01'),
(3, NULL, NULL, NULL, NULL, '1654437087.jpg', 0, '2022-04-21 13:36:42', '2022-06-05 08:51:27'),
(4, NULL, NULL, NULL, NULL, '1654437908.png', 0, '2022-06-05 08:57:12', '2022-06-05 09:05:08'),
(5, NULL, NULL, NULL, NULL, '1654438917.jpg', 0, '2022-06-05 09:09:30', '2022-06-05 09:21:57'),
(6, NULL, NULL, NULL, NULL, '1654438986.png', 0, '2022-06-05 09:09:30', '2022-06-05 09:23:06');

-- --------------------------------------------------------

--
-- Table structure for table `subcategorys`
--

CREATE TABLE `subcategorys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategorys`
--

INSERT INTO `subcategorys` (`id`, `category_id`, `url`, `name`, `Description`, `image`, `priority`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'mi-brand', 'Mi Brand', 'This is a Samsung Brand', '1650744646.jpg', 0, 0, '2022-02-22 22:47:42', '2022-06-07 06:56:15'),
(2, 4, 'samsung-brand', 'Samsung', 'This is Samsung description', '1650744733.png', 0, 0, '2022-04-23 04:41:23', '2022-06-07 06:31:32'),
(3, 4, 'vivo-brand', 'vivo', 'This vivo short description', '1650743684.png', 0, 0, '2022-04-23 14:50:24', '2022-04-23 14:54:44'),
(4, 4, 'realme-brand', 'Realme', 'This is short Realme description', '1650745047.png', 0, 0, '2022-04-23 15:17:27', '2022-06-07 06:31:41'),
(5, 4, 'oppo-brand', 'Oppo', 'This is short oppo description', '1650745817.png', 0, 0, '2022-04-23 15:30:17', '2022-04-23 15:30:17'),
(6, 4, 'tecno-brand', 'Tecno', 'This is short Tecno description', '1650746178.png', 0, 0, '2022-04-23 15:36:18', '2022-04-23 15:37:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `email_verified` int(11) NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addres1` mediumtext COLLATE utf8mb4_unicode_ci,
  `addres2` mediumtext COLLATE utf8mb4_unicode_ci,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternate_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_as` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isban` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `email_verified`, `password`, `lname`, `addres1`, `addres2`, `city`, `state`, `pincode`, `phone`, `alternate_phone`, `image`, `role_as`, `isban`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, 1, '$2y$10$xpGVgl8rTiBOX6XX2Hnjbeeymq0909nh6RNrzNNyIzpomq2vhFV3W', 'khan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 0, 'v878FxFPz5htQloLh7cYXVQuLHb2UotRoTQEdI4ue3zLbMVfB6UXVusiqJnk', '2022-02-17 03:19:49', '2022-06-08 07:15:35'),
(4, 'vendor', 'vendor@gmail.com', NULL, 0, '$2y$10$xpGVgl8rTiBOX6XX2Hnjbeeymq0909nh6RNrzNNyIzpomq2vhFV3W', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vendor', 0, NULL, '2022-02-17 04:49:50', '2022-02-17 17:14:20'),
(36, 'testing khan', 'ktesting066@gmail.com', NULL, 1, '$2y$10$xpGVgl8rTiBOX6XX2Hnjbeeymq0909nh6RNrzNNyIzpomq2vhFV3W', 'khan', 'surjani town', '222', 'karachi', 'surjani', '123', '78986738989', '123', '1655319300.png', 'user', 0, NULL, '2022-06-16 00:50:44', '2022-06-16 00:56:56'),
(37, 'Jazil', 'mjazilkhan046@gmail.com', NULL, 1, '$2y$10$oVv0geQZEZXHOekSLG2XWuVC86WArFOPCJ1tXXQezxgYn/HGNxw0y', 'Khan', 'Surjaani', 'Surjaani', 'Karachi', 'North karachi', '123456', '03162360060', '03162360060', '1655576708.jpg', 'user', 0, 'SIQTCZYvemWhGqg2OvyMXhrleJiAElJ3cy4Wn8WRcCjhSxHTp5Q8uCYEW0FW', '2022-06-19 00:22:11', '2022-07-01 05:30:13'),
(39, 'M Sufyan Sheikh', 'example@gmail.com', NULL, 0, '$2y$10$7z.SF4sI63b7QLjLYRVoq.FMtqqwQTmaZmmFbi9ItrGqbbN4Ezi1K', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user', 0, NULL, '2022-06-28 07:29:32', '2022-06-28 07:29:32'),
(47, 'Shahzaib khan', 'kshahzaib046@gmail.com', NULL, 1, '$2y$10$Q9HshhF9DiJF83pLJpseQ.lzCbKz6EmfbfUVFUpfuTWW35tKDmsK2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user', 0, NULL, '2022-06-28 19:33:22', '2022-06-28 19:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_verify_emails`
--

CREATE TABLE `user_verify_emails` (
  `user_id` int(11) DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_verify_emails`
--

INSERT INTO `user_verify_emails` (`user_id`, `token`, `created_at`, `updated_at`) VALUES
(44, '447affaffb0be7a6f5117121c906cf4ca18520d16f49fd9b9d65ec9c14691b73db', '2022-06-28 08:19:57', '2022-06-28 08:19:57'),
(45, '4530ce34293a0cc401156798be120bced85070453e3d230afb5993e3737f318ead', '2022-06-28 08:48:09', '2022-06-28 08:48:09'),
(46, '46f689b19c6574990e50b2d23f3fa32c309f62e2d7859f454ab0740557450d848d', '2022-06-28 08:52:39', '2022-06-28 08:52:39'),
(47, '47a7996a6b1a91cb0581d1e48344830fefe98a3f1ab3ccecff06c52a356b8ce34b', '2022-06-28 19:33:22', '2022-06-28 19:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `status`, `created_at`, `updated_at`) VALUES
(21, 40, 23, 0, '2022-06-28 07:41:07', '2022-06-28 07:41:07');

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategorys`
--
ALTER TABLE `subcategorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subcategorys`
--
ALTER TABLE `subcategorys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
