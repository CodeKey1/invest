-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 10:59 AM
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
(1, 'صناعي', '2023-05-07 08:34:09', '2023-05-07 08:34:09'),
(2, 'زراعي', '2023-05-11 11:00:58', '2023-05-11 11:00:58'),
(3, 'سياحي', '2023-05-11 11:01:07', '2023-05-11 11:01:07'),
(4, 'خدمي', '2023-05-11 11:01:15', '2023-05-11 11:01:15');

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
(1, 'اسوان', 1, '2023-05-07 06:58:13', '2023-05-07 06:58:13'),
(2, 'دراو', 1, '2023-05-07 06:58:24', '2023-05-07 06:58:24'),
(3, 'كوم امبو', 1, '2023-05-07 06:58:39', '2023-05-07 06:58:39'),
(4, 'نصر النوبة', 1, '2023-05-07 06:58:48', '2023-05-07 06:58:48'),
(5, 'ادفو', 1, '2023-05-07 06:59:00', '2023-05-07 06:59:00');

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
(1, 1, '2023-05-07 08:35:38', '2023-05-07 08:35:38'),
(1, 2, '2023-05-07 08:35:38', '2023-05-07 08:35:38'),
(1, 10, '2023-05-07 08:35:38', '2023-05-07 08:35:38'),
(1, 12, '2023-05-07 08:35:38', '2023-05-07 08:35:38'),
(1, 16, '2023-05-07 08:35:38', '2023-05-07 08:35:38'),
(1, 19, '2023-05-07 08:35:38', '2023-05-07 08:35:38');

-- --------------------------------------------------------

--
-- Table structure for table `export`
--

CREATE TABLE `export` (
  `id` int(11) NOT NULL,
  `export_id` int(11) NOT NULL,
  `export_name` varchar(255) NOT NULL,
  `export_side` varchar(255) NOT NULL,
  `export_date` date NOT NULL,
  `state` bit(1) NOT NULL DEFAULT b'1',
  `export_note` varchar(255) NOT NULL,
  `export_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'أسوان', '2023-05-07 06:57:24', '2023-05-07 06:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `import`
--

CREATE TABLE `import` (
  `id` int(11) NOT NULL,
  `import_id` int(11) DEFAULT NULL,
  `import_name` varchar(255) DEFAULT NULL,
  `import_side` varchar(255) DEFAULT NULL,
  `import_date` date DEFAULT NULL,
  `import_note` varchar(255) DEFAULT NULL,
  `state` bit(1) NOT NULL DEFAULT b'1',
  `import_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'ادارة املاك الدولة الخاصة', '2023-05-07 07:25:49', '2023-05-07 07:25:49'),
