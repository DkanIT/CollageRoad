-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 03 Şub 2021, 01:42:34
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `apptwebsite`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `announcement`
--

CREATE TABLE `announcement` (
  `annid` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `adminnick` varchar(255) NOT NULL,
  `announcement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `announcement`
--

INSERT INTO `announcement` (`annid`, `date`, `adminnick`, `announcement`) VALUES
(26, '2020-12-27 14:50:31', 'dkan', ' Bahçe temizliği ve düzenlemesi yapılsın'),
(30, '2021-01-04 02:39:07', 'Dkan', '  Tüm apartman sakinleri kapı önelerindeki ayakkabılarını düzeltsin.'),
(31, '2021-01-06 12:46:49', 'dkan', '  asdasdasd');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dues`
--

CREATE TABLE `dues` (
  `id` int(20) NOT NULL,
  `billing_date` date NOT NULL DEFAULT current_timestamp(),
  `user_id` int(30) NOT NULL,
  `situation` int(1) NOT NULL DEFAULT 0,
  `payment_date` date DEFAULT NULL,
  `amount` double NOT NULL,
  `detail` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `dues`
--

INSERT INTO `dues` (`id`, `billing_date`, `user_id`, `situation`, `payment_date`, `amount`, `detail`) VALUES
(45, '2021-01-01', 156, 1, '2021-01-31', 100, 'Aidat'),
(46, '2021-01-01', 157, 1, '2021-01-31', 100, 'Aidat'),
(47, '2021-01-01', 158, 1, '2021-01-31', 100, 'Aidat'),
(48, '2021-02-01', 165, 1, '2021-01-31', 150, 'boya'),
(49, '2021-04-01', 165, 1, '2021-01-31', 250, 'boya'),
(50, '2021-04-01', 166, 1, '2021-01-31', 250, 'boya'),
(51, '2021-08-01', 165, 1, '2021-01-31', 100, 'asdasd'),
(52, '2021-08-01', 166, 1, '2021-01-31', 100, 'asdasd');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `expenses`
--

CREATE TABLE `expenses` (
  `expenseid` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `details` varchar(255) NOT NULL,
  `price` float(100,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `expenses`
--

INSERT INTO `expenses` (`expenseid`, `date`, `details`, `price`) VALUES
(19, 'CurrentBalance', 'User payments', 1150.00),
(41, 'UnpaidDepts', 'Expected Income', 0.00),
(45, 'February', 'boya asdasdasdasd', 1500.00);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `request`
--

CREATE TABLE `request` (
  `reqid` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `username` varchar(20) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `req` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `request`
--

INSERT INTO `request` (`reqid`, `date`, `username`, `fname`, `lname`, `req`) VALUES
(81, '2021-02-03 00:38:14', 'dkan', 'Dogukan', 'SENER', 'Kapı önleri toparlansın');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `userinfo`
--

CREATE TABLE `userinfo` (
  `id` int(11) NOT NULL,
  `doornumber` int(2) NOT NULL,
  `usertype` varchar(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `create_date` date NOT NULL,
  `delete_date` date DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `userinfo`
--

INSERT INTO `userinfo` (`id`, `doornumber`, `usertype`, `username`, `password`, `fname`, `lname`, `mail`, `phone`, `create_date`, `delete_date`, `status`) VALUES
(132, 1, 'admin', 'dkan', '46f94c8de14fb36680850768ff1b7f2a', 'Dogukan', 'SENER', 'asdasdasd@gmail.com', 6564233213, '2021-01-04', '0000-00-00', 'active'),
(155, 0, 'user', 'mbas1', '202cb962ac59075b964b07152d234b70', 'Metegan', 'Bas', 'mbas@asdqwe.com', 123123123, '2021-01-28', '2021-01-31', 'inactive'),
(156, 0, 'user', 'Dcan', '202cb962ac59075b964b07152d234b70', 'Doganca', 'SENER', 'asdasdasdadsq', 6456464564, '2021-01-30', '2021-01-31', 'inactive'),
(157, 0, 'user', 'Zeki1', '202cb962ac59075b964b07152d234b70', 'Zeki', 'SENER', 'asdasdasddasasd', 6565465465, '2021-01-30', '2021-01-31', 'inactive'),
(158, 0, 'user', 'Onur', '202cb962ac59075b964b07152d234b70', 'Onur', 'Kara', 'asdasdaasdasd', 5345353453, '2021-01-30', '2021-01-31', 'inactive'),
(164, 3, 'admin', 'Gizem', '202cb962ac59075b964b07152d234b70', 'Gizem', 'Sener', 'gizemsener@gmail.com', 5321654232, '2021-01-30', NULL, 'active'),
(165, 2, 'user', 'alp1', '202cb962ac59075b964b07152d234b70', 'alp', 'alp', 'sadasda', 4564564564, '2021-01-31', NULL, 'active'),
(166, 6, 'user', 'asdas', '202cb962ac59075b964b07152d234b70', 'qweqwe', 'qwe', 'qweqweqwe', 4353453453, '2021-01-31', NULL, 'active');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`annid`),
  ADD KEY `adminnick` (`adminnick`),
  ADD KEY `adminnick_2` (`adminnick`);

--
-- Tablo için indeksler `dues`
--
ALTER TABLE `dues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `billing_date` (`billing_date`);

--
-- Tablo için indeksler `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expenseid`),
  ADD KEY `date` (`date`);

--
-- Tablo için indeksler `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`reqid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Tablo için indeksler `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `announcement`
--
ALTER TABLE `announcement`
  MODIFY `annid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tablo için AUTO_INCREMENT değeri `dues`
--
ALTER TABLE `dues`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Tablo için AUTO_INCREMENT değeri `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expenseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Tablo için AUTO_INCREMENT değeri `request`
--
ALTER TABLE `request`
  MODIFY `reqid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Tablo için AUTO_INCREMENT değeri `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`adminnick`) REFERENCES `userinfo` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `dues`
--
ALTER TABLE `dues`
  ADD CONSTRAINT `dues_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userinfo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`username`) REFERENCES `userinfo` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
