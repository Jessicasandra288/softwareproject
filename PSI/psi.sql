/*
SQLyog Ultimate v9.50 
MySQL - 5.5.5-10.4.22-MariaDB : Database - psi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`psi` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `psi`;

/*Table structure for table `tb_alternatif` */

DROP TABLE IF EXISTS `tb_alternatif`;

CREATE TABLE `tb_alternatif` (
  `kode_alternatif` varchar(16) NOT NULL,
  `nama_alternatif` varchar(256) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`kode_alternatif`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tb_alternatif` */

insert  into `tb_alternatif`(`kode_alternatif`,`nama_alternatif`,`keterangan`) values ('A01','Ponpes Al Falah Yatpi Kec. Godong',NULL),('A02','Mushola Attaubah Kec. Gubug',NULL),('A03','Masjid Nurul Hidayah Kec. Geyer',NULL),('A04','Masjid Nurul Huda Kec. Geyer',NULL),('A05','Masjid Al Huda Kec. Kedungjati',NULL),('A06','Mushola Sabillurrosad Kec. Gubug',NULL),('A07','Mushola As Shobur Kec. Gubug',NULL),('A08','Mushola Assyafa\'ah Kec. Geyer',NULL);

/*Table structure for table `tb_kriteria` */

DROP TABLE IF EXISTS `tb_kriteria`;

CREATE TABLE `tb_kriteria` (
  `kode_kriteria` varchar(16) NOT NULL,
  `nama_kriteria` varchar(256) DEFAULT NULL,
  `atribut` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`kode_kriteria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tb_kriteria` */

insert  into `tb_kriteria`(`kode_kriteria`,`nama_kriteria`,`atribut`) values ('C01','NPHD/Perincian Penggunaan Dana Hibah','benefit'),('C02','Kwitansi Bermaterai','benefit'),('C03','Surat Permohonan Pencairan','benefit'),('C04','Perincian Penggunaan Anggaran','benefit'),('C05','Surat Pernyataan Tanggungjawab','benefit'),('C06','Pakta Integritas','benefit'),('C07','SK Domisili (Kades/Kakel)','benefit'),('C08','Sertifikat Tanah Wakaf','benefit'),('C09','Ijin Operasional','benefit'),('C10','Sk Kepengurusan','benefit'),('C11','Proposal','benefit'),('C12','FC KTP Ketua, Sekretaris, Bendahara','benefit'),('C13','FC Rekening Bank a.n Lembaga Penerima Hibah','benefit'),('C14','FC Menkumham','benefit');

/*Table structure for table `tb_rel_alternatif` */

DROP TABLE IF EXISTS `tb_rel_alternatif`;

CREATE TABLE `tb_rel_alternatif` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `kode_alternatif` varchar(16) DEFAULT NULL,
  `kode_kriteria` varchar(16) DEFAULT NULL,
  `kode_subkriteria` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;

/*Data for the table `tb_rel_alternatif` */

insert  into `tb_rel_alternatif`(`ID`,`kode_alternatif`,`kode_kriteria`,`kode_subkriteria`) values (1,'A01','C01',2),(2,'A02','C01',1),(3,'A03','C01',2),(4,'A04','C01',1),(5,'A05','C01',2),(6,'A06','C01',2),(7,'A07','C01',2),(8,'A08','C01',2),(9,'A01','C02',4),(10,'A02','C02',3),(11,'A03','C02',4),(12,'A04','C02',3),(13,'A05','C02',3),(14,'A06','C02',4),(15,'A07','C02',3),(16,'A08','C02',3),(17,'A01','C03',5),(18,'A02','C03',6),(19,'A03','C03',5),(20,'A04','C03',5),(21,'A05','C03',5),(22,'A06','C03',6),(23,'A07','C03',6),(24,'A08','C03',5),(25,'A01','C04',7),(26,'A02','C04',7),(27,'A03','C04',7),(28,'A04','C04',7),(29,'A05','C04',8),(30,'A06','C04',7),(31,'A07','C04',7),(32,'A08','C04',8),(33,'A01','C05',10),(34,'A02','C05',10),(35,'A03','C05',9),(36,'A04','C05',9),(37,'A05','C05',10),(38,'A06','C05',10),(39,'A07','C05',9),(40,'A08','C05',10),(41,'A01','C06',12),(42,'A02','C06',12),(43,'A03','C06',12),(44,'A04','C06',12),(45,'A05','C06',11),(46,'A06','C06',11),(47,'A07','C06',12),(48,'A08','C06',12),(49,'A01','C07',13),(50,'A02','C07',14),(51,'A03','C07',13),(52,'A04','C07',14),(53,'A05','C07',14),(54,'A06','C07',14),(55,'A07','C07',14),(56,'A08','C07',14),(57,'A01','C08',15),(58,'A02','C08',15),(59,'A03','C08',15),(60,'A04','C08',15),(61,'A05','C08',16),(62,'A06','C08',16),(63,'A07','C08',16),(64,'A08','C08',16),(65,'A01','C09',18),(66,'A02','C09',18),(67,'A03','C09',18),(68,'A04','C09',18),(69,'A05','C09',17),(70,'A06','C09',18),(71,'A07','C09',18),(72,'A08','C09',18),(73,'A01','C10',20),(74,'A02','C10',20),(75,'A03','C10',19),(76,'A04','C10',19),(77,'A05','C10',19),(78,'A06','C10',19),(79,'A07','C10',19),(80,'A08','C10',19),(81,'A01','C11',22),(82,'A02','C11',22),(83,'A03','C11',21),(84,'A04','C11',21),(85,'A05','C11',22),(86,'A06','C11',22),(87,'A07','C11',21),(88,'A08','C11',22),(89,'A01','C12',24),(90,'A02','C12',24),(91,'A03','C12',23),(92,'A04','C12',23),(93,'A05','C12',24),(94,'A06','C12',24),(95,'A07','C12',23),(96,'A08','C12',23),(97,'A01','C13',25),(98,'A02','C13',25),(99,'A03','C13',26),(100,'A04','C13',26),(101,'A05','C13',26),(102,'A06','C13',26),(103,'A07','C13',26),(104,'A08','C13',25),(105,'A01','C14',27),(106,'A02','C14',28),(107,'A03','C14',28),(108,'A04','C14',28),(109,'A05','C14',27),(110,'A06','C14',27),(111,'A07','C14',28),(112,'A08','C14',27);

/*Table structure for table `tb_subkriteria` */

DROP TABLE IF EXISTS `tb_subkriteria`;

CREATE TABLE `tb_subkriteria` (
  `kode_subkriteria` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kriteria` varchar(16) DEFAULT NULL,
  `nama_subkriteria` varchar(255) DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  PRIMARY KEY (`kode_subkriteria`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `tb_subkriteria` */

insert  into `tb_subkriteria`(`kode_subkriteria`,`kode_kriteria`,`nama_subkriteria`,`nilai`) values (1,'C01','Ada',1),(2,'C01','Tidak Ada',0.5),(3,'C02','Ada',1),(4,'C02','Tidak Ada',0.5),(5,'C03','Ada',1),(6,'C03','Tidak Ada',0.5),(7,'C04','Ada',1),(8,'C04','Tidak Ada',0.5),(9,'C05','Ada',1),(10,'C05','Tidak Ada',0.5),(11,'C06','Ada',1),(12,'C06','Tidak Ada',0.5),(13,'C07','Ada',1),(14,'C07','Tidak Ada',0.5),(15,'C08','Ada',1),(16,'C08','Tidak Ada',0.5),(17,'C09','Ada',1),(18,'C09','Tidak Ada',0.5),(19,'C10','Ada',1),(20,'C10','Tidak Ada',0.5),(21,'C11','Lengkap',1),(22,'C11','Tidak Lengkap',0.5),(23,'C12','Ada',1),(24,'C12','Tidak Ada',0.5),(25,'C13','Ada',1),(26,'C13','Tidak Ada',0.5),(27,'C14','Ada',1),(28,'C14','Tidak Ada',0.5);

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `user` varchar(16) DEFAULT NULL,
  `pass` varchar(16) DEFAULT NULL,
  `level` varchar(16) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

insert  into `tb_user`(`user`,`pass`,`level`) values ('admin','admin','admin'),('manager','manager','manager');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
