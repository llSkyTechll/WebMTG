CREATE DATABASE  IF NOT EXISTS `bd_mtg` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bd_mtg`;
-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: localhost    Database: bd_mtg
-- ------------------------------------------------------
-- Server version	5.7.26

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
-- Table structure for table `tbl_cart`
--

DROP TABLE IF EXISTS `tbl_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_cart` (
  `cartid` int(10) NOT NULL AUTO_INCREMENT,
  `custid` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cartid`),
  UNIQUE KEY `cartid_UNIQUE` (`cartid`),
  KEY `tbl_cartcustomers` (`custid`),
  CONSTRAINT `tbl_cartcustomers` FOREIGN KEY (`custid`) REFERENCES `tbl_customers` (`custid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cart`
--

LOCK TABLES `tbl_cart` WRITE;
/*!40000 ALTER TABLE `tbl_cart` DISABLE KEYS */;
INSERT INTO `tbl_cart` VALUES (2,1);
/*!40000 ALTER TABLE `tbl_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cartcontent`
--

DROP TABLE IF EXISTS `tbl_cartcontent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_cartcontent` (
  `cartcontentid` int(10) NOT NULL AUTO_INCREMENT,
  `cartid` int(10) NOT NULL DEFAULT '0',
  `packid` int(10) NOT NULL DEFAULT '0',
  `quantity` int(10) NOT NULL DEFAULT '0',
  `price` decimal(18,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`cartcontentid`),
  UNIQUE KEY `cartcontentid_UNIQUE` (`cartcontentid`),
  KEY `FK_cartcartcontent` (`cartid`),
  KEY `FK_packcartcontent` (`packid`),
  CONSTRAINT `FK_cartcartcontent` FOREIGN KEY (`cartid`) REFERENCES `tbl_cart` (`cartid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_packcartcontent` FOREIGN KEY (`packid`) REFERENCES `tbl_packs` (`packid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cartcontent`
--

LOCK TABLES `tbl_cartcontent` WRITE;
/*!40000 ALTER TABLE `tbl_cartcontent` DISABLE KEYS */;
INSERT INTO `tbl_cartcontent` VALUES (5,2,2,3,16.50);
/*!40000 ALTER TABLE `tbl_cartcontent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_customers`
--

DROP TABLE IF EXISTS `tbl_customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_customers` (
  `custid` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL DEFAULT '',
  `lastname` varchar(30) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`custid`),
  UNIQUE KEY `custid_UNIQUE` (`custid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_customers`
--

LOCK TABLES `tbl_customers` WRITE;
/*!40000 ALTER TABLE `tbl_customers` DISABLE KEYS */;
INSERT INTO `tbl_customers` VALUES (1,'Alexandre','Reny','areny1998@hotmail.com','admin01'),(2,'Éric','Larivière','eric.lariviere1999@hotmail.com','admin02');
/*!40000 ALTER TABLE `tbl_customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_order` (
  `orderid` int(10) NOT NULL AUTO_INCREMENT,
  `cartid` int(10) NOT NULL DEFAULT '0',
  `custid` int(10) NOT NULL DEFAULT '0',
  `totalprice` decimal(18,2) NOT NULL DEFAULT '0.00',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`orderid`),
  UNIQUE KEY `orderid_UNIQUE` (`orderid`),
  KEY `FK_cartorder` (`cartid`),
  CONSTRAINT `FK_cartorder` FOREIGN KEY (`cartid`) REFERENCES `tbl_cart` (`cartid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_order`
--

LOCK TABLES `tbl_order` WRITE;
/*!40000 ALTER TABLE `tbl_order` DISABLE KEYS */;
INSERT INTO `tbl_order` VALUES (1,2,1,16.50,'2019-10-20 16:03:03');
/*!40000 ALTER TABLE `tbl_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_packs`
--

DROP TABLE IF EXISTS `tbl_packs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_packs` (
  `packid` int(10) NOT NULL AUTO_INCREMENT,
  `edition` varchar(100) NOT NULL DEFAULT '',
  `price` decimal(18,2) NOT NULL DEFAULT '0.00',
  `releasedate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `picture` varchar(100) NOT NULL DEFAULT '',
  `description` varchar(5000) NOT NULL DEFAULT '',
  PRIMARY KEY (`packid`),
  UNIQUE KEY `packid_UNIQUE` (`packid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_packs`
--

LOCK TABLES `tbl_packs` WRITE;
/*!40000 ALTER TABLE `tbl_packs` DISABLE KEYS */;
INSERT INTO `tbl_packs` VALUES (1,'Gatecrash',5.25,'2019-10-20 15:54:55','/WebMTG/Images/Gatecrash.jpg','Dans le bloc Ravnica'),
								(2,'Return To Ravnica',5.50,'2019-10-20 15:54:55','/WebMTG/Images/RTR.jpg','Dans le bloc Ravnica'),
                                (3,'Iconic Masters',5.25,'2019-10-20 15:54:55','/WebMTG/Images/IconicMasters.jpg','Dans le bloc Ravnica'),
                                (4,'Ixalan',5.25,'2019-10-20 15:54:55','/WebMTG/Images/Ixalan.jpg','Dans le bloc Ravnica'),
                                (5,'Kaladesh',5.25,'2019-10-20 15:54:55','/WebMTG/Images/Kaladesh.jpg','Dans le bloc Ravnica');
/*!40000 ALTER TABLE `tbl_packs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'bd_mtg'
--

--
-- Dumping routines for database 'bd_mtg'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

delimiter |
create procedure GetSpecificPicture(
	in Item varchar(999)
)
begin

select * from tbl_packs        
where packid  = Item;
end|
call GetSpecificPicture("1");
-- Dump completed on 2019-10-20 16:07:56

