-- MySQL dump 10.13  Distrib 5.6.45, for Linux (x86_64)
--
-- Host: localhost    Database: heroku_1ba2fa6c7c2d2b6
-- ------------------------------------------------------
-- Server version	5.6.45-log

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
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointment` (
  `apID` int(11) NOT NULL,
  `DeptID` int(11) NOT NULL,
  `apDesc` varchar(30) NOT NULL,
  `procID` varchar(20) NOT NULL,
  `roomNum` int(11) NOT NULL,
  `apDate` date NOT NULL,
  `apTime` time NOT NULL,
  `pMRN` int(11) NOT NULL,
  `drID` varchar(20) NOT NULL,
  PRIMARY KEY (`apID`),
  KEY `DeptID` (`DeptID`),
  KEY `procID` (`procID`),
  KEY `pMRN` (`pMRN`),
  KEY `roomNum` (`roomNum`),
  KEY `drID` (`drID`),
  CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`DeptID`) REFERENCES `department` (`DeptID`),
  CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`procID`) REFERENCES `proc` (`procID`),
  CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`pMRN`) REFERENCES `patient` (`pMRN`),
  CONSTRAINT `appointment_ibfk_4` FOREIGN KEY (`roomNum`) REFERENCES `room` (`roomNum`),
  CONSTRAINT `appointment_ibfk_5` FOREIGN KEY (`drID`) REFERENCES `doctor` (`drID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
