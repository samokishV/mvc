-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: samokish_db
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.18.04.1

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
-- Table structure for table `buyers`
--

DROP TABLE IF EXISTS `buyers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buyers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_buyers_1_idx` (`user_id`),
  CONSTRAINT `fk_buyers_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buyers`
--

LOCK TABLES `buyers` WRITE;
/*!40000 ALTER TABLE `buyers` DISABLE KEYS */;
INSERT INTO `buyers` VALUES (1,14,'VikaS','samokish.viktoria@gmail.com','+380980000000','Kiev'),(2,14,'VikaS','samokish.viktoria@gmail.com','+380980000000','Kiev'),(3,14,'VikaS','samokish.viktoria@gmail.com','+380980000000','Kiev'),(4,14,'VikaS','samokish.viktoria@gmail.com','+380980000000','Kiev'),(5,14,'VikaS','samokish.viktoria@gmail.com','+380980000000','Kiev'),(6,14,'VikaS','samokish.viktoria@gmail.com','+380980000000','Kiev'),(7,14,'VikaS','samokish.viktoria@gmail.com','+380980000000','Kiev'),(8,14,'VikaS','samokish.viktoria@gmail.com','+380980000000','Kiev');
/*!40000 ALTER TABLE `buyers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `src` text NOT NULL,
  `products_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_ibfk_1` (`products_id`),
  CONSTRAINT `images_ibfk_1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,'1.jpg',1),(2,'2.jpg',1),(3,'3.jpg',1),(4,'1.jpg',1),(5,'1.jpg',2),(6,'2.jpg',2),(7,'3.jpg',2),(8,'1.jpg',2),(9,'1.jpg',3),(10,'2.jpg',3),(11,'3.jpg',3),(12,'1.jpg',3),(13,'1.jpg',4),(14,'2.jpg',4),(15,'3.jpg',4),(16,'1.jpg',4),(17,'1.jpg',5),(18,'2.jpg',5),(19,'3.jpg',5),(20,'1.jpg',5),(21,'1.jpg',6),(22,'2.jpg',6),(23,'3.jpg',6),(24,'1.jpg',6),(25,'1.jpg',13),(26,'1.jpg',12),(27,'1.jpg',14);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buyer_id` int(11) DEFAULT NULL,
  `total` int(45) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_orders_1_idx` (`buyer_id`),
  CONSTRAINT `fk_orders_1` FOREIGN KEY (`buyer_id`) REFERENCES `buyers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (10,6,3648,'2019-01-28 15:47:11'),(11,7,450,'2019-01-28 15:47:57'),(12,8,3369,'2019-01-28 15:48:36');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(45) NOT NULL,
  `price` int(6) DEFAULT '0',
  `code` int(6) NOT NULL,
  `in_stock` int(6) DEFAULT '0',
  `created_at` text,
  `updated_at` text,
  `subtype` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Ficus lyre','Ficus lyre is an evergreen tree. The leaves are large, leathery, with a waxy coating, wavy edges, widening towards the end, resembling a lyre or a violin.','plants',450,10368,26,'2019-01-09 13:18:04','2019-01-28 15:47:45','krupnomery'),(2,'Araucaria','Default description','plants',250,20568,0,'2019-01-09 13:18:04','2019-01-21 13:39:23','krupnomery'),(3,'Caryota mitis','Default description','plants',310,51423,-2,'2019-01-09 13:18:04','2019-01-22 15:36:33','krupnomery'),(4,'Codiaeum KL Mini Curl','Default description','plants',658,65874,0,'2019-01-09 13:18:04','2019-01-22 11:06:14','krupnomery'),(5,'Dracaena Anita vertak','Default description','plants',125,99999,0,'2019-01-09 13:18:04','2019-01-09 13:18:04','krupnomery'),(6,'Dracaena Riki','Default description','plants',312,85469,0,'2019-01-09 13:18:04','2019-01-22 16:14:09','krupnomery'),(12,'Cordyline','Cordilina is a tree or shrub. Thick and strong roots in the cut have a white color. The shape of the leaf plates depends on the type of plant and can be lanceolate, xiphoid or linear. As a rule, the flowers are painted white or red, less often in lilac.','plants',480,52698,33,'2019-01-14 10:27:13','2019-01-28 15:48:24','decorative leafy'),(13,'Asystasia','Default description','plants',234,14789,20,'2019-01-14 10:34:10','2019-01-28 15:47:40','decorative leafy'),(14,'Rivina','Default description','plants',333,25897,19,NULL,'2019-01-28 15:48:32','decorative leafy');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_orders`
--

DROP TABLE IF EXISTS `products_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) DEFAULT NULL,
  `products_id` int(11) DEFAULT NULL,
  `qt` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_id` (`orders_id`),
  KEY `plants_id` (`products_id`),
  CONSTRAINT `products_orders_ibfk_1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `products_orders_ibfk_2` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_orders`
--

LOCK TABLES `products_orders` WRITE;
/*!40000 ALTER TABLE `products_orders` DISABLE KEYS */;
INSERT INTO `products_orders` VALUES (7,10,1,6,2700),(8,10,13,2,468),(9,10,12,1,480),(10,11,1,1,450),(11,12,1,1,450),(12,12,12,4,1920),(13,12,14,3,999);
/*!40000 ALTER TABLE `products_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `name` varchar(45) NOT NULL,
  `confirm` tinyint(1) DEFAULT '0',
  `hash` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `role` varchar(10) DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (14,'samokish.viktoria@gmail.com','d8578edf8458ce06fbc5bb76a58c5ca4','VikaS',1,'01be04f0218f709101a2c462a5b463e9','+380980000000','Lvov','user'),(15,'admin@mail.ru','d8578edf8458ce06fbc5bb76a58c5ca4','admin',0,NULL,NULL,NULL,'user'),(16,'1@1.1',NULL,'1',0,NULL,'1','1','guest'),(17,'1@1.1',NULL,'1',0,NULL,'1','1','guest'),(18,'1@1.1',NULL,'1',0,NULL,'1','1','guest'),(19,'1@1.1',NULL,'1',0,NULL,'1','1','guest'),(20,'1@1.1',NULL,'1',0,NULL,'1','1','guest'),(21,'1@1.1',NULL,'1',0,NULL,'1','1','guest'),(22,'1@1.1',NULL,'1',0,NULL,'1','1','guest'),(23,'1@1.1',NULL,'1',0,NULL,'1','1','guest');
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

-- Dump completed on 2019-01-28 15:55:48
