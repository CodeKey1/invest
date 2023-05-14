-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 10:34 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `investment`
--

-- --------------------------------------------------------

--
-- Table structure for table `request_technical_decision`
--

CREATE TABLE `request_technical_decision` (
  `id` int(11) NOT NULL,
  `note` varchar(256) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `request_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_technical_decision`
--

INSERT INTO `request_technical_decision` (`id`, `note`, `date`, `request_id`, `created_at`, `updated_at`) VALUES
(1, 'asd', '2023-05-11', 23, '2023-05-11 09:39:29', '2023-05-11 09:39:29'),
(2, 'asdasd', '2023-05-11', 23, '2023-05-11 09:40:22', '2023-05-11 09:40:22'),
(3, 'asdasd', '2023-05-11', 23, '2023-05-11 09:53:54', '2023-05-11 09:53:54'),
(5, 'ads', '2023-05-11', 22, '2023-05-11 09:55:29', '2023-05-11 09:55:29'),
(6, 'dsaf', '2023-05-11', 22, '2023-05-11 09:56:36', '2023-05-11 09:56:36'),
(7, 'asdf', '2023-05-11', 22, '2023-05-11 09:56:40', '2023-05-11 09:56:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `request_technical_decision`
--
ALTER TABLE `request_technical_decision`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_id` (`request_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `request_technical_decision`
--
ALTER TABLE `request_technical_decision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `request_technical_decision`
--
ALTER TABLE `request_technical_decision`
  ADD CONSTRAINT `request_technical_decision_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `request` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
