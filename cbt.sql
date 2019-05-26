-- --------------------------------------------------------
-- Host:                         localhost
-- Versi server:                 5.7.19 - MySQL Community Server (GPL)
-- OS Server:                    Win64
-- HeidiSQL Versi:               9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- membuang struktur untuk table cbt.answer
CREATE TABLE IF NOT EXISTS `answer` (
  `AnswerID` int(11) NOT NULL AUTO_INCREMENT,
  `StudentID` int(11) DEFAULT NULL,
  `QuestionID` int(11) DEFAULT NULL,
  `Answer` text,
  `Uncertain` smallint(1) DEFAULT '0',
  PRIMARY KEY (`AnswerID`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel cbt.answer: ~3 rows (lebih kurang)
DELETE FROM `answer`;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` (`AnswerID`, `StudentID`, `QuestionID`, `Answer`, `Uncertain`) VALUES
	(17, 1, 1, 'C', 1),
	(23, 1, 35, 'C', 0),
	(24, 1, 3, 'B', 1),
	(29, 1, 4, NULL, 0);
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;

-- membuang struktur untuk table cbt.class
CREATE TABLE IF NOT EXISTS `class` (
  `ClassID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` varchar(3) DEFAULT NULL,
  `MajorID` int(255) DEFAULT NULL,
  PRIMARY KEY (`ClassID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel cbt.class: ~0 rows (lebih kurang)
DELETE FROM `class`;
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT INTO `class` (`ClassID`, `ClassName`, `MajorID`) VALUES
	(1, 'X', 1);
/*!40000 ALTER TABLE `class` ENABLE KEYS */;

-- membuang struktur untuk table cbt.file
CREATE TABLE IF NOT EXISTS `file` (
  `FileID` int(11) NOT NULL AUTO_INCREMENT,
  `TestID` int(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Type` varchar(20) DEFAULT NULL,
  `Path` varchar(200) DEFAULT NULL,
  `For` varchar(50) DEFAULT NULL,
  `CreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`FileID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel cbt.file: ~0 rows (lebih kurang)
DELETE FROM `file`;
/*!40000 ALTER TABLE `file` DISABLE KEYS */;
/*!40000 ALTER TABLE `file` ENABLE KEYS */;

-- membuang struktur untuk table cbt.identity
CREATE TABLE IF NOT EXISTS `identity` (
  `IdentityID` int(11) NOT NULL AUTO_INCREMENT,
  `School` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `Level` varchar(3) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `IP` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Address` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Phone` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Fax` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Email` varchar(150) NOT NULL DEFAULT '',
  `Web` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Logo` varchar(200) NOT NULL DEFAULT '',
  `Banner` varchar(200) NOT NULL DEFAULT '',
  `Headmaster` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `SchoolCode` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`IdentityID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel cbt.identity: ~0 rows (lebih kurang)
DELETE FROM `identity`;
/*!40000 ALTER TABLE `identity` DISABLE KEYS */;
INSERT INTO `identity` (`IdentityID`, `School`, `Level`, `IP`, `Address`, `Phone`, `Fax`, `Email`, `Web`, `Logo`, `Banner`, `Headmaster`, `SchoolCode`) VALUES
	(1, 'CBT Tester', 'SMK', '127.0.0.1', 'Jl. JCC Komplek PLN P2B & TJBB', '083891290067', '-', 'rzfhlvi@gmail.com', 'isgone.hol.es', 'tut.jpg', 'tut.png', 'Danang Iswantoro, S.T.', 'B0192');
/*!40000 ALTER TABLE `identity` ENABLE KEYS */;

-- membuang struktur untuk table cbt.major
CREATE TABLE IF NOT EXISTS `major` (
  `MajorID` int(11) NOT NULL AUTO_INCREMENT,
  `MajorName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`MajorID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel cbt.major: ~0 rows (lebih kurang)
DELETE FROM `major`;
/*!40000 ALTER TABLE `major` DISABLE KEYS */;
INSERT INTO `major` (`MajorID`, `MajorName`) VALUES
	(1, 'Rekayasa Perankgat Lunak');
/*!40000 ALTER TABLE `major` ENABLE KEYS */;

-- membuang struktur untuk table cbt.package_question
CREATE TABLE IF NOT EXISTS `package_question` (
  `PackageID` int(11) NOT NULL AUTO_INCREMENT,
  `PackageName` varchar(200) DEFAULT NULL,
  `SubjectID` int(11) DEFAULT NULL,
  `AnswerCount` tinyint(3) DEFAULT NULL,
  `ClassID` int(11) DEFAULT NULL,
  `Random` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`PackageID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel cbt.package_question: ~0 rows (lebih kurang)
DELETE FROM `package_question`;
/*!40000 ALTER TABLE `package_question` DISABLE KEYS */;
INSERT INTO `package_question` (`PackageID`, `PackageName`, `SubjectID`, `AnswerCount`, `ClassID`, `Random`) VALUES
	(1, 'KKPI 2015', 1, 4, 1, 0);
/*!40000 ALTER TABLE `package_question` ENABLE KEYS */;

-- membuang struktur untuk table cbt.question
CREATE TABLE IF NOT EXISTS `question` (
  `QuestionID` int(11) NOT NULL AUTO_INCREMENT,
  `PackageID` int(11) DEFAULT NULL,
  `Question` text,
  `Type` tinyint(3) DEFAULT NULL,
  `A` text,
  `B` text,
  `C` text,
  `D` text,
  `E` text,
  `AnswerCode` varchar(1) DEFAULT NULL,
  `Random` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`QuestionID`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel cbt.question: ~7 rows (lebih kurang)
DELETE FROM `question`;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` (`QuestionID`, `PackageID`, `Question`, `Type`, `A`, `B`, `C`, `D`, `E`, `AnswerCode`, `Random`) VALUES
	(1, 1, 'Jika kau mencintai 2 orang diwaktu yang sama, pilihlah keduanya.<br>\r\nSebab..', 1, 'Tidak Tahu', 'Tanyakan pada pa domo', 'Jika kau benar-benar mencintai. kamu tidak akan jatuh cinta kepada yang  lain', 'Cinta mulu lu, kamar mandi noh sikatin..', '', 'D', 1),
	(3, 1, 'Siapakah nama sasya?', 1, 'Tidak Tahu', 'Tanyakan pada pa domo', 'Betul', 'Salah', NULL, 'D', 1),
	(4, 1, '"7"	"1"	"Siapakah nama sasya?"	"1"	"Tidak Tahu"	"Tanyakan pada pa domo"	"Betul"	"Salah"	\\N	"D"	"1"\r\n"4"	"1"	"Siapakah nama sasya?"	"1"	"Tidak Tahu"	"Tanyakan pada pa domo"	"Betul"	"Salah"	\\N	"D"	"1"\r\n', 1, 'Tidak Tahu', 'Tanyakan pada pa domo', 'Betul', 'Salah', NULL, 'D', 1),
	(5, 1, 'Jika kau mencintai 2 orang diwaktu yang sama, pilihlah keduanya.<br>\r\nSebab..', 1, 'Tidak Tahu', 'Tanyakan pada pa domo', 'Jika kau benar-benar mencintai. kamu tidak akan jatuh cinta kepada yang  lain', 'Cinta mulu lu, kamar mandi noh sikatin..', NULL, 'D', 1),
	(7, 1, 'Siapakah nama sasya?', 1, 'Tidak Tahu', 'Tanyakan pada pa domo', 'Betul', 'Salah', NULL, 'D', 1),
	(35, 1, '"7"	"1"	"Siapakah nama sasya?"	"1"	"Tidak Tahu"	"Tanyakan pada pa domo"	"Betul"	"Salah"	\\N	"D"	"1"\r\n', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;

-- membuang struktur untuk table cbt.student
CREATE TABLE IF NOT EXISTS `student` (
  `StudentID` int(11) NOT NULL AUTO_INCREMENT,
  `NIS` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Name` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `ClassID` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `BornCity` varchar(100) DEFAULT NULL,
  `Born` date DEFAULT NULL,
  `Gender` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Photos` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(150) NOT NULL DEFAULT '',
  `Login` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`StudentID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel cbt.student: ~0 rows (lebih kurang)
DELETE FROM `student`;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` (`StudentID`, `NIS`, `Name`, `ClassID`, `BornCity`, `Born`, `Gender`, `Photos`, `Username`, `Password`, `Login`) VALUES
	(1, '9999755740', 'Reza Fahlevi', '1', 'Jakarta', '1999-10-09', 'Laki-Laki', '', 'K020999', '755721*', NULL);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;

-- membuang struktur untuk table cbt.student_test
CREATE TABLE IF NOT EXISTS `student_test` (
  `StudentTestID` int(11) NOT NULL AUTO_INCREMENT,
  `StudentID` int(11) NOT NULL,
  `TestID` int(11) NOT NULL,
  `DateTest` date DEFAULT NULL,
  `StartTest` time DEFAULT NULL,
  `FinishTest` time DEFAULT NULL,
  `Remain` time DEFAULT NULL,
  `StudentIP` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`StudentTestID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel cbt.student_test: ~0 rows (lebih kurang)
DELETE FROM `student_test`;
/*!40000 ALTER TABLE `student_test` DISABLE KEYS */;
INSERT INTO `student_test` (`StudentTestID`, `StudentID`, `TestID`, `DateTest`, `StartTest`, `FinishTest`, `Remain`, `StudentIP`) VALUES
	(4, 1, 1, '2018-04-19', '15:44:43', NULL, '02:00:20', '::1');
/*!40000 ALTER TABLE `student_test` ENABLE KEYS */;

-- membuang struktur untuk table cbt.subject
CREATE TABLE IF NOT EXISTS `subject` (
  `SubjectID` int(11) NOT NULL AUTO_INCREMENT,
  `SubjectName` varchar(150) DEFAULT NULL,
  `KKM` tinyint(3) DEFAULT NULL,
  PRIMARY KEY (`SubjectID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel cbt.subject: ~0 rows (lebih kurang)
DELETE FROM `subject`;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` (`SubjectID`, `SubjectName`, `KKM`) VALUES
	(1, 'KKPI', 75);
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;

-- membuang struktur untuk table cbt.sysuser
CREATE TABLE IF NOT EXISTS `sysuser` (
  `SysuserID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(40) NOT NULL DEFAULT '',
  `Password` varchar(70) NOT NULL DEFAULT '',
  `NIP` varchar(30) NOT NULL,
  `Name` varchar(150) NOT NULL DEFAULT '',
  `Phone` varchar(20) NOT NULL,
  `Level` tinyint(1) DEFAULT NULL,
  `IsBlokir` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`SysuserID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel cbt.sysuser: ~2 rows (lebih kurang)
DELETE FROM `sysuser`;
/*!40000 ALTER TABLE `sysuser` DISABLE KEYS */;
INSERT INTO `sysuser` (`SysuserID`, `Username`, `Password`, `NIP`, `Name`, `Phone`, `Level`, `IsBlokir`) VALUES
	(1, 'aku', '7df608896379b8c59617b7eefdcbbcaa', '012832198371', 'Aku', '083891290067', 1, '0'),
	(2, 'kamu', '7df608896379b8c59617b7eefdcbbcaa', '012832198371', 'Kamu', '083891290067', 2, '0');
/*!40000 ALTER TABLE `sysuser` ENABLE KEYS */;

-- membuang struktur untuk table cbt.test
CREATE TABLE IF NOT EXISTS `test` (
  `TestID` int(11) NOT NULL AUTO_INCREMENT,
  `PackageID` int(11) DEFAULT NULL,
  `Date` date DEFAULT '0000-00-00',
  `StartTime` time DEFAULT '00:00:00',
  `Until` time DEFAULT NULL,
  `Duration` time DEFAULT NULL,
  `SysuserID` int(11) DEFAULT NULL,
  `Token` varchar(20) DEFAULT NULL,
  `Status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`TestID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel cbt.test: ~1 rows (lebih kurang)
DELETE FROM `test`;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
INSERT INTO `test` (`TestID`, `PackageID`, `Date`, `StartTime`, `Until`, `Duration`, `SysuserID`, `Token`, `Status`) VALUES
	(1, 1, '2018-05-30', '00:00:20', '24:15:10', '02:00:20', 1, 'KKLMM', 1);
/*!40000 ALTER TABLE `test` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
