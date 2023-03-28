-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 31, 2022 lúc 06:01 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`) VALUES
(1, 'Hà Nội'),
(2, 'TP. Hồ Chí Minh'),
(3, 'Đà Nẵng'),
(5, 'Hải Phòng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(1, 'Panasonic'),
(2, 'LG'),
(3, 'SAMSUNG'),
(5, 'Casper'),
(6, 'GREE'),
(15, 'SHARP');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `sort_order` tinyint(4) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `parent_id`, `sort_order`, `created`) VALUES
(1, 'Máy lạnh', 0, 4, '2022-04-22 05:36:13'),
(2, 'Tủ Lạnh', 1, 1, '2022-04-22 05:37:36'),
(3, 'Máy Giặt', 1, 2, '2022-04-22 05:37:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `comm_id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `comm_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comm_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comm_date` datetime NOT NULL,
  `comm_details` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`comm_id`, `prd_id`, `comm_name`, `comm_mail`, `comm_date`, `comm_details`) VALUES
(1, 79, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2021-11-11 20:59:56', 'Sản phẩm chất lượng tốt. chi tiết đẹp'),
(2, 80, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2021-11-11 20:59:56', 'Sản phẩm chất lượng tốt. chi tiết đẹp'),
(3, 80, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2021-11-11 20:59:56', 'Sản phẩm chất lượng tốt. chi tiết đẹp'),
(4, 80, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2021-11-11 20:59:56', 'Sản phẩm chất lượng tốt. chi tiết đẹp'),
(5, 81, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2021-11-11 20:59:56', 'Sản phẩm chất lượng tốt. chi tiết đẹp'),
(6, 81, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2021-11-11 20:59:56', 'Sản phẩm chất lượng tốt. chi tiết đẹp'),
(7, 82, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2021-11-11 20:59:56', 'Sản phẩm chất lượng tốt. chi tiết đẹp'),
(8, 8, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2021-11-11 20:59:56', 'Sản phẩm chất lượng tốt. chi tiết đẹp'),
(9, 9, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2021-11-11 20:59:56', 'Sản phẩm chất lượng tốt. chi tiết đẹp'),
(10, 10, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2021-11-11 20:59:56', 'Sản phẩm chất lượng tốt. chi tiết đẹp'),
(11, 11, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2021-11-11 20:59:56', 'Sản phẩm chất lượng tốt. chi tiết đẹp'),
(12, 12, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2021-11-11 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(13, 13, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2021-11-11 20:59:56', 'Sản phẩm chất lượng tốt. chi tiết đẹp'),
(14, 14, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2021-11-11 20:59:56', 'Sản phẩm chất lượng tốt. chi tiết đẹp'),
(15, 15, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2021-11-11 20:59:56', 'Sản phẩm chất lượng tốt. chi tiết đẹp'),
(16, 16, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2021-11-11 20:59:56', 'Sản phẩm chất lượng tốt. chi tiết đẹp'),
(17, 17, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2021-11-11 20:59:56', 'Sản phẩm chất lượng tốt. chi tiết đẹp'),
(18, 18, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2021-11-11 20:59:56', 'Sản phẩm chất lượng tốt. chi tiết đẹp'),
(19, 19, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2021-11-11 20:59:56', 'Sản phẩm chất lượng tốt. chi tiết đẹp'),
(20, 20, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2021-11-11 20:59:56', 'Sản phẩm chất lượng tốt. chi tiết đẹp'),
(21, 21, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2021-11-11 20:59:56', 'Sản phẩm chất lượng tốt. chi tiết đẹp'),
(22, 22, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2021-11-11 20:59:56', 'Sản phẩm chất lượng tốt. chi tiết đẹp'),
(23, 23, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2021-11-11 20:59:56', 'Sản phẩm chất lượng tốt'),
(24, 24, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2021-11-11 20:59:56', 'Sản phẩm chất lượng tốt'),
(25, 25, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2021-11-11 20:59:56', 'Sản phẩm chất lượng tốt. chi tiết đẹp'),
(26, 26, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(27, 27, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(28, 28, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(29, 29, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(30, 30, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(57, 25, 'Nguyễn Việt Anh', 'anh.nv187292@sis.hust.edu.vn', '2021-11-28 16:59:12', '<p>aaaa</p>\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employeei`
--

CREATE TABLE `employeei` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_mail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `user_level` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `employeei`
--

INSERT INTO `employeei` (`user_id`, `user_name`, `user_mail`, `user_pass`, `user_level`) VALUES
(1, 'Nguyễn Hoàng Anh', 'admin@gmail.com', '123', 0),
(5, 'Nguyễn Tuấn Linh', 'nvquanly@gmail.com', '123456', 1),
(2, 'Nguyễn Văn Hoàng Anh', 'nvkho@gmail.com', '123', 2),
(6, 'Nguyễn Việt Anh', 'ngva@gmail.com', '12345', 1),
(7, 'Trần Đình Văn', 'ngva@gmail.com', '123', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `name1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `mail` text COLLATE utf8_unicode_ci NOT NULL,
  `address1` text COLLATE utf8_unicode_ci NOT NULL,
  `date1` datetime NOT NULL,
  `timestamp` int(255) NOT NULL,
  `totals_price` int(11) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `manage_id` int(11) NOT NULL,
  `shipper_id` int(11) NOT NULL,
  `stocker_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `name1`, `phone`, `mail`, `address1`, `date1`, `timestamp`, `totals_price`, `status`, `manage_id`, `shipper_id`, `stocker_id`) VALUES
(100123, 'f', 4, 'nguyena@gmail.com', 'f', '2022-07-30 20:35:47', 1659188147, 24000000, '0', 1, 0, 7),
(100124, 'Nguyễn Giang', 4, 'ANH.NVH187290@sis.hust.edu.vn', 'Hải Dương', '2022-07-28 23:06:17', 1649097177, 24000000, '0', 1, 4, 7),
(100125, 'Trần Minh', 4, 'ANH.NVH187290@sis.hust.edu.vn', 'Ninh Bình', '2022-07-30 23:12:17', 1659197537, 24000000, '3', 0, 0, 0),
(100126, 'f', 4, 'ANH.NVH187290@sis.hust.edu.vn', 'f', '2022-07-30 23:16:21', 1659117781, 24000000, '3', 0, 0, 0),
(100127, 'f', 4, 'anh.nvh187290@sis.hust.edu.vn', 'f', '2022-07-30 23:30:33', 1659198633, 24000000, '3', 0, 0, 0),
(100128, 'f', 4, 'ANH.NVH187290@sis.hust.edu.vn', 'f', '2022-07-30 23:34:33', 1659198873, 24000000, '3', 0, 0, 0),
(100129, 'f', 4, 'anh.nvh187290@sis.hust.edu.vn', 'f', '2022-07-30 23:41:57', 1659199317, 24000000, '3', 0, 0, 0),
(100130, 'f', 4, 'ANH.NVH187290@sis.hust.edu.vn', 'f', '2022-07-30 23:46:57', 1659199617, 24000000, '3', 0, 0, 0),
(100131, 'f', 4, 'nguyena123e@gmail.com', 'f', '2022-07-31 00:12:40', 1659201160, 24000000, '3', 0, 0, 0),
(100132, 'f', 4, 'nguyena123e@gmail.com', 'f', '2022-07-31 00:15:59', 1659201359, 24000000, '3', 0, 0, 0),
(100133, 'f', 4, 'nguyena123e@gmail.com', 'f', '2022-07-31 08:42:28', 1659231748, 24000000, '3', 0, 0, 0),
(100134, 'f', 4, 'nguyenanhdkm12@gmail.com', 'f', '2022-07-31 08:45:21', 1659231921, 24000000, '0', 1, 2, 5),
(100135, 'f', 4, 'nguyenanhdkm12@gmail.com', 'f', '2022-07-31 08:48:03', 1659232083, 24000000, '0', 1, 6, 7),
(100137, 'f', 4, 'anh.nvh187290@sis.hust.edu.vn', 'f', '2022-07-31 19:06:03', 1659269163, 24000000, '0', 1, 3, 7),
(100138, 'Nguyễn Hoàng Anh', 123456, 'anh.nvh187290@sis.hust.edu.vn', 'Hà Nội', '2022-07-31 21:46:55', 1659278815, 75000000, '0', 1, 2, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id_details` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `prd_count` int(10) NOT NULL,
  `prd_price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id_details`, `id`, `prd_id`, `prd_count`, `prd_price`) VALUES
(314, 100121, 94, 1, 15000000),
(315, 100122, 94, 1, 15000000),
(316, 100123, 93, 1, 24000000),
(317, 100124, 93, 1, 24000000),
(318, 100125, 93, 1, 24000000),
(319, 100126, 93, 1, 24000000),
(320, 100127, 93, 1, 24000000),
(321, 100128, 93, 1, 24000000),
(322, 100129, 93, 1, 24000000),
(323, 100130, 93, 1, 24000000),
(324, 100131, 93, 1, 24000000),
(325, 100132, 93, 1, 24000000),
(326, 100133, 93, 1, 24000000),
(327, 100134, 93, 1, 24000000),
(328, 100135, 93, 1, 24000000),
(329, 100136, 93, 1, 24000000),
(330, 100137, 93, 1, 24000000),
(331, 100138, 94, 5, 15000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `prd_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL COMMENT 'danh mục',
  `brand_id` int(11) NOT NULL COMMENT 'hãng',
  `prd_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_price` decimal(15,2) NOT NULL DEFAULT 0.00 COMMENT 'giá tiền',
  `power` int(40) NOT NULL COMMENT 'công suất',
  `prd_image` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'link ảnh',
  `prd_new` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'xuất xứ',
  `content` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'mô tả',
  `prd_featured` int(255) NOT NULL COMMENT 'nối bật',
  `prd_status` int(11) NOT NULL COMMENT 'trạng thái',
  `prd_warranty` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'bảo hành'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`prd_id`, `cat_id`, `brand_id`, `prd_name`, `prd_price`, `power`, `prd_image`, `prd_new`, `content`, `prd_featured`, `prd_status`, `prd_warranty`) VALUES
(79, 1, 5, 'Điều hòa Casper inverter 1 chiều 12000bt', '3500000.00', 5000, '2124_dieu_hoa_casper_inverter_1_chieu_12000_btu_gc_12is32.jpg', 'Nhật Bản', '<h5> 1. Ưu điểm của sản phẩm <h5><br>\r\n- Sử dụng gas thân thiện với môi tường <br>\r\n- Thiết kế hiện đại, trang nhã<br>\r\n- Vận hành êm ái<br>\r\n- Tiết kiệm điện năng<br><br>\r\n<h5> 2. Tính năng và đặc điểm <h5><br>\r\n<b>TIẾT KIỆM ĐIỆN NĂNG - CÔNG NGHỆ I-SAVING CỦA ĐIỀU HÒA GSC-09IP25 <b><br>\r\n\r\n- Máy nén 1Hz + AI + 0.3W Standby<br>\r\nĐỘ BỀN CAO - DÀN TẢN NHIỆT ĐỒNG <br>\r\n\r\n- Tăng hiệu năng làm lạnh cho điều hòa -Casper GSC-09IP25. <br>\r\n- Tăng khả năng chống mài mòn.<br>\r\n- Tăng tuổi thọ của dàn.<br>\r\n<h4>THOẢI MÁI & TIỆN NGHI<h4>\r\n\r\n- 4D swing - Đảo gió 4 chiều tự động.<br>\r\n- TURBO- Làm lạnh nhanh tức thì.<br>\r\n- iClean- Tự làm sạch dàn.<br>\r\n- iFeel- Tự động cảm biến nhiệt độ.<br><br>\r\n\r\n<h5>3. Công ty cổ phần Tuan Bao cam kết: <h5>\r\n- Sản phẩm giá tốt chất lượng ổn định<br>\r\n- Cam kết giao hàng trong ngày<br>\r\n- Lắp đặt chuẩn quy trình<br>\r\n- Phụ kiện chuẩn hãng<br>\r\n- Bảo hành dài hạn<br>', 1, 1, '12 tháng'),
(80, 1, 5, 'Điều hòa Casper inverter 1 chiều 12000btu', '3500000.00', 5000, '2124_dieu_hoa_casper_inverter_1_chieu_12000_btu_gc_12is32.jpg', 'Nhật Bản', '<h5> 1. Ưu điểm của sản phẩm <h5>\r\n- Sử dụng gas thân thiện với môi tường <br>\r\n- Thiết kế hiện đại, trang nhã<br>\r\n- Vận hành êm ái<br>\r\n- Tiết kiệm điện năng <br><br>\r\n\r\n<h5> 2. Tính năng và đặc điểm <h5>\r\nTIẾT KIỆM ĐIỆN NĂNG - CÔNG NGHỆ I-SAVING CỦA ĐIỀU HÒA GSC-09IP25<br>\r\n\r\n- Máy nén 1Hz + AI + 0.3W Standby<br>\r\n- Tăng hiệu năng làm lạnh cho điều hòa -Casper GSC-09IP25. <br>\r\n- Tăng khả năng chống mài mòn.<br>\r\n- Tăng tuổi thọ của dàn.<br><br>\r\n<h5>THOẢI MÁI & TIỆN NGHI<h5>\r\n\r\n- 4D swing - Đảo gió 4 chiều tự động.<br>\r\n- TURBO- Làm lạnh nhanh tức thì.<br>\r\n- iClean- Tự làm sạch dàn.<br>\r\n- iFeel- Tự động cảm biến nhiệt độ.<br><br>\r\n\r\n<h5>3. Công ty cổ phần Tuan Bao cam kết: <h5>\r\n- Sản phẩm giá tốt chất lượng ổn định<br>\r\n- Cam kết giao hàng trong ngày<br>\r\n- Lắp đặt chuẩn quy trình<br>\r\n- Phụ kiện chuẩn hãng<br>\r\n- Bảo hành dài hạn<br>', 1, 0, '12 tháng'),
(81, 1, 5, 'Điều hòa Casper inverter 1 chiều 12000b', '3500000.00', 5000, '2124_dieu_hoa_casper_inverter_1_chieu_12000_btu_gc_12is32.jpg', 'Nhật Bản', '<b> 1. Ưu điểm của sản phẩm <b>\r\nSử dụng gas thân thiện với môi tường\r\nThiết kế hiện đại, trang nhã\r\nVận hành êm ái\r\nTiết kiệm điện năng\r\n<b> 2. Tính năng và đặc điểm <b>\r\n<h4>TIẾT KIỆM ĐIỆN NĂNG - CÔNG NGHỆ I-SAVING CỦA ĐIỀU HÒA GSC-09IP25 <h4>\r\n\r\nMáy nén 1Hz + AI + 0.3W Standby\r\nĐỘ BỀN CAO - DÀN TẢN NHIỆT ĐỒNG \r\n\r\nTăng hiệu năng làm lạnh cho điều hòa Casper GSC-09IP25.\r\nTăng khả năng chống mài mòn.\r\nTăng tuổi thọ của dàn.\r\n<h4>THOẢI MÁI & TIỆN NGHI<h4>\r\n\r\n4D swing - Đảo gió 4 chiều tự động.\r\nTURBO- Làm lạnh nhanh tức thì.\r\niClean- Tự làm sạch dàn.\r\niFeel- Tự động cảm biến nhiệt độ.\r\n\r\n3. Công ty cổ phần Tuan Bao cam kết:\r\n- Sản phẩm giá tốt chất lượng ổn định\r\n- Cam kết giao hàng trong ngày\r\n- Lắp đặt chuẩn quy trình\r\n- Phụ kiện chuẩn hãng\r\n- Bảo hành dài hạn', 1, 1, '12 tháng'),
(82, 1, 5, 'Điều hòa Casper inverter 1 chiều 12000', '3500000.00', 1200, '2124_dieu_hoa_casper_inverter_1_chieu_12000_btu_gc_12is32.jpg', 'Nhật Bản', '', 1, 1, '12 tháng'),
(90, 3, 3, 'Máy giặt Samsung Inverter 9 Kg ', '13000000.00', 9000, '2407_1651961.jpg', ' Hàn Quốc', '', 0, 1, '12 tháng'),
(93, 2, 3, 'Tủ lạnh Sharp Inverter 605 lít', '24000000.00', 12000, '1433_tu_lanh_samsung_660l_rs64r53012c_sv_nen1.jpg', ' Hàn Quốc', '', 1, 1, '12 tháng'),
(92, 3, 3, 'Máy giặt Panasonic 8.5 Kg', '5000000.00', 9000, '2500_wd95t4046ce.jpg', ' Nhật Bản', '', 1, 1, '12 tháng'),
(94, 2, 15, 'Tủ lạnh SHARP Inverter 635 Lít ', '15000000.00', 9000, '2750_hsry636.jpg', ' Hàn Quốc', '', 1, 1, '12 tháng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `property`
--

CREATE TABLE `property` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tên đặc tính',
  `cat_id` int(11) NOT NULL COMMENT 'mã danh mục'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `property`
--

INSERT INTO `property` (`pro_id`, `pro_name`, `cat_id`) VALUES
(1, 'inverter', 1),
(2, 'capacity', 2),
(3, 'type', 1),
(4, 'type', 2),
(5, 'type', 3),
(6, 'mass', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `property_details`
--

CREATE TABLE `property_details` (
  `prdt_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pdt_val` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'giá trị đặc tính',
  `prd_id` int(11) NOT NULL COMMENT 'mã sản phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `property_details`
--

INSERT INTO `property_details` (`prdt_id`, `pro_id`, `pdt_val`, `prd_id`) VALUES
(2, 1, '1', 79),
(3, 1, '1', 80),
(4, 1, '0', 81),
(5, 1, '1', 82),
(6, 3, '1', 79),
(7, 3, '1 ', 80),
(8, 3, '0 ', 81),
(9, 3, '1 ', 82),
(10, 1, '1', 95),
(11, 3, '1', 96),
(12, 1, '1', 97),
(13, 3, '1', 97),
(14, 3, '1', 95),
(15, 1, '1', 96);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipper`
--

CREATE TABLE `shipper` (
  `shipper_id` int(11) NOT NULL,
  `shipper_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(10) NOT NULL,
  `shipper_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shipper`
--

INSERT INTO `shipper` (`shipper_id`, `shipper_name`, `phone`, `shipper_mail`, `status`) VALUES
(1, 'Nguyễn Văn A', 12345, 'nguyenvana@gmail.com', 1),
(2, 'Nguyễn Văn B', 12345, 'nguyenvanb@gmail.com', 1),
(3, 'Nguyễn Văn D', 12345, 'Nguyen D', 1),
(4, 'Nguyễn Văn E', 12345, 'Nguyen E', 1),
(5, 'Nguyễn Tuấn', 12345, 'tuan@gmail.com', 1),
(6, 'Nguyễn Sơn', 12345, 'tuan@gmail.com', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_full` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_full`, `user_mail`, `user_pass`) VALUES
(1, 'Nguyễn Văn Hoàng Anh', 'zshop@gmail.com', '123'),
(2, 'Nguyễn Việt Anh', 'admin@gmail.com', '123456'),
(3, 'Nguyễn Van A', 'nguyenvana@gmail.com', '123456'),
(11, 'Nguyễn Tuấn Linh', 'tuanlinhbk0010@gmail.com', '123');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comm_id`);

--
-- Chỉ mục cho bảng `employeei`
--
ALTER TABLE `employeei`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id_details`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prd_id`);

--
-- Chỉ mục cho bảng `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`pro_id`);

--
-- Chỉ mục cho bảng `property_details`
--
ALTER TABLE `property_details`
  ADD PRIMARY KEY (`prdt_id`);

--
-- Chỉ mục cho bảng `shipper`
--
ALTER TABLE `shipper`
  ADD PRIMARY KEY (`shipper_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_mail` (`user_mail`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `comm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `employeei`
--
ALTER TABLE `employeei`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100139;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=332;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `prd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT cho bảng `property`
--
ALTER TABLE `property`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `property_details`
--
ALTER TABLE `property_details`
  MODIFY `prdt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `shipper`
--
ALTER TABLE `shipper`
  MODIFY `shipper_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
