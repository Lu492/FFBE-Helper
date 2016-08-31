-- MySQL dump 10.13  Distrib 5.7.13, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: ffbe
-- ------------------------------------------------------
-- Server version	5.7.13-0ubuntu0.16.04.2

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
-- Table structure for table `genders`
--

DROP TABLE IF EXISTS `genders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genders`
--

LOCK TABLES `genders` WRITE;
/*!40000 ALTER TABLE `genders` DISABLE KEYS */;
INSERT INTO `genders` VALUES (1,'Male','2016-08-31 15:57:03','2016-08-31 15:57:03'),(2,'Female','2016-08-31 17:00:11','2016-08-31 17:00:11');
/*!40000 ALTER TABLE `genders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (2,'Black Mage','2016-08-31 15:57:03','2016-08-31 15:57:03'),(3,'Knight','2016-08-31 17:01:11','2016-08-31 17:01:11'),(4,'White Magus','2016-08-31 17:01:59','2016-08-31 17:01:59'),(5,'Warrior','2016-08-31 17:04:23','2016-08-31 17:04:23'),(6,'White Mage','2016-08-31 17:05:16','2016-08-31 17:05:16'),(7,'Thief','2016-08-31 16:14:15','2016-08-31 16:14:15'),(8,'Monk','2016-08-31 16:16:53','2016-08-31 16:16:53'),(9,'Ranger','2016-08-31 16:18:04','2016-08-31 16:18:04'),(10,'Gunner','2016-08-31 16:19:02','2016-08-31 16:19:02'),(11,'Bard','2016-08-31 16:21:15','2016-08-31 16:21:15'),(12,'Imperial','2016-08-31 16:22:35','2016-08-31 16:22:35'),(13,'Bandit','2016-08-31 16:39:54','2016-08-31 16:39:54'),(14,'High Priest','2016-08-31 16:41:53','2016-08-31 16:41:53'),(15,'Songstress','2016-08-31 16:44:30','2016-08-31 16:44:30'),(16,'Samurai','2016-08-31 16:47:13','2016-08-31 16:47:13'),(17,'Green Mage','2016-08-31 16:48:32','2016-08-31 16:48:32'),(18,'Spellblade','2016-08-31 16:49:43','2016-08-31 16:49:43'),(19,'Salve-maker','2016-08-31 16:51:48','2016-08-31 16:51:48'),(20,'Dancer','2016-08-31 16:55:33','2016-08-31 16:55:33'),(21,'Assassin','2016-08-31 16:59:36','2016-08-31 16:59:36'),(22,'Red Mage','2016-08-31 17:00:54','2016-08-31 17:00:54'),(23,'Dragoon','2016-08-31 17:02:29','2016-08-31 17:02:29'),(24,'Machinist','2016-08-31 17:04:12','2016-08-31 17:04:12'),(25,'Sky Pirate','2016-08-31 17:05:44','2016-08-31 17:05:44'),(26,'Professor','2016-08-31 17:07:38','2016-08-31 17:07:38'),(27,'Summoner','2016-08-31 17:12:27','2016-08-31 17:12:27');
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `origins`
--

DROP TABLE IF EXISTS `origins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `origins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `shortname` varchar(45) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `origins`
--

LOCK TABLES `origins` WRITE;
/*!40000 ALTER TABLE `origins` DISABLE KEYS */;
INSERT INTO `origins` VALUES (1,'Final Fantasy I','FF 1','2016-08-31 16:00:00','2016-08-31 16:00:00'),(2,'Final Fantasy II','FF 2','2016-08-31 16:00:00','2016-08-31 16:00:00'),(3,'Final Fantasy III','FF 3','2016-08-31 16:00:00','2016-08-31 16:00:00'),(4,'Final Fantasy IV','FF 4','2016-08-31 16:00:00','2016-08-31 16:00:00'),(5,'Final Fantasy V','FF 5','2016-08-31 16:00:00','2016-08-31 16:00:00'),(6,'Final Fantasy VI','FF 6','2016-08-31 16:00:00','2016-08-31 16:00:00'),(7,'Final Fantasy IX','FF 9','2016-08-31 16:00:00','2016-08-31 16:00:00'),(8,'Final Fantasy XI','FF 11','2016-08-31 16:00:00','2016-08-31 16:00:00'),(9,'Final Fantasy XII','FF 12','2016-08-31 16:00:00','2016-08-31 16:00:00'),(10,'Final Fantasy Brave Exvius','FF BE','2016-08-31 16:00:00','2016-08-31 16:00:00');
/*!40000 ALTER TABLE `origins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `practises`
--

DROP TABLE IF EXISTS `practises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `practises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_id` int(11) NOT NULL,
  `specialisation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index2` (`unit_id`,`specialisation_id`),
  KEY `fk_units_specialisations_idx` (`specialisation_id`),
  CONSTRAINT `fk_units_practises` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_units_specialisations` FOREIGN KEY (`specialisation_id`) REFERENCES `specialisations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `practises`
--

LOCK TABLES `practises` WRITE;
/*!40000 ALTER TABLE `practises` DISABLE KEYS */;
INSERT INTO `practises` VALUES (1,1,2),(2,1,5),(3,2,5),(4,3,1),(5,3,2),(6,4,5),(7,5,1),(8,6,4),(9,7,2),(10,8,5),(11,9,1),(12,10,5),(13,11,2),(14,12,4),(15,13,4),(16,14,2),(17,15,1),(18,16,2),(19,17,5),(20,18,5),(21,19,2),(22,20,3),(23,21,1),(24,21,2),(25,22,4),(26,23,2),(27,24,1),(28,25,5),(29,26,2),(30,27,1),(31,27,4),(32,28,5),(33,29,2),(34,29,5),(35,30,1),(36,30,2),(37,31,4),(38,32,4);
/*!40000 ALTER TABLE `practises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `races`
--

DROP TABLE IF EXISTS `races`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `races` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `races`
--

LOCK TABLES `races` WRITE;
/*!40000 ALTER TABLE `races` DISABLE KEYS */;
INSERT INTO `races` VALUES (2,'Human','2016-08-31 15:57:03','2016-08-31 15:57:03'),(3,'Helgas','2016-08-31 16:41:53','2016-08-31 16:41:53'),(4,'Dwarf','2016-08-31 16:45:56','2016-08-31 16:45:56'),(5,'Black Mage','2016-08-31 16:53:52','2016-08-31 16:53:52'),(6,'Hume','2016-08-31 16:55:33','2016-08-31 16:55:33'),(7,'Viera','2016-08-31 17:05:44','2016-08-31 17:05:44'),(8,'Tarutaru','2016-08-31 17:07:38','2016-08-31 17:07:38');
/*!40000 ALTER TABLE `races` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specialisations`
--

DROP TABLE IF EXISTS `specialisations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specialisations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specialisations`
--

LOCK TABLES `specialisations` WRITE;
/*!40000 ALTER TABLE `specialisations` DISABLE KEYS */;
INSERT INTO `specialisations` VALUES (1,'Healing','2016-08-31 16:00:00','2016-08-31 16:00:00'),(2,'Support','2016-08-31 16:00:00','2016-08-31 16:00:00'),(3,'Hybrid damage','2016-08-31 16:00:00','2016-08-31 16:00:00'),(4,'Magic damage','2016-08-31 16:00:00','2016-08-31 16:00:00'),(5,'Physical damage','2016-08-31 16:00:00','2016-08-31 16:00:00'),(7,'Tank','2016-08-31 16:00:00','2016-08-31 16:00:00');
/*!40000 ALTER TABLE `specialisations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `origin_id` int(11) NOT NULL,
  `race_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `base_rarity` int(1) NOT NULL DEFAULT '1',
  `max_rarity` int(1) NOT NULL DEFAULT '5',
  `trust_master_reward` varchar(255) DEFAULT NULL,
  `hp` int(11) NOT NULL DEFAULT '1',
  `mp` int(11) NOT NULL DEFAULT '1',
  `atk` int(11) NOT NULL DEFAULT '1',
  `def` int(11) NOT NULL DEFAULT '1',
  `mag` int(11) NOT NULL DEFAULT '1',
  `spr` int(11) NOT NULL DEFAULT '1',
  `hits` int(11) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_units_origins_idx` (`origin_id`),
  KEY `fk_units_jobs_idx` (`job_id`),
  KEY `fk_units_races_idx` (`race_id`),
  KEY `fk_units_genders_idx` (`gender_id`),
  CONSTRAINT `fk_units_genders` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_units_jobs` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_units_origins` FOREIGN KEY (`origin_id`) REFERENCES `origins` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_units_races` FOREIGN KEY (`race_id`) REFERENCES `races` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `units`
--

LOCK TABLES `units` WRITE;
/*!40000 ALTER TABLE `units` DISABLE KEYS */;
INSERT INTO `units` VALUES (1,'Rain',10,2,3,1,2,5,'',2488,97,89,88,86,80,2,'2016-08-31 15:05:27','2016-08-31 15:05:27'),(2,'Laswell',10,2,3,1,2,5,'',2349,100,96,82,89,74,1,'2016-08-31 15:06:50','2016-08-31 15:06:50'),(3,'Fina',10,2,4,2,2,5,'',1867,131,79,79,93,101,1,'2016-08-31 15:07:39','2016-08-31 15:07:39'),(4,'Rizer',10,2,5,1,1,2,'HP +10%',1108,40,47,44,31,35,1,'2016-08-31 15:08:32','2016-08-31 15:08:32'),(5,'Leah',10,2,6,2,1,2,'Banish',796,54,31,30,41,48,1,'2016-08-31 15:10:18','2016-08-31 15:10:18'),(6,'Tronn',10,2,2,1,1,2,'Fira',801,57,30,33,47,43,1,'2016-08-31 15:57:03','2016-08-31 15:57:03'),(7,'Eldin',10,2,7,1,1,2,'Pilfer',883,41,43,37,34,36,4,'2016-08-31 16:14:15','2016-08-31 16:14:15'),(8,'Baurg',10,2,8,1,1,2,'Store',1201,39,45,52,27,31,3,'2016-08-31 16:16:53','2016-08-31 16:16:53'),(9,'Gimlee',10,2,9,1,1,2,'Aim',827,46,40,36,39,34,1,'2016-08-31 16:18:04','2016-08-31 16:18:04'),(10,'Maxell',10,2,10,1,1,2,'Power Shot',864,44,47,32,38,36,1,'2016-08-31 16:19:02','2016-08-31 16:19:02'),(11,'Liza',10,2,11,2,1,2,'Lullaby',782,51,35,34,39,41,2,'2016-08-31 16:21:15','2016-08-31 16:21:15'),(12,'Wedge',6,2,12,1,2,3,'Fire Beam',1162,56,50,51,41,43,3,'2016-08-31 16:22:35','2016-08-31 16:22:35'),(13,'Biggs',6,2,12,1,2,3,'Blizzard Beam',1168,59,51,50,42,42,3,'2016-08-31 16:29:48','2016-08-31 16:29:48'),(14,'Paul',2,2,13,1,2,3,'Escape',1133,55,52,45,44,44,1,'2016-08-31 16:39:54','2016-08-31 16:39:54'),(15,'Anastasis',9,3,14,1,2,3,'Regen',1001,70,35,36,55,58,2,'2016-08-31 16:41:53','2016-08-31 16:41:53'),(16,'Sarah',1,2,15,2,2,3,'Paean',998,63,37,34,54,58,1,'2016-08-31 16:44:30','2016-08-31 16:44:30'),(17,'King Giott',4,4,5,1,2,3,'Stone Killer',1353,48,61,51,33,35,1,'2016-08-31 16:45:56','2016-08-31 16:45:56'),(18,'Shiki',10,2,16,1,2,3,'Tranquility',1224,53,59,37,35,42,1,'2016-08-31 16:47:13','2016-08-31 16:47:13'),(19,'Mizell',10,2,17,1,2,3,'Deprotect',1008,69,45,45,53,53,1,'2016-08-31 16:48:32','2016-08-31 16:48:32'),(20,'Ronaldo',10,2,18,1,2,3,'Drain Blade',1218,65,52,46,54,54,2,'2016-08-31 16:49:43','2016-08-31 16:49:43'),(21,'Mel',10,2,19,2,2,3,'Drink',978,72,38,44,48,49,2,'2016-08-31 16:51:48','2016-08-31 16:51:48'),(22,'Vivi',7,5,2,1,3,4,'Firaga',1504,111,59,63,92,85,1,'2016-08-31 16:53:52','2016-08-31 16:53:52'),(23,'Penelo',9,6,20,2,3,4,'Equip S Sword',1607,91,67,61,79,78,1,'2016-08-31 16:55:33','2016-08-31 16:55:33'),(24,'Maria',2,2,6,2,3,4,'Esuna',1489,95,65,58,78,85,3,'2016-08-31 16:57:12','2016-08-31 16:57:12'),(25,'Sabin',6,2,8,2,3,4,'Counter',2250,79,90,82,61,58,4,'2016-08-31 16:58:27','2016-08-31 16:58:27'),(26,'Shadow',6,2,21,1,3,4,'Throw',1896,88,89,76,73,68,2,'2016-08-31 16:59:36','2016-08-31 16:59:36'),(27,'Krile',5,2,22,2,3,4,'Thundaga',1651,98,64,66,81,73,1,'2016-08-31 17:00:54','2016-08-31 17:00:54'),(28,'Kain',4,2,23,1,3,4,'Gungnir',2090,85,89,84,67,65,3,'2016-08-31 17:02:29','2016-08-31 17:02:29'),(29,'Edgar',6,2,24,1,3,4,'Machine Killer',1996,90,83,76,71,73,3,'2016-08-31 17:04:12','2016-08-31 17:04:12'),(30,'Fran',9,7,25,2,3,4,'Cleanse',1792,86,75,75,76,78,1,'2016-08-31 17:05:44','2016-08-31 17:05:44'),(31,'Shantotto',8,8,26,2,3,4,'MAG +30%',1642,132,59,59,93,85,3,'2016-08-31 17:07:38','2016-08-31 17:07:38'),(32,'Rydia',4,2,27,2,3,4,'Blizzaga',1523,127,62,58,93,85,2,'2016-08-31 17:12:27','2016-08-31 17:12:27');
/*!40000 ALTER TABLE `units` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-31 18:15:41
