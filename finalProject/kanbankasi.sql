-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 03 Ara 2022, 07:55:26
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kanbankasi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `donorler`
--

CREATE TABLE `donorler` (
  `id` int(10) NOT NULL,
  `kangrubuid` int(10) NOT NULL,
  `bagis` int(10) NOT NULL,
  `adsoyad` varchar(100) NOT NULL,
  `telefon` varchar(100) NOT NULL,
  `posta` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `donorler`
--

INSERT INTO `donorler` (`id`, `kangrubuid`, `bagis`, `adsoyad`, `telefon`, `posta`) VALUES
(1, 5, 2, 'ATIL RENÇBER', '05324900168', 'atilrencber@gmail.com'),
(2, 8, 5, 'TAHA AZAP', '05357221328', 'tahaazap@gmail.com'),
(3, 3, 3, 'MÜRSEL EMİNOĞLU', '05270724410', 'murseleminoglu@gmail.com'),
(4, 7, 12, 'ZAFER ÜZER', '05388191743', 'zaferuzer@gmail.com'),
(5, 3, 2, 'DENİZ CANAL', '05436549396', 'denizcanal@gmail.com'),
(6, 4, 4, 'SALİM AYAN', '05497489535', 'salimayan@gmail.com'),
(7, 6, 3, 'KEMAL KORUN', '05398104966', 'kemalkorun@gmail.com'),
(8, 7, 7, 'İNAN TÜRKOĞLU', '05327054963', 'inanturkoglu@gmail.com'),
(9, 3, 3, 'SERDAR BORA ALKAN', '05353798477', 'serdarboraalkan@gmail.com'),
(10, 1, 2, 'RANA İNCE', '05321859382', 'ranaince@gmail.com'),
(11, 8, 7, 'REYHAN MERCAN', '05414647545', 'reyhanmercan@gmail.com'),
(12, 1, 3, 'EMEL HACIOĞLU', '05393478882', 'emelhacioglu@gmail.com'),
(13, 2, 4, 'ALTAN EĞİLMEZ', '05549362370', 'altanegilmez@gmail.com'),
(14, 3, 8, 'AYKUT ÖZATEŞ', '05455549814', 'aykutozates@gmail.com'),
(15, 4, 10, 'ESİN SAĞIR', '05466428959', 'esinsagir@gmail.com'),
(16, 5, 1, 'NURAY ONUR', '05470582075', 'nurayonur@gmail.com'),
(17, 6, 4, 'AYLİN KASAP', '05379809861', 'aylinkasap@gmail.com'),
(18, 7, 5, 'AYDIN UĞUR', '05414763458', 'aydinugur@gmail.com'),
(19, 8, 7, 'ÖZDEN ÖZYÖRÜK', '05354297240', 'ozdenozyoruk@gmail.com'),
(20, 2, 2, 'BİRTAN BAĞDATLI', '05320184395', 'birtanbagdatli@gmail.com'),
(21, 6, 4, 'HÜSEYİN CAHİT', '05367451589', 'huseyincahit@gmail.com'),
(22, 5, 4, 'MURAT BALKAN', '05436182786', 'muratbalkan@gmail.com'),
(23, 3, 3, 'PROGRAMMER YAVUZ', '05359843412', 'yavuz@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kangruplari`
--

CREATE TABLE `kangruplari` (
  `id` int(10) NOT NULL,
  `kangrubuadi` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kangruplari`
--

INSERT INTO `kangruplari` (`id`, `kangrubuadi`) VALUES
(1, 'A+'),
(2, 'A−'),
(3, 'B+'),
(4, 'B−'),
(5, 'AB+'),
(6, 'AB−'),
(7, '0+'),
(8, '0-');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yoneticiler`
--

CREATE TABLE `yoneticiler` (
  `id` int(10) NOT NULL,
  `yoneticikodu` int(10) NOT NULL,
  `kullaniciadi` varchar(250) NOT NULL,
  `sifre` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yoneticiler`
--

INSERT INTO `yoneticiler` (`id`, `yoneticikodu`, `kullaniciadi`, `sifre`) VALUES
(1, 12345, 'yavuz', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 1234, 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `donorler`
--
ALTER TABLE `donorler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kangruplari`
--
ALTER TABLE `kangruplari`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yoneticiler`
--
ALTER TABLE `yoneticiler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `donorler`
--
ALTER TABLE `donorler`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Tablo için AUTO_INCREMENT değeri `kangruplari`
--
ALTER TABLE `kangruplari`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `yoneticiler`
--
ALTER TABLE `yoneticiler`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
