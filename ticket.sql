-- MySQL dump 10.13  Distrib 5.5.50, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: ticket
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
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '1',
  `ticket_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `id` (`id`),
  KEY `user_id` (`user_id`,`ticket_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=247 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'AF','Afghanistan'),(2,'AL','Albania'),(3,'DZ','Algeria'),(4,'DS','American Samoa'),(5,'AD','Andorra'),(6,'AO','Angola'),(7,'AI','Anguilla'),(8,'AQ','Antarctica'),(9,'AG','Antigua and Barbuda'),(10,'AR','Argentina'),(11,'AM','Armenia'),(12,'AW','Aruba'),(13,'AU','Australia'),(14,'AT','Austria'),(15,'AZ','Azerbaijan'),(16,'BS','Bahamas'),(17,'BH','Bahrain'),(18,'BD','Bangladesh'),(19,'BB','Barbados'),(20,'BY','Belarus'),(21,'BE','Belgium'),(22,'BZ','Belize'),(23,'BJ','Benin'),(24,'BM','Bermuda'),(25,'BT','Bhutan'),(26,'BO','Bolivia'),(27,'BA','Bosnia and Herzegovina'),(28,'BW','Botswana'),(29,'BV','Bouvet Island'),(30,'BR','Brazil'),(31,'IO','British Indian Ocean Territory'),(32,'BN','Brunei Darussalam'),(33,'BG','Bulgaria'),(34,'BF','Burkina Faso'),(35,'BI','Burundi'),(36,'KH','Cambodia'),(37,'CM','Cameroon'),(38,'CA','Canada'),(39,'CV','Cape Verde'),(40,'KY','Cayman Islands'),(41,'CF','Central African Republic'),(42,'TD','Chad'),(43,'CL','Chile'),(44,'CN','China'),(45,'CX','Christmas Island'),(46,'CC','Cocos (Keeling) Islands'),(47,'CO','Colombia'),(48,'KM','Comoros'),(49,'CG','Congo'),(50,'CK','Cook Islands'),(51,'CR','Costa Rica'),(52,'HR','Croatia (Hrvatska)'),(53,'CU','Cuba'),(54,'CY','Cyprus'),(55,'CZ','Czech Republic'),(56,'DK','Denmark'),(57,'DJ','Djibouti'),(58,'DM','Dominica'),(59,'DO','Dominican Republic'),(60,'TP','East Timor'),(61,'EC','Ecuador'),(62,'EG','Egypt'),(63,'SV','El Salvador'),(64,'GQ','Equatorial Guinea'),(65,'ER','Eritrea'),(66,'EE','Estonia'),(67,'ET','Ethiopia'),(68,'FK','Falkland Islands (Malvinas)'),(69,'FO','Faroe Islands'),(70,'FJ','Fiji'),(71,'FI','Finland'),(72,'FR','France'),(73,'FX','France, Metropolitan'),(74,'GF','French Guiana'),(75,'PF','French Polynesia'),(76,'TF','French Southern Territories'),(77,'GA','Gabon'),(78,'GM','Gambia'),(79,'GE','Georgia'),(80,'DE','Germany'),(81,'GH','Ghana'),(82,'GI','Gibraltar'),(83,'GK','Guernsey'),(84,'GR','Greece'),(85,'GL','Greenland'),(86,'GD','Grenada'),(87,'GP','Guadeloupe'),(88,'GU','Guam'),(89,'GT','Guatemala'),(90,'GN','Guinea'),(91,'GW','Guinea-Bissau'),(92,'GY','Guyana'),(93,'HT','Haiti'),(94,'HM','Heard and Mc Donald Islands'),(95,'HN','Honduras'),(96,'HK','Hong Kong'),(97,'HU','Hungary'),(98,'IS','Iceland'),(99,'IN','India'),(100,'IM','Isle of Man'),(101,'ID','Indonesia'),(102,'IR','Iran (Islamic Republic of)'),(103,'IQ','Iraq'),(104,'IE','Ireland'),(105,'IL','Israel'),(106,'IT','Italy'),(107,'CI','Ivory Coast'),(108,'JE','Jersey'),(109,'JM','Jamaica'),(110,'JP','Japan'),(111,'JO','Jordan'),(112,'KZ','Kazakhstan'),(113,'KE','Kenya'),(114,'KI','Kiribati'),(115,'KP','Korea, Democratic People\'s Republic of'),(116,'KR','Korea, Republic of'),(117,'XK','Kosovo'),(118,'KW','Kuwait'),(119,'KG','Kyrgyzstan'),(120,'LA','Lao People\'s Democratic Republic'),(121,'LV','Latvia'),(122,'LB','Lebanon'),(123,'LS','Lesotho'),(124,'LR','Liberia'),(125,'LY','Libyan Arab Jamahiriya'),(126,'LI','Liechtenstein'),(127,'LT','Lithuania'),(128,'LU','Luxembourg'),(129,'MO','Macau'),(130,'MK','Macedonia'),(131,'MG','Madagascar'),(132,'MW','Malawi'),(133,'MY','Malaysia'),(134,'MV','Maldives'),(135,'ML','Mali'),(136,'MT','Malta'),(137,'MH','Marshall Islands'),(138,'MQ','Martinique'),(139,'MR','Mauritania'),(140,'MU','Mauritius'),(141,'TY','Mayotte'),(142,'MX','Mexico'),(143,'FM','Micronesia, Federated States of'),(144,'MD','Moldova, Republic of'),(145,'MC','Monaco'),(146,'MN','Mongolia'),(147,'ME','Montenegro'),(148,'MS','Montserrat'),(149,'MA','Morocco'),(150,'MZ','Mozambique'),(151,'MM','Myanmar'),(152,'NA','Namibia'),(153,'NR','Nauru'),(154,'NP','Nepal'),(155,'NL','Netherlands'),(156,'AN','Netherlands Antilles'),(157,'NC','New Caledonia'),(158,'NZ','New Zealand'),(159,'NI','Nicaragua'),(160,'NE','Niger'),(161,'NG','Nigeria'),(162,'NU','Niue'),(163,'NF','Norfolk Island'),(164,'MP','Northern Mariana Islands'),(165,'NO','Norway'),(166,'OM','Oman'),(167,'PK','Pakistan'),(168,'PW','Palau'),(169,'PS','Palestine'),(170,'PA','Panama'),(171,'PG','Papua New Guinea'),(172,'PY','Paraguay'),(173,'PE','Peru'),(174,'PH','Philippines'),(175,'PN','Pitcairn'),(176,'PL','Poland'),(177,'PT','Portugal'),(178,'PR','Puerto Rico'),(179,'QA','Qatar'),(180,'RE','Reunion'),(181,'RO','Romania'),(182,'RU','Russian Federation'),(183,'RW','Rwanda'),(184,'KN','Saint Kitts and Nevis'),(185,'LC','Saint Lucia'),(186,'VC','Saint Vincent and the Grenadines'),(187,'WS','Samoa'),(188,'SM','San Marino'),(189,'ST','Sao Tome and Principe'),(190,'SA','Saudi Arabia'),(191,'SN','Senegal'),(192,'RS','Serbia'),(193,'SC','Seychelles'),(194,'SL','Sierra Leone'),(195,'SG','Singapore'),(196,'SK','Slovakia'),(197,'SI','Slovenia'),(198,'SB','Solomon Islands'),(199,'SO','Somalia'),(200,'ZA','South Africa'),(201,'GS','South Georgia South Sandwich Islands'),(202,'ES','Spain'),(203,'LK','Sri Lanka'),(204,'SH','St. Helena'),(205,'PM','St. Pierre and Miquelon'),(206,'SD','Sudan'),(207,'SR','Suriname'),(208,'SJ','Svalbard and Jan Mayen Islands'),(209,'SZ','Swaziland'),(210,'SE','Sweden'),(211,'CH','Switzerland'),(212,'SY','Syrian Arab Republic'),(213,'TW','Taiwan'),(214,'TJ','Tajikistan'),(215,'TZ','Tanzania, United Republic of'),(216,'TH','Thailand'),(217,'TG','Togo'),(218,'TK','Tokelau'),(219,'TO','Tonga'),(220,'TT','Trinidad and Tobago'),(221,'TN','Tunisia'),(222,'TR','Turkey'),(223,'TM','Turkmenistan'),(224,'TC','Turks and Caicos Islands'),(225,'TV','Tuvalu'),(226,'UG','Uganda'),(227,'UA','Ukraine'),(228,'AE','United Arab Emirates'),(229,'GB','United Kingdom'),(230,'US','United States'),(231,'UM','United States minor outlying islands'),(232,'UY','Uruguay'),(233,'UZ','Uzbekistan'),(234,'VU','Vanuatu'),(235,'VA','Vatican City State'),(236,'VE','Venezuela'),(237,'VN','Vietnam'),(238,'VG','Virgin Islands (British)'),(239,'VI','Virgin Islands (U.S.)'),(240,'WF','Wallis and Futuna Islands'),(241,'EH','Western Sahara'),(242,'YE','Yemen'),(243,'YU','Yugoslavia'),(244,'ZR','Zaire'),(245,'ZM','Zambia'),(246,'ZW','Zimbabwe');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currency`
--

DROP TABLE IF EXISTS `currency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `currency` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) NOT NULL,
  `rate` decimal(8,2) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currency`
--

LOCK TABLES `currency` WRITE;
/*!40000 ALTER TABLE `currency` DISABLE KEYS */;
INSERT INTO `currency` VALUES (1,'SEK',1.00,'swedish krona'),(2,'EUR',0.10,'Euro'),(3,'USD',0.12,'US dolloar');
/*!40000 ALTER TABLE `currency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery_methods`
--

DROP TABLE IF EXISTS `delivery_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `delivery_methods` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `price_per_ticket` decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery_methods`
--

LOCK TABLES `delivery_methods` WRITE;
/*!40000 ALTER TABLE `delivery_methods` DISABLE KEYS */;
INSERT INTO `delivery_methods` VALUES (1,'DHL',35.00),(2,'UPS',30.00),(3,'Postal Sevice',10.00);
/*!40000 ALTER TABLE `delivery_methods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_type`
--

DROP TABLE IF EXISTS `event_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_type`
--

LOCK TABLES `event_type` WRITE;
/*!40000 ALTER TABLE `event_type` DISABLE KEYS */;
INSERT INTO `event_type` VALUES (1,'concert'),(3,'festival'),(2,'sport');
/*!40000 ALTER TABLE `event_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_type_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `overview` text,
  `venue` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country_id` int(3) NOT NULL DEFAULT '210',
  `date` datetime NOT NULL,
  `position` int(5) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `total_tickets` int(11) NOT NULL,
  `total_tickets_sold` int(6) NOT NULL DEFAULT '0',
  `total_sold_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `total_tickets_left` int(6) NOT NULL,
  `photo` varchar(50) NOT NULL DEFAULT 'NO_PHOTO',
  `seating_photo` varchar(100) NOT NULL DEFAULT 'NO_SEATING_PHOTO',
  PRIMARY KEY (`id`),
  KEY `name` (`name`,`event_type_id`,`venue`,`city`,`country_id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (53,3,'ICT Exhibition - 2','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident ut culpa veniam, laboriosam illum alias voluptate quibusdam aliquam dignissimos nostrum blanditiis impedit enim vitae, dolor, nam, quam voluptatem obcaecati ipsa. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident ut culpa veniam, laboriosam illum alias voluptate quibusdam aliquam dignissimos nostrum blanditiis impedit enim vitae, dolor, nam, quam voluptatem obcaecati ipsa!','Exhibition Center','Addis Ababa',210,'2016-05-28 08:00:00',0,1,0,0,0,0.00,0,'NO_PHOTO','NO_SEATING_PHOTO'),(62,2,'Community Shield','','Wembley Stadium','London',229,'2016-07-31 20:45:00',0,1,1,0,0,0.00,0,'62/event_photo.jpg','NO_SEATING_PHOTO'),(63,2,'NBA AllStar Match','All star NBA game!','LA court','Los Angeles',230,'2016-09-30 12:10:00',0,1,0,0,0,0.00,0,'63/event_photo.jpg','NO_SEATING_PHOTO'),(64,1,'Beyonce Le-monde concert','Beyonce rocking her new album to her rio fans!','Beach Side','Rio',30,'2016-12-31 03:10:00',0,1,0,0,0,0.00,0,'64/event_photo.jpg','NO_SEATING_PHOTO'),(65,3,'Game of thrones exhibition','','iceland mt','Iceland',210,'2017-04-11 05:06:00',0,1,0,0,0,0.00,0,'NO_PHOTO','NO_SEATING_PHOTO'),(66,1,'Mid-Night Festival','','mid-night club','Vaxjo',210,'2016-07-15 11:08:00',0,1,0,0,0,0.00,0,'NO_PHOTO','NO_SEATING_PHOTO'),(67,1,'The weeknd\'s Concert','','Leul Hall','Stockholm',210,'2017-01-01 10:04:00',0,1,1,0,0,0.00,0,'NO_PHOTO','NO_SEATING_PHOTO');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL DEFAULT 'No Subject',
  `text` text,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `id` (`id`),
  KEY `sender_id` (`sender_id`,`reciever_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (11,16,28,'Successful!','hello<br />\r\n<br />\r\n12<br />\r\n<br />\r\ns',1,'2016-07-25 18:31:04'),(21,16,26,'Message 06','blaha balh ispusdl sdf',1,'2016-07-30 19:28:06'),(22,16,26,'Message 2002','ls lsd lorem isps<br />\r\nsdjjsd<br />\r\n<br />\r\nsdjs <br />\r\n<br />\r\n<br />\r\nSincerly,<br />\r\n<br />\r\nUser',1,'2016-07-30 19:33:35'),(26,16,26,'(no subject)','hello',1,'2016-07-30 19:40:30'),(27,29,16,'Send my ticket dude','Hello',1,'2016-08-04 08:05:16');
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) NOT NULL,
  `event_id` int(6) DEFAULT NULL,
  `buyer_id` int(11) NOT NULL,
  `buyer_email` varchar(100) DEFAULT NULL,
  `number_of_tickets` int(5) NOT NULL,
  `currency_id` int(2) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `delivery_amount` decimal(6,2) DEFAULT NULL,
  `vat` decimal(6,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `transaction_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `delivery_method_id` int(2) DEFAULT NULL,
  `delivery_status` tinyint(1) DEFAULT '0',
  `address1` varchar(50) DEFAULT NULL,
  `address2` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `country_id` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ticket_id` (`ticket_id`,`buyer_id`),
  KEY `ticket_id_2` (`ticket_id`,`event_id`,`buyer_id`,`currency_id`,`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (2,104,65,26,'eyobtariku@gmail.com',1,1,500.00,35.00,80.25,615.25,'2016-07-27 12:58:00',NULL,NULL,NULL,0,'','','','','',210),(3,105,65,26,'eyobtariku@gmail.com',3,1,75.00,30.00,15.75,120.75,'2016-07-28 15:17:50',NULL,NULL,NULL,1,'bole street','gerji','addis ababa','a.a.','18800',67),(4,104,65,0,'guest',1,1,500.00,35.00,80.25,615.25,'2016-07-28 18:58:17','zig','zag',0,0,'bole avenue','gerji','addis ababa','a.a','18800',67),(5,79,63,26,'eyobtariku@gmail.com',2,1,200.00,70.00,40.50,310.50,'2016-07-28 19:12:00','','',1,1,'tafo side','ayat - yeka','addis ababa','a.a.','29097',67),(6,105,65,26,'eyobtariku@gmail.com',1,1,25.00,35.00,9.00,69.00,'2016-07-28 20:11:55','<br />\r\n<b>notice</b>:  undefined variable: first_','<br />\r\n<b>notice</b>:  undefined variable: last_n',1,0,'a','b','c','d','18800',210),(8,106,62,26,'eyobtariku@gmail.com',1,1,250.00,35.00,42.75,327.75,'2016-07-31 09:38:54','<br />\r\n<b>notice</b>:  undefined variable: first_','<br />\r\n<b>notice</b>:  undefined variable: last_n',1,1,'xxx','yyy','iii','slllsls','1888',210),(9,112,67,0,'simonsisay@zigzag.com',2,1,1000.00,20.00,173.40,1193.40,'2016-08-04 08:03:38','simon','sisay',3,0,'megenagna st','yeka','addis ababa','aa','18800',67);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_name` varchar(50) NOT NULL,
  `event_id` int(11) NOT NULL,
  `photo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `tag` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `event_id` (`event_id`,`tag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tax`
--

DROP TABLE IF EXISTS `tax`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tax` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT 'TAX',
  `rate` decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tax`
--

LOCK TABLES `tax` WRITE;
/*!40000 ALTER TABLE `tax` DISABLE KEYS */;
INSERT INTO `tax` VALUES (1,'VAT',0.17);
/*!40000 ALTER TABLE `tax` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket_type`
--

DROP TABLE IF EXISTS `ticket_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket_type` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket_type`
--

LOCK TABLES `ticket_type` WRITE;
/*!40000 ALTER TABLE `ticket_type` DISABLE KEYS */;
INSERT INTO `ticket_type` VALUES (1,'paper'),(2,'e-ticket'),(3,'paper'),(4,'e-ticket');
/*!40000 ALTER TABLE `ticket_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_type_id` int(1) NOT NULL DEFAULT '1',
  `event_id` int(11) NOT NULL,
  `package` varchar(50) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `currency_id` int(5) NOT NULL DEFAULT '1',
  `seller_id` int(11) NOT NULL,
  `total_ticket_number` int(6) NOT NULL,
  `sold_count` int(6) NOT NULL DEFAULT '0',
  `sold_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `tickets_left` int(6) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `ticket` varchar(30) NOT NULL DEFAULT 'NO_PDF',
  PRIMARY KEY (`id`),
  KEY `event_id` (`event_id`,`package`,`seller_id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (67,1,53,'Free',0.00,1,1,0,0,0.00,0,1,'NO_PDF'),(79,1,63,'right side',100.00,1,16,5,0,0.00,0,1,'NO_PDF'),(80,1,63,'left side',120.50,1,16,8,0,0.00,0,1,'NO_PDF'),(104,1,65,'iron throne',500.00,1,16,10,0,0.00,0,1,'NO_PDF'),(105,1,65,'North',25.00,1,16,20,0,0.00,0,1,'NO_PDF'),(106,1,62,'First Class',250.00,1,16,10,0,0.00,0,1,'NO_PDF'),(107,1,62,'Second Class',120.00,1,16,8,0,0.00,0,1,'NO_PDF'),(108,1,62,'Economy',70.00,1,16,12,0,0.00,0,1,'NO_PDF'),(110,1,66,'creepy',50.00,1,1,8,0,0.00,0,1,'NO_PDF'),(111,1,66,'glowing',80.00,1,1,5,0,0.00,0,1,'NO_PDF'),(112,1,67,'VIP',500.00,1,1,10,0,0.00,0,1,'NO_PDF'),(113,1,67,'Front Seat',120.00,1,1,30,0,0.00,0,1,'NO_PDF');
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiket_type`
--

DROP TABLE IF EXISTS `tiket_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiket_type` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiket_type`
--

LOCK TABLES `tiket_type` WRITE;
/*!40000 ALTER TABLE `tiket_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `tiket_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_priv`
--

DROP TABLE IF EXISTS `user_priv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_priv` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `priv_level` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `priv_level` (`priv_level`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_priv`
--

LOCK TABLES `user_priv` WRITE;
/*!40000 ALTER TABLE `user_priv` DISABLE KEYS */;
INSERT INTO `user_priv` VALUES (2,'admin'),(1,'super_admin'),(3,'user');
/*!40000 ALTER TABLE `user_priv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `priv_type_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `picture` varchar(50) NOT NULL DEFAULT 'no_user_photo.jpg',
  PRIMARY KEY (`id`),
  KEY `priv_type_id` (`priv_type_id`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (16,1,'superadmin@nordic.com','$2y$10$70/.TulVFwPdZwAE/WY/E.GQXk3OMv46lGmPEzDIAeRtujTuUk84S','super','admin','no_user_photo.jpg'),(17,2,'adminone@nordic.com','$2y$10$v.faqEknYG7XdShvyt.wb.S1rpR1VbGs9dlAFqAbXdI08dHHBdyt.','admin','one','no_user_photo.jpg'),(18,2,'admintwo@nordic.com','$2y$10$rakTP5DShatnm6PCdpTUgugFxMstn/ZxYLt9GkGGHP2V8TR8J2SgW','admin','two','no_user_photo.jpg'),(26,3,'eyobtariku@gmail.com','$2y$10$H.rQmKlF4r2bJj4YrXJiWOGV6SEahQH5n.0xBj1VNmjGv5/VVZrGm','eyob','tariku','no_user_photo.jpg'),(27,2,'johncena@nordic.com','$2y$10$7Sw.AQJj4gHxnhFp6JQffu8/stdM5vfeSNjwhKOMCUNfLSlPqjG8a','john','cena','no_user_photo.jpg'),(28,2,'johndoe@nordic.com','$2y$10$RCOD/pXR2ZAulFjfLN8ABuGGB9TlhUKeGIjsliaLTxlXEY.SwYfvi','john','doe','no_user_photo.jpg'),(29,3,'simonsisay@zigzag.com','$2y$10$936nOn6mGDUExRKzgnmOgucKXL3QSkwg4JK0eoexUphFfC0SoxQNi','simon','sisay','no_user_photo.jpg');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `website`
--

DROP TABLE IF EXISTS `website`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `website` (
  `title` varchar(50) NOT NULL DEFAULT 'nordic biljett',
  `tagline` varchar(250) NOT NULL DEFAULT 'buy upcoming event tickets',
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `youtube` varchar(100) DEFAULT NULL,
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`title`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `website`
--

LOCK TABLES `website` WRITE;
/*!40000 ALTER TABLE `website` DISABLE KEYS */;
INSERT INTO `website` VALUES ('nordic biljet','buy upcoming event tickets here','nordic@nordic.com','+4670-000-0000','','','',1);
/*!40000 ALTER TABLE `website` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-24 22:45:30
