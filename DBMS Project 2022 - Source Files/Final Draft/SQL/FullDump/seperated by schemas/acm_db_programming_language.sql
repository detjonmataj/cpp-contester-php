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
-- Table structure for table `programming_language`
--

DROP TABLE IF EXISTS `programming_language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `programming_language` (
  `programming_language_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `version` varchar(20) NOT NULL,
  `logo` blob NOT NULL,
  `compiler_path` varchar(255) NOT NULL,
  PRIMARY KEY (`programming_language_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programming_language`
--

LOCK TABLES `programming_language` WRITE;
/*!40000 ALTER TABLE `programming_language` DISABLE KEYS */;
INSERT INTO `programming_language` VALUES (1,'C++','23',_binary 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAOCAMAAAACJixMAAADAFBMVEUAAAB/f//k4uSi0qJ0yXN3zHee2Z7k5OS507keix4KZQoGWgYGXQYKbAogrh/E5sTX2de237a23rW45Li55rjj4eMjfyMGUgYFVQUUaxMhayAGWAUGXwVKzkqVnZUKfgocnxzX1dcMjwwRpRHS2NKrw6sGTwYFUAUlgCTn4+dCcUEpgSdqsmeVnpUFaQUYjxjW1NYFeQUFhwV7mXsESwQFTQRouWhPgU8UmRMTlBIEZQQKfwoUohMUqhOAoIEXsRcZthkHgwcHhgckvyQnviaNro15jXkFSgUFTAVgxWBLZ0sGXwYGYgYEYgQEZgQGaQYHdAaAmYAGcQYGdAYEdAQEdwQGegYHegaMqYyfp58ERAQESQRRyFBNmE0TjxI/wT6uxq67x7p5j3gEXQQWfBbT1dOuvK0EZwQEcQOpvam7ybrT1dLf3d8QRBAESAQMaQxKvkpJsEgJYgkEUQQTbBKUnZUEWgQWehUEYQQEbAPS1tKcr5sHRgcESgQDSwMETQMJXAedvZu9wr14nnaAqn7b2dt5n3d4oXfb3NvHzsdslms8eDs4djZkl2PE0cP/M5kzmZlmmZmZmZnMmZn/mZkAzJkzzJlmzGaZzJnMzJn/zJkA/5kz/5lmzJmZ/5nM/5n//5kAAMwzAJlmAMyZAMzMAMwAM5kzM8xmM8yZM8zMM8z/M8wAZswzZsxmZpmZZszMZsz/ZpkAmcwzmcxmmcyZmczMmcz/mcwAzMwzzMxmzMyZzMzMzMz/zMwA/8wz/8xm/5mZ/8zM/8z//8wzAMxmAP+ZAP8AM8wzM/9mM/+ZM//MM///M/8AZv8zZv9mZsyZZv/MZv//ZswAmf8zmf9mmf+Zmf/Mmf//mf8AzP8zzP9mzP+ZzP/MzP//zP8z//9m/8yZ///M////ZmZm/2b//2ZmZv//Zv9m//+lACFfX193d3eGhoaWlpbLy8uysrLX19fd3d3j4+Pq6urx8fH4+Pj/+/CgoKSAgID/AAAA/wD//wAAAP//AP8A//////+s+HMkAAAAAnRSTlP/AOW3MEoAAACaSURBVHjaY2RkwA4Y8UgwgsEvDAl2iATjJwZ+Rsb3IDEhxrdACVGoOOMTBllGxodAcQUg5y4DoyqQuqkBJK4y6DAyXgJK6AN1AyWMgWKnQQaYMaICNyDeAZLwRJOIBOKlDDFQ3l8Glj+sEGYOTEUvQwkjYxfIDg9Gxnagc6sYP/GDJBoYGhkZa4ESLUBOJciDHWANxSQECXYAAMgDGiI+lr2WAAAAAElFTkSuQmCC',''),(2,'Java','8','',''),(3,'Python','3.10','',''),(4,'C','11','','');
/*!40000 ALTER TABLE `programming_language` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-13  9:03:38
