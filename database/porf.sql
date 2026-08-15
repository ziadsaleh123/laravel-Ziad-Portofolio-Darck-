-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 يوليو 2026 الساعة 17:50
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `porf`
--

-- --------------------------------------------------------

--
-- بنية الجدول `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_title` varchar(255) DEFAULT NULL,
  `section_description` text DEFAULT NULL,
  `badge` varchar(255) DEFAULT NULL,
  `main_title` varchar(255) DEFAULT NULL,
  `paragraph_one` longtext DEFAULT NULL,
  `paragraph_two` longtext DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `specialty` varchar(255) DEFAULT NULL,
  `focus` varchar(255) DEFAULT NULL,
  `goal` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `abouts`
--

INSERT INTO `abouts` (`id`, `section_title`, `section_description`, `badge`, `main_title`, `paragraph_one`, `paragraph_two`, `name`, `specialty`, `focus`, `goal`, `created_at`, `updated_at`) VALUES
(1, 'من أنا', 'مطور واجهات أمامية أركز على بناء مواقع عصرية تعكس الثقة.', 'Front-End Developer', 'أبني تجارب رقمية تجمع بين الجمال والتنظيم', 'أعمل على تطوير واجهات أمامية باستخدام HTML وTailwind CSS وJavaScript وReact، مع اهتمام كبير بالتفاصيل البصرية، قابلية الاستخدام، وترتيب المحتوى بطريقة تخدم الهدف التجاري أو الشخصي للموقع', 'هدفي ليس فقط أن يبدو الموقع جميلًا، بل أن يكون منظمًا، مقنعًا، ومتوافقًا مع مختلف الأجهزة، ليعكس احترافية صاحب المشروع ويزيد من فرص التواصل أو البيع.', 'زياد صالح يسلم الحوري', 'Full-Stack Developer', 'UI / UX + الأداء', 'مواقع تترك انطباعًا قويًا لدى العملاء', '2026-05-07 04:20:45', '2026-05-11 08:38:05');

-- --------------------------------------------------------

--
-- بنية الجدول `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `contacts`
--

INSERT INTO `contacts` (`id`, `facebook`, `instagram`, `github`, `linkedin`, `whatsapp`, `created_at`, `updated_at`) VALUES
(1, 'https://www.facebook.com/profile.php?id=100080226734484', 'https://www.instagram.com/ziadalhorri/', 'https://github.com/ziadsaleh123?tab=repositories', NULL, '779118281', '2026-05-14 08:32:59', '2026-05-14 08:50:55');

-- --------------------------------------------------------

--
-- بنية الجدول `failed_jobs`
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
-- بنية الجدول `homes`
--

CREATE TABLE `homes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `main_title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `experience_years` varchar(255) DEFAULT NULL,
  `projects_count` varchar(255) DEFAULT NULL,
  `skills_count` varchar(255) DEFAULT NULL,
  `happy_clients` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `homes`
--

INSERT INTO `homes` (`id`, `logo`, `main_title`, `description`, `button_text`, `main_image`, `experience_years`, `projects_count`, `skills_count`, `happy_clients`, `created_at`, `updated_at`) VALUES
(5, 'زياد صالح يسلم الحوري', 'أصمم مواقع تجذب الانتباه وتُظهر مشروعك بشكل احترافي', 'أنا ، مطور واجهات أمامية وخفية  أركز على بناء مواقع حديثة، سريعة، ومتجاوبة، تجمع بين التصميم القوي والانطباع الاحترافي لتقديم أعمالك وخدماتك بصورة مميزة وواضحة', 'بهعغب7ب7', 'home/dCNzwN6tbP2ArH9kNLcu9Wh3MEvvSn2TMVd3t7Eu.jpg', '2', '3', '10', '80+', '2026-04-30 10:04:18', '2026-05-08 08:07:58');

-- --------------------------------------------------------

--
-- بنية الجدول `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_04_30_122222_create_homes_table', 2),
(5, '2026_05_07_070607_create_abouts_table', 3),
(6, '2026_05_07_085835_create_serves_table', 4),
(7, '2026_05_07_121322_create_services_table', 5),
(8, '2026_05_11_085326_create_projects_table', 6),
(9, '2026_05_14_080926_create_skills_table', 7),
(10, '2026_05_14_111932_create_contacts_table', 8),
(11, '2026_05_14_112445_create_contacts_table', 9),
(12, '2026_05_14_123740_create_social_links_table', 10);

-- --------------------------------------------------------

--
-- بنية الجدول `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_link` varchar(255) NOT NULL,
  `project_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `project_link`, `project_image`, `created_at`, `updated_at`) VALUES
(1, 'My Pprtofolio', 'http://127.0.0.1:8000/portofolio#about', 'projects/gCX7r7XlEEUVwCwRFsY8dQnk1fgoGiKpTwhHVk0d.png', '2026-05-11 06:10:09', '2026-05-11 08:30:27'),
(2, 'موبيليا النهضة للاثاث', 'https://mobiliaalnahdh.com/', 'projects/O5Eorm5KUszPv3p01c4I2m74Aqi1UImbZ3AH3vZ4.png', '2026-05-11 07:35:07', '2026-05-11 13:37:49');

-- --------------------------------------------------------

--
-- بنية الجدول `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_title` varchar(255) NOT NULL,
  `service_description` text NOT NULL,
  `service_status` varchar(255) NOT NULL DEFAULT 'متاحة',
  `service_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `services`
