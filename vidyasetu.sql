-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2026 at 01:16 PM
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
-- Database: `vidyasetu`
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
-- Table structure for table `login_logs`
--

CREATE TABLE `login_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` text DEFAULT NULL,
  `device_type` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `operating_system` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `successful` tinyint(1) NOT NULL DEFAULT 1,
  `failure_reason` varchar(255) DEFAULT NULL,
  `login_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `logout_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login_logs`
--

INSERT INTO `login_logs` (`id`, `user_id`, `ip_address`, `user_agent`, `device_type`, `browser`, `operating_system`, `location`, `successful`, `failure_reason`, `login_at`, `logout_at`, `created_at`, `updated_at`) VALUES
(1, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-04-06 06:44:32', NULL, '2026-04-06 06:44:32', '2026-04-06 06:44:32'),
(2, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-04-06 06:44:49', NULL, '2026-04-06 06:44:49', '2026-04-06 06:44:49'),
(3, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-04-06 06:45:48', NULL, '2026-04-06 06:45:48', '2026-04-06 06:45:48'),
(4, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-04-06 06:45:50', NULL, '2026-04-06 06:45:50', '2026-04-06 06:45:50'),
(5, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-04-06 06:46:50', NULL, '2026-04-06 06:46:50', '2026-04-06 06:46:50'),
(6, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-04-06 06:52:15', NULL, '2026-04-06 06:52:15', '2026-04-06 06:52:15'),
(7, 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-04-06 06:57:31', NULL, '2026-04-06 06:57:31', '2026-04-06 06:57:31'),
(8, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-04-06 07:00:36', NULL, '2026-04-06 07:00:36', '2026-04-06 07:00:36'),
(9, 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-04-06 07:01:23', NULL, '2026-04-06 07:01:23', '2026-04-06 07:01:23'),
(10, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-04-08 07:48:31', NULL, '2026-04-08 07:48:31', '2026-04-08 07:48:31'),
(11, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-04-10 04:16:49', NULL, '2026-04-10 04:16:49', '2026-04-10 04:16:49'),
(12, 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, 'Invalid password', '2026-04-10 04:20:47', NULL, '2026-04-10 04:20:47', '2026-04-10 04:20:47'),
(13, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, 'Invalid password', '2026-04-10 04:21:02', NULL, '2026-04-10 04:21:02', '2026-04-10 04:21:02'),
(14, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, 'Invalid password', '2026-04-10 04:21:38', NULL, '2026-04-10 04:21:38', '2026-04-10 04:21:38'),
(15, 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-04-10 04:22:22', NULL, '2026-04-10 04:22:22', '2026-04-10 04:22:22'),
(16, 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-04-10 04:27:18', NULL, '2026-04-10 04:27:18', '2026-04-10 04:27:18'),
(17, 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-04-10 04:28:47', NULL, '2026-04-10 04:28:47', '2026-04-10 04:28:47'),
(18, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-04-10 04:44:27', NULL, '2026-04-10 04:44:27', '2026-04-10 04:44:27'),
(19, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-04-10 09:08:42', NULL, '2026-04-10 09:08:42', '2026-04-10 09:08:42'),
(20, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-04-11 11:28:44', NULL, '2026-04-11 11:28:44', '2026-04-11 11:28:44'),
(21, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-04-13 05:35:15', NULL, '2026-04-13 05:35:15', '2026-04-13 05:35:15'),
(22, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-04-13 05:58:22', NULL, '2026-04-13 05:58:22', '2026-04-13 05:58:22'),
(23, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-04-13 06:04:21', NULL, '2026-04-13 06:04:21', '2026-04-13 06:04:21'),
(24, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-04-13 06:10:40', NULL, '2026-04-13 06:10:40', '2026-04-13 06:10:40'),
(25, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, 'Invalid password', '2026-04-13 06:11:05', NULL, '2026-04-13 06:11:05', '2026-04-13 06:11:05'),
(26, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-04-13 06:13:46', NULL, '2026-04-13 06:13:46', '2026-04-13 06:13:46'),
(27, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-04-13 06:18:17', NULL, '2026-04-13 06:18:17', '2026-04-13 06:18:17'),
(28, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-04-13 06:28:10', NULL, '2026-04-13 06:28:10', '2026-04-13 06:28:10'),
(29, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-04-14 04:28:45', NULL, '2026-04-14 04:28:45', '2026-04-14 04:28:45'),
(30, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, 'Invalid or expired OTP', '2026-04-14 07:53:08', NULL, '2026-04-14 07:53:08', '2026-04-14 07:53:08'),
(31, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-04-14 07:53:43', NULL, '2026-04-14 07:53:43', '2026-04-14 07:53:43'),
(32, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-04-16 04:22:32', NULL, '2026-04-16 04:22:32', '2026-04-16 04:22:32'),
(33, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-04-22 05:15:00', NULL, '2026-04-22 05:15:00', '2026-04-22 05:15:00'),
(34, NULL, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', NULL, NULL, NULL, NULL, 1, 'User not found', '2026-06-30 04:47:26', NULL, '2026-06-30 04:47:26', '2026-06-30 04:47:26'),
(35, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', NULL, NULL, NULL, NULL, 1, NULL, '2026-06-30 04:50:57', NULL, '2026-06-30 04:50:57', '2026-06-30 04:50:57');

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
(1, '2024_01_01_000004_create_roles_table', 1),
(2, '0001_01_01_000000_create_users_table', 2),
(3, '0001_01_01_000001_create_cache_table', 2),
(4, '0001_01_01_000002_create_jobs_table', 2),
(5, '2024_01_01_000003_add_authentication_fields_to_users_table', 2),
(6, '2024_01_01_000005_create_user_verifications_table', 2),
(7, '2024_01_01_000006_create_login_logs_table', 2),
(8, '2024_01_01_000007_create_otp_logs_table', 2),
(9, '2026_04_06_061501_add_authentication_fields_to_users_table', 2),
(10, '2026_04_06_121330_create_personal_access_tokens_table', 3),
(11, '2026_04_13_000001_create_schools_table', 4),
(12, '2026_04_13_000002_add_school_id_to_users_table', 4),
(13, '2026_04_13_000003_make_login_logs_user_id_nullable', 5),
(14, '2026_04_13_000004_add_password_changed_at_to_users_table', 6),
(15, '2026_04_14_000001_create_school_classes_and_sections_tables', 7),
(16, '2026_04_14_000002_add_school_class_and_section_to_users_table', 7),
(17, '2026_04_14_000004_change_school_class_number_to_string', 8),
(18, '2026_04_16_000010_add_active_to_school_classes_and_sections', 9);

-- --------------------------------------------------------

--
-- Table structure for table `otp_logs`
--

CREATE TABLE `otp_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('email','sms') NOT NULL,
  `recipient` varchar(255) NOT NULL,
  `otp_code` varchar(10) NOT NULL,
  `purpose` enum('verification','password_reset','login','registration') NOT NULL,
  `is_used` tinyint(1) NOT NULL DEFAULT 0,
  `used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT 0,
  `successful` tinyint(1) NOT NULL DEFAULT 0,
  `failure_reason` varchar(255) DEFAULT NULL,
  `metadata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`metadata`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `otp_logs`
