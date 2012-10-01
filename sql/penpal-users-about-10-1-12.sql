# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.25a)
# Database: penpal
# Generation Time: 2012-10-01 18:40:36 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` tinyint(1) DEFAULT NULL,
  `classroom_id` int(11) DEFAULT NULL,
  `is_registered` tinyint(1) DEFAULT '0',
  `status` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `suffix` char(3) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `about` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `role_id`, `classroom_id`, `is_registered`, `status`, `username`, `email`, `password`, `suffix`, `first_name`, `last_name`, `phone`, `created_at`, `updated_at`, `about`)
VALUES
	(1,1,NULL,0,1,NULL,'jasonpunzalan@gmail.com','$2a$08$vfDjjhEajZ72fzRcvZTPW.Cj0n008I2R5bhTBuVOjmXEgHstmTtn.',NULL,'Jason','Punzalan',NULL,'2012-10-01 14:38:38','2012-09-13 18:43:13','Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Curabitur blandit tempus porttitor. Maecenas sed diam eget risus varius blandit sit amet non magna.'),
	(2,2,5,0,1,NULL,'jason@smallknot.com','$2a$08$vfDjjhEajZ72fzRcvZTPW.Cj0n008I2R5bhTBuVOjmXEgHstmTtn.',NULL,'Jason','Punzalan',NULL,'2012-10-01 14:38:31','2012-09-13 18:43:13','Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Curabitur blandit tempus porttitor. Maecenas sed diam eget risus varius blandit sit amet non magna.'),
	(3,2,3,1,1,NULL,'jasonpunzalan@yahoo.com','$2a$08$vfDjjhEajZ72fzRcvZTPW.Cj0n008I2R5bhTBuVOjmXEgHstmTtn.',NULL,'Jason','Punzalan',NULL,'2012-10-01 14:38:27','2012-09-13 18:43:13','Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Curabitur blandit tempus porttitor. Maecenas sed diam eget risus varius blandit sit amet non magna.'),
	(4,2,3,1,1,NULL,'jas@gmail.com','$2a$08$vfDjjhEajZ72fzRcvZTPW.Cj0n008I2R5bhTBuVOjmXEgHstmTtn.',NULL,'Jason','Punzalan',NULL,'2012-10-01 14:38:22','2012-09-13 18:43:13','Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Curabitur blandit tempus porttitor. Maecenas sed diam eget risus varius blandit sit amet non magna.');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
