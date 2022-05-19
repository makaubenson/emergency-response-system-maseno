-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 19, 2022 at 07:11 PM
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
-- Table structure for table `failed-list`
--

CREATE TABLE `failed-list` (
  `id` int(20) NOT NULL,
  `student_helpcode` varchar(50) NOT NULL,
  `incident_description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `failed-list`
--

INSERT INTO `failed-list` (`id`, `student_helpcode`, `incident_description`) VALUES
(1, 'Z3P85U', 'Unfortunately,by the time we arrived, the student had sought other medical options and went to a private hospital');

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
  `emergency_description` varchar(255) DEFAULT NULL,
  `admNo` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request_status`
--

INSERT INTO `request_status` (`id`, `helpID`, `ip_address`, `request_latitude`, `request_longitude`, `status`, `emergency_type`, `emergency_description`, `admNo`, `timestamp`) VALUES
(3, '1H2553', '165.105.70.4', '-1.2550144', '36.8541696', 'Responding', 'sickness', 'I have shortness of breath, please come to my rescue', 'APS/00111/019', '2022-05-19 19:14:34'),
(4, 'T8F18M', '165.105.70.4', '-1.2550144', '36.8541696', 'Assigned', 'sickness', '', 'CIT/00111/019', '2022-05-19 21:40:27'),
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
(3, '1H2553', 'TM03', 'MSU/00046/022', 'Responding', '2022-05-19 19:21:08'),
(4, 'T8F18M', 'TM03', 'MSU/00046/022', 'Assigned', '2022-05-19 21:40:37');

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
(3, 'APS/00111/019', 'Angela', 'Mutheu', 'mutheuangie42@gmail.com', '0746825789', '8821fe54f8b9828c97081d56666b6cc9', NULL, '2022-05-19 19:11:30'),
(1, 'CIT/00046/019', 'Benson', 'Makau', 'bensonmakau2000@gmail.com', '0758413462', 'ebcfd5a11d7cf5ba89f838fc766be7a4', 'd381784c7ddd40f51ff80b97446f4770e61c93c2', '2022-04-19 12:19:40'),
(2, 'CIT/00047/019', 'James', 'Mwanzia', 'mwanziajames23@gmail.com', '0785948568', '8821fe54f8b9828c97081d56666b6cc9', NULL, '2022-05-19 14:24:33'),
(4, 'CIT/00111/019', 'Caleb', 'Kositany', 'kositanycaleb54@gmail.com', '0745859885', '8821fe54f8b9828c97081d56666b6cc9', NULL, '2022-05-19 21:40:02');

-- --------------------------------------------------------

--
-- Table structure for table `success-list`
--

CREATE TABLE `success-list` (
  `id` int(20) NOT NULL,
  `student_helpcode` varchar(50) NOT NULL,
  `incident_description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `success-list`
--

INSERT INTO `success-list` (`id`, `student_helpcode`, `incident_description`) VALUES
(2, 'Y7HGQK', 'We found that the student has twisted his leg while playing football. Our paramedics helped him on the spot.');

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
-- Indexes for table `failed-list`
--
ALTER TABLE `failed-list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `helpcode` (`student_helpcode`);

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
-- Indexes for table `success-list`
--
ALTER TABLE `success-list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `helpid` (`student_helpcode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed-list`
--
ALTER TABLE `failed-list`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request_status`
--
ALTER TABLE `request_status`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_details`
--
ALTER TABLE `role_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `success-list`
--
ALTER TABLE `success-list`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `failed-list`
--
ALTER TABLE `failed-list`
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
-- Constraints for table `success-list`
--
ALTER TABLE `success-list`
  ADD CONSTRAINT `success_list` FOREIGN KEY (`student_helpcode`) REFERENCES `request_status` (`helpID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
