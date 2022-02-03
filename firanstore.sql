-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2020 at 07:50 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `firanstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `created`, `updated`) VALUES
(1, 'Minuman', '2019-12-18 08:30:09', '2020-01-03 09:23:21'),
(2, 'Makanan', '2019-12-18 17:01:15', '2019-12-30 12:14:36'),
(3, 'Bumbu dapur', '2019-12-18 19:33:55', '2019-12-22 06:02:31'),
(4, 'Sayur', '2019-12-22 12:02:50', '2019-12-22 06:03:25'),
(5, 'Buah', '2019-12-22 12:03:16', NULL),
(6, 'Baju', '2019-12-22 12:04:10', NULL),
(7, 'Sepatu', '2019-12-22 12:04:27', '2020-01-01 01:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `costumer`
--

CREATE TABLE `costumer` (
  `costumer_id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `phone` int(14) DEFAULT NULL,
  `address` text NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `costumer`
--

INSERT INTO `costumer` (`costumer_id`, `name`, `gender`, `phone`, `address`, `username`, `password`, `created`, `updated`) VALUES
(1, 'Umum', '', 0, '', NULL, NULL, '2020-05-14 19:28:53', NULL),
(2, 'Mctominay', 'L', 2123434, 'Scotland', NULL, NULL, '2019-12-16 22:03:34', '2019-12-31 03:37:23'),
(3, 'Rashford', 'L', 2389033, 'England', NULL, NULL, '2019-12-22 18:29:11', '2019-12-31 05:29:05'),
(9, 'Muhammad Randy', 'L', 2147483647, 'Bogor', 'randy', '5f4dcc3b5aa765d61d8327deb882cf99', '2020-09-04 08:35:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `detail_id` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`detail_id`, `invoice`, `item_id`, `qty`, `discount`, `subtotal`) VALUES
(6, 'FR2009050001', 46, 3, 0, 9000000),
(7, 'FR2009090001', 46, 1, 0, 3000000),
(8, 'FR2009230001', 65, 2, 0, 80000);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `barcode` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `price` int(100) NOT NULL,
  `stock` int(100) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `barcode`, `name`, `category_id`, `unit_id`, `price`, `stock`, `image`, `description`, `created`, `updated`) VALUES
