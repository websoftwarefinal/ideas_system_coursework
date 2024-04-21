-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2024 at 08:26 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ewd_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `idea_id` int(11) DEFAULT NULL,
  `staff_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `anonymous` tinyint(1) DEFAULT NULL,
  `text` text NOT NULL,
  `deadline_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `deadline`
--

CREATE TABLE `deadline` (
  `deadline_id` int(11) NOT NULL,
  `deadline_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deadline`
--

INSERT INTO `deadline` (`deadline_id`, `deadline_date`) VALUES
(1, '2024-04-01 15:23:08'),
(2, '2024-04-02 15:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(1, 'Computer');

-- --------------------------------------------------------

--
-- Table structure for table `dislikes`
--

CREATE TABLE `dislikes` (
  `idea_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `idea`
--

CREATE TABLE `idea` (
  `idea_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `idea_date` datetime NOT NULL,
  `anonymous` tinyint(1) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `supporting_document` text DEFAULT NULL,
  `deadline_id` int(11) DEFAULT NULL,
  `email` text NOT NULL DEFAULT 'websoftwaredevelopmetfinalyear@gmail.com'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `idea`
--

INSERT INTO `idea` (`idea_id`, `title`, `description`, `idea_date`, `anonymous`, `staff_id`, `supporting_document`, `deadline_id`, `email`) VALUES
(1, 'POOIPI', 'OIOIIO', '2024-04-21 15:23:59', 1, 1, 'OIIOIO', NULL, 'websoftwaredevelopmetfinalyear@gmail.com'),
(3, 'Sanitation', 'Bad Sanitation', '2024-01-01 00:00:00', 0, 1, 'referred to sanitation document', 1, 'cornelius@gmail.com'),
(4, 'Sanitation', 'Bad Sanitation', '2024-01-01 00:00:00', 0, 1, 'referred to sanitation document', 2, 'cornelius@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `idea_categories`
--

CREATE TABLE `idea_categories` (
  `idea_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `idea_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login_staff`
--

CREATE TABLE `login_staff` (
  `login_id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `qa_coordinator_tbl`
--

CREATE TABLE `qa_coordinator_tbl` (
  `coordinator_id` int(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qa_coordinator_tbl`
--

INSERT INTO `qa_coordinator_tbl` (`coordinator_id`, `department_id`, `first_name`, `last_name`, `email`) VALUES
(7, 1, 'John Doe', 'John Doe', 'johndoe@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `report_comment`
--

CREATE TABLE `report_comment` (
  `report_id` int(11) NOT NULL,
  `idea_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `report_idea`
--

CREATE TABLE `report_idea` (
  `report_id` int(11) NOT NULL,
  `idea_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'QA Manager'),
(2, 'QA Coordinator');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone_number` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_status` varchar(20) NOT NULL,
  `posts_banned` varchar(20) NOT NULL,
  `position` varchar(50) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `username`, `first_name`, `last_name`, `email_address`, `phone_number`, `password`, `account_status`, `posts_banned`, `position`, `role_id`, `department_id`) VALUES
(1, 'test', 'test', 'test', 'test', '5', 'test', '1', 'test', 'qa manager', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `view_id` int(11) NOT NULL,
  `idea_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `deadline`
--
ALTER TABLE `deadline`
  ADD PRIMARY KEY (`deadline_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `dislikes`
--
ALTER TABLE `dislikes`
  ADD PRIMARY KEY (`idea_id`,`author_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `idea`
--
ALTER TABLE `idea`
  ADD PRIMARY KEY (`idea_id`),
  ADD KEY `deadline_id` (`deadline_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `idea_categories`
--
ALTER TABLE `idea_categories`
  ADD PRIMARY KEY (`idea_id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`idea_id`,`author_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `login_staff`
--
ALTER TABLE `login_staff`
  ADD PRIMARY KEY (`login_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `qa_coordinator_tbl`
--
ALTER TABLE `qa_coordinator_tbl`
  ADD PRIMARY KEY (`coordinator_id`),
  ADD KEY `fk_department` (`department_id`);

--
-- Indexes for table `report_comment`
--
ALTER TABLE `report_comment`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `idea_id` (`idea_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `report_idea`
--
ALTER TABLE `report_idea`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `idea_id` (`idea_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`view_id`),
  ADD KEY `idea_id` (`idea_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deadline`
--
ALTER TABLE `deadline`
  MODIFY `deadline_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `idea`
--
ALTER TABLE `idea`
  MODIFY `idea_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_staff`
--
ALTER TABLE `login_staff`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qa_coordinator_tbl`
--
ALTER TABLE `qa_coordinator_tbl`
  MODIFY `coordinator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `report_comment`
--
ALTER TABLE `report_comment`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_idea`
--
ALTER TABLE `report_idea`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `view_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dislikes`
--
ALTER TABLE `dislikes`
  ADD CONSTRAINT `dislikes_ibfk_1` FOREIGN KEY (`idea_id`) REFERENCES `idea` (`idea_id`),
  ADD CONSTRAINT `dislikes_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `idea`
--
ALTER TABLE `idea`
  ADD CONSTRAINT `idea_ibfk_1` FOREIGN KEY (`deadline_id`) REFERENCES `deadline` (`deadline_id`),
  ADD CONSTRAINT `idea_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `idea_categories`
--
ALTER TABLE `idea_categories`
  ADD CONSTRAINT `idea_categories_ibfk_1` FOREIGN KEY (`idea_id`) REFERENCES `idea` (`idea_id`),
  ADD CONSTRAINT `idea_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`idea_id`) REFERENCES `idea` (`idea_id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `login_staff`
--
ALTER TABLE `login_staff`
  ADD CONSTRAINT `login_staff_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `qa_coordinator_tbl`
--
ALTER TABLE `qa_coordinator_tbl`
  ADD CONSTRAINT `fk_department` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE;

--
-- Constraints for table `report_comment`
--
ALTER TABLE `report_comment`
  ADD CONSTRAINT `report_comment_ibfk_1` FOREIGN KEY (`idea_id`) REFERENCES `idea` (`idea_id`),
  ADD CONSTRAINT `report_comment_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `report_idea`
--
ALTER TABLE `report_idea`
  ADD CONSTRAINT `report_idea_ibfk_1` FOREIGN KEY (`idea_id`) REFERENCES `idea` (`idea_id`),
  ADD CONSTRAINT `report_idea_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  ADD CONSTRAINT `staff_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `views`
--
ALTER TABLE `views`
  ADD CONSTRAINT `views_ibfk_1` FOREIGN KEY (`idea_id`) REFERENCES `idea` (`idea_id`),
  ADD CONSTRAINT `views_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
