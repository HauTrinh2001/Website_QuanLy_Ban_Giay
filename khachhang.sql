-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2022 lúc 08:43 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_bangiay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` int(11) NOT NULL,
  `HoTen` varchar(50) NOT NULL,
  `TaiKhoan` varchar(50) DEFAULT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `DiaChiKH` varchar(200) DEFAULT NULL,
  `DienThoaiKH` varchar(20) DEFAULT NULL,
  `NgaySinh` datetime DEFAULT NULL,
  `GioiTinh` tinyint(1) DEFAULT NULL,
  `AnhKH` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `HoTen`, `TaiKhoan`, `MatKhau`, `Email`, `DiaChiKH`, `DienThoaiKH`, `NgaySinh`, `GioiTinh`, `AnhKH`) VALUES
(1, 'Nguyen Han', 'hanpink', '14e1b600b1fd579f47433b88e8d85291', 'han.nnh.61cntt@ntu.edu.vn', '', '', '2022-11-15 00:00:00', 0, '85b4f98c9fefa497d1d2bfb2342c9ea3.jpg'),
(3, 'bao bao', NULL, '14e1b600b1fd579f47433b88e8d85291', 'baobao@gmail.com', NULL, NULL, NULL, NULL, 'baobao.jpg'),
(6, 'Monkey D. Luffy', NULL, '14e1b600b1fd579f47433b88e8d85291', 'vuahaitac@gmail.com', NULL, NULL, NULL, NULL, NULL),
(7, 'Thuyền phó Zoro', '', '14e1b600b1fd579f47433b88e8d85291', 'zoro@gmail.com', '', '', NULL, 0, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
