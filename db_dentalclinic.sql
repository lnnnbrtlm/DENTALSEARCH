-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2022 at 06:07 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dentalclinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_refno` int(50) NOT NULL,
  `patient_id` varchar(50) NOT NULL,
  `patient_name` varchar(250) NOT NULL,
  `email` varchar(255) NOT NULL,
  `doctor_name` varchar(250) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `clinic_name` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL,
  `appointment_datentime` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `appointment_time` time NOT NULL,
  `complete_datentime` datetime NOT NULL,
  `cancelled_datentime` datetime NOT NULL DEFAULT current_timestamp(),
  `mop` varchar(55) NOT NULL,
  `payment_date` varchar(55) NOT NULL,
  `payment_status` varchar(55) NOT NULL,
  `clinic_id` int(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_refno`, `patient_id`, `patient_name`, `email`, `doctor_name`, `service_name`, `clinic_name`, `note`, `appointment_datentime`, `start_time`, `end_time`, `appointment_time`, `complete_datentime`, `cancelled_datentime`, `mop`, `payment_date`, `payment_status`, `clinic_id`, `status`) VALUES
(1, '1', 'Juan Gomez', 'owangmalibu@gmail.com', 'Joshua Bartolome', 'Orthodontics', '', 'Urgent', '2022-04-02', '00:00:00', '00:00:00', '19:38:00', '0000-00-00 00:00:00', '2022-04-01 18:28:51', '', '', '', 0, 'In-Chair'),
(2, '2', 'Rex Santos', 'francis.dumas.urna@gmail.com', 'Joshua Bartolome', 'Denture', '', 'Emergency', '2022-04-11', '00:00:00', '00:00:00', '19:18:00', '0000-00-00 00:00:00', '2022-04-01 19:18:51', '', '', '', 0, 'In-Chair'),
(3, '1', 'Juan Gomez', 'cisurna@gmail.com', 'Joshua Bartolome', 'Crowns and Bridges', '', 'Urgent', '2022-04-05', '00:00:00', '00:00:00', '08:00:00', '2022-04-06 00:00:00', '2022-04-05 18:04:02', '', '', '', 4, 'Cancelled'),
(4, '1', 'Juan Gomez', 'owangmalibu@gmail.com', 'Joshua Bartolome', 'Denture', '', 'Upcoming', '2022-04-05', '00:00:00', '00:00:00', '19:19:00', '0000-00-00 00:00:00', '2022-04-05 19:19:41', '', '', '', 4, 'Upcoming'),
(5, '8', 'John Robert Onio', 'lennonbartolome26@gmail.com', 'Joshua Bartolome', 'Root Canal Treatment', '', 'asdadawd', '2022-04-13', '00:00:00', '00:00:00', '19:48:00', '2022-04-05 00:00:00', '2022-04-05 19:47:04', '', '', '', 5, 'Completed'),
(6, '8', 'John Robert Onio', 'lennonbartolome26@gmail.com', 'Joshua Bartolome', 'Root Canal Treatment', '', 'xas', '2022-04-07', '00:00:00', '00:00:00', '20:09:00', '2022-04-08 00:00:00', '2022-04-05 20:09:18', '', '', '2022-04-05 09:08:57', 5, 'Completed'),
(7, '', '', '', '', 'Metal braces', '', '', '2022-04-12', '07:50:00', '08:50:00', '00:00:00', '0000-00-00 00:00:00', '2022-04-08 07:23:09', '', '', '', 92, 'Upcoming'),
(8, '', '', '', '', 'Metal braces', '', '', '2022-04-13', '10:50:00', '11:50:00', '00:00:00', '0000-00-00 00:00:00', '2022-04-08 07:34:30', '', '', '', 92, 'Upcoming'),
(9, ' 3 ', ' Francis Urna', 'cisurna@gmail.com', '', 'Lip and Cheek Bumpers', '', '', '2022-04-20', '10:50:00', '12:20:00', '00:00:00', '0000-00-00 00:00:00', '2022-04-08 07:54:35', '', '', '', 92, 'Upcoming'),
(10, ' 3 ', ' Francis Urna', 'cisurna@gmail.com', '', 'Metal braces', '', '', '2022-04-20', '12:50:00', '13:50:00', '00:00:00', '0000-00-00 00:00:00', '2022-04-08 07:55:36', '', '', '', 92, 'Upcoming'),
(13, ' 11 ', ' Arnulfo Malubay', 'joshuamalubay.rater@gmail.com', '', 'pedia4', '', '', '2022-04-22', '04:20:00', '06:50:00', '00:00:00', '0000-00-00 00:00:00', '2022-04-08 11:06:14', '', '', '', 78, 'Upcoming'),
(14, ' 11 ', ' Arnulfo Malubay', 'joshuamalubay.rater@gmail.com', '', 'ortho4', '', '', '2022-04-20', '04:20:00', '06:20:00', '00:00:00', '0000-00-00 00:00:00', '2022-04-08 11:07:48', '', '', '', 78, 'Upcoming');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `bill_id` int(11) NOT NULL,
  `ref_no` varchar(50) NOT NULL,
  `clinic_id` int(50) NOT NULL,
  `patient_id` varchar(50) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `doctor` varchar(50) NOT NULL,
  `service` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `balance` varchar(50) NOT NULL,
  `amount_paid` varchar(50) NOT NULL,
  `mode_of_payment` varchar(50) NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`bill_id`, `ref_no`, `clinic_id`, `patient_id`, `patient_name`, `doctor`, `service`, `price`, `balance`, `amount_paid`, `mode_of_payment`, `date`, `status`) VALUES
