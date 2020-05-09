-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2020 at 04:05 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lara_kedemos`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Course', 1, '2020-05-04 12:25:14', '2020-05-04 07:02:58');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `grade`, `status`, `created_at`, `updated_at`) VALUES
(2, '1A', 1, '2020-05-04 12:08:22', '2020-05-04 06:38:22'),
(3, '1B', 1, '2020-05-04 12:08:33', '2020-05-04 06:38:33');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$KleKAEOqcFBMwSYM//Ab5e2GvXNKilRhDSOeRHtvjcMINcPrvQHwm', '2020-05-02 10:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_number` bigint(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `email`, `password`, `contact_number`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Dharmaraj', 'Patel', 'raj@gmail.com', '123456', 8852015200, 1, '2020-04-29 09:48:32', '2020-04-29 04:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_number` bigint(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`id`, `first_name`, `last_name`, `email`, `password`, `contact_number`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Dharmaraj', 'Patel', 'raj@gmail.com', '123456', 8852015200, 1, '2020-04-29 09:48:32', '2020-04-29 04:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `curriculum` text,
  `is_verify_email` tinyint(4) DEFAULT '0',
  `is_verify_contact` tinyint(4) DEFAULT '0',
  `profile_pic` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `postal_code` int(11) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `address` text,
  `social_id` text,
  `register_by` varchar(255) DEFAULT NULL,
  `device_id` varchar(255) DEFAULT NULL,
  `device_token` varchar(255) DEFAULT NULL,
  `device_type` varchar(255) DEFAULT NULL,
  `vrfn_code` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `contact_number`, `password`, `role_id`, `grade`, `curriculum`, `is_verify_email`, `is_verify_contact`, `profile_pic`, `gender`, `dob`, `country_id`, `state_id`, `city_id`, `postal_code`, `latitude`, `longitude`, `address`, `social_id`, `register_by`, `device_id`, `device_token`, `device_type`, `vrfn_code`, `status`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Admin', NULL, 'admin@123', 'admin@gmail.com', NULL, '$2y$10$Xuh1NJ5wYgKPqnPTz9/RUeuyKaIHdc.5oTI.YJ.IxPSQbtYkZ0ll6', 1, '', '', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '9E06f0tbtq2uTZCeC8ml551DmlJWCKAZvqVYcqkL0NMKRY9kdjwXHLgM6GW6'),
(2, 'Tutor', '', 'tutor@123', 'tutor@gmail.com', NULL, '$2y$10$SyUeVAB11uvacnmBPnR97.R/iUpOzfeelFlT3jZ4/f4f7EGzBEfO2', 2, '', 'curriculum', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-04-30 01:09:42', NULL),
(3, 'Student', '', 'student@123', 'student@gmail.com', NULL, '$2y$10$t3JY7xm8hjHTxLmfnxiIGO9k5jCFXPNX.MQrOQKd5M6FSBH7A1n7K', 3, '1B', 'curriculum', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-05-03 02:23:31', NULL),
(10, 'Mohit', 'Jain', 'mohit@123', 'mohit@gmail.com', NULL, '$2y$10$nhfn7r9wXkdCjkADC1N5sulrqjWQD6IbaDt9cnAYWHhVGCkM.Anke', 3, '1C', 'curriculum', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-05-04 07:59:10', '2020-05-04 02:29:10', NULL),
(11, 'Tutor', 'Jain', 'rohit@123', 'rohit@gmail.com', NULL, '$2y$10$T.Tx9A0pgqx.o819cx6a4O4Y2/u2atf5PbauxdH6Bwnuv4k3oHolG', 3, '1D', 'curriculum', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-05-04 07:59:10', '2020-05-04 02:29:10', NULL),
(12, 'Rajesh', 'Jain', 'rajesh@123', 'rajesh@gmail.com', NULL, '$2y$10$Pb5f61ddICJRa9OyHgEvTeI2P.w3KD1i/LaUDjMlYzyuprBQg1CtS', 3, '1B', 'curriculum', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-05-04 07:59:10', '2020-05-04 02:29:10', NULL),
(13, 'Raj', 'Jain', 'raj@123', 'raj@gmail.com', NULL, '$2y$10$7eyWDM1uZiWV7QTDeaQZG.qIKQwf4CGLADu1OrdWN0vOwrMVejlKi', 2, '1C', 'curriculum', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-05-04 09:11:59', '2020-05-04 03:41:59', NULL),
(14, 'Mukesh', 'Jain', 'mukesh@123', 'mukesh@gmail.com', NULL, '$2y$10$Qs801Y3/rW2ktLtMRF0S/u98EoGD8qO1TI4CSccdemYYu3tFpl6dS', 2, '1D', 'curriculum', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-05-04 09:11:59', '2020-05-04 03:41:59', NULL),
(15, 'Ram', 'Jain', 'ram@123', 'ram@gmail.com', NULL, '$2y$10$gENJPEbaSOCUR.heph.ZgeOIIINkFR7G.d8wBgMsIkSOGBJo76liG', 2, '1B', 'curriculum', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-05-04 09:11:59', '2020-05-04 03:41:59', NULL),
(16, 'Ravi', 'Patel', 'ravi@123', 'ravi@gmail.com', NULL, '$2y$10$OjMYurVqATl67mQpEYHqv.sNzk4AYYC3EvGyUZb8cprBW.lWZINRa', 3, '1B', 'Course', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-05-04 13:16:08', '2020-05-04 08:29:04', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
