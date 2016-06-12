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
-- Dumping data for table `dicas`
--

LOCK TABLES `dicas` WRITE;
/*!40000 ALTER TABLE `dicas` DISABLE KEYS */;
INSERT INTO `dicas` VALUES (1,'Calmo',1),(2,'Sereno',1),(3,'Acomodado',1),(4,'Imbecil',1),(5,'Ignorante',1),(6,'Troca',1),(7,'Câmbio',1),(8,'Criança',1),(9,'Bebé',1),(10,'Adolescente',1),(11,'Bem vestido',1),(12,'Mentir',1),(13,'Enganar',1),(14,'Desagradável',1),(15,'Bagunça',1),(16,'Agressivo',1),(17,'Mal educado',1),(18,'Desaforado',1),(19,'Sujeira',1),(20,'Mancha',1),(21,'Apelido',1),(22,'Nome adotado por amigos',1);
/*!40000 ALTER TABLE `dicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `dicas_jogos`
--

LOCK TABLES `dicas_jogos` WRITE;
/*!40000 ALTER TABLE `dicas_jogos` DISABLE KEYS */;
INSERT INTO `dicas_jogos` VALUES (4,1),(5,1),(17,2),(18,2),(1,3),(3,3),(20,4);
/*!40000 ALTER TABLE `dicas_jogos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `jogadas`
--

LOCK TABLES `jogadas` WRITE;
/*!40000 ALTER TABLE `jogadas` DISABLE KEYS */;
INSERT INTO `jogadas` VALUES (1,'A'),(1,'D'),(1,'E'),(1,'L'),(1,'M'),(1,'O'),(1,'P'),(1,'R'),(1,'T'),(2,'A'),(2,'B'),(2,'C'),(2,'E'),(2,'I'),(2,'L'),(2,'N'),(2,'O'),(2,'S'),(2,'T'),(3,'A'),(3,'C'),(3,'E'),(3,'H'),(3,'L'),(3,'M'),(3,'N'),(3,'O'),(3,'P'),(3,'R'),(3,'T'),(4,'A'),(4,'D'),(4,'E'),(4,'I'),(4,'N'),(4,'O'),(4,'S'),(5,'A'),(5,'C'),(5,'E'),(5,'H'),(5,'I'),(5,'N'),(5,'O'),(5,'P'),(5,'R'),(5,'T'),(6,'A'),(6,'B'),(6,'D'),(6,'Q'),(6,'R'),(6,'S'),(6,'T'),(6,'W'),(6,'X');
/*!40000 ALTER TABLE `jogadas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `jogos`
--

LOCK TABLES `jogos` WRITE;
/*!40000 ALTER TABLE `jogos` DISABLE KEYS */;
INSERT INTO `jogos` VALUES (1,4,2,1),(2,4,7,1),(3,4,1,1),(4,4,9,1),(5,4,1,1),(6,4,3,1);
/*!40000 ALTER TABLE `jogos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `palavras`
--

LOCK TABLES `palavras` WRITE;
/*!40000 ALTER TABLE `palavras` DISABLE KEYS */;
INSERT INTO `palavras` VALUES (1,'Pachorrento','Feitio de pessoa',1),(2,'Pacovio','Estilo de uma pessoa',1),(3,'Permuta','Viver em sociedade',1),(4,'Petiz','Criança',1),(5,'Janota','Forma de vestir de uma pessoa',1),(6,'Engodar','Forma de agir de uma pessoa',1),(7,'Insolente','Forma de agir de uma pessoa',1),(8,'Balburdia','Arrumação das coisas',1),(9,'Nodoa','Limpeza (ou falta dela)',1),(10,'Alcunha','Pessoas',1);
/*!40000 ALTER TABLE `palavras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `palavras_dicas`
--

LOCK TABLES `palavras_dicas` WRITE;
/*!40000 ALTER TABLE `palavras_dicas` DISABLE KEYS */;
INSERT INTO `palavras_dicas` VALUES (1,1),(1,2),(1,3),(2,4),(2,5),(3,6),(3,7),(4,8),(4,9),(4,10),(5,11),(6,12),(6,13),(7,14),(8,15),(7,17),(7,18),(9,19),(9,20),(10,21),(10,22);
/*!40000 ALTER TABLE `palavras_dicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'rafael','202cb962ac59075b964b07152d234b70',1,'1995-12-07 00:00:00','rafael@gmail.com','Rafael','Ferreira',1),(2,'mario','202cb962ac59075b964b07152d234b70',1,'0000-00-00 00:00:00','mario@gmail.com','Mario','Martins',1),(3,'saul','202cb962ac59075b964b07152d234b70',1,'0000-00-00 00:00:00','saul@gmail.com','Saul','Ezequiel',1),(4,'jogar','202cb962ac59075b964b07152d234b70',0,'1993-12-02 00:00:00','jogar@gmail.com','Jogador','Profissional',1);
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

-- Dump completed on 2016-06-12 19:40:17
