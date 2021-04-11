-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: CONTACTE
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

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
-- Table structure for table `Adrese`
--

DROP TABLE IF EXISTS `Adrese`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Adrese` (
  `id` int(11) NOT NULL,
  `adresa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Adrese`
--

LOCK TABLES `Adrese` WRITE;
/*!40000 ALTER TABLE `Adrese` DISABLE KEYS */;
INSERT INTO `Adrese` VALUES (1,'romulescuflorin444@gmail.com'),(2,'enescuhoria@gmail.com'),(3,'rotarumihai@gmail.com'),(4,'geo@gmail.com');
/*!40000 ALTER TABLE `Adrese` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Contacte`
--

DROP TABLE IF EXISTS `Contacte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Contacte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Contacte`
--

LOCK TABLES `Contacte` WRITE;
/*!40000 ALTER TABLE `Contacte` DISABLE KEYS */;
INSERT INTO `Contacte` VALUES (1,'Romulescu Florin'),(2,'Enescu Horia'),(3,'Rotaru Mihai'),(4,'George Tudor'),(5,'Test');
/*!40000 ALTER TABLE `Contacte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Numere`
--

DROP TABLE IF EXISTS `Numere`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Numere` (
  `id` int(11) NOT NULL,
  `nume` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Numere`
--

LOCK TABLES `Numere` WRITE;
/*!40000 ALTER TABLE `Numere` DISABLE KEYS */;
INSERT INTO `Numere` VALUES (1,'0749834164'),(2,'0711122233'),(3,'0123456789'),(4,'0123456789');
/*!40000 ALTER TABLE `Numere` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-01 21:07:38