-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2025 at 03:18 AM
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
-- Database: `inventory_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(120) NOT NULL,
  `category_created_at` varchar(120) NOT NULL,
  `category_updated_at` varchar(120) NOT NULL,
  `category_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `category_created_at`, `category_updated_at`, `category_status`) VALUES
(1, 'Labels', '2025-01-26 00:53:55', '2025-01-26 00:53:55', 1),
(2, 'Sweets', '2025-01-26 00:54:02', '2025-01-26 00:54:02', 1),
(3, 'Snacks', '2025-01-26 00:54:08', '2025-01-26 00:54:08', 1),
(4, 'Puffs', '2025-01-26 00:54:15', '2025-01-26 00:54:15', 1),
(5, 'Covers', '2025-01-26 01:29:29', '2025-01-26 01:29:29', 1),
(6, 'Breads', '2025-01-26 14:15:49', '2025-01-26 14:15:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(120) NOT NULL,
  `customer_mobile` varchar(120) NOT NULL,
  `customer_address` varchar(420) NOT NULL,
  `customer_created_on` varchar(50) NOT NULL,
  `customer_updated_on` varchar(50) NOT NULL,
  `customer_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `customer_mobile`, `customer_address`, `customer_created_on`, `customer_updated_on`, `customer_status`) VALUES
(1, 'Sabari', '9629291034', 'Dpi', '2025-01-22 19:49:10', '2025-01-22 19:49:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(120) NOT NULL,
  `item_hsn` varchar(120) NOT NULL,
  `unit_primary` varchar(120) NOT NULL,
  `unit_secondary` varchar(120) DEFAULT NULL,
  `unit_conversion` int(11) DEFAULT NULL,
  `item_desc` varchar(520) NOT NULL,
  `item_mrp` decimal(8,2) NOT NULL,
  `item_purchase` decimal(8,2) NOT NULL,
  `item_sale` decimal(8,2) DEFAULT NULL,
  `item_stock` decimal(8,2) NOT NULL,
  `item_created_at` varchar(120) NOT NULL,
  `item_updated_at` varchar(120) NOT NULL,
  `item_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `item_name`, `item_hsn`, `unit_primary`, `unit_secondary`, `unit_conversion`, `item_desc`, `item_mrp`, `item_purchase`, `item_sale`, `item_stock`, `item_created_at`, `item_updated_at`, `item_status`) VALUES
