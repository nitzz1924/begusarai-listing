-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2023 at 01:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `begusarai`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rahul Soni', 'rahulsoni@admin.com', NULL, '$2y$10$PqSKV7Ye2PVTzNor1tEhguuPxzY3lGTN9H4JWZqlNwK2GvjYB7OXG', 1, NULL, '2020-07-07 18:30:00', '2020-10-14 09:15:34');

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
  `videourl` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT 1,
  `postbyId` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `type`, `keyword`, `post`, `uploaded_by`, `image`, `videourl`, `status`, `postbyId`, `created_at`, `updated_at`) VALUES
(1, '10 Best Classic Diners in Manhattan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'begusarai Blog 1', 'A,B,C,D,F', 'Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n5\r\n	paragraphs\r\n	words\r\n	bytes\r\n	lists\r\n	Start with \'Lorem\r\nipsum dolor sit amet...\'', 1, '1694691226.jpg', 'https://www.lipsum.com/', 1, NULL, '2023-09-14 11:05:16', '2023-09-14 12:05:17'),
(11, '10 Best Classic Diners in Manhattan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'begusarai Blog 1', 'A,B,C,D,F', 'Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n5\r\n	paragraphs\r\n	words\r\n	bytes\r\n	lists\r\n	Start with \'Lorem\r\nipsum dolor sit amet...\'', 1, '1694691226.jpg', 'https://www.lipsum.com/', 1, NULL, '2023-09-14 11:05:16', '2023-09-14 12:05:17'),
(12, '10 Best Classic Diners in Manhattan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'begusarai Blog 1', 'A,B,C,D,F', 'Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n5\r\n	paragraphs\r\n	words\r\n	bytes\r\n	lists\r\n	Start with \'Lorem\r\nipsum dolor sit amet...\'', 1, '1694691226.jpg', 'https://www.lipsum.com/', 1, NULL, '2023-09-14 11:05:16', '2023-09-14 12:05:17');

-- --------------------------------------------------------

--
-- Table structure for table `businesslist`
--

