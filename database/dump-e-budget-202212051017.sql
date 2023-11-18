-- MySQL dump 10.13  Distrib 8.0.31, for Linux (x86_64)
--
-- Host: localhost    Database: e-budget
-- ------------------------------------------------------
-- Server version	8.0.31-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
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
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(15) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `foto` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `level` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (11,'admin','','01425e4e021748f61f2b77becb81b9c2d397ed5fb2bd2bd25f818b15fb69d4f0e5fb41130b746cff4528cf56d86d50444f1fb1338589276b7bccd78cf0b93ecd','1235678','Administrator','Serang','1997-02-01','Kele','','','SD Sederajat','','Laki-Laki','admin.png','Aktif',1,'2020-06-17 12:25:09',1);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_pengajuan`
--

DROP TABLE IF EXISTS `detail_pengajuan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detail_pengajuan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pengajuan` int NOT NULL,
  `deskripsi` text NOT NULL,
  `qty` int NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `biaya` bigint NOT NULL,
  `status_detail` int DEFAULT NULL,
  `foto` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_pengajuan`
--

LOCK TABLES `detail_pengajuan` WRITE;
/*!40000 ALTER TABLE `detail_pengajuan` DISABLE KEYS */;
INSERT INTO `detail_pengajuan` VALUES (1,1,'Tiket Pesawat',5,'Pcs',2000000,1,'1-1.jpg'),(2,1,'Makan',5,'Pcs',200000,0,NULL),(3,1,'Makan',5,'Pcs',200000,0,NULL),(4,1,'Makan',5,'Pcs',200000,0,NULL),(5,1,'Makan',5,'Pcs',200000,0,NULL),(6,1,'Makan',5,'Pcs',200000,0,NULL),(7,1,'Makan',5,'Pcs',200000,0,NULL),(8,1,'Makan',5,'Pcs',200000,0,NULL),(9,1,'Makan',5,'Pcs',200000,0,NULL),(10,1,'Makan',5,'Pcs',200000,0,NULL),(11,1,'Makan',5,'Pcs',200000,0,NULL),(12,1,'Makan',5,'Pcs',200000,0,NULL),(13,1,'Makan',5,'Pcs',200000,0,NULL),(14,1,'Makan',5,'Pcs',200000,0,NULL),(15,1,'Makan',5,'Pcs',200000,0,NULL),(16,1,'Makan',5,'Pcs',200000,0,NULL),(17,1,'Makan',5,'Pcs',200000,0,NULL),(18,1,'Makan',5,'Pcs',200000,0,NULL),(19,1,'Makan',5,'Pcs',200000,0,NULL),(20,1,'Makan',5,'Pcs',200000,0,NULL),(21,1,'Makan',5,'Pcs',200000,0,NULL),(22,1,'Makan',5,'Pcs',200000,1,'1-22.jpg'),(23,2,'pulpen',5,'Unit',2000,1,'2-23.jpg'),(24,3,'semen',1,'Unit',1000000,1,'3-24.jpg'),(25,3,'batu',100,'Unit',10000,1,'3-25.jpg'),(26,4,'kabel listrik',20,'Meter',100000,1,'4-26.jpg'),(27,4,'penghubung',1000,'Pcs',500,1,'4-27.jpg'),(28,5,'beli nasi',5,'Pcs',50000,1,'5-28.jpg'),(29,5,'beli lauk',2,'Pcs',500000,1,'5-29.jpg');
/*!40000 ALTER TABLE `detail_pengajuan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direktur`
--

DROP TABLE IF EXISTS `direktur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `direktur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `level` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direktur`
--

LOCK TABLES `direktur` WRITE;
/*!40000 ALTER TABLE `direktur` DISABLE KEYS */;
INSERT INTO `direktur` VALUES (0,'direktur','direktur@gmail.com','01425e4e021748f61f2b77becb81b9c2d397ed5fb2bd2bd25f818b15fb69d4f0e5fb41130b746cff4528cf56d86d50444f1fb1338589276b7bccd78cf0b93ecd','Direktur','direktur.png','Aktif',3,'2020-07-01 17:00:54',11),(1,'direktur2','direktur2@gmail.com','01425e4e021748f61f2b77becb81b9c2d397ed5fb2bd2bd25f818b15fb69d4f0e5fb41130b746cff4528cf56d86d50444f1fb1338589276b7bccd78cf0b93ecd','Direktur 2','','Aktif',3,'2022-12-02 23:12:16',11),(2,'direktur3','direktur3@gmail.com','01425e4e021748f61f2b77becb81b9c2d397ed5fb2bd2bd25f818b15fb69d4f0e5fb41130b746cff4528cf56d86d50444f1fb1338589276b7bccd78cf0b93ecd','Direktur 3','','Aktif',3,'2022-12-02 23:12:32',11),(3,'direktur4','direktur4@gmail.com','01425e4e021748f61f2b77becb81b9c2d397ed5fb2bd2bd25f818b15fb69d4f0e5fb41130b746cff4528cf56d86d50444f1fb1338589276b7bccd78cf0b93ecd','Direktur 4','','Aktif',3,'2022-12-02 23:12:43',11),(4,'direktur5','direktur5@gmail.com','01425e4e021748f61f2b77becb81b9c2d397ed5fb2bd2bd25f818b15fb69d4f0e5fb41130b746cff4528cf56d86d50444f1fb1338589276b7bccd78cf0b93ecd','Direktur 5','','Aktif',3,'2022-12-02 23:12:52',11);
/*!40000 ALTER TABLE `direktur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `karyawan`
--

DROP TABLE IF EXISTS `karyawan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `karyawan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(15) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `foto` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `level` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `karyawan`
--

LOCK TABLES `karyawan` WRITE;
/*!40000 ALTER TABLE `karyawan` DISABLE KEYS */;
INSERT INTO `karyawan` VALUES (11,'karyawan','','01425e4e021748f61f2b77becb81b9c2d397ed5fb2bd2bd25f818b15fb69d4f0e5fb41130b746cff4528cf56d86d50444f1fb1338589276b7bccd78cf0b93ecd','1235678598895552','Karyawan','Serang','1997-02-01','Kele','6258855522200','Bendahara','D2','Islam','Laki-Laki','12356785988955522.png','Aktif',2,'2020-06-28 10:31:44',11),(12,'admin','username@gmail.com','01425e4e021748f61f2b77becb81b9c2d397ed5fb2bd2bd25f818b15fb69d4f0e5fb41130b746cff4528cf56d86d50444f1fb1338589276b7bccd78cf0b93ecd','5855555555555555','Siapa Aja','Serang','1997-02-08','asd','089676490971','Staff','S1','Islam','Laki-Laki','58555555555555555.png','Aktif',2,'2020-06-28 07:52:27',11),(13,'username','usasd@gmail.com','01425e4e021748f61f2b77becb81b9c2d397ed5fb2bd2bd25f818b15fb69d4f0e5fb41130b746cff4528cf56d86d50444f1fb1338589276b7bccd78cf0b93ecd','3604042020301565','Nama Lengkap','Serang','1989-02-08','asdasdsa','6289676490958','Staff','D2','Islam','Laki-Laki','360_4042_0203_0123_12.png','Aktif',2,'2020-06-28 10:33:36',11);
/*!40000 ALTER TABLE `karyawan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(150) NOT NULL,
  `link` varchar(200) NOT NULL,
  `icon` varchar(150) NOT NULL,
  `sub_menu` int NOT NULL,
  `level` int NOT NULL,
  `warna` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'Dashboard','Dashboard','fas fa-tachometer-alt',0,1,'text-warning'),(4,'Pengajuan Advance','Pengajuan_Advance','fab fa-angular',0,1,'text-success'),(5,'Pengajuan Expanse','Pengajuan_Expanse','fas fa-balance-scale',0,1,'text-danger'),(25,'Daftar Karyawan','Daftar_Karyawan','fas fa-people-arrows',0,1,'text-secondary'),(26,'Buku Besar','Buku_Besar','fas fa-book',0,1,'text-warning'),(27,'Dashboard','Dashboard','fas fa-tachometer-alt',0,2,'text-warning'),(28,'Profil','Profil','fas fa-id-card-alt',0,2,'text-primary'),(29,'Pengajuan Advance','Pengajuan_Advance','fab fa-angular',0,2,'text-success'),(30,'Pengajuan Expanse','Pengajuan_Expanse','fas fa-balance-scale',0,2,'text-danger'),(31,'Setting','Setting','fas fa-tools',0,1,'text-primary'),(32,'Dashboard','Dashboard','fas fa-tachometer-alt',0,3,'text-warning'),(33,'Pengajuan Advance','Pengajuan_Advance','fab fa-angular',0,3,'text-success'),(34,'Pengajuan Expanse','Pengajuan_Expanse','fas fa-balance-scale',0,3,'text-danger'),(35,'Daftar Karyawan','Daftar_Karyawan','fas fa-people-arrows',0,3,'text-secondary'),(36,'Buku Besar','Buku_Besar','fas fa-book',0,3,'text-warning');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengajuan`
--

DROP TABLE IF EXISTS `pengajuan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengajuan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_pengajuan` varchar(30) NOT NULL,
  `tgl_pengajuan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jumlah_uang` bigint NOT NULL,
  `status` int NOT NULL,
  `id_karyawan` int NOT NULL,
  `keterangan` text,
  `validation_direction_1` int DEFAULT NULL,
  `validation_direction_2` int DEFAULT NULL,
  `validation_direction_3` int DEFAULT NULL,
  `validation_direction_4` int DEFAULT NULL,
  `validation_direction_5` int DEFAULT NULL,
  `val_ex_direct_1` int DEFAULT NULL,
  `val_ex_direct_2` int DEFAULT NULL,
  `val_ex_direct_3` int DEFAULT NULL,
  `val_ex_direct_4` int DEFAULT NULL,
  `val_ex_direct_5` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengajuan`
--

LOCK TABLES `pengajuan` WRITE;
/*!40000 ALTER TABLE `pengajuan` DISABLE KEYS */;
INSERT INTO `pengajuan` VALUES (1,'01/e-Budget/VII/2020','2020-07-05 01:18:56',10000000,4,11,'Tranportasi Malaysia\n',0,1,2,NULL,NULL,1,2,0,NULL,NULL),(2,'01/e-Budget/XII/2022','2022-12-02 11:04:43',20000,4,11,'pulpen',0,1,2,NULL,NULL,0,1,2,NULL,NULL),(3,'02/e-Budget/XII/2022','2022-12-02 22:20:49',2000000,4,11,'semen',2,3,1,NULL,NULL,0,1,3,NULL,NULL),(4,'03/e-Budget/XII/2022','2022-12-04 00:39:27',2500000,4,11,'beli kabel',0,4,3,NULL,NULL,0,2,1,NULL,NULL),(5,'04/e-Budget/XII/2022','2022-12-04 00:51:13',1500000,4,11,'buat makan',0,1,1,NULL,NULL,0,1,4,NULL,NULL);
/*!40000 ALTER TABLE `pengajuan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `setting` (
  `id` int NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kec` varchar(100) NOT NULL,
  `saldo_awal` bigint NOT NULL,
  `pimpinan` int NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` VALUES (0,'PT. Anexco','Jl. Raya Jalan','Banten','Serang','Kramatwatu',50500000,0,'Perusahaan2.png');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_group`
--

DROP TABLE IF EXISTS `user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_group` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_akses` varchar(150) NOT NULL,
  `level` int NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_group`
--

LOCK TABLES `user_group` WRITE;
/*!40000 ALTER TABLE `user_group` DISABLE KEYS */;
INSERT INTO `user_group` VALUES (1,'Administrator',1,'admin'),(2,'Karyawan',2,'karyawan'),(3,'Direktur',3,'direktur');
/*!40000 ALTER TABLE `user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'e-budget'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-05 10:17:55
