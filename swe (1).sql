-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 02, 2016 at 11:40 PM
-- Server version: 5.5.52-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swe`
--

-- --------------------------------------------------------

--
-- Table structure for table `domain`
--

CREATE TABLE `domain` (
  `id` int(50) NOT NULL,
  `d_pass` varchar(50) NOT NULL,
  `d_name` varchar(50) NOT NULL,
  `d_id` int(10) NOT NULL,
  `d_email` varchar(50) NOT NULL,
  `d_mob` varchar(20) NOT NULL,
  `d_address` varchar(100) NOT NULL,
  `d_descr` varchar(250) NOT NULL,
  `d_veri` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domain`
--

INSERT INTO `domain` (`id`, `d_pass`, `d_name`, `d_id`, `d_email`, `d_mob`, `d_address`, `d_descr`, `d_veri`) VALUES
(5, 'qqq', 'LNMIIT', 639333358, 'bansalpunit96@gmail.com', '+91 8764162151', 'A-174 Jawahar Nagar Bharatpur , Rajasthan', 'THE LNM Institute of Information Technology , Jaipur', 90269770),
(6, 'q', 'q', 1725125706, 'bansalpunitib@gmail.com', '+918764162151', 'A-174 Jawahar Nagar Bharatpur', 'q', 1182676693),
(10, 'mnkupiddu', 'w', 5, 'root', 'w', 'ww', 'w', 1872118951);

-- --------------------------------------------------------

--
-- Table structure for table `domain_register`
--

CREATE TABLE `domain_register` (
  `domain_name` varchar(50) NOT NULL,
  `domain_email` varchar(50) NOT NULL,
  `domain_mob` varchar(50) NOT NULL,
  `id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domain_register`
--

INSERT INTO `domain_register` (`domain_name`, `domain_email`, `domain_mob`, `id`) VALUES
('Pushpendra Bansal', 'bansalpunitib@gmail.com', '', 1),
('Pushpendra Bansal', 'bansalpunitib@gmail.com', '', 2),
('Pushpendra Bansal', 'bansalpunitib@gmail.com', '', 3),
('Pushpendra Bansal', 'bansalpunitib@gmail.com', '+918764162151', 4),
('Pooja Agrawal', 'poojaagarwal075@gmail.com', '09461067653', 5),
('Pushpendra Bansal', 'bansalpunitib@gmail.com', '+918764162151', 6),
('Pushpendra Bansal', 'bansalpunitib@gmail.com', '+918764162151', 7),
('Pushpendra Bansal', 'bansalpunitib@gmail.com', '+918764162151', 8),
('Pushpendra Bansal', 'bansalpunitib@gmail.com', '+918764162151', 9),
('Pushpendra Bansal', 'bansalpunitib@gmail.com', '+918764162151', 10),
('Pushpendra Bansal', 'bansalpunitib@gmail.com', '+918764162151', 11);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) NOT NULL,
  `group_id` varchar(60) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_id`, `user_email`, `position`) VALUES
(2, '77', 'sanyamjain838@gmail.com', 'member'),
(12, '77', 'bansalpunitib@gmail.com', 'member'),
(14, '77', 'babas@q', 'member'),
(15, '77', 'sanyamjain838@gmail.com', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `group_title`
--

CREATE TABLE `group_title` (
  `group_name` varchar(50) NOT NULL,
  `group_leader` varchar(50) NOT NULL,
  `group_domain` varchar(50) NOT NULL,
  `id` int(50) NOT NULL,
  `group_desc` varchar(500) NOT NULL,
  `group_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_title`
--

INSERT INTO `group_title` (`group_name`, `group_leader`, `group_domain`, `id`, `group_desc`, `group_id`) VALUES
('q', '', 'q', 6, 'qq', 55),
('q', '', 'q', 7, 'qq', 66),
('group1 ', '', 'q', 11, 'q', 75),
('q', 'sanyamjain838@gmail.com', '639333358', 14, 'q', 77);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `domain` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `password`, `position`, `domain`, `email`, `mobile`) VALUES
(1, 'qqq', 'admin', '639333358', 'bansalpunit96@gmail.com', '7062761235'),
(3, 'qq', 'member', '639333358', 'sanyamjain838@gmail.com', '8764162151'),
(4, 'q', 'member', '639333358', 'babas@q', '0');

-- --------------------------------------------------------

--
-- Table structure for table `messaging`
--

CREATE TABLE `messaging` (
  `ctrl_no` int(255) NOT NULL,
  `date_send` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `to_receiver` varchar(50) NOT NULL,
  `from_sender` varchar(50) NOT NULL,
  `opened` tinyint(1) NOT NULL DEFAULT '0',
  `mail_subject` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messaging`
--

