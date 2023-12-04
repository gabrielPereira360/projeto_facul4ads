-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/12/2023 às 00:13
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `test`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `registro`
--

CREATE TABLE `registro` (
  `iduser` int(11) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `inicio_expediente` datetime NOT NULL,
  `inicio_almoco` datetime NOT NULL,
  `fim_almoco` datetime NOT NULL,
  `fim_expediente` datetime NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `registro`
--

INSERT INTO `registro` (`iduser`, `userid`, `inicio_expediente`, `inicio_almoco`, `fim_almoco`, `fim_expediente`, `descricao`) VALUES
(16, 123, '2023-12-01 23:15:56', '2023-12-01 23:15:57', '2023-12-01 23:15:57', '2023-12-01 23:16:06', '6546542654625452526735472');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) UNSIGNED NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `matricula_usuario` varchar(45) NOT NULL,
  `senha_usuario` varchar(100) NOT NULL,
  `nivel_usuario` int(11) NOT NULL,
  `cpf_usuario` varchar(20) NOT NULL,
  `nis_usuario` varchar(20) NOT NULL,
  `estado_civil_usuario` varchar(50) NOT NULL,
  `telefone_usuario` varchar(50) NOT NULL,
  `cep_usuario` varchar(50) NOT NULL,
  `endereco_usuario` varchar(255) NOT NULL,
  `cidade_usuario` varchar(255) NOT NULL,
  `estado_usuario` varchar(100) NOT NULL,
  `email_usuario` varchar(255) NOT NULL,
  `numero_usuario` varchar(50) NOT NULL,
  `data_nasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_usuario`, `matricula_usuario`, `senha_usuario`, `nivel_usuario`, `cpf_usuario`, `nis_usuario`, `estado_civil_usuario`, `telefone_usuario`, `cep_usuario`, `endereco_usuario`, `cidade_usuario`, `estado_usuario`, `email_usuario`, `numero_usuario`, `data_nasc`) VALUES
(1, 'admin', '123', '123', 1, '', '', '', '', '', '', '', '', '', '', '0000-00-00'),
(43, 'Gabriel Geraldo Martins', '2210254', '123456', 3, '14705013689', '123456789', '1', '33123456789', '36902048', 'Rua Antônio Puppin, Baixada', 'Manhuaçuzinho', 'MG', 'gabriel1234@gmail.com', '635', '2003-02-27');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`iduser`,`userid`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `registro`
--
ALTER TABLE `registro`
  MODIFY `iduser` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
