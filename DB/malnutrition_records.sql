-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2024 at 02:15 AM
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
-- Database: `malnutrition_records`
--

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `weight` decimal(5,2) NOT NULL,
  `bmi` decimal(5,2) NOT NULL,
  `severity` enum('Moderate','Severe') NOT NULL,
  `height` decimal(5,2) NOT NULL,
  `status` enum('normal','underweight','overweight','severe') NOT NULL DEFAULT 'normal',
  `barangay` varchar(255) NOT NULL,
  `last_intervention_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`id`, `name`, `age`, `gender`, `weight`, `bmi`, `severity`, `height`, `status`, `barangay`, `last_intervention_date`, `created_at`, `updated_at`) VALUES
(21, 'Rose Sanchez', 9, 'Male', 4.00, 6.30, 'Moderate', 80.00, 'underweight', 'Sta. Cruz, Virac, Catanduanes', '2024-11-25', '2024-11-22 01:31:33', '2024-11-22 01:31:33'),
(22, 'Jean Doe', 23, 'Male', 9.00, 8.20, 'Moderate', 105.00, 'underweight', 'Francia, Virac, Catanduanes', '2024-01-02', '2024-11-22 01:36:21', '2024-11-22 01:36:21'),
(23, 'Yoh Asakura', 3, 'Male', 6.00, 16.10, '', 61.00, 'normal', 'Sta. Cruz, Virac, Catanduanes', '2024-11-01', '2024-11-22 01:38:34', '2024-11-22 01:38:34'),
(24, 'Naruto Uzumaki', 24, 'Male', 14.00, 18.10, 'Severe', 88.00, 'overweight', 'Rawis, Virac, Catanduanes', '2024-11-06', '2024-11-22 01:40:48', '2024-11-22 01:40:48'),
(25, 'Yami Sukehiro', 4, 'Male', 5.50, 16.30, '', 58.00, 'normal', 'Rawis, Virac, Catanduanes', '2024-04-04', '2024-11-22 01:44:11', '2024-11-22 01:44:11'),
(26, 'Jinbei', 32, 'Male', 23.00, 434.80, 'Severe', 23.00, 'overweight', 'Rawis, Virac, Catanduanes', '2024-11-20', '2024-11-22 02:34:53', '2024-11-22 02:34:53'),
(27, 'Louis Armbag', 5, 'Female', 5.50, 16.30, '', 58.00, 'normal', 'Sta. Elena, Virac, Catanduanes', '2024-11-27', '2024-11-22 02:55:30', '2024-11-27 01:09:21'),
(29, 'John Kalbo Cruz', 5, 'Male', 5.50, 16.30, '', 58.00, 'normal', 'Francia, Virac, Catanduanes', '2024-11-27', '2024-11-25 10:03:27', '2024-11-27 01:08:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `created_at`) VALUES
(2, '', 'doee', '$2y$10$fEbCdE5gYQ.9oqAhPvGTeOiN1NMwU.3Ffd/K4sKU63Dg0MoXajZGG', 'user', '2024-11-21 09:14:18'),
(3, '', 'smith', '$2y$10$sIkgT9r7isG3HR8x/kEhmu4zUEegDmoAPLztnAt1Fi90D88jKuB82', 'user', '2024-11-21 09:49:20'),
(4, '', 'kalbo', '$2y$10$rceGsg9ir/wLR5HyxXiA8.RQFkgIYYOWpohvNCaHqHNeCl2Ax22q6', 'user', '2024-11-21 10:08:33'),
(5, '', 'USER', '$2y$10$PAtWCsKV27resZSgDxtkEOVYYx9i87XQM9Sw624.EEeWzMWAhaKGO', 'user', '2024-11-22 00:26:32'),
(6, '', 'kalbo23', '$2y$10$OMEn0RSoEM87L41L/s9NrO1vDUl0.SM9V9tcxvXkn3xlQ92ZhixIi', 'user', '2024-11-25 11:36:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
