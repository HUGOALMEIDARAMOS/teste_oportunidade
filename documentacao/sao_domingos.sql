-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 19, 2018 at 12:29 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sao_domingos`
--

CREATE SCHEMA IF NOT EXISTS `sao_domingos` DEFAULT CHARACTER SET utf8 ;
USE `sao_domingos` ;

-- --------------------------------------------------------

--
-- Table structure for table `senha`
--

CREATE TABLE `senha` (
  `usuario_us_code` int(11) NOT NULL,
  `us_senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `senha`
--

INSERT INTO `senha` (`usuario_us_code`, `us_senha`) VALUES
(1, '202cb962ac59075b964b07152d234b70'),
(2, '202cb962ac59075b964b07152d234b70'),
(3, '202cb962ac59075b964b07152d234b70'),
(4, '202cb962ac59075b964b07152d234b70'),
(5, '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `us_code` int(11) NOT NULL,
  `us_nome` varchar(100) DEFAULT NULL,
  `us_email` varchar(100) DEFAULT NULL,
  `us_data_nasc` date DEFAULT NULL,
  `us_cpf` varchar(100) DEFAULT NULL,
  `us_foto` varchar(100) DEFAULT NULL,
  `us_ip` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`us_code`, `us_nome`, `us_email`, `us_data_nasc`, `us_cpf`, `us_foto`, `us_ip`) VALUES
(1, 'ana clara', 'ana@gmail.com', '1985-08-14', '15425458454', '../assets/imagens/upload/_5625_mulher1.png', '::1'),
(2, 'carlos augusto', 'carlos@gmail.com', '1983-02-20', '54854545454', '../assets/imagens/upload/_5869_himem1.png', '::1'),
(3, 'moiseis de almeida', 'moiseis@gmail.com', '1970-12-25', '54585474845', '../assets/imagens/upload/_4622_homem2.png', '::1'),
(4, 'samanta santos', 'samanta@gmail.com', '1992-01-17', '54585458545', '../assets/imagens/upload/_5580_mulher2.png', '::1'),
(5, 'leticia melo', 'leticia@gmail.com', '1983-08-08', '54654654654', '../assets/imagens/upload/_2179_mulher3.png', '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `senha`
--
ALTER TABLE `senha`
  ADD PRIMARY KEY (`usuario_us_code`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`us_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `us_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `senha`
--
ALTER TABLE `senha`
  ADD CONSTRAINT `us_code` FOREIGN KEY (`usuario_us_code`) REFERENCES `usuario` (`us_code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
