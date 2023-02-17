-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: acm_db
-- ------------------------------------------------------
-- Server version	8.0.29

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
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birthday` date DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `questions_submitted` int DEFAULT NULL,
  `questions_solved` int DEFAULT NULL,
  `questions_rejected` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) NOT NULL,
  `user_level_id` int NOT NULL,
  `department_id` int DEFAULT NULL,
  `user_setting_id` int NOT NULL,
  `rank_id` int DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `user_level_id` (`user_level_id`),
  KEY `department_id` (`department_id`),
  KEY `user_setting_id` (`user_setting_id`),
  KEY `user_ibfk_3_idx` (`rank_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_level_id`) REFERENCES `user_level` (`user_level_id`),
  CONSTRAINT `user_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  CONSTRAINT `user_ibfk_3` FOREIGN KEY (`user_setting_id`) REFERENCES `user_setting` (`user_setting_id`),
  CONSTRAINT `user_ibfk_4` FOREIGN KEY (`rank_id`) REFERENCES `rank` (`rank_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Detjon','Mataj','2002-08-27','dmataj','$2a$12$CIyzR5bbr0CYP3bno7GuWuyPpnswqfErk0iG0ozoR701DmLhM1EX6','dmataj@gmail.com',NULL,NULL,NULL,'2022-06-07 13:45:37','dmataj',1,NULL,1,NULL),(2,'Drin','Karkini','2002-05-08','dkarkini','$2a$12$XBbiCaYGMLmBkHMxzSbA8OLoB4R1aenr6kR9gI1.BPf1nplDaYkKq','dkarkini20@epoka.edu.al',NULL,NULL,NULL,'2022-06-07 13:45:38','dmataj',3,1,2,6),(3,'Sara','Martiri','2000-09-21','smartiri','$2a$12$l/421aqFqsx5..pMbLtwe.hMBhkgtRycB3y41cPvrAv4xoBZlpOnq','smartiri@epoka.edu.al',50,50,NULL,'2022-06-07 13:45:38','dmataj',3,1,4,1),(4,'Florenc','Skuka','1989-01-01','fskuka','$2a$12$09YObK3XrDeiitfD7I.avOthmNQq8hD6kOTbc4KGBkQm5z4k98UYq','fskuka@epoka.edu.al',1000,1000,NULL,'2022-06-07 15:15:29','dmataj',2,1,4,6),(5,'Terens','Tare','2002-10-21','ttare','$2a$12$JTPdBtFvJNfmSLnZJUwHkOZvE5unRyCsb.wsNitQGsaKpue2Trt7C','ttare@epoka.edu.al',50,50,NULL,'2022-06-07 16:26:22','dmataj',3,1,3,1),(6,'Indrit','Breti','2002-01-01','ibreti','$2a$12$D3sepOMfL5NAYBDA8Nfk1OS/4uxtYCTekD2JDJZ3gmEsNbbqSuRw.','ibreti@epoka.edu.al',500,480,20,'2022-06-08 20:49:24','dmataj',3,2,2,4);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-13  9:03:39
