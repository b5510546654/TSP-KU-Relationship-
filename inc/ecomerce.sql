-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 29, 2014 at 10:11 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecomerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `AdditionProductDescriptionTags`
--

CREATE TABLE IF NOT EXISTS `AdditionProductDescriptionTags` (
  `ProductDescriptionId` int(11) NOT NULL,
  `TagId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Brands`
--

CREATE TABLE IF NOT EXISTS `Brands` (
`BrandId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE IF NOT EXISTS `Categories` (
`CategoryId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `ProductDescriptions`
--

CREATE TABLE IF NOT EXISTS `ProductDescriptions` (
`ProductDescriptionId` int(11) NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `BrandId` int(11) NOT NULL,
  `ProductName` text NOT NULL,
  `ModelCode` text NOT NULL,
  `Description` text NOT NULL,
  `CreateDate` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `ProductDescriptionTags`
--

CREATE TABLE IF NOT EXISTS `ProductDescriptionTags` (
  `ProductDescriptionId` int(11) NOT NULL,
  `TagId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ProductImages`
--

CREATE TABLE IF NOT EXISTS `ProductImages` (
`ImageId` int(11) NOT NULL,
  `ProductDescriptionId` int(11) NOT NULL,
  `ImageAddress` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE IF NOT EXISTS `Products` (
`ProductId` int(11) NOT NULL,
  `ProductDescriptionId` text NOT NULL,
  `Price` float NOT NULL,
  `CreateDate` datetime NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `Tags`
--

CREATE TABLE IF NOT EXISTS `Tags` (
`TagId` int(11) NOT NULL,
  `Key` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AdditionProductDescriptionTags`
--
ALTER TABLE `AdditionProductDescriptionTags`
 ADD UNIQUE KEY `TagId` (`TagId`);

--
-- Indexes for table `Brands`
--
ALTER TABLE `Brands`
 ADD PRIMARY KEY (`BrandId`), ADD UNIQUE KEY `name` (`Name`);

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
 ADD PRIMARY KEY (`CategoryId`), ADD UNIQUE KEY `name` (`Name`);

--
-- Indexes for table `ProductDescriptions`
--
ALTER TABLE `ProductDescriptions`
 ADD PRIMARY KEY (`ProductDescriptionId`);

--
-- Indexes for table `ProductImages`
--
ALTER TABLE `ProductImages`
 ADD PRIMARY KEY (`ImageId`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
 ADD PRIMARY KEY (`ProductId`);

--
-- Indexes for table `Tags`
--
ALTER TABLE `Tags`
 ADD PRIMARY KEY (`TagId`), ADD UNIQUE KEY `Key` (`Key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Brands`
--
ALTER TABLE `Brands`
MODIFY `BrandId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Categories`
--
ALTER TABLE `Categories`
MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ProductDescriptions`
--
ALTER TABLE `ProductDescriptions`
MODIFY `ProductDescriptionId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ProductImages`
--
ALTER TABLE `ProductImages`
MODIFY `ImageId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Tags`
--
ALTER TABLE `Tags`
MODIFY `TagId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