(46, 'item054657', 'Sepatu keren 1', 7, 8, 3000000, 296, 'item-200903-33709a41d5.jpg', NULL, '2020-09-03 22:49:09', NULL),
(47, 'item054941', 'Sepatu keren 2', 7, 8, 3000000, 300, 'item-200903-162b63dc9d.jpg', NULL, '2020-09-03 22:50:19', NULL),
(48, 'item055026', 'Sepatu keren 3', 7, 8, 3000000, 300, 'item-200903-fe36d870f1.jpg', NULL, '2020-09-03 22:50:45', NULL),
(49, 'item055050', 'Sepatu keren 4', 7, 8, 3000000, 300, 'item-200903-130ebb5dbc.jpg', NULL, '2020-09-03 22:51:20', NULL),
(50, 'item055130', 'Sepatu keren 5', 7, 8, 3000000, 300, 'item-200903-98e4ee8538.jpg', NULL, '2020-09-03 22:53:08', NULL),
(51, 'item060252', 'Strawberry', 5, 4, 30000, 300, 'item-200903-252873ad4c.png', NULL, '2020-09-03 23:03:52', '2020-09-03 06:19:20'),
(52, 'item060357', 'Anggur', 5, 4, 40000, 300, 'item-200903-cd0b744c83.png', NULL, '2020-09-03 23:04:20', NULL),
(53, 'item060423', 'Alpukat', 5, 4, 20000, 300, 'item-200903-ee1755d946.png', NULL, '2020-09-03 23:04:52', NULL),
(54, 'item060456', 'Tomat', 5, 4, 18000, 300, 'item-200903-131bf64530.jpg', NULL, '2020-09-03 23:06:10', NULL),
(55, 'item060613', 'Blackberry bukan hp', 5, 4, 39997, 300, 'item-200903-137c70d137.jpg', NULL, '2020-09-03 23:06:54', NULL),
(56, 'item060658', 'Brokoli', 4, 4, 19995, 300, 'item-200903-9845559116.jpg', NULL, '2020-09-03 23:07:22', NULL),
(57, 'item060727', 'Leci', 5, 4, 30000, 300, 'item-200903-d7bb7027f4.jpg', NULL, '2020-09-03 23:07:57', NULL),
(58, 'item060814', 'Kiwil', 5, 4, 30000, 300, 'item-200903-2777928a66.jpg', NULL, '2020-09-03 23:08:41', NULL),
(59, 'item060844', 'Wortel', 4, 4, 10000, 300, 'item-200903-40d7bd71ff.jpg', NULL, '2020-09-03 23:09:17', NULL),
(60, 'item060920', 'Paprika', 5, 4, 20000, 300, 'item-200903-7e59f88def.jpg', NULL, '2020-09-03 23:10:01', NULL),
(61, 'item061004', 'Kol', 4, 4, 10000, 300, 'item-200903-e8d03346a9.jpg', NULL, '2020-09-03 23:10:34', NULL),
(62, 'item061039', 'Raspberry', 5, 4, 40000, 300, 'item-200903-2973f564ff.jpg', NULL, '2020-09-03 23:11:04', NULL),
(63, 'item061108', 'Durian Musang King', 5, 4, 30000, 300, 'item-200903-d158f57b7d.jpg', NULL, '2020-09-03 23:11:57', NULL),
(64, 'item061416', 'Rambutan', 5, 4, 20000, 300, 'item-200903-a5484bd41a.jpg', NULL, '2020-09-03 23:14:50', NULL),
(65, 'item061701', 'Naga', 5, 4, 40000, 298, 'item-200903-76fc25f9ad.jpg', NULL, '2020-09-03 23:17:30', NULL),
(66, 'item061749', 'Kacang', 4, 4, 19995, 300, 'item-200903-fe3324dc3b.jpg', NULL, '2020-09-03 23:18:28', NULL),
(67, 'item061831', 'Buncis', 4, 4, 10000, 300, 'item-200903-4ec1dfa5e3.jpg', NULL, '2020-09-03 23:18:58', NULL),
(68, 'item061941', 'LS Silver', 6, 5, 100000, 300, 'item-200903-13ac70d80c.jpg', NULL, '2020-09-03 23:20:22', NULL),
(69, 'item062025', 'LS Motif', 6, 5, 100000, 300, 'item-200903-b2ba76b652.jpg', NULL, '2020-09-03 23:20:54', NULL),
(70, 'item062058', 'Jersey Away Jerman 2014', 6, 5, 400000, 300, 'item-200903-4b18c201af.jpg', NULL, '2020-09-03 23:21:30', NULL),
(71, 'item062133', 'Jersey MU', 6, 5, 700000, 300, 'item-200903-228f49b16b.jpg', NULL, '2020-09-03 23:22:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` enum('in','out') NOT NULL,
  `detail` varchar(200) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `qty` int(20) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `item_id`, `type`, `detail`, `supplier_id`, `qty`, `date`, `created`, `user_id`) VALUES
