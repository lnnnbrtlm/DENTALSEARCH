-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2022 at 05:11 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `branch` varchar(50) NOT NULL,
  `note` varchar(100) NOT NULL,
  `appointment_datentime` date NOT NULL,
  `appointment_time` time NOT NULL,
  `checkin_datentime` datetime DEFAULT NULL,
  `inchair_datentime` datetime NOT NULL,
  `complete_datentime` datetime NOT NULL,
  `cancelled_datentime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_refno`, `patient_id`, `patient_name`, `email`, `doctor_name`, `service_name`, `branch`, `note`, `appointment_datentime`, `appointment_time`, `checkin_datentime`, `inchair_datentime`, `complete_datentime`, `cancelled_datentime`, `status`) VALUES
(1, '1', 'wendy Urna', 'cisurna@gmail.com', 'Joshua Malubay', 'Tooth Extraction', '', 'hahaha', '2022-03-25', '02:54:00', '2022-03-17 11:06:59', '2022-03-17 11:07:06', '2022-03-19 23:19:42', '2022-03-25 18:53:04', 'Completed'),
(39, '2', 'Francis Urna', 'francis.dumas.urna@gmail.com', 'Francis Urna', 'Dental Implants', '', '', '2022-04-07', '06:28:00', '2022-03-20 01:22:24', '2022-03-20 01:22:27', '2022-03-20 01:28:22', '2022-03-25 18:53:04', 'Completed'),
(40, '1', 'wendy Urna', 'cisurna@gmail.com', 'Joshua Malubay', 'Dental Implants', '', 'www', '2022-03-30', '06:30:00', '2022-03-20 02:46:23', '2022-03-20 02:46:29', '2022-03-20 02:51:06', '2022-03-25 18:53:04', 'Completed'),
(41, '1', 'wendy Urna', 'cisurna@gmail.com', 'Joshua Malubay', 'Oral Prophylaxis', '', 'ww', '2022-03-31', '04:40:00', '2022-03-20 01:38:59', '2022-03-20 01:39:01', '2022-03-20 01:39:03', '2022-03-25 18:53:04', 'Completed'),
(42, '2', 'Francis Urna', 'francis.dumas.urna@gmail.com', 'Francis Urna', 'Oral Prophylaxis', '', 's', '2022-04-03', '05:45:00', '2022-03-20 01:40:11', '2022-03-20 01:40:13', '2022-03-20 01:40:16', '2022-03-25 18:53:04', 'Completed'),
(43, '1', 'wendy Urna', 'cisurna@gmail.com', 'Francis Urna', 'Orthodontics', '', '', '2022-04-01', '06:55:00', '2022-03-20 01:49:43', '2022-03-20 01:49:46', '2022-03-20 01:49:47', '2022-03-25 18:53:04', 'Completed'),
(44, '2', 'Francis Urna', 'francis.dumas.urna@gmail.com', 'Francis Urna', 'Oral Prophylaxis', '', 'www', '2022-04-01', '09:10:00', '2022-03-20 03:05:40', '2022-03-20 03:05:43', '2022-03-20 03:05:47', '2022-03-25 18:53:04', 'Cancelled'),
(46, '1', 'wendy Urna', 'cisurna@gmail.com', 'Francis Urna', 'Oral Prophylaxis', '', '', '2022-04-07', '15:40:00', '2022-03-20 14:34:37', '2022-03-20 14:34:43', '0000-00-00 00:00:00', '2022-03-25 18:53:04', 'In-Chair'),
(47, '18', 'Lennon Bartolome', 'lennonbartolome@gmail.com', 'Joshua Malubay', 'Tooth Extraction', 'Main Branch', 'note', '2022-03-18', '00:00:00', '2022-03-27 23:40:46', '2022-03-27 23:57:49', '0000-00-00 00:00:00', '2022-03-25 22:09:06', 'In-Chair'),
(48, '4', 'Joshua Malubay', 'owangmalibu@gmail.com', 'Joshua Malubay', 'Pediatric Dentistry', '', 'yyyyyyyyyyyyyyy', '2022-04-08', '01:30:00', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-03-27 17:39:51', 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `bill_id` int(11) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `ref_no` int(50) NOT NULL,
  `patient_id` int(50) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `doctor` varchar(50) NOT NULL,
  `service` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `mode_of_payment` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`bill_id`, `branch`, `ref_no`, `patient_id`, `patient_name`, `doctor`, `service`, `price`, `mode_of_payment`, `date`, `status`) VALUES
