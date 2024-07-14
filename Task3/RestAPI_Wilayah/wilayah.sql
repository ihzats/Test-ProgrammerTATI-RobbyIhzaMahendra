-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2024 at 06:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wilayah`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_13_150936_create_wilayah_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wilayahs`
--

CREATE TABLE `wilayahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `coordinate` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`coordinate`)),
  `google_place_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wilayahs`
--

INSERT INTO `wilayahs` (`id`, `code`, `name`, `coordinate`, `google_place_id`, `created_at`, `updated_at`) VALUES
(1, '11', 'Aceh', '{\"lat\":\"4.695135\",\"lng\":\"96.7493993\"}', 'ChIJvcR8UN-bOTARYMogsoCdAwE', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(2, '12', 'Sumatera Utara', '{\"lat\":\"2.1153547\",\"lng\":\"99.5450974\"}', 'ChIJhxxy61r51y8RC8vXCYE-p6w', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(3, '13', 'Sumatera Barat', '{\"lat\":\"-0.7399397\",\"lng\":\"100.8000051\"}', 'ChIJRUJ08Ey51C8RVTvVdblRsXA', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(4, '14', 'Riau', '{\"lat\":\"0.2933469\",\"lng\":\"101.7068294\"}', 'ChIJdz6xGVhXJy4Rsb21bJQCb4M', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(5, '15', 'Jambi', '{\"lat\":\"-1.6101229\",\"lng\":\"103.6131203\"}', 'ChIJO83is5qIJS4RDdmyCseZWtE', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(6, '16', 'Sumatera Selatan', '{\"lat\":\"-3.3194374\",\"lng\":\"103.914399\"}', 'ChIJLeo1PXWLEC4Rz8QB4gGB_Bg', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(7, '17', 'Bengkulu', '{\"lat\":\"-3.7928451\",\"lng\":\"102.2607641\"}', 'ChIJeZLjNx6wNi4R6qaQ53a1eaA', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(8, '18', 'Lampung', '{\"lat\":\"-4.5585849\",\"lng\":\"105.4068079\"}', 'ChIJpyKsUwF2Oy4RmrCJX8dYO48', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(9, '19', 'Kepulauan Bangka Belitung', '{\"lat\":\"-2.7410513\",\"lng\":\"106.4405872\"}', 'ChIJizmlLUMWFy4RuSOEsf04fhI', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(10, '21', 'Kepulauan Riau', '{\"lat\":\"3.9456514\",\"lng\":\"108.1428669\"}', 'ChIJAQuH1E1l2TERvCSFiXW1RnI', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(11, '31', 'DKI Jakarta', '{\"lat\":\"-6.223592\",\"lng\":\"106.7317914\"}', 'ChIJxfRFTqzwaS4R9jhKTRFByAQ', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(12, '32', 'Jawa Barat', '{\"lat\":\"-7.090911\",\"lng\":\"107.668887\"}', 'ChIJf0dSgjnmaC4Rfp2O_FSkGLw', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(13, '33', 'Jawa Tengah', '{\"lat\":\"-7.150975\",\"lng\":\"110.1402594\"}', 'ChIJ3RjVnJt1ZS4RRrztj53Rd8M', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(14, '34', 'Daerah Istimewa Yogyakarta', '{\"lat\":\"-7.8753849\",\"lng\":\"110.4262088\"}', 'ChIJxWtbvYdXei4R8LPIyrKSG20', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(15, '35', 'Jawa Timur', '{\"lat\":\"-7.5360639\",\"lng\":\"112.2384017\"}', 'ChIJxbXun_eToy0RULh8yvsLAwE', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(16, '36', 'Banten', '{\"lat\":\"-6.4058172\",\"lng\":\"106.0640179\"}', 'ChIJmbkNxNaKQS4R6bMai6ua074', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(17, '51', 'Bali', '{\"lat\":\"-8.4095178\",\"lng\":\"115.188916\"}', 'ChIJoQ8Q6NNB0S0RkOYkS7EPkSQ', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(18, '52', 'Nusa Tenggara Barat', '{\"lat\":\"-8.6529334\",\"lng\":\"117.3616476\"}', 'ChIJIe0SGpQNuC0RxXX30MzCZ2k', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(19, '53', 'Nusa Tenggara Timur', '{\"lat\":\"-8.6573819\",\"lng\":\"121.0793705\"}', 'ChIJlzbpqE3yUiwR4Br3yvsLAwE', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(20, '61', 'Kalimantan Barat', '{\"lat\":\"-0.2787808\",\"lng\":\"111.4752851\"}', 'ChIJu_7rjBcYBS4RoEghTO3sXM0', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(21, '62', 'Kalimantan Tengah', '{\"lat\":\"-1.6814878\",\"lng\":\"113.3823545\"}', 'ChIJP5a8hrK_4i0Rrmv1g2fV288', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(22, '63', 'Kalimantan Selatan', '{\"lat\":\"-3.0926415\",\"lng\":\"115.2837585\"}', 'ChIJRbTSvTm33S0RE8GXt1C2fhQ', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(23, '64', 'Kalimantan Timur', '{\"lat\":\"0.5386586\",\"lng\":\"116.419389\"}', 'ChIJkZxNlhBH8S0R13bjLx2wq8Q', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(24, '65', 'Kalimantan Utara', '{\"lat\":\"3.0730929\",\"lng\":\"116.0413889\"}', 'ChIJ9wvfNH0GDzIRiLlGaN3wERk', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(25, '71', 'Sulawesi Utara', '{\"lat\":\"0.6246932\",\"lng\":\"123.9750018\"}', 'ChIJMZ4GcEJ1hzIRNbgMmBcWiUU', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(26, '72', 'Sulawesi Tengah', '{\"lat\":\"-1.4300254\",\"lng\":\"121.4456179\"}', 'ChIJPS2aZckJiC0RmWLbjP0zbkM', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(27, '73', 'Sulawesi Selatan', '{\"lat\":\"-3.6687994\",\"lng\":\"119.9740534\"}', 'ChIJi75r_YD6DC0R8Br3yvsLAwE', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(28, '74', 'Sulawesi Tenggara', '{\"lat\":\"-1.8479\",\"lng\":\"120.5279\"}', 'ChIJMSoBqds3hS0RQnf0aNFRmrw', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(29, '75', 'Gorontalo', '{\"lat\":\"0.5435442\",\"lng\":\"123.0567693\"}', 'ChIJXeflmUcreTIRZ1kVIwlNzG0', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(30, '76', 'Sulawesi Barat', '{\"lat\":\"-2.8441371\",\"lng\":\"119.2320784\"}', 'ChIJCUS7VCTaki0R8nAzLyC_XOo', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(31, '81', 'Maluku', '{\"lat\":\"-3.2384616\",\"lng\":\"130.1452734\"}', 'ChIJ36EccLq8ES0RUZpkBNvoMF4', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(32, '82', 'Maluku Utara', '{\"lat\":\"1.5709993\",\"lng\":\"127.8087693\"}', 'ChIJszIkro6uni0RwBr3yvsLAwE', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(33, '91', 'Papua', '{\"lat\":\"-4.269928\",\"lng\":\"138.0803529\"}', 'ChIJc5L_qgQsO2gRc-bvXpxOqes', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(34, '92', 'Papua Barat', '{\"lat\":\"-1.3361154\",\"lng\":\"133.1747162\"}', 'ChIJLQviub0KVC0RYsvHxfjBSVM', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(35, '93', 'Papua Selatan', '{\"lat\":\"-4.269928\",\"lng\":\"138.0803529\"}', 'ChIJc5L_qgQsO2gRc-bvXpxOqes', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(36, '94', 'Papua Tengah', '{\"lat\":\"-4.269928\",\"lng\":\"138.0803529\"}', 'ChIJc5L_qgQsO2gRc-bvXpxOqes', '2024-07-13 08:57:39', '2024-07-13 08:57:39'),
(37, '95', 'Papua Pegunungan', '{\"lat\":\"-4.269928\",\"lng\":\"138.0803529\"}', 'ChIJc5L_qgQsO2gRc-bvXpxOqes', '2024-07-13 08:57:39', '2024-07-13 08:57:39');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wilayahs`
--
ALTER TABLE `wilayahs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wilayahs`
--
ALTER TABLE `wilayahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
