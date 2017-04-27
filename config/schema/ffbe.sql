# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.17-log)
# Database: ffbe
# Generation Time: 2017-04-27 13:24:46 +0000
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
  `rarity_id` int(11) NOT NULL DEFAULT '1',
  `trust` float NOT NULL DEFAULT '0',
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

INSERT INTO `acquires` (`id`, `user_id`, `unit_id`, `level`, `rarity_id`, `trust`, `created`, `modified`)
VALUES
	(1,1,1,68,5,0,'2016-09-02 09:57:35','2017-04-27 13:01:59'),
	(3,1,2,25,5,0,'2016-09-02 13:22:16','2016-09-06 08:51:44'),
	(4,1,76,80,5,20.9,'2016-09-02 13:23:24','2016-10-07 15:06:05'),
	(5,1,3,80,5,0,'2016-09-02 13:23:45','2016-10-07 15:13:31'),
	(6,1,28,38,4,50.5,'2016-09-02 13:24:00','2017-04-27 13:01:08'),
	(7,1,52,48,5,19.1,'2016-09-02 13:24:14','2017-04-27 13:00:35'),
	(8,1,60,60,4,26.7,'2016-09-02 13:27:51','2017-04-27 13:14:18'),
	(9,1,23,25,3,10.3,'2016-09-02 13:28:03','2016-11-10 18:55:58'),
	(10,1,31,26,4,15.6,'2016-09-02 13:28:15','2017-04-27 13:18:53'),
	(11,1,7,15,2,60,'2016-09-02 13:28:24','2017-04-27 13:23:14'),
	(12,1,8,20,2,75,'2016-09-02 13:28:36','2017-04-27 13:23:02'),
	(13,1,16,25,3,45.3,'2016-09-02 13:28:47','2017-04-27 13:21:30'),
	(14,1,56,12,3,20.4,'2016-09-02 13:28:57','2017-04-27 13:15:10'),
	(15,1,57,14,3,30.6,'2016-09-02 13:29:06','2017-04-27 13:14:58'),
	(16,1,27,52,4,41.5,'2016-09-02 13:29:17','2017-04-27 13:01:47'),
	(17,1,33,60,4,28.4,'2016-09-02 13:29:27','2017-04-27 13:18:29'),
	(18,1,35,60,4,33.8,'2016-09-02 13:29:40','2017-04-27 13:17:33'),
	(19,1,37,10,4,10,'2016-09-02 13:29:52','2016-12-02 13:00:11'),
	(20,1,66,49,5,26.6,'2016-09-02 13:30:02','2017-04-27 13:00:04'),
	(21,1,78,10,4,10.4,'2016-09-02 13:30:16','2017-04-27 13:11:11'),
	(22,1,13,19,3,25,'2016-09-02 13:30:26','2017-04-27 13:22:05'),
	(23,1,15,40,3,31.5,'2016-09-02 13:30:35','2017-04-27 13:21:42'),
	(24,1,18,11,3,25.3,'2016-09-02 13:30:47','2017-04-27 13:21:07'),
	(25,1,19,21,3,45.1,'2016-09-02 13:30:58','2017-04-27 13:20:54'),
	(26,1,20,18,3,50,'2016-09-02 13:31:09','2017-04-27 13:20:39'),
	(27,1,26,12,3,25,'2016-09-02 13:31:20','2017-04-27 13:19:26'),
	(28,1,29,12,3,20,'2016-09-02 13:31:30','2017-04-27 13:19:14'),
	(29,1,30,20,4,40.2,'2016-09-02 13:31:41','2017-04-27 13:19:03'),
	(30,1,32,19,3,25.1,'2016-09-02 13:31:50','2017-04-27 13:18:42'),
	(31,1,36,11,3,15,'2016-09-02 13:32:00','2017-04-27 13:17:22'),
	(32,1,55,18,3,55.1,'2016-09-02 13:32:09','2017-04-27 13:15:21'),
	(33,1,58,40,3,10.2,'2016-09-02 13:32:29','2017-04-27 13:14:44'),
	(34,1,4,21,2,80,'2016-09-02 13:37:15','2017-04-27 13:23:44'),
	(35,1,5,19,2,60,'2016-09-02 13:37:51','2017-04-27 13:23:34'),
	(36,1,6,15,2,35,'2016-09-02 13:38:00','2017-04-27 13:23:24'),
	(37,1,9,13,2,65,'2016-09-02 13:38:11','2017-04-27 13:22:51'),
	(38,1,10,13,2,65,'2016-09-02 13:38:20','2017-04-27 13:22:40'),
	(39,1,11,17,2,60,'2016-09-02 13:38:29','2017-04-27 13:22:28'),
	(40,1,12,13,3,25.2,'2016-09-02 13:38:37','2017-04-27 13:22:17'),
	(41,1,14,9,3,10.2,'2016-09-02 13:38:45','2017-04-27 13:21:53'),
	(42,1,17,40,3,35.8,'2016-09-02 13:38:53','2017-04-27 13:21:19'),
	(43,1,53,17,2,65,'2016-09-02 13:39:01','2017-04-27 13:15:45'),
	(44,1,69,52,5,23.9,'2016-09-05 14:20:38','2017-04-27 13:13:11'),
	(45,1,67,58,5,10.6,'2016-09-06 08:40:40','2017-04-27 12:59:34'),
	(46,1,80,20,3,25.1,'2016-09-06 09:02:57','2017-04-27 13:11:36'),
	(49,1,59,24,3,55.1,'2016-09-09 11:59:09','2017-04-27 13:14:33'),
	(50,1,81,23,5,0.2,'2016-09-16 09:02:28','2016-12-02 12:53:27'),
	(51,1,54,22,3,40.1,'2016-09-16 09:06:43','2017-04-27 13:15:32'),
	(52,1,21,20,3,30.1,'2016-09-16 09:07:12','2017-04-27 13:20:26'),
	(53,1,41,100,6,32.8,'2016-09-16 09:21:37','2017-04-27 12:57:10'),
	(54,1,22,9,4,10,'2016-09-16 09:22:17','2017-04-27 13:20:14'),
	(55,1,75,41,5,18.4,'2016-10-07 15:07:42','2017-04-27 13:12:11'),
	(56,1,84,27,3,20.3,'2016-10-07 15:10:49','2017-04-27 13:10:42'),
	(57,1,61,6,4,35.2,'2016-10-07 15:11:55','2017-04-27 13:00:21'),
	(58,1,25,12,4,25,'2016-10-07 15:15:13','2017-04-27 13:19:36'),
	(59,1,63,8,5,15,'2016-10-07 15:18:37','2017-04-27 13:06:05'),
	(60,1,85,20,4,10,'2016-10-07 15:20:43','2017-04-27 13:10:13'),
	(61,1,124,100,6,54.2,'2016-11-10 18:45:33','2017-04-27 12:57:47'),
	(62,1,119,1,4,0,'2016-11-10 18:45:54','2017-04-27 13:08:23'),
	(63,1,42,100,6,62.6,'2016-11-10 18:47:50','2017-04-27 12:58:01'),
	(64,1,123,48,4,16.4,'2016-11-10 18:48:27','2017-04-27 12:57:30'),
	(65,1,128,24,4,0.1,'2016-11-10 18:49:20','2017-04-27 12:54:29'),
	(66,1,129,12,3,5,'2016-11-10 18:49:56','2016-12-02 12:51:48'),
	(67,1,34,10,3,5,'2016-11-10 18:50:15','2017-04-27 13:18:16'),
	(68,1,51,8,3,0,'2016-11-10 18:50:31','2016-12-02 12:54:32'),
	(69,1,117,41,4,6.4,'2016-11-10 18:52:26','2017-04-27 13:10:28'),
	(70,1,71,6,4,5,'2016-11-10 19:02:00','2017-04-27 13:12:57'),
	(71,1,122,52,4,18,'2016-12-02 12:52:47','2017-04-27 13:07:25'),
	(72,1,50,63,6,21.6,'2016-12-02 12:54:48','2017-04-27 13:02:46'),
	(73,1,39,100,6,19.1,'2016-12-02 12:55:37','2017-04-27 12:56:35'),
	(74,1,45,6,4,11.3,'2016-12-02 12:59:47','2017-04-27 13:16:49'),
	(75,1,86,26,4,1.6,'2017-01-03 15:11:47','2017-04-27 12:58:27'),
	(76,1,79,2,4,0,'2017-01-03 15:22:20','2017-04-27 13:11:49'),
	(77,1,141,12,4,20,'2017-01-03 15:23:18','2017-04-27 13:09:29'),
	(78,1,68,8,3,10,'2017-01-03 15:23:34','2017-04-27 13:13:22'),
	(79,1,142,13,3,20.1,'2017-01-03 15:23:56','2017-04-27 13:08:49'),
	(80,1,48,8,3,10,'2017-01-03 15:24:12','2017-04-27 13:16:22'),
	(81,1,38,6,3,5,'2017-01-03 15:24:28','2017-04-27 13:17:00'),
	(82,1,171,56,5,21.1,'2017-04-27 12:54:11','2017-04-27 12:54:11'),
	(83,1,185,23,5,100,'2017-04-27 12:54:49','2017-04-27 12:54:49'),
	(84,1,143,53,5,11.1,'2017-04-27 12:56:54','2017-04-27 12:56:54'),
	(85,1,73,1,3,0,'2017-04-27 12:58:58','2017-04-27 12:58:58'),
	(86,1,70,26,3,0.9,'2017-04-27 12:59:16','2017-04-27 12:59:16'),
	(87,1,43,34,4,11,'2017-04-27 13:00:54','2017-04-27 13:00:54'),
	(88,1,172,13,3,35,'2017-04-27 13:02:13','2017-04-27 13:02:13'),
	(89,1,182,1,3,0,'2017-04-27 13:02:31','2017-04-27 13:02:31'),
	(90,1,186,37,3,100,'2017-04-27 13:03:13','2017-04-27 13:03:13'),
	(91,1,157,7,4,5,'2017-04-27 13:03:28','2017-04-27 13:03:28'),
	(92,1,156,9,3,10,'2017-04-27 13:03:52','2017-04-27 13:03:52'),
	(93,1,161,1,4,0.1,'2017-04-27 13:04:08','2017-04-27 13:04:08'),
	(94,1,169,7,4,7.7,'2017-04-27 13:04:24','2017-04-27 13:04:24'),
	(95,1,167,1,4,0,'2017-04-27 13:04:37','2017-04-27 13:04:37'),
	(96,1,168,49,4,3.9,'2017-04-27 13:04:55','2017-04-27 13:04:55'),
	(97,1,148,1,4,5.1,'2017-04-27 13:05:10','2017-04-27 13:05:10'),
	(98,1,165,38,4,2,'2017-04-27 13:05:32','2017-04-27 13:05:32'),
	(99,1,164,34,4,11.6,'2017-04-27 13:05:48','2017-04-27 13:05:48'),
	(100,1,131,6,3,5.1,'2017-04-27 13:06:18','2017-04-27 13:06:18'),
	(101,1,179,24,4,16.9,'2017-04-27 13:06:58','2017-04-27 13:06:58'),
	(102,1,180,23,4,1.4,'2017-04-27 13:07:13','2017-04-27 13:07:13'),
	(103,1,152,15,4,2.6,'2017-04-27 13:07:39','2017-04-27 13:07:39'),
	(104,1,151,21,4,13.4,'2017-04-27 13:07:57','2017-04-27 13:07:57'),
	(105,1,140,1,3,0,'2017-04-27 13:09:43','2017-04-27 13:09:43'),
	(106,1,89,1,4,0,'2017-04-27 13:10:01','2017-04-27 13:10:01'),
	(107,1,115,1,3,0,'2017-04-27 13:10:57','2017-04-27 13:10:57'),
	(108,1,77,1,3,0,'2017-04-27 13:11:23','2017-04-27 13:11:23'),
	(109,1,74,1,4,0,'2017-04-27 13:12:27','2017-04-27 13:12:27'),
	(110,1,72,9,4,5,'2017-04-27 13:12:42','2017-04-27 13:12:42'),
	(111,1,65,9,3,15,'2017-04-27 13:13:38','2017-04-27 13:13:38'),
	(112,1,64,6,4,10.2,'2017-04-27 13:14:03','2017-04-27 13:14:03'),
	(113,1,49,8,3,10,'2017-04-27 13:16:10','2017-04-27 13:16:10'),
	(114,1,47,11,3,5,'2017-04-27 13:16:35','2017-04-27 13:16:35'),
	(115,1,24,9,3,10,'2017-04-27 13:19:52','2017-04-27 13:19:52');

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
	(46,'Princess','2016-09-01 09:39:48','2016-09-01 09:39:48'),
	(47,'Juggler','2016-09-14 16:23:32','2016-09-14 16:23:32'),
	(48,'Fencer','2016-09-14 16:25:28','2016-09-14 16:25:28'),
	(49,'Cleric','2016-10-07 15:20:31','2016-10-07 15:20:31'),
	(50,'l\'Cie','2016-10-07 15:28:48','2016-10-07 15:28:48'),
	(51,'Squire','2016-10-07 15:29:59','2016-10-07 15:29:59'),
	(52,'Fell Knight','2016-10-07 15:31:14','2016-10-07 15:31:14'),
	(54,'Airship Tech','2016-11-10 10:36:24','2016-11-10 10:36:24'),
	(55,'Holy Knight','2016-11-10 11:43:10','2016-11-10 11:43:10'),
	(56,'Engineer','2016-11-10 11:43:22','2016-11-10 11:43:22'),
	(57,'Dark Knight','2016-11-10 11:43:46','2016-11-10 11:43:46'),
	(58,'Black Wizard','2016-11-10 11:44:16','2016-11-10 11:44:16'),
	(59,'Red Wizard','2016-11-10 11:44:28','2016-11-10 11:44:28'),
	(60,'White Wizard','2016-11-10 11:44:37','2016-11-10 11:44:37'),
	(61,'Demon Knight','2016-11-10 11:44:59','2016-11-10 11:44:59'),
	(62,'Vampire','2016-11-10 11:45:12','2016-11-10 11:45:12'),
	(63,'White Witch','2016-11-10 11:45:27','2016-11-10 11:45:27'),
	(64,'Tech Mage','2016-11-10 11:45:42','2016-11-10 11:45:42'),
	(65,'Tactician','2016-12-02 12:26:45','2016-12-02 12:26:45'),
	(66,'Pirate','2016-12-02 12:30:10','2016-12-02 12:30:10'),
	(67,'Guard Captain','2016-12-02 12:30:29','2016-12-02 12:30:29'),
	(68,'Goddess','2016-12-02 12:35:25','2016-12-02 12:35:25'),
	(69,'God of Creation','2016-12-02 12:47:39','2016-12-02 12:47:39'),
	(70,'Prince','2017-01-03 15:01:59','2017-01-03 15:01:59'),
	(71,'White Knight','2017-01-03 15:03:39','2017-01-03 15:03:39'),
	(72,'Mercenary','2017-04-26 14:05:51','2017-04-26 14:05:51'),
	(73,'Soldier','2017-04-26 15:16:14','2017-04-26 15:16:14'),
	(74,'Water Priestess','2017-04-26 15:16:33','2017-04-26 15:16:33'),
	(75,'Dark Spirit','2017-04-26 15:16:50','2017-04-26 15:16:50'),
	(76,'Agito Cadet','2017-04-26 15:17:04','2017-04-26 15:17:04'),
	(77,'Emperor','2017-04-26 15:18:31','2017-04-26 15:18:31'),
	(78,'Cannoneer','2017-04-26 15:18:42','2017-04-26 15:18:42'),
	(79,'Spy','2017-04-26 15:18:48','2017-04-26 15:18:48'),
	(80,'Crown Prince','2017-04-26 15:19:06','2017-04-26 15:19:06'),
	(81,'Holy Swordsman','2017-04-26 15:20:11','2017-04-26 15:20:11'),
	(82,'Gambler','2017-04-26 15:21:51','2017-04-26 15:21:51'),
	(83,'Wildling','2017-04-26 15:21:59','2017-04-26 15:21:59'),
	(84,'Singer','2017-04-26 15:22:12','2017-04-26 15:22:12'),
	(85,'Chocobo Rider','2017-04-26 15:22:44','2017-04-26 15:22:44'),
	(86,'Sprite','2017-04-26 15:23:03','2017-04-26 15:23:03'),
	(87,'Young Girl','2017-04-26 15:23:08','2017-04-26 15:23:08'),
	(88,'Holy Sword Hero','2017-04-26 15:23:26','2017-04-26 15:23:26'),
	(89,'Cupid Archer','2017-04-26 15:23:33','2017-04-26 15:23:33'),
	(90,'Scion','2017-04-26 15:53:59','2017-04-26 15:53:59');

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
	(1,'Final Fantasy I','FF I','2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(2,'Final Fantasy II','FF II','2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(3,'Final Fantasy III','FF III','2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(4,'Final Fantasy IV','FF IV','2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(5,'Final Fantasy V','FF V','2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(6,'Final Fantasy VI','FF VI','2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(7,'Final Fantasy IX','FF IX','2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(8,'Final Fantasy XI','FF XI','2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(9,'Final Fantasy XII','FF XII','2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(10,'Final Fantasy Brave Exvius','FF BE','2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(11,'Final Fantasy Crystal Defenders','Crystal Defenders','2016-09-14 17:19:47','2016-09-14 17:19:47'),
	(12,'Final Fantasy Tactics','FF Tactics','2016-10-07 16:19:20','2016-10-07 16:19:20'),
	(13,'Final Fantasy XIII','FF XIII','2016-10-07 16:26:09','2016-10-07 16:26:09'),
	(14,'Brave Frontier','Brave Frontier','2016-12-02 12:32:42','2016-12-02 12:32:42'),
	(15,'Final Fantasy XV','FF XV','2017-01-03 15:03:01','2017-01-03 15:03:01'),
	(16,'FFBE','FFBE','2017-04-26 14:04:01','2017-04-26 14:04:01'),
	(17,'FFVI','FFVI','2017-04-26 15:16:06','2017-04-26 15:16:06'),
	(18,'FFII','FFII','2017-04-26 15:16:06','2017-04-26 15:16:06'),
	(19,'FFXII','FFXII','2017-04-26 15:16:06','2017-04-26 15:16:06'),
	(20,'FFI','FFI','2017-04-26 15:16:06','2017-04-26 15:16:06'),
	(21,'FFIV','FFIV','2017-04-26 15:16:06','2017-04-26 15:16:06'),
	(22,'FFIX','FFIX','2017-04-26 15:16:07','2017-04-26 15:16:07'),
	(23,'FFV','FFV','2017-04-26 15:16:07','2017-04-26 15:16:07'),
	(24,'FFXI','FFXI','2017-04-26 15:16:07','2017-04-26 15:16:07'),
	(25,'FFIII','FFIII','2017-04-26 15:16:07','2017-04-26 15:16:07'),
	(26,'FFXIII','FFXIII','2017-04-26 15:16:08','2017-04-26 15:16:08'),
	(27,'FFT','FFT','2017-04-26 15:16:08','2017-04-26 15:16:08'),
	(28,'FFXV','FFXV','2017-04-26 15:16:08','2017-04-26 15:16:08'),
	(29,'FF TYPE-0','FF TYPE-0','2017-04-26 15:17:05','2017-04-26 15:17:05'),
	(30,'Ariana Grande','Ariana Grande','2017-04-26 15:22:12','2017-04-26 15:22:12'),
	(31,'Secret of Mana','Secret of Mana','2017-04-26 15:23:03','2017-04-26 15:23:03'),
	(32,'FFXIV','FFXIV','2017-04-26 15:53:59','2017-04-26 15:53:59');

/*!40000 ALTER TABLE `origins` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table phinxlog
# ------------------------------------------------------------

DROP TABLE IF EXISTS `phinxlog`;

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `phinxlog` WRITE;
/*!40000 ALTER TABLE `phinxlog` DISABLE KEYS */;

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`)
VALUES
	(20160906102923,'RoleStats','2016-09-06 10:30:33','2016-09-06 10:30:33'),
	(20160906111129,'RoleOrder','2016-09-06 11:12:13','2016-09-06 11:12:13'),
	(20160908095207,'UnitRarity','2016-09-08 09:54:24','2016-09-08 09:54:24'),
	(20160908100555,'AcquireRarity','2016-09-08 10:06:27','2016-09-08 10:06:27'),
	(20160908133320,'UnitImage','2016-09-14 15:25:56','2016-09-14 15:25:56');

/*!40000 ALTER TABLE `phinxlog` ENABLE KEYS */;
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
	(143,63,7),
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
	(102,80,5),
	(103,81,5),
	(104,82,5),
	(105,83,5),
	(106,84,1),
	(107,84,4),
	(108,85,1),
	(109,85,4),
	(110,86,7),
	(111,87,5),
	(112,88,2),
	(113,88,5),
	(114,89,5),
	(117,115,2),
	(118,115,5),
	(119,116,2),
	(120,117,2),
	(121,117,5),
	(122,118,5),
	(123,119,1),
	(124,119,2),
	(125,120,5),
	(126,121,2),
	(127,122,4),
	(128,123,1),
	(129,123,2),
	(130,123,4),
	(131,124,1),
	(132,124,2),
	(133,125,5),
	(134,126,2),
	(135,126,7),
	(136,127,5),
	(137,128,1),
	(138,128,2),
	(139,129,2),
	(140,129,5),
	(141,130,2),
	(142,130,4),
	(144,131,2),
	(145,132,5),
	(146,133,5),
	(147,134,5),
	(148,135,1),
	(149,135,2),
	(150,136,2),
	(151,136,5),
	(152,137,2),
	(153,137,5),
	(154,138,5),
	(155,138,7),
	(156,139,1),
	(157,139,2),
	(158,140,2),
	(159,140,5),
	(160,141,4),
	(161,142,5),
	(162,143,5),
	(163,144,2),
	(164,144,5),
	(165,145,1),
	(166,146,7),
	(167,147,5),
	(168,148,5),
	(169,148,7),
	(170,149,1),
	(171,149,2),
	(172,150,4),
	(173,151,5),
	(174,152,5),
	(175,153,2),
	(176,153,5),
	(177,154,4),
	(178,155,2),
	(179,156,2),
	(180,156,7),
	(181,157,5),
	(182,158,4),
	(183,159,2),
	(184,159,5),
	(185,160,5),
	(186,161,2),
	(187,161,5),
	(188,162,1),
	(189,162,5),
	(190,163,5),
	(191,164,5),
	(192,165,5),
	(193,166,2),
	(194,166,5),
	(195,167,2),
	(196,168,1),
	(197,168,2),
	(198,169,5),
	(199,170,3),
	(200,171,2),
	(201,171,5),
	(202,172,1),
	(203,173,4),
	(204,174,5),
	(205,175,5),
	(206,176,2),
	(207,176,4),
	(208,177,2),
	(209,178,5),
	(210,179,4),
	(211,180,3),
	(212,180,4),
	(213,181,5),
	(214,182,5),
	(215,183,2),
	(216,183,5),
	(217,184,1),
	(218,184,4),
	(219,185,2),
	(220,186,5),
	(221,186,7);

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
	(12,'Reaper','2016-09-02 08:27:10','2016-09-02 08:27:10'),
	(13,'Fairy','2017-04-26 15:23:03','2017-04-26 15:23:03');

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
	(2,2,30,'2016-09-02 12:08:16','2016-11-10 10:02:57'),
	(3,3,40,'2016-09-02 12:08:24','2016-09-02 12:08:24'),
	(4,4,60,'2016-09-02 12:08:30','2016-09-02 12:08:30'),
	(5,5,80,'2016-09-02 12:08:36','2016-11-10 10:02:57'),
	(6,6,100,'2016-10-07 16:27:29','2016-10-07 16:27:29');

/*!40000 ALTER TABLE `rarities` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table specialisations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `specialisations`;

CREATE TABLE `specialisations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `stats` varchar(255) NOT NULL,
  `team_pick_order` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `specialisations` WRITE;
/*!40000 ALTER TABLE `specialisations` DISABLE KEYS */;

INSERT INTO `specialisations` (`id`, `name`, `stats`, `team_pick_order`, `created`, `modified`)
VALUES
	(1,'Healing','spr,mag,hp',4,'2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(2,'Support','mag,def,mp',5,'2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(3,'Hybrid damage','atk,mag,mp',6,'2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(4,'Magic damage','mag,spr,mp',3,'2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(5,'Physical damage','atk,def,hp',2,'2016-08-31 16:00:00','2016-08-31 16:00:00'),
	(7,'Tank','def,spr,hp',1,'2016-08-31 16:00:00','2016-08-31 16:00:00');

/*!40000 ALTER TABLE `specialisations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table units
# ------------------------------------------------------------

DROP TABLE IF EXISTS `units`;

CREATE TABLE `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `origin_id` int(11) NOT NULL,
  `race_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `base_rarity_id` int(1) NOT NULL DEFAULT '1',
  `max_rarity_id` int(1) NOT NULL DEFAULT '5',
  `trust_master_reward` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT '',
  `image_dir` varchar(255) DEFAULT '',
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

INSERT INTO `units` (`id`, `name`, `description`, `origin_id`, `race_id`, `job_id`, `gender_id`, `base_rarity_id`, `max_rarity_id`, `trust_master_reward`, `image`, `image_dir`, `hp`, `mp`, `atk`, `def`, `mag`, `spr`, `hits`, `created`, `modified`)
VALUES
	(1,'Rain','A knight of the Kingdom of Grandshelt. A precocious pilot who was entrusted with command of an airship at the tender age of eighteen, he maintains a carefree—some might say lackadaisical—demeanor. He has the unwavering trust of the king and his nation\'s people, in large part due to his father\'s reputation as a stalwart knight of the kingdom.',16,2,3,1,2,6,'-','Unit-Rain-6.png','f6f12663-9f7f-4f91-8046-7ac696927eea',2488,97,89,88,86,80,2,'2016-08-31 15:05:27','2017-04-26 16:17:17'),
	(2,'Lasswell','A knight of the Kingdom of Grandshelt, he shares command of an airship with his childhood friend Rain. His skills are on par with Rain\'s, and his no-nonsense attitude has earned him the trust of his superiors and subordinates alike. However, he has a tendency to dragged along by Rain against his own better judgment.',16,2,3,1,2,6,'-','Unit-Lasswell-6.png','c11ab887-bcbb-4fa5-ab9c-135bfe52c54b',2349,100,96,82,89,74,1,'2016-08-31 15:06:50','2017-04-26 16:17:17'),
	(3,'Fina','A young girl who emerged from an earth crystal with no recollection of her past save for her name. Fina\'s lack of general knowledge prompts her to act with the innocence and curiosity of a child. She is proficient with white magic and the bow and arrow, though where she acquired such impressive skills, she cannot say.',16,2,4,2,2,5,'-','Unit-Fina-5.png','385a9b86-5975-4802-b550-813b062645bb',1867,131,79,79,93,101,1,'2016-08-31 15:07:39','2017-04-26 16:17:17'),
	(4,'Rizer','A warrior who once defended Grandshelt. Rizer lived long ago, when many nations clashed for control of the crystals. Though his natural talent in battle was modest, his strong desire to protect his nation raised him above the level of his peers, eventually winning him command of an army. He is said to have fought bravely and tirelessly until the very end.',16,2,5,1,1,2,'HP +10%','Unit-Rizer-2.png','a10c2db1-1887-4ae1-82a9-d5741b304a2a',1108,40,47,44,31,35,1,'2016-08-31 15:08:32','2017-04-26 16:17:17'),
	(5,'Leah','In ancient times, when nations battled each other for the power of the crystals, Leah used her abilities as a white mage to heal the wounded regardless of status or country of origin. Those she had treated were heartbroken when she was later felled by a stray arrow while tending to one of her patients.',16,2,6,2,1,2,'Banish','Unit-Leah-2.png','ec19504d-a79b-41c1-84de-303e657c1047',796,54,31,30,41,48,1,'2016-08-31 15:10:18','2017-04-26 16:17:17'),
	(6,'Tronn','A black mage who secluded himself in an enchanted forest, avoiding all human contact and devoting himself to magical research. His thirst for knowledge and insistence in shunning other eventually turned his studies into a quest for power. Ultimately, Tronn failed to control the magic he had learned, which tragically cost him his life.',16,2,2,1,1,2,'Fira','Unit-Tronn-2.png','5816d427-4b6e-4208-8854-0403f4156bc8',801,57,30,33,47,43,1,'2016-08-31 15:57:03','2017-04-26 16:17:17'),
	(7,'Eldin','A noble thief who only stole from villains. Eldin took in a band of hopeless thieves as his subordinates and had the support of the common people on his side. However, his group was persecuted after one of its members committed a grave crime, for which Eldin paid with his life. He never lived to see the peaceful world he dreamed of.',16,2,7,1,1,2,'Pilfer','Unit-Eldin-2.png','651b40e2-9cc6-4664-a3ed-f73173acff81',883,41,43,37,34,36,4,'2016-08-31 16:14:15','2017-04-26 16:17:17'),
	(8,'Baurg','A monk who trained in the mountains. Completely impartial to the war, Baurg’s only goal was to grow stronger. However, he lost all sense of self-control when his village was incinerated, and entered the war, using his training to vent his burning rage. He ultimately realized that all his fighting was meaningless though, and vanished into the mountains where he had trained.',16,2,8,1,1,2,'Store','Unit-Baurg-2.png','3ffde60e-ce04-46b6-bec3-f3b9f15a2fc4',1201,39,45,52,27,31,3,'2016-08-31 16:16:53','2017-04-26 16:17:17'),
	(9,'Gimlee','A native of Grandshelt before the kingdom was established. Gimlee hails from a hunting tribe that was ousted from its home by the people of the Grandshelt Kingdom, who were skilled in using the power of the crystals to their advantage. A proud warrior, he fought until the end out of hatred for the crown. Ironically, as a vision he now fights for Rain, a knight of the Grandshelt Kingdom.',16,2,9,1,1,2,'Aim','Unit-Gimlee-2.png','582b57f8-bb89-4dc2-94a4-431915e97ced',827,46,40,36,39,34,1,'2016-08-31 16:18:04','2017-04-26 16:17:17'),
	(10,'Maxell','A gunman from the age of pioneers. Maxell was the protector of the weak and wounded who faced harsh conditions throughout their journey. Unfortunately, his band\'s numbers dwindled as expedition pressed on, and survivors eventually turned to banditry out of desperation. Maxell challenged his erstwhile companions, losing his life in the process.',16,2,10,1,1,2,'Power Shot','Unit-Maxell-2.png','1a5d1ccf-d1a4-4683-8ec3-d92c5a41f752',864,44,47,32,38,36,1,'2016-08-31 16:19:02','2017-04-26 16:17:17'),
	(11,'Liza','A bard who made a living singing of legends and heroes. Liza\'s beautiful voice and harp served to comfort and inspire the hearts of the common folk. Eventually, however, she drew the ire of one of the beasts in her songs, and lost her voice to a curse it placed on her. Bereft of her true gift and livelihood, Liza vanished, never to be seen again.',16,2,11,2,1,2,'Lullaby','Unit-Liza-2.png','98506bad-8261-40cf-8576-4d300df71b9c',782,51,35,34,39,41,2,'2016-08-31 16:21:15','2017-04-26 16:17:17'),
	(12,'Wedge','A soldier of the Gestahlian Empire who appears in a tale of humans and espers, told in a distant world. Together with his comrade Biggs, he is tasked with capturing a frozen esper discovered in the independent mining town of Narshe. They are opposed by the town guard but quickly dispatch all resistance with their powerful Magitek armor and extraordinary abilities of their companion, a mysterious girl named Terra. Deep within the mine they discover the mystical creature they seek.',17,2,12,1,2,3,'Fire Beam','Unit-Wedge-3.png','50cdce6f-65ff-4c2a-bbe2-ca61f0e48936',1162,56,50,51,41,43,3,'2016-08-31 16:22:35','2017-04-26 16:17:17'),
	(13,'Biggs','A soldier of the Gestahlian Empire who appears in a tale of humans and espers, told in a distant world. Under orders from the Emperor, a despot bent on world domination, he ventures to the mining town of Narshe with his comrade Wedge to retrieve a frozen esper. Accompanying them is Terra, a young girl who, despite her prodigious magical powers, is enslaved to the Empire by the binding crown on her head. By her magicks and the formidable Magitek armor, they dispatch the defenses of Narshe and come face-to-face with the esper they seek.',17,2,12,1,2,3,'Blizzard Beam','Unit-Biggs-3.png','9b63d330-1523-4e4e-8544-6458c59808f4',1168,59,51,50,42,42,3,'2016-08-31 16:29:48','2017-04-26 16:17:17'),
	(14,'Paul','An elusive thief who appears in a tale of empires and rebels, told in a faraway world. His claim to be the best thief in the world is undisputed, provided you don\'t ask anyone else. No-one, though, can fault his moral fiber, as he steals only from the dastardly Empire. His infiltration of Castle Palamecia was an indubitable display of his talents, but his constant braggadocio has a tendency to wear on his companions.',18,2,13,1,2,3,'Escape','Unit-Paul-3.png','1afb5478-001e-4870-8184-6279464c19f2',1133,55,52,45,44,44,1,'2016-08-31 16:39:54','2017-04-26 16:17:17'),
	(15,'Anastasis','A holy man from the distant world of Ivalice, where he serves as Gran Kiltias of the Kiltia sect. Known as a Dreamsage, he possesses nigh limitless knowledge due to his ability to enter the dreams of others. A stern, austere figure, his influence extends across the realm. When the princess Ashe arrives seeking his blessing to rebuild the Kingdom of Damalsca, he foresees the danger that awaits her and warns her against folly.',19,2,14,1,2,3,'Regen','Unit-Anastasis-3.png','3b23bc5e-8ae6-49bd-b1a7-3d2c835931a6',1001,70,35,36,55,58,2,'2016-08-31 16:41:53','2017-04-26 16:17:17'),
	(16,'Sarah','A princess from the far-off world of Corneria, whose story is sung in a tale of the Warriors of Light. Raised with care by the king and queen, she has a sister whom she looks after dutifully. Beloved throughout the realm for her beauty and kindness, she is kidnapped by the fallen knight Garland and imprisoned in the Chaos Shrine. In time, she is rescued by the Warriors of Light and returns to the castle, where she prays for the heroes\' safety in their journey to restore the light of the crystals.',20,2,15,2,2,3,'Paean','Unit-Sarah-3.png','e4d547b7-083d-4b73-8fac-7ab5f15f1838',998,63,37,34,54,58,1,'2016-08-31 16:44:30','2017-04-26 16:17:17'),
	(17,'King Giott','King of the Dwarves in a faraway world where two moons rise in the sky. Ruler of the Underworld, his castle is home to a crystal, guarded by a mighty army. Particularly proud of his battalion of tanks, said to be a match for even the mighty airships of the Red Wings of Baron, he fights bravely with Cecil and his comrades to protect the crystal. After the passing of his wife, the Queen, he dotes on his daughter Luca with the love of two parents.',21,2,5,1,2,3,'Stone Killer','Unit-King_Giott-3.png','8d62d527-4e29-4ba5-bb74-db3e8e888611',1353,48,61,51,33,35,1,'2016-08-31 16:45:56','2017-04-26 16:17:17'),
	(18,'Shiki','A swordsman who wielded a katana, a blade crafted by master smiths of times gone by. Shiki served his master honorably, following the path of bushido to cultivate both body and spirit. However, this rigid set of beliefs waned in popularity over the years, eventually leading to his master\'s deposition. With no intention of serving a new lord, Shiki vanished form sight.',16,2,16,1,2,3,'Mirror of Equity','Unit-Shiki-3.png','dd0c1a63-ad65-44aa-938b-533ea5a1460a',1224,53,59,37,35,42,1,'2016-08-31 16:47:13','2017-04-26 16:17:17'),
	(19,'Mizell','A specialist in green magic, a school of magic developed for the purpose of aiding allies on the battlefield. A cold-hearted type indoctrinated with his studies from an early age, Mizell made up for his lack of human empathy with an inherent aptitude for supportive magic. He saved the lives of many soldiers during the war, but was never moved by their words of gratitude.',16,2,17,1,2,3,'Deprotect','Unit-Mizell-3.png','b0dd924d-9120-4bcd-adfc-f6ab5872acfa',1008,69,45,45,53,53,1,'2016-08-31 16:48:32','2017-04-26 16:17:17'),
	(20,'Ronaldo','A warrior who mastered both magic and the sword. Ronaldo\'s people were very secretive about their practices to enhance their magical powers, which led them to take a vow of silence long ago. Unfortunately, their insistence on keeping the secrets of their spellblades by eschewing all contact with their neighbors eventually led to the nation\'s ruin, its name lost to history forever.',16,2,18,1,2,3,'Drain Blade','Unit-Ronaldo-3.png','1cf7ec51-d467-44a2-98cc-353d3bd2b4bd',1218,65,52,46,54,54,2,'2016-08-31 16:49:43','2017-04-26 16:17:17'),
	(21,'Mel','An alchemist who created various concoctions to ease other\'s pain, or at times even to do battle. Born a simple village girl, Mel began learning her trade from an alchemist that took her in after a virulent plague claimed her family. Timid in nature, she strongly disliked fighting and instead devoted her life to research ways in with she could help others with her potions and salves.',16,2,19,2,2,3,'Drink','Unit-Mel-3.png','f205d975-58af-4089-b3e1-b6b37d23f01b',978,72,38,44,48,49,2,'2016-08-31 16:51:48','2017-04-26 16:17:17'),
	(22,'Vivi','A young black mage from the distant world of Gaia. While attending a play in the kingdom of Alexandria, he is swept up in Zidane\'s plot to kidnap Princess Garnet, and before long joins in on his new companions\' quest. Raised with no knowledge of the world or his own origins, he is at first timid and dependent on others, but in the course of his journey gradually gains the courage to face the truth of the past.',22,2,2,1,3,4,'Firaga','Unit-Vivi-4.png','32a2fa3e-1bb4-4f0c-a962-2428365e3a3d',1504,111,59,63,92,85,1,'2016-08-31 16:53:52','2017-04-26 16:17:17'),
	(23,'Penelo','A young lady from the world of Ivalice, beyond the Farplane. After losing her family to the war, she was fostered together with her childhood friend Vaan. Earning her keep at a sundry shop at Rabanastre, she is a leader-like figure among her fellow orphans, who respect her for her wisdom and gentle disposition. She worries for the impulsive Vaan, who seethes with hatred for the Empire after the death of his brother.',19,2,20,2,3,4,'Equip S Sword','Unit-Penelo-4.png','cb616fcc-77d6-4cf1-b495-bc47373e8890',1607,91,67,61,79,78,1,'2016-08-31 16:55:33','2017-04-26 16:17:17'),
	(24,'Maria','A young lady who appears in a tale of rebels and empires, in a far-flung world. Raised in Fynn with her elder brother Leon and fellow orphans Firion and Guy, she exudes a kindly confidence despite being lonely at heart. After losing her parents and being separated from her beloved brother after an attack by the Empire, she pledges herself to the rebellion alongside her friends.',18,2,6,2,3,5,'Esuna','Unit-Maria-5.png','872a40b0-a6ba-446e-b25a-cee4cfd5f777',1489,95,65,58,78,85,3,'2016-08-31 16:57:12','2017-04-26 16:17:17'),
	(25,'Sabin','A youth whose story is sung in a tale of espers end humans, told in a distant world. Twin brother to Edgar, prince of Figaro, his distaste for the struggle of succession led him to leave his homeland at the age of seventeen. Strict training under the martial artist Duncan transformed a boy into a man strong of body and passionate of mind, and after reuniting with his brother, at Mt. Kolts, he swears to join the fight against their common foe, the Empire.',17,2,8,2,3,4,'Counter','Unit-Sabin-4.png','539c37f7-5754-4187-af3e-178852e98401',2250,79,90,82,61,58,4,'2016-08-31 16:58:27','2017-04-26 16:17:17'),
	(26,'Shadow','A lethal assassin from a tale of espers and humans, told in a distant worldㅡhis face and true identity cloaked in darkness. So cold that it is said that he would kill even his best friend for a price, he counts his loyal canine partner Interceptor as his only true friend. He joins Locke and his companions for a time, only to disappear as soon as his debt is paid. Showing little attachment to the world of the living, he seems to be somehow always searching for a place to die.',17,2,21,1,3,4,'Throw','Unit-Shadow-4.png','299ca2c3-ea28-470b-8918-6afa87ac325d',1896,88,89,76,73,68,2,'2016-08-31 16:59:36','2017-04-26 16:17:17'),
	(27,'Krile','A young girl whose story is told in a tale of crystals, from another world. Princess of Bal in the Second World and granddaughter to Galuf, who lovingly raised her after the disappearance of her parents. Fearing for her grandfather after he set off to protect the crystal she rides a meteorite and travels to Bartz\'s world on her own, a brave act which awakens Galuf\'s long lost memories.',23,2,22,2,3,5,'Thundaga','Unit-Krile-5.png','ddbe3dbf-e09d-4274-ad71-5281bbf8749b',1651,98,64,66,81,73,1,'2016-08-31 17:00:54','2017-04-26 16:17:17'),
	(28,'Kain','A young man from a distant world where two moons rise in the sky. Leader of the dragoons, the elite regiment of Baron, he is both a loyal friend and strong rival to Cecil. While possessing a strong sense of justice, he is not at ease expressing his emotions to others. Disillusioned at the actions of their king, he and Cecil both defect from their homeland, but become separated. He reappears as Cecil\'s adversary, his true motivations unknown.',21,2,23,1,3,5,'Gungnir','Unit-Kain-5.png','d7655c4c-9633-4def-a30d-30baeae2fecf',2090,85,89,84,67,65,3,'2016-08-31 17:02:29','2017-04-26 16:17:17'),
	(29,'Edgar','A young man whose story is sung in a tale of espers and humans, from a distant world. King of the technologically advanced nation of Figaro and a brilliant engineer in his own right, he wields numeral unusual weapons of his own design. He is greatly beloved by his people, whose best interest he always keeps closest to his heart. He is also notorious as a ladies\' man, quick to make advances on women of all ages and walks of life.',17,2,24,1,3,4,'Machine Killer','Unit-Edgar-4.png','45a035b6-b9ea-4eeb-841e-6ffe3a25c018',1996,90,83,76,71,73,3,'2016-08-31 17:04:12','2017-04-26 16:17:17'),
	(30,'Fran','A warrior of the viera, a rabbit-eared race, whose tale is told in the distant world of Ivalice. Atypical of her reclusive people, she left her homeland to venture into hume society, where she fights as the trusted comrade of the sky pirate Balthier. She is a formidable figure, possessed of great knowledge, experience, and the heightened sensitivity to Mist unique to her kind, and provides cool, confident advice to her companions while keeping a professional distance.',19,2,25,2,3,4,'Cleanse','Unit-Fran-4.png','23bb9a2a-b0ac-42d2-9c75-41decdca0301',1792,86,75,75,76,78,1,'2016-08-31 17:05:44','2017-04-26 16:17:17'),
	(31,'Shantotto','A Tarutaru sorceress from the distant world of Vana\'diel. Possessed of formidable magical powers, she serves as minister of the Orastery, Windurst\'s Department of Magic. Her petite and charming exterior belies a proud, fiery, vainglorious personality that can prove hazardous to friends and enemies alike. Few things are more dire than being caught in a blaze of Shantotto\'s fire.',24,2,26,2,3,4,'MAG +30%','Unit-Shantotto-4.png','e094604f-82a5-48a0-9858-cf36f8e589a3',1642,132,59,59,93,85,3,'2016-08-31 17:07:38','2017-04-26 16:17:17'),
	(32,'Rydia','A young girl from a distant world with two moons. Born to a family of summoners in Mist, she lost her mother when the kingdom of Baron, fearing the power of the Eidolons, razed her home. Initially despising Cecil for his role in the attack, she gradually opens up to her new companion upon witnessing his kindness. Carrying the scars from the loss of her village, she matures as a summoner under the gentle care of Cecil and Rosa.',21,2,27,2,3,5,'Blizzaga','Unit-Rydia-5.png','2ea6750e-6d70-4695-b9ec-6b7413ea336d',1523,127,62,58,93,85,2,'2016-08-31 17:12:27','2017-04-26 16:17:17'),
	(33,'Cyan','A great warrior spoken of in another world, where he played a role in the great conflict between humankind and espers. A samurai, he loyally serves the king of Doma in the East, just as he served the king\'s father before him. His courtly manners and love of old customs are yoked to a certain discomfort when it comes to modern machines and the fairer sex. Through the cruel machinations of Kefka, the Gestahlian Empire\'s court mage, he suffers the loss of his liege, and his beloved wife and son. Alone, he storms his enemies in a furyㅡand so it is that he encounters Sabin and comes to lend his strength to the Returners.',17,2,16,1,3,4,'Evade','Unit-Cyan-4.png','70c273a3-52ce-4962-84b7-b06a76b9590d',2017,85,90,80,63,61,1,'2016-09-01 08:37:13','2017-04-26 16:17:17'),
	(34,'Clyne','A hero who defeated a cruel despot to become king of a nation. Clyne was a brave knight and army commander who earned the loyalty and love of his people. However, he knew very little about ruling a nation, and proved unequipped to handle the politics attached to such an office. He eventually lost his life under suspicious circumstances amidst a conspiracy involving succession to the throne.\r\n\r\n',16,2,3,1,3,4,'Cover','Unit-Clyne-4.png','2da5b67c-790e-4a7b-825a-a91930b1f3dc',2204,85,82,85,69,68,2,'2016-09-01 08:38:16','2017-04-26 16:17:17'),
	(35,'Anzelm','Known primarily as mages, red mages like Anzelm were in fact trained in both magic and combat. Though derided as an eccentric by his peers, Anzelm was a proud warrior and a veteran of many battles in the course of his journeys. He never pledged allegiance to any one entity, but instead used sword and sorcery to help the common folk, who looked up to him as one of their heroes.',16,2,22,1,3,4,'Drain','Unit-Anzelm-4.png','c7643b32-bb43-42a0-b405-1d46021798c3',1739,88,78,69,81,71,2,'2016-09-01 08:40:02','2017-04-26 16:17:17'),
	(36,'Luna','A hunter who once lived in the forest. Luna\'s beauty and infallible accuracy with the bow led many to believe she was actually a wood spirit. In truth, she had been abandoned in the forest as a child and then raised by a hermit who taught her how to hunt. Not accustomed to human speech, her inability to communicate only added to her exotic mystique.',16,2,9,2,3,4,'Barrage','Unit-Luna-4.png','f2d712de-e8dc-4a8e-8546-c08b7583a9ab',1648,87,80,70,70,73,1,'2016-09-01 08:40:52','2017-04-26 16:17:17'),
	(37,'Bedile','A warrior from a small tribe that existed long ago that was proficient in both sword and sorcery. Bedile was a stoic man who shared a vow of silence with his comrades regarding the ways of the mystic sword. As fate would have it, he later fell in love with a foreign woman he had saved and was banished from his home. His once-proud tribe now but a memory, only the legend of Bedile protecting his love until the end remains.',16,2,18,1,3,4,'Thundaga Blade','Unit-Bedile-4.png','8404f542-b85b-4561-a216-98915d6c6389',1784,85,79,73,77,71,3,'2016-09-01 08:41:52','2017-04-26 16:17:17'),
	(38,'Garland','A terrible creature who was once a knight from another world. He was the finest knight in all the kingdom of Cornelia, but when Princess Sarah rebuffed his love, he kidnapped her and barricaded himself in the Chaos Shrine. Four Warriors of Light, under command from the king, struck down Garland in his depravity and it seemed that his evil desires would be thwarted - but it was not to be. Escaping from death, Garland was drawn back through time to be reborn, two millennia in the past, as the immortal god known as Chaos.',20,2,28,1,3,5,'Equip L Sword','Unit-Garland-5.png','3f5e8eb2-7eae-4498-b88e-025ee6a89526',2730,110,113,106,85,78,1,'2016-09-01 08:43:20','2017-04-26 16:17:17'),
	(39,'Exdeath','A warlock who hails from a world where the Crystals shine with light. It is said that he was born, some five centuries before the tale begins, when all malevolent souls trapped within the Great Forest of Moore took root in a single tree. He was defeated once by the Warriors of Dawn, and sealed away in the world also occupied by Bartz and his allies. But he was able to destroy the Crystals, which were weakened from overuse, and return to his former strength. His ultimate goal is to return the two split worlds to one, and seize the power of the Void, which lies in the Interdimensional Rift.',23,2,29,1,3,6,'Holy','Unit-Exdeath-6.png','8efb3598-c17a-4a18-8bf2-1b93a9b9eade',2401,145,90,84,112,95,1,'2016-09-01 08:45:56','2017-04-26 16:17:17'),
	(40,'Kuja','A beautiful and cruel angel of death who sought to destroy the world of Gaia from the inside out. Whispering in the ear of Alexandria\'s Queen Brahne, he convinces her of the advantage of using summons and artificial black mages, created from the Mist, to achieve her goals. In doing so, he achieves his own goal: a war that spreads across every corner of the continent. Kuja possesses an androgynous beauty, an unforgiving pride and sadistic disdain for others. His flair for dramatic speeches reveals his narcissistic tendencies as well. He looks down on all other creatures, including Queen Brahne and the black mages he creates, as no more than pawns in his game.',22,2,30,1,3,5,'Flare','Unit-Kuja-5.png','521f14a6-86f2-49d3-8bb7-209a61825394',2482,124,105,89,106,81,3,'2016-09-01 08:48:06','2017-04-26 16:17:17'),
	(41,'Cloud of Darkness','A being of destruction, hailing from another world where tales are passed down of the Crystals and Warriors of Light. It lives in the hope of returning all the world to nothingness, and is said to appear when the balance between light and dark is upset. When an ancient civilization, far advanced for their time, exhausted the power of the light, the Cloud of Darkness came forth from the great flood of light as it ran amok. It attempted to fulfill its goal of returning the world to nothingness, but the Warriors of Light and the Warriors of Dark, both chosen by the Crystals, defeated it and returned the world to stability.',25,12,31,2,3,6,'Auto-Limit','Unit-Cloud_of_Darkness-6.png','a3ea7e8c-cb36-4cf8-a9bf-07fae577f684',2574,113,115,102,89,77,1,'2016-09-01 08:50:54','2017-04-26 16:17:17'),
	(42,'Cecil','A knight who appears in the tales of a blue planet watched over by two moons. He is a Dark Knight, an elite warrior within the great military forces of the kingdom of Baron, and serves as captain of the Red Wings, Baron\'s airship fleet. He is a serious man, and suffers from grave doubts about the cruel actions his king demands in pursuit of the Crystals, and his own choice to wield the power of darkness. When he reveals these doubts to the king, he is stripped of his duty as captain of the Red Wings. Filled with despair, he sets out to Mist Valley to subjugate the Eidolons which live there - the last order he will ever take from his king.',21,2,32,1,3,6,'Excalibur','Unit-Cecil-6.png','f210a968-3896-4e28-b601-e6f8883ae3a8',2800,110,97,109,85,88,2,'2016-09-01 08:52:48','2017-04-26 16:17:17'),
	(43,'Terra','A woman who appears in tales from another world, where she played a role in the great conflict between humankind and espers. She was born possessing magic, a thing thought to be impossible in her world. The Gestahlian Empire seized control of her mind and made her a Magitek soldier, forcing her to assist them in their goal of world domination. When she is sent to Narshe to seize the frozen esper Valigarmanda, the esper resonates with her and the effect is so profound that it knocks her unconscious. She is freed from the empire\'s control when she wakes, but loses all memory of who she is.',17,2,33,2,3,6,'Ultima','Unit-Terra-6.png','342534df-a352-47d0-ba9e-9383321380ef',2127,120,94,81,109,95,1,'2016-09-01 08:54:11','2017-04-26 16:17:17'),
	(44,'Magitek Armor Terra','A woman who appears in tales from another world, where she played a role in the great conflict between humankind and espers. Though magic was thought to have been lost from her world, she was born able to use it, and that rare ability made her a target of the Gestahlian Empire as a child. Emperor Gestahl stole her away from her parents and turned her into a tool to be used for his dreams of world domination. Under the empire\'s control, she was ordered to pilot a set of Magitek armor to invade the mining town of Narshe and seize the esper that had been found encased in ice within the mine there.',17,2,12,2,3,4,'-','Unit-Magitek_Armor_Terra-4.png','dc8d1dfd-40d1-40f0-8ce6-018b0493d2a8',1752,79,79,67,71,59,3,'2016-09-01 08:58:17','2017-04-26 16:17:18'),
	(45,'Bartz','A young man who appears in the tales from another world, where he hailed from the village of Lix and was involved in the war of the Crystals. His father\'s last wish was for Bartz to travel the world, and thus he roams, from one land to the next with his chocobo, Boko. In the course of this wandering, he sees a meteorite fall from the sky and strike Tycoon. Following its path, he meets the princess Lenna, and Galuf, an old man who has lost his memories. This is how his true adventure begins. Using the skills that his father, Dorgann, passed on to him, he defeated many strong foes...though he cannot defeat his childhood fear of heights so easily.',23,2,34,1,3,6,'Doublehand','Unit-Bartz-6.png','0b031d71-7ece-46cd-b025-df0082ea5df3',2650,115,95,96,94,91,2,'2016-09-01 08:59:49','2017-04-26 16:17:17'),
	(46,'Firion','A young man who appears in tales from a distant world, where he features in a story of an empire and the rebellion against it. He lost his parents at a young age and was taken in by another family. He was like a true brother to their two children, Maria and Leon, and to Guy, another parentless child who came to live with them. When his homeland is destroyed by the Palamecian army, he is forced to flee. After leaving Fynn, he and hies friends encounter Princess Hilda, the leader of the rebel army, and are saved by her. Without any home to return to, he, Maria, and Guy throw their lot in with the rebels.',18,2,5,1,3,6,'Equip H Armor','Unit-Firion-6.png','8c413905-156e-4f72-b0c3-488c6eee6b6a',2721,110,102,99,88,88,2,'2016-09-01 09:00:43','2017-04-26 16:17:17'),
	(47,'Zidane','A young man who appears in tales of Gaia, a world foreign to this one. He is a lone orphan, adopted as a small child by the troupe of theatrical thieves known as Tantalus, and their leader, Baku. He was raised by Tantalus and considers the group his family, but even having such a home cannot erase his longing to discover his true roots. He has a bright and cheery disposition, and a strong sense of justice for a thief, but his womanizing tendencies keep the shine off of this diamond in the rough. The moment he spots a cute girl, he will pull out every trick in his bag to try to pick her up.',22,2,13,1,3,5,'Dual Wield','Unit-Zidane-5.png','b2aafde6-5a49-4e5f-9d37-7acb58766e0f',2527,109,104,99,87,85,3,'2016-09-01 09:03:44','2017-04-26 16:17:17'),
	(48,'Vaan','A young man who appears in tales of Ivalice, a world foreign to this one. He lost his elder brother in the war with the Archadian Empire and was left alone in the world. He lives in the slums of the Royal City of Rabanastre, the capital of Dalmasca, and makes ends meet by doing odd jobs for a shopkeeper named Migelo—and by stealing from the Archadians who occupy the city. Though he hates the empire, which took both his brother and his homeland from him, it is not enough to inspire him to any greater action. He drifts through his days with only vague dreams of becoming a sky pirate to keep him moving.',19,2,5,1,3,5,'Maximilian','Unit-Vaan-5.png','4da5b284-3be6-4a9a-9c16-cdbe5c8cbfe6',2639,110,99,97,87,88,2,'2016-09-01 09:04:52','2017-04-26 16:17:17'),
	(49,'Duane','A dark knight with arcane power. Duane was a loyal knight in service of a certain country who had reached an impasse in his sword fighting training. Wanting to grow further as a swordsman, Duane turned to the art of the dark blade as the suggestion of a superior. Afterwards he was proud to have reached a skill level on par with that of his comrades\', but he was cast out by them upon his return, on the grounds that the use of dark magic was not befitting of a knight.',16,2,35,1,3,5,'Bioga Blade','Unit-Duane-5.png','ccde3e53-0cfd-48cc-9a9a-16da1add7e0a',2360,127,96,84,104,85,1,'2016-09-01 09:09:17','2017-04-26 16:17:17'),
	(50,'Cerius','A green mage born in a certain country which sought to produce mages for the sole purpose of aiding others in battle. Cerius was an orphan trained exclusively in magic by the state, which led her to grow a bit indifferent towards people. However, she was always keenly aware of her surroundings and thus managed to retain her empathy, unlike her desensitized fellow green mages. She later fled the country, but no records of her reasons behind this act remain.',16,2,17,2,3,6,'Miracle Shoes','Unit-Cerius-6.png','4a94dd69-88bc-48b0-a73b-0a0c43edcd2b',2001,138,82,90,97,98,1,'2016-09-01 09:10:20','2017-04-26 16:17:17'),
	(51,'Roselia','A white magic practitioner with an otherworldly aura. Just like her father, Roselia was born and raised in the community of white mages that would eventually come to be known as Mysidia. Instead of having any noble intentions, she is driven by a sense of practicality and the knowledge that healing is her forte.',16,2,4,2,3,5,'Equip Staff','Unit-Roselia-5.png','2f758037-a07f-473d-a701-11071b831c5d',1955,143,77,81,89,114,1,'2016-09-01 09:11:29','2017-04-26 16:17:17'),
	(52,'Medius','A gunner who wielded state-of-the-art firearms he invented. Driven by the desire to create a weapon that could empower the weak against both swords and magic, Medius was both an accomplished researcher and marksman. However, as guns were ahead of his time, he was seen as a threat by those in power and forced to live as a fugitive.',16,2,10,1,3,6,'Growth Egg','Unit-Medius-6.png','29e62d92-bb31-4df6-a8ee-09bfa5da9c63',2264,102,106,84,91,84,6,'2016-09-01 09:12:19','2017-04-26 16:17:17'),
	(53,'Sarai','A dancer that belonged to an ancient palace. Sarai\'s performances mesmerized both royalty and commoners, yet she was just a girl who loved to dance. As her popularity increased, a struggle ensued over her possession. She disappeared in the midst of this and was eventually forgotten along with her kingdom.',16,2,20,2,1,2,'Silence Dance','Unit-Sarai-2.png','8b8dab1e-9885-4855-8f47-9ec7d12a94f3',815,48,39,35,37,37,2,'2016-09-01 09:13:11','2017-04-26 16:17:17'),
	(54,'Paula','A young girl who began studying magic as a means to overcome her introverted nature. Ironically, this further distanced her from others as her skills with black magic blossomed. Though compassionate at her core, she is ruthless in combat, eager to make sure that her sacrifices weren\'t in vain.',16,2,2,2,2,3,'Stonra','Unit-Paula-3.png','cb7ae918-99b6-4ba0-abc9-46a424ebb423',981,69,36,35,61,51,1,'2016-09-01 09:14:05','2017-04-26 16:17:17'),
	(55,'Kenyu','A martial artist who traveled the world with nothing but the clothes on his back. Through learning the techniques of the countless opponents he felled, Kenyu developed the martial art known as karate. Sadly, when he perished during his journey towards perfection, his art form died with him.',16,2,36,1,2,3,'Raging Fist','Unit-Kenyu-3.png','d1ef1c26-be02-412d-82f8-26976e94853e',1282,45,59,44,36,38,5,'2016-09-01 09:15:08','2017-04-26 16:17:17'),
	(56,'Ollie','A tough pirate who sailed from sea to sea, plundering at his will. Though mostly violent, Ollie had a soft side and never laid a hand on women or children. He and his clan were feared as the scourge of the seas, but as they would distribute their booty to faraway regions, they are now known as transporters of culture.',16,2,37,1,2,3,'Aquan Killer','Unit-Ollie-3.png','10c91dd8-91b0-4663-9ee9-351955b0bc62',1184,47,53,60,34,38,1,'2016-09-01 09:16:15','2017-04-26 16:17:17'),
	(57,'Carrie','A researcher of mechanical weapons from the town that would become Dilmagia. Though her research was intended to protect the young lady from beastly monsters, others used Carrie\'s inventions to commit mass destruction. Heartbroken, Carrie destroyed her precious research to prevent further bloodshed.',16,2,24,2,2,3,'Sunbeam','Unit-Carrie-3.png','5b6d1e5a-9ef7-45ec-97ee-3f0744ae1674',1055,61,55,41,43,44,3,'2016-09-01 09:17:02','2017-04-26 16:17:17'),
	(58,'Skaha','In the time before dragons were enemies to her species, Skaha had a bond with them like no other. Riding high in the sky atop her dragon, she would easily dodge her foes\' attacks and pounce upon them with expert precision. Unfortunately, her tiny clan died out before the rise of contemporary magic and warfare.',16,2,23,2,2,3,'Dragon Killer','Unit-Skaha-3.png','dd019370-0e86-4617-8e47-f813859d87bd',1157,62,64,48,48,47,1,'2016-09-01 09:17:53','2017-04-26 16:17:17'),
	(59,'Montana','A globetrotter who sought treasures and relics never seen before. Though he was a respected archaeologist and known for his research on ancient civilizations and rare cultures, Montana was secretly concerned that his macho appearance made him look like anything but a scholar.',16,2,34,1,2,3,'Camouflage','Unit-Montana-3.png','5f1e5ddf-8fa2-48d2-93c5-8b62d6f98f2b',1181,58,55,51,43,45,2,'2016-09-01 09:19:01','2017-04-26 16:17:17'),
	(60,'Russell','A warrior slave who fought for the entertainment of his rich master. Having the ways of a gladiator beaten into him from an early age, Russell died in the arena without ever experiencing much human emotion. Even as a vision, he only exists for the fight.',16,2,38,1,3,4,'Bladeblitz','Unit-Russell-4.png','e697baf8-068f-42d5-9a09-caef420583b4',1834,86,90,79,65,55,3,'2016-09-01 09:19:58','2017-04-26 16:17:17'),
	(61,'Miyuki','An expert in the ancient art of shinobi. Miyuki and her kind pledged allegiance only to their masters. Having devoted her life to servitude, she remembers little about everyday culture. Being extremely reticent, she has no interest in her conversations about her past life.',16,2,39,2,3,5,'Sakurafubuki','Unit-Miyuki-5.png','6ec62019-84dd-432a-9a70-49b9539c9276',2185,118,100,80,100,83,3,'2016-09-01 09:20:53','2017-04-26 16:17:17'),
	(62,'Golbez','A mage from a different world who tried to destroy a certain blue planet with two moons. He controls the armies of Baron from the shadows in order to seize the Crystals that lie in each land, and drives Baron to commit terrible atrocities. Beneath him serve the four Archfiends: Scarmiglione of earth, Cagnazzo of water, Barbariccia of wind, and Rubicante of fire. But his own power is also great, and he uses many cruel tactics in his various confrontations with Cecil, including controlling Cecil\'s best friend, Kain, with the darkness that lay hidden in the dragoon\'s heart.',21,2,40,1,3,5,'Meteor','Unit-Golbez-5.png','2e7d082f-1bfe-4bd9-843b-055ee501e2bb',2703,140,88,85,109,108,3,'2016-09-01 09:22:55','2017-04-26 16:17:17'),
	(63,'Galuf','An old warrior from another world who appears in the tales of the Crystals. He first met Bartz and his allies in the aftermath of a meteorite strike. At that time, he had no memory of his identity, save his own name and his duty to protect the Crystals. As he journeys with the others, though, he recalls more and more of his past life. He remembers that he comes from a different world than the one Bartz and the others live in. And there, he had been one of the four Warriors of Dawn, who sealed the warlock Exdeath in the past after a desperate struggle.',23,2,5,1,3,5,'Comet','Unit-Galuf-5.png','92b9b2d9-58f8-40b3-a951-55edf0fddf70',2127,94,81,69,80,66,2,'2016-09-01 09:24:19','2017-04-26 16:17:17'),
	(64,'Xiao','A precocious brawler, whose cheerful demeanor belies her prodigious gifts in the martial arts. Dressed in garb passed down by her ancestors, of whose line only her family remains. Though Xiao herself does not speak of it, it is believed she chose the warrior\'s path out of a wish to protect her heritage with her own fists.',16,2,8,2,3,6,'Kaiser Knuckles','Unit-Xiao-6.png','f3e91673-6387-4cfd-9808-84ce5b362277',2753,105,101,98,86,86,3,'2016-09-01 09:25:14','2017-04-26 16:17:17'),
	(65,'Artemios','A man who lived by hunting. Though Artemios wasn\'t from a hunting clan and started as a hobbyist, he knew no greater pleasure and eventually turned hunting into his trade. Dark rumors circulated that beasts weren\'t the only thing he hunted...',16,2,9,1,3,5,'Equip Bow','Unit-Artemios-5.png','35358805-617e-4e9a-a846-65a2e4868fc3',2090,126,101,82,95,88,3,'2016-09-01 09:26:27','2017-04-26 16:17:17'),
	(66,'Locke','A young man who appears in tales from another world, where he played a role in the great conflict between humankind and espers. A treasure hunter in search of ancient riches, he hates being called a thief. He is also a member of the Returners, a resistance group fighting against the empire. In the mining town Narshe, he meets Terra, a young woman able to use magic but possessing no memory of who she is, and he resolves to protect the vulnerable girl. He leads her to Figaro, where King Edgar is looking for ways to strike back against the Gestahlian Empire.',17,2,34,1,3,5,'Rising Sun','Unit-Locke-5.png','e2dc3372-be57-484e-a0fb-4937cd7acf57',2582,110,100,92,89,88,4,'2016-09-01 09:27:33','2017-04-26 16:17:17'),
	(67,'Leo','A man who appears in tales from another world, where he played a role in the great conflict between humankind and espers. This loyal soldier of the Gestahlian Empire refused a Magitek infusion, having achieved the rank of general depending only on the strength of his arm and the skill of his sword. He values fair play and honor in battle with a special hatred for underhanded strategies. Respectful of all lives, even those of his enemies, his character earns him esteem from both his own troops and the people of hostile nations. He bears a deep hatred for Kefka, for a man of such integrity cannot forgive the mage\'s evil ways.',17,2,41,1,3,5,'Aegis Shield','Unit-Leo-5.png','507e2e4f-bf06-4dba-873f-908359b54803',2715,105,111,100,79,80,1,'2016-09-01 09:29:37','2017-04-26 16:17:17'),
	(68,'Gilbert','A bard who sang his stories to the masses. In the time before airships, he played a vital role in the spread of information. However, due to his criticism of authority and the status quo, he was forced to live a life in exile.',16,2,11,1,3,5,'Dream Harp','Unit-Gilbert-5.png','2fd88982-f307-4f80-82c9-5cebb9d5fd3b',2222,96,88,80,100,97,2,'2016-09-01 09:30:38','2017-04-26 16:17:17'),
	(69,'Celes','A woman from another world who had a role to play in the war against the espers. She served as a top general in the Gestahlian Empire, tasked with many important missions, including the invasion of Maranda. As a child, she was implanted with magic by Cid, and raised to be a peerless force in battle. She wields her unnatural magic with ease, and her sword even seals the magic of others, making her one of the empire\'s greatest weapons, whose record of success in battle speaks for itself.',17,2,42,2,3,5,'Minerva Bustier','Unit-Celes-5.png','5b4f1070-2197-494a-acca-a30165bde560',2318,115,100,82,104,91,2,'2016-09-01 09:31:49','2017-04-26 16:17:17'),
	(70,'Kefka','A mage from another world where magic and espers once lived. His mind was irreparably damaged by an infusion of artificial magic, but his emperor still places a great deal of trust in this madman. He is as fickle as a child, and just as quick to explode in anger, but these are tantrums with a death toll-- he even kills women and children indiscriminately. Even his fellow soldiers in the Gestahlian Army hate and fear Kefka for his madness and cruelty.',17,2,43,1,3,6,'Ribbon','Unit-Kefka-6.png','18666cf1-03a3-40b5-92b5-8e2ca438ec32',2115,150,83,79,116,109,2,'2016-09-01 09:33:07','2017-04-26 16:17:17'),
	(71,'Rakshasa','An enigmatic young lady adept with both sorcery and the sword. Rakshasa fought from the shadows in the service of numerous nations, though her own origins remained a mystery, as she never spoke of herself. Nonetheless, her formidable powers earned her the respect and feat of both allies and enemies until the day she mysteriously vanished without a trace.',16,2,18,2,3,5,'Holy Blade','Unit-Rakshasa-5.png','f11d93e5-70ab-48c1-871b-c7dc2363d979',2257,118,93,85,100,86,1,'2016-09-01 09:34:09','2017-04-26 16:17:17'),
	(72,'Chizuru','A samurai who valued loyalty and decorum, and wielded her blade only in service to her master. Chizuru and her fellow samurai, honorable warriors of great pride not unlike the knights of today, are occasionally referenced in historical chronicles, but specific details of the time period in which they lived and the lands from which they hailed are scarce.',16,2,16,2,4,6,'Blade Mastery','Unit-Chizuru-6.png','0450c7ab-72cd-4487-a86d-443bcb443243',2536,103,120,99,83,82,2,'2016-09-01 09:35:00','2017-04-26 16:17:17'),
	(73,'Hayate','The legitimate successor of a ninja clan who accepted orders from his master to carry out assassinations and infiltrations. Hayate took many pupils under his wing while working for the same master his family had loyally served for generations. After some time he apparently left in search of his younger sister, a ninja herself who fled their home under mysterious circumstances. No records remain of what became of the two thereafter.',16,2,39,1,3,5,'Black Cowl','Unit-Hayate-5.png','803afb35-8e40-4a88-aecf-d3efc08c2572',2305,96,113,84,93,76,2,'2016-09-01 09:35:47','2017-04-26 16:17:17'),
	(74,'Warrior of Light','A great hero sung of in tales from a distant world. One of the warriors of light whose coming was foretold in the prophecies of old. The four warriors of light arrived in the land of Cornelia each bearing a crystal that has lost its light, and with no memories to speak of. In time, they realized that the crystals they held were inextricably linked to the four elements that sustained their world, and set off on a journey to instill them with light anew.',20,2,44,1,4,5,'Light\'s Blessing','Unit-Warrior_of_Light-5.png','61b3a071-2598-44f5-9167-d90c09250818',2713,119,100,95,97,96,3,'2016-09-01 09:36:59','2017-04-26 16:17:17'),
	(75,'Tellah','A wizened old mage whose story is told in tales of a distant blue planet where two moons rise in the sky. Known as the Great Sage of Mysidia for his prodigious arcane knowledge, he tragically brought great destruction to his homeland when his pursuit of forbidden knowledge released magical energies that ran amok, causing great casualties among his fellow mages. To atone for his crimes, he exiled himself from Mysidia, taking up residence in the far-flung desert town of Kaipo.',21,2,45,1,3,5,'MP +30%','Unit-Tellah-5.png','59e55b2c-cc32-416b-964e-758e54f1c92c',2117,129,75,78,110,105,1,'2016-09-01 09:38:36','2017-04-26 16:17:17'),
	(76,'Lenna','A princess sung of in a tale of crystals from a far-flung world. The kind-hearted daughter of King Tycoon, she fears for her father\'s safety when he fails to return from a mission to investigate the Wind Crystal, setting out for the Shrine of Wind alone. On her way, she loses consciousness after a meteor crash, and is nearly kidnapped by a band of goblins before being saved by a young adventurer named Bartz. Together with an old man Galuf who has lost his memories, the three companions set out for the Wind Shrine.',23,2,46,2,3,5,'Magi Staff','Unit-Lenna-5.png','a9c0899a-2b72-445c-856b-0b5535d57397',2162,130,85,86,88,107,1,'2016-09-01 09:39:48','2017-04-26 16:17:17'),
	(77,'Amarant','A fighter who appears in tales of Gaia, a world foreign to this one. He was known by the alias, the Flaming Amarant, thanks to his bright-red hair and fearsome power. Having been alone since birth, he used his own fist to navigate his way through the world on his own. Because of this, he was unable to bring himself to trust others, and was rarely ever known to speak. Still, somehow, he found himself chasing after the man with the tail.',22,2,8,1,3,5,'HP +30%','Unit-Amarant-5.png','b1a1342d-ee6b-45d1-8081-2759ae68ecb6',2760,101,108,100,80,80,1,'2016-09-01 09:41:32','2017-04-26 16:17:17'),
	(78,'Lani','A female bounty hunter who appears in tales of Gaia, a world foreign to this one. Young and with beautiful brown skin, this self-proclaimed beautiful bounty hunter was somewhat full of herself. Her dream was to live a life of luxury, and to that end there was no job she would not undertake. Teaming up with the fearsomely powerful Amarant as another of Queen Brahne of Alexandria\'s hired assassins, she confronted her target Zidane. Despite her slender stature, she swung an axe as big as she was.',22,2,9,2,3,4,'Equip Axe','Unit-Lani-4.png','6071efb7-8f44-4914-a5d2-ee0b26e7078f',1650,95,80,68,84,76,1,'2016-09-01 09:42:22','2017-04-26 16:17:17'),
	(79,'Garnet','A princess who appears in tales of Gaia, a world foreign to this one. The most beautiful princess in Alexandria\'s history, her name was known far and wide. She felt sympathy and concern for the people of the kingdom, and was greatly pained by her mother Queen Brahne\'s unbending resolve in invading other countries. On her sixteenth birthday, in an attempt to get advice about her mother from her uncle Cid, regent of Lindblum, she asked Zidane, a thief who had broken in the castle, to kidnap her.',22,2,46,2,4,5,'Melody of Life','Unit-Garnet-5.png','64d71381-3ecc-41ba-916a-57bd9d9bf4d3',2142,144,86,84,99,117,1,'2016-09-01 09:44:44','2017-04-26 16:17:17'),
	(80,'Freya','A Burmecian woman who appears in tales of Gaia, a world foreign to this one. Despite being a dragon knight, the pride of Burmecia, she was forbidden to reenter her own country once she had left. Yet her pride in being a dragon knight never wavered, and she remained eternally zealous. She had a cool demeanor, with an old-fashioned way of speaking, and though she was quick to rebuke her companions, she felt very deeply for them. She was also an old friend of Zidane.',22,2,23,2,3,5,'Angel Earrings','Unit-Freya-5.png','7df44b04-eb7f-4350-b6c9-9c84b468d6bd',2545,112,103,93,86,90,1,'2016-09-01 09:46:56','2017-04-26 16:17:17'),
	(81,'Juggler','A warrior who appears in the tales of a distant world where crystals bring peace and prosperity to the people. The identity of this small creature, whose visible pom-pom suggests a possible relationship to the moogle race, is completely shrouded in mystery. Its weapon of choice seems to be knives, and beyond being merely light on its feet, it even moves around while balancing on a ball. Never seen without a smile on its face, those who study acrobatics have yet to reach a consensus on the meaning of its enigmatic grin.',11,2,47,1,4,5,'Sticky Fingers','Unit-Juggler-5.png','46fab61d-8e6a-4813-a141-5348e6d0afe2',2750,135,111,100,90,116,4,'2016-09-14 16:23:32','2017-04-26 16:17:18'),
	(82,'Thief','A warrior who appears in the tales of a distant world where crystals bring peace and prosperity to the people. Sensing a wicked presence nearby, the moogles called upon all their friends to ask for the protection of their precious crystals. The Thief, with his incredible agility in battle, and specializing in the collection of any gil scattered throughout the field, was one of them. The Thief is an indispensable ally when money is required to keep troops in top shape.',11,2,7,1,4,5,'Coin Steal','Unit-Thief-5.png','e9cbcd3e-f57e-4ed7-a886-d2151671a44d',2650,118,113,98,92,98,4,'2016-09-14 16:24:41','2017-04-26 16:17:18'),
	(83,'Fencer','A warrior who appears in the tales of a distant world where crystals bring peace and prosperity to the people. Sensing a wicked presence nearby, the moogles called upon their friends to ask for the protection of their precious crystals. The Fencer, who specializes in close combat, was one of them. Her sharp blade slices without mercy through any opponent that crosses her, while the grace with which she dodges her foes\' attacks is said to be quite beguilling.',11,2,48,2,4,5,'Lunge Combo','Unit-Fencer-5.png','3ed2f4f7-a591-4b3f-84fc-58d423a8ab30',2681,128,120,95,90,95,2,'2016-09-14 16:25:28','2017-04-26 16:17:18'),
	(84,'Ludmille','A red mage from the empire of Zoldaad. Ludmille\'s family were casualities of the war brought on by the empire; as a result, she spent most of her chilhood in an orphanage. Her tragic past caused her to grow up coveting power, which eventually motivated her to hone her skills for the purpose of joining the military forces of Zoldaad. The air of mistery she exudes always creates the impression that she is cold and distant.',16,2,22,2,3,5,'Dualcast','Unit-Ludmille-5.png','2b3f45f9-9e3c-49e1-800b-382af98ccdc4',2348,136,99,91,98,95,2,'2016-10-07 15:10:30','2017-04-26 16:17:17'),
	(85,'Alma','A young girl who appears in the tales of holy stones known as auracite in the distant world of Ivalice. Alma is the youngest of four siblings in the honorable House Beoulve\'s line of succession. She attends the Eagrose Preparatory Akademy, and is a cheerful and bright girl who readily befriends people across class boundaries. Alma favored her full brother, Ramza, over their two elder half brothers, and spent most of her life in a monastery. There she met Princess Ovelia, to whom she became a close friend after realizing they shared similar circumstances.',27,2,49,2,3,5,'Lordly Robe','Unit-Alma-5.png','7a309bff-88bb-47da-b10c-0dd8e7d6ef0a',2106,142,84,80,90,118,1,'2016-10-07 15:20:31','2017-04-26 16:17:18'),
	(86,'Charlotte','A kinght of Grandshelt on active duty, and Rain and Lasswell\'s peer. Charlotte\'s stern and austere personality causes her to butt heads with the easygoing Rain, leaving Lasswell to bear the brunt of her complaints about his friend. The anxiety she felt after learning that her two comrades would set off on a dangerous journey was so acute that it materialized into a crystal, allowing those with the power of visions to summon her forth.',16,2,3,2,3,5,'Equip H Shield','Unit-Charlotte-5.png','01d52fec-c8f2-4856-b682-75850db45791',2720,112,92,104,88,104,3,'2016-10-07 15:25:27','2017-04-26 16:17:17'),
	(87,'Lightning','A woman who appears in the tales of a world where the gods toy with humanity\'s fate. Lightning is a soldier from the floating continent of Cocoon, ruled by servants of the gods known as the fal\'Cie. Her unsociable and serious demeanor often makes her seem indifferent to those around her, when in reality she hides a gentle soul that drives her to face peril boldly to protect those she loves. Lightning gave up her post as a soldier to save her sister Serah, who had become a prisoner of the fal\'Cie, and boarded a train full of unjustly exiled citizens to defy the fate the gods had chosen for her.',26,2,50,2,5,6,'Aurora Scarf','Unit-Lightning-6.png','f92dca5a-57a3-4021-9f54-d6214f87f207',3615,157,145,126,123,120,5,'2016-10-07 15:28:48','2017-04-26 16:17:17'),
	(88,'Delita','A young man who appears in the tales of holy stones known as auracite in the distant world of Ivalice. Delita served the widely respected House of Beoulve, into which he and his sister Tietra had been adopted following the death of their severely ill parents. Once taken in, he became fast friends with Ramza, a son of the head of the house, Barbaneth Beoulve. It was Delita\'s adoptive father who would push him and Ramza to join the exclusive Gariland Royal Military Akademy. The two friends gradually formed a bond which transcended the social gap that originally separated them.',27,2,51,1,5,6,'Moonblade','Unit-Delita-6.png','06962f25-aa22-464a-baa5-419679979db1',3507,153,148,126,119,117,1,'2016-10-07 15:29:59','2017-04-26 16:17:18'),
	(89,'Gaffgarion','A mercenary who appears in the tales of holy stones known as auracite in the distant world of Ivalice. As tensions ran high due to the outbreak of war, Gaffgarion was hired by the Order of the Northern Sky to protect Princess Ovelia en route to Eagrose. He had in fact been division commander of the Order of the Eastern Sky during the Fifty Years\' War, but was expelled for the barbarism he employed to ensure his final victory. Now he serves as a superior to his comrade Ramza, who has renounced the name of his noble house.',27,2,52,1,4,5,'Bracer','Unit-Gaffgarion-5.png','4f5b4e75-ee47-4ebf-98cb-1b1481805e0e',2681,111,113,102,87,88,2,'2016-10-07 15:31:14','2017-04-26 16:17:18'),
	(115,'Lid','An airship engineer from Dirnado. From a young age, Lid would spend most of her time in her parents\' workshop toying with machines, which eventually elevated her skills to the best in the Industrial City. She also truly believes that she will be the one to inherit the name Cid, an honor granted only to the most brilliant of engineers. Lid\'s only serious flaw seems to be her strong love for gil.\n',16,2,54,2,3,5,'-','Unit-Lid-5.png','012ed83e-028e-4bd0-8777-08e20bf85446',2186,106,85,80,84,76,1,'2016-11-10 11:42:49','2017-04-26 16:17:17'),
	(116,'Ramza','A young man who appears in the tales of holy stones known as auracite in the distant world of Ivalice. Ramza is a mysterious warrior who left many questions unanswered, after his untimely death, regarding his role in the War of Lions, and his actions as a heretic. Born the third and last son of the noble house of Beoulve, he strove to uphold his family name by becoming a knight alongside his childhood friend Delita, eventually joining the Gariland Royal Military Akademy with him. However, when compared to his two half brothers who were already knights, he never considered himself worthy of the house name.\n',27,2,51,1,5,6,'Brave Suit','Unit-Ramza-6.png','9cf7eb54-a73c-4151-9f17-13b776dbebd9',3538,156,140,130,122,119,2,'2016-11-10 11:43:02','2017-04-26 16:17:18'),
	(117,'Agrias','A woman who appears in the tales of holy stones known as auracite in the distant world of Ivalice. Agrias was a knight serving the Lionsguard, the personal bodyguards of the Atkascha royal family, and was entrusted with protecting Princess Ovelia. Her loyalty to the crown was unquestionable, yet she abhorred the corruption in the powers-that-be of Ivalice; those who would exploit Ovelia for their own schemes. Agrias sought to shelter the princess from the perils of the upcoming war by relocating her to Gallione. There, they would meet the mercenary Ramza.\n',27,2,55,2,4,5,'Save the Queen','Unit-Agrias-5.png','53a62c45-1237-4f07-a47e-9ce91e8452cd',2674,126,108,95,90,90,2,'2016-11-10 11:43:10','2017-04-26 16:17:18'),
	(118,'Mustadio','A young man who appears in the tales of holy stones known as auracite in the distant world of Ivalice. He was the son of Besrudio Bunansa, a brilliant machinist famed for the creation of mechanical weaponry. Mustadio had mastered use of the pistol, a device that could fire metal projectiles at high speed when packed with explosive powder. Mustadio and his father found the Taurus auracite while at an excavation site in the clockwork city of Goug. This led the to be persecuted by the infamous Baert Trading Company until Ramza came to their rescue.\n',27,2,56,1,3,5,'Romandan Pistol','Unit-Mustadio-5.png','9375b5be-32d5-434a-84a5-a60f185df9a0',2364,108,105,85,90,83,3,'2016-11-10 11:43:22','2017-04-26 16:17:18'),
	(119,'Rosa','A white mage who appears in the tales of a blue planet watched over by two moons. Rosa was an expert archer possessed of great beauty and grace, but who had eyes only for her childhood friend Cecil. When informed that Cecil had perished during a mission to vanquish a certain Eidolon, she refused to accept it and left Baron in search of him. Alas, she was stricken with desert fever and collapsed in the outskirts of Kaipo. \n',21,2,6,2,4,5,'Goddess Bow','Unit-Rosa-5.png','29311a8d-962f-4e54-a3eb-376aaa66dc7b',2260,153,88,89,93,129,1,'2016-11-10 11:43:38','2017-04-26 16:17:18'),
	(120,'Dark Knight Cecil','A dark knight who appears in the tales of a blue planet watched over by two moons. Cecil came to regret his part in the mission to seize a Crystal from innocent people by order of the king. However, while yet mired in these uneasy contemplations, he was soon ordered to go on another mission, this time to deliver a special item to the summoner village of Mist. After Cecil and his good friend Kain arrived at Mist, they both watched the village burn to the ground courtesy of an incendiary bomb–the very item they had delivered.\n',21,2,57,1,5,6,'Deathbringer','Unit-Dark_Knight_Cecil-6.png','845f831e-d208-44e0-b1c6-36533b52d8fe',3711,145,155,123,116,117,1,'2016-11-10 11:43:46','2017-04-26 16:17:18'),
	(121,'Edge','A man who appears in the tales of a blue planet watched over by two moons. Edge was the prince of Elban, a nation rich in the ancient tradition of ninja; an art that Edge himself used in battle. He was rude, hotheaded, and stubborn, and his subordinates often bore the brunt of his rashness. However, his straightfoward personality and strong will were admired by many, who adoringly called him \"Young Highness\". \n',21,2,39,1,3,5,'Hanzo Gauntlet','Unit-Edge-5.png','b24c84d0-25e4-4c22-850c-bf1b3c9ba2ac',2552,113,113,86,91,78,3,'2016-11-10 11:44:00','2017-04-26 16:17:18'),
	(122,'Arc','A young boy hailing from another world where tales are passed down of the Crystals and the Warriors of Light. Like Luneth, Arc is an orphan raised by Elder Topapa in the village of Ur. Very mature for his age, he would rather spend his time reading books instead of playing outside. This leads other children in the village to bully him and call him a coward, which prompts him to head for the neighboring village of Kazus alone to fight off the ghosts apparently haunting it in order to prove them wrong.\n',25,2,58,1,3,5,'Omnirod','Unit-Arc-5.png','a7bd8cd6-7232-4017-846f-4e1b3ec27079',2097,149,88,85,107,96,1,'2016-11-10 11:44:16','2017-04-26 16:17:18'),
	(123,'Ingus','A young man hailing from another world where tales are passed down of the Crystals and the Warriors of Light. Ingus is an orphan who was raised as a loyal soldier of King Sasune\'s army. He is a levelheaded and honest young man who has won the trust of the King, and who has pledged his service to his country. Fortunately, he managed to escape the curse of the Djinn one day when he left the castle to train. Now he seeks his beloved, Princess Sara, who has gone missing, and hopes to free his people of the curse by heading to the Cave Altar with Luneth and the others.\n',25,2,59,1,3,5,'Letters and Arms','Unit-Ingus-5.png','6fa4cb38-9d33-4f17-80af-7fb4514bca2b',2421,130,102,90,90,89,3,'2016-11-10 11:44:28','2017-04-26 16:17:18'),
	(124,'Refia','A young girl hailing from another world where tales are passed down of the Crystals and the Warriors of Light. Refia is a very willful young lady who was raised in the village of Kazus by the mythril smith Takka. Disliking the strict smithing training her father forces upon her, she has run away from home numerous times. Having escaped the curse of the Djinn that struck her village by having run off to skip out on her training one day, she eventually joins Luneth and the others in order to save her foster father and the other villagers.\n',25,2,60,2,4,6,'Mentality','Unit-Refia-6.png','c6392965-bebe-4d6a-b7d4-7e7d3978db3a',3121,181,112,118,117,150,3,'2016-11-10 11:44:37','2017-04-26 16:17:18'),
	(125,'Luneth','A young boy hailing from another world where tales are passed down of the Crystals and the Warriors of Light. Like Arc, Luneth is an orphan raised by Elder Topapa in the village of Ur. A very active boy with a strong sense of morality, he is definitely a leader type figure amongst the other children of the village. However, his recklessness can prove to be his weakness at times. On a fateful day, Luneth went to explore the Altar Cave and received a revelation from the Crystal enshrined within. Incredulous, yet willing, he then set off on a journey to save the world.\n',25,2,5,1,5,6,'Celestial Gloves','Unit-Luneth-6.png','7310dd28-c9d1-4732-8920-455006631836',3625,155,146,127,115,117,3,'2016-11-10 11:44:52','2017-04-26 16:17:18'),
	(126,'Demon Rain','A knight of the Kingdom of Grandshelt, he and his friend Lasswell are considered two of the most formidable knights to grace the Royal Guard since Rain\'s father Sir Raegen.  Though he harbors conflicted feelings toward his father for having abandoned him and his family, he keeps this to himself when in the presence of Lasswell, who still deeply respects the man.\n',16,2,61,1,5,6,'Infernal Armlet','Unit-Demon_Rain-6.png','192f26d1-cc79-4d8d-84d7-fb1dddf794ef',3684,146,156,116,128,110,2,'2016-11-10 11:44:59','2017-04-26 16:17:18'),
	(127,'Dracu Lasswell','A knight of the Kingdom of Grandshelt whose talents earned him command of an airship alongside Rain. Lasswell is a tireless worker, entirely devoted to his duties and training. He holds the utmost respect for Rain\'s father, Sir Raegen, once a prominent knight of Grandshelt himself. Lasswell lends his strength to Rain as a way to honor the memory of his hero, while struggling with the fact that his prestigious lineage is not his own.\n',16,2,62,1,5,6,'Vampire Cloak','Unit-Dracu_Lasswell-6.png','d871c433-63b7-4a79-a71c-1e99a4855dd8',3354,154,150,124,130,108,1,'2016-11-10 11:45:12','2017-04-26 16:17:18'),
	(128,'White Witch Fina','A young girl who emerged from an earth crystal. Because she has amnesia, she relies on impulse to guide her actions, which can often cause trouble for her comrades. Having woken in a strange world without her memories, she struggles with confusion and anxiety, but displays great inner strength in joining Rain and Lasswell on their quest.\n',16,2,63,2,4,6,'Blessed Bow','Unit-White_Witch_Fina-6.png','10efab74-8182-473a-aed9-d188dd7f6534',2875,191,110,110,134,157,1,'2016-11-10 11:45:27','2017-04-26 16:17:18'),
	(129,'Black Cat Lid','An airship engineer from Dirnado, who grew from a kid toying with machines in her parents\' workshop to the finest engineer in the Industrial City. Lid is determined to inherit the name Cid, an honor granted only to the greatest in her trade. Her only serious flaw seems to be her love of money.\n',16,2,64,2,3,5,'Cat Hat','Unit-Black_Cat_Lid-5.png','cbcf86ab-3808-4a57-915d-112a5d32df36',2306,127,100,90,93,85,1,'2016-11-10 11:45:42','2017-04-26 16:17:18'),
	(130,'Nichol','A military tactician for the Olderion Federation, and one of the Wardens of the Waters, who have protected the Water Shrine for generations. His dedication to his role means that he disregards his own feelings, always choosing the greatest good for the greatest number. Never one to mince words, he is often misunderstood as a cynic.\n',16,2,65,1,3,5,'-','Unit-Nichol-5.png','bbedf1c3-ae6b-432b-9999-28a8ecd5b4ca',1921,125,82,80,100,85,1,'2016-12-02 12:26:45','2017-04-26 16:17:17'),
	(131,'Faris','A pirate captain from another world who appears in the tales of the Crystals. Although seemingly a rugged ruffian from the seas, Faris only began dressing as a man so that others would take her seriously. She sought to kidnap Lenna, the princess of Tycoon, for ransom when she came stumbling into her ship one day. However, she became curious about their possible connection after having noticed that they both wore the same pendant, and decides to help her and her party to reach the Wind Shrine.\n',23,2,66,2,3,5,'Syldra\'s Protection','Unit-Faris-5.png','46b345b2-2b21-44f0-8398-166b94d9c0cf',2612,117,104,90,103,86,1,'2016-12-02 12:30:10','2017-04-26 16:17:18'),
	(132,'Gilgamesh','Exdeath\'s bodyguard in another world where tales of the Crystals are told. Although Gilgamesh has enough power to eliminate the entire army of the Bal Kingdom, there is still something off about him. Having been tasked by Exdeath to keep a close watch on the prisoner Bartz and his companions, he eventually found himself cornered by Galuf who was attempting to rescue them. Gilgamesh then fled, but battled the party again once they reached the Big Bridge.\n',23,2,67,1,5,6,'Genji Glove','Unit-Gilgamesh-6.png','988faeec-22df-445f-a9e6-5302f248cabc',3630,150,149,136,114,116,1,'2016-12-02 12:30:29','2017-04-26 16:17:18'),
	(133,'Karl','A prominent summoner in lore from another world where humans and gods share a history. Karl is a member of the Akras Summoners\' Hall, and the commander of the 24th Demon Slayers Division. Not only is he known as the \"Rebel Lance,\" he was also granted the prestigious title of \"Nyonne.\" Karl\'s talent and skill were recognized when he defeated the demon Zagamlung, a feat that propelled him to the highest ranks of the Summoners\' Hall. However, he is not the kind to boast; always treating those around him with kindness. The trust he places in his childhood friend, a summoner like himself, is unbreakable.\n',14,2,27,1,4,5,'Seal of Destruction','Unit-Karl-5.png','989afe6e-289e-4e12-aca6-f4f8996fdcd7',2782,113,114,94,89,88,2,'2016-12-02 12:34:56','2017-04-26 16:17:18'),
	(134,'Seria','A prominent summoner in lore from another world where humans and gods share a history. Seria is a member of the Akras Summoners\' Hall, and commands her own Demon Slayers\' squadron. Though some may regard her aggressive nature as unfeminine, her skills as a warrior have earned her the nickname \"Goddess of the Arena,\" a womanly title that none would dare deny. The incredible power contained in her petite frame allows her to wield her sword with an incomparable fusion of ferocity and grace. In fact, Seria\'s only serious flaw may be her tendency to criticize others, harshly and at the drop of a tiara. Rumor has it that her use of the word \"idiot\" is legendary in her home world of Grand Gaia.\n',14,2,27,2,4,5,'Seal of Protection','Unit-Seria-5.png','2c9f3932-67dc-418b-8c64-7b8aaed03b9e',2733,117,106,90,93,93,2,'2016-12-02 12:35:13','2017-04-26 16:17:18'),
	(135,'Tilith','A prominent goddess in lore from another world where humans and gods share a history. Tilith pledged her service to Lucius, the god of the Gate, and took a certain summoner from the fantastical world of Grand Gaia under her wing. She may seem like a normal girl at first glance, but her divinity is apparent through the multiple miracles she has performed to save her summoner in moments of crisis. Ever a cheerful soul, even those who might normally poke fun at an innocent nature like hers cannot help but smile in her presence.\n',14,2,68,2,4,5,'Goddess\'s Protection','Unit-Tilith-5.png','c1047f0c-1eee-4af5-bc9d-6dc694168946',2148,140,80,82,104,119,1,'2016-12-02 12:35:25','2017-04-26 16:17:18'),
	(136,'Elza','A princess from another world where humans and gods share a history. Brilliant from a young age, she was expected to go far but was wrongly accused for a crime she did not commit when trying to protect her sister. She was then imprisoned for a long time and made to carry out secret missions. Released before the great war with the gods, Elza continued to watch over her sister from the shadows.\n',14,2,30,2,5,6,'Demon Scythe','Unit-Elza-6.png','4d3f4f10-3b1f-4616-a598-0f9a9e0ec998',3460,160,146,126,114,124,4,'2016-12-02 12:35:44','2017-04-26 16:17:18'),
	(137,'Maxwell','One of the Fallen Gods from another world where humans and gods share a history. According to legend, the Fallen Gods were divine beings who terrorized the world of Grand Gaia with their incredible power. As a Fallen God, Maxwell sought to take over the whole of Grand Gaia from her palace in St. Lamia. Having been tasked with the burden of resurrection, her ultimate goal was to destroy her world in order to rebuild it anew as its creator and mistress.\n',14,2,69,2,5,5,'Power of Creation','Unit-Maxwell-5.png','f2904aaa-adc4-42f9-93d9-a9d3fe40dbfb',2811,126,118,100,86,87,4,'2016-12-02 12:47:39','2017-04-26 16:17:18'),
	(138,'Snow','A young man who appears in the tales of a world where the gods toy with humanity\'s fate. Snow was the leader of NORA, a group that refused to rely on the fal\'Cie that ruled the floating continent of Cocoon. He was a fiery young man, often diving headfirst into danger, whose irrepressible spirit always had him in the front lines fighting to protect his comrades. When Snow learned that his lover Serah has been taken captive by the fal\'Cie, he headed toward the mysterious \"Vestige\" to save her.\n',26,2,50,1,4,6,'Champion\'s Belt','Unit-Snow-6.png','5e6fae93-41f1-46ed-be34-2ef0f8b06f66',3801,148,138,135,115,115,4,'2017-01-03 15:00:43','2017-04-26 16:17:18'),
	(139,'Vanille','A young lady who appears in the tales of a world where the gods toy with humanity\'s fate. Vanille was an innocent girl who knew no fear, yet at times she might suddenly succumb to the grief hidden deep inside. Though she understood little of day-to-day life in the fal\'Cie-ruled society of Cocoon, she was very knowledgeable about \"Pulse,\" the world below, and the cursed beings known as the \"l\'Cie.\" The source of her knowledge, however, remained a mystery.\n',26,2,50,2,4,5,'Magistral Crest','Unit-Vanille-5.png','7cea6f72-924b-4ce5-b672-aa09f2c6b84e',2216,144,94,85,103,118,1,'2017-01-03 15:00:54','2017-04-26 16:17:18'),
	(140,'Sazh','A man who appears in the tales of a world where the gods toy with humanity\'s fate. Sazh worked as a pilot of passenger ships in Cocoon, the floating continent ruled by servants of the gods known as the fal\'Cie. However, mysterious circumstances led him to board the same train, full of unjustly exiled civilians, as did Lightning, and he came to join her despite his lack of battle experience. Sazh\'s cheery, joking manner could cause others to misapprehend him as unserious, but in fact he had a mature outlook on life and could be counted on as a provider of wisdom. His constant companion was a chocobo chick.\n',26,2,50,1,3,5,'Twenty-sided Die','Unit-Sazh-5.png','e7f1d3e3-f7ef-4dbc-b80e-227df3cc5da2',2350,112,106,86,88,86,3,'2017-01-03 15:01:00','2017-04-26 16:17:18'),
	(141,'Hope','A boy who appears in the tales of a world where the gods toy with humanity\'s fate. Hope lived an ordinary life with his loving parents in Cocoon, the floating continent ruled by servants of the gods; beings known as the fal\'Cie. Apart from the rebellious attitude toward his father expected of a sensitive adolescent, his life was free of trouble. However, all that changed when he and his mother went on a trip to the seaside town of Bodhum and encountered the turmoil caused by the appearance of a creature from \"Pulse.\" From that moment on, Hope\'s life would never return to normalcy.\n',26,2,50,1,4,5,'Nue','Unit-Hope-5.png','060e1755-421b-4bca-a2fe-b31aeda8fbd8',2295,148,100,85,116,92,4,'2017-01-03 15:01:14','2017-04-26 16:17:18'),
	(142,'Fang','A woman who appears in the tales of a world where the gods toy with humanity\'s fate. Although Fang was one of the dreaded l\'Cie so feared by the people of Cocoon, she was somehow cooperating with their military forces. It was heard that she approached them in hopes of finding her missing childhood friend. Fang was a candid and sisterly warrior, who also enjoyed challenging formidable opponents to the death. However, she also had a tender heart; most tender of all if ever she witnessed her friends falling prey to their own fears.\n',26,2,50,2,3,5,'Equip Spear','Unit-Fang-5.png','21e8561f-0cfc-4ab4-b21c-6860e45f41ff',2580,116,113,92,90,90,3,'2017-01-03 15:01:31','2017-04-26 16:17:18'),
	(143,'Mercedes','The young head of a pirate clan that patrols the seas around Olderion. She\'s not just a pretty face, boasting powerful axe-wielding strength and unshaken charisma that separates her from the rest of the ruffians. All this points to a past which, given the comparatively peaceful state of Olderion, is surrounded in mystery as to how and why she became a pirate.\n',16,2,66,2,4,6,'Viking Axe','Unit-Mercedes-6.png','4da47941-03ae-45a7-8101-4b3c923070f4',3540,146,146,120,116,120,1,'2017-01-03 15:01:51','2017-04-26 16:17:18'),
	(144,'Noctis','A young man spoken of in stories from the faraway land of Eos. Prince and rightful heir to the throne in the Kingdom of Lucis which possesses the world\'s only crystal. He is powerful despite being of royal blood, and like his forefathers is able to unleash the \"Power of Kings,\" in which he can summon weapons to attack. Set to marry Lady Lunafreya of the imperial province of Tenebrae in accordance to the cease-fire with the Niflheim Empire, he sets off from the capital city Insomnia with his best friends, where his journey begins.\n',28,2,70,1,5,6,'Ring of the Lucii','Unit-Noctis-6.png','bbf778da-62a1-4514-8b2b-4e61cd8ae515',3824,174,158,120,150,136,3,'2017-01-03 15:03:20','2017-04-26 16:17:18'),
	(145,'Santa Roselia','A white magic practitioner with an otherworldly aura. Just like her father, Santa Roselia was born and raised in the community of white mages that would eventually come to be known as Mysidia. Instead of having any noble intentions, she is driven by a sense of practicality and the knowledge that healing is her forte.\n',16,2,4,2,4,6,'Pure Heart','Unit-Santa_Roselia-6.png','f4a1c0b9-edca-4c2b-ba37-04b45412f1e9',2984,180,107,112,120,152,1,'2017-01-03 15:03:30','2017-04-26 16:17:18'),
	(146,'White Knight Noel','A knight from the icy highlands, who was known for his generosity and nobility. His parents were residents of two neighbouring countries that shared a long history of war. From his father, Noel learnt how to pilot a robot whilst his mother trained him in the arts of magic. During a short period of time when the two countries were at peace, Noel was able to travel freely between them, helping the poor he met along the way by providing them with gifts.\n',16,2,71,1,5,6,'Ice Rosetta','Unit-White_Knight_Noel-6.png','44fc5d08-afa6-4fcf-bf10-5719a0625a2f',3660,162,114,139,136,112,2,'2017-01-03 15:03:39','2017-04-26 16:17:18'),
	(147,'Jake','The leader of the rebel army opposing the Zoldaad Empire. A lighthearted man by nature, Jake is even more easily swayed by women than Rain. However, he hides a fierce resolution within to protect those who suffer from oppression. When Jake first met Rain and his comrades, he made use of his sly and cunning to manipulate them into doing his bidding. These resourceful qualities, among others, are what make him such an efficient leader.\n',16,2,72,1,3,5,'-','Unit-Jake-5.png','ab26bafe-69ce-4948-b445-4aa1ed54ec92',2296,96,95,81,80,85,3,'2017-04-26 15:16:06','2017-04-26 16:17:17'),
	(148,'Elle','A soldier for the Olderion Federation. Despite having average abilities, he has a competitive spirit and a stronger desire than most to protect others. He is engaged, but given his intense personality she is constantly worried he is pushing himself too far.\n',16,2,73,1,3,5,'Arsha\'s Talisman','Unit-Elle-5.png','a825c8e0-7a8f-49b6-9f3b-6f62fa8c5eea',2721,114,106,94,85,84,1,'2017-04-26 15:16:14','2017-04-26 16:17:18'),
	(149,'Luka','A water priestess charged with protecting the Olderion Federation. She has a deep bond with the water crystal, the incredible power of which she uses to cleanse the waters that protect the city from monsters. She also has two brothers, both of whom serve in protecting their country.\n',16,2,74,2,4,6,'Water God\'s Protection','Unit-Luka-6.png','435787e4-c88f-43b1-a3eb-cf250ff1de92',3211,182,112,118,120,149,1,'2017-04-26 15:16:33','2017-04-26 16:17:18'),
	(150,'Dark Fina','\n',16,2,75,2,5,6,'Dark Bond','Unit-Dark_Fina-6.png','8590f823-404e-4de3-808c-7c6a285a565c',3472,190,115,120,150,128,4,'2017-04-26 15:16:50','2017-04-26 16:17:18'),
	(151,'Trey','A young man who appears in the tales of a world divided into four nations that individually control their own unique Crystals. Trey is a member of Akademeia\'s Class Zero, and a cadet in training to become Agito, the legendary savior or saviors. His excellent marks make him one of the most intelligent cadets in the class, and as such he has a lot of wisdom to impart on others. However, his tendency to ramble on without end often causes his classmates\' patience to run short. In battle, he can take enemies down from great distances with his bow.\n',29,2,76,1,3,5,'Knowledge','Unit-Trey-5.png','ee957053-33ef-47ec-9bbf-9fca2438e522',2545,112,105,92,89,93,2,'2017-04-26 15:17:05','2017-04-26 16:17:18'),
	(152,'Jack','A young man who appears in the tales of a world divided into four nations that individually control their own unique Crystals. Jack is a member of Akademeia\'s Class Zero, and a cadet in training to become Agito, the legendary savior or saviors. Jack is known as the class clown, as well as a positive person who never seems to stop smiling. These personality traits often lead others to underestimate him, but the stoicism he displays in battle leaves little doubt that his place as a member of Class Zero is well deserved. A single swing from his katana is enough to leave his enemies in pieces on the field.\n',29,2,76,1,3,5,'Ignorance','Unit-Jack-5.png','f509f70f-1f14-44c7-8dd4-64133fe13640',2308,110,118,84,86,92,2,'2017-04-26 15:17:12','2017-04-26 16:17:18'),
	(153,'Seven','A young lady who appears in the tales of a world divided into four nations that individually control their own unique Crystals. Seven is a member of Akademeia\'s Class Zero, and a cadet in training to become Agito, the legendary savior or saviors. As one of the oldest cadets, she always cares for and looks after her classmates, making her very popular among the younger girls in Akademeia. In battle she skillfully wields a special weapon known as the whipblade, allowing her to easily dispose of any enemies within her radius.\n',29,2,76,2,4,6,'Discernment','Unit-Seven-6.png','b2937671-cbd2-473c-a80d-b0ca32cf587c',3610,148,140,130,119,119,5,'2017-04-26 15:17:30','2017-04-26 16:17:18'),
	(154,'Ace','A young man who appears in the tales of a world divided into four nations that individually control their own unique Crystals. Ace was taken in at an early age, and has since been raised as a cadet to become Agito, the legendary savior or saviors. As an Agito Cadet he trains with Class Zero at the Akademeia, and wields a deck of magically infused cards as his weapon. Although he may appear cool and collected, he can be quite rash when overcome with emotion. Ace refers to Arecia, who heads Akademeia\'s Sorcery Division, as \"Mother.\"\n',29,2,76,1,5,6,'Acceptance','Unit-Ace-6.png','63628dd4-25e0-48a8-9d32-c65abe352a93',3500,155,119,118,147,125,5,'2017-04-26 15:17:41','2017-04-26 16:17:18'),
	(155,'Marie','A skilled green mage from Mysidia. Although most of the mages of her homeland, including those who are prominent, are considered to be strange characters in their own right, Marie stands out among them due to her unusually boisterous and energetic personality. Rumor has it that the comrades she supports in battle even enjoy watching her taunt the enemy after she has enfeebled them with her magic.\n',16,2,17,2,5,6,'Rainbow Robe','Unit-Marie-6.png','df12d6db-2f64-435f-919b-6d4d9e416d19',3484,182,118,122,131,142,1,'2017-04-26 15:17:51','2017-04-26 16:17:18'),
	(156,'Guy','A young man who appears in tales from a distant world, where he features in a story of an empire and the rebellion against it. Guy was taken in by Leon and Maria\'s parents along with the orphaned Firion as part of their family. He boasts of great physical power to match his bulky and gigantic stature, but contrary to what his appearance may lead others to believe, is very gentle and kind in nature. His eloquence with words leaves much to be desired, however, as being raised by wolves when he was a babe impaired his ability to speak from infancy.\n',18,2,5,1,3,5,'Hill Digger','Unit-Guy-5.png','28955f0d-4429-41f6-934e-0d39b4fa040c',2720,110,108,98,85,96,1,'2017-04-26 15:18:02','2017-04-26 16:17:18'),
	(157,'Leon','A young man who appears in tales from a distant world, where he features in a story of an empire and the rebellion against it. Leon is older brother to Maria, and adoptive brother to Firion and Guy. Eventually he loses his parents to the invasion of the Palamecian Empire that strikes his homeland, and becomes separated from his siblings after suffering an attack by a Dark Knight. Lead astray by the circumstances surrounding him, he comes to believe that power is everything and joins forces with the empire, where his skill is immediately recognized and rewarded.\n',18,2,52,1,4,5,'Dark Knight\'s Soul','Unit-Leon-5.png','32a2cee8-76ce-4efc-ac82-5a43c55ae7a6',2695,118,113,101,92,92,2,'2017-04-26 15:18:20','2017-04-26 16:17:18'),
	(158,'Emperor','The ruler of the empire that a rebel army opposes in tales from a distant world. The Emperor stands atop the war-hungry empire of Palamecia, and is a man with no regard for human life. Capable of terrible magic, he summons demonic forces from hell into the mortal realm to destroy the world. After leaving the kingdoms of Deist and Kashuan in ruins, he subjugates the remaining territories around him to his merciless rule. Even more disconcerting, however, he has also begun the construction of the Dreadnought, a war machine of great power capable of ruthless destruction.\n',18,2,77,1,5,6,'Mateus\'s Malice','Unit-Emperor-6.png','99889ed8-c3e1-4685-9241-e2aaa2a3d7c0',3521,184,116,121,149,134,2,'2017-04-26 15:18:31','2017-04-26 16:17:18'),
	(159,'Olive','A young girl capable of freely wielding heavy weaponry. She was an ace among her fellow gunners in the squad she belonged to. At the same time, it is also said that she was relied on by her friends thanks to her being so resourceful. Contrary to her bold actions on the field, she is usually quite bashful and quiet, and it has been told she seems most happy when she\'s alone, working on her guns.\n',16,2,78,2,5,6,'Sparky','Unit-Olive-6.png','89654236-16d5-4949-a387-4591f9c31c9d',3296,150,156,124,106,102,1,'2017-04-26 15:18:42','2017-04-26 16:17:18'),
	(160,'Shine','A maid who works for the emperor of Zoldaad, the empire that forever burns bright. A callous woman, in truth she is an expert at retrieving confidential information that she then shares with the rebel army opposing the empire, or with whomever pays enough money to procure it. Shine is actually one of the many false identities she has created over the years to carry out her business.\n',16,2,79,2,4,6,'Quick Assault','Unit-Shine-6.png','70071bc8-c1ed-4436-98e6-676e7cca3de3',3515,147,141,125,110,117,3,'2017-04-26 15:18:48','2017-04-26 16:17:18'),
	(161,'Shera','The first prince of the Zoldaad Empire, and the young man next in line for the imperial throne. Shera is a kind soul with sound judgment who has his doubts about the current militaristic aspirations of the empire. Unfortunately, his quiet personality and high regard for his subjects\' well being are regarded as nothing more than weakness in the eyes of the dictatorial emperor and his militant officials.\n',16,2,80,1,3,5,'Successor','Unit-Shera-5.png','29a01710-7bb4-42b4-849d-d553169cbccf',2542,112,105,96,89,88,2,'2017-04-26 15:19:07','2017-04-26 16:17:18'),
	(162,'Queen','A young lady who appears in the tales of a world divided into four nations that individually control their own unique Crystals. Queen was taken in at an early age, and has since been raised as a cadet to become Agito, the legendary savior or saviors. Her personality is as straightforward as the longsword she wields, which has earned her the nickname of \"class leader.\" On the battlefield her great knowledge of magic can prove invaluable, except in times of great peril where she ends up losing her cool.\n',29,2,76,2,5,6,'Wisdom','Unit-Queen-6.png','d2ade0e9-6d42-4171-820d-8cc0615c102c',3582,144,144,125,123,121,5,'2017-04-26 15:19:14','2017-04-26 16:17:18'),
	(163,'Nine','A young man who appears in the tales of a world divided into four nations that individually control their own unique Crystals. Nine is a member of Akademeia\'s Class Zero, and a cadet in training to become Agito, the legendary savior or saviors. He is brash in nature, and is as skilled with the lance as he is hot-headed. When Kurasame became Class Zero\'s new commanding officer, Nine\'s response was telling him to \"take a hike.\" However, he seems to completely trust Class Zero\'s adoptive mother, Arecia.\n',29,2,76,1,4,6,'Action','Unit-Nine-6.png','68275343-e320-40f7-9e13-cd83db63379a',3706,148,152,134,109,109,2,'2017-04-26 15:19:28','2017-04-26 16:17:18'),
	(164,'Cinque','A young lady who appears in the tales of a world divided into four nations that individually control their own unique Crystals. Cinque is a cadet in training to become Agito, the legendary savior or saviors, and a member of Akademeia\'s Class Zero. Although she appears to be the easy going type, she shows no mercy to her enemies in battle. In fact, among the various weapons used by the members of Class Zero, she chose the heavy and hardly maneuverable mace. However, her choice seems to have stemmed from the fact that a mace can inflict great damage with just one blow, ending battles more effortlessly.\n',29,2,76,2,3,5,'Innocence','Unit-Cinque-5.png','cd82a71a-c76e-4b0a-9cce-c1299147d346',2698,109,116,93,83,87,1,'2017-04-26 15:19:46','2017-04-26 16:17:18'),
	(165,'Eight','A young man who appears in the tales of a world divided into four nations that individually control their own unique Crystals. Eight was taken in at an early age, and has since been raised as a cadet to become Agito, the legendary savior or saviors, as a member of Akademeia\'s Class Zero. Although short in stature, he uses his own fists as weapons in battle. He also boasts of a knack for sound judgment and keen perception of his surroundings. Such skills can prove very valuable in infiltrations whilst posing as a prisoner of war, leading the mission toward success.\n',29,2,76,1,3,5,'Tranquility','Unit-Eight-5.png','5641804f-b9ae-4a63-ab2f-1fb6c7659506',2678,108,110,94,86,86,4,'2017-04-26 15:20:05','2017-04-26 16:17:18'),
	(166,'Orlandeau','A knight who appears in the tales of holy stones known as auracite in the distant world of Ivalice. Cidolfus Orlandeau is also known as \"Thunder God Cid,\" and is a man feared by many due to his reputation as the undefeated general of the Order of the Southern Sky under the banner of the Black Lion. Once the War of the Lions had erupted amidst disputes of succession within the royal family, his resolve to protect and fight for the people never faltered.\n',27,2,81,1,5,6,'Thunder God\'s Plan','Unit-Orlandeau-6.png','71447560-f4c4-418c-9a24-a9630e84421a',3621,142,155,124,124,116,2,'2017-04-26 15:20:11','2017-04-26 16:17:18'),
	(167,'Soleil','A young woman who served as a dancer in the front lines during the war. Soleil\'s bewitching dances not only serve to comfort the hearts of soldiers on the field, but the different magical properties tied to each dance help unlock their innermost potential as well. In battle she wields the throwing weapon known as the chakram, though being a pacifist at heart she prefers to use it as a part of her dance routine rather than for hurting others.\n',16,2,20,2,4,6,'Miracle Step','Unit-Soleil-6.png','9e12b421-ed4f-4315-b57f-e09ee1811bcb',3192,172,113,119,121,141,2,'2017-04-26 15:20:22','2017-04-26 16:17:18'),
	(168,'Ovelia','A young lady who appears in the tales of holy stones known as auracite in the distant world of Ivalice. Although Ovelia had been adopted by the king as his own daughter from an early age, she was forced to spend most of her life in a distant monastery away from her family. After the king\'s passing, Duke Larg and Duke Goltanna instigate a war for the rights of succession, and it is thus decided that Ovelia shall be taken to the latter\'s duchy of Gallionne for her safety. However, Goltanna\'s forces along with a supposed knight manage to kidnap her whilst attempting to flee Orbonne Monastery.\n',27,2,46,2,3,5,'Dreamwaker','Unit-Ovelia-5.png','9ff9a14f-c53a-430d-892f-a849fb29c8c1',2144,146,89,85,93,116,1,'2017-04-26 15:20:37','2017-04-26 16:17:18'),
	(169,'Lawrence','A knight from the Kingdom of Grandshelt. Although fairly close in age to Rain and his friends, as a late bloomer Lawrence never stood out much within his order. Nonetheless, he never minded it enough to let it affect his good rapport with Rain and Lasswell. On the field he leads a commando unit and fights gracefully with a rapier type blade.\n',16,2,5,1,3,5,'Monster Breastplate','Unit-Lawrence-5.png','b8df31f7-7abe-44b4-ba61-1b241dde5a6a',2611,116,112,87,90,86,1,'2017-04-26 15:20:54','2017-04-26 16:17:18'),
	(170,'Fryevia','An elven warrioress who claims to be the daughter of a merchant from a distant land. Fryevia is on a journey to find equipment suitable for her abilities, as she is much more skilled with the sword than the average soldier. She usually disguises herself as a human and enjoys interacting with others. Always exuding an air of purity and elegance, it may be surprising to learn that she believes money to be no object in order to obtain what she desires.\n',16,2,18,2,5,6,'Fryevia\'s Needle','Unit-Fryevia-6.png','ad6d35f3-5d00-4305-9248-1559e3039ef0',3750,195,145,120,145,120,3,'2017-04-26 15:21:05','2017-04-26 16:17:18'),
	(171,'Xon','A thief who lives on the streets of a distant land. Xon has made a living by selling what he pilfers from others for quite some time, always exaggerating the actual value of things that were not worth much in the first place. Although he feels no guilt about stealing from those with lavish lifestyles, he always shares his earnings with those who live off the streets. He is rumored to hold a certain teddy bear dear to his heart.\n',16,2,7,1,4,6,'Patches','Unit-Xon-6.png','3df89894-000b-4987-8bf1-fa89ae3701be',3530,142,140,124,120,116,3,'2017-04-26 15:21:20','2017-04-26 16:17:18'),
	(172,'Aiden','An aspiring young cleric from a distant land. Aiden\'s menacing look stems from the fact that he once trained to be a warrior. It wasn\'t until a certain incident took place that he began learning restorative magic, eventually becoming as proficient in it as his other fellow clerics. Unfortunately, however, he is very quick to anger and will not hesitate to use his staff to hit his enemies in battle before ever using it to conjure magic.\n',16,2,49,1,3,5,'Vestment of Mind','Unit-Aiden-5.png','f93c6642-8f07-4ab5-8e7a-669a7de68fb1',2717,110,85,91,86,104,2,'2017-04-26 15:21:26','2017-04-26 16:17:18'),
	(173,'Trance Terra','A woman who appears in tales from another world, where she played a role in the great conflict between humankind and espers. Able to wield magical powers believed lost to the world, Terra was used as a weapon by the Gestahl Empire bent on world domination. However, she was eventually saved by the treasure hunter Locke and joined him in the fight against the empire by becoming a member of the Returners. Dedicating herself to their cause, she travels with the group to see the esper Valigarmanda, where a strange power resonates with her. In moments, Terra transforms into an esper and flees to an unknown location.\n',17,2,33,2,5,6,'Soul of Thamasa','Unit-Trance_Terra-6.png','e404eebc-7d22-4686-a977-7f4b7bcd2111',3421,186,125,120,150,130,1,'2017-04-26 15:21:33','2017-04-26 16:17:18'),
	(174,'Setzer','A gambler from another world where magic and espers once lived. As owner of the airship known as the Blackjack, Setzer has spent most of his time gambling his life away, quite literally. He had planned to kidnap the famous opera star Maria to make her his bride, but his plans were foiled when she was replaced with Celes as part of her group\'s efforts against the empire. Although he sees through the farce, and the coin trick she performs for him, he still decides to keep his promise to help her.\n',17,2,82,1,4,6,'Fixed Dice','Unit-Setzer-6.png','d865f394-5678-458a-b30a-55165c0e7d64',3564,154,146,125,116,125,2,'2017-04-26 15:21:51','2017-04-26 16:17:18'),
	(175,'Gau','A feral child from another world where magic and espers once lived. Gau was abandoned by his father as a babe, and consequently grew alongside the beasts of the region known as the Veldt. Although he is not adept with words, he tries to communicate his emotions through gestures and physical motions. Eventually he runs into Sabin and his friends, who are en route to Narshe, and demands food from them. After Sabin gives him dried meat to earn his trust, Gau joins the party to show his gratitude. In turn, this ultimately results in him permanently joining the Returners on their efforts against the empire.\n',17,2,83,1,3,5,'Rage - Meteor','Unit-Gau-5.png','791d9101-40ec-41cd-92e4-27e74869dbd0',2704,112,116,98,81,80,4,'2017-04-26 15:21:59','2017-04-26 16:17:18'),
	(176,'Dangerous Ariana','A beautiful singer from a distant world, whose goal is to bring love and grow peace in the realm. Born as a talented young singer, she started performing from a young age. She became committed to her passion for music and eventually became a popular singer.\n',30,2,84,2,4,6,'Symphonic Flair','Unit-Dangerous_Ariana-6.png','775c4b84-4615-4824-aa98-5a59923a3ba2',2850,185,101,99,151,140,1,'2017-04-26 15:22:12','2017-04-26 16:17:18'),
	(177,'Ling','<Ling/fr\n<Ling/pt\n',16,2,20,2,4,6,'Venomous Edge','Unit-Ling-6.png','c86491e2-335e-483b-850b-f184fdee9bcf',2765,187,124,96,104,115,2,'2017-04-26 15:22:28','2017-04-26 16:17:18'),
	(178,'Yun','A silent warrior atop a chocobo who donned a curious piece of armor. Yun lost his parents during infancy after monsters viciously attacked his village, leaving nothing but death in their wake save for a single chocobo. Yun befriended the feathery creature, and they eventually left together on a journey around the world. The experience he gained through their rigorous journey helped him to develop unique battle abilities which he vowed to use to destroy the monsters that took the lives of those dearest to him. He is said to have continued his crusade against monsters until an illness claimed his life.\n',16,2,85,1,5,6,'Crimson Slayer','Unit-Yun-6.png','ed73d086-2fff-4c8c-a2f8-4d1b1d3afdd8',3525,132,150,124,110,116,5,'2017-04-26 15:22:44','2017-04-26 16:17:18'),
	(179,'Popoi','A young sprite searching for his home in a world protected by the great power of mana.  Despite being a bit cheeky and calculating, he has a very positive personality. Swept away in the flood that hit the forest of sprites, he was taken in by the village head at Gaia\'s Navel, however due to the shock of the flood he couldn\'t remember his own name or where he came from. He began to trick and steal from travellers in order to raise funds for his journey home, however, that was until he came across Randi, the boy with the legendary holy sword.\n',31,13,86,1,3,5,'Fairy Wisdom','Unit-Popoi-5.png','58c7b51c-765c-4d85-9f24-eee9f5dd4595',2160,142,87,84,108,92,4,'2017-04-26 15:23:03','2017-04-26 16:17:18'),
	(180,'Primm','A young girl who fought to save the man she loved in a world protected by the great power of mana. The daughter of the cabinet minister of the kingdom of Pandora, outside of losing her mother at a young age she was able to live a fairly carefree life, making her self-empowered and selfish. Having heard the knight Dyluck whom she loved had gone to fight an evil witch, she headed after him and left the kingdom. On her journey she was to come across a young boy about to be eaten by a great monster, which was to greatly impact her destiny.\n',31,2,87,2,4,6,'Deep Thoughts','Unit-Primm-6.png','760faa50-4d54-4ffd-9b03-e27970be349f',3235,180,119,116,129,144,3,'2017-04-26 15:23:08','2017-04-26 16:17:18'),
	(181,'Randi','A young boy who fought with a legendary holy sword in a world protected by the great power of mana. Though he was brought to Potos Village when he was very young by his mother, he soon found himself completely alone and without any family, at which time the village head took him in. However, seen as an outsider, he was picked on by the local bullies, and unfortunately grew up to be a very timid and cowardly little boy. Then one day, having pulled out the legendary holy sword, Randi set off to save the world in which the balance of mana had begun to crumble.\n',31,2,88,1,5,6,'Mana Blade','Unit-Randi-6.png','3c8bd9d5-37b9-4a7e-b109-a1f07a5d752a',3651,153,142,128,111,119,3,'2017-04-26 15:23:27','2017-04-26 16:17:18'),
	(182,'Cupid Luna','A young girl rumored by both humans and forest sprites to be beautiful and skillful with a bow. One day, she came across a traveler wandering through the woods, with whom she would then split her rations with. Upon doing so, the traveler took out some white garments, and began speaking. Though she was unable to understand what he was saying, she was taken by the beautiful clothes, so she accepted them and put them on.\n',16,2,89,2,3,5,'Soluna Ring','Unit-Cupid_Luna-5.png','be921945-2f9d-4dea-b808-9c02856bbc8c',2500,121,104,91,102,95,1,'2017-04-26 15:23:33','2017-04-26 16:17:18'),
	(183,'Cupid Artemios','A hunter who dedicated his life to the hunt. A cruel man who hunts not just beasts but even humans if asked, he was spotted wearing white garments as he hunted monsters. Since he would not speak himself of why he was doing so, the truth of the matter is still shrouded in mystery.\n',16,2,89,1,4,6,'Soluna Band','Unit-Cupid_Artemios-6.png','ae500777-3b65-45ca-8b2c-edc3978b76be',3128,170,135,111,127,120,3,'2017-04-26 15:23:40','2017-04-26 16:17:18'),
	(184,'Y\'shtola','A Miqo\'te hailing from Eorzea who appears in the tales of the world of Hydaelyn. Y\'shtola is one of the Scions of the Seventh Dawn, and heads an investigation being conducted in the marine city of Limsa Lominsa. As a native of the scholarly nation of Sharlayan, she is capable of advanced magic and is well versed in ancient languages. Although her unwavering calm and collected attitude makes her seem cold, a more vulnerable aspect of her personality shows when she meets monsters such as the land-dwelling jellyfish aurelia, or when someone grabs tightly onto her tail.\n',32,2,90,2,5,6,'Shard of Genius','Unit-Yshtola-6.png','54097424-483f-4b22-9489-fec2edcb4591',3029,190,115,110,122,148,1,'2017-04-26 15:53:59','2017-04-26 16:17:18'),
	(185,'Minfilia','A Hyur hailing from Eorzea who appears in the tales of the world of Hydaelyn. Minfilia is the leader of the Scions of the Seventh Dawn, an organization that has become involved in the multinational issues concerning the primals. Resolved to save Eorzea at all costs, she set up camp in Vesper Bay, west of Western Thanalan. Believing that those touched by the power of the Echo will act as the trump card to solve the dilemma concerning the primals, she is in search of those who can wield it, as well as any other adventurers willing to help her group\'s cause.\n',32,2,90,2,4,6,'Hydaelyn Guard','Unit-Minfilia-6.png','fa7d9a5f-80c3-4982-b34e-7d16e6dc1884',2855,153,112,110,112,140,1,'2017-04-26 15:54:09','2017-04-26 16:17:18'),
	(186,'Thancred','A Hyur hailing from Eorzea who appears in the tales of the world of Hydaelyn. Although he claims to be a wandering bard, Thancred is actually one of the Scions of the Seventh Dawn, and heads an investigation being conducted in the desert city of Ul\'dah. While a smooth-talker with a fondness for women off the field, the way he effectively overwhelms his opponents in battle shows no signs of delicacy. In the past, he lived as a thief on the streets of Limsa Liminsa until he met a sage by the name of Louisoix who persuaded him to turn his life around.\n',32,2,90,1,3,5,'Follower\'s Oath','Unit-Thancred-5.png','e2e85716-4825-4752-ab17-f1feb3f6dfcf',2199,113,109,94,89,89,2,'2017-04-26 15:54:25','2017-04-26 16:17:18');

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
