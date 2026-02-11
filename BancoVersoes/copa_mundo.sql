-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/02/2026 às 12:11
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
-- Banco de dados: `copa_mundo`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL,
  `nome` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `jogos`
--

CREATE TABLE `jogos` (
  `id` int(11) NOT NULL,
  `selecao_mandante_id` int(11) NOT NULL,
  `selecao_visitante_id` int(11) NOT NULL,
  `data_hora` datetime NOT NULL,
  `estadio` varchar(100) NOT NULL,
  `fase` varchar(50) NOT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `gols_mandante` int(11) DEFAULT NULL,
  `gols_visitante` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Acionadores `jogos`
--
DELIMITER $$
CREATE TRIGGER `atualizar_classificacao` AFTER UPDATE ON `jogos` FOR EACH ROW BEGIN
    IF NEW.gols_mandante IS NOT NULL AND NEW.gols_visitante IS NOT NULL THEN

        -- ATUALIZA MANDANTE
        UPDATE selecoes
        SET 
            jogos = jogos + 1,
            gols_marcados = gols_marcados + NEW.gols_mandante,
            gols_sofridos = gols_sofridos + NEW.gols_visitante,
            saldo_gols = saldo_gols + (NEW.gols_mandante - NEW.gols_visitante),
            vitorias = vitorias + IF(NEW.gols_mandante > NEW.gols_visitante,1,0),
            empates = empates + IF(NEW.gols_mandante = NEW.gols_visitante,1,0),
            derrotas = derrotas + IF(NEW.gols_mandante < NEW.gols_visitante,1,0),
            pontos = pontos + 
                CASE 
                    WHEN NEW.gols_mandante > NEW.gols_visitante THEN 3
                    WHEN NEW.gols_mandante = NEW.gols_visitante THEN 1
                    ELSE 0
                END
        WHERE id = NEW.selecao_mandante_id;

        -- ATUALIZA VISITANTE
        UPDATE selecoes
        SET 
            jogos = jogos + 1,
            gols_marcados = gols_marcados + NEW.gols_visitante,
            gols_sofridos = gols_sofridos + NEW.gols_mandante,
            saldo_gols = saldo_gols + (NEW.gols_visitante - NEW.gols_mandante),
            vitorias = vitorias + IF(NEW.gols_visitante > NEW.gols_mandante,1,0),
            empates = empates + IF(NEW.gols_visitante = NEW.gols_mandante,1,0),
            derrotas = derrotas + IF(NEW.gols_visitante < NEW.gols_mandante,1,0),
            pontos = pontos + 
                CASE 
                    WHEN NEW.gols_visitante > NEW.gols_mandante THEN 3
                    WHEN NEW.gols_visitante = NEW.gols_mandante THEN 1
                    ELSE 0
                END
        WHERE id = NEW.selecao_visitante_id;

    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `selecoes`
--

CREATE TABLE `selecoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `continente` varchar(50) NOT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `jogos` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `idade` int(11) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `selecao_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Índices de tabela `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `selecao_mandante_id` (`selecao_mandante_id`),
  ADD KEY `selecao_visitante_id` (`selecao_visitante_id`),
  ADD KEY `grupo_id` (`grupo_id`);

--
-- Índices de tabela `selecoes`
--
ALTER TABLE `selecoes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`),
  ADD KEY `grupo_id` (`grupo_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `selecao_id` (`selecao_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `jogos`
--
ALTER TABLE `jogos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `selecoes`
--
ALTER TABLE `selecoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `jogos`
--
ALTER TABLE `jogos`
  ADD CONSTRAINT `jogos_ibfk_1` FOREIGN KEY (`selecao_mandante_id`) REFERENCES `selecoes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jogos_ibfk_2` FOREIGN KEY (`selecao_visitante_id`) REFERENCES `selecoes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jogos_ibfk_3` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id`) ON DELETE SET NULL;

--
-- Restrições para tabelas `selecoes`
--
ALTER TABLE `selecoes`
  ADD CONSTRAINT `selecoes_ibfk_1` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para tabelas `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`selecao_id`) REFERENCES `selecoes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
