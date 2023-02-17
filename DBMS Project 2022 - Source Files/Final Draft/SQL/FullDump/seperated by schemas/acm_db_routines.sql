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
-- Temporary view structure for view `test cases of question`
--

DROP TABLE IF EXISTS `test cases of question`;
/*!50001 DROP VIEW IF EXISTS `test cases of question`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `test cases of question` AS SELECT 
 1 AS `test_case_id`,
 1 AS `input`,
 1 AS `output`,
 1 AS `question_id`,
 1 AS `Question`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `average points per group`
--

DROP TABLE IF EXISTS `average points per group`;
/*!50001 DROP VIEW IF EXISTS `average points per group`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `average points per group` AS SELECT 
 1 AS `group_id`,
 1 AS `name`,
 1 AS `AVG(points)`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `user and rank`
--

DROP TABLE IF EXISTS `user and rank`;
/*!50001 DROP VIEW IF EXISTS `user and rank`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `user and rank` AS SELECT 
 1 AS `user_id`,
 1 AS `User Full Name`,
 1 AS `Rank`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `submissions 1 day before assignment creation`
--

DROP TABLE IF EXISTS `submissions 1 day before assignment creation`;
/*!50001 DROP VIEW IF EXISTS `submissions 1 day before assignment creation`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `submissions 1 day before assignment creation` AS SELECT 
 1 AS `user_id`,
 1 AS `User Full Name`,
 1 AS `Assignment Name`,
 1 AS `Hour Difference`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `announcements for patches`
--

DROP TABLE IF EXISTS `announcements for patches`;
/*!50001 DROP VIEW IF EXISTS `announcements for patches`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `announcements for patches` AS SELECT 
 1 AS `announcement_id`,
 1 AS `Announcement Title`,
 1 AS `Announcement Description`,
 1 AS `Category Name`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `questions for assignments`
--

DROP TABLE IF EXISTS `questions for assignments`;
/*!50001 DROP VIEW IF EXISTS `questions for assignments`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `questions for assignments` AS SELECT 
 1 AS `question_id`,
 1 AS `Assignment Name`,
 1 AS `Question`,
 1 AS `Assignment Description`,
 1 AS `Question Description`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `top 10`
--

DROP TABLE IF EXISTS `top 10`;
/*!50001 DROP VIEW IF EXISTS `top 10`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `top 10` AS SELECT 
 1 AS `user_id`,
 1 AS `User Full Name`,
 1 AS `questions_solved`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `replies to comment`
--

DROP TABLE IF EXISTS `replies to comment`;
/*!50001 DROP VIEW IF EXISTS `replies to comment`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `replies to comment` AS SELECT 
 1 AS `user_id`,
 1 AS `User Full Name`,
 1 AS `comment_id`,
 1 AS `Comment Head`,
 1 AS `Comment Body`,
 1 AS `question_id`,
 1 AS `Question`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `users groups and contests`
--

DROP TABLE IF EXISTS `users groups and contests`;
/*!50001 DROP VIEW IF EXISTS `users groups and contests`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `users groups and contests` AS SELECT 
 1 AS `user_id`,
 1 AS `User Full Name`,
 1 AS `group_id`,
 1 AS `Group`,
 1 AS `contest_id`,
 1 AS `Contest`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `questions count per question level`
--

DROP TABLE IF EXISTS `questions count per question level`;
/*!50001 DROP VIEW IF EXISTS `questions count per question level`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `questions count per question level` AS SELECT 
 1 AS `question_level_id`,
 1 AS `Level`,
 1 AS `Number of questions`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `top 3 preferred themes`
--

DROP TABLE IF EXISTS `top 3 preferred themes`;
/*!50001 DROP VIEW IF EXISTS `top 3 preferred themes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `top 3 preferred themes` AS SELECT 
 1 AS `theme_id`,
 1 AS `Theme`,
 1 AS `Number of uses`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `submissions after deadline`
--

DROP TABLE IF EXISTS `submissions after deadline`;
/*!50001 DROP VIEW IF EXISTS `submissions after deadline`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `submissions after deadline` AS SELECT 
 1 AS `user_id`,
 1 AS `User Full Name`,
 1 AS `Assignment Name`,
 1 AS `Hour Difference`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `top 5 solved volumes`
--

DROP TABLE IF EXISTS `top 5 solved volumes`;
/*!50001 DROP VIEW IF EXISTS `top 5 solved volumes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `top 5 solved volumes` AS SELECT 
 1 AS `volume_id`,
 1 AS `Volume`,
 1 AS `Number of accepted submissions`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `most preferred programming language`
--

DROP TABLE IF EXISTS `most preferred programming language`;
/*!50001 DROP VIEW IF EXISTS `most preferred programming language`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `most preferred programming language` AS SELECT 
 1 AS `programming_language_id`,
 1 AS `Programming Language`,
 1 AS `Number of uses`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `student count per department`
--

DROP TABLE IF EXISTS `student count per department`;
/*!50001 DROP VIEW IF EXISTS `student count per department`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `student count per department` AS SELECT 
 1 AS `department_id`,
 1 AS `name`,
 1 AS `members`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `assignments per group`
--

DROP TABLE IF EXISTS `assignments per group`;
/*!50001 DROP VIEW IF EXISTS `assignments per group`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `assignments per group` AS SELECT 
 1 AS `assignment_id`,
 1 AS `group_id`,
 1 AS `Assignment`,
 1 AS `Group`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `todo's with at least 5 questions`
--

DROP TABLE IF EXISTS `todo's with at least 5 questions`;
/*!50001 DROP VIEW IF EXISTS `todo's with at least 5 questions`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `todo's with at least 5 questions` AS SELECT 
 1 AS `todo_id`,
 1 AS `TODO Name`,
 1 AS `TODO Description`,
 1 AS `user_id`,
 1 AS `User Full Name`,
 1 AS `Number of questions`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `favourite question of user`
--

DROP TABLE IF EXISTS `favourite question of user`;
/*!50001 DROP VIEW IF EXISTS `favourite question of user`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `favourite question of user` AS SELECT 
 1 AS `user_id`,
 1 AS `User Full Name`,
 1 AS `question_id`,
 1 AS `Question`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `points for specific assignment and specific group`
--

DROP TABLE IF EXISTS `points for specific assignment and specific group`;
/*!50001 DROP VIEW IF EXISTS `points for specific assignment and specific group`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `points for specific assignment and specific group` AS SELECT 
 1 AS `user_id`,
 1 AS `User Full Name`,
 1 AS `assignment_id`,
 1 AS `Assignment Name`,
 1 AS `group_id`,
 1 AS `Group name`,
 1 AS `points`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `authentication`
--

DROP TABLE IF EXISTS `authentication`;
/*!50001 DROP VIEW IF EXISTS `authentication`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `authentication` AS SELECT 
 1 AS `user_id`,
 1 AS `first_name`,
 1 AS `last_name`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `test cases of question`
--

/*!50001 DROP VIEW IF EXISTS `test cases of question`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `test cases of question` AS select `t_c`.`test_case_id` AS `test_case_id`,`t_c`.`input` AS `input`,`t_c`.`output` AS `output`,`q`.`question_id` AS `question_id`,`q`.`title` AS `Question` from (`test_case` `t_c` join `question` `q` on((`t_c`.`question_id` = `q`.`question_id`))) where (`q`.`question_id` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `average points per group`
--

/*!50001 DROP VIEW IF EXISTS `average points per group`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `average points per group` AS select `g_u`.`group_id` AS `group_id`,`g_u`.`name` AS `name`,avg(`assignment_user`.`points`) AS `AVG(points)` from ((select `u`.`user_id` AS `user_id`,`g`.`group_id` AS `group_id`,`g`.`name` AS `name` from ((`group_user` `g_u` join `user` `u` on((`g_u`.`user_id` = `u`.`user_id`))) join `group` `g` on((`g`.`group_id` = `g_u`.`group_id`))) where (`g`.`student_group_id` is not null)) `g_u` join `assignment_user` on((`assignment_user`.`user_id` = `g_u`.`user_id`))) group by `g_u`.`group_id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `user and rank`
--

/*!50001 DROP VIEW IF EXISTS `user and rank`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `user and rank` AS select `u`.`user_id` AS `user_id`,concat(`u`.`first_name`,' ',`u`.`last_name`) AS `User Full Name`,`r`.`name` AS `Rank` from (`user` `u` join `rank` `r` on((`u`.`rank_id` = `r`.`rank_id`))) order by `r`.`rank_id` desc,'User Full Name' */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `submissions 1 day before assignment creation`
--

