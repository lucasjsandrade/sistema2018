-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Mar-2018 às 14:31
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamento`
--

CREATE TABLE `agendamento` (
  `idagendamento` int(11) NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataOrcamento` date DEFAULT NULL,
  `dataInstalacao` date DEFAULT NULL,
  `dataLancamento` date NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idfuncionario` int(11) NOT NULL,
  `horaMarcada` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `agendamento`
--

INSERT INTO `agendamento` (`idagendamento`, `status`, `dataOrcamento`, `dataInstalacao`, `dataLancamento`, `idcliente`, `idfuncionario`, `horaMarcada`) VALUES
(1, 'inativo', '2017-07-25', '1997-02-14', '2017-07-23', 1, 6, NULL),
(2, 'Ativo', '2017-07-23', '2017-08-14', '2017-07-23', 1, 6, NULL),
(3, 'Ativo', '2017-07-25', '2017-07-28', '2017-07-24', 25, 8, NULL),
(4, 'Ativo', '2017-07-28', '2017-07-25', '2017-07-24', 1, 6, NULL),
(5, 'Ativo', '2017-07-25', '2017-07-26', '2017-07-24', 1, 6, NULL),
(6, 'Orcamento', '2017-07-26', '2017-07-26', '2017-07-24', 1, 6, NULL),
(7, 'Cancelado', '2017-07-20', '2017-07-22', '2017-07-20', 1, 6, NULL),
(8, 'Cancelado', '2017-07-05', '2017-07-07', '2017-07-28', 1, 6, NULL),
(9, 'Orcamento', '2017-07-20', '2017-02-02', '2017-07-18', 1, 6, NULL),
(10, 'Orcamento', '2017-07-13', NULL, '2017-07-21', 1, 6, NULL),
(11, 'Orcamento', '2017-07-28', NULL, '2017-07-24', 19, 7, '15:00:00'),
(12, 'Orcamento', '2017-07-24', '2017-07-24', '2017-07-26', 1, 6, '16:30:00'),
(13, 'Instalação', '2017-07-31', '2017-08-04', '2017-07-31', 19, 6, '15:30:00'),
(14, 'Orcamento', '2017-07-10', '2017-07-25', '2017-07-26', 19, 7, '10:30:00'),
(15, 'Cancelado', '2017-07-27', '2017-07-31', '2017-07-25', 29, 6, '17:00:00'),
(16, 'Orcamento', '2017-07-27', '2017-07-28', '2017-07-27', 1, 6, '10:10:00'),
(17, 'Orcamento', '2017-08-04', '2017-07-26', '2017-07-25', 1, 6, '10:40:00'),
(18, 'Finalizado', '2017-08-03', '2017-08-01', '2017-08-02', 19, 7, '09:00:00'),
(19, 'Orcamento', NULL, NULL, '2017-07-19', 1, 6, '21:59:00'),
(20, 'Orcamento', NULL, NULL, '2017-07-27', 1, 6, '01:15:00'),
(21, 'Orcamento', NULL, NULL, '2017-07-26', 1, 6, NULL),
(22, 'Orcamento', NULL, '2017-07-26', '2015-02-22', 1, 6, NULL),
(23, 'Orcamento', '2017-07-26', NULL, '2017-07-26', 1, 6, '12:05:00'),
(24, 'Agendamento', '2017-07-26', '2017-07-26', '2017-07-26', 1, 6, '01:15:00'),
(25, 'Orcamento', '1997-02-14', '1997-02-14', '2017-07-26', 1, 6, '15:55:00'),
(26, 'Orcamento', '2017-07-19', '2017-07-11', '2017-07-27', 1, 6, '23:01:00'),
(27, 'Orcamento', '2017-07-21', '2017-07-26', '2017-07-26', 1, 6, '15:01:00'),
(28, 'Orcamento', '2017-07-27', NULL, '2017-07-28', 1, 6, '00:01:00'),
(29, 'Orcamento', '2017-07-27', '2017-07-27', '2017-07-27', 25, 6, '22:00:00'),
(30, 'Orcamento', NULL, NULL, '2017-07-27', 1, 6, NULL),
(31, 'Cancelado', '2017-07-27', '2017-08-01', '2017-07-25', 19, 6, '14:30:00'),
(32, 'Instalacao', '2017-07-19', '2017-07-27', '2017-07-26', 1, 6, '12:25:00'),
(33, 'Instalacao', '2017-07-20', '2017-07-20', '2017-07-25', 19, 7, '12:12:00'),
(34, 'Concluido', '2017-09-26', '2017-09-29', '2017-09-25', 1, 6, '12:30:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `caixa`
--

CREATE TABLE `caixa` (
  `idcaixa` int(11) NOT NULL,
  `data` date NOT NULL,
  `saldoInicial` float NOT NULL,
  `saldoFinal` float NOT NULL,
  `diferenca` float NOT NULL,
  `situacao` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idmovimentacaoCaixa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nome` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nome`, `descricao`, `status`) VALUES
(1, 'Edredom', 'Paris', '0'),
(2, 'Cortina', 'Parede 2', '0'),
(3, 'teste', 'teste', '0'),
(4, 'a', 'a', '0'),
(5, 'teste', 'deu bom', '0'),
(6, 'aaa', 'aaa', '0'),
(7, 'a', 'a', '0'),
(8, 'Cortinas', 'vitale gay', '0'),
(9, 'Tapete', 'personalisados', '0'),
(10, 'Perciana', 'Encomendada', '0'),
(11, 'Enxoval', 'teste', '0'),
(12, 'Travesseiro', 'Macio', '0'),
(13, 'Lençol', '', '0'),
(14, 'Edredom', '', '0'),
(15, 'Cobertor', 'VELUDO', '0'),
(16, 'tew', 'rew', '0'),
(17, 'ss', 'ss', '0'),
(18, 'a', 'a', '0'),
(19, 'a', 'a', '0'),
(20, 'baa', 'baa', 'Inativo'),
(21, 'a', 'a', 'Inativo'),
(22, 'Colchao', 'Em molas', 'Ativo'),
(23, 'Teste', 'Botão', 'Ativo'),
(24, 's', 's', 'Inativo'),
(25, 'Almofada', 'Para Cama', 'Ativo'),
(26, 'Percianas', 'Padrão', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `idcidade` int(11) NOT NULL,
  `nomeCidade` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idestado` int(11) NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`idcidade`, `nomeCidade`, `idestado`, `status`) VALUES
