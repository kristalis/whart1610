-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2017 at 11:58 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `whart`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `chefname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chefimage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chefdesc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `chefname`, `chefimage`, `chefdesc`, `created_at`, `updated_at`) VALUES
(4, 'Brothers Tom & James Bainbridge, owners of Bain & Bridges', 'white-hart-head-chef-temp2.jpg', 'Tom & James Bainbridge took over the White Hart in 2016 as their second venue following a successful two years of running The Tilbury in Datchworth. James has a long background in hospitality having worked in many pubs, restaurants & hotels including the role within the management team at Heston Blumenthal’s 3 Micheline star The Fat Duck at Bray. Older brother Thomas is a self-taught chef and is Executive Chef for the group, Bain & Bridges as well as being Head Chef at the Tilbury. The brothers have a passion for creating the perfect environment for their guests, with unique dishes made with the best ingredients, interesting wines to excite any palate & a relaxing, comfortable atmosphere.', '2017-09-25 09:10:47', '2017-09-25 09:10:47');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `branchname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `county` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(14) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` bigint(14) DEFAULT NULL,
  `loctype` enum('Main','Branch') COLLATE utf8mb4_unicode_ci NOT NULL,
  `googlemap` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `branchname`, `address`, `location`, `county`, `postcode`, `phone`, `email`, `fax`, `loctype`, `googlemap`, `created_at`, `updated_at`) VALUES
(24, 'The White Hart', '2 Prospect Place,', 'Welwyn, Herts', 'Hertfordshire', 'AL6 9EN', 7929071115, 'info@whitehartwelwyn.co.uk', 146533368888, 'Main', 'https://www.google.com/maps?ll=51.829482,-0.215138&z=16&t=m&hl=en-GB&gl=GB&mapclient=embed&cid=11809862231887212283', '2017-09-25 14:18:48', '2017-09-25 14:18:48'),
(25, 'The Tilbury', 'Watton Road', 'Datchworth,', 'Hertfordshire', 'SG3 6TB.', 1438715353, 'info@thetilbury.co.uk', 1438715353, 'Branch', 'https://www.google.com/maps?ll=51.829482,-0.215138&z=16&t=m&hl=en-GB&gl=GB&mapclient=embed&cid=11809862231887212283', '2017-09-26 13:19:30', '2017-09-26 13:19:30');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `eventtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventsubtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventtext` text COLLATE utf8mb4_unicode_ci,
  `eventimage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `eventtitle`, `eventsubtitle`, `eventtext`, `eventimage`, `created_at`, `updated_at`) VALUES
