-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 26/08/2018 às 13:19
-- Versão do servidor: 5.7.23-0ubuntu0.18.04.1
-- Versão do PHP: 7.2.9-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sao_domingos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `senha`
--

CREATE TABLE `senha` (
  `usuario_us_code` int(11) NOT NULL,
  `us_senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `senha`
--

INSERT INTO `senha` (`usuario_us_code`, `us_senha`) VALUES
(4, '202cb962ac59075b964b07152d234b70'),
(5, '00b5b92a8c34fc9366d76abeffbdc0a0'),
(6, '202cb962ac59075b964b07152d234b70'),
(7, '202cb962ac59075b964b07152d234b70'),
(8, '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
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
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`us_code`, `us_nome`, `us_email`, `us_data_nasc`, `us_cpf`, `us_foto`, `us_ip`) VALUES
(4, 'sandramelo', 'sandra@gmail.com', '1983-02-20', '63548758475', '../assets/imagens/upload/_4349__4622_homem2.png', '127.0.0.1'),
(5, 'hugo leonardo ramos almeida2', 'hugo.undb@gmail.com', '1983-02-20', '63704943304', '../assets/imagens/upload/_6415_inscricao.png', '127.0.0.1'),
(6, 'clara', 'clara@gmail.com', '1983-02-20', '63704943304', '../assets/imagens/upload/_9535__5580_mulher2.png', '127.0.0.1'),
(7, 'emanuela santos', 'manu@gmail.com', '1985-05-14', '63745414545', '../assets/imagens/upload/_5799__5625_mulher1.png', '127.0.0.1'),
(8, 'jose maria', 'jose@hotmail.com', '1962-03-25', '65848744545', '../assets/imagens/upload/_9995__5869_himem1.png', '127.0.0.1');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `senha`
--
ALTER TABLE `senha`
  ADD PRIMARY KEY (`usuario_us_code`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`us_code`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `us_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `senha`
--
ALTER TABLE `senha`
  ADD CONSTRAINT `us_code` FOREIGN KEY (`usuario_us_code`) REFERENCES `usuario` (`us_code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