(1, 'Umuarama', 1, 'Inativo'),
(4, 'Campo Mourão', 1, 'Ativo'),
(5, 'Cianorte', 1, 'Ativo'),
(6, 'New citaw', 2, 'inativo'),
(7, 'Perobal', 1, 'Ativo'),
(8, 'Xanglilá', 2, 'Ativo'),
(9, 'Xambre', 1, 'Ativo'),
(10, 'aa', 1, 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `nomeCliente` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rg` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpf` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logradouro` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dataNascimento` date NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataCadastro` date NOT NULL,
  `idcidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nomeCliente`, `rg`, `cpf`, `sexo`, `telefone`, `celular`, `whatsapp`, `email`, `logradouro`, `numero`, `bairro`, `cep`, `dataNascimento`, `status`, `dataCadastro`, `idcidade`) VALUES
(1, 'Lucas Juliano', '12558482-9', '8065', 'F', '4430563020', '4499743652', '4499743652', 'lucas_juliano@outlook.com', 'Rua porto seguro', '1577', 'sanrafael', '875004150', '1997-02-14', 'ativo', '2017-07-06', 1),
(2, '1', NULL, '1111', 'M', NULL, NULL, NULL, NULL, '1', '11', '1', NULL, '2011-11-11', 'Inativo', '2017-07-10', 1),
(3, '1', NULL, '1', 'M', NULL, NULL, NULL, NULL, '11111111', '11111111', '1111', NULL, '1111-11-11', 'Inativo', '2017-07-10', 1),
(4, 'aaa', '', '222', 'a', '', '', '', '', 'aaaaaaaaaa', '11111', '333AA', NULL, '2017-01-01', 'Inativo', '2017-07-10', 1),
(5, 'a', NULL, '1', 'm', NULL, NULL, NULL, NULL, 'rua', '44444444', 'dddddddd', NULL, '2012-02-02', 'Inativo', '2017-07-10', 1),
(6, '1', 'a', '1', 'A', 'a', '', 'a', '', '1', 'WW', '11', 'a', '2015-11-11', 'Inativo', '2017-07-10', 1),
(7, 'a', NULL, '1', 'm', NULL, NULL, NULL, NULL, 'teste', 'teste', 'teste', NULL, '1997-01-01', 'Inativo', '2017-07-11', 1),
(8, 'a', NULL, 'a', 'a', NULL, NULL, NULL, NULL, 'a', 'a', 'a', NULL, '1997-02-02', 'Inativo', '2017-07-15', 1),
(9, 'g', NULL, 'g', 'g', NULL, NULL, NULL, NULL, 'gg', 'g', 'g', NULL, '1997-02-02', 'Inativo', '2017-07-15', 1),
(10, 'g', NULL, 'g', 'g', NULL, NULL, NULL, NULL, 'g', 'g', 'g', NULL, '1997-12-12', 'Inativo', '2017-07-15', 1),
(11, 'a', NULL, 'a', 'a', NULL, NULL, NULL, NULL, 'a', 'a', 'a', NULL, '1997-02-18', 'Inativo', '2017-07-16', 1),
(12, '1', NULL, '11', '1', NULL, NULL, NULL, NULL, '1', '1', '1', NULL, '1997-12-12', 'Inativo', '2017-07-16', 1),
(13, '2', NULL, '2', '2', NULL, NULL, NULL, NULL, '2', '2', '2', NULL, '1997-12-12', 'Inativo', '2017-07-16', 1),
(14, '1', NULL, '1', '1', NULL, NULL, NULL, NULL, '1', '1', '1', NULL, '1997-12-12', 'Inativo', '2017-07-16', 1),
(15, 'aàa', NULL, 'a', 'a', NULL, NULL, NULL, NULL, 'a', 'a', 'a', NULL, '1997-12-30', 'Inativo', '2017-07-16', 1),
(16, 'teste', NULL, 'teste', 'a', NULL, NULL, NULL, NULL, 'v', 'teste', 'teste', NULL, '1958-05-12', 'Inativo', '2017-07-16', 1),
(17, 'a', NULL, 'a', 'a', NULL, NULL, NULL, NULL, 's', 'aa', 's', NULL, '1998-01-14', 'Inativo', '2017-07-16', 1),
(18, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'aa', 'a', 'a', 'a', 'a', '1998-05-25', 'Inativo', '2017-07-16', 1),
(19, 'Zoi Prodrama', '08065768989', '080.657.689-89', 'F', '444444444444', '44444444444', 'a', 'a', 'a', 'a', 'a', 'a', '1997-02-14', 'Inativo', '2017-07-18', 1),
(20, 'a', 'a', 'a', 'a', '(44) 4444-4444', '44444444444', 'kkkkkkkkk', 'mkkkkkk', 'gggg', '7755', 'san', '08065768989', '1997-02-14', 'Inativo', '2017-07-18', 1),
(21, 'a', '', '08065768989', 'a', '', '', '', '', 'a', 'a', 'a', '', '1997-02-14', 'Inativo', '2017-07-18', 1),
(22, '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '1997-02-14', 'Inativo', '2017-07-18', 1),
(23, '1', '1', '1', '1', '(11) 1111-1111', '1', '1', '1', '1', '1', '1', '1', '2011-11-11', 'Inativo', '2017-07-18', 1),
(24, 'Lucas Juliano dos santos andrade', '12558482-9', '08065768989', 'M', '(44) 9974-3652', '(44) 9974-3652', '', 'lucas_juliano@outlook.com', 'Rua porto seguro', '1577', 'San Rafael', '87504150', '1997-02-14', 'Ativo', '2017-07-19', 1),
(25, 'Eduardo Silva Ferro', '44 30563020', '44 30563020', 'f', '44 30563020', '(44) 30563020', '44 30563020', 'lucas_juliano@outlook.coms', 'Rua das goiabada', '44 30563020', '44 30563020', '87522554', '2000-02-14', 'Ativo', '2017-07-19', 4),
(26, 'Rafael tenorio', '0025', '025', 'F', '0025', '025', '0025', 'rafael@unipar.br', 'rua portos', '0025', '0025', '0025', '1989-02-14', 'Ativo', '2017-07-19', 1),
(27, 'eu', 'v', '888.888.888-88', 'c', 'eu', 'eu', 'eu', 'eu', 'eu', 'eu', 'eu', 'eu', '2012-02-20', 'Inativo', '2017-07-19', 1),
(28, 'teste', 'teste', '888.888.888-88', 'M', 'teste', 'teste', 'teste', 'teste', 'teste', 'teste', 'teste', 'teste', '1999-01-10', 'Inativo', '2017-07-19', 1),
(29, 'Murilo Miguel Nascimento', '23.653.546-8', '027.868.399-12', 'M', '(41) 9994-7462', '(41) 9994-7462', '(41) 9994-7462', 'murilo-miguel82@mmarques.com', 'Rua Renato Caprilhone Carnieri', '1658', 'Cachoeira', '82710-344', '1995-03-27', 'Ativo', '2017-07-25', 5),
(30, 'Paulo Roberto Amendos', '857788888', '080.548.899-99', 'M', '(44) 9878-8888', '(44) 3625-2222', '(44) 6666-6666', 'paulo_roberto@outlook.com', 'Av rio branco', '5478', 'Centro', '87504000', '1993-03-31', 'Ativo', '2017-07-25', 4),
(31, 'A', '1', '111.111.111-11', 'M', '', '', '', '', '1111', 'aa', 'a', 'sa', '2018-01-01', 'Inativo', '2017-07-26', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE `compra` (
  `idcompra` int(11) NOT NULL,
  `dataCompra` date NOT NULL,
  `totalCompra` float DEFAULT NULL,
  `condicaoPagamento` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formaPagamento` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numeroDeParcelas` int(11) DEFAULT NULL,
  `idfornecedor` int(11) NOT NULL,
  `idfuncionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `compra`
--

INSERT INTO `compra` (`idcompra`, `dataCompra`, `totalCompra`, `condicaoPagamento`, `formaPagamento`, `status`, `numeroDeParcelas`, `idfornecedor`, `idfuncionario`) VALUES
(1, '2017-08-31', 100, 'Dinheiro', 'Avista', 'Ativo', 0, 1, 1),
(3, '2017-09-07', NULL, 'Avista', 'Dinheiro', 'Aberto', 10, 15, 6),
(4, '2017-09-07', NULL, 'Avista', 'Dinheiro', 'Aberto', 10, 15, 6),
(5, '2017-09-07', NULL, 'Avista', 'Dinheiro', 'Aberto', 10, 15, 6),
(6, '2017-09-07', NULL, 'Avista', 'Dinheiro', 'Aberto', 10, 15, 6),
(7, '2017-09-07', NULL, 'Avista', 'Dinheiro', 'Aberto', 10, 15, 6),
(8, '2017-09-07', NULL, 'Avista', 'Dinheiro', 'Aberto', 10, 15, 6),
(9, '2017-09-07', NULL, 'Avista', 'Dinheiro', 'Aberto', 10, 15, 6),
(10, '2017-09-07', NULL, 'Avista', 'Dinheiro', 'Aberto', 10, 15, 6),
(11, '2017-09-07', NULL, 'Avista', 'Dinheiro', 'Aberto', 10, 15, 6),
(12, '2017-09-07', NULL, 'Avista', 'Dinheiro', 'Aberto', 10, 15, 6),
(13, '2017-09-07', NULL, 'Avista', 'Dinheiro', 'Aberto', 10, 15, 6),
(14, '2017-09-07', NULL, 'Avista', 'Dinheiro', 'Aberto', 10, 15, 6),
(15, '2017-09-07', NULL, 'Avista', 'Dinheiro', 'Aberto', 10, 15, 6),
(16, '2017-09-11', NULL, 'Aprazo', 'Cartão', 'Aberto', 10, 19, 7),
(17, '2017-09-11', NULL, 'Avista', 'Dinheiro', 'Aberto', 0, 15, 6),
(18, '2017-09-11', NULL, 'Avista', 'Dinheiro', 'Aberto', 0, 15, 6),
(19, '2017-09-13', NULL, 'Aprazo', 'Cartão', 'Aberto', 3, 19, 10),
(20, '2017-09-13', NULL, 'Avista', 'Dinheiro', 'Aberto', 10, 15, 6),
(21, '2017-09-13', NULL, 'Avista', 'Dinheiro', 'Aberto', 1, 15, 6),
(22, '2017-09-13', NULL, 'Avista', 'Dinheiro', 'Aberto', 1, 15, 6),
(23, '2017-09-13', NULL, 'Avista', 'Dinheiro', 'Aberto', 1, 15, 6),
(24, '2017-09-13', NULL, 'Avista', 'Dinheiro', 'Aberto', 1, 15, 6),
(25, '2017-09-17', NULL, 'Avista', 'Dinheiro', 'Aberto', 5, 15, 6),
(26, '2017-09-17', NULL, 'Aprazo', 'Boleto', 'Aberto', 10, 15, 6),
(27, '2017-09-18', NULL, 'Avista', 'Dinheiro', 'Aberto', 5, 15, 6),
(28, '2017-09-18', NULL, 'Avista', 'Dinheiro', 'Aberto', 10, 15, 6),
(29, '2017-09-18', NULL, 'Avista', 'Dinheiro', 'Aberto', 5, 15, 6),
(30, '2017-09-18', NULL, 'Avista', 'Dinheiro', 'Aberto', 5, 15, 6),
(31, '2017-09-18', NULL, 'Avista', 'Dinheiro', 'Aberto', 1, 15, 6),
(32, '2017-09-18', NULL, 'Avista', 'Dinheiro', 'Aberto', 1, 15, 6),
(33, '2017-09-18', NULL, 'Avista', 'Dinheiro', 'Aberto', 1, 15, 6),
(34, '2017-09-18', NULL, 'Avista', 'Dinheiro', 'Aberto', 2, 15, 6),
(35, '2017-09-18', NULL, 'Avista', 'Dinheiro', 'Aberto', 1, 15, 6),
(36, '2017-09-18', NULL, 'Avista', 'Dinheiro', 'Aberto', 1, 15, 6),
(37, '2017-09-18', NULL, 'Avista', 'Dinheiro', 'Aberto', 1, 15, 6),
(38, '2017-09-18', NULL, 'Avista', 'Dinheiro', 'Aberto', 1, 15, 6),
(39, '2017-09-18', NULL, 'Aprazo', 'Cartão', 'Aberto', 3, 19, 10),
(40, '2017-09-19', NULL, 'Aprazo', 'Boleto', 'Aberto', 10, 16, 7),
(41, '2017-09-20', NULL, 'Avista', 'Dinheiro', 'Aberto', 1, 15, 6),
(42, '2017-09-20', NULL, 'Avista', 'Dinheiro', 'Aberto', 1, 15, 6),
(43, '2017-09-20', NULL, 'Avista', 'Dinheiro', 'Aberto', 1, 15, 6),
(44, '2017-09-20', 10, 'Avista', 'Dinheiro', 'Aberto', 1, 15, 6),
(45, '2017-09-20', 510, 'Avista', 'Dinheiro', 'Aberto', 1, 15, 6),
(46, '2017-09-20', NULL, 'Avista', 'Dinheiro', 'Aberto', 1, 15, 6),
(47, '2017-09-20', 5, 'Avista', 'Dinheiro', 'Aberto', 1, 15, 6),
(48, '2017-09-21', 260, 'Avista', 'Dinheiro', 'Aberto', 1, 15, 7),
(49, '2017-09-22', 36, 'Avista', 'Dinheiro', 'Aberto', 1, 15, 6),
(50, '2017-09-24', 10, 'Avista', 'Dinheiro', 'Aberto', 1, 15, 6),
(51, '2017-09-25', 5010, 'Avista', 'Dinheiro', 'Cancelado', 1, 15, 6),
(54, '2018-02-22', 10, 'Avista', 'Dinheiro', 'Aberto', 1, 15, 6),
(55, '2018-02-22', 50, 'Avista', 'Dinheiro', 'Aberto', 1, 15, 6),
(56, '2018-02-22', 60, 'Avista', 'Dinheiro', 'Aberto', 6, 15, 6),
(57, '2018-03-02', 10, 'Avista', 'Dinheiro', 'Aberto', 1, 15, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contaspagar`
--

CREATE TABLE `contaspagar` (
  `idcontasp` int(11) NOT NULL,
  `data` date NOT NULL,
  `valor` float NOT NULL,
  `descricao` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idcompra` int(11) DEFAULT NULL,
  `idfornecedor` int(11) DEFAULT NULL,
  `parcela` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `contaspagar`
--

INSERT INTO `contaspagar` (`idcontasp`, `data`, `valor`, `descricao`, `idcompra`, `idfornecedor`, `parcela`) VALUES
(1, '2017-09-30', 100, NULL, 3, 2, 0),
(2, '1999-02-02', 5, '5', 1, 14, 0),
(3, '2017-09-25', 5, 'teste', NULL, NULL, 0),
(4, '2018-02-05', 5, '5', NULL, NULL, 0),
(5, '2018-05-02', 5, '5', NULL, NULL, 0),
(6, '2018-08-05', 10, '10', NULL, NULL, 0),
(7, '2018-11-20', 5, '5', NULL, NULL, 0),
(8, '2222-02-22', 2, '20', NULL, NULL, 0),
(9, '2018-02-22', 10, 'Gerado Pela compra!', 54, 15, 1),
(10, '2018-02-22', 50, 'Gerado Pela compra!', 55, 15, 1),
(11, '2018-02-22', 60, 'Gerado Pela compra!', 56, 15, 6),
(12, '2018-03-02', 10, 'Gerado Pela compra!', 57, 15, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contasreceber`
--

CREATE TABLE `contasreceber` (
  `idcontasr` int(11) NOT NULL,
  `data` date NOT NULL,
  `valor` float NOT NULL,
  `descricao` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idvenda` int(11) DEFAULT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `parcela` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `contasreceber`
--

INSERT INTO `contasreceber` (`idcontasr`, `data`, `valor`, `descricao`, `idvenda`, `idcliente`, `parcela`) VALUES
(1, '2018-03-03', 100, 'Gerado Pela Venda!', 24, 1, 1),
(2, '2018-03-03', 100, 'Gerado Pela Venda!', 25, 1, 4),
(7, '2018-03-03', 40, 'Gerado Pela Venda!', 30, 1, 1),
(8, '2018-03-03', 300, 'Gerado Pela Venda!', 31, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `idestado` int(11) NOT NULL,
  `nomeEstado` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigla` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idpais` int(11) NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`idestado`, `nomeEstado`, `sigla`, `idpais`, `status`) VALUES
(1, 'Paraná', 'PR', 1, 'Ativo'),
(2, 'Santa Catarinas', 'SC', 1, 'Ativo'),
(4, 'Rio Grande do sul', 'RS', 1, 'Ativo'),
(5, 'Sao paulo', 'SP', 1, 'Ativo'),
(6, 'Bahia', 'BH', 1, 'Ativo'),
(10, 'Minas Gerais', 'MG', 1, 'Ativo'),
(12, 'Amazonas', 'AM', 1, ''),
(13, 'Belem', 'Bl', 1, 'Inativo'),
(14, 'a', 'ba', 1, 'Inativo'),
(15, 'as', 's', 14, 'Inativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `idfornecedor` int(11) NOT NULL,
  `razaoSocial` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomeContato` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnpj` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inscricaoEstadual` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomeFantasia` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logradouro` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dataCadastro` date NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idcidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`idfornecedor`, `razaoSocial`, `nomeContato`, `cnpj`, `inscricaoEstadual`, `nomeFantasia`, `telefone`, `fax`, `whatsapp`, `email`, `logradouro`, `numero`, `bairro`, `cep`, `dataCadastro`, `status`, `idcidade`) VALUES
(1, 'Persianas', NULL, '84844000', '5416162', 'Persianas', '1', '1', '1', 'lucas_juliano@outlook.com', 'Rua Porto seguro', '1577', 'san Rafael', '875004150', '2017-07-04', '1', 1),
(2, '1', NULL, '11', NULL, '1', '1', NULL, NULL, NULL, '1', '1', '1', NULL, '2017-07-05', 'Inativo', 1),
(3, 'q', NULL, '1', NULL, '1', '1', NULL, NULL, NULL, '1', '1', '1', NULL, '2017-07-05', 'Inativo', 1),
(4, '1', NULL, '1', NULL, '1', '1', NULL, NULL, NULL, '1', '1', '1', NULL, '2017-07-05', 'Inativo', 1),
(5, 'VALENTE ME', NULL, '888888888', NULL, 'Valente Percianas', '88844444444', 'a', NULL, NULL, 'Av Rio Branco', '4858', 'Centro', NULL, '2017-07-16', 'Inativo', 1),
(6, '1', NULL, '1', NULL, '1', 's', NULL, NULL, NULL, '1', '1', '1', NULL, '2017-07-05', 'Inativo', 1),
(7, '1', NULL, '1', NULL, '1', '1', NULL, NULL, NULL, '1', '1', '1', NULL, '2017-07-06', 'Inativo', 1),
(8, '1', NULL, '1', NULL, '1', '1', NULL, NULL, NULL, '1', '1', '1', NULL, '2017-07-06', 'Inativo', 1),
(9, '1', NULL, '1', NULL, '1', '1', NULL, NULL, NULL, '1', '1', '1', NULL, '2017-07-10', 'Inativo', 1),
(10, 'pereras me', NULL, '87787877/555', NULL, 'Pereras Cortinas', '448888888888', NULL, NULL, NULL, 'Av victoria', '8788', 'Centro', NULL, '2017-07-10', 'Inativo', 5),
(11, '1', NULL, '1', NULL, '1', '1', '11', NULL, NULL, '1', '1', '1', NULL, '2017-07-15', 'Inativo', 1),
(12, 'a', NULL, 'a', NULL, 'a', 'aa', 'a', NULL, NULL, 'a', 'a', 'a', NULL, '2017-07-15', 'Inativo', 1),
(13, 'a', NULL, 'a', NULL, 'a', 'a', 'a', NULL, NULL, 'a', 'a', 'a', NULL, '2017-07-16', 'Inativo', 1),
(14, 'a', NULL, 'a', 'a', 'a', '111', '107', '222', 'lucas@unipar.br', 'a', '12', 'a', '44', '2017-07-17', 'Inativo', 1),
(15, 'Prodama', ' Capricho', '845555', 'a', 'Prodrama', '(44) 8787-7877', '', '(44) 9974-3652', 'lucas_juliano@outlook.com', 'Av Campestres', '1', '1', '87878', '2017-07-18', 'Ativo', 1),
(16, 'KiCortinas me', 'a', 'a', 'Rua dos bonés', 'Kicortinas', '(44) 4444-4444', '', '', 'kicortinas@gmail.com', 'Rua evernis', '1', 'a', '878888', '2017-07-19', 'Ativo', 1),
(17, 'Amauri Campagnoli souza ', 'Amauri', '87557885', '8855889999', 'Pesianas Campagnoli', '(44) 3054-8588', '', '(44) 4444-4444', 'teste@uni.br', 'Av rio branco', '1547', 'Centro', '87588555', '2017-07-19', 'Ativo', 5),
(18, 'Zanflile Me', NULL, '1588888', '08000002', 'Zanflile Calhas', '443052154', '443052154', '4498583555', 'zanflile@gmail.com', 'Av. das flores ', '1578', 'Centro', '080657689', '2017-07-19', 'Ativo', 5),
(19, 'APEC', 'Teresinha', '1285000002-01', '4444444444444444444', 'Unipar', '(44) 3621-2828', '(44) 4444-4444', '(44) 9858-2828', 'unipar@unipar.br', 'Praça Mascaranhenhas de Moraes', '1548', 'Centro', '8750444', '2017-07-26', 'Ativo', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idfuncionario` int(11) NOT NULL,
  `nomeFuncionario` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rg` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logradouro` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dataNascimento` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataCadastro` date NOT NULL,
  `idcidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idfuncionario`, `nomeFuncionario`, `rg`, `cpf`, `sexo`, `telefone`, `celular`, `whatsapp`, `email`, `logradouro`, `numero`, `bairro`, `cep`, `dataNascimento`, `status`, `dataCadastro`, `idcidade`) VALUES
(1, 'Sandro Meira', '115589865', '058.9565.5.65.66', 'M', '42878787555', '1', 'x', 'sandro9874@outlook.com', '1', '1', '1', '1', '1982-03-31', 'Inativo', '2017-07-16', 1),
(6, 'Marcelo', '4545454', '080.657.689-89', 'M', '(44) 4444-4444', '(44) 4444-4444', '(44) 5555-5555', 'Marcelo@unipar.br', 'ajkajajk', '5666', 'ajahjahj', '45441', '1997-02-14', 'Ativo', '2017-07-21', 1),
(7, 'Ana ', '154875511', '758.585.885-85', 'sexo', '(44) 9878-7855', '(87) 8558-5855', '(44) 6858-6885', 'ana@gmail.com', 'Rua das flores', '7854', 'Centro', '854786255', '1985-09-06', 'Ativo', '2017-07-23', 9),
(8, 'aline', '788777878', '147.777.777-77', 'F', '(44) 9888-8888', '(44) 9888-8998', '(44) 8755-5755', 'Aline_silva@outlook.com', 'Rua Barcelona', '6958', 'Guarani', '87504159', '1992-10-01', 'Inativo', '2017-07-23', 1),
(10, 'Alessandro Geanini', '125788788', '084.755.548-65', 'M', '(44) 9858-5888', '(44) 5888-8888', '(44) 9875-4858', 'alessandro@gmail.com', 'rua das americas', '8975', 'Morumbi', '8754877', '1992-06-18', 'Ativo', '2017-07-25', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `itensc`
--

CREATE TABLE `itensc` (
  `iditensc` int(3) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `valorUnitario` float DEFAULT NULL,
  `valorTotal` float DEFAULT NULL,
  `idcompra` int(11) NOT NULL,
  `idproduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `itensc`
--

INSERT INTO `itensc` (`iditensc`, `quantidade`, `valorUnitario`, `valorTotal`, `idcompra`, `idproduto`) VALUES
(1, 10, 1, 10, 57, 11);

--
-- Acionadores `itensc`
--
DELIMITER $$
CREATE TRIGGER `tr_updEstoque` AFTER INSERT ON `itensc` FOR EACH ROW BEGIN
UPDATE produto SET  quantidade = quantidade + NEW.quantidade
WHERE produto.idproduto = NEW.idproduto;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itensp`
--

CREATE TABLE `itensp` (
  `iditens` int(3) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `valorUnitario` float DEFAULT NULL,
  `valorTotal` float DEFAULT NULL,
  `idpedido` int(11) NOT NULL,
  `idproduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itensv`
--

CREATE TABLE `itensv` (
  `iditensv` int(3) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `valorUnitario` float DEFAULT NULL,
  `valorTotal` float DEFAULT NULL,
  `desconto` float DEFAULT NULL,
  `idvenda` int(11) NOT NULL,
  `idproduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `itensv`
--

INSERT INTO `itensv` (`iditensv`, `quantidade`, `valorUnitario`, `valorTotal`, `desconto`, `idvenda`, `idproduto`) VALUES
(1, 10, 20, 200, 0, 1, 6),
(2, 10, 20, 200, NULL, 4, 6),
(4, 10, 20, 200, NULL, 12, 6),
(5, 10, 20, 200, NULL, 13, 6),
(6, 10, 20, 200, NULL, 19, 6),
(7, 5, 20, 100, NULL, 24, 6),
(8, 5, 20, 100, NULL, 25, 6),
(9, 2, 20, 40, NULL, 30, 6),
(10, 15, 20, 300, NULL, 31, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`codigo`, `nome`, `status`) VALUES
(5, 'Bom calchao', '0'),
(9, 'Castor', '1'),
(10, 'Paralela', '1'),
(11, 'Candida', 'Ativo'),
(12, 'a', '0'),
(13, 'c', '0'),
(14, 'Uniflex', 'Ativo'),
(15, 'Ortobom', 'Ativo'),
(17, 'Fibrascas', 'Ativo'),
(18, 'Bella Janela', 'Ativo'),
(30, 'Cremosa', '1'),
(31, 'maciota', '0'),
(32, 'a', '0'),
(33, 'teste', 'Inativo'),
(34, 'a', 'Ativo'),
(35, 'Lendrao Professor', 'Inativo'),
(36, 'Teste', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacaocaixa`
--

CREATE TABLE `movimentacaocaixa` (
  `idmov` int(11) NOT NULL,
  `descricao` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `tipoMovimentacao` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` float NOT NULL,
  `pagamento_codigo` int(11) NOT NULL,
  `recebimento_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `idpagamento` int(11) NOT NULL,
  `data` date NOT NULL,
  `valor` float NOT NULL,
  `juros` float NOT NULL,
  `multa` float NOT NULL,
  `valorTotal` float NOT NULL,
  `idparcelap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pais`
--

CREATE TABLE `pais` (
  `idpais` int(11) NOT NULL,
  `nomePais` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigla` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pais`
--

INSERT INTO `pais` (`idpais`, `nomePais`, `sigla`, `status`) VALUES
(1, 'Brasil', 'BR', 'Ativo'),
(2, 'Paraguai', 'PY', 'Ativo'),
(4, 'Mexico', 'MX', 'Inativo'),
(5, 'Estados Unidos', 'US', ''),
(6, 'Chile', 'CH', 'Ativo'),
(8, 'Bolivia', 'BO', 'Ativo'),
(13, 'Inglatera', 'EG', 'Ativo'),
(14, 'teste', 'te', ''),
(15, 'Maranhao', 'MA', ''),
(16, 'Guatemala', 'GA', ''),
(17, 'Alemanha', 'AL', 'Inativo'),
(18, 'a4', '4', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parcelapagar`
--

CREATE TABLE `parcelapagar` (
  `idparcela` int(11) NOT NULL,
  `dataVencimento` date NOT NULL,
  `valorParcela` float NOT NULL,
  `valorPago` float DEFAULT NULL,
  `idcontasp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `parcelapagar`
--

INSERT INTO `parcelapagar` (`idparcela`, `dataVencimento`, `valorParcela`, `valorPago`, `idcontasp`) VALUES
(2, '2017-09-29', 100, 0, 1),
(3, '2017-10-29', 100, 0, 1),
(4, '2017-11-29', 100, NULL, 1),
(5, '2018-03-22', 10, NULL, 9),
(6, '2018-03-22', 50, NULL, 10),
(7, '2018-03-22', 10, NULL, 11),
(8, '2018-04-22', 10, NULL, 11),
(9, '2018-05-22', 10, NULL, 11),
(10, '2018-06-22', 10, NULL, 11),
(11, '2018-07-22', 10, NULL, 11),
(12, '2018-08-22', 10, NULL, 11),
(13, '2018-04-02', 10, NULL, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `parcelareceber`
--

CREATE TABLE `parcelareceber` (
  `idparcela` int(11) NOT NULL,
  `dataVencimento` date NOT NULL,
  `valorParcela` float NOT NULL,
  `valorRecebido` float DEFAULT NULL,
  `idcontasr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `parcelareceber`
--

INSERT INTO `parcelareceber` (`idparcela`, `dataVencimento`, `valorParcela`, `valorRecebido`, `idcontasr`) VALUES
(1, '2018-04-03', 0, NULL, 7),
(2, '2018-04-03', 0, NULL, 8),
(3, '2018-05-03', 0, NULL, 8),
(4, '2018-06-03', 0, NULL, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `idpedido` int(3) NOT NULL,
  `condicaoPagamento` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dataPedido` date NOT NULL,
  `formaPagamento` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idfornecedor` int(11) NOT NULL,
  `idfuncionario` int(11) NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`idpedido`, `condicaoPagamento`, `dataPedido`, `formaPagamento`, `idfornecedor`, `idfuncionario`, `status`) VALUES
(54, 'Avista', '2017-08-27', 'Dinheiro', 15, 6, 'Aberto'),
(56, 'Avista', '2017-08-27', 'Dinheiro', 15, 6, 'Aberto'),
(59, 'Avista', '2017-08-27', 'Dinheiro', 15, 6, 'Aberto'),
(61, 'Avista', '2017-08-27', 'Dinheiro', 15, 6, 'Aberto'),
(63, 'Avista', '2017-08-27', 'Dinheiro', 15, 6, 'Aberto'),
(64, 'Avista', '2017-08-27', 'Dinheiro', 15, 6, 'Aberto'),
(65, 'Avista', '2017-08-27', 'Dinheiro', 15, 6, 'Aberto'),
(66, 'Avista', '2017-08-27', 'Dinheiro', 15, 6, 'Aberto'),
(67, 'Avista', '2017-08-27', 'Dinheiro', 15, 6, 'Aberto'),
(68, 'Avista', '2017-08-27', 'Dinheiro', 15, 6, 'Aberto'),
(69, 'Avista', '2017-08-27', 'Dinheiro', 15, 6, 'Aberto'),
(70, 'Avista', '2017-08-27', 'Dinheiro', 15, 6, 'Aberto'),
(71, 'Aprazo', '2016-08-24', 'Boleto', 18, 10, 'Aberto'),
(72, 'Avista', '2017-08-27', 'Dinheiro', 15, 6, 'Aberto'),
(73, 'Avista', '2017-08-27', 'Dinheiro', 15, 6, 'Aberto'),
(74, 'Avista', '2017-08-27', 'Dinheiro', 15, 6, 'Aberto'),
(75, 'Avista', '2017-08-27', 'Dinheiro', 15, 6, 'Aberto'),
(76, 'Avista', '2017-09-05', 'Dinheiro', 15, 6, 'Aberto'),
(77, 'Avista', '2017-09-05', 'Dinheiro', 15, 6, 'Aberto'),
(78, 'Avista', '2017-09-07', 'Dinheiro', 15, 6, 'Aberto'),
(79, 'Avista', '2017-09-07', 'Dinheiro', 15, 7, 'Aberto'),
(80, 'Avista', '2017-09-18', 'Dinheiro', 15, 6, 'Aberto'),
(81, 'Avista', '2017-09-24', 'Dinheiro', 15, 6, 'Aberto'),
(82, 'Avista', '2017-09-24', 'Dinheiro', 15, 6, 'Aberto'),
(83, 'Avista', '2017-09-24', 'Dinheiro', 15, 6, 'Aberto'),
(84, 'Avista', '2017-09-24', 'Dinheiro', 15, 6, 'Aberto'),
(85, 'Avista', '2017-09-25', 'Dinheiro', 15, 6, 'Aberto'),
(86, '1', '2017-09-25', 'Dinheiro', 15, 6, 'Aberto'),
(87, '10', '2017-09-25', 'Dinheiro', 15, 6, 'Aberto'),
(88, '', '2017-09-25', 'Dinheiro', 15, 6, 'Aberto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idproduto` int(11) NOT NULL,
  `modelo` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cor` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unidadeMedida` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` float DEFAULT NULL,
  `custo` float DEFAULT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataCadastro` date NOT NULL,
  `codigo` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idproduto`, `modelo`, `cor`, `material`, `unidadeMedida`, `quantidade`, `preco`, `custo`, `status`, `dataCadastro`, `codigo`, `idcategoria`) VALUES
(1, 'Tapete', 'Branco', 'Tecido', '20', 2225, 10, 30, 'Inativo', '2017-06-26', 5, 4),
(2, 'a', 'a', 'a', NULL, 5, 1, 1, 'Inativo', '2017-06-26', 9, 5),
(3, 'Travesseiro', 'Amarelo', 'Veludo', NULL, 14, 150, 75, 'Inativo', '2017-06-26', 10, 7),
(4, 'Perciana', 'Branca', 'Rose', NULL, 166, 200, 100, 'Inativo', '2017-06-27', 11, 8),
(5, 'testando1', 'branco', 'tecidos', '25', 21, 12, 2000, 'Inativo', '2017-06-27', 9, 5),
(6, 'Sinval', 'branco', 'tecido', 's', 1090, 20, 10, 'ativo', '2017-06-27', 11, 22),
(7, 'insano ', 'branco e preto', 'alcacus', '100x80', 0, 250, 10, 'Inativo', '2017-06-27', 9, 8),
(8, 'a', 'Branco', 'veludo', '10x40', 10, 1, 1, 'Inativo', '2017-06-27', 9, 5),
(9, 'a', 'teste', 'b', 'b', 1, 1, 1, 'Inativo', '2017-06-27', 10, 5),
(10, 'Teste', 'Amem', 'Tecido', '190x200', 101, 100, 10, 'Inativo', '2017-06-27', 13, 5),
(11, 'Tapetao', 'Cinza preto', 'Tecido', '20x30', 40, 2000, 1000, 'Ativo', '2017-06-28', 11, 22),
(12, 'Tapete Personalizado mga', 'Rosa', 'algodao', '120x90', 14, 250, 200, 'Inativo', '2017-06-28', 9, 5),
(13, 'Rustica Listrada', 'Vinho rose', 'Comum', '2.00x1.70', 40, 80, 45, 'Inativo', '2017-06-28', 9, 22),
(14, 'a', '2', '22', '2', 2, 2, 2, 'Inativo', '2017-06-30', 9, 5),
(15, 'a', '1', 'a', '1', 1, 1, 1, 'Inativo', '2017-06-30', 9, 5),
(16, 'Versante', 'verde e amarelo', 'Poliester e veludo', '140x100', 110, 200, 150, 'Inativo', '2017-07-02', 9, 5),
(17, 'Poha loka', 'Marom e Verde', 'Carpet', '20x40', 62, 50, 30, 'Inativo', '2017-07-04', 9, 5),
(18, 'a', '1', 'a', '1', 1, 1, 1, 'Inativo', '2017-07-04', 9, 5),
(19, 'Casal', 'Marom', 'Espuma', '2.00x1.00', 205, 800, 450, 'Inativo', '2017-07-15', 9, 22),
(20, 'rola', 'preta', 'pele', '30', 1, 25, 100000, 'Inativo', '2017-07-17', 9, 20),
(21, 's', 's', 'a', '1', 1, 1, 1, 'Inativo', '2017-07-19', 15, 22),
(22, 'teste', 'Preto', 'Tecido', '1000', 30, 10, 10, 'Inativo', '2017-07-19', 9, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `recebimento`
--

CREATE TABLE `recebimento` (
  `idrecebimento` int(11) NOT NULL,
  `data` date NOT NULL,
  `valor` float NOT NULL,
  `juros` float NOT NULL,
  `multa` float NOT NULL,
  `valorTotal` float NOT NULL,
  `parcelaReceber_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `idvenda` int(11) NOT NULL,
  `dataVenda` date NOT NULL,
  `valorTotal` float NOT NULL,
  `desconto` float DEFAULT NULL,
  `condicaoPagamento` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formaPagamento` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origemVenda` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numeroDeParcelas` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idfuncionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`idvenda`, `dataVenda`, `valorTotal`, `desconto`, `condicaoPagamento`, `formaPagamento`, `status`, `origemVenda`, `numeroDeParcelas`, `idcliente`, `idfuncionario`) VALUES
(1, '2018-02-26', 200, 0, 'Dinheiro', 'Avista', 'Concluida', '', 0, 2, 6),
(2, '2018-02-26', 200, 0, 'Dinheiro', 'Avista', 'Concluida', '', 0, 2, 6),
(4, '2018-03-02', 200, 10, 'Avista', 'Dinheiro', 'Fechada', NULL, 1, 1, 6),
(12, '2018-03-02', 200, 10, 'Avista', 'Dinheiro', 'Fechada', 'Balcao', 1, 1, 6),
(13, '2018-03-03', 200, 10, 'Avista', 'Dinheiro', 'Fechada', 'Balcao', 1, 1, 6),
(19, '2018-03-03', 200, 10, 'Avista', 'Dinheiro', 'Fechada', 'Balcao', 1, 1, 6),
(24, '2018-03-03', 100, 10, 'Avista', 'Dinheiro', 'Fechada', 'Balcao', 1, 1, 6),
(25, '2018-03-03', 100, 10, 'Avista', 'Dinheiro', 'Fechada', 'Balcao', 4, 1, 6),
(30, '2018-03-03', 40, 10, 'Avista', 'Dinheiro', 'Fechada', 'Balcao', 1, 1, 6),
(31, '2018-03-03', 300, 10, 'Aprazo', 'Cartão', 'Fechada', 'Balcao', 3, 1, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`idagendamento`),
  ADD KEY `fk_agendamento_cliente1_idx` (`idcliente`),
  ADD KEY `fk_agendamento_funcionario1_idx` (`idfuncionario`);

--
-- Indexes for table `caixa`
--
ALTER TABLE `caixa`
  ADD PRIMARY KEY (`idcaixa`),
  ADD KEY `fk_caixa_movimentacaoCaixa1_idx` (`idmovimentacaoCaixa`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indexes for table `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`idcidade`),
  ADD KEY `fk_cidade_estado1_idx` (`idestado`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`),
  ADD KEY `fk_cliente_cidade1_idx` (`idcidade`);

--
-- Indexes for table `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`idcompra`),
  ADD KEY `fk_compra_fornecedor1_idx` (`idfornecedor`),
  ADD KEY `fk_compra_funcionario1_idx` (`idfuncionario`);

--
-- Indexes for table `contaspagar`
--
ALTER TABLE `contaspagar`
  ADD PRIMARY KEY (`idcontasp`),
  ADD KEY `fk_contasPagar_compra1_idx` (`idcompra`),
  ADD KEY `fk_contasPagar_fornecedor1_idx` (`idfornecedor`);

--
-- Indexes for table `contasreceber`
--
ALTER TABLE `contasreceber`
  ADD PRIMARY KEY (`idcontasr`),
  ADD KEY `fk_contasReceber_venda1_idx` (`idvenda`),
  ADD KEY `fk_contasReceber_cliente1_idx` (`idcliente`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idestado`),
  ADD KEY `fk_estado_pais_idx` (`idpais`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`idfornecedor`),
  ADD KEY `fk_fornecedor_cidade1_idx` (`idcidade`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idfuncionario`),
  ADD KEY `fk_funcionario_cidade1_idx` (`idcidade`);

--
-- Indexes for table `itensc`
--
ALTER TABLE `itensc`
  ADD PRIMARY KEY (`iditensc`),
  ADD KEY `idcompra` (`idcompra`),
  ADD KEY `idproduto` (`idproduto`);

--
-- Indexes for table `itensp`
--
ALTER TABLE `itensp`
  ADD PRIMARY KEY (`iditens`),
  ADD KEY `idpedido` (`idpedido`),
  ADD KEY `idproduto` (`idproduto`);

--
-- Indexes for table `itensv`
--
ALTER TABLE `itensv`
  ADD PRIMARY KEY (`iditensv`),
  ADD KEY `idvenda` (`idvenda`),
  ADD KEY `idproduto` (`idproduto`);

--
-- Indexes for table `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `movimentacaocaixa`
--
ALTER TABLE `movimentacaocaixa`
  ADD PRIMARY KEY (`idmov`),
  ADD KEY `fk_movimentacaoCaixa_pagamento1_idx` (`pagamento_codigo`),
  ADD KEY `fk_movimentacaoCaixa_recebimento1_idx` (`recebimento_codigo`);

--
-- Indexes for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`idpagamento`),
  ADD KEY `fk_pagamento_parcelaPagar1_idx` (`idparcelap`);

--
-- Indexes for table `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`idpais`);

--
-- Indexes for table `parcelapagar`
--
ALTER TABLE `parcelapagar`
  ADD PRIMARY KEY (`idparcela`),
  ADD KEY `fk_parcelaPagar_contasPagar1_idx` (`idcontasp`);

--
-- Indexes for table `parcelareceber`
--
ALTER TABLE `parcelareceber`
  ADD PRIMARY KEY (`idparcela`),
  ADD KEY `fk_parcelaReceber_contasReceber1_idx` (`idcontasr`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idpedido`),
  ADD KEY `idfornecedor` (`idfornecedor`),
  ADD KEY `idfuncionario` (`idfuncionario`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idproduto`),
  ADD KEY `fk_produto_marca1_idx` (`codigo`),
  ADD KEY `fk_produto_grupo1_idx` (`idcategoria`);

--
-- Indexes for table `recebimento`
--
ALTER TABLE `recebimento`
  ADD PRIMARY KEY (`idrecebimento`),
  ADD KEY `fk_recebimento_parcelaReceber1_idx` (`parcelaReceber_codigo`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`idvenda`),
  ADD KEY `fk_venda_cliente1_idx` (`idcliente`),
  ADD KEY `fk_venda_funcionario1_idx` (`idfuncionario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `idagendamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `caixa`
--
ALTER TABLE `caixa`
  MODIFY `idcaixa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `cidade`
--
ALTER TABLE `cidade`
  MODIFY `idcidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `compra`
--
ALTER TABLE `compra`
  MODIFY `idcompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `contaspagar`
--
ALTER TABLE `contaspagar`
  MODIFY `idcontasp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `contasreceber`
--
ALTER TABLE `contasreceber`
  MODIFY `idcontasr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `idestado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `idfornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idfuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `itensc`
--
ALTER TABLE `itensc`
  MODIFY `iditensc` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `itensp`
--
ALTER TABLE `itensp`
  MODIFY `iditens` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `itensv`
--
ALTER TABLE `itensv`
  MODIFY `iditensv` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `marca`
--
ALTER TABLE `marca`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `movimentacaocaixa`
--
ALTER TABLE `movimentacaocaixa`
  MODIFY `idmov` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `idpagamento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pais`
--
ALTER TABLE `pais`
  MODIFY `idpais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `parcelapagar`
--
ALTER TABLE `parcelapagar`
  MODIFY `idparcela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `parcelareceber`
--
ALTER TABLE `parcelareceber`
  MODIFY `idparcela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idpedido` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `idproduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `recebimento`
--
ALTER TABLE `recebimento`
  MODIFY `idrecebimento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `idvenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD CONSTRAINT `fk_agendamento_cliente1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_agendamento_funcionario1` FOREIGN KEY (`idfuncionario`) REFERENCES `funcionario` (`idfuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `caixa`
--
ALTER TABLE `caixa`
  ADD CONSTRAINT `fk_caixa_movimentacaoCaixa1` FOREIGN KEY (`idmovimentacaoCaixa`) REFERENCES `movimentacaocaixa` (`idmov`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `fk_cidade_estado1` FOREIGN KEY (`idestado`) REFERENCES `estado` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_cidade1` FOREIGN KEY (`idcidade`) REFERENCES `cidade` (`idcidade`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fk_compra_fornecedor1` FOREIGN KEY (`idfornecedor`) REFERENCES `fornecedor` (`idfornecedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_compra_funcionario1` FOREIGN KEY (`idfuncionario`) REFERENCES `funcionario` (`idfuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `contaspagar`
--
ALTER TABLE `contaspagar`
  ADD CONSTRAINT `fk_contasPagar_compra1` FOREIGN KEY (`idcompra`) REFERENCES `compra` (`idcompra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contasPagar_fornecedor1` FOREIGN KEY (`idfornecedor`) REFERENCES `fornecedor` (`idfornecedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `contasreceber`
--
ALTER TABLE `contasreceber`
  ADD CONSTRAINT `fk_contasReceber_cliente1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contasReceber_venda1` FOREIGN KEY (`idvenda`) REFERENCES `venda` (`idvenda`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `fk_estado_pais` FOREIGN KEY (`idpais`) REFERENCES `pais` (`idpais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD CONSTRAINT `fk_fornecedor_cidade1` FOREIGN KEY (`idcidade`) REFERENCES `cidade` (`idcidade`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fk_funcionario_cidade1` FOREIGN KEY (`idcidade`) REFERENCES `cidade` (`idcidade`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `itensc`
--
ALTER TABLE `itensc`
  ADD CONSTRAINT `itensc_ibfk_1` FOREIGN KEY (`idcompra`) REFERENCES `compra` (`idcompra`),
  ADD CONSTRAINT `itensc_ibfk_2` FOREIGN KEY (`idproduto`) REFERENCES `produto` (`idproduto`);

--
-- Limitadores para a tabela `itensp`
--
ALTER TABLE `itensp`
  ADD CONSTRAINT `itensp_ibfk_1` FOREIGN KEY (`idpedido`) REFERENCES `pedido` (`idpedido`),
  ADD CONSTRAINT `itensp_ibfk_2` FOREIGN KEY (`idproduto`) REFERENCES `produto` (`idproduto`);

--
-- Limitadores para a tabela `itensv`
--
ALTER TABLE `itensv`
  ADD CONSTRAINT `itensv_ibfk_1` FOREIGN KEY (`idvenda`) REFERENCES `venda` (`idvenda`),
  ADD CONSTRAINT `itensv_ibfk_2` FOREIGN KEY (`idproduto`) REFERENCES `produto` (`idproduto`);

--
-- Limitadores para a tabela `movimentacaocaixa`
--
ALTER TABLE `movimentacaocaixa`
  ADD CONSTRAINT `fk_movimentacaoCaixa_pagamento1` FOREIGN KEY (`pagamento_codigo`) REFERENCES `pagamento` (`idpagamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movimentacaoCaixa_recebimento1` FOREIGN KEY (`recebimento_codigo`) REFERENCES `recebimento` (`idrecebimento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `fk_pagamento_parcelaPagar1` FOREIGN KEY (`idparcelap`) REFERENCES `parcelapagar` (`idparcela`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `parcelapagar`
--
ALTER TABLE `parcelapagar`
  ADD CONSTRAINT `fk_parcelaPagar_contasPagar1` FOREIGN KEY (`idcontasp`) REFERENCES `contaspagar` (`idcontasp`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `parcelareceber`
--
ALTER TABLE `parcelareceber`
  ADD CONSTRAINT `fk_parcelaReceber_contasReceber1` FOREIGN KEY (`idcontasr`) REFERENCES `contasreceber` (`idcontasr`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`idfornecedor`) REFERENCES `fornecedor` (`idfornecedor`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`idfuncionario`) REFERENCES `funcionario` (`idfuncionario`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_produto_grupo1` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produto_marca1` FOREIGN KEY (`codigo`) REFERENCES `marca` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `recebimento`
--
ALTER TABLE `recebimento`
  ADD CONSTRAINT `fk_recebimento_parcelaReceber1` FOREIGN KEY (`parcelaReceber_codigo`) REFERENCES `parcelareceber` (`idparcela`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `fk_venda_cliente1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_venda_funcionario1` FOREIGN KEY (`idfuncionario`) REFERENCES `funcionario` (`idfuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
