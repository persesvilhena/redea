-- MySQL dump 10.16  Distrib 10.2.16-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u289875908_rede
-- ------------------------------------------------------
-- Server version	10.2.16-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `us` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album`
--

/*!40000 ALTER TABLE `album` DISABLE KEYS */;
INSERT INTO `album` VALUES (17,'desc2','1','album 2'),(18,'teste','1','album 3');
/*!40000 ALTER TABLE `album` ENABLE KEYS */;

--
-- Table structure for table `album_fotos`
--

DROP TABLE IF EXISTS `album_fotos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album_fotos` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_album` int(255) NOT NULL,
  `us` int(255) NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album_fotos`
--

/*!40000 ALTER TABLE `album_fotos` DISABLE KEYS */;
INSERT INTO `album_fotos` VALUES (1,17,1,'58069d58714514cde55bc61b75447d79.png','testa');
/*!40000 ALTER TABLE `album_fotos` ENABLE KEYS */;

--
-- Table structure for table `com`
--

DROP TABLE IF EXISTS `com`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `com` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `tipo` int(255) NOT NULL,
  `id_post` int(255) DEFAULT NULL,
  `id_com` int(255) DEFAULT NULL,
  `id_us` varchar(255) CHARACTER SET latin1 NOT NULL,
  `msg` varchar(255) CHARACTER SET latin1 NOT NULL,
  `foto` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `arquivo` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `data` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `com`
--

/*!40000 ALTER TABLE `com` DISABLE KEYS */;
INSERT INTO `com` VALUES (4,0,0,NULL,'1','teste','','',1480598961),(5,1,0,NULL,'1','asdasd','','',1480599076),(6,1,15,NULL,'1','teste','','',1480599279);
/*!40000 ALTER TABLE `com` ENABLE KEYS */;

--
-- Table structure for table `contato`
--

DROP TABLE IF EXISTS `contato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contato` (
  `deid` int(255) NOT NULL,
  `cotid` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contato`
--

/*!40000 ALTER TABLE `contato` DISABLE KEYS */;
INSERT INTO `contato` VALUES (6,1),(1,1),(1,11);
/*!40000 ALTER TABLE `contato` ENABLE KEYS */;

--
-- Table structure for table `gostar`
--

DROP TABLE IF EXISTS `gostar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gostar` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_post` int(255) DEFAULT NULL,
  `id_com` int(255) DEFAULT NULL,
  `id_us` int(255) NOT NULL,
  `gostei` tinyint(1) NOT NULL,
  `data` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gostar`
--

/*!40000 ALTER TABLE `gostar` DISABLE KEYS */;
INSERT INTO `gostar` VALUES (1,3,NULL,1,1,1477511685),(2,2,NULL,1,1,1477511685),(3,3,NULL,6,0,1477511685),(4,2,NULL,6,1,1477511685),(5,9,NULL,6,0,1477517545),(6,11,NULL,6,1,1477517468),(7,5,NULL,6,1,1477517485),(8,1,NULL,1,1,1478216014);
/*!40000 ALTER TABLE `gostar` ENABLE KEYS */;

--
-- Table structure for table `msg`
--