(13, '1', 43, 0, 'wendy Urna', 'Francis Urna', 'Orthodontics', 50000, '', '2022-03-20 01:49:47', 'Unpaid'),
(14, '2', 44, 0, 'Francis Urna', 'Francis Urna', 'Oral Prophylaxis', 2000, '', '2022-03-20 03:05:47', 'Paid'),
(15, '3', 45, 0, 'Francis Urna', 'Francis Urna', 'Consultation', 250, '', '2022-03-20 02:34:07', 'Unpaid');

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
  `homepage_header` varchar(50) NOT NULL,
  `homepage_description` varchar(50) NOT NULL,
  `header_photo` varchar(50) NOT NULL,
  `service_one` varchar(50) NOT NULL,
  `service_two` varchar(50) NOT NULL,
  `service_three` varchar(50) NOT NULL,
  `about_tech_header` varchar(50) NOT NULL,
  `about_tech_description` varchar(50) NOT NULL,
  `about_tech_headerone` varchar(50) NOT NULL,
  `about_tech_description_one` varchar(50) NOT NULL,
  `about_tech_header_two` varchar(50) NOT NULL,
  `about_tech_description_two` varchar(50) NOT NULL,
  `about_tech_header_three` varchar(50) NOT NULL,
  `about_tech_description_three` varchar(50) NOT NULL,
  `faq_one` varchar(50) NOT NULL,
  `faq_one_answer` varchar(50) NOT NULL,
  `faq_two` varchar(50) NOT NULL,
  `faq_two_answer` varchar(50) NOT NULL,
  `faq_three` varchar(50) NOT NULL,
  `faq_three_answer` varchar(50) NOT NULL,
  `aboutus_header` varchar(50) NOT NULL,
  `aboutus_description` varchar(50) NOT NULL,
  `aboutus_photo` varchar(50) NOT NULL,
  `aboutus_founded` varchar(50) NOT NULL,
  `doctor_one` varchar(50) NOT NULL,
  `doctor_two` varchar(50) NOT NULL,
  `doctor_three` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_id`, `homepage_header`, `homepage_description`, `header_photo`, `service_one`, `service_two`, `service_three`, `about_tech_header`, `about_tech_description`, `about_tech_headerone`, `about_tech_description_one`, `about_tech_header_two`, `about_tech_description_two`, `about_tech_header_three`, `about_tech_description_three`, `faq_one`, `faq_one_answer`, `faq_two`, `faq_two_answer`, `faq_three`, `faq_three_answer`, `aboutus_header`, `aboutus_description`, `aboutus_photo`, `aboutus_founded`, `doctor_one`, `doctor_two`, `doctor_three`) VALUES
(1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes');

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
(1, 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', '09:23:58', '23:23:58', 'YES', 'YES', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `dentalchart`
--

CREATE TABLE `dentalchart` (
  `procedure_id` int(50) NOT NULL,
  `ref_no` int(11) NOT NULL,
  `tooth_id` int(50) NOT NULL,
  `patient_id` varchar(50) NOT NULL,
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
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dentalchart`
--

