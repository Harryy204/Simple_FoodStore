-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2024 at 01:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `ten` varchar(30) NOT NULL,
  `matkhau` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `ten`, `matkhau`) VALUES
(1, 'admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id_khachhang` int(11) NOT NULL,
  `code_cart` int(11) NOT NULL,
  `tennguoinhan` varchar(50) NOT NULL,
  `sdt` varchar(12) NOT NULL,
  `dc` varchar(100) NOT NULL,
  `ngaydat` date NOT NULL,
  `ngaynhan` date DEFAULT NULL,
  `thanhtoan` varchar(50) NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id_khachhang`, `code_cart`, `tennguoinhan`, `sdt`, `dc`, `ngaydat`, `ngaynhan`, `thanhtoan`, `trangthai`) VALUES
(16, 293, 'khách hàng', '0123123123', '123,abc', '2024-11-14', NULL, 'Chuyển khoản', 1),
(15, 8408, 'user', '0123456789', '123,abc,Đà Nẵng', '2024-11-13', '2024-11-13', 'Thanh toán khi nhận hàng', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart_info`
--

CREATE TABLE `tbl_cart_info` (
  `id_cart_infor` int(11) NOT NULL,
  `code_cart` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `sl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_cart_info`
--

INSERT INTO `tbl_cart_info` (`id_cart_infor`, `code_cart`, `id_sp`, `sl`) VALUES
(100, 8408, 111, 1),
(102, 293, 111, 1),
(103, 293, 110, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loaimon`
--

CREATE TABLE `tbl_loaimon` (
  `id_hangsp` int(11) NOT NULL,
  `tenhangsp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_loaimon`
--

INSERT INTO `tbl_loaimon` (`id_hangsp`, `tenhangsp`) VALUES
(21, 'Ẩm thực Việt Nam'),
(22, 'Ẩm thực Nhật Bản'),
(23, 'Ẩm thực Hàn Quốc');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_monan`
--

CREATE TABLE `tbl_monan` (
  `id_sp` int(11) NOT NULL,
  `ma_sp` varchar(50) NOT NULL,
  `ten_sp` varchar(100) NOT NULL,
  `gia` int(15) NOT NULL,
  `hinhanh` varchar(150) NOT NULL,
  `mota` varchar(1000) NOT NULL,
  `soluong` int(11) NOT NULL,
  `daban` int(11) NOT NULL DEFAULT 0,
  `trangthai` int(11) NOT NULL,
  `time_rammat` date NOT NULL,
  `id_hangsp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_monan`
--

INSERT INTO `tbl_monan` (`id_sp`, `ma_sp`, `ten_sp`, `gia`, `hinhanh`, `mota`, `soluong`, `daban`, `trangthai`, `time_rammat`, `id_hangsp`) VALUES
(109, 'VN01', 'Bún bò Huế', 50000, '1731479415.bunbohue.jpg', 'Bún bò Huế', 10, 0, 1, '2024-11-13', 21),
(110, 'JP01', 'Sushi', 100000, '1731480446.sushi.jpg', 'Sushi', 10, 0, 1, '2024-11-13', 22),
(111, 'VN02', 'Cơm tấm', 50000, '1731483273.comtam.jpg', 'Cơm tấm truyền thống', 9, 0, 1, '2024-11-13', 21),
(112, 'KR01', 'Cơm trộn', 100000, '1731498388.bibimbap.jpeg', 'Bibimbap cơm trộn Hàn Quốc', 10, 0, 1, '2024-11-13', 23),
(113, 'VN03', 'Bánh mì', 20000, '1731498863.banhmi.jpg', 'Bánh mì truyền thống Việt Nam', 10, 1, 1, '2024-11-13', 21),
(114, 'VN04', 'Phở bò', 70000, '1731498951.pho.jpg', 'Phở bò Việt Nam', 10, 1, 1, '2024-11-13', 21),
(115, 'JP02', 'Mì Udon', 120000, '1731499108.miudon.jpg', 'Mì Udon truyền thống Nhật Bản', 20, 10, 1, '2024-11-13', 22),
(116, 'JP03', 'Takoyaki', 60000, '1731499287.takoyaki.jpg', 'Bánh bạch tuộc Takoyaki Nhật Bản', 12, 1, 1, '2024-11-13', 22),
(117, 'KR02', 'Bulgogi', 80000, '1731499499.bulgogi.jpg', 'Bò nướng tẩm vị Bulgogi Hàn Quốc', 22, 7, 1, '2024-11-13', 23);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mucgia`
--

CREATE TABLE `tbl_mucgia` (
  `id_mucgia` int(11) NOT NULL,
  `mucgia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_mucgia`
--

INSERT INTO `tbl_mucgia` (`id_mucgia`, `mucgia`) VALUES
(18, 50000),
(19, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_khachhang` int(11) NOT NULL,
  `hoten` varchar(30) NOT NULL,
  `sodienthoai` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `diachi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_khachhang`, `hoten`, `sodienthoai`, `email`, `matkhau`, `diachi`) VALUES
(15, 'user', '0123456789', 'user@gmail.com', '$2y$12$CIDI5/pLg6QyZLxb4qPMIe3li6Xbyxk.H/ro1JR.Ab3pQkb1I9MUu', '123,abc,Đà Nẵng'),
(16, 'khách hàng', '0123123123', 'khachhang@gmail.com', '$2y$12$EzSr9uerx6k1e4HSbascR.ATwGdedzqy8NWJeR72NaCEj1dGoNQ7W', '123,abc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`code_cart`),
  ADD KEY `id_khachhang` (`id_khachhang`);

--
-- Indexes for table `tbl_cart_info`
--
ALTER TABLE `tbl_cart_info`
  ADD PRIMARY KEY (`id_cart_infor`),
  ADD KEY `code_cart` (`code_cart`,`id_sp`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Indexes for table `tbl_loaimon`
--
ALTER TABLE `tbl_loaimon`
  ADD PRIMARY KEY (`id_hangsp`);

--
-- Indexes for table `tbl_monan`
--
ALTER TABLE `tbl_monan`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `id_hangsp` (`id_hangsp`);

--
-- Indexes for table `tbl_mucgia`
--
ALTER TABLE `tbl_mucgia`
  ADD PRIMARY KEY (`id_mucgia`),
  ADD UNIQUE KEY `mucgia` (`mucgia`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_khachhang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `code_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8966;

--
-- AUTO_INCREMENT for table `tbl_cart_info`
--
ALTER TABLE `tbl_cart_info`
  MODIFY `id_cart_infor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `tbl_loaimon`
--
ALTER TABLE `tbl_loaimon`
  MODIFY `id_hangsp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_monan`
--
ALTER TABLE `tbl_monan`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `tbl_mucgia`
--
ALTER TABLE `tbl_mucgia`
  MODIFY `id_mucgia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`id_khachhang`) REFERENCES `users` (`id_khachhang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_cart_info`
--
ALTER TABLE `tbl_cart_info`
  ADD CONSTRAINT `tbl_cart_info_ibfk_1` FOREIGN KEY (`code_cart`) REFERENCES `tbl_cart` (`code_cart`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_cart_info_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `tbl_monan` (`id_sp`);

--
-- Constraints for table `tbl_monan`
--
ALTER TABLE `tbl_monan`
  ADD CONSTRAINT `tbl_monan_ibfk_1` FOREIGN KEY (`id_hangsp`) REFERENCES `tbl_loaimon` (`id_hangsp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
