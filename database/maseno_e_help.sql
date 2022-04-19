-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 19, 2022 at 06:41 PM
-- Server version: 10.3.34-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blinxcok_maseno_e_help`
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
  `registration_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
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
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request_status`
--

INSERT INTO `request_status` (`id`, `helpID`, `ip_address`, `request_latitude`, `request_longitude`, `status`, `admNo`, `timestamp`) VALUES
(1, '351FDF', '197.156.137.185', '-1.2841', '36.8155', 'Responding', 'CIT/00046/019', '2022-04-19 12:20:09'),
(2, 'AKRI5E', '41.81.44.207', '-1.2841', '36.8155', 'Pending', 'CIM/00016/020', '2022-04-19 18:32:50');

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
  `registration_timestamp` datetime NOT NULL DEFAULT current_timestamp()
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
  `time_of_registration` datetime NOT NULL DEFAULT current_timestamp()
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
  `assignment_time` datetime NOT NULL DEFAULT current_timestamp(),
  `ip_address` varchar(50) NOT NULL DEFAULT '0.0.0.0',
  `latitude` varchar(20) NOT NULL DEFAULT '0.0',
  `longitude` varchar(20) NOT NULL DEFAULT '0.0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rescue_team_tasks`
--

INSERT INTO `rescue_team_tasks` (`id`, `task_help_code`, `rescue_team_id`, `assigning_admin_id`, `team_status`, `assignment_time`, `ip_address`, `latitude`, `longitude`) VALUES
(9, '351FDF', 'TM02', 'MSU/00046/022', 'Responding', '2022-04-19 12:53:12', '197.156.137.185', '-1.2841', '36.8155');

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
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`id`, `regNum`, `firstname`, `lastname`, `emailaddress`, `phonenumber`, `password`, `date`) VALUES
(2, 'CCS/00002/019', 'Lydia', 'Muthoni', 'muthonird987@gmail.com', '0732749587', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:35:48'),
(15, 'CCS/00100/019', 'Steve', 'Harley', 'harleysteve01@gmail.com', '0778945289', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:52:19'),
(3, 'CCS/00263/020', 'Janet', 'Kimutai', 'kimutaijanet54@gmail.com', '0762897525', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:33:47'),
(14, 'CCS/00336/019', 'Mutua', 'Benson', 'mutuaben46@gmail.com', '0765856589', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:50:33'),
(4, 'CCS/00352/020', 'Cliff', 'Ombeta', 'ombetaclifford90@gmail.com', '0765248796', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:31:55'),
(23, 'CCT/00008/019', 'Wabuti', 'Douglas', 'knillahwabuti@gmail.com', '0789526528', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 18:15:04'),
(22, 'CCT/00032/019', 'Omwanda', 'Clinton', 'clintonomwanda@gmail.com', '0796878595', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 18:13:55'),
(19, 'CCT/00046/021', 'Daphne', 'Ruth', 'daphneruth304@gmail.com', '0795857963', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 18:03:31'),
(21, 'CCT/00050/019', 'KIbet', 'Farouk', 'faroukkibet45@gmail.com', '0796328578', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 18:13:11'),
(25, 'CCT/00056/020', 'James', 'Ouma', 'oumajames36@gmail.com', '0796859685', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 18:16:47'),
(26, 'CIM/00016/020', 'Alex', 'Kaari', 'mutwirialex935@gmail.com', '0113219783', '22a10b04a781fc0575f18870fa6f9f1c', '2022-04-19 18:32:15'),
(1, 'CIM/00020/019', 'Mutuku', 'Mutheu', 'mutheumutuku23@gmail.com', '0765987425', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:27:32'),
(5, 'CIM/00046/019', 'Martin', 'Wambora', 'wamboramartin23@gmail.com', '0125468975', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:21:17'),
(13, 'CIM/00048/020', 'Richard', 'Kimutao', 'kimutaorichy34@gmail.com', '0732856274', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:43:56'),
(11, 'CIM/00050/019', 'Kilonzo', 'Mutua', 'mutuakilonzo@gmail.com', '0712524689', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:20:07'),
(6, 'CIM/00111/019', 'Jennifer', 'Martin', 'martinjenny45@gmail.com', '0762759814', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:29:34'),
(17, 'CIS/00027/021', 'Wambora', 'Joyce', 'joycewambora@gmail.com', '0796857542', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:57:05'),
(16, 'CIS/00256/019', 'Robert', 'Njoroge', 'njorogerobert99@gmail.com', '0752639885', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:54:30'),
(18, 'CIS/00257/019', 'Kevin', 'Muthoka', 'muthokakevin56@gmail.com', '0796748574', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 18:00:12'),
(20, 'CIS/00998/019', 'Diana', 'Ndinda', 'ndindadiana27@gmail.com', '0732967432', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 18:06:15'),
(7, 'CIT/00046/019', 'Benson', 'Makau', 'bensonmakau2000@gmail.com', '0758413462', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 12:19:40'),
(8, 'CIT/00047/019', 'Charles', 'Kariuko', 'kariukicharles@gmail.com', '0769879425', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:15:49'),
(9, 'CIT/00048/019', 'Grace', 'Kimanthi', 'kimanthigrace02@gmail.com', '0745986589', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:17:15'),
(10, 'CIT/00049/019', 'Lydia', 'Odongo', 'odongolydia23@gmail.com', '0749898952', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:18:41'),
(12, 'CIT/00111/019', 'Stephen', 'Mwau', 'mwausteve@gmail.com', '0741528596', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 17:25:55'),
(24, 'CIT/00178/019', 'Alexander', 'Karanja', 'karanjaalex23@gmail.com', '0796857485', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-04-19 18:15:57');

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role_details`
--
ALTER TABLE `role_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
