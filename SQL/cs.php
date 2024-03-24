-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2024 at 11:19 AM
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
-- Database: `cs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'Admin', '$2y$10$M8Te.qzqbe/GupUHdhAhnOAMW6N3kiSCoagH7Z2qzRsiL8A5vICku'),
(2, 'admin', '$2y$10$lgEJHtsdFMv7fWWq8L5t2uM6ZTlRrW3djv7GcHGsefbKd8FB0QWUK'),
(3, '123', '$2y$10$x.IS18ayA2hAaalGnw5kVOWsJ/VejXrroDh84nspKu3xjWjRq8S.q');

-- --------------------------------------------------------

--
-- Table structure for table `assetinventory`
--

CREATE TABLE `assetinventory` (
  `Date` date DEFAULT NULL,
  `InvoiceNo` varchar(50) DEFAULT NULL,
  `Assets` varchar(255) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `Location` varchar(50) DEFAULT NULL,
  `DeviceSerialNumber` varchar(50) DEFAULT NULL,
  `SubLocation` varchar(50) DEFAULT NULL,
  `SYSTEMREF` bigint(20) NOT NULL,
  `REFNO` varchar(50) DEFAULT NULL,
  `Supplier` varchar(255) DEFAULT NULL,
  `Cost` decimal(10,2) DEFAULT NULL,
  `DepRate` varchar(10) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assetinventory`
--

INSERT INTO `assetinventory` (`Date`, `InvoiceNo`, `Assets`, `Qty`, `Location`, `DeviceSerialNumber`, `SubLocation`, `SYSTEMREF`, `REFNO`, `Supplier`, `Cost`, `DepRate`, `Status`) VALUES
('2016-01-22', '', 'Microsoft Home and Business 2016', 1, 'POL', 'SN - J0N6XM1', 'ACCOUNTS', 4007100001, 'MML/POL/2016/C-SO/031', 'Softlogic Information Technologies (Pvt) Ltd', 33500.00, '25%', 'Fully/D'),
('2016-01-22', '', 'Microsoft Home and Business 2024', 2, 'POL', 'SN - HLF5042', 'HR (Wathsala)', 4007100002, 'MML/POL/2016/C-SO/030', 'Softlogic Information Technologies (Pvt) Ltd', 33500.00, '25%', 'Fully/D'),
('2016-01-22', '', 'Microsoft Home and Business 2016', 1, 'POL', 'SN - 3WS5042', 'MERCHANDISING', 4007100003, 'MML/POL/2016/C-SO/033', 'Softlogic Information Technologies (Pvt) Ltd', 33500.00, '25%', 'Fully/D'),
('2016-01-22', '', 'Microsoft Home and Business 2016', 1, 'POL', 'SN - 5LF5042', 'AQL (Rasika)', 4007100004, 'MML/POL/2016/C-SO/034', 'Softlogic Information Technologies (Pvt) Ltd', 33500.00, '25%', 'Fully/D'),
('2016-02-10', '', 'Microsoft Home and Business 2016', 1, 'POL', 'SN - 6C0J232', 'IT ROOM', 4007100005, 'MML/POL/2016/C-SO/035', 'Softlogic Information Technologies (Pvt) Ltd', 33500.00, '25%', 'Fully/D'),
('2016-02-12', '', 'Microsoft Home and Business 2016', 1, 'POL', 'SN - FLF5042', 'MERCHANDISING (MMLPLAN)', 4007100006, 'MML/POL/2016/C-SO/036', 'Softlogic Information Technologies (Pvt) Ltd', 33500.00, '25%', 'Fully/D'),
('2016-02-12', '', 'Microsoft Home and Business 2016', 1, 'POL', 'SN - J3M5042', 'MERCHANDISING (BACKUP-02)', 4007100007, 'MML/POL/2016/C-SO/037', 'Softlogic Information Technologies (Pvt) Ltd', 33500.00, '25%', 'Fully/D'),
('2016-02-12', '', 'Microsoft Home and Business 2016', 1, 'POL', 'SN - J2M5042', 'Sample RM  (SUDATH)', 4007100008, 'MML/POL/2016/C-SO/038', 'Softlogic Information Technologies (Pvt) Ltd', 33500.00, '25%', 'Fully/D'),
('2016-04-01', '', 'Microsoft Home and Business 2016', 1, 'POL', 'SN - CPF5042', 'DIRECTOR (HR (Mr.Dhammika)', 4007100009, 'MML/POL/2016/C-SO/039', 'Softlogic Information Technologies (Pvt) Ltd', 33500.00, '25%', 'Fully/D'),
('2016-08-14', '', 'Microsoft Home and Business 2016', 1, 'POL', 'SN - FLF5042', 'Thamodaya', 4007100010, 'MML/POL/2016/C-SO/043', 'Softlogic Information Technologies (Pvt) Ltd', 33500.00, '25%', 'Fully/D'),
('2016-09-09', '', 'Microsoft Home and Business 2016', 1, 'POL', 'SN - FXKKWB2', 'Wijawardana', 4007100011, 'MML/POL/2016/C-SO/044', 'Softlogic Information Technologies (Pvt) Ltd', 32500.00, '25%', 'Fully/D'),
('2016-09-09', '', 'Microsoft Home and Business 2016', 1, 'POL', 'SN - 1JKNZB2', 'Sudarshana', 4007100012, 'MML/POL/2016/C-SO/045', 'Softlogic Information Technologies (Pvt) Ltd', 33500.00, '25%', 'Fully/D'),
('2016-10-03', '', 'Microsoft Home and Business 2016', 1, 'POL', 'SN - FXKKWB2', 'Weerasingha', 4007100013, 'MML/POL/2016/C-SO/046', 'Softlogic Information Technologies (Pvt) Ltd', 33000.00, '25%', 'Fully/D'),
('2016-10-03', '', 'Microsoft Home and Business 2016', 1, 'POL', 'SN - DJKNZB2', 'Suranga (Account - Backup)', 4007100014, 'MML/POL/2016/C-SO/047', 'Softlogic Information Technologies (Pvt) Ltd', 33000.00, '25%', 'Fully/D'),
('2016-10-03', '', 'Microsoft Home and Business 2016', 1, 'POL', 'SN - BCPS3C2', 'Sandaraka (DILUM)', 4007100015, 'MML/POL/2016/C-SO/048', 'Softlogic Information Technologies (Pvt) Ltd', 33000.00, '25%', 'Fully/D'),
('2016-11-24', '', 'Lectra Software', 1, 'POL', 'SN - HSX4T92', 'CAD (Sujith - Sample)', 4007100016, 'MML/POL/2016/C-SO/049', 'Lectra', 10065342.89, '25%', 'Fully/D'),
('2024-01-26', '434232', 'i9 14th gen pc', 6, 'Pol', '32464543', 'HM', 4007100017, 'POL/HM/3534/0077', 'Rio Computers', 200000.00, '35', 'Full'),
('2024-02-03', '434232', 'i9 14th gen pc', 6, 'Pol', '32464543', 'HM', 4007100018, 'POL/HM/3534/0077', 'Rio Computers', 200000.00, '35', 'Full'),
('2024-03-10', '434232', 'i9 14th gen pc', 6, 'Pol', '32464543', 'HM', 4007100019, 'POL/HM/3534/0077', 'Rio Computers', 200000.00, '35', 'Full'),
('2024-03-10', '434232', 'i9 14th gen pc', 6, 'Pol', '32464543', 'HM', 4007100020, 'POL/HM/3534/0077', 'Rio Computers', 200000.00, '35', 'Full'),
('2024-02-25', '434232', 'i9 14th gen pc', 6, 'Pol', '32464543', 'HM', 4007100021, 'POL/HM/3534/0077', 'Rio Computers', 200000.00, '35', 'Full'),
('2024-02-17', '434232', 'i9 14th gen pc', 6, 'Pol', '32464543', 'HM', 4007100022, 'POL/HM/3534/0077', 'Rio Computers', 200000.00, '35', 'Full'),
('2024-02-17', '434232', 'i9 14th gen pc', 6, 'Pol', '32464543', 'HM', 4007100023, 'POL/HM/3534/0077', 'Rio Computers', 200000.00, '35', 'Full'),
('2024-03-03', '434232', 'i9 14th gen pc', 6, 'Pol', '32464543', 'HM', 4007100024, 'POL/HM/3534/0077', 'Rio Computers', 200000.00, '35', 'Full');