/*!50001 DROP VIEW IF EXISTS `submissions 1 day before assignment creation`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `submissions 1 day before assignment creation` AS select `u`.`user_id` AS `user_id`,concat(`u`.`first_name`,' ',`u`.`last_name`) AS `User Full Name`,`a`.`name` AS `Assignment Name`,timestampdiff(HOUR,`a`.`created_at`,`s`.`created_at`) AS `Hour Difference` from ((`user` `u` join `submission` `s` on((`u`.`user_id` = `s`.`user_id`))) join `assignment` `a` on((`s`.`assignment_id` = `a`.`assignment_id`))) where ('Hour Difference' < 24) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `announcements for patches`
--

/*!50001 DROP VIEW IF EXISTS `announcements for patches`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `announcements for patches` AS select `an`.`announcement_id` AS `announcement_id`,`an`.`title` AS `Announcement Title`,`an`.`description` AS `Announcement Description`,`an_cat`.`name` AS `Category Name` from (`announcement` `an` join `announcement_category` `an_cat` on((`an`.`announcement_category_id` = `an_cat`.`announcement_category_id`))) where (`an`.`announcement_category_id` = 2) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `questions for assignments`
--

/*!50001 DROP VIEW IF EXISTS `questions for assignments`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `questions for assignments` AS select `question`.`question_id` AS `question_id`,`assignment`.`name` AS `Assignment Name`,`question`.`title` AS `Question`,`assignment`.`description` AS `Assignment Description`,`question`.`description` AS `Question Description` from ((`assignment` join `question`) join `assignment_question`) where ((`question`.`question_id` = `assignment_question`.`question_id`) and (`assignment`.`assignment_id` = `assignment_question`.`assignment_id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `top 10`
--

/*!50001 DROP VIEW IF EXISTS `top 10`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `top 10` AS select `user`.`user_id` AS `user_id`,concat(`user`.`first_name`,' ',`user`.`last_name`) AS `User Full Name`,`user`.`questions_solved` AS `questions_solved` from `user` where (`user`.`questions_solved` is not null) order by `user`.`questions_solved` desc,'User Full Name' limit 10 */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `replies to comment`
--