(24, 'Supper Club', 'Themed Supper Club evenings once a month', 'Every month we hold a supper club in our function room, hosted by James Dowling from Wine2Trade. Guests enjoy bubbly on arrival & then we have wine chat, 3 courses of family style food with 6 wines to try. Each event has it’s own theme, please see below for whats coming up.\r\n\r\n\r\nThursday September 28th – New Zealand\r\nThursday November 30th – Bordeaux/Christmas\r\nDecember – No Event\r\nThursday January 25th – Chile\r\n\r\nPlease arrive at 7pm for bubbly \r\nSupper will commence at 7:30pm sharp and finish at 9:30pm', 'white-hart-supper-club-img-2.jpg', '2017-09-25 11:59:19', '2017-09-26 10:05:11'),
(25, 'Christmas Opening Times', 'White Hart Christmas Opening Times', 'Christmas Eve - 12-4 - Set Menu // Bar Menu 6-8\r\n\r\nXmas Day 12-2.30 - Set Menu\r\n\r\nBoxing Day - 12-4 Set Menu // Bar Menu 6-8\r\n\r\n27th - 29th - Open as normal\r\n\r\nNYE - Event\r\n\r\nNYD - 12-4 Set Menu', 'white-hart-offers-img-2.jpg', '2017-09-25 12:02:58', '2017-09-25 12:02:58'),
(26, 'New! Dinner, Bed & Breakfast', 'Available Friday, Saturday & Sunday night', 'Dinner, Bed & Breakfast<br>\r\n3 Course Dinner, a comfortable nights stay & breakfast in the morning<br>\r\n£125 for 2 people<br>\r\nBoutique, Bubbly, Bed & Breakfast<br>\r\n3 Course Dinner with a bottle of Prosecco, boutique room with jacuzzi bath & breakfast\r\n\r\n£175 for 2 people', 'white-hart-offers-img-1.jpg', '2017-09-25 13:07:00', '2017-09-25 13:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `filename` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_filename` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mimetype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pageid` int(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `filename`, `original_filename`, `mimetype`, `pageid`, `created_at`, `updated_at`) VALUES
(56, 'phpD203.tmp.jpg', 'food-img-pub-restaurant-1.jpg', 'image/jpeg', 6, '2017-09-21 09:02:19', '2017-09-21 09:02:19'),
(57, 'phpD30E.tmp.jpg', 'food-img-pub-restaurant-6.jpg', 'image/jpeg', 6, '2017-09-21 09:02:19', '2017-09-21 09:02:19'),
(58, 'phpD418.tmp.jpg', 'food-img-pub-restaurant-9.jpg', 'image/jpeg', 6, '2017-09-21 09:02:19', '2017-09-21 09:02:19'),
(59, 'phpD523.tmp.jpg', 'food-img-pub-restaurant-11.jpg', 'image/jpeg', 6, '2017-09-21 09:02:19', '2017-09-21 09:02:19'),
(60, 'phpD62D.tmp.jpg', 'food-img-pub-restaurant-12.jpg', 'image/jpeg', 6, '2017-09-21 09:02:20', '2017-09-21 09:02:20'),
(61, 'phpD748.tmp.jpg', 'food-img-pub-restaurant-14.jpg', 'image/jpeg', 6, '2017-09-21 09:02:20', '2017-09-21 09:02:20'),
(62, 'phpD843.tmp.jpg', 'food-img-pub-restaurant-16.jpg', 'image/jpeg', 6, '2017-09-21 09:02:20', '2017-09-21 09:02:20'),
(63, 'phpD96D.tmp.jpg', 'food-img-pub-restaurant-23.jpg', 'image/jpeg', 6, '2017-09-21 09:02:20', '2017-09-21 09:02:20'),
(64, 'phpDA68.tmp.jpg', 'food-img-pub-restaurant-37.jpg', 'image/jpeg', 6, '2017-09-21 09:02:21', '2017-09-21 09:02:21'),
(65, 'phpDB72.tmp.jpg', 'food-img-pub-restaurant-45.jpg', 'image/jpeg', 6, '2017-09-21 09:02:21', '2017-09-21 09:02:21'),
(66, 'phpDC8C.tmp.jpg', 'food-img-pub-restaurant-46.jpg', 'image/jpeg', 6, '2017-09-21 09:02:21', '2017-09-21 09:02:21'),
(67, 'phpDDB6.tmp.jpg', 'food-img-pub-restaurant-48.jpg', 'image/jpeg', 6, '2017-09-21 09:02:22', '2017-09-21 09:02:22'),
(68, 'phpDEC1.tmp.jpg', 'food-img-pub-restaurant-50.jpg', 'image/jpeg', 6, '2017-09-21 09:02:22', '2017-09-21 09:02:22'),
(69, 'phpDFCC.tmp.jpg', 'food-img-pub-restaurant-53.jpg', 'image/jpeg', 6, '2017-09-21 09:02:22', '2017-09-21 09:02:22'),
(70, 'phpB453.tmp.jpg', 'white-hart-gen-gallery-img-2.jpg', 'image/jpeg', 6, '2017-09-21 09:03:16', '2017-09-21 09:03:16'),
(71, 'phpB59C.tmp.jpg', 'white-hart-gen-gallery-img-3.jpg', 'image/jpeg', 6, '2017-09-21 09:03:17', '2017-09-21 09:03:17'),
(72, 'phpB6A7.tmp.jpg', 'white-hart-gen-gallery-img-11.jpg', 'image/jpeg', 6, '2017-09-21 09:03:17', '2017-09-21 09:03:17'),
(73, 'phpB7D0.tmp.jpg', 'white-hart-gen-gallery-img-13.jpg', 'image/jpeg', 6, '2017-09-21 09:03:17', '2017-09-21 09:03:17'),
(74, 'phpB8EB.tmp.jpg', 'white-hart-gen-gallery-img-14.jpg', 'image/jpeg', 6, '2017-09-21 09:03:18', '2017-09-21 09:03:18'),
(75, 'phpBA05.tmp.jpg', 'white-hart-gen-gallery-img-15.jpg', 'image/jpeg', 6, '2017-09-21 09:03:18', '2017-09-21 09:03:18'),
(76, 'phpBB1F.tmp.jpg', 'white-hart-gen-gallery-img-16.jpg', 'image/jpeg', 6, '2017-09-21 09:03:18', '2017-09-21 09:03:18'),
(77, 'phpBC1A.tmp.jpg', 'white-hart-gen-gallery-img-17.jpg', 'image/jpeg', 6, '2017-09-21 09:03:18', '2017-09-21 09:03:18'),
(78, 'phpBD25.tmp.jpg', 'white-hart-gen-gallery-img-18.jpg', 'image/jpeg', 6, '2017-09-21 09:03:19', '2017-09-21 09:03:19'),
(79, 'phpBE20.tmp.jpg', 'white-hart-gen-gallery-img-32.jpg', 'image/jpeg', 6, '2017-09-21 09:03:19', '2017-09-21 09:03:19'),
(83, 'php5751.tmp.jpg', 'white-hart-gen-gallery-img-33.jpg', 'image/jpeg', 6, '2017-09-21 09:26:54', '2017-09-21 09:26:54'),
(84, 'php587A.tmp.jpg', 'white-hart-gen-gallery-img-34.jpg', 'image/jpeg', 6, '2017-09-21 09:26:55', '2017-09-21 09:26:55'),
(85, 'php5985.tmp.jpg', 'white-hart-gen-gallery-img-35.jpg', 'image/jpeg', 2, '2017-09-21 09:26:55', '2017-09-21 09:26:55'),
(86, 'phpDC36.tmp.jpg', 'food-img-pub-restaurant-3.jpg', 'image/jpeg', 2, '2017-09-21 11:50:34', '2017-09-21 11:50:34'),
(87, 'phpDD50.tmp.jpg', 'food-img-pub-restaurant-9.jpg', 'image/jpeg', 2, '2017-09-21 11:50:34', '2017-09-21 11:50:34'),
(88, 'phpDE4B.tmp.jpg', 'food-img-pub-restaurant-14.jpg', 'image/jpeg', 2, '2017-09-21 11:50:34', '2017-09-21 11:50:34'),
(89, 'phpDF46.tmp.jpg', 'food-img-pub-restaurant-16.jpg', 'image/jpeg', 2, '2017-09-21 11:50:34', '2017-09-21 11:50:34'),
(90, 'phpE051.tmp.jpg', 'food-img-pub-restaurant-19.jpg', 'image/jpeg', 2, '2017-09-21 11:50:35', '2017-09-21 11:50:35'),
(91, 'phpE15B.tmp.jpg', 'food-img-pub-restaurant-23.jpg', 'image/jpeg', 2, '2017-09-21 11:50:35', '2017-09-21 11:50:35'),
(92, 'phpE256.tmp.jpg', 'food-img-pub-restaurant-33.jpg', 'image/jpeg', 2, '2017-09-21 11:50:35', '2017-09-21 11:50:35'),
(93, 'phpE361.tmp.jpg', 'food-img-pub-restaurant-35.jpg', 'image/jpeg', 2, '2017-09-21 11:50:35', '2017-09-21 11:50:35'),
(94, 'phpE45C.tmp.jpg', 'food-img-pub-restaurant-39.jpg', 'image/jpeg', 2, '2017-09-21 11:50:36', '2017-09-21 11:50:36'),
(95, 'phpE557.tmp.jpg', 'food-img-pub-restaurant-42.jpg', 'image/jpeg', 2, '2017-09-21 11:50:36', '2017-09-21 11:50:36'),
(96, 'phpE652.tmp.jpg', 'food-img-pub-restaurant-45.jpg', 'image/jpeg', 2, '2017-09-21 11:50:36', '2017-09-21 11:50:36'),
(97, 'phpE75D.tmp.jpg', 'food-img-pub-restaurant-47.jpg', 'image/jpeg', 2, '2017-09-21 11:50:36', '2017-09-21 11:50:36'),
(98, 'phpE858.tmp.jpg', 'white-hart-gen-gallery-img-6.jpg', 'image/jpeg', 2, '2017-09-21 11:50:37', '2017-09-21 11:50:37'),
(99, 'phpE972.tmp.jpg', 'white-hart-gen-gallery-img-7.jpg', 'image/jpeg', 2, '2017-09-21 11:50:37', '2017-09-21 11:50:37'),
(100, 'phpEA5D.tmp.jpg', 'white-hart-gen-gallery-img-9.jpg', 'image/jpeg', 2, '2017-09-21 11:50:37', '2017-09-21 11:50:37'),
(101, 'phpEB58.tmp.jpg', 'white-hart-gen-gallery-img-11.jpg', 'image/jpeg', 2, '2017-09-21 11:50:37', '2017-09-21 11:50:37'),
(102, 'phpEC63.tmp.jpg', 'white-hart-gen-gallery-img-13.jpg', 'image/jpeg', 2, '2017-09-21 11:50:38', '2017-09-21 11:50:38'),
(103, 'phpED6E.tmp.jpg', 'white-hart-gen-gallery-img-14.jpg', 'image/jpeg', 2, '2017-09-21 11:50:38', '2017-09-21 11:50:38'),
(104, 'phpEE78.tmp.jpg', 'white-hart-gen-gallery-img-15.jpg', 'image/jpeg', 2, '2017-09-21 11:50:38', '2017-09-21 11:50:38'),
(105, 'phpEF83.tmp.jpg', 'white-hart-gen-gallery-img-17.jpg', 'image/jpeg', 2, '2017-09-21 11:50:38', '2017-09-21 11:50:38'),
(106, 'php5AD2.tmp.jpg', 'white-hart-gallery-preview-img-1.jpg', 'image/jpeg', 1, '2017-09-21 12:55:33', '2017-09-21 12:55:33'),
(107, 'php5BEC.tmp.jpg', 'white-hart-gallery-preview-img-4.jpg', 'image/jpeg', 1, '2017-09-21 12:55:33', '2017-09-21 12:55:33'),
(108, 'php5CE7.tmp.jpg', 'white-hart-gallery-preview-img-5.jpg', 'image/jpeg', 1, '2017-09-21 12:55:33', '2017-09-21 12:55:33'),
(109, 'php5DE2.tmp.jpg', 'white-hart-gallery-preview-img-6.jpg', 'image/jpeg', 1, '2017-09-21 12:55:33', '2017-09-21 12:55:33'),
(110, 'php5EEC.tmp.jpg', 'white-hart-gallery-preview-img-8.jpg', 'image/jpeg', 1, '2017-09-21 12:55:34', '2017-09-21 12:55:34'),
(111, 'php5FE7.tmp.jpg', 'white-hart-gallery-preview-img-9.jpg', 'image/jpeg', 1, '2017-09-21 12:55:34', '2017-09-21 12:55:34'),
(112, 'php60E2.tmp.jpg', 'white-hart-gallery-preview-img-10.jpg', 'image/jpeg', 1, '2017-09-21 12:55:34', '2017-09-21 12:55:34'),
(113, 'php61ED.tmp.jpg', 'white-hart-gallery-preview-img-11.jpg', 'image/jpeg', 1, '2017-09-21 12:55:34', '2017-09-21 12:55:34'),
(116, 'phpE34F.tmp.jpg', 'food-img-pub-restaurant-28.jpg', 'image/jpeg', 2, '2017-09-25 08:02:53', '2017-09-25 08:02:53'),
(117, 'php5C66.tmp.jpg', 'food-img-pub-restaurant-23.jpg', 'image/jpeg', 6, '2017-09-26 12:22:48', '2017-09-26 12:22:48'),
(118, 'php827D.tmp.jpg', 'food-img-pub-restaurant-9.jpg', 'image/jpeg', 6, '2017-09-26 12:22:58', '2017-09-26 12:22:58'),
(119, 'php86C8.tmp.jpg', 'food-img-pub-restaurant-23.jpg', 'image/jpeg', 6, '2017-09-26 12:32:49', '2017-09-26 12:32:49'),
(120, 'phpD8A2.tmp.jpg', 'food-img-pub-restaurant-33.jpg', 'image/jpeg', 2, '2017-09-26 12:33:10', '2017-09-26 12:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_pages`
--

CREATE TABLE `gallery_pages` (
  `bannertext` varchar(255) NOT NULL,
  `bannertext1` varchar(255) NOT NULL,
  `galleryheadertext` text NOT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery_pages`
--

INSERT INTO `gallery_pages` (`bannertext`, `bannertext1`, `galleryheadertext`, `banner`, `created_at`, `updated_at`) VALUES
('Gallery', 'pHOTOS', 'GALLERY', NULL, '2017-09-18 08:37:22', '2017-09-18 08:37:22'),
('Gallery', 'pHOTOS', 'GALLERY', NULL, '2017-09-18 08:39:49', '2017-09-18 08:39:49');

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `id` int(10) UNSIGNED NOT NULL,
  `openingtimes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `homeaddress` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `specials` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookingtype` tinyint(4) NOT NULL,
  `opentableid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emailid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customerreview` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customername` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`id`, `openingtimes`, `homeaddress`, `specials`, `bookingtype`, `opentableid`, `emailid`, `customerreview`, `customername`, `created_at`, `updated_at`) VALUES
(1, '["Monday - Friday [7 - 10pm]","Sat - Sun (8:00-11:00)",null]', '["The White Hart","2 Prospect Place","Welwyn, Herts","AL6 9EN",null]', '["Noodle Soup","Sausage and Mash",null]', 1, '53698666', NULL, 'Amazing customer service, happy and helpful staff. Highly recommend this place!! The food is exceptional quality (Genuinely one of the nicest burgers i have had the pleasure to eat) Be sure to try it out!!', 'Mason Ricky Smith', '2017-09-26 07:39:55', '2017-09-26 09:04:29');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `menutitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menufile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menuimage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menutitle`, `menufile`, `menuimage`, `created_at`, `updated_at`) VALUES
(6, 'Lunch & Dinner', 'Lunch-Dinner-Menu.pdf', 'food-img-pub-restaurant-1.jpg', '2017-09-27 08:18:24', '2017-09-27 08:18:24'),
(7, 'Breakfast Menu', 'Breakfast-Menu.pdf', 'white-hart-gen-gallery-img-17.jpg', '2017-09-27 08:33:30', '2017-09-27 08:33:30');

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
(3, '2017_09_08_131557_create_pagemenus_table', 1),
(4, '2017_09_08_131615_create_contacts_table', 1),
(5, '2017_09_08_153809_create_galleries_table', 1),
(6, '2017_09_10_055503_pages', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(4) UNSIGNED NOT NULL,
  `bannertext` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bannertext1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `headertext` text COLLATE utf8mb4_unicode_ci,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings_id` int(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `bannertext`, `bannertext1`, `headertext`, `banner`, `settings_id`, `created_at`, `updated_at`) VALUES
(1, 'Welcome to', 'The White Hart', 'The White Hart offers contemporary food, real ales, an extensive gin range,\r\ncocktails & an exciting wine list.', 'white-hart-gen-gallery-img-11.jpg', 1, NULL, '2017-09-26 09:02:11'),
(2, 'About', 'The White Hart', 'Owned & run by brothers James & Tom Bainbridge, The White Hart offers varied menus, real ales, an extensive gin range, cocktails & an exciting wine list. The restaurant, hotel & function space in Welwyn serves breakfast, lunch and dinner seven days a week. \r\n\r\nThe White Hart dates back to 1681 and it was Welwyn’s main coaching inn. It was a popular overnight stop for travellers going north from London and at one point it offered fourteen beds for humans and stabling for thirty four horses. It was also home to the village courtroom, where petty sessions were held, when misdemeanours may have included theft and assault and, ironically, drunkenness.', 'white-hart-parallax-banner-9.jpg', 1, '2017-09-15 14:52:01', '2017-09-26 09:45:59'),
(3, 'Our', 'ACCOMMODATION', 'We have 13 bedrooms available at The White Hart. All rooms have an en suite bathrooms. Rates below include breakfast and are based on double occupancy.', 'white-hart-parallax-banner-5.jpg', 1, NULL, '2017-09-25 11:12:55'),
(4, 'Food & Drink', 'MENU', NULL, 'white-hart-gen-gallery-img-8.jpg', 1, NULL, '2017-09-27 08:14:34'),
(5, 'Latest news &', 'Events & Offers', 'evens', 'white-hart-gallery-preview-img-9.jpg', 0, NULL, '2017-09-26 10:05:11'),
(6, 'Gallery', 'Gallery', 'gallery', 'white-hart-parallax-banner-5.jpg', 1, NULL, '2017-09-26 12:47:01'),
(7, 'Opening times &', 'Contact US', 'The Tilbury\n', 'white-hart-offers-img-2.jpg', 1, NULL, '2017-09-26 13:14:58'),
(8, 'Our', 'FUNCTION ROOM', 'Our function room is the former court house of Welwyn but now we use it for wedding receptions, parties, celebrations and conferences.', 'white-hart-gallery-preview-img-11.jpg', 1, NULL, '2017-09-26 15:02:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `roomtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookingurl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roomprice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roomimage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roomdesc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `roomtype` int(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `roomtitle`, `bookingurl`, `roomprice`, `roomimage`, `roomdesc`, `roomtype`, `created_at`, `updated_at`) VALUES
(3, 'Stable Rooms', 'http://book.seekom.com/front-booking/book/thewhite53/3155?sellerEntity=account', 'From £100 per night', 'white-hart-accomodation-stable.jpg', 'Our four converted stable rooms offer comfort and practicality, having direct access to the car park. These rooms are perfect for those staying for multiple nights.', 0, '2017-09-25 09:47:20', '2017-09-25 09:47:20'),
(4, 'Penthouse', 'http://book.seekom.com/front-booking/book/thewhite53/3155?sellerEntity=account', '£452 per night', 'white-hart-accomodation-boutique.jpg', 'We have three boutique bedrooms which offer a stylish and contemporary stay. These rooms have large bathrooms with whirlpool baths & we suggest these for our weekend couples & brides needing extra space to get ready for the big day.', 0, '2017-09-25 11:12:55', '2017-09-25 11:12:55'),
(5, 'Main Function Room', 'url', 'from £10 per hour', 'white-hart-function-room-2.jpg', 'We have a range of different menu’s and packages from buffets for up to 80 to a sit down meal for 40. \r\n\r\nFor conferences we have delegate rates from a quick meeting to a whole day conference with accommodation, lunch and dinner. You can view our new conference pack here – \r\n\r\nConference Pack May 2017. \r\n\r\nPlease contact info@whitehartwelwyn.co.uk for more details and to make a booking.', 1, '2017-09-26 15:06:31', '2017-09-26 15:06:31');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(4) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `facebookurl` varchar(255) NOT NULL,
  `twitterurl` varchar(255) NOT NULL,
  `googleurl` varchar(255) NOT NULL,
  `youtubeurl` varchar(255) NOT NULL,
  `adminemail` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `facebookurl`, `twitterurl`, `googleurl`, `youtubeurl`, `adminemail`, `created_at`, `updated_at`) VALUES
(1, 'the-white-hart-logo.png', 'facebook.com', 'twitter.com', 'google.com', 'youtube.com', 'kofi@fluidstudiosltd.com', '2017-09-28 14:00:59', '2017-09-28 13:00:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kay', 'kc@h.c', '$2y$10$InY5vyKlt9ZtnS1DVnLIkexUDSEAKnWNfT1sChSCGW8eMIKY34veS', 'PlP8pKn2UIgEpUUNAIwdzmv1Gj7jdkDSNQLwiUDPW6zCH9ILqgGsXQy97tOq', '2017-09-29 08:23:16', '2017-09-29 08:23:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
