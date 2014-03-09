-- MySQL dump 10.13  Distrib 5.5.35, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: toowrappedup
-- ------------------------------------------------------
-- Server version	5.5.35-0ubuntu0.12.04.2-log

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
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_number` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer_index` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `report_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `answers_report_id_foreign` (`report_id`),
  CONSTRAINT `answers_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `display_count` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,0,'Group One','Group One','2014-03-09 15:56:50','2014-03-09 15:56:50'),(2,0,'Group One','Group One','2014-03-09 15:56:50','2014-03-09 15:56:50'),(3,0,'Group One','Group One','2014-03-09 15:56:50','2014-03-09 15:56:50'),(4,0,'Group One','Group One','2014-03-09 15:56:50','2014-03-09 15:56:50'),(5,0,'Group One','Group One','2014-03-09 15:56:50','2014-03-09 15:56:50'),(6,0,'Group One','Group One','2014-03-09 15:56:50','2014-03-09 15:56:50'),(7,0,'Group One','Group One','2014-03-09 15:56:51','2014-03-09 15:56:51'),(8,0,'Group One','Group One','2014-03-09 15:56:51','2014-03-09 15:56:51'),(9,0,'Group One','Group One','2014-03-09 15:56:51','2014-03-09 15:56:51'),(10,0,'Group One','Group One','2014-03-09 15:56:51','2014-03-09 15:56:51'),(11,0,'Group One','Group One','2014-03-09 15:56:51','2014-03-09 15:56:51'),(12,0,'Group One','Group One','2014-03-09 15:56:51','2014-03-09 15:56:51'),(13,0,'Group One','Group One','2014-03-09 15:56:51','2014-03-09 15:56:51'),(14,0,'Group One','Group One','2014-03-09 15:56:51','2014-03-09 15:56:51'),(15,0,'Group One','Group One','2014-03-09 15:56:51','2014-03-09 15:56:51'),(16,0,'Group One','Group One','2014-03-09 15:56:51','2014-03-09 15:56:51'),(17,0,'Group One','Group One','2014-03-09 15:56:52','2014-03-09 15:56:52'),(18,0,'Group One','Group One','2014-03-09 15:56:52','2014-03-09 15:56:52'),(19,0,'Group One','Group One','2014-03-09 15:56:52','2014-03-09 15:56:52'),(20,0,'Group One','Group One','2014-03-09 15:56:52','2014-03-09 15:56:52'),(21,0,'Group One','Group One','2014-03-09 15:56:52','2014-03-09 15:56:52'),(22,0,'Group One','Group One','2014-03-09 15:56:52','2014-03-09 15:56:52'),(23,0,'Group One','Group One','2014-03-09 15:56:52','2014-03-09 15:56:52'),(24,0,'Group One','Group One','2014-03-09 15:56:52','2014-03-09 15:56:52'),(25,0,'Group One','Group One','2014-03-09 15:56:52','2014-03-09 15:56:52'),(26,0,'Group One','Group One','2014-03-09 15:56:53','2014-03-09 15:56:53'),(27,0,'Group One','Group One','2014-03-09 15:56:53','2014-03-09 15:56:53'),(28,0,'Group One','Group One','2014-03-09 15:56:53','2014-03-09 15:56:53'),(29,0,'Group One','Group One','2014-03-09 15:56:53','2014-03-09 15:56:53'),(30,0,'Group One','Group One','2014-03-09 15:56:53','2014-03-09 15:56:53'),(31,0,'Group One','Group One','2014-03-09 15:56:53','2014-03-09 15:56:53'),(32,0,'Group One','Group One','2014-03-09 15:56:53','2014-03-09 15:56:53'),(33,0,'Group One','Group One','2014-03-09 15:56:53','2014-03-09 15:56:53'),(34,0,'Group One','Group One','2014-03-09 15:56:53','2014-03-09 15:56:53'),(35,0,'Group One','Group One','2014-03-09 15:56:54','2014-03-09 15:56:54'),(36,0,'Group One','Group One','2014-03-09 15:56:54','2014-03-09 15:56:54'),(37,0,'Group One','Group One','2014-03-09 15:56:54','2014-03-09 15:56:54'),(38,0,'Group One','Group One','2014-03-09 15:56:54','2014-03-09 15:56:54'),(39,0,'Group One','Group One','2014-03-09 15:56:54','2014-03-09 15:56:54'),(40,0,'Group One','Group One','2014-03-09 15:56:54','2014-03-09 15:56:54'),(41,0,'Group One','Group One','2014-03-09 15:56:54','2014-03-09 15:56:54'),(42,0,'Group One','Group One','2014-03-09 15:56:54','2014-03-09 15:56:54'),(43,0,'Group One','Group One','2014-03-09 15:56:54','2014-03-09 15:56:54'),(44,0,'Group One','Group One','2014-03-09 15:56:54','2014-03-09 15:56:54'),(45,0,'Group One','Group One','2014-03-09 15:56:55','2014-03-09 15:56:55'),(46,0,'Group One','Group One','2014-03-09 15:56:55','2014-03-09 15:56:55'),(47,0,'Group One','Group One','2014-03-09 15:56:55','2014-03-09 15:56:55'),(48,0,'Group One','Group One','2014-03-09 15:56:56','2014-03-09 15:56:56'),(49,0,'Group One','Group One','2014-03-09 15:56:56','2014-03-09 15:56:56'),(50,0,'Group One','Group One','2014-03-09 15:56:56','2014-03-09 15:56:56'),(51,0,'Group One','Group One','2014-03-09 15:56:56','2014-03-09 15:56:56'),(52,0,'Group One','Group One','2014-03-09 15:56:56','2014-03-09 15:56:56'),(53,0,'Group One','Group One','2014-03-09 15:56:57','2014-03-09 15:56:57'),(54,0,'Group One','Group One','2014-03-09 15:56:57','2014-03-09 15:56:57'),(55,0,'Group One','Group One','2014-03-09 15:56:57','2014-03-09 15:56:57'),(56,0,'Group One','Group One','2014-03-09 15:56:57','2014-03-09 15:56:57'),(57,0,'Group One','Group One','2014-03-09 15:56:57','2014-03-09 15:56:57'),(58,0,'Group One','Group One','2014-03-09 15:56:57','2014-03-09 15:56:57'),(59,0,'Group One','Group One','2014-03-09 15:56:57','2014-03-09 15:56:57'),(60,0,'Group One','Group One','2014-03-09 15:56:57','2014-03-09 15:56:57'),(61,0,'Group One','Group One','2014-03-09 15:56:57','2014-03-09 15:56:57'),(62,0,'Group One','Group One','2014-03-09 15:56:58','2014-03-09 15:56:58'),(63,0,'Group One','Group One','2014-03-09 15:56:58','2014-03-09 15:56:58'),(64,0,'Group One','Group One','2014-03-09 15:56:58','2014-03-09 15:56:58'),(65,0,'Group One','Group One','2014-03-09 15:56:58','2014-03-09 15:56:58'),(66,0,'Group One','Group One','2014-03-09 15:56:58','2014-03-09 15:56:58'),(67,0,'Group One','Group One','2014-03-09 15:56:58','2014-03-09 15:56:58'),(68,0,'Group One','Group One','2014-03-09 15:56:58','2014-03-09 15:56:58'),(69,0,'Group One','Group One','2014-03-09 15:56:58','2014-03-09 15:56:58'),(70,0,'Group One','Group One','2014-03-09 15:56:58','2014-03-09 15:56:58'),(71,0,'Group One','Group One','2014-03-09 15:56:59','2014-03-09 15:56:59'),(72,0,'Group One','Group One','2014-03-09 15:56:59','2014-03-09 15:56:59'),(73,0,'Group One','Group One','2014-03-09 15:56:59','2014-03-09 15:56:59'),(74,0,'Group One','Group One','2014-03-09 15:56:59','2014-03-09 15:56:59'),(75,0,'Group One','Group One','2014-03-09 15:56:59','2014-03-09 15:56:59'),(76,0,'Group One','Group One','2014-03-09 15:56:59','2014-03-09 15:56:59'),(77,0,'Group One','Group One','2014-03-09 15:56:59','2014-03-09 15:56:59'),(78,0,'Group One','Group One','2014-03-09 15:56:59','2014-03-09 15:56:59'),(79,0,'Group One','Group One','2014-03-09 15:56:59','2014-03-09 15:56:59'),(80,0,'Group One','Group One','2014-03-09 15:56:59','2014-03-09 15:56:59'),(81,0,'Group One','Group One','2014-03-09 15:57:00','2014-03-09 15:57:00'),(82,0,'Group One','Group One','2014-03-09 15:57:00','2014-03-09 15:57:00'),(83,0,'Group One','Group One','2014-03-09 15:57:00','2014-03-09 15:57:00'),(84,0,'Group One','Group One','2014-03-09 15:57:00','2014-03-09 15:57:00'),(85,0,'Group One','Group One','2014-03-09 15:57:00','2014-03-09 15:57:00'),(86,0,'Group One','Group One','2014-03-09 15:57:00','2014-03-09 15:57:00'),(87,0,'Group One','Group One','2014-03-09 15:57:00','2014-03-09 15:57:00'),(88,0,'Group One','Group One','2014-03-09 15:57:00','2014-03-09 15:57:00'),(89,0,'Group One','Group One','2014-03-09 15:57:01','2014-03-09 15:57:01'),(90,0,'Group One','Group One','2014-03-09 15:57:01','2014-03-09 15:57:01'),(91,0,'Group One','Group One','2014-03-09 15:57:01','2014-03-09 15:57:01'),(92,0,'Group One','Group One','2014-03-09 15:57:01','2014-03-09 15:57:01'),(93,0,'Group One','Group One','2014-03-09 15:57:01','2014-03-09 15:57:01'),(94,0,'Group One','Group One','2014-03-09 15:57:01','2014-03-09 15:57:01'),(95,0,'Group One','Group One','2014-03-09 15:57:02','2014-03-09 15:57:02'),(96,0,'Group One','Group One','2014-03-09 15:57:02','2014-03-09 15:57:02'),(97,0,'Group One','Group One','2014-03-09 15:57:02','2014-03-09 15:57:02'),(98,0,'Group One','Group One','2014-03-09 15:57:02','2014-03-09 15:57:02'),(99,0,'Group One','Group One','2014-03-09 15:57:02','2014-03-09 15:57:02'),(100,0,'Group One','Group One','2014-03-09 15:57:02','2014-03-09 15:57:02'),(101,0,'Group One','Group One','2014-03-09 15:57:02','2014-03-09 15:57:02'),(102,0,'Group One','Group One','2014-03-09 15:57:02','2014-03-09 15:57:02'),(103,0,'Group One','Group One','2014-03-09 15:57:02','2014-03-09 15:57:02'),(104,0,'Group One','Group One','2014-03-09 15:57:03','2014-03-09 15:57:03'),(105,0,'Group One','Group One','2014-03-09 15:57:03','2014-03-09 15:57:03'),(106,0,'Group One','Group One','2014-03-09 15:57:03','2014-03-09 15:57:03'),(107,0,'Group One','Group One','2014-03-09 15:57:03','2014-03-09 15:57:03'),(108,0,'Group One','Group One','2014-03-09 15:57:03','2014-03-09 15:57:03'),(109,0,'Group One','Group One','2014-03-09 15:57:03','2014-03-09 15:57:03'),(110,0,'Group One','Group One','2014-03-09 15:57:03','2014-03-09 15:57:03'),(111,0,'Group One','Group One','2014-03-09 15:57:03','2014-03-09 15:57:03'),(112,0,'Group One','Group One','2014-03-09 15:57:03','2014-03-09 15:57:03');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2013_11_10_112822_create_product_chooser_report_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_answers`
--

DROP TABLE IF EXISTS `product_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_one` int(11) NOT NULL,
  `question_two` int(11) NOT NULL,
  `question_three` int(11) NOT NULL,
  `question_four` int(11) NOT NULL,
  `answer_one` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer_one_index` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer_two` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer_two_index` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer_three` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer_four` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `product_id` int(10) unsigned NOT NULL,
  `report_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_answers_product_id_foreign` (`product_id`),
  KEY `product_answers_report_id_foreign` (`report_id`),
  CONSTRAINT `product_answers_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`),
  CONSTRAINT `product_answers_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_answers`
