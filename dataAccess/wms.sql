-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 16, 2022 at 01:44 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `sales_order_id` int(11) NOT NULL,
  `a_scratch` int(11) NOT NULL,
  `a_broken` int(11) NOT NULL,
  `a_dent` int(11) NOT NULL,
  `b_scratch` int(11) NOT NULL,
  `b_broken` int(11) NOT NULL,
  `b_logo` int(11) NOT NULL,
  `b_color` int(11) NOT NULL,
  `c_scratch` int(11) NOT NULL,
  `c_broken` int(11) NOT NULL,
  `c_dent` int(11) NOT NULL,
  `d_scratch` int(11) NOT NULL,
  `d_broken` int(11) NOT NULL,
  `d_dent` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bodywork_dep`
--

DROP TABLE IF EXISTS `bodywork_dep`;
CREATE TABLE IF NOT EXISTS `bodywork_dep` (
  `bodywork_id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  PRIMARY KEY (`bodywork_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `emp_id` int(11) NOT NULL,
  `sales_order_id` int(11) NOT NULL,
  `keyboard` int(11) NOT NULL,
  `speakers` int(11) NOT NULL,
  `camera` int(11) NOT NULL,
  `bazel` int(11) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL,
  `damage_keys` int(11) NOT NULL,
  `mousepad` int(11) NOT NULL,
  `mouse_pad_button` int(11) NOT NULL,
  `camera_cable` int(11) NOT NULL,
  `back_cover` int(11) NOT NULL,
  `wifi_card` int(11) NOT NULL,
  `lcd_cable` int(11) NOT NULL,
  `battery` int(11) NOT NULL,
  `battery_cable` int(11) NOT NULL,
  `dvd_rom` int(11) NOT NULL,
  `dvd_caddy` int(11) NOT NULL,
  `hdd_caddy` int(11) NOT NULL,
  `hdd_cable_connector` int(11) NOT NULL,
  `c_panel_palm_rest` int(11) NOT NULL,
  `mb_base` int(11) NOT NULL,
  `hings_cover` int(11) NOT NULL,
  `lan_cover` int(11) NOT NULL,
  `combined_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=454 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `combine_check`
--

INSERT INTO `combine_check` (`id`, `inventory_id`, `emp_id`, `sales_order_id`, `keyboard`, `speakers`, `camera`, `bazel`, `created_time`, `status`, `damage_keys`, `mousepad`, `mouse_pad_button`, `camera_cable`, `back_cover`, `wifi_card`, `lcd_cable`, `battery`, `battery_cable`, `dvd_rom`, `dvd_caddy`, `hdd_caddy`, `hdd_cable_connector`, `c_panel_palm_rest`, `mb_base`, `hings_cover`, `lan_cover`, `combined_id`) VALUES
(443, 000172, 1037, 1000, 1, 1, 0, 0, '2022-11-16 12:47:02', 1, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 1, 0),
(444, 000175, 1037, 1000, 1, 1, 1, 1, '2022-11-16 12:51:38', 1, 1, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 0),
(445, 000173, 1037, 1000, 0, 0, 0, 0, '2022-11-16 12:52:02', 1, 0, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0),
(446, 000157, 1037, 1000, 1, 1, 1, 1, '2022-11-16 12:52:34', 1, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0),
(447, 000158, 1037, 1000, 1, 1, 1, 1, '2022-11-16 12:52:55', 1, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0),
(448, 000159, 1037, 1000, 1, 1, 1, 1, '2022-11-16 12:53:16', 1, 1, 1, 0, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0),
(449, 000100, 1037, 1000, 1, 1, 1, 1, '2022-11-16 12:54:00', 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(450, 000101, 1037, 1000, 0, 1, 1, 1, '2022-11-16 12:54:37', 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 1, 0),
(451, 000102, 1037, 1000, 0, 0, 1, 0, '2022-11-16 12:55:10', 1, 1, 1, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0),
(452, 000103, 1037, 1000, 0, 0, 0, 0, '2022-11-16 12:55:34', 1, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0),
(453, 000104, 1037, 1000, 0, 0, 0, 0, '2022-11-16 12:55:53', 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `core`
--

DROP TABLE IF EXISTS `core`;
CREATE TABLE IF NOT EXISTS `core` (
  `core_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `phone_code` int(11) NOT NULL,
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
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `device_id` int(11) NOT NULL,
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
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
CREATE TABLE IF NOT EXISTS `district` (
  `district_id` int(11) NOT NULL AUTO_INCREMENT,
  `district_name` varchar(20) NOT NULL,
  `province_id` int(11) NOT NULL,
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `district_name`, `province_id`) VALUES
(1, 'Ampara', 2),
(2, 'Anuradhapura', 3),
(3, 'Badulla', 8),
(4, 'Batticaloa', 2),
(5, 'Colombo', 9),
(6, 'Galle', 7),
(7, 'Gampaha', 9),
(8, 'Hambantota', 7),
(9, 'Jaffna', 5),
(10, 'Kalutara', 9),
(11, 'Kandy', 1),
(12, 'Kegalle', 6),
(13, 'Kilinochchi', 5),
(14, 'Kurunegala', 4),
(15, 'Mannar', 5),
(16, 'Matale', 1),
(17, 'Matara', 7),
(18, 'Moneragala', 8),
(19, 'Mullaitivu', 5),
(20, 'Nuwara Eliya', 1),
(21, 'Polonnaruwa', 3),
(22, 'Puttalam', 4),
(23, 'Ratnapura', 6),
(24, 'Trincomalee', 2),
(25, 'Vavuniya', 5);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `discontinuation_date` varchar(15) NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1041 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `first_name`, `last_name`, `email`, `full_name`, `gender`, `birthday`, `current_passport`, `passport_expiring_date`, `visa_type`, `visa_expiring_date`, `contact_number`, `relationship`, `current_address`, `current_country`, `permanent_address`, `resident_country`, `emergency_contact`, `profile_photo`, `department`, `labour_category`, `join_date`, `note`, `old_passport`, `created_time`, `discontinuation_date`, `created_by`, `is_active`) VALUES
(1033, 'kasun', 'karunatilake', 'kasunkarunatilaka@gmail.com', 'kasun karunatilake', 'male', '2022-10-14', 'n5100500', '2022-11-05', '8', '2022-11-05', '234234234', 'married', 'al nadha', 'aruba', 'not mention', 'argentina', '234234234', 'aaa.png', '4', '8', '2022-10-27', '234234234', '1342134234', '2022-10-27 12:34:13', '', 'admin', 0),
(1034, 'sampath', 'karunatilake', 'kasunkarunatilaka@gmail.com', 'sampath karunatilake', 'other', '2022-10-15', 'n5100500213', '2022-10-29', '9', '2022-11-05', '1232131', 'divorce', 'al nadha', 'bahamas', 'not mention', 'armenia', '123123123', 'aaa.png', '1', '4', '2022-10-26', '3213213213', '1342134234', '2022-10-27 12:39:55', '', 'admin', 0),
(1035, 'min', 'chang', 'oioi@gmail.com', 'min chang', 'male', '2022-10-25', 'ghfj56757', '2022-11-04', '7', '2022-11-04', '675858', 'complicate', 'al nadha', 'austria', 'not mention', 'armenia', '4565', 'aaa.png', '2', '8', '2022-10-28', '5656456', 'ewr678568', '2022-10-27 12:41:49', '', 'admin', 0),
(1036, 'jahidh', 'abdhulla', 'kasunkarunatilaka@gmail.com', 'palayan ban yanna', 'female', '2022-10-06', '345g', '2022-11-04', '6', '2022-10-28', '356345345', 'complicate', 'al nadha', 'aruba', 'not mention', 'australia', '345345345', 'aaa.png', '2', '10', '2022-10-26', 'dfsgs', '345g', '2022-10-27 12:43:50', '', 'admin', 0),
(1037, 'sandika', 'mahawatte', 'sandika@cb.com', 'sandika mahawatte', 'male', '2022-10-13', '35454', '2025-02-02', '4', '2024-11-30', '362554', 'complicate', 'sds', 'saint barthelemy', 'dsasd', 'saint barthelemy', '3564564', 'aaa.png', '1', '6', '2022-09-10', 'wesq', '3654564', '2022-10-27 12:53:44', '', 'admin', 0),
(1038, 'sam', 'cheng', 'matanamne@gmail.com', 'sam gg cheng', 'female', '2022-09-29', 'abcariya225', '2023-05-02', '11', '2022-12-02', '071748293', 'complicate', 'al nadha', 'bahamas', 'not mention', 'azerbaijan', '119', 'aaa.png', '1', '6', '2022-11-01', 'mu nam hari yanne ne dekak gahala pannapan bn ', '', '2022-11-07 12:18:55', '', 'admin', 0),
(1039, 'asdad', 'sdfdsfsf', '', 'sdasdad', 'male', '2023-01-02', '2313123', '2023-01-01', '1', '2024-03-21', '1212', 'unmarried', 'sdfdf', 'afghanistan', 'sfsfsf', 'afghanistan', '1', '3840x1080-wallpaper-043.jpg', '9', '4', '2022-10-31', 'asdsdads', '1312313', '2022-11-13 14:52:48', '', 'admin', 0),
(1040, 'sfsfsf', 'sdassfasf', '', 'sdfsfsdfs', 'male', '2020-02-04', '1231313', '2024-03-03', '3', '2024-12-31', '0123213123', 'married', '123213', 'aland islands', 'sfsfsf', 'afghanistan', '1', 'dual-monitor-wallpaper-7.jpg', '9', '6', '2022-11-03', 'adadsa', 'q31123213123', '2022-11-13 14:54:17', '', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `e_com_listing`
--

DROP TABLE IF EXISTS `e_com_listing`;
CREATE TABLE IF NOT EXISTS `e_com_listing` (
  `listing_id` int(11) NOT NULL AUTO_INCREMENT,
  `promo_type` varchar(20) NOT NULL,
  `catelog_sku` varchar(40) NOT NULL,
  `brand` varchar(40) NOT NULL,
  `model` varchar(40) NOT NULL,
  `size` int(11) NOT NULL,
  `generation` int(11) NOT NULL,
  `cpu` varchar(10) NOT NULL,
  `ram` int(11) NOT NULL,
  `hdd` int(11) NOT NULL,
  `our_wholesale_price` int(11) NOT NULL,
  `our_current_noon_price` int(11) NOT NULL,
  `other_noon_price` int(11) NOT NULL,
  `amazon_price` int(11) NOT NULL,
  `cartlow_price` int(11) NOT NULL,
  `cost_with_windows_ac` int(11) NOT NULL,
  `gross_profit` int(11) NOT NULL,
  `noon_charges` int(11) NOT NULL,
  `noon_sale_price` int(11) NOT NULL,
  `noon_paid` int(11) NOT NULL,
  `noon_net_profit` int(11) NOT NULL,
  `profit_percentage` int(11) NOT NULL,
  `created_by` varchar(40) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `qty` int(11) NOT NULL,
  `exp_date` datetime NOT NULL,
  `status` varchar(40) NOT NULL,
  PRIMARY KEY (`listing_id`)
) ENGINE=InnoDB AUTO_INCREMENT=222 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `e_com_listing`
--

INSERT INTO `e_com_listing` (`listing_id`, `promo_type`, `catelog_sku`, `brand`, `model`, `size`, `generation`, `cpu`, `ram`, `hdd`, `our_wholesale_price`, `our_current_noon_price`, `other_noon_price`, `amazon_price`, `cartlow_price`, `cost_with_windows_ac`, `gross_profit`, `noon_charges`, `noon_sale_price`, `noon_paid`, `noon_net_profit`, `profit_percentage`, `created_by`, `created_date`, `qty`, `exp_date`, `status`) VALUES
(211, 'B friday ', ' ', 'hp ', 'zbook g7 ', 0, 0, '--Select C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'add his name from session', '2022-11-14 16:21:54', 0, '0000-00-00 00:00:00', ''),
(212, 'B friday ', ' ', 'hp ', 'zbook g7 ', 0, 0, '--Select C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'add his name from session', '2022-11-14 16:28:45', 0, '0000-00-00 00:00:00', ''),
(213, 'B friday ', ' ', 'hp ', 'zbook g7 ', 0, 0, '--Select C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'add his name from session', '2022-11-14 16:29:19', 0, '0000-00-00 00:00:00', ''),
(214, 'B friday ', ' ', 'hp ', 'zbook g7 ', 0, 0, '--Select C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'add his name from session', '2022-11-14 16:33:44', 0, '0000-00-00 00:00:00', ''),
(215, '--Select Promotion T', ' ', '--Select brand-- ', ' ', 0, 0, ' ', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'add his name from session', '2022-11-14 16:33:47', 0, '0000-00-00 00:00:00', ''),
(216, '--Select Promotion T', ' ', '--Select brand-- ', ' ', 0, 0, ' ', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'add his name from session', '2022-11-14 16:33:57', 0, '0000-00-00 00:00:00', ''),
(217, 'weekly ', 'cdxbdfxbg ', 'hp ', '820 g3 ', 14, 6, 'i5 ', 4, 32, 1060, 0, 0, 0, 0, 1180, 1005, 242, 2199, 1943, 763, 65, 'add his name from session', '2022-11-14 16:48:03', 0, '0000-00-00 00:00:00', ''),
(218, '11:11 ', 'asasas ', 'dell ', 'e5530 ', 14, 8, 'i7 ', 4, 32, 1060, 0, 0, 0, 0, 1180, 1005, 242, 2199, 1943, 763, 65, 'add his name from session', '2022-11-14 16:54:52', 22, '2022-11-30 00:00:00', 'listing submitted'),
(219, '11:11 ', 'asasas ', 'dell ', 'e5530 ', 14, 8, 'i7 ', 4, 32, 1060, 0, 0, 0, 0, 1180, 1005, 242, 2199, 1943, 763, 65, 'add his name from session', '2022-11-14 16:57:10', 22, '2022-11-30 00:00:00', 'listing submitted'),
(220, '11:11 ', 'asasas ', 'dell ', 'e5530 ', 14, 8, 'i7 ', 4, 32, 1060, 0, 0, 0, 0, 1180, 1005, 242, 2199, 1943, 763, 65, 'add his name from session', '2022-11-14 17:00:26', 22, '2022-11-30 00:00:00', 'listing submitted'),
(221, '11:11 ', 'asasas ', 'dell ', 'e5530 ', 14, 8, 'i7 ', 4, 32, 1060, 0, 0, 0, 0, 1180, 1005, 242, 2199, 1943, 763, 65, 'add his name from session', '2022-11-14 17:01:30', 22, '2022-11-30 00:00:00', 'listing submitted');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
CREATE TABLE IF NOT EXISTS `gender` (
  `gender_id` int(11) NOT NULL AUTO_INCREMENT,
  `gender` varchar(10) NOT NULL,
  PRIMARY KEY (`gender_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`gender_id`, `gender`) VALUES
(1, 'male'),
(2, 'female');

-- --------------------------------------------------------

--
-- Table structure for table `generation`
--

DROP TABLE IF EXISTS `generation`;
CREATE TABLE IF NOT EXISTS `generation` (
  `generation_id` int(11) NOT NULL AUTO_INCREMENT,
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
-- Table structure for table `lcd_check`
--

DROP TABLE IF EXISTS `lcd_check`;
CREATE TABLE IF NOT EXISTS `lcd_check` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `emp_id` int(11) NOT NULL,
  `sales_order_id` int(11) NOT NULL,
  `whitespot` int(11) DEFAULT NULL,
  `scratch` int(11) DEFAULT NULL,
  `broken` int(11) NOT NULL,
  `line_lcd` int(11) NOT NULL,
  `yellow_shadow` int(11) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lcd_check`
--

INSERT INTO `lcd_check` (`id`, `inventory_id`, `emp_id`, `sales_order_id`, `whitespot`, `scratch`, `broken`, `line_lcd`, `yellow_shadow`, `created_time`, `status`) VALUES
(33, 000174, 1037, 1000, 0, 0, 0, 0, 0, '2022-11-16 12:32:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lcd_dep`
--

DROP TABLE IF EXISTS `lcd_dep`;
CREATE TABLE IF NOT EXISTS `lcd_dep` (
  `lcd_id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  PRIMARY KEY (`lcd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
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
-- Table structure for table `motherbaord_dep`
--

DROP TABLE IF EXISTS `motherbaord_dep`;
CREATE TABLE IF NOT EXISTS `motherbaord_dep` (
  `motherboard_id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  PRIMARY KEY (`motherboard_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `motherboard_assign`
--

DROP TABLE IF EXISTS `motherboard_assign`;
CREATE TABLE IF NOT EXISTS `motherboard_assign` (
  `motherboard_assign_task_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_order_id` int(11) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `device` varchar(11) NOT NULL,
  `brand` varchar(11) NOT NULL,
  `processor` varchar(11) NOT NULL,
  `core` varchar(11) NOT NULL,
  `generation` varchar(11) NOT NULL,
  `model` varchar(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `assign_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `task_completed_time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`motherboard_assign_task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `motherboard_check`
--

DROP TABLE IF EXISTS `motherboard_check`;
CREATE TABLE IF NOT EXISTS `motherboard_check` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `emp_id` int(11) NOT NULL,
  `sales_order_id` int(11) NOT NULL,
  `bios_check` int(11) NOT NULL,
  `no_power` int(11) NOT NULL,
  `usb_connection` int(11) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL,
  `completed_time` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=218 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `motherboard_check`
--

INSERT INTO `motherboard_check` (`id`, `inventory_id`, `emp_id`, `sales_order_id`, `bios_check`, `no_power`, `usb_connection`, `created_time`, `status`, `completed_time`) VALUES
(207, 000172, 1037, 1000, 0, 0, 0, '2022-11-16 12:46:49', 0, '2022-11-16 16:46:49'),
(208, 000175, 1037, 1000, 0, 0, 0, '2022-11-16 12:51:25', 0, '2022-11-16 16:51:25'),
(209, 000173, 1037, 1000, 0, 0, 0, '2022-11-16 12:51:48', 0, '2022-11-16 16:51:48'),
(210, 000157, 1037, 1000, 0, 0, 0, '2022-11-16 12:52:19', 0, '2022-11-16 16:52:19'),
(211, 000158, 1037, 1000, 0, 0, 0, '2022-11-16 12:52:42', 0, '2022-11-16 16:52:42'),
(212, 000159, 1037, 1000, 0, 0, 0, '2022-11-16 12:53:02', 0, '2022-11-16 16:53:02'),
(213, 000100, 1037, 1000, 0, 0, 0, '2022-11-16 12:53:44', 0, '2022-11-16 16:53:44'),
(214, 000101, 1037, 1000, 0, 0, 0, '2022-11-16 12:54:09', 0, '2022-11-16 16:54:09'),
(215, 000102, 1037, 1000, 0, 0, 0, '2022-11-16 12:54:44', 0, '2022-11-16 16:54:44'),
(216, 000103, 1037, 1000, 0, 0, 0, '2022-11-16 12:55:21', 0, '2022-11-16 16:55:21'),
(217, 000104, 1037, 1000, 0, 0, 0, '2022-11-16 12:55:41', 0, '2022-11-16 16:55:41');

-- --------------------------------------------------------

--
-- Table structure for table `motherboard_dep`
--

DROP TABLE IF EXISTS `motherboard_dep`;
CREATE TABLE IF NOT EXISTS `motherboard_dep` (
  `motherboard_id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `sales_order_id` int(11) NOT NULL,
  `created_by` varchar(15) NOT NULL,
  `received_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL,
  PRIMARY KEY (`motherboard_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `packing_dep`
--

DROP TABLE IF EXISTS `packing_dep`;
CREATE TABLE IF NOT EXISTS `packing_dep` (
  `packing_id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  PRIMARY KEY (`packing_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `painting_dep`
--

DROP TABLE IF EXISTS `painting_dep`;
CREATE TABLE IF NOT EXISTS `painting_dep` (
  `painting_id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  PRIMARY KEY (`painting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `part_list`
--

DROP TABLE IF EXISTS `part_list`;
CREATE TABLE IF NOT EXISTS `part_list` (
  `part_id` int(11) NOT NULL AUTO_INCREMENT,
  `part_name` varchar(100) NOT NULL,
  PRIMARY KEY (`part_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `part_list`
--

INSERT INTO `part_list` (`part_id`, `part_name`) VALUES
(1, 'camera'),
(2, 'keyboard'),
(3, 'dvd caddy'),
(4, 'battery'),
(5, 'mouse pad'),
(6, 'mouse'),
(7, 'bazel'),
(8, 'camera cable'),
(9, 'back cover'),
(10, 'lcd cable'),
(11, 'wifi card'),
(12, 'battery'),
(13, 'battery cable'),
(14, 'dvd rom'),
(15, 'dvd caddy'),
(16, 'hdd caddy'),
(17, 'hdd connection caddy'),
(18, 'a/top'),
(19, 'c/panel plam rest '),
(20, 'd/mb base'),
(21, 'hings cover'),
(22, 'lan cover');

-- --------------------------------------------------------

--
-- Table structure for table `part_stock`
--

DROP TABLE IF EXISTS `part_stock`;
CREATE TABLE IF NOT EXISTS `part_stock` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `part_name` varchar(100) NOT NULL,
  `part_model` varchar(100) NOT NULL,
  `part_brand` varchar(100) NOT NULL,
  `part_gen` varchar(40) DEFAULT NULL,
  `capacity` varchar(6) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `location` varchar(40) NOT NULL,
  `rack_number` varchar(10) NOT NULL,
  `slot_name` varchar(10) NOT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `part_stock`
--

INSERT INTO `part_stock` (`stock_id`, `part_name`, `part_model`, `part_brand`, `part_gen`, `capacity`, `qty`, `location`, `rack_number`, `slot_name`) VALUES
(105, 'keyboard', '820 g3', 'hp', '0', '0', 5, 'RACK-3', 'B-5', '0');

-- --------------------------------------------------------

--
-- Table structure for table `prepared_part`
--

DROP TABLE IF EXISTS `prepared_part`;
CREATE TABLE IF NOT EXISTS `prepared_part` (
  `prep_id` int(11) NOT NULL AUTO_INCREMENT,
  `location` int(11) NOT NULL,
  `model` int(11) NOT NULL,
  `request_created_date` date NOT NULL,
  `delivery_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL,
  `keyboard` int(11) NOT NULL,
  `speacker` int(11) NOT NULL,
  `camera` int(11) NOT NULL,
  `bazel` int(11) NOT NULL,
  `lan_cover` int(11) NOT NULL,
  `mousepad` int(11) NOT NULL,
  `mouse_pad_button` int(11) NOT NULL,
  `camera_cable` int(11) NOT NULL,
  `back_cover` int(11) NOT NULL,
  `wifi_card` int(11) NOT NULL,
  `lcd_cable` int(11) NOT NULL,
  `battery` int(11) NOT NULL,
  `battery_cable` int(11) NOT NULL,
  `dvd_rom` int(11) NOT NULL,
  `dvd_caddy` int(11) NOT NULL,
  `hdd_caddy` int(11) NOT NULL,
  `hdd_cable_connector` int(11) NOT NULL,
  `mb_base` int(11) NOT NULL,
  `hings_cover` int(11) NOT NULL,
  PRIMARY KEY (`prep_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `processor`
--

DROP TABLE IF EXISTS `processor`;
CREATE TABLE IF NOT EXISTS `processor` (
  `processor_id` int(11) NOT NULL AUTO_INCREMENT,
  `processor` varchar(10) NOT NULL,
  `parent` bigint(20) NOT NULL,
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
  `production_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_order_id` int(11) NOT NULL,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `received_date` datetime NOT NULL,
  `created_by` varchar(25) NOT NULL,
  PRIMARY KEY (`production_id`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`production_id`, `sales_order_id`, `inventory_id`, `received_date`, `created_by`) VALUES
(103, 1000, 000100, '2022-11-16 16:01:03', 'admin'),
(104, 1000, 000101, '2022-11-16 16:01:04', 'admin'),
(105, 1000, 000102, '2022-11-16 16:01:05', 'admin'),
(106, 1000, 000103, '2022-11-16 16:01:06', 'admin'),
(107, 1000, 000104, '2022-11-16 16:01:08', 'admin'),
(108, 1000, 000105, '2022-11-16 16:01:09', 'admin'),
(109, 1000, 000106, '2022-11-16 16:01:11', 'admin'),
(110, 1000, 000107, '2022-11-16 16:01:13', 'admin'),
(111, 1000, 000108, '2022-11-16 16:01:14', 'admin'),
(112, 1000, 000109, '2022-11-16 16:01:16', 'admin'),
(113, 1000, 000110, '2022-11-16 16:01:17', 'admin'),
(114, 1000, 000111, '2022-11-16 16:01:18', 'admin'),
(115, 1000, 000112, '2022-11-16 16:01:19', 'admin'),
(116, 1000, 000113, '2022-11-16 16:01:20', 'admin'),
(117, 1000, 000114, '2022-11-16 16:01:21', 'admin'),
(118, 1000, 000115, '2022-11-16 16:01:22', 'admin'),
(119, 1000, 000116, '2022-11-16 16:01:23', 'admin'),
(120, 1000, 000117, '2022-11-16 16:01:27', 'admin'),
(121, 1000, 000118, '2022-11-16 16:01:28', 'admin'),
(122, 1000, 000119, '2022-11-16 16:01:30', 'admin'),
(123, 1000, 000157, '2022-11-16 16:01:35', 'admin'),
(124, 1000, 000158, '2022-11-16 16:01:37', 'admin'),
(125, 1000, 000159, '2022-11-16 16:01:39', 'admin'),
(126, 1000, 000160, '2022-11-16 16:01:40', 'admin'),
(127, 1000, 000161, '2022-11-16 16:01:42', 'admin'),
(128, 1000, 000162, '2022-11-16 16:01:43', 'admin'),
(129, 1000, 000163, '2022-11-16 16:01:44', 'admin'),
(130, 1000, 000165, '2022-11-16 16:01:45', 'admin'),
(131, 1000, 000164, '2022-11-16 16:01:48', 'admin'),
(132, 1000, 000166, '2022-11-16 16:02:00', 'admin'),
(133, 1000, 000175, '2022-11-16 16:02:03', 'admin'),
(134, 1000, 000172, '2022-11-16 16:02:07', 'admin'),
(135, 1000, 000173, '2022-11-16 16:02:08', 'admin'),
(136, 1000, 000174, '2022-11-16 16:02:10', 'admin'),
(137, 1000, 000176, '2022-11-16 16:02:12', 'admin'),
(138, 1000, 000177, '2022-11-16 16:02:13', 'admin'),
(139, 1000, 000178, '2022-11-16 16:02:16', 'admin'),
(140, 1000, 000179, '2022-11-16 16:02:17', 'admin'),
(141, 1000, 000180, '2022-11-16 16:02:19', 'admin'),
(142, 1000, 000181, '2022-11-16 16:02:22', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `production_check`
--

DROP TABLE IF EXISTS `production_check`;
CREATE TABLE IF NOT EXISTS `production_check` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `emp_id` int(11) NOT NULL,
  `sales_order_id` int(11) NOT NULL,
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
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prod_cmb_check`
--

DROP TABLE IF EXISTS `prod_cmb_check`;
CREATE TABLE IF NOT EXISTS `prod_cmb_check` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `emp_id` int(11) NOT NULL,
  `sales_order_id` int(11) NOT NULL,
  `keyboard` int(11) NOT NULL,
  `speakers` int(11) NOT NULL,
  `camera` int(11) NOT NULL,
  `bazel` int(11) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prod_info`
--

DROP TABLE IF EXISTS `prod_info`;
CREATE TABLE IF NOT EXISTS `prod_info` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `sales_order` int(11) NOT NULL,
  `start_date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_date_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `emp_id` int(11) NOT NULL,
  `tech_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `issue_type` int(11) NOT NULL COMMENT '1=motherboard,2=combine,3=lcd,4=bodywork,5=no-issues',
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=302 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prod_info`
--

INSERT INTO `prod_info` (`p_id`, `inventory_id`, `sales_order`, `start_date_time`, `end_date_time`, `emp_id`, `tech_id`, `status`, `issue_type`) VALUES
(291, 000172, 1000, '2022-11-16 12:46:44', '2022-11-16 12:47:02', 1037, 133, 1, 2),
(292, 000175, 1000, '2022-11-16 12:51:18', '2022-11-16 12:51:38', 1037, 133, 1, 2),
(293, 000173, 1000, '2022-11-16 12:51:43', '2022-11-16 12:52:02', 1037, 133, 1, 2),
(294, 000157, 1000, '2022-11-16 12:52:15', '2022-11-16 12:52:34', 1037, 130, 1, 2),
(295, 000158, 1000, '2022-11-16 12:52:37', '2022-11-16 12:52:55', 1037, 130, 1, 2),
(296, 000159, 1000, '2022-11-16 12:52:58', '2022-11-16 12:53:16', 1037, 130, 1, 2),
(297, 000100, 1000, '2022-11-16 12:53:40', '2022-11-16 12:54:00', 1037, 132, 1, 2),
(298, 000101, 1000, '2022-11-16 12:54:05', '2022-11-16 12:54:37', 1037, 132, 1, 2),
(299, 000102, 1000, '2022-11-16 12:54:39', '2022-11-16 12:55:10', 1037, 132, 1, 2),
(300, 000103, 1000, '2022-11-16 12:55:17', '2022-11-16 12:55:34', 1037, 132, 1, 2),
(301, 000104, 1000, '2022-11-16 12:55:37', '2022-11-16 12:55:53', 1037, 132, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `prod_technician_assign_info`
--

DROP TABLE IF EXISTS `prod_technician_assign_info`;
CREATE TABLE IF NOT EXISTS `prod_technician_assign_info` (
  `tech_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `sales_order_id` int(11) NOT NULL,
  `model` varchar(25) NOT NULL,
  `tech_assign_qty` int(11) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `task_completed_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `core` varchar(40) NOT NULL,
  `generation` varchar(10) NOT NULL,
  `processor` varchar(10) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `device_type` varchar(40) NOT NULL,
  PRIMARY KEY (`tech_id`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prod_technician_assign_info`
--

INSERT INTO `prod_technician_assign_info` (`tech_id`, `emp_id`, `sales_order_id`, `model`, `tech_assign_qty`, `created_time`, `task_completed_time`, `core`, `generation`, `processor`, `brand`, `device_type`) VALUES
(130, 1037, 1000, 'xps 15', 10, '2022-11-16 12:02:47', '0000-00-00 00:00:00', 'i7', '8', 'intel', 'dell', 'laptop'),
(131, 1037, 1000, 'e5530', 1, '2022-11-16 12:02:54', '0000-00-00 00:00:00', 'i7', '8', 'intel', 'dell', 'laptop'),
(132, 1037, 1000, 'e5530', 9, '2022-11-16 12:03:00', '0000-00-00 00:00:00', 'i7', '8', 'intel', 'dell', 'laptop'),
(133, 1037, 1000, '820 g3', 10, '2022-11-16 12:03:08', '0000-00-00 00:00:00', 'i5', '6', 'intel', 'hp', 'laptop'),
(134, 1037, 1000, 'zbook g7', 10, '2022-11-16 12:03:13', '0000-00-00 00:00:00', 'i7', '10', 'intel', 'hp', 'laptop');

-- --------------------------------------------------------

--
-- Table structure for table `qc_dep`
--

DROP TABLE IF EXISTS `qc_dep`;
CREATE TABLE IF NOT EXISTS `qc_dep` (
  `qc_id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  PRIMARY KEY (`qc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rack`
--

DROP TABLE IF EXISTS `rack`;
CREATE TABLE IF NOT EXISTS `rack` (
  `rack_id` int(11) NOT NULL AUTO_INCREMENT,
  `rack_number` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`rack_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rack`
--

INSERT INTO `rack` (`rack_id`, `rack_number`, `status`) VALUES
(1, 'RACK-1', 0),
(2, 'RACK-2', 0),
(3, 'RACK-3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rack_slots`
--

DROP TABLE IF EXISTS `rack_slots`;
CREATE TABLE IF NOT EXISTS `rack_slots` (
  `slot_id` int(11) NOT NULL AUTO_INCREMENT,
  `slot_name` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`slot_id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rack_slots`
--

INSERT INTO `rack_slots` (`slot_id`, `slot_name`, `status`) VALUES
(1, 'A-1', 1),
(2, 'A-2', 0),
(3, 'A-3', 0),
(4, 'A-4', 0),
(5, 'A-5', 0),
(6, 'B-1', 0),
(7, 'B-2', 0),
(8, 'B-3', 0),
(9, 'B-4', 0),
(10, 'B-5', 0),
(11, 'C-1', 0),
(12, 'C-2', 0),
(13, 'C-3', 0),
(14, 'C-4', 0),
(15, 'C-5', 0),
(16, 'D-1', 0),
(17, 'D-2', 0),
(18, 'D-3', 0),
(19, 'D-4', 0),
(20, 'D-5', 0),
(21, 'E-1', 0),
(22, 'E-2', 0),
(23, 'E-3', 0),
(24, 'E-4', 0),
(25, 'E-5', 0),
(26, 'F-1', 0),
(27, 'F-2', 0),
(28, 'F-3', 0),
(29, 'F-4', 0),
(30, 'F-5', 0),
(31, 'G-1', 0),
(32, 'G-2', 0),
(33, 'G-3', 0),
(34, 'G-4', 0),
(35, 'G-5', 0),
(36, 'H-1', 0),
(37, 'H-2', 0),
(38, 'H-3', 0),
(39, 'H-4', 0),
(40, 'H-5', 0),
(41, 'I-1', 0),
(42, 'I-2', 0),
(43, 'I-3', 0),
(44, 'I-4', 0),
(45, 'I-5', 0),
(46, 'J-1', 0),
(47, 'J-2', 0),
(48, 'J-3', 0),
(49, 'J-4', 0),
(50, 'J-5', 0),
(51, 'K-1', 0),
(52, 'K-2', 0),
(53, 'K-3', 0),
(54, 'K-4', 0),
(55, 'K-5', 0),
(56, 'L-1', 0),
(57, 'L-2', 0),
(58, 'L-3', 0),
(59, 'L-4', 0),
(60, 'L-5', 0),
(61, 'M-1', 0),
(62, 'M-2', 0),
(63, 'M-3', 0),
(64, 'M-4', 0),
(65, 'M-5', 0),
(66, 'N-1', 0),
(67, 'N-2', 0),
(68, 'N-3', 0),
(69, 'N-4', 0),
(70, 'N-5', 0),
(71, 'O-1', 0),
(72, 'O-2', 0),
(73, 'O-3', 0),
(74, 'O-4', 0),
(75, 'O-5', 0),
(76, 'P-1', 0),
(77, 'P-2', 0),
(78, 'P-3', 0),
(79, 'P-4', 0),
(80, 'P-5', 0),
(81, 'Q-1', 0),
(82, 'Q-2', 0),
(83, 'Q-3', 0),
(84, 'Q-4', 0),
(85, 'Q-5', 0),
(86, 'R-1', 0),
(87, 'R-2', 0),
(88, 'R-3', 0),
(89, 'R-4', 0),
(90, 'R-5', 0),
(91, 'S-1', 0),
(92, 'S-2', 0),
(93, 'S-3', 0),
(94, 'S-4', 0),
(95, 'S-5', 0),
(96, 'T-1', 0),
(97, 'T-2', 0),
(98, 'T-3', 0),
(99, 'T-4', 0),
(100, 'T-5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

DROP TABLE IF EXISTS `relationship`;
CREATE TABLE IF NOT EXISTS `relationship` (
  `relationship_id` int(11) NOT NULL AUTO_INCREMENT,
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
-- Table structure for table `requested_part_from_production`
--

DROP TABLE IF EXISTS `requested_part_from_production`;
CREATE TABLE IF NOT EXISTS `requested_part_from_production` (
  `rp_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(40) NOT NULL,
  `model` varchar(40) NOT NULL,
  `generation` int(11) NOT NULL,
  `sales_order_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `delivery_date` datetime NOT NULL,
  `emp_id` int(11) NOT NULL,
  `location` varchar(40) NOT NULL,
  `status` int(11) NOT NULL,
  `keyboard` int(11) NOT NULL,
  `speakers` int(11) NOT NULL,
  `camera` int(11) NOT NULL,
  `bazel` int(11) NOT NULL,
  `lan_cover` int(11) NOT NULL,
  `mousepad` int(11) NOT NULL,
  `mouse_pad_button` int(11) NOT NULL,
  `camera_cable` int(11) NOT NULL,
  `back_cover` int(11) NOT NULL,
  `wifi_card` int(11) NOT NULL,
  `lcd_cable` int(11) NOT NULL,
  `battery` int(11) NOT NULL,
  `battery_cable` int(11) NOT NULL,
  `dvd_rom` int(11) NOT NULL,
  `dvd_caddy` int(11) NOT NULL,
  `hdd_caddy` int(11) NOT NULL,
  `hdd_cable_connector` int(11) NOT NULL,
  `c_panel_palm_rest` int(11) NOT NULL,
  `mb_base` int(11) NOT NULL,
  `hings_cover` int(11) NOT NULL,
  `switch` int(11) NOT NULL,
  `switch_id` int(11) NOT NULL,
  PRIMARY KEY (`rp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requested_part_from_production`
--

INSERT INTO `requested_part_from_production` (`rp_id`, `brand`, `model`, `generation`, `sales_order_id`, `inventory_id`, `created_date`, `delivery_date`, `emp_id`, `location`, `status`, `keyboard`, `speakers`, `camera`, `bazel`, `lan_cover`, `mousepad`, `mouse_pad_button`, `camera_cable`, `back_cover`, `wifi_card`, `lcd_cable`, `battery`, `battery_cable`, `dvd_rom`, `dvd_caddy`, `hdd_caddy`, `hdd_cable_connector`, `c_panel_palm_rest`, `mb_base`, `hings_cover`, `switch`, `switch_id`) VALUES
(129, 'hp', '820 g3', 6, 1000, 172, '2022-11-16 12:47:02', '2022-11-16 00:00:00', 1037, 'T1', 1, 1, 1, 0, 0, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0),
(130, 'hp', '820 g3', 6, 1000, 175, '2022-11-16 12:51:38', '2022-11-16 00:00:00', 1037, 'T1', 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 0, 0),
(131, 'hp', '820 g3', 6, 1000, 173, '2022-11-16 12:52:02', '2022-11-16 00:00:00', 1037, 'T1', 1, 0, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0),
(132, 'dell', 'xps 15', 8, 1000, 157, '2022-11-16 12:52:34', '2022-11-16 00:00:00', 1037, 'T1', 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0),
(133, 'dell', 'xps 15', 8, 1000, 158, '2022-11-16 12:52:55', '2022-11-16 00:00:00', 1037, 'T1', 1, 1, 1, 1, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0),
(134, 'dell', 'xps 15', 8, 1000, 159, '2022-11-16 12:53:16', '2022-11-16 00:00:00', 1037, 'T1', 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 0, 0),
(135, 'dell', 'e5530', 8, 1000, 100, '2022-11-16 12:54:00', '2022-11-16 00:00:00', 1037, 'T1', 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(136, 'dell', 'e5530', 8, 1000, 101, '2022-11-16 12:54:37', '2022-11-16 00:00:00', 1037, 'T1', 1, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0),
(137, 'dell', 'e5530', 8, 1000, 102, '2022-11-16 12:55:10', '2022-11-16 00:00:00', 1037, 'T1', 1, 0, 0, 1, 0, 1, 1, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0),
(138, 'dell', 'e5530', 8, 1000, 103, '2022-11-16 12:55:34', '2022-11-16 00:00:00', 1037, 'T1', 1, 0, 0, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0),
(139, 'dell', 'e5530', 8, 1000, 104, '2022-11-16 12:55:53', '2022-11-16 00:00:00', 1037, 'T1', 1, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `request_parts_from_part_warehouse`
--

DROP TABLE IF EXISTS `request_parts_from_part_warehouse`;
CREATE TABLE IF NOT EXISTS `request_parts_from_part_warehouse` (
  `part_req_id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(40) NOT NULL,
  `model` varchar(50) NOT NULL,
  `request_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `delivery_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL,
  `keyboard` int(11) NOT NULL,
  `speacker` int(11) NOT NULL,
  `camera` int(11) NOT NULL,
  `bazel` int(11) NOT NULL,
  `lan_cover` int(11) NOT NULL,
  `mousepad` int(11) NOT NULL,
  `mouse_pad_button` int(11) NOT NULL,
  `camera_cable` int(11) NOT NULL,
  `back_cover` int(11) NOT NULL,
  `wifi_card` int(11) NOT NULL,
  `lcd_cable` int(11) NOT NULL,
  `battery` int(11) NOT NULL,
  `battery_cable` int(11) NOT NULL,
  `dvd_rom` int(11) NOT NULL,
  `dvd_caddy` int(11) NOT NULL,
  `hdd_caddy` int(11) NOT NULL,
  `hdd_cable_connector` int(11) NOT NULL,
  `mb_base` int(11) NOT NULL,
  `hings_cover` int(11) NOT NULL,
  `c_panel_palm_rest` int(11) NOT NULL,
  PRIMARY KEY (`part_req_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_add_items`
--

DROP TABLE IF EXISTS `sales_order_add_items`;
CREATE TABLE IF NOT EXISTS `sales_order_add_items` (
  `sales_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_type` varchar(20) NOT NULL,
  `item_brand` varchar(20) NOT NULL,
  `item_model` varchar(20) NOT NULL,
  `item_processor` varchar(10) NOT NULL,
  `item_core` varchar(10) NOT NULL,
  `item_generation` varchar(10) NOT NULL,
  `item_ram` varchar(50) NOT NULL,
  `item_hdd` varchar(100) NOT NULL,
  `item_condition` varchar(250) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_total_price` varchar(1000) NOT NULL,
  `item_delivery_date` date NOT NULL,
  `sales_order_created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `sales_order_id` int(11) DEFAULT NULL,
  `item_display` varchar(50) NOT NULL,
  `item_graphic` varchar(50) NOT NULL,
  `item_screen` varchar(50) NOT NULL,
  `item_bulk` varchar(10) NOT NULL,
  PRIMARY KEY (`sales_item_id`),
  KEY `fksales_order_id` (`sales_order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order_add_items`
--

INSERT INTO `sales_order_add_items` (`sales_item_id`, `item_type`, `item_brand`, `item_model`, `item_processor`, `item_core`, `item_generation`, `item_ram`, `item_hdd`, `item_condition`, `item_quantity`, `item_price`, `item_total_price`, `item_delivery_date`, `sales_order_created_date`, `sales_order_id`, `item_display`, `item_graphic`, `item_screen`, `item_bulk`) VALUES
(1, 'laptop', 'dell', 'e5530', 'intel', 'i7', '8', '16gb', '1tb m.2 nvme', 'fully refurbished,  back cover paint', 10, 1500, '15000', '2022-09-13', '2022-08-30 07:05:04', 1000, 'full hd (1920*1080)', '8gb', 'non-touch', 'bulk sale'),
(2, 'laptop', 'hp', 'zbook g7', 'intel', 'i7', '10', '16gb', '512gb ssd', 'top screen sticker, lcd any spot ', 10, 2500, '12500', '2022-09-13', '2022-08-30 07:05:04', 1000, 'full hd (1920*1080)', '4gb', 'non-touch', 'bulk sale'),
(3, 'laptop', 'dell', 'xps 15', 'intel', 'i7', '8', '8gb', '512gb ssd', 'branded', 10, 3500, '17500', '2022-09-13', '2022-08-30 07:05:04', 1000, 'qhd (2560*1440)', '4gb', 'touch', 'bulk sale'),
(4, 'laptop', 'hp', '820 g3', 'intel', 'i5', '6', '4gb', '256gbssd', 'fully refurbished', 10, 650, '3250', '2022-09-13', '2022-08-30 07:05:04', 1000, 'hd (1366*768)', '2gb', 'non-touch', 'bulk sale'),
(5, 'laptop', 'dell', 'e5530', 'intel', 'i7', '8', '16gb', '1tb m.2 nvme', 'fully refurbished', 25, 2500, '62500', '2022-09-20', '2022-08-30 07:23:21', 1001, 'full hd (1920*1080)', '8gb', 'non-touch', 'bulk sale'),
(6, 'laptop', 'hp', '820 g3', 'intel', 'i5', '6', '8gb', '256gb ssd', 'fully refurbished', 25, 650, '16250', '2022-09-20', '2022-08-30 07:23:21', 1001, 'hd (1366*768)', '2gb', 'non-touch', 'bulk sale'),
(7, 'laptop', 'dell', '3160', 'intel', 'celeron', '3', '4gb', '128gb ssd', 'fully refurbished, palmrest paint', 40, 400, '16000', '2022-09-20', '2022-08-30 07:23:21', 1001, 'hd (1366*768)', '2gb', 'non-touch', 'bulk sale'),
(8, 'laptop', 'apple', 'macbook pro 13', 'intel', 'i5', '8', '8gb', '512gb ssd', 'fully refurbished, palmrest paint', 5, 1750, '8750', '2022-09-20', '2022-08-30 07:23:21', 1001, 'retina', '2gb', 'non-touch', 'bulk sale'),
(9, 'laptop', 'dell', 'xps 15', 'intel', 'i9', '7', '32gb', '512gb ssd', 'fully refurbished, palmrest paint', 10, 3500, '35000', '2022-09-20', '2022-08-30 07:23:21', 1001, 'qhd+ (3200*1800)', '4gb', 'touch', 'bulk sale'),
(10, 'laptop', 'dell', 'e7270', 'intel', 'i5', '6', '8gb', '256gb ssd', 'fully refurbished', 5, 1500, '7500', '2022-09-20', '2022-08-30 07:23:21', 1001, 'hd (1366*768)', '4gb', 'non-touch', 'bulk sale'),
(11, 'laptop', 'acer', 'c740', 'intel', 'i3', '4', '4gb', '256gb ssd', 'fully refurbished', 50, 250, '12500', '2022-09-20', '2022-08-30 07:23:21', 1001, 'hd (1366*768)', '2gb', 'non-touch', 'bulk sale'),
(12, 'laptop', 'lenovo', 't460s', 'intel', 'i5', '6', '8gb', '256gb ssd', 'fully refurbished', 15, 700, '10500', '2022-09-20', '2022-08-30 07:23:21', 1001, 'hd (1366*768)', '4gb', 'non-touch', 'bulk sale'),
(13, 'laptop', 'lenovo', 'l450', 'intel', 'i3', '5', '4gb', '240gb ssd', 'fully refurbished, palmrest paint', 55, 550, '30250', '2022-09-20', '2022-08-30 07:23:21', 1001, 'hd (1366*768)', '2gb', 'non-touch', 'bulk sale'),
(14, 'laptop', 'microsfot', '1769', 'intel', 'i7', '8', '8gb', '512gb ssd', 'branded', 15, 2500, '37500', '2022-09-20', '2022-08-30 07:23:21', 1001, 'full hd (1920*1080)', '4gb', 'touch', 'bulk sale'),
(15, 'laptop', 'dell', 'e5530', 'intel', 'i7', '8', '16gb', '1tb m.2 nvne', '-', 5, 2500, '12500', '2022-09-22', '2022-09-01 16:22:25', 1002, 'full hd (1920*1080)', '8gb', 'non-touch', 'bulk sale'),
(16, 'laptop', 'hp', 'zbook g7', 'intel', 'i7', '10', '16gb', '1tb m.2 nvne', '-', 5, 2500, '12500', '2022-09-22', '2022-09-01 16:22:25', 1002, 'full hd (1920*1080)', '8gb', 'non-touch', 'bulk sale'),
(17, 'laptop', 'hp', '820 g3', 'intel', 'i5', '6', '4gb', '1tb m.2 nvne', '-', 5, 650, '3250', '2022-09-22', '2022-09-01 16:22:25', 1002, 'hd (1366*768)', '8gb', 'non-touch', 'bulk sale'),
(18, 'laptop', 'dell', 'xps 15', 'intel', 'i7', '8', '8gb', '1tb m.2 nvne', '-', 5, 3500, '17500', '2022-09-22', '2022-09-01 16:22:25', 1002, 'qhd (2560*1440)', '4gb', 'touch', 'bulk sale'),
(19, 'laptop', 'lenovo', 'l450	', 'intel', 'i3', '5', '4gb', '256gb ssd', '-', 12, 750, '9000', '2022-09-22', '2022-09-01 16:22:25', 1002, 'hd (1366*768)', '2gb', 'non-touch', 'bulk sale'),
(20, 'laptop', 'acer', 'c740', 'intel', 'i3', '4', '4gb', '256gb ssd', '-', 15, 250, '3750', '2022-09-22', '2022-09-01 16:22:25', 1002, 'hd (1366*768)', '4gb', 'non-touch', 'bulk sale'),
(21, 'laptop', 'dell', '3160	', 'intel', 'celeron', '3', '2gb', '256gb ssd', '-', 35, 350, '12250', '2022-09-22', '2022-09-01 16:22:25', 1002, 'hd+ (1600*900)', '2gb', 'non-touch', 'bulk sale'),
(22, 'laptop', 'microsfot', '1769	', 'intel', 'i7', '8', '4gb', '1tb m.2 nvne', '-', 7, 3500, '24500', '2022-09-22', '2022-09-01 16:22:25', 1002, 'qhd+ (3200*1800)', '4gb', 'touch', 'bulk sale'),
(23, 'laptop', 'dell', 'xps 15', 'intel', 'i9', '7', '32gb', '1tb m.2 nvne', '-', 15, 4500, '67500', '2022-09-22', '2022-09-01 16:22:25', 1002, 'uhd (3840*2160)', '4gb', 'touch', 'bulk sale'),
(24, 'laptop', 'dell', 'e7270	', 'intel', 'i5', '6', '8gb', '256gb ssd', '-', 25, 780, '19500', '2022-09-22', '2022-09-01 16:22:25', 1002, 'full hd (1920*1080)', '4gb', 'non-touch', 'bulk sale'),
(25, 'laptop', 'apple', 'macbook pro 13	', 'intel', 'i5', '8', '8gb', '512gb ssd', '-', 50, 2500, '125000', '2022-09-22', '2022-09-01 16:22:25', 1002, 'retina', '4gb', 'non-touch', 'bulk sale'),
(26, 'laptop', 'lenovo', 'l450', 'intel', 'i3', '5', '16', '256ssd', 'refub', 10, 500, '50', '2022-11-05', '2022-10-29 06:18:45', 1004, 'full hd (1920*1080)', '16gb', 'touch', 'bulk sale'),
(27, 'laptop', 'lenovo', 'l450', 'intel', 'i3', '5', '32', '256ssd', 'refub', 2, 1180, '590', '2022-11-03', '2022-10-29 06:24:14', 1005, 'hd+ (1600*900)', '8gb', 'non-touch', 'e-commerce'),
(28, 'laptop', 'lenovo', 'l450', 'intel', 'i3', '5', '32', '256ssd', 'refub', 2, 1180, '590', '2022-11-03', '2022-10-29 06:24:46', 1006, 'hd+ (1600*900)', '8gb', 'non-touch', 'e-commerce');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_information`
--

DROP TABLE IF EXISTS `sales_order_information`;
CREATE TABLE IF NOT EXISTS `sales_order_information` (
  `sales_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `customer_address` text DEFAULT NULL,
  `customer_city` varchar(50) NOT NULL,
  `resident_country` varchar(50) NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `shipping_address` text NOT NULL,
  `shipping_country` varchar(100) NOT NULL,
  `shipping_state` varchar(50) NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  `contact_number` varchar(30) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `shipping_city` varchar(100) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  PRIMARY KEY (`sales_order_id`),
  KEY `sales_order_id` (`sales_order_id`),
  KEY `sales_order_id_2` (`sales_order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1007 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order_information`
--

INSERT INTO `sales_order_information` (`sales_order_id`, `customer_name`, `customer_address`, `customer_city`, `resident_country`, `company_name`, `shipping_address`, `shipping_country`, `shipping_state`, `zip_code`, `contact_number`, `created_time`, `shipping_city`, `created_by`) VALUES
(1000, 'vidusha wijekoon', 'industrial area 5', 'sharjah', 'United Arab Emirates', 'alsakb computers llc', '52/a, mariyawaththe, gampola', 'Sri Lanka', 'central', '20500', '0094812353489', '2022-08-30 07:05:04', '', ''),
(1001, 'sampath balasen', 'industrial area 5', 'dubai', 'United Arab Emirates', 'alsakb computers llc', '64, city tower, port saeed, deira', 'United Arab Emirates', 'dubai', '00000', '00971588250962', '2022-08-30 07:23:21', '', ''),
(1002, 'All Items', 'industrial area 5', 'sharjah', 'United Arab Emirates', 'alsakb', '64, city tower, port saeed, deira', 'United Arab Emirates', 'dubai', '00000', '00971588250971', '2022-09-01 16:22:25', '', ''),
(1004, 'Anuradha Denuwan', 'al nadha , sharjah', 'sharjah', 'Antarctica', 'al nadha', 'same as billing', 'Aland Islands', 'kamuko', '1212', '121212', '2022-10-29 06:18:45', 'nikamata', 'admin'),
(1005, 'vidusha', 'gedara thama', 'sharjah', 'Andorra', 'al nadha', 'same as billing new', 'Albania', 'kamuko mona hari', '6767', '676767', '2022-10-29 06:24:14', 'lankawa bn', 'admin'),
(1006, 'vidusha', 'gedara thama', 'sharjah', 'Andorra', 'al nadha', 'same as billing new', 'Albania', 'kamuko mona hari', '6767', '676767', '2022-10-29 06:24:46', 'lankawa bn', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sales_quatation`
--

DROP TABLE IF EXISTS `sales_quatation`;
CREATE TABLE IF NOT EXISTS `sales_quatation` (
  `quatation_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) NOT NULL,
  `customer_address` varchar(250) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `shipping_state` varchar(50) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `contact_person` varchar(50) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`quatation_id`),
  KEY `quatation_id` (`quatation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_quatation`
--

INSERT INTO `sales_quatation` (`quatation_id`, `customer_name`, `customer_address`, `company_name`, `country`, `shipping_state`, `zip_code`, `contact_person`, `contact_number`, `created_by`, `created_date`) VALUES
(0030, 'sdfsdfbb', 'bybybb', 'bhbhbh', 'Bahrain', 'bbyb', 231, '31231334', 1223, 'admin', '2022-10-27 12:36:21'),
(0031, 'sdfsdfbb', 'bybybb', 'bhbhbh', 'Bahrain', 'bbyb', 231, '31231334', 1223, 'admin', '2022-10-27 12:36:49'),
(0032, 'sdfsdfbb', 'bybybb', 'bhbhbh', 'Bahrain', 'bbyb', 231, '31231334', 1223, 'admin', '2022-10-27 12:38:49'),
(0033, 'sdfsdfbb', 'bybybb', 'bhbhbh', 'Bahrain', 'bbyb', 231, '31231334', 1223, 'admin', '2022-10-27 13:07:06'),
(0034, 'Anuradha Denuwan', 'al nadha , sharjah', 'al nadha', 'Aland Islands', 'kamuko', 54555, '544', 23424343, 'admin', '2022-11-07 13:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `sales_quatation_items`
--

DROP TABLE IF EXISTS `sales_quatation_items`;
CREATE TABLE IF NOT EXISTS `sales_quatation_items` (
  `sales_quatations_items_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_type` varchar(25) NOT NULL,
  `item_brand` varchar(25) NOT NULL,
  `item_model` varchar(25) NOT NULL,
  `item_processor` varchar(25) NOT NULL,
  `item_core` varchar(25) NOT NULL,
  `item_generation` varchar(25) NOT NULL,
  `item_ram` varchar(15) NOT NULL,
  `item_hdd` varchar(25) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_total_price` int(11) NOT NULL,
  `item_delivery_date` date NOT NULL,
  `quatation_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`sales_quatations_items_id`),
  KEY `quatation_id` (`quatation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_quatation_items`
--

INSERT INTO `sales_quatation_items` (`sales_quatations_items_id`, `item_type`, `item_brand`, `item_model`, `item_processor`, `item_core`, `item_generation`, `item_ram`, `item_hdd`, `item_quantity`, `item_price`, `item_total_price`, `item_delivery_date`, `quatation_id`, `created_date`) VALUES
(5, 'mobile', 'dell', 'asdasd', 'intel', 'i3', '1', '2', 'wqewe', 132313, 321313, 31233, '2022-11-17', 0030, '2022-10-27 12:36:21'),
(6, 'laptop', 'dell', 'asdasd', 'amd', 'i5', '1', '8', 'qeqwewe', 12313, 13123123, 12313, '2022-11-17', 0030, '2022-10-27 12:36:21'),
(7, 'mobile', 'dell', 'asdasd', 'intel', 'i3', '1', '2', 'wqewe', 132313, 321313, 31233, '2022-11-17', 0031, '2022-10-27 12:36:49'),
(8, 'laptop', 'dell', 'asdasd', 'amd', 'i5', '1', '8', 'qeqwewe', 12313, 13123123, 12313, '2022-11-17', 0031, '2022-10-27 12:36:49'),
(9, 'mobile', 'dell', 'asdasd', 'intel', 'i3', '1', '2', 'wqewe', 132313, 321313, 31233, '2022-11-17', 0032, '2022-10-27 12:38:49'),
(10, 'laptop', 'dell', 'asdasd', 'amd', 'i5', '1', '8', 'qeqwewe', 12313, 13123123, 12313, '2022-11-17', 0032, '2022-10-27 12:38:49'),
(11, 'mobile', 'dell', 'asdasd', 'intel', 'i3', '1', '2', 'wqewe', 132313, 321313, 31233, '2022-11-17', 0033, '2022-10-27 13:07:06'),
(12, 'laptop', 'dell', 'asdasd', 'amd', 'i5', '1', '8', 'qeqwewe', 12313, 13123123, 12313, '2022-11-17', 0033, '2022-10-27 13:07:06'),
(13, 'laptop', 'dell', 'e5530', 'intel', 'i7', '3', '8', 'yhfgh', 45, 4545, 454545, '2022-11-16', 0034, '2022-11-07 13:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `sanding_dep`
--

DROP TABLE IF EXISTS `sanding_dep`;
CREATE TABLE IF NOT EXISTS `sanding_dep` (
  `sanding_id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  PRIMARY KEY (`sanding_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

DROP TABLE IF EXISTS `tbl_roles`;
CREATE TABLE IF NOT EXISTS `tbl_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

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
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `epf` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `location` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL,
  `department` varchar(40) NOT NULL,
  `role` varchar(25) NOT NULL,
  `isActive` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `epf`, `username`, `location`, `password`, `last_login`, `is_deleted`, `department`, `role`, `isActive`) VALUES
(1, 'admin', 'admin', 1, 'admin', 'admin@admi', 'admin', '2022-11-16 11:47:45', 0, '11', '1', 0),
(10, 'Kasun', 'karunatilake', 1033, 'hr-manager', 'kasunkarun', '123', '2022-10-27 12:56:01', 0, '4', '8', 0),
(11, 'Sampath', 'karunatilake', 1034, 'PROD-TEAM-LEAD', 'MATANE@GMA', '123', '2022-10-31 16:16:58', 0, '1', '4', 0),
(12, 'min', 'CHANG', 1035, 'wtl', 'OIOI@GMAIL', '123', '2022-11-15 13:56:59', 0, '2', '4', 0),
(13, 'JAHIDH', 'ABDHULLA', 1036, 'whm', 'NOTHINGBUT', '123', '2022-11-16 11:58:38', 0, '2', '10', 0),
(14, 'SANDIKA', 'MAHAWATTE', 1037, 't1', 'T1', '123', '2022-11-16 12:02:37', 0, '1', '6', 0),
(18, 'mtl', 'mtl', 1039, 'mtl', '0', '123', '2022-11-13 14:54:48', 0, '9', '4', 0),
(19, 'mbt', 'mbt', 1040, 'mbt', '0', '123', '2022-11-14 11:20:01', 0, '9', '6', 0);

-- --------------------------------------------------------

--
-- Table structure for table `visa_type`
--

DROP TABLE IF EXISTS `visa_type`;
CREATE TABLE IF NOT EXISTS `visa_type` (
  `visa_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `assign_task_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_order` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `task_created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `task_completed_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`assign_task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse_assign_task`
--

INSERT INTO `warehouse_assign_task` (`assign_task_id`, `sales_order`, `emp_id`, `status`, `task_created_date`, `task_completed_date`) VALUES
(57, 1000, 1036, 1, '2022-11-16 11:58:27', '2022-11-16 12:00:51');

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
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `location` varchar(25) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `create_by_inventory_id` varchar(50) DEFAULT NULL,
  `send_to_production` int(11) NOT NULL,
  `send_time_to_production` timestamp NULL DEFAULT NULL,
  `sales_order_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`inventory_id`),
  KEY `order_id` (`sales_order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1095 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse_information_sheet`
--

INSERT INTO `warehouse_information_sheet` (`inventory_id`, `device`, `processor`, `core`, `generation`, `model`, `qr_image`, `create_date`, `location`, `brand`, `create_by_inventory_id`, `send_to_production`, `send_time_to_production`, `sales_order_id`) VALUES
(000100, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/634268247f938.png', '2022-10-09 06:20:20', 'wh2', 'dell', 'vidusha', 1, '2022-11-16 11:58:47', 1000),
(000101, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/634268248e80a.png', '2022-10-09 06:20:20', 'WH2', 'dell', 'vidusha', 1, '2022-11-16 11:58:49', 1000),
(000102, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/63426824a2d38.png', '2022-10-09 06:20:20', 'WH2', 'dell', 'vidusha', 1, '2022-11-16 11:58:50', 1000),
(000103, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/63426824c3709.png', '2022-10-09 06:20:20', 'WH2', 'dell', 'vidusha', 1, '2022-11-16 11:58:51', 1000),
(000104, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/63426824e86c5.png', '2022-10-09 06:20:20', 'WH2', 'dell', 'vidusha', 1, '2022-11-16 11:58:55', 1000),
(000105, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/6342682dbcbee.png', '2022-10-09 06:20:29', 'WH2', 'dell', 'vidusha', 1, '2022-11-16 11:58:56', 1000),
(000106, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/6342682e09e54.png', '2022-10-09 06:20:30', 'WH2', 'dell', 'vidusha', 1, '2022-11-16 11:58:58', 1000),
(000107, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/6342682e4b4c3.png', '2022-10-09 06:20:30', 'WH2', 'dell', 'vidusha', 1, '2022-11-16 11:59:00', 1000),
(000108, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/6342682e99fc4.png', '2022-10-09 06:20:30', 'WH2', 'dell', 'vidusha', 1, '2022-11-16 11:59:01', 1000),
(000109, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/6342682eeddf0.png', '2022-10-09 06:20:30', 'WH2', 'dell', 'vidusha', 1, '2022-11-16 11:59:04', 1000),
(000110, 'laptop', 'intel', 'i7', '10', 'zbook g7', 'temp/6342684d330ec.png', '2022-10-09 06:21:01', 'WH3', 'hp', 'vidusha', 1, '2022-11-16 11:59:05', 1000),
(000111, 'laptop', 'intel', 'i7', '10', 'zbook g7', 'temp/6342684d9ce47.png', '2022-10-09 06:21:01', 'WH3', 'hp', 'vidusha', 1, '2022-11-16 11:59:06', 1000),
(000112, 'laptop', 'intel', 'i7', '10', 'zbook g7', 'temp/6342684e170a1.png', '2022-10-09 06:21:02', 'WH3', 'hp', 'vidusha', 1, '2022-11-16 11:59:08', 1000),
(000113, 'laptop', 'intel', 'i7', '10', 'zbook g7', 'temp/6342684e8f590.png', '2022-10-09 06:21:02', 'WH3', 'hp', 'vidusha', 1, '2022-11-16 11:59:09', 1000),
(000114, 'laptop', 'intel', 'i7', '10', 'zbook g7', 'temp/6342684f180b0.png', '2022-10-09 06:21:03', 'WH3', 'hp', 'vidusha', 1, '2022-11-16 11:59:10', 1000),
(000115, 'laptop', 'intel', 'i7', '10', 'zbook g7', 'temp/6342684f9df3f.png', '2022-10-09 06:21:03', 'WH3', 'hp', 'vidusha', 1, '2022-11-16 11:59:10', 1000),
(000116, 'laptop', 'intel', 'i7', '10', 'zbook g7', 'temp/634268503c585.png', '2022-10-09 06:21:04', 'WH3', 'hp', 'vidusha', 1, '2022-11-16 11:59:16', 1000),
(000117, 'laptop', 'intel', 'i7', '10', 'zbook g7', 'temp/63426850d7a04.png', '2022-10-09 06:21:04', 'WH3', 'hp', 'vidusha', 1, '2022-11-16 11:59:12', 1000),
(000118, 'laptop', 'intel', 'i7', '10', 'zbook g7', 'temp/6342685193f5b.png', '2022-10-09 06:21:05', 'WH3', 'hp', 'vidusha', 1, '2022-11-16 11:59:18', 1000),
(000119, 'laptop', 'intel', 'i7', '10', 'zbook g7', 'temp/63426852522b1.png', '2022-10-09 06:21:06', 'WH3', 'hp', 'vidusha', 1, '2022-11-16 11:59:20', 1000),
(000120, 'laptop', 'intel', 'i7', '10', 'zbook g7', 'temp/63426853198ad.png', '2022-10-09 06:21:07', 'WH3', 'hp', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000121, 'laptop', 'intel', 'i7', '10', 'zbook g7', 'temp/63426853deaaa.png', '2022-10-09 06:21:07', 'WH3', 'hp', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000122, 'laptop', 'intel', 'i3', '4', '640 c7', 'temp/634268746c3d5.png', '2022-10-09 06:21:40', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000123, 'laptop', 'intel', 'i3', '4', '640 c7', 'temp/6342687549d87.png', '2022-10-09 06:21:41', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000124, 'laptop', 'intel', 'i3', '4', '640 c7', 'temp/6342687632c12.png', '2022-10-09 06:21:42', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000125, 'laptop', 'intel', 'i3', '4', '640 c7', 'temp/63426877200cf.png', '2022-10-09 06:21:43', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000126, 'laptop', 'intel', 'i3', '4', '640 c7', 'temp/63426878140fc.png', '2022-10-09 06:21:44', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000127, 'laptop', 'intel', 'i3', '4', '640 c7', 'temp/63426879128f8.png', '2022-10-09 06:21:45', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000128, 'laptop', 'intel', 'i3', '4', '640 c7', 'temp/6342687a1c7b4.png', '2022-10-09 06:21:46', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000129, 'laptop', 'intel', 'i3', '4', '640 c7', 'temp/6342687b33166.png', '2022-10-09 06:21:47', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000130, 'laptop', 'intel', 'i3', '4', '640 c7', 'temp/6342687c4d2ff.png', '2022-10-09 06:21:48', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000131, 'laptop', 'intel', 'i3', '4', '640 c7', 'temp/6342687d6ed8a.png', '2022-10-09 06:21:49', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000132, 'laptop', 'intel', 'i3', '4', '640 c7', 'temp/6342687e9b0e8.png', '2022-10-09 06:21:50', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000133, 'laptop', 'intel', 'i3', '4', '640 c7', 'temp/6342687fd04d1.png', '2022-10-09 06:21:51', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000134, 'laptop', 'intel', 'i3', '4', '640 c7', 'temp/63426881118ee.png', '2022-10-09 06:21:53', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000135, 'laptop', 'intel', 'i3', '4', '640 c7', 'temp/63426882525dc.png', '2022-10-09 06:21:54', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000136, 'laptop', 'intel', 'i3', '4', '640 c7', 'temp/63426883a0eac.png', '2022-10-09 06:21:55', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000137, 'laptop', 'intel', 'i3', '4', '640 c7', 'temp/634268850680c.png', '2022-10-09 06:21:57', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000138, 'laptop', 'intel', 'i3', '4', '640 c7', 'temp/634268866221c.png', '2022-10-09 06:21:58', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000139, 'laptop', 'intel', 'i3', '4', '640 c7', 'temp/63426887c4d38.png', '2022-10-09 06:21:59', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000140, 'laptop', 'intel', 'i3', '4', '640 c7', 'temp/6342688947cf7.png', '2022-10-09 06:22:01', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000141, 'laptop', 'intel', 'i3', '4', '640 c7', 'temp/6342688ac0aa4.png', '2022-10-09 06:22:02', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000142, 'laptop', 'intel', 'i3', '4', '640 c7', 'temp/6342688c488cb.png', '2022-10-09 06:22:04', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000143, 'laptop', 'intel', 'i3', '4', '640 c7', 'temp/6342688dd9587.png', '2022-10-09 06:22:05', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000144, 'laptop', 'intel', 'i3', '4', '640 c7', 'temp/6342688f76834.png', '2022-10-09 06:22:07', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000145, 'laptop', 'intel', 'i3', '4', '640 c7', 'temp/63426891255d5.png', '2022-10-09 06:22:09', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000146, 'laptop', 'intel', 'i3', '4', '640 c7', 'temp/63426892d1293.png', '2022-10-09 06:22:10', 'WH2', 'acer', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000147, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/634268fa8b33a.png', '2022-10-09 06:23:54', 'WH1', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000148, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/634268fc69e1b.png', '2022-10-09 06:23:56', 'WH1', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000149, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/634268fe54048.png', '2022-10-09 06:23:58', 'WH1', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000150, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/6342690030300.png', '2022-10-09 06:24:00', 'WH1', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000151, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/6342690216307.png', '2022-10-09 06:24:02', 'WH1', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000152, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/634269041b32e.png', '2022-10-09 06:24:04', 'WH1', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000153, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/634269061cf46.png', '2022-10-09 06:24:06', 'WH1', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000154, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/634269083b2c7.png', '2022-10-09 06:24:08', 'WH1', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000155, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/6342690a647ac.png', '2022-10-09 06:24:10', 'WH1', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000156, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/6342690c8b946.png', '2022-10-09 06:24:12', 'WH1', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000157, 'laptop', 'intel', 'i7', '8', 'xps 15', 'temp/6342693753781.png', '2022-10-09 06:24:55', 'WH2', 'dell', 'vidusha', 1, '2022-11-16 11:59:24', 1000),
(000158, 'laptop', 'intel', 'i7', '8', 'xps 15', 'temp/6342693974eae.png', '2022-10-09 06:24:57', 'WH2', 'dell', 'vidusha', 1, '2022-11-16 11:59:25', 1000),
(000159, 'laptop', 'intel', 'i7', '8', 'xps 15', 'temp/6342693b91a92.png', '2022-10-09 06:24:59', 'WH2', 'dell', 'vidusha', 1, '2022-11-16 11:59:27', 1000),
(000160, 'laptop', 'intel', 'i7', '8', 'xps 15', 'temp/6342693dc0e54.png', '2022-10-09 06:25:01', 'WH2', 'dell', 'vidusha', 1, '2022-11-16 11:59:30', 1000),
(000161, 'laptop', 'intel', 'i7', '8', 'xps 15', 'temp/6342693feb335.png', '2022-10-09 06:25:03', 'WH2', 'dell', 'vidusha', 1, '2022-11-16 11:59:31', 1000),
(000162, 'laptop', 'intel', 'i7', '8', 'xps 15', 'temp/634269423e8a5.png', '2022-10-09 06:25:06', 'WH2', 'dell', 'vidusha', 1, '2022-11-16 11:59:32', 1000),
(000163, 'laptop', 'intel', 'i7', '8', 'xps 15', 'temp/634269448237f.png', '2022-10-09 06:25:08', 'WH2', 'dell', 'vidusha', 1, '2022-11-16 11:59:33', 1000),
(000164, 'laptop', 'intel', 'i7', '8', 'xps 15', 'temp/63426962e6cfb.png', '2022-10-09 06:25:38', 'WH2', 'dell', 'vidusha', 1, '2022-11-16 11:59:35', 1000),
(000165, 'laptop', 'intel', 'i7', '8', 'xps 15', 'temp/634269655fdb2.png', '2022-10-09 06:25:41', 'WH2', 'dell', 'vidusha', 1, '2022-11-16 11:59:36', 1000),
(000166, 'laptop', 'intel', 'i7', '8', 'xps 15', 'temp/63426967d1ff5.png', '2022-10-09 06:25:43', 'WH2', 'dell', 'vidusha', 1, '2022-11-16 11:59:44', 1000),
(000167, 'laptop', 'intel', 'i7', '8', 'xps 15', 'temp/6342696a5e782.png', '2022-10-09 06:25:46', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000168, 'laptop', 'intel', 'i7', '8', 'xps 15', 'temp/6342696ccbf47.png', '2022-10-09 06:25:48', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000169, 'laptop', 'intel', 'i7', '8', 'xps 15', 'temp/6342696f6efb8.png', '2022-10-09 06:25:51', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000170, 'laptop', 'intel', 'i7', '8', 'xps 15', 'temp/634269727db6d.png', '2022-10-09 06:25:54', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000171, 'laptop', 'intel', 'i5', '6', '820 g3', 'temp/6342698760762.png', '2022-10-09 06:26:15', 'WH1', 'hp', 'vidusha', 0, '2022-11-15 13:59:30', 0),
(000172, 'laptop', 'intel', 'i5', '6', '820 g3', 'temp/6342698a06e35.png', '2022-10-09 06:26:18', 'WH1', 'hp', 'vidusha', 1, '2022-11-16 11:59:56', 1000),
(000173, 'laptop', 'intel', 'i5', '6', '820 g3', 'temp/6342698ca28ac.png', '2022-10-09 06:26:20', 'WH1', 'hp', 'vidusha', 1, '2022-11-16 11:59:58', 1000),
(000174, 'laptop', 'intel', 'i5', '6', '820 g3', 'temp/6342698f4f352.png', '2022-10-09 06:26:23', 'WH1', 'hp', 'vidusha', 1, '2022-11-16 12:00:00', 1000),
(000175, 'laptop', 'intel', 'i5', '6', '820 g3', 'temp/634269920ea74.png', '2022-10-09 06:26:26', 'WH1', 'hp', 'vidusha', 1, '2022-11-16 11:59:46', 1000),
(000176, 'laptop', 'intel', 'i5', '6', '820 g3', 'temp/63426994c4867.png', '2022-10-09 06:26:28', 'WH1', 'hp', 'vidusha', 1, '2022-11-16 11:59:49', 1000),
(000177, 'laptop', 'intel', 'i5', '6', '820 g3', 'temp/6342699793187.png', '2022-10-09 06:26:31', 'WH1', 'hp', 'vidusha', 1, '2022-11-16 12:00:08', 1000),
(000178, 'laptop', 'intel', 'i5', '6', '820 g3', 'temp/6342699a6293d.png', '2022-10-09 06:26:34', 'WH1', 'hp', 'vidusha', 1, '2022-11-16 12:00:21', 1000),
(000179, 'laptop', 'intel', 'i5', '6', '820 g3', 'temp/6342699d46a7a.png', '2022-10-09 06:26:37', 'WH1', 'hp', 'vidusha', 1, '2022-11-16 12:00:11', 1000),
(000180, 'laptop', 'intel', 'i5', '6', '820 g3', 'temp/634269a02bf29.png', '2022-10-09 06:26:40', 'WH1', 'hp', 'vidusha', 1, '2022-11-16 12:00:38', 1000),
(000181, 'laptop', 'intel', 'i5', '6', '820 g3', 'temp/634269a337e40.png', '2022-10-09 06:26:43', 'WH1', 'hp', 'vidusha', 1, '2022-11-16 12:00:40', 1000),
(000182, 'laptop', 'intel', 'i5', '6', '820 g3', 'temp/634269a6623bc.png', '2022-10-09 06:26:46', 'WH1', 'hp', 'vidusha', 0, '2022-11-16 06:37:10', 0),
(000183, 'laptop', 'intel', 'i5', '6', '820 g3', 'temp/634269a9a22e9.png', '2022-10-09 06:26:49', 'WH1', 'hp', 'vidusha', 0, '2022-11-16 06:37:12', 0),
(000184, 'laptop', 'intel', 'i5', '6', '820 g3', 'temp/634269acc8a2f.png', '2022-10-09 06:26:52', 'WH1', 'hp', 'vidusha', 0, '2022-11-16 06:37:13', 0),
(000185, 'laptop', 'intel', 'i5', '6', '820 g3', 'temp/634269afec20a.png', '2022-10-09 06:26:55', 'WH1', 'hp', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000186, 'laptop', 'intel', 'i5', '6', '820 g3', 'temp/634269b33056c.png', '2022-10-09 06:26:59', 'WH1', 'hp', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000187, 'laptop', 'intel', 'i5', '6', '820 g3', 'temp/634269b660b10.png', '2022-10-09 06:27:02', 'WH1', 'hp', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000188, 'laptop', 'intel', 'i5', '6', '820 g3', 'temp/634269b9f3239.png', '2022-10-09 06:27:05', 'WH1', 'hp', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000189, 'laptop', 'intel', 'i5', '6', '820 g3', 'temp/634269bd46e7a.png', '2022-10-09 06:27:09', 'WH1', 'hp', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000190, 'laptop', 'intel', 'i5', '8', 'xps 13', 'temp/6342ee86051dc.png', '2022-10-09 15:53:42', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000191, 'laptop', 'intel', 'i5', '8', 'xps 13', 'temp/6342ee8960628.png', '2022-10-09 15:53:45', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000192, 'laptop', 'intel', 'i5', '8', 'xps 13', 'temp/6342ee8cd2d69.png', '2022-10-09 15:53:48', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000193, 'laptop', 'intel', 'i5', '8', 'xps 13', 'temp/6342f141eeca6.png', '2022-10-09 16:05:21', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000194, 'laptop', 'intel', 'i5', '8', 'xps 13', 'temp/6342f14565e51.png', '2022-10-09 16:05:25', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000195, 'laptop', 'intel', 'i5', '8', 'xps 13', 'temp/6342f148ce4c7.png', '2022-10-09 16:05:28', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000196, 'laptop', 'intel', 'i5', '8', 'xps 13', 'temp/6342f1e43de15.png', '2022-10-09 16:08:04', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000197, 'laptop', 'intel', 'i5', '8', 'xps 13', 'temp/6342f1e7cca5a.png', '2022-10-09 16:08:07', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000198, 'laptop', 'intel', 'i5', '8', 'xps 13', 'temp/6342f1eb613dc.png', '2022-10-09 16:08:11', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000199, 'laptop', 'intel', 'i5', '8', 'xps 13', 'temp/6342f28261906.png', '2022-10-09 16:10:42', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000200, 'laptop', 'intel', 'i5', '7', 'xps 13', 'temp/6342f28613a4f.png', '2022-10-09 16:10:46', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000201, 'laptop', 'intel', 'i5', '7', 'xps 13', 'temp/6342f289af0f1.png', '2022-10-09 16:10:49', 'WH2', 'dell', 'vidusha', 0, '0000-00-00 00:00:00', 0),
(000202, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/634a48ee02746.png', '2022-10-15 05:45:18', 'WH1', 'dell', 'admin', 0, '0000-00-00 00:00:00', 0),
(000203, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/634a48f1d2c0d.png', '2022-10-15 05:45:21', 'WH1', 'dell', 'admin', 0, '0000-00-00 00:00:00', 0),
(000204, 'laptop', 'intel', 'i5', '7', 'macbook air 13', 'temp/634a494dc1c17.png', '2022-10-15 05:46:53', 'WH1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(000205, 'laptop', 'intel', 'i5', '1', 'g6', 'temp/634a9e19c2433.png', '2022-10-15 11:48:41', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0),
(000206, 'laptop', 'amd', 'i3', '1', 'g6', 'temp/634aa1ab1e296.png', '2022-10-15 12:03:55', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0),
(000207, 'laptop', 'intel', 'i3', '1', '123', 'temp/634accab21960.png', '2022-10-15 15:07:23', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0),
(000208, 'laptop', 'intel', 'i3', '1', '123', 'temp/634accaf1ef44.png', '2022-10-15 15:07:27', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0),
(000209, 'laptop', 'intel', 'i3', '1', '123', 'temp/634accb33cef0.png', '2022-10-15 15:07:31', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0),
(000210, 'laptop', 'intel', 'i3', '1', '123', 'temp/634accb7780b5.png', '2022-10-15 15:07:35', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0),
(000211, 'laptop', 'intel', 'i3', '1', '123', 'temp/634accbb96eba.png', '2022-10-15 15:07:39', 'WH1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0),
(000212, 'laptop', 'intel', 'i9', '8', 'think pad', 'temp/63539a7acd8e7.png', '2022-10-22 07:23:38', 'WH4', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0),
(000213, 'laptop', 'intel', 'i9', '8', 'think pad', 'temp/63539a7d7a812.png', '2022-10-22 07:23:41', 'WH4', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0),
(000214, 'laptop', 'intel', 'i9', '8', 'think pad', 'temp/63539a8001f2e.png', '2022-10-22 07:23:44', 'WH4', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0),
(000215, 'laptop', 'intel', 'i9', '8', 'think pad', 'temp/63539a8286494.png', '2022-10-22 07:23:46', 'WH4', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0),
(000216, 'laptop', 'intel', 'i9', '8', 'think pad', 'temp/63539a8533d35.png', '2022-10-22 07:23:49', 'WH4', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0),
(000217, 'laptop', 'intel', 'i9', '8', 'think pad', 'temp/63539a87c2dbe.png', '2022-10-22 07:23:51', 'WH4', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0),
(000218, 'laptop', 'intel', 'i9', '8', 'think pad', 'temp/63539a8a483eb.png', '2022-10-22 07:23:54', 'WH4', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0),
(000219, 'laptop', 'intel', 'i9', '8', 'think pad', 'temp/63539a8cdafd6.png', '2022-10-22 07:23:56', 'WH4', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0),
(000220, 'laptop', 'intel', 'i9', '8', 'think pad', 'temp/63539a8f77249.png', '2022-10-22 07:23:59', 'WH4', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0),
(000221, 'laptop', 'intel', 'i9', '8', 'think pad', 'temp/63539a92166bd.png', '2022-10-22 07:24:02', 'WH4', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0),
(000222, 'laptop', 'intel', 'celeron', '7', '840 g3', 'temp/63550649a4433.png', '2022-10-23 09:15:53', 'WH2', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0),
(000223, 'laptop', 'intel', 'celeron', '7', '840 g3', 'temp/6355064c0bb74.png', '2022-10-23 09:15:56', 'WH2', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0),
(000224, 'laptop', 'intel', 'celeron', '7', '840 g3', 'temp/6355064e5f5ff.png', '2022-10-23 09:15:58', 'WH2', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0),
(000225, 'laptop', 'intel', 'i9', '4', '840 g3', 'temp/635507e0c9ae4.png', '2022-10-23 09:22:40', 'WH4', 'gigabyte', 'admin', 0, '0000-00-00 00:00:00', 0),
(000226, 'laptop', 'intel', 'i9', '4', '840 g3', 'temp/635507e34544a.png', '2022-10-23 09:22:43', 'WH4', 'gigabyte', 'admin', 0, '0000-00-00 00:00:00', 0),
(000227, 'laptop', 'intel', 'i9', '4', '840 g3', 'temp/635507e5ada79.png', '2022-10-23 09:22:45', 'WH4', 'gigabyte', 'admin', 0, '0000-00-00 00:00:00', 0),
(000938, 'laptop', 'amd', 'xeon', '4', 'anuradha', 'temp/635774251ecce.png', '2022-10-25 05:29:09', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(000939, 'laptop', 'intel', 'i5', '8', 'e5530', 'temp/6357a07aab8a1.png', '2022-10-25 08:38:18', 'wh3', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0),
(000940, 'laptop', 'intel', 'i9', '3', 'probook', 'temp/6357a4287057e.png', '2022-10-25 08:54:00', 'wh2', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(000941, 'laptop', 'intel', 'i9', '3', 'probook', 'temp/6357a42871a80.png', '2022-10-25 08:54:00', 'wh2', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(000942, 'laptop', 'intel', 'i3', '2', '840 g3', 'temp/6357a46228f2e.png', '2022-10-25 08:54:58', 'wh4', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0),
(000943, 'laptop', 'intel', 'i3', '2', '840 g3', 'temp/6357a4622a94b.png', '2022-10-25 08:54:58', 'wh4', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0),
(000945, 'laptop', 'intel', 'i3', '5', 'l450', 'temp/635a87b08a42a.png', '2022-10-27 13:29:20', 'wh1', 'lenovo', 'warehouse-team-lead', 0, '2022-11-13 08:50:48', 0),
(000946, 'laptop', 'intel', 'i3', '5', 'l450', 'temp/635a87b08d946.png', '2022-10-27 13:29:20', 'wh1', 'lenovo', 'warehouse-team-lead', 0, '2022-11-13 08:50:53', 0),
(000947, 'laptop', 'intel', 'i3', '5', 'l450', 'temp/635a87b08e6e9.png', '2022-10-27 13:29:20', 'wh1', 'lenovo', 'warehouse-team-lead', 0, '2022-11-13 08:50:55', 0),
(000948, 'laptop', 'intel', 'i3', '5', 'l450', 'temp/635a87b08f3a0.png', '2022-10-27 13:29:20', 'wh1', 'lenovo', 'warehouse-team-lead', 0, '2022-11-13 08:50:58', 0),
(000949, 'laptop', 'intel', 'i3', '5', 'l450', 'temp/635a87b090287.png', '2022-10-27 13:29:20', 'wh1', 'lenovo', 'warehouse-team-lead', 0, '2022-11-13 08:51:00', 0),
(000950, 'laptop', 'intel', 'i3', '5', 'l450', 'temp/635a87b090ea8.png', '2022-10-27 13:29:20', 'wh1', 'lenovo', 'warehouse-team-lead', 0, '2022-11-13 08:51:02', 0),
(000951, 'laptop', 'intel', 'i3', '5', 'l450', 'temp/635a87b091af3.png', '2022-10-27 13:29:20', 'wh1', 'lenovo', 'warehouse-team-lead', 0, '2022-11-13 08:51:03', 0),
(000952, 'laptop', 'intel', 'i3', '5', 'l450', 'temp/635a87b09265c.png', '2022-10-27 13:29:20', 'wh1', 'lenovo', 'warehouse-team-lead', 0, '2022-11-13 08:51:05', 0),
(000953, 'laptop', 'intel', 'i3', '5', 'l450', 'temp/635a87b093a68.png', '2022-10-27 13:29:20', 'wh1', 'lenovo', 'warehouse-team-lead', 0, '2022-11-13 08:51:06', 0),
(000954, 'laptop', 'intel', 'i3', '5', 'l450', 'temp/635a87b0947c4.png', '2022-10-27 13:29:20', 'wh1', 'lenovo', 'warehouse-team-lead', 0, '2022-11-13 08:51:09', 0),
(000955, 'laptop', 'intel', 'i3', '4', 'c740', 'temp/635a89263a9a6.png', '2022-10-27 13:35:34', 'wh2', 'acer', 'warehouse-team-lead', 0, '0000-00-00 00:00:00', 0),
(000956, 'laptop', 'intel', 'i3', '4', 'c740', 'temp/635a89263dc35.png', '2022-10-27 13:35:34', 'wh2', 'acer', 'warehouse-team-lead', 0, '0000-00-00 00:00:00', 0),
(000957, 'laptop', 'intel', 'i3', '4', 'c740', 'temp/635a89263e74b.png', '2022-10-27 13:35:34', 'wh2', 'acer', 'warehouse-team-lead', 0, '0000-00-00 00:00:00', 0),
(000958, 'laptop', 'intel', 'i3', '4', 'c740', 'temp/635a89263f349.png', '2022-10-27 13:35:34', 'wh2', 'acer', 'warehouse-team-lead', 0, '0000-00-00 00:00:00', 0),
(000959, 'laptop', 'intel', 'i3', '4', 'c740', 'temp/635a89263ff1a.png', '2022-10-27 13:35:34', 'wh2', 'acer', 'warehouse-team-lead', 0, '0000-00-00 00:00:00', 0),
(000960, 'laptop', 'intel', 'i3', '4', 'c740', 'temp/635a892640b80.png', '2022-10-27 13:35:34', 'wh2', 'acer', 'warehouse-team-lead', 0, '0000-00-00 00:00:00', 0),
(000961, 'laptop', 'intel', 'i3', '4', 'c740', 'temp/635a8926418e3.png', '2022-10-27 13:35:34', 'wh2', 'acer', 'warehouse-team-lead', 0, '0000-00-00 00:00:00', 0),
(000962, 'laptop', 'intel', 'i3', '4', 'c740', 'temp/635a89264248d.png', '2022-10-27 13:35:34', 'wh2', 'acer', 'warehouse-team-lead', 0, '0000-00-00 00:00:00', 0),
(000963, 'laptop', 'intel', 'i3', '4', 'c740', 'temp/635a892642fc7.png', '2022-10-27 13:35:34', 'wh2', 'acer', 'warehouse-team-lead', 0, '0000-00-00 00:00:00', 0),
(000964, 'laptop', 'intel', 'i3', '4', 'c740', 'temp/635a892643b59.png', '2022-10-27 13:35:34', 'wh2', 'acer', '', 0, '0000-00-00 00:00:00', 0),
(000965, 'laptop', 'intel', 'i3', '3', '840 g3', 'temp/63660f453c7bb.png', '2022-11-05 07:22:45', 'wh3', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(000966, 'laptop', 'intel', 'i3', '3', '840 g3', 'temp/63660f453cff5.png', '2022-11-05 07:22:45', 'wh3', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(000967, 'laptop', 'intel', 'i3', '3', '840 g3', 'temp/63660f453d7b5.png', '2022-11-05 07:22:45', 'wh3', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(000968, 'laptop', 'intel', 'i3', '3', '840 g3', 'temp/63660f453e070.png', '2022-11-05 07:22:45', 'wh3', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(000969, 'laptop', 'intel', 'i3', '3', '840 g3', 'temp/63660f453ec9a.png', '2022-11-05 07:22:45', 'wh3', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(000970, 'laptop', 'intel', 'i3', '3', '840 g3', 'temp/63660f453f9c4.png', '2022-11-05 07:22:45', 'wh3', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(000971, 'laptop', 'intel', 'i3', '3', '840 g3', 'temp/63660f4540847.png', '2022-11-05 07:22:45', 'wh3', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(000972, 'laptop', 'intel', 'i3', '3', '840 g3', 'temp/63660f45413e4.png', '2022-11-05 07:22:45', 'wh3', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(000973, 'laptop', 'intel', 'i3', '3', '840 g3', 'temp/63660f4542068.png', '2022-11-05 07:22:45', 'wh3', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(000974, 'laptop', 'intel', 'i3', '3', '840 g3', 'temp/63660f4542b74.png', '2022-11-05 07:22:45', 'wh3', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(000975, 'laptop', 'intel', 'i3', '3', '840 g3', 'temp/63660f4543963.png', '2022-11-05 07:22:45', 'wh3', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(000976, 'laptop', 'intel', 'i3', '3', '840 g3', 'temp/63660f45446db.png', '2022-11-05 07:22:45', 'wh3', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(000977, 'laptop', 'intel', 'i3', '3', '840 g3', 'temp/63660f45452b4.png', '2022-11-05 07:22:45', 'wh3', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(000978, 'laptop', 'intel', 'i3', '3', '840 g3', 'temp/63660f4545ee6.png', '2022-11-05 07:22:45', 'wh3', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(000979, 'laptop', 'intel', 'i3', '5', 'l450', 'temp/636f4aba780ce.png', '2022-11-12 07:26:50', 'wh1', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0),
(000980, 'laptop', 'intel', 'i3', '5', 'l450', 'temp/636f4aba796ef.png', '2022-11-12 07:26:50', 'wh1', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0),
(000981, 'laptop', 'intel', 'i3', '5', 'l450', 'temp/636f4aba7aaa8.png', '2022-11-12 07:26:50', 'wh1', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0),
(000982, 'laptop', 'intel', 'i3', '5', 'l450', 'temp/636f4aba7bf41.png', '2022-11-12 07:26:50', 'wh1', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0),
(000983, 'laptop', 'intel', 'i3', '5', 'l450', 'temp/636f4aba7d367.png', '2022-11-12 07:26:50', 'wh1', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0),
(000984, 'laptop', 'intel', 'i3', '5', 'l450', 'temp/636f4aba7e62f.png', '2022-11-12 07:26:50', 'wh1', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0),
(000985, 'laptop', 'intel', 'i3', '5', 'l450', 'temp/636f4aba7faf5.png', '2022-11-12 07:26:50', 'wh1', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0),
(000986, 'laptop', 'intel', 'i3', '5', 'l450', 'temp/636f4aba80426.png', '2022-11-12 07:26:50', 'wh1', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0),
(000987, 'laptop', 'intel', 'i3', '5', 'l450', 'temp/636f4aba80d5f.png', '2022-11-12 07:26:50', 'wh1', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0),
(000988, 'laptop', 'intel', 'i3', '5', 'l450', 'temp/636f4aba81708.png', '2022-11-12 07:26:50', 'wh1', 'lenovo', 'admin', 0, '0000-00-00 00:00:00', 0),
(000989, 'laptop', 'intel', 'i7', '4', 'macbook air', 'temp/6373306b8db6a.png', '2022-11-15 06:23:39', 'wh2', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(000990, 'laptop', 'intel', 'i7', '4', 'macbook air', 'temp/6373306b8e556.png', '2022-11-15 06:23:39', 'wh2', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(000991, 'laptop', 'intel', 'i7', '4', 'macbook air', 'temp/6373306b8ec99.png', '2022-11-15 06:23:39', 'wh2', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(000992, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/637373968669d.png', '2022-11-15 11:10:14', 'wh1', 'dell', 'admin', 0, '0000-00-00 00:00:00', 0),
(000993, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/6373739686fc2.png', '2022-11-15 11:10:14', 'wh1', 'dell', 'admin', 0, '0000-00-00 00:00:00', 0),
(000994, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/6373739687889.png', '2022-11-15 11:10:14', 'wh1', 'dell', 'admin', 0, '0000-00-00 00:00:00', 0),
(000995, 'laptop', 'intel', 'i3', '1', 'e5530', 'temp/637375582f883.png', '2022-11-15 11:17:44', 'wh1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0),
(000996, 'laptop', 'intel', 'i3', '1', 'e5530', 'temp/637375582ffc4.png', '2022-11-15 11:17:44', 'wh1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0),
(000997, 'laptop', 'intel', 'i3', '1', 'e5530', 'temp/63737558306b6.png', '2022-11-15 11:17:44', 'wh1', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0),
(000998, 'laptop', 'intel', 'i5', '8', 'e5530', 'temp/63739adc6f654.png', '2022-11-15 13:57:48', 'wh2', 'dell', 'wtl', 0, '2022-11-15 13:58:42', 0),
(000999, 'laptop', 'intel', 'i5', '8', 'e5530', 'temp/63739adc6fe25.png', '2022-11-15 13:57:48', 'wh2', 'dell', 'wtl', 0, '2022-11-15 13:58:45', 0),
(001000, 'laptop', 'intel', 'i5', '8', 'e5530', 'temp/63739adc704b6.png', '2022-11-15 13:57:48', 'wh2', 'dell', 'wtl', 0, '2022-11-15 13:59:02', 0),
(001001, 'laptop', 'intel', 'i5', '8', 'e5530', 'temp/63739adc70b3d.png', '2022-11-15 13:57:48', 'wh2', 'dell', 'wtl', 0, '2022-11-15 13:59:04', 0),
(001002, 'laptop', 'intel', 'i5', '8', 'e5530', 'temp/63739adc7121c.png', '2022-11-15 13:57:48', 'wh2', 'dell', 'wtl', 0, '2022-11-15 13:59:06', 0),
(001003, 'laptop', 'intel', 'i5', '8', 'e5530', 'temp/63739adc71a76.png', '2022-11-15 13:57:48', 'wh2', 'dell', 'wtl', 0, '0000-00-00 00:00:00', 0),
(001004, 'laptop', 'intel', 'i5', '8', 'e5530', 'temp/63739adc723b1.png', '2022-11-15 13:57:48', 'wh2', 'dell', 'wtl', 0, '0000-00-00 00:00:00', 0),
(001005, 'laptop', 'intel', 'i5', '8', 'e5530', 'temp/63739adc72c74.png', '2022-11-15 13:57:48', 'wh2', 'dell', 'wtl', 0, '0000-00-00 00:00:00', 0),
(001006, 'laptop', 'intel', 'i5', '8', 'e5530', 'temp/63739adc7358d.png', '2022-11-15 13:57:48', 'wh2', 'dell', 'wtl', 0, '0000-00-00 00:00:00', 0),
(001007, 'laptop', 'intel', 'i5', '8', 'e5530', 'temp/63739adc73d12.png', '2022-11-15 13:57:48', 'wh2', 'dell', 'wtl', 0, '0000-00-00 00:00:00', 0),
(001008, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/637480801f63c.png', '2022-11-16 06:17:36', 'wh1', 'dell', 'admin', 0, '0000-00-00 00:00:00', 0),
(001009, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/637480801f63c.png', '2022-11-16 06:17:36', 'wh1', 'dell', 'admin', 0, '0000-00-00 00:00:00', 0),
(001010, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/6374893658930.png', '2022-11-16 06:54:46', 'wh3', 'dell', 'admin', 0, '0000-00-00 00:00:00', 0),
(001011, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/6374893659dbc.png', '2022-11-16 06:54:46', 'wh3', 'dell', 'admin', 0, '0000-00-00 00:00:00', 0),
(001012, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/637489365a9e6.png', '2022-11-16 06:54:46', 'wh3', 'dell', 'admin', 0, '0000-00-00 00:00:00', 0),
(001013, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/637489365b458.png', '2022-11-16 06:54:46', 'wh3', 'dell', 'admin', 0, '0000-00-00 00:00:00', 0),
(001014, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/637489365bfa1.png', '2022-11-16 06:54:46', 'wh3', 'dell', 'admin', 0, '0000-00-00 00:00:00', 0),
(001015, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/637489365c9b5.png', '2022-11-16 06:54:46', 'wh3', 'dell', 'admin', 0, '0000-00-00 00:00:00', 0),
(001016, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/637489365d31a.png', '2022-11-16 06:54:46', 'wh3', 'dell', 'admin', 0, '0000-00-00 00:00:00', 0),
(001017, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/637489365de0c.png', '2022-11-16 06:54:46', 'wh3', 'dell', 'admin', 0, '0000-00-00 00:00:00', 0),
(001018, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/637489365e9be.png', '2022-11-16 06:54:46', 'wh3', 'dell', 'admin', 0, '0000-00-00 00:00:00', 0),
(001019, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/637489365f310.png', '2022-11-16 06:54:46', 'wh3', 'dell', 'admin', 0, '0000-00-00 00:00:00', 0),
(001020, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/63749341d34ac.png', '2022-11-16 07:37:37', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001021, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/63749341d42a0.png', '2022-11-16 07:37:37', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001022, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/63749341d4fc3.png', '2022-11-16 07:37:37', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001023, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/63749341d5cdc.png', '2022-11-16 07:37:37', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001024, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/63749341d67a4.png', '2022-11-16 07:37:37', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001025, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/63749341d74f4.png', '2022-11-16 07:37:37', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001026, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/63749341d80fa.png', '2022-11-16 07:37:37', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001027, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/63749341d89c4.png', '2022-11-16 07:37:37', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001028, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/63749341d92ad.png', '2022-11-16 07:37:37', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001029, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/63749341d9bc3.png', '2022-11-16 07:37:37', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001030, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/63749341da450.png', '2022-11-16 07:37:37', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001031, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/63749341dac8c.png', '2022-11-16 07:37:37', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001032, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/63749341db58f.png', '2022-11-16 07:37:37', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001033, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/637493a100bc0.png', '2022-11-16 07:39:13', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001034, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/637493a1025fa.png', '2022-11-16 07:39:13', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001035, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/637493a10325c.png', '2022-11-16 07:39:13', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001036, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/637493a103e45.png', '2022-11-16 07:39:13', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001037, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/637493a10488f.png', '2022-11-16 07:39:13', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001038, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/637493a10557c.png', '2022-11-16 07:39:13', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001039, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/637493a10607e.png', '2022-11-16 07:39:13', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001040, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/637493a106ce9.png', '2022-11-16 07:39:13', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001041, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/637493a1078d4.png', '2022-11-16 07:39:13', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001042, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/637493a1085ea.png', '2022-11-16 07:39:13', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001043, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/637493a109034.png', '2022-11-16 07:39:13', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001044, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/637493a109cf6.png', '2022-11-16 07:39:13', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001045, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/637493a10a838.png', '2022-11-16 07:39:13', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001046, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/637493b68b07a.png', '2022-11-16 07:39:34', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001047, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/637493b68cb61.png', '2022-11-16 07:39:34', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001048, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/637493b68d9b9.png', '2022-11-16 07:39:34', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001049, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/637493b68e5a0.png', '2022-11-16 07:39:34', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001050, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/637493b68f05f.png', '2022-11-16 07:39:34', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001051, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/637493b68fd0b.png', '2022-11-16 07:39:34', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001052, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/637493b6905d0.png', '2022-11-16 07:39:34', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001053, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/637493b690db6.png', '2022-11-16 07:39:34', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001054, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/637493b6915cc.png', '2022-11-16 07:39:34', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001055, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/637493b69202c.png', '2022-11-16 07:39:34', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001056, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/637493b6928f9.png', '2022-11-16 07:39:34', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001057, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/637493b693109.png', '2022-11-16 07:39:34', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001058, 'laptop', 'intel', 'i7', '6', 'macbook pro 15', 'temp/637493b693991.png', '2022-11-16 07:39:34', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001059, 'laptop', 'intel', 'i5', '5', 'macbook air', 'temp/637493cfeb8e8.png', '2022-11-16 07:39:59', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001060, 'laptop', 'intel', 'i5', '5', 'macbook air', 'temp/637493cfed953.png', '2022-11-16 07:39:59', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001061, 'laptop', 'intel', 'i5', '5', 'macbook air', 'temp/637493cfeeb31.png', '2022-11-16 07:39:59', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001062, 'laptop', 'intel', 'i5', '5', 'macbook air', 'temp/637493cfefd57.png', '2022-11-16 07:39:59', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001063, 'laptop', 'intel', 'i5', '5', 'macbook air', 'temp/637493cff0fe8.png', '2022-11-16 07:39:59', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001064, 'laptop', 'intel', 'i5', '5', 'macbook air', 'temp/637493cff203b.png', '2022-11-16 07:39:59', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001065, 'laptop', 'intel', 'i5', '5', 'macbook air', 'temp/637493cff2cea.png', '2022-11-16 07:39:59', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001066, 'laptop', 'intel', 'i5', '5', 'macbook air', 'temp/637493cff3841.png', '2022-11-16 07:39:59', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001067, 'laptop', 'intel', 'i5', '5', 'macbook air', 'temp/637493d00014e.png', '2022-11-16 07:40:00', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001068, 'laptop', 'intel', 'i5', '5', 'macbook air', 'temp/637493d000abd.png', '2022-11-16 07:40:00', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001069, 'laptop', 'intel', 'i5', '5', 'macbook air', 'temp/6374956d3ec72.png', '2022-11-16 07:46:53', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001070, 'laptop', 'intel', 'i5', '5', 'macbook air', 'temp/6374956d405fa.png', '2022-11-16 07:46:53', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001071, 'laptop', 'intel', 'i5', '5', 'macbook air', 'temp/6374956d40fd9.png', '2022-11-16 07:46:53', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001072, 'laptop', 'intel', 'i5', '5', 'macbook air', 'temp/6374956d41828.png', '2022-11-16 07:46:53', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001073, 'laptop', 'intel', 'i5', '5', 'macbook air', 'temp/6374956d41ea0.png', '2022-11-16 07:46:53', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001074, 'laptop', 'intel', 'i5', '5', 'macbook air', 'temp/6374956d4261e.png', '2022-11-16 07:46:53', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001075, 'laptop', 'intel', 'i5', '5', 'macbook air', 'temp/6374956d42cbf.png', '2022-11-16 07:46:53', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001076, 'laptop', 'intel', 'i5', '5', 'macbook air', 'temp/6374956d432db.png', '2022-11-16 07:46:53', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001077, 'laptop', 'intel', 'i5', '5', 'macbook air', 'temp/6374956d43a44.png', '2022-11-16 07:46:53', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001078, 'laptop', 'intel', 'i5', '5', 'macbook air', 'temp/6374956d44518.png', '2022-11-16 07:46:53', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001079, 'laptop', 'intel', 'i7', '8', 'macbook pro', 'temp/6374983de3d0f.png', '2022-11-16 07:58:53', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001080, 'laptop', 'intel', 'i7', '8', 'macbook pro', 'temp/6374983de5649.png', '2022-11-16 07:58:53', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001081, 'laptop', 'intel', 'i7', '8', 'macbook pro', 'temp/6374983de62cb.png', '2022-11-16 07:58:53', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001082, 'laptop', 'intel', 'i7', '8', 'macbook pro', 'temp/6374983de7051.png', '2022-11-16 07:58:53', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001083, 'laptop', 'intel', 'i7', '8', 'macbook pro', 'temp/6374983de7ce0.png', '2022-11-16 07:58:53', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001084, 'laptop', 'intel', 'i7', '8', 'macbook pro', 'temp/6374983de8a66.png', '2022-11-16 07:58:53', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001085, 'laptop', 'intel', 'i7', '8', 'macbook pro', 'temp/6374983de9791.png', '2022-11-16 07:58:53', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001086, 'laptop', 'intel', 'i7', '8', 'macbook pro', 'temp/6374983dea398.png', '2022-11-16 07:58:53', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001087, 'laptop', 'intel', 'i7', '8', 'macbook pro', 'temp/6374983deb0ab.png', '2022-11-16 07:58:53', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001088, 'laptop', 'intel', 'i7', '8', 'macbook pro', 'temp/6374983debd3b.png', '2022-11-16 07:58:53', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001089, 'laptop', 'intel', 'i7', '8', 'macbook pro', 'temp/6374983deca29.png', '2022-11-16 07:58:53', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001090, 'laptop', 'intel', 'i7', '8', 'macbook pro', 'temp/6374983ded683.png', '2022-11-16 07:58:53', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001091, 'laptop', 'intel', 'i7', '8', 'macbook pro', 'temp/6374983dee256.png', '2022-11-16 07:58:53', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001092, 'laptop', 'intel', 'i7', '8', 'macbook pro', 'temp/6374983deedc0.png', '2022-11-16 07:58:53', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001093, 'laptop', 'intel', 'i7', '8', 'macbook pro', 'temp/6374983def8f1.png', '2022-11-16 07:58:53', 'wh1', 'apple', 'admin', 0, '0000-00-00 00:00:00', 0),
(001094, 'laptop', 'intel', 'i7', '8', 'e5530', 'temp/637499e5575f2.png', '2022-11-16 08:05:57', 'wh1', 'dell', 'admin', 0, '0000-00-00 00:00:00', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales_quatation_items`
--
ALTER TABLE `sales_quatation_items`
  ADD CONSTRAINT `sales_quatation_items_ibfk_1` FOREIGN KEY (`quatation_id`) REFERENCES `sales_quatation` (`quatation_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
