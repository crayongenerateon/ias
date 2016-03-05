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

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'admin');

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `role_role_id`, `religion_religion_id`, `departement_dept_id`, `user_status_user_id`, `mariage_status_mariage_id`, `user_name`, `user_password`, `user_full_name`, `user_email`, `user_phone`, `user_born`, `user_date_born`, `user_ktp`, `user_npwp`, `user_address`, `user_address2`, `user_city`, `user_contract_start`, `user_contract_end`, `user_reg_start`, `user_reg_end`) VALUES
(26, 1, NULL, NULL, NULL, NULL, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Administrator', 'tes@gmail.com', '', '', '0000-00-00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