(1, 46, 'in', 'baru', 2, 300, '2020-09-03', '2020-09-03 23:23:46', 4),
(2, 47, 'in', 'baru', 2, 300, '2020-09-03', '2020-09-03 23:24:01', 4),
(3, 48, 'in', 'baru', 2, 300, '2020-09-03', '2020-09-03 23:24:19', 4),
(4, 49, 'in', 'baru', 2, 300, '2020-09-03', '2020-09-03 23:26:39', 4),
(5, 50, 'in', 'baru', 2, 300, '2020-09-03', '2020-09-03 23:26:53', 4),
(6, 51, 'in', 'baru', 2, 300, '2020-09-03', '2020-09-03 23:27:07', 4),
(7, 52, 'in', 'baru', 2, 300, '2020-09-03', '2020-09-03 23:27:19', 4),
(8, 53, 'in', 'baru', 2, 300, '2020-09-03', '2020-09-03 23:27:31', 4),
(9, 54, 'in', 'baru', 2, 300, '2020-09-03', '2020-09-03 23:27:44', 4),
(10, 55, 'in', 'baru', 2, 300, '2020-09-03', '2020-09-03 23:27:58', 4),
(11, 56, 'in', 'baru', 2, 300, '2020-09-03', '2020-09-03 23:28:16', 4),
(12, 57, 'in', 'baru', 2, 300, '2020-09-03', '2020-09-03 23:28:30', 4),
(13, 58, 'in', 'baru', 2, 300, '2020-09-03', '2020-09-03 23:28:47', 4),
(14, 59, 'in', 'baru', 2, 300, '2020-09-03', '2020-09-03 23:29:14', 4),
(15, 60, 'in', 'baru', 2, 300, '2020-09-03', '2020-09-03 23:29:35', 4),
(16, 61, 'in', 'baru', 2, 300, '2020-09-03', '2020-09-03 23:29:50', 4),
(17, 62, 'in', 'baru', 2, 300, '2020-09-03', '2020-09-03 23:30:02', 4),
(18, 63, 'in', 'baru', 2, 300, '2020-09-03', '2020-09-03 23:30:16', 4),
(19, 64, 'in', 'baru', 2, 300, '2020-09-03', '2020-09-03 23:30:30', 4),
(20, 65, 'in', 'baru', 2, 300, '2020-09-03', '2020-09-03 23:30:44', 4),
(21, 66, 'in', 'baru', 2, 300, '2020-09-03', '2020-09-03 23:30:58', 4),
(22, 67, 'in', 'baru', 2, 300, '2020-09-03', '2020-09-03 23:31:12', 4),
(23, 68, 'in', 'baru', 2, 300, '2020-09-03', '2020-09-03 23:31:22', 4),
(24, 69, 'in', 'baru', 2, 300, '2020-09-03', '2020-09-03 23:31:33', 4),
(25, 70, 'in', 'baru', 2, 300, '2020-09-03', '2020-09-03 23:31:46', 4),
(26, 71, 'in', 'baru', 2, 300, '2020-09-03', '2020-09-03 23:32:01', 4);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` int(14) NOT NULL,
  `address` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `name`, `phone`, `address`, `description`, `created`, `updated`) VALUES
(2, 'Indofood', 8823873, 'Indonesia', 'Makanan Indonesia', '2019-12-16 20:04:43', '2020-01-01 07:59:58');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `invoice` varchar(30) NOT NULL,
  `costumer_id` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `change` int(11) NOT NULL,
  `note` text DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `date`, `invoice`, `costumer_id`, `discount`, `total`, `cash`, `change`, `note`, `user_id`) VALUES
(1, '2020-09-05', 'FR2009050001', 1, 1000, 8999000, 10000000, 1001000, 'oke', 4),
(2, '2020-09-09', 'FR2009090001', 1, 0, 3000000, 10000000, 7000000, 'oke', 4);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `name`, `created`, `updated`) VALUES
(3, 'pack', '2019-12-18 08:53:49', '2020-01-01 01:20:37'),
(4, 'kilogram', '2019-12-18 17:02:05', '2019-12-22 06:05:00'),
(5, 'satuan', '2019-12-18 19:38:17', '2019-12-22 06:05:25'),
(8, 'set', '2019-12-30 18:00:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `name` varchar(111) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1 = admin , 2 = kasir',
  `phone` varchar(14) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `level`, `phone`, `created`, `updated`) VALUES
(4, 'admin', 'admin', 'Muhammad Randy', 1, '98097987', '2019-12-20 12:43:13', '2020-05-14 14:14:41'),
(5, 'danjames', 'danjames', 'Daniel James', 2, '0327823243', '2019-12-20 12:49:33', '2020-01-01 19:44:51'),
(7, 'rashford', 'rashford', 'Marcus Rashford', 2, '08888182', '2020-01-02 01:36:36', '2020-01-01 19:54:03'),
(9, 'fitri', 'fitri', 'Fitri Syahrani', 2, '894197049', '2020-01-02 12:31:29', '2020-04-30 17:26:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `costumer`
--
ALTER TABLE `costumer`
  ADD PRIMARY KEY (`costumer_id`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `costumer_id` (`costumer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `costumer`
--
ALTER TABLE `costumer`
  MODIFY `costumer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`),
  ADD CONSTRAINT `stock_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`costumer_id`) REFERENCES `costumer` (`costumer_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
