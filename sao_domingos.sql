-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 16-Jul-2018 às 13:03
-- Versão do servidor: 5.7.22-0ubuntu0.16.04.1
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `senha`
--

CREATE TABLE `senha` (
  `usuario_us_code` int(11) NOT NULL,
  `us_senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `senha`
--

INSERT INTO `senha` (`usuario_us_code`, `us_senha`) VALUES
(1, '202cb962ac59075b964b07152d234b70'),
(17, 'e10adc3949ba59abbe56e057f20f883e'),
(21, 'e35cf7b66449df565f93c607d5a81d09'),
(30, 'e10adc3949ba59abbe56e057f20f883e'),
(31, 'e10adc3949ba59abbe56e057f20f883e'),
(32, '289777908b5ae093449832cfba25d21a'),
(33, '202cb962ac59075b964b07152d234b70'),
(43, 'e10adc3949ba59abbe56e057f20f883e'),
(44, '00b5b92a8c34fc9366d76abeffbdc0a0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
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
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`us_code`, `us_nome`, `us_email`, `us_data_nasc`, `us_cpf`, `us_foto`, `us_ip`) VALUES
(1, 'pedro bial sousa de melo', 'moiseis@gmail.com', '1983-02-20', '123456789', 'IMG_20180116_192740.jpg', '::1'),
(2, 'manoela sousa de costa', 'manu@gmail.com', '1985-08-14', '123456789', 'IMG_20180116_192622.jpg', '::1'),
(3, 'santo de melo', 'santos@melo.com', '1988-12-25', '258741258', 'IMG_20180116_193104.jpg', '::1'),
(4, 'santo de melo', 'santos@melo.com', '1988-12-25', '258741258', 'IMG_20180116_193104.jpg', '::1'),
(5, 'diolinda de melo', 'diolinda@melo.com', '1985-02-14', '1234567', '', '::1'),
(6, 'diolinda de melo', 'diolinda@melo.com', '1985-02-14', '1234567', '', '::1'),
(7, 'diolinda de melo', 'diolinda@melo.com', '1985-02-14', '1234567', '', '::1'),
(8, 'diolinda de melo', 'diolinda@melo.com', '1985-02-14', '1234567', '', '::1'),
(9, 'diolinda de melo', 'diolinda@melo.com', '1985-02-14', '1234567', '', '::1'),
(10, 'diolinda de melo', 'diolinda@melo.com', '1985-02-14', '1234567', '', '::1'),
(11, 'diolinda de melo', 'diolinda@melo.com', '1985-02-14', '1234567', '', '::1'),
(12, 'diolinda de melo', 'diolinda@melo.com', '1985-02-14', '1234567', '', '::1'),
(13, 'benedita santos', 'benedita@gmail.com', '1962-07-14', '1584878', '', '::1'),
(14, 'benedita santos', 'benedita@gmail.com', '1962-07-14', '1584878', '', '::1'),
(15, 'benedita santos', 'benedita@gmail.com', '1962-07-14', '1584878', '', '::1'),
(16, 'benedita santos', 'benedita@gmail.com', '1962-07-14', '1584878', '', '::1'),
(17, 'joao marcelo de sousa', 'marcelo@gmail.com', '2019-02-14', '1234568', '', '::1'),
(18, 'joao marcelo de sousa', 'marcelo@gmail.com', '2019-02-14', '1234568', '', '::1'),
(19, 'joao marcelo de sousa', 'marcelo@gmail.com', '2019-02-14', '1234568', '', '::1'),
(20, 'joao marcelo de sousa', 'marcelo@gmail.com', '2019-02-14', '1234568', '', '::1'),
(21, 'pedro bial sousa de melo', 'haha@gmai.com', '1985-12-20', '1254875', '', '::1'),
(22, 'pedro bial sousa de melo', 'haha@gmai.com', '1985-12-20', '1254875', '', '::1'),
(23, 'pedro bial sousa de melo', 'haha@gmai.com', '1985-12-20', '1254875', '', '::1'),
(24, 'pedro bial sousa de melo', 'haha@gmai.com', '1985-12-20', '1254875', '', '::1'),
(25, 'pedro bial sousa de melo', 'haha@gmai.com', '1985-12-20', '1254875', '', '::1'),
(26, 'pedro bial sousa de melo', 'haha@gmai.com', '1985-12-20', '1254875', '', '::1'),
(27, 'pedro bial sousa de melo', 'haha@gmai.com', '1985-12-20', '1254875', '', '::1'),
(28, 'pedro bial sousa de melo', 'haha@gmai.com', '1985-12-20', '1254875', '', '::1'),
(29, 'pedro bial sousa de melo', 'haha@gmai.com', '1985-12-20', '1254875', '', '::1'),
(30, 'sabrina', 'sabrina@gmail.com', '1985-05-14', '45875848', '', '::1'),
(31, 'maria joana de melo sousa', 'maria.joana@gmail.com', '1998-02-14', '5456789454', 'IMG_20180115_202036.jpg', '::1'),
(32, 'aaaaaaaaaaaaaaaaa', 'aaaaa@gmail.com', '1111-11-11', '1111111111', 'IMG_20180116_193154.jpg', '::1'),
(33, 'francisco das chagas ', 'chico@gmail.com', '1983-02-20', '63704943304', '', '::1'),
(34, 'francisco das chagas ', 'chico@gmail.com', '1983-02-20', '63704943304', '', '::1'),
(35, 'francisco das chagas ', 'chico@gmail.com', '1983-02-20', '63704943304', '', '::1'),
(36, 'pedro bial sousa de melo', 'marcelo@gmail.com', '1983-02-20', '125425487', '', '::1'),
(37, 'pedro bial sousa de melo', 'marcelo@gmail.com', '1983-02-20', '125425487', '', '::1'),
(38, 'pedro bial sousa de melo', 'marcelo@gmail.com', '1983-02-20', '125425487', '', '::1'),
(39, 'pedro bial sousa de melo', 'marcelo@gmail.com', '1983-02-20', '125425487', '', '::1'),
(40, 'pedro bial sousa de melo', 'marcelo@gmail.com', '1983-02-20', '125425487', '', '::1'),
(41, 'pedro bial sousa de melo', 'marcelo@gmail.com', '1983-02-20', '125425487', '', '::1'),
(42, 'pedro bial sousa de melo', 'marcelo@gmail.com', '1983-02-20', '125425487', '', '::1'),
(43, 'joaninha', 'joana@gmail.com', '1985-02-20', '1234578', '', '::1'),
(44, 'hugo almeida santos', 'undb.hugo@gmail.com', '1983-02-20', '63704943304', NULL, '::1');

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
  MODIFY `us_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `senha`
--
ALTER TABLE `senha`
  ADD CONSTRAINT `us_code` FOREIGN KEY (`usuario_us_code`) REFERENCES `usuario` (`us_code`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
