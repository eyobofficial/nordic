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
INSERT INTO `events` VALUES (1,1,'Test Event','This a test event to be deleted later','Vaxjo Hall','Vaxjo City',210,'2016-09-09 18:30:00',1,1,'NO_PHOTO.JPG','NO_SEATING_PHOTO.JPG'),(2,1,'Second Test Event','Anoter test event to be deleted later','xxxVaxjo Hall','Vaxjo City',210,'2016-09-09 18:30:00',1,1,'NO_PHOTO.JPG','NO_SEATING_PHOTO.JPG'),(3,1,'Sketch Board Event','Anoter test event to be deleted later','Sketch Park','Addis Ababa',210,'2016-09-09 18:30:00',1,0,'NO_PHOTO.JPG','NO_SEATING_PHOTO.JPG'),(4,1,'CodeIgniter Event','Anoter test event to be deleted later','CI Park','Addis Ababa',210,'2016-09-09 18:30:00',1,0,'NO_PHOTO.JPG','NO_SEATING_PHOTO.JPG'),(5,2,'CITY VS SPURS','Anoter test event to be deleted later','ETHIHAD STADIUM','Manchester',210,'2016-09-09 18:30:00',1,0,'NO_PHOTO.JPG','NO_SEATING_PHOTO.JPG');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-03 22:35:21
