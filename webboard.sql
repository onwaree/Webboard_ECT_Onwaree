-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2024 at 06:18 AM
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
-- Database: `webboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'เรื่องทั่วไป'),
(2, 'เรื่องเรียน'),
(3, 'เรื่องกีฬา');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` varchar(20148) COLLATE utf8_unicode_ci NOT NULL,
  `post_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `content`, `post_date`, `user_id`, `post_id`) VALUES
(1, 'ไปญี่ปุ่นเลยจ้าๆๆ', '2024-03-08 10:25:23', 17, 2),
(5, 'sdfsdfsdf', '2024-03-08 11:46:40', 13, 5),
(6, 'dfsdf', '2024-03-08 11:48:30', 13, 5),
(7, 'ชลบุรี ชลบุรี ชลบุรี', '2024-03-08 12:10:11', 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(2048) COLLATE utf8_unicode_ci NOT NULL,
  `post_date` datetime NOT NULL,
  `cat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `post_date`, `cat_id`, `user_id`) VALUES
(1, 'PHP', 'เขียน PDO ยังไง', '2024-03-01 10:45:49', 2, 13),
(2, 'ไปเที่ยวไหนดี', 'กรุงเทพ ชลบุรี ', '2024-03-01 10:49:13', 1, 13),
(3, 'php basic', 'php basic 1', '2024-03-01 10:51:48', 2, 13),
(4, 'กีฬา', 'กีฬา เป็นกิจกรรมหรือการเล่นเพื่อความสนุกเพลิดเพลินหรือเพื่อผ่อนคลายความเคร่งเครียด', '2024-03-01 11:16:39', 3, 16),
(5, 'php basic2', 'WebPHP is a popular general-purpose scripting language for web development. Learn about the latest features,', '2024-03-01 11:18:31', 2, 17);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `gender` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `role` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `name`, `gender`, `email`, `role`) VALUES
(13, 'onwaree', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'onwaree sri', 'f', 's6603052423014@kmutnb.ac.th', 'm'),
(16, 'member', 'b54df48c4c77522382a5a3c2f0358573ad43746e', 'member', 'm', 'member@gmail.com', 'm'),
(17, 'admin', '8dc9fa69ec51046b4472bb512e292d959edd2aef', 'admin', 'f', 'admin@gmail.com', 'a'),
(18, 'adc', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'abc def', 'm', 'abc@gmail.com', 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
