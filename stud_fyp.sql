-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2022 at 03:35 PM
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
-- Database: `stud_fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `annoucement_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `announce_title` varchar(300) NOT NULL,
  `announce_detail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`annoucement_id`, `date`, `announce_title`, `announce_detail`) VALUES
(2, '2022-01-19', '', 'Evaluation 2 will be\r\nnext week. Please\r\ntake note.');

-- --------------------------------------------------------

--
-- Table structure for table `assignation`
--

CREATE TABLE `assignation` (
  `assignation_id` int(11) NOT NULL,
  `lecturer_ID` varchar(10) NOT NULL,
  `student_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignation`
--

INSERT INTO `assignation` (`assignation_id`, `lecturer_ID`, `student_id`) VALUES
(1, 'LC1234', 'CB20123');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `calID` int(11) NOT NULL,
  `day` date NOT NULL,
  `event` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`calID`, `day`, `event`) VALUES
(4, '2022-01-29', 'Submission 2'),
(5, '2022-01-29', 'Submission 1');

-- --------------------------------------------------------

--
-- Table structure for table `evaluator`
--

CREATE TABLE `evaluator` (
  `assign_id` int(11) NOT NULL,
  `studID` varchar(10) NOT NULL,
  `Eva1` varchar(10) NOT NULL,
  `Ins1` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evaluator`
--

INSERT INTO `evaluator` (`assign_id`, `studID`, `Eva1`, `Ins1`) VALUES
(4, 'CB20123', 'LC1234', 'LC1234');

-- --------------------------------------------------------

--
-- Table structure for table `fyp_project`
--

CREATE TABLE `fyp_project` (
  `project_ID` int(11) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `logbook_id` int(11) NOT NULL,
  `thesis_id` int(11) NOT NULL,
  `rating_id` int(11) NOT NULL,
  `industry_ID` varchar(10) NOT NULL,
  `lecturer_ID` varchar(10) NOT NULL,
  `annoucement_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fyp_project`
--

INSERT INTO `fyp_project` (`project_ID`, `student_id`, `logbook_id`, `thesis_id`, `rating_id`, `industry_ID`, `lecturer_ID`, `annoucement_id`) VALUES
(1, 'CB20123', 1, 1, 1, 'IN325432', 'LC1234', 1);

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
  `rubric_ID` int(10) NOT NULL,
  `student_id` varchar(30) NOT NULL,
  `USER_ID` int(10) NOT NULL,
  `logbook_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`industry_ID`, `industry_email`, `industry_phone`, `industry_representative`, `industry_company`, `industry_address`, `progress_status`, `rubric_ID`, `student_id`, `USER_ID`, `logbook_id`) VALUES
('IN325432', 'example@hotmail.com', '0116929114', 'saeed', 'Technology', 'Pahang gambang', 'Done', 1, 'CB20123', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `lecturer_ID` varchar(10) NOT NULL,
  `lecturer_name` varchar(100) NOT NULL,
  `lecturer_Email` varchar(100) NOT NULL,
  `lecturer_Phone` varchar(11) NOT NULL,
  `lecturer_type` varchar(20) NOT NULL,
  `progress_status` varchar(20) NOT NULL,
  `logbook_id` int(10) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `rubric_ID` int(10) NOT NULL,
  `assignation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`lecturer_ID`, `lecturer_name`, `lecturer_Email`, `lecturer_Phone`, `lecturer_type`, `progress_status`, `logbook_id`, `User_ID`, `student_id`, `rubric_ID`, `assignation_id`) VALUES
('LC1234', 'maisarah', 'maisarah@gmail.com', '01223456789', 'Supervisor', 'pending', 1, 2, 'CB20123', 1, 1),
('LC1235', 'khairul amin', 'khairul@gmail.com', '0123456789', 'Evaluator', 'done', 1, 5, 'CB20123', 1, 1),
('LC18278', 'Mohd Ali', 'example@gmail.com', '012-1234567', 'Coordinator', 'Done', 1, 6, 'CB20123', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `logbook_id` int(10) NOT NULL,
  `log_date` date NOT NULL,
  `log_day` int(31) NOT NULL,
  `log_activity` varchar(400) NOT NULL,
  `log_file` varchar(400) NOT NULL,
  `log_note` varchar(200) NOT NULL,
  `student_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`logbook_id`, `log_date`, `log_day`, `log_activity`, `log_file`, `log_note`, `student_id`) VALUES
(3, '2022-01-08', 1, 'test1234', 'BCS 2243 Video Progress Evaluation 1 Group 2B.pdf', 'test', 'CB20123');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `student_id` varchar(10) NOT NULL,
  `lecturer` int(11) NOT NULL,
  `industry` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`student_id`, `lecturer`, `industry`) VALUES
('CB20172', 50, 40);

-- --------------------------------------------------------

--
-- Table structure for table `ratingfyp`
--

CREATE TABLE `ratingfyp` (
  `rating_id` int(11) NOT NULL,
  `rating_score` int(11) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `lecturer_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratingfyp`
--

INSERT INTO `ratingfyp` (`rating_id`, `rating_score`, `student_id`, `lecturer_ID`) VALUES
(1, 10, 'CB20123', 'LC1234');

-- --------------------------------------------------------

--
-- Table structure for table `rubric`
--

CREATE TABLE `rubric` (
  `rubric_ID` int(10) NOT NULL,
  `logbook_id` int(10) NOT NULL,
  `log_feedback` varchar(100) NOT NULL,
  `weekly_evaluation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rubric`
--

INSERT INTO `rubric` (`rubric_ID`, `logbook_id`, `log_feedback`, `weekly_evaluation`) VALUES
(1, 1, 'Great job, maintain\r\nyour work this way', '20');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(30) NOT NULL,
  `stud_name` varchar(100) NOT NULL,
  `stud_program` varchar(32) NOT NULL,
  `stud_tel` varchar(11) NOT NULL,
  `stud_email` varchar(100) NOT NULL,
  `enroll_status` varchar(10) NOT NULL,
  `lecturer_ID` varchar(10) NOT NULL,
  `industry_ID` varchar(10) NOT NULL,
  `USER_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `stud_name`, `stud_program`, `stud_tel`, `stud_email`, `enroll_status`, `lecturer_ID`, `industry_ID`, `USER_ID`) VALUES
