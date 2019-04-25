-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2019 at 03:49 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `whydonate`
--
CREATE DATABASE IF NOT EXISTS `whydonate` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `whydonate`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(2, 'Chaitanya', 'cj@gmail.com', '112233'),
(3, 'Vaibhav', 'vj@gmail.com', '2233'),
(5, 'Vishal', 'vs@gmail.com', '2232'),
(6, 'Karan', 'mn@gmail.com', '644'),
(7, 'Test1', 'ts@gmail.com', '2232'),
(9, 'Test2', 't@s.f', '22321'),
(10, 'Test3', 'ttsa@asda.co', '7757');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;
