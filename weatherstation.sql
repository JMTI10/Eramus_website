-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Out-2019 às 12:17
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.9


 -- File:   whearherstation.sql
 -- Author: Iuri Gonçalves
 -- Date:   2018

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `weatherstation`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `locations`
--

CREATE TABLE `locations` (
  `id_location` int(11) NOT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `name_country` varchar(50) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `locations`
--

INSERT INTO `locations` (`id_location`, `latitude`, `longitude`, `name_country`, `location`) VALUES
(2, 50, 19, 'olaaaa', 'ola'),
(3, 52.3702, 4.89517, 'holanda', 'Amsterdam'),
(10, NULL, NULL, 'France', 'Paris'),
(11, 13.56, 15.67, 'UK', 'London'),
(12, 321.213, 12321.2, 'UK', 'London'),
(13, 321.213, 32131.3, 'uk', 'London');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sensors`
--

CREATE TABLE `sensors` (
  `id_sensor` int(11) NOT NULL,
  `sensor_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sensor_reference` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sensors_readings`
--

CREATE TABLE `sensors_readings` (
  `id_sensor` int(11) DEFAULT NULL,
  `id_location` int(11) DEFAULT NULL,
  `reading_date` date DEFAULT NULL,
  `reading_hour` time DEFAULT NULL,
  `value` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_location` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id_location`);

--
-- Índices para tabela `sensors`
--
ALTER TABLE `sensors`
  ADD PRIMARY KEY (`id_sensor`);

--
-- Índices para tabela `sensors_readings`
--
ALTER TABLE `sensors_readings`
  ADD KEY `id_sensor` (`id_sensor`),
  ADD KEY `id_location` (`id_location`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_password` (`user_password`),
  ADD KEY `id_location` (`id_location`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `locations`
--
ALTER TABLE `locations`
  MODIFY `id_location` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `sensors`
--
ALTER TABLE `sensors`
  MODIFY `id_sensor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `sensors_readings`
--
ALTER TABLE `sensors_readings`
  ADD CONSTRAINT `sensors_readings_ibfk_1` FOREIGN KEY (`id_sensor`) REFERENCES `sensors` (`id_sensor`),
  ADD CONSTRAINT `sensors_readings_ibfk_2` FOREIGN KEY (`id_location`) REFERENCES `locations` (`id_location`);

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_location`) REFERENCES `locations` (`id_location`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
