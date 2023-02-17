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
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question` (
  `question_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hint` text,
  `volume_id` int DEFAULT NULL,
  `user_id` int NOT NULL,
  `question_level_id` int NOT NULL,
  `question_category_id` int NOT NULL,
  PRIMARY KEY (`question_id`),
  KEY `volume_id` (`volume_id`),
  KEY `user_id` (`user_id`),
  KEY `question_level_id` (`question_level_id`),
  KEY `question_ibfk_5_idx` (`question_category_id`),
  CONSTRAINT `question_ibfk_1` FOREIGN KEY (`volume_id`) REFERENCES `volume` (`volume_id`),
  CONSTRAINT `question_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `question_ibfk_3` FOREIGN KEY (`question_level_id`) REFERENCES `question_level` (`question_level_id`),
  CONSTRAINT `question_ibfk_5` FOREIGN KEY (`question_category_id`) REFERENCES `question_category` (`question_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (1,'A+B','This question\' s description has been updated. Add two numbers A and B','2022-06-07 14:34:16',NULL,1,1,1,10),(2,'Missing Number','Write a program that will find the missing number of a permutational series.\n\nInput\nFirst, you will be given an integer n where n is between 0 and 5000. Then, in the following n lines, you will be given n-1 integers where the integers are unique and between 1 and n\n\nOutput\nShow one integer: the missing number.','2022-06-07 14:34:16',NULL,5,1,1,5),(3,'Say Hello','Write a program that inputs your name and surname  from the keyboard and prints the string\n\n “Hello Name Surname,  welcome to our program”.\n\nInput: Name and Surname\n\nOutput: “Hello Name Surname,  welcome to our program.”','2022-06-08 21:04:56',NULL,1,4,1,11),(4,'Even or Odd','Create e program that checks whether a number is even or odd.\n\nInput: single positive integer  \n\nOutput : The message “Even” or “Odd”.','2022-06-09 17:13:53',NULL,1,4,2,10),(5,'Second Largest','Three numbers A, B and C are the inputs. Write a program to find second largest among three numbers.\n\nInput\n\nThe first line contains three integers A, B and C.\n\nOutput\n\nDisplay the second largest among A, B and C.','2022-06-09 17:13:53',NULL,3,4,2,10),(6,'Kinetic Energy','In physics, an object that is in motion is said to have kinetic energy. The following formula can be used to determine a moving object\'s kinetic energy:\n   KE = 1/2 mv2\nThe variables in the formula are as follows: KE is the kinetic energy, m is the object\'s mass in kilograms, and v is the object\'s velocity, in meters per second.\n\nQuestion:\nWrite a program that accepts mass of an object (in kilograms) and velocity (in meters per second) as arguments. The function should return the amount of kinetic energy that the object has.\n\nInput specification\nIn the first line, program will get two numbers m (mass) 0< m < 2000 and v (velocity) 0 < v <1000.\n\nOutput specification\nPrint out just one number which is the amount of kinetic energy that the object has.','2022-06-09 17:13:53',NULL,1,4,3,10);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-13  9:03:35
