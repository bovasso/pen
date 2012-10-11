# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.1.65)
# Database: penpal
# Generation Time: 2012-10-11 21:43:21 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table activities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `activities`;

CREATE TABLE `activities` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `source_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;

INSERT INTO `activities` (`id`, `user_id`, `type`, `source_id`, `created_at`, `updated_at`)
VALUES
	(18,8,'comment',10,'2012-10-11 13:58:41','2012-10-11 13:58:41'),
	(31,8,'homework',29,'2012-10-11 16:11:11','2012-10-11 16:11:11');

/*!40000 ALTER TABLE `activities` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table answers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `answers`;

CREATE TABLE `answers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `is_draft` tinyint(1) DEFAULT NULL,
  `homework_id` int(11) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` text,
  `position` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;

INSERT INTO `answers` (`id`, `is_draft`, `homework_id`, `article_id`, `question_id`, `user_id`, `content`, `position`, `created_at`, `updated_at`)
VALUES
	(3,1,NULL,NULL,1,1,'t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.',1,'2012-09-28 16:14:46','2012-09-29 09:18:46'),
	(13,1,29,3,1,8,'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. adfadsfsdf',1,'2012-10-11 16:30:11','2012-10-11 16:38:35'),
	(16,0,9,3,1,2,'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. ',1,'2012-10-11 16:38:40','2012-10-11 16:38:41');

/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table articles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `content` text,
  `source` varchar(200) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `json` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;

INSERT INTO `articles` (`id`, `assignment_id`, `title`, `content`, `source`, `video`, `json`, `created_at`, `updated_at`)
VALUES
	(3,2,'dddd','<p>\n	afdasdf</p>\n','http://www.businessweek.com/articles/2012-09-27/an-obama-super-pac-with-swearing-sex-and-guns','adsfasdf','{\"icon\":\"http:\\/\\/static.btrd.net\\/favicon.ico\",\"author\":\"Justin Bachman\",\"text\":\"In an election year when the Koch brothers and casino king Sheldon Adelson have deployed their fortunes for Republicans, you\\u2019ve heard little about political operator Mik Moore. He\\u2019s a left-leaning New Yorker who runs a Jewish super PAC working to keep Barack Obama in the White House. His weapon of choice: a string of funny, intensely off-color videos starring comedian Sarah Silverman and actor Samuel L. Jackson.\\nThe group\\u2019s latest hit the Internet on Thursday, with Jackson telling voters to \\u201Cwake the f\\u2014 up!\\u201D and vote for Obama. The four-minute ad, available in both original explicit and bleeped versions, is based on the 2011 book for parents, Go the F**k to Sleep, both of which were written by Adam Mansbach. (Jackson read the audio version of the book, too.) In another video, Silverman offers to have \\u201Ctraditional lesbian sex\\u201D with Adelson, the billionaire CEO of Las Vegas Sands (LVS), if he\\u2019ll donate his pledged $100 million to Obama\\u2019s campaign instead of Romney\\u2019s.\\nMoore, 38, is president of the Jewish Council for Education and Research (JCER), a super PAC that first gained attention in the summer of 2008 with \\u201CThe Great Schlep,\\u201D an ad that featured Silverman urging young people to \\u201Cschlep\\u201D to Florida and urge their grandparents to vote for Obama. (\\u201CIf you knew that visiting your grandparents could change the world, would you do it? Of course you would. You\\u2019d have to be a douche-nozzle not to.\\u201D)\\nFour years later, the super PAC received a $200,000 donation in April from Alex Soros, the son of billionaire George Soros. (The senior Soros will donate $1 million to Priorities USA Action, a super PAC supporting Obama\\u2019s reelection effort, Bloomberg News reported on Thursday.) That money is helping fund as many as a dozen videos in the runup to the Nov. 6 election, three of them already released. \\u201CWe tend to work with a lot of comics because we feel humor is a good way of talking about issues that are hard to talk about,\\u201D Moore says. JCER will spend $300,000 to $400,000 on videos this year but will produce only as many as it can afford, he says.\\nAfter the Adelson video, Silverman produced one that decries new voter ID laws that have been enacted ahead of the 2012 election season. The video, \\u201CGet Nana a Gun,\\u201D features Silverman\\u2019s grandmother and notes that the new laws do not allow Social Security, military, or student ID cards as valid forms of identification. In Tennessee and Texas, however, a firearm permit with a photo is permissible for voting. The Department of Justice has challenged several of the new laws, and a federal court has blocked the Texas law. Silverman\\u2019s voter ID video had 1.8 million YouTube (GOOG) views by Sept. 27.\\nUntil 2011, when he started his own consulting firm, Moore worked for Bend the Arc, a Jewish organization that promotes social justice. He has also worked for unions, government agencies, and on New York City Public Advocate Mark Green\\u2019s unsuccessful 2001 bid for mayor. \\u201CThe area I\\u2019ve been working to innovate,\\u201D Moore says, \\u201Cis looking at how you build campaigns built around media, particularly new media and social networks. I think you can leverage smaller amounts of money to have a much bigger impact.\\u201D\\nThat\\u2019s the goal with the Silverman and Jackson videos, both of which have gone viral since they appeared on YouTube and sites like Yahoo! (YHOO), with additional traffic generated from news stories about them. While Moore won\\u2019t disclose who will appear in future videos to support Obama, he\\u2019s willing to dish one tidbit: \\u201CWe will do videos that don\\u2019t have cursing in them at all.\\u201D\",\"title\":\"An Obama Super PAC With Swearing, Sex, and Guns\",\"date\":\"on September 27, 2012\",\"media\":[{\"link\":\"http:\\/\\/images.businessweek.com\\/cms\\/2012-09-24\\/0924_romney_190x127.jpg\",\"primary\":\"true\",\"type\":\"image\"},{\"link\":\"http:\\/\\/images.businessweek.com\\/cms\\/2012-09-20\\/econ_obamanumbers39__01__190x127.jpg\",\"primary\":\"true\",\"type\":\"image\"},{\"link\":\"http:\\/\\/images.businessweek.com\\/cms\\/2012-09-11\\/0911_DavisAd_190x127.jpg\",\"primary\":\"true\",\"type\":\"image\"},{\"link\":\"http:\\/\\/images.businessweek.com\\/cms\\/2012-09-11\\/0911_yelp_190x127.jpg\",\"primary\":\"true\",\"type\":\"image\"},{\"link\":\"http:\\/\\/images.businessweek.com\\/cms\\/2012-09-10\\/0910_obama_190x127.jpg\",\"primary\":\"true\",\"type\":\"image\"},{\"link\":\"http:\\/\\/images.businessweek.com\\/cms\\/2012-09-25\\/0925_staples_190x127.jpg\",\"primary\":\"true\",\"type\":\"image\"},{\"link\":\"http:\\/\\/images.businessweek.com\\/cms\\/2012-09-07\\/0907_campaign_190x127.jpg\",\"primary\":\"true\",\"type\":\"image\"},{\"link\":\"http:\\/\\/images.businessweek.com\\/cms\\/2012-08-16\\/0816_nastycampaign_190x127.jpg\",\"primary\":\"true\",\"type\":\"image\"}],\"url\":\"http:\\/\\/www.businessweek.com\\/articles\\/2012-09-27\\/an-obama-super-pac-with-swearing-sex-and-guns\",\"xpath\":\"\\/HTML[1]\\/BODY[1]\\/DIV[2]\\/DIV[5]\\/DIV[1]\\/DIV[2]\\/DIV[3]\\/DIV[1]\"}','2012-09-18 00:00:00','2012-09-28 13:05:20');

/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table assignments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `assignments`;

CREATE TABLE `assignments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `week` tinyint(1) DEFAULT '1',
  `due_date` timestamp NULL DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `assignments` WRITE;
