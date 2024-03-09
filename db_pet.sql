-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 20, 2023 lúc 12:01 PM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_pet`
--

DELIMITER $$
--
-- Các hàm
--
CREATE DEFINER=`root`@`localhost` FUNCTION `daban` (`tensp` INT) RETURNS VARCHAR(100) CHARSET utf8mb4  BEGIN 
DECLARE conlai int;
DECLARE daban int;
set conlai=(SELECT COUNT(cart.tensp)
      	from cart
         JOIN sanpham on cart.tensp=sanpham.tensp
         WHERE tensp=sanpham.tensp);
set daban = (select (sanpham.soluong-conlai) 
			from sanpham
			where tensp=sanpham.tensp);
return daban;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(12) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `total` double(10,3) NOT NULL DEFAULT 0.000,
  `pttt` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `xacnhan` varchar(100) NOT NULL DEFAULT 'Đang chờ xác nhận!'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `username`, `name`, `address`, `phone`, `total`, `pttt`, `created_at`, `xacnhan`) VALUES
(18, 'admin', 'Nguyễn Minh Quang ', 'Ninh Kiều, Cần Thơ', 1234567890, 150.000, 'Thanh toán qua thẻ', '2023-04-20 02:52:19', 'Đang chờ xác nhận!'),
(22, 'pandas', 'Gấu trúc', 'Xuân Khánh Ninh Kiều TP. Cần Thơ', 1111111112, 53.200, 'Thanh toán qua thẻ', '2023-04-20 04:31:33', 'Đang chờ xác nhận!'),
(23, 'quang', 'quang', 'Xuân Khánh Ninh Kiều TP. Cần Thơ', 123456789, 136.300, 'Thanh toán qua thẻ', '2023-04-20 04:33:04', 'Đang chờ xác nhận!'),
(24, 'pandas', 'Gấu trúc', 'Xuân Khánh Ninh Kiều TP. Cần Thơ', 1111111112, 235.100, 'Thanh toán qua thẻ', '2023-04-20 04:41:33', 'Đang chờ xác nhận!'),
(25, 'pandas', 'Gấu trúc', 'Xuân Khánh Ninh Kiều TP. Cần Thơ', 1111111112, 18.000, 'Thanh toán qua thẻ', '2023-04-20 16:48:21', 'Đang chờ xác nhận!'),
(26, 'quang', 'quang', 'Xuân Khánh Ninh Kiều TP. Cần Thơ', 123456789, 11.000, 'Thanh toán qua thẻ', '2023-04-20 16:54:16', 'Đang chờ xác nhận!');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `hinhsp` varchar(100) NOT NULL,
  `gia` double(10,3) NOT NULL DEFAULT 0.000,
  `soluong` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `idbill` int(11) NOT NULL,
  `time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `tensp`, `hinhsp`, `gia`, `soluong`, `thanhtien`, `idbill`, `time`) VALUES
