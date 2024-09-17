-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2024 at 06:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `candidate_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(20) NOT NULL,
  `skills` varchar(200) NOT NULL,
  `experience` varchar(200) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`candidate_id`, `name`, `email`, `phone`, `skills`, `experience`, `location`) VALUES
(101, 'Aungon Sakib', 'aungon.sakib@gmail.com', 2111213141, 'teaching, critical thinking', 'worked as a teacher in school for 1 year.', 'Gazipur'),
(102, 'Sinka Siddiki', 'sinka.siddiki@gmail.com', 506070801, 'accounting, financial management', 'worked as an accounting officer in a company for 2 years.', 'Faridpur'),
(103, 'Siam Sadman', 'siam.sadman@gmail.com', 203050801, 'java, python', 'worked as a frontend developer for 3 years.', 'Tangail'),
(104, 'Dipita Tasnim', 'dipita.tasnim@gmail.com', 705060403, 'strong skills in science and mathematics, management skills', 'worked as a pharmacist for 1 year.', 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `industry` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `name`, `industry`, `location`) VALUES
(11, 'Craftsmen', 'IT ', 'Tangail'),
(12, 'Bridge Health', 'Healthcare', 'Dhaka'),
(13, 'Learning Academy', 'Education', 'Gazipur'),
(14, 'Proficient', 'Finance', 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(5) NOT NULL,
  `title` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `required_skill` varchar(200) NOT NULL,
  `required_experience` varchar(200) NOT NULL,
  `salary` int(10) NOT NULL,
  `posted_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `title`, `location`, `required_skill`, `required_experience`, `salary`, `posted_date`) VALUES
(1, 'Frontend Developer', 'Tangail', 'python', '1 year working experience', 40000, '2024-09-11'),
(2, 'Principal', 'Gazipur', 'leadership, communication skill', '8 years of teaching experience', 65000, '2024-09-19'),
(3, 'Financial Analyst', 'Dhaka', 'build financial models, predict business scenarios', '4 years of working experience', 43000, '2024-07-05'),
(4, 'Pharmacist', 'Chittagong', 'strong skills in science, management skills', '2 years of working experience', 45000, '2024-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `job_application`
--

CREATE TABLE `job_application` (
  `application_id` int(5) NOT NULL,
  `candidate_id` int(5) NOT NULL,
  `company_id` int(5) NOT NULL,
  `job_id` int(5) NOT NULL,
  `application_date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_candidate`
--

CREATE TABLE `login_candidate` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_candidate`
--

INSERT INTO `login_candidate` (`username`, `password`) VALUES
('hello', 'jobsite');

-- --------------------------------------------------------

--
-- Table structure for table `login_company`
--

CREATE TABLE `login_company` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_company`
--

INSERT INTO `login_company` (`username`, `password`) VALUES
('hello', 'world');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `job_application`
--
ALTER TABLE `job_application`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `candidate_id` (`candidate_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `job_id` (`job_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `candidate_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1113;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_application`
--
ALTER TABLE `job_application`
  MODIFY `application_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `job_application`
--
ALTER TABLE `job_application`
  ADD CONSTRAINT `candidate_id` FOREIGN KEY (`candidate_id`) REFERENCES `job_application` (`application_id`),
  ADD CONSTRAINT `company_id` FOREIGN KEY (`company_id`) REFERENCES `job_application` (`application_id`),
  ADD CONSTRAINT `job_id` FOREIGN KEY (`job_id`) REFERENCES `job_application` (`application_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
