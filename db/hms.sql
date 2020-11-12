-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2020 at 09:39 AM
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
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `uid` int(11) NOT NULL,
  `admin_image` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_birthday` varchar(255) NOT NULL,
  `admin_posts` text NOT NULL,
  `admin_phone` varchar(255) NOT NULL,
  `admin_gender` text NOT NULL,
  `admin_reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `first_name`, `last_name`, `uid`, `admin_image`, `admin_email`, `admin_pass`, `admin_birthday`, `admin_posts`, `admin_phone`, `admin_gender`, `admin_reg_date`) VALUES
(7, 'admin', 'monogram', 123, 'admin/madmin1.png.49', 'admin@gmail.com', 'admin123', '1111-01-01', 'yes', '1111111111', 'Male', '2020-04-27 17:51:02'),
(10, 'admin2', 'last', 123, 'admin/madmin1.png', 'admin2@gmail.com', 'admin123', '2000-02-01', 'no', '9876543210', 'Male', '2020-05-25 06:13:16');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `user_id`, `user_type`, `date`) VALUES
(4, 4, 'student', '2020-05-01'),
(5, 3, 'staff', '2020-05-01'),
(6, 4, 'student', '2020-04-11'),
(7, 4, 'student', '2020-04-10'),
(8, 4, 'student', '2020-04-15'),
(9, 4, 'student', '2020-01-13'),
(10, 4, 'student', '2020-04-17'),
(11, 4, 'student', '2019-08-10'),
(12, 4, 'student', '2019-12-11'),
(13, 4, 'student', '2020-05-11'),
(14, 4, 'student', '2020-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_by` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `post_id`, `student_id`, `comment`, `comment_author`, `comment_by`, `date`) VALUES
(5, 18, 7, 'First comment', 'admin', 'admin', '2020-04-28 07:12:57'),
(6, 18, 7, 'First comment', 'admin', 'admin', '2020-04-28 07:18:39'),
(7, 17, 7, 'comment for only image', 'admin', 'admin', '2020-04-28 07:22:55'),
(8, 15, 4, 'commenting as admin', 'admin', 'admin', '2020-04-28 12:36:05'),
(9, 13, 4, 'comment by admin to lokesh', 'admin', 'admin', '2020-04-30 09:23:55'),
(10, 14, 4, 'working bro', 'admin', 'admin', '2020-04-30 09:25:05'),
(11, 19, 4, 'commented from back up', 'lokesh_chikkula', 'student', '2020-05-08 10:50:35'),
(12, 23, 4, 'commenting on post', 'lokesh_chikkula', 'student', '2020-05-25 00:34:36'),
(13, 14, 4, 'I am intrested', 'lokesh_chikkula', 'student', '2020-05-25 00:36:19'),
(14, 22, 7, 'comment from admin', 'admin', 'admin', '2020-05-25 02:45:38'),
(16, 24, 7, 'comment from lokesh', 'lokesh_chikkula_404', 'student', '2020-05-25 06:05:06');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `content`) VALUES
(1, 'Feed back'),
(4, 'feed back from staff'),
(5, 'second feed back from student'),
(6, 'Feed back from the student backup'),
(7, 'feedback from staff'),
(8, 'Feedback from staff');

-- --------------------------------------------------------

--
-- Table structure for table `leave_applications`
--

CREATE TABLE `leave_applications` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_applications`
--

INSERT INTO `leave_applications` (`id`, `staff_id`, `reason`, `from_date`, `to_date`, `permission`) VALUES
(2, 3, 'sick leave', '2020-05-01', '2020-05-03', 'yes'),
(3, 3, 'Home Sick', '2020-03-29', '2020-04-07', 'yes'),
(4, 3, 'Home Sick', '2020-05-30', '2020-06-06', 'notyet'),
(5, 3, 'some reason', '2020-06-04', '2020-06-06', 'notyet'),
(6, 5, 'Sick leave', '2020-05-04', '2020-05-19', 'notyet');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `dayNo` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `break_op1` varchar(255) NOT NULL,
  `break_op2` varchar(255) NOT NULL,
  `lunch_veg` varchar(255) NOT NULL,
  `lunch_nonveg` varchar(255) NOT NULL,
  `snacks` varchar(255) NOT NULL,
  `dinner_veg` varchar(255) NOT NULL,
  `dinner_nonveg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`dayNo`, `day`, `break_op1`, `break_op2`, `lunch_veg`, `lunch_nonveg`, `snacks`, `dinner_veg`, `dinner_nonveg`) VALUES
