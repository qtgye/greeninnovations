# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.01 (MySQL 5.6.26)
# Database: rgen
# Generation Time: 2016-03-04 00:42:42 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table faqs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `faqs`;

CREATE TABLE `faqs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `answer` text COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;

INSERT INTO `faqs` (`id`, `created_at`, `updated_at`, `question`, `answer`, `category`)
VALUES
	(3,'2016-02-26 03:33:00','2016-02-26 03:33:00','fsfsdfsd','fsdfsdf','fast'),
	(4,'2016-02-26 03:50:20','2016-02-26 03:50:33','What is the answer to life?','42','stm'),
	(14,'2016-03-02 17:25:34','2016-03-02 17:25:34','Why','Bcoz...','cat'),
	(15,'2016-03-02 17:28:28','2016-03-02 17:28:28','Why','Bcoz...','cat'),
	(16,'2016-03-02 17:34:32','2016-03-02 17:34:32','Why','Bcoz...','cat');

/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table info
# ------------------------------------------------------------

DROP TABLE IF EXISTS `info`;

CREATE TABLE `info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `info` WRITE;
/*!40000 ALTER TABLE `info` DISABLE KEYS */;

INSERT INTO `info` (`id`, `created_at`, `updated_at`, `name`, `value`)
VALUES
	(2,'2016-02-26 03:15:54','2016-02-27 16:02:59','logo','ac7ce38695ca0de37dcf09bec6f1aa84_gi logo hires-2.png'),
	(3,'2016-02-26 03:54:21','2016-02-27 11:52:49','description','Green Innovations is a Philippine Corporation in the business of water conservation, treatment and reuse. We use the FAST® Wastewater Treatment System and WesTech STM-Aerotor System™.'),
	(4,'2016-02-26 03:56:19','2016-02-26 07:39:23','vision','To be the preferred full service B2B provider of green technology in the Philippines distinguished by unsurpassed client services and pioneering product technology.'),
	(5,'2016-02-26 03:56:51','2016-02-26 07:39:13','mission','<p><strong>To bring</strong> new and effective solutions to address the water crisis in the Philippines while constantly evolving to tackle other critical environmental concerns</p>\r\n\r\n<p><strong>To protect</strong> the welfare of our clients by only proposing solutions that would be in their best interest</p>\r\n\r\n<p><strong>To help</strong> protect and enhance the environment through education of a triple bottom-line mindset</p>\r\n\r\n<p><strong>To develop</strong> a reputation for engineering and service excellence characterized by the implementation of effective and sustainable long-term solutions</p>\r\n\r\n<p><strong>To foster</strong> the proper growth and development of our employees in an environment characterized by hard work, competency, and achievement</p>\r\n'),
	(6,'2016-02-26 07:32:21','2016-02-27 12:01:37','site-title','Wastewater Treatment Company Philippines - Green Innovations'),
	(7,'2016-02-26 07:37:32','2016-02-26 07:37:32','address','604c Vicente Madrigal Building 6793 Ayala Avenue, Makati City'),
	(8,'2016-02-26 07:41:22','2016-02-26 07:41:22','favicon','9e819b4264be274bd9dafe99d62c0211_favicon.ico'),
	(9,'2016-02-26 07:52:42','2016-02-26 07:52:42','contact-line','T: +632 5019427 | F: +632 7533705 | sales@greeninnovations.com.ph'),
	(10,'2016-02-26 08:30:42','2016-02-26 08:30:42','phone','+632 5019427'),
	(11,'2016-02-26 08:32:16','2016-02-26 08:32:16','email','sales@greeninnovations.com.ph'),
	(12,'2016-02-26 08:42:31','2016-02-26 08:43:48','video','https://www.youtube.com/embed/dorZ3vag5PI'),
	(14,'2016-02-26 09:17:34','2016-02-27 12:01:20','about-video','https://www.youtube.com/embed/ffXHSWtdIbk'),
	(16,'2016-02-27 16:02:59','2016-02-27 16:08:06','fax','+632 7533705');

