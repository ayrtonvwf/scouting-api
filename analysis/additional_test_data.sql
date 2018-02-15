-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 15, 2018 at 07:10 PM
-- Server version: 5.7.18
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scouting`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
CREATE TABLE IF NOT EXISTS `answer` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `question_id` int(10) UNSIGNED NOT NULL,
  `evaluation_id` int(10) UNSIGNED NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `answer-question_id` (`question_id`),
  KEY `answer-evaluation_id` (`evaluation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=225 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `question_id`, `evaluation_id`, `value`) VALUES
(1, 11, 2, '1'),
(2, 12, 2, '0'),
(3, 15, 2, '3'),
(4, 16, 2, '0'),
(5, 17, 2, '80'),
(6, 18, 2, '1'),
(7, 19, 2, '0'),
(8, 20, 2, '0'),
(9, 11, 3, '2'),
(10, 12, 3, '0'),
(11, 15, 3, '3'),
(12, 16, 3, '0'),
(13, 17, 3, '80'),
(14, 18, 3, '1'),
(15, 19, 3, '0'),
(16, 20, 3, '0'),
(17, 11, 4, 'aa'),
(18, 12, 4, '0'),
(19, 15, 4, '3'),
(20, 16, 4, '0'),
(21, 17, 4, '80'),
(22, 18, 4, '1'),
(23, 19, 4, '0'),
(24, 20, 4, '0'),
(25, 11, 5, 'aa'),
(26, 12, 5, '0'),
(27, 15, 5, '3'),
(28, 16, 5, '0'),
(29, 17, 5, '80'),
(30, 18, 5, '1'),
(31, 19, 5, '0'),
(32, 20, 5, '0'),
(33, 11, 6, 'aa'),
(34, 12, 6, '0'),
(35, 15, 6, '3'),
(36, 16, 6, '0'),
(37, 17, 6, '80'),
(38, 18, 6, '1'),
(39, 19, 6, '0'),
(40, 20, 6, '0'),
(41, 11, 7, 'aa'),
(42, 12, 7, '0'),
(43, 15, 7, '3'),
(44, 16, 7, '0'),
(45, 17, 7, '80'),
(46, 18, 7, '1'),
(47, 19, 7, '0'),
(48, 20, 7, '0'),
(49, 11, 8, 'aa'),
(50, 12, 8, '0'),
(51, 15, 8, '3'),
(52, 16, 8, '0'),
(53, 17, 8, '80'),
(54, 18, 8, '1'),
(55, 19, 8, '0'),
(56, 20, 8, '0'),
(57, 11, 9, 'aa'),
(58, 12, 9, '0'),
(59, 15, 9, '3'),
(60, 16, 9, '0'),
(61, 17, 9, '80'),
(62, 18, 9, '1'),
(63, 19, 9, '0'),
(64, 20, 9, '0'),
(65, 11, 10, 'aa'),
(66, 12, 10, '0'),
(67, 15, 10, '3'),
(68, 16, 10, '0'),
(69, 17, 10, '80'),
(70, 18, 10, '1'),
(71, 19, 10, '0'),
(72, 20, 10, '0'),
(73, 11, 11, 'aa'),
(74, 12, 11, '0'),
(75, 15, 11, '3'),
(76, 16, 11, '0'),
(77, 17, 11, '80'),
(78, 18, 11, '1'),
(79, 19, 11, '0'),
(80, 20, 11, '0'),
(81, 11, 12, 'aa'),
(82, 12, 12, '0'),
(83, 15, 12, '3'),
(84, 16, 12, '0'),
(85, 17, 12, '80'),
(86, 18, 12, '1'),
(87, 19, 12, '0'),
(88, 20, 12, '0'),
(89, 11, 13, 'aa'),
(90, 12, 13, '0'),
(91, 15, 13, '3'),
(92, 16, 13, '0'),
(93, 17, 13, '80'),
(94, 18, 13, '1'),
(95, 19, 13, '0'),
(96, 20, 13, '0'),
(97, 11, 14, 'aa'),
(98, 12, 14, '0'),
(99, 15, 14, '3'),
(100, 16, 14, '0'),
(101, 17, 14, '80'),
(102, 18, 14, '1'),
(103, 19, 14, '0'),
(104, 20, 14, '0'),
(105, 11, 15, 'aa'),
(106, 12, 15, '0'),
(107, 15, 15, '3'),
(108, 16, 15, '0'),
(109, 17, 15, '80'),
(110, 18, 15, '1'),
(111, 19, 15, '0'),
(112, 20, 15, '0'),
(113, 11, 16, 'aa'),
(114, 12, 16, '0'),
(115, 15, 16, '3'),
(116, 16, 16, '0'),
(117, 17, 16, '80'),
(118, 18, 16, '1'),
(119, 19, 16, '0'),
(120, 20, 16, '0'),
(121, 11, 17, 'aa'),
(122, 12, 17, '0'),
(123, 15, 17, '3'),
(124, 16, 17, '0'),
(125, 17, 17, '80'),
(126, 18, 17, '1'),
(127, 19, 17, '0'),
(128, 20, 17, '0'),
(129, 11, 18, 'aa'),
(130, 12, 18, '0'),
(131, 15, 18, '3'),
(132, 16, 18, '0'),
(133, 17, 18, '80'),
(134, 18, 18, '1'),
(135, 19, 18, '0'),
(136, 20, 18, '0'),
(137, 11, 19, 'aa'),
(138, 12, 19, '0'),
(139, 15, 19, '3'),
(140, 16, 19, '0'),
(141, 17, 19, '80'),
(142, 18, 19, '1'),
(143, 19, 19, '0'),
(144, 20, 19, '0'),
(145, 11, 20, 'aa'),
(146, 12, 20, '0'),
(147, 15, 20, '3'),
(148, 16, 20, '0'),
(149, 17, 20, '80'),
(150, 18, 20, '1'),
(151, 19, 20, '0'),
(152, 20, 20, '0'),
(153, 11, 21, 'aa'),
(154, 12, 21, '0'),
(155, 15, 21, '3'),
(156, 16, 21, '0'),
(157, 17, 21, '80'),
(158, 18, 21, '1'),
(159, 19, 21, '0'),
(160, 20, 21, '0'),
(161, 11, 22, '1'),
(162, 12, 22, '0'),
(163, 15, 22, '3'),
(164, 16, 22, '0'),
(165, 17, 22, '80'),
(166, 18, 22, '1'),
(167, 19, 22, '0'),
(168, 20, 22, '0'),
(169, 11, 23, '1'),
(170, 12, 23, '0'),
(171, 15, 23, '3'),
(172, 16, 23, '0'),
(173, 17, 23, '80'),
(174, 18, 23, '1'),
(175, 19, 23, '0'),
(176, 20, 23, '0'),
(185, 11, 25, '1'),
(186, 12, 25, '0'),
(187, 15, 25, '3'),
(188, 16, 25, '0'),
(189, 17, 25, '80'),
(190, 18, 25, '1'),
(191, 19, 25, '0'),
(192, 20, 25, '0'),
(193, 11, 25, '0'),
(194, 12, 25, '0'),
(195, 15, 25, '3'),
(196, 16, 25, '0'),
(197, 17, 25, '80'),
(198, 18, 25, '1'),
(199, 19, 25, '0'),
(200, 20, 25, '0'),
(201, 11, 25, '0'),
(202, 12, 25, '0'),
(203, 15, 25, '3'),
(204, 16, 25, '0'),
(205, 17, 25, '80'),
(206, 18, 25, '1'),
(207, 19, 25, '0'),
(208, 20, 25, '0'),
(217, 11, 24, '1'),
(218, 12, 24, '0'),
(219, 15, 24, '3'),
(220, 16, 24, '0'),
(221, 17, 24, '80'),
(222, 18, 24, '1'),
(223, 19, 24, '0'),
(224, 20, 24, '0');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) NOT NULL,
  `data` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('2u2rt60njip6665drqigo2erptfmstfb', '::1', 1518650204, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383635303230343b),
