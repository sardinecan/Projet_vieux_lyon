CREATE DATABASE  IF NOT EXISTS `ami_vieux_lyon` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ami_vieux_lyon`;
-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: ami_vieux_lyon
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

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
-- Table structure for table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrateur` (
  `id_administrateur` int(11) NOT NULL,
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`id_administrateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrateur`
--

LOCK TABLES `administrateur` WRITE;
/*!40000 ALTER TABLE `administrateur` DISABLE KEYS */;
INSERT INTO `administrateur` VALUES (1,'admin1','admin123','admin1@mail.fr'),(2,'admin2','admin456','admin2@mail.fr');
/*!40000 ALTER TABLE `administrateur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auteurs`
--

DROP TABLE IF EXISTS `auteurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auteurs` (
  `id_auteur` int(11) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(45) NOT NULL,
  PRIMARY KEY (`id_auteur`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auteurs`
--

LOCK TABLES `auteurs` WRITE;
/*!40000 ALTER TABLE `auteurs` DISABLE KEYS */;
INSERT INTO `auteurs` VALUES (1,'Gonedelyon'),(2,'Arno'),(3,'Magnus Manske'),(4,'H.G. Hawes'),(5,'Karldupart'),(6,'Blaise Laustriat'),(7,'Alexandre Nakonechnyj'),(8,'Nicolai Schafer'),(9,'Christophe Finot'),(10,'Chris 73'),(11,'David'),(12,'Arnaud Fafournoux');
/*!40000 ALTER TABLE `auteurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `epoques`
--

DROP TABLE IF EXISTS `epoques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `epoques` (
  `id_epoque` int(11) NOT NULL AUTO_INCREMENT,
  `epoque` varchar(45) NOT NULL,
  PRIMARY KEY (`id_epoque`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `epoques`
--

LOCK TABLES `epoques` WRITE;
/*!40000 ALTER TABLE `epoques` DISABLE KEYS */;
INSERT INTO `epoques` VALUES (1,'Moyen-âge'),(2,'Renaissance'),(3,'XIXe'),(5,'autre');
/*!40000 ALTER TABLE `epoques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id_image` int(11) NOT NULL AUTO_INCREMENT,
  `id_auteur` int(11) NOT NULL,
  `date_prise_vue` date NOT NULL,
  `couleur` tinytext CHARACTER SET utf8 NOT NULL,
  `id_theme` int(11) NOT NULL,
  `id_epoque` int(11) NOT NULL,
  `id_quartier` int(11) NOT NULL,
  `description` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `latitude` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `longitude` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `fichier_image` varchar(45) CHARACTER SET utf8 NOT NULL,
  `type` varchar(11) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_image`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,1,'2008-07-01','non',1,5,3,'Quartier Saint-Georges.','45.759380','4.825505','saint_georges1.jpg','argentique'),(2,2,'2005-03-28','oui',3,3,3,'Place Benoît Crépu en travaux.','45.758402','4.826299','saint_georges2.jpg','numerique'),(3,3,'2005-07-24','oui',3,3,3,'Portail de l\'église St Georges de Lyon.','45.757397','4.825187','saint_georges3.jpg','argentique'),(4,1,'2008-07-01','oui',4,5,3,'Place de la Trinité.','45.759380','4.825505','saint_georges4.jpg','numerique'),(5,1,'2008-07-01','non',4,5,3,'La maison de Guignol.','45.759380','4.825505','saint_georges5.jpg','argentique'),(6,4,'2012-06-21','non',4,5,3,'Quartier Saint Georges.','45.759380','4.825505','saint_georges6.jpg','numerique'),(7,5,'2006-01-01','non',5,5,1,'Vue générale.','45.762420','4.827443','saint_jean1.jpg','argentique'),(8,1,'2008-07-01','oui',3,1,1,'Façade de la Primatiale Saint Jean.','45.760915','4.826946','saint_jean2.jpg','numerique'),(9,1,'2008-07-17','oui',4,3,1,'Maison du chamarier.','45.761533','4.827283','saint_jean3.jpg','argentique'),(10,1,'2008-07-01','oui',4,2,1,'Maison des avocats.','45.762015','4.827424','saint_jean4.jpg','numerique'),(11,1,'2008-07-01','non',1,5,1,'Place neuve.','45.76255','4.827628','saint_jean5.jpg','argentique'),(12,1,'2008-07-01','non',4,3,1,'Une façade du Vieux-Lyon.','45.76255','4.827628','saint_jean6.jpg','numerique'),(13,1,'2008-07-01','oui',4,2,1,'Musée Gadagne.','45.764113','4.827477','saint_jean7.jpg','argentique'),(14,1,'2008-07-01','oui',4,2,1,'Traboule.','45.762756','4.827054','saint_jean8.jpg','numerique'),(15,1,'2008-07-01','oui',4,1,1,'Cour de la Tour Rose.','45.763055','4.827083','saint_jean9.jpg','argentique'),(16,1,'2008-07-01','non',2,2,1,'La Tour Rose.','45.763055','4.827083','saint_jean10.jpg','numerique'),(17,1,'2008-07-17','non',4,5,1,'Bouchon lyonnais.','45.762595','4.827404','saint_jean11.jpg','argentique'),(18,1,'2008-07-01','oui',1,5,1,'Rue St Jean.','45.761843','4.827252','saint_jean12.jpg','numerique'),(19,6,'2007-03-11','oui',4,2,1,'Façades dans la rue du Bœuf.','45.762516','4.826632','saint_jean13.jpg','argentique'),(20,2,'2005-01-27','oui',3,2,1,'Statue d\'un taureau, rue du Bœuf.','45.762742','4.827052','saint_jean14.jpg','numerique'),(21,7,'2009-05-31','non',3,1,1,'Intérieur de la primatiale Saint Jean','45.760915','4.826946','saint_jean15.jpg','argentique'),(22,8,'2006-05-17','non',5,5,1,'La primatiale Saint-Jean et la Saône.','45.760915','4.826946','saint_jean16.jpg','numerique'),(23,9,'2006-12-01','oui',3,1,1,'Cathédrale Saint-Jean.','45.760915','4.826946','saint_jean17.jpg','argentique'),(24,10,'2006-03-18','oui',5,5,1,'Vue de Lyon.','45.759968','4.830417','saint_jean18.jpg','numerique'),(25,11,'2008-05-01','oui',4,2,1,'La Maison des avocats.','45.761533','4.827283','saint_jean19.jpg','argentique'),(26,2,'2005-01-25','non',4,1,2,'Enseigne, rue Juiverie.','45.764942','4.827337','saint_paul1.jpg','argentique'),(27,12,'2008-03-01','oui',3,2,2,'Hôtel de Bullioud, rue Juiverie.','45.765444','4.827305','saint_paul2.jpg','numerique'),(28,12,'2008-03-01','oui',3,2,2,'Galerie Philibert Delorme.','45.76544','4.82730','saint_paul3.jpg','argentique'),(29,1,'2008-06-23','oui',3,3,2,'Le Temple du Change.','45.764494','4.828073','saint_paul4.jpg','numerique'),(30,6,'2007-03-11','non',2,2,2,'Puits de la cour Philibert Delorme.','45.765444','4.827305','saint_paul5.jpg','numerique'),(31,2,'2005-01-27','non',1,5,2,'Rue Juiverie.','45.765277','4.827222','saint_paul6.jpg','numerique'),(32,6,'2007-03-11','oui',2,2,2,'Une façade du Vieux Lyon.','45.765196','4.827912','saint_paul7.jpg','argentique');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membres`
--

DROP TABLE IF EXISTS `membres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `membres` (
  `id_membre` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_membre`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membres`
--

LOCK TABLES `membres` WRITE;
/*!40000 ALTER TABLE `membres` DISABLE KEYS */;
INSERT INTO `membres` VALUES (8,'utilisateur1','xt7/dBOOP8HDQ','utilisateur1@mail.fr');
/*!40000 ALTER TABLE `membres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quartiers`
--

DROP TABLE IF EXISTS `quartiers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quartiers` (
  `id_quartier` int(11) NOT NULL AUTO_INCREMENT,
  `quartier` varchar(45) NOT NULL,
  PRIMARY KEY (`id_quartier`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quartiers`
--

LOCK TABLES `quartiers` WRITE;
/*!40000 ALTER TABLE `quartiers` DISABLE KEYS */;
INSERT INTO `quartiers` VALUES (1,'Saint Jean'),(2,'Saint Paul'),(3,'Saint Georges');
/*!40000 ALTER TABLE `quartiers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `themes`
--

DROP TABLE IF EXISTS `themes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `themes` (
  `id_theme` int(11) NOT NULL AUTO_INCREMENT,
  `theme` varchar(45) NOT NULL,
  PRIMARY KEY (`id_theme`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `themes`
--

LOCK TABLES `themes` WRITE;
/*!40000 ALTER TABLE `themes` DISABLE KEYS */;
INSERT INTO `themes` VALUES (1,'rues'),(2,'traboules'),(3,'monuments'),(4,'façades'),(5,'divers');
/*!40000 ALTER TABLE `themes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upload`
--

DROP TABLE IF EXISTS `upload`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `upload` (
  `id_upload` int(11) NOT NULL AUTO_INCREMENT,
  `up_auteur` varchar(45) NOT NULL,
  `up_theme` varchar(45) NOT NULL,
  `up_epoque` varchar(45) NOT NULL,
  `up_quartier` varchar(45) NOT NULL,
  `up_type` varchar(45) NOT NULL,
  `up_latitude` varchar(15) DEFAULT NULL,
  `up_longitude` varchar(15) DEFAULT NULL,
  `up_description` varchar(45) NOT NULL,
  `up_date` varchar(45) NOT NULL,
  `up_couleur` varchar(45) NOT NULL,
  `up_filename` varchar(45) NOT NULL,
  `up_id_membre` varchar(45) NOT NULL,
  `up_file` blob NOT NULL,
  PRIMARY KEY (`id_upload`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upload`
--

LOCK TABLES `upload` WRITE;
/*!40000 ALTER TABLE `upload` DISABLE KEYS */;
/*!40000 ALTER TABLE `upload` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-31 15:44:25
