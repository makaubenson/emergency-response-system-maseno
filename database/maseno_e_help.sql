-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2022 at 03:37 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maseno_e_help`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(50) NOT NULL,
  `admin_firstname` varchar(255) NOT NULL,
  `admin_lastname` varchar(255) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_phone` varchar(15) NOT NULL,
  `admin_rank` varchar(20) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `registration_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`id`, `admin_id`, `admin_firstname`, `admin_lastname`, `admin_email`, `admin_phone`, `admin_rank`, `admin_password`, `registration_timestamp`) VALUES
(1, 'MSU/00046/022', 'Richard', 'Simiyu', 'simiyurichard@gmail.com', '0785469782', 'super_admin', '17c4520f6cfd1ab53d8745e84681eb49', '2022-04-03 19:43:10'),
(2, 'MSU/00050/022', 'Caroline', 'Mwihoko', 'carolinem23@gmail.com', '0745973325', 'admin', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-03 19:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `request_status`
--

CREATE TABLE `request_status` (
  `id` int(20) NOT NULL,
  `helpID` varchar(50) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `request_latitude` varchar(50) NOT NULL,
  `request_longitude` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `admNo` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request_status`
--

INSERT INTO `request_status` (`id`, `helpID`, `ip_address`, `request_latitude`, `request_longitude`, `status`, `admNo`, `timestamp`) VALUES
(9, '0LDRDB', '41.81.171.77', '-1.2841', '36.8155', 'Responding', 'CUT/00040/019', '2022-04-19 19:15:27'),
(8, '2DLI48', '197.156.190.186', '-1.2841', '36.8155', 'Responding', 'BEC|00848|019', '2022-04-19 19:08:40'),
(1, '351FDF', '197.156.137.185', '-1.2841', '36.8155', 'Successful', 'CIT/00046/019', '2022-04-19 12:20:09'),
(3, '3AUGSD', '102.167.58.253', '-1.2841', '36.8155', 'Assigned', 'CIT/00111/019', '2022-04-19 18:49:41'),
(30, '5CLE12', '154.122.252.23', '-1.2841', '36.8155', 'Failed', 'CIT/00047/019', '2022-04-25 12:16:13'),
(16, '5RIU55', '105.161.33.170', '1', '38', 'Failed', 'CCT/00046/020', '2022-04-20 15:51:30'),
(17, '6FI032', '197.156.137.180', '-1.2841', '36.8155', 'Pending', 'CCS/00001/020', '2022-04-20 16:43:01'),
(6, '99GTG1', '197.156.140.198', '-1.2841', '36.8155', 'Assigned', 'CIT/00005/019', '2022-04-19 18:58:23'),
(2, 'AKRI5E', '41.81.44.207', '-1.2841', '36.8155', 'Assigned', 'CIM/00016/020', '2022-04-19 18:32:50'),
(29, 'ASI847', '102.23.98.19', '10', '8', 'Pending', 'BBA/00132/020', '2022-04-23 09:50:06'),
(12, 'E95V9Y', '154.153.124.38', '-1.2841', '36.8155', 'Successful', 'CIT/00248/019', '2022-04-20 00:24:08'),
(10, 'HXZCEH', '154.159.237.122', '-0.2833', '36.0667', 'Successful', 'CIT/00047/019', '2022-04-19 19:40:42'),
(11, 'J2DM4Y', '197.156.137.185', '-1.2841', '36.8155', 'Failed', 'APS/00410/019', '2022-04-19 21:20:35'),
(4, 'K73CWE', '196.108.146.82', '1', '38', 'Responding', 'CIT/00064/020', '2022-04-19 18:57:21'),
(23, 'OFVPFE', '102.23.98.20', '10', '8', 'Failed', 'CIM/00193/019', '2022-04-21 08:56:02'),
(5, 'QE8KWM', '41.90.216.250', '-1.2841', '36.8155', 'Successful', 'ALI/00278/019', '2022-04-19 18:58:12'),
(24, 'QRGET6', '102.166.105.89', '-1.2841', '36.8155', 'Failed', 'BAF/00086/020', '2022-04-21 17:23:24'),
(15, 'RYUL9X', '154.122.73.6', '1', '38', 'Pending', 'HHR/00135/019', '2022-04-20 15:19:42'),
(13, 'WR4Z8Y', '105.161.154.97', '1', '38', 'Successful', 'ESC/00018/020', '2022-04-20 06:58:10'),
(14, 'WZT3RU', '105.160.12.176', '-1.2841', '36.8155', 'Responding', 'SBH/00543/023', '2022-04-20 15:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `rescue_team`
--

CREATE TABLE `rescue_team` (
  `id` int(11) NOT NULL,
  `team_id` varchar(50) NOT NULL,
  `team_username` varchar(255) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `team_phone` int(15) NOT NULL,
  `team_email` varchar(50) NOT NULL,
  `team_password` varchar(255) NOT NULL,
  `registration_timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rescue_team`
--

INSERT INTO `rescue_team` (`id`, `team_id`, `team_username`, `team_name`, `team_phone`, `team_email`, `team_password`, `registration_timestamp`) VALUES
(1, 'TM01', 'HYDRO/022', 'Team Hydro', 786378542, 'letsgo@gmail.com', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-04 11:21:26'),
(2, 'TM02', 'CUTY/022', 'Team Cuty', 742975635, 'cuty@gmail.com', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-04 11:21:26'),
(3, 'TM03', 'SHIFTY/022', 'Team Shifty', 759753362, 'shifty@gmail.com', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-04 11:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `rescue_team_members`
--

CREATE TABLE `rescue_team_members` (
  `id` int(20) NOT NULL,
  `member_id` varchar(50) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(15) NOT NULL,
  `role_id` varchar(50) NOT NULL,
  `rescue_team_id` varchar(50) NOT NULL,
  `time_of_registration` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rescue_team_members`
--

INSERT INTO `rescue_team_members` (`id`, `member_id`, `fname`, `lname`, `email`, `phone`, `role_id`, `rescue_team_id`, `time_of_registration`) VALUES
(1, 'MB01', 'Thomas', 'Kimeu', 'kimeuthomas@gmail.com', 712579874, 'MSU/001A/022', 'TM01', '2022-04-08 15:10:41'),
(2, 'MB02', 'David', 'Philip', 'davidphilip@gmail.com', 765248545, 'MSU/001B/022', 'TM02', '2022-04-08 15:10:41'),
(3, 'MB03', 'Duncan', 'Ondieki', 'ondiekiduncan@gmail.com', 779854258, 'MSU/001C/022', 'TM03', '2022-04-08 15:10:41'),
(4, 'MB04', 'Mwanzia', 'Kimani', 'kimanimwanzia20@gmail.com', 789542658, 'MSU/001A/022', 'TM02', '2022-04-08 16:03:35'),
(5, 'MB05', 'James', 'Patrick', 'patrickjames21@gmail.com', 745987456, 'MSU/001A/022', 'TM03', '2022-04-08 16:04:43'),
(6, 'MB06', 'Caroline', 'Murathe', 'murathercarol@gmail.com', 766879853, 'MSU/001B/022', 'TM01', '2022-04-08 16:06:59'),
(7, 'MB07', 'Jane', 'Odongo', 'odongojane25@gmail.com', 745783258, 'MSU/001B/022', 'TM03', '2022-04-08 16:07:53'),
(8, 'MB08', 'Mutia', 'Kioko', 'mutiakioko@gmai.com', 798959863, 'MSU/001C/022', 'TM01', '2022-04-08 16:09:32'),
(9, 'MB09', 'Angela', 'Mutuku', 'mutukuangie@gmail.com', 725627894, 'MSU/001C/022', 'TM02', '2022-04-08 16:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `rescue_team_tasks`
--

CREATE TABLE `rescue_team_tasks` (
  `id` int(10) NOT NULL,
  `task_help_code` varchar(50) NOT NULL,
  `rescue_team_id` varchar(50) NOT NULL,
  `assigning_admin_id` varchar(50) NOT NULL,
  `team_status` varchar(255) NOT NULL DEFAULT 'Unassigned',
  `assignment_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_address` varchar(50) NOT NULL DEFAULT '0.0.0.0',
  `latitude` varchar(20) NOT NULL DEFAULT '0.0',
  `longitude` varchar(20) NOT NULL DEFAULT '0.0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `rescue_team_tasks`
--

INSERT INTO `rescue_team_tasks` (`id`, `task_help_code`, `rescue_team_id`, `assigning_admin_id`, `team_status`, `assignment_time`, `ip_address`, `latitude`, `longitude`) VALUES
(1, '351FDF', 'TM02', 'MSU/00046/022', 'Successful', '2022-04-19 12:53:12', '165.105.70.4', '37.751', '-97.822'),
(2, '99GTG1', 'TM03', 'MSU/00046/022', 'Assigned', '2022-04-19 20:44:29', '197.156.137.156', '-1.2841', '36.8155'),
(3, 'QE8KWM', 'TM01', 'MSU/00046/022', 'Successful', '2022-04-19 21:11:08', '0.0.0.0', '0.0', '0.0'),
(4, '5RIU55', 'TM01', 'MSU/00046/022', 'Failed', '2022-04-20 15:54:31', '197.156.137.174', '-1.2841', '36.8155'),
(5, 'E95V9Y', 'TM03', 'MSU/00046/022', 'Successful', '2022-04-25 07:21:55', '0.0.0.0', '0.0', '0.0'),
(6, 'QRGET6', 'TM02', 'MSU/00046/022', 'Failed', '2022-04-25 07:22:03', '102.167.135.236', '-1.2841', '36.8155'),
(7, 'OFVPFE', 'TM01', 'MSU/00046/022', 'Failed', '2022-04-25 07:22:16', '0.0.0.0', '0.0', '0.0'),
(8, '5CLE12', 'TM02', 'MSU/00046/022', 'Failed', '2022-04-25 12:18:37', '154.122.252.23', '-1.2841', '36.8155'),
(9, 'AKRI5E', 'TM02', 'MSU/00050/022', 'Assigned', '2022-05-02 06:21:53', '0.0.0.0', '0.0', '0.0'),
(10, '3AUGSD', 'TM01', 'MSU/00050/022', 'Assigned', '2022-05-02 06:23:21', '0.0.0.0', '0.0', '0.0'),
(11, 'K73CWE', 'TM02', 'MSU/00050/022', 'Responding', '2022-05-02 06:23:26', '0.0.0.0', '0.0', '0.0'),
(12, '2DLI48', 'TM03', 'MSU/00050/022', 'Responding', '2022-05-02 06:23:32', '0.0.0.0', '0.0', '0.0'),
(13, '0LDRDB', 'TM02', 'MSU/00050/022', 'Responding', '2022-05-02 06:23:37', '0.0.0.0', '0.0', '0.0'),
(14, 'HXZCEH', 'TM01', 'MSU/00050/022', 'Successful', '2022-05-02 06:23:43', '0.0.0.0', '0.0', '0.0'),
(15, 'J2DM4Y', 'TM03', 'MSU/00050/022', 'Failed', '2022-05-02 06:23:47', '0.0.0.0', '0.0', '0.0'),
(16, 'WR4Z8Y', 'TM02', 'MSU/00050/022', 'Successful', '2022-05-02 06:23:53', '0.0.0.0', '0.0', '0.0'),
(17, 'WZT3RU', 'TM01', 'MSU/00050/022', 'Responding', '2022-05-02 06:27:45', '0.0.0.0', '0.0', '0.0');

-- --------------------------------------------------------

--
-- Table structure for table `role_details`
--

CREATE TABLE `role_details` (
  `id` int(11) NOT NULL,
  `role_id` varchar(50) NOT NULL,
  `role_name` varchar(100) NOT NULL,
  `role_description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role_details`
--

INSERT INTO `role_details` (`id`, `role_id`, `role_name`, `role_description`) VALUES
(1, 'MSU/001A/022', 'Driver', 'Drive the assigned university vehicle'),
(2, 'MSU/001B/022', 'Paramedic', 'Provide emergency medical assistance, such as CPR or bandaging a wound. Quickly and efficiently assess a patient\'s condition and determine the best course of treatment.'),
(3, 'MSU/001C/022', 'Nurse', 'to ensure that every patient receives the direct and proper care they need.');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `id` int(20) NOT NULL,
  `regNum` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `emailaddress` varchar(255) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`id`, `regNum`, `firstname`, `lastname`, `emailaddress`, `phonenumber`, `password`, `date`) VALUES
(38, 'ACM/00010/020', 'Jane', 'Kiago', 'janekiago09@gmail.com', '0748407473', '7ddeff1603ed5a9185519ac900465b64', '2022-04-19 23:02:34'),
(30, 'ALI/00278/019', 'Diana', 'Muendo ', 'muendodiana4@gmail.com', '0796160942', 'a0cde091ece61a9f1b60ea475336758b', '2022-04-19 18:57:12'),
(47, 'APS/00003/020', 'Brenda ', 'Ziyeri', 'brendaziyeri@gmail.com', '0112608857', '311275ac69370d0706a71158491b63fd', '2022-04-21 22:22:22'),
(37, 'APS/00410/019', 'Brayden', 'Angie', 'brayangie13@gmail.com', '0116588099', 'f15f0231361cbe134ccc777119efa987', '2022-04-19 21:19:56'),
(46, 'BAF/00086/020', 'Yvonne', 'Onyango', 'mwaurauputy157@gmail.com', '0768405322', 'fa246d0262c3925617b0c72bb20eeb1d', '2022-04-21 16:59:41'),
(48, 'BBA/00132/020', 'Apostle ', 'Mutuku ', 'apostlemutuku2030@gmail.com', '0746122560', '98b0f157e997a7de7728e8ca61dd8022', '2022-04-23 09:49:04'),
(34, 'BEC|00848|019', 'Carenie', 'Amayo', 'carenamayo@gmail.com', '0725825692', '2a7d94e6d20ed9be4edca6f5ebe5e0ab', '2022-04-19 19:08:05'),
(32, 'BMM/00896/019', 'Grace', 'Fenda', 'fendagrace@gmail.com', '0789549639', '6ebe76c9fb411be97b3b0d48b791a7c9', '2022-04-19 19:04:11'),
(44, 'CCS/00001/020', 'Ian', 'Dum', 'gmai@gmail.com', '071234567', 'f34d07b202eaeadf913468e95d7fcb86', '2022-04-20 16:37:33'),
(2, 'CCS/00002/019', 'Lydia', 'Muthoni', 'muthonird987@gmail.com', '0732749587', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:35:48'),
(15, 'CCS/00100/019', 'Steve', 'Harley', 'harleysteve01@gmail.com', '0778945289', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:52:19'),
(3, 'CCS/00263/020', 'Janet', 'Kimutai', 'kimutaijanet54@gmail.com', '0762897525', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:33:47'),
(14, 'CCS/00336/019', 'Mutua', 'Benson', 'mutuaben46@gmail.com', '0765856589', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:50:33'),
(4, 'CCS/00352/020', 'Cliff', 'Ombeta', 'ombetaclifford90@gmail.com', '0765248796', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:31:55'),
(23, 'CCT/00008/019', 'Wabuti', 'Douglas', 'knillahwabuti@gmail.com', '0789526528', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 18:15:04'),
(22, 'CCT/00032/019', 'Omwanda', 'Clinton', 'clintonomwanda@gmail.com', '0796878595', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 18:13:55'),
(19, 'CCT/00046/020', 'Daphne', 'Ruth', 'daphneruth304@gmail.com', '0795857963', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 18:03:31'),
(21, 'CCT/00050/019', 'KIbet', 'Farouk', 'faroukkibet45@gmail.com', '0796328578', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 18:13:11'),
(25, 'CCT/00056/020', 'James', 'Ouma', 'oumajames36@gmail.com', '0796859685', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 18:16:47'),
(26, 'CIM/00016/020', 'Alex', 'Kaari', 'mutwirialex935@gmail.com', '0113219783', '22a10b04a781fc0575f18870fa6f9f1c', '2022-04-19 18:32:15'),
(1, 'CIM/00020/019', 'Mutuku', 'Mutheu', 'mutheumutuku23@gmail.com', '0765987425', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:27:32'),
(5, 'CIM/00046/019', 'Martin', 'Wambora', 'wamboramartin23@gmail.com', '0125468975', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:21:17'),
(13, 'CIM/00048/020', 'Richard', 'Kimutao', 'kimutaorichy34@gmail.com', '0732856274', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:43:56'),
(11, 'CIM/00050/019', 'Kilonzo', 'Mutua', 'mutuakilonzo@gmail.com', '0712524689', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:20:07'),
(6, 'CIM/00111/019', 'Jennifer', 'Martin', 'martinjenny45@gmail.com', '0762759814', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:29:34'),
(45, 'CIM/00193/019', 'Oloo', 'Qset', 'steveaustine188@gmail.com', '0727587156', '485773916f4b22a4eb363137f8586958', '2022-04-21 08:54:53'),
(17, 'CIS/00027/021', 'Wambora', 'Joyce', 'joycewambora@gmail.com', '0796857542', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:57:05'),
(16, 'CIS/00256/019', 'Robert', 'Njoroge', 'njorogerobert99@gmail.com', '0752639885', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:54:30'),
(18, 'CIS/00257/019', 'Kevin', 'Muthoka', 'muthokakevin56@gmail.com', '0796748574', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 18:00:12'),
(20, 'CIS/00998/019', 'Diana', 'Ndinda', 'ndindadiana27@gmail.com', '0732967432', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 18:06:15'),
(31, 'CIT/00005/019', 'Faith', 'Chepkoech', 'daktari76@gmail.com', '0768024466', 'ce046d35155801bdf544e6dbd0de10ad', '2022-04-19 18:57:39'),
(28, 'CIT/00006/019', 'Obonyo', 'Odhiambo', 'n.obonyo@yahoo.com', '0722488828', '1c67de5e4c059c9374062f0f3950c26c', '2022-04-19 18:51:06'),
(35, 'CIT/00012/019', 'Lisper', 'Ndegwa', 'lisperndegwa03@gmail.com', '0752337676', '3d69708ee30384a14d0e1d7ffa1a104a', '2022-04-19 19:29:41'),
(7, 'CIT/00046/019', 'Benson', 'Makau', 'bensonmakau2000@gmail.com', '0758413462', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 12:19:40'),
(8, 'CIT/00047/019', 'Charles', 'Kariuko', 'kariukicharles@gmail.com', '0769879425', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:15:49'),
(9, 'CIT/00048/019', 'Grace', 'Kimanthi', 'kimanthigrace02@gmail.com', '0745986589', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:17:15'),
(10, 'CIT/00049/019', 'Lydia', 'Odongo', 'odongolydia23@gmail.com', '0749898952', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:18:41'),
(41, 'CIT/00060/019', 'Kim', 'Mwangi', 'mutitujacob1998@gmail.com', '0758060919', 'af776cb87942ed740bafb50fb5cecf01', '2022-04-20 08:42:35'),
(29, 'CIT/00064/020', 'Jane', 'Kamau', 'janekamau@gmail.com', '0707523369', '8eaf8f117e2142b2d352f73e12e2bd79', '2022-04-19 18:56:13'),
(12, 'CIT/00111/019', 'Robert', 'Mwau', 'mwaurobert@gmail.com', '0741528596', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:25:55'),
(36, 'CIT/00159/019', 'Emanuel', 'Maina', 'mainaemanuel2@gmail.com', '0796876245', '31d5a2662af2969ec1bd412d9fe7f129', '2022-04-19 19:30:48'),
(24, 'CIT/00178/019', 'Alexander', 'Karanja', 'karanjaalex23@gmail.com', '0796857485', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 18:15:57'),
(39, 'CIT/00248/019', 'Mike', 'Njoro', 'mike@gmail.com', '0716002153', '9e1e06ec8e02f0a0074f2fcc6b26303b', '2022-04-20 00:23:36'),
(33, 'CUT/00040/019', 'Mark', 'cheprang', 'mcheprang@gmail.com', '0759217512', '81dc9bdb52d04dc20036dbd8313ed055', '2022-04-19 19:06:33'),
(40, 'ESC/00018/020', 'Dennis', 'Ondara', 'dennisondara4444@gmail.com', '0758122362', '124f6c291003662cacd910b161dd5390', '2022-04-20 06:56:51'),
(43, 'HHR/00135/019', 'David', 'Njuguna', 'davidp2@gmail.com', '0764534675', 'cd471a54291e4dd5f64de4c55409bc2d', '2022-04-20 15:18:39'),
(42, 'SBH/00543/023', 'Johnson', 'Kamau', 'Johnson@gmail.com', '0785639856', '25d55ad283aa400af464c76d713c07ad', '2022-04-20 15:12:02'),
(27, 'TMC/00100/019', 'John', 'Kiruki', 'kirukijohn6@gmail.com', '0745827790', 'b59c67bf196a4758191e42f76670ceba', '2022-04-19 18:50:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `uniq` (`id`);

--
-- Indexes for table `request_status`
--
ALTER TABLE `request_status`
  ADD PRIMARY KEY (`helpID`),
  ADD KEY `admNo` (`admNo`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `rescue_team`
--
ALTER TABLE `rescue_team`
  ADD PRIMARY KEY (`team_id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `rescue_team_members`
--
ALTER TABLE `rescue_team_members`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `rescue_team_id` (`rescue_team_id`) USING BTREE,
  ADD KEY `member_sno` (`id`);

--
-- Indexes for table `rescue_team_tasks`
--
ALTER TABLE `rescue_team_tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assigning_admin_id` (`assigning_admin_id`),
  ADD KEY `rescue_team_id` (`rescue_team_id`),
  ADD KEY `helpcode` (`task_help_code`);

--
-- Indexes for table `role_details`
--
ALTER TABLE `role_details`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`regNum`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request_status`
--
ALTER TABLE `request_status`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `rescue_team`
--
ALTER TABLE `rescue_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rescue_team_members`
--
ALTER TABLE `rescue_team_members`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rescue_team_tasks`
--
ALTER TABLE `rescue_team_tasks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `role_details`
--
ALTER TABLE `role_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `request_status`
--
ALTER TABLE `request_status`
  ADD CONSTRAINT `student_user` FOREIGN KEY (`admNo`) REFERENCES `student_details` (`regNum`);

--
-- Constraints for table `rescue_team_members`
--
ALTER TABLE `rescue_team_members`
  ADD CONSTRAINT `member_role` FOREIGN KEY (`role_id`) REFERENCES `role_details` (`role_id`),
  ADD CONSTRAINT `rescue_team` FOREIGN KEY (`rescue_team_id`) REFERENCES `rescue_team` (`team_id`);

--
-- Constraints for table `rescue_team_tasks`
--
ALTER TABLE `rescue_team_tasks`
  ADD CONSTRAINT `adminid` FOREIGN KEY (`assigning_admin_id`) REFERENCES `admin_details` (`admin_id`),
  ADD CONSTRAINT `helpid` FOREIGN KEY (`task_help_code`) REFERENCES `request_status` (`helpID`),
  ADD CONSTRAINT `teamid` FOREIGN KEY (`rescue_team_id`) REFERENCES `rescue_team` (`team_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
