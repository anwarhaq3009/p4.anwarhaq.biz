-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 29, 2013 at 08:16 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `p4.anwarhaq.biz`
--

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE IF NOT EXISTS `cases` (
  `case_id` int(11) NOT NULL AUTO_INCREMENT,
  `cr_by` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `priority` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `completed` varchar(1) NOT NULL,
  `target_dt` varchar(15) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`case_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`case_id`, `cr_by`, `dept_id`, `company_id`, `priority`, `created`, `modified`, `completed`, `target_dt`, `description`) VALUES
(8, 7, 1, 2, 'High', 1388277818, 1388277818, 'N', '12/31/2013', 'Test Case1'),
(9, 7, 2, 1, 'Medium', 1388310404, 1388310404, 'N', '12/30/2013', 'Test Case # 2'),
(10, 15, 1, 3, 'Medium', 1388320174, 1388320174, 'N', '12/30/2013', 'Test Case 3'),
(11, 16, 1, 3, 'Low', 1388320385, 1388320385, 'N', '12/30/2013', 'anu First Case'),
(12, 16, 1, 1, 'None', 1388334918, 1388334918, 'N', '12/30/2013', 'Test Case 4'),
(13, 16, 1, 1, 'High', 1388334942, 1388334942, 'N', '12/31/2013', 'test CASE 5'),
(14, 16, 3, 1, 'High', 1388334960, 1388334960, 'N', '12/31/2013', 'TEST cASE 6');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `cr_by` int(11) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `created`, `modified`, `cr_by`) VALUES
(1, 'JPMC', 1388257222, 1388257222, 7),
(2, 'Wells Fargo', 1388257278, 1388257278, 7),
(3, 'Bank of America', 1388257361, 1388257361, 7);

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE IF NOT EXISTS `dept` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `cr_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`dept_id`, `dept_name`, `company_id`, `created`, `modified`, `cr_by`) VALUES
(1, 'JPMC DEPT1', 1, 1388327045, 1388327045, 15),
(2, 'JPMC DEPT 2', 1, 1388327066, 1388327066, 15),
(3, 'JPMC DEPT 3', 1, 1388327080, 1388327080, 15),
(1, 'WF DEPT1', 2, 1388327094, 1388327094, 15),
(2, 'WF DEPT2', 2, 1388327104, 1388327104, 15),
(3, 'WF DEPT3', 2, 1388327127, 1388327127, 15),
(1, 'BOA DEPT 1', 3, 1388327162, 1388327162, 15),
(2, 'BOA DEPT 1', 3, 1388327170, 1388327170, 15),
(3, 'BOA DEPT 3', 3, 1388327183, 1388327183, 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `orig_pwd` varchar(255) NOT NULL,
  `last_login` int(11) NOT NULL,
  `timezone` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `created`, `modified`, `token`, `password`, `orig_pwd`, `last_login`, `timezone`, `first_name`, `last_name`, `email`, `dept_id`, `company_id`) VALUES
(3, 1383662826, 0, 'a0362df0019ac7eed51f51c39c280faf6f9a3405', '6afdb8faf6362819d2e19368369157945bbdffb8', '', 0, '', 'Peter', 'Vargas', 'peter.vargas@abc.com', NULL, NULL),
(4, 1383662862, 0, '4864a484f4a3ebe284ab5fdd2e83daf2fc827fdc', '4963d931d6cea49376be7e511c1717c6c1427d40', '', 0, '', 'Anwar', 'Haq', 'anwarhaq.us@anwarhaq.biz', NULL, NULL),
(5, 1383664826, 0, '99b3aaabe4c842a89ac759fca580c8f0392effb2', '4a7ae5df9e979dfdc9281c7c3e484c21b3c10854', '', 0, '', 'Marty', 'Boldie', 'marty.boldie@abc.com', NULL, NULL),
(6, 1387797508, 0, 'ee7a7857874315ecb99634c037847612f9f95611', '7cb99314dc9cad940e5074ef2e8a4b9968c216e0', '', 0, '', 'maria', 'haq', 'mariahaq.us@anwarhaq.biz', NULL, NULL),
(7, 1387999083, 0, '6bb161f82eeb9fd06e711a8b24e80534af283858', 'cd470e5fb5f6d80dca47482d7120301ed662a2d9', 'anwar', 0, '', 'anwar', 'haq', 'anwarhaq.us@gmail.com', NULL, NULL),
(8, 1388181247, 0, '6ff3e7eb1d5f6a33bef5b5c497646506f677d488', 'c630c430e079db8e36fd017f9bf606e00a6dee6b', 'nuraz', 0, '', 'Nuraz', 'Haq', 'nurazhaq.us@gmail.com', NULL, NULL),
(9, 1388181397, 0, 'e5725f6ecd6d8c2b8455046c24b703ac204132e8', '32d10c7b8cf96570ca04ce37f2a19d84240d3a89', '', 0, '', '', '', '', NULL, NULL),
(10, 1388181429, 0, 'e8a159748b202e18268e65107261ceb5aabf09af', '32d10c7b8cf96570ca04ce37f2a19d84240d3a89', '', 0, '', '', '', '', NULL, NULL),
(11, 1388181440, 0, '2b56a0ff1e9e3aa60134bccd0063a0c83e7f2659', '32d10c7b8cf96570ca04ce37f2a19d84240d3a89', '', 0, '', '', '', '', NULL, NULL),
(12, 1388181475, 0, 'c027c78af2c8f22029733ab68333eed539909886', '32d10c7b8cf96570ca04ce37f2a19d84240d3a89', '', 0, '', '', '', '', NULL, NULL),
(13, 1388181511, 0, 'b074c4e6646692e6aae1833474ac680d698e7ba9', '32d10c7b8cf96570ca04ce37f2a19d84240d3a89', '', 0, '', '', '', '', NULL, NULL),
(14, 1388181517, 0, 'a41a3f1e19a2a447875d64a26c492e4084b445d1', '32d10c7b8cf96570ca04ce37f2a19d84240d3a89', '', 0, '', '', '', '', NULL, NULL),
(15, 1388318550, 0, 'ddc42c57834877226c9898b8b686f29884c3735a', '15099e0a7f9f99ef143b401aa1811884bae38290', 'admin', 0, '', 'Administrator', 'Administrator', 'admin@anwarhaq.biz', 0, 0),
(16, 1388320334, 0, '09203335bca0ce5e468a387cbe6da29c192d7be6', '1c4c8394f1350b8eba6b58dadb85867cd0bde5f0', 'anu', 0, '', 'Anu', 'Haq', 'anu@anwarhaq.biz', 1, 1);
