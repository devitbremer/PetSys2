-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13-Abr-2016 às 14:27
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `animal`
--

CREATE TABLE `animal` (
  `id_animal` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `id_tipo` int(3) DEFAULT NULL,
  `id_raca` int(3) DEFAULT NULL,
  `peso` int(3) DEFAULT NULL,
  `id_tutor` int(3) DEFAULT NULL,
  `sexo` varchar(255) DEFAULT NULL,
  `nascimento` varchar(10) DEFAULT NULL,
  `raca` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `animal`
--

INSERT INTO `animal` (`id_animal`, `nome`, `id_tipo`, `id_raca`, `peso`, `id_tutor`, `sexo`, `nascimento`, `raca`) VALUES
(1, 'cafu', 1, NULL, 50, 1, 'Masculino', '', 'viralata');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cpf` int(13) DEFAULT NULL,
  `nasc_data` date DEFAULT NULL,
  `id_endereco` int(3) DEFAULT NULL,
  `id_contato` int(3) DEFAULT NULL,
  `sexo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `cpf`, `nasc_data`, `id_endereco`, `id_contato`, `sexo`) VALUES
(1, 'joab bremer', 2147483647, '0000-00-00', 1, 1, 'Masculino'),
(2, 'joab bremer', 12345, '0000-00-00', 2, 2, 'Masculino'),
(3, 'eneias', 54321, '0000-00-00', 3, 3, 'Masculino');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `id_contato` int(11) NOT NULL,
  `tipo` int(3) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id_contato`, `tipo`, `telefone`) VALUES
(1, 0, '96447503'),
(2, 2, '96447503'),
(3, 0, '32263636');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL,
  `nome_rua` varchar(255) DEFAULT NULL,
  `numero` int(8) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `cep` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `nome_rua`, `numero`, `bairro`, `cidade`, `estado`, `cep`) VALUES
(1, 'Rua argeli', 85, 'centenario', 'curitiba', 'PR', 82960200),
(2, 'Rua visconde', 85, 'cajuru', 'curitiba', 'PR', 82960200),
(3, 'Rua algsto', 125, 'cajuru', 'curitba', '', 82960200);

-- --------------------------------------------------------

--
-- Estrutura da tabela `forma_pg`
--

CREATE TABLE `forma_pg` (
  `id_forma_pg` int(11) NOT NULL,
  `tipo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `forma_pg`
--

INSERT INTO `forma_pg` (`id_forma_pg`, `tipo`) VALUES
(1, 'Dinheiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_venda`
--

CREATE TABLE `itens_venda` (
  `id_itens_venda` int(11) NOT NULL,
  `id_venda` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `quantidade_produto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `itens_venda`
--

INSERT INTO `itens_venda` (`id_itens_venda`, `id_venda`, `id_produto`, `quantidade_produto`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `nome_produto` varchar(255) DEFAULT NULL,
  `codigo_barra` int(11) DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `quantidade` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome_produto`, `codigo_barra`, `preco`, `quantidade`) VALUES
(1, 'sifles', 54321, 15, 12),
(2, 'hiper', 123, 4, 10),
(3, 'shita', 123, 14, 10),
(4, 'shita', 123, 14, 10),
(5, 'Sampoo', 123456, 10, 10),
(6, 'Sampoo', 12345, 10, 50),
(7, '', 125, 50, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `id_servico` int(11) NOT NULL,
  `nome_servico` varchar(255) DEFAULT NULL,
  `preco` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tel_tipo`
--

CREATE TABLE `tel_tipo` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tel_tipo`
--

INSERT INTO `tel_tipo` (`id_tipo`, `tipo`) VALUES
(1, 'Residencial'),
(2, 'Celular');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_animal`
--

CREATE TABLE `tipo_animal` (
  `id_tipo_animal` int(11) NOT NULL,
  `tipo_animal_nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vaccina`
--

CREATE TABLE `vaccina` (
  `id_vaccina` int(11) NOT NULL,
  `id_protudo` int(3) DEFAULT NULL,
  `data_aplicacao` date DEFAULT NULL,
  `id_animal` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id_venda` int(11) NOT NULL,
  `id_forma_pg` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `data_venda` varchar(10) DEFAULT NULL,
  `data_vencimento` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`id_venda`, `id_forma_pg`, `id_cliente`, `data_venda`, `data_vencimento`) VALUES
(1, 1, 1, '04/12/2016', '04/20/2016');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id_animal`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id_contato`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`);

--
-- Indexes for table `forma_pg`
--
ALTER TABLE `forma_pg`
  ADD PRIMARY KEY (`id_forma_pg`);

--
-- Indexes for table `itens_venda`
--
ALTER TABLE `itens_venda`
  ADD PRIMARY KEY (`id_itens_venda`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- Indexes for table `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id_servico`);

--
-- Indexes for table `tel_tipo`
--
ALTER TABLE `tel_tipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indexes for table `tipo_animal`
--
ALTER TABLE `tipo_animal`
  ADD PRIMARY KEY (`id_tipo_animal`);

--
-- Indexes for table `vaccina`
--
ALTER TABLE `vaccina`
  ADD PRIMARY KEY (`id_vaccina`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id_venda`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `id_animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `id_contato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `forma_pg`
--
ALTER TABLE `forma_pg`
  MODIFY `id_forma_pg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `itens_venda`
--
ALTER TABLE `itens_venda`
  MODIFY `id_itens_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
  MODIFY `id_servico` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tel_tipo`
--
ALTER TABLE `tel_tipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tipo_animal`
--
ALTER TABLE `tipo_animal`
  MODIFY `id_tipo_animal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vaccina`
--
ALTER TABLE `vaccina`
  MODIFY `id_vaccina` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