('CB20123', 'Mohd Abdul', 'Mechanical Engineering', '0122768974', 'abdul12@gmail.com', 'FYP1', 'LC18278', 'IN325432', 1);

-- --------------------------------------------------------

--
-- Table structure for table `thesis`
--

CREATE TABLE `thesis` (
  `thesis_id` int(11) NOT NULL,
  `thesis_type` varchar(40) NOT NULL,
  `thesis_date` date NOT NULL,
  `thesis_attach` varchar(400) NOT NULL,
  `student_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thesis`
--

INSERT INTO `thesis` (`thesis_id`, `thesis_type`, `thesis_date`, `thesis_attach`, `student_id`) VALUES
(22, 'test Proposal', '2022-01-20', 'BCS2243 Project Proposal Group 2B-2.pdf', 'CB20123');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `user_username` varchar(30) NOT NULL,
  `user_pass` varchar(30) NOT NULL,
  `user_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `user_username`, `user_pass`, `user_type`) VALUES
(2, 'AC1811', '1234', 'Admin'),
(9, 'FS1221', '1234', 'Faculty_Supervisor'),
(11, 'LE3417', '1234', 'Lecturer_Evaluator'),
(12, 'FI9112', '1234', 'Faculty_Industry'),
(13, 'EI7422', '1234', 'Evaluator_Industry'),
(14, 'CB20123', '1234', 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`annoucement_id`);

--
-- Indexes for table `assignation`
--
ALTER TABLE `assignation`
  ADD PRIMARY KEY (`assignation_id`),
  ADD KEY `FK_lect` (`lecturer_ID`),
  ADD KEY `FK_studnt` (`student_id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`calID`);

--
-- Indexes for table `evaluator`
--
ALTER TABLE `evaluator`
  ADD PRIMARY KEY (`assign_id`),
  ADD UNIQUE KEY `studID` (`studID`);

--
-- Indexes for table `fyp_project`
--
ALTER TABLE `fyp_project`
  ADD PRIMARY KEY (`project_ID`),
  ADD KEY `industry` (`industry_ID`),
  ADD KEY `announcement` (`annoucement_id`),
  ADD KEY `rating` (`rating_id`),
  ADD KEY `thesis` (`thesis_id`),
  ADD KEY `FK_logbookID` (`logbook_id`),
  ADD KEY `FK_LectID` (`lecturer_ID`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`industry_ID`),
  ADD KEY `logbook` (`logbook_id`),
  ADD KEY `rubric` (`rubric_ID`),
  ADD KEY `user` (`USER_ID`),
  ADD KEY `FK_stud` (`student_id`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`lecturer_ID`),
  ADD KEY `FK_log` (`logbook_id`),
  ADD KEY `FK_rub` (`rubric_ID`),
  ADD KEY `FK_student` (`student_id`),
  ADD KEY `FK_user` (`User_ID`),
  ADD KEY `FK_assign` (`assignation_id`);

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`logbook_id`),
  ADD KEY `FK` (`student_id`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `ratingfyp`
--
ALTER TABLE `ratingfyp`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `rubric`
--
ALTER TABLE `rubric`
  ADD PRIMARY KEY (`rubric_ID`),
  ADD KEY `FK_logbook` (`logbook_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `FK_Industry` (`industry_ID`),
  ADD KEY `FK_Lecturer` (`lecturer_ID`),
  ADD KEY `FK_userid` (`USER_ID`);

--
-- Indexes for table `thesis`
--
ALTER TABLE `thesis`
  ADD PRIMARY KEY (`thesis_id`),
  ADD KEY `FK_studentID` (`student_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `annoucement_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `assignation`
--
ALTER TABLE `assignation`
  MODIFY `assignation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `calID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `evaluator`
--
ALTER TABLE `evaluator`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fyp_project`
--
ALTER TABLE `fyp_project`
  MODIFY `project_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `logbook_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ratingfyp`
--
ALTER TABLE `ratingfyp`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rubric`
--
ALTER TABLE `rubric`
  MODIFY `rubric_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `thesis`
--
ALTER TABLE `thesis`
  MODIFY `thesis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
