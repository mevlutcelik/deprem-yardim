-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 08 Şub 2023, 13:26:10
-- Sunucu sürümü: 8.0.27
-- PHP Sürümü: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `deprem_yardim`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yardim_cagrisi`
--

DROP TABLE IF EXISTS `yardim_cagrisi`;
CREATE TABLE IF NOT EXISTS `yardim_cagrisi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `time` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `date_mc` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `user_name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `user_surname` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `ip_address` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `yardim_cagrisi`
--

INSERT INTO `yardim_cagrisi` (`id`, `time`, `date_mc`, `user_name`, `user_surname`, `address`, `ip_address`) VALUES
(1, '1675861967', '08.02.2023 16:12:47', 'deneme', 'aksdjsalkd', 'askldjaslkdjsadklasd', '::1'),
(2, '1675862075', '08.02.2023 16:14:35', 'sdhkjaskjh', 'kjasdhkajdhaskj', '64\r\na65sd4as65d', '::1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
