-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2019 at 04:25 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assettracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roomNo` int(11) NOT NULL,
  `belongsToDept` int(11) NOT NULL,
  `remainingQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `name`, `roomNo`, `belongsToDept`, `remainingQuantity`) VALUES
(1, 'Laptop', 215, 1, 0),
(2, 'HDMI Cable', 512, 1, 27),
(3, 'Charger', 513, 1, 1),
(4, 'Table', 513, 2, 0);

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
(2, 'Computer Science'),
(1, 'Information Technology');

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
-- Table structure for table `issuedby`
--

CREATE TABLE `issuedby` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `itemIssued` int(11) NOT NULL,
  `quantityIssued` int(11) NOT NULL,
  `returned` int(11) NOT NULL DEFAULT '0',
  `returnedInGoodState` int(11) NOT NULL DEFAULT '0',
  `fineIssued` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issuedby`
--

INSERT INTO `issuedby` (`id`, `userId`, `itemIssued`, `quantityIssued`, `returned`, `returnedInGoodState`, `fineIssued`) VALUES
(1, 1, 1, 1, 0, 0, 0),
(2, 1, 2, 3, 0, 0, 0),
(3, 1, 3, 12, 0, 0, 0),
(4, 1, 3, 2, 0, 0, 0),
(5, 10, 4, 1, 0, 0, 0),
(6, 1, 2, 5, 0, 0, 0);

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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderedBy` int(11) NOT NULL,
  `assetOrdered` int(11) NOT NULL,
  `quantityOrdered` int(11) NOT NULL,
  `deliveredInGoodState` int(11) DEFAULT '0',
  `amountToBePaid` int(11) NOT NULL DEFAULT '0',
  `amountPaid` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('shubham.darekar5@gmail.com', '$2y$10$futmIx7GCNcKiHOyo9iiousNpNREY2y8QmyNFaN5e5AL1XCJwFJ6i', '2019-10-14 02:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `totalquantity`
--

CREATE TABLE `totalquantity` (
  `id` int(11) NOT NULL,
  `totalQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userissues`
--

CREATE TABLE `userissues` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `issueFaced` text NOT NULL,
  `solved` int(11) NOT NULL DEFAULT '0',
  `remark` varchar(255) NOT NULL,
  `fineIncurredToUser` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '6'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Shubham Darekar', 'shubham.darekar5@gmail.com', NULL, '$2y$10$jx.vFlN476QxESRT.ffPi.pqbS0zmdfBvONoNupshBEdkAsNnuNnG', 'TseTH2jw5Kf1jQbkVNM0AeTYBOlxMjvcqvxanj3IeIxmwHx8Nnrhu0MWmUmw', '2019-10-06 11:42:36', '2019-10-06 11:42:36', 0),
(2, 'Narayani Patil', 'narayani@ves', NULL, '$2y$10$8Wq4gvlJ0sYRDi63fB70PebQuOZhewXzmy3RqBgwfyzFdtQm.TH52', NULL, '2019-10-13 13:30:33', '2019-10-13 13:30:33', 1),
(3, 'parth', 'parth@ves', NULL, '$2y$10$Xt8Qf..fogz./jO960Iw/OMV2k/p03v3RzLUPkDP84GtkDJXYaGA2', NULL, '2019-10-13 22:29:31', '2019-10-13 22:29:31', 3),
(4, 'admin', 'admin@ves', NULL, '$2y$10$9rLZOxqXz2tOIfDqTI75z.iP./TL7l6oSqdgTgTQS/VR.xDKGO3au', NULL, '2019-10-14 02:53:44', '2019-10-14 02:53:44', 0),
(5, 'student', 'student@ves', NULL, '$2y$10$dbJVBej/e/hlnaG3Yf3pU.BDQ.Wiy4/SWSu5pGpzIQ0sZtLbzukZu', NULL, '2019-10-14 02:54:13', '2019-10-14 02:54:13', 1),
(6, 'lab Assistant', 'lb@ves', NULL, '$2y$10$yC/2kLNl4/MLQRn6Knh7W.9y3Sdu5Ro.r98CAHiLCZJDLLEZgos52', NULL, '2019-10-14 02:54:55', '2019-10-14 02:54:55', 2),
(7, 'HOD', 'hod@ves', NULL, '$2y$10$.GV0CGA6tJXJk/oexit5R.HC5dQe6j9MCGZE2JmK4PPijnKnkqs3C', NULL, '2019-10-14 02:57:09', '2019-10-14 02:57:09', 4),
(8, 'purchase', 'purchase@ves', NULL, '$2y$10$QLIt36h9N6QUkpOvwOtSTOZuYLhwGbTSpaMcMRhF1/RXFcjX2SxQO', NULL, '2019-10-14 02:57:59', '2019-10-14 02:57:59', 5),
(9, 'anshul', 'anshul@ves', NULL, '$2y$10$IVn1KaxOmhYT1.hTrFhFL.sikY8wOBh90Mb7dxbpbq2ZvC1/bxVjO', NULL, '2019-10-14 03:05:30', '2019-10-14 03:05:30', 2),
(10, 'pooja', 'asa@as', NULL, '$2y$10$i3BA0QqsC6m2DUPEYC3WkeV6WqcvpZAVB8g/1zR3YUZgfOjfcsK2y', NULL, '2019-10-14 03:49:34', '2019-10-14 03:49:34', 3);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `issuedby`
--
ALTER TABLE `issuedby`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
