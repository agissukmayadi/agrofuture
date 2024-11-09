-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 09, 2024 at 08:48 PM
-- Server version: 8.1.0
-- PHP Version: 8.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agrofuture`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
('9d32314b-3294-4966-95a9-ffe9a73a4bf5', '9d32312c-3c19-4b14-a427-03cb3ca2408d', 2, '2024-10-08 12:11:26', '2024-10-08 12:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
('9d3230e6-8cc3-4982-a6c8-775c5b691da1', 'Tes', 'tes', '2024-10-08 12:02:23', '2024-10-09 01:06:22', '2024-10-09 01:06:22'),
('9d334951-cced-4794-8fb8-b4addb44b024', 'Sayuran', 'sayuran', '2024-10-09 01:06:29', '2024-10-09 01:06:29', NULL),
('9d33495c-e285-4e68-b633-e215b9be4573', 'Buah', 'buah', '2024-10-09 01:06:37', '2024-10-09 01:06:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_08_07_134113_create_categories_table', 1),
(5, '2024_08_07_142758_create_products_table', 1),
(6, '2024_08_07_143731_create_product_images_table', 1),
(7, '2024_08_20_043249_create_carts_table', 1),
(8, '2024_08_21_035601_create_orders_table', 1),
(9, '2024_08_21_221531_create_shipments_table', 1),
(10, '2024_08_21_222101_create_order_details_table', 1),
(11, '2024_08_27_040353_add_slug_to_table_products', 1),
(12, '2024_08_27_041527_create_personal_access_tokens_table', 1),
(13, '2024_08_27_042323_add_slug_to_categories', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `snap_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` int NOT NULL,
  `paid_at` datetime DEFAULT NULL,
  `shipped_at` datetime DEFAULT NULL,
  `cancelled_at` datetime DEFAULT NULL,
  `success_at` datetime DEFAULT NULL,
  `note_cancelled` text COLLATE utf8mb4_unicode_ci,
  `status` enum('PENDING','PAID','SHIPPED','SUCCESS','CANCELLED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `invoice_number`, `snap_token`, `total`, `paid_at`, `shipped_at`, `cancelled_at`, `success_at`, `note_cancelled`, `status`, `created_at`, `updated_at`) VALUES
('9d3232fe-eb17-4538-adb1-2bddd374a5ea', '9d32314b-3294-4966-95a9-ffe9a73a4bf5', 'INV/20241008/0001', '8b5e97b7-8ba0-4d13-9e82-c25098227383', 2458902, NULL, NULL, NULL, NULL, NULL, 'PENDING', '2024-10-08 12:08:14', '2024-10-08 12:08:16'),
('9d34bf42-eaf6-49f7-bd00-2e1ff5eda6ee', '9d34befc-e9f8-4814-ac35-f0c06449b3d2', 'INV/20241010/0001', '14f33055-2ecb-4674-87fb-b8e5767f10cb', 380000, '2024-10-10 01:37:43', '2024-10-10 01:38:34', NULL, '2024-10-10 01:41:33', NULL, 'SUCCESS', '2024-10-09 18:32:06', '2024-10-09 18:41:33'),
('9d34cc32-7f0f-4b8f-a148-ff33be4c9877', '9d34befc-e9f8-4814-ac35-f0c06449b3d2', 'INV/20241010/0002', 'd0aaafaa-8c41-4c2a-adc5-e679a8045549', 250000, '2024-10-10 02:08:50', '2024-10-10 02:13:45', NULL, NULL, NULL, 'SHIPPED', '2024-10-09 19:08:17', '2024-10-09 19:13:45'),
('9d34d866-488a-4420-8771-b21840d0d23d', '9d34befc-e9f8-4814-ac35-f0c06449b3d2', 'INV/20241010/0003', '094ab1f8-27cd-4c05-9b99-47029433cf18', 200000, '2024-10-10 02:44:08', '2024-10-10 02:46:17', NULL, NULL, NULL, 'SHIPPED', '2024-10-09 19:42:24', '2024-10-09 19:46:17'),
('9d34e31d-2d18-4118-8148-9bdafe81e9d6', '9d34befc-e9f8-4814-ac35-f0c06449b3d2', 'INV/20241010/0004', '6a355d31-286a-49fa-98e5-c912b510df2c', 230000, '2024-10-10 03:12:50', '2024-10-10 03:14:58', NULL, NULL, NULL, 'SHIPPED', '2024-10-09 20:12:22', '2024-10-09 20:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `weight` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `quantity`, `weight`, `created_at`, `updated_at`) VALUES
('9d3232fe-f3b9-42d5-ad49-dde9d47fcf63', '9d3232fe-eb17-4538-adb1-2bddd374a5ea', '9d32312c-3c19-4b14-a427-03cb3ca2408d', 1223451, 2, 4, '2024-10-08 12:08:14', '2024-10-08 12:08:14'),
('9d34bf42-f71a-4167-bf06-4a01a021ebf9', '9d34bf42-eaf6-49f7-bd00-2e1ff5eda6ee', '9d334bab-ba3c-4dcd-91fe-c77419b1c739', 100000, 2, 1000, '2024-10-09 18:32:06', '2024-10-09 18:32:06'),
('9d34bf42-fbf3-4127-aab7-6c8f34c6f882', '9d34bf42-eaf6-49f7-bd00-2e1ff5eda6ee', '9d334c46-cfb6-4d29-8834-82c574b5472b', 80000, 2, 100, '2024-10-09 18:32:06', '2024-10-09 18:32:06'),
('9d34cc32-8771-4eaf-9cdc-0b107e4083b2', '9d34cc32-7f0f-4b8f-a148-ff33be4c9877', '9d334c46-cfb6-4d29-8834-82c574b5472b', 80000, 3, 100, '2024-10-09 19:08:17', '2024-10-09 19:08:17'),
('9d34d866-5188-4e22-9b05-069d84271033', '9d34d866-488a-4420-8771-b21840d0d23d', '9d334c46-cfb6-4d29-8834-82c574b5472b', 80000, 2, 100, '2024-10-09 19:42:24', '2024-10-09 19:42:24'),
('9d34e31d-361e-4a3f-a1e3-d6be1f5b1adb', '9d34e31d-2d18-4118-8148-9bdafe81e9d6', '9d334bab-ba3c-4dcd-91fe-c77419b1c739', 100000, 2, 1000, '2024-10-09 20:12:22', '2024-10-09 20:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` int NOT NULL,
  `price` int NOT NULL,
  `stock` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `description`, `weight`, `price`, `stock`, `created_at`, `updated_at`, `deleted_at`) VALUES
