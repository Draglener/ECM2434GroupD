
--
-- Database: exeterGame
--

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `buildingID` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `info` text NOT NULL
) 

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `questionID` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `correctBuildingID` int(11) NOT NULL,
  `question` text NOT NULL,
  `wrongBuilding1` int(11) NOT NULL,
  `wrongBuilding2` int(11) NOT NULL,
  `wrongBuilding3` int(11) NOT NULL,
  FOREIGN KEY (correctBuildingID) REFERENCES building (buildingID),
  FOREIGN KEY (wrongBuilding1) REFERENCES building (buildingID),
  FOREIGN KEY (wrongBuilding2) REFERENCES building (buildingID),
  FOREIGN KEY (wrongBuilding3) REFERENCES building (buildingID),
) 

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomID` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `buildingID` int(11) NOT NULL,
  FOREIGN KEY (buildingID) REFERENCES building (buildingID)
) 

-- --------------------------------------------------------

--
-- Table structure for table `tutorGroup`
--

CREATE TABLE `tutorGroup` (
  `tutorID` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `office` int(11) NOT NULL,
  FOREIGN KEY (office) REFERENCES room (roomID)
) 

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `tutorID` int(11) NOT NULL,
  FOREIGN KEY (tutorID) REFERENCES tutorGroup (tutorID)
) 

COMMIT;
