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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `rol` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'rider456','password123','rider'),(2,'rider789','password456','rider'),(3,'riderABC','password789','rider'),(4,'provider456','password123','provider'),(5,'provider789','password456','provider'),(6,'providerABC','password789','provider'),(7,'Joel123','$2y$12$.XcegPLb8VFGmdBVTmKDneIPrZ4q/yRP/fAiZUqhJNblH8mZ6.tCa','rider'),(15,'providerASD','password789','provider'),(16,'providerASD','password789','provider'),(17,'prova123','$2y$10$sPdyGVs4OGlsFuKT8/LjbeSrTA6fs1YudhaIMnn1EfqnbNAjh2hZ6','rider'),(18,'providerASD','password789','rider'),(19,'joelprovider','$2y$10$jVjqPyUp7gDYPxsqZqUlKugI1MzFU3dXHbbydtyTFqWv5LX4UYpti','provider'),(20,'joelrider','$2y$10$FlmRV6hUYLpCmr08RRTcwulB.MIjI.CYZz7Av4Ehqz.pyrJUcM482','rider'),(21,'aaaaaaaaaaaaaaaaa','$2y$10$TdwmcysGsd9B2OQZ4mk92ekCNMCFRaZHJGBUxmU/r2XkFLZwAmdMi','provider'),(25,'dfdsafsd','sdfasdf','provider'),(26,'rider','$2y$10$ZIwfCWGNvj1DknNxgF2mUe5Ob8PDTwP2MqJ3qkLpb7xWigf4iwoDu','rider'),(27,'joe','$2y$10$wCdVh.9gvx2dcnIGqMs.tOqWu6KjvDxqHkUWK1.PU6ifyECN52ZwG','rider'),(28,'rogerprovider','$2y$10$tBbKD1.O0SYKTquXxH8as.rFyLMsqLs8BaMLa.g0gIQrq4tGHIdtS','provider'),(29,'pepe','$2y$10$cYI2d1k5gsAvNK16skR/QuhQqhCSL/Ah9jLVDYuG3DuM/jl1cIYZa','rider'),(30,'pepito','$2y$10$O25lAb0Zyhr0M7oCVuwJN.wpZhqFxNY.ONAmwYnPMzs8g7BEECVBm','rider'),(31,'alex','$2y$10$s6eXmmsQzelhPtqpS0S4Zec8JXIBn3ZV1i3lq.CNfDTyA0e38rnbm','rider'),(32,'raul','$2y$10$55epDUC27NMHnuR3kYKCl.9bFgND4sIBCnBmUwa02AR25YXkpWvTu','rider'),(33,'joell','$2y$10$8ssk2WJNbmSfWL6187EALObx6w4Tj4xuF6n25gEYkOVaT6ronS5xq','rider'),(34,'alex','$2y$10$1y3fsgPqdD2yug7VvmBD/O4SlWjb0ppEmgu9aO1G/cg65JPNMbtFS','rider'),(35,'alex','$2y$10$oWSB.RHaJ9rLOHsyK66YJOxbJQSaYp7kLfWWRX7nJjzHFbODDsTJq','rider'),(36,'a','$2y$10$GqxVc.tgmz6FWbOhlF0L3Ol53aNvXpodJU2txvrBGlDQO0wE7N.66','rider'),(37,'alex','$2y$10$T4VvJHhY7TaOs6/Q1lQWCeN7f8Zm0tHaKgu4Ruyy5j/dIlyao2M.e','rider'),(38,'rogerprovider','$2y$10$NefYZHp/4eYGlnri1Pe.Q.EzlQydvC2RmG.sKKWMTfReFhQaWGoly','provider'),(39,'rogerrider','$2y$10$o/A/QBomX6Zx1I/vUuk1yO7NohZUzpobJpyK2wDcpNHbPfo6kTf2K','rider'),(40,'pu','$2y$10$n7UQ1roCTlE6asV9RlQwjO8W2m9bqbXTG/FtD9NdcqJ6HxlwyiNla','rider'),(41,'admin1','1234admin','admin'),(42,'admin','$2y$10$YfqWCSz0XyZ2u51Too1hY.ikXJNdMhM4R9NtvqMzhwceWYuMPlCMm','admin'),(43,'admin','$2y$10$FZ5Afq5NOvzXf8sxh4nlZ.snX5OXhlDKyQ7Y7kV8mCzu0n.SYRzMS','admin'),(44,'admin','$2y$10$uglbwkATzs1MxYjq4tUpQe2TevE11oROi8VoUuDWAkfJdq4CwDUdW','admin'),(45,'provider4','$2y$10$WB04nXP4M8HT6Vfo8apT8OXBpeWyOLkUptia14vOwVNkXTaUdxXC2','provider'),(46,'provider5','$2y$10$z8KS3dPYNHqEBJ/8NHEiBehP312nb/0bM5G43HnmQSqYP4pbV0r3C','provider'),(47,'provider6','$2y$10$w69QfotdpZ9YA15pa2Z99.JPtWdHG7zG1yHDNNdTJvJPW2ifhCZwW','provider'),(48,'provider6','$2y$10$palXDWnS6YsoStVe1LFQLuZJylyM2M/KgxEdE.9GM/h33Foy9/oYq','provider'),(49,'provider6','$2y$10$O0zVD0m121DXQ1WwCnzqj.2OYMp2uNJMz8/PquIqWO34TiYIZMQTi','provider'),(50,'rogeradmin','$2y$10$5SLrz9DuMYMx1L7lbc/s7O5adHVJCEjP475LRE0xelbQ44NTiC11m','admin'),(51,'alexadmin','$2y$10$cpWPjv4qSbvvjvORvpk6pe8Dtm2Tv8JZOv26TQ2vcHHt6.VKnXoQ2','admin'),(52,'riiiiideeer','$2y$10$9RUBw/3SjTHK33/KuWgtG.1eA4SKIm1JBYGcG68xBawijNJ/.0HNS','rider'),(53,'prueba1','$2y$10$l0EVnjMTh2gi.FFi4SUTdefvPKns8HKyTvtidXWWv4V9Opzc22K22','rider'),(54,'prueba2','$2y$10$Cehqg/zIJOZZ0jMHqqgvT.gL4yXk4GXoCmGiGbnJ0wscbJc.Dt/XC','provider'),(55,'prueba2','$2y$10$fvjOYzX2xIeOdUF3VLlopuKmQvo0lEAfyVgZYP6oO5rENHfoILwmi','provider'),(56,'prueba3','$2y$10$QS7bketVKQc1xX1CBkVhMu48GOsxFEERbdJwwmn9B/cCGHfvOl2O6','rider'),(57,'AdminJoel','$2y$10$QB/CS5X.y2lEo8MJ9d10VO649bDp/gQ/tjTM/mZ0eIUDk2lV.tMgm','admin'),(58,'rauladmin','$2y$10$p6aR.1KvLzU.QOSLTNQ3ReZrHMw6vJ8iTulpr40sybTxkSBLcG9fa','admin'),(59,'joeladmin','$2y$10$9o4s8dkJzXijjpwoeLekDuAv6xpHYX3bQS4gglawKP3FEzCiZRz1C','admin');
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

-- Dump completed on 2024-05-06 13:27:19