(2, 'الوحدة المحلية لمدينة ومركز اسوان', '2023-05-07 07:26:06', '2023-05-07 07:26:06'),
(3, 'الهيئة العامة للسد العالي وخزان اسوان', '2023-05-07 07:26:30', '2023-05-07 07:26:30'),
(4, 'هيئة تنمية بحيرة ناصر', '2023-05-07 07:29:17', '2023-05-07 07:29:17'),
(5, 'الادارة المركزية لري اسوان', '2023-05-07 07:29:53', '2023-05-07 07:29:53'),
(6, 'الادارة العامة لشؤون البيئة بالمحافظة', '2023-05-07 07:30:18', '2023-05-07 07:30:18'),
(7, 'المنطقة العاشرة - هيئة الطرق والكباري والنقل البري', '2023-05-07 07:30:44', '2023-05-07 07:30:44'),
(8, 'مديرية الزراعة', '2023-05-07 07:30:58', '2023-05-07 07:30:58'),
(9, 'ادارة المحاجر بالمحافظة', '2023-05-07 07:31:14', '2023-05-07 07:31:14'),
(10, 'التنمية الحضارية', '2023-05-07 07:31:27', '2023-05-07 07:31:27'),
(11, 'الهيئة العامة للتنمية السياحية باسوان', '2023-05-07 07:31:51', '2023-05-07 07:31:51'),
(12, 'هيئة التخطيط العمراني', '2023-05-07 07:32:10', '2023-05-07 07:32:10'),
(13, 'منطقة اثار اسوان والنوبة', '2023-05-07 07:32:27', '2023-05-07 07:32:27'),
(14, 'الهيئة العامة للابنية التعليمية', '2023-05-07 07:32:44', '2023-05-07 07:32:44'),
(15, 'مديرية التربية والتعليم', '2023-05-07 07:33:04', '2023-05-07 07:33:04'),
(16, 'المركز الوطني لتخطيط استخدامات اراضي الدولة', '2023-05-07 07:33:39', '2023-05-07 07:33:39'),
(17, 'هيئة عمليات القوات المسلحة', '2023-05-07 07:33:55', '2023-05-07 07:33:55'),
(18, 'الهيئة العامة لمشروعات التعمير والتنمية الزراعية', '2023-05-07 07:34:20', '2023-05-07 07:34:20'),
(19, 'الهيئة العامة للتنمية الصناعية', '2023-05-07 07:34:42', '2023-05-07 07:34:42'),
(20, 'الهيئة العامة للثروة المعدنية', '2023-05-07 07:35:09', '2023-05-07 07:35:09'),
(21, 'جهاز تنظيم مرفق الكهرباء وحماية المستهلك', '2023-05-07 07:35:40', '2023-05-07 07:35:40'),
(22, 'وزارة التعليم العالي', '2023-05-07 07:35:51', '2023-05-07 07:35:51');

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
  `model_type` varchar(255) NOT NULL DEFAULT 'App\\Models\\User',
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`, `created_at`, `updated_at`) VALUES
(3, 'App\\Models\\User', 2, NULL, '2023-04-27 10:12:05'),
(3, 'App\\Models\\User', 27, NULL, '2023-04-30 07:35:16'),
(3, 'App\\Models\\User', 29, '2023-04-27 09:43:30', '2023-04-27 09:43:30'),
(3, 'App\\Models\\User', 31, '2023-04-30 11:53:24', '2023-04-30 11:53:24'),
(4, 'App\\Models\\User', 30, '2023-04-30 07:08:40', '2023-04-30 11:53:56');

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
(4, 'المدينة الصناعية الجديدة (العلاقي)', 1, 1, 1, '2023-05-07 08:39:10', '2023-05-07 08:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `feasibility_study` varchar(128) NOT NULL,
  `financial_capital` varchar(128) NOT NULL,
  `commercial_register` varchar(128) DEFAULT 'NULL',
  `tax_card` varchar(128) DEFAULT NULL,
  `site_sketch` varchar(128) DEFAULT NULL,
  `company_reg` varchar(128) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `name` varchar(512) NOT NULL,
  `nid_photo` varchar(128) NOT NULL,
  `request_id` int(11) NOT NULL,
  `place_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `feasibility_study`, `financial_capital`, `commercial_register`, `tax_card`, `site_sketch`, `company_reg`, `status`, `name`, `nid_photo`, `request_id`, `place_id`, `created_at`, `updated_at`) VALUES