--

INSERT INTO `otp_logs` (`id`, `user_id`, `type`, `recipient`, `otp_code`, `purpose`, `is_used`, `used_at`, `expires_at`, `attempts`, `successful`, `failure_reason`, `metadata`, `created_at`, `updated_at`) VALUES
(1, 2, 'sms', '9876543211', '075091', 'login', 1, '2026-04-10 04:16:48', '2026-04-10 04:26:13', 0, 1, NULL, NULL, '2026-04-10 04:16:13', '2026-04-10 04:16:48'),
(2, 5, 'sms', '9876543214', '285777', 'login', 1, '2026-04-10 04:22:22', '2026-04-10 04:31:59', 0, 1, NULL, NULL, '2026-04-10 04:21:59', '2026-04-10 04:22:22'),
(3, 4, 'sms', '9876543213', '707838', 'login', 1, '2026-04-10 04:27:18', '2026-04-10 04:37:04', 0, 1, NULL, NULL, '2026-04-10 04:27:04', '2026-04-10 04:27:18'),
(4, 3, 'sms', '9876543212', '318809', 'login', 1, '2026-04-10 04:28:47', '2026-04-10 04:38:16', 0, 1, NULL, NULL, '2026-04-10 04:28:16', '2026-04-10 04:28:47'),
(5, 2, 'sms', '9876543211', '725890', 'login', 1, '2026-04-10 04:44:27', '2026-04-10 04:54:09', 0, 1, NULL, NULL, '2026-04-10 04:44:09', '2026-04-10 04:44:27'),
(6, 2, 'sms', '9876543211', '327632', 'login', 1, '2026-04-10 09:08:42', '2026-04-10 09:18:23', 0, 1, NULL, NULL, '2026-04-10 09:08:23', '2026-04-10 09:08:42'),
(7, 2, 'sms', '9876543211', '413047', 'login', 1, '2026-04-11 11:28:44', '2026-04-11 11:35:31', 0, 1, NULL, NULL, '2026-04-11 11:25:31', '2026-04-11 11:28:44'),
(8, 2, 'sms', '9876543211', '121032', 'login', 1, '2026-04-13 05:35:15', '2026-04-13 05:45:01', 0, 1, NULL, NULL, '2026-04-13 05:35:01', '2026-04-13 05:35:15'),
(9, 2, 'sms', '9876543211', '530136', 'login', 0, NULL, '2026-04-13 06:07:58', 0, 0, NULL, NULL, '2026-04-13 05:57:58', '2026-04-13 05:57:58'),
(10, 2, 'sms', '9876543211', '100577', 'login', 1, '2026-04-13 05:58:22', '2026-04-13 06:08:02', 0, 1, NULL, NULL, '2026-04-13 05:58:02', '2026-04-13 05:58:22'),
(11, 2, 'sms', '9876543211', '224554', 'login', 0, NULL, '2026-04-13 06:11:03', 0, 0, NULL, NULL, '2026-04-13 06:01:03', '2026-04-13 06:01:03'),
(12, 2, 'sms', '9876543211', '667622', 'login', 1, '2026-04-13 06:04:21', '2026-04-13 06:14:09', 0, 1, NULL, NULL, '2026-04-13 06:04:09', '2026-04-13 06:04:21'),
(13, 2, 'sms', '9876543211', '852904', 'login', 1, '2026-04-13 06:10:40', '2026-04-13 06:20:06', 0, 1, NULL, NULL, '2026-04-13 06:10:06', '2026-04-13 06:10:40'),
(14, 2, 'sms', '9876543211', '597257', 'login', 1, '2026-04-13 06:28:10', '2026-04-13 06:37:51', 0, 1, NULL, NULL, '2026-04-13 06:27:51', '2026-04-13 06:28:10'),
(15, 2, 'email', 'prerna.jshb@computered.co.in', '521160', 'password_reset', 1, '2026-04-14 04:28:10', '2026-04-14 04:36:11', 0, 1, NULL, NULL, '2026-04-14 04:26:11', '2026-04-14 04:28:10'),
(16, 2, 'sms', '9876543211', '718454', 'login', 0, NULL, '2026-04-14 08:02:51', 0, 0, NULL, NULL, '2026-04-14 07:52:51', '2026-04-14 07:52:51'),
(17, 2, 'sms', '9876543211', '687068', 'login', 1, '2026-04-14 07:53:43', '2026-04-14 08:03:18', 0, 1, NULL, NULL, '2026-04-14 07:53:18', '2026-04-14 07:53:43'),
(18, 2, 'sms', '9876543211', '740445', 'login', 1, '2026-04-22 05:15:00', '2026-04-22 05:24:44', 0, 1, NULL, NULL, '2026-04-22 05:14:44', '2026-04-22 05:15:00'),
(19, 2, 'sms', '9876543211', '115984', 'login', 1, '2026-06-30 04:50:56', '2026-06-30 05:00:27', 0, 1, NULL, NULL, '2026-06-30 04:50:27', '2026-06-30 04:50:56');

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
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `permissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`permissions`)),
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `priority` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `permissions`, `is_active`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'Super Administrator', 'Full system access with all permissions', '[\"manage_users\",\"manage_roles\",\"manage_schools\",\"manage_students\",\"manage_teachers\",\"manage_admissions\",\"manage_fees\",\"manage_reports\",\"manage_settings\",\"view_analytics\",\"manage_system\"]', 1, 100, '2026-04-06 06:31:07', '2026-04-06 06:31:07'),
(2, 'school_admin', 'School Administrator', 'School-level administrator with management permissions', '[\"manage_students\",\"manage_teachers\",\"manage_admissions\",\"manage_fees\",\"manage_reports\",\"view_analytics\",\"manage_school_settings\"]', 1, 80, '2026-04-06 06:31:07', '2026-04-06 06:31:07'),
(3, 'teacher', 'Teacher', 'Teaching staff with student management permissions', '[\"view_students\",\"manage_student_grades\",\"manage_attendance\",\"view_reports\",\"manage_class_content\"]', 1, 60, '2026-04-06 06:31:07', '2026-04-06 06:31:07'),
(4, 'student', 'Student', 'Student with access to personal information and courses', '[\"view_personal_info\",\"view_grades\",\"view_attendance\",\"access_course_content\",\"view_fee_details\"]', 1, 40, '2026-04-06 06:31:07', '2026-04-06 06:31:07'),
(5, 'parent', 'Parent', 'Parent with access to child\'s information', '[\"view_child_info\",\"view_child_grades\",\"view_child_attendance\",\"view_child_fee_details\",\"contact_teachers\"]', 1, 30, '2026-04-06 06:31:07', '2026-04-06 06:31:07'),
(6, 'staff', 'Staff', 'Non-teaching staff with limited permissions', '[\"view_assigned_tasks\",\"manage_basic_records\",\"view_reports\"]', 1, 20, '2026-04-06 06:31:08', '2026-04-06 06:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL DEFAULT 'India',
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `code`, `address`, `city`, `state`, `country`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'DAV Public School, Patna', 'DAVPAT', '5 MG Road, Patna', 'Patna', 'Bihar', 'India', '+911234567890', 'info@davpatna.edu.in', '2026-04-13 05:56:14', '2026-04-13 05:56:14'),
(2, 'Green Valley International School', 'GVIS', '12 School Lane, Ranchi', 'Ranchi', 'Jharkhand', 'India', '+919876543000', 'contact@gvischool.in', '2026-04-13 05:56:14', '2026-04-13 05:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `school_classes`
--

CREATE TABLE `school_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `number` varchar(100) NOT NULL,
  `display_number` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_classes`
--

INSERT INTO `school_classes` (`id`, `school_id`, `number`, `display_number`, `name`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 'I', 'Class 1', NULL, 1, '2026-04-14 04:40:13', '2026-04-14 04:40:13'),
(2, 1, 'Nursery', 'NUR', 'Nursery', NULL, 1, '2026-04-14 09:34:51', '2026-04-14 09:34:51');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `school_class_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `school_id`, `school_class_id`, `name`, `display_name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'A', 'Section A', 1, '2026-04-14 09:45:19', '2026-04-14 09:45:19'),
(2, 1, 2, 'A', 'Section A', 0, '2026-04-14 10:00:39', '2026-04-16 05:23:20');

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
('6ENXPp0DaOthOK4tDx4uW7DDHXpv8ZOW2xM6bIpJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiamtwN2RtT0Rrbnc0Q0syMnEwR0YxUVVhMjZsM3UydFp1cVM4dFFoMCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1782795575),
('i0Ued8Ty4I6ybVbpeWzvta1RXFat7R5I6FujwtGo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUlNkWHhFVGFSYUt3aHBwQ3lKbHBMMnZKT21FVzd0Y0xCbVdxMDRjdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6OTAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776834555),
('UWQK1vmoUni5RGnejF8DUFJ7NG3fA1cvmNfb8l5X', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaEJrS2JaY1lsNXN2bzkwbmEwOFFnb05zY25rYXp3Vm11VElaZTJMMCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6OTAwMC9hZG1pbi9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1776835054);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `password_changed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(255) DEFAULT NULL,
  `preferences` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`preferences`)),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `school_class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `phone_verified_at`, `email_verified_at`, `password`, `password_changed_at`, `remember_token`, `created_at`, `updated_at`, `role_id`, `avatar`, `is_active`, `last_login_at`, `last_login_ip`, `preferences`, `deleted_at`, `school_id`, `school_class_id`, `section_id`) VALUES
(1, 'Super Administrator', 'admin@vidyasetu.com', '+919876543210', '2026-04-13 05:56:15', '2026-04-13 05:56:15', '$2y$12$c8cwmSZz1tI8HbJauRiS9.HIO/e16pors6rq4UOw8PRcPK00UFula', '2026-04-06 06:31:08', NULL, '2026-04-06 06:31:08', '2026-04-13 05:56:15', 1, NULL, 1, '2026-04-06 07:00:36', NULL, '{\"theme\":\"light\",\"language\":\"en\",\"notifications\":{\"email\":true,\"sms\":true,\"push\":true}}', NULL, 1, NULL, NULL),
(2, 'Ritik Kumar', 'prerna.jshb@computered.co.in', '9876543211', '2026-04-06 06:31:08', '2026-04-06 06:31:08', '$2y$12$gJWhLUb0otH8o7/rh.4RCuW4Egho3EwlwS3daU.c2x311a4wIfPXS', '2026-04-14 04:28:10', 'Iqc4OVgqRq7wUoKFRXzU0ASaag27hQw93pv4FNzOkfEpPu1FviahoOeAwGl1', '2026-04-06 06:31:08', '2026-06-30 04:50:57', 2, NULL, 1, '2026-06-30 04:50:57', NULL, NULL, NULL, 1, NULL, NULL),
(3, 'John Smith', 'teacher@vidyasetu.com', '+919876543212', '2026-04-13 05:56:15', '2026-04-13 05:56:15', '$2y$12$wFMEEjgaY8r8C1.12j9txeLAofPcWPlX7MeGdRjCFPVvCgPhzHCZW', '2026-04-06 06:31:09', NULL, '2026-04-06 06:31:09', '2026-04-13 05:56:15', 3, NULL, 1, '2026-04-10 04:28:47', NULL, NULL, NULL, 1, NULL, NULL),
(4, 'Alice Johnson', 'student@vidyasetu.com', '+919876543213', '2026-04-13 05:56:15', '2026-04-13 05:56:15', '$2y$12$nQCH8bRcc3oNjITKZYF6AeykyyFgXwVJtyehaqHLvJkKG7MTy.KJ2', '2026-04-06 06:31:09', NULL, '2026-04-06 06:31:09', '2026-04-13 05:56:15', 4, NULL, 1, '2026-04-10 04:27:18', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Bob Johnson', 'parent@vidyasetu.com', '+919876543214', '2026-04-13 05:56:16', '2026-04-13 05:56:16', '$2y$12$geFh6VRUog7cfNUiIRw2Oe8j7PnVXlcPw7.0V.5O4hcyxb6.OptNe', '2026-04-06 06:31:09', NULL, '2026-04-06 06:31:09', '2026-04-13 05:56:16', 5, NULL, 1, '2026-04-10 04:22:22', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Daniella Herzog II', 'tyrique.bayer@example.com', NULL, '2026-04-06 06:31:09', '2026-04-06 06:31:09', '$2y$12$wz4EidvTdBi4kQU2dw792.1.PiIaK8xIXuD1PT0aG4Ss4xDLTHZZW', '2026-04-06 06:31:09', 'FAI1JH0DYS', '2026-04-06 06:31:09', '2026-04-06 06:31:09', 4, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Sonny Cole', 'vicky.anderson@example.com', NULL, '2026-04-06 06:31:09', '2026-04-06 06:31:09', '$2y$12$wz4EidvTdBi4kQU2dw792.1.PiIaK8xIXuD1PT0aG4Ss4xDLTHZZW', '2026-04-06 06:31:09', 'GLq4dk4iaM', '2026-04-06 06:31:09', '2026-04-06 06:57:31', 4, NULL, 1, '2026-04-06 06:57:31', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Delaney Mann IV', 'laila85@example.org', NULL, '2026-04-06 06:31:09', '2026-04-06 06:31:09', '$2y$12$wz4EidvTdBi4kQU2dw792.1.PiIaK8xIXuD1PT0aG4Ss4xDLTHZZW', '2026-04-06 06:31:09', '1W5RQn9Csc', '2026-04-06 06:31:09', '2026-04-06 06:31:09', 4, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Carrie Auer', 'mleffler@example.org', NULL, '2026-04-06 06:31:09', '2026-04-06 06:31:09', '$2y$12$wz4EidvTdBi4kQU2dw792.1.PiIaK8xIXuD1PT0aG4Ss4xDLTHZZW', '2026-04-06 06:31:09', 'cyjWMmDeY5', '2026-04-06 06:31:09', '2026-04-06 06:31:09', 4, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Addison Johnson IV', 'karli.hickle@example.net', NULL, '2026-04-06 06:31:09', '2026-04-06 06:31:09', '$2y$12$wz4EidvTdBi4kQU2dw792.1.PiIaK8xIXuD1PT0aG4Ss4xDLTHZZW', '2026-04-06 06:31:09', 'RTR3gGHVJx', '2026-04-06 06:31:09', '2026-04-06 06:31:09', 4, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Manuel Reinger', 'runolfsdottir.shea@example.net', NULL, '2026-04-06 06:31:09', '2026-04-06 06:31:09', '$2y$12$wz4EidvTdBi4kQU2dw792.1.PiIaK8xIXuD1PT0aG4Ss4xDLTHZZW', '2026-04-06 06:31:09', 'l60M8PnS7l', '2026-04-06 06:31:09', '2026-04-06 06:31:09', 4, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Dr. Rosemarie Schuppe IV', 'ucollier@example.net', NULL, '2026-04-06 06:31:09', '2026-04-06 06:31:09', '$2y$12$wz4EidvTdBi4kQU2dw792.1.PiIaK8xIXuD1PT0aG4Ss4xDLTHZZW', '2026-04-06 06:31:10', 'wwkKpFlOsE', '2026-04-06 06:31:10', '2026-04-06 06:31:10', 4, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Clemmie Mraz DVM', 'reynolds.tod@example.net', NULL, '2026-04-06 06:31:09', '2026-04-06 06:31:09', '$2y$12$wz4EidvTdBi4kQU2dw792.1.PiIaK8xIXuD1PT0aG4Ss4xDLTHZZW', '2026-04-06 06:31:10', 'A5xthUfoTv', '2026-04-06 06:31:10', '2026-04-06 06:31:10', 4, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Isaiah Hauck', 'dion.watsica@example.org', NULL, '2026-04-06 06:31:09', '2026-04-06 06:31:09', '$2y$12$wz4EidvTdBi4kQU2dw792.1.PiIaK8xIXuD1PT0aG4Ss4xDLTHZZW', '2026-04-06 06:31:10', 'S6BQLbMwCM', '2026-04-06 06:31:10', '2026-04-06 06:31:10', 4, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Prof. Ronny Grimes V', 'emery52@example.net', NULL, '2026-04-06 06:31:09', '2026-04-06 06:31:09', '$2y$12$wz4EidvTdBi4kQU2dw792.1.PiIaK8xIXuD1PT0aG4Ss4xDLTHZZW', '2026-04-06 06:31:10', 'EZPozvFCYb', '2026-04-06 06:31:10', '2026-04-06 06:31:10', 4, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'School Administrator', 'schooladmin@vidyasetu.com', '+919876543211', '2026-04-13 05:56:15', '2026-04-13 05:56:15', '$2y$12$ge2/tIRDsq4bQAs7DdpxzOPKQf1Je0WcuGqTPyiVGb39zkC.j5.3K', '2026-04-13 05:56:15', NULL, '2026-04-13 05:56:15', '2026-04-13 05:56:15', 2, NULL, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(17, 'Prof. Marlon Carter', 'trystan27@example.net', NULL, '2026-04-13 05:56:17', '2026-04-13 05:56:17', '$2y$12$n9p4I4ow4R2jU81tlSKjkOf9.vD1OBDL4DowMPSr4XkPeOeY9zvOm', '2026-04-13 05:56:18', 'B4lVmmtn8M', '2026-04-13 05:56:18', '2026-04-13 05:56:18', 4, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Caleb Moore', 'nicolas74@example.com', NULL, '2026-04-13 05:56:17', '2026-04-13 05:56:17', '$2y$12$n9p4I4ow4R2jU81tlSKjkOf9.vD1OBDL4DowMPSr4XkPeOeY9zvOm', '2026-04-13 05:56:18', 'EFUDUocG42', '2026-04-13 05:56:18', '2026-04-13 05:56:18', 4, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Yessenia Moen', 'bhowe@example.net', NULL, '2026-04-13 05:56:17', '2026-04-13 05:56:17', '$2y$12$n9p4I4ow4R2jU81tlSKjkOf9.vD1OBDL4DowMPSr4XkPeOeY9zvOm', '2026-04-13 05:56:18', 'g5wZ8XBaBL', '2026-04-13 05:56:18', '2026-04-13 05:56:18', 4, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Mr. Weston Vandervort', 'mertz.elise@example.com', NULL, '2026-04-13 05:56:17', '2026-04-13 05:56:17', '$2y$12$n9p4I4ow4R2jU81tlSKjkOf9.vD1OBDL4DowMPSr4XkPeOeY9zvOm', '2026-04-13 05:56:18', 'lqdm2eRegs', '2026-04-13 05:56:18', '2026-04-13 05:56:18', 4, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Elinor Abbott III', 'hermiston.earnest@example.com', NULL, '2026-04-13 05:56:17', '2026-04-13 05:56:17', '$2y$12$n9p4I4ow4R2jU81tlSKjkOf9.vD1OBDL4DowMPSr4XkPeOeY9zvOm', '2026-04-13 05:56:18', '0xUg7Rwhoh', '2026-04-13 05:56:18', '2026-04-13 05:56:18', 4, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Camryn Dibbert', 'corwin.christian@example.com', NULL, '2026-04-13 05:56:17', '2026-04-13 05:56:17', '$2y$12$n9p4I4ow4R2jU81tlSKjkOf9.vD1OBDL4DowMPSr4XkPeOeY9zvOm', '2026-04-13 05:56:18', 'NUdcMOKsa4', '2026-04-13 05:56:18', '2026-04-13 05:56:18', 4, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Burley Wolff', 'myrtis20@example.com', NULL, '2026-04-13 05:56:17', '2026-04-13 05:56:17', '$2y$12$n9p4I4ow4R2jU81tlSKjkOf9.vD1OBDL4DowMPSr4XkPeOeY9zvOm', '2026-04-13 05:56:18', 'YEBVHl0cOx', '2026-04-13 05:56:18', '2026-04-13 05:56:18', 4, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Miss Audie Prohaska IV', 'reggie86@example.com', NULL, '2026-04-13 05:56:17', '2026-04-13 05:56:17', '$2y$12$n9p4I4ow4R2jU81tlSKjkOf9.vD1OBDL4DowMPSr4XkPeOeY9zvOm', '2026-04-13 05:56:18', 'Q7fQsy554x', '2026-04-13 05:56:18', '2026-04-13 05:56:18', 4, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Prof. Dorthy Haag Jr.', 'gislason.margie@example.net', NULL, '2026-04-13 05:56:17', '2026-04-13 05:56:17', '$2y$12$n9p4I4ow4R2jU81tlSKjkOf9.vD1OBDL4DowMPSr4XkPeOeY9zvOm', '2026-04-13 05:56:18', 'AmSRMw5ia3', '2026-04-13 05:56:18', '2026-04-13 05:56:18', 4, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Marcel Gulgowski', 'conrad.olson@example.org', NULL, '2026-04-13 05:56:17', '2026-04-13 05:56:17', '$2y$12$n9p4I4ow4R2jU81tlSKjkOf9.vD1OBDL4DowMPSr4XkPeOeY9zvOm', '2026-04-13 05:56:18', 'a5fgyT0n1B', '2026-04-13 05:56:18', '2026-04-13 05:56:18', 4, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_verifications`
--

