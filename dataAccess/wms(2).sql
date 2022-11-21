-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2022 at 02:29 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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

CREATE TABLE `bodywork` (
  `id` int(11) NOT NULL,
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
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bodywork`
--

INSERT INTO `bodywork` (`id`, `inventory_id`, `emp_id`, `sales_order_id`, `a_scratch`, `a_broken`, `a_dent`, `b_scratch`, `b_broken`, `b_logo`, `b_color`, `c_scratch`, `c_broken`, `c_dent`, `d_scratch`, `d_broken`, `d_dent`, `status`) VALUES
(47, 214, 1041, 1009, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bodywork_dep`
--

CREATE TABLE `bodywork_dep` (
  `bodywork_id` int(11) NOT NULL,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `combine_check` (
  `id` int(11) NOT NULL,
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
  `combined_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `combine_check`
--

INSERT INTO `combine_check` (`id`, `inventory_id`, `emp_id`, `sales_order_id`, `keyboard`, `speakers`, `camera`, `bazel`, `created_time`, `status`, `damage_keys`, `mousepad`, `mouse_pad_button`, `camera_cable`, `back_cover`, `wifi_card`, `lcd_cable`, `battery`, `battery_cable`, `dvd_rom`, `dvd_caddy`, `hdd_caddy`, `hdd_cable_connector`, `c_panel_palm_rest`, `mb_base`, `hings_cover`, `lan_cover`, `combined_id`) VALUES
(455, 000214, 1041, 1009, 0, 0, 0, 0, '2022-11-21 12:37:38', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(456, 000000, 1041, 1009, 0, 0, 0, 0, '2022-11-21 12:37:38', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(457, 000214, 1041, 1009, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(458, 000214, 1041, 1009, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(459, 000214, 1041, 1009, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(460, 000214, 1041, 1009, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(461, 000214, 1041, 1009, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(462, 000214, 1041, 1009, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(463, 000214, 1041, 1009, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(464, 000214, 1041, 1009, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(465, 000214, 1041, 1009, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(466, 000214, 1041, 1009, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(467, 000214, 1041, 1009, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(468, 000214, 1041, 1009, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(469, 000214, 1041, 1009, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(470, 000214, 1041, 1009, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(471, 000207, 1041, 1009, 1, 0, 0, 0, '2022-11-21 13:07:44', 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(472, 000000, 1041, 1009, 0, 0, 0, 0, '2022-11-21 13:07:44', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(473, 000207, 1041, 1009, 1, 0, 0, 0, '2022-11-20 20:00:00', 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(474, 000207, 1041, 1009, 1, 0, 0, 0, '2022-11-20 20:00:00', 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(475, 000207, 1041, 1009, 0, 0, 0, 0, '2022-11-20 20:00:00', 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(476, 000207, 1041, 1009, 0, 0, 0, 0, '2022-11-20 20:00:00', 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(477, 000218, 1041, 1009, 1, 0, 0, 1, '2022-11-21 13:14:51', 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(478, 000000, 1041, 1009, 0, 0, 0, 0, '2022-11-21 13:14:51', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(479, 000218, 1041, 1009, 1, 0, 0, 1, '2022-11-20 20:00:00', 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(480, 000218, 1041, 1009, 1, 0, 0, 1, '2022-11-20 20:00:00', 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(481, 000218, 1041, 1009, 1, 0, 0, 1, '2022-11-20 20:00:00', 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(482, 000218, 1041, 1009, 1, 0, 0, 1, '2022-11-20 20:00:00', 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(483, 000218, 1041, 1009, 1, 0, 0, 1, '2022-11-20 20:00:00', 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(484, 000218, 1041, 1009, 1, 0, 0, 1, '2022-11-20 20:00:00', 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(485, 000218, 1041, 1009, 1, 0, 0, 1, '2022-11-21 13:19:34', 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(486, 000213, 1041, 1009, 1, 0, 0, 1, '2022-11-21 13:22:16', 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(487, 000000, 1041, 1009, 0, 0, 0, 0, '2022-11-21 13:22:16', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(488, 000213, 1041, 1009, 1, 0, 0, 1, '2022-11-21 13:23:20', 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `core`
--

CREATE TABLE `core` (
  `core_id` int(11) NOT NULL,
  `core` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(13, 'Athlon'),
(14, 'C2D, Pentium, Celeron, Atom (2005-2009)'),
(15, 'C2D, Pentium, Celeron, Atom (2009-2013)'),
(16, 'Pentium, Celeron, Atom (2013-2019)'),
(17, 'AMD, Opteron, Athlon, Turion'),
(18, 'AMD, A4, A6, Vision'),
(19, 'AMD, A8, A9, A10, A12, Vision'),
(20, 'AMD, E1, E2, Vision'),
(21, 'Other AMD'),
(22, 'Core m3'),
(23, 'Core m5'),
(24, 'Core m7');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `phone_code` int(11) NOT NULL,
  `country_code` char(2) NOT NULL,
  `country_name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL,
  `department` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `device` (
  `device_id` int(11) NOT NULL,
  `device` varchar(50) NOT NULL
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

CREATE TABLE `district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(20) NOT NULL,
  `province_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `employees` (
  `emp_id` int(11) NOT NULL,
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
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1040, 'sfsfsf', 'sdassfasf', '', 'sdfsfsdfs', 'male', '2020-02-04', '1231313', '2024-03-03', '3', '2024-12-31', '0123213123', 'married', '123213', 'aland islands', 'sfsfsf', 'afghanistan', '1', 'dual-monitor-wallpaper-7.jpg', '9', '6', '2022-11-03', 'adadsa', 'q31123213123', '2022-11-13 14:54:17', '', 'admin', 0),
(1041, 'tech2', 'tech2', '', 'tech2', 'male', '2010-01-07', '313244', '2027-03-03', '2', '2030-04-03', '32434', 'unmarried', 'sdfsdf', 'falkland islands (malvinas)', 'sdfsf', 'afghanistan', '2324', '7868580.jpg', '1', '6', '2021-10-21', 'ssdfsfsf', '', '2022-11-20 09:54:15', '', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `e_com_listing`
--

CREATE TABLE `e_com_listing` (
  `listing_id` int(11) NOT NULL,
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
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `gender` (
  `gender_id` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `generation` (
  `generation_id` int(11) NOT NULL,
  `generation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `lcd_check` (
  `id` int(11) NOT NULL,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `emp_id` int(11) NOT NULL,
  `sales_order_id` int(11) NOT NULL,
  `whitespot` int(11) DEFAULT NULL,
  `scratch` int(11) DEFAULT NULL,
  `broken` int(11) NOT NULL,
  `line_lcd` int(11) NOT NULL,
  `yellow_shadow` int(11) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lcd_check`
--

INSERT INTO `lcd_check` (`id`, `inventory_id`, `emp_id`, `sales_order_id`, `whitespot`, `scratch`, `broken`, `line_lcd`, `yellow_shadow`, `created_time`, `status`) VALUES
(34, 000214, 1041, 1009, 0, 0, 0, 0, 0, '2022-11-21 12:37:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lcd_dep`
--

CREATE TABLE `lcd_dep` (
  `lcd_id` int(11) NOT NULL,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `motherbaord_dep` (
  `motherboard_id` int(11) NOT NULL,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `motherboard_assign`
--

CREATE TABLE `motherboard_assign` (
  `motherboard_assign_task_id` int(11) NOT NULL,
  `sales_order_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `device` varchar(11) NOT NULL,
  `brand` varchar(11) NOT NULL,
  `processor` varchar(11) NOT NULL,
  `core` varchar(11) NOT NULL,
  `generation` varchar(11) NOT NULL,
  `model` varchar(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `assign_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `task_completed_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `motherboard_check`
--

CREATE TABLE `motherboard_check` (
  `id` int(11) NOT NULL,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `emp_id` int(11) NOT NULL,
  `sales_order_id` int(11) NOT NULL,
  `bios_check` int(11) NOT NULL,
  `no_power` int(11) NOT NULL,
  `usb_connection` int(11) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL,
  `completed_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `motherboard_check`
--

INSERT INTO `motherboard_check` (`id`, `inventory_id`, `emp_id`, `sales_order_id`, `bios_check`, `no_power`, `usb_connection`, `created_time`, `status`, `completed_time`) VALUES
(219, 000214, 1041, 1009, 0, 0, 0, '2022-11-21 12:33:37', 0, '2022-11-21 16:33:37'),
(220, 000207, 1041, 1009, 0, 0, 0, '2022-11-21 13:04:13', 0, '2022-11-21 17:04:13'),
(221, 000218, 1041, 1009, 0, 0, 0, '2022-11-21 13:11:59', 0, '2022-11-21 17:11:59'),
(222, 000213, 1041, 1009, 0, 0, 0, '2022-11-21 13:20:50', 0, '2022-11-21 17:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `motherboard_dep`
--

CREATE TABLE `motherboard_dep` (
  `motherboard_id` int(11) NOT NULL,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `sales_order_id` int(11) NOT NULL,
  `created_by` varchar(15) NOT NULL,
  `received_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `packing_dep`
--

CREATE TABLE `packing_dep` (
  `packing_id` int(11) NOT NULL,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `painting_dep`
--

CREATE TABLE `painting_dep` (
  `painting_id` int(11) NOT NULL,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `part_list`
--

CREATE TABLE `part_list` (
  `part_id` int(11) NOT NULL,
  `part_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(13, 'battery cable'),
(14, 'dvd rom'),
(15, 'hdd cover'),
(16, 'hdd caddy'),
(17, 'hdd connection caddy'),
(18, 'a/top'),
(19, 'c/panel plam rest '),
(20, 'd/mb base'),
(21, 'hings cover'),
(22, 'lan cover'),
(23, 'HDD Connector '),
(24, 'mouse button'),
(25, 'lcd cable(30 pin) '),
(26, 'lcd cable(40 pin) '),
(27, 'speaker');

-- --------------------------------------------------------

--
-- Table structure for table `part_stock`
--

CREATE TABLE `part_stock` (
  `stock_id` int(11) NOT NULL,
  `part_name` varchar(100) NOT NULL,
  `part_model` varchar(100) NOT NULL,
  `part_brand` varchar(100) NOT NULL,
  `part_gen` varchar(40) DEFAULT NULL,
  `capacity` varchar(6) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `location` varchar(40) NOT NULL,
  `rack_number` varchar(10) NOT NULL,
  `slot_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `part_stock`
--

INSERT INTO `part_stock` (`stock_id`, `part_name`, `part_model`, `part_brand`, `part_gen`, `capacity`, `qty`, `location`, `rack_number`, `slot_name`) VALUES
(117, 'hdd cover', 'e6430s', 'dell', '3', '', 47, '', 'RACK-1', 'A-2'),
(118, 'hdd cover', 'e6220', 'dell', '2', '', 84, '', 'RACK-1', 'A-3'),
(119, 'hdd cover', 'x220', 'lenovo', '2', '', 99, '', 'RACK-1', 'A-4'),
(120, 'hdd cover', 't420', 'lenovo', '2', '', 43, '', 'RACK-1', 'A-5'),
(121, 'hdd cover', 'e6440', 'dell', '4', '', 102, '', 'RACK-1', 'B-1'),
(122, 'hdd cover', 't410', 'lenovo', '1', '', 36, '', 'RACK-1', 'B-2'),
(123, 'hdd cover', 'e6540', 'dell', '4', '', 66, '', 'RACK-1', 'B-3'),
(124, 'hdd cover', 'e5440', 'dell', '4', '', 270, '', 'RACK-1', 'B-4'),
(125, 'hdd cover', 'x220', 'lenovo', '', '', 29, '', 'RACK-1', 'B-5'),
(126, 'hdd cover', 't430s', 'lenovo', '3', '', 14, '', 'RACK-1', 'C-1'),
(127, 'hdd cover', 'm4500', 'dell', '4', '', 15, '', 'RACK-1', 'C-2'),
(128, 'hdd cover', 'e4310', 'dell', '1', '', 12, '', 'RACK-1', 'C-3'),
(129, 'hdd cover', 'x201', 'lenovo', '1', '', 5, '', 'RACK-1', 'C-4'),
(130, 'hdd cover', 'e6510', 'dell', '1', '', 0, '', 'RACK-1', 'C-5'),
(131, 'hdd cover', 't500', 'lenovo', '0', '', 44, '', 'RACK-1', 'D-1'),
(132, 'hdd cover', '1000 vostro', 'dell', '0', '', 16, '', 'RACK-1', 'D-1'),
(133, 'hdd cover', '1000 vostro', 'dell', '0', '', 16, '', 'RACK-1', 'D-2'),
(135, 'hdd cover', 'e6440', 'dell', '4', '', 12, '', 'RACK-1', 'D-3'),
(136, 'hdd cover', 't430', 'lenovo', '3', '', 11, '', 'RACK-1', 'D-4'),
(137, 'hdd cover', 'r60', 'lenovo', '0', '', 21, '', 'RACK-1', 'D-5'),
(138, 'hdd cover', 't420s', 'lenovo', '2', '', 13, '', 'RACK-1', 'E-1'),
(139, 'hdd cover', 't410', 'lenovo', '1', '', 8, '', 'RACK-1', 'E-2'),
(140, 'hdd cover', 't420', 'lenovo', '2', '', 7, '', 'RACK-1', 'E-3'),
(141, 'hdd cover', 'e4310', 'dell', '1', '', 5, '', 'RACK-1', 'E-4'),
(142, 'hdd cover', 'e6430', 'dell', '3', '', 2, '', 'RACK-1', 'E-5'),
(143, 'hdd cover', 'e6520', 'dell', '2', '', 2, '', 'RACK-1', 'F-1'),
(144, 'hdd cover', 'x220', 'lenovo', '2', '', 2, '', 'RACK-1', 'F-2'),
(145, 'hdd cover', 't410s', 'lenovo', '1', '', 1, '', 'RACK-1', 'F-3'),
(146, 'hdd cover', 't410s', 'lenovo', '1', '', 1, '', 'RACK-1', 'F-3'),
(147, 'hdd cover', 'e6510', 'dell', '1', '', 0, '', 'RACK-1', 'F-4'),
(148, 'hdd cover', 'e6400', 'dell', '0', '', 1, '', 'RACK-1', 'F-5'),
(149, 'hdd cover', 'e6400', 'dell', '0', '', 1, '', 'RACK-1', 'F-5'),
(150, 'hdd cover', 'e6430s', 'dell', '3', '', 1, '', 'RACK-1', 'G-1'),
(151, 'hdd cover', 'e6430s', 'dell', '3', '', 1, '', 'RACK-1', 'G-1'),
(152, 'HDD Connector ', 'e7440', 'dell', '4', '', 193, '', 'RACK-1', 'G-2'),
(153, 'HDD Connector ', '5420', 'dell', '2', '', 70, '', 'RACK-1', 'G-3'),
(154, 'HDD Connector ', '650 g1', 'hp', '4', '', 43, '', 'RACK-1', 'G-4'),
(155, 'HDD Connector ', 't560', 'lenovo', '6', '', 18, '', 'RACK-1', 'G-5'),
(156, 'HDD Connector ', '9470m', 'hp', '4', '', 88, '', 'RACK-1', 'H-1'),
(157, 'HDD Connector ', 'e5470', 'dell', '6', '', 151, '', 'RACK-1', 'H-2'),
(158, 'HDD Connector ', 'e5470', 'dell', '6', '', 66, '', 'RACK-1', 'H-3'),
(159, 'HDD Connector ', 'e5450', 'dell', '5', '', 40, '', 'RACK-1', 'H-4'),
(160, 'HDD Connector ', 'e5280', 'dell', '8', '', 9, '', 'RACK-1', 'H-5'),
(161, 'HDD Connector ', 'e5480', 'dell', '', '', 10, '', '--Select R', '--Select s'),
(162, 'HDD Connector ', '5480', 'dell', '7', '', 10, '', 'RACK-1', 'I-1'),
(163, 'HDD Connector ', 'm3800', 'dell', '6', '', 6, '', 'RACK-1', 'I-2'),
(164, 'HDD Connector ', 'e7450', 'dell', '3', '', 4, '', 'RACK-1', 'I-3'),
(165, 'HDD Connector ', 'e6230', 'dell', '4', '', 13, '', 'RACK-1', 'I-4'),
(166, 'HDD Connector ', '3450', 'dell', '3', '', 1, '', 'RACK-1', 'I-5'),
(167, 'HDD Connector ', 'e5570', 'dell', '4', '', 1, '', 'RACK-1', 'J-1'),
(168, 'HDD Connector ', 'e5520', 'dell', '4', '', 1, '', 'RACK-1', 'J-2'),
(169, 'HDD Connector ', '820 g2', 'hp', '3', '', 22, '', 'RACK-1', 'J-3'),
(170, 'HDD Connector ', '2560p', 'hp', '4', '', 12, '', 'RACK-1', 'J-4'),
(171, 'HDD Connector ', 'zbook 17 g3', 'hp', '5', '', 5, '', 'RACK-1', 'J-5'),
(173, 'HDD Connector ', 't480s', 'lenovo', '', '', 13, '', 'RACK-1', 'K-1'),
(174, 'HDD Connector ', 't470', 'lenovo', '', '', 30, '', 'RACK-1', 'K-2'),
(175, 'HDD Connector ', 'p50', 'lenovo', '', '', 10, '', 'RACK-1', 'K-3'),
(176, 'HDD Connector ', 'x260', 'lenovo', '', '', 16, '', 'RACK-1', 'K-4'),
(177, 'HDD Connector ', 't480', 'lenovo', '', '', 10, '', 'RACK-1', 'K-5'),
(178, 'HDD Connector ', 'x250', 'lenovo', '', '', 5, '', 'RACK-1', 'L-1'),
(179, 'HDD Connector ', 'ins-15 5547', 'dell', '', '', 10, '', 'RACK-1', 'L-2'),
(181, 'HDD Connector ', 'm3800', 'dell', '', '', 4, '', 'RACK-1', 'L-3'),
(182, 'battery cable', '7270', 'dell', '', '', 12, '', 'RACK-1', 'L-4'),
(183, 'battery cable', 'e7480', 'dell', '', '', 17, '', 'RACK-1', 'L-5'),
(184, 'battery cable', '7530', 'dell', '', '', 10, '', 'RACK-1', 'M-1'),
(185, 'battery cable', 'e5280', 'dell', '', '', 4, '', 'RACK-1', 'M-2'),
(186, 'battery cable', 'e5570', 'dell', '', '', 39, '', 'RACK-1', 'M-3'),
(187, 'battery cable', 'e5480', 'dell', '', '', 94, '', 'RACK-1', 'M-4'),
(188, 'battery cable', 'e7280', 'dell', '', '', 71, '', 'RACK-1', 'M-5'),
(189, 'battery cable', 'e5470', 'dell', '', '', 8, '', 'RACK-1', 'N-1'),
(190, 'mouse pad', 'e5470', 'dell', '', '', 28, '', 'RACK-1', 'N-2'),
(191, 'mouse pad', 'e7470', 'dell', '', '', 3, '', 'RACK-1', 'N-3'),
(192, 'mouse pad', 'e7450', 'dell', '', '', 14, '', 'RACK-1', 'N-4'),
(193, 'mouse pad', 'e7280', 'dell', '', '', 4, '', 'RACK-1', 'N-5'),
(194, 'mouse pad', 'e5490', 'dell', '', '', 17, '', 'RACK-1', 'O-1'),
(195, 'mouse pad', 'e7480', 'dell', '', '', 10, '', 'RACK-1', 'O-2'),
(196, 'mouse pad', 'e7490', 'dell', '', '', 5, '', 'RACK-1', 'O-3'),
(197, 'mouse pad', 'e5570', 'dell', '', '', 17, '', 'RACK-1', 'O-4'),
(198, 'mouse pad', 'e7480', 'dell', '', '', 7, '', 'RACK-1', 'O-5'),
(199, 'mouse pad', 'e5580', 'dell', '', '', 5, '', 'RACK-1', 'P-1'),
(200, 'mouse pad', 'e5590', 'dell', '', '', 3, '', 'RACK-1', 'P-2'),
(201, 'mouse pad', 'x240', 'lenovo', '', '', 29, '', 'RACK-1', 'P-3'),
(202, 'mouse pad', 'x250', 'lenovo', '', '', 14, '', 'RACK-1', 'P-4'),
(203, 'mouse pad', 'x260', 'lenovo', '', '', 4, '', 'RACK-1', 'P-5'),
(204, 'mouse pad', 't440', 'lenovo', '', '', 19, '', 'RACK-1', 'Q-1'),
(205, 'mouse pad', 't450', 'lenovo', '', '', 11, '', 'RACK-1', 'Q-2'),
(206, 'mouse pad', 't460', 'lenovo', '', '', 1, '', 'RACK-1', 'Q-3'),
(207, 'mouse pad', 'p50', 'lenovo', '', '', 0, '', 'RACK-1', 'Q-4'),
(208, 'mouse pad', 't470', 'lenovo', '', '', 7, '', 'RACK-1', 'Q-5'),
(209, 'mouse pad', 'x1 yoga g2', 'lenovo', '', '', 5, '', 'RACK-1', 'R-1'),
(210, 'mouse pad', 'x1 carbon g5', 'lenovo', '', '', 5, '', 'RACK-1', 'R-2'),
(211, 'mouse pad', 'x1 carbon g3', 'lenovo', '', '', 8, '', 'RACK-1', 'R-3'),
(212, 'mouse pad', 'yoga 260', 'lenovo', '', '', 5, '', 'RACK-1', 'R-4'),
(213, 'mouse pad', 't440p', 'lenovo', '', '', 13, '', 'RACK-1', 'R-5'),
(214, 'mouse pad', 't440s', 'lenovo', '', '', 12, '', 'RACK-1', 'S-1'),
(215, 'mouse pad', 't450s', 'lenovo', '', '', 16, '', 'RACK-1', 'S-2'),
(216, 'mouse pad', 't460s', 'lenovo', '', '', 33, '', 'RACK-1', 'S-3'),
(217, 'mouse pad', 't470s', 'lenovo', '', '', 16, '', 'RACK-1', 'S-4'),
(218, 'mouse pad', 'l440', 'lenovo', '', '', 18, '', 'RACK-1', 'S-5'),
(219, 'mouse pad', 'x220', 'lenovo', '', '', 46, '', 'RACK-1', 'T-1'),
(220, 'mouse pad', '9470m', 'hp', '', '', 49, '', 'RACK-1', 'T-2'),
(221, 'mouse pad', '840 g3', 'hp', '', '', 38, '', 'RACK-1', 'T-3'),
(222, 'mouse pad', '650 g2', 'hp', '', '', 15, '', 'RACK-1', 'T-5'),
(223, 'mouse pad', '840 g1', 'hp', '', '', 17, '', 'RACK-2', 'A-1'),
(224, 'mouse pad', '640 g1', 'hp', '', '', 5, '', 'RACK-2', 'A-2'),
(225, 'mouse pad', '830 g6', 'hp', '', '', 5, '', 'RACK-2', 'A-3'),
(226, 'mouse pad', '850 g1', 'hp', '', '', 2, '', 'RACK-1', 'A-4'),
(227, 'mouse pad', 'zbook 15 g3', 'hp', '', '', 6, '', 'RACK-2', 'A-5'),
(228, 'mouse pad', '1040 g3', 'hp', '', '', 2, '', 'RACK-2', 'B-1'),
(229, 'mouse pad', '1030 g2', 'hp', '', '', 51, '', 'RACK-2', 'B-2'),
(230, 'mouse pad', '2560p', 'hp', '', '', 9, '', 'RACK-2', 'B-3'),
(231, 'mouse pad', '850 g1', 'hp', '', '', 2, '', 'RACK-2', 'A-4'),
(232, 'mouse pad', '8470p', 'hp', '', '', 13, '', 'RACK-2', 'B-4'),
(233, 'mouse pad', '8460p', 'hp', '', '', 29, '', 'RACK-2', 'B-5'),
(234, 'mouse pad', '8560p', 'hp', '', '', 8, '', 'RACK-2', 'C-1'),
(235, 'lcd cable(30 pin) ', '840 g3', 'hp', '', '', 87, '', 'RACK-1', 'C-3'),
(236, 'lcd cable(30 pin) ', '840 g3', 'hp', '', '', 87, '', 'RACK-2', 'C-2'),
(237, 'lcd cable(40 pin) ', '840 g3', 'hp', '', '', 174, '', 'RACK-2', 'C-3'),
(238, 'lcd cable(40 pin) ', '840 g3', 'hp', '', '', 174, '', 'RACK-2', 'C-3'),
(239, 'lcd cable(40 pin) ', '9480m', 'hp', '', '', 14, '', 'RACK-2', 'C-4'),
(240, 'lcd cable(40 pin) ', '2560p', 'hp', '', '', 9, '', 'RACK-2', 'C-5'),
(241, 'lcd cable(40 pin) ', '8470p', 'hp', '', '', 5, '', 'RACK-2', 'D-1'),
(242, 'lcd cable(30 pin) ', '8440p', 'hp', '', '', 5, '', 'RACK-2', 'D-2'),
(243, 'lcd cable(40 pin) ', '3440', 'dell', '', '', 30, '', 'RACK-2', 'D-3'),
(244, 'lcd cable(30 pin) ', 'e5450', 'dell', '', '', 75, '', 'RACK-2', 'D-4'),
(245, 'lcd cable(40 pin) ', 'e5440', 'dell', '', '', 106, '', 'RACK-2', 'D-5'),
(248, 'lcd cable(40 pin) ', 'e6430s', 'dell', '', '', 3, '', 'RACK-2', 'E-2'),
(252, 'lcd cable(40 pin) ', 'e5440', 'dell', '', '', 150, '', 'RACK-2', 'E-3'),
(253, 'lcd cable(40 pin) ', 'e5440', 'dell', '', '', 133, '', 'RACK-2', 'E-4'),
(254, 'lcd cable(30 pin) ', 'e5480', 'dell', '', '', 6, '', 'RACK-2', 'E-5'),
(255, 'lcd cable(40 pin) ', 'e6320', 'dell', '', '', 11, '', 'RACK-2', 'F-1'),
(256, 'lcd cable(40 pin) ', 'e6430', 'dell', '', '', 16, '', 'RACK-2', 'F-2'),
(257, 'lcd cable(40 pin) ', 'e5440', 'dell', '', '', 64, '', 'RACK-2', 'F-3'),
(258, 'lcd cable(30 pin) ', 'e6410', 'dell', '', '', 7, '', 'RACK-2', 'F-4'),
(259, 'lcd cable(40 pin) ', 'e5430', 'dell', '', '', 11, '', 'RACK-2', 'F-5'),
(260, 'lcd cable(40 pin) ', 'e6230', 'dell', '', '', 6, '', 'RACK-2', 'G-1'),
(261, 'lcd cable(30 pin) ', '3520', 'dell', '', '', 4, '', 'RACK-2', 'G-2'),
(262, 'lcd cable(40 pin) ', '3540', 'dell', '', '', 4, '', 'RACK-2', 'G-3'),
(263, 'lcd cable(40 pin) ', 'e6330', 'dell', '', '', 3, '', 'RACK-2', 'G-4'),
(264, 'lcd cable(30 pin) ', 't470', 'lenovo', '', '', 9, '', 'RACK-2', 'G-5'),
(265, 'lcd cable(30 pin) ', 't460', 'dell', '', '', 37, '', 'RACK-2', 'H-1'),
(266, 'lcd cable(40 pin) ', 't410', 'lenovo', '', '', 10, '', 'RACK-2', 'H-2'),
(267, 'lcd cable(40 pin) ', 'l420', 'lenovo', '', '', 13, '', 'RACK-2', 'H-3'),
(268, 'lcd cable(30 pin) ', 't460s', 'lenovo', '', '', 30, '', 'RACK-2', 'H-4'),
(269, 'lcd cable(40 pin) ', 'x220', 'lenovo', '', '', 4, '', 'RACK-2', 'H-5'),
(270, 'lcd cable(30 pin) ', 't440s', 'lenovo', '', '', 4, '', 'RACK-2', 'I-1'),
(271, 'lcd cable(30 pin) ', 't450', 'lenovo', '', '', 9, '', 'RACK-2', 'I-2'),
(272, 'lcd cable(40 pin) ', 'x201 tablet', 'lenovo', '', '', 4, '', 'RACK-2', 'I-3'),
(274, 'mouse button', '8560p', 'hp', '', '', 4, '', 'RACK-2', 'I-4'),
(275, 'mouse button', '450 g1', 'hp', '', '', 7, '', 'RACK-2', 'I-5'),
(276, 'mouse button', '850 g1', 'hp', '', '', 3, '', 'RACK-2', 'J-1'),
(277, 'mouse button', '640 g1', 'hp', '', '', 10, '', 'RACK-2', 'J-2'),
(278, 'mouse button', 'x201 tablet', 'lenovo', '', '', 26, '', 'RACK-2', 'J-3'),
(279, 'mouse button', 'l430', 'lenovo', '', '', 8, '', 'RACK-2', 'J-4'),
(280, 'mouse button', 'e7280', 'dell', '', '', 31, '', 'RACK-2', 'J-5'),
(281, 'mouse button', 'e5570', 'dell', '', '', 9, '', 'RACK-2', 'K-1'),
(282, '--Select Item Type--', 'e5540', '--Select Brand--', '', '', 8, '', 'RACK-2', 'K-2'),
(283, 'mouse button', 'e6440', 'dell', '', '', 33, '', 'RACK-2', 'K-3'),
(284, 'mouse button', 'e7440', 'dell', '', '', 5, '', 'RACK-2', 'K-4'),
(285, 'mouse button', 'e7450', 'dell', '', '', 5, '', 'RACK-2', 'K-5'),
(286, 'mouse button', 'e5490', 'dell', '', '', 15, '', 'RACK-2', 'L-1'),
(287, 'mouse button', 'e5470', 'dell', '', '', 22, '', 'RACK-2', 'L-2'),
(288, 'mouse button', 'e7240', 'dell', '', '', 13, '', 'RACK-2', 'L-3'),
(289, 'mouse button', 'e6430', 'dell', '', '', 8, '', 'RACK-2', 'L-4'),
(290, 'mouse button', 'e5450', 'dell', '', '', 7, '', 'RACK-2', 'L-5'),
(291, 'mouse button', 'e6330', 'dell', '', '', 9, '', 'RACK-2', 'M-1'),
(292, 'mouse button', 'e5440', 'dell', '', '', 6, '', 'RACK-2', 'M-2'),
(293, 'mouse button', 'e7470', 'dell', '', '', 9, '', 'RACK-2', 'M-4'),
(294, 'mouse pad', '840 g3', 'hp', '', '', 25, '', 'RACK-1', 'T-4'),
(295, 'mouse pad', '1030 g2', 'hp', '', '', 50, '', 'RACK-2', 'M-3'),
(296, 'mouse pad', '1030 g2', 'hp', '', '', 50, '', 'RACK-2', 'M-5'),
(297, 'mouse pad', '1030 g2', 'hp', '', '', 50, '', 'RACK-2', 'M-5'),
(298, 'mouse pad', '1030 g2', 'hp', '', '', 50, '', 'RACK-2', 'M-5'),
(299, 'mouse pad', '1030 g2', 'hp', '', '', 50, '', 'RACK-2', 'M-5'),
(300, 'mouse pad', '1030 g2', 'hp', '', '', 50, '', 'RACK-2', 'M-5'),
(301, 'speaker', 't460', 'lenovo', '', '', 29, '', 'rack-2', 'N-1'),
(302, 'speaker', 'x201 tablet', 'lenovo', '', '', 33, '', 'rack-2', 'N-2'),
(303, 'speaker', 't460s', 'lenovo', '', '', 18, '', 'rack-2', 'N-3'),
(304, 'speaker', 't440', 'lenovo', '', '', 10, '', 'rack-2', 'N-4'),
(305, 'speaker', 'x230', 'lenovo', '', '', 14, '', 'rack-2', 'N-5'),
(306, 'speaker', 'x1 carbon g2', 'lenovo', '', '', 6, '', 'rack-2', 'O-1'),
(307, 'speaker', 't450', 'lenovo', '', '', 5, '', 'rack-2', 'O-2'),
(308, 'speaker', 'x250', 'lenovo', '', '', 24, '', 'rack-2', 'O-3'),
(309, 'speaker', 'x220 tablet', 'lenovo', '', '', 28, '', 'rack-2', 'O-4'),
(310, 'speaker', 't450s', 'lenovo', '', '', 10, '', 'rack-2', 'O-5'),
(311, 'speaker', 't470', 'lenovo', '', '', 21, '', 'rack-2', 'P-1'),
(312, 'speaker', 'x260', 'lenovo', '', '', 5, '', 'rack-2', 'P-2'),
(313, 'speaker', 'x1 carbon g3', 'lenovo', '', '', 5, '', 'rack-2', 'P-3'),
(315, 'speaker', 't470', 'lenovo', '', '', 26, '', 'rack-2', 'P-4'),
(316, 'speaker', 't460', 'lenovo', '', '', 36, '', 'rack-2', 'P-5'),
(317, 'speaker', '840 g1', 'hp', '', '', 8, '', 'rack-2', 'Q-1'),
(318, 'speaker', '1030 g2', 'hp', '', '', 19, '', 'rack-2', 'Q-2'),
(319, 'speaker', '840 g3', 'hp', '', '', 26, '', 'rack-2', 'Q-3'),
(320, 'speaker', '840 g5', 'hp', '', '', 4, '', 'rack-2', 'Q-4'),
(321, 'speaker', '9480m', 'hp', '', '', 47, '', 'rack-2', 'Q-5'),
(322, 'speaker', 'e5480', 'dell', '', '', 10, '', 'rack-2', 'R-2'),
(323, 'speaker', 'e5570', 'dell', '', '', 5, '', 'rack-2', 'R-3'),
(324, 'speaker', 'e6230', 'dell', '', '', 4, '', 'rack-2', 'R-4'),
(325, 'speaker', 'e5430', 'dell', '', '', 12, '', 'rack-2', 'R-5'),
(326, 'speaker', '3440', 'dell', '', '', 28, '', 'rack-2', 'S-1'),
(327, 'speaker', 'e5480', 'dell', '', '', 36, '', 'rack-2', 'S-2'),
(328, 'speaker', 'e5470', 'dell', '', '', 5, '', 'rack-2', 'S-3'),
(329, 'speaker', 'e7280', 'dell', '', '', 14, '', 'rack-2', 'S-4'),
(330, 'speaker', 'e6320', 'dell', '', '', 8, '', 'rack-2', 'S-5'),
(331, 'speaker', 'e5520', 'dell', '', '', 24, '', 'rack-2', 'T-1'),
(332, 'speaker', 'e5540', 'dell', '', '', 8, '', 'rack-2', 'T-2'),
(333, 'speaker', 'e7270', 'dell', '', '', 10, '', 'rack-2', 'T-3'),
(334, 'speaker', 'e7470', 'dell', '', '', 7, '', 'rack-2', 'T-5'),
(335, 'speaker', 'e5530', 'dell', '', '', 3, '', 'rack-2', 'R-1'),
(343, 'hdd caddy', '9.5mm fat', 'dell', '', '', 125, '', 'rack-3', 'A-1'),
(350, 'hdd caddy', '9.5mm fat', 'dell', '', '', 125, '', 'rack-3', 'A-3'),
(351, 'hdd caddy', '9.5mm fat', 'dell', '', '', 125, '', 'rack-3', 'A-4'),
(352, 'hdd caddy', '9.5mm fat', 'dell', '', '', 125, '', 'rack-3', 'A-5'),
(353, 'hdd caddy', '9.5mm fat', 'dell', '', '', 125, '', 'rack-3', 'B-1'),
(354, 'hdd caddy', '9.5mm fat', 'dell', '', '', 125, '', 'rack-3', 'B-2'),
(355, 'hdd caddy', '9.5mm fat', 'dell', '', '', 125, '', 'rack-3', 'B-3'),
(356, 'hdd caddy', '9.5mm fat', 'dell', '', '', 125, '', 'rack-3', 'B-4'),
(357, 'hdd caddy', '9.5mm fat', 'dell', '', '', 1114, '', 'rack-3', 'B-5'),
(358, 'hdd caddy', '7.0mm slim', 'dell', '', '', 339, '', 'rack-3', 'C-1'),
(359, 'hdd caddy', '7.0mm slim', 'dell', '', '', 339, '', 'rack-3', 'C-2'),
(360, 'hdd caddy', '7.0mm slim', 'dell', '', '', 339, '', 'rack-3', 'C-3'),
(361, 'hdd caddy', '7.0mm slim', 'dell', '', '', 339, '', 'rack-3', 'C-4'),
(362, 'hdd caddy', '7.0mm slim', 'dell', '', '', 339, '', 'rack-3', 'C-5'),
(363, 'hdd caddy', '7.0mm slim', 'dell', '', '', 339, '', 'rack-3', 'D-1'),
(364, 'hdd caddy', '7.0mm slim', 'dell', '', '', 350, '', 'rack-3', 'D-2'),
(365, 'hdd caddy', '7.0mm slim cut', 'dell', '', '', 165, '', 'rack-3', 'D-3'),
(368, 'hdd cover', '9.0mm slim cut', 'dell', '', '', 139, '', 'rack-3', 'D-5'),
(369, 'hdd caddy', 'hdd red color ', 'dell', '', '', 277, '', 'rack-3', 'E-1'),
(370, 'hdd caddy', 'hdd red color ', 'dell', '', '', 174, '', 'rack-3', 'E-2'),
(373, 'battery cable', '86', 'dell', '', '', 0, '', 'rack-2', 'E-1_remove'),
(374, 'lcd cable(30 pin) ', 'e7480', 'dell', '', '', 6, '', 'rack-2', 'E-1'),
(375, 'hdd caddy', '9.5mm fat', 'dell', '', '', 115, '', 'rack-3', 'A-2'),
(376, 'hdd caddy', '7.0mm slim cut', 'dell', '', '', 40, '', 'rack-3', 'D-4'),
(377, 'hdd caddy', '8460p', 'hp', '', '', 25, '', 'rack-3', 'E-3'),
(378, 'hdd caddy', '8460p', 'hp', '', '', 25, '', 'rack-3', 'E-4'),
(379, 'hdd caddy', '8460p', 'hp', '', '', 25, '', 'rack-3', 'E-5'),
(380, 'hdd caddy', 'e5430', 'dell', '', '', 40, '', 'rack-3', 'F-1'),
(381, 'hdd caddy', 'e5420', 'dell', '', '', 50, '', 'rack-3', 'F-2'),
(382, 'hdd caddy', 'e5420', 'dell', '', '', 39, '', 'rack-3', 'F-3'),
(383, 'hdd caddy', 'm4800', 'dell', '', '', 18, '', 'rack-3', 'F-4'),
(384, 'hdd caddy', 'e5530', 'dell', '', '', 6, '', 'rack-3', 'F-5'),
(385, 'hdd caddy', 'e5430', 'dell', '', '', 7, '', 'rack-3', 'G-1'),
(386, 'hdd caddy', 'e5580', 'dell', '', '', 7, '', 'rack-3', 'G-2'),
(387, 'hdd caddy', '820 g1', 'dell', '', '', 12, '', 'rack-3', 'G-3'),
(388, 'hdd caddy', '640 g1', 'hp', '', '', 9, '', 'rack-3', 'G-4');

-- --------------------------------------------------------

--
-- Table structure for table `prepared_part`
--

CREATE TABLE `prepared_part` (
  `prep_id` int(11) NOT NULL,
  `location` varchar(40) NOT NULL,
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
  `c_panel_palm_rest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `processor`
--

CREATE TABLE `processor` (
  `processor_id` int(11) NOT NULL,
  `processor` varchar(10) NOT NULL,
  `parent` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `production` (
  `production_id` int(11) NOT NULL,
  `sales_order_id` int(11) NOT NULL,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `received_date` datetime NOT NULL,
  `created_by` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`production_id`, `sales_order_id`, `inventory_id`, `received_date`, `created_by`) VALUES
(143, 1009, 000223, '2022-11-21 15:44:44', 'PROD-TEAM-LEAD'),
(144, 1009, 000206, '2022-11-21 15:44:56', 'PROD-TEAM-LEAD'),
(145, 1009, 000204, '2022-11-21 15:45:00', 'PROD-TEAM-LEAD'),
(146, 1009, 000209, '2022-11-21 15:45:05', 'PROD-TEAM-LEAD'),
(147, 1009, 000208, '2022-11-21 15:45:12', 'PROD-TEAM-LEAD'),
(148, 1009, 000221, '2022-11-21 15:45:17', 'PROD-TEAM-LEAD'),
(149, 1009, 000219, '2022-11-21 15:45:25', 'PROD-TEAM-LEAD'),
(150, 1009, 000218, '2022-11-21 15:45:29', 'PROD-TEAM-LEAD'),
(151, 1009, 000217, '2022-11-21 15:45:33', 'PROD-TEAM-LEAD'),
(152, 1009, 000222, '2022-11-21 15:45:38', 'PROD-TEAM-LEAD'),
(153, 1009, 000220, '2022-11-21 15:45:45', 'PROD-TEAM-LEAD'),
(154, 1009, 000205, '2022-11-21 15:45:52', 'PROD-TEAM-LEAD'),
(155, 1009, 000210, '2022-11-21 15:46:10', 'PROD-TEAM-LEAD'),
(156, 1009, 000212, '2022-11-21 15:46:16', 'PROD-TEAM-LEAD'),
(157, 1009, 000216, '2022-11-21 15:46:20', 'PROD-TEAM-LEAD'),
(158, 1009, 000215, '2022-11-21 15:46:24', 'PROD-TEAM-LEAD'),
(159, 1009, 000211, '2022-11-21 15:46:28', 'PROD-TEAM-LEAD'),
(160, 1009, 000207, '2022-11-21 15:46:31', 'PROD-TEAM-LEAD'),
(161, 1009, 000214, '2022-11-21 15:46:35', 'PROD-TEAM-LEAD'),
(162, 1009, 000213, '2022-11-21 15:46:38', 'PROD-TEAM-LEAD');

-- --------------------------------------------------------

--
-- Table structure for table `production_check`
--

CREATE TABLE `production_check` (
  `id` int(11) NOT NULL,
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
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production_check`
--

INSERT INTO `production_check` (`id`, `inventory_id`, `emp_id`, `sales_order_id`, `processor`, `generation`, `ram`, `ssd`, `hdd`, `display`, `resolutions`, `graphic`, `graphic_type`, `operating_system`, `created_time`, `status`) VALUES
(18, 000214, 1041, 1009, 'i5', '6th', '8gb', '256gb', '', 'non-touch', 'fhd', '', 'intel', 'Windows', '2022-11-21 13:01:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `prod_cmb_check`
--

CREATE TABLE `prod_cmb_check` (
  `id` int(11) NOT NULL,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `emp_id` int(11) NOT NULL,
  `sales_order_id` int(11) NOT NULL,
  `keyboard` int(11) NOT NULL,
  `speakers` int(11) NOT NULL,
  `camera` int(11) NOT NULL,
  `bazel` int(11) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prod_info`
--

CREATE TABLE `prod_info` (
  `p_id` int(11) NOT NULL,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `sales_order` int(11) NOT NULL,
  `start_date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_date_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `emp_id` int(11) NOT NULL,
  `tech_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `issue_type` int(11) NOT NULL COMMENT '1=motherboard,2=combine,3=lcd,4=bodywork,5=no-issues'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prod_info`
--

INSERT INTO `prod_info` (`p_id`, `inventory_id`, `sales_order`, `start_date_time`, `end_date_time`, `emp_id`, `tech_id`, `status`, `issue_type`) VALUES
(303, 000214, 1009, '2022-11-21 12:21:44', '0000-00-00 00:00:00', 1041, 135, 1, 0),
(304, 000214, 1009, '2022-11-21 12:25:18', '2022-11-21 13:01:37', 1041, 135, 0, 5),
(305, 000207, 1009, '2022-11-21 13:03:46', '2022-11-21 13:07:44', 1041, 135, 1, 2),
(306, 000218, 1009, '2022-11-21 13:11:51', '2022-11-21 13:14:51', 1041, 135, 1, 2),
(307, 000218, 1009, '2022-11-21 13:17:51', '0000-00-00 00:00:00', 1041, 135, 1, 0),
(308, 000218, 1009, '2022-11-21 13:18:13', '2022-11-21 13:19:34', 1041, 135, 1, 2),
(309, 000213, 1009, '2022-11-21 13:20:46', '2022-11-21 13:22:16', 1041, 135, 1, 2),
(310, 000213, 1009, '2022-11-21 13:22:57', '2022-11-21 13:23:20', 1041, 135, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `prod_technician_assign_info`
--

CREATE TABLE `prod_technician_assign_info` (
  `tech_id` int(11) NOT NULL,
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
  `device_type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prod_technician_assign_info`
--

INSERT INTO `prod_technician_assign_info` (`tech_id`, `emp_id`, `sales_order_id`, `model`, `tech_assign_qty`, `created_time`, `task_completed_time`, `core`, `generation`, `processor`, `brand`, `device_type`) VALUES
(135, 1041, 1009, 't470', 20, '2022-11-21 12:09:54', '0000-00-00 00:00:00', 'i5', '6', 'intel', 'lenovo', 'laptop');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `province_id` int(11) NOT NULL,
  `province_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`province_id`, `province_name`) VALUES
(1, 'Central'),
(2, 'Eastern'),
(3, 'North Central'),
(4, 'North Western'),
(5, 'Northern'),
(6, 'Sabaragamuwa'),
(7, 'Southern'),
(8, 'Uva'),
(9, 'Western');

-- --------------------------------------------------------

--
-- Table structure for table `qc_dep`
--

CREATE TABLE `qc_dep` (
  `qc_id` int(11) NOT NULL,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rack`
--

CREATE TABLE `rack` (
  `rack_id` int(11) NOT NULL,
  `rack_number` varchar(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rack`
--

INSERT INTO `rack` (`rack_id`, `rack_number`, `status`) VALUES
(1, 'RACK-1', 0),
(2, 'RACK-2', 0),
(3, 'RACK-3', 0),
(4, 'RACK-4', 0),
(5, 'RACK-5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rack_slots`
--

CREATE TABLE `rack_slots` (
  `slot_id` int(11) NOT NULL,
  `slot_name` varchar(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rack_slots`
--

INSERT INTO `rack_slots` (`slot_id`, `slot_name`, `status`) VALUES
(1, 'A-1', 0),
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

CREATE TABLE `relationship` (
  `relationship_id` int(11) NOT NULL,
  `relationship` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `requested_part_from_production` (
  `rp_id` int(11) NOT NULL,
  `brand` varchar(40) NOT NULL,
  `model` varchar(40) NOT NULL,
  `generation` int(11) NOT NULL,
  `sales_order_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `created_date` date NOT NULL,
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
  `switch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requested_part_from_production`
--

INSERT INTO `requested_part_from_production` (`rp_id`, `brand`, `model`, `generation`, `sales_order_id`, `inventory_id`, `created_date`, `delivery_date`, `emp_id`, `location`, `status`, `keyboard`, `speakers`, `camera`, `bazel`, `lan_cover`, `mousepad`, `mouse_pad_button`, `camera_cable`, `back_cover`, `wifi_card`, `lcd_cable`, `battery`, `battery_cable`, `dvd_rom`, `dvd_caddy`, `hdd_caddy`, `hdd_cable_connector`, `c_panel_palm_rest`, `mb_base`, `hings_cover`, `switch`, `switch_id`) VALUES
(141, 'lenovo', 't470', 6, 1009, 207, '0000-00-00', '2022-11-21 00:00:00', 1041, '0', 0, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(142, 'lenovo', 't470', 6, 1009, 218, '0000-00-00', '2022-11-21 00:00:00', 1041, '0', 0, 1, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 214),
(143, 'lenovo', 't470', 6, 1009, 218, '0000-00-00', '2022-11-21 00:00:00', 1041, '0', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 214),
(144, 'lenovo', 't470', 6, 1009, 213, '0000-00-00', '2022-11-21 00:00:00', 1041, '0', 0, 1, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 218),
(145, 'lenovo', 't470', 6, 1009, 213, '0000-00-00', '2022-11-21 00:00:00', 1041, '0', 0, 1, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 218);

-- --------------------------------------------------------

--
-- Table structure for table `request_parts_from_part_warehouse`
--

CREATE TABLE `request_parts_from_part_warehouse` (
  `part_req_id` int(11) NOT NULL,
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
  `c_panel_palm_rest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_add_items`
--

CREATE TABLE `sales_order_add_items` (
  `sales_item_id` int(11) NOT NULL,
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
  `item_os` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order_add_items`
--

INSERT INTO `sales_order_add_items` (`sales_item_id`, `item_type`, `item_brand`, `item_model`, `item_processor`, `item_core`, `item_generation`, `item_ram`, `item_hdd`, `item_condition`, `item_quantity`, `item_price`, `item_total_price`, `item_delivery_date`, `sales_order_created_date`, `sales_order_id`, `item_display`, `item_graphic`, `item_screen`, `item_bulk`, `item_os`) VALUES
(29, 'laptop', 'dell', 'e6530', 'intel', 'i5', '3', '4', '256gb', '-', 22, 11000, '500', '2022-12-05', '2022-11-20 09:33:12', 1008, 'hd (1366*768)', '2gb', 'non-touch', 'bulk sale', 'windows 10'),
(30, 'laptop', 'lenovo', 't470', 'intel', 'i5', '6', '8', '256gb', '-', 20, 20000, '1000', '2022-12-07', '2022-11-20 16:15:01', 1009, 'hd (1366*768)', '2gb', 'non-touch', 'bulk sale', 'windows 10'),
(31, 'laptop', 'dell', 'e5530', 'intel', 'i7', '8', '16', '512gb ssd', '-', 10, 15000, '1500', '2022-12-12', '2022-11-21 06:22:26', 1010, 'full hd (1920*1080)', '4gb', 'non-touch', 'bulk sale', 'windows 11'),
(32, 'laptop', 'dell', 'xps 15', 'intel', 'i7', '10', '32', '1tb ssd', '-', 10, 15000, '1500', '2022-12-12', '2022-11-21 06:22:26', 1010, 'full hd (1920*1080)', '4gb', 'non-touch', 'bulk sale', 'windows 10'),
(33, 'laptop', 'hp', 'zbook g7', 'intel', 'i9', '8', '64', '512gb', '-', 10, 45000, '4500', '2022-12-12', '2022-11-21 06:22:26', 1010, 'full hd (1920*1080)', '8gb', 'non-touch', 'bulk sale', 'windows 10'),
(34, 'laptop', 'hp', '840 g7', 'intel', 'i5', '5', '8', '256gb', '-', 10, 15000, '1500', '2022-12-12', '2022-11-21 06:22:26', 1010, 'hd (1366*768)', '2gb', 'non-touch', 'bulk sale', 'windows 10'),
(35, 'laptop', 'dell', 'e5530', 'intel', 'i7', '8', '16', '512gb ssd', '-', 10, 15000, '1500', '2022-12-12', '2022-11-21 07:21:01', 1011, 'full hd (1920*1080)', '4gb', 'non-touch', 'bulk sale', 'windows 11'),
(36, 'laptop', 'dell', 'xps 15', 'intel', 'i7', '10', '32', '1tb ssd', '-', 10, 25000, '2500', '2022-12-12', '2022-11-21 07:21:01', 1011, 'uhd (3840*2160)', '4gb', 'non-touch', 'bulk sale', 'windows 10'),
(37, 'laptop', 'hp', 'zbook g7', 'intel', 'i9', '8', '64', '1tb ssd', '-', 10, 45000, '4500', '2022-12-12', '2022-11-21 07:21:01', 1011, 'full hd (1920*1080)', '8gb', 'non-touch', 'bulk sale', 'windows 11'),
(38, 'laptop', 'hp', '840 g3', 'intel', 'i5', '6', '4', '256gb ', '-', 10, 7500, '750', '2022-12-12', '2022-11-21 07:21:01', 1011, 'hd (1366*768)', '2gb', 'non-touch', 'bulk sale', 'windows 10');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_information`
--

CREATE TABLE `sales_order_information` (
  `sales_order_id` int(11) NOT NULL,
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
  `created_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order_information`
--

INSERT INTO `sales_order_information` (`sales_order_id`, `customer_name`, `customer_address`, `customer_city`, `resident_country`, `company_name`, `shipping_address`, `shipping_country`, `shipping_state`, `zip_code`, `contact_number`, `created_time`, `shipping_city`, `created_by`) VALUES
(1008, 'test1', 'test1', 'test1', 'Andorra', 'test1', 'test1', 'Sri Lanka', 'test1', '100000', '1231231231313', '2022-11-20 09:33:12', 'test1', 'admin'),
(1009, 'test2', 'test2', 'test2', 'Aland Islands', 'test2', 'test', 'Taiwan, Province of China', 'test2', '12421', '2321', '2022-11-20 16:15:01', 'test2', 'admin'),
(1010, 'test2', 'test2', 'test2', 'Antigua and Barbuda', 'test2', 'test2', 'Austria', 'test2', '12312313', '2323235', '2022-11-21 06:22:26', 'test2', 'admin'),
(1011, 'test5', 'test5', 'test5', 'Albania', 'test5', 'test5', 'Taiwan, Province of China', 'test5', '432424', '2342', '2022-11-21 07:21:01', 'test5', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sales_quatation`
--

CREATE TABLE `sales_quatation` (
  `quatation_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_address` varchar(250) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `shipping_state` varchar(50) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `contact_person` varchar(50) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_quatation_items`
--

CREATE TABLE `sales_quatation_items` (
  `sales_quatations_items_id` int(11) NOT NULL,
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
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sanding_dep`
--

CREATE TABLE `sanding_dep` (
  `sanding_id` int(11) NOT NULL,
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `role_id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
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
  `isActive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `epf`, `username`, `location`, `password`, `last_login`, `is_deleted`, `department`, `role`, `isActive`) VALUES
(1, 'admin', 'admin', 1, 'admin', 'admin@admi', 'admin@123', '2022-11-21 12:18:47', 0, '11', '1', 0),
(10, 'part', 'inventory', 1033, 'part_inventory', 'part inven', 'part@123', '2022-11-21 09:17:39', 0, '20', '11', 0),
(11, 'Sampath', 'karunatilake', 1034, 'PROD-TEAM-LEAD', 'MATANE@GMA', '123', '2022-11-21 11:57:46', 0, '1', '4', 0),
(12, 'min', 'CHANG', 1035, 'gordon', 'OIOI@GMAIL', '123', '2022-11-17 08:06:56', 0, '20', '11', 0),
(13, 'JAHIDH', 'ABDHULLA', 1036, 'whm', 'NOTHINGBUT', '123', '2022-11-20 16:19:40', 0, '2', '10', 0),
(14, 'SANDIKA', 'MAHAWATTE', 1037, 'protech', 'T1', '123', '2022-11-17 06:18:26', 0, '1', '6', 0),
(18, 'mtl', 'mtl', 1039, 'mtl', '0', '123', '2022-11-13 14:54:48', 0, '9', '4', 0),
(19, 'mbt', 'mbt', 1040, 'mbt', '0', '123', '2022-11-14 11:20:01', 0, '9', '6', 0),
(20, 'min', 'min', 1038, 'min', '0', 'min@123', '2022-11-20 16:15:24', 0, '2', '4', 0),
(21, 'tech2', 'tech2', 1041, 'protech2', '0', '123', '2022-11-21 12:19:06', 0, '1', '6', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_logged_in_time`
--

CREATE TABLE `users_logged_in_time` (
  `logged_in_id` int(11) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `logged_time` datetime NOT NULL,
  `logged_out` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_logged_in_time`
--

INSERT INTO `users_logged_in_time` (`logged_in_id`, `emp_id`, `username`, `logged_time`, `logged_out`) VALUES
(81, 1, 'admin', '2022-11-21 13:17:07', '2022-11-21 13:17:34'),
(82, 10, 'part_inventory', '2022-11-21 13:17:39', '2022-11-21 13:17:52'),
(83, 1, 'admin', '2022-11-21 13:17:58', '0000-00-00 00:00:00'),
(84, 1, 'Admin', '2022-11-21 14:44:32', '0000-00-00 00:00:00'),
(85, 1, 'admin', '2022-11-21 15:20:33', '0000-00-00 00:00:00'),
(86, 11, 'prod-team-lead', '2022-11-21 15:41:16', '2022-11-21 15:51:13'),
(87, 1, 'admin', '2022-11-21 15:51:24', '2022-11-21 15:53:15'),
(88, 11, 'prod-team-lead', '2022-11-21 15:57:46', '2022-11-21 16:16:22'),
(89, 1, 'admin', '2022-11-21 16:18:47', '2022-11-21 16:19:03'),
(90, 21, 'PROTECH2', '2022-11-21 16:19:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `visa_type`
--

CREATE TABLE `visa_type` (
  `visa_id` int(11) NOT NULL,
  `visa_type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `warehouse_assign_task` (
  `assign_task_id` int(11) NOT NULL,
  `sales_order` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `task_created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `task_completed_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse_assign_task`
--

INSERT INTO `warehouse_assign_task` (`assign_task_id`, `sales_order`, `emp_id`, `status`, `task_created_date`, `task_completed_date`) VALUES
(57, 1008, 1036, 0, '2022-11-20 15:59:22', '0000-00-00 00:00:00'),
(58, 1009, 1036, 0, '2022-11-20 16:19:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_information_sheet`
--

CREATE TABLE `warehouse_information_sheet` (
  `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL,
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
  `sales_order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse_information_sheet`
--

INSERT INTO `warehouse_information_sheet` (`inventory_id`, `device`, `processor`, `core`, `generation`, `model`, `qr_image`, `create_date`, `location`, `brand`, `create_by_inventory_id`, `send_to_production`, `send_time_to_production`, `sales_order_id`) VALUES
(000133, 'laptop', 'intel', 'i5', '3', ' e5530', 'temp/6379f068c4644.png', '2022-11-20 09:16:24', 'wh5', 'dell', 'admin', 0, '0000-00-00 00:00:00', 0),
(000176, 'laptop', 'intel', 'celeron', 'athlon', 'thinkpad 11e', 'temp/637a40c591d73.png', '2022-11-20 14:59:17', 'wh4', 'lenovo', 'min', 0, '0000-00-00 00:00:00', 0),
(000177, 'laptop', 'intel', 'i5', '6', 'x1 carbon g4', 'temp/637a435931127.png', '2022-11-20 15:10:17', 'wh4', 'lenovo', 'min', 0, '0000-00-00 00:00:00', 0),
(000178, 'laptop', 'intel', 'i5', '6', 'x1 carbon g4', 'temp/637a44567439b.png', '2022-11-20 15:14:30', 'wh4', 'lenovo', 'min', 0, '0000-00-00 00:00:00', 0),
(000179, 'laptop', 'intel', 'i5', '1', 'x1 carbon g4', 'temp/637a472a21902.png', '2022-11-20 15:26:34', 'wh4', 'lenovo', 'min', 0, '0000-00-00 00:00:00', 0),
(000180, 'laptop', 'intel', 'i3', '4', 'test001', 'temp/637a4c2990d7d.png', '2022-11-20 15:47:53', 'wh5', 'asus', 'admin', 0, '0000-00-00 00:00:00', 0),
(000181, 'laptop', 'intel', 'i3', '4', 'test001', 'temp/637a4c299a2f3.png', '2022-11-20 15:47:53', 'wh5', 'asus', 'admin', 0, '0000-00-00 00:00:00', 0),
(000182, 'laptop', 'intel', 'i5', '3', 'latitude e6530', 'temp/637a4df5a1e9d.png', '2022-11-20 15:55:33', 'wh4', 'dell', 'min', 0, '0000-00-00 00:00:00', 0),
(000183, 'laptop', 'intel', 'i5', '3', 'latitude e6530', 'temp/637a4df5a99f1.png', '2022-11-20 15:55:33', 'wh4', 'dell', 'min', 0, '0000-00-00 00:00:00', 0),
(000184, 'laptop', 'intel', 'i5', '3', 'latitude e6530', 'temp/637a4df5ae345.png', '2022-11-20 15:55:33', 'wh4', 'dell', 'min', 0, '0000-00-00 00:00:00', 0),
(000185, 'laptop', 'intel', 'i5', '3', 'latitude e6530', 'temp/637a4df5b3949.png', '2022-11-20 15:55:33', 'wh4', 'dell', 'min', 0, '0000-00-00 00:00:00', 0),
(000186, 'laptop', 'intel', 'i5', '3', 'latitude e6530', 'temp/637a4df5b6d94.png', '2022-11-20 15:55:33', 'wh4', 'dell', 'min', 0, '0000-00-00 00:00:00', 0),
(000187, 'laptop', 'intel', 'i5', '3', 'latitude e6530', 'temp/637a4df5b9e55.png', '2022-11-20 15:55:33', 'wh4', 'dell', 'min', 0, '0000-00-00 00:00:00', 0),
(000188, 'laptop', 'intel', 'i5', '3', 'latitude e6530', 'temp/637a4df5bd045.png', '2022-11-20 15:55:33', 'wh4', 'dell', 'min', 0, '0000-00-00 00:00:00', 0),
(000189, 'laptop', 'intel', 'i5', '3', 'latitude e6530', 'temp/637a4df5bff57.png', '2022-11-20 15:55:33', 'wh4', 'dell', 'min', 0, '0000-00-00 00:00:00', 0),
(000190, 'laptop', 'intel', 'i5', '3', 'latitude e6530', 'temp/637a4df5c3128.png', '2022-11-20 15:55:33', 'wh4', 'dell', 'min', 0, '0000-00-00 00:00:00', 0),
(000191, 'laptop', 'intel', 'i5', '3', 'latitude e6530', 'temp/637a4df5c63d9.png', '2022-11-20 15:55:33', 'wh4', 'dell', 'min', 0, '0000-00-00 00:00:00', 0),
(000192, 'laptop', 'intel', 'i5', '3', 'latitude e6530', 'temp/637a4df5c95ee.png', '2022-11-20 15:55:33', 'wh4', 'dell', 'min', 0, '0000-00-00 00:00:00', 0),
(000193, 'laptop', 'intel', 'i5', '3', 'latitude e6530', 'temp/637a4df5cc612.png', '2022-11-20 15:55:33', 'wh4', 'dell', 'min', 0, '0000-00-00 00:00:00', 0),
(000194, 'laptop', 'intel', 'i5', '3', 'latitude e6530', 'temp/637a4df5cf90a.png', '2022-11-20 15:55:33', 'wh4', 'dell', 'min', 0, '0000-00-00 00:00:00', 0),
(000195, 'laptop', 'intel', 'i5', '3', 'latitude e6530', 'temp/637a4df5d289b.png', '2022-11-20 15:55:33', 'wh4', 'dell', 'min', 0, '0000-00-00 00:00:00', 0),
(000196, 'laptop', 'intel', 'i5', '3', 'latitude e6530', 'temp/637a4df5d5eb8.png', '2022-11-20 15:55:33', 'wh4', 'dell', 'min', 0, '0000-00-00 00:00:00', 0),
(000197, 'laptop', 'intel', 'i5', '3', 'latitude e6530', 'temp/637a4df5d9c2b.png', '2022-11-20 15:55:33', 'wh4', 'dell', 'min', 0, '0000-00-00 00:00:00', 0),
(000198, 'laptop', 'intel', 'i5', '3', 'latitude e6530', 'temp/637a4df5ded41.png', '2022-11-20 15:55:33', 'wh4', 'dell', 'min', 0, '0000-00-00 00:00:00', 0),
(000199, 'laptop', 'intel', 'i5', '3', 'latitude e6530', 'temp/637a4df5e2266.png', '2022-11-20 15:55:33', 'wh4', 'dell', 'min', 0, '0000-00-00 00:00:00', 0),
(000200, 'laptop', 'intel', 'i5', '3', 'latitude e6530', 'temp/637a4df5eb87e.png', '2022-11-20 15:55:33', 'wh4', 'dell', 'min', 0, '0000-00-00 00:00:00', 0),
(000201, 'laptop', 'intel', 'i5', '3', 'latitude e6530', 'temp/637a4df5ee85e.png', '2022-11-20 15:55:33', 'wh4', 'dell', 'min', 0, '0000-00-00 00:00:00', 0),
(000202, 'laptop', 'intel', 'i5', '3', 'latitude e6530', 'temp/637a4df5f1738.png', '2022-11-20 15:55:33', 'wh4', 'dell', 'min', 0, '0000-00-00 00:00:00', 0),
(000203, 'laptop', 'intel', 'i5', '3', 'latitude e6530', 'temp/637a4df600dd4.png', '2022-11-20 15:55:34', 'wh4', 'dell', 'min', 0, '0000-00-00 00:00:00', 0),
(000204, 'laptop', 'intel', 'i5', '6', 't470', 'temp/637a52cfb5c5c.png', '2022-11-20 16:16:15', 'wh4', 'lenovo', 'min', 1, '2022-11-20 16:21:44', 1009),
(000205, 'laptop', 'intel', 'i5', '6', 't470', 'temp/637a52cfbb09a.png', '2022-11-20 16:16:15', 'wh4', 'lenovo', 'min', 1, '2022-11-20 16:20:44', 1009),
(000206, 'laptop', 'intel', 'i5', '6', 't470', 'temp/637a52cfbe42e.png', '2022-11-20 16:16:15', 'wh4', 'lenovo', 'min', 1, '2022-11-20 16:21:55', 1009),
(000207, 'laptop', 'intel', 'i5', '6', 't470', 'temp/637a52cfc1865.png', '2022-11-20 16:16:15', 'wh4', 'lenovo', 'min', 1, '2022-11-20 16:24:36', 1009),
(000208, 'laptop', 'intel', 'i5', '6', 't470', 'temp/637a52cfc47e4.png', '2022-11-20 16:16:15', 'wh4', 'lenovo', 'min', 1, '2022-11-20 16:22:18', 1009),
(000209, 'laptop', 'intel', 'i5', '6', 't470', 'temp/637a52cfc883f.png', '2022-11-20 16:16:15', 'wh4', 'lenovo', 'min', 1, '2022-11-20 16:22:06', 1009),
(000210, 'laptop', 'intel', 'i5', '6', 't470', 'temp/637a52cfcb61d.png', '2022-11-20 16:16:15', 'wh4', 'lenovo', 'min', 1, '2022-11-20 16:23:58', 1009),
(000211, 'laptop', 'intel', 'i5', '6', 't470', 'temp/637a52cfce7f6.png', '2022-11-20 16:16:15', 'wh4', 'lenovo', 'min', 1, '2022-11-20 16:24:08', 1009),
(000212, 'laptop', 'intel', 'i5', '6', 't470', 'temp/637a52cfd1e6a.png', '2022-11-20 16:16:15', 'wh4', 'lenovo', 'min', 1, '2022-11-20 16:23:54', 1009),
(000213, 'laptop', 'intel', 'i5', '6', 't470', 'temp/637a52cfd4fcc.png', '2022-11-20 16:16:15', 'wh4', 'lenovo', 'min', 1, '2022-11-20 16:24:19', 1009),
(000214, 'laptop', 'intel', 'i5', '6', 't470', 'temp/637a52cfd7e22.png', '2022-11-20 16:16:15', 'wh4', 'lenovo', 'min', 1, '2022-11-20 16:24:33', 1009),
(000215, 'laptop', 'intel', 'i5', '6', 't470', 'temp/637a52cfdaf25.png', '2022-11-20 16:16:15', 'wh4', 'lenovo', 'min', 1, '2022-11-20 16:24:11', 1009),
(000216, 'laptop', 'intel', 'i5', '6', 't470', 'temp/637a52cfddfe3.png', '2022-11-20 16:16:15', 'wh4', 'lenovo', 'min', 1, '2022-11-20 16:24:24', 1009),
(000217, 'laptop', 'intel', 'i5', '6', 't470', 'temp/637a52cfe0f23.png', '2022-11-20 16:16:15', 'wh4', 'lenovo', 'min', 1, '2022-11-20 16:24:46', 1009),
(000218, 'laptop', 'intel', 'i5', '6', 't470', 'temp/637a52cfe3e40.png', '2022-11-20 16:16:15', 'wh4', 'lenovo', 'min', 1, '2022-11-20 16:24:49', 1009),
(000219, 'laptop', 'intel', 'i5', '6', 't470', 'temp/637a52cfe6d6b.png', '2022-11-20 16:16:15', 'wh4', 'lenovo', 'min', 1, '2022-11-20 16:24:57', 1009),
(000220, 'laptop', 'intel', 'i5', '6', 't470', 'temp/637a52cfea014.png', '2022-11-20 16:16:15', 'wh4', 'lenovo', 'min', 1, '2022-11-20 16:25:00', 1009),
(000221, 'laptop', 'intel', 'i5', '6', 't470', 'temp/637a52cfed0d9.png', '2022-11-20 16:16:15', 'wh4', 'lenovo', 'min', 1, '2022-11-20 16:25:07', 1009),
(000222, 'laptop', 'intel', 'i5', '6', 't470', 'temp/637a52cfefdd7.png', '2022-11-20 16:16:15', 'wh4', 'lenovo', 'min', 1, '2022-11-20 16:25:09', 1009),
(000223, 'laptop', 'intel', 'i5', '6', 't470', 'temp/637a52cff2f56.png', '2022-11-20 16:16:15', 'wh4', 'lenovo', 'min', 1, '2022-11-20 16:25:31', 1009),
(000224, 'laptop', 'intel', 'i3', '8', 'probook', 'temp/637b1b4e55071.png', '2022-11-21 06:31:42', 'wh5', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0),
(000225, 'laptop', 'intel', 'i3', '8', 'probook', 'temp/637b1b6b6d922.png', '2022-11-21 06:32:11', 'wh5', 'acer', 'admin', 0, '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bodywork`
--
ALTER TABLE `bodywork`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bodywork_dep`
--
ALTER TABLE `bodywork_dep`
  ADD PRIMARY KEY (`bodywork_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `combine_check`
--
ALTER TABLE `combine_check`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core`
--
ALTER TABLE `core`
  ADD PRIMARY KEY (`core_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`device_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `e_com_listing`
--
ALTER TABLE `e_com_listing`
  ADD PRIMARY KEY (`listing_id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `generation`
--
ALTER TABLE `generation`
  ADD PRIMARY KEY (`generation_id`);

--
-- Indexes for table `lcd_check`
--
ALTER TABLE `lcd_check`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lcd_dep`
--
ALTER TABLE `lcd_dep`
  ADD PRIMARY KEY (`lcd_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `motherbaord_dep`
--
ALTER TABLE `motherbaord_dep`
  ADD PRIMARY KEY (`motherboard_id`);

--
-- Indexes for table `motherboard_assign`
--
ALTER TABLE `motherboard_assign`
  ADD PRIMARY KEY (`motherboard_assign_task_id`);

--
-- Indexes for table `motherboard_check`
--
ALTER TABLE `motherboard_check`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motherboard_dep`
--
ALTER TABLE `motherboard_dep`
  ADD PRIMARY KEY (`motherboard_id`);

--
-- Indexes for table `packing_dep`
--
ALTER TABLE `packing_dep`
  ADD PRIMARY KEY (`packing_id`);

--
-- Indexes for table `painting_dep`
--
ALTER TABLE `painting_dep`
  ADD PRIMARY KEY (`painting_id`);

--
-- Indexes for table `part_list`
--
ALTER TABLE `part_list`
  ADD PRIMARY KEY (`part_id`);

--
-- Indexes for table `part_stock`
--
ALTER TABLE `part_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `prepared_part`
--
ALTER TABLE `prepared_part`
  ADD PRIMARY KEY (`prep_id`);

--
-- Indexes for table `processor`
--
ALTER TABLE `processor`
  ADD PRIMARY KEY (`processor_id`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`production_id`);

--
-- Indexes for table `production_check`
--
ALTER TABLE `production_check`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prod_cmb_check`
--
ALTER TABLE `prod_cmb_check`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prod_info`
--
ALTER TABLE `prod_info`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `prod_technician_assign_info`
--
ALTER TABLE `prod_technician_assign_info`
  ADD PRIMARY KEY (`tech_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `qc_dep`
--
ALTER TABLE `qc_dep`
  ADD PRIMARY KEY (`qc_id`);

--
-- Indexes for table `rack`
--
ALTER TABLE `rack`
  ADD PRIMARY KEY (`rack_id`);

--
-- Indexes for table `rack_slots`
--
ALTER TABLE `rack_slots`
  ADD PRIMARY KEY (`slot_id`);

--
-- Indexes for table `relationship`
--
ALTER TABLE `relationship`
  ADD PRIMARY KEY (`relationship_id`);

--
-- Indexes for table `requested_part_from_production`
--
ALTER TABLE `requested_part_from_production`
  ADD PRIMARY KEY (`rp_id`);

--
-- Indexes for table `request_parts_from_part_warehouse`
--
ALTER TABLE `request_parts_from_part_warehouse`
  ADD PRIMARY KEY (`part_req_id`);

--
-- Indexes for table `sales_order_add_items`
--
ALTER TABLE `sales_order_add_items`
  ADD PRIMARY KEY (`sales_item_id`),
  ADD KEY `fksales_order_id` (`sales_order_id`);

--
-- Indexes for table `sales_order_information`
--
ALTER TABLE `sales_order_information`
  ADD PRIMARY KEY (`sales_order_id`),
  ADD KEY `sales_order_id` (`sales_order_id`),
  ADD KEY `sales_order_id_2` (`sales_order_id`);

--
-- Indexes for table `sales_quatation`
--
ALTER TABLE `sales_quatation`
  ADD PRIMARY KEY (`quatation_id`),
  ADD KEY `quatation_id` (`quatation_id`);

--
-- Indexes for table `sales_quatation_items`
--
ALTER TABLE `sales_quatation_items`
  ADD PRIMARY KEY (`sales_quatations_items_id`),
  ADD KEY `quatation_id` (`quatation_id`);

--
-- Indexes for table `sanding_dep`
--
ALTER TABLE `sanding_dep`
  ADD PRIMARY KEY (`sanding_id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_logged_in_time`
--
ALTER TABLE `users_logged_in_time`
  ADD PRIMARY KEY (`logged_in_id`);

--
-- Indexes for table `visa_type`
--
ALTER TABLE `visa_type`
  ADD PRIMARY KEY (`visa_id`);

--
-- Indexes for table `warehouse_assign_task`
--
ALTER TABLE `warehouse_assign_task`
  ADD PRIMARY KEY (`assign_task_id`);

--
-- Indexes for table `warehouse_information_sheet`
--
ALTER TABLE `warehouse_information_sheet`
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `order_id` (`sales_order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bodywork`
--
ALTER TABLE `bodywork`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `bodywork_dep`
--
ALTER TABLE `bodywork_dep`
  MODIFY `bodywork_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `combine_check`
--
ALTER TABLE `combine_check`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=489;

--
-- AUTO_INCREMENT for table `core`
--
ALTER TABLE `core`
  MODIFY `core_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1042;

--
-- AUTO_INCREMENT for table `e_com_listing`
--
ALTER TABLE `e_com_listing`
  MODIFY `listing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `generation`
--
ALTER TABLE `generation`
  MODIFY `generation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `lcd_check`
--
ALTER TABLE `lcd_check`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `lcd_dep`
--
ALTER TABLE `lcd_dep`
  MODIFY `lcd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `motherbaord_dep`
--
ALTER TABLE `motherbaord_dep`
  MODIFY `motherboard_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `motherboard_assign`
--
ALTER TABLE `motherboard_assign`
  MODIFY `motherboard_assign_task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `motherboard_check`
--
ALTER TABLE `motherboard_check`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `motherboard_dep`
--
ALTER TABLE `motherboard_dep`
  MODIFY `motherboard_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `packing_dep`
--
ALTER TABLE `packing_dep`
  MODIFY `packing_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `painting_dep`
--
ALTER TABLE `painting_dep`
  MODIFY `painting_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `part_list`
--
ALTER TABLE `part_list`
  MODIFY `part_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `part_stock`
--
ALTER TABLE `part_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=389;

--
-- AUTO_INCREMENT for table `prepared_part`
--
ALTER TABLE `prepared_part`
  MODIFY `prep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `processor`
--
ALTER TABLE `processor`
  MODIFY `processor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `production_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `production_check`
--
ALTER TABLE `production_check`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `prod_cmb_check`
--
ALTER TABLE `prod_cmb_check`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prod_info`
--
ALTER TABLE `prod_info`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT for table `prod_technician_assign_info`
--
ALTER TABLE `prod_technician_assign_info`
  MODIFY `tech_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `province_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `qc_dep`
--
ALTER TABLE `qc_dep`
  MODIFY `qc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rack`
--
ALTER TABLE `rack`
  MODIFY `rack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `rack_slots`
--
ALTER TABLE `rack_slots`
  MODIFY `slot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `relationship`
--
ALTER TABLE `relationship`
  MODIFY `relationship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requested_part_from_production`
--
ALTER TABLE `requested_part_from_production`
  MODIFY `rp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `request_parts_from_part_warehouse`
--
ALTER TABLE `request_parts_from_part_warehouse`
  MODIFY `part_req_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_order_add_items`
--
ALTER TABLE `sales_order_add_items`
  MODIFY `sales_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `sales_order_information`
--
ALTER TABLE `sales_order_information`
  MODIFY `sales_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1012;

--
-- AUTO_INCREMENT for table `sales_quatation`
--
ALTER TABLE `sales_quatation`
  MODIFY `quatation_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `sales_quatation_items`
--
ALTER TABLE `sales_quatation_items`
  MODIFY `sales_quatations_items_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sanding_dep`
--
ALTER TABLE `sanding_dep`
  MODIFY `sanding_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users_logged_in_time`
--
ALTER TABLE `users_logged_in_time`
  MODIFY `logged_in_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `visa_type`
--
ALTER TABLE `visa_type`
  MODIFY `visa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `warehouse_assign_task`
--
ALTER TABLE `warehouse_assign_task`
  MODIFY `assign_task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `warehouse_information_sheet`
--
ALTER TABLE `warehouse_information_sheet`
  MODIFY `inventory_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

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
