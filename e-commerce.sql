-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 22, 2019 at 04:17 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Điện Thoại'),
(2, 'Máy Tính'),
(3, 'Đồng hồ');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(5) NOT NULL,
  `category_id` int(10) NOT NULL,
  `price` int(15) NOT NULL,
  `detail` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `quantity`, `category_id`, `price`, `detail`, `image`) VALUES
(3, 'Iphone 7 Plus', 11, 1, 10990000, '\r\n\r\nChính hãng, nguyên seal, mới 100%\r\n\r\nThiết kế: Nguyên khối, mặt kính cong 2.5D\r\n\r\nMàn hình: 5.5 inch, Full HD (1080 x 1920 pixels)\r\n\r\nCamera Trước/Sau: 7MP/ 2 x 12MP\r\n\r\nCPU: Apple A10 Fusion 4 nhân 64-bit\r\n\r\nBộ Nhớ: Tùy chọn 32GB / 128GB\r\n\r\nRAM: 3GB\r\n\r\nChống nước, chống bụi tiêu chuẩn IP67\r\n', 'assets/images/iphone7plus.jpg'),
(4, 'Oppo F11', 8, 1, 5490000, '\r\n\r\nChính hãng, Nguyên seal, Mới 100%, Chưa Active\r\n\r\nMiễn phí giao hàng toàn quốc\r\n\r\nMàn hình: LTPS LCD, 6.53\", Full HD+ (1080 x 2340 Pixels)\r\n\r\nCamera Trước/Sau: 16MP/48MP + 5MP (2 camera)\r\n\r\nCPU: MediaTek Helio P70 8 nhân\r\n\r\nBộ Nhớ: 64GB\r\n\r\nRAM: 6GB\r\n\r\nSIM tương thích: 2 Nano SIM\r\n\r\nTính năng: Mở khóa bằng vân tay, Mở khóa bằng khuôn mặt\r\n', 'assets/images/oppof11.jpg'),
(5, 'Samsung Galaxy M10', 20, 1, 2455000, '\r\n\r\nĐiện thoại chính hãng, Nguyên seal, Mới 100%, Chưa Active\r\n\r\nThiết kế: Nguyên khối, mặt kính cong 2.5D\r\n\r\nMàn hình: LCD 6.2\" HD+, Infinity V Display\r\n\r\nCamera Sau: 13 MP và 5 MP (2 camera)\r\n\r\nCamera Trước: 5 MP\r\n\r\nCPU: Samsung Exynos 7870, 8 nhân Cortex A53 @1.6 GHz\r\n\r\nBộ Nhớ: 16GB\r\n\r\nRAM: 2GB\r\n\r\nTính năng: Mở khóa bằng vân tay, Đèn pin, Chặn cuộc gọi, Chặn tin nhắn\r\n', 'assets/images/samsungm10.jpg'),
(6, 'Vsmart Live', 30, 1, 3470000, '\r\n\r\nChính hãng, nguyên seal, mới 100%, chưa Active\r\n\r\nMàn hình: AMOLED, 6.2\", Full HD+\r\n\r\nCamera trước: 20 MP\r\n\r\nCamera sau: Chính 48 MP & Phụ 8 MP, 5 MP\r\n\r\nBộ vi xử lý: Qualcomm Snapdragon 675 8 nhân 64-bit\r\n\r\nBộ nhớ ROM: 64GB\r\n\r\nRAM: 6GB\r\n\r\nSim tương thích: 2 Nano SIM, Hỗ trợ 4G\r\n\r\nTính năng: Mở khoá vân tay dưới màn hình\r\n', 'assets/images/vsmartlive.jpg'),
(7, 'Xiaomi Mi8', 4, 1, 3580000, '\r\n\r\nSản phẩm Chính hãng, Mới 100%, Nguyên seal, Chưa Active\r\n\r\nMiễn phí giao hàng toàn quốc\r\n\r\nThiết kế: Nguyên khối\r\n\r\nMàn hình: 6.26 inch IPS LCD\r\n\r\nCamera Trước: 24MP\r\n\r\nCamera Sau: 16 MP và 5 MP (2 camera)\r\n\r\nCPU: Qualcomm SDM660 Snapdragon 660\r\n\r\nBộ Nhớ: 64GB\r\n\r\nRAM: 4GB\r\n\r\nSIM tương thích: 2 Nano SIM\r\n', 'assets/images/xiaomi-mi8.jpg'),
(8, 'Macbook Air 2019', 2, 14, 25490000, '\r\n\r\nChip: Intel Core i5 8th 1.6GHz dual-core (Turbo Boost up to 3.6GHz)\r\n\r\nRAM: 8GB 2133MHz LPDDR3\r\n\r\nỔ Cứng: 128GB SSD\r\n\r\nChipset đồ họa: Intel UHD Graphics 617\r\n\r\nMàn hình: 13.3 inch (2560 x 1600), LED-backlit display with IPS technology, True Tone technology\r\n\r\nVân tay: Touch ID\r\n\r\nCổng kết nối: 2 x Thunderbolt 3, 3.5 mm headphone jack\r\n', 'assets/images/macbookair2019.jpg'),
(9, 'Lenovo Ideapad', 5, 2, 5549000, '\r\n\r\nCPU: AMD A9-9425 (3.1 GHz - 3.7 GHz / 1MB / 2 nhân, 2 luồng)\r\n\r\nMàn hình: 15.6\" (1366 x 768) , không cảm ứng\r\n\r\nRAM: 1 x 4GB DDR4 2666MHz\r\n\r\nĐồ họa: AMD Radeon R5 Graphics\r\n\r\nLưu trữ: 500GB HDD 5400RPM\r\n\r\nHệ điều hành: Windows 10 Home SL 64-bit\r\n\r\nPin: 2 cell 30 Wh Pin liền , khối lượng: 2.1 kg\r\n', 'assets/images/lenovoideapad.jpg'),
(10, 'Asus Vivobook', 7, 2, 18099000, '\r\n\r\nChip: Intel Core i7-8550U (1.8GHz Upto 4.0GHz, 4Cores, 8Threads, 8MB cache, FSB 4GT/s)\r\n\r\nRAM: 8GB DDR4-2400MHz, 2 Slots RAM\r\n\r\nỔ cứng: 1TB HDD 5400rpm + 1 Slot SSD M.2 Sata\r\n\r\nChipset đồ họa: NVIDIA GeForce MX150 2GB GDDR5 + Intel UHD Graphics 620\r\n\r\nMàn hình: 15.6 inch Full HD (1920 x 1080) IPS 60Hz, Anti-Glare with 45% NTSC\r\n\r\nHệ điều hành: Windows 10 bản quyền\r\n\r\nPin: 3 Cell 42 Whrs\r\n', 'assets/images/asusvivobook.jpg'),
(11, 'MSI GF63', 6, 2, 22189000, '\r\n\r\nCPU: Intel Core i7-9750H 2.6GHz up to 4.5GHz 12MB\r\n\r\nRAM: 8GB DDR4 2666MHz (2x SO-DIMM socket, up to 32GB SDRAM)\r\n\r\nỔ cứng: 512GB SSD M.2 PCIe\r\n\r\nCard đồ họa: NVIDIA GeForce GTX 1050Ti 4GB GDDR5 + Intel UHD Graphics 620\r\n\r\nMàn hình: 15.6\" FHD (1920 x 1080) IPS, 60Hz, Thin Bezel, Anti-Glare with 45% NTSC\r\n\r\nCổng giao tiếp: 3x USB 3.1, 1x USB 3.1 Type-C, 1x HDMI, 1x Mini-DisplayPort, 1x RJ45\r\n\r\nHệ điều hành: Windows 10 Home\r\n\r\nPin: 3 Cell 51WHr\r\n', 'assets/images/msigf63.jpg'),
(12, 'Xiaomi Notebook Air Core', 8, 2, 11999000, '\r\n\r\nChip: Intel Core i5-7200U Processor (2 x 2.50 GHz), Max Turbo Frequency: 3.10 GHz\r\n\r\nRAM: 8GB LPDDR4 2133MHz\r\n\r\nỔ cứng: 256GB SSD PCIe (M2 2280)\r\n\r\nChipset đồ họa: NVIDIA GeForce MX150 (2GB of GDDR5 SDRAM, Bus Width: 64-Bit) + Intel HD Graphics 620\r\n\r\nMàn hình: 13.3 inch Full HD (1920 x 1080) IPS LCD display with edge-to-edge glass protection\r\n\r\nHệ điều hành: Windows 10 Home Edition 64-Bit (Chinese)\r\n\r\nPin: Li-ion (5107mAh, 39 Whr) with Quick Charge 3.0\r\n', 'assets/images/xiaominotebookaircore.jpg'),
(13, 'HP Envy', 9, 2, 20069000, '\r\n\r\nCPU: Intel Core i5-8265U 1.6GHz up 3.9GHz 6MB\r\n\r\nMàn hình: 13.3\" FHD (1920 x 1080) IPS, BrightView Micro-Edge\r\n\r\nRAM: 8GB LPDDR3 2133MHz (Onboard)\r\n\r\nĐồ họa: Intel UHD Graphics 620\r\n\r\nLưu trữ: 256GB PCIe NVMe M.2 SSD\r\n\r\nHệ điều hành: Windows 10 Home\r\n\r\nPin: 4 Cell 53WHr\r\n', 'assets/images/hpenvy.jpg'),
(15, 'Đồng Hồ Nam Dây Titanium', 5, 3, 6700000, '\r\n\r\nMặt đồng hồ thiết kế nam tính, 3 vòng nhỏ và 6 kim hiện đại\r\n\r\nLogo thương hiệu được in rõ nét thể hiện đẳng cấp riêng\r\n\r\nMặt kính trong suốt rõ nét, chống trầy xước, chịu lực tốt\r\n\r\nDây Titanium cao cấp sáng bóng, bền chắc, không kích ứng da\r\n\r\nChống thấm nước hiểu quả, thoải mái sinh hoạt hằng ngày\r\n\r\nVạch chia giờ chi tiết, dễ quan sát, khung viền bằng thép không gỉ siêu bền\r\n', 'assets/images/donghotitanium.jpg'),
(16, 'Đồng Hồ Nam Dây Da Movado', 7, 3, 51290000, '\r\n\r\nDây da sang trọng với đường vân khắc họa tinh tế\r\n\r\nMặt kính Sapphire chống trầy xước, độ cứng cao\r\n\r\nMặt đồng hồ đơn giản hóa vạch chia giờ, điểm nhấn 12h độc quyền\r\n\r\nKhung viền bằng thép màu vàng không gỉ siêu bền\r\n\r\nChống thấm nước 3 Bar hiểu quả, thoải mái sinh hoạt hằng ngày\r\n', 'assets/images/donghodayda.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