CREATE TABLE `user_verifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('email','phone') NOT NULL,
  `token` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `is_used` tinyint(1) NOT NULL DEFAULT 0,
  `used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_logs_user_id_login_at_index` (`user_id`,`login_at`),
  ADD KEY `login_logs_ip_address_index` (`ip_address`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp_logs`
--
ALTER TABLE `otp_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `otp_logs_recipient_otp_code_index` (`recipient`,`otp_code`),
  ADD KEY `otp_logs_user_id_purpose_index` (`user_id`,`purpose`),
  ADD KEY `otp_logs_expires_at_index` (`expires_at`);

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
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `schools_name_unique` (`name`),
  ADD UNIQUE KEY `schools_code_unique` (`code`);

--
-- Indexes for table `school_classes`
--
ALTER TABLE `school_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_classes_school_id_number_unique` (`school_id`,`number`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sections_school_class_id_name_unique` (`school_class_id`,`name`),
  ADD KEY `sections_school_id_foreign` (`school_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_school_id_foreign` (`school_id`),
  ADD KEY `users_school_class_id_foreign` (`school_class_id`),
  ADD KEY `users_section_id_foreign` (`section_id`);

--
-- Indexes for table `user_verifications`
--
ALTER TABLE `user_verifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_verifications_user_id_type_index` (`user_id`,`type`),
  ADD KEY `user_verifications_token_index` (`token`),
  ADD KEY `user_verifications_expires_at_index` (`expires_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_logs`
--
ALTER TABLE `login_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `otp_logs`
--
ALTER TABLE `otp_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `school_classes`
--
ALTER TABLE `school_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_verifications`
--
ALTER TABLE `user_verifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD CONSTRAINT `login_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `otp_logs`
--
ALTER TABLE `otp_logs`
  ADD CONSTRAINT `otp_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `school_classes`
--
ALTER TABLE `school_classes`
  ADD CONSTRAINT `school_classes_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_school_class_id_foreign` FOREIGN KEY (`school_class_id`) REFERENCES `school_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sections_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_school_class_id_foreign` FOREIGN KEY (`school_class_id`) REFERENCES `school_classes` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `user_verifications`
--
ALTER TABLE `user_verifications`
  ADD CONSTRAINT `user_verifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