--
-- Triggers `assetinventory`
--
DELIMITER $$
CREATE TRIGGER `format_systemref_trigger` BEFORE INSERT ON `assetinventory` FOR EACH ROW BEGIN
    SET NEW.SYSTEMREF = (SELECT IFNULL(MAX(SYSTEMREF), 4007100000) + 1 FROM AssetInventory);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `computer_equipment`
--

CREATE TABLE `computer_equipment` (
  `Date` date DEFAULT NULL,
  `InvoiceNo` varchar(255) DEFAULT NULL,
  `SerialNo` varchar(255) DEFAULT NULL,
  `Assets` varchar(255) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `SubLocation` varchar(255) DEFAULT NULL,
  `SystemRef` bigint(20) NOT NULL,
  `REFNO` varchar(255) DEFAULT NULL,
  `Supplier` varchar(255) DEFAULT NULL,
  `Cost` decimal(10,2) DEFAULT NULL,
  `DepRate` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `computer_equipment`
--

INSERT INTO `computer_equipment` (`Date`, `InvoiceNo`, `SerialNo`, `Assets`, `Qty`, `Location`, `SubLocation`, `SystemRef`, `REFNO`, `Supplier`, `Cost`, `DepRate`, `Status`) VALUES
('2024-02-04', '45454456787', '3432', '34', 33, '54542df', '23', 4006500001, 'POL/HM/3534/0077', '545', 23.00, '45', 'dsf'),
('2024-02-25', '4545445', '3432', '342', 32, '54542df', '23', 4006500002, 'POL/HM/3534/0077', '545', 23.00, '45', 'dsf'),
('2024-02-10', '4545445', '0000000111', '342', 32, '54542df', '23', 4006500003, 'POL/HM/3534/0077', '545', 23.00, '45', 'dsf'),
('2024-02-11', '4545445', '2323', '54545d', 6, 'Pol', 'HM', 4006500004, 'POL/HM/3534/0077', 'Rio Computers', 200000.00, '45%', 'Full');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assetinventory`
--
ALTER TABLE `assetinventory`
  ADD PRIMARY KEY (`SYSTEMREF`);

--
-- Indexes for table `computer_equipment`
--
ALTER TABLE `computer_equipment`
  ADD PRIMARY KEY (`SystemRef`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `computer_equipment`
--
ALTER TABLE `computer_equipment`
  MODIFY `SystemRef` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4006500005;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