/*!40000 ALTER TABLE `assignments` DISABLE KEYS */;

INSERT INTO `assignments` (`id`, `course_id`, `week`, `due_date`, `name`, `video`, `description`, `created_at`, `updated_at`)
VALUES
	(2,1,1,'2012-09-01 00:00:00','Test1','Teasfd','<p>\n	fsdasdaadfsasdfadfs</p>\n','2012-09-17 00:00:00','2012-09-29 00:00:00'),
	(4,1,2,'2012-09-29 00:00:00','dddd',NULL,'<p>\n	adfsd</p>\n','2012-09-29 00:00:00','2012-09-29 00:00:00'),
	(5,1,3,'2012-09-29 00:00:00','dddd',NULL,'<p>\n	adfsd</p>\n','2012-09-29 00:00:00','2012-09-29 00:00:00'),
	(6,1,4,'2012-09-29 00:00:00','dddd',NULL,'<p>\n	adfsd</p>\n','2012-09-29 00:00:00','2012-09-29 00:00:00'),
	(7,1,5,'2012-09-29 00:00:00','dddd',NULL,'<p>\n	adfsd</p>\n','2012-09-29 00:00:00','2012-09-29 00:00:00'),
	(8,1,6,'2012-09-29 00:00:00','dddd',NULL,'<p>\n	adfsd</p>\n','2012-09-29 00:00:00','2012-09-29 00:00:00');

