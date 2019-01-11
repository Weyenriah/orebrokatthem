-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2019 at 12:56 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `okh`
--

-- --------------------------------------------------------

--
-- Table structure for table `okh_cats`
--

CREATE TABLE `okh_cats` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `color` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `home` tinyint(1) NOT NULL,
  `contact` varchar(1000) NOT NULL,
  `showcase` tinyint(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `okh_cat_images`
--

CREATE TABLE `okh_cat_images` (
  `image` varchar(255) NOT NULL,
  `cat_id` tinyint(255) NOT NULL,
  `k` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `okh_employees`
--

CREATE TABLE `okh_employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `okh_news`
--

CREATE TABLE `okh_news` (
  `id` int(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `news` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `okh_remember`
--

CREATE TABLE `okh_remember` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `born` int(11) DEFAULT NULL,
  `came` date DEFAULT NULL,
  `adopted` date DEFAULT NULL,
  `death` date NOT NULL,
  `description` varchar(10000) NOT NULL,
  `cause` varchar(1000) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `okh_textfields`
--

CREATE TABLE `okh_textfields` (
  `id` int(11) NOT NULL,
  `element` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `okh_cats`
--
ALTER TABLE `okh_cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `okh_cat_images`
--
ALTER TABLE `okh_cat_images`
  ADD PRIMARY KEY (`k`,`cat_id`) USING BTREE;

--
-- Indexes for table `okh_employees`
--
ALTER TABLE `okh_employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `okh_news`
--
ALTER TABLE `okh_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `okh_remember`
--
ALTER TABLE `okh_remember`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `okh_textfields`
--
ALTER TABLE `okh_textfields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `element` (`element`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `okh_cats`
--
ALTER TABLE `okh_cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `okh_employees`
--
ALTER TABLE `okh_employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `okh_news`
--
ALTER TABLE `okh_news`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `okh_remember`
--
ALTER TABLE `okh_remember`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `okh_textfields`
--
ALTER TABLE `okh_textfields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
