-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2017 at 04:51 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tidalso1_stlukes`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions_needed`
--

CREATE TABLE `actions_needed` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date_created` datetime NOT NULL,
  `physician_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actions_needed`
--

INSERT INTO `actions_needed` (`id`, `content`, `date_created`, `physician_id`, `patient_id`, `active`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lectus ligula, egestas et dapibus in, dictum nec diam. In fringilla nulla vitae dui volutpat feugiat ac id orci. Ut id scelerisque sapien.', '2017-03-15 00:00:00', 1, 2, 1),
(2, 'For incision and drainage of Perichondritis with Auriculoplasty\r\n', '2017-02-16 00:00:00', 1, 1, 1),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lectus ligula, egestas et dapibus in, dictum nec diam. In fringilla nulla vitae dui volutpat feugiat ac id orci. Ut id scelerisque sapien. Cras est lacus, tempor non lectus eget, faucibus faucibus leo. Morbi ac gravida nibh. Vivamus non velit at eros tristique vulputate rhoncus eu ipsum. Donec feugiat sagittis quam et tempus. Morbi elit erat, egestas quis suscipit eu, dapibus id nibh. Morbi at dapibus sapien. Donec finibus ultricies elit faucibus cursus. Vestibulum malesuada convallis velit ac vehicula. Cras aliquam nulla id feugiat malesuada.', '2017-01-24 00:00:00', 2, 1, 1),
(4, 'asdasdasd', '0000-00-00 00:00:00', 2, 1, 1),
(5, 'asdasdasd', '0000-00-00 00:00:00', 2, 1, 1),
(6, 'asdasdasd', '0000-00-00 00:00:00', 2, 1, 1),
(7, 'asdasdasd', '2017-06-14 23:43:42', 2, 1, 1),
(8, 'asdasdasd', '2017-06-14 23:43:56', 2, 1, 1),
(9, 'asdasdasd', '2017-06-14 23:44:08', 2, 1, 1),
(10, 'asdasdasd', '2017-06-14 23:44:43', 2, 1, 1),
(11, 'add test', '2017-06-15 00:37:23', 1, 1, 1),
(12, 'ty', '2017-06-15 00:38:45', 1, 1, 1),
(13, '1', '2017-06-15 01:24:51', 0, 1, 1),
(14, '1', '2017-06-15 01:26:50', 0, 1, 1),
(15, '1', '2017-06-15 01:29:14', 0, 1, 1),
(16, '1', '2017-06-15 01:30:43', 0, 1, 1),
(17, '1', '2017-06-15 01:32:44', 0, 1, 1),
(18, 'test', '2017-06-15 01:32:59', 1, 1, 1),
(19, 'testerrr', '2017-06-15 01:33:20', 1, 1, 1),
(20, 'testing 123', '2017-06-15 01:38:14', 1, 1, 1),
(21, 'tester123', '2017-06-15 01:42:17', 1, 1, 1),
(22, 'testttt', '2017-06-15 01:43:59', 1, 2, 1),
(23, 'tyezch', '2017-06-15 07:45:31', 1, 1, 1),
(24, 'yoyo', '2017-06-15 07:48:31', 3, 1, 1),
(25, 'toto', '2017-06-15 07:48:48', 3, 2, 1),
(26, 'jajaja jajajja jajajjaa jajajaj jajajaj jajaja jajajja jajajjaa jajajaj jajajaj jajaja jajajja jajajjaa jajajaj jajajaj jajaja jajajja jajajjaa jajajaj jajaja jajajja jajajjaa jajajaj jajajaj  jajaja jajajja jajajjaa jajajaj jajajaj jajaja jajajja jajajjaa jajajaj jajajaj', '2017-06-19 07:57:41', 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `adref`
--

CREATE TABLE `adref` (
  `id` int(11) NOT NULL,
  `value` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adref`
--

INSERT INTO `adref` (`id`, `value`) VALUES
(0, ''),
(1, '@'),
(2, '®');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `announcement` text NOT NULL,
  `date_added` datetime NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `announcement`, `date_added`, `active`) VALUES
