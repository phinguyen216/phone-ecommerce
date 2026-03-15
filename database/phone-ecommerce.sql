-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 15, 2026 at 11:39 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phone-ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int NOT NULL,
  `iduser` int NOT NULL,
  `hoten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `diachi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sdt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pttt` tinyint NOT NULL COMMENT '1. Thanh toán trực tiếp 2. Chuyển khoản 3. Thanh toán online',
  `ngaydathang` date NOT NULL,
  `total` decimal(20,2) NOT NULL,
  `trangthai` tinyint NOT NULL COMMENT '0. Chờ xác nhận \r\n1. Đang xử lý\r\n2. Xác nhận đơn hàng \r\n3. Đang giao hàng \r\n4. Đã giao hàng\r\n5. Giao hàng thất bại\r\n6. Hủy Đơn\r\n\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `iduser`, `hoten`, `diachi`, `sdt`, `email`, `pttt`, `ngaydathang`, `total`, `trangthai`) VALUES
(166, 24, 'Nguyễn Văn Phi', 'Nam Từ Liêm , Hà Nội , Việt Nam', '0123456789', 'quangblubluto@gmail.com', 3, '2026-03-12', '15553737.00', 0),
(167, 24, 'Nguyễn Văn Phi', 'Nam Từ Liêm , Hà Nội , Việt Nam', '0123456789', 'quangblubluto@gmail.com', 2, '2026-03-12', '9990000.00', 0),
(168, 24, 'Nguyễn Văn Phi', 'Nam Từ Liêm , Hà Nội , Việt Nam', '0123456789', 'quangblubluto@gmail.com', 2, '2026-03-12', '35533737.00', 1),
(169, 24, 'Nguyễn Văn Phi', 'Nam Từ Liêm , Hà Nội , Việt Nam', '0123456789', 'quangblubluto@gmail.com', 2, '2026-03-12', '15553737.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int NOT NULL,
  `iduser` int NOT NULL,
  `idbill` int NOT NULL,
  `idpro` int NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `soluong` int NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `thanhtien` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `iduser`, `idbill`, `idpro`, `img`, `name`, `soluong`, `price`, `thanhtien`) VALUES
(108, 24, 166, 1, 'ip1.jpg', 'iPhone 17 128GB', 1, '15553737.00', 15553737),
(109, 24, 167, 2, 'ip3.jpg', 'iPhone SE (2022)', 1, '9990000.00', 9990000),
(110, 24, 168, 2, 'ip3.jpg', 'iPhone SE (2022)', 2, '9990000.00', 19980000),
(111, 24, 168, 1, 'ip1.jpg', 'iPhone 17 128GB', 1, '15553737.00', 15553737),
(112, 24, 169, 1, 'ip1.jpg', 'iPhone 17 128GB', 1, '15553737.00', 15553737);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `iduser` int NOT NULL,
  `idpro` int DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `soluong` int NOT NULL,
  `thanhtien` int NOT NULL,
  `idbill` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `iduser`, `idpro`, `img`, `name`, `price`, `soluong`, `thanhtien`, `idbill`) VALUES
(113, 43, 1, 'ip1.jpg', 'iPhone 17 128GB', '15553737.00', 1, 15553737, 0);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`) VALUES
(6, 'Samsung'),
(7, 'Iphone'),
(8, 'Xiaomi');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `iddm` int NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `mota` varchar(255) NOT NULL,
  `view` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `img`, `iddm`, `price`, `stock`, `mota`, `view`) VALUES
(1, 'iPhone 17 128GB', 'ip1.jpg', 7, '15553737.00', '5', 'đây là mô tả', 11),
(2, 'iPhone SE (2022)', 'ip3.jpg', 7, '9990000.00', '4', 'đây là mô tả', 1),
(3, 'iPhone 14 128GB', 'ip2.jpg', 7, '17290000.00', '11', 'đây là mô tả', NULL),
(4, 'iPhone 15 Pro 128GB', 'ip1.jpg', 7, '24790000.00', '12', 'đây là mô tả', NULL),
(5, 'Samsung Galaxy Z Flip6 5G 256GB', 'ss4.jpg', 6, '28990000.00', '10', 'đây là mô tả', NULL),
(6, 'Samsung Galaxy S24 Plus 5G 256GB', 'ss6.jpg', 6, '22990000.00', '5', 'đây là mô tả', NULL),
(7, 'Samsung Galaxy A54 8GB 256GB', 'ss1.jpg', 6, '8090000.00', '6', 'đây là mô tả', NULL),
(9, 'Xiaomi 13T Pro 5G', 'xiao1.jpg', 8, '14790000.00', '5', 'đây là mô tả', 11),
(10, 'Xiaomi 14 Ultra 5G', 'xiao2.jpg', 8, '28590000.00', '5', 'đây là mô tả', 5),
(11, 'Xiaomi 14 ', 'xiao3.jpg', 8, '19990000.00', '5', 'đây là mô tả', 5),
(15, 'Iphone 15 (10/8)', 'ip1.jpg', 6, '15000000.00', '10', 'đây là mmôtar ', NULL),
(19, 'iPhone 17 128GB', '476101261_607582225469889_2676803085684385643_n.jpg', 7, '15553737.00', '5', '13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `hoten` varchar(255) NOT NULL,
  `role` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `username`, `password`, `email`, `address`, `tel`, `hoten`, `role`) VALUES
(24, 'admin', 'admin', '', NULL, NULL, '', 1),
(43, 'test', 'test123456', 'test@gmail.com', NULL, '0967700513', 'Nguyễn Văn Test', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_iduser_bill` (`iduser`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idbill` (`idbill`),
  ADD KEY `idpro` (`idpro`),
  ADD KEY `lk_iduser_taikhoan` (`iduser`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idbill` (`idbill`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_iddm_danhmuc` (`iddm`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `lk_iduser_bill` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `bill_detail_ibfk_1` FOREIGN KEY (`idbill`) REFERENCES `bill` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bill_detail_ibfk_2` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`id`) ON DELETE RESTRICT,
  ADD CONSTRAINT `lk_iduser_taikhoan` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `iduser` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `lk_iddm_danhmuc` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
