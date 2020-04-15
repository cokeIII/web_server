-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 15, 2020 at 09:26 PM
-- Server version: 5.5.59
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `offtduac_trackalert`
--

-- --------------------------------------------------------

--
-- Table structure for table `maps`
--

CREATE TABLE `maps` (
  `uuid` varchar(20) NOT NULL COMMENT 'รหัส UUID Beacon',
  `uuid_ios` varchar(36) NOT NULL,
  `x` int(11) NOT NULL COMMENT 'ตำแหน่งแกน x บนหน้าจอ',
  `y` int(11) NOT NULL COMMENT 'ตำแหน่งแกน y บนหน้าจอ',
  `name` varchar(50) NOT NULL COMMENT 'ชื่อฺ เส้นทาง',
  `route` int(11) NOT NULL COMMENT 'หมายเลขเส้นทาง',
  `map_status` enum('S','N','E','D') NOT NULL COMMENT 'สถานะของBeacon S = จุดเริ่มต้น,N = จุดธรรมดา,E = จุดสุดท้าย ในแต่ละเส้นทาง D = จุดเฝ้าระวัง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maps`
--

INSERT INTO `maps` (`uuid`, `uuid_ios`, `x`, `y`, `name`, `route`, `map_status`) VALUES
('3D:84:E8:A8:EF:ED', '505171D0-BBF9-4D74-BE62-6EDD210913F0', 42, 40, 'point_7', 1, 'N'),
('43:2F:ED:5C:3C:EF', '9BB645AC-EB26-B5DB-1787-BBE99F457491', 47, 35, 'point_8', 1, 'N'),
('46:B2:20:8D:30:CB', 'BD03F4F4-45B0-00A7-EFFB-BF76C0F98B2E', 50, 11, 'point_10_End', 1, 'E'),
('8F:4A:1C:93:03:D7', 'AEA9ED04-A9B9-2768-EA03-A9A6943FE82B', 52, 29, 'point_9', 1, 'N'),
('90:D0:E9:5C:CB:CB', '9B16F74B-B1A6-21E2-614F-EEA5C319933D', 35, 44, 'point_6', 1, 'N'),
('B4:26:7C:71:C8:D7', '505171D0-BBF9-4D74-BE62-6EDD210913F0', 26, 77, 'point_1', 1, 'S'),
('B6:7D:7C:9F:A7:E2', '5F2EADF2-E85B-9FAC-ED9A-9ED74BEFD946', 35, 54, 'point_4', 1, 'D'),
('E1:51:83:0B:70:DE', 'E3FA7F93-9235-60F7-B724-8C39032D16F4', 38, 59, 'point_3', 1, 'N'),
('E3:6B:F7:31:5B:FE', '51398D28-A39A-CCD3-056B-8E99263EDC04', 36, 68, 'point_2', 1, 'N'),
('EC:18:B9:C0:CF:C3', '5303A213-E1D4-D346-0C72-E5511AA259AB', 33, 49, 'point_5', 1, 'N'),
('F2:AE:DB:70:B1:B6', '39A56CD5-D5BC-E4AE-1693-E71F472670B3', 28, 77, 'demo_point', 2, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(13) NOT NULL COMMENT 'รหัสบัตรประชาชน',
  `name` varchar(50) NOT NULL COMMENT 'ชื่อผู้ใช้',
  `phone_number` varchar(10) NOT NULL COMMENT 'เบอร์โทร',
  `pic_card` varchar(50) NOT NULL COMMENT 'path รูป',
  `device_id` varchar(20) NOT NULL COMMENT 'รหัสเครื่องสมาร์ทโฟน',
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่ผู้ใช้สมัคร',
  `ble_id` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `phone_number`, `pic_card`, `device_id`, `user_date`, `ble_id`) VALUES
('', 'Gg', '0974728763', '', '1582222090533', '2020-02-20 15:19:54', 'null'),
('', '', '0928194621', '0928194621.jpg', '353555083382248', '2019-12-05 04:13:41', ''),
('3250100363892', 'Yupin', '0864029597', '', '357160081255268', '2019-12-05 04:07:37', 'undefined'),
('1739901739529', 'darkkaos2', '1739901739', '1739901739529.jpg', '861117038266573', '2020-02-06 02:26:30', 'undefined'),
('', 'kasama', '0974728763', '', '865228046602653', '2020-02-16 09:05:44', 'e013b545afe6'),
('1369900406953', 'Natthapon', '0928988053', '', '865257034966374', '2020-02-13 04:38:12', 'undefined'),
('1200101801510', 'May', '0970542417', '', '867260033337579', '2020-02-15 03:48:44', 'undefined'),
('1579900778395', 'Thawatchai Thandee', '0955868499', '', '868445023196692', '2019-12-05 03:54:13', 'undefined');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `device_id` varchar(20) NOT NULL COMMENT 'รหัสเครื่องสมาร์ทโฟน ผู้ใช้',
  `log_id` int(11) NOT NULL COMMENT 'รหัสบันทึก',
  `uuid` varchar(36) NOT NULL COMMENT 'รหัส UUID Beacon',
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันวเลาที่บันทึก',
  `status` enum('traveling','detours','appNotWorking','finish','disconnect') NOT NULL COMMENT 'สถานะการบันทึก traveling = กำลังท่องเที่ยว,detours = ออกนอกเส้นทาง,finish = ท่องเที่ยวเสร็จแล้ว appNotWorking = ปิดแอปพลิเคชัน , disconnect = หายไปเป็นเวลานาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`device_id`, `log_id`, `uuid`, `date_time`, `status`) VALUES
('865257034966374', 57, 'F2:AE:DB:70:B1:B6', '2020-02-21 07:27:28', 'appNotWorking'),
('867260033337579', 59, 'B4:26:7C:71:C8:D7', '2020-02-15 05:09:19', 'appNotWorking'),
('1582222090533', 521, 'F2:AE:DB:70:B1:B6', '2020-02-21 04:15:16', 'appNotWorking'),
('865228046602653', 524, '46:B2:20:8D:30:CB', '2020-02-22 05:09:21', 'appNotWorking');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `maps`
--
ALTER TABLE `maps`
  ADD PRIMARY KEY (`uuid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`device_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `uuid` (`uuid`),
  ADD KEY `device_id` (`device_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสบันทึก', AUTO_INCREMENT=525;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_log`
--
ALTER TABLE `user_log`
  ADD CONSTRAINT `user_log_ibfk_1` FOREIGN KEY (`uuid`) REFERENCES `maps` (`uuid`),
  ADD CONSTRAINT `user_log_ibfk_2` FOREIGN KEY (`device_id`) REFERENCES `users` (`device_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
