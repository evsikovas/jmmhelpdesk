-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               10.1.29-MariaDB - mariadb.org binary distribution
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных jetop
CREATE DATABASE IF NOT EXISTS `jetop` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `jetop`;

-- Дамп структуры для таблица jetop.inet
CREATE TABLE IF NOT EXISTS `inet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_id` varchar(255) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `tiket` varchar(15) DEFAULT NULL,
  `comment` text,
  `op_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы jetop.inet: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `inet` DISABLE KEYS */;
/*!40000 ALTER TABLE `inet` ENABLE KEYS */;

-- Дамп структуры для таблица jetop.oplist
CREATE TABLE IF NOT EXISTS `oplist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(7) DEFAULT NULL,
  `name` text,
  `phone` varchar(40) DEFAULT NULL,
  `ip` varchar(60) DEFAULT NULL,
  `port_i` int(5) DEFAULT NULL,
  `port_r` int(5) DEFAULT NULL,
  `port_v` int(5) DEFAULT NULL,
  `regions_id` int(11) DEFAULT NULL,
  `pass_router` varchar(255) DEFAULT NULL,
  `pass_reg` varchar(255) DEFAULT NULL,
  `po_reg` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `dogovor_pr` varchar(255) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `provider_phone` varchar(60) DEFAULT NULL,
  `mask` varchar(16) DEFAULT NULL,
  `gw` varchar(16) DEFAULT NULL,
  `dnsone` varchar(16) DEFAULT NULL,
  `dnstwo` varchar(16) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `speed` varchar(20) DEFAULT NULL,
  `lan` varchar(60) DEFAULT NULL,
  `nettools` varchar(128) DEFAULT NULL,
  `conset` varchar(255) DEFAULT NULL,
  `numbbe` varchar(18) DEFAULT NULL,
  `numbmeg` varchar(18) DEFAULT NULL,
  `modemgsm` varchar(128) DEFAULT NULL,
  `skypelogin` varchar(128) DEFAULT NULL,
  `skypepass` varchar(128) DEFAULT NULL,
  `commentop` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы jetop.oplist: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `oplist` DISABLE KEYS */;
/*!40000 ALTER TABLE `oplist` ENABLE KEYS */;

-- Дамп структуры для таблица jetop.ops
CREATE TABLE IF NOT EXISTS `ops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы jetop.ops: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `ops` DISABLE KEYS */;
/*!40000 ALTER TABLE `ops` ENABLE KEYS */;

-- Дамп структуры для таблица jetop.provider
CREATE TABLE IF NOT EXISTS `provider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `dogovor` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы jetop.provider: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `provider` DISABLE KEYS */;
/*!40000 ALTER TABLE `provider` ENABLE KEYS */;

-- Дамп структуры для таблица jetop.providerco
CREATE TABLE IF NOT EXISTS `providerco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `dest` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `dogovor` varchar(50) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `comment` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы jetop.providerco: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `providerco` DISABLE KEYS */;
/*!40000 ALTER TABLE `providerco` ENABLE KEYS */;

-- Дамп структуры для таблица jetop.region
CREATE TABLE IF NOT EXISTS `region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы jetop.region: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `region` DISABLE KEYS */;
/*!40000 ALTER TABLE `region` ENABLE KEYS */;

-- Дамп структуры для таблица jetop.regionals
CREATE TABLE IF NOT EXISTS `regionals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `phone` varchar(40) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_2` (`id`),
  KEY `id_3` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы jetop.regionals: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `regionals` DISABLE KEYS */;
/*!40000 ALTER TABLE `regionals` ENABLE KEYS */;

-- Дамп структуры для таблица jetop.score
CREATE TABLE IF NOT EXISTS `score` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` int(2) DEFAULT '0',
  `provider` varchar(200) DEFAULT '0',
  `dogovor` varchar(200) DEFAULT '0',
  `mesec` varchar(200) DEFAULT '0',
  `count` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы jetop.score: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `score` DISABLE KEYS */;
/*!40000 ALTER TABLE `score` ENABLE KEYS */;

-- Дамп структуры для таблица jetop.scoretype
CREATE TABLE IF NOT EXISTS `scoretype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы jetop.scoretype: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `scoretype` DISABLE KEYS */;
/*!40000 ALTER TABLE `scoretype` ENABLE KEYS */;

-- Дамп структуры для таблица jetop.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(32) DEFAULT NULL,
  `pass` varchar(32) DEFAULT NULL,
  `session` int(3) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы jetop.users: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Дамп структуры для таблица jetop.video
CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_id` varchar(255) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `tiket` int(9) DEFAULT NULL,
  `comment` text,
  `rm` varchar(255) DEFAULT NULL,
  `ops` varchar(255) DEFAULT NULL,
  `op_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы jetop.video: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
/*!40000 ALTER TABLE `video` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
