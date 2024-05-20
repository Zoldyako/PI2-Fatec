-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/05/2024 às 21:09
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
-- Banco de dados: `sistema_pi`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `termosdownload`
--

CREATE TABLE `termosdownload` (
  `tipo` varchar(40) NOT NULL,
  `caminho` varchar(100) NOT NULL,
  `siglacurso` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `termosdownload`
--

INSERT INTO `termosdownload` (`tipo`, `caminho`, `siglacurso`) VALUES
('Obrigatório Remunerado', '\'../documentos/Termo de compromisso O-R e plano de atividades.docx\'', ''),
('Obrigatório Não Remunerado', '\'../documentos/Termo de compromisso O-NR e plano de atividades.docx\'', ''),
('Não Obrigatório Remunerado', '\'../documentos/Termo de compromisso NO-R e plano de atividades.docx\'', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