(1, '100G COVERS', '12151910', '1', NULL, NULL, '100G COVERS', 1.20, 0.80, 0.80, 10000.00, '2025-01-26 01:45:41', '2025-01-26 01:48:42', 1),
(2, 'SUGAR', '151241', '2', 'Gramms', 1000, 'SUGAR', 45.00, 38.00, 38.00, 250.00, '2025-01-26 01:47:38', '2025-01-26 01:49:35', 1),
(3, 'CHIPS POTATO', '123456', '2', 'Gramms', 1000, 'CHIPS POTATO', 60.00, 55.00, 55.00, 65.00, '2025-01-26 01:59:02', '2025-01-27 12:49:48', 1),
(4, 'YTUTYUTUT', '123456', '2', 'Gramms', 1000, 'YTUTYUTUT', 216.00, 2562.00, 2562.00, 0.00, '2025-01-26 14:24:09', '2025-01-26 14:24:09', 1),
(5, 'ICE MAIDHA', '151215', '2', 'Gramms', 1000, 'ICE MAIDHA', 40.00, 35.00, 35.00, 30.00, '2025-01-27 19:42:55', '2025-01-27 19:52:27', 1),
(6, 'SALT', '151214', '2', 'Gramms', 1000, 'SALT', 20.00, 18.00, 18.00, 1.00, '2025-01-27 19:43:37', '2025-01-27 19:52:27', 1),
(7, 'YEAST', '151215', '2', 'Gramms', 1000, 'YEAST', 150.00, 135.00, 135.00, 1.00, '2025-01-27 19:44:11', '2025-01-27 19:52:27', 1),
(8, 'BREAD IMPROVER', '1151215', '2', 'Gramms', 1000, 'BREAD IMPROVER', 50.00, 50.00, 50.00, 1.00, '2025-01-27 19:44:39', '2025-01-27 19:52:27', 1),
(9, 'GLUTEN', '151215', '2', 'Gramms', 1000, 'GLUTEN', 100.00, 85.00, 85.00, 1.00, '2025-01-27 19:45:12', '2025-01-27 19:52:27', 1),
(10, 'CALCIUM PROPIONATE CP', '151215', '2', 'Gramms', 1000, 'CALCIUM PROPIONATE CP', 150.00, 135.00, 135.00, 1.00, '2025-01-27 19:46:36', '2025-01-27 19:52:27', 1),
(11, 'VANILLA POWDER', '151215', '2', 'Gramms', 1000, 'VANILLA POWDER', 100.00, 95.00, 95.00, 2.00, '2025-01-27 19:47:16', '2025-01-27 19:52:27', 1),
(12, 'AMULYA MILK POWDER', '151215', '2', 'Gramms', 1000, 'AMULYA MILK POWDER', 150.00, 135.00, 135.00, 1.00, '2025-01-27 19:47:46', '2025-01-27 19:52:27', 1),
(13, 'GSM DALDA', '151215', '2', 'Gramms', 1000, 'GSM DALDA', 100.00, 95.00, 95.00, 1.00, '2025-01-27 19:48:17', '2025-01-27 19:52:27', 1),
(14, 'WHEAT ATTA', '151215', '2', 'Gramms', 1000, 'WHEAT ATTA', 50.00, 45.00, 45.00, 5.00, '2025-01-29 16:41:00', '2025-01-29 16:45:15', 1),
(15, 'CARAMAL', '151215', '4', 'Milliliter', 1000, 'CARAMAL', 150.00, 135.00, 135.00, 1.00, '2025-01-29 16:42:57', '2025-01-29 16:45:15', 1),
(16, 'EGG', '151215', '1', NULL, NULL, 'EGG', 6.00, 5.75, 5.75, 50.00, '2025-01-29 16:43:23', '2025-01-29 16:45:15', 1),
(17, 'LILLY DALDA', '151215', '2', 'Gramms', 1000, 'LILLY DALDA', 150.00, 135.00, 135.00, 10.00, '2025-01-29 16:43:51', '2025-01-29 16:45:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `context` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`context`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `level`, `message`, `context`, `created_at`, `updated_at`) VALUES
(1, 'info', 'Inventory imported from Excel file', '{\"file_name\":\"item (5).xlsx\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-20 13:49:00', '2025-01-20 13:49:00'),
(2, 'error', 'Failed to add item to inventory', '{\"error_message\":\"SQLSTATE[42S22]: Column not found: 1054 Unknown column \'user_name\' in \'field list\' (Connection: mysql, SQL: insert into `purchase` (`vendor_id`, `vendor_name`, `user_name`, `vendor_mobile`, `vendor_gstin`, `purchase_bill`, `purchase_date`, `total_amount`, `purchase_created_at`, `purchase_updated_at`) values (1, Chandra Traders, admin, 9629291000, 33AAACP1935C1Z0, gstcd1025, 2025-01-21, 20800.00, 2025-01-21 19:52:19, 2025-01-21 19:52:19))\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-21 14:22:19', '2025-01-21 14:22:19'),
(3, 'info', 'Item added to inventory', '{\"item_name\":\"Sunrich Oil 15 Tin\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-22 14:11:07', '2025-01-22 14:11:07'),
(4, 'error', 'Failed to add item to inventory', '{\"error_message\":\"SQLSTATE[42S22]: Column not found: 1054 Unknown column \'user_name\' in \'field list\' (Connection: mysql, SQL: insert into `purchase` (`vendor_id`, `vendor_name`, `user_name`, `vendor_mobile`, `vendor_gstin`, `purchase_bill`, `purchase_date`, `total_amount`, `purchase_created_at`, `purchase_updated_at`) values (1, Chandra Traders, admin, 9629291000, 33AAACP1935C1Z0, gst1024, 2025-01-22, 19450.00, 2025-01-22 19:42:10, 2025-01-22 19:42:10))\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-22 14:12:11', '2025-01-22 14:12:11'),
(5, 'error', 'Failed to add item to inventory', '{\"error_message\":\"SQLSTATE[42S22]: Column not found: 1054 Unknown column \'user_name\' in \'field list\' (Connection: mysql, SQL: insert into `purchase` (`vendor_id`, `vendor_name`, `user_name`, `vendor_mobile`, `vendor_gstin`, `purchase_bill`, `purchase_date`, `total_amount`, `purchase_created_at`, `purchase_updated_at`) values (1, Chandra Traders, admin, 9629291000, 33AAACP1935C1Z0, 123545, 2025-01-22, 19450.00, 2025-01-22 19:48:01, 2025-01-22 19:48:01))\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-22 14:18:01', '2025-01-22 14:18:01'),
(6, 'info', 'Sale added to inventory', '{\"item_name\":\"SALE\\/24-25\\/001\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-22 14:19:24', '2025-01-22 14:19:24'),
(7, 'error', 'Failed to add item to inventory', '{\"error_message\":\"SQLSTATE[42S22]: Column not found: 1054 Unknown column \'user_name\' in \'field list\' (Connection: mysql, SQL: insert into `purchase` (`vendor_id`, `vendor_name`, `user_name`, `vendor_mobile`, `vendor_gstin`, `purchase_bill`, `purchase_date`, `total_amount`, `purchase_created_at`, `purchase_updated_at`) values (1, Chandra Traders, admin, 9629291000, 33AAACP1935C1Z0, fdg4r345, 2025-01-22, 9725.00, 2025-01-22 19:53:22, 2025-01-22 19:53:22))\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-22 14:23:22', '2025-01-22 14:23:22'),
(8, 'error', 'Failed to add item to inventory', '\"{\\\"error_message\\\":\\\"SQLSTATE[42S22]: Column not found: 1054 Unknown column \'user_name\' in \'field list\' (Connection: mysql, SQL: insert into `purchase` (`vendor_id`, `vendor_name`, `user_name`, `vendor_mobile`, `vendor_gstin`, `purchase_bill`, `purchase_date`, `total_amount`, `purchase_created_at`, `purchase_updated_at`) values (1, Chandra Traders, admin, 9629291000, 33AAACP1935C1Z0, drt435, 2025-01-22, 19450.00, 2025-01-22 19:59:21, 2025-01-22 19:59:21))\\\",\\\"user_type\\\":\\\"Admin\\\",\\\"user_name\\\":\\\"admin\\\"}\"', '2025-01-22 14:29:21', '2025-01-22 14:29:21'),
(9, 'error', 'Failed to add item to inventory', '{\"error_message\":\"SQLSTATE[42S22]: Column not found: 1054 Unknown column \'user_name\' in \'field list\' (Connection: mysql, SQL: insert into `purchase` (`vendor_id`, `vendor_name`, `user_name`, `vendor_mobile`, `vendor_gstin`, `purchase_bill`, `purchase_date`, `total_amount`, `purchase_created_at`, `purchase_updated_at`) values (1, Chandra Traders, admin, 9629291000, 33AAACP1935C1Z0, hsh123, 2025-01-22, 9725.00, 2025-01-22 20:06:56, 2025-01-22 20:06:56))\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-22 14:36:56', '2025-01-22 14:36:56'),
(10, 'error', 'Failed to add item to inventory', '{\"error_message\":\"SQLSTATE[42S22]: Column not found: 1054 Unknown column \'user_name\' in \'field list\' (Connection: mysql, SQL: insert into `purchase` (`vendor_id`, `vendor_name`, `user_name`, `vendor_mobile`, `vendor_gstin`, `purchase_bill`, `purchase_date`, `total_amount`, `purchase_created_at`, `purchase_updated_at`) values (1, Chandra Traders, admin, 9629291000, 33AAACP1935C1Z0, 1234, 2025-01-22, 19450.00, 2025-01-22 20:07:11, 2025-01-22 20:07:11))\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-22 14:37:11', '2025-01-22 14:37:11'),
(11, 'error', 'Failed to add item to inventory', '{\"error_message\":\"SQLSTATE[HY000]: General error: 1364 Field \'vendor_address\' doesn\'t have a default value (Connection: mysql, SQL: insert into `purchase` (`vendor_id`, `vendor_name`, `vendor_mobile`, `vendor_gstin`, `purchase_bill`, `purchase_date`, `total_amount`, `purchase_created_at`, `purchase_updated_at`) values (1, Chandra Traders, 9629291000, 33AAACP1935C1Z0, fdty54656, 2025-01-22, 9725.00, 2025-01-22 20:12:16, 2025-01-22 20:12:16))\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-22 14:42:16', '2025-01-22 14:42:16'),
(12, 'info', 'Purchase added to inventory', '{\"item_name\":\"12454\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-22 14:52:49', '2025-01-22 14:52:49'),
(13, 'info', 'Purchase added to inventory', '{\"item_name\":\"5456\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-22 14:53:42', '2025-01-22 14:53:42'),
(14, 'info', 'Purchase added to inventory', '{\"item_name\":\"21456\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-22 14:54:52', '2025-01-22 14:54:52'),
(15, 'info', 'Sale added to inventory', '{\"item_name\":\"SALE\\/24-25\\/002\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-22 14:59:00', '2025-01-22 14:59:00'),
(16, 'info', 'Purchase added to inventory', '{\"item_name\":\"gfhrty23453\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-22 16:08:35', '2025-01-22 16:08:35'),
(17, 'info', 'Purchase added to inventory', '{\"item_name\":\"gfhrty23453\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-22 16:08:35', '2025-01-22 16:08:35'),
(18, 'info', 'Inventory imported from Excel file', '{\"file_name\":\"item (5).xlsx\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-22 16:09:36', '2025-01-22 16:09:36'),
(19, 'error', 'Failed to add item to inventory', '{\"error_message\":\"SQLSTATE[HY000]: General error: 1364 Field \'item_desc\' doesn\'t have a default value (Connection: mysql, SQL: insert into `item` (`item_name`, `item_hsn`, `item_unit`, `item_mrp`, `item_purchase`, `item_sale`, `item_stock`, `item_created_at`, `item_updated_at`, `item_status`) values (Sugar, 1548185, kg, 45, 35, 35, 0, 2025-01-23 21:21:02, 2025-01-23 21:21:02, 1))\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-23 15:51:03', '2025-01-23 15:51:03'),
(20, 'error', 'Failed to add item to inventory', '{\"error_message\":\"SQLSTATE[HY000]: General error: 1364 Field \'item_desc\' doesn\'t have a default value (Connection: mysql, SQL: insert into `item` (`item_name`, `item_hsn`, `item_unit`, `item_mrp`, `item_purchase`, `item_sale`, `item_stock`, `item_created_at`, `item_updated_at`, `item_status`) values (Sugar, 1541158, kg, 45, 35, 35, 0, 2025-01-23 21:21:21, 2025-01-23 21:21:21, 1))\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-23 15:51:21', '2025-01-23 15:51:21'),
(21, 'error', 'Failed to add item to inventory', '{\"error_message\":\"SQLSTATE[HY000]: General error: 1364 Field \'item_desc\' doesn\'t have a default value (Connection: mysql, SQL: insert into `item` (`item_name`, `item_hsn`, `item_unit`, `item_mrp`, `item_purchase`, `item_sale`, `item_stock`, `item_created_at`, `item_updated_at`, `item_status`) values (Sugar, 15141513, kg, 45, 35, 35, 0, 2025-01-23 21:22:04, 2025-01-23 21:22:04, 1))\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-23 15:52:04', '2025-01-23 15:52:04'),
(22, 'info', 'Item added to inventory', '{\"item_name\":\"Sugar\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-23 15:56:48', '2025-01-23 15:56:48'),
(23, 'info', 'Unit added to inventory', '{\"item_name\":null,\"user_type\":null,\"user_name\":null}', '2025-01-25 17:48:47', '2025-01-25 17:48:47'),
(24, 'error', 'Failed to add unit to inventory', '{\"error_message\":\"SQLSTATE[23000]: Integrity constraint violation: 1048 Column \'unit_secondary\' cannot be null (Connection: mysql, SQL: insert into `unit` (`unit_primary`, `unit_pri_short`, `unit_secondary`, `unit_sec_short`, `unit_conversion`, `unit_created_at`, `unit_updated_at`, `unit_status`) values (Numbers, Nos, ?, ?, ?, 2025-01-25 23:34:47, 2025-01-25 23:34:47, 1))\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-25 18:04:48', '2025-01-25 18:04:48'),
(25, 'error', 'Failed to add unit to inventory', '{\"error_message\":\"SQLSTATE[23000]: Integrity constraint violation: 1048 Column \'unit_secondary\' cannot be null (Connection: mysql, SQL: insert into `unit` (`unit_primary`, `unit_pri_short`, `unit_secondary`, `unit_sec_short`, `unit_conversion`, `unit_created_at`, `unit_updated_at`, `unit_status`) values (Numbers, Nos, ?, ?, ?, 2025-01-25 23:35:08, 2025-01-25 23:35:08, 1))\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-25 18:05:08', '2025-01-25 18:05:08'),
(26, 'info', 'Unit added to inventory', '{\"item_name\":null,\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-25 18:10:11', '2025-01-25 18:10:11'),
(27, 'info', 'Unit added to inventory', '{\"item_name\":null,\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-25 18:10:26', '2025-01-25 18:10:26'),
(28, 'info', 'Unit added to inventory', '{\"item_name\":null,\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-25 18:37:30', '2025-01-25 18:37:30'),
(29, 'info', 'Category added to inventory', '{\"item_name\":null,\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-25 19:23:55', '2025-01-25 19:23:55'),
(30, 'info', 'Category added to inventory', '{\"item_name\":null,\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-25 19:24:02', '2025-01-25 19:24:02'),
(31, 'info', 'Category added to inventory', '{\"item_name\":null,\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-25 19:24:09', '2025-01-25 19:24:09'),
(32, 'info', 'Category added to inventory', '{\"item_name\":null,\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-25 19:24:15', '2025-01-25 19:24:15'),
(33, 'info', 'Category added to inventory', '{\"item_name\":null,\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-25 19:59:30', '2025-01-25 19:59:30'),
(34, 'info', 'Item added to inventory', '{\"item_name\":\"100G COVERS\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-25 20:15:41', '2025-01-25 20:15:41'),
(35, 'info', 'Item added to inventory', '{\"item_name\":\"SUGAR\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-25 20:17:38', '2025-01-25 20:17:38'),
(36, 'info', 'Purchase added to inventory', '{\"item_name\":\"dsf1234\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-25 20:18:42', '2025-01-25 20:18:42'),
(37, 'info', 'Purchase added to inventory', '{\"item_name\":\"ndsgfig\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-25 20:19:35', '2025-01-25 20:19:35'),
(38, 'info', 'Item added to inventory', '{\"item_name\":\"CHIPS POTATO\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-25 20:29:02', '2025-01-25 20:29:02'),
(39, 'info', 'Category added to inventory', '{\"item_name\":null,\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-26 08:45:49', '2025-01-26 08:45:49'),
(40, 'error', 'Failed to add Category to inventory', '{\"error_message\":\"SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry \'Labels\' for key \'category_category_name_unique\' (Connection: mysql, SQL: insert into `category` (`category_name`, `category_created_at`, `category_updated_at`, `category_status`) values (Labels, 2025-01-26 14:15:57, 2025-01-26 14:15:57, 1))\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-26 08:45:57', '2025-01-26 08:45:57'),
(41, 'info', 'Item added to inventory', '{\"item_name\":\"YTUTYUTUT\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-26 08:54:09', '2025-01-26 08:54:09'),
(42, 'error', 'Failed to add Product Category to inventory', '{\"error_message\":\"SQLSTATE[23000]: Integrity constraint violation: 1048 Column \'product_category_name\' cannot be null (Connection: mysql, SQL: insert into `product_category` (`product_category_name`, `product_category_created_at`, `product_category_updated_at`, `product_category_status`) values (?, 2025-01-26 22:51:41, 2025-01-26 22:51:41, 1))\",\"user_type\":null,\"user_name\":null}', '2025-01-26 17:21:42', '2025-01-26 17:21:42'),
(43, 'error', 'Failed to add Product Category to inventory', '{\"error_message\":\"SQLSTATE[23000]: Integrity constraint violation: 1048 Column \'product_category_name\' cannot be null (Connection: mysql, SQL: insert into `product_category` (`product_category_name`, `product_category_created_at`, `product_category_updated_at`, `product_category_status`) values (?, 2025-01-26 22:51:53, 2025-01-26 22:51:53, 1))\",\"user_type\":null,\"user_name\":null}', '2025-01-26 17:21:53', '2025-01-26 17:21:53'),
(44, 'info', 'Product Category added to inventory', '{\"item_name\":null,\"user_type\":null,\"user_name\":null}', '2025-01-26 17:22:22', '2025-01-26 17:22:22'),
(45, 'info', 'Product Category added to inventory', '{\"item_name\":null,\"user_type\":null,\"user_name\":null}', '2025-01-26 17:22:34', '2025-01-26 17:22:34'),
(46, 'info', 'Product Category added to inventory', '{\"item_name\":null,\"user_type\":null,\"user_name\":null}', '2025-01-26 17:22:43', '2025-01-26 17:22:43'),
(47, 'info', 'Product Category added to inventory', '{\"item_name\":null,\"user_type\":null,\"user_name\":null}', '2025-01-26 17:22:49', '2025-01-26 17:22:49'),
(48, 'info', 'Purchase added to inventory', '{\"item_name\":\"dfgdfg\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-27 07:19:48', '2025-01-27 07:19:48'),
(49, 'info', 'Item added to inventory', '{\"item_name\":\"ICE MAIDHA\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-27 14:12:55', '2025-01-27 14:12:55'),
(50, 'info', 'Item added to inventory', '{\"item_name\":\"SALT\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-27 14:13:37', '2025-01-27 14:13:37'),
(51, 'info', 'Item added to inventory', '{\"item_name\":\"YEAST\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-27 14:14:11', '2025-01-27 14:14:11'),
(52, 'info', 'Item added to inventory', '{\"item_name\":\"BREAD IMPROVER\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-27 14:14:39', '2025-01-27 14:14:39'),
(53, 'info', 'Item added to inventory', '{\"item_name\":\"GLUTEN\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-27 14:15:12', '2025-01-27 14:15:12'),
(54, 'info', 'Item added to inventory', '{\"item_name\":\"CALCIUM PROPIONATE CP\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-27 14:16:36', '2025-01-27 14:16:36'),
(55, 'info', 'Item added to inventory', '{\"item_name\":\"VANILLA POWDER\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-27 14:17:16', '2025-01-27 14:17:16'),
(56, 'info', 'Item added to inventory', '{\"item_name\":\"AMULYA MILK POWDER\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-27 14:17:46', '2025-01-27 14:17:46'),
(57, 'info', 'Item added to inventory', '{\"item_name\":\"GSM DALDA\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-27 14:18:17', '2025-01-27 14:18:17'),
(58, 'info', 'Purchase added to inventory', '{\"item_name\":\"NDSHJSHD\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-27 14:22:27', '2025-01-27 14:22:27'),
(59, 'info', 'Purchase added to inventory', '{\"item_name\":\"NDSHJSHD\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-27 14:22:27', '2025-01-27 14:22:27'),
(60, 'info', 'Purchase added to inventory', '{\"item_name\":\"NDSHJSHD\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-27 14:22:27', '2025-01-27 14:22:27'),
(61, 'info', 'Purchase added to inventory', '{\"item_name\":\"NDSHJSHD\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-27 14:22:27', '2025-01-27 14:22:27'),
(62, 'info', 'Purchase added to inventory', '{\"item_name\":\"NDSHJSHD\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-27 14:22:27', '2025-01-27 14:22:27'),
(63, 'info', 'Purchase added to inventory', '{\"item_name\":\"NDSHJSHD\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-27 14:22:27', '2025-01-27 14:22:27'),
(64, 'info', 'Purchase added to inventory', '{\"item_name\":\"NDSHJSHD\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-27 14:22:27', '2025-01-27 14:22:27'),
(65, 'info', 'Purchase added to inventory', '{\"item_name\":\"NDSHJSHD\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-27 14:22:27', '2025-01-27 14:22:27'),
(66, 'info', 'Purchase added to inventory', '{\"item_name\":\"NDSHJSHD\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-27 14:22:27', '2025-01-27 14:22:27'),
(67, 'info', 'Purchase added to inventory', '{\"item_name\":\"NDSHJSHD\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-27 14:22:27', '2025-01-27 14:22:27'),
(68, 'error', 'Failed to add Product to inventory', '{\"error_message\":\"Undefined variable $item_id\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-27 14:55:01', '2025-01-27 14:55:01'),
(69, 'error', 'Failed to add Product to inventory', '{\"error_message\":\"Undefined variable $item_id\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-27 14:57:16', '2025-01-27 14:57:16'),
(70, 'error', 'Failed to add Product to inventory', '{\"error_message\":\"SQLSTATE[42S22]: Column not found: 1054 Unknown column \'product__created_at\' in \'field list\' (Connection: mysql, SQL: insert into `product` (`product_name`, `product_category`, `item_id`, `item_qty`, `product__created_at`, `product_updated_at`, `product_status`) values (Bread, 3, [\\\"5\\\",\\\"2\\\",\\\"6\\\",\\\"7\\\",\\\"8\\\",\\\"9\\\",\\\"10\\\",\\\"11\\\",\\\"12\\\",\\\"13\\\"], [\\\"1\\\",\\\"0.25\\\",\\\"0.01\\\",\\\"0.015\\\",\\\"0.005\\\",\\\"0.005\\\",\\\"0.005\\\",\\\"0.015\\\",\\\"0.005\\\",\\\"0.05\\\"], 2025-01-27 20:36:12, 2025-01-27 20:36:12, 1))\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-27 15:06:12', '2025-01-27 15:06:12'),
(71, 'error', 'Failed to add Product to inventory', '{\"error_message\":\"SQLSTATE[42S22]: Column not found: 1054 Unknown column \'product__created_at\' in \'field list\' (Connection: mysql, SQL: insert into `product` (`product_name`, `product_category`, `item_id`, `item_qty`, `product__created_at`, `product_updated_at`, `product_status`) values (bread, 3, [\\\"5\\\",\\\"2\\\"], [\\\"1\\\",\\\"0.25\\\"], 2025-01-27 20:40:49, 2025-01-27 20:40:49, 1))\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-27 15:10:49', '2025-01-27 15:10:49'),
(72, 'error', 'Failed to add Product to inventory', '{\"error_message\":\"SQLSTATE[42S22]: Column not found: 1054 Unknown column \'product__created_at\' in \'field list\' (Connection: mysql, SQL: insert into `product` (`product_name`, `product_category`, `item_id`, `item_qty`, `product__created_at`, `product_updated_at`, `product_status`) values (Bread, 3, [\\\"5\\\",\\\"2\\\"], [\\\"1\\\",\\\"0.25\\\"], 2025-01-27 20:41:20, 2025-01-27 20:41:20, 1))\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-27 15:11:20', '2025-01-27 15:11:20'),
(73, 'error', 'Failed to add Product to inventory', '{\"error_message\":\"SQLSTATE[42S22]: Column not found: 1054 Unknown column \'product__created_at\' in \'field list\' (Connection: mysql, SQL: insert into `product` (`product_name`, `product_category`, `item_id`, `item_qty`, `product__created_at`, `product_updated_at`, `product_status`) values (Bread, 3, [\\\"5\\\",\\\"2\\\"], [\\\"1\\\",\\\"0.25\\\"], 2025-01-27 20:42:56, 2025-01-27 20:42:56, 1))\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-27 15:12:56', '2025-01-27 15:12:56'),
(74, 'error', 'Failed to add Product to inventory', '{\"error_message\":\"SQLSTATE[42S22]: Column not found: 1054 Unknown column \'product__created_at\' in \'field list\' (Connection: mysql, SQL: insert into `product` (`product_name`, `product_category`, `item_id`, `item_qty`, `product__created_at`, `product_updated_at`, `product_status`) values (Bread, 3, [\\\"5\\\",\\\"2\\\"], [\\\"1\\\",\\\"0.25\\\"], 2025-01-27 20:44:52, 2025-01-27 20:44:52, 1))\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-27 15:14:52', '2025-01-27 15:14:52'),
(75, 'info', 'Product added to inventory', '{\"item_name\":\"Bread\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-27 15:18:51', '2025-01-27 15:18:51'),
(76, 'info', 'Item added to inventory', '{\"item_name\":\"WHEAT ATTA\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-29 11:11:01', '2025-01-29 11:11:01'),
(77, 'info', 'Unit added to inventory', '{\"item_name\":null,\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-29 11:12:21', '2025-01-29 11:12:21'),
(78, 'info', 'Item added to inventory', '{\"item_name\":\"CARAMAL\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-29 11:12:57', '2025-01-29 11:12:57'),
(79, 'info', 'Item added to inventory', '{\"item_name\":\"EGG\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-29 11:13:23', '2025-01-29 11:13:23'),
(80, 'info', 'Item added to inventory', '{\"item_name\":\"LILLY DALDA\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-29 11:13:51', '2025-01-29 11:13:51'),
(81, 'info', 'Purchase added to inventory', '{\"item_name\":\"dfsaf1234\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-29 11:15:15', '2025-01-29 11:15:15'),
(82, 'info', 'Purchase added to inventory', '{\"item_name\":\"dfsaf1234\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-29 11:15:15', '2025-01-29 11:15:15'),
(83, 'info', 'Purchase added to inventory', '{\"item_name\":\"dfsaf1234\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-29 11:15:15', '2025-01-29 11:15:15'),
(84, 'info', 'Purchase added to inventory', '{\"item_name\":\"dfsaf1234\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-29 11:15:15', '2025-01-29 11:15:15'),
(85, 'info', 'Product added to inventory', '{\"item_name\":\"Wheat Bread\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-29 11:19:20', '2025-01-29 11:19:20'),
(86, 'info', 'Product added to inventory', '{\"item_name\":\"Puff\",\"user_type\":\"Admin\",\"user_name\":\"admin\"}', '2025-01-29 11:20:23', '2025-01-29 11:20:23');

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
(14, '0001_01_01_000000_create_users_table', 1),
(15, '0001_01_01_000001_create_cache_table', 1),
(16, '0001_01_01_000002_create_jobs_table', 1),
(17, '0001_01_01_000003_create_logs_table', 1),
(18, '0001_01_01_000004_customer', 1),
(19, '0001_01_01_000005_employee', 1),
(21, '0001_01_01_000007_purchase', 1),
(22, '0001_01_01_000008_purchase_item', 1),
(23, '0001_01_01_000009_sale', 1),
(24, '0001_01_01_000010_sale_item', 1),
(25, '0001_01_01_000011_user_details', 1),
(26, '0001_01_01_000012_vendor', 1),
(27, '2025_01_23_062523_raw_item', 2),
(31, '2025_01_25_180345_unit', 4),
(32, '2025_01_26_003247_category', 5),
(34, '0001_01_01_000006_item', 6),
(35, '2025_01_26_160250_product_category', 7),
(36, '2025_01_23_064214_product', 8);

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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(120) NOT NULL,
  `product_category` varchar(120) NOT NULL,
  `item_id` varchar(120) NOT NULL,
  `item_qty` varchar(120) NOT NULL,
  `product_created_at` varchar(120) NOT NULL,
  `product_updated_at` varchar(120) NOT NULL,
  `product_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_category`, `item_id`, `item_qty`, `product_created_at`, `product_updated_at`, `product_status`) VALUES
