-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 28, 2025 lúc 10:12 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_plantiquee`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_ctdonhang`
--

CREATE TABLE `tb_ctdonhang` (
  `ChiTietDH_id` varchar(10) NOT NULL,
  `SoLuong` tinyint(2) NOT NULL,
  `DonGia` tinyint(2) NOT NULL,
  `MaDH` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_danhmuc_chinh`
--

CREATE TABLE `tb_danhmuc_chinh` (
  `MADM_cha` varchar(255) NOT NULL,
  `TENDM_cha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_danhmuc_chinh`
--

INSERT INTO `tb_danhmuc_chinh` (`MADM_cha`, `TENDM_cha`) VALUES
('CT', 'CÂY TRỒNG'),
('DC', 'DỤNG CỤ'),
('HH', 'HỌC HỎI'),
('QT', 'QUÀ TẶNG'),
('QTDN', 'QUÀ TẶNG DOANH NGHIỆP');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_danhmuc_con`
--

CREATE TABLE `tb_danhmuc_con` (
  `MADM_con` varchar(255) NOT NULL,
  `TENDM_con` varchar(255) NOT NULL,
  `MA_DM_cha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_danhmuc_con`
--

INSERT INTO `tb_danhmuc_con` (`MADM_con`, `TENDM_con`, `MA_DM_cha`) VALUES
('BCN', 'Bán Chạy Nhất', 'CT'),
('CATCTC', 'Cây An Toàn Cho Thú Cưng', 'CT'),
('CC', 'Chậu Cây', 'DC'),
('CDCS', 'Cây Dễ Chăm Sóc', 'CT'),
('CSTTBR', 'Cây Sống Tốt Trong Bóng Răm', 'CT'),
('DDVCS', 'Dinh Dưỡng Và Chăm Sóc', 'DC'),
('HMV', 'Hàng Mới Về', 'CT'),
('QTGD', 'Quà Tặng Gia Đình', 'QT'),
('QTSN', 'Quà Tặng Sinh Nhật', 'QT'),
('QTTG', 'Quà Tặng Tân Gia', 'QT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_donhang`
--

CREATE TABLE `tb_donhang` (
  `DonHang_id` varchar(10) NOT NULL,
  `NgayTao` datetime NOT NULL,
  `MaKhachHang` varchar(10) NOT NULL,
  `MASP` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_khachhang`
--

CREATE TABLE `tb_khachhang` (
  `KhachHang_id` varchar(10) NOT NULL,
  `HoTen` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `SĐT` varchar(20) NOT NULL,
  `DiaChi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_sanpham`
--

CREATE TABLE `tb_sanpham` (
  `SanPham_id` int(10) NOT NULL,
  `TenSP` varchar(50) NOT NULL,
  `Ten_Khoa_Hoc` varchar(20) NOT NULL,
  `Ten_Pho_Bien` varchar(20) NOT NULL,
  `Title_SP` varchar(255) NOT NULL,
  `MoTa` varchar(255) NOT NULL,
  `DonGia` int(10) NOT NULL,
  `SoLuong` int(10) NOT NULL,
  `HinhAnh` varchar(255) NOT NULL,
  `TinhTrang` varchar(50) NOT NULL,
  `NgayTao` datetime NOT NULL DEFAULT current_timestamp(),
  `Nguoi_add` varchar(20) NOT NULL,
  `MA_DM_con` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_sanpham`
--

INSERT INTO `tb_sanpham` (`SanPham_id`, `TenSP`, `Ten_Khoa_Hoc`, `Ten_Pho_Bien`, `Title_SP`, `MoTa`, `DonGia`, `SoLuong`, `HinhAnh`, `TinhTrang`, `NgayTao`, `Nguoi_add`, `MA_DM_con`) VALUES
(75, 'Cây Cầu Nguyện Đỏ', 'Maranta leuconeura', 'Cây Cầu Nguyện, Cây ', 'Đầy màu sắc và đậm với chút sắc đỏ trên lá hai tông màu', 'Cây Cầu Nguyện Đỏ Maranta có lá xanh đậm mềm mại với các gân xanh nhạt và đỏ ở giữa giống như lông vũ. Tán lá đầy màu sắc và tốc độ sinh trưởng chậm khiến đây trở thành loại cây hoàn hảo cho bệ cửa sổ, lò sưởi hoặc kệ cần một chút màu sắc.\r\n\r\nCây Cầu Vồng', 500000, 150, 'bloomscape_red-prayer-pant_sm_angle2-324x389.jpg', 'New', '2025-03-23 19:20:16', 'Phạm Hoàng vũ', 'BCN'),
(76, 'Cây Kim Tiền', 'Pachira aquatica', 'Cây kim tiền, cây dẻ', 'Cây Kim Tiền là một loại cây trồng trong nhà dễ chăm sóc, hoàn hảo để mang lại vẻ đẹp nhiệt đới cùng một chút may mắn. Nhóm thân cây chắc khỏe kết hợp với những tán lá xanh mướt, tỏa ra vẻ tươi tốt như một khu rừng nhỏ, giúp không gian sống thêm sinh động', 'Một biến thể độc đáo của Cây Kim Tiền truyền thống, Rừng Cây Kim Tiền có nhiều thân cây tạo nên vẻ ngoài như một khu rừng thu nhỏ trong chậu. Những chiếc lá xanh tươi vươn lên từ thân cây dài, mang đến vẻ đẹp nhiệt đới đầy ấn tượng mà bất kỳ ai cũng phải ', 250000, 250, 'bloomscape_money-tree-forest_slate-e1667582169700-324x388.jpg', 'New', '2025-03-23 19:28:15', 'Phạm Hoàng vũ', 'BCN'),
(77, 'Trầu Bà Lá Xẻ', 'Monstera deliciosa', 'Cây phô mai Thụy Sĩ ', 'Trầu Bà Lá Xẻ, còn được gọi là Monstera Deliciosa, là một loại cây nhiệt đới nổi bật có nguồn gốc từ các khu rừng mưa nhiệt đới ở miền nam Mexico. Sống động và hoang dã với những chiếc lá xanh to có các đường xẻ tự nhiên, loại cây này trở thành lựa chọn p', 'Khi được đặt trong môi trường phù hợp, Trầu Bà Lá Xẻ dễ chăm sóc và phát triển nhanh—vì vậy hãy dành cho nó một chút không gian để lan rộng, tạo điểm nhấn ấn tượng và phát triển mạnh mẽ! Khi cây lớn lên, lá của nó sẽ xuất hiện những đường xẻ dài và lỗ độc', 500000, 100, 'bloomscape_monstera_alt_slate-324x395.jpg', '', '2025-03-23 19:30:52', 'Phạm Hoàng vũ', 'BCN'),
(78, 'Cây Đa Cao Su Đỏ', 'Ficus Elastica Burgu', 'Cây Đa Cao Su Đỏ', 'Lá dày, bóng với màu đỏ tía đậm, tạo sự sang trọng cho không gian.Dễ trồng và có thể phát triển lớn theo thời gian.', 'Một trong những loại cây cảnh lá to phổ biến, với màu lá đỏ đậm sang trọng.\r\n\r\nCây phát triển mạnh mẽ và có thể đạt chiều cao đáng kể nếu được chăm sóc tốt.\r\n\r\nLựa chọn lý tưởng cho không gian nội thất hiện đại.', 450000, 100, 'bloomscape_burgundy-rubber-tree_lg_charcoal-324x389.jpg', '', '2025-03-23 19:37:08', 'Phạm Hoàng vũ', 'BCN'),
(79, 'Cây Đa Sọc', 'Ficus Elastica Tinek', 'Cây Đa Sọc', 'Lá có màu xanh nhạt pha trắng kem, tạo vẻ ngoài sang trọng.\r\n\r\nLà một biến thể của cây Đa Cao Su nhưng có màu sắc bắt mắt hơn.', 'Với các tông màu pha trộn giữa xanh, trắng và vàng nhạt, Ficus Tineke là điểm nhấn hoàn hảo cho không gian sống.\r\n\r\nCây phát triển nhanh và có thể cao lên đến 1-2m trong điều kiện phù hợp.', 550000, 150, 'bloomscape_ficus-tineke_md_stone-324x389.jpg', '', '2025-03-23 19:38:24', 'Phạm Hoàng vũ', 'BCN'),
(81, 'Cây Cọ Cảnh', 'Chamaedorea Elegans', 'Cây Cọ Cảnh', 'Lá xanh mềm mại, mọc thành cụm giống như một cây cọ thu nhỏ.\r\n\r\nTạo cảm giác nhiệt đới và sang trọng cho không gian.', 'Một trong những cây nội thất phổ biến nhất, mang vẻ đẹp cổ điển.\r\n\r\nRất dễ trồng, không yêu cầu chăm sóc nhiều.\r\n\r\nThích hợp cho phòng khách, văn phòng hoặc phòng ngủ nhờ khả năng lọc không khí.', 120000, 145, 'bloomscape_parlor-palmloomscape_slate-e1625249746437-324x389.jpg', 'New', '2025-03-23 19:42:41', 'Phạm Hoàng vũ', 'BCN'),
(82, 'Cây Lưỡi Hổ Vây Cá Voi', 'Sansevieria Masonian', 'Cây Lưỡi Hổ Vây Cá V', 'Lá đơn lớn, dày và cứng như vây cá voi, tạo điểm nhấn độc đáo cho không gian.\r\n\r\nRất dễ chăm sóc, thích hợp cho người bận rộn.', 'Loại cây này có hình dáng lá đặc biệt với bản lá to, dày, vươn lên như vây cá voi.\r\n\r\nLà một trong những loại cây chịu hạn tốt nhất, phù hợp với những người không có nhiều thời gian chăm sóc cây cảnh.', 250000, 30, 'Bloomscape_SansevieriaMaso.jpg', 'New', '2025-03-23 19:52:21', 'Phạm Hoàng vũ', 'BCN'),
(83, 'Cây Lan Ý', 'Spathiphyllum', 'Cây Lan Ý', 'Lá xanh đậm bóng mượt, hoa trắng thanh lịch.\r\n\r\nNổi tiếng với khả năng thanh lọc không khí.', 'Một loại cây đẹp và thanh lịch, rất phổ biến trong nhà và văn phòng.\r\n\r\nCó khả năng hấp thụ các chất độc hại trong không khí, cải thiện môi trường sống.\r\n\r\nCây ra hoa trắng vào mùa xuân và có thể nở hoa quanh năm nếu điều kiện tốt.', 650000, 150, 'bloomscape_peace-lily6_md_charcoal-324x389.jpg', '', '2025-03-23 19:59:20', 'Phạm Hoàng vũ', 'BCN'),
(84, 'Cây Xương Rồng Tim', 'Schlumbergera', 'Cây Xương Rồng Tim', 'Thân cây mọng nước, mọc thành từng đoạn nối nhau.\r\n\r\nRa hoa rực rỡ vào dịp cuối năm, thường có màu hồng, đỏ hoặc trắng.', 'Loại xương rồng độc đáo này không giống các loại xương rồng thông thường, vì nó cần độ ẩm cao hơn.\r\n\r\nKhi đến mùa lễ hội, cây nở hoa đẹp mắt, tạo không khí ấm áp cho gia đình.\r\n\r\nDễ chăm sóc, sống lâu năm và có thể trồng trong chậu treo.', 850000, 40, 'bloomscape_hoya-heart_xs_charcoal-3_retouched_720-324x389.jpg', 'New', '2025-03-23 20:09:01', 'Phạm Hoàng vũ', 'BCN'),
(85, 'Cây Trầu Bà Lá Tim', 'Philodendron Heartle', 'Cây Trầu Bà Lá Tim', 'Cây Trầu Bà Lá Tim leo có lá hình trái tim kỳ lạ', 'Philodendron Heartleaf là một loại cây leo dễ trồng, phát triển nhanh. Lá hình trái tim bóng của nó rủ xuống duyên dáng trên thân dài và phát triển mạnh trong điều kiện ánh sáng yếu đến sáng. Có nguồn gốc từ Châu Phi và Quần đảo Canary, Heartleaf có thể đ', 1200000, 15, 'bloomscape_philodendron-heartleaf_clay_0621-scaled.jpg', '', '2025-03-23 20:18:44', 'Phạm Hoàng vũ', 'HMV'),
(86, 'Cây Thiên Điểu', 'Bird of Paradise', 'Cây Thiên Điểu', 'Với những chiếc lá rộng hình quả chuối và thân cây màu xanh chanh, phiên bản cây Thiên điểu để bàn này sẽ mang đến nét nhiệt đới cho bất kỳ không gian nào.', 'Được coi là nữ hoàng của các loại cây trồng trong nhà, cây Thiên điểu là loài cây nhiệt đới tuyệt đẹp, mang đến nét chấm phá nhiệt đới cho không gian của bạn với những chiếc lá bóng hình quả chuối.\r\n\r\nTương đối khỏe mạnh và thích nghi với ánh sáng gián ti', 1400000, 25, 'bloomscape_bird-of-paradise_medium_clay-scaled-e1626115646986.jpg', '', '2025-03-23 20:22:11', 'Phạm Hoàng vũ', 'HMV'),
(87, 'Cây Bàng Singapore', 'Fiddle Leaf Fig', 'Cây Bàng Singapore', 'Cao, điêu khắc và ấn tượng. Cây này sẽ phát triển mạnh trong điều kiện thích hợp.', 'Cây Fiddle Leaf Fig dễ nhận biết và được yêu thích vì tán lá đặc biệt của nó. Cây cao, ấn tượng này có lá rất lớn, gân lá dày, hình cây vĩ cầm mọc thẳng đứng. Nó không rậm rạp, khiến nó trở thành một vật trang trí nội thất đẹp mắt cho góc sáng sủa hoặc gó', 1400000, 26, 'bloomscape_fiddle-leaf-fig_slate-alt-324x396.jpg', '', '2025-03-23 20:24:08', 'Phạm Hoàng vũ', 'HMV'),
(88, 'Cây Cọ Mèo', 'Chamaedorea cataract', 'Cây Cau Mèo, Cây Cau', 'Cây cọ mèo chắc chắn sẽ trở thành cây được ưa chuộng nhờ vẻ ngoài nhiệt đới tươi tốt và tán lá xanh rậm rạp. Lá mềm mại và thân ngắn của cây cọ mèo mang lại cảm giác như một ốc đảo trong rừng rậm ngay tại chính ngôi nhà của bạn. Là một trong những loại câ', 'Cây Cọ Mèo mang đến nét nhiệt đới sống động mà không cần phải chăm sóc nhiều. Những chiếc lá xanh mỏng dài cong từ thân cây nhỏ gọn tạo cho cây vẻ ngoài tươi tốt. Cây Cọ này phát triển đầy đặn và rậm rạp hơn khi già đi, khiến cây trở nên lý tưởng cho khôn', 900000, 250, 'bloomscape_cat-palm_xxl_clay-324x389.jpg', '', '2025-03-23 20:25:49', 'Phạm Hoàng vũ', 'HMV'),
(89, 'Cây Ngũ Gia Bì', 'Schefflera Amate', 'Cây Ngũ Gia Bì', 'Cây Ngũ Gia Bì Lá Lớn là lựa chọn hoàn hảo cho những ai muốn tạo không gian xanh tươi mát, dễ chăm sóc và mang đến năng lượng tích cực cho ngôi nhà. ', 'Cây Ngũ Gia Bì Lá Lớn là một loại cây cảnh nội thất phổ biến với những chiếc lá bóng loáng, tán rộng và màu xanh rực rỡ. Lá cây mọc thành chùm, tạo nên hình dáng đặc trưng giống bàn tay xòe ra. Cây không chỉ có giá trị thẩm mỹ cao mà còn có tác dụng thanh', 2000000, 15, 'schefflera_amate_l_studio_natural_bamboo.webp', '', '2025-03-23 20:38:15', 'Phạm Hoàng vũ', 'QTGD'),
(90, 'Cây Huyết Dụ Chanh', 'Dracaena Lemon Lime', 'Cây Huyết Dụ Chanh', 'Cây Huyết Dụ Chanh là lựa chọn lý tưởng cho những ai muốn mang sắc xanh rực rỡ vào nhà mà không cần tốn nhiều công chăm sóc.', 'Cây Huyết Dụ Chanh là một loại cây cảnh nội thất đẹp mắt với tán lá dài, mảnh mai và phối màu nổi bật giữa xanh lá, vàng chanh và xanh đậm. Cây mang lại vẻ tươi mới, hiện đại cho không gian sống và làm việc. Đây là một trong những cây có khả năng lọc khôn', 2500000, 150, 'DracaenaLemonLimeLarge_Stone_Black.webp', '', '2025-03-23 20:40:56', 'Phạm Hoàng vũ', 'QTGD'),
(91, 'Cây Hồng Môn', 'Anthurium Lilli', 'Cây Hồng Môn', 'Cây Hồng Môn Nhỏ là một lựa chọn hoàn hảo để thêm sắc hồng nhẹ nhàng và tinh tế vào không gian sống.', 'Cây Hồng Môn Nhỏ là một loài cây cảnh trang trí tuyệt đẹp với những bông hoa màu hồng nhạt lãng mạn và những chiếc lá xanh bóng. Đây là một trong những cây trồng trong nhà phổ biến nhất vì vẻ ngoài thanh lịch và khả năng thích nghi tốt với môi trường tron', 700000, 150, 'AnthuriumliliSmall_Sandy_Pink.webp', '', '2025-03-23 20:44:08', 'Phạm Hoàng vũ', 'QTGD'),
(92, 'Cây Cá Vàng', 'Goldfish Plant', 'Cây Cá Vàng', 'Cây Cá Vàng không chỉ mang lại vẻ đẹp sinh động mà còn giúp làm sạch không khí, là lựa chọn tuyệt vời cho những ai yêu thích cây cảnh trang trí trong nhà.', 'Cây Cá Vàng nổi bật với những bông hoa nhỏ màu cam rực rỡ có hình dáng giống như những chú cá vàng bơi lội, tạo điểm nhấn độc đáo cho không gian. Lá cây xanh bóng, mọng nước và có thể rủ xuống nếu trồng trong giỏ treo, giúp không gian thêm phần mềm mại và', 2500000, 50, 'Goldfish_Plant_Amber_medium_beige_ed8eed78-c11a-4f6f-a11c-6c23145f7869.webp', '', '2025-03-23 20:45:45', 'Phạm Hoàng vũ', 'QTGD'),
(93, 'Cây Xương Rồng Tầm Gửi', 'Mistletoe Cactus', 'Cây Xương Rồng Tầm G', 'Cây Xương Rồng Tầm Gửi là lựa chọn tuyệt vời để treo hoặc đặt trên kệ cao, mang đến vẻ đẹp tinh tế, nhẹ nhàng cho không gian sống.', 'Cây Xương Rồng Tầm Gửi có những cành mảnh mai, mềm mại rủ xuống, tạo nên vẻ ngoài độc đáo và trang nhã. Không giống như hầu hết các loại xương rồng khác, loài cây này không có gai mà thay vào đó là những thân cây dài, xanh tươi, có thể mọc thành từng búi ', 3000000, 100, 'MistletoeCactusSmall_Sandy_Pink.webp', '', '2025-03-23 20:48:08', 'Phạm Hoàng vũ', 'QTGD'),
(94, 'Cây Huyết Giác', 'Dracaena Janet Craig', 'Cây Huyết Giác', 'Cây Huyết Giác Janet Craig Compacta là lựa chọn lý tưởng để mang lại vẻ đẹp tự nhiên và thanh lọc không khí cho không gian sống và làm việc.', 'Cây Huyết Giác Janet Craig Compacta là một phiên bản nhỏ gọn của giống Dracaena Janet Craig. Cây có tán lá xanh đậm, bóng mượt mọc thành từng cụm dày đặc, mang đến vẻ đẹp tinh tế và sang trọng. Với đặc tính dễ chăm sóc, khả năng thích nghi tốt và khả năng', 5000000, 60, 'DracaenajanetcarigcompactaHuge_Sage_Green.webp', '', '2025-03-23 20:51:14', 'Phạm Hoàng vũ', 'QTGD'),
(97, 'Chậu Cây', 'Ecopots', '', 'Với thiết kế tối giản, chậu trồng cây Ecopots tròn 6″ của chúng tôi chắc chắn sẽ kết hợp hoàn hảo với cây của bạn mà không làm lu mờ vẻ đẹp của nó. Được làm từ 80% nhựa tái chế và 20% vật liệu hữu cơ, chậu tròn này có nhiều màu sắc, mỗi màu đều có đĩa tác', 'Không thấm nước, chống tia UV và chống đóng băng, Ecopots rất tuyệt vời để sử dụng cả trong nhà và ngoài trời. Được làm từ vật liệu bền vững, Ecopots được tạo ra với tới 80% nhựa tái chế, phần lớn được thu hoạch từ đại dương. Chậu này có lỗ thoát nước để ', 100000, 150, 'bloomscape_pot-saucer_small_small_clay.jpg', '', '2025-03-24 13:13:36', 'Phạm Hoàng vũ', 'CC');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_user`
--

CREATE TABLE `tb_user` (
  `User_id` int(10) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Fullname` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` varchar(10) NOT NULL,
  `DiaChi` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `CCCD` varchar(20) NOT NULL,
  `SDT` varchar(20) NOT NULL,
  `VaiTro` enum('admin','user') NOT NULL DEFAULT 'user',
  `Hinhanh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_user`
--

INSERT INTO `tb_user` (`User_id`, `Username`, `Fullname`, `Password`, `NgaySinh`, `GioiTinh`, `DiaChi`, `Email`, `CCCD`, `SDT`, `VaiTro`, `Hinhanh`) VALUES
(1, 'admin2810', 'Phạm Hoàng vũ', '281025', '2005-10-28', 'Nam', '11115515151', 'phamhoangvu7373@gmai', '12345', '098645532', 'admin', 'avta_md_admin.jpg'),
(9, 'admin123', 'admin', '123456', '0000-00-00', '0', '', 'admin@gmail.com', '', '', 'admin', 'avta_md_user.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tb_ctdonhang`
--
ALTER TABLE `tb_ctdonhang`
  ADD PRIMARY KEY (`ChiTietDH_id`),
  ADD KEY `MaDH` (`MaDH`);

--
-- Chỉ mục cho bảng `tb_danhmuc_chinh`
--
ALTER TABLE `tb_danhmuc_chinh`
  ADD PRIMARY KEY (`MADM_cha`);

--
-- Chỉ mục cho bảng `tb_danhmuc_con`
--
ALTER TABLE `tb_danhmuc_con`
  ADD PRIMARY KEY (`MADM_con`),
  ADD KEY `MaDM_cha` (`MA_DM_cha`);

--
-- Chỉ mục cho bảng `tb_donhang`
--
ALTER TABLE `tb_donhang`
  ADD PRIMARY KEY (`DonHang_id`),
  ADD KEY `MaKhachHang` (`MaKhachHang`),
  ADD KEY `MASP` (`MASP`);

--
-- Chỉ mục cho bảng `tb_khachhang`
--
ALTER TABLE `tb_khachhang`
  ADD PRIMARY KEY (`KhachHang_id`);

--
-- Chỉ mục cho bảng `tb_sanpham`
--
ALTER TABLE `tb_sanpham`
  ADD PRIMARY KEY (`SanPham_id`),
  ADD KEY `Ma_DM` (`MA_DM_con`),
  ADD KEY `MADM_con` (`MA_DM_con`);

--
-- Chỉ mục cho bảng `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tb_sanpham`
--
ALTER TABLE `tb_sanpham`
  MODIFY `SanPham_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT cho bảng `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `User_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tb_ctdonhang`
--
ALTER TABLE `tb_ctdonhang`
  ADD CONSTRAINT `tb_ctdonhang_ibfk_1` FOREIGN KEY (`MaDH`) REFERENCES `tb_donhang` (`DonHang_id`);

--
-- Các ràng buộc cho bảng `tb_danhmuc_con`
--
ALTER TABLE `tb_danhmuc_con`
  ADD CONSTRAINT `tb_danhmuc_con_ibfk_1` FOREIGN KEY (`MA_DM_cha`) REFERENCES `tb_danhmuc_chinh` (`MADM_cha`);

--
-- Các ràng buộc cho bảng `tb_donhang`
--
ALTER TABLE `tb_donhang`
  ADD CONSTRAINT `tb_donhang_ibfk_1` FOREIGN KEY (`MASP`) REFERENCES `tb_sanpham` (`SanPham_id`),
  ADD CONSTRAINT `tb_donhang_ibfk_2` FOREIGN KEY (`MaKhachHang`) REFERENCES `tb_khachhang` (`KhachHang_id`);

--
-- Các ràng buộc cho bảng `tb_sanpham`
--
ALTER TABLE `tb_sanpham`
  ADD CONSTRAINT `tb_sanpham_ibfk_1` FOREIGN KEY (`MA_DM_con`) REFERENCES `tb_danhmuc_con` (`MADM_con`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