INSERT INTO `dentalchart` (`procedure_id`, `ref_no`, `tooth_id`, `patient_id`, `patient_name`, `t_condition`, `t_procedure`, `con_legend`, `pro_legend`, `price`, `dentaldate`, `bottomright`, `bottomleft`, `leftbottom`, `lefttop`, `topleft`, `topright`, `rightbottom`, `righttop`, `center`, `status`) VALUES
(1, 46, 18, '', 'wendy Urna', 'Missing due to Canes', 'Composite Filling', 'M', 'Co', 2000, '2022-03-28', ' ', ' ', ' ', ' ', ' ', '1', ' ', '1', ' ', 'Planned'),
(2, 46, 17, '', 'wendy Urna', 'Decayed (Canes indicated for Filling)', 'Jacket Crown', 'D', 'JC', 1000, '2022-03-28', ' ', ' ', ' ', ' ', '1', '1', ' ', ' ', ' ', 'Planned'),
(3, 46, 16, '', 'wendy Urna', 'Decayed (Canes indicated for Filling)', 'Implant', 'D', 'Imp', 1000, '2022-03-28', ' ', ' ', '1', '1', ' ', ' ', ' ', ' ', ' ', 'Planned'),
(4, 46, 22, '', 'wendy Urna', 'Missing due to Canes', 'Jacket Crown', 'M', 'JC', 1000, '2022-03-28', ' ', ' ', ' ', '1', '1', ' ', ' ', ' ', ' ', 'Planned'),
(5, 46, 16, '', 'wendy Urna', 'Present Teeth', 'Amaigam Filling', 'P', 'Am', 1000, '2022-03-28', ' ', ' ', '1', '1', ' ', ' ', ' ', ' ', ' ', 'Planned'),
(6, 46, 16, '', 'wendy Urna', 'Decayed (Canes indicated for Filling)', 'Amaigam Filling', 'D', 'Am', 1000, '2022-03-28', ' ', ' ', ' ', ' ', ' ', ' ', '1', '1', ' ', 'Planned'),
(7, 46, 16, '', 'wendy Urna', 'Missing due to Canes', 'Jacket Crown', 'M', 'JC', 1000, '2022-03-28', '1', '1', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Planned'),
(8, 46, 17, '', 'wendy Urna', 'Unerupted', 'Jacket Crown', 'Un', 'JC', 1000, '2022-03-28', '1', '1', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Planned'),
(9, 46, 16, '', 'wendy Urna', 'Root Fragment', 'Removable Dentures', 'Rf', 'Rm', 1000, '2022-03-28', ' ', ' ', ' ', ' ', ' ', '1', ' ', '1', ' ', 'Planned'),
(10, 46, 17, '', 'wendy Urna', 'Present Teeth', 'Composite Filling', 'P', 'Co', 2000, '2022-03-28', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '1', 'Planned'),
(11, 46, 15, '', 'wendy Urna', 'Missing due to Canes', 'Abutment', 'M', 'Ab', 1000, '2022-03-28', ' ', '1', '1', ' ', ' ', ' ', ' ', ' ', ' ', 'Planned'),
(12, 46, 15, '', 'wendy Urna', 'Supernumerary Tooth', 'Removable Dentures', 'Sp', 'Rm', 1000, '2022-03-28', ' ', ' ', ' ', ' ', '1', '1', ' ', ' ', ' ', 'Planned'),
(13, 46, 21, '', 'wendy Urna', 'Missing due to Canes', 'Jacket Crown', 'M', 'JC', 1000, '2022-03-29', ' ', ' ', ' ', ' ', ' ', ' ', '1', '1', ' ', 'Planned');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(50) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `feedback` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `patient_name`, `doctor_name`, `service_name`, `feedback`) VALUES
(0, 'Francis Urna', 'Francis Urna', '', 'wwwwwww'),
(0, 'Francis Urna', 'Dr. Francis Urna', 'Oral Prophylaxis', 'hahahahahahahahaha');

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
(1, 'Tylenol', '20', '', '100', '2022-01-27', '2022-01-04', 'ACTIVE'),
(2, 'Advil', '105', '', '50', '2022-01-30', '2022-01-12', 'ACTIVE'),
(3, 'Bayer', '173', '', '200', '2024-06-19', '2022-01-25', 'ACTIVE');

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
  `status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_record`
--

INSERT INTO `patient_record` (`patient_id`, `profile_img`, `fullname`, `first_name`, `last_name`, `middle_name`, `birthdate`, `address`, `parent_guardian`, `age`, `doctor_name`, `service_name`, `password`, `email`, `contactno`, `gender`, `status`) VALUES
(1, '', 'wang wang', 'wang', 'wang', 'wang', '2015-07-29', 'QC', 'wang', '6', '', '', '123456', 'wang@gmail.com', '091231231233', 'male', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `pending_appointments`
--

CREATE TABLE `pending_appointments` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(50) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `note` varchar(255) NOT NULL,
  `appointment_datentime` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pending_appointments`
--

INSERT INTO `pending_appointments` (`id`, `patient_id`, `patient_name`, `email`, `doctor_name`, `service_name`, `branch`, `note`, `appointment_datentime`, `status`) VALUES
(19, '2', 'Francis Urna', 'francis.dumas.urna@gmail.com', 'Joshua Malubay', 'Dental Implants', '', 'gg', '2022-03-31', 'Unconfirmed'),
(20, '2', 'Francis Urna', 'francis.dumas.urna@gmail.com', 'Joshua Malubay', 'Dental Implants', '', 'f', '2022-03-31', 'Unconfirmed'),
(21, '2', 'Francis Urna', 'francis.dumas.urna@gmail.com', 'Joshua Malubay', 'Root Canal Treatment', '', 'tat', '2022-03-31', 'Unconfirmed'),
(22, '2', 'Francis Urna', 'francis.dumas.urna@gmail.com', 'Joshua Malubay', 'Crowns and Bridges', '', 'wwww', '2022-03-31', 'Unconfirmed'),
(23, '2', 'Francis Urna', 'francis.dumas.urna@gmail.com', 'Joshua Malubay', 'Orthodontics', '', 'tt', '2022-03-31', 'Unconfirmed'),
(24, '2', 'Francis Urna', 'francis.dumas.urna@gmail.com', 'Joshua Malubay', 'Denture', '', 'ww', '2022-03-31', 'Unconfirmed');

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
  `input_eight` varchar(50) NOT NULL,
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
(1, 'Yes', 'Yes', 'Nothing', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', 'Yes', 'Local Anesthetic,Aspirin,Latex,', '', 'Yes', '', 'Yes', 'Yes', 'Yes', 'b', '120', 'High Blood Pressure, Low Blood Pressure, Epilepsy, AIDS, Sexualy Transmitted disease, Ulcers, Seizure, Rapid Weight Loss, Radiation, Joint', 'try');

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
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(50) NOT NULL,
  `profile_img` varchar(50) NOT NULL,
  `service_name` varchar(250) NOT NULL,
  `service_des` text NOT NULL,
  `price` int(50) NOT NULL,
  `status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `profile_img`, `service_name`, `service_des`, `price`, `status`) VALUES
(7, 'toothextract.jpg', 'Tooth Extraction', 'A very common reason involves a tooth that is too badly damaged, from trauma or decay, to be repaired.\r\n', 1500, 'ACTIVE'),
(8, 'ortho.jpg', 'Orthodontics', 'that addresses the diagnosis, prevention, and correction of mal-positioned teeth and jaws, and misaligned bite patterns.', 50000, 'ACTIVE'),
(9, 'root-canal-treatment.png', 'Root Canal Treatment', 'Is a treatment sequence for the infected pulp of a tooth that is intended to result in the elimination of infection and the protection of the decontaminated tooth from future microbial invasion\r\n', 1300, 'ACTIVE'),
(10, 'dentlimplant.jpeg', 'Dental Implants', 'is a prosthesis that interfaces with the bone of the jaw or skull to support a dental prosthesis such as a crown, bridge, denture, or facial prosthesis.\r\n', 30000, 'ACTIVE'),
(12, 'Dentures.jpg', 'Denture', 'Are prosthetic devices constructed to replace missing teeth, and are supported by the surrounding soft and hard tissues of the oral cavity.\r\n', 12000, 'ACTIVE'),
(13, 'whitening.jpg', 'Teeth Whitening', 'Tooth whitening or tooth bleaching is the process of lightening the color of human teeth.\r\n', 2000, 'ACTIVE'),
(14, 'PedDentist.jpg', 'Pediatric Dentistry', 'Is the branch of dentistry dealing with children from birth through adolescence.\r\n', 3000, 'ACTIVE'),
(15, 'CrownAndBridge.jpg', 'Crowns and Bridges', 'A crown or a cap fits over an existing tooth. It requires restoration due to deep decay, a fracture, or a crack. At least three units make up a bridge: two crowns (abutments) fused to a pontic, or fake tooth, that replaces a missing tooth.\r\n ', 3000, 'ACTIVE'),
(16, 'consult.jpg', 'Consultation', 'A meeting to discuss, decide, or plan something, as a meeting of several doctors to discuss the diagnosis and treatment of a patient.\r\n', 250, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `branch_id` int(50) NOT NULL,
  `profile_img` varchar(55) NOT NULL,
  `branch_address` varchar(50) NOT NULL,
  `branch_lot` varchar(50) NOT NULL,
  `branch_street` varchar(50) NOT NULL,
  `branch_brgy` varchar(50) NOT NULL,
  `branch_city` varchar(50) NOT NULL,
  `status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`branch_id`, `profile_img`, `branch_address`, `branch_lot`, `branch_street`, `branch_brgy`, `branch_city`, `status`) VALUES
(1, '', '2 balak putik quezon City', '25', 'Sampaloc St', 'Sauyo', 'Caloocan City', 'INACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `user_id` int(50) NOT NULL,
  `profile_img` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `birthdate` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`user_id`, `profile_img`, `first_name`, `last_name`, `middle_name`, `birthdate`, `address`, `branch`, `age`, `password`, `email`, `contactno`, `gender`, `user_type`) VALUES
(3, 'IMG_20201023_071124.jpg', 'Francis', 'Urna', 'Dumas', '2000-08-17', 'QC1', '', '21', '123456', 'urna@gmail.com', '09999922', 'Male', 'Admin'),
(4, 'owang.jpg', 'Joshua', 'Malubay', 'G', '1999-07-11', 'QC', '', '22', '123', 'joshua@gmail.com', '0933333', 'Male', 'Doctor'),
(5, 'kyle.jpg', 'Kyle', 'elyk', 'G', '2006-09-17', 'QC', '', '15', '12345', 'kyle@gmail.com', '091233321', 'Female', 'Assistant');

-- --------------------------------------------------------

--
-- Table structure for table `x_ray`
--

CREATE TABLE `x_ray` (
  `xray_count` int(50) NOT NULL,
  `patient_id` int(50) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `x_ray` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `x_ray`
--

INSERT INTO `x_ray` (`xray_count`, `patient_id`, `patient_name`, `x_ray`, `date`) VALUES
(6, 1, 'Urna, wendy Dumas', 'dentlimplant.jpeg', '  March 26, 2022'),
(7, 8, 'TEST, TEST TEST', 'whitening.jpg', '  March 26, 2022');

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
-- Indexes for table `dentalchart`
--
ALTER TABLE `dentalchart`
  ADD PRIMARY KEY (`procedure_id`);

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
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

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
  MODIFY `appointment_refno` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
-- AUTO_INCREMENT for table `dentalchart`
--
ALTER TABLE `dentalchart`
  MODIFY `procedure_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `patient_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pending_appointments`
--
ALTER TABLE `pending_appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `prescription_list`
--
ALTER TABLE `prescription_list`
  MODIFY `prescription_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `patient_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `restotbl`
--
ALTER TABLE `restotbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `branch_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `x_ray`
--
ALTER TABLE `x_ray`
  MODIFY `xray_count` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
