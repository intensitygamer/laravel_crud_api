-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 11:56 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schedeasy_clients`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `crm_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `user_id`, `name`, `created_at`, `updated_at`, `crm_url`) VALUES
(1, 56, 'Client 1', '2021-05-13 09:28:35', '2021-05-13 09:28:35', 'client1.schedeasy.com'),
(2, 58, 'Client 2', '2021-05-06 09:28:38', '2021-05-06 09:28:38', 'client2.schedeasy.com');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_05_12_101807_create_clients_table', 1),
(10, '2021_05_13_012325_create_user_types_table', 1),
(11, '2021_05_13_014800_create_user_details_table', 1),
(12, '2021_05_13_062302_create_projects_table', 1),
(13, '2021_05_18_062121_create_staffs_table', 2),
(15, '2021_05_20_083003_add_crm_url_to_clients', 3),
(16, '2021_05_27_080916_add_googleid_to_users', 4),
(17, '2021_05_27_081132_add_googleid_to_users', 5),
(18, '2021_05_28_054011_add_avatar_to_users', 6);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0817e4df115f2aa5a985dbad1a670f6f66a57ba7c9298403be284fe561d86b1f3cf684455c1d3125', 13, '0', 'authToken', '[]', 0, '2021-05-18 15:24:47', '2021-05-18 15:24:47', '2022-05-18 08:24:47'),
('443339667ec883e9b5c5adce4dfe3d89d469ff03ef3c041b5b733015d751091376bc3cc799fa0045', 1, '0', 'authToken', '[]', 0, '2021-05-18 08:19:34', '2021-05-18 08:19:34', '2022-05-18 01:19:34'),
('49ef878cf9aac66df295ee09e983cd1d8cf96d1b1c2de295b5bf503d2f0640c2496985c55897a514', 1, '0', 'authToken', '[]', 0, '2021-05-18 09:39:39', '2021-05-18 09:39:39', '2022-05-18 02:39:39'),
('5d0b346f067a64c82b4cd9ca6667cb1ad7c2b5ea28ca720c8922e271c16df5788f54bef16fc9447d', 13, '0', 'authToken', '[]', 0, '2021-05-20 13:39:50', '2021-05-20 13:39:50', '2022-05-20 06:39:50'),
('6d5bc32995fdf4853ad39539a086332822533bea07577ff6a8d7f6d5ab950d8c76ef9699e8c8994e', 13, '0', 'authToken', '[]', 0, '2021-05-20 13:23:46', '2021-05-20 13:23:46', '2022-05-20 06:23:46'),
('80e82f427ebe00eb218f04e2a1b1e0dbac089e3e61bd35766c73824f6fcf16903c3a34ba6a521829', 13, '0', 'authToken', '[]', 0, '2021-05-21 12:25:13', '2021-05-21 12:25:13', '2022-05-21 05:25:13'),
('88bcd1b6359590e76d02f396f099242d08731402706aa0893ffca9ba29cc9aaef56a5657266a1419', 1, '0', 'authToken', '[]', 0, '2021-05-18 08:44:48', '2021-05-18 08:44:48', '2022-05-18 01:44:48'),
('c16cba54e3fd9df0f793ff4232ed69dbf65ba2519a485dc019cb13486367b9b954c58c3d5dfc4bce', 1, '0', 'authToken', '[]', 0, '2021-05-18 08:19:35', '2021-05-18 08:19:35', '2022-05-18 01:19:35'),
('ccb3db08d64f92e383e53a50e6a8d8b3ef0992d4206b325089d479fbdd9fb75da1350d912b137463', 1, '0', 'authToken', '[]', 0, '2021-05-18 12:09:51', '2021-05-18 12:09:51', '2022-05-18 05:09:51'),
('d0487f8f10bb9d11524ff4f1b67244eb07142292025c35da039a2b18ec977efddfb5f4b776ef4719', 13, '0', 'authToken', '[]', 0, '2021-05-18 14:43:02', '2021-05-18 14:43:02', '2022-05-18 07:43:02'),
('d402d8db994e98800874ff7920f414fdc39019242c08c1674ba01c8d6b7c059b5845847adbf06c8b', 1, '0', 'authToken', '[]', 0, '2021-05-18 08:19:37', '2021-05-18 08:19:37', '2022-05-18 01:19:37'),
('f1f0079d6c47eaf1282207c13ff9cab9f3097af891e12f76f389b273997ea03f95e5d6a7e28a9612', 1, '0', 'authToken', '[]', 0, '2021-05-18 08:19:12', '2021-05-18 08:19:12', '2022-05-18 01:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(36) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(0, NULL, 'Laravel Personal Access Client', 'GzhviaOc0Gz2zKDzq2RutGsbXxDwT7IPSRl0Qgnh', NULL, 'http://localhost', 1, 0, 0, '2021-05-18 08:19:03', '2021-05-18 08:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, '0', '2021-05-18 08:16:00', '2021-05-18 08:16:00'),
(2, '0', '2021-05-18 08:17:21', '2021-05-18 08:17:21'),
(3, '0', '2021-05-18 08:17:46', '2021-05-18 08:17:46'),
(4, '0', '2021-05-18 08:19:03', '2021-05-18 08:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
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

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ict.cvenriquez@gmail.com', '$2y$10$14QsLdLrs/rS5Tg7XazMS.YBi4sDF/N/dUQe6KCOqjK8FfQZ.qE16', '2021-06-01 13:16:04'),
('intensity67@gmail.com', '$2y$10$RkdjPV82J66OihUn3uvPdemtSPDU6c.QKWqFoU66nvEnKREBVzFBO', '2021-06-01 16:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `client_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 13, '2021-06-03 08:31:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type_id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `google_id`, `avatar_url`) VALUES
(13, 2, 'vinz', 'enriquez', 'intensity1234123@gmail.com', NULL, '$2y$10$jxHUpT84bUyxJsKzONE21OyXHwtMbawue8NsMH6L7Yi/hUvqEjbl2', NULL, '2021-05-18 13:19:57', '2021-05-18 13:19:57', '', ''),
(15, 2, 'Intensity312', 'Enriquez', 'vinz756@gmail.com', NULL, '$2y$10$jxHUpT84bUyxJsKzONE21OyXHwtMbawue8NsMH6L7Yi/hUvqEjbl2', NULL, '2021-05-18 14:25:26', '2021-05-18 14:25:26', '', ''),
(19, 2, 'Elon', 'Musk', 'elon@gmail.com', NULL, '$2y$12$y4azwDYtZsits.L6vlLOjubYAk5wJ2ZgaWLCMWIlq2n4b7sN9a0gC', NULL, '2021-05-18 14:25:26', '2021-05-18 14:25:26', '', ''),
(21, 4, 'VinzStaff2', 'Staff2', 'staff@gmail.com', NULL, '$2y$10$jxHUpT84bUyxJsKzONE21OyXHwtMbawue8NsMH6L7Yi/hUvqEjbl2', NULL, '2021-05-18 14:25:26', '2021-05-18 14:25:26', '', ''),
(22, 2, 'vinz', 'enriquez', 'inten@gmail.com', NULL, '$2y$10$NQ3Y0yrLgNnQRjo514.ZOua1D7cMlLdyCLD8LflfhkP4S1NZgXf66', NULL, '2021-05-26 12:49:22', '2021-05-26 12:49:22', '', ''),
(54, 3, 'Vinz', 'Enriquez', 'ict.cvenriquez@gmail.com', NULL, '$2y$12$eLxyKr3J5SehW0fmgsD3X.bvyZoIXR9hHuKgZS4izWPrBPMitjmEq', '03q9YNEVKarUjAZroP4jGxcQg008dCwc2UzhCGgRXtSrAB5YmiSQKyNGUL0Q', '2021-05-27 17:46:27', '2021-05-27 17:46:27', '', ''),
(55, 2, 'Vinz', 'Enriquez', 'intnsity123@gmail.com', NULL, '$2y$10$H/5RE.SONxBIcdXu/dLVJuDqSkvi2VD..y5SipRDsIEUaY90UR3eq', NULL, '2021-05-27 17:47:04', '2021-05-27 17:47:04', '', ''),
(80, 2, 'Clark Vincent', 'Enriquez', 'intensity67@gmail.com', NULL, '$2y$12$9kwKPLoGpq2tjVk303QGz.7aBopJvfvt2jSrd2svfEBayugqKkUhK', 'Nn6S4gcMIYqv9ELVIxAKBnkyJN9TSeUsTyUe75SXMKBH0LbVHeqhbS5xN1rf', '2021-06-02 16:27:54', '2021-06-02 16:27:54', '116748296503151243895', 'https://lh3.googleusercontent.com/a-/AOh14GjiD36PPMi-ncdMp1oZuHoCfg7DymPR1ed2NWZhDg=s96-c');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `house_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `territory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `address`, `street`, `house_no`, `city`, `territory`, `postal_code`, `country`, `created_at`, `updated_at`) VALUES
(1, 56, 'Address123', 'Street123', 'House', 'City', 'Terrtitory', 'Postal', 'Philippines', '2021-05-27 17:47:54', '2021-05-29 16:20:10'),
(2, 58, 'Address', 'Street', 'House no', 'City', 'Terrtitory', 'Postal Code', 'Philippines', '2021-05-27 17:49:01', '2021-05-27 17:49:01'),
(3, 13, 'New York', 'Woodbridge Township', 'House No 1', 'New York City', 'Territory', '6014', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 'Master Admin', NULL, NULL),
(2, 'Admin', NULL, NULL),
(3, 'Client', NULL, NULL),
(4, 'Staff', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
