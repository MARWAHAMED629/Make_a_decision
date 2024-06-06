-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2023 at 05:54 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `draft_decisions`
--

-- --------------------------------------------------------

--
-- Table structure for table `draft`
--

CREATE TABLE `draft` (
  `id` int(11) NOT NULL,
  `n_draft` int(10) NOT NULL,
  `yare_draft` int(4) NOT NULL,
  `date` varchar(20) NOT NULL,
  `about` text NOT NULL,
  `aforementioned` text NOT NULL,
  `signature` varchar(50) NOT NULL,
  `img_draft` varchar(255) NOT NULL,
  `check_draft` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `draft`
--

INSERT INTO `draft` (`id`, `n_draft`, `yare_draft`, `date`, `about`, `aforementioned`, `signature`, `img_draft`, `check_draft`) VALUES
(21, 275, 2022, '2023-06-26', 'عطلتي يوم الوقوف بعرفة وعيد الاضحى المبارك', 'لايوجد', 'عبد الحميد الدبيبة', 'ق2.jpeg', 1),
(22, 805, 2022, '2023-01-01', 'دليل أجرات مراجعة الحساب', 'لايوجد', 'ناجي محمد عيسى', 'قق1.png', 1),
(23, 41234, 4141, '2023-07-14', 'esfdas', 'sfadsfd', 'dfasdsf', 'sidraam_planete_terre_avec_les_drapeaux_d5eb4847-e249-41b9-9a5d-b5fbaa2f363d.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `email`, `user_name`, `password`) VALUES
(2, '123@gmail.com', 'admin', 'admin'),
(5, 'admin@yahoo.com', 'admin2', 'admin2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `draft`
--
ALTER TABLE `draft`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `draft`
--
ALTER TABLE `draft`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
