-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 18, 2022 at 06:51 AM
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
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `helpID` varchar(255) NOT NULL DEFAULT '0',
  `ip` varchar(255) NOT NULL DEFAULT '0',
  `Latitude` varchar(255) NOT NULL DEFAULT '0',
  `Longitude` varchar(255) NOT NULL DEFAULT '0',
  `regNum` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`helpID`, `ip`, `Latitude`, `Longitude`, `regNum`) VALUES
('CIT00046019162', '208.98.12.1', '41.8483', '-87.6517', 'CIT/00046/019'),
('CIT00111019863', '208.98.12.1', '41.8483', '-87.6517', 'CIT/00111/019');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
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

INSERT INTO `student_details` (`regNum`, `firstname`, `lastname`, `emailaddress`, `phonenumber`, `password`, `date`) VALUES
('CIT/00045/019', 'Alex', 'Karanja', 'karanjaalex@gmail.com', '0797457895', '81dc9bdb52d04dc20036dbd8313ed055', '2022-02-13 13:58:55'),
('CIT/00046/019', 'Benson', 'Makau', 'bensonmakau2000@gmail.com', '0758413462', '8821fe54f8b9828c97081d56666b6cc9', '2022-02-13 13:47:06'),
('CIT/00047/019', 'James', 'Bondo', 'bondojames@gmail.com', '0784564524', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-02-17 14:18:57'),
('CIT/00111/019', 'Stephen', 'Mwau', 'mwausteve@gmail.com', '0712452586', 'ebcfd5a11d7cf5ba89f838fc766be7a4', '2022-02-17 17:49:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`helpID`),
  ADD KEY `regNum` (`regNum`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`regNum`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`regNum`) REFERENCES `student_details` (`regNum`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
