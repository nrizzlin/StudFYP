-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2021 at 03:16 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studfyp`
--
DROP DATABASE IF EXISTS `studfyp`;
CREATE DATABASE IF NOT EXISTS `studfyp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `studfyp`;

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

DROP TABLE IF EXISTS `announcement`;
CREATE TABLE `announcement` (
  `annoucement_id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `announce_detail` varchar(500) NOT NULL,
  `lecturer_ID` varchar(10) NOT NULL,
  `student_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assignation`
--

DROP TABLE IF EXISTS `assignation`;
CREATE TABLE `assignation` (
  `assignation_id` varchar(10) NOT NULL,
  `lecturer_ID` varchar(10) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `industry_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fyp_project`
--

DROP TABLE IF EXISTS `fyp_project`;
CREATE TABLE `fyp_project` (
  `project_ID` varchar(10) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `logbook_id` varchar(10) NOT NULL,
  `thesis_id` varchar(10) NOT NULL,
  `rating_id` varchar(10) NOT NULL,
  `industry_ID` varchar(10) NOT NULL,
  `lecturer_id` varchar(10) NOT NULL,
  `annoucement_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

DROP TABLE IF EXISTS `industry`;
CREATE TABLE `industry` (
  `industry_ID` varchar(10) NOT NULL,
  `industry_email` varchar(20) NOT NULL,
  `industry_phone` varchar(11) NOT NULL,
  `industry_representative` varchar(50) NOT NULL,
  `industry_company` varchar(50) NOT NULL,
  `industry_address` varchar(50) NOT NULL,
  `progress_status` varchar(10) NOT NULL,
  `rubric_ID` varchar(10) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `USER_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

DROP TABLE IF EXISTS `lecturer`;
CREATE TABLE `lecturer` (
  `lecturer_ID` varchar(10) NOT NULL,
  `lecturer_name` varchar(50) NOT NULL,
  `lecturer_Email` varchar(20) NOT NULL,
  `lecturer_Phone` varchar(11) NOT NULL,
  `lecturer_type` varchar(20) NOT NULL,
  `progress_status` varchar(20) NOT NULL,
  `logbook_id` varchar(10) NOT NULL,
  `USER_ID` varchar(10) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `rubric_ID` varchar(10) NOT NULL,
  `assignation_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

DROP TABLE IF EXISTS `logbook`;
CREATE TABLE `logbook` (
  `logbook_id` varchar(10) NOT NULL,
  `log_date` date NOT NULL,
  `Log_day` int(31) NOT NULL,
  `Log_activity` varchar(100) NOT NULL,
  `log_file` blob NOT NULL,
  `log_note` varchar(100) NOT NULL,
  `student_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ratingfyp`
--

DROP TABLE IF EXISTS `ratingfyp`;
CREATE TABLE `ratingfyp` (
  `rating_id` varchar(10) NOT NULL,
  `rating_score` int(11) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `lecturer_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rubric`
--

DROP TABLE IF EXISTS `rubric`;
CREATE TABLE `rubric` (
  `rubric_ID` varchar(10) NOT NULL,
  `logbook_id` varchar(10) NOT NULL,
  `log_feedback` varchar(100) NOT NULL,
  `weekly_evaluation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `student_id` varchar(10) NOT NULL,
  `stud_name` varchar(30) NOT NULL,
  `stud_program` varchar(20) NOT NULL,
  `stud_tel` varchar(11) NOT NULL,
  `stud_email` varchar(20) NOT NULL,
  `enroll_status` varchar(10) NOT NULL,
  `lecturer_ID` varchar(10) NOT NULL,
  `industry_ID` varchar(10) NOT NULL,
  `USER_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `thesis`
--

DROP TABLE IF EXISTS `thesis`;
CREATE TABLE `thesis` (
  `thesis_id` varchar(10) NOT NULL,
  `thesis_type` varchar(10) NOT NULL,
  `thesis_date` date NOT NULL,
  `thesis_attach` blob NOT NULL,
  `student_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `USER_ID` varchar(10) NOT NULL,
  `user_username` varchar(10) NOT NULL,
  `user_pass` varchar(20) NOT NULL,
  `user_type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`annoucement_id`),
  ADD KEY `FOREIGN KEY 1` (`lecturer_ID`),
  ADD KEY `FOREIGN KEY 2` (`student_id`);

--
-- Indexes for table `assignation`
--
ALTER TABLE `assignation`
  ADD PRIMARY KEY (`assignation_id`),
  ADD KEY `FK` (`lecturer_ID`),
  ADD KEY `FK 1` (`student_id`),
  ADD KEY `FK 2` (`industry_ID`);

--
-- Indexes for table `fyp_project`
--
ALTER TABLE `fyp_project`
  ADD PRIMARY KEY (`project_ID`),
  ADD KEY `ForeKey` (`student_id`),
  ADD KEY `ForeKey 1` (`logbook_id`),
  ADD KEY `ForeKey 2` (`thesis_id`),
  ADD KEY `ForeKey 3` (`rating_id`),
  ADD KEY `ForeKey 4` (`industry_ID`),
  ADD KEY `ForeKey 5` (`lecturer_id`),
  ADD KEY `ForeKey 6` (`annoucement_id`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`industry_ID`),
  ADD KEY `F1` (`USER_ID`),
  ADD KEY `F2` (`rubric_ID`),
  ADD KEY `F3` (`student_id`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`lecturer_ID`),
  ADD KEY `ForKey` (`logbook_id`),
  ADD KEY `ForKey1` (`rubric_ID`),
  ADD KEY `ForKey2` (`student_id`),
  ADD KEY `ForKey3` (`USER_ID`),
  ADD KEY `ForKey4` (`assignation_id`);

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`logbook_id`),
  ADD KEY `ForeignKey` (`student_id`);

--
-- Indexes for table `ratingfyp`
--
ALTER TABLE `ratingfyp`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `Foreign key` (`student_id`),
  ADD KEY `Foreign key1` (`lecturer_ID`);

--
-- Indexes for table `rubric`
--
ALTER TABLE `rubric`
  ADD PRIMARY KEY (`rubric_ID`),
  ADD KEY `foreign_key` (`logbook_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `FK` (`USER_ID`) USING BTREE,
  ADD KEY `FK2` (`industry_ID`),
  ADD KEY `FK3` (`lecturer_ID`);

--
-- Indexes for table `thesis`
--
ALTER TABLE `thesis`
  ADD PRIMARY KEY (`thesis_id`),
  ADD KEY `fkey` (`student_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `FOREIGN KEY 1` FOREIGN KEY (`lecturer_ID`) REFERENCES `lecturer` (`lecturer_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FOREIGN KEY 2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assignation`
--
ALTER TABLE `assignation`
  ADD CONSTRAINT `FK` FOREIGN KEY (`lecturer_ID`) REFERENCES `lecturer` (`lecturer_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK 1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK 2` FOREIGN KEY (`industry_ID`) REFERENCES `industry` (`industry_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fyp_project`
--
ALTER TABLE `fyp_project`
  ADD CONSTRAINT `ForeKey` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ForeKey 1` FOREIGN KEY (`logbook_id`) REFERENCES `logbook` (`logbook_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ForeKey 2` FOREIGN KEY (`thesis_id`) REFERENCES `thesis` (`thesis_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ForeKey 3` FOREIGN KEY (`rating_id`) REFERENCES `ratingfyp` (`rating_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ForeKey 4` FOREIGN KEY (`industry_ID`) REFERENCES `industry` (`industry_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ForeKey 5` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturer` (`lecturer_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ForeKey 6` FOREIGN KEY (`annoucement_id`) REFERENCES `announcement` (`annoucement_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `industry`
--
ALTER TABLE `industry`
  ADD CONSTRAINT `F1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `F2` FOREIGN KEY (`rubric_ID`) REFERENCES `rubric` (`rubric_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `F3` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD CONSTRAINT `ForKey` FOREIGN KEY (`logbook_id`) REFERENCES `logbook` (`logbook_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ForKey1` FOREIGN KEY (`rubric_ID`) REFERENCES `rubric` (`rubric_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ForKey2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ForKey3` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ForKey4` FOREIGN KEY (`assignation_id`) REFERENCES `assignation` (`assignation_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logbook`
--
ALTER TABLE `logbook`
  ADD CONSTRAINT `ForeignKey` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratingfyp`
--
ALTER TABLE `ratingfyp`
  ADD CONSTRAINT `Foreign key` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Foreign key1` FOREIGN KEY (`lecturer_ID`) REFERENCES `lecturer` (`lecturer_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rubric`
--
ALTER TABLE `rubric`
  ADD CONSTRAINT `foreign_key` FOREIGN KEY (`logbook_id`) REFERENCES `logbook` (`logbook_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK2` FOREIGN KEY (`industry_ID`) REFERENCES `industry` (`industry_ID`),
  ADD CONSTRAINT `FK3` FOREIGN KEY (`lecturer_ID`) REFERENCES `lecturer` (`lecturer_ID`);

--
-- Constraints for table `thesis`
--
ALTER TABLE `thesis`
  ADD CONSTRAINT `fkey` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
