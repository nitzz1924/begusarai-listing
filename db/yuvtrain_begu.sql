-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 07:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yuvtrain_begu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rahul Soni', 'rahulsoni@admin.com', NULL, '$2y$10$PqSKV7Ye2PVTzNor1tEhguuPxzY3lGTN9H4JWZqlNwK2GvjYB7OXG', 1, NULL, '2020-07-07 18:30:00', '2020-10-14 09:15:34'),
(2, 'admin', 'admin@inbegusarai.com', NULL, '$2y$10$PqSKV7Ye2PVTzNor1tEhguuPxzY3lGTN9H4JWZqlNwK2GvjYB7OXG', 1, 'wxqYI9peP7faVo8DSbV8KvBRpeEeCr4ofrQAZEaPyZAn9nbY3lXim3kJJZ3l', '2020-07-07 18:30:00', '2020-10-14 09:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `type` varchar(200) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `post` text NOT NULL,
  `uploaded_by` int(11) DEFAULT 1,
  `image` varchar(255) DEFAULT 'assets/images/blog/default.png',
  `videourl` text NOT NULL,
  `status` tinyint(4) DEFAULT 1,
  `postbyId` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `type`, `keyword`, `post`, `uploaded_by`, `image`, `videourl`, `status`, `postbyId`, `created_at`, `updated_at`) VALUES
(1, 'Test Title', 'Test description for blog', 'begusarai Blog 1', 'keywords', 'Test description for blogTest description for blogTest description for blogTest description for blogTest description for blogTest description for blogTest description for blogTest description for blogTest description for blogTest description for blogTest description for blogTest description for blogTest description for blogTest description for blogTest description for blogTest description for blogTest description for blogTest description for blogTest description for blog', 1, '1714989588.jpg', 'https://www.youtube.com/watch?v=jRKkudbOwjM', 1, NULL, '2024-05-06 10:28:25', '2024-05-06 10:31:38'),
(2, 'blog 12345', 'blog 2 description', 'begusarai Blog 1', 'test blog 2', 'text content for blog 2asd', 1, '1715058779.jpeg', 'https://www.youtube.com/watch?v=jRKkudbOwjM', 1, NULL, '2024-05-06 11:38:23', '2024-05-07 05:42:59');

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` bigint(20) NOT NULL,
  `business_id` bigint(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`id`, `business_id`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 11, 2, '2023-09-15 16:32:21', '2023-09-15 16:32:21'),
(9, 12, 2, '2023-09-15 17:08:02', '2023-09-15 17:08:02'),
(30, 12, 1, '2023-09-20 15:55:46', '2023-09-20 15:55:46'),
(31, 11, 1, '2023-09-20 15:55:48', '2023-09-20 15:55:48'),
(33, 1, 2, '2023-09-21 18:32:08', '2023-09-21 18:32:08'),
(48, 1, 1, '2023-09-29 18:42:25', '2023-09-29 18:42:25'),
(58, 118, 2, '2023-10-21 19:09:19', '2023-10-21 19:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `businesslist`
--

CREATE TABLE `businesslist` (
  `id` bigint(20) NOT NULL,
  `userId` bigint(255) NOT NULL,
  `businessName` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `placeType` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `highlight` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `placeAddress` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `ownerName` varchar(255) NOT NULL,
  `phoneNumber1` varchar(255) DEFAULT NULL,
  `phoneNumber2` varchar(255) DEFAULT NULL,
  `whatsappNo` varchar(255) DEFAULT NULL,
  `websiteUrl` varchar(255) DEFAULT NULL,
  `additionalFields` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `bookingType` varchar(255) DEFAULT NULL,
  `bookingurl` varchar(255) DEFAULT NULL,
  `packageId` varchar(255) DEFAULT NULL,
  `expairyDate` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `coverImage` varchar(255) DEFAULT NULL,
  `galleryImage` varchar(255) DEFAULT NULL,
  `documentImage` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `status` enum('0','1','','') NOT NULL DEFAULT '0',
  `planStatus` enum('0','1','2','') NOT NULL DEFAULT '0',
  `category_ranking` int(255) NOT NULL DEFAULT 11,
  `city_ranking` int(255) DEFAULT 11,
  `featured_ranking` int(255) NOT NULL DEFAULT 11,
  `home_featured` int(255) NOT NULL DEFAULT 11,
  `search_results` int(255) NOT NULL DEFAULT 11,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `dType` varchar(255) DEFAULT NULL,
  `dNumber` varchar(255) DEFAULT NULL,
  `leadStatus` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `businesslist`
--

INSERT INTO `businesslist` (`id`, `userId`, `businessName`, `category`, `placeType`, `description`, `price`, `duration`, `highlight`, `city`, `placeAddress`, `email`, `ownerName`, `phoneNumber1`, `phoneNumber2`, `whatsappNo`, `websiteUrl`, `additionalFields`, `instagram`, `facebook`, `twitter`, `bookingType`, `bookingurl`, `packageId`, `expairyDate`, `youtube`, `coverImage`, `galleryImage`, `documentImage`, `logo`, `video`, `status`, `planStatus`, `category_ranking`, `city_ranking`, `featured_ranking`, `home_featured`, `search_results`, `created_at`, `updated_at`, `dType`, `dNumber`, `leadStatus`) VALUES
(108, 88, 'RUDRAASHWI TECHNOLOGY', 'Digital-Marketing', '\"OFFICE\"', '<p>We are a Digital marketing company who help to grow your business in Begusarai.</p>', NULL, NULL, '\"WiFi,CCTV,Parking\"', 'Begusarai', 'Behind alka cinema, Begusarai', NULL, 'Nirmal Kumar', '6203321252', NULL, '6203321252', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1697178220.png', '\"[\\\"1697120401_65280091b87d6.png\\\",\\\"1697120401_65280091b8a4b.png\\\"]\"', '1697120401.pdf', '1697120401.png', 'https://www.youtube.com/watch?v=P769btvDzlU', '1', '0', 11, 11, 11, 6, 11, '2023-10-12 20:20:01', '2023-10-25 05:31:17', NULL, NULL, '1'),
(110, 72, 'PANACEA HOSPITAL', 'Hospital', '\"HOSPITAL\"', 'BEST HOSPITAL WITH BEST DOCTOR\'S TEAM AVAILABLE 24 HRS. IN INDUSTRIAL CAPTIAL OF BIHAR BEGUSARAI. ALL MODERN TECHNOLOGY AND INFRASTRUCTURE IS AVAILABLE HERE . FOR BEST TREATMENT MUST VISIT OUR HOSPITAL', NULL, NULL, '\"WiFi,Water Cooler,CCTV,Parking\"', 'Begusarai', 'NH 31 NEAR GYAN BHARTI SCHOOL HARRAKH, Begusarai, Bihar 851101', 'panaceahospitalbeg@gmail.com', 'Dr. VIRENDER KUMAR', '9931530061', NULL, '9931530061', NULL, NULL, NULL, 'https://www.facebook.com/panaceahospital123/', NULL, NULL, NULL, NULL, NULL, NULL, '1697178822.jpg', '\"[\\\"1697178584_6528e3d8cc77a.jpg\\\",\\\"1697178584_6528e3d8cc897.jpg\\\",\\\"1697178584_6528e3d8cc9c9.jpg\\\",\\\"1697178584_6528e3d8ccaa0.jpg\\\",\\\"1697178584_6528e3d8ccb78.jpg\\\"]\"', '1697178584.pdf', '1697178584.jpg', 'https://www.youtube.com/watch?v=P769btvDzlU', '1', '0', 11, 11, 11, 6, 11, '2023-10-13 12:29:44', '2023-10-13 20:53:21', NULL, NULL, '1'),
(111, 88, 'SAUMYA COMPUTER.', 'Computer-Shop', '\"OFFICE\"', 'LAPTOP,DESKTOP,CCTV CAMERA,BATTERY INVERTER,\r\nLED MONITOR,PEN DRIVE ETC.', NULL, NULL, '\"WiFi,CCTV\"', 'Begusarai', 'NH 31,SUBHASH CHOWK NEAR DC SINGH PETROL PUMP, BEGUSARAI', 'prashantkumarjha222@gmail.com', 'PRASHANT KUMAR', '7070704443', '8235361001', '7070704443', NULL, NULL, NULL, NULL, NULL, 'ty1', NULL, NULL, NULL, NULL, '1697210714.jpg', '\"[\\\"1697209934_65295e4e7856f.jpeg\\\"]\"', '1697209934.pdf', '1697209934.jpeg', NULL, '1', '0', 11, 11, 11, 6, 11, '2023-10-13 21:12:14', '2023-10-19 09:26:50', 'gst', '10DUEPK8966E1ZL', '1'),
(112, 122, 'Chaudhary Homyo Hall.', 'Hospital', '\"HOSPITAL\"', 'Homoeopathic medicine as well as treatment.....................................................', NULL, NULL, '\"WiFi,Water Cooler,CCTV,Parking\"', 'Begusarai', 'Shree Krishna Nagar Road no.6 (Between deepshikha cinema hall and cournal kabab hotel)', 'chnadan.121315@gamil.com', 'Chandan Kumar', '7549254481', '9431693636', '7549254481', NULL, NULL, NULL, NULL, NULL, 'ty1', NULL, NULL, NULL, NULL, '1697622132.jpg', '\"[\\\"1697621770_652fa70a35928.jpg\\\",\\\"1697621770_652fa70a35a8c.jpg\\\",\\\"1697621770_652fa70a35ce0.jpg\\\",\\\"1697621770_652fa70a35df1.jpg\\\",\\\"1697621770_652fa70a35f3f.jpg\\\"]\"', '1697621770.pdf', '1697621770.jpg', NULL, '1', '0', 11, 11, 11, 11, 11, '2023-10-18 15:36:10', '2023-10-19 18:32:45', 'gst', '10AJPPR3550E1ZE', '0'),
(113, 124, 'My TVS Green Service For Cars', 'CAR-SERVICE-CENTER', '\"SERVICE CENTER\"', 'All Brand Car Services Under 9ne Roof.\r\n\r\n* यहाँ सभी कारों की सर्विसिंग की जाती है।\r\n* यहाँ Insurance Claim की सुविधा उपलब्ध है।', NULL, NULL, '\"Water Cooler,CCTV,Parking\"', 'Begusarai', 'NH - 31, KESHAWE, BEGUSARAI,', 'kakahardeotvs@gmail.com', 'SAURAV KUMAR', '8797009292', '8797009393', '8797009292', NULL, NULL, NULL, NULL, NULL, 'ty1', NULL, NULL, NULL, NULL, '1697701377.jpg', '\"[\\\"1697703363_6530e5c3f08e4.jpg\\\",\\\"1697703363_6530e5c3f0fa5.jpg\\\",\\\"1697703363_6530e5c3f10b1.jpg\\\",\\\"1697703363_6530e5c3f11bd.jpg\\\",\\\"1697703363_6530e5c3f12ba.png\\\"]\"', '1697701773.pdf', '1697702105.jpg', 'https://www.youtube.com/watch?v=WOPTjfJoI6k', '1', '0', 11, 11, 11, 6, 11, '2023-10-19 13:42:57', '2023-10-22 17:48:28', 'gst', '10AAGCK331B1Z7', '1'),
(114, 130, 'JAI MATA RANI (JMR) GIFT AND COSMETIC SHOP', 'GIFT-SHOP', '\"SHOP\"', '<p>JAI MATA RANI (JMR) GIFT AND COSMETIC SHOP KALI ASTHAN CHOWK, SRI RAM MARKET. BEGUSARAI</p>', NULL, NULL, '\"CCTV\"', 'Begusarai', 'KALI ASTHAN CHOWK,  SRI RAM MARKET. BEGUSARAI', 'gulshankumar754481@gmail.com', 'Gulshan Kumar', '7544813871', NULL, '7544813871', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1697705825.jpg', '\"[\\\"1697705633_6530eea1c17e9.jpg\\\",\\\"1697705633_6530eea1c1ac3.jpg\\\",\\\"1697705633_6530eea1c1bec.jpg\\\",\\\"1697705633_6530eea1c1cdc.jpg\\\"]\"', '1697705633.pdf', '1697705633.jpg', NULL, '1', '0', 11, 11, 11, 11, 11, '2023-10-19 14:53:53', '2023-10-27 16:51:41', NULL, NULL, '0'),
(115, 132, 'DB dot com mobile big bazar', 'Mobile-Shop', '\"SHOP\"', 'DB dot com mobile big bazar & Amul ice cream parlour.\r\n\r\n\"DB Dot Com Mobile Big Bazar\" is a bustling mobile shop located in the heart of Begusarai. This vibrant store is a one-stop destination for all your mobile needs, offering a wide range of smartphones, accessories, and top-notch customer service. Whether you\'re looking for the latest smartphone models, trendy phone cases, screen protectors, or even mobile gadgets, you\'ll find it all at \"DB Dot Com Mobile Big Bazar.\" With a team of knowledgeable and friendly staff, this shop ensures you receive expert guidance and assistance in choosing the right mobile device or accessory that suits your preferences and requirements. It\'s where technology and convenience meet, making it a must-visit spot for mobile enthusiasts in Begusarai.', NULL, NULL, '\"WiFi,Water Cooler,CCTV,Parking\"', 'Begusarai', 'Traffic chowk, Begusarai', 'dinkarsdb.com@gmail.com', 'Dinkar bhardwaj', '9934071809', NULL, '9934071809', NULL, NULL, NULL, NULL, NULL, 'ty1', NULL, NULL, NULL, NULL, '1697708749.jpg', '\"[\\\"1697708512_6530f9e04f873.jpg\\\",\\\"1697708512_6530f9e04f96d.jpg\\\"]\"', '1697708512.pdf', '1697708512.jpg', NULL, '1', '0', 11, 11, 11, 11, 11, '2023-10-19 15:41:52', '2023-10-19 18:32:35', NULL, NULL, '0'),
(116, 134, 'J.M.J auto', 'BIKE-SERVICE-CENTER', '\"SERVICE CENTER\"', 'Service and washing center', NULL, NULL, '\"Parking\"', 'Begusarai', 'NEAR BHARAT PETROL PUMP, MANJHAUL ROAD, KANKAUL, BEGUSARAI.', 'Email.vk561087@gmail.com', 'Vicky ktm', '6202170035', NULL, '6202170035', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1697709891.jpg', '\"[\\\"1697709784_6530fed8e4557.jpg\\\",\\\"1697709784_6530fed8e46bb.jpg\\\",\\\"1697709784_6530fed8e4818.jpg\\\",\\\"1697709784_6530fed8e4970.jpg\\\",\\\"1697709784_6530fed8e4c13.jpg\\\"]\"', '1697709784.pdf', '1697709784.jpg', NULL, '1', '0', 11, 11, 11, 11, 11, '2023-10-19 16:03:04', '2023-10-19 18:32:38', NULL, NULL, '0'),
(117, 136, 'CRIMSOUNE CLUB', 'CLOTH-SHOP', '\"SHOWROOM\"', 'Fashion ware for men\'s women\'s and kids', NULL, NULL, '\"CCTV,Parking\"', 'Begusarai', 'Dwarikapuri complex, Collegiate School road, Near Bandhan Bank. Begusarai.', 'agrawal.boby@gmail.com', 'Amit agrawal', '7082420324', '6200880082', '7082420324', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1697710845.jpg', '\"[\\\"1697710739_65310293215eb.jpg\\\",\\\"1697710739_65310293218f9.jpg\\\",\\\"1697710739_6531029321a3f.jpg\\\",\\\"1697710739_6531029321b7e.jpg\\\",\\\"1697710739_6531029321cae.jpg\\\"]\"', '1697710739.pdf', '1697710739.jpg', NULL, '1', '0', 11, 11, 11, 11, 11, '2023-10-19 16:18:59', '2023-10-19 18:32:40', NULL, NULL, '0'),
(119, 138, 'Sundaram - 3 Ladies parlour & Cosmetic centre', 'SALON', '\"BEAUTY PARLOUR\"', 'Sundaram - 3 Ladies parlour & Cosmetic centre', NULL, NULL, '\"WiFi,Water Cooler,CCTV,Parking\"', 'Begusarai', 'NH 31, TRAFFIC CHOWK, SONA JAGESHWAR COMPLEX. BEGUSARAI.', 'ganpatitraders2648@gmail.com', 'Anmol Ratan', '6200202863', NULL, '6200202863', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1697721062.jpg', '\"[\\\"1697721062_65312ae6b72c4.jpg\\\",\\\"1697721062_65312ae6b7416.jpg\\\",\\\"1697721062_65312ae6b74fc.jpg\\\"]\"', '1697721062.pdf', '1697721062.jpg', NULL, '1', '0', 11, 11, 11, 11, 11, '2023-10-19 19:11:02', '2023-10-19 19:13:27', NULL, NULL, '0'),
(120, 155, 'Leera', 'Digital-Marketing', '\"SHOP\"', '<p>I have a business</p>', '123', NULL, '\" \"', 'Begusarai', 'b17, skyline building', 'bgohil9@gmail.com', 'Leera Store', '9638527410', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ty1', NULL, NULL, NULL, NULL, '1698041016.jpeg', '\"[\\\"1698041016_65360cb8bb23d.png\\\"]\"', '1698041016.pdf', '1698041016.jpeg', NULL, '0', '0', 11, 11, 11, 11, 11, '2023-10-23 12:03:36', '2023-10-25 05:37:04', NULL, NULL, '0'),
(121, 231, 'Vaibhav Auto Spare & Service Center', 'AUTO PARTS', '\"SERVICE CENTER\"', '<p>NH31, har har Mahadev chowk, Bihar 851101</p>', NULL, NULL, '\"Parking\"', 'Begusarai', 'NH31, har har Mahadev chowk, Bihar 851101', NULL, 'VIBHAKAR ANAND', '7654419925', NULL, '7654419925', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1698319228.jpg', '\"[\\\"1698319159_653a4b370a644.jpg\\\",\\\"1698319159_653a4b370a792.jpg\\\",\\\"1698319159_653a4b370a897.jpg\\\",\\\"1698319159_653a4b370a9a2.jpg\\\"]\"', '1698319159.pdf', '1698319159.jpg', NULL, '1', '0', 11, 11, 11, 11, 11, '2023-10-26 17:19:19', '2023-10-26 17:20:28', NULL, NULL, '0'),
(122, 232, 'KRISHNA PRODUCT\'S', 'CLEANING-PRODUCT', '\"SHOP\"', '<h1><strong>KRISHNA PRODUCT&#39;S</strong><br />\r\nMinimum order: 500 litre&nbsp;Bulk Price list&nbsp;Without GST</h1>\r\n\r\n<ol>\r\n	<li>\r\n	<h3><strong>Toilet Cleaner &nbsp; &nbsp;250ml- &nbsp;20.06/-</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Toilet Cleaner &nbsp; &nbsp;5OOML- 28/-</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Toilet Cleaner &nbsp; &nbsp;1 Ltr_ 38/-</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Toilet Cleaner(HDPE) I Ltr_ 44/-</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Handwash with Pump 250ML_38/-</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Handwash with Pump 5OOML_49/-</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Handwash (Regular) 1 Ltr_69/-</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>&nbsp;White phenyl 500ml 11/-</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>White phenyl 1ltr &nbsp;19/-</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Black phenyl 1ltr. &nbsp;28/-</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>&nbsp;Black phenyl 500ml 15/-</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>White phenyl 5ltr___ 95/-</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Black phenyl 5ltr___150/-</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Glass cleaner 5ltr__120/-</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Lizol cleaner 5ltr___199/-</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Toilet cleaner 5ltr__149/-</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Hand wash&nbsp;5ltr____290/-</strong></h3>\r\n	</li>\r\n</ol>', NULL, NULL, '\" \"', 'Begusarai', 'Kavita nivas, Dak Bangla road, near - mahila College paschim', 'krishnabeg96@gmail.com', 'Krishna Kumar Sharma', '8877212928', NULL, '8877212928', 'https://g.co/kgs/dv7jcr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1698333881.jpg', '\"[\\\"1698333881_653a84b9ee520.jpg\\\",\\\"1698333881_653a84b9ee850.jpg\\\",\\\"1698333881_653a84b9eea45.jpg\\\",\\\"1698333881_653a84b9eec0e.jpg\\\",\\\"1698333881_653a84b9eedfa.jpg\\\"]\"', '1698333881.pdf', '1698333881.jpg', NULL, '1', '0', 11, 11, 11, 11, 11, '2023-10-26 21:24:41', '2023-10-26 21:25:46', NULL, NULL, '1'),
(123, 236, 'Meena food plaza', 'Restaurants', '\"RESTAURANTS\"', '<h1>Meena Food Plaza Begusarai</h1>', NULL, NULL, '\"WiFi,Water Cooler,CCTV,Parking\"', 'Begusarai', 'NH 31 , Mahmadpur , Begusarai -851101', 'ajitkumar0772@yahoo.com', 'Ajit Kumar', '8051039412', NULL, '8051039412', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1698397772.jpg', '\"[\\\"1698397772_653b7e4c4d9c0.jpg\\\",\\\"1698397772_653b7e4c4db3d.jpg\\\",\\\"1698397772_653b7e4c4e607.jpg\\\",\\\"1698397772_653b7e4c4e72f.jpg\\\",\\\"1698397772_653b7e4c4e853.jpg\\\"]\"', '1698397772.pdf', '1698397772.jpg', 'https://www.youtube.com/watch?v=cfFFl493LJ0', '1', '0', 11, 11, 11, 11, 11, '2023-10-27 15:09:32', '2023-10-27 15:22:37', NULL, NULL, '0'),
(124, 88, 'Green briyani house', 'Restaurants', '\"RESTAURANTS\"', '<h1>Green briyani house<br />\r\n&nbsp;</h1>', NULL, NULL, '\"Water Cooler,Parking\"', 'Begusarai', 'Near Alka cinema hall , NH31 Begusarai', 'mdsajidansari001@gmail.com', 'Sajid Ansari', '7479447908', NULL, '7479447908', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1698399002.jpg', '\"[\\\"1698398487_653b81178ff08.jpg\\\",\\\"1698398487_653b811790041.jpg\\\"]\"', '1698398487.pdf', '1698398487.jpg', NULL, '1', '0', 11, 11, 11, 11, 11, '2023-10-27 15:21:27', '2023-10-27 15:30:02', NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `buy_plan`
--

CREATE TABLE `buy_plan` (
  `id` int(11) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `businessId` varchar(255) NOT NULL,
  `planId` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `expair_at` datetime NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buy_plan`
