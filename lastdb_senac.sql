-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/03/2024 às 17:54
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
-- Banco de dados: `db_senac`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `idComentarios` int(11) NOT NULL,
  `comentario` varchar(150) DEFAULT NULL,
  `Usuarios_idUsuarios` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `data_comentario` timestamp NULL DEFAULT NULL,
  `Cursos_idCursos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cursos`
--

CREATE TABLE `cursos` (
  `idCursos` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `descrição` varchar(255) DEFAULT NULL,
  `Categoria` varchar(45) DEFAULT NULL,
  `Usuarios_idUsuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `cursos`
--

INSERT INTO `cursos` (`idCursos`, `nome`, `descrição`, `Categoria`, `Usuarios_idUsuarios`) VALUES
(11, 'Técnico em adm', '1800 horas -\r\nteorias administrativas\r\npráticas com documentação em sistemas de gerenciamento', 'adm', 33);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `logradouro` varchar(45) DEFAULT NULL,
  `uf` varchar(45) DEFAULT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `imagem` longblob DEFAULT NULL,
  `tipo_usuario` int(11) DEFAULT NULL,
  `sobre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `nome`, `senha`, `cpf`, `telefone`, `email`, `data_nascimento`, `cidade`, `bairro`, `complemento`, `numero`, `logradouro`, `uf`, `cep`, `imagem`, `tipo_usuario`, `sobre`) VALUES
(33, 'Claudio', '$2y$10$x3Pn/2r2QILsHrPBH6GqLOu5gZKxNCqreuU/o9O8N2hsNd7MXgHiS', '567.234.434-56', '55(61) 9249-3424', 'claudioprof@gmail.com', '1985-11-22', 'Rio de Janeiro', 'Ipanema', NULL, NULL, NULL, NULL, NULL, 0x2e2e2f696d672f616c756e6f73696d672f3838332e2e6a7067, 1, NULL),
(34, 'Matheus', '$2y$10$eryavrzVps71k6gz3qdj/.V1t2a4fQI9dqY5dzSFH7h.vDpKOkqEq', '07978842118', '40028922', 'matheus159457@gmail.com', '2002-12-13', 'SF', 'SDF', 'SDF', 'SFD', 'sdfwsesf', 'SDF', '72650265', NULL, 0, NULL),
(35, 'Admin', '$2y$10$rnG5psSYqtbPNFIpCbVHle2fxql4K.XWtorv9vo1ZMqA0mbrlKr/.', NULL, NULL, 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `video`
--

CREATE TABLE `video` (
  `idvideo` int(11) NOT NULL,
  `link` varchar(400) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descrição` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `duracao` varchar(45) DEFAULT NULL,
  `thumb` longblob DEFAULT NULL,
  `Cursos_idCursos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `video`
--

INSERT INTO `video` (`idvideo`, `link`, `titulo`, `descrição`, `duracao`, `thumb`, `Cursos_idCursos`) VALUES
(10, 'https://www.youtube.com/embed/xwoQzO0NcsU?si=OL85KT3-07Q1zVcj', 'Aula 01 - Nivelamento Tecnologico - Excel ', '', '0h 51m 21s', 0x2e2e2f696d672f7468756d622f61756c6120312e77656270, 11),
(11, 'https://www.youtube.com/embed/hpayJq30ax4?si=cNAfZflSi3rcnb2i', 'Função SE com várias condições - Excel', 'Entenda a função SE no Excel com exemplos práticos de 2 , 3 e 4 condições distintas. Gostaria de aprender Excel?  Então assista os vídeos do canal, pretendemos postar um vídeo novo por semana! Fique ligado!', '0h 29m 33s', 0x2e2e2f696d672f7468756d622f61756c6120322e77656270, 11);

-- --------------------------------------------------------

--
-- Estrutura para tabela `visualizacao`
--

CREATE TABLE `visualizacao` (
  `idvisualizacao` int(11) NOT NULL,
  `assistido` tinyint(1) DEFAULT NULL,
  `data_assistido` date DEFAULT NULL,
  `video_idvideo` int(11) NOT NULL,
  `video_Cursos_idCursos` int(11) NOT NULL,
  `usuarios_idUsuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idComentarios`,`Cursos_idCursos`),
  ADD KEY `fk_Comentarios_Usuarios1_idx` (`Usuarios_idUsuarios`),
  ADD KEY `fk_Comentarios_Cursos1_idx` (`Cursos_idCursos`);

--
-- Índices de tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`idCursos`),
  ADD KEY `fk_Cursos_Usuarios1_idx` (`Usuarios_idUsuarios`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`);

--
-- Índices de tabela `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`idvideo`,`Cursos_idCursos`),
  ADD KEY `fk_video_Cursos1_idx` (`Cursos_idCursos`);

--
-- Índices de tabela `visualizacao`
--
ALTER TABLE `visualizacao`
  ADD PRIMARY KEY (`idvisualizacao`,`video_idvideo`,`video_Cursos_idCursos`,`usuarios_idUsuarios`),
  ADD KEY `fk_visualizacao_video1_idx` (`video_idvideo`,`video_Cursos_idCursos`),
  ADD KEY `fk_visualizacao_usuarios1_idx` (`usuarios_idUsuarios`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idComentarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `idCursos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `video`
--
ALTER TABLE `video`
  MODIFY `idvideo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `visualizacao`
--
ALTER TABLE `visualizacao`
  MODIFY `idvisualizacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_Comentarios_Cursos1` FOREIGN KEY (`Cursos_idCursos`) REFERENCES `cursos` (`idCursos`),
  ADD CONSTRAINT `fk_Comentarios_Usuarios1` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `usuarios` (`idUsuarios`);

--
-- Restrições para tabelas `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `fk_Cursos_Usuarios1` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `usuarios` (`idUsuarios`);

--
-- Restrições para tabelas `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `fk_video_Cursos1` FOREIGN KEY (`Cursos_idCursos`) REFERENCES `cursos` (`idCursos`);

--
-- Restrições para tabelas `visualizacao`
--
ALTER TABLE `visualizacao`
  ADD CONSTRAINT `fk_visualizacao_usuarios1` FOREIGN KEY (`usuarios_idUsuarios`) REFERENCES `usuarios` (`idUsuarios`),
  ADD CONSTRAINT `fk_visualizacao_video1` FOREIGN KEY (`video_idvideo`,`video_Cursos_idCursos`) REFERENCES `video` (`idvideo`, `Cursos_idCursos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
