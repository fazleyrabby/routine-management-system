-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 08:25 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `routine`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_class`
--

CREATE TABLE `assigned_class` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_no` int(11) DEFAULT NULL,
  `schedule_id` bigint(20) UNSIGNED DEFAULT NULL,
  `class_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assign_courses_to_teachers`
--
CREATE TABLE `assign_courses_to_teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `session_id` int(10) UNSIGNED DEFAULT NULL,
  `teacher_id` int(10) UNSIGNED DEFAULT NULL,
  `courses` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_courses_to_teachers`
--

INSERT INTO `assign_courses_to_teachers` (`id`, `session_id`, `teacher_id`, `courses`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 4, 8, '1,2,3', '2020-11-25 03:58:26', '2020-11-25 04:24:13', 'yes'),
(2, 4, 12, '3,4,6,7', '2020-11-25 04:15:20', '2020-11-25 04:24:19', 'yes'),
(4, 4, 10, '1,3', '2020-11-25 15:26:28', '2020-11-25 15:26:28', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int(10) UNSIGNED NOT NULL,
  `batch_no` int(11) DEFAULT NULL COMMENT '12,13',
  `department_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `is_active` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `batch_no`, `department_id`, `shift_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'yes', '2020-08-10 00:42:07', '2020-08-10 00:42:07'),
(2, 2, 1, 1, 'yes', '2020-08-10 00:42:48', '2020-08-10 00:42:48'),
(3, 1, 1, 2, 'yes', '2020-08-10 00:50:18', '2020-08-10 00:50:18'),
(4, 13, 1, 1, 'yes', '2020-09-21 12:44:33', '2020-09-21 12:44:33'),
(5, 10, 1, 2, 'yes', '2020-09-21 12:44:39', '2020-09-21 12:44:39'),
(6, 13, 1, 2, 'yes', '2020-09-21 12:44:47', '2020-09-21 12:44:47');

-- --------------------------------------------------------

--
-- Table structure for table `batch_sessions`
--

CREATE TABLE `batch_sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_slots`
--

CREATE TABLE `class_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time_slot_id` int(11) DEFAULT NULL,
  `number_of_class` int(11) DEFAULT NULL,
  `is_active` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_code` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'CSE 222, CEN 431 ..etc',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `course_type` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0=Theory,1=Sessional'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `credit`, `course_code`, `created_at`, `updated_at`, `is_active`, `course_type`) VALUES
(1, 'Data Communication', '3', 'CSE435', '2020-07-19 01:04:30', '2020-11-30 12:11:31', 'yes', '0'),
(2, 'Theory of Computing', '3', 'CSE317', '2020-07-19 01:05:11', '2020-07-19 01:05:11', 'yes', '0'),
(3, 'Operating System Concepts', '3', 'CSE231', '2020-07-19 01:05:48', '2020-07-19 01:05:48', 'yes', '0'),
(4, 'Operating System Concepts Sessional', '1.5', 'CSE232', '2020-07-19 01:06:04', '2020-07-19 01:06:04', 'yes', '1'),
(6, 'Diff. Equations and F.A', '3', 'MATH325', '2020-11-23 22:31:54', '2020-11-23 22:31:54', 'yes', '0'),
(7, 'Computer Peripherals & Interfacing', '3', 'CSE333', '2020-11-23 22:32:48', '2020-11-23 22:32:48', 'yes', '0'),
(8, 'Introduction to Computer & Programming Techniques', '3', 'CSE212', '2020-11-23 22:33:07', '2020-11-23 22:33:07', 'yes', '0'),
(9, 'Mobile and Telecommunication', '3', 'CSE443', '2020-11-23 22:33:57', '2020-11-23 22:33:57', 'yes', '0'),
(10, 'Software Engineering', '3', 'CSE321', '2020-11-23 22:34:17', '2020-11-23 22:34:17', 'yes', '0'),
(11, 'Artificial Intelligence Sessional', '1.5', 'CSE342', '2020-11-23 22:34:45', '2020-11-23 22:34:45', 'yes', '1'),
(12, 'Simulation & Modeling Sessional', '1.5', 'CSE424', '2020-11-23 22:35:07', '2020-11-23 22:35:07', 'yes', '0'),
(13, 'Multimedia Systems Design Sessional', '1.5', 'CSE448', '2020-11-23 22:36:09', '2020-11-23 22:36:09', 'yes', '1');

-- --------------------------------------------------------

--
-- Table structure for table `course_offers`
--

CREATE TABLE `course_offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `courses` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yearly_session_id` int(11) DEFAULT NULL,
  `is_active` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_offers`
