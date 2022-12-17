-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 21, 2022 at 12:52 AM
-- Server version: 10.3.28-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lhwrccyp_ctfms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_token`
--

CREATE TABLE `admin_token` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_token`
--

INSERT INTO `admin_token` (`id`, `token`) VALUES
(1, '0'),
(2, '1'),
(3, '2');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `timestamp` date NOT NULL DEFAULT current_timestamp(),
  `message` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `response` varchar(255) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `tm` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `timestamp`, `message`, `status`, `response`, `time`, `tm`) VALUES
(50, '', 'coddiner@gmail.com', '', '2022-11-08', 'Yes sure you will, thankyou for the message', '', 'reply', '03:01:41', '2022-11-08 08:01:41'),
(51, 'Walt', 'walterchelimo274@gmail.com', 'Hjf', '2022-11-10', 'Job', '1', '', '15:00:36', '2022-11-10 20:00:36'),
(49, 'Moses', 'mary@risetsystems.com', 'Quotation', '2022-10-31', 'Hello nice to meet you', '1', '', '00:59:03', '2022-10-31 04:59:03'),
(48, 'walter', 'coddiner@gmail.com', 'Hey yooh', '2022-10-27', 'Hello sir, hope you are doing good, I was requesting if i can get the project code by the end of the month. ', '1', '', '11:55:02', '2022-10-27 15:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `timestamp`) VALUES
(1, 'Meeting', 'The meeting concerns important talks, farmers will have there views', '2022-03-17 13:01:23'),
(2, 'ceo', 'Company ceo is needed to replace the former one', '2022-03-28 08:38:18'),
(4, 'newsss', 'newsss', '2022-09-14 09:48:05');

-- --------------------------------------------------------

--
-- Table structure for table `produce`
--

CREATE TABLE `produce` (
  `id` int(11) NOT NULL,
  `payrates` float NOT NULL,
  `weight` float NOT NULL,
  `dtpay` float NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `factoryid` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produce`
--

INSERT INTO `produce` (`id`, `payrates`, `weight`, `dtpay`, `date`, `factoryid`) VALUES
(31, 60, 20, 1200, '2022-11-11', 'TFMS/4/22  '),
(30, 60, 44, 2640, '2022-11-08', 'TFMS/3/22  '),
(29, 60, 1000, 60000, '2022-11-08', 'TFMS/1/22  '),
(28, 60, 20, 1200, '2022-11-08', 'TFMS/3/22  '),
(27, 60, 3, 180, '2022-11-08', 'TFMS/1/22  ');

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reset_password`
--

INSERT INTO `reset_password` (`id`, `email`, `token`) VALUES
(23, 'walterchelimo123@gmail.com', 'bc3b7bfe71033687aba30f664a12d5aac750f1915404791406150ebc6b807b31fabada498852b1fe422446df6525fb34c027'),
(22, 'walterchelimo123@gmail.com', 'd682653d2690aa20fe5fd3b230366aae1e7873984e42cfab595aef87091dc4874f20cf28470f98e2be699e54de6395969dd2'),
(21, 'walterchelimo123@gmail.com', '2e6d7ed20f2f635f0d47988bfab7f41b34395dedec2663227636c90cda634860f4fb0816e6bb2514898d74370cf0ad249a9d'),
(20, 'walterchelimo123@gmail.com', 'cfbbbb6b2075dca4975da15026a031e86b3cf8bbcb918547e54378cc377571ed1cb29228e1fa6c510499f342f005ad2a6693'),
(19, 'walterchelimo123@gmail.com', '2a340334cd57423f8dfec4ec882baaf37a437554bc010548d739acb9f1d7e4638063a63afff66a49fce2469504a993153853'),
(18, 'walterchelimo123@gmail.com', 'd3455d2a024db9a3f5990a9630049cf55755b7aa68f69add231d00d1811a00112b0f5ccfd905cb76e8eaa30b60dc0a43dba2'),
(17, 'walterchelimo123@gmail.com', '99206d3b496ece27cdc9d9ca50b02fa3c1aa71789d739c0cb0fea1a444dbba530ade7cec1cbc7ae2f5b2bb3eeaa68638af0a'),
(16, 'vinkbt01@gmail.com', '875acf51df2fcd384b5212d331023abd84934afafcac78d1616834cdacd7a9440cadb6807ad8997fef070e11f821d3e28640'),
(15, 'vinkbt01@gmail.com', '662a99260b3d1493d58f75790e6897d37c550ff39756231a5422b05f48c661a1ac8d244e48fd41d5721a5c6746e404e4c1e9'),
(14, 'walterchelimo123@gmail.com', '2b4d6d4d2364edb9d2ee8209cbe84c4a4f744637d53f4df753771f4d6c765a6597704b04745384f976d70fba6ceb8fbd0cb9');

-- --------------------------------------------------------

--
-- Table structure for table `tenders`
--

CREATE TABLE `tenders` (
  `id` int(11) NOT NULL,
  `tender` varchar(255) NOT NULL,
  `dos` date NOT NULL,
  `tenderfile` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenders`
--

INSERT INTO `tenders` (`id`, `tender`, `dos`, `tenderfile`) VALUES
(1, 'Tender of builders to construct the new block at the factory', '2022-03-17', 'IMG_20201126_085731_130.jpg'),
(2, 'KTDA ANNOUNCES MONTHLY GREEN LEAF PAYMENT INCREASE FOR FARMERS', '2022-03-18', ''),
(3, 'Tender of the labour around the factory, should be a male candidate and over 61kgms ', '2022-03-18', 'fairtrade.png'),
(4, 'Tech staff on viruses', '2022-03-17', 'CV_walter.pdf'),
(5, 'uj', '2022-09-14', ''),
(6, 'uj', '2022-09-14', '');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `token`) VALUES
(1, '0'),
(3, '1'),
(4, '2'),
(5, '3'),
(6, '4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `pnumber` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `bankname` varchar(255) NOT NULL,
  `bankbranch` varchar(255) NOT NULL,
  `accountnumber` varchar(255) NOT NULL,
  `accountname` varchar(255) NOT NULL,
  `collectioncenter` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `factoryid` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `sname`, `lname`, `pnumber`, `usertype`, `profile`, `password`, `bankname`, `bankbranch`, `accountnumber`, `accountname`, `collectioncenter`, `email`, `factoryid`) VALUES
(8, 'walt', 'kibiwot', 'chelimo', '0721977429', 'Admin', 'avatar.jpg', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', '', '', 'walterchelimo123@gmail.com', 'admin1'),
(10, 'walter', 'kibiwot', 'chelim', '0725483220', 'user', 'avatar.jpg', '202cb962ac59075b964b07152d234b70', 'eguity', 'nakuru', '2576228682', 'solomon', 'center 3', 'chelimowalter12@gmail.com', 'TFMS/1/22'),
(11, 'moses', 'njuguna ', 'njuguna', '0725483220', 'Admin', 'avatar.jpg', '3899f7108c4e727bc38bad3a20882ee1', '', '', '', '', '', 'mosesnjuguna@gmail.com', 'ADMIN/2/22'),
(13, 'caleb', 'jeruto', 'njuguna', '+2547333333', 'user', 'avatar.jpg', 'd29d9a567dd6d453f8e184599e854e0d', 'eguity', 'nyahururu', '1290898980', 'joseph mbugua', 'center 3', 'chelimowalter123@gmail.com', 'TFMS/3/22'),
(14, 'walter', 'chelimo', 'abule', '+25472548322', 'user', 'avatar.jpg', 'aa2e4c11cd9528e9e454bbbbad5bc292', 'kcb', 'nakuru', '45009788', 'walter abule', 'center 2', 'coddiner123@gmail.com', 'TFMS/4/22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_token`
--
ALTER TABLE `admin_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produce`
--
ALTER TABLE `produce`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_usersproduce` (`factoryid`);

--
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenders`
--
ALTER TABLE `tenders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`factoryid`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_token`
--
ALTER TABLE `admin_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produce`
--
ALTER TABLE `produce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tenders`
--
ALTER TABLE `tenders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
