-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 18, 2020 at 03:18 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registraciadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

DROP TABLE IF EXISTS `films`;
CREATE TABLE IF NOT EXISTS `films` (
  `filmID` int(11) NOT NULL AUTO_INCREMENT,
  `film_name` varchar(50) DEFAULT NULL,
  `gamoshvebis_weli` int(11) DEFAULT NULL,
  `agwera` varchar(250) DEFAULT NULL,
  `mdebareoba` text DEFAULT NULL,
  `rejisoriID` int(11) DEFAULT NULL,
  PRIMARY KEY (`filmID`),
  KEY `rejisoriID` (`rejisoriID`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`filmID`, `film_name`, `gamoshvebis_weli`, `agwera`, `mdebareoba`, `rejisoriID`) VALUES
(33, 'udiplomo sasidzo', 1980, 'filmi chabukze romelsac uyvars verdenis qalishvili :D', NULL, NULL),
(34, 'axali filmi', 1975, 'mushaobs gio gilocav <3 <3', NULL, NULL),
(35, 'fesvebi', 1988, 'dodo abashidzis bolo filmi romelic titoeul aamians crems wamoadens', NULL, NULL),
(36, 'cisferi mtebi', 1988, 'cisferi mtebi anu tianshani', '', NULL),
(44, 'ana banana', 1890, 'mogvitana mamam shesha?', '99120697_537168650283500_8664332436408107008_n.jpg', NULL),
(45, 'jariskacis mama', 1977, 'filmi vajkac mama-shvilze', 'IMG_20200527_110542.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `films_msaxiobi`
--

DROP TABLE IF EXISTS `films_msaxiobi`;
CREATE TABLE IF NOT EXISTS `films_msaxiobi` (
  `filmID` int(11) NOT NULL,
  `msaxiobiID` int(11) NOT NULL,
  KEY `filmID` (`filmID`,`msaxiobiID`),
  KEY `msaxiobiID` (`msaxiobiID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `msaxiobi`
--

DROP TABLE IF EXISTS `msaxiobi`;
CREATE TABLE IF NOT EXISTS `msaxiobi` (
  `msaxiobiID` int(11) NOT NULL AUTO_INCREMENT,
  `saxeli` varchar(20) NOT NULL,
  `gvari` varchar(20) NOT NULL,
  `asaki` int(11) DEFAULT NULL,
  PRIMARY KEY (`msaxiobiID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `piradi_asistenti`
--

DROP TABLE IF EXISTS `piradi_asistenti`;
CREATE TABLE IF NOT EXISTS `piradi_asistenti` (
  `asistentiID` int(11) NOT NULL AUTO_INCREMENT,
  `saxeli` int(11) NOT NULL,
  `gvari` int(11) NOT NULL,
  `misamarti` varchar(250) NOT NULL,
  `rejisoriID` int(11) NOT NULL,
  PRIMARY KEY (`asistentiID`),
  UNIQUE KEY `rejisoriID` (`rejisoriID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `register_user`
--

DROP TABLE IF EXISTS `register_user`;
CREATE TABLE IF NOT EXISTS `register_user` (
  `register_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_activation_code` varchar(250) NOT NULL,
  `user_email_status` enum('not verified','verified') NOT NULL,
  `status` enum('admin','user') NOT NULL,
  PRIMARY KEY (`register_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_user`
--

INSERT INTO `register_user` (`register_user_id`, `user_name`, `user_email`, `user_password`, `user_activation_code`, `user_email_status`, `status`) VALUES
(1, 'John Smith', 'web-tutorial@programmer.net', '$2y$10$vdMwAmoRJfep8Vl4BI0QDOXArOCTOMbFs6Ja15qq3NEkPUBBtffD2', 'c74c4bf0dad9cbae3d80faa054b7d8ca', 'verified', 'user'),
(20, 'giorgi', 'g.dogadze@gmail.com', '$2y$10$Bffgehv6pIat3VDd8GgfHeNlr3zAITOQ6Xq7sJKPp8jfVwDDJvB/u', 'smth', 'verified', 'admin'),
(21, 'takole', 'tamaradogadze@mail.ru', '$2y$10$SWCvvlusfXrj5n/jVmVYlOWrQnhG.u5l/LcVG2YhW.u2abdfK3/5G', 'smth2', 'verified', 'user'),
(22, 'giorgii', 'giorgi.doghadze106@ens.tsu.edu.ge', '$2y$10$wzumg2oDiS0dYElZUSueiOksohA0QS4Lzm6DY6eB2neU/gyJ.JvKy', '68554197ddaf334fb9e54244859dfe23', 'verified', 'user'),
(23, 'sad@sada.com', 'sad@sada.com', '$2y$10$XetriTKcbA0AOXhFn10CCOX2oVcIVq8nHZrwnTgktjRp8pr6R3OFC', '09652641422b0fff03db2756da58650d', 'verified', 'user'),
(24, 'bugia', 'z.dogadze@mail.ru', '$2y$10$bxAJ4W6vI4o2NSTnB5pWFONxH731u.04UwNR6.HmqODaMZikJRdBm', 'f666d053ab779492beffbcd4b26b744e', 'verified', 'user'),
(29, 'hopeLasttry', 'hopeLasttry@gmail.com', '$2y$10$f3.FDGu8a3W2R6kaG574NOgUnsDgW4nYi1tFMCnzStgjSIjMZxkTm', '37854bacd38ff5b8fef99ae196f299e7', 'verified', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `rejisori`
--

DROP TABLE IF EXISTS `rejisori`;
CREATE TABLE IF NOT EXISTS `rejisori` (
  `rejisoriID` int(11) NOT NULL AUTO_INCREMENT,
  `saxeli` varchar(20) NOT NULL,
  `gvari` varchar(20) NOT NULL,
  `asaki` int(11) DEFAULT NULL,
  PRIMARY KEY (`rejisoriID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `films`
--
ALTER TABLE `films`
  ADD CONSTRAINT `films_ibfk_1` FOREIGN KEY (`rejisoriID`) REFERENCES `rejisori` (`rejisoriID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `films_msaxiobi`
--
ALTER TABLE `films_msaxiobi`
  ADD CONSTRAINT `films_msaxiobi_ibfk_1` FOREIGN KEY (`filmID`) REFERENCES `films` (`filmID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `films_msaxiobi_ibfk_2` FOREIGN KEY (`msaxiobiID`) REFERENCES `msaxiobi` (`msaxiobiID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `piradi_asistenti`
--
ALTER TABLE `piradi_asistenti`
  ADD CONSTRAINT `piradi_asistenti_ibfk_1` FOREIGN KEY (`rejisoriID`) REFERENCES `rejisori` (`rejisoriID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
