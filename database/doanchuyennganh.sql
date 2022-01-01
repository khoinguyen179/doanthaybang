-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th1 01, 2022 lúc 03:18 AM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doanchuyennganh`
--
CREATE DATABASE IF NOT EXISTS `doanchuyennganh` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `doanchuyennganh`;

DELIMITER $$
--
-- Thủ tục
--
DROP PROCEDURE IF EXISTS `capnhatgia`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `capnhatgia` (IN `ma_sach` VARCHAR(15), IN `gia_moi` INT(10))  BEGIN
UPDATE sach
SET gia=gia_moi
WHERE masach=ma_sach;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `maadmin` char(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `matkhau` varchar(32) DEFAULT NULL,
  `hoten` varchar(100) CHARACTER SET utf8 NOT NULL,
  `quyen` int(1) NOT NULL COMMENT '1:  supper admin, 2:nhan viên, 3:...',
  PRIMARY KEY (`maadmin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`maadmin`, `username`, `matkhau`, `hoten`, `quyen`) VALUES
('adm1', 'admin1', 'b59c67bf196a4758191e42f76670ceba', 'admin1', 1),
('adm2', 'admin2', '2222', 'admin', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

DROP TABLE IF EXISTS `chitietdonhang`;
CREATE TABLE IF NOT EXISTS `chitietdonhang` (
  `mact` int(11) NOT NULL AUTO_INCREMENT,
  `madh` char(10) NOT NULL,
  `masp` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  PRIMARY KEY (`mact`),
  KEY `masp` (`masp`),
  KEY `madh` (`madh`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`mact`, `madh`, `masp`, `soluong`) VALUES
(2, 'dh9680', 'th04', 4),
(3, 'dh9680', 'th10', 2),
(4, 'dh9680', 'ca01', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethd`
--

DROP TABLE IF EXISTS `chitiethd`;
CREATE TABLE IF NOT EXISTS `chitiethd` (
  `mahd` varchar(100) NOT NULL,
  `masach` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `soluong` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `gia` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`mahd`,`masach`),
  KEY `masach` (`masach`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `chitiethd`
--

INSERT INTO `chitiethd` (`mahd`, `masach`, `soluong`, `gia`) VALUES
('abcd@yahoo.com1541841165', 'th03', 2, 76000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `masp` varchar(15) CHARACTER SET latin1 NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text CHARACTER SET latin1 NOT NULL,
  `ngaydang` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `masp`, `name`, `email`, `comment`, `ngaydang`) VALUES
(1, 'ca03', 'Khoi', 'khoi179@gmail.com', 'good', '2021-12-27 03:59:13'),
(2, 'ca03', 'Khoi', 'khoi179@gmail.com', 'good', '2021-12-27 03:59:56'),
(3, 'th11', 'hào', 'haole@gmail.com', 'good', '2021-12-29 14:04:33'),
(4, 'th11', 'hào', 'haole@gmail.com', 'good', '2021-12-29 14:04:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE IF NOT EXISTS `donhang` (
  `madh` char(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ThoiDiemDatHang` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tennguoinhan` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `emailnguoinhan` varchar(200) DEFAULT NULL,
  `sdtnguoinhan` varchar(50) DEFAULT NULL,
  `diachinhanhang` varchar(100) DEFAULT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT '0',
  `ghichucuakh` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`madh`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`madh`, `email`, `ThoiDiemDatHang`, `tennguoinhan`, `emailnguoinhan`, `sdtnguoinhan`, `diachinhanhang`, `trangthai`, `ghichucuakh`) VALUES
('dh9680', 'khoi179@gmail.com', '2022-01-01 01:03:42', 'khoi', 'abc@gmail.com', '0564919813', 'nhà bè', 0, 'avb');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

DROP TABLE IF EXISTS `hoadon`;
CREATE TABLE IF NOT EXISTS `hoadon` (
  `mahd` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  `ngayhd` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tennguoinhan` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `diachinguoinhan` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaynhan` date NOT NULL DEFAULT '0000-00-00',
  `dienthoainguoinhan` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`mahd`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`mahd`, `email`, `ngayhd`, `tennguoinhan`, `diachinguoinhan`, `ngaynhan`, `dienthoainguoinhan`) VALUES
('abcd@yahoo.com1541840637', 'abcd@yahoo.com', '2018-11-10 16:03:57', 'a', 'b', '2018-11-22', '1234567'),
('abcd@yahoo.com1541840769', 'abcd@yahoo.com', '2018-11-10 16:06:09', 'a', 'b', '2018-11-22', '1234567'),
('abcd@yahoo.com1541841019', 'abcd@yahoo.com', '2018-11-10 16:10:19', 'a', 'b', '2018-11-22', '1234567'),
('abcd@yahoo.com1541841165', 'abcd@yahoo.com', '2018-11-10 16:12:45', 'a', 'g', '2018-11-15', '1234567'),
('abcd@yahoo.com1541907522', 'abcd@yahoo.com', '2018-11-11 10:38:42', 'a', 'v', '2018-11-22', '132546457'),
('abcd@yahoo.com1541909715', 'abcd@yahoo.com', '2018-11-11 11:15:15', 'a', 's', '2018-11-22', '5436546');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE IF NOT EXISTS `khachhang` (
  `makh` char(10) NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  `matkhau` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tenkh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dienthoai` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `makh` (`makh`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`makh`, `email`, `matkhau`, `tenkh`, `diachi`, `dienthoai`) VALUES
('kh01', 'abcd@yahoo.com', 'abcd', 'ABCD', 'Q1', '99999999'),
('khyeukin', 'haole@king.com', 'b7188ba96d107cbc2ba284b179b1e67a', 'haoyeuking', 'Q8', '0123456789'),
('khi', 'khoi179@gmail.com', '83b28300f99ba50a44c75134ba22bcf6', 'khoi', 'nhà bè', '0796969696'),
('kh02', 'xyz@gmail.com', 'xyz', 'XYZ', 'Quận 3', '090090999');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

DROP TABLE IF EXISTS `loai`;
CREATE TABLE IF NOT EXISTS `loai` (
  `maloai` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tenloai` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`maloai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`maloai`, `tenloai`) VALUES
('ca', 'Cá, tép cảnh'),
('cay', 'Cây thủy sinh'),
('den', 'Đèn thủy sinh'),
('ml', 'Máy lọc, vật liệu lọc'),
('ms', 'Máy sủi oxi, bơm, máy sưởi'),
('pn', 'Phân nền, cốt nền');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `masp` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tensp` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `donvitinh` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `dongia` int(10) NOT NULL,
  `hinh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `stttonkho` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maloai` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xuatsu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `luotxem` int(11) DEFAULT NULL,
  `thongtin` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`masp`),
  KEY `maloai` (`maloai`),
  KEY `stttonkho` (`stttonkho`,`maloai`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `donvitinh`, `dongia`, `hinh`, `stttonkho`, `maloai`, `xuatsu`, `luotxem`, `thongtin`) VALUES
('ca01', 'Cá mún Panda', 'con', 10000, 'CaMunPanDa10k.png', 'tk01', 'ca', 'Nước ngoài', 16348, 'Tên khoa học: Xiphophorus spp. Thuộc bộ cá sóc (Cyprinodontiformes) Họ: cá khổng tước (Poeciliidae) Thuộc loài: Xiphophorus maculatus, Xiphophorus variatus, Xiphophorus xiphidium (cá Hòa Lan trên thị trường rất hiếm gặp dạng cá thuần chủng) Tên gọi khác: Hột Lựu, Hòa Lan, Mún Lùn, Hồng Mi (nhiều tên dễ sợ) Tên tiếng anh khác: Variable platy; Sunset platy; Red balloon platy.'),
('ca02', 'Cá Neon Hoàng đế', 'con', 25000, 'CaNeonHoangDe25k.png', 'tk02', 'ca', 'Nước ngoài', 20102, 'Tổ tiên của loài cá này sống ở Columbia, miền bắc Nam Mỹ, nhưng loài cá này được sinh sản và nuôi dưỡng tại một trang trại cá nổi tiếng, và những con cá neon này hiện sống trong nhiều bể cá trên khắp thế giới.'),
('ca03', 'Cá phượng hoàng ngũ sắc', 'con', 80000, 'CaPhuongHoangNguSac80k.png', 'tk02', 'ca', 'Nước ngoài', 19475, 'Đây là giống cá cảnh thuộc dòng chili – một trong những loại cá cảnh được nuôi rất phổ biến trong các hồ thủy sinh hiện nay. Giống cá này được rất nhiều người chơi cá cảnh yêu thích. Bởi nó có màu sắc rất đẹp và bắt mắt. Đặc biệt, so với các loài cá khác thì cá ngũ sắc lại rất dễ nuôi và chăm sóc.'),
('ca04', 'Cá thủy tinh Ấn Độ', 'con', 30000, 'CaThuyTinhAnDo30k.png', 'tk01', 'ca', 'Nước ngoài', 22475, 'Tên tiếng Latin: Parambassis ranga  - Nhiệt độ: 20 - 20 độ C  - pH: 6,5 - 8  - Kích thước trưởng thành: 7cm   - Nguồn gốc: Cá Thuỷ Tinh Ấn Độ là một loài cá nước ngọt thuộc họ cá thủy tinh Asiatic Ambassidae có nguồn gốc từ một khu vực của Nam Á từ Pakistan đến Malaysia.'),
('hl1', 'Hao Le', 'thằng', 1000000, '94120839_215647936402081_4119244326901383168_n.png', 'tk01', 'ml', 'Đồng Tháp', 0, 'Đẹp trai, học giỏi, độc thân, yếu.'),
('th01', 'Máy lọc XBL', 'cái', 310000, 'LocXBL.jpg', 'tk02', 'ml', 'VIệt Nam', 13451, 'Chất liệu: Nhựa Tương thích: Bể nước ngọt và mặn Lưu lượng: 500 lít/h Công suất: 7W Cường độ âm thanh: <35dB'),
('th02', 'Đèn thủy sinh ONF FLAT One', 'cái', 2200000, 'DenThuySinhONFFlatOne.png', 'tk02', 'den', 'Nước ngoài', 23669, 'Phạm vi quang phổ ngắn hơn 3000k tới 6500k Hiệu chỉnh ánh sáng theo chu kì như một ngày bình thường của thực vật ngoài tự nhiên từ thấp lên cao. Chế độ tắt mở đèn sáng dần và tối dần không như phiên bản cũ tắt mở dột ngột khiến cá, tép bên trong hồ thủy sinh bị hoảng loạn. Sử dụng chung app với Flat nano+ Bạn không cần bận tâm tới vấn đề mất điện bởi bộ nhớ của đèn đã được cải tiến so với bản 1, đèn sẽ tự động nhớ lại các thông số cài đặt của bạn ngay cả khi mất điện.'),
('th03', 'Đèn thủy sinh ONF FLAT One cao cấp', 'cái', 9500000, 'DenThuySinhCaoCapONFFlatOne.png', 'tk02', 'den', 'Việt Nam', 16228, 'Đèn LED thủy sinh ONF FlatOne Plus 90 là bản cải tiến từ người anh em tiền nhiệm Flat One 90 , sản phẩm cao cấp được bình chọn là chiếc đèn có mẫu thiết kế đẹp nhất trong 5 năm liền tại Reddot Award 2016 . Phiên bản Flat One Plus 90 được trình làng vào đầu năm 2020 , hứa hẹn là sản phẩm được giới người chơi thủy sinh lựa chọn cho bể thủy sinh của mình .'),
('th04', 'Vật liệu lọc Matrix', 'lít', 250000, 'VLLMatrix1.png', 'tk02', 'ml', 'Việt Nam', 22669, 'Vật liệu lọc Matrix như một ngôi nhà, một giá thể để các chủng vi sinh có thể cư trú và phát triển. Đây là dòng vật liệu lọc sinh học có độ xốp rất cao, với diện tích bề mặt lớn, có thể chứa được rất nhiều vi sinh trên đó và xử lý độc tố trong bể thủy sinh và cá cảnh.'),
('th05', 'Cây dừa cọ', 'cây', 8000, 'CayDuaCo.png', 'tk07', 'cay', 'Việt Nam', 14786, 'Rêu Cọ Dừa có tên khoa học là Climacium japonicum thuộc họ Climaciaceae. Đây là loại rêu có nguồn gốc chủ yếu ở Đông Á và được tìm thấy nhiều ở các vùng đầm lầy trong các khu rừng.Đây là loại rêu có hình dáng giống như cây cọ dừa nên được gọi với cái tên là Rêu Cọ Dừa. Đây là loại rêu sinh trưởng và phát triển chậm trong bể thủy sinh. Loại rêu này chủ yếu được trồng làm cây bán cạn.'),
('th06', 'Cỏ Narong', 'cây', 20000, 'CoNaRong.png', 'tk02', 'cay', 'Nước ngoài', 12448, 'Cỏ Narong, còn có tên khoa học là: Cỏ Narong, là một loài thực vật có nguồn gốc từ Đông Nam Á, được biết đến rộng rãi, đặc biệt là ở Thái Lan, nơi nó mọc cả chìm hoặc chìm, trên các bờ nước đọng hoặc nước chảy chậm.  Cỏ Narong tạo ra những chiếc lá dài uốn cong thanh lịch dọc theo cột nước. Mặc dù thực tế là cây kiểu “hoa thị”, nó phát triển một hệ thống rễ rất nhỏ. Nhiều cây nhỏ hơn được tạo ra ở phần gốc của các mẫu vật khỏe mạnh, ổn định tốt.'),
('th07', 'Cốt nền thủy sinh Magic Base', 'hộp', 150000, 'CotNenThuySinhMagicBase.png', 'tk05', 'pn', 'Việt Nam', 16699, 'Cốt nền Magic Base Plus (MB Plus) là dòng sản phẩm cốt nền thủy sinh siêu dưỡng của anh Hồ Anh Tuấn.Hạt nền ở dạng viên nén, dễ sử dụng và sạch sẽ hơn so với dạng bùn trước đây MB Plus chứa nhiều dinh dưỡng, đầy đủ đa vi lượng, giúp cây phát triển toàn diện Được phát triển và hoàn thiện bởi anh Hồ Anh Tuấn, tác giả của nhiều hồ thủy sinh phong cách Hà Lan rực rỡ Cốt nền Magic Base Plus cung cấp lượng dinh dưỡng dồi dào, tiết kiệm chi phí tối đa Hỗ trợ ức chế rêu hại, không cần thay nước nhiều trong giai đoạn ban đầu như một số loại nền trộn khác MB Plus đã được xử lý kĩ, hoàn toàn không có trứng ốc hại'),
('th08', 'Máy sủi oxy', 'cái', 80000, 'MaySuiOxi.png', 'tk02', 'ms', 'Việt Nam', 15447, 'Máy sủi oxy tích điện nổi bật hơn so với nhiều dòng sản phẩm máy sủi oxy khác ở khả năng tích điện, trong trường hợp mất điện, máy vẫn có thể hoạt động trong một khoảng thời gian nhất định mà không gây ảnh hưởng đến lượng oxy cung cấp cho hồ cá.'),
('th09', 'Phân nền DAD', 'bao', 340000, 'PhanNenDAD.png', 'tk05', 'pn', 'Nước ngoài', 16635, 'Phân nền ADA Aquasoil Amazonia NEW (ADA Nature Aquarium Aqua Soil) (bao 7 kg, 9 lít) Nhà sản xuất ADA là một thương hiệu đã rất nổi tiếng trên thế giới và cũng được giới thủy sinh Việt Nam ưa thích sử dụng. Phân nền cho thủy sinh ADA Amazonia (ADA Nature Aquarium Aqua Soil) (bao 7 kg) là nguyên vật liệu có chất lượng đẳng cấp và không cần bàn cãi, thuysinh365.com hân hạnh cung cấp cho quý khách ADA chính hãng của Nhật Bản với giá ưu đãi nhất hiện nay.'),
('th10', 'Ráy NANA cẩm thạch', 'ngọn', 250000, 'RayNanaCmThach.png', 'tk05', 'cay', 'Việt Nam', 35886, 'Thuộc loại ráy nhưng yêu cầu về nước, dinh dưỡng, ánh sáng, co2 khó hơn nhiều so với những loại ráy khác. Nếu bị khuất sáng, ráy trắng thường mất màu trắng nhanh, dễ bị rữa lá và rêu hại tấn công. Tương tự như vậy, thiếu co2 làm ráy trắng hồi biến về xanh cực nhanh và dễ rụng lá.'),
('th11', 'Rêu mini Taiwan', 'vỉ', 80000, 'ReuMiniTaiwan.png', 'tk01', 'cay', 'Nước ngoài', 24471, 'Rêu Mini Taiwan là một loại rêu trong họ Hypnaceae, có tên khoa học là Taxiphyllum alternans. Loại rêu này phân bố chủ yếu ở Đông Á, một số nơi ở Đông Nam Á cũng có. Chúng thường mọc ở khe suối, thác nước, đất đá và những thanh gỗ lũa mục ở các đầm lầy.'),
('th12', 'Thức ăn cá cảnh', 'gói', 20000, 'ThucAnCaCanh.png', 'tk01', 'cay', 'Việt Nam', 16335, 'Hiện nay, nuôi cá cảnh là một sở thích được nhiều người rất ưa chuộng bởi sự dễ thương,gần gũi và yên bình mà chúng mai lại cho chủ nuôi. Tuy nhiên, chúng ta lại có rất ít kiến thức để chăm sóc cá cảnh sao cho tốt nhất, đặc biệt là về các loại thức ăn tốt cho cá cũng như liều lượng phù hợp cho mỗi lần ăn.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

DROP TABLE IF EXISTS `tbl_giohang`;
CREATE TABLE IF NOT EXISTS `tbl_giohang` (
  `giohang_id` int(11) NOT NULL AUTO_INCREMENT,
  `tensanpham` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sanpham_id` char(10) NOT NULL,
  `giasanpham` varchar(100) NOT NULL,
  `hinhanh` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL,
  PRIMARY KEY (`giohang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbl_giohang`
--

INSERT INTO `tbl_giohang` (`giohang_id`, `tensanpham`, `sanpham_id`, `giasanpham`, `hinhanh`, `soluong`) VALUES
(8, 'Ráy NANA cẩm thạch', 'th10', '250000', 'RayNanaCmThach.png', 1),
(9, 'Cá mún Panda', 'ca01', '10000', 'CaMunPanDa10k.png', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tonkho`
--

DROP TABLE IF EXISTS `tonkho`;
CREATE TABLE IF NOT EXISTS `tonkho` (
  `stttonkho` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `soluongnhap` int(11) NOT NULL,
  `soluongxuat` int(11) NOT NULL,
  `tondauky` int(11) NOT NULL,
  `toncuoiky` int(11) NOT NULL,
  `soluongton` int(11) NOT NULL,
  PRIMARY KEY (`stttonkho`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tonkho`
--

INSERT INTO `tonkho` (`stttonkho`, `soluongnhap`, `soluongxuat`, `tondauky`, `toncuoiky`, `soluongton`) VALUES
('tk01', 0, 0, 0, 0, 0),
('tk02', 0, 0, 0, 0, 0),
('tk03', 0, 0, 0, 0, 0),
('tk04', 0, 0, 0, 0, 0),
('tk05', 0, 0, 0, 0, 0),
('tk06', 0, 0, 0, 0, 0),
('tk07', 0, 0, 0, 0, 0);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `madh` FOREIGN KEY (`madh`) REFERENCES `donhang` (`madh`),
  ADD CONSTRAINT `masp` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Các ràng buộc cho bảng `chitiethd`
--
ALTER TABLE `chitiethd`
  ADD CONSTRAINT `chitiethd_ibfk_1` FOREIGN KEY (`mahd`) REFERENCES `hoadon` (`mahd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitiethd_ibfk_2` FOREIGN KEY (`masach`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `email` FOREIGN KEY (`email`) REFERENCES `khachhang` (`email`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`email`) REFERENCES `khachhang` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`stttonkho`) REFERENCES `tonkho` (`stttonkho`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`maloai`) REFERENCES `loai` (`maloai`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
