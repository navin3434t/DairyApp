-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2017 at 05:48 AM
-- Server version: 5.6.35-80.0-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `atozsoft_dairyapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `da_activity_log`
--

CREATE TABLE IF NOT EXISTS `da_activity_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `activity_type` varchar(20) NOT NULL,
  `date_time` datetime NOT NULL,
  `table_name` varchar(40) NOT NULL,
  `table_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=152 ;

--
-- Dumping data for table `da_activity_log`
--

INSERT INTO `da_activity_log` (`id`, `user_id`, `activity_type`, `date_time`, `table_name`, `table_id`) VALUES
(1, 1, 'Milk Tank Cleaning', '0000-00-00 00:00:00', 'da_milk_tank_cleaning', 10),
(2, 1, 'Milk Tank Cleaning', '2017-03-25 11:12:16', 'da_milk_tank_cleaning', 11),
(3, 1, 'Milk Tank Cleaning', '2017-03-25 12:52:01', 'da_milk_tank_cleaning', 12),
(4, 1, 'Milk Tank Cleaning', '2017-03-25 12:53:12', 'da_milk_tank_cleaning', 13),
(5, 1, 'Milk Tank Cleaning', '2017-03-25 12:54:17', 'da_milk_tank_cleaning', 14),
(6, 1, 'Update Milk Tank Cle', '2017-03-25 01:17:30', 'da_milk_tank_cleaning', 9),
(7, 1, 'Update Milk Tank Cle', '2017-03-25 01:18:29', 'da_milk_tank_cleaning', 9),
(8, 1, 'Update Milk Tank Cle', '2017-03-25 01:20:12', 'da_milk_tank_cleaning', 9),
(9, 1, 'Dairy Hygeine Tracke', '2017-03-26 07:31:00', 'da_hygeine_tracker', 2),
(10, 1, 'Dairy Hygeine Tracke', '2017-03-26 07:31:49', 'da_hygeine_tracker', 3),
(11, 1, 'Dairy Hygeine Tracke', '2017-03-26 07:32:11', 'da_hygeine_tracker', 4),
(12, 1, 'Dairy Hygeine Tracke', '2017-03-26 07:43:29', 'da_hygeine_tracker', 5),
(13, 1, 'Create Hygeine Inves', '2017-03-26 08:29:08', 'da_farm_hygiene_investigation', 1),
(14, 1, 'Create Hygeine Inves', '2017-03-26 08:44:29', 'da_farm_hygiene_investigation', 1),
(15, 1, 'Create Hygeine Inves', '2017-03-26 11:54:02', 'da_fhi_water', 1),
(16, 1, 'Create Hygeine Inves', '2017-03-26 11:54:26', 'da_fhi_water', 1),
(17, 1, 'Create Hygeine Inves', '2017-03-26 11:54:58', 'da_fhi_water', 1),
(18, 1, 'Create Hygeine Inves', '2017-03-26 11:55:30', 'da_fhi_water', 1),
(19, 1, 'Create Hygeine Inves', '2017-03-27 12:04:07', 'da_fhi_equipment_inspection', 1),
(20, 1, 'Create Hygeine Inves', '2017-03-27 12:13:38', 'da_fhi_equipment_inspection', 1),
(21, 1, 'Create Hygeine Inves', '2017-03-27 12:14:16', 'da_fhi_cleaning_solution', 1),
(22, 1, 'Create Hygeine Inves', '2017-03-27 12:39:49', 'da_fhi_wash_assessment', 2),
(23, 1, 'Create Hygeine Inves', '2017-03-27 12:50:21', 'da_fhi_wash_assessment', 3),
(24, 1, 'Create Hygeine Inves', '2017-03-27 01:23:26', 'da_fhi_cip_assetsment', 0),
(25, 1, 'Create Hygeine Inves', '2017-03-27 01:24:53', 'da_fhi_cip_assetsment', 0),
(26, 1, 'Create Hygeine Inves', '2017-03-27 01:47:31', 'da_fhi_slug_assessment', 1),
(27, 1, 'Create Milk Machine ', '2017-03-27 01:16:22', 'da_milking_machine_cleaning', 1),
(28, 1, 'Create Cooling Perfo', '2017-03-27 03:08:18', 'da_cooling_performance', 1),
(29, 1, 'Create Cooling Perfo', '2017-03-27 03:08:53', 'da_cooling_performance', 2),
(30, 1, 'Create CIP Cleaning ', '2017-03-29 02:49:08', 'da_cip_cleaning_routine', 1),
(31, 1, 'Create CIP Cleaning ', '2017-03-29 02:54:52', 'da_cip_cleaning_routine', 2),
(32, 1, 'Create CIP Cleaning ', '2017-03-29 02:55:31', 'da_cip_cleaning_routine', 3),
(33, 1, 'Create CIP Cleaning ', '2017-03-29 02:56:02', 'da_cip_cleaning_routine', 4),
(34, 1, 'Create CIP Cleaning ', '2017-03-29 03:06:20', 'da_cip_cleaning_routine', 5),
(35, 1, 'Create CIP Cleaning ', '2017-03-29 03:08:57', 'da_cip_cleaning_routine', 6),
(36, 1, 'Create CIP Cleaning ', '2017-03-29 03:10:25', 'da_cip_cleaning_routine', 7),
(37, 1, 'Create CIP Cleaning ', '2017-03-29 03:11:02', 'da_cip_cleaning_routine', 8),
(38, 1, 'Create CIP Cleaning ', '2017-03-29 03:12:28', 'da_cip_cleaning_routine', 9),
(39, 1, 'Create CIP Cleaning ', '2017-03-29 03:13:55', 'da_cip_cleaning_routine', 10),
(40, 1, 'Create CIP Cleaning ', '2017-03-29 03:16:29', 'da_cip_cleaning_routine', 11),
(41, 1, 'Create CIP Cleaning ', '2017-03-29 03:17:32', 'da_cip_cleaning_routine', 12),
(42, 1, 'Create CIP Cleaning ', '2017-03-29 03:18:17', 'da_cip_cleaning_routine', 13),
(43, 1, 'Create CIP Cleaning ', '2017-03-29 03:48:06', 'da_cip_cleaning_routine', 14),
(44, 1, 'Create CIP Cleaning ', '2017-03-29 03:48:32', 'da_cip_cleaning_routine', 15),
(45, 1, 'Create CIP Cleaning ', '2017-03-29 03:53:41', 'da_cip_cleaning_routine', 16),
(46, 1, 'Create CIP Cleaning ', '2017-03-29 03:54:19', 'da_cip_cleaning_routine', 17),
(47, 1, 'Create CIP Cleaning ', '2017-03-29 03:54:25', 'da_cip_cleaning_routine', 18),
(48, 1, 'Create CIP Cleaning ', '2017-03-29 03:56:52', 'da_cip_cleaning_routine', 19),
(49, 1, 'Create CIP Cleaning ', '2017-03-29 03:57:43', 'da_cip_cleaning_routine', 20),
(50, 1, 'Create CIP Cleaning ', '2017-03-30 07:04:39', 'da_cip_cleaning_routine', 21),
(51, 3, 'Create Milk Machine ', '2017-04-13 10:50:56', 'da_milking_machine_cleaning', 2),
(52, 6, 'Create Milk Machine ', '2017-04-13 10:51:51', 'da_milking_machine_cleaning', 3),
(53, 6, 'Create Hygeine Inves', '2017-04-13 11:05:23', 'da_fhi_equipment_inspection', 1),
(54, 3, 'Create Milk Tank Cle', '2017-04-13 11:07:12', 'da_milk_tank_cleaning', 15),
(55, 3, 'Create Milk Tank Cle', '2017-04-13 11:07:33', 'da_milk_tank_cleaning', 16),
(56, 3, 'Update Milk Tank Cle', '2017-04-13 11:08:30', 'da_milk_tank_cleaning', 16),
(57, 6, 'Create Milk Tank Cle', '2017-04-13 11:09:32', 'da_milk_tank_cleaning', 17),
(58, 6, 'Update Milk Tank Cle', '2017-04-13 11:11:01', 'da_milk_tank_cleaning', 1),
(59, 6, 'Update Milk Tank Cle', '2017-04-13 11:11:17', 'da_milk_tank_cleaning', 1),
(60, 6, 'Create Hygeine Inves', '2017-04-13 11:57:39', 'da_farm_hygiene_investigation', 2),
(61, 6, 'Create Hygeine Inves', '2017-04-13 11:58:23', 'da_farm_hygiene_investigation', 3),
(62, 6, 'Create Hygeine Inves', '2017-04-13 12:01:00', 'da_farm_hygiene_investigation', 3),
(63, 6, 'Create Hygeine Inves', '2017-04-13 12:13:29', 'da_fhi_water', 3),
(64, 6, 'Create Hygeine Inves', '2017-04-13 12:13:31', 'da_fhi_water', 3),
(65, 6, 'Create Hygeine Inves', '2017-04-13 12:13:43', 'da_fhi_water', 3),
(66, 6, 'Create Hygeine Inves', '2017-04-13 12:14:22', 'da_fhi_water', 3),
(67, 6, 'Create Hygeine Inves', '2017-04-13 12:18:08', 'da_fhi_water', 3),
(68, 6, 'Create Hygeine Inves', '2017-04-14 05:34:12', 'da_fhi_water', 1),
(69, 6, 'Create Hygeine Inves', '2017-04-14 05:34:44', 'da_fhi_equipment_inspection', 1),
(70, 6, 'Create Hygeine Inves', '2017-04-14 05:37:08', 'da_farm_hygiene_investigation', 4),
(71, 3, 'Create Hygeine Inves', '2017-04-14 05:37:49', 'da_fhi_wash_assessment', 4),
(72, 6, 'Create Hygeine Inves', '2017-04-14 05:38:30', 'da_fhi_water', 4),
(73, 6, 'Create Hygeine Inves', '2017-04-14 05:38:42', 'da_fhi_equipment_inspection', 4),
(74, 3, 'Create Hygeine Inves', '2017-04-14 05:43:06', 'da_fhi_cleaning_solution', 1),
(75, 6, 'Create Hygeine Inves', '2017-04-14 05:44:53', 'da_fhi_cleaning_solution', 4),
(76, 6, 'Create Hygeine Inves', '2017-04-14 05:45:49', 'da_fhi_wash_assessment', 5),
(77, 3, 'Create Hygeine Inves', '2017-04-14 05:51:11', 'da_fhi_cip_assetsment', 0),
(78, 6, 'Create Hygeine Inves', '2017-04-14 05:56:06', 'da_fhi_cleaning_solution', 4),
(79, 6, 'Create Hygeine Inves', '2017-04-14 06:09:44', 'da_fhi_flow_rate', 1),
(80, 6, 'Create Hygeine Inves', '2017-04-14 06:10:05', 'da_fhi_flow_rate', 2),
(81, 6, 'Create Hygeine Inves', '2017-04-14 06:18:06', 'da_fhi_recommendation1', 4),
(82, 6, 'Dairy Hygeine Tracke', '2017-04-14 06:35:40', 'da_hygeine_tracker', 6),
(83, 6, 'Create Cooling Perfo', '2017-04-14 06:46:04', 'da_cooling_performance', 3),
(84, 6, 'Create Cooling Perfo', '2017-04-14 06:46:20', 'da_cooling_performance', 4),
(85, 6, 'Create Hygeine Inves', '2017-04-14 06:57:56', 'da_farm_hygiene_investigation', 5),
(86, 6, 'Create Hygeine Inves', '2017-04-14 06:58:03', 'da_farm_hygiene_investigation', 6),
(87, 6, 'Create Hygeine Inves', '2017-04-14 06:58:29', 'da_fhi_wash_assessment', 6),
(88, 6, 'Create Hygeine Inves', '2017-04-14 06:58:43', 'da_fhi_wash_assessment', 7),
(89, 6, 'Create Hygeine Inves', '2017-04-14 06:58:47', 'da_fhi_wash_assessment', 8),
(90, 6, 'Create Hygeine Inves', '2017-04-14 06:59:19', 'da_farm_hygiene_investigation', 7),
(91, 6, 'Create Hygeine Inves', '2017-04-14 06:59:24', 'da_farm_hygiene_investigation', 8),
(92, 6, 'Create Hygeine Inves', '2017-04-14 07:00:06', 'da_fhi_cleaning_solution', 4),
(93, 6, 'Create Hygeine Inves', '2017-04-14 07:00:23', 'da_fhi_cleaning_solution', 8),
(94, 6, 'Create Hygeine Inves', '2017-04-14 07:00:32', 'da_fhi_wash_assessment', 9),
(95, 6, 'Create Hygeine Inves', '2017-04-14 07:00:33', 'da_fhi_wash_assessment', 10),
(96, 6, 'Create Hygeine Inves', '2017-04-14 07:00:46', 'da_fhi_wash_assessment', 11),
(97, 6, 'Create Hygeine Inves', '2017-04-14 07:00:56', 'da_fhi_wash_assessment', 12),
(98, 6, 'Create Hygeine Inves', '2017-04-14 07:01:36', 'da_fhi_flow_rate', 3),
(99, 6, 'Create Hygeine Inves', '2017-04-14 07:12:36', 'da_fhi_flow_rate', 4),
(100, 6, 'Create Hygeine Inves', '2017-04-14 07:12:55', 'da_fhi_recommendation1', 4),
(101, 6, 'Create Milk Machine ', '2017-04-14 07:28:22', 'da_milking_machine_cleaning', 4),
(102, 6, 'Create Milk Tank Cle', '2017-04-14 07:29:02', 'da_milk_tank_cleaning', 18),
(103, 6, 'Update Milk Tank Cle', '2017-04-14 07:29:13', 'da_milk_tank_cleaning', 1),
(104, 6, 'Update Milk Tank Cle', '2017-04-14 07:29:22', 'da_milk_tank_cleaning', 1),
(105, 6, 'Create Hygeine Inves', '2017-04-14 07:29:59', 'da_farm_hygiene_investigation', 9),
(106, 6, 'Create Hygeine Inves', '2017-04-14 07:30:25', 'da_fhi_water', 4),
(107, 6, 'Create Hygeine Inves', '2017-04-14 07:30:37', 'da_fhi_equipment_inspection', 4),
(108, 6, 'Create Hygeine Inves', '2017-04-14 07:30:42', 'da_fhi_wash_assessment', 13),
(109, 6, 'Create Hygeine Inves', '2017-04-14 07:30:47', 'da_fhi_cleaning_solution', 8),
(110, 6, 'Create Hygeine Inves', '2017-04-14 07:32:50', 'da_fhi_cip_assetsment', 0),
(111, 6, 'Create Hygeine Inves', '2017-04-14 07:35:51', 'da_fhi_flow_rate', 5),
(112, 6, 'Create Hygeine Inves', '2017-04-14 07:36:07', 'da_fhi_recommendation1', 4),
(113, 6, 'Dairy Hygeine Tracke', '2017-04-14 07:37:53', 'da_hygeine_tracker', 7),
(114, 6, 'Create Cooling Perfo', '2017-04-14 07:38:03', 'da_cooling_performance', 5),
(115, 3, 'Create Hygeine Inves', '2017-04-14 08:15:22', 'da_farm_hygiene_investigation', 3),
(116, 3, 'Create Hygeine Inves', '2017-04-14 09:51:35', 'da_farm_hygiene_investigation', 1),
(117, 6, 'Create Hygeine Inves', '2017-04-14 09:59:35', 'da_farm_hygiene_investigation', 9),
(118, 6, 'Create Hygeine Inves', '2017-04-14 10:01:08', 'da_farm_hygiene_investigation', 9),
(119, 6, 'Create Hygeine Inves', '2017-04-14 10:01:31', 'da_farm_hygiene_investigation', 9),
(120, 6, 'Create Hygeine Inves', '2017-04-14 10:01:40', 'da_farm_hygiene_investigation', 9),
(121, 6, 'Create Hygeine Inves', '2017-04-14 10:02:17', 'da_farm_hygiene_investigation', 9),
(122, 6, 'Create Hygeine Inves', '2017-04-14 10:05:50', 'da_fhi_slug_assessment', 2),
(123, 6, 'Create Hygeine Inves', '2017-04-14 10:06:32', 'da_fhi_slug_assessment', 3),
(124, 3, 'Create Hygeine Inves', '2017-04-14 10:12:49', 'da_fhi_program_assessment', 1),
(125, 6, 'Create Hygeine Inves', '2017-04-14 10:13:34', 'da_fhi_program_assessment', 8),
(126, 3, 'Create Hygeine Inves', '2017-04-14 10:24:33', 'da_fhi_recommendation2', 1),
(127, 6, 'Create Hygeine Inves', '2017-04-14 10:25:09', 'da_fhi_recommendation2', 4),
(128, 3, 'Create Hygeine Inves', '2017-04-14 10:28:37', 'da_fhi_recommendation3', 1),
(129, 6, 'Create Hygeine Inves', '2017-04-14 10:30:17', 'da_fhi_recommendation3', 4),
(130, 6, 'Create Milk Machine ', '2017-04-17 06:20:12', 'da_milking_machine_cleaning', 5),
(131, 6, 'Create Milk Tank Cle', '2017-04-17 06:22:25', 'da_milk_tank_cleaning', 19),
(132, 6, 'Update Milk Tank Cle', '2017-04-17 06:23:22', 'da_milk_tank_cleaning', 1),
(133, 6, 'Update Milk Tank Cle', '2017-04-17 06:23:32', 'da_milk_tank_cleaning', 19),
(134, 6, 'Update Milk Tank Cle', '2017-04-17 06:24:25', 'da_milk_tank_cleaning', 19),
(135, 6, 'Create Hygeine Inves', '2017-04-17 06:25:53', 'da_farm_hygiene_investigation', 10),
(136, 6, 'Create Hygeine Inves', '2017-04-17 06:26:41', 'da_farm_hygiene_investigation', 9),
(137, 6, 'Create Hygeine Inves', '2017-04-17 06:26:55', 'da_farm_hygiene_investigation', 10),
(138, 6, 'Create Hygeine Inves', '2017-04-17 06:27:20', 'da_fhi_water', 4),
(139, 6, 'Create Hygeine Inves', '2017-04-17 06:27:57', 'da_fhi_equipment_inspection', 10),
(140, 6, 'Create Hygeine Inves', '2017-04-17 06:28:38', 'da_fhi_wash_assessment', 14),
(141, 6, 'Create Hygeine Inves', '2017-04-17 06:29:04', 'da_fhi_cleaning_solution', 8),
(142, 6, 'Create Hygeine Inves', '2017-04-17 06:29:14', 'da_fhi_cleaning_solution', 10),
(143, 6, 'Create Hygeine Inves', '2017-04-17 06:29:47', 'da_fhi_cip_assetsment', 0),
(144, 6, 'Create Hygeine Inves', '2017-04-17 06:30:24', 'da_fhi_slug_assessment', 4),
(145, 6, 'Create Hygeine Inves', '2017-04-17 06:31:01', 'da_fhi_flow_rate', 6),
(146, 6, 'Create Hygeine Inves', '2017-04-17 06:31:42', 'da_fhi_program_assessment', 10),
(147, 6, 'Create Hygeine Inves', '2017-04-17 06:32:22', 'da_fhi_recommendation1', 10),
(148, 6, 'Create Hygeine Inves', '2017-04-17 06:32:59', 'da_fhi_recommendation2', 10),
(149, 6, 'Create Hygeine Inves', '2017-04-17 06:33:35', 'da_fhi_recommendation3', 10),
(150, 6, 'Dairy Hygeine Tracke', '2017-04-17 06:34:11', 'da_hygeine_tracker', 8),
(151, 6, 'Create Cooling Perfo', '2017-04-17 06:36:12', 'da_cooling_performance', 6);

-- --------------------------------------------------------

--
-- Table structure for table `da_cip_cleaning_routine`
--

CREATE TABLE IF NOT EXISTS `da_cip_cleaning_routine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `farm_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `effective_date` date NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_complete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `da_cip_cleaning_routine`
--

INSERT INTO `da_cip_cleaning_routine` (`id`, `farm_id`, `user_id`, `name`, `effective_date`, `create_date`, `update_date`, `created_by`, `updated_by`, `is_complete`) VALUES
(10, 1, 1, 'dummy', '2017-03-10', '2017-03-29', '0000-00-00', 0, 0, 0),
(11, 1, 1, 'dummy', '2017-03-10', '2017-03-29', '0000-00-00', 0, 0, 0),
(12, 1, 1, 'dummy', '2017-03-10', '2017-03-29', '0000-00-00', 0, 0, 0),
(13, 1, 1, 'dummy', '2017-03-10', '2017-03-29', '0000-00-00', 0, 0, 0),
(14, 1, 1, 'dummy', '2017-03-10', '2017-03-29', '0000-00-00', 0, 0, 0),
(15, 1, 1, 'dummy', '2017-03-10', '2017-03-29', '0000-00-00', 0, 0, 0),
(16, 1, 1, 'dummy', '2017-03-10', '2017-03-29', '0000-00-00', 0, 0, 0),
(17, 1, 1, 'dummy', '2017-03-10', '2017-03-29', '0000-00-00', 0, 0, 0),
(18, 1, 1, 'dummy', '2017-03-10', '2017-03-29', '0000-00-00', 0, 0, 0),
(19, 1, 1, 'dummy', '2017-03-10', '2017-03-29', '0000-00-00', 0, 0, 0),
(20, 1, 1, 'dummy', '2017-03-10', '2017-03-29', '0000-00-00', 0, 0, 0),
(21, 1, 1, 'dummy', '2017-03-10', '2017-03-30', '0000-00-00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `da_cip_cleaning_routine_action`
--

CREATE TABLE IF NOT EXISTS `da_cip_cleaning_routine_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cip_cr_id` int(11) NOT NULL,
  `action` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `da_cooling_performance`
--

CREATE TABLE IF NOT EXISTS `da_cooling_performance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `farm_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `average_reading` varchar(30) NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `da_cooling_performance`
--

INSERT INTO `da_cooling_performance` (`id`, `farm_id`, `user_id`, `average_reading`, `create_date`, `update_date`, `created_by`, `updated_by`) VALUES
(1, 1, 1, '343', '2017-03-27', '0000-00-00', 0, 0),
(2, 1, 1, '343', '2017-03-27', '0000-00-00', 0, 0),
(3, 7, 6, '1', '2017-04-14', '0000-00-00', 0, 0),
(4, 7, 6, '1', '2017-04-14', '0000-00-00', 0, 0),
(5, 7, 6, '1', '2017-04-14', '0000-00-00', 0, 0),
(6, 7, 6, '1', '2017-04-17', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `da_cp_precooling_information`
--

CREATE TABLE IF NOT EXISTS `da_cp_precooling_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cp_id` int(11) NOT NULL,
  `entering_temp_b1` varchar(30) NOT NULL,
  `leaving_temp_b1` varchar(30) NOT NULL,
  `difference_b1` varchar(30) NOT NULL,
  `entering_temp_b2` varchar(30) NOT NULL,
  `leaving_temp_b2` varchar(30) NOT NULL,
  `difference_b2` varchar(30) NOT NULL,
  `entering_temp_ct` varchar(30) NOT NULL,
  `leaving_temp_ct` varchar(30) NOT NULL,
  `difference_ct` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `da_cp_precooling_information`
--

INSERT INTO `da_cp_precooling_information` (`id`, `cp_id`, `entering_temp_b1`, `leaving_temp_b1`, `difference_b1`, `entering_temp_b2`, `leaving_temp_b2`, `difference_b2`, `entering_temp_ct`, `leaving_temp_ct`, `difference_ct`) VALUES
(1, 1, '100', '80', '20', '130', '90', '40', '120', '100', '20'),
(2, 2, '100', '80', '20', '130', '90', '40', '120', '100', '20'),
(3, 3, '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(4, 4, '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(5, 5, '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(6, 6, '1', '1', '1', '1', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `da_cp_vat_information`
--

CREATE TABLE IF NOT EXISTS `da_cp_vat_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cp_id` int(11) NOT NULL,
  `entering_temp_b1` varchar(30) NOT NULL,
  `leaving_temp_b1` varchar(30) NOT NULL,
  `difference_b1` varchar(30) NOT NULL,
  `entering_temp_b2` varchar(30) NOT NULL,
  `leaving_temp_b2` varchar(30) NOT NULL,
  `difference_b2` varchar(30) NOT NULL,
  `entering_temp_ct` varchar(30) NOT NULL,
  `leaving_temp_ct` varchar(30) NOT NULL,
  `difference_ct` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `da_cp_vat_information`
--

INSERT INTO `da_cp_vat_information` (`id`, `cp_id`, `entering_temp_b1`, `leaving_temp_b1`, `difference_b1`, `entering_temp_b2`, `leaving_temp_b2`, `difference_b2`, `entering_temp_ct`, `leaving_temp_ct`, `difference_ct`) VALUES
(1, 1, '90', '80', '10', '150', '100', '50', '140', '120', '20'),
(2, 2, '90', '80', '10', '150', '100', '50', '140', '120', '20'),
(3, 3, '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(4, 4, '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(5, 5, '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(6, 6, '1', '1', '1', '1', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `da_farm`
--

CREATE TABLE IF NOT EXISTS `da_farm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `post_code` varchar(20) NOT NULL,
  `gps_cordinates` varchar(30) NOT NULL,
  `dairy_factory` int(11) NOT NULL,
  `supplier_no` varchar(20) NOT NULL,
  `field_officer` varchar(50) NOT NULL,
  `fo_mobile` varchar(20) NOT NULL,
  `fo_email` varchar(50) NOT NULL,
  `machine_technician` varchar(50) NOT NULL,
  `mt_mobile` varchar(20) NOT NULL,
  `mt_email` varchar(50) NOT NULL,
  `chemical_representative` varchar(50) NOT NULL,
  `cr_mobile` varchar(20) NOT NULL,
  `cr_email` varchar(50) NOT NULL,
  `region` int(11) NOT NULL,
  `sub_region` int(11) NOT NULL,
  `reference_number` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `da_farm`
