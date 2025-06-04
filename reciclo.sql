-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2025 at 06:52 AM
-- Server version: 11.5.2-MariaDB
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reciclo`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','buyer','seller') NOT NULL DEFAULT 'buyer'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`) VALUES
(1, 'chan', 'chan', '$2y$10$Q0cTBJPmlw72XNMfOxFXIerVrLPDkTRnmn79nU.8Prrhu2gZHqSxe', 'buyer'),
(2, 'zayn', 'zayn', '$2y$10$/n1eUjAp4mCQPTj2wYcZoeMh.U/ePAm73nDavMHYB50ZJRGi0Zkl6', 'admin'),
(3, 'BANGCHAN', 'chan@chan.com', '$2y$10$xqDlzuxuPST5H.O0b7eD8Olcu2ehI57FzTlv4D.buqcBwKAcnWW7S', 'admin'),
(4, 'dfgnm', 'chan2@chan.com', '$2y$10$AuoVln/AwktLKFexa2vmL.SVl13zoRF/4/lFlXqV5OXnVRy8VzShW', 'seller'),
(5, 'sdfghbn', 'chan3@chan.com', '$2y$10$cm60PobzKm0FN3lkvktKjeQ6bXa.GRQIiEhBjt8jekkoGsnQD7WJi', 'buyer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