INSERT INTO `messaging` (`ctrl_no`, `date_send`, `to_receiver`, `from_sender`, `opened`, `mail_subject`, `message`) VALUES
(277, '2016-10-31 11:09:17', 'sa', 'bansalpunit96@gmail.com', 0, '', ''),
(278, '2016-10-31 11:09:26', 'sa', 'bansalpunit96@gmail.com', 0, '', ''),
(275, '2016-10-31 11:07:10', '', 'bansalpunit96@gmail.com', 0, '', ''),
(276, '2016-10-31 11:07:26', 'sa', 'bansalpunit96@gmail.com', 0, '', ''),
(273, '2016-10-31 11:06:40', 'bansalpunit96@gmail.com', 'bansalpunit96@gmail.com', 0, '', ''),
(271, '2016-10-31 11:06:14', 'bansalpunit96@gmail.com', 'bansalpunit96@gmail.com', 0, '', ''),
(272, '2016-10-31 11:06:28', '', 'bansalpunit96@gmail.com', 0, '', ''),
(269, '2016-10-31 11:05:48', '', 'bansalpunit96@gmail.com', 0, '', ''),
(270, '2016-10-31 11:06:11', '', 'bansalpunit96@gmail.com', 0, '', ''),
(267, '2016-10-31 11:05:11', '', 'bansalpunit96@gmail.com', 0, '', ''),
(268, '2016-10-31 11:05:22', '', 'bansalpunit96@gmail.com', 0, '', ''),
(265, '2016-10-31 11:04:53', 'sa', 'bansalpunit96@gmail.com', 0, '', ''),
(266, '2016-10-31 11:05:02', '', 'bansalpunit96@gmail.com', 0, '', ''),
(264, '2016-10-31 11:04:06', 'sa', 'bansalpunit96@gmail.com', 0, '', ''),
(279, '2016-10-31 11:09:47', 'sa', 'bansalpunit96@gmail.com', 0, '', ''),
(280, '2016-10-31 11:09:56', 'sa', 'bansalpunit96@gmail.com', 0, '', ''),
(281, '2016-10-31 11:10:19', 'sa', 'bansalpunit96@gmail.com', 0, '', ''),
(282, '2016-10-31 11:10:20', '', 'bansalpunit96@gmail.com', 0, '', ''),
(283, '2016-10-31 11:10:21', '', 'bansalpunit96@gmail.com', 0, '', ''),
(284, '2016-10-31 11:10:21', 'sanyamjain838@gmail.com', 'bansalpunit96@gmail.com', 1, 'Hello', 'hello i am pushpendra bansal currently i am in 3rd year'),
(287, '2016-10-31 11:28:27', 'bansalpunit96@gmail.com', 'bansalpunit96@gmail.com', 0, '', ''),
(286, '2016-10-31 11:16:24', 'bansalpunit96@gmail.com', 'bansalpunit96@gmail.com', 1, 'hello', 'hello i am pushpendra bansal currently i am in 3rd year'),
(289, '2016-10-31 13:25:39', '', 'sanyamjain838@gmail.com', 0, '', ''),
(290, '2016-10-31 13:26:22', '', 'sanyamjain838@gmail.com', 0, '', ''),
(291, '2016-10-31 13:27:21', '', 'sanyamjain838@gmail.com', 0, '', ''),
(292, '2016-10-31 13:27:54', '', 'sanyamjain838@gmail.com', 0, '', ''),
(294, '2016-10-31 15:02:11', 'bansalpunit96@gmail.com', 'sanyamjain838@gmail.com', 0, 'adas', 'dasd'),
(293, '2016-10-31 14:39:12', 'bansalpunit96@gmail.com', 'sanyamjain838@gmail.com', 0, 'sadas', 'dasda'),
(295, '2016-10-31 15:02:37', 'bansalpunit96@gmail.com', 'sanyamjain838@gmail.com', 0, 'punit basnal', 'lnmiit'),
(296, '2016-11-01 06:26:43', 'bansalpunit96@gmail.com', 'sanyamjain838@gmail.com', 0, 'hello', 'this is regarding the ');

-- --------------------------------------------------------

--
-- Table structure for table `sent_items`
--

