-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 10, 2024 at 04:03 PM
-- Server version: 10.6.15-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtechscom_axiesnft`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `nftid` varchar(255) NOT NULL,
  `bid_transaction_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nft_image` varchar(255) NOT NULL,
  `nft_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `nft_price` varchar(255) NOT NULL,
  `bid_amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `userid`, `nftid`, `bid_transaction_id`, `username`, `nft_image`, `nft_name`, `category`, `description`, `nft_price`, `bid_amount`, `status`) VALUES
(78, '21', '$70', 'ee5353ec4', 'Christopher', '1708436932.png', 'NFT', 'human', '', '6', '12', 'pending'),
(79, '21', '63', 'ef43c88cf', 'eric', '1708435609.png', 'word', 'human', '', '3', '3', 'pending'),
(80, '21', '60', 'f03a07cae', 'mike', '1708435140.png', 'Boy 2', 'human', '', '2', '3', 'pending'),
(86, '21', '59', 'f73276c33', 'kate', '1708434264.png', 'boy', 'human', 'this is a boy nft', '4', '4', '1'),
(87, '21', '61', 'eed8eeab0', 'Johnson', '1708435259.png', 'Boy and Girl', 'human', 'This is a boy and gIrl nft', '5', '5', 'pending'),
(88, '21', '61', 'eed8eeab0', 'Johnson', '1708435259.png', 'Boy and Girl', 'human', 'This is a boy and gIrl nft', '5', '5', 'pending'),
(89, '21', '63', 'efd5dad7b', 'eric', '1708435609.png', 'word', 'human', '', '3', '4', 'pending'),
(90, '21', '69', 'f4ff3bea3', 'Nathan', '1708436861.png', 'NFT', 'human', '', '4', '5', 'pending'),
(91, '23', '73', 'fea22ddce', 'web12', '1709046616.png', 'card', 'card', 'this is a card image', '3', '3', '1'),
(92, '23', '72', '03dfc1aed', 'james12', '1709042157.png', 'master card', 'card', 'this is a master card', '10', '10', 'pending'),
(93, '22', '75', '49998362c', 'web12', '1709048480.png', 'text2', 'card', 'this is a text image 2', '6', '6', '1'),
(94, '22', '75', '4b156a7fb', 'web12', '1709048480.png', 'text2', 'card', 'this is a text image 2', '6', '6', '2'),
(95, '22', '75', '50260d46a', 'web12', '1709048480.png', 'text2', 'card', 'this is a text image 2', '6', '6', 'pending'),
(96, '22', '77', 'cca62c16f', 'web12', '1709100117.png', 'text2', 'card', 'sdas', '3', '3', 'pending'),
(97, '22', '77', 'cd150a9c6', 'web12', '1709100117.png', 'text2', 'card', 'sdas', '3', '3', '1'),
(98, '22', '79', 'ce8641bf3', 'web12', '1709100619.png', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'wqq', 'sfdf', '3', '3', '1'),
(99, '22', '80', 'd31965aad', 'web12', '1709101769.png', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'wqq', 'srer', '3', '3', '1'),
(100, '22', '81', 'd47875cea', 'web12', '1709102130.png', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'wqq', 'Scdas', '3', '3', '1'),
(101, '22', '82', 'd937081ca', 'web12', '1709103338.png', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'wqq', 'ewew', '1', '1', '1'),
(102, '22', '83', 'db889b860', 'web12', '1709103689.png', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'dsdd', 'sdad', '2', '4', '1'),
(103, '21', '84', 'deb8502fc', 'web12', '1709104766.png', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'dsdd', 'sdad', '1', '2', '2'),
(104, '21', '84', 'dfc72a638', 'web12', '1709104766.png', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'dsdd', 'sdad', '1', '2', '2'),
(105, '21', '84', 'dfe056b75', 'web12', '1709104766.png', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'dsdd', 'sdad', '1', '2', '2'),
(106, '21', '84', 'e2c5446a2', 'web12', '1709104766.png', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'dsdd', 'sdad', '1', '3', '2'),
(107, '21', '84', 'e33d90f1e', 'web12', '1709104766.png', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'dsdd', 'sdad', '1', '2', '2'),
(108, '21', '84', 'e39d08eea', 'web12', '1709104766.png', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'dsdd', 'sdad', '1', '2', '2'),
(109, '21', '84', 'e575b36e5', 'web12', '1709104766.png', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'dsdd', 'sdad', '1', '2', '2'),
(110, '21', '84', 'e79fdffdf', 'web12', '1709104766.png', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'dsdd', 'sdad', '1', '2', '2'),
(111, '21', '84', 'e96e08e2a', 'web12', '1709104766.png', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'dsdd', 'sdad', '1', '2', '2'),
(112, '21', '84', 'ea06de408', 'web12', '1709104766.png', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'dsdd', 'sdad', '1', '2', 'pending'),
(113, '21', '84', 'eaf38c378', 'web12', '1709104766.png', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'dsdd', 'sdad', '1', '2', '2'),
(114, '21', '84', 'eccd417c7', 'web12', '1709104766.png', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'dsdd', 'sdad', '1', '2', '2'),
(115, '21', '84', 'ed7b1699a', 'web12', '1709104766.png', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'dsdd', 'sdad', '1', '2', '1'),
(116, '21', '85', 'eed7b3e59', 'web12', '1709108907.png', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'dsdd', 'jul', '1', '2', '1'),
(117, '21', '86', 'fbac33103', 'web12', '1709112131.png', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'dsdd', 'fefe', '1', '2', '1'),
(118, '21', '87', 'fc5051957', 'web12', '1709112372.png', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'dsdd', 'deww', '2', '3', '1'),
(119, '21', '88', '089592114', 'jack12', '1709115395.png', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'dsdd', 'zx', '1', '2', '1'),
(120, '22', '60', 'bbf4ef97d', 'mike', '1708435140.png', 'Boy 2', 'human', '', '2', '2', 'pending'),
(121, '22', '61', 'c1c9c2f52', 'Johnson', '1708435259.png', 'Boy and Girl', 'human', 'This is a boy and gIrl nft', '5', '5', 'pending'),
(122, '22', '60', 'c3067eae9', 'mike', '1708435140.png', 'Boy 2', 'human', '', '2', '2', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `id` int(11) NOT NULL,
  `userid` varchar(225) NOT NULL,
  `transactionid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `payment_proof` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`id`, `userid`, `transactionid`, `username`, `amount`, `payment_proof`, `status`) VALUES
