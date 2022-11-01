-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 25, 2022 at 05:47 AM
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
-- Table structure for table `bodywork`
--

DROP TABLE IF EXISTS `bodywork`;
CREATE TABLE IF NOT EXISTS `bodywork` (
  `id` int NOT NULL AUTO_INCREMENT,
  `inventory_id` int NOT NULL,
  `emp_id` int NOT NULL,
  `sales_order_id` int NOT NULL,
  `a_scratch` int NOT NULL,
  `a_broken` int NOT NULL,
  `a_dent` int NOT NULL,
  `b_scratch` int NOT NULL,
  `b_broken` int NOT NULL,
  `b_logo` int NOT NULL,
  `b_color` int NOT NULL,
  `c_scratch` int NOT NULL,
  `c_broken` int NOT NULL,
  `c_dent` int NOT NULL,
  `d_scratch` int NOT NULL,
  `d_broken` int NOT NULL,
  `d_dent` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `brand_id` int NOT NULL AUTO_INCREMENT,
  `brand` varchar(50) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand`) VALUES
(1, 'dell'),
(2, 'hp'),
(3, 'lenovo'),
(4, 'asus'),
(5, 'fujitsu'),
(6, 'apple'),
(7, 'msi'),
(8, 'microsoft'),
(9, 'acer'),
(10, 'samsung'),
(11, 'razer'),
(12, 'gigabyte'),
(13, 'lg');

-- --------------------------------------------------------

--
-- Table structure for table `combine_check`
--

DROP TABLE IF EXISTS `combine_check`;
CREATE TABLE IF NOT EXISTS `combine_check` (
  `id` int NOT NULL AUTO_INCREMENT,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `emp_id` int NOT NULL,
  `sales_order_id` int NOT NULL,
  `keyboard` int NOT NULL,
  `speakers` int NOT NULL,
  `camera` int NOT NULL,
  `bazel` int NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `core`
--

DROP TABLE IF EXISTS `core`;
CREATE TABLE IF NOT EXISTS `core` (
  `core_id` int NOT NULL AUTO_INCREMENT,
  `core` varchar(10) NOT NULL,
  PRIMARY KEY (`core_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core`
--

INSERT INTO `core` (`core_id`, `core`) VALUES
(1, 'i3'),
(2, 'i5'),
(3, 'i7'),
(4, 'i9'),
(5, 'celeron'),
(6, 'xeon'),
(7, ' ryzen 3'),
(8, 'ryzen 5'),
(9, 'ryzen 7'),
(10, 'ryzen 9'),
(11, 'm-1'),
(12, 'm-2'),
(13, 'Athlon');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `country_id` int NOT NULL AUTO_INCREMENT,
  `phone_code` int NOT NULL,
  `country_code` char(2) NOT NULL,
  `country_name` varchar(80) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `phone_code`, `country_code`, `country_name`) VALUES
(1, 93, 'AF', 'Afghanistan'),
(2, 358, 'AX', 'Aland Islands'),
(3, 355, 'AL', 'Albania'),
(4, 213, 'DZ', 'Algeria'),
(5, 1684, 'AS', 'American Samoa'),
(6, 376, 'AD', 'Andorra'),
(7, 244, 'AO', 'Angola'),
(8, 1264, 'AI', 'Anguilla'),
(9, 672, 'AQ', 'Antarctica'),
(10, 1268, 'AG', 'Antigua and Barbuda'),
(11, 54, 'AR', 'Argentina'),
(12, 374, 'AM', 'Armenia'),
(13, 297, 'AW', 'Aruba'),
(14, 61, 'AU', 'Australia'),
(15, 43, 'AT', 'Austria'),
(16, 994, 'AZ', 'Azerbaijan'),
(17, 1242, 'BS', 'Bahamas'),
(18, 973, 'BH', 'Bahrain'),
(19, 880, 'BD', 'Bangladesh'),
(20, 1246, 'BB', 'Barbados'),
(21, 375, 'BY', 'Belarus'),
(22, 32, 'BE', 'Belgium'),
(23, 501, 'BZ', 'Belize'),
(24, 229, 'BJ', 'Benin'),
(25, 1441, 'BM', 'Bermuda'),
(26, 975, 'BT', 'Bhutan'),
(27, 591, 'BO', 'Bolivia'),
(28, 599, 'BQ', 'Bonaire, Sint Eustatius and Saba'),
(29, 387, 'BA', 'Bosnia and Herzegovina'),
(30, 267, 'BW', 'Botswana'),
(31, 55, 'BV', 'Bouvet Island'),
(32, 55, 'BR', 'Brazil'),
(33, 246, 'IO', 'British Indian Ocean Territory'),
(34, 673, 'BN', 'Brunei Darussalam'),
(35, 359, 'BG', 'Bulgaria'),
(36, 226, 'BF', 'Burkina Faso'),
(37, 257, 'BI', 'Burundi'),
(38, 855, 'KH', 'Cambodia'),
(39, 237, 'CM', 'Cameroon'),
(40, 1, 'CA', 'Canada'),
(41, 238, 'CV', 'Cape Verde'),
(42, 1345, 'KY', 'Cayman Islands'),
(43, 236, 'CF', 'Central African Republic'),
(44, 235, 'TD', 'Chad'),
(45, 56, 'CL', 'Chile'),
(46, 86, 'CN', 'China'),
(47, 61, 'CX', 'Christmas Island'),
(48, 672, 'CC', 'Cocos (Keeling) Islands'),
(49, 57, 'CO', 'Colombia'),
(50, 269, 'KM', 'Comoros'),
(51, 242, 'CG', 'Congo'),
(52, 242, 'CD', 'Congo, Democratic Republic of the Congo'),
(53, 682, 'CK', 'Cook Islands'),
(54, 506, 'CR', 'Costa Rica'),
(55, 225, 'CI', 'Cote D\'Ivoire'),
(56, 385, 'HR', 'Croatia'),
(57, 53, 'CU', 'Cuba'),
(58, 599, 'CW', 'Curacao'),
(59, 357, 'CY', 'Cyprus'),
(60, 420, 'CZ', 'Czech Republic'),
(61, 45, 'DK', 'Denmark'),
(62, 253, 'DJ', 'Djibouti'),
(63, 1767, 'DM', 'Dominica'),
(64, 1809, 'DO', 'Dominican Republic'),
(65, 593, 'EC', 'Ecuador'),
(66, 20, 'EG', 'Egypt'),
(67, 503, 'SV', 'El Salvador'),
(68, 240, 'GQ', 'Equatorial Guinea'),
(69, 291, 'ER', 'Eritrea'),
(70, 372, 'EE', 'Estonia'),
(71, 251, 'ET', 'Ethiopia'),
(72, 500, 'FK', 'Falkland Islands (Malvinas)'),
(73, 298, 'FO', 'Faroe Islands'),
(74, 679, 'FJ', 'Fiji'),
(75, 358, 'FI', 'Finland'),
(76, 33, 'FR', 'France'),
(77, 594, 'GF', 'French Guiana'),
(78, 689, 'PF', 'French Polynesia'),
(79, 262, 'TF', 'French Southern Territories'),
(80, 241, 'GA', 'Gabon'),
(81, 220, 'GM', 'Gambia'),
(82, 995, 'GE', 'Georgia'),
(83, 49, 'DE', 'Germany'),
(84, 233, 'GH', 'Ghana'),
(85, 350, 'GI', 'Gibraltar'),
(86, 30, 'GR', 'Greece'),
(87, 299, 'GL', 'Greenland'),
(88, 1473, 'GD', 'Grenada'),
(89, 590, 'GP', 'Guadeloupe'),
(90, 1671, 'GU', 'Guam'),
(91, 502, 'GT', 'Guatemala'),
(92, 44, 'GG', 'Guernsey'),
(93, 224, 'GN', 'Guinea'),
(94, 245, 'GW', 'Guinea-Bissau'),
(95, 592, 'GY', 'Guyana'),
(96, 509, 'HT', 'Haiti'),
(97, 0, 'HM', 'Heard Island and Mcdonald Islands'),
(98, 39, 'VA', 'Holy See (Vatican City State)'),
(99, 504, 'HN', 'Honduras'),
(100, 852, 'HK', 'Hong Kong'),
(101, 36, 'HU', 'Hungary'),
(102, 354, 'IS', 'Iceland'),
(103, 91, 'IN', 'India'),
(104, 62, 'ID', 'Indonesia'),
(105, 98, 'IR', 'Iran, Islamic Republic of'),
(106, 964, 'IQ', 'Iraq'),
(107, 353, 'IE', 'Ireland'),
(108, 44, 'IM', 'Isle of Man'),
(109, 972, 'IL', 'Israel'),
(110, 39, 'IT', 'Italy'),
(111, 1876, 'JM', 'Jamaica'),
(112, 81, 'JP', 'Japan'),
(113, 44, 'JE', 'Jersey'),
(114, 962, 'JO', 'Jordan'),
(115, 7, 'KZ', 'Kazakhstan'),
(116, 254, 'KE', 'Kenya'),
(117, 686, 'KI', 'Kiribati'),
(118, 850, 'KP', 'Korea, Democratic People\'s Republic of'),
(119, 82, 'KR', 'Korea, Republic of'),
(120, 381, 'XK', 'Kosovo'),
(121, 965, 'KW', 'Kuwait'),
(122, 996, 'KG', 'Kyrgyzstan'),
(123, 856, 'LA', 'Lao People\'s Democratic Republic'),
(124, 371, 'LV', 'Latvia'),
(125, 961, 'LB', 'Lebanon'),
(126, 266, 'LS', 'Lesotho'),
(127, 231, 'LR', 'Liberia'),
(128, 218, 'LY', 'Libyan Arab Jamahiriya'),
(129, 423, 'LI', 'Liechtenstein'),
(130, 370, 'LT', 'Lithuania'),
(131, 352, 'LU', 'Luxembourg'),
(132, 853, 'MO', 'Macao'),
(133, 389, 'MK', 'Macedonia, the Former Yugoslav Republic of'),
(134, 261, 'MG', 'Madagascar'),
(135, 265, 'MW', 'Malawi'),
(136, 60, 'MY', 'Malaysia'),
(137, 960, 'MV', 'Maldives'),
(138, 223, 'ML', 'Mali'),
(139, 356, 'MT', 'Malta'),
(140, 692, 'MH', 'Marshall Islands'),
(141, 596, 'MQ', 'Martinique'),
(142, 222, 'MR', 'Mauritania'),
(143, 230, 'MU', 'Mauritius'),
(144, 269, 'YT', 'Mayotte'),
(145, 52, 'MX', 'Mexico'),
(146, 691, 'FM', 'Micronesia, Federated States of'),
(147, 373, 'MD', 'Moldova, Republic of'),
(148, 377, 'MC', 'Monaco'),
(149, 976, 'MN', 'Mongolia'),
(150, 382, 'ME', 'Montenegro'),
(151, 1664, 'MS', 'Montserrat'),
(152, 212, 'MA', 'Morocco'),
(153, 258, 'MZ', 'Mozambique'),
(154, 95, 'MM', 'Myanmar'),
(155, 264, 'NA', 'Namibia'),
(156, 674, 'NR', 'Nauru'),
(157, 977, 'NP', 'Nepal'),
(158, 31, 'NL', 'Netherlands'),
(159, 599, 'AN', 'Netherlands Antilles'),
(160, 687, 'NC', 'New Caledonia'),
(161, 64, 'NZ', 'New Zealand'),
(162, 505, 'NI', 'Nicaragua'),
(163, 227, 'NE', 'Niger'),
(164, 234, 'NG', 'Nigeria'),
(165, 683, 'NU', 'Niue'),
(166, 672, 'NF', 'Norfolk Island'),
(167, 1670, 'MP', 'Northern Mariana Islands'),
(168, 47, 'NO', 'Norway'),
(169, 968, 'OM', 'Oman'),
(170, 92, 'PK', 'Pakistan'),
(171, 680, 'PW', 'Palau'),
(172, 970, 'PS', 'Palestinian Territory, Occupied'),
(173, 507, 'PA', 'Panama'),
(174, 675, 'PG', 'Papua New Guinea'),
(175, 595, 'PY', 'Paraguay'),
(176, 51, 'PE', 'Peru'),
(177, 63, 'PH', 'Philippines'),
(178, 64, 'PN', 'Pitcairn'),
(179, 48, 'PL', 'Poland'),
(180, 351, 'PT', 'Portugal'),
(181, 1787, 'PR', 'Puerto Rico'),
(182, 974, 'QA', 'Qatar'),
(183, 262, 'RE', 'Reunion'),
(184, 40, 'RO', 'Romania'),
(185, 70, 'RU', 'Russian Federation'),
(186, 250, 'RW', 'Rwanda'),
(187, 590, 'BL', 'Saint Barthelemy'),
(188, 290, 'SH', 'Saint Helena'),
(189, 1869, 'KN', 'Saint Kitts and Nevis'),
(190, 1758, 'LC', 'Saint Lucia'),
(191, 590, 'MF', 'Saint Martin'),
(192, 508, 'PM', 'Saint Pierre and Miquelon'),
(193, 1784, 'VC', 'Saint Vincent and the Grenadines'),
(194, 684, 'WS', 'Samoa'),
(195, 378, 'SM', 'San Marino'),
(196, 239, 'ST', 'Sao Tome and Principe'),
(197, 966, 'SA', 'Saudi Arabia'),
(198, 221, 'SN', 'Senegal'),
(199, 381, 'RS', 'Serbia'),
(200, 381, 'CS', 'Serbia and Montenegro'),
(201, 248, 'SC', 'Seychelles'),
(202, 232, 'SL', 'Sierra Leone'),
(203, 65, 'SG', 'Singapore'),
(204, 1, 'SX', 'Sint Maarten'),
(205, 421, 'SK', 'Slovakia'),
(206, 386, 'SI', 'Slovenia'),
(207, 677, 'SB', 'Solomon Islands'),
(208, 252, 'SO', 'Somalia'),
(209, 27, 'ZA', 'South Africa'),
(210, 500, 'GS', 'South Georgia and the South Sandwich Islands'),
(211, 211, 'SS', 'South Sudan'),
(212, 34, 'ES', 'Spain'),
(213, 94, 'LK', 'Sri Lanka'),
(214, 249, 'SD', 'Sudan'),
(215, 597, 'SR', 'Suriname'),
(216, 47, 'SJ', 'Svalbard and Jan Mayen'),
(217, 268, 'SZ', 'Swaziland'),
(218, 46, 'SE', 'Sweden'),
(219, 41, 'CH', 'Switzerland'),
(220, 963, 'SY', 'Syrian Arab Republic'),
(221, 886, 'TW', 'Taiwan, Province of China'),
(222, 992, 'TJ', 'Tajikistan'),
(223, 255, 'TZ', 'Tanzania, United Republic of'),
(224, 66, 'TH', 'Thailand'),
(225, 670, 'TL', 'Timor-Leste'),
(226, 228, 'TG', 'Togo'),
(227, 690, 'TK', 'Tokelau'),
(228, 676, 'TO', 'Tonga'),
(229, 1868, 'TT', 'Trinidad and Tobago'),
(230, 216, 'TN', 'Tunisia'),
(231, 90, 'TR', 'Turkey'),
(232, 7370, 'TM', 'Turkmenistan'),
(233, 1649, 'TC', 'Turks and Caicos Islands'),
(234, 688, 'TV', 'Tuvalu'),
(235, 256, 'UG', 'Uganda'),
(236, 380, 'UA', 'Ukraine'),
(237, 971, 'AE', 'United Arab Emirates'),
(238, 44, 'GB', 'United Kingdom'),
(239, 1, 'US', 'United States'),
(240, 1, 'UM', 'United States Minor Outlying Islands'),
(241, 598, 'UY', 'Uruguay'),
(242, 998, 'UZ', 'Uzbekistan'),
(243, 678, 'VU', 'Vanuatu'),
(244, 58, 'VE', 'Venezuela'),
(245, 84, 'VN', 'Viet Nam'),
(246, 1284, 'VG', 'Virgin Islands, British'),
(247, 1340, 'VI', 'Virgin Islands, U.s.'),
(248, 681, 'WF', 'Wallis and Futuna'),
(249, 212, 'EH', 'Western Sahara'),
(250, 967, 'YE', 'Yemen'),
(251, 260, 'ZM', 'Zambia'),
(252, 263, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `department_id` int NOT NULL AUTO_INCREMENT,
  `department` varchar(20) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department`) VALUES
