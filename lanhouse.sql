-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Jul-2020 às 11:25
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lanhouse`
--
CREATE DATABASE IF NOT EXISTS `lanhouse` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lanhouse`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `idCargo` int(11) NOT NULL,
  `nomeCargo` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`idCargo`, `nomeCargo`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `maquinas`
--

CREATE TABLE `maquinas` (
  `idMaquina` int(11) NOT NULL,
  `tipoMaquina` varchar(32) NOT NULL,
  `statusMaquina` varchar(32) NOT NULL,
  `observacao` varchar(384) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `maquinas`
--

INSERT INTO `maquinas` (`idMaquina`, `tipoMaquina`, `statusMaquina`, `observacao`) VALUES
(1, 'navegação', 'Ativo', 'Entrada de fone de ouvido não funcional.'),
(2, 'navegação', 'Ativo', NULL),
(3, 'navegação', 'Ativo', NULL),
(4, 'mídia', 'Ativo', NULL),
(5, 'mídia', 'Ativo', NULL),
(6, 'mídia', 'Ativo', NULL),
(7, 'mídia', 'Ativo', NULL),
(8, 'jogos', 'Ativo', NULL),
(9, 'jogos', 'Ativo', NULL),
(10, 'jogos', 'Ativo', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `loginUsuario` varchar(16) NOT NULL,
  `senhaUsuario` varchar(16) NOT NULL,
  `nomeCompleto` varchar(64) NOT NULL,
  `tempoSessao` time DEFAULT NULL,
  `fk_cargo` int(11) NOT NULL,
  `fk_Maquina` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `loginUsuario`, `senhaUsuario`, `nomeCompleto`, `tempoSessao`, `fk_cargo`, `fk_Maquina`) VALUES
(1, 'admin', 'adminlan', 'Laércio Marques de Mello Filho', NULL, 1, NULL),
(3, 'rafaoi27', 'senai123', 'Rafael Vasques', '06:42:45', 2, 8),
(4, 'wilson3k3k', 'senai123', 'Wilson de Souza Neto', NULL, 2, NULL),
(5, 'leandro0', 'leandro10', 'Leandro Souza Pinto', NULL, 2, NULL),
(6, 'Cliente', 'cliente123', 'Convidado', '06:18:04', 2, 10);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idCargo`);

--
-- Índices para tabela `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`idMaquina`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk-Cargo` (`fk_cargo`),
  ADD KEY `fk-Maquina` (`fk_Maquina`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `maquinas`
--
ALTER TABLE `maquinas`
  MODIFY `idMaquina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk-Cargo` FOREIGN KEY (`fk_cargo`) REFERENCES `cargo` (`idCargo`),
  ADD CONSTRAINT `fk-Maquina` FOREIGN KEY (`fk_Maquina`) REFERENCES `maquinas` (`idMaquina`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
