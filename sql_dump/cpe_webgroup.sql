-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2017 at 02:13 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpe_webgroup`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm_config`
--

CREATE TABLE `adm_config` (
  `config_name` varchar(30) COLLATE utf8_bin NOT NULL,
  `config_prop` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `std_img_list`
--

CREATE TABLE `std_img_list` (
  `sid` int(11) NOT NULL,
  `url` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `std_listname`
--

CREATE TABLE `std_listname` (
  `sid` int(11) NOT NULL,
  `firstname_th` text CHARACTER SET utf8 COLLATE utf8_bin,
  `lastname_th` text CHARACTER SET utf8 COLLATE utf8_bin,
  `nickname` text CHARACTER SET utf8 COLLATE utf8_bin,
  `firstname_en` text CHARACTER SET utf8 COLLATE utf8_bin,
  `lastname_en` text CHARACTER SET utf8 COLLATE utf8_bin,
  `major` text CHARACTER SET utf8 COLLATE utf8_bin,
  `status` text CHARACTER SET utf8 COLLATE utf8_bin,
  `gender` text CHARACTER SET utf8 COLLATE utf8_bin,
  `blood` text CHARACTER SET utf8 COLLATE utf8_bin,
  `advisor` text CHARACTER SET utf8 COLLATE utf8_bin,
  `telno` text CHARACTER SET utf8 COLLATE utf8_bin,
  `email` text CHARACTER SET utf8 COLLATE utf8_bin,
  `from` text CHARACTER SET utf8 COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tech_listname`
--

CREATE TABLE `tech_listname` (
  `sid` int(11) NOT NULL,
  `firstname` text CHARACTER SET utf8 COLLATE utf8_bin,
  `nickname` text CHARACTER SET utf8 COLLATE utf8_bin,
  `room` text CHARACTER SET utf8 COLLATE utf8_bin,
  `telno` text CHARACTER SET utf8 COLLATE utf8_bin,
  `email` text CHARACTER SET utf8 COLLATE utf8_bin,
  `education` text CHARACTER SET utf8 COLLATE utf8_bin,
  `pic` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tec_img_list`
--

CREATE TABLE `tec_img_list` (
  `sid` int(11) NOT NULL,
  `url` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm_config`
--
ALTER TABLE `adm_config`
  ADD PRIMARY KEY (`config_name`);

--
-- Indexes for table `std_img_list`
--
ALTER TABLE `std_img_list`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `std_listname`
--
ALTER TABLE `std_listname`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `tech_listname`
--
ALTER TABLE `tech_listname`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `tec_img_list`
--
ALTER TABLE `tec_img_list`
  ADD PRIMARY KEY (`sid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
