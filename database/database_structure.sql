-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2026 at 05:49 PM
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
-- Database: `hospital_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE `appointments` (
  `appointment_id` int(11) DEFAULT NULL,
  `schedule` text DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `visit_type` text DEFAULT NULL,
  `symptoms` text DEFAULT NULL,
  `addnotes` text DEFAULT NULL,
  `status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `schedule`, `patient_id`, `doctor_id`, `visit_type`, `symptoms`, `addnotes`, `status`) VALUES
(1, '2026-06-10 09:00:00', 1, 1, 'In Person', 'Chest pain and shortness of breath', 'Symptoms started 3 days ago', 'Completed'),
(2, '2026-06-11 10:30:00', 2, 2, 'In Person', 'Fever and cough', 'Possible flu exposure', 'Completed'),
(3, '2026-06-12 13:00:00', 4, 3, 'Teleconsult', 'Skin rash on arms', 'Possible allergic reaction', 'Completed'),
(4, '2026-06-15 09:30:00', 10, 1, 'Teleconsult', 'Blood pressure monitoring', 'Follow-up visit', 'Completed'),
(5, '2026-06-21 11:00:00', 5, 1, 'In Person', 'High blood pressure', 'Routine checkup', 'Pending'),
(6, '2026-06-20 14:00:00', 3, 4, 'Teleconsult', 'Right knee pain', 'Basketball injury', 'Pending'),
(7, '2026-06-18 10:00:00', 10, 2, 'In Person', 'Follow-up for flu recovery', 'Patient feeling better', 'Completed'),
(8, '2026-06-19 13:00:00', 4, 3, 'Teleconsult', 'Follow-up skin assessment', 'Rash significantly improved', 'Completed'),
(9, '2026-06-08 15:00:00', 3, 4, 'In Person', 'Lower back pain', 'Pain after lifting heavy objects', 'Cancelled'),
(10, '2026-06-25 09:00:00', 5, 1, 'In Person', 'Dizziness and headache', 'Patient reports stress at work', 'Pending'),
(11, '2026-06-26 14:00:00', 1, 3, 'Teleconsult', 'Fever for 3 days', '', 'Pending'),
(12, '2026-06-24 14:00:00', 1, 3, 'In Person', 'd', '', 'Pending'),
(13, '2026-06-26 15:00:00', 2, 6, 'In Person', 'My skins are breaking out!', 'Please see me immediately', 'Pending'),
(14, '2026-07-02 10:00:00', 9, 1, 'In Person', 'i am sick', '', 'Pending'),
(15, '2026-06-26 15:00:00', 10, 3, 'In Person', 'cough', '', 'Pending'),
(16, '2026-07-01 10:00:00', 4, 7, 'Teleconsult', 'my bone hurt :<', 'i danced and tripped my ankle', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE `doctors` (
  `doctor_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `specialization` text DEFAULT NULL,
  `department` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `name`, `specialization`, `department`, `phone`, `email`, `password`, `status`) VALUES
(1, 'John Martin O. Doe', 'Surgeon', 'General Surgery', '09387654321', 'jmartin@pupcare.com', 'password123', 'On Duty'),
(2, 'Nicole Mae S.  Reeyn', 'Dermatologist', 'Dermatology', '09407654321', 'nmae@pupcare.com', 'password123', 'On Duty'),
(3, 'Alice C. Santos', 'Pediatrician', 'Pediatrics', '09427654321', 'alice@pupcare.com', 'password123', 'On Leave'),
(4, 'Sarah Jean P. Lopez', 'Cardiologist', 'Cardiology', '09981234567', 'sarah@pupcarecom', 'password123', 'On Duty'),
(5, 'Michael Joshua A. Santos', 'Pediatrician', 'Pediatrics', '09981234568', 'michael@pupcare.com', 'password123', 'On Duty'),
(6, 'Karen Louise S. Lim', 'Dermatologist', 'Dermatology', '09981234569', 'karen@pupcare.com', 'password123', 'On Duty'),
(7, 'David Michael R. Ong', 'Orthopedic Surgeon', 'Orthopedics', '09981234570', 'david@pupcare.com', 'password123', 'On Duty');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
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

DROP TABLE IF EXISTS `jobs`;
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

DROP TABLE IF EXISTS `job_batches`;
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
-- Table structure for table `medical_records`
--

DROP TABLE IF EXISTS `medical_records`;
CREATE TABLE `medical_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` int(11) NOT NULL,
  `age` varchar(255) NOT NULL,
  `condition_summary` varchar(255) NOT NULL,
  `consultation_notes` text NOT NULL,
  `prescription` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `med_records`
--

DROP TABLE IF EXISTS `med_records`;
CREATE TABLE `med_records` (
  `record_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `date` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `summary` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `med_records`
--

INSERT INTO `med_records` (`record_id`, `patient_id`, `doctor_id`, `date`, `type`, `summary`) VALUES
(1, 1, 6, '2026-06-19', 'Consultation', 'Patient to have another checkup next week.'),
(2, 1, 3, '2026-06-21', 'Follow-up', 'Patient has UTI.'),
(3, 2, 4, '2026-06-20', 'Follow-up', 'Chest is clear.'),
(4, 10, 1, '2026-06-10', 'Consultation', 'Patient reported chest pain and shortness of breath. Diagnosed with mild hypertension.'),
(5, 10, 1, '2026-06-15', 'Follow-up', 'Blood pressure improved after medication. Continue treatment.'),
(6, 2, 2, '2026-06-11', 'Consultation', 'Patient diagnosed with seasonal flu. Advised rest and hydration.'),
(7, 2, 2, '2026-06-18', 'Follow-up', 'Symptoms resolved. Cleared for normal activities.'),
(8, 3, 4, '2026-06-20', 'Orthopedic Evaluation', 'Right knee strain from basketball injury. Recommended physical therapy.'),
(9, 10, 3, '2026-06-12', 'Dermatology Checkup', 'Allergic skin rash confirmed. Prescribed antihistamine medication.'),
(10, 10, 3, '2026-06-19', 'Follow-up', 'Skin condition significantly improved.'),
(11, 4, 1, '2026-05-28', 'Cardiology Follow-up', 'Monitoring hypertension. Medication effective.'),
(12, 5, 1, '2026-06-16', 'Routine Checkup', 'Blood pressure stable. Continue current prescription.');



DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000001_create_medical_records_table', 1),
(4, '0001_01_01_000002_create_appointments_table', 1),
(5, '0001_01_01_000002_create_jobs_table', 1),
(6, '2026_06_20_115024_create_hospital_tables', 2);


DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



DROP TABLE IF EXISTS `patients`;
CREATE TABLE `patients` (
  `patient_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `dob` text DEFAULT NULL,
  `phone_no` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `patients` (`patient_id`, `name`, `gender`, `dob`, `phone_no`, `address`, `email`) VALUES
(1, 'Amihan R. Batumbakal', 'Female', '1990-10-02', '09121234567', 'La Union', 'amihan@yahoo.com'),
(2, 'Pirena S. Cruz', 'Female', '1991-02-09', '09131234567', 'Pampanga', 'pirenacruzz@gmail.com'),
(3, 'Alena T. Trismegistus', 'Female', '1996-11-17', '09141234567', 'Cainta', 'alenatrismegistus@gmail.com'),
(4, 'Danaya H. Maria Clara', 'Female', '1985-02-02', '09151234567', 'Rodriguez', 'hotmariaclara@gmail.com'),
(5, 'John A. Smith', 'Male', '1995-03-15', '09171234567', 'Manila', 'john.smith@email.com'),
(6, 'Maria Lorraine E. Garcia', 'Female', '1988-07-22', '09181234567', 'Quezon City', 'maria@gmail.com'),
(7, 'James Bond I. Reyes', 'Male', '2000-01-10', '09191234567', 'Pasig', 'james@gmail.com'),
(8, 'Angela Regen P. Cruz', 'Female', '1997-09-05', '09201234567', 'Makati', 'angela@email.com'),
(9, 'Robert Roberto S. Tan', 'Male', '1985-12-01', '09211234567', 'Taguig', 'robert@email.com'),
(10, 'Anastasia L. Megistus', 'Female', '2004-03-12', '09221234567', 'Antipolo City', 'anastasia@gmail.com');



DROP TABLE IF EXISTS `prescriptions`;
CREATE TABLE `prescriptions` (
  `prescription_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `medication` text DEFAULT NULL,
  `dosage` text DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `instruction` text DEFAULT NULL,
  `refills_left` int(11) DEFAULT NULL,
  `start_date` text DEFAULT NULL,
  `end_date` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `prescriptions` (`prescription_id`, `patient_id`, `doctor_id`, `medication`, `dosage`, `quantity`, `instruction`, `refills_left`, `start_date`, `end_date`) VALUES
(1, 2, 3, 'Vitamins', '10mg', 10, 'Take 1 tablet every day.', 3, '2026-05-22', ''),
(2, 2, 2, 'Paracetamol', '20mg', 3, 'Take 1 capsule every 8 hours.', 1, '2026-05-22', ''),
(3, 3, 1, 'Fish Oil', '5mg', 25, 'Take medication once a day after lunch.', 2, '2026-05-23', ''),
(4, 10, 5, 'Lutein', '5mg', 20, 'Take 1 capsule every 12 hours.', 0, '2026-05-23', '2026-06-17'),
(16, 10, 1, 'Amlodipine', '5mg', 30, 'Take 1 tablet once daily after breakfast.', 2, '2026-05-24', ''),
(17, 10, 1, 'Aspirin', '81mg', 30, 'Take 1 tablet once daily with food.', 1, '2026-05-27', ''),
(18, 2, 2, 'Paracetamol', '500mg', 20, 'Take 1 tablet every 6 hours as needed for fever.', 0, '2026-05-27', '2026-06-16'),
(19, 10, 2, 'Cetirizine', '10mg', 10, 'Take 1 tablet once daily before bedtime.', 0, '2026-06-02', '2026-06-12'),
(20, 3, 4, 'Ibuprofen', '400mg', 15, 'Take 1 tablet every 8 hours after meals.', 1, '2026-06-02', ''),
(21, 3, 4, 'Diclofenac Gel', '1%', 1, 'Apply to affected knee 3 times daily.', 0, '2026-06-04', '2026-06-04'),
(22, 4, 3, 'Cetirizine', '10mg', 14, 'Take 1 tablet once daily before bedtime.', 1, '2026-06-07', ''),
(23, 4, 3, 'Hydrocortisone Cream', '1%', 1, 'Apply thin layer to affected area twice daily.', 0, '2026-06-07', '2026-06-07'),
(24, 5, 1, 'Losartan', '50mg', 30, 'Take 1 tablet every morning.', 3, '2026-06-09', ''),
(25, 5, 1, 'Amlodipine', '5mg', 30, 'Take 1 tablet every evening.', 2, '2026-06-10', ''),
(26, 5, 1, 'Atorvastatin', '20mg', 30, 'Take 1 tablet before bedtime.', 3, '2026-06-12', '');




DROP TABLE IF EXISTS `rooms`;
CREATE TABLE `rooms` (
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `room_number` varchar(255) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `sessions`;
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
('8atClM7ysHq96YylB31jFzX1DnuuwMNWmfUuwMre', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUjdUUUFNTHJ1aE9Zc2lBRlpwNWRTQkJGY1dINjNpeDluQkZJTktlNSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wYXRpZW50LzMvc2V0LWFwcG9pbnRtZW50IjtzOjU6InJvdXRlIjtzOjE5OiJwYXRpZW50LmFwcG9pbnRtZW50Ijt9fQ==', 1782315980);



DROP TABLE IF EXISTS `users`;
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



INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'PUPCare1 Admin', 'admin1@pupcare.com', NULL, '$2y$12$BrSOWZrGJCypQIWJouxlU.73ojNdkmy5enH/US.EQx4xCY7F/RWX6', NULL, '2026-06-24 06:40:44', '2026-06-24 06:40:44');



DROP TABLE IF EXISTS `visit_types`;
CREATE TABLE `visit_types` (
  `visit_type` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);


ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);


ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);


ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `medical_records`
  ADD PRIMARY KEY (`id`);
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);


ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

ALTER TABLE `visit_types`
  ADD PRIMARY KEY (`visit_type`);

ALTER TABLE `admins`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;


ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_records`
--
ALTER TABLE `medical_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
