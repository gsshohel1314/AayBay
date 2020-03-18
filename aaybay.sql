-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2020 at 06:29 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aaybay`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `ex_cat_id` int(11) NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `ex_cat_id`, `details`, `amount`, `date`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 'bari vara diyechi january mase', 2000, '2020-01-29 23:55:08 pm', 1, '2020-01-19 11:55:49', '2020-01-19 12:56:40', '2020-01-19 12:56:40'),
(2, 1, 'january mase laptop kena', 50000, '2020-01-21 23:56:55 pm', 1, '2020-01-19 11:57:04', '2020-01-19 11:57:04', NULL),
(3, 1, 'february mase laptop kena', 90000, '2020-02-01 23:57:24 pm', 1, '2020-02-19 11:57:37', '2020-01-19 12:22:54', NULL),
(4, 4, 'february mase ghor vara', 3000, '2020-02-19 23:58:03 pm', 1, '2020-01-19 11:58:16', '2020-01-19 11:58:16', NULL),
(7, 1, 'dfsdfsd', 3333333, '2020-01-21 00:55:49 am', 1, '2020-01-19 12:55:57', '2020-01-19 12:56:25', '2020-01-19 12:56:25'),
(8, 1, 'asfsdf', 50000, '2020-01-20 17:01:20 pm', 1, '2020-01-20 05:01:25', '2020-01-20 05:01:25', NULL),
(9, 1, 'gdfgdfg', 40000, '2020-01-20 19:30:19 pm', 1, '2020-01-20 07:30:24', '2020-01-20 07:30:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Buy Laptop', 1, '2020-01-19 11:14:08', '2020-01-19 11:14:08'),
(3, 'Shopping', 0, '2020-01-19 11:15:58', '2020-01-19 11:15:58'),
(4, 'House Rent', 1, '2020-01-19 11:16:11', '2020-01-19 11:34:51'),
(5, 'Buy Book', 0, '2020-01-19 11:35:22', '2020-01-19 11:35:22');

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` int(10) UNSIGNED NOT NULL,
  `in_cat_id` int(11) NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `in_cat_id`, `details`, `amount`, `date`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 3, 'bcbcvb', 5555, '2020-01-14 20:15:55 pm', 1, '2020-01-19 08:16:00', '2020-01-19 08:50:08', NULL),
