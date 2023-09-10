-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2017 at 09:23 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectmgt_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE `discussion` (
  `discussion_id` varchar(100) NOT NULL DEFAULT '',
  `student_id` varchar(45) NOT NULL DEFAULT '',
  `staff_id` varchar(45) NOT NULL DEFAULT '',
  `message` longtext NOT NULL,
  `sender` varchar(45) NOT NULL DEFAULT '',
  `time` varchar(45) NOT NULL DEFAULT '',
  `date` varchar(45) NOT NULL DEFAULT '',
  `status` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion`
--

INSERT INTO `discussion` (`discussion_id`, `student_id`, `staff_id`, `message`, `sender`, `time`, `date`, `status`) VALUES
('131436978std', 'BSU/SC/CMP/12/16851', 'pMs567860182su', 'Helo ma', 'student', '16:07:34', '18/02/2017', 'read'),
('280259583std', 'BSU/SC/CMP/12/16835', 'pMs567860182su', 'hi', 'student', '04:55:55', '18/02/2017', 'read'),
('287013781std', 'BSU/SC/CMP/12/16835', 'pMs567860182su', 'happy sunday john', 'supervisor', '12:48:05', '19/02/2017', 'read'),
('295497105std', 'BSU/SC/CMP/12/16835', 'pMs567860182su', 'happy sunday john', 'supervisor', '12:47:22', '19/02/2017', 'read'),
('328445724std', 'Nobody', 'pMs567860182su', 'sggg', 'supervisor', '13:17:28', '20/02/2017', 'read'),
('349831372std', 'BSU/SC/CMP/12/16835', 'pMs567860182su', 'happy sunday john', 'supervisor', '12:47:41', '19/02/2017', 'read'),
('364137030std', 'BSU/SC/CMP/12/16835', 'pMs567860182su', 'helo', 'supervisor', '22:43:04', '18/02/2017', 'read'),
('534315072std', 'BSU/SC/CMP/12/16835', 'pMs567860182su', 'hello, are there?', 'supervisor', '12:50:25', '19/02/2017', 'read'),
('547700326std', 'BSU/SC/CMP/12/16835', 'pMs567860182su', 'helo', 'student', '04:56:04', '18/02/2017', 'read'),
('555169760std', 'BSU/SC/CMP/12/16835', 'pMs567860182su', 'hello, are there?', 'supervisor', '12:50:28', '19/02/2017', 'read'),
('593804225std', 'BSU/SC/CMP/12/16835', 'pMs567860182su', 'happy sunday john', 'supervisor', '12:48:22', '19/02/2017', 'read'),
('646611831std', 'BSU/SC/CMP/12/16835', 'pMs567860182su', 'hello, are there?', 'supervisor', '12:50:26', '19/02/2017', 'read'),
('7471218std', 'BSU/SC/CMP/12/16835', 'pMs567860182su', 'hello, are there?', 'supervisor', '12:50:22', '19/02/2017', 'read'),
('767765225std', 'BSU/SC/CMP/12/16835', 'pMs567860182su', 'hi john', 'student', '03:00:11', '17/02/2017', 'read'),
('826536613std', 'BSU/SC/CMP/12/16835', 'pMs567860182su', 'hello, are there?', 'supervisor', '12:49:20', '19/02/2017', 'read'),
('833610363su', 'BSU/SC/CMP/12/16835', 'pMs567860182su', 'hey', 'supervisor', '15:36:39', '23/02/2017', 'read'),
('887670582std', 'BSU/SC/CMP/12/16851', 'pMs567860182su', 'hi James', 'supervisor', '03:09:12', '18/02/2017', 'read'),
('889622056std', 'BSU/SC/CMP/12/16835', 'pMs567860182su', 'happy sunday john', 'supervisor', '12:42:53', '19/02/2017', 'read'),
('979015859std', 'BSU/SC/CMP/12/16835', 'pMs567860182su', 'helo john', 'supervisor', '03:00:16', '18/02/2017', 'read'),
('995995014std', 'BSU/SC/CMP/12/16835', 'pMs567860182su', 'hi', 'supervisor', '03:00:09', '18/02/2017', 'read'),
('998245684std', 'BSU/SC/CMP/12/16835', 'pMs567860182su', 'happy sunday john', 'supervisor', '12:48:56', '19/02/2017', 'read'),
('998593194std', 'BSU/SC/CMP/12/16835', 'pMs567860182su', 'hi', 'student', '22:02:07', '17/02/2017', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `doc_id` varchar(45) NOT NULL DEFAULT '',
  `sender` varchar(45) DEFAULT NULL,
  `sender_id` varchar(45) DEFAULT NULL,
  `chapter` varchar(45) DEFAULT NULL,
  `doc_URL` varchar(250) NOT NULL DEFAULT '',
  `date` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `student_id` varchar(45) DEFAULT NULL,
  `staff_id` varchar(45) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `name` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`doc_id`, `sender`, `sender_id`, `chapter`, `doc_URL`, `date`, `status`, `student_id`, `staff_id`, `size`, `name`) VALUES
('293762515std', 'student', 'BSU/SC/CMP/12/16835', 'CHAPTER TWO', '../documents/CHAPTER_TWO.docx', '18/02/2017', 'seen', 'BSU/SC/CMP/12/16835', 'pMs567860182su', '33777', 'CHAPTER_TWO.docx'),
('469282735std', 'student', 'BSU/SC/CMP/12/16835', 'CHAPTER TWO', '../documents/CHAPTER_TWO.docx', '18/02/2017', 'seen', 'BSU/SC/CMP/12/16835', 'pMs567860182su', '33777', 'CHAPTER_TWO.docx'),
('575040627std', 'supervisor', 'pMs567860182su', 'CHAPTER ONE', '../documents/CHAPTER_ONE.docx', '17/02/2017', 'seen', 'BSU/SC/CMP/12/16835', 'pMs567860182su', '32330', 'CHAPTER_ONE.docx'),
('912341407std', 'supervisor', 'pMs567860182su', 'CHAPTER ONE', '../documents/CHAPTER_ONE.docx', '17/02/2017', 'seen', 'BSU/SC/CMP/12/16835', 'pMs567860182su', '32330', NULL),
('991310877std', 'supervisor', 'pMs567860182su', 'CHAPTER ONE', '../documents/CHAPTER_ONE.docx', '17/02/2017', 'seen', 'BSU/SC/CMP/12/16835', 'pMs567860182su', '32330', NULL),
('jdjs', 'student', 'BSU/SC/CMP/12/16835', 'CHAPTER ONE', '../documents/CHAPTER_ONE.docx', '17/02/2017', 'seen', 'BSU/SC/CMP/12/16835', 'pMs567860182su', '100002', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` varchar(100) NOT NULL DEFAULT '',
  `topic` text,
  `student_id` varchar(45) DEFAULT NULL,
  `date_started` varchar(20) DEFAULT NULL,
  `session` varchar(10) DEFAULT NULL,
  `date_finished` varchar(20) DEFAULT NULL,
  `staff_id` varchar(45) DEFAULT NULL,
  `dept` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `topic`, `student_id`, `date_started`, `session`, `date_finished`, `staff_id`, `dept`) VALUES
