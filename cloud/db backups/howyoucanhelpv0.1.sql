-- MySQL dump 10.13  Distrib 5.5.20, for Win64 (x86)
--
-- Host: localhost    Database: howyoucanhelp
-- ------------------------------------------------------
-- Server version	5.5.20-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activity_actions`
--

DROP TABLE IF EXISTS `activity_actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_by` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_actions`
--

LOCK TABLES `activity_actions` WRITE;
/*!40000 ALTER TABLE `activity_actions` DISABLE KEYS */;
/*!40000 ALTER TABLE `activity_actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('ae526c01aaf22678c13fbb6adad83ad2','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36',1417894035,'');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donations`
--

DROP TABLE IF EXISTS `donations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donations`
--

LOCK TABLES `donations` WRITE;
/*!40000 ALTER TABLE `donations` DISABLE KEYS */;
/*!40000 ALTER TABLE `donations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_types`
--

DROP TABLE IF EXISTS `event_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_types`
--

LOCK TABLES `event_types` WRITE;
/*!40000 ALTER TABLE `event_types` DISABLE KEYS */;
INSERT INTO `event_types` VALUES (1,'Flood','','d384f4e100443d691e7feff3955c4858.png',NULL,NULL,NULL,'2014-12-06 19:16:00'),(2,'Evacuation Center','','bd4bfe0e54ce04c30de5c4a64f007148.png',NULL,NULL,NULL,'2014-12-06 19:16:44'),(3,'Donation Drop-off','','88a299b61c64217acd259db0c1c751c4.png',NULL,NULL,NULL,'2014-12-06 19:17:57'),(4,'Help Needed','','540a50ed20f7730b76e8581ac1b868f6.png',NULL,NULL,NULL,'2014-12-06 19:18:27'),(5,'Call for Volunteers','','e731d0b205b6d100bab30fc24bbfd231.png',NULL,NULL,NULL,'2014-12-06 19:18:45');
/*!40000 ALTER TABLE `event_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,1,'a5a3d15a5faee1c4541f773f00b96d3e.jpg','Walang Iwanan','Haiyan was the biggest disaster in history, but it also became a moment of global solidarity as we all came together to help those affected. \r\n\r\nOne year after, we honor (say THANK YOU to) everyone who responded to the call to Ã¢â‚¬Âª#Ã¢â‚¬Å½BuildHopeÃ¢â‚¬Â¬. One year after, we humbly share our collective victories amidst the many challenges, and the long road that lies ahead. \r\n\r\nFor every family that receives a home or a boat, or a child cared for through our Kusina ng Kalinga, we see thousands more in need, and we ask for YOUR help to make sure no one is left behind. \r\n\r\nTogether we can Ã¢â‚¬Âª#Ã¢â‚¬Å½EndPovertyÃ¢â‚¬Â¬. Visit www.gk1world.com to find out how you can help.','1970-01-01 00:00:00','1970-01-01 00:00:00','',0.000000,0.000000,1,1,10,0,0,30,NULL,NULL,NULL,'2014-12-06 19:22:13'),(2,2,NULL,'Hack for a Cause','Calling programmers and designers who want to change the world through technology - the hackathon for changing the world has arrived!','2014-12-07 00:00:00','2014-12-07 00:00:00','A Space Manila',0.000000,0.000000,1,2,5,0,0,50,NULL,NULL,NULL,'2014-12-06 19:25:03'),(3,3,NULL,'Build Houses for Yolanda Victims','Help us build a thousand houses for a thousand displaced families.','2014-12-07 00:00:00','2014-12-07 00:00:00','Tacloban, Leyte',0.000000,0.000000,5,1,5,0,0,100,NULL,NULL,NULL,'2014-12-06 19:27:15');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organization_moderators`
--

DROP TABLE IF EXISTS `organization_moderators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organization_moderators` (
  `user_fk` int(11) NOT NULL,
  `organization_fk` int(11) NOT NULL DEFAULT '0',
  `created_by` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_fk`,`organization_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organization_moderators`
--

LOCK TABLES `organization_moderators` WRITE;
/*!40000 ALTER TABLE `organization_moderators` DISABLE KEYS */;
/*!40000 ALTER TABLE `organization_moderators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organizations`
--

DROP TABLE IF EXISTS `organizations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_uri` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `about` text,
  `address` text,
  `longhitude` double(9,6) DEFAULT NULL,
  `latitude` double(9,6) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizations`
--

LOCK TABLES `organizations` WRITE;
/*!40000 ALTER TABLE `organizations` DISABLE KEYS */;
INSERT INTO `organizations` VALUES (1,'b703dd31a420cca00f838f1b0d79cfa7.jpg','Gawad Kalinga Official','Gawad Kalinga, Inc.','','',0.000000,0.000000,NULL,NULL,NULL,'2014-12-06 18:41:14'),(2,'62b2535d6c41d31a16cff4345998cb21.JPG','MagisSolutions','','','',0.000000,0.000000,NULL,NULL,NULL,'2014-12-06 19:23:19'),(3,'88e42061f7af2a17c92a19faf6db7997.jpg','Habitat for Humanity','','','',0.000000,0.000000,NULL,NULL,NULL,'2014-12-06 19:26:10');
/*!40000 ALTER TABLE `organizations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_activities`
--

DROP TABLE IF EXISTS `user_activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_activities`
--

LOCK TABLES `user_activities` WRITE;
/*!40000 ALTER TABLE `user_activities` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_logins`
--

DROP TABLE IF EXISTS `user_logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fk` int(11) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_logins`
--

LOCK TABLES `user_logins` WRITE;
/*!40000 ALTER TABLE `user_logins` DISABLE KEYS */;
INSERT INTO `user_logins` VALUES (1,1,'2014-12-06 17:35:58'),(2,1,'2014-12-06 17:39:00'),(3,1,'2014-12-06 17:39:42'),(4,1,'2014-12-06 17:46:22');
/*!40000 ALTER TABLE `user_logins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_registrations`
--

DROP TABLE IF EXISTS `user_registrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_registrations` (
  `user_fk` int(11) NOT NULL DEFAULT '0',
  `event_fk` int(11) NOT NULL DEFAULT '0',
  `datetime` datetime DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_fk`,`event_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_registrations`
--

LOCK TABLES `user_registrations` WRITE;
/*!40000 ALTER TABLE `user_registrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_registrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_shares`
--

DROP TABLE IF EXISTS `user_shares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_shares` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fk` int(11) DEFAULT NULL,
  `event_fk` int(11) DEFAULT NULL,
  `karma_incentive` int(11) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_shares`
--

LOCK TABLES `user_shares` WRITE;
/*!40000 ALTER TABLE `user_shares` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_shares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'0','0','0',NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,'2014-12-06 17:35:58');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-07  3:28:01
