-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2018 at 08:46 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone3`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` int(11) DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_id`, `subject_type`, `causer_id`, `causer_type`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'default', 'created', 17, 'App\\Comment', 1, 'App\\User', '{\"attributes\":{\"post_id\":5}}', '2018-02-22 05:38:28', '2018-02-22 05:38:28'),
(2, 'default', 'created', 18, 'App\\Comment', 1, 'App\\User', '{\"attributes\":{\"post_id\":5}}', '2018-02-22 05:39:48', '2018-02-22 05:39:48'),
(3, 'default', 'created', 19, 'App\\Comment', 1, 'App\\User', '{\"attributes\":{\"post_id\":5}}', '2018-02-22 05:40:28', '2018-02-22 05:40:28'),
(4, 'default', 'created', 20, 'App\\Comment', 2, 'App\\User', '{\"attributes\":{\"post_id\":1}}', '2018-02-22 05:50:35', '2018-02-22 05:50:35'),
(5, 'default', 'created', 21, 'App\\Comment', 2, 'App\\User', '{\"attributes\":{\"post_id\":2}}', '2018-02-22 06:03:09', '2018-02-22 06:03:09'),
(6, 'default', 'created', 22, 'App\\Comment', 2, 'App\\User', '{\"attributes\":{\"post_id\":2}}', '2018-02-22 06:04:38', '2018-02-22 06:04:38'),
(7, 'default', 'created', 7, 'App\\Post', 2, 'App\\User', '{\"attributes\":{\"topic_id\":3}}', '2018-02-22 06:27:01', '2018-02-22 06:27:01'),
(10, 'default', 'created', 25, 'App\\Comment', 2, 'App\\User', '{\"attributes\":{\"post_id\":5}}', '2018-02-22 09:10:40', '2018-02-22 09:10:40'),
(13, 'default', 'deleted', 25, 'App\\Comment', 2, 'App\\User', '{\"attributes\":{\"post_id\":5}}', '2018-02-22 09:31:38', '2018-02-22 09:31:38'),
(14, 'default', 'deleted', 19, 'App\\Comment', 1, 'App\\User', '{\"attributes\":{\"post_id\":5}}', '2018-02-22 09:32:16', '2018-02-22 09:32:16'),
(15, 'default', 'created', 27, 'App\\Comment', 2, 'App\\User', '{\"attributes\":{\"post_id\":5}}', '2018-02-22 11:18:59', '2018-02-22 11:18:59'),
(16, 'default', 'created', 8, 'App\\Post', 2, 'App\\User', '{\"attributes\":{\"topic_id\":13}}', '2018-02-22 14:02:40', '2018-02-22 14:02:40'),
(17, 'default', 'created', 9, 'App\\Post', 2, 'App\\User', '{\"attributes\":{\"topic_id\":14}}', '2018-02-22 14:33:31', '2018-02-22 14:33:31'),
(18, 'default', 'created', 10, 'App\\Post', 3, 'App\\User', '{\"attributes\":{\"topic_id\":6}}', '2018-02-22 15:25:17', '2018-02-22 15:25:17'),
(19, 'default', 'created', 11, 'App\\Post', 3, 'App\\User', '{\"attributes\":{\"topic_id\":3}}', '2018-02-22 15:26:13', '2018-02-22 15:26:13'),
(20, 'default', 'created', 28, 'App\\Comment', 3, 'App\\User', '{\"attributes\":{\"post_id\":9}}', '2018-02-22 15:26:43', '2018-02-22 15:26:43'),
(21, 'default', 'created', 29, 'App\\Comment', 2, 'App\\User', '{\"attributes\":{\"post_id\":8}}', '2018-02-23 02:17:12', '2018-02-23 02:17:12'),
(22, 'default', 'deleted', 22, 'App\\Comment', 2, 'App\\User', '{\"attributes\":{\"post_id\":2}}', '2018-02-23 02:18:07', '2018-02-23 02:18:07'),
(23, 'default', 'created', 30, 'App\\Comment', 2, 'App\\User', '{\"attributes\":{\"post_id\":9}}', '2018-02-23 03:23:45', '2018-02-23 03:23:45'),
(24, 'default', 'created', 31, 'App\\Comment', 2, 'App\\User', '{\"attributes\":{\"post_id\":11}}', '2018-02-23 04:40:06', '2018-02-23 04:40:06'),
(25, 'default', 'deleted', 17, 'App\\Comment', 1, 'App\\User', '{\"attributes\":{\"post_id\":5}}', '2018-02-26 03:03:23', '2018-02-26 03:03:23'),
(26, 'default', 'created', 32, 'App\\Comment', 5, 'App\\User', '{\"attributes\":{\"post_id\":5}}', '2018-03-03 05:57:20', '2018-03-03 05:57:20'),
(27, 'default', 'created', 33, 'App\\Comment', 3, 'App\\User', '{\"attributes\":{\"post_id\":5}}', '2018-03-03 06:43:52', '2018-03-03 06:43:52'),
(28, 'default', 'created', 12, 'App\\Post', 5, 'App\\User', '{\"attributes\":{\"topic_id\":4}}', '2018-03-03 14:41:43', '2018-03-03 14:41:43'),
(29, 'default', 'created', 13, 'App\\Post', 5, 'App\\User', '{\"attributes\":{\"topic_id\":1}}', '2018-03-03 14:50:18', '2018-03-03 14:50:18'),
(30, 'default', 'created', 14, 'App\\Post', 3, 'App\\User', '{\"attributes\":{\"topic_id\":14}}', '2018-03-03 15:13:43', '2018-03-03 15:13:43'),
(31, 'default', 'created', 15, 'App\\Post', 3, 'App\\User', '{\"attributes\":{\"topic_id\":6}}', '2018-03-03 15:28:00', '2018-03-03 15:28:00'),
(32, 'default', 'created', 16, 'App\\Post', 1, 'App\\User', '{\"attributes\":{\"topic_id\":14}}', '2018-03-03 15:29:49', '2018-03-03 15:29:49'),
(33, 'default', 'created', 17, 'App\\Post', 1, 'App\\User', '{\"attributes\":{\"topic_id\":2}}', '2018-03-03 15:31:57', '2018-03-03 15:31:57'),
(34, 'default', 'created', 18, 'App\\Post', 1, 'App\\User', '{\"attributes\":{\"topic_id\":14}}', '2018-03-03 15:33:02', '2018-03-03 15:33:02'),
(35, 'default', 'created', 34, 'App\\Comment', 1, 'App\\User', '{\"attributes\":{\"post_id\":18}}', '2018-03-05 04:41:55', '2018-03-05 04:41:55'),
(36, 'default', 'deleted', 34, 'App\\Comment', 1, 'App\\User', '{\"attributes\":{\"post_id\":18}}', '2018-03-05 04:43:18', '2018-03-05 04:43:18'),
(37, 'default', 'created', 35, 'App\\Comment', 1, 'App\\User', '{\"attributes\":{\"post_id\":18}}', '2018-03-05 04:43:27', '2018-03-05 04:43:27'),
(38, 'default', 'created', 36, 'App\\Comment', 1, 'App\\User', '{\"attributes\":{\"post_id\":15}}', '2018-03-05 04:55:20', '2018-03-05 04:55:20'),
(39, 'default', 'created', 19, 'App\\Post', 2, 'App\\User', '{\"attributes\":{\"topic_id\":6}}', '2018-03-05 05:02:16', '2018-03-05 05:02:16'),
(40, 'default', 'deleted', 19, 'App\\Post', 2, 'App\\User', '{\"attributes\":{\"topic_id\":6}}', '2018-03-05 05:08:44', '2018-03-05 05:08:44'),
(41, 'default', 'created', 20, 'App\\Post', 2, 'App\\User', '{\"attributes\":{\"topic_id\":6}}', '2018-03-05 05:09:07', '2018-03-05 05:09:07'),
(42, 'default', 'created', 37, 'App\\Comment', 3, 'App\\User', '{\"attributes\":{\"post_id\":18}}', '2018-03-05 06:43:00', '2018-03-05 06:43:00'),
(43, 'default', 'deleted', 11, 'App\\Post', 3, 'App\\User', '{\"attributes\":{\"topic_id\":3}}', '2018-03-05 06:49:42', '2018-03-05 06:49:42'),
(44, 'default', 'created', 38, 'App\\Comment', 6, 'App\\User', '{\"attributes\":{\"post_id\":18}}', '2018-05-05 15:32:57', '2018-05-05 15:32:57'),
(45, 'default', 'created', 21, 'App\\Post', 6, 'App\\User', '{\"attributes\":{\"topic_id\":5}}', '2018-05-05 15:54:28', '2018-05-05 15:54:28'),
(46, 'default', 'created', 39, 'App\\Comment', 6, 'App\\User', '{\"attributes\":{\"post_id\":15}}', '2018-05-05 15:55:05', '2018-05-05 15:55:05'),
(47, 'default', 'created', 40, 'App\\Comment', 6, 'App\\User', '{\"attributes\":{\"post_id\":21}}', '2018-05-05 16:23:25', '2018-05-05 16:23:25'),
(48, 'default', 'created', 22, 'App\\Post', 6, 'App\\User', '{\"attributes\":{\"topic_id\":3}}', '2018-05-05 16:46:29', '2018-05-05 16:46:29'),
(49, 'default', 'deleted', 21, 'App\\Post', 6, 'App\\User', '{\"attributes\":{\"topic_id\":5}}', '2018-05-05 16:53:48', '2018-05-05 16:53:48'),
(50, 'default', 'deleted', 22, 'App\\Post', 6, 'App\\User', '{\"attributes\":{\"topic_id\":3}}', '2018-05-05 16:53:59', '2018-05-05 16:53:59'),
(51, 'default', 'created', 23, 'App\\Post', 6, 'App\\User', '{\"attributes\":{\"topic_id\":1}}', '2018-05-05 16:54:34', '2018-05-05 16:54:34'),
(55, 'default', 'created', 25, 'App\\Post', 6, 'App\\User', '{\"attributes\":{\"topic_id\":1}}', '2018-05-05 18:09:54', '2018-05-05 18:09:54'),
(56, 'default', 'deleted', 25, 'App\\Post', 6, 'App\\User', '{\"attributes\":{\"topic_id\":1}}', '2018-05-05 18:17:03', '2018-05-05 18:17:03'),
(57, 'default', 'created', 26, 'App\\Post', 6, 'App\\User', '{\"attributes\":{\"topic_id\":1}}', '2018-05-05 18:17:34', '2018-05-05 18:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'best space shuttle so far...........', 1, 1, '2018-02-20 10:57:56', '2018-02-20 10:57:56'),
(2, 'Lulz!', 2, 2, '2018-02-20 11:08:55', '2018-02-20 11:08:55'),
(3, 'Sample edit...', 5, 1, '2018-02-21 16:01:38', '2018-03-03 14:39:28'),
(15, 'Hey!', 3, 1, '2018-02-22 05:25:32', '2018-02-22 05:25:32'),
(16, 'What\'s up man?', 3, 1, '2018-02-22 05:26:40', '2018-02-22 05:26:40'),
(18, 'ASASQWQ', 5, 1, '2018-02-22 05:39:48', '2018-02-22 05:39:48'),
(20, 'KEK', 1, 2, '2018-02-22 05:50:35', '2018-02-22 05:50:35'),
(21, '12321321', 2, 2, '2018-02-22 06:03:09', '2018-02-22 06:03:09'),
(27, 'Pogi', 5, 2, '2018-02-22 11:18:59', '2018-02-22 11:18:59'),
(28, 'HYPU!!!', 9, 3, '2018-02-22 15:26:43', '2018-02-22 15:26:43'),
(29, 'COMMENT', 8, 2, '2018-02-23 02:17:12', '2018-02-23 02:17:12'),
(30, 'Hi Jane <3', 9, 2, '2018-02-23 03:23:45', '2018-02-23 04:21:28'),
(32, 'KEKEKEKE', 5, 5, '2018-03-03 05:57:19', '2018-03-03 05:57:19'),
(33, 'lorem ipsum.. lorem ipsum...', 5, 3, '2018-03-03 06:43:52', '2018-03-03 06:43:52'),
(35, 'delete dis mushit', 18, 1, '2018-03-05 04:43:27', '2018-03-05 04:43:40'),
(36, 'sexy', 15, 1, '2018-03-05 04:55:20', '2018-03-05 04:55:20'),
(37, 'comment (edited)', 18, 3, '2018-03-05 06:43:00', '2018-03-05 06:43:14'),
(38, 'Hehehehllo asdasdas', 18, 6, '2018-05-05 15:32:56', '2018-05-05 15:33:11'),
(39, 'manyak si mark', 15, 6, '2018-05-05 15:55:04', '2018-05-05 15:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `follow_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `user_id`, `follow_id`, `created_at`, `updated_at`) VALUES
(3, 3, 5, '2018-02-23 11:04:30', '2018-02-23 11:04:30'),
(4, 5, 1, '2018-02-23 11:04:30', '2018-02-23 11:04:30'),
(7, 2, 1, '2018-02-23 13:11:16', '2018-02-23 13:11:16'),
(32, 2, 3, '2018-02-23 14:12:24', '2018-02-23 14:12:24'),
(42, 5, 3, '2018-03-03 03:15:45', '2018-03-03 03:15:45'),
(75, 5, 2, '2018-03-03 04:04:41', '2018-03-03 04:04:41'),
(78, 1, 2, '2018-03-03 14:31:30', '2018-03-03 14:31:30'),
(83, 1, 3, '2018-03-05 04:56:08', '2018-03-05 04:56:08'),
(84, 3, 1, '2018-03-05 06:44:55', '2018-03-05 06:44:55');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `user_id`, `created_at`, `updated_at`) VALUES
(30, 'Hi Jane <3', 1, '2018-02-26 16:17:05', '2018-02-26 16:17:05'),
(31, 'Hello Mark :\">', 3, '2018-02-26 16:17:13', '2018-02-26 16:17:13'),
(32, 'Kekekeke', 1, '2018-02-27 02:38:39', '2018-02-27 02:38:39'),
(33, 'hihihi', 1, '2018-02-27 03:13:27', '2018-02-27 03:13:27'),
(34, 'Helllo', 1, '2018-02-27 03:14:07', '2018-02-27 03:14:07'),
(35, 'Hi mark...', 3, '2018-02-27 04:16:15', '2018-02-27 04:16:15'),
(52, 'Lorem ipsum dolor........ Lorem ipsum dolor........ Lorem ipsum dolor........ Lorem ipsum dolor........', 3, '2018-03-03 02:51:37', '2018-03-03 02:51:37'),
(53, 'Dolor lorem... Dolor lorem... Dolor lorem... Dolor lorem... Dolor lorem... Dolor lorem... Dolor lorem... Dolor lorem...', 2, '2018-03-03 02:51:53', '2018-03-03 02:51:53'),
(54, 'a', 1, '2018-03-03 03:05:04', '2018-03-03 03:05:04'),
(55, 'Hello', 1, '2018-03-05 04:27:34', '2018-03-05 04:27:34'),
(56, 'Hehehe', 2, '2018-03-05 04:28:10', '2018-03-05 04:28:10'),
(57, 'john doe', 2, '2018-03-05 04:31:00', '2018-03-05 04:31:00'),
(58, 'dafuk', 1, '2018-03-05 05:31:57', '2018-03-05 05:31:57'),
(59, 'dfqk', 1, '2018-03-05 05:32:18', '2018-03-05 05:32:18'),
(60, 'Lorence', 1, '2018-03-05 06:48:14', '2018-03-05 06:48:14'),
(61, 'grasl', 3, '2018-03-05 06:48:28', '2018-03-05 06:48:28'),
(62, '~Miracle', 1, '2018-03-05 06:48:39', '2018-03-05 06:48:39'),
(63, 'Trust the process', 1, '2018-03-05 06:49:17', '2018-03-05 06:49:17');

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
(3, '2018_02_14_102342_create_posts_table', 1),
(4, '2018_02_14_103127_create_topics_table', 1),
(5, '2018_02_14_103204_create_comments_table', 1),
(6, '2018_02_14_104254_create_user_details_table', 1),
(7, '2018_02_14_111054_add_topic_id_to_post', 1),
(8, '2018_02_14_111941_create_messages_table', 1),
(9, '2018_02_20_180357_update_tables_for_user_details', 1),
(10, '2018_02_20_221928_update_bio_column_for_user_details', 2),
(11, '2018_02_22_113635_create_activity_log_table', 3),
(13, '2018_02_23_143408_create_followers_table', 4);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `image`, `video`, `user_id`, `topic_id`, `created_at`, `updated_at`) VALUES
(1, 'Space X - Falcon Heavy', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'falcon heavy.jpg', '', 1, 1, '2018-02-20 10:57:19', '2018-02-22 03:21:14'),
(2, 'TESLA ROADSTER', 'One true car', 'tesla.jpg', '', 1, 1, '2018-02-20 11:06:29', '2018-02-20 14:53:49'),
(3, 'Daily News!!!!!!!!!!!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', '', 2, 6, '2018-02-20 11:08:24', '2018-02-20 11:08:24'),
(5, 'New Year', 'Celebrating new year in Hong Kong', 'newyear.JPG', '', 1, 6, '2018-02-21 16:01:01', '2018-02-22 09:05:18'),
(7, 'Geometry', 'Lorem ipsum dolor!\r\nLorem ipsum dolor!\r\nLorem ipsum dolor!', '', '', 2, 3, '2018-02-22 06:27:01', '2018-02-22 06:27:01'),
(8, 'Game of Thrones Season 8 hype!', 'I can\'t wait to watch the final season of game of thrones! vry excited!', 'gots8.jpg', '', 2, 13, '2018-02-22 14:02:40', '2018-02-22 14:02:40'),
(9, 'World of Warcraft Classic', 'WoW Classic is going to happen soon >:D', 'wow.jpg', '', 2, 14, '2018-02-22 14:33:31', '2018-02-23 05:30:18'),
(10, 'Sample post ni Jane Doe', 'Nagsalita si Jane Doe tungkol sa kanyang unang talata.', '', '', 3, 6, '2018-02-22 15:25:17', '2018-02-22 15:25:17'),
(12, 'OpenAI', 'I love bacon..', 'openai.png', '', 5, 4, '2018-03-03 14:41:43', '2018-03-03 14:41:43'),
(13, 'The Boring Company', 'A real flamethrower to kill all zombies.', 'flamethrower.jpg', '', 5, 1, '2018-03-03 14:50:18', '2018-03-03 14:50:18'),
(14, 'Final Fantasy 7', 'Kekekekeke', 'ff7.jpg', '', 3, 14, '2018-03-03 15:13:43', '2018-03-03 15:25:26'),
(15, 'My name is Aeris Gainsborough', 'edited', 'aeris.jpg', '', 3, 6, '2018-03-03 15:28:00', '2018-03-05 06:43:45'),
(16, 'Zidane Tribal', 'Say something...', 'zidane.jpg', '', 1, 14, '2018-03-03 15:29:49', '2018-03-03 15:29:49'),
(17, 'A blackhole', '...kjljlk', 'blackhole.jpg', '', 1, 2, '2018-03-03 15:31:57', '2018-03-05 04:28:47'),
(18, 'Dota 2', 'dutaqwewq', 'dota.jpg', '', 1, 14, '2018-03-03 15:33:02', '2018-03-05 04:33:28'),
(20, 'New Post', 'A news', '', '', 2, 6, '2018-03-05 05:09:07', '2018-03-05 05:09:07'),
(26, 'A short post', 'I will handle long posts later.\r\nA Tesla coil.\r\n<h1>hello</h1>', 'coil.jpg', '', 6, 1, '2018-05-05 18:17:34', '2018-05-05 18:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `topic`, `created_at`, `updated_at`) VALUES
(1, 'Engineering', NULL, NULL),
(2, 'Science', NULL, NULL),
(3, 'Mathematics', NULL, NULL),
(4, 'Software', NULL, NULL),
(5, 'Hardware', NULL, NULL),
(6, 'News', NULL, NULL),
(13, 'Movies', NULL, NULL),
(14, 'Games', NULL, NULL);

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
(1, 'Mark Munsayac', 'mark@gmail.com', '$2y$10$6GccUd7fmI.OKAddtMBwNOMfanSOUBw7hXMsiSXikMno4dq4mJYZi', '1u8mqWBd0WqxKrhe45zAtAiJLVHxTSp7MBTExmvcX316yqKQpsrWYPBkeUS7', '2018-02-20 10:50:40', '2018-02-21 11:00:33'),
(2, 'John Doe', 'john@gmail.com', '$2y$10$OlVfLF0DL/k4uPut2RcJpeX02RA6lmlly8RJVUTsC3rfUOr8dC/zK', 'Lh0gkz5giWxO6WCnjAwB02W7vG0Bk4jAU7alJb21fhGZdXZW3HEBK6rbx9Kl', '2018-02-20 11:07:03', '2018-02-20 11:07:03'),
(3, 'Jane Doe', 'jane@gmail.com', '$2y$10$bE6.IB6r06ydWxutMB2kO.RFW0sshZ1iU2Ed7xINiaouGfy2DjZLm', '4PjdvhuWQqWonPJ9P2fAPhylk5kId1RVLkOG32nJvVU6gTucRanKJQ7r49Zj', '2018-02-21 15:02:46', '2018-02-21 15:02:46'),
(5, 'Elon Musk', 'elonmusk@gmail.com', '$2y$10$8qkacQZ5euHCGCd/eZtGO.RdH4rGqEYr2m6Fm7yYfhRGSK6zU4b/m', 'jA2lu80gsV40JvHofFKFwAfryzOuDk13oCibws6lB8c8GwAiglZvV2WDvjTy', '2018-02-21 15:04:38', '2018-02-21 15:04:38'),
(6, 'Nikola Tesla', 'tesla@gmail.com', '$2y$10$k07534kNIUFzZwqCZynqduUi3jZkJw0gJHNfHZlibZ9iu5x2v7OAi', NULL, '2018-05-05 15:28:43', '2018-05-05 18:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` mediumtext COLLATE utf8mb4_unicode_ci,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `avatar`, `age`, `gender`, `bio`, `location`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'beijing.JPG', 24, 'Male', '*Insert very long bio here...*', 'PH', 1, '2018-02-20 10:50:40', '2018-03-05 02:33:03'),
(2, 'joker.jpg', 45, 'Male', 'I am John Doe.. Duh?!', 'Sa puso ni Jane Doe', 2, '2018-02-20 11:07:04', '2018-02-23 05:17:19'),
(3, 'aeris.png', 16, 'Female', 'Bio ni Jane Doe', 'Sa puso mo', 3, '2018-02-21 15:02:46', '2018-03-05 06:47:09'),
(5, NULL, NULL, NULL, NULL, NULL, 5, '2018-02-21 15:04:38', '2018-02-21 15:04:38'),
(6, 'tesla.jpeg', 42, 'Male', 'Nikola Tesla', 'NY', 6, '2018-05-05 15:28:43', '2018-05-05 16:15:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_topic_id_foreign` (`topic_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_details_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
