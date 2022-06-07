-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: logitex
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cars` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `marka` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dopuszczalna_masa` int(11) DEFAULT NULL,
  `P_dostepnosc` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cars`
--

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` VALUES (1,'pugot','306',1700,1),(3,'fiat','bravo',123123,1);
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `final_orders`
--

DROP TABLE IF EXISTS `final_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `final_orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_naczepy` bigint(20) unsigned NOT NULL,
  `id_pojazdu` bigint(20) unsigned NOT NULL,
  `id_zamowienia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waga` int(11) NOT NULL,
  `ilosc_ladunku` int(11) NOT NULL,
  `data_dodania` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `final_orders`
--

LOCK TABLES `final_orders` WRITE;
/*!40000 ALTER TABLE `final_orders` DISABLE KEYS */;
INSERT INTO `final_orders` VALUES (3,5,1,'37',100,12,'2022-05-31 09:31:47'),(4,6,1,'f17077df-3e20-4204-9f2b-5edb7b42c4e6',2475,3,'2022-06-06 18:50:43'),(5,5,1,'268db766-dbc9-4a43-86bb-de2e678cf794',2475,3,'2022-06-06 19:26:34'),(37,5,1,'1777bbcf-faee-4761-a4fa-bbf401e92e51',2475,3,'2022-06-07 09:54:08'),(38,6,1,'383afd09-23e4-4bcf-b158-4bac39e3bedc',1650,2,'2022-06-07 09:54:40'),(39,6,1,'383afd09-23e4-4bcf-b158-4bac39e3bedc',1650,2,'2022-06-07 09:55:07'),(40,5,1,'fddc0f6b-8c78-415c-961a-a489b5507cdf',1650,2,'2022-06-07 09:56:30'),(41,6,1,'bced99d2-1c15-48cc-a6e6-6e20cca9283c',65,2,'2022-06-07 11:02:30');
/*!40000 ALTER TABLE `final_orders` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `history` BEFORE DELETE ON `final_orders`
 FOR EACH ROW BEGIN 
INSERT INTO order_history VALUES (old.id, old.id_naczepy,old.id_pojazdu,old.id_zamowienia,old.waga,old.ilosc_ladunku,old.data_dodania);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `final_orders_location`
--

DROP TABLE IF EXISTS `final_orders_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `final_orders_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nadawca` varchar(255) DEFAULT NULL,
  `kraj` varchar(255) DEFAULT NULL,
  `miasto` varchar(255) DEFAULT NULL,
  `id_zamowienia` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `final_orders_location`
--

