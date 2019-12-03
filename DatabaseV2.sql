CREATE DATABASE  IF NOT EXISTS `bd_mtg` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bd_mtg`;
-- MySQL dump 10.13  Distrib 5.7.21, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bd_mtg
-- ------------------------------------------------------
-- Server version	5.7.21

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
-- Table structure for table `tbl_customers`
--

DROP TABLE IF EXISTS `tbl_customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_order` (
  `orderid` int(10) NOT NULL AUTO_INCREMENT,
  `custid` int(10) NOT NULL DEFAULT '0',
  `totalprice` decimal(18,2) NOT NULL DEFAULT '0.00',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`orderid`),
  UNIQUE KEY `orderid_UNIQUE` (`orderid`),
  KEY `FK_ordercustomer_idx` (`custid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_order`
--

LOCK TABLES `tbl_order` WRITE;
/*!40000 ALTER TABLE `tbl_order` DISABLE KEYS */;
INSERT INTO `tbl_order` VALUES (1,1,16.50,'2019-10-20 16:03:03'),(2,1,0.00,'2019-12-02 00:00:00'),(3,3,31.50,'2019-12-02 00:00:00'),(4,1,16.50,'2019-12-02 00:00:00');
/*!40000 ALTER TABLE `tbl_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_ordercontent`
--

DROP TABLE IF EXISTS `tbl_ordercontent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_ordercontent` (
  `ordercontentid` int(10) NOT NULL AUTO_INCREMENT,
  `orderid` int(10) NOT NULL DEFAULT '0',
  `packid` int(10) NOT NULL DEFAULT '0',
  `quantity` int(10) NOT NULL DEFAULT '0',
  `price` decimal(18,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`ordercontentid`),
  UNIQUE KEY `cartcontentid_UNIQUE` (`ordercontentid`),
  KEY `FK_packcartcontent` (`packid`),
  KEY `FK_ordercontent_idx` (`orderid`),
  CONSTRAINT `FK_packcartcontent` FOREIGN KEY (`packid`) REFERENCES `tbl_packs` (`packid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ordercontent`
--

LOCK TABLES `tbl_ordercontent` WRITE;
/*!40000 ALTER TABLE `tbl_ordercontent` DISABLE KEYS */;
INSERT INTO `tbl_ordercontent` VALUES (5,2,2,3,16.50),(6,3,3,3,15.75),(7,3,4,3,15.75),(8,4,2,3,16.50);
/*!40000 ALTER TABLE `tbl_ordercontent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_packs`
--

DROP TABLE IF EXISTS `tbl_packs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_packs` (
  `packid` int(10) NOT NULL AUTO_INCREMENT,
  `edition` varchar(100) NOT NULL DEFAULT '',
  `price` decimal(18,2) NOT NULL DEFAULT '0.00',
  `releasedate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `picture` varchar(100) NOT NULL DEFAULT '',
  `description` varchar(5000) NOT NULL DEFAULT '',
  PRIMARY KEY (`packid`),
  UNIQUE KEY `packid_UNIQUE` (`packid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_packs`
--

LOCK TABLES `tbl_packs` WRITE;
/*!40000 ALTER TABLE `tbl_packs` DISABLE KEYS */;
INSERT INTO `tbl_packs` VALUES (1,'Gatecrash',5.25,'2019-10-20 15:54:55','/WebMTG/Images/Gatecrash.jpg','Dans le bloc Ravnica'),(2,'Return To Ravnica',5.50,'2019-10-20 15:54:55','/WebMTG/Images/RTR.jpg','Dans le bloc Ravnica'),(3,'Iconic Masters',5.25,'2019-10-20 15:54:55','/WebMTG/Images/IconicMasters.jpg','Dans le bloc Ravnica'),(4,'Ixalan',5.25,'2019-10-20 15:54:55','/WebMTG/Images/Ixalan.jpg','Dans le bloc Ravnica'),(5,'Kaladesh',5.25,'2019-10-20 15:54:55','/WebMTG/Images/Kaladesh.jpg','Dans le bloc Ravnica');
/*!40000 ALTER TABLE `tbl_packs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'bd_mtg'
--
/*!50003 DROP PROCEDURE IF EXISTS `AddOrderContent` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddOrderContent`(IN customerorder INT, IN selectedpack INT, IN chosenquantity INT)
BEGIN
	DECLARE totalprice DECIMAL(18,2);
    SET totalprice = (SELECT price FROM tbl_packs WHERE packid = selectedpack) * chosenquantity;
	INSERT INTO tbl_ordercontent(orderid, packid, quantity, price)
    VALUES (customerorder, selectedpack, chosenquantity, totalprice);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CreateOrder` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CreateOrder`(IN customerid INT)
BEGIN
	INSERT INTO tbl_order(custid, totalprice, date)
    VALUE(customerid, 0, CURDATE());
    
    SELECT LAST_INSERT_ID() as CustomerId;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GetSpecificPicture` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetSpecificPicture`(
	in Item varchar(999)
)
begin

select * from tbl_packs        
where packid  = Item;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `UpdateOrder` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateOrder`(IN customerorder INT)
BEGIN
	DECLARE pricesum DECIMAL(18,2);
    SET pricesum = (SELECT SUM(price) FROM tbl_ordercontent WHERE orderid = customerorder);
	UPDATE tbl_order SET totalprice = pricesum  WHERE orderid = customerorder;
END ;;
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

-- Dump completed on 2019-12-02 18:33:10
USE `bd_mtg`;
select * from tbl_order;
select * from tbl_customers;