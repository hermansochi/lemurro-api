DELETE FROM `access_sets`;
DELETE FROM `auth_codes`;
DELETE FROM `auth_codes_lasts`;
DELETE FROM `data_change_logs`;
DELETE FROM `example`;
DELETE FROM `files`;
DELETE FROM `files_downloads`;
DELETE FROM `guide_example`;
DELETE FROM `history_registrations`;
DELETE FROM `info_users`;
DELETE FROM `sessions`;
DELETE FROM `users`;

LOCK TABLES `info_users` WRITE;
/*!40000 ALTER TABLE `info_users` DISABLE KEYS */;
INSERT INTO `info_users` VALUES (1,1,'{\"admin\": true}',NULL,'для','cli-скриптов','Пользователь','2018-04-24 00:00:00','2019-04-30 07:10:38',NULL),(2,2,'{\"admin\": true}','test@local.local','Тест','Тестович','Тестов','2018-04-24 00:00:00','2020-08-18 09:37:47',NULL);
/*!40000 ALTER TABLE `info_users` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'lemurro@lemurro',0,NULL,NULL,NULL),(2,'test@local.local',0,'2018-04-24 00:00:00','2020-08-18 09:37:47',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;