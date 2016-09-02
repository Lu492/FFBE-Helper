# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.13-log)
# Database: ffbe
# Generation Time: 2016-09-02 16:07:03 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table acquires
# ------------------------------------------------------------

DROP TABLE IF EXISTS `acquires`;

CREATE TABLE `acquires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `level` int(11) DEFAULT '1',
  `rarity` int(11) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_acquired_units_idx` (`unit_id`),
  KEY `fk_acquired_users` (`user_id`),
  CONSTRAINT `fk_acquired_units` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_acquired_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `acquires` WRITE;
/*!40000 ALTER TABLE `acquires` DISABLE KEYS */;

INSERT INTO `acquires` (`id`, `user_id`, `unit_id`, `level`, `rarity`, `created`, `modified`)
VALUES
	(1,1,1,63,5,'2016-09-02 09:57:35','2016-09-02 09:57:35'),
	(3,1,2,59,4,'2016-09-02 13:22:16','2016-09-02 13:22:16'),
	(4,1,76,49,4,'2016-09-02 13:23:24','2016-09-02 13:23:24'),
	(5,1,3,27,4,'2016-09-02 13:23:45','2016-09-02 13:23:45'),
	(6,1,28,30,4,'2016-09-02 13:24:00','2016-09-02 13:24:00'),
	(7,1,52,47,4,'2016-09-02 13:24:14','2016-09-02 13:24:14'),
	(8,1,60,24,4,'2016-09-02 13:27:51','2016-09-02 13:27:51'),
	(9,1,23,18,3,'2016-09-02 13:28:03','2016-09-02 13:28:03'),
	(10,1,31,17,3,'2016-09-02 13:28:15','2016-09-02 13:28:15'),
	(11,1,7,15,2,'2016-09-02 13:28:24','2016-09-02 13:28:24'),
	(12,1,8,13,2,'2016-09-02 13:28:36','2016-09-02 13:28:36'),
	(13,1,16,9,2,'2016-09-02 13:28:47','2016-09-02 13:28:47'),
	(14,1,56,23,2,'2016-09-02 13:28:57','2016-09-02 13:28:57'),
	(15,1,57,19,2,'2016-09-02 13:29:06','2016-09-02 13:29:06'),
	(16,1,27,10,4,'2016-09-02 13:29:17','2016-09-02 13:29:17'),
	(17,1,33,60,4,'2016-09-02 13:29:27','2016-09-02 13:29:27'),
	(18,1,35,60,4,'2016-09-02 13:29:40','2016-09-02 13:29:40'),
	(19,1,37,8,4,'2016-09-02 13:29:52','2016-09-02 13:29:52'),
	(20,1,66,60,4,'2016-09-02 13:30:02','2016-09-02 13:30:02'),
	(21,1,78,1,4,'2016-09-02 13:30:16','2016-09-02 13:30:16'),
	(22,1,13,1,3,'2016-09-02 13:30:26','2016-09-02 13:30:26'),
	(23,1,15,40,3,'2016-09-02 13:30:35','2016-09-02 13:30:35'),
	(24,1,18,1,3,'2016-09-02 13:30:47','2016-09-02 13:30:47'),
	(25,1,19,1,3,'2016-09-02 13:30:58','2016-09-02 13:30:58'),
	(26,1,20,13,3,'2016-09-02 13:31:09','2016-09-02 13:31:09'),
	(27,1,26,1,3,'2016-09-02 13:31:20','2016-09-02 13:31:20'),
	(28,1,29,1,3,'2016-09-02 13:31:30','2016-09-02 13:31:30'),
	(29,1,30,7,3,'2016-09-02 13:31:41','2016-09-02 13:31:41'),
	(30,1,32,14,3,'2016-09-02 13:31:50','2016-09-02 13:31:50'),
	(31,1,36,1,3,'2016-09-02 13:32:00','2016-09-02 13:32:00'),
	(32,1,55,10,3,'2016-09-02 13:32:09','2016-09-02 13:32:09'),
	(33,1,58,1,3,'2016-09-02 13:32:29','2016-09-02 13:32:29'),
	(34,1,4,30,2,'2016-09-02 13:37:15','2016-09-02 13:37:15'),
	(35,1,5,30,2,'2016-09-02 13:37:51','2016-09-02 13:37:51'),
	(36,1,6,30,2,'2016-09-02 13:38:00','2016-09-02 13:38:00'),
	(37,1,9,30,2,'2016-09-02 13:38:11','2016-09-02 13:38:11'),
	(38,1,10,30,2,'2016-09-02 13:38:20','2016-09-02 13:38:20'),
	(39,1,11,30,2,'2016-09-02 13:38:29','2016-09-02 13:38:29'),
	(40,1,12,1,2,'2016-09-02 13:38:37','2016-09-02 13:38:37'),
	(41,1,14,1,2,'2016-09-02 13:38:45','2016-09-02 13:38:45'),
	(42,1,17,1,2,'2016-09-02 13:38:53','2016-09-02 13:38:53'),
	(43,1,53,7,1,'2016-09-02 13:39:01','2016-09-02 13:39:01');

