-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Jan-2019 às 13:43
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mei`
CREATE DATABASE IF NOT EXISTS `mei` DEFAULT CHARACTER SET utf8 ;
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nomeEmpresa` varchar(500) NOT NULL,
  `nomeResponsavel` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `senha` varchar(500) NOT NULL,
  `estado` varchar(500) NOT NULL,
  `CNPJ` varchar(500) NOT NULL,
  `CNAE` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nomeEmpresa`, `nomeResponsavel`, `email`, `senha`, `estado`, `CNPJ`, `CNAE`) VALUES
(1, 'Admin', 'Claudio', 'admin@mail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Bahia', 'nemsei', 'tbmnao');


-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `assunto` varchar(500) NOT NULL,
  `titulo` varchar(500) NOT NULL,
  `imagem` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`id`, `assunto`, `titulo`,`imagem`) VALUES
(1, 'seu dinheiro', 'site mostra as melhores consultoras do ano', 'http://www.auctus.com.br/wp-content/uploads/2016/09/o-que-e-consultoria.jpg'),
(2, 'seu dinheiro', 'site mostra as melhores consultoras do ano', 'http://www.auctus.com.br/wp-content/uploads/2016/09/o-que-e-consultoria.jpg'),
(3, 'seu dinheiro', 'site mostra as melhores consultoras do ano', 'http://www.auctus.com.br/wp-content/uploads/2016/09/o-que-e-consultoria.jpg'),
(4, 'seu dinheiro', 'site mostra as melhores consultoras do ano', 'http://www.auctus.com.br/wp-content/uploads/2016/09/o-que-e-consultoria.jpg'),
(5, 'seu dinheiro', 'site mostra as melhores consultoras do ano', 'http://www.auctus.com.br/wp-content/uploads/2016/09/o-que-e-consultoria.jpg'),
(6, 'seu dinheiro', 'site mostra as melhores consultoras do ano', 'http://www.auctus.com.br/wp-content/uploads/2016/09/o-que-e-consultoria.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
