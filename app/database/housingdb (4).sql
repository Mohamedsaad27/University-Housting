-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2023 at 02:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `housingdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `ID` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `Region` varchar(256) NOT NULL,
  `City` varchar(256) NOT NULL,
  `PostalCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`ID`, `StudentId`, `Region`, `City`, `PostalCode`) VALUES
(1, 1, 'California', 'Los Angeles', 90001),
(2, 2, 'New York', 'New York City', 10001),
(3, 3, 'Texas', 'Houston', 77001),
(4, 4, 'Florida', 'Miami', 33101),
(5, 5, 'Illinois', 'Chicago', 60601),
(6, 1, 'Arizona', 'Phoenix', 85001),
(7, 2, 'Washington', 'Seattle', 98101),
(8, 3, 'Colorado', 'Denver', 80201),
(9, 4, 'Massachusetts', 'Boston', 2101),
(10, 5, 'Georgia', 'Atlanta', 30301);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `ID` int(11) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_name` varchar(50) NOT NULL,
  `Grand_Name` varchar(50) NOT NULL,
  `Gender` enum('Male','Female','','') NOT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Email` varchar(256) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `UpdatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ID`, `First_Name`, `Last_name`, `Grand_Name`, `Gender`, `Phone`, `Email`, `Password`, `UpdatedAt`, `CreatedAt`) VALUES
(1, 'mohamed', 'saad', 'redawi', 'Male', NULL, 'admin@gmail.com', 'Admin@123', '2023-09-19 10:06:59', '2023-09-17 21:15:37'),
(2, 'moahmed', 'saad', 'mohamed', 'Female', 'sdas', 'sa3doni2714@gmail.com', 'Saad@123', '2023-10-02 21:06:58', '2023-09-19 08:41:31');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `ID` int(11) NOT NULL,
  `RoomId` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `ApprovalStatus` varchar(32) NOT NULL,
  `AdminId` int(11) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`ID`, `RoomId`, `StudentId`, `StartDate`, `EndDate`, `ApprovalStatus`, `AdminId`, `CreatedAt`) VALUES
(1, 1, 32, '2023-11-01', '2023-12-01', 'Approved', 1, '2023-10-02 20:21:31'),
(2, 3, 2, '2023-10-15', '2023-11-15', 'Pending', 2, '2023-10-02 20:21:31'),
(3, 5, 3, '2023-12-10', '2024-01-10', 'Rejected', 2, '2023-10-02 20:21:31'),
(4, 2, 4, '2023-10-20', '2023-11-20', 'Approved', 1, '2023-10-02 20:21:31'),
(5, 4, 5, '2023-11-05', '2023-12-05', 'Pending', 2, '2023-10-02 20:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `ID` int(11) NOT NULL,
  `Name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`ID`, `Name`) VALUES
(1, 'Engineering'),
(2, 'Science'),
(3, 'Arts and Humanities'),
(4, 'Business'),
(5, 'Health Sciences'),
(6, 'Social Sciences'),
(7, 'Computer Science'),
(8, 'Medicine'),
(9, 'Education'),
(10, 'Law'),
(11, 'Fine Arts'),
(12, 'Agriculture'),
(13, 'Environmental Science'),
(14, 'Mathematics'),
(15, 'Music'),
(16, 'Nursing');

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `ID` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`ID`, `StudentId`, `Phone`, `Type`) VALUES
(1, 1, '01098001021', 'Mobile'),
(2, 2, '01098001021', 'Mobile'),
(3, 3, '01098001021', 'Mobile'),
(4, 4, '01098001021', 'Mobile'),
(5, 5, '01098001021', 'Landline');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `ID` int(11) NOT NULL,
  `Room_Id` int(10) NOT NULL,
  `NumberOfBeds` int(11) NOT NULL,
  `Price` float NOT NULL,
  `AvailabilityStatus` varchar(32) NOT NULL,
  `FoodStatus` varchar(32) NOT NULL,
  `duration` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`ID`, `Room_Id`, `NumberOfBeds`, `Price`, `AvailabilityStatus`, `FoodStatus`, `duration`, `created_at`) VALUES
(1, 123, 2, 100, 'Available', 'Included', '3', '2023-10-23 00:32:20'),
(2, 124, 1, 75, 'Occupied', 'Not Included', '4', '2023-10-23 00:32:24'),
(3, 125, 3, 150, 'Available', 'Included', '6', '2023-10-23 00:32:28'),
(4, 126, 2, 90, 'Available', 'Not Included', '3', '2023-10-23 00:32:31'),
(5, 127, 4, 200, 'Occupied', 'Included', '4', '2023-10-23 00:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `ID` int(11) NOT NULL,
  `Student_Id` int(5) NOT NULL,
  `First_Name` varchar(256) NOT NULL,
  `Last_Name` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Gender` char(1) NOT NULL,
  `code_verified` int(5) NOT NULL,
  `status` enum('Verified','NotVerified','','') NOT NULL DEFAULT 'NotVerified',
  `Password` varchar(32) NOT NULL,
  `FacultyId` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `Student_Id`, `First_Name`, `Last_Name`, `Email`, `Gender`, `code_verified`, `status`, `Password`, `FacultyId`, `created_at`) VALUES