INSERT INTO `appointment` VALUES (654,5,'654','65432',505,'2019-12-09','17:25:00',9361548,'4781'),(10062,2,'CT Scan','47438',201,'2019-11-30','09:30:00',7435687,'0432'),(14782,3,'2nd Degree Burns(arms & legs)','95472',305,'2019-12-15','08:00:00',7934560,'8567'),(27987,2,'MRI','34200',205,'2020-01-03','12:30:00',1678942,'0432'),(32564,1,'Pelvic Infection','41250',103,'2019-12-15','09:15:00',2574354,'9478'),(63541,3,'2nd Degree Burns(hand & feet)','46501',308,'2019-12-10','08:30:00',2343564,'8567'),(64131,5,'Abdominal Pain(2 weeks)','72431',503,'2019-12-02','08:30:00',6489127,'4781'),(65465,4,'5415','41250',315,'2019-12-28','10:17:00',7435687,'0432'),(65735,3,'Stomach Pain','12304',202,'2019-12-09','12:05:00',9361548,'0432'),(82765,5,'possible IBS','25848',510,'2019-12-02','10:30:00',9361548,'4781'),(84121,1,'Inspect ankle','84124',108,'2019-12-09','10:00:00',3147895,'9478'),(94354,4,'Leg Surgery','28742',423,'2019-12-10','09:30:00',4698001,'5004');
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `DeptID` int(11) NOT NULL,
  `DeptName` varchar(30) NOT NULL,
  `DeptHead` varchar(35) NOT NULL,
  PRIMARY KEY (`DeptID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'Orthopaedics','Manning'),(2,'Radiology','Bowen'),(3,'Burn Unit','Gilbert'),(4,'General Med/Surg','Stevens'),(5,'Gastroenterology','Mcgee');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctor` (
  `drID` varchar(20) NOT NULL,
  `drLName` varchar(15) NOT NULL,
  `drFName` varchar(15) NOT NULL,
  `DeptID` int(11) NOT NULL,
  `drSalary` decimal(8,2) NOT NULL,
  `drAddress` varchar(35) NOT NULL,
  `drSpecialty` varchar(35) NOT NULL,
  `drAge` char(3) NOT NULL,
  PRIMARY KEY (`drID`),
  KEY `DeptID` (`DeptID`),
  CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`DeptID`) REFERENCES `department` (`DeptID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor`
--

LOCK TABLES `doctor` WRITE;
/*!40000 ALTER TABLE `doctor` DISABLE KEYS */;
INSERT INTO `doctor` VALUES ('0432','Bowen','Dustin',2,308000.00,'659 Cherry Drive','Radiology','44'),('4781','Mcgee','Julian',5,220000.00,'395 Smoky Hollow Ave','Gastroenterology','38'),('5004','Stevens','Robin',4,90000.00,'7172 Sherman Drive','Family Medicine','40'),('8567','Gilbert','Iris',3,235000.00,'8938 Hilldale Street','Dermatology','31'),('9478','Manning','Luis',1,43000.00,'17 Richardson Street','Orthopaedics','52');
/*!40000 ALTER TABLE `doctor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicine`
--

DROP TABLE IF EXISTS `medicine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicine` (
  `medID` varchar(20) NOT NULL,
  `medName` varchar(35) NOT NULL,
  `medPrice` decimal(8,2) NOT NULL,
  `medDosage` varchar(15) NOT NULL,
  `expDate` date NOT NULL,
  `medAmount` varchar(25) NOT NULL,
  PRIMARY KEY (`medID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicine`
--

LOCK TABLES `medicine` WRITE;
/*!40000 ALTER TABLE `medicine` DISABLE KEYS */;
INSERT INTO `medicine` VALUES ('101215','Ampicillin',19.62,'30mg','2020-12-15','30'),('449763','Furosemide',29.58,'5mg','2020-12-19','14'),('826990','Clonazepam',94.87,'5mg','2021-03-15','90'),('997546','Tramadol',45.99,'10mg','2021-05-23','21'),('999784','Zanamivir',12.69,'60mg','2021-11-14','90');
/*!40000 ALTER TABLE `medicine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nurse`
--

DROP TABLE IF EXISTS `nurse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nurse` (
  `nurseID` int(11) NOT NULL,
  `nurseLName` varchar(15) NOT NULL,
  `nurseFName` varchar(15) NOT NULL,
  `DeptID` int(11) NOT NULL,
  `nurseSalary` decimal(8,2) NOT NULL,
  `nurseAddress` varchar(35) NOT NULL,
  `nurseAge` char(3) NOT NULL,
  PRIMARY KEY (`nurseID`),
  KEY `DeptID` (`DeptID`),
  CONSTRAINT `nurse_ibfk_1` FOREIGN KEY (`DeptID`) REFERENCES `department` (`DeptID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nurse`
--

LOCK TABLES `nurse` WRITE;
/*!40000 ALTER TABLE `nurse` DISABLE KEYS */;
INSERT INTO `nurse` VALUES (24431,'Fralix','Jessica',2,99768.00,'690 Chicken Creek Rd.','66'),(38747,'Gardner','Sasha',4,125000.00,'471 Park Place Rd.','53'),(43271,'Rogers','Jenny',1,115000.00,'355 Samson St.','44'),(87411,'Higgens','Samuel',3,79000.00,'478 Goose Ave.','29'),(92319,'Garner','Cade',5,69000.00,'985 Walkman St.','32');
/*!40000 ALTER TABLE `nurse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient` (
  `pMRN` int(11) NOT NULL,
  `pPhone` char(10) NOT NULL,
  `pInsure` varchar(35) NOT NULL,
  `pAddress` varchar(35) NOT NULL,
  `pLName` varchar(15) NOT NULL,
  `pFName` varchar(15) NOT NULL,
  `pSSN` varchar(9) NOT NULL,
  `pDOB` date NOT NULL,
  `pAge` char(3) NOT NULL,
  `procID` varchar(20) NOT NULL,
  `drID` varchar(20) NOT NULL,
  PRIMARY KEY (`pMRN`),
  KEY `procID` (`procID`),
  KEY `drID` (`drID`),
  CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`procID`) REFERENCES `proc` (`procID`),
  CONSTRAINT `patient_ibfk_2` FOREIGN KEY (`drID`) REFERENCES `doctor` (`drID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient`
--

LOCK TABLES `patient` WRITE;
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
INSERT INTO `patient` VALUES (1678942,'4787984512','Kaiser','9491 E. Purple Finch Ave','Newman','Melissa','875698213','1998-05-01','21','34200','0432'),(2343564,'7253180924','Aetna','7884 Sunset Lane','Stanley','Clint','102984512','1954-01-23','65','46501','9478'),(2574354,'7477267214','Cigna','7043 Trusel Court','Hodges','Sylvester','402784132','1961-03-05','58','41250','4781'),(3147895,'9859882813','HCSC','21 Beacon Street','Cain','Celia','378450147','2002-11-26','17','84124','5004'),(3445321,'3047855791','HCSC','9067 Lookout St.','Mccarthy','Woodrow','246216574','1983-06-29','36','12304','9478'),(4698001,'2294825867','Aetna','810 East Thatcher Street','Cobb','Alexandra','542124470','0000-00-00','29','28742','8567'),(6489127,'4784987528','BCBS','9976 East Street','Mitchell','Randal','143214612','1992-07-07','27','72431','4781'),(7435687,'2298784561','BCBS','3454 Shirely Drive','Smith','Brian','798452165','1977-04-20','42','47438','5004'),(7934560,'2299875214','Cigna','5834 Heath Road','Robbins','Janet','654784603','1989-11-13','30','95472','8567'),(9361548,'8936279614','Kaiser','1 South Marconi St','Green','Stephanie','140571748','1974-09-23','45','25848','0432');
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prescription`
--

DROP TABLE IF EXISTS `prescription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prescription` (
  `rxID` varchar(10) NOT NULL,
  `pMRN` int(11) NOT NULL,
  `drID` varchar(20) NOT NULL,
  `rxCost` decimal(8,2) NOT NULL,
  `medID` varchar(20) NOT NULL,
  PRIMARY KEY (`rxID`),
  KEY `drID` (`drID`),
  KEY `medID` (`medID`),
  CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`drID`) REFERENCES `doctor` (`drID`),
  CONSTRAINT `prescription_ibfk_2` FOREIGN KEY (`medID`) REFERENCES `medicine` (`medID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prescription`
--

LOCK TABLES `prescription` WRITE;
/*!40000 ALTER TABLE `prescription` DISABLE KEYS */;
INSERT INTO `prescription` VALUES ('120',7435687,'5004',41.47,'101215'),('200',3147895,'5004',46.00,'101215'),('212578',7435687,'0432',58.25,'826990'),('42069',2574354,'5004',13.37,'101215'),('444985',6489127,'4781',34.34,'449763'),('45',4698001,'8567',45.00,'101215'),('5456',4698001,'8567',6545.00,'101215'),('553241',3147895,'9478',55.91,'997546'),('559428',2343564,'8567',84.11,'997546'),('624314',1678942,'0432',37.56,'826990'),('65424',4698001,'8567',6546.00,'101215'),('6546',4698001,'8567',2010.00,'101215'),('675678',3445321,'5004',81.45,'999784'),('892641',9361548,'4781',102.22,'449763'),('931565',4698001,'5004',67.23,'997546'),('971456',7934560,'8567',23.54,'997546'),('988645',2574354,'9478',12.45,'101215');
/*!40000 ALTER TABLE `prescription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proc`
--

DROP TABLE IF EXISTS `proc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proc` (
  `procID` varchar(20) NOT NULL,
  `pMRN` int(11) NOT NULL,
  `drID` varchar(20) NOT NULL,
  `procDesc` varchar(30) NOT NULL,
  `procCost` decimal(8,2) NOT NULL,
  PRIMARY KEY (`procID`),
  KEY `pMRN` (`pMRN`),
  KEY `drID` (`drID`),
  CONSTRAINT `proc_ibfk_1` FOREIGN KEY (`pMRN`) REFERENCES `patient` (`pMRN`),
  CONSTRAINT `proc_ibfk_2` FOREIGN KEY (`drID`) REFERENCES `doctor` (`drID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proc`
--

LOCK TABLES `proc` WRITE;
/*!40000 ALTER TABLE `proc` DISABLE KEYS */;
INSERT INTO `proc` VALUES ('12304',3445321,'5004','Flu test/possible admission',20000.00),('25848',9361548,'4781','CT scan of stomach',500.00),('28742',4698001,'5004','Pins inserted into leg',2000.00),('34200',1678942,'0432','Cancer screening',14978.00),('41250',2574354,'9478','Pelvic infection',1500.00),('46501',2343564,'8567','Clean and dress burns',9962.00),('47438',7435687,'0432','CT of head',2500.00),('72421',6489127,'4781','Appendicitis check',900.00),('84124',3147895,'9478','Xray of ankle',32.17),('95472',7934560,'8567','Skin graft surgery',8000.00);
/*!40000 ALTER TABLE `proc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reception`
--

DROP TABLE IF EXISTS `reception`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reception` (
  `ReceptID` int(11) NOT NULL,
  `ReceptDept` varchar(20) NOT NULL,
  `ReceptLoc` varchar(20) NOT NULL,
  `ReceptPhone` char(10) NOT NULL,
  PRIMARY KEY (`ReceptID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reception`
--

LOCK TABLES `reception` WRITE;
/*!40000 ALTER TABLE `reception` DISABLE KEYS */;
INSERT INTO `reception` VALUES (25680,'General Med/Surg','Floor 1','6555558866'),(33379,'Burn Unit','Floor 5','6557783421'),(77985,'Orthopaedics','Floor 3','6558941133'),(84571,'Gastroenterology','Floor 2','6559932211'),(99268,'Radiology','Floor 6','6554443329');
/*!40000 ALTER TABLE `reception` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room` (
  `roomNum` int(11) NOT NULL,
  `roomType` varchar(35) NOT NULL,
  `pMRN` int(11) NOT NULL,
  `nurseID` int(11) NOT NULL,
  PRIMARY KEY (`roomNum`),
  KEY `pMRN` (`pMRN`),
  KEY `nurseID` (`nurseID`),
  CONSTRAINT `room_ibfk_1` FOREIGN KEY (`pMRN`) REFERENCES `patient` (`pMRN`),
  CONSTRAINT `room_ibfk_2` FOREIGN KEY (`nurseID`) REFERENCES `nurse` (`nurseID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room`
--

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` VALUES (103,'Consulting',2574354,43271),(108,'Consulting',3147895,43271),(201,'Scan',7435687,24431),(205,'Scan',1678942,24431),(305,'HDU',7934560,87411),(308,'HDU',2343564,87411),(414,'Consulting',3445321,38747),(423,'Surgery Prep',4698001,38747),(503,'Consulting',6489127,92319),(510,'Consulting',9361548,92319);
/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'heroku_1ba2fa6c7c2d2b6'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-04  1:29:07