(5, 'FRIDAY', 'Boiled Egg/ Milk,\r\nBread , Butter , Jam', 'CholY Bhature 2-pc', 'Rasmalai, Alu Saag', 'Rasmalai, Fish curry', 'Vada Pav/ Cake /Buiscuits', 'Fried Rice, Chana Dal, Paneer,', 'Fried Rice, Chana Dal, Dry Chicken'),
(1, 'MONDAY', 'Green Peas, Kachuri', 'Omlete/Sprouts,\r\nBread, Butter, Jam', 'Alu Bhujia, Curd', 'Alu Bhujia, Curd', 'Veg Cutlet 3pc/ Biscuit', 'Cauliflower Alu Curry + Ice cream', 'Egg Bhujia'),
(6, 'SATURDAY', 'Boiled Egg/Milk, \r\n\r\nBread, Butter ,Jam', 'Puri', 'Chana Masala + Gulab Jamun', 'Fish Curry', 'Veg Roll/Egg Roll', 'Kichidi-papad', 'Kichidi-papad'),
(7, 'SUNDAY', 'Boiled Egg/Milk,Bread, Butter', 'Vada + Idli, Sambar', 'Alu Chokha, butter Milk', 'Alu Chokha, butter Milk', 'Panipuri, Biscuits', 'Veg Biriyani + ice cream', 'Chicken biriyani + Half Egg'),
(4, 'THURSDAY', 'Boiled Egg/Milk, \r\nBread, Butter Jam', 'Alu Paratha 2pc,\r\nChutney, Curd', 'Soyabean Masala/Alu Palak curry', 'Soyabean Masala/Alu Palak curry', 'Samosa/Cake/Biscuits + coffe', 'Cabbage Alu Curry', 'Egg Curry 1-pc'),
(2, 'TUESDAY', 'Boiled Egg/Sprouts,\r\nBrad, Butter, Jam', 'Masala Dosa 1pc,\r\nSambar, chutney ', 'Louki Chana Dal Au Curry/\r\nAluZeera Curry + Curd/Sweet', 'Louki Chana Dal Au Curry/\r\nAluZeera Curry + Curd/Sweet', 'Sandwich 1-pc/Biscuit, Tea', 'Rajma Curry', 'Rajma Curry'),
(3, 'WEDNESDAY', 'Omlete/Sprouts,\r\nBread, butter', 'Uthapam - 2', 'Kadi Pakora', 'Egg Curry', 'Veg Chowmin/\r\nBiscuits, Tea', 'Fried Rice, Chana Dal,\r\nChilli Paneer', 'Chicken Butter Masala');

-- --------------------------------------------------------

--
-- Table structure for table `messeges`
--

CREATE TABLE `messeges` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` text NOT NULL,
  `admin_id` int(11) NOT NULL,
  `msg_body` varchar(255) NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `msg_seen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messeges`
--

INSERT INTO `messeges` (`id`, `user_id`, `user_type`, `admin_id`, `msg_body`, `msg_date`, `msg_seen`) VALUES
(1, 4, 'student', 7, 'first message', '2020-05-01 16:23:22', 'yes'),
(2, 4, 'student', 7, 'second message', '2020-05-01 16:24:45', 'yes'),
(4, 4, 'student', 7, 'hello', '2020-05-01 17:41:33', 'yes'),
(6, 4, 'student', 7, 'hello lokesh , meet me in office', '2020-05-25 02:50:14', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `mess_complaints`
--

CREATE TABLE `mess_complaints` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `complaint` varchar(255) NOT NULL,
  `complaint_type` text NOT NULL,
  `reply` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mess_complaints`
--

INSERT INTO `mess_complaints` (`id`, `student_id`, `complaint`, `complaint_type`, `reply`, `date`) VALUES
(3, 4, 'Make the sambar more spicy and avoid potatoes as much as possible', 'mess', '', '2020-04-27 16:32:17'),
(4, 4, 'Food is good', 'mess', 'thank you', '2020-04-28 11:46:31'),
(5, 5, 'third mess complaint', 'mess', 'reply from staff', '2020-04-29 04:58:39'),
(6, 5, 'this is room complaint', 'room', '', '2020-04-29 05:09:20'),
(7, 5, 'this is a room complaint', 'room', '', '2020-04-29 13:49:06'),
(8, 4, 'mess complaint form ', 'mess', 'Reply from backup staff', '2020-05-08 12:26:04'),
(9, 4, 'room complaint from backup', 'room', 'Reply to the room complaint', '2020-05-08 12:27:01'),
(10, 4, 'Mess complaint added', 'mess', 'Reply from staff', '2020-05-25 01:40:31'),
(12, 4, 'room service suggession added', 'room', '', '2020-05-25 02:36:18'),
(13, 8, 'Monday dosha is not good', 'mess', '', '2020-05-25 07:36:19');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `post_content` text NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `post_by` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `student_id`, `post_content`, `post_image`, `post_by`, `post_date`) VALUES
(14, 4, 'text and image by lokesh  edited', 'squash.jpg.84', 'student', '2020-04-28 06:19:16'),
(15, 4, '', '.11', 'student', '2020-04-28 06:19:51'),
(18, 7, 'text and image by admin', 'football.png.17', 'admin', '2020-04-28 06:36:59'),
(24, 7, 'Only text from admin', '', 'admin', '2020-05-25 02:48:52'),
(25, 4, '', '.15', 'student', '2020-05-25 07:21:00'),
(26, 8, '', '.19', 'student', '2020-05-25 07:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `service_call`
--

CREATE TABLE `service_call` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `from_time` int(11) NOT NULL,
  `from_p` text NOT NULL,
  `to_time` int(11) NOT NULL,
  `to_p` text NOT NULL,
  `room_no` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_call`
--

INSERT INTO `service_call` (`id`, `student_id`, `from_time`, `from_p`, `to_time`, `to_p`, `room_no`) VALUES
(5, 5, 12, 'am', 12, 'pm', 'w3-311'),
(6, 5, 8, 'am', 9, 'am', 'w3-342'),
(7, 4, 1, 'am', 2, 'am', 'W2-211'),
(8, 4, 1, 'am', 1, 'pm', 'w3-311');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `staff_name` text NOT NULL,
  `staff_pass` varchar(255) NOT NULL,
  `staff_phone` varchar(255) NOT NULL,
  `staff_birthday` text NOT NULL,
  `staff_image` varchar(255) NOT NULL,
  `staff_gender` text NOT NULL,
  `staff_reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `recovery_account` varchar(255) NOT NULL,
  `status` text NOT NULL,
  `staff_job` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `first_name`, `last_name`, `staff_name`, `staff_pass`, `staff_phone`, `staff_birthday`, `staff_image`, `staff_gender`, `staff_reg_date`, `recovery_account`, `status`, `staff_job`) VALUES
