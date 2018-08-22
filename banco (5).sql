-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Ago-2018 às 03:25
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
(1, 'Instalacao', '2018-04-05', NULL, '2018-04-06', 25, 1, '17:00:00'),
(2, 'Cancelado', '2018-04-20', NULL, '2018-04-19', 25, 6, '05:57:00'),
(3, 'Cancelado', NULL, NULL, '2018-04-19', 1, 1, NULL),
(4, 'Cancelado', '2018-04-19', NULL, '2018-04-19', 1, 1, NULL),
(5, 'Cancelado', '2018-04-19', NULL, '2018-04-19', 1, 1, NULL),
(6, 'Cancelado', NULL, NULL, '2018-04-19', 1, 1, NULL),
(7, 'Cancelado', NULL, NULL, '2018-04-19', 1, 1, '00:12:00'),
(8, 'Orcamento', NULL, NULL, '2018-04-19', 1, 1, '23:12:00'),
(9, 'Orcamento', NULL, '2018-04-09', '2018-04-19', 1, 1, NULL),
(10, 'Orcamento', NULL, NULL, '2018-04-19', 1, 1, NULL),
(11, 'Orcamento', NULL, '2018-04-20', '2018-04-20', 1, 1, NULL),
(12, 'Orcamento', '2018-04-19', NULL, '2018-04-20', 1, 1, NULL),
(13, 'Orcamento', '2018-04-19', NULL, '2018-04-20', 1, 1, NULL),
(14, 'Orcamento', '2018-04-12', NULL, '2018-04-20', 1, 1, NULL),
(15, 'Orcamento', '2018-04-29', NULL, '2018-04-20', 1, 1, '23:10:00'),
(16, 'Orcamento', NULL, NULL, '2018-04-20', 1, 1, NULL),
(17, 'Orcamento', '2018-04-20', NULL, '2018-04-20', 1, 1, NULL),
(18, 'Orcamento', NULL, NULL, '2018-04-20', 1, 1, '11:20:00'),
(19, 'Orcamento', NULL, NULL, '2018-04-20', 1, 1, '11:40:00'),
(20, 'Orcamento', NULL, NULL, '2018-04-20', 1, 1, NULL),
(21, 'Cancelado', NULL, NULL, '2018-04-20', 1, 1, NULL),
(23, 'Orcamento', '2018-04-20', NULL, '2018-04-20', 1, 1, NULL),
(24, 'Orcamento', NULL, NULL, '2018-04-20', 1, 1, NULL),
(25, 'Orcamento', NULL, NULL, '2018-04-20', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `caixa`
--

CREATE TABLE `caixa` (
  `idcaixa` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `saldoInicial` float NOT NULL,
  `saldoAtual` float DEFAULT NULL,
  `saldoFinal` float DEFAULT NULL,
  `situacao` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `caixa`
--

INSERT INTO `caixa` (`idcaixa`, `data`, `saldoInicial`, `saldoAtual`, `saldoFinal`, `situacao`) VALUES
(54, '2018-07-30 14:21:20', 2, NULL, NULL, 'Fechado'),
(55, '2018-07-30 14:23:15', 2, NULL, NULL, 'Fechado'),
(56, '2018-07-30 14:23:24', 1, NULL, NULL, 'Fechado'),
(57, '2018-07-30 14:23:27', 1, NULL, NULL, 'Fechado'),
(58, '2018-07-30 14:26:52', 888, NULL, NULL, 'Fechado'),
(59, '2018-07-30 14:28:36', 888, NULL, NULL, 'Fechado'),
(60, '2018-07-30 14:28:46', 1, NULL, NULL, 'Fechado'),
(61, '2018-07-30 14:29:28', 1, NULL, NULL, 'Fechado'),
(62, '2018-07-30 14:29:48', 2, NULL, NULL, 'Fechado'),
(63, '2018-07-30 19:06:55', 11, NULL, NULL, 'Fechado'),
(64, '2018-07-30 19:15:58', 4, NULL, NULL, 'Fechado'),
(65, '2018-07-30 20:06:56', 20, NULL, NULL, 'Fechado'),
(66, '2018-07-30 20:10:01', 20, NULL, NULL, 'Fechado'),
(67, '2018-07-30 20:11:56', 20, NULL, NULL, 'Fechado'),
(68, '2018-07-30 20:13:22', 20, NULL, NULL, 'Fechado'),
(69, '2018-07-30 20:19:07', 20, NULL, NULL, 'Fechado'),
(70, '2018-07-30 20:19:22', 10, NULL, NULL, 'Fechado'),
(71, '2018-07-30 20:21:05', 10, NULL, NULL, 'Fechado'),
(72, '2018-07-30 20:24:49', 10, NULL, NULL, 'Fechado'),
(73, '2018-07-30 20:26:06', 10, NULL, NULL, 'Fechado'),
(74, '2018-07-30 20:26:34', 10, NULL, NULL, 'Fechado'),
(75, '2018-07-30 20:27:00', 15, NULL, NULL, 'Fechado'),
(76, '2018-07-30 20:29:30', 15, NULL, NULL, 'Fechado'),
(77, '2018-07-30 20:29:45', 15, NULL, NULL, 'Fechado'),
(78, '2018-07-30 20:30:28', 15, NULL, NULL, 'Fechado'),
(79, '2018-07-30 20:30:30', 15, NULL, NULL, 'Fechado'),
(80, '2018-07-30 20:30:46', 15, NULL, NULL, 'Fechado'),
(81, '2018-07-30 20:33:44', 15, NULL, NULL, 'Fechado'),
(82, '2018-08-02 20:27:04', 50, NULL, NULL, 'Fechado'),
(83, '2018-08-20 13:36:01', 10, NULL, NULL, 'Fechado'),
(84, '2018-08-20 13:36:21', 10, NULL, NULL, 'Fechado'),
(85, '2018-08-20 13:37:06', 100, NULL, NULL, 'Fechado'),
(86, '2018-08-20 13:37:45', 10, 10, NULL, 'Fechado'),
(87, '2018-08-20 13:39:46', 150, 150, NULL, 'Fechado'),
(88, '2018-08-20 13:39:46', 150, 150, NULL, 'Fechado'),
(89, '2018-08-20 13:40:25', 0, 0, NULL, 'Fechado'),
(90, '2018-08-20 13:41:59', 0, 0, NULL, 'Fechado'),
(91, '2018-08-20 13:42:36', 0, 0, NULL, 'Fechado'),
(92, '2018-08-20 13:43:12', 1, 1, NULL, 'Fechado'),
(93, '2018-08-20 14:40:10', 100, 100, NULL, 'Fechado'),
(94, '2018-08-20 17:11:51', 0, 0, NULL, 'Fechado'),
(95, '2018-08-20 17:15:29', 10, 42, 42, 'Fechado'),
(96, '2018-08-20 17:30:31', 500, 210, 210, 'Fechado'),
(97, '2018-08-20 21:37:20', 10, NULL, NULL, 'Fechado'),
(98, '2018-08-20 21:38:14', 50, 50, 50, 'Fechado'),
(99, '2018-08-20 21:47:26', 100, 100, 100, 'Fechado'),
(100, '2018-08-20 21:49:31', 100, 50, 50, 'Fechado'),
(101, '2018-08-20 22:18:29', 200, 80, 80, 'Fechado'),
(102, '2018-08-20 22:21:30', 100, 50, 50, 'Fechado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nome`, `descricao`, `status`) VALUES
(33, 'Tapetes', 'Bordados', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `idcidade` int(11) NOT NULL,
  `nomeCidade` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idestado` int(11) NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`idcidade`, `nomeCidade`, `idestado`, `status`) VALUES
(1, 'Umuarama 1', 1, 'Ativo'),
(4, 'Campo Mourão', 1, 'Ativo'),
(5, 'Cianorte', 1, 'Ativo');

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
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 'Lucas Juliano', '12558482-9', '100.772.029-88', 'F', '(44) 3056-3020', '', '', 'lucas_juliano@outlook.com', 'Rua porto seguro', '1577', 'sanrafael', '875004150', '1997-02-14', 'ativo', '2017-07-06', 1),
(25, 'Eduardo Silva Ferro', '44 30563020', '080.657.689-89', 'f', '(44) 3056-3020', '', '', 'lucas_juliano@outlook.coms', 'Rua das goiabada', '1515', '44 30563020', '87522554', '2000-02-14', 'Ativo', '2017-07-19', 4),
(26, 'Rafael tenorio', '0025', '025', 'F', '0025', '025', '0025', 'rafael@unipar.br', 'rua portos', '0025', '0025', '0025', '1989-02-14', 'Inativo', '2017-07-19', 1),
(27, 'Pedro Saquetto', '125584829', '111.111.111-11', 'M', '(44) 3056-3338', '(44) 99976-6624', '', '', 'Rua B', '15', 'Centro', '87.505-785', '2018-05-08', 'Ativo', '2018-05-10', 1),
(28, 'Lorenzo Danilo Nathan de Paula', '35.255.528-2', '266.983.969-07', 'M', '(44) 2823-6313', '(44) 99618-0129', NULL, 'llorenzodanilonathandepaula@saopaulo10hotmail.com', 'Praça Paulo Leminski', '223', 'Conjunto Habitacional Sonho Meu', '87.510-055', '1996-06-02', 'Ativo', '2018-06-28', 1);

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
(68, '2018-06-13', 200, 'Avista', 'Dinheiro', 'Aberto', 1, 17, 1),
(69, '2018-06-06', 100, 'Avista', 'Dinheiro', 'Fechado', 1, 17, 1),
(70, '2018-06-14', 18, '', 'Dinheiro', 'Fechado', 1, 17, 1),
(71, '2018-06-14', 200, '', 'Dinheiro', 'Fechado', 1, 17, 1),
(72, '2018-06-14', 35, 'Avista', 'Dinheiro', 'Fechado', 1, 17, 1),
(73, '2018-06-14', 57, 'Avista', 'Dinheiro', 'Fechado', 1, 17, 1),
(74, '2018-06-14', 100, '', 'Dinheiro', 'Fechado', 1, 17, 1),
(75, '2018-06-14', NULL, '', 'Dinheiro', 'Aberto', NULL, 17, 1),
(76, '2018-06-14', 15, 'Avista', 'Dinheiro', 'Fechado', 1, 17, 1),
(77, '2018-06-14', 25, 'Avista', 'Dinheiro', 'Fechado', 1, 17, 1),
(78, '2018-07-25', 100, 'Avista', 'Dinheiro', 'Fechado', 1, 17, 1),
(79, '2018-07-25', 50, 'Avista', 'Dinheiro', 'Fechado', 1, 17, 1),
(80, '2018-07-26', 4, 'Avista', 'Dinheiro', 'Fechado', 1, 17, 1);

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
(17, '2018-05-07', 50, 'Gerado Pela compra!', 62, 17, 1),
(18, '2018-05-16', 25, 'Gerado Pela compra!', 63, 17, 1),
(19, '2018-05-17', 10, 'Gerado Pela compra!', 64, 17, 1),
(20, '2018-05-22', 110, 'Gerado Pela compra!', 65, 17, 1),
(21, '2018-06-05', 200, 'Gerado Pela compra!', 68, 17, 1),
(22, '2018-06-05', 100, 'Gerado Pela compra!', 69, 17, 1),
(24, '2018-06-06', 100, 'Gerado Pelo pedido!', 69, 17, 1),
(25, '2018-06-14', 18, 'Gerado Pelo pedido!', 70, 17, 1),
(26, '2018-06-14', 200, 'Gerado Pelo pedido!', 71, 17, 1),
(27, '2018-06-14', 35, 'Gerado Pela compra!', 72, 17, 1),
(28, '2018-06-14', 57, 'Gerado Pela compra!', 73, 17, 1),
(29, '2018-06-14', 100, 'Gerado Pelo pedido!', 74, 17, 1),
(30, '2018-06-14', 15, 'Gerado Pela compra!', 76, 17, 1),
(31, '2018-06-14', 25, 'Gerado Pela compra!', 77, 17, 1),
(32, '2018-06-28', 500, 'Gerado Pela compra!', 78, 17, 1),
(33, '2018-07-25', 100, 'Gerado Pela compra!', 78, 17, 1),
(34, '2018-07-25', 50, 'Gerado Pela compra!', 79, 17, 1),
(35, '2018-07-26', 4, 'Gerado Pela compra!', 80, 17, 1);

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
(403, '2018-08-20', 40, 'Gerado Pela Venda!', 239, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `idestado` int(11) NOT NULL,
  `nomeEstado` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigla` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idpais` int(11) NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`idestado`, `nomeEstado`, `sigla`, `idpais`, `status`) VALUES
(1, 'Paraná ', 'PR', 1, NULL);

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
(16, 'KiCortinas me', 'a', '99.069.460/0001-33', 'Rua dos bonés', 'Kicortinas teste', '(44) 4444-4444', '', '', 'kicortinas@gmail.com', 'Rua evernis', '1', 'a', '878888', '2017-07-19', 'Inativo', 1),
(17, 'Silva duarte eirelli', 'Eduardo', '56.259.333/0001-94', '', 'Persianas e cotinas duarte', '(44) 9848-4848', '', '', 'duartepersi@gmail.com', 'AV ipiranga', '5858', 'Zona 2', '87508165', '2018-05-07', 'Ativo', 1);

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
(1, 'Alex Teixeira ramalho', '115589865', '058.956.556-56', 'M', '(42) 8787-8755', '(44) 99976-6624', '', 'sandro9874@outlook.com', 'Av Rio Grande do Sul', '5875', 'ZONA V', '87.504-000', '1982-03-31', 'ativo', '2017-07-16', 1),
(6, 'Marcelo Ramalho', '4545454', '080.657.689-89', 'M', '(44) 4444-4444', '(44) 4444-4444', '(44) 5555-5555', 'Marcelo@unipar.br', 'Rua dos Pedreiros', '5666', 'ajahjahj', '875041585', '1997-02-14', 'Ativo', '2017-07-21', 1);

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
  `idproduto` int(11) NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `itensc`
--

INSERT INTO `itensc` (`iditensc`, `quantidade`, `valorUnitario`, `valorTotal`, `idcompra`, `idproduto`, `status`) VALUES
(15, 5, 20, 100, 69, 28, 'Compra'),
(27, 1, 9, 9, 68, 27, 'Pedido'),
(28, 2, 2, 4, 68, 27, 'Pedido'),
(29, 4, 4, 16, 68, 27, 'Pedido'),
(30, 10, 20, 200, 68, 27, 'Pedido'),
(32, 3, 3, 9, 70, 27, 'Compra'),
(34, 20, 10, 200, 71, 27, 'Compra'),
(35, 3, 5, 15, 72, 28, NULL),
(36, 2, 10, 20, 72, 28, NULL),
(37, 3, 5, 15, 73, 27, NULL),
(38, 6, 7, 42, 73, 28, NULL),
(40, 10, 10, 100, 74, 27, 'Compra'),
(41, 1, 10, 10, 75, 27, 'Pedido'),
(42, 3, 5, 15, 76, 27, NULL),
(43, 5, 5, 25, 77, 30, NULL),
(44, 10, 50, 500, 78, 27, NULL),
(45, 1, 100, 100, 78, 27, NULL),
(46, 1, 50, 50, 79, 27, NULL),
(47, 2, 2, 4, 80, 27, NULL);

--
-- Acionadores `itensc`
--
DELIMITER $$
CREATE TRIGGER `tr_updEstoqueCompra` AFTER INSERT ON `itensc` FOR EACH ROW BEGIN
IF((SELECT compra.STATUS FROM compra
		WHERE idcompra = NEW.idcompra)= 'Fechado')THEN
		update produto set quantidade = quantidade + new.quantidade
		where produto.idproduto = new.idproduto; 
end if;
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

--
-- Extraindo dados da tabela `itensp`
--

INSERT INTO `itensp` (`iditens`, `quantidade`, `valorUnitario`, `valorTotal`, `idpedido`, `idproduto`) VALUES
(1, 1, 10, 10, 1, 27);

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
  `idvenda` int(11) DEFAULT NULL,
  `idproduto` int(11) NOT NULL,
  `status` varchar(250) NOT NULL,
  `maodeobra` float DEFAULT NULL,
  `estoque` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `itensv`
--

INSERT INTO `itensv` (`iditensv`, `quantidade`, `valorUnitario`, `valorTotal`, `desconto`, `idvenda`, `idproduto`, `status`, `maodeobra`, `estoque`) VALUES
(608, 2, NULL, 20, 0, 221, 27, 'Venda', NULL, NULL),
(611, 15, 10, 150, 0, 222, 27, 'orcamento', 0, NULL),
(742, 1, 40, 40, 0, 223, 28, 'orcamento', 0, NULL),
(745, 2, 40, 80, 0, 224, 28, 'orcamento', 0, NULL),
(746, 2, 10, 20, 0, 225, 27, 'orcamento', 0, NULL),
(747, 3, 40, 120, 0, 225, 28, 'orcamento', 0, NULL),
(750, 2, 40, 80, 0, 226, 28, 'orcamento', 0, NULL),
(753, 3, 10, 30, 0, 227, 27, 'orcamento', 0, NULL),
(754, 2, 10, 20, 0, 228, 27, 'orcamento', 0, NULL),
(756, 13, 10, 130, 0, 229, 27, 'orcamento', 0, NULL),
(757, 2, 10, 20, 0, 230, 27, 'orcamento', 0, NULL),
(759, 5, NULL, 50, 0, 232, 30, 'Venda', NULL, NULL),
(762, 2, 10, 20, 0, 231, 27, 'orcamento', 0, NULL),
(763, 1, NULL, 10, 0, 233, 27, 'Venda', NULL, NULL),
(764, 5, NULL, 50, 0, 234, 27, 'Venda', NULL, NULL),
(766, 2, 10, 20, 10, 235, 27, 'orcamento', 10, NULL),
(767, 1, 10, 10, 0, 236, 27, 'orcamento', 0, NULL),
(768, 2, NULL, 20, 0, 237, 27, 'Venda', NULL, NULL),
(769, 4, NULL, 40, 0, 239, 27, 'Venda', NULL, NULL);

--
-- Acionadores `itensv`
--
DELIMITER $$
CREATE TRIGGER `tr_updEstoqueVenda` AFTER INSERT ON `itensv` FOR EACH ROW BEGIN
IF((SELECT VENDA.STATUS FROM VENDA
		WHERE idvenda = NEW.idvenda)= 'Fechada')THEN
		update produto set quantidade = quantidade - new.quantidade
		where produto.idproduto = new.idproduto; 
end if;
END
$$
DELIMITER ;

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
(38, 'Castor ', 'Ativo'),
(39, 'Capricho', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacaocaixa`
--

CREATE TABLE `movimentacaocaixa` (
  `idmovimentacao` int(11) NOT NULL,
  `descricao` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `tipoMovimentacao` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` float NOT NULL,
  `idpagamento` int(11) DEFAULT NULL,
  `idrecebimento` int(11) DEFAULT NULL,
  `idcaixa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `movimentacaocaixa`
--

INSERT INTO `movimentacaocaixa` (`idmovimentacao`, `descricao`, `data`, `tipoMovimentacao`, `valor`, `idpagamento`, `idrecebimento`, `idcaixa`) VALUES
(6, '', '2018-07-26 00:00:00', 'a', 10, 1, NULL, 0),
(7, '', '2018-07-26 00:00:00', 'a', 10, 1, NULL, 0),
(8, '5', '2018-07-21 00:00:00', '', 0, NULL, NULL, 27),
(9, '5', '2018-07-21 00:00:00', '', 0, NULL, NULL, 27),
(10, 'Abertura', '2018-07-30 20:26:34', 'M', 10, NULL, NULL, 27),
(11, 'Abertura', '2018-07-30 20:33:44', 'M', 15, NULL, NULL, 81),
(12, 'Abertura', '2018-08-02 20:27:04', 'M', 50, NULL, NULL, 82),
(13, 'teste', '2018-08-20 11:16:10', 'Pagamento', 100, NULL, NULL, 82),
(14, '', '2018-08-20 11:17:40', 'Pagamento', 15, NULL, NULL, 82),
(15, '', '2018-08-20 11:26:28', 'Pagamento', 15, NULL, NULL, 82),
(17, '', '2018-08-20 11:30:22', 'Pagamento', 15, NULL, NULL, 82),
(18, 'olá olá olá olá olá olá olá olá olá olá olá olá olá olá olá olá olá olá olá olá olá olá olá olá ', '2018-08-20 11:32:04', 'Pagamento', 100, 22, NULL, 82),
(19, '', '2018-08-20 11:33:15', 'Pagamento', 50, 23, 0, 82),
(20, '', '2018-08-20 13:31:23', 'Pagamento', 15, 24, 0, 82),
(21, 'Abertura', '2018-08-20 13:36:21', 'M', 10, NULL, NULL, 84),
(22, 'Abertura', '2018-08-20 13:37:06', 'M', 100, NULL, NULL, 85),
(23, 'Abertura', '2018-08-20 13:37:45', 'M', 10, NULL, NULL, 86),
(24, 'Abertura', '2018-08-20 13:39:46', 'M', 150, NULL, NULL, 87),
(25, 'Abertura', '2018-08-20 13:39:46', 'M', 150, NULL, NULL, 88),
(26, 'Abertura', '2018-08-20 13:40:25', 'M', 0, NULL, NULL, 89),
(27, 'Abertura', '2018-08-20 13:41:59', 'M', 0, NULL, NULL, 90),
(28, 'Abertura', '2018-08-20 13:42:36', 'M', 0, NULL, NULL, 91),
(29, 'Abertura', '2018-08-20 13:43:12', 'M', 1, NULL, NULL, 92),
(30, '', '2018-08-20 13:49:53', 'Pagamento', 100, 25, 0, 82),
(31, '', '2018-08-20 13:52:34', 'Pagamento', 15, 26, 0, 82),
(32, '5', '2018-08-20 13:55:25', 'Pagamento', 35, 27, 0, 82),
(33, '', '2018-08-20 13:56:19', 'Pagamento', 15, 28, 0, 82),
(34, '5', '2018-08-20 13:56:51', 'Pagamento', 10, 29, 0, 82),
(35, '', '2018-08-20 13:57:33', 'Pagamento', 50, 30, 0, 82),
(36, '', '2018-08-20 14:03:22', 'Pagamento', 20, 33, 0, 82),
(38, '50', '2018-08-20 14:29:46', 'Pagamento', 10, 51, 0, 82),
(39, 'avgahabj', '2018-08-20 14:33:46', 'Pagamento', 100, 52, 0, 82),
(40, '', '2018-08-20 14:34:22', 'Pagamento', 50, 53, 0, 92),
(41, '', '2018-08-20 14:39:49', 'Pagamento', 50, 60, 0, 92),
(42, 'Abertura', '2018-08-20 14:40:10', 'M', 100, NULL, NULL, 93),
(43, 'ola', '2018-08-20 14:40:39', 'Pagamento', 25, 61, 0, 93),
(48, '', '2018-08-20 17:10:08', 'Pagamento', 10, 66, 0, 93),
(49, '', '2018-08-20 17:11:21', 'Pagamento', 57, 67, 0, 93),
(50, 'Abertura', '2018-08-20 17:11:51', 'M', 0, NULL, NULL, 94),
(51, '', '2018-08-20 17:12:28', 'Pagamento', 5, 68, 0, 94),
(60, 'Abertura', '2018-08-20 17:15:30', 'M', 10, NULL, NULL, 95),
(63, '', '2018-08-20 17:16:57', 'Pagamento', 5, 79, 0, 95),
(64, '', '2018-08-20 17:22:14', 'Pagamento', 10, 80, 0, 95),
(65, '50', '2018-08-20 17:22:40', 'Pagamento', 10, 81, 0, 95),
(66, '', '2018-08-20 17:23:05', 'Pagamento', 50, 82, 0, 95),
(67, '', '2018-08-20 17:26:16', 'Pagamento', 18, 83, 0, 95),
(68, 'Abertura', '2018-08-20 17:30:31', 'M', 500, NULL, NULL, 96),
(69, '', '2018-08-20 17:30:53', 'Pagamento', 18, 84, 0, 96),
(70, 'Gilerme gay', '2018-08-20 17:31:47', 'Pagamento', 100, 85, 0, 96),
(71, '', '2018-08-20 17:33:11', 'Pagamento', 50, 86, 0, 96),
(72, '', '2018-08-20 19:07:06', 'Pagamento', 35, 93, 0, 96),
(73, '', '2018-08-20 19:37:23', 'Pagamento', 20, 94, 0, 96),
(74, '', '2018-08-20 19:42:25', 'Pagamento', 500, 95, 0, 96),
(75, '', '2018-08-20 19:46:47', 'Pagamento', 57, 96, 0, 96),
(76, 'Abertura', '2018-08-20 21:37:20', 'M', 10, NULL, NULL, 97),
(77, 'Abertura', '2018-08-20 21:38:14', 'M', 50, NULL, NULL, 98),
(78, 'teste', '2018-08-20 21:46:45', 'Sangria', 10, NULL, NULL, 98),
(79, 'Abertura', '2018-08-20 21:47:26', 'M', 100, NULL, NULL, 99),
(80, 'Abertura Teste', '2018-08-20 21:49:31', 'Abertura', 100, NULL, NULL, 100),
(81, '100', '2018-08-20 21:53:07', 'Sangria', 100, NULL, NULL, 100),
(82, '20', '2018-08-20 21:59:36', 'Sangria', 20, NULL, NULL, 100),
(83, '20', '2018-08-20 22:00:27', 'Sangria', 20, NULL, NULL, 100),
(84, '20', '2018-08-20 22:00:40', 'Sangria', 20, NULL, NULL, 100),
(85, '20', '2018-08-20 22:01:33', 'Sangria', 20, NULL, NULL, 100),
(86, '20', '2018-08-20 22:03:36', 'Sangria', 20, NULL, NULL, 100),
(87, '10', '2018-08-20 22:03:51', 'Sangria', 10, NULL, NULL, 100),
(88, '10', '2018-08-20 22:04:25', 'Sangria', 10, NULL, NULL, 100),
(89, '10', '2018-08-20 22:05:10', 'Sangria', 10, NULL, NULL, 100),
(90, '50', '2018-08-20 22:06:15', 'Sangria', 50, NULL, NULL, 100),
(91, '50', '2018-08-20 22:06:41', 'Sangria', 50, NULL, NULL, 100),
(92, '10', '2018-08-20 22:14:29', 'Sangria', 10, NULL, NULL, 100),
(93, '10', '2018-08-20 22:14:56', 'Sangria', 10, NULL, NULL, 100),
(94, '10', '2018-08-20 22:15:02', 'Sangria', 10, NULL, NULL, 100),
(95, '10', '2018-08-20 22:15:56', 'Sangria', 10, NULL, NULL, 100),
(96, '10', '2018-08-20 22:17:21', 'Sangria', 10, NULL, NULL, 100),
(97, '10', '2018-08-20 22:17:35', 'Sangria', 10, NULL, NULL, 100),
(98, '10', '2018-08-20 22:17:38', 'Sangria', 10, NULL, NULL, 100),
(99, '10', '2018-08-20 22:17:40', 'Sangria', 10, NULL, NULL, 100),
(100, '10', '2018-08-20 22:17:44', 'Sangria', 10, NULL, NULL, 100),
(101, '50', '2018-08-20 22:17:58', 'Sangria', 50, NULL, NULL, 100),
(102, '50', '2018-08-20 22:18:06', 'Sangria', 50, NULL, NULL, 100),
(103, '', '2018-08-20 22:18:29', 'Abertura', 200, NULL, NULL, 101),
(104, '50', '2018-08-20 22:18:40', 'Sangria', 50, NULL, NULL, 101),
(105, '', '2018-08-20 22:19:18', 'Pagamento', 50, 97, 0, 101),
(106, '20', '2018-08-20 22:20:58', 'Sangria', 20, 0, 0, 101),
(107, 'teste', '2018-08-20 22:21:30', 'Abertura', 100, 0, 0, 102),
(108, '20', '2018-08-20 22:21:47', 'Sangria', 20, 0, 0, 102),
(109, 'teste pagamento', '2018-08-20 22:22:11', 'Pagamento', 30, 98, 0, 102);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `idpagamento` int(11) NOT NULL,
  `data` date NOT NULL,
  `valor` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `valorTotal` float NOT NULL,
  `idparcelap` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`idpagamento`, `data`, `valor`, `valorTotal`, `idparcelap`) VALUES
(1, '2018-07-11', '100', 100, 22),
(2, '2018-07-11', '100', 100, 22),
(8, '2018-08-20', '100', 100, 30),
(9, '2018-08-20', '15', 15, 31),
(13, '2018-08-20', '15', 15, 31),
(21, '2018-08-20', '15', 15, 31),
(22, '2018-08-20', '100', 100, 30),
(23, '2018-08-20', '50', 50, 35),
(24, '2018-08-20', '15', 15, 31),
(25, '2018-08-20', '100', 100, 27),
(26, '2018-08-20', '15', 15, 31),
(28, '2018-08-20', '15', 15, 31),
(29, '2018-08-20', '10', 10, 30),
(30, '2018-08-20', '50', 50, 25),
(33, '2018-08-20', '20', 20, 30),
(51, '2018-08-20', '10', 10, 30),
(52, '2018-08-20', '100', 100, NULL),
(53, '2018-08-20', '50', 50, 30),
(60, '2018-08-20', '50', 50, 27),
(61, '2018-08-20', '25', 25, 32),
(66, '2018-08-20', '10', 10, 33),
(67, '2018-08-20', '57', 57, 29),
(68, '2018-08-20', '5', 5, 29),
(79, '2018-08-20', '5', 5, 22),
(81, '2018-08-20', '10', 10, 27),
(82, '2018-08-20', '50', 50, 29),
(83, '2018-08-20', '18', 18, 26),
(84, '2018-08-20', '18', 18, 26),
(85, '2018-08-20', '100', 100, 23),
(86, '2018-08-20', '50', 50, 29),
(93, '2018-08-20', '35', 35, 28),
(94, '2018-08-20', '200', 20, 27),
(95, '2018-08-20', '100', 500, 23),
(96, '2018-08-20', '57', 57, 29),
(97, '2018-08-20', '100', 50, 23),
(98, '2018-08-20', '57', 30, 29);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pais`
--

CREATE TABLE `pais` (
  `idpais` int(11) NOT NULL,
  `nomePais` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigla` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pais`
--

INSERT INTO `pais` (`idpais`, `nomePais`, `sigla`, `status`) VALUES
(1, 'Brasil teste', 'BR', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `parcelapagar`
--

CREATE TABLE `parcelapagar` (
  `idparcela` int(11) NOT NULL,
  `dataVencimento` date NOT NULL,
  `valorParcela` float NOT NULL,
  `valorPago` float DEFAULT NULL,
  `idcontasp` int(11) NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `parcelapagar`
--

INSERT INTO `parcelapagar` (`idparcela`, `dataVencimento`, `valorParcela`, `valorPago`, `idcontasp`, `status`) VALUES
(22, '2018-07-05', 200, NULL, 21, 'Quitada'),
(23, '2018-07-05', 100, NULL, 22, 'pendente'),
(25, '2018-07-06', 100, NULL, 24, 'pendente'),
(26, '2018-07-14', 18, NULL, 25, 'pendente'),
(27, '2018-07-14', 200, NULL, 26, 'pendente'),
(28, '2018-07-14', 35, 0, 27, 'pendente'),
(29, '2018-07-14', 57, NULL, 28, 'pendente'),
(30, '2018-07-14', 100, NULL, 29, 'pendente'),
(31, '2018-07-14', 15, NULL, 30, 'pendente'),
(32, '2018-07-14', 25, NULL, 31, 'pendente'),
(33, '2018-07-28', 500, NULL, 32, 'pendente'),
(34, '2018-08-25', 100, NULL, 33, 'pendente'),
(35, '2018-08-25', 50, NULL, 34, 'Quitada'),
(36, '2018-08-26', 4, NULL, 35, 'Quitada'),
(37, '2018-08-22', 200, 0, 21, 'Quitada'),
(38, '2018-08-22', 200, 0, 21, 'Quitada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parcelareceber`
--

CREATE TABLE `parcelareceber` (
  `idparcela` int(11) NOT NULL,
  `dataVencimento` date NOT NULL,
  `valorParcela` float NOT NULL,
  `valorRecebido` float DEFAULT NULL,
  `idcontasr` int(11) NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `parcelareceber`
--

INSERT INTO `parcelareceber` (`idparcela`, `dataVencimento`, `valorParcela`, `valorRecebido`, `idcontasr`, `status`) VALUES
(410, '2018-09-20', 20, NULL, 403, 'Pendente'),
(411, '2018-10-20', 20, NULL, 403, 'Pendente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `status` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dataCadastro` date NOT NULL,
  `codigo` int(11) NOT NULL,
  `idcategoria` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idproduto`, `modelo`, `cor`, `material`, `unidadeMedida`, `quantidade`, `preco`, `custo`, `status`, `dataCadastro`, `codigo`, `idcategoria`) VALUES
(27, 'Com bordas redondas', 'Azul escuro', 'Plastico', '1.20x240', 1, 10, 0, 'Ativo', '2018-05-17', 38, 33);

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
  `idparcela` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `recebimento`
--

INSERT INTO `recebimento` (`idrecebimento`, `data`, `valor`, `juros`, `multa`, `valorTotal`, `idparcela`) VALUES
(1, '2018-07-09', 100, 0, 0, 100, 2),
(100, '2018-07-09', 100, 0, 0, 100, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'lucas ', 'lucas.andrade@edu.unipar.br', '$2y$10$qGkexmF9dSh6IXOtwXnu3u/VLt3gJhdr4.tGycaQiRfSXEySaHsNy', 'KkFwBlg4LRYEztkQn063AcrE1EgzdylXmxImy9ICgvoBUo2sVTNMBYi2sstU', '2018-05-16 17:39:16', '2018-07-25 20:27:54'),
(2, 'Luis', 'luis.caobianco@gmail.com', '$2y$10$jPbEfdRsuKx1WklJbiCCRO1mTeA0dsB0gaStOEohViNODl7jY9yse', 'T2SaqeZxPuYtvPYLUqEP7rh2122WVZRhSqj8QnXRjJcqTra3dHaEAaNNkp0z', '2018-05-18 22:42:56', '2018-06-14 23:21:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `idvenda` int(11) NOT NULL,
  `dataVenda` date NOT NULL,
  `valorTotal` float DEFAULT NULL,
  `desconto` float DEFAULT NULL,
  `condicaoPagamento` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `formaPagamento` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origemVenda` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numeroDeParcelas` int(11) DEFAULT NULL,
  `idcliente` int(11) NOT NULL,
  `idfuncionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`idvenda`, `dataVenda`, `valorTotal`, `desconto`, `condicaoPagamento`, `formaPagamento`, `status`, `origemVenda`, `numeroDeParcelas`, `idcliente`, `idfuncionario`) VALUES
(234, '2018-06-28', 50, NULL, 'Avista', 'Dinheiro', 'Fechada', 'Balcao', 1, 1, 1),
(235, '2018-07-02', 20, NULL, NULL, NULL, 'Fechada', 'Orçamento', 1, 1, 1),
(236, '2018-07-26', 10, NULL, NULL, NULL, 'Aberta', 'Orçamento', NULL, 1, 1),
(237, '2018-08-20', 20, NULL, 'Avista', 'Cartão', 'Fechada', 'Balcao', 2, 1, 1),
(239, '2018-08-20', 40, NULL, 'Avista', 'Dinheiro', 'Fechada', 'Balcao', 2, 1, 6);

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
  ADD PRIMARY KEY (`idcaixa`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indexes for table `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`idcidade`),
  ADD UNIQUE KEY `nomeCidade` (`nomeCidade`),
  ADD KEY `fk_cidade_estado1_idx` (`idestado`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `rg` (`rg`),
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
  ADD UNIQUE KEY `nomeEstado` (`nomeEstado`),
  ADD KEY `fk_estado_pais_idx` (`idpais`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`idfornecedor`),
  ADD UNIQUE KEY `cnpj` (`cnpj`),
  ADD UNIQUE KEY `razaoSocial` (`razaoSocial`),
  ADD UNIQUE KEY `inscricaoEstadual` (`inscricaoEstadual`),
  ADD KEY `fk_fornecedor_cidade1_idx` (`idcidade`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idfuncionario`),
  ADD UNIQUE KEY `rg` (`rg`),
  ADD UNIQUE KEY `cpf` (`cpf`),
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
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movimentacaocaixa`
--
ALTER TABLE `movimentacaocaixa`
  ADD PRIMARY KEY (`idmovimentacao`),
  ADD KEY `fk_movimentacaoCaixa_pagamento1_idx` (`idpagamento`),
  ADD KEY `fk_movimentacaoCaixa_recebimento1_idx` (`idrecebimento`),
  ADD KEY `fk_movimentacaoCaixa_caixa1_idx` (`idcaixa`);

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
  ADD PRIMARY KEY (`idpais`),
  ADD UNIQUE KEY `nomePais` (`nomePais`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idproduto`),
  ADD UNIQUE KEY `modelo` (`modelo`),
  ADD KEY `codigo` (`codigo`),
  ADD KEY `idcategoria` (`idcategoria`);

--
-- Indexes for table `recebimento`
--
ALTER TABLE `recebimento`
  ADD PRIMARY KEY (`idrecebimento`),
  ADD KEY `fk_recebimento_parcelaReceber1_idx` (`idparcela`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`idvenda`),
  ADD KEY `fk_venda_cliente1_idx` (`idcliente`),
  ADD KEY `idfuncionario` (`idfuncionario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `idagendamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `caixa`
--
ALTER TABLE `caixa`
  MODIFY `idcaixa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `cidade`
--
ALTER TABLE `cidade`
  MODIFY `idcidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `compra`
--
ALTER TABLE `compra`
  MODIFY `idcompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `contaspagar`
--
ALTER TABLE `contaspagar`
  MODIFY `idcontasp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `contasreceber`
--
ALTER TABLE `contasreceber`
  MODIFY `idcontasr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=404;
--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `idestado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `idfornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idfuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `itensc`
--
ALTER TABLE `itensc`
  MODIFY `iditensc` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `itensp`
--
ALTER TABLE `itensp`
  MODIFY `iditens` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `itensv`
--
ALTER TABLE `itensv`
  MODIFY `iditensv` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=770;
--
-- AUTO_INCREMENT for table `marca`
--
ALTER TABLE `marca`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `movimentacaocaixa`
--
ALTER TABLE `movimentacaocaixa`
  MODIFY `idmovimentacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `idpagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `pais`
--
ALTER TABLE `pais`
  MODIFY `idpais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `parcelapagar`
--
ALTER TABLE `parcelapagar`
  MODIFY `idparcela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `parcelareceber`
--
ALTER TABLE `parcelareceber`
  MODIFY `idparcela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=412;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `idproduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `recebimento`
--
ALTER TABLE `recebimento`
  MODIFY `idrecebimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `idvenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;
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
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `idestado` FOREIGN KEY (`idestado`) REFERENCES `estado` (`idestado`);

--
-- Limitadores para a tabela `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `idfornecedor` FOREIGN KEY (`idfornecedor`) REFERENCES `fornecedor` (`idfornecedor`),
  ADD CONSTRAINT `idfuncionario` FOREIGN KEY (`idfuncionario`) REFERENCES `funcionario` (`idfuncionario`);

--
-- Limitadores para a tabela `contaspagar`
--
ALTER TABLE `contaspagar`
  ADD CONSTRAINT `contaspagar_ibfk_1` FOREIGN KEY (`idfornecedor`) REFERENCES `fornecedor` (`idfornecedor`);

--
-- Limitadores para a tabela `contasreceber`
--
ALTER TABLE `contasreceber`
  ADD CONSTRAINT `contasreceber_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`);

--
-- Limitadores para a tabela `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `estado_ibfk_1` FOREIGN KEY (`idpais`) REFERENCES `pais` (`idpais`);

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `idcidade` FOREIGN KEY (`idcidade`) REFERENCES `cidade` (`idcidade`);

--
-- Limitadores para a tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `pagamento_ibfk_1` FOREIGN KEY (`idparcelap`) REFERENCES `parcelapagar` (`idparcela`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `codigo` FOREIGN KEY (`codigo`) REFERENCES `marca` (`codigo`),
  ADD CONSTRAINT `idcategoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`);

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `idcliente` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`),
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`idfuncionario`) REFERENCES `funcionario` (`idfuncionario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
