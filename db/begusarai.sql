-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2023 at 02:53 PM
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
  `category` varchar(200) DEFAULT NULL,
  `uploaded_by` int(11) DEFAULT 1,
  `file_path` varchar(255) DEFAULT 'assets/images/blog/default.png',
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `category`, `uploaded_by`, `file_path`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Velit consectetur saepe adipisci pariatur laboriosam sit. Dolores qui et expedita rerum earum quia. Optio cumque quia dolor et. Doloremque provident vero suscipit.', 'Doloremque et reprehenderit tempore natus a animi. Corrupti porro ea voluptatem id. Excepturi atque aut perferendis. Consequatur sapiente qui distinctio totam eligendi.', '1', 1, 'assets/images/blog/default_news_a.jpg', 1, '2020-07-13 09:38:13', '2020-07-13 09:38:13'),
(2, 'Iste qui est ea facere quisquam rem. Magnam saepe qui consequatur qui iste delectus alias. Aliquam iusto quas voluptas commodi molestiae.', 'Et ipsum beatae consequatur. Ut provident id aliquam debitis enim. Cupiditate aliquam qui repellendus ad saepe. Voluptate alias qui fugiat nihil aut aspernatur. Laboriosam modi et quia nihil voluptate molestias porro.', '1', 1, 'assets/images/blog/default.png', 1, '2020-07-13 09:38:13', '2020-07-13 09:38:13'),
(3, 'Eos voluptatem dolorem laudantium facere ipsa aut. Qui illo quaerat eos recusandae culpa. Molestias et voluptates fugit ab totam laboriosam. Rem libero maxime perferendis facilis hic architecto.', 'Accusamus minima in nulla aut eos consequuntur vitae est. Ad quod ab at quo dolores porro. Voluptatem molestiae dolorem a unde nobis laudantium totam.', '1', 1, 'assets/images/blog/default.png', 1, '2020-07-13 09:38:13', '2020-07-13 09:38:13'),
(4, 'Reiciendis dolores in sunt illo. Repudiandae deleniti soluta tempore voluptatum consectetur voluptatem perspiciatis. Rerum qui eius aut adipisci.', 'Quam aut eos ullam. Dolor et vitae aut maxime. Ducimus qui harum voluptatum deserunt dolorum corporis tempore.', '1', 1, 'assets/images/blog/default.png', 1, '2020-07-13 09:38:13', '2020-07-13 09:38:13'),
(5, 'Vel numquam non ipsam amet dicta doloremque eligendi. Nulla rerum aut reiciendis voluptas mollitia et. Atque iste dolor animi neque consequuntur labore doloribus.', 'Dolorem unde tempora eum. Velit eum velit quia in repudiandae natus et incidunt. Corrupti eum dolor nobis est quibusdam. Velit iusto consectetur reiciendis ex aut consequuntur odit. Excepturi laborum est occaecati fugiat voluptas.', '1', 1, 'assets/images/blog/default.png', 1, '2020-07-13 09:38:13', '2020-07-13 09:38:13'),
(6, 'Sed qui inventore voluptas iste pariatur nihil fugiat. Laboriosam nam fugiat odit temporibus et. Porro omnis quaerat nobis voluptas et cupiditate nam. Ut id eum eos. Quas voluptatem nobis rem non.', 'Assumenda vel tenetur saepe repellendus amet. Quo qui placeat aut et laborum magnam. Corporis et velit quibusdam ipsa. Alias excepturi labore et hic necessitatibus dicta.', '1', 1, 'assets/images/blog/default.png', 1, '2020-07-13 09:38:13', '2020-07-13 09:38:13'),
(7, 'Velit at magnam libero quibusdam cum. Accusantium modi porro excepturi sit sequi. Facilis nihil inventore a qui aut.', 'Quia est numquam dolor enim eum est. Amet voluptatem est architecto voluptatem vero vitae ut.', '1', 1, 'assets/images/blog/default.png', 1, '2020-07-13 09:38:13', '2020-07-13 09:38:13'),
(8, 'Accusamus et sit saepe ut eum. Qui error ipsum dolor optio provident error aut. Et facilis corrupti saepe. Aliquam et omnis quibusdam hic dicta.', 'Ut dolorum aut labore corrupti occaecati ipsa dolores est. Officiis ipsam dolores tenetur sequi velit rerum dolor. Magni debitis pariatur asperiores nesciunt perferendis. Molestiae autem non est veritatis.', '1', 1, 'assets/images/blog/default.png', 1, '2020-07-13 09:38:13', '2020-07-13 09:38:13'),
(9, 'Repudiandae id aperiam est et. Delectus possimus ipsam est accusamus.', 'Ad maxime et quam sed minima sint quia. Facilis odio et voluptas earum hic quas magnam numquam. Ut debitis cupiditate eos enim.', '1', 1, 'assets/images/blog/default.png', 1, '2020-07-13 09:38:13', '2020-07-13 09:38:13'),
(10, 'Quis pariatur porro sint vel excepturi. Delectus facilis rerum sed molestiae.', 'Quos harum officia esse sunt in qui natus nihil. Est eligendi sint possimus aut. Quis et qui repellat inventore et. Ut ut ratione id accusamus vel.', '1', 1, 'assets/images/blog/default.png', 1, '2020-07-13 09:38:13', '2020-07-13 09:38:13'),
(14, 'Quam accusamus molestias qui optio fugiat omnis autem. Reprehenderit adipisci accusantium qui iusto sapiente sed voluptatem quasi. Laboriosam voluptas blanditiis earum amet voluptas sit.', 'Quas laboriosam corporis dolorem id itaque et. Est aut illo alias aut sint. Eaque sunt impedit mollitia nihil impedit repellat architecto.', 'Latest News', 1, 'assets/images/blog/default_news_a.jpg', 1, '2020-07-13 09:41:03', '2020-09-28 06:48:49'),
(15, 'Et deleniti maiores eum consectetur facere inventore. Enim praesentium quo quia praesentium. Est voluptatem qui molestiae voluptas harum. Ut inventore impedit sequi vitae fugit aut est repellat.', 'Adipisci expedita fuga consequatur nobis aut suscipit iusto blanditiis. Magnam accusamus necessitatibus numquam et repellendus aut culpa consectetur. Et quod accusamus ut harum adipisci ab. Vero debitis nobis veniam quia cupiditate voluptates. Pariatur est doloremque eum voluptas incidunt vero quas et.', 'Latest News', 1, 'assets/images/blog/default_news_a.jpg', 1, '2020-07-13 09:41:03', '2020-09-28 06:49:00'),
(16, 'Animi dignissimos natus optio voluptatum officiis. Culpa aspernatur fugit nemo non officia.', 'Mollitia voluptatem est aut similique qui commodi vitae. Est in perspiciatis eligendi eveniet sunt. Quisquam error exercitationem odit aut.', 'Latest News', 1, 'assets/images/blog/default_news_a.jpg', 1, '2020-07-13 09:41:03', '2020-09-28 07:39:46'),
(17, 'Et sit quia veniam qui optio. Ut dolorum illum nemo error neque repellendus. Expedita atque consectetur consequatur.', 'Quas est architecto natus. Non libero repellat tempore ut excepturi recusandae a. Officiis repellendus aut neque aliquam. Tenetur aut placeat iure.', '1', 1, 'assets/images/blog/default.png', 1, '2020-07-13 09:41:03', '2020-07-13 09:41:03'),
(18, 'Dolor consequatur repudiandae molestias dolorum hic autem corrupti. Et dolores porro totam quidem sequi et. Ab voluptas soluta qui eum assumenda.', 'Dolor provident consequatur autem dicta qui aut. Est non assumenda provident ut. Eos maiores quos molestias alias maxime omnis nisi voluptatibus. Nisi vero quam incidunt ut nobis.', '1', 1, 'assets/images/blog/default.png', 1, '2020-07-13 09:41:03', '2020-07-13 09:41:03'),
(19, 'Perspiciatis officia qui rerum enim sit non debitis. Omnis nesciunt voluptas saepe optio labore. Dolore voluptatum qui exercitationem optio eum exercitationem.', 'Et assumenda non rerum et. Quibusdam et nam eos qui quia minima sit rerum. Perspiciatis velit impedit fuga magni voluptas voluptas blanditiis eius.', '1', 1, 'assets/images/blog/default.png', 1, '2020-07-13 09:41:03', '2020-07-13 09:41:03'),
(20, 'Sed eaque enim rerum sapiente dolorem porro aut. Rerum quae debitis deleniti quibusdam veniam. Delectus unde nulla rerum vel sed. Accusantium quae optio animi minus est sed.', 'Corporis est optio exercitationem nesciunt velit quos iste. Consectetur praesentium aliquid ipsa ducimus reiciendis.', '1', 1, 'assets/images/blog/default.png', 1, '2020-07-13 09:41:03', '2020-07-13 09:41:03');

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
(2, 'Master', 'abcd', 'abcd', NULL, 'Active', '2023-09-07 07:13:17', '2023-09-07 13:00:30'),
(3, 'abcdM', 'title', 'sfss', '1694069060.jpg', 'Active', '2023-09-07 07:14:20', '2023-09-07 07:14:20');

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
('1edda5920e8507705c3d3f1d7c184a0aaf4d5450bae495abca5a784ce053e5bb0e1254669e1de016', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 06:19:05', '2023-09-04 06:19:05', '2024-09-04 11:49:05'),
('2fbba7fceb055e6575e671c0f7b10a91edd839261e260471611139fbc100961402c4c4c7430341de', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 06:03:02', '2023-09-04 06:03:02', '2024-09-04 11:33:02'),
('30157c3e8deccfa62315c7148854169a64c3920c97a4b545e2f6be06b5309a7564de8e9d76d699a2', 1, 4, 'adminApiToken', '[]', 0, '2023-09-07 04:38:09', '2023-09-07 04:38:09', '2024-09-07 10:08:09'),
('313fcbd98202b2ddb797cde21785740199f828cbfdea01a4ffa90a3b6523be68472d4b336eb9824d', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 09:46:21', '2023-09-04 09:46:21', '2024-09-04 15:16:21'),
('34cfca8b577333694edb5d4a43e45503ca2478f916462fe0c4d3c64a66dfb59f222dc11b06849cf7', 2, 1, 'userApiToken', '[]', 0, '2020-07-18 11:47:50', '2020-07-18 11:47:50', '2021-07-18 17:17:50'),
('40d949ec1e4005369183121030e1926d19f67fe76ce7880fd70cb61bb36f44f6e14ef01f91dac974', 1, 4, 'adminApiToken', '[]', 0, '2023-09-06 09:23:19', '2023-09-06 09:23:19', '2024-09-06 14:53:19'),
('4a58ac7d639bf5979575952f0d5462d4db0d68ce827b7a44263bf7de507763fda8771c1fc33e0b30', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 08:47:11', '2023-09-04 08:47:11', '2024-09-04 14:17:11'),
('55f9326aea22d0ad8a365398a81225484943154fc883b11343b25f69507062b24ff60635143e4925', 1, 4, 'adminApiToken', '[]', 0, '2023-09-07 06:56:15', '2023-09-07 06:56:15', '2024-09-07 12:26:15'),
('67cba7b98c79510c5fac62493938fa857b1cf00da731c40c852ec4949f04be06e0dd476a84d94f8f', 1, 4, 'adminApiToken', '[]', 0, '2020-09-27 10:50:50', '2020-09-27 10:50:50', '2021-09-27 16:20:50'),
('6c499106b84461888f3563bc2ca0166ef9595da9e8b2a98ce92641c1d50f05c0e747bc11e1935daf', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 06:03:31', '2023-09-04 06:03:31', '2024-09-04 11:33:31'),
('77e00bb4c445d82f6fa939489cc7ecf0a1f5203a5916b7946ef97816b41ae6703df53bfb679ccbef', 1, 4, 'adminApiToken', '[]', 0, '2023-09-07 05:05:11', '2023-09-07 05:05:11', '2024-09-07 10:35:11'),
('88cf5da31e2e53a53ea50c1307b5d6e50791db94cc3726f64d525b258d2f31baad5667cfe4c0f666', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 07:15:09', '2023-09-04 07:15:09', '2024-09-04 12:45:09'),
('92d0a713ec1ba65291849728c8eff0e33e7aea9afa9438d684ed0c73c4429a305a83e8dcf265dce1', 1, 4, 'adminApiToken', '[]', 0, '2023-09-07 04:54:49', '2023-09-07 04:54:49', '2024-09-07 10:24:49'),
('9ad5d82c8aa935e7646d8ae22779b3c8c603dfc162a9888a45a6d14ab5c61623ac551360ec3fee77', 1, 4, 'adminApiToken', '[]', 0, '2023-09-04 11:29:43', '2023-09-04 11:29:43', '2024-09-04 16:59:43'),
('a419addf4ae7bea31145205699c7e95182f9c9957068f6e32554187ab3f7980bc5374635df10a69f', 1, 4, 'adminApiToken', '[]', 0, '2020-09-28 06:46:49', '2020-09-28 06:46:49', '2021-09-28 12:16:49'),
('a6236782ee5a24d3bfc88bbd7e050bef2a3937706f206c4bcb3bf3d99127ada79b9512d4517df2a2', 1, 4, 'adminApiToken', '[]', 0, '2023-09-07 04:41:37', '2023-09-07 04:41:37', '2024-09-07 10:11:37'),
('a63a5ed742a080a9d8cf1379aa60e1ba0b0fbc087ffea1e858144bf92f87931119eedd334ace7ffb', 1, 4, 'adminApiToken', '[]', 0, '2020-10-15 05:50:50', '2020-10-15 05:50:50', '2021-10-15 11:20:50'),
('ab09563fd805d57dc698103035caa419b87a8872d5058901a99919a6770865ef4d1eb0030b7a0f7c', 1, 1, 'userApiToken', '[]', 0, '2020-07-18 11:43:13', '2020-07-18 11:43:13', '2021-07-18 17:13:13'),
('bb42f06a00a887377a917efd4b8cc381c39b9a18d9d55ea457976b6deaab1b50a18f8545d407ddab', 1, 4, 'adminApiToken', '[]', 0, '2020-09-27 11:51:14', '2020-09-27 11:51:14', '2021-09-27 17:21:14'),
('d9f29ed0d6be329356ca4be84dcae7fa56eeb89df4efbf9fcbe1dfdc882d9befe5abdc2dd9373383', 1, 4, 'Admin', '[]', 0, '2020-09-27 11:42:30', '2020-09-27 11:42:30', '2021-09-27 17:12:30'),
('dcf24d9385de348f6322373538b210a7596b880aa7def6aeec7a63e917cd6b8a003a035c9e9e4947', 1, 4, 'adminApiToken', '[]', 0, '2020-09-27 11:50:34', '2020-09-27 11:50:34', '2021-09-27 17:20:34');

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
(13, 'Owner', 'rs', '111111111111111', 'rahulyuvmedia@gmail.comt', NULL, '111111111111', '11111', '1694090232.jpg', 0, NULL, '2023-09-04 06:04:55', '2023-09-07 13:07:12'),
(14, 'Owner', 'new', '11111111111111111', 'rahulyuvmedia@gmail.comtf', NULL, '111111111111', 'rahul', '1694090232.jpg', 0, NULL, '2023-09-04 06:04:55', '2023-09-07 13:07:12');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `mobileNumber` (`mobileNumber`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master`
--
ALTER TABLE `master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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