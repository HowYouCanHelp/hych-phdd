-- phpMyAdmin SQL Dump
-- version 2.8.0.1
-- http://www.phpmyadmin.net
-- 
-- Host: custsql-ipg58.eigbox.net
-- Generation Time: Dec 06, 2014 at 08:09 PM
-- Server version: 5.5.32
-- PHP Version: 4.4.9
-- 
-- Database: `howyoucanhelp`
-- 


DROP DATABASE IF EXISTS howyoucanhelp;
CREATE DATABASE howyoucanhelp;
use howyoucanhelp;
-- --------------------------------------------------------

-- 
-- Table structure for table `activity_actions`
-- 

CREATE TABLE `activity_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_by` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `activity_actions`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `ci_sessions`
-- 

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `ci_sessions`
-- 

INSERT INTO `ci_sessions` VALUES ('011cf8b99c42fc21dae38c441c802006', '210.1.85.42', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36', 1417909153, '');
INSERT INTO `ci_sessions` VALUES ('02a8437a5c27f65601e65ee2ceefe716', '210.1.85.42', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36', 1417909081, '');
INSERT INTO `ci_sessions` VALUES ('08c67afffc12493caefce3e49a5cb41a', '210.1.85.42', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36', 1417907669, '');
INSERT INTO `ci_sessions` VALUES ('0987e4f0fa0b1ce85b3251a155747480', '210.1.85.42', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36', 1417912207, '');
INSERT INTO `ci_sessions` VALUES ('0b2b35237fc6d8302551f3a96e1e0a1a', '210.1.85.42', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36', 1417907797, '');
INSERT INTO `ci_sessions` VALUES ('3548231d2be66b2ff86e56f32c50e1d9', '210.1.85.42', 'Mozilla/5.0 (Linux; Android 4.4.2; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/30.0', 1417907588, '');
INSERT INTO `ci_sessions` VALUES ('3d89930db6c473f3f79427e8fef1229c', '210.1.85.42', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36', 1417907246, '');
INSERT INTO `ci_sessions` VALUES ('43a0e77638e19f5109be70871ae1c49d', '210.1.85.42', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36', 1417908820, '');
INSERT INTO `ci_sessions` VALUES ('454faec98b6ac748b021622a6f06d9ea', '210.1.85.42', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36', 1417909021, '');
INSERT INTO `ci_sessions` VALUES ('61bc7058788afa47bf13170d2811221f', '210.1.85.42', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36', 1417912081, '');
INSERT INTO `ci_sessions` VALUES ('712f6dacf74cfc7b1f49b0a2ca6d955a', '210.1.85.42', 'Mozilla/5.0 (Linux; U; Android 4.3; en-us; Z10 Build/10.3.0.156) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobi', 1417909811, '');
INSERT INTO `ci_sessions` VALUES ('7cec3666fbf1724ac334cb40c7573137', '210.1.85.42', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36', 1417907345, '');
INSERT INTO `ci_sessions` VALUES ('80ee1541f0923920b5bab4c4022d66fb', '210.1.85.42', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36', 1417911473, '');
INSERT INTO `ci_sessions` VALUES ('88010f2b97ab72c6fc2b08d8c5afd609', '210.1.85.42', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36', 1417912017, '');
INSERT INTO `ci_sessions` VALUES ('8ca6c3ccaad64a2b776f4906b53850f2', '210.1.85.42', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36', 1417912134, '');
INSERT INTO `ci_sessions` VALUES ('adb677c4daae48a3fdf93339ddfd82a4', '210.1.85.42', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36', 1417909364, '');
INSERT INTO `ci_sessions` VALUES ('ceedd3d9f8703b95e18928780f9d5bda', '210.1.85.42', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36', 1417911282, '');
INSERT INTO `ci_sessions` VALUES ('dc3a0919ca7a1e66f7659d0fbb638cda', '210.1.85.42', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36', 1417914486, '');
INSERT INTO `ci_sessions` VALUES ('e76acbb03ac91e933b9c7705ce8d3fc1', '210.1.85.42', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36', 1417908728, '');
INSERT INTO `ci_sessions` VALUES ('e89b333ec1edbf2373961af7b787c41b', '210.1.85.42', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36', 1417909314, '');
INSERT INTO `ci_sessions` VALUES ('f5ffc668795417674836e41c7504c36b', '210.1.85.42', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36', 1417911066, '');
INSERT INTO `ci_sessions` VALUES ('f8ade2e29a6542ca9806ddef55e5f251', '210.1.85.42', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36', 1417911369, '');

-- --------------------------------------------------------

-- 
-- Table structure for table `donations`
-- 

CREATE TABLE `donations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fk` int(11) NOT NULL,
  `organization_fk` int(11) NOT NULL,
  `event_fk` int(11) NOT NULL,
  `donation_amount` int(11) NOT NULL,
  `transaction_fee` int(11) NOT NULL,
  `karma_donation` int(11) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `donations`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `event_types`
-- 

CREATE TABLE `event_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `photo_uri` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `event_types`
-- 

INSERT INTO `event_types` VALUES (1, 'Flood', '', 'd384f4e100443d691e7feff3955c4858.png', NULL, NULL, NULL, '2014-12-06 19:16:00');
INSERT INTO `event_types` VALUES (2, 'Evacuation Area', '', 'bd4bfe0e54ce04c30de5c4a64f007148.png', NULL, NULL, NULL, '2014-12-06 16:04:53');
INSERT INTO `event_types` VALUES (3, 'Donation Drop-off', '', '88a299b61c64217acd259db0c1c751c4.png', NULL, NULL, NULL, '2014-12-06 19:17:57');
INSERT INTO `event_types` VALUES (4, 'Help Needed', '', '540a50ed20f7730b76e8581ac1b868f6.png', NULL, NULL, NULL, '2014-12-06 19:18:27');
INSERT INTO `event_types` VALUES (5, 'Volunteer Station', '', 'e731d0b205b6d100bab30fc24bbfd231.png', NULL, NULL, NULL, '2014-12-06 16:23:11');
INSERT INTO `event_types` VALUES (6, 'Fund Raising', '', NULL, NULL, NULL, NULL, '2014-12-06 16:04:28');

-- --------------------------------------------------------

-- 
-- Table structure for table `events`
-- 

CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_fk` int(11) DEFAULT NULL,
  `photo_uri` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `datetime_start` datetime DEFAULT NULL,
  `datetime_end` datetime DEFAULT NULL,
  `venue` text,
  `longhitude` double(9,6) DEFAULT NULL,
  `latitude` double(9,6) DEFAULT NULL,
  `event_type_fk` int(11) DEFAULT NULL,
  `share_incentive` int(11) DEFAULT NULL,
  `join_incentive` int(11) DEFAULT NULL,
  `donations_received` int(11) DEFAULT NULL,
  `volunteers_registered` int(11) DEFAULT NULL,
  `volunteers_needed` int(11) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

-- 
-- Dumping data for table `events`
-- 

INSERT INTO `events` VALUES (1, 1, 'a5a3d15a5faee1c4541f773f00b96d3e.jpg', 'Walang Iwanan', 'Haiyan was the biggest disaster in history, but it also became a moment of global solidarity as we all came together to help those affected. \n\nOne year after, we honor (say THANK YOU to) everyone who responded to the call to BuildHope. One year after, we humbly share our collective victories amidst the many challenges, and the long road that lies ahead. \n\nFor every family that receives a home or a boat, or a child cared for through our Kusina ng Kalinga, we see thousands more in need, and we ask for YOUR help to make sure no one is left behind. \n\nTogether we can EndPoverty. Visit www.gk1world.com to find out how you can help.', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0.000000, 0.000000, 5, 1, 10, 0, 0, 30, NULL, NULL, NULL, '2014-12-06 19:36:05');
INSERT INTO `events` VALUES (2, 2, NULL, 'Hack for a Cause', 'Calling programmers and designers who want to change the world through technology - the hackathon for changing the world has arrived!', '2014-12-07 00:00:00', '2014-12-07 00:00:00', 'A Space Manila', 0.000000, 0.000000, 5, 2, 5, 0, 0, 50, NULL, NULL, NULL, '2014-12-06 19:38:22');
INSERT INTO `events` VALUES (3, 3, NULL, 'Build Houses for Yolanda Victims', 'Help us build a thousand houses for a thousand displaced families.', '2014-12-07 00:00:00', '2014-12-07 00:00:00', 'Tacloban, Leyte', 0.000000, 0.000000, 5, 1, 5, 0, 0, 100, NULL, NULL, NULL, '2014-12-06 19:27:15');
INSERT INTO `events` VALUES (41, NULL, NULL, 'test', '', NULL, NULL, '', 14.553724, 121.021738, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-12-06 17:55:47');
INSERT INTO `events` VALUES (42, 1, NULL, 'Sponsor an NGO''s Marketing', 'Our mission is to make the Development Sector mainstream. Help us achieve this mission by sponsoring an NGO site''s web development and marketing costs for one month.', '1969-12-31 00:00:00', '1969-12-31 00:00:00', '', 0.000000, 0.000000, 6, 5, 0, 0, 0, 0, NULL, NULL, NULL, '2014-12-06 19:37:06');

-- --------------------------------------------------------

-- 
-- Table structure for table `organization_moderators`
-- 

CREATE TABLE `organization_moderators` (
  `user_fk` int(11) NOT NULL,
  `organization_fk` int(11) NOT NULL DEFAULT '0',
  `created_by` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_fk`,`organization_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `organization_moderators`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `organizations`
-- 

CREATE TABLE `organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_uri` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `about` text,
  `address` text,
  `longhitude` double(9,6) DEFAULT NULL,
  `latitude` double(9,6) DEFAULT NULL,
  `karma` int(11) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `organizations`
-- 

INSERT INTO `organizations` VALUES (1, 'b703dd31a420cca00f838f1b0d79cfa7.jpg', 'Gawad Kalinga Official', 'Gawad Kalinga, Inc.', '', '', 0.000000, 0.000000, NULL, NULL, NULL, NULL, '2014-12-06 18:41:14');
INSERT INTO `organizations` VALUES (2, '62b2535d6c41d31a16cff4345998cb21.JPG', 'MagisSolutions', '', '', '', 0.000000, 0.000000, NULL, NULL, NULL, NULL, '2014-12-06 19:23:19');
INSERT INTO `organizations` VALUES (3, '88e42061f7af2a17c92a19faf6db7997.jpg', 'Habitat for Humanity', '', '', '', 0.000000, 0.000000, NULL, NULL, NULL, NULL, '2014-12-06 19:26:10');

-- --------------------------------------------------------

-- 
-- Table structure for table `user_activities`
-- 

CREATE TABLE `user_activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fk` int(11) NOT NULL,
  `action_fk` int(11) NOT NULL,
  `event_fk` int(11) NOT NULL,
  `details` text,
  `karma_change` int(11) DEFAULT NULL,
  `new_karma` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `hidden` tinyint(1) DEFAULT '0',
  `created_by` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `user_activities`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `user_logins`
-- 

CREATE TABLE `user_logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fk` int(11) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- 
-- Dumping data for table `user_logins`
-- 

INSERT INTO `user_logins` VALUES (1, 1, '2014-12-06 17:35:58');
INSERT INTO `user_logins` VALUES (2, 1, '2014-12-06 17:39:00');
INSERT INTO `user_logins` VALUES (3, 1, '2014-12-06 17:39:42');
INSERT INTO `user_logins` VALUES (4, 1, '2014-12-06 17:46:22');
INSERT INTO `user_logins` VALUES (5, 2, '2014-12-06 14:30:33');
INSERT INTO `user_logins` VALUES (6, 2, '2014-12-06 14:34:36');
INSERT INTO `user_logins` VALUES (7, 2, '2014-12-06 14:37:29');
INSERT INTO `user_logins` VALUES (8, 2, '2014-12-06 14:37:42');
INSERT INTO `user_logins` VALUES (9, 2, '2014-12-06 14:47:19');
INSERT INTO `user_logins` VALUES (10, 3, '2014-12-06 18:13:18');
INSERT INTO `user_logins` VALUES (11, 3, '2014-12-06 18:51:12');

-- --------------------------------------------------------

-- 
-- Table structure for table `user_registrations`
-- 

CREATE TABLE `user_registrations` (
  `user_fk` int(11) NOT NULL DEFAULT '0',
  `event_fk` int(11) NOT NULL DEFAULT '0',
  `datetime` datetime DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `verified` tinyint(1) DEFAULT '0',
  `created_by` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_fk`,`event_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `user_registrations`
-- 

INSERT INTO `user_registrations` VALUES (2, 1, NULL, NULL, 0, NULL, NULL, NULL, '2014-12-06 20:00:36');
INSERT INTO `user_registrations` VALUES (3, 1, NULL, NULL, 0, NULL, NULL, NULL, '2014-12-06 20:00:36');
INSERT INTO `user_registrations` VALUES (4, 1, NULL, NULL, 0, NULL, NULL, NULL, '2014-12-06 20:00:36');

-- --------------------------------------------------------

-- 
-- Table structure for table `user_shares`
-- 

CREATE TABLE `user_shares` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fk` int(11) DEFAULT NULL,
  `event_fk` int(11) DEFAULT NULL,
  `karma_incentive` int(11) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `user_shares`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fb_id` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `karma` int(11) DEFAULT NULL,
  `about_me` text,
  `created_by` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` VALUES (3, '100000098754443', 'https://graph.facebook.com/100000098754443/picture?type=large&return_ssl_results=1', 'ronagapitz@yahoo.com', NULL, 'Ron', NULL, 'Agapito', NULL, NULL, NULL, NULL, NULL, '2014-12-06 18:13:18');
INSERT INTO `users` VALUES (4, '', '', 'camillejdc@gmail.com', NULL, 'Camille', '', 'Cruz', 530, '', NULL, NULL, NULL, '2014-12-06 20:08:06');
INSERT INTO `users` VALUES (5, '', '', 'josecarlosoriano@gmail.com', NULL, 'JC', '', 'Soriano', 1000, '', NULL, NULL, NULL, '2014-12-06 18:40:16');
INSERT INTO `users` VALUES (6, '', '', 'marionjoren@gmail.com', NULL, 'Marion', '', 'Olmillo', 20000, '', NULL, NULL, NULL, '2014-12-06 18:40:38');
