-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2021 at 02:53 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `juanadventourista`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE `accounts` (
  `ID` int(11) NOT NULL,
  `fullname` varchar(198) NOT NULL,
  `username` varchar(198) NOT NULL,
  `password` varchar(198) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`ID`, `fullname`, `username`, `password`) VALUES
(1, 'Donquixote Doflamingo', 'admin', 'admin'),
(19, 'Juan Enciso', 'jhon12', 'jhon123'),
(20, 'Judy Ann Arquisal', 'judy123', 'judy123');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `account_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `account_ID`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE `bookings` (
  `ID` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `RoomId` int(11) NOT NULL,
  `TimeIn` date NOT NULL,
  `TimeOut` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `buildingname`
--

DROP TABLE IF EXISTS `buildingname`;
CREATE TABLE `buildingname` (
  `ID` int(11) NOT NULL,
  `Name` varchar(198) NOT NULL,
  `Type` varchar(198) NOT NULL,
  `Image` text NOT NULL,
  `Location` varchar(198) NOT NULL,
  `Description` varchar(198) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buildingname`
--

INSERT INTO `buildingname` (`ID`, `Name`, `Type`, `Image`, `Location`, `Description`) VALUES
(3, 'Waterfront Hotel Cebu', 'Hotel', 'waterfront.png', 'Lahug', 'This is a wonderful hotel if ever you are near in this area you can stay here'),
(5, 'Tropical Villa', 'Resort', 'tropical-villa.png', 'Tropical Villa', 'This is a resort called Tropical Villa'),
(6, 'Bayfront Hotel', 'Hotel', 'bayfront.png', 'Mandaue', 'This is a nice hotel in Mandaue'),
(7, 'Crown Regency Hotel', 'Hotel', 'Crown.Regency.Hotel.and.Towers.original.6578.png', 'Capitol', 'This is a nice Crown Regency Hotel');

-- --------------------------------------------------------

--
-- Table structure for table `hotelresortadmin`
--

DROP TABLE IF EXISTS `hotelresortadmin`;
CREATE TABLE `hotelresortadmin` (
  `ID` int(11) NOT NULL,
  `account_ID` int(11) NOT NULL,
  `buildingID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotelresortadmin`
--

INSERT INTO `hotelresortadmin` (`ID`, `account_ID`, `buildingID`) VALUES
(7, 19, 3);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `ID` int(11) NOT NULL,
  `CommentedBy` int(11) NOT NULL,
  `Comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`ID`, `CommentedBy`, `Comment`) VALUES
(1, 20, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nibh dui, tincidunt sed consectetur eu, condimentum vitae est. Pellentesque mattis id velit eget ornare. Praesent in mattis risus, sit amet efficitur purus. Integer sit amet dui nec ero'),
(2, 20, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nibh dui, tincidunt sed consectetur eu, condimentum vitae est. Pellentesque mattis id velit eget ornare. Praesent in mattis risus, sit amet efficitur purus. Integer sit amet dui nec ero');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE `rooms` (
  `ID` int(11) NOT NULL,
  `RoomNo` varchar(198) NOT NULL,
  `Type` varchar(198) NOT NULL,
  `occupied` tinyint(1) NOT NULL,
  `buildingID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`ID`, `RoomNo`, `Type`, `occupied`, `buildingID`) VALUES
(6, '13C', 'Double', 0, 3),
(7, '11A', 'Single', 0, 3),
(8, '11B', 'Single', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `spots`
--

DROP TABLE IF EXISTS `spots`;
CREATE TABLE `spots` (
  `ID` int(11) NOT NULL,
  `Name` varchar(198) NOT NULL,
  `Location` varchar(198) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Status` varchar(198) NOT NULL,
  `Image` text NOT NULL,
  `postedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spots`
--

INSERT INTO `spots` (`ID`, `Name`, `Location`, `Description`, `Status`, `Image`, `postedBy`) VALUES
(7, 'beautiful water', 'Panagsama na Dapit siya', 'Nindut Diri kul', 'Accepted', 'beautiful-water.jpg', 19),
(8, 'Pescador Island', 'Moalboal', 'This is an island near the Moalboal town', 'Accepted', 'pescador.jpg', 19);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `account_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `account_ID`) VALUES
(6, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `account_ID` (`account_ID`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserId` (`UserId`,`RoomId`),
  ADD KEY `RoomId` (`RoomId`);

--
-- Indexes for table `buildingname`
--
ALTER TABLE `buildingname`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hotelresortadmin`
--
ALTER TABLE `hotelresortadmin`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `account_ID` (`account_ID`),
  ADD KEY `buildingID` (`buildingID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CommentedBy` (`CommentedBy`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `buildingID` (`buildingID`);

--
-- Indexes for table `spots`
--
ALTER TABLE `spots`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `postedBy` (`postedBy`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Account_ID` (`account_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `buildingname`
--
ALTER TABLE `buildingname`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hotelresortadmin`
--
ALTER TABLE `hotelresortadmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `spots`
--
ALTER TABLE `spots`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`account_ID`) REFERENCES `accounts` (`ID`);

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`RoomId`) REFERENCES `rooms` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `accounts` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hotelresortadmin`
--
ALTER TABLE `hotelresortadmin`
  ADD CONSTRAINT `hotelresortadmin_ibfk_1` FOREIGN KEY (`account_ID`) REFERENCES `accounts` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`CommentedBy`) REFERENCES `accounts` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`buildingID`) REFERENCES `buildingname` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `spots`
--
ALTER TABLE `spots`
  ADD CONSTRAINT `spots_ibfk_1` FOREIGN KEY (`postedBy`) REFERENCES `accounts` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`Account_ID`) REFERENCES `accounts` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`account_ID`) REFERENCES `accounts` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
