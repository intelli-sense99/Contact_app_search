-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2024 at 12:48 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_contact`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int UNSIGNED NOT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `order` int NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `parent_id`, `order`, `title`, `icon`, `uri`, `permission`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Dashboard', 'icon-chart-bar', '/', NULL, NULL, NULL),
(2, 0, 2, 'Admin', 'icon-server', '', NULL, NULL, NULL),
(3, 2, 3, 'Users', 'icon-users', 'auth/users', NULL, NULL, NULL),
(4, 2, 4, 'Roles', 'icon-user', 'auth/roles', NULL, NULL, NULL),
(5, 2, 5, 'Permission', 'icon-ban', 'auth/permissions', NULL, NULL, NULL),
(6, 2, 6, 'Menu', 'icon-bars', 'auth/menu', NULL, NULL, NULL),
(7, 2, 7, 'Operation log', 'icon-history', 'auth/logs', NULL, NULL, NULL),
(8, 0, 7, 'Helpers', 'icon-cogs', '', NULL, '2024-05-30 02:25:54', '2024-05-30 02:25:54'),
(9, 8, 8, 'Scaffold', 'icon-keyboard', 'helpers/scaffold', NULL, '2024-05-30 02:25:54', '2024-05-30 02:25:54'),
(10, 8, 9, 'Database terminal', 'icon-database', 'helpers/terminal/database', NULL, '2024-05-30 02:25:54', '2024-05-30 02:25:54'),
(11, 8, 10, 'Laravel artisan', 'icon-terminal', 'helpers/terminal/artisan', NULL, '2024-05-30 02:25:54', '2024-05-30 02:25:54'),
(12, 8, 11, 'Routes', 'icon-list-alt', 'helpers/routes', NULL, '2024-05-30 02:25:54', '2024-05-30 02:25:54'),
(13, 0, 11, 'Subscribers', 'icon-file', 'subscribers', NULL, '2024-05-30 02:35:10', '2024-05-30 02:35:10'),
(14, 0, 11, 'Contacts', 'icon-file', 'contacts', NULL, '2024-05-30 02:39:40', '2024-05-30 02:39:40');

-- --------------------------------------------------------

--
-- Table structure for table `admin_operation_log`
--

CREATE TABLE `admin_operation_log` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_operation_log`
--

