-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2023 at 11:41 AM
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
  `videourl` text NOT NULL,
  `status` tinyint(4) DEFAULT 1,
  `postbyId` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `type`, `keyword`, `post`, `uploaded_by`, `image`, `videourl`, `status`, `postbyId`, `created_at`, `updated_at`) VALUES
(1, 'Best Classic Diners in Manhattan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'begusarai Blog 1', 'A,B,C,D,F', 'value=\"value=\"value=\"Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n5\r\n	paragraphs\r\n	words\r\n	bytes\r\n	lists\r\n	Start with \'Lorem\r\nipsum dolor sit amet...\'\"\"\"', 1, '1694780997.jpg', 'videourl', 1, NULL, '2023-09-14 11:05:16', '2023-09-15 12:58:37'),
(11, '1 Best Classic Diners in Manhattan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'begusarai Blog 1', 'A,B,C,D,F', 'value=\"Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n5\r\n	paragraphs\r\n	words\r\n	bytes\r\n	lists\r\n	Start with \'Lorem\r\nipsum dolor sit amet...\'\"', 1, '1694780997.jpg', 'videourl', 1, NULL, '2023-09-14 11:05:16', '2023-09-15 12:59:57'),
(12, '10 Best Classic Diners in Manhattan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'begusarai Blog 1', 'A,B,C,D,F', 'Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n5\r\n	paragraphs\r\n	words\r\n	bytes\r\n	lists\r\n	Start with \'Lorem\r\nipsum dolor sit amet...\'', 1, '1694780997.jpg', 'https://www.youtube-nocookie.com/embed/xwefl6HeIQ0?si=ma0wzCdD0Z9QbQuS', 1, NULL, '2023-09-14 11:05:16', '2023-09-14 12:05:17'),
(18, 'Best Classic Diners in Manhattan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'begusarai Blog 1', 'A,B,C,D,F', 'value=\"value=\"value=\"Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n5\r\n	paragraphs\r\n	words\r\n	bytes\r\n	lists\r\n	Start with \'Lorem\r\nipsum dolor sit amet...\'\"\"\"', 1, '1694780997.jpg', 'videourl', 1, NULL, '2023-09-14 11:05:16', '2023-09-15 12:58:37'),
(19, '1 Best Classic Diners in Manhattan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'begusarai Blog 1', 'A,B,C,D,F', 'value=\"Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n5\r\n	paragraphs\r\n	words\r\n	bytes\r\n	lists\r\n	Start with \'Lorem\r\nipsum dolor sit amet...\'\"', 1, '1694780997.jpg', 'videourl', 1, NULL, '2023-09-14 11:05:16', '2023-09-15 12:59:57'),
(20, '10 Best Classic Diners in Manhattan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'begusarai Blog 1', 'A,B,C,D,F', 'Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n5\r\n	paragraphs\r\n	words\r\n	bytes\r\n	lists\r\n	Start with \'Lorem\r\nipsum dolor sit amet...\'', 1, '1694780997.jpg', 'https://www.youtube-nocookie.com/embed/xwefl6HeIQ0?si=ma0wzCdD0Z9QbQuS', 1, NULL, '2023-09-14 11:05:16', '2023-09-14 12:05:17'),
(21, 'Best Classic Diners in Manhattan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'begusarai Blog 1', 'A,B,C,D,F', 'value=\"value=\"value=\"Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n5\r\n	paragraphs\r\n	words\r\n	bytes\r\n	lists\r\n	Start with \'Lorem\r\nipsum dolor sit amet...\'\"\"\"', 1, '1694780997.jpg', 'videourl', 1, NULL, '2023-09-14 11:05:16', '2023-09-15 12:58:37'),
(22, '1 Best Classic Diners in Manhattan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'begusarai Blog 1', 'A,B,C,D,F', 'value=\"Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n5\r\n	paragraphs\r\n	words\r\n	bytes\r\n	lists\r\n	Start with \'Lorem\r\nipsum dolor sit amet...\'\"', 1, '1694780997.jpg', 'videourl', 1, NULL, '2023-09-14 11:05:16', '2023-09-15 12:59:57'),
(23, '10 Best Classic Diners in Manhattan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'begusarai Blog 1', 'A,B,C,D,F', 'Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n5\r\n	paragraphs\r\n	words\r\n	bytes\r\n	lists\r\n	Start with \'Lorem\r\nipsum dolor sit amet...\'', 1, '1694780997.jpg', 'https://www.youtube-nocookie.com/embed/xwefl6HeIQ0?si=ma0wzCdD0Z9QbQuS', 1, NULL, '2023-09-14 11:05:16', '2023-09-14 12:05:17');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`id`, `business_id`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 11, 2, '2023-09-15 16:32:21', '2023-09-15 16:32:21'),
(9, 12, 2, '2023-09-15 17:08:02', '2023-09-15 17:08:02'),
(30, 12, 1, '2023-09-20 15:55:46', '2023-09-20 15:55:46'),
(31, 11, 1, '2023-09-20 15:55:48', '2023-09-20 15:55:48'),
(33, 1, 2, '2023-09-21 18:32:08', '2023-09-21 18:32:08'),
(48, 1, 1, '2023-09-29 18:42:25', '2023-09-29 18:42:25');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `businesslist`
--

INSERT INTO `businesslist` (`id`, `userId`, `businessName`, `category`, `placeType`, `description`, `price`, `duration`, `highlight`, `city`, `placeAddress`, `email`, `ownerName`, `phoneNumber1`, `phoneNumber2`, `whatsappNo`, `websiteUrl`, `additionalFields`, `instagram`, `facebook`, `twitter`, `bookingType`, `bookingurl`, `packageId`, `expairyDate`, `youtube`, `coverImage`, `galleryImage`, `documentImage`, `logo`, `video`, `status`, `planStatus`, `category_ranking`, `city_ranking`, `featured_ranking`, `home_featured`, `search_results`, `created_at`, `updated_at`, `dType`, `dNumber`, `leadStatus`) VALUES
(22, 1, 'Boys Hostel Ajmer', 'Hotel', '\"Placetype 1\"', 'Every Resident Writes Their Blockbuster Story At Soni Boys Hostel\r\nSoni Boys Hostel is more than just a living space; it\'s a nurturing environment designed to enhance the educational experience of young men. Founded with the vision of providing exceptional living conditions, safety, and a strong sense of belonging, our hostel strives to be the preferred choice for students in Ajmer.\r\n\r\nWe understand the unique challenges students face, and our dedicated team is committed to addressing those needs, ensuring a comfortable and growth-oriented stay. Join us at Soni Boys Hostel and embark on a journey of academic excellence, personal growth, and lasting friendships.', '6000/---', '24hr open', '\"WiFi,Water Cooler,CCTV,Parking,Gym Equipment for workout,Locker\"', 'Ajmer City', 'Patel colony, bypass, near mahilapolotechnic college, Makhupura,    Ajmer, Rajasthan 305001', 'contact@boyshostelajmer.com', '', '09829333251', '08829935990', '08829935990', 'https://boyshostelajmer.com/contact', 'https://boyshostelajmer.com/contact', 'https://boyshostelajmer.com/contact', 'https://boyshostelajmer.com/contact', 'https://boyshostelajmer.com/contact', 'ty1', 'https://boyshostelajmer.com/contact', NULL, NULL, 'https://boyshostelajmer.com/contact', '1695445921.jpeg', '\"[\\\"1695447309_650e790d27b28.jpeg\\\",\\\"1695447309_650e790d27edc.jpeg\\\",\\\"1695447309_650e790d283e7.jpeg\\\",\\\"1695447309_650e790d28825.jpeg\\\",\\\"1695447309_650e790d28bdd.jpeg\\\"]\"', '1695447142.pdf', '1695446740.jpeg', 'https://boyshostelajmer.com/contact', '0', '0', 11, 11, 11, 11, 11, '2023-09-28 10:59:14', '2023-10-07 11:30:42', NULL, NULL, '1'),
(23, 1, 'Boys Hostel Ajmer', 'Hotel', '\"Placetype 1\"', 'Every Resident Writes Their Blockbuster Story At Soni Boys Hostel\r\nSoni Boys Hostel is more than just a living space; it\'s a nurturing environment designed to enhance the educational experience of young men. Founded with the vision of providing exceptional living conditions, safety, and a strong sense of belonging, our hostel strives to be the preferred choice for students in Ajmer.\r\n\r\nWe understand the unique challenges students face, and our dedicated team is committed to addressing those needs, ensuring a comfortable and growth-oriented stay. Join us at Soni Boys Hostel and embark on a journey of academic excellence, personal growth, and lasting friendships.', '6000/---', '24hr open', '\"WiFi,Water Cooler,CCTV,Parking,Gym Equipment for workout,Locker\"', 'Ajmer City', 'Patel colony, bypass, near mahilapolotechnic college, Makhupura,    Ajmer, Rajasthan 305001', 'contact@boyshostelajmer.com', 'testin name', '09829333251', '08829935990', '08829935990', 'https://boyshostelajmer.com/contact', 'https://boyshostelajmer.com/contact', 'https://boyshostelajmer.com/contact', 'https://boyshostelajmer.com/contact', 'https://boyshostelajmer.com/contact', 'ty1', 'https://boyshostelajmer.com/contact', NULL, NULL, NULL, '1695445921.jpeg', '\"[\\\"1695447309_650e790d27b28.jpeg\\\",\\\"1695447309_650e790d27edc.jpeg\\\",\\\"1695447309_650e790d283e7.jpeg\\\",\\\"1695447309_650e790d28825.jpeg\\\",\\\"1695447309_650e790d28bdd.jpeg\\\"]\"', '1696681088.pdf', '1695446740.jpeg', 'https://boyshostelajmer.com/contact', '1', '0', 11, 11, 11, 11, 11, '2023-09-28 10:59:14', '2023-10-09 14:21:07', 'none', NULL, '1'),
(95, 1, 'Testing Business', 'Hospital', '\"Placetype 1\"', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '100/-', '24hr open', '\"Water Cooler\"', 'Jodhpur City', 'Ajmer', 'rahulyuvmedia@gmail.com', 'Testing Owner', '09588871256', '09588871256', '243', 'https://junglebooktourism.com/our-packages', 'https://junglebooktourism.com/our-packages', 'https://junglebooktourism.com/our-packages', 'https://junglebooktourism.com/our-packages', 'https://junglebooktourism.com/our-packages', 'ty1', 'https://junglebooktourism.com/our-packages', NULL, NULL, NULL, '1696575879.jpg', '\"[\\\"1696575879_651fb18762395.jpg\\\",\\\"1696575879_651fb1876266a.jpg\\\",\\\"1696575879_651fb1876296b.jpg\\\",\\\"1696575879_651fb18762d88.jpg\\\"]\"', '1696594061.pdf', '1696575879.png', 'https://junglebooktourism.com/our-pa', '1', '1', 11, 11, 11, 11, 11, '2023-09-28 10:59:14', '2023-10-07 11:35:49', 'none', NULL, '1'),
(96, 1, 'Boys Hostel Ajmer', 'Hotel', '\"Placetype 1\"', 'Every Resident Writes Their Blockbuster Story At Soni Boys Hostel\r\nSoni Boys Hostel is more than just a living space; it\'s a nurturing environment designed to enhance the educational experience of young men. Founded with the vision of providing exceptional living conditions, safety, and a strong sense of belonging, our hostel strives to be the preferred choice for students in Ajmer.\r\n\r\nWe understand the unique challenges students face, and our dedicated team is committed to addressing those needs, ensuring a comfortable and growth-oriented stay. Join us at Soni Boys Hostel and embark on a journey of academic excellence, personal growth, and lasting friendships.', '6000/---', '24hr open', '\"WiFi,Water Cooler,CCTV,Parking,Gym Equipment for workout,Locker\"', 'Ajmer City', 'Patel colony, bypass, near mahilapolotechnic college, Makhupura,    Ajmer, Rajasthan 305001', 'contact@boyshostelajmer.com', 'testin name', '09829333251', '08829935990', '08829935990', 'https://boyshostelajmer.com/contact', 'https://boyshostelajmer.com/contact', 'https://boyshostelajmer.com/contact', 'https://boyshostelajmer.com/contact', 'https://boyshostelajmer.com/contact', 'ty1', 'https://boyshostelajmer.com/contact', NULL, NULL, NULL, '1695445921.jpeg', '\"[\\\"1696594118_651ff8c61ef3c.png\\\",\\\"1696594118_651ff8c61f28e.jpg\\\",\\\"1696594118_651ff8c61f6a6.jpeg\\\",\\\"1696594118_651ff8c61f999.jpg\\\"]\"', '1696594118.pdf', '1695446740.jpeg', 'https://boyshostelajmer.com/contact', '1', '1', 11, 11, 11, 11, 11, '2023-09-28 10:59:14', '2023-10-07 11:30:45', 'none', NULL, '1'),
(97, 1, 'Boys Hostel Ajmer', 'Hotel', '\"Placetype 1\"', 'Every Resident Writes Their Blockbuster Story At Soni Boys Hostel\r\nSoni Boys Hostel is more than just a living space; it\'s a nurturing environment designed to enhance the educational experience of young men. Founded with the vision of providing exceptional living conditions, safety, and a strong sense of belonging, our hostel strives to be the preferred choice for students in Ajmer.\r\n\r\nWe understand the unique challenges students face, and our dedicated team is committed to addressing those needs, ensuring a comfortable and growth-oriented stay. Join us at Soni Boys Hostel and embark on a journey of academic excellence, personal growth, and lasting friendships.', '6000/---', '24hr open', '\"WiFi,Water Cooler,CCTV,Parking,Gym Equipment for workout,Locker\"', 'Ajmer City', 'Patel colony, bypass, near mahilapolotechnic college, Makhupura,    Ajmer, Rajasthan 305001', 'contact@boyshostelajmer.com', '', '09829333251', '08829935990', '08829935990', 'https://boyshostelajmer.com/contact', 'https://boyshostelajmer.com/contact', 'https://boyshostelajmer.com/contact', 'https://boyshostelajmer.com/contact', 'https://boyshostelajmer.com/contact', 'ty1', 'https://boyshostelajmer.com/contact', NULL, NULL, 'https://boyshostelajmer.com/contact', '1695445921.jpeg', '\"[\\\"1695447309_650e790d27b28.jpeg\\\",\\\"1695447309_650e790d27edc.jpeg\\\",\\\"1695447309_650e790d283e7.jpeg\\\",\\\"1695447309_650e790d28825.jpeg\\\",\\\"1695447309_650e790d28bdd.jpeg\\\"]\"', '1695447142.pdf', '1695446740.jpeg', 'https://boyshostelajmer.com/contact', '0', '0', 11, 11, 11, 11, 11, '2023-09-28 10:59:14', '2023-10-07 11:30:46', NULL, NULL, '1'),
(98, 1, 'Boys Hostel Ajmer', 'Hotel', '\"Placetype 1\"', 'Every Resident Writes Their Blockbuster Story At Soni Boys Hostel\r\nSoni Boys Hostel is more than just a living space; it\'s a nurturing environment designed to enhance the educational experience of young men. Founded with the vision of providing exceptional living conditions, safety, and a strong sense of belonging, our hostel strives to be the preferred choice for students in Ajmer.\r\n\r\nWe understand the unique challenges students face, and our dedicated team is committed to addressing those needs, ensuring a comfortable and growth-oriented stay. Join us at Soni Boys Hostel and embark on a journey of academic excellence, personal growth, and lasting friendships.', '6000/---', '24hr open', '\"WiFi,Water Cooler,CCTV,Parking,Gym Equipment for workout,Locker\"', 'Ajmer City', 'Patel colony, bypass, near mahilapolotechnic college, Makhupura,    Ajmer, Rajasthan 305001', 'contact@boyshostelajmer.com', '', '09829333251', '08829935990', '08829935990', 'https://boyshostelajmer.com/contact', 'https://boyshostelajmer.com/contact', 'https://boyshostelajmer.com/contact', 'https://boyshostelajmer.com/contact', 'https://boyshostelajmer.com/contact', 'ty1', 'https://boyshostelajmer.com/contact', NULL, NULL, 'https://boyshostelajmer.com/contact', '1695445921.jpeg', '\"[\\\"1695447309_650e790d27b28.jpeg\\\",\\\"1695447309_650e790d27edc.jpeg\\\",\\\"1695447309_650e790d283e7.jpeg\\\",\\\"1695447309_650e790d28825.jpeg\\\",\\\"1695447309_650e790d28bdd.jpeg\\\"]\"', '1695447142.pdf', '1695446740.jpeg', 'https://boyshostelajmer.com/contact', '0', '0', 11, 11, 11, 11, 11, '2023-09-28 10:59:14', '2023-10-07 11:30:47', NULL, NULL, '1');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `first_name`, `last_name`, `email`, `cnumber`, `message`, `created_at`, `updated_at`) VALUES
(2, 'Rahul', 'soni', 'rahulyuvmedia@gmail.com', '09588871256', 'fg', '2023-09-18 18:20:40', '2023-09-18 18:20:40');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(11, 1, 23, 'Rahul Soni', '1234567890', 'They explored your business profile !', '1', '2023-10-10 00:00:00', '2023-10-10 14:30:52');

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
(18, 'Master', 'City', 'City', NULL, 'Active', '2023-09-11 11:07:15', '2023-09-11 11:07:15'),
(20, 'City', 'Jodhpur City', 'Jodhpur City', '1694780997.jpg', 'Active', '2023-09-11 11:09:33', '2023-09-11 11:09:33'),
(21, 'City', 'Ajmer City', 'Ajmer City', '1694780882.jpg', 'Active', '2023-09-11 11:09:53', '2023-09-11 11:09:53'),
(22, 'Master', 'bookingType', 'bookingType', NULL, 'Active', '2023-09-11 13:00:52', '2023-09-12 10:05:56'),
(26, 'bookingType', 'ty1', 'ty1', '1694511866.jpg', 'Active', '2023-09-12 10:14:26', '2023-09-12 10:14:26'),
(27, 'category', 'Gym', 'fa-solid fa-dumbbell', '1694604325.jpg', 'Active', '2023-09-13 11:55:25', '2023-09-13 11:55:25'),
(28, 'Master', 'blog_type', 'blog_type', NULL, 'Active', '2023-09-14 10:46:22', '2023-09-14 10:46:22'),
(29, 'blog_type', 'begusarai Blog 1', 'begusarai Blog 1', NULL, 'Active', '2023-09-14 10:46:55', '2023-09-14 10:46:55'),
(30, 'City', 'Jaipur', 'Jaipur', '1694780649.jpg', 'Active', '2023-09-15 12:54:09', '2023-09-15 12:54:09'),
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
(67, 'Homepage_popup', 'PopUp Image 1', 'PopUp Image 1', '1696574811.webp', 'Active', '2023-10-06 07:16:51', '2023-10-06 07:16:51'),
(70, 'category', 'Restaurants', 'fa-solid fa-utensils', NULL, 'Active', '2023-10-04 03:57:50', '2023-10-04 03:57:50'),
(71, 'category', 'Cafe', 'fa-solid fa-mug-saucer', NULL, 'Active', '2023-10-04 04:01:59', '2023-10-04 04:01:59'),
(72, 'category', 'Press', 'fa-regular fa-newspaper', NULL, 'Active', '2023-10-04 04:02:31', '2023-10-04 04:02:31'),
(73, 'category', 'Mobile Shop', 'fa-solid fa-mobile-screen-button', NULL, 'Active', '2023-10-04 04:02:59', '2023-10-04 04:02:59'),
(74, 'category', 'Digital Marketing', 'fa-brands fa-digital-ocean', NULL, 'Active', '2023-10-04 04:03:48', '2023-10-04 04:03:48'),
(75, 'category', 'Tiles Shop', 'fa-solid fa-shop', NULL, 'Active', '2023-10-04 04:04:46', '2023-10-04 04:04:46'),
(76, 'category', 'Delivery', 'fa-solid fa-truck-fast', NULL, 'Active', '2023-10-04 04:05:29', '2023-10-04 04:05:29'),
(77, 'category', 'Apartment', 'fa-regular fa-building', NULL, 'Active', '2023-10-04 04:06:33', '2023-10-04 04:06:33'),
(78, 'category', 'Pets', 'fa-solid fa-shield-cat', NULL, 'Active', '2023-10-04 04:07:23', '2023-10-04 04:07:23'),
(79, 'Master', 'ads_featured', 'ads_featured', NULL, 'Active', '2023-10-07 06:29:23', '2023-10-07 06:29:23'),
(93, 'ads_featured', 'Popup Ads', 'Popup Ads', NULL, 'Active', '2023-10-07 07:19:54', '2023-10-07 07:19:54'),
(94, 'ads_featured', 'Home Ads', 'Home Ads', NULL, 'Active', '2023-10-07 07:20:33', '2023-10-07 07:20:33');

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
('059febaacfddcc26906004f78638a612facca528ac82cbd117d24058d65010e8f9552e67e094023d', 1, 4, 'adminApiToken', '[]', 0, '2023-09-28 09:54:59', '2023-09-28 09:54:59', '2024-09-28 15:24:59'),
('0d1b46884196f04c18e195a6e63ac0a0facb1c5cc808a9f528032c6510ec875fb9207caeea006ef4', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 11:06:32', '2023-09-04 11:06:32', '2024-09-04 16:36:32'),
('0fb41667a64d9102657ea5c47af90a1be30ecf6da5cd749ea2d33fe6fddcafbbb0c9ef5a9be4eb0e', 1, 4, 'adminApiToken', '[]', 0, '2023-10-04 06:48:48', '2023-10-04 06:48:48', '2024-10-04 12:18:48'),
('139d21c37f0674d78a17e39b8f3b8107cb69fd8e3721797ca698d06f0517297620ea5cb09b706498', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 07:38:34', '2023-09-04 07:38:34', '2024-09-04 13:08:34'),
('1c60286653e8a67029dce7057ee1a8f5e84db64f8aa6ece2555122a351fd3840546136fb72aa679f', 1, 4, 'adminApiToken', '[]', 0, '2023-09-15 12:11:36', '2023-09-15 12:11:36', '2024-09-15 17:41:36'),
('1dc6199bff12eda56651b074bb2ccb6bc595b6f6c474141f8602491fc971ce545fd16e2604c44c5a', 1, 4, 'adminApiToken', '[]', 0, '2023-09-08 10:28:41', '2023-09-08 10:28:41', '2024-09-08 15:58:41'),
('1edda5920e8507705c3d3f1d7c184a0aaf4d5450bae495abca5a784ce053e5bb0e1254669e1de016', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 06:19:05', '2023-09-04 06:19:05', '2024-09-04 11:49:05'),
('2ecd645d914c7261c8d7ec1aa0a95349fb4b469e59a499406a659ea6f5bb09c846ef3386ae8f5d00', 1, 4, 'adminApiToken', '[]', 0, '2023-09-08 05:06:14', '2023-09-08 05:06:14', '2024-09-08 10:36:14'),
('2fbba7fceb055e6575e671c0f7b10a91edd839261e260471611139fbc100961402c4c4c7430341de', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 06:03:02', '2023-09-04 06:03:02', '2024-09-04 11:33:02'),
('30157c3e8deccfa62315c7148854169a64c3920c97a4b545e2f6be06b5309a7564de8e9d76d699a2', 1, 4, 'adminApiToken', '[]', 0, '2023-09-07 04:38:09', '2023-09-07 04:38:09', '2024-09-07 10:08:09'),
('3133e099ade8d81d2a353709415e323e6592c3af42f775ad80c7a769c40ed14ed720b0182172c528', 1, 4, 'adminApiToken', '[]', 0, '2023-09-19 05:42:59', '2023-09-19 05:42:59', '2024-09-19 11:12:59'),
('313fcbd98202b2ddb797cde21785740199f828cbfdea01a4ffa90a3b6523be68472d4b336eb9824d', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 09:46:21', '2023-09-04 09:46:21', '2024-09-04 15:16:21'),
('323fe9be4ca1fbca1aadffe73e48d7cc974c661c17b27e7210af68495a7938d4caf9acef98381b59', 1, 4, 'adminApiToken', '[]', 0, '2023-09-28 13:10:45', '2023-09-28 13:10:45', '2024-09-28 18:40:45'),
('3330711e1b347c4b44f47f93b6adec20e9a72babb8ba981279c872fc38abf059251834eed679eca7', 1, 4, 'adminApiToken', '[]', 0, '2023-09-21 05:15:18', '2023-09-21 05:15:18', '2024-09-21 10:45:18'),
('34cfca8b577333694edb5d4a43e45503ca2478f916462fe0c4d3c64a66dfb59f222dc11b06849cf7', 2, 1, 'userApiToken', '[]', 0, '2020-07-18 11:47:50', '2020-07-18 11:47:50', '2021-07-18 17:17:50'),
('352d7c649da24b327a050b7b509d159b08bac25d60b9bd3816e734d99a5d56598a67742ecb115cf1', 1, 4, 'adminApiToken', '[]', 0, '2023-09-20 04:42:53', '2023-09-20 04:42:53', '2024-09-20 10:12:53'),
('36505c2166a1c67b16644275809a47d216d3f5a57d30d7f21b1e9c27204138aed62b2dce01014d6c', 1, 4, 'adminApiToken', '[]', 0, '2023-09-25 04:45:34', '2023-09-25 04:45:34', '2024-09-25 10:15:34'),
('37685fbe1d7f5a9520785fdb5fc643601241490e254dae8d749a918e595e3d687d8fe9342b0f5d74', 1, 4, 'adminApiToken', '[]', 0, '2023-09-11 04:50:18', '2023-09-11 04:50:18', '2024-09-11 10:20:18'),
('38fe263b1b62877d4e7c153bae2d382674fb6939273cbd212e7be713cb69b605bb1ce242794a50d5', 1, 4, 'adminApiToken', '[]', 0, '2023-10-06 04:35:30', '2023-10-06 04:35:30', '2024-10-06 10:05:30'),
('40d949ec1e4005369183121030e1926d19f67fe76ce7880fd70cb61bb36f44f6e14ef01f91dac974', 1, 4, 'adminApiToken', '[]', 0, '2023-09-06 09:23:19', '2023-09-06 09:23:19', '2024-09-06 14:53:19'),
('4a58ac7d639bf5979575952f0d5462d4db0d68ce827b7a44263bf7de507763fda8771c1fc33e0b30', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 08:47:11', '2023-09-04 08:47:11', '2024-09-04 14:17:11'),
('4a78629efb0c66ea1e54c118b3766fd93ddbf027e2e9ad7ffd1aece705205bbac3c564565d8fe398', 1, 4, 'adminApiToken', '[]', 0, '2023-09-14 05:39:27', '2023-09-14 05:39:27', '2024-09-14 11:09:27'),
('5469be33227863d9056ec0d8508bc70b22ea0b3ae16da2500fb9dfa3db1f8377e512f07a967f7186', 1, 4, 'adminApiToken', '[]', 0, '2023-09-21 08:48:07', '2023-09-21 08:48:07', '2024-09-21 14:18:07'),
('55f9326aea22d0ad8a365398a81225484943154fc883b11343b25f69507062b24ff60635143e4925', 1, 4, 'adminApiToken', '[]', 0, '2023-09-07 06:56:15', '2023-09-07 06:56:15', '2024-09-07 12:26:15'),
('5f1b7c00c578d542f9a0f9ea876f8be6fca9eff99ba52b813d655a778c988bed0c1273452b014f29', 1, 4, 'adminApiToken', '[]', 0, '2023-09-23 05:16:28', '2023-09-23 05:16:28', '2024-09-23 10:46:28'),
('625ab89581817b3f756b06203741d8ba93b184317cb986fb2c1c060a2c576bcfae06953fbcc79ef5', 1, 4, 'adminApiToken', '[]', 0, '2023-09-12 09:52:37', '2023-09-12 09:52:37', '2024-09-12 15:22:37'),
('67cba7b98c79510c5fac62493938fa857b1cf00da731c40c852ec4949f04be06e0dd476a84d94f8f', 1, 4, 'adminApiToken', '[]', 0, '2020-09-27 10:50:50', '2020-09-27 10:50:50', '2021-09-27 16:20:50'),
('6833585331c64557a2ed01ea87567c6b4601eee129193111f01725cff2b1ed5f5b147c903ac20c3d', 1, 4, 'adminApiToken', '[]', 0, '2023-09-15 12:07:14', '2023-09-15 12:07:14', '2024-09-15 17:37:14'),
('6b2c2d1ba407c89557e9372a0f813bc070ba242cc5a60292e381f4899cb554eb4694c3429c184680', 1, 4, 'adminApiToken', '[]', 0, '2023-09-08 05:03:07', '2023-09-08 05:03:07', '2024-09-08 10:33:07'),
('6c499106b84461888f3563bc2ca0166ef9595da9e8b2a98ce92641c1d50f05c0e747bc11e1935daf', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 06:03:31', '2023-09-04 06:03:31', '2024-09-04 11:33:31'),
('6d93297e379e0137a94655f3ddbfef983b2b38f225e618666a61bfeabc368b6112f75830566178b2', 1, 4, 'adminApiToken', '[]', 0, '2023-09-13 10:48:04', '2023-09-13 10:48:04', '2024-09-13 16:18:04'),
('6f8b1567811d785614a045204709d7d3166a2b76a1a1075d8a01c05951d6a64737aa1206ab8f81e5', 1, 4, 'adminApiToken', '[]', 0, '2023-09-08 04:54:33', '2023-09-08 04:54:33', '2024-09-08 10:24:33'),
('7237fb3309a1f9fbdc368aae545772945a3a9717ea3dfbe9fc462eb16d33146ce199f410d39626b5', 1, 4, 'adminApiToken', '[]', 0, '2023-09-15 12:13:14', '2023-09-15 12:13:14', '2024-09-15 17:43:14'),
('74ff4b70b41833ab81203a2a2141c327739032770ed25dd3c6cf689fd475d578a0f50427539592d0', 1, 4, 'adminApiToken', '[]', 0, '2023-09-18 05:29:36', '2023-09-18 05:29:36', '2024-09-18 10:59:36'),
('77e00bb4c445d82f6fa939489cc7ecf0a1f5203a5916b7946ef97816b41ae6703df53bfb679ccbef', 1, 4, 'adminApiToken', '[]', 0, '2023-09-07 05:05:11', '2023-09-07 05:05:11', '2024-09-07 10:35:11'),
('88cf5da31e2e53a53ea50c1307b5d6e50791db94cc3726f64d525b258d2f31baad5667cfe4c0f666', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 07:15:09', '2023-09-04 07:15:09', '2024-09-04 12:45:09'),
('8e1fca4de020059619ccb40325797cef61c3f1c7e9d26cc492583d32d387d18cc544d7f41bc4db74', 1, 4, 'adminApiToken', '[]', 0, '2023-09-27 08:52:25', '2023-09-27 08:52:25', '2024-09-27 14:22:25'),
('8ecb0ad88ca8c40c165fc329039c7d0f6cd801b599398122da8f0bd464835b0f53a21427bebf77c1', 1, 4, 'adminApiToken', '[]', 0, '2023-09-16 05:33:03', '2023-09-16 05:33:03', '2024-09-16 11:03:03'),
('9015560a924cf2298e9e3fd93f5b291f77a37a68975702850a5523235cea502add8f145b905cacf1', 1, 4, 'adminApiToken', '[]', 0, '2023-09-09 04:42:43', '2023-09-09 04:42:43', '2024-09-09 10:12:43'),
('903e239be1d9f9a94f34be8fda30590e455d3150950cf0009155581e60d01f4e365efce40eada9e1', 1, 4, 'adminApiToken', '[]', 0, '2023-10-07 06:36:49', '2023-10-07 06:36:49', '2024-10-07 12:06:49'),
('9290693223537412fe9056ccf9c11e166e80c3a27540051ee459d8bf3eb688aabeec047fd29bd99f', 1, 4, 'adminApiToken', '[]', 0, '2023-09-27 04:40:06', '2023-09-27 04:40:06', '2024-09-27 10:10:06'),
('92d0a713ec1ba65291849728c8eff0e33e7aea9afa9438d684ed0c73c4429a305a83e8dcf265dce1', 1, 4, 'adminApiToken', '[]', 0, '2023-09-07 04:54:49', '2023-09-07 04:54:49', '2024-09-07 10:24:49'),
('9ad5d82c8aa935e7646d8ae22779b3c8c603dfc162a9888a45a6d14ab5c61623ac551360ec3fee77', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 11:29:43', '2023-09-04 11:29:43', '2024-09-04 16:59:43'),
('9daa0d7ac946665c7b873ed28742f5bbb7077c49f77b5de91608acd3d3a9e40a4607f8f0cc805eed', 1, 4, 'adminApiToken', '[]', 0, '2023-10-07 06:39:04', '2023-10-07 06:39:04', '2024-10-07 12:09:04'),
('a419addf4ae7bea31145205699c7e95182f9c9957068f6e32554187ab3f7980bc5374635df10a69f', 1, 4, 'adminApiToken', '[]', 0, '2020-09-28 06:46:49', '2020-09-28 06:46:49', '2021-09-28 12:16:49'),
('a5690d0e04bf30f3ddf4cbf25f83082c7560587f54aad60e87b8a7735fb300aa29532908f16313c9', 1, 4, 'adminApiToken', '[]', 0, '2023-09-28 04:32:12', '2023-09-28 04:32:12', '2024-09-28 10:02:12'),
('a6236782ee5a24d3bfc88bbd7e050bef2a3937706f206c4bcb3bf3d99127ada79b9512d4517df2a2', 1, 4, 'adminApiToken', '[]', 0, '2023-09-07 04:41:37', '2023-09-07 04:41:37', '2024-09-07 10:11:37'),
('a63a5ed742a080a9d8cf1379aa60e1ba0b0fbc087ffea1e858144bf92f87931119eedd334ace7ffb', 1, 4, 'adminApiToken', '[]', 0, '2020-10-15 05:50:50', '2020-10-15 05:50:50', '2021-10-15 11:20:50'),
('ab09563fd805d57dc698103035caa419b87a8872d5058901a99919a6770865ef4d1eb0030b7a0f7c', 1, 1, 'userApiToken', '[]', 0, '2020-07-18 11:43:13', '2020-07-18 11:43:13', '2021-07-18 17:13:13'),
('b73a6f76e4e798d2fb7588bd96ce31526da9a17ec33aacdb51665da68e9f81bd8355440bed435948', 1, 4, 'adminApiToken', '[]', 0, '2023-09-29 09:35:49', '2023-09-29 09:35:49', '2024-09-29 15:05:49'),
('bb42f06a00a887377a917efd4b8cc381c39b9a18d9d55ea457976b6deaab1b50a18f8545d407ddab', 1, 4, 'adminApiToken', '[]', 0, '2020-09-27 11:51:14', '2020-09-27 11:51:14', '2021-09-27 17:21:14'),
('c1cbc1015139db38749db88f3343942ad768f3d891dd754f6626b8c56ee8bb25a86b7ea21f0ba4cd', 1, 4, 'adminApiToken', '[]', 0, '2023-09-21 04:32:21', '2023-09-21 04:32:21', '2024-09-21 10:02:21'),
('c5c185e8fc4966c499ab6006086184b47a2b2cabe0c862a5d848a9a6c96252a6d80e9485e740d843', 1, 4, 'adminApiToken', '[]', 0, '2023-09-11 12:37:32', '2023-09-11 12:37:32', '2024-09-11 18:07:32'),
('c857fd312359e3fa6c77a8ddb60a02e443585a0b808c44b4abff59767b89556d30106c0c0f3d95c7', 1, 4, 'adminApiToken', '[]', 0, '2023-10-07 04:33:59', '2023-10-07 04:33:59', '2024-10-07 10:03:59'),
('d929bd0ab1bffaf42f40a17027c26ee3a6403650f594112c9a99f4a1c5374d9679de803b7edf7ddc', 1, 4, 'adminApiToken', '[]', 0, '2023-09-28 10:01:01', '2023-09-28 10:01:01', '2024-09-28 15:31:01'),
('d9f29ed0d6be329356ca4be84dcae7fa56eeb89df4efbf9fcbe1dfdc882d9befe5abdc2dd9373383', 1, 4, 'Admin', '[]', 0, '2020-09-27 11:42:30', '2020-09-27 11:42:30', '2021-09-27 17:12:30'),
('dbd05b1031b1f3346573015a911322dfde9a892dd534e0516366ccd4e933c043036f02555c7ff965', 1, 4, 'adminApiToken', '[]', 0, '2023-09-18 12:38:28', '2023-09-18 12:38:28', '2024-09-18 18:08:28'),
('dcf24d9385de348f6322373538b210a7596b880aa7def6aeec7a63e917cd6b8a003a035c9e9e4947', 1, 4, 'adminApiToken', '[]', 0, '2020-09-27 11:50:34', '2020-09-27 11:50:34', '2021-09-27 17:20:34'),
('e859c1de38c24733ef0c461cb9b64457d3668177134204bd0c90e9ae2aba948c06be875b402a8274', 1, 4, 'adminApiToken', '[]', 0, '2023-09-22 07:00:52', '2023-09-22 07:00:52', '2024-09-22 12:30:52'),
('eed58158b5907ecb2258199aa2e3bf25367212d0cb94f4c636c74f11c03df22846b93c070078eff4', 1, 4, 'adminApiToken', '[]', 0, '2023-09-28 10:12:04', '2023-09-28 10:12:04', '2024-09-28 15:42:04'),
('f1c13ea4834a3fbcf4928b97627a4c7c1355996866d29597cc2f098108ecf4755c12630485f2f73b', 1, 4, 'adminApiToken', '[]', 0, '2023-09-08 05:11:09', '2023-09-08 05:11:09', '2024-09-08 10:41:09'),
('f56042b71a344ef24d7664cd56fd08a0702ab4fdcaf49131c042bef617038f92e8d82d08f19632b2', 1, 4, 'adminApiToken', '[]', 0, '2023-09-29 09:58:49', '2023-09-29 09:58:49', '2024-09-29 15:28:49'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `type`, `title`, `duration`, `duration_type`, `durationMY`, `price`, `off`, `noOfPlace`, `featuredListings`, `featuredType`, `created_at`, `updated_at`, `discount`, `places`) VALUES
(1, 'FEATURED LISTING', 'New', 2, 0, '0', '3000', '3500', '4', '444', 'city_listing', '2023-09-20 13:20:27', '2023-09-23 12:34:05', '0.00', 0),
(6, 'BUSINESS LISTING', 'Best Deal', 1, 0, '0', '2000', '2500', '1', '1', 'search_ results', '2023-09-21 05:38:52', '2023-09-21 06:29:22', '0.00', 0),
(8, 'Ranking', 'City Ranking 1', 1, 0, '0', '1000', '1300', '1', '0', 'city_listing', '2023-09-25 12:11:30', '2023-09-25 11:44:38', '0.00', 0),
(9, 'Ranking', 'Ranking 2', 1, 0, '0', '500', '700', '2', '2', 'city_listing', '2023-09-25 13:01:49', '2023-09-27 07:52:05', '0.00', 0),
(10, 'Ranking', 'Category Reanking1', 1, 0, '0', '500', '1000', '2', '2', 'home_featured', '2023-09-25 13:23:45', '2023-09-27 07:56:17', '0.00', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `popup_ads`
--

INSERT INTO `popup_ads` (`id`, `title`, `type`, `content_type`, `value`, `logo`, `created_at`, `updated_at`) VALUES
(11, 'Index page popup', 'Popup Ads', 'video', 'UmhbcBClFm8', NULL, '2023-10-07 10:37:29', '2023-10-07 10:37:29'),
(13, 'sdd', 'Home Ads', 'video', 'UmhbcBClFm8', NULL, '2023-10-07 10:59:08', '2023-10-07 10:49:50'),
(14, 'sdd', 'Home Ads', 'video', 'UmhbcBClFm8', NULL, '2023-10-07 10:59:08', '2023-10-07 10:49:50'),
(18, 'Home Image In Slider', 'Home Ads', 'image', 'sd', '1696676874.jpg', '2023-10-07 11:37:54', '2023-10-07 11:37:54'),
(19, 'new image', 'Home Ads', 'image', 'https://fontawesome.com/', '1696680074.jpg', '2023-10-07 12:31:14', '2023-10-07 12:31:14');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(24, 'Rahul Soni', 44, 5, 'default_avatar.jpg', 'GFFDG', 7, '2023-09-25 16:04:31', '2023-09-25 13:24:09');

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(2, 1, ' \"Really useful app to find interesting things to see, do,\r\n                                            drink, and eat in new places. I\'ve been using it regularly\r\n                                            in my travels over the past few months.\"', 'Rahul Soni', '1', '2023-09-14 12:06:58', '2023-09-14 18:39:01'),
(3, 1, ' \"Really useful app to find interesting things to see, do,\r\n                                            drink, and eat in new places. I\'ve been using it regularly\r\n                                            in my travels over the past few months.\"', 'Anshul Meena', '1', '2023-09-14 12:07:16', '2023-09-14 18:39:03'),
(4, 1, ' \"Really useful app to find interesting things to see, do,\r\n                                            drink, and eat in new places. I\'ve been using it regularly\r\n                                            in my travels over the past few months.\"', 'Kisahn Gopal ', '1', '2023-09-14 12:07:47', '2023-09-14 18:39:00'),
(17, 1, 'e', 'wq', '0', '2023-09-16 18:07:44', '2023-09-16 18:07:44'),
(18, 1, 'e', 'wq', '0', '2023-09-16 18:08:35', '2023-09-16 18:08:35'),
(23, 1, 'y', 'u', '0', '2023-09-18 18:01:15', '2023-09-18 18:01:15');

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
  `address_filing` varchar(255) DEFAULT NULL,
  `block_number` varchar(255) DEFAULT NULL,
  `village_ward` varchar(255) DEFAULT NULL,
  `city_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users_login`
--

INSERT INTO `users_login` (`id`, `type`, `name`, `mobileNumber`, `email`, `email_verified_at`, `verificationCode`, `password`, `address_filing`, `block_number`, `village_ward`, `city_name`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Owner', 'Rahul Soni', '1234567890', NULL, NULL, '242722', '$2y$10$HVRZPRLiyBBk0kys2Z/zPeepEVK14xfBuXLBkXF8AX5wakFBV9Pte', NULL, NULL, NULL, NULL, '', 1, NULL, '2023-09-12 06:07:43', '2023-09-29 09:03:53'),
(2, 'Owner', 'Harshit Soni', '1234567899', NULL, NULL, '242722', '$2y$10$gL63C85L5dIqHXot.nHAqOfGGQ0vI5UVoHPi0HGt0nAJRV5XF8jEu', NULL, NULL, NULL, NULL, '1695115758.jpg', 1, NULL, '2023-09-12 06:07:43', '2023-09-29 08:57:02');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `businesslist`
--
ALTER TABLE `businesslist`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lead`
--
ALTER TABLE `lead`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `master`
--
ALTER TABLE `master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `popup_ads`
--
ALTER TABLE `popup_ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users_login`
--
ALTER TABLE `users_login`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

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
