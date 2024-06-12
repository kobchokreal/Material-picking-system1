-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 09:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `met_ksb`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` char(5) NOT NULL,
  `dept_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
('001', 'แผนก BOARD'),
('002', 'แผนก Design\r\n'),
('003', 'แผนก Consult'),
('004', 'แผนก Secretary & Bidding'),
('005', 'แผนก consult private'),
('006', 'แผนก Marketing'),
('007', 'แผนก Furniture'),
('008', 'แผนก Urban Design'),
('009', 'แผนก Accounting'),
('010', 'แผนก Back Office');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `mem_id` int(10) NOT NULL,
  `mem_name` varchar(100) NOT NULL,
  `mem_img` text NOT NULL,
  `mem_mobile` varchar(20) NOT NULL,
  `mem_user` varchar(60) NOT NULL,
  `mem_pass` varchar(30) NOT NULL,
  `mem_level` char(5) NOT NULL,
  `mem_dept` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mem_id`, `mem_name`, `mem_img`, `mem_mobile`, `mem_user`, `mem_pass`, `mem_level`, `mem_dept`) VALUES
(1, 'นายดนุพร หลาบนอก (นุ)', 'img/321042345_879327060080923_8835566562044528815_n.jpg', '097-349-2512', 'admin', '1nformations', '1', '001');

-- --------------------------------------------------------

--
-- Table structure for table `meter`
--

CREATE TABLE `meter` (
  `met_id` int(10) NOT NULL,
  `met_name` varchar(100) NOT NULL,
  `met_detail` text NOT NULL,
  `met_img` text NOT NULL,
  `met_total` int(10) NOT NULL,
  `met_mtype` char(5) NOT NULL,
  `met_price` float(30,2) NOT NULL,
  `met_barcode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `meter`
--

INSERT INTO `meter` (`met_id`, `met_name`, `met_detail`, `met_img`, `met_total`, `met_mtype`, `met_price`, `met_barcode`) VALUES
(8, 'เครื่องเจาะกระดาษ', 'เครื่องเจาะกระดาษ 2 รู (ม้า) H-888 หน่วย(อัน)', 'matpic/S1ad4bf33c65a4d45b49b8bf7e0107d755.jpg', 0, '01', 1047.00, '8858729219690'),
(9, 'สันห่วงพลาสติก 51 มม. ', '(ใส่จำนวนเบิกเป็น จำนวน อัน)', 'matpic/181758_ELP-SPIRAL-COMB-51MM_BLACK_PRODUCT.png', 0, '01', 21.80, '8851433128579'),
(11, 'สันห่วงพลาสติก 28 มม. ', '(ใส่จำนวนเบิกเป็น จำนวน อัน)', 'matpic/7001875.jpg', 100, '01', 17.60, '8851433128050'),
(12, 'สันห่วงพลาสติก 38 มม.', '(ใส่จำนวนเบิกเป็น จำนวน อัน)', 'matpic/สันห่วง38-มม.น้ำตาล.jpg', 200, '01', 21.50, '8851433128197'),
(13, 'ซองจดหมายสีขาว', '(ใส่จำนวนเบิกเป็น จำนวน ซอง)', 'matpic/404348_00_envelope_555paperplus_v2.jpg', 100, '01', 1.46, '8850950002683');

-- --------------------------------------------------------

--
-- Table structure for table `meterdraw`
--

CREATE TABLE `meterdraw` (
  `draw_id` int(10) NOT NULL,
  `draw_date` varchar(20) NOT NULL,
  `draw_num` int(10) NOT NULL,
  `draw_metid` int(10) NOT NULL,
  `draw_userid_draw` int(10) NOT NULL,
  `draw_userid_app` int(10) NOT NULL,
  `draw_date_app` char(20) NOT NULL,
  `draw_status` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `metertype`
--

CREATE TABLE `metertype` (
  `mtype_id` char(5) NOT NULL,
  `mtype_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `metertype`
--

INSERT INTO `metertype` (`mtype_id`, `mtype_name`) VALUES
('01', 'วัสดุสำนักงานทั่วไป'),
('03', 'กระดาษ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `meter`
--
ALTER TABLE `meter`
  ADD PRIMARY KEY (`met_id`);

--
-- Indexes for table `meterdraw`
--
ALTER TABLE `meterdraw`
  ADD PRIMARY KEY (`draw_id`);

--
-- Indexes for table `metertype`
--
ALTER TABLE `metertype`
  ADD PRIMARY KEY (`mtype_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mem_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `meter`
--
ALTER TABLE `meter`
  MODIFY `met_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `meterdraw`
--
ALTER TABLE `meterdraw`
  MODIFY `draw_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
