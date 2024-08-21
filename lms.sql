-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2024 at 08:57 AM
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
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `name`, `email`, `password`) VALUES
(1, 'chirag bharti', 'chiragbharti72@gmail.com', '111'),
(2, 'testing', 'testing@gmail.com', '111'),
(3, 'asd', 'asd@gmail.com', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `images` varchar(200) NOT NULL,
  `author` varchar(255) NOT NULL,
  `isbn` varchar(13) NOT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `year_published` year(4) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `images`, `author`, `isbn`, `publisher`, `year_published`, `category`, `quantity`, `status`) VALUES
(1, 'The Great Gatsby', '41XMaCHkrgL._SY445_SX342_.jpg', 'F. Scott Fitzgerald', '9780743273565', 'Scribner', '1925', 'Fiction', 5, 1),
(2, 'To Kill a Mockingbird', '9781784752637.jpg', 'Harper Lee', '9780060935467', 'J.B. Lippincott & Co.', '1960', 'Fiction', 3, 1),
(3, '1984', '4150IkIpANL._SY445_SX342_.jpg', 'George Orwell', '9780451524935', 'Signet Classic', '1949', 'Dystopian', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `booktransactions`
--

CREATE TABLE `booktransactions` (
  `transaction_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `transaction_type` enum('Issue','Return','Remove') NOT NULL,
  `transaction_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booktransactions`
--

INSERT INTO `booktransactions` (`transaction_id`, `student_id`, `admin_id`, `book_id`, `transaction_type`, `transaction_date`) VALUES
(1, 1, NULL, 1, 'Issue', '2024-08-01'),
(2, 2, NULL, 3, 'Issue', '2024-08-05'),
(3, NULL, 1, 2, 'Remove', '2024-08-10'),
(4, NULL, 2, 3, 'Remove', '2024-08-12');

-- --------------------------------------------------------

--
-- Table structure for table `issuedbooks`
--

CREATE TABLE `issuedbooks` (
  `issue_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `issue_date` date NOT NULL,
  `due_date` date NOT NULL,
  `return_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issuedbooks`
--

INSERT INTO `issuedbooks` (`issue_id`, `student_id`, `book_id`, `issue_date`, `due_date`, `return_date`) VALUES
(1, 1, 2, '2024-08-01', '2024-08-17', '2024-08-16'),
(5, 1, 2, '2024-08-04', '2024-08-19', NULL),
(6, 3, 3, '2024-08-21', '2024-09-05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `removedbooks`
--

CREATE TABLE `removedbooks` (
  `remove_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `remove_date` date NOT NULL,
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `removedbooks`
--

INSERT INTO `removedbooks` (`remove_id`, `admin_id`, `book_id`, `remove_date`, `reason`) VALUES
(1, 1, 2, '2024-08-10', 'Damaged'),
(2, 2, 3, '2024-08-12', 'Lost');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `registration_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `name`, `email`, `phone_number`, `address`, `registration_date`, `status`) VALUES
(1, 'chirag bharti', 'chirag72@gmail.com', '9625693880', 'testing address', '2023-01-15', 1),
(2, 'ajay', 'ajay72@gmail.com', '9166242323', 'testing address', '2023-02-20', 1),
(3, 'hari', 'hari72@gmail.com', '1234567890', 'testing address', '2023-03-05', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indexes for table `booktransactions`
--
ALTER TABLE `booktransactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `issuedbooks`
--
ALTER TABLE `issuedbooks`
  ADD PRIMARY KEY (`issue_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `removedbooks`
--
ALTER TABLE `removedbooks`
  ADD PRIMARY KEY (`remove_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `booktransactions`
--
ALTER TABLE `booktransactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `issuedbooks`
--
ALTER TABLE `issuedbooks`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `removedbooks`
--
ALTER TABLE `removedbooks`
  MODIFY `remove_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booktransactions`
--
ALTER TABLE `booktransactions`
  ADD CONSTRAINT `booktransactions_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `booktransactions_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`),
  ADD CONSTRAINT `booktransactions_ibfk_3` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);

--
-- Constraints for table `issuedbooks`
--
ALTER TABLE `issuedbooks`
  ADD CONSTRAINT `issuedbooks_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `issuedbooks_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);

--
-- Constraints for table `removedbooks`
--
ALTER TABLE `removedbooks`
  ADD CONSTRAINT `removedbooks_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`),
  ADD CONSTRAINT `removedbooks_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