(1, 'production'),
(2, 'warehouse'),
(3, 'finance'),
(4, 'hr'),
(5, 'Sales'),
(6, 'director'),
(7, 'body work'),
(8, 'paint'),
(9, 'motherboard'),
(10, 'lcd'),
(11, 'software development'),
(12, 'security'),
(13, 'packing'),
(14, 'battery'),
(16, 'E-Commerce'),
(18, 'admin'),
(19, 'quality');

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

DROP TABLE IF EXISTS `device`;
CREATE TABLE IF NOT EXISTS `device` (
  `device_id` int NOT NULL,
  `device` varchar(50) NOT NULL,
  PRIMARY KEY (`device_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`device_id`, `device`) VALUES
(1, 'laptop');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `emp_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(300) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `full_name` varchar(500) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `birthday` varchar(20) NOT NULL,
  `current_passport` varchar(30) NOT NULL,
  `passport_expiring_date` varchar(20) NOT NULL,
  `visa_type` varchar(20) NOT NULL,
  `visa_expiring_date` varchar(20) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `relationship` varchar(10) NOT NULL,
  `current_address` varchar(250) NOT NULL,
  `current_country` varchar(50) NOT NULL,
  `permanent_address` varchar(250) NOT NULL,
  `resident_country` varchar(50) NOT NULL,
  `emergency_contact` varchar(25) NOT NULL,
  `profile_photo` varchar(5000) NOT NULL,
  `department` varchar(50) NOT NULL,
  `labour_category` varchar(50) NOT NULL,
  `join_date` varchar(20) NOT NULL,
  `note` text NOT NULL,
  `old_passport` varchar(20) DEFAULT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `discontinuation_date` varchar(15) NOT NULL,
  `created_by` varchar(25) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1033 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `first_name`, `last_name`, `email`, `full_name`, `gender`, `birthday`, `current_passport`, `passport_expiring_date`, `visa_type`, `visa_expiring_date`, `contact_number`, `relationship`, `current_address`, `current_country`, `permanent_address`, `resident_country`, `emergency_contact`, `profile_photo`, `department`, `labour_category`, `join_date`, `note`, `old_passport`, `created_time`, `discontinuation_date`, `created_by`) VALUES
(1021, 'vidusha', 'wijekoon', 'vidusha.wijekoon11@gmail.com', 'athapaththu wijekoon mudiyanselage vidusha pulashthi jayasri bandara wijekoon', 'male', '1990-05-11', 'n87665447', '2030-02-06', '11', '2022-11-14', '00971588250972', 'married', '64  city tower, port saeed, deira, dubai', 'united arab emirates', '52/a, mariyawaththe, gampola, kandy, sri lanka', 'sri lanka', '0094812353489', '3840x1080-wallpaper-043.jpg', '2', '16', '2022-10-21', 'agredd to work under 3 months probation', '', '2022-10-19 11:27:28', '', 'admin'),
(1022, 'anuradha', 'denuwan', '', 'dsdfhfghfhfh', 'male', '2022-02-04', 'desgdgdfg', '2022-01-03', '3', '2023-01-04', '24214214', 'unmarried', 'asdsdgdfg', 'american samoa', 'fdsgdfgd', 'american samoa', '23213123', 'dual-monitor-wallpaper-9.jpg', '2', '10', '2018-02-06', 'sdasdsfdsfdsff', '', '2022-10-19 11:30:25', '', 'admin'),
(1023, 'dfdsf', 'dfdgdfgg', '', 'dfdggfhgjhk', 'male', '2017-01-02', 'deswfdgdfg', '2022-01-03', '5', '2026-02-04', '3123213213', 'married', 'qwfdfhfgh', 'denmark', 'fgfhgfh', 'gabon', '2131231', 'dual-monitor-wallpaper-9.jpg', '2', '10', '2022-02-04', 'dsfdsggfhgfh', '', '2022-10-19 11:31:02', '', 'admin'),
(1024, 'dsfdgdfg', 'dfgfghfh', '', 'ghfghgjgj', 'other', '2022-01-01', 'dfdfgfgh', '2022-01-02', '2', '2022-02-02', '2312321', 'married', 'fsgfhgfh', 'aland islands', 'fdsgdf', 'denmark', '3123213', '7868580.jpg', '2', '10', '2021-03-03', 'dsfdsgdfgfh', '-', '2022-10-19 11:32:02', '', 'admin'),
(1025, 'ghjhjkhjk', 'gfhgjhkljl', '', 'ghjhjklhjkgj', 'other', '2020-01-03', '21321321', '2022-02-04', '4', '2024-02-01', '21321321312', 'unmarried', '132435345', 'qatar', 'fgdfhfh', 'saint barthelemy', '242141', '7868580.jpg', '2', '10', '2020-02-01', ' sdsgdfgfh', '', '2022-10-19 11:32:52', '', 'admin'),
(1026, 'mdfdsfdfsgdsg', 'gfhfjgh', '', 'dagfh', 'male', '2020-02-03', 'wqe23424', '2022-01-02', '1', '2021-03-21', '2123123', 'unmarried', 'dffhf', 'denmark', 'esfdrtwre', 'denmark', '232131', '7868580.jpg', '2', '10', '2022-02-03', 'dsfdfgdgfg', '', '2022-10-19 11:33:34', '', 'admin'),
(1027, 'gdfgdg', 'dfgdfhgfh', '', 'dfggfhgj', 'female', '2020-03-02', 'dfdgdfg', '2022-01-03', '2', '2022-02-02', '213213', 'divorce', 'asdfhfh', 'gabon', 'dsfdg', 'denmark', '3413123', '3840x1080-wallpaper-043.jpg', '1', '16', '2021-01-04', 'dsfdsgfdg', '-', '2022-10-19 11:35:15', '', 'admin'),
(1028, 'dffdhhjgj', 'gfhjghj', '', 'fgyrertwfdgf', 'male', '2022-01-03', 'dfgdhfj', '2022-01-01', '5', '2024-01-02', '213123', 'unmarried', 'dgfgh', 'denmark', 'gfjghkh', 'denmark', '2342421', '7868580.jpg', '1', '10', '2020-04-03', 'dsfdfggfh', '', '2022-10-19 11:35:54', '', 'admin'),
(1029, 'dsggfhghj', 'gfghkhjk', '', 'fdhgjjewt', 'male', '2022-01-02', '4eedhfh', '2022-01-03', '3', '2022-02-03', '214211', 'married', 'dfgfhgfh', 'albania', 'dfgfh', 'gabon', '442424', '7868580.jpg', '1', '10', '2022-02-04', 'dsfdsfdsf', '', '2022-10-19 11:36:40', '', 'admin'),
(1030, 'gdfgdfg', 'dfgfhjgfhj', '', 'dfgdgfhgfhj', 'female', '2022-01-03', 'sfdsfgdfg', '2030-02-02', '1', '2022-01-02', '1321321321', 'unmarried', 'fdfhgfh', 'denmark', 'awsgfh', 'ghana', '24141', 'dual-monitor-wallpaper-7.jpg', '1', '10', '2022-01-04', 'dsfdgdhdfgf', '', '2022-10-19 11:37:20', '', 'admin'),
(1031, 'ghjhjg', 'gjghkkgkj', '', 'gffghjgj', 'female', '2024-01-02', 'sfdg', '2025-01-03', '1', '2022-01-04', '2321313', 'unmarried', 'dsgfh', 'ghana', 'fdgfh', 'reunion', '24144', 'dual-monitor-wallpaper-7.jpg', '1', '10', '2022-01-03', 'dsfgdfgdg', '', '2022-10-19 11:38:06', '', 'admin'),
(1032, 'dfgfghgfh', 'gfhgjk', '', 'fgfhgf', 'female', '2022-01-03', 'fgfhjgj', '2022-03-01', '2', '2022-01-02', '213213131', 'married', 'aere', 'falkland islands (malvinas)', 'fdgfghfghj', 'gabon', '211414', 'dual-monitor-wallpaper-7.jpg', '1', '10', '2023-02-05', 'fsdfdfdsf', 'dsfdg', '2022-10-19 11:39:33', '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
CREATE TABLE IF NOT EXISTS `gender` (
  `gender_id` int NOT NULL AUTO_INCREMENT,
  `gender` varchar(10) NOT NULL,
  PRIMARY KEY (`gender_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`gender_id`, `gender`) VALUES
(1, 'male'),
(2, 'female'),
(3, 'other');

-- --------------------------------------------------------

--
-- Table structure for table `generation`
--

DROP TABLE IF EXISTS `generation`;
CREATE TABLE IF NOT EXISTS `generation` (
  `generation_id` int NOT NULL AUTO_INCREMENT,
  `generation` varchar(50) NOT NULL,
  PRIMARY KEY (`generation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generation`
--

INSERT INTO `generation` (`generation_id`, `generation`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9'),
(10, '10'),
(11, '11'),
(12, '12'),
(13, 'athlon');

-- --------------------------------------------------------

--
-- Table structure for table `labour_category`
--

DROP TABLE IF EXISTS `labour_category`;
CREATE TABLE IF NOT EXISTS `labour_category` (
  `labour_id` int NOT NULL AUTO_INCREMENT,
  `labour_category` varchar(20) NOT NULL,
  PRIMARY KEY (`labour_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labour_category`
--

INSERT INTO `labour_category` (`labour_id`, `labour_category`) VALUES
(1, 'md'),
(2, 'ceo'),
(3, 'cfo'),
(4, 'general manager'),
(5, 'manager'),
(6, 'executive'),
(7, 'in-charge'),
(8, 'assistant'),
(9, 'labour'),
(10, 'general worker'),
(11, 'helper'),
(12, 'cleaner'),
(13, 'security'),
(14, 'engineer'),
(15, 'supervisor'),
(16, 'team leader');

-- --------------------------------------------------------

--
-- Table structure for table `lcd_check`
--

DROP TABLE IF EXISTS `lcd_check`;
CREATE TABLE IF NOT EXISTS `lcd_check` (
  `id` int NOT NULL AUTO_INCREMENT,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `emp_id` int NOT NULL,
  `sales_order_id` int NOT NULL,
  `whitespot` int DEFAULT NULL,
  `scratch` int DEFAULT NULL,
  `broken` int NOT NULL,
  `line_lcd` int NOT NULL,
  `yellow_shadow` int NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `location_id` int NOT NULL AUTO_INCREMENT,
  `location` varchar(50) NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location`) VALUES
(1, 'wh1'),
(2, 'wh2'),
(3, 'wh3'),
(4, 'wh4'),
(5, 'wh5');

-- --------------------------------------------------------

--
-- Table structure for table `motherboard_check`
--

DROP TABLE IF EXISTS `motherboard_check`;
CREATE TABLE IF NOT EXISTS `motherboard_check` (
  `id` int NOT NULL AUTO_INCREMENT,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `emp_id` int NOT NULL,
  `sales_order_id` int NOT NULL,
  `bios_check` int NOT NULL,
  `no_power` int NOT NULL,
  `usb_connection` int NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL,
  `completed_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `processor`
--

DROP TABLE IF EXISTS `processor`;
CREATE TABLE IF NOT EXISTS `processor` (
  `processor_id` int NOT NULL AUTO_INCREMENT,
  `processor` varchar(10) NOT NULL,
  `parent` bigint NOT NULL,
  PRIMARY KEY (`processor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `processor`
--

INSERT INTO `processor` (`processor_id`, `processor`, `parent`) VALUES
(1, 'intel', 0),
(2, 'amd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

DROP TABLE IF EXISTS `production`;
CREATE TABLE IF NOT EXISTS `production` (
  `production_id` int NOT NULL,
  `brand` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `production_check`
--

DROP TABLE IF EXISTS `production_check`;
CREATE TABLE IF NOT EXISTS `production_check` (
  `id` int NOT NULL AUTO_INCREMENT,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `emp_id` int NOT NULL,
  `sales_order_id` int NOT NULL,
  `processor` varchar(10) NOT NULL,
  `generation` varchar(15) NOT NULL,
  `ram` varchar(15) NOT NULL,
  `ssd` varchar(15) NOT NULL,
  `hdd` varchar(15) NOT NULL,
  `display` varchar(15) NOT NULL,
  `resolutions` varchar(15) NOT NULL,
  `graphic` varchar(15) NOT NULL,
  `graphic_type` varchar(15) NOT NULL,
  `operating_system` varchar(15) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prod_cmb_check`
--

DROP TABLE IF EXISTS `prod_cmb_check`;
CREATE TABLE IF NOT EXISTS `prod_cmb_check` (
  `id` int NOT NULL AUTO_INCREMENT,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `emp_id` int NOT NULL,
  `sales_order_id` int NOT NULL,
  `keyboard` int NOT NULL,
  `speakers` int NOT NULL,
  `camera` int NOT NULL,
  `bazel` int NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prod_info`
--

DROP TABLE IF EXISTS `prod_info`;
CREATE TABLE IF NOT EXISTS `prod_info` (
  `p_id` int NOT NULL AUTO_INCREMENT,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `sales_order` int NOT NULL,
  `start_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date_time` timestamp NOT NULL,
  `emp_id` int NOT NULL,
  `tech_id` int NOT NULL,
  `status` int NOT NULL,
  `issue_type` int NOT NULL COMMENT '1=motherboard,2=combine,3=lcd,4=bodywork,5=no-issues',
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prod_technician_assign_info`
--

DROP TABLE IF EXISTS `prod_technician_assign_info`;
CREATE TABLE IF NOT EXISTS `prod_technician_assign_info` (
  `tech_id` int NOT NULL AUTO_INCREMENT,
  `emp_id` int NOT NULL,
  `sales_order_id` int NOT NULL,
  `model` varchar(25) NOT NULL,
  `tech_assign_qty` int NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `task_completed_time` timestamp NOT NULL,
  `core` varchar(40) NOT NULL,
  `generation` varchar(10) NOT NULL,
  `processor` varchar(10) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `device_type` varchar(40) NOT NULL,
  PRIMARY KEY (`tech_id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rack`
--

DROP TABLE IF EXISTS `rack`;
CREATE TABLE IF NOT EXISTS `rack` (
  `rack_id` int NOT NULL AUTO_INCREMENT,
  `rack_number` int(2) UNSIGNED ZEROFILL NOT NULL,
  PRIMARY KEY (`rack_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rack`
--

INSERT INTO `rack` (`rack_id`, `rack_number`) VALUES
(1, 01),
(2, 02),
(3, 03),
(4, 04),
(5, 05),
(6, 06),
(7, 07),
(8, 08),
(9, 09),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30),
(31, 31),
(32, 32),
(33, 33),
(34, 34),
(35, 35),
(36, 36),
(37, 37),
(38, 38),
(39, 39),
(40, 40),
(41, 41),
(42, 42),
(43, 43),
(44, 44),
(45, 45),
(46, 46),
(47, 47),
(48, 48),
(49, 49),
(50, 50);

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

DROP TABLE IF EXISTS `relationship`;
CREATE TABLE IF NOT EXISTS `relationship` (
  `relationship_id` int NOT NULL AUTO_INCREMENT,
  `relationship` varchar(50) NOT NULL,
  PRIMARY KEY (`relationship_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relationship`
--

INSERT INTO `relationship` (`relationship_id`, `relationship`) VALUES
(1, 'unmarried'),
(2, 'married'),
(3, 'divorce'),
(4, 'complicated');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_add_items`
--

DROP TABLE IF EXISTS `sales_order_add_items`;
CREATE TABLE IF NOT EXISTS `sales_order_add_items` (
  `sales_item_id` int NOT NULL AUTO_INCREMENT,
  `item_type` varchar(20) NOT NULL,
  `item_brand` varchar(20) NOT NULL,
  `item_model` varchar(20) NOT NULL,
  `item_processor` varchar(10) NOT NULL,
  `item_core` varchar(10) NOT NULL,
  `item_generation` varchar(10) NOT NULL,
  `item_ram` varchar(50) NOT NULL,
  `item_hdd` varchar(100) NOT NULL,
  `item_condition` varchar(250) NOT NULL,
  `item_quantity` int NOT NULL,
  `item_price` int NOT NULL,
  `item_total_price` varchar(1000) NOT NULL,
  `item_delivery_date` date NOT NULL,
  `sales_order_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sales_order_id` int DEFAULT NULL,
  `item_display` varchar(50) NOT NULL,
  `item_graphic` varchar(50) NOT NULL,
  `item_screen` varchar(50) NOT NULL,
  `item_bulk` varchar(10) NOT NULL,
  PRIMARY KEY (`sales_item_id`),
  KEY `fksales_order_id` (`sales_order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order_add_items`
--

INSERT INTO `sales_order_add_items` (`sales_item_id`, `item_type`, `item_brand`, `item_model`, `item_processor`, `item_core`, `item_generation`, `item_ram`, `item_hdd`, `item_condition`, `item_quantity`, `item_price`, `item_total_price`, `item_delivery_date`, `sales_order_created_date`, `sales_order_id`, `item_display`, `item_graphic`, `item_screen`, `item_bulk`) VALUES
(1, 'laptop', 'dell', 'e5530', 'intel', 'i7', '8th', '16gb', '1tb m.2 nvme', 'fully refurbished,  back cover paint', 2, 1500, '15000', '2022-09-13', '2022-08-30 07:05:04', 1000, 'full hd (1920*1080)', '8gb', 'non-touch', 'bulk sale'),
(2, 'laptop', 'hp', 'zbook g7', 'intel', 'i7', '10th', '16gb', '512gb ssd', 'top screen sticker, lcd any spot ', 5, 2500, '12500', '2022-09-13', '2022-08-30 07:05:04', 1000, 'full hd (1920*1080)', '4gb', 'non-touch', 'bulk sale'),
(3, 'laptop', 'dell', 'xps 15', 'intel', 'i7', '8th', '8gb', '512gb ssd', 'branded', 3, 3500, '17500', '2022-09-13', '2022-08-30 07:05:04', 1000, 'qhd (2560*1440)', '4gb', 'touch', 'bulk sale'),
(4, 'laptop', 'hp', '820 g3', 'intel', 'i5', '6th', '4gb', '256gbssd', 'fully refurbished', 4, 650, '3250', '2022-09-13', '2022-08-30 07:05:04', 1000, 'hd (1366*768)', '2gb', 'non-touch', 'bulk sale'),
(5, 'laptop', 'dell', 'e5530', 'intel', 'i7', '8th', '16gb', '1tb m.2 nvme', 'fully refurbished', 25, 2500, '62500', '2022-09-20', '2022-08-30 07:23:21', 1001, 'full hd (1920*1080)', '8gb', 'non-touch', 'bulk sale'),
(6, 'laptop', 'hp', '820 g3', 'intel', 'i5', '6th', '8gb', '256gb ssd', 'fully refurbished', 25, 650, '16250', '2022-09-20', '2022-08-30 07:23:21', 1001, 'hd (1366*768)', '2gb', 'non-touch', 'bulk sale'),
(7, 'laptop', 'dell', '3160', 'intel', 'celeron', '3rd', '4gb', '128gb ssd', 'fully refurbished, palmrest paint', 40, 400, '16000', '2022-09-20', '2022-08-30 07:23:21', 1001, 'hd (1366*768)', '2gb', 'non-touch', 'bulk sale'),
(8, 'laptop', 'apple', 'macbook pro 13', 'intel', 'i5', '8th', '8gb', '512gb ssd', 'fully refurbished, palmrest paint', 5, 1750, '8750', '2022-09-20', '2022-08-30 07:23:21', 1001, 'retina', '2gb', 'non-touch', 'bulk sale'),
(9, 'laptop', 'dell', 'xps 15', 'intel', 'i9', '7th', '32gb', '512gb ssd', 'fully refurbished, palmrest paint', 10, 3500, '35000', '2022-09-20', '2022-08-30 07:23:21', 1001, 'qhd+ (3200*1800)', '4gb', 'touch', 'bulk sale'),
(10, 'laptop', 'dell', 'e7270', 'intel', 'i5', '6th', '8gb', '256gb ssd', 'fully refurbished', 5, 1500, '7500', '2022-09-20', '2022-08-30 07:23:21', 1001, 'hd (1366*768)', '4gb', 'non-touch', 'bulk sale'),
(11, 'laptop', 'acer', 'c740', 'intel', 'i3', '4th', '4gb', '256gb ssd', 'fully refurbished', 50, 250, '12500', '2022-09-20', '2022-08-30 07:23:21', 1001, 'hd (1366*768)', '2gb', 'non-touch', 'bulk sale'),
(12, 'laptop', 'lenovo', 't460s', 'intel', 'i5', '6th', '8gb', '256gb ssd', 'fully refurbished', 15, 700, '10500', '2022-09-20', '2022-08-30 07:23:21', 1001, 'hd (1366*768)', '4gb', 'non-touch', 'bulk sale'),
(13, 'laptop', 'lenovo', 'l450', 'intel', 'i3', '5th', '4gb', '240gb ssd', 'fully refurbished, palmrest paint', 55, 550, '30250', '2022-09-20', '2022-08-30 07:23:21', 1001, 'hd (1366*768)', '2gb', 'non-touch', 'bulk sale'),
(14, 'laptop', 'microsfot', '1769', 'intel', 'i7', '8th', '8gb', '512gb ssd', 'branded', 15, 2500, '37500', '2022-09-20', '2022-08-30 07:23:21', 1001, 'full hd (1920*1080)', '4gb', 'touch', 'bulk sale'),
(15, 'laptop', 'dell', 'e5530', 'intel', 'i7', '8th', '16gb', '1tb m.2 nvne', '-', 5, 2500, '12500', '2022-09-22', '2022-09-01 16:22:25', 1002, 'full hd (1920*1080)', '8gb', 'non-touch', 'bulk sale'),
(16, 'laptop', 'hp', 'zbook g7', 'intel', 'i7', '10th', '16gb', '1tb m.2 nvne', '-', 5, 2500, '12500', '2022-09-22', '2022-09-01 16:22:25', 1002, 'full hd (1920*1080)', '8gb', 'non-touch', 'bulk sale'),
(17, 'laptop', 'hp', '820 g3', 'intel', 'i5', '6th', '4gb', '1tb m.2 nvne', '-', 5, 650, '3250', '2022-09-22', '2022-09-01 16:22:25', 1002, 'hd (1366*768)', '8gb', 'non-touch', 'bulk sale'),
(18, 'laptop', 'dell', 'xps 15', 'intel', 'i7', '8th', '8gb', '1tb m.2 nvne', '-', 5, 3500, '17500', '2022-09-22', '2022-09-01 16:22:25', 1002, 'qhd (2560*1440)', '4gb', 'touch', 'bulk sale'),
(19, 'laptop', 'lenovo', 'l450	', 'intel', 'i3', '5th', '4gb', '256gb ssd', '-', 12, 750, '9000', '2022-09-22', '2022-09-01 16:22:25', 1002, 'hd (1366*768)', '2gb', 'non-touch', 'bulk sale'),
(20, 'laptop', 'acer', 'c740', 'intel', 'i3', '4th', '4gb', '256gb ssd', '-', 15, 250, '3750', '2022-09-22', '2022-09-01 16:22:25', 1002, 'hd (1366*768)', '4gb', 'non-touch', 'bulk sale'),
(21, 'laptop', 'dell', '3160	', 'intel', 'celeron', '3rd', '2gb', '256gb ssd', '-', 35, 350, '12250', '2022-09-22', '2022-09-01 16:22:25', 1002, 'hd+ (1600*900)', '2gb', 'non-touch', 'bulk sale'),
(22, 'laptop', 'microsfot', '1769	', 'intel', 'i7', '8th', '4gb', '1tb m.2 nvne', '-', 7, 3500, '24500', '2022-09-22', '2022-09-01 16:22:25', 1002, 'qhd+ (3200*1800)', '4gb', 'touch', 'bulk sale'),
(23, 'laptop', 'dell', 'xps 15', 'intel', 'i9', '7th', '32gb', '1tb m.2 nvne', '-', 15, 4500, '67500', '2022-09-22', '2022-09-01 16:22:25', 1002, 'uhd (3840*2160)', '4gb', 'touch', 'bulk sale'),
(24, 'laptop', 'dell', 'e7270	', 'intel', 'i5', '6th', '8gb', '256gb ssd', '-', 25, 780, '19500', '2022-09-22', '2022-09-01 16:22:25', 1002, 'full hd (1920*1080)', '4gb', 'non-touch', 'bulk sale'),
(25, 'laptop', 'apple', 'macbook pro 13	', 'intel', 'i5', '8th', '8gb', '512gb ssd', '-', 50, 2500, '125000', '2022-09-22', '2022-09-01 16:22:25', 1002, 'retina', '4gb', 'non-touch', 'bulk sale');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_information`
--

DROP TABLE IF EXISTS `sales_order_information`;
CREATE TABLE IF NOT EXISTS `sales_order_information` (
  `sales_order_id` int NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `customer_address` text,
  `customer_city` varchar(50) NOT NULL,
  `resident_country` varchar(50) NOT NULL,
  `compnay_name` varchar(100) DEFAULT NULL,
  `shipping_address` text NOT NULL,
  `shipping_country` varchar(100) NOT NULL,
  `shipping_state` varchar(50) NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  `contact_number` varchar(30) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sales_order_id`),
  KEY `sales_order_id` (`sales_order_id`),
  KEY `sales_order_id_2` (`sales_order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1003 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order_information`
--

INSERT INTO `sales_order_information` (`sales_order_id`, `customer_name`, `customer_address`, `customer_city`, `resident_country`, `compnay_name`, `shipping_address`, `shipping_country`, `shipping_state`, `zip_code`, `contact_number`, `created_time`) VALUES
(1000, 'vidusha wijekoon', 'industrial area 5', 'sharjah', 'United Arab Emirates', 'alsakb computers llc', '52/a, mariyawaththe, gampola', 'Sri Lanka', 'central', '20500', '0094812353489', '2022-08-30 07:05:04'),
(1001, 'sampath balasen', 'industrial area 5', 'dubai', 'United Arab Emirates', 'alsakb computers llc', '64, city tower, port saeed, deira', 'United Arab Emirates', 'dubai', '00000', '00971588250962', '2022-08-30 07:23:21'),
(1002, 'All Items', 'industrial area 5', 'sharjah', 'United Arab Emirates', 'alsakb', '64, city tower, port saeed, deira', 'United Arab Emirates', 'dubai', '00000', '00971588250971', '2022-09-01 16:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

DROP TABLE IF EXISTS `tbl_roles`;
CREATE TABLE IF NOT EXISTS `tbl_roles` (
  `role_id` int NOT NULL AUTO_INCREMENT,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`role_id`, `role`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Executive\r\n'),
(4, 'Team Leader'),
(5, 'Assistant'),
(6, 'Technician'),
(7, 'Supervisor\r\n'),
(8, 'Manager'),
(9, 'In Charge\r\n'),
(10, 'General Worker\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `epf` int NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL,
  `department` varchar(40) NOT NULL,
  `role` varchar(25) NOT NULL,
  `isActive` int NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `epf`, `username`, `email`, `password`, `last_login`, `is_deleted`, `department`, `role`, `isActive`) VALUES
(1, 'admin', 'admin', 1, 'admin', 'admin@admin.com', 'admin', '2022-10-25 05:06:12', 0, '11', '1', 0),
(2, 'vidusha', 'vidusha', 2, 'worker001', 'vidusha.wijekoon11@gmail.com', 'worker001', '2022-10-20 11:46:08', 0, '2', '10', 0),
(4, 'sampath', 'balasen', 4, 'sampath', 'sampath@alsakb.com', 'sampath', '2022-10-20 09:11:22', 0, '2', '10', 0),
(5, 'sandika', 'sandika', 5, 't1', 'sandika@alsakb.com', '123', '2022-10-24 15:18:49', 1, '1', '6', 0),
(6, 'kasun', 'karunathilake', 3, 'kasun', 'kasun@alsakb.com', 'kasun', '2022-10-16 08:09:43', 0, '4', '8', 0),
(7, 'production', 'team leader', 1021, 'wtm', 'pt@gmail.com', 'wtm', '2022-10-22 08:54:30', 0, '2', '10', 0),
(8, 'production', 'member', 23213, 'wtl', 'gw@gmail.com', 'wtl', '2022-10-20 13:31:29', 0, '2', '4', 0),
(9, 'Anuradha ', 'Denuwan', 1022, 'whm', 'anuradha@abc.com', '123', '2022-10-24 15:18:32', 0, '2', '10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `visa_type`
--

DROP TABLE IF EXISTS `visa_type`;
CREATE TABLE IF NOT EXISTS `visa_type` (
  `visa_id` int NOT NULL AUTO_INCREMENT,
  `visa_type` varchar(25) NOT NULL,
  PRIMARY KEY (`visa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visa_type`
--

INSERT INTO `visa_type` (`visa_id`, `visa_type`) VALUES
(1, 'business visa'),
(2, 'remote working '),
(3, 'tourist visa'),
(4, 'dependent visa'),
(5, 'resident visa'),
(6, 'transit visa '),
(7, 'student visa'),
(8, 'own visa'),
(9, 'cancel visa'),
(10, 'freelance visa'),
(11, 'company working visa');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_assign_task`
--

DROP TABLE IF EXISTS `warehouse_assign_task`;
CREATE TABLE IF NOT EXISTS `warehouse_assign_task` (
  `assign_task_id` int NOT NULL AUTO_INCREMENT,
  `sales_order` int NOT NULL,
  `emp_id` int NOT NULL,
  `status` int NOT NULL,
  `task_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `task_completed_date` timestamp NOT NULL,
  PRIMARY KEY (`assign_task_id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_information_sheet`
--

DROP TABLE IF EXISTS `warehouse_information_sheet`;
CREATE TABLE IF NOT EXISTS `warehouse_information_sheet` (
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `device` varchar(10) NOT NULL,
  `processor` varchar(20) NOT NULL,
  `core` varchar(20) NOT NULL,
  `generation` varchar(15) NOT NULL,
  `model` varchar(30) NOT NULL,
  `qr_image` varchar(500) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `location` varchar(25) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `create_by_inventory_id` varchar(50) DEFAULT NULL,
  `send_to_production` int NOT NULL,
  `send_time_to_production` timestamp NULL DEFAULT NULL,
  `sales_order_id` int DEFAULT NULL,
  `start_production` timestamp NULL DEFAULT NULL,
  `end_production` timestamp NULL DEFAULT NULL,
  `emp_id` int DEFAULT NULL,
  `rack` int NOT NULL,
  PRIMARY KEY (`inventory_id`),
  KEY `order_id` (`sales_order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=939 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse_information_sheet`
--

INSERT INTO `warehouse_information_sheet` (`inventory_id`, `device`, `processor`, `core`, `generation`, `model`, `qr_image`, `create_date`, `location`, `brand`, `create_by_inventory_id`, `send_to_production`, `send_time_to_production`, `sales_order_id`, `start_production`, `end_production`, `emp_id`, `rack`) VALUES
(000100, 'laptop', 'intel', 'i7', '8th', 'e5530', 'temp/634268247f938.png', '2022-10-09 06:20:20', 'WH2', 'dell', 'vidusha', 0, '2022-10-22 13:28:07', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000101, 'laptop', 'intel', 'i7', '8th', 'e5530', 'temp/634268248e80a.png', '2022-10-09 06:20:20', 'WH2', 'dell', 'vidusha', 0, '2022-10-22 13:27:56', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000102, 'laptop', 'intel', 'i7', '8th', 'e5530', 'temp/63426824a2d38.png', '2022-10-09 06:20:20', 'WH2', 'dell', 'vidusha', 0, '2022-10-20 14:20:34', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000103, 'laptop', 'intel', 'i7', '8th', 'e5530', 'temp/63426824c3709.png', '2022-10-09 06:20:20', 'WH2', 'dell', 'vidusha', 0, '2022-10-20 14:22:07', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000104, 'laptop', 'intel', 'i7', '8th', 'e5530', 'temp/63426824e86c5.png', '2022-10-09 06:20:20', 'WH2', 'dell', 'vidusha', 0, '2022-10-20 14:22:10', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000105, 'laptop', 'intel', 'i7', '8th', 'e5530', 'temp/6342682dbcbee.png', '2022-10-09 06:20:29', 'WH2', 'dell', 'vidusha', 0, '2022-10-23 06:20:27', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000106, 'laptop', 'intel', 'i7', '8th', 'e5530', 'temp/6342682e09e54.png', '2022-10-09 06:20:30', 'WH2', 'dell', 'vidusha', 0, '2022-10-23 07:45:09', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000107, 'laptop', 'intel', 'i7', '8th', 'e5530', 'temp/6342682e4b4c3.png', '2022-10-09 06:20:30', 'WH2', 'dell', 'vidusha', 0, '2022-10-20 14:22:25', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000108, 'laptop', 'intel', 'i7', '8th', 'e5530', 'temp/6342682e99fc4.png', '2022-10-09 06:20:30', 'WH2', 'dell', 'vidusha', 0, '2022-10-23 07:45:21', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000109, 'laptop', 'intel', 'i7', '8th', 'e5530', 'temp/6342682eeddf0.png', '2022-10-09 06:20:30', 'WH2', 'dell', 'vidusha', 0, '2022-10-23 07:45:16', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000110, 'laptop', 'intel', 'i7', '10th', 'zbook g7', 'temp/6342684d330ec.png', '2022-10-09 06:21:01', 'WH3', 'hp', 'vidusha', 0, '2022-10-22 09:40:08', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000111, 'laptop', 'intel', 'i7', '10th', 'zbook g7', 'temp/6342684d9ce47.png', '2022-10-09 06:21:01', 'WH3', 'hp', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000112, 'laptop', 'intel', 'i7', '10th', 'zbook g7', 'temp/6342684e170a1.png', '2022-10-09 06:21:02', 'WH3', 'hp', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000113, 'laptop', 'intel', 'i7', '10th', 'zbook g7', 'temp/6342684e8f590.png', '2022-10-09 06:21:02', 'WH3', 'hp', 'vidusha', 0, '2022-10-24 06:03:09', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000114, 'laptop', 'intel', 'i7', '10th', 'zbook g7', 'temp/6342684f180b0.png', '2022-10-09 06:21:03', 'WH3', 'hp', 'vidusha', 0, '2022-10-24 06:03:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000115, 'laptop', 'intel', 'i7', '10th', 'zbook g7', 'temp/6342684f9df3f.png', '2022-10-09 06:21:03', 'WH3', 'hp', 'vidusha', 0, '2022-10-24 05:57:17', 0, '0000-00-00 00:00:00', '2022-10-23 15:11:23', 0, 0),
(000116, 'laptop', 'intel', 'i7', '10th', 'zbook g7', 'temp/634268503c585.png', '2022-10-09 06:21:04', 'WH3', 'hp', 'vidusha', 0, '2022-10-24 06:02:56', 0, '0000-00-00 00:00:00', '2022-10-23 11:07:18', 0, 0),
(000117, 'laptop', 'intel', 'i7', '10th', 'zbook g7', 'temp/63426850d7a04.png', '2022-10-09 06:21:04', 'WH3', 'hp', 'vidusha', 0, '2022-10-24 06:03:03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000118, 'laptop', 'intel', 'i7', '10th', 'zbook g7', 'temp/6342685193f5b.png', '2022-10-09 06:21:05', 'WH3', 'hp', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000119, 'laptop', 'intel', 'i7', '10th', 'zbook g7', 'temp/63426852522b1.png', '2022-10-09 06:21:06', 'WH3', 'hp', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000120, 'laptop', 'intel', 'i7', '10th', 'zbook g7', 'temp/63426853198ad.png', '2022-10-09 06:21:07', 'WH3', 'hp', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000121, 'laptop', 'intel', 'i7', '10th', 'zbook g7', 'temp/63426853deaaa.png', '2022-10-09 06:21:07', 'WH3', 'hp', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000122, 'laptop', 'intel', 'i3', '4th', '640 c7', 'temp/634268746c3d5.png', '2022-10-09 06:21:40', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000123, 'laptop', 'intel', 'i3', '4th', '640 c7', 'temp/6342687549d87.png', '2022-10-09 06:21:41', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000124, 'laptop', 'intel', 'i3', '4th', '640 c7', 'temp/6342687632c12.png', '2022-10-09 06:21:42', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000125, 'laptop', 'intel', 'i3', '4th', '640 c7', 'temp/63426877200cf.png', '2022-10-09 06:21:43', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000126, 'laptop', 'intel', 'i3', '4th', '640 c7', 'temp/63426878140fc.png', '2022-10-09 06:21:44', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000127, 'laptop', 'intel', 'i3', '4th', '640 c7', 'temp/63426879128f8.png', '2022-10-09 06:21:45', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000128, 'laptop', 'intel', 'i3', '4th', '640 c7', 'temp/6342687a1c7b4.png', '2022-10-09 06:21:46', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000129, 'laptop', 'intel', 'i3', '4th', '640 c7', 'temp/6342687b33166.png', '2022-10-09 06:21:47', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000130, 'laptop', 'intel', 'i3', '4th', '640 c7', 'temp/6342687c4d2ff.png', '2022-10-09 06:21:48', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000131, 'laptop', 'intel', 'i3', '4th', '640 c7', 'temp/6342687d6ed8a.png', '2022-10-09 06:21:49', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000132, 'laptop', 'intel', 'i3', '4th', '640 c7', 'temp/6342687e9b0e8.png', '2022-10-09 06:21:50', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000133, 'laptop', 'intel', 'i3', '4th', '640 c7', 'temp/6342687fd04d1.png', '2022-10-09 06:21:51', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000134, 'laptop', 'intel', 'i3', '4th', '640 c7', 'temp/63426881118ee.png', '2022-10-09 06:21:53', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000135, 'laptop', 'intel', 'i3', '4th', '640 c7', 'temp/63426882525dc.png', '2022-10-09 06:21:54', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000136, 'laptop', 'intel', 'i3', '4th', '640 c7', 'temp/63426883a0eac.png', '2022-10-09 06:21:55', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000137, 'laptop', 'intel', 'i3', '4th', '640 c7', 'temp/634268850680c.png', '2022-10-09 06:21:57', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000138, 'laptop', 'intel', 'i3', '4th', '640 c7', 'temp/634268866221c.png', '2022-10-09 06:21:58', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000139, 'laptop', 'intel', 'i3', '4th', '640 c7', 'temp/63426887c4d38.png', '2022-10-09 06:21:59', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000140, 'laptop', 'intel', 'i3', '4th', '640 c7', 'temp/6342688947cf7.png', '2022-10-09 06:22:01', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000141, 'laptop', 'intel', 'i3', '4th', '640 c7', 'temp/6342688ac0aa4.png', '2022-10-09 06:22:02', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000142, 'laptop', 'intel', 'i3', '4th', '640 c7', 'temp/6342688c488cb.png', '2022-10-09 06:22:04', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000143, 'laptop', 'intel', 'i3', '4th', '640 c7', 'temp/6342688dd9587.png', '2022-10-09 06:22:05', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000144, 'laptop', 'intel', 'i3', '4th', '640 c7', 'temp/6342688f76834.png', '2022-10-09 06:22:07', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000145, 'laptop', 'intel', 'i3', '4th', '640 c7', 'temp/63426891255d5.png', '2022-10-09 06:22:09', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000146, 'laptop', 'intel', 'i3', '4th', '640 c7', 'temp/63426892d1293.png', '2022-10-09 06:22:10', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000147, 'laptop', 'intel', 'i7', '8th', 'e5530', 'temp/634268fa8b33a.png', '2022-10-09 06:23:54', 'WH1', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000148, 'laptop', 'intel', 'i7', '8th', 'e5530', 'temp/634268fc69e1b.png', '2022-10-09 06:23:56', 'WH1', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000149, 'laptop', 'intel', 'i7', '8th', 'e5530', 'temp/634268fe54048.png', '2022-10-09 06:23:58', 'WH1', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000150, 'laptop', 'intel', 'i7', '8th', 'e5530', 'temp/6342690030300.png', '2022-10-09 06:24:00', 'WH1', 'dell', 'vidusha', 0, '2022-10-20 08:53:40', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000151, 'laptop', 'intel', 'i7', '8th', 'e5530', 'temp/6342690216307.png', '2022-10-09 06:24:02', 'WH1', 'dell', 'vidusha', 0, '2022-10-20 07:41:06', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000152, 'laptop', 'intel', 'i7', '8th', 'e5530', 'temp/634269041b32e.png', '2022-10-09 06:24:04', 'WH1', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000153, 'laptop', 'intel', 'i7', '8th', 'e5530', 'temp/634269061cf46.png', '2022-10-09 06:24:06', 'WH1', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000154, 'laptop', 'intel', 'i7', '8th', 'e5530', 'temp/634269083b2c7.png', '2022-10-09 06:24:08', 'WH1', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000155, 'laptop', 'intel', 'i7', '8th', 'e5530', 'temp/6342690a647ac.png', '2022-10-09 06:24:10', 'WH1', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000156, 'laptop', 'intel', 'i7', '8th', 'e5530', 'temp/6342690c8b946.png', '2022-10-09 06:24:12', 'WH1', 'dell', 'vidusha', 0, '2022-10-20 06:08:42', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000157, 'laptop', 'intel', 'i7', '8th', 'xps 15', 'temp/6342693753781.png', '2022-10-09 06:24:55', 'WH2', 'dell', 'vidusha', 0, '2022-10-22 12:33:26', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000158, 'laptop', 'intel', 'i7', '8th', 'xps 15', 'temp/6342693974eae.png', '2022-10-09 06:24:57', 'WH2', 'dell', 'vidusha', 0, '2022-10-22 12:33:30', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000159, 'laptop', 'intel', 'i7', '8th', 'xps 15', 'temp/6342693b91a92.png', '2022-10-09 06:24:59', 'WH2', 'dell', 'vidusha', 0, '2022-10-22 12:33:34', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000160, 'laptop', 'intel', 'i7', '8th', 'xps 15', 'temp/6342693dc0e54.png', '2022-10-09 06:25:01', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000161, 'laptop', 'intel', 'i7', '8th', 'xps 15', 'temp/6342693feb335.png', '2022-10-09 06:25:03', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000162, 'laptop', 'intel', 'i7', '8th', 'xps 15', 'temp/634269423e8a5.png', '2022-10-09 06:25:06', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000163, 'laptop', 'intel', 'i7', '8th', 'xps 15', 'temp/634269448237f.png', '2022-10-09 06:25:08', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000164, 'laptop', 'intel', 'i7', '8th', 'xps 15', 'temp/63426962e6cfb.png', '2022-10-09 06:25:38', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000165, 'laptop', 'intel', 'i7', '8th', 'xps 15', 'temp/634269655fdb2.png', '2022-10-09 06:25:41', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000166, 'laptop', 'intel', 'i7', '8th', 'xps 15', 'temp/63426967d1ff5.png', '2022-10-09 06:25:43', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000167, 'laptop', 'intel', 'i7', '8th', 'xps 15', 'temp/6342696a5e782.png', '2022-10-09 06:25:46', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000168, 'laptop', 'intel', 'i7', '8th', 'xps 15', 'temp/6342696ccbf47.png', '2022-10-09 06:25:48', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000169, 'laptop', 'intel', 'i7', '8th', 'xps 15', 'temp/6342696f6efb8.png', '2022-10-09 06:25:51', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000170, 'laptop', 'intel', 'i7', '8th', 'xps 15', 'temp/634269727db6d.png', '2022-10-09 06:25:54', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000171, 'laptop', 'intel', 'i5', '6th', '820 g3', 'temp/6342698760762.png', '2022-10-09 06:26:15', 'WH1', 'hp', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000172, 'laptop', 'intel', 'i5', '6th', '820 g3', 'temp/6342698a06e35.png', '2022-10-09 06:26:18', 'WH1', 'hp', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000173, 'laptop', 'intel', 'i5', '6th', '820 g3', 'temp/6342698ca28ac.png', '2022-10-09 06:26:20', 'WH1', 'hp', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000174, 'laptop', 'intel', 'i5', '6th', '820 g3', 'temp/6342698f4f352.png', '2022-10-09 06:26:23', 'WH1', 'hp', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000175, 'laptop', 'intel', 'i5', '6th', '820 g3', 'temp/634269920ea74.png', '2022-10-09 06:26:26', 'WH1', 'hp', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000176, 'laptop', 'intel', 'i5', '6th', '820 g3', 'temp/63426994c4867.png', '2022-10-09 06:26:28', 'WH1', 'hp', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000177, 'laptop', 'intel', 'i5', '6th', '820 g3', 'temp/6342699793187.png', '2022-10-09 06:26:31', 'WH1', 'hp', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000178, 'laptop', 'intel', 'i5', '6th', '820 g3', 'temp/6342699a6293d.png', '2022-10-09 06:26:34', 'WH1', 'hp', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000179, 'laptop', 'intel', 'i5', '6th', '820 g3', 'temp/6342699d46a7a.png', '2022-10-09 06:26:37', 'WH1', 'hp', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000180, 'laptop', 'intel', 'i5', '6th', '820 g3', 'temp/634269a02bf29.png', '2022-10-09 06:26:40', 'WH1', 'hp', 'vidusha', 0, '2022-10-22 13:30:17', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000181, 'laptop', 'intel', 'i5', '6th', '820 g3', 'temp/634269a337e40.png', '2022-10-09 06:26:43', 'WH1', 'hp', 'vidusha', 0, '2022-10-22 12:32:59', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000182, 'laptop', 'intel', 'i5', '6th', '820 g3', 'temp/634269a6623bc.png', '2022-10-09 06:26:46', 'WH1', 'hp', 'vidusha', 0, '2022-10-22 13:30:23', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000183, 'laptop', 'intel', 'i5', '6th', '820 g3', 'temp/634269a9a22e9.png', '2022-10-09 06:26:49', 'WH1', 'hp', 'vidusha', 0, '2022-10-22 12:33:06', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000184, 'laptop', 'intel', 'i5', '6th', '820 g3', 'temp/634269acc8a2f.png', '2022-10-09 06:26:52', 'WH1', 'hp', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000185, 'laptop', 'intel', 'i5', '6th', '820 g3', 'temp/634269afec20a.png', '2022-10-09 06:26:55', 'WH1', 'hp', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000186, 'laptop', 'intel', 'i5', '6th', '820 g3', 'temp/634269b33056c.png', '2022-10-09 06:26:59', 'WH1', 'hp', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000187, 'laptop', 'intel', 'i5', '6th', '820 g3', 'temp/634269b660b10.png', '2022-10-09 06:27:02', 'WH1', 'hp', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000188, 'laptop', 'intel', 'i5', '6th', '820 g3', 'temp/634269b9f3239.png', '2022-10-09 06:27:05', 'WH1', 'hp', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000189, 'laptop', 'intel', 'i5', '6th', '820 g3', 'temp/634269bd46e7a.png', '2022-10-09 06:27:09', 'WH1', 'hp', 'vidusha', 0, '2022-10-20 14:17:22', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000190, 'laptop', 'intel', 'i5', '8th', 'xps 13', 'temp/6342ee86051dc.png', '2022-10-09 15:53:42', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000191, 'laptop', 'intel', 'i5', '8th', 'xps 13', 'temp/6342ee8960628.png', '2022-10-09 15:53:45', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000192, 'laptop', 'intel', 'i5', '8th', 'xps 13', 'temp/6342ee8cd2d69.png', '2022-10-09 15:53:48', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000193, 'laptop', 'intel', 'i5', '8th', 'xps 13', 'temp/6342f141eeca6.png', '2022-10-09 16:05:21', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000194, 'laptop', 'intel', 'i5', '8th', 'xps 13', 'temp/6342f14565e51.png', '2022-10-09 16:05:25', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000195, 'laptop', 'intel', 'i5', '8th', 'xps 13', 'temp/6342f148ce4c7.png', '2022-10-09 16:05:28', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000196, 'laptop', 'intel', 'i5', '8th', 'xps 13', 'temp/6342f1e43de15.png', '2022-10-09 16:08:04', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000197, 'laptop', 'intel', 'i5', '8th', 'xps 13', 'temp/6342f1e7cca5a.png', '2022-10-09 16:08:07', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000198, 'laptop', 'intel', 'i5', '8th', 'xps 13', 'temp/6342f1eb613dc.png', '2022-10-09 16:08:11', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000199, 'laptop', 'intel', 'i5', '8th', 'xps 13', 'temp/6342f28261906.png', '2022-10-09 16:10:42', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000200, 'laptop', 'intel', 'i5', '8th', 'xps 13', 'temp/6342f28613a4f.png', '2022-10-09 16:10:46', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000201, 'laptop', 'intel', 'i5', '8th', 'xps 13', 'temp/6342f289af0f1.png', '2022-10-09 16:10:49', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000202, 'laptop', 'intel', 'i7', '8th', 'e5530', 'temp/634a48ee02746.png', '2022-10-15 05:45:18', 'WH1', 'dell', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000203, 'laptop', 'intel', 'i7', '8th', 'e5530', 'temp/634a48f1d2c0d.png', '2022-10-15 05:45:21', 'WH1', 'dell', 'admin', 0, '2022-10-20 06:28:11', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000204, 'laptop', 'intel', 'i5', '7th', 'macbook air 13', 'temp/634a494dc1c17.png', '2022-10-15 05:46:53', 'WH1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000205, 'laptop', 'intel', 'i5', '1st', 'g6', 'temp/634a9e19c2433.png', '2022-10-15 11:48:41', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(000206, 'laptop', 'amd', 'i3', '1st', 'g6', 'temp/634aa1ab1e296.png', '2022-10-15 12:03:55', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(000207, 'laptop', 'intel', 'i3', '1st', '123', 'temp/634accab21960.png', '2022-10-15 15:07:23', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(000208, 'laptop', 'intel', 'i3', '1st', '123', 'temp/634accaf1ef44.png', '2022-10-15 15:07:27', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(000209, 'laptop', 'intel', 'i3', '1st', '123', 'temp/634accb33cef0.png', '2022-10-15 15:07:31', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(000210, 'laptop', 'intel', 'i3', '1st', '123', 'temp/634accb7780b5.png', '2022-10-15 15:07:35', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(000211, 'laptop', 'intel', 'i3', '1st', '123', 'temp/634accbb96eba.png', '2022-10-15 15:07:39', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(000212, 'laptop', 'intel', 'i9', '8th', 'think pad', 'temp/63539a7acd8e7.png', '2022-10-22 07:23:38', 'WH4', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6),
(000213, 'laptop', 'intel', 'i9', '8th', 'think pad', 'temp/63539a7d7a812.png', '2022-10-22 07:23:41', 'WH4', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6),
(000214, 'laptop', 'intel', 'i9', '8th', 'think pad', 'temp/63539a8001f2e.png', '2022-10-22 07:23:44', 'WH4', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6),
(000215, 'laptop', 'intel', 'i9', '8th', 'think pad', 'temp/63539a8286494.png', '2022-10-22 07:23:46', 'WH4', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6),
(000216, 'laptop', 'intel', 'i9', '8th', 'think pad', 'temp/63539a8533d35.png', '2022-10-22 07:23:49', 'WH4', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6),
(000217, 'laptop', 'intel', 'i9', '8th', 'think pad', 'temp/63539a87c2dbe.png', '2022-10-22 07:23:51', 'WH4', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6),
(000218, 'laptop', 'intel', 'i9', '8th', 'think pad', 'temp/63539a8a483eb.png', '2022-10-22 07:23:54', 'WH4', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6),
(000219, 'laptop', 'intel', 'i9', '8th', 'think pad', 'temp/63539a8cdafd6.png', '2022-10-22 07:23:56', 'WH4', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6),
(000220, 'laptop', 'intel', 'i9', '8th', 'think pad', 'temp/63539a8f77249.png', '2022-10-22 07:23:59', 'WH4', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6),
(000221, 'laptop', 'intel', 'i9', '8th', 'think pad', 'temp/63539a92166bd.png', '2022-10-22 07:24:02', 'WH4', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6),
(000222, 'laptop', 'intel', 'celeron', '7th', '840 g3', 'temp/63550649a4433.png', '2022-10-23 09:15:53', 'WH2', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 8),
(000223, 'laptop', 'intel', 'celeron', '7th', '840 g3', 'temp/6355064c0bb74.png', '2022-10-23 09:15:56', 'WH2', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 8),
(000224, 'laptop', 'intel', 'celeron', '7th', '840 g3', 'temp/6355064e5f5ff.png', '2022-10-23 09:15:58', 'WH2', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 8),
(000225, 'laptop', 'intel', 'i9', '4th', '840 g3', 'temp/635507e0c9ae4.png', '2022-10-23 09:22:40', 'WH4', 'gigabyte', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6),
(000226, 'laptop', 'intel', 'i9', '4th', '840 g3', 'temp/635507e34544a.png', '2022-10-23 09:22:43', 'WH4', 'gigabyte', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6),
(000227, 'laptop', 'intel', 'i9', '4th', '840 g3', 'temp/635507e5ada79.png', '2022-10-23 09:22:45', 'WH4', 'gigabyte', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6),
(000229, 'laptop', 'intel', 'i9', '6th', 'abca', 'temp/6356ad5d664fd.png', '2022-10-24 15:21:01', 'WH1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 3),
(000230, 'laptop', 'intel', 'i9', '6th', 'abca', 'temp/6356ad5fe582e.png', '2022-10-24 15:21:03', 'WH1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 3),
(000231, 'laptop', 'intel', 'i9', '6th', 'abca', 'temp/6356ad626b70d.png', '2022-10-24 15:21:06', 'WH1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 3),
(000232, 'laptop', 'intel', 'i9', '6th', 'abca', 'temp/6356ad64df652.png', '2022-10-24 15:21:08', 'WH1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 3),
(000233, 'laptop', 'intel', 'i9', '6th', 'abca', 'temp/6356ad676c0c3.png', '2022-10-24 15:21:11', 'WH1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 3),
(000234, 'laptop', 'intel', 'i9', '6th', 'abca', 'temp/6356ad69eab84.png', '2022-10-24 15:21:13', 'WH1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 3),
(000235, 'laptop', 'intel', 'i9', '6th', 'abca', 'temp/6356ad6c7da5c.png', '2022-10-24 15:21:16', 'WH1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 3),
(000236, 'laptop', 'intel', 'i9', '6th', 'abca', 'temp/6356ad6f1291b.png', '2022-10-24 15:21:19', 'WH1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 3),
(000237, 'laptop', 'intel', 'i9', '6th', 'abca', 'temp/6356ad719e9bc.png', '2022-10-24 15:21:21', 'WH1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 3),
(000238, 'laptop', 'intel', 'i9', '6th', 'abca', 'temp/6356ad7442385.png', '2022-10-24 15:21:24', 'WH1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 3),
(000239, 'laptop', 'intel', 'i9', '6th', 'abca', 'temp/6356ad76e5d23.png', '2022-10-24 15:21:26', 'WH1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 3),
(000240, 'laptop', 'intel', 'i9', '6th', 'abca', 'temp/6356ad79a592b.png', '2022-10-24 15:21:29', 'WH1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 3),
(000241, 'laptop', 'intel', 'i9', '8th', 'not acceptable', 'temp/6356aecf83872.png', '2022-10-24 15:27:11', 'WH3', 'asus', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6),
(000242, 'laptop', 'intel', 'i9', '8th', 'not acceptable', 'temp/6356aed23efe2.png', '2022-10-24 15:27:14', 'WH3', 'asus', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6),
(000243, 'laptop', 'intel', 'i9', '8th', 'not acceptable', 'temp/6356aed4e375f.png', '2022-10-24 15:27:16', 'WH3', 'asus', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6),
(000244, 'laptop', 'intel', 'i9', '8th', 'not acceptable', 'temp/6356af218861e.png', '2022-10-24 15:28:33', 'WH3', 'asus', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6),
(000245, 'laptop', 'intel', 'i9', '8th', 'not acceptable', 'temp/6356af244a463.png', '2022-10-24 15:28:36', 'WH3', 'asus', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6),
(000246, 'laptop', 'intel', 'i9', '8th', 'not acceptable', 'temp/6356af2715835.png', '2022-10-24 15:28:39', 'WH3', 'asus', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6),
(000247, 'laptop', 'intel', 'i9', '9th', '45lkhu', 'temp/6356af7a1bd3c.png', '2022-10-24 15:30:02', 'WH4', 'asus', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 9),
(000248, 'laptop', 'intel', 'i9', '9th', '45lkhu', 'temp/6356af7cdbca2.png', '2022-10-24 15:30:04', 'WH4', 'asus', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 9),
(000249, 'laptop', 'intel', 'i9', '9th', '45lkhu', 'temp/6356af7faa10c.png', '2022-10-24 15:30:07', 'WH4', 'asus', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 9),
(000250, 'laptop', 'intel', 'i7', '3rd', 'probook', 'temp/6356b0eb3e80e.png', '2022-10-24 15:36:11', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 5),
(000251, 'laptop', 'intel', 'i7', '3rd', 'probook', 'temp/6356b0ee223bc.png', '2022-10-24 15:36:14', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 5),
(000252, 'laptop', 'intel', 'i7', '3rd', 'probook', 'temp/6356b0f10d75d.png', '2022-10-24 15:36:17', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 5),
(000253, 'laptop', 'intel', 'i7', '3rd', 'probookwewe', 'temp/6356b0f41be28.png', '2022-10-24 15:36:20', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 5),
(000254, 'laptop', 'intel', 'i7', '3rd', 'probookwewe', 'temp/6356b0f728834.png', '2022-10-24 15:36:23', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 5),
(000255, 'laptop', 'intel', 'i7', '3rd', 'probookwewe', 'temp/6356b0fa44522.png', '2022-10-24 15:36:26', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 5),
(000256, 'laptop', 'intel', 'i7', '3rd', 'probookwewe', 'temp/6356b0fd58721.png', '2022-10-24 15:36:29', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 5),
(000257, 'laptop', 'intel', 'i7', '3rd', 'probookwewe', 'temp/6356b10050fd1.png', '2022-10-24 15:36:32', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 5),
(000258, 'laptop', 'intel', 'i7', '3rd', 'probookwewe', 'temp/6356b1036cf3d.png', '2022-10-24 15:36:35', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 5),
(000259, 'laptop', 'intel', 'i7', '3rd', 'probookwewe', 'temp/6356b10678fd4.png', '2022-10-24 15:36:38', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 5),
(000260, 'laptop', 'intel', 'i7', '3rd', 'probookwewe', 'temp/6356b109795b2.png', '2022-10-24 15:36:41', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 5),
(000261, 'laptop', 'intel', 'i7', '3rd', 'probookwewe', 'temp/6356b10c92208.png', '2022-10-24 15:36:44', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 5),
(000262, 'laptop', 'intel', 'i7', '3rd', 'probookwewe', 'temp/6356b11241d94.png', '2022-10-24 15:36:50', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 5),
(000263, 'laptop', 'intel', 'i7', '3rd', 'probookwewe', 'temp/6356b115543db.png', '2022-10-24 15:36:53', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 5),
(000264, 'laptop', 'intel', 'i7', '3rd', 'probookwewe', 'temp/6356b11868bbf.png', '2022-10-24 15:36:56', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 5),
(000265, 'laptop', 'intel', 'i5', '5th', 'probook', 'temp/6356b1fa04634.png', '2022-10-24 15:40:42', 'WH4', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 5),
(000266, 'laptop', 'intel', 'i5', '5th', 'probook', 'temp/6356b1fd35af3.png', '2022-10-24 15:40:45', 'WH4', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 5),
(000267, 'laptop', 'intel', 'celeron', '3', 'probook', 'temp/6356b3c20f727.png', '2022-10-24 15:48:18', 'wh3', 'asus', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 3),
(000268, 'laptop', 'intel', 'celeron', '3', 'probook', 'temp/6356b3c52e818.png', '2022-10-24 15:48:21', 'wh3', 'asus', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 3),
(000269, 'laptop', 'intel', 'celeron', '3', 'probook', 'temp/6356b3c8537db.png', '2022-10-24 15:48:24', 'wh3', 'asus', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 3),
(000270, 'laptop', 'intel', 'i5', '3', 'asas', 'temp/6356bf160dc9c.png', '2022-10-24 16:36:38', 'wh1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 3),
(000271, 'laptop', 'intel', 'i5', '3', 'asas', 'temp/6356bf1610dc6.png', '2022-10-24 16:36:38', 'wh1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 3),
(000272, 'laptop', 'intel', 'i5', '3', 'asas', 'temp/6356bf161192a.png', '2022-10-24 16:36:38', 'wh1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 3),
(000273, 'laptop', 'intel', 'i5', '3', 'asas', 'temp/6356bf161237f.png', '2022-10-24 16:36:38', 'wh1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 3),
(000274, 'laptop', 'intel', 'i5', '3', 'asas', 'temp/6356bf1612cfb.png', '2022-10-24 16:36:38', 'wh1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 3),
(000285, 'laptop', 'intel', 'i9', '6', 'anuradha11', 'temp/6356c034bad73.png', '2022-10-24 16:41:24', 'wh3', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 5),
(000286, 'laptop', 'intel', 'i9', '6', 'anuradha11', 'temp/6356c034bdce2.png', '2022-10-24 16:41:24', 'wh3', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 5),
(000287, 'laptop', 'intel', 'i9', '6', 'anuradha11', 'temp/6356c034beca1.png', '2022-10-24 16:41:24', 'wh3', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 5),
(000288, 'laptop', 'intel', 'i9', '6', 'anuradha11', 'temp/6356c034bf544.png', '2022-10-24 16:41:24', 'wh3', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 5),
(000289, 'laptop', 'intel', 'i9', '6', 'anuradha11', 'temp/6356c034bfdf6.png', '2022-10-24 16:41:24', 'wh3', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 5),
(000290, 'laptop', 'intel', 'i9', '6', 'anuradha11', 'temp/6356c034c04fd.png', '2022-10-24 16:41:24', 'wh3', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 5),
(000291, 'laptop', 'intel', 'i9', '6', 'anuradha11', 'temp/6356c034c0afd.png', '2022-10-24 16:41:24', 'wh3', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 5),
(000292, 'laptop', 'intel', 'i9', '6', 'anuradha11', 'temp/6356c034c1196.png', '2022-10-24 16:41:24', 'wh3', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 5),
(000293, 'laptop', 'intel', 'i9', '6', 'anuradha11', 'temp/6356c034c1823.png', '2022-10-24 16:41:24', 'wh3', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 5),
(000294, 'laptop', 'intel', 'i9', '6', 'anuradha11', 'temp/6356c034c1dff.png', '2022-10-24 16:41:24', 'wh3', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 5),
(000938, 'laptop', 'amd', 'xeon', '4', 'anuradha', 'temp/635774251ecce.png', '2022-10-25 05:29:09', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales_order_add_items`
--
ALTER TABLE `sales_order_add_items`
  ADD CONSTRAINT `fksales_order_id` FOREIGN KEY (`sales_order_id`) REFERENCES `sales_order_information` (`sales_order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales_order_information`
--
ALTER TABLE `sales_order_information`
  ADD CONSTRAINT `sales_order_information_ibfk_1` FOREIGN KEY (`sales_order_id`) REFERENCES `sales_order_information` (`sales_order_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
