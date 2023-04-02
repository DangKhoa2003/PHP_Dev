-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 09, 2020 at 06:52 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


DROP TABLE IF EXISTS `cthoadon1`;
CREATE TABLE IF NOT EXISTS `cthoadon1` (
  `masohd` int(11) NOT NULL,
  `mahh` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `mausac` varchar(20) NOT NULL,
  `size` int(3) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  PRIMARY KEY (`masohd`,`mahh`),
  KEY `fk_cthd_mahh` (`mahh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `hoadon1`
--

DROP TABLE IF EXISTS `hoadon1`;
CREATE TABLE IF NOT EXISTS `hoadon1` (
  `masohd` int(11) NOT NULL AUTO_INCREMENT,
  `makh` int(11) NOT NULL,
  `ngaydat` date NOT NULL,
  `tongtien` int(11) NOT NULL,
  PRIMARY KEY (`masohd`),
  KEY `fk_hoadon_kh` (`makh`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Constraints for table `cthoadon1`
--
ALTER TABLE `cthoadon1`
  ADD CONSTRAINT `fk_cthd_mahd` FOREIGN KEY (`masohd`) REFERENCES `hoadon1` (`masohd`),
  ADD CONSTRAINT `fk_cthd_mahh` FOREIGN KEY (`mahh`) REFERENCES `tb_tea` (`id`);


--
-- Constraints for table `hoadon1`
--
ALTER TABLE `hoadon1`
  ADD CONSTRAINT `fk_hoadon_kh` FOREIGN KEY (`makh`) REFERENCES `khachhang1` (`makh`);


