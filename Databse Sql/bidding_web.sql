CREATE DATABASE  IF NOT EXISTS `bidding_web` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bidding_web`;
-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: bidding_web
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `adminId` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'saman@001','saman400500');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bids`
--

DROP TABLE IF EXISTS `bids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bids` (
  `bidId` int NOT NULL AUTO_INCREMENT,
  `itemId` int NOT NULL,
  `sellerId` int NOT NULL,
  `buyerId` int NOT NULL,
  `price` double DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`bidId`),
  KEY `fk_bids_buyer1_idx` (`buyerId`),
  KEY `fk_bids_item1_idx` (`itemId`),
  KEY `fk_bids_seller1_idx` (`sellerId`),
  CONSTRAINT `fk_bids_buyer1` FOREIGN KEY (`buyerId`) REFERENCES `buyer` (`buyerId`),
  CONSTRAINT `fk_bids_item1` FOREIGN KEY (`itemId`) REFERENCES `item` (`itemId`),
  CONSTRAINT `fk_bids_seller1` FOREIGN KEY (`sellerId`) REFERENCES `seller` (`sellerId`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bids`
--

LOCK TABLES `bids` WRITE;
/*!40000 ALTER TABLE `bids` DISABLE KEYS */;
INSERT INTO `bids` VALUES (24,22,2,1,1200,'2023-06-09 15:30:10'),(25,22,2,3,1100,'2023-06-09 15:31:50'),(26,32,1,1,27000,'2023-06-11 03:16:24'),(29,32,1,3,24500,'2023-06-12 22:23:38'),(33,30,2,1,4600,'2023-06-10 20:15:21'),(34,27,2,1,145,'2023-06-10 20:15:38'),(35,23,2,3,120,'2023-06-10 20:16:00'),(39,30,2,3,1000000000000,'2023-06-11 15:13:11'),(41,26,1,3,5500,'2023-06-28 08:41:28');
/*!40000 ALTER TABLE `bids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buyer`
--

DROP TABLE IF EXISTS `buyer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `buyer` (
  `buyerId` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `verification_code` varchar(50) DEFAULT NULL,
  `verificationId` int NOT NULL,
  PRIMARY KEY (`buyerId`),
  KEY `fk_buyer_verification1_idx` (`verificationId`),
  CONSTRAINT `fk_buyer_verification1` FOREIGN KEY (`verificationId`) REFERENCES `verification` (`verificationId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buyer`
--

LOCK TABLES `buyer` WRITE;
/*!40000 ALTER TABLE `buyer` DISABLE KEYS */;
INSERT INTO `buyer` VALUES (1,'sahan@001','sahan400500','sahan','perera','sahan@gmail.com','0782883973','139,Thammita,gampaha,Western','USR647362d317426',2),(3,'kasun@001','kasun400500','kasun','perera','kasun@gmail.com','0782883912','112,mainroad,gampaha,western','USR6482a9ee53f21',2);
/*!40000 ALTER TABLE `buyer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buys`
--

DROP TABLE IF EXISTS `buys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `buys` (
  `InvoiceId` int NOT NULL AUTO_INCREMENT,
  `itemId` int NOT NULL,
  `bidId` int NOT NULL,
  `buyerId` int NOT NULL,
  `bid_closed_date` datetime DEFAULT NULL,
  `payment` double DEFAULT NULL,
  `payment_methodId` int DEFAULT NULL,
  `payment_statusId` int NOT NULL,
  `delivery_start_date` datetime DEFAULT NULL,
  `delivery_date` datetime DEFAULT NULL,
  PRIMARY KEY (`InvoiceId`),
  KEY `fk_buys_bids1_idx` (`bidId`),
  KEY `fk_buys_payment_method1_idx` (`payment_methodId`),
  KEY `fk_buys_payments_status1_idx` (`payment_statusId`) USING BTREE,
  KEY `fk_buys_buyer1_idx` (`buyerId`),
  KEY `fk_buys_item1_idx` (`itemId`),
  CONSTRAINT `fk_buys_bids1` FOREIGN KEY (`bidId`) REFERENCES `bids` (`bidId`),
  CONSTRAINT `fk_buys_buyer1` FOREIGN KEY (`buyerId`) REFERENCES `buyer` (`buyerId`),
  CONSTRAINT `fk_buys_item1` FOREIGN KEY (`itemId`) REFERENCES `item` (`itemId`),
  CONSTRAINT `fk_buys_payment_method1` FOREIGN KEY (`payment_methodId`) REFERENCES `payment_method` (`payment_methodId`),
  CONSTRAINT `fk_buys_payments_status1` FOREIGN KEY (`payment_statusId`) REFERENCES `payments_status` (`payments_statusId`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buys`
--

LOCK TABLES `buys` WRITE;
/*!40000 ALTER TABLE `buys` DISABLE KEYS */;
INSERT INTO `buys` VALUES (2,22,25,3,'2023-06-09 15:35:00',1350,1,2,'2023-06-10 14:29:52','2023-06-15 14:29:52'),(10,30,39,3,'2023-06-11 15:17:03',5000,1,1,'2023-06-11 15:18:22','2023-06-16 15:18:22'),(12,23,35,3,'2023-06-12 22:21:46',370,1,1,NULL,NULL),(13,27,34,1,'2023-06-17 00:19:11',395,1,1,NULL,NULL),(14,32,26,1,'2023-06-17 00:19:11',27250,1,1,NULL,NULL),(15,26,41,3,'2023-07-22 17:25:46',5750,1,1,NULL,NULL);
/*!40000 ALTER TABLE `buys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `categoryId` int NOT NULL AUTO_INCREMENT,
  `category` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`categoryId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Electronic'),(2,'Kitchen Items'),(3,'Smart Phones'),(4,'Furnitures'),(5,'Others');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chat` (
  `chatId` int NOT NULL AUTO_INCREMENT,
  `seller_sellerId` int NOT NULL,
  `buyer_buyerId` int NOT NULL,
  `message` text,
  `date` datetime(6) DEFAULT NULL,
  PRIMARY KEY (`chatId`),
  KEY `fk_chat_seller1_idx` (`seller_sellerId`),
  KEY `fk_chat_buyer1_idx` (`buyer_buyerId`),
  CONSTRAINT `fk_chat_buyer1` FOREIGN KEY (`buyer_buyerId`) REFERENCES `buyer` (`buyerId`),
  CONSTRAINT `fk_chat_seller1` FOREIGN KEY (`seller_sellerId`) REFERENCES `seller` (`sellerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat`
--

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deliver_method`
--

DROP TABLE IF EXISTS `deliver_method`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `deliver_method` (
  `deliverId` int NOT NULL AUTO_INCREMENT,
  `method` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`deliverId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deliver_method`
--

LOCK TABLES `deliver_method` WRITE;
/*!40000 ALTER TABLE `deliver_method` DISABLE KEYS */;
INSERT INTO `deliver_method` VALUES (1,'local-courier'),(2,'international-shipping');
/*!40000 ALTER TABLE `deliver_method` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery`
--

DROP TABLE IF EXISTS `delivery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `delivery` (
  `deliveryId` int NOT NULL AUTO_INCREMENT,
  `itemId` int NOT NULL,
  `deliveryAddress` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `delivery_method_Id` int NOT NULL,
  `fees` double DEFAULT NULL,
  `time_duration` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`deliveryId`),
  KEY `fk_delivery_item1_idx` (`itemId`),
  KEY `fk_delivery_deliver_method1_idx` (`delivery_method_Id`) USING BTREE,
  CONSTRAINT `fk_delivery_deliver_method1` FOREIGN KEY (`delivery_method_Id`) REFERENCES `deliver_method` (`deliverId`),
  CONSTRAINT `fk_delivery_item1` FOREIGN KEY (`itemId`) REFERENCES `item` (`itemId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery`
--

LOCK TABLES `delivery` WRITE;
/*!40000 ALTER TABLE `delivery` DISABLE KEYS */;
INSERT INTO `delivery` VALUES (3,22,'12,mainroad,gampaha,western',1,250,'5 days'),(4,30,'12,mainroad,gampaha,western',1,250,'5 days');
/*!40000 ALTER TABLE `delivery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback` (
  `feedbackId` int NOT NULL AUTO_INCREMENT,
  `InvoiceId` int NOT NULL,
  `rating` varchar(1) DEFAULT NULL,
  `feedback_text` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`feedbackId`),
  KEY `fk_feedback_buys1_idx` (`InvoiceId`),
  CONSTRAINT `fk_feedback_buys1` FOREIGN KEY (`InvoiceId`) REFERENCES `buys` (`InvoiceId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `item` (
  `itemId` int NOT NULL AUTO_INCREMENT,
  `sellerId` int NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `categoryId` int NOT NULL,
  `biding_start_price` double DEFAULT NULL,
  `auctionStart` datetime DEFAULT NULL,
  `auctionEnd` datetime DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `condition` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `photo1` varchar(50) DEFAULT NULL,
  `photo2` varchar(50) DEFAULT NULL,
  `photo3` varchar(50) DEFAULT NULL,
  `photo4` varchar(50) DEFAULT NULL,
  `statusId` int NOT NULL,
  PRIMARY KEY (`itemId`),
  KEY `fk_item_seller1_idx` (`sellerId`),
  KEY `fk_item_catergory_idx` (`categoryId`) USING BTREE,
  KEY `fk_item_status1_idx` (`statusId`),
  CONSTRAINT `fk_item_catergory` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`),
  CONSTRAINT `fk_item_seller1` FOREIGN KEY (`sellerId`) REFERENCES `seller` (`sellerId`),
  CONSTRAINT `fk_item_status1` FOREIGN KEY (`statusId`) REFERENCES `status` (`statusId`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (22,2,'LED 18 W',1,1500,'2023-06-08 21:15:00','2023-06-09 15:35:00','An LED lamp, LED light bulb or LED light[1] is an electric light that produces light using light-emitting diodes (LEDs). LED lamps are significantly more energy-efficient than equivalent incandescent lamps and can be significantly more than most fluorescent lamps.[2][3][4] The most efficient commercially available LED lamps have efficiencies exceeding 200 lumens per watt (lm/W) and convert more than half the input power into light.[5][6][7] Commercial LED lamps have a lifespan many times longer than incandescent lamps.','for home use only','items_img//6480a617a09ac.jpeg','items_img//6480a617a0c6a.jpeg',NULL,NULL,4),(23,2,'Capacitor',1,100,'2023-06-07 23:14:00','2023-06-12 15:23:00','The effect of a capacitor is known as capacitance. While some capacitance exists between any two electrical conductors in proximity in a circuit, a capacitor is a component designed to add capacitance to a circuit. The capacitor was originally known as the condenser,[1] a term still encountered in a few compound names, such as the condenser microphone.','','items_img//6480c1ae1f7ea.jpeg',NULL,NULL,NULL,3),(24,1,'Jumper Wires',1,250,'2023-06-07 23:16:00','2023-06-30 18:15:00','A jump wire (also known as jumper, jumper wire, DuPont wire) is an electrical wire, or group of them in a cable, with a connector or pin at each end (or sometimes without them – simply \"tinned\"), which is normally used to interconnect the components of a breadboard or other prototype or test circuit, internally or with other equipment or components, without soldering.[1]\r\n\r\nIndividual jump wires are fitted by inserting their \"end connectors\" into the slots provided in a breadboard, the header connector of a circuit board, or a piece of test equipment.                                                                                                                                                                                                                                                                                                                                                                                                            ','','items_img//6480c212dbf34.jpeg',NULL,NULL,NULL,2),(25,1,'Arduino Kit',1,12000,'2023-06-08 23:16:00','2023-06-30 23:15:00','Arduino (/ɑːrˈdwiːnoʊ/) is an open-source hardware and software company, project, and user community that designs and manufactures single-board microcontrollers and microcontroller kits for building digital devices. Its hardware products are licensed under a CC BY-SA license, while the software is licensed under the GNU Lesser General Public License (LGPL) or the GNU General Public License (GPL),[1] permitting the manufacture of Arduino boards and software distribution by anyone. Arduino boards are available commercially from the official website or through authorized distributors.[2]','','items_img//6480c25f948fd.jpeg',NULL,NULL,NULL,2),(26,1,'PCBs',1,5000,'2023-06-08 23:17:00','2023-06-30 01:36:00','PCBoard (PCB) was a bulletin board system (BBS) application first introduced for DOS in 1983 by Clark Development Company. Clark Development was founded by Fred Clark. PCBoard was one of the first commercial BBS packages for DOS systems, and was considered one of the \"high end\" packages during the rapid expansion of BBS systems in the early 1990s. Like many BBS companies, the rise of the Internet starting around 1994 led to serious downturns in fortunes, and Clark Development went bankrupt in 1997. Most PCB sales were of two-line licenses; additional line licenses (in ranges of 5, 10, 25, 50, 100, 250 and 1000) were also available.','','items_img//6480c2bbe57db.jpeg',NULL,NULL,NULL,3),(27,2,'Transistor',1,150,'2023-06-08 02:30:00','2023-06-13 23:30:00','A transistor is a semiconductor device used to amplify or switch electrical signals and power. It is one of the basic building blocks of modern electronics.[1] It is composed of semiconductor material, usually with at least three terminals for connection to an electronic circuit. A voltage or current applied to one pair of the transistor\'s terminals controls the current through another pair of terminals. Because the controlled (output) power can be higher than the controlling (input) power, a transistor can amplify a signal. Some transistors are packaged individually, but many more in miniature form are found embedded in integrated circuits.','','items_img//6480c626aee35.jpeg',NULL,NULL,NULL,3),(28,1,'Raspberry Pie Motherboard',1,23000,'2023-06-08 09:25:00','2023-06-30 09:23:00','Raspberry Pi (/paɪ/) is a series of small single-board computers (SBCs) developed in the United Kingdom by the Raspberry Pi Foundation in association with Broadcom.[14] The Raspberry Pi project originally leaned toward the promotion of teaching basic computer science in schools.[15][16][17] The original model became more popular than anticipated,[18] selling outside its target market for uses such as robotics. It is widely used in many areas, such as for weather monitoring,[19] because of its low cost, modularity, and open design. It is typically used by computer and electronic hobbyists, due to its adoption of the HDMI and USB standards.','','items_img//6481513078a2b.jpeg',NULL,NULL,NULL,2),(29,2,'Diodes',1,200,'2023-06-09 09:29:00','2023-06-11 09:29:00','A diode is a two-terminal electronic component that conducts current primarily in one direction (asymmetric conductance). It has low (ideally zero) resistance in one direction, and high (ideally infinite) resistance in the other.','','items_img//6481518c041cc.jpeg',NULL,NULL,NULL,2),(30,2,'Cooking Pan',2,4500,'2023-06-09 20:05:00','2023-06-11 15:17:00','Pan frying or pan-frying is a form of frying food characterized by the use of minimal cooking oil or fat (compared to shallow frying or deep frying), typically using just enough to lubricate the pan.[1] In the case of a greasy food such as bacon, no oil or fats may need to be added. As a form of frying, the technique relies on oil or fat as the heat transfer medium,[1] and on correct temperature and time to not overcook or burn the food.[2] Pan frying can serve to retain the moisture in foods such as meat and seafood.[3] The food is typically flipped at least once to ensure that both sides are cooked properly.[4]','For home Use Only','items_img//648337e1e1bd5.jpeg','items_img//648337e1e1f18.jpeg',NULL,NULL,4),(31,2,'Sonic Blender',2,14000,'2023-06-10 17:13:00','2023-06-11 02:44:00','A blender (sometimes called a mixer or liquidiser in British English) is a kitchen and laboratory appliance used to mix, crush, purée or emulsify food and other substances. A stationary blender consists of a blender container with a rotating metal or plastic blade at the bottom, powered by an electric motor that is in the base. Some powerful models can also crush ice and other frozen foods. The newer immersion blender configuration has a motor on top connected by a shaft to a rotating blade at the bottom, which can be used with any container.','Used','items_img//648461b4e42af.jpeg',NULL,NULL,NULL,2),(32,1,'Samsung Galaxy A30',3,25000,'2023-06-10 17:18:00','2023-06-13 17:19:00','The Samsung Galaxy A30 is a mid-range Android smartphone developed, manufactured and marketed by Samsung Electronics. Running on the Android 9.0 \"Pie\" software, the A30 was unveiled on February 25, 2019 alongside the Samsung Galaxy A10[11] and Samsung Galaxy A50[10] at the Mobile World Congress.[12] It was released a month later on March 2, 2019.[5]','Used','items_img//6484629519819.jpeg','items_img//6484629519f12.jpeg',NULL,NULL,3),(33,1,'Samsung M14',3,75000,'2023-06-28 04:40:00','2023-07-01 04:40:00','The Samsung Galaxy M14 5G is an Android-based smartphone designed and manufactured by Samsung Electronics. This phone was announced on March 8, 2023.[3][4][5][6]','Brand New Phone ','items_img//649b6bc8b29af.jpeg',NULL,NULL,NULL,2),(34,1,'Gaming Mouse',1,20000,'2023-06-28 09:00:00','2023-06-30 09:51:00','                                                                        A computer mouse (plural mice, also mouses)[nb 1] is a hand-held pointing device that detects two-dimensional motion relative to a surface. This motion is typically translated into the motion of a pointer on a display, which allows a smooth control of the graphical user interface of a computer.\r\n\r\nThe first public demonstration of a mouse controlling a computer system was in 1968. Mice originally used two separate wheels to directly track movement across a surface: one in the X-dimension and one in the Y. Later, the standard design shifted to use a ball rolling on a surface to detect motion, in turn connected to internal rollers. Most modern mice use optical movement detection with no moving parts. Though originally all mice were connected to a computer by a cable, many modern mice are cordless, relying on short-range radio communication with the connected system.                                                                        ','Used item','items_img//649ba77b58ea6.jpeg',NULL,NULL,NULL,2);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_method`
--

DROP TABLE IF EXISTS `payment_method`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_method` (
  `payment_methodId` int NOT NULL AUTO_INCREMENT,
  `method` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`payment_methodId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_method`
--

LOCK TABLES `payment_method` WRITE;
/*!40000 ALTER TABLE `payment_method` DISABLE KEYS */;
INSERT INTO `payment_method` VALUES (1,'online'),(2,'cash on delivery');
/*!40000 ALTER TABLE `payment_method` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments_status`
--

DROP TABLE IF EXISTS `payments_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments_status` (
  `payments_statusId` int NOT NULL AUTO_INCREMENT,
  `payment_status` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`payments_statusId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments_status`
--

LOCK TABLES `payments_status` WRITE;
/*!40000 ALTER TABLE `payments_status` DISABLE KEYS */;
INSERT INTO `payments_status` VALUES (1,'pending'),(2,'done'),(3,'canceled');
/*!40000 ALTER TABLE `payments_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problems`
--

DROP TABLE IF EXISTS `problems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `problems` (
  `problemId` int NOT NULL AUTO_INCREMENT,
  `adminId` int NOT NULL,
  `sellerId` int NOT NULL,
  `message` text,
  `date` datetime(6) DEFAULT NULL,
  PRIMARY KEY (`problemId`),
  KEY `fk_problems_seller1_idx` (`sellerId`),
  KEY `fk_problems_admin1_idx` (`adminId`),
  CONSTRAINT `fk_problems_admin1` FOREIGN KEY (`adminId`) REFERENCES `admin` (`adminId`),
  CONSTRAINT `fk_problems_seller1` FOREIGN KEY (`sellerId`) REFERENCES `seller` (`sellerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problems`
--

LOCK TABLES `problems` WRITE;
/*!40000 ALTER TABLE `problems` DISABLE KEYS */;
/*!40000 ALTER TABLE `problems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seller`
--

DROP TABLE IF EXISTS `seller`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seller` (
  `sellerId` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `verification_code` varchar(50) DEFAULT NULL,
  `verificationId` int NOT NULL,
  PRIMARY KEY (`sellerId`),
  KEY `fk_seller_verification1_idx` (`verificationId`),
  CONSTRAINT `fk_seller_verification1` FOREIGN KEY (`verificationId`) REFERENCES `verification` (`verificationId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seller`
--

LOCK TABLES `seller` WRITE;
/*!40000 ALTER TABLE `seller` DISABLE KEYS */;
INSERT INTO `seller` VALUES (1,'ravindu@001','ravi400500','Ravindu','Amarasekara','rav.business.lak@gmail.com','0782883971','130,Thammita,Jaela,Western','USR647367f28a59b',2),(2,'ravin','ravi458173','Ravindu','Lakshitha','rav.normal@gmail.com','0782883977','198,Thammita,gampaha,Western','USR64746119cdd23',2);
/*!40000 ALTER TABLE `seller` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status` (
  `statusId` int NOT NULL AUTO_INCREMENT,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`statusId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Active'),(2,'Inactive'),(3,'Payment-Pending'),(4,'Sold');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `verification`
--

DROP TABLE IF EXISTS `verification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `verification` (
  `verificationId` int NOT NULL AUTO_INCREMENT,
  `status` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`verificationId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `verification`
--

LOCK TABLES `verification` WRITE;
/*!40000 ALTER TABLE `verification` DISABLE KEYS */;
INSERT INTO `verification` VALUES (1,'verified'),(2,'non-verified');
/*!40000 ALTER TABLE `verification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'bidding_web'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-22 22:46:27
