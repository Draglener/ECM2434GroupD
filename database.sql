-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: db5000293954.hosting-data.io
-- Generation Time: Feb 25, 2020 at 05:04 PM
-- Server version: 5.7.29-log
-- PHP Version: 7.0.33-0+deb9u7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs287158`
--

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `buildingID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `info` text NOT NULL,
  `latitude` varchar(12) NOT NULL,
  `longitude` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`buildingID`, `name`, `info`, `latitude`, `longitude`) VALUES
(1, 'Harrison', 'Harrisondfkgjbldjfhb', '50.737668', '-3.532590'),
(2, 'Innovation Centre', 'kjdsfhbakjhdgblajhdfgbldjhfgb', '50.738045', '-3.530514'),
(3, 'Amory', 'laskdfhbpavbpadhvba', '50.736650', '-3.531667'),
(4, 'Old Library', 'lsdfboalfvbipedfgbvosdfhvosdf', '50.733494', '-3.533887'),
(5, 'Forum', 'kjhdbvisgdvbpaudvboa dfgoaue', '50.735167', '-3.533785'),
(6, 'Library', 'shbcoauydvboauydvbouadhvfosd', '50.735481', '-3.533297'),
(7, 'Devonshire House', 'idfhvouaysdoausdapuydfvoauf', '50.735016', '-3.534329'),
(8, 'Queens', 'asldjfbouaysdfvoszdfvoysdf', '50.734270', '-3.535059'),
(9, 'Newman/Peter Chalk', 'kjhsdvbfouasdvbfausdfvbpu', '50.736329', '-3.535872');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `questionID` int(11) NOT NULL,
  `correctBuildingID` int(11) NOT NULL,
  `question` text NOT NULL,
  `wrongBuilding1` int(11) NOT NULL,
  `wrongBuilding2` int(11) NOT NULL,
  `wrongBuilding3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`questionID`, `correctBuildingID`, `question`, `wrongBuilding1`, `wrongBuilding2`, `wrongBuilding3`) VALUES
(1, 5, 'Its name means a place of discussion', 8, 3, 1),
(2, 5, 'It\'s the largest building on campus', 3, 7, 2),
(3, 6, 'All knowledge at the university can be found here - reading is the way forward!', 3, 4, 5),
(4, 4, 'The only building to contain a museum', 2, 9, 7),
(5, 1, 'The home of all of CEMPS, before Computer Science moved to the Innovation Centre', 6, 7, 8),
(6, 2, 'Contains the founders of Computer Science', 7, 3, 4),
(7, 9, 'Seminar rooms and colourful lecture theatres, this building contains four colours', 8, 1, 7),
(8, 3, 'Rumour has it the maze-like corridors and stairs inspired the Hogwarts moving staircases', 9, 6, 4),
(9, 8, 'A building fit for royalty!', 6, 9, 2),
(10, 7, 'It houses the organisation that defends our rights as students', 4, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `buildingID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomID`, `name`, `type`, `buildingID`) VALUES
(1, 'Alumni Auditorium', 'Lecture Theatre', 5),
(2, 'Sanctuary', 'Exam Room', 5),
(3, 'Great Hall', 'Exam Hall', 5),
(4, 'Library', 'Study Space', 6),
(5, 'PC Cluster', 'PC Room', 4),
(6, 'Study Room', 'Study Space', 4),
(7, '004', 'Lecture Theatre', 1),
(8, '101', 'Lecture Theatre', 1),
(9, '207/208', 'PC Room', 1),
(10, 'Hub', 'Information Point', 1),
(11, 'Cafe', 'Study Space', 1),
(12, 'Lovelace', 'PC Room', 2),
(13, 'Babbage', 'PC Room', 2),
(14, 'Blue', 'Lecture Theatre', 9),
(15, 'Collaborative', 'Lecture Theatre', 9),
(16, 'Red', 'Lecture Theatre', 9),
(17, 'Green', 'Lecture Theatre', 9),
(18, 'Purple', 'Lecture Theatre', 9),
(19, 'Ma', 'Office', 2),
(20, '1.1', 'Seminar Room', 9),
(21, '2.1', 'Seminar Room', 9),
(22, 'Moot', 'Lecture Theatre', 3),
(23, 'Study Space', 'Study Space', 3),
(24, 'Camper Coffee', 'Cafe', 3),
(25, 'LT1', 'Lecture Theatre', 8),
(26, 'LT2', 'Lecture Theatre', 8),
(27, 'Camper Coffee', 'Cafe', 8),
(28, 'DH1', 'Study Space', 7),
(29, 'DH2', 'Study Space', 7),
(30, 'Ram', 'Bar', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tutorGroup`
--

CREATE TABLE `tutorGroup` (
  `tutorID` int(11) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `office` int(11) NOT NULL,
  `current_pos` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutorGroup`
--

INSERT INTO `tutorGroup` (`tutorID`, `fName`, `lName`, `score`, `office`, `current_pos`, `password`) VALUES
(1, 'Jonathan', 'Fieldsend', 0, 0, 0, '$2y$10$WG1ouVQEOmnq0mUpCxnJu.6F5thJy2bJK96YIcEmNYduHWJY1U/QC'),
(2, 'Edward', 'Keedwell', 0, 0, 0, '$2y$10$WG1ouVQEOmnq0mUpCxnJu.6F5thJy2bJK96YIcEmNYduHWJY1U/QC'),
(3, 'Geyong', 'Min', 0, 0, 0, '$2y$10$WG1ouVQEOmnq0mUpCxnJu.6F5thJy2bJK96YIcEmNYduHWJY1U/QC');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `tutorID` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `tutorID`, `location`, `points`) VALUES
(1, 'jw936', 1, 0, 0),
(2, 'admt201', 2, 0, 0),
(3, 'kj334', 3, 0, 0),
(4, 'sjr239', 1, 0, 0),
(5, 'pt366', 1, 0, 0),
(6, 'kh530', 1, 3, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`buildingID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`questionID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomID`);

--
-- Indexes for table `tutorGroup`
--
ALTER TABLE `tutorGroup`
  ADD PRIMARY KEY (`tutorID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `buildingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `questionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `roomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tutorGroup`
--
ALTER TABLE `tutorGroup`
  MODIFY `tutorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
