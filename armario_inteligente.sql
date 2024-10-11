-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/10/2024 às 02:41
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `armario_inteligente`
--
CREATE DATABASE IF NOT EXISTS `armario_inteligente` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `armario_inteligente`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_categoria`
--
-- Criação: 10/10/2024 às 23:18
--

DROP TABLE IF EXISTS `tbl_categoria`;
CREATE TABLE IF NOT EXISTS `tbl_categoria` (
  `cat_codigo` smallint(6) NOT NULL AUTO_INCREMENT,
  `cat_nome` varchar(60) NOT NULL,
  PRIMARY KEY (`cat_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONAMENTOS PARA TABELAS `tbl_categoria`:
--

--
-- Despejando dados para a tabela `tbl_categoria`
--

INSERT INTO `tbl_categoria` (`cat_codigo`, `cat_nome`) VALUES
(1, 'chapeus'),
(2, 'joias'),
(3, 'oculos'),
(4, 'saia'),
(5, 'calça'),
(6, 'bermuda'),
(7, 'camisa'),
(8, 'blusa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_produto`
--
-- Criação: 10/10/2024 às 23:18
--

DROP TABLE IF EXISTS `tbl_produto`;
CREATE TABLE IF NOT EXISTS `tbl_produto` (
  `pro_codigo` smallint(6) NOT NULL AUTO_INCREMENT,
  `pro_nome` varchar(80) NOT NULL,
  `pro_descricao` text DEFAULT NULL,
  `pro_preco` float NOT NULL,
  `cat_codigo` smallint(6) NOT NULL,
  PRIMARY KEY (`pro_codigo`),
  KEY `cat_codigo` (`cat_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONAMENTOS PARA TABELAS `tbl_produto`:
--   `cat_codigo`
--       `tbl_categoria` -> `cat_codigo`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_usuario`
--
-- Criação: 09/10/2024 às 21:25
--

DROP TABLE IF EXISTS `tbl_usuario`;
CREATE TABLE IF NOT EXISTS `tbl_usuario` (
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONAMENTOS PARA TABELAS `tbl_usuario`:
--

--
-- Despejando dados para a tabela `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`cpf`, `nome`, `email`) VALUES
('49028403833', 'Heitor de Moura Sardinha Torres', 'heitordemourasardinhatorres@gmail.com');

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbl_produto`
--
ALTER TABLE `tbl_produto`
  ADD CONSTRAINT `tbl_produto_ibfk_1` FOREIGN KEY (`cat_codigo`) REFERENCES `tbl_categoria` (`cat_codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
