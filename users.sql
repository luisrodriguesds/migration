# Host: localhost  (Version 5.7.23)
# Date: 2019-10-24 11:06:16
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(254) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(60) NOT NULL,
  `access_level` varchar(254) NOT NULL,
  `access_level_slug` varchar(254) NOT NULL,
  `cpf` varchar(254) NOT NULL,
  `birthday` datetime NOT NULL,
  `sex` int(11) NOT NULL DEFAULT '1',
  `other_email` varchar(254) DEFAULT NULL,
  `state` varchar(254) NOT NULL,
  `city` varchar(254) NOT NULL,
  `phone1` varchar(254) NOT NULL,
  `phone2` varchar(254) DEFAULT NULL,
  `confirm` int(11) NOT NULL DEFAULT '0',
  `confirm_email` int(11) NOT NULL DEFAULT '0',
  `limit` int(11) NOT NULL DEFAULT '20',
  `drx_permission` int(11) NOT NULL DEFAULT '1',
  `frx_permission` int(11) NOT NULL DEFAULT '0',
  `photo` varchar(254) DEFAULT 'avatar-1.png',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_cpf_unique` (`cpf`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "users"
#

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'root','root@root.com','$2a$10$i8UQUWkLLhqQdgoyparuNOXbqXh47X84p64U0ZXYC0jzTrXW3Oajm','Administrador','administrador','000.000.000-00','2019-09-27 12:36:22',1,'','CE','Fortaleza','(85997646060)','',1,1,20,1,1,'avatar-1.png',1,'2019-09-27 12:36:22','2019-09-27 12:36:22'),(2,'Luis Italo Amorim Rodrigues','luisitaloar@gmail.com','$2a$10$Scf.2jzy5IMOHEMH2HomXOzEFzaP6D.211D8Nl.K2RFE/1IIz1SPa','Professor','professor','060.631.623-05','1996-01-12 00:00:00',1,NULL,'CE','Fortaleza','(85)99764-6060',NULL,1,1,20,1,0,'avatar-1.png',1,'2019-09-27 12:39:07','2019-09-27 12:39:07'),(3,'Wilson Fisk','wilson@gmail.com','$2a$10$1LAr30OpvcMGyWlj6CrpceteejNtGOuZJNNfLjXkpm/y1rZZkSgsy','Aluno','aluno','103.513.318-16','1996-01-12 00:00:00',1,NULL,'CE','Fortaleza','(85)99764-6060','(85)99764-6060',1,1,10,1,1,'avatar-1.png',0,'2019-09-27 12:43:16','2019-10-22 23:29:53'),(4,'Clark Kent','clark@gmail.com','$2a$10$meNntMVBZNExro6SWbKs0uJ7Dz8p58P7meoPtUAVCkHxUIDC1v7iq','Técnico','tecnico','325.631.623-06','1996-01-12 00:00:00',1,NULL,'CE','Fortaleza','(85)99764-6060',NULL,1,1,20,1,0,'avatar-1.png',0,'2019-09-27 12:46:20','2019-10-22 23:29:53'),(5,'Bruce Banner','bruce@gmail.com','$2a$10$Pxdf7lMQ0KgUIPfNYm3II.ztv8z1a9BIkwxBZe.mhuDzroAi4JA6C','Financeiro','financeiro','325.325.623-06','1996-01-12 00:00:00',1,'bruce@ufc.br','CE','Fortaleza','(85)99764-6060',NULL,1,1,20,1,0,'avatar-1.png',1,'2019-09-27 12:47:26','2019-10-09 10:52:10'),(6,'Mario Bro','luisrodriguesds@alu.ufc.br','$2a$10$fjbO/sstiJsezQvWJw7.ou98yiIkTis7slFoZy.ByfjQ8viL21ApW','Professor','professor','060.631.623-09','1996-01-12 00:00:00',1,NULL,'CE','Fortaleza','(85)99764-6060',NULL,1,1,20,1,0,'avatar-1.png',1,'2019-10-18 15:40:27','2019-10-18 15:40:27');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
