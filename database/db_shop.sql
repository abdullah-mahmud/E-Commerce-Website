-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2016 at 12:22 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'Tahmid Ziko', 'admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(1, 'Samsung'),
(2, 'Acer'),
(3, 'Nokia'),
(4, 'Apple'),
(5, 'Walton'),
(6, 'Symphony');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `sId`, `productId`, `productName`, `price`, `quantity`, `image`) VALUES
(1, 'n62ufhrbdf8knv069k9vvk3u95', 6, 'Ac-batash', 753454, 1, 'upload/64da8e2d07.png'),
(3, 'mfjmn5sbra50tki1v693jla163', 6, 'Ac-batash', 753454, 3, 'upload/64da8e2d07.png'),
(7, '8a2ul2okqbc04o4ttqkoqrbgf0', 3, 'fyr thryry', 274, 1, 'upload/36c6b0c823.png'),
(8, '8a2ul2okqbc04o4ttqkoqrbgf0', 2, 'adadq3413', 123, 2, 'upload/66c8d5767e.png'),
(9, '8a2ul2okqbc04o4ttqkoqrbgf0', 5, 'Walton Primo R-7', 7778, 1, 'upload/d304221784.png'),
(10, '8a2ul2okqbc04o4ttqkoqrbgf0', 7, 'Freeze', 50211, 1, 'upload/1ddf04ab65.jpg'),
(11, '8a2ul2okqbc04o4ttqkoqrbgf0', 4, 'I-phone 7', 385.25, 1, 'upload/b45a9ac0bd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(3, 'Samsung'),
(6, 'Mobile Phones'),
(7, 'Accessories'),
(8, 'Software'),
(9, 'Toys, Kids &amp; Babies');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zip` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zip`, `phone`, `email`, `pass`) VALUES
(1, 'ziko', 'asda', 'asd', 'dsasd', 'asda', 'asdsad', 'teerasa07@ymail.com', '123'),
(2, 'ziko', '4errw', 'asd', 'rwewer', 'qeq', 'wr24wer', 'z@z.com', '202cb962ac59075b964b07152d234b70'),
(3, 't', 't', 't', 't', 't', 't', 't@t.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `cmrId`, `productId`, `productName`, `quantity`, `price`, `image`, `date`, `status`) VALUES
(1, 2, 3, 'fyr thryry', 2, 548.00, 'upload/36c6b0c823.png', '2016-09-23 01:45:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`) VALUES
(2, 'adadq3413', 6, 1, '<p>re r42r5 fr 2435 qrwdrt1 fdfjti wtwrwt w</p>', 123.00, 'upload/66c8d5767e.png', 0),
(3, 'fyr thryry', 9, 1, '<p>y eryrey ryr yry</p>', 274.00, 'upload/36c6b0c823.png', 0),
(4, 'I-phone 7', 6, 1, '<p>tuewrt irtuit uetuet euteu tuti tut wpotipo iqrpoi oprqp orruqriwqjrru rweirw y r wyotwtnwt t nt wjtt wttwrlkwjtjkwoirwoi t wrtwiurt iu uiw w tiwt uitw ew iowt t e o or re rero e rtotr t gjuirrgfvgvfgfggyhtr yryrt yr tyry ryr yy </p>', 385.25, 'upload/b45a9ac0bd.jpg', 1),
(5, 'Walton Primo R-7', 6, 5, '<p>rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r rwerewr werw r wrwe rwr wrw r</p>', 7778.00, 'upload/d304221784.png', 0),
(7, 'Freeze', 7, 1, '<p>w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56 w twrt wrt2345 t eg3 65436t 56</p>', 50211.00, 'upload/1ddf04ab65.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wlist`
--

CREATE TABLE `tbl_wlist` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_wlist`
--
ALTER TABLE `tbl_wlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_wlist`
--
ALTER TABLE `tbl_wlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
