-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 19, 2022 at 05:16 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `Slno` int(5) NOT NULL AUTO_INCREMENT,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Block` tinyint(1) NOT NULL DEFAULT '1',
  `UpdateDate` date NOT NULL,
  PRIMARY KEY (`Slno`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Slno`, `Username`, `Password`, `Date`, `Block`, `UpdateDate`) VALUES
(1, 'Debraj Aditya', '4388c0ac505fa5cf479c1fd4947b3fa7', '2020-03-31', 1, '2020-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `Slno` int(5) NOT NULL AUTO_INCREMENT,
  `Course` varchar(500) NOT NULL,
  `Fee` int(5) NOT NULL,
  `Date` date NOT NULL,
  `Updatedate` date NOT NULL,
  `Block` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Slno`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Slno`, `Course`, `Fee`, `Date`, `Updatedate`, `Block`) VALUES
(1, 'C', 3000, '2020-04-02', '2020-04-02', 1),
(2, 'CPP', 3000, '2020-04-02', '2020-04-02', 1),
(3, 'PHP', 3000, '2020-04-02', '2020-04-05', 1),
(4, 'HTML', 2000, '2020-04-02', '2020-04-05', 1),
(5, 'FULLSTACK WEBDESIGN (PHP,MYSQL,HTML,BOOTSTRAP,JAVASCRIPT)', 10000, '2020-04-02', '2020-04-05', 1),
(6, 'JAVA', 5000, '2020-04-02', '2020-04-05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `Contact` varchar(10) NOT NULL,
  `Address` varchar(1000) NOT NULL,
  `Gmail` varchar(50) NOT NULL,
  `Course` text NOT NULL,
  `DOJ` date NOT NULL,
  `Block` int(11) NOT NULL,
  `DOE` varchar(15) NOT NULL DEFAULT 'Current',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Id`, `Name`, `Contact`, `Address`, `Gmail`, `Course`, `DOJ`, `Block`, `DOE`) VALUES
(1, 'Debraj Aditya', '7005782532', '247, Lhomithi colony, Dimapur Nagaland', 'debraj.123@gmail.com', 'FULLSTACK WEBDESIGN (PHP,MYSQL,HTML,BOOTSTRAP,JAVASCRIPT)', '2020-04-02', 1, 'Current'),
(3, 'Anita Aditya', '9862799274', '49 Lhomthi colony Nagaland', 'anita123@gmail.com', 'PHP', '2020-04-02', 1, 'Current'),
(5, 'Debojit Chakraborty', '7095664826', 'kamrup metropolatian', 'debojitchakraborty9@gmail.com', 'JAVA', '2020-04-03', 1, 'Current'),
(6, 'Pritam', '9862051696', 'Zelilong Village Dimapur Nagaland', 'pritam124@gmail.com', 'JAVA', '2020-04-04', 1, 'Current'),
(7, 'Shiwani Singh', '7005782539', 'Dhobinala dimapur nagaland', 'shiwani3@gmail.com', 'PHP', '2021-05-28', 1, 'Current'),
(8, 'Ankan khatua', '9178877355', 'kolkata people', 'ankan123@gmail.com', 'FULLSTACK WEBDESIGN (PHP,MYSQL,HTML,BOOTSTRAP,JAVASCRIPT)', '2021-05-28', 1, 'Current'),
(11, 'Tilok', '1235567893', 'guwahit ppl', 'tolok1253@gmail.com', 'JAVA', '2021-05-31', 1, 'Current'),
(14, 'nag', '1233211234', 'dksjdks', 'nag@gmail.com', 'FULLSTACK WEBDESIGN (PHP,MYSQL,HTML,BOOTSTRAP,JAVASCRIPT)', '2021-05-31', 1, 'Current'),
(15, 'Ritu deb', '1212123324', 'Lal Ganesh, Guwahati', 'deb@gmail.com', 'FULLSTACK WEBDESIGN (PHP,MYSQL,HTML,BOOTSTRAP,JAVASCRIPT)', '2021-05-31', 1, 'Current'),
(16, 'Pritam Nag', '1234567892', 'kolkata people', 'pritam123@gmail.com', 'FULLSTACK WEBDESIGN (PHP,MYSQL,HTML,BOOTSTRAP,JAVASCRIPT)', '2021-05-31', 1, 'Current');

-- --------------------------------------------------------

--
-- Table structure for table `studentfees`
--

DROP TABLE IF EXISTS `studentfees`;
CREATE TABLE IF NOT EXISTS `studentfees` (
  `Slno` int(5) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `Course` varchar(500) NOT NULL,
  `Gmail` varchar(30) NOT NULL,
  `Contact` varchar(10) NOT NULL,
  `Date` date NOT NULL,
  `Block` tinyint(1) NOT NULL DEFAULT '1',
  `Fee` int(5) NOT NULL,
  `Paid` int(5) NOT NULL,
  `PaidVia` varchar(10) NOT NULL,
  PRIMARY KEY (`Slno`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentfees`
--

INSERT INTO `studentfees` (`Slno`, `Name`, `Course`, `Gmail`, `Contact`, `Date`, `Block`, `Fee`, `Paid`, `PaidVia`) VALUES
(18, 'Debojit Chakraborty', 'JAVA', 'debojitchakraborty9@gmail.com', '7095664826', '2020-04-04', 1, 5000, 4000, 'CASH'),
(16, 'Anita Aditya', 'PHP', 'anita123@gmail.com', '9862799274', '2022-12-19', 1, 3000, 2500, 'CARD'),
(17, 'Bishal Saha', 'PHP', 'bishal123@gmail.com', '9612448931', '2020-04-04', 1, 3000, 1000, 'CASH'),
(15, 'Debraj Aditya', 'FULLSTACK WEBDESIGN (PHP,MYSQL,HTML,BOOTSTRAP,JAVASCRIPT)', 'debraj.123@gmail.com', '7005782532', '2020-04-04', 1, 10000, 10000, 'CASH'),
(19, 'Shiwani Singh', 'PHP', 'shiwani@gmail.com', '7005782539', '2021-05-31', 1, 3000, 3000, ''),
(20, 'Ankan khatua', 'FULLSTACK WEBDESIGN (PHP,MYSQL,HTML,BOOTSTRAP,JAVASCRIPT)', 'ankan123@gmail.com', '9178877355', '2021-05-28', 1, 10000, 0, ''),
(21, 'Ankan khatua', 'FULLSTACK WEBDESIGN (PHP,MYSQL,HTML,BOOTSTRAP,JAVASCRIPT)', 'ankan3@gmail.com', '9178877477', '2021-05-28', 1, 10000, 0, ''),
(22, 'Tilok', 'JAVA', 'tolok123@gmail.com', '1234567893', '2021-05-31', 1, 5000, 5000, 'CARD'),
(23, 'Tilok', 'JAVA', 'tolok1253@gmail.com', '1235567893', '2021-05-31', 1, 5000, 0, ''),
(24, 'Tilok', 'JAVA', 'tolk1253@gmail.com', '1235367893', '2021-05-31', 1, 5000, 5000, 'UPI'),
(25, 'Tilok', 'JAVA', 'tol253@gmail.com', '1232343456', '2021-05-31', 1, 5000, 0, ''),
(26, 'nag', 'FULLSTACK WEBDESIGN (PHP,MYSQL,HTML,BOOTSTRAP,JAVASCRIPT)', 'nag@gmail.com', '1233211234', '2021-05-31', 1, 10000, 0, ''),
(27, 'asdad', 'FULLSTACK WEBDESIGN (PHP,MYSQL,HTML,BOOTSTRAP,JAVASCRIPT)', 'asd@gmail.com', '1212123324', '2021-05-31', 1, 10000, 0, ''),
(28, 'Pritam Nag', 'FULLSTACK WEBDESIGN (PHP,MYSQL,HTML,BOOTSTRAP,JAVASCRIPT)', 'pritam123@gmail.com', '1234567892', '2021-05-31', 1, 10000, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `xstudent`
--

DROP TABLE IF EXISTS `xstudent`;
CREATE TABLE IF NOT EXISTS `xstudent` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `Contact` varchar(10) NOT NULL,
  `Gmail` varchar(50) NOT NULL,
  `Address` varchar(1000) NOT NULL,
  `Course` varchar(500) NOT NULL,
  `D.O.L.` date NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xstudent`
--

INSERT INTO `xstudent` (`Id`, `Name`, `Contact`, `Gmail`, `Address`, `Course`, `D.O.L.`) VALUES
(1, 'Bishal Saha', '9862051696', 'bishal123@gmail.com', '49 Dhobinala Dimapur Nagaland', 'JAVA', '2020-04-02'),
(2, 'Bishal Saha', '9612448931', 'bishal123@gmail.com', '58 Chandigarh sector 54', 'PHP', '2020-04-05'),
(3, 'Ankan khatua', '9178877477', 'ankan3@gmail.com', 'kolkata people ggg', 'FULLSTACK WEBDESIGN (PHP,MYSQL,HTML,BOOTSTRAP,JAVASCRIPT)', '2021-05-31'),
(4, 'Tilok', '1232343456', 'tol253@gmail.com', 'guwahit ppl', 'JAVA', '2022-12-19'),
(5, 'Tilok', '1235367893', 'tolk1253@gmail.com', 'guwahit ppl', 'JAVA', '2022-12-19'),
(6, 'Tilok', '1234567893', 'tolok123@gmail.com', 'guwahit ppl', 'JAVA', '2022-12-19');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