(5, 1, 'sdfsf', 6666, '2020-01-06 20:53:08 pm', 1, '2020-01-19 08:53:13', '2020-01-19 08:53:13', NULL),
(6, 3, 'sdsdfsdf', 11111, '2020-01-21 20:53:22 pm', 1, '2020-01-19 08:53:27', '2020-01-19 08:53:27', NULL),
(7, 1, 'dfsdgsdfg', 77777, '2020-01-20 20:53:37 pm', 1, '2020-01-19 08:53:41', '2020-01-19 08:54:27', '2020-01-19 08:54:27'),
(8, 1, 'fsdff', 100000, '2020-01-20 19:29:30 pm', 1, '2020-01-20 07:29:36', '2020-01-20 07:29:36', NULL),
(9, 1, 'rwerrertt', 10000, '2020-01-21 18:20:06 pm', 1, '2020-01-21 06:20:12', '2020-01-21 06:20:12', NULL),
(10, 3, 'fsdgdfgdf', 20000, '2020-01-21 18:20:24 pm', 1, '2020-01-21 06:20:32', '2020-01-21 06:20:32', NULL),
(11, 1, 'frtert', 30000, '2020-01-21 18:20:42 pm', 1, '2020-01-21 06:20:47', '2020-01-21 06:20:47', NULL),
(12, 1, 'fsdfsdf', 100000, '2020-01-22 17:03:51 pm', 1, '2020-01-22 05:03:56', '2020-01-22 05:03:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `income_categories`
--

CREATE TABLE `income_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `income_categories`
--

INSERT INTO `income_categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sell Computer', 1, '2020-01-19 01:30:59', '2020-01-19 01:30:59'),
(2, 'Sell Laptop', 0, '2020-01-19 01:31:13', '2020-01-19 01:31:13'),
(3, 'sell book', 1, '2020-01-19 01:31:28', '2020-01-19 01:31:28'),
(4, 'Teaching', 0, '2020-01-19 01:31:36', '2020-01-19 01:41:26');

-- --------------------------------------------------------

--
-- Table structure for table `loaners`
--

CREATE TABLE `loaners` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loaners`
--

INSERT INTO `loaners` (`id`, `name`, `email`, `phone`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Shohel', 'shohel@gmail.com', '01723559950', 'shohel-2020-01-21.jpg', 1, '2020-01-21 12:33:07', '2020-01-21 12:57:03', NULL),
(2, 'Rokon', 'rokon@gmail.com', '01723558690', 'rokon-2020-01-21.jpg', 1, '2020-01-21 12:33:34', '2020-01-26 03:48:56', NULL),
(3, 'Basir Uddin', 'basir@gmail.com', '01723558691', 'basir-uddin-2020-01-25.jpg', 1, '2020-01-21 12:34:06', '2020-01-25 08:29:43', NULL),
(4, 'Raihan Uddin', 'raihan@gmail.com', '01723558622', 'raihan-uddin-2020-01-25.jpg', 1, '2020-01-21 12:34:29', '2020-01-25 07:47:49', NULL),
(5, 'jony', 'jony@gmail.com', '01723558600', 'jony-2020-01-25.jpg', 1, '2020-01-25 08:26:40', '2020-01-26 04:19:32', '2020-01-26 04:19:32');

-- --------------------------------------------------------

--
-- Table structure for table `loan_givens`
--

CREATE TABLE `loan_givens` (
  `id` int(10) UNSIGNED NOT NULL,
  `loaner_id` int(11) NOT NULL DEFAULT '0',
  `amount` int(11) NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loan_givens`
--

INSERT INTO `loan_givens` (`id`, `loaner_id`, `amount`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 5000, '2020-01-26', '2020-01-26 04:27:24', '2020-01-26 04:27:24'),
(2, 1, 6000, '2020-01-26', '2020-01-26 04:27:39', '2020-01-26 04:27:39'),
(3, 1, 1000, '2020-01-25', '2020-01-26 04:27:53', '2020-01-26 04:27:53');

-- --------------------------------------------------------

--
-- Table structure for table `loan_receives`
--

CREATE TABLE `loan_receives` (
  `id` int(10) UNSIGNED NOT NULL,
  `loaner_id` int(11) NOT NULL DEFAULT '0',
  `amount` int(11) NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loan_receives`
--

INSERT INTO `loan_receives` (`id`, `loaner_id`, `amount`, `date`, `created_at`, `updated_at`) VALUES
(11, 1, 4000, '2020-01-26', '2020-01-26 04:28:11', '2020-01-26 04:28:11'),
(12, 1, 1000, '2020-01-27', '2020-01-26 04:28:29', '2020-01-26 04:28:29');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2020_01_13_114719_create_roles_table', 5),
(12, '2020_01_19_052000_create_income_categories_table', 7),
(15, '2020_01_19_085026_create_incomes_table', 8),
(16, '2020_01_19_170217_create_expense_categories_table', 9),
(17, '2020_01_19_173742_create_expenses_table', 10),
(21, '2020_01_21_173159_create_loaners_table', 11),
(24, '2020_01_21_214955_create_loan_receives_table', 13),
(25, '2014_10_12_000000_create_users_table', 14),
(27, '2020_01_21_210633_create_loan_givens_table', 15);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, '2020-01-13 03:00:00', NULL),
(2, 'Loaner', 1, '2020-01-22 03:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2',
  `phone` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `phone`, `image`, `status`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Shohel Rana', 'gsshohel1314@gmail.com', 1, 1723559950, 'shohel-rana_2020-01-23.jpg', 1, '$2y$10$a1eiYI.Mp7AwNXw8krwBB.QtdyRDLFPd98G.q59TLlgSTR8vO3S0y', 'nWHGjmw203bPwTGNc6iBvx4ihtLyM0Eg9bvnEQFEg6qOTsGnEivuL6ihvauh', '2020-01-23 05:39:49', '2020-01-23 05:39:49', NULL),
(5, 'Rokon', 'rokon@gmail.com', 2, 1723558622, 'rokon_2020-01-23.jpg', 0, '$2y$10$rmVVEFMA04HaSsniyTADk.cOXzGpaGrrfaFTarBPHwZOLs0tzrv6K', NULL, '2020-01-23 05:46:37', '2020-01-23 05:46:37', NULL),
(6, 'Raihan Uddin', 'raihan@gmail.com', 2, 1723558690, 'raihan-uddin_2020-01-23.jpg', 1, '$2y$10$UYx1ER7.no/Y5LygYFo6b.6nBcP0fRqg80IicgbYqF3I8cemYe522', NULL, '2020-01-23 05:50:20', '2020-01-23 06:16:44', NULL),
(7, 'Robiul Islam', 'robiul@gmail.com', 2, 1723558621, 'robiul-islam_2020-01-23.jpg', 0, '$2y$10$R4pmIaX.AtMXS4qrrqAEXe9enmG/OrnePF3UkeDLGlSfU7OD4TsmG', NULL, '2020-01-23 05:53:29', '2020-01-23 05:53:29', NULL),
(8, 'Kobir', 'kobir@gmail.com', 2, 1723558633, 'kobir_2020-01-23.jpg', 1, '$2y$10$MFVVTN.vxzpch8dFfD6PJ.ALU2FmvshptVlqku4/hm9TE8dUiIvR2', NULL, '2020-01-23 05:55:25', '2020-01-23 06:16:17', NULL),
(9, 'Arman', 'arman@gmail.com', 2, 1723558619, 'a_2020-01-23.jpg', 0, '$2y$10$UkxxBqnLousDsZG77vZFcepKAYHi7pXekhK2Um4YpG9qnWGOrIDxK', NULL, '2020-01-23 06:05:05', '2020-01-23 06:19:15', '2020-01-23 06:19:15'),
(11, 'Jamil', 'jamil@gmail.com', 2, 1723558680, 'jamil_2020-01-23.jpg', 1, '$2y$10$jMvM9Io1pTVHfYjqv83g9.z16K6NN.Xy6NIto3bG9V/tLvsuNfb.6', NULL, '2020-01-23 06:15:16', '2020-01-23 06:15:53', '2020-01-23 06:15:53'),
(12, 'Masud', 'masud@gmail.com', 2, 1723551610, 'masud_2020-01-23.jpg', 0, '$2y$10$/Qc7TFcC6f.06bozsCjt2eXQ6PcdH7khmGMKEFOzRaX9oSVrdv1fK', NULL, '2020-01-23 06:51:11', '2020-01-23 06:51:11', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `expense_categories_name_unique` (`name`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_categories`
--
ALTER TABLE `income_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `income_categories_name_unique` (`name`);

--
-- Indexes for table `loaners`
--
ALTER TABLE `loaners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `loaners_email_unique` (`email`),
  ADD UNIQUE KEY `loaners_phone_unique` (`phone`);

--
-- Indexes for table `loan_givens`
--
ALTER TABLE `loan_givens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_receives`
--
ALTER TABLE `loan_receives`
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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `income_categories`
--
ALTER TABLE `income_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `loaners`
--
ALTER TABLE `loaners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loan_givens`
--
ALTER TABLE `loan_givens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loan_receives`
--
ALTER TABLE `loan_receives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
