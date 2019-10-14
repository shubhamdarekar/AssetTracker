-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2019 at 09:44 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assetstracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `belongsToDept` int(11) NOT NULL,
  `totalQuantity` int(11) NOT NULL,
  `remainingQuantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `name`, `belongsToDept`, `totalQuantity`, `remainingQuantity`, `created_at`, `updated_at`) VALUES
(1, 'Projector', 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Projector Screen', 5, 3, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Whiteboard', 5, 7, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Speaker', 7, 4, 4, '2019-10-12 11:59:20', '2019-10-12 11:59:20'),
(10, 'Switch Boards', 7, 5, 5, '2019-10-12 12:54:25', '2019-10-12 12:54:25'),
(14, 'Files', 1, 30, 30, '2019-10-12 13:13:22', '2019-10-12 13:13:22'),
(19, 'Raspberry Pi', 3, 10, 10, '2019-10-12 13:24:22', '2019-10-12 13:24:22'),
(22, 'Arduino', 3, 15, 15, '2019-10-12 13:31:06', '2019-10-12 13:31:06'),
(23, 'IR Sensor', 3, 20, 20, '2019-10-12 13:34:13', '2019-10-12 13:34:13'),
(24, 'Laptop', 5, 2, 2, '2019-10-12 13:36:30', '2019-10-12 13:36:30'),
(26, 'VGI to HDMI converter', 2, 5, 5, '2019-10-12 13:39:45', '2019-10-12 13:39:45'),
(27, 'Mic', 7, 6, 6, '2019-10-12 14:54:36', '2019-10-12 14:54:36'),
(28, 'Amplifier', 7, 2, 2, '2019-10-12 15:00:09', '2019-10-12 15:00:09'),
(29, 'Wifi Module', 4, 10, 10, '2019-10-12 15:43:53', '2019-10-12 15:43:53'),
(30, 'LEDs', 1, 30, 30, '2019-10-12 15:51:43', '2019-10-12 15:51:43'),
(31, 'Node MCU', 4, 15, 15, '2019-10-12 15:59:29', '2019-10-12 15:59:29'),
(32, 'PIR Sensors', 1, 12, 12, '2019-10-12 18:47:00', '2019-10-12 18:47:00'),
(33, 'Chalk', 6, 25, 25, '2019-10-12 18:48:46', '2019-10-12 18:48:46'),
(34, 'Duster', 4, 10, 10, '2019-10-12 19:03:56', '2019-10-12 19:03:56');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(8, ''),
(2, 'Computer'),
(1, 'Electronics'),
(4, 'Electronics And Telecommunication'),
(5, 'Information Technology'),
(3, 'Instrumentation'),
(6, 'Masters in Computer Application'),
(7, 'Resource Room');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fines`
--

CREATE TABLE `fines` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issuedby`
--

CREATE TABLE `issuedby` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `itemIssued` int(11) NOT NULL,
  `quantityIssued` int(11) NOT NULL,
  `itemGranted` int(11) NOT NULL,
  `returned` int(11) DEFAULT '0',
  `returnedInGoodState` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issuedby`
--

