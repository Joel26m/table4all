-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: hostingmysql335.nominalia.com    Database: daw04
-- ------------------------------------------------------
-- Server version	5.6.43

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `beneficiary`
--

DROP TABLE IF EXISTS `beneficiary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `beneficiary` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `latitude` decimal(7,5) DEFAULT NULL,
  `longitude` decimal(7,5) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beneficiary`
--

LOCK TABLES `beneficiary` WRITE;
/*!40000 ALTER TABLE `beneficiary` DISABLE KEYS */;
INSERT INTO `beneficiary` VALUES (1,41.38510,2.07340,'No se ha añadido ningún estado'),(2,41.38520,2.07350,'No se ha añadido ningún estado'),(3,41.38530,2.07360,'puto'),(4,41.49230,2.03310,'orgull rubinenc'),(6,42.49230,2.03310,'No se ha añadido ningún estado'),(7,42.49230,2.03310,'No se ha añadido ningún estado'),(8,41.39895,2.19335,'Si se ha añadido un estado'),(9,28.46976,-16.26326,'No se ha añadido ningún estado'),(10,41.40003,2.17595,'ssss'),(11,42.49230,2.03310,'No se ha añadido ningún estado'),(12,41.42526,2.19335,'No se ha añadido ningún estado'),(13,41.42526,2.19335,'No se ha añadido ningún estado'),(14,41.42526,2.19335,'No se ha añadido ningún estado'),(15,41.42526,2.19335,'No se ha añadido ningún estado'),(16,41.42526,2.19335,'No se ha añadido ningún estado'),(17,41.42526,2.19335,'No se ha añadido ningún estado'),(18,41.42526,2.19335,'No se ha añadido ningún estado'),(19,41.42526,2.19335,'No se ha añadido ningún estado'),(20,41.42526,2.19335,'No se ha añadido ningún estado'),(21,41.42526,2.19335,'No se ha añadido ningún estado'),(22,41.42526,2.19335,'No se ha añadido ningún estado'),(23,41.42526,2.19335,'No se ha añadido ningún estado'),(24,41.42526,2.19335,'No se ha añadido ningún estado'),(25,41.42526,2.19335,'No se ha añadido ningún estado'),(26,41.42526,2.19335,'No se ha añadido ningún estado'),(27,41.42526,2.19335,'No se ha añadido ningún estado'),(28,41.42526,2.19335,'No se ha añadido ningún estado'),(29,41.42526,2.19335,'No se ha añadido ningún estado'),(30,41.42526,2.19335,'No se ha añadido ningún estado'),(31,41.42526,2.19335,'No se ha añadido ningún estado'),(32,41.42526,2.19335,'No se ha añadido ningún estado'),(33,41.42526,2.19335,'No se ha añadido ningún estado'),(34,41.42526,2.19335,'No se ha añadido ningún estado'),(35,41.42526,2.19335,'No se ha añadido ningún estado'),(36,41.42526,2.19335,'No se ha añadido ningún estado'),(37,41.42526,2.19335,'No se ha añadido ningún estado'),(38,41.42526,2.19335,'No se ha añadido ningún estado'),(39,41.42526,2.19335,'No se ha añadido ningún estado'),(40,41.43160,2.19842,'No se ha añadido ningún estado'),(41,41.43160,2.19842,'No se ha añadido ningún estado'),(42,41.43160,2.19842,'No se ha añadido ningún estado'),(43,41.40307,2.18363,'asds'),(44,41.43414,2.19884,'bla'),(45,41.47326,2.06908,'bla'),(46,41.39347,2.12454,'No se ha añadido ningún estado'),(47,41.39347,2.12454,'No se ha añadido ningún estado'),(48,41.39347,2.12454,'No se ha añadido ningún estado'),(49,41.39347,2.12454,'No se ha añadido ningún estado'),(50,41.39347,2.12454,'No se ha añadido ningún estado'),(51,41.39347,2.12454,'No se ha añadido ningún estado'),(52,41.39347,2.12454,'No se ha añadido ningún estado'),(53,41.39347,2.12454,'No se ha añadido ningún estado'),(54,41.39347,2.12454,'No se ha añadido ningún estado'),(55,41.39347,2.12454,'No se ha añadido ningún estado'),(56,41.39347,2.12454,'No se ha añadido ningún estado'),(57,41.39347,2.12454,'No se ha añadido ningún estado'),(58,41.39347,2.12454,'No se ha añadido ningún estado'),(59,41.39347,2.12454,'No se ha añadido ningún estado'),(60,41.39347,2.12454,'No se ha añadido ningún estado'),(61,41.39347,2.12454,'No se ha añadido ningún estado'),(62,41.39347,2.12454,'No se ha añadido ningún estado'),(63,41.39347,2.12454,'No se ha añadido ningún estado'),(64,41.39347,2.12454,'No se ha añadido ningún estado'),(65,41.39347,2.12454,'No se ha añadido ningún estado'),(66,41.39347,2.12454,'No se ha añadido ningún estado'),(67,41.39347,2.12454,'bla'),(68,41.40291,2.14114,'No se ha añadido ningún estado'),(69,41.38658,2.14897,'albacete'),(70,41.41512,2.20582,'No se ha añadido ningún estado'),(71,41.42368,2.19779,'blew'),(72,41.36983,2.13151,'abc'),(73,41.41647,2.18617,'aaaaaaaaaaaaaaaaa'),(74,41.40193,2.16782,'No se ha añadido ningún estado'),(75,41.39560,2.14429,'No se ha añadido ningún estado'),(76,41.39405,2.18055,'dormido'),(77,41.39305,2.17004,'albacete'),(78,41.40830,2.16636,'abc'),(79,41.39377,2.15459,'blabla'),(80,41.32494,2.08493,'No se ha añadido ningún estado'),(81,41.32442,2.10409,'No se ha añadido ningún estado'),(82,41.34569,2.09691,'abc'),(83,41.42384,2.16275,'eeeee'),(84,41.37901,2.14138,'No se ha añadido ningún estado'),(85,41.35018,2.13370,'No se ha añadido ningún estado'),(86,41.48411,2.03505,'mkomkl'),(87,41.48439,2.03968,'uuuuu'),(88,41.25628,1.78102,'No se ha añadido ningún estado'),(89,41.29486,2.04785,'No se ha añadido ningún estado'),(90,41.28280,-0.74498,'No se ha añadido ningún estado'),(91,38.67133,-6.39211,'No se ha añadido ningún estado'),(92,41.27879,1.96412,'No se ha añadido ningún estado'),(93,41.53696,2.11677,'aaaaaaa'),(94,41.42467,2.20380,'BC'),(95,41.39867,2.14842,'No se ha añadido ningún estado'),(96,41.38477,2.15869,'No se ha añadido ningún estado'),(97,41.40023,2.16123,'No se ha añadido ningún estado'),(98,41.39537,2.16391,'blabla'),(99,41.37122,2.15760,'No se ha añadido ningún estado'),(100,41.38498,2.13865,'No se ha añadido ningún estado'),(101,41.37686,2.15934,'No se ha añadido ningún estado'),(102,41.39219,2.17594,'No se ha añadido ningún estado'),(103,41.38073,2.15497,'No se ha añadido ningún estado'),(104,41.37807,2.13132,'No se ha añadido ningún estado'),(105,41.37238,2.11833,'No se ha añadido ningún estado'),(106,41.44442,1.99101,'No se ha añadido ningún estado'),(107,41.38662,2.12390,'No se ha añadido ningún estado'),(108,41.36072,2.12578,'No se ha añadido ningún estado'),(109,41.38311,2.12707,'No se ha añadido ningún estado'),(110,41.38903,2.17556,'No se ha añadido ningún estado'),(111,41.38767,2.16960,'Piazza'),(112,41.34968,2.09046,'Piazza'),(113,41.38946,2.17540,'blabla'),(114,41.38712,2.15524,'blabla'),(115,41.39254,2.17898,'blabla'),(116,41.39054,2.17714,'No se ha añadido ningún estado'),(117,41.39116,2.18021,'blabla'),(118,41.38898,2.16846,'blabla'),(119,41.39025,2.18285,'blabla'),(120,41.39861,2.16579,'No se ha añadido ningún estado'),(121,41.38948,2.16935,'No se ha añadido ningún estado'),(122,41.39447,2.14774,'No se ha añadido ningún estado'),(123,41.39411,2.17818,'sdfsfsdfs'),(124,41.39532,2.18377,'c'),(125,41.38951,2.17109,'No se ha añadido ningún estado'),(126,41.39215,2.17104,'albacete'),(127,41.38987,2.16677,'No se ha añadido ningún estado'),(128,41.39425,2.16937,'No se ha añadido ningún estado'),(129,41.39196,2.16532,'No se ha añadido ningún estado'),(130,41.32658,2.13197,'No se ha añadido ningún estado'),(131,41.48793,2.04230,NULL),(132,41.48626,2.03397,'ooole'),(133,41.48015,1.87822,'No se ha añadido ningún estado'),(134,41.50585,2.08292,'afsdf'),(135,41.46323,1.66348,'No se ha añadido ningún estado');
/*!40000 ALTER TABLE `beneficiary` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-06 13:27:22
