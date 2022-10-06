-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2022 at 06:46 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_data`
--

CREATE TABLE `booking_data` (
  `participation_id` int(11) NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `employee_mail` varchar(255) NOT NULL,
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `participation_fee` float NOT NULL,
  `event_date` date NOT NULL,
  `version` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_data`
--

INSERT INTO `booking_data` (`participation_id`, `employee_name`, `employee_mail`, `event_id`, `event_name`, `participation_fee`, `event_date`, `version`, `created_at`) VALUES
(1, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', 0, '2019-09-04', '', '2022-10-05 13:39:59'),
(2, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 2, 'International PHP Conference', 1485.99, '2019-10-21', '', '2022-10-05 13:40:49'),
(3, 'Leandro Bußmann', 'leandro.bussmann@no-reply.rexx-systems.com', 2, 'International PHP Conference', 657.5, '2019-10-21', '', '2022-10-05 13:41:43'),
(4, 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', 0, '2019-09-04', '', '2022-10-05 13:46:31'),
(5, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', 0, '2019-09-04', '', '2022-10-05 18:52:03'),
(6, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', 2, 'International PHP Conference', 657.5, '2019-10-21', '', '2022-10-05 18:53:04'),
(7, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 3, 'code.talks', 474.81, '2019-10-24', '', '2022-10-05 18:53:47'),
(8, 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-systems.com', 3, 'code.talks', 534.31, '2019-10-24', '1.1.3', '2022-10-05 18:54:39');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `created_at`) VALUES
(1, 'PHP 7 crash course', '2022-10-05 06:09:59'),
(2, 'International PHP Conference', '2022-10-05 06:09:59'),
(3, 'code.talks', '2022-10-05 06:10:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_data`
--
ALTER TABLE `booking_data`
  ADD PRIMARY KEY (`participation_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_data`
--
ALTER TABLE `booking_data`
  MODIFY `participation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
