-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: users
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
-- Table structure for table `logowanie`
--

DROP TABLE IF EXISTS `logowanie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logowanie` (
  `ID_LOG` int(30) NOT NULL,
  `USERNAME` varchar(30) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `PERM` tinyint(1) NOT NULL,
  `ID_EMP` int(30) NOT NULL,
  PRIMARY KEY (`ID_LOG`),
  KEY `ID_EMP` (`ID_EMP`),
  CONSTRAINT `logowanie_ibfk_1` FOREIGN KEY (`ID_EMP`) REFERENCES `pracownicy` (`ID_EMP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logowanie`
--

LOCK TABLES `logowanie` WRITE;
/*!40000 ALTER TABLE `logowanie` DISABLE KEYS */;
INSERT INTO `logowanie` VALUES (1,'pudzilla','12345',0,1),(2,'utevolux','12345',0,2),(3,'bio','12345',1,3);
/*!40000 ALTER TABLE `logowanie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `naczepy`
--

DROP TABLE IF EXISTS `naczepy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `naczepy` (
  `ID_TRAILER` varchar(30) NOT NULL,
  `VOLUME` int(30) NOT NULL COMMENT 'm^3',
  `WEIGHT` int(30) NOT NULL COMMENT 'KG',
  `NO_AXLES` int(30) NOT NULL,
  `CAPACITY` int(30) NOT NULL COMMENT 'kg',
  `WIDTH` int(30) NOT NULL COMMENT 'mm',
  `LENGTH` int(30) NOT NULL COMMENT 'mm',
  `HEIGHT` int(30) NOT NULL COMMENT 'mm',
  `ACTIVE` tinyint(1) NOT NULL,
  `RENT_PRICE` int(30) NOT NULL COMMENT 'ZŁ',
  PRIMARY KEY (`ID_TRAILER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `naczepy`
--

LOCK TABLES `naczepy` WRITE;
/*!40000 ALTER TABLE `naczepy` DISABLE KEYS */;
INSERT INTO `naczepy` VALUES ('KSU1990',90,7690,3,34310,2450,13600,2700,1,30000),('RJS1685',91,8600,3,31400,2450,13500,2750,0,15000);
/*!40000 ALTER TABLE `naczepy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pojazdy`
--

DROP TABLE IF EXISTS `pojazdy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pojazdy` (
  `ID_TRUCK` varchar(7) NOT NULL,
  `BRAND` varchar(30) NOT NULL,
  `MODEL` varchar(30) NOT NULL,
  `MAX_LOAD` int(30) NOT NULL COMMENT 'KG',
  `ACTIVE` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_TRUCK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pojazdy`
--

LOCK TABLES `pojazdy` WRITE;
/*!40000 ALTER TABLE `pojazdy` DISABLE KEYS */;
INSERT INTO `pojazdy` VALUES ('PN92108','MAN','TGX26500',26000,0),('ZGR3283','Mercedes-Benz','Actros2115',16225,1);
/*!40000 ALTER TABLE `pojazdy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pracownicy`
--

DROP TABLE IF EXISTS `pracownicy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pracownicy` (
  `ID_EMP` int(30) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `SURNAME` varchar(30) NOT NULL,
  `MOBILE` varchar(11) NOT NULL,
  `RANK` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_EMP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pracownicy`
--

LOCK TABLES `pracownicy` WRITE;
/*!40000 ALTER TABLE `pracownicy` DISABLE KEYS */;
INSERT INTO `pracownicy` VALUES (1,'Mariusz','Pudzianowski','48213769420','Kierowca'),(2,'Otylia','Jędrzejczak','48694202137','Logistyk'),(3,'Szczepan','Suchodolski','48638172137','Administrator');
/*!40000 ALTER TABLE `pracownicy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `towary`
--

DROP TABLE IF EXISTS `towary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `towary` (
  `ID_CARGO` int(30) NOT NULL,
  `WEIGHT` int(30) NOT NULL,
  `HEIGHT` int(30) NOT NULL,
  `WIDTH` int(30) NOT NULL,
  `LENGHT` int(30) NOT NULL,
  PRIMARY KEY (`ID_CARGO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `towary`
--

LOCK TABLES `towary` WRITE;
/*!40000 ALTER TABLE `towary` DISABLE KEYS */;
/*!40000 ALTER TABLE `towary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wycena`
--

DROP TABLE IF EXISTS `wycena`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wycena` (
  `ID_BILL` int(30) NOT NULL,
  `ID_ORD` int(30) NOT NULL,
  `ID_EMP` int(30) NOT NULL,
  `PRICE` int(30) NOT NULL COMMENT 'ZŁ',
  `PURCHASER` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_BILL`),
  KEY `ID_EMP` (`ID_EMP`),
  KEY `ID_ORD` (`ID_ORD`),
  CONSTRAINT `wycena_ibfk_1` FOREIGN KEY (`ID_EMP`) REFERENCES `pracownicy` (`ID_EMP`),
  CONSTRAINT `wycena_ibfk_2` FOREIGN KEY (`ID_ORD`) REFERENCES `zamowienia` (`ID_ORDER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wycena`
--

LOCK TABLES `wycena` WRITE;
/*!40000 ALTER TABLE `wycena` DISABLE KEYS */;
/*!40000 ALTER TABLE `wycena` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zamowienia`
--

DROP TABLE IF EXISTS `zamowienia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zamowienia` (
  `ID_ORDER` int(30) NOT NULL,
  `ID_EMP` int(30) NOT NULL,
  `ID_CARGO` int(30) NOT NULL,
  `ID_TRUCK` varchar(30) NOT NULL,
  `ID_TRAILER` varchar(30) NOT NULL,
  `QUANTITY` int(30) NOT NULL,
  `TARGET` varchar(90) NOT NULL,
  `DISTANCE` int(30) NOT NULL,
  `EXTRA_PRICE` int(30) NOT NULL,
  PRIMARY KEY (`ID_ORDER`),
  KEY `ID_EMP` (`ID_EMP`),
  KEY `ID_CARGO` (`ID_CARGO`),
  KEY `ID_TRAILER` (`ID_TRAILER`),
  KEY `ID_TRUCK` (`ID_TRUCK`),
  CONSTRAINT `zamowienia_ibfk_1` FOREIGN KEY (`ID_EMP`) REFERENCES `pracownicy` (`ID_EMP`),
  CONSTRAINT `zamowienia_ibfk_2` FOREIGN KEY (`ID_CARGO`) REFERENCES `towary` (`ID_CARGO`),
  CONSTRAINT `zamowienia_ibfk_3` FOREIGN KEY (`ID_TRAILER`) REFERENCES `naczepy` (`ID_TRAILER`),
  CONSTRAINT `zamowienia_ibfk_4` FOREIGN KEY (`ID_TRUCK`) REFERENCES `pojazdy` (`ID_TRUCK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zamowienia`
--

LOCK TABLES `zamowienia` WRITE;
/*!40000 ALTER TABLE `zamowienia` DISABLE KEYS */;
/*!40000 ALTER TABLE `zamowienia` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-26 13:51:37
