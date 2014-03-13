-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27
-- Versão do PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `estoque`
--
CREATE DATABASE `estoque` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `estoque`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradores`
--

CREATE TABLE IF NOT EXISTS `administradores` (
  `id_administrador` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_administrador`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `administradores`
--

INSERT INTO `administradores` (`id_administrador`, `nome`, `email`, `telefone`, `login`, `senha`, `ativo`) VALUES
(13, 'Tiago', 'tiago@sistema.com.br', '(85) 8899-7766', 'tiago', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(150) NOT NULL,
  `end_cliente` int(11) NOT NULL,
  `tel_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE IF NOT EXISTS `fornecedores` (
  `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `fornecedor` varchar(150) NOT NULL,
  `end_fornecedor` varchar(150) NOT NULL,
  `cnpj_cpf` varchar(150) NOT NULL,
  `cid_fornecedor` varchar(150) NOT NULL,
  `bair_fornecedor` varchar(150) NOT NULL,
  `cep_fornecedor` varchar(150) NOT NULL,
  `tel_fornecedor` varchar(150) NOT NULL,
  `email_fornecedor` varchar(150) NOT NULL,
  PRIMARY KEY (`id_fornecedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id_fornecedor`, `fornecedor`, `end_fornecedor`, `cnpj_cpf`, `cid_fornecedor`, `bair_fornecedor`, `cep_fornecedor`, `tel_fornecedor`, `email_fornecedor`) VALUES
(1, 'Carmehil', 'Av. AntÃ´nio Sales, 3243', '10.232.432/0001-34', 'caucaia', 'Aldeota', '60135-203', '(85) 3031-8888', 'contato@carmehil.com.br');

-- --------------------------------------------------------

--
-- Estrutura da tabela `precos`
--

CREATE TABLE IF NOT EXISTS `precos` (
  `id_precos` int(11) NOT NULL AUTO_INCREMENT,
  `fornecedores_idFornecedor` int(11) NOT NULL,
  `produtos_idProduto` int(11) NOT NULL,
  `preco_compra` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_precos`),
  KEY `fk_precos_fornecedores1_idx` (`fornecedores_idFornecedor`),
  KEY `fk_precos_produtos1_idx` (`produtos_idProduto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `produto` varchar(150) NOT NULL,
  `marca` varchar(150) NOT NULL,
  `modelo` varchar(150) NOT NULL,
  `lote` varchar(150) NOT NULL,
  `cod_bar` varchar(150) NOT NULL,
  `validade` date NOT NULL,
  `id_fornecedor` varchar(150) NOT NULL,
  `preco_compra` varchar(150) NOT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `produto`, `marca`, `modelo`, `lote`, `cod_bar`, `validade`, `id_fornecedor`, `preco_compra`) VALUES
(1, 'caneta esferografica', 'compaqtor 07', 'preta', '87r', '7894000050027', '2014-12-15', '1', '1,5');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE IF NOT EXISTS `vendas` (
  `id_venda` int(11) NOT NULL AUTO_INCREMENT,
  `produtos_idProduto` int(11) NOT NULL,
  `clientes_idCliente` int(11) NOT NULL,
  `preco_venda` int(11) NOT NULL,
  PRIMARY KEY (`id_venda`),
  KEY `fk_vendas_produtos_idx` (`produtos_idProduto`),
  KEY `fk_vendas_clientes1_idx` (`clientes_idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `precos`
--
ALTER TABLE `precos`
  ADD CONSTRAINT `fk_precos_fornecedores1` FOREIGN KEY (`fornecedores_idFornecedor`) REFERENCES `fornecedores` (`id_fornecedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_precos_produtos1` FOREIGN KEY (`produtos_idProduto`) REFERENCES `produtos` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `fk_vendas_clientes1` FOREIGN KEY (`clientes_idCliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vendas_produtos` FOREIGN KEY (`produtos_idProduto`) REFERENCES `produtos` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
