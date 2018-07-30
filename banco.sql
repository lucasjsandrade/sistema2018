-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Jul-2018 às 01:37
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
  `data` date NOT NULL,
  `saldoInicial` float NOT NULL,
  `saldoFinal` float DEFAULT NULL,
  `diferenca` float DEFAULT NULL,
  `situacao` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idmovimentacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `caixa`
--

INSERT INTO `caixa` (`idcaixa`, `data`, `saldoInicial`, `saldoFinal`, `diferenca`, `situacao`, `idmovimentacao`) VALUES
(1, '2018-07-09', 50, 150, NULL, 'Fechado', 1),
(2, '2018-07-09', 50, 150, NULL, 'Fechado', 1),
(15, '2018-07-24', 855, NULL, NULL, 'Aberto', NULL),
(16, '2018-07-25', 2, NULL, NULL, NULL, NULL),
(17, '2018-07-25', 50, NULL, NULL, NULL, NULL),
(18, '2018-07-25', 2, NULL, NULL, NULL, NULL),
(19, '2018-07-25', 100, NULL, NULL, NULL, NULL),
(20, '2018-07-25', 2, NULL, NULL, NULL, NULL);

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
(79, '2018-07-25', 50, 'Avista', 'Dinheiro', 'Fechado', 1, 17, 1);

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
(34, '2018-07-25', 50, 'Gerado Pela compra!', 79, 17, 1);

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
(98, '2018-05-22', 500, 'Gerado Pela Venda!', 182, 1, 1),
(99, '2018-05-27', 120, 'Gerado Pelo Orçamento!', 187, 1, 1),
(110, '2018-05-28', 150, 'Gerado Pelo Orçamento!', 189, 1, 1),
(113, '2018-05-28', 10, 'Gerado Pelo Orçamento!', 190, 1, 1),
(114, '2018-05-28', 1500, 'Gerado Pela Venda!', 192, 1, 1),
(116, '2018-05-28', 500, 'Gerado Pela Venda!', 194, 1, 1),
(117, '2018-05-28', 500, 'Gerado Pelo Orçamento!', 195, 1, 1),
(118, '2018-05-28', 50, 'Gerado Pela Venda!', 197, 1, 1),
(119, '2018-05-28', 100, 'Gerado Pela Venda!', 198, 1, 1),
(120, '2018-05-28', 500, 'Gerado Pelo Orçamento!', 196, 1, 1),
(121, '2018-05-28', 500, 'Gerado Pelo Orçamento!', 199, 1, 1),
(122, '2018-05-28', 400, 'Gerado Pelo Orçamento!', 200, 1, 1),
(123, '2018-05-28', 120, 'Gerado Pelo Orçamento!', 201, 1, 1),
(137, '2018-05-29', 20, 'Gerado Pelo Orçamento!', 202, 1, 1),
(138, '2018-05-29', 50, 'Gerado Pelo Orçamento!', 203, 1, 1),
(142, '2018-05-29', 4050, 'Gerado Pelo Orçamento!', 204, 1, 1),
(168, '2018-05-29', 600, 'Gerado Pelo Orçamento!', 205, 1, 1),
(169, '2018-05-29', 140, 'Gerado Pelo Orçamento!', 206, 1, 1),
(175, '2018-05-29', 620, 'Gerado Pelo Orçamento!', 209, 1, 1),
(176, '2018-05-29', 650, 'Gerado Pelo Orçamento!', 208, 1, 1),
(177, '2018-05-29', 650, 'Gerado Pelo Orçamento!', 207, 1, 1),
(178, '2018-05-29', 150, 'Gerado Pelo Orçamento!', 210, 1, 1),
(179, '2018-05-29', 850, 'Gerado Pelo Orçamento!', 211, 1, 1),
(180, '2018-06-03', 40, 'Gerado Pela Venda!', 212, 1, 1),
(181, '2018-06-03', 40, 'Gerado Pela Venda!', 214, 1, 1),
(182, '2018-06-03', 160, 'Gerado Pelo Orçamento!', 213, 1, 1),
(204, '2018-06-03', 10, 'Gerado Pelo Orçamento!', 216, 1, 1),
(211, '2018-06-04', 350, 'Gerado Pelo Orçamento!', 215, 1, 1),
(214, '2018-06-04', 250, 'Gerado Pelo Orçamento!', 217, 1, 1),
(215, '2018-06-04', 0, 'Gerado Pelo Orçamento!', 217, 1, 1),
(217, '2018-06-04', 300, 'Gerado Pelo Orçamento!', 217, 1, 1),
(218, '2018-06-04', 0, 'Gerado Pelo Orçamento!', 218, 1, 1),
(220, '2018-06-04', 170, 'Gerado Pelo Orçamento!', 219, 1, 1),
(221, '2018-06-04', 594, 'Gerado Pelo Orçamento!', 220, 1, 1),
(222, '2018-06-05', 20, 'Gerado Pela Venda!', 221, 1, 1),
(256, '2018-06-05', 90, 'Gerado Pelo Orçamento!', 222, 1, 1),
(267, '2018-06-05', 230, 'Gerado Pelo Orçamento!', 222, 1, 1),
(381, '2018-06-06', 40, 'Gerado Pelo Orçamento!', 223, 1, 1),
(384, '2018-06-07', 2280, 'Gerado Pelo Orçamento!', 224, 1, 1),
(386, '2018-06-14', 0, 'Gerado Pelo Orçamento!', 226, 1, 1),
(388, '2018-06-14', 30, 'Gerado Pelo Orçamento!', 227, 1, 1),
(390, '2018-06-14', 270, 'Gerado Pelo Orçamento!', 229, 1, 1),
(392, '2018-06-14', 50, 'Gerado Pela Venda!', 232, 1, 1),
(397, '2018-06-14', 110, 'Gerado Pelo Orçamento!', 231, 1, 1),
(398, '2018-06-28', 10, 'Gerado Pela Venda!', 233, 28, 1),
(399, '2018-06-28', 50, 'Gerado Pela Venda!', 234, 1, 1),
(400, '2018-07-02', 20, 'Gerado Pelo Orçamento!', 235, 1, 1);

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
(46, 1, 50, 50, 79, 27, NULL);

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
(766, 2, 10, 20, 10, 235, 27, 'orcamento', 10, NULL);

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
  `descricao` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `tipoMovimentacao` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` float NOT NULL,
  `idpagamento` int(11) DEFAULT NULL,
  `idrecebimento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `movimentacaocaixa`
