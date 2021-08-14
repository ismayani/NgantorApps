-- MariaDB dump 10.19  Distrib 10.4.18-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: 10119265_kepegawaian
-- ------------------------------------------------------
-- Server version	10.4.18-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `divisi`
--

DROP TABLE IF EXISTS `divisi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `divisi` (
  `id_divisi` varchar(10) NOT NULL,
  `nama_divisi` varchar(25) NOT NULL,
  PRIMARY KEY (`id_divisi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `divisi`
--

LOCK TABLES `divisi` WRITE;
/*!40000 ALTER TABLE `divisi` DISABLE KEYS */;
INSERT INTO `divisi` VALUES ('keu','Keuangan'),('LIT','Litbang'),('LOG','Logistik'),('TUP','Personalia');
/*!40000 ALTER TABLE `divisi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gaji`
--

DROP TABLE IF EXISTS `gaji`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gaji` (
  `id_gaji` varchar(10) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL,
  `id_tunjangan` varchar(10) NOT NULL,
  `gaji_pokok` varchar(20) NOT NULL,
  `tunjangan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_gaji`),
  KEY `gaji_ibfk_1` (`id_pegawai`),
  KEY `gaji_ibfk_2` (`id_tunjangan`),
  CONSTRAINT `gaji_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`),
  CONSTRAINT `gaji_ibfk_2` FOREIGN KEY (`id_tunjangan`) REFERENCES `tunjangan` (`id_tunjangan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gaji`
--

LOCK TABLES `gaji` WRITE;
/*!40000 ALTER TABLE `gaji` DISABLE KEYS */;
INSERT INTO `gaji` VALUES ('453455','1965111','SPV4-A2','Rp.20.000.000','Rp.30.000.000'),('7890823','1977122','SPV4-A2','Rp.20.000.000','Rp.250.000'),('7890875','1988214','SPV4-A2','Rp.80.000.000','Rp.250.000'),('SV4A2','1988214','SPV4-A2','Rp. 40.000.000','Rp. 2.000.000');
/*!40000 ALTER TABLE `gaji` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jabatan`
--

DROP TABLE IF EXISTS `jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jabatan` (
  `id_jabatan` varchar(10) NOT NULL,
  `id_divisi` varchar(10) NOT NULL,
  `kriteria_jabatan` varchar(25) NOT NULL,
  PRIMARY KEY (`id_jabatan`),
  KEY `id_divisi` (`id_divisi`),
  CONSTRAINT `jabatan_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jabatan`
--

LOCK TABLES `jabatan` WRITE;
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
INSERT INTO `jabatan` VALUES ('MGR2','LOG','Manager Div Logistik'),('psr1','TUP','Manager Personalia'),('SPV4','TUP','Supervisor Div Personalia'),('STF31','LIT','Staf Divisi Litbang');
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_pegawai`
--

DROP TABLE IF EXISTS `log_pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_pegawai` (
  `id_log` int(10) NOT NULL AUTO_INCREMENT,
  `id_pegawai` varchar(10) DEFAULT NULL,
  `telepon_lama` varchar(100) DEFAULT NULL,
  `telepon_baru` varchar(100) DEFAULT NULL,
  `waktu` date DEFAULT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_pegawai`
--

LOCK TABLES `log_pegawai` WRITE;
/*!40000 ALTER TABLE `log_pegawai` DISABLE KEYS */;
INSERT INTO `log_pegawai` VALUES (1,'1965111','0987654','84346239901','2021-08-14');
/*!40000 ALTER TABLE `log_pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pegawai` (
  `id_pegawai` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `slug_nama` varchar(20) NOT NULL,
  `TTL` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `id_jabatan` varchar(10) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL,
  `jumlah_anak` varchar(3) NOT NULL,
  PRIMARY KEY (`id_pegawai`),
  KEY `id_jabatan` (`id_jabatan`),
  CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pegawai`
--

LOCK TABLES `pegawai` WRITE;
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` VALUES ('1965111','Sisca Antonio H','sisca-antonio-h','Jakarta, 11 Agustus 1965','','84346239901','SPV4','jl. condet','Menikah','1'),('1977122','Hendra Nababan','hendra nababan','Makassar, 07 April 1977','Pria','082222111977','MGR2','Jl. Karpetua no.70','Menikah','1'),('1988214','Thariq Abdurohman','thariq abdurohman','Aceh, 20 Maret 1988','Pria','086578903475','SPV4','JL. Pegadaian no.35','Menikah','2');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER update_telepon_pegawai
    BEFORE UPDATE 
    ON pegawai
    FOR EACH ROW 
BEGIN
    INSERT INTO log_pegawai
    set id_pegawai = OLD.id_pegawai,
    telepon_lama=old.telepon,
    telepon_baru=new.telepon,
    waktu = NOW(); 
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `tunjangan`
--

DROP TABLE IF EXISTS `tunjangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tunjangan` (
  `id_tunjangan` varchar(10) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL,
  `jenis_tunjangan` varchar(25) NOT NULL,
  PRIMARY KEY (`id_tunjangan`),
  KEY `id_pegawai` (`id_pegawai`),
  CONSTRAINT `tunjangan_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tunjangan`
--

LOCK TABLES `tunjangan` WRITE;
/*!40000 ALTER TABLE `tunjangan` DISABLE KEYS */;
INSERT INTO `tunjangan` VALUES ('MGR2-A1','1977122','Rp. 1.000.000'),('SPV4-A2','1988214','Rp. 2.000.000');
/*!40000 ALTER TABLE `tunjangan` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-14 20:16:30
