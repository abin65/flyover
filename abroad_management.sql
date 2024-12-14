-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2024 at 02:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abroad_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(30) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_duration` varchar(30) NOT NULL,
  `course_profile` varchar(100) NOT NULL,
  `course_description` varchar(300) NOT NULL,
  `course_fees` int(100) NOT NULL,
  `university` varchar(100) NOT NULL,
  `course_application` varchar(300) NOT NULL,
  `eligibility` varchar(100) NOT NULL,
  `course_start_date` date NOT NULL,
  `course_end_date` date NOT NULL,
  `institute_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_duration`, `course_profile`, `course_description`, `course_fees`, `university`, `course_application`, `eligibility`, `course_start_date`, `course_end_date`, `institute_id`) VALUES
(1, 'AI', '2 year', 'AI.jpg', 'fasdggfgufduasyfyfasdhgitfads\r\nfgaosifuyegdgewytyrtuutyiiuot', 200000, 'ktu', 'Python Django.docx', 'graduate any computer degree \r\nabove 6.5 CGPA\r\nILST eligible \r\n\r\n', '2024-10-01', '2026-06-16', 15),
(3, 'data analytics', '2 year', 'analytics.jpg', 'fasdggfgufduasyfyfasdhgitfads\nfgaosifuyegdgewytyrtuutyiiuot', 100000, 'anna', 'Python Django.docx', 'any graduates\r\n6.5 CGPA', '2024-10-08', '2024-10-16', 15),
(4, 'python master degree', '2 year', 'AI.jpg', 'sgrgwrueuifugsdiuygw\r\nfsadgfhdhfgjjghkjklhlhjl', 50000, 'ssk', 'Python Django.docx', 'any degree\r\ndsghdhgjeyjkety\r\ndgqhgwtryj', '2024-10-08', '2024-10-21', 15),
(6, 'AI', '2 year', 'Python Django.docx', 'sssssssssssssssss\r\nssssssssssssssss', 200000, 'ssk', 'Python Django.docx', 'ssss', '2024-10-01', '2024-10-18', 16);

-- --------------------------------------------------------

--
-- Table structure for table `course_application`
--

CREATE TABLE `course_application` (
  `course_apply_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `course_id` int(30) NOT NULL,
  `+2_certificate` varchar(30) NOT NULL,
  `10th_certificate` varchar(30) NOT NULL,
  `adhar` varchar(30) NOT NULL,
  `pan_card` varchar(50) NOT NULL,
  `passport` varchar(50) NOT NULL,
  `application` varchar(30) NOT NULL,
  `apply_status` varchar(30) NOT NULL,
  `institute_id` int(30) NOT NULL,
  `language` varchar(100) NOT NULL,
  `join_letter` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_application`
--

INSERT INTO `course_application` (`course_apply_id`, `user_id`, `course_id`, `+2_certificate`, `10th_certificate`, `adhar`, `pan_card`, `passport`, `application`, `apply_status`, `institute_id`, `language`, `join_letter`, `created_at`) VALUES
(1, 13, 1, 'Python Django.docx', 'Python Django.docx', 'Python Django.docx', 'Python Django.docx', 'Python Django.docx', 'Python Django.docx', 'approved', 15, 'English', '6711092b2d88a-Ribin Babu (CV).docx', '2024-10-17 12:55:07'),
(6, 13, 3, 'Python Django.docx', 'Python Django.docx', 'Python Django.docx', 'Python Django.docx', 'Python Django.docx', 'Python Django.docx', 'apply', 15, 'sss', NULL, '2024-10-17 09:11:54'),
(7, 13, 4, 'Python Django.docx', 'Python Django.docx', 'Python Django.docx', 'Python Django.docx', 'Python Django.docx', 'Python Django.docx', 'apply', 15, 'ssss', NULL, '2024-10-17 09:22:51');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `faculty_name` varchar(100) NOT NULL,
  `faculty_address` varchar(300) NOT NULL,
  `faculty_email` varchar(100) NOT NULL,
  `faculty_phone` varchar(100) NOT NULL,
  `faculty_country` varchar(100) NOT NULL,
  `faculty_photo` varchar(100) NOT NULL,
  `faculty_certificate` varchar(100) NOT NULL,
  `institute_id` int(100) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_name`, `faculty_address`, `faculty_email`, `faculty_phone`, `faculty_country`, `faculty_photo`, `faculty_certificate`, `institute_id`, `qualification`, `subject`, `position`) VALUES