--

LOCK TABLES `product_answers` WRITE;
/*!40000 ALTER TABLE `product_answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `display_count` int(11) NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `csv_item_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture_url_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture_url_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `products_group_id_foreign` (`group_id`),
  CONSTRAINT `products_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,0,'17ac6ec97d649fa98d3f0d71a7f4fdbb','Baby Journal','','/images/product_chooser/2.jpg','','','Record baby\\\'s firsts - highlights are a flip-out Parisian Townhouse that serves as a family-tree and sections such as \\\'Milestones\\\', \\\'The World Around You\\\', and \\\'Your Favourite Things\\\'.','2014-03-09 15:56:50','2014-03-09 15:56:50',1),(2,0,'17ac6ec97d649fa98d3f0d71a7f4fdbb','New to this world\\\' Cushion','','/images/product_chooser/3.jpg','','','You are only new to this world, so just take my hand and we\\\'ll tiptoe to the edge and there we shall look at how beautiful it all is until you are ready to take flight.','2014-03-09 15:56:50','2014-03-09 15:56:50',1),(3,0,'17ac6ec97d649fa98d3f0d71a7f4fdbb','Owl Baby Mobile','','/images/product_chooser/4.jpg','','','Laser cut from beautiful birch wood and hand finished with love. This mobile comes in a lovely gift box and is sure to become a child\\\'s treasure.','2014-03-09 15:56:50','2014-03-09 15:56:50',1),(4,0,'17ac6ec97d649fa98d3f0d71a7f4fdbb','Dream Big, Little One\\\' Cushion','','/images/product_chooser/5.jpg','','','Soft grey cotton screen printed baby cushion. Caption reads \\\'Dream big little one, tomorrow you will move mountains\\\'.','2014-03-09 15:56:50','2014-03-09 15:56:50',1),(5,0,'17ac6ec97d649fa98d3f0d71a7f4fdbb','Tiger Baby Bodysuit','','/images/product_chooser/6.jpg','','','100% organic unbleached cotton, transfer printed. Newborn - 6 months.','2014-03-09 15:56:50','2014-03-09 15:56:50',1),(6,0,'17ac6ec97d649fa98d3f0d71a7f4fdbb','Circus Bunny Baby Bodysuit','','/images/product_chooser/9.jpg','','','100% organic unbleached cotton, transfer printed. Newborn - 6 months.','2014-03-09 15:56:50','2014-03-09 15:56:50',1),(7,0,'70192f3a2e1224f811552535b109b08d','Morgan the Mischievous Baby Bodysuit','','/images/product_chooser/10.jpg','','','Meet Morgan the Mischievous\nThis 100% organic cotton bodysuit comes gift wrapped with a matching Morgan the Mischievous card, for an extra special new baby gift. Features original illustration by Adam Murphy - lead animator for Disney and Lucasfilm.','2014-03-09 15:56:51','2014-03-09 15:56:51',1),(8,0,'70192f3a2e1224f811552535b109b08d','Jenkins the Hare Baby Blanket','','/images/product_chooser/11.jpg','','','Meet Jenkins the Hare\nThis 100% organic cotton blanket comes gift wrapped with a matching Jenkins the Hare card making it an extra special new baby gift. Features original illustration by Adam Murphy - lead animator for Disney and Lucasfilm.','2014-03-09 15:56:51','2014-03-09 15:56:51',1),(9,0,'70192f3a2e1224f811552535b109b08d','Alphabet Baby Blanket','','/images/product_chooser/13.jpg','','','100% quilted cotton - destined to become a family favourite.','2014-03-09 15:56:51','2014-03-09 15:56:51',1),(10,0,'70192f3a2e1224f811552535b109b08d','Animal Baby Pillow','','/images/product_chooser/14.jpg','','','100% cotton case with poly fill.','2014-03-09 15:56:51','2014-03-09 15:56:51',1),(11,0,'70192f3a2e1224f811552535b109b08d','Baby Socks Gift Set','','/images/product_chooser/15.jpg','','','Special set of 3 pairs - made from 100% cotton yarn to ensure comfort to baby’s delicate skin.','2014-03-09 15:56:51','2014-03-09 15:56:51',1),(12,0,'70192f3a2e1224f811552535b109b08d','We Did It\\\' Wedding Journal','','/images/product_chooser/16.jpg','','','48 pages to fill in the events of a wedding from reception to banquette, from speeches to honeymoon. Even things like \\\'who caught the brides bouquet\\\' will be kept in your book and not forgotten.','2014-03-09 15:56:51','2014-03-09 15:56:51',1),(13,0,'70192f3a2e1224f811552535b109b08d','The Date Jar','','/images/product_chooser/17.jpg','','','Spend some quality time and have fun with your partner with the help of your own Date Jar. \nInside are 12 ideas for fun activities such as \\\'Create a signature cocktail for yourselves\\\'','2014-03-09 15:56:51','2014-03-09 15:56:51',1),(14,0,'70192f3a2e1224f811552535b109b08d','A pub for all reasons','','/images/product_chooser/18.jpg','','','30 pubs with specific appeal such as a pub with a pub cat, a river view, architectural beauty, pubs where mobile phones are barred; where food is recommended and where Guiness is brought to your table.','2014-03-09 15:56:51','2014-03-09 15:56:51',1),(15,0,'70192f3a2e1224f811552535b109b08d','How to find Old New York','','/images/product_chooser/19.jpg','','','The guide to the New York you’ve always wanted to see but feared might have disappeared for good.. Depicting a city of Edward Hopper diners and down-at-heel dive bars, overstocked grocery stores and mountainous pastrami sandwich deli\\\'s.','2014-03-09 15:56:51','2014-03-09 15:56:51',1),(16,0,'70192f3a2e1224f811552535b109b08d','Kitchen Larder Lemon Drizzle Cake Candle','','/images/product_chooser/20.jpg','','','Juliette At Home Candles use the finest fragrances and smell absolutley yummy.\nEach pot comes with a recipe for a jam or chutney which can be filled into the jar once the candle has been used.','2014-03-09 15:56:51','2014-03-09 15:56:51',1),(17,0,'39a1118ff70459f2e6dc1337b0124e37','Kitchen Larder Marigold & Rocket Handwash','','/images/product_chooser/21.jpg','','','Juliette At Home Hand Wash is inspired by both the kitchen and the vegetable garden, using the finest fragrances that smell absolutley yummy.','2014-03-09 15:56:52','2014-03-09 15:56:52',1),(18,0,'39a1118ff70459f2e6dc1337b0124e37','They see me rolling Tea Towel','','/images/product_chooser/24.jpg','','','A tea towel for gangsters.','2014-03-09 15:56:52','2014-03-09 15:56:52',1),(19,0,'39a1118ff70459f2e6dc1337b0124e37','The Cook Tea Towel','','/images/product_chooser/25.jpg','','','A tea towel for the \\\'Breaking Bad\\\' fan who has everything.','2014-03-09 15:56:52','2014-03-09 15:56:52',1),(20,0,'39a1118ff70459f2e6dc1337b0124e37','Silly Sausage & Sensible Egg','','/images/product_chooser/28.jpg','','','Make drying up after your morning fry-up more fun.','2014-03-09 15:56:52','2014-03-09 15:56:52',1),(21,0,'39a1118ff70459f2e6dc1337b0124e37','Sweet Strawberries & Sour Cream','','/images/product_chooser/29.jpg','','','An \\\'Afternoon Tea\\\' towel.','2014-03-09 15:56:52','2014-03-09 15:56:52',1),(22,0,'39a1118ff70459f2e6dc1337b0124e37','The Dreamers ','','/images/product_chooser/30.jpg','','','Beautifully illustrated tea towel.','2014-03-09 15:56:52','2014-03-09 15:56:52',1),(23,0,'39a1118ff70459f2e6dc1337b0124e37','May I interest you in a hug','','/images/product_chooser/31.jpg','','','Beautifully illustrated tea towel.','2014-03-09 15:56:52','2014-03-09 15:56:52',1),(24,0,'39a1118ff70459f2e6dc1337b0124e37','Birch Tree Mug','','/images/product_chooser/32.jpg','','','Dishwasher safe ceramic mug. Printed in Maine, USA.','2014-03-09 15:56:52','2014-03-09 15:56:52',1),(25,0,'39a1118ff70459f2e6dc1337b0124e37','Rabbit with Camera Notebook','','/images/product_chooser/33.jpg','','','48 plain pages for photography inspired ideas.','2014-03-09 15:56:52','2014-03-09 15:56:52',1),(26,0,'38ec77e10fea1886bee3926ae8be180f','The London Edition','','/images/product_chooser/36.jpg','','','Pack of three London Themed A6 notebooks. Ruled, blank & tabulated.','2014-03-09 15:56:53','2014-03-09 15:56:53',1),(27,0,'38ec77e10fea1886bee3926ae8be180f','Triple Seal Notebook Trio','','/images/product_chooser/37.jpg','','','A handsome and handy set of three plain A6 books, adorned with silkscreen printed seals in vermillion red, shiny copper and fresh aqua.','2014-03-09 15:56:53','2014-03-09 15:56:53',1),(28,0,'38ec77e10fea1886bee3926ae8be180f','Otter Notebook','','/images/product_chooser/38.jpg','','','The cover pattern is inspired by YouTube celebrity sea otters, Milo and Nyac who were caught on camera holding hands as they slept. A6 plain cartridge paper. ','2014-03-09 15:56:53','2014-03-09 15:56:53',1),(29,0,'38ec77e10fea1886bee3926ae8be180f','Great / Rubbish Ideas ','','/images/product_chooser/40.jpg','','','We know that not every idea we have is a winner! This double-sided A6 notebook allows you to log the great ones in one side, with the not-so-great ones in the other side.','2014-03-09 15:56:53','2014-03-09 15:56:53',1),(30,0,'38ec77e10fea1886bee3926ae8be180f','The GOOD Stationery Set','','/images/product_chooser/41.jpg','','','For every one of these sets sold, a child in the Gambia gets a school stationery kit through the Fresh Start Foundation - a gift that keeps on giving.\n\nIncludes A5 notebook, 4 notecards/envelopes, sticker seals, pencil & pencil sharpener. Presented in a gift pack.','2014-03-09 15:56:53','2014-03-09 15:56:53',1),(31,0,'38ec77e10fea1886bee3926ae8be180f','Notes…notes\\\' Notebook','','/images/product_chooser/42.jpg','','','It looks good, it\\\'s useful, and there\\\'s loads of space for notes in this A5 recycled paper notebook with 48 pages.','2014-03-09 15:56:53','2014-03-09 15:56:53',1),(32,0,'38ec77e10fea1886bee3926ae8be180f','Really quite important stuff\\\' Notebook','','/images/product_chooser/43.jpg','','','This A5 recycled paper notebook with 48 pages is the perfect place to keep track of all the vitally important life stuff you can\\\'t do without.','2014-03-09 15:56:53','2014-03-09 15:56:53',1),(33,0,'38ec77e10fea1886bee3926ae8be180f','Nostalgic Collage Collection Notebooks','','/images/product_chooser/44.jpg','','','Digitally printed notebook with 32 lightly ruled inner pages. Choose from \\\'Frog on a bike\\\', \\\'Oh Deer\\\' or Mad Hatter\\\'.','2014-03-09 15:56:53','2014-03-09 15:56:53',1),(34,0,'38ec77e10fea1886bee3926ae8be180f','Welly Wonders Notecards','','/images/product_chooser/45.jpg','','','Box set of 9 A6 notecards cards & envelopes, featuring original work by Adam Murphy - lead animator for Disney and Lucasfilm.','2014-03-09 15:56:53','2014-03-09 15:56:53',1),(35,0,'00764b1c568ec7f331d91fa51da77e24','Ace of Hearts Notebook','','/images/product_chooser/46.jpg','','','Vintage inspired circus notebook, spiral bound with 60 plain white pages.','2014-03-09 15:56:54','2014-03-09 15:56:54',1),(36,0,'00764b1c568ec7f331d91fa51da77e24','The 50 People of East London','','/images/product_chooser/47.jpg','','','A painfully accurate guide to the diverse, colourful and sometimes infuriating people of East London. Although the drawings are reminiscent of old-fashioned comic books or Hogarth’s 18th Century prints, the individuals portrayed represent the very modern characters that make up the melting pot of East London.','2014-03-09 15:56:54','2014-03-09 15:56:54',1),(37,0,'00764b1c568ec7f331d91fa51da77e24','Black Tree Glasses Set','','/images/product_chooser/48.jpg','','','A beautiful set of four handmade, heavy bottomed glasses with bold printed images of trees. Oak, Blossom, Birch and Fir.','2014-03-09 15:56:54','2014-03-09 15:56:54',1),(38,0,'00764b1c568ec7f331d91fa51da77e24','Vintage Pattern Notecards','','/images/product_chooser/49.jpg','','','Box set of 8 assorted A6 cards with envelopes from the vintage pattern collection.','2014-03-09 15:56:54','2014-03-09 15:56:54',1),(39,0,'00764b1c568ec7f331d91fa51da77e24','Nostalgic Collage Notecards','','/images/product_chooser/50.jpg','','','Box set of 8 assorted A6 cards with envelopes from the Nostalgic Collage collection.','2014-03-09 15:56:54','2014-03-09 15:56:54',1),(40,0,'00764b1c568ec7f331d91fa51da77e24','Swallow Letterhead Set ','','/images/product_chooser/51.jpg','','','Contains 15 printed A5 sheets with tissues lined envelopes presented in a beautiful box and finished with a wax seal. Illustrated, designed and lovingly printed on a 1960 Heidelberg Windmill in Bath UK.','2014-03-09 15:56:54','2014-03-09 15:56:54',1),(41,0,'00764b1c568ec7f331d91fa51da77e24','Rabbit with Camera Tote','','/images/product_chooser/52.jpg','','','Cute black tote with long handle, perfect carrier for the budding photographer.','2014-03-09 15:56:54','2014-03-09 15:56:54',1),(42,0,'00764b1c568ec7f331d91fa51da77e24','When you wish… Tote','','/images/product_chooser/53.jpg','','','Tote bag for a rebel against Disney. Handprinted onto a 100% cotton bag with a practical long handle.','2014-03-09 15:56:54','2014-03-09 15:56:54',1),(43,0,'00764b1c568ec7f331d91fa51da77e24','Mr Rock Print','','/images/product_chooser/54.jpg','','','Mr Rock is gonna kick your ***. An A3 digital print onto 300gsm Shiro Echo paper with a matt finish.','2014-03-09 15:56:54','2014-03-09 15:56:54',1),(44,0,'00764b1c568ec7f331d91fa51da77e24','Fantastic Fox Print','','/images/product_chooser/55.jpg','','','Original illustration, digitally printed onto high quality textured stock in Sydney, Australia.','2014-03-09 15:56:54','2014-03-09 15:56:54',1),(45,0,'b2518987d91d46c35303b258611ab44e','New Baby Cards','','/images/product_chooser/56.jpg','','','','2014-03-09 15:56:55','2014-03-09 15:56:55',1),(46,0,'b2518987d91d46c35303b258611ab44e','New Baby Cards','','/images/product_chooser/57.jpg','','','','2014-03-09 15:56:55','2014-03-09 15:56:55',1),(47,0,'b2518987d91d46c35303b258611ab44e','New Baby Cards','','/images/product_chooser/58.jpg','','','','2014-03-09 15:56:55','2014-03-09 15:56:55',1),(48,0,'ffed416f1b64a3a96b9b84d745ec4ad1','New Baby Cards','','/images/product_chooser/59.jpg','','','','2014-03-09 15:56:56','2014-03-09 15:56:56',1),(49,0,'ffed416f1b64a3a96b9b84d745ec4ad1','New Baby Cards','','/images/product_chooser/60.jpg','','','','2014-03-09 15:56:56','2014-03-09 15:56:56',1),(50,0,'ffed416f1b64a3a96b9b84d745ec4ad1','New Baby Cards','','/images/product_chooser/61.jpg','','','','2014-03-09 15:56:56','2014-03-09 15:56:56',1),(51,0,'ffed416f1b64a3a96b9b84d745ec4ad1','New Baby Cards','','/images/product_chooser/62.jpg','','','','2014-03-09 15:56:56','2014-03-09 15:56:56',1),(52,0,'ffed416f1b64a3a96b9b84d745ec4ad1','New Baby Cards','','/images/product_chooser/63.jpg','','','','2014-03-09 15:56:56','2014-03-09 15:56:56',1),(53,0,'97d79b12d947becceecde0c7503eaa29','New Baby Cards','','/images/product_chooser/64.jpg','','','','2014-03-09 15:56:57','2014-03-09 15:56:57',1),(54,0,'97d79b12d947becceecde0c7503eaa29','New Baby Cards','','/images/product_chooser/67.jpg','','','','2014-03-09 15:56:57','2014-03-09 15:56:57',1),(55,0,'97d79b12d947becceecde0c7503eaa29','Birthday & Greetings Cards','','/images/product_chooser/68.jpg','','','Birthday & Greetings Cards','2014-03-09 15:56:57','2014-03-09 15:56:57',1),(56,0,'97d79b12d947becceecde0c7503eaa29','Birthday & Greetings Cards','','/images/product_chooser/69.jpg','','','','2014-03-09 15:56:57','2014-03-09 15:56:57',1),(57,0,'97d79b12d947becceecde0c7503eaa29','Birthday & Greetings Cards','','/images/product_chooser/70.jpg','','','','2014-03-09 15:56:57','2014-03-09 15:56:57',1),(58,0,'97d79b12d947becceecde0c7503eaa29','Birthday & Greetings Cards','','/images/product_chooser/71.jpg','','','','2014-03-09 15:56:57','2014-03-09 15:56:57',1),(59,0,'97d79b12d947becceecde0c7503eaa29','Birthday & Greetings Cards','','/images/product_chooser/72.jpg','','','','2014-03-09 15:56:57','2014-03-09 15:56:57',1),(60,0,'97d79b12d947becceecde0c7503eaa29','Birthday & Greetings Cards','','/images/product_chooser/73.jpg','','','','2014-03-09 15:56:57','2014-03-09 15:56:57',1),(61,0,'97d79b12d947becceecde0c7503eaa29','Birthday & Greetings Cards','','/images/product_chooser/74.jpg','','','','2014-03-09 15:56:57','2014-03-09 15:56:57',1),(62,0,'025a7de75c6d179d398b33a027842c5b','Birthday & Greetings Cards','','/images/product_chooser/75.jpg','','','','2014-03-09 15:56:58','2014-03-09 15:56:58',1),(63,0,'025a7de75c6d179d398b33a027842c5b','Birthday & Greetings Cards','','/images/product_chooser/76.jpg','','','','2014-03-09 15:56:58','2014-03-09 15:56:58',1),(64,0,'025a7de75c6d179d398b33a027842c5b','Birthday & Greetings Cards','','/images/product_chooser/77.jpg','','','','2014-03-09 15:56:58','2014-03-09 15:56:58',1),(65,0,'025a7de75c6d179d398b33a027842c5b','Birthday & Greetings Cards','','/images/product_chooser/78.jpg','','','','2014-03-09 15:56:58','2014-03-09 15:56:58',1),(66,0,'025a7de75c6d179d398b33a027842c5b','Birthday & Greetings Cards','','/images/product_chooser/79.jpg','','','','2014-03-09 15:56:58','2014-03-09 15:56:58',1),(67,0,'025a7de75c6d179d398b33a027842c5b','Birthday & Greetings Cards','','/images/product_chooser/81.jpg','','','Made with real pencil shavings','2014-03-09 15:56:58','2014-03-09 15:56:58',1),(68,0,'025a7de75c6d179d398b33a027842c5b','Birthday & Greetings Cards','','/images/product_chooser/82.jpg','','','Made with real pencil shavings','2014-03-09 15:56:58','2014-03-09 15:56:58',1),(69,0,'025a7de75c6d179d398b33a027842c5b','Birthday & Greetings Cards','','/images/product_chooser/83.jpg','','','Made with real pencil shavings','2014-03-09 15:56:58','2014-03-09 15:56:58',1),(70,0,'0daafbe80652e79b74c10d44e94251f0','Birthday & Greetings Cards','','/images/product_chooser/84.jpg','','','Made with real pencil shavings','2014-03-09 15:56:59','2014-03-09 15:56:59',1),(71,0,'0daafbe80652e79b74c10d44e94251f0','Birthday & Greetings Cards','','/images/product_chooser/85.jpg','','','','2014-03-09 15:56:59','2014-03-09 15:56:59',1),(72,0,'0daafbe80652e79b74c10d44e94251f0','Birthday & Greetings Cards','','/images/product_chooser/86.jpg','','','','2014-03-09 15:56:59','2014-03-09 15:56:59',1),(73,0,'0daafbe80652e79b74c10d44e94251f0','Birthday & Greetings Cards','','/images/product_chooser/87.jpg','','','','2014-03-09 15:56:59','2014-03-09 15:56:59',1),(74,0,'0daafbe80652e79b74c10d44e94251f0','Birthday & Greetings Cards','','/images/product_chooser/88.jpg','','','','2014-03-09 15:56:59','2014-03-09 15:56:59',1),(75,0,'0daafbe80652e79b74c10d44e94251f0','Birthday & Greetings Cards','','/images/product_chooser/89.jpg','','','','2014-03-09 15:56:59','2014-03-09 15:56:59',1),(76,0,'0daafbe80652e79b74c10d44e94251f0','Birthday & Greetings Cards','','/images/product_chooser/90.jpg','','','','2014-03-09 15:56:59','2014-03-09 15:56:59',1),(77,0,'0daafbe80652e79b74c10d44e94251f0','Birthday & Greetings Cards','','/images/product_chooser/91.jpg','','','Made with real pencil shavings','2014-03-09 15:56:59','2014-03-09 15:56:59',1),(78,0,'0daafbe80652e79b74c10d44e94251f0','Birthday & Greetings Cards','','/images/product_chooser/93.jpg','','','','2014-03-09 15:56:59','2014-03-09 15:56:59',1),(79,0,'0daafbe80652e79b74c10d44e94251f0','Birthday & Greetings Cards','','/images/product_chooser/94.jpg','','','','2014-03-09 15:56:59','2014-03-09 15:56:59',1),(80,0,'a21f3fb753685b86311654e1840eaa86','Birthday & Greetings Cards','','/images/product_chooser/95.jpg','','','','2014-03-09 15:57:00','2014-03-09 15:57:00',1),(81,0,'a21f3fb753685b86311654e1840eaa86','Birthday & Greetings Cards','','/images/product_chooser/96.jpg','','','','2014-03-09 15:57:00','2014-03-09 15:57:00',1),(82,0,'a21f3fb753685b86311654e1840eaa86','Birthday & Greetings Cards','','/images/product_chooser/97.jpg','','','','2014-03-09 15:57:00','2014-03-09 15:57:00',1),(83,0,'a21f3fb753685b86311654e1840eaa86','Wrapping Paper','','/images/product_chooser/98.jpg','','','','2014-03-09 15:57:00','2014-03-09 15:57:00',1),(84,0,'a21f3fb753685b86311654e1840eaa86','Wrapping Paper','','/images/product_chooser/99.jpg','','','','2014-03-09 15:57:00','2014-03-09 15:57:00',1),(85,0,'a21f3fb753685b86311654e1840eaa86','Wrapping Paper','','/images/product_chooser/100.jpg','','','','2014-03-09 15:57:00','2014-03-09 15:57:00',1),(86,0,'a21f3fb753685b86311654e1840eaa86','Wrapping Paper','','/images/product_chooser/101.jpg','','','','2014-03-09 15:57:00','2014-03-09 15:57:00',1),(87,0,'a21f3fb753685b86311654e1840eaa86','Wrapping Paper','','/images/product_chooser/102.jpg','','','','2014-03-09 15:57:00','2014-03-09 15:57:00',1),(88,0,'a636deed1a3f350dac1926c69e952dc5','Wrapping Paper','','/images/product_chooser/103.jpg','','','','2014-03-09 15:57:01','2014-03-09 15:57:01',1),(89,0,'a636deed1a3f350dac1926c69e952dc5','Double Sided Wrap','','/images/product_chooser/104.jpg','','','','2014-03-09 15:57:01','2014-03-09 15:57:01',1),(90,0,'a636deed1a3f350dac1926c69e952dc5','Wrapping Paper','','/images/product_chooser/105.jpg','','','','2014-03-09 15:57:01','2014-03-09 15:57:01',1),(91,0,'a636deed1a3f350dac1926c69e952dc5','Wrapping Paper','','/images/product_chooser/106.jpg','','','','2014-03-09 15:57:01','2014-03-09 15:57:01',1),(92,0,'a636deed1a3f350dac1926c69e952dc5','Wrapping Paper','','/images/product_chooser/107.jpg','','','','2014-03-09 15:57:01','2014-03-09 15:57:01',1),(93,0,'a636deed1a3f350dac1926c69e952dc5','Wrapping Paper','','/images/product_chooser/108.jpg','','','','2014-03-09 15:57:01','2014-03-09 15:57:01',1),(94,0,'8276a7a6b9b33ecf0a56ffd7a1edb6d7','Wrapping Paper','','/images/product_chooser/109.jpg','','','','2014-03-09 15:57:02','2014-03-09 15:57:02',1),(95,0,'8276a7a6b9b33ecf0a56ffd7a1edb6d7','Wrapping Paper','','/images/product_chooser/110.jpg','','','','2014-03-09 15:57:02','2014-03-09 15:57:02',1),(96,0,'8276a7a6b9b33ecf0a56ffd7a1edb6d7','Wrapping Paper','','/images/product_chooser/112.jpg','','','','2014-03-09 15:57:02','2014-03-09 15:57:02',1),(97,0,'8276a7a6b9b33ecf0a56ffd7a1edb6d7','Wrapping Paper','','/images/product_chooser/113.jpg','','','','2014-03-09 15:57:02','2014-03-09 15:57:02',1),(98,0,'8276a7a6b9b33ecf0a56ffd7a1edb6d7','Wrapping Paper','','/images/product_chooser/114.jpg','','','','2014-03-09 15:57:02','2014-03-09 15:57:02',1),(99,0,'8276a7a6b9b33ecf0a56ffd7a1edb6d7','Wrapping Paper','','/images/product_chooser/115.jpg','','','','2014-03-09 15:57:02','2014-03-09 15:57:02',1),(100,0,'8276a7a6b9b33ecf0a56ffd7a1edb6d7','Wrapping Paper','','/images/product_chooser/116.jpg','','','','2014-03-09 15:57:02','2014-03-09 15:57:02',1),(101,0,'8276a7a6b9b33ecf0a56ffd7a1edb6d7','Wrapping Paper','','/images/product_chooser/117.jpg','','','','2014-03-09 15:57:02','2014-03-09 15:57:02',1),(102,0,'8276a7a6b9b33ecf0a56ffd7a1edb6d7','Wrapping Paper','','/images/product_chooser/118.jpg','','','','2014-03-09 15:57:02','2014-03-09 15:57:02',1),(103,0,'8276a7a6b9b33ecf0a56ffd7a1edb6d7','Wrapping Paper','','/images/product_chooser/119.jpg','','','','2014-03-09 15:57:02','2014-03-09 15:57:02',1),(104,0,'18e01c5c8d96f67b10c968bf07ac1942','Wrapping Paper','','/images/product_chooser/120.jpg','','','','2014-03-09 15:57:03','2014-03-09 15:57:03',1),(105,0,'18e01c5c8d96f67b10c968bf07ac1942','Wrapping Paper','','/images/product_chooser/121.jpg','','','','2014-03-09 15:57:03','2014-03-09 15:57:03',1),(106,0,'18e01c5c8d96f67b10c968bf07ac1942','Wrapping Paper','','/images/product_chooser/122.jpg','','','','2014-03-09 15:57:03','2014-03-09 15:57:03',1),(107,0,'18e01c5c8d96f67b10c968bf07ac1942','Wrapping Paper','','/images/product_chooser/123.jpg','','','','2014-03-09 15:57:03','2014-03-09 15:57:03',1),(108,0,'18e01c5c8d96f67b10c968bf07ac1942','Wrapping Paper','','/images/product_chooser/124.jpg','','','','2014-03-09 15:57:03','2014-03-09 15:57:03',1),(109,0,'18e01c5c8d96f67b10c968bf07ac1942','Wrapping Paper','','/images/product_chooser/125.jpg','','','','2014-03-09 15:57:03','2014-03-09 15:57:03',1),(110,0,'18e01c5c8d96f67b10c968bf07ac1942','Wrapping Paper','','/images/product_chooser/126.jpg','','','','2014-03-09 15:57:03','2014-03-09 15:57:03',1),(111,0,'18e01c5c8d96f67b10c968bf07ac1942','Wrapping Paper','','/images/product_chooser/127.jpg','','','','2014-03-09 15:57:03','2014-03-09 15:57:03',1),(112,0,'258d5cdbd1dba3a626883b2dab0d5637','Wrapping Paper','','/images/product_chooser/128.jpg','','','','2014-03-09 15:57:04','2014-03-09 15:57:04',1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` text COLLATE utf8_unicode_ci NOT NULL,
  `step` text COLLATE utf8_unicode_ci NOT NULL,
  `ip` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reports`
--

LOCK TABLES `reports` WRITE;
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-03-09 15:57:52
