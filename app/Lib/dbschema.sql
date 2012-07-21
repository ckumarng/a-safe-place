-- MySQL dump 10.13  Distrib 5.5.9, for osx10.5 (i386)
--
-- Host: 127.0.0.1    Database: pretty_cake
-- ------------------------------------------------------
-- Server version	5.5.25

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
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answers` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` bigint(10) unsigned NOT NULL,
  `question_id` int(10) unsigned NOT NULL,
  `time_taken` time NOT NULL,
  `correct` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `logins`
--

DROP TABLE IF EXISTS `logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logins` (
  `id` bigint(254) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(254) NOT NULL,
  `last_name` varchar(254) NOT NULL,
  `email` varchar(254) NOT NULL,
  `complete` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `rate` enum('team','piece') DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modules` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `module` bigint(10) unsigned NOT NULL,
  `user` bigint(10) unsigned NOT NULL,
  `study` bigint(10) unsigned NOT NULL,
  `completed` smallint(1) NOT NULL DEFAULT '0',
  `correct` int(10) NOT NULL DEFAULT '0',
  `payment` int(11) NOT NULL DEFAULT '0',
  `confidence` enum('high','low','none') NOT NULL DEFAULT 'none',
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `random_numbers`
--

DROP TABLE IF EXISTS `random_numbers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `random_numbers` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `first` smallint(1) unsigned NOT NULL,
  `second` smallint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rank`
--

DROP TABLE IF EXISTS `rank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rank` (
  `study_id` bigint(10) unsigned NOT NULL,
  `rank_array` tinytext NOT NULL,
  PRIMARY KEY (`study_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `robot_link`
--

DROP TABLE IF EXISTS `robot_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `robot_link` (
  `user_id` bigint(10) unsigned NOT NULL,
  `robot_rank` int(10) unsigned NOT NULL,
  `user_rank` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `studies`
--

DROP TABLE IF EXISTS `studies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studies` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `treatment_group` enum('select','no-select','') NOT NULL DEFAULT '',
  `participants` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `survey`
--

DROP TABLE IF EXISTS `survey`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `survey` (
  `user_id` bigint(10) unsigned NOT NULL,
  `1` varchar(254) NOT NULL DEFAULT '',
  `2` varchar(254) NOT NULL DEFAULT '',
  `3` varchar(254) NOT NULL DEFAULT '',
  `4` varchar(254) NOT NULL DEFAULT '',
  `5` varchar(254) NOT NULL DEFAULT '',
  `6` varchar(254) NOT NULL DEFAULT '',
  `7` varchar(254) NOT NULL DEFAULT '',
  `8` varchar(254) NOT NULL DEFAULT '',
  `9` varchar(254) NOT NULL DEFAULT '',
  `10` varchar(254) NOT NULL DEFAULT '',
  `11` varchar(254) NOT NULL DEFAULT '',
  `12` varchar(254) NOT NULL DEFAULT '',
  `13` varchar(254) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `team_link`
--

DROP TABLE IF EXISTS `team_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_link` (
  `team_id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_1` int(10) unsigned NOT NULL,
  `user_2` int(10) unsigned NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `variables`
--

DROP TABLE IF EXISTS `variables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `variables` (
  `id` bigint(24) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(254) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-07-21 16:36:54
