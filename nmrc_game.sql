-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2021 at 11:30 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(1, '09:30 AM', '09:30:00', 30, 10, 2),
(2, '10:00 AM', '10:00:00', 30, 10, 2),
(3, '10:30 AM', '10:30:00', 30, 10, 2),
(4, '11:00 AM', '11:00:00', 30, 10, 2),
(5, '11:30 AM', '11:30:00', 30, 10, 2),
(6, '12:00 PM', '12:00:00', 30, 10, 2),
(7, '12:30 PM', '12:30:00', 30, 10, 2),
(8, '01:00 PM', '13:00:00', 30, 10, 2),
(9, '01:30 PM', '13:30:00', 30, 10, 2),
(10, '02:00 PM', '14:00:00', 30, 10, 2),
(11, '02:30 PM', '14:30:00', 30, 10, 2),
(12, '03:00 PM', '15:00:00', 30, 10, 2),
(13, '03:30 PM', '15:30:00', 30, 10, 2),
(14, '04:00 PM', '16:00:00', 30, 10, 2),
(15, '04:30 PM', '16:30:00', 30, 10, 2),
(16, '05:00 PM', '17:00:00', 30, 10, 2),
(17, '05:30 PM', '17:30:00', 30, 10, 2),
(18, '06:00 PM', '18:00:00', 30, 10, 2),
(19, '06:30 PM', '18:30:00', 30, 10, 2),
(20, '07:00 PM', '19:00:00', 30, 10, 2),
(21, '07:30 PM', '19:30:00', 30, 10, 2),
(22, '08:00 PM', '20:00:00', 30, 10, 2),
(23, '08:30 PM', '20:30:00', 30, 10, 2),
(24, '09:00 PM', '21:00:00', 30, 10, 2),
(25, '09:30 PM', '21:30:00', 30, 10, 2),
(26, '10:00 PM', '22:00:00', 30, 10, 2),
(27, '10:30 PM', '22:30:00', 30, 10, 2),
(28, '11:00 PM', '23:00:00', 30, 10, 2),
(29, '11:30 PM', '23:30:00', 30, 10, 2);

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
(7, 7, '124,160,278,179,250,269,340,359,368,458,467,890', '115,133,188,223,377,449,557,566,700', '999'),
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
  MODIFY `game_time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `panas`
--
ALTER TABLE `panas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `result_number_setting`
--
ALTER TABLE `result_number_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
