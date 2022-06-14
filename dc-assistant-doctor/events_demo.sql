-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2019 at 05:18 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ars`
--

-- --------------------------------------------------------

--
-- Table structure for table `events_demo`
--

CREATE TABLE `events_demo` (
  `id` int(11) NOT NULL,
  `bdo` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(20) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `t_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events_demo`
--

INSERT INTO `events_demo` (`id`, `bdo`, `email`, `title`, `color`, `start`, `end`, `status`, `t_stamp`) VALUES
(220, 'bnec', 'bench@gmail.com', 'sample appointment', '#008000', '2019-08-29 09:05:00', '2019-08-29 09:10:00', 1, '2019-08-29 08:56:24'),
(221, '', '', 'sample', '#FF0000', '2019-08-29 00:00:00', '2019-08-30 00:00:00', NULL, '2019-08-29 08:57:52'),
(223, '', '', 'meeting with client', '##FF8C00', '2019-08-22 00:00:00', '2019-08-23 00:00:00', NULL, '2019-08-29 08:58:08'),
(224, '', '', 'meeting with employee', '#008000', '2019-08-29 00:00:00', '2019-08-30 00:00:00', NULL, '2019-08-29 08:58:19'),
(225, '', '', 'meeting with managers', '#008000', '2019-08-29 00:00:00', '2019-08-30 00:00:00', NULL, '2019-08-29 08:58:31'),
(226, '', '', 'meeting with executives', '#008000', '2019-08-29 00:00:00', '2019-08-30 00:00:00', NULL, '2019-08-29 08:58:40'),
(227, '', '', 'Sample', '#008000', '2019-08-21 12:00:00', '2019-08-21 13:00:00', NULL, '2019-08-30 02:45:49'),
(228, '', '', 'QWEQWE', '##FF8C00', '2019-08-01 00:00:00', '2019-08-02 00:00:00', NULL, '2019-08-30 02:58:41'),
(230, '', '', 'QWEW', '#FF8C00', '2019-08-09 00:00:00', '2019-08-10 00:00:00', NULL, '2019-08-30 02:59:26'),
(231, '', '', 'EWEW', '#FF0000', '2019-08-14 00:00:00', '2019-08-15 00:00:00', NULL, '2019-08-30 02:59:56'),
(232, '', '', 'QWEWEW', '##FF8C00', '2019-08-16 00:00:00', '2019-08-17 00:00:00', NULL, '2019-08-30 03:00:02'),
(233, '', '', 'bench', '#008000', '2019-08-07 09:00:00', '2019-08-08 12:00:00', NULL, '2019-08-30 03:00:55'),
(234, '', '', 'S', '##FF8C00', '2019-08-06 00:00:00', '2019-08-07 00:00:00', NULL, '2019-08-30 03:00:59');

-- --------------------------------------------------------

--
-- Table structure for table `member_rss`
--

CREATE TABLE `member_rss` (
  `member_id` int(11) NOT NULL,
  `member_first` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `role` varchar(30) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_rss`
--

INSERT INTO `member_rss` (`member_id`, `member_first`, `username`, `password`, `email`, `role`, `status`) VALUES
(5, 'user', 'user', 'user', 'braquino@primus.com.ph', 'user', 1),
(6, 'admin', 'admin', 'admin', '', 'admin', 1),
(7, 'amara', 'amara', 'amara', 'amara@gmail.com', 'user', 1),
(8, 'ETTALUCOD', 'ETTALUCOD', 'ETTALUCOD', '', 'admin', 1),
(9, 'asberceles', 'asberceles', 'asberceles', 'braquino@primus.com.ph', 'user', 1),
(10, 'sbborja', 'sbborja', 'sbborja', 'sbborja@primus.com.ph', 'user', 1),
(11, 'bnec', 'bench', 'bench', 'bench@gmail.com', '', 1),
(12, 'bebeb', 'ebeb', 'ebeb', 'ebebe@gmail', 'user', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events_demo`
--
ALTER TABLE `events_demo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_rss`
--
ALTER TABLE `member_rss`
  ADD PRIMARY KEY (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events_demo`
--
ALTER TABLE `events_demo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `member_rss`
--
ALTER TABLE `member_rss`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
