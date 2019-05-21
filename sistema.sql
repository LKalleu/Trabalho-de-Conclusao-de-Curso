-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 21-Maio-2019 às 18:18
-- Versão do servidor: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `devedor`
--

CREATE TABLE `devedor` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `contato` varchar(45) NOT NULL,
  `rua` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `numeracao` varchar(45) NOT NULL,
  `cep` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `devedor`
--

INSERT INTO `devedor` (`id`, `nome`, `email`, `senha`, `contato`, `rua`, `bairro`, `numeracao`, `cep`) VALUES
(1, '   Lucas Kalleu da Silva Nery   ', '   kalleu@gmail.com   ', 'a321', '   (96) 9 9131-1547   ', '   Av.Almirante Barroso   ', '   Alvorada   ', '   3003   ', '   68906535'),
(2, ' Ana Paula da Silva Campos ', ' anapaula@gmail.com ', '321a', ' (96) 9 9129-1172 ', ' Av.Almirante Barroso ', ' Santa Rita ', ' 3003 ', ' 68906535');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `idFornecedor` int(5) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contato` varchar(14) NOT NULL,
  `cpf` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`idFornecedor`, `nome`, `email`, `contato`, `cpf`) VALUES
(1, 'José Henrique', 'joseh@gmail.com', '(96) 991472928', '55555555555');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `idHistorico` int(5) NOT NULL,
  `dataRecebimento` varchar(10) NOT NULL,
  `fornecedor` int(5) NOT NULL,
  `produtos` int(5) NOT NULL,
  `quantidade` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`idHistorico`, `dataRecebimento`, `fornecedor`, `produtos`, `quantidade`) VALUES
(1, '21/05/2019', 1, 2, '21'),
(2, '22/05/2019', 1, 1, '102');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itensdevedor`
--

CREATE TABLE `itensdevedor` (
  `idItensDevedor` int(5) NOT NULL,
  `devedor` int(5) NOT NULL,
  `produtos` int(5) NOT NULL,
  `dataCompra` date NOT NULL,
  `quantidade` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idProduto` int(5) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `tipo` int(5) NOT NULL,
  `preco` varchar(45) NOT NULL,
  `marca` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `nome`, `tipo`, `preco`, `marca`) VALUES
(1, 'Coca-Cola 1L', 1, '7,00', 'Coca-Cola'),
(2, 'Biscoito Negresco', 2, '2,50', 'Nestlé');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoproduto`
--

CREATE TABLE `tipoproduto` (
  `idTipoProduto` int(5) NOT NULL,
  `descricao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipoproduto`
--

INSERT INTO `tipoproduto` (`idTipoProduto`, `descricao`) VALUES
(1, 'Líquido'),
(2, 'Comestível'),
(3, 'Sem Marca'),
(4, 'Objeto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idTipoUsuario` int(5) NOT NULL,
  `descricao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipousuario`
--

INSERT INTO `tipousuario` (`idTipoUsuario`, `descricao`) VALUES
(1, 'administrador'),
(2, 'funcionario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(5) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `tipoUsuario` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `devedor`
--
ALTER TABLE `devedor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`idFornecedor`);

--
-- Indexes for table `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`idHistorico`),
  ADD KEY `fornecedor` (`fornecedor`),
  ADD KEY `produtos` (`produtos`);

--
-- Indexes for table `itensdevedor`
--
ALTER TABLE `itensdevedor`
  ADD PRIMARY KEY (`idItensDevedor`),
  ADD KEY `produtos` (`produtos`),
  ADD KEY `devedor` (`devedor`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`),
  ADD KEY `tipo` (`tipo`);

--
-- Indexes for table `tipoproduto`
--
ALTER TABLE `tipoproduto`
  ADD PRIMARY KEY (`idTipoProduto`);

--
-- Indexes for table `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idTipoUsuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `tipoUsuario` (`tipoUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `devedor`
--
ALTER TABLE `devedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `idFornecedor` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `historico`
--
ALTER TABLE `historico`
  MODIFY `idHistorico` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `itensdevedor`
--
ALTER TABLE `itensdevedor`
  MODIFY `idItensDevedor` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tipoproduto`
--
ALTER TABLE `tipoproduto`
  MODIFY `idTipoProduto` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idTipoUsuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(5) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `historico_ibfk_1` FOREIGN KEY (`fornecedor`) REFERENCES `fornecedor` (`idFornecedor`),
  ADD CONSTRAINT `historico_ibfk_2` FOREIGN KEY (`produtos`) REFERENCES `produto` (`idProduto`);

--
-- Limitadores para a tabela `itensdevedor`
--
ALTER TABLE `itensdevedor`
  ADD CONSTRAINT `itensdevedor_ibfk_1` FOREIGN KEY (`produtos`) REFERENCES `produto` (`idProduto`),
  ADD CONSTRAINT `itensdevedor_ibfk_2` FOREIGN KEY (`devedor`) REFERENCES `devedor` (`id`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipoproduto` (`idTipoProduto`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tipoUsuario`) REFERENCES `tipousuario` (`idTipoUsuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