/*!40000 ALTER TABLE `assignments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table classrooms
# ------------------------------------------------------------

DROP TABLE IF EXISTS `classrooms`;

CREATE TABLE `classrooms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `age_range_start` tinyint(11) DEFAULT NULL,
  `age_range_end` tinyint(11) DEFAULT NULL,
  `class_size` tinyint(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `classrooms` WRITE;
/*!40000 ALTER TABLE `classrooms` DISABLE KEYS */;

INSERT INTO `classrooms` (`id`, `course_id`, `group_id`, `teacher_id`, `school_id`, `name`, `age_range_start`, `age_range_end`, `class_size`, `created_at`, `updated_at`)
VALUES
	(3,1,NULL,1,1,'ddddd',11,22,50,'2012-09-18 00:00:00','2012-09-18 00:00:00'),
	(4,1,NULL,1,1,'test2',11,22,25,'2012-09-18 00:00:00','2012-09-18 00:00:00'),
	(5,1,NULL,1,1,'one1',11,22,25,'2012-09-18 00:00:00','2012-09-18 00:00:00'),
	(6,1,NULL,1,1,'one1',11,22,11,'2012-09-18 00:00:00','2012-09-18 00:00:00'),
	(12,1,NULL,8,1,'assafdasfd',11,11,11,'2012-10-03 17:30:15','2012-10-03 17:30:15');

/*!40000 ALTER TABLE `classrooms` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `value` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;

INSERT INTO `comments` (`id`, `parent_id`, `user_id`, `value`, `created_at`, `updated_at`)
VALUES
	(1,NULL,8,'asdfsadfsaddfasddsdf','2012-10-07 13:22:25','2012-10-07 13:22:25'),
	(2,4,2,'asdfsadfsaddfasddsdf','2012-10-07 13:22:25','2012-10-07 13:22:25'),
	(7,4,8,'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. ','2012-10-11 13:42:41','2012-10-11 13:42:41'),
	(9,NULL,8,'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. ','2012-10-11 13:46:36','2012-10-11 13:46:36'),
	(10,NULL,8,'dddafasfsd','2012-10-11 13:58:41','2012-10-11 13:58:41'),
	(11,16,8,'test','2012-10-11 17:10:03','2012-10-11 17:10:03');

/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table courses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `courses`;

CREATE TABLE `courses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `register_deadline` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;

INSERT INTO `courses` (`id`, `name`, `start_date`, `end_date`, `register_deadline`, `created_at`, `updated_at`)
VALUES
	(1,'Session 1','2012-09-18 00:00:00','2012-09-26 00:00:00',NULL,'2012-09-14 13:43:00','2012-09-19 00:00:00');

/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `classroom_id` int(11) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table laravel_migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `laravel_migrations`;

CREATE TABLE `laravel_migrations` (
  `bundle` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`bundle`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table partnerships
# ------------------------------------------------------------

DROP TABLE IF EXISTS `partnerships`;

CREATE TABLE `partnerships` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL DEFAULT '0',
  `classroom_id` int(11) NOT NULL DEFAULT '0',
  `partnership_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `partnerships` WRITE;
/*!40000 ALTER TABLE `partnerships` DISABLE KEYS */;

INSERT INTO `partnerships` (`id`, `course_id`, `classroom_id`, `partnership_id`)
VALUES
	(9,1,4,3),
	(10,1,3,4);

/*!40000 ALTER TABLE `partnerships` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table penpals
# ------------------------------------------------------------

DROP TABLE IF EXISTS `penpals`;

CREATE TABLE `penpals` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `partnership_id` int(11) DEFAULT NULL,
  `classroom_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `penpal_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `penpals` WRITE;
/*!40000 ALTER TABLE `penpals` DISABLE KEYS */;

INSERT INTO `penpals` (`id`, `partnership_id`, `classroom_id`, `user_id`, `penpal_id`, `created_at`, `updated_at`)
VALUES
	(21,NULL,3,3,2,'2012-10-07 13:51:07','2012-10-07 13:51:07'),
	(22,NULL,3,4,10,'2012-10-07 13:51:07','2012-10-07 13:51:07'),
	(23,NULL,4,2,3,'2012-10-07 13:51:07','2012-10-07 13:51:07'),
	(24,NULL,4,10,4,'2012-10-07 13:51:07','2012-10-07 13:51:07'),
	(25,NULL,3,8,2,'2012-10-07 13:51:07','2012-10-07 13:51:07');