/*!50001 DROP VIEW IF EXISTS `replies to comment`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `replies to comment` AS select `u`.`user_id` AS `user_id`,concat(`u`.`first_name`,' ',`u`.`last_name`) AS `User Full Name`,`c`.`comment_id` AS `comment_id`,`c`.`title` AS `Comment Head`,`c`.`description` AS `Comment Body`,`q`.`question_id` AS `question_id`,`q`.`title` AS `Question` from ((`comment` `c` join `user` `u` on((`c`.`user_id` = `u`.`user_id`))) join `question` `q` on((`c`.`question_id` = `q`.`question_id`))) where (`c`.`replies_to_id` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `users groups and contests`
--

/*!50001 DROP VIEW IF EXISTS `users groups and contests`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `users groups and contests` AS select `u`.`user_id` AS `user_id`,concat(`u`.`first_name`,' ',`u`.`last_name`) AS `User Full Name`,`g`.`group_id` AS `group_id`,`g`.`name` AS `Group`,`c`.`contest_id` AS `contest_id`,`c`.`name` AS `Contest` from ((((`user` `u` join `group_user` `g_u` on((`u`.`user_id` = `g_u`.`user_id`))) join `group` `g` on((`g_u`.`group_id` = `g`.`group_id`))) join `contest_group` `c_g` on((`g`.`group_id` = `c_g`.`group_id`))) join `contest` `c` on((`c_g`.`contest_id` = `c`.`contest_id`))) order by concat(`u`.`first_name`,' ',`u`.`last_name`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `questions count per question level`
--

/*!50001 DROP VIEW IF EXISTS `questions count per question level`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `questions count per question level` AS select `qlev`.`question_level_id` AS `question_level_id`,`qlev`.`name` AS `Level`,count(`q`.`question_id`) AS `Number of questions` from (`question` `q` join `question_level` `qlev` on((`q`.`question_level_id` = `qlev`.`question_level_id`))) group by `qlev`.`question_level_id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `top 3 preferred themes`
--

/*!50001 DROP VIEW IF EXISTS `top 3 preferred themes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `top 3 preferred themes` AS select `t`.`theme_id` AS `theme_id`,`t`.`name` AS `Theme`,count(`t`.`theme_id`) AS `Number of uses` from ((`user` `u` join `user_setting` `u_s` on((`u`.`user_setting_id` = `u_s`.`user_setting_id`))) join `theme` `t` on((`u_s`.`theme_id` = `t`.`theme_id`))) group by `t`.`theme_id` order by count(`t`.`theme_id`) desc limit 3 */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `submissions after deadline`
--

