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
-- Table structure for table `providermenus`
--

DROP TABLE IF EXISTS `providermenus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `providermenus` (
  `IDProvider` int(11) NOT NULL DEFAULT '0',
  `IDMenu` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) DEFAULT '0',
  PRIMARY KEY (`IDProvider`,`IDMenu`),
  KEY `IDMenu` (`IDMenu`),
  CONSTRAINT `providermenus_ibfk_1` FOREIGN KEY (`IDProvider`) REFERENCES `providers` (`IDuser`),
  CONSTRAINT `providermenus_ibfk_2` FOREIGN KEY (`IDMenu`) REFERENCES `menus` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `providermenus`
--

LOCK TABLES `providermenus` WRITE;
/*!40000 ALTER TABLE `providermenus` DISABLE KEYS */;
INSERT INTO `providermenus` VALUES (4,1,30),(4,2,45),(4,3,25),(5,1,20),(5,2,35),(5,3,15),(6,1,25),(6,2,40),(6,3,20),(15,1,50),(15,2,60),(15,3,30),(16,1,79),(16,2,76),(16,3,35);
/*!40000 ALTER TABLE `providermenus` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`daw04`@`%`*/ /*!50003 TRIGGER update_total_menus_after_update
AFTER UPDATE ON providerMenus
FOR EACH ROW
BEGIN
    UPDATE providers
    SET quantityMenus = (SELECT SUM(quantity) FROM providerMenus WHERE IDProvider = NEW.IDProvider)
    WHERE id = NEW.IDProvider;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-06 13:27:14
