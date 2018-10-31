-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Out-2018 às 17:39
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topseries`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao_filme`
--

CREATE TABLE `avaliacao_filme` (
  `id` int(11) NOT NULL,
  `id_filme` int(11) NOT NULL,
  `avaliacao` varchar(255) NOT NULL,
  `nota` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `avaliacao_filme`
--

INSERT INTO `avaliacao_filme` (`id`, `id_filme`, `avaliacao`, `nota`) VALUES
(1, 10, 'muito bom', 10),
(2, 10, 'legal', 8),
(3, 10, 'violento', 6),
(4, 10, 'legal', 8),
(5, 10, 'bom enredo', 7),
(6, 10, 'bacana', 9),
(7, 10, 'show!', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao_livro`
--

CREATE TABLE `avaliacao_livro` (
  `id` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL,
  `avaliacao` varchar(255) NOT NULL,
  `nota` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `avaliacao_livro`
--

INSERT INTO `avaliacao_livro` (`id`, `id_livro`, `avaliacao`, `nota`) VALUES
(1, 8, 'legal', 7),
(2, 8, 'muito bom', 10),
(3, 8, 'lala', 10),
(4, 8, 'teste', 5),
(5, 8, 'wwww', 3),
(7, 9, 'Muito bom!', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao_serie`
--

CREATE TABLE `avaliacao_serie` (
  `id` int(11) NOT NULL,
  `id_serie` int(11) NOT NULL,
  `avaliacao` varchar(255) NOT NULL,
  `nota` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `avaliacao_serie`
--

INSERT INTO `avaliacao_serie` (`id`, `id_serie`, `avaliacao`, `nota`) VALUES
(1, 8, 'Excelente!', 10),
(2, 8, 'Melhor série de todos os tempos', 10),
(3, 8, 'Uma bosta', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `filme`
--

CREATE TABLE `filme` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `diretor` int(11) NOT NULL,
  `sinopse` varchar(200) DEFAULT NULL,
  `duracao` int(5) DEFAULT NULL,
  `ano` int(4) DEFAULT NULL,
  `id_genero` int(11) DEFAULT NULL,
  `ator1` int(11) DEFAULT NULL,
  `ator2` int(11) DEFAULT NULL,
  `ator3` int(11) DEFAULT NULL,
  `ator4` int(11) DEFAULT NULL,
  `wiki` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `filme`
--

INSERT INTO `filme` (`id`, `titulo`, `diretor`, `sinopse`, `duracao`, `ano`, `id_genero`, `ator1`, `ator2`, `ator3`, `ator4`, `wiki`) VALUES
(4, 'Django Livre', 18, 'No sul dos Estados Unidos, um ex-escravo Django faz uma aliança inesperada com o caçador de recompensas Schultz para caçar os criminosos mais procurados do país e resgatar sua esposa.', 165, 2013, 3, NULL, NULL, NULL, NULL, NULL),
(8, 'Gladiador', 15, 'Commodus toma o poder e se livra de Maximus, um dos generais favoritos de seu predecessor e pai, o grande Marcus Aurelius. O bravo guerreiro é forçado a se tornar gladiador e precisa lutar pela vida.', 179, 2000, 6, 35, 36, 37, 38, 'https://pt.wikipedia.org/wiki/Gladiador_(filme)'),
(9, 'O Poderoso Chefão', 28, 'A saga conta a história de uma família mafiosa que luta para estabelecer sua supremacia na América depois da Segunda Guerra.', 178, 1972, 3, NULL, NULL, NULL, NULL, NULL),
(10, 'O Poderoso Chefão 3', 28, 'Don Michel Corleone está envelhecendo e, com a ajuda do sobrinho Vicente Mancini, busca a legitimação dos interesses da família, em Nova York e na Itália, antes de sua morte.', 170, 1991, 3, 32, 31, 33, 34, 'https://pt.wikipedia.org/wiki/The_Godfather_Part_III');

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE `genero` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`id`, `descricao`) VALUES
(1, 'Romance'),
(2, 'Novela'),
(3, 'Drama'),
(4, 'Ficção Científica'),
(5, 'Suspense'),
(6, 'Ação'),
(7, 'Aventura'),
(8, 'Misterio'),
(9, 'Fantasia'),
(10, 'Autoajuda'),
(11, 'Ficção'),
(12, 'Policial'),
(13, 'Sociologia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `autor` int(11) DEFAULT NULL,
  `publicacao` int(11) DEFAULT NULL,
  `sinopse` varchar(200) DEFAULT NULL,
  `id_genero` int(11) NOT NULL,
  `personagem1` int(11) DEFAULT NULL,
  `personagem2` int(11) DEFAULT NULL,
  `personagem3` int(11) DEFAULT NULL,
  `personagem4` int(11) DEFAULT NULL,
  `wiki` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`id`, `titulo`, `autor`, `publicacao`, `sinopse`, `id_genero`, `personagem1`, `personagem2`, `personagem3`, `personagem4`, `wiki`) VALUES
(6, 'Por que Fazemos o que Fazemos?', 20, 2016, 'Por que Fazemos o que Fazemos? - Aflições vitais sobre trabalho, carreira e realização.', 10, NULL, NULL, NULL, NULL, NULL),
(9, 'Modernidade Líquida', 29, 1999, 'A modernidade imediata é \'leve\', \'líquida\', \'fluida\' e infinitamente mais dinâmica que a modernidade \'sólida\' que suplantou.', 13, NULL, NULL, NULL, NULL, NULL),
(10, 'Vida Líquida', 29, 2005, 'Este livro procura apresentar os efeitos que a estrutura social e econômica, com base no que é descartável e efêmero, gera na vida, seja no amor, nos relacionamentos e no próprio sentido da vida.', 13, 0, 0, 0, 0, 'https://pt.wikipedia.org/wiki/Zygmunt_Bauman');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`) VALUES
(1, 'Leonardo DiCaprio'),
(3, 'Jack Black'),
(6, 'Robin Williams'),
(10, 'Mel Gibson'),
(13, 'Leo Tolstoy'),
(14, 'Wachowskis'),
(15, 'Ridley Scott'),
(16, 'Frank Darabont'),
(17, 'Richard Curtis'),
(18, 'Quentin Tarantino'),
(19, 'William P. Young'),
(20, 'Mário Sergio Cortella'),
(21, 'William Golding'),
(22, 'J. K. Rowling'),
(23, 'Lemony Snicket'),
(24, 'Richard Rothstein'),
(25, 'José Padilha'),
(26, 'Robert Doherty'),
(27, 'Vince Gilligan'),
(28, 'Francis Ford Coppola'),
(29, 'Zygmunt Bauman'),
(31, 'Al Pacino'),
(32, 'Marlon Brando'),
(33, 'Diane Keaton'),
(34, 'James Caan'),
(35, 'Russell Crowe'),
(36, 'Joaquin Phoenix'),
(37, 'Connie Nielsen'),
(38, 'Oliver Reed'),
(39, 'Jonny Lee Miller'),
(40, 'Lucy Liu'),
(41, 'Jon Michael Hill'),
(42, 'Aidan Quinn');

-- --------------------------------------------------------

--
-- Estrutura da tabela `serie`
--

CREATE TABLE `serie` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `diretor` int(11) NOT NULL,
  `episodios` int(3) NOT NULL,
  `temporadas` int(1) NOT NULL,
  `sinopse` varchar(200) DEFAULT NULL,
  `id_genero` int(11) NOT NULL,
  `ator1` int(11) DEFAULT NULL,
  `ator2` int(11) DEFAULT NULL,
  `ator3` int(11) DEFAULT NULL,
  `ator4` int(11) DEFAULT NULL,
  `wiki` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `serie`
--

INSERT INTO `serie` (`id`, `titulo`, `diretor`, `episodios`, `temporadas`, `sinopse`, `id_genero`, `ator1`, `ator2`, `ator3`, `ator4`, `wiki`) VALUES
(3, 'Sense8', 14, 24, 2, '', 10, NULL, NULL, NULL, NULL, NULL),
(6, 'Narcos', 25, 30, 3, 'A série conta a história verdadeira da propagação da cocaína nos Estados Unidos e na Europa, graças à droga do Cartel de Medellín, liderado por Pablo Escobar.', 3, NULL, NULL, NULL, NULL, NULL),
(7, 'Elementary', 26, 141, 6, 'Elementary trata-se de uma adaptação de Robert Doherty para a obra de Arthur Conan Doyle, que traz os personagens Sherlock Holmes e Dr. Watson para o tempo presente vivendo em Nova Iorque.', 12, 39, 40, 41, 42, ''),
(8, 'Breaking Bad', 27, 62, 5, 'Walter White é diagnosticado com um câncer no pulmão - o que o leva a sofrer um colapso emocional e abraçar uma vida de crimes para pagar suas dívidas hospitalares e dar uma boa vida aos seus filhos.', 3, NULL, NULL, NULL, NULL, 'https://pt.wikipedia.org/wiki/Breaking_Bad');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `senha`, `email`, `nome`, `cpf`) VALUES
(1, '123', 'leo@leo.com.br', 'leo', '164.414.757-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avaliacao_filme`
--
ALTER TABLE `avaliacao_filme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avaliacao_livro`
--
ALTER TABLE `avaliacao_livro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avaliacao_serie`
--
ALTER TABLE `avaliacao_serie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filme`
--
ALTER TABLE `filme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avaliacao_filme`
--
ALTER TABLE `avaliacao_filme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `avaliacao_livro`
--
ALTER TABLE `avaliacao_livro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `avaliacao_serie`
--
ALTER TABLE `avaliacao_serie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `filme`
--
ALTER TABLE `filme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `livro`
--
ALTER TABLE `livro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `serie`
--
ALTER TABLE `serie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