--

INSERT INTO `course_offers` (`id`, `batch_id`, `courses`, `yearly_session_id`, `is_active`, `created_at`, `updated_at`) VALUES
(4, 1, '1,2', 4, 'yes', '2020-11-20 07:34:15', '2020-11-20 07:34:15'),
(5, 4, '3,4,5', 4, 'yes', '2020-11-20 07:34:25', '2020-11-20 07:34:25'),
(6, 5, '1,3,4', 4, 'yes', '2020-11-20 07:34:34', '2020-11-20 07:34:34');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `day_title`, `slug`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Saturday', 'SAT', 'yes', '2020-09-21 00:00:00', '2020-09-21 00:00:00'),
(2, 'Sunday', 'SUN', 'yes', '2020-09-21 00:00:00', '2020-09-21 00:00:00'),
(3, 'Monday', 'MON', 'yes', '2020-09-21 00:00:00', '2020-09-21 00:00:00'),
(4, 'Tuesday', 'TUE', 'yes', '2020-09-21 00:00:00', '2020-09-21 00:00:00'),
(5, 'Wednesday', 'WED', 'yes', '2020-09-21 00:00:00', '2020-09-21 00:00:00'),
(6, 'Thursday', 'THU', 'yes', '2020-09-21 00:00:00', '2020-09-21 00:00:00'),
(7, 'Friday', 'FRI', 'yes', '2020-09-21 00:00:00', '2020-09-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `day_wise_slots`
--

CREATE TABLE `day_wise_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day_id` int(11) DEFAULT NULL,
  `time_slot_id` int(11) DEFAULT NULL,
  `class_slot` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `day_wise_slots`
--

INSERT INTO `day_wise_slots` (`id`, `day_id`, `time_slot_id`, `class_slot`, `created_at`, `updated_at`) VALUES
(118, 6, 1, 1, '2020-10-04 05:10:13', '2020-11-19 01:35:06'),
(119, 6, 2, 9, '2020-10-04 05:10:13', '2020-11-19 01:35:06'),
(120, 6, 3, 8, '2020-10-04 05:10:13', '2020-11-19 01:35:06'),
(121, 6, 4, 4, '2020-10-04 05:10:13', '2020-11-19 01:34:29'),
(122, 6, 5, 5, '2020-10-04 05:10:13', '2020-11-19 01:35:06'),
(123, 6, 6, 9, '2020-10-04 05:10:13', '2020-11-19 01:35:06'),
(124, 7, 7, 3, '2020-10-04 05:10:29', '2020-11-19 01:35:06'),
(125, 7, 8, 1, '2020-10-04 05:10:29', '2020-11-19 01:35:06'),
(126, 7, 6, 4, '2020-10-04 05:10:29', '2020-11-19 01:35:06'),
(127, 2, 1, 1, '2020-10-07 16:24:49', '2020-11-19 01:35:04'),
(128, 2, 2, 4, '2020-10-07 16:24:49', '2020-11-19 01:35:04'),
(129, 2, 3, 7, '2020-10-07 16:24:49', '2020-11-19 01:35:04'),
(130, 2, 4, 2, '2020-10-07 16:24:49', '2020-11-19 01:35:04'),
(131, 2, 5, 1, '2020-10-07 16:24:49', '2020-11-19 01:35:04'),
(132, 2, 6, 8, '2020-10-07 16:24:49', '2020-11-19 01:35:04'),
(133, 3, 1, 2, '2020-10-07 16:25:00', '2020-11-19 01:35:04'),
(134, 3, 2, 5, '2020-10-07 16:25:00', '2020-11-19 01:35:05'),
(135, 3, 3, 4, '2020-10-07 16:25:00', '2020-11-19 01:35:05'),
(136, 3, 4, 7, '2020-10-07 16:25:00', '2020-11-19 01:35:05'),
(137, 3, 5, 3, '2020-10-07 16:25:00', '2020-11-19 01:35:05'),
(138, 3, 6, 4, '2020-10-07 16:25:00', '2020-11-19 01:35:05'),
(139, 4, 1, 8, '2020-10-07 16:25:09', '2020-11-19 01:35:05'),
(140, 4, 2, 8, '2020-10-07 16:25:09', '2020-11-19 01:35:05'),
(141, 4, 3, 6, '2020-10-07 16:25:09', '2020-11-19 01:35:05'),
(142, 4, 4, 4, '2020-10-07 16:25:09', '2020-11-19 01:35:05'),
(143, 4, 5, 7, '2020-10-07 16:25:09', '2020-11-19 01:35:05'),
(144, 4, 6, 3, '2020-10-07 16:25:09', '2020-11-19 01:35:05'),
(145, 5, 1, 5, '2020-10-07 16:25:21', '2020-11-19 01:35:05'),
(146, 5, 2, 5, '2020-10-07 16:25:21', '2020-11-19 01:35:05'),
(147, 5, 3, 4, '2020-10-07 16:25:21', '2020-11-19 01:35:05'),
(148, 5, 4, 3, '2020-10-07 16:25:21', '2020-11-19 01:35:06'),
(149, 5, 5, 2, '2020-10-07 16:25:21', '2020-11-19 01:35:06'),
(150, 5, 6, 1, '2020-10-07 16:25:21', '2020-11-19 01:35:06'),
(151, 1, 1, 3, '2020-11-26 16:20:24', '2020-12-02 05:04:22'),
(152, 1, 2, 1, '2020-11-26 16:20:24', '2020-11-28 06:20:14'),
(153, 1, 3, 2, '2020-11-26 16:20:24', '2020-11-26 16:20:24'),
(154, 1, 4, 6, '2020-11-26 16:20:24', '2020-11-26 16:20:24'),
(155, 1, 5, 7, '2020-11-26 16:20:24', '2020-11-26 16:20:24'),
(156, 1, 6, 6, '2020-11-26 16:20:24', '2020-11-26 16:20:24');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'CSE, EEE, MBA',
  `is_active` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'CSE', 'yes', '2020-07-22 13:28:19', '2020-07-26 17:10:50'),