/*!40000 ALTER TABLE `penpals` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table questions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `questions`;

CREATE TABLE `questions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `position` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;

INSERT INTO `questions` (`id`, `assignment_id`, `title`, `position`, `created_at`, `updated_at`)
VALUES
	(1,2,'What is this thing called and blah?',1,'2012-09-18 00:00:00','2012-09-18 00:00:00');

/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'Administrator','2012-09-13 18:43:13','2012-09-13 18:43:13'),
	(2,'Student','2012-09-13 18:43:13','2012-09-13 18:43:13'),
	(3,'Teacher','0000-00-00 00:00:00','0000-00-00 00:00:00');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table schools
# ------------------------------------------------------------

DROP TABLE IF EXISTS `schools`;

CREATE TABLE `schools` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `state` char(2) DEFAULT NULL,
  `area` char(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `schools` WRITE;
/*!40000 ALTER TABLE `schools` DISABLE KEYS */;

INSERT INTO `schools` (`id`, `teacher_id`, `name`, `state`, `area`, `created_at`, `updated_at`)
VALUES
	(1,8,'school1','NY','u',NULL,NULL);

/*!40000 ALTER TABLE `schools` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_assignments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_assignments`;

CREATE TABLE `user_assignments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `assignment_id` int(11) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user_assignments` WRITE;
/*!40000 ALTER TABLE `user_assignments` DISABLE KEYS */;

INSERT INTO `user_assignments` (`id`, `user_id`, `status`, `assignment_id`, `article_id`, `created_at`, `updated_at`)
VALUES
	(9,2,'submitted',4,3,NULL,NULL),
	(18,3,NULL,2,3,'2012-10-11 16:16:28','2012-10-11 16:16:28'),
	(29,8,'submitted',2,3,'2012-10-11 16:30:02','2012-10-11 16:38:41');

/*!40000 ALTER TABLE `user_assignments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_roles`;

CREATE TABLE `user_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`)
VALUES
	(1,1,1,'2012-09-13 18:43:13','2012-09-13 18:43:13');

/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` tinyint(1) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
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
  `about_me` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `role_id`, `school_id`, `classroom_id`, `is_registered`, `status`, `username`, `email`, `password`, `suffix`, `first_name`, `last_name`, `phone`, `about_me`, `created_at`, `updated_at`)
VALUES
	(1,1,NULL,NULL,0,1,NULL,'jasonpunzalan@gmail.com','$2a$08$vfDjjhEajZ72fzRcvZTPW.Cj0n008I2R5bhTBuVOjmXEgHstmTtn.',NULL,'Jason','Punzalan',NULL,NULL,'2012-09-13 18:43:13','2012-09-13 18:43:13'),
	(2,2,NULL,4,0,1,NULL,'jason@smallknot.com','$2a$08$vfDjjhEajZ72fzRcvZTPW.Cj0n008I2R5bhTBuVOjmXEgHstmTtn.',NULL,'Jason','Punzalan',NULL,NULL,'2012-10-04 17:47:26','2012-09-13 18:43:13'),
	(3,2,NULL,3,1,1,NULL,'jasonpunzalan@yahoo.com','$2a$08$vfDjjhEajZ72fzRcvZTPW.Cj0n008I2R5bhTBuVOjmXEgHstmTtn.',NULL,'Jason','Punzalan',NULL,NULL,'2012-09-19 13:20:18','2012-09-13 18:43:13'),
	(4,2,NULL,3,1,1,NULL,'jas@gmail.com','$2a$08$vfDjjhEajZ72fzRcvZTPW.Cj0n008I2R5bhTBuVOjmXEgHstmTtn.',NULL,'Jason','Punzalan',NULL,NULL,'2012-09-19 13:20:18','2012-09-13 18:43:13'),
	(8,2,1,3,1,0,'','ddd@gmail.com','',NULL,'User1','safdfasdf',NULL,NULL,'2012-10-11 17:41:20','2012-10-03 08:19:30'),
	(10,2,NULL,4,0,1,NULL,'jason@smallknot.net','$2a$08$vfDjjhEajZ72fzRcvZTPW.Cj0n008I2R5bhTBuVOjmXEgHstmTtn.',NULL,'Jason','Punzalan',NULL,NULL,'2012-10-04 17:47:26','2012-09-13 18:43:13');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
