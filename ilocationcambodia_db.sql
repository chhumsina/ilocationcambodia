-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2015 at 01:38 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ilocationcambodia_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ilc_branches`
--

CREATE TABLE IF NOT EXISTS `ilc_branches` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `longitude` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '	',
  `website` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_1` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_2` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `bra_approve` tinyint(1) NOT NULL,
  `com_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`branch_id`),
  KEY `fk_ilc_branches_ilc_companies1_idx` (`com_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `ilc_branches`
--

INSERT INTO `ilc_branches` (`branch_id`, `title`, `longitude`, `latitude`, `email`, `website`, `phone_1`, `phone_2`, `address`, `description`, `bra_approve`, `com_id`) VALUES
(9, 'Stueng Mean Chey', '0', '0', '', '', '', '', '', '', 1, 19),
(10, 'Stueng Mean Chey', '-0.00034332275390625', '-0.0011157989501267', 'sina@ss.com', 'ac.com', '9999999111', '99991111111', '#33', 'desc', 1, 20),
(13, 'Stueng Mean Chey', '104.88590115974125', '11.538902149358368', 'sina@gmail.com', 'sina.com', '09999', '08888', '#888999', 'Test desc', 1, 34),
(14, 'Stueng Mean Chey !!', '104.91177911231694', '11.559841265280385', 'sina1@gmail.com', 'sina1.co', '0909090', '080808', '#989808080', 'Tedst 908080', 1, 34);

-- --------------------------------------------------------

--
-- Table structure for table `ilc_categories`
--

CREATE TABLE IF NOT EXISTS `ilc_categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(150) NOT NULL,
  `cat_approve` tinyint(1) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ilc_categories`
--

INSERT INTO `ilc_categories` (`cat_id`, `cat_name`, `cat_approve`) VALUES
(2, 'Restaurent', 1),
(4, 'Bank', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ilc_companies`
--

CREATE TABLE IF NOT EXISTS `ilc_companies` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `use_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `use_password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `re_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `activate_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_1` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_2` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `utype_id` int(11) DEFAULT NULL,
  `com_logo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `approve` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `com_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `deleted` tinyint(4) DEFAULT '0',
  `create_date` date NOT NULL,
  PRIMARY KEY (`com_id`),
  UNIQUE KEY `user_name_UNIQUE` (`use_name`),
  KEY `fk_ilc_users_ilc_user_types1_idx` (`utype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Dumping data for table `ilc_companies`
--

INSERT INTO `ilc_companies` (`com_id`, `use_name`, `use_password`, `re_password`, `activate_code`, `gender`, `email`, `phone_1`, `phone_2`, `utype_id`, `com_logo`, `approve`, `publish`, `com_name`, `description`, `cat_id`, `deleted`, `create_date`) VALUES
(12, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '', 'male', 'admin@gmail.com', NULL, NULL, 1, NULL, 1, 0, 'Planing', '', 999, 0, '0000-00-00'),
(19, 'anz', '88e1e1ca208e047be09ac68302716180', 'anz', '', NULL, '', '', '', 2, 'anz.jpg', 1, 1, 'Anz_Royal', '', 1, 0, '0000-00-00'),
(20, 'aclida', '54d4e6548180bda935c806dfa1bae7be', 'aclida', '', NULL, 'chhumsina@gmail.com', '098 23 23 23', '098 65 22 21', 2, 'aclida.jpg', 1, 1, 'Aclida', 'I love you', 1, 0, '0000-00-00'),
(33, 'khk', '581e9b5a60c3ca7c53dee0ea58123ed0', 'khk', 'RRG35KV2hCmdp6HpyTHM', NULL, 'chhumsina@gmail.com', '0999999', '0888888', 2, 'anz.jpg', 1, 1, 'Khk', 'Test desc', 2, 0, '2015-02-08'),
(34, 'sina', 'f3cd3a30041fb6bb38da8bda843de5ba', 'sina', 'ek76EXjcmhcoqawZdfS4', NULL, 'chhumsina@gmail.com', '099 123 234', '089 534 261', 2, 'photo.jpg', 1, 1, 'Sina', 'Test sina', 4, 0, '2015-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `ilc_user_types`
--

CREATE TABLE IF NOT EXISTS `ilc_user_types` (
  `utype_id` int(11) NOT NULL AUTO_INCREMENT,
  `utype_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`utype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ilc_user_types`
--

INSERT INTO `ilc_user_types` (`utype_id`, `utype_name`) VALUES
(1, 'owner'),
(2, 'corporator');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ilc_branches`
--
ALTER TABLE `ilc_branches`
  ADD CONSTRAINT `fk_ilc_branches_ilc_companies1` FOREIGN KEY (`com_id`) REFERENCES `ilc_companies` (`com_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ilc_companies`
--
ALTER TABLE `ilc_companies`
  ADD CONSTRAINT `fk_ilc_users_ilc_user_types1` FOREIGN KEY (`utype_id`) REFERENCES `ilc_user_types` (`utype_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