/*!50001 DROP VIEW IF EXISTS `submissions after deadline`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `submissions after deadline` AS select `u`.`user_id` AS `user_id`,concat(`u`.`first_name`,' ',`u`.`last_name`) AS `User Full Name`,`a`.`name` AS `Assignment Name`,timestampdiff(HOUR,`s`.`created_at`,`a`.`deadline`) AS `Hour Difference` from ((`user` `u` join `submission` `s` on((`u`.`user_id` = `s`.`user_id`))) join `assignment` `a` on((`s`.`assignment_id` = `a`.`assignment_id`))) where (timestampdiff(HOUR,`s`.`created_at`,`a`.`deadline`) >= 0) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `top 5 solved volumes`
--

/*!50001 DROP VIEW IF EXISTS `top 5 solved volumes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `top 5 solved volumes` AS select `v`.`volume_id` AS `volume_id`,`v`.`name` AS `Volume`,count(distinct `q`.`question_id`,`s`.`status_name`,`s`.`user_id`) AS `Number of accepted submissions` from ((`submission` `s` join `question` `q` on((`s`.`question_id` = `q`.`question_id`))) join `volume` `v` on((`q`.`volume_id` = `v`.`volume_id`))) where (`s`.`status_name` = 'Accepted !') group by `v`.`volume_id` order by count(distinct `q`.`question_id`,`s`.`status_name`,`s`.`user_id`) desc limit 5 */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `most preferred programming language`
--

/*!50001 DROP VIEW IF EXISTS `most preferred programming language`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `most preferred programming language` AS select `p`.`programming_language_id` AS `programming_language_id`,`p`.`name` AS `Programming Language`,count(`p`.`programming_language_id`) AS `Number of uses` from ((`user` `u` join `user_setting` `u_s` on((`u`.`user_setting_id` = `u_s`.`user_setting_id`))) join `programming_language` `p` on((`u_s`.`programming_language_id` = `p`.`programming_language_id`))) group by `p`.`programming_language_id` order by count(`p`.`programming_language_id`) desc limit 1 */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `student count per department`
--