LOCK TABLES `final_orders_location` WRITE;
/*!40000 ALTER TABLE `final_orders_location` DISABLE KEYS */;
INSERT INTO `final_orders_location` VALUES (1,NULL,'Polska','Gda┼äst',NULL),(2,NULL,'Polska','Gdynia',NULL),(3,'123','siema','siema',NULL),(4,'997','Szwecja','┼é├│d┼║',NULL),(5,'e2ad8644-993e-4f9d-9078-61212d0db8d4','Polska','┼é├│d┼║','64ce2463-1bfc-463a-a49c-5134d3219e6d'),(6,'e2ad8644-993e-4f9d-9078-61212d0db8d4','Polska','┼é├│d┼║','64ce2463-1bfc-463a-a49c-5134d3219e6d'),(7,'123','123','123','64ce2463-1bfc-463a-a49c-5134d3219e6d'),(8,'123','123','123','64ce2463-1bfc-463a-a49c-5134d3219e6d'),(9,'123','123','123','64ce2463-1bfc-463a-a49c-5134d3219e6d'),(10,'123','123','123','64ce2463-1bfc-463a-a49c-5134d3219e6d'),(11,'123','123','123','64ce2463-1bfc-463a-a49c-5134d3219e6d'),(12,'123','123','123','64ce2463-1bfc-463a-a49c-5134d3219e6d'),(13,'123','123','123','[{\"nadawca\":\"e2ad8644-993e-4f9d-9078-61212d0db8d4\"},{\"nadawca\":\"e586b8fe-41c0-45c7-88c4-8a09efb7230b\"}]'),(14,'123','Polska','123','[{\"nadawca\":\"ul\"},{\"nadawca\":\"ul\"},{\"nadawca\":\"ul\"}]'),(15,'123','Polska','123','[{\"nadawca\":\"ul\"},{\"nadawca\":\"ul\"},{\"nadawca\":\"ul\"}]'),(16,'123','Polska','123','[{\"nadawca\":\"ul\"},{\"nadawca\":\"ul\"},{\"nadawca\":\"ul\"}]'),(17,'123','Polska','123','[{\"nadawca\":\"ul\"},{\"nadawca\":\"ul\"},{\"nadawca\":\"ul\"}]'),(18,'123','123','45678','[{\"nadawca\":\"ul\"},{\"nadawca\":\"ul\"},{\"nadawca\":\"ul\"}]'),(19,NULL,NULL,NULL,NULL),(20,NULL,NULL,NULL,NULL),(21,NULL,'1235423','1234543','1234532'),(22,NULL,'1235423','1234543','1234532'),(23,NULL,'2344','rsjhhfg','456y'),(24,NULL,'2344','rsjhhfg','456y'),(25,NULL,'2w345354','wq32as 2','123543'),(26,NULL,'1243523532','5234145erwfdsc','12345'),(27,'frajer','NIEMCY','BIRKENAU','asd');
/*!40000 ALTER TABLE `final_orders_location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (5,'2022_05_13_113441_create_vehicles_table',2),(8,'2022_05_21_101937_create_permission_tables',5),(9,'2022_05_21_125834_create_orders_table',5),(10,'2022_05_22_141031_create_roles_table',6),(13,'2022_05_22_144831_create_roles_table',8),(14,'2014_10_12_000000_create_users_table',9),(15,'2014_10_12_100000_create_password_resets_table',9),(16,'2019_08_19_000000_create_failed_jobs_table',9),(17,'2019_12_14_000001_create_personal_access_tokens_table',9),(18,'2022_05_13_134142_create_trailers_table',9),(22,'2022_05_27_114157_create_admins_table',10),(23,'2022_05_30_181805_create_final_orders_table',11),(24,'2022_05_15_160153_create_vehicles_table',12),(25,'2022_05_22_141128_create_role_admins_table',12),(26,'2022_05_22_143254_create_permission_tables',12);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_history`
--

DROP TABLE IF EXISTS `order_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_naczepy` int(11) DEFAULT NULL,
  `id_pojazdu` int(11) DEFAULT NULL,
  `id_zamowienia` int(11) DEFAULT NULL,
  `waga` int(11) DEFAULT NULL,
  `ilosc_ladunku` int(11) DEFAULT NULL,
  `data_dodania` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_history`
--

LOCK TABLES `order_history` WRITE;
/*!40000 ALTER TABLE `order_history` DISABLE KEYS */;
INSERT INTO `order_history` VALUES (2,2,1,33,1,1,'2022-05-31 07:54:49'),(3,2,NULL,NULL,NULL,NULL,'2022-05-31 18:08:19'),(4,2,2,NULL,NULL,NULL,'2022-05-31 18:08:39'),(5,2,2,NULL,NULL,NULL,'2022-05-31 18:10:45');
/*!40000 ALTER TABLE `order_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ID_ZAMOWIENIA` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nadawca` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ladunek` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waga` int(11) NOT NULL,
  `suma_wag` float DEFAULT NULL,
  `trailer` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=706 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (692,'fddc0f6b-8c78-415c-961a-a489b5507cdf','996a3148-c565-4d64-87e6-cec614fbd278','1G:{\"primitive\":\"box\",\"height\":1.2,\"width\":0.466666664,\"depth\":0.466666664}P:{\"x\":-0.007006881133724991,\"y\":0.6977930907750265,\"z\":0.2310995238830524}N:\"996a3148-c565-4d64-87e6-cec614fbd278\"W:\"825\"',825,1650,5),(693,'fddc0f6b-8c78-415c-961a-a489b5507cdf','4c030c8c-7f55-44f0-8637-e48b687d5365','2G:{\"primitive\":\"box\",\"height\":1.2,\"width\":0.466666664,\"depth\":0.466666664}P:{\"x\":0.004955832119907261,\"y\":0.697761312201586,\"z\":-0.24954121037440388}N:\"4c030c8c-7f55-44f0-8637-e48b687d5365\"W:\"825\"',825,1650,5),(694,'bced99d2-1c15-48cc-a6e6-6e20cca9283c','frjaer','1G:{\"primitive\":\"box\",\"height\":\"1\",\"width\":0.58333333,\"depth\":0.58333333}P:{\"x\":-2.5317600675754472,\"y\":0.5978043228155016,\"z\":0.05118494960986764}N:\"frjaer\"W:\"37\"',37,65,6),(695,'bced99d2-1c15-48cc-a6e6-6e20cca9283c','frjaer','2G:{\"primitive\":\"box\",\"height\":\"1\",\"width\":0.58333333,\"depth\":0.58333333}P:{\"x\":-0.46785721090815496,\"y\":0.5978043228527417,\"z\":0.17617604186553806}N:\"frjaer\"W:\"28\"',28,65,6),(696,'fbe08e46-a3cd-41b6-90ff-2c9f6ab06dff','frjaer','1G:{\"primitive\":\"box\",\"height\":\"1\",\"width\":0.58333333,\"depth\":0.58333333}P:{\"x\":-2.5322720984750418,\"y\":0.5978034170830663,\"z\":0.05130622933865958}N:\"frjaer\"W:\"37\"',37,65,6),(697,'fbe08e46-a3cd-41b6-90ff-2c9f6ab06dff','frjaer','2G:{\"primitive\":\"box\",\"height\":\"1\",\"width\":0.58333333,\"depth\":0.58333333}P:{\"x\":-0.46836503135303015,\"y\":0.597803417160474,\"z\":0.17629582311008835}N:\"frjaer\"W:\"28\"',28,65,6),(698,'c8de71dc-ea52-4e68-8fdc-10668e5b1b6c','frjaer','1G:{\"primitive\":\"box\",\"height\":\"1\",\"width\":0.58333333,\"depth\":0.58333333}P:{\"x\":-2.5324407417753956,\"y\":0.5978005637024637,\"z\":0.05134911354465034}N:\"frjaer\"W:\"37\"',37,65,6),(699,'c8de71dc-ea52-4e68-8fdc-10668e5b1b6c','frjaer','2G:{\"primitive\":\"box\",\"height\":\"1\",\"width\":0.58333333,\"depth\":0.58333333}P:{\"x\":-0.4685322625641486,\"y\":0.5978005635420799,\"z\":0.17633800993460727}N:\"frjaer\"W:\"28\"',28,65,6),(700,'92f0e011-8fa0-4495-822b-3036c54dbb49','frjaer','1G:{\"primitive\":\"box\",\"height\":\"1\",\"width\":0.58333333,\"depth\":0.58333333}P:{\"x\":-2.5325381687520467,\"y\":0.5978074734217098,\"z\":0.0513678272922529}N:\"frjaer\"W:\"37\"',37,65,6),(701,'92f0e011-8fa0-4495-822b-3036c54dbb49','frjaer','2G:{\"primitive\":\"box\",\"height\":\"1\",\"width\":0.58333333,\"depth\":0.58333333}P:{\"x\":-0.4686286920972192,\"y\":0.5978074702881526,\"z\":0.17635603545942027}N:\"frjaer\"W:\"28\"',28,65,6),(702,'49d0a44c-25d5-46e0-b9aa-20ae743c44a4','frjaer','1G:{\"primitive\":\"box\",\"height\":\"1\",\"width\":0.58333333,\"depth\":0.58333333}P:{\"x\":-2.5326620308456325,\"y\":0.5978145390370133,\"z\":0.05138461473837139}N:\"frjaer\"W:\"37\"',37,65,6),(703,'49d0a44c-25d5-46e0-b9aa-20ae743c44a4','frjaer','2G:{\"primitive\":\"box\",\"height\":\"1\",\"width\":0.58333333,\"depth\":0.58333333}P:{\"x\":-0.4687497044668637,\"y\":0.5978145653222633,\"z\":0.17637240720354613}N:\"frjaer\"W:\"28\"',28,65,6),(704,'c0c1dac4-81e9-49d5-b60b-bb15d0c73572','frjaer','1G:{\"primitive\":\"box\",\"height\":\"1\",\"width\":0.58333333,\"depth\":0.58333333}P:{\"x\":-2.5327255485831905,\"y\":0.5978138654039046,\"z\":0.05140007996018582}N:\"frjaer\"W:\"37\"',37,65,6),(705,'c0c1dac4-81e9-49d5-b60b-bb15d0c73572','frjaer','2G:{\"primitive\":\"box\",\"height\":\"1\",\"width\":0.58333333,\"depth\":0.58333333}P:{\"x\":-0.4688105487231307,\"y\":0.5978138882583032,\"z\":0.17638750040339254}N:\"frjaer\"W:\"28\"',28,65,6);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `zwolTrail` BEFORE DELETE ON `orders`
 FOR EACH ROW BEGIN

UPDATE  trailers t SET t.dostepnosc = 1 WHERE t.id = OLD.trailer;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_admins`
--

DROP TABLE IF EXISTS `role_admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `admin_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_admins`
--

LOCK TABLES `role_admins` WRITE;
/*!40000 ALTER TABLE `role_admins` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (2,NULL,NULL),(3,NULL,NULL);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trailers`
--

DROP TABLE IF EXISTS `trailers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trailers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kubatura` int(11) NOT NULL,
  `waga` int(11) NOT NULL,
  `liczba_osi` int(11) NOT NULL,
  `szerokosc` int(11) NOT NULL,
  `dlugosc` int(11) NOT NULL,
  `wysokosc` int(11) NOT NULL,
  `dostepnosc` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trailers`
--

LOCK TABLES `trailers` WRITE;
/*!40000 ALTER TABLE `trailers` DISABLE KEYS */;
INSERT INTO `trailers` VALUES (5,123,10000,1,2,12,4,0),(6,123,10000,1,2,12,4,0);
/*!40000 ALTER TABLE `trailers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'zbyszek','zbyszek@logitex','$2y$10$8BpuB.Ugm3BG1EZYh8BHTed1N6rVWZLDbOBtPk9mG2BL.bsMQIAii',1,'9BuRkEptTnpH6oaTTEUlinkFbbtsRP5jHbryQRjnu4NN8KVi6keItS9IoPpd'),(2,'Walter White','walter@logitex','$2y$10$0E3juQaB4IQQwE8oZXDzKuSsi3DADZBpkKw6kucgxzf3TafunVX7K',0,'zvB51a3CnXDSxsU60hEh9G3yw4BrI1FqJajTAGIWD3PLQuxOMxVkAmLIHNfv'),(3,'Mariusz','pudzian@logitex','$2y$10$Ul6suOe1C.HS6awPd2BlR.kaRC/VpE28DCUrz67L0DvIP3i0/LutW',0,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users2`
--

DROP TABLE IF EXISTS `users2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users2` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users2`
--

LOCK TABLES `users2` WRITE;
/*!40000 ALTER TABLE `users2` DISABLE KEYS */;
INSERT INTO `users2` VALUES (2,'Zbyszek','zbyszek@logitex',NULL,'$2y$10$KmPCFz3ICRnbdb.Va9jBP.fpx.54RDb5X5zbU4vdXTiChDVZrdRNG','ZMN07An2PuRR3WSBMBLsQb21LYX1jXxscXsLZAYDRXYLD6igkg1Ekmri6Hx0',NULL,NULL),(3,'Mariusz','mariusz@logitex',NULL,'ZAQ!2wsx',NULL,NULL,NULL),(4,'kazimierz','kazek@logitex',NULL,'siema123',NULL,NULL,NULL),(5,'Pawe┼é','pawelek@logitex',NULL,'pawelek123',NULL,NULL,NULL),(6,'asdasd','asdasd@logitex',NULL,'asdasd123',NULL,NULL,NULL),(7,'Walter White','walter@logitex',NULL,'$2y$10$BpOHFBQ/bRDcPRJH.1D./e3.OT71/5iqmosrK69oPV1e6ouN51T.K',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `marka` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dopuszczalna_masa` int(11) NOT NULL,
  `P_dostepnosc` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicles`
--

LOCK TABLES `vehicles` WRITE;
/*!40000 ALTER TABLE `vehicles` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehicles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-07 23:32:01
