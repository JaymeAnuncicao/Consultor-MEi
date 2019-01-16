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
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nomeEmpresa` varchar(100) NOT NULL,
  `nomeResponsavel` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `CNPJ` varchar(100) NOT NULL,
  `CNAE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nomeEmpresa`, `nomeResponsavel`, `email`, `senha`, `estado`, `CNPJ`, `CNAE`) VALUES
(1, 'Praxisjr', 'Jayme', 'jayme.anunciacao@praxisjr.com.br', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Bahia', 'nemsei', 'tbmnao'),
(2, 'Engtop', 'Alvin', 'alvin@eosesquilos.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Bahia', 'nemsei', 'tbmnao'),
(3, 'Admin', 'RoliÃ§Ã£o', 'admin@mail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Bahia', 'nemsei', 'tbmnao'),
(4, 'SantaMonica', 'Kratos', 'deus@guerra.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Bahia', 'nemsei', 'tbmnao'),
(5, 'Alanzoka', 'Alan', 'alan@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Bahia', 'nemsei', 'tbmnao'),
(6, 'Saint', 'Saori', 'saint@seiya.com', '1e8907751e7095aa152ab8d1109b786d7a0afd23', 'Bahia', 'nemsei', 'tbmnao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `assunto` varchar(100) NOT NULL,
  `titulo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`id`, `assunto`, `titulo`) VALUES
(1, 'seu dinheiro', 'aaaaadv3w ernrerqbrv'),
(2, 'mudanca', 'testando'),
(3, 'seu dinheiro', 'aaaaaaaaaaaaaaaaaaaa'),
(4, 'esse vai ser meu maior triunfo', 'eu disse muhuahuahah');

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