--

INSERT INTO `da_farm` (`id`, `name`, `address`, `post_code`, `gps_cordinates`, `dairy_factory`, `supplier_no`, `field_officer`, `fo_mobile`, `fo_email`, `machine_technician`, `mt_mobile`, `mt_email`, `chemical_representative`, `cr_mobile`, `cr_email`, `region`, `sub_region`, `reference_number`, `user_id`, `created_by`, `updated_by`, `create_date`, `update_date`) VALUES
(2, 'testf', 'dfvc', '453465', '6777.98', 0, '3424', 'dfgf', '554646455', 'tbb@hj.conn', 'gfghg', '76867545342', 'hggf@bbn.kjc', 'sdgdf', '6546765867', 're@ghg.cb', 0, 0, '', 1, 1, 0, '2017-04-04', '0000-00-00'),
(3, 'amrit', 'dsdgshfdfdf', '231234', 'dfgdg', 0, '4', '4', '3423432434', 'fgfg@gmail.com', 'gfgngf', '5645645654', 'bdfgdf@gmail.com', 'dhgrshsrgb', '5454646', 'gfbfb@gmail.com', 0, 0, '', 6, 6, 0, '2017-04-12', '0000-00-00'),
(4, 'Raman', 'ghgjhgjh', '36758', 'ghhg', 0, '78', 'hbnmbmbn', '67678678678', 'bjhgjhgh@gmail.com', 'hgjhgjg', '67245235', 'dfvgd@gmail.com', 'efnerm', '45427465', 'cvv@gmail.com', 0, 0, '456', 3, 3, 0, '2017-04-12', '0000-00-00'),
(5, 'amrit', 'dsdgshfdfdf', '231234', 'dfgdg', 0, '4', '4', '3423432434', 'fgfg@gmail.com', 'gfgngf', '5645645654', 'bdfgdf@gmail.com', 'dhgrshsrgb', '5454646', 'gfbfb@gmail.com', 0, 0, '', 6, 6, 0, '2017-04-13', '0000-00-00'),
(6, 'amrit', 'dsdgshfdfdf', '231234', 'dfgdg', 0, '4', '4', '3423432434', 'fgfg@gmail.com', 'gfgngf', '5645645654', 'bdfgdf@gmail.com', 'dhgrshsrgb', '5454646', 'gfbfb@gmail.com', 0, 0, '123', 6, 6, 0, '2017-04-13', '0000-00-00'),
(7, 'amrit', 'dsdgshfdfdf', '231234', 'dfgdg', 0, '4', '4', '3423432434', 'fgfg@gmail.com', 'gfgngf', '5645645654', 'bdfgdf@gmail.com', 'dhgrshsrgb', '5454646', 'gfbfb@gmail.com', 0, 0, '123', 6, 6, 0, '2017-04-13', '0000-00-00'),
(8, 'Raman', 'ghgjhgjh', '36758', 'ghhg', 0, '78', 'hbnmbmbn', '67678678678', 'bjhgjhgh@gmail.com', 'hgjhgjg', '67245235', 'dfvgd@gmail.com', 'efnerm', '45427465', 'cvv@gmail.com', 0, 0, '', 3, 3, 0, '2017-04-13', '0000-00-00'),
(9, 'amrit', 'dsdgshfdfdf', '231234', 'dfgdg', 0, '4', '4', '3423432434', 'fgfg@gmail.com', 'gfgngf', '5645645654', 'bdfgdf@gmail.com', 'dhgrshsrgb', '5454646', 'gfbfb@gmail.com', 0, 0, '', 6, 6, 0, '2017-04-14', '0000-00-00'),
(10, 'amrit', 'dsdgshfdfdf', '231234', 'dfgdg', 0, '4', '4', '3423432434', 'fgfg@gmail.com', 'gfgngf', '5645645654', 'bdfgdf@gmail.com', 'dhgrshsrgb', '5454646', 'gfbfb@gmail.com', 0, 0, '321', 6, 6, 0, '2017-04-17', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `da_farm_equipment`
--

CREATE TABLE IF NOT EXISTS `da_farm_equipment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `farm_id` int(11) NOT NULL,
  `dairy_type` tinyint(1) NOT NULL,
  `no_units` int(11) NOT NULL,
  `milk_line_size` int(11) NOT NULL,
  `air_injector` tinyint(1) NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `da_farm_equipment`
--

INSERT INTO `da_farm_equipment` (`id`, `farm_id`, `dairy_type`, `no_units`, `milk_line_size`, `air_injector`, `create_date`, `update_date`, `created_by`, `updated_by`) VALUES
(1, 2, 0, 5, 100, 1, '2017-04-04', '0000-00-00', 0, 0),
(2, 0, 0, 0, 0, 0, '2017-04-12', '0000-00-00', 0, 0),
(3, 1, 0, 2, 20, 2, '2017-04-12', '0000-00-00', 0, 0),
(4, 1, 0, 2, 20, 2, '2017-04-12', '0000-00-00', 0, 0),
(5, 0, 0, 0, 0, 0, '2017-04-12', '0000-00-00', 0, 0),
(6, 1, 0, 2, 20, 2, '2017-04-13', '0000-00-00', 0, 0),
(7, 1, 0, 2, 20, 2, '2017-04-13', '0000-00-00', 0, 0),
(8, 1, 0, 2, 20, 2, '2017-04-13', '0000-00-00', 0, 0),
(9, 1, 0, 2, 20, 2, '2017-04-13', '0000-00-00', 0, 0),
(10, 1, 0, 2, 20, 2, '2017-04-13', '0000-00-00', 0, 0),
(11, 0, 0, 0, 0, 0, '2017-04-13', '0000-00-00', 0, 0),
(12, 0, 0, 0, 30, 0, '2017-04-13', '0000-00-00', 0, 0),
(13, 0, 0, 0, 35, 0, '2017-04-13', '0000-00-00', 0, 0),
(14, 4, 0, 0, 35, 0, '2017-04-13', '0000-00-00', 0, 0),
(15, 4, 0, 0, 0, 0, '2017-04-13', '0000-00-00', 0, 0),
(16, 4, 0, 0, 0, 0, '2017-04-13', '0000-00-00', 0, 0),
(17, 4, 0, 0, 0, 0, '2017-04-13', '0000-00-00', 0, 0),
(18, 4, 0, 0, 35, 0, '2017-04-13', '0000-00-00', 0, 0),
(19, 7, 0, 2, 20, 2, '2017-04-13', '0000-00-00', 0, 0),
(20, 4, 0, 0, 35, 0, '2017-04-13', '0000-00-00', 0, 0),
(21, 7, 0, 2, 20, 2, '2017-04-13', '0000-00-00', 0, 0),
(22, 7, 0, 2, 20, 2, '2017-04-13', '0000-00-00', 0, 0),
(23, 8, 0, 0, 35, 0, '2017-04-13', '0000-00-00', 0, 0),
(24, 7, 0, 0, 20, 0, '2017-04-13', '0000-00-00', 0, 0),
(25, 7, 0, 0, 20, 2, '2017-04-13', '0000-00-00', 0, 0),
(26, 6, 0, 0, 35, 0, '2017-04-13', '0000-00-00', 0, 0),
(27, 7, 0, 0, 20, 0, '2017-04-13', '0000-00-00', 0, 0),
(28, 7, 0, 0, 20, 0, '2017-04-13', '0000-00-00', 0, 0),
(29, 7, 0, 0, 20, 0, '2017-04-13', '0000-00-00', 0, 0),
(30, 6, 0, 0, 35, 0, '2017-04-13', '0000-00-00', 0, 0),
(31, 7, 0, 0, 20, 0, '2017-04-13', '0000-00-00', 0, 0),
(32, 7, 0, 0, 20, 0, '2017-04-13', '0000-00-00', 0, 0),
(33, 7, 0, 0, 20, 0, '2017-04-13', '0000-00-00', 0, 0),
(34, 7, 0, 0, 20, 0, '2017-04-13', '0000-00-00', 0, 0),
(35, 7, 0, 0, 20, 0, '2017-04-13', '0000-00-00', 0, 0),
(36, 7, 0, 0, 20, 0, '2017-04-13', '0000-00-00', 0, 0),
(37, 7, 0, 0, 20, 0, '2017-04-14', '0000-00-00', 0, 0),
(38, 7, 0, 0, 20, 0, '2017-04-17', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `da_farm_hygiene_investigation`
--

CREATE TABLE IF NOT EXISTS `da_farm_hygiene_investigation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `farm_id` int(11) NOT NULL,
  `bactoscan_tpc` tinyint(1) NOT NULL,
  `thermodurics` tinyint(1) NOT NULL,
  `other` tinyint(1) NOT NULL,
  `other_description` varchar(250) NOT NULL,
  `latest_bactoscan` varchar(250) NOT NULL,
  `cows_milked` int(11) NOT NULL,
  `latest_thermoducric` varchar(50) NOT NULL,
  `milk_production_day` varchar(20) NOT NULL,
  `milk_frequency` varchar(20) NOT NULL,
  `bmilk_temprature` varchar(20) NOT NULL,
  `tank_volume` varchar(20) NOT NULL,
  `temp_note_time` varchar(20) NOT NULL,
  `elapsed_hour` varchar(4) NOT NULL,
  `elapsed_minutes` varchar(4) NOT NULL,
  `comments` text NOT NULL,
  `milking_equipment` varchar(50) NOT NULL,
  `cooling_equipment` varchar(50) NOT NULL,
  `heating_equipment` varchar(50) NOT NULL,
  `wash_program` varchar(50) NOT NULL,
  `wash_routinue` varchar(50) NOT NULL,
  `staff_changes` varchar(50) NOT NULL,
  `other_step2` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL,
  `complete_status` enum('1','0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `da_farm_hygiene_investigation`
--

INSERT INTO `da_farm_hygiene_investigation` (`id`, `farm_id`, `bactoscan_tpc`, `thermodurics`, `other`, `other_description`, `latest_bactoscan`, `cows_milked`, `latest_thermoducric`, `milk_production_day`, `milk_frequency`, `bmilk_temprature`, `tank_volume`, `temp_note_time`, `elapsed_hour`, `elapsed_minutes`, `comments`, `milking_equipment`, `cooling_equipment`, `heating_equipment`, `wash_program`, `wash_routinue`, `staff_changes`, `other_step2`, `created_by`, `updated_by`, `create_date`, `update_date`, `complete_status`) VALUES
(1, 1, 1, 1, 1, '1', '1', 1, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, 0, '2017-03-26', '0000-00-00', '1'),
(2, 7, 1, 1, 1, '1', '1', 1, '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', '', 6, 0, '2017-04-13', '0000-00-00', '0'),
(3, 7, 1, 1, 1, '1', '1', 1, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 6, 0, '2017-04-13', '0000-00-00', '0'),
(4, 7, 1, 1, 1, '1', '1', 1, '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', '', 6, 0, '2017-04-14', '0000-00-00', '0'),
(5, 7, 1, 1, 1, '1', '1', 1, '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', '', 6, 0, '2017-04-14', '0000-00-00', '0'),
(6, 7, 1, 1, 1, '1', '1', 1, '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', '', 6, 0, '2017-04-14', '0000-00-00', '0'),
(7, 7, 1, 1, 1, '1', '1', 1, '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', '', 6, 0, '2017-04-14', '0000-00-00', '0'),
(8, 7, 1, 1, 1, '1', '1', 1, '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', '', 6, 0, '2017-04-14', '0000-00-00', '1'),
(9, 7, 1, 1, 1, '1', '1', 1, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 6, 0, '2017-04-14', '0000-00-00', '0'),
(10, 7, 1, 1, 1, '1', '1', 1, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 6, 0, '2017-04-17', '0000-00-00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `da_farm_hygiene_invites`
--

CREATE TABLE IF NOT EXISTS `da_farm_hygiene_invites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `farm_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `da_farm_machine_wash`
--

CREATE TABLE IF NOT EXISTS `da_farm_machine_wash` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `farm_id` int(11) NOT NULL,
  `sunday` tinyint(1) NOT NULL,
  `monday` tinyint(1) NOT NULL,
  `tuesday` tinyint(1) NOT NULL,
  `wednesday` tinyint(1) NOT NULL,
  `thursday` tinyint(1) NOT NULL,
  `friday` tinyint(1) NOT NULL,
  `saturday` tinyint(1) NOT NULL,
  `wash_type` varchar(20) NOT NULL COMMENT '1-AM,2-PM,3-OPTIONAL',
  `create_date` date NOT NULL,
  `update_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `da_farm_machine_wash`
--

INSERT INTO `da_farm_machine_wash` (`id`, `farm_id`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `wash_type`, `create_date`, `update_date`, `created_by`, `updated_by`) VALUES
(1, 4, 1, 1, 1, 1, 1, 1, 1, 'AM', '2017-04-13', '0000-00-00', 0, 0),
(2, 4, 1, 1, 1, 1, 1, 1, 1, 'AM', '2017-04-13', '0000-00-00', 0, 0),
(3, 4, 1, 1, 1, 1, 1, 1, 1, 'AM', '2017-04-13', '0000-00-00', 0, 0),
(4, 4, 1, 1, 1, 1, 1, 1, 1, 'AM', '2017-04-13', '0000-00-00', 0, 0),
(5, 4, 1, 1, 1, 1, 1, 1, 1, 'AM', '2017-04-13', '0000-00-00', 0, 0),
(6, 4, 1, 1, 1, 1, 1, 1, 1, 'AM', '2017-04-13', '0000-00-00', 0, 0),
(7, 4, 1, 1, 1, 1, 1, 1, 1, 'AM', '2017-04-13', '0000-00-00', 0, 0),
(8, 4, 1, 1, 1, 1, 1, 1, 1, 'AM', '2017-04-14', '0000-00-00', 0, 0),
(9, 4, 1, 1, 1, 1, 1, 1, 1, 'AM', '2017-04-14', '0000-00-00', 0, 0),
(10, 7, 1, 1, 1, 1, 1, 1, 1, 'AM', '2017-04-14', '0000-00-00', 0, 0),
(11, 7, 1, 1, 1, 1, 1, 1, 1, 'AM', '2017-04-17', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `da_farm_machine_wash_cycle`
--

CREATE TABLE IF NOT EXISTS `da_farm_machine_wash_cycle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `farm_machine_wash_id` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `volume` varchar(20) NOT NULL,
  `cleanser_sensiter` varchar(100) NOT NULL,
  `comments` varchar(250) NOT NULL,
  `temp_start` varchar(50) NOT NULL,
  `dose` varchar(20) NOT NULL,
  `create_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `da_farm_machine_wash_cycle`
--

INSERT INTO `da_farm_machine_wash_cycle` (`id`, `farm_machine_wash_id`, `description`, `volume`, `cleanser_sensiter`, `comments`, `temp_start`, `dose`, `create_date`) VALUES
(1, 2, '1', '1', '1', '1', '1', '1', '2017-04-13'),
(2, 3, '1', '1', '1', '1', '1', '1', '2017-04-13'),
(3, 5, '1', '1', '', '1', '1', '1', '2017-04-13'),
(4, 6, '1', '1', '', '1', '1', '1', '2017-04-13'),
(5, 7, '1', '1', '', '1', '1', '1', '2017-04-13'),
(6, 8, '1', '1', '', '1', '1', '1', '2017-04-14'),
(7, 9, '1', '1', '1', '1', '1', '1', '2017-04-14'),
(8, 10, '1', '1', '1', '1', '1', '1', '2017-04-14'),
(9, 11, '1', '1', '1', '1', '1', '1', '2017-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `da_farm_milk_tank`
--

CREATE TABLE IF NOT EXISTS `da_farm_milk_tank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `farm_id` int(11) NOT NULL,
  `tank_capacity` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `da_farm_milk_tank`
--

INSERT INTO `da_farm_milk_tank` (`id`, `farm_id`, `tank_capacity`, `create_date`, `update_date`, `created_by`, `updated_by`) VALUES
(1, 2, 4, '2017-04-04', '0000-00-00', 0, 0),
(2, 2, 56, '2017-04-04', '0000-00-00', 0, 0),
(3, 4, 1, '2017-04-13', '0000-00-00', 0, 0),
(4, 4, 1, '2017-04-13', '0000-00-00', 0, 0),
(5, 4, 1, '2017-04-13', '0000-00-00', 0, 0),
(6, 4, 2, '2017-04-13', '0000-00-00', 0, 0),
(7, 4, 24, '2017-04-13', '0000-00-00', 0, 0),
(8, 4, 2, '2017-04-13', '0000-00-00', 0, 0),
(9, 4, 24, '2017-04-13', '0000-00-00', 0, 0),
(10, 8, 2, '2017-04-13', '0000-00-00', 0, 0),
(11, 8, 24, '2017-04-13', '0000-00-00', 0, 0),
(12, 6, 2, '2017-04-13', '0000-00-00', 0, 0),
(13, 6, 24, '2017-04-13', '0000-00-00', 0, 0),
(14, 6, 2, '2017-04-13', '0000-00-00', 0, 0),
(15, 6, 24, '2017-04-13', '0000-00-00', 0, 0),
(16, 7, 33, '2017-04-13', '0000-00-00', 0, 0),
(17, 7, 25, '2017-04-13', '0000-00-00', 0, 0),
(18, 7, 25, '2017-04-13', '0000-00-00', 0, 0),
(19, 7, 33, '2017-04-13', '0000-00-00', 0, 0),
(20, 7, 25, '2017-04-13', '0000-00-00', 0, 0),
(21, 7, 7, '2017-04-13', '0000-00-00', 0, 0),
(22, 7, 25, '2017-04-13', '0000-00-00', 0, 0),
(23, 7, 7, '2017-04-13', '0000-00-00', 0, 0),
(24, 7, 25, '2017-04-14', '0000-00-00', 0, 0),
(25, 7, 7, '2017-04-14', '0000-00-00', 0, 0),
(26, 7, 25, '2017-04-17', '0000-00-00', 0, 0),
(27, 7, 7, '2017-04-17', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `da_farm_milk_tank_wash_cycle`
--

CREATE TABLE IF NOT EXISTS `da_farm_milk_tank_wash_cycle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tank_id` int(11) NOT NULL,
  `farm_id` int(11) NOT NULL,
  `milk_tank` varchar(20) NOT NULL,
  `description` varchar(250) NOT NULL,
  `volume` varchar(20) NOT NULL,
  `cleanser_sensiter` varchar(100) NOT NULL,
  `comments` varchar(250) NOT NULL,
  `temp_start` varchar(50) NOT NULL,
  `dose` varchar(20) NOT NULL,
  `create_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `da_farm_milk_tank_wash_cycle`
--

INSERT INTO `da_farm_milk_tank_wash_cycle` (`id`, `tank_id`, `farm_id`, `milk_tank`, `description`, `volume`, `cleanser_sensiter`, `comments`, `temp_start`, `dose`, `create_date`) VALUES
(1, 0, 4, '1', '1', '1', '1', '1', '1', '1', '2017-04-13'),
(2, 0, 7, '1', '1', '1', '1', '1', '1', '1', '2017-04-13'),
(3, 0, 4, '1', '1', '1', '1', '1', '1', '1', '2017-04-13'),
(4, 0, 4, '1', '1', '1', '1', '1', '1', '1', '2017-04-13'),
(5, 0, 4, '1', '1', '1', '1', '1', '1', '1', '2017-04-13'),
(6, 0, 7, '1', '1', '1', '1', '1', '1', '1', '2017-04-14'),
(7, 0, 7, '1', '1', '1', '1', '1', '1', '1', '2017-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `da_farm_water_cleaning`
--

CREATE TABLE IF NOT EXISTS `da_farm_water_cleaning` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `farm_id` int(11) NOT NULL,
  `mm_auto_cip` tinyint(1) NOT NULL,
  `mm_manual_cip` tinyint(1) NOT NULL,
  `mm_manual` tinyint(1) NOT NULL,
  `mm_hws1_volume` varchar(20) NOT NULL,
  `mm_hws2_volume` varchar(20) NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `da_farm_water_cleaning_tank`
--

CREATE TABLE IF NOT EXISTS `da_farm_water_cleaning_tank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `farm_water_cleaning_id` int(11) NOT NULL,
  `auto_cip` int(11) NOT NULL,
  `manual` int(11) NOT NULL,
  `volume` int(11) NOT NULL,
  `temprature` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `da_farm_water_details`
--

CREATE TABLE IF NOT EXISTS `da_farm_water_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `farm_id` int(11) NOT NULL,
  `hot_water` varchar(50) NOT NULL,
  `cold_water` varchar(50) NOT NULL,
  `comments` varchar(150) NOT NULL,
  `date_test` date NOT NULL,
  `sample_from` varchar(150) NOT NULL,
  `ph` varchar(30) NOT NULL,
  `coli_count` varchar(100) NOT NULL,
  `iron` varchar(100) NOT NULL,
  `total_plate` varchar(20) NOT NULL,
  `total_hardness` varchar(20) NOT NULL,
  `create_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `da_farm_water_details`
--

INSERT INTO `da_farm_water_details` (`id`, `farm_id`, `hot_water`, `cold_water`, `comments`, `date_test`, `sample_from`, `ph`, `coli_count`, `iron`, `total_plate`, `total_hardness`, `create_date`) VALUES
(1, 4, '1', '1', '1', '0000-00-00', '', '1', '1', '1', '1', '1', '2017-04-13'),
(2, 4, '1', '1', '1', '0000-00-00', '1', '1', '1', '1', '1', '1', '2017-04-13'),
(3, 4, '1', '1', '1', '2017-04-13', '1', '1', '1', '1', '1', '1', '2017-04-13'),
(4, 8, '1', '1', '1', '2017-03-12', '1', '1', '1', '1', '1', '1', '2017-04-13'),
(5, 8, '1', '1', '1', '2017-03-12', '1', '1', '1', '1', '1', '1', '2017-04-13'),
(6, 8, '1', '1', '1', '2017-03-12', '1', '1', '1', '1', '1', '1', '2017-04-14'),
(7, 8, '1', '1', '1', '2017-03-12', '1', '1', '1', '1', '1', '1', '2017-04-17'),
(8, 7, '1', '1', '1', '0000-00-00', '1', '1', '1', '1', '1', '1', '2017-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `da_fhi_cip_assetsment`
--

CREATE TABLE IF NOT EXISTS `da_fhi_cip_assetsment` (
  `id` int(11) NOT NULL,
  `fhi_id` int(11) NOT NULL,
  `liner_mouthpiece` varchar(100) NOT NULL,
  `liner_mouthpiece_yes` tinyint(1) NOT NULL,
  `liner_mouthpiece_no` tinyint(1) NOT NULL,
  `which_unit_liner` varchar(100) NOT NULL,
  `which_unit_liner_description` varchar(100) NOT NULL,
  `cleaning_solution_flow` varchar(100) NOT NULL,
  `cleaning_solution_flow_yes` tinyint(1) NOT NULL,
  `cleaning_solution_flow_no` tinyint(1) NOT NULL,
  `which_unit_cleaning` varchar(100) NOT NULL,
  `which_unit_cleaning_description` varchar(100) NOT NULL,
  `working_vacuum` varchar(100) NOT NULL,
  `working_vacuum_yes` tinyint(1) NOT NULL,
  `working_vacuum_no` tinyint(1) NOT NULL,
  `vacuum_kevek` varchar(100) NOT NULL,
  `vacuum_kevek_description` varchar(100) NOT NULL,
  `effective_reserve` varchar(250) NOT NULL,
  `effective_reserve_yes` tinyint(1) NOT NULL,
  `effective_reserve_no` tinyint(1) NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `da_fhi_cip_assetsment`
--

INSERT INTO `da_fhi_cip_assetsment` (`id`, `fhi_id`, `liner_mouthpiece`, `liner_mouthpiece_yes`, `liner_mouthpiece_no`, `which_unit_liner`, `which_unit_liner_description`, `cleaning_solution_flow`, `cleaning_solution_flow_yes`, `cleaning_solution_flow_no`, `which_unit_cleaning`, `which_unit_cleaning_description`, `working_vacuum`, `working_vacuum_yes`, `working_vacuum_no`, `vacuum_kevek`, `vacuum_kevek_description`, `effective_reserve`, `effective_reserve_yes`, `effective_reserve_no`, `create_date`, `update_date`, `created_by`, `updated_by`) VALUES
(0, 1, '1', 0, 1, 'test', '', '', 0, 0, '', '', '', 0, 0, '', '', '', 0, 0, '0000-00-00', '0000-00-00', 0, 0),
(0, 1, '1', 0, 1, 'test', '', '', 0, 0, '', '', '', 0, 0, '', '', '', 0, 0, '2017-03-27', '0000-00-00', 0, 0),
(0, 1, '1', 1, 1, '1', '1', '1', 1, 1, '1', '1', '1', 1, 1, '1', '1', '1', 1, 1, '2017-04-14', '0000-00-00', 0, 0),
(0, 9, '1', 1, 1, '1', '1', '1', 1, 1, '1', '1', '1', 1, 1, '1', '1', '1', 1, 1, '2017-04-14', '0000-00-00', 0, 0),
(0, 10, '1', 1, 1, '1', '1', '1', 1, 1, '1', '1', '1', 1, 1, '1', '1', '1', 1, 1, '2017-04-17', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `da_fhi_cleaning_solution`
--

CREATE TABLE IF NOT EXISTS `da_fhi_cleaning_solution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fhi_id` int(11) NOT NULL,
  `alkali_ph_level` varchar(50) NOT NULL,
  `wash_active` varchar(50) NOT NULL,
  `chlorine_level` varchar(50) NOT NULL,
  `acid_ph_level` varchar(50) NOT NULL,
  `sanitiser_ph_level` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `da_fhi_cleaning_solution`
--

INSERT INTO `da_fhi_cleaning_solution` (`id`, `fhi_id`, `alkali_ph_level`, `wash_active`, `chlorine_level`, `acid_ph_level`, `sanitiser_ph_level`, `create_date`, `update_date`, `created_by`, `updated_by`) VALUES
(1, 1, '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0),
(2, 1, 'sss', 'sss', 'sss', 'sss', 'sss', '0000-00-00', '0000-00-00', 0, 0),
(3, 4, '1', '1', '1', '1', '1', '0000-00-00', '0000-00-00', 0, 0),
(4, 4, '1', '1', '1', '1', '1', '0000-00-00', '0000-00-00', 0, 0),
(5, 4, '1', '1', '1', '1', '1', '0000-00-00', '0000-00-00', 0, 0),
(6, 8, '1', '1', '1', '1', '1', '0000-00-00', '0000-00-00', 0, 0),
(7, 8, '1', '1', '1', '1', '1', '0000-00-00', '0000-00-00', 0, 0),
(8, 8, '1', '1', '1', '1', '1', '0000-00-00', '0000-00-00', 0, 0),
(9, 10, '1', '1', '1', '1', '1', '0000-00-00', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `da_fhi_equipment_inspection`
--

CREATE TABLE IF NOT EXISTS `da_fhi_equipment_inspection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fhi_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `clean` tinyint(1) NOT NULL,
  `deposit_found` tinyint(1) NOT NULL,
  `dirty` tinyint(1) NOT NULL,
  `deposit_not_found` tinyint(1) NOT NULL,
  `condition` text NOT NULL,
  `comment` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `pass` tinyint(1) NOT NULL,
  `fail` tinyint(1) NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `da_fhi_equipment_inspection`
--

INSERT INTO `da_fhi_equipment_inspection` (`id`, `fhi_id`, `name`, `clean`, `deposit_found`, `dirty`, `deposit_not_found`, `condition`, `comment`, `image`, `pass`, `fail`, `create_date`, `update_date`, `created_by`, `updated_by`) VALUES
(1, 1, '', 0, 0, 0, 0, '', '', '', 0, 0, '0000-00-00', '0000-00-00', 0, 0),
(2, 1, '', 0, 0, 0, 0, '', '', '', 0, 0, '0000-00-00', '0000-00-00', 0, 0),
(3, 1, '1', 1, 1, 1, 1, '1', '1', '1', 1, 1, '0000-00-00', '0000-00-00', 0, 0),
(4, 1, '1', 1, 1, 1, 1, '1', '1', '1', 1, 1, '0000-00-00', '0000-00-00', 0, 0),
(5, 4, '1', 1, 1, 1, 1, '1', '1', '1', 1, 1, '0000-00-00', '0000-00-00', 0, 0),
(6, 4, '1', 1, 1, 1, 1, '1', '1', '1', 1, 1, '0000-00-00', '0000-00-00', 0, 0),
(7, 10, '1', 1, 1, 1, 1, '1', '1', '1', 1, 1, '0000-00-00', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `da_fhi_flow_rate`
--

CREATE TABLE IF NOT EXISTS `da_fhi_flow_rate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fhi_id` int(11) NOT NULL,
  `pre_rinse` tinyint(1) NOT NULL,
  `wash` tinyint(1) NOT NULL,
  `final_rinse` tinyint(1) NOT NULL,
  `average_flow_rate` float NOT NULL,
  `allowance` float NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `da_fhi_flow_rate`
--

INSERT INTO `da_fhi_flow_rate` (`id`, `fhi_id`, `pre_rinse`, `wash`, `final_rinse`, `average_flow_rate`, `allowance`, `create_date`, `update_date`, `created_by`, `updated_by`) VALUES
(1, 4, 1, 1, 1, 1, 1, '0000-00-00', '0000-00-00', 0, 0),
(2, 4, 1, 1, 1, 1, 1, '0000-00-00', '0000-00-00', 0, 0),
(3, 4, 1, 1, 1, 1, 1, '0000-00-00', '0000-00-00', 0, 0),
(4, 4, 1, 1, 1, 1, 1, '0000-00-00', '0000-00-00', 0, 0),
(5, 4, 1, 1, 1, 1, 1, '0000-00-00', '0000-00-00', 0, 0),
(6, 10, 1, 1, 1, 1, 1, '0000-00-00', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `da_fhi_flow_rate_cycle`
--

CREATE TABLE IF NOT EXISTS `da_fhi_flow_rate_cycle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fhi_flow_rate_id` int(11) NOT NULL,
  `unit_no` varchar(100) NOT NULL,
  `letter_line` varchar(100) NOT NULL,
  `volume_collected` int(11) NOT NULL,
  `time_elapsed` varchar(10) NOT NULL,
  `flow_rate` varchar(10) NOT NULL,
  `pass_fail` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `da_fhi_flow_rate_cycle`
--

INSERT INTO `da_fhi_flow_rate_cycle` (`id`, `fhi_flow_rate_id`, `unit_no`, `letter_line`, `volume_collected`, `time_elapsed`, `flow_rate`, `pass_fail`) VALUES
(1, 1, '1', '1', 1, '1', '1', 1),
(2, 2, '1', '1', 1, '1', '1', 1),
(3, 3, '1', '1', 1, '1', '1', 1),
(4, 4, '1', '1', 1, '1', '1', 1),
(5, 5, '1', '1', 1, '1', '1', 1),
(6, 6, '1', '1', 1, '1', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `da_fhi_program_assessment`
--

CREATE TABLE IF NOT EXISTS `da_fhi_program_assessment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `program_name` varchar(100) NOT NULL,
  `fhi_id` int(11) NOT NULL,
  `alkali_wash_ph_level` varchar(100) NOT NULL,
  `acid_wash_ph_level` varchar(100) NOT NULL,
  `wash_active` varchar(100) NOT NULL,
  `sanitiser_ph_level` varchar(100) NOT NULL,
  `chlorine_level` varchar(100) NOT NULL,
  `other_test` text NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `da_fhi_program_assessment`
--

INSERT INTO `da_fhi_program_assessment` (`id`, `program_name`, `fhi_id`, `alkali_wash_ph_level`, `acid_wash_ph_level`, `wash_active`, `sanitiser_ph_level`, `chlorine_level`, `other_test`, `create_date`, `update_date`, `created_by`, `updated_by`) VALUES
(1, '1', 1, '1', '1', '1', '1', '1', '1', '2017-04-14', '0000-00-00', 0, 0),
(2, '1', 1, '1', '1', '1', '1', '1', '1', '2017-04-14', '0000-00-00', 0, 0),
(3, '1', 8, '1', '1', '1', '1', '1', '1', '2017-04-14', '0000-00-00', 0, 0),
(4, '1', 8, '1', '1', '1', '1', '1', '1', '2017-04-14', '0000-00-00', 0, 0),
(5, '1', 1, '1', '1', '1', '1', '1', '1', '2017-04-14', '0000-00-00', 0, 0),
(6, '1', 1, '1', '1', '1', '1', '1', '1', '2017-04-14', '0000-00-00', 0, 0),
(7, '1', 1, '1', '1', '1', '1', '1', '1', '2017-04-14', '0000-00-00', 0, 0),
(8, '1', 8, '1', '1', '1', '1', '1', '1', '2017-04-14', '0000-00-00', 0, 0),
(9, '1', 10, '1', '1', '1', '1', '1', '1', '2017-04-17', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `da_fhi_program_assessment_cycle`
--

CREATE TABLE IF NOT EXISTS `da_fhi_program_assessment_cycle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fhi_pa` int(11) NOT NULL,
  `cycle_description` varchar(150) NOT NULL,
  `volume` varchar(30) NOT NULL,
  `cleanser_sanitiser` varchar(150) NOT NULL,
  `temp_start` varchar(30) NOT NULL,
  `comments` varchar(100) NOT NULL,
  `temp_dump` varchar(30) NOT NULL,
  `dose` varchar(30) NOT NULL,
  `pass` tinyint(1) NOT NULL,
  `fail` tinyint(1) NOT NULL,
  `milk_tank` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `da_fhi_program_assessment_cycle`
--

INSERT INTO `da_fhi_program_assessment_cycle` (`id`, `fhi_pa`, `cycle_description`, `volume`, `cleanser_sanitiser`, `temp_start`, `comments`, `temp_dump`, `dose`, `pass`, `fail`, `milk_tank`) VALUES
(1, 7, '1', '1', '1', '1', '1', '', '1', 1, 1, '1'),
(2, 8, '1', '1', '1', '1', '1', '', '1', 1, 1, '1'),
(3, 9, '1', '1', '1', '1', '1', '', '1', 1, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `da_fhi_recommendation1`
--

CREATE TABLE IF NOT EXISTS `da_fhi_recommendation1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fhi_id` int(11) NOT NULL,
  `action_name` int(11) NOT NULL,
  `assign_to` int(11) NOT NULL,
  `completion_date` date NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `da_fhi_recommendation1`
--

INSERT INTO `da_fhi_recommendation1` (`id`, `fhi_id`, `action_name`, `assign_to`, `completion_date`, `create_date`, `update_date`, `created_by`, `updated_by`) VALUES
(1, 4, 1, 1, '0000-00-00', '2017-04-14', '0000-00-00', 6, 0),
(2, 4, 1, 1, '0000-00-00', '2017-04-14', '0000-00-00', 6, 0),
(3, 4, 1, 1, '0000-00-00', '2017-04-14', '0000-00-00', 6, 0),
(4, 10, 1, 1, '0000-00-00', '2017-04-17', '0000-00-00', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `da_fhi_recommendation2`
--

CREATE TABLE IF NOT EXISTS `da_fhi_recommendation2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fhi_id` int(11) NOT NULL,
  `retain_existing` tinyint(1) NOT NULL,
  `new_recommendation` tinyint(1) NOT NULL,
  `reference_number` varchar(100) NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `da_fhi_recommendation2`
--

INSERT INTO `da_fhi_recommendation2` (`id`, `fhi_id`, `retain_existing`, `new_recommendation`, `reference_number`, `create_date`, `update_date`, `created_by`, `updated_by`) VALUES
(1, 4, 1, 1, '1', '2017-04-14', '0000-00-00', 6, 0),
(2, 4, 1, 1, '1', '2017-04-14', '0000-00-00', 6, 0),
(3, 1, 1, 1, '1', '2017-04-14', '0000-00-00', 3, 0),
(4, 1, 1, 1, '1', '2017-04-14', '0000-00-00', 3, 0),
(5, 1, 1, 1, '1', '2017-04-14', '0000-00-00', 3, 0),
(6, 1, 1, 1, '1', '2017-04-14', '0000-00-00', 3, 0),
(7, 4, 1, 1, '1', '2017-04-14', '0000-00-00', 6, 0),
(8, 10, 1, 1, '1', '2017-04-17', '0000-00-00', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `da_fhi_recommendation2_cycle`
--

CREATE TABLE IF NOT EXISTS `da_fhi_recommendation2_cycle` (
  `id` int(11) NOT NULL,
  `fhi_recommendation2_days_id` int(11) NOT NULL,
  `cycle_description` varchar(100) NOT NULL,
  `volume` varchar(100) NOT NULL,
  `cleaner_sanitiser` varchar(100) NOT NULL,
  `temp_start` varchar(100) NOT NULL,
  `comments` text NOT NULL,
  `dose` varchar(100) NOT NULL,
  `wash_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `da_fhi_recommendation2_cycle`
--

INSERT INTO `da_fhi_recommendation2_cycle` (`id`, `fhi_recommendation2_days_id`, `cycle_description`, `volume`, `cleaner_sanitiser`, `temp_start`, `comments`, `dose`, `wash_type`) VALUES
(0, 5, '1', '1', '1', '1', '', '1', ''),
(0, 6, '1', '1', '1', '1', '1', '1', ''),
(0, 7, '1', '1', '1', '1', '1', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `da_fhi_recommendation2_days`
--

CREATE TABLE IF NOT EXISTS `da_fhi_recommendation2_days` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fhi_recommendation2_id` int(11) NOT NULL,
  `sunday` tinyint(1) NOT NULL,
  `monday` tinyint(1) NOT NULL,
  `tuesday` tinyint(1) NOT NULL,
  `wednesday` tinyint(1) NOT NULL,
  `thursday` tinyint(1) NOT NULL,
  `friday` tinyint(1) NOT NULL,
  `saturday` tinyint(1) NOT NULL,
  `wash_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `da_fhi_recommendation2_days`
--

INSERT INTO `da_fhi_recommendation2_days` (`id`, `fhi_recommendation2_id`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `wash_type`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 0),
(2, 2, 1, 1, 1, 1, 1, 1, 1, 0),
(3, 3, 1, 1, 1, 1, 1, 1, 1, 1),
(4, 5, 1, 1, 1, 1, 1, 1, 1, 1),
(5, 6, 1, 1, 1, 1, 1, 1, 1, 1),
(6, 7, 1, 1, 1, 1, 1, 1, 1, 0),
(7, 8, 1, 1, 1, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `da_fhi_recommendation3`
--

CREATE TABLE IF NOT EXISTS `da_fhi_recommendation3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fhi_id` int(11) NOT NULL,
  `retain_existing` tinyint(1) NOT NULL,
  `new_recommendation` tinyint(1) NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `da_fhi_recommendation3`
--

INSERT INTO `da_fhi_recommendation3` (`id`, `fhi_id`, `retain_existing`, `new_recommendation`, `create_date`, `update_date`, `created_by`, `updated_by`) VALUES
(1, 4, 1, 1, '2017-04-14', '0000-00-00', 6, 0),
(2, 4, 1, 1, '2017-04-14', '0000-00-00', 6, 0),
(3, 1, 1, 1, '2017-04-14', '0000-00-00', 3, 0),
(4, 1, 1, 1, '2017-04-14', '0000-00-00', 3, 0),
(5, 4, 1, 1, '2017-04-14', '0000-00-00', 6, 0),
(6, 10, 1, 1, '2017-04-17', '0000-00-00', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `da_fhi_recommendation3_cycle`
--

CREATE TABLE IF NOT EXISTS `da_fhi_recommendation3_cycle` (
  `id` int(11) NOT NULL,
  `fhi_recommendation3_id` int(11) NOT NULL,
  `cycle_description` varchar(100) NOT NULL,
  `volume` varchar(100) NOT NULL,
  `cleaner_sanitiser` varchar(100) NOT NULL,
  `temp_start` varchar(100) NOT NULL,
  `comments` text NOT NULL,
  `dose` varchar(100) NOT NULL,
  `tank_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `da_fhi_recommendation3_cycle`
--

INSERT INTO `da_fhi_recommendation3_cycle` (`id`, `fhi_recommendation3_id`, `cycle_description`, `volume`, `cleaner_sanitiser`, `temp_start`, `comments`, `dose`, `tank_type`) VALUES
(0, 4, '1', '1', '1', '1', '1', '1', '1'),
(0, 5, '1', '1', '1', '1', '1', '1', '1'),
(0, 6, '1', '1', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `da_fhi_slug_assessment`
--

CREATE TABLE IF NOT EXISTS `da_fhi_slug_assessment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fhi_id` int(11) NOT NULL,
  `injector_yes` tinyint(1) NOT NULL,
  `injector_no` tinyint(1) NOT NULL,
  `slug_wash_cycle` varchar(100) NOT NULL,
  `estimated_slug_screen` varchar(100) NOT NULL,
  `receiver_volume_1_2l` tinyint(1) NOT NULL,
  `receiver_volume_2_3_f` tinyint(1) NOT NULL,
  `receiver_volume_1_3_f` tinyint(1) NOT NULL,
  `receiver_volume_2_3_g` tinyint(1) NOT NULL,
  `receiver_volume_1_2_f` tinyint(1) NOT NULL,
  `after_turn_yes` tinyint(1) NOT NULL,
  `after_turn_no` tinyint(1) NOT NULL,
  `instant_after_turn_yes` tinyint(1) NOT NULL,
  `instant_after_turn_no` tinyint(1) NOT NULL,
  `before_turn_yes` tinyint(1) NOT NULL,
  `before_turn_no` tinyint(1) NOT NULL,
  `little_no_action_yes` tinyint(1) NOT NULL,
  `little_no_action_no` tinyint(1) NOT NULL,
  `good_action_yes` tinyint(1) NOT NULL,
  `good_action_no` tinyint(1) NOT NULL,
  `little_action_yes` tinyint(1) NOT NULL,
  `little_action_no` tinyint(1) NOT NULL,
  `other_yes` tinyint(1) NOT NULL,
  `other_no` tinyint(1) NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `da_fhi_slug_assessment`
--

INSERT INTO `da_fhi_slug_assessment` (`id`, `fhi_id`, `injector_yes`, `injector_no`, `slug_wash_cycle`, `estimated_slug_screen`, `receiver_volume_1_2l`, `receiver_volume_2_3_f`, `receiver_volume_1_3_f`, `receiver_volume_2_3_g`, `receiver_volume_1_2_f`, `after_turn_yes`, `after_turn_no`, `instant_after_turn_yes`, `instant_after_turn_no`, `before_turn_yes`, `before_turn_no`, `little_no_action_yes`, `little_no_action_no`, `good_action_yes`, `good_action_no`, `little_action_yes`, `little_action_no`, `other_yes`, `other_no`, `create_date`, `update_date`, `created_by`, `updated_by`) VALUES
(1, 1, 1, 0, '1', 'test', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017-03-27', '0000-00-00', 0, 0),
(2, 9, 1, 1, '1', '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2017-04-14', '0000-00-00', 0, 0),
(3, 9, 1, 1, '1', '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2017-04-14', '0000-00-00', 0, 0),
(4, 10, 1, 1, '1', '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2017-04-17', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `da_fhi_wash_assessment`
--

CREATE TABLE IF NOT EXISTS `da_fhi_wash_assessment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fhi_id` int(11) NOT NULL,
  `am` tinyint(1) NOT NULL,
  `pm` tinyint(1) NOT NULL,
  `other` tinyint(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `da_fhi_wash_assessment`
--

INSERT INTO `da_fhi_wash_assessment` (`id`, `fhi_id`, `am`, `pm`, `other`, `name`, `create_date`, `update_date`, `created_by`, `updated_by`) VALUES
(1, 1, 1, 1, 1, 'test', '0000-00-00', '0000-00-00', 0, 0),
(2, 1, 1, 1, 1, 'test', '0000-00-00', '0000-00-00', 0, 0),
(3, 1, 1, 0, 1, 'test', '0000-00-00', '0000-00-00', 0, 0),
(4, 1, 1, 1, 1, '1', '0000-00-00', '0000-00-00', 0, 0),
(5, 4, 1, 1, 1, '1', '0000-00-00', '0000-00-00', 0, 0),
(6, 4, 1, 1, 1, '1', '0000-00-00', '0000-00-00', 0, 0),
(7, 3, 1, 1, 1, '1', '0000-00-00', '0000-00-00', 0, 0),
(8, 6, 1, 1, 1, '1', '0000-00-00', '0000-00-00', 0, 0),
(9, 6, 1, 1, 1, '1', '0000-00-00', '0000-00-00', 0, 0),
(10, 6, 1, 1, 1, '1', '0000-00-00', '0000-00-00', 0, 0),
(11, 7, 1, 1, 1, '1', '0000-00-00', '0000-00-00', 0, 0),
(12, 8, 1, 1, 1, '1', '0000-00-00', '0000-00-00', 0, 0),
(13, 8, 1, 1, 1, '1', '0000-00-00', '0000-00-00', 0, 0),
(14, 10, 1, 1, 1, '1', '0000-00-00', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `da_fhi_wash_assessment_cycle`
--

CREATE TABLE IF NOT EXISTS `da_fhi_wash_assessment_cycle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fhiwac_id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `volume` varchar(100) NOT NULL,
  `cleaner_sanitiser` varchar(100) NOT NULL,
  `start_temp` varchar(100) NOT NULL,
  `comments` text NOT NULL,
  `dose` varchar(100) NOT NULL,
  `pass` tinyint(1) NOT NULL,
  `fail` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `da_fhi_wash_assessment_cycle`
--

INSERT INTO `da_fhi_wash_assessment_cycle` (`id`, `fhiwac_id`, `description`, `volume`, `cleaner_sanitiser`, `start_temp`, `comments`, `dose`, `pass`, `fail`) VALUES
(1, 2, '', '', '', '', '', '', 0, 0),
(2, 3, '', '', '', '', '', '', 0, 0),
(3, 4, 'sss', 'sss', 'sss', 'sss', 'sss', 'sss', 0, 0),
(4, 5, '1', '1', '1', '1', '1', '1', 1, 1),
(5, 6, '1', '1', '1', '1', '1', '1', 1, 1),
(6, 7, '1', '1', '1', '1', '1', '1', 1, 1),
(7, 8, '1', '1', '1', '1', '1', '1', 1, 1),
(8, 9, '1', '1', '1', '1', '1', '1', 1, 1),
(9, 10, '1', '1', '1', '1', '1', '1', 1, 1),
(10, 11, '1', '1', '1', '1', '1', '1', 1, 1),
(11, 12, '1', '1', '1', '1', '1', '1', 1, 1),
(12, 13, '1', '1', '1', '1', '1', '1', 1, 1),
(13, 14, '1', '1', '1', '1', '1', '1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `da_fhi_water`
--

CREATE TABLE IF NOT EXISTS `da_fhi_water` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fhi_id` int(11) NOT NULL,
  `hot_water` varchar(50) NOT NULL,
  `cold_water` varchar(50) NOT NULL,
  `test_date` date NOT NULL,
  `sample_from` varchar(50) NOT NULL,
  `ph` varchar(50) NOT NULL,
  `e_coli_count` varchar(50) NOT NULL,
  `iron` varchar(50) NOT NULL,
  `total_plate_count` varchar(10) NOT NULL,
  `total_hardness` varchar(50) NOT NULL,
  `comments` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `da_fhi_water`
--

INSERT INTO `da_fhi_water` (`id`, `fhi_id`, `hot_water`, `cold_water`, `test_date`, `sample_from`, `ph`, `e_coli_count`, `iron`, `total_plate_count`, `total_hardness`, `comments`) VALUES
(1, 1, '', '', '0000-00-00', '', '', '', '', '', '', ''),
(2, 1, '', '', '0000-00-00', '', '', '', '', '', '', ''),
(3, 1, '', '', '0000-00-00', '', '', '', '', '', '', ''),
(4, 1, '', '', '2017-03-26', '', '', '', '', '', '', ''),
(5, 3, '1', '', '2017-04-13', '', '', '', '', '', '', ''),
(6, 3, '1', '1', '0000-00-00', '1', '1', '1', '1', '1', '1', '1'),
(7, 1, '2', '2', '2017-03-04', '2', '2', '2', '2', '2', '2', '2'),
(8, 4, '2', '2', '2017-03-04', '2', '2', '2', '2', '2', '2', '2'),
(9, 4, '2', '2', '2017-03-04', '2', '2', '2', '2', '2', '2', '2'),
(10, 4, '2', '2', '2017-03-04', '2', '2', '2', '2', '2', '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `da_hygeine_tracker`
--

CREATE TABLE IF NOT EXISTS `da_hygeine_tracker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `farm_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `result_type` varchar(20) NOT NULL,
  `latest_result` varchar(30) NOT NULL,
  `threshold_result` varchar(30) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `da_hygeine_tracker`
--

INSERT INTO `da_hygeine_tracker` (`id`, `farm_id`, `user_id`, `result_type`, `latest_result`, `threshold_result`, `date`) VALUES
(1, 1, 0, '32', '323', '323', '2017-03-26'),
(2, 1, 1, '32', '323', '323', '2017-03-26'),
(3, 1, 1, '32', '323', '323', '2017-03-26'),
(4, 1, 1, '32', '323', '323', '0000-00-00'),
(5, 1, 1, '32', '323', '323', '0000-00-00'),
(6, 7, 6, '1', '1', '1', '2017-04-22'),
(7, 7, 6, '1', '1', '1', '2017-04-22'),
(8, 7, 6, '1', '1', '1', '2017-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `da_invite`
--

CREATE TABLE IF NOT EXISTS `da_invite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `table_id` int(11) NOT NULL,
  `invite_name` varchar(50) NOT NULL,
  `invite_type` varchar(30) NOT NULL,
  `module_type` enum('1','2','3','4','5','6','7','8','9') NOT NULL DEFAULT '1',
  `invited_by` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `da_invite`
--

INSERT INTO `da_invite` (`id`, `user_id`, `table_name`, `table_id`, `invite_name`, `invite_type`, `module_type`, `invited_by`, `status`) VALUES
(4, 3, 'da_milking_machine_cleaning', 1, 'Milking machine clinic', 'action', '1', 1, 0),
(5, 4, 'da_farm', 2, 'Farm', '', '1', 1, 0),
(6, 5, 'da_farm', 2, 'Farm', '', '1', 1, 0),
(7, 6, 'da_farm', 3, 'Farm', '', '1', 6, 0),
(8, 10, 'da_farm', 3, 'Farm', '', '1', 6, 0),
(9, 11, 'da_farm', 4, 'Farm', '', '1', 3, 0),
(10, 12, 'da_farm', 4, 'Farm', '', '1', 3, 0),
(11, 6, 'da_farm', 5, 'Farm', '', '1', 6, 0),
(12, 10, 'da_farm', 5, 'Farm', '', '1', 6, 0),
(13, 6, 'da_farm', 6, 'Farm', '', '1', 6, 0),
(14, 10, 'da_farm', 6, 'Farm', '', '1', 6, 0),
(15, 6, 'da_farm', 7, 'Farm', '', '1', 6, 0),
(16, 10, 'da_farm', 7, 'Farm', '', '1', 6, 0),
(17, 11, 'da_farm', 8, 'Farm', '', '1', 3, 0),
(18, 12, 'da_farm', 8, 'Farm', '', '1', 3, 0),
(19, 6, 'da_farm', 9, 'Farm', '', '1', 6, 0),
(20, 10, 'da_farm', 9, 'Farm', '', '1', 6, 0),
(21, 0, 'da_milking_machine_cleaning', 1, 'Milking machine clinic', '', '1', 3, 0),
(22, 1, 'da_milking_machine_cleaning', 1, 'Milking machine clinic', '', '1', 3, 0),
(23, 1, 'da_milking_machine_cleaning', 2, 'Milking machine clinic', '', '1', 6, 0),
(24, 1, 'da_hygeine_tracker', 1, 'Dairy Hygeine Tracker', '', '1', 3, 0),
(25, 1, 'da_hygeine_tracker', 3, 'Dairy Hygeine Tracker', '', '1', 3, 0),
(26, 1, 'da_hygeine_tracker', 2, 'Dairy Hygeine Tracker', '', '1', 6, 0),
(27, 1, 'da_cooling_performance', 4, 'Dairy Hygeine Tracker', '', '1', 6, 0),
(28, 1, 'da_cooling_performance', 5, 'Dairy Hygeine Tracker', '', '1', 6, 0),
(29, 1, 'da_cooling_performance', 6, 'Dairy Hygeine Tracker', '', '1', 6, 0),
(30, 6, 'da_farm', 10, 'Farm', '', '1', 6, 0),
(31, 10, 'da_farm', 10, 'Farm', '', '1', 6, 0),
(32, 1, 'da_milking_machine_cleaning', 5, 'Milking machine clinic', '', '1', 6, 0),
(33, 1, 'da_hygeine_tracker', 8, 'Dairy Hygeine Tracker', '', '1', 6, 0),
(34, 1, 'da_cooling_performance', 8, 'Dairy Hygeine Tracker', '', '1', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `da_milk_tank_cleaning`
--

CREATE TABLE IF NOT EXISTS `da_milk_tank_cleaning` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `farm_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `alkali_wash_ph_level` varchar(100) NOT NULL,
  `acid_wash_ph_level` varchar(100) NOT NULL,
  `wash_active` varchar(100) NOT NULL,
  `sanitiser_ph_level` varchar(100) NOT NULL,
  `other_test` text NOT NULL,
  `program_name` varchar(100) NOT NULL,
  `chlorine_level` varchar(100) NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL,
  `is_complete` enum('1','0') NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `da_milk_tank_cleaning`
--

INSERT INTO `da_milk_tank_cleaning` (`id`, `farm_id`, `user_id`, `alkali_wash_ph_level`, `acid_wash_ph_level`, `wash_active`, `sanitiser_ph_level`, `other_test`, `program_name`, `chlorine_level`, `create_date`, `update_date`, `is_complete`, `created_by`, `updated_by`) VALUES
(1, 7, 6, '1', '1', '1', '1', '1', '1', '1', '2017-04-17', '0000-00-00', '0', 0, 0),
(2, 2, 1, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '0000-00-00', '0000-00-00', '0', 0, 0),
(3, 2, 1, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '0000-00-00', '0000-00-00', '0', 0, 0),
(4, 2, 1, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '0000-00-00', '0000-00-00', '0', 0, 0),
(5, 2, 1, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '0000-00-00', '0000-00-00', '0', 0, 0),
(6, 2, 1, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '0000-00-00', '0000-00-00', '0', 0, 0),
(7, 2, 1, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '0000-00-00', '0000-00-00', '0', 0, 0),
(8, 2, 1, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '0000-00-00', '0000-00-00', '0', 0, 0),
(9, 2, 1, 'ntest', 'a', 'a', 'a', 'a', 'a', 'a', '2017-03-25', '0000-00-00', '0', 0, 0),
(10, 2, 1, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '2017-03-25', '0000-00-00', '0', 0, 0),
(11, 2, 1, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '2017-03-25', '0000-00-00', '0', 0, 0),
(12, 2, 1, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '2017-03-25', '0000-00-00', '0', 0, 0),
(13, 2, 1, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '2017-03-25', '0000-00-00', '0', 0, 0),
(14, 2, 1, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '2017-03-25', '0000-00-00', '0', 0, 0),
(15, 3, 3, '1', '1', '1', '1', '1', '1', '1', '2017-04-13', '0000-00-00', '0', 0, 0),
(16, 3, 3, '1', '1', '1', '1', '1', '1', '1', '2017-04-13', '0000-00-00', '0', 0, 0),
(17, 7, 6, '1', '1', '1', '1', '1', '1', '1', '2017-04-13', '0000-00-00', '0', 0, 0),
(18, 7, 6, '1', '1', '1', '1', '1', '1', '1', '2017-04-14', '0000-00-00', '0', 0, 0),
(19, 7, 6, '1', '1', '1', '1', '1', '1', '1', '2017-04-17', '0000-00-00', '0', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `da_milk_tank_cleaning_cycle`
--

CREATE TABLE IF NOT EXISTS `da_milk_tank_cleaning_cycle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mtc_id` int(11) NOT NULL,
  `milk_tank` varchar(20) NOT NULL,
  `cycling_description` varchar(100) NOT NULL,
  `volume` varchar(20) NOT NULL,
  `cleanser_sanitiser` varchar(30) NOT NULL,
  `temp_start` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `dose` varchar(30) NOT NULL,
  `pass` tinyint(1) NOT NULL,
  `fail` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `da_milk_tank_cleaning_cycle`
--

INSERT INTO `da_milk_tank_cleaning_cycle` (`id`, `mtc_id`, `milk_tank`, `cycling_description`, `volume`, `cleanser_sanitiser`, `temp_start`, `comment`, `dose`, `pass`, `fail`) VALUES
(1, 3, '1', 's', 's', 's', 's', 's', 's', 0, 1),
(2, 4, '1', 's', 's', 's', 's', 's', 's', 0, 1),
(3, 5, '1', 's', 's', 's', 's', 's', 's', 0, 1),
(4, 6, '1', 's', 's', 's', 's', 's', 's', 0, 1),
(5, 7, '1', 's', 's', 's', 's', 's', 's', 0, 1),
(6, 8, '1', 's', 's', 's', 's', 's', 's', 0, 1),
(8, 10, '1', 's', 's', 's', 's', 's', 's', 0, 1),
(10, 12, '1', 's', 's', 's', 's', 's', 's', 0, 1),
(11, 13, '', 's', 's', 's', 's', 's', 's', 0, 1),
(12, 14, '', 's', 's', 's', 's', 's', 's', 0, 1),
(15, 9, '', 's', 's', 's', 's', 's', 's', 0, 1),
(17, 16, '', '', '', '', '', '', '', 0, 0),
(18, 17, '', '1', '1', '1', '1', '1', '1', 1, 1),
(21, 18, '', '1', '1', '1', '1', '1', '1', 1, 1),
(25, 1, '', '1', '1', '1', '1', '1', '1', 1, 1),
(27, 19, '', '1', '1', '1', '1', '', '1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `da_milking_machine_cleaning`
--

CREATE TABLE IF NOT EXISTS `da_milking_machine_cleaning` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `farm_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `program_name` varchar(100) NOT NULL,
  `effective_date` date NOT NULL,
  `litres` varchar(20) NOT NULL,
  `c_water` varchar(20) NOT NULL,
  `mins` varchar(20) NOT NULL,
  `solution_drop` varchar(20) NOT NULL,
  `is_saved` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_complete` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `da_milking_machine_cleaning`
--

INSERT INTO `da_milking_machine_cleaning` (`id`, `farm_id`, `user_id`, `program_name`, `effective_date`, `litres`, `c_water`, `mins`, `solution_drop`, `is_saved`, `create_date`, `update_date`, `created_by`, `updated_by`, `is_complete`) VALUES
(1, 1, 1, 'machine cleaning', '2017-02-07', '50', '90', '20', '120', 1, '2017-03-27', '0000-00-00', 0, 0, 1),
(2, 3, 3, '456', '2017-04-17', '1', '1', '1', '1', 1, '2017-04-13', '0000-00-00', 0, 0, 1),
(3, 7, 6, '1', '1998-03-15', '1', '1', '1', '1', 1, '2017-04-13', '0000-00-00', 0, 0, 0),
(4, 7, 6, '1', '1998-03-15', '1', '1', '1', '1', 1, '2017-04-14', '0000-00-00', 0, 0, 0),
(5, 7, 6, '1', '1998-03-15', '1', '1', '1', '1', 1, '2017-04-17', '0000-00-00', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `da_milking_machine_cleaning_days`
--

CREATE TABLE IF NOT EXISTS `da_milking_machine_cleaning_days` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mmc_id` int(11) NOT NULL,
  `sunday` tinyint(1) NOT NULL,
  `monday` tinyint(1) NOT NULL,
  `tuesday` tinyint(1) NOT NULL,
  `wednesday` tinyint(1) NOT NULL,
  `thursday` tinyint(1) NOT NULL,
  `friday` tinyint(1) NOT NULL,
  `saturday` tinyint(1) NOT NULL,
  `am_pm` varchar(10) NOT NULL,
  `pre_re` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `da_milking_machine_cleaning_days`
--

INSERT INTO `da_milking_machine_cleaning_days` (`id`, `mmc_id`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `am_pm`, `pre_re`) VALUES
(1, 1, 1, 0, 1, 1, 0, 1, 1, 'pm', 're'),
(2, 1, 1, 0, 1, 1, 0, 0, 1, 'am', 'pre'),
(3, 2, 1, 1, 1, 1, 1, 1, 1, 'am', 'pre'),
(4, 3, 1, 1, 1, 1, 1, 1, 1, '1', '1'),
(5, 4, 1, 1, 1, 1, 1, 1, 1, '1', '1'),
(6, 5, 1, 1, 1, 1, 1, 1, 1, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `da_user`
--

CREATE TABLE IF NOT EXISTS `da_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `home_contact` varchar(20) DEFAULT NULL,
  `i_am` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `farm_id` int(11) NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '0',
  `active_status` enum('1','0') NOT NULL DEFAULT '1',
  `delete_status` enum('1','0') NOT NULL DEFAULT '1',
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `webservice_token` varchar(50) NOT NULL,
  `registration_status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `da_user`
--

INSERT INTO `da_user` (`id`, `email`, `password`, `first_name`, `last_name`, `mobile`, `home_contact`, `i_am`, `position`, `company`, `farm_id`, `priority`, `active_status`, `delete_status`, `create_date`, `update_date`, `last_login`, `webservice_token`, `registration_status`) VALUES
(1, 'navin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'navin', 'tanwar', '9599109956', '', 'Developer', 'Developer', '', 0, 0, '1', '1', '2017-04-03 09:56:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '289056f6', 0),
(2, 'rakesh@mailinator.com', 'fcea920f7412b5da7be0cf42b8c93759', 'rakesh', 'kumar', '9815499110', '', 'm', '1', '', 0, 0, '1', '1', '2017-04-03 10:17:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'e4954c5c', 0),
(3, 'raman1992@mailinator.com', 'da6df37c779ee033f5915c124182c7df', 'Raman', 'kaur', '7563475698', '', 'tester', 'tester', '', 0, 0, '1', '1', '2017-04-04 08:05:36', '2017-04-12 11:12:08', '2017-04-12 10:08:36', 'cf855bd2', 0),
(4, 'hfhg@hjj.coin', '', 'gdffd', '', '2435436546', '', '', 'item1', '', 0, 0, '1', '1', '2017-04-04 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(5, 'test@hjgmai.com', '', 'item1', '', '9887654231', '', '', 'item2', '', 0, 0, '1', '1', '2017-04-04 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(6, 'uic.amrit1@gmail.com', '3538046cec1c8f7685a9b05208b3d38f', 'Amritpal', 'Singh', '9501370034', '', 'Tester', '2', '', 0, 0, '1', '1', '2017-04-04 10:33:52', '2017-04-17 06:09:13', '2017-04-17 06:02:35', '4a6a0656', 0),
(7, 'raman1992@mailinator.com', 'da6df37c779ee033f5915c124182c7df', 'Raman', 'kaur', '7823846890', '', 'tester', '1', '', 0, 0, '1', '1', '2017-04-12 09:52:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(8, 'uic.amrit@gmail.com', '3538046cec1c8f7685a9b05208b3d38f', 'Amritpal', 'Singh', '9501370034', '', 'Tester', '2', '', 0, 0, '1', '1', '2017-04-12 10:42:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(9, 'uic.amrit@gmail.com', '3538046cec1c8f7685a9b05208b3d38f', 'Amritpal', 'Singh', '9501370034', '', 'Tester', '2', '', 0, 0, '1', '1', '2017-04-12 11:06:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(10, 'uufsdfi@gmail.com', '', 'raju', '', '87959235352', '', '', 'tester2', '', 0, 0, '1', '1', '2017-04-12 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(11, 'raman@gmail.com', '', 'hiuih', '', '4356576531', '', '', 'vxf', '', 0, 0, '1', '1', '2017-04-12 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(12, 'hgdjf@gmail.com', '', 'vhjvjhvjh', '', '3464375474', '', '', 'dvdfgf', '', 0, 0, '1', '1', '2017-04-12 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(13, 'uic.amrit@gmail.com', '3538046cec1c8f7685a9b05208b3d38f', 'Amritpal', 'Singh', '9501370034', '', 'Tester', '2', '', 0, 0, '1', '1', '2017-04-13 06:03:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(14, 'uic.amrit@gmail.com', '3538046cec1c8f7685a9b05208b3d38f', 'Amritpal', 'Singh', '9501370034', '', 'Tester', '2', '', 0, 0, '1', '1', '2017-04-13 06:23:05', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(15, 'manik@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Manik', 'Mahajan', '123456789', '', 'test', 'testing', '', 0, 0, '1', '1', '2017-04-16 11:32:34', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(16, 'John@gmail.com', 'a5391e96f8d48a62e8c85381df108e98', 'John', 'Smith', '9501370034', '', 'Vendor', 'Executive', '', 0, 0, '1', '1', '2017-04-16 12:58:08', '0000-00-00 00:00:00', '2017-04-16 03:19:17', 'f73d027e', 0),
(17, 'uic.amrit1@gmail.com', '3538046cec1c8f7685a9b05208b3d38f', 'Amritpal', 'Singh', '9501370034', '', 'Tester', '2', '', 0, 0, '1', '1', '2017-04-17 06:03:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(18, 'iosdinesh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Dinesh', 'kumar', '8427176032', '', 'tester', 'engineer', '', 0, 0, '1', '1', '2017-04-17 03:54:38', '0000-00-00 00:00:00', '2017-04-17 04:52:05', '52419c67', 0),
(19, 'ask.knit1108@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Amit', 'Shula', '90-41-915104', '', 'Doctor', 'Smartdata', '', 0, 0, '1', '1', '2017-04-17 04:56:06', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(20, 'aks.knit1108@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Amit', 'Shula', '90-41-915104', '', 'Doctor', 'Smartdata', '', 0, 0, '1', '1', '2017-04-17 04:58:46', '0000-00-00 00:00:00', '2017-04-17 05:49:47', 'ea0c8216', 0),
(21, 'aks.knit11088@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Amit', 'Shula', '90-41-915104', '', 'Doctor', 'Smartdata', '', 0, 0, '1', '1', '2017-04-17 05:04:14', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `da_user_role`
--

CREATE TABLE IF NOT EXISTS `da_user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `farm_id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `da_user_role`
--

INSERT INTO `da_user_role` (`id`, `user_id`, `farm_id`, `role`) VALUES
(1, 4, 2, 'primary'),
(2, 5, 2, 'secondary'),
(3, 10, 3, 'secondary'),
(4, 11, 4, 'primary'),
(5, 12, 4, 'secondary');

-- --------------------------------------------------------

--
-- Table structure for table `da_wash_assessment_template`
--

CREATE TABLE IF NOT EXISTS `da_wash_assessment_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `farm_id` int(11) NOT NULL,
  `am` tinyint(1) NOT NULL,
  `pm` tinyint(1) NOT NULL,
  `other` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `da_wash_assessment_template_cycle`
--

CREATE TABLE IF NOT EXISTS `da_wash_assessment_template_cycle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wat_id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `volume` varchar(100) NOT NULL,
  `cleaner_sanitiser` varchar(100) NOT NULL,
  `start_temp` varchar(100) NOT NULL,
  `comments` text NOT NULL,
  `dose` varchar(100) NOT NULL,
  `pass` int(11) NOT NULL,
  `fail` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