(45, 'Mèo Anh Mắt Xanh', '2.jpg', 0.000, 1, 0, 0, '2023-04-20 04:31:16'),
(46, 'Chó Anh Long Trắng', '14.jpg', 0.000, 5, 0, 0, '2023-04-20 04:31:25'),
(47, 'Mèo Áo', '4.jpg', 0.000, 1, 0, 0, '2023-04-20 04:31:31'),
(48, '2.jpg', 'Mèo Anh Mắt Xanh', 5.000, 1, 5, 22, '2023-04-20 04:31:33'),
(49, '14.jpg', 'Chó Anh Long Trắng', 9.000, 5, 45, 22, '2023-04-20 04:31:33'),
(50, '4.jpg', 'Mèo Áo', 3.200, 1, 3, 22, '2023-04-20 04:31:33'),
(51, 'Chó Cáo Sa Mạc', '19.jpg', 0.000, 2, 0, 0, '2023-04-20 04:32:53'),
(52, 'Chó Shiba Inu', '15.jpg', 0.000, 1, 0, 0, '2023-04-20 04:33:02'),
(53, '19.jpg', 'Chó Cáo Sa Mạc', 11.000, 2, 22, 23, '2023-04-20 04:33:04'),
(54, '15.jpg', 'Chó Shiba Inu', 114.300, 1, 114, 23, '2023-04-20 04:33:04'),
(55, 'Chó Anh Long Trắng', '14.jpg', 0.000, 1, 0, 0, '2023-04-20 04:40:34'),
(56, 'Chó Shiba Inu', '15.jpg', 0.000, 2, 0, 0, '2023-04-20 04:40:54'),
(57, 'Mèo Nga Thuần Chủng', '6.jpg', 0.000, 1, 0, 0, '2023-04-20 04:41:03'),
(58, '15.jpg', 'Chó Shiba Inu', 114.300, 2, 229, 24, '2023-04-20 04:41:33'),
(59, '6.jpg', 'Mèo Nga Thuần Chủng', 6.500, 1, 7, 24, '2023-04-20 04:41:33'),
(60, 'Chó Anh Long Trắng', '14.jpg', 0.000, 2, 0, 0, '2023-04-20 16:47:48'),
(61, 'Mèo Anh Mắt Xanh', '2.jpg', 0.000, 1, 0, 0, '2023-04-20 16:48:02'),
(62, '14.jpg', 'Chó Anh Long Trắng', 9.000, 2, 18, 25, '2023-04-20 16:48:21'),
(63, 'Chó Cáo Sa Mạc', '19.jpg', 0.000, 1, 0, 0, '2023-04-20 16:54:13'),
(64, '19.jpg', 'Chó Cáo Sa Mạc', 11.000, 1, 11, 26, '2023-04-20 16:54:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `id` int(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lienhe`
--

INSERT INTO `lienhe` (`id`, `name`, `phone`, `email`, `note`, `created_at`) VALUES
(10, 'Nguyen Minh Quang', 1234567899, 'quang@gmail.com', 'Pet de thw qua', '2023-03-11 04:14:50'),
(11, 'Gấu trúc', 1111111111, 'gau@gmail.com', 'Không có gì để phản hồi', '2023-04-07 03:15:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(12) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `hinhsp` varchar(100) NOT NULL,
  `cost` double(10,3) NOT NULL DEFAULT 0.000,
  `soluong` int(12) NOT NULL,
  `daban` int(12) NOT NULL,
  `iddm` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensp`, `hinhsp`, `cost`, `soluong`, `daban`, `iddm`) VALUES
(35, 'Mèo Anh Mắt Xanh  ', '2.jpg', 5.000, 100, 10, 2),
(36, 'Chó Anh Long Trắng', '14.jpg', 9.000, 100, 10, 2),
(37, 'Chó Cáo Sa Mạc', '19.jpg', 11.000, 100, 10, 2),
(38, 'Mèo Nga Thuần Chủng', '6.jpg', 6.500, 100, 10, 2),
(39, 'Chó Pug', '12.jpg', 4.500, 100, 10, 2),
(40, 'Mèo Áo', '4.jpg', 3.200, 100, 10, 2),
(41, 'Chó Chăn Cừu Đức ', '20.jpg', 6.700, 100, 10, 2),
(42, 'Mèo Savannah', '9.jpg', 7.200, 100, 10, 2),
(44, 'Chó cỏ (chó mực) ', '17.jpg', 1.200, 100, 10, 2),
(46, 'Mèo Nekko Nhật Bản ', '3.jpg', 9.900, 100, 10, 2),
(47, 'Chó Shiba Inu', '15.jpg', 114.300, 100, 10, 2),
(48, 'Meo1', '1.jpg', 150.000, 100, 10, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(12) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `name`, `address`, `email`, `phone`, `user_type`, `created_at`) VALUES
(1, 'admin', '$2y$10$aPBB7UiV85OIPWdliHo2pOxhokVS.8fmMKC8TInJ3diEaJ7ID58GW', 'Nguyễn Minh Quang ', 'Ninh Kiều, Cần Thơ', 'quang@gmail.com', 1234567890, 2, '2022-12-10 14:30:02'),
(9, 'pandas', '$2y$10$OQJ9lyeg5wNblT3UvqwO9.6Rv27hdDrrW19p/6xrVsADbRmBBHpua', 'Gấu trúc', 'Xuân Khánh Ninh Kiều TP. Cần Thơ', 'gau@gmail.com', 1111111112, 1, '2023-04-11 22:13:04');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