/*!50001 DROP VIEW IF EXISTS `student count per department`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `student count per department` AS select `user`.`department_id` AS `department_id`,`department`.`name` AS `name`,count(0) AS `members` from (`user` join `department`) where (`user`.`department_id` = `department`.`department_id`) group by `user`.`department_id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `assignments per group`
--

/*!50001 DROP VIEW IF EXISTS `assignments per group`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `assignments per group` AS select `assignment`.`assignment_id` AS `assignment_id`,`group`.`group_id` AS `group_id`,`assignment`.`name` AS `Assignment`,`group`.`name` AS `Group` from ((`assignment_group` join `assignment`) join `group`) where ((`assignment_group`.`assignment_id` = `assignment`.`assignment_id`) and (`assignment_group`.`group_id` = `group`.`group_id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `todo's with at least 5 questions`
--

/*!50001 DROP VIEW IF EXISTS `todo's with at least 5 questions`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `todo's with at least 5 questions` AS select `t`.`todo_id` AS `todo_id`,`t`.`name` AS `TODO Name`,`t`.`description` AS `TODO Description`,`u`.`user_id` AS `user_id`,concat(`u`.`first_name`,' ',`u`.`last_name`) AS `User Full Name`,count(`q`.`question_id`) AS `Number of questions` from (((`todo_question` `t_q` join `todo` `t` on((`t_q`.`todo_id` = `t`.`todo_id`))) join `question` `q` on((`t_q`.`question_id` = `q`.`question_id`))) join `user` `u` on((`t`.`user_id` = `u`.`user_id`))) group by `t`.`todo_id` having (count(`q`.`question_id`) >= 5) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `favourite question of user`
--

/*!50001 DROP VIEW IF EXISTS `favourite question of user`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `favourite question of user` AS select `u`.`user_id` AS `user_id`,concat(`u`.`first_name`,' ',`u`.`last_name`) AS `User Full Name`,`q`.`question_id` AS `question_id`,`q`.`title` AS `Question` from ((`user` `u` join `favourite_question` `fav` on((`u`.`user_id` = `fav`.`user_id`))) join `question` `q` on((`fav`.`question_id` = `q`.`question_id`))) where ((`u`.`user_id` = 2) and (concat(`u`.`first_name`,' ',`u`.`last_name`) = 'Drin Karkini')) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `points for specific assignment and specific group`
--

/*!50001 DROP VIEW IF EXISTS `points for specific assignment and specific group`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `points for specific assignment and specific group` AS select `user`.`user_id` AS `user_id`,concat(`user`.`first_name`,' ',`user`.`last_name`) AS `User Full Name`,`assignment`.`assignment_id` AS `assignment_id`,`assignment`.`name` AS `Assignment Name`,`group`.`group_id` AS `group_id`,`group`.`name` AS `Group name`,`assignment_user`.`points` AS `points` from ((((`assignment` join `group`) join `assignment_group`) join `assignment_user`) join `user`) where ((`user`.`user_id` = `assignment_user`.`user_id`) and (`group`.`group_id` = (select `group`.`group_id` from `group` where (`group`.`name` = 'CEN 2020 B'))) and (`assignment`.`assignment_id` = (select `assignment`.`assignment_id` from `assignment` where (`assignment`.`name` = 'Homework week 1')))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `authentication`
--

/*!50001 DROP VIEW IF EXISTS `authentication`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `authentication` AS select `user`.`user_id` AS `user_id`,`user`.`first_name` AS `first_name`,`user`.`last_name` AS `last_name` from `user` where ((`user`.`password` = '$2a$12$D3sepOMfL5NAYBDA8Nfk1OS/4uxtYCTekD2JDJZ3gmEsNbbqSuRw.') and (`user`.`username` = 'ibreti')) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Dumping events for database 'acm_db'
--

--
-- Dumping routines for database 'acm_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-13  9:03:42