(3, 'staff', 'first', 'staff_first', 'staff123', '5555555555', '1111-01-01', 'staff/staff2.png.17.86', 'Male', '2020-04-30 14:53:26', 'lokesh', 'verified', 'mess'),
(5, 'staff2', 'last2', 'staff2_last2', 'staff2123', '8765432109', '2000-02-01', 'students/student3.png', 'Male', '2020-05-25 07:29:51', 'lokesh', 'verified', 'room_service');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `student_name` text NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `student_pass` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `student_phone` varchar(255) NOT NULL,
  `student_birthday` text NOT NULL,
  `student_image` varchar(255) NOT NULL,
  `student_posts` text NOT NULL,
  `student_rep` text NOT NULL,
  `student_gender` text NOT NULL,
  `student_reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `recovery_account` varchar(255) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `student_name`, `roll_no`, `student_pass`, `student_email`, `student_phone`, `student_birthday`, `student_image`, `student_posts`, `student_rep`, `student_gender`, `student_reg_date`, `recovery_account`, `status`) VALUES
(4, 'Lokesh', 'Chikkula', 'lokesh_chikkula_404', '18cs10003', 'legend11', 'lokeshchikkula2000@gmail.com', '6303243074', '2000-01-01', 'students/SAVE_20200110_185836.jpg.62', 'yes', 'no', 'Male', '2020-04-23 08:11:16', 'lokesh', 'verified'),
(5, 'Raju', 'kota', 'raju_kota', '18cs10010', 'legend12', 'raju@gmail.com', '3333333333', '1111-01-01', 'students/student1.png', 'no', 'no', 'Male', '2020-04-29 04:28:42', 'admin', 'verified'),
(8, 'Rohith', 'Pedhinti', 'rohith_pedhinti', '18CS10011', 'rohith123', 'rohith@gmail.com', '9876543210', '2000-02-01', 'students/student2.png.60', 'yes', 'no', 'Male', '2020-05-25 07:25:40', 'admin', 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `stu_messages`
--

CREATE TABLE `stu_messages` (
  `id` int(11) NOT NULL,
  `stu_to` int(11) NOT NULL,
  `stu_from` int(11) NOT NULL,
  `msg_body` varchar(255) NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `msg_seen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stu_messages`
--

INSERT INTO `stu_messages` (`id`, `stu_to`, `stu_from`, `msg_body`, `msg_date`, `msg_seen`) VALUES
(1, 5, 4, 'Hello Raju', '2020-05-24 12:41:52', 'no'),
(2, 4, 5, 'Hello Lokesh', '2020-05-24 12:46:07', 'no'),
(3, 5, 4, 'How are you', '2020-05-24 12:48:44', 'no'),
(4, 4, 5, 'how are you ?\r\nare you fine', '2020-05-24 12:51:13', 'no'),
(5, 5, 4, 'I am fine, where are you now?', '2020-05-24 12:57:17', 'no'),
(6, 4, 5, 'At home, what about you', '2020-05-24 12:57:57', 'no'),
(7, 4, 8, 'Hello Lokesh', '2020-05-25 07:26:20', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_applications`
--
ALTER TABLE `leave_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`day`);

--
-- Indexes for table `messeges`
--
ALTER TABLE `messeges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mess_complaints`
--
ALTER TABLE `mess_complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `service_call`
--
ALTER TABLE `service_call`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `stu_messages`
--
ALTER TABLE `stu_messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `leave_applications`
--
ALTER TABLE `leave_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messeges`
--
ALTER TABLE `messeges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mess_complaints`
--
ALTER TABLE `mess_complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `service_call`
--
ALTER TABLE `service_call`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stu_messages`
--
ALTER TABLE `stu_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
