-- MySQL dump 10.13  Distrib 5.5.50, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: nordic
-- ------------------------------------------------------
-- Server version	5.5.50-0ubuntu0.14.04.1

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `admin_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(120) NOT NULL DEFAULT '',
  `email` varchar(120) NOT NULL DEFAULT '',
  `password` varchar(120) NOT NULL,
  `profile_photo` varchar(120) NOT NULL DEFAULT 'NO_PROFILE_ADMIN_PHOTO.JPG',
  `priv_level_id` int(2) NOT NULL,
  UNIQUE KEY `admin_id` (`admin_id`),
  KEY `admin_id_2` (`admin_id`,`username`,`email`,`priv_level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currency`
--

DROP TABLE IF EXISTS `currency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `currency` (
  `currency_id` int(3) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`currency_id`),
  KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currency`
--

LOCK TABLES `currency` WRITE;
/*!40000 ALTER TABLE `currency` DISABLE KEYS */;
INSERT INTO `currency` VALUES (1,'SEK',1.00,'swedish krona'),(2,'EUR',0.10,'euro'),(3,'USD',0.12,'US dollar');
/*!40000 ALTER TABLE `currency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_types`
--

DROP TABLE IF EXISTS `event_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_types` (
  `event_type_id` int(2) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`event_type_id`),
  KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_types`
--

LOCK TABLES `event_types` WRITE;
/*!40000 ALTER TABLE `event_types` DISABLE KEYS */;
INSERT INTO `event_types` VALUES (1,'concert'),(3,'festival'),(2,'sport');
/*!40000 ALTER TABLE `event_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `event_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `event_type_id` int(11) NOT NULL DEFAULT '1',
  `event_title` varchar(120) NOT NULL DEFAULT '',
  `slug` varchar(255) NOT NULL,
  `event_overview` text,
  `venue` varchar(120) NOT NULL DEFAULT '',
  `city` varchar(120) NOT NULL DEFAULT '',
  `country_id` int(3) NOT NULL DEFAULT '210',
  `event_date` datetime NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '0',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `event_photo` varchar(120) NOT NULL DEFAULT 'NO_PHOTO.JPG',
  `seating_map` varchar(120) NOT NULL DEFAULT 'NO_SEATING_PHOTO.JPG',
  UNIQUE KEY `event_id` (`event_id`),
  KEY `event_type_id` (`event_type_id`,`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,1,'Test Event','','This a test event to be deleted later','Vaxjo Hall','Vaxjo City',210,'2016-09-09 18:30:00',1,1,'NO_PHOTO.JPG','NO_SEATING_PHOTO.JPG'),(2,1,'Second Test Event','','Anoter test event to be deleted later','xxxVaxjo Hall','Vaxjo City',210,'2016-09-09 18:30:00',1,1,'NO_PHOTO.JPG','NO_SEATING_PHOTO.JPG'),(3,1,'Sketch Board Event','','Anoter test event to be deleted later','Sketch Park','Addis Ababa',210,'2016-09-09 18:30:00',1,0,'NO_PHOTO.JPG','NO_SEATING_PHOTO.JPG'),(4,1,'CodeIgniter Event','','Anoter test event to be deleted later','CI Park','Addis Ababa',210,'2016-09-09 18:30:00',1,0,'NO_PHOTO.JPG','NO_SEATING_PHOTO.JPG'),(5,2,'CITY VS SPURS','','Anoter test event to be deleted later','ETHIHAD STADIUM','Manchester',210,'2016-09-09 18:30:00',1,0,'NO_PHOTO.JPG','NO_SEATING_PHOTO.JPG');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guests`
--

DROP TABLE IF EXISTS `guests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guests` (
  `guest_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL DEFAULT '',
  `first_name` varchar(60) NOT NULL DEFAULT '',
  `last_name` varchar(60) NOT NULL DEFAULT '',
  `address1` varchar(120) NOT NULL DEFAULT '',
  `address2` varchar(120) NOT NULL DEFAULT '',
  `city` varchar(120) NOT NULL DEFAULT '',
  `state` varchar(120) NOT NULL DEFAULT '',
  `zipcode` varchar(10) NOT NULL DEFAULT '',
  `country_id` int(4) NOT NULL DEFAULT '210',
  UNIQUE KEY `guest_id` (`guest_id`),
  KEY `email` (`email`,`zipcode`,`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guests`
--

LOCK TABLES `guests` WRITE;
/*!40000 ALTER TABLE `guests` DISABLE KEYS */;
/*!40000 ALTER TABLE `guests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tickets` (
  `ticket_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `ticket_title` varchar(255) NOT NULL DEFAULT '',
  `ticket_type` tinyint(1) NOT NULL DEFAULT '0',
  `ticket_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `seller_id` int(11) NOT NULL DEFAULT '1',
  `ticket_count` int(11) DEFAULT NULL,
  `sold_count` int(11) NOT NULL DEFAULT '0',
  `ticket_left` int(11) DEFAULT NULL,
  UNIQUE KEY `ticket_id` (`ticket_id`),
  KEY `event_id` (`event_id`,`ticket_title`,`seller_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (1,1,'VIP',0,500.00,1,NULL,0,NULL),(2,1,'First Class',0,250.00,1,NULL,0,NULL),(3,1,'Economy Class',0,250.00,1,NULL,0,NULL);
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL DEFAULT '',
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(120) NOT NULL,
  `first_name` varchar(60) NOT NULL DEFAULT '',
  `last_name` varchar(60) NOT NULL DEFAULT '',
  `profile_photo` varchar(120) NOT NULL DEFAULT 'NO_PROFILE_PHOTO.JPG',
  `address1` varchar(120) NOT NULL DEFAULT '',
  `address2` varchar(120) NOT NULL DEFAULT '',
  `city` varchar(120) NOT NULL DEFAULT '',
  `state` varchar(120) NOT NULL DEFAULT '',
  `zipcode` varchar(10) NOT NULL DEFAULT '',
  `country_id` int(4) NOT NULL DEFAULT '210',
  UNIQUE KEY `user_id` (`user_id`),
  KEY `email` (`email`,`username`,`zipcode`,`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'eyobtariku@gmail.com','eyobofficial','123456','eyob','tariku','NO_PROFILE_PHOTO.JPG','Gerji St','','Addis Ababa','AA','18800',210);
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

-- Dump completed on 2016-10-06 20:55:41
