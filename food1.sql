-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2018 at 08:02 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(25) NOT NULL,
  `unm` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `unm`, `pwd`) VALUES
(1, 'admin', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(25) NOT NULL,
  `pnr` int(255) NOT NULL,
  `iid` int(25) NOT NULL,
  `qty` int(25) NOT NULL DEFAULT '1',
  `price` int(25) NOT NULL,
  `total` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `pnr`, `iid`, `qty`, `price`, `total`) VALUES
(1, 1234567890, 1, 2, 30, 60);

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `id` int(25) NOT NULL,
  `cat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id`, `cat`) VALUES
(1, 'Break Fast'),
(2, 'Lunch'),
(3, 'Dinner');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(25) NOT NULL,
  `item` varchar(255) NOT NULL,
  `cid` int(25) NOT NULL,
  `price` int(25) NOT NULL,
  `dsc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `item`, `cid`, `price`, `dsc`) VALUES
(1, 'Idly', 1, 30, 'Serving of 3 Idlies with Chutney and Sambar'),
(2, 'Dosa', 1, 40, 'Serving of 1 Plain Dosa with Chutney and Sambar'),
(3, 'Vada', 1, 20, 'Serving of 2 Vada with Chutney and Sambar'),
(4, 'Meals', 2, 45, 'Serving of Rice,Sambar and Curd');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(25) NOT NULL,
  `pnr` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `qty` int(25) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'p',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `pnr`, `email`, `item`, `qty`, `status`, `date`) VALUES
(10, '1234567890', 'dev225.reddys@gmail.com', 'Idly', 1, 'Delivered', '2018-04-14 09:50:40'),
(11, '1234567890', 'dev225.reddys@gmail.com', 'Meals', 1, 'Received', '2018-04-14 09:50:40'),
(12, '1234567890', 'dev225.reddys@gmail.com', 'Idly', 1, 'Received', '2018-04-15 08:20:12'),
(13, '1234567890', 'dev225.reddys@gmail.com', 'Idly', 1, 'Received', '2018-04-15 08:20:12');

-- --------------------------------------------------------

--
-- Table structure for table `pnr`
--

CREATE TABLE `pnr` (
  `id` int(25) NOT NULL,
  `tid` int(255) NOT NULL,
  `pnr` varchar(255) NOT NULL,
  `stid` int(25) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pnr`
--

INSERT INTO `pnr` (`id`, `tid`, `pnr`, `stid`, `date`) VALUES
(1, 1, '1238374634', 1, '10/04/2018'),
(2, 2, '2345123487', 2, '10/04/2018'),
(3, 1, '1234567890', 1, '11/04/2018');

-- --------------------------------------------------------

--
-- Table structure for table `stops`
--

CREATE TABLE `stops` (
  `id` int(25) NOT NULL,
  `stop` varchar(255) NOT NULL,
  `tid` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stops`
--

INSERT INTO `stops` (`id`, `stop`, `tid`) VALUES
(1, 'secundrabad', 1),
(2, 'gurgaon', 1);

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `id` int(25) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`id`, `name`) VALUES
(1, 'Andhra Pradesh Express'),
(2, 'Coimbatore Express');

-- --------------------------------------------------------

--
-- Table structure for table `trans`
--

CREATE TABLE `trans` (
  `id` int(25) NOT NULL,
  `tid` varchar(255) NOT NULL,
  `pnr` int(255) NOT NULL,
  `oid` int(25) NOT NULL,
  `non` varchar(255) NOT NULL,
  `cno` int(255) NOT NULL,
  `cvv` int(25) NOT NULL,
  `edate` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans`
--

INSERT INTO `trans` (`id`, `tid`, `pnr`, `oid`, `non`, `cno`, `cvv`, `edate`, `amount`) VALUES
(1, '7tyeu', 1234567890, 1, 'Devendra Reddy', 2147483647, 123, '2018-04', 75),
(2, '7tyeu', 1234567890, 2, 'Devendra Reddy', 2147483647, 123, '2018-04', 75),
(3, '58pyo', 1238374634, 4, 'Some one', 2147483647, 432, '2018-04', 85),
(4, 'm9ekn', 1234567890, 1, 'rdtghryte', 123456, 123, '2018-04', 75),
(5, '2ah9j', 1234567890, 10, 'qwerwte', 132456576, 123, '2018-04', 75),
(6, 'ldt5j', 1234567890, 12, 'Some Guy', 2147483647, 544, '2021-07', 60);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pnr`
--
ALTER TABLE `pnr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stops`
--
ALTER TABLE `stops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans`
--
ALTER TABLE `trans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pnr`
--
ALTER TABLE `pnr`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `stops`
--
ALTER TABLE `stops`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `train`
--
ALTER TABLE `train`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `trans`
--
ALTER TABLE `trans`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