(2, 'Bread', '3', '[\"5\",\"2\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\"]', '[\"1\",\"0.25\",\"0.01\",\"0.015\",\"0.005\",\"0.005\",\"0.005\",\"0.015\",\"0.005\",\"0.05\"]', '2025-01-27 20:48:51', '2025-01-27 20:48:51', 1),
(3, 'Wheat Bread', '3', '[\"5\",\"2\",\"14\",\"6\",\"7\",\"8\",\"9\",\"12\",\"13\",\"15\"]', '[\"0.75\",\"0.175\",\"0.5\",\"0.04\",\"0.06\",\"0.02\",\"0.02\",\"0.05\",\"0.2\",\"0.018\"]', '2025-01-29 16:49:20', '2025-01-29 16:49:20', 1),
(4, 'Puff', '3', '[\"2\",\"5\",\"6\",\"17\",\"16\"]', '[\"0.5\",\"1\",\"0.02\",\"0.55\",\"3\"]', '2025-01-29 16:50:23', '2025-01-29 16:50:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_category_name` varchar(120) NOT NULL,
  `product_category_created_at` varchar(120) NOT NULL,
  `product_category_updated_at` varchar(120) NOT NULL,
  `product_category_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `product_category_name`, `product_category_created_at`, `product_category_updated_at`, `product_category_status`) VALUES
(1, 'Sweet', '2025-01-26 22:52:22', '2025-01-26 22:52:22', 1),
(2, 'Snacks', '2025-01-26 22:52:34', '2025-01-26 22:52:34', 1),
(3, 'Bakery', '2025-01-26 22:52:43', '2025-01-26 22:52:43', 1),
(4, 'Others', '2025-01-26 22:52:49', '2025-01-26 22:52:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` varchar(11) NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `vendor_address` varchar(255) NOT NULL,
  `vendor_mobile` varchar(15) NOT NULL,
  `vendor_gstin` varchar(15) NOT NULL,
  `purchase_bill` varchar(50) NOT NULL,
  `purchase_date` varchar(50) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `purchase_created_at` varchar(120) NOT NULL,
  `purchase_updated_at` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `vendor_id`, `vendor_name`, `vendor_address`, `vendor_mobile`, `vendor_gstin`, `purchase_bill`, `purchase_date`, `total_amount`, `purchase_created_at`, `purchase_updated_at`) VALUES
