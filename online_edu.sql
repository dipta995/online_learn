-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2020 at 02:47 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_edu`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_table`
--

CREATE TABLE `category_table` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(266) NOT NULL,
  `category_image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`category_id`, `category_name`, `category_image`) VALUES
(1, 'Programming', 'img/categories/1.jpg'),
(2, 'Web Design', 'img/categories/2.jpg'),
(3, 'Illustration & Drawing', 'img/categories/3.jpg'),
(4, 'Social Media', 'img/categories/4.jpg'),
(5, 'Photoshop', 'img/categories/5.jpg'),
(6, 'Cryptocurrencies', 'img/categories/6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comment_table`
--

CREATE TABLE `comment_table` (
  `comment_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `course_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_table`
--

INSERT INTO `comment_table` (`comment_id`, `student_id`, `comment`, `course_id`, `date`) VALUES
(1, 1, 'comment one', 1, '2020-12-18 17:52:34'),
(2, 5, 'comment two', 2, '2020-12-18 17:52:34'),
(3, 1, 'comment three', 2, '2020-12-18 17:52:34'),
(4, 5, 'comment four', 1, '2020-12-18 17:52:34'),
(5, 1, 'comment five', 1, '2020-12-18 17:52:34'),
(6, 0, 'check comment', 1, '2020-12-19 07:00:34'),
(7, 1, 'check comment', 1, '2020-12-19 07:01:01');

-- --------------------------------------------------------

--
-- Table structure for table `course_table`
--

CREATE TABLE `course_table` (
  `course_id` int(11) NOT NULL,
  `course_title` varchar(266) NOT NULL,
  `course_details` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `price` varchar(300) NOT NULL,
  `course_image` varchar(250) NOT NULL,
  `course_feature` tinyint(4) NOT NULL,
  `pay_status` tinyint(4) NOT NULL,
  `rat_total` int(11) NOT NULL,
  `rat_hit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_table`
--

INSERT INTO `course_table` (`course_id`, `course_title`, `course_details`, `category_id`, `teacher_id`, `price`, `course_image`, `course_feature`, `pay_status`, `rat_total`, `rat_hit`) VALUES
(1, 'Art & Crafts', 'Lorem ipsum dolor sit amet, consectetur', 1, 1, '2500', 'img/courses/1.jpg', 1, 1, 25, 6),
(2, 'IT Development', 'Lorem ipsum dolor sit amet, consectetur', 2, 2, '5555', 'img/courses/2.jpg', 1, 1, 28, 8),
(3, 'Socia Media', 'Lorem ipsum dolor sit amet, consectetur', 3, 1, '0', 'img/courses/3.jpg', 0, 0, 31, 7),
(10, 'test', 'fsdf sdf sd fs', 2, 1, '1000', 'img/8558295635_b1c5ce2794_b.jpg', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `enrole_student_list`
--

CREATE TABLE `enrole_student_list` (
  `enrole_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `pay_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrole_student_list`
--

INSERT INTO `enrole_student_list` (`enrole_id`, `student_id`, `course_id`, `price`, `pay_status`) VALUES
(18, 0, 0, '0', 0),
(19, 1, 2, '5555', 0),
(20, 1, 3, '0', 0),
(21, 1, 10, '1000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ratecheck_table`
--

CREATE TABLE `ratecheck_table` (
  `ratcheck_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratecheck_table`
--

INSERT INTO `ratecheck_table` (`ratcheck_id`, `course_id`, `student_id`) VALUES
(4, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `replay_table`
--

CREATE TABLE `replay_table` (
  `replay_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `replay` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replay_table`
--

INSERT INTO `replay_table` (`replay_id`, `comment_id`, `teacher_id`, `replay`, `date`) VALUES
(1, 1, 1, 'replay one', '2020-12-18 18:01:23'),
(2, 1, 1, 'replay two', '2020-12-18 18:01:23'),
(4, 1, 1, 'test', '2020-12-19 07:28:29'),
(5, 4, 1, 'replay for comment four', '2020-12-19 07:28:43');

-- --------------------------------------------------------

--
-- Table structure for table `student_table`
--

CREATE TABLE `student_table` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(200) NOT NULL,
  `student_email` varchar(266) NOT NULL,
  `student_phone` varchar(200) NOT NULL,
  `student_password` varchar(300) NOT NULL,
  `gender` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_table`
--

INSERT INTO `student_table` (`student_id`, `student_name`, `student_email`, `student_phone`, `student_password`, `gender`) VALUES
(1, 'student', 'student@gmail.com', '123456789', '123', 'male'),
(5, 'Dipta', 'dipta@gmail.com', '4546874', '12', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_table`
--

CREATE TABLE `teacher_table` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(300) NOT NULL,
  `teacher_email` varchar(300) NOT NULL,
  `teacher_phone` varchar(300) NOT NULL,
  `teacher_image` varchar(266) NOT NULL,
  `teacher_password` varchar(266) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_table`
--

INSERT INTO `teacher_table` (`teacher_id`, `teacher_name`, `teacher_email`, `teacher_phone`, `teacher_image`, `teacher_password`) VALUES
(1, 'Sohan', 'sohan@gmail.com', '1234656798', 'img/authors/7.jpg', '12'),
(2, 'Nayon', 'nayon@gmail.com', '123465678756', 'img/authors/7.jpg', '12'),
(3, 'Test mante', 'test@gmail.com', '123456789962', 'img/authors/7.jpg', '12');

-- --------------------------------------------------------

--
-- Table structure for table `video_table`
--

CREATE TABLE `video_table` (
  `video_id` int(11) NOT NULL,
  `video_title` varchar(300) NOT NULL,
  `video_file` varchar(300) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video_table`
--

INSERT INTO `video_table` (`video_id`, `video_title`, `video_file`, `course_id`) VALUES
(1, 'Tu_one', 'video/video.mp4', 10),
(2, 'Tu_two', 'video/video1.mp4', 10),
(3, 'fsf', 'video/2020-09-27-14-41-43.flv', 10),
(5, 'aa', 'video/Bangla_Movie_Song_Ke_Bashi_Bajai_Re_Harmonium_Tutorial(360p).mp4', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment_table`
--
ALTER TABLE `comment_table`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `course_table`
--
ALTER TABLE `course_table`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `enrole_student_list`
--
ALTER TABLE `enrole_student_list`
  ADD PRIMARY KEY (`enrole_id`);

--
-- Indexes for table `ratecheck_table`
--
ALTER TABLE `ratecheck_table`
  ADD PRIMARY KEY (`ratcheck_id`);

--
-- Indexes for table `replay_table`
--
ALTER TABLE `replay_table`
  ADD PRIMARY KEY (`replay_id`);

--
-- Indexes for table `student_table`
--
ALTER TABLE `student_table`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `teacher_table`
--
ALTER TABLE `teacher_table`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `video_table`
--
ALTER TABLE `video_table`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_table`
--
ALTER TABLE `category_table`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comment_table`
--
ALTER TABLE `comment_table`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course_table`
--
ALTER TABLE `course_table`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `enrole_student_list`
--
ALTER TABLE `enrole_student_list`
  MODIFY `enrole_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ratecheck_table`
--
ALTER TABLE `ratecheck_table`
  MODIFY `ratcheck_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `replay_table`
--
ALTER TABLE `replay_table`
  MODIFY `replay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_table`
--
ALTER TABLE `student_table`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teacher_table`
--
ALTER TABLE `teacher_table`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `video_table`
--
ALTER TABLE `video_table`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
