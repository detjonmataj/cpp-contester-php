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
-- Table structure for table `submission`
--

DROP TABLE IF EXISTS `submission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `submission` (
  `submission_id` int NOT NULL AUTO_INCREMENT,
  `code` text NOT NULL,
  `status_name` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `question_id` int NOT NULL,
  `user_id` int NOT NULL,
  `assignment_id` int DEFAULT NULL,
  `programming_language_id` int NOT NULL,
  `error_message` text,
  PRIMARY KEY (`submission_id`),
  KEY `assignment_id` (`assignment_id`),
  KEY `user_id` (`user_id`),
  KEY `question_id` (`question_id`),
  KEY `programming_language_id` (`programming_language_id`),
  CONSTRAINT `submission_ibfk_1` FOREIGN KEY (`assignment_id`) REFERENCES `assignment` (`assignment_id`),
  CONSTRAINT `submission_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `submission_ibfk_3` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`),
  CONSTRAINT `submission_ibfk_4` FOREIGN KEY (`programming_language_id`) REFERENCES `programming_language` (`programming_language_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `submission`
--

LOCK TABLES `submission` WRITE;
/*!40000 ALTER TABLE `submission` DISABLE KEYS */;
INSERT INTO `submission` VALUES (1,'\n#include <iostream>\n\nusing namespace std;\n\nint main()\n{\n  int a, b;\n  cin >> a;\n  cin >> b;\n  cout << a + b << \"\\n\";\n  char wait;\n  cin >> wait;\n  return 0;\n}\n','Accepted !','2022-05-10 12:30:00',1,2,1,1,NULL),(2,'\n#include <iostream>\n\nusing namespace std;\n\nint main()\n{\n  int a, b;\n  cin >> a;\n  cin >> b;\n  cout << a + b << \"\\n\";\n  char wait;\n  cin >> wait;\n  return 0\n}\n','Compilation Error !','2022-06-07 18:00:00',1,3,1,1,NULL),(3,'#include <iostream>\n#include <fstream>\n#include <cstdlib>\n\nusing namespace std;\n\nifstream fin(\"input.txt\");\nofstream fout(\"output.txt\");\n\nint main() \n{\n    if(fin.fail() || fout.fail())\n        exit(1);\n    \n    int n, num, sum1 = 0, sum2 = 0;\n\n    fin>>n;\n\n    for(int i = 0 ; i < n ; i++)\n    {\n        fin>>num;\n        sum1 += num;\n    }\n\n    for(int i = 0 ; i < n-1 ; i++)\n    {\n        fin>>num;\n        sum2 += num;\n    }\n\n    cout<<sum1-sum2<<endl;\n\n    fin.close();\n    fout.close();\n    return 0;\n}','Accepted !','2022-06-09 21:22:08',2,2,NULL,1,NULL),(4,'#include <iostream>\n#include <fstream>\n#include <cstdlib>\n\nusing namespace std;\n\nifstream fin(\"input.txt\");\nofstream fout(\"output.txt\");\n\nint main() \n{\n    if(fin.fail() || fout.fail())\n        exit(1);\n    \n    int n, num, sum1 = 0, sum2 = 0;\n\n    fin>>n;\n\n    for(int i = 0 ; i < n ; i++)\n    {\n        fin>>num;\n        sum1 += num;\n    }\n\n    for(int i = 0 ; i < n-1 ; i++)\n    {\n        fin>>num;\n        sum2 += num;\n    }\n\n    cout<<sum1-sum2<<endl;\n\n    fin.close();\n    fout.close();\n    return 0;\n}','Accepted !','2022-06-09 21:22:08',2,3,NULL,1,NULL),(5,'#include <iostream>\n#include <fstream>\n#include <cstdlib>\n\nusing namespace std;\n\nifstream fin(\"input.txt\");\nofstream fout(\"output.txt\");\n\nint main() \n{\n    if(fin.fail() || fout.fail())\n        exit(1);\n    \n    int n, num, sum1 = 0, sum2 = 0;\n\n    fin>>n;\n\n    for(int i = 0 ; i < n ; i++)\n    {\n        fin>>num;\n        sum1 += num;\n    }\n\n    for(int i = 0 ; i < n-1 ; i++)\n    {\n        fin>>num;\n        sum2 += num;\n    }\n\n    cout<<sum1-sum2<<endl;\n\n    fin.close();\n    fout.close();\n    return 0;\n}','Accepted !','2022-06-09 21:22:08',2,4,NULL,1,NULL),(6,'#include <iostream>\n#include <string>\n\nusing namespace std;\n\nint main()\n{\n    string name;\n\n    getline(cin, name);\n    cout<<\"Hello \"<<name<<\", welcome to our program.\"<<endl;\n\n    return 0;\n}','Accepted !','2022-06-09 21:22:08',3,2,NULL,1,NULL),(7,'#include <iostream>\n#include <string>\n\nusing namespace std;\n\nint main()\n{\n    string name;\n\n    getline(cin, name);\n    cout<<\"Hello \"<<name<<\", welcome to our program.\"<<endl;\n\n    return 0;\n}','Accepted !','2022-06-09 21:22:08',4,2,NULL,1,NULL),(8,'#include <iostream>\n#include <string>\n\nusing namespace std;\n\nint main()\n{\n    string name;\n\n    getline(cin, name);\n    cout<<\"Hello \"<<name<<\", welcome to our program.\"<<endl;\n\n    return 0;\n}','Accepted !','2022-06-09 21:22:08',4,2,NULL,1,NULL),(9,'#include <iostream>\n#include <fstream>\n#include <cstdlib>\n\nusing namespace std;\n\nifstream fin(\"input.txt\");\nofstream fout(\"output.txt\");\n\nint main() \n{\n    if(fin.fail() || fout.fail())\n        exit(1);\n    \n    int n, num, sum1 = 0, sum2 = 0;\n\n    fin>>n;\n\n    for(int i = 0 ; i < n ; i++)\n    {\n        fin>>num;\n        sum1 += num;\n    }\n\n    for(int i = 0 ; i < n-1 ; i++)\n    {\n        fin>>num;\n        sum2 += num;\n    }\n\n    cout<<sum1-sum2<<endl;\n\n    fin.close();\n    fout.close();\n    return 0;\n}','Accepted !','2022-06-09 21:22:08',2,2,NULL,1,NULL);
/*!40000 ALTER TABLE `submission` ENABLE KEYS */;
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