(2, 'BBA', 'no', '2020-07-22 13:28:26', '2020-07-22 13:28:26'),
(3, 'MBA', 'yes', '2020-07-22 13:28:30', '2020-07-22 13:28:30'),
(4, 'EEE', 'yes', '2020-07-22 13:28:41', '2020-07-22 13:28:41'),
(5, 'CEN', 'yes', '2020-07-22 13:28:51', '2020-07-22 13:43:20');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_10_12_132446_create_users_table', 1),
(4, '2019_12_14_132446_create_assign_courses_to_teachers_table', 1),
(5, '2019_12_14_132446_create_assigned_class_table', 1),
(6, '2019_12_14_132446_create_batch_table', 1),
(7, '2019_12_14_132446_create_courses_table', 1),
(8, '2019_12_14_132446_create_departments_table', 1),
(9, '2019_12_14_132446_create_rooms_table', 1),
(10, '2019_12_14_132446_create_sections_table', 1),
(11, '2019_12_14_132446_create_sessions_table', 1),
(12, '2019_12_14_132446_create_shift_table', 1),
(13, '2019_12_14_132446_create_teachers_table', 1),
(14, '2019_12_15_132446_create_students_table', 1),
(15, '2020_07_21_083159_create_teacher_ranks_table', 1),
(16, '2020_08_03_125500_create_batch_sessions_table', 1),
(17, '2020_08_03_125738_create_shift_sessions_table', 1),
(18, '2020_08_03_134307_create_yearly_sessions_table', 1),
(19, '2020_08_31_042012_create_time_slots_table', 1),
(20, '2020_09_01_141322_create_section_students', 1),
(21, '2020_09_14_113252_create_students_log_table', 1),
(22, '2020_09_22_161931_create_class_slots_table', 1),
(23, '2020_09_22_162714_create_days_table', 1),
(24, '2020_09_26_073116_create_day_wise_slots', 1),
(25, '2020_09_27_121219_create_teachers_offday_table', 1),
(26, '2020_10_06_070643_create_routine_table', 1),
(27, '2020_10_26_140017_create_routine_committee_requests_table', 1),
(28, '2020_11_19_200110_create_course_offers_table', 1);

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
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `building` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_no` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `room_type` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0=Theory,1=Lab',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `building`, `room_no`, `capacity`, `room_type`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 'A', '101', 60, '0', '2020-07-21 06:50:22', '2020-09-21 12:26:55', 'yes'),
(2, 'A', '102', 70, '0', '2020-07-21 06:54:18', '2020-09-21 12:27:02', 'yes'),
(4, 'B', '203', 100, '1', '2020-07-21 06:54:55', '2020-09-21 12:27:06', 'yes'),
(5, 'C', '333', 100, '1', '2020-07-21 07:06:27', '2020-09-21 12:27:10', 'yes'),
(6, 'A', '601', 65, '1', '2020-09-21 12:27:30', '2020-09-21 12:27:30', 'yes'),
(7, 'A', '301', 50, '0', '2020-11-19 01:28:08', '2020-11-19 01:28:08', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `routine`
--

CREATE TABLE `routine` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `day_id` int(11) DEFAULT NULL,
  `time_slot_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `edited_by` int(11) DEFAULT NULL,
  `yearly_session_id` int(11) DEFAULT NULL,
  `is_active` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `routine`
