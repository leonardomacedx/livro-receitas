-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/07/2024 às 21:38
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `livroreceitas`

create database livroreceitas;

use livroreceitas;
--

-- --------------------------------------------------------
-- Estrutura para tabela `cargos`

create table usuarios(
                         id_usuario int AUTO_INCREMENT PRIMARY KEY,
                         nome varchar(30),
                         telefone varchar(30),
                         email varchar(40),
                         senha varchar(32)
);

--
-- Estrutura para tabela `receitas`
--

CREATE TABLE `receitas` (
  `id` int(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `receita` varchar(255) NOT NULL,
  `ingredientes` varchar(255) NOT NULL,
  `preparo` varchar(255) NOT NULL,
  `tipo` int(45) UNSIGNED NOT NULL ,
  FOREIGN KEY (tipo) REFERENCES categoria(id),
  `dificuldade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Estrutura para tabela `livro_receitas`

CREATE TABLE `livro_receitas` (
                            `id` int(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
                            `nome` varchar(45) NOT NULL);

-- --------------------------------------------------------
--
-- Despejando dados para a tabela `receitas`
--

INSERT INTO `receitas` (`id`, `nome`, `receita`, `ingredientes`, `preparo`, `tipo`, `dificuldade`) VALUES
(30, 'adsasdadas', 'adsasdadsdas', 'sdaasdsaadsad', 'dasasdasdsdaads', '1', 'Médio'),
(31, 'Cozinheiros', 'feijoada', 'preparo', 'soco', '1', 'Fácil');

-- --------------------------------------------------------
-- Associação entre livro e receitas

CREATE TABLE `livro_receitas_receitas` (
                                           `id_livro` int(10) UNSIGNED NOT NULL,
                                           `id_receita` int(10) UNSIGNED NOT NULL,
                                           PRIMARY KEY (`id_livro`, `id_receita`),
                                           FOREIGN KEY (`id_livro`) REFERENCES `livro_receitas`(`id`),
                                           FOREIGN KEY (`id_receita`) REFERENCES `receitas`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(45) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `tipo` varchar(255) NOT NULL,
  `dificuldade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id`, `tipo`, `dificuldade`) VALUES
(1, 'Japonesa', 'Difícil'),
(2, 'Americana', 'Difícil'),
(3, 'Europeia', 'Médio'),
(4, 'ATLANTICA', 'Difícil'),
(5, 'asdsadds', 'Médio');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `data_admissao` date NOT NULL,
  `salario` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `metas` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `cpf`, `data_admissao`, `salario`, `cargo`, `metas`) VALUES
(9, 'Matheuss', '083.022.411-48', '2002-06-12', '1.000', '1', '2/9'),
(13, 'Matheuss', '083.022.411-48', '2002-06-12', '1000', '4', '2/9');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ingredientes`
--

CREATE TABLE `ingredientes` (
  `id` int(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ingredientes`
--

INSERT INTO `ingredientes` (`id`, `nome`) VALUES
(10, 'Matheuss'),
(11, 'Cozinheiros');

-- --------------------------------------------------------

--
-- Estrutura para tabela `nivel`
--

CREATE TABLE `nivel` (
  `id` int(45) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `dificuldade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `restaurante`
--

CREATE TABLE `restaurante` (
  `id` int(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `contato` varchar(255) NOT NULL,
  `numero` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `restaurante`
--

INSERT INTO `restaurante` (`id`, `nome`, `tipo`, `contato`, `numero`) VALUES
(4, 'teste', 'Americana', 'Rogerio Lopes', '61983336966'),
(5, 'Matheuss', 'dasasdadssd', 'dasadsadsdasdsads', '46546546546');

-- --------------------------------------------------------

--
-- Estrutura para tabela `trabalho`
--

CREATE TABLE `trabalho` (
  `id` int(45) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `cargo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `trabalho`
--

INSERT INTO `trabalho` (`id`, `cargo`) VALUES
(1, 'Cozinheiro'),
(2, 'Cozinheiro'),
(3, 'adssdadsadas'),
(4, 'teste'),
(5, 'puta+');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