(1, '', 1, '', 'Urna,', 'Joshua Bartolome', 'Dental Implants', '30000', '0', '30000', '', '2022-04-04', 'Paid'),
(2, '', 3, '', 'Gomez,', 'Joshua Bartolome', 'Root Canal Treatment', '2600', '0', '2600', '', '2022-04-04', 'Paid'),
(3, '', 4, '', 'Urna, Francis ', 'Joshua Bartolome', 'Pediatric Dentistry', '6000', '0', '6000', '', '2022-04-04', 'Paid'),
(4, '', 4, '', 'Santos, Rex Dumas', 'Francis Urna', 'Dental Implants', '', '0', '60000', '', '2022-04-05', 'Paid'),
(5, '', 4, '', 'Onio, John Robert ', 'Francis Urna', 'Orthodontics', '60000', '0', '60000', '', '2022-04-05', 'Paid'),
(6, '', 4, '', 'Urna, Francis ', 'Francis Urna', 'Dental Implants', '60000', '0', '60000', '', '2022-04-05', 'Paid'),
(7, '', 5, '', 'Onio, John Robert ', 'Francis Urna', 'try', '214', '0', '500', '', '2022-04-05', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `certification`
--

CREATE TABLE `certification` (
  `id` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `doctor` varchar(50) NOT NULL,
  `service` varchar(50) NOT NULL,
  `rest_day` varchar(50) NOT NULL,
  `time_n_date` date NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `certification`
--

INSERT INTO `certification` (`id`, `name`, `doctor`, `service`, `rest_day`, `time_n_date`, `remarks`) VALUES
(0, 'wang wang', 'Lennon Bartolome', 'Orthodontics', '3 days', '2022-03-29', 'nery');

-- --------------------------------------------------------

--
-- Table structure for table `clinic_tbl`
--

CREATE TABLE `clinic_tbl` (
  `clinic_id` int(9) NOT NULL,
  `user_id` int(10) NOT NULL,
  `clinic_name` varchar(50) NOT NULL,
  `specialty` varchar(50) NOT NULL,
  `clinic_desc` varchar(250) NOT NULL,
  `clinic_contact` varchar(15) NOT NULL,
  `clinic_email` varchar(50) NOT NULL,
  `schedule_day` varchar(250) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `clinic_address` varchar(50) NOT NULL,
  `street` varchar(100) NOT NULL,
  `brgy` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `clinic_photo` varchar(50) NOT NULL,
  `feedback_rate` int(9) NOT NULL,
  `feedback_comment` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clinic_tbl`
--

INSERT INTO `clinic_tbl` (`clinic_id`, `user_id`, `clinic_name`, `specialty`, `clinic_desc`, `clinic_contact`, `clinic_email`, `schedule_day`, `start_time`, `end_time`, `clinic_address`, `street`, `brgy`, `city`, `zip_code`, `logo`, `clinic_photo`, `feedback_rate`, `feedback_comment`) VALUES
(1, 2, 'hahaha', 'Orthodontics,Pediatric,Dentist', 'hahaha', '123456', 'lennonbartolome26@gmail.com', 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday', '10:00:00', '04:00:00', 'B3 L25 Sixta Matias HOA Bagumbong Caloocan City', 'B3 L25', 'Bagumbong', 'Caloocan', '1421', '', '', 4, 'Feedback Comment'),
(3, 1, 'Dentalalala', 'Orthodontics,Pediatric,Dentist', 'Sample Description for showing.', '123456', 'dental.clinic@gmail.com', 'Monday,Friday,Saturday', '02:09:00', '02:09:00', 'B3 L25 Sixta Matias HOA Bagumbong Caloocan City', 'B3 L25', 'Bagumbong', 'Caloocan', '1421', '', '', 4, 'Sample Comment'),
(4, 1, 'Try', 'Orthodontics,Pediatric,Dentist', 'Sample Description for showing.', '123456', 'dental.clinic@gmail.com', 'Monday,Friday,Saturday', '02:09:00', '02:09:00', 'B3 L25 Sixta Matias HOA Bagumbong Caloocan City', 'B3 L25', 'Bagumbong', 'Caloocan', '1421', '', '', 4, 'Sample Comment'),
(5, 1, 'Try Again', 'Orthodontics,Pediatric,Dentist', 'Sample Description for showing.', '123456', 'dental.clinic@gmail.com', 'Monday,Friday,Saturday', '02:09:00', '02:09:00', 'B3 L25 Sixta Matias HOA Bagumbong Caloocan City', 'B3 L25', 'Bagumbong', 'Caloocan', '1421', '', '', 4, 'Sample Comment'),
(6, 0, 'owang', '', 'ass', '2147483647', 'urna@gmail.com', '', '05:52:00', '17:52:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(7, 0, 'owang', '', 'ass', '2147483647', 'urna@gmail.com', '', '05:52:00', '17:52:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(8, 0, 'owang', '', 'ass', '2147483647', 'urna@gmail.com', '', '05:52:00', '17:52:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(9, 0, 'owang', '', 'ass', '2147483647', 'urna@gmail.com', '', '05:52:00', '17:52:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(10, 0, 'owang', '', 'ass', '2147483647', 'urna@gmail.com', '', '05:52:00', '17:52:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(11, 0, 'owang', '', 'ass', '2147483647', 'urna@gmail.com', '', '05:52:00', '17:52:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(12, 0, 'owang', '', 'ass', '2147483647', 'urna@gmail.com', '', '05:52:00', '17:52:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(13, 0, 'owang', '', 'ass', '2147483647', 'urna@gmail.com', '', '05:52:00', '17:52:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(14, 0, 'owang', '', 'ass', '2147483647', 'urna@gmail.com', '', '05:52:00', '17:52:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(15, 0, 'owang', '', 'ass', '2147483647', 'urna@gmail.com', '', '05:52:00', '17:52:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(16, 0, 'owang', '', 'ass', '2147483647', 'urna@gmail.com', '', '05:52:00', '17:52:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(17, 0, 'owang', '', 'ass', '2147483647', 'urna@gmail.com', '', '05:52:00', '17:52:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(18, 0, 'owang', '', 'ass', '2147483647', 'urna@gmail.com', '', '05:52:00', '17:52:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(19, 0, 'owang', '', 'ass', '2147483647', 'urna@gmail.com', '', '05:52:00', '17:52:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(20, 0, 'owang', '', 'ass', '2147483647', 'urna@gmail.com', '', '05:52:00', '17:52:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(21, 0, 'owang', '', 'ass', '2147483647', 'urna@gmail.com', '', '05:52:00', '17:52:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(22, 0, 'owang', '', 'ass', '2147483647', 'urna@gmail.com', '', '05:52:00', '17:52:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(23, 0, 'owang', '', 'ass', '2147483647', 'urna@gmail.com', '', '05:52:00', '17:52:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(24, 0, 'owang', '', 'ass', '2147483647', 'urna@gmail.com', '', '05:52:00', '17:52:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(25, 0, 'Gantt Chart', '', 'sdsdc', '2147483647', 'francis.dumas.urna@gmail.com', '', '05:55:00', '17:55:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(26, 0, 'Gantt Chart', '', 'sdsdc', '2147483647', 'francis.dumas.urna@gmail.com', '', '05:55:00', '17:55:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(27, 0, 'Gantt Chart', '', 'sdsdc', '2147483647', 'francis.dumas.urna@gmail.com', '', '05:55:00', '17:55:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(28, 0, 'Gantt Chart', '', 'sdsdc', '2147483647', 'francis.dumas.urna@gmail.com', '', '05:55:00', '17:55:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(29, 0, 'Gantt Chart', '', 'sdsdc', '2147483647', 'francis.dumas.urna@gmail.com', '', '05:55:00', '17:55:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(30, 0, 'Gantt Chart', '', 'sdsdc', '2147483647', 'francis.dumas.urna@gmail.com', '', '05:55:00', '17:55:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(31, 0, 'Gantt Chart', '', 'sdsdc', '2147483647', 'francis.dumas.urna@gmail.com', '', '05:55:00', '17:55:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(32, 0, 'Gantt Chart', '', 'sdsdc', '2147483647', 'francis.dumas.urna@gmail.com', '', '05:55:00', '17:55:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(33, 0, 'owang', '', 'dfdx', '2147483647', 'urna@gmail.com', '', '05:56:00', '17:56:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(34, 0, 'owang', '', 'dfdx', '2147483647', 'urna@gmail.com', '', '05:56:00', '17:56:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(35, 0, 'owang', '', 'dfdx', '2147483647', 'urna@gmail.com', '', '05:56:00', '17:56:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(36, 0, 'owang', '', 'dfdx', '2147483647', 'urna@gmail.com', '', '05:56:00', '17:56:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(37, 0, 'owang', '', 'dfdx', '2147483647', 'urna@gmail.com', '', '05:56:00', '17:56:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(38, 0, 'owang', '', 'dfdx', '2147483647', 'urna@gmail.com', '', '05:56:00', '17:56:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(39, 0, 'owang', '', 'q3d3', '2147483647', 'francis.dumas.urna@gmail.com', '', '05:58:00', '17:58:00', 'dwdw', '', '', '', '', '', '', 0, ''),
(40, 0, 'owang', '', 'q3d3', '2147483647', 'francis.dumas.urna@gmail.com', '', '05:58:00', '17:58:00', 'dwdw', '', '', '', '', '', '', 0, ''),
(41, 0, 'owang', '', 'q3d3', '2147483647', 'francis.dumas.urna@gmail.com', '', '05:58:00', '17:58:00', 'dwdw', '', '', '', '', '', '', 0, ''),
(42, 0, 'owang', '', 'q3d3', '2147483647', 'francis.dumas.urna@gmail.com', '', '05:58:00', '17:58:00', 'dwdw', '', '', '', '', '', '', 0, ''),
(43, 0, 'owang', '', 'q3d3', '2147483647', 'francis.dumas.urna@gmail.com', '', '05:58:00', '17:58:00', 'dwdw', '', '', '', '', '', '', 0, ''),
(44, 0, 'owang', '', 'q3d3', '2147483647', 'francis.dumas.urna@gmail.com', '', '05:58:00', '17:58:00', 'dwdw', '', '', '', '', '', '', 0, ''),
(45, 0, 'owang', '', 'q3d3', '2147483647', 'francis.dumas.urna@gmail.com', '', '05:58:00', '17:58:00', 'dwdw', '', '', '', '', '', '', 0, ''),
(46, 0, 'owang', '', 'q3d3', '2147483647', 'francis.dumas.urna@gmail.com', '', '05:58:00', '17:58:00', 'dwdw', '', '', '', '', '', '', 0, ''),
(47, 0, 'owang', '', 'q3d3', '2147483647', 'francis.dumas.urna@gmail.com', '', '05:58:00', '17:58:00', 'dwdw', '', '', '', '', '', '', 0, ''),
(48, 0, 'owang', '', 'awdwad', '2147483647', 'urna@gmail.com', '', '06:05:00', '18:05:00', 'awdwad', '', '', '', '', '', '', 0, ''),
(49, 0, 'owang', '', 'awdwad', '2147483647', 'urna@gmail.com', '', '06:05:00', '18:05:00', 'awdwad', '', '', '', '', '', '', 0, ''),
(50, 0, 'owang', '', 'awdwad', '2147483647', 'urna@gmail.com', '', '06:05:00', '18:05:00', 'awdwad', '', '', '', '', '', '', 0, ''),
(51, 0, 'owang', '', 'awdwad', '2147483647', 'urna@gmail.com', '', '06:05:00', '18:05:00', 'awdwad', '', '', '', '', '', '', 0, ''),
(66, 0, 'owang', '', 'jm', '2147483647', 'urna@gmail.com', '', '06:47:00', '18:47:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(67, 0, 'owang', '', 'jm', '2147483647', 'urna@gmail.com', '', '06:47:00', '18:47:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(68, 0, 'Zel', '', 'adawd', '2147483647', 'francis.dumas.urna@gmail.com', '', '06:48:00', '18:48:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(69, 0, 'Zel', '', 'adawd', '2147483647', 'francis.dumas.urna@gmail.com', '', '06:48:00', '18:48:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(70, 0, 'Zel', '', 'adawd', '2147483647', 'francis.dumas.urna@gmail.com', '', '06:48:00', '18:48:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(71, 0, 'Phil Clinic', '', 'GG', '2147483647', 'kyle@gmail.com', '', '07:10:00', '19:10:00', 'qwerty', '', '', '', '', '', '', 0, ''),
(72, 0, 'Zel', '', 'gg', '94414256', 'test@gmail.com', '', '07:40:00', '19:40:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(73, 0, 'Zel', '', 'gg', '94414256', 'test@gmail.com', '', '07:40:00', '19:40:00', 'Riverside Ext', '', '', '', '', '', '', 0, ''),
(74, 1, 'Zel', '', 'yaya', '2147483647', 'francis.dumas.urna@gmail.com', '', '07:42:00', '19:42:00', 'dwdw', '', '', '', '', '', '', 0, ''),
(75, 1, 'Francis', '', 'Gg', '2147483647', 'francis.dumas.urna@gmail.com', '', '12:59:00', '17:00:00', 'Quezon City', '', '', '', '', '', '', 0, ''),
(76, 1, 'admin', '', 'desc', '2147483647', 'leahS@gmail.com', '', '02:16:00', '17:16:00', 'Pasig City', '', '', '', '', '', '', 0, ''),
(77, 5, 'Francis', '', 'sssssdesc', '2147483647', 'urna@gmail.com', '', '07:20:00', '18:20:00', 'Quezon City', '', '', '', '', '', '', 0, ''),
(78, 0, 'Francis123', '', 'hayss', '2147483647', 'leahS@gmail.com', '', '04:20:00', '16:20:00', 'Pasay City', '', '', '', '', '', '', 0, ''),
(79, 1, 'Niechiezy', '', 'war', '2147483647', 'urna@gmail.com', '', '04:29:00', '16:29:00', 'Pasay City', '', '', '', '', '', '', 0, ''),
(80, 1, 'Sheeran Clinic', '', 'Description', '2147483647', 'fu@gmail.com', '', '06:40:00', '19:45:00', 'Quezon City', '', '', '', '', '', '', 0, ''),
(81, 1, 'Tooth Dae', '', 'Hey', '09954418463', 'francis@gmail.com', '', '05:55:00', '22:00:00', 'Quezon City', '', '', '', '', '', '', 0, ''),
(82, 1, 'Lennon Clinic', '', 'Desc', '0912956142', 'francis@gmail.com', '', '06:10:00', '17:10:00', 'Quezon City', '', '', '', '', '', '', 0, ''),
(83, 1, 'Joshua Clinic', '', 'Description', '09552900153', 'urna@gmail.com', '', '06:25:00', '19:30:00', '56 Saint Vincent Street Brgy. Holy Spirit, Quezon ', '56 Saint Vincent', 'Brgy. Holy Spirit', 'Quezon City', '1127', '', '', 0, ''),
(84, 1, 'Dental New', '', 'Good', '0912956142', 'leahS@gmail.com', '', '08:20:00', '20:20:00', '56 Saint Vincent Street Brgy. Holy Spirit, Quezon ', 'Saint Vincent St.', 'Brgy. Holy Spirit', 'Quezon City', '1127', '', '', 0, ''),
(85, 1, 'New Clinic', '', 'Desc', '09772410331', 'fu@gmail.com', '', '10:30:00', '20:30:00', '56 Saint Vincent Street Brgy. Holy Spirit, Quezon ', '56 Saint Vincent St.', 'Brgy. Holy Spirit', 'Quezon City', '1127', '', '', 0, ''),
(86, 1, 'Cis Clinic', '', 'Easy', '09772410331', 'francis@gmail.com', '', '08:30:00', '20:30:00', '56 Saint Vincent Street Brgy. Holy Spirit, Quezon ', 'Saint Vincent St.', 'Brgy. Holy Spirit', 'Quezon City', '1127', '', '', 0, ''),
(87, 1, 'Zy Clinic', '', 'Desc', '09552900153', 'francis@gmail.com', '', '10:40:00', '22:40:00', '56 Saint Vincent Street Brgy. Holy Spirit, Quezon ', '56 Saint Vincent St.', 'Brgy. Holy Spirit', 'Quezon City', '1127', '', '', 0, ''),
(88, 1, 'try', '', 'adawdw', '0955144185', 'joshuamalubay07111999@gmail.com', '', '06:01:00', '18:01:00', '12', 'Riverside', 'Commonwealth', 'Quezon City', '1121', '', '', 0, ''),
(89, 1, 'Francis Clinic', '', 'Description', '0955144185', 'urna@gmail.com', '', '07:00:00', '15:00:00', 'Riverside', 'Riverside', 'Commonwealth', 'Quezon City', '1121', '', '', 0, ''),
(90, 1, 'Cis Clinic', '', 'Goods', '0955144185', 'cisurna@gmail.com', '', '07:15:00', '18:15:00', 'Riverside', 'Riverside', 'Commonwealth', 'Quezon City', '1121', '', '', 0, ''),
(91, 1, 'Arnulfo Malubay', '', 'Desc', '0955144185', 'joshuamalubay07111999@gmail.com', '', '20:15:00', '18:15:00', 'Riverside', 'Riverside', 'Commonwealth', 'Quezon City', '1121', '', '', 0, ''),
(92, 1, 'Dental New', '', 'Gg', '0955144185', 'cis@gmail.com', '', '07:50:00', '18:50:00', 'Riverside', 'Riverside', 'Commonwealth', 'Quezon City', '1121', '', '', 0, ''),
(93, 1, 'Rusty', '', 'YESSSSSSSSSSSSS', '0999999999', 'rustyralminar@gmail.com', '', '09:10:00', '09:10:00', 'ASDASDAS', 'ASDASDA', 'SASDADAS', 'ASDASDSA', '1116', '', '', 0, ''),
(94, 1, 'Test', '', 'asdasdasdas', '0999999999', 'test@gmail.com', '', '09:28:00', '00:00:00', 'asdasd', 'asdasd', 'asdasdas', 'asdas', '1666', '', '', 0, ''),
(95, 1, 'asdasdasd', '', 'asdfasfsadadas', 'asdasdas', 'SZXdAZdzdz@gmail.com', '', '09:34:00', '00:00:00', 'asdasdsa', 'dassad', 'asdasdasd', 'asdas', '1116', '', '', 0, ''),
(96, 1, 'asdasd', '', 'asdasdasdas', 'asdasdas', 'asdasd@gmail.com', '', '09:36:00', '00:00:00', 'asdasd', 'asdasd', 'asdasd', 'asdasd', '1116', '222.jpg', '', 0, ''),
(97, 1, 'asdsadas', '', 'asdsadasd', 'dasdas', 'dasdasdsaas@gmail.com', '', '09:37:00', '00:00:00', 'asdas', 'dasd', 'asdasdas', 'dasdasd', '1124', '222.jpg', '', 0, ''),
(98, 1, 'asdasdasd', '', 'asdasdasd', 'asdasdaasd', 'asdasdas@gmail.com', '', '09:41:00', '00:00:00', 'as', 'asdas', 'dasdas', 'dasdas', '1116', '', '', 0, ''),
(99, 1, 'asdasd', '', 'asdsadasd', 'asdasd', 'adasdas@gmail.com', '', '09:44:00', '00:00:00', 'asdas', 'dad', 'asdasdas', 'dasdas', '116', '../client-module/profile pictures/asdasd.jpg', '', 0, ''),
(100, 1, 'test', '', 'asdasdasdasd', 'asdasdasd', 'asdasdas@gmail.com', '', '00:41:00', '00:00:00', 'asdas', 'dasd', 'adasdas', 'asdasd', '2412312', '../client-module/profile pictures/clinic/logo/test.jpg', '', 0, ''),
(101, 1, 'test', '', 'sfdsdfsd', '093233366', 'ruystyr@gmail.com', '', '09:49:00', '00:00:00', 'sdfs', 'dfsdf', 'sdfsdf', 'sdfsdfsd', '1116', '../client-module/profile pictures/clinic/logo/test.jpg', '../client-module/profile pictures/clinic/photo/tes', 0, ''),
(102, 1, 'test2', '', 'asdsadas', '09999999', 'asdasdas@gmail.com', '', '11:48:00', '11:48:00', 'asdas', 'dasd', 'asdasd', 'asdasd', '1116', '../client-module/profile pictures/clinic/logo/test2.jpeg', '../client-module/profile pictures/clinic/photo/tes', 0, ''),
(103, 1, 'ClinicTest', '', 'asdadas', '09999999', 'sample@gmail.com', '', '09:59:00', '09:57:00', 'asd', 'asdad', 'adsaasd', 'asdas', '1116', '../client-module/profile pictures/clinic/logo/ClinicTest.jpg', '../client-module/profile pictures/clinic/photo/Cli', 0, ''),
(104, 1, 'LAST', '', 'asdsadas', '09999999999', 'last@gmail.com', '', '09:01:00', '09:00:00', 'address', 'street', 'brgy', 'city', '11116', 'LAST.jpg', 'LAST.jpeg', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `conditiontbl`
--

CREATE TABLE `conditiontbl` (
  `id` int(11) NOT NULL,
  `con_legend` varchar(50) NOT NULL,
  `t_condition` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conditiontbl`
--

INSERT INTO `conditiontbl` (`id`, `con_legend`, `t_condition`) VALUES
(1, 'P', 'Present Teeth'),
(2, 'D', 'Decayed (Canes indicated for Filling)'),
(3, 'M', 'Missing due to Canes'),
(4, 'MO', 'Missing due to Other Causes'),
(5, 'Im', 'Impacted Tooth'),
(6, 'Sp', 'Supernumerary Tooth'),
(7, 'Rf', 'Root Fragment'),
(8, 'Un', 'Unerupted');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` int(10) NOT NULL,
  `homepage_header` varchar(250) NOT NULL,
  `homepage_description` varchar(250) NOT NULL,
  `header_photo` varchar(250) NOT NULL,
  `service_one` varchar(250) NOT NULL,
  `service_two` varchar(250) NOT NULL,
  `service_three` varchar(250) NOT NULL,
  `about_tech_header` varchar(250) NOT NULL,
  `about_tech_description` varchar(250) NOT NULL,
  `about_tech_headerone` varchar(250) NOT NULL,
  `about_tech_description_one` varchar(250) NOT NULL,
  `about_tech_header_two` varchar(250) NOT NULL,
  `about_tech_description_two` varchar(250) NOT NULL,
  `about_tech_header_three` varchar(250) NOT NULL,
  `about_tech_description_three` varchar(250) NOT NULL,
  `faq_one` varchar(250) NOT NULL,
  `faq_one_answer` varchar(250) NOT NULL,
  `faq_two` varchar(250) NOT NULL,
  `faq_two_answer` varchar(250) NOT NULL,
  `faq_three` varchar(250) NOT NULL,
  `faq_three_answer` varchar(250) NOT NULL,
  `aboutus_header` varchar(250) NOT NULL,
  `aboutus_description` varchar(250) NOT NULL,
  `aboutus_photo` varchar(50) NOT NULL,
  `aboutus_founded` varchar(50) NOT NULL,
  `doctor_one` varchar(250) NOT NULL,
  `doctor_two` varchar(250) NOT NULL,
  `doctor_three` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_id`, `homepage_header`, `homepage_description`, `header_photo`, `service_one`, `service_two`, `service_three`, `about_tech_header`, `about_tech_description`, `about_tech_headerone`, `about_tech_description_one`, `about_tech_header_two`, `about_tech_description_two`, `about_tech_header_three`, `about_tech_description_three`, `faq_one`, `faq_one_answer`, `faq_two`, `faq_two_answer`, `faq_three`, `faq_three_answer`, `aboutus_header`, `aboutus_description`, `aboutus_photo`, `aboutus_founded`, `doctor_one`, `doctor_two`, `doctor_three`) VALUES
(1, 'A better life starts with a beautiful smile.', 'It\'s going to be the best dental care you\'ll have ever had. The dental professionals here will make your experience easy and hassle-free. Just relax and enjoy the services provided by the dental experts.', 'yes', 'Tooth Extraction', 'Dental Implants', 'Denture', 'About our technologies', 'Learn more about our latest technology.', 'Healthcare Professionals', 'The dental procedure will be performed by highly trained dentists and our dentist\'s assistant who will ensure that you get the best service.', 'We Provide High-Quality Care', 'We will make your experience at our Dental office pleasant and easy. From the moment you visit us, we will take the time to make you comfortable.', 'Ready To Aid', 'When you are ready, our team is waiting to answer any questions you may have. Please feel free to book an appointment online or call our office at (0999) 123 4321 for more information.', 'What type of toothbrush and toothpaste should I us', 'Buy toothbrushes with soft bristles. Medium and firm ones can damage teeth and gums. Use soft pressure, for 2 minutes, two times a day.', 'Do I really need to floss?', 'There\'s no getting around the need to get around your teeth daily with dental floss. It clears food and plaque from between teeth and under the gumline. If you don\'t, plaque hardens into tartar, which forms wedges and widens the space between teeth a', 'Does a rinse or mouthwash help?', 'Mouthwashes for cavity protection, sensitivity, and fresh breath may help when you use them with regular brushing and flossing -- but not instead of daily cleanings. Your dentist can recommend the best type for you.', 'Excellent Techniques For Healthy Dental Condition', 'The best dental health begins with a diet and a daily routine. If you can create a healthy routine, you will be able to maintain good dental hygiene.', 'yes', 'March 25, 2022', 'Joshua Malubay', 'Joshua Malubay', 'Joshua Malubay');

-- --------------------------------------------------------

--
-- Table structure for table `control_panel`
--

CREATE TABLE `control_panel` (
  `panel_id` int(10) NOT NULL,
  `clinic_name` varchar(50) NOT NULL,
  `clinic_logo` varchar(50) NOT NULL,
  `clinic_contact` varchar(50) NOT NULL,
  `clinic_email` varchar(50) NOT NULL,
  `start_day` varchar(50) NOT NULL,
  `end_day` varchar(50) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `clinic_address` varchar(50) NOT NULL,
  `facebook_link` varchar(50) NOT NULL,
  `twitter_link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `control_panel`
--

INSERT INTO `control_panel` (`panel_id`, `clinic_name`, `clinic_logo`, `clinic_contact`, `clinic_email`, `start_day`, `end_day`, `start_time`, `end_time`, `clinic_address`, `facebook_link`, `twitter_link`) VALUES
(1, 'YES', 'logo-new.png', '09474957938', 'dental.clinic@gmail.com', 'Monday', 'Saturday', '19:00:58', '16:00:58', 'Quirino Hwy, Novaliches, Quezon City, Metro Manila', 'https://facebook.com/romero.dental/', 'https://twitter.com/romero.dental/');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `days_id` int(99) NOT NULL,
  `clinic_id` int(100) NOT NULL,
  `dayname` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`days_id`, `clinic_id`, `dayname`) VALUES
(1, 72, 'Tuesday'),
(2, 72, 'Wednesday'),
(3, 72, 'Tuesday'),
(4, 72, 'Wednesday'),
(5, 78, 'Sunday'),
(6, 78, 'Monday'),
(7, 78, 'Tuesday'),
(8, 78, 'Wednesday'),
(9, 78, 'Thursday'),
(10, 78, 'Friday'),
(11, 78, 'Saturday'),
(12, 79, 'Sunday'),
(13, 79, 'Monday'),
(14, 79, 'Tuesday'),
(15, 79, 'Wednesday'),
(16, 79, 'Thursday'),
(17, 79, 'Friday'),
(18, 79, 'Saturday'),
(19, 80, 'Monday'),
(20, 80, 'Tuesday'),
(21, 80, 'Wednesday'),
(22, 81, 'Sunday'),
(23, 81, 'Monday'),
(24, 81, 'Tuesday'),
(25, 81, 'Wednesday'),
(26, 81, 'Thursday'),
(27, 81, 'Friday'),
(28, 82, 'Monday'),
(29, 82, 'Tuesday'),
(30, 82, 'Wednesday'),
(31, 82, 'Thursday'),
(32, 82, 'Friday'),
(33, 83, 'Monday'),
(34, 83, 'Tuesday'),
(35, 83, 'Wednesday'),
(36, 83, 'Thursday'),
(37, 83, 'Friday'),
(38, 84, 'Tuesday'),
(39, 84, 'Wednesday'),
(40, 84, 'Thursday'),
(41, 86, 'Monday'),
(42, 86, 'Tuesday'),
(43, 86, 'Wednesday'),
(44, 86, 'Thursday'),
(45, 87, 'Monday'),
(46, 87, 'Tuesday'),
(47, 87, 'Wednesday'),
(48, 88, 'Sunday'),
(49, 88, 'Monday'),
(50, 88, 'Tuesday'),
(51, 88, 'Wednesday'),
(52, 88, 'Thursday'),
(53, 88, 'Friday'),
(54, 88, 'Saturday'),
(55, 89, 'Monday'),
(56, 89, 'Tuesday'),
(57, 89, 'Wednesday'),
(58, 89, 'Thursday'),
(59, 89, 'Friday'),
(60, 90, 'Monday'),
(61, 90, 'Tuesday'),
(62, 90, 'Wednesday'),
(63, 90, 'Thursday'),
(64, 90, 'Friday'),
(65, 91, 'Sunday'),
(66, 91, 'Monday'),
(67, 92, 'Tuesday'),
(68, 92, 'Wednesday'),
(69, 92, 'Friday'),
(70, 93, 'Sunday'),
(71, 94, 'Sunday'),
(72, 94, 'null'),
(73, 94, 'null'),
(74, 94, 'null'),
(75, 94, 'null'),
(76, 94, 'null'),
(77, 94, '00:24'),
(78, 95, 'Sunday'),
(79, 95, 'Monday'),
(80, 95, 'null'),
(81, 95, 'null'),
(82, 95, 'null'),
(83, 95, 'null'),
(84, 95, '09:30'),
(85, 96, 'Sunday'),
(86, 96, 'null'),
(87, 96, 'null'),
(88, 96, 'null'),
(89, 96, 'null'),
(90, 96, 'null'),
(91, 96, '00:32'),
(92, 97, 'Sunday'),
(93, 97, 'null'),
(94, 97, 'null'),
(95, 97, 'null'),
(96, 97, 'null'),
(97, 97, 'null'),
(98, 97, '00:34'),
(99, 98, 'null'),
(100, 98, 'null'),
(101, 98, 'null'),
(102, 98, 'null'),
(103, 98, 'null'),
(104, 98, 'Friday'),
(105, 98, '09:41'),
(106, 99, 'null'),
(107, 99, 'null'),
(108, 99, 'null'),
(109, 99, 'null'),
(110, 99, 'null'),
(111, 99, 'Friday'),
(112, 99, '09:43'),
(113, 100, 'Sunday'),
(114, 100, 'null'),
(115, 100, 'null'),
(116, 100, 'null'),
(117, 100, 'null'),
(118, 100, 'null'),
(119, 100, '09:44'),
(120, 101, 'Sunday'),
(121, 101, 'null'),
(122, 101, 'null'),
(123, 101, 'null'),
(124, 101, 'Thursday'),
(125, 101, 'null'),
(126, 101, '09:48'),
(127, 102, 'Sunday'),
(128, 102, 'null'),
(129, 102, 'null'),
(130, 102, 'null'),
(131, 102, 'null'),
(132, 102, 'null'),
(133, 102, 'null'),
(134, 103, 'null'),
(135, 103, 'null'),
(136, 103, 'null'),
(137, 103, 'null'),
(138, 103, 'null'),
(139, 103, 'Friday'),
(140, 103, 'null'),
(141, 104, 'null'),
(142, 104, 'Monday'),
(143, 104, 'null'),
(144, 104, 'null'),
(145, 104, 'null'),
(146, 104, 'null'),
(147, 104, 'null');

-- --------------------------------------------------------

--
-- Table structure for table `dentalchart`
--

CREATE TABLE `dentalchart` (
  `procedure_id` int(50) NOT NULL,
  `ref_no` int(11) NOT NULL,
  `tooth_id` int(50) NOT NULL,
  `patient_id` varchar(50) NOT NULL,
  `clinic_id` int(50) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `t_condition` varchar(50) NOT NULL,
  `t_procedure` varchar(50) NOT NULL,
  `con_legend` varchar(100) NOT NULL,
  `pro_legend` varchar(100) NOT NULL,
  `price` int(50) NOT NULL,
  `dentaldate` date NOT NULL,
  `bottomright` varchar(20) NOT NULL,
  `bottomleft` varchar(20) NOT NULL,
  `leftbottom` varchar(20) NOT NULL,
  `lefttop` varchar(20) NOT NULL,
  `topleft` varchar(20) NOT NULL,
  `topright` varchar(20) NOT NULL,
  `rightbottom` varchar(20) NOT NULL,
  `righttop` varchar(20) NOT NULL,
  `center` varchar(20) NOT NULL,
  `all` varchar(50) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dentalchart`
--

INSERT INTO `dentalchart` (`procedure_id`, `ref_no`, `tooth_id`, `patient_id`, `clinic_id`, `patient_name`, `t_condition`, `t_procedure`, `con_legend`, `pro_legend`, `price`, `dentaldate`, `bottomright`, `bottomleft`, `leftbottom`, `lefttop`, `topleft`, `topright`, `rightbottom`, `righttop`, `center`, `all`, `payment_status`, `status`) VALUES
(1, 1, 11, '1', 0, 'Juan Gomez', 'Decayed (Canes indicated for Filling)', 'Jacket Crown', 'D', 'JC', 1000, '2022-04-01', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '1', ' ', '', 'Completed'),
(2, 1, 12, '1', 0, 'Juan Gomez', 'Decayed (Canes indicated for Filling)', 'Composite Filling', 'D', 'Co', 2000, '2022-04-01', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '1', '', 'Completed'),
(3, 1, 21, '1', 0, 'Juan Gomez', 'Missing due to Canes', 'Jacket Crown', 'M', 'JC', 1000, '2022-04-01', ' ', ' ', ' ', ' ', ' ', ' ', '1', '1', ' ', ' ', '', 'Completed'),
(4, 6, 41, '8', 0, 'John Robert Onio', 'Decayed (Canes indicated for Filling)', 'Composite Filling', 'D', 'Co', 2000, '2022-04-05', ' ', ' ', ' ', ' ', ' ', '1', ' ', '1', ' ', ' ', '', 'Completed'),
(5, 6, 41, '8', 0, 'John Robert Onio', 'Missing due to Canes', 'Composite Filling', 'M', 'Co', 2000, '2022-04-05', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '1', '', 'Completed'),
(6, 6, 44, '8', 0, 'John Robert Onio', 'Missing due to Canes', 'Jacket Crown', 'M', 'JC', 1000, '2022-04-05', ' ', ' ', ' ', ' ', ' ', '1', ' ', '1', ' ', ' ', '', 'Completed'),
(7, 6, 45, '8', 5, 'John Robert Onio', 'Decayed (Canes indicated for Filling)', 'Composite Filling', 'D', 'Co', 2000, '2022-04-05', ' ', ' ', ' ', '1', '1', ' ', ' ', ' ', ' ', ' ', '', 'Completed'),
(8, 6, 82, '8', 0, 'John Robert Onio', 'Decayed (Canes indicated for Filling)', 'Composite Filling', 'D', 'Co', 2000, '2022-04-05', ' ', ' ', ' ', '1', '1', ' ', ' ', ' ', ' ', ' ', '', 'Planned'),
(9, 6, 75, '8', 0, 'John Robert Onio', 'Decayed (Canes indicated for Filling)', 'Amaigam Filling', 'D', 'Am', 1000, '2022-04-05', ' ', ' ', ' ', '1', '1', ' ', ' ', ' ', ' ', ' ', '', 'Completed'),
(10, 6, 83, '8', 0, 'John Robert Onio', 'Impacted Tooth', 'Composite Filling', 'Im', 'Co', 2000, '2022-04-05', ' ', ' ', ' ', ' ', ' ', '1', ' ', '1', ' ', ' ', '', 'Planned');

-- --------------------------------------------------------

--
-- Table structure for table `dental_duplicate`
--

CREATE TABLE `dental_duplicate` (
  `id` int(50) NOT NULL,
  `ref_no` int(50) NOT NULL,
  `patient_id` int(50) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_tbl`
--

CREATE TABLE `doctor_tbl` (
  `doctor_id` int(9) NOT NULL,
  `doctor_img` varchar(55) NOT NULL,
  `doctor_fullname` varchar(55) NOT NULL,
  `clinic_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_tbl`
--

INSERT INTO `doctor_tbl` (`doctor_id`, `doctor_img`, `doctor_fullname`, `clinic_id`) VALUES
(1, 'ortho.jpg', 'joshua malubay', '5'),
(2, 'logo2.png', 'dawdwa dawd', ''),
(3, 'hero-logo.png', 'ngiti ngiti', '5'),
(4, 'test-2.jpg', 'eyy wang', '5'),
(5, '4 - fbi hasbulla.jpg', 'ywo ywo', '5'),
(6, 'Nery, Gerie Mae F..jpeg', 'Gerie Mae Nery', '3'),
(7, 'mabelle.jpg', 'Mabelle Montoya', '3'),
(8, 'ydio.jpg', 'Aileen Ydio', '3');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(50) NOT NULL,
  `picture` varchar(150) NOT NULL,
  `clinic_id` int(50) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `rate` varchar(5) NOT NULL,
  `feedback` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `picture`, `clinic_id`, `patient_name`, `doctor_name`, `service_name`, `rate`, `feedback`) VALUES
(1, '', 0, 'Francis Urna', 'Francis Urna', '', '', 'wwwwwww'),
(2, '', 0, 'Francis Urna', 'Dr. Francis Urna', 'Oral Prophylaxis', '', 'hahahahahahahahaha'),
(3, '4 - fbi hasbulla.jpg', 3, 'Francis Urna', '', '', '5', 'Gg'),
(4, '276974377_1441074429641354_5167622902671060371_n.png', 3, 'Lennon Malubay', '', '', '3', 'wow');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_equipment`
--

CREATE TABLE `inventory_equipment` (
  `Equip_Id` int(50) NOT NULL,
  `Equip_Name` varchar(250) NOT NULL,
  `Requested_Date` date NOT NULL,
  `Date_Defected` date NOT NULL,
  `Quantity` varchar(50) NOT NULL,
  `status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_equipment`
--

INSERT INTO `inventory_equipment` (`Equip_Id`, `Equip_Name`, `Requested_Date`, `Date_Defected`, `Quantity`, `status`) VALUES
(1, 'Driller', '2022-01-06', '2022-01-31', '5', 'ACTIVE'),
(2, 'Dental Chair Headrest', '2022-01-01', '2021-06-30', '2', 'ACTIVE'),
(3, 'Dental Trolley ', '2022-01-25', '2021-12-24', '3', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_medicine`
--

CREATE TABLE `inventory_medicine` (
  `Med_Id` int(50) NOT NULL,
  `Med_Name` varchar(250) NOT NULL,
  `Quantity` varchar(50) NOT NULL,
  `Available_Qty` varchar(50) NOT NULL,
  `Price` varchar(50) NOT NULL,
  `Expiry_date` date NOT NULL,
  `Requested_date` date NOT NULL,
  `status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_medicine`
--

INSERT INTO `inventory_medicine` (`Med_Id`, `Med_Name`, `Quantity`, `Available_Qty`, `Price`, `Expiry_date`, `Requested_date`, `status`) VALUES
(1, 'Tylenol', '30', '', '100', '2022-01-27', '2022-01-04', 'ACTIVE'),
(2, 'Advil', '100', '', '50', '2022-01-30', '2022-01-12', 'ACTIVE'),
(3, 'Bayer', '173', '', '200', '2024-06-19', '2022-01-25', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `loginlogs`
--

CREATE TABLE `loginlogs` (
  `id` int(11) NOT NULL,
  `IpAddress` varbinary(16) NOT NULL,
  `TryTime` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginlogs`
--

INSERT INTO `loginlogs` (`id`, `IpAddress`, `TryTime`) VALUES
(0, 0x3a3a31, 1648763076),
(0, 0x3a3a31, 1648763088),
(0, 0x3a3a31, 1648763090),
(0, 0x3a3a31, 1648763150),
(0, 0x3a3a31, 1648763157),
(0, 0x3a3a31, 1648763158),
(0, 0x3a3a31, 1648763159),
(0, 0x3a3a31, 1648763346),
(0, 0x3a3a31, 1648763348),
(0, 0x3a3a31, 1648763350),
(0, 0x3a3a31, 1648763353),
(0, 0x3a3a31, 1648764021),
(0, 0x3a3a31, 1648764022),
(0, 0x3a3a31, 1648764023),
(0, 0x3a3a31, 1648764024),
(0, 0x3a3a31, 1648764184),
(0, 0x3a3a31, 1648764186),
(0, 0x3a3a31, 1648764186),
(0, 0x3a3a31, 1648764188),
(0, 0x3a3a31, 1648764467),
(0, 0x3a3a31, 1648764470),
(0, 0x3a3a31, 1648764471),
(0, 0x3a3a31, 1648764819),
(0, 0x3a3a31, 1648764821),
(0, 0x3a3a31, 1648764821),
(0, 0x3a3a31, 1648765167),
(0, 0x3a3a31, 1648765170),
(0, 0x3a3a31, 1648765172),
(0, 0x3a3a31, 1648765258),
(0, 0x3a3a31, 1648765261),
(0, 0x3a3a31, 1648765263),
(0, 0x3a3a31, 1648765419),
(0, 0x3a3a31, 1648765421),
(0, 0x3a3a31, 1648765423),
(0, 0x3a3a31, 1648782551),
(0, 0x3a3a31, 1648782644),
(0, 0x3a3a31, 1648803361),
(0, 0x3a3a31, 1648803377),
(0, 0x3a3a31, 1648813454),
(0, 0x3a3a31, 1648813469),
(0, 0x3a3a31, 1648813655),
(0, 0x3a3a31, 1648813673),
(0, 0x3a3a31, 1648818072),
(0, 0x3a3a31, 1648818085),
(0, 0x3a3a31, 1648818116),
(0, 0x3a3a31, 1649065816),
(0, 0x3a3a31, 1649065846),
(0, 0x3a3a31, 1649065853),
(0, 0x3a3a31, 1649069735),
(0, 0x3a3a31, 1649083321),
(0, 0x3a3a31, 1649083713),
(0, 0x3a3a31, 1649084384),
(0, 0x3a3a31, 1649087297),
(0, 0x3a3a31, 1649130193),
(0, 0x3a3a31, 1649130210),
(0, 0x3a3a31, 1649130231),
(0, 0x3a3a31, 1649130239),
(0, 0x3a3a31, 1649130246),
(0, 0x3a3a31, 1649130248),
(0, 0x3a3a31, 1649130269),
(0, 0x3a3a31, 1649130275),
(0, 0x3a3a31, 1649130276),
(0, 0x3a3a31, 1649130276),
(0, 0x3a3a31, 1649130277),
(0, 0x3a3a31, 1649130277),
(0, 0x3a3a31, 1649130278),
(0, 0x3a3a31, 1649130563),
(0, 0x3a3a31, 1649130569),
(0, 0x3a3a31, 1649130580),
(0, 0x3a3a31, 1649130587),
(0, 0x3a3a31, 1649130588),
(0, 0x3a3a31, 1649130589),
(0, 0x3a3a31, 1649130590),
(0, 0x3a3a31, 1649130590),
(0, 0x3a3a31, 1649130592),
(0, 0x3a3a31, 1649130594),
(0, 0x3a3a31, 1649130598),
(0, 0x3a3a31, 1649130598),
(0, 0x3a3a31, 1649130598),
(0, 0x3a3a31, 1649130598),
(0, 0x3a3a31, 1649130598),
(0, 0x3a3a31, 1649130599),
(0, 0x3a3a31, 1649130599),
(0, 0x3a3a31, 1649130599),
(0, 0x3a3a31, 1649130600),
(0, 0x3a3a31, 1649130608),
(0, 0x3a3a31, 1649130794),
(0, 0x3a3a31, 1649130797),
(0, 0x3a3a31, 1649130947),
(0, 0x3a3a31, 1649130950),
(0, 0x3a3a31, 1649130954),
(0, 0x3a3a31, 1649130956),
(0, 0x3a3a31, 1649130957),
(0, 0x3a3a31, 1649130958),
(0, 0x3a3a31, 1649130958),
(0, 0x3a3a31, 1649130959),
(0, 0x3a3a31, 1649130959),
(0, 0x3a3a31, 1649130960),
(0, 0x3a3a31, 1649130960),
(0, 0x3a3a31, 1649130961),
(0, 0x3a3a31, 1649130961),
(0, 0x3a3a31, 1649130961),
(0, 0x3a3a31, 1649130961),
(0, 0x3a3a31, 1649130961),
(0, 0x3a3a31, 1649130962),
(0, 0x3a3a31, 1649130962),
(0, 0x3a3a31, 1649130962),
(0, 0x3a3a31, 1649130962),
(0, 0x3a3a31, 1649130963),
(0, 0x3a3a31, 1649130963),
(0, 0x3a3a31, 1649130963),
(0, 0x3a3a31, 1649130963),
(0, 0x3a3a31, 1649130963),
(0, 0x3a3a31, 1649131000),
(0, 0x3a3a31, 1649132703),
(0, 0x3a3a31, 1649132934),
(0, 0x3a3a31, 1649136662),
(0, 0x3a3a31, 1649144075),
(0, 0x3a3a31, 1649144079),
(0, 0x3a3a31, 1649144088),
(0, 0x3a3a31, 1649158813),
(0, 0x3a3a31, 1649301273),
(0, 0x3a3a31, 1649301284),
(0, 0x3a3a31, 1649301288),
(0, 0x3a3a31, 1649301587),
(0, 0x3a3a31, 1649367703),
(0, 0x3a3a31, 1649370670),
(0, 0x3a3a31, 1649383036),
(0, 0x3a3a31, 1649383055);

-- --------------------------------------------------------

--
-- Table structure for table `patient_record`
--

CREATE TABLE `patient_record` (
  `patient_id` int(50) NOT NULL,
  `profile_img` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `clinic_id` int(50) NOT NULL,
  `birthdate` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `parent_guardian` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `verification_code` int(255) NOT NULL,
  `status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_record`
--

INSERT INTO `patient_record` (`patient_id`, `profile_img`, `fullname`, `first_name`, `last_name`, `middle_name`, `clinic_id`, `birthdate`, `address`, `parent_guardian`, `age`, `doctor_name`, `service_name`, `password`, `email`, `contactno`, `gender`, `verification_code`, `status`) VALUES
(1, '', 'Juan Gomez', 'Juan', 'Gomez', 'Llano', 0, '1998-07-11', '285 Riverside Ext Unit 4 Baran', 'Chae', '23', '', '', 'Abc_1234', 'owangmalibu@gmail.com', '09123456789', 'male', 0, 'ACTIVE'),
(2, '', 'Rex Santos', 'Rex', 'Santos', 'Dumas', 0, '1999-07-01', '285 Riverside Ext Unit 4 Baran', 'Meng', '22', '', '', 'Abcd_123', 'francis.dumas.urna@gmail.com', '09789945612', 'female', 244526, 'ACTIVE'),
(3, 'onio.jpg', 'Francis Urna', 'Francis', 'Urna', '', 0, '2000-06-01', 'QC', 'mama', '21', '', '', 'Qwerty123', 'cisurna@gmail.com', '09954418463', 'Male', 300876, '2022-04-01 20:33:11'),
(4, 'Nery, Gerie Mae F..jpeg', 'joshua Malubay', 'joshua', 'Malubay', '', 0, '1997-07-11', 'Riverside Ext Unit 4 brgy Commonwealth QC', 'momo', '24', '', '', 'Owangpogi123', 'joshuamalubaymcmxcix@gmail.com', '09202297929', 'Male', 261396, '2022-04-04 18:29:00'),
(5, '276974377_1441074429641354_5167622902671060371_n.png', 'Lennon Malubay', 'Lennon', 'Malubay', '', 0, '2010-07-07', 'QC', 'Lorna', '11', '', '', 'Gonzales2', 'greennoe7@gmail.com', '0994421333', 'Male', 315504, '2022-04-04 20:12:14'),
(6, 'placeholder.png', 'John Robert Onio', 'John Robert', 'Onio', '', 0, '2022-03-27', 'QC', 'Momo', '0', '', '', 'Qwerty123', 'lennonbartolome26@gmail.com', '09876543213', 'Male', 193367, '2022-04-05 12:03:59'),
(9, 'placeholder.png', 'Arnulfo Malubay', 'Arnulfo', 'Malubay', '', 0, '1999-07-11', 'Riverside', 'Mhae', '22', '', '', 'Owang123', 'joshua.malubay07111999@gmail.com', '0994421333', 'Male', 349067, '2022-04-08 04:14:01'),
(10, 'placeholder.png', 'Arnulfo Malubay', 'Arnulfo', 'Malubay', '', 0, '1999-07-11', 'Riverside', 'Nery', '22', '', '', 'Owang123', 'zellymalatek@gmail.com', '0994421333', 'Male', 253005, '2022-04-08 04:31:12'),
(11, 'placeholder.png', 'Arnulfo Malubay', 'Arnulfo', 'Malubay', '', 0, '1999-09-11', 'Riverside', 'Joshua Urna', '22', '', '', 'Owang123', 'joshuamalubay.rater@gmail.com', '0994421333', 'Male', 457278, '2022-04-08 04:37:21');

-- --------------------------------------------------------

--
-- Table structure for table `pending_appointments`
--

CREATE TABLE `pending_appointments` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(50) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactno` varchar(50) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `note` varchar(255) NOT NULL,
  `appointment_datentime` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prescription_list`
--

CREATE TABLE `prescription_list` (
  `prescription_id` int(50) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `note` varchar(255) NOT NULL,
  `meds` varchar(50) NOT NULL,
  `frequency` varchar(50) NOT NULL,
  `dosage` varchar(50) NOT NULL,
  `durationunit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription_list`
--

INSERT INTO `prescription_list` (`prescription_id`, `patient_name`, `doctor_name`, `note`, `meds`, `frequency`, `dosage`, `durationunit`) VALUES
(1, 'wang wang', 'Joshua Malubay', 'Urgent', 'Tylenol ', '3', '3mg', ''),
(2, 'Hermar Garcia', 'Lennon Bartolome', 'Important', 'Tylenol ', '3', '2mg', '');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `patient_id` int(100) NOT NULL,
  `question_one` varchar(50) NOT NULL,
  `question_two` varchar(50) NOT NULL,
  `input_two` varchar(50) NOT NULL,
  `question_three` varchar(50) NOT NULL,
  `input_three` varchar(50) NOT NULL,
  `question_four` varchar(50) NOT NULL,
  `input_four` varchar(50) NOT NULL,
  `question_five` varchar(50) NOT NULL,
  `input_five` varchar(50) NOT NULL,
  `question_six` varchar(50) NOT NULL,
  `question_seven` varchar(50) NOT NULL,
  `question_eight` varchar(50) NOT NULL,
  `input_eight` varchar(255) NOT NULL,
  `question_nine` varchar(50) NOT NULL,
  `input_nine` varchar(50) NOT NULL,
  `question_ten` varchar(50) NOT NULL,
  `question_eleven` varchar(50) NOT NULL,
  `question_twelve` varchar(50) NOT NULL,
  `question_thirteen` varchar(50) NOT NULL,
  `question_fourteen` varchar(50) NOT NULL,
  `question_fifteen` varchar(255) NOT NULL,
  `input_fifteen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`patient_id`, `question_one`, `question_two`, `input_two`, `question_three`, `input_three`, `question_four`, `input_four`, `question_five`, `input_five`, `question_six`, `question_seven`, `question_eight`, `input_eight`, `question_nine`, `input_nine`, `question_ten`, `question_eleven`, `question_twelve`, `question_thirteen`, `question_fourteen`, `question_fifteen`, `input_fifteen`) VALUES
(1, 'Yes', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', 'Yes', 'Penicillin, Antibiotics,', '', 'Yes', '', 'Yes', 'Yes', 'Yes', '', '', '', ''),
(2, 'Yes', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', 'Yes', '', '', 'Yes', '', '', '', '', '', '', '', ''),
(3, 'Yes', 'No', '', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', 'Yes', '', '', 'Yes', '', '', '', '', '', '', '', ''),
(4, 'Yes', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', 'Yes', '', '', 'Yes', '', '', '', '', '', '', '', ''),
(5, 'Yes', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', 'Yes', '', '', 'No', '', 'No', 'No', 'No', '', '', '', ''),
(6, ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
(7, '', '', '', '', '', '', '', '', '', '', '', ' ', '', '', '', '', '', '', '', '', ' ', ''),
(8, 'Yes', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', 'Yes', '', '', 'Yes', '', 'Yes', 'Yes', 'Yes', '', '', '', ''),
(9, 'Yes', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', 'Yes', '', '', 'Yes', '', 'Yes', 'Yes', 'Yes', '', '', '', ''),
(10, 'Yes', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', 'Yes', '', '', 'Yes', '', 'Yes', 'Yes', 'Yes', '', '', '', ''),
(11, 'Yes', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', 'Yes', '', '', 'Yes', '', 'Yes', 'Yes', 'Yes', '', '', '', ''),
(12, 'Yes', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', 'Yes', '', '', 'Yes', '', 'Yes', 'Yes', 'Yes', '', '', '', ''),
(13, 'Yes', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', 'Yes', '', '', 'Yes', '', 'Yes', 'Yes', 'Yes', '', '', '', ''),
(14, 'Yes', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', 'Yes', '', '', 'Yes', '', 'Yes', 'Yes', 'Yes', '', '', '', ''),
(15, 'Yes', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', 'Yes', '', '', 'Yes', '', 'Yes', 'Yes', 'Yes', '', '', '', ''),
(16, ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
(17, 'Yes', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', 'Yes', '', '', 'Yes', '', '', '', '', '', '', '', ''),
(18, 'Yes', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', 'Yes', '', '', 'Yes', '', '', '', '', '', '', '', ''),
(19, 'Yes', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', 'Yes', '', '', 'Yes', '', '', '', '', '', '', '', ''),
(20, 'Yes', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', 'Yes', '', '', 'Yes', '', '', '', '', '', '', '', ''),
(21, 'Yes', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', 'Yes', '', '', 'Yes', '', 'Yes', 'Yes', 'Yes', '', '', '', ''),
(22, 'Yes', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', 'Yes', '', '', 'Yes', '', 'Yes', 'Yes', 'Yes', '', '', '', ''),
(23, 'Yes', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', 'Yes', '', '', 'Yes', '', 'Yes', 'Yes', 'Yes', '', '', '', ''),
(24, 'Yes', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', 'Yes', '', '', 'Yes', '', '', '', '', '', '', '', ''),
(25, 'Yes', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', 'Yes', '', '', 'Yes', '', '', '', '', '', '', '', ''),
(26, ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
(27, 'Yes', 'No', '', 'Yes', '', 'No', '', 'Yes', '', 'Yes', 'No', '', '', 'Yes', '', 'No', 'No', 'No', '', '', '', ''),
(28, 'No', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', 'Yes', '', '', 'No', '', '', '', '', '', '', '', ''),
(29, ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
(30, ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
(31, ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
(32, ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
(33, ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
(34, ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
(35, ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `restotbl`
--

CREATE TABLE `restotbl` (
  `id` int(11) NOT NULL,
  `pro_legend` varchar(50) NOT NULL,
  `t_procedure` varchar(150) NOT NULL,
  `price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restotbl`
--

INSERT INTO `restotbl` (`id`, `pro_legend`, `t_procedure`, `price`) VALUES
(1, 'Am', 'Amaigam Filling', '1000'),
(2, 'Co', 'Composite Filling', '2000'),
(3, 'JC', 'Jacket Crown', '1000'),
(4, 'Ab', 'Abutment', '1000'),
(12, 'Att', 'Attachment', '1000'),
(13, 'P', 'Pontic', '1000'),
(14, 'In', 'Inlay', '1000'),
(15, 'Imp', 'Implant', '1000'),
(16, 'Rm', 'Removable Dentures', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(55) NOT NULL,
  `sale_name` varchar(55) NOT NULL,
  `sale_quantity` int(55) NOT NULL,
  `sale_price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `sale_name`, `sale_quantity`, `sale_price`) VALUES
(1, '50 ', 1, 50),
(2, '50  Advil', 1, 50),
(3, '200 | Bayer', 1, 200),
(4, '50 - Advil', 60, 3000),
(5, '50 - Advil', 50, 2500),
(6, '50 - Advil', 50, 2500),
(7, '50 - Advil', 50, 2500),
(8, '100 - Tylenol', 2, 200),
(9, '100 - Tylenol', 2, 200),
(10, '50 - Advil', 30, 1500),
(11, '50 - Advil', 2, 100),
(12, '50 - Advil', 50, 2500),
(13, '50 - Advil', 50, 2500),
(14, '50 - Advil', 2, 100),
(15, '50 - Advil', 50, 2500),
(16, '50 - Advil', 50, 2500),
(17, '200 - Bayer', 50, 10000),
(18, '50 - Advil', 25, 1250),
(19, '50 - Advil', 25, 1250),
(20, '50 - Advil', 50, 2500),
(21, '50 - Advil', 25, 1250),
(22, '100 - Tylenol', 25, 2500),
(23, '50 - Advil', 50, 2500),
(24, '100 - Tylenol', 20, 2000),
(25, '100 - Tylenol', 2, 200),
(26, '50 - Advil', 50, 2500),
(27, '50 - Advil', 25, 1250);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(50) NOT NULL,
  `service_name` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `service_des` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `service_type` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `price` int(50) DEFAULT NULL,
  `clinic_id` int(50) NOT NULL,
  `status` varchar(55) CHARACTER SET utf8mb4 DEFAULT NULL,
  `estimated_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_des`, `service_type`, `price`, `clinic_id`, `status`, `estimated_time`) VALUES
(1, 'ortho1', '', 'Orthodontics', 0, 72, '', '00:30:00'),
(2, 'ortho5', '', 'Orthodontics', 0, 72, '', '01:00:00'),
(3, 'pedia2', '', 'Pediatric', 0, 72, '', '01:00:00'),
(4, 'ortho1', '', 'Orthodontics', 0, 72, '', '00:30:00'),
(5, 'ortho5', '', 'Orthodontics', 0, 72, '', '01:00:00'),
(6, 'pedia2', '', 'Pediatric', 0, 72, '', '01:00:00'),
(7, 'ortho4', NULL, 'Orthodontics', NULL, 78, NULL, '01:30:00'),
(8, 'ortho5', NULL, 'Orthodontics', NULL, 78, NULL, '02:30:00'),
(9, 'ortho6', NULL, 'Orthodontics', NULL, 78, NULL, '02:30:00'),
(10, 'pedia4', NULL, 'Pediatrics', NULL, 78, NULL, '02:00:00'),
(11, 'pedia5', NULL, 'Pediatrics', NULL, 78, NULL, '02:00:00'),
(12, 'pedia6', NULL, 'Pediatrics', NULL, 78, NULL, '02:00:00'),
(13, 'dent4', NULL, 'Dentist', NULL, 78, NULL, '01:00:00'),
(14, 'dent5', NULL, 'Dentist', NULL, 78, NULL, '01:00:00'),
(15, 'dent6', NULL, 'Dentist', NULL, 78, NULL, '01:00:00'),
(16, 'ortho1', NULL, 'Orthodontics', NULL, 79, NULL, '00:30:00'),
(17, 'ortho2', NULL, 'Orthodontics', NULL, 79, NULL, '01:00:00'),
(18, 'ortho3', NULL, 'Orthodontics', NULL, 79, NULL, '01:00:00'),
(19, 'Retainers', NULL, 'Orthodontics', NULL, 80, NULL, '01:00:00'),
(20, 'Fluoride Therapy', NULL, 'Pediatric', NULL, 80, NULL, '01:00:00'),
(21, 'Pulp Treatment', NULL, 'Pediatric', NULL, 80, NULL, '01:00:00'),
(22, 'Dentist Consultation', NULL, 'Dentist', NULL, 81, NULL, '00:30:00'),
(23, 'Tooth Extraction', NULL, 'Dentist', NULL, 81, NULL, '00:30:00'),
(24, 'Preventive Sealants', NULL, 'Pediatric', NULL, 82, NULL, '01:00:00'),
(25, 'Pulp Treatment', NULL, 'Pediatric', NULL, 82, NULL, '01:00:00'),
(26, 'Prophylaxis and oral protectors', NULL, 'Dentist', NULL, 82, NULL, '01:00:00'),
(27, 'Dental crowns', NULL, 'Dentist', NULL, 82, NULL, '01:00:00'),
(28, 'Palatal Expanders', NULL, 'Orthodontics', NULL, 83, NULL, '01:00:00'),
(29, 'Oral Prophylaxis', NULL, 'Pediatric', NULL, 83, NULL, '00:30:00'),
(30, 'Tooth Fillings', NULL, 'Pediatric', NULL, 83, NULL, '01:00:00'),
(31, 'Overcrowded and Misaligned Teeth', NULL, 'Orthodontics', NULL, 84, NULL, '00:30:00'),
(32, 'Palatal Expanders', NULL, 'Orthodontics', NULL, 84, NULL, '01:00:00'),
(33, 'Oral Prophylaxis', NULL, 'Pediatric', NULL, 84, NULL, '00:30:00'),
(34, 'Pulp Treatment', NULL, 'Pediatric', NULL, 85, NULL, '01:00:00'),
(35, 'Prophylaxis and oral protectors', NULL, 'Dentist', NULL, 85, NULL, '01:00:00'),
(36, 'Cavity fillings', NULL, 'Dentist', NULL, 85, NULL, '01:00:00'),
(37, 'Dental crowns', NULL, 'Dentist', NULL, 85, NULL, '01:00:00'),
(38, 'Lip and Cheek Bumpers', NULL, 'Orthodontics', NULL, 87, NULL, '01:00:00'),
(39, 'Metal braces', NULL, 'Orthodontics', NULL, 87, NULL, '00:30:00'),
(40, 'Preventive Sealants', NULL, 'Pediatric', NULL, 87, NULL, '01:00:00'),
(41, 'Pulp Treatment', NULL, 'Pediatric', NULL, 87, NULL, '01:00:00'),
(42, 'Gingivectomy', NULL, 'Dentist', NULL, 87, NULL, '01:00:00'),
(43, 'Overcrowded and Misaligned Teeth', NULL, 'Orthodontics', NULL, 88, NULL, '00:30:00'),
(44, 'Treating Malocclusions', NULL, 'Orthodontics', NULL, 88, NULL, '01:00:00'),
(45, 'Lip and Cheek Bumpers', NULL, 'Orthodontics', NULL, 88, NULL, '01:00:00'),
(46, 'Preventive Sealants', NULL, 'Pediatric', NULL, 89, NULL, '01:00:00'),
(47, 'Crowns', NULL, 'Pediatric', NULL, 89, NULL, '00:30:00'),
(48, 'Prophylaxis and oral protectors', NULL, 'Dentist', NULL, 89, NULL, '01:00:00'),
(49, 'Dental crowns', NULL, 'Dentist', NULL, 89, NULL, '01:00:00'),
(50, 'Overcrowded and Misaligned Teeth', NULL, 'Orthodontics', NULL, 90, NULL, '00:30:00'),
(51, 'Palatal Expanders', NULL, 'Orthodontics', NULL, 90, NULL, '01:00:00'),
(52, 'Oral Prophylaxis', NULL, 'Pediatric', NULL, 90, NULL, '00:30:00'),
(53, 'Tooth Fillings', NULL, 'Pediatric', NULL, 90, NULL, '01:00:00'),
(54, 'Treating Malocclusions', NULL, 'Orthodontics', NULL, 91, NULL, '01:00:00'),
(55, 'Lip and Cheek Bumpers', NULL, 'Orthodontics', NULL, 92, NULL, '01:00:00'),
(56, 'Metal braces', NULL, 'Orthodontics', NULL, 92, NULL, '00:30:00'),
(57, 'Treating Malocclusions', NULL, 'Orthodontics', NULL, 93, NULL, '01:00:00'),
(58, 'Retainers', NULL, 'Orthodontics', NULL, 93, NULL, '01:00:00'),
(59, 'O', NULL, 'v', NULL, 94, NULL, '00:00:00'),
(60, 'T', NULL, 'r', NULL, 94, NULL, '00:00:00'),
(61, 'n', NULL, 'u', NULL, 94, NULL, '00:00:00'),
(62, 'n', NULL, 'u', NULL, 94, NULL, '00:00:00'),
(63, 'n', NULL, 'u', NULL, 94, NULL, '00:00:00'),
(64, 'n', NULL, 'u', NULL, 94, NULL, '00:00:00'),
(65, 'n', NULL, 'u', NULL, 94, NULL, '00:00:00'),
(66, 'n', NULL, 'u', NULL, 94, NULL, '00:00:00'),
(67, 'P', NULL, 'r', NULL, 94, NULL, '00:00:00'),
(68, 'n', NULL, 'u', NULL, 94, NULL, '00:00:00'),
(69, 'n', NULL, 'u', NULL, 94, NULL, '00:00:00'),
(70, 'P', NULL, 'u', NULL, 94, NULL, '00:00:00'),
(71, 'n', NULL, 'u', NULL, 94, NULL, '00:00:00'),
(72, 'n', NULL, 'u', NULL, 94, NULL, '00:00:00'),
(73, 'n', NULL, 'u', NULL, 94, NULL, '00:00:00'),
(74, 'n', NULL, 'u', NULL, 94, NULL, '00:00:00'),
(75, 'n', NULL, 'u', NULL, 94, NULL, '00:00:00'),
(76, 'n', NULL, 'u', NULL, 94, NULL, '00:00:00'),
(77, 'n', NULL, 'u', NULL, 95, NULL, '00:00:00'),
(78, 'n', NULL, 'u', NULL, 95, NULL, '00:00:00'),
(79, 'n', NULL, 'u', NULL, 95, NULL, '00:00:00'),
(80, 'n', NULL, 'u', NULL, 95, NULL, '00:00:00'),
(81, 'n', NULL, 'u', NULL, 95, NULL, '00:00:00'),
(82, 'n', NULL, 'u', NULL, 95, NULL, '00:00:00'),
(83, 'n', NULL, 'u', NULL, 95, NULL, '00:00:00'),
(84, 'n', NULL, 'u', NULL, 95, NULL, '00:00:00'),
(85, 'n', NULL, 'u', NULL, 95, NULL, '00:00:00'),
(86, 'T', NULL, 'o', NULL, 95, NULL, '00:00:00'),
(87, 'C', NULL, 'r', NULL, 95, NULL, '00:00:00'),
(88, 'n', NULL, 'u', NULL, 95, NULL, '00:00:00'),
(89, 'n', NULL, 'u', NULL, 95, NULL, '00:00:00'),
(90, 'n', NULL, 'u', NULL, 95, NULL, '00:00:00'),
(91, 'n', NULL, 'u', NULL, 95, NULL, '00:00:00'),
(92, 'n', NULL, 'u', NULL, 95, NULL, '00:00:00'),
(93, 'n', NULL, 'u', NULL, 95, NULL, '00:00:00'),
(94, 'n', NULL, 'u', NULL, 95, NULL, '00:00:00'),
(95, 'n', NULL, 'u', NULL, 96, NULL, '00:00:00'),
(96, 'n', NULL, 'u', NULL, 96, NULL, '00:00:00'),
(97, 'L', NULL, 'i', NULL, 96, NULL, '00:00:00'),
(98, 'n', NULL, 'u', NULL, 96, NULL, '00:00:00'),
(99, 'n', NULL, 'u', NULL, 96, NULL, '00:00:00'),
(100, 'n', NULL, 'u', NULL, 96, NULL, '00:00:00'),
(101, 'n', NULL, 'u', NULL, 96, NULL, '00:00:00'),
(102, 'n', NULL, 'u', NULL, 96, NULL, '00:00:00'),
(103, 'n', NULL, 'u', NULL, 96, NULL, '00:00:00'),
(104, 'n', NULL, 'u', NULL, 96, NULL, '00:00:00'),
(105, 'n', NULL, 'u', NULL, 96, NULL, '00:00:00'),
(106, 'n', NULL, 'u', NULL, 96, NULL, '00:00:00'),
(107, 'n', NULL, 'u', NULL, 96, NULL, '00:00:00'),
(108, 'n', NULL, 'u', NULL, 96, NULL, '00:00:00'),
(109, 'n', NULL, 'u', NULL, 96, NULL, '00:00:00'),
(110, 'n', NULL, 'u', NULL, 96, NULL, '00:00:00'),
(111, 'n', NULL, 'u', NULL, 96, NULL, '00:00:00'),
(112, 'n', NULL, 'u', NULL, 96, NULL, '00:00:00'),
(113, 'n', NULL, 'u', NULL, 97, NULL, '00:00:00'),
(114, 'n', NULL, 'u', NULL, 97, NULL, '00:00:00'),
(115, 'n', NULL, 'u', NULL, 97, NULL, '00:00:00'),
(116, 'n', NULL, 'u', NULL, 97, NULL, '00:00:00'),
(117, 'n', NULL, 'u', NULL, 97, NULL, '00:00:00'),
(118, 'n', NULL, 'u', NULL, 97, NULL, '00:00:00'),
(119, 'n', NULL, 'u', NULL, 97, NULL, '00:00:00'),
(120, 'n', NULL, 'u', NULL, 97, NULL, '00:00:00'),
(121, 'n', NULL, 'u', NULL, 97, NULL, '00:00:00'),
(122, 'n', NULL, 'u', NULL, 97, NULL, '00:00:00'),
(123, 'n', NULL, 'u', NULL, 97, NULL, '00:00:00'),
(124, 'n', NULL, 'u', NULL, 97, NULL, '00:00:00'),
(125, 'n', NULL, 'u', NULL, 97, NULL, '00:00:00'),
(126, 'n', NULL, 'u', NULL, 97, NULL, '00:00:00'),
(127, 'n', NULL, 'u', NULL, 97, NULL, '00:00:00'),
(128, 'n', NULL, 'u', NULL, 97, NULL, '00:00:00'),
(129, 'n', NULL, 'u', NULL, 97, NULL, '00:00:00'),
(130, 'T', NULL, 'o', NULL, 97, NULL, '00:00:00'),
(131, 'n', NULL, 'u', NULL, 98, NULL, '00:00:00'),
(132, 'n', NULL, 'u', NULL, 98, NULL, '00:00:00'),
(133, 'n', NULL, 'u', NULL, 98, NULL, '00:00:00'),
(134, 'n', NULL, 'u', NULL, 98, NULL, '00:00:00'),
(135, 'n', NULL, 'u', NULL, 98, NULL, '00:00:00'),
(136, 'n', NULL, 'u', NULL, 98, NULL, '00:00:00'),
(137, 'n', NULL, 'u', NULL, 98, NULL, '00:00:00'),
(138, 'n', NULL, 'u', NULL, 98, NULL, '00:00:00'),
(139, 'n', NULL, 'u', NULL, 98, NULL, '00:00:00'),
(140, 'n', NULL, 'u', NULL, 98, NULL, '00:00:00'),
(141, 'n', NULL, 'u', NULL, 98, NULL, '00:00:00'),
(142, 'P', NULL, 'u', NULL, 98, NULL, '00:00:00'),
(143, 'n', NULL, 'u', NULL, 98, NULL, '00:00:00'),
(144, 'n', NULL, 'u', NULL, 98, NULL, '00:00:00'),
(145, 'G', NULL, 'i', NULL, 98, NULL, '00:00:00'),
(146, 'n', NULL, 'u', NULL, 98, NULL, '00:00:00'),
(147, 'n', NULL, 'u', NULL, 98, NULL, '00:00:00'),
(148, 'n', NULL, 'u', NULL, 98, NULL, '00:00:00'),
(149, 'O', NULL, 'v', NULL, 99, NULL, '00:00:00'),
(150, 'T', NULL, 'r', NULL, 99, NULL, '00:00:00'),
(151, 'n', NULL, 'u', NULL, 99, NULL, '00:00:00'),
(152, 'n', NULL, 'u', NULL, 99, NULL, '00:00:00'),
(153, 'n', NULL, 'u', NULL, 99, NULL, '00:00:00'),
(154, 'n', NULL, 'u', NULL, 99, NULL, '00:00:00'),
(155, 'n', NULL, 'u', NULL, 99, NULL, '00:00:00'),
(156, 'n', NULL, 'u', NULL, 99, NULL, '00:00:00'),
(157, 'n', NULL, 'u', NULL, 99, NULL, '00:00:00'),
(158, 'n', NULL, 'u', NULL, 99, NULL, '00:00:00'),
(159, 'n', NULL, 'u', NULL, 99, NULL, '00:00:00'),
(160, 'n', NULL, 'u', NULL, 99, NULL, '00:00:00'),
(161, 'n', NULL, 'u', NULL, 99, NULL, '00:00:00'),
(162, 'n', NULL, 'u', NULL, 99, NULL, '00:00:00'),
(163, 'n', NULL, 'u', NULL, 99, NULL, '00:00:00'),
(164, 'n', NULL, 'u', NULL, 99, NULL, '00:00:00'),
(165, 'n', NULL, 'u', NULL, 99, NULL, '00:00:00'),
(166, 'n', NULL, 'u', NULL, 99, NULL, '00:00:00'),
(167, 'n', NULL, 'u', NULL, 100, NULL, '00:00:00'),
(168, 'n', NULL, 'u', NULL, 100, NULL, '00:00:00'),
(169, 'n', NULL, 'u', NULL, 100, NULL, '00:00:00'),
(170, 'n', NULL, 'u', NULL, 100, NULL, '00:00:00'),
(171, 'n', NULL, 'u', NULL, 100, NULL, '00:00:00'),
(172, 'M', NULL, 'e', NULL, 100, NULL, '00:00:00'),
(173, 'n', NULL, 'u', NULL, 100, NULL, '00:00:00'),
(174, 'n', NULL, 'u', NULL, 100, NULL, '00:00:00'),
(175, 'n', NULL, 'u', NULL, 100, NULL, '00:00:00'),
(176, 'n', NULL, 'u', NULL, 100, NULL, '00:00:00'),
(177, 'n', NULL, 'u', NULL, 100, NULL, '00:00:00'),
(178, 'n', NULL, 'u', NULL, 100, NULL, '00:00:00'),
(179, 'n', NULL, 'u', NULL, 100, NULL, '00:00:00'),
(180, 'n', NULL, 'u', NULL, 100, NULL, '00:00:00'),
(181, 'n', NULL, 'u', NULL, 100, NULL, '00:00:00'),
(182, 'n', NULL, 'u', NULL, 100, NULL, '00:00:00'),
(183, 'n', NULL, 'u', NULL, 100, NULL, '00:00:00'),
(184, 'n', NULL, 'u', NULL, 100, NULL, '00:00:00'),
(185, 'n', NULL, 'u', NULL, 101, NULL, '00:00:00'),
(186, 'n', NULL, 'u', NULL, 101, NULL, '00:00:00'),
(187, 'n', NULL, 'u', NULL, 101, NULL, '00:00:00'),
(188, 'n', NULL, 'u', NULL, 101, NULL, '00:00:00'),
(189, 'n', NULL, 'u', NULL, 101, NULL, '00:00:00'),
(190, 'M', NULL, 'e', NULL, 101, NULL, '00:00:00'),
(191, 'n', NULL, 'u', NULL, 101, NULL, '00:00:00'),
(192, 'n', NULL, 'u', NULL, 101, NULL, '00:00:00'),
(193, 'n', NULL, 'u', NULL, 101, NULL, '00:00:00'),
(194, 'n', NULL, 'u', NULL, 101, NULL, '00:00:00'),
(195, 'n', NULL, 'u', NULL, 101, NULL, '00:00:00'),
(196, 'n', NULL, 'u', NULL, 101, NULL, '00:00:00'),
(197, 'n', NULL, 'u', NULL, 101, NULL, '00:00:00'),
(198, 'n', NULL, 'u', NULL, 101, NULL, '00:00:00'),
(199, 'n', NULL, 'u', NULL, 101, NULL, '00:00:00'),
(200, 'n', NULL, 'u', NULL, 101, NULL, '00:00:00'),
(201, 'n', NULL, 'u', NULL, 101, NULL, '00:00:00'),
(202, 'n', NULL, 'u', NULL, 101, NULL, '00:00:00'),
(203, 'n', NULL, 'u', NULL, 102, NULL, '00:00:00'),
(204, 'n', NULL, 'u', NULL, 102, NULL, '00:00:00'),
(205, 'L', NULL, 'i', NULL, 102, NULL, '00:00:00'),
(206, 'n', NULL, 'u', NULL, 102, NULL, '00:00:00'),
(207, 'n', NULL, 'u', NULL, 102, NULL, '00:00:00'),
(208, 'n', NULL, 'u', NULL, 102, NULL, '00:00:00'),
(209, 'n', NULL, 'u', NULL, 102, NULL, '00:00:00'),
(210, 'n', NULL, 'u', NULL, 102, NULL, '00:00:00'),
(211, 'n', NULL, 'u', NULL, 102, NULL, '00:00:00'),
(212, 'n', NULL, 'u', NULL, 102, NULL, '00:00:00'),
(213, 'n', NULL, 'u', NULL, 102, NULL, '00:00:00'),
(214, 'n', NULL, 'u', NULL, 102, NULL, '00:00:00'),
(215, 'n', NULL, 'u', NULL, 102, NULL, '00:00:00'),
(216, 'n', NULL, 'u', NULL, 102, NULL, '00:00:00'),
(217, 'n', NULL, 'u', NULL, 102, NULL, '00:00:00'),
(218, 'n', NULL, 'u', NULL, 102, NULL, '00:00:00'),
(219, 'n', NULL, 'u', NULL, 102, NULL, '00:00:00'),
(220, 'n', NULL, 'u', NULL, 102, NULL, '00:00:00'),
(221, 'n', NULL, 'u', NULL, 103, NULL, '00:00:00'),
(222, 'n', NULL, 'u', NULL, 103, NULL, '00:00:00'),
(223, 'n', NULL, 'u', NULL, 103, NULL, '00:00:00'),
(224, 'n', NULL, 'u', NULL, 103, NULL, '00:00:00'),
(225, 'n', NULL, 'u', NULL, 103, NULL, '00:00:00'),
(226, 'n', NULL, 'u', NULL, 103, NULL, '00:00:00'),
(227, 'n', NULL, 'u', NULL, 103, NULL, '00:00:00'),
(228, 'n', NULL, 'u', NULL, 103, NULL, '00:00:00'),
(229, 'P', NULL, 'r', NULL, 103, NULL, '00:00:00'),
(230, 'n', NULL, 'u', NULL, 103, NULL, '00:00:00'),
(231, 'n', NULL, 'u', NULL, 103, NULL, '00:00:00'),
(232, 'n', NULL, 'u', NULL, 103, NULL, '00:00:00'),
(233, 'n', NULL, 'u', NULL, 103, NULL, '00:00:00'),
(234, 'n', NULL, 'u', NULL, 103, NULL, '00:00:00'),
(235, 'n', NULL, 'u', NULL, 103, NULL, '00:00:00'),
(236, 'n', NULL, 'u', NULL, 103, NULL, '00:00:00'),
(237, 'n', NULL, 'u', NULL, 103, NULL, '00:00:00'),
(238, 'n', NULL, 'u', NULL, 103, NULL, '00:00:00'),
(239, 'n', NULL, 'u', NULL, 104, NULL, '00:00:00'),
(240, 'n', NULL, 'u', NULL, 104, NULL, '00:00:00'),
(241, 'n', NULL, 'u', NULL, 104, NULL, '00:00:00'),
(242, 'n', NULL, 'u', NULL, 104, NULL, '00:00:00'),
(243, 'n', NULL, 'u', NULL, 104, NULL, '00:00:00'),
(244, 'M', NULL, 'e', NULL, 104, NULL, '00:00:00'),
(245, 'n', NULL, 'u', NULL, 104, NULL, '00:00:00'),
(246, 'n', NULL, 'u', NULL, 104, NULL, '00:00:00'),
(247, 'n', NULL, 'u', NULL, 104, NULL, '00:00:00'),
(248, 'n', NULL, 'u', NULL, 104, NULL, '00:00:00'),
(249, 'n', NULL, 'u', NULL, 104, NULL, '00:00:00'),
(250, 'n', NULL, 'u', NULL, 104, NULL, '00:00:00'),
(251, 'n', NULL, 'u', NULL, 104, NULL, '00:00:00'),
(252, 'n', NULL, 'u', NULL, 104, NULL, '00:00:00'),
(253, 'n', NULL, 'u', NULL, 104, NULL, '00:00:00'),
(254, 'n', NULL, 'u', NULL, 104, NULL, '00:00:00'),
(255, 'n', NULL, 'u', NULL, 104, NULL, '00:00:00'),
(256, 'n', NULL, 'u', NULL, 104, NULL, '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `branch_id` int(50) NOT NULL,
  `profile_img` varchar(55) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `branch_address` varchar(50) NOT NULL,
  `status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`branch_id`, `profile_img`, `branch_name`, `branch_address`, `status`) VALUES
(1, 'onio.jpg', 'Novaliches Branch', 'San Bartolome, Novaliches, Quezon City', 'INACTIVE'),
(2, 'owang.jpg', 'Riverside Branch', '285 Riverside Ext Unit 4 Barangay Commonwealth', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `user_id` int(50) NOT NULL,
  `profile_img` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `birthdate` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `street` varchar(100) NOT NULL,
  `brgy` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip_code` int(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `verification_code` varchar(55) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`user_id`, `profile_img`, `fullname`, `first_name`, `last_name`, `middle_name`, `birthdate`, `address`, `street`, `brgy`, `city`, `zip_code`, `branch`, `age`, `password`, `email`, `contactno`, `gender`, `user_type`, `verification_code`, `status`) VALUES
(1, 'MALUBAY,JOSHUA2x2.jpg', '', 'Francis', 'Urna', 'Dumas', '2000-08-17', 'QC', '', '', '', 0, 'Novaliches Branch', '21', 'Qwerty123', 'urna@gmail.com', '09954418463', 'Male', 'ClinicAdmin', '', 'ACTIVE'),
(2, 'MALUBAY,JOSHUA2x2.jpg', '', 'Joshua', 'Bartolome', 's', '2022-03-28', 'Quezon City ', '', '', '', 0, 'Riverside Branch', '21', 'Abcd12345', 'cisurna@gmail.com', '0994155126122', 'Male', 'Doctor', '', 'ACTIVE'),
(5, 'MALUBAY,JOSHUA2x2.jpg', '', 'wang', 'Urna', 'Dumas', '2022-04-03', 'Quezon City', '', '', '', 0, 'Novaliches Branch', '21', 'Qwerty123', 'joshua@gmail.com', '0944412313', 'Male', 'Admin', '', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `x_ray`
--

CREATE TABLE `x_ray` (
  `xray_count` int(50) NOT NULL,
  `patient_id` int(50) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `x_ray` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `x_ray`
--

INSERT INTO `x_ray` (`xray_count`, `patient_id`, `patient_name`, `email`, `x_ray`, `date`) VALUES
(1, 8, 'Onio, John Robert ', 'lennonbartolome26@gmail.com', 'logo2.png', '  April 05, 2022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_refno`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `clinic_tbl`
--
ALTER TABLE `clinic_tbl`
  ADD PRIMARY KEY (`clinic_id`);

--
-- Indexes for table `conditiontbl`
--
ALTER TABLE `conditiontbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `control_panel`
--
ALTER TABLE `control_panel`
  ADD PRIMARY KEY (`panel_id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`days_id`),
  ADD KEY `clinic_id` (`clinic_id`);

--
-- Indexes for table `dentalchart`
--
ALTER TABLE `dentalchart`
  ADD PRIMARY KEY (`procedure_id`);

--
-- Indexes for table `dental_duplicate`
--
ALTER TABLE `dental_duplicate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_tbl`
--
ALTER TABLE `doctor_tbl`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_equipment`
--
ALTER TABLE `inventory_equipment`
  ADD PRIMARY KEY (`Equip_Id`);

--
-- Indexes for table `inventory_medicine`
--
ALTER TABLE `inventory_medicine`
  ADD PRIMARY KEY (`Med_Id`);

--
-- Indexes for table `patient_record`
--
ALTER TABLE `patient_record`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `pending_appointments`
--
ALTER TABLE `pending_appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription_list`
--
ALTER TABLE `prescription_list`
  ADD PRIMARY KEY (`prescription_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `restotbl`
--
ALTER TABLE `restotbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `clinic_id` (`clinic_id`);

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `x_ray`
--
ALTER TABLE `x_ray`
  ADD PRIMARY KEY (`xray_count`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_refno` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clinic_tbl`
--
ALTER TABLE `clinic_tbl`
  MODIFY `clinic_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `conditiontbl`
--
ALTER TABLE `conditiontbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `control_panel`
--
ALTER TABLE `control_panel`
  MODIFY `panel_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `days_id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `dentalchart`
--
ALTER TABLE `dentalchart`
  MODIFY `procedure_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dental_duplicate`
--
ALTER TABLE `dental_duplicate`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_tbl`
--
ALTER TABLE `doctor_tbl`
  MODIFY `doctor_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventory_equipment`
--
ALTER TABLE `inventory_equipment`
  MODIFY `Equip_Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inventory_medicine`
--
ALTER TABLE `inventory_medicine`
  MODIFY `Med_Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient_record`
--
ALTER TABLE `patient_record`
  MODIFY `patient_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pending_appointments`
--
ALTER TABLE `pending_appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescription_list`
--
ALTER TABLE `prescription_list`
  MODIFY `prescription_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `patient_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `restotbl`
--
ALTER TABLE `restotbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `branch_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `x_ray`
--
ALTER TABLE `x_ray`
  MODIFY `xray_count` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `days`
--
ALTER TABLE `days`
  ADD CONSTRAINT `days_ibfk_1` FOREIGN KEY (`clinic_id`) REFERENCES `clinic_tbl` (`clinic_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`clinic_id`) REFERENCES `clinic_tbl` (`clinic_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