('6nae0ts8ok8ehir6j6stafippbjec7ao', '::1', 1518653427, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383635333432373b),
('bpkg2kiktotpdl0jn9op03fh7lopjds6', '::1', 1518714980, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383731343937393b),
('clqgifiecm7llo4hfnsjqq6d0je2q3sp', '::1', 1518714979, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383731343937393b),
('dfq2u46q0viede44rprs4ih1m9oi3fu2', '::1', 1518652568, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383635323536383b),
('i70roj8dhko1n0sb01sbllir1jgas3gn', '::1', 1518652195, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383635323139353b),
('k465ej1bknhi7t45lgvm99al2dqm18ta', '::1', 1518653938, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383635333733313b),
('l47fe4ock7934t67roejfnb9dq16ein2', '::1', 1518651794, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383635313739343b),
('qs9rmg7cdevum7rhgsj7nilk503k0iu8', '::1', 1518650518, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383635303531383b),
('rs1s14cksqin1pfr0efuegceumh0dh3u', '::1', 1518713876, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383731333837363b),
('tbgleinabqh13a2otaob82rckijc2uu6', '::1', 1518713064, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383731333036343b),
('vigii4916m78m13bh3d0l8r3f1fdggc4', '::1', 1518653731, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383635333733313b);

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

DROP TABLE IF EXISTS `evaluation`;
CREATE TABLE IF NOT EXISTS `evaluation` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `team_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `evaluation-user_id` (`user_id`),
  KEY `evaluation-team_id` (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`id`, `user_id`, `team_id`, `created_at`, `updated_at`) VALUES
(2, 4, 1, '2018-02-14 21:17:09', NULL),
(3, 4, 1, '2018-02-14 21:18:24', NULL),
(4, 4, 1, '2018-02-14 21:19:13', NULL),
(5, 4, 1, '2018-02-14 21:20:33', NULL),
(6, 4, 1, '2018-02-14 21:20:48', NULL),
(7, 4, 1, '2018-02-14 21:21:06', NULL),
(8, 4, 1, '2018-02-14 21:21:26', NULL),
(9, 4, 1, '2018-02-14 21:21:58', NULL),
(10, 4, 1, '2018-02-14 21:22:19', NULL),
(11, 4, 1, '2018-02-14 21:22:40', NULL),
(12, 4, 1, '2018-02-14 21:23:11', NULL),
(13, 4, 1, '2018-02-14 21:26:26', NULL),
(14, 4, 1, '2018-02-14 21:51:54', NULL),
(15, 4, 1, '2018-02-14 22:13:27', NULL),
(16, 4, 1, '2018-02-14 22:14:31', NULL),
(17, 4, 1, '2018-02-14 22:15:01', NULL),
(18, 4, 1, '2018-02-14 22:15:31', NULL),
(19, 4, 1, '2018-02-14 22:16:08', NULL),
(20, 4, 1, '2018-02-14 22:16:35', NULL),
(21, 4, 1, '2018-02-14 22:16:46', NULL),
(22, 4, 1, '2018-02-14 22:17:28', NULL),
(23, 4, 1, '2018-02-14 22:18:06', NULL),
(24, 4, 1, '2018-02-14 22:18:14', '2018-02-15 16:47:19'),
(25, 4, 1, '2018-02-14 22:18:57', '2018-02-15 16:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `period`
--

DROP TABLE IF EXISTS `period`;
CREATE TABLE IF NOT EXISTS `period` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `position` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `period`
--

INSERT INTO `period` (`id`, `name`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Auto', '1', '2018-02-10 14:35:50', NULL),
(2, 'Teleop', '2', '2018-02-10 14:35:50', NULL),
(3, 'Climb', '3', '2018-02-10 14:35:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `period_id` int(10) UNSIGNED NOT NULL,
  `description` varchar(200) NOT NULL,
  `question_type_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `question-period_id` (`period_id`),
  KEY `question-question_type_id` (`question_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `period_id`, `description`, `question_type_id`, `created_at`, `updated_at`) VALUES
(11, 1, 'Crossed the auto line?', 1, '2018-02-14 17:02:41', NULL),
(12, 1, 'Put a cube on the switch on the auto period?', 1, '2018-02-14 17:02:41', NULL),
(13, 1, 'Put a cube on the scale on the auto period?', 1, '2018-02-14 17:02:41', NULL),
(14, 1, 'Some different strategy on auto period?', 5, '2018-02-14 17:02:41', NULL),
(15, 2, 'How many cubs put on switch on teleop?', 2, '2018-02-14 17:02:41', NULL),
(16, 2, 'How many cubes put on scale on teleop?', 2, '2018-02-14 17:02:41', NULL),
(17, 2, 'How good is it\'s dirigibility?', 3, '2018-02-14 17:02:41', NULL),
(18, 2, 'How many cubes put on exchange?', 2, '2018-02-14 17:02:41', NULL),
(19, 2, 'Climbed without levitate?', 1, '2018-02-14 17:02:41', NULL),
(20, 2, 'Helped others climbing', 1, '2018-02-14 17:02:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question_type`
--

DROP TABLE IF EXISTS `question_type`;
CREATE TABLE IF NOT EXISTS `question_type` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_type`
--

INSERT INTO `question_type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Boolean', '2018-02-14 16:28:40', NULL),
(2, 'Positive Integer', '2018-02-14 16:28:40', NULL),
(3, 'Percent', '2018-02-14 16:28:40', NULL),
(4, 'Phrase', '2018-02-14 16:28:40', NULL),
(5, 'Text', '2018-02-14 16:28:40', NULL),
(6, 'Seconds', '2018-02-14 16:28:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `number` int(11) NOT NULL,
  `enabled` tinyint(4) NOT NULL DEFAULT '0',
  `verification_date` datetime DEFAULT NULL,
  `verification_picture` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `number`, `enabled`, `verification_date`, `verification_picture`, `created_at`, `updated_at`) VALUES
(1, 'Roosters', 7033, 1, '2018-02-10 00:00:00', NULL, '2018-02-10 09:53:51', NULL),
(2, 'Strike', 6902, 0, NULL, NULL, '2018-02-15 17:08:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

DROP TABLE IF EXISTS `token`;
CREATE TABLE IF NOT EXISTS `token` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `value` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `token-user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `user_id`, `value`, `created_at`) VALUES
(11, 4, 'a309fe8484e5e6e2799040d9a76742f8548ea8387076a2f1bbc4baaf761b859cb3fcf7495506f739fce7e3877f607b92b6c812f2ebab98b71b7e3ba04ac1d467FKYuz6AfeGdcZpgdUiJdVW2Y5Fe5mMO7HKRU/Qhq4ruwm/2gl0p9CEgPNoW61sJnYlek9cDbLUBgUzs3ZDv/WQ==', '2018-02-10 11:46:36'),
(12, 4, 'c1946a3dbbe84c25de5660abbeb3b72ed7f8ddc5c71dcad8a51ccc3fbfcd424f58cf67624e68a3245ef79d543df573c7e18892185ef813392d7ad173e49f38dbSZhHhe9czFKmUIBlqRBYHBZRotQH0ZVNVDASpYNojr4btdzrPcYrnOd+EubCquTtrr+R9qFxy+8TS6hClJ3FZw==', '2018-02-10 14:13:53'),
(13, 4, 'beb1ae628294bfb9bfb483851d9ee164185ed4a571db9e6918ad98991cf9594c566ba3532fdd642506d48292e547fc84fb92be8cae690f1b58f5201f9666fb13J9A71GbfTXTfg1rcKpfEKBprTWXkDaJkBWVB46lQu03xn9jd2iawYhz7fgHnrr/j5sdHgQ+H9RnGXU1NYWfymA==', '2018-02-10 14:26:49'),
(14, 4, '014177487fdb5a5bb8a9fc894a6fed59f38fd3cf7a5d95247340a6f9dba684a58f53465801998d8c4db7e6044ef5363578ce231b1bef04714fa4920e5b5055aeUJjSNwFqyZZpMFAwVCTxmhZdWBFBAXiM/O0dg9hZ8KMh0EzAgLYRGac9AkiKKtyar1BgsDUJRgKyDIdveZ3ITA==', '2018-02-14 14:36:39'),
(15, 4, '5deaf18993fa4ebaee8c477b3ea12267565a1bd805c16ed04b8d23b96c2f56d1a10f5d0672f244b8a28ff90817e7fef8f0407928422f69b3bf5cfd2622d7c87dIJY6047INSJofyYTNW4WErEZ8HicCMralo3nMRtjlcPuIb0jaCeuvRImpgLyewVvrRDfwGYUsdAGQ+bfktJyWA==', '2018-02-15 14:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `recovery_token` text,
  `recovery_date` datetime DEFAULT NULL,
  `verified_email` tinyint(4) NOT NULL DEFAULT '0',
  `enabled` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_sys_admin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user-email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `recovery_token`, `recovery_date`, `verified_email`, `enabled`, `created_at`, `updated_at`, `is_sys_admin`) VALUES
(4, 'Ayrton Fidelis', 'ayrton.vargas33@gmail.com', '$2y$10$HnjXw/RFKGb.tQ67JGRJl.01/owRDKi7cdMEA7rh3YOU4hcR6ZVZi', NULL, NULL, 0, 1, '2018-02-09 21:22:48', '2018-02-10 14:27:32', 0),
(5, 'John Doe', 'john.doe@gmail.com', '$2y$10$cprU0mj/gEJQt3247ZOiM.xbig/RsbIhUCRn0Pvva2qmJcIgn4/h.', NULL, NULL, 0, 1, '2018-02-10 09:53:07', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_team`
--

DROP TABLE IF EXISTS `user_has_team`;
CREATE TABLE IF NOT EXISTS `user_has_team` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `team_id` int(10) UNSIGNED NOT NULL,
  `is_verified` tinyint(4) NOT NULL DEFAULT '0',
  `is_admin` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_has_team-user_id` (`user_id`),
  KEY `user_has_team-team_id` (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_has_team`
--

INSERT INTO `user_has_team` (`id`, `user_id`, `team_id`, `is_verified`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 1, 1, '2018-02-10 09:54:15', NULL),
(2, 5, 1, 1, 0, '2018-02-10 09:54:31', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer-evaluation_id` FOREIGN KEY (`evaluation_id`) REFERENCES `evaluation` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `answer-question_id` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `evaluation-team_id` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `evaluation-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question-period_id` FOREIGN KEY (`period_id`) REFERENCES `period` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `question-question_type_id` FOREIGN KEY (`question_type_id`) REFERENCES `question_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `token-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_has_team`
--
ALTER TABLE `user_has_team`
  ADD CONSTRAINT `user_has_team-team_id` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_has_team-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