INSERT INTO `issuedby` (`id`, `userId`, `itemIssued`, `quantityIssued`, `itemGranted`, `returned`, `returnedInGoodState`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, 0, 0, 0, '2019-10-11 12:01:51', '2019-10-11 12:01:51'),
(2, 3, 1, 1, 0, 0, 0, '2019-10-11 12:11:02', '2019-10-11 12:11:02'),
(3, 3, 2, 1, 0, 0, 0, '2019-10-11 12:12:57', '2019-10-11 12:12:57'),
(4, 3, 1, 1, 0, 0, 0, '2019-10-11 15:25:05', '2019-10-11 15:25:05'),
(5, 3, 1, 1, 0, 0, 0, '2019-10-11 15:26:22', '2019-10-11 15:26:22'),
(6, 3, 1, 1, 0, 0, 0, '2019-10-11 15:26:28', '2019-10-11 15:26:28'),
(7, 3, 1, 1, 0, 0, 0, '2019-10-11 15:28:50', '2019-10-11 15:28:50'),
(8, 3, 1, 1, 0, 0, 0, '2019-10-11 15:43:18', '2019-10-11 15:43:18'),
(9, 3, 1, 1, 0, 0, 0, '2019-10-12 00:09:32', '2019-10-12 00:09:32'),
(10, 3, 1, 1, 0, 0, 0, '2019-10-12 00:10:11', '2019-10-12 00:10:11'),
(11, 3, 1, 1, 0, 0, 0, '2019-10-12 14:03:16', '2019-10-12 14:03:16'),
(12, 7, 1, 1, 0, 0, 0, '2019-10-12 18:45:44', '2019-10-12 18:45:44');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newassetrequests`
--

CREATE TABLE `newassetrequests` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `assetOrdered` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderedBy` int(11) NOT NULL,
  `assetOrdered` int(11) NOT NULL,
  `quantityOrdered` int(11) NOT NULL,
  `deliveredInGoodState` int(11) DEFAULT '0',
  `amountToBePaid` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderedBy`, `assetOrdered`, `quantityOrdered`, `deliveredInGoodState`, `amountToBePaid`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 1, 0, 5000, '2019-10-12 18:37:01', '2019-10-12 18:37:01');

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
-- Table structure for table `userissues`
--

CREATE TABLE `userissues` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `issueFaced` text NOT NULL,
  `solved` int(11) NOT NULL DEFAULT '0',
  `remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Sparsh Prabhakar', 'role4@gmail.com', 4, NULL, '$2y$10$GMv2myiJwDIkj7ycx32hR.BNCzhzreMpWp.OtJrSWQU/ffEzWXjni', NULL, '2019-10-06 05:04:20', '2019-10-06 05:04:20'),
(4, 'Avisha Nagarkar', 'role1@gmail.com', 1, NULL, '$2y$10$A4dd5VD1cRA5/tZN1RYotetjPFMQRZlGZZhGBFz19hl8EFxRnkEJC', NULL, '2019-10-12 16:18:33', '2019-10-12 16:18:33'),
(5, 'Shubham Darekar', 'role2@gmail.com', 2, NULL, '$2y$10$/osno.yrsO1tQo7y36jnkOm2VNv/f1cc7H6J2tnj83bjsikTNINNe', NULL, '2019-10-12 16:20:02', '2019-10-12 16:20:02'),
(6, 'Narayani Patil', 'role3@gmail.com', 3, NULL, '$2y$10$hi1BwZKYpTnVjWKjfCkfNek/IawSfMyHO41yN5nBVyZkSqQvOOBqy', NULL, '2019-10-12 16:20:48', '2019-10-12 16:20:48'),
(7, 'John Doe', 'role5@gmail.com', 5, NULL, '$2y$10$wpAbiCgcCRp4FeNzu3iuru2eQuf6LjzfUpsYNElsxD/xbPPLvePw6', NULL, '2019-10-12 16:21:50', '2019-10-12 16:21:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `belongsToDept` (`belongsToDept`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fines`
--
ALTER TABLE `fines`
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `issuedby`
--
ALTER TABLE `issuedby`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `itemIssued` (`itemIssued`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newassetrequests`
--
ALTER TABLE `newassetrequests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderedBy` (`orderedBy`),
  ADD KEY `assetOrdered` (`assetOrdered`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `userissues`
--
ALTER TABLE `userissues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

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
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issuedby`
--
ALTER TABLE `issuedby`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newassetrequests`
--
ALTER TABLE `newassetrequests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userissues`
--
ALTER TABLE `userissues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `assets_ibfk_1` FOREIGN KEY (`belongsToDept`) REFERENCES `department` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `fines`
--
ALTER TABLE `fines`
  ADD CONSTRAINT `fines_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `issuedby`
--
ALTER TABLE `issuedby`
  ADD CONSTRAINT `issuedby_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `issuedby_ibfk_2` FOREIGN KEY (`itemIssued`) REFERENCES `assets` (`id`);

--
-- Constraints for table `newassetrequests`
--
ALTER TABLE `newassetrequests`
  ADD CONSTRAINT `newassetrequests_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`orderedBy`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`assetOrdered`) REFERENCES `assets` (`id`);

--
-- Constraints for table `userissues`
--
ALTER TABLE `userissues`
  ADD CONSTRAINT `userissues_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