--

INSERT INTO `routine` (`id`, `teacher_id`, `batch_id`, `section_id`, `day_id`, `time_slot_id`, `course_id`, `room_id`, `created_by`, `edited_by`, `yearly_session_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 8, 5, 1, 1, 1, 1, 2, 1, NULL, 4, 'yes', '2020-12-05 13:00:56', '2020-12-05 13:00:56'),
(2, 9, 6, NULL, 1, 2, 3, 2, 1, NULL, 4, 'yes', '2020-12-05 13:01:17', '2020-12-05 13:01:17'),
(3, 10, 4, 2, 2, 3, 1, 2, 1, NULL, 4, 'yes', '2020-12-05 13:01:31', '2020-12-05 13:01:31'),
(4, 11, 6, NULL, 2, 1, 4, 4, 1, NULL, 4, 'yes', '2020-12-05 13:09:09', '2020-12-05 13:09:09'),
(5, 11, 6, NULL, 2, 2, 4, 4, 1, NULL, 4, 'yes', '2020-12-05 13:09:09', '2020-12-05 13:09:09'),
(6, 11, 6, NULL, 3, 6, 13, 6, 1, NULL, 4, 'yes', '2020-12-05 13:09:41', '2020-12-05 13:09:41'),
(7, 9, 4, 1, 3, 1, 4, 6, 1, NULL, 4, 'yes', '2020-12-05 13:13:47', '2020-12-05 13:13:47'),
(8, 9, 4, 1, 3, 2, 4, 6, 1, NULL, 4, 'yes', '2020-12-05 13:13:47', '2020-12-05 13:13:47'),
(9, 1, 5, 1, 7, 7, 4, 4, 1, NULL, 4, 'yes', '2020-12-09 18:53:09', '2020-12-09 18:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `routine_committee_requests`
--

CREATE TABLE `routine_committee_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `expire_after` int(11) DEFAULT '2',
  `expired_date` datetime NOT NULL,
  `request_status` enum('expired','active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `routine_committee_requests`
--

INSERT INTO `routine_committee_requests` (`id`, `sender_id`, `receiver_id`, `expire_after`, `expired_date`, `request_status`, `created_at`, `updated_at`) VALUES
(4, 1, 9, 2, '2020-11-24 15:00:00', 'active', '2020-11-24 01:00:44', '2020-11-24 01:00:44'),
(5, 1, 12, 2, '2020-12-04 12:55:00', 'expired', '2020-12-02 04:55:09', '2020-12-02 04:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `section_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'A,B,C..etc',
  `parent` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('theory','lab') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'theory',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section_name`, `parent`, `slug`, `type`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 'A', 0, 'a', 'theory', '2020-08-10 15:25:48', '2020-08-10 15:25:48', 'yes'),
(2, 'B', 0, 'b', 'theory', '2020-08-10 15:25:52', '2020-08-10 15:25:52', 'yes'),
(3, 'A1', 1, 'a1', 'lab', '2020-09-21 12:43:18', '2020-09-21 12:43:18', 'yes'),
(4, 'A2', 1, 'a2', 'lab', '2020-09-21 12:43:24', '2020-09-21 12:43:24', 'yes'),
(5, 'B1', 2, 'b1', 'lab', '2020-09-21 12:43:38', '2020-09-21 12:43:38', 'yes'),
(6, 'B2', 2, 'b2', 'lab', '2020-09-21 12:43:44', '2020-09-21 12:43:44', 'yes'),
(7, 'C', 0, 'c', 'theory', '2020-11-18 04:52:48', '2020-11-18 04:52:48', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `section_students`
--

CREATE TABLE `section_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `section_type` enum('lab','theory') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `students` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `section_students`
--

INSERT INTO `section_students` (`id`, `student_id`, `section_id`, `section_type`, `is_active`, `students`, `created_at`, `updated_at`) VALUES
(33, 18, 1, 'theory', 'yes', 50, '2020-10-06 23:55:23', '2020-10-06 23:55:23'),
(34, 18, 2, 'theory', 'yes', 50, '2020-10-06 23:55:23', '2020-10-06 23:55:23'),
(35, 18, 3, 'lab', 'yes', 25, '2020-11-18 17:08:50', '2020-11-18 17:08:50'),
(36, 18, 4, 'lab', 'yes', 25, '2020-11-18 17:08:50', '2020-11-18 17:08:50'),
(37, 18, 5, 'lab', 'yes', 25, '2020-11-18 17:08:50', '2020-11-18 17:08:50'),
(38, 18, 6, 'lab', 'yes', 25, '2020-11-18 17:08:50', '2020-11-18 17:08:50'),
(39, 17, 1, 'theory', 'yes', 50, '2020-11-18 17:11:13', '2020-11-18 17:11:13'),
(40, 20, 1, 'theory', 'yes', 30, '2020-11-19 00:35:52', '2020-11-19 00:35:52'),
(41, 20, 2, 'theory', 'yes', 30, '2020-11-19 00:35:52', '2020-11-19 00:35:52'),
(50, 21, 1, 'theory', 'yes', 40, '2020-11-19 00:59:36', '2020-11-19 00:59:36'),
(51, 21, 2, 'theory', 'yes', 30, '2020-11-19 00:59:36', '2020-11-19 00:59:36'),
(52, 24, 1, 'theory', 'yes', 35, '2020-11-21 08:02:48', '2020-11-21 08:02:48'),
(53, 24, 2, 'theory', 'yes', 25, '2020-11-21 08:02:48', '2020-11-21 08:02:48'),
(54, 30, 1, 'theory', 'yes', 55, '2020-11-22 01:30:30', '2020-11-22 01:30:30'),
(57, 30, 3, 'lab', 'yes', 55, '2020-11-22 01:34:21', '2020-11-22 01:34:21');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `session_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Summer, Spring ..etc',
  `session_code` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `session_name`, `session_code`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 'Fall', NULL, '2020-08-01 03:12:57', '2020-08-01 03:24:38', 'yes'),
(2, 'Summer', NULL, '2020-08-01 03:14:07', '2020-08-01 03:14:07', 'yes'),
(4, 'Spring', NULL, '2020-08-08 00:36:23', '2020-08-08 00:36:23', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` int(10) UNSIGNED NOT NULL,
  `shift_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'day/evening',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`id`, `shift_name`, `slug`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Day', 'D', 'yes', '2020-07-22 14:35:05', '2020-07-22 14:35:05'),
(2, 'Evening', 'E', 'yes', '2020-07-22 14:35:10', '2020-07-22 14:35:10');

-- --------------------------------------------------------

--
-- Table structure for table `shift_sessions`
--

CREATE TABLE `shift_sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `day_id` int(11) DEFAULT NULL,
  `is_active` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shift_sessions`
--

INSERT INTO `shift_sessions` (`id`, `session_id`, `shift_id`, `day_id`, `is_active`, `created_at`, `updated_at`) VALUES
(11, 4, 1, NULL, 'yes', '2020-08-08 00:53:28', '2020-08-08 04:25:06'),
(14, 2, 1, NULL, 'yes', '2020-08-08 01:11:02', '2020-08-08 01:11:02'),
(16, 1, 2, NULL, 'yes', '2020-08-08 01:36:32', '2020-08-08 04:30:17'),
(17, 2, 2, NULL, 'yes', '2020-08-08 01:36:36', '2020-08-08 01:36:36'),
(18, 4, 2, NULL, 'yes', '2020-08-08 01:36:42', '2020-08-08 01:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number_of_student` int(11) NOT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `yearly_session_id` int(11) DEFAULT NULL,
  `is_active` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `number_of_student`, `batch_id`, `yearly_session_id`, `is_active`, `created_at`, `updated_at`) VALUES
(20, 60, 5, 4, 'yes', '2020-11-19 00:35:43', '2020-11-19 00:35:43'),
(21, 70, 2, 4, 'yes', '2020-11-19 00:36:09', '2020-11-19 00:59:19'),
(24, 60, 4, 4, 'yes', '2020-11-21 08:02:37', '2020-11-21 08:02:37'),
(30, 55, 3, 4, 'yes', '2020-11-21 08:22:53', '2020-11-22 01:30:21'),
(31, 40, 6, 4, 'yes', '2020-11-23 23:59:58', '2020-11-25 12:33:20');

-- --------------------------------------------------------

--
-- Table structure for table `students_log`
--

CREATE TABLE `students_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number_of_student` int(11) NOT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `yearly_session_id` int(11) DEFAULT NULL,
  `is_active` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rank_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `is_active` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `join_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `slug`, `rank_id`, `department_id`, `is_active`, `join_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'SD', 3, 1, 'yes', '2020-07-02', '2020-07-23 00:00:00', '2020-11-23 22:41:25'),
(8, 8, 'MR', 3, 1, 'yes', '1970-01-01', '2020-11-23 22:43:38', '2020-11-23 22:43:38'),
(9, 9, 'AR', 3, 1, 'yes', '1970-01-01', '2020-11-23 22:45:33', '2020-11-23 22:45:33'),
(10, 10, 'EH', 3, 1, 'yes', '1970-01-01', '2020-11-23 22:46:39', '2020-11-23 22:50:12'),
(11, 11, 'MB', 3, 1, 'yes', '1970-01-01', '2020-11-23 22:47:46', '2020-11-23 22:50:24'),
(12, 12, 'AZC', 3, 1, 'yes', '1970-01-01', '2020-11-23 22:49:09', '2020-11-23 22:49:09');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_offday`
--

CREATE TABLE `teachers_offday` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `day_id` int(11) DEFAULT NULL,
  `is_active` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers_offday`
--

INSERT INTO `teachers_offday` (`id`, `teacher_id`, `day_id`, `is_active`, `created_at`, `updated_at`) VALUES
(19, 3, 2, 'yes', '2020-09-25 20:26:34', '2020-09-25 20:26:34'),
(20, 3, 7, 'yes', '2020-09-25 20:26:34', '2020-09-25 20:26:34'),
(25, 4, 3, 'yes', '2020-09-29 17:41:11', '2020-09-29 17:41:11'),
(26, 4, 4, 'yes', '2020-09-29 17:41:11', '2020-09-29 17:41:11'),
(27, 6, 6, 'yes', '2020-11-19 01:01:23', '2020-11-19 01:01:23'),
(28, 6, 7, 'yes', '2020-11-19 01:01:23', '2020-11-19 01:01:23'),
(31, 5, 4, 'yes', '2020-11-19 01:01:43', '2020-11-19 01:01:43'),
(32, 5, 5, 'yes', '2020-11-19 01:01:43', '2020-11-19 01:01:43'),
(33, 2, 4, 'yes', '2020-11-19 01:31:38', '2020-11-19 01:31:38'),
(34, 2, 7, 'yes', '2020-11-19 01:31:38', '2020-11-19 01:31:38'),
(74, 1, 1, 'yes', '2020-11-26 16:18:21', '2020-11-26 16:18:21'),
(75, 9, 5, 'yes', '2020-11-26 16:19:11', '2020-11-26 16:19:11'),
(76, 8, 3, 'yes', '2020-11-28 05:48:48', '2020-11-28 05:48:48'),
(77, 10, 7, 'yes', '2020-11-28 05:48:52', '2020-11-28 05:48:52'),
(78, 11, 6, 'yes', '2020-11-28 05:48:55', '2020-11-28 05:48:55'),
(79, 12, 4, 'yes', '2020-11-28 05:48:59', '2020-11-28 05:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_ranks`
--

CREATE TABLE `teacher_ranks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rank` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_ranks`
--

INSERT INTO `teacher_ranks` (`id`, `rank`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Lecturer', 'yes', '2020-07-23 06:00:00', '2020-07-23 06:00:00'),
(3, 'Sr. Lecturer', 'yes', '2020-07-26 23:28:52', '2020-07-26 23:37:39');

-- --------------------------------------------------------

--
-- Table structure for table `time_slots`
--

CREATE TABLE `time_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` time DEFAULT NULL,
  `to` time DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `is_active` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `type` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_slots`
--

INSERT INTO `time_slots` (`id`, `from`, `to`, `shift_id`, `is_active`, `type`, `created_at`, `updated_at`) VALUES
(1, '09:00:00', '10:25:00', 1, 'yes', '1', '2020-09-21 12:54:45', '2020-09-21 12:54:45'),
(2, '10:30:00', '11:55:00', 1, 'yes', '1', '2020-09-21 12:54:57', '2020-09-21 12:54:57'),
(3, '12:00:00', '13:25:00', 1, 'yes', '1', '2020-09-21 12:55:12', '2020-09-21 12:55:12'),
(4, '14:00:00', '15:25:00', 1, 'yes', '1', '2020-09-21 12:55:26', '2020-09-21 12:55:26'),
(5, '15:30:00', '17:00:00', 1, 'yes', '1', '2020-09-21 12:55:43', '2020-09-21 12:55:43'),
(6, '18:30:00', '21:30:00', 2, 'yes', '2', '2020-09-21 12:56:01', '2020-09-21 12:56:01'),
(7, '09:30:00', '12:30:00', 1, 'yes', '2', '2020-09-24 12:40:28', '2020-09-24 12:40:28'),
(8, '15:00:00', '18:00:00', 1, 'yes', '2', '2020-09-24 12:40:43', '2020-09-24 12:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(1) DEFAULT NULL COMMENT '1=male,2=female',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('superadmin','admin','subadmin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `is_active` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `is_teacher` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `in_committee` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `key`, `firstname`, `lastname`, `date_of_birth`, `username`, `gender`, `email`, `email_verified_at`, `password`, `role`, `is_active`, `is_teacher`, `in_committee`, `remember_token`, `photo`, `contact`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Mr.Showmitra', 'Das', '1985-07-26', 'superadmin', 1, 'superadmin@gmail.com', NULL, '$2y$10$Du./fTkNx23gXX77ccRI.uj7hl6HVwWImbjzi4LG2bNZUMJtbKGa6', 'admin', 'yes', 'yes', 'yes', 'tiLj8B1unSUea8xYAbGEOMoPoRUnqrfadOi7wd5dSICbfsfBPlUiI0UhjW8P', NULL, '01881075015', '2020-07-21 00:41:06', '2020-11-23 22:42:14'),
(8, NULL, 'Mr. Md. Maqsudur', 'Rahman', '1970-01-01', 'maqsudur_rahman', 1, 'mr@gmail.com', NULL, '$2y$10$bq8oxoS9UJLhh7t2RCbNAui3buLlKHLgL20BOEuiMTIQHBwRUWjAW', 'user', 'yes', 'yes', 'no', NULL, NULL, '01833788270', '2020-11-23 22:43:36', '2020-11-23 22:43:36'),
(9, NULL, 'Mr. Abdur', 'Rahman', '1970-01-01', 'abdur_rahman', 1, 'csetanim11@gmail.com', NULL, '$2y$10$JqOPW.wGmANko1TtZTQDAOpBi2GnMru2VUoWHyNdpqpAhDl2x35Vm', 'user', 'yes', 'yes', 'yes', NULL, NULL, '01733839289', '2020-11-23 22:45:33', '2020-12-01 13:41:43'),
(10, NULL, 'Mr. Emam', 'Hossain', '1970-01-01', 'emam_hossain', 1, 'ehfahad01@gmail.com', NULL, '$2y$10$sYLKMsglNqqAuZ5spBMJSeXm71ttUReTm5L2QetzCL6PLVcAI1wYi', 'user', 'yes', 'yes', 'yes', NULL, NULL, '01675234510', '2020-11-23 22:46:39', '2020-12-01 13:41:51'),
(11, NULL, 'Mrs. Manoara', 'Begum', '1970-01-01', 'manoara_begum', 2, 'mb@gmail.com', NULL, '$2y$10$fr48BlNFS5xiJyhUK.q9CePO7j7/aQdH3MgBcViuhdUJu8PCkexve', 'user', 'yes', 'yes', 'no', NULL, NULL, '01845110925', '2020-11-23 22:47:46', '2020-11-23 22:50:23'),
(12, NULL, 'Mr. Armanuzzaman', 'Chowdhury', '1970-01-01', 'armanuzzaman_chy', 1, 'az@gmail.com', NULL, '$2y$10$NdgPfsDLHzCT8AKLLoKQ6uNTK.NAiaTnSJ/42MLvR9K43GS97knSq', 'user', 'yes', 'yes', 'no', NULL, NULL, '01925568358', '2020-11-23 22:49:07', '2020-11-23 22:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `yearly_sessions`
--

CREATE TABLE `yearly_sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` int(11) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `is_active` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `yearly_sessions`
--

INSERT INTO `yearly_sessions` (`id`, `session_id`, `year`, `is_active`, `created_at`, `updated_at`) VALUES
(4, 1, 2020, 'yes', '2020-10-06 23:54:03', '2020-10-13 12:58:23'),
(5, 2, 2020, 'no', '2020-10-06 23:54:03', '2020-12-02 04:54:16'),
(6, 4, 2020, 'no', '2020-10-06 23:54:03', '2020-11-20 00:16:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned_class`
--
ALTER TABLE `assigned_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_courses_to_teachers`
--
ALTER TABLE `assign_courses_to_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch_sessions`
--
ALTER TABLE `batch_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_slots`
--
ALTER TABLE `class_slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_course_code_unique` (`course_code`);

--
-- Indexes for table `course_offers`
--
ALTER TABLE `course_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `days_day_title_unique` (`day_title`),
  ADD UNIQUE KEY `days_slug_unique` (`slug`);

--
-- Indexes for table `day_wise_slots`
--
ALTER TABLE `day_wise_slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routine_committee_requests`
--
ALTER TABLE `routine_committee_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_students`
--
ALTER TABLE `section_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shifts_slug_unique` (`slug`);

--
-- Indexes for table `shift_sessions`
--
ALTER TABLE `shift_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_log`
--
ALTER TABLE `students_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers_offday`
--
ALTER TABLE `teachers_offday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_ranks`
--
ALTER TABLE `teacher_ranks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_slots`
--
ALTER TABLE `time_slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `yearly_sessions`
--
ALTER TABLE `yearly_sessions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigned_class`
--
ALTER TABLE `assigned_class`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_courses_to_teachers`
--
ALTER TABLE `assign_courses_to_teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `batch_sessions`
--
ALTER TABLE `batch_sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_slots`
--
ALTER TABLE `class_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `course_offers`
--
ALTER TABLE `course_offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `day_wise_slots`
--
ALTER TABLE `day_wise_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `routine`
--
ALTER TABLE `routine`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `routine_committee_requests`
--
ALTER TABLE `routine_committee_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `section_students`
--
ALTER TABLE `section_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shift_sessions`
--
ALTER TABLE `shift_sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `students_log`
--
ALTER TABLE `students_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teachers_offday`
--
ALTER TABLE `teachers_offday`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `teacher_ranks`
--
ALTER TABLE `teacher_ranks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `time_slots`
--
ALTER TABLE `time_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `yearly_sessions`
--
ALTER TABLE `yearly_sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