(16, '1', '71ebec573', 'osaze12', '40', '1706783231.png', '1'),
(17, '1', '74701eae9', 'osaze12', '50', '1706783870.png', '1'),
(18, '1', '7484b7d2f', 'osaze12', '10', '1706783897.png', '2'),
(19, '1', '74bd22f14', 'osaze12', '50', '1706784110.png', '1'),
(20, '2', 'f8d6aebbe', 'joy12', '10', '1706883310.png', '1'),
(21, '1', '1e5baf41a', 'osaze12', '10', '1706958438.png', '1'),
(22, '1', '8877e39bd', 'osaze12', '10', '1707116778.png', '1'),
(23, '1', '8877e39bd', 'osaze12', '10', '1707116782.png', '1'),
(24, '1', '89169b3f1', 'osaze12', '50', '1707116837.png', '1'),
(25, '1', '89275c35a', 'osaze12', '10', '1707117206.png', '1'),
(26, '1', '8a9719ca3', 'osaze12', '20', '1707117218.png', '1'),
(27, '1', '3fe17dc4a', 'osaze12', '50', '1707229163.png', '1'),
(28, '1', 'b4d175514', 'osaze12', '23', '1707390191.png', '2'),
(29, '1', 'b50e1a86d', 'osaze12', '100', '1707390234.png', '1'),
(30, '1', 'c61b67924', 'osaze12', '10', '1707394612.png', '1'),
(31, '1', 'e6f70ab46', 'osaze12', '100000000000000000000', '1707403018.png', '2'),
(32, '', 'bdc308113', '', '12', '1708441050.png', 'pending'),
(33, '21', 'be553da22', 'james12', '11', '1708441265.png', '1'),
(34, '21', 'c10d65f2d', 'james12', '10', '1708441884.png', 'pending'),
(35, '21', 'c1a561eb4', 'james12', '12', '1708442048.png', '1'),
(36, '23', 'fa8a0fb3c', 'web12', '10', '1709046422.png', '1'),
(37, '22', '46c34b028', 'aizenosa', '44', '1709065953.png', '2'),
(38, '22', '479dc3464', 'aizenosa', '10', '1709066285.png', '1'),
(39, '22', '48309cca7', 'aizenosa', '2', '1709066347.png', '2'),
(40, '24', '071e13680', 'jack12', '10', '1709115184.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kyc`
--

CREATE TABLE `kyc` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `cardnumber` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `idcardimage` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kyc`
--

INSERT INTO `kyc` (`id`, `username`, `cardnumber`, `nationality`, `idcardimage`, `status`, `date`) VALUES
(6, 'osaze12', '1314141', 'Nigeria', '1707074204.png', 'approved', '2024-02-04 19:27:58'),
(7, 'joy12', '3244223', 'usa', '1707114205.png', 'approved', '2024-02-05 10:18:03'),
(8, 'joy12', '2342423', 'usa', '1707128268.png', 'approved', '2024-02-05 10:18:03'),
(9, 'joy12', '4242134124', 'Nigeria', '1707132002.png', 'approved', '2024-02-05 11:20:37'),
(10, 'mike12', '324545', 'Nigeria', '1707230450.png', 'approved', '2024-02-06 14:45:59'),
(11, 'james12', '13298491874918791', 'Italy', '1708434488.png', 'approved', '2024-02-20 13:09:09'),
(12, 'aizenosa', 'erertbertre', 'Italy', '1709037417.png', 'approved', '2024-02-27 20:31:21'),
(13, 'aizenosa', 'ryrtryhy', 'Italy', '1709037555.png', 'approved', '2024-02-27 20:31:21'),
(14, 'osaze12', '32374124', 'usa', '1709045751.png', 'approved', '2024-02-27 14:57:56'),
(15, 'web12', '32374124', 'usa', '1709046029.png', 'approved', '2024-02-27 15:01:37'),
(16, 'aizenosa', 'tuydtyu', 'Nigerian', '1709065611.png', 'approved', '2024-02-27 20:31:21'),
(17, 'aizenosa', 'tsysrts', 'sdfjjdfjd', '1709065860.png', 'approved', '2024-02-27 20:31:21'),
(18, 'jack12', '32374124', 'usa', '1709114009.png', 'approved', '2024-02-28 10:09:21'),
(19, 'jack12', '32374124', 'usa', '1709114379.png', 'approved', '2024-02-28 10:09:21'),
(20, 'jack12', '3237412433', 'usa', '1709114675.png', 'approved', '2024-02-28 10:09:21'),
(21, 'jack12', '3237412433', 'usa', '1709114863.png', 'approved', '2024-02-28 10:09:21'),
(22, 'jack12', '3237412433', 'usa', '1709114952.png', 'approved', '2024-02-28 10:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `Siteurl` varchar(255) NOT NULL,
  `sitename` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `socialcontact` varchar(255) NOT NULL,
  `gas_Fee` varchar(255) NOT NULL,
  `walletaddress` varchar(255) NOT NULL,
  `mailhost` varchar(255) NOT NULL,
  `webmail` varchar(255) NOT NULL,
  `mailpassword` varchar(255) NOT NULL,
  `mailport` varchar(255) NOT NULL,
  `mailsmtpsecure` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `Siteurl`, `sitename`, `email`, `socialcontact`, `gas_Fee`, `walletaddress`, `mailhost`, `webmail`, `mailpassword`, `mailport`, `mailsmtpsecure`) VALUES
(1, 'https:// axiesnft.com/', 'Axies', 'kate4172528@gmail.com', 'https://facebook/axies/', '2', 'ethi93i3j440', 'webtechs.com.ng', 'info@webtechs.com.ng', 'lQ5rQxqr.k?7', '465', 'ssl');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Customurl` varchar(255) NOT NULL,
  `Bio` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `discord` varchar(255) NOT NULL,
  `profileimage` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` int(11) NOT NULL,
  `account_balance` varchar(11) NOT NULL DEFAULT '0.00',
  `status` varchar(255) NOT NULL DEFAULT 'inactive',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `email`, `Customurl`, `Bio`, `facebook`, `twitter`, `discord`, `profileimage`, `password`, `otp`, `account_balance`, `status`, `date_created`) VALUES
(1, 'oasze', 'osaze12', 'osazeokundaye@gmail.com', 'osaze.com', 'welcome  to my bio', 'https:// facebook/osaze.com/', 'https:// twitter/osaze.com/', 'https:// discord/osaze.com/', '1707126559.png', '123456', 7, '66', 'active', '2024-02-20 13:12:05'),
(2, 'joy', 'admin1', 'joy@gmail.com', '', '', '', '', '', '', '123456', 0, '38', 'blocked', '2024-02-10 10:10:07'),
(9, 'mike', 'mike12', 'mike@gmail.com', '', '', '', '', '', '', '1234567', 8, '0', 'blocked', '2024-02-10 10:05:32'),
(11, 'you', 'you', 'you@gmail.com', '', '', '', '', '', '', '123456', 0, '0', 'inactive', '2024-02-07 20:38:13'),
(12, 'my', 'mt255', 'my2551@gmail.com', '', '', '', '', '', '', '123456', 908, '0', 'inactive', '2024-02-07 20:52:20'),
(13, 'my', 'mt255', 'my@gmail.com', '', '', '', '', '', '', '123456', 7, '0', 'inactive', '2024-02-07 20:54:20'),
(14, 'osaze', 'osaze12', 'osazeokundaye@gmail.com', '', '', '', '', '', '', '123456', 4, '2', 'active', '2024-02-27 14:57:56'),
(15, 'osaze', 'osaze12', 'osazeokundaye@gmail.com', '', '', '', '', '', '', '123456', 4, '2', 'active', '2024-02-27 14:57:56'),
(16, 'osaze', 'osaze12', 'osazeokundaye@gmail.com', '', '', '', '', '', '', '1234567', 45, '2', 'active', '2024-02-27 14:57:56'),
(18, 'john', 'john12', 'john@gamil.com', '', '', '', '', '', '', '', 0, '0', 'inactive', '2024-02-19 19:27:06'),
(19, 'john', 'john12', 'john@gamil.com', '', '', '', '', '', '', '', 0, '0', 'inactive', '2024-02-19 19:27:43'),
(21, 'james', 'james12', 'james2758543@gmail.com', '', '', '', '', '', '65dde8ed1317b.png', '1234567', 1, '10', 'active', '2024-02-28 10:19:08'),
(22, 'user', 'aizenosa', 'user@mail.com', '', '', '', '', '', '', '123456', 2147483647, '22', 'active', '2024-03-10 14:26:26'),
(23, 'web', 'web12', 'webtech9111@gmail.com', '', '', '', '', '', '65ddec33e922f.png', '1234567890', 0, '20', 'active', '2024-02-28 09:27:15'),
(24, 'jack', 'jack12', 'j9448459@gmail.com', '', '', '', '', '', '', '1234567890', 1, '9', 'active', '2024-02-28 10:21:53'),
(25, 'Omonigho ufuoma Anthony', 'Tonywhyte', 'anthonyufuoma42@gmail.com', '', '', '', '', '', '', '12345678', 0, '0.00', 'inactive', '2024-03-08 07:20:18'),
(26, 'creach alex', 'alex34', 'creachalex1@gmail.com', '', '', '', '', '', '', '1234567890', 50400000, '0.00', 'inactive', '2024-03-08 08:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `usermint`
--

CREATE TABLE `usermint` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `mint_transactionid` varchar(255) NOT NULL,
  `admin_transactionid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `bids` int(11) NOT NULL,
  `owner` varchar(225) NOT NULL,
  `nft_image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usermint`
--

INSERT INTO `usermint` (`id`, `userid`, `mint_transactionid`, `admin_transactionid`, `username`, `price`, `title`, `category`, `description`, `bids`, `owner`, `nft_image`, `status`) VALUES
(46, '21', '2d2a57a97', '', 'osaze12', '3', 'this is my nft', 'art', 'art work', 0, '', '1707289940.png', '2'),
(47, '21', '2d56d17ed', '', 'osaze12', '3', 'my nft', 'human', 'this is my art work', 0, '', '1707290001.png', '2'),
(48, '21', '2f8b44d2b', '', 'osaze12', '2', 'sdd', 'dsds', 'dsfef', 0, '', '1707290540.png', '2'),
(49, '21', '3173d893a', '', 'osaze12', '5', 'hhti', 'hdooas', 'dsfsdf', 0, '', '1707291030.png', '2'),
(50, '1', '', '', '', '5', 'Box', 'hdooas', 'This is a box do you like it', 5, '', '1707291087.png', '2'),
(51, '1', '', '', 'mike', '5', 'Drawing', 'hdooas', 'this is the second  house', 4, '', '1707291179.png', '2'),
(52, '21', '3411af7f3', '', 'osaze12', '5', 'erewrsdfs', 'sdfsd', 'sdfsd', 0, '', '1707291688.png', '2'),
(53, '2', '347b2b4f4', '', 'admin1', '3', 'ereww', 'erwer', 'efwer', 0, '', '1707291801.png', 'pending'),
(54, '1', '', '', 'me', '10', 'laptop', 'human', 'This is a yellow  🗃box', 4, '', '1707324962.png', '2'),
(55, '1', '', 'bfbb8f16e', 'mike', '1', 'cartoon', 'human', 'this is the second  house', 10, '', '1707327449.png', '2'),
(57, '21', 'c35a7b112', '', 'osaze12', '1', '12e1', 'wrqr', 'qwrqrw', 0, '', '1707328375.png', '2'),
(58, '21', 'c38425704', '', 'osaze12', '1', 'wefwf', 'ewe', 'wewe', 0, '', '1707328415.png', '2'),
(59, '21', '', 'a2e9a0dd2', 'kate', '4', 'boy', 'human', 'this is a boy nft', 5, '', '1708434264.png', '2'),
(60, '', '', 'a674b1ad4', 'mike', '2', 'Boy 2', 'human', '', 8, '', '1708435140.png', '1'),
(61, '', '', 'a6c58160e', 'Johnson', '5', 'Boy and Girl', 'human', 'This is a boy and gIrl nft', 6, '', '1708435259.png', '1'),
(62, '', '', 'a73d27d82', 'Jason', '5', 'Man', 'human', 'This is man nft', 5, '', '1708435341.png', '1'),
(63, '', '', 'a78daead4', 'eric', '3', 'word', 'human', '', 7, '', '1708435609.png', '1'),
(64, '', '', 'a8996c8d0', 'joy', '8', 'womna', 'human', 'this is a woman nft', 7, '', '1708435756.png', '1'),
(65, '', '', 'a92ca42c9', 'Liam', '5', 'nft', 'human', '', 5, '', '1708436016.png', '1'),
(66, '', '', 'aa310e7da', 'Noah', '3', 'NFT', 'human', '', 5, '', '1708436067.png', '1'),
(67, '', '', 'aa6476e10', 'Oliver', '2', 'NFT', '', '', 9, '', '1708436193.png', '1'),
(68, '', '', 'aba992525', 'Elijah', '3', 'NFT', '', '', 4, '', '1708436776.png', '1'),
(69, '', '', 'ad2a365d6', 'Nathan', '4', 'NFT', 'human', '', 3, '', '1708436861.png', '1'),
(70, '', '', 'ad7dc3244', 'Christopher', '6', 'NFT', 'human', '', 7, '', '1708436932.png', '1'),
(71, '21', 'c55581e13', '', 'james12', '5', 'monkey', 'human', 'This is a nft image', 0, '', '1708443057.png', '1'),
(72, '21', 'e9b2d1ad9', '', 'james12', '10', 'master card', 'card', 'this is a master card', 1, '', '1709042157.png', '1'),
(73, '21', 'fb2471004', '', 'web12', '3', 'card', 'card', 'this is a card image', 1, '', '1709046616.png', '2'),
(74, '21', '01e465079', '', 'web12', '4', 'text', 'card', 'this is a nft', 0, '', '1709048325.png', '2'),
(75, '21', '027d4f3ae', '', 'web12', '6', 'text2', 'card', 'this is a text image 2', 3, '', '1709048480.png', '2'),
(76, '22', '4906004c1', '', 'aizenosa', '2', 'test work', 'test', 'test work', 0, '', '1709066531.png', '1'),
(77, '21', 'cc4115ad2', '', 'web12', '3', 'text2', 'card', 'sdas', 2, '', '1709100117.png', '2'),
(78, '21', 'cc9d0209d', '', 'web12', '3', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'wqq', 'sda', 0, '', '1709100213.png', '2'),
(79, '21', 'ce295f08b', '', 'web12', '3', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'wqq', 'sfdf', 1, '', '1709100619.png', '2'),
(80, '21', 'd2b442ba8', '', 'web12', '3', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'wqq', 'srer', 1, '', '1709101769.png', '2'),
(81, '21', 'd4043872a', '', 'web12', '3', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'wqq', 'Scdas', 1, '', '1709102130.png', '2'),
(82, '21', 'd8b061b41', '', 'web12', '1', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'wqq', 'ewew', 1, '', '1709103338.png', '2'),
(83, '21', 'da31cbbf8', '', 'web12', '2', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'dsdd', 'sdad', 1, '', '1709103689.png', '2'),
(84, '21', 'de55cfc5f', '', 'web12', '1', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'dsdd', 'sdad', 13, '', '1709104766.png', '2'),
(85, '21', 'ee91551b6', '', 'web12', '1', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'dsdd', 'jul', 1, '', '1709108907.png', '2'),
(86, '21', 'fb3281648', '', 'web12', '1', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'dsdd', 'fefe', 1, '', '1709112131.png', '2'),
(87, '21', 'fc1567ac3', '', 'web12', '2', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'dsdd', 'deww', 1, '', '1709112372.png', '2'),
(88, '21', '07f1a9dcb', '', 'jack12', '1', 'Why every startup should adopter Amazonâ€™s Hot Air bag Baloon Race 2019', 'dsdd', 'zx', 1, '', '1709115395.png', '2'),
(89, '22', 'bb8a71cbb', '', 'aizenosa', '5', 'Hnft', 'Art', 'Hnft special', 0, '', '1709882325.png', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawl`
--

CREATE TABLE `withdrawl` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `transactionid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `payment_address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `withdrawl`
--

INSERT INTO `withdrawl` (`id`, `userid`, `transactionid`, `username`, `amount`, `payment_address`, `status`) VALUES
(1, '1', '783a1c4ac', 'osaze12', '10', '131311dddddd', '1'),
(2, '1', '783a1c4ac', 'osaze12', '10', '131311dddddd', '1'),
(3, '1', '7954bf222', 'osaze12', '10', '131311dddddd', '1'),
(4, '1', '7a5aa2627', 'osaze12', '10', '131311dddddd', '2'),
(5, '1', '7a66eb2c2', 'osaze12', '10', '131311dddddd', '2'),
(6, '1', '7c364e5b6', 'osaze12', '40', '131311dddddd', '2'),
(7, '1', 'adbadd04d', 'osaze12', '70', 'ffff41142', '1'),
(8, '1', '416349adb', 'osaze12', '50', '131311dddddd', '1'),
(9, '1', '416349adb', 'osaze12', '50', '131311dddddd', '1'),
(10, '1', '416349adb', 'osaze12', '50', '131311dddddd', '1'),
(11, '1', '416349adb', 'osaze12', '50', '131311dddddd', '1'),
(12, '1', '41f73013d', 'osaze12', '20', '131311dddddd', '1'),
(13, '1', 'b54e04538', 'osaze12', '10', '43920389985-23', '2'),
(14, '1', 'b54e04538', 'osaze12', '10', '43920389985-23', '2'),
(15, '1', 'b54e04538', 'osaze12', '10', '43920389985-23', '2'),
(16, '21', 'bfe92e0c8', 'james12', '9', 'wejkfwejfw', '1'),
(17, '21', 'c255b0f2c', 'james12', '10', 'jljhljk', '1'),
(18, '21', 'c285cc4e8', 'james12', '10', 'jhjhk', '1'),
(19, '23', '017e3b682', 'web12', '10', 'wejhwew', '1'),
(20, '22', '4893d21ae', 'aizenosa', '1', 'xcxcccccccccE', '2'),
(21, '22', '48cf1d007', 'aizenosa', '2', 'fggr', '1'),
(22, '24', '078ce09c4', 'jack12', '1', 'sadsda', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyc`
--
ALTER TABLE `kyc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usermint`
--
ALTER TABLE `usermint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawl`
--
ALTER TABLE `withdrawl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `kyc`
--
ALTER TABLE `kyc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `usermint`
--
ALTER TABLE `usermint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `withdrawl`
--
ALTER TABLE `withdrawl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