(20, '22feasibility_study.png', '22financial_capital.pdf', '', '', '', '', 0, 'مشروع تجريبي', '22nid_photo.png', 22, NULL, '2023-05-07 09:02:03', '2023-05-11 06:49:11'),
(21, '23feasibility_study.png', '23financial_capital.png', '', '23tax_card.png', '', '23company_reg.jpeg', 0, 'مشروع تجريبي 2', '23nid_photo.png', 23, NULL, '2023-05-11 08:31:04', '2023-05-11 08:31:04');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `owner_type` varchar(10) NOT NULL,
  `owner_name` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `representative_name` varchar(256) DEFAULT NULL,
  `representative_id` int(11) DEFAULT NULL,
  `NID` bigint(20) NOT NULL,
  `size` float NOT NULL,
  `size_type` varchar(10) NOT NULL,
  `self_financing` float NOT NULL,
  `recived_date` date NOT NULL,
  `capital` float NOT NULL,
  `phone` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT 0,
  `technical_state` tinyint(1) NOT NULL DEFAULT 2,
  `sub_category_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `name`, `owner_type`, `owner_name`, `address`, `representative_name`, `representative_id`, `NID`, `size`, `size_type`, `self_financing`, `recived_date`, `capital`, `phone`, `state`, `technical_state`, `sub_category_id`, `category_id`, `city_id`, `description`, `created_at`, `updated_at`) VALUES
(22, 'مشروع تجريبي', 'شركة', 'شركة تجريبي', 'اسوان - الشارع الجديد', 'محمد ياسر', 159872, 29805162800001, 500, 'متر', 152010, '2023-05-11', 1000000, 1120535000, 1, 1, 1, 1, 1, 'صضيسيصضث بسيب يسبل سيبل', '2023-05-07 09:02:03', '2023-05-11 11:25:10'),
(23, 'مشروع تجريبي 2', 'شركة', 'شركة تجريبي 2', 'اسوان', 'محمد', 1256, 29805162800001, 13, 'فدان', 164281, '2023-05-11', 15910300, 1120535000, 1, 2, 1, 1, 1, 'شسيشسي', '2023-05-11 08:31:04', '2023-05-11 09:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `request_license`
--

CREATE TABLE `request_license` (
  `id` int(11) NOT NULL,
  `file` varchar(64) DEFAULT NULL,
  `send_date` date DEFAULT current_timestamp(),
  `request_id` int(11) NOT NULL,
  `license_id` int(11) NOT NULL,
  `point` int(11) DEFAULT 0,
  `response_file` varchar(128) DEFAULT NULL,
  `recived_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_license`
--

INSERT INTO `request_license` (`id`, `file`, `send_date`, `request_id`, `license_id`, `point`, `response_file`, `recived_date`, `created_at`, `updated_at`) VALUES
(33, '33 send_file.pdf', '2023-05-07', 22, 1, 1, NULL, NULL, '2023-05-07 09:02:03', '2023-05-07 09:29:51'),
(34, NULL, NULL, 22, 2, 1, NULL, NULL, '2023-05-07 09:02:04', '2023-05-07 09:29:51'),
(35, NULL, NULL, 22, 10, 1, NULL, NULL, '2023-05-07 09:02:04', '2023-05-07 09:29:51'),
(36, NULL, NULL, 22, 12, 1, NULL, NULL, '2023-05-07 09:02:04', '2023-05-07 09:29:51'),
(37, NULL, NULL, 22, 16, 1, NULL, NULL, '2023-05-07 09:02:04', '2023-05-07 09:29:51'),
(38, NULL, NULL, 22, 19, 1, NULL, NULL, '2023-05-07 09:02:04', '2023-05-07 09:29:51'),
(39, NULL, '2023-05-11', 23, 1, 0, NULL, NULL, '2023-05-11 08:31:04', '2023-05-11 08:31:04'),
(40, NULL, '2023-05-11', 23, 2, 0, NULL, NULL, '2023-05-11 08:31:04', '2023-05-11 08:31:04'),
(41, NULL, '2023-05-11', 23, 10, 0, NULL, NULL, '2023-05-11 08:31:04', '2023-05-11 08:31:04'),
(42, NULL, '2023-05-11', 23, 12, 0, NULL, NULL, '2023-05-11 08:31:04', '2023-05-11 08:31:04'),
(43, NULL, '2023-05-11', 23, 16, 0, NULL, NULL, '2023-05-11 08:31:04', '2023-05-11 08:31:04'),
(44, NULL, '2023-05-11', 23, 19, 0, NULL, NULL, '2023-05-11 08:31:04', '2023-05-11 08:31:04');

-- --------------------------------------------------------

--
-- Table structure for table `request_notes`
--

CREATE TABLE `request_notes` (
  `id` int(11) NOT NULL,
  `notes` varchar(512) NOT NULL,
  `request_id` int(11) NOT NULL,
  `license_id` int(11) NOT NULL,
  `sender` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_notes`
