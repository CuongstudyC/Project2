-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 06:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `full_name`, `position`, `user_name`, `email`, `password`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Nguyên Bách', 'nhân viên', 'Bách', 'Test123@gmail.com', '$2y$10$XqraM9hCgq5y3ZDOAcE7XenXR.v7R9BJSyibKbY1NcYR4GisvIvTu', '2023-10_01screenshot_1693414323.png', '2023-10-01 06:55:33', '2023-10-01 06:55:33'),
(7, 'Nguyễn Thành Danh', 'nhân viên', 'Danh', 'DanhSeg@gmail.com', '$2y$10$fYtKgP/ZbwP55KFlXRxrc.yyvDHAIZD1C4yjalJ2OcmOWsTS7dnm6', '2023-10-23njrm38k1vdv71.webp', '2023-10-22 18:09:26', '2023-10-22 18:09:26'),
(14, 'Nguyễn Minh Hiếu', 'quản lí', 'Hiếu', 'dd@gmail.com', '$2y$10$KLKjgMrK//Vnz3bAP71DretNI/4Qoc83X11vnRKFkCgNBBRXNhAC6', NULL, '2023-10-23 13:29:52', '2023-10-26 03:09:11'),
(15, 'Nhật', 'nhân viên', 'Lương Minh Nhật', 'Nhat123@gmail.com', '$2y$10$fD254r7M8U./Ihv4arf7AO85TYxS9lZ.rDwDseD1YW/Vy1SI.f7a2', NULL, '2023-10-25 16:37:03', '2023-10-25 16:37:03'),
(16, 'minh nhat', 'nhân viên', 'nhat1233', 'nhat1233@gmail.com', '$2y$10$nJ97LGqKqiZ72tBBFz.p6.NFX8jrxovLN1boYygETF.Uj70t5VqkO', NULL, '2023-10-26 07:14:34', '2023-10-26 07:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `admin_remembers`
--

CREATE TABLE `admin_remembers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_remembers`
--

INSERT INTO `admin_remembers` (`id`, `admin_id`, `created_at`, `updated_at`) VALUES
(51, 14, '2023-10-28 10:16:42', '2023-10-28 10:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `goods_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `goods_id`, `created_at`, `updated_at`) VALUES
(1, 'Thức ăn', 2, '2023-10-03 16:51:32', '2023-10-03 16:51:32'),
(3, 'Đồ uống', 3, '2023-10-03 17:33:47', '2023-10-03 17:33:47'),
(4, 'Thức ăn', 4, '2023-10-20 11:15:25', '2023-10-20 11:15:25'),
(5, 'nước uống', 4, '2023-10-25 17:03:56', '2023-10-25 17:03:56');

-- --------------------------------------------------------

--
-- Table structure for table `chat_boxes`
--

CREATE TABLE `chat_boxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_boxes`
--

INSERT INTO `chat_boxes` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 21, NULL, NULL),
(16, 1, '2023-10-21 08:33:24', '2023-10-21 08:33:24'),
(17, 22, '2023-10-21 14:00:57', '2023-10-21 14:00:57'),
(18, 25, '2023-10-26 07:31:30', '2023-10-26 07:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `chat_box_details`
--

CREATE TABLE `chat_box_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `chat_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_box_details`
--

INSERT INTO `chat_box_details` (`id`, `content`, `admin_id`, `chat_id`, `created_at`, `updated_at`) VALUES
(3, 'Xin chào', NULL, 1, NULL, NULL),
(4, 'Chào bạn', 1, 1, NULL, NULL),
(23, 'ko có j đâu bạn', NULL, 1, '2023-10-20 21:05:25', '2023-10-20 21:05:25'),
(27, '???', NULL, 1, '2023-10-21 05:25:59', '2023-10-21 05:25:59'),
(29, 'y', NULL, 1, '2023-10-21 05:28:11', '2023-10-21 05:28:11'),
(31, '6', NULL, 1, '2023-10-21 05:31:51', '2023-10-21 05:31:51'),
(34, '34', NULL, 1, '2023-10-21 05:42:11', '2023-10-21 05:42:11'),
(37, 'Sao thế bạn?', NULL, 1, '2023-10-21 05:43:14', '2023-10-21 05:43:14'),
(62, '?', NULL, 16, '2023-10-21 08:33:24', '2023-10-21 08:33:24'),
(63, 'hi a', NULL, 16, '2023-10-21 11:03:30', '2023-10-21 11:03:30'),
(65, 'gay cai dit cmm', NULL, 16, '2023-10-21 11:03:52', '2023-10-21 11:03:52'),
(67, '???', NULL, 16, '2023-10-21 11:04:21', '2023-10-21 11:04:21'),
(68, 'eee', NULL, 16, '2023-10-21 11:05:28', '2023-10-21 11:05:28'),
(70, 'ccc', NULL, 16, '2023-10-21 11:05:39', '2023-10-21 11:05:39'),
(72, '???', NULL, 1, '2023-10-21 11:32:02', '2023-10-21 11:32:02'),
(73, 'haha', NULL, 1, '2023-10-21 11:32:46', '2023-10-21 11:32:46'),
(74, '123', NULL, 17, '2023-10-21 14:00:57', '2023-10-21 14:00:57'),
(76, 'cdcd', NULL, 17, '2023-10-21 14:01:49', '2023-10-21 14:01:49'),
(77, ':v', NULL, 17, '2023-10-22 08:42:37', '2023-10-22 08:42:37'),
(78, '???', 14, 16, '2023-10-23 13:33:46', '2023-10-23 13:33:46'),
(79, '??', 14, 1, '2023-10-23 13:34:03', '2023-10-23 13:34:03'),
(80, '??', 14, 17, '2023-10-23 13:34:08', '2023-10-23 13:34:08'),
(81, 'lll', 14, 16, '2023-10-25 16:39:15', '2023-10-25 16:39:15'),
(82, 'abc', NULL, 18, '2023-10-26 07:31:30', '2023-10-26 07:31:30'),
(83, '???', 16, 18, '2023-10-26 07:31:41', '2023-10-26 07:31:41'),
(84, 'bbbb', NULL, 1, '2023-10-28 05:01:26', '2023-10-28 05:01:26'),
(85, 'aaa', 14, 1, '2023-10-28 05:01:38', '2023-10-28 05:01:38'),
(86, 'aaa', NULL, 1, '2023-10-28 05:02:19', '2023-10-28 05:02:19'),
(87, 'ccc', 14, 1, '2023-10-28 05:02:30', '2023-10-28 05:02:30'),
(88, 'cc', 14, 1, '2023-10-28 05:02:42', '2023-10-28 05:02:42'),
(89, 'xx', 14, 1, '2023-10-28 05:03:12', '2023-10-28 05:03:12'),
(90, 'abcd', 14, 1, '2023-10-28 05:03:27', '2023-10-28 05:03:27'),
(91, '???', NULL, 1, '2023-10-28 05:03:49', '2023-10-28 05:03:49'),
(92, 'aaa', 14, 1, '2023-10-28 05:04:02', '2023-10-28 05:04:02'),
(93, 'rrr', NULL, 1, '2023-10-28 05:04:12', '2023-10-28 05:04:12'),
(94, 'x', 14, 1, '2023-10-28 05:06:05', '2023-10-28 05:06:05'),
(95, 'a', NULL, 1, '2023-10-28 05:06:15', '2023-10-28 05:06:15'),
(96, 'q', NULL, 1, '2023-10-28 05:07:53', '2023-10-28 05:07:53'),
(97, 'v', 14, 1, '2023-10-28 05:07:59', '2023-10-28 05:07:59'),
(98, 'aaa', 14, 1, '2023-10-28 05:08:07', '2023-10-28 05:08:07'),
(99, '123', NULL, 1, '2023-10-28 05:10:06', '2023-10-28 05:10:06'),
(100, '1234', 14, 1, '2023-10-28 05:10:13', '2023-10-28 05:10:13'),
(101, 'ccc', NULL, 1, '2023-10-28 05:10:19', '2023-10-28 05:10:19'),
(102, 'www', 14, 1, '2023-10-28 05:11:33', '2023-10-28 05:11:33'),
(103, 'vvv', NULL, 1, '2023-10-28 05:11:37', '2023-10-28 05:11:37'),
(104, 'qqq', 14, 1, '2023-10-28 05:14:55', '2023-10-28 05:14:55'),
(105, 'vvv', NULL, 1, '2023-10-28 05:15:06', '2023-10-28 05:15:06'),
(106, 'qqq', 14, 1, '2023-10-28 05:15:17', '2023-10-28 05:15:17'),
(107, '456', 14, 1, '2023-10-28 05:16:23', '2023-10-28 05:16:23'),
(108, 'ccc', NULL, 1, '2023-10-28 05:16:28', '2023-10-28 05:16:28'),
(109, 'xxx', NULL, 1, '2023-10-28 05:17:22', '2023-10-28 05:17:22'),
(110, 'zzz', 14, 1, '2023-10-28 05:17:31', '2023-10-28 05:17:31'),
(111, 'z', NULL, 1, '2023-10-28 05:20:54', '2023-10-28 05:20:54'),
(112, 'a', 14, 1, '2023-10-28 05:21:15', '2023-10-28 05:21:15'),
(113, 'qqq', NULL, 1, '2023-10-28 05:23:07', '2023-10-28 05:23:07'),
(114, 'x', 14, 1, '2023-10-28 05:23:15', '2023-10-28 05:23:15'),
(115, 'aa', NULL, 1, '2023-10-28 05:25:07', '2023-10-28 05:25:07'),
(116, 'ccc', 14, 1, '2023-10-28 05:25:13', '2023-10-28 05:25:13'),
(117, 'ttt', NULL, 1, '2023-10-28 05:26:19', '2023-10-28 05:26:19'),
(118, 'ccc', 14, 1, '2023-10-28 05:27:50', '2023-10-28 05:27:50'),
(119, 'xxx', NULL, 1, '2023-10-28 05:27:56', '2023-10-28 05:27:56'),
(120, 'ccc', 14, 1, '2023-10-28 10:16:49', '2023-10-28 10:16:49'),
(121, 'ccc', NULL, 1, '2023-10-28 10:18:48', '2023-10-28 10:18:48'),
(122, 'aaa', 14, 1, '2023-10-28 10:18:55', '2023-10-28 10:18:55'),
(123, 'aaa', NULL, 1, '2023-10-28 10:19:10', '2023-10-28 10:19:10'),
(124, 'qqq', 14, 1, '2023-10-28 10:19:18', '2023-10-28 10:19:18'),
(125, 'hello', 14, 1, '2023-10-28 10:20:18', '2023-10-28 10:20:18'),
(126, 'hi?', NULL, 1, '2023-10-28 10:20:45', '2023-10-28 10:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `discount` int(11) NOT NULL,
  `time_end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `time_start` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `code`, `discount`, `time_end`, `created_at`, `updated_at`, `time_start`) VALUES
(2, 'BlackFirday', 'BLACKFIRDAY123', 50, '2024-01-26', '2023-10-04 13:26:20', '2023-10-04 13:26:20', '2024-01-04'),
(3, 'summer', 'SUMMER2024', 20, '2024-04-24', '2023-10-04 16:07:16', '2023-10-04 16:07:16', '2024-04-18'),
(4, 'New', 'New123', 20, '2023-10-26', '2023-10-04 18:33:46', '2023-10-04 18:33:46', '2023-10-05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `goods_from` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`id`, `goods_from`, `created_at`, `updated_at`, `image`) VALUES
(2, 'Việt Nam', '2023-10-03 12:12:23', '2023-10-03 12:12:23', '2023-10-03Co-Vietnam.webp'),
(3, 'Cananda', '2023-10-03 13:25:17', '2023-10-03 13:25:17', '2023-10-03canada.png'),
(4, 'Hàn Quốc', '2023-10-19 16:31:51', '2023-10-19 16:31:51', '2023-10-19Lá-cờ-Hàn.png');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_10_01_124232_create_tb_admins_table', 2),
(8, '2023_10_01_132540_create_admins_table', 3),
(9, '2023_10_01_132620_create_admin_remembers_table', 3),
(10, '2023_10_01_133436_create_reports_table', 4),
(11, '2023_10_02_123358_create_goods_table', 5),
(13, '2023_10_02_195644_create_categories_table', 6),
(14, '2023_10_02_200323_create_products_table', 7),
(15, '2023_10_02_201646_create_orders_table', 8),
(16, '2023_10_02_204024_create_order_details_table', 9),
(17, '2023_10_02_204342_create_shipping_orders_table', 10),
(18, '2023_10_03_165435_edit_columns_in_goods_table', 11),
(19, '2023_10_04_174029_create_events_table', 12),
(20, '2023_10_04_175920_edit_columns_in_products_table', 13),
(21, '2023_10_04_181056_edit_columns_in_events_table', 14),
(22, '2023_10_04_231343_edit_columns_in_products_table', 15),
(23, '2023_10_05_182049_edit_columns_in_users_table', 16),
(24, '2014_10_12_100000_create_password_resets_table', 17),
(30, '2023_10_07_172037_edit_columns_in_shipping_orders_table', 20),
(31, '2023_10_07_172041_edit_columns_in_orders_table', 20),
(32, '2023_10_05_183046_edit_columns_in_users_table', 21),
(33, '2023_10_07_184621_edit_columns_in_shipping_orders_table', 21),
(34, '2023_10_07_185132_edit_columns_in_orders_table', 22),
(35, '2023_10_10_154234_edit_columns_in_orders_table', 23),
(36, '2023_10_14_010049_edit_columns_in_shipping_orders_table', 24),
(37, '2023_10_19_183511_create_chat_boxes_table', 25),
(38, '2023_10_22_190453_edit_columns_in_shipping_orders_table', 26);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `total` decimal(12,0) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `total`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'Phúc', '123', '123', 20000, 1, '2023-10-08 18:12:20', NULL),
(9, 'Bách', '123456789', 'eee', 30000, NULL, '2023-10-10 08:49:04', NULL),
(11, 'Quang', '0906322153', 'Gò Vấp', 43200, NULL, '2023-10-13 18:47:55', '2023-10-13 18:47:55'),
(12, 'Quang', '0906322153', 'Gò Vấp', 43200, NULL, '2023-10-13 18:50:18', '2023-10-13 18:50:18'),
(13, 'Quang', '0906322153', 'Gò Vấp', 43200, NULL, '2023-10-13 18:50:20', '2023-10-13 18:50:20'),
(14, 'Quang', '906322153', 'Gò Vấp', 51600, 21, '2023-10-13 18:55:18', '2023-10-13 18:55:18'),
(15, 'Quang', '906322153', 'Gò Vấp', 51600, 21, '2023-10-13 18:57:24', '2023-10-13 18:57:24'),
(16, 'Quang', '906322153', 'Gò Vấp', 68880, 21, '2023-10-13 18:58:39', '2023-10-13 18:58:39'),
(17, 'Quang', '906322153', 'Gò Vấp', 64560, 21, '2023-10-13 18:59:28', '2023-10-13 18:59:28'),
(18, 'Quang', '906322153', 'Gò Vấp', 4320, 21, '2023-10-13 19:02:13', '2023-10-13 19:02:13'),
(19, 'Quang', '906322153', 'Gò Vấp', 47280, 21, '2023-10-13 19:10:36', '2023-10-13 19:10:36'),
(20, 'Quang', '0906322153', 'Quận 7', 47280, NULL, '2023-10-13 19:13:08', '2023-10-13 19:13:08'),
(21, 'Quang', '906322153', 'Gò Vấp', 17280, 21, '2023-10-13 19:23:15', '2023-10-13 19:23:15'),
(22, 'Quang', '906322153', 'Gò Vấp', 64560, 21, '2023-10-14 02:56:54', '2023-10-14 02:56:54'),
(23, 'Bach', '123456789', 'Quận 5', 73200, NULL, '2023-10-14 11:17:24', '2023-10-14 11:17:24'),
(24, 'Danh', '34532122', 'Thủ Đức', 116160, NULL, '2023-10-14 11:20:02', '2023-10-14 11:20:02'),
(25, 'Quang', '906322153', 'Gò Vấp', 17280, 21, '2023-10-14 12:13:32', '2023-10-14 12:13:32'),
(26, 'Quang', '906322153', 'Gò Vấp', 73200, 21, '2023-10-14 12:16:55', '2023-10-14 12:16:55'),
(27, 'Quang', '906322153', 'Gò Vấp', 25920, 21, '2023-10-21 11:50:04', '2023-10-21 11:50:04'),
(29, 'Quang', '906322153', 'Gò Vấp', 21600, 21, '2023-10-21 11:54:56', '2023-10-21 11:54:56'),
(30, 'Quang', '906322153', 'Gò Vấp', 25920, 21, '2023-10-21 11:55:45', '2023-10-21 11:55:45'),
(31, 'Quang', '906322153', 'Gò Vấp', 85920, 21, '2023-10-21 11:56:36', '2023-10-21 11:56:36'),
(32, 'Danh', '0906322153', 'Thủ Đức', 75600, 22, '2023-10-21 14:22:45', '2023-10-21 14:22:45'),
(34, 'Danh', '0906322153', 'Thủ Đức', 73200, 22, '2023-10-21 14:24:51', '2023-10-21 14:24:51'),
(35, 'Quang', '906322153', 'Gò Vấp', 43200, 21, '2023-10-22 06:10:55', '2023-10-22 06:10:55'),
(36, 'Quang', '906322153', 'Gò Vấp', 21600, 21, '2023-10-22 06:13:44', '2023-10-22 06:13:44'),
(37, 'Quang', '906322153', 'Gò Vấp', 21600, 21, '2023-10-22 06:14:01', '2023-10-22 06:14:01'),
(43, 'Danh', '3453212245', 'Thủ Đức', 38880, 22, '2023-10-22 08:18:34', '2023-10-22 08:18:34'),
(44, 'Danh', '0906322132', 'Thủ Đức', 66160, 22, '2023-10-22 08:20:42', '2023-10-22 08:20:42'),
(52, 'Quang', '906322153', 'Gò Vấp', 14320, 21, '2023-10-24 12:26:16', '2023-10-24 12:26:16'),
(53, 'Danh', '1234567891', 'Thu duc', 1728000000, NULL, '2023-10-26 06:50:12', '2023-10-26 06:50:12'),
(54, 'Quang', '906322153', 'Gò Vấp', 1296000000, 21, '2023-10-26 06:51:07', '2023-10-26 06:51:07'),
(55, 'abc123', '1234567891', 'hcm', 94000, 25, '2023-10-26 07:27:31', '2023-10-26 07:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_qty` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `product_name`, `product_price`, `product_qty`, `product_id`, `order_id`, `created_at`, `updated_at`) VALUES
(6, 'Cá viên', '20000', '4', NULL, 4, NULL, NULL),
(7, 'Cá Viên', '4000', '10', NULL, 11, '2023-10-13 18:47:55', '2023-10-13 18:47:55'),
(8, 'Cá Viên', '4000', '10', NULL, 12, '2023-10-13 18:50:18', '2023-10-13 18:50:18'),
(9, 'Cá Viên', '4000', '10', NULL, 13, '2023-10-13 18:50:20', '2023-10-13 18:50:20'),
(10, 'Hamburger', '20000', '1', 3, 15, '2023-10-13 18:57:24', '2023-10-13 18:57:24'),
(11, 'Hamburger', '20000', '1', 3, 16, '2023-10-13 18:58:39', '2023-10-13 18:58:39'),
(12, 'Bánh Bao', '16000', '1', 4, 16, '2023-10-13 18:58:39', '2023-10-13 18:58:39'),
(13, 'Bánh Bao', '16000', '2', 4, 17, '2023-10-13 18:59:28', '2023-10-13 18:59:28'),
(14, 'Cá Viên', '4000', '1', NULL, 18, '2023-10-13 19:02:13', '2023-10-13 19:02:13'),
(15, 'Bánh Bao', '16000', '1', 4, 19, '2023-10-13 19:10:37', '2023-10-13 19:10:37'),
(16, 'Bánh Bao', '16000', '1', 4, 20, '2023-10-13 19:13:08', '2023-10-13 19:13:08'),
(17, 'Bánh Bao', '16000', '1', 4, 21, '2023-10-13 19:23:15', '2023-10-13 19:23:15'),
(18, 'Bánh Bao', '16000', '2', 4, 22, '2023-10-14 02:56:54', '2023-10-14 02:56:54'),
(19, 'Hamburger', '20000', '2', 3, 23, '2023-10-14 11:17:24', '2023-10-14 11:17:24'),
(20, 'Bánh Bao', '16000', '2', 4, 24, '2023-10-14 11:20:02', '2023-10-14 11:20:02'),
(21, 'Hamburger', '20000', '1', 3, 24, '2023-10-14 11:20:02', '2023-10-14 11:20:02'),
(22, 'Cá Viên', '4000', '4', NULL, 25, '2023-10-14 12:13:32', '2023-10-14 12:13:32'),
(23, 'Hamburger', '20000', '2', 3, 26, '2023-10-14 12:16:55', '2023-10-14 12:16:55'),
(24, 'Cá Viên', '4000', '1', NULL, 27, '2023-10-21 11:50:04', '2023-10-21 11:50:04'),
(25, 'Hamburger', '20000', '1', 3, 27, '2023-10-21 11:50:04', '2023-10-21 11:50:04'),
(26, 'Hamburger', '20000', '1', 3, 29, '2023-10-21 11:54:56', '2023-10-21 11:54:56'),
(27, 'Cá Viên', '4000', '1', NULL, 30, '2023-10-21 11:55:45', '2023-10-21 11:55:45'),
(28, 'Hamburger', '20000', '1', 3, 30, '2023-10-21 11:55:45', '2023-10-21 11:55:45'),
(29, 'Cá Viên', '4000', '1', NULL, 31, '2023-10-21 11:56:36', '2023-10-21 11:56:36'),
(30, 'Hamburger', '20000', '1', 3, 31, '2023-10-21 11:56:36', '2023-10-21 11:56:36'),
(31, 'Cánh gà chiên không cay', '10000', '3', 7, 32, '2023-10-21 14:22:45', '2023-10-21 14:22:45'),
(32, 'Cá Viên', '4000', '10', NULL, 32, '2023-10-21 14:22:45', '2023-10-21 14:22:45'),
(36, 'Cá Viên', '4000', '1', NULL, 34, '2023-10-21 14:24:51', '2023-10-21 14:24:51'),
(37, 'Hamburger', '20000', '1', 3, 34, '2023-10-21 14:24:51', '2023-10-21 14:24:51'),
(38, 'Bánh Bao', '16000', '1', 4, 34, '2023-10-21 14:24:51', '2023-10-21 14:24:51'),
(39, 'Cánh gà chiên không cay', '10000', '4', 7, 35, '2023-10-22 06:10:55', '2023-10-22 06:10:55'),
(40, 'Hamburger', '20000', '1', 3, 36, '2023-10-22 06:13:44', '2023-10-22 06:13:44'),
(41, 'Hamburger', '20000', '1', 3, 37, '2023-10-22 06:14:01', '2023-10-22 06:14:01'),
(53, 'Hamburger', '20000', '1', 3, 43, '2023-10-22 08:18:34', '2023-10-22 08:18:34'),
(54, 'Bánh Bao', '16000', '1', 4, 43, '2023-10-22 08:18:34', '2023-10-22 08:18:34'),
(55, 'Hamburger', '20000', '1', 3, 44, '2023-10-22 08:20:42', '2023-10-22 08:20:42'),
(56, 'Bánh Bao', '16000', '2', 4, 44, '2023-10-22 08:20:42', '2023-10-22 08:20:42'),
(66, 'Cá Viên', '4000', '1', NULL, 52, '2023-10-24 12:26:16', '2023-10-24 12:26:16'),
(67, 'Cá Viên', '400000000', '4', NULL, 53, '2023-10-26 06:50:12', '2023-10-26 06:50:12'),
(68, 'Cá Viên', '400000000', '3', NULL, 54, '2023-10-26 06:51:07', '2023-10-26 06:51:07'),
(69, 'Cánh gà chiên không cay', '10000', '3', 7, 55, '2023-10-26 07:27:31', '2023-10-26 07:27:31'),
(70, 'Kimchi', '20000', '1', 8, 55, '2023-10-26 07:27:31', '2023-10-26 07:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
  `expires_at` timestamp NULL DEFAULT NULL,
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
  `price` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `decription` text DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subPrice` int(11) NOT NULL,
  `event_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `decription`, `category_id`, `created_at`, `updated_at`, `subPrice`, `event_id`) VALUES
(3, 'Hamburger', 20000, NULL, NULL, 1, '2023-10-04 20:04:00', '2023-10-04 20:04:00', 20000, NULL),
(4, 'Bánh Bao', 20000, NULL, 'Ngon', 1, '2023-10-07 15:55:38', '2023-10-07 15:55:38', 16000, 4),
(5, 'Đậu hủ', 10000, NULL, '<p>KO thúi</p>', 1, '2023-10-17 14:50:49', '2023-10-17 14:51:37', 10000, NULL),
(7, 'Cánh gà chiên không cay', 10000, '2023-10-21food.jpg', '<p>Cánh gà việt nam</p>', 1, '2023-10-21 14:13:00', '2023-10-21 14:14:15', 10000, NULL),
(8, 'Kimchi', 20000, NULL, '<p>Nhập hàng chính hãng từ hàn quốc</p>', 4, '2023-10-25 17:01:52', '2023-10-25 17:01:52', 20000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `type`, `content`, `admin_id`, `created_at`, `updated_at`) VALUES
(4, 'Doanh thu tháng 10 năm 2023', 'cháy nhà', 14, '2023-10-25 16:56:18', '2023-10-25 16:56:18'),
(5, 'Mất hàng', 'có tk ăn cắp', 14, '2023-10-25 17:00:58', '2023-10-25 17:00:58'),
(6, 'nhan vien giao da phi 20.000d', 'lay tu ket ra 20000 de tra tien da', 14, '2023-10-26 07:09:56', '2023-10-26 07:09:56');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_orders`
--

CREATE TABLE `shipping_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `fee` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `reason_fail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_orders`
--

INSERT INTO `shipping_orders` (`id`, `date`, `fee`, `type`, `status`, `created_at`, `updated_at`, `phone`, `order_id`, `reason_fail`) VALUES
(32, '2023-10-22', '15000', 'Grab', 'Giao hàng thất bại', '2023-10-22 12:34:54', '2023-10-24 13:52:20', '123456789', 23, 'Khách hàng đã thanh toán'),
(35, '2023-10-24', '10.000', 'Grab', 'Giao hàng thành công', '2023-10-24 12:26:16', '2023-10-26 06:59:53', '906322153', 52, 'Khách hàng chưa thanh toán'),
(36, '2023-10-26', '20.000', 'Grab', 'Giao hàng thành công', '2023-10-25 17:03:18', '2023-10-26 07:02:17', '906322153', 37, NULL),
(37, '2023-10-26', '40000', 'GrabCar', 'Chưa giao hàng', '2023-10-26 07:27:31', '2023-10-26 07:27:31', '1234567891', 55, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `social` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`social`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `social`, `created_at`, `updated_at`, `address`, `phone`, `image`) VALUES
(1, 'Nguyễn Hữu Cường', 'cuong979899@gmail.com', NULL, NULL, NULL, '{\"google\":{\"id\":\"108731143950770711805\",\"token\":\"ya29.a0AfB_byCuT7WUHuCXpoWcDf8awGXicHxvipfk6rF42OxjzDE9IdkLNNTuagxoXxBsL9Xb-eydr7iGBiHwKMRphuRLsD01SOUdqD6wJSVpceJD28x_T3D8xbp7QVy9FjHoodBlUJsGZA2HF-XKEEcgRNzqotCY_79Jl9x5aCgYKAfwSARISFQGOcNnCfzn959qUAWaeJLftzzL32A0171\"}}', '2023-10-05 12:21:53', '2023-10-21 11:02:49', NULL, NULL, NULL),
(21, 'Quang', 'Test123@gmail.com', NULL, '$2y$10$9i33x/FRLhyFhMFS6e3xmeNqbCJnH5ck3TMKBk.LWGMOJ4eY.3Axq', 'f8p3dQwWxu1XBuXdG5N1XoNBpWyQE6vvONBr1jAzSYzw1mELS1ZEEpy1UzE4', NULL, '2023-10-07 11:48:18', '2023-10-07 11:48:18', 'Gò Vấp', 906322153, '2023-10-07screenshot_1693414323.png'),
(22, 'Danh', 'Danh123@gmail.com', NULL, '$2y$10$zelG4LCgv92wuKyfq.qY9eVbbjY9gE8k3osCtP8snn7EfCHfg8LXa', NULL, NULL, '2023-10-21 13:59:13', '2023-10-21 13:59:13', 'Thủ Đức', NULL, '2023-10-21food.jpg'),
(24, 'Thành Danh', 'Danh1234@gmail.com', NULL, '$2y$10$wqxRXuaYAsvpMnUTGyQxxu8RVNRIqUqETfcZ0gQDC2L8hljYKQ.Aq', NULL, NULL, '2023-10-21 16:33:10', '2023-10-21 16:33:10', 'Thủ Đức', 906322132, '2023-10-21njrm38k1vdv71.webp'),
(25, 'abc123', 'abc123@gmail.com', NULL, '$2y$10$DdiLe9ha0OzoZ.GiBEcIx.dIS7X/cs4xDShvfA1dvCRGzNRm5R2dG', NULL, NULL, '2023-10-26 07:24:55', '2023-10-26 07:24:55', 'hcm', 0, NULL);

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
-- Indexes for table `admin_remembers`
--
ALTER TABLE `admin_remembers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_remembers_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_goods_id_foreign` (`goods_id`);

--
-- Indexes for table `chat_boxes`
--
ALTER TABLE `chat_boxes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_boxes_user_id_foreign` (`user_id`);

--
-- Indexes for table `chat_box_details`
--
ALTER TABLE `chat_box_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_box_details_admin_id_foreign` (`admin_id`),
  ADD KEY `chat_box_details_chat_id` (`chat_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
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
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

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
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_event_id_foreign` (`event_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `shipping_orders`
--
ALTER TABLE `shipping_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping_orders_order_id_foreign` (`order_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `admin_remembers`
--
ALTER TABLE `admin_remembers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chat_boxes`
--
ALTER TABLE `chat_boxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `chat_box_details`
--
ALTER TABLE `chat_box_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shipping_orders`
--
ALTER TABLE `shipping_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_remembers`
--
ALTER TABLE `admin_remembers`
  ADD CONSTRAINT `admin_remembers_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_goods_id_foreign` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chat_boxes`
--
ALTER TABLE `chat_boxes`
  ADD CONSTRAINT `chat_boxes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chat_box_details`
--
ALTER TABLE `chat_box_details`
  ADD CONSTRAINT `chat_box_details_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chat_box_details_chat_id` FOREIGN KEY (`chat_id`) REFERENCES `chat_boxes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shipping_orders`
--
ALTER TABLE `shipping_orders`
  ADD CONSTRAINT `shipping_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
