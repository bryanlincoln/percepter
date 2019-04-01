-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 01/04/2019 às 17:59
-- Versão do servidor: 5.6.39-83.1
-- Versão do PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `yadahrob_perc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `ratings`
--

CREATE TABLE `ratings` (
  `id` int(255) NOT NULL,
  `id_from` int(11) NOT NULL,
  `ig_id` int(11) NOT NULL,
  `beauty` int(4) DEFAULT NULL,
  `sexappeal` int(4) DEFAULT NULL,
  `reliance` int(4) DEFAULT NULL,
  `intelligence` int(4) DEFAULT NULL,
  `interesting` int(4) DEFAULT NULL,
  `authentic` int(4) DEFAULT NULL,
  `informative` int(4) DEFAULT NULL,
  `expensive` int(4) DEFAULT NULL,
  `comments` varchar(200) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `ratings`
--

INSERT INTO `ratings` (`id`, `id_from`, `ig_id`, `beauty`, `sexappeal`, `reliance`, `intelligence`, `interesting`, `authentic`, `informative`, `expensive`, `comments`, `date_created`) VALUES
(1, 1487625138, 18451623, 7, 6, 10, 10, NULL, NULL, NULL, NULL, '', '2019-01-11 16:24:40'),
(2, 1487625138, 1481494143, 5, 5, 10, 10, NULL, NULL, NULL, NULL, '', '2019-01-11 19:09:52'),
(3, 18451623, 1487625138, NULL, NULL, NULL, NULL, 5, 5, 5, 5, '', '2019-01-11 19:30:43'),
(4, 18451623, 1481494143, 10, 10, 10, 10, NULL, NULL, NULL, NULL, 'Aí sim em', '2019-01-11 19:30:57'),
(5, 1487625138, 18451623, 0, 10, 10, 10, NULL, NULL, NULL, NULL, '', '2019-02-07 17:48:23'),
(6, 1487625138, 1481494143, 0, 0, 10, 10, NULL, NULL, NULL, NULL, 'Teste', '2019-02-07 17:48:38'),
(7, 1481494143, 1487625138, NULL, NULL, NULL, NULL, 9, 5, 2, 1, '', '2019-02-08 13:44:33'),
(8, 1481494143, 18451623, 1, 2, 8, 3, NULL, NULL, NULL, NULL, '', '2019-02-08 13:44:42'),
(9, 1487625138, 1481494143, 5, 5, 5, 5, NULL, NULL, NULL, NULL, '', '2019-02-08 13:46:54'),
(10, 1487625138, 18451623, 5, 5, 5, 5, NULL, NULL, NULL, NULL, '', '2019-02-08 13:46:58'),
(11, 1481494143, 1487625138, NULL, NULL, NULL, NULL, 9, 9, 8, 9, '', '2019-02-12 11:43:45'),
(12, 1481494143, 18451623, 9, 9, 9, 9, NULL, NULL, NULL, NULL, '', '2019-02-12 11:43:51'),
(13, 18451623, 1487625138, NULL, NULL, NULL, NULL, 1, 9, 9, 3, '', '2019-02-12 13:16:16'),
(14, 18451623, 1481494143, 9, 9, 2, 8, NULL, NULL, NULL, NULL, '', '2019-02-12 13:16:30'),
(15, 18451623, 1487625138, NULL, NULL, NULL, NULL, 9, 1, 8, 2, 'Chtsg', '2019-02-13 18:02:11'),
(16, 18451623, 1481494143, 9, 2, 9, 9, NULL, NULL, NULL, NULL, '', '2019-02-13 18:02:26'),
(17, 18451623, 1487625138, NULL, NULL, NULL, NULL, 10, 9, 8, 6, '', '2019-02-20 22:56:58'),
(18, 18451623, 1481494143, 6, 5, 5, 5, NULL, NULL, NULL, NULL, '', '2019-02-20 22:57:07'),
(19, 18451623, 1487625138, NULL, NULL, NULL, NULL, 9, 8, 8, 8, '', '2019-03-16 17:31:32'),
(20, 18451623, 1481494143, 8, 8, 8, 8, NULL, NULL, NULL, NULL, '', '2019-03-16 17:31:39'),
(21, 18451623, 1487625138, NULL, NULL, NULL, NULL, 3, 7, 7, 3, 'NOssa que top', '2019-03-19 13:37:14'),
(22, 18451623, 1481494143, 0, 10, 1, 8, NULL, NULL, NULL, NULL, 'oloco', '2019-03-19 13:37:24'),
(23, 1481494143, 18451623, 5, 5, 5, 5, NULL, NULL, NULL, NULL, '', '2019-03-19 13:43:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `ig_id` int(11) NOT NULL DEFAULT '0',
  `ig_token` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('social','business') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'social',
  `premium_until` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`ig_id`, `ig_token`, `type`, `premium_until`, `date_created`) VALUES
(18451623, '18451623.256c170.e1f0a7837d4a41fab82e2e8ffafcdd3e', 'social', '2019-02-13 19:02:49', '2019-01-08 17:52:12'),
(1481494143, '1481494143.256c170.d3155c89c7e54d099a70a881f45dcf5a', 'social', '2019-03-19 14:41:09', '2019-01-09 16:49:57'),
(1487625138, '1487625138.256c170.a0e40d1e185243bb81c1a724e13ff2dc', 'business', '2019-03-19 14:38:14', '2019-01-09 21:28:16');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ig_id`),
  ADD UNIQUE KEY `ig_token` (`ig_token`),
  ADD UNIQUE KEY `ig_id` (`ig_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
