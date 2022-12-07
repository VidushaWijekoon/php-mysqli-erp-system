-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 07, 2022 at 09:14 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

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
-- Table structure for table `e_com_inventory`
--

DROP TABLE IF EXISTS `e_com_inventory`;
CREATE TABLE IF NOT EXISTS `e_com_inventory` (
  `e_com_inventory_id` int NOT NULL AUTO_INCREMENT,
  `device` varchar(15) NOT NULL,
  `brand` varchar(15) NOT NULL,
  `core` varchar(10) NOT NULL,
  `generation` int NOT NULL,
  `model` varchar(15) NOT NULL,
  `hdd_capacity` varchar(10) NOT NULL,
  `hdd_type` varchar(10) NOT NULL,
  `mfg` varchar(40) NOT NULL,
  `ram_capacity` int NOT NULL,
  `touch` varchar(20) NOT NULL,
  `screen_size` varchar(5) NOT NULL,
  `sales_order_id` int NOT NULL,
  `screen_resolution` varchar(40) NOT NULL,
  `camera` varchar(6) NOT NULL,
  `dvd` varchar(6) NOT NULL,
  `keyboard_backlight` varchar(6) NOT NULL,
  `os` varchar(30) NOT NULL,
  `packing_by` varchar(40) NOT NULL,
  `packing_date` datetime NOT NULL,
  `sales_type` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'e_commerce',
  `dispatch` int NOT NULL,
  `platform` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
  `warehouse_type` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `location` varchar(40) NOT NULL,
  `graphic_type` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  PRIMARY KEY (`e_com_inventory_id`)
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `e_com_inventory`
--

INSERT INTO `e_com_inventory` (`e_com_inventory_id`, `device`, `brand`, `core`, `generation`, `model`, `hdd_capacity`, `hdd_type`, `mfg`, `ram_capacity`, `touch`, `screen_size`, `sales_order_id`, `screen_resolution`, `camera`, `dvd`, `keyboard_backlight`, `os`, `packing_by`, `packing_date`, `sales_type`, `dispatch`, `platform`, `warehouse_type`, `location`, `graphic_type`, `color`) VALUES
(1, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0UA6WT', 8, 'no', '14', 1012, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', 'admin', '2022-12-04 19:56:53', 'e_commerce', 1, '0', '', '', '', ''),
(2, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0UA6WT', 8, 'no', '14', 1012, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 1, '0', '', '', '', ''),
(3, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0TP1R8', 8, 'no', '14', 20, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(4, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0VTS56', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(5, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0VTS4V', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(6, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF123ETP', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(7, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0ZK8R8', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(8, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0UVPPL', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(9, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0ZXSH1', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(10, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0ZK6GE', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(11, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0ZJZBC', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(12, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0TL39P', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'amazon uae', 'Amazon Warehouse UAE', '', '', ''),
(13, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF123HKX', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'amazon uae', 'Amazon Warehouse UAE', '', '', ''),
(14, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0ZJX76', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'amazon uae', 'Amazon Warehouse UAE', '', '', ''),
(15, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0TNXEF', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'amazon uae', 'Amazon Warehouse UAE', '', '', ''),
(16, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0ZXYDR', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'amazon uae', 'Amazon Warehouse UAE', '', '', ''),
(17, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0TQUGE', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'amazon uae', 'Amazon Warehouse UAE', '', '', ''),
(18, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0ZK6FU', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'amazon uae', 'Amazon Warehouse UAE', '', '', ''),
(19, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0VTZ9Y', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'Noon', 'Noon Warehouse', '', '', ''),
(20, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0UB4CN', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'Noon', 'Noon Warehouse', '', '', ''),
(21, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0ZY1LG', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'Noon', 'Noon Warehouse', '', '', ''),
(22, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0UB7GN', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'Noon', 'Noon Warehouse', '', '', ''),
(23, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0VTTM3', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'Noon', 'Noon Warehouse', '', '', ''),
(24, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0TU10M', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'noon', 'Alsakb Noon Warehouse', '', '', ''),
(25, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF17KK9S', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'noon', 'Alsakb Noon Warehouse', '', '', ''),
(26, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0TP1Q5', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'noon', 'Alsakb Noon Warehouse', '', '', ''),
(27, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0VTVRR', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'noon', 'Alsakb Noon Warehouse', '', '', ''),
(28, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0UAEE4', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'noon', 'Alsakb Noon Warehouse', '', '', ''),
(29, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF10RKPK', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'noon', 'Alsakb Noon Warehouse', '', '', ''),
(30, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0ZJX90', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'Noon', 'Alsakb Noon Warehouse', '', '', ''),
(31, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0TP3VC', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'Noon', 'Alsakb Noon Warehouse', '', '', ''),
(32, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0VTUQF', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'Noon', 'Alsakb Noon Warehouse', '', '', ''),
(33, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0VSR20', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'Noon', 'Alsakb Noon Warehouse', '', '', ''),
(34, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0ZMU6S', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'Noon', 'Alsakb Noon Warehouse', '', '', ''),
(35, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0WLYTF', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'Noon', 'Alsakb Noon Warehouse', '', '', ''),
(36, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF123JRT', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'Noon', 'Alsakb Noon Warehouse', '', '', ''),
(37, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF10XE2Q', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'Noon', 'Alsakb Noon Warehouse', '', '', ''),
(38, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0TU11D', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'Noon', 'Noon Warehouse', '', '', ''),
(39, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0ZJZA1', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'Noon', 'Noon Warehouse', '', '', ''),
(40, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0TNXDQ', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'Noon', 'Noon Warehouse', '', '', ''),
(41, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0UWEMT', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'Noon', 'Noon Warehouse', '', '', ''),
(42, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0UA9J4', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'Noon', 'Noon Warehouse', '', '', ''),
(43, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0W7SVL', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'Noon', 'Alsakb Noon Warehouse', '', '', ''),
(44, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF12PNPZ', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'Noon', 'Alsakb Noon Warehouse', '', '', ''),
(45, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0T5J0J', 8, 'no', '14', 0, '1600 x 900', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'Noon', 'Alsakb Noon Warehouse', '', '', ''),
(46, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0TTUL2', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'Noon', 'Alsakb Noon Warehouse', '', '', ''),
(47, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0RA42T', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'Noon', 'Alsakb Noon Warehouse', '', '', ''),
(48, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF10X5W8', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'Noon', 'Alsakb Noon Warehouse', '', '', ''),
(49, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0TUSLR', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'Noon', 'Alsakb Noon Warehouse', '', '', ''),
(50, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0RA43N', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'Noon', 'Alsakb Noon Warehouse', '', '', ''),
(51, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0UBHLL', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'Noon', 'Alsakb Noon Warehouse', '', '', ''),
(52, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF10X93P', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'Noon', 'Alsakb Noon Warehouse', '', '', ''),
(53, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0TUL5A', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'cartlow', 'Alsakb Cartlow Warehouse', '', '', ''),
(54, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF11RKSY', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'cartlow', 'Alsakb Cartlow Warehouse', '', '', ''),
(55, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF10XE3F', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'noon', 'Alsakb Noon Warehouse', '', '', ''),
(56, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0VTZ8U', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'noon', 'Alsakb Noon Warehouse', '', '', ''),
(57, 'laptop', 'lenovo', 'i5', 7, 'T470', '256gb', 'ssd', 'PF0ZJZBJ', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'cartlow', 'Alsakb Cartlow Warehouse', '', '', ''),
(58, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0UA6WT', 8, 'no', '14', 1012, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(59, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0TP1R8', 8, 'no', '14', 20, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(60, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0VTS56', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(61, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0VTS4V', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(62, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF123ETP', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(63, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0ZK8R8', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(64, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0UVPPL', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(65, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0ZXSH1', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(66, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0ZK6GE', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(67, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0ZJZBC', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(68, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0TL39P', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(69, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF123HKX', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(70, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0ZJX76', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(71, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0TNXEF', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(72, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0ZXYDR', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(73, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0TQUGE', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(74, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0ZK6FU', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(75, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0VTZ9Y', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(76, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0UB4CN', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(77, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0ZY1LG', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(78, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0UB7GN', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(79, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0VTTM3', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(80, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0TU10M', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(81, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF17KK9S', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(82, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0TP1Q5', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(83, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0VTVRR', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(84, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0UAEE4', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(85, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF10RKPK', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(86, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0ZJX90', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(87, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0TP3VC', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(88, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0VTUQF', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(89, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0VSR20', 8, 'no', '14', 21342, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(90, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0ZMU6S', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(91, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0WLYTF', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(92, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF123JRT', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(93, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF10XE2Q', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(94, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0TU11D', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(95, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0ZJZA1', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(96, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0TNXDQ', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(97, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0UWEMT', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(98, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0UA9J4', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(99, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0W7SVL', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(100, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF12PNPZ', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(101, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0T5J0J', 8, 'no', '14', 0, '1600 x 900', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(102, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0TTUL2', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(103, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0RA42T', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(104, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF10X5W8', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(105, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0TUSLR', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(106, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0RA43N', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(107, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0UBHLL', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(108, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF10X93P', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(109, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0TUL5A', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(110, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF11RKSY', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(111, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF10XE3F', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, '0', '', '', '', ''),
(112, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0VTZ8U', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'noon', 'Noon Warehouse', '', '', ''),
(113, 'laptop', 'HP', 'i7', 7, 'e5530', '256gb', 'ssd', 'PF0ZJZBJ', 8, 'no', '14', 0, '1920 x 1080', 'yes', 'no', 'no', 'w10p64', '', '0000-00-00 00:00:00', 'e_commerce', 0, 'noon', 'Noon Warehouse', '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