/*!40000 ALTER TABLE `acquires` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table genders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `genders`;

CREATE TABLE `genders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `genders` WRITE;
/*!40000 ALTER TABLE `genders` DISABLE KEYS */;

INSERT INTO `genders` (`id`, `name`, `created`, `modified`)
VALUES
	(1,'Male','2016-08-31 15:57:03','2016-08-31 15:57:03'),
	(2,'Female','2016-08-31 17:00:11','2016-08-31 17:00:11');

/*!40000 ALTER TABLE `genders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;

INSERT INTO `jobs` (`id`, `name`, `created`, `modified`)
VALUES
	(2,'Black Mage','2016-08-31 15:57:03','2016-08-31 15:57:03'),
	(3,'Knight','2016-08-31 17:01:11','2016-08-31 17:01:11'),
	(4,'White Magus','2016-08-31 17:01:59','2016-08-31 17:01:59'),
	(5,'Warrior','2016-08-31 17:04:23','2016-08-31 17:04:23'),
	(6,'White Mage','2016-08-31 17:05:16','2016-08-31 17:05:16'),
	(7,'Thief','2016-08-31 16:14:15','2016-08-31 16:14:15'),
	(8,'Monk','2016-08-31 16:16:53','2016-08-31 16:16:53'),
	(9,'Ranger','2016-08-31 16:18:04','2016-08-31 16:18:04'),
	(10,'Gunner','2016-08-31 16:19:02','2016-08-31 16:19:02'),
	(11,'Bard','2016-08-31 16:21:15','2016-08-31 16:21:15'),
	(12,'Imperial','2016-08-31 16:22:35','2016-08-31 16:22:35'),
	(13,'Bandit','2016-08-31 16:39:54','2016-08-31 16:39:54'),
	(14,'High Priest','2016-08-31 16:41:53','2016-08-31 16:41:53'),
	(15,'Songstress','2016-08-31 16:44:30','2016-08-31 16:44:30'),
	(16,'Samurai','2016-08-31 16:47:13','2016-08-31 16:47:13'),
	(17,'Green Mage','2016-08-31 16:48:32','2016-08-31 16:48:32'),
	(18,'Spellblade','2016-08-31 16:49:43','2016-08-31 16:49:43'),
	(19,'Salve-maker','2016-08-31 16:51:48','2016-08-31 16:51:48'),
	(20,'Dancer','2016-08-31 16:55:33','2016-08-31 16:55:33'),
	(21,'Assassin','2016-08-31 16:59:36','2016-08-31 16:59:36'),
	(22,'Red Mage','2016-08-31 17:00:54','2016-08-31 17:00:54'),
	(23,'Dragoon','2016-08-31 17:02:29','2016-08-31 17:02:29'),
	(24,'Machinist','2016-08-31 17:04:12','2016-08-31 17:04:12'),
	(25,'Sky Pirate','2016-08-31 17:05:44','2016-08-31 17:05:44'),
	(26,'Professor','2016-08-31 17:07:38','2016-08-31 17:07:38'),
	(27,'Summoner','2016-08-31 17:12:27','2016-08-31 17:12:27'),
	(28,'Chaos Knight','2016-09-01 08:43:20','2016-09-01 08:43:20'),
	(29,'Dark Mage','2016-09-01 08:45:56','2016-09-01 08:45:56'),
	(30,'Reaper','2016-09-01 08:48:06','2016-09-01 08:48:06'),
	(31,'Ravager','2016-09-01 08:50:54','2016-09-01 08:50:54'),
	(32,'Paladin','2016-09-01 08:52:48','2016-09-01 08:52:48'),
	(33,'Magic Warrior','2016-09-01 08:54:11','2016-09-01 08:54:11'),
	(34,'Adventurer','2016-09-01 08:59:49','2016-09-01 08:59:49'),
	(35,'Warmage','2016-09-01 09:09:17','2016-09-01 09:09:17'),
	(36,'Black Belt','2016-09-01 09:15:08','2016-09-01 09:15:08'),
	(37,'Viking','2016-09-01 09:16:15','2016-09-01 09:16:15'),
	(38,'Gladiator','2016-09-01 09:19:58','2016-09-01 09:19:58'),
	(39,'Ninja','2016-09-01 09:20:53','2016-09-01 09:20:53'),
	(40,'Mage','2016-09-01 09:22:55','2016-09-01 09:22:55'),
	(41,'General','2016-09-01 09:29:37','2016-09-01 09:29:37'),
	(42,'Rune Knight','2016-09-01 09:31:49','2016-09-01 09:31:49'),
	(43,'Archmage','2016-09-01 09:33:07','2016-09-01 09:33:07'),
	(44,'Warrior of Light','2016-09-01 09:36:59','2016-09-01 09:36:59'),
	(45,'Sage','2016-09-01 09:38:36','2016-09-01 09:38:36'),
	(46,'Princess','2016-09-01 09:39:48','2016-09-01 09:39:48');

/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table origins
# ------------------------------------------------------------

DROP TABLE IF EXISTS `origins`;

CREATE TABLE `origins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `shortname` varchar(45) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `origins` WRITE;
/*!40000 ALTER TABLE `origins` DISABLE KEYS */;

