CREATE DATABASE  IF NOT EXISTS `jogo_da_forca` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `jogo_da_forca`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: jogo_da_forca
-- ------------------------------------------------------
-- Server version	5.6.26

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
-- Table structure for table `dicas`
--

DROP TABLE IF EXISTS `dicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dicas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `ativo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dicas`
--

LOCK TABLES `dicas` WRITE;
/*!40000 ALTER TABLE `dicas` DISABLE KEYS */;
INSERT INTO `dicas` VALUES (1,'Calmo',1),(2,'Sereno',1),(3,'Acomodado',1),(4,'Imbecil',1),(5,'Ignorante',1),(6,'Troca',1),(7,'Câmbio',1),(8,'Criança',1),(9,'Bebé',1),(10,'Adolescente',1),(11,'Bem vestido',1),(12,'Mentir',1),(13,'Enganar',1),(14,'Desagradável',1),(15,'Bagunça',1),(16,'Agressivo',1),(17,'Mal educado',1),(18,'Desaforado',1),(19,'Sujeira',1),(20,'Mancha',1),(21,'Apelido',1),(22,'Nome adotado por amigos',1);
/*!40000 ALTER TABLE `dicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dicas_jogos`
--

DROP TABLE IF EXISTS `dicas_jogos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dicas_jogos` (
  `dicas_id` int(11) NOT NULL,
  `jogo_id` int(11) NOT NULL,
  PRIMARY KEY (`dicas_id`,`jogo_id`),
  KEY `fk_dicas_has_jogo_jogo1_idx` (`jogo_id`),
  KEY `fk_dicas_has_jogo_dicas1_idx` (`dicas_id`),
  CONSTRAINT `fk_dicas_has_jogo_dicas1` FOREIGN KEY (`dicas_id`) REFERENCES `dicas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_dicas_has_jogo_jogo1` FOREIGN KEY (`jogo_id`) REFERENCES `jogos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dicas_jogos`
--

LOCK TABLES `dicas_jogos` WRITE;
/*!40000 ALTER TABLE `dicas_jogos` DISABLE KEYS */;
/*!40000 ALTER TABLE `dicas_jogos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotos_perfis`
--

DROP TABLE IF EXISTS `fotos_perfis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fotos_perfis` (
  `user_id` int(11) NOT NULL,
  `url` varchar(75) NOT NULL,
  `data` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`,`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotos_perfis`
--

LOCK TABLES `fotos_perfis` WRITE;
/*!40000 ALTER TABLE `fotos_perfis` DISABLE KEYS */;
/*!40000 ALTER TABLE `fotos_perfis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jogadas`
--

DROP TABLE IF EXISTS `jogadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jogadas` (
  `jogo_id` int(11) NOT NULL,
  `letra` varchar(1) NOT NULL,
  PRIMARY KEY (`jogo_id`,`letra`),
  KEY `fk_jogadas_jogo1_idx` (`jogo_id`),
  CONSTRAINT `fk_jogadas_jogo1` FOREIGN KEY (`jogo_id`) REFERENCES `jogos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jogadas`
--

LOCK TABLES `jogadas` WRITE;
/*!40000 ALTER TABLE `jogadas` DISABLE KEYS */;
/*!40000 ALTER TABLE `jogadas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jogos`
--

DROP TABLE IF EXISTS `jogos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jogos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `palavras_id` int(11) NOT NULL,
  `terminado` int(11) DEFAULT '0',
  PRIMARY KEY (`id`,`palavras_id`,`user_id`),
  KEY `fk_jogo_utilizadores1_idx` (`user_id`),
  KEY `fk_jogo_palavras1_idx` (`palavras_id`),
  CONSTRAINT `fk_jogo_palavras1` FOREIGN KEY (`palavras_id`) REFERENCES `palavras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_jogo_utilizadores1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jogos`
--

LOCK TABLES `jogos` WRITE;
/*!40000 ALTER TABLE `jogos` DISABLE KEYS */;
/*!40000 ALTER TABLE `jogos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `palavras`
--

DROP TABLE IF EXISTS `palavras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `palavras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(75) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `ativo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `palavras`
--

LOCK TABLES `palavras` WRITE;
/*!40000 ALTER TABLE `palavras` DISABLE KEYS */;
INSERT INTO `palavras` VALUES (1,'Pachorrento','Feitio de pessoa',1),(2,'Pacovio','Estilo de uma pessoa',1),(3,'Permuta','Viver em sociedade',1),(4,'Petiz','Criança',1),(5,'Janota','Forma de vestir de uma pessoa',1),(6,'Engodar','Forma de agir de uma pessoa',1),(7,'Insolente','Forma de agir de uma pessoa',1),(8,'Balburdia','Arrumação das coisas',1),(9,'Nodoa','Limpeza (ou falta dela)',1),(10,'Alcunha','Pessoas',1),(11,'Traca','Praca',1);
/*!40000 ALTER TABLE `palavras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `palavras_dicas`
--

DROP TABLE IF EXISTS `palavras_dicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `palavras_dicas` (
  `palavras_id` int(11) NOT NULL,
  `dicas_id` int(11) NOT NULL,
  PRIMARY KEY (`palavras_id`,`dicas_id`),
  KEY `fk_palavras_has_dicas_dicas1_idx` (`dicas_id`),
  KEY `fk_palavras_has_dicas_palavras_idx` (`palavras_id`),
  CONSTRAINT `fk_palavras_has_dicas_dicas1` FOREIGN KEY (`dicas_id`) REFERENCES `dicas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_palavras_has_dicas_palavras` FOREIGN KEY (`palavras_id`) REFERENCES `palavras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `palavras_dicas`
--

LOCK TABLES `palavras_dicas` WRITE;
/*!40000 ALTER TABLE `palavras_dicas` DISABLE KEYS */;
INSERT INTO `palavras_dicas` VALUES (1,1),(1,2),(1,3),(2,4),(2,5),(3,6),(3,7),(4,8),(4,9),(4,10),(5,11),(6,12),(6,13),(7,14),(8,15),(7,17),(7,18),(9,19),(9,20),(10,21),(10,22);
/*!40000 ALTER TABLE `palavras_dicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(75) NOT NULL,
  `permissoes` int(1) NOT NULL DEFAULT '0',
  `data_nascimento` datetime NOT NULL,
  `email` varchar(75) NOT NULL,
  `primeiro_nome` varchar(45) NOT NULL,
  `ultimo_nome` varchar(45) NOT NULL,
  `ativo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'rafael','202cb962ac59075b964b07152d234b70',1,'1995-12-07 00:00:00','rafael@gmail.com','Rafael','Ferreira',1),(2,'mario','202cb962ac59075b964b07152d234b70',1,'0000-00-00 00:00:00','mario@gmail.com','Mario','Martins',1),(3,'saul','202cb962ac59075b964b07152d234b70',1,'2016-06-22 00:00:00','saul@gmail.com','Saul','Ezequiel',1),(4,'jogar','202cb962ac59075b964b07152d234b70',0,'1993-12-02 00:00:00','jogar@gmail.com','Jogador','Profissional',1);
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

-- Dump completed on 2016-06-15 13:54:42
