-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2023 at 03:52 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wms`
--

-- --------------------------------------------------------

--
-- Table structure for table `pallet_informations`
--

CREATE TABLE `pallet_informations` (
  `pallet_info_id` int(6) NOT NULL,
  `pallet_id` int(6) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `brand` varchar(60) DEFAULT NULL,
  `series` varchar(60) DEFAULT NULL,
  `model` varchar(60) DEFAULT NULL,
  `generation` varchar(60) DEFAULT NULL,
  `screen_size` double(3,2) NOT NULL,
  `serial_no` varchar(160) DEFAULT NULL,
  `qty` int(6) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_user` varchar(5) DEFAULT NULL,
  `user_role` varchar(5) DEFAULT NULL,
  `department` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pallet_informations`
--
ALTER TABLE `pallet_informations`
  ADD PRIMARY KEY (`pallet_info_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pallet_informations`
--
ALTER TABLE `pallet_informations`
  MODIFY `pallet_info_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
