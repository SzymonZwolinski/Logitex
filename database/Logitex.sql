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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cars`
--

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` VALUES (1,'pugot','306',1700,0),(3,'fiat','bravo',123123,0),(4,'123','123',123,1);
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
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
  `kubatura` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `final_orders`
--

LOCK TABLES `final_orders` WRITE;
/*!40000 ALTER TABLE `final_orders` DISABLE KEYS */;
INSERT INTO `final_orders` VALUES (3,5,1,'37',100,12,'2022-05-31 09:31:47',NULL),(4,6,1,'f17077df-3e20-4204-9f2b-5edb7b42c4e6',2475,3,'2022-06-06 18:50:43',NULL),(5,5,1,'268db766-dbc9-4a43-86bb-de2e678cf794',2475,3,'2022-06-06 19:26:34',NULL),(37,5,1,'1777bbcf-faee-4761-a4fa-bbf401e92e51',2475,3,'2022-06-07 09:54:08',NULL),(38,6,1,'383afd09-23e4-4bcf-b158-4bac39e3bedc',1650,2,'2022-06-07 09:54:40',NULL),(39,6,1,'383afd09-23e4-4bcf-b158-4bac39e3bedc',1650,2,'2022-06-07 09:55:07',NULL),(40,5,1,'fddc0f6b-8c78-415c-961a-a489b5507cdf',1650,2,'2022-06-07 09:56:30',NULL),(41,6,1,'30a270e8-1d5b-442f-b848-864d6ae49cff',5775,3,'2022-06-07 10:58:49',NULL),(42,6,1,'6197819d-f6d5-4daa-a6c3-5770e9b6c571',1650,2,'2022-06-07 20:41:33',NULL),(43,6,1,'8572f037-8c6c-4338-a7d6-0ea454ac4c58',1650,2,'2022-06-10 18:07:46',22.72),(45,5,1,'57264550-4cce-4be0-8bcd-fe48ea87b7b7',1650,2,'2022-06-11 17:09:19',22.72),(46,5,3,'c7c17b00-ae05-4808-b715-c56ca6a1146c',1650,2,'2022-06-11 17:17:01',22.72);
/*!40000 ALTER TABLE `final_orders` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp852 */ ;
/*!50003 SET character_set_results = cp852 */ ;
/*!50003 SET collation_connection  = cp852_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER history BEFORE DELETE ON final_orders
FOR EACH ROW
BEGIN 
INSERT INTO order_history VALUES (old.id, old.id_naczepy,old.id_pojazdu,old.id_zamowienia,old.waga,old.ilosc_ladunku,old.data_dodania);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp852 */ ;
/*!50003 SET character_set_results = cp852 */ ;
/*!50003 SET collation_connection  = cp852_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER zwolCar BEFORE DELETE ON final_orders
FOR EACH ROW
BEGIN
UPDATE  cars c SET c.P_dostepnosc= 1 WHERE c.id = OLD.id_pojazdu;
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
  `opis` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `final_orders_location`
--

LOCK TABLES `final_orders_location` WRITE;
/*!40000 ALTER TABLE `final_orders_location` DISABLE KEYS */;
INSERT INTO `final_orders_location` VALUES (1,NULL,'Polska','Gda┼äst',NULL,NULL),(27,'123','132','123132',NULL,'123'),(28,'1344','135','153',NULL,'15433'),(29,NULL,'124azsdxc','1234qesw',NULL,'q3s2waed4wsd444444');
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (5,'2022_05_13_113441_create_vehicles_table',2),(8,'2022_05_21_101937_create_permission_tables',5),(9,'2022_05_21_125834_create_orders_table',5),(10,'2022_05_22_141031_create_roles_table',6),(13,'2022_05_22_144831_create_roles_table',8),(14,'2014_10_12_000000_create_users_table',9),(15,'2014_10_12_100000_create_password_resets_table',9),(16,'2019_08_19_000000_create_failed_jobs_table',9),(17,'2019_12_14_000001_create_personal_access_tokens_table',9),(18,'2022_05_13_134142_create_trailers_table',9),(22,'2022_05_27_114157_create_admins_table',10),(23,'2022_05_30_181805_create_final_orders_table',11);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_history`
--

LOCK TABLES `order_history` WRITE;
/*!40000 ALTER TABLE `order_history` DISABLE KEYS */;
INSERT INTO `order_history` VALUES (2,2,1,33,1,1,'2022-05-31 07:54:49'),(3,2,NULL,NULL,NULL,NULL,'2022-05-31 18:08:19'),(4,2,2,NULL,NULL,NULL,'2022-05-31 18:08:39'),(5,2,2,NULL,NULL,NULL,'2022-05-31 18:10:45'),(44,6,3,0,2475,3,'2022-06-10 18:10:50');
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
  `kubatura` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=789 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (744,NULL,NULL,NULL,123,NULL,NULL,NULL),(778,'dc7edbef-b91a-49c8-9938-7c1269e1a8a4','lidl','1G:{\"primitive\":\"box\",\"height\":1.16666666,\"width\":0.466666664,\"depth\":0.466666664}P:{\"x\":-3.1097310418413024,\"y\":0.6811678781963086,\"z\":-0.24100379793680085}N:\"lidl\"W:\"825\"',825,3375,6,12.56),(779,'dc7edbef-b91a-49c8-9938-7c1269e1a8a4','biedronka','2G:{\"primitive\":\"box\",\"height\":1.16666666,\"width\":1.16666666,\"depth\":0.699999996}P:{\"x\":-1.9461011886099964,\"y\":0.6811226358226069,\"z\":0.0017248765550381094}N:\"biedronka\"W:\"850\"',850,3375,6,12.56),(780,'dc7edbef-b91a-49c8-9938-7c1269e1a8a4','kujawski','3G:{\"primitive\":\"box\",\"height\":1.74999999,\"width\":1.74999999,\"depth\":0.699999996}P:{\"x\":-0.40927120091513847,\"y\":0.9728026909800336,\"z\":0.04430254178763173}N:\"kujawski\"W:\"850\"',850,3375,6,12.56),(781,'dc7edbef-b91a-49c8-9938-7c1269e1a8a4','logitex','4G:{\"primitive\":\"box\",\"height\":2.33333332,\"width\":2.33333332,\"depth\":0.699999996}P:{\"x\":2.0076062854709376,\"y\":1.2645010816192663,\"z\":0.06491580723954238}N:\"logitex\"W:\"850\"',850,3375,6,12.56),(782,'a77ac779-154f-4d49-9342-99f64b3b7a17','lidl','1G:{\"primitive\":\"box\",\"height\":\"1.16666666\",\"width\":\"0.466666664\",\"depth\":\"0.466666664\"}P:{\"x\":-3.1068397531073706,\"y\":0.681238313967552,\"z\":-0.24930395056367724}N:\"lidl\"W:\"825\"',825,3350,6,16.72),(783,'a77ac779-154f-4d49-9342-99f64b3b7a17','biedronka','2G:{\"primitive\":\"box\",\"height\":\"1.16666666\",\"width\":\"1.16666666\",\"depth\":\"0.699999996\"}P:{\"x\":-1.947832361788491,\"y\":0.6811127558583956,\"z\":-0.0006475241764329482}N:\"biedronka\"W:\"850\"',850,3350,6,16.72),(784,'a77ac779-154f-4d49-9342-99f64b3b7a17','kujawski','3G:{\"primitive\":\"box\",\"height\":\"1.74999999\",\"width\":\"1.74999999\",\"depth\":\"0.699999996\"}P:{\"x\":-0.4086925992686695,\"y\":0.972815215942715,\"z\":0.023759218039648627}N:\"kujawski\"W:\"850\"',850,3350,6,16.72),(785,'a77ac779-154f-4d49-9342-99f64b3b7a17','logitex','4G:\"\"P:{\"x\":2.008513267649636,\"y\":1.264498566681944,\"z\":0.054857609384714054}N:\"logitex\"W:\"850\"',850,3350,6,16.72),(786,'a77ac779-154f-4d49-9342-99f64b3b7a17','','5G:{\"primitive\":\"box\",\"height\":\"\",\"width\":\"\",\"depth\":\"\"}P:{\"x\":null,\"y\":null,\"z\":null}N:\"\"W:\"0\"',0,3350,6,16.72),(787,'a77ac779-154f-4d49-9342-99f64b3b7a17','','6G:{\"primitive\":\"box\",\"height\":\"\",\"width\":\"\",\"depth\":\"\"}P:{\"x\":null,\"y\":null,\"z\":null}N:\"\"W:\"\"',0,3350,6,16.72),(788,'a77ac779-154f-4d49-9342-99f64b3b7a17','9e4c5b41-ce84-4238-a6bb-42389408ecfd','7G:{\"primitive\":\"box\",\"height\":1.16666666,\"width\":0.466666664,\"depth\":0.466666664}P:{\"x\":1.143169398492428,\"y\":0.6812383115151498,\"z\":0.008801834898149351}N:\"9e4c5b41-ce84-4238-a6bb-42389408ecfd\"W:\"825\"',825,3350,6,16.72);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp852 */ ;
/*!50003 SET character_set_results = cp852 */ ;
/*!50003 SET collation_connection  = cp852_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER zwolTrailer BEFORE DELETE ON orders
FOR EACH ROW
BEGIN
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trailers`
--

LOCK TABLES `trailers` WRITE;
/*!40000 ALTER TABLE `trailers` DISABLE KEYS */;
INSERT INTO `trailers` VALUES (5,123,0,1,2,12,4,1),(6,123,10000,1,2,12,4,0),(7,123,123,123,123,123,123,123);
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
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'zbyszek','zbyszek@logitex','$2y$10$PDQnKhSBfUX/qMNlTW9ai.gkwHmwNCVq9pZyOqtFaCgwZY.E4YOEq',1,NULL),(2,'Walter White','walter@logitex','$2y$10$ajONXMbb931hXnuRf1q/puNyb3Vtb5RNxclcNLFg2ZpbDN3c7qk2q',0,NULL);
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

-- Dump completed on 2022-06-15 10:53:15
