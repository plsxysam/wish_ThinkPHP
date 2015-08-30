-- MySQL dump 10.13  Distrib 5.5.19, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: test
-- ------------------------------------------------------
-- Server version	5.5.19

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
-- Current Database: `test`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `test` /*!40100 DEFAULT CHARACTER SET gb2312 */;

USE `test`;

--
-- Table structure for table `hd_access`
--

DROP TABLE IF EXISTS `hd_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_access`
--

LOCK TABLES `hd_access` WRITE;
/*!40000 ALTER TABLE `hd_access` DISABLE KEYS */;
INSERT INTO `hd_access` VALUES (1,2,1,NULL),(1,3,2,NULL),(1,6,3,NULL),(1,7,3,NULL),(1,4,2,NULL),(1,13,3,NULL),(1,8,3,NULL),(1,9,3,NULL),(1,10,3,NULL),(1,11,3,NULL),(1,12,3,NULL),(1,5,2,NULL),(2,3,2,NULL),(2,6,3,NULL),(2,7,3,NULL),(2,4,2,NULL),(2,1,1,NULL),(1,1,1,NULL),(4,9,3,NULL);
/*!40000 ALTER TABLE `hd_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_node`
--

DROP TABLE IF EXISTS `hd_node`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_node`
--

LOCK TABLES `hd_node` WRITE;
/*!40000 ALTER TABLE `hd_node` DISABLE KEYS */;
INSERT INTO `hd_node` VALUES (1,'Admin','后台应用',1,NULL,1,0,1),(2,'Index','前台引用',1,NULL,1,0,1),(3,'Index','后台首页',1,NULL,1,1,2),(4,'MsgManage','帖子管理',1,NULL,1,1,2),(5,'Rbac','RBAC权限控制',1,NULL,1,1,2),(6,'index','帖子列表',1,NULL,1,4,3),(7,'delete','删除帖子',1,NULL,1,4,3),(8,'index','用户列表',1,NULL,1,5,3),(9,'role','角色列表',1,NULL,1,5,3),(10,'node','节点列表',1,NULL,1,5,3),(11,'addUser','添加用户',1,NULL,1,5,3),(12,'addRole','添加角色',1,NULL,1,5,3),(13,'addNode','添加节点',1,NULL,1,5,3);
/*!40000 ALTER TABLE `hd_node` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_role`
--

DROP TABLE IF EXISTS `hd_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_role`
--

LOCK TABLES `hd_role` WRITE;
/*!40000 ALTER TABLE `hd_role` DISABLE KEYS */;
INSERT INTO `hd_role` VALUES (1,'Manager',NULL,1,'普通管理员'),(2,'Editor',NULL,1,'编辑者');
/*!40000 ALTER TABLE `hd_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_role_user`
--

DROP TABLE IF EXISTS `hd_role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_role_user`
--

LOCK TABLES `hd_role_user` WRITE;
/*!40000 ALTER TABLE `hd_role_user` DISABLE KEYS */;
INSERT INTO `hd_role_user` VALUES (2,'2'),(2,'3');
/*!40000 ALTER TABLE `hd_role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_session`
--

DROP TABLE IF EXISTS `hd_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_session` (
  `session_id` varchar(255) NOT NULL,
  `session_expire` int(11) NOT NULL,
  `session_data` blob,
  UNIQUE KEY `session_id` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_session`
--

LOCK TABLES `hd_session` WRITE;
/*!40000 ALTER TABLE `hd_session` DISABLE KEYS */;
INSERT INTO `hd_session` VALUES ('cuhujvh17861go4s3q57obl7r3',1440815855,''),('jo95l0u4bg5orh52rptov2sg66',1440815855,''),('p20vflam5a8eh1vj123ctud7a6',1440815791,'');
/*!40000 ALTER TABLE `hd_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_user`
--

DROP TABLE IF EXISTS `hd_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `logintime` int(10) unsigned NOT NULL,
  `loginip` varchar(30) NOT NULL,
  `lock` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_user`
--

LOCK TABLES `hd_user` WRITE;
/*!40000 ALTER TABLE `hd_user` DISABLE KEYS */;
INSERT INTO `hd_user` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3',1440772601,'0.0.0.0',0),(2,'zhaosi','36632e899f21d33c77b0096049799ba7',1440661952,'0.0.0.0',0),(3,'ad','523af537946b79c4f8369ed39ba78605',1440656559,'0.0.0.0',0);
/*!40000 ALTER TABLE `hd_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_wish`
--

DROP TABLE IF EXISTS `hd_wish`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_wish` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `content` varchar(255) CHARACTER SET utf8 NOT NULL,
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_wish`
--

LOCK TABLES `hd_wish` WRITE;
/*!40000 ALTER TABLE `hd_wish` DISABLE KEYS */;
INSERT INTO `hd_wish` VALUES (1,'SAM','first[抱抱]',1440251354),(9,'sam','[酷]fdg',1440473469),(6,'淡定','速度',1440253942),(30,'呵呵','样例1[挤眼]',1440559266),(25,'士大夫','速度发[偷笑]',1440478059),(20,'sam','4555',1440475980);
/*!40000 ALTER TABLE `hd_wish` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'test'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-08-29 10:21:43
