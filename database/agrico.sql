-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Generation Time: Jul 06, 2019 at 12:10 PM
-- Server version: 10.3.15-MariaDB-1:10.3.15+maria~bionic
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agrico`
--

-- --------------------------------------------------------

--
-- Table structure for table `field`
--

CREATE TABLE `field` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `crop_type_id` int(10) UNSIGNED NOT NULL,
  `area` decimal(8,2) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `field`
--

INSERT INTO `field` (`id`, `name`, `crop_type_id`, `area`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Field A1', 1, '200.00', 2, '2019-07-05 17:03:21', '2019-07-05 17:03:21'),
(2, 'Field B1', 2, '300.00', 4, '2019-07-05 17:03:37', '2019-07-06 12:04:10'),
(3, 'Field C2', 3, '500.00', 6, '2019-07-05 17:03:55', '2019-07-05 17:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `field_processed`
--

CREATE TABLE `field_processed` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `field_id` int(10) UNSIGNED NOT NULL,
  `tractor_id` int(10) UNSIGNED NOT NULL,
  `processed_area` decimal(8,2) UNSIGNED NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `approved_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `field_processed`
--

INSERT INTO `field_processed` (`id`, `field_id`, `tractor_id`, `processed_area`, `approved`, `created_by`, `approved_by`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '100.00', 1, 2, NULL, NULL, NULL),
(3, 1, 1, '50.00', 1, 2, NULL, NULL, NULL),
(4, 1, 1, '5.00', 1, 2, 3, NULL, NULL),
(5, 1, 1, '5.00', 1, 2, 3, NULL, NULL),
(6, 1, 1, '35.00', 1, 2, 2, NULL, NULL),
(7, 1, 1, '60.00', 0, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `field_type`
--

CREATE TABLE `field_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `field_type`
--

INSERT INTO `field_type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Wheat', '2019-07-05 00:00:00', '2019-07-05 00:00:00'),
(2, 'Broccoli', '2019-07-05 00:00:00', '2019-07-05 00:00:00'),
(3, 'Strawberry', '2019-07-05 00:00:00', '2019-07-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_07_05_064926_create_user_table', 1),
(2, '2019_07_05_064936_create_role_table', 1),
(3, '2019_07_05_064949_create_user_role_table', 1),
(4, '2019_07_05_124930_create_transient_table', 1),
(5, '2019_07_06_183519_create_fields_types_table', 1),
(7, '2019_07_06_183734_create_tractors_table', 1),
(9, '2019_07_06_183652_create_fields_table', 2),
(10, '2019_07_06_183759_create_fields_processed_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `role` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`, `name`) VALUES
(1, 'administrator', 'Super Admin'),
(2, 'moderator', 'Moderator');

-- --------------------------------------------------------

--
-- Table structure for table `tractor`
--

CREATE TABLE `tractor` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tractor`
--

INSERT INTO `tractor` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Tractora', '2019-07-05 14:25:47', '2019-07-05 14:29:19'),
(2, 'Victory', '2019-07-05 14:27:05', '2019-07-05 14:27:05'),
(3, 'Tractora', '2019-07-05 14:28:31', '2019-07-05 14:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `transient`
--

CREATE TABLE `transient` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `expires_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transient`
--

INSERT INTO `transient` (`id`, `type`, `key`, `value`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'login_token', '1', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6Im0uYW53YXJAcHVyZS1zb2wuY29tIiwidGltZXN0YW1wIjoxNTYyMzM0MDI5fQ.4VvxwXAmnsdGDMq9dtKmd5-4dqZn6krEayVR5riNI7M', '2019-07-06 13:40:29', '2019-07-05 13:40:29', '2019-07-05 13:40:29'),
(2, 'login_token', '2', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6ImFkbWluQGFkbWluLmNvbSIsInRpbWVzdGFtcCI6MTU2MjMzNjYyNH0.o67Vk6efXvf4ZbUsN6OOAIAr2rKhoYHXFTBmi8nwv0c', '2019-07-06 14:23:44', '2019-07-05 14:23:44', '2019-07-05 14:23:44'),
(3, 'login_token', '3', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6Im1vZGVyYXRvckBtb2RlcmF0b3IuY29tIiwidGltZXN0YW1wIjoxNTYyNDEyNDEyfQ.ZNdHTpS6o8pC41RbB5yIzYblkseToW9oEDjtXfHvHWU', '2019-07-07 11:26:52', '2019-07-06 11:26:52', '2019-07-06 11:26:52'),
(4, 'login_token', '4', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6InVzZXIxQHVzZXIuY29tIiwidGltZXN0YW1wIjoxNTYyNDE0NDc1fQ.pwZTEzo_0_p1F4nHPR4HaE_ePyC_SgOrEuG8RL1Gj1U', '2019-07-07 12:01:15', '2019-07-06 12:01:15', '2019-07-06 12:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Mohammed Anwar', 'm.anwar@pure-sol.com', '$2y$10$C8Ko0Qe4wGHmNP4FIft3hO69vwTUFFYRxGUTvGirjZLJfRkwaiet2', 1, '2019-07-05 13:32:23', '2019-07-05 13:32:23'),
(2, 'Super Admin', 'admin@admin.com', '$2y$10$4SHdTrj5tz5Dw7oq3W/hce/2zv7UjczQ67fVjtQ6oudgxtS1TsVx2', 1, '2019-07-05 13:42:59', '2019-07-05 13:42:59'),
(3, 'Moderator', 'moderator@moderator.com', '$2y$10$eMTrwpRplf7PvrqUvvwuXep/M2ZNIfL9PlDasyns97y.2HRWWPYeq', 1, '2019-07-05 13:43:23', '2019-07-05 13:43:23'),
(4, 'user1', 'user1@user.com', '$2y$10$mAE4Ap50tmkwndgGgmhjsevG33P3AKPT0ndegJWvGskUjTOMBgBdG', 1, '2019-07-06 12:00:35', '2019-07-06 12:00:35'),
(5, 'user2', 'user2@user.com', '$2y$10$a0dV4H8WeJUxi4/bxKRBJuMz1pAsGjCnHpI79/9xI79MdVnUtGQ.q', 1, '2019-07-06 12:00:39', '2019-07-06 12:00:39'),
(6, 'user3', 'user3@user.com', '$2y$10$iVIDvoOk94F75zP7ncZvce9MXDAJ67yhoWhhRgkO5yJpzvBs6pS66', 1, '2019-07-06 12:00:43', '2019-07-06 12:00:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` smallint(5) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(2, 1, '2019-07-05 00:00:00', '2019-07-05 00:00:00'),
(3, 2, '2019-07-05 00:00:00', '2019-07-05 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `field`
--
ALTER TABLE `field`
  ADD PRIMARY KEY (`id`),
  ADD KEY `field_crop_type_id_foreign` (`crop_type_id`),
  ADD KEY `field_created_by_foreign` (`created_by`);

--
-- Indexes for table `field_processed`
--
ALTER TABLE `field_processed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `field_processed_field_id_foreign` (`field_id`),
  ADD KEY `field_processed_tractor_id_foreign` (`tractor_id`),
  ADD KEY `field_processed_created_by_foreign` (`created_by`),
  ADD KEY `field_processed_approved_by_foreign` (`approved_by`);

--
-- Indexes for table `field_type`
--
ALTER TABLE `field_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tractor`
--
ALTER TABLE `tractor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transient`
--
ALTER TABLE `transient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transient_type_index` (`type`),
  ADD KEY `transient_key_index` (`key`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email_unique` (`email`),
  ADD KEY `user_name_index` (`name`),
  ADD KEY `user_email_index` (`email`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD KEY `user_role_user_id_foreign` (`user_id`),
  ADD KEY `user_role_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `field`
--
ALTER TABLE `field`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `field_processed`
--
ALTER TABLE `field_processed`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `field_type`
--
ALTER TABLE `field_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tractor`
--
ALTER TABLE `tractor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transient`
--
ALTER TABLE `transient`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `field`
--
ALTER TABLE `field`
  ADD CONSTRAINT `field_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `field_crop_type_id_foreign` FOREIGN KEY (`crop_type_id`) REFERENCES `field_type` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `field_processed`
--
ALTER TABLE `field_processed`
  ADD CONSTRAINT `field_processed_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `field_processed_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `field_processed_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `field` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `field_processed_tractor_id_foreign` FOREIGN KEY (`tractor_id`) REFERENCES `tractor` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_role_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