/*!40000 ALTER TABLE `info` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table media
# ------------------------------------------------------------

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;

INSERT INTO `media` (`id`, `created_at`, `updated_at`, `file_name`, `file_type`, `meta1`, `meta2`, `meta3`, `size`, `title`, `description`)
VALUES
	(1,'2016-02-25 23:45:51','2016-02-25 23:45:51','7ff3a117cb6cb89dbbe5834a5102180c_retrofast.png','image',NULL,NULL,NULL,5938,'retrofast.png',NULL),
	(2,'2016-02-25 23:46:17','2016-02-25 23:46:17','28a7450edfd4ed229b0f253c7051a272_microfast.png','image',NULL,NULL,NULL,6585,'microfast.png',NULL),
	(3,'2016-02-26 00:22:47','2016-02-26 00:22:47','7edeb14b137ba167e95b2dfced3b8165_bio.png','image',NULL,NULL,NULL,8801,'bio.png',NULL),
	(4,'2016-02-26 01:47:21','2016-02-26 01:47:21','f0d5c014903846ae9088526bed61a45f_Style-File-Jennifer-Lawrence-17.jpg','image',NULL,NULL,NULL,216988,'Style-File-Jennifer-Lawrence-17.jpg',NULL),
	(5,'2016-02-26 03:15:52','2016-02-26 03:15:52','a14b2a48554c452bc9c1ea8f7f4f6e2a_homelogo.png','image',NULL,NULL,NULL,14517,'homelogo.png',NULL),
	(7,'2016-02-26 03:59:32','2016-02-26 03:59:32','e4d55adb7348e6f0c7767e530886ebbf_wes.png','image',NULL,NULL,NULL,6570,'wes.png',NULL),
	(10,'2016-02-26 07:41:20','2016-02-27 05:00:08','9e819b4264be274bd9dafe99d62c0211_favicon.ico','image',NULL,NULL,NULL,1150,'favicon.ico',NULL),
	(11,'2016-02-26 09:09:53','2016-02-26 09:09:53','cf071cf0bea4f7f505d197774db7669a_gi logo hires-2 copy.jpg','image',NULL,NULL,NULL,622401,'gi logo hires-2 copy.jpg',NULL),
	(15,'2016-02-26 10:33:07','2016-02-26 10:33:07','ac7ce38695ca0de37dcf09bec6f1aa84_gi logo hires-2.png','image',NULL,NULL,NULL,484165,'gi logo hires-2.png',NULL),
	(16,'2016-02-27 05:23:59','2016-02-27 05:23:59','fe793113c57e83e46d67c9e84e71d076_Bicol-Sanitarium.jpg','image',NULL,NULL,NULL,59244,'Bicol-Sanitarium.jpg',NULL),
	(17,'2016-02-27 05:23:59','2016-02-27 05:23:59','9fa7a42f0fe51fb29593b732477f7543_Labuan-Public-Hospital.jpg','image',NULL,NULL,NULL,491785,'Labuan-Public-Hospital.jpg',NULL),
	(18,'2016-02-27 05:24:00','2016-02-27 05:24:00','70d31d665d461d921ced401194e0a541_Jose-Rizal-Memorial-Hospital.jpg','image',NULL,NULL,NULL,499959,'Jose-Rizal-Memorial-Hospital.jpg',NULL),
	(19,'2016-02-27 05:24:00','2016-02-27 05:24:00','01c98eba8b4fc177516246884222cf23_Busuanga-Bay-Lodge.jpg','image',NULL,NULL,NULL,485402,'Busuanga-Bay-Lodge.jpg',NULL),
	(20,'2016-02-27 05:24:00','2016-02-27 05:24:00','56854cb27837c0c93493fc5da2074e7d_Gentri-Medical-Center.jpg','image',NULL,NULL,NULL,724679,'Gentri-Medical-Center.jpg',NULL),
	(21,'2016-02-27 05:24:00','2016-02-27 05:24:00','f2fa51d2f5a1dff46c723c060273b1ff_iMall2.jpg','image',NULL,NULL,NULL,879716,'iMall2.jpg',NULL),
	(22,'2016-02-27 05:24:01','2016-02-27 05:24:01','5319819cb4edbcb653ee7f7f362ba378_San-Jose-District-Hospital3.jpg','image',NULL,NULL,NULL,464988,'San-Jose-District-Hospital3.jpg',NULL),
	(23,'2016-02-27 05:24:01','2016-02-27 05:24:01','9fa1cf9447d0c48be3a0724235b83a65_mindanao-central-sanitarium.jpg','image',NULL,NULL,NULL,1715871,'mindanao-central-sanitarium.jpg',NULL),
	(24,'2016-02-27 05:24:01','2016-02-27 05:24:01','ea56245095d6c2a7813fc4cdcc3b79e9_Margosatubig-Regional-Hospital.jpg','image',NULL,NULL,NULL,1957071,'Margosatubig-Regional-Hospital.jpg',NULL),
	(25,'2016-02-27 05:24:01','2016-02-27 05:24:01','78bf8a8d0e9b3811109fd3d3fee11d86_Silver-Finance-Building.jpg','image',NULL,NULL,NULL,1741653,'Silver-Finance-Building.jpg',NULL),
	(26,'2016-02-29 03:51:47','2016-02-29 03:51:47','fc0cae45a53e00bb1bdd16aa768605f1_high.png','image',NULL,NULL,NULL,8196,'high.png',NULL),
	(27,'2016-02-29 03:52:37','2016-02-29 03:52:37','28f052730f43f41a9d48800de8c4b25b_fast.png','image',NULL,NULL,NULL,4690,'fast.png',NULL),
	(28,'2016-02-29 03:53:23','2016-02-29 03:53:23','6327cbdad774af1886c50f958bc4f78c_advance.png','image',NULL,NULL,NULL,15690,'advance.png',NULL),
	(29,'2016-02-29 03:54:11','2016-02-29 03:54:11','3a2b7837e68f5031a39aade4d4110c54_sanitee.png','image',NULL,NULL,NULL,10883,'sanitee.png',NULL),
	(30,'2016-02-29 03:54:40','2016-02-29 03:54:40','b49e8c14c79d045c60644cd3482b0118_fog.png','image',NULL,NULL,NULL,8688,'fog.png',NULL),
	(31,'2016-02-29 03:56:28','2016-02-29 03:56:28','aeef132306b34278467354ddeb9e262c_lixor.png','image',NULL,NULL,NULL,5141,'lixor.png',NULL),
	(32,'2016-02-29 03:58:06','2016-02-29 03:58:06','3d735a9576ceefc78faa76da5a34cb34_landy.png','image',NULL,NULL,NULL,13555,'landy.png',NULL),
	(33,'2016-02-29 03:58:58','2016-02-29 03:58:58','886d612b75afa2f15cff936644908d5d_landox.png','image',NULL,NULL,NULL,10220,'landox.png',NULL);

/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`migration`, `batch`)
VALUES
	('2014_10_12_000000_create_users_table',1),
	('2014_10_12_100000_create_password_resets_table',1),
	('2016_02_16_034940_create_honmepage_carouse_table',1),
	('2016_02_16_035436_create_partners_table',1),
	('2016_02_16_035935_create_info_table',1),
	('2016_02_16_040203_create_products_table',1),
	('2016_02_16_040538_create_faqs_table',1),
	('2016_02_16_040721_create_new_table',2),
	('2016_02_16_144821_drop_homepage_carousel_table',3),
	('2016_02_17_050538_rename_logo_column_to_image',4),
	('2016_02_17_051709_add_name_column_to_products',5),
	('2016_02_19_033436_create_media_table',6),
	('2016_02_19_033737_change_product_media_columns',6),
	('2016_02_19_041416_add_size_to_media',7),
	('2016_02_19_042047_make_meta_columns_nullable',8),
	('2016_02_22_110219_add_title_and_description_to_media',9),
	('2016_02_25_151810_change_image_and_infofile_column_type',10),
	('2016_02_25_235214_add_image_column_to_partners',11),
	('2016_02_26_011307_create_projects_table',12),
	('2016_02_26_020418_rename_content_columns_to_value',13),
	('2016_02_27_161300_delete_value-type_column',14);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table news
# ------------------------------------------------------------

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table partners
# ------------------------------------------------------------

DROP TABLE IF EXISTS `partners`;

CREATE TABLE `partners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `partners` WRITE;
/*!40000 ALTER TABLE `partners` DISABLE KEYS */;

