/*
MySQL Data Transfer
Source Host: localhost
Source Database: datacbham
Target Host: localhost
Target Database: datacbham
Date: 11/18/2017 1:24:57 PM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for bagian
-- ----------------------------
DROP TABLE IF EXISTS `bagian`;
CREATE TABLE `bagian` (
  `idanggaran` int(4) DEFAULT NULL,
  `anggaran` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for jabatan
-- ----------------------------
DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan` (
  `kojab` int(255) NOT NULL AUTO_INCREMENT,
  `namajabatan` varchar(255) DEFAULT NULL,
  `kelompok` char(2) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kojab`)
) ENGINE=MyISAM AUTO_INCREMENT=338 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for kelompok
-- ----------------------------
DROP TABLE IF EXISTS `kelompok`;
CREATE TABLE `kelompok` (
  `kodekelom` int(255) NOT NULL AUTO_INCREMENT,
  `namakelompok` varchar(255) DEFAULT NULL,
  `kra` int(40) DEFAULT NULL,
  `kba` int(40) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kodekelom`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for knowhow
-- ----------------------------
DROP TABLE IF EXISTS `knowhow`;
CREATE TABLE `knowhow` (
  `nik` varchar(20) DEFAULT NULL,
  `fe` int(11) DEFAULT NULL,
  `ie` int(11) DEFAULT NULL,
  `ex` int(11) DEFAULT NULL,
  `bs` int(11) DEFAULT NULL,
  `tsmkt` int(11) DEFAULT NULL,
  `tsest` int(11) DEFAULT NULL,
  `tsengmech` int(11) DEFAULT NULL,
  `tsengelec` int(11) DEFAULT NULL,
  `tsengciv` int(11) DEFAULT NULL,
  `tsprocpurch` int(11) DEFAULT NULL,
  `tsprocexpd` int(11) DEFAULT NULL,
  `tsproctrfc` int(11) DEFAULT NULL,
  `tsprocexim` int(11) DEFAULT NULL,
  `tscon` int(11) DEFAULT NULL,
  `tsppc` int(11) DEFAULT NULL,
  `tsmis` int(11) DEFAULT NULL,
  `tsfin` int(11) DEFAULT NULL,
  `tsqa` int(11) DEFAULT NULL,
  `tslgl` int(11) DEFAULT NULL,
  `tsia` int(11) DEFAULT NULL,
  `tsred` int(11) DEFAULT NULL,
  `tsmc` int(11) DEFAULT NULL,
  `tshse` int(11) DEFAULT NULL,
  `tshrd` int(11) DEFAULT NULL,
  `tsrt` int(11) DEFAULT NULL,
  `tsmd` int(11) DEFAULT NULL,
  `tsmr` int(11) DEFAULT NULL,
  `tssub` int(11) DEFAULT NULL,
  `tstop` int(11) DEFAULT NULL,
  `periode` varchar(20) DEFAULT NULL,
  `tahun` varchar(11) DEFAULT NULL,
  `kekuatan` text,
  `kelemahan` text,
  `rencana` text,
  `user` varchar(40) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for krakba
-- ----------------------------
DROP TABLE IF EXISTS `krakba`;
CREATE TABLE `krakba` (
  `kopeg` varchar(20) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `penilai` varchar(255) DEFAULT NULL,
  `periode` varchar(20) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `maintening` double DEFAULT NULL,
  `improvment` double DEFAULT NULL,
  `integritas` double DEFAULT NULL,
  `transparansi` double DEFAULT NULL,
  `kerjasama` double DEFAULT NULL,
  `kreativitas` double DEFAULT NULL,
  `semangat` double DEFAULT NULL,
  `sempurna` double DEFAULT NULL,
  `disiplin` double DEFAULT NULL,
  `pdca` double DEFAULT NULL,
  `manage` double DEFAULT NULL,
  `nilsubmain` double DEFAULT NULL,
  `nilsubimprov` double DEFAULT NULL,
  `nilbobotkra` double DEFAULT NULL,
  `totalnilkra` double DEFAULT NULL,
  `subint` double DEFAULT NULL,
  `subtrans` double DEFAULT NULL,
  `subkerja` double DEFAULT NULL,
  `subkreativ` double DEFAULT NULL,
  `subsemangat` double DEFAULT NULL,
  `subsempurna` double DEFAULT NULL,
  `nilbobotinti` double DEFAULT NULL,
  `nilbobotdisiplin` double DEFAULT NULL,
  `nilbobotpdca` double DEFAULT NULL,
  `nilbobotmanagement` double DEFAULT NULL,
  `nilbobotkba` double DEFAULT NULL,
  `totnilkba` double DEFAULT NULL,
  `totkrakba` double DEFAULT NULL,
  `hasil` varchar(100) DEFAULT NULL,
  `kekuatan` varchar(255) DEFAULT NULL,
  `kelemahan` varchar(255) DEFAULT NULL,
  `tindaklanjut` varchar(255) DEFAULT NULL,
  `jadwal` varchar(255) DEFAULT NULL,
  `bobsubmain` double DEFAULT NULL,
  `bobsubimprov` double DEFAULT NULL,
  `bobotinti` double DEFAULT NULL,
  `bobotdisiplin` double DEFAULT NULL,
  `bobotpdca` double DEFAULT NULL,
  `bobotmanagement` double DEFAULT NULL,
  `kra` double DEFAULT NULL,
  `kba` double DEFAULT NULL,
  `tglentry` date DEFAULT NULL,
  `noindex` int(15) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`noindex`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for log
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `noindex` int(255) NOT NULL AUTO_INCREMENT,
  `user` varchar(40) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  `proses` varchar(255) DEFAULT NULL,
  `note` text,
  PRIMARY KEY (`noindex`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for managerialskill
-- ----------------------------
DROP TABLE IF EXISTS `managerialskill`;
CREATE TABLE `managerialskill` (
  `nik` varchar(20) DEFAULT NULL,
  `dev` int(11) DEFAULT NULL,
  `dir` int(11) DEFAULT NULL,
  `tw` int(11) DEFAULT NULL,
  `tl` int(11) DEFAULT NULL,
  `ps` int(11) DEFAULT NULL,
  `po` int(11) DEFAULT NULL,
  `at` int(11) DEFAULT NULL,
  `ct` int(11) DEFAULT NULL,
  `int` int(11) DEFAULT NULL,
  `iu` int(11) DEFAULT NULL,
  `rb` int(11) DEFAULT NULL,
  `imp` int(11) DEFAULT NULL,
  `ach` int(11) DEFAULT NULL,
  `co` int(11) DEFAULT NULL,
  `inf` int(11) DEFAULT NULL,
  `cso` int(11) DEFAULT NULL,
  `periode` varchar(20) DEFAULT NULL,
  `tahun` varchar(11) DEFAULT NULL,
  `jawab` text,
  `jadwal` text,
  `komentar` text,
  `user` varchar(40) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for pegawai
-- ----------------------------
DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai` (
  `nik` varchar(20) NOT NULL DEFAULT '0',
  `nama` varchar(255) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `tglmasuk` date DEFAULT NULL,
  `pendidikan` varchar(15) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `unit` int(20) DEFAULT NULL,
  `jabatan` int(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `tglentry` datetime DEFAULT NULL,
  `userentry` varchar(20) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  `namaunit` varchar(255) DEFAULT NULL,
  `namajab` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for pegawai1
-- ----------------------------
DROP TABLE IF EXISTS `pegawai1`;
CREATE TABLE `pegawai1` (
  `nik` varchar(20) NOT NULL DEFAULT '0',
  `nama` varchar(255) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `tglmasuk` date DEFAULT NULL,
  `pendidikan` varchar(15) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `unit` int(20) DEFAULT NULL,
  `jabatan` int(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `tglentry` datetime DEFAULT NULL,
  `userentry` varchar(20) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for pegawai2
-- ----------------------------
DROP TABLE IF EXISTS `pegawai2`;
CREATE TABLE `pegawai2` (
  `nik` varchar(20) NOT NULL DEFAULT '0',
  `nama` varchar(255) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `tglmasuk` date DEFAULT NULL,
  `pendidikan` varchar(15) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `unit` int(20) DEFAULT NULL,
  `jabatan` int(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `tglentry` datetime DEFAULT NULL,
  `userentry` varchar(20) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  `namaunit` varchar(255) DEFAULT NULL,
  `namajab` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for stdknowhow
-- ----------------------------
DROP TABLE IF EXISTS `stdknowhow`;
CREATE TABLE `stdknowhow` (
  `kojab` varchar(10) DEFAULT NULL,
  `namajab` varchar(255) DEFAULT NULL,
  `fe` double DEFAULT NULL,
  `ie` double DEFAULT NULL,
  `ex` double DEFAULT NULL,
  `bs` double DEFAULT NULL,
  `tsmkt` double DEFAULT NULL,
  `tsest` double DEFAULT NULL,
  `tsppc` double DEFAULT NULL,
  `tscon` double DEFAULT NULL,
  `tsqac` double DEFAULT NULL,
  `tsman` double DEFAULT NULL,
  `tssar` double DEFAULT NULL,
  `tscs` double DEFAULT NULL,
  `tspeng` double DEFAULT NULL,
  `tsfat` double DEFAULT NULL,
  `tshse` double DEFAULT NULL,
  `tshrd` double DEFAULT NULL,
  `tsga` double DEFAULT NULL,
  `tsmd` double DEFAULT NULL,
  `tsmr` double DEFAULT NULL,
  `tsengmech` double DEFAULT NULL,
  `tsengelec` double DEFAULT NULL,
  `tsenginst` double DEFAULT NULL,
  `tsengciv` double DEFAULT NULL,
  `tssd` double DEFAULT NULL,
  `tsia` double DEFAULT NULL,
  `tstop` double DEFAULT NULL,
  `tglentry` datetime DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `noindex` int(15) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`noindex`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for stdmanagerial
-- ----------------------------
DROP TABLE IF EXISTS `stdmanagerial`;
CREATE TABLE `stdmanagerial` (
  `kojab` varchar(10) DEFAULT NULL,
  `namajab` varchar(255) DEFAULT NULL,
  `dev` double DEFAULT NULL,
  `dir` double DEFAULT NULL,
  `tw` double DEFAULT NULL,
  `tl` double DEFAULT NULL,
  `ps` double DEFAULT NULL,
  `po` double DEFAULT NULL,
  `so` double DEFAULT NULL,
  `at` double DEFAULT NULL,
  `ct` double DEFAULT NULL,
  `int` double DEFAULT NULL,
  `iu` double DEFAULT NULL,
  `rb` double DEFAULT NULL,
  `imp` double DEFAULT NULL,
  `ing` double DEFAULT NULL,
  `trp` double DEFAULT NULL,
  `tew` double DEFAULT NULL,
  `crt` double DEFAULT NULL,
  `wis` double DEFAULT NULL,
  `exc` double DEFAULT NULL,
  `ach` double DEFAULT NULL,
  `co` double DEFAULT NULL,
  `is` double DEFAULT NULL,
  `cso` double DEFAULT NULL,
  `tglentry` datetime DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `noindex` int(15) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`noindex`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for strukturjab
-- ----------------------------
DROP TABLE IF EXISTS `strukturjab`;
CREATE TABLE `strukturjab` (
  `kojab1` int(255) NOT NULL AUTO_INCREMENT,
  `kojab2` int(255) NOT NULL DEFAULT '0',
  `tgl` datetime DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kojab1`,`kojab2`)
) ENGINE=MyISAM AUTO_INCREMENT=135 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for tampung
-- ----------------------------
DROP TABLE IF EXISTS `tampung`;
CREATE TABLE `tampung` (
  `ket1` varchar(255) DEFAULT NULL,
  `ket2` varchar(255) DEFAULT NULL,
  `ket3` varchar(255) DEFAULT NULL,
  `ket4` varchar(255) DEFAULT NULL,
  `ket5` varchar(255) DEFAULT NULL,
  `ket6` varchar(255) DEFAULT NULL,
  `ket7` varchar(255) DEFAULT NULL,
  `ket8` varchar(255) DEFAULT NULL,
  `ket9` varchar(255) DEFAULT NULL,
  `ket10` varchar(255) DEFAULT NULL,
  `ket11` varchar(255) DEFAULT NULL,
  `ket12` varchar(255) DEFAULT NULL,
  `jum1` double DEFAULT '0',
  `jum2` double DEFAULT '0',
  `jum3` double DEFAULT '0',
  `inte1` int(11) DEFAULT NULL,
  `inte2` int(11) DEFAULT NULL,
  `urut` varchar(60) DEFAULT NULL,
  `ket13` varchar(255) DEFAULT NULL,
  `ket14` varchar(255) DEFAULT NULL,
  `ket15` varchar(255) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `ket16` varchar(255) DEFAULT NULL,
  `jum4` double DEFAULT '0',
  `tgl1` datetime DEFAULT NULL,
  `jum5` double DEFAULT '0',
  `jum6` double DEFAULT '0',
  `tgl2` datetime DEFAULT NULL,
  `inte3` int(11) DEFAULT NULL,
  `inte4` int(11) DEFAULT NULL,
  `jum7` double DEFAULT '0',
  `jum8` double DEFAULT NULL,
  `jum9` double DEFAULT NULL,
  `jum10` double unsigned DEFAULT '0',
  `jum11` double DEFAULT NULL,
  `ket17` varchar(500) DEFAULT NULL,
  `ket18` varchar(255) DEFAULT NULL,
  `ket19` varchar(255) DEFAULT NULL,
  `ket20` varchar(255) DEFAULT NULL,
  `ket21` varchar(255) DEFAULT NULL,
  `ket22` varchar(255) DEFAULT NULL,
  `ket23` varchar(255) DEFAULT NULL,
  `ket24` varchar(255) DEFAULT NULL,
  `jum12` double DEFAULT NULL,
  `jum13` double DEFAULT NULL,
  `jum14` double DEFAULT NULL,
  `jum15` double DEFAULT NULL,
  `jum16` double DEFAULT NULL,
  `jum17` double DEFAULT NULL,
  `jum18` double DEFAULT NULL,
  `jum19` double DEFAULT NULL,
  `jum20` double DEFAULT NULL,
  `jum21` double DEFAULT NULL,
  `jum22` double DEFAULT NULL,
  `jum23` double DEFAULT NULL,
  `jum24` double DEFAULT NULL,
  `jum25` double DEFAULT NULL,
  `jum26` double DEFAULT NULL,
  `tanggal2` datetime DEFAULT NULL,
  `tgl3` datetime DEFAULT NULL,
  `tgl4` datetime DEFAULT NULL,
  `tgl5` datetime DEFAULT NULL,
  `noindex` int(11) NOT NULL AUTO_INCREMENT,
  `jum27` double DEFAULT NULL,
  `jum28` double DEFAULT NULL,
  `jum29` double DEFAULT NULL,
  `jum30` double DEFAULT NULL,
  `jum31` double DEFAULT NULL,
  `jum32` double DEFAULT NULL,
  `jum33` double DEFAULT NULL,
  `jum34` double DEFAULT NULL,
  `jum35` double DEFAULT NULL,
  `jum36` double DEFAULT NULL,
  `jum37` double DEFAULT NULL,
  `jum38` double DEFAULT NULL,
  `jum39` double DEFAULT NULL,
  `jum40` double DEFAULT NULL,
  `jum41` double DEFAULT NULL,
  `tgl10` date DEFAULT NULL,
  `tgl11` date DEFAULT NULL,
  `ket25` varchar(50) DEFAULT NULL,
  `ket26` varchar(50) DEFAULT NULL,
  `ket27` varchar(500) DEFAULT NULL,
  `ket28` varchar(50) DEFAULT NULL,
  `jam1` time DEFAULT NULL,
  `ket29` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`noindex`)
) ENGINE=MyISAM AUTO_INCREMENT=8130920 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for tampung2
-- ----------------------------
DROP TABLE IF EXISTS `tampung2`;
CREATE TABLE `tampung2` (
  `ket1` varchar(255) DEFAULT NULL,
  `ket2` varchar(255) DEFAULT NULL,
  `ket3` varchar(255) DEFAULT NULL,
  `ket4` varchar(255) DEFAULT NULL,
  `ket5` varchar(255) DEFAULT NULL,
  `ket6` varchar(255) DEFAULT NULL,
  `ket7` varchar(255) DEFAULT NULL,
  `ket8` varchar(255) DEFAULT NULL,
  `ket9` varchar(255) DEFAULT NULL,
  `ket10` varchar(255) DEFAULT NULL,
  `ket11` varchar(255) DEFAULT NULL,
  `ket12` varchar(255) DEFAULT NULL,
  `jum1` double DEFAULT NULL,
  `jum2` double DEFAULT NULL,
  `jum3` double DEFAULT NULL,
  `inte1` int(11) DEFAULT NULL,
  `inte2` int(11) DEFAULT NULL,
  `urut` varchar(60) DEFAULT NULL,
  `ket13` varchar(255) DEFAULT NULL,
  `ket14` varchar(255) DEFAULT NULL,
  `ket15` varchar(255) DEFAULT NULL,
  `jum4` double DEFAULT NULL,
  `jum5` double DEFAULT NULL,
  `jum6` double DEFAULT NULL,
  `jum7` double DEFAULT NULL,
  `jum8` double DEFAULT NULL,
  `jum9` double DEFAULT NULL,
  `tgl1` datetime DEFAULT NULL,
  `noindex` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`noindex`)
) ENGINE=MyISAM AUTO_INCREMENT=364015 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for unit
-- ----------------------------
DROP TABLE IF EXISTS `unit`;
CREATE TABLE `unit` (
  `kunit` int(5) NOT NULL DEFAULT '0',
  `namaunit` varchar(50) DEFAULT NULL,
  `user` varchar(40) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  PRIMARY KEY (`kunit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `bagian` VALUES ('0', 'User');
INSERT INTO `bagian` VALUES ('1', 'Kaplant');
INSERT INTO `bagian` VALUES ('2', 'Kabag SDM');
INSERT INTO `bagian` VALUES ('3', 'Kabag P&P');
INSERT INTO `bagian` VALUES ('4', 'Kabag TIK');
INSERT INTO `bagian` VALUES ('5', 'Kabag AKSI');
INSERT INTO `bagian` VALUES ('6', 'Kadiv Operasional BSP');
INSERT INTO `bagian` VALUES ('7', 'Kabag Operasional NONBSP');
INSERT INTO `bagian` VALUES ('8', 'Kabag JMI');
INSERT INTO `bagian` VALUES ('9', 'Kabag Pengembangan Perusahaan');
INSERT INTO `bagian` VALUES ('10', 'Kabag Pemeliharaan');
INSERT INTO `bagian` VALUES ('11', 'Kabag Kredit dan Penagihan');
INSERT INTO `bagian` VALUES ('12', 'Kabag SPI');
INSERT INTO `bagian` VALUES ('13', 'Kabag Operasional Fix Plant');
INSERT INTO `bagian` VALUES ('14', 'Kabag Operasional BSP Project');
INSERT INTO `bagian` VALUES ('15', 'Kabag Operasional BG');
INSERT INTO `jabatan` VALUES ('1', 'Adm', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('2', 'Adm IMB', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('3', 'Adm Proyek', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('4', 'Adm. Proyek', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('5', 'Admin', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('6', 'Administrasi', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('7', 'Administrasi & Keuangan', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('8', 'Administrasi & Operator Komputer', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('9', 'Administrasi & Pengawas Lapangan', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('10', 'Administrasi Lapangan', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('11', 'Administrasi Proyek', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('12', 'Administrasi Teknik', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('13', 'Administrator', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('14', 'Administrator Senior', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('15', 'Adminsitrasi ', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('16', 'Adminstrasi', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('17', 'Ahli Bangunan Air', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('18', 'Ahli Desain & Struktur', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('19', 'Ahli Elektrikal', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('20', 'Ahli Landscape', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('21', 'Ahli mekanikal', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('22', 'Ahli Sipil Struktur', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('23', 'Ahli Sistem Management Mutu', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('24', 'Ahli Struktur', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('25', 'Akuntansi', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('26', 'Akutansi/Administrasi ', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('27', 'Anggota Satpam', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('28', 'Appraisal Struktur/Arsitektur ', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('29', 'Arsitek', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('30', 'Asisten Ahli Desain & Kuantitas Irigasi', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('31', 'Asisten Ahli Geodesi', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('32', 'Asisten Ahli Mekanikal tanah', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('33', 'Asisten Construction Egineer', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('34', 'Asisten Tenaga Ahli Sipil', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('35', 'Ass Ahli Geoteknik', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('36', 'Ass Irigasi dan Drainase', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('37', 'Ass TA Arsitektur', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('38', 'Ass TA Estimasi', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('39', 'Ass TA Planologi', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('40', 'Ass TA Struktur', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('41', 'Ass Tenaga Ahli', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('42', 'Ass Tenaga Ahli Arsitektur', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('43', 'Ass Tenaga Ahli ME', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('44', 'Ass. Ahli Elektrikal', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('45', 'Ass. Ahli Interior', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('46', 'Ass. Ahli Mekanikal', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('47', 'Ass. Ahli Struktur', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('48', 'Ass. Estimator', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('49', 'Ass. ME', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('50', 'Ass. Office Manager', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('51', 'Ass. TA Arsitek', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('52', 'Ass. TA Arsitektur', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('53', 'Ass. TA Elektrikal', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('54', 'Ass. TA Estimasi Biaya', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('55', 'Ass. TA Estimasi by', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('56', 'Ass. TA Junior', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('57', 'Ass. TA Kelembagaan', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('58', 'Ass. TA Kelembagaan Banjarnegara & Wonosobo', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('59', 'Ass. TA Kelembagaan Banyumas & Purbalingga', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('60', 'Ass. TA Kelembagaan Gunung Kidul & Bantul', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('61', 'Ass. TA Kelembagaan Kulon Progo & Sleman', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('62', 'Ass. TA Kelembagaan Purworejo & Kebumen', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('63', 'Ass. TA Landscape', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('64', 'Ass. TA Mekanikal', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('65', 'Ass. TA Sipil', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('66', 'Ass. TA. Arsitektur ', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('67', 'Ass. TA. Mekanikal ', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('68', 'Ass. TA. Struktur ', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('69', 'Ass. TAM Banjarnegara', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('70', 'Ass. TAM Banyumas & Purbalingga', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('71', 'Ass. TAM Cilacap', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('72', 'Ass. TAM Gunung Kidul & Bantul', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('73', 'Ass. TAM Kebumen', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('74', 'Ass. TAM Kulon Progo & Sleman', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('75', 'Ass. TAM Magelang', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('76', 'Ass. TAM Purworejo', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('77', 'Ass. TAM Temanggung', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('78', 'Ass. TAM Wonosobo', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('79', 'Ass. Tenaga Ahli', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('80', 'Ass. Tenaga Ahli MEE', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('81', 'Ass.TA Lingkungan', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('82', 'Ass.TA Struktur', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('83', 'Assisten Ahli Geodesi', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('84', 'Cad Op.', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('85', 'Chief Inspector', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('86', 'Cleaning Service', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('87', 'Cleaning Service Cab. Manado', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('88', 'Co Team Leader', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('89', 'Co Team Leader 2', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('90', 'Co Team Leader 3', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('91', 'Co. Team Leader', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('92', 'Comp. Operator', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('93', 'Dafter', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('94', 'DAM Engineer', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('95', 'Design & Construction Engineer', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('96', 'Drafter ', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('97', 'Drafter Arsitektur ', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('98', 'Drafter elektrikal', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('99', 'Drafter Lapangan', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('100', 'Drafter Struktur', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('101', 'Draftman ars.', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('102', 'Draftman Autocad', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('103', 'Driver', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('104', 'Estimator', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('105', 'Estimator/Ass. TA. Struktur ', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('106', 'Geotech Engineer', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('107', 'Head Dam Of Operation', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('108', 'Insp. Sipil', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('109', 'Inspector', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('110', 'K3', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('111', 'Ka. Biro Human Capital & Manajemen Mutu', '1', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('112', 'Ka. Biro Operasi', '1', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('113', 'Ka. Biro Pemasaran', '1', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('114', 'Kabag Operasi Wilayah II Makassar', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('115', 'Kabag Pemasaran Wilayah VII Jayapura', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('116', 'Kabag. Akuntansi', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('117', 'Kabag. Keu & Umum', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('118', 'Kabag. Keuangan & Umum Divisi Bangunan', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('119', 'Kabag. Keuangan & Umum Wilayah I Semarang', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('120', 'Kabag. Keuangan & Umum Wilayah II Makassar', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('121', 'Kabag. Keuangan & Umum Wilayah III DKI Jakarta', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('122', 'Kabag. Keuangan & Umum Wilayah V Palembang', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('123', 'Kabag. Keuangan Pusat', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('124', 'Kabag. Operasi Divisi Bangunan', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('125', 'Kabag. Operasi Wilayah I Semarang', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('126', 'Kabag. Operasi Wilayah III DKI Jakarta', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('127', 'Kabag. Operasi Wilayah V Palembang', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('128', 'Kabag. Operasi Wilayah VII Jayapura', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('129', 'Kabag. Pemasaran Divisi Bangunan', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('130', 'Kabag. Pemasaran Wilayah I Semarang', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('131', 'Kabag. Pemasaran Wilayah II Makassar', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('132', 'Kabag. Pemasaran Wilayah IV Medan', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('133', 'Kabag. Pemasaran Wilayah VI Samarinda', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('134', 'Kabag. Pemeriksa', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('135', 'Kabag. Perencana Operasi', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('136', 'Kabag. Personalia', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('137', 'Kasir', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('138', 'Kasir. 1', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('139', 'Keamanan', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('140', 'Kepala Biro Keuangan & Akuntansi', '1', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('141', 'Kepala Cabang Bandung', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('142', 'Kepala Cabang Kendari', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('143', 'Kepala Cabang Manado', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('144', 'Kepala Cabang Pekanbaru', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('145', 'Kepala Divisi Bangunan', '2', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('146', 'Kepala Divisi Infrastruktur', '2', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('147', 'Kepala Divisi Pengembangan Aset', '2', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('148', 'Kepala Sekretaris Perusahaan', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('149', 'Kepala Wilayah II Makassar', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('150', 'Kepala Wilayah III DKI Jakarta', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('151', 'Kepala Wilayah IV Samarinda', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('152', 'Kepala Wilayah V Palembang', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('153', 'Kepala Wilayah VII Jayapura', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('154', 'Ketua Tim', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('155', 'Komite Audit', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('156', 'Koor Lap', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('157', 'Koor Lap Arsitek', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('158', 'Koor Lap Sipil', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('159', 'Koor Pengawas', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('160', 'Koor Struktur', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('161', 'Koordinator Pengawas ', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('162', 'Kord.Pengawas', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('163', 'Korlap', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('164', 'Korlap Sipil', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('165', 'KRPT', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('166', 'KRPT/ TA. Arsitektur ', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('167', 'OB', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('168', 'Office Boy', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('169', 'Office Boy & Penjaga', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('170', 'Office Manager', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('171', 'Office Manager & Administrasi Proyek', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('172', 'OH.Divisi', null, '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('173', 'Op computer', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('174', 'Op. CAD', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('175', 'Op. Komputer', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('176', 'Operator CAD', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('177', 'Operator Komputer', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('178', 'Pemasaran', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('179', 'Penagihan', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('180', 'Penata', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('181', 'Peng. Lap. Sipil', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('182', 'Peng. Pratama Ars', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('183', 'Peng. Pratama stru', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('184', 'Penganwas ME', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('185', 'Pengatur', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('186', 'Pengawas ', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('187', 'Pengawas Ars', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('188', 'Pengawas Arsitektur ', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('189', 'Pengawas Elektrikal', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('190', 'Pengawas Elmek', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('191', 'Pengawas Lapangan', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('192', 'Pengawas ME', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('193', 'Pengawas Mekanikal', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('194', 'Pengawas Mekanikal & Elektrikal', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('195', 'Pengawas Mekanikal dan Elektrikal', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('196', 'Pengawas MEP ', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('197', 'Pengawas Sipil', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('198', 'Pengawas Struktur ', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('199', 'Pengemudi', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('200', 'Pengemudi Cab. Manado', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('201', 'Pengws Arsitektur', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('202', 'Pj. Kabag. Keu & Umum Wilayah - V', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('203', 'Pj. Kabag. Keu.&Umum', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('204', 'Pj. Kabag. Operasi Divisi Infrastruktur', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('205', 'Pj. Kabag. Operasi Wilayah VI Samarinda', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('206', 'Pj. Kabag. Pemasaran Divisi Infarstruktur', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('207', 'Pj. Kabag. Pemasaran Wilayah - V', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('208', 'Pj. Kabag. Pengembangan SDM', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('209', 'Pj. Kabag. Pengendalian Info & Pelaporan', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('210', 'Pj. Kabag. Pengendalian Proposal Tender', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('211', 'Pj. Kabag. Perpajakan', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('212', 'Pj. Kabag. SMM dan IT', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('213', 'Pj. Kabag. Umum', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('214', 'Pj. Kepala Cabang Jambi', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('215', 'Pj. Kepala Cabang Surabaya', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('216', 'PJ. Kepala Wilayah I Semarang', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('217', 'Pj. Kepala Wilayah IV Medan', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('218', 'Plt. Kabag. Pengendali Operasi', '3', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('219', 'Proyek 060.0012', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('220', 'Proyek 060.0022', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('221', 'Proyek 060.0122', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('222', 'Proyek 060.0131', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('223', 'Proyek 060.0142', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('224', 'Proyek 060.0152', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('225', 'Proyek 060.0162', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('226', 'Proyek 060.0172', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('227', 'Proyek 060.0182', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('228', 'Proyek 060.0192', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('229', 'Quantitiy Inps', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('230', 'Quantity', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('231', 'Resepsionis', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('232', 'SA. Madya', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('233', 'SA. Muda', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('234', 'SA. Pemasaran', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('235', 'Satpam', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('236', 'Security', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('237', 'Sekretaris Perusahaan', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('238', 'Staf ', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('239', 'Staf Acounting', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('240', 'Staf Admin Kontrak & Invoice', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('241', 'Staf Administrasi', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('242', 'Staf Administrasi Keuangan', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('243', 'Staf Ahli', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('244', 'Staf Ahli Utama', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('245', 'Staf Akuntansi', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('246', 'Staf Bagian Keuangan', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('247', 'Staf Bidang Pemasaran', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('248', 'Staf Engineering', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('249', 'Staf IT Umum', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('250', 'Staf Keu & Umum', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('251', 'Staf Keuangan', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('252', 'Staf Legal', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('253', 'Staf Muda', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('254', 'Staf Operasi', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('255', 'Staf Pemasaran', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('256', 'Staf Pemeriksa', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('257', 'Staf Perpajakan', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('258', 'Staf Personalia', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('259', 'Staf SDM', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('260', 'Staf Sekdekom', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('261', 'Staf Sekdir', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('262', 'Staf Tehnik', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('263', 'Staf Teknik', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('264', 'Staf Umum', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('265', 'Staf Umum & Keuangan', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('266', 'Staff Akuntansi', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('267', 'Staff Akutansi ', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('268', 'Staff Cabang Manado', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('269', 'Staff Keuangan & Umum', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('270', 'Staff Operasi', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('271', 'Staff Pemasaran', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('272', 'Staff Pemasaran Cab. Kendari', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('273', 'Staff Penagihan', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('274', 'Staff Perpajakan', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('275', 'Staff Produksi', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('276', 'Staff Produksi Cab. Kendari', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('277', 'Staff SDM', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('278', 'Staff Teknik', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('279', 'Staff Umum', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('280', 'Staff Umum Cab. Kendari', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('281', 'Staff Umum/Driver Cab. Kendari', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('282', 'Surveyor', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('283', 'Surveyor & Pengawas lapangan', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('284', 'TA', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('285', 'TA Ahli penyusun ', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('286', 'TA Arsitektur', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('287', 'TA Elektrikal', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('288', 'TA Elmek', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('289', 'TA Estimasi Biaya', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('290', 'TA Estimator', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('291', 'TA Junior', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('292', 'TA Landscap', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('293', 'TA Madya Struktur', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('294', 'TA ME & EL', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('295', 'TA MEE', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('296', 'TA Mekanikal', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('297', 'TA Sipil Struktur', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('298', 'TA Struktur', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('299', 'TA. Arsitektur', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('300', 'TA. Desain Sipil', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('301', 'TA. Elektrikal', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('302', 'TA. Estimator', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('303', 'TA. Expert', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('304', 'TA. Geologi ', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('305', 'TA. Interior', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('306', 'TA. IT', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('307', 'TA. Mekanikal', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('308', 'TA. Mesin', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('309', 'TA. Muda', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('310', 'TA. Pengujian Kualitas', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('311', 'TA. Sipil', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('312', 'TA. Struktur  ', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('313', 'TA. Struktur 2 ', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('314', 'TA. Teknik Lingkungan', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('315', 'TA. Utama 1', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('316', 'Team Leader', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('317', 'Team Leader/Pengawas Struktur ', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('318', 'Tenaga Ahli', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('319', 'Tenaga Ahli /  Site Engineer', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('320', 'Tenaga Ahli / Quality Engineer', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('321', 'Tenaga Ahli / Quantity Engineer', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('322', 'Tenaga Ahli / Team Leader', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('323', 'Tenaga Ahli Cabang Surabaya', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('324', 'Tenaga Ahli Elektrikal', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('325', 'Tenaga Ahli Estimator', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('326', 'Tenaga Ahli Hidrolika', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('327', 'Tenaga Ahli Jalan', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('328', 'Tenaga Ahli Jembatan', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('329', 'Tenaga Ahli Kelembagaan', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('330', 'Tenaga Ahli Lingkungan', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('331', 'Tenaga Ahli ME', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('332', 'Tenaga Ahli MEEP', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('333', 'Tenaga Ahli Mekanikal', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('334', 'Tenaga Ahli OP', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('335', 'Tenaga Ahli Pantai', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('336', 'Tenaga Ahli Quantity', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `jabatan` VALUES ('337', 'Tenaga Ahli Wilayah IV', '4', '2017-11-06 23:21:17', 'Eko Putra');
INSERT INTO `kelompok` VALUES ('1', 'Kepala Biro', '80', '20', '2017-11-02 04:39:12', 'Eko Putra');
INSERT INTO `kelompok` VALUES ('2', 'Kepala Divisi', '75', '25', '2017-11-02 04:39:12', 'Eko Putra');
INSERT INTO `kelompok` VALUES ('3', 'Kepala Bagian', '70', '30', '2017-11-02 04:39:12', 'Eko Putra');
INSERT INTO `kelompok` VALUES ('4', 'Staff', '60', '40', '2017-11-02 04:34:50', 'Eko Putra');
INSERT INTO `krakba` VALUES ('04.11.17 ', null, null, null, '1', '2017', '7', '7', '7', '7', '7', '7', '7', '7', '7', '7', '7', '7', '0', '7', '4.2', '1.75', '1.75', '1.75', '1.75', '1.75', '1.75', '1.75', '3.85', '0.7', '0.7', '7', '2.8', '7', 'KOMPETEN', '', '', '', '', '100', '0', '25', '55', '10', '10', null, null, '2017-11-03', '4');
INSERT INTO `krakba` VALUES ('030922', 'Abdul Ghofar, ST.', null, null, '3', '2017', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '0', '10', '6', '2.5', '2.5', '2.5', '2.5', '2.5', '2.5', '2.5', '5.5', '1', '1', '10', '4', '10', 'SANGAT EFEKTIF', '', '', '', '', '100', '0', '25', '55', '10', '10', '40', '60', '2017-11-06', '5');
INSERT INTO `krakba` VALUES ('14.09.07', 'Adril Fauza, ST.', 'TA. Elektrikal', null, '1', '2017', '9', null, '10', '11', '12', '11', '10', '9', '8', '9', '14', '9', '0', '9', '5.4', '2.5', '2.75', '3', '2.75', '2.5', '2.25', '2.625', '4.4', '0.9', '1.4', '9.325000000000001', '3.7300000000000004', '9.13', 'KOMPETEN', 'kekuatan', 'kelemahan', 'tindak', 'jadwal', '100', '0', '25', '55', '10', '10', '60', '40', '2017-11-12', '6');
INSERT INTO `krakba` VALUES ('01.06.01', 'Agung Wihartanto, ST', 'Kepala Wilayah II Makassar', 'Fadly, ST, MT', '1', '2017', '8', '9', '11', '12', '13', '10', '11', '8', '9', '14', '12', '9', '0', '9', '5.4', '2.75', '3', '3.25', '2.5', '2.75', '2', '2.7083333333333335', '4.95', '1.4', '1.2', '10.258333333333333', '4.1033333333333335', '9.503333333333334', 'KOMPETEN', 'kekuatan', 'kelemahan', 'tindak lanjut', 'jadwal', '100', '0', '25', '55', '10', '10', '60', '40', '2017-11-12', '8');
INSERT INTO `krakba` VALUES ('01.06.01', 'Agung Wihartanto, ST', 'Kepala Wilayah II Makassar', 'Fadly, ST, MT', '4', '2017', '8', '10', '9', '8', '8', '9', '9', '10', '10', '11', '13', '8', '0', '8', '4.8', '2.25', '2', '2', '2.25', '2.25', '2.5', '2.2083333333333335', '5.5', '1.1', '1.3', '10.108333333333334', '4.043333333333334', '8.843333333333334', 'KOMPETEN', '', '', '', '', '100', '0', '25', '55', '10', '10', '60', '40', '2017-11-12', '14');
INSERT INTO `krakba` VALUES ('01.06.01', 'Agung Wihartanto, ST', 'Kepala Wilayah II Makassar', 'Fadly, ST, MT', '3', '2017', '11', '10', '9', '10', '10', '9', '11', '12', '13', '14', '13', '11', '0', '11', '6.6', '2.25', '2.5', '2.5', '2.25', '2.75', '3', '2.5416666666666665', '7.15', '1.4', '1.3', '12.391666666666667', '4.956666666666667', '11.556666666666667', 'SANGAT EFEKTIF', '', '', '', '', '100', '0', '25', '55', '10', '10', '60', '40', '2017-11-12', '13');
INSERT INTO `krakba` VALUES ('01.06.01', 'Agung Wihartanto, ST', 'Kepala Wilayah II Makassar', 'Fadly, ST, MT', '2', '2017', '9', '10', '11', '12', '10', '11', '10', '12', '13', '14', '13', '10', '0', '10', '6', '2.75', '3', '2.5', '2.75', '2.5', '3', '2.75', '7.15', '1.4', '1.3', '12.600000000000001', '5.040000000000001', '11.040000000000001', 'SANGAT EFEKTIF', '', '', '', '', '100', '0', '25', '55', '10', '10', '60', '40', '2017-11-12', '12');
INSERT INTO `log` VALUES ('31', 'RAHMAN', '2017-10-24 03:00:43', 'INPUT JABATAN', '1');
INSERT INTO `log` VALUES ('32', 'RAHMAN', '2017-10-24 03:02:06', 'EDIT JABATAN', 'Adm tes');
INSERT INTO `log` VALUES ('33', 'RAHMAN', '2017-10-24 03:04:30', 'EDIT JABATAN', 'Adm');
INSERT INTO `log` VALUES ('34', 'RAHMAN', '2017-10-24 03:05:59', 'EDIT JABATAN', 'Adm tes');
INSERT INTO `log` VALUES ('35', 'RAHMAN', '2017-10-24 03:06:33', 'EDIT JABATAN', 'Adm');
INSERT INTO `log` VALUES ('36', 'RAHMAN', '2017-10-24 03:07:34', 'INPUT JABATAN', 'Jabatan Tes');
INSERT INTO `log` VALUES ('37', 'RAHMAN', '2017-10-24 03:28:00', 'INPUT UNIT', 'Tes Unit');
INSERT INTO `log` VALUES ('21', null, '2017-10-20 10:41:01', 'INPUT PEGAWAI', '123456 - GALIH JULIANTO PURNOMO');
INSERT INTO `log` VALUES ('22', null, '2017-10-20 10:49:09', 'INPUT PEGAWAI', '545676 - AYOS');
INSERT INTO `log` VALUES ('23', null, '2017-10-20 10:50:58', 'INPUT PEGAWAI', '65432 - YUTRE');
INSERT INTO `log` VALUES ('24', 'RAHMAN', '2017-10-21 04:29:38', 'INPUT PEGAWAI', '9876571 - TES');
INSERT INTO `log` VALUES ('25', 'RAHMAN', '2017-10-21 04:41:23', 'INPUT PEGAWAI', '456456 - trtyryr');
INSERT INTO `log` VALUES ('26', 'RAHMAN', '2017-10-21 04:42:55', 'INPUT PEGAWAI', '8789 - uytuyinm');
INSERT INTO `log` VALUES ('27', 'RAHMAN', '2007-10-29 08:49:35', 'INPUT PEGAWAI', '7654376 - MUFIDA NUR ISNAINIA');
INSERT INTO `log` VALUES ('28', 'RAHMAN', '2007-10-29 08:50:58', 'INPUT PEGAWAI', '1 - TES2');
INSERT INTO `log` VALUES ('29', 'RAHMAN', '2007-10-29 08:52:17', 'INPUT PEGAWAI', '98765 - TES LAGI');
INSERT INTO `log` VALUES ('30', 'RAHMAN', '2007-10-29 08:58:08', 'INPUT PEGAWAI', '55555 - eyruyewry');
INSERT INTO `log` VALUES ('38', 'RAHMAN', '2017-10-24 03:30:03', 'INPUT UNIT', 'Tes Unit');
INSERT INTO `log` VALUES ('39', 'RAHMAN', '2017-10-24 03:30:57', 'EDIT UNIT', 'Tes Unit 2');
INSERT INTO `log` VALUES ('40', 'RAHMAN', '2017-10-24 03:32:59', 'EDIT JABATAN', 'Jabatan 2');
INSERT INTO `log` VALUES ('41', 'RAHMAN', '2017-10-24 03:58:51', 'EDIT PEGAWAI', '545676 - AYOS bro');
INSERT INTO `log` VALUES ('42', 'RAHMAN', '2017-10-28 02:52:25', 'INPUT STRUKTUR', null);
INSERT INTO `log` VALUES ('43', 'RAHMAN', '2017-10-28 02:55:50', 'INPUT STRUKTUR', '1 - 7');
INSERT INTO `log` VALUES ('44', 'RAHMAN', '2017-10-28 02:56:03', 'INPUT STRUKTUR', '5 - 6');
INSERT INTO `log` VALUES ('45', 'RAHMAN', '2017-10-28 02:56:07', 'INPUT STRUKTUR', '5 - 2');
INSERT INTO `log` VALUES ('46', 'RAHMAN', '2017-10-28 02:56:14', 'INPUT STRUKTUR', '5 - 10');
INSERT INTO `log` VALUES ('47', 'RAHMAN', '2007-10-29 06:07:22', 'INPUT STRUKTUR', '1 - 2');
INSERT INTO `log` VALUES ('48', 'RAHMAN', '2007-10-29 06:07:27', 'INPUT STRUKTUR', '1 - 3');
INSERT INTO `log` VALUES ('49', 'RAHMAN', '2007-10-29 06:07:30', 'INPUT STRUKTUR', '1 - 4');
INSERT INTO `log` VALUES ('50', 'RAHMAN', '2007-10-29 06:07:37', 'INPUT STRUKTUR', '6 - 7');
INSERT INTO `log` VALUES ('51', 'RAHMAN', '2007-10-29 06:47:34', 'EDIT PEGAWAI', '545676 - AYOS bro');
INSERT INTO `log` VALUES ('52', 'Eko Putra', '2017-11-07 06:16:44', 'INPUT STRUKTUR', '1 - 5');
INSERT INTO `log` VALUES ('53', 'Eko Putra', '2017-11-12 03:48:01', 'INPUT STRUKTUR', '114 - 149');
INSERT INTO `pegawai` VALUES ('04.11.17 ', 'Rahman Hadi, ST', '1976-03-26', '2004-11-09', 'S1', 'Tetap', '1', '111', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Biro Human Capital & Manajemen Mutu', 'Ka. Biro Human Capital & Manajemen Mutu');
INSERT INTO `pegawai` VALUES ('90.12.183 ', 'Hari Setiawan', '1968-05-11', '1990-12-01', 'SMA/SMK', 'Tetap', '1', '136', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Biro Human Capital & Manajemen Mutu', 'Kabag. Personalia');
INSERT INTO `pegawai` VALUES ('88.10.170 ', 'Slamet', '1969-04-04', '1988-10-01', 'SMA/SMK', 'Tetap', '1', '180', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Biro Human Capital & Manajemen Mutu', 'Penata');
INSERT INTO `pegawai` VALUES ('84.11.60 ', 'Miranda Savitri', '1963-04-25', '1984-11-01', 'SMA/SMK', 'Tetap', '1', '180', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Biro Human Capital & Manajemen Mutu', 'Penata');
INSERT INTO `pegawai` VALUES ('99.07.26', 'Kuttut Handhoko, SE. MM.', '1969-06-15', '1999-07-26', 'S2', 'Tetap', '1', '208', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Biro Human Capital & Manajemen Mutu', 'Pj. Kabag. Pengembangan SDM');
INSERT INTO `pegawai` VALUES ('93.08.75', 'Nur Adnan, SE', '1971-09-22', '1993-08-01', 'S1', 'Tetap', '2', '140', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Biro Keuangan & Akuntansi', 'Kepala Biro Keuangan & Akuntansi');
INSERT INTO `pegawai` VALUES ('85.04.19 ', 'M. Kholil Arsyad, SE', '1963-07-18', '1985-04-01', 'S1', 'Tetap', '2', '123', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Biro Keuangan & Akuntansi', 'Kabag. Keuangan Pusat');
INSERT INTO `pegawai` VALUES ('98.01.03', 'Marsinta Rouli', '1974-07-05', '1998-01-01', 'D3', 'Tetap', '2', '13', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Biro Keuangan & Akuntansi', 'Administrator');
INSERT INTO `pegawai` VALUES ('83.02.05 ', 'Sri Murtiyati', '1964-03-11', '1983-02-01', 'SMA/SMK', 'Tetap', '2', '138', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Biro Keuangan & Akuntansi', 'Kasir. 1');
INSERT INTO `pegawai` VALUES ('84.09.51 ', 'Daryana', '1962-04-21', '1984-09-01', 'SMA/SMK', 'Tetap', '2', '180', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Biro Keuangan & Akuntansi', 'Penata');
INSERT INTO `pegawai` VALUES ('14.09.01', 'Dasnelly Yulia Finaleta. SE.', '1977-07-21', '2008-08-02', 'S1', 'Tetap', '2', '116', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Biro Keuangan & Akuntansi', 'Kabag. Akuntansi');
INSERT INTO `pegawai` VALUES ('17.06.03', 'Sriyono, S.Pd.', '1978-07-05', '2003-11-01', 'S1', 'Tetap', '2', '211', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Biro Keuangan & Akuntansi', 'Pj. Kabag. Perpajakan');
INSERT INTO `pegawai` VALUES ('17.06.04', 'Kusuma Wijayanti, Amd.', '1982-02-08', '2008-04-14', 'D3', 'Tetap', '2', '251', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Biro Keuangan & Akuntansi', 'Staf Keuangan');
INSERT INTO `pegawai` VALUES ('98.10.02', 'Edi Pramono Ir. MT', '1967-10-24', '1998-10-01', 'S2', 'Tetap', '3', '112', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Biro Operasi', 'Ka. Biro Operasi');
INSERT INTO `pegawai` VALUES ('02.09.01', 'Setiono, SAP', '1976-07-11', '2002-09-01', 'S1', 'Tetap', '3', '135', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Biro Operasi', 'Kabag. Perencana Operasi');
INSERT INTO `pegawai` VALUES ('94.07.01 ', 'Triono Agung D., ST,MT', '1970-10-09', '1994-07-01', 'S2', 'Tetap', '4', '113', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Biro Pemasaran', 'Ka. Biro Pemasaran');
INSERT INTO `pegawai` VALUES ('05.11.23', 'Prasetyo Wibisono', '1976-11-20', '2005-11-23', 'D3', 'Tetap', '4', '209', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Biro Pemasaran', 'Pj. Kabag. Pengendalian Info & Pelaporan');
INSERT INTO `pegawai` VALUES ('99.10.24', 'Maulana', '1977-05-21', '1999-10-05', 'SMA/SMK', 'Tetap', '4', '13', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Biro Pemasaran', 'Administrator');
INSERT INTO `pegawai` VALUES ('17.06.01', 'Tri Windarto, ST. MT.', '1991-04-05', '2009-07-01', 'S2', 'Tetap', '4', '210', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Biro Pemasaran', 'Pj. Kabag. Pengendalian Proposal Tender');
INSERT INTO `pegawai` VALUES ('03.11.09 ', 'Asep Bachtiar, S.Sn.', '1969-09-29', '2003-11-01', 'S1', 'Tetap', '5', '141', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Cabang Bandung', 'Kepala Cabang Bandung');
INSERT INTO `pegawai` VALUES ('15.08.06', 'Didin Achmad Jaenudin, ST', '1983-01-23', '2009-04-02', 'S1', 'Tetap', '6', '214', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Cabang Jambi', 'Pj. Kepala Cabang Jambi');
INSERT INTO `pegawai` VALUES ('90.12.01', 'Wahniar Hamid, ST, MT', '1968-10-05', '1991-02-01', 'S2', 'Tetap', '7', '142', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Cabang Kendari', 'Kepala Cabang Kendari');
INSERT INTO `pegawai` VALUES ('14.09.11', 'Nurbaiti, ST.', '1979-07-03', '2009-08-01', 'S1', 'Tetap', '8', '144', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Cabang Pekanbaru', 'Kepala Cabang Pekanbaru');
INSERT INTO `pegawai` VALUES ('94.08.03 ', 'Budi Susilo ST.', '1965-02-02', '1995-08-03', 'S1', 'Tetap', '9', '323', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Cabang Surabaya', 'Tenaga Ahli Cabang Surabaya');
INSERT INTO `pegawai` VALUES ('86.09.48 ', 'Andi Rafiandita', '1966-08-14', '1986-09-01', 'SMA/SMK', 'Tetap', '9', '180', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Cabang Surabaya', 'Penata');
INSERT INTO `pegawai` VALUES ('15.08.09', 'Siswandi, ST', '1979-06-03', '2009-08-12', 'S1', 'Tetap', '9', '215', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Cabang Surabaya', 'Pj. Kepala Cabang Surabaya');
INSERT INTO `pegawai` VALUES ('17.06.07', 'Slamet Santosa, SE.', '1979-12-08', '1999-09-15', 'S1', 'Tetap', '9', '251', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Cabang Surabaya', 'Staf Keuangan');
INSERT INTO `pegawai` VALUES ('96.06.01', 'Tri Wahyuedi, S.Sn.', '1969-07-26', '1996-06-01', 'S1', 'Tetap', '10', '145', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Bangunan', 'Kepala Divisi Bangunan');
INSERT INTO `pegawai` VALUES ('91.02.19 ', 'M. Iswahyudi', '1968-01-06', '1991-02-01', 'SMA/SMK', 'Tetap', '10', '129', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Bangunan', 'Kabag. Pemasaran Divisi Bangunan');
INSERT INTO `pegawai` VALUES ('90.11.173 ', 'Titi Titani', '1965-09-30', '1990-11-09', 'D3', 'Tetap', '10', '118', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Bangunan', 'Kabag. Keuangan & Umum Divisi Bangunan');
INSERT INTO `pegawai` VALUES ('08.04.02', 'Rico Arinto H, ST.', '1986-05-14', '2008-04-04', 'S1', 'Tetap', '10', '124', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Bangunan', 'Kabag. Operasi Divisi Bangunan');
INSERT INTO `pegawai` VALUES ('89.04.23 ', 'Yon Rizal Drs. ', '1966-03-30', '1989-04-01', 'S1', 'Tetap', '10', '180', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Bangunan', 'Penata');
INSERT INTO `pegawai` VALUES ('89.08.49 ', 'Agustina Sri Sugiartati', '1966-08-15', '1989-08-01', 'SMA/SMK', 'Tetap', '10', '180', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Bangunan', 'Penata');
INSERT INTO `pegawai` VALUES ('02.09.02', 'Purnomo, S.Kom.', '1975-07-22', '2002-09-01', 'S1', 'Tetap', '10', '234', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Bangunan', 'SA. Pemasaran');
INSERT INTO `pegawai` VALUES ('07.08.01', 'Liane Nadia, ST', '1983-05-18', '2007-08-01', 'S1', 'Tetap', '10', '314', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Bangunan', 'TA. Teknik Lingkungan');
INSERT INTO `pegawai` VALUES ('92.08.106 ', 'Yudi Syafril Ir. ', '1962-04-01', '1992-08-01', 'S1', 'Tetap', '10', '315', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Bangunan', 'TA. Utama 1');
INSERT INTO `pegawai` VALUES ('07.12.02', 'Yoke Prima Hendrawan, ST. ', '1977-02-22', '2007-12-03', 'S1', 'Tetap', '10', '299', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Bangunan', 'TA. Arsitektur');
INSERT INTO `pegawai` VALUES ('05.08.16', 'Antariksa Artidi, ST.', '1976-12-10', '2005-08-01', 'S1', 'Tetap', '10', '311', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Bangunan', 'TA. Sipil');
INSERT INTO `pegawai` VALUES ('97.06.01', 'Zaky Mubarak Ir. ', '1971-04-12', '1997-06-01', 'S1', 'Tetap', '10', '315', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Bangunan', 'TA. Utama 1');
INSERT INTO `pegawai` VALUES ('85.07.74 ', 'Subadri', '1966-01-29', '1985-07-01', 'SMA/SMK', 'Tetap', '10', '13', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Bangunan', 'Administrator');
INSERT INTO `pegawai` VALUES ('04.03.09 ', 'Sofyan Taslim, ST', '1980-01-05', '2004-03-24', 'S1', 'Tetap', '10', '299', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Bangunan', 'TA. Arsitektur');
INSERT INTO `pegawai` VALUES ('17.06.05', 'Ganggas Himawan, SE.', '1992-06-29', '2010-01-01', 'S1', 'Tetap', '10', '255', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Bangunan', 'Staf Pemasaran');
INSERT INTO `pegawai` VALUES ('91.10.02 ', 'Yusmin, ST', '1974-11-04', '2002-10-01', 'S1', 'Tetap', '11', '146', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Infrastruktur', 'Kepala Divisi Infrastruktur');
INSERT INTO `pegawai` VALUES ('92.05.01 ', 'Agus Tristriyono Ir. ', '1966-08-01', '1992-05-01', 'S1', 'Tetap', '11', '318', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Infrastruktur', 'Tenaga Ahli');
INSERT INTO `pegawai` VALUES ('14.09.04', 'Yuanita Eka Furi, SE.', '1985-07-31', '2009-11-02', 'S1', 'Tetap', '11', '248', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Infrastruktur', 'Staf Engineering');
INSERT INTO `pegawai` VALUES ('85.07.72', 'Sukma Nila', '1962-02-07', '1985-07-08', 'SMA/SMK', 'Tetap', '11', '180', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Infrastruktur', 'Penata');
INSERT INTO `pegawai` VALUES ('90.06.24 ', 'Darikun', '1961-07-10', '1990-06-01', 'SMA/SMK', 'Tetap', '11', '199', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Infrastruktur', 'Pengemudi');
INSERT INTO `pegawai` VALUES ('97.02.04', 'Imam Seski Setyawan, ST. ', '1973-04-07', '1997-02-01', 'S1', 'Tetap', '11', '318', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Infrastruktur', 'Tenaga Ahli');
INSERT INTO `pegawai` VALUES ('94.04.87', 'M. Iman Solihin', '1966-10-21', '1994-04-03', 'SMA/SMK', 'Tetap', '11', '14', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Infrastruktur', 'Administrator Senior');
INSERT INTO `pegawai` VALUES ('91.07.56', 'Hery Afianto Ir. ', '1965-01-20', '1991-07-12', 'S1', 'Tetap', '11', '311', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Infrastruktur', 'TA. Sipil');
INSERT INTO `pegawai` VALUES ('86.11.55 ', 'S. Bambang Wisnu WH', '1961-10-08', '1986-11-01', 'D3', 'Tetap', '11', '170', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Infrastruktur', 'Office Manager');
INSERT INTO `pegawai` VALUES ('85.04.20 ', 'Djabar Erlando', '1963-03-02', '1985-04-01', 'SMA/SMK', 'Tetap', '11', '170', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Infrastruktur', 'Office Manager');
INSERT INTO `pegawai` VALUES ('85.06.65 ', 'Priantono', '1964-04-01', '1985-06-01', 'SMA/SMK', 'Tetap', '11', '170', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Infrastruktur', 'Office Manager');
INSERT INTO `pegawai` VALUES ('93.11.103 ', 'Alfa Rohani Ir. ', '1963-06-08', '1993-11-01', 'S1', 'Tetap', '11', '318', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Infrastruktur', 'Tenaga Ahli');
INSERT INTO `pegawai` VALUES ('17.06.09', 'Arry Kristianto, ST.', '1980-09-23', '2006-05-16', 'S1', 'Tetap', '11', '206', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Infrastruktur', 'Pj. Kabag. Pemasaran Divisi Infarstruktur');
INSERT INTO `pegawai` VALUES ('17.06.11', 'Neta Karima, Amd.', '1984-04-26', '2009-02-28', 'D3', 'Tetap', '11', '202', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Infrastruktur', 'Pj. Kabag. Keu & Umum Wilayah - V');
INSERT INTO `pegawai` VALUES ('17.06.08', 'Widiastuti Diah Prianti', '1968-05-12', '2012-09-03', 'D3', 'Tetap', '11', '204', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Divisi Infrastruktur', 'Pj. Kabag. Operasi Divisi Infrastruktur');
INSERT INTO `pegawai` VALUES ('99.12.02', 'Bimo Chondro Ir. ', '1965-09-29', '1999-12-01', 'S1', 'Tetap', '12', '147', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Pengembangan Aset', 'Kepala Divisi Pengembangan Aset');
INSERT INTO `pegawai` VALUES ('14.09.02', 'Eryanto Eka Prasetya, S.Si. SE. Akt.', '1983-10-10', '2008-01-22', 'S1', 'Tetap', '13', '134', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Satuan Pengawasan Intern', 'Kabag. Pemeriksa');
INSERT INTO `pegawai` VALUES ('15.08.12', 'Apriyanto, SE.', '1985-04-07', '2008-06-01', 'S1', 'Tetap', '13', '256', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Satuan Pengawasan Intern', 'Staf Pemeriksa');
INSERT INTO `pegawai` VALUES ('93.05.05 ', 'Delta Hatmantari Ir. ', '1966-11-28', '1993-05-05', 'S1', 'Tetap', '13', '148', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Satuan Pengawasan Intern', 'Kepala Sekretaris Perusahaan');
INSERT INTO `pegawai` VALUES ('94.11.68', 'Salimin', '1974-06-22', '1994-11-21', 'SMA/SMK', 'Tetap', '14', '168', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Sekretaris Perusahaan', 'Office Boy');
INSERT INTO `pegawai` VALUES ('81.09.18 ', 'Sarna Wijaya', '1964-04-14', '1981-09-01', 'SMA/SMK', 'Tetap', '14', '6', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Sekretaris Perusahaan', 'Administrasi');
INSERT INTO `pegawai` VALUES ('83.02.04 ', 'Ngatijo', '1962-04-03', '1983-02-01', 'SMA/SMK', 'Tetap', '14', '199', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Sekretaris Perusahaan', 'Pengemudi');
INSERT INTO `pegawai` VALUES ('85.06.62 ', 'Subur', '1963-08-31', '1985-06-01', 'SMA/SMK', 'Tetap', '14', '253', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Sekretaris Perusahaan', 'Staf Muda');
INSERT INTO `pegawai` VALUES ('88.08.76 ', 'Rachmudin', '1963-09-12', '1988-08-01', 'SMA/SMK', 'Tetap', '14', '27', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Sekretaris Perusahaan', 'Anggota Satpam');
INSERT INTO `pegawai` VALUES ('88.11.182 ', 'Tambat Anas', '1964-08-10', '1988-11-01', 'SMA/SMK', 'Tetap', '14', '27', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Sekretaris Perusahaan', 'Anggota Satpam');
INSERT INTO `pegawai` VALUES ('04.06.21 ', 'Rudy Hendarto, ST', '1970-12-12', '2004-06-21', 'S1', 'Tetap', '14', '237', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Sekretaris Perusahaan', 'Sekretaris Perusahaan');
INSERT INTO `pegawai` VALUES ('99.09.56', 'Satimo', '1963-01-16', '1999-09-12', 'SMA/SMK', 'Tetap', '14', '213', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Sekretaris Perusahaan', 'Pj. Kabag. Umum');
INSERT INTO `pegawai` VALUES ('01.06.01', 'Agung Wihartanto, ST', '1975-09-23', '2001-06-01', 'S1', 'Tetap', '14', '149', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah  II Makassar', 'Kepala Wilayah II Makassar');
INSERT INTO `pegawai` VALUES ('04.05.00 ', 'Fadly, ST, MT', '1978-11-28', '2004-05-01', 'S2', 'Tetap', '14', '114', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah  II Makassar', 'Kabag Operasi Wilayah II Makassar');
INSERT INTO `pegawai` VALUES ('14.09.10', 'Hamka, ST.', '1981-10-01', '2008-10-10', 'S1', 'Tetap', '14', '131', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah  II Makassar', 'Kabag. Pemasaran Wilayah II Makassar');
INSERT INTO `pegawai` VALUES ('14.09.03', 'Pandu Dewantoro, SE.', '1977-11-15', '2007-03-01', 'S1', 'Tetap', '14', '120', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah  II Makassar', 'Kabag. Keuangan & Umum Wilayah II Makassar');
INSERT INTO `pegawai` VALUES ('14.09.08', 'Suriyana, Dra. ', '1966-11-17', '1994-05-02', 'S1', 'Tetap', '14', '137', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah  II Makassar', 'Kasir');
INSERT INTO `pegawai` VALUES ('89.09.54 ', 'M. Syakur Masse Drs. ', '1964-07-19', '1989-09-01', 'S2', 'Tetap', '14', '232', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah  II Makassar', 'SA. Madya');
INSERT INTO `pegawai` VALUES ('91.07.03', 'Bakri Nambrung,  Drs. ST', '1966-02-07', '1991-07-01', 'S2', 'Tetap', '14', '318', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah  II Makassar', 'Tenaga Ahli');
INSERT INTO `pegawai` VALUES ('91.12.04 ', 'Machniah Malkan Ir. ', '1963-03-08', '1991-12-01', 'S1', 'Tetap', '14', '318', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah  II Makassar', 'Tenaga Ahli');
INSERT INTO `pegawai` VALUES ('86.06.01 ', 'Nursalim L. Adnan', '1963-09-01', '1986-06-01', 'SMA/SMK', 'Tetap', '14', '255', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah  II Makassar', 'Staf Pemasaran');
INSERT INTO `pegawai` VALUES ('01.07.00 ', 'St. Khadijah Hamid, ST', '1972-04-04', '2001-07-01', 'S1', 'Tetap', '14', '247', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah  II Makassar', 'Staf Bidang Pemasaran');
INSERT INTO `pegawai` VALUES ('14.09.09', 'Mustapa Mappiasse, SE', '1970-01-14', '2001-01-01', 'S1', 'Tetap', '14', '265', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah  II Makassar', 'Staf Umum & Keuangan');
INSERT INTO `pegawai` VALUES ('02.06.05', 'Danang Rujito Wibowo,ST,MSi.', '1978-02-14', '2002-06-01', 'S2', 'Tetap', '15', '216', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah I Semarang', 'PJ. Kepala Wilayah I Semarang');
INSERT INTO `pegawai` VALUES ('88.09.01 ', 'Etik Egawati Dra. ', '1963-07-13', '1988-09-01', 'S1', 'Tetap', '15', '119', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah I Semarang', 'Kabag. Keuangan & Umum Wilayah I Semarang');
INSERT INTO `pegawai` VALUES ('01.07.01', 'Prihanto Susiawan Ir. ', '1965-08-14', '2001-07-01', 'S1', 'Tetap', '15', '130', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah I Semarang', 'Kabag. Pemasaran Wilayah I Semarang');
INSERT INTO `pegawai` VALUES ('85.02.02 ', 'Sri Akhadiyah Dra. ', '1962-04-22', '1985-02-01', 'S1', 'Tetap', '15', '246', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah I Semarang', 'Staf Bagian Keuangan');
INSERT INTO `pegawai` VALUES ('98.10.01 ', 'Bambang Mutiyoso, ST', '1971-09-15', '1998-10-01', 'S1', 'Tetap', '15', '243', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah I Semarang', 'Staf Ahli');
INSERT INTO `pegawai` VALUES ('94.07.30 ', 'Nanang Budhi Setyawan, ST.', '1969-08-11', '1996-07-20', 'S1', 'Tetap', '15', '243', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah I Semarang', 'Staf Ahli');
INSERT INTO `pegawai` VALUES ('15.08.05', 'Maya Fieva Desi Lestari, ST.', '1982-12-03', '2007-09-01', 'S1', 'Tetap', '15', '318', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah I Semarang', 'Tenaga Ahli');
INSERT INTO `pegawai` VALUES ('15.08.07', 'Taqdir Ali Syabana, ST.', '1982-01-28', '2009-08-12', 'S1', 'Tetap', '15', '125', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah I Semarang', 'Kabag. Operasi Wilayah I Semarang');
INSERT INTO `pegawai` VALUES ('15.08.08', 'Muhammad Yusuf, ST.', '1978-05-12', '2009-08-12', 'S1', 'Tetap', '15', '238', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah I Semarang', 'Staf ');
INSERT INTO `pegawai` VALUES ('96.11.03', 'Rihatmoko Ir. ', '1972-12-06', '1996-11-25', 'S1', 'Tetap', '17', '150', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah III DKI Jakarta', 'Kepala Wilayah III DKI Jakarta');
INSERT INTO `pegawai` VALUES ('95.03.13 ', 'Bambang Wahyu W. Ir. ', '1968-09-13', '1995-03-13', 'S1', 'Tetap', '17', '318', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah III DKI Jakarta', 'Tenaga Ahli ');
INSERT INTO `pegawai` VALUES ('89.10.79 ', 'Hendra Gunawan, BA', '1962-07-19', '1989-10-01', 'D3', 'Tetap', '17', '121', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah III DKI Jakarta', 'Kabag. Keuangan & Umum Wilayah III DKI Jakarta');
INSERT INTO `pegawai` VALUES ('08.04.03', 'Angga Permata, ST.', '1985-08-26', '2008-04-04', 'S1', 'Tetap', '17', '126', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah III DKI Jakarta', 'Kabag. Operasi Wilayah III DKI Jakarta');
INSERT INTO `pegawai` VALUES ('81.07.14 ', 'Alamsyah Tarmizi', '1962-09-21', '1981-07-01', 'SMA/SMK', 'Tetap', '17', '138', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah III DKI Jakarta', 'Kasir. 1');
INSERT INTO `pegawai` VALUES ('06.05.04', 'Lukito Hadi Ir.', '1961-08-11', '2006-05-01', 'S1', 'Tetap', '17', '311', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah III DKI Jakarta', 'TA. Sipil');
INSERT INTO `pegawai` VALUES ('030922', 'Abdul Ghofar, ST.', '1977-09-27', '2003-09-15', 'S1', 'Tetap', '17', '307', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah III DKI Jakarta', 'TA. Mekanikal');
INSERT INTO `pegawai` VALUES ('06.10.02', 'Diana Marisi M, ST.', '1979-10-07', '2006-10-01', 'S1', 'Tetap', '17', '311', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah III DKI Jakarta', 'TA. Sipil');
INSERT INTO `pegawai` VALUES ('07.12.01', 'Dyah Ayu Pithaloka, ST.', '1984-06-21', '2007-12-01', 'S1', 'Tetap', '17', '299', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah III DKI Jakarta', 'TA. Arsitektur');
INSERT INTO `pegawai` VALUES ('92.02.14 ', 'Husni Al Huda Ir. ', '1964-06-20', '1992-02-01', 'S1', 'Tetap', '17', '308', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah III DKI Jakarta', 'TA. Mesin');
INSERT INTO `pegawai` VALUES ('84.09.53 ', 'M. Nur Sahadat', '1962-12-19', '1984-09-01', 'SMA/SMK', 'Tetap', '17', '79', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah III DKI Jakarta', 'Ass. Tenaga Ahli');
INSERT INTO `pegawai` VALUES ('84.01.05 ', 'Mangsud Suhadi, ST', '1962-09-24', '1984-01-11', 'S1', 'Tetap', '17', '318', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah III DKI Jakarta', 'Tenaga Ahli');
INSERT INTO `pegawai` VALUES ('84.08.48 ', 'Jauhari', '1963-03-03', '1984-08-01', 'SMA/SMK', 'Tetap', '17', '185', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah III DKI Jakarta', 'Pengatur');
INSERT INTO `pegawai` VALUES ('14.09.06', 'Albert Herriza, ST.', '1983-04-21', '2006-08-01', 'S1', 'Tetap', '17', '309', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah III DKI Jakarta', 'TA. Muda');
INSERT INTO `pegawai` VALUES ('14.09.07', 'Adril Fauza, ST.', '1982-08-16', '2008-02-15', 'S1', 'Tetap', '17', '301', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah III DKI Jakarta', 'TA. Elektrikal');
INSERT INTO `pegawai` VALUES ('99.09.16', 'Beni Fauzi', '1971-07-21', '1999-09-06', 'SMA/SMK', 'Tetap', '17', '199', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah III DKI Jakarta', 'Pengemudi');
INSERT INTO `pegawai` VALUES ('17.06.10', 'Kurniawan', '1979-05-04', '1999-02-01', 'SMA/SMK', 'Tetap', '17', '255', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah III DKI Jakarta', 'Staf Pemasaran');
INSERT INTO `pegawai` VALUES ('01.08.25', 'Edwyn Tresnanugraha, ST', '1971-07-08', '2001-08-20', 'S1', 'Tetap', '18', '217', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah IV Medan', 'Pj. Kepala Wilayah IV Medan');
INSERT INTO `pegawai` VALUES ('14.09.12', 'Eko Budi Satria, ST.', '1979-08-01', '2002-03-14', 'S1', 'Tetap', '18', '132', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah IV Medan', 'Kabag. Pemasaran Wilayah IV Medan');
INSERT INTO `pegawai` VALUES ('02.06.01', 'Syamsul Ir. ', '1965-07-11', '2002-06-01', 'S1', 'Tetap', '18', '337', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah IV Medan', 'Tenaga Ahli Wilayah IV');
INSERT INTO `pegawai` VALUES ('00.06.01 ', 'Tri Erni Rahayu', '1978-03-31', '2000-06-01', 'D3', 'Tetap', '18', '233', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah IV Medan', 'SA. Muda');
INSERT INTO `pegawai` VALUES ('02.09.10', 'Yogananda Ir. ', '1965-08-23', '2002-02-01', 'S1', 'Tetap', '18', '318', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah IV Medan', 'Tenaga Ahli');
INSERT INTO `pegawai` VALUES ('14.09.05', 'Sugeng Riyadi, ST.', '1987-06-01', '2010-01-01', 'S1', 'Tetap', '19', '152', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah V Palembang', 'Kepala Wilayah V Palembang');
INSERT INTO `pegawai` VALUES ('08.03.04', 'Ria Taurina Dewayani, ST. MM.', '1985-05-13', '2008-03-13', 'S2', 'Tetap', '19', '127', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah V Palembang', 'Kabag. Operasi Wilayah V Palembang');
INSERT INTO `pegawai` VALUES ('02.02.12', 'Erawati, S.Komp', '1976-09-07', '2000-02-01', 'S1', 'Tetap', '19', '122', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah V Palembang', 'Kabag. Keuangan & Umum Wilayah V Palembang');
INSERT INTO `pegawai` VALUES ('17.06.06', 'Ryan Hidayat, ST.', '1985-07-23', '2010-07-05', 'S1', 'Tetap', '19', '207', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah V Palembang', 'Pj. Kabag. Pemasaran Wilayah - V');
INSERT INTO `pegawai` VALUES ('10.01.02', 'Akbar Nur Agung, ST, M.MTr', '1985-12-01', '2010-01-05', 'S2', 'Tetap', '20', '151', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah VI Samarinda', 'Kepala Wilayah IV Samarinda');
INSERT INTO `pegawai` VALUES ('15.08.10', 'Edwin Dwiputra, ST.', '1989-06-15', '2013-01-01', 'S1', 'Tetap', '20', '133', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah VI Samarinda', 'Kabag. Pemasaran Wilayah VI Samarinda');
INSERT INTO `pegawai` VALUES ('15.08.11', 'Wahyudi Basri,ST', '1981-05-28', '2008-01-01', 'S1', 'Tetap', '20', '205', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah VI Samarinda', 'Pj. Kabag. Operasi Wilayah VI Samarinda');
INSERT INTO `pegawai` VALUES ('92.06.01', 'Muhamad Richul Drs. ', '1965-09-23', '1992-06-01', 'S1', 'Tetap', '21', '153', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah VII Jayapura', 'Kepala Wilayah VII Jayapura');
INSERT INTO `pegawai` VALUES ('88.09.00 ', 'Fitria Asirie, AMD', '1964-12-24', '1988-09-01', 'D3', 'Tetap', '21', '115', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah VII Jayapura', 'Kabag Pemasaran Wilayah VII Jayapura');
INSERT INTO `pegawai` VALUES ('15.08.03', 'M. Sahrul Ichsan Y.,ST', '1988-01-20', '2013-06-01', 'S1', 'Tetap', '21', '128', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Wilayah VII Jayapura', 'Kabag. Operasi Wilayah VII Jayapura');
INSERT INTO `pegawai` VALUES ('89.09.76 ', 'Eko Handoyo CP, Ir. ', '1963-10-26', '1989-09-25', 'S1', 'Tetap', '22', '303', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Yodya Karya', 'TA. Expert');
INSERT INTO `pegawai` VALUES ('15.08.04', 'Danang Widodo, ST', '1982-03-13', '2011-08-12', 'S1', 'Tetap', '23', '318', null, null, '2017-10-29 08:29:48', 'Eko Putra', 'User', 'Yodya Office Tower', 'Tenaga Ahli');
INSERT INTO `pegawai` VALUES ('99.99.99', 'Eko Putra', '1982-03-13', '2011-08-12', 'S1', 'Tetap', '23', '318', 'Eko Putra', 'ekooke', '2017-10-29 08:29:48', 'Eko Putra', 'Admin', 'Yodya Office Tower', 'Tenaga Ahli');
INSERT INTO `pegawai1` VALUES ('041117', 'RAHMAN HADI, ST', '1976-03-26', '2004-11-09', '1', 'TETAP', '1', '111', 'RAHMAN', '123456', '2017-10-19 00:00:00', 'admin', 'User');
INSERT INTO `pegawai1` VALUES ('123456', 'GALIH JULIANTO PURNOMO', '1991-07-01', '2017-10-21', 'S1', 'Tetap', '2', '7', 'GALIH', '987654', '2017-10-20 10:41:01', null, 'User');
INSERT INTO `pegawai1` VALUES ('545676', 'AYOS', '1991-08-28', '2017-10-12', 'D3', 'Tetap', '7', '106', 'AYOS', 'TES', '2017-10-20 10:49:09', null, 'User');
INSERT INTO `pegawai1` VALUES ('65432', 'YUTRE', '1990-08-12', '2017-08-17', 'D4', 'Tetap', '15', '107', 'RTERT', 'ERRETER', '2017-10-20 10:50:58', null, 'User');
INSERT INTO `pegawai1` VALUES ('9876571', 'TES', '1990-07-02', '2017-10-23', 'S1', 'Kontrak', '7', '15', 'COBA', '1', '2017-10-21 04:29:38', 'RAHMAN', 'User');
INSERT INTO `pegawai1` VALUES ('456456', 'trtyryr', '2017-10-03', '2017-10-12', 'D3', 'Tetap', '9', '17', 'hgjh', '65765', '2017-10-21 04:41:23', 'RAHMAN', 'User');
INSERT INTO `pegawai1` VALUES ('8789', 'uytuyinm', '2017-10-03', '2017-10-12', 'D3', 'Tetap', '9', '17', 'oiuoi', '65765', '2017-10-21 04:42:55', 'RAHMAN', 'User');
INSERT INTO `pegawai1` VALUES ('7654376', 'MUFIDA NUR ISNAINIA', '1990-03-03', '2007-10-29', 'D3', 'Kontrak', '16', '107', 'MUFIDA', '123456', '2007-10-29 08:49:35', 'RAHMAN', 'User');
INSERT INTO `pegawai1` VALUES ('1', 'TES2', '1990-04-05', '2007-10-22', 'D4', 'Kontrak', '12', '110', 'TES2', '1', '2007-10-29 08:50:58', 'RAHMAN', 'User');
INSERT INTO `pegawai1` VALUES ('98765', 'TES LAGI', '1985-10-10', '2017-09-01', 'S1', 'Kontrak', '5', '106', 'TESLAGI', '1', '2007-10-29 08:52:17', 'RAHMAN', 'User');
INSERT INTO `pegawai1` VALUES ('55555', 'eyruyewry', '1991-09-23', '2017-10-09', 'D3', 'Tetap', '11', '108', 'tes', 'tes', '2007-10-29 08:58:08', 'RAHMAN', 'User');
INSERT INTO `pegawai1` VALUES ('999999', 'EKO PUTRANTO', '2017-10-23', '2017-10-23', 'S1', 'Tetap', '1', '111', 'EKO PUTRA', 'EKOKOEOKE', '2017-10-23 02:20:34', 'RAHMAN', 'Admin');
INSERT INTO `stdknowhow` VALUES ('1', 'Adm', '3', '2', '3', '4', '5', '0', '1', '2', '3', '4', '5', '0', '1', '2', '3', '4', '5', '0', '1', '2', '3', '4', '5', '0', '1', '2', '2017-10-25 05:40:01', 'EKO PUTRA', '1');
INSERT INTO `stdknowhow` VALUES ('3', 'Adm Proyek', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2017-10-25 05:53:09', 'EKO PUTRA', '2');
INSERT INTO `stdknowhow` VALUES ('2', 'Adm IMB', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2017-10-25 05:56:49', 'EKO PUTRA', '3');
INSERT INTO `stdmanagerial` VALUES ('1', 'Adm', '2', '1', '3', '5', '1', '2', '4', '1', '2', '3', '1', '4', '5', '2', '3', '1', '4', '4', '2', '3', '5', '1', '2', '2017-10-27 07:28:47', 'EKO PUTRA', '4');
INSERT INTO `strukturjab` VALUES ('1', '4', '2007-10-29 06:07:30', 'RAHMAN');
INSERT INTO `strukturjab` VALUES ('1', '2', '2007-10-29 06:07:22', 'RAHMAN');
INSERT INTO `strukturjab` VALUES ('1', '3', '2007-10-29 06:07:27', 'RAHMAN');
INSERT INTO `strukturjab` VALUES ('6', '7', '2007-10-29 06:07:37', 'RAHMAN');
INSERT INTO `strukturjab` VALUES ('1', '5', '2017-11-07 06:16:44', 'Eko Putra');
INSERT INTO `strukturjab` VALUES ('134', '307', '2017-11-07 06:16:44', 'Eko Putra');
INSERT INTO `strukturjab` VALUES ('114', '149', '2017-11-12 03:48:01', 'Eko Putra');
INSERT INTO `tampung` VALUES ('TS-SD', '0', 'Technical Skill System Development', null, null, null, null, null, null, null, null, null, '24', '0', '0', null, null, 'Eko Putra', null, null, null, null, null, '0', null, '0', '0', null, null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8130917', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tampung` VALUES ('TS-IA', '1', 'Technical Skill Internal Audit', null, null, null, null, null, null, null, null, null, '25', '0', '0', null, null, 'Eko Putra', null, null, null, null, null, '0', null, '0', '0', null, null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8130918', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tampung` VALUES ('TS-TOP', '2', 'Technical Skill Top Management', null, null, null, null, null, null, null, null, null, '26', '0', '0', null, null, 'Eko Putra', null, null, null, null, null, '0', null, '0', '0', null, null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8130919', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tampung` VALUES ('TS-ENG-ELEC', '3', 'Technical Skill Engineering Electrical', null, null, null, null, null, null, null, null, null, '21', '0', '0', null, null, 'Eko Putra', null, null, null, null, null, '0', null, '0', '0', null, null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8130914', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tampung` VALUES ('TS-ENG-INST', '4', 'Technical Skill Engineering Instrumentation', null, null, null, null, null, null, null, null, null, '22', '0', '0', null, null, 'Eko Putra', null, null, null, null, null, '0', null, '0', '0', null, null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8130915', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tampung` VALUES ('TS-ENG-CIV', '5', 'Technical Skill Engineering Civil Structure', null, null, null, null, null, null, null, null, null, '23', '0', '0', null, null, 'Eko Putra', null, null, null, null, null, '0', null, '0', '0', null, null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8130916', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tampung` VALUES ('TS-ENG-MECH', '2', 'Technical Skill Engineering Mechanical', null, null, null, null, null, null, null, null, null, '20', '0', '0', null, null, 'Eko Putra', null, null, null, null, null, '0', null, '0', '0', null, null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8130913', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tampung` VALUES ('TS-MR', '1', 'Technical Skill Manajemen Representative', null, null, null, null, null, null, null, null, null, '19', '0', '0', null, null, 'Eko Putra', null, null, null, null, null, '0', null, '0', '0', null, null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8130912', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tampung` VALUES ('TS-HSE', '3', 'Technical Skill HEALTH SAFETY & ENVIRONMENT/OHSAS/K3', null, null, null, null, null, null, null, null, null, '15', '0', '0', null, null, 'Eko Putra', null, null, null, null, null, '0', null, '0', '0', null, null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8130908', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tampung` VALUES ('TS-HRD', '4', 'Technical Skill HRD', null, null, null, null, null, null, null, null, null, '16', '0', '0', null, null, 'Eko Putra', null, null, null, null, null, '0', null, '0', '0', null, null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8130909', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tampung` VALUES ('TS-GA', '5', 'Technical Skill GENERAL AFFAIRS', null, null, null, null, null, null, null, null, null, '17', '0', '0', null, null, 'Eko Putra', null, null, null, null, null, '0', null, '0', '0', null, null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8130910', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tampung` VALUES ('TS-MD', '0', 'Technical Skill Manajement Development', null, null, null, null, null, null, null, null, null, '18', '0', '0', null, null, 'Eko Putra', null, null, null, null, null, '0', null, '0', '0', null, null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8130911', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tampung` VALUES ('TS-FAT', '2', 'Technical Skill Finance,Accounting and Tax', null, null, null, null, null, null, null, null, null, '14', '0', '0', null, null, 'Eko Putra', null, null, null, null, null, '0', null, '0', '0', null, null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8130907', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tampung` VALUES ('TS-CS', '0', 'Technical Skill Coorporate Secretary', null, null, null, null, null, null, null, null, null, '12', '0', '0', null, null, 'Eko Putra', null, null, null, null, null, '0', null, '0', '0', null, null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8130905', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tampung` VALUES ('TS-PENG', '1', 'Technical Skill Pengadaan', null, null, null, null, null, null, null, null, null, '13', '0', '0', null, null, 'Eko Putra', null, null, null, null, null, '0', null, '0', '0', null, null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8130906', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tampung` VALUES ('TS-MAN', '4', 'Technical Skill Maintenance Elektrikal,Instrument,IT,Mekanikal,Utility', null, null, null, null, null, null, null, null, null, '10', '0', '0', null, null, 'Eko Putra', null, null, null, null, null, '0', null, '0', '0', null, null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8130903', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tampung` VALUES ('TS-SAR', '5', 'Technical Skill Sarana Angkutan', null, null, null, null, null, null, null, null, null, '11', '0', '0', null, null, 'Eko Putra', null, null, null, null, null, '0', null, '0', '0', null, null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8130904', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tampung` VALUES ('TS-QAC', '3', 'Technical Skill QA/QC', null, null, null, null, null, null, null, null, null, '9', '0', '0', null, null, 'Eko Putra', null, null, null, null, null, '0', null, '0', '0', null, null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8130902', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tampung` VALUES ('TS-PPC', '1', 'Technical Skill Planning & Control', null, null, null, null, null, null, null, null, null, '7', '0', '0', null, null, 'Eko Putra', null, null, null, null, null, '0', null, '0', '0', null, null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8130900', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tampung` VALUES ('TS-CON', '2', 'Technical Skill Construction', null, null, null, null, null, null, null, null, null, '8', '0', '0', null, null, 'Eko Putra', null, null, null, null, null, '0', null, '0', '0', null, null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8130901', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tampung` VALUES ('TS-EST', '0', 'Technical Skill Estimation', null, null, null, null, null, null, null, null, null, '6', '0', '0', null, null, 'Eko Putra', null, null, null, null, null, '0', null, '0', '0', null, null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8130899', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tampung` VALUES ('TS-MKT', '5', 'Technical Skill Marketing', null, null, null, null, null, null, null, null, null, '5', '0', '0', null, null, 'Eko Putra', null, null, null, null, null, '0', null, '0', '0', null, null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8130898', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tampung` VALUES ('EX', '3', 'Experience', null, null, null, null, null, null, null, null, null, '3', '0', '0', null, null, 'Eko Putra', null, null, null, null, null, '0', null, '0', '0', null, null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8130896', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tampung` VALUES ('BS', '4', 'Business Skill', null, null, null, null, null, null, null, null, null, '4', '0', '0', null, null, 'Eko Putra', null, null, null, null, null, '0', null, '0', '0', null, null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8130897', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tampung` VALUES ('IE', '2', 'Informal Education', null, null, null, null, null, null, null, null, null, '2', '0', '0', null, null, 'Eko Putra', null, null, null, null, null, '0', null, '0', '0', null, null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8130895', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tampung` VALUES ('FE', '3', 'Formal Education', null, null, null, null, null, null, null, null, null, '1', '0', '0', null, null, 'Eko Putra', null, null, null, null, null, '0', null, '0', '0', null, null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '8130894', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tampung2` VALUES ('TS-IA', 'X', '', '', '', '', 'yellow', 'Technical Skill Internal Audit', null, null, null, null, '25', null, null, null, null, 'Eko Putra', null, null, null, null, null, null, null, null, null, null, '364013');
INSERT INTO `tampung2` VALUES ('TS-TOP', '', 'X', '', '', '', 'yellow', 'Technical Skill Top Management', null, null, null, null, '26', null, null, null, null, 'Eko Putra', null, null, null, null, null, null, null, null, null, null, '364014');
INSERT INTO `tampung2` VALUES ('TS-ENG-CIV', '', '', '', '', 'X', 'yellow', 'Technical Skill Engineering Civil Structure', null, null, null, null, '23', null, null, null, null, 'Eko Putra', null, null, null, null, null, null, null, null, null, null, '364011');
INSERT INTO `tampung2` VALUES ('TS-SD', '', '', '', '', '', 'yellow', 'Technical Skill System Development', null, null, null, null, '24', null, null, null, null, 'Eko Putra', null, null, null, null, null, null, null, null, null, null, '364012');
INSERT INTO `tampung2` VALUES ('TS-ENG-MECH', '', 'X', '', '', '', 'yellow', 'Technical Skill Engineering Mechanical', null, null, null, null, '20', null, null, null, null, 'Eko Putra', null, null, null, null, null, null, null, null, null, null, '364008');
INSERT INTO `tampung2` VALUES ('TS-ENG-ELEC', '', '', 'X', '', '', 'yellow', 'Technical Skill Engineering Electrical', null, null, null, null, '21', null, null, null, null, 'Eko Putra', null, null, null, null, null, null, null, null, null, null, '364009');
INSERT INTO `tampung2` VALUES ('TS-ENG-INST', '', '', '', 'X', '', 'yellow', 'Technical Skill Engineering Instrumentation', null, null, null, null, '22', null, null, null, null, 'Eko Putra', null, null, null, null, null, null, null, null, null, null, '364010');
INSERT INTO `tampung2` VALUES ('TS-MD', '', '', '', '', '', 'yellow', 'Technical Skill Manajement Development', null, null, null, null, '18', null, null, null, null, 'Eko Putra', null, null, null, null, null, null, null, null, null, null, '364006');
INSERT INTO `tampung2` VALUES ('TS-MR', 'X', '', '', '', '', 'yellow', 'Technical Skill Manajemen Representative', null, null, null, null, '19', null, null, null, null, 'Eko Putra', null, null, null, null, null, null, null, null, null, null, '364007');
INSERT INTO `tampung2` VALUES ('TS-HRD', '', '', '', 'X', '', 'yellow', 'Technical Skill HRD', null, null, null, null, '16', null, null, null, null, 'Eko Putra', null, null, null, null, null, null, null, null, null, null, '364004');
INSERT INTO `tampung2` VALUES ('TS-GA', '', '', '', '', 'X', 'yellow', 'Technical Skill GENERAL AFFAIRS', null, null, null, null, '17', null, null, null, null, 'Eko Putra', null, null, null, null, null, null, null, null, null, null, '364005');
INSERT INTO `tampung2` VALUES ('TS-HSE', '', '', 'X', '', '', 'yellow', 'Technical Skill HEALTH SAFETY & ENVIRONMENT/OHSAS/K3', null, null, null, null, '15', null, null, null, null, 'Eko Putra', null, null, null, null, null, null, null, null, null, null, '364003');
INSERT INTO `tampung2` VALUES ('TS-FAT', '', 'X', '', '', '', 'yellow', 'Technical Skill Finance,Accounting and Tax', null, null, null, null, '14', null, null, null, null, 'Eko Putra', null, null, null, null, null, null, null, null, null, null, '364002');
INSERT INTO `tampung2` VALUES ('TS-CS', '', '', '', '', '', 'yellow', 'Technical Skill Coorporate Secretary', null, null, null, null, '12', null, null, null, null, 'Eko Putra', null, null, null, null, null, null, null, null, null, null, '364000');
INSERT INTO `tampung2` VALUES ('TS-PENG', 'X', '', '', '', '', 'yellow', 'Technical Skill Pengadaan', null, null, null, null, '13', null, null, null, null, 'Eko Putra', null, null, null, null, null, null, null, null, null, null, '364001');
INSERT INTO `tampung2` VALUES ('TS-MAN', '', '', '', 'X', '', 'yellow', 'Technical Skill Maintenance Elektrikal,Instrument,IT,Mekanikal,Utility', null, null, null, null, '10', null, null, null, null, 'Eko Putra', null, null, null, null, null, null, null, null, null, null, '363998');
INSERT INTO `tampung2` VALUES ('TS-SAR', '', '', '', '', 'X', 'yellow', 'Technical Skill Sarana Angkutan', null, null, null, null, '11', null, null, null, null, 'Eko Putra', null, null, null, null, null, null, null, null, null, null, '363999');
INSERT INTO `tampung2` VALUES ('TS-QAC', '', '', 'X', '', '', 'yellow', 'Technical Skill QA/QC', null, null, null, null, '9', null, null, null, null, 'Eko Putra', null, null, null, null, null, null, null, null, null, null, '363997');
INSERT INTO `tampung2` VALUES ('TS-PPC', 'X', '', '', '', '', 'yellow', 'Technical Skill Planning & Control', null, null, null, null, '7', null, null, null, null, 'Eko Putra', null, null, null, null, null, null, null, null, null, null, '363995');
INSERT INTO `tampung2` VALUES ('TS-CON', '', 'X', '', '', '', 'yellow', 'Technical Skill Construction', null, null, null, null, '8', null, null, null, null, 'Eko Putra', null, null, null, null, null, null, null, null, null, null, '363996');
INSERT INTO `tampung2` VALUES ('TS-EST', '', '', '', '', '', 'yellow', 'Technical Skill Estimation', null, null, null, null, '6', null, null, null, null, 'Eko Putra', null, null, null, null, null, null, null, null, null, null, '363994');
INSERT INTO `tampung2` VALUES ('TS-MKT', '', '', '', '', 'X', 'yellow', 'Technical Skill Marketing', null, null, null, null, '5', null, null, null, null, 'Eko Putra', null, null, null, null, null, null, null, null, null, null, '363993');
INSERT INTO `tampung2` VALUES ('EX', '', '', 'X', '', '', 'yellow', 'Experience', null, null, null, null, '3', null, null, null, null, 'Eko Putra', null, null, null, null, null, null, null, null, null, null, '363991');
INSERT INTO `tampung2` VALUES ('BS', '', '', '', 'X', '', 'yellow', 'Business Skill', null, null, null, null, '4', null, null, null, null, 'Eko Putra', null, null, null, null, null, null, null, null, null, null, '363992');
INSERT INTO `tampung2` VALUES ('IE', '', 'X', '', '', '', 'yellow', 'Informal Education', null, null, null, null, '2', null, null, null, null, 'Eko Putra', null, null, null, null, null, null, null, null, null, null, '363990');
INSERT INTO `tampung2` VALUES ('FE', '', '', 'X', '', '', 'yellow', 'Formal Education', null, null, null, null, '1', null, null, null, null, 'Eko Putra', null, null, null, null, null, null, null, null, null, null, '363989');
INSERT INTO `unit` VALUES ('1', 'Biro Human Capital & Manajemen Mutu', 'Admin', '2017-10-30 00:00:00');
INSERT INTO `unit` VALUES ('2', 'Biro Keuangan & Akuntansi', 'Admin', '2017-10-30 00:00:00');
INSERT INTO `unit` VALUES ('3', 'Biro Operasi', 'Admin', '2017-10-30 00:00:00');
INSERT INTO `unit` VALUES ('4', 'Biro Pemasaran', 'Admin', '2017-10-30 00:00:00');
INSERT INTO `unit` VALUES ('5', 'Cabang Bandung', 'Admin', '2017-10-30 00:00:00');
INSERT INTO `unit` VALUES ('6', 'Cabang Jambi', 'Admin', '2017-10-30 00:00:00');
INSERT INTO `unit` VALUES ('7', 'Cabang Kendari', 'Admin', '2017-10-30 00:00:00');
INSERT INTO `unit` VALUES ('8', 'Cabang Pekanbaru', 'Admin', '2017-10-30 00:00:00');
INSERT INTO `unit` VALUES ('9', 'Cabang Surabaya', 'Admin', '2017-10-30 00:00:00');
INSERT INTO `unit` VALUES ('10', 'Divisi Bangunan', 'Admin', '2017-10-30 00:00:00');
INSERT INTO `unit` VALUES ('11', 'Divisi Infrastruktur', 'Admin', '2017-10-30 00:00:00');
INSERT INTO `unit` VALUES ('12', 'Pengembangan Aset', 'Admin', '2017-10-30 00:00:00');
INSERT INTO `unit` VALUES ('13', 'Satuan Pengawasan Intern', 'Admin', '2017-10-30 00:00:00');
INSERT INTO `unit` VALUES ('14', 'Sekretaris Perusahaan', 'Admin', '2017-10-30 00:00:00');
INSERT INTO `unit` VALUES ('15', 'Wilayah I Semarang', 'Admin', '2017-10-30 00:00:00');
INSERT INTO `unit` VALUES ('16', 'Wilayah II Makassar', 'Admin', '2017-10-30 00:00:00');
INSERT INTO `unit` VALUES ('17', 'Wilayah III DKI Jakarta', 'Admin', '2017-10-30 00:00:00');
INSERT INTO `unit` VALUES ('18', 'Wilayah IV Medan', 'Admin', '2017-10-30 00:00:00');
INSERT INTO `unit` VALUES ('19', 'Wilayah V Palembang', 'Admin', '2017-10-30 00:00:00');
INSERT INTO `unit` VALUES ('20', 'Wilayah VI Samarinda', 'Admin', '2017-10-30 00:00:00');
INSERT INTO `unit` VALUES ('21', 'Wilayah VII Jayapura', 'Admin', '2017-10-30 00:00:00');
INSERT INTO `unit` VALUES ('22', 'Yodya Karya', 'Admin', '2017-10-30 00:00:00');
INSERT INTO `unit` VALUES ('23', 'Yodya Office Tower', 'Admin', '2017-10-30 00:00:00');
