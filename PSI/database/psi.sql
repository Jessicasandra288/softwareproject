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

insert  into `tb_alternatif`(`kode_alternatif`,`nama_alternatif`,`keterangan`) values ('A01','Kopi Arabika',NULL),('A02','Kopi Robusta',NULL),('A03','Kopi Petani',NULL),('A04','Kopi Solong',NULL),('A05','Kopi Muria',NULL),('A06','Kopi Gayo',NULL),('A07','Kopi Toraja',NULL),('A08','Kopi Luwak',NULL);

/*Table structure for table `tb_kriteria` */

DROP TABLE IF EXISTS `tb_kriteria`;

CREATE TABLE `tb_kriteria` (
  `kode_kriteria` varchar(16) NOT NULL,
  `nama_kriteria` varchar(256) DEFAULT NULL,
  `atribut` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`kode_kriteria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tb_kriteria` */

insert  into `tb_kriteria`(`kode_kriteria`,`nama_kriteria`,`atribut`) values ('C01','Aroma','benefit'),('C02','Rasa','benefit'),('C03','Roasting','benefit'),('C04','Body','benefit'),('C05','Kadar Air','benefit');

/*Table structure for table `tb_rel_alternatif` */

DROP TABLE IF EXISTS `tb_rel_alternatif`;

CREATE TABLE `tb_rel_alternatif` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `kode_alternatif` varchar(16) DEFAULT NULL,
  `kode_kriteria` varchar(16) DEFAULT NULL,
  `kode_subkriteria` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

/*Data for the table `tb_rel_alternatif` */

insert  into `tb_rel_alternatif`(`ID`,`kode_alternatif`,`kode_kriteria`,`kode_subkriteria`) values (1,'A01','C01',1),(2,'A02','C01',1),(3,'A03','C01',1),(4,'A04','C01',2),(5,'A05','C01',2),(6,'A06','C01',2),(7,'A07','C01',2),(8,'A08','C01',1),(9,'A01','C02',5),(10,'A02','C02',6),(11,'A03','C02',5),(12,'A04','C02',4),(13,'A05','C02',4),(14,'A06','C02',4),(15,'A07','C02',4),(16,'A08','C02',4),(17,'A01','C03',9),(18,'A02','C03',8),(19,'A03','C03',9),(20,'A04','C03',8),(21,'A05','C03',8),(22,'A06','C03',8),(23,'A07','C03',8),(24,'A08','C03',7),(25,'A01','C04',12),(26,'A02','C04',11),(27,'A03','C04',11),(28,'A04','C04',10),(29,'A05','C04',11),(30,'A06','C04',11),(31,'A07','C04',11),(32,'A08','C04',10),(33,'A01','C05',14),(34,'A02','C05',15),(35,'A03','C05',13),(36,'A04','C05',15),(37,'A05','C05',14),(38,'A06','C05',14),(39,'A07','C05',13),(40,'A08','C05',14);

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

insert  into `tb_subkriteria`(`kode_subkriteria`,`kode_kriteria`,`nama_subkriteria`,`nilai`) values (1,'C01','Coklat/Kacang',10),(2,'C01','Tropical',7.5),(3,'C01','Tanah',5),(4,'C02','Cocoa',10),(5,'C02','Asam',7.5),(6,'C02','Pahit',5),(7,'C03','Blonde Roast',10),(8,'C03','Medium Roast',7.5),(9,'C03','Dark Roast',5),(10,'C04','Halus',10),(11,'C04','Cukup Halus',7.5),(12,'C04','Kasar',5),(13,'C05','>7% - 12%',10),(14,'C05','>2% - <=7%',7.5),(15,'C05','0% - 2%',5);

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