INSERT INTO `partners` (`id`, `created_at`, `updated_at`, `name`, `video_link`, `description`, `url`, `image`)
VALUES
	(1,'2016-02-26 00:17:11','2016-02-26 00:22:49','Bio-Microbics','https://youtu.be/jJtniWKwXd0','<p>A US based company with decades of experience worldwide. Bio-Microbics is a maker of innovative, affordable and reliable equipment for use in solving the growing challenges of the world&rsquo;s environmental problems.</p>\r\n','http://www.biomicrobics.com/','7edeb14b137ba167e95b2dfced3b8165_bio.png'),
	(4,'2016-02-26 03:59:35','2016-02-26 03:59:35','WesTech','https://youtu.be/9uiO0pV6Buw','<p>A US based supplier of process equipment for water, wastewater and industrial applications. From screening and headworks to tertiary treatment, from petrochemical process to water reclamation and drinking water, from small communities to large cities and factories. WesTech offers standard and custom process solutions for efficient solids-liquid separation.</p>\r\n','http://www.westech-inc.com/','e4d55adb7348e6f0c7767e530886ebbf_wes.png');

/*!40000 ALTER TABLE `partners` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `info_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `category`, `type`, `image`, `description`, `info_file`, `name`)
VALUES
	(1,'2016-02-25 23:45:53','2016-02-29 05:00:43','residential-small','small','7ff3a117cb6cb89dbbe5834a5102180c_retrofast.png','<p>RetroFAST&reg; wastewater treatment systems are used as an enhancement for conventional septic systems and provide a simple upgrade to renovate biologically failed septic systems. RetroFAST&reg; also reduces the concentration of high strength waste, making it a good fit for many troubled systems. When used with new home construction, the RetroFAST&reg; delivers high levels of treatment to help assure the clogging layer never forms in the first place.</p>\r\n\r\n<p>&nbsp;</p>\r\n',NULL,'RetroFast'),
	(2,'2016-02-25 23:46:19','2016-02-29 05:01:35','residential-small,residential-multifamily','small','28a7450edfd4ed229b0f253c7051a272_microfast.png','<p>MicroFAST&reg; wastewater treatment systems are ideally suited for use in single family dwellings, clustered residential developments and small communities. MicroFAST&reg; modules can also be used to upgrade struggling municipal package plants, providing small communities with innovative, affordable options versus centralized wastewater systems. Proven, Safe, Reliable.</p>\r\n',NULL,'MicroFast'),
	(5,'2016-02-29 03:51:52','2016-02-29 05:03:33','residential-multifamily,industrial-default','multifamily','fc0cae45a53e00bb1bdd16aa768605f1_high.png','<p>HighStrengthFAST wastewater treatment systems are ideally suited for use in restaurants, schools, trailer parks, affice buildings, commercial properties and other high-strength waste applications. Commercial facilities are among the most challenging projects, often having biological loading (BOD) and Fat, Oil, and Grease (FOG) levels that are significantly higher than standard sanitary-streangth sewage.</p>\r\n',NULL,'HighStrengthFAST '),
	(6,'2016-02-29 03:52:39','2016-02-29 05:05:05','residential-multifamily,commercial-default,industrial-default','multifamily','28f052730f43f41a9d48800de8c4b25b_fast.png','<p>MyFAST Plus wastewater treatment systems utilize the proven, reliable, and veratile MyFAST system with enhanced aeration pretreatment zone. Simple in design and easy to install, the MyFAST Plus wastewater treatment system adds the Lixor XD Submerged Aeration Systems as an effective pretreatment zone to reduce the levels of Nitrogen, BOD, TSS and better sludge management in the MyFAST treatment zone.</p>\r\n',NULL,'MyFAST Plus'),
	(7,'2016-02-29 03:53:26','2016-02-29 03:53:26','residential','multifamily','6327cbdad774af1886c50f958bc4f78c_advance.png','<p><span style=\"color: rgb(144, 143, 144); font-family: verdana; letter-spacing: 0.1px; line-height: 16.9px; text-align: justify; word-spacing: 1px; background-color: rgb(245, 245, 245);\">The STM-Aerotor&trade; Biological Nutrient Removal (BNR) System uses Integrated Fixed Film and Activated Sludge (IFAS) technology as part of a process that provides biological nutrient removal for municipal and industrial wastewater treatment.</span></p>\r\n',NULL,'STM-Aerotor™ Biological Nutrient Removal'),
	(8,'2016-02-29 03:54:13','2016-02-29 03:54:13','residential','other','3a2b7837e68f5031a39aade4d4110c54_sanitee.png','<p>Sanitee self-cleaning wastewater deflection screens (commonly known as septeic tank effluent by promoting natural sedimentation and excluding gas-lifted particles from entering the outlet pipe. Additionally, SaniTEE&rsquo;s patented keyhole weirs help to attentuate surge flows, delivering a more consistent flow for further treatment or dispersal.</p>\r\n',NULL,'Sanitee'),
	(9,'2016-02-29 03:54:42','2016-02-29 03:54:42','residential','other','b49e8c14c79d045c60644cd3482b0118_fog.png','<p>FOG Hog fat, oil &amp; grease interceptors combine a proven grease/water separation process with a new lightweight, noncorrosive, durable, operator-friendly interceptor design. The FOG HOG is easily installed in the commercial kitchens of restaurants, cafeterias, motels, hotels, and other institutions where food is prepared.</p>\r\n',NULL,'FOG Hog'),
	(10,'2016-02-29 03:56:29','2016-02-29 03:56:29','commercial','other','aeef132306b34278467354ddeb9e262c_lixor.png','<p>Lixor is a remarkably effective submerged aeration and mixing system. Extremely low maintenance and surprisingly efficient, LIXOR&rsquo;s non-clogging, Venturi-type diffuser supplies air for simultaneous aeration and mixing in a variety of wastewater applications.</p>\r\n',NULL,'Lixor'),
	(11,'2016-02-29 03:58:08','2016-02-29 03:58:08','industrial','industrial','3d735a9576ceefc78faa76da5a34cb34_landy.png','<p>The most recent advancement to surface aerator technology can be seen in the LANDY-7 impeller. The Landy impellers have always incorporated a sturdy design with zero failures due to cracked, sheared, or broken impeller blades. This new impeller increases oxygen transfer efficiency and reduces axial and radial loads.</p>\r\n',NULL,'LANDY-7'),
	(12,'2016-02-29 03:58:59','2016-02-29 03:58:59','industrial','other','886d612b75afa2f15cff936644908d5d_landox.png','<p>The Landox Channel Aeration System combines vertical drum mixers with fine bubble diffusion in an oxidation ditch arrangement.</p>\r\n',NULL,'Landox');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table projects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;

INSERT INTO `projects` (`id`, `created_at`, `updated_at`, `title`, `image`)
VALUES
	(5,'2016-02-27 05:32:43','2016-02-27 05:32:43','San Jose District Hospital','5319819cb4edbcb653ee7f7f362ba378_San-Jose-District-Hospital3.jpg'),
	(6,'2016-02-27 05:33:13','2016-02-27 05:33:13','Labuan Public Hospital','9fa7a42f0fe51fb29593b732477f7543_Labuan-Public-Hospital.jpg'),
	(7,'2016-02-27 05:33:48','2016-02-27 05:33:48','Jose Rizal Memorial Hospital','70d31d665d461d921ced401194e0a541_Jose-Rizal-Memorial-Hospital.jpg'),
	(8,'2016-02-27 05:34:03','2016-02-27 05:34:03','iMall','f2fa51d2f5a1dff46c723c060273b1ff_iMall2.jpg'),
	(9,'2016-02-27 05:34:22','2016-02-27 05:34:22','Gentri Medical Center','56854cb27837c0c93493fc5da2074e7d_Gentri-Medical-Center.jpg'),
	(10,'2016-02-27 05:34:37','2016-02-27 05:34:37','Busuanga Bay Lodge','01c98eba8b4fc177516246884222cf23_Busuanga-Bay-Lodge.jpg'),
	(11,'2016-02-27 05:34:57','2016-02-27 05:34:57','Bicol Sanitarium','fe793113c57e83e46d67c9e84e71d076_Bicol-Sanitarium.jpg'),
	(12,'2016-02-27 05:35:14','2016-02-27 05:35:14','Margosatubig Regional Hospital','ea56245095d6c2a7813fc4cdcc3b79e9_Margosatubig-Regional-Hospital.jpg'),
	(13,'2016-02-27 05:35:36','2016-02-27 05:35:36','Mindanao Central Sanitarium','9fa1cf9447d0c48be3a0724235b83a65_mindanao-central-sanitarium.jpg'),
	(14,'2016-02-27 05:35:51','2016-02-27 05:35:51','Silver Finance Building','78bf8a8d0e9b3811109fd3d3fee11d86_Silver-Finance-Building.jpg');

/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'jace','admin@gmail.com','$2y$10$GVK2nSfxElHyzFlNxBS41.17sk3kQutlysfHDxdEAMwXZ76cg29Ty','2xIoOnkAAOl7JoGC2NBeZlwvmGKyrYX9JyIfbbB4FjsATTwdlwjSnqmTuROM','2016-02-26 06:46:26','2016-02-29 14:10:57');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