INSERT INTO `admin_operation_log` (`id`, `user_id`, `path`, `method`, `ip`, `input`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-05-30 02:27:34', '2024-05-30 02:27:34'),
(2, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-05-30 02:30:15', '2024-05-30 02:30:15'),
(3, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2024-05-30 02:33:10', '2024-05-30 02:33:10'),
(4, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-05-30 02:33:33', '2024-05-30 02:33:33'),
(5, 1, 'admin/helpers/scaffold', 'POST', '127.0.0.1', '{\"table_name\":\"subscribers\",\"model_name\":\"App\\\\Models\\\\subscriber\",\"controller_name\":\"App\\\\Admin\\\\Controllers\\\\Subscriber_controller\",\"create\":[\"controller\",\"migrate\",\"menu_item\"],\"fields\":[{\"name\":null,\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null}],\"timestamps\":\"on\",\"primary_key\":\"id\",\"_token\":\"f3sJUPa8c6m6xsRHYUIJId3fWRYBz180aRJm6VQj\"}', '2024-05-30 02:35:10', '2024-05-30 02:35:10'),
(6, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-05-30 02:35:11', '2024-05-30 02:35:11'),
(7, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-05-30 02:37:10', '2024-05-30 02:37:10'),
(8, 1, 'admin/subscribers', 'GET', '127.0.0.1', '[]', '2024-05-30 02:37:13', '2024-05-30 02:37:13'),
(9, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-05-30 02:38:30', '2024-05-30 02:38:30'),
(10, 1, 'admin/helpers/scaffold', 'POST', '127.0.0.1', '{\"table_name\":\"contacts\",\"model_name\":\"App\\\\Models\\\\contact\",\"controller_name\":\"App\\\\Admin\\\\Controllers\\\\Contact_controller\",\"create\":[\"controller\",\"migrate\",\"menu_item\"],\"fields\":[{\"name\":null,\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null}],\"timestamps\":\"on\",\"primary_key\":\"id\",\"_token\":\"f3sJUPa8c6m6xsRHYUIJId3fWRYBz180aRJm6VQj\"}', '2024-05-30 02:39:39', '2024-05-30 02:39:39'),
(11, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-05-30 02:39:41', '2024-05-30 02:39:41'),
(12, 1, 'admin/helpers/scaffold', 'GET', '127.0.0.1', '[]', '2024-05-30 02:40:03', '2024-05-30 02:40:03'),
(13, 1, 'admin/contacts', 'GET', '127.0.0.1', '[]', '2024-05-30 02:40:06', '2024-05-30 02:40:06'),
(14, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-05-30 02:45:20', '2024-05-30 02:45:20'),
(15, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-05-30 02:52:24', '2024-05-30 02:52:24'),
(16, 1, 'admin/contacts', 'GET', '127.0.0.1', '[]', '2024-05-30 02:52:39', '2024-05-30 02:52:39'),
(17, 1, 'admin/contacts/2/edit', 'GET', '127.0.0.1', '[]', '2024-05-30 02:52:45', '2024-05-30 02:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `admin_permissions`
--

CREATE TABLE `admin_permissions` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `http_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_permissions`
--

INSERT INTO `admin_permissions` (`id`, `name`, `slug`, `http_method`, `http_path`, `created_at`, `updated_at`) VALUES
(1, 'All permission', '*', '', '*', NULL, NULL),
(2, 'Dashboard', 'dashboard', 'GET', '/', NULL, NULL),
(3, 'Login', 'auth.login', '', '/auth/login\r\n/auth/logout', NULL, NULL),
(4, 'User setting', 'auth.setting', 'GET,PUT', '/auth/setting', NULL, NULL),
(5, 'Auth management', 'auth.management', '', '/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs', NULL, NULL),
(6, 'Admin helpers', 'ext.helpers', '', '/helpers/*', '2024-05-30 02:25:54', '2024-05-30 02:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'administrator', '2024-05-30 02:23:29', '2024-05-30 02:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `admin_role_menu`
--

CREATE TABLE `admin_role_menu` (
  `role_id` int NOT NULL,
  `menu_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role_menu`
--

INSERT INTO `admin_role_menu` (`role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_role_permissions`
--

CREATE TABLE `admin_role_permissions` (
  `role_id` int NOT NULL,
  `permission_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role_permissions`
--

INSERT INTO `admin_role_permissions` (`role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_role_users`
--

CREATE TABLE `admin_role_users` (
  `role_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role_users`
--

INSERT INTO `admin_role_users` (`role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `name`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$12$kBTUOy0kYPKhip4Gmp3vf.cwpV4975IO6YyP.PEe4YDdQDZKQad4S', 'Administrator', NULL, NULL, '2024-05-30 02:23:29', '2024-05-30 02:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_permissions`
--

CREATE TABLE `admin_user_permissions` (
  `user_id` int NOT NULL,
  `permission_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_highlighted` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `fname`, `lname`, `phone`, `email`, `address`, `city`, `image`, `author_id`, `created_at`, `updated_at`, `is_highlighted`) VALUES
(2, 'Gurmit', 'singh', '7845612331', 'gurmit88123@gmail.com', 'jhvfanavkvklma', 'Ludhiana', '1714110329.jpg', 4, '2024-04-24 00:13:18', '2024-04-26 00:15:40', '1'),
(3, 'Lovpreet', 'singh', '6549873215', 'preet98lov@gmail.com', 'vhbvjdnvdhfvba vma djajfv  sm dfjhs', 'jalandhar', '1713946367.jpg', 4, '2024-04-24 02:42:48', '2024-04-24 12:41:13', '1'),
(4, 'Gurnam', 'Gill', '8651284652', 'kaur85966@gmail.com', 'cadjbankm', 'delhi', '1713947316.jpg', 4, '2024-04-24 02:58:36', '2024-04-24 12:30:08', '0'),
(5, 'harpreet', 'singh', '7845612331', 'hrr89332@gmail.com', 'dnavlmapoavm', 'jalandhar', '1713955923.jpg', 14, '2024-04-24 05:22:03', '2024-04-24 05:22:03', '0'),
(6, 'love', 'singh', '9874563215', 'sin651@gmail.com', 'fjnkskmolz', 'delhi', '1713976573.jpg', 14, '2024-04-24 11:06:13', '2024-04-24 11:06:13', '1'),
(7, 'Harnam', 'kaur', '8465128465', 'harnam85964@gmail.com', 'jvka,mmplavlavjkkcm kjkndf', 'Ludhiana', '1713983230.jpg', 4, '2024-04-24 12:57:10', '2024-04-26 00:10:01', '1'),
(8, 'laxmi', 'kumari', '7845612331', 'kumari4645@gmail.com', 'd vsehjvna', 'delhi', '1714032072.jpg', 4, '2024-04-25 02:31:12', '2024-04-25 02:31:12', '1'),
(10, 'gurpreet', 'kaur', '8527419963', 'gurpreet865@gmail.com', 'dvhjfbvka', 'jalandhar', '1714107364.jpg', 4, '2024-04-25 23:26:04', '2024-04-26 00:18:53', '0'),
(11, 'nikhil', 'singh', '9874563296', 'nik85@gmail.com', 'danvklavmpvaokln', 'Ludhiana', '1714107671.jpg', 4, '2024-04-25 23:31:11', '2024-04-26 00:15:52', '1'),
(12, 'gurprret', 'singh', '8888526399', 'gurprret98456@gmail.com', 'dvavkfnklknalk', 'jalandhar', '1714107751.jpg', 4, '2024-04-25 23:32:31', '2024-04-25 23:32:31', '1'),
(13, 'harry', 'potter', '8527419635', 'potter55@gmail.com', 'dmvnsijfnvlksmfvoslmvsom', 'Ludhiana', '1717848870.jpg', 14, '2024-06-08 06:44:31', '2024-06-08 06:44:31', '1'),
(14, 'gurleen', 'kaur', '8527419635', 'gurl552en@gmail.com', 'cnsvdkamll', 'Ludhiana', '1717848909.jpg', 14, '2024-06-08 06:45:09', '2024-06-08 06:45:09', '0'),
(15, 'sumit', 'kumar', '8527419635', 'sumit@gmail.com', 'c sdkvivi', 'delhi', '1717848953.jpg', 14, '2024-06-08 06:45:53', '2024-06-08 06:45:53', '0'),
(16, 'gopal', 'sharma', '8527419635', 'gopal856@gmail.com', 'fernsnfwkn', 'Ludhiana', '1717848987.jpg', 14, '2024-06-08 06:46:27', '2024-06-08 06:46:27', '0'),
(17, 'laxmi', 'kumari', '8527419635', 'lax485@gmail.com', 'jvdksjvskfvsjfv', 'delhi', '1717849029.jpg', 14, '2024-06-08 06:47:09', '2024-06-08 06:47:09', '1');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_22_085258_create_contact_users_table', 1),
(6, '2024_04_22_170958_alter_contact_users_table', 2),
(7, '2024_04_23_095110_alter_contact_users_table', 3),
(8, '2024_04_23_104356_create_contacts_table', 4),
(9, '2024_04_24_075716_alter_contacts_table', 5),
(10, '2024_04_24_093627_alter_subscribers_table', 6),
(11, '2024_04_26_042838_alter_contacts_table', 7),
(12, '2016_01_04_173148_create_admin_tables', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `fname`, `lname`, `phone`, `image`, `email`, `password`, `created_at`, `updated_at`) VALUES
(3, 'govid', 'kumar', '8527419638', NULL, 'gov8566@gmail.com', '225699', '2024-04-22 06:39:20', '2024-04-23 02:14:12'),
(4, 'guri', 'kaur', '8527419637', '1713952622.jpg', 'gur8856@gmail.com', '222', '2024-04-22 10:17:24', '2024-04-22 10:17:24'),
(5, 'hary', 'singh', '8524569635', NULL, 'hary896@gmail.com', '2245', '2024-04-22 10:17:51', '2024-04-22 10:17:51'),
(6, 'lov', 'kumar', '8794631255', NULL, 'lov8835@gmail.com', '52639', '2024-04-22 10:18:42', '2024-04-22 10:18:42'),
(7, 'gorave', 'kumar', '7952634156', NULL, 'gorave8859@gmail.com', '8888', '2024-04-22 11:25:26', '2024-04-22 11:51:59'),
(9, 'rahul', 'choudhary', '6996385274', NULL, 'rahul889652@gmail.com', '524162425', '2024-04-22 11:56:13', '2024-04-23 02:24:06'),
(10, 'riya', 'roy', '8794561322', NULL, 'roy985@gmail.com', '13265', '2024-04-23 03:04:05', '2024-04-23 03:04:05'),
(11, 'lucky', 'singh', '8524562582', NULL, 'lucky885@gmail.com', '123458', '2024-04-23 04:34:14', '2024-04-23 04:34:14'),
(12, 'harry', 'choudhary', '4521597535', NULL, 'hary862@gmail.com', '528', '2024-04-23 04:46:19', '2024-04-23 04:46:19'),
(13, 'amit', 'kumar', '9874563215', '1713952624.jpg', 'amit4865@gmail.com', '258963', '2024-04-24 04:27:04', '2024-04-24 04:27:04'),
(14, 'gorave', 'singh', '8524562599', '1713952823.jpg', 'gor852963@gmail.com', '123456852', '2024-04-24 04:30:23', '2024-04-24 04:30:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
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
-- Indexes for table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_operation_log`
--
ALTER TABLE `admin_operation_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_operation_log_user_id_index` (`user_id`);

--
-- Indexes for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_permissions_name_unique` (`name`),
  ADD UNIQUE KEY `admin_permissions_slug_unique` (`slug`);

--
-- Indexes for table `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_roles_name_unique` (`name`),
  ADD UNIQUE KEY `admin_roles_slug_unique` (`slug`);

--
-- Indexes for table `admin_role_menu`
--
ALTER TABLE `admin_role_menu`
  ADD KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`);

--
-- Indexes for table `admin_role_permissions`
--
ALTER TABLE `admin_role_permissions`
  ADD KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`);

--
-- Indexes for table `admin_role_users`
--
ALTER TABLE `admin_role_users`
  ADD KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_username_unique` (`username`);

--
-- Indexes for table `admin_user_permissions`
--
ALTER TABLE `admin_user_permissions`
  ADD KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
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
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
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
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `admin_operation_log`
--
ALTER TABLE `admin_operation_log`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
