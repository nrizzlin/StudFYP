-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2022 at 05:17 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `annoucement_id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `announce_detail` varchar(500) NOT NULL,
  `lecturer_ID` varchar(10) NOT NULL,
  `student_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`annoucement_id`, `date`, `announce_detail`, `lecturer_ID`, `student_id`) VALUES
('AN0001', '2021-12-01', 'Evaluation 1 will be\r\nnext week. Please\r\ntake note', 'LC18278', 'cb20123');

-- --------------------------------------------------------

--
-- Table structure for table `assignation`
--

CREATE TABLE `assignation` (
  `assignation_id` varchar(10) NOT NULL,
  `lecturer_ID` varchar(10) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `industry_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignation`
--

INSERT INTO `assignation` (`assignation_id`, `lecturer_ID`, `student_id`, `industry_ID`) VALUES
('AS20137', 'LC18278', 'cb20123', 'IN325432');

-- --------------------------------------------------------

--
-- Table structure for table `fyp_project`
--

CREATE TABLE `fyp_project` (
  `project_ID` varchar(10) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `logbook_id` varchar(10) NOT NULL,
  `thesis_id` int(50) NOT NULL,
  `rating_id` varchar(10) NOT NULL,
  `industry_ID` varchar(10) NOT NULL,
  `lecturer_id` varchar(10) NOT NULL,
  `annoucement_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

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

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`industry_ID`, `industry_email`, `industry_phone`, `industry_representative`, `industry_company`, `industry_address`, `progress_status`, `rubric_ID`, `student_id`, `USER_ID`) VALUES
('IN325432', 'example@hotmail.com', '011-6929114', 'saeed', 'Technology', 'Pahang gambang', 'Done', '', 'cb20123', '1');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `lecturer_ID` varchar(10) NOT NULL,
  `lecturer_name` varchar(50) NOT NULL,
  `lecturer_Email` varchar(20) NOT NULL,
  `lecturer_Phone` varchar(11) NOT NULL,
  `lecturer_type` varchar(20) NOT NULL,
  `progress_status` varchar(20) NOT NULL,
  `logbook_id` int(50) NOT NULL,
  `USER_ID` varchar(10) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `rubric_ID` varchar(10) NOT NULL,
  `assignation_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`lecturer_ID`, `lecturer_name`, `lecturer_Email`, `lecturer_Phone`, `lecturer_type`, `progress_status`, `logbook_id`, `USER_ID`, `student_id`, `rubric_ID`, `assignation_id`) VALUES
('LC18278', 'Mohd Ali', 'example@gmail.com', '012-2345678', 'Coordinator', 'Done', 0, '1', 'cb20123', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `logbook_id` int(50) NOT NULL,
  `log_date` date NOT NULL,
  `log_day` varchar(31) NOT NULL,
  `log_activity` varchar(500) NOT NULL,
  `log_file` varchar(500) NOT NULL,
  `log_note` varchar(100) NOT NULL,
  `student_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`logbook_id`, `log_date`, `log_day`, `log_activity`, `log_file`, `log_note`, `student_id`) VALUES
(13, '2022-01-21', '1', '4', 'MINI PROJECT Sem2122-1 (3).pdf', 'add flow diagram', 'cb20012'),
(14, '2022-01-20', '2', 'test 123', 'use case.PNG', 'test', 'cb20023');

-- --------------------------------------------------------

--
-- Table structure for table `ratingfyp`
--

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

CREATE TABLE `rubric` (
  `rubric_ID` varchar(10) NOT NULL,
  `logbook_id` int(50) NOT NULL,
  `log_feedback` varchar(100) NOT NULL,
  `weekly_evaluation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

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

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `stud_name`, `stud_program`, `stud_tel`, `stud_email`, `enroll_status`, `lecturer_ID`, `industry_ID`, `USER_ID`) VALUES
('cb20123', 'Mohd Muqri bin Mohd Zikri', 'Mechanical Engineeri', '0122768974', 'abdul12@gmail.com', '', 'LC18278', 'IN325432', '1');

-- --------------------------------------------------------

--
-- Table structure for table `thesis`
--

CREATE TABLE `thesis` (
  `thesis_id` int(50) NOT NULL,
  `thesis_type` varchar(50) NOT NULL,
  `thesis_date` date NOT NULL,
  `thesis_attach` varchar(300) NOT NULL,
  `student_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thesis`
--

INSERT INTO `thesis` (`thesis_id`, `thesis_type`, `thesis_date`, `thesis_attach`, `student_id`) VALUES
(10, 'psd', '2022-01-15', 'UHF1111 WRITING REVISION LESSON 1-5 PARTB.pdf', ''),
(11, 'uml', '2022-01-13', 'PSM2 FLOWCHART.pdf', ''),
(12, 'update test', '2022-01-20', 'Chap 2_Defining Your Own Classes.pdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` varchar(10) NOT NULL,
  `user_username` varchar(10) NOT NULL,
  `user_pass` varchar(20) NOT NULL,
  `user_type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `user_username`, `user_pass`, `user_type`) VALUES
('1', 'muqri123', 'Z12@mel!masf', 'student');

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
  ADD KEY `ForeKey 3` (`rating_id`),
  ADD KEY `ForeKey 4` (`industry_ID`),
  ADD KEY `ForeKey 5` (`lecturer_id`),
  ADD KEY `ForeKey 6` (`annoucement_id`),
  ADD KEY `ForeKey 2` (`thesis_id`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`industry_ID`),
  ADD KEY `F1` (`USER_ID`),
  ADD KEY `F2` (`student_id`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`lecturer_ID`),
  ADD KEY `ForKey2` (`student_id`),
  ADD KEY `ForKey3` (`USER_ID`);

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`logbook_id`);

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
  ADD PRIMARY KEY (`thesis_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `logbook_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `thesis`
--
ALTER TABLE `thesis`
  MODIFY `thesis_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  ADD CONSTRAINT `ForeKey 2` FOREIGN KEY (`thesis_id`) REFERENCES `thesis` (`thesis_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ForeKey 3` FOREIGN KEY (`rating_id`) REFERENCES `ratingfyp` (`rating_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ForeKey 4` FOREIGN KEY (`industry_ID`) REFERENCES `industry` (`industry_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ForeKey 5` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturer` (`lecturer_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ForeKey 6` FOREIGN KEY (`annoucement_id`) REFERENCES `announcement` (`annoucement_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `industry`
--
ALTER TABLE `industry`
  ADD CONSTRAINT `F2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD CONSTRAINT `ForKey2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ForKey3` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `foreign_key` FOREIGN KEY (`logbook_id`) REFERENCES `logbook` (`logbook_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK2` FOREIGN KEY (`industry_ID`) REFERENCES `industry` (`industry_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK3` FOREIGN KEY (`lecturer_ID`) REFERENCES `lecturer` (`lecturer_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