--

INSERT INTO `request_notes` (`id`, `notes`, `request_id`, `license_id`, `sender`, `created_at`, `updated_at`) VALUES
(25, 'asda', 22, 1, 27, '2023-05-07 09:17:20', '2023-05-07 09:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `request_suggested_places`
--

CREATE TABLE `request_suggested_places` (
  `id` int(11) NOT NULL,
  `suggested_places` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_suggested_places`
--

INSERT INTO `request_suggested_places` (`id`, `suggested_places`, `request_id`, `created_at`, `updated_at`) VALUES
(2, 4, 22, '2023-05-07 09:02:03', '2023-05-11 06:49:11'),
(3, 4, 23, '2023-05-11 08:31:04', '2023-05-11 08:31:04');

-- --------------------------------------------------------

--
-- Table structure for table `request_technical_decision`
--

CREATE TABLE `request_technical_decision` (
  `id` int(11) NOT NULL,
  `note` varchar(256) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `request_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_technical_decision`
--

INSERT INTO `request_technical_decision` (`id`, `note`, `date`, `request_id`, `created_at`, `updated_at`) VALUES
(1, 'asd', '2023-05-11', 23, '2023-05-11 09:39:29', '2023-05-11 09:39:29'),
(2, 'asdasd', '2023-05-11', 23, '2023-05-11 09:40:22', '2023-05-11 09:40:22'),
(3, 'asdasd', '2023-05-11', 23, '2023-05-11 09:53:54', '2023-05-11 09:53:54'),
(5, 'ads', '2023-05-11', 22, '2023-05-11 09:55:29', '2023-05-11 09:55:29'),
(6, 'dsaf', '2023-05-11', 22, '2023-05-11 09:56:36', '2023-05-11 09:56:36'),
(7, 'asdf', '2023-05-11', 22, '2023-05-11 09:56:40', '2023-05-11 09:56:40');

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
(4, 'user', 'web', NULL, NULL),
(5, 'side', 'web', '2023-04-13 11:02:46', '2023-04-13 11:02:46');

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
(1, 5),
(2, 3),
(2, 5),
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
-- Table structure for table `side`
--

CREATE TABLE `side` (
  `id` int(11) NOT NULL,
  `side_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'غذائي', 1, '2023-05-07 08:34:23', '2023-05-07 08:34:23');

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
  `role` bigint(20) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'mokhtar', 'mmelnobey92@gmail.com', NULL, '$2y$10$RovC5bNuc624.BfK4rB6qudF71tSW934Jr/mA0bCHK29LKZITRe3i', 3, NULL, '2023-01-25 07:40:38', '2023-04-27 10:12:05'),