CREATE TABLE `sent_items` (
  `ctrl_no` int(255) NOT NULL,
  `date_send` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `to_receiver` varchar(50) NOT NULL,
  `from_sender` varchar(50) NOT NULL,
  `opened` tinyint(1) NOT NULL DEFAULT '0',
  `mail_subject` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sent_items`
--

INSERT INTO `sent_items` (`ctrl_no`, `date_send`, `to_receiver`, `from_sender`, `opened`, `mail_subject`, `message`) VALUES
(59, '2009-10-15 14:56:20', 'boyit', 'reintje', 0, ' notification', 'Your leader give you task. Go to TASK to know your task.'),
(58, '2009-10-15 14:56:19', 'amoy', 'reintje', 0, ' notification', 'Your leader give you task. Go to TASK to know your task.'),
(56, '2009-10-15 14:43:44', 'philip', 'alex', 0, ' notification', 'Administrator assigned you to be a leader. Go to TASK to know your task.'),
(57, '2009-10-15 14:43:45', 'brian', 'alex', 0, ' notification', 'Administrator assigned you to be a leader. Go to TASK to know your task.'),
(54, '2009-10-15 14:43:43', 'lyndon', 'alex', 0, ' notification', 'Administrator assigned you to be a leader. Go to TASK to know your task.'),
(55, '2009-10-15 14:43:44', 'reintje', 'alex', 0, ' notification', 'Administrator assigned you to be a leader. Go to TASK to know your task.'),
(60, '2009-10-15 14:57:41', 'bryan', 'philip', 1, ' notification', 'Your leader give you task. Go to TASK to know your task.'),
(61, '2016-10-20 19:20:16', 'rfe', 'bansalpunit96@gmail.com', 1, '', ''),
(62, '2016-10-30 18:14:31', 'philip', 'admin', 1, '', 'hhhhhhhhhh'),
(63, '2016-10-31 09:38:54', 'admin', 'philip', 0, '', ''),
(64, '2016-10-31 09:39:10', 'admin', 'philip', 0, '', ''),
(73, '2016-10-31 15:02:37', 'bansalpunit96@gmail.com', 'sanyamjain838@gmail.com', 0, 'punit basnal', 'lnmiit'),
(66, '2016-10-31 11:36:55', '', 'bansalpunit96@gmail.com', 1, '', 'Your leader give you task. Go to TASK to know your task.'),
(72, '2016-10-31 15:02:11', 'bansalpunit96@gmail.com', 'sanyamjain838@gmail.com', 0, 'adas', 'dasd'),
(71, '2016-10-31 14:39:12', 'bansalpunit96@gmail.com', 'sanyamjain838@gmail.com', 1, 'sadas', 'dasda'),
(74, '2016-11-01 06:26:43', 'bansalpunit96@gmail.com', 'sanyamjain838@gmail.com', 1, 'hello', 'this is regarding the ');

-- --------------------------------------------------------

--
-- Table structure for table `user_register`
--

CREATE TABLE `user_register` (
  `id` int(10) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_mob` varchar(15) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_pass` varchar(30) NOT NULL,
  `verification_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_register`
--

INSERT INTO `user_register` (`id`, `user_name`, `user_mob`, `user_email`, `user_pass`, `verification_code`) VALUES
(1, 'q', 'q', 'q', 'q', '50050954'),
(4, 'w', 'w', 'w', 'w', '418822471'),
(10, 'r', 'r', 'r', 'r', '1441003588'),
(11, 'qq', 'qq', 'qq', 'q', '2062525831'),
(13, 'q', 'ww', 'ww', 'qq', '2085809914'),
(21, 'q', 'qqq', 'bansalpunitib@gmail.com', 'q', '891454037'),
(23, 'e', 'e', 'poojaagarwal075@gmail.com', 'e', '921311779'),
(27, 'a', 'a', 'bansalpunit96@gmail.com', 'a', '1946180388'),
(31, 'a', 'aa', 'bansalpitib@gmail.com', 'a', '9460'),
(32, 'kshitiz gupta', '9602787369', 'kshitiz7gupta@gmail.com', 'gupta', '5523'),
(33, 'sanyam', '9468823021', 'sanyamjain838@gmail.com', 'sanyam', '533');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `domain`
--
ALTER TABLE `domain`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `d_email` (`d_email`);

--
-- Indexes for table `domain_register`
--
ALTER TABLE `domain_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_title`
--
ALTER TABLE `group_title`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_id` (`id`),
  ADD UNIQUE KEY `group_id_2` (`group_id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messaging`
--
ALTER TABLE `messaging`
  ADD PRIMARY KEY (`ctrl_no`);

--
-- Indexes for table `sent_items`
--
ALTER TABLE `sent_items`
  ADD PRIMARY KEY (`ctrl_no`);

--
-- Indexes for table `user_register`
--
ALTER TABLE `user_register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_mob` (`user_mob`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `domain`
--
ALTER TABLE `domain`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `domain_register`
--
ALTER TABLE `domain_register`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `group_title`
--
ALTER TABLE `group_title`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `messaging`
--
ALTER TABLE `messaging`
  MODIFY `ctrl_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;
--
-- AUTO_INCREMENT for table `sent_items`
--
ALTER TABLE `sent_items`
  MODIFY `ctrl_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `user_register`
--
ALTER TABLE `user_register`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