('9d32312c-3c19-4b14-a427-03cb3ca2408d', '9d3230e6-8cc3-4982-a6c8-775c5b691da1', 'Agis Sukmayadi', 'agis-sukmayadi', 'tes', 4, 1223451, 2, '2024-10-08 12:03:09', '2024-10-09 01:07:31', '2024-10-09 01:07:31'),
('9d334af1-46e0-4062-b7ae-4a165da4951e', '9d334951-cced-4794-8fb8-b4addb44b024', 'Kol', 'kol', 'lorem ipsum', 1000, 50000, 5, '2024-10-09 01:11:02', '2024-10-09 01:12:26', '2024-10-09 01:12:26'),
('9d334bab-ba3c-4dcd-91fe-c77419b1c739', '9d334951-cced-4794-8fb8-b4addb44b024', 'Kol', 'kol-2', 'tes', 1000, 100000, 1, '2024-10-09 01:13:04', '2024-10-09 20:12:22', NULL),
('9d334c46-cfb6-4d29-8834-82c574b5472b', '9d334951-cced-4794-8fb8-b4addb44b024', 'Bawang', 'bawang', 'tes', 100, 80000, 3, '2024-10-09 01:14:46', '2024-10-09 19:42:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_thumbnail` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `name`, `is_thumbnail`, `created_at`, `updated_at`) VALUES
('9d32312c-4b4d-47a2-81e8-37ed210e5662', '9d32312c-3c19-4b14-a427-03cb3ca2408d', '1728388989_1724022026_1.jpeg', 1, '2024-10-08 12:03:09', '2024-10-08 12:03:09'),
('9d32312c-4de1-4402-ad63-3407078d3591', '9d32312c-3c19-4b14-a427-03cb3ca2408d', '1728388989_1724022026_2.jpeg', 0, '2024-10-08 12:03:09', '2024-10-08 12:03:09'),
('9d32312c-4f5b-4626-aef6-dbebc2960099', '9d32312c-3c19-4b14-a427-03cb3ca2408d', '1728388989_1724022026_3.jpeg', 0, '2024-10-08 12:03:09', '2024-10-08 12:03:09'),
('9d32312c-50d1-4844-ac7b-bd748c632f57', '9d32312c-3c19-4b14-a427-03cb3ca2408d', '1728388989_1724022026_4.jpeg', 0, '2024-10-08 12:03:09', '2024-10-08 12:03:09'),
('9d334af1-55e1-4ee7-a471-9a7dda1d9701', '9d334af1-46e0-4062-b7ae-4a165da4951e', '1728436262_product-image29-copyright-430x430.jpg', 1, '2024-10-09 01:11:02', '2024-10-09 01:11:02'),
('9d334bab-c76c-43fe-8ccf-ac0c2753925e', '9d334bab-ba3c-4dcd-91fe-c77419b1c739', '1728436384_product-image29-copyright-430x430.jpg', 1, '2024-10-09 01:13:04', '2024-10-09 01:13:04'),
('9d334bab-c9da-498a-9699-29dcbb3cd560', '9d334bab-ba3c-4dcd-91fe-c77419b1c739', '1728436384_product-image29-copyright-430x430.jpg', 0, '2024-10-09 01:13:04', '2024-10-09 01:13:04'),
('9d334c46-dc20-4ffe-ab74-907267c322b8', '9d334c46-cfb6-4d29-8834-82c574b5472b', '1728436486_product-image31-copyright.jpg-430x430.jpg', 1, '2024-10-09 01:14:46', '2024-10-09 01:14:46'),
('9d334c46-df11-430c-8b82-7e50a876edb2', '9d334c46-cfb6-4d29-8834-82c574b5472b', '1728436486_product-image31-copyright.jpg-430x430.jpg', 0, '2024-10-09 01:14:46', '2024-10-09 01:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Rk1cmeANp5A6H8DXJXKE85mvqbWT0vkwcaNb6vrv', NULL, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_0 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/17.5 Mobile/15A5370a Safari/602.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQVkyejBkSHVLVlg1bXlaNWtad25oUFBQWjZNZDI2YURUZEVyeDcxYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1728504968);

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracking_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estimate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`id`, `order_id`, `tracking_number`, `name`, `phone`, `address`, `city`, `province`, `courier`, `service`, `estimate`, `cost`, `created_at`, `updated_at`) VALUES
('9d3232fe-f14d-443a-94e2-9b36ab1aff0a', '9d3232fe-eb17-4538-adb1-2bddd374a5ea', NULL, 'Agis Sukmayadi', '085156134923', 'Kab.Bogor Kec.Ciomas Desa Padasuka RT01/03', 'Kabupaten Bandung', 'Jawa Barat', 'JNE', 'Layanan Reguler (REG)', '1-2', 12000, '2024-10-08 12:08:14', '2024-10-08 12:08:14'),
('9d34bf42-f462-41e8-9b43-e0b41e8de7d5', '9d34bf42-eaf6-49f7-bd00-2e1ff5eda6ee', '73979159361', 'Agis Sukmayadi', '085156134923', 'Kab.Bogor Kec.Ciomas Desa Padasuka RT01/03', 'Kabupaten Bogor', 'Jawa Barat', 'JNE', 'JNE City Courier (CTC)', '1-2', 20000, '2024-10-09 18:32:06', '2024-10-09 18:38:34'),
('9d34cc32-8663-4f6d-a8dc-baa0882d4010', '9d34cc32-7f0f-4b8f-a148-ff33be4c9877', '123455678', 'Agis Sukmayadi', '085156134923', 'Kab.Bogor Kec.Ciomas Desa Padasuka RT01/03', 'Kabupaten Bogor', 'Jawa Barat', 'JNE', 'JNE City Courier (CTC)', '1-2', 10000, '2024-10-09 19:08:17', '2024-10-09 19:13:45'),
('9d34d866-5060-477d-826c-aab4d2c1ca02', '9d34d866-488a-4420-8771-b21840d0d23d', '123456789', 'Agis Sukmayadi', '085156134923', 'Kab.Bogor Kec.Ciomas Desa Padasuka RT01/03', 'Kabupaten Bekasi', 'Jawa Barat', 'JNE', 'JNE Trucking (JTR)', '3-4', 40000, '2024-10-09 19:42:24', '2024-10-09 19:46:17'),
('9d34e31d-321a-40ef-8a42-69be3ddf3c4d', '9d34e31d-2d18-4118-8148-9bdafe81e9d6', '12345678', 'Agis Sukmayadi', '085156134923', 'Kab.Bogor Kec.Ciomas Desa Padasuka RT01/03', 'Kabupaten Indramayu', 'Jawa Barat', 'JNE', 'Layanan Reguler (REG)', '2-3', 30000, '2024-10-09 20:12:22', '2024-10-09 20:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','customer') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
('9d3230a2-b5e0-4a72-9da1-4104391a5672', 'Admin', 'admin@gmail.com', NULL, '$2y$12$9v3Tg/EQ4idXuveZfiTS9O77TJemQ9Hc9G325gfYr2iA6mKWqzwxS', 'admin', NULL, '2024-10-08 12:01:38', '2024-10-08 12:01:38', NULL),
('9d32314b-3294-4966-95a9-ffe9a73a4bf5', 'Agis Sukmayadi', 'agissukmayadi@gmail.com', NULL, '$2y$12$5IdNRZPIgmpP/ZTyIQEIL.Wvmmwp8lYAVoVzX9dz/UeahqnwJu.4m', 'customer', NULL, '2024-10-08 12:03:29', '2024-10-08 12:03:29', NULL),
('9d34befc-e9f8-4814-ac35-f0c06449b3d2', 'Customer Test', 'customertest@gmail.com', NULL, '$2y$12$LasDJfT8mDQlJzdKb/bNDOBcb0Kt9KsczhgON0/Q/Q8.AgGPmKsGe', 'customer', NULL, '2024-10-09 18:31:21', '2024-10-09 18:41:02', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_invoice_number_unique` (`invoice_number`),
  ADD UNIQUE KEY `orders_snap_token_unique` (`snap_token`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipments_order_id_foreign` (`order_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `shipments`
--
ALTER TABLE `shipments`
  ADD CONSTRAINT `shipments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
