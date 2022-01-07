-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2022 at 11:40 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms_inc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission_bills`
--

CREATE TABLE `admission_bills` (
  `admission_id` bigint(20) UNSIGNED NOT NULL,
  `bill_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admission_date` date NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` bigint(20) UNSIGNED NOT NULL,
  `dep_id` bigint(20) UNSIGNED NOT NULL,
  `operate_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operate_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deposit_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admission_bills`
--

INSERT INTO `admission_bills` (`admission_id`, `bill_number`, `admission_date`, `patient_id`, `emp_id`, `dep_id`, `operate_type`, `operate_id`, `deposit_amount`, `discount`, `author`, `created_at`, `updated_at`) VALUES
(1, '1', '2021-06-10', 1, 4, 1, 'surgery', '1', '33', NULL, 1, '2021-06-17 18:13:30', '2021-06-17 18:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `admission_bill_infos`
--

CREATE TABLE `admission_bill_infos` (
  `bill_info` bigint(20) UNSIGNED NOT NULL,
  `admission_id` bigint(20) UNSIGNED NOT NULL,
  `charges_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admission_bill_infos`
--

INSERT INTO `admission_bill_infos` (`bill_info`, `admission_id`, `charges_type`, `charge_description`, `amount`, `status`, `author`, `created_at`, `updated_at`) VALUES
(1, 1, '300', '23', '333', 'paid', 1, '2021-06-17 18:16:16', '2021-06-17 18:16:16'),
(2, 1, 'VIP Room 3', 'VIP Room 3-duration-3322', '1106226', 'paid', 1, '2021-06-17 18:21:30', '2021-06-17 18:21:30'),
(3, 1, '300', '23', '999', 'paid', 1, '2021-06-17 18:21:43', '2021-06-17 18:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `appoinments`
--

CREATE TABLE `appoinments` (
  `app_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_f_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_l_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dep_id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `referral_person` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appoinments`
--

INSERT INTO `appoinments` (`app_id`, `patient_id`, `p_f_name`, `p_l_name`, `age`, `phone`, `dep_id`, `emp_id`, `date`, `time`, `app_number`, `author`, `referral_person`, `created_at`, `updated_at`) VALUES
(1, '1', 'Mustafa', 'Khan', '32', '(0)-234-234-234', 1, 3, '2021-05-25', '1:30am', '1', 1, NULL, '2021-05-20 16:35:11', '2021-05-20 16:35:11'),
(2, '2', 'Mustafa', 'Khan', '87', '(0)-979-897-987', 1, 3, '2021-05-15', '1:30am', '1', 1, NULL, '2021-05-20 16:37:11', '2021-05-20 16:37:11'),
(3, '3', 'Mustafa', 'Khan', '34', '(0)-234-234-234', 1, 3, '2021-05-22', '1:30am', '1', 1, NULL, '2021-05-20 16:38:54', '2021-05-20 16:38:54'),
(4, '4', 'Mustafa', 'Khan', '32', '(0)-234-234-242', 1, 3, '2021-05-26', '1:30am', '1', 1, NULL, '2021-05-20 16:45:45', '2021-05-20 16:45:45'),
(5, '5', 'Mustafa', 'Khan', '43', '(0)-234-234-234', 1, 3, '2021-05-20', '2:00am', '1', 1, NULL, '2021-05-27 18:59:19', '2021-05-27 18:59:19'),
(6, '6', 'Mustafa', 'Khan', '77', '(0)-076-438-981', 1, 5, '2021-06-25', '1:30am', '1', 1, NULL, '2021-06-17 17:59:23', '2021-06-17 17:59:23'),
(9, '9', 'Mustafa', 'Khan', '88', '(0)-076-438-981', 1, 3, '2021-06-19', '2:30am', '1', 1, NULL, '2021-06-24 03:40:03', '2021-06-24 03:40:03'),
(10, '10', 'Mustafa', 'Khan', '78', '(0)-076-438-981', 1, 3, '2021-06-25', '2:00am', '2', 1, NULL, '2021-06-24 03:49:47', '2021-06-24 03:49:47'),
(11, '10', 'Mustafa', 'Khan', '66', '(0)-076-438-981', 1, 5, '2021-06-30', '1:30am', '1', 1, NULL, '2021-06-24 03:50:13', '2021-06-24 03:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `births`
--

CREATE TABLE `births` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `child_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date DEFAULT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blood_donations`
--

CREATE TABLE `blood_donations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `receiver_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donor_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donor_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blag_no` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_bills`
--

CREATE TABLE `company_bills` (
  `company_bill_id` bigint(20) UNSIGNED NOT NULL,
  `bill_number` bigint(20) NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `due_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_bills`
--

INSERT INTO `company_bills` (`company_bill_id`, `bill_number`, `company_name`, `date`, `description`, `paid_amount`, `due_amount`, `total`, `author`, `created_at`, `updated_at`) VALUES
(1, 1, 'sarey.co', '2021-07-02', 'ar far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics,', '33', '32', '33', 1, '2021-06-17 18:18:46', '2021-06-17 18:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `deaths`
--

CREATE TABLE `deaths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `death_date` date DEFAULT NULL,
  `guardian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `report` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dep_id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dep_id`, `department_name`, `author`, `created_at`, `updated_at`) VALUES
(1, 'Computer', 1, '2021-05-20 12:41:04', '2021-05-20 12:41:04'),
(2, 'Mobile', 1, '2021-05-20 12:41:10', '2021-05-20 12:41:10');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` bigint(20) UNSIGNED NOT NULL,
  `emp_identify_id` int(11) NOT NULL,
  `dep_id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tin_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fees` int(11) DEFAULT NULL,
  `f_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `date_of_join` date NOT NULL,
  `end_of_contract` date NOT NULL,
  `phone_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` int(11) NOT NULL,
  `cv_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `emergency_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `emp_identify_id`, `dep_id`, `position`, `tin_number`, `fees`, `f_name`, `l_name`, `father_name`, `mother_name`, `passport_id`, `gender`, `m_status`, `date_of_birth`, `date_of_join`, `end_of_contract`, `phone_number`, `email`, `photo`, `current_address`, `permanent_address`, `salary`, `cv_file`, `contract_file`, `author`, `emergency_contact`, `relationship`, `type`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Doctor', NULL, 300, 'Essa', 'Osman', 'hhhhhhh', 'Kabul', '37', 'Female', 'Married', '2021-05-04', '2021-05-19', '2021-05-19', '(0)-234-234', 'mustafa@gmail.com', 'public/EmpPhoto/Gst8MFWJe9cy2qTZYnqxPcQdq62ey6OEqU1Ifuxw.jpg', 'jsalkd', 'kasdlkj;lkd', 23423, 'public/cv/jTqD0ye5hTvBBqyXzBGczzIBW3rhwhaAnYu9PV7H.pdf', 'public/contract/WF9uhat2Py0dYjznipD6c2cySECXQUP3VxiuKSPl.pdf', 3, '(0)-676-765-76_', 'erwer', NULL, NULL, '2021-06-19 16:38:32'),
(2, 0, 1, 'Doctor', NULL, 0, 'Essa', 'Osman', 'hhhhhhh', 'Kabul', '3', '', '', '2021-05-04', '2021-05-19', '2021-05-19', '(0)-234-234', 'mustafa@gmail.com', NULL, 'jsalkd', 'kasdlkj;lkd', 23423, NULL, NULL, 3, '', 'erwer', NULL, NULL, '2021-05-20 13:24:17'),
(3, 1, 1, 'Tester', '32', 3243, 'Mustafa', 'Khan', 'Shar Mohamod', 'Mustafa Khan', '22', 'Female', 'Married', '2021-05-21', '2021-05-25', '2021-05-04', '(0)-242-342', 'mustafadeveloeper2@gmail.com', 'public/EmpPhoto/4Osv5ckcxeRw2bi66riSUVRzsInbYfyuZJfVPDWM.png', 'Kabul', 'ahmad', 20000, 'public/cv/XLtHpb04bIWEOQRGMuenOXt2xRRhMa5HlVtoEer9.pdf', 'public/contract/qFur0iYOaYHSgJht1pGQB8z01PuOy5in7wEnZrNp.pdf', 1, '(0)-234-234-234', 'hhhhhhh', 'docter', '2021-05-20 15:57:32', '2021-05-20 15:57:32'),
(4, 2, 1, 'hhhhh', '333', 234234, 'Kamal', 'Khan', 'Shar Mohamod', 'Mustafa Khan', '22', 'Female', 'Married', '2021-05-21', '2021-05-10', '2021-05-24', '(0)-234-234', 'mustafadeveloeper2@gmail.com', 'public/EmpPhoto/1PKPkGbQ07jSsa4jmVjRw8OgyFlDKeHbRrRXYi8e.jpg', 'Kabul', 'ahmad', 20000, 'public/cv/RDw0wepl1clhL9SioRUJ2bescIajQD8c00OqF1Sp.pdf', 'public/contract/qzdrZBLTa5fKnEMO4mXrDvzXlWZdECIYmS3ZmZ1t.pdf', 1, '(0)-234-234-234', 'hhhhhhh', 'docter', '2021-05-20 15:59:20', '2021-05-20 15:59:20'),
(5, 3, 1, 'hhhhh', '32', 768, 'Mustafa', 'Khan', 'Sayed Aziz', 'Mustafa Khan', '22', 'Female', 'Single', '2021-06-30', '2021-06-16', '2021-06-16', '(0)-076-438', 'mustafadeveloeper2@gmail.com', 'public/EmpPhoto/B3dZk2HrJ4bGVEkOOjHVn4xB1tM69aNSWXASvOo9.pdf', 'The company, Kabul, Afghanistan', 'ahmad', 20000, 'public/cv/HQoDNj5xKsppZLAa1g8jEcYyTC09h9yGpCkrMhvK.pdf', 'public/contract/nH6HopE4mkWvaV9kweLo4j9q5ojTZWM5rAWxpk84.pdf', 1, '(0)-987-987-979', 'hhhhhhh', 'docter', '2021-06-17 17:53:15', '2021-06-19 16:37:15');

-- --------------------------------------------------------

--
-- Table structure for table `end_of_the_days`
--

CREATE TABLE `end_of_the_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_number` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_expense` int(11) NOT NULL,
  `total_income` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `end_of_the_days`
--

INSERT INTO `end_of_the_days` (`id`, `bill_number`, `user_id`, `total_expense`, `total_income`, `created_at`, `updated_at`) VALUES
(3, 3, 1, 234234, 234234, '2021-05-22 11:37:17', '2021-05-22 11:37:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE `finance` (
  `f_id` bigint(20) UNSIGNED NOT NULL,
  `fees` bigint(20) NOT NULL,
  `relate_id` bigint(20) NOT NULL,
  `dep_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_charges` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `finance`
--

INSERT INTO `finance` (`f_id`, `fees`, `relate_id`, `dep_id`, `patient_id`, `description`, `status`, `type_charges`, `author`, `created_at`, `updated_at`) VALUES
(1, 3243, 1, 1, 1, NULL, 'Paid', 'OPD', 1, '2021-06-23 15:59:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `finance_logs`
--

CREATE TABLE `finance_logs` (
  `f_id` bigint(20) UNSIGNED NOT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `finance_logs`
--

INSERT INTO `finance_logs` (`f_id`, `payment_type`, `type`, `bill_id`, `total`, `status`, `description`, `author`, `created_at`, `updated_at`) VALUES
(1, 'Partial bill payment', NULL, '1', '349690', 'Paid', NULL, 1, '2021-06-02 00:00:37', '2021-06-02 00:00:37'),
(2, 'Pharmacy bill payment', NULL, '1', NULL, 'Pending', NULL, 1, '2021-06-07 13:33:11', '2021-06-07 13:33:11'),
(3, 'Pharmacy bill payment', NULL, '2', '1998', 'Paid', NULL, 1, '2021-06-07 13:36:32', '2021-06-07 13:38:47'),
(4, 'Pharmacy bill payment', NULL, '3', '333', 'Paid', NULL, 1, '2021-06-07 13:39:08', '2021-06-07 13:39:29'),
(5, 'Laboratory bill payment', NULL, '1', NULL, 'Pending', NULL, 1, '2021-06-07 13:40:23', '2021-06-07 13:40:23'),
(6, 'Pharmacy bill payment', NULL, '4', '10989', 'Paid', NULL, 1, '2021-06-17 17:47:37', '2021-06-17 17:51:55'),
(7, 'Admission bill payment', NULL, '1', '1107558', 'Pending', NULL, 1, '2021-06-17 18:13:30', '2021-06-17 18:21:43'),
(8, 'Staff over time payment', 'Expense', '1', '8798', 'Pending', NULL, 1, '2021-06-17 18:17:10', '2021-06-17 18:17:10'),
(9, 'Nurse bill payment', NULL, '1', '876', 'Paid', NULL, 1, '2021-06-17 18:17:54', '2021-06-17 18:17:54'),
(10, 'Medical company bill payment', 'Expense', '1', '33', 'Pending', NULL, 1, '2021-06-17 18:18:46', '2021-06-17 18:18:46'),
(11, 'Payroll paid to employee', 'Expense', '1', '21047.7', 'Pending', NULL, 1, '2021-06-17 18:19:23', '2021-06-17 18:19:23'),
(12, 'Daily Expenses Payment', 'Expense', '1', '324', 'Pending', NULL, 1, '2021-06-17 18:20:09', '2021-06-17 18:20:09'),
(13, 'OPD patient revisit payement', NULL, '2', '3243', 'Paid', NULL, 1, '2021-06-24 04:02:29', '2021-06-24 04:02:29'),
(14, 'Partial bill payment', NULL, '2', '113', 'Paid', NULL, 1, '2021-08-24 19:57:28', '2021-08-24 19:57:28');

-- --------------------------------------------------------

--
-- Table structure for table `lab_bills`
--

CREATE TABLE `lab_bills` (
  `bill_id` bigint(20) UNSIGNED NOT NULL,
  `bill_no` bigint(20) NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` bigint(20) UNSIGNED NOT NULL,
  `dep_id` bigint(20) UNSIGNED NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lab_bills`
--

INSERT INTO `lab_bills` (`bill_id`, `bill_no`, `patient_id`, `emp_id`, `dep_id`, `total`, `discount`, `note`, `author`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 1, '', NULL, NULL, 1, '2021-06-07 13:40:23', '2021-06-07 13:40:23');

-- --------------------------------------------------------

--
-- Table structure for table `lab_bill_infos`
--

CREATE TABLE `lab_bill_infos` (
  `lab_bill_ifo_id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` bigint(20) UNSIGNED NOT NULL,
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_catagories`
--

CREATE TABLE `lab_catagories` (
  `lab_cat_id` bigint(20) UNSIGNED NOT NULL,
  `lab_cat_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lab_catagories`
--

INSERT INTO `lab_catagories` (`lab_cat_id`, `lab_cat_name`, `author`, `created_at`, `updated_at`) VALUES
(1, 'Kaka', 1, '2021-06-17 18:03:56', '2021-06-17 18:03:56');

-- --------------------------------------------------------

--
-- Table structure for table `lab_materials`
--

CREATE TABLE `lab_materials` (
  `lab_m_id` bigint(20) UNSIGNED NOT NULL,
  `lab_cat_id` bigint(20) UNSIGNED NOT NULL,
  `material_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantitiy` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sold_quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lab_materials`
--

INSERT INTO `lab_materials` (`lab_m_id`, `lab_cat_id`, `material_name`, `quantitiy`, `sold_quantity`, `company`, `expiry_date`, `purchase_price`, `sale_price`, `status`, `author`, `created_at`, `updated_at`) VALUES
(1, 1, 'mustafa', '33', NULL, 'sarey.co', '2021-12', '33', '333', 'Empty', 1, '2021-06-17 18:04:54', '2021-06-17 18:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `midicines`
--

CREATE TABLE `midicines` (
  `midi_id` bigint(20) UNSIGNED NOT NULL,
  `ph_main_cat_id` bigint(20) UNSIGNED NOT NULL,
  `medicine_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantitiy` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sold_quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `midicines`
--

INSERT INTO `midicines` (`midi_id`, `ph_main_cat_id`, `medicine_name`, `quantitiy`, `sold_quantity`, `company`, `expiry_date`, `purchase_price`, `sale_price`, `status`, `author`, `created_at`, `updated_at`) VALUES
(1, 1, 'kabesa', '333', '37', 'sarey.co', '2021-08', '333', '333', 'Empty', 1, '2021-06-07 13:35:21', '2021-06-17 17:51:55'),
(2, 2, 'kabesa', NULL, NULL, 'sarey.co', NULL, NULL, NULL, 'Empty', 1, '2021-06-07 13:35:34', '2021-06-07 13:35:34');

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
(1, '2014_10_11_125032_create_permission_tables', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2021_02_16_043039_create_sessions_table', 1),
(8, '2021_04_08_120308_create_departments_table', 1),
(9, '2021_04_09_094020_create_patients_table', 1),
(10, '2021_04_14_075454_create_employees_table', 1),
(11, '2021_04_16_010428_create_payrolls_table', 1),
(12, '2021_04_17_085050_create_appoinments_table', 1),
(13, '2021_04_19_104654_create_opds_table', 1),
(14, '2021_04_21_083355_create_tests_table', 1),
(15, '2021_04_24_110518_create_visit_table', 1),
(16, '2021_04_24_123014_create_finance_table', 1),
(17, '2021_04_25_100148_create_patient_test_table', 1),
(18, '2021_04_26_103327_create_pharma__main__catagories_table', 1),
(19, '2021_04_28_041744_create_midicines_table', 1),
(20, '2021_04_29_075341_create_purchase_midicines_table', 1),
(21, '2021_05_01_053701_create_lab_catagories_table', 1),
(22, '2021_05_01_053841_create_lab_materials_table', 1),
(23, '2021_05_01_053842_create_purchaselab_materials_table', 1),
(24, '2021_05_02_060619_create_surgeries_table', 1),
(25, '2021_05_02_060908_create_procedures_table', 1),
(27, '2021_05_04_085036_create_pharma_bills_table', 1),
(28, '2021_05_04_090355_create_pharma_bill_infos_table', 1),
(29, '2021_05_08_064646_create_lab_bills_table', 1),
(30, '2021_05_08_064835_create_lab_bill_infos_table', 1),
(31, '2021_05_08_164112_create_rooms_table', 1),
(32, '2021_05_09_044022_create_admission_bills_table', 1),
(33, '2021_05_09_100046_create_admission_bill_infos_table', 1),
(34, '2021_05_10_062216_create_partial_payment_billings_table', 1),
(35, '2021_05_10_063739_create_overtime_pays_table', 1),
(36, '2021_05_10_100008_create_nurse_bills_table', 1),
(37, '2021_05_10_141510_create_end_of_the_days_table', 1),
(38, '2021_05_11_035610_create_company_bills_table', 1),
(39, '2021_05_11_173327_create_pettycashes_table', 1),
(40, '2021_05_12_065628_create_finance_logs_table', 1),
(41, '2021_05_12_074715_create_births_table', 1),
(42, '2021_05_16_205527_create_deaths_table', 1),
(43, '2021_05_17_113907_create_blood_donations_table', 1),
(44, '2021_05_02_131921_create_patient_operations_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nurse_bills`
--

CREATE TABLE `nurse_bills` (
  `nurse_bill_id` bigint(20) UNSIGNED NOT NULL,
  `bill_number` bigint(20) NOT NULL,
  `patient_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_id` bigint(20) UNSIGNED NOT NULL,
  `fees` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nurse_bills`
--

INSERT INTO `nurse_bills` (`nurse_bill_id`, `bill_number`, `patient_name`, `emp_id`, `fees`, `date`, `description`, `author`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hasib Qandari', 3, '876', '2021-06-26', 'ar far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics,', 1, '2021-06-17 18:17:54', '2021-06-17 18:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `opds`
--

CREATE TABLE `opds` (
  `opd_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `o_f_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `o_l_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dep_id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `referral_person` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `opds`
--

INSERT INTO `opds` (`opd_id`, `patient_id`, `o_f_name`, `o_l_name`, `phone`, `gender`, `age`, `dep_id`, `emp_id`, `date`, `author`, `referral_person`, `created_at`, `updated_at`) VALUES
(1, '1', 'Mustafa', 'Khan', '(0)-443-333-333', 'Female', '33', 1, 4, '2021-05-22', 1, 'Essa Ahmadi', '2021-05-20 15:59:56', '2021-05-20 15:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `overtime_pays`
--

CREATE TABLE `overtime_pays` (
  `overtime_id` bigint(20) UNSIGNED NOT NULL,
  `bill_number` bigint(20) NOT NULL,
  `emp_id` bigint(20) UNSIGNED NOT NULL,
  `extra_hours` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `overtime_pays`
--

INSERT INTO `overtime_pays` (`overtime_id`, `bill_number`, `emp_id`, `extra_hours`, `total_amount`, `date`, `author`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '987987', '8798', '2021-06-12', 1, '2021-06-17 18:17:09', '2021-06-17 18:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `partial_payment_billings`
--

CREATE TABLE `partial_payment_billings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_number` int(11) NOT NULL,
  `doctor_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `services_charges` int(11) NOT NULL,
  `facility_charges` int(11) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partial_payment_billings`
--

INSERT INTO `partial_payment_billings` (`id`, `bill_number`, `doctor_name`, `doctor_phone_number`, `patient_name`, `patient_phone_number`, `department`, `date`, `services_charges`, `facility_charges`, `description`, `author`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mustafa Khan', '(0)-787-677-334', 'Mustafa Khan', '(0)-234-234-234', 'Tests and information', '2021-06-19', 4345, 345345, 'this is some text and very good', 1, '2021-06-02 00:00:37', '2021-06-02 00:00:37'),
(2, 2, 'Indira Jones', '(0)-131-946-934', 'Cailin Cervantes', '(0)-151-536-384', 'Sunt magna quas sit', '2011-04-26', 84, 29, 'Nisi aute facere qui', 1, '2021-08-24 19:57:28', '2021-08-24 19:57:28');

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `dep_id` bigint(20) UNSIGNED NOT NULL,
  `f_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_g` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emergency_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_idetify_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `age` int(11) NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `allergies` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referral_person` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `dep_id`, `f_name`, `l_name`, `dob`, `gender`, `phone_number`, `blood_g`, `address`, `emergency_contact`, `relationship`, `patient_idetify_number`, `author`, `age`, `remark`, `occupation`, `marital_status`, `allergies`, `referral_person`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mustafa', 'Khan', '2021-05-20', 'Female', '(0)-233-423-423', 'B-', 'Kabul\r\nahmad', '(0)-234-234-234', 'hhhhhhh', '1', 1, 32, 'hkjs adklj dsk', 'Khair Khana', 'Married', 'Married', 'Kaka Ahmadi', '2021-05-20 12:42:26', '2021-05-20 12:48:01');

-- --------------------------------------------------------

--
-- Table structure for table `patient_operations`
--

CREATE TABLE `patient_operations` (
  `patient_s_del_pro_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `procedure_id` bigint(20) UNSIGNED DEFAULT NULL,
  `surgery_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `dep_id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` bigint(20) UNSIGNED NOT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `referral_person` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_operations`
--

INSERT INTO `patient_operations` (`patient_s_del_pro_id`, `type`, `procedure_id`, `surgery_id`, `date`, `time`, `patient_id`, `dep_id`, `emp_id`, `author`, `referral_person`, `created_at`, `updated_at`) VALUES
(1, 'surgery', NULL, 1, '2021-05-19', '17:15', 1, 1, 4, 1, 'Kaka Ahmadi', '2021-05-20 17:13:35', '2021-05-20 17:13:35');

-- --------------------------------------------------------

--
-- Table structure for table `patient_test`
--

CREATE TABLE `patient_test` (
  `patient_test_id` bigint(20) UNSIGNED NOT NULL,
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `dep_id` bigint(20) UNSIGNED NOT NULL,
  `opd_id` bigint(20) UNSIGNED NOT NULL,
  `fees` bigint(20) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payrolls`
--

CREATE TABLE `payrolls` (
  `pay_id` bigint(20) UNSIGNED NOT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `emp_id` bigint(20) UNSIGNED NOT NULL,
  `tax_precentage` int(11) NOT NULL,
  `tax_amount` bigint(20) NOT NULL,
  `net_salary` bigint(20) NOT NULL,
  `deduction` bigint(20) DEFAULT NULL,
  `deduction_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payrolls`
--

INSERT INTO `payrolls` (`pay_id`, `author`, `emp_id`, `tax_precentage`, `tax_amount`, `net_salary`, `deduction`, `deduction_description`, `month_year`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 10, 2342, 21048, 33, '32', '2021-07', 'Pending', '2021-06-17 18:19:23', '2021-06-17 18:19:23');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(13, 'access_patients', '', '2021-05-10 05:01:10', '2021-05-10 05:01:10'),
(14, '_patients--create', '', '2021-05-10 05:02:10', '2021-05-10 05:02:10'),
(15, '_patients--edit', '', '2021-05-10 05:02:21', '2021-05-10 05:02:21'),
(16, '_patients--delete', '', '2021-05-10 05:02:31', '2021-05-10 05:02:31'),
(17, 'access_humanResourcess', '', '2021-05-10 05:03:32', '2021-05-10 05:03:32'),
(18, '_access_employee', '', '2021-05-10 05:04:11', '2021-05-10 08:41:16'),
(19, '_employee--create', '', '2021-05-10 05:04:23', '2021-05-10 05:04:23'),
(20, '_employee--edit', '', '2021-05-10 05:04:31', '2021-05-10 05:04:31'),
(21, '_employee--delete', '', '2021-05-10 05:05:20', '2021-05-10 05:05:20'),
(22, '_access_payroll', '', '2021-05-10 05:06:16', '2021-05-10 08:42:35'),
(23, '_payroll--create', '', '2021-05-10 05:06:47', '2021-05-10 05:06:47'),
(24, '_payroll--edit', '', '2021-05-10 05:06:54', '2021-05-10 05:06:54'),
(25, '_payroll--delete', '', '2021-05-10 05:07:06', '2021-05-10 05:07:06'),
(26, '_access_departments', '', '2021-05-10 05:07:31', '2021-05-10 08:43:56'),
(27, '_departments--create', '', '2021-05-10 05:07:51', '2021-05-10 05:08:05'),
(28, '_departments--edit', '', '2021-05-10 05:08:27', '2021-05-10 05:08:27'),
(29, '_departments--delete', '', '2021-05-10 05:08:36', '2021-05-10 05:08:36'),
(30, 'access_appoinments', '', '2021-05-10 05:09:53', '2021-05-10 05:09:53'),
(32, '_appoinments--create', '', '2021-05-10 05:10:09', '2021-05-10 05:10:15'),
(33, '_appoinments--edit', '', '2021-05-10 05:10:30', '2021-05-10 05:10:30'),
(34, '_appoinments--delete', '', '2021-05-10 05:10:37', '2021-05-10 05:10:37'),
(35, 'access_opd', '', '2021-05-10 05:12:03', '2021-05-10 05:12:03'),
(36, '_opd--create', '', '2021-05-10 05:12:20', '2021-05-10 05:12:20'),
(37, '_opd--edit', '', '2021-05-10 05:12:40', '2021-05-10 05:12:40'),
(38, '_opd--delete', '', '2021-05-10 05:12:49', '2021-05-10 05:12:49'),
(39, '_access_tests', '', '2021-05-10 05:13:24', '2021-05-19 02:28:29'),
(40, '_tests--create', '', '2021-05-10 05:13:34', '2021-05-10 05:13:34'),
(41, '_tests--edit', '', '2021-05-10 05:13:40', '2021-05-10 05:13:40'),
(42, '_tests--delete', '', '2021-05-10 05:13:48', '2021-05-10 05:13:48'),
(43, 'access_pharmacy', '', '2021-05-10 05:15:17', '2021-05-10 05:15:17'),
(44, '_purchaseMediciens--create', '', '2021-05-10 05:15:59', '2021-05-10 05:15:59'),
(45, '_purchaseMediciens--edit', '', '2021-05-10 05:16:09', '2021-05-10 05:16:09'),
(46, '_purchaseMediciens--delete', '', '2021-05-10 05:16:16', '2021-05-10 05:16:16'),
(47, '_access_medicines', '', '2021-05-10 05:16:49', '2021-05-10 08:50:46'),
(48, '_access_purchaseMedicines', '', '2021-05-10 05:17:01', '2021-05-10 08:52:15'),
(49, '_medicines--create', '', '2021-05-10 05:18:01', '2021-05-10 05:18:01'),
(50, '_medicines--edit', '', '2021-05-10 05:18:07', '2021-05-10 05:18:07'),
(51, '_medicines--delete', '', '2021-05-10 05:18:13', '2021-05-10 05:18:13'),
(52, '_access_medicineCatagory', '', '2021-05-10 05:18:43', '2021-05-10 08:52:53'),
(53, '_medicineCatagory--create', '', '2021-05-10 05:18:50', '2021-05-10 05:18:50'),
(54, '_medicineCatagory--edit', '', '2021-05-10 05:18:58', '2021-05-10 05:18:58'),
(55, '_medicineCatagory--delete', '', '2021-05-10 05:19:04', '2021-05-10 05:19:04'),
(56, 'access_laboratory', '', '2021-05-10 05:41:04', '2021-05-10 05:41:04'),
(57, '_access_purchaseLabMaterial', '', '2021-05-10 05:41:37', '2021-05-10 08:58:24'),
(58, '_purchaseLabMaterial--create', '', '2021-05-10 05:41:45', '2021-05-10 05:42:55'),
(59, '_purchaseLabMaterial--edit', '', '2021-05-10 05:42:20', '2021-05-10 05:43:02'),
(60, '_purchaseLabMaterial--delete', '', '2021-05-10 05:42:27', '2021-05-10 05:43:09'),
(61, '_access_labMaterials', '', '2021-05-10 05:43:49', '2021-05-10 08:59:50'),
(62, '_labMaterials--create', '', '2021-05-10 05:44:03', '2021-05-10 05:44:03'),
(63, '_labMaterials--edit', '', '2021-05-10 05:44:08', '2021-05-10 05:44:08'),
(64, '_labMaterials--delete', '', '2021-05-10 05:44:20', '2021-05-10 05:44:20'),
(65, '_access_LabMaterialCategory', '', '2021-05-10 05:45:21', '2021-05-10 09:01:34'),
(66, '_LabMaterialCategory--create', '', '2021-05-10 05:45:27', '2021-05-10 05:45:27'),
(67, '_LabMaterialCategory--edit', '', '2021-05-10 05:45:32', '2021-05-10 05:45:32'),
(68, '_LabMaterialCategory--delete', '', '2021-05-10 05:45:39', '2021-05-10 05:45:39'),
(70, '_surgery--create', '', '2021-05-10 05:46:46', '2021-05-10 05:46:46'),
(71, '_surgery--edit', '', '2021-05-10 05:46:53', '2021-05-10 05:46:53'),
(72, '_surgery--delete', '', '2021-05-10 05:46:59', '2021-05-10 05:46:59'),
(73, '_access_surgery', '', '2021-05-10 05:47:35', '2021-05-10 09:04:20'),
(74, '_access_procedures', '', '2021-05-10 05:48:32', '2021-05-10 09:05:25'),
(75, '_procedures--create', '', '2021-05-10 05:48:41', '2021-05-10 05:48:41'),
(76, '_procedures--edit', '', '2021-05-10 05:48:48', '2021-05-10 05:48:57'),
(77, '_procedures--delete', '', '2021-05-10 05:49:03', '2021-05-10 05:49:03'),
(78, '_access_surgery&Delivery', '', '2021-05-10 05:49:36', '2021-05-10 09:06:32'),
(79, '_surgery&Delivery--create', '', '2021-05-10 05:49:42', '2021-05-10 05:49:42'),
(80, '_surgery&Delivery--edit', '', '2021-05-10 05:49:48', '2021-05-10 05:49:48'),
(81, '_surgery&Delivery--delete', '', '2021-05-10 05:49:55', '2021-05-10 05:49:55'),
(82, 'access_userManagement', '', '2021-05-10 05:50:38', '2021-05-10 05:50:38'),
(83, '_access_users', '', '2021-05-10 05:50:51', '2021-05-10 09:19:31'),
(84, '_users--create', '', '2021-05-10 05:50:57', '2021-05-10 06:28:30'),
(85, '_users--edit', '', '2021-05-10 05:51:04', '2021-05-10 06:28:23'),
(86, '_users--delete', '', '2021-05-10 05:51:12', '2021-05-10 06:28:11'),
(87, '_access_permissions', '', '2021-05-10 05:51:55', '2021-05-10 09:20:26'),
(88, '_permissions--create', '', '2021-05-10 05:52:01', '2021-05-10 05:52:01'),
(89, '_permissions--edit', '', '2021-05-10 05:52:12', '2021-05-10 05:52:12'),
(90, '_permissions--delete', '', '2021-05-10 05:52:23', '2021-05-10 05:52:23'),
(91, '_access_roles', '', '2021-05-10 05:52:39', '2021-05-10 09:20:47'),
(92, '_roles--create', '', '2021-05-10 05:52:45', '2021-05-10 05:52:45'),
(93, '_roles--edit', '', '2021-05-10 05:52:57', '2021-05-10 05:52:57'),
(94, '_roles--delete', '', '2021-05-10 05:53:08', '2021-05-10 05:53:08'),
(95, '_patients--view', '', '2021-05-10 08:26:42', '2021-05-10 08:26:42'),
(96, 'access_birth_and_death', '', '2021-05-19 01:28:43', '2021-05-19 01:28:43'),
(97, '_access_birth', '', '2021-05-19 01:28:57', '2021-05-19 01:32:56'),
(98, '_birth--create', '', '2021-05-19 01:33:13', '2021-05-19 01:41:57'),
(99, '_birth--delete', '', '2021-05-19 01:33:24', '2021-05-19 01:41:50'),
(100, '_birth--edit', '', '2021-05-19 01:33:30', '2021-05-19 01:41:16'),
(101, '_access_death', '', '2021-05-19 01:33:51', '2021-05-19 01:33:51'),
(102, '_death--create', '', '2021-05-19 01:33:55', '2021-05-19 01:41:35'),
(103, '_death--edit', '', '2021-05-19 01:34:01', '2021-05-19 01:41:29'),
(104, '_death--delete', '', '2021-05-19 01:34:09', '2021-05-19 02:40:45'),
(105, 'access_bloodDonation', '', '2021-05-19 01:42:35', '2021-05-19 01:44:29'),
(106, '_bloodDonation--create', '', '2021-05-19 01:42:43', '2021-05-19 01:44:38'),
(107, '_bloodDonation--edit', '', '2021-05-19 01:42:50', '2021-05-19 01:44:45'),
(108, '_bloodDonation--delete', '', '2021-05-19 01:42:57', '2021-05-19 01:44:52'),
(109, 'access_billing', '', '2021-05-19 01:43:17', '2021-05-19 01:43:17'),
(110, '_access_pharmacyBilling', '', '2021-05-19 01:44:09', '2021-05-20 01:59:56'),
(111, '_pharmacyBilling--create', '', '2021-05-19 01:45:14', '2021-05-20 02:01:46'),
(112, '_pharmacyBilling--edit', '', '2021-05-19 01:45:22', '2021-05-20 02:00:15'),
(113, '_pharmacyBilling--delete', '', '2021-05-19 01:45:30', '2021-05-20 02:00:07'),
(114, '_access_laboratoryBilling', '', '2021-05-19 01:46:45', '2021-05-20 02:02:51'),
(115, '_laboratoryBilling--create', '', '2021-05-19 01:46:51', '2021-05-20 02:03:14'),
(116, '_laboratoryBilling--edit', '', '2021-05-19 01:46:59', '2021-05-20 02:03:30'),
(117, '_laboratoryBilling--delete', '', '2021-05-19 01:47:06', '2021-05-20 02:03:41'),
(118, '_access_admissionBilling', '', '2021-05-19 01:48:06', '2021-05-20 02:04:28'),
(119, '_admissionBilling--create', '', '2021-05-19 01:48:11', '2021-05-20 02:04:43'),
(120, '_admissionBilling--edit', '', '2021-05-19 01:48:17', '2021-05-20 02:05:21'),
(121, '_admissionBilling--delete', '', '2021-05-19 01:48:22', '2021-05-20 02:05:33'),
(122, '_access_overTimePaymentBill', '', '2021-05-19 01:50:23', '2021-05-19 01:50:23'),
(123, '_overTimePaymentBill--create', '', '2021-05-19 01:50:29', '2021-05-19 01:50:29'),
(124, '_overTimePaymentBill--edit', '', '2021-05-19 01:50:35', '2021-05-19 01:50:35'),
(125, '_overTimePaymentBill--delete', '', '2021-05-19 01:50:42', '2021-05-19 01:50:42'),
(126, '_access_nurseBill', '', '2021-05-19 01:52:31', '2021-05-20 02:06:47'),
(127, '_nurseBill--create', '', '2021-05-19 01:52:38', '2021-05-19 23:11:25'),
(128, '_nurseBill--edit', '', '2021-05-19 01:52:43', '2021-05-19 23:10:56'),
(129, '_nurseBill--delete', '', '2021-05-19 01:52:50', '2021-05-19 23:11:11'),
(130, '_access_partialPaymentBilling', '', '2021-05-19 01:53:37', '2021-05-19 01:53:37'),
(131, '_partialPaymentBilling--create', '', '2021-05-19 01:53:45', '2021-05-19 01:53:45'),
(132, '_partialPaymentBilling--edit', '', '2021-05-19 01:53:50', '2021-05-19 01:53:50'),
(133, '_partialPaymentBilling--delete', '', '2021-05-19 01:53:56', '2021-05-19 01:53:56'),
(134, '_access_medicalCompanyBilling', '', '2021-05-19 01:54:33', '2021-05-19 01:54:33'),
(135, '_medicalCompanyBilling--create', '', '2021-05-19 01:54:39', '2021-05-19 01:54:39'),
(136, '_medicalCompanyBilling--edit', '', '2021-05-19 01:54:45', '2021-05-19 01:54:45'),
(137, '_medicalCompanyBilling--delete', '', '2021-05-19 01:54:51', '2021-05-19 01:54:51'),
(138, 'access_finance', '', '2021-05-19 01:59:13', '2021-05-19 02:00:13'),
(139, '_access_endOfTheDay', '', '2021-05-19 02:00:49', '2021-05-19 02:00:49'),
(140, '_endOfTheDay--create', '', '2021-05-19 02:00:54', '2021-05-19 02:00:54'),
(141, '_endOfTheDay--edit', '', '2021-05-19 02:01:00', '2021-05-19 02:01:00'),
(142, '_endOfTheDay--delete', '', '2021-05-19 02:01:07', '2021-05-19 02:01:07'),
(143, '_access_dailyExpenses', '', '2021-05-19 02:02:26', '2021-05-19 02:02:26'),
(144, '_dailyExpenses--create', '', '2021-05-19 02:02:32', '2021-05-19 02:02:32'),
(145, '_dailyExpenses--edit', '', '2021-05-19 02:02:37', '2021-05-19 02:02:37'),
(146, '_dailyExpenses--delete', '', '2021-05-19 02:02:44', '2021-05-19 02:02:44'),
(147, '_access_financialStatment', '', '2021-05-19 02:06:22', '2021-05-19 02:06:22'),
(148, 'access_systemSetup', '', '2021-05-19 02:07:35', '2021-05-19 02:07:35'),
(149, '_access_rooms', '', '2021-05-19 02:12:00', '2021-05-19 02:12:00'),
(150, '_rooms--create', '', '2021-05-19 02:12:07', '2021-05-19 02:12:07'),
(151, '_rooms--edit', '', '2021-05-19 02:12:15', '2021-05-19 02:12:15'),
(152, '_rooms--delete', '', '2021-05-19 02:12:23', '2021-05-19 02:12:23'),
(157, '_access_proceduresManagment', '', '2021-05-19 02:25:41', '2021-05-19 02:25:41');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pettycashes`
--

CREATE TABLE `pettycashes` (
  `cash_id` bigint(20) UNSIGNED NOT NULL,
  `person_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` bigint(20) NOT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pettycashes`
--

INSERT INTO `pettycashes` (`cash_id`, `person_name`, `description`, `amount`, `author`, `status`, `approved_by`, `created_at`, `updated_at`) VALUES
(1, 'Mustafa', 'ar far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics,', 324, 1, 'Pending', NULL, '2021-06-17 18:20:09', '2021-06-17 18:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `pharma_bills`
--

CREATE TABLE `pharma_bills` (
  `bill_id` bigint(20) UNSIGNED NOT NULL,
  `bill_no` bigint(20) NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` bigint(20) UNSIGNED NOT NULL,
  `dep_id` bigint(20) UNSIGNED NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pharma_bills`
--

INSERT INTO `pharma_bills` (`bill_id`, `bill_no`, `patient_id`, `emp_id`, `dep_id`, `total`, `discount`, `note`, `author`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 1, '', NULL, NULL, 1, '2021-06-07 13:33:10', '2021-06-07 13:33:10'),
(2, 2, 1, 4, 1, '', NULL, 'hhhhhhhhhhhhhhhhhhhhh', 1, '2021-06-07 13:36:32', '2021-06-07 13:36:32'),
(3, 3, 1, 3, 1, '', '2', 'asdfsdf', 1, '2021-06-07 13:39:08', '2021-06-07 13:39:37'),
(4, 4, 1, 3, 1, '', NULL, NULL, 1, '2021-06-17 17:47:37', '2021-06-17 17:47:37');

-- --------------------------------------------------------

--
-- Table structure for table `pharma_bill_infos`
--

CREATE TABLE `pharma_bill_infos` (
  `pharma_bill_ifo_id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` bigint(20) UNSIGNED NOT NULL,
  `midi_id` bigint(20) UNSIGNED NOT NULL,
  `expiry_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quanitity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pharma_bill_infos`
--

INSERT INTO `pharma_bill_infos` (`pharma_bill_ifo_id`, `bill_id`, `midi_id`, `expiry_date`, `quanitity`, `price`, `total`, `created_at`, `updated_at`) VALUES
(2, 2, 1, '2021-08', '1', '333', '333', '2021-06-07 13:38:33', '2021-06-07 13:38:33'),
(3, 2, 1, '2021-08', '2', '333', '666', '2021-06-07 13:38:47', '2021-06-07 13:38:47'),
(4, 3, 1, '2021-08', '1', '333', '333', '2021-06-07 13:39:28', '2021-06-07 13:39:28'),
(5, 4, 1, '2021-08', '33', '333', '10989', '2021-06-17 17:51:55', '2021-06-17 17:51:55');

-- --------------------------------------------------------

--
-- Table structure for table `pharma__main__catagories`
--

CREATE TABLE `pharma__main__catagories` (
  `ph_main_cat_id` bigint(20) UNSIGNED NOT NULL,
  `m_cat_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pharma__main__catagories`
--

INSERT INTO `pharma__main__catagories` (`ph_main_cat_id`, `m_cat_name`, `author`, `created_at`, `updated_at`) VALUES
(1, 'Kabul', 1, '2021-06-07 13:34:50', '2021-06-07 13:34:50'),
(2, 'Qandar', 1, '2021-06-07 13:34:58', '2021-06-07 13:34:58'),
(3, 'Mama', 1, '2021-06-17 18:03:30', '2021-06-17 18:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `procedures`
--

CREATE TABLE `procedures` (
  `procedure_id` bigint(20) UNSIGNED NOT NULL,
  `procedure_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dep_id` bigint(20) UNSIGNED NOT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `procedures`
--

INSERT INTO `procedures` (`procedure_id`, `procedure_name`, `dep_id`, `author`, `created_at`, `updated_at`) VALUES
(1, 'kjhkjhk', 1, 1, '2021-06-24 04:06:03', '2021-06-24 04:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `purchaselab_materials`
--

CREATE TABLE `purchaselab_materials` (
  `lab_purchase_id` bigint(20) UNSIGNED NOT NULL,
  `lab_m_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchaselab_materials`
--

INSERT INTO `purchaselab_materials` (`lab_purchase_id`, `lab_m_id`, `supplier_name`, `quantity`, `purchase_price`, `sale_price`, `amount`, `expiry_date`, `author`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kamal Khan', '33', '33', '333', '1089', '2021-12', 1, '2021-06-17 18:05:19', '2021-06-17 18:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_midicines`
--

CREATE TABLE `purchase_midicines` (
  `purchase_m_id` bigint(20) UNSIGNED NOT NULL,
  `midi_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_midicines`
--

INSERT INTO `purchase_midicines` (`purchase_m_id`, `midi_id`, `supplier_name`, `quantity`, `purchase_price`, `sale_price`, `amount`, `expiry_date`, `author`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kamal Khan', '333', '333', '333', '110889', '2021-08', 1, '2021-06-07 13:36:07', '2021-06-07 13:36:07');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(4, 'Admin', '', '2021-05-11 07:26:47', '2021-05-20 03:08:58'),
(5, 'Manager', '', '2021-05-11 08:37:38', '2021-05-11 08:37:38'),
(6, 'Super Admin', '', '2021-05-19 00:26:16', '2021-05-19 00:26:16');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(13, 4),
(13, 6),
(14, 4),
(14, 6),
(15, 4),
(15, 6),
(16, 4),
(16, 6),
(17, 4),
(17, 6),
(18, 4),
(18, 6),
(19, 4),
(19, 6),
(20, 4),
(20, 6),
(21, 4),
(21, 6),
(22, 4),
(22, 6),
(23, 4),
(23, 6),
(24, 4),
(24, 6),
(25, 4),
(25, 6),
(26, 4),
(26, 6),
(27, 4),
(27, 6),
(28, 4),
(28, 6),
(29, 4),
(29, 6),
(30, 4),
(30, 6),
(32, 4),
(32, 6),
(33, 4),
(33, 6),
(34, 4),
(34, 6),
(35, 4),
(35, 6),
(36, 4),
(36, 6),
(37, 4),
(37, 6),
(38, 4),
(38, 6),
(39, 4),
(39, 6),
(40, 4),
(40, 6),
(41, 4),
(41, 6),
(42, 4),
(42, 6),
(43, 4),
(43, 6),
(44, 4),
(44, 6),
(45, 4),
(45, 6),
(46, 4),
(46, 6),
(47, 4),
(47, 6),
(48, 4),
(48, 6),
(49, 4),
(49, 6),
(50, 4),
(50, 6),
(51, 4),
(51, 6),
(52, 4),
(52, 6),
(53, 4),
(53, 6),
(54, 4),
(54, 6),
(55, 4),
(55, 6),
(56, 4),
(56, 6),
(57, 4),
(57, 6),
(58, 4),
(58, 6),
(59, 4),
(59, 6),
(60, 4),
(60, 6),
(61, 4),
(61, 6),
(62, 4),
(62, 6),
(63, 4),
(63, 6),
(64, 4),
(64, 6),
(65, 4),
(65, 6),
(66, 4),
(66, 6),
(67, 4),
(67, 6),
(68, 4),
(68, 6),
(70, 4),
(70, 6),
(71, 4),
(71, 6),
(72, 4),
(72, 6),
(73, 4),
(73, 6),
(74, 4),
(74, 6),
(75, 4),
(75, 6),
(76, 4),
(76, 6),
(77, 4),
(77, 6),
(78, 4),
(78, 6),
(79, 4),
(79, 6),
(80, 4),
(80, 6),
(81, 4),
(81, 6),
(82, 4),
(82, 5),
(82, 6),
(83, 4),
(83, 5),
(83, 6),
(84, 4),
(84, 5),
(84, 6),
(85, 4),
(85, 5),
(85, 6),
(86, 4),
(86, 5),
(86, 6),
(87, 4),
(87, 6),
(88, 4),
(88, 6),
(89, 4),
(89, 6),
(90, 4),
(90, 6),
(91, 4),
(91, 6),
(92, 4),
(92, 6),
(93, 4),
(93, 6),
(94, 4),
(94, 6),
(95, 4),
(95, 6),
(96, 4),
(97, 4),
(98, 4),
(99, 4),
(100, 4),
(101, 4),
(102, 4),
(103, 4),
(104, 4),
(105, 4),
(106, 4),
(107, 4),
(108, 4),
(109, 4),
(110, 4),
(111, 4),
(112, 4),
(113, 4),
(114, 4),
(115, 4),
(116, 4),
(117, 4),
(118, 4),
(119, 4),
(120, 4),
(121, 4),
(122, 4),
(123, 4),
(124, 4),
(125, 4),
(126, 4),
(127, 4),
(128, 4),
(129, 4),
(130, 4),
(131, 4),
(132, 4),
(133, 4),
(134, 4),
(135, 4),
(136, 4),
(137, 4),
(138, 4),
(139, 4),
(140, 4),
(141, 4),
(142, 4),
(143, 4),
(144, 4),
(145, 4),
(146, 4),
(147, 4),
(148, 4),
(149, 4),
(150, 4),
(151, 4),
(152, 4),
(157, 4);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `room_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_fees` int(11) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_type`, `room_number`, `room_fees`, `description`, `author`, `created_at`, `updated_at`) VALUES
(2, 'VIP Room', '3', 333, 'Kabul', 1, '2021-06-17 18:21:01', '2021-06-17 18:21:01'),
(3, 'General Room', '33', 23, 'Kabul', 1, '2021-06-17 18:21:11', '2021-06-17 18:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('41IeXQgLnqRFOdX6r3xj3c8QGeNgNudMRiOxP4Bk', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoicTBQSkQ1Y0U1cHozUGRUM3N1MmVVQ3RON3doSlhRendBWGRaOTM1TyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI2OiJodHRwOi8vbG9jYWxob3N0L0hNUy9vcGQvMSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRpUlRzUmp6Ui5oRnlGWEZEVFFBQjJPV1l5bldPRXpCS3ZvR3Q3VE9tcDlMOC53ZXl4Li5MMiI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkaVJUc1JqelIuaEZ5RlhGRFRRQUIyT1dZeW5XT0V6Qkt2b0d0N1RPbXA5TDgud2V5eC4uTDIiO30=', 1629707799),
('bqzThiOS9JzmRvbUS6tsiSQvKrklW0bdfyzW1LF6', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiYlI5amVLTUoyZklTNzV3MVdUemxmQnh1UVI3OXM4QW9NQ3o5NnBrbSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMwOiJodHRwOi8vbG9jYWxob3N0L0hNUy9tZWRpY2luZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkaVJUc1JqelIuaEZ5RlhGRFRRQUIyT1dZeW5XT0V6Qkt2b0d0N1RPbXA5TDgud2V5eC4uTDIiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJGlSVHNSanpSLmhGeUZYRkRUUUFCMk9XWXluV09FekJLdm9HdDdUT21wOUw4LndleXguLkwyIjt9', 1627999702),
('d3Ymev783XLLumY19xW4abAsSLnp7kBCJBOFvG56', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiRkNlbTdhRlF1cjhlUlJsZGlqWWgxS0k2RXN6UXZTZGFMam5LWThzeiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMyOiJodHRwOi8vbG9jYWxob3N0L0hNUy9kZXBhcnRtZW50cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRpUlRzUmp6Ui5oRnlGWEZEVFFBQjJPV1l5bldPRXpCS3ZvR3Q3VE9tcDlMOC53ZXl4Li5MMiI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkaVJUc1JqelIuaEZ5RlhGRFRRQUIyT1dZeW5XT0V6Qkt2b0d0N1RPbXA5TDgud2V5eC4uTDIiO30=', 1628024626),
('Gz1RGE9ryBrsWI0zqNHbFGmwIOWFvQVENR7rWkkg', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiSm9XUXFhZlZCWjlMandTMEhqNlF5WkZXeFlQNGJxZ1B1V2RMZTZ2MSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ0OiJodHRwOi8vbG9jYWxob3N0L0hNUy9wYXJ0aWFsLXBheW1lbnQtYmlsbGluZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRpUlRzUmp6Ui5oRnlGWEZEVFFBQjJPV1l5bldPRXpCS3ZvR3Q3VE9tcDlMOC53ZXl4Li5MMiI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkaVJUc1JqelIuaEZ5RlhGRFRRQUIyT1dZeW5XT0V6Qkt2b0d0N1RPbXA5TDgud2V5eC4uTDIiO30=', 1629809849),
('Nc3nDkLiFG063VbvG4zhxgo94Bh5jltsh6PSGdos', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiOUp4aklIQkhwRjJ6Tnl2U0QxOUdpallNazVMZklNQVppbVpsUlY2ZCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI0OiJodHRwOi8vbG9jYWxob3N0L0hNUy9vcGQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkaVJUc1JqelIuaEZ5RlhGRFRRQUIyT1dZeW5XT0V6Qkt2b0d0N1RPbXA5TDgud2V5eC4uTDIiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJGlSVHNSanpSLmhGeUZYRkRUUUFCMk9XWXluV09FekJLdm9HdDdUT21wOUw4LndleXguLkwyIjt9', 1627937963),
('NLDJmecfMtXFlIRv9l5mWdzyaysRZsbtytUKbz8F', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibXBEYlE2NEpKSkdrZFBTQUE0djhYa1h5TmxPRnVnTXdaaDBXbm9CTCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9sb2NhbGhvc3QvSE1TL2xvZ2luIjt9fQ==', 1628589637),
('sOWNxjMeAmdjsYX879PXEis7XTYJJQ6nhzZKffJL', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoib1ZvV2FMUWxSZ1IwMktUMExqYXdsWXExelNkdTNPZ1AyTWdSMXg5eiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI0OiJodHRwOi8vbG9jYWxob3N0L0hNUy9vcGQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkaVJUc1JqelIuaEZ5RlhGRFRRQUIyT1dZeW5XT0V6Qkt2b0d0N1RPbXA5TDgud2V5eC4uTDIiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJGlSVHNSanpSLmhGeUZYRkRUUUFCMk9XWXluV09FekJLdm9HdDdUT21wOUw4LndleXguLkwyIjt9', 1628613193),
('Sps2WZEiwrpcUwT0msn8whq03PqyYwNsWRitwy0e', 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZm9DNEZoWXhyVzRQbENRd2tGRnBzM0thM0g5TmJnNzZFV09pUTFKNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9sb2NhbGhvc3QvSE1TL3JvbGVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJHhiaDY2bzRnSGJxT2wwNlBXN0RWTXVSak1NNFNXb0lNcUdnaFpIcGlGM2k2bTQwUFFmby4yIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCR4Ymg2Nm80Z0hicU9sMDZQVzdEVk11UmpNTTRTV29JTXFHZ2haSHBpRjNpNm00MFBRZm8uMiI7fQ==', 1628251363),
('YPZzRzin8iE4IHBefoh4k4IjUlDk7HPcgQQp2bVI', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiYTBoMzFLdE96dTJqWWRtUmxXcWM5TGlUandmUEhSUjlyWlkyUEdZRyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI0OiJodHRwOi8vbG9jYWxob3N0L0hNUy9vcGQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkaVJUc1JqelIuaEZ5RlhGRFRRQUIyT1dZeW5XT0V6Qkt2b0d0N1RPbXA5TDgud2V5eC4uTDIiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJGlSVHNSanpSLmhGeUZYRkRUUUFCMk9XWXluV09FekJLdm9HdDdUT21wOUw4LndleXguLkwyIjt9', 1629732542);

-- --------------------------------------------------------

--
-- Table structure for table `surgeries`
--

CREATE TABLE `surgeries` (
  `surgery_id` bigint(20) UNSIGNED NOT NULL,
  `surgery_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dep_id` bigint(20) UNSIGNED NOT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `referral_person` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surgeries`
--

INSERT INTO `surgeries` (`surgery_id`, `surgery_name`, `dep_id`, `author`, `referral_person`, `created_at`, `updated_at`) VALUES
(1, 'mustafa', 1, 1, NULL, '2021-05-20 13:35:41', '2021-05-20 13:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `test_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dep_id` bigint(20) UNSIGNED NOT NULL,
  `fees` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `role_id`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Mustafa Khan', 'mustafadeveloeper2@gmail.com', '2021-05-11 07:22:58', '$2y$10$iRTsRjzR.hFyFXFDTQAB2OWYynWOEzBKvoGt7TOmp9L8.weyx..L2', NULL, NULL, 'DaZNewt8HpgNYc2tLdHz8crMMpWkw1273LOrb3WzpH7Lb3U3MFCopXVwwnTI', 4, NULL, NULL, '2021-05-11 07:22:41', '2021-05-20 02:57:14'),
(3, 'Kamal Khan', 'mustafa@asaraglobal.com', '2021-05-20 02:53:55', '$2y$10$xbh66o4gHbqOl06PW7DVMuRjMM4SWoIMqGghZHpiF3i6m40PQfo.2', NULL, NULL, NULL, 6, NULL, NULL, '2021-05-20 02:31:11', '2021-05-20 03:08:18'),
(4, 'Mustafa Khan', 'mustafasadat338@gmail.com', NULL, '$2y$10$ewuU8Ku4YmhO7IpUwUhK2u39G5KwvlU213MSEZLt4pixIHYJtW20O', NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-20 14:01:57', '2021-06-20 14:01:57');

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE `visit` (
  `visit_id` bigint(20) UNSIGNED NOT NULL,
  `dep_id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` bigint(20) UNSIGNED NOT NULL,
  `opd_id` bigint(20) UNSIGNED NOT NULL,
  `fees` bigint(20) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visit`
--

INSERT INTO `visit` (`visit_id`, `dep_id`, `emp_id`, `opd_id`, `fees`, `description`, `status`, `author`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 3243, 'hhhh', 'Paid', 1, '2021-06-23 15:59:55', NULL),
(2, 1, 3, 1, 3243, 'klk', 'Paid', 1, '2021-06-23 16:02:29', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission_bills`
--
ALTER TABLE `admission_bills`
  ADD PRIMARY KEY (`admission_id`),
  ADD KEY `admission_bills_emp_id_foreign` (`emp_id`),
  ADD KEY `admission_bills_dep_id_foreign` (`dep_id`),
  ADD KEY `admission_bills_patient_id_foreign` (`patient_id`),
  ADD KEY `admission_bills_author_foreign` (`author`);

--
-- Indexes for table `admission_bill_infos`
--
ALTER TABLE `admission_bill_infos`
  ADD PRIMARY KEY (`bill_info`),
  ADD KEY `admission_bill_infos_admission_id_foreign` (`admission_id`),
  ADD KEY `admission_bill_infos_author_foreign` (`author`);

--
-- Indexes for table `appoinments`
--
ALTER TABLE `appoinments`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `appoinments_dep_id_foreign` (`dep_id`),
  ADD KEY `appoinments_emp_id_foreign` (`emp_id`),
  ADD KEY `appoinments_author_foreign` (`author`);

--
-- Indexes for table `births`
--
ALTER TABLE `births`
  ADD PRIMARY KEY (`id`),
  ADD KEY `births_user_id_foreign` (`user_id`);

--
-- Indexes for table `blood_donations`
--
ALTER TABLE `blood_donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blood_donations_user_id_foreign` (`user_id`);

--
-- Indexes for table `company_bills`
--
ALTER TABLE `company_bills`
  ADD PRIMARY KEY (`company_bill_id`),
  ADD KEY `company_bills_author_foreign` (`author`);

--
-- Indexes for table `deaths`
--
ALTER TABLE `deaths`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deaths_user_id_foreign` (`user_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dep_id`),
  ADD KEY `departments_author_foreign` (`author`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `employees_dep_id_foreign` (`dep_id`),
  ADD KEY `employees_author_foreign` (`author`);

--
-- Indexes for table `end_of_the_days`
--
ALTER TABLE `end_of_the_days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `end_of_the_days_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `finance`
--
ALTER TABLE `finance`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `finance_dep_id_foreign` (`dep_id`),
  ADD KEY `finance_author_foreign` (`author`);

--
-- Indexes for table `finance_logs`
--
ALTER TABLE `finance_logs`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `finance_logs_author_foreign` (`author`);

--
-- Indexes for table `lab_bills`
--
ALTER TABLE `lab_bills`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `lab_bills_patient_id_foreign` (`patient_id`),
  ADD KEY `lab_bills_emp_id_foreign` (`emp_id`),
  ADD KEY `lab_bills_dep_id_foreign` (`dep_id`),
  ADD KEY `lab_bills_author_foreign` (`author`);

--
-- Indexes for table `lab_bill_infos`
--
ALTER TABLE `lab_bill_infos`
  ADD PRIMARY KEY (`lab_bill_ifo_id`),
  ADD KEY `lab_bill_infos_bill_id_foreign` (`bill_id`),
  ADD KEY `lab_bill_infos_test_id_foreign` (`test_id`);

--
-- Indexes for table `lab_catagories`
--
ALTER TABLE `lab_catagories`
  ADD PRIMARY KEY (`lab_cat_id`);

--
-- Indexes for table `lab_materials`
--
ALTER TABLE `lab_materials`
  ADD PRIMARY KEY (`lab_m_id`),
  ADD KEY `lab_materials_lab_cat_id_foreign` (`lab_cat_id`),
  ADD KEY `lab_materials_author_foreign` (`author`);

--
-- Indexes for table `midicines`
--
ALTER TABLE `midicines`
  ADD PRIMARY KEY (`midi_id`),
  ADD KEY `midicines_ph_main_cat_id_foreign` (`ph_main_cat_id`),
  ADD KEY `midicines_author_foreign` (`author`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `nurse_bills`
--
ALTER TABLE `nurse_bills`
  ADD PRIMARY KEY (`nurse_bill_id`),
  ADD KEY `nurse_bills_emp_id_foreign` (`emp_id`),
  ADD KEY `nurse_bills_author_foreign` (`author`);

--
-- Indexes for table `opds`
--
ALTER TABLE `opds`
  ADD PRIMARY KEY (`opd_id`),
  ADD KEY `opds_dep_id_foreign` (`dep_id`),
  ADD KEY `opds_emp_id_foreign` (`emp_id`),
  ADD KEY `opds_author_foreign` (`author`);

--
-- Indexes for table `overtime_pays`
--
ALTER TABLE `overtime_pays`
  ADD PRIMARY KEY (`overtime_id`),
  ADD KEY `overtime_pays_emp_id_foreign` (`emp_id`),
  ADD KEY `overtime_pays_author_foreign` (`author`);

--
-- Indexes for table `partial_payment_billings`
--
ALTER TABLE `partial_payment_billings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partial_payment_billings_author_foreign` (`author`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `patients_dep_id_foreign` (`dep_id`),
  ADD KEY `patients_author_foreign` (`author`);

--
-- Indexes for table `patient_operations`
--
ALTER TABLE `patient_operations`
  ADD PRIMARY KEY (`patient_s_del_pro_id`),
  ADD KEY `patient_operations_procedure_id_foreign` (`procedure_id`),
  ADD KEY `patient_operations_surgery_id_foreign` (`surgery_id`),
  ADD KEY `patient_operations_patient_id_foreign` (`patient_id`),
  ADD KEY `patient_operations_dep_id_foreign` (`dep_id`),
  ADD KEY `patient_operations_emp_id_foreign` (`emp_id`),
  ADD KEY `patient_operations_author_foreign` (`author`);

--
-- Indexes for table `patient_test`
--
ALTER TABLE `patient_test`
  ADD PRIMARY KEY (`patient_test_id`),
  ADD KEY `patient_test_test_id_foreign` (`test_id`),
  ADD KEY `patient_test_dep_id_foreign` (`dep_id`),
  ADD KEY `patient_test_opd_id_foreign` (`opd_id`),
  ADD KEY `patient_test_author_foreign` (`author`);

--
-- Indexes for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `payrolls_author_foreign` (`author`),
  ADD KEY `payrolls_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pettycashes`
--
ALTER TABLE `pettycashes`
  ADD PRIMARY KEY (`cash_id`),
  ADD KEY `pettycashes_author_foreign` (`author`);

--
-- Indexes for table `pharma_bills`
--
ALTER TABLE `pharma_bills`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `pharma_bills_patient_id_foreign` (`patient_id`),
  ADD KEY `pharma_bills_emp_id_foreign` (`emp_id`),
  ADD KEY `pharma_bills_dep_id_foreign` (`dep_id`),
  ADD KEY `pharma_bills_author_foreign` (`author`);

--
-- Indexes for table `pharma_bill_infos`
--
ALTER TABLE `pharma_bill_infos`
  ADD PRIMARY KEY (`pharma_bill_ifo_id`),
  ADD KEY `pharma_bill_infos_bill_id_foreign` (`bill_id`),
  ADD KEY `pharma_bill_infos_midi_id_foreign` (`midi_id`);

--
-- Indexes for table `pharma__main__catagories`
--
ALTER TABLE `pharma__main__catagories`
  ADD PRIMARY KEY (`ph_main_cat_id`);

--
-- Indexes for table `procedures`
--
ALTER TABLE `procedures`
  ADD PRIMARY KEY (`procedure_id`),
  ADD KEY `procedures_dep_id_foreign` (`dep_id`),
  ADD KEY `procedures_author_foreign` (`author`);

--
-- Indexes for table `purchaselab_materials`
--
ALTER TABLE `purchaselab_materials`
  ADD PRIMARY KEY (`lab_purchase_id`),
  ADD KEY `purchaselab_materials_lab_m_id_foreign` (`lab_m_id`),
  ADD KEY `purchaselab_materials_author_foreign` (`author`);

--
-- Indexes for table `purchase_midicines`
--
ALTER TABLE `purchase_midicines`
  ADD PRIMARY KEY (`purchase_m_id`),
  ADD KEY `purchase_midicines_midi_id_foreign` (`midi_id`),
  ADD KEY `purchase_midicines_author_foreign` (`author`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `rooms_author_foreign` (`author`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `surgeries`
--
ALTER TABLE `surgeries`
  ADD PRIMARY KEY (`surgery_id`),
  ADD KEY `surgeries_dep_id_foreign` (`dep_id`),
  ADD KEY `surgeries_author_foreign` (`author`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_id`),
  ADD KEY `tests_dep_id_foreign` (`dep_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`visit_id`),
  ADD KEY `visit_dep_id_foreign` (`dep_id`),
  ADD KEY `visit_emp_id_foreign` (`emp_id`),
  ADD KEY `visit_opd_id_foreign` (`opd_id`),
  ADD KEY `visit_author_foreign` (`author`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission_bills`
--
ALTER TABLE `admission_bills`
  MODIFY `admission_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admission_bill_infos`
--
ALTER TABLE `admission_bill_infos`
  MODIFY `bill_info` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appoinments`
--
ALTER TABLE `appoinments`
  MODIFY `app_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `births`
--
ALTER TABLE `births`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blood_donations`
--
ALTER TABLE `blood_donations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_bills`
--
ALTER TABLE `company_bills`
  MODIFY `company_bill_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deaths`
--
ALTER TABLE `deaths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dep_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `end_of_the_days`
--
ALTER TABLE `end_of_the_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finance`
--
ALTER TABLE `finance`
  MODIFY `f_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `finance_logs`
--
ALTER TABLE `finance_logs`
  MODIFY `f_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `lab_bills`
--
ALTER TABLE `lab_bills`
  MODIFY `bill_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lab_bill_infos`
--
ALTER TABLE `lab_bill_infos`
  MODIFY `lab_bill_ifo_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_catagories`
--
ALTER TABLE `lab_catagories`
  MODIFY `lab_cat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lab_materials`
--
ALTER TABLE `lab_materials`
  MODIFY `lab_m_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `midicines`
--
ALTER TABLE `midicines`
  MODIFY `midi_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `nurse_bills`
--
ALTER TABLE `nurse_bills`
  MODIFY `nurse_bill_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `opds`
--
ALTER TABLE `opds`
  MODIFY `opd_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `overtime_pays`
--
ALTER TABLE `overtime_pays`
  MODIFY `overtime_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `partial_payment_billings`
--
ALTER TABLE `partial_payment_billings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient_operations`
--
ALTER TABLE `patient_operations`
  MODIFY `patient_s_del_pro_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient_test`
--
ALTER TABLE `patient_test`
  MODIFY `patient_test_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payrolls`
--
ALTER TABLE `payrolls`
  MODIFY `pay_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pettycashes`
--
ALTER TABLE `pettycashes`
  MODIFY `cash_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pharma_bills`
--
ALTER TABLE `pharma_bills`
  MODIFY `bill_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pharma_bill_infos`
--
ALTER TABLE `pharma_bill_infos`
  MODIFY `pharma_bill_ifo_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pharma__main__catagories`
--
ALTER TABLE `pharma__main__catagories`
  MODIFY `ph_main_cat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `procedures`
--
ALTER TABLE `procedures`
  MODIFY `procedure_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchaselab_materials`
--
ALTER TABLE `purchaselab_materials`
  MODIFY `lab_purchase_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_midicines`
--
ALTER TABLE `purchase_midicines`
  MODIFY `purchase_m_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `surgeries`
--
ALTER TABLE `surgeries`
  MODIFY `surgery_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `test_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visit`
--
ALTER TABLE `visit`
  MODIFY `visit_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admission_bills`
--
ALTER TABLE `admission_bills`
  ADD CONSTRAINT `admission_bills_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `admission_bills_dep_id_foreign` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`dep_id`),
  ADD CONSTRAINT `admission_bills_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`),
  ADD CONSTRAINT `admission_bills_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`);

--
-- Constraints for table `admission_bill_infos`
--
ALTER TABLE `admission_bill_infos`
  ADD CONSTRAINT `admission_bill_infos_admission_id_foreign` FOREIGN KEY (`admission_id`) REFERENCES `admission_bills` (`admission_id`),
  ADD CONSTRAINT `admission_bill_infos_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`);

--
-- Constraints for table `appoinments`
--
ALTER TABLE `appoinments`
  ADD CONSTRAINT `appoinments_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `appoinments_dep_id_foreign` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`dep_id`),
  ADD CONSTRAINT `appoinments_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`);

--
-- Constraints for table `births`
--
ALTER TABLE `births`
  ADD CONSTRAINT `births_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `blood_donations`
--
ALTER TABLE `blood_donations`
  ADD CONSTRAINT `blood_donations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `company_bills`
--
ALTER TABLE `company_bills`
  ADD CONSTRAINT `company_bills_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`);

--
-- Constraints for table `deaths`
--
ALTER TABLE `deaths`
  ADD CONSTRAINT `deaths_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `employees_dep_id_foreign` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`dep_id`);

--
-- Constraints for table `end_of_the_days`
--
ALTER TABLE `end_of_the_days`
  ADD CONSTRAINT `end_of_the_days_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `finance`
--
ALTER TABLE `finance`
  ADD CONSTRAINT `finance_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `finance_dep_id_foreign` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`dep_id`);

--
-- Constraints for table `finance_logs`
--
ALTER TABLE `finance_logs`
  ADD CONSTRAINT `finance_logs_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`);

--
-- Constraints for table `lab_bills`
--
ALTER TABLE `lab_bills`
  ADD CONSTRAINT `lab_bills_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `lab_bills_dep_id_foreign` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`dep_id`),
  ADD CONSTRAINT `lab_bills_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`),
  ADD CONSTRAINT `lab_bills_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`);

--
-- Constraints for table `lab_bill_infos`
--
ALTER TABLE `lab_bill_infos`
  ADD CONSTRAINT `lab_bill_infos_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `lab_bills` (`bill_id`),
  ADD CONSTRAINT `lab_bill_infos_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`test_id`);

--
-- Constraints for table `lab_materials`
--
ALTER TABLE `lab_materials`
  ADD CONSTRAINT `lab_materials_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `lab_materials_lab_cat_id_foreign` FOREIGN KEY (`lab_cat_id`) REFERENCES `lab_catagories` (`lab_cat_id`);

--
-- Constraints for table `midicines`
--
ALTER TABLE `midicines`
  ADD CONSTRAINT `midicines_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `midicines_ph_main_cat_id_foreign` FOREIGN KEY (`ph_main_cat_id`) REFERENCES `pharma__main__catagories` (`ph_main_cat_id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nurse_bills`
--
ALTER TABLE `nurse_bills`
  ADD CONSTRAINT `nurse_bills_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `nurse_bills_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`);

--
-- Constraints for table `opds`
--
ALTER TABLE `opds`
  ADD CONSTRAINT `opds_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `opds_dep_id_foreign` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`dep_id`),
  ADD CONSTRAINT `opds_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`);

--
-- Constraints for table `overtime_pays`
--
ALTER TABLE `overtime_pays`
  ADD CONSTRAINT `overtime_pays_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `overtime_pays_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`);

--
-- Constraints for table `partial_payment_billings`
--
ALTER TABLE `partial_payment_billings`
  ADD CONSTRAINT `partial_payment_billings_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`);

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `patients_dep_id_foreign` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`dep_id`);

--
-- Constraints for table `patient_operations`
--
ALTER TABLE `patient_operations`
  ADD CONSTRAINT `patient_operations_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `patient_operations_dep_id_foreign` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`dep_id`),
  ADD CONSTRAINT `patient_operations_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`),
  ADD CONSTRAINT `patient_operations_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`),
  ADD CONSTRAINT `patient_operations_procedure_id_foreign` FOREIGN KEY (`procedure_id`) REFERENCES `procedures` (`procedure_id`),
  ADD CONSTRAINT `patient_operations_surgery_id_foreign` FOREIGN KEY (`surgery_id`) REFERENCES `surgeries` (`surgery_id`);

--
-- Constraints for table `patient_test`
--
ALTER TABLE `patient_test`
  ADD CONSTRAINT `patient_test_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `patient_test_dep_id_foreign` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`dep_id`),
  ADD CONSTRAINT `patient_test_opd_id_foreign` FOREIGN KEY (`opd_id`) REFERENCES `opds` (`opd_id`),
  ADD CONSTRAINT `patient_test_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`test_id`);

--
-- Constraints for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD CONSTRAINT `payrolls_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `payrolls_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`);

--
-- Constraints for table `pettycashes`
--
ALTER TABLE `pettycashes`
  ADD CONSTRAINT `pettycashes_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`);

--
-- Constraints for table `pharma_bills`
--
ALTER TABLE `pharma_bills`
  ADD CONSTRAINT `pharma_bills_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pharma_bills_dep_id_foreign` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`dep_id`),
  ADD CONSTRAINT `pharma_bills_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`),
  ADD CONSTRAINT `pharma_bills_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`);

--
-- Constraints for table `pharma_bill_infos`
--
ALTER TABLE `pharma_bill_infos`
  ADD CONSTRAINT `pharma_bill_infos_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `pharma_bills` (`bill_id`),
  ADD CONSTRAINT `pharma_bill_infos_midi_id_foreign` FOREIGN KEY (`midi_id`) REFERENCES `midicines` (`midi_id`);

--
-- Constraints for table `procedures`
--
ALTER TABLE `procedures`
  ADD CONSTRAINT `procedures_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `procedures_dep_id_foreign` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`dep_id`);

--
-- Constraints for table `purchaselab_materials`
--
ALTER TABLE `purchaselab_materials`
  ADD CONSTRAINT `purchaselab_materials_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `purchaselab_materials_lab_m_id_foreign` FOREIGN KEY (`lab_m_id`) REFERENCES `lab_materials` (`lab_m_id`);

--
-- Constraints for table `purchase_midicines`
--
ALTER TABLE `purchase_midicines`
  ADD CONSTRAINT `purchase_midicines_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `purchase_midicines_midi_id_foreign` FOREIGN KEY (`midi_id`) REFERENCES `midicines` (`midi_id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`);

--
-- Constraints for table `surgeries`
--
ALTER TABLE `surgeries`
  ADD CONSTRAINT `surgeries_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `surgeries_dep_id_foreign` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`dep_id`);

--
-- Constraints for table `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_dep_id_foreign` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`dep_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `visit`
--
ALTER TABLE `visit`
  ADD CONSTRAINT `visit_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `visit_dep_id_foreign` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`dep_id`),
  ADD CONSTRAINT `visit_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`),
  ADD CONSTRAINT `visit_opd_id_foreign` FOREIGN KEY (`opd_id`) REFERENCES `opds` (`opd_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