--

INSERT INTO `movimentacaocaixa` (`idmovimentacao`, `descricao`, `data`, `tipoMovimentacao`, `valor`, `idpagamento`, `idrecebimento`) VALUES
(1, 'teste', '2018-07-09', 'A', 100, 0, 1);

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

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`idpagamento`, `data`, `valor`, `juros`, `multa`, `valorTotal`, `idparcelap`) VALUES
(1, '2018-07-11', 100, 0, 0, 100, 22),
(2, '2018-07-11', 100, 0, 0, 100, 22);

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
  `idcontasp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `parcelapagar`
--

INSERT INTO `parcelapagar` (`idparcela`, `dataVencimento`, `valorParcela`, `valorPago`, `idcontasp`) VALUES
(22, '2018-07-05', 200, NULL, 21),
(23, '2018-07-05', 100, NULL, 22),
(25, '2018-07-06', 100, NULL, 24),
(26, '2018-07-14', 18, NULL, 25),
(27, '2018-07-14', 200, NULL, 26),
(28, '2018-07-14', 35, NULL, 27),
(29, '2018-07-14', 57, NULL, 28),
(30, '2018-07-14', 100, NULL, 29),
(31, '2018-07-14', 15, NULL, 30),
(32, '2018-07-14', 25, NULL, 31),
(33, '2018-07-28', 500, NULL, 32),
(34, '2018-08-25', 100, NULL, 33),
(35, '2018-08-25', 50, NULL, 34);

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
(229, '2018-07-05', 20, NULL, 222),
(263, '2018-07-05', 90, NULL, 256),
(274, '2018-07-05', 230, NULL, 267),
(388, '2018-07-06', 40, NULL, 381),
(391, '2018-07-07', 2280, NULL, 384),
(393, '2018-07-14', 0, NULL, 386),
(395, '2018-07-14', 30, NULL, 388),
(397, '2018-07-14', 270, NULL, 390),
(399, '2018-07-14', 50, NULL, 392),
(404, '2018-07-14', 110, NULL, 397),
(405, '2018-07-28', 10, NULL, 398),
(406, '2018-07-28', 50, NULL, 399),
(407, '2018-08-02', 20, NULL, 400);

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
(27, 'Com bordas redondas', 'Azul escuro', 'Plastico', '1.20x240', 5, 10, 0, 'Ativo', '2018-05-17', 38, 33);

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
(235, '2018-07-02', 20, NULL, NULL, NULL, 'Fechada', 'Orçamento', 1, 1, 1);

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
  ADD KEY `fk_caixa_movimentacaoCaixa1_idx` (`idmovimentacao`);

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
  ADD KEY `fk_movimentacaoCaixa_recebimento1_idx` (`idrecebimento`);

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
  MODIFY `idcaixa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
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
  MODIFY `idcompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `contaspagar`
--
ALTER TABLE `contaspagar`
  MODIFY `idcontasp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `contasreceber`
--
ALTER TABLE `contasreceber`
  MODIFY `idcontasr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=401;
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
  MODIFY `iditensc` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `itensp`
--
ALTER TABLE `itensp`
  MODIFY `iditens` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `itensv`
--
ALTER TABLE `itensv`
  MODIFY `iditensv` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=767;
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
  MODIFY `idmovimentacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `idpagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pais`
--
ALTER TABLE `pais`
  MODIFY `idpais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `parcelapagar`
--
ALTER TABLE `parcelapagar`
  MODIFY `idparcela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `parcelareceber`
--
ALTER TABLE `parcelareceber`
  MODIFY `idparcela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=408;
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
  MODIFY `idvenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;
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
  ADD CONSTRAINT `fk_caixa_movimentacaoCaixa1` FOREIGN KEY (`idmovimentacao`) REFERENCES `movimentacaocaixa` (`idmovimentacao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Limitadores para a tabela `movimentacaocaixa`
--
ALTER TABLE `movimentacaocaixa`
  ADD CONSTRAINT `movimentacaocaixa_ibfk_1` FOREIGN KEY (`idrecebimento`) REFERENCES `recebimento` (`idrecebimento`);

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