('', '', '', '20/02/2017', '', 'pending', '', ''),
('204522423std', 'DESIGN AND IMPLEMEMTATION OF PROGRESS MONITORING SYSTEM FOR STUDENT FINAL YEAR PROJECT.', 'BSU/SC/CMP/12/16835', '18/02/2017', '2015/2016', 'pending', 'pMs567860182su', 'Mathematics and Computer Science'),
('682955915std', '  Analysis of Data Compression Algorithm  ', 'BSU/SC/CMP/DE/13/16743', '21/02/2017', '2015/2016', 'pending', 'pMs158470527su', 'Mathematics and Computer Science'),
('855852441std', '  DESIGN IMPLEMENTATION OF AN ONLINE SHOPPING CART SYSTEM FOR AN ONLINE STORE  ', 'BSU/SC/CMP/12/16851', '19/02/2017', '2015/2016', 'pending', 'pMs567860182su', 'Mathematics and Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `proposed_topic`
--

CREATE TABLE `proposed_topic` (
  `id` varchar(50) NOT NULL DEFAULT '',
  `topic` text NOT NULL,
  `description` text NOT NULL,
  `student_id` varchar(45) NOT NULL DEFAULT '',
  `staff_id` varchar(45) NOT NULL DEFAULT '',
  `date` varchar(45) NOT NULL DEFAULT '',
  `time` varchar(45) NOT NULL DEFAULT '',
  `status` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proposed_topic`
--

INSERT INTO `proposed_topic` (`id`, `topic`, `description`, `student_id`, `staff_id`, `date`, `time`, `status`) VALUES
('204522423std', 'DESIGN AND IMPLEMEMTATION OF PROGRESS MONITORING SYSTEM FOR STUDENT FINAL YEAR PROJECT.', 'The Progress Monitoring System for Student Final Year Project (PSM) is computer software which helps final year student gain better control of their project planning and implementation through keeping student connected with supervisor, regardless of where student are located. Project Supervisor can monitor every detail, simply, and easily. However the system is about managing projects from remote destinations. So that, this system helps student to complete projects, keep within budget, stay on track, and work together with supervisor.', 'BSU/SC/CMP/12/16835', 'pMs567860182su', '18/02/2017', '13:20:13', 'approved'),
('682955915std', '  Analysis of Data Compression Algorithm  ', 'What is this?', 'BSU/SC/CMP/DE/13/16743', 'pMs158470527su', '21/02/2017', '13:30:14', 'approved'),
('855852441std', '  DESIGN IMPLEMENTATION OF AN ONLINE SHOPPING CART SYSTEM FOR AN ONLINE STORE  ', 'AnE-commerce is the trading in products or services using computer networks, such as the Internet(Wikipedia, 2015). Electronic commerce draws on technologies such as mobile commerce, electronic funds transfer, supply chain management, Internet marketing, online transaction processing, electronic data interchange (EDI), inventory management systems, and automated data collection systems. Modern electronic commerce typically uses the World Wide Web for at least one part of the transaction''s life cycle, although it may also use other technologies such as e-mail. Every business that want to shoot online, irrespective of ittypes  need an e-commerce software product that fits your online store''s unique needs and requirements. For the past years e-commerce has been the trend for most business spanning  across different cities and countries. Where product and service can be deliver through their web service and delivery is done using different transport medium like ship,car or through post office.\r\nThis work is an attempt at delivering an online shopping cart system capable of delivering goods and services on demand, using a small Mobile outlet as a case study.\r\n', 'BSU/SC/CMP/12/16851', 'pMs567860182su', '19/02/2017', '11:37:53', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` varchar(50) NOT NULL DEFAULT '',
  `f_name` varchar(45) DEFAULT NULL,
  `m_name` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `title` varchar(10) DEFAULT NULL,
  `session` varchar(10) DEFAULT NULL,
  `dept` varchar(100) NOT NULL DEFAULT '',
  `gender` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `f_name`, `m_name`, `surname`, `role`, `title`, `session`, `dept`, `gender`) VALUES
('pMs158470527su', 'A.', 'A.', 'Adekunle', 'supervisor', 'Dr.', '2015/2016', 'Mathematics and Computer Science', 'Male'),
('pMs23652945su', 'Tivlumum', '', 'Ge', 'supervisor', 'Mr.', '2015/2016', 'Mathematics and Computer Science', 'Male'),
('pMs369124648co', 'Sunny', 'O.', 'Patrick', 'coordinator', 'Mrs.', '2015/2016', 'Physics', 'Male'),
('pMs370225632su', 'Selumum', '', 'Agber', 'supervisor', 'Mr.', '2015/2016', 'Mathematics and Computer Science', 'Male'),
('pMs380750007su', 'Obilikwu', '', 'Patrick', 'supervisor', 'Mr.', '2015/2016', 'Mathematics and Computer Science', 'Male'),
('pMs416729457su', 'Egahi', '', 'Musa', 'supervisor', 'Dr.', '2015/2016', 'Mathematics and Computer Science', 'Male'),
('pMs567860182su', 'Beatrice', '', 'Akumba', 'supervisor', 'Mrs.', '2015/2016', 'Mathematics and Computer Science', 'Female'),
('pMs591503590su', 'Samera', '', 'Bright', 'supervisor', 'Mrs.', '2015/2016', 'Mathematics and Computer Science', 'Female'),
('pMs815718443co', 'O.', 'I.', 'Ogwuche', 'coordinator', 'Dr.', '2015/2016', 'Mathematics and Computer Science', 'Male'),
('pMs857070067co', 'James', '', 'Isama', 'coordinator', 'Prof.', '2015/2016', 'Biology', 'Male'),
('pMs941797111su', 'Papa', '', 'Igwe', 'supervisor', 'Prof.', '2015/2016', 'Mathematics and Computer Science', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` varchar(50) NOT NULL DEFAULT '',
  `f_name` varchar(45) DEFAULT NULL,
  `m_name` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `phone_no` bigint(20) UNSIGNED DEFAULT NULL,
  `session` varchar(10) DEFAULT NULL,
  `dept` varchar(100) DEFAULT NULL,
  `level` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `f_name`, `m_name`, `surname`, `gender`, `phone_no`, `session`, `dept`, `level`) VALUES
('BSU/SC/CMP/12/16811', 'Samuel', '', 'Ibe', 'Male', 8147403001, '2015/2016', 'Mathematics and Computer Science', '400'),
('BSU/SC/CMP/12/16835', 'John', 'Adeyi', 'Isama', 'Male', 8067203944, '2015/2016', 'Mathematics and Computer Science', '400'),
('BSU/SC/CMP/12/16851', 'James', 'O.', 'Ogbu', 'Male', 8023464851, '2015/2016', 'Mathematics and Computer Science', '400'),
('BSU/SC/CMP/12/16853', 'Oche', 'Friday', 'Ogwuche', 'Male', 8174268241, '2015/2016', 'Mathematics and Computer Science', '400'),
('BSU/SC/CMP/DE/13/16743', 'Tosin', '', 'Ole', 'Male', 8043736323, '2015/2016', 'Mathematics and Computer Science', '400'),
('BSU/SC/CMP/DE/13/16745', 'Ochigbo', 'Emmanuel', 'Augustine', 'Male', 7064623170, '2015/2016', 'Mathematics and Computer Science', '400');

-- --------------------------------------------------------

--
-- Table structure for table `student_supervisor`
--

CREATE TABLE `student_supervisor` (
  `student_id` varchar(45) NOT NULL DEFAULT '',
  `staff_id` varchar(45) NOT NULL DEFAULT '',
  `session` varchar(10) NOT NULL DEFAULT '',
  `dept` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_supervisor`
--

INSERT INTO `student_supervisor` (`student_id`, `staff_id`, `session`, `dept`) VALUES
('BSU/SC/CMP/12/16811', 'pMs591503590su', '2015/2016', 'Mathematics and Computer Science'),
('BSU/SC/CMP/12/16835', 'pMs567860182su', '2015/2016', 'Mathematics and Computer Science'),
('BSU/SC/CMP/12/16851', 'pMs567860182su', '2015/2016', 'Mathematics and Computer Science'),
('BSU/SC/CMP/12/16853', 'pMs941797111su', '2015/2016', 'Mathematics and Computer Science'),
('BSU/SC/CMP/DE/13/16743', 'pMs158470527su', '2015/2016', 'Mathematics and Computer Science'),
('BSU/SC/CMP/DE/13/16745', 'pMs23652945su', '2015/2016', 'Mathematics and Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(45) NOT NULL DEFAULT '',
  `password` varchar(45) DEFAULT NULL,
  `id` varchar(50) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `activity` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `id`, `role`, `status`, `activity`) VALUES
('admin', 'admin', 'admin', 'admin', 'active', 'offline'),
('BSU/SC/CMP/12/16811', 'BSU/SC/CMP/12/16811', 'BSU/SC/CMP/12/16811', 'student', 'offline', 'active'),
('BSU/SC/CMP/12/16853', 'BSU/SC/CMP/12/16853', 'BSU/SC/CMP/12/16853', 'student', 'offline', 'active'),
('BSU/SC/CMP/DE/13/16743', 'BSU/SC/CMP/DE/13/16743', 'BSU/SC/CMP/DE/13/16743', 'student', 'offline', 'active'),
('BSU/SC/CMP/DE/13/16745', 'BSU/SC/CMP/DE/13/16745', 'BSU/SC/CMP/DE/13/16745', 'student', 'offline', 'active'),
('James', 'James18', 'BSU/SC/CMP/12/16851', 'student', 'offline', 'active'),
('John', 'john18', 'BSU/SC/CMP/12/16835', 'student', 'offline', 'active'),
('pMs158470527su', 'pMs158470527su', 'pMs158470527su', 'supervisor', 'offline', 'active'),
('pMs23652945su', 'pMs23652945su', 'pMs23652945su', 'supervisor', 'offline', 'active'),
('pMs369124648co', 'pMs369124648co', 'pMs369124648co', 'coordinator', 'offline', 'active'),
('pMs370225632su', 'pMs370225632su', 'pMs370225632su', 'supervisor', 'offline', 'active'),
('pMs380750007su', 'pMs380750007su', 'pMs380750007su', 'supervisor', 'offline', 'active'),
('pMs416729457su', 'pMs416729457su', 'pMs416729457su', 'supervisor', 'offline', 'active'),
('pMs567860182su', 'pMs567860182su', 'pMs567860182su', 'supervisor', 'offline', 'active'),
('pMs591503590su', 'pMs591503590su', 'pMs591503590su', 'supervisor', 'offline', 'active'),
('pMs815718443co', 'pMs815718443co', 'pMs815718443co', 'coordinator', 'offline', 'active'),
('pMs857070067co', 'pMs857070067co', 'pMs857070067co', 'coordinator', 'offline', 'active'),
('pMs941797111su', 'pMs941797111su', 'pMs941797111su', 'supervisor', 'offline', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`discussion_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `proposed_topic`
--
ALTER TABLE `proposed_topic`
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
-- Indexes for table `student_supervisor`
--
ALTER TABLE `student_supervisor`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
