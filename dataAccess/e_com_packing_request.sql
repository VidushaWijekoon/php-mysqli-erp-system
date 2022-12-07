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
-- Table structure for table `e_com_packing_request`
--

DROP TABLE IF EXISTS `e_com_packing_request`;
CREATE TABLE IF NOT EXISTS `e_com_packing_request` (
  `request_id` int NOT NULL AUTO_INCREMENT,
  `sr_no` int NOT NULL,
  `brand` varchar(15) NOT NULL,
  `model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(20) NOT NULL,
  `packing_by` varchar(40) NOT NULL,
  `packing_date` datetime NOT NULL,
  `platform` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `qty` int NOT NULL,
  `prepare_qty` int NOT NULL DEFAULT '0',
  `barcode` int NOT NULL,
  `order_status` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'packing pending',
  `cancel_description` varchar(220) NOT NULL,
  `warehouse_type` varchar(50) NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `e_com_packing_request`
--

INSERT INTO `e_com_packing_request` (`request_id`, `sr_no`, `brand`, `model`, `created_time`, `created_by`, `packing_by`, `packing_date`, `platform`, `qty`, `prepare_qty`, `barcode`, `order_status`, `cancel_description`, `warehouse_type`) VALUES
(1, 1, 'hp', 'dfghdbgxdhbnfbn nbdgfhdgfhdgfhfdgh', '2022-12-05 09:22:39', 'admin', '', '0000-00-00 00:00:00', '', 3, 0, 3541, 'packing pending', '', ''),
(2, 1, 'hp', 'dfghdbgxdhbnfbn nbdgfhdgfhdgfhfdgh', '2022-12-06 09:23:22', 'admin', '', '0000-00-00 00:00:00', '', 3, 0, 354, 'order cancel', '', ''),
(3, 2, 'hop', 'fghjnfcdjn', '2022-12-06 09:23:37', 'admin', '', '0000-00-00 00:00:00', 'noon', 4, 1, 1, 'packing pending', '', ''),
(4, 2, 'hop', 'fghjnfcdjn', '2022-12-06 09:43:22', 'admin', '', '0000-00-00 00:00:00', 'noon', 4, 1, 2, 'packing pending', '', ''),
(5, 2, 'hop', 'fghjnfcdjn', '2022-12-06 09:54:04', 'admin', '', '0000-00-00 00:00:00', 'noon', 4, 1, 3, 'packing pending', '', ''),
(6, 2, 'hop', 'fghjnfcdjn', '2022-12-06 09:54:27', 'admin', '', '0000-00-00 00:00:00', 'noon', 4, 1, 4, 'packing pending', '', ''),
(7, 2, 'lenovo', 'rtgeds dgnfbdfg dshd gdhfdsgfh esfgd dsfgv dsrfg  dsfg dsgf ', '2022-12-06 09:56:49', 'admin', '', '0000-00-00 00:00:00', 'amazon', 2, 2, 345, 'send to office', '', ''),
(8, 1, 'hp', '840 g3 touch screen', '2022-12-07 05:30:08', 'admin', '', '0000-00-00 00:00:00', 'noon', 5, 0, 3541, 'packing pending', '', ''),
(9, 2, 'DELL', 'dljwfhegf  rtyhrtyu dthjtdy drmnjyhnrtyj', '2022-12-07 06:14:49', 'admin', '', '0000-00-00 00:00:00', 'cartlow', 2, 0, 356956, 'packing pending', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
