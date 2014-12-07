-- DROP DATABASE IF EXISTS howyoucanhelp;
-- CREATE DATABASE howyoucanhelp;
-- use howyoucanhelp;

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

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  fb_id varchar(255) DEFAULT NULL,
  profile_pic varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `karma` int(11) DEFAULT 0,
  `about_me` text,
  `created_by` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS `user_logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
	user_fk int(11),
  updated_on timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `user_shares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_shares` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
	user_fk int(11),
	event_fk int(11),
	karma_incentive int(11),
  updated_on timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `organizations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  photo_uri varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `about` text,
  address text,
  longhitude double(9,6),
  latitude double(9,6),
  `created_by` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  organization_fk int(11),
  photo_uri varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `datetime_start` datetime,
  `datetime_end` datetime,
  `venue` text,
  longhitude double(9,6) DEFAULT NULL,
  latitude double(9,6) DEFAULT NULL,
  `event_type_fk` int(11),
  share_incentive int(11),
  join_incentive int(11),
  donations_received int(11),
  volunteers_registered int(11),
  volunteers_needed int(11),
  `created_by` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS `user_registrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_registrations` (
  `user_fk` int(11) DEFAULT NULL,
  `event_fk` int(11) DEFAULT NULL,
  `datetime` datetime,
  code varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (user_fk, event_fk)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS `organization_moderators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organization_moderators` (
  `user_fk` int(11) NOT NULL,
  `organization_fk` int(11) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (user_fk, organization_fk)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS `user_activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_activities` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fk` int(11) NOT NULL,
  `action_fk` int(11) NOT NULL,
  `event_fk` int(11) NOT NULL,
  `details` text,
  `karma_change` int(11),
  new_karma int(11),
  `datetime` datetime,
  hidden tinyint(1) DEFAULT 0,
  `created_by` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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

DROP TABLE IF EXISTS `event_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  photo_uri varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  datetime datetime,
  `created_by` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