(1, 'ram', 'Vazhikadavu', 'ram@gmail.com', '09061970203', 'IND', '1729067313828.jpg', '1729067313826.docx', 15, 'b.tech', 'maths', 'senior'),
(2, 'sravan', 'Vazhikadavu', 'sravan@gmail.com', '09061970208', 'IND', '1729067472644.jpg', '1729067472642.docx', 15, 'b.tech', 'data analist', 'senior'),
(3, 'syam', 'Vazhikadavu', 'syam@gmail.com', '09061970203', 'IND', '1729073167440.jpg', '1729073167439.docx', 15, 'b.tech', 'AI', 'senior'),
(4, 'Arunkumar tv', 'Vazhikadavu', 'arunkumarthanikkunel@gmail.com', '09061970203', 'IND', '1729073308538.jpg', '1729073308537.docx', 15, 'b.tech', 'dfsd', 'senior'),
(6, 'ss', 'Vazhikadavu', 'ss@gmail.com', '09061970203', 'IND', '1729077529416.jpg', '1729077529413.docx', 16, 'b.tech', 'gr', 'senior');

-- --------------------------------------------------------

--
-- Table structure for table `feedabck`
--

CREATE TABLE `feedabck` (
  `feedback_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `feedback` varchar(300) NOT NULL,
  `rating` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `institute_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedabck`
--

INSERT INTO `feedabck` (`feedback_id`, `user_id`, `feedback`, `rating`, `created_at`, `institute_id`) VALUES
(9, 5, 'good', 4, '2024-10-16 06:50:50', 9),
(10, 5, 'good', 3, '2024-10-16 07:47:17', 8);

-- --------------------------------------------------------

--
-- Table structure for table `institute_reg`
--

CREATE TABLE `institute_reg` (
  `institute_reg_id` int(11) NOT NULL,
  `institute_name` varchar(100) NOT NULL,
  `institute_address` varchar(300) NOT NULL,
  `institute_email` varchar(100) NOT NULL,
  `institute_phone` varchar(30) NOT NULL,
  `institute_photo` varchar(100) NOT NULL,
  `institute_country` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `document` varchar(100) NOT NULL,
  `login_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `institute_reg`
--

INSERT INTO `institute_reg` (`institute_reg_id`, `institute_name`, `institute_address`, `institute_email`, `institute_phone`, `institute_photo`, `institute_country`, `description`, `document`, `login_id`) VALUES
(8, 'kmp', 'Vazhikadav', 'kmp@gmail.com', '2147483647', '1729018384337.jpg', 'CAN', 'sgdksjhfasdfgitbkfiet qweewr55452456246thfghdgfyu', '1729018384336.docx', 15),
(9, 'srs', 'Vazhikadavu', 'srs@gmail.com', '2147483647', '1729018421606.jpg', 'CAN', 'sgdksjhfasdfgitbkfietqweewr gfdgfsddhggshhffdsdert55 452456246thfgh', '1729018421604.docx', 16),
(10, 'ktu', 'Vazhikadavu', 'ktu@gmail.com', '2147483647', '1729018469094.jpg', 'DEU', 'sgdksjhfasdfgitbkfietqweewr gfdgfsddhggshhffdsder t55452456246thfghdgfyu', '1729018469093.docx', 17),
(11, 'kkm', 'Vazhikadavu', 'kkm@gmail.com', '2147483647', '1729018512624.jpg', 'FRA', 'sgdksjhfasdfgitbkfi etqweewrgfdgfsddhggshhffdsde rt55452456246thfghdgfyu', '1729018512622.docx', 18);

-- --------------------------------------------------------

--
-- Table structure for table `internship`
--

CREATE TABLE `internship` (
  `internship_id` int(30) NOT NULL,
  `internship_title` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `stipend` int(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `requirement` varchar(100) NOT NULL,
  `post_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `institute_id` int(30) NOT NULL,
  `application` varchar(100) NOT NULL,
  `duration` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `internship`
--

INSERT INTO `internship` (`internship_id`, `internship_title`, `company_name`, `location`, `stipend`, `description`, `requirement`, `post_date`, `expiry_date`, `institute_id`, `application`, `duration`) VALUES
(1, 'ai', 'cyber', 'nellikuzhi', 2000, 'sssssssssssssssssss\r\nssssssssssssssssssss', 'ssssssssss\r\nssssssssssss', '2024-10-01', '2024-10-30', 15, 'Python Django.docx', 3),
(2, 'ai', 'cyber', 'nellikuzhi', 2000, 'sssssssssssssssssss\r\nssssssssssssssssssss', 'ssssssssss\r\nssssssssssss', '2024-10-01', '2024-10-30', 15, 'Python Django.docx', 3),
(3, 'python', 'dotcom', 'jegmany', 1000, 'sssssssssssssssssssssssssssss\r\nsssssssssssssssssssssssssss', 'ssssddddd\r\ndfdfffffff', '2024-10-01', '2024-10-15', 15, 'Python Django.docx', 3);

-- --------------------------------------------------------

--
-- Table structure for table `internship_application`
--

CREATE TABLE `internship_application` (
  `internship_apply_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `institute_id` int(30) NOT NULL,
  `internship_application` varchar(100) NOT NULL,
  `apply_status` varchar(30) NOT NULL,
  `experience` varchar(30) NOT NULL,
  `languages` varchar(100) NOT NULL,
  `skills` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `internship_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `internship_application`
--

INSERT INTO `internship_application` (`internship_apply_id`, `user_id`, `institute_id`, `internship_application`, `apply_status`, `experience`, `languages`, `skills`, `created_at`, `internship_id`) VALUES
(5, 13, 15, 'Python Django.docx', 'approved', '2 year', 'english', 'ssddff\r\nddddd', '2024-10-17 17:02:15', 1),
(6, 13, 15, 'Python Django.docx', 'applied', '3 year', 'english', 'assaasfaf\r\nasfdddsg', '2024-10-17 09:16:06', 2);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(30) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `salary` int(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `requirement` varchar(300) NOT NULL,
  `post_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `location` varchar(100) NOT NULL,
  `institute_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `job_title`, `company_name`, `salary`, `description`, `requirement`, `post_date`, `expiry_date`, `location`, `institute_id`) VALUES
(1, 'developer', 'cyber', 30000, 'dsdfsfdsdgfhjhfgjkjbshjggsgisdfoys\r\nebigpiugpusadgfdugiupdsufapugd', '3 year exp\r\nany degree\r\ncss,python,php', '2024-10-01', '2024-10-30', 'nellikuzhi', 15),
(2, 'data entry', 'dotcom', 40000, 'zsfsdfsdgfghwewtehyjytjtkjtkru\r\newqetreweywtyrtutyiiuyyoto', '3 year exp\r\nany degree', '2024-10-01', '2024-10-24', 'jegmany', 15),
(3, 'developer', 'bootcamp', 30000, 'dddddddddddddddddddddd\r\nddddddddddddddddddddd', 'aaaaa\r\nsssss', '2024-10-01', '2024-10-15', 'aaa', 15);

-- --------------------------------------------------------

--
-- Table structure for table `job_application`
--

CREATE TABLE `job_application` (
  `job_apply_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `institute_id` int(30) NOT NULL,
  `job_id` int(30) NOT NULL,
  `+2_certificate` varchar(100) NOT NULL,
  `10th_certificate` varchar(100) NOT NULL,
  `experience_certificate` varchar(100) NOT NULL,
  `language` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `apply_status` varchar(30) NOT NULL,
  `interview_status` varchar(50) NOT NULL,
  `scheduled_date` date NOT NULL,
  `join_letter` varchar(50) NOT NULL,
  `crated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_application`
--

INSERT INTO `job_application` (`job_apply_id`, `user_id`, `institute_id`, `job_id`, `+2_certificate`, `10th_certificate`, `experience_certificate`, `language`, `link`, `apply_status`, `interview_status`, `scheduled_date`, `join_letter`, `crated_at`) VALUES
(1, 13, 15, 1, 'Python Django.docx', 'Python Django.docx', 'Python Django.docx', 'English', 'https://meet.google.com/okq-dsgw-kuj', 'approved', 'pass', '2024-10-17', '', '2024-10-17 14:05:04'),
(2, 13, 15, 2, 'Python Django.docx', 'Python Django.docx', 'Python Django.docx', 'english', '', 'applied', 'pending', '0000-00-00', '', '2024-10-17 04:40:33');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(30) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `username`, `password`, `type`, `status`) VALUES
(2, 'admin', 'admin', 'admin', 'approve'),
(13, 'arun', 'arun', 'user', 'approve'),
(14, 'saji', 'saji', 'user', '0'),
(15, 'kmp', 'kmp', 'institute', 'approve'),
(16, 'srs', 'srs', 'institute', 'approve'),
(17, 'ktu', 'ktu', 'institute', 'approve'),
(18, 'kkm', 'kkm', 'institute', '0'),
(19, 'ratheesh', 'ratheesh', 'user', '0');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `program_id` int(30) NOT NULL,
  `program_name` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` varchar(100) NOT NULL,
  `venue` varchar(100) NOT NULL,
  `starting_time` time NOT NULL,
  `institute_id` int(30) NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`program_id`, `program_name`, `department`, `start_date`, `end_date`, `description`, `venue`, `starting_time`, `institute_id`, `end_time`) VALUES
(1, 'ssss', 'copmuter', '2024-10-01', '2024-10-31', 'sssccccccc\r\ncccccccccccccc', 'Canada', '01:33:00', 15, '03:34:00'),
(2, 'camp', 'copmuter', '2024-10-02', '2024-10-23', 'ssssssssssssssssssssssss\r\nsssssssssssssss', 'Canada', '03:31:00', 15, '05:31:00'),
(3, 'camp', 'maths', '2024-10-01', '2024-10-15', 'sssssssssssssssssssssss\r\nssssssss', 'Canada', '01:32:00', 15, '03:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `program_application`
--

CREATE TABLE `program_application` (
  `program_application_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `institute_id` int(30) NOT NULL,
  `program_id` int(30) NOT NULL,
  `apply_status` varchar(100) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_application`
--

INSERT INTO `program_application` (`program_application_id`, `user_id`, `institute_id`, `program_id`, `apply_status`, `created_at`) VALUES
(1, 13, 15, 1, 'approved', '2024-10-17 17:18:30.189029'),
(2, 13, 15, 2, 'applied', '2024-10-17 08:27:09.000000');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `user_reg_id` int(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `certificate` varchar(100) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `nation` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `login_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`user_reg_id`, `name`, `address`, `email`, `photo`, `certificate`, `qualification`, `nation`, `phone`, `login_id`) VALUES
(5, 'Arunkumar tv', 'Vazhikadav', 'arunkumarthanikkunel@gmail.com', '1729018248868.jpg', '1729018248867.docx', 'b.tech', 'IND', '09061970203', 13),
(6, 'saji', 'Vazhikadavu', 'saji@gmail.com', '1729018343439.jpg', '1729018343438.docx', 'b.tech', 'IND', '2147483647', 14),
(7, 'ratheesh', 'Vazhikadavu', 'ratheesh@gmail.com', '1729018979603.jpg', '1729018979601.pdf', 'b.tech', 'IND', '2147483647', 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_application`
--
ALTER TABLE `course_application`
  ADD PRIMARY KEY (`course_apply_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `feedabck`
--
ALTER TABLE `feedabck`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `institute_reg`
--
ALTER TABLE `institute_reg`
  ADD PRIMARY KEY (`institute_reg_id`);

--
-- Indexes for table `internship`
--
ALTER TABLE `internship`
  ADD PRIMARY KEY (`internship_id`);

--
-- Indexes for table `internship_application`
--
ALTER TABLE `internship_application`
  ADD PRIMARY KEY (`internship_apply_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `job_application`
--
ALTER TABLE `job_application`
  ADD PRIMARY KEY (`job_apply_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `program_application`
--
ALTER TABLE `program_application`
  ADD PRIMARY KEY (`program_application_id`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`user_reg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_application`
--
ALTER TABLE `course_application`
  MODIFY `course_apply_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedabck`
--
ALTER TABLE `feedabck`
  MODIFY `feedback_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `institute_reg`
--
ALTER TABLE `institute_reg`
  MODIFY `institute_reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `internship`
--
ALTER TABLE `internship`
  MODIFY `internship_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `internship_application`
--
ALTER TABLE `internship_application`
  MODIFY `internship_apply_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_application`
--
ALTER TABLE `job_application`
  MODIFY `job_apply_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `program_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `program_application`
--
ALTER TABLE `program_application`
  MODIFY `program_application_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `user_reg_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
