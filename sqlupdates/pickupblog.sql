
-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `pickupblogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner` int(11) DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_img` int(11) DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `pickupblog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `section`, `guard_name`, `created_at`, `updated_at`) VALUES
(NULL, 'add_pickupblog', 'pickupblog', 'web', '2022-06-22 06:20:16', '2022-06-22 06:20:16'),
(NULL, 'view_pickupblogs', 'pickupblog', 'web', '2022-06-22 06:20:16', '2022-06-22 06:20:16'),
(NULL, 'edit_pickupblog', 'pickupblog', 'web', '2022-06-22 06:20:16', '2022-06-22 06:20:16'),
(NULL, 'delete_pickupblog', 'pickupblog', 'web', '2022-06-22 06:20:16', '2022-06-22 06:20:16'),
(NULL, 'publish_pickupblog', 'pickupblog', 'web', '2022-06-22 06:20:16', '2022-06-22 06:20:16'),

(NULL, 'view_pickupblog_categories', 'pickupblog', 'web', '2022-06-22 06:20:16', '2022-06-22 06:20:16'),
(NULL, 'add_pickupblog_category', 'pickupblog', 'web', '2022-06-22 06:20:16', '2022-06-22 06:20:16'),
(NULL, 'edit_pickupblog_category', 'pickupblog', 'web', '2022-06-22 06:20:16', '2022-06-22 06:20:16'),
(NULL, 'delete_pickupblog_category', 'pickupblog', 'web', '2022-06-22 06:20:16', '2022-06-22 06:20:16');
