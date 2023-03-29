-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2023 at 12:38 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `investment`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `address` varchar(256) NOT NULL,
  `contract_cost` float DEFAULT NULL,
  `contract_period` varchar(64) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `note` varchar(512) NOT NULL,
  `city_id` int(11) NOT NULL,
  `assets_type_id` int(11) NOT NULL,
  `contract_type_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `number`, `name`, `address`, `contract_cost`, `contract_period`, `status`, `note`, `city_id`, `assets_type_id`, `contract_type_id`, `created_at`, `updated_at`) VALUES
(1, 408, 'قطعة ارض مول', 'اسوان الجديدة-الحي الاول', NULL, NULL, 1, 'قطعة ارض بمساحة 600م لبناء مول تجاري وخدمي', 1, 1, 2, '2023-03-19 07:33:51', '2023-03-26 08:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `assets_type`
--

CREATE TABLE `assets_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assets_type`
--

INSERT INTO `assets_type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'اراضي', '2023-03-16 11:00:19', '2023-03-16 11:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

CREATE TABLE `auction` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `label` varchar(250) NOT NULL,
  `note` varchar(256) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`id`, `name`, `date`, `label`, `note`, `created_at`, `updated_at`) VALUES
(2, 'مزاد 1', '2023-03-01', 'بيع وشعرض اراضي', 'شسيبشسيب', '2023-03-22 08:43:34', '2023-03-22 08:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'صناعي', '2023-03-16 09:32:40', '2023-03-16 09:32:40'),
(2, 'زراعي', '2023-03-16 09:33:20', '2023-03-16 09:33:20'),
(3, 'سياحي', '2023-03-16 09:33:29', '2023-03-16 09:33:29'),
(4, 'خدمي', '2023-03-16 09:33:35', '2023-03-16 09:33:35'),
(5, 'اخرى', '2023-03-16 09:33:42', '2023-03-16 09:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gov_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `gov_id`, `created_at`, `updated_at`) VALUES
(1, 'اسوان', 1, '2023-03-16 07:45:03', '2023-03-16 07:45:03'),
(2, 'دراو', 1, '2023-03-16 07:45:19', '2023-03-16 07:45:19'),
(3, 'نصر النوبة', 1, '2023-03-16 08:22:40', '2023-03-16 08:22:40'),
(4, 'الاقصر', 6, '2023-03-16 08:38:47', '2023-03-16 08:38:47'),
(5, 'اسنا', 6, '2023-03-16 08:39:05', '2023-03-16 08:39:05');

-- --------------------------------------------------------

--
-- Table structure for table `contract_type`
--

CREATE TABLE `contract_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contract_type`
--

INSERT INTO `contract_type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'تمليك', '2023-03-16 10:46:01', '2023-03-16 10:46:01'),
(2, 'ايجار', '2023-03-16 10:59:22', '2023-03-16 10:59:22'),
(3, 'حق انتفاع', '2023-03-19 10:56:04', '2023-03-19 10:56:04');

-- --------------------------------------------------------

--
-- Table structure for table `c_license`
--

CREATE TABLE `c_license` (
  `category_id` int(11) NOT NULL,
  `license_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `c_license`
--

INSERT INTO `c_license` (`category_id`, `license_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-03-16 10:32:00', '2023-03-16 10:32:00'),
(1, 2, '2023-03-16 10:32:00', '2023-03-16 10:32:00'),
(1, 3, '2023-03-16 10:41:25', '2023-03-16 10:41:25'),
(1, 4, '2023-03-16 10:41:25', '2023-03-16 10:41:25');

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
-- Table structure for table `gov`
--

CREATE TABLE `gov` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gov`
--

INSERT INTO `gov` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'اسوان', '2023-03-16 07:34:56', '2023-03-16 07:34:56'),
(6, 'الاقصر', '2023-03-16 08:38:34', '2023-03-16 08:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `license`
--

CREATE TABLE `license` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `license`
--

INSERT INTO `license` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'المحافظ', '2023-03-16 10:14:05', '2023-03-16 10:14:05'),
(2, 'ادارة املاك الدولة', '2023-03-16 10:16:34', '2023-03-16 10:16:34'),
(3, 'الوحدة المحلية لمركز ومدينة اسوان', '2023-03-16 10:39:41', '2023-03-16 10:39:41'),
(4, 'التنمية الحضارية', '2023-03-16 10:41:12', '2023-03-16 10:41:12');

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
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_03_06_092359_create_permission_tables', 2),
(8, '2023_03_06_095908_create_permission_tables', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(3, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 27);

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `id` int(11) NOT NULL,
  `recived` date NOT NULL,
  `investor` varchar(250) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `work_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `delivery_record` varchar(256) NOT NULL,
  `note` varchar(512) NOT NULL,
  `contract_cost` float NOT NULL,
  `contract_period` date NOT NULL,
  `increase_rate` float NOT NULL,
  `assets_id` int(11) NOT NULL,
  `auction_id` int(11) NOT NULL,
  `contract_type_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`id`, `recived`, `investor`, `phone`, `work_date`, `status`, `delivery_record`, `note`, `contract_cost`, `contract_period`, `increase_rate`, `assets_id`, `auction_id`, `contract_type_id`, `created_at`, `updated_at`) VALUES
(1, '2023-03-01', 'محمد ياسر عمر', '01010157993', '2023-03-30', 1, '1-delivery_record.pdf', 'سيdas', 150000, '2023-06-16', 1, 1, 2, 1, '2023-03-22 08:45:54', '2023-03-26 08:04:26'),
(2, '2023-03-17', 'fdsgsdf', '4325345', '2023-03-24', 0, '2-delivery_record.pdf', 'sdagfdfasdfasdfasdf asdfa sdf asdf', 123, '2023-03-01', 45, 1, 2, 3, '2023-03-22 10:47:20', '2023-03-26 08:18:46'),
(3, '2023-03-16', 'بسيليس', '4352345', '2023-03-24', 1, '1679561298-delivery_record.pdf', 'يبسلبي', 15988800, '2025-01-24', 32, 1, 2, 3, '2023-03-23 06:48:18', '2023-03-23 06:48:18');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'investment.create', 'web', NULL, NULL),
(2, 'investment.edit', 'web', NULL, NULL),
(3, 'investment.index', 'web', NULL, NULL),
(4, 'import.create', 'web', NULL, NULL),
(5, 'import.index', 'web', NULL, NULL),
(6, 'import.edit', 'web', NULL, NULL),
(7, 'home', 'web', NULL, NULL),
(8, 'export.create', 'web', NULL, NULL),
(9, 'export.index', 'web', NULL, NULL),
(10, 'export.edit', 'web', NULL, NULL),
(11, 'other.search', 'web', NULL, NULL),
(12, 'auction.create', 'web', NULL, NULL),
(13, 'auction.index', 'web', NULL, NULL),
(14, 'auction.edit', 'web', NULL, NULL),
(15, 'report.report', 'web', NULL, NULL),
(16, 'roles.create', 'web', NULL, NULL),
(17, 'roles.index', 'web', NULL, NULL),
(18, 'roles.edit', 'web', NULL, NULL),
(19, 'section.create', 'web', NULL, NULL),
(20, 'section.index', 'web', NULL, NULL),
(21, 'section.edit', 'web', NULL, NULL),
(22, 'side.create', 'web', NULL, NULL),
(23, 'side.index', 'web', NULL, NULL),
(24, 'side.edit', 'web', NULL, NULL),
(25, 'user.create', 'web', NULL, NULL),
(26, 'user.index', 'web', NULL, NULL),
(27, 'user.edit', 'web', NULL, NULL);

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
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `place_category_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`id`, `name`, `status`, `place_category_id`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'العلاقي', 1, 1, 2, '2023-03-16 09:08:42', '2023-03-16 09:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `place_category`
--

CREATE TABLE `place_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `place_category`
--

INSERT INTO `place_category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'صناعية', '2023-03-16 09:00:44', '2023-03-16 09:00:44'),
(2, 'زراعية', '2023-03-16 09:01:09', '2023-03-16 09:01:09'),
(3, 'سياحية', '2023-03-16 09:01:16', '2023-03-16 09:01:16'),
(4, 'خدمية', '2023-03-16 09:01:33', '2023-03-16 09:01:33'),
(5, 'مختلفة', '2023-03-16 09:01:39', '2023-03-16 09:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `feasibility_study` varchar(128) NOT NULL,
  `financial_capital` varchar(128) NOT NULL,
  `commercial_register` varchar(128) NOT NULL,
  `tax_card` varchar(128) NOT NULL,
  `site_sketch` varchar(128) NOT NULL,
  `location_string` varchar(128) NOT NULL,
  `status` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `request_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `owner_type` int(11) NOT NULL,
  `owner_name` int(11) NOT NULL,
  `address` int(11) NOT NULL,
  `representative_name` int(11) NOT NULL,
  `representative_id` int(11) NOT NULL,
  `NID` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `size_type` int(11) NOT NULL,
  `Self_financing` int(11) NOT NULL,
  `recived_date` int(11) NOT NULL,
  `capital` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `sub_ctegory_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_license`
--

CREATE TABLE `request_license` (
  `file` varchar(64) NOT NULL,
  `request_id` int(11) NOT NULL,
  `license_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_notes`
--

CREATE TABLE `request_notes` (
  `notes` varchar(512) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_suggested_places`
--

CREATE TABLE `request_suggested_places` (
  `suggested_places` varchar(250) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(3, 'super_admin', 'web', '2023-03-06 08:56:15', '2023-03-06 08:56:15'),
(4, 'user', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `name`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'غذائية', 1, '2023-03-16 10:02:53', '2023-03-16 10:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'mokhtar', 'mmelnobey92@gmail.com', NULL, '$2y$10$8FBw3XxfWzHu5Ow8vhxdFOzSt85RuG7JgJxgC4TaS7qT5h35vv0Vu', 'super_admin', NULL, '2023-01-25 07:40:38', '2023-02-27 07:40:38'),
(27, 'MoHaridy', 'moharidy98@gmail.com', NULL, '$2y$10$kowYeGTvHeeleREYmNb6q.EISAiVwvw/OM7X9PNJd6e3jMC63dwvi', 'super_admin', NULL, '2023-03-06 08:56:16', '2023-03-06 08:56:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `assets_type_id` (`assets_type_id`),
  ADD KEY `contract_type_id` (`contract_type_id`);

--
-- Indexes for table `assets_type`
--
ALTER TABLE `assets_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gov_id` (`gov_id`);

--
-- Indexes for table `contract_type`
--
ALTER TABLE `contract_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_license`
--
ALTER TABLE `c_license`
  ADD PRIMARY KEY (`category_id`,`license_id`),
  ADD KEY `license_id` (`license_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gov`
--
ALTER TABLE `gov`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `license`
--
ALTER TABLE `license`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assets_id` (`assets_id`),
  ADD KEY `auction_id` (`auction_id`),
  ADD KEY `contract_type_id` (`contract_type_id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`),
  ADD KEY `place_category_id` (`place_category_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `place_category`
--
ALTER TABLE `place_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_id` (`request_id`),
  ADD KEY `place_id` (`place_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_ctegory_id` (`sub_ctegory_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `request_license`
--
ALTER TABLE `request_license`
  ADD PRIMARY KEY (`request_id`,`license_id`),
  ADD KEY `license_id` (`license_id`);

--
-- Indexes for table `request_notes`
--
ALTER TABLE `request_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_suggested_places`
--
ALTER TABLE `request_suggested_places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

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
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assets_type`
--
ALTER TABLE `assets_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auction`
--
ALTER TABLE `auction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contract_type`
--
ALTER TABLE `contract_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `c_license`
--
ALTER TABLE `c_license`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gov`
--
ALTER TABLE `gov`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `license`
--
ALTER TABLE `license`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `place_category`
--
ALTER TABLE `place_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `assets_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  ADD CONSTRAINT `assets_ibfk_2` FOREIGN KEY (`assets_type_id`) REFERENCES `assets_type` (`id`),
  ADD CONSTRAINT `assets_ibfk_3` FOREIGN KEY (`contract_type_id`) REFERENCES `contract_type` (`id`);

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`gov_id`) REFERENCES `gov` (`id`);

--
-- Constraints for table `c_license`
--
ALTER TABLE `c_license`
  ADD CONSTRAINT `c_license_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `c_license_ibfk_2` FOREIGN KEY (`license_id`) REFERENCES `license` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `offer`
--
ALTER TABLE `offer`
  ADD CONSTRAINT `offer_ibfk_1` FOREIGN KEY (`assets_id`) REFERENCES `assets` (`id`),
  ADD CONSTRAINT `offer_ibfk_2` FOREIGN KEY (`auction_id`) REFERENCES `auction` (`id`),
  ADD CONSTRAINT `offer_ibfk_3` FOREIGN KEY (`contract_type_id`) REFERENCES `contract_type` (`id`);

--
-- Constraints for table `place`
--
ALTER TABLE `place`
  ADD CONSTRAINT `place_ibfk_1` FOREIGN KEY (`place_category_id`) REFERENCES `place_category` (`id`),
  ADD CONSTRAINT `place_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `request` (`id`),
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`sub_ctegory_id`) REFERENCES `sub_category` (`id`),
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`);

--
-- Constraints for table `request_license`
--
ALTER TABLE `request_license`
  ADD CONSTRAINT `request_license_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `request` (`id`),
  ADD CONSTRAINT `request_license_ibfk_2` FOREIGN KEY (`license_id`) REFERENCES `license` (`id`);

--
-- Constraints for table `request_notes`
--
ALTER TABLE `request_notes`
  ADD CONSTRAINT `request_notes_ibfk_1` FOREIGN KEY (`id`) REFERENCES `request` (`id`);

--
-- Constraints for table `request_suggested_places`
--
ALTER TABLE `request_suggested_places`
  ADD CONSTRAINT `request_suggested_places_ibfk_1` FOREIGN KEY (`id`) REFERENCES `request` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;