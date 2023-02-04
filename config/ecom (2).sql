-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2023 at 03:55 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL,
  `messages` varchar(255) NOT NULL,
  `response` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '011c945f30ce2cbafc452f39840f025693339c42', 'admin', '2023-01-03 01:22:02', '2023-01-03 01:22:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banks`
--

CREATE TABLE `tbl_banks` (
  `id` int(11) NOT NULL,
  `bank_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_banks`
--

INSERT INTO `tbl_banks` (`id`, `bank_code`, `bank_name`, `bank_logo`, `bank_account`, `bank_account_name`, `open_date`, `status`, `created_at`, `updated_at`) VALUES
(3, 'KTB', 'กรุงไทย', 'Screenshot 2022-11-03 213848.png', 'xxxxxx', 'xxxxxx', NULL, 'on', '2022-11-09 14:35:37', '2022-11-09 14:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(7, 'เสื้อผ้าแมว', 'csh.jpg', 'on', '2022-10-25 03:40:41', '2022-10-25 03:40:41'),
(14, 'อาหารแมว', 'cat.jpg', 'on', '2022-10-31 09:47:32', '2022-10-31 09:47:32'),
(15, 'ของเล่นแมว', 'ch.jpg', 'on', '2022-10-31 09:52:26', '2022-10-31 09:52:26'),
(16, 'อุปกรณ์ทำความสะอาด', 'm-2in1-00.jpg', 'on', '2022-10-31 10:05:34', '2022-10-31 10:05:34'),
(17, ' เสื้อผ้า', 'm-120946719_675658396686147_6532190194662840801_n_(2).jpg', 'on', '2022-10-31 10:06:30', '2022-10-31 10:06:30'),
(18, 'กำจัดเห็บ', 'm-serestodogcat.jpg', 'on', '2022-10-31 10:07:20', '2022-10-31 10:07:20'),
(19, 'แก้ปัญหาสุขภาพและอนามัย', 'm-Tropiclean_Dual_Action_Ear.jpg', 'on', '2022-10-31 10:08:00', '2022-10-31 10:08:00'),
(20, ' ขนมแมว', 'm-Nutreats_New_Zealand_Ocean_Salmon_Salmon_(Cat_Treats)_50g.jpg', 'on', '2022-10-31 10:08:50', '2022-10-31 10:08:50'),
(21, ' จานชาม', 'm-fresh-infinity-00s.jpg', 'on', '2022-10-31 10:09:23', '2022-10-31 10:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id`, `username`, `image`, `password`, `fname`, `lname`, `phone`, `email`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'suratin', NULL, '011c945f30ce2cbafc452f39840f025693339c42', 'suratin', 'krue', '0884092629', 'salekrub088', '121/11', NULL, '2022-10-20 08:52:07', '2022-10-20 08:52:07'),
(2, 'surrati', NULL, '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', '111', '11', '11', '11', '11', NULL, '2022-10-20 08:54:40', '2022-10-20 08:54:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `o_id` int(11) NOT NULL,
  `o_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_qty` int(11) DEFAULT NULL,
  `o_total` float(8,2) NOT NULL,
  `slip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'รอชำระเงิน',
  `track` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`o_id`, `o_name`, `o_address`, `o_email`, `o_phone`, `o_qty`, `o_total`, `slip`, `status`, `track`, `user_id`, `created_at`, `updated_at`) VALUES
(35, 'สุรทิน เครือแสง', '11235/254 ', 'test@gmail.com', '0884092629', 5, 11504.00, 'lottery.png', 'กำลังเตรียมการจัดส่ง', 'P213123123', 1, '2022-12-30 07:15:43', '2022-12-30 07:15:43'),
(36, 'dfsdf', 'sdfsdf', 'sdf@gmail.com', '3234234', 2, 1000.00, 'logo.png', 'รอการตรวจสอบสลิป', NULL, 1, '2022-12-30 07:22:42', '2022-12-30 07:22:42'),
(37, 'sdf', 'sdf', 'sdf@gmail.com', '43453', 1, 5002.00, NULL, 'รอชำระเงิน', NULL, 1, '2023-01-03 02:58:17', '2023-01-03 02:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `d_id` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` float(8,2) DEFAULT NULL,
  `d_qty` int(11) NOT NULL,
  `d_subtotal` float(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`d_id`, `o_id`, `p_id`, `p_name`, `price`, `d_qty`, `d_subtotal`, `created_at`, `updated_at`) VALUES
(20, 35, 1, 'test', 500.00, 3, 1500.00, '2022-12-30 07:15:43', '2022-12-30 07:15:43'),
(21, 35, 3, 'ggggggg', 5002.00, 2, 10004.00, '2022-12-30 07:15:43', '2022-12-30 07:15:43'),
(22, 36, 1, 'test', 500.00, 2, 1000.00, '2022-12-30 07:22:42', '2022-12-30 07:22:42'),
(23, 37, 3, 'ggggggg', 5002.00, 1, 5002.00, '2023-01-03 02:58:17', '2023-01-03 02:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` float(8,2) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `promotion_id` int(11) DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sell_number` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `name`, `image`, `price`, `discount`, `qty`, `status`, `description`, `category_id`, `promotion_id`, `code`, `sell_number`, `created_at`, `updated_at`) VALUES
(1, 'test', 'logowhite.png', 500.00, 30, 50, 'on', 'บิ๊กซี แฮปปี้ ไพรซ์ อาหารแมว รสปลาทะเลในเยลลี่กุ้ง 400 ก.\r\n\r\nดูแลแมวของคุณให้มีร่างกายที่แข็งแรง ได้รับคุณค่าทางอาหารอย่างครบถ้วน ด้วยบิ๊กซี แฮปปี้ ไพรซ์ อาหารแมวที่ผลิตจากเนื้อสัตว์แท้ที่ถูกคัดสรรมาอย่างดี มาในรูปแบบเยลลี่ พร้อมทั้งผ่านกรรมวิธีการผลิตที่สะอาด และปลอดภัยต่อแมวของคุณ\r\n\r\n- บิ๊กซี แฮปปี้ ไพรซ์ อาหารแมว รสปลาทะเลในเยลลี่กุ้ง\r\n- ผลิตจากเนื้อสัตว์ที่ถูกคัดสรรมาอย่างดี\r\n- อุดมไปด้วยสารอาหารที่จำเป็นต่อร่างกายของแมว ทั้งวิตามิน และแร่ธาตุต่างๆ\r\n- มีกลิ่นหอม และรสชาติอร่อยที่แมวชอบ\r\n\r\nสินค้าที่ได้รับอาจมีการปรับเปลี่ยนแพ็คเกจและปริมาณจากผู้ผลิต ขออนุญาตสงวนสิทธิ์ในการเปลี่ยนแปลงดังกล่าว โดยไม่แจ้งให้ทราบล่วงหน้า\r\n\r\n*ภาพประกอบใช้เพื่อการโฆษณาเท่านั้น', 7, 3, '247628', 10, '2022-10-27 15:40:02', '2022-10-27 15:40:02'),
(3, 'ggggggg', 'back64.png', 5002.00, 0, 2, 'on', '       gdgdg', 7, 5, 'ggggggggg', 15, '2022-10-28 14:05:30', '2022-10-28 14:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promotions`
--

CREATE TABLE `tbl_promotions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_promotions`
--

INSERT INTO `tbl_promotions` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, '1 แถม 1', 'winapp.png', 'on', '2022-10-27 14:13:10', '2022-10-27 14:13:10'),
(3, '5 แถม 2', 'Image_created_with_a_mobile_phone.png', 'on', '2022-10-28 14:23:34', '2022-10-28 14:23:34'),
(4, 'testpromotion3', '15221647-imag-of-heart-in-the-blue-sky-against-a-background-of-white-clouds-.webp', 'on', '2022-10-30 03:13:27', '2022-10-30 03:13:27'),
(5, 'default', 'lottery.png', 'on', '2022-10-31 08:09:54', '2022-10-31 08:09:54'),
(8, 'test2', 'winapp.png', 'on', '2022-11-09 12:26:04', '2022-11-09 12:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings_bestseller`
--

CREATE TABLE `tbl_settings_bestseller` (
  `id` int(11) NOT NULL,
  `best_seller` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_settings_bestseller`
--

INSERT INTO `tbl_settings_bestseller` (`id`, `best_seller`, `created_at`, `updated_at`) VALUES
(1, 10, '2022-10-31 13:03:12', '2022-10-31 13:03:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_banks`
--
ALTER TABLE `tbl_banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_promotions`
--
ALTER TABLE `tbl_promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_settings_bestseller`
--
ALTER TABLE `tbl_settings_bestseller`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_banks`
--
ALTER TABLE `tbl_banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_promotions`
--
ALTER TABLE `tbl_promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_settings_bestseller`
--
ALTER TABLE `tbl_settings_bestseller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
