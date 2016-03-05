-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 05, 2016 at 11:34 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ias`
--

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE IF NOT EXISTS `departement` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `its_tickets`
--

CREATE TABLE IF NOT EXISTS `its_tickets` (
  `its_id` int(11) NOT NULL,
  `user_user_id` int(11) DEFAULT NULL,
  `its_issue` varchar(150) DEFAULT NULL,
  `its_desc` text,
  `its_status` varchar(30) DEFAULT NULL,
  `its_desc_it` text,
  `create_date` date DEFAULT NULL,
  `finish_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mariage_status`
--

CREATE TABLE IF NOT EXISTS `mariage_status` (
  `mariage_id` int(11) NOT NULL,
  `mariage_stat_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `religion`
--

CREATE TABLE IF NOT EXISTS `religion` (
  `religion_id` int(11) NOT NULL,
  `religion_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `role_role_id` int(11) DEFAULT NULL,
  `religion_religion_id` int(11) DEFAULT NULL,
  `departement_dept_id` int(11) DEFAULT NULL,
  `user_status_user_id` int(11) DEFAULT NULL,
  `mariage_status_mariage_id` int(11) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_full_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_phone` varchar(45) DEFAULT NULL,
  `user_born` varchar(150) DEFAULT NULL,
  `user_date_born` date DEFAULT NULL,
  `user_ktp` int(11) DEFAULT NULL,
  `user_npwp` varchar(150) DEFAULT NULL,
  `user_address` text,
  `user_address2` text,
  `user_city` varchar(100) DEFAULT NULL,
  `user_contract_start` date DEFAULT NULL,
  `user_contract_end` date DEFAULT NULL,
  `user_reg_start` date DEFAULT NULL,
  `user_reg_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE IF NOT EXISTS `user_status` (
  `user_id` int(11) NOT NULL,
  `user_stat_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wo_tickets`
--

CREATE TABLE IF NOT EXISTS `wo_tickets` (
  `wo_id` int(11) NOT NULL,
  `user_user_id` int(11) DEFAULT NULL,
  `wo_issue` varchar(150) DEFAULT NULL,
  `wo_desc` text,
  `wo_status` varchar(30) DEFAULT NULL,
  `wo_desc_wo` text,
  `create_date` date DEFAULT NULL,
  `finish_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `its_tickets`
--
ALTER TABLE `its_tickets`
  ADD PRIMARY KEY (`its_id`),
  ADD KEY `fk_its_tickets_user1_idx` (`user_user_id`);

--
-- Indexes for table `mariage_status`
--
ALTER TABLE `mariage_status`
  ADD PRIMARY KEY (`mariage_id`);

--
-- Indexes for table `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`religion_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_user_religion_idx` (`religion_religion_id`),
  ADD KEY `fk_user_departement1_idx` (`departement_dept_id`),
  ADD KEY `fk_user_user_status1_idx` (`user_status_user_id`),
  ADD KEY `fk_user_mariage_status1_idx` (`mariage_status_mariage_id`),
  ADD KEY `fk_user_role1_idx` (`role_role_id`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wo_tickets`
--
ALTER TABLE `wo_tickets`
  ADD PRIMARY KEY (`wo_id`),
  ADD KEY `fk_wo_tickets_user1_idx` (`user_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `its_tickets`
--
ALTER TABLE `its_tickets`
  MODIFY `its_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mariage_status`
--
ALTER TABLE `mariage_status`
  MODIFY `mariage_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `religion`
--
ALTER TABLE `religion`
  MODIFY `religion_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wo_tickets`
--
ALTER TABLE `wo_tickets`
  MODIFY `wo_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `its_tickets`
--
ALTER TABLE `its_tickets`
  ADD CONSTRAINT `fk_its_tickets_user1` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_departement1` FOREIGN KEY (`departement_dept_id`) REFERENCES `departement` (`dept_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_mariage_status1` FOREIGN KEY (`mariage_status_mariage_id`) REFERENCES `mariage_status` (`mariage_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_religion` FOREIGN KEY (`religion_religion_id`) REFERENCES `religion` (`religion_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_role1` FOREIGN KEY (`role_role_id`) REFERENCES `role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_user_status1` FOREIGN KEY (`user_status_user_id`) REFERENCES `user_status` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `wo_tickets`
--
ALTER TABLE `wo_tickets`
  ADD CONSTRAINT `fk_wo_tickets_user1` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
