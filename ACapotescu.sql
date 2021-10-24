-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 24, 2021 at 03:20 PM
-- Server version: 5.5.52
-- PHP Version: 5.4.45-0+deb7u5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ACapotescu`
--

DELIMITER $$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `CASEM_Aplicant`
--

CREATE TABLE IF NOT EXISTS `CASEM_Aplicant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenume` varchar(100) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `idJob` int(11) NOT NULL,
  `cv` varchar(100) NOT NULL,
  `scrisoare` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `CASEM_Aplicant`
--

INSERT INTO `CASEM_Aplicant` (`id`, `prenume`, `nume`, `idJob`, `cv`, `scrisoare`) VALUES
(1, 'Capotescu', 'Anca', 1, 'Anca_cv.docx', 'Anca_scrisoare.docx'),
(2, 'fgsdg', 'maria', 1, 'maria_cv.txt', 'maria_scrisoare.txt'),
(3, 'Mihai', 'Costescu', 2, 'Costescu_cv.txt', 'Costescu_scrisoare.txt'),
(4, 'Capotescu', 'Anca', 2, 'Anca_cv.txt', 'Anca_scrisoare.txt'),
(5, 'popesu', 'tinu', 2, 'tinu_cv.txt', 'tinu_scrisoare.txt'),
(6, 'pop', 'marian', 2, 'marian_cv.txt', 'marian_scrisoare.txt'),
(7, 'gama', 'maria', 4, 'maria_cv.txt', 'maria_scrisoare.txt'),
(8, 'pinus', 'liviu', 1, 'liviu_cv.txt', 'liviu_scrisoare.txt'),
(9, 'balu', 'balumba', 2, 'balumba_cv.jpg', 'balumba_scrisoare.jpg'),
(10, 'andrei', 'popescu', 3, 'popescu_cv.doc', 'popescu_scrisoare.docx'),
(11, 'toma', 'toma', 4, 'toma_cv.docx', 'toma_scrisoare.docx'),
(12, 'lari', 'lari', 4, 'lari_cv.docx', 'lari_scrisoare.docx'),
(13, 'andrei', 'toma', 1, 'toma_cv.docx', 'toma_scrisoare.doc'),
(14, 'Test', 'User', 9, 'User_cv.pdf', 'User_scrisoare.png');

-- --------------------------------------------------------

--
-- Table structure for table `CASEM_Contact`
--

CREATE TABLE IF NOT EXISTS `CASEM_Contact` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nume` char(50) NOT NULL,
  `Prenume` char(50) NOT NULL,
  `Firma` char(50) NOT NULL,
  `Adresa` char(50) NOT NULL,
  `Telefon` char(50) NOT NULL,
  `Frigider` char(50) NOT NULL,
  `Descriere` char(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `CASEM_Contact`
--

INSERT INTO `CASEM_Contact` (`ID`, `Nume`, `Prenume`, `Firma`, `Adresa`, `Telefon`, `Frigider`, `Descriere`) VALUES
(1, 'Anca', 'Capotescu', 'casem', 'ulpia', '0865', 'ICOOL-300', 'da'),
(2, 'Anca', 'Capotescu', 'casem', 'ulpia', '0865', 'ICOOL-300', 'da'),
(3, 'maria', 'gama', 'gir', 'rebreanu', '073923', 'ICOOL-300', 'da'),
(4, 'Anca', 'Capotescu', 'casem', 'dar', 'ytu565', 'ICOOL-450L', 'as'),
(5, 'alex', 'sandru', '', '', '', '', ''),
(6, 'Alex', 'Sandru', 'Test srl', 'aici', '0722222222', 'ICOOL-300', 'aaa'),
(7, 'a', 'a', 'a', 'a', 'a', 'ICOOL-300_hybrid', 'a'),
(8, 'popescu', 'andrei', 'a', 'a', 'a', 'ICOOL-500', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `CASEM_Job`
--

CREATE TABLE IF NOT EXISTS `CASEM_Job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `denumire` varchar(100) NOT NULL,
  `modlucru` varchar(50) NOT NULL,
  `cerinte` text NOT NULL,
  `aplicanti` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `CASEM_Job`
--

INSERT INTO `CASEM_Job` (`id`, `denumire`, `modlucru`, `cerinte`, `aplicanti`) VALUES
(1, 'Frigotehnist', 'pe teren', 'diploma de frigotehnist,permis auto categoria B,cunostinte de operare smartphone', 2),
(2, 'Electrician', 'pe teren', 'diploma de electrician,permis auto categoria B,cunostinte de operare smartphone', 4),
(3, 'Electromecanic', 'pe teren', 'diploma de electromecanic,permis auto categoria B,cunostinte de operare smartphone', 1),
(4, 'Operator calculator', 'la birou', 'cunostinte de calculator(Microsoft Office,Internet),cunostinte de operare smartphone', 3);

-- --------------------------------------------------------

--
-- Table structure for table `CASEM_User`
--

CREATE TABLE IF NOT EXISTS `CASEM_User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(1023) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  `registTS` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `CASEM_User`
--

INSERT INTO `CASEM_User` (`id`, `name`, `email`, `password`, `admin`, `registTS`) VALUES
(1, 'CasemAdministrator', 'admin@casem.ro', '$2y$10$mLK3qh8ehyrNJGV9JLwpHec1u7wZMHHhIQljePvxUIXxixx9rOpwm', 1, '2021-10-24 12:16:03'),
(2, 'TestUser', 'user@example.ro', '$2y$10$MhRuS.93nEF6uGzBOcXD3.6.HMGk5SfpXI8P.mJU8B9.Kn5InctTy', 0, '2021-10-24 12:16:32');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