(27, 'MoHaridy', 'moharidy98@gmail.com', NULL, '$2y$10$cYBsvNUfxLkxkjQU7PzjveY/d3OTIz.rzPsS4iQSoMMG4nEemhCX6', 3, NULL, '2023-03-06 08:56:16', '2023-04-30 07:35:16'),
(29, 'Ahmed Danash', 'invest@isdt.gov', NULL, '$2y$10$xzlAb5Z6c5wi6qrs2vmT.ej.3tG4/kPwd1KUg9uDHREuzP0Z4Xsay', 3, NULL, '2023-04-27 09:43:30', '2023-04-27 09:43:30'),
(30, 'مستخدم الاستثمار', 'user@invest.gov', NULL, '$2y$10$RovC5bNuc624.BfK4rB6qudF71tSW934Jr/mA0bCHK29LKZITRe3i', 4, NULL, '2023-04-30 07:08:39', '2023-04-30 11:53:56'),
(31, 'Abeer', 'abeer@invest.gov', NULL, '$2y$10$5QQPuvxCTVK7Wowm/.zeNexdS3Ab2eWxiH6Uy3iZYHMLycPSX8NMC', 3, NULL, '2023-04-30 11:53:24', '2023-04-30 11:53:24');

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
-- Indexes for table `export`
--
ALTER TABLE `export`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `import`
--
ALTER TABLE `import`
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
  ADD KEY `city_id` (`city_id`),
  ADD KEY `place_ibfk_1` (`place_category_id`);

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
  ADD KEY `sub_ctegory_id` (`sub_category_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `request_license`
--
ALTER TABLE `request_license`
  ADD PRIMARY KEY (`id`),
  ADD KEY `license_id` (`license_id`),
  ADD KEY `request_id` (`request_id`);

--
-- Indexes for table `request_notes`
--
ALTER TABLE `request_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_id` (`request_id`),
  ADD KEY `license_id` (`license_id`),
  ADD KEY `sender` (`sender`);

--
-- Indexes for table `request_suggested_places`
--
ALTER TABLE `request_suggested_places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_suggested_places_ibfk_1` (`request_id`),
  ADD KEY `suggested_places` (`suggested_places`);

--
-- Indexes for table `request_technical_decision`
--
ALTER TABLE `request_technical_decision`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_id` (`request_id`);

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
-- Indexes for table `side`
--
ALTER TABLE `side`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`side_name`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assets_type`
--
ALTER TABLE `assets_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auction`
--
ALTER TABLE `auction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contract_type`
--
ALTER TABLE `contract_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c_license`
--
ALTER TABLE `c_license`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `export`
--
ALTER TABLE `export`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gov`
--
ALTER TABLE `gov`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `import`
--
ALTER TABLE `import`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `license`
--
ALTER TABLE `license`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `request_license`
--
ALTER TABLE `request_license`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `request_notes`
--
ALTER TABLE `request_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `request_suggested_places`
--
ALTER TABLE `request_suggested_places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `request_technical_decision`
--
ALTER TABLE `request_technical_decision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `side`
--
ALTER TABLE `side`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
  ADD CONSTRAINT `model_has_roles_ibfk_1` FOREIGN KEY (`model_id`) REFERENCES `users` (`id`),
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
  ADD CONSTRAINT `place_ibfk_1` FOREIGN KEY (`place_category_id`) REFERENCES `category` (`id`),
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
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_category` (`id`),
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  ADD CONSTRAINT `request_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `request_license`
--
ALTER TABLE `request_license`
  ADD CONSTRAINT `request_license_ibfk_1` FOREIGN KEY (`license_id`) REFERENCES `license` (`id`),
  ADD CONSTRAINT `request_license_ibfk_2` FOREIGN KEY (`request_id`) REFERENCES `request` (`id`);

--
-- Constraints for table `request_notes`
--
ALTER TABLE `request_notes`
  ADD CONSTRAINT `request_notes_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `request` (`id`),
  ADD CONSTRAINT `request_notes_ibfk_2` FOREIGN KEY (`license_id`) REFERENCES `license` (`id`),
  ADD CONSTRAINT `request_notes_ibfk_3` FOREIGN KEY (`sender`) REFERENCES `users` (`id`);

--
-- Constraints for table `request_suggested_places`
--
ALTER TABLE `request_suggested_places`
  ADD CONSTRAINT `request_suggested_places_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `request` (`id`),
  ADD CONSTRAINT `request_suggested_places_ibfk_2` FOREIGN KEY (`suggested_places`) REFERENCES `place` (`id`);

--
-- Constraints for table `request_technical_decision`
--
ALTER TABLE `request_technical_decision`
  ADD CONSTRAINT `request_technical_decision_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `request` (`id`);

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