--

INSERT INTO `buy_plan` (`id`, `userId`, `businessId`, `planId`, `created_at`, `expair_at`, `status`, `updated_at`) VALUES
(2, '1', '11', '6', '2023-09-23 00:00:00', '2023-10-23 00:00:00', '1', '2023-09-23 00:00:00'),
(3, '1', '1', '1', '2023-09-23 00:00:00', '2023-10-23 00:00:00', '1', '2023-09-23 00:00:00'),
(4, '1', '1', '1', '2023-09-23 00:00:00', '2023-10-23 00:00:00', '1', '2023-09-23 00:00:00'),
(5, '1', '1', '1', '2023-09-23 00:00:00', '2023-10-23 00:00:00', '1', '2023-09-23 00:00:00'),
(6, '1', '1', '1', '2023-09-23 00:00:00', '2023-10-23 00:00:00', '1', '2023-09-23 00:00:00'),
(7, '1', '1', '1', '2023-09-23 00:00:00', '2023-10-23 00:00:00', '1', '2023-09-23 00:00:00'),
(8, '1', '1', '1', '2023-09-23 00:00:00', '2023-10-23 00:00:00', '1', '2023-09-23 00:00:00'),
(9, '1', '1', '8', '2023-09-25 18:01:09', '2023-10-25 18:01:09', '1', '2023-09-25 18:01:09'),
(10, '1', '1', '12', '2023-09-27 13:08:08', '2023-10-27 13:08:08', '1', '2023-09-27 13:08:08'),
(11, '1', '7', '13', '2023-09-27 13:12:00', '2023-10-27 13:12:00', '1', '2023-09-27 13:12:00'),
(12, '1', '8', '9', '2023-09-27 13:21:13', '2023-10-27 13:21:13', '1', '2023-09-27 13:21:13'),
(13, '1', '8', '10', '2023-09-27 13:23:39', '2023-10-27 13:23:39', '1', '2023-09-27 13:23:39'),
(14, '1', '8', '10', '2023-09-27 13:26:53', '2023-10-27 13:26:53', '1', '2023-09-27 13:26:53'),
(15, '1', '8', '8', '2023-09-27 14:14:27', '2023-10-27 14:14:27', '1', '2023-09-27 14:14:27'),
(16, '1', '8', '8', '2023-09-27 14:30:59', '2023-09-29 14:30:59', '1', '2023-09-27 14:30:59'),
(17, '1', '23', '6', '2023-10-09 14:21:07', '2023-11-09 14:21:07', '1', '2023-10-09 14:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cnumber` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `first_name`, `last_name`, `email`, `cnumber`, `message`, `created_at`, `updated_at`) VALUES
(2, 'Rahul', 'soni', 'rahulyuvmedia@gmail.com', '09588871256', 'fg', '2023-09-18 18:20:40', '2023-09-18 18:20:40'),
(3, 'UvwkgnbluXaMfhm', 'kjuhiTZmtKMPwxV', 'glavandab1987@gmail.com', 'OcVDNTtr', 'ncSpsWhVYOHPlmLf', '2024-03-25 13:42:06', '2024-03-25 13:42:06'),
(4, 'UvwkgnbluXaMfhm', 'kjuhiTZmtKMPwxV', 'glavandab1987@gmail.com', 'OcVDNTtr', 'ncSpsWhVYOHPlmLf', '2024-03-25 13:42:09', '2024-03-25 13:42:09'),
(5, 'UvwkgnbluXaMfhm', 'kjuhiTZmtKMPwxV', 'glavandab1987@gmail.com', 'OcVDNTtr', 'ncSpsWhVYOHPlmLf', '2024-03-25 13:42:11', '2024-03-25 13:42:11'),
(6, '3_peElO', '3_axElO', 'quofreephminspi1976@bushka345.store', '82965342421', 'Why 3D Printing is the Future of Manufacturing \r\n3d printer [url=http://www.3d-ruyter53.ru/]http://www.3d-ruyter53.ru/[/url] .', '2024-03-27 14:42:30', '2024-03-27 14:42:30'),
(7, 'zakaz-kuhni-cena-CalvinBoxSW', 'zakaz-kuhni-cena-CalvinBoxSW', 'brovi-master-kirov@brovi-master-permanent.store', '81314816667', 'недорогая дорожная сумка на колесах \r\n[url=http://jump.5ch.net/?http://dorozhnye-sumki-kolesa.ru]http://www.derf.net/redirect/dorozhnye-sumki-kolesa.ru[/url]', '2024-04-03 01:06:14', '2024-04-03 01:06:14'),
(8, 'qorECFtZIST', 'PSgbsJnr', 'izidork43@gmail.com', 'cXGWazBfYoZvn', 'UitSvYgNFwEnWhKk', '2024-04-05 15:17:06', '2024-04-05 15:17:06'),
(9, 'qorECFtZIST', 'PSgbsJnr', 'izidork43@gmail.com', 'cXGWazBfYoZvn', 'UitSvYgNFwEnWhKk', '2024-04-05 15:17:06', '2024-04-05 15:17:06'),
(10, 'qorECFtZIST', 'PSgbsJnr', 'izidork43@gmail.com', 'cXGWazBfYoZvn', 'UitSvYgNFwEnWhKk', '2024-04-05 15:17:07', '2024-04-05 15:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lead`
--

CREATE TABLE `lead` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `business_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lead`
--

INSERT INTO `lead` (`id`, `user_id`, `business_id`, `name`, `number`, `message`, `status`, `created_at`, `updated_at`) VALUES
(5, 1, 22, 'Rahul Soni', '1234567890', 'They explored your business profile !', '1', '2023-10-07 00:00:00', '2023-10-07 11:35:16'),
(6, 1, 23, 'Rahul Soni', '1234567890', 'They explored your business profile !', '1', '2023-10-07 00:00:00', '2023-10-07 11:35:17'),
(7, 1, 95, 'Rahul Soni', '1234567890', 'They explored your business profile !', '0', '2023-10-07 00:00:00', '2023-10-07 11:35:17'),
(8, 1, 96, 'Rahul Soni', '1234567890', 'They explored your business profile !', '1', '2023-10-07 00:00:00', '2023-10-07 11:35:18'),
(9, 1, 23, 'Rahul Soni', '1234567890', 'They explored your business profile !', '1', '2023-10-09 00:00:00', '2023-10-09 15:01:11'),
(10, 62, 95, 'Ajax', '9588871256', 'They explored your business profile !', '1', '2023-10-10 00:00:00', '2023-10-10 11:00:17'),
(11, 1, 23, 'Rahul Soni', '1234567890', 'They explored your business profile !', '1', '2023-10-10 00:00:00', '2023-10-10 14:30:52'),
(12, 64, 23, '1234567890', '9588871256', 'They explored your business profile !', '0', '2023-10-10 00:00:00', '2023-10-10 20:38:42'),
(13, 1, 95, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2023-10-11 00:00:00', '2023-10-11 14:24:25'),
(14, 66, 23, 'Gaurav Bhardwaj', '9955111070', 'They explored your business profile !', '1', '2023-10-11 00:00:00', '2023-10-11 17:52:44'),
(15, 86, 101, 'Komal', '9560558927', 'They explored your business profile !', '1', '2023-10-12 00:00:00', '2023-10-12 13:09:17'),
(16, 74, 101, 'Anupam Mishra', '9818165055', 'They explored your business profile !', '1', '2023-10-12 00:00:00', '2023-10-12 13:12:04'),
(17, 72, 102, 'Chandan Kumar', '9931530061', 'They explored your business profile !', '1', '2023-10-12 00:00:00', '2023-10-12 14:05:16'),
(18, 1, 103, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2023-10-12 00:00:00', '2023-10-12 14:19:32'),
(19, 63, 104, 'Rahul Soni', '1234567890', 'They explored your business profile !', '1', '2023-10-12 00:00:00', '2023-10-12 19:20:07'),
(20, 1, 107, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2023-10-12 00:00:00', '2023-10-12 20:01:57'),
(21, 88, 108, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '1', '2023-10-12 00:00:00', '2023-10-12 20:28:25'),
(22, 1, 109, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2023-10-12 00:00:00', '2023-10-12 21:18:30'),
(23, NULL, 109, 'Rahul soni', '958887256', 'All Ok', NULL, '2023-10-12 21:19:47', '2023-10-12 21:19:47'),
(24, 1, 108, 'Rahul soni', '9588871256', 'They explored your business profile !', '0', '2023-10-12 00:00:00', '2023-10-12 21:20:27'),
(25, 90, 108, 'Sonu Kumar', '9102840498', 'They explored your business profile !', '0', '2023-10-13 00:00:00', '2023-10-13 09:21:26'),
(26, 63, 108, 'Rahul Soni', '1234567890', 'They explored your business profile !', '0', '2023-10-13 00:00:00', '2023-10-13 10:57:36'),
(27, 72, 110, 'Chandan Kumar', '9931530061', 'They explored your business profile !', '1', '2023-10-13 00:00:00', '2023-10-13 12:35:04'),
(28, 72, 108, 'Chandan Kumar', '9931530061', 'They explored your business profile !', '0', '2023-10-13 00:00:00', '2023-10-13 12:40:04'),
(29, 63, 110, 'Rahul Soni', '1234567890', 'They explored your business profile !', '1', '2023-10-13 00:00:00', '2023-10-13 12:44:14'),
(30, 1, 108, 'Rahul soni', '9588871256', 'They explored your business profile !', '0', '2023-10-13 00:00:00', '2023-10-13 12:54:50'),
(31, 88, 108, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '0', '2023-10-13 00:00:00', '2023-10-13 14:46:40'),
(32, 88, 110, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '1', '2023-10-13 00:00:00', '2023-10-13 14:46:50'),
(33, 1, 109, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2023-10-13 00:00:00', '2023-10-13 15:08:33'),
(34, 1, 110, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2023-10-13 00:00:00', '2023-10-13 16:47:01'),
(35, 2, 108, 'Harshit Soni', '1234567899', 'They explored your business profile !', '1', '2023-10-13 00:00:00', '2023-10-13 19:44:02'),
(36, 96, 111, 'PRASHANT KUMAR', '7070704443', 'They explored your business profile !', '1', '2023-10-13 00:00:00', '2023-10-13 21:25:41'),
(37, 88, 111, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '1', '2023-10-13 00:00:00', '2023-10-13 21:26:44'),
(38, 63, 111, 'Rahul Soni', '1234567890', 'They explored your business profile !', '1', '2023-10-14 00:00:00', '2023-10-14 10:43:51'),
(39, 88, 110, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '1', '2023-10-14 00:00:00', '2023-10-14 10:52:26'),
(40, 88, 111, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '1', '2023-10-14 00:00:00', '2023-10-14 10:57:33'),
(41, 66, 110, 'Gaurav Bhardwaj', '9955111070', 'They explored your business profile !', '1', '2023-10-14 00:00:00', '2023-10-14 12:49:07'),
(42, 66, 111, 'Gaurav Bhardwaj', '9955111070', 'They explored your business profile !', '1', '2023-10-14 00:00:00', '2023-10-14 12:49:18'),
(43, 98, 110, 'khivraj sain', '7023021625', 'They explored your business profile !', '1', '2023-10-14 00:00:00', '2023-10-14 13:14:43'),
(44, 98, 111, 'khivraj sain', '7023021625', 'They explored your business profile !', '1', '2023-10-14 00:00:00', '2023-10-14 13:16:34'),
(45, 63, 110, 'Rahul Soni', '1234567890', 'They explored your business profile !', '1', '2023-10-14 00:00:00', '2023-10-14 18:08:43'),
(46, 63, 108, 'Rahul Soni', '1234567890', 'They explored your business profile !', '1', '2023-10-14 00:00:00', '2023-10-14 18:30:24'),
(47, 1, 111, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2023-10-15 00:00:00', '2023-10-15 10:27:45'),
(48, 1, 110, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2023-10-16 00:00:00', '2023-10-16 10:42:37'),
(49, 118, 108, 'Anish Kumar', '8340157167', 'They explored your business profile !', '1', '2023-10-17 00:00:00', '2023-10-17 12:26:03'),
(50, 88, 111, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '1', '2023-10-17 00:00:00', '2023-10-17 15:44:26'),
(51, 88, 108, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '1', '2023-10-17 00:00:00', '2023-10-17 16:18:52'),
(52, 88, 110, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '1', '2023-10-18 00:00:00', '2023-10-18 14:38:48'),
(53, 88, 108, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '1', '2023-10-18 00:00:00', '2023-10-18 14:41:01'),
(54, 63, 108, 'Rahul Soni', '1234567890', 'They explored your business profile !', '1', '2023-10-18 00:00:00', '2023-10-18 15:25:49'),
(55, 63, 110, 'Rahul Soni', '1234567890', 'They explored your business profile !', '1', '2023-10-18 00:00:00', '2023-10-18 15:26:27'),
(56, 120, 112, 'Rakesh Kumar', '7991101978', 'They explored your business profile !', '1', '2023-10-18 00:00:00', '2023-10-18 15:45:25'),
(57, 1, 112, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2023-10-18 00:00:00', '2023-10-18 15:46:01'),
(58, NULL, 112, 'Rakesh Kumar', '7991101978', 'Hello test message', '1', '2023-10-18 15:48:00', '2023-10-19 18:31:49'),
(59, 122, 112, 'Chandan Kumar', '7549254481', 'They explored your business profile !', '1', '2023-10-18 00:00:00', '2023-10-18 15:48:03'),
(60, 88, 112, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '1', '2023-10-18 00:00:00', '2023-10-18 15:49:45'),
(61, 1, 110, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2023-10-18 00:00:00', '2023-10-18 16:57:08'),
(62, 124, 113, 'SAURAV KUMAR', '8797009292', 'They explored your business profile !', '1', '2023-10-19 00:00:00', '2023-10-19 13:50:20'),
(63, 88, 113, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '1', '2023-10-19 00:00:00', '2023-10-19 13:54:10'),
(64, 1, 108, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2023-10-19 00:00:00', '2023-10-19 14:50:01'),
(65, 1, 111, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2023-10-19 00:00:00', '2023-10-19 14:50:34'),
(66, 126, 111, 'Leera', '9460949780', 'They explored your business profile !', '1', '2023-10-19 00:00:00', '2023-10-19 14:50:45'),
(67, 88, 114, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '1', '2023-10-19 00:00:00', '2023-10-19 14:57:23'),
(68, 130, 114, 'Gulshan Kumar', '7544813871', 'They explored your business profile !', '1', '2023-10-19 00:00:00', '2023-10-19 14:59:12'),
(69, 63, 110, 'Rahul Soni', '1234567890', 'They explored your business profile !', '1', '2023-10-19 00:00:00', '2023-10-19 15:12:03'),
(70, 1, 112, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2023-10-19 00:00:00', '2023-10-19 15:19:10'),
(71, 1, 110, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2023-10-19 00:00:00', '2023-10-19 15:27:11'),
(72, 132, 115, 'Dinkar bhardwaj', '9934071809', 'They explored your business profile !', '1', '2023-10-19 00:00:00', '2023-10-19 18:31:36'),
(73, 63, 111, 'Rahul Soni', '1234567890', 'They explored your business profile !', '1', '2023-10-19 00:00:00', '2023-10-19 16:04:03'),
(74, 134, 116, 'Vicky', '6202170035', 'They explored your business profile !', '0', '2023-10-19 00:00:00', '2023-10-19 16:05:28'),
(75, 136, 117, 'Amit agrawal', '7082420324', 'They explored your business profile !', '1', '2023-10-19 00:00:00', '2023-10-19 16:21:13'),
(76, 63, 108, 'Rahul Soni', '1234567890', 'They explored your business profile !', '1', '2023-10-19 00:00:00', '2023-10-19 17:46:01'),
(77, 63, 112, 'Rahul Soni', '1234567890', 'They explored your business profile !', '1', '2023-10-19 00:00:00', '2023-10-19 18:05:32'),
(78, 66, 118, 'Gaurav Bhardwaj', '9955111070', 'They explored your business profile !', '1', '2023-10-19 00:00:00', '2023-10-19 18:46:44'),
(79, 1, 118, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2023-10-19 00:00:00', '2023-10-19 18:51:07'),
(80, 138, 119, 'Anmol Ratan', '6200202863', 'They explored your business profile !', '0', '2023-10-19 00:00:00', '2023-10-19 19:13:50'),
(81, 63, 111, 'Rahul Soni', '1234567890', 'They explored your business profile !', '1', '2023-10-20 00:00:00', '2023-10-20 10:22:40'),
(82, 1, 112, 'Rahul soni', '9588871256', 'They explored your business profile !', '0', '2023-10-20 00:00:00', '2023-10-20 12:02:32'),
(83, 1, 109, 'Rahul soni', '9588871256', 'They explored your business profile !', '0', '2023-10-20 00:00:00', '2023-10-20 12:03:46'),
(84, 1, 108, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2023-10-20 00:00:00', '2023-10-20 12:13:10'),
(85, 1, 110, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2023-10-20 00:00:00', '2023-10-20 12:16:32'),
(86, 1, 111, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2023-10-20 00:00:00', '2023-10-20 12:16:43'),
(87, 1, 118, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2023-10-20 00:00:00', '2023-10-20 12:22:17'),
(88, 66, 118, 'Gaurav Bhardwaj', '9955111070', 'They explored your business profile !', '1', '2023-10-20 00:00:00', '2023-10-20 12:22:54'),
(89, 88, 118, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '1', '2023-10-20 00:00:00', '2023-10-20 12:31:12'),
(90, 66, 110, 'Gaurav Bhardwaj', '9955111070', 'They explored your business profile !', '1', '2023-10-20 00:00:00', '2023-10-20 12:43:29'),
(91, 88, 111, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '1', '2023-10-20 00:00:00', '2023-10-20 12:46:39'),
(92, 63, 118, 'Rahul Soni', '1234567890', 'They explored your business profile !', '1', '2023-10-21 00:00:00', '2023-10-21 10:13:55'),
(93, 2, 110, 'Harshit Soni', '1234567899', 'They explored your business profile !', '1', '2023-10-21 00:00:00', '2023-10-21 18:53:23'),
(94, 2, 118, 'Harshit Soni', '1234567899', 'They explored your business profile !', '1', '2023-10-21 00:00:00', '2023-10-21 18:53:34'),
(95, 2, 108, 'Harshit Soni', '1234567899', 'They explored your business profile !', '1', '2023-10-21 00:00:00', '2023-10-21 19:05:49'),
(96, 155, 120, 'Leera', '9638527410', 'They explored your business profile !', '1', '2023-10-23 00:00:00', '2023-10-23 12:10:34'),
(97, 63, 120, 'Rahul Soni', '1234567890', 'They explored your business profile !', '1', '2023-10-23 00:00:00', '2023-10-23 12:29:55'),
(98, 63, 110, 'Rahul Soni', '1234567890', 'They explored your business profile !', '1', '2023-10-23 00:00:00', '2023-10-23 12:31:07'),
(99, 1, 113, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2023-10-23 00:00:00', '2023-10-23 12:33:15'),
(100, 63, 111, 'Rahul Soni', '1234567890', 'They explored your business profile !', '1', '2023-10-23 00:00:00', '2023-10-23 12:33:18'),
(101, 63, 113, 'Rahul Soni', '1234567890', 'They explored your business profile !', '1', '2023-10-23 00:00:00', '2023-10-23 12:33:19'),
(102, 63, 118, 'Rahul Soni', '1234567890', 'They explored your business profile !', '1', '2023-10-23 00:00:00', '2023-10-23 12:33:20'),
(103, 155, 110, 'Leera', '9638527410', 'They explored your business profile !', '1', '2023-10-23 00:00:00', '2023-10-23 12:41:06'),
(104, 88, 108, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '1', '2023-10-23 00:00:00', '2023-10-23 15:02:26'),
(105, 88, 120, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '1', '2023-10-23 00:00:00', '2023-10-23 15:02:53'),
(106, 88, 110, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '1', '2023-10-23 00:00:00', '2023-10-23 15:03:34'),
(107, 88, 112, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '0', '2023-10-23 00:00:00', '2023-10-23 15:04:01'),
(108, 88, 118, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '1', '2023-10-25 00:00:00', '2023-10-25 05:33:02'),
(109, 66, 118, 'Gaurav Bhardwaj', '9955111070', 'They explored your business profile !', '1', '2023-10-25 00:00:00', '2023-10-25 05:36:04'),
(110, 66, 118, 'Gaurav Bhardwaj', '9955111070', 'They explored your business profile !', '1', '2023-10-26 00:00:00', '2023-10-26 16:48:56'),
(111, 126, 118, 'Leera', '9460949780', 'They explored your business profile !', '1', '2023-10-26 00:00:00', '2023-10-26 16:59:39'),
(112, 231, 121, 'VIBHAKAR AANAND', '7654419925', 'They explored your business profile !', '0', '2023-10-26 00:00:00', '2023-10-26 17:20:45'),
(113, 88, 121, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '0', '2023-10-26 00:00:00', '2023-10-26 18:02:35'),
(114, 88, 118, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '1', '2023-10-26 00:00:00', '2023-10-26 18:08:14'),
(115, 1, 113, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2023-10-26 00:00:00', '2023-10-26 18:09:31'),
(116, 1, 110, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2023-10-26 00:00:00', '2023-10-26 18:09:50'),
(117, 1, 111, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2023-10-26 00:00:00', '2023-10-26 18:09:59'),
(118, 88, 114, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '0', '2023-10-26 00:00:00', '2023-10-26 18:12:46'),
(119, 1, 108, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2023-10-26 00:00:00', '2023-10-26 18:23:29'),
(120, 232, 122, 'Krishna Kumar Sharma', '8877212928', 'They explored your business profile !', '1', '2023-10-26 00:00:00', '2023-10-26 21:25:53'),
(121, 88, 122, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '1', '2023-10-26 00:00:00', '2023-10-26 21:31:32'),
(122, 1, 113, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2023-10-27 00:00:00', '2023-10-27 15:36:38'),
(123, 1, 111, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2023-10-27 00:00:00', '2023-10-27 09:56:40'),
(124, NULL, 118, 'Ramesh Kumar Sharma', '7479732925', 'Group join', NULL, '2023-10-27 13:21:30', '2023-10-27 13:21:30'),
(125, 234, 123, 'Ajit kumar', '8051039412', 'They explored your business profile !', '0', '2023-10-27 00:00:00', '2023-10-27 15:10:45'),
(126, 236, 124, 'Sajid Ansari', '7479447908', 'They explored your business profile !', '0', '2023-10-27 00:00:00', '2023-10-27 15:29:25'),
(127, 88, 124, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '0', '2023-10-27 00:00:00', '2023-10-27 15:30:15'),
(128, 238, 123, 'Ravi Prakash', '8607769711', 'They explored your business profile !', '0', '2023-10-27 00:00:00', '2023-10-27 15:32:38'),
(129, 236, 123, 'Sajid Ansari', '7479447908', 'They explored your business profile !', '0', '2023-10-27 00:00:00', '2023-10-27 15:41:00'),
(130, 234, 124, 'Ajit kumar', '8051039412', 'They explored your business profile !', '0', '2023-10-27 00:00:00', '2023-10-27 15:42:46'),
(131, 88, 114, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '0', '2023-10-27 00:00:00', '2023-10-27 16:45:30'),
(132, 130, 114, 'Gulshan Kumar', '7544813871', 'They explored your business profile !', '0', '2023-10-27 00:00:00', '2023-10-27 16:50:45'),
(133, 88, 115, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '0', '2023-10-27 00:00:00', '2023-10-27 18:09:06'),
(134, 118, 111, '8340157167', '8340157167', 'They explored your business profile !', '1', '2023-10-28 00:00:00', '2023-10-28 14:15:22'),
(135, 118, 117, '8340157167', '8340157167', 'They explored your business profile !', '0', '2023-10-28 00:00:00', '2023-10-28 14:48:34'),
(136, 118, 118, '8340157167', '8340157167', 'They explored your business profile !', '1', '2023-10-28 00:00:00', '2023-10-28 15:10:44'),
(137, 88, 108, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '1', '2023-10-28 00:00:00', '2023-10-28 18:16:34'),
(138, 88, 114, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '0', '2023-10-30 00:00:00', '2023-10-30 18:12:11'),
(139, 88, 112, 'Nirmal Kumar', '6203321252', 'They explored your business profile !', '0', '2023-10-31 00:00:00', '2023-10-31 17:07:47'),
(140, 302, 110, 'Moti', '9155101046', 'They explored your business profile !', '1', '2023-11-01 00:00:00', '2023-11-01 19:41:35'),
(141, 234, 123, 'Ajit kumar', '8051039412', 'They explored your business profile !', '0', '2023-11-08 00:00:00', '2023-11-08 01:03:17'),
(142, 1, 108, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2024-03-11 00:00:00', '2024-03-11 14:41:08'),
(143, 1, 118, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2024-03-11 00:00:00', '2024-03-11 14:43:55'),
(144, 1, 110, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2024-03-11 00:00:00', '2024-03-11 15:58:11'),
(145, 1, 110, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2024-03-12 00:00:00', '2024-03-12 11:02:43'),
(146, 1, 111, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2024-03-12 00:00:00', '2024-03-12 11:05:09'),
(147, 1, 108, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2024-03-22 00:00:00', '2024-03-22 12:53:15'),
(148, 1, 113, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2024-03-22 00:00:00', '2024-03-22 12:53:34'),
(149, 1, 119, 'Rahul soni', '9588871256', 'They explored your business profile !', '0', '2024-03-22 00:00:00', '2024-03-22 12:54:58'),
(150, 1, 110, 'Rahul soni', '9588871256', 'They explored your business profile !', '1', '2024-04-25 00:00:00', '2024-04-25 16:58:46');

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE `master` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'Master',
  `title` varchar(255) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`id`, `type`, `title`, `value`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Master', 'category', 'category', NULL, 'Active', '2023-09-07 07:13:17', '2023-09-13 06:44:44'),
(5, 'Master', 'Placetype', 'Placetype', NULL, 'Active', '2023-09-11 10:04:45', '2023-09-11 10:13:00'),
(7, 'category', 'Hotel', 'fa-solid fa-hotel', '1694425238.jpg', 'Active', '2023-09-11 10:10:38', '2023-09-11 10:10:38'),
(8, 'category', 'Hospital', 'fa-solid fa-hospital', '1694425263.jpg', 'Active', '2023-09-11 10:11:03', '2023-09-11 10:11:03'),
(11, 'Master', 'Highlight', 'Highlight', NULL, 'Active', '2023-09-11 10:53:07', '2023-09-11 10:53:07'),
(18, 'Master', 'City', 'City', NULL, 'Active', '2023-09-11 11:07:15', '2023-09-11 11:07:15'),
(22, 'Master', 'bookingType', 'bookingType', NULL, 'Active', '2023-09-11 13:00:52', '2023-09-12 10:05:56'),
(26, 'bookingType', 'ty1', 'ty1', '1694511866.jpg', 'Active', '2023-09-12 10:14:26', '2023-09-12 10:14:26'),
(27, 'category', 'Gym', 'fa-solid fa-dumbbell', '1694604325.jpg', 'Active', '2023-09-13 11:55:25', '2023-09-13 11:55:25'),
(28, 'Master', 'blog_type', 'blog_type', NULL, 'Active', '2023-09-14 10:46:22', '2023-09-14 10:46:22'),
(29, 'blog_type', 'begusarai Blog 1', 'begusarai Blog 1', NULL, 'Active', '2023-09-14 10:46:55', '2023-09-14 10:46:55'),
(31, 'Master', 'Package', 'Package', NULL, 'Active', '2023-09-20 13:29:37', '2023-09-20 13:29:37'),
(34, 'Package', 'BUSINESS LISTING', 'BUSINESS LISTING', '1695272331.jpg', 'Active', '2023-09-21 05:28:51', '2023-09-21 05:28:51'),
(35, 'Package', 'FEATURED LISTING', 'FEATURED LISTING', '1695272350.jpg', 'Active', '2023-09-21 05:29:10', '2023-09-21 05:29:10'),
(37, 'Master', 'Homepage_popup', 'Homepage_popup', NULL, 'Active', '2023-09-21 12:25:13', '2023-09-21 12:25:13'),
(40, 'Highlight', 'Locker', 'Locker', NULL, 'Active', '2023-09-23 05:24:09', '2023-09-23 05:24:09'),
(41, 'Highlight', 'Gym Equipment for workout', 'Gym Equipment for workout', NULL, 'Active', '2023-09-23 05:24:22', '2023-09-23 05:24:22'),
(42, 'Highlight', 'Parking', 'Parking', NULL, 'Active', '2023-09-23 05:24:42', '2023-09-23 05:24:42'),
(43, 'Highlight', 'CCTV', 'CCTV', NULL, 'Active', '2023-09-23 05:24:54', '2023-09-23 05:24:54'),
(44, 'Highlight', 'Water Cooler', 'Water Cooler', NULL, 'Active', '2023-09-23 05:25:09', '2023-09-23 05:25:09'),
(45, 'Highlight', 'WiFi', 'WiFi', NULL, 'Active', '2023-09-23 05:25:18', '2023-09-23 05:25:18'),
(48, 'Package', 'Ranking', 'Ranking', '1695642020.jpeg', 'Active', '2023-09-25 12:10:20', '2023-09-25 12:10:20'),
(49, 'Master', 'FAQ', 'FAQ', NULL, 'Active', '2023-09-27 04:41:56', '2023-09-27 04:41:56'),
(51, 'FAQ', 'What is a listing website?', 'It\'s a platform that compiles and displays information about businesses, products, or services.', NULL, 'Active', '2023-09-27 04:44:45', '2023-09-27 04:44:45'),
(52, 'FAQ', 'How do I list my business?', 'Create an account, provide your business details, and submit for review.', NULL, 'Active', '2023-09-27 04:45:02', '2023-09-27 04:45:02'),
(53, 'FAQ', 'Is listing my business free?', 'Depends on the website, some offer free basic listings.', NULL, 'Active', '2023-09-27 04:45:27', '2023-09-27 04:45:27'),
(54, 'FAQ', 'How can users search for businesses?', 'Use the website\'s search bar to find what you need.', NULL, 'Active', '2023-09-27 04:45:46', '2023-09-27 04:45:46'),
(59, 'Master', 'Index_video', 'Index_video', NULL, 'Active', '2023-10-06 04:42:24', '2023-10-06 04:42:24'),
(60, 'Index_video', '1 Index Page Video', 'https://video.wixstatic.com/video/2b2e29_67857aa3bb16417ea7909ddc8d01b6e0/720p/mp4/file.mp4', NULL, 'Active', '2023-10-06 04:43:46', '2023-10-06 04:43:46'),
(61, 'Index_video', '2 Index Video', 'https://www.youtube.com/embed/jmlO6WPq8JI?si=DcQ-8d2PMryYBkI1', NULL, 'Active', '2023-10-06 04:58:55', '2023-10-06 04:58:55'),
(62, 'Index_video', '3 Index Video', 'https://www.youtube.com/embed/noNj8bkLJKI?si=El8kgdcpr7VAONuH', NULL, 'Active', '2023-10-06 04:58:55', '2023-10-06 04:58:55'),
(70, 'category', 'Restaurants', 'fa-solid fa-utensils', NULL, 'Active', '2023-10-04 03:57:50', '2023-10-04 03:57:50'),
(71, 'category', 'Cafe', 'fa-solid fa-mug-saucer', NULL, 'Active', '2023-10-04 04:01:59', '2023-10-04 04:01:59'),
(72, 'category', 'Press', 'fa-regular fa-newspaper', NULL, 'Active', '2023-10-04 04:02:31', '2023-10-04 04:02:31'),
(73, 'category', 'Mobile-Shop', 'fa-solid fa-mobile-screen-button', NULL, 'Active', '2023-10-04 04:02:59', '2023-10-04 04:02:59'),
(74, 'category', 'Digital-Marketing', 'fa-brands fa-digital-ocean', NULL, 'Active', '2023-10-04 04:03:48', '2023-10-04 04:03:48'),
(75, 'category', 'Tiles-Shop', 'fa-solid fa-shop', NULL, 'Active', '2023-10-04 04:04:46', '2023-10-04 04:04:46'),
(76, 'category', 'Delivery', 'fa-solid fa-truck-fast', NULL, 'Active', '2023-10-04 04:05:29', '2023-10-04 04:05:29'),
(77, 'category', 'Apartment', 'fa-regular fa-building', NULL, 'Active', '2023-10-04 04:06:33', '2023-10-04 04:06:33'),
(78, 'category', 'Pets', 'fa-solid fa-shield-cat', NULL, 'Active', '2023-10-04 04:07:23', '2023-10-04 04:07:23'),
(79, 'Master', 'ads_featured', 'ads_featured', NULL, 'Active', '2023-10-07 06:29:23', '2023-10-07 06:29:23'),
(93, 'ads_featured', 'Popup Ads', 'Popup Ads', NULL, 'Active', '2023-10-07 07:19:54', '2023-10-07 07:19:54'),
(94, 'ads_featured', 'Home Ads', 'Home Ads', NULL, 'Active', '2023-10-07 07:20:33', '2023-10-07 07:20:33'),
(96, 'City', 'Begusarai', 'Begusarai', '1697711942.png', 'Active', '2023-10-11 11:26:03', '2023-10-19 11:09:02'),
(99, 'Master', 'Village / Ward', 'Village / Ward', NULL, 'Active', '2023-10-11 12:50:42', '2023-10-11 12:55:37'),
(100, 'Master', 'Block', 'Block', NULL, 'Active', '2023-10-11 12:51:14', '2023-10-11 12:51:14'),
(101, 'Block', 'BEGUSARAI', 'BEGUSARAI', NULL, 'Active', '2023-10-11 12:52:30', '2023-10-11 12:52:30'),
(102, 'City', 'Barauni', 'Barauni', '1697712203.png', 'Active', '2023-10-11 13:20:12', '2023-10-19 11:13:23'),
(103, 'City', 'Matihani', 'Matihani', '1697711615.png', 'Active', '2023-10-11 13:20:39', '2023-10-19 11:03:35'),
(104, 'Placetype', 'HOSPITAL', 'HOSPITAL', NULL, 'Active', '2023-10-12 08:17:38', '2023-10-12 08:17:38'),
(105, 'Placetype', 'OFFICE', 'OFFICE', NULL, 'Active', '2023-10-13 06:52:00', '2023-10-13 06:52:00'),
(107, 'category', 'Computer-Shop', 'fa-solid fa-computer', NULL, 'Active', '2023-10-13 17:16:03', '2023-10-13 17:16:03'),
(108, 'category', 'CAR RENTAL', 'fa-solid fa-car', NULL, 'Active', '2023-10-13 17:21:15', '2023-10-13 17:21:15'),
(109, 'category', 'PET SHOP', 'fa-solid fa-paw', NULL, 'Active', '2023-10-13 18:41:38', '2023-10-13 18:41:38'),
(110, 'category', 'SCHOOL', 'fa-solid fa-school', NULL, 'Active', '2023-10-13 18:44:33', '2023-10-13 18:44:33'),
(111, 'category', 'CAR INSURANCE AGENT', 'fa-solid fa-car-burst', NULL, 'Active', '2023-10-13 18:46:33', '2023-10-13 18:46:33'),
(112, 'category', 'BIKE INSURANCE', 'fa-solid fa-motorcycle', NULL, 'Active', '2023-10-13 18:47:59', '2023-10-13 18:47:59'),
(113, 'category', 'HEALTH INSURANCE', 'fa-solid fa-notes-medical', NULL, 'Active', '2023-10-13 18:49:16', '2023-10-13 18:49:16'),
(114, 'category', 'LIFE INSURANCE', 'fa-solid fa-people-roof', NULL, 'Active', '2023-10-13 18:53:30', '2023-10-13 18:53:30'),
(115, 'category', 'MUSIC CLASS', 'fa-solid fa-music', NULL, 'Active', '2023-10-13 18:54:57', '2023-10-13 18:54:57'),
(116, 'category', 'PHOTO STUDIO', 'fa-solid fa-camera', NULL, 'Active', '2023-10-13 18:56:44', '2023-10-13 18:56:44'),
(117, 'category', 'CSC', 'fa-solid fa-circle-info', NULL, 'Active', '2023-10-18 10:38:54', '2023-10-18 10:38:54'),
(118, 'category', 'CAR-SERVICE-CENTER', 'fa-solid fa-car', NULL, 'Active', '2023-10-19 08:04:48', '2023-10-19 10:29:37'),
(119, 'Placetype', 'SERVICE CENTER', 'SERVICE CENTER', NULL, 'Active', '2023-10-19 08:05:37', '2023-10-19 08:05:37'),
(120, 'category', 'GIFT-SHOP', 'fa-solid fa-gift', NULL, 'Active', '2023-10-19 09:17:38', '2023-10-19 09:33:15'),
(121, 'category', 'COSMETIC-SHOP', 'fa-solid fa-shop', NULL, 'Active', '2023-10-19 09:19:22', '2023-10-19 10:29:16'),
(122, 'Placetype', 'SHOP', 'SHOP', NULL, 'Active', '2023-10-19 09:20:55', '2023-10-19 09:20:55'),
(123, 'category', 'BIKE-SERVICE-CENTER', 'fa-solid fa-motorcycle', NULL, 'Active', '2023-10-19 10:29:06', '2023-10-19 10:29:06'),
(124, 'category', 'CLOTH-SHOP', 'fa-solid fa-shirt', NULL, 'Active', '2023-10-19 10:45:24', '2023-10-19 10:45:24'),
(125, 'Placetype', 'SHOWROOM', 'SHOWROOM', NULL, 'Active', '2023-10-19 10:46:01', '2023-10-19 10:46:01'),
(126, 'category', 'SALON', 'fa-solid fa-scissors', NULL, 'Active', '2023-10-19 13:34:45', '2023-10-19 13:34:45'),
(127, 'Placetype', 'BEAUTY PARLOUR', 'BEAUTY PARLOUR', NULL, 'Active', '2023-10-19 13:35:31', '2023-10-19 13:35:31'),
(128, 'category', 'AUTO-PARTS', 'fa-solid fa-screwdriver-wrench', NULL, 'Active', '2023-10-26 11:38:07', '2023-10-26 12:34:12'),
(129, 'category', 'CLEANING-PRODUCT', 'fa-solid fa-hand-sparkles', NULL, 'Active', '2023-10-26 15:44:37', '2023-10-26 15:44:48'),
(130, 'Placetype', 'RESTAURANTS', 'RESTAURANTS', NULL, 'Active', '2023-10-27 09:37:11', '2023-10-27 09:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_07_08_141130_create_admins_table', 2),
(6, '2020_07_08_145603_create_permission_tables', 3),
(7, '2014_10_12_100000_create_password_resets_table', 4),
(8, '2019_02_02_112609_create_settings_table', 4),
(9, '2014_10_12_000000_create_users_table', 5),
(10, '2016_06_01_000001_create_oauth_auth_codes_table', 6),
(11, '2016_06_01_000002_create_oauth_access_tokens_table', 6),
(12, '2016_06_01_000003_create_oauth_refresh_tokens_table', 6),
(13, '2016_06_01_000004_create_oauth_clients_table', 6),
(14, '2016_06_01_000005_create_oauth_personal_access_clients_table', 6),
(16, '2020_07_12_220312_create_blogs_table', 7),
(17, '2023_09_04_142515_master', 8),
(18, '2023_09_22_110127_create_sessions_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('027ae400a8e608d36a65b1fcc48c85aec9f532a63339286a94fc5e06b1bc8b42e531232518a8118e', 1, 4, 'adminApiToken', '[]', 0, '2020-10-14 09:04:15', '2020-10-14 09:04:15', '2021-10-14 14:34:15'),
('035f1b87c774ef0810d686008d434310707a675ab27d5229dcbba03ec4cc6e17784e1b385df8c396', 2, 4, 'adminApiToken', '[]', 0, '2023-10-13 14:11:45', '2023-10-13 14:11:45', '2024-10-13 19:41:45'),
('0566b3820e43c974b784e09c226eecb6678c986461040286cf917f073c1191ea2df149cc9871587e', 1, 4, 'adminApiToken', '[]', 0, '2023-10-12 15:31:58', '2023-10-12 15:31:58', '2024-10-12 21:01:58'),
('059febaacfddcc26906004f78638a612facca528ac82cbd117d24058d65010e8f9552e67e094023d', 1, 4, 'adminApiToken', '[]', 0, '2023-09-28 09:54:59', '2023-09-28 09:54:59', '2024-09-28 15:24:59'),
('0d1b46884196f04c18e195a6e63ac0a0facb1c5cc808a9f528032c6510ec875fb9207caeea006ef4', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 11:06:32', '2023-09-04 11:06:32', '2024-09-04 16:36:32'),
('0fb41667a64d9102657ea5c47af90a1be30ecf6da5cd749ea2d33fe6fddcafbbb0c9ef5a9be4eb0e', 1, 4, 'adminApiToken', '[]', 0, '2023-10-04 06:48:48', '2023-10-04 06:48:48', '2024-10-04 12:18:48'),
('1329a57bf5d2dcda3a89148de458866b3960b58420db4f5ac2586a26b9febb950a2781771d533da5', 1, 4, 'adminApiToken', '[]', 0, '2023-10-12 13:48:40', '2023-10-12 13:48:40', '2024-10-12 19:18:40'),
('139d21c37f0674d78a17e39b8f3b8107cb69fd8e3721797ca698d06f0517297620ea5cb09b706498', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 07:38:34', '2023-09-04 07:38:34', '2024-09-04 13:08:34'),
('147f7fdacd0f0a5766b3fa966416466078cb7dba789ff3ed0b4074116e26e11205621b394f13e27d', 2, 4, 'adminApiToken', '[]', 0, '2024-03-30 06:49:25', '2024-03-30 06:49:25', '2025-03-30 12:19:25'),
('19f8ffa2da5e7d2cf2b339035dcaf5b150cb77df4dfd2c18388b6aed2b40b9893b5d1b4edae08f41', 1, 4, 'adminApiToken', '[]', 0, '2023-10-13 13:28:50', '2023-10-13 13:28:50', '2024-10-13 18:58:50'),
('1c60286653e8a67029dce7057ee1a8f5e84db64f8aa6ece2555122a351fd3840546136fb72aa679f', 1, 4, 'adminApiToken', '[]', 0, '2023-09-15 12:11:36', '2023-09-15 12:11:36', '2024-09-15 17:41:36'),
('1c732a1ee5156d2a1416e80fd7e4e6cfff499480762c26808d02cd55537f2b112f30c60656c01c9c', 1, 4, 'adminApiToken', '[]', 0, '2023-10-13 11:36:47', '2023-10-13 11:36:47', '2024-10-13 17:06:47'),
('1cb098dd006c584d3241b8173dfb442b8eb7e3b6c46d6b64e67e968933ab23e16ac4713d5a8fafaf', 1, 4, 'adminApiToken', '[]', 0, '2023-10-13 05:03:30', '2023-10-13 05:03:30', '2024-10-13 10:33:30'),
('1dc6199bff12eda56651b074bb2ccb6bc595b6f6c474141f8602491fc971ce545fd16e2604c44c5a', 1, 4, 'adminApiToken', '[]', 0, '2023-09-08 10:28:41', '2023-09-08 10:28:41', '2024-09-08 15:58:41'),
('1edda5920e8507705c3d3f1d7c184a0aaf4d5450bae495abca5a784ce053e5bb0e1254669e1de016', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 06:19:05', '2023-09-04 06:19:05', '2024-09-04 11:49:05'),
('1f611cf767e0717f37612177d924988ae8fd3d2a6786ac25eb3852526bc29922033760a1add9b21a', 1, 4, 'adminApiToken', '[]', 0, '2023-10-12 16:13:36', '2023-10-12 16:13:36', '2024-10-12 21:43:36'),
('2b3fc0b63197dcfd339fc97c87689626b8bc3fe0a67c91f66b91b47c647eb9bcfb6433cbb484c430', 1, 4, 'adminApiToken', '[]', 0, '2024-03-31 18:26:20', '2024-03-31 18:26:20', '2025-03-31 23:56:20'),
('2d47350abf16dce1c5cf9e2c12fcae8f02e69be34f553b972006ac83430c22dbfe08df7252b30ace', 1, 4, 'adminApiToken', '[]', 0, '2023-10-16 04:37:14', '2023-10-16 04:37:14', '2024-10-16 10:07:14'),
('2ecd645d914c7261c8d7ec1aa0a95349fb4b469e59a499406a659ea6f5bb09c846ef3386ae8f5d00', 1, 4, 'adminApiToken', '[]', 0, '2023-09-08 05:06:14', '2023-09-08 05:06:14', '2024-09-08 10:36:14'),
('2fbba7fceb055e6575e671c0f7b10a91edd839261e260471611139fbc100961402c4c4c7430341de', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 06:03:02', '2023-09-04 06:03:02', '2024-09-04 11:33:02'),
('30157c3e8deccfa62315c7148854169a64c3920c97a4b545e2f6be06b5309a7564de8e9d76d699a2', 1, 4, 'adminApiToken', '[]', 0, '2023-09-07 04:38:09', '2023-09-07 04:38:09', '2024-09-07 10:08:09'),
('3133e099ade8d81d2a353709415e323e6592c3af42f775ad80c7a769c40ed14ed720b0182172c528', 1, 4, 'adminApiToken', '[]', 0, '2023-09-19 05:42:59', '2023-09-19 05:42:59', '2024-09-19 11:12:59'),
('313fcbd98202b2ddb797cde21785740199f828cbfdea01a4ffa90a3b6523be68472d4b336eb9824d', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 09:46:21', '2023-09-04 09:46:21', '2024-09-04 15:16:21'),
('323fe9be4ca1fbca1aadffe73e48d7cc974c661c17b27e7210af68495a7938d4caf9acef98381b59', 1, 4, 'adminApiToken', '[]', 0, '2023-09-28 13:10:45', '2023-09-28 13:10:45', '2024-09-28 18:40:45'),
('332d091d99ce3d6f48e42b5344040e8e2ba766a2e0c4cbbdeef94a8d097225bd46775342337253a8', 2, 4, 'adminApiToken', '[]', 0, '2023-10-14 05:15:00', '2023-10-14 05:15:00', '2024-10-14 10:45:00'),
('3330711e1b347c4b44f47f93b6adec20e9a72babb8ba981279c872fc38abf059251834eed679eca7', 1, 4, 'adminApiToken', '[]', 0, '2023-09-21 05:15:18', '2023-09-21 05:15:18', '2024-09-21 10:45:18'),
('33ddff91c753505f67d796e6706e11c90c65a25cdfb215e0e74ea8a77bd44177929cac01bcfbd602', 1, 4, 'adminApiToken', '[]', 0, '2023-10-11 11:38:16', '2023-10-11 11:38:16', '2024-10-11 17:08:16'),
('34cfca8b577333694edb5d4a43e45503ca2478f916462fe0c4d3c64a66dfb59f222dc11b06849cf7', 2, 1, 'userApiToken', '[]', 0, '2020-07-18 11:47:50', '2020-07-18 11:47:50', '2021-07-18 17:17:50'),
('352d7c649da24b327a050b7b509d159b08bac25d60b9bd3816e734d99a5d56598a67742ecb115cf1', 1, 4, 'adminApiToken', '[]', 0, '2023-09-20 04:42:53', '2023-09-20 04:42:53', '2024-09-20 10:12:53'),
('36505c2166a1c67b16644275809a47d216d3f5a57d30d7f21b1e9c27204138aed62b2dce01014d6c', 1, 4, 'adminApiToken', '[]', 0, '2023-09-25 04:45:34', '2023-09-25 04:45:34', '2024-09-25 10:15:34'),
('37685fbe1d7f5a9520785fdb5fc643601241490e254dae8d749a918e595e3d687d8fe9342b0f5d74', 1, 4, 'adminApiToken', '[]', 0, '2023-09-11 04:50:18', '2023-09-11 04:50:18', '2024-09-11 10:20:18'),
('38fe263b1b62877d4e7c153bae2d382674fb6939273cbd212e7be713cb69b605bb1ce242794a50d5', 1, 4, 'adminApiToken', '[]', 0, '2023-10-06 04:35:30', '2023-10-06 04:35:30', '2024-10-06 10:05:30'),
('3a05d789232b5c8cb41eab593bde7bd20b371fafc80c0ad329af161cba147cb1a03b91cbe55177ec', 1, 4, 'adminApiToken', '[]', 0, '2023-10-12 09:05:10', '2023-10-12 09:05:10', '2024-10-12 14:35:10'),
('40d949ec1e4005369183121030e1926d19f67fe76ce7880fd70cb61bb36f44f6e14ef01f91dac974', 1, 4, 'adminApiToken', '[]', 0, '2023-09-06 09:23:19', '2023-09-06 09:23:19', '2024-09-06 14:53:19'),
('496f936f339a448bca78e588744ce38817d34bea877155aa39d550b4be2c2ae59f670094a59d527b', 1, 4, 'adminApiToken', '[]', 0, '2023-10-20 06:51:28', '2023-10-20 06:51:28', '2024-10-20 12:21:28'),
('4a14a5ba3196321ac55e32d7711d5ed16353e85df5721c6b3a4ec72b6748f47263eca0f4cd16db96', 1, 4, 'adminApiToken', '[]', 0, '2023-10-11 11:22:25', '2023-10-11 11:22:25', '2024-10-11 16:52:25'),
('4a58ac7d639bf5979575952f0d5462d4db0d68ce827b7a44263bf7de507763fda8771c1fc33e0b30', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 08:47:11', '2023-09-04 08:47:11', '2024-09-04 14:17:11'),
('4a78629efb0c66ea1e54c118b3766fd93ddbf027e2e9ad7ffd1aece705205bbac3c564565d8fe398', 1, 4, 'adminApiToken', '[]', 0, '2023-09-14 05:39:27', '2023-09-14 05:39:27', '2024-09-14 11:09:27'),
('4e1aa134da6e125a68e7516c916ac5fd1f9f74dff13e2483f6366c0c83bddab4ab4221837b7238b4', 2, 4, 'adminApiToken', '[]', 0, '2023-10-23 06:25:31', '2023-10-23 06:25:31', '2024-10-23 11:55:31'),
('5469be33227863d9056ec0d8508bc70b22ea0b3ae16da2500fb9dfa3db1f8377e512f07a967f7186', 1, 4, 'adminApiToken', '[]', 0, '2023-09-21 08:48:07', '2023-09-21 08:48:07', '2024-09-21 14:18:07'),
('55f9326aea22d0ad8a365398a81225484943154fc883b11343b25f69507062b24ff60635143e4925', 1, 4, 'adminApiToken', '[]', 0, '2023-09-07 06:56:15', '2023-09-07 06:56:15', '2024-09-07 12:26:15'),
('5d6f742b7000a3cc45e7570a6fc47e0142c29df578f5901c36f7915be142ab7ddb9c16ce20ce9bd3', 2, 4, 'adminApiToken', '[]', 0, '2023-10-15 02:51:06', '2023-10-15 02:51:06', '2024-10-15 08:21:06'),
('5f1b7c00c578d542f9a0f9ea876f8be6fca9eff99ba52b813d655a778c988bed0c1273452b014f29', 1, 4, 'adminApiToken', '[]', 0, '2023-09-23 05:16:28', '2023-09-23 05:16:28', '2024-09-23 10:46:28'),
('5f5c7de7ec8806f50bdcddd7b69c50fcbe699670a86c70867783a6fc3f15e534952105616c31e0e7', 2, 4, 'adminApiToken', '[]', 0, '2023-10-27 10:09:24', '2023-10-27 10:09:24', '2024-10-27 15:39:24'),
('625ab89581817b3f756b06203741d8ba93b184317cb986fb2c1c060a2c576bcfae06953fbcc79ef5', 1, 4, 'adminApiToken', '[]', 0, '2023-09-12 09:52:37', '2023-09-12 09:52:37', '2024-09-12 15:22:37'),
('66fb6ca6ef6047a1c9fa13f3c794c5c312b42d24edb0e885444e5fccb150e870d66de27959000991', 1, 4, 'adminApiToken', '[]', 0, '2023-10-13 13:08:58', '2023-10-13 13:08:58', '2024-10-13 18:38:58'),
('67cba7b98c79510c5fac62493938fa857b1cf00da731c40c852ec4949f04be06e0dd476a84d94f8f', 1, 4, 'adminApiToken', '[]', 0, '2020-09-27 10:50:50', '2020-09-27 10:50:50', '2021-09-27 16:20:50'),
('6833585331c64557a2ed01ea87567c6b4601eee129193111f01725cff2b1ed5f5b147c903ac20c3d', 1, 4, 'adminApiToken', '[]', 0, '2023-09-15 12:07:14', '2023-09-15 12:07:14', '2024-09-15 17:37:14'),
('6ac3e9a0957af90161fe2a186d5d7521a6bd933308ea41e7dc5f79f72944c0ab1c35ab3fc67d6105', 1, 4, 'adminApiToken', '[]', 0, '2023-10-12 15:26:01', '2023-10-12 15:26:01', '2024-10-12 20:56:01'),
('6b2c2d1ba407c89557e9372a0f813bc070ba242cc5a60292e381f4899cb554eb4694c3429c184680', 1, 4, 'adminApiToken', '[]', 0, '2023-09-08 05:03:07', '2023-09-08 05:03:07', '2024-09-08 10:33:07'),
('6c499106b84461888f3563bc2ca0166ef9595da9e8b2a98ce92641c1d50f05c0e747bc11e1935daf', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 06:03:31', '2023-09-04 06:03:31', '2024-09-04 11:33:31'),
('6d93297e379e0137a94655f3ddbfef983b2b38f225e618666a61bfeabc368b6112f75830566178b2', 1, 4, 'adminApiToken', '[]', 0, '2023-09-13 10:48:04', '2023-09-13 10:48:04', '2024-09-13 16:18:04'),
('6f8b1567811d785614a045204709d7d3166a2b76a1a1075d8a01c05951d6a64737aa1206ab8f81e5', 1, 4, 'adminApiToken', '[]', 0, '2023-09-08 04:54:33', '2023-09-08 04:54:33', '2024-09-08 10:24:33'),
('7237fb3309a1f9fbdc368aae545772945a3a9717ea3dfbe9fc462eb16d33146ce199f410d39626b5', 1, 4, 'adminApiToken', '[]', 0, '2023-09-15 12:13:14', '2023-09-15 12:13:14', '2024-09-15 17:43:14'),
('72619892c8310ec3fb3d1c00dfc42a9226715a2a3ac4c2e6eba9052c899a1697de0c58c5a13996cb', 1, 4, 'adminApiToken', '[]', 0, '2023-10-11 11:44:09', '2023-10-11 11:44:09', '2024-10-11 17:14:09'),
('72b5711d7a2d92c9a272f215b739ea3afef71b3571567acc342c20f4245626ebb5607a30df4e955f', 2, 4, 'adminApiToken', '[]', 0, '2024-03-18 05:12:01', '2024-03-18 05:12:01', '2025-03-18 10:42:01'),
('7427953d964857ff674ed5852a74e93a014340c094bb3657cb2dc83e906c0249144eafa1c780c75f', 2, 4, 'adminApiToken', '[]', 0, '2024-05-06 10:20:56', '2024-05-06 10:20:56', '2025-05-06 15:50:56'),
('74dde390ef0dfe1e0bb5969e8cea0eccf2a1899b3ffb04cea97af5d7967d301d1877aaf44178fb84', 2, 4, 'adminApiToken', '[]', 0, '2023-10-12 15:12:06', '2023-10-12 15:12:06', '2024-10-12 20:42:06'),
('74ff4b70b41833ab81203a2a2141c327739032770ed25dd3c6cf689fd475d578a0f50427539592d0', 1, 4, 'adminApiToken', '[]', 0, '2023-09-18 05:29:36', '2023-09-18 05:29:36', '2024-09-18 10:59:36'),
('77b00e1bc1b67d5485699227743fce9a373be306981b4e5609c5cf1de4ab7b0bf49e74924503f866', 2, 4, 'adminApiToken', '[]', 0, '2023-10-11 10:50:33', '2023-10-11 10:50:33', '2024-10-11 16:20:33'),
('77e00bb4c445d82f6fa939489cc7ecf0a1f5203a5916b7946ef97816b41ae6703df53bfb679ccbef', 1, 4, 'adminApiToken', '[]', 0, '2023-09-07 05:05:11', '2023-09-07 05:05:11', '2024-09-07 10:35:11'),
('7e0e53353cbdb040e993cff65816b4dd41221139351c507451e34ac7e3301ebf39646a4f3260d791', 1, 4, 'adminApiToken', '[]', 0, '2023-10-13 11:20:29', '2023-10-13 11:20:29', '2024-10-13 16:50:29'),
('8126bf299d71105d4936a847f49f46fe1bd5a34bcf56f018719291091e183de993a32a412705e80a', 1, 4, 'adminApiToken', '[]', 0, '2023-10-11 08:53:38', '2023-10-11 08:53:38', '2024-10-11 14:23:38'),
('82792ebdd1f5cc9101807cf78605dd4133aa3830f1a1ada162b02a0682caf79b5f1435efce339340', 2, 4, 'adminApiToken', '[]', 0, '2024-05-07 05:18:14', '2024-05-07 05:18:14', '2025-05-07 10:48:14'),
('864703c0946a4289699c76235a5e29763311b232604d9e934a2806f5e7225d073003a8c3d28eedfd', 2, 4, 'adminApiToken', '[]', 0, '2024-03-11 12:13:04', '2024-03-11 12:13:04', '2025-03-11 17:43:04'),
('88cf5da31e2e53a53ea50c1307b5d6e50791db94cc3726f64d525b258d2f31baad5667cfe4c0f666', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 07:15:09', '2023-09-04 07:15:09', '2024-09-04 12:45:09'),
('8ca3f8184b4b39115c3e1b55481e7aae525b69379b83fea4d5df554753edc7068a15dd514d28ce79', 1, 4, 'adminApiToken', '[]', 0, '2023-10-13 04:34:23', '2023-10-13 04:34:23', '2024-10-13 10:04:23'),
('8ca9c7a59c255da4421750126604b67611a5f042ef67cb6434c4989faf323adef65827fbcb5b37f1', 2, 4, 'adminApiToken', '[]', 0, '2023-10-14 05:40:40', '2023-10-14 05:40:40', '2024-10-14 11:10:40'),
('8e1fca4de020059619ccb40325797cef61c3f1c7e9d26cc492583d32d387d18cc544d7f41bc4db74', 1, 4, 'adminApiToken', '[]', 0, '2023-09-27 08:52:25', '2023-09-27 08:52:25', '2024-09-27 14:22:25'),
('8eab6ab069337d89a2d71d085870a7897fb49b9cfa5be53fcaa0009f33a92c539ea80ddc040853e5', 2, 4, 'adminApiToken', '[]', 0, '2023-10-15 02:50:21', '2023-10-15 02:50:21', '2024-10-15 08:20:21'),
('8ecb0ad88ca8c40c165fc329039c7d0f6cd801b599398122da8f0bd464835b0f53a21427bebf77c1', 1, 4, 'adminApiToken', '[]', 0, '2023-09-16 05:33:03', '2023-09-16 05:33:03', '2024-09-16 11:03:03'),
('9015560a924cf2298e9e3fd93f5b291f77a37a68975702850a5523235cea502add8f145b905cacf1', 1, 4, 'adminApiToken', '[]', 0, '2023-09-09 04:42:43', '2023-09-09 04:42:43', '2024-09-09 10:12:43'),
('903e239be1d9f9a94f34be8fda30590e455d3150950cf0009155581e60d01f4e365efce40eada9e1', 1, 4, 'adminApiToken', '[]', 0, '2023-10-07 06:36:49', '2023-10-07 06:36:49', '2024-10-07 12:06:49'),
('90b2a9eea15c78b345d7f2f7d726e2c0770972cdf896dc2c97e3bb61d80c08a4959c9369677e1163', 2, 4, 'adminApiToken', '[]', 0, '2024-03-30 11:26:25', '2024-03-30 11:26:25', '2025-03-30 16:56:25'),
('915f3caba9784ddd1ab83d494cad4eae1e095ee89716759bea0d88eb13f84a74120eab973650a909', 2, 4, 'adminApiToken', '[]', 0, '2024-03-31 07:37:28', '2024-03-31 07:37:28', '2025-03-31 13:07:28'),
('9290693223537412fe9056ccf9c11e166e80c3a27540051ee459d8bf3eb688aabeec047fd29bd99f', 1, 4, 'adminApiToken', '[]', 0, '2023-09-27 04:40:06', '2023-09-27 04:40:06', '2024-09-27 10:10:06'),
('92d0a713ec1ba65291849728c8eff0e33e7aea9afa9438d684ed0c73c4429a305a83e8dcf265dce1', 1, 4, 'adminApiToken', '[]', 0, '2023-09-07 04:54:49', '2023-09-07 04:54:49', '2024-09-07 10:24:49'),
('9947a6796ef38a49523dbf4d30c766c4dc8550d181e1a84e5fa71f63c64a9e9d37eb6e515bad0f4e', 2, 4, 'adminApiToken', '[]', 0, '2023-10-13 08:38:22', '2023-10-13 08:38:22', '2024-10-13 14:08:22'),
('99c6caab848019bfa8998a2835c52f5eb4168da670f4595bd341b812cb531ad65c332bf0f2293ff6', 1, 4, 'adminApiToken', '[]', 0, '2023-10-23 04:40:45', '2023-10-23 04:40:45', '2024-10-23 10:10:45'),
('9ad5d82c8aa935e7646d8ae22779b3c8c603dfc162a9888a45a6d14ab5c61623ac551360ec3fee77', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 11:29:43', '2023-09-04 11:29:43', '2024-09-04 16:59:43'),
('9c2b8d8dcdec09b283ed462d6f8e8bc8c0610e338478859b1625cd7fc73671b0e77bc7373aedf138', 2, 4, 'adminApiToken', '[]', 0, '2023-10-11 11:30:39', '2023-10-11 11:30:39', '2024-10-11 17:00:39'),
('9daa0d7ac946665c7b873ed28742f5bbb7077c49f77b5de91608acd3d3a9e40a4607f8f0cc805eed', 1, 4, 'adminApiToken', '[]', 0, '2023-10-07 06:39:04', '2023-10-07 06:39:04', '2024-10-07 12:09:04'),
('a419addf4ae7bea31145205699c7e95182f9c9957068f6e32554187ab3f7980bc5374635df10a69f', 1, 4, 'adminApiToken', '[]', 0, '2020-09-28 06:46:49', '2020-09-28 06:46:49', '2021-09-28 12:16:49'),
('a5690d0e04bf30f3ddf4cbf25f83082c7560587f54aad60e87b8a7735fb300aa29532908f16313c9', 1, 4, 'adminApiToken', '[]', 0, '2023-09-28 04:32:12', '2023-09-28 04:32:12', '2024-09-28 10:02:12'),
('a57f85a5537bdbc54917992db6394a7e0250b7ba4b79d2e90abc6bf51c79237cb1bef6fabdbcf445', 1, 4, 'adminApiToken', '[]', 0, '2023-10-11 11:23:42', '2023-10-11 11:23:42', '2024-10-11 16:53:42'),
('a6236782ee5a24d3bfc88bbd7e050bef2a3937706f206c4bcb3bf3d99127ada79b9512d4517df2a2', 1, 4, 'adminApiToken', '[]', 0, '2023-09-07 04:41:37', '2023-09-07 04:41:37', '2024-09-07 10:11:37'),
('a63a5ed742a080a9d8cf1379aa60e1ba0b0fbc087ffea1e858144bf92f87931119eedd334ace7ffb', 1, 4, 'adminApiToken', '[]', 0, '2020-10-15 05:50:50', '2020-10-15 05:50:50', '2021-10-15 11:20:50'),
('aa575f80514de59f5d01faf86c533a568e3f01e675f30d129962a118849c936d9cb7514139fcc645', 1, 4, 'adminApiToken', '[]', 0, '2023-10-14 12:39:22', '2023-10-14 12:39:22', '2024-10-14 18:09:22'),
('ab09563fd805d57dc698103035caa419b87a8872d5058901a99919a6770865ef4d1eb0030b7a0f7c', 1, 1, 'userApiToken', '[]', 0, '2020-07-18 11:43:13', '2020-07-18 11:43:13', '2021-07-18 17:13:13'),
('ada43edc57c17b03d305af479f98b76f9d30e779b4194df589f90c3033d67a16028e59c464b27d6d', 1, 4, 'adminApiToken', '[]', 0, '2023-10-26 11:28:50', '2023-10-26 11:28:50', '2024-10-26 16:58:50'),
('b20f90b4a31c34c9b94b5e7fbc9d87165a6733a875fc44ba09ab62b896421833fd99cc51c9881e84', 1, 4, 'adminApiToken', '[]', 0, '2023-10-14 04:28:15', '2023-10-14 04:28:15', '2024-10-14 09:58:15'),
('b4b3442ea3870bdd30a7e53ebd38a2b5f833ad595cf35bb5783265dfda5132b5fb1e0d5dc75b859f', 1, 4, 'adminApiToken', '[]', 0, '2023-10-18 09:55:36', '2023-10-18 09:55:36', '2024-10-18 15:25:36'),
('b53566c4f7eb7b959158a039586dedebfce136e00d79bcd77ebeef59805412b761fa5b88e0e6e965', 2, 4, 'adminApiToken', '[]', 0, '2023-10-14 09:04:35', '2023-10-14 09:04:35', '2024-10-14 14:34:35'),
('b5e8325cb7b60dadd292ca258c4a7e02acef0ad3e0719a92003b078a1099998809d09beef6756d90', 2, 4, 'adminApiToken', '[]', 0, '2023-10-11 11:03:02', '2023-10-11 11:03:02', '2024-10-11 16:33:02'),
('b73a6f76e4e798d2fb7588bd96ce31526da9a17ec33aacdb51665da68e9f81bd8355440bed435948', 1, 4, 'adminApiToken', '[]', 0, '2023-09-29 09:35:49', '2023-09-29 09:35:49', '2024-09-29 15:05:49'),
('ba4c228eff0f5ca4fabd97742bcfaa16594249df850490bbf1035a18a854a1d896bde0d50404d62a', 1, 4, 'adminApiToken', '[]', 0, '2023-10-13 12:19:14', '2023-10-13 12:19:14', '2024-10-13 17:49:14'),
('babe7b037cf8dc18419801db226424646fd74f90bd719494f7b53acaf6101075ca882c684307fa06', 1, 4, 'adminApiToken', '[]', 0, '2023-10-12 05:49:56', '2023-10-12 05:49:56', '2024-10-12 11:19:56'),
('bb42f06a00a887377a917efd4b8cc381c39b9a18d9d55ea457976b6deaab1b50a18f8545d407ddab', 1, 4, 'adminApiToken', '[]', 0, '2020-09-27 11:51:14', '2020-09-27 11:51:14', '2021-09-27 17:21:14'),
('bf1f27177d8d923cdab1009e29592799cd1fc5f6f387dde919b2aa7280e796170d3a1af4324510d8', 2, 4, 'adminApiToken', '[]', 0, '2023-10-11 11:25:40', '2023-10-11 11:25:40', '2024-10-11 16:55:40'),
('c1cbc1015139db38749db88f3343942ad768f3d891dd754f6626b8c56ee8bb25a86b7ea21f0ba4cd', 1, 4, 'adminApiToken', '[]', 0, '2023-09-21 04:32:21', '2023-09-21 04:32:21', '2024-09-21 10:02:21'),
('c5c185e8fc4966c499ab6006086184b47a2b2cabe0c862a5d848a9a6c96252a6d80e9485e740d843', 1, 4, 'adminApiToken', '[]', 0, '2023-09-11 12:37:32', '2023-09-11 12:37:32', '2024-09-11 18:07:32'),
('c857fd312359e3fa6c77a8ddb60a02e443585a0b808c44b4abff59767b89556d30106c0c0f3d95c7', 1, 4, 'adminApiToken', '[]', 0, '2023-10-07 04:33:59', '2023-10-07 04:33:59', '2024-10-07 10:03:59'),
('cd4b73b184bbacbdc83e639c71c056271d143ec77ae42b0fb89ea6f43a3e3279926c5a1d9aad422e', 2, 4, 'adminApiToken', '[]', 0, '2023-10-12 06:12:15', '2023-10-12 06:12:15', '2024-10-12 11:42:15'),
('d850f782b04c2991dd4e5b9fef5d2b7e2bf5b02edbb5895c216b196d9f8c0ea7850e51425c5070a3', 2, 4, 'adminApiToken', '[]', 0, '2023-10-12 10:54:56', '2023-10-12 10:54:56', '2024-10-12 16:24:56'),
('d85692b4a2b37763e5690f33ecc80b63c2ce91bfc9f306c1609f817c2f5d6b8830b5e4840185608b', 2, 4, 'adminApiToken', '[]', 0, '2023-10-12 14:55:53', '2023-10-12 14:55:53', '2024-10-12 20:25:53'),
('d929bd0ab1bffaf42f40a17027c26ee3a6403650f594112c9a99f4a1c5374d9679de803b7edf7ddc', 1, 4, 'adminApiToken', '[]', 0, '2023-09-28 10:01:01', '2023-09-28 10:01:01', '2024-09-28 15:31:01'),
('d99a051e670e8b0652044517dada402544117bee86d6f0bb47d76e6920ed678005c255005376cdd2', 1, 4, 'adminApiToken', '[]', 0, '2023-10-15 05:00:31', '2023-10-15 05:00:31', '2024-10-15 10:30:31'),
('d9f29ed0d6be329356ca4be84dcae7fa56eeb89df4efbf9fcbe1dfdc882d9befe5abdc2dd9373383', 1, 4, 'Admin', '[]', 0, '2020-09-27 11:42:30', '2020-09-27 11:42:30', '2021-09-27 17:12:30'),
('dbd05b1031b1f3346573015a911322dfde9a892dd534e0516366ccd4e933c043036f02555c7ff965', 1, 4, 'adminApiToken', '[]', 0, '2023-09-18 12:38:28', '2023-09-18 12:38:28', '2024-09-18 18:08:28'),
('dcf24d9385de348f6322373538b210a7596b880aa7def6aeec7a63e917cd6b8a003a035c9e9e4947', 1, 4, 'adminApiToken', '[]', 0, '2020-09-27 11:50:34', '2020-09-27 11:50:34', '2021-09-27 17:20:34'),
('e5c8e31c89d67f3da1365d7641a36830e174dc5db48b8f2ce9453f4239ca89dd1870b61032207a6e', 2, 4, 'adminApiToken', '[]', 0, '2023-10-12 13:03:12', '2023-10-12 13:03:12', '2024-10-12 18:33:12'),
('e859c1de38c24733ef0c461cb9b64457d3668177134204bd0c90e9ae2aba948c06be875b402a8274', 1, 4, 'adminApiToken', '[]', 0, '2023-09-22 07:00:52', '2023-09-22 07:00:52', '2024-09-22 12:30:52'),
('e8df0310e208ad9bd09e66e4a5f412249b1e7a60f84ad87556320b87982250f8b4ab08049384c42b', 1, 4, 'adminApiToken', '[]', 0, '2023-10-10 12:08:53', '2023-10-10 12:08:53', '2024-10-10 17:38:53'),
('eed58158b5907ecb2258199aa2e3bf25367212d0cb94f4c636c74f11c03df22846b93c070078eff4', 1, 4, 'adminApiToken', '[]', 0, '2023-09-28 10:12:04', '2023-09-28 10:12:04', '2024-09-28 15:42:04'),
('f1c13ea4834a3fbcf4928b97627a4c7c1355996866d29597cc2f098108ecf4755c12630485f2f73b', 1, 4, 'adminApiToken', '[]', 0, '2023-09-08 05:11:09', '2023-09-08 05:11:09', '2024-09-08 10:41:09'),
('f42ad48b7c0618c317eb2804c544537e243d8cdf56bd463d10ba29fefca98d9424a52044e4168431', 2, 4, 'adminApiToken', '[]', 0, '2023-10-10 13:52:28', '2023-10-10 13:52:28', '2024-10-10 19:22:28'),
('f56042b71a344ef24d7664cd56fd08a0702ab4fdcaf49131c042bef617038f92e8d82d08f19632b2', 1, 4, 'adminApiToken', '[]', 0, '2023-09-29 09:58:49', '2023-09-29 09:58:49', '2024-09-29 15:28:49'),
('f6df81039fb8946c642bdb4fd1d0cd44a9507abb5956fb8a97a9e82b6cee8d4e904633b58603701b', 1, 4, 'adminApiToken', '[]', 0, '2023-10-12 15:28:07', '2023-10-12 15:28:07', '2024-10-12 20:58:07'),
('f8c55020a77d1c3f20cd488f9d962c581b5ee74ec8dc38b649ed10f2772ca432f6410d8718ca8fa0', 1, 4, 'adminApiToken', '[]', 0, '2023-09-09 10:20:10', '2023-09-09 10:20:10', '2024-09-09 15:50:10'),
('fc72a42975d439b5b966786c3e18e78b7db0acfeba4ba12e70dd38dba6bd460206bf7c9182322ba8', 1, 4, 'adminApiToken', '[]', 0, '2023-09-13 06:44:25', '2023-09-13 06:44:25', '2024-09-13 12:14:25'),
('fe5091cc2015559790c76ee33ceaa026070ca4c80fed85ec004befc1fad3ea89bf51057a58126053', 1, 4, 'adminApiToken', '[]', 0, '2023-10-18 12:38:14', '2023-10-18 12:38:14', '2024-10-18 18:08:14'),
('ff984b70b704e49addc22187f6f36650a4ec9eb07ccbfb8a7a981dc355291d19a7a49a2827d75b5c', 2, 4, 'adminApiToken', '[]', 0, '2023-10-13 11:36:11', '2023-10-13 11:36:11', '2024-10-13 17:06:11');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel7 Boilerplate Personal Access Client', 'Ue8FQpWBQqhtri31cNsPRvbNewyfiQZV7oiGglm9', '', 'http://localhost', 1, 0, 0, '2020-07-12 16:10:52', '2020-07-12 16:10:52'),
(2, NULL, 'Laravel7 Boilerplate Password Grant Client', 'YnLJHdBV6qJSQHnAzCD4MAOVTpJ9sSmdnM8T78xY', 'users', 'http://localhost', 0, 1, 0, '2020-07-12 16:10:52', '2020-07-12 16:10:52'),
(3, NULL, 'Moblie Apps', 'ZlnWXAvjeW1CoeKWb6PXI2GfnvjZ3vxrNoQ045E1', 'users', 'http://localhost', 0, 1, 0, '2020-07-18 06:52:38', '2020-07-18 06:52:38'),
(4, NULL, 'Laravel 8 Boilerplate Personal Access Client', 'EE4IEqacN39YjXXXV5LWWzN3odRfeB5Wu9DA9Qfb', NULL, 'http://localhost', 1, 0, 0, '2020-09-26 12:28:06', '2020-09-26 12:28:06'),
(5, NULL, 'Laravel 8 Boilerplate Password Grant Client', 'PHyBfYRldhPzj3UGafU0nuEoh1xiARC9dJi316oe', 'users', 'http://localhost', 0, 1, 0, '2020-09-26 12:28:06', '2020-09-26 12:28:06');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-07-12 16:10:52', '2020-07-12 16:10:52'),
(2, 4, '2020-09-26 12:28:06', '2020-09-26 12:28:06');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `duration_type` int(11) NOT NULL DEFAULT 0,
  `durationMY` enum('0','1') NOT NULL,
  `price` varchar(255) NOT NULL,
  `off` varchar(255) NOT NULL,
  `noOfPlace` varchar(255) NOT NULL,
  `featuredListings` varchar(255) NOT NULL,
  `featuredType` enum('home_featured','city_listing','category_listing','search_ results') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `places` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `type`, `title`, `duration`, `duration_type`, `durationMY`, `price`, `off`, `noOfPlace`, `featuredListings`, `featuredType`, `created_at`, `updated_at`, `discount`, `places`) VALUES
(17, 'Ranking', 'Second Position', 3, 0, '0', '900', '2000', '2', '2', 'category_listing', '2023-10-10 12:15:53', '2023-10-12 13:29:15', 0.00, 0),
(18, 'Ranking', 'Third Position', 3, 0, '0', '450', '600', '3', '3', 'category_listing', '2023-10-10 12:16:43', '2023-10-13 05:04:31', 0.00, 0),
(22, 'Ranking', 'Second Position Yearly ', 12, 0, '0', '3000', '3500', '2', '2', 'category_listing', '2023-10-10 12:15:53', '2023-10-10 12:52:23', 0.00, 0),
(23, 'Ranking', 'Third Position Yearly ', 12, 0, '0', '1500', '2000', '3', '3', 'category_listing', '2023-10-10 12:16:43', '2023-10-10 12:16:43', 0.00, 0),
(24, 'BUSINESS LISTING', 'Business Listing price', 12, 0, '0', '1200', '1916', '1', '1', 'city_listing', '2023-10-12 09:11:53', '2023-10-13 13:36:52', 0.00, 0),
(26, 'FEATURED LISTING', 'Featured Listing', 1, 0, '0', '2000', '1680', '1', '1', 'home_featured', '2023-10-12 13:19:44', '2023-10-22 12:27:26', 0.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-view', 'admin', '2020-07-08 09:57:14', '2020-07-08 09:57:14'),
(2, 'role-create', 'admin', '2020-07-08 09:57:14', '2020-07-08 09:57:14'),
(3, 'role-edit', 'admin', '2020-07-08 09:57:14', '2020-07-08 09:57:14'),
(4, 'role-delete', 'admin', '2020-07-08 09:57:14', '2020-07-08 09:57:14'),
(5, 'permission-view', 'admin', '2020-07-08 09:57:14', '2020-07-08 09:57:14'),
(6, 'permission-create', 'admin', '2020-07-08 09:57:14', '2020-07-08 09:57:14'),
(7, 'permission-edit', 'admin', '2020-07-08 09:57:14', '2020-07-08 09:57:14'),
(8, 'permission-delete', 'admin', '2020-07-08 09:57:14', '2020-07-08 09:57:14'),
(9, 'user-view', 'admin', '2020-07-08 09:57:14', '2020-07-08 09:57:14'),
(10, 'user-create', 'admin', '2020-07-08 09:57:14', '2020-07-08 09:57:14'),
(11, 'user-edit', 'admin', '2020-07-08 09:57:14', '2020-07-08 09:57:14'),
(12, 'user-delete', 'admin', '2020-07-08 09:57:14', '2020-07-08 09:57:14'),
(13, 'blog-view', 'admin', '2020-07-13 14:07:29', '2020-07-13 14:07:29'),
(14, 'blog-create', 'admin', '2020-07-13 14:07:41', '2020-07-13 14:07:41'),
(15, 'blog-edit', 'admin', '2020-07-13 14:07:49', '2020-07-13 14:07:49'),
(16, 'blog-delete', 'admin', '2020-07-13 14:07:59', '2020-07-13 14:07:59'),
(17, 'operator-create', 'user', '2020-10-14 10:48:41', '2020-10-14 10:48:41'),
(18, 'range-create', 'user', '2020-10-15 05:52:11', '2020-10-15 05:52:11'),
(19, 'range-view', 'user', '2020-10-15 05:52:18', '2020-10-15 05:52:18'),
(20, 'range-edit', 'user', '2020-10-15 05:52:31', '2020-10-15 05:52:31'),
(21, 'range-delete', 'user', '2020-10-15 05:52:37', '2020-10-15 05:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `popup_ads`
--

CREATE TABLE `popup_ads` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `content_type` enum('image','video','','') NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `popup_ads`
--

INSERT INTO `popup_ads` (`id`, `title`, `type`, `content_type`, `value`, `logo`, `created_at`, `updated_at`) VALUES
(21, 'Rudraashwi f. Add', 'Home Ads', 'image', 'https://www.facebook.com/rudraashwitechnology', '1697024213.png', '2023-10-11 12:06:53', '2023-10-11 12:06:53'),
(24, 'JAWED', 'Home Ads', 'image', 'https://inbegusarai.com/', '1697027973.png', '2023-10-11 13:09:33', '2023-10-11 13:09:33'),
(26, 'PANACEA HOSPITAL', 'Home Ads', 'image', 'https://www.facebook.com/panaceahospital123/', '1697041243.jpg', '2023-10-11 16:50:43', '2023-10-11 16:50:43'),
(37, 'vertex', 'Home Ads', 'image', 'https://g.co/kgs/qoA77G', '1699354297.png', '2023-11-07 11:21:37', '2023-11-07 11:21:37'),
(40, 'Dev Hero', 'Popup Ads', 'image', 'https://www.facebook.com/devherobegusarai', '1710172361.png', '2024-03-11 16:22:41', '2024-03-11 16:22:41');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) NOT NULL,
  `author` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `rating` int(11) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listing_id` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `author`, `user_id`, `rating`, `avatar`, `content`, `listing_id`, `created_at`, `updated_at`) VALUES
(4, 'Nikhil Sharma', 1, 5, 'default_avatar.jpg', 'There are more facilities and good place to safe stay like a family good staff\r\nFood facility is very nice and taste like home', 1, '2023-09-23 15:17:03', '2023-09-23 11:06:30'),
(5, 'Rahul Soni', 2, 5, 'default_avatar.jpg', 'Staying at Soni Boys Hostel during my exam was a fantastic experience! The staff was welcoming, the rooms were comfortable, and the location was convenient. I highly recommend it for any student looking for a positive and focused environment.', 1, '2023-09-23 15:16:33', '2023-09-23 11:06:30'),
(6, 'Rajdeep Singh ', 3, 5, ' ', 'Very nice hostel well clean for boys hostel in ajmer rajasthan', 1, '2023-09-23 15:17:07', '2023-09-23 11:06:30'),
(7, 'Anhsul Meena ', 4, 5, 'default_avatar.jpg', 'Nice and clean rooms & got to say it, \"The Best Food\"  I have had in a hostel like this.\r\nGot my jee advanced center in Ajmer was skeptical about where to stay, this hostel solved my problem.', 1, '2023-09-23 15:16:53', '2023-09-23 11:06:30'),
(8, 'Mohit singh ', 5, 5, ' ', 'Staying at Soni Boys Hostel during my KVK INTERNSHIP OR TARININY was a fantastic experience! The staff was welcoming, the rooms were comfortable, and the location was convenient. I highly recommend it for any student looking for a positive and focused environment.', 1, '2023-09-23 15:16:50', '2023-09-23 11:06:30'),
(9, 'Nikhil Sharma', 6, 5, 'default_avatar.jpg', 'Very well maintained & organised', 1, '2023-09-23 15:16:46', '2023-09-23 11:06:30'),
(10, 'Rahul Soni', 7, 5, 'default_avatar.jpg', 'This hostel is very good  food is very good and very healthy plzz visit here', 1, '2023-09-23 15:16:43', '2023-09-23 11:06:30'),
(11, 'Anhsul Meena ', 8, 5, 'default_avatar.jpg', 'Very nice pg.... And best food...', 1, '2023-09-23 15:16:41', '2023-09-23 11:06:30'),
(12, '', 11, 5, ' ', ' ', 1, '2023-09-23 15:16:38', '2023-09-23 11:06:30'),
(23, 'Rahul Soni', 1, 5, 'default_avatar.jpg', 'GFFDG', 7, '2023-09-25 16:04:28', '2023-09-25 13:24:09'),
(24, 'Rahul Soni', 44, 5, 'default_avatar.jpg', 'GFFDG', 7, '2023-09-25 16:04:31', '2023-09-25 13:24:09'),
(25, 'Rahul soni', 1, 5, 'default_avatar.jpg', 'All Ok', 109, '2023-10-12 21:20:13', '2023-10-12 21:20:13'),
(26, 'PRASHANT KUMAR', 96, 5, 'default_avatar.jpg', 'Best computer shop in begusarai', 111, '2023-10-13 21:38:22', '2023-10-13 21:38:22'),
(27, 'Rakesh Kumar', 120, 5, 'default_avatar.jpg', 'Good homeopathy medicine', 112, '2023-10-18 15:46:57', '2023-10-18 15:46:57');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'admin', '2020-07-08 09:57:14', '2020-07-08 09:57:14'),
(2, 'Operator', 'user', '2020-10-15 05:55:02', '2020-10-15 05:55:02'),
(3, 'Rahul Soni', 'user', '2023-09-04 06:05:47', '2023-09-04 06:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(17, 3),
(18, 2),
(18, 3),
(19, 2),
(19, 3),
(20, 2),
(20, 3),
(21, 2),
(21, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('wWN1GawCruXUNvCgvCzhMRUjkshRzGAdlcz7wr6D', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZzZlRGFXVWxPYVF4SnRmcG1iQUs2ODUxT29TbmtHT1BtRnV2VFRwTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9saXN0aW5nRGV0YWlsLzE1L0hvc3BpdGFsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MToibG9naW5fdXNlcl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1695360929);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slogan` varchar(255) DEFAULT NULL,
  `eiin` varchar(255) DEFAULT NULL,
  `pabx` varchar(255) DEFAULT NULL,
  `reg` varchar(255) DEFAULT NULL,
  `stablished` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT 'assets/images/logo/favicon.png',
  `social_facebook` varchar(255) DEFAULT 'https://www.facebook.com/',
  `social_twitter` varchar(255) DEFAULT 'https://www.twitter.com/',
  `social_linkedin` varchar(255) DEFAULT 'https://www.linkedin.com/',
  `social_google` varchar(255) DEFAULT 'https://www.google.com/',
  `social_youtube` varchar(255) DEFAULT 'https://www.youtube.com/',
  `layout` varchar(255) NOT NULL DEFAULT '1',
  `maps` text DEFAULT NULL,
  `running_year` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `slogan`, `eiin`, `pabx`, `reg`, `stablished`, `email`, `contact`, `address`, `website`, `logo`, `favicon`, `social_facebook`, `social_twitter`, `social_linkedin`, `social_google`, `social_youtube`, `layout`, `maps`, `running_year`, `created_at`, `updated_at`) VALUES
(1, 'Laravel Boilerplate', 'Knowledge is Power', '123', '123', '12345', '2013', 'riyadhahmed777@gmail.com', '+8801531117886', 'Chattogram, Bangladesh', 'http://riyadh.com/', 'assets/images/logo/1598681688.png', 'assets/images/logo/1571036986.png', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.linkedin.com/', 'https://www.google.com/', 'https://www.youtube.com/', '0', NULL, '2019-2020', '2020-10-14 09:59:11', '2020-10-14 09:59:11');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `user_id`, `message`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, ' \"Really useful app to find interesting things to see, do,\r\n                                            drink, and eat in new places. I\'ve been using it regularly\r\n                                            in my travels over the past few months.\"', 'Rahul Soni', '1', '2023-09-14 12:06:58', '2023-09-14 18:39:01'),
(3, 1, ' \"Really useful app to find interesting things to see, do,\r\n                                            drink, and eat in new places. I\'ve been using it regularly\r\n                                            in my travels over the past few months.\"', 'Anshul Meena', '1', '2023-09-14 12:07:16', '2023-09-14 18:39:03'),
(4, 1, ' \"Really useful app to find interesting things to see, do,\r\n                                            drink, and eat in new places. I\'ve been using it regularly\r\n                                            in my travels over the past few months.\"', 'Kisahn Gopal ', '1', '2023-09-14 12:07:47', '2023-09-14 18:39:00'),
(17, 1, 'e', 'wq', '0', '2023-09-16 18:07:44', '2023-09-16 18:07:44'),
(18, 1, 'e', 'wq', '0', '2023-09-16 18:08:35', '2023-09-16 18:08:35'),
(23, 1, 'y', 'u', '0', '2023-09-18 18:01:15', '2023-09-18 18:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `time_duration`
--

CREATE TABLE `time_duration` (
  `id` int(11) NOT NULL,
  `businessId` varchar(255) DEFAULT NULL,
  `day` varchar(10) NOT NULL,
  `opening_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time_duration`
--

INSERT INTO `time_duration` (`id`, `businessId`, `day`, `opening_time`, `end_time`, `created_at`, `updated_at`) VALUES
(23, '23', 'Sunday', '9:30 AM', '6:00 PM', '2023-10-12 12:15:47', '2023-10-21 12:52:40'),
(24, '106', 'Sunday', '9:30 AM', '6:00 PM', '2023-10-12 13:43:01', '2023-10-21 12:52:40'),
(25, '107', 'Monday', '9:30 AM', '6:00 PM', '2023-10-12 14:31:08', '2023-10-21 12:52:40'),
(26, '107', 'Thursday', '9:30 AM', '6:00 PM', '2023-10-12 14:31:14', '2023-10-21 12:52:40'),
(28, '108', 'Monday', '9:30 AM', '6:00 PM', '2023-10-12 14:50:54', '2023-10-21 12:52:40'),
(30, '108', 'Tuesday', '9:30 AM', '6:00 PM', '2023-10-12 14:52:50', '2023-10-21 12:52:40'),
(31, '108', 'Wednesday', '9:30 AM', '6:00 PM', '2023-10-12 14:53:15', '2023-10-21 12:52:40'),
(32, '108', 'Thursday', '9:30 AM', '6:00 PM', '2023-10-12 14:53:32', '2023-10-21 12:52:40'),
(33, '108', 'Friday', '9:30 AM', '6:00 PM', '2023-10-12 14:53:46', '2023-10-21 12:52:40'),
(34, '108', 'Saturday', '9:30 AM', '6:00 PM', '2023-10-12 14:54:08', '2023-10-21 12:52:40'),
(35, '109', 'Sunday', '9:30 AM', '6:00 PM', '2023-10-12 15:45:07', '2023-10-21 12:52:40'),
(36, '110', 'Sunday', '9:30 AM', '6:00 PM', '2023-10-13 07:00:15', '2023-10-21 12:52:40'),
(37, '110', 'Monday', '9:30 AM', '6:00 PM', '2023-10-13 07:00:37', '2023-10-21 12:52:40'),
(38, '110', 'Tuesday', '9:30 AM', '6:00 PM', '2023-10-13 07:01:01', '2023-10-21 12:52:40'),
(39, '110', 'Wednesday', '9:30 AM', '6:00 PM', '2023-10-13 07:01:25', '2023-10-21 12:52:40'),
(40, '110', 'Thursday', '9:30 AM', '6:00 PM', '2023-10-13 07:01:45', '2023-10-21 12:52:40'),
(41, '110', 'Friday', '9:30 AM', '6:00 PM', '2023-10-13 07:02:01', '2023-10-21 12:52:40'),
(42, '110', 'Saturday', '9:30 AM', '6:00 PM', '2023-10-13 07:02:23', '2023-10-21 12:52:40'),
(43, '111', 'Sunday', '9:30 AM', '6:00 PM', '2023-10-13 15:44:05', '2023-10-21 12:52:40'),
(44, '111', 'Monday', '9:30 AM', '6:00 PM', '2023-10-13 15:45:10', '2023-10-21 12:52:40'),
(45, '111', 'Tuesday', '9:30 AM', '6:00 PM', '2023-10-13 15:45:56', '2023-10-21 12:52:40'),
(46, '111', 'Wednesday', '9:30 AM', '6:00 PM', '2023-10-13 15:46:20', '2023-10-21 12:52:40'),
(47, '111', 'Thursday', '9:30 AM', '6:00 PM', '2023-10-13 15:46:40', '2023-10-21 12:52:40'),
(48, '111', 'Friday', '9:30 AM', '6:00 PM', '2023-10-13 15:46:58', '2023-10-21 12:52:40'),
(49, '111', 'Saturday', '9:30 AM', '6:00 PM', '2023-10-13 15:47:22', '2023-10-21 12:52:40'),
(50, '112', 'Sunday', '9:30 AM', '6:00 PM', '2023-10-18 10:07:03', '2023-10-21 12:52:40'),
(51, '112', 'Monday', '9:30 AM', '6:00 PM', '2023-10-18 10:07:24', '2023-10-21 12:52:40'),
(52, '112', 'Tuesday', '9:30 AM', '6:00 PM', '2023-10-18 10:07:37', '2023-10-21 12:52:40'),
(53, '112', 'Wednesday', '9:30 AM', '6:00 PM', '2023-10-18 10:08:03', '2023-10-21 12:52:40'),
(54, '112', 'Thursday', '9:30 AM', '6:00 PM', '2023-10-18 10:08:14', '2023-10-21 12:52:40'),
(55, '112', 'Friday', '9:30 AM', '6:00 PM', '2023-10-18 10:08:28', '2023-10-21 12:52:40'),
(56, '112', 'Saturday', '9:30 AM', '6:00 PM', '2023-10-18 10:08:43', '2023-10-21 12:52:40'),
(60, '113', 'Sunday', '9:30 AM', '6:00 PM', '2023-10-19 08:17:29', '2023-10-21 12:52:40'),
(61, '113', 'Monday', '9:30 AM', '6:00 PM', '2023-10-19 08:17:39', '2023-10-21 12:52:40'),
(62, '113', 'Tuesday', '9:30 AM', '6:00 PM', '2023-10-19 08:17:51', '2023-10-21 12:52:40'),
(63, '113', 'Wednesday', '9:30 AM', '6:00 PM', '2023-10-19 08:18:04', '2023-10-21 12:52:40'),
(64, '113', 'Thursday', '9:30 AM', '6:00 PM', '2023-10-19 08:18:14', '2023-10-21 12:52:40'),
(65, '113', 'Saturday', '9:30 AM', '6:00 PM', '2023-10-19 08:18:25', '2023-10-21 12:52:40'),
(67, '114', 'Sunday', '9:30 AM', '6:00 PM', '2023-10-19 09:24:37', '2023-10-21 12:52:40'),
(68, '114', 'Monday', '9:30 AM', '6:00 PM', '2023-10-19 09:24:49', '2023-10-21 12:52:40'),
(69, '114', 'Tuesday', '9:30 AM', '6:00 PM', '2023-10-19 09:24:57', '2023-10-21 12:52:40'),
(70, '114', 'Wednesday', '9:30 AM', '6:00 PM', '2023-10-19 09:25:11', '2023-10-21 12:52:40'),
(71, '114', 'Thursday', '9:30 AM', '6:00 PM', '2023-10-19 09:25:20', '2023-10-21 12:52:40'),
(72, '114', 'Friday', '9:30 AM', '6:00 PM', '2023-10-19 09:25:31', '2023-10-21 12:52:40'),
(73, '114', 'Saturday', '9:30 AM', '6:00 PM', '2023-10-19 09:25:39', '2023-10-21 12:52:40'),
(74, '115', 'Sunday', '9:30 AM', '6:00 PM', '2023-10-19 10:12:12', '2023-10-21 12:52:40'),
(75, '115', 'Monday', '9:30 AM', '6:00 PM', '2023-10-19 10:12:44', '2023-10-21 12:52:40'),
(76, '115', 'Tuesday', '9:30 AM', '6:00 PM', '2023-10-19 10:13:21', '2023-10-21 12:52:40'),
(77, '115', 'Wednesday', '9:30 AM', '6:00 PM', '2023-10-19 10:13:32', '2023-10-21 12:52:40'),
(78, '115', 'Thursday', '9:30 AM', '6:00 PM', '2023-10-19 10:13:49', '2023-10-21 12:52:40'),
(79, '115', 'Friday', '9:30 AM', '6:00 PM', '2023-10-19 10:14:07', '2023-10-21 12:52:40'),
(80, '115', 'Saturday', '9:30 AM', '6:00 PM', '2023-10-19 10:14:18', '2023-10-21 12:52:40'),
(81, '116', 'Sunday', '9:30 AM', '6:00 PM', '2023-10-19 10:33:22', '2023-10-21 12:52:40'),
(82, '116', 'Monday', '9:30 AM', '6:00 PM', '2023-10-19 10:33:32', '2023-10-21 12:52:40'),
(83, '116', 'Tuesday', '9:30 AM', '6:00 PM', '2023-10-19 10:33:40', '2023-10-21 12:52:40'),
(84, '116', 'Wednesday', '9:30 AM', '6:00 PM', '2023-10-19 10:33:48', '2023-10-21 12:52:40'),
(85, '116', 'Thursday', '9:30 AM', '6:00 PM', '2023-10-19 10:34:00', '2023-10-21 12:52:40'),
(86, '116', 'Friday', '9:30 AM', '6:00 PM', '2023-10-19 10:34:08', '2023-10-21 12:52:40'),
(87, '116', 'Saturday', '9:30 AM', '6:00 PM', '2023-10-19 10:34:17', '2023-10-21 12:52:40'),
(88, '117', 'Sunday', '9:30 AM', '6:00 PM', '2023-10-19 10:49:14', '2023-10-21 12:52:40'),
(89, '117', 'Monday', '9:30 AM', '6:00 PM', '2023-10-19 10:49:21', '2023-10-21 12:52:40'),
(90, '117', 'Tuesday', '9:30 AM', '6:00 PM', '2023-10-19 10:49:30', '2023-10-21 12:52:40'),
(91, '117', 'Wednesday', '9:30 AM', '6:00 PM', '2023-10-19 10:49:38', '2023-10-21 12:52:40'),
(92, '117', 'Thursday', '9:30 AM', '6:00 PM', '2023-10-19 10:49:46', '2023-10-21 12:52:40'),
(93, '117', 'Friday', '9:30 AM', '6:00 PM', '2023-10-19 10:49:54', '2023-10-21 12:52:40'),
(94, '117', 'Saturday', '9:30 AM', '6:00 PM', '2023-10-19 10:50:02', '2023-10-21 12:52:40'),
(95, '120', 'All days', '10:00 AM', '10:00 PM', '2023-10-23 06:34:21', '2024-03-31 08:40:49'),
(100, '118', 'All days', '24 x 7', '24 x 7', '2023-10-25 00:19:46', '2023-10-25 00:19:46'),
(101, '121', 'All days', '09:00 AM', '09:00 PM', '2023-10-26 11:49:41', '2024-03-31 08:41:01'),
(102, '122', 'All days', '24 x 7', '24 x 7', '2023-10-26 15:55:05', '2023-10-26 15:55:05'),
(103, '123', 'All days', '10:00 AM', '10:00 PM', '2023-10-27 09:39:58', '2024-03-31 08:41:21'),
(104, '124', 'All days', '10:00 AM', '10:00 PM', '2023-10-27 09:51:49', '2024-03-31 08:41:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('Owner','Guest') NOT NULL DEFAULT 'Guest',
  `name` varchar(255) NOT NULL,
  `mobileNumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verificationCode` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `file_path` varchar(255) DEFAULT 'assets/images/users/default.png',
  `status` tinyint(4) DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `name`, `mobileNumber`, `email`, `email_verified_at`, `verificationCode`, `password`, `file_path`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Owner', 'Rahul Soni', '324', 'rahulyuvmedia@gmail.com', NULL, '123445', '$2y$10$2mvdimOABoWcTj1GQzm7TuPOBECM3GehcgwFkTIhlvqlm2oN33il6', '1694088331.jpg', 1, NULL, '2023-09-04 06:04:55', '2023-09-07 12:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `users_login`
--

CREATE TABLE `users_login` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('Owner','Guest') NOT NULL DEFAULT 'Guest',
  `name` varchar(255) DEFAULT NULL,
  `mobileNumber` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verificationCode` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `viewPassword` varchar(255) DEFAULT NULL,
  `address_filing` varchar(255) DEFAULT NULL,
  `block_number` varchar(255) DEFAULT NULL,
  `village_ward` varchar(255) DEFAULT NULL,
  `city_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users_login`
--

INSERT INTO `users_login` (`id`, `type`, `name`, `mobileNumber`, `email`, `email_verified_at`, `verificationCode`, `password`, `viewPassword`, `address_filing`, `block_number`, `village_ward`, `city_name`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Owner', 'Rahul soni', '9588871256', NULL, NULL, '867452', '$2y$10$Cqe/NXCw.Kg8wl9nN7amaOzSCyqU.WPn0lYK.WtSvI5d3p/Qs3df.', '123456', 'from_begusarai', '423432', '111', NULL, '1697709189.webp', 1, NULL, '2023-10-10 11:58:47', '2023-10-23 04:57:31'),
(66, 'Owner', 'Gaurav Bhardwaj', '9955111070', NULL, NULL, '976091', '$2y$10$93/VVG3h8NOwLZT8ykJKVu8I7NoHKWbxd2MIGOVV3LUDQq8lxWySy', '123456', 'from_begusarai', 'Begusarai', '13', NULL, NULL, 1, NULL, '2023-10-11 10:54:39', '2023-10-11 10:55:35'),
(70, 'Guest', 'Chandan kumar', '7992423043', NULL, NULL, '979905', '$2y$10$93/VVG3h8NOwLZT8ykJKVu8I7NoHKWbxd2MIGOVV3LUDQq8lxWySy', '123456', 'from_begusarai', 'Begusarai', 'Begusarai', NULL, NULL, 1, NULL, '2023-10-11 15:55:37', '2023-10-11 15:57:19'),
(72, 'Owner', 'Chandan Kumar', '9931530061', NULL, NULL, '180000', '$2y$10$93/VVG3h8NOwLZT8ykJKVu8I7NoHKWbxd2MIGOVV3LUDQq8lxWySy', '123456', 'from_begusarai', 'Begusarai', 'Begusarai', NULL, NULL, 1, NULL, '2023-10-11 16:02:55', '2023-10-11 16:04:15'),
(74, 'Guest', 'Anupam Mishra', '9818165055', NULL, NULL, '703198', '$2y$10$93/VVG3h8NOwLZT8ykJKVu8I7NoHKWbxd2MIGOVV3LUDQq8lxWySy', '123456', 'from_begusarai', 'Begusarai', '18', NULL, NULL, 1, NULL, '2023-10-12 07:18:41', '2023-10-13 08:46:26'),
(86, 'Owner', 'Komal', '9560558927', NULL, NULL, '480750', '$2y$10$93/VVG3h8NOwLZT8ykJKVu8I7NoHKWbxd2MIGOVV3LUDQq8lxWySy', '123456', 'outside_begusarai', NULL, NULL, 'Delhi', NULL, 1, NULL, '2023-10-12 07:31:59', '2023-10-12 07:32:31'),
(88, 'Owner', 'Nirmal Kumar', '6203321252', NULL, NULL, '448730', '$2y$10$93/VVG3h8NOwLZT8ykJKVu8I7NoHKWbxd2MIGOVV3LUDQq8lxWySy', '123456', 'from_begusarai', 'Begusarai', 'Begusarai', NULL, NULL, 1, NULL, '2023-10-12 14:40:06', '2023-10-23 08:49:06'),
(90, 'Guest', 'Sonu Kumar', '9102840498', NULL, NULL, '515070', 'eyJpdiI6Ikt1Q0d3cXB2Tm1jV2lYdWtIZlFrVkE9PSIsInZhbHVlIjoiT1hyam5FeFJiSFZlajZMZmQrY01IZz09IiwibWFjIjoiMWNlYzUzZjQ2Y2E3YmI1ZTYzNjI5YjU3YTYzNDQyOWNkNDQzZjFiNWI1ZDY0MjQ2NzIxYWRmYjIwMWNhMmI3ZSIsInRhZyI6IiJ9', '', 'from_begusarai', 'Bakhri', 'Ward no-16 Akaha', NULL, NULL, 1, NULL, '2023-10-13 03:47:25', '2023-10-13 03:48:25'),
(96, 'Owner', 'PRASHANT KUMAR', '7070704443', NULL, NULL, '590131', '$2y$10$93/VVG3h8NOwLZT8ykJKVu8I7NoHKWbxd2MIGOVV3LUDQq8lxWySy', '123456', 'from_begusarai', 'BEGUSARAI', 'BEGUSARAI', NULL, NULL, 1, NULL, '2023-10-13 15:19:59', '2023-10-16 05:53:45'),
(108, 'Owner', 'SANJEEV KUMAR', '9122019834', NULL, NULL, '729681', '$2y$10$93/VVG3h8NOwLZT8ykJKVu8I7NoHKWbxd2MIGOVV3LUDQq8lxWySy', '123456', 'from_begusarai', 'BEGUSARAI', '30', NULL, NULL, 1, NULL, '2023-10-15 08:33:07', '2023-10-15 08:33:44'),
(118, 'Guest', '8340157167', '8340157167', NULL, NULL, '518441', '$2y$10$5E8/G6kx2bBtVIFXwm7/cer9YKLasop9N44j9voMngJjbYwqjRweS', '834015', 'from_begusarai', 'Begusarai', '43', NULL, NULL, 1, NULL, '2023-10-17 06:55:03', '2023-10-23 06:03:51'),
(120, 'Guest', 'Rakesh Kumar', '7991101978', NULL, NULL, '329409', '$2y$10$GMhiMn1htnm.Z63HNuMc5uEzSLmuEj6LTqGd/ai.ZBUIiwUDfcWRS', 'Rahul@123', 'from_begusarai', 'Begusarai', '23', NULL, '1697630188.jpeg', 1, NULL, '2023-10-17 10:22:58', '2023-10-23 06:17:40'),
(122, 'Owner', 'Chandan Kumar', '7549254481', NULL, NULL, '979978', 'eyJpdiI6ImR5ODhnbnp2ZXpXemZScmcvUmh6M2c9PSIsInZhbHVlIjoiV2Q1dngwMjQ3QWkwd1N5czZOK0g4dz09IiwibWFjIjoiZTJjOTZlNTRmYWY5NjQ2ZDVjMDdhNjY5YWUzYmE1MDJmMWFkMjFkN2Y3NTg4MjU0NTk1ZWUyOGZiYjUwOWNmMCIsInRhZyI6IiJ9', '', 'from_begusarai', 'Begusarai', '23', NULL, NULL, 1, NULL, '2023-10-18 09:13:50', '2023-10-18 09:14:58'),
(124, 'Owner', 'SAURAV KUMAR', '8797009292', NULL, NULL, '866102', 'eyJpdiI6Ink1VXRyTmNDV1VWZTZGcDZFUXVIcnc9PSIsInZhbHVlIjoidEp4RFhjZ3Ztai9iTWtVZk9HVmJTQT09IiwibWFjIjoiM2Q0ZWNiZDExYjYzOWVmYWJlNWZmZjgzNGVlMjA5ZmRiNTQ3OGRmZjVhYTAxYzIwZWFkODkyYzQ4OTFjZGYyMyIsInRhZyI6IiJ9', '', 'from_begusarai', 'BEGUSARAI', 'KESHAWE', NULL, NULL, 1, NULL, '2023-10-19 07:52:24', '2023-10-19 07:58:13'),
(126, 'Guest', 'Leera', '9460949780', NULL, NULL, '851011', '$2y$10$QE8/FMMB.tKWvRKaI.D78OSRroyMQqTAo95kK/gKbQP3QaYbSFcQ2', 'yuvmedia@123', 'from_begusarai', '3', 'il', NULL, NULL, 1, NULL, '2023-10-19 08:05:37', '2023-10-23 06:06:29'),
(130, 'Owner', 'Gulshan Kumar', '7544813871', NULL, NULL, '980310', '$2y$10$EVBK/P2i9EpDXMo6ITfdtuLPwLzcwC5Jjibb4./aJga7lULkPziF2', '123456', 'from_begusarai', 'BEGUSARAI', 'KALI STHAN CHOWK', NULL, '1697705926.jpg', 1, NULL, '2023-10-19 09:14:09', '2023-10-23 09:01:49'),
(132, 'Owner', 'Dinkar bhardwaj', '9934071809', NULL, NULL, '736270', '$2y$10$xO5h3BySAYvcSos2W37cwe9M2yjnpWYSDD9Fj3Md7f.yKADzhBUtG', '123456', 'from_begusarai', 'BEGUSARAI', 'TRAFIC CHOWK', NULL, NULL, 1, NULL, '2023-10-19 10:06:43', '2023-10-23 09:02:40'),
(134, 'Owner', 'Vicky', '6202170035', NULL, NULL, '944058', '$2y$10$93/VVG3h8NOwLZT8ykJKVu8I7NoHKWbxd2MIGOVV3LUDQq8lxWySy', '123456', 'from_begusarai', 'BEGUSARAI', 'kankaul', NULL, '1697709966.jpg', 1, NULL, '2023-10-19 10:23:56', '2023-10-19 10:36:06'),
(136, 'Owner', 'Amit agrawal', '7082420324', NULL, NULL, '898108', '$2y$10$93/VVG3h8NOwLZT8ykJKVu8I7NoHKWbxd2MIGOVV3LUDQq8lxWySy', '123456', 'from_begusarai', 'BEGUSARAI', 'BEGUSARAI', NULL, NULL, 1, NULL, '2023-10-19 10:37:55', '2023-10-19 10:38:47'),
(138, 'Owner', 'Anmol Ratan', '6200202863', NULL, NULL, '661046', '$2y$10$w0ezsTgs8XLvCZG3DuofQuv7c4NUhME491tzPUAdsGSwkFhMGleDi', '123456', 'from_begusarai', 'BEGUSARAI', 'BEGUSARAI', NULL, NULL, 1, NULL, '2023-10-19 13:28:29', '2023-10-23 09:04:18'),
(163, 'Owner', 'Anshul Kumar', '9429158300', NULL, NULL, '893592', '$2y$10$l.E0MfCtiAljem9ChVPF/eo4cJtwdzNI7mKheYtkKPULHmFmInXCO', '654321', 'from_begusarai', '69', 'jhasukoda', NULL, NULL, 1, NULL, '2023-10-23 09:06:13', '2023-10-23 09:07:13'),
(231, 'Owner', 'VIBHAKAR AANAND', '7654419925', NULL, NULL, '403818', '$2y$10$PDrFjqgJdNQMeEIceC1wkOzZxiHf1jamHqXAEVus38hpkDmCr26Ky', '123456', 'from_begusarai', 'BEGUSARAI', 'HAR HAR MAHA DEV CHOWK', NULL, NULL, 1, NULL, '2023-10-26 11:44:08', '2023-10-26 11:45:17'),
(232, 'Owner', 'Krishna Kumar Sharma', '8877212928', NULL, NULL, '498143', '$2y$10$.WO/IORQq3ibNpe0Q4xlfOI8vcCFzMkI7msDQ.wJI2CqMJxoU6iiO', '123456', 'from_begusarai', 'BEGUSARAI', 'BEGUSARAI', NULL, '1698334125.jpg', 1, NULL, '2023-10-26 15:37:47', '2023-10-26 15:58:45'),
(234, 'Owner', 'Ajit kumar', '8051039412', NULL, NULL, '428363', '$2y$10$pZIMk6.O5Sx.bIfy4QURYu23oE1UxuYIL2pvxhLa2jqcXrvo.Z0.2', '123456', 'from_begusarai', 'Begusarai', 'Begusarai', NULL, '1698397815.jpg', 1, NULL, '2023-10-27 09:33:15', '2023-10-27 09:40:15'),
(236, 'Owner', 'Sajid Ansari', '7479447908', NULL, NULL, '905239', '$2y$10$gBgjR7NFsljH8KtSP/3Xnum94KcmP08QDrah921sW9KrSy/IFJ8ha', '123456', 'from_begusarai', 'Begusarai', 'Begusarai', NULL, '1698398526.jpg', 1, NULL, '2023-10-27 09:46:48', '2023-10-27 09:52:06'),
(238, 'Guest', 'Ravi Prakash', '8607769711', NULL, NULL, '120515', '$2y$10$4XH9erxtXeXI7UUZZHkqY.pzpPvDRTLBVPoupwLZegNlVwd/I8rGW', '123456', 'from_begusarai', 'Begusarai', 'Begusarai', NULL, NULL, 1, NULL, '2023-10-27 10:01:26', '2023-10-27 10:02:16'),
(298, 'Guest', NULL, '7903043280', NULL, NULL, '964725', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2023-10-28 17:06:15', '2023-10-28 17:06:15'),
(300, 'Guest', NULL, '6206060278', NULL, NULL, '926632', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2023-10-31 11:35:57', '2023-10-31 11:35:57'),
(302, 'Guest', 'Moti', '9155101046', NULL, NULL, '987450', '$2y$10$aGIjnM2aCZfl5Esh6/vgV.tusHv84f/aep4DNexsJV4zDQjvrO9eu', '123456', 'from_begusarai', 'Begusarai', 'Begusarai', NULL, NULL, 1, NULL, '2023-11-01 14:10:35', '2023-11-01 14:11:04'),
(304, 'Guest', 'bihar', '1234567890', NULL, NULL, '238084', '$2y$10$HJ2u4XSDs1vIt8mX7kHqm.LfY30VoMlo4WWpKTCqhc6o4RO7vyOQq', 'biharbihar', 'outside_begusarai', NULL, NULL, 'bihar', NULL, 1, NULL, '2024-03-11 11:25:11', '2024-03-11 11:25:50');

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
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `businesslist`
--
ALTER TABLE `businesslist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buy_plan`
--
ALTER TABLE `buy_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead`
--
ALTER TABLE `lead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master`
--
ALTER TABLE `master`
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
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `popup_ads`
--
ALTER TABLE `popup_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_email_unique` (`email`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_duration`
--
ALTER TABLE `time_duration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `mobileNumber` (`mobileNumber`);

--
-- Indexes for table `users_login`
--
ALTER TABLE `users_login`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `mobileNumber` (`mobileNumber`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `businesslist`
--
ALTER TABLE `businesslist`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `buy_plan`
--
ALTER TABLE `buy_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lead`
--
ALTER TABLE `lead`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `master`
--
ALTER TABLE `master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `popup_ads`
--
ALTER TABLE `popup_ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `time_duration`
--
ALTER TABLE `time_duration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_login`
--
ALTER TABLE `users_login`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