INSERT INTO `origins` (`id`, `name`, `shortname`, `created`, `modified`)
VALUES
	(1,'Final Fantasy I','FF 1','2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(2,'Final Fantasy II','FF 2','2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(3,'Final Fantasy III','FF 3','2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(4,'Final Fantasy IV','FF 4','2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(5,'Final Fantasy V','FF 5','2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(6,'Final Fantasy VI','FF 6','2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(7,'Final Fantasy IX','FF 9','2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(8,'Final Fantasy XI','FF 11','2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(9,'Final Fantasy XII','FF 12','2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(10,'Final Fantasy Brave Exvius','FF BE','2016-08-31 16:00:00','2016-08-31 16:00:00');

/*!40000 ALTER TABLE `origins` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table practises
# ------------------------------------------------------------

DROP TABLE IF EXISTS `practises`;

CREATE TABLE `practises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_id` int(11) NOT NULL,
  `specialisation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index2` (`unit_id`,`specialisation_id`),
  KEY `fk_units_specialisations_idx` (`specialisation_id`),
  CONSTRAINT `fk_units_practises` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_units_specialisations` FOREIGN KEY (`specialisation_id`) REFERENCES `specialisations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `practises` WRITE;
/*!40000 ALTER TABLE `practises` DISABLE KEYS */;

INSERT INTO `practises` (`id`, `unit_id`, `specialisation_id`)
VALUES
	(1,1,2),
	(2,1,5),
	(3,2,5),
	(4,3,1),
	(5,3,2),
	(6,4,5),
	(7,5,1),
	(8,6,4),
	(9,7,2),
	(10,8,5),
	(11,9,1),
	(12,10,5),
	(13,11,2),
	(14,12,4),
	(15,13,4),
	(16,14,2),
	(17,15,1),
	(18,16,2),
	(19,17,5),
	(20,18,5),
	(21,19,2),
	(22,20,3),
	(23,21,1),
	(24,21,2),
	(25,22,4),
	(26,23,2),
	(27,24,1),
	(28,25,5),
	(29,26,2),
	(30,27,1),
	(31,27,4),
	(32,28,5),
	(33,29,2),
	(34,29,5),
	(35,30,1),
	(36,30,2),
	(37,31,4),
	(38,32,4),
	(39,33,5),
	(40,34,1),
	(41,35,1),
	(42,35,4),
	(43,36,5),
	(44,37,2),
	(45,37,3),
	(46,38,5),
	(47,39,4),
	(48,40,4),
	(49,41,2),
	(50,41,5),
	(51,42,1),
	(52,42,7),
	(53,43,1),
	(54,43,4),
	(55,44,4),
	(56,45,5),
	(57,46,5),
	(58,47,2),
	(59,48,2),
	(60,49,2),
	(61,49,5),
	(62,50,2),
	(63,51,1),
	(64,52,5),
	(65,53,2),
	(66,54,4),
	(67,55,5),
	(68,56,7),
	(69,57,1),
	(70,57,5),
	(71,58,5),
	(72,59,2),
	(73,60,2),
	(74,60,7),
	(75,61,2),
	(76,62,4),
	(77,63,4),
	(78,64,2),
	(79,64,5),
	(80,65,5),
	(81,66,2),
	(82,66,5),
	(83,67,5),
	(84,67,7),
	(85,68,2),
	(86,69,2),
	(87,69,4),
	(88,70,4),
	(89,71,2),
	(90,71,3),
	(91,72,5),
	(92,73,2),
	(93,74,2),
	(94,74,7),
	(95,75,1),
	(96,75,4),
	(97,76,1),
	(98,76,2),
	(99,77,7),
	(100,78,4),
	(101,79,1),
	(102,80,5);

/*!40000 ALTER TABLE `practises` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table races
# ------------------------------------------------------------

DROP TABLE IF EXISTS `races`;

CREATE TABLE `races` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `races` WRITE;
/*!40000 ALTER TABLE `races` DISABLE KEYS */;

INSERT INTO `races` (`id`, `name`, `created`, `modified`)
VALUES
	(2,'Human','2016-08-31 15:57:03','2016-08-31 15:57:03'),
	(12,'Reaper','2016-09-02 08:27:10','2016-09-02 08:27:10');

/*!40000 ALTER TABLE `races` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table rarities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rarities`;

CREATE TABLE `rarities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stars` int(1) NOT NULL DEFAULT '1',
  `max_level` int(11) NOT NULL DEFAULT '10',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`max_level`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `rarities` WRITE;
/*!40000 ALTER TABLE `rarities` DISABLE KEYS */;

INSERT INTO `rarities` (`id`, `stars`, `max_level`, `created`, `modified`)
VALUES
	(1,1,15,'2016-09-02 12:08:11','2016-09-02 12:08:11'),
	(2,2,30,'2016-09-02 12:08:16','2016-09-02 12:08:16'),
	(3,3,40,'2016-09-02 12:08:24','2016-09-02 12:08:24'),
	(4,4,60,'2016-09-02 12:08:30','2016-09-02 12:08:30'),
	(5,5,80,'2016-09-02 12:08:36','2016-09-02 12:08:36');

/*!40000 ALTER TABLE `rarities` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table specialisations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `specialisations`;

CREATE TABLE `specialisations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `specialisations` WRITE;
/*!40000 ALTER TABLE `specialisations` DISABLE KEYS */;

INSERT INTO `specialisations` (`id`, `name`, `created`, `modified`)
VALUES
	(1,'Healing','2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(2,'Support','2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(3,'Hybrid damage','2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(4,'Magic damage','2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(5,'Physical damage','2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(7,'Tank','2016-08-31 16:00:00','2016-08-31 16:00:00');

/*!40000 ALTER TABLE `specialisations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table units
# ------------------------------------------------------------

DROP TABLE IF EXISTS `units`;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `units` WRITE;
/*!40000 ALTER TABLE `units` DISABLE KEYS */;

INSERT INTO `units` (`id`, `name`, `origin_id`, `race_id`, `job_id`, `gender_id`, `base_rarity`, `max_rarity`, `trust_master_reward`, `hp`, `mp`, `atk`, `def`, `mag`, `spr`, `hits`, `created`, `modified`)
VALUES
	(1,'Rain',10,2,3,1,2,5,'',2488,97,89,88,86,80,2,'2016-08-31 15:05:27','2016-08-31 15:05:27'),
	(2,'Laswell',10,2,3,1,2,5,'',2349,100,96,82,89,74,1,'2016-08-31 15:06:50','2016-08-31 15:06:50'),
	(3,'Fina',10,2,4,2,2,5,'',1867,131,79,79,93,101,1,'2016-08-31 15:07:39','2016-08-31 15:07:39'),
	(4,'Rizer',10,2,5,1,1,2,'HP +10%',1108,40,47,44,31,35,1,'2016-08-31 15:08:32','2016-08-31 15:08:32'),
	(5,'Leah',10,2,6,2,1,2,'Banish',796,54,31,30,41,48,1,'2016-08-31 15:10:18','2016-08-31 15:10:18'),
	(6,'Tronn',10,2,2,1,1,2,'Fira',801,57,30,33,47,43,1,'2016-08-31 15:57:03','2016-08-31 15:57:03'),
	(7,'Eldin',10,2,7,1,1,2,'Pilfer',883,41,43,37,34,36,4,'2016-08-31 16:14:15','2016-08-31 16:14:15'),
	(8,'Baurg',10,2,8,1,1,2,'Store',1201,39,45,52,27,31,3,'2016-08-31 16:16:53','2016-08-31 16:16:53'),
	(9,'Gimlee',10,2,9,1,1,2,'Aim',827,46,40,36,39,34,1,'2016-08-31 16:18:04','2016-08-31 16:18:04'),
	(10,'Maxell',10,2,10,1,1,2,'Power Shot',864,44,47,32,38,36,1,'2016-08-31 16:19:02','2016-08-31 16:19:02'),
	(11,'Liza',10,2,11,2,1,2,'Lullaby',782,51,35,34,39,41,2,'2016-08-31 16:21:15','2016-08-31 16:21:15'),
	(12,'Wedge',6,2,12,1,2,3,'Fire Beam',1162,56,50,51,41,43,3,'2016-08-31 16:22:35','2016-08-31 16:22:35'),
	(13,'Biggs',6,2,12,1,2,3,'Blizzard Beam',1168,59,51,50,42,42,3,'2016-08-31 16:29:48','2016-08-31 16:29:48'),
	(14,'Paul',2,2,13,1,2,3,'Escape',1133,55,52,45,44,44,1,'2016-08-31 16:39:54','2016-08-31 16:39:54'),
	(15,'Anastasis',9,2,14,1,2,3,'Regen',1001,70,35,36,55,58,2,'2016-08-31 16:41:53','2016-08-31 16:41:53'),
	(16,'Sarah',1,2,15,2,2,3,'Paean',998,63,37,34,54,58,1,'2016-08-31 16:44:30','2016-08-31 16:44:30'),
	(17,'King Giott',4,2,5,1,2,3,'Stone Killer',1353,48,61,51,33,35,1,'2016-08-31 16:45:56','2016-08-31 16:45:56'),
	(18,'Shiki',10,2,16,1,2,3,'Tranquility',1224,53,59,37,35,42,1,'2016-08-31 16:47:13','2016-08-31 16:47:13'),
	(19,'Mizell',10,2,17,1,2,3,'Deprotect',1008,69,45,45,53,53,1,'2016-08-31 16:48:32','2016-08-31 16:48:32'),
	(20,'Ronaldo',10,2,18,1,2,3,'Drain Blade',1218,65,52,46,54,54,2,'2016-08-31 16:49:43','2016-08-31 16:49:43'),
	(21,'Mel',10,2,19,2,2,3,'Drink',978,72,38,44,48,49,2,'2016-08-31 16:51:48','2016-08-31 16:51:48'),
	(22,'Vivi',7,2,2,1,3,4,'Firaga',1504,111,59,63,92,85,1,'2016-08-31 16:53:52','2016-08-31 16:53:52'),
	(23,'Penelo',9,2,20,2,3,4,'Equip S Sword',1607,91,67,61,79,78,1,'2016-08-31 16:55:33','2016-08-31 16:55:33'),
	(24,'Maria',2,2,6,2,3,4,'Esuna',1489,95,65,58,78,85,3,'2016-08-31 16:57:12','2016-08-31 16:57:12'),
	(25,'Sabin',6,2,8,2,3,4,'Counter',2250,79,90,82,61,58,4,'2016-08-31 16:58:27','2016-08-31 16:58:27'),
	(26,'Shadow',6,2,21,1,3,4,'Throw',1896,88,89,76,73,68,2,'2016-08-31 16:59:36','2016-08-31 16:59:36'),
	(27,'Krile',5,2,22,2,3,4,'Thundaga',1651,98,64,66,81,73,1,'2016-08-31 17:00:54','2016-08-31 17:00:54'),
	(28,'Kain',4,2,23,1,3,4,'Gungnir',2090,85,89,84,67,65,3,'2016-08-31 17:02:29','2016-08-31 17:02:29'),
	(29,'Edgar',6,2,24,1,3,4,'Machine Killer',1996,90,83,76,71,73,3,'2016-08-31 17:04:12','2016-08-31 17:04:12'),
	(30,'Fran',9,2,25,2,3,4,'Cleanse',1792,86,75,75,76,78,1,'2016-08-31 17:05:44','2016-08-31 17:05:44'),
	(31,'Shantotto',8,2,26,2,3,4,'MAG +30%',1642,132,59,59,93,85,3,'2016-08-31 17:07:38','2016-08-31 17:07:38'),
	(32,'Rydia',4,2,27,2,3,4,'Blizzaga',1523,127,62,58,93,85,2,'2016-08-31 17:12:27','2016-08-31 17:12:27'),
	(33,'Cyan',6,2,16,1,3,4,'Evade',2017,85,90,80,63,61,1,'2016-09-01 08:37:13','2016-09-01 08:37:13'),
	(34,'Clyne',10,2,3,1,3,4,'Cover',2204,85,82,85,69,68,2,'2016-09-01 08:38:16','2016-09-01 08:38:16'),
	(35,'Anzelm',10,2,22,1,3,4,'Drain',1739,88,78,69,81,71,2,'2016-09-01 08:40:02','2016-09-01 08:40:02'),
	(36,'Luna',10,2,9,2,3,4,'Barrage',1648,87,80,70,70,73,1,'2016-09-01 08:40:52','2016-09-01 08:40:52'),
	(37,'Bedile',10,2,18,1,3,4,'Thundaga Blade',1784,85,79,73,77,71,3,'2016-09-01 08:41:52','2016-09-01 08:41:52'),
	(38,'Garland',1,2,28,1,3,5,'Equip L Sword',2730,110,113,106,85,78,1,'2016-09-01 08:43:20','2016-09-01 08:44:00'),
	(39,'Exdeath',5,2,29,1,3,5,'Holy',2401,145,90,84,112,95,1,'2016-09-01 08:45:56','2016-09-01 08:45:56'),
	(40,'Kuja',7,2,30,1,3,5,'Flare',2482,124,105,89,106,81,3,'2016-09-01 08:48:06','2016-09-01 08:48:06'),
	(41,'Cloud of Darkness',3,12,31,2,3,5,'Auto-Limit',2574,113,115,102,89,77,1,'2016-09-01 08:50:54','2016-09-01 08:50:54'),
	(42,'Cecil',4,2,32,1,3,5,'Excalibur',2800,110,97,109,85,88,2,'2016-09-01 08:52:48','2016-09-01 08:52:48'),
	(43,'Terra',6,2,33,2,3,5,'Ultima',2127,120,94,81,109,95,1,'2016-09-01 08:54:11','2016-09-01 08:54:11'),
	(44,'Magitek Armor Terra',6,2,12,2,3,4,'',1752,79,79,67,71,59,3,'2016-09-01 08:58:17','2016-09-01 08:58:17'),
	(45,'Bartz',5,2,34,1,3,5,'Doublehand',2650,115,95,96,94,91,2,'2016-09-01 08:59:49','2016-09-01 08:59:49'),
	(46,'Firion',2,2,5,1,3,5,'Equip H Armor',2721,110,102,99,88,88,2,'2016-09-01 09:00:43','2016-09-01 09:02:09'),
	(47,'Zidane',7,2,13,1,3,5,'Dual Wield',2527,109,104,99,87,85,3,'2016-09-01 09:03:44','2016-09-01 09:03:44'),
	(48,'Vaan',9,2,5,1,3,5,'Maximillian',2639,110,99,97,87,88,2,'2016-09-01 09:04:52','2016-09-01 09:04:52'),
	(49,'Duane',10,2,35,1,3,5,'Bioga Blade',2360,127,96,84,104,85,1,'2016-09-01 09:09:17','2016-09-01 09:09:17'),
	(50,'Cerius',10,2,17,2,3,5,'Miracle Shoes',2001,138,82,90,97,98,1,'2016-09-01 09:10:20','2016-09-01 09:10:20'),
	(51,'Roselia',10,2,4,2,3,5,'Equip Staff',1955,143,77,81,89,114,1,'2016-09-01 09:11:29','2016-09-01 09:11:29'),
	(52,'Medius',10,2,10,1,3,5,'Growth Egg',2264,102,106,84,91,84,6,'2016-09-01 09:12:19','2016-09-01 09:12:19'),
	(53,'Sarai',10,2,20,2,1,2,'Silence Dance',815,48,39,35,37,37,2,'2016-09-01 09:13:11','2016-09-01 09:13:11'),
	(54,'Paula',10,2,2,2,2,3,'Stonra',981,69,36,35,61,51,1,'2016-09-01 09:14:05','2016-09-01 09:14:05'),
	(55,'Kenyu',10,2,36,1,2,3,'Raging Fist',1282,45,59,44,36,38,5,'2016-09-01 09:15:08','2016-09-01 09:15:08'),
	(56,'Ollie',10,2,37,1,2,3,'Aquan Killer',1184,47,53,60,34,38,1,'2016-09-01 09:16:15','2016-09-01 09:16:15'),
	(57,'Carrie',10,2,24,2,2,3,'Sunbeam',1055,61,55,41,43,44,3,'2016-09-01 09:17:02','2016-09-01 09:17:02'),
	(58,'Skaha',10,2,23,2,2,3,'Dragon Killer',1157,62,64,48,48,47,1,'2016-09-01 09:17:53','2016-09-01 09:17:53'),
	(59,'Montana',10,2,34,1,2,3,'Camoflage',1181,58,55,51,43,45,2,'2016-09-01 09:19:01','2016-09-01 09:19:01'),
	(60,'Russell',10,2,38,1,3,4,'Bladeblitz',1834,86,90,79,65,55,3,'2016-09-01 09:19:58','2016-09-01 09:19:58'),
	(61,'Miyuki',10,2,39,2,3,5,'Sakurafubuki',2185,118,100,80,100,83,3,'2016-09-01 09:20:53','2016-09-01 09:20:53'),
	(62,'Golbez',4,2,40,1,3,5,'Meteor',2703,140,88,85,109,108,3,'2016-09-01 09:22:55','2016-09-01 09:22:55'),
	(63,'Galuf',5,2,5,1,3,4,'Comet',2127,94,81,69,80,66,2,'2016-09-01 09:24:19','2016-09-01 09:24:19'),
	(64,'Xiao',10,2,8,2,3,5,'Kaiser Knuckles',2753,105,101,98,86,86,3,'2016-09-01 09:25:14','2016-09-01 09:25:14'),
	(65,'Artemios',10,2,9,1,3,5,'Equip Bow',2090,126,101,82,95,88,3,'2016-09-01 09:26:27','2016-09-01 09:26:27'),
	(66,'Locke',6,2,34,1,3,5,'Rising Sun',2582,110,100,92,89,88,4,'2016-09-01 09:27:33','2016-09-01 09:27:33'),
	(67,'Leo',6,2,41,1,3,5,'Aegis Shield',2715,105,111,100,79,80,1,'2016-09-01 09:29:37','2016-09-01 09:29:37'),
	(68,'Gilbert',10,2,11,1,3,5,'Dream Harp',2222,96,88,80,100,97,2,'2016-09-01 09:30:38','2016-09-01 09:30:38'),
	(69,'Celes',6,2,42,2,3,5,'Minerva Bustier',2318,115,100,82,104,91,2,'2016-09-01 09:31:49','2016-09-01 09:31:49'),
	(70,'Kefka',6,2,43,1,3,5,'Ribbon',2115,150,83,79,116,109,2,'2016-09-01 09:33:07','2016-09-01 09:33:07'),
	(71,'Rakshasa',10,2,18,2,3,5,'Holy Blade',2257,118,93,85,100,86,1,'2016-09-01 09:34:09','2016-09-01 09:34:09'),
	(72,'Chizuru',10,2,16,2,4,5,'Blade Mastery',2536,103,120,99,83,82,2,'2016-09-01 09:35:00','2016-09-01 09:35:00'),
	(73,'Hayate',10,2,39,1,3,5,'Black Cowl',2305,96,113,84,93,76,2,'2016-09-01 09:35:47','2016-09-01 09:35:47'),
	(74,'Warrior of Light',1,2,44,1,4,5,'Light\'s Blessing',2713,119,100,95,97,96,3,'2016-09-01 09:36:59','2016-09-01 09:36:59'),
	(75,'Tellah',4,2,45,1,3,5,'MP +30%',2117,129,75,78,110,105,1,'2016-09-01 09:38:36','2016-09-01 09:38:36'),
	(76,'Lenna',5,2,46,2,3,5,'Magi Staff',2162,130,85,86,88,107,1,'2016-09-01 09:39:48','2016-09-01 09:39:48'),
	(77,'Amarant',7,2,8,1,3,5,'HP +30%',2760,101,108,100,80,80,1,'2016-09-01 09:41:32','2016-09-01 09:41:32'),
	(78,'Lani',7,2,9,2,3,4,'Equip Axe',1650,95,80,68,84,76,1,'2016-09-01 09:42:22','2016-09-01 09:42:22'),
	(79,'Garnet',7,2,46,2,4,5,'Melody of Life',2142,144,86,84,99,117,1,'2016-09-01 09:44:44','2016-09-01 09:44:44'),
	(80,'Freya',7,2,23,2,3,5,'Angel Earrings',2545,112,103,93,86,90,1,'2016-09-01 09:46:56','2016-09-01 09:46:56');

/*!40000 ALTER TABLE `units` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created`, `modified`)
VALUES
	(1,'neon1024','neon1024@gmail.com','$2y$10$ixhzYG0hPl7kpselsbkqyelWDnPRvphjgXHUsY3RFFkoeWbat6gsC','admin','2016-09-01 16:32:15','2016-09-01 16:32:15');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
