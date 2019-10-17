-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 10/04/2019 às 15:37
-- Versão do servidor: 10.1.37-MariaDB
-- Versão do PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `blog`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `posts`
--

CREATE TABLE `posts` (
  `cdpost` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` text NOT NULL,
  `textonoticia` text NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `posicao` varchar(5) NOT NULL DEFAULT 'right',
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `posts`
--

INSERT INTO `posts` (`cdpost`, `titulo`, `subtitulo`, `textonoticia`, `imagem`, `posicao`, `data`) VALUES
(1, 'Titulo 1', 'Subtitulo 1', 'TEXTO 1', 'cidade.jpg', 'right', '2019-04-10'),
(2, 'Titulo 2', 'Subtitulo 2', 'TEXTO 2', 'taxi.jpg', 'right', '2019-04-11'),
(3, 'Titulo 3', 'Subtitulo 3', 'TEXTO 3', 'cidade.jpg', 'right', '2019-04-12'),
(4, 'Titulo 4', 'Subtitulo 4', 'TEXTO 4', 'taxi.jpg', 'right', '2019-04-13'),
(5, 'Titulo 5', 'Subtitulo 5', 'TEXTO 5', 'cidade.jpg', 'right', '2019-04-14'),
(6, 'Titulo 6', 'Subtitulo 6', 'TEXTO 6', 'taxi.jpg', 'right', '2019-04-15'),
(7, 'Titulo 7', 'Subtitulo 7', 'TEXTO 7', 'cidade.jpg', 'right', '2019-04-16'),
(8, 'Titulo 8', 'Subtitulo 8', 'TEXTO 8', 'taxi.jpg', 'right', '2019-04-17'),
(9, 'Titulo 9', 'Subtitulo 9', 'TEXTO 9', 'cidade.jpg', 'right', '2019-04-18'),
(10, 'Titulo 10', 'Subtitulo 10', 'TEXTO 10', 'taxi.jpg', 'right', '2019-04-19'),
(11, 'Titulo 11', 'Subtitulo 11', 'TEXTO 11', 'cidade.jpg', 'right', '2019-04-20'),
(12, 'Titulo 12', 'Subtitulo 12', 'TEXTO 12', 'taxi.jpg', 'right', '2019-04-21');
--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`cdpost`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `cdpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