(1, 2020191059, 'Mohamed ', 'Saad', 'sa3doni@example.com', 'M', 0, 'Verified', 'password123', 1, '2023-10-04 16:54:54'),
(2, 2020191058, 'Mohamed ', 'Fahim', 'fahim@example.com', 'F', 0, 'Verified', 'securepass', 2, '2023-10-04 16:55:08'),
(3, 2020191057, 'Mohamed ', 'Hesham', 'hesham@example.com', 'M', 0, 'Verified', 'mikepass', 3, '2023-10-04 16:55:16'),
(4, 2020191056, 'Abdallah ', 'Bestawy', 'bestawy@example.com', 'F', 0, 'Verified', 'emily123', 1, '2023-10-04 16:55:30'),
(5, 2020191055, 'Osama ', 'Fahmy', 'Osama@example.com', 'M', 0, 'Verified', 'davidpass', 4, '2023-10-04 16:55:36'),
(32, 2147483647, 'mohamed', 'saad', 'sa3doni2714@gmail.com', '', 36967, 'Verified', 'Admin@123', 1, '2023-10-24 12:18:05');

-- --------------------------------------------------------

--
-- Stand-in structure for view `test`
-- (See below for the actual view)
--
CREATE TABLE `test` (
`ID` int(11)
,`Student_Id` int(5)
,`First_Name` varchar(256)
,`Last_Name` varchar(256)
,`Email` varchar(256)
,`Gender` char(1)
,`code_verified` int(5)
,`status` enum('Verified','NotVerified','','')
,`Password` varchar(32)
,`FacultyId` int(11)
,`created_at` timestamp
,`Phone` varchar(15)
);

-- --------------------------------------------------------

--
-- Structure for view `test`
--
DROP TABLE IF EXISTS `test`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `test`  AS   (select `students`.`ID` AS `ID`,`students`.`Student_Id` AS `Student_Id`,`students`.`First_Name` AS `First_Name`,`students`.`Last_Name` AS `Last_Name`,`students`.`Email` AS `Email`,`students`.`Gender` AS `Gender`,`students`.`code_verified` AS `code_verified`,`students`.`status` AS `status`,`students`.`Password` AS `Password`,`students`.`FacultyId` AS `FacultyId`,`students`.`created_at` AS `created_at`,`phones`.`Phone` AS `Phone` from (`students` join `phones` on(`students`.`ID` = `phones`.`StudentId`)))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `StudentId` (`StudentId`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `AdminId` (`AdminId`),
  ADD KEY `RoomId` (`RoomId`),
  ADD KEY `StudentId` (`StudentId`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `StudentId` (`StudentId`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FacultyId` (`FacultyId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`StudentId`) REFERENCES `students` (`ID`);

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`AdminId`) REFERENCES `admins` (`ID`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`RoomId`) REFERENCES `rooms` (`ID`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`StudentId`) REFERENCES `students` (`ID`);

--
-- Constraints for table `phones`
--
ALTER TABLE `phones`
  ADD CONSTRAINT `phones_ibfk_1` FOREIGN KEY (`StudentId`) REFERENCES `students` (`ID`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`FacultyId`) REFERENCES `faculties` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