(1, 'Title', 'Grand Rounds 8/24/16 Dr Fuentes\r\nCoverage Max15115\r\nPost Grad course 8/30/16\r\n\r\nDoctors on Leave\r\nDr. Anthony Alvarez \r\nDr. Sherwin Mendoza\r\n\r\nER Consultant on Deck\r\nDr. Mariano (Aug 26 – Sep 1, 2017)', '2017-06-06 00:00:00', 1),
(2, 'test', 'test', '2017-07-06 16:39:23', 0),
(3, 'test', 'test', '2017-07-06 16:40:25', 0),
(4, 'test', 'test', '2017-07-06 16:56:24', 0),
(5, '', 'Test4', '2017-08-10 02:11:01', 1),
(6, '', 'test', '2017-08-10 02:12:40', 1),
(7, '', 'Grand Rounds 8/24/16 Dr Fuentes\r\nCoverage Max\r\nPost Grad course 8/30/16\r\n\r\nDoctors on Leave\r\nDr. Anthony Alvarez \r\nDr. Sherwin Mendoza\r\n\r\nER Consultant on Deck\r\nDr. Mariano (Aug 26 – Sep 1, 2017)', '2017-08-10 02:28:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date_created` datetime NOT NULL,
  `physician_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`id`, `content`, `date_created`, `physician_id`, `patient_id`, `active`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lectus ligula, egestas et dapibus in, dictum nec diam. In fringilla nulla vitae dui volutpat feugiat ac id orci. Ut id scelerisque sapien.', '2017-06-13 00:00:00', 1, 10, 1),
(2, 'For incision and drainage of Perichondritis with Auriculoplasty', '2017-03-08 00:00:00', 1, 2, 1),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lectus ligula, egestas et dapibus in, dictum nec diam. In fringilla nulla vitae dui volutpat feugiat ac id orci. Ut id scelerisque sapien. Cras est lacus, tempor non lectus eget, faucibus faucibus leo. Morbi ac gravida nibh. Vivamus non velit at eros tristique vulputate rhoncus eu ipsum. Donec feugiat sagittis quam et tempus. Morbi elit erat, egestas quis suscipit eu, dapibus id nibh. Morbi at dapibus sapien. Donec finibus ultricies elit faucibus cursus. Vestibulum malesuada convallis velit ac vehicula. Cras aliquam nulla id feugiat malesuada.', '2017-06-14 00:00:00', 2, 1, 1),
(4, 'asdasdasd', '2017-06-15 08:03:34', 2, 1, 1),
(5, 'diag', '2017-06-15 08:09:19', 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mac_addresses`
--

CREATE TABLE `mac_addresses` (
  `id` int(11) NOT NULL,
  `mac_address` varchar(16) NOT NULL,
  `physician_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date_created` datetime NOT NULL,
  `physician_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `content`, `date_created`, `physician_id`, `patient_id`, `active`) VALUES
(1, 'Don''t go more than 2 hours without a glass of water.', '2017-05-04 00:00:00', 1, 1, 0),
(2, 'For incision and drainage of Perichondritis with Auriculoplasty\n', '2017-05-09 00:00:00', 1, 2, 1),
(3, 'Don''t take pain meds for more than 3 or 4 days.', '2017-06-14 00:00:00', 2, 1, 0),
(4, 'asdasdasd', '2017-06-15 08:03:13', 2, 1, 0),
(5, 'note', '2017-06-15 08:09:28', 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `lastname` text NOT NULL,
  `age` smallint(6) NOT NULL,
  `gender` tinyint(4) NOT NULL DEFAULT '1',
  `room` varchar(20) NOT NULL,
  `image` text NOT NULL,
  `date_admitted` datetime NOT NULL,
  `date_released` datetime NOT NULL,
  `change_dressing` tinyint(4) NOT NULL,
  `priority` tinyint(4) NOT NULL,
  `post_op` tinyint(4) NOT NULL,
  `trach_care` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1=admission, 2=referral, 3=surgical, 4=in_patient, 5=discharge, 6=emergency, 7=mortalities, 8=sign_out, 9=fall, 10=medication_error, 11=morbidities, 12=sentinel_events',
  `active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `firstname`, `middlename`, `lastname`, `age`, `gender`, `room`, `image`, `date_admitted`, `date_released`, `change_dressing`, `priority`, `post_op`, `trach_care`, `status`, `active`) VALUES
(1, 't', 't', 't', 0, 0, 't', 'patient2.jpg', '2017-05-01 00:00:00', '2017-05-31 00:00:00', 0, 0, 1, 1, 9, 1),
(2, 'Philip', 'Jones', 'Velasco', 23, 2, '301', 'patient2.jpg', '2017-05-01 00:00:00', '2017-05-31 00:00:00', 0, 1, 0, 1, 9, 1),
(3, 'Jeffrey', '', 'Cabrera', 44, 1, '321', '', '2017-07-02 18:51:43', '0000-00-00 00:00:00', 0, 0, 0, 0, 9, 1),
(4, 'test', 'test', 'testt', 1, 1, 'test', '', '2017-07-06 16:53:55', '0000-00-00 00:00:00', 0, 0, 0, 0, 4, 1),
(5, 'firstname', 'middlename', 'lastname', 0, 0, 'room', '', '2017-07-07 08:07:56', '0000-00-00 00:00:00', 0, 0, 0, 0, 7, 1),
(6, 'firstname', 'middlename', 'lastname', 0, 1, 'room', '', '2017-07-07 08:42:35', '0000-00-00 00:00:00', 0, 0, 0, 0, 5, 1),
(7, 'tfirstname', 'tlastname', 'troom', 0, 0, 'tage', '', '2017-07-29 14:50:21', '0000-00-00 00:00:00', 0, 0, 0, 0, 5, 1),
(8, 'tfirstname', 'tlastname', 'troom', 0, 0, 'tage', '', '2017-07-29 14:51:43', '0000-00-00 00:00:00', 0, 0, 0, 0, 7, 1),
(9, 'tfirstname', 'tlastname', 'troom', 0, 0, 'tage', '', '2017-07-29 14:52:11', '0000-00-00 00:00:00', 0, 0, 0, 0, 8, 1),
(10, 'asd', 'asd', 'asd', 15, 1, 'asd', '', '2017-08-06 22:36:10', '0000-00-00 00:00:00', 0, 0, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `patients_physicians`
--

CREATE TABLE `patients_physicians` (
  `id` int(11) NOT NULL,
  `physician_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `engage` smallint(6) NOT NULL DEFAULT '1',
  `date_added` datetime NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients_physicians`
--

INSERT INTO `patients_physicians` (`id`, `physician_id`, `patient_id`, `engage`, `date_added`, `active`) VALUES
(1, 1, 10, 2, '0000-00-00 00:00:00', 1),
(2, 2, 10, 3, '0000-00-00 00:00:00', 1),
(3, 1, 2, 2, '0000-00-00 00:00:00', 0),
(4, 2, 2, 1, '0000-00-00 00:00:00', 1),
(5, 1, 1, 0, '2017-08-10 07:34:01', 0),
(6, 1, 1, 0, '2017-08-10 07:36:00', 0),
(7, 1, 2, 0, '2017-08-10 07:36:01', 0),
(8, 1, 2, 0, '2017-08-10 07:38:01', 0),
(9, 1, 7, 0, '2017-08-10 07:38:07', 0),
(10, 1, 1, 0, '2017-08-10 07:39:34', 0),
(11, 2, 1, 0, '2017-08-10 07:39:36', 0),
(12, 7, 10, 1, '2017-08-10 07:44:25', 1),
(13, 5, 1, 0, '2017-08-10 07:44:26', 1),
(14, 2, 1, 1, '2017-08-10 07:44:43', 1),
(15, 1, 1, 0, '2017-08-10 07:49:25', 0),
(16, 1, 1, 0, '2017-08-10 07:49:42', 0),
(17, 4, 1, 2, '2017-08-10 08:07:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `physicians`
--

CREATE TABLE `physicians` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `lastname` text NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `password` text NOT NULL,
  `mac_address` varchar(20) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `role` tinyint(4) NOT NULL COMMENT '1 = consultant; 2 = resident',
  `on_duty` tinyint(4) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `physicians`
--

INSERT INTO `physicians` (`id`, `firstname`, `middlename`, `lastname`, `gender`, `email`, `image`, `password`, `mac_address`, `mobile`, `role`, `on_duty`, `date_added`, `last_login`, `active`) VALUES
(1, 'Eunice12', 'middlename2', 'Philips2', 1, 'Philips@mail.com2', 'me2.jpg', '5f4dcc3b5aa765d61d8327deb882cf99', 'dc:0b:34:87:a1:vv', '094282002111', 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 'Olivia Claire', '', 'Hu', 1, 'oliviaclaire.hu@gmail.com', 'olivia.jpg', '5f4dcc3b5aa765d61d8327deb882cf99', 'D8:C4:6A:A9:5F:AF', '09XXXXXXXXX', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 'Anonymous', '', 'Anonymous', 1, '', 'me2.jpg', '', '', '', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(4, 'Harold', '', 'Martinez', 1, '', '', '', '', '9175715491', 2, 1, '2017-07-17 12:41:41', '0000-00-00 00:00:00', 1),
(5, 'Fname', 'Midname', 'lname', 1, '', '', '', '13:13:13:13:13', '', 1, 0, '2017-07-17 13:09:00', '0000-00-00 00:00:00', 1),
(6, 'name', 'name', 'name', 1, 'mail@mail2.com', '', '', '33:33:33:33:33', '', 2, 0, '2017-07-17 13:13:03', '0000-00-00 00:00:00', 0),
(7, 'asd', 'asd', 'asd', 1, 'asd@asdasd', '', '5f4dcc3b5aa765d61d8327deb882cf99', '13:13:13:13:13', '', 2, 0, '2017-07-17 13:19:43', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `status_name` text NOT NULL,
  `table_id` int(11) NOT NULL,
  `table_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `status_id`, `status_name`, `table_id`, `table_name`) VALUES
(1, 1, 'Admission', 1, 'In-Patient'),
(2, 2, 'Referral', 1, 'In-Patient'),
(3, 3, 'Surgical', 1, 'In-Patient'),
(4, 4, 'In-Patient', 1, 'In-Patient'),
(5, 5, 'Discharged', 2, 'Discharged'),
(6, 6, 'Emergency', 1, 'In Patient'),
(7, 7, 'Mortality', 3, 'Mortality'),
(8, 8, 'Sign Out', 4, 'Sign Out'),
(9, 9, 'Fall', 1, 'In Patient'),
(10, 10, 'Medication Error', 1, 'In Patient'),
(11, 11, 'Mobidity', 1, 'In Patient'),
(12, 12, 'Sentinel Event', 1, 'In Patient');

-- --------------------------------------------------------

--
-- Table structure for table `surgical_procedures`
--

CREATE TABLE `surgical_procedures` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date_created` datetime NOT NULL,
  `physician_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surgical_procedures`
--

INSERT INTO `surgical_procedures` (`id`, `content`, `date_created`, `physician_id`, `patient_id`, `active`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lectus ligula, egestas et dapibus in, dictum nec diam. In fringilla nulla vitae dui volutpat feugiat ac id orci. Ut id scelerisque sapien.', '2017-06-29 00:00:00', 1, 10, 1),
(2, 'For incision and drainage of Perichondritis with Auriculoplasty\r\n', '2017-06-04 00:00:00', 1, 10, 1),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lectus ligula, egestas et dapibus in, dictum nec diam. In fringilla nulla vitae dui volutpat feugiat ac id orci. Ut id scelerisque sapien. Cras est lacus, tempor non lectus eget, faucibus faucibus leo. Morbi ac gravida nibh. Vivamus non velit at eros tristique vulputate rhoncus eu ipsum. Donec feugiat sagittis quam et tempus. Morbi elit erat, egestas quis suscipit eu, dapibus id nibh. Morbi at dapibus sapien. Donec finibus ultricies elit faucibus cursus. Vestibulum malesuada convallis velit ac vehicula. Cras aliquam nulla id feugiat malesuada.', '2017-04-10 00:00:00', 2, 1, 1),
(4, 'asdasdasd', '2017-06-15 08:03:48', 2, 1, 1),
(5, 'proc', '2017-06-15 08:09:38', 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `position_type` tinyint(4) NOT NULL,
  `last_login` datetime NOT NULL,
  `date_registered` datetime NOT NULL,
  `mac_address` text NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `mobile`, `position_type`, `last_login`, `date_registered`, `mac_address`, `active`) VALUES
(1, 'Jeffrey', 'Cabrera', 'mail@mail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '09999999999', 1, '2017-08-14 01:44:27', '2017-05-14 00:00:00', 'dc:0b:34:87:a4:49', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actions_needed`
--
ALTER TABLE `actions_needed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adref`
--
ALTER TABLE `adref`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mac_addresses`
--
ALTER TABLE `mac_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients_physicians`
--
ALTER TABLE `patients_physicians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `physicians`
--
ALTER TABLE `physicians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surgical_procedures`
--
ALTER TABLE `surgical_procedures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actions_needed`
--
ALTER TABLE `actions_needed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `adref`
--
ALTER TABLE `adref`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mac_addresses`
--
ALTER TABLE `mac_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `patients_physicians`
--
ALTER TABLE `patients_physicians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `physicians`
--
ALTER TABLE `physicians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `surgical_procedures`
--
ALTER TABLE `surgical_procedures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