(1, '1', 'Chandra Traders', 'Chennai', '9629291000', '33AAACP1935C1Z0', '12454', '2025-01-22', 9725.00, '2025-01-22 20:22:49', '2025-01-22 20:22:49'),
(2, '1', 'Chandra Traders', 'Chennai', '9629291000', '33AAACP1935C1Z0', '5456', '2025-01-22', 9725.00, '2025-01-22 20:23:42', '2025-01-22 20:23:42'),
(3, '1', 'Chandra Traders', 'Chennai', '9629291000', '33AAACP1935C1Z0', '21456', '2025-01-22', 194500.00, '2025-01-22 20:24:52', '2025-01-22 20:24:52'),
(4, '1', 'Chandra Traders', 'Chennai', '9629291000', '33AAACP1935C1Z0', 'gfhrty23453', '2025-01-22', 21395.00, '2025-01-22 21:38:34', '2025-01-22 21:38:34'),
(5, '1', 'Chandra Traders', 'Chennai', '9629291000', '33AAACP1935C1Z0', 'dsf1234', '2025-01-25', 10000.00, '2025-01-26 01:48:42', '2025-01-26 01:48:42'),
(6, '1', 'Chandra Traders', 'Chennai', '9629291000', '33AAACP1935C1Z0', 'ndsgfig', '2025-01-25', 9500.00, '2025-01-26 01:49:35', '2025-01-26 01:49:35'),
(7, '1', 'Chandra Traders', 'Chennai', '9629291000', '33AAACP1935C1Z0', 'dfgdfg', '2025-01-27', 3575.00, '2025-01-27 12:49:48', '2025-01-27 12:49:48'),
(8, '1', 'Chandra Traders', 'Chennai', '9629291000', '33AAACP1935C1Z0', 'NDSHJSHD', '2025-01-27', 1893.00, '2025-01-27 19:52:27', '2025-01-27 19:52:27'),
(9, '1', 'Chandra Traders', 'Chennai', '9629291000', '33AAACP1935C1Z0', 'dfsaf1234', '2025-01-29', 2010.00, '2025-01-29 16:45:15', '2025-01-29 16:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_item`
--

CREATE TABLE `purchase_item` (
  `id` int(10) UNSIGNED NOT NULL,
  `purchase_bill` varchar(50) NOT NULL,
  `purchase_id` varchar(11) NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_id` varchar(11) NOT NULL,
  `item_hsn` varchar(15) NOT NULL,
  `item_mrp` varchar(15) NOT NULL,
  `item_qty` varchar(15) NOT NULL,
  `purchase_date` varchar(50) NOT NULL,
  `item_purchase_price` decimal(10,2) NOT NULL,
  `item_amount` decimal(10,2) NOT NULL,
  `created_at` varchar(120) NOT NULL,
  `updated_at` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_item`
--

INSERT INTO `purchase_item` (`id`, `purchase_bill`, `purchase_id`, `vendor_name`, `item_name`, `item_id`, `item_hsn`, `item_mrp`, `item_qty`, `purchase_date`, `item_purchase_price`, `item_amount`, `created_at`, `updated_at`) VALUES
(1, '12454', '1', 'Chandra Traders', 'Sunrich Oil 15 Tin', '1', '15121910', '2400', '5', '2025-01-22', 1945.00, 9725.00, '2025-01-22 20:22:49', '2025-01-22 20:22:49'),
(2, '5456', '2', 'Chandra Traders', 'Sunrich Oil 15 Tin', '1', '15121910', '2400', '5', '2025-01-22', 1945.00, 9725.00, '2025-01-22 20:23:42', '2025-01-22 20:23:42'),
(3, '21456', '3', 'Chandra Traders', 'Sunrich Oil 15 Tin', '1', '15121910', '2400', '100', '2025-01-22', 1945.00, 194500.00, '2025-01-22 20:24:52', '2025-01-22 20:24:52'),
(4, 'gfhrty23453', '4', 'Chandra Traders', 'Sunrich Oil 15 Tin', '1', '15121910', '2400', '01', '2025-01-22', 1945.00, 1945.00, '2025-01-22 21:38:34', '2025-01-22 21:38:34'),
(5, 'gfhrty23453', '4', 'Chandra Traders', 'Sunrich Oil 15 Tin', '1', '15121910', '2400', '10', '2025-01-22', 1945.00, 19450.00, '2025-01-22 21:38:35', '2025-01-22 21:38:35'),
(6, 'dsf1234', '5', 'Chandra Traders', '100G COVERS', '1', '12151910', '2', '10000', '2025-01-25', 1.00, 10000.00, '2025-01-26 01:48:42', '2025-01-26 01:48:42'),
(7, 'ndsgfig', '6', 'Chandra Traders', 'SUGAR', '2', '151241', '45.00', '250', '2025-01-25', 38.00, 9500.00, '2025-01-26 01:49:35', '2025-01-26 01:49:35'),
(8, 'dfgdfg', '7', 'Chandra Traders', 'CHIPS POTATO', '3', '123456', '60.00', '65', '2025-01-27', 55.00, 3575.00, '2025-01-27 12:49:48', '2025-01-27 12:49:48'),
(9, 'NDSHJSHD', '8', 'Chandra Traders', 'ICE MAIDHA', '5', '151215', '40.00', '30', '2025-01-27', 35.00, 1050.00, '2025-01-27 19:52:27', '2025-01-27 19:52:27'),
(10, 'NDSHJSHD', '8', 'Chandra Traders', 'SALT', '6', '151214', '20.00', '1', '2025-01-27', 18.00, 18.00, '2025-01-27 19:52:27', '2025-01-27 19:52:27'),
(11, 'NDSHJSHD', '8', 'Chandra Traders', 'YEAST', '7', '151215', '150.00', '1', '2025-01-27', 135.00, 135.00, '2025-01-27 19:52:27', '2025-01-27 19:52:27'),
(12, 'NDSHJSHD', '8', 'Chandra Traders', 'BREAD IMPROVER', '8', '1151215', '50.00', '1', '2025-01-27', 50.00, 50.00, '2025-01-27 19:52:27', '2025-01-27 19:52:27'),
(13, 'NDSHJSHD', '8', 'Chandra Traders', 'GLUTEN', '9', '151215', '100.00', '1', '2025-01-27', 85.00, 85.00, '2025-01-27 19:52:27', '2025-01-27 19:52:27'),
(14, 'NDSHJSHD', '8', 'Chandra Traders', 'CALCIUM PROPIONATE CP', '10', '151215', '150.00', '1', '2025-01-27', 135.00, 135.00, '2025-01-27 19:52:27', '2025-01-27 19:52:27'),
(15, 'NDSHJSHD', '8', 'Chandra Traders', 'VANILLA POWDER', '11', '151215', '100.00', '1', '2025-01-27', 95.00, 95.00, '2025-01-27 19:52:27', '2025-01-27 19:52:27'),
(16, 'NDSHJSHD', '8', 'Chandra Traders', 'VANILLA POWDER', '11', '151215', '100.00', '1', '2025-01-27', 95.00, 95.00, '2025-01-27 19:52:27', '2025-01-27 19:52:27'),
(17, 'NDSHJSHD', '8', 'Chandra Traders', 'AMULYA MILK POWDER', '12', '151215', '150.00', '1', '2025-01-27', 135.00, 135.00, '2025-01-27 19:52:27', '2025-01-27 19:52:27'),
(18, 'NDSHJSHD', '8', 'Chandra Traders', 'GSM DALDA', '13', '151215', '100.00', '1', '2025-01-27', 95.00, 95.00, '2025-01-27 19:52:27', '2025-01-27 19:52:27'),
(19, 'dfsaf1234', '9', 'Chandra Traders', 'WHEAT ATTA', '14', '151215', '50.00', '5', '2025-01-29', 45.00, 225.00, '2025-01-29 16:45:15', '2025-01-29 16:45:15'),
(20, 'dfsaf1234', '9', 'Chandra Traders', 'CARAMAL', '15', '151215', '150.00', '1', '2025-01-29', 135.00, 135.00, '2025-01-29 16:45:15', '2025-01-29 16:45:15'),
(21, 'dfsaf1234', '9', 'Chandra Traders', 'EGG', '16', '151215', '6.00', '50', '2025-01-29', 6.00, 300.00, '2025-01-29 16:45:15', '2025-01-29 16:45:15'),
(22, 'dfsaf1234', '9', 'Chandra Traders', 'LILLY DALDA', '17', '151215', '150.00', '10', '2025-01-29', 135.00, 1350.00, '2025-01-29 16:45:15', '2025-01-29 16:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `raw_item`
--

CREATE TABLE `raw_item` (
  `id` int(10) UNSIGNED NOT NULL,
  `raw_item_name` varchar(120) NOT NULL,
  `raw_item_hsn` varchar(120) NOT NULL,
  `raw_item_unit` varchar(120) NOT NULL,
  `raw_item_desc` varchar(520) NOT NULL,
  `raw_item_mrp` int(11) NOT NULL,
  `raw_item_purchase` int(11) NOT NULL,
  `raw_item_sale` int(11) NOT NULL,
  `raw_item_stock` int(11) NOT NULL,
  `raw_item_created_at` varchar(120) NOT NULL,
  `raw_item_updated_at` varchar(120) NOT NULL,
  `raw_item_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` varchar(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `customer_mobile` varchar(15) NOT NULL,
  `sale_bill` varchar(50) NOT NULL,
  `sale_date` varchar(50) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `sale_created_at` varchar(120) NOT NULL,
  `sale_updated_at` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `customer_id`, `customer_name`, `user_name`, `customer_mobile`, `sale_bill`, `sale_date`, `total_amount`, `sale_created_at`, `sale_updated_at`) VALUES
(1, '1', 'Sabari', 'admin', '9629291034', 'SALE/24-25/001', '2025-01-22', 11000.00, '2025-01-22 19:49:24', '2025-01-22 19:49:24'),
(2, '1', 'Sabari', 'admin', '9629291034', 'SALE/24-25/002', '2025-01-22', 242000.00, '2025-01-22 20:29:00', '2025-01-22 20:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `sale_item`
--

CREATE TABLE `sale_item` (
  `id` int(10) UNSIGNED NOT NULL,
  `sale_bill` varchar(50) NOT NULL,
  `sale_id` varchar(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `item_id` varchar(11) NOT NULL,
  `item_hsn` varchar(15) NOT NULL,
  `item_mrp` varchar(15) NOT NULL,
  `item_qty` varchar(15) NOT NULL,
  `sale_date` varchar(50) NOT NULL,
  `item_sale_price` decimal(10,2) NOT NULL,
  `item_amount` decimal(10,2) NOT NULL,
  `created_at` varchar(120) NOT NULL,
  `updated_at` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_item`
--

INSERT INTO `sale_item` (`id`, `sale_bill`, `sale_id`, `item_name`, `customer_name`, `item_id`, `item_hsn`, `item_mrp`, `item_qty`, `sale_date`, `item_sale_price`, `item_amount`, `created_at`, `updated_at`) VALUES
(1, 'SALE/24-25/001', '1', 'Sunrich Oil 15 Tin', 'Sabari', '1', '15121910', '2400', '5', '2025-01-22', 2200.00, 11000.00, '2025-01-22 19:49:24', '2025-01-22 19:49:24'),
(2, 'SALE/24-25/002', '2', 'Sunrich Oil 15 Tin', 'Sabari', '1', '15121910', '2400', '110', '2025-01-22', 2200.00, 242000.00, '2025-01-22 20:29:00', '2025-01-22 20:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('XQMmJKGFIQEIRoQ0wty7p9DIPUZe23Y6Ez8XlI4A', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiRUxIUVppbnBJTWtvUWxjaTBQTElialJENHBnQkpDek5KZ1p4SXQ4OSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZGRfcHJvZHVjdGlvbiI7fXM6MTA6InNlc3Npb25faWQiO2k6MTtzOjEyOiJzZXNzaW9uX25hbWUiO3M6NToiYWRtaW4iO3M6MTM6InNlc3Npb25fZW1haWwiO3M6MTU6ImFkbWluQGFkbWluLmNvbSI7czoxNzoic2Vzc2lvbl91c2VyX3R5cGUiO3M6NToiQWRtaW4iO3M6ODoibG9nZ2VkaW4iO3M6MTI6IlVzZXJMb2dnZWRJbiI7fQ==', 1738199804);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(10) UNSIGNED NOT NULL,
  `unit_primary` varchar(120) NOT NULL,
  `unit_pri_short` varchar(120) NOT NULL,
  `unit_secondary` varchar(120) DEFAULT NULL,
  `unit_sec_short` varchar(120) DEFAULT NULL,
  `unit_conversion` int(11) DEFAULT NULL,
  `unit_created_at` varchar(120) NOT NULL,
  `unit_updated_at` varchar(120) NOT NULL,
  `unit_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `unit_primary`, `unit_pri_short`, `unit_secondary`, `unit_sec_short`, `unit_conversion`, `unit_created_at`, `unit_updated_at`, `unit_status`) VALUES
(1, 'Numbers', 'Nos', NULL, NULL, NULL, '2025-01-25 23:40:11', '2025-01-25 23:40:11', 1),
(2, 'Kilogram', 'KG', 'Gramms', 'G', 1000, '2025-01-25 23:40:26', '2025-01-25 23:40:26', 1),
(3, 'Pieces', 'Pcs', NULL, NULL, NULL, '2025-01-26 00:07:30', '2025-01-26 00:07:30', 1),
(4, 'Liter', 'L', 'Milliliter', 'ML', 1000, '2025-01-29 16:42:21', '2025-01-29 16:42:21', 1);

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
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(120) NOT NULL,
  `lname` varchar(120) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `dob` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `pwd` varchar(120) NOT NULL,
  `address` varchar(120) NOT NULL,
  `city` varchar(120) NOT NULL,
  `state` varchar(120) NOT NULL,
  `pincode` varchar(120) NOT NULL,
  `created_at` varchar(120) NOT NULL,
  `updated_at` varchar(120) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `fname`, `lname`, `mobile`, `dob`, `email`, `pwd`, `address`, `city`, `state`, `pincode`, `created_at`, `updated_at`, `type`, `status`) VALUES
(1, 'admin', '1', '9999999999', '2025-01-01', 'admin@admin.com', '$2y$12$EwONW1qr9pUWDM9sYnJIVO9BpjH/fZKFQoTPkVcd1SeaRrHZlvScS', 'Papparapatti', 'Dharmapuri', 'Tamilnadu', '636809', '2025-01-20 18:58:12', '2025-01-20 18:58:12', 'Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_name` varchar(120) NOT NULL,
  `vendor_mobile` varchar(120) NOT NULL,
  `vendor_email` varchar(120) NOT NULL,
  `vendor_gstin` varchar(120) NOT NULL,
  `vendor_address` varchar(420) NOT NULL,
  `vendor_created_on` varchar(50) NOT NULL,
  `vendor_updated_on` varchar(50) NOT NULL,
  `vendor_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `vendor_name`, `vendor_mobile`, `vendor_email`, `vendor_gstin`, `vendor_address`, `vendor_created_on`, `vendor_updated_on`, `vendor_status`) VALUES
(1, 'Chandra Traders', '9629291000', 'chand@chand.com', '33AAACP1935C1Z0', 'Chennai', '2025-01-21 19:50:38', '2025-01-21 19:50:38', 1);

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
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_id_unique` (`id`),
  ADD UNIQUE KEY `category_category_name_unique` (`category_name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_id_unique` (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item_id_unique` (`id`);

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
-- Indexes for table `logs`
--
ALTER TABLE `logs`
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
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_id_unique` (`id`),
  ADD UNIQUE KEY `product_product_name_unique` (`product_name`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_category_id_unique` (`id`),
  ADD UNIQUE KEY `product_category_product_category_name_unique` (`product_category_name`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `purchase_id_unique` (`id`);

--
-- Indexes for table `purchase_item`
--
ALTER TABLE `purchase_item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `purchase_item_id_unique` (`id`);

--
-- Indexes for table `raw_item`
--
ALTER TABLE `raw_item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `raw_item_id_unique` (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sale_id_unique` (`id`);

--
-- Indexes for table `sale_item`
--
ALTER TABLE `sale_item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sale_item_id_unique` (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unit_id_unique` (`id`),
  ADD UNIQUE KEY `unit_unit_primary_unique` (`unit_primary`),
  ADD UNIQUE KEY `unit_unit_pri_short_unique` (`unit_pri_short`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_details_id_unique` (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendor_id_unique` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `purchase_item`
--
ALTER TABLE `purchase_item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `raw_item`
--
ALTER TABLE `raw_item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sale_item`
--
ALTER TABLE `sale_item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
