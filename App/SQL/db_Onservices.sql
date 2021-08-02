-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Jun-2018 às 22:29
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_onservices`
--
CREATE DATABASE IF NOT EXISTS `db_onservices` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_onservices`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `idendereco` int(11) NOT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `rua` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(20) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `fk_idusuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`idendereco`, `cep`, `rua`, `bairro`, `cidade`, `estado`, `numero`, `fk_idusuario`) VALUES
(25, '72225-195', 'QNN 19 Conjunto E', 'Ceilândia Norte (Ceilândia)', 'Brasília', 'DF', '25', 25),
(27, '72225-195', 'QNN 19 Conjunto E', 'Ceilândia Norte (Ceilândia)', 'Brasília', 'DF', '21', 27);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modservico`
--

CREATE TABLE `modservico` (
  `idservico` int(11) NOT NULL,
  `modservico_fk_idusuario` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `servico` varchar(50) NOT NULL,
  `modoservico` varchar(50) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `diasdisponiveis` varchar(100) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `datacadastroservicos` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `cpf` varchar(20) CHARACTER SET latin1 NOT NULL,
  `telefone` varchar(15) CHARACTER SET latin1 NOT NULL,
  `sexo` varchar(20) CHARACTER SET latin1 NOT NULL,
  `senha` varchar(20) CHARACTER SET latin1 NOT NULL,
  `datanascimento` date NOT NULL,
  `datacadastro` date NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `conta` varchar(50) NOT NULL DEFAULT 'Cadastrado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `email`, `cpf`, `telefone`, `sexo`, `senha`, `datanascimento`, `datacadastro`, `imagem`, `conta`) VALUES
(25, 'MOO', 'MOO@email.com', '046.867.931-65', '(61) 33754-876', 'feminino', '123', '0944-09-11', '2018-06-13', '5b21525b42ebe.jpg', 'Cadastrado'),
(27, 'Claudio', 'Claudio@email.com', '046.867.931-65', '(61) 33751-790', 'masculino', '123', '1994-01-11', '2018-06-13', '5b2152caa6f8d.jpg', 'Cadastrado');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idendereco`),
  ADD KEY `fk_idusuario` (`fk_idusuario`);

--
-- Indexes for table `modservico`
--
ALTER TABLE `modservico`
  ADD PRIMARY KEY (`idservico`),
  ADD KEY `modservico_fk_idusuario` (`modservico_fk_idusuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idendereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `modservico`
--
ALTER TABLE `modservico`
  MODIFY `idservico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `fk_idusuario` FOREIGN KEY (`fk_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `modservico`
--
ALTER TABLE `modservico`
  ADD CONSTRAINT `modservico_fk_idusuario` FOREIGN KEY (`modservico_fk_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
