-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/05/2023 às 17:32
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
-- Banco de dados: `formulario_felipe`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluguel`
--

CREATE TABLE `aluguel` (
  `id` int(11) NOT NULL,
  `livro` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `data_aluguel` date NOT NULL,
  `previsao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `aluguel`
--

INSERT INTO `aluguel` (`id`, `livro`, `usuario`, `data_aluguel`, `previsao`) VALUES
(8, 'O PRÍNCIPE', 'João Felipe', '2023-05-09', '2023-06-09'),
(11, 'O HOMEM MAIS RICO DA BABILÔNIA', 'João Felipe', '2023-05-09', '2023-06-09'),
(12, 'A LENDA DO CAVALEIRO SEM CABEÇA', 'João Felipe', '2023-05-09', '2023-06-09');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `id` int(11) NOT NULL,
  `email` varchar(110) NOT NULL,
  `senha` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `cadastro`
--

INSERT INTO `cadastro` (`id`, `email`, `senha`) VALUES
(1, 'gustavo@gmail.com', '123456'),
(2, 'adas@ads', '45678'),
(3, 'felipessena02@gmail.com', 'felisA02'),
(4, 'felipessena02@gmail.com', 'felisA02'),
(5, 'felipessena02@gmail.com', 'felisA02'),
(6, 'francilda@gmail.com', 'Adidas'),
(7, 'admin@gmail.com', 'password');

-- --------------------------------------------------------

--
-- Estrutura para tabela `editora`
--

CREATE TABLE `editora` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(110) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `editora`
--

INSERT INTO `editora` (`id`, `nome`, `email`, `telefone`, `cidade`) VALUES
(3, 'INTRÍNSECA', 'contato@intrinseca.com.br', '55 21 3206-7400', 'RIO DE JANEIRO - RJ'),
(4, 'NOVA FRONTEIRA', 'contato.novafronteira@ediouro.com.br', '(21) 3882-8203', 'RIO DE JANEIRO - RJ'),
(5, 'ALEPH', 'marketing@editoraaleph.com.br', '(11) 3743-3202', 'SÃO PAULO - SP'),
(6, 'VIDA MELHOR', 'fiscal@harpercollins.com.br', '(21) 3175 1039', 'RIO DE JANEIRO - RJ'),
(7, 'ATUAL', 'saceditorasaraiva@somoseducacao.com.br', '(11) 4003 3061', 'SÃO PAULO - SP'),
(8, 'NOVO SÉCULO', 'faleconosco@gruponovoseculo.com.br', '(11) 95382 0177', 'SÃO PAULO - SP'),
(9, 'PANINI', 'panini@gmail.com', '(11) 3512-9444', 'SÃO PAULO - SP'),
(10, 'SEXTANTE', 'atendimento@sextante.com.br', '(21) 2538-4100', 'RIO DE JANEIRO - RJ'),
(11, 'SOPHOS', 'vendas@editorasophos.com.br', '(48) 3222-8826', 'FLORIANÓPOLIS - SC'),
(12, 'L&PM', 'contato@lpm.com.br', '51 3225 5777', 'Porto Alegre - RS'),
(13, 'LEYA', 'sacbrasil@leya.com.br', '(11) 3129-8737', 'SÃO PAULO - SP'),
(14, 'HARPER COLLINS', 'faleconosco@harpercollins.com.br', '(21) 3175-1030', 'Rio de Janeiro - RJ');

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro`
--

CREATE TABLE `livro` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `autor` varchar(45) NOT NULL,
  `editora` varchar(45) NOT NULL,
  `data_lanc` date NOT NULL,
  `estoque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `livro`
--

INSERT INTO `livro` (`id`, `nome`, `autor`, `editora`, `data_lanc`, `estoque`) VALUES
(4, 'VINGADORES - TODOS QUEREM DOMINAR O MUNDO', 'DAN ABNETT', 'NOVO SÉCULO ', '2015-05-16', 5),
(5, 'O ENIGMA DA CASA DE VIDRO', 'GANYMÉDES JOSÉ', 'ATUAL', '2001-01-01', 2),
(6, 'BIBLIA SAGRADA NOVA VERSÃO INTERNACIONAL', 'THOMAS NELSON', 'VIDA MELHOR', '2020-03-20', 3),
(7, 'NEUROMANCER', 'WILLIAM GIBSON', 'ALEPH', '2016-08-19', 3),
(8, 'O PRÍNCIPE - CLASSICOS PARA TODOS', 'NICOLAU MAQUIAVEL', 'NOVA FRONTEIRA', '2022-09-20', 1),
(9, 'MITOLOGIA NÓRDICA', 'NEIL GAIMAN', 'INTRÍNSECA', '2017-02-24', 4),
(10, 'THE WALKING DEAD - VOLUME 1', 'ROBERT KIRKMAN', 'PANINI', '2017-12-06', 3),
(11, 'O MONGE E O EXECUTIVO', 'JAMES C.HUNTER', 'SEXTANTE', '2023-05-09', 3),
(12, 'IRMÃOS DE SANGUE', 'FRANCISCO MIBIELLI', 'SOPHOS', '2005-01-01', 1),
(13, 'O ALIENISTA', 'MACHADO DE ASSIS', 'L&PM', '2016-01-28', 1),
(14, 'A LENDA DO CAVALEIRO SEM CABEÇA', 'WASHINGTON IRVING', 'LEYA', '2011-08-11', 1),
(15, 'O HOMEM MAIS RICO DA BABILÔNIA', 'GEORGE S. CLASON', 'HARPER COLLINS', '2017-08-04', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(110) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `endereco` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `cidade`, `endereco`) VALUES
(2, 'João Felipe Marques Sena', 'felipessena02@gmail.com', 'Fortaleza', 'Rua Senador Álvaro Adolfo - 1485'),
(9, 'Francilda Maria Marques', 'francildasena@hotmail.com', 'Fortaleza', 'Rua Senador Alvaro Adolfo 1485');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aluguel`
--
ALTER TABLE `aluguel`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluguel`
--
ALTER TABLE `aluguel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `editora`
--
ALTER TABLE `editora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