CREATE TABLE `businesslist` (
  `id` bigint(20) NOT NULL,
  `userId` bigint(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `placeType` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `highlight` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `placeAddress` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber1` varchar(255) NOT NULL,
  `phoneNumber2` varchar(255) NOT NULL,
  `whatsappNo` varchar(255) NOT NULL,
  `websiteUrl` varchar(255) NOT NULL,
  `additionalFields` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `bookingType` varchar(255) NOT NULL,
  `bookingurl` varchar(255) NOT NULL,
  `packageId` varchar(255) DEFAULT NULL,
  `expairyDate` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `businessName` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `coverImage` varchar(255) DEFAULT NULL,
  `galleryImage` varchar(255) DEFAULT NULL,
  `documentImage` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `status` enum('0','1','','') NOT NULL DEFAULT '0',
  `planStatus` enum('0','1','2','') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `businesslist`
--

INSERT INTO `businesslist` (`id`, `userId`, `category`, `placeType`, `description`, `price`, `duration`, `highlight`, `city`, `placeAddress`, `email`, `phoneNumber1`, `phoneNumber2`, `whatsappNo`, `websiteUrl`, `additionalFields`, `facebook`, `instagram`, `twitter`, `bookingType`, `bookingurl`, `packageId`, `expairyDate`, `businessName`, `youtube`, `coverImage`, `galleryImage`, `documentImage`, `logo`, `video`, `status`, `planStatus`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hotel', 'Placetype 2,Placetype 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '500/-', '8:00 am - 10:00 pm', 'Highlight 2,Highlight 1', 'Jodhpur City', ' FJ6V+46C, Vinay Nagar, Pal Bhichala, Ajmer, Rajasthan 305001', 'adstestyuv@gmail.com', '12345667890', '12345667890', '12345667890', 'https://proaidirectory.com/', 'https://proaidirectory.com/', 'https://proaidirectory.com/', 'https://proaidirectory.com/', 'https://proaidirectory.com/', 'ty1', 'https://proaidirectory.com/', NULL, '2023-09-12 11:29:45', 'New Updated List 1', 'https://proaidirectory.com/', '1694588906.jpg', '1694586307.jpg', '1694586321.jpg', '1694586307.jpg', 'https://proaidirectory.com', '1', '1', '2023-09-12 11:59:45', '2023-09-13 12:45:44'),
(11, 1, 'Hospital', 'Placetype 2', 'df', 'qwe', 'sd', 'Highlight 2', 'Ajmer City', ' FJ6V+46C, Vinay Nagar, Pal Bhichala, Ajmer, Rajasthan 305001', 'adstestyuv@gmail.com', '01267897067', '09588871256', '43', 'https://junglebooktourism.com/our-packages', 'https://junglebooktourism.com/our-packages', 'https://junglebooktourism.com/our-packages', 'https://junglebooktourism.com/our-packages', 'https://junglebooktourism.com/our-packages', 'ty1', 'https://junglebooktourism.com/our-packages', NULL, '2023-09-13 10:41:10', 'TEST 123', 'https://junglebooktourism.com/our-packages', '1694588906.jpg', '1694581870.jpg', '1694581870.jpg', '1694588906.jpg', 'https://junglebooktourism.com/our-packages', '0', '0', '2023-09-13 11:11:10', '2023-09-13 12:52:29'),
(12, 1, 'Hospital', 'Placetype 2,Placetype 1', '2', '2', '8:00 am - 10:00 pm', 'Highlight 2,Highlight 1', 'Ajmer City', ' FJ6V+46C, Vinay Nagar, Pal Bhichala, Ajmer, Rajasthan 305001', 'rahulyuvmedia@gmail.com', '09588871256', '2', '2', 'https://proaidirectory.com/', 'https://proaidirectory.com/', 'https://proaidirectory.com/', 'https://proaidirectory.com/', 'https://proaidirectory.com/', 'ty1', 'https://proaidirectory.com/', NULL, '2023-09-13 12:31:28', '2', 'https://proaidirectory.com/', '1694588906.jpg', '1694588906.jpg', '1694588906.jpg', '1694588906.jpg', 'https://junglebooktourism.com/our-pa', '0', '0', '2023-09-13 13:01:28', '2023-09-13 13:08:26');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`id`, `type`, `title`, `value`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Master', 'category', 'category', NULL, 'Active', '2023-09-07 07:13:17', '2023-09-13 06:44:44'),
(5, 'Master', 'Placetype', 'Placetype', NULL, 'Active', '2023-09-11 10:04:45', '2023-09-11 10:13:00'),
(7, 'category', 'Hotel', 'fa-solid fa-hotel', '1694425238.jpg', 'Active', '2023-09-11 10:10:38', '2023-09-11 10:10:38'),
(8, 'category', 'Hospital', 'fa-solid fa-hospital', '1694425263.jpg', 'Active', '2023-09-11 10:11:03', '2023-09-11 10:11:03'),
(9, 'Placetype', 'Placetype 1', 'Placetype 1', '1694425424.jpg', 'Active', '2023-09-11 10:13:44', '2023-09-11 10:13:44'),
(10, 'Placetype', 'Placetype 2', 'Placetype 2', '1694425443.jpg', 'Active', '2023-09-11 10:14:03', '2023-09-11 10:14:03'),
(11, 'Master', 'Highlight', 'Highlight', NULL, 'Active', '2023-09-11 10:53:07', '2023-09-11 10:53:07'),
(16, 'Highlight', 'Highlight 1', 'Highlight 1', '1694427888.jpg', 'Active', '2023-09-11 10:54:48', '2023-09-11 10:54:48'),
(17, 'Highlight', 'Highlight 2', 'Highlight 2', '1694427905.jpg', 'Active', '2023-09-11 10:55:05', '2023-09-11 10:55:05'),
(18, 'Master', 'City', 'City', NULL, 'Active', '2023-09-11 11:07:15', '2023-09-11 11:07:15'),
(20, 'City', 'Jodhpur City', 'Jodhpur City', '1694427905.jpg', 'Active', '2023-09-11 11:09:33', '2023-09-11 11:09:33'),
(21, 'City', 'Ajmer City', 'Ajmer City', '1694427888.jpg\r\n', 'Active', '2023-09-11 11:09:53', '2023-09-11 11:09:53'),
(22, 'Master', 'bookingType', 'bookingType', NULL, 'Active', '2023-09-11 13:00:52', '2023-09-12 10:05:56'),
(26, 'bookingType', 'ty1', 'ty1', '1694511866.jpg', 'Active', '2023-09-12 10:14:26', '2023-09-12 10:14:26'),
(27, 'category', 'Gym', 'fa-solid fa-dumbbell', '1694604325.jpg', 'Active', '2023-09-13 11:55:25', '2023-09-13 11:55:25'),
(28, 'Master', 'blog_type', 'blog_type', NULL, 'Active', '2023-09-14 10:46:22', '2023-09-14 10:46:22'),
(29, 'blog_type', 'begusarai Blog 1', 'begusarai Blog 1', NULL, 'Active', '2023-09-14 10:46:55', '2023-09-14 10:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(17, '2023_09_04_142515_master', 8);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('027ae400a8e608d36a65b1fcc48c85aec9f532a63339286a94fc5e06b1bc8b42e531232518a8118e', 1, 4, 'adminApiToken', '[]', 0, '2020-10-14 09:04:15', '2020-10-14 09:04:15', '2021-10-14 14:34:15'),
('0d1b46884196f04c18e195a6e63ac0a0facb1c5cc808a9f528032c6510ec875fb9207caeea006ef4', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 11:06:32', '2023-09-04 11:06:32', '2024-09-04 16:36:32'),
('139d21c37f0674d78a17e39b8f3b8107cb69fd8e3721797ca698d06f0517297620ea5cb09b706498', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 07:38:34', '2023-09-04 07:38:34', '2024-09-04 13:08:34'),
('1dc6199bff12eda56651b074bb2ccb6bc595b6f6c474141f8602491fc971ce545fd16e2604c44c5a', 1, 4, 'adminApiToken', '[]', 0, '2023-09-08 10:28:41', '2023-09-08 10:28:41', '2024-09-08 15:58:41'),
('1edda5920e8507705c3d3f1d7c184a0aaf4d5450bae495abca5a784ce053e5bb0e1254669e1de016', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 06:19:05', '2023-09-04 06:19:05', '2024-09-04 11:49:05'),
('2ecd645d914c7261c8d7ec1aa0a95349fb4b469e59a499406a659ea6f5bb09c846ef3386ae8f5d00', 1, 4, 'adminApiToken', '[]', 0, '2023-09-08 05:06:14', '2023-09-08 05:06:14', '2024-09-08 10:36:14'),
('2fbba7fceb055e6575e671c0f7b10a91edd839261e260471611139fbc100961402c4c4c7430341de', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 06:03:02', '2023-09-04 06:03:02', '2024-09-04 11:33:02'),
('30157c3e8deccfa62315c7148854169a64c3920c97a4b545e2f6be06b5309a7564de8e9d76d699a2', 1, 4, 'adminApiToken', '[]', 0, '2023-09-07 04:38:09', '2023-09-07 04:38:09', '2024-09-07 10:08:09'),
('313fcbd98202b2ddb797cde21785740199f828cbfdea01a4ffa90a3b6523be68472d4b336eb9824d', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 09:46:21', '2023-09-04 09:46:21', '2024-09-04 15:16:21'),
('34cfca8b577333694edb5d4a43e45503ca2478f916462fe0c4d3c64a66dfb59f222dc11b06849cf7', 2, 1, 'userApiToken', '[]', 0, '2020-07-18 11:47:50', '2020-07-18 11:47:50', '2021-07-18 17:17:50'),
('37685fbe1d7f5a9520785fdb5fc643601241490e254dae8d749a918e595e3d687d8fe9342b0f5d74', 1, 4, 'adminApiToken', '[]', 0, '2023-09-11 04:50:18', '2023-09-11 04:50:18', '2024-09-11 10:20:18'),
('40d949ec1e4005369183121030e1926d19f67fe76ce7880fd70cb61bb36f44f6e14ef01f91dac974', 1, 4, 'adminApiToken', '[]', 0, '2023-09-06 09:23:19', '2023-09-06 09:23:19', '2024-09-06 14:53:19'),
('4a58ac7d639bf5979575952f0d5462d4db0d68ce827b7a44263bf7de507763fda8771c1fc33e0b30', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 08:47:11', '2023-09-04 08:47:11', '2024-09-04 14:17:11'),
('4a78629efb0c66ea1e54c118b3766fd93ddbf027e2e9ad7ffd1aece705205bbac3c564565d8fe398', 1, 4, 'adminApiToken', '[]', 0, '2023-09-14 05:39:27', '2023-09-14 05:39:27', '2024-09-14 11:09:27'),
('55f9326aea22d0ad8a365398a81225484943154fc883b11343b25f69507062b24ff60635143e4925', 1, 4, 'adminApiToken', '[]', 0, '2023-09-07 06:56:15', '2023-09-07 06:56:15', '2024-09-07 12:26:15'),
('625ab89581817b3f756b06203741d8ba93b184317cb986fb2c1c060a2c576bcfae06953fbcc79ef5', 1, 4, 'adminApiToken', '[]', 0, '2023-09-12 09:52:37', '2023-09-12 09:52:37', '2024-09-12 15:22:37'),
('67cba7b98c79510c5fac62493938fa857b1cf00da731c40c852ec4949f04be06e0dd476a84d94f8f', 1, 4, 'adminApiToken', '[]', 0, '2020-09-27 10:50:50', '2020-09-27 10:50:50', '2021-09-27 16:20:50'),
('6b2c2d1ba407c89557e9372a0f813bc070ba242cc5a60292e381f4899cb554eb4694c3429c184680', 1, 4, 'adminApiToken', '[]', 0, '2023-09-08 05:03:07', '2023-09-08 05:03:07', '2024-09-08 10:33:07'),
('6c499106b84461888f3563bc2ca0166ef9595da9e8b2a98ce92641c1d50f05c0e747bc11e1935daf', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 06:03:31', '2023-09-04 06:03:31', '2024-09-04 11:33:31'),
('6d93297e379e0137a94655f3ddbfef983b2b38f225e618666a61bfeabc368b6112f75830566178b2', 1, 4, 'adminApiToken', '[]', 0, '2023-09-13 10:48:04', '2023-09-13 10:48:04', '2024-09-13 16:18:04'),
('6f8b1567811d785614a045204709d7d3166a2b76a1a1075d8a01c05951d6a64737aa1206ab8f81e5', 1, 4, 'adminApiToken', '[]', 0, '2023-09-08 04:54:33', '2023-09-08 04:54:33', '2024-09-08 10:24:33'),
('77e00bb4c445d82f6fa939489cc7ecf0a1f5203a5916b7946ef97816b41ae6703df53bfb679ccbef', 1, 4, 'adminApiToken', '[]', 0, '2023-09-07 05:05:11', '2023-09-07 05:05:11', '2024-09-07 10:35:11'),
('88cf5da31e2e53a53ea50c1307b5d6e50791db94cc3726f64d525b258d2f31baad5667cfe4c0f666', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 07:15:09', '2023-09-04 07:15:09', '2024-09-04 12:45:09'),
('9015560a924cf2298e9e3fd93f5b291f77a37a68975702850a5523235cea502add8f145b905cacf1', 1, 4, 'adminApiToken', '[]', 0, '2023-09-09 04:42:43', '2023-09-09 04:42:43', '2024-09-09 10:12:43'),
('92d0a713ec1ba65291849728c8eff0e33e7aea9afa9438d684ed0c73c4429a305a83e8dcf265dce1', 1, 4, 'adminApiToken', '[]', 0, '2023-09-07 04:54:49', '2023-09-07 04:54:49', '2024-09-07 10:24:49'),
('9ad5d82c8aa935e7646d8ae22779b3c8c603dfc162a9888a45a6d14ab5c61623ac551360ec3fee77', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 11:29:43', '2023-09-04 11:29:43', '2024-09-04 16:59:43'),
('a419addf4ae7bea31145205699c7e95182f9c9957068f6e32554187ab3f7980bc5374635df10a69f', 1, 4, 'adminApiToken', '[]', 0, '2020-09-28 06:46:49', '2020-09-28 06:46:49', '2021-09-28 12:16:49'),
('a6236782ee5a24d3bfc88bbd7e050bef2a3937706f206c4bcb3bf3d99127ada79b9512d4517df2a2', 1, 4, 'adminApiToken', '[]', 0, '2023-09-07 04:41:37', '2023-09-07 04:41:37', '2024-09-07 10:11:37'),
('a63a5ed742a080a9d8cf1379aa60e1ba0b0fbc087ffea1e858144bf92f87931119eedd334ace7ffb', 1, 4, 'adminApiToken', '[]', 0, '2020-10-15 05:50:50', '2020-10-15 05:50:50', '2021-10-15 11:20:50'),
('ab09563fd805d57dc698103035caa419b87a8872d5058901a99919a6770865ef4d1eb0030b7a0f7c', 1, 1, 'userApiToken', '[]', 0, '2020-07-18 11:43:13', '2020-07-18 11:43:13', '2021-07-18 17:13:13'),
('bb42f06a00a887377a917efd4b8cc381c39b9a18d9d55ea457976b6deaab1b50a18f8545d407ddab', 1, 4, 'adminApiToken', '[]', 0, '2020-09-27 11:51:14', '2020-09-27 11:51:14', '2021-09-27 17:21:14'),
('c5c185e8fc4966c499ab6006086184b47a2b2cabe0c862a5d848a9a6c96252a6d80e9485e740d843', 1, 4, 'adminApiToken', '[]', 0, '2023-09-11 12:37:32', '2023-09-11 12:37:32', '2024-09-11 18:07:32'),
('d9f29ed0d6be329356ca4be84dcae7fa56eeb89df4efbf9fcbe1dfdc882d9befe5abdc2dd9373383', 1, 4, 'Admin', '[]', 0, '2020-09-27 11:42:30', '2020-09-27 11:42:30', '2021-09-27 17:12:30'),
('dcf24d9385de348f6322373538b210a7596b880aa7def6aeec7a63e917cd6b8a003a035c9e9e4947', 1, 4, 'adminApiToken', '[]', 0, '2020-09-27 11:50:34', '2020-09-27 11:50:34', '2021-09-27 17:20:34'),
('f1c13ea4834a3fbcf4928b97627a4c7c1355996866d29597cc2f098108ecf4755c12630485f2f73b', 1, 4, 'adminApiToken', '[]', 0, '2023-09-08 05:11:09', '2023-09-08 05:11:09', '2024-09-08 10:41:09'),
('f8c55020a77d1c3f20cd488f9d962c581b5ee74ec8dc38b649ed10f2772ca432f6410d8718ca8fa0', 1, 4, 'adminApiToken', '[]', 0, '2023-09-09 10:20:10', '2023-09-09 10:20:10', '2024-09-09 15:50:10'),
('fc72a42975d439b5b966786c3e18e78b7db0acfeba4ba12e70dd38dba6bd460206bf7c9182322ba8', 1, 4, 'adminApiToken', '[]', 0, '2023-09-13 06:44:25', '2023-09-13 06:44:25', '2024-09-13 12:14:25');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `user_id`, `message`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, ' \"Really useful app to find interesting things to see, do,\r\n                                            drink, and eat in new places. I\'ve been using it regularly\r\n                                            in my travels over the past few months.\"', 'Rahul Soni', '0', '2023-09-14 12:06:58', '2023-09-14 14:31:08'),
(3, 1, ' \"Really useful app to find interesting things to see, do,\r\n                                            drink, and eat in new places. I\'ve been using it regularly\r\n                                            in my travels over the past few months.\"', 'Anshul Meena', '0', '2023-09-14 12:07:16', '2023-09-14 14:31:10'),
(4, 1, ' \"Really useful app to find interesting things to see, do,\r\n                                            drink, and eat in new places. I\'ve been using it regularly\r\n                                            in my travels over the past few months.\"', 'Kisahn Gopal ', '0', '2023-09-14 12:07:47', '2023-09-14 14:31:12');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `name`, `mobileNumber`, `email`, `email_verified_at`, `verificationCode`, `password`, `file_path`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Owner', 'Rahul Soni', '324', 'rahulyuvmedia@gmail.com', NULL, '123445', '$2y$10$2mvdimOABoWcTj1GQzm7TuPOBECM3GehcgwFkTIhlvqlm2oN33il6', '1694088331.jpg', 1, NULL, '2023-09-04 06:04:55', '2023-09-07 12:35:31'),
(14, 'Owner', 'new', '123', 'rahulyuvmedia@gmail.comtf', NULL, '111111111111', 'rahul', '1694090232.jpg', 1, NULL, '2023-09-04 06:04:55', '2023-09-08 05:00:22');

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
  `file_path` varchar(255) DEFAULT 'assets/images/users/default.png',
  `status` tinyint(4) DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users_login`
--

INSERT INTO `users_login` (`id`, `type`, `name`, `mobileNumber`, `email`, `email_verified_at`, `verificationCode`, `password`, `file_path`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Owner', 'Rahul Soni', '1234567890', NULL, NULL, '242722', '$2y$10$tvSg7y5WvMIsEXkRocVWgOZo5Fr1.Gw0CE2ZgbcdSsOlqvc1486hS', 'assets/images/users/default.png', 1, NULL, '2023-09-12 06:07:43', '2023-09-12 06:07:58');

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
-- Indexes for table `businesslist`
--
ALTER TABLE `businesslist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `masters_label_unique` (`title`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `businesslist`
--
ALTER TABLE `businesslist`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master`
--
ALTER TABLE `master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users_login`
--
ALTER TABLE `users_login`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
