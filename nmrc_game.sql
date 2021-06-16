-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2021 at 06:46 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nmrc_game`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'demo', '9029186750');

-- --------------------------------------------------------

--
-- Table structure for table `game_time`
--

CREATE TABLE `game_time` (
  `game_time_id` int(11) NOT NULL,
  `game_time` varchar(20) NOT NULL,
  `g_time` time NOT NULL,
  `interval` int(20) NOT NULL,
  `saving` int(20) NOT NULL DEFAULT 10,
  `cancel_ticket` int(20) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game_time`
--

INSERT INTO `game_time` (`game_time_id`, `game_time`, `g_time`, `interval`, `saving`, `cancel_ticket`) VALUES
(1, '09:15 AM', '09:15:00', 5, 10, 2),
(2, '09:20 AM', '09:20:00', 5, 10, 2),
(3, '09:25 AM', '09:25:00', 5, 10, 2),
(4, '09:30 AM', '09:30:00', 5, 10, 2),
(5, '09:35 AM', '09:35:00', 5, 10, 2),
(6, '09:40 AM', '09:40:00', 5, 10, 2),
(7, '09:45 AM', '09:45:00', 5, 10, 2),
(8, '09:50 AM', '09:50:00', 5, 10, 2),
(9, '09:55 AM', '09:55:00', 5, 10, 2),
(10, '10:00 AM', '10:00:00', 5, 10, 2),
(11, '10:05 AM', '10:05:00', 5, 10, 2),
(12, '10:10 AM', '10:10:00', 5, 10, 2),
(13, '10:15 AM', '10:15:00', 5, 10, 2),
(14, '10:20 AM', '10:20:00', 5, 10, 2),
(15, '10:25 AM', '10:25:00', 5, 10, 2),
(16, '10:30 AM', '10:30:00', 5, 10, 2),
(17, '10:35 AM', '10:35:00', 5, 10, 2),
(18, '10:40 AM', '10:40:00', 5, 10, 2),
(19, '10:45 AM', '10:45:00', 5, 10, 2),
(20, '10:50 AM', '10:50:00', 5, 10, 2),
(21, '10:55 AM', '10:55:00', 5, 10, 2),
(22, '11:00 AM', '11:00:00', 5, 10, 2),
(23, '11:05 AM', '11:05:00', 5, 10, 2),
(24, '11:10 AM', '11:10:00', 5, 10, 2),
(25, '11:15 AM', '11:15:00', 5, 10, 2),
(26, '11:20 AM', '11:20:00', 5, 10, 2),
(27, '11:25 AM', '11:25:00', 5, 10, 2),
(28, '11:30 AM', '11:30:00', 5, 10, 2),
(29, '11:35 AM', '11:35:00', 5, 10, 2),
(30, '11:40 AM', '11:40:00', 5, 10, 2),
(31, '11:45 AM', '11:45:00', 5, 10, 2),
(32, '11:50 AM', '11:50:00', 5, 10, 2),
(33, '11:55 AM', '11:55:00', 5, 10, 2),
(34, '12:00 PM', '12:00:00', 5, 10, 2),
(35, '12:05 PM', '12:05:00', 5, 10, 2),
(36, '12:10 PM', '12:10:00', 5, 10, 2),
(37, '12:15 PM', '12:15:00', 5, 10, 2),
(38, '12:20 PM', '12:20:00', 5, 10, 2),
(39, '12:25 PM', '12:25:00', 5, 10, 2),
(40, '12:30 PM', '12:30:00', 5, 10, 2),
(41, '12:35 PM', '12:35:00', 5, 10, 2),
(42, '12:40 PM', '12:40:00', 5, 10, 2),
(43, '12:45 PM', '12:45:00', 5, 10, 2),
(44, '12:50 PM', '12:50:00', 5, 10, 2),
(45, '12:55 PM', '12:55:00', 5, 10, 2),
(46, '01:00 PM', '13:00:00', 5, 10, 2),
(47, '01:05 PM', '13:05:00', 5, 10, 2),
(48, '01:10 PM', '13:10:00', 5, 10, 2),
(49, '01:15 PM', '13:15:00', 5, 10, 2),
(50, '01:20 PM', '13:20:00', 5, 10, 2),
(51, '01:25 PM', '13:25:00', 5, 10, 2),
(52, '01:30 PM', '13:30:00', 5, 10, 2),
(53, '01:35 PM', '13:35:00', 5, 10, 2),
(54, '01:40 PM', '13:40:00', 5, 10, 2),
(55, '01:45 PM', '13:45:00', 5, 10, 2),
(56, '01:50 PM', '13:50:00', 5, 10, 2),
(57, '01:55 PM', '13:55:00', 5, 10, 2),
(58, '02:00 PM', '14:00:00', 5, 10, 2),
(59, '02:05 PM', '14:05:00', 5, 10, 2),
(60, '02:10 PM', '14:10:00', 5, 10, 2),
(61, '02:15 PM', '14:15:00', 5, 10, 2),
(62, '02:20 PM', '14:20:00', 5, 10, 2),
(63, '02:25 PM', '14:25:00', 5, 10, 2),
(64, '02:30 PM', '14:30:00', 5, 10, 2),
(65, '02:35 PM', '14:35:00', 5, 10, 2),
(66, '02:40 PM', '14:40:00', 5, 10, 2),
(67, '02:45 PM', '14:45:00', 5, 10, 2),
(68, '02:50 PM', '14:50:00', 5, 10, 2),
(69, '02:55 PM', '14:55:00', 5, 10, 2),
(70, '03:00 PM', '15:00:00', 5, 10, 2),
(71, '03:05 PM', '15:05:00', 5, 10, 2),
(72, '03:10 PM', '15:10:00', 5, 10, 2),
(73, '03:15 PM', '15:15:00', 5, 10, 2),
(74, '03:20 PM', '15:20:00', 5, 10, 2),
(75, '03:25 PM', '15:25:00', 5, 10, 2),
(76, '03:30 PM', '15:30:00', 5, 10, 2),
(77, '03:35 PM', '15:35:00', 5, 10, 2),
(78, '03:40 PM', '15:40:00', 5, 10, 2),
(79, '03:45 PM', '15:45:00', 5, 10, 2),
(80, '03:50 PM', '15:50:00', 5, 10, 2),
(81, '03:55 PM', '15:55:00', 5, 10, 2),
(82, '04:00 PM', '16:00:00', 5, 10, 2),
(83, '04:05 PM', '16:05:00', 5, 10, 2),
(84, '04:10 PM', '16:10:00', 5, 10, 2),
(85, '04:15 PM', '16:15:00', 5, 10, 2),
(86, '04:20 PM', '16:20:00', 5, 10, 2),
(87, '04:25 PM', '16:25:00', 5, 10, 2),
(88, '04:30 PM', '16:30:00', 5, 10, 2),
(89, '04:35 PM', '16:35:00', 5, 10, 2),
(90, '04:40 PM', '16:40:00', 5, 10, 2),
(91, '04:45 PM', '16:45:00', 5, 10, 2),
(92, '04:50 PM', '16:50:00', 5, 10, 2),
(93, '04:55 PM', '16:55:00', 5, 10, 2),
(94, '05:00 PM', '17:00:00', 5, 10, 2),
(95, '05:05 PM', '17:05:00', 5, 10, 2),
(96, '05:10 PM', '17:10:00', 5, 10, 2),
(97, '05:15 PM', '17:15:00', 5, 10, 2),
(98, '05:20 PM', '17:20:00', 5, 10, 2),
(99, '05:25 PM', '17:25:00', 5, 10, 2),
(100, '05:30 PM', '17:30:00', 5, 10, 2),
(101, '05:35 PM', '17:35:00', 5, 10, 2),
(102, '05:40 PM', '17:40:00', 5, 10, 2),
(103, '05:45 PM', '17:45:00', 5, 10, 2),
(104, '05:50 PM', '17:50:00', 5, 10, 2),
(105, '05:55 PM', '17:55:00', 5, 10, 2),
(106, '06:00 PM', '18:00:00', 5, 10, 2),
(107, '06:05 PM', '18:05:00', 5, 10, 2),
(108, '06:10 PM', '18:10:00', 5, 10, 2),
(109, '06:15 PM', '18:15:00', 5, 10, 2),
(110, '06:20 PM', '18:20:00', 5, 10, 2),
(111, '06:25 PM', '18:25:00', 5, 10, 2),
(112, '06:30 PM', '18:30:00', 5, 10, 2),
(113, '06:35 PM', '18:35:00', 5, 10, 2),
(114, '06:40 PM', '18:40:00', 5, 10, 2),
(115, '06:45 PM', '18:45:00', 5, 10, 2),
(116, '06:50 PM', '18:50:00', 5, 10, 2),
(117, '06:55 PM', '18:55:00', 5, 10, 2),
(118, '07:00 PM', '19:00:00', 5, 10, 2),
(119, '07:05 PM', '19:05:00', 5, 10, 2),
(120, '07:10 PM', '19:10:00', 5, 10, 2),
(121, '07:15 PM', '19:15:00', 5, 10, 2),
(122, '07:20 PM', '19:20:00', 5, 10, 2),
(123, '07:25 PM', '19:25:00', 5, 10, 2),
(124, '07:30 PM', '19:30:00', 5, 10, 2),
(125, '07:35 PM', '19:35:00', 5, 10, 2),
(126, '07:40 PM', '19:40:00', 5, 10, 2),
(127, '07:45 PM', '19:45:00', 5, 10, 2),
(128, '07:50 PM', '19:50:00', 5, 10, 2),
(129, '07:55 PM', '19:55:00', 5, 10, 2),
(130, '08:00 PM', '20:00:00', 5, 10, 2),
(131, '08:05 PM', '20:05:00', 5, 10, 2),
(132, '08:10 PM', '20:10:00', 5, 10, 2),
(133, '08:15 PM', '20:15:00', 5, 10, 2),
(134, '08:20 PM', '20:20:00', 5, 10, 2),
(135, '08:25 PM', '20:25:00', 5, 10, 2),
(136, '08:30 PM', '20:30:00', 5, 10, 2),
(137, '08:35 PM', '20:35:00', 5, 10, 2),
(138, '08:40 PM', '20:40:00', 5, 10, 2),
(139, '08:45 PM', '20:45:00', 5, 10, 2),
(140, '08:50 PM', '20:50:00', 5, 10, 2),
(141, '08:55 PM', '20:55:00', 5, 10, 2),
(142, '09:00 PM', '21:00:00', 5, 10, 2),
(143, '09:05 PM', '21:05:00', 5, 10, 2),
(144, '09:10 PM', '21:10:00', 5, 10, 2),
(145, '09:15 PM', '21:15:00', 5, 10, 2),
(146, '09:20 PM', '21:20:00', 5, 10, 2),
(147, '09:25 PM', '21:25:00', 5, 10, 2),
(148, '09:30 PM', '21:30:00', 5, 10, 2),
(149, '09:35 PM', '21:35:00', 5, 10, 2),
(150, '09:40 PM', '21:40:00', 5, 10, 2),
(151, '09:45 PM', '21:45:00', 5, 10, 2),
(152, '09:50 PM', '21:50:00', 5, 10, 2),
(153, '09:55 PM', '21:55:00', 5, 10, 2),
(154, '10:00 PM', '22:00:00', 5, 10, 2),
(155, '10:05 PM', '22:05:00', 5, 10, 2),
(156, '10:10 PM', '22:10:00', 5, 10, 2),
(157, '10:15 PM', '22:15:00', 5, 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `panas`
--

CREATE TABLE `panas` (
  `id` int(11) NOT NULL,
  `numbers` int(11) NOT NULL,
  `single_pana` varchar(255) NOT NULL,
  `double_pana` varchar(255) NOT NULL,
  `triple_pana` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panas`
--

INSERT INTO `panas` (`id`, `numbers`, `single_pana`, `double_pana`, `triple_pana`) VALUES
(0, 0, '127,136,145,190,235,280,370,389,460,479,569,578', '118,226,244,299,334,488,550,668,677', '000'),
(1, 1, '128,137,146,236,245,290,380,470,489,560,579,678', '100,119,155,227,335,344,399,588,669', '777'),
(2, 2, '129,138,147,156,237,246,345,390,480,570,589,679', '110,200,228,255,366,499,660,688,778', '444'),
(3, 3, '120,139,148,157,238,247,256,346,490,580,670,689', '166,229,300,337,355,445,599,779,788', '111'),
(4, 4, '130,149,158,167,239,248,257,347,356,590,680,789', '112,220,266,338,400,446,455,699,770', '888'),
(5, 5, '140,159,168,230,249,258,267,348,357,456,690,780', '113,122,177,339,366,447,500,799,889', '555'),
(6, 6, '123,150,169,178,240,259,268,349,358,367,457,790', '600,114,277,330,448,466,556,880,899', '222'),
(7, 7, '124,160,278,179,250,269,340,359,368,458,467,890', '115,133,188,223,377,449,557,566,400', '999'),
(8, 8, '125,134,170,189,260,279,350,369,468,378,459,567', '116,224,233,288,440,477,558,800,990', '666'),
(9, 9, '126,135,180,234,270,289,360,379,450,469,478,568', '117,144,199,225,388,559,577,667,900', '333');

-- --------------------------------------------------------

--
-- Table structure for table `result_number_setting`
--

CREATE TABLE `result_number_setting` (
  `id` int(11) NOT NULL,
  `game_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `setted_kalyan_pana` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `setted_bazar_pana` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `added_date` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `added_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `result_number_setting`
--

INSERT INTO `result_number_setting` (`id`, `game_time`, `setted_kalyan_pana`, `setted_bazar_pana`, `added_date`, `added_time`) VALUES
(18, '08:00 PM', '278-7', '330-6', '2021-06-06', '19:56:48'),
(17, '07:15 PM', '156-2', '346-3', '2021-06-05', '19:33:52');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `test` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `added_date` date DEFAULT NULL,
  `added_time` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `welcome_msg`
--

CREATE TABLE `welcome_msg` (
  `id` int(11) NOT NULL,
  `msg` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `welcome_msg`
--

INSERT INTO `welcome_msg` (`id`, `msg`) VALUES
(1, 'Welcome To Kalyan Main Bazar Result Chart');

-- --------------------------------------------------------

--
-- Table structure for table `win_card`
--

CREATE TABLE `win_card` (
  `id` int(255) NOT NULL,
  `game_time` varchar(20) NOT NULL,
  `winning_kalyan_pana` varchar(255) NOT NULL,
  `winning_bazar_pana` varchar(255) NOT NULL,
  `win_date` varchar(20) NOT NULL,
  `added_time` varchar(20) NOT NULL,
  `type` varchar(255) NOT NULL,
  `g_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `win_card`
--

INSERT INTO `win_card` (`id`, `game_time`, `winning_kalyan_pana`, `winning_bazar_pana`, `win_date`, `added_time`, `type`, `g_time`) VALUES
(16, '09:15 AM', '157-3', '256-3', '2021-06-05', '2021-06-05', '', '19:37:09'),
(17, '09:15 AM', '157-3', '256-3', '2021-06-05', '2021-06-05', '', '19:37:17'),
(18, '09:15 AM', '157-3', '256-3', '2021-06-05', '2021-06-05', '', '19:47:04'),
(19, '11:20 AM', '111-3', '588-1', '2021-06-06', '11:20 AM', 'Auto', '11:20:56'),
(20, '08:00 PM', '170-8', '350-8', '2021-06-06', '2021-06-06', '', '19:58:16'),
(21, '08:05 PM', '170-8', '350-8', '2021-06-06', '2021-06-06', '', '19:59:59'),
(22, '08:10 PM', '170-8', '350-8', '2021-06-06', '2021-06-06', '', '20:06:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_time`
--
ALTER TABLE `game_time`
  ADD PRIMARY KEY (`game_time_id`);

--
-- Indexes for table `panas`
--
ALTER TABLE `panas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_number_setting`
--
ALTER TABLE `result_number_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `welcome_msg`
--
ALTER TABLE `welcome_msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `win_card`
--
ALTER TABLE `win_card`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `game_time`
--
ALTER TABLE `game_time`
  MODIFY `game_time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `panas`
--
ALTER TABLE `panas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `result_number_setting`
--
ALTER TABLE `result_number_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `welcome_msg`
--
ALTER TABLE `welcome_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `win_card`
--
ALTER TABLE `win_card`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
