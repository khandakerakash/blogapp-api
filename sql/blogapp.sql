-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 07, 2019 at 12:02 PM
-- Server version: 5.7.24
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'consectetur', 'Voluptas ut iure qui unde officia. Culpa nisi dolores ad eveniet. Id dolor sunt illo consequatur et qui. Molestiae quasi recusandae voluptatem quae commodi nostrum.', '2019-07-06 14:52:52', '2019-07-06 14:52:52'),
(2, 'ut', 'Qui iusto expedita beatae dolore placeat maxime laudantium odit. Vero reiciendis ratione repellat est iusto. Accusantium ut odio maiores officia eius. Necessitatibus cumque facere sunt perferendis.', '2019-07-06 14:52:52', '2019-07-06 14:52:52'),
(3, 'fugit', 'Quia a ut ut temporibus nihil. Velit corrupti suscipit laborum magni ut. Et quas omnis velit eum voluptas culpa omnis. Dignissimos voluptatem voluptatum exercitationem ratione reprehenderit illum.', '2019-07-06 14:52:52', '2019-07-06 14:52:52'),
(4, 'eum', 'Iure harum sit qui aut officia. Assumenda odio consequatur et.', '2019-07-06 14:52:52', '2019-07-06 14:52:52'),
(5, 'magni', 'Dolores ut numquam et consequuntur voluptatem. Dicta fugiat dolor libero laboriosam consectetur unde expedita qui. Officiis dicta suscipit aperiam enim illum.', '2019-07-06 14:52:52', '2019-07-06 14:52:52'),
(6, 'saepe', 'Officia ut sunt voluptatem aliquam atque atque quia. Et totam veniam similique omnis nostrum porro quia. Error id voluptatem atque dolorum dolore. Quia odio officia qui magnam sint accusantium ut.', '2019-07-06 14:52:52', '2019-07-06 14:52:52'),
(7, 'alias', 'Sit et voluptatibus non occaecati laudantium. Nihil cumque voluptatem id. Recusandae est iure molestiae optio quod qui aliquam. In asperiores sunt molestiae.', '2019-07-06 14:52:52', '2019-07-06 14:52:52'),
(8, 'eveniet', 'Optio beatae eveniet nihil eveniet praesentium. Eos quas exercitationem ducimus commodi voluptas quisquam non. Praesentium quia optio enim quo consequatur aut. Suscipit quibusdam veritatis ut qui.', '2019-07-06 14:52:52', '2019-07-06 14:52:52'),
(9, 'eaque', 'Ea est autem sit accusantium repellat. Eveniet possimus blanditiis tempore molestias illum vero. Velit qui vel non quas error dolorem ex eaque.', '2019-07-06 14:52:52', '2019-07-06 14:52:52'),
(10, 'at', 'Dignissimos enim maxime aut esse est suscipit corrupti. Sit facere fugiat iusto dolor quis. Pariatur quos nihil minus iusto perspiciatis sint rerum.', '2019-07-06 14:52:52', '2019-07-06 14:52:52'),
(11, 'voluptas', 'Quidem esse laudantium optio sed asperiores quasi. Reiciendis inventore corrupti amet voluptatum doloribus dolorem. Et error assumenda qui possimus quisquam. Quam quam numquam numquam possimus.', '2019-07-06 14:52:52', '2019-07-06 14:52:52'),
(12, 'ad', 'Magni molestias libero perspiciatis sit. Nam amet vel repellat iure delectus ab numquam. Ex ea tempora harum velit ut.', '2019-07-06 14:52:52', '2019-07-06 14:52:52'),
(13, 'voluptatibus', 'Asperiores saepe minus alias aut rerum repellendus. Non numquam voluptatum et et esse beatae atque. Consequatur dolorem qui quae cumque at vel asperiores qui. Officia veniam quia sunt quis amet. Dolorum hic praesentium non odio qui ut voluptas.', '2019-07-06 14:52:52', '2019-07-06 14:52:52'),
(14, 'voluptatem', 'Voluptates sed ab in provident. Excepturi et qui quas earum. Veniam sit et est eveniet aut sequi cum perspiciatis.', '2019-07-06 14:52:52', '2019-07-06 14:52:52');

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
(3, '2019_07_06_202110_create_categories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
