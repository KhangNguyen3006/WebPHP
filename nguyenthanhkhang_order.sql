-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th1 12, 2022 lúc 05:52 PM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nguyenthanhkhang_2119110013`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguyenthanhkhang_order`
--

DROP TABLE IF EXISTS `nguyenthanhkhang_order`;
CREATE TABLE IF NOT EXISTS `nguyenthanhkhang_order` (
  `orderId` int(11) NOT NULL AUTO_INCREMENT,
  `customerId` int(11) NOT NULL,
  `orderDate` datetime NOT NULL DEFAULT current_timestamp(),
  `total` float(10,2) NOT NULL,
  `note` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `trash` tinyint(1) NOT NULL,
  PRIMARY KEY (`orderId`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `nguyenthanhkhang_order`
--

INSERT INTO `nguyenthanhkhang_order` (`orderId`, `customerId`, `orderDate`, `total`, `note`, `status`, `trash`) VALUES
(8, 2, '0000-00-00 00:00:00', 500.00, '', 1, 0),
(9, 2, '0000-00-00 00:00:00', 400.00, '', 0, 0),
(10, 2, '0000-00-00 00:00:00', 450.00, '', 1, 0),
(11, 3, '2021-12-06 11:40:28', 12099.00, 'all', 1, 0),
(12, 4, '2021-12-06 12:40:18', 26000.00, 'all', 1, 0),
(13, 5, '2021-12-06 13:04:29', 0.00, 'all', 1, 0),
(14, 6, '2022-01-10 14:55:37', 8099.00, 'check hang', 1, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