--

INSERT INTO `services` (`id`, `service_title`, `service_description`, `service_status`, `service_image`, `created_at`, `updated_at`) VALUES
(1, 'تصميم صفحات هبوط أو صفحة منفصلة', 'صفحات سريعة وواضحة تركز على جذب العميل وتحويل الزيارة إلى تواصل فعلي.', 'غير متاح', 'services/sDZtwim3HnitPCHZTzmjMgwoAP6pcsmsbDJMy8P2.png', '2026-05-07 09:27:54', '2026-05-07 16:59:08'),
(2, 'تصميم مواقع بسيطة (Static Websites)', 'صفحات تعريفية لشخص أو شركة\r\nLanding Page لمنتج أو خدمة\r\nصفحات بورتفوليو (Portfolio)\r\nصفحات سيرة ذاتية أونلاين\r\n\r\n👉 تستخدم: HTML + CSS + Bootstrap أو Tailwind +laravel', 'متاحة', 'services/I7kMXpdLaz2lNEQJCezBVndCYRAnJG3pBmGbOrDI.png', '2026-05-08 09:09:42', '2026-05-08 09:09:42');

-- --------------------------------------------------------

--
-- بنية الجدول `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('hfs2DRhMgGXGa7qU0pTttSNfULO286O4iM4kWJbo', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZHB5bkhlZXBTTzNrczc4QkI3a0dLZDVkSVI3aWN1NnhYTUxGeTVucyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wb3J0b2ZvbGlvIjtzOjU6InJvdXRlIjtzOjEwOiJwb3J0b2ZvbGlvIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjk6ImVkaXRfbW9kZSI7YjoxO30=', 1778774017);

-- --------------------------------------------------------

--
-- بنية الجدول `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `skill_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `skills`
--

INSERT INTO `skills` (`id`, `skill_name`, `skill_image`, `created_at`, `updated_at`) VALUES
(1, 'HTML', 'skills/yvQIwMAryDTFo938BI50fW7aUB4ZOgsCpNnFY5jr.png', '2026-05-14 05:18:21', '2026-05-14 05:18:21'),
(2, 'CSS', 'skills/vi476NqVLMUexFHIABXaqfgpBCWK4JbjRv7VlQST.png', '2026-05-14 05:19:19', '2026-05-14 05:19:19'),
(3, 'Javascripit', 'skills/kYC0HudAmCJ5oIRVkkR5cDFOTCNTFTNdPPuoBwQR.png', '2026-05-14 05:19:55', '2026-05-14 05:19:55'),
(4, 'Laravel', 'skills/QOsmlcLsDi01QD2YVEnvgczJnwqjE4MH7EHJe6Ve.jpg', '2026-05-14 05:20:14', '2026-05-14 05:20:14'),
(5, 'Bootstrap', 'skills/g3PRi6tQohaCiHO9YtvcsarKtjYaaxFErPOrHqZT.png', '2026-05-14 05:31:52', '2026-05-14 06:49:18');

-- --------------------------------------------------------

--
-- بنية الجدول `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `social_links`
--

INSERT INTO `social_links` (`id`, `name`, `url`, `icon`, `sort_order`, `created_at`, `updated_at`) VALUES
(2, 'Facebook', 'https://www.facebook.com/ziad.alhorri', 'ri-facebook-fill', 0, '2026-05-14 10:05:16', '2026-05-14 10:05:16'),
(4, 'instgram', 'https://www.instagram.com/ziadalhorri/', 'ri-instagram-line', 0, '2026-05-14 10:08:52', '2026-05-14 10:08:52'),
(5, 'git hup', 'https://github.com/ziadsaleh123?tab=repositories', 'ri-github-fill', 0, '2026-05-14 12:17:51', '2026-05-14 12:17:51');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
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

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'زياد صالح الحوري', 'ziad10713000@gmail.com', NULL, '$2y$12$/HLdBzPVJLw72/91Wpoh2erqqtm12Kv46JGvhK2BgX79YOMm2bJzO', NULL, '2026-04-30 06:06:10', '2026-04-30 06:06:10'),
(2, 'زياد صالح الحوري', 'ziad1071000@gmail.com', NULL, '$2y$12$SAP5fZtaJpv6ztpGym82WuzUH6UzPqzRyyAXeZ.T5.MXxbjkE968K', NULL, '2026-04-30 06:15:04', '2026-04-30 06:15:04'),
(3, 'عبدالله احمد خريصان', 'a10713000@gmail.com', NULL, '$2y$12$UZcIG2BwVneiiVp4QArytOyGe5bPOCrGLwL5tm68vj7eBkLuFJIcu', NULL, '2026-04-30 06:17:40', '2026-04-30 06:17:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