DROP TABLE IF EXISTS `msg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `msg` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `deid` int(255) NOT NULL,
  `paraid` int(255) NOT NULL,
  `titulo` varchar(255) CHARACTER SET latin1 NOT NULL,
  `msg` varchar(255) CHARACTER SET latin1 NOT NULL,
  `data` int(255) DEFAULT NULL,
  `nw` tinyint(1) NOT NULL,
  `nwus` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `msg`
--

/*!40000 ALTER TABLE `msg` DISABLE KEYS */;
INSERT INTO `msg` VALUES (3,5,1,'teste','teste',0,1,1),(4,1,5,'teste','teste',2016,1,1),(5,1,6,'gay','gay',2016,1,1),(6,1,5,'szasdasd','asdasdasd',2016,1,1);
/*!40000 ALTER TABLE `msg` ENABLE KEYS */;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `id_us` varchar(255) CHARACTER SET latin1 NOT NULL,
  `id_even` int(255) DEFAULT NULL,
  `msg` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `arquivo` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `data` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (2,'6',NULL,'Sou Bahiano com orgulho!','','',2147483647),(3,'1',NULL,'teste','','',0),(4,'6',NULL,'teste','','',2016),(5,'6',NULL,'teste','','',2016),(10,'6',NULL,'asdasd','','',1477513662),(9,'6',NULL,'teste1','','',1477513348),(11,'1',NULL,'aaaa','','',1477513669),(12,'7',NULL,'asdasdasdasdasd','','',1477594524),(15,'1',NULL,'testea','','',1480543440);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;

--
-- Table structure for table `rmsg`
--

DROP TABLE IF EXISTS `rmsg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rmsg` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `deid` int(255) NOT NULL,
  `idpert` int(255) NOT NULL,
  `msg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rmsg`
--

/*!40000 ALTER TABLE `rmsg` DISABLE KEYS */;
INSERT INTO `rmsg` VALUES (1,1,3,'asdasd',2016),(2,1,3,'asdasd',2016),(3,1,3,'hra',1477604475);
/*!40000 ALTER TABLE `rmsg` ENABLE KEYS */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(255) CHARACTER SET latin1 NOT NULL,
  `sobrenome` varchar(255) CHARACTER SET latin1 NOT NULL,
  `senha` varchar(255) CHARACTER SET latin1 NOT NULL,
  `foto` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `data_nasc` int(255) DEFAULT NULL,
  `telefone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `regiao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pais` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `epp` int(10) NOT NULL,
  `hash_recup` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `hash_ativa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hash_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adm` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (0,'show','Show','Me','admin','new/new.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,30,NULL,NULL,NULL,NULL),(1,'perses@p','Perses','Vilhena','698dc19d489c4e4db73e28a713eab07b','75265512ac4736e4d58b574024d4bad9.jpg',0,'','asdasd','','','','teste',NULL,98,NULL,NULL,'',1),(5,'teste','teste','teste','e959088c6049f1104c84c9bde5560a13','0e7609d9f1e6ad8c397cf17a4da07f26.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,30,NULL,NULL,NULL,NULL),(6,'coco','Coco','Bahiano','e959088c6049f1104c84c9bde5560a13','33780c412be738c5bc4bbfe72e402d1b.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,30,NULL,NULL,NULL,NULL),(7,'perses2','Perses','De Vilhena','3806a526e2c7af2ec712718c3de4d4a5','ae35c8a304116d294647e385bf19c111.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,30,NULL,NULL,NULL,NULL),(8,'paulo@perses.xyz','Paulo','S','e10adc3949ba59abbe56e057f20f883e','new/new.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,30,NULL,NULL,NULL,NULL),(9,'Ander@perses.xyz','Ander','Barbosa','e10adc3949ba59abbe56e057f20f883e','new/new.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,30,NULL,NULL,NULL,NULL),(10,'samiraelias@perses.xyz','samira','ELIAS','e10adc3949ba59abbe56e057f20f883e','new/new.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,30,NULL,NULL,NULL,NULL),(11,'rafael@perses.xyz','Rafael','Guida','0fbb0968adea4dd42a10a60b97d9c0d4','new/new.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,30,NULL,NULL,NULL,NULL),(12,'Marcelo@perses.xyz','Marcelo','Melo','e10adc3949ba59abbe56e057f20f883e','new/new.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,30,NULL,NULL,NULL,NULL),(13,'GusMelo@perses.xyz','Gustavo','Melo','e10adc3949ba59abbe56e057f20f883e','new/new.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,30,NULL,NULL,NULL,NULL),(14,'persesvilhena@gmail.com','perses','vilhena','698dc19d489c4e4db73e28a713eab07b','new/new.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,30,NULL,NULL,NULL,NULL),(15,'persesvilhena01@gmail.com','Perses','Vilhena','e959088c6049f1104c84c9bde5560a13','new/new.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,30,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

--
-- Dumping routines for database 'u289875908_rede'
--
/*!50003 DROP FUNCTION IF EXISTS `p1` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`u289875908_rede`@`10.1.2.43` FUNCTION `p1`() RETURNS int(11)
    NO SQL
    DETERMINISTIC
return @p1 ;;
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

-- Dump completed on 2018-09-08 19:30:20
