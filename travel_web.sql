CREATE DATABASE  IF NOT EXISTS `travel_web` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `travel_web`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 103.27.206.159    Database: travel_web
-- ------------------------------------------------------
-- Server version	5.5.52-0ubuntu0.14.04.1

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
-- Table structure for table `jenis_penumpang`
--

DROP TABLE IF EXISTS `jenis_penumpang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jenis_penumpang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `maks_usia` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_penumpang`
--

LOCK TABLES `jenis_penumpang` WRITE;
/*!40000 ALTER TABLE `jenis_penumpang` DISABLE KEYS */;
INSERT INTO `jenis_penumpang` VALUES (2,'Dewasa',25),(3,'Anak',12);
/*!40000 ALTER TABLE `jenis_penumpang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kota`
--

DROP TABLE IF EXISTS `kota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kota`
--

LOCK TABLES `kota` WRITE;
/*!40000 ALTER TABLE `kota` DISABLE KEYS */;
INSERT INTO `kota` VALUES (1,'DKI Jakarta'),(3,'Bandung'),(4,'Surabaya'),(5,'Yogyakarta'),(6,'Semarang'),(7,'Malang'),(8,'Palembang'),(9,'Medan'),(10,'Padang'),(11,'Denpasar'),(12,'Cirebon');
/*!40000 ALTER TABLE `kota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `metode_pembayaran`
--

DROP TABLE IF EXISTS `metode_pembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `metode_pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `konfirmasi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metode_pembayaran`
--

LOCK TABLES `metode_pembayaran` WRITE;
/*!40000 ALTER TABLE `metode_pembayaran` DISABLE KEYS */;
INSERT INTO `metode_pembayaran` VALUES (1,'Tunai',0),(2,'Bank Transfer',1),(3,'Test',0);
/*!40000 ALTER TABLE `metode_pembayaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaksi_id` int(11) NOT NULL,
  `metode_pembayaran_id` int(11) NOT NULL,
  `total` double(12,2) NOT NULL,
  `status_pembayaran_id` int(11) NOT NULL,
  `bukti_konfirmasi` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `transaksi_id` (`transaksi_id`),
  KEY `metode_pembayaran_id` (`metode_pembayaran_id`),
  KEY `status_pembayaran_id` (`status_pembayaran_id`),
  CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`metode_pembayaran_id`) REFERENCES `metode_pembayaran` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`status_pembayaran_id`) REFERENCES `status_pembayaran` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `pembayaran_ibfk_4` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembayaran`
--

LOCK TABLES `pembayaran` WRITE;
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
INSERT INTO `pembayaran` VALUES (12,1831001498,1,1000000.00,1,''),(14,1820301363,1,200000.00,1,''),(16,1820403719,1,460000.00,1,'');
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penumpang`
--

DROP TABLE IF EXISTS `penumpang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penumpang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaksi_id` int(11) NOT NULL,
  `jenis_penumpang_id` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `transaksi_id` (`transaksi_id`),
  KEY `jenis_penumpang_id` (`jenis_penumpang_id`),
  CONSTRAINT `penumpang_ibfk_1` FOREIGN KEY (`jenis_penumpang_id`) REFERENCES `jenis_penumpang` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `penumpang_ibfk_2` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penumpang`
--

LOCK TABLES `penumpang` WRITE;
/*!40000 ALTER TABLE `penumpang` DISABLE KEYS */;
INSERT INTO `penumpang` VALUES (24,1831001498,2,'23487234','Arief Setya','2018-08-17'),(25,1820301363,2,'92834982349','Helloilmare','2018-08-17'),(26,1820301363,3,'92384923849','Sladatav','2018-08-17'),(27,1820403719,2,'13123','asdasd','2018-08-17');
/*!40000 ALTER TABLE `penumpang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rute`
--

DROP TABLE IF EXISTS `rute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transportasi_id` int(11) NOT NULL,
  `kota_asal_id` int(11) NOT NULL,
  `kota_tujuan_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jam_berangkat` time NOT NULL,
  `jam_tiba` time NOT NULL,
  `harga` double(12,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `transportasi_id` (`transportasi_id`),
  KEY `kota_asal_id` (`kota_asal_id`),
  KEY `kota_tujuan_id` (`kota_tujuan_id`),
  CONSTRAINT `rute_ibfk_1` FOREIGN KEY (`transportasi_id`) REFERENCES `transportasi` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `rute_ibfk_2` FOREIGN KEY (`kota_asal_id`) REFERENCES `kota` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `rute_ibfk_3` FOREIGN KEY (`kota_tujuan_id`) REFERENCES `kota` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rute`
--

LOCK TABLES `rute` WRITE;
/*!40000 ALTER TABLE `rute` DISABLE KEYS */;
INSERT INTO `rute` VALUES (1,2,1,3,'KA Argo Parahyangan','22:11:43','23:11:43',100000.00),(2,3,1,11,'Citilink','18:25:44','21:30:44',1500000.00),(3,3,1,11,'Lion Air','21:10:53','23:55:53',829000.00),(4,3,1,11,'Sriwijaya','17:00:48','19:50:48',920000.00),(5,3,1,11,'AirAsia','08:00:27','11:00:27',1290000.00),(6,3,1,11,'Sriwijaya','06:15:13','09:05:13',1290000.00),(7,3,1,10,'Lion Air','20:20:06','22:05:06',1000000.00),(8,3,1,10,'Sriwijaya','20:00:28','21:40:28',1070000.00),(9,3,1,10,'Garuda','16:05:19','17:55:19',1500000.00),(10,3,1,10,'Citilink','07:30:39','09:20:39',1410000.00),(11,3,1,10,'AirAsia','09:05:27','15:40:27',1660000.00),(12,3,1,3,'Wings Air','13:15:58','13:50:58',401000.00),(13,3,1,3,'Citilink','18:40:53','06:55:53',1300000.00),(14,3,1,3,'Lion Air','05:00:28','09:20:28',1400000.00),(15,2,7,3,'KA Malabar','16:00:23','07:48:23',185000.00),(16,2,7,3,'KA Mutiara Selatan','16:30:02','08:33:02',340000.00),(17,3,7,3,'Garuda','10:55:13','14:15:13',4414000.00),(18,3,7,3,'Batik Air','10:30:23','14:15:23',5700000.00),(19,3,4,3,'Lion Air','08:05:06','09:20:06',711000.00),(20,3,4,3,'Citilink','14:20:57','15:55:57',883000.00),(21,2,4,3,'KA Argo Wilis','07:00:00','19:06:00',460000.00),(22,2,4,3,'KA Turangga','16:30:05','05:04:05',460000.00),(23,3,5,1,'Citilink','11:00:45','13:00:45',500000.00),(24,2,1,5,'KA Argo Lawu','08:00:27','15:00:27',500000.00),(25,2,8,10,'KA Sribilah','17:07:34','19:00:34',70000.00),(26,2,1,12,'KA Cirebon Ekspress','06:15:07','08:30:07',140000.00),(27,2,1,9,'Garuda','17:08:58','21:08:58',1700000.00),(28,2,1,8,'Citilink','08:09:38','12:01:38',1800000.00),(29,2,1,4,'KA Argo Bromo Anggrek','07:00:35','17:10:35',900000.00),(30,3,5,6,'Citilink','17:11:08','18:00:08',300000.00),(31,2,3,5,'KA Argo Wilis','08:13:00','18:13:00',300000.00),(32,2,9,10,'KA Sribillah','13:14:15','18:00:15',130000.00),(33,2,7,9,'Garuda','04:00:59','09:14:59',1340000.00),(34,3,9,11,'Garuda','06:00:33','11:16:33',1200000.00),(35,3,4,9,'Sriwijaya','09:00:30','14:00:30',2300000.00),(36,3,9,5,'Garuda','08:00:10','12:18:10',2200000.00),(37,4,11,4,'Kapal Ferry Lokal','09:00:03','17:20:03',120000.00),(38,2,6,4,'KA Argo Bromo Anggrek','14:00:00','17:00:00',500000.00),(39,2,7,5,'KA Malabar','14:00:42','18:00:42',400000.00);
/*!40000 ALTER TABLE `rute` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_pembayaran`
--

DROP TABLE IF EXISTS `status_pembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_pembayaran`
--

LOCK TABLES `status_pembayaran` WRITE;
/*!40000 ALTER TABLE `status_pembayaran` DISABLE KEYS */;
INSERT INTO `status_pembayaran` VALUES (1,'Belum Dibayar'),(2,'Butuh Konfirmasi'),(3,'Konfirmasi Admin'),(4,'Dibayar');
/*!40000 ALTER TABLE `status_pembayaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaksi` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transportasi_id` int(11) NOT NULL,
  `kota_asal_id` int(11) NOT NULL,
  `kota_tujuan_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_penumpang` int(11) NOT NULL,
  `harga_satuan` double(12,2) NOT NULL,
  `harga_total` double(12,2) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `transportasi_id` (`transportasi_id`),
  KEY `kota_asal_id` (`kota_asal_id`),
  KEY `kota_tujuan_id` (`kota_tujuan_id`),
  CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`kota_asal_id`) REFERENCES `kota` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`kota_tujuan_id`) REFERENCES `kota` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`transportasi_id`) REFERENCES `transportasi` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1831001499 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` VALUES (1820103861,'',1,2,1,3,'KA Argo Parahyangan','2018-08-22',1,100000.00,100000.00,'2018-08-17 22:49:49'),(1820301363,'HCTFJ',1,2,3,1,'KA Argo Parahyangan','2018-08-17',2,100000.00,200000.00,'2018-08-17 15:14:24'),(1820403719,'AYWCR',1,2,4,3,'KA Argo Wilis','2018-08-17',1,460000.00,460000.00,'2018-08-17 16:31:22'),(1831001498,'MTIXB',1,3,10,1,'Lion Air','2018-08-17',1,1000000.00,1000000.00,'2018-08-17 10:32:06');
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transportasi`
--

DROP TABLE IF EXISTS `transportasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transportasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transportasi`
--

LOCK TABLES `transportasi` WRITE;
/*!40000 ALTER TABLE `transportasi` DISABLE KEYS */;
INSERT INTO `transportasi` VALUES (2,'Kereta Api'),(3,'Pesawat'),(4,'Kapal Ferry');
/*!40000 ALTER TABLE `transportasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'user','ariefsetya@live.com','Arief Setya','','083870002220','18989189281928','2018-08-08','jalan'),(2,'admin','arief@tu-kang.com','Arief Setya','fbe06a252c741ed1ded21a4c69d1c6b7','2348984','923892384','2018-08-08','asasdkl'),(3,'admin','admin@travel.id','Admin Travel','0192023a7bbd73250516f069df18b500','','','0000-00-00','');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-18  9:39:51
