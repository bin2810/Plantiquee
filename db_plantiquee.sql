-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2025 at 10:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_plantiquee`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_ctdonhang`
--

CREATE TABLE `tb_ctdonhang` (
  `ChiTietDH_id` varchar(10) NOT NULL,
  `SoLuong` tinyint(2) NOT NULL,
  `DonGia` tinyint(2) NOT NULL,
  `MaDH` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_danhmuc_chinh`
--

CREATE TABLE `tb_danhmuc_chinh` (
  `MADM_cha` varchar(255) NOT NULL,
  `TENDM_cha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_danhmuc_chinh`
--

INSERT INTO `tb_danhmuc_chinh` (`MADM_cha`, `TENDM_cha`) VALUES
('CT', 'CÂY TRỒNG'),
('DC', 'DỤNG CỤ'),
('HH', 'HỌC HỎI'),
('QT', 'QUÀ TẶNG'),
('QTDN', 'QUÀ TẶNG DOANH NGHIỆP');

-- --------------------------------------------------------

--
-- Table structure for table `tb_danhmuc_con`
--

CREATE TABLE `tb_danhmuc_con` (
  `MADM_con` varchar(255) NOT NULL,
  `TENDM_con` varchar(255) NOT NULL,
  `MA_DM_cha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_danhmuc_con`
--

INSERT INTO `tb_danhmuc_con` (`MADM_con`, `TENDM_con`, `MA_DM_cha`) VALUES
('BCN', 'Bán Chạy Nhất', 'CT'),
('BDCTC', 'Bộ Dụng Cụ Thay Chậu', 'DC'),
('CATCTC', 'Cây An Toàn Cho Thú Cưng', 'CT'),
('CC', 'Chậu Cây', 'DC'),
('CDCS', 'Cây Dễ Chăm Sóc', 'CT'),
('CHNGC', 'Cửa Hàng Nhân Giống Cây', 'DC'),
('CHTND', 'Cửa Hàng Tết Nguyên Đán', 'CT'),
('CSTTBR', 'Cây Sống Tốt Trong Bóng Răm', 'CT'),
('DDVCS', 'Dinh Dưỡng Và Chăm Sóc', 'DC'),
('HMV', 'Hàng Mới Về', 'CT'),
('QTGD', 'Quà Tặng Gia Đình', 'QT'),
('QTSN', 'Quà Tặng Sinh Nhật', 'QT'),
('QTTG', 'Quà Tặng Tân Gia', 'QT'),
('TTVPK', 'Trang Trí Và Phụ Kiện', 'DC');

-- --------------------------------------------------------

--
-- Table structure for table `tb_donhang`
--

CREATE TABLE `tb_donhang` (
  `DonHang_id` varchar(10) NOT NULL,
  `NgayTao` datetime NOT NULL,
  `MaKhachHang` varchar(10) NOT NULL,
  `MASP` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_khachhang`
--

CREATE TABLE `tb_khachhang` (
  `KhachHang_id` varchar(10) NOT NULL,
  `HoTen` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `SĐT` varchar(20) NOT NULL,
  `DiaChi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sanpham`
--

CREATE TABLE `tb_sanpham` (
  `SanPham_id` int(10) NOT NULL,
  `TenSP` varchar(20) NOT NULL,
  `Ten_Khoa_Hoc` varchar(20) NOT NULL,
  `Ten_Pho_Bien` varchar(20) NOT NULL,
  `Title_SP` varchar(50) NOT NULL,
  `MoTa` varchar(50) NOT NULL,
  `Ten_Mau_Sac` varchar(255) NOT NULL,
  `Ma_Mau_Sac` varchar(255) NOT NULL,
  `DonGia` tinyint(3) NOT NULL,
  `SoLuong` tinyint(2) NOT NULL,
  `HinhAnh` varchar(255) NOT NULL,
  `NgayTao` datetime NOT NULL DEFAULT current_timestamp(),
  `Nguoi_add` varchar(20) NOT NULL,
  `MA_DM_con` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_sanpham`
--

INSERT INTO `tb_sanpham` (`SanPham_id`, `TenSP`, `Ten_Khoa_Hoc`, `Ten_Pho_Bien`, `Title_SP`, `MoTa`, `Ten_Mau_Sac`, `Ma_Mau_Sac`, `DonGia`, `SoLuong`, `HinhAnh`, `NgayTao`, `Nguoi_add`, `MA_DM_con`) VALUES
(7, 'ha', 'hi', 'sdf', 'dfbfd', 'dsvdsv', 'Xám Nhạt,Nâu Cam', '#E6E8EA,#C78356', 127, 127, '230618_bloomscape_lemon_trees_0027-1-e1688415704637-768x922.jpg|bloomscape_burgundy-rubber-tree_lg_charcoal-768x922.jpg|bloomscape_colorful-collection_xs_indigo-768x922.jpg', '2025-03-14 08:48:04', 'Phạm Hoàng vũ', 'HMV'),
(8, 'hi', '', '', '', '', 'Xám Nhạt', '#E6E8EA', 0, 0, 'bloomscape_croton-mammy_lg_charcoal-768x922.jpg|bloomscape_easy-peasy-collection_xs_charcoal-768x922.jpg|bloomscape_pothos-baltic-blue_medium_stone-e1687537435892-768x921.jpg|bloomscape_sansevieria_clay-e1633460951153-768x922.jpg', '2025-03-14 13:05:45', 'Phạm Hoàng vũ', 'CDCS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `User_id` int(10) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Fullname` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` tinyint(1) NOT NULL,
  `DiaChi` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `CCCD` varchar(20) NOT NULL,
  `SDT` varchar(20) NOT NULL,
  `VaiTro` enum('admin','user') NOT NULL DEFAULT 'user',
  `Hinhanh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`User_id`, `Username`, `Fullname`, `Password`, `NgaySinh`, `GioiTinh`, `DiaChi`, `Email`, `CCCD`, `SDT`, `VaiTro`, `Hinhanh`) VALUES
(1, 'admin2810', 'Phạm Hoàng vũ', '281025', '0000-00-00', 0, '', 'phamhoangvu7373@gmai', '', '', 'admin', 'avta_md_admin.jpg'),
(2, 'bino12345', 'bino', '12345', '0000-00-00', 0, '', 'bino12345@gmail.com', '', '', 'user', 'avta_md_user.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_ctdonhang`
--
ALTER TABLE `tb_ctdonhang`
  ADD PRIMARY KEY (`ChiTietDH_id`),
  ADD KEY `MaDH` (`MaDH`);

--
-- Indexes for table `tb_danhmuc_chinh`
--
ALTER TABLE `tb_danhmuc_chinh`
  ADD PRIMARY KEY (`MADM_cha`);

--
-- Indexes for table `tb_danhmuc_con`
--
ALTER TABLE `tb_danhmuc_con`
  ADD PRIMARY KEY (`MADM_con`),
  ADD KEY `MaDM_cha` (`MA_DM_cha`);

--
-- Indexes for table `tb_donhang`
--
ALTER TABLE `tb_donhang`
  ADD PRIMARY KEY (`DonHang_id`),
  ADD KEY `MaKhachHang` (`MaKhachHang`),
  ADD KEY `MASP` (`MASP`);

--
-- Indexes for table `tb_khachhang`
--
ALTER TABLE `tb_khachhang`
  ADD PRIMARY KEY (`KhachHang_id`);

--
-- Indexes for table `tb_sanpham`
--
ALTER TABLE `tb_sanpham`
  ADD PRIMARY KEY (`SanPham_id`),
  ADD KEY `Ma_DM` (`MA_DM_con`),
  ADD KEY `MADM_con` (`MA_DM_con`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_sanpham`
--
ALTER TABLE `tb_sanpham`
  MODIFY `SanPham_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `User_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_ctdonhang`
--
ALTER TABLE `tb_ctdonhang`
  ADD CONSTRAINT `tb_ctdonhang_ibfk_1` FOREIGN KEY (`MaDH`) REFERENCES `tb_donhang` (`DonHang_id`);

--
-- Constraints for table `tb_danhmuc_con`
--
ALTER TABLE `tb_danhmuc_con`
  ADD CONSTRAINT `tb_danhmuc_con_ibfk_1` FOREIGN KEY (`MA_DM_cha`) REFERENCES `tb_danhmuc_chinh` (`MADM_cha`);

--
-- Constraints for table `tb_donhang`
--
ALTER TABLE `tb_donhang`
  ADD CONSTRAINT `tb_donhang_ibfk_2` FOREIGN KEY (`MaKhachHang`) REFERENCES `tb_khachhang` (`KhachHang_id`),
  ADD CONSTRAINT `tb_donhang_ibfk_3` FOREIGN KEY (`MASP`) REFERENCES `tb_sanpham` (`SanPham_id`);

--
-- Constraints for table `tb_sanpham`
--
ALTER TABLE `tb_sanpham`
  ADD CONSTRAINT `tb_sanpham_ibfk_1` FOREIGN KEY (`MA_DM_con`) REFERENCES `tb_danhmuc_con` (`MADM_con`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
