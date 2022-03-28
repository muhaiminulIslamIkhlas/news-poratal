-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 27, 2022 at 01:03 PM
-- Server version: 5.7.37-0ubuntu0.18.04.1
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `order`, `created_at`, `updated_at`) VALUES
(1, 'প্রচ্ছদ', 1, '2022-03-27 06:49:05', '2022-03-27 06:49:05'),
(2, 'রাজনীিত', 2, '2022-03-27 06:49:05', '2022-03-27 06:49:05'),
(3, 'জাতীয়', 3, '2022-03-27 06:49:05', '2022-03-27 06:49:05'),
(4, 'খেলা', 4, '2022-03-27 06:49:05', '2022-03-27 06:49:05'),
(5, 'আন্তর্জাতিক', 5, '2022-03-27 06:49:05', '2022-03-27 06:49:05'),
(6, 'বিনোদন', 6, '2022-03-27 06:49:05', '2022-03-27 06:49:05'),
(7, 'স্বাস্থ্য', 7, '2022-03-27 06:49:05', '2022-03-27 06:49:05'),
(8, 'ফিচার', 8, '2022-03-27 06:49:06', '2022-03-27 06:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bn_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `bn_name`, `lat`, `lon`, `url`, `status`, `division_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Comilla', 'কুমিল্লা', '23.4682747', '91.1788135', 'www.comilla.gov.bd', 1, 1, NULL, NULL, NULL),
(2, 'Feni', 'ফেনী', '23.023231', '91.3840844', 'www.feni.gov.bd', 1, 1, NULL, NULL, NULL),
(3, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', '23.9570904', '91.1119286', 'www.brahmanbaria.gov.bd', 1, 1, NULL, NULL, NULL),
(4, 'Rangamati', 'রাঙ্গামাটি', NULL, NULL, 'www.rangamati.gov.bd', 1, 1, NULL, NULL, NULL),
(5, 'Noakhali', 'নোয়াখালী', '22.869563', '91.099398', 'www.noakhali.gov.bd', 1, 1, NULL, NULL, NULL),
(6, 'Chandpur', 'চাঁদপুর', '23.2332585', '90.6712912', 'www.chandpur.gov.bd', 1, 1, NULL, NULL, NULL),
(7, 'Lakshmipur', 'লক্ষ্মীপুর', '22.942477', '90.841184', 'www.lakshmipur.gov.bd', 1, 1, NULL, NULL, NULL),
(8, 'Chattogram', 'চট্টগ্রাম', '22.335109', '91.834073', 'www.chittagong.gov.bd', 1, 1, NULL, NULL, NULL),
(9, 'Coxsbazar', 'কক্সবাজার', NULL, NULL, 'www.coxsbazar.gov.bd', 1, 1, NULL, NULL, NULL),
(10, 'Khagrachhari', 'খাগড়াছড়ি', '23.119285', '91.984663', 'www.khagrachhari.gov.bd', 1, 1, NULL, NULL, NULL),
(11, 'Bandarban', 'বান্দরবান', '22.1953275', '92.2183773', 'www.bandarban.gov.bd', 1, 1, NULL, NULL, NULL),
(12, 'Sirajganj', 'সিরাজগঞ্জ', '24.4533978', '89.7006815', 'www.sirajganj.gov.bd', 1, 2, NULL, NULL, NULL),
(13, 'Pabna', 'পাবনা', '23.998524', '89.233645', 'www.pabna.gov.bd', 1, 2, NULL, NULL, NULL),
(14, 'Bogura', 'বগুড়া', '24.8465228', '89.377755', 'www.bogra.gov.bd', 1, 2, NULL, NULL, NULL),
(15, 'Rajshahi', 'রাজশাহী', NULL, NULL, 'www.rajshahi.gov.bd', 1, 2, NULL, NULL, NULL),
(16, 'Natore', 'নাটোর', '24.420556', '89.000282', 'www.natore.gov.bd', 1, 2, NULL, NULL, NULL),
(17, 'Joypurhat', 'জয়পুরহাট', NULL, NULL, 'www.joypurhat.gov.bd', 1, 2, NULL, NULL, NULL),
(18, 'Chapainawabganj', 'চাঁপাইনবাবগঞ্জ', '24.5965034', '88.2775122', 'www.chapainawabganj.gov.bd', 1, 2, NULL, NULL, NULL),
(19, 'Naogaon', 'নওগাঁ', NULL, NULL, 'www.naogaon.gov.bd', 1, 2, NULL, NULL, NULL),
(20, 'Jashore', 'যশোর', '23.16643', '89.2081126', 'www.jessore.gov.bd', 1, 3, NULL, NULL, NULL),
(21, 'Satkhira', 'সাতক্ষীরা', NULL, NULL, 'www.satkhira.gov.bd', 1, 3, NULL, NULL, NULL),
(22, 'Meherpur', 'মেহেরপুর', '23.762213', '88.631821', 'www.meherpur.gov.bd', 1, 3, NULL, NULL, NULL),
(23, 'Narail', 'নড়াইল', '23.172534', '89.512672', 'www.narail.gov.bd', 1, 3, NULL, NULL, NULL),
(24, 'Chuadanga', 'চুয়াডাঙ্গা', '23.6401961', '88.841841', 'www.chuadanga.gov.bd', 1, 3, NULL, NULL, NULL),
(25, 'Kushtia', 'কুষ্টিয়া', '23.901258', '89.120482', 'www.kushtia.gov.bd', 1, 3, NULL, NULL, NULL),
(26, 'Magura', 'মাগুরা', '23.487337', '89.419956', 'www.magura.gov.bd', 1, 3, NULL, NULL, NULL),
(27, 'Khulna', 'খুলনা', '22.815774', '89.568679', 'www.khulna.gov.bd', 1, 3, NULL, NULL, NULL),
(28, 'Bagerhat', 'বাগেরহাট', '22.651568', '89.785938', 'www.bagerhat.gov.bd', 1, 3, NULL, NULL, NULL),
(29, 'Jhenaidah', 'ঝিনাইদহ', '23.5448176', '89.1539213', 'www.jhenaidah.gov.bd', 1, 3, NULL, NULL, NULL),
(30, 'Jhalakathi', 'ঝালকাঠি', NULL, NULL, 'www.jhalakathi.gov.bd', 1, 4, NULL, NULL, NULL),
(31, 'Patuakhali', 'পটুয়াখালী', '22.3596316', '90.3298712', 'www.patuakhali.gov.bd', 1, 4, NULL, NULL, NULL),
(32, 'Pirojpur', 'পিরোজপুর', NULL, NULL, 'www.pirojpur.gov.bd', 1, 4, NULL, NULL, NULL),
(33, 'Barisal', 'বরিশাল', NULL, NULL, 'www.barisal.gov.bd', 1, 4, NULL, NULL, NULL),
(34, 'Bhola', 'ভোলা', '22.685923', '90.648179', 'www.bhola.gov.bd', 1, 4, NULL, NULL, NULL),
(35, 'Barguna', 'বরগুনা', NULL, NULL, 'www.barguna.gov.bd', 1, 4, NULL, NULL, NULL),
(36, 'Sylhet', 'সিলেট', '24.8897956', '91.8697894', 'www.sylhet.gov.bd', 1, 5, NULL, NULL, NULL),
(37, 'Moulvibazar', 'মৌলভীবাজার', '24.482934', '91.777417', 'www.moulvibazar.gov.bd', 1, 5, NULL, NULL, NULL),
(38, 'Habiganj', 'হবিগঞ্জ', '24.374945', '91.41553', 'www.habiganj.gov.bd', 1, 5, NULL, NULL, NULL),
(39, 'Sunamganj', 'সুনামগঞ্জ', '25.0658042', '91.3950115', 'www.sunamganj.gov.bd', 1, 5, NULL, NULL, NULL),
(40, 'Narsingdi', 'নরসিংদী', '23.932233', '90.71541', 'www.narsingdi.gov.bd', 1, 6, NULL, NULL, NULL),
(41, 'Gazipur', 'গাজীপুর', '24.0022858', '90.4264283', 'www.gazipur.gov.bd', 1, 6, NULL, NULL, NULL),
(42, 'Shariatpur', 'শরীয়তপুর', NULL, NULL, 'www.shariatpur.gov.bd', 1, 6, NULL, NULL, NULL),
(43, 'Narayanganj', 'নারায়ণগঞ্জ', '23.63366', '90.496482', 'www.narayanganj.gov.bd', 1, 6, NULL, NULL, NULL),
(44, 'Tangail', 'টাঙ্গাইল', NULL, NULL, 'www.tangail.gov.bd', 1, 6, NULL, NULL, NULL),
(45, 'Kishoreganj', 'কিশোরগঞ্জ', '24.444937', '90.776575', 'www.kishoreganj.gov.bd', 1, 6, NULL, NULL, NULL),
(46, 'Manikganj', 'মানিকগঞ্জ', NULL, NULL, 'www.manikganj.gov.bd', 1, 6, NULL, NULL, NULL),
(47, 'Dhaka', 'ঢাকা', '23.7115253', '90.4111451', 'www.dhaka.gov.bd', 1, 6, NULL, NULL, NULL),
(48, 'Munshiganj', 'মুন্সিগঞ্জ', NULL, NULL, 'www.munshiganj.gov.bd', 1, 6, NULL, NULL, NULL),
(49, 'Rajbari', 'রাজবাড়ী', '23.7574305', '89.6444665', 'www.rajbari.gov.bd', 1, 6, NULL, NULL, NULL),
(50, 'Madaripur', 'মাদারীপুর', '23.164102', '90.1896805', 'www.madaripur.gov.bd', 1, 6, NULL, NULL, NULL),
(51, 'Gopalganj', 'গোপালগঞ্জ', '23.0050857', '89.8266059', 'www.gopalganj.gov.bd', 1, 6, NULL, NULL, NULL),
(52, 'Faridpur', 'ফরিদপুর', '23.6070822', '89.8429406', 'www.faridpur.gov.bd', 1, 6, NULL, NULL, NULL),
(53, 'Panchagarh', 'পঞ্চগড়', '26.3411', '88.5541606', 'www.panchagarh.gov.bd', 1, 7, NULL, NULL, NULL),
(54, 'Dinajpur', 'দিনাজপুর', '25.6217061', '88.6354504', 'www.dinajpur.gov.bd', 1, 7, NULL, NULL, NULL),
(55, 'Lalmonirhat', 'লালমনিরহাট', NULL, NULL, 'www.lalmonirhat.gov.bd', 1, 7, NULL, NULL, NULL),
(56, 'Nilphamari', 'নীলফামারী', '25.931794', '88.856006', 'www.nilphamari.gov.bd', 1, 7, NULL, NULL, NULL),
(57, 'Gaibandha', 'গাইবান্ধা', '25.328751', '89.528088', 'www.gaibandha.gov.bd', 1, 7, NULL, NULL, NULL),
(58, 'Thakurgaon', 'ঠাকুরগাঁও', '26.0336945', '88.4616834', 'www.thakurgaon.gov.bd', 1, 7, NULL, NULL, NULL),
(59, 'Rangpur', 'রংপুর', '25.7558096', '89.244462', 'www.rangpur.gov.bd', 1, 7, NULL, NULL, NULL),
(60, 'Kurigram', 'কুড়িগ্রাম', '25.805445', '89.636174', 'www.kurigram.gov.bd', 1, 7, NULL, NULL, NULL),
(61, 'Sherpur', 'শেরপুর', '25.0204933', '90.0152966', 'www.sherpur.gov.bd', 1, 8, NULL, NULL, NULL),
(62, 'Mymensingh', 'ময়মনসিংহ', NULL, NULL, 'www.mymensingh.gov.bd', 1, 8, NULL, NULL, NULL),
(63, 'Jamalpur', 'জামালপুর', '24.937533', '89.937775', 'www.jamalpur.gov.bd', 1, 8, NULL, NULL, NULL),
(64, 'Netrokona', 'নেত্রকোণা', '24.870955', '90.727887', 'www.netrokona.gov.bd', 1, 8, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bn_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `country_id`, `name`, `bn_name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Chattogram', 'চট্টগ্রাম', 1, NULL, NULL, NULL),
(2, 1, 'Rajshahi', 'রাজশাহী', 1, NULL, NULL, NULL),
(3, 1, 'Khulna', 'খুলনা', 1, NULL, NULL, NULL),
(4, 1, 'Barishal', 'বরিশাল', 1, NULL, NULL, NULL),
(5, 1, 'Sylhet', 'সিলেট', 1, NULL, NULL, NULL),
(6, 1, 'Dhaka', 'ঢাকা', 1, NULL, NULL, NULL),
(7, 1, 'Rangpur', 'রংপুর', 1, NULL, NULL, NULL),
(8, 1, 'Mymensingh', 'ময়মনসিংহ', 1, NULL, NULL, NULL);

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime DEFAULT NULL,
  `order` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `info_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_time` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `info_key`, `info_value`, `date_time`, `created_at`, `updated_at`) VALUES
(1, 'total_affected_bd', '0', NULL, '2022-03-27 06:49:03', '2022-03-27 06:49:03'),
(2, 'total_recover_bd', '0', NULL, '2022-03-27 06:49:04', '2022-03-27 06:49:04'),
(3, 'total_death_bd', '0', NULL, '2022-03-27 06:49:04', '2022-03-27 06:49:04'),
(4, 'total_affected_int', '0', NULL, '2022-03-27 06:49:04', '2022-03-27 06:49:04'),
(5, 'total_recover_int', '0', NULL, '2022-03-27 06:49:04', '2022-03-27 06:49:04'),
(6, 'total_death_int', '0', NULL, '2022-03-27 06:49:04', '2022-03-27 06:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `latests`
--

CREATE TABLE `latests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_id` bigint(20) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(129, '2014_10_12_000000_create_users_table', 1),
(130, '2014_10_12_100000_create_password_resets_table', 1),
(131, '2019_08_19_000000_create_failed_jobs_table', 1),
(132, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(133, '2021_09_06_171487_create_divisions_table', 1),
(134, '2021_09_06_171488_create_districts_table', 1),
(135, '2021_09_06_171499_create_thanas_table', 1),
(136, '2022_03_17_131235_create_news_table', 1),
(137, '2022_03_19_103253_create_news_details_table', 1),
(138, '2022_03_19_115342_create_categories_table', 1),
(139, '2022_03_19_125925_create_keywords_table', 1),
(140, '2022_03_19_135459_create_subcategories_table', 1),
(141, '2022_03_20_145124_create_videos_table', 1),
(142, '2022_03_20_183558_create_images_table', 1),
(143, '2022_03_21_171922_create_votes_table', 1),
(144, '2022_03_21_175615_create_opinions_table', 1),
(145, '2022_03_24_045627_create_information_table', 1),
(146, '2022_03_24_193114_create_latests_table', 1),
(147, '2022_03_25_041608_create_contacts_table', 1),
(148, '2022_03_25_150908_create_regions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `sub_category_id` bigint(20) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_details`
--

CREATE TABLE `news_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_id` bigint(20) UNSIGNED NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticker` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `representative` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opinions`
--

CREATE TABLE `opinions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `order` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_id` bigint(20) UNSIGNED NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upozilla` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thanas`
--

CREATE TABLE `thanas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bn_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thanas`
--

INSERT INTO `thanas` (`id`, `name`, `bn_name`, `url`, `status`, `district_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Debidwar', 'দেবিদ্বার', 'debidwar.comilla.gov.bd', 1, 1, NULL, NULL, NULL),
(2, 'Barura', 'বরুড়া', 'barura.comilla.gov.bd', 1, 1, NULL, NULL, NULL),
(3, 'Brahmanpara', 'ব্রাহ্মণপাড়া', 'brahmanpara.comilla.gov.bd', 1, 1, NULL, NULL, NULL),
(4, 'Chandina', 'চান্দিনা', 'chandina.comilla.gov.bd', 1, 1, NULL, NULL, NULL),
(5, 'Chauddagram', 'চৌদ্দগ্রাম', 'chauddagram.comilla.gov.bd', 1, 1, NULL, NULL, NULL),
(6, 'Daudkandi', 'দাউদকান্দি', 'daudkandi.comilla.gov.bd', 1, 1, NULL, NULL, NULL),
(7, 'Homna', 'হোমনা', 'homna.comilla.gov.bd', 1, 1, NULL, NULL, NULL),
(8, 'Laksam', 'লাকসাম', 'laksam.comilla.gov.bd', 1, 1, NULL, NULL, NULL),
(9, 'Muradnagar', 'মুরাদনগর', 'muradnagar.comilla.gov.bd', 1, 1, NULL, NULL, NULL),
(10, 'Nangalkot', 'নাঙ্গলকোট', 'nangalkot.comilla.gov.bd', 1, 1, NULL, NULL, NULL),
(11, 'Comilla Sadar', 'কুমিল্লা সদর', 'comillasadar.comilla.gov.bd', 1, 1, NULL, NULL, NULL),
(12, 'Meghna', 'মেঘনা', 'meghna.comilla.gov.bd', 1, 1, NULL, NULL, NULL),
(13, 'Monohargonj', 'মনোহরগঞ্জ', 'monohargonj.comilla.gov.bd', 1, 1, NULL, NULL, NULL),
(14, 'Sadarsouth', 'সদর দক্ষিণ', 'sadarsouth.comilla.gov.bd', 1, 1, NULL, NULL, NULL),
(15, 'Titas', 'তিতাস', 'titas.comilla.gov.bd', 1, 1, NULL, NULL, NULL),
(16, 'Burichang', 'বুড়িচং', 'burichang.comilla.gov.bd', 1, 1, NULL, NULL, NULL),
(17, 'Lalmai', 'লালমাই', 'lalmai.comilla.gov.bd', 1, 1, NULL, NULL, NULL),
(18, 'Chhagalnaiya', 'ছাগলনাইয়া', 'chhagalnaiya.feni.gov.bd', 1, 2, NULL, NULL, NULL),
(19, 'Feni Sadar', 'ফেনী সদর', 'sadar.feni.gov.bd', 1, 2, NULL, NULL, NULL),
(20, 'Sonagazi', 'সোনাগাজী', 'sonagazi.feni.gov.bd', 1, 2, NULL, NULL, NULL),
(21, 'Fulgazi', 'ফুলগাজী', 'fulgazi.feni.gov.bd', 1, 2, NULL, NULL, NULL),
(22, 'Parshuram', 'পরশুরাম', 'parshuram.feni.gov.bd', 1, 2, NULL, NULL, NULL),
(23, 'Daganbhuiyan', 'দাগনভূঞা', 'daganbhuiyan.feni.gov.bd', 1, 2, NULL, NULL, NULL),
(24, 'Brahmanbaria Sadar', 'ব্রাহ্মণবাড়িয়া সদর', 'sadar.brahmanbaria.gov.bd', 1, 3, NULL, NULL, NULL),
(25, 'Kasba', 'কসবা', 'kasba.brahmanbaria.gov.bd', 1, 3, NULL, NULL, NULL),
(26, 'Nasirnagar', 'নাসিরনগর', 'nasirnagar.brahmanbaria.gov.bd', 1, 3, NULL, NULL, NULL),
(27, 'Sarail', 'সরাইল', 'sarail.brahmanbaria.gov.bd', 1, 3, NULL, NULL, NULL),
(28, 'Ashuganj', 'আশুগঞ্জ', 'ashuganj.brahmanbaria.gov.bd', 1, 3, NULL, NULL, NULL),
(29, 'Akhaura', 'আখাউড়া', 'akhaura.brahmanbaria.gov.bd', 1, 3, NULL, NULL, NULL),
(30, 'Nabinagar', 'নবীনগর', 'nabinagar.brahmanbaria.gov.bd', 1, 3, NULL, NULL, NULL),
(31, 'Bancharampur', 'বাঞ্ছারামপুর', 'bancharampur.brahmanbaria.gov.bd', 1, 3, NULL, NULL, NULL),
(32, 'Bijoynagar', 'বিজয়নগর', 'bijoynagar.brahmanbaria.gov.bd    ', 1, 3, NULL, NULL, NULL),
(33, 'Rangamati Sadar', 'রাঙ্গামাটি সদর', 'sadar.rangamati.gov.bd', 1, 4, NULL, NULL, NULL),
(34, 'Kaptai', 'কাপ্তাই', 'kaptai.rangamati.gov.bd', 1, 4, NULL, NULL, NULL),
(35, 'Kawkhali', 'কাউখালী', 'kawkhali.rangamati.gov.bd', 1, 4, NULL, NULL, NULL),
(36, 'Baghaichari', 'বাঘাইছড়ি', 'baghaichari.rangamati.gov.bd', 1, 4, NULL, NULL, NULL),
(37, 'Barkal', 'বরকল', 'barkal.rangamati.gov.bd', 1, 4, NULL, NULL, NULL),
(38, 'Langadu', 'লংগদু', 'langadu.rangamati.gov.bd', 1, 4, NULL, NULL, NULL),
(39, 'Rajasthali', 'রাজস্থলী', 'rajasthali.rangamati.gov.bd', 1, 4, NULL, NULL, NULL),
(40, 'Belaichari', 'বিলাইছড়ি', 'belaichari.rangamati.gov.bd', 1, 4, NULL, NULL, NULL),
(41, 'Juraichari', 'জুরাছড়ি', 'juraichari.rangamati.gov.bd', 1, 4, NULL, NULL, NULL),
(42, 'Naniarchar', 'নানিয়ারচর', 'naniarchar.rangamati.gov.bd', 1, 4, NULL, NULL, NULL),
(43, 'Noakhali Sadar', 'নোয়াখালী সদর', 'sadar.noakhali.gov.bd', 1, 5, NULL, NULL, NULL),
(44, 'Companiganj', 'কোম্পানীগঞ্জ', 'companiganj.noakhali.gov.bd', 1, 5, NULL, NULL, NULL),
(45, 'Begumganj', 'বেগমগঞ্জ', 'begumganj.noakhali.gov.bd', 1, 5, NULL, NULL, NULL),
(46, 'Hatia', 'হাতিয়া', 'hatia.noakhali.gov.bd', 1, 5, NULL, NULL, NULL),
(47, 'Subarnachar', 'সুবর্ণচর', 'subarnachar.noakhali.gov.bd', 1, 5, NULL, NULL, NULL),
(48, 'Kabirhat', 'কবিরহাট', 'kabirhat.noakhali.gov.bd', 1, 5, NULL, NULL, NULL),
(49, 'Senbug', 'সেনবাগ', 'senbug.noakhali.gov.bd', 1, 5, NULL, NULL, NULL),
(50, 'Chatkhil', 'চাটখিল', 'chatkhil.noakhali.gov.bd', 1, 5, NULL, NULL, NULL),
(51, 'Sonaimori', 'সোনাইমুড়ী', 'sonaimori.noakhali.gov.bd', 1, 5, NULL, NULL, NULL),
(52, 'Haimchar', 'হাইমচর', 'haimchar.chandpur.gov.bd', 1, 6, NULL, NULL, NULL),
(53, 'Kachua', 'কচুয়া', 'kachua.chandpur.gov.bd', 1, 6, NULL, NULL, NULL),
(54, 'Shahrasti', 'শাহরাস্তি     ', 'shahrasti.chandpur.gov.bd', 1, 6, NULL, NULL, NULL),
(55, 'Chandpur Sadar', 'চাঁদপুর সদর', 'sadar.chandpur.gov.bd', 1, 6, NULL, NULL, NULL),
(56, 'Matlab South', 'মতলব দক্ষিণ', 'matlabsouth.chandpur.gov.bd', 1, 6, NULL, NULL, NULL),
(57, 'Hajiganj', 'হাজীগঞ্জ', 'hajiganj.chandpur.gov.bd', 1, 6, NULL, NULL, NULL),
(58, 'Matlab North', 'মতলব উত্তর', 'matlabnorth.chandpur.gov.bd', 1, 6, NULL, NULL, NULL),
(59, 'Faridgonj', 'ফরিদগঞ্জ', 'faridgonj.chandpur.gov.bd', 1, 6, NULL, NULL, NULL),
(60, 'Lakshmipur Sadar', 'লক্ষ্মীপুর সদর', 'sadar.lakshmipur.gov.bd', 1, 7, NULL, NULL, NULL),
(61, 'Kamalnagar', 'কমলনগর', 'kamalnagar.lakshmipur.gov.bd', 1, 7, NULL, NULL, NULL),
(62, 'Raipur', 'রায়পুর', 'raipur.lakshmipur.gov.bd', 1, 7, NULL, NULL, NULL),
(63, 'Ramgati', 'রামগতি', 'ramgati.lakshmipur.gov.bd', 1, 7, NULL, NULL, NULL),
(64, 'Ramganj', 'রামগঞ্জ', 'ramganj.lakshmipur.gov.bd', 1, 7, NULL, NULL, NULL),
(65, 'Rangunia', 'রাঙ্গুনিয়া', 'rangunia.chittagong.gov.bd', 1, 8, NULL, NULL, NULL),
(66, 'Sitakunda', 'সীতাকুন্ড', 'sitakunda.chittagong.gov.bd', 1, 8, NULL, NULL, NULL),
(67, 'Mirsharai', 'মীরসরাই', 'mirsharai.chittagong.gov.bd', 1, 8, NULL, NULL, NULL),
(68, 'Patiya', 'পটিয়া', 'patiya.chittagong.gov.bd', 1, 8, NULL, NULL, NULL),
(69, 'Sandwip', 'সন্দ্বীপ', 'sandwip.chittagong.gov.bd', 1, 8, NULL, NULL, NULL),
(70, 'Banshkhali', 'বাঁশখালী', 'banshkhali.chittagong.gov.bd', 1, 8, NULL, NULL, NULL),
(71, 'Boalkhali', 'বোয়ালখালী', 'boalkhali.chittagong.gov.bd', 1, 8, NULL, NULL, NULL),
(72, 'Anwara', 'আনোয়ারা', 'anwara.chittagong.gov.bd', 1, 8, NULL, NULL, NULL),
(73, 'Chandanaish', 'চন্দনাইশ', 'chandanaish.chittagong.gov.bd', 1, 8, NULL, NULL, NULL),
(74, 'Satkania', 'সাতকানিয়া', 'satkania.chittagong.gov.bd', 1, 8, NULL, NULL, NULL),
(75, 'Lohagara', 'লোহাগাড়া', 'lohagara.chittagong.gov.bd', 1, 8, NULL, NULL, NULL),
(76, 'Hathazari', 'হাটহাজারী', 'hathazari.chittagong.gov.bd', 1, 8, NULL, NULL, NULL),
(77, 'Fatikchhari', 'ফটিকছড়ি', 'fatikchhari.chittagong.gov.bd', 1, 8, NULL, NULL, NULL),
(78, 'Raozan', 'রাউজান', 'raozan.chittagong.gov.bd', 1, 8, NULL, NULL, NULL),
(79, 'Karnafuli', 'কর্ণফুলী', 'karnafuli.chittagong.gov.bd', 1, 8, NULL, NULL, NULL),
(80, 'Coxsbazar Sadar', 'কক্সবাজার সদর', 'sadar.coxsbazar.gov.bd', 1, 9, NULL, NULL, NULL),
(81, 'Chakaria', 'চকরিয়া', 'chakaria.coxsbazar.gov.bd', 1, 9, NULL, NULL, NULL),
(82, 'Kutubdia', 'কুতুবদিয়া', 'kutubdia.coxsbazar.gov.bd', 1, 9, NULL, NULL, NULL),
(83, 'Ukhiya', 'উখিয়া', 'ukhiya.coxsbazar.gov.bd', 1, 9, NULL, NULL, NULL),
(84, 'Moheshkhali', 'মহেশখালী', 'moheshkhali.coxsbazar.gov.bd', 1, 9, NULL, NULL, NULL),
(85, 'Pekua', 'পেকুয়া', 'pekua.coxsbazar.gov.bd', 1, 9, NULL, NULL, NULL),
(86, 'Ramu', 'রামু', 'ramu.coxsbazar.gov.bd', 1, 9, NULL, NULL, NULL),
(87, 'Teknaf', 'টেকনাফ', 'teknaf.coxsbazar.gov.bd', 1, 9, NULL, NULL, NULL),
(88, 'Khagrachhari Sadar', 'খাগড়াছড়ি সদর', 'sadar.khagrachhari.gov.bd', 1, 10, NULL, NULL, NULL),
(89, 'Dighinala', 'দিঘীনালা', 'dighinala.khagrachhari.gov.bd', 1, 10, NULL, NULL, NULL),
(90, 'Panchari', 'পানছড়ি', 'panchari.khagrachhari.gov.bd', 1, 10, NULL, NULL, NULL),
(91, 'Laxmichhari', 'লক্ষীছড়ি', 'laxmichhari.khagrachhari.gov.bd', 1, 10, NULL, NULL, NULL),
(92, 'Mohalchari', 'মহালছড়ি', 'mohalchari.khagrachhari.gov.bd', 1, 10, NULL, NULL, NULL),
(93, 'Manikchari', 'মানিকছড়ি', 'manikchari.khagrachhari.gov.bd', 1, 10, NULL, NULL, NULL),
(94, 'Ramgarh', 'রামগড়', 'ramgarh.khagrachhari.gov.bd', 1, 10, NULL, NULL, NULL),
(95, 'Matiranga', 'মাটিরাঙ্গা', 'matiranga.khagrachhari.gov.bd', 1, 10, NULL, NULL, NULL),
(96, 'Guimara', 'গুইমারা', 'guimara.khagrachhari.gov.bd', 1, 10, NULL, NULL, NULL),
(97, 'Bandarban Sadar', 'বান্দরবান সদর', 'sadar.bandarban.gov.bd', 1, 11, NULL, NULL, NULL),
(98, 'Alikadam', 'আলীকদম', 'alikadam.bandarban.gov.bd', 1, 11, NULL, NULL, NULL),
(99, 'Naikhongchhari', 'নাইক্ষ্যংছড়ি', 'naikhongchhari.bandarban.gov.bd', 1, 11, NULL, NULL, NULL),
(100, 'Rowangchhari', 'রোয়াংছড়ি', 'rowangchhari.bandarban.gov.bd', 1, 11, NULL, NULL, NULL),
(101, 'Lama', 'লামা', 'lama.bandarban.gov.bd', 1, 11, NULL, NULL, NULL),
(102, 'Ruma', 'রুমা', 'ruma.bandarban.gov.bd', 1, 11, NULL, NULL, NULL),
(103, 'Thanchi', 'থানচি', 'thanchi.bandarban.gov.bd', 1, 11, NULL, NULL, NULL),
(104, 'Belkuchi', 'বেলকুচি', 'belkuchi.sirajganj.gov.bd', 1, 12, NULL, NULL, NULL),
(105, 'Chauhali', 'চৌহালি', 'chauhali.sirajganj.gov.bd', 1, 12, NULL, NULL, NULL),
(106, 'Kamarkhand', 'কামারখন্দ', 'kamarkhand.sirajganj.gov.bd', 1, 12, NULL, NULL, NULL),
(107, 'Kazipur', 'কাজীপুর', 'kazipur.sirajganj.gov.bd', 1, 12, NULL, NULL, NULL),
(108, 'Raigonj', 'রায়গঞ্জ', 'raigonj.sirajganj.gov.bd', 1, 12, NULL, NULL, NULL),
(109, 'Shahjadpur', 'শাহজাদপুর', 'shahjadpur.sirajganj.gov.bd', 1, 12, NULL, NULL, NULL),
(110, 'Sirajganj Sadar', 'সিরাজগঞ্জ সদর', 'sirajganjsadar.sirajganj.gov.bd', 1, 12, NULL, NULL, NULL),
(111, 'Tarash', 'তাড়াশ', 'tarash.sirajganj.gov.bd', 1, 12, NULL, NULL, NULL),
(112, 'Ullapara', 'উল্লাপাড়া', 'ullapara.sirajganj.gov.bd', 1, 12, NULL, NULL, NULL),
(113, 'Sujanagar', 'সুজানগর', 'sujanagar.pabna.gov.bd', 1, 13, NULL, NULL, NULL),
(114, 'Ishurdi', 'ঈশ্বরদী', 'ishurdi.pabna.gov.bd', 1, 13, NULL, NULL, NULL),
(115, 'Bhangura', 'ভাঙ্গুড়া', 'bhangura.pabna.gov.bd', 1, 13, NULL, NULL, NULL),
(116, 'Pabna Sadar', 'পাবনা সদর', 'pabnasadar.pabna.gov.bd', 1, 13, NULL, NULL, NULL),
(117, 'Bera', 'বেড়া', 'bera.pabna.gov.bd', 1, 13, NULL, NULL, NULL),
(118, 'Atghoria', 'আটঘরিয়া', 'atghoria.pabna.gov.bd', 1, 13, NULL, NULL, NULL),
(119, 'Chatmohar', 'চাটমোহর', 'chatmohar.pabna.gov.bd', 1, 13, NULL, NULL, NULL),
(120, 'Santhia', 'সাঁথিয়া', 'santhia.pabna.gov.bd', 1, 13, NULL, NULL, NULL),
(121, 'Faridpur', 'ফরিদপুর', 'faridpur.pabna.gov.bd', 1, 13, NULL, NULL, NULL),
(122, 'Kahaloo', 'কাহালু', 'kahaloo.bogra.gov.bd', 1, 14, NULL, NULL, NULL),
(123, 'Bogra Sadar', 'বগুড়া সদর', 'sadar.bogra.gov.bd', 1, 14, NULL, NULL, NULL),
(124, 'Shariakandi', 'সারিয়াকান্দি', 'shariakandi.bogra.gov.bd', 1, 14, NULL, NULL, NULL),
(125, 'Shajahanpur', 'শাজাহানপুর', 'shajahanpur.bogra.gov.bd', 1, 14, NULL, NULL, NULL),
(126, 'Dupchanchia', 'দুপচাচিঁয়া', 'dupchanchia.bogra.gov.bd', 1, 14, NULL, NULL, NULL),
(127, 'Adamdighi', 'আদমদিঘি', 'adamdighi.bogra.gov.bd', 1, 14, NULL, NULL, NULL),
(128, 'Nondigram', 'নন্দিগ্রাম', 'nondigram.bogra.gov.bd', 1, 14, NULL, NULL, NULL),
(129, 'Sonatala', 'সোনাতলা', 'sonatala.bogra.gov.bd', 1, 14, NULL, NULL, NULL),
(130, 'Dhunot', 'ধুনট', 'dhunot.bogra.gov.bd', 1, 14, NULL, NULL, NULL),
(131, 'Gabtali', 'গাবতলী', 'gabtali.bogra.gov.bd', 1, 14, NULL, NULL, NULL),
(132, 'Sherpur', 'শেরপুর', 'sherpur.bogra.gov.bd', 1, 14, NULL, NULL, NULL),
(133, 'Shibganj', 'শিবগঞ্জ', 'shibganj.bogra.gov.bd', 1, 14, NULL, NULL, NULL),
(134, 'Paba', 'পবা', 'paba.rajshahi.gov.bd', 1, 15, NULL, NULL, NULL),
(135, 'Durgapur', 'দুর্গাপুর', 'durgapur.rajshahi.gov.bd', 1, 15, NULL, NULL, NULL),
(136, 'Mohonpur', 'মোহনপুর', 'mohonpur.rajshahi.gov.bd', 1, 15, NULL, NULL, NULL),
(137, 'Charghat', 'চারঘাট', 'charghat.rajshahi.gov.bd', 1, 15, NULL, NULL, NULL),
(138, 'Puthia', 'পুঠিয়া', 'puthia.rajshahi.gov.bd', 1, 15, NULL, NULL, NULL),
(139, 'Bagha', 'বাঘা', 'bagha.rajshahi.gov.bd', 1, 15, NULL, NULL, NULL),
(140, 'Godagari', 'গোদাগাড়ী', 'godagari.rajshahi.gov.bd', 1, 15, NULL, NULL, NULL),
(141, 'Tanore', 'তানোর', 'tanore.rajshahi.gov.bd', 1, 15, NULL, NULL, NULL),
(142, 'Bagmara', 'বাগমারা', 'bagmara.rajshahi.gov.bd', 1, 15, NULL, NULL, NULL),
(143, 'Natore Sadar', 'নাটোর সদর', 'natoresadar.natore.gov.bd', 1, 16, NULL, NULL, NULL),
(144, 'Singra', 'সিংড়া', 'singra.natore.gov.bd', 1, 16, NULL, NULL, NULL),
(145, 'Baraigram', 'বড়াইগ্রাম', 'baraigram.natore.gov.bd', 1, 16, NULL, NULL, NULL),
(146, 'Bagatipara', 'বাগাতিপাড়া', 'bagatipara.natore.gov.bd', 1, 16, NULL, NULL, NULL),
(147, 'Lalpur', 'লালপুর', 'lalpur.natore.gov.bd', 1, 16, NULL, NULL, NULL),
(148, 'Gurudaspur', 'গুরুদাসপুর', 'gurudaspur.natore.gov.bd', 1, 16, NULL, NULL, NULL),
(149, 'Naldanga', 'নলডাঙ্গা', 'naldanga.natore.gov.bd', 1, 16, NULL, NULL, NULL),
(150, 'Akkelpur', 'আক্কেলপুর', 'akkelpur.joypurhat.gov.bd', 1, 17, NULL, NULL, NULL),
(151, 'Kalai', 'কালাই', 'kalai.joypurhat.gov.bd', 1, 17, NULL, NULL, NULL),
(152, 'Khetlal', 'ক্ষেতলাল', 'khetlal.joypurhat.gov.bd', 1, 17, NULL, NULL, NULL),
(153, 'Panchbibi', 'পাঁচবিবি', 'panchbibi.joypurhat.gov.bd', 1, 17, NULL, NULL, NULL),
(154, 'Joypurhat Sadar', 'জয়পুরহাট সদর', 'joypurhatsadar.joypurhat.gov.bd', 1, 17, NULL, NULL, NULL),
(155, 'Chapainawabganj Sadar', 'চাঁপাইনবাবগঞ্জ সদর', 'chapainawabganjsadar.chapainawabganj.gov.bd', 1, 18, NULL, NULL, NULL),
(156, 'Gomostapur', 'গোমস্তাপুর', 'gomostapur.chapainawabganj.gov.bd', 1, 18, NULL, NULL, NULL),
(157, 'Nachol', 'নাচোল', 'nachol.chapainawabganj.gov.bd', 1, 18, NULL, NULL, NULL),
(158, 'Bholahat', 'ভোলাহাট', 'bholahat.chapainawabganj.gov.bd', 1, 18, NULL, NULL, NULL),
(159, 'Shibganj', 'শিবগঞ্জ', 'shibganj.chapainawabganj.gov.bd', 1, 18, NULL, NULL, NULL),
(160, 'Mohadevpur', 'মহাদেবপুর', 'mohadevpur.naogaon.gov.bd', 1, 19, NULL, NULL, NULL),
(161, 'Badalgachi', 'বদলগাছী', 'badalgachi.naogaon.gov.bd', 1, 19, NULL, NULL, NULL),
(162, 'Patnitala', 'পত্নিতলা', 'patnitala.naogaon.gov.bd', 1, 19, NULL, NULL, NULL),
(163, 'Dhamoirhat', 'ধামইরহাট', 'dhamoirhat.naogaon.gov.bd', 1, 19, NULL, NULL, NULL),
(164, 'Niamatpur', 'নিয়ামতপুর', 'niamatpur.naogaon.gov.bd', 1, 19, NULL, NULL, NULL),
(165, 'Manda', 'মান্দা', 'manda.naogaon.gov.bd', 1, 19, NULL, NULL, NULL),
(166, 'Atrai', 'আত্রাই', 'atrai.naogaon.gov.bd', 1, 19, NULL, NULL, NULL),
(167, 'Raninagar', 'রাণীনগর', 'raninagar.naogaon.gov.bd', 1, 19, NULL, NULL, NULL),
(168, 'Naogaon Sadar', 'নওগাঁ সদর', 'naogaonsadar.naogaon.gov.bd', 1, 19, NULL, NULL, NULL),
(169, 'Porsha', 'পোরশা', 'porsha.naogaon.gov.bd', 1, 19, NULL, NULL, NULL),
(170, 'Sapahar', 'সাপাহার', 'sapahar.naogaon.gov.bd', 1, 19, NULL, NULL, NULL),
(171, 'Manirampur', 'মণিরামপুর', 'manirampur.jessore.gov.bd', 1, 20, NULL, NULL, NULL),
(172, 'Abhaynagar', 'অভয়নগর', 'abhaynagar.jessore.gov.bd', 1, 20, NULL, NULL, NULL),
(173, 'Bagherpara', 'বাঘারপাড়া', 'bagherpara.jessore.gov.bd', 1, 20, NULL, NULL, NULL),
(174, 'Chougachha', 'চৌগাছা', 'chougachha.jessore.gov.bd', 1, 20, NULL, NULL, NULL),
(175, 'Jhikargacha', 'ঝিকরগাছা', 'jhikargacha.jessore.gov.bd', 1, 20, NULL, NULL, NULL),
(176, 'Keshabpur', 'কেশবপুর', 'keshabpur.jessore.gov.bd', 1, 20, NULL, NULL, NULL),
(177, 'Jessore Sadar', 'যশোর সদর', 'sadar.jessore.gov.bd', 1, 20, NULL, NULL, NULL),
(178, 'Sharsha', 'শার্শা', 'sharsha.jessore.gov.bd', 1, 20, NULL, NULL, NULL),
(179, 'Assasuni', 'আশাশুনি', 'assasuni.satkhira.gov.bd', 1, 21, NULL, NULL, NULL),
(180, 'Debhata', 'দেবহাটা', 'debhata.satkhira.gov.bd', 1, 21, NULL, NULL, NULL),
(181, 'Kalaroa', 'কলারোয়া', 'kalaroa.satkhira.gov.bd', 1, 21, NULL, NULL, NULL),
(182, 'Satkhira Sadar', 'সাতক্ষীরা সদর', 'satkhirasadar.satkhira.gov.bd', 1, 21, NULL, NULL, NULL),
(183, 'Shyamnagar', 'শ্যামনগর', 'shyamnagar.satkhira.gov.bd', 1, 21, NULL, NULL, NULL),
(184, 'Tala', 'তালা', 'tala.satkhira.gov.bd', 1, 21, NULL, NULL, NULL),
(185, 'Kaliganj', 'কালিগঞ্জ', 'kaliganj.satkhira.gov.bd', 1, 21, NULL, NULL, NULL),
(186, 'Mujibnagar', 'মুজিবনগর', 'mujibnagar.meherpur.gov.bd', 1, 22, NULL, NULL, NULL),
(187, 'Meherpur Sadar', 'মেহেরপুর সদর', 'meherpursadar.meherpur.gov.bd', 1, 22, NULL, NULL, NULL),
(188, 'Gangni', 'গাংনী', 'gangni.meherpur.gov.bd', 1, 22, NULL, NULL, NULL),
(189, 'Narail Sadar', 'নড়াইল সদর', 'narailsadar.narail.gov.bd', 1, 23, NULL, NULL, NULL),
(190, 'Lohagara', 'লোহাগড়া', 'lohagara.narail.gov.bd', 1, 23, NULL, NULL, NULL),
(191, 'Kalia', 'কালিয়া', 'kalia.narail.gov.bd', 1, 23, NULL, NULL, NULL),
(192, 'Chuadanga Sadar', 'চুয়াডাঙ্গা সদর', 'chuadangasadar.chuadanga.gov.bd', 1, 24, NULL, NULL, NULL),
(193, 'Alamdanga', 'আলমডাঙ্গা', 'alamdanga.chuadanga.gov.bd', 1, 24, NULL, NULL, NULL),
(194, 'Damurhuda', 'দামুড়হুদা', 'damurhuda.chuadanga.gov.bd', 1, 24, NULL, NULL, NULL),
(195, 'Jibannagar', 'জীবননগর', 'jibannagar.chuadanga.gov.bd', 1, 24, NULL, NULL, NULL),
(196, 'Kushtia Sadar', 'কুষ্টিয়া সদর', 'kushtiasadar.kushtia.gov.bd', 1, 25, NULL, NULL, NULL),
(197, 'Kumarkhali', 'কুমারখালী', 'kumarkhali.kushtia.gov.bd', 1, 25, NULL, NULL, NULL),
(198, 'Khoksa', 'খোকসা', 'khoksa.kushtia.gov.bd', 1, 25, NULL, NULL, NULL),
(199, 'Mirpur', 'মিরপুর', 'mirpurkushtia.kushtia.gov.bd', 1, 25, NULL, NULL, NULL),
(200, 'Daulatpur', 'দৌলতপুর', 'daulatpur.kushtia.gov.bd', 1, 25, NULL, NULL, NULL),
(201, 'Bheramara', 'ভেড়ামারা', 'bheramara.kushtia.gov.bd', 1, 25, NULL, NULL, NULL),
(202, 'Shalikha', 'শালিখা', 'shalikha.magura.gov.bd', 1, 26, NULL, NULL, NULL),
(203, 'Sreepur', 'শ্রীপুর', 'sreepur.magura.gov.bd', 1, 26, NULL, NULL, NULL),
(204, 'Magura Sadar', 'মাগুরা সদর', 'magurasadar.magura.gov.bd', 1, 26, NULL, NULL, NULL),
(205, 'Mohammadpur', 'মহম্মদপুর', 'mohammadpur.magura.gov.bd', 1, 26, NULL, NULL, NULL),
(206, 'Paikgasa', 'পাইকগাছা', 'paikgasa.khulna.gov.bd', 1, 27, NULL, NULL, NULL),
(207, 'Fultola', 'ফুলতলা', 'fultola.khulna.gov.bd', 1, 27, NULL, NULL, NULL),
(208, 'Digholia', 'দিঘলিয়া', 'digholia.khulna.gov.bd', 1, 27, NULL, NULL, NULL),
(209, 'Rupsha', 'রূপসা', 'rupsha.khulna.gov.bd', 1, 27, NULL, NULL, NULL),
(210, 'Terokhada', 'তেরখাদা', 'terokhada.khulna.gov.bd', 1, 27, NULL, NULL, NULL),
(211, 'Dumuria', 'ডুমুরিয়া', 'dumuria.khulna.gov.bd', 1, 27, NULL, NULL, NULL),
(212, 'Botiaghata', 'বটিয়াঘাটা', 'botiaghata.khulna.gov.bd', 1, 27, NULL, NULL, NULL),
(213, 'Dakop', 'দাকোপ', 'dakop.khulna.gov.bd', 1, 27, NULL, NULL, NULL),
(214, 'Koyra', 'কয়রা', 'koyra.khulna.gov.bd', 1, 27, NULL, NULL, NULL),
(215, 'Fakirhat', 'ফকিরহাট', 'fakirhat.bagerhat.gov.bd', 1, 28, NULL, NULL, NULL),
(216, 'Bagerhat Sadar', 'বাগেরহাট সদর', 'sadar.bagerhat.gov.bd', 1, 28, NULL, NULL, NULL),
(217, 'Mollahat', 'মোল্লাহাট', 'mollahat.bagerhat.gov.bd', 1, 28, NULL, NULL, NULL),
(218, 'Sarankhola', 'শরণখোলা', 'sarankhola.bagerhat.gov.bd', 1, 28, NULL, NULL, NULL),
(219, 'Rampal', 'রামপাল', 'rampal.bagerhat.gov.bd', 1, 28, NULL, NULL, NULL),
(220, 'Morrelganj', 'মোড়েলগঞ্জ', 'morrelganj.bagerhat.gov.bd', 1, 28, NULL, NULL, NULL),
(221, 'Kachua', 'কচুয়া', 'kachua.bagerhat.gov.bd', 1, 28, NULL, NULL, NULL),
(222, 'Mongla', 'মোংলা', 'mongla.bagerhat.gov.bd', 1, 28, NULL, NULL, NULL),
(223, 'Chitalmari', 'চিতলমারী', 'chitalmari.bagerhat.gov.bd', 1, 28, NULL, NULL, NULL),
(224, 'Jhenaidah Sadar', 'ঝিনাইদহ সদর', 'sadar.jhenaidah.gov.bd', 1, 29, NULL, NULL, NULL),
(225, 'Shailkupa', 'শৈলকুপা', 'shailkupa.jhenaidah.gov.bd', 1, 29, NULL, NULL, NULL),
(226, 'Harinakundu', 'হরিণাকুন্ডু', 'harinakundu.jhenaidah.gov.bd', 1, 29, NULL, NULL, NULL),
(227, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.jhenaidah.gov.bd', 1, 29, NULL, NULL, NULL),
(228, 'Kotchandpur', 'কোটচাঁদপুর', 'kotchandpur.jhenaidah.gov.bd', 1, 29, NULL, NULL, NULL),
(229, 'Moheshpur', 'মহেশপুর', 'moheshpur.jhenaidah.gov.bd', 1, 29, NULL, NULL, NULL),
(230, 'Jhalakathi Sadar', 'ঝালকাঠি সদর', 'sadar.jhalakathi.gov.bd', 1, 30, NULL, NULL, NULL),
(231, 'Kathalia', 'কাঠালিয়া', 'kathalia.jhalakathi.gov.bd', 1, 30, NULL, NULL, NULL),
(232, 'Nalchity', 'নলছিটি', 'nalchity.jhalakathi.gov.bd', 1, 30, NULL, NULL, NULL),
(233, 'Rajapur', 'রাজাপুর', 'rajapur.jhalakathi.gov.bd', 1, 30, NULL, NULL, NULL),
(234, 'Bauphal', 'বাউফল', 'bauphal.patuakhali.gov.bd', 1, 31, NULL, NULL, NULL),
(235, 'Patuakhali Sadar', 'পটুয়াখালী সদর', 'sadar.patuakhali.gov.bd', 1, 31, NULL, NULL, NULL),
(236, 'Dumki', 'দুমকি', 'dumki.patuakhali.gov.bd', 1, 31, NULL, NULL, NULL),
(237, 'Dashmina', 'দশমিনা', 'dashmina.patuakhali.gov.bd', 1, 31, NULL, NULL, NULL),
(238, 'Kalapara', 'কলাপাড়া', 'kalapara.patuakhali.gov.bd', 1, 31, NULL, NULL, NULL),
(239, 'Mirzaganj', 'মির্জাগঞ্জ', 'mirzaganj.patuakhali.gov.bd', 1, 31, NULL, NULL, NULL),
(240, 'Galachipa', 'গলাচিপা', 'galachipa.patuakhali.gov.bd', 1, 31, NULL, NULL, NULL),
(241, 'Rangabali', 'রাঙ্গাবালী', 'rangabali.patuakhali.gov.bd', 1, 31, NULL, NULL, NULL),
(242, 'Pirojpur Sadar', 'পিরোজপুর সদর', 'sadar.pirojpur.gov.bd', 1, 32, NULL, NULL, NULL),
(243, 'Nazirpur', 'নাজিরপুর', 'nazirpur.pirojpur.gov.bd', 1, 32, NULL, NULL, NULL),
(244, 'Kawkhali', 'কাউখালী', 'kawkhali.pirojpur.gov.bd', 1, 32, NULL, NULL, NULL),
(245, 'Zianagar', 'জিয়ানগর', 'zianagar.pirojpur.gov.bd', 1, 32, NULL, NULL, NULL),
(246, 'Bhandaria', 'ভান্ডারিয়া', 'bhandaria.pirojpur.gov.bd', 1, 32, NULL, NULL, NULL),
(247, 'Mathbaria', 'মঠবাড়ীয়া', 'mathbaria.pirojpur.gov.bd', 1, 32, NULL, NULL, NULL),
(248, 'Nesarabad', 'নেছারাবাদ', 'nesarabad.pirojpur.gov.bd', 1, 32, NULL, NULL, NULL),
(249, 'Barisal Sadar', 'বরিশাল সদর', 'barisalsadar.barisal.gov.bd', 1, 33, NULL, NULL, NULL),
(250, 'Bakerganj', 'বাকেরগঞ্জ', 'bakerganj.barisal.gov.bd', 1, 33, NULL, NULL, NULL),
(251, 'Babuganj', 'বাবুগঞ্জ', 'babuganj.barisal.gov.bd', 1, 33, NULL, NULL, NULL),
(252, 'Wazirpur', 'উজিরপুর', 'wazirpur.barisal.gov.bd', 1, 33, NULL, NULL, NULL),
(253, 'Banaripara', 'বানারীপাড়া', 'banaripara.barisal.gov.bd', 1, 33, NULL, NULL, NULL),
(254, 'Gournadi', 'গৌরনদী', 'gournadi.barisal.gov.bd', 1, 33, NULL, NULL, NULL),
(255, 'Agailjhara', 'আগৈলঝাড়া', 'agailjhara.barisal.gov.bd', 1, 33, NULL, NULL, NULL),
(256, 'Mehendiganj', 'মেহেন্দিগঞ্জ', 'mehendiganj.barisal.gov.bd', 1, 33, NULL, NULL, NULL),
(257, 'Muladi', 'মুলাদী', 'muladi.barisal.gov.bd', 1, 33, NULL, NULL, NULL),
(258, 'Hizla', 'হিজলা', 'hizla.barisal.gov.bd', 1, 33, NULL, NULL, NULL),
(259, 'Bhola Sadar', 'ভোলা সদর', 'sadar.bhola.gov.bd', 1, 34, NULL, NULL, NULL),
(260, 'Borhan Sddin', 'বোরহান উদ্দিন', 'borhanuddin.bhola.gov.bd', 1, 34, NULL, NULL, NULL),
(261, 'Charfesson', 'চরফ্যাশন', 'charfesson.bhola.gov.bd', 1, 34, NULL, NULL, NULL),
(262, 'Doulatkhan', 'দৌলতখান', 'doulatkhan.bhola.gov.bd', 1, 34, NULL, NULL, NULL),
(263, 'Monpura', 'মনপুরা', 'monpura.bhola.gov.bd', 1, 34, NULL, NULL, NULL),
(264, 'Tazumuddin', 'তজুমদ্দিন', 'tazumuddin.bhola.gov.bd', 1, 34, NULL, NULL, NULL),
(265, 'Lalmohan', 'লালমোহন', 'lalmohan.bhola.gov.bd', 1, 34, NULL, NULL, NULL),
(266, 'Amtali', 'আমতলী', 'amtali.barguna.gov.bd', 1, 35, NULL, NULL, NULL),
(267, 'Barguna Sadar', 'বরগুনা সদর', 'sadar.barguna.gov.bd', 1, 35, NULL, NULL, NULL),
(268, 'Betagi', 'বেতাগী', 'betagi.barguna.gov.bd', 1, 35, NULL, NULL, NULL),
(269, 'Bamna', 'বামনা', 'bamna.barguna.gov.bd', 1, 35, NULL, NULL, NULL),
(270, 'Pathorghata', 'পাথরঘাটা', 'pathorghata.barguna.gov.bd', 1, 35, NULL, NULL, NULL),
(271, 'Taltali', 'তালতলি', 'taltali.barguna.gov.bd', 1, 35, NULL, NULL, NULL),
(272, 'Balaganj', 'বালাগঞ্জ', 'balaganj.sylhet.gov.bd', 1, 36, NULL, NULL, NULL),
(273, 'Beanibazar', 'বিয়ানীবাজার', 'beanibazar.sylhet.gov.bd', 1, 36, NULL, NULL, NULL),
(274, 'Bishwanath', 'বিশ্বনাথ', 'bishwanath.sylhet.gov.bd', 1, 36, NULL, NULL, NULL),
(275, 'Companiganj', 'কোম্পানীগঞ্জ', 'companiganj.sylhet.gov.bd', 1, 36, NULL, NULL, NULL),
(276, 'Fenchuganj', 'ফেঞ্চুগঞ্জ', 'fenchuganj.sylhet.gov.bd', 1, 36, NULL, NULL, NULL),
(277, 'Golapganj', 'গোলাপগঞ্জ', 'golapganj.sylhet.gov.bd', 1, 36, NULL, NULL, NULL),
(278, 'Gowainghat', 'গোয়াইনঘাট', 'gowainghat.sylhet.gov.bd', 1, 36, NULL, NULL, NULL),
(279, 'Jaintiapur', 'জৈন্তাপুর', 'jaintiapur.sylhet.gov.bd', 1, 36, NULL, NULL, NULL),
(280, 'Kanaighat', 'কানাইঘাট', 'kanaighat.sylhet.gov.bd', 1, 36, NULL, NULL, NULL),
(281, 'Sylhet Sadar', 'সিলেট সদর', 'sylhetsadar.sylhet.gov.bd', 1, 36, NULL, NULL, NULL),
(282, 'Zakiganj', 'জকিগঞ্জ', 'zakiganj.sylhet.gov.bd', 1, 36, NULL, NULL, NULL),
(283, 'Dakshinsurma', 'দক্ষিণ সুরমা', 'dakshinsurma.sylhet.gov.bd', 1, 36, NULL, NULL, NULL),
(284, 'Osmaninagar', 'ওসমানী নগর', 'osmaninagar.sylhet.gov.bd', 1, 36, NULL, NULL, NULL),
(285, 'Barlekha', 'বড়লেখা', 'barlekha.moulvibazar.gov.bd', 1, 37, NULL, NULL, NULL),
(286, 'Kamolganj', 'কমলগঞ্জ', 'kamolganj.moulvibazar.gov.bd', 1, 37, NULL, NULL, NULL),
(287, 'Kulaura', 'কুলাউড়া', 'kulaura.moulvibazar.gov.bd', 1, 37, NULL, NULL, NULL),
(288, 'Moulvibazar Sadar', 'মৌলভীবাজার সদর', 'moulvibazarsadar.moulvibazar.gov.bd', 1, 37, NULL, NULL, NULL),
(289, 'Rajnagar', 'রাজনগর', 'rajnagar.moulvibazar.gov.bd', 1, 37, NULL, NULL, NULL),
(290, 'Sreemangal', 'শ্রীমঙ্গল', 'sreemangal.moulvibazar.gov.bd', 1, 37, NULL, NULL, NULL),
(291, 'Juri', 'জুড়ী', 'juri.moulvibazar.gov.bd', 1, 37, NULL, NULL, NULL),
(292, 'Nabiganj', 'নবীগঞ্জ', 'nabiganj.habiganj.gov.bd', 1, 38, NULL, NULL, NULL),
(293, 'Bahubal', 'বাহুবল', 'bahubal.habiganj.gov.bd', 1, 38, NULL, NULL, NULL),
(294, 'Ajmiriganj', 'আজমিরীগঞ্জ', 'ajmiriganj.habiganj.gov.bd', 1, 38, NULL, NULL, NULL),
(295, 'Baniachong', 'বানিয়াচং', 'baniachong.habiganj.gov.bd', 1, 38, NULL, NULL, NULL),
(296, 'Lakhai', 'লাখাই', 'lakhai.habiganj.gov.bd', 1, 38, NULL, NULL, NULL),
(297, 'Chunarughat', 'চুনারুঘাট', 'chunarughat.habiganj.gov.bd', 1, 38, NULL, NULL, NULL),
(298, 'Habiganj Sadar', 'হবিগঞ্জ সদর', 'habiganjsadar.habiganj.gov.bd', 1, 38, NULL, NULL, NULL),
(299, 'Madhabpur', 'মাধবপুর', 'madhabpur.habiganj.gov.bd', 1, 38, NULL, NULL, NULL),
(300, 'Sunamganj Sadar', 'সুনামগঞ্জ সদর', 'sadar.sunamganj.gov.bd', 1, 39, NULL, NULL, NULL),
(301, 'South Sunamganj', 'দক্ষিণ সুনামগঞ্জ', 'southsunamganj.sunamganj.gov.bd', 1, 39, NULL, NULL, NULL),
(302, 'Bishwambarpur', 'বিশ্বম্ভরপুর', 'bishwambarpur.sunamganj.gov.bd', 1, 39, NULL, NULL, NULL),
(303, 'Chhatak', 'ছাতক', 'chhatak.sunamganj.gov.bd', 1, 39, NULL, NULL, NULL),
(304, 'Jagannathpur', 'জগন্নাথপুর', 'jagannathpur.sunamganj.gov.bd', 1, 39, NULL, NULL, NULL),
(305, 'Dowarabazar', 'দোয়ারাবাজার', 'dowarabazar.sunamganj.gov.bd', 1, 39, NULL, NULL, NULL),
(306, 'Tahirpur', 'তাহিরপুর', 'tahirpur.sunamganj.gov.bd', 1, 39, NULL, NULL, NULL),
(307, 'Dharmapasha', 'ধর্মপাশা', 'dharmapasha.sunamganj.gov.bd', 1, 39, NULL, NULL, NULL),
(308, 'Jamalganj', 'জামালগঞ্জ', 'jamalganj.sunamganj.gov.bd', 1, 39, NULL, NULL, NULL),
(309, 'Shalla', 'শাল্লা', 'shalla.sunamganj.gov.bd', 1, 39, NULL, NULL, NULL),
(310, 'Derai', 'দিরাই', 'derai.sunamganj.gov.bd', 1, 39, NULL, NULL, NULL),
(311, 'Belabo', 'বেলাবো', 'belabo.narsingdi.gov.bd', 1, 40, NULL, NULL, NULL),
(312, 'Monohardi', 'মনোহরদী', 'monohardi.narsingdi.gov.bd', 1, 40, NULL, NULL, NULL),
(313, 'Narsingdi Sadar', 'নরসিংদী সদর', 'narsingdisadar.narsingdi.gov.bd', 1, 40, NULL, NULL, NULL),
(314, 'Palash', 'পলাশ', 'palash.narsingdi.gov.bd', 1, 40, NULL, NULL, NULL),
(315, 'Raipura', 'রায়পুরা', 'raipura.narsingdi.gov.bd', 1, 40, NULL, NULL, NULL),
(316, 'Shibpur', 'শিবপুর', 'shibpur.narsingdi.gov.bd', 1, 40, NULL, NULL, NULL),
(317, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.gazipur.gov.bd', 1, 41, NULL, NULL, NULL),
(318, 'Kaliakair', 'কালিয়াকৈর', 'kaliakair.gazipur.gov.bd', 1, 41, NULL, NULL, NULL),
(319, 'Kapasia', 'কাপাসিয়া', 'kapasia.gazipur.gov.bd', 1, 41, NULL, NULL, NULL),
(320, 'Gazipur Sadar', 'গাজীপুর সদর', 'sadar.gazipur.gov.bd', 1, 41, NULL, NULL, NULL),
(321, 'Sreepur', 'শ্রীপুর', 'sreepur.gazipur.gov.bd', 1, 41, NULL, NULL, NULL),
(322, 'Shariatpur Sadar', 'শরিয়তপুর সদর', 'sadar.shariatpur.gov.bd', 1, 42, NULL, NULL, NULL),
(323, 'Naria', 'নড়িয়া', 'naria.shariatpur.gov.bd', 1, 42, NULL, NULL, NULL),
(324, 'Zajira', 'জাজিরা', 'zajira.shariatpur.gov.bd', 1, 42, NULL, NULL, NULL),
(325, 'Gosairhat', 'গোসাইরহাট', 'gosairhat.shariatpur.gov.bd', 1, 42, NULL, NULL, NULL),
(326, 'Bhedarganj', 'ভেদরগঞ্জ', 'bhedarganj.shariatpur.gov.bd', 1, 42, NULL, NULL, NULL),
(327, 'Damudya', 'ডামুড্যা', 'damudya.shariatpur.gov.bd', 1, 42, NULL, NULL, NULL),
(328, 'Araihazar', 'আড়াইহাজার', 'araihazar.narayanganj.gov.bd', 1, 43, NULL, NULL, NULL),
(329, 'Bandar', 'বন্দর', 'bandar.narayanganj.gov.bd', 1, 43, NULL, NULL, NULL),
(330, 'Narayanganj Sadar', 'নারায়নগঞ্জ সদর', 'narayanganjsadar.narayanganj.gov.bd', 1, 43, NULL, NULL, NULL),
(331, 'Rupganj', 'রূপগঞ্জ', 'rupganj.narayanganj.gov.bd', 1, 43, NULL, NULL, NULL),
(332, 'Sonargaon', 'সোনারগাঁ', 'sonargaon.narayanganj.gov.bd', 1, 43, NULL, NULL, NULL),
(333, 'Basail', 'বাসাইল', 'basail.tangail.gov.bd', 1, 44, NULL, NULL, NULL),
(334, 'Bhuapur', 'ভুয়াপুর', 'bhuapur.tangail.gov.bd', 1, 44, NULL, NULL, NULL),
(335, 'Delduar', 'দেলদুয়ার', 'delduar.tangail.gov.bd', 1, 44, NULL, NULL, NULL),
(336, 'Ghatail', 'ঘাটাইল', 'ghatail.tangail.gov.bd', 1, 44, NULL, NULL, NULL),
(337, 'Gopalpur', 'গোপালপুর', 'gopalpur.tangail.gov.bd', 1, 44, NULL, NULL, NULL),
(338, 'Madhupur', 'মধুপুর', 'madhupur.tangail.gov.bd', 1, 44, NULL, NULL, NULL),
(339, 'Mirzapur', 'মির্জাপুর', 'mirzapur.tangail.gov.bd', 1, 44, NULL, NULL, NULL),
(340, 'Nagarpur', 'নাগরপুর', 'nagarpur.tangail.gov.bd', 1, 44, NULL, NULL, NULL),
(341, 'Sakhipur', 'সখিপুর', 'sakhipur.tangail.gov.bd', 1, 44, NULL, NULL, NULL),
(342, 'Tangail Sadar', 'টাঙ্গাইল সদর', 'tangailsadar.tangail.gov.bd', 1, 44, NULL, NULL, NULL),
(343, 'Kalihati', 'কালিহাতী', 'kalihati.tangail.gov.bd', 1, 44, NULL, NULL, NULL),
(344, 'Dhanbari', 'ধনবাড়ী', 'dhanbari.tangail.gov.bd', 1, 44, NULL, NULL, NULL),
(345, 'Itna', 'ইটনা', 'itna.kishoreganj.gov.bd', 1, 45, NULL, NULL, NULL),
(346, 'Katiadi', 'কটিয়াদী', 'katiadi.kishoreganj.gov.bd', 1, 45, NULL, NULL, NULL),
(347, 'Bhairab', 'ভৈরব', 'bhairab.kishoreganj.gov.bd', 1, 45, NULL, NULL, NULL),
(348, 'Tarail', 'তাড়াইল', 'tarail.kishoreganj.gov.bd', 1, 45, NULL, NULL, NULL),
(349, 'Hossainpur', 'হোসেনপুর', 'hossainpur.kishoreganj.gov.bd', 1, 45, NULL, NULL, NULL),
(350, 'Pakundia', 'পাকুন্দিয়া', 'pakundia.kishoreganj.gov.bd', 1, 45, NULL, NULL, NULL),
(351, 'Kuliarchar', 'কুলিয়ারচর', 'kuliarchar.kishoreganj.gov.bd', 1, 45, NULL, NULL, NULL),
(352, 'Kishoreganj Sadar', 'কিশোরগঞ্জ সদর', 'kishoreganjsadar.kishoreganj.gov.bd', 1, 45, NULL, NULL, NULL),
(353, 'Karimgonj', 'করিমগঞ্জ', 'karimgonj.kishoreganj.gov.bd', 1, 45, NULL, NULL, NULL),
(354, 'Bajitpur', 'বাজিতপুর', 'bajitpur.kishoreganj.gov.bd', 1, 45, NULL, NULL, NULL),
(355, 'Austagram', 'অষ্টগ্রাম', 'austagram.kishoreganj.gov.bd', 1, 45, NULL, NULL, NULL),
(356, 'Mithamoin', 'মিঠামইন', 'mithamoin.kishoreganj.gov.bd', 1, 45, NULL, NULL, NULL),
(357, 'Nikli', 'নিকলী', 'nikli.kishoreganj.gov.bd', 1, 45, NULL, NULL, NULL),
(358, 'Harirampur', 'হরিরামপুর', 'harirampur.manikganj.gov.bd', 1, 46, NULL, NULL, NULL),
(359, 'Saturia', 'সাটুরিয়া', 'saturia.manikganj.gov.bd', 1, 46, NULL, NULL, NULL),
(360, 'Manikganj Sadar', 'মানিকগঞ্জ সদর', 'sadar.manikganj.gov.bd', 1, 46, NULL, NULL, NULL),
(361, 'Gior', 'ঘিওর', 'gior.manikganj.gov.bd', 1, 46, NULL, NULL, NULL),
(362, 'Shibaloy', 'শিবালয়', 'shibaloy.manikganj.gov.bd', 1, 46, NULL, NULL, NULL),
(363, 'Doulatpur', 'দৌলতপুর', 'doulatpur.manikganj.gov.bd', 1, 46, NULL, NULL, NULL),
(364, 'Singiar', 'সিংগাইর', 'singiar.manikganj.gov.bd', 1, 46, NULL, NULL, NULL),
(365, 'Savar', 'সাভার', 'savar.dhaka.gov.bd', 1, 47, NULL, NULL, NULL),
(366, 'Dhamrai', 'ধামরাই', 'dhamrai.dhaka.gov.bd', 1, 47, NULL, NULL, NULL),
(367, 'Keraniganj', 'কেরাণীগঞ্জ', 'keraniganj.dhaka.gov.bd', 1, 47, NULL, NULL, NULL),
(368, 'Nawabganj', 'নবাবগঞ্জ', 'nawabganj.dhaka.gov.bd', 1, 47, NULL, NULL, NULL),
(369, 'Dohar', 'দোহার', 'dohar.dhaka.gov.bd', 1, 47, NULL, NULL, NULL),
(370, 'Munshiganj Sadar', 'মুন্সিগঞ্জ সদর', 'sadar.munshiganj.gov.bd', 1, 48, NULL, NULL, NULL),
(371, 'Sreenagar', 'শ্রীনগর', 'sreenagar.munshiganj.gov.bd', 1, 48, NULL, NULL, NULL),
(372, 'Sirajdikhan', 'সিরাজদিখান', 'sirajdikhan.munshiganj.gov.bd', 1, 48, NULL, NULL, NULL),
(373, 'Louhajanj', 'লৌহজং', 'louhajanj.munshiganj.gov.bd', 1, 48, NULL, NULL, NULL),
(374, 'Gajaria', 'গজারিয়া', 'gajaria.munshiganj.gov.bd', 1, 48, NULL, NULL, NULL),
(375, 'Tongibari', 'টংগীবাড়ি', 'tongibari.munshiganj.gov.bd', 1, 48, NULL, NULL, NULL),
(376, 'Rajbari Sadar', 'রাজবাড়ী সদর', 'sadar.rajbari.gov.bd', 1, 49, NULL, NULL, NULL),
(377, 'Goalanda', 'গোয়ালন্দ', 'goalanda.rajbari.gov.bd', 1, 49, NULL, NULL, NULL),
(378, 'Pangsa', 'পাংশা', 'pangsa.rajbari.gov.bd', 1, 49, NULL, NULL, NULL),
(379, 'Baliakandi', 'বালিয়াকান্দি', 'baliakandi.rajbari.gov.bd', 1, 49, NULL, NULL, NULL),
(380, 'Kalukhali', 'কালুখালী', 'kalukhali.rajbari.gov.bd', 1, 49, NULL, NULL, NULL),
(381, 'Madaripur Sadar', 'মাদারীপুর সদর', 'sadar.madaripur.gov.bd', 1, 50, NULL, NULL, NULL),
(382, 'Shibchar', 'শিবচর', 'shibchar.madaripur.gov.bd', 1, 50, NULL, NULL, NULL),
(383, 'Kalkini', 'কালকিনি', 'kalkini.madaripur.gov.bd', 1, 50, NULL, NULL, NULL),
(384, 'Rajoir', 'রাজৈর', 'rajoir.madaripur.gov.bd', 1, 50, NULL, NULL, NULL),
(385, 'Gopalganj Sadar', 'গোপালগঞ্জ সদর', 'sadar.gopalganj.gov.bd', 1, 51, NULL, NULL, NULL),
(386, 'Kashiani', 'কাশিয়ানী', 'kashiani.gopalganj.gov.bd', 1, 51, NULL, NULL, NULL),
(387, 'Tungipara', 'টুংগীপাড়া', 'tungipara.gopalganj.gov.bd', 1, 51, NULL, NULL, NULL),
(388, 'Kotalipara', 'কোটালীপাড়া', 'kotalipara.gopalganj.gov.bd', 1, 51, NULL, NULL, NULL),
(389, 'Muksudpur', 'মুকসুদপুর', 'muksudpur.gopalganj.gov.bd', 1, 51, NULL, NULL, NULL),
(390, 'Faridpur Sadar', 'ফরিদপুর সদর', 'sadar.faridpur.gov.bd', 1, 52, NULL, NULL, NULL),
(391, 'Alfadanga', 'আলফাডাঙ্গা', 'alfadanga.faridpur.gov.bd', 1, 52, NULL, NULL, NULL),
(392, 'Boalmari', 'বোয়ালমারী', 'boalmari.faridpur.gov.bd', 1, 52, NULL, NULL, NULL),
(393, 'Sadarpur', 'সদরপুর', 'sadarpur.faridpur.gov.bd', 1, 52, NULL, NULL, NULL),
(394, 'Nagarkanda', 'নগরকান্দা', 'nagarkanda.faridpur.gov.bd', 1, 52, NULL, NULL, NULL),
(395, 'Bhanga', 'ভাঙ্গা', 'bhanga.faridpur.gov.bd', 1, 52, NULL, NULL, NULL),
(396, 'Charbhadrasan', 'চরভদ্রাসন', 'charbhadrasan.faridpur.gov.bd', 1, 52, NULL, NULL, NULL),
(397, 'Madhukhali', 'মধুখালী', 'madhukhali.faridpur.gov.bd', 1, 52, NULL, NULL, NULL),
(398, 'Saltha', 'সালথা', 'saltha.faridpur.gov.bd', 1, 52, NULL, NULL, NULL),
(399, 'Panchagarh Sadar', 'পঞ্চগড় সদর', 'panchagarhsadar.panchagarh.gov.bd', 1, 53, NULL, NULL, NULL),
(400, 'Debiganj', 'দেবীগঞ্জ', 'debiganj.panchagarh.gov.bd', 1, 53, NULL, NULL, NULL),
(401, 'Boda', 'বোদা', 'boda.panchagarh.gov.bd', 1, 53, NULL, NULL, NULL),
(402, 'Atwari', 'আটোয়ারী', 'atwari.panchagarh.gov.bd', 1, 53, NULL, NULL, NULL),
(403, 'Tetulia', 'তেতুলিয়া', 'tetulia.panchagarh.gov.bd', 1, 53, NULL, NULL, NULL),
(404, 'Nawabganj', 'নবাবগঞ্জ', 'nawabganj.dinajpur.gov.bd', 1, 54, NULL, NULL, NULL),
(405, 'Birganj', 'বীরগঞ্জ', 'birganj.dinajpur.gov.bd', 1, 54, NULL, NULL, NULL),
(406, 'Ghoraghat', 'ঘোড়াঘাট', 'ghoraghat.dinajpur.gov.bd', 1, 54, NULL, NULL, NULL),
(407, 'Birampur', 'বিরামপুর', 'birampur.dinajpur.gov.bd', 1, 54, NULL, NULL, NULL),
(408, 'Parbatipur', 'পার্বতীপুর', 'parbatipur.dinajpur.gov.bd', 1, 54, NULL, NULL, NULL),
(409, 'Bochaganj', 'বোচাগঞ্জ', 'bochaganj.dinajpur.gov.bd', 1, 54, NULL, NULL, NULL),
(410, 'Kaharol', 'কাহারোল', 'kaharol.dinajpur.gov.bd', 1, 54, NULL, NULL, NULL),
(411, 'Fulbari', 'ফুলবাড়ী', 'fulbari.dinajpur.gov.bd', 1, 54, NULL, NULL, NULL),
(412, 'Dinajpur Sadar', 'দিনাজপুর সদর', 'dinajpursadar.dinajpur.gov.bd', 1, 54, NULL, NULL, NULL),
(413, 'Hakimpur', 'হাকিমপুর', 'hakimpur.dinajpur.gov.bd', 1, 54, NULL, NULL, NULL),
(414, 'Khansama', 'খানসামা', 'khansama.dinajpur.gov.bd', 1, 54, NULL, NULL, NULL),
(415, 'Birol', 'বিরল', 'birol.dinajpur.gov.bd', 1, 54, NULL, NULL, NULL),
(416, 'Chirirbandar', 'চিরিরবন্দর', 'chirirbandar.dinajpur.gov.bd', 1, 54, NULL, NULL, NULL),
(417, 'Lalmonirhat Sadar', 'লালমনিরহাট সদর', 'sadar.lalmonirhat.gov.bd', 1, 55, NULL, NULL, NULL),
(418, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.lalmonirhat.gov.bd', 1, 55, NULL, NULL, NULL),
(419, 'Hatibandha', 'হাতীবান্ধা', 'hatibandha.lalmonirhat.gov.bd', 1, 55, NULL, NULL, NULL),
(420, 'Patgram', 'পাটগ্রাম', 'patgram.lalmonirhat.gov.bd', 1, 55, NULL, NULL, NULL),
(421, 'Aditmari', 'আদিতমারী', 'aditmari.lalmonirhat.gov.bd', 1, 55, NULL, NULL, NULL),
(422, 'Syedpur', 'সৈয়দপুর', 'syedpur.nilphamari.gov.bd', 1, 56, NULL, NULL, NULL),
(423, 'Domar', 'ডোমার', 'domar.nilphamari.gov.bd', 1, 56, NULL, NULL, NULL),
(424, 'Dimla', 'ডিমলা', 'dimla.nilphamari.gov.bd', 1, 56, NULL, NULL, NULL),
(425, 'Jaldhaka', 'জলঢাকা', 'jaldhaka.nilphamari.gov.bd', 1, 56, NULL, NULL, NULL),
(426, 'Kishorganj', 'কিশোরগঞ্জ', 'kishorganj.nilphamari.gov.bd', 1, 56, NULL, NULL, NULL),
(427, 'Nilphamari Sadar', 'নীলফামারী সদর', 'nilphamarisadar.nilphamari.gov.bd', 1, 56, NULL, NULL, NULL),
(428, 'Sadullapur', 'সাদুল্লাপুর', 'sadullapur.gaibandha.gov.bd', 1, 57, NULL, NULL, NULL),
(429, 'Gaibandha Sadar', 'গাইবান্ধা সদর', 'gaibandhasadar.gaibandha.gov.bd', 1, 57, NULL, NULL, NULL),
(430, 'Palashbari', 'পলাশবাড়ী', 'palashbari.gaibandha.gov.bd', 1, 57, NULL, NULL, NULL),
(431, 'Saghata', 'সাঘাটা', 'saghata.gaibandha.gov.bd', 1, 57, NULL, NULL, NULL),
(432, 'Gobindaganj', 'গোবিন্দগঞ্জ', 'gobindaganj.gaibandha.gov.bd', 1, 57, NULL, NULL, NULL),
(433, 'Sundarganj', 'সুন্দরগঞ্জ', 'sundarganj.gaibandha.gov.bd', 1, 57, NULL, NULL, NULL),
(434, 'Phulchari', 'ফুলছড়ি', 'phulchari.gaibandha.gov.bd', 1, 57, NULL, NULL, NULL),
(435, 'Thakurgaon Sadar', 'ঠাকুরগাঁও সদর', 'thakurgaonsadar.thakurgaon.gov.bd', 1, 58, NULL, NULL, NULL),
(436, 'Pirganj', 'পীরগঞ্জ', 'pirganj.thakurgaon.gov.bd', 1, 58, NULL, NULL, NULL),
(437, 'Ranisankail', 'রাণীশংকৈল', 'ranisankail.thakurgaon.gov.bd', 1, 58, NULL, NULL, NULL),
(438, 'Haripur', 'হরিপুর', 'haripur.thakurgaon.gov.bd', 1, 58, NULL, NULL, NULL),
(439, 'Baliadangi', 'বালিয়াডাঙ্গী', 'baliadangi.thakurgaon.gov.bd', 1, 58, NULL, NULL, NULL),
(440, 'Rangpur Sadar', 'রংপুর সদর', 'rangpursadar.rangpur.gov.bd', 1, 59, NULL, NULL, NULL),
(441, 'Gangachara', 'গংগাচড়া', 'gangachara.rangpur.gov.bd', 1, 59, NULL, NULL, NULL),
(442, 'Taragonj', 'তারাগঞ্জ', 'taragonj.rangpur.gov.bd', 1, 59, NULL, NULL, NULL),
(443, 'Badargonj', 'বদরগঞ্জ', 'badargonj.rangpur.gov.bd', 1, 59, NULL, NULL, NULL),
(444, 'Mithapukur', 'মিঠাপুকুর', 'mithapukur.rangpur.gov.bd', 1, 59, NULL, NULL, NULL),
(445, 'Pirgonj', 'পীরগঞ্জ', 'pirgonj.rangpur.gov.bd', 1, 59, NULL, NULL, NULL),
(446, 'Kaunia', 'কাউনিয়া', 'kaunia.rangpur.gov.bd', 1, 59, NULL, NULL, NULL),
(447, 'Pirgacha', 'পীরগাছা', 'pirgacha.rangpur.gov.bd', 1, 59, NULL, NULL, NULL),
(448, 'Kurigram Sadar', 'কুড়িগ্রাম সদর', 'kurigramsadar.kurigram.gov.bd', 1, 60, NULL, NULL, NULL),
(449, 'Nageshwari', 'নাগেশ্বরী', 'nageshwari.kurigram.gov.bd', 1, 60, NULL, NULL, NULL),
(450, 'Bhurungamari', 'ভুরুঙ্গামারী', 'bhurungamari.kurigram.gov.bd', 1, 60, NULL, NULL, NULL),
(451, 'Phulbari', 'ফুলবাড়ী', 'phulbari.kurigram.gov.bd', 1, 60, NULL, NULL, NULL),
(452, 'Rajarhat', 'রাজারহাট', 'rajarhat.kurigram.gov.bd', 1, 60, NULL, NULL, NULL),
(453, 'Ulipur', 'উলিপুর', 'ulipur.kurigram.gov.bd', 1, 60, NULL, NULL, NULL),
(454, 'Chilmari', 'চিলমারী', 'chilmari.kurigram.gov.bd', 1, 60, NULL, NULL, NULL),
(455, 'Rowmari', 'রৌমারী', 'rowmari.kurigram.gov.bd', 1, 60, NULL, NULL, NULL),
(456, 'Charrajibpur', 'চর রাজিবপুর', 'charrajibpur.kurigram.gov.bd', 1, 60, NULL, NULL, NULL),
(457, 'Sherpur Sadar', 'শেরপুর সদর', 'sherpursadar.sherpur.gov.bd', 1, 61, NULL, NULL, NULL),
(458, 'Nalitabari', 'নালিতাবাড়ী', 'nalitabari.sherpur.gov.bd', 1, 61, NULL, NULL, NULL),
(459, 'Sreebordi', 'শ্রীবরদী', 'sreebordi.sherpur.gov.bd', 1, 61, NULL, NULL, NULL),
(460, 'Nokla', 'নকলা', 'nokla.sherpur.gov.bd', 1, 61, NULL, NULL, NULL),
(461, 'Jhenaigati', 'ঝিনাইগাতী', 'jhenaigati.sherpur.gov.bd', 1, 61, NULL, NULL, NULL),
(462, 'Fulbaria', 'ফুলবাড়ীয়া', 'fulbaria.mymensingh.gov.bd', 1, 62, NULL, NULL, NULL),
(463, 'Trishal', 'ত্রিশাল', 'trishal.mymensingh.gov.bd', 1, 62, NULL, NULL, NULL),
(464, 'Bhaluka', 'ভালুকা', 'bhaluka.mymensingh.gov.bd', 1, 62, NULL, NULL, NULL),
(465, 'Muktagacha', 'মুক্তাগাছা', 'muktagacha.mymensingh.gov.bd', 1, 62, NULL, NULL, NULL),
(466, 'Mymensingh Sadar', 'ময়মনসিংহ সদর', 'mymensinghsadar.mymensingh.gov.bd', 1, 62, NULL, NULL, NULL),
(467, 'Dhobaura', 'ধোবাউড়া', 'dhobaura.mymensingh.gov.bd', 1, 62, NULL, NULL, NULL),
(468, 'Phulpur', 'ফুলপুর', 'phulpur.mymensingh.gov.bd', 1, 62, NULL, NULL, NULL),
(469, 'Haluaghat', 'হালুয়াঘাট', 'haluaghat.mymensingh.gov.bd', 1, 62, NULL, NULL, NULL),
(470, 'Gouripur', 'গৌরীপুর', 'gouripur.mymensingh.gov.bd', 1, 62, NULL, NULL, NULL),
(471, 'Gafargaon', 'গফরগাঁও', 'gafargaon.mymensingh.gov.bd', 1, 62, NULL, NULL, NULL),
(472, 'Iswarganj', 'ঈশ্বরগঞ্জ', 'iswarganj.mymensingh.gov.bd', 1, 62, NULL, NULL, NULL),
(473, 'Nandail', 'নান্দাইল', 'nandail.mymensingh.gov.bd', 1, 62, NULL, NULL, NULL),
(474, 'Tarakanda', 'তারাকান্দা', 'tarakanda.mymensingh.gov.bd', 1, 62, NULL, NULL, NULL),
(475, 'Jamalpur Sadar', 'জামালপুর সদর', 'jamalpursadar.jamalpur.gov.bd', 1, 63, NULL, NULL, NULL),
(476, 'Melandah', 'মেলান্দহ', 'melandah.jamalpur.gov.bd', 1, 63, NULL, NULL, NULL),
(477, 'Islampur', 'ইসলামপুর', 'islampur.jamalpur.gov.bd', 1, 63, NULL, NULL, NULL),
(478, 'Dewangonj', 'দেওয়ানগঞ্জ', 'dewangonj.jamalpur.gov.bd', 1, 63, NULL, NULL, NULL),
(479, 'Sarishabari', 'সরিষাবাড়ী', 'sarishabari.jamalpur.gov.bd', 1, 63, NULL, NULL, NULL),
(480, 'Madarganj', 'মাদারগঞ্জ', 'madarganj.jamalpur.gov.bd', 1, 63, NULL, NULL, NULL),
(481, 'Bokshiganj', 'বকশীগঞ্জ', 'bokshiganj.jamalpur.gov.bd', 1, 63, NULL, NULL, NULL),
(482, 'Barhatta', 'বারহাট্টা', 'barhatta.netrokona.gov.bd', 1, 64, NULL, NULL, NULL),
(483, 'Durgapur', 'দুর্গাপুর', 'durgapur.netrokona.gov.bd', 1, 64, NULL, NULL, NULL),
(484, 'Kendua', 'কেন্দুয়া', 'kendua.netrokona.gov.bd', 1, 64, NULL, NULL, NULL),
(485, 'Atpara', 'আটপাড়া', 'atpara.netrokona.gov.bd', 1, 64, NULL, NULL, NULL),
(486, 'Madan', 'মদন', 'madan.netrokona.gov.bd', 1, 64, NULL, NULL, NULL),
(487, 'Khaliajuri', 'খালিয়াজুরী', 'khaliajuri.netrokona.gov.bd', 1, 64, NULL, NULL, NULL),
(488, 'Kalmakanda', 'কলমাকান্দা', 'kalmakanda.netrokona.gov.bd', 1, 64, NULL, NULL, NULL),
(489, 'Mohongonj', 'মোহনগঞ্জ', 'mohongonj.netrokona.gov.bd', 1, 64, NULL, NULL, NULL),
(490, 'Purbadhala', 'পূর্বধলা', 'purbadhala.netrokona.gov.bd', 1, 64, NULL, NULL, NULL),
(491, 'Netrokona Sadar', 'নেত্রকোণা সদর', 'netrokonasadar.netrokona.gov.bd', 1, 64, NULL, NULL, NULL);

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
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$9p6TNjDBKnntvJ8Q/I9jiegIcAV9qMSoWFCgZATugLnp1O2xgJ5Nu', NULL, '2022-03-27 06:49:06', '2022-03-27 06:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL,
  `order` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `yes` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `no_comments` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_division_id_foreign` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `divisions_name_unique` (`name`),
  ADD UNIQUE KEY `divisions_bn_name_unique` (`bn_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `latests`
--
ALTER TABLE `latests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `latests_news_id_foreign` (`news_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_details`
--
ALTER TABLE `news_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_details_news_id_foreign` (`news_id`);

--
-- Indexes for table `opinions`
--
ALTER TABLE `opinions`
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
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regions_news_id_foreign` (`news_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `thanas`
--
ALTER TABLE `thanas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thanas_district_id_foreign` (`district_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `latests`
--
ALTER TABLE `latests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news_details`
--
ALTER TABLE `news_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `opinions`
--
ALTER TABLE `opinions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thanas`
--
ALTER TABLE `thanas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=492;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `latests`
--
ALTER TABLE `latests`
  ADD CONSTRAINT `latests_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news_details`
--
ALTER TABLE `news_details`
  ADD CONSTRAINT `news_details_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `regions_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `thanas`
--
ALTER TABLE `thanas`
  ADD CONSTRAINT `thanas_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
