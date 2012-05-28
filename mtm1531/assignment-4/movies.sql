-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 28, 2012 at 07:36 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `andr0182`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_title` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  `director` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `movie_title`, `release_date`, `director`) VALUES
(1, 'House Of Flying Daggers', '2004-12-17', 'Yimou Zhang'),
(2, 'Lawrence of Arabia', '1963-01-30', 'David Lean'),
(3, 'Metropolis', '1927-03-13', 'Fritz Lang'),
(5, 'The Third Man', '1949-08-31', 'Carol Reed'),
(6, 'The Bicycle Thief', '1948-01-01', 'Vittorio De Sica'),
(7, 'Spider-Man', '2002-01-01', 'Sam Raimi');
