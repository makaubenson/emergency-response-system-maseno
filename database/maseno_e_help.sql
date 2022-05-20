-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 20, 2022 at 11:03 AM
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
-- Table structure for table `failed_list`
--

CREATE TABLE `failed_list` (
  `id` int(20) NOT NULL,
  `student_helpcode` varchar(50) NOT NULL,
  `incident_description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `failed_list`
--

INSERT INTO `failed_list` (`id`, `student_helpcode`, `incident_description`) VALUES
(1, 'Z3P85U', 'Unfortunately,by the time we arrived, the student had sought other medical options and went to a private hospital'),
(2, 'ORXUMI', 'We were not able to help, he went to a private hospital'),
(3, 'T8F18M', 'We were not able to help');

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
  `emergency_type` varchar(50) NOT NULL,
  `emergency_description` varchar(255) DEFAULT 'No Description',
  `admNo` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request_status`
--

INSERT INTO `request_status` (`id`, `helpID`, `ip_address`, `request_latitude`, `request_longitude`, `status`, `emergency_type`, `emergency_description`, `admNo`, `timestamp`) VALUES
(23, '0IC4JI', '165.105.70.4', '-1.2550144', '36.8541696', 'Assigned', 'sickness', '', 'APS/00111/019', '2022-05-20 12:37:58'),
(3, '1H2553', '165.105.70.4', '-1.2550144', '36.8541696', 'Successful', 'sickness', 'I have shortness of breath, please come to my rescue', 'APS/00111/019', '2022-05-19 19:14:34'),
(17, '4X064O', '165.105.70.4', '-1.2550144', '36.8541696', 'Assigned', 'sickness', 'Having back pain', 'MIT/00660/019', '2022-05-20 09:49:05'),
(19, '5J3LD6', '165.105.70.4', '-1.2550144', '36.8541696', 'Responding', 'fire', 'My gas exploded, i have severe burns', 'MIT/00035/019', '2022-05-20 09:49:57'),
(20, '5VAP0L', '165.105.70.4', '-1.2550144', '36.8541696', 'Successful', 'other', 'My friend is not waking up, i think he is not breathing, please help him', 'MIT/00045/019', '2022-05-20 09:50:43'),
(22, '615EKP', '165.105.70.4', '-1.2550144', '36.8541696', 'Pending', 'sickness', 'No Description', 'CIT/00047/019', '2022-05-20 12:30:12'),
(14, '9GQB5R', '165.105.70.4', '-1.2550144', '36.8541696', 'Assigned', 'sickness', 'No Description', 'CCT/00333/019', '2022-05-20 09:46:35'),
(6, 'C95XMI', '165.105.70.4', '-1.2550144', '36.8541696', 'Pending', 'accident', 'I hurt my knee', 'CIT/00222/019', '2022-05-20 09:41:43'),
(21, 'F7GZTY', '165.105.70.4', '-1.2550144', '36.8541696', 'Assigned', 'sickness', 'My eye got hurt, am bleeding', 'CIS/00075/019', '2022-05-20 09:51:20'),
(15, 'H7DEW2', '165.105.70.4', '-1.2550144', '36.8541696', 'Assigned', 'accident', 'I fell with a motorbike', 'CCT/00955/019', '2022-05-20 09:47:16'),
(8, 'HPITTF', '165.105.70.4', '-1.2550144', '36.8541696', 'Pending', 'fire', 'My house got on fire and i my hand got burnt', 'MIT/00361/019', '2022-05-20 09:44:03'),
(12, 'JWDXGN', '165.105.70.4', '-1.2550144', '36.8541696', 'Successful', 'sickness', 'my stomach is so painful', 'CIS/00049/019', '2022-05-20 09:45:49'),
(7, 'KW1NJA', '165.105.70.4', '-1.2550144', '36.8541696', 'Responding', 'sickness', 'Not Feeling Okay', 'MIT/00120/019', '2022-05-20 09:43:27'),
(10, 'LK855W', '165.105.70.4', '-1.2550144', '36.8541696', 'Responding', 'accident', 'Got hurt playing football', 'CIM/00920/019', '2022-05-20 09:44:54'),
(16, 'LSRZ5J', '165.105.70.4', '-1.2550144', '36.8541696', 'Assigned', 'sickness', 'Have been feeling dizzy for almost 7 hours now', 'CIS/00780/019', '2022-05-20 09:48:32'),
(5, 'OFSHUH', '165.105.70.4', '-1.2550144', '36.8541696', 'Responding', 'sickness', 'I am not feeling well', 'CIT/00078/019', '2022-05-20 09:41:17'),
(18, 'ORXUMI', '165.105.70.4', '-1.2550144', '36.8541696', 'Failed', 'sickness', 'Broken my arm', 'CIT/00001/019', '2022-05-20 09:49:27'),
(11, 'S7V9L9', '165.105.70.4', '-1.2550144', '36.8541696', 'Assigned', 'sickness', 'Having severe headache', 'CIS/00240/019', '2022-05-20 09:45:20'),
(4, 'T8F18M', '165.105.70.4', '-1.2550144', '36.8541696', 'Failed', 'sickness', 'No Description', 'CIT/00111/019', '2022-05-19 21:40:27'),
(13, 'VX9YNY', '165.105.70.4', '-1.2550144', '36.8541696', 'Responding', 'sickness', 'I cant breath i am asthamatic', 'CCT/00078/019', '2022-05-20 09:46:14'),
(9, 'XB1K4W', '165.105.70.4', '-1.2550144', '36.8541696', 'Assigned', 'sickness', 'No Description', 'CIM/00046/019', '2022-05-20 09:44:20'),
(1, 'Y7HGQK', '165.105.70.4', '-0.007684', '34.6065696', 'Successful', 'accident', 'Got an injury while playing football', 'CIT/00046/019', '2022-05-18 11:49:02'),
(2, 'Z3P85U', '165.105.70.4', '-0.002114166666666667', '34.6117515', 'Failed', 'sickness', 'I am having fever, headache and joint pains', 'CIT/00047/019', '2022-05-19 14:42:55');

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
  `assignment_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `rescue_team_tasks`
--

INSERT INTO `rescue_team_tasks` (`id`, `task_help_code`, `rescue_team_id`, `assigning_admin_id`, `team_status`, `assignment_time`) VALUES
(1, 'Y7HGQK', 'TM02', 'MSU/00046/022', 'Successful', '2022-05-18 12:21:41'),
(2, 'Z3P85U', 'TM01', 'MSU/00046/022', 'Failed', '2022-05-19 14:43:44'),
(3, '1H2553', 'TM03', 'MSU/00046/022', 'Successful', '2022-05-19 19:21:08'),
(4, 'T8F18M', 'TM03', 'MSU/00046/022', 'Failed', '2022-05-19 21:40:37'),
(5, 'F7GZTY', 'TM02', 'MSU/00046/022', 'Assigned', '2022-05-20 09:51:48'),
(6, '5VAP0L', 'TM01', 'MSU/00046/022', 'Successful', '2022-05-20 09:52:04'),
(7, '5J3LD6', 'TM03', 'MSU/00046/022', 'Responding', '2022-05-20 09:52:17'),
(8, 'LSRZ5J', 'TM03', 'MSU/00046/022', 'Assigned', '2022-05-20 09:52:24'),
(9, 'ORXUMI', 'TM02', 'MSU/00046/022', 'Failed', '2022-05-20 09:52:42'),
(10, 'H7DEW2', 'TM02', 'MSU/00046/022', 'Assigned', '2022-05-20 09:52:46'),
(11, 'JWDXGN', 'TM02', 'MSU/00046/022', 'Successful', '2022-05-20 09:52:49'),
(12, '4X064O', 'TM01', 'MSU/00046/022', 'Assigned', '2022-05-20 09:52:58'),
(13, '9GQB5R', 'TM01', 'MSU/00046/022', 'Assigned', '2022-05-20 09:53:02'),
(14, 'LK855W', 'TM01', 'MSU/00046/022', 'Responding', '2022-05-20 09:53:05'),
(15, 'KW1NJA', 'TM02', 'MSU/00046/022', 'Responding', '2022-05-20 09:54:12'),
(16, 'VX9YNY', 'TM01', 'MSU/00046/022', 'Responding', '2022-05-20 09:55:41'),
(17, 'XB1K4W', 'TM03', 'MSU/00046/022', 'Assigned', '2022-05-20 09:57:47'),
(18, 'OFSHUH', 'TM03', 'MSU/00046/022', 'Responding', '2022-05-20 09:57:51'),
(19, 'S7V9L9', 'TM03', 'MSU/00046/022', 'Assigned', '2022-05-20 09:59:08'),
(20, '0IC4JI', 'TM01', 'MSU/00046/022', 'Assigned', '2022-05-20 12:42:17');

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
  `password_reset_token` varchar(500) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`id`, `regNum`, `firstname`, `lastname`, `emailaddress`, `phonenumber`, `password`, `password_reset_token`, `date`) VALUES
(3, 'APS/00111/019', 'Angela', 'Mutheu', 'mutheuangie42@gmail.com', '0746825789', '4e1a68f169ea4af35b8d980e2f67fa67', NULL, '2022-05-19 19:11:30'),
(13, 'CCT/00078/019', 'Risper', 'Wangechi', 'wangechirisper24@gmail.com', '0785957895', '4e1a68f169ea4af35b8d980e2f67fa67', NULL, '2022-05-20 09:25:18'),
(14, 'CCT/00333/019', 'Kevin', 'Ongechi', 'ongechikevin54@gmail.com', '0758412569', '4e1a68f169ea4af35b8d980e2f67fa67', NULL, '2022-05-20 09:26:03'),
(15, 'CCT/00955/019', 'Antony', 'Jefferson', 'jeffersonantony65@gmail.com', '0754895898', '4e1a68f169ea4af35b8d980e2f67fa67', NULL, '2022-05-20 09:28:40'),
(9, 'CIM/00046/019', 'Winfred', 'Mwende', 'mwendewinnie67@gmail.com', '0796587452', '4e1a68f169ea4af35b8d980e2f67fa67', NULL, '2022-05-20 09:19:29'),
(10, 'CIM/00920/019', 'Scholastica', 'Syombua', 'syombuascola34@gmail.com', '0765859874', '4e1a68f169ea4af35b8d980e2f67fa67', NULL, '2022-05-20 09:20:28'),
(12, 'CIS/00049/019', 'Syombua', 'Makali', 'makalisyombua1997@gmail.com', '0789528952', '4e1a68f169ea4af35b8d980e2f67fa67', NULL, '2022-05-20 09:24:04'),
(21, 'CIS/00075/019', 'Phenny', 'Rachael', 'rachaelpehenny@gmail.com', '0785985852', '4e1a68f169ea4af35b8d980e2f67fa67', NULL, '2022-05-20 09:34:23'),
(11, 'CIS/00240/019', 'Karim', 'Martin', 'martinkarim67@gmail.com', '0712658589', '4e1a68f169ea4af35b8d980e2f67fa67', NULL, '2022-05-20 09:23:18'),
(16, 'CIS/00780/019', 'Dan', 'Masengo', 'masengodanny45@gmail.com', '0745859587', '4e1a68f169ea4af35b8d980e2f67fa67', NULL, '2022-05-20 09:29:56'),
(18, 'CIT/00001/019', 'Charles', 'Kim', 'kimchaly56@gmail.com', '0785957485', '4e1a68f169ea4af35b8d980e2f67fa67', NULL, '2022-05-20 09:31:23'),
(1, 'CIT/00046/019', 'Benson', 'Makau', 'bensonmakau2000@gmail.com', '0758413462', '4e1a68f169ea4af35b8d980e2f67fa67', 'd381784c7ddd40f51ff80b97446f4770e61c93c2', '2022-04-19 12:19:40'),
(2, 'CIT/00047/019', 'James', 'Mwanzia', 'mwanziajames23@gmail.com', '0785948568', '4e1a68f169ea4af35b8d980e2f67fa67', NULL, '2022-05-19 14:24:33'),
(5, 'CIT/00078/019', 'Richard', 'Muchene', 'muchenerichy43@gmail.com', '0798987452', '4e1a68f169ea4af35b8d980e2f67fa67', NULL, '2022-05-20 09:07:46'),
(4, 'CIT/00111/019', 'Caleb', 'Kositany', 'kositanycaleb54@gmail.com', '0745859885', '4e1a68f169ea4af35b8d980e2f67fa67', NULL, '2022-05-19 21:40:02'),
(6, 'CIT/00222/019', 'David', 'Sang', 'sangdavid56@gmail.com', '0765898548', '4e1a68f169ea4af35b8d980e2f67fa67', NULL, '2022-05-20 09:09:24'),
(19, 'MIT/00035/019', 'Caroline', 'Syombua', 'syombuacaroline90@gmail.com', '0785958758', '4e1a68f169ea4af35b8d980e2f67fa67', NULL, '2022-05-20 09:32:41'),
(20, 'MIT/00045/019', 'Maureen', 'Nthenya', 'nthenyamaureen24@gmail.com', '0795785874', '4e1a68f169ea4af35b8d980e2f67fa67', NULL, '2022-05-20 09:33:30'),
(7, 'MIT/00120/019', 'Wambora', 'Lucy', 'lucywambora@gmail.com', '0758954278', '4e1a68f169ea4af35b8d980e2f67fa67', NULL, '2022-05-20 09:17:21'),
(8, 'MIT/00361/019', 'Lucia', 'Sammy', 'sammylucia24@gmail.com', '0798589568', '4e1a68f169ea4af35b8d980e2f67fa67', NULL, '2022-05-20 09:18:43'),
(17, 'MIT/00660/019', 'Faith ', 'Mwende', 'mwendefay@gmail.com', '0789657485', '4e1a68f169ea4af35b8d980e2f67fa67', NULL, '2022-05-20 09:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `success_list`
--

CREATE TABLE `success_list` (
  `id` int(20) NOT NULL,
  `student_helpcode` varchar(50) NOT NULL,
  `incident_description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `success_list`
--

INSERT INTO `success_list` (`id`, `student_helpcode`, `incident_description`) VALUES
(1, 'Y7HGQK', 'We found that the student has twisted his leg while playing football. Our paramedics helped him on the spot.'),
(2, '5VAP0L', 'We saved her life'),
(3, '1H2553', 'We saved Her,'),
(4, 'JWDXGN', 'Our paramedics were able to give Syombua some medicines which proved effective.');

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
-- Indexes for table `failed_list`
--
ALTER TABLE `failed_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_helpcode` (`student_helpcode`);

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
-- Indexes for table `success_list`
--
ALTER TABLE `success_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_helpcode` (`student_helpcode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_list`
--
ALTER TABLE `failed_list`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `request_status`
--
ALTER TABLE `request_status`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `role_details`
--
ALTER TABLE `role_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `success_list`
--
ALTER TABLE `success_list`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `failed_list`
--
ALTER TABLE `failed_list`
  ADD CONSTRAINT `failed_list` FOREIGN KEY (`student_helpcode`) REFERENCES `request_status` (`helpID`) ON UPDATE CASCADE;

--
-- Constraints for table `request_status`
--
ALTER TABLE `request_status`
  ADD CONSTRAINT `student_user` FOREIGN KEY (`admNo`) REFERENCES `student_details` (`regNum`) ON UPDATE CASCADE;

--
-- Constraints for table `rescue_team_members`
--
ALTER TABLE `rescue_team_members`
  ADD CONSTRAINT `member_role` FOREIGN KEY (`role_id`) REFERENCES `role_details` (`role_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rescue_team` FOREIGN KEY (`rescue_team_id`) REFERENCES `rescue_team` (`team_id`) ON UPDATE CASCADE;

--
-- Constraints for table `rescue_team_tasks`
--
ALTER TABLE `rescue_team_tasks`
  ADD CONSTRAINT `adminid` FOREIGN KEY (`assigning_admin_id`) REFERENCES `admin_details` (`admin_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `helpid` FOREIGN KEY (`task_help_code`) REFERENCES `request_status` (`helpID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `teamid` FOREIGN KEY (`rescue_team_id`) REFERENCES `rescue_team` (`team_id`) ON UPDATE CASCADE;

--
-- Constraints for table `success_list`
--
ALTER TABLE `success_list`
  ADD CONSTRAINT `success_list_ibfk_1` FOREIGN KEY (`student_helpcode`) REFERENCES `request_status` (`helpID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
