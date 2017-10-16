-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 16-Out-2017 às 03:36
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skypainel_controle`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('40cd2884b5e9e0ff92a4b0e5c20016ab', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1508116826, 'a:5:{s:9:\"user_data\";s:0:\"\";s:6:\"idUser\";s:1:\"1\";s:9:\"permissao\";s:1:\"1\";s:10:\"email_user\";s:22:\"edsonrcoosta@gmail.com\";s:6:\"logado\";b:1;}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_clientes` int(11) NOT NULL,
  `id_responsavel` int(11) DEFAULT NULL,
  `razao_social_cliente` varchar(200) DEFAULT NULL,
  `nome_fantasia_cliente` varchar(200) DEFAULT NULL,
  `pessoa_cliente` enum('fisica','juridica') DEFAULT NULL,
  `cnpj_cpf` varchar(50) DEFAULT NULL,
  `telefone_cliente` varchar(30) DEFAULT NULL,
  `ie_cliente` varchar(80) DEFAULT NULL,
  `tipo_ie_cliente` varchar(200) DEFAULT NULL,
  `im_cliente` varchar(80) DEFAULT NULL,
  `cnae_cliente` varchar(80) DEFAULT NULL,
  `cep_cliente` varchar(10) DEFAULT NULL,
  `endereco_cliente` varchar(200) DEFAULT NULL,
  `numero_cliente` varchar(20) DEFAULT NULL,
  `bairro_cliente` varchar(200) DEFAULT NULL,
  `cidade_cliente` varchar(200) DEFAULT NULL,
  `uf_cliente` varchar(80) DEFAULT NULL,
  `pais_cliente` varchar(80) DEFAULT NULL,
  `codigo_pais` varchar(20) DEFAULT NULL,
  `codigo_cidade_cliente` varchar(20) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_modificado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_clientes`, `id_responsavel`, `razao_social_cliente`, `nome_fantasia_cliente`, `pessoa_cliente`, `cnpj_cpf`, `telefone_cliente`, `ie_cliente`, `tipo_ie_cliente`, `im_cliente`, `cnae_cliente`, `cep_cliente`, `endereco_cliente`, `numero_cliente`, `bairro_cliente`, `cidade_cliente`, `uf_cliente`, `pais_cliente`, `codigo_pais`, `codigo_cidade_cliente`, `data_cadastro`, `data_modificado`) VALUES
(1, 1, 'Edson Costa Serviços', 'ECS WEB', 'fisica', '          ', '(11) 4161-0600', '46547651654', '2', '4415165', '554665', '06416-020', 'Rua Maria de Fátima Vaz', '23', 'Vila Engenho Novo', NULL, 'SP', 'Brasil', '0', '0', '2017-10-14 16:29:45', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `config_sistema`
--

CREATE TABLE `config_sistema` (
  `idConfig` int(11) NOT NULL,
  `configs_sistema` text NOT NULL,
  `criado` datetime NOT NULL,
  `modificado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `config_sistema`
--

INSERT INTO `config_sistema` (`idConfig`, `configs_sistema`, `criado`, `modificado`) VALUES
(1, 'a:1:{s:8:\"cUsuario\";b:1;}', '2017-09-06 20:15:18', '2017-10-07 23:53:55');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `id_imagens` int(11) NOT NULL,
  `nome_imagem` varchar(210) NOT NULL,
  `autor_imagem` varchar(210) NOT NULL,
  `url_imagem` varchar(250) NOT NULL,
  `situacao_imagem` enum('1','2') NOT NULL,
  `data_cadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`id_imagens`, `nome_imagem`, `autor_imagem`, `url_imagem`, `situacao_imagem`, `data_cadastro`) VALUES
(1, 'jeremy-bishop-289214.jpg', 'Jeremy Bishop', 'https://unsplash.com/photos/d3fZSXlJ3Ok', '1', '2017-10-10 13:15:42'),
(2, 'preben-nilsen-363088.jpg', 'Preben Nilsen', 'https://unsplash.com/photos/f88nkcDb-28', '1', '2017-10-10 13:16:30'),
(3, 'hugues-de-buyer-mimeure-335733.jpg', 'Hugues de BUYER-MIMEURE', 'https://unsplash.com/photos/CAbbMdcenUQ', '1', '2017-10-10 13:21:20'),
(4, 'wil-stewart-18242.jpg', 'Wil Stewart', 'https://unsplash.com/photos/pHANr-CpbYM', '1', '2017-10-10 14:03:20'),
(5, 'download.jpg', 'Google Imagens', 'https://www.google.com.br/search?safe=active&hl=pt-BR&biw=1551&bih=736&tbm=isch&sa=1&q=nature&oq=nature&gs_l=psy-ab.3..0l2j0i67k1j0l7.3198.4246.0.4391.6.6.0.0.0.0.101.572.4j2.6.0....0...1.1.64.psy-ab..0.6.569....0.t65hSKxEuCg#imgrc=E-osPwALAJU-SM:', '1', '2017-12-10 03:13:16'),
(6, 'download1.jpg', 'Google Imagens', 'https://www.google.com.br/search?safe=active&hl=pt-BR&biw=1551&bih=736&tbm=isch&sa=1&q=nature&oq=nature&gs_l=psy-ab.3..0l2j0i67k1j0l7.3198.4246.0.4391.6.6.0.0.0.0.101.572.4j2.6.0....0...1.1.64.psy-ab..0.6.569....0.t65hSKxEuCg#imgrc=E-osPwALAJU-SM:', '1', '2017-12-10 03:17:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `os`
--

CREATE TABLE `os` (
  `id_os` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `protocolo` varchar(210) NOT NULL,
  `status` enum('Aberto','Em Produção','Enviado para Cliente','Enviado para AGF','Em Trânsito','Finalizado','Cancelado pelo Cliente','Cancelado pelo Fornecedor','Arquivos em Tratamento') NOT NULL,
  `cep_entrega` varchar(10) NOT NULL,
  `endereco_entrega` varchar(250) NOT NULL,
  `data_hora_cadastro` datetime NOT NULL,
  `data_modificacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `os`
--

INSERT INTO `os` (`id_os`, `cliente_id`, `usuario_id`, `protocolo`, `status`, `cep_entrega`, `endereco_entrega`, `data_hora_cadastro`, `data_modificacao`) VALUES
(1, 1, 1, '18061410171', 'Aberto', '06416-020', 'Rua Maria de Fatima Vaz nº 23, Engenho Novo - Barueri/SP', '2017-10-14 10:39:17', '2017-10-14 13:39:41'),
(2, 1, 1, '18061410172', 'Aberto', '06416-020', 'Rua Maria de Fátima Vaz nº 23, Vila Engenho Novo - /SP', '2017-10-14 16:03:09', '2017-10-14 14:03:09'),
(3, 1, 1, '18061410173', 'Em Produção', '06416-020', 'Rua Maria de Fátima Vaz nº 23, Vila Engenho Novo - /SP', '2017-10-14 16:05:32', '2017-10-14 14:30:28'),
(4, 0, 1, '0', '', '0', ' nº ,  - /', '2017-10-15 01:07:07', '2017-10-14 23:07:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissoes`
--

CREATE TABLE `permissoes` (
  `idPermissao` int(11) NOT NULL,
  `nPermissao` varchar(80) NOT NULL,
  `permissoes` text NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `situacao` tinyint(1) NOT NULL,
  `criado` datetime NOT NULL,
  `modificado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permissoes`
--

INSERT INTO `permissoes` (`idPermissao`, `nPermissao`, `permissoes`, `cliente_id`, `situacao`, `criado`, `modificado`) VALUES
(1, 'MASTER', 'a:26:{s:8:\"aUsuario\";s:1:\"1\";s:8:\"eUsuario\";s:1:\"1\";s:8:\"dUsuario\";s:1:\"1\";s:8:\"vUsuario\";s:1:\"1\";s:8:\"pUsuario\";s:1:\"1\";s:10:\"aPermissao\";s:1:\"1\";s:10:\"ePermissao\";s:1:\"1\";s:10:\"dPermissao\";s:1:\"1\";s:10:\"vPermissao\";s:1:\"1\";s:8:\"aCliente\";s:1:\"1\";s:8:\"eCliente\";s:1:\"1\";s:8:\"dCliente\";s:1:\"1\";s:8:\"vCliente\";s:1:\"1\";s:8:\"pCliente\";s:1:\"1\";s:8:\"aProduto\";s:1:\"1\";s:8:\"eProduto\";s:1:\"1\";s:8:\"dProduto\";s:1:\"1\";s:8:\"vProduto\";s:1:\"1\";s:8:\"pProduto\";s:1:\"1\";s:11:\"aNotaFiscal\";s:1:\"1\";s:11:\"eNotaFiscal\";s:1:\"1\";s:11:\"dNotaFiscal\";s:1:\"1\";s:11:\"vNotaFiscal\";s:1:\"1\";s:11:\"pNotaFiscal\";s:1:\"1\";s:7:\"eConfig\";s:1:\"1\";s:7:\"vConfig\";s:1:\"1\";}', 1, 1, '2017-06-11 00:00:00', '2017-10-01 23:22:10'),
(2, 'SILVER', 'a:39:{s:8:\"aUsuario\";b:0;s:8:\"eUsuario\";b:0;s:8:\"dUsuario\";b:0;s:8:\"vUsuario\";b:0;s:8:\"pUsuario\";b:0;s:10:\"aPermissao\";b:0;s:10:\"ePermissao\";b:0;s:10:\"dPermissao\";b:0;s:10:\"vPermissao\";b:0;s:13:\"aOrdemServico\";b:0;s:13:\"eOrdemServico\";b:0;s:13:\"dOrdemServico\";b:0;s:13:\"vOrdemServico\";b:0;s:13:\"pOrdemServico\";b:0;s:12:\"aFuncionario\";b:0;s:12:\"eFuncionario\";b:0;s:12:\"dFuncionario\";b:0;s:12:\"vFuncionario\";b:0;s:12:\"pFuncionario\";b:0;s:8:\"aCliente\";b:0;s:8:\"eCliente\";b:0;s:8:\"dCliente\";b:0;s:8:\"vCliente\";b:0;s:8:\"pCliente\";b:0;s:11:\"aFolhaPonto\";b:0;s:11:\"eFolhaPonto\";b:0;s:11:\"dFolhaPonto\";b:0;s:11:\"vFolhaPonto\";b:0;s:11:\"pFolhaPonto\";b:0;s:10:\"vProtocolo\";b:0;s:10:\"pProtocolo\";b:0;s:7:\"eConfig\";b:0;s:7:\"vConfig\";b:0;s:7:\"aTicket\";b:0;s:7:\"eTicket\";b:0;s:7:\"dTicket\";b:0;s:7:\"vTicket\";b:0;s:10:\"vTicketAll\";b:0;s:7:\"pTicket\";b:0;}', 1, 1, '2017-06-11 00:00:00', '2017-09-26 09:22:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produtos` int(11) NOT NULL,
  `descricao_produto` varchar(250) DEFAULT NULL,
  `ncm_produto` varchar(20) DEFAULT NULL,
  `cest_produto` varchar(20) DEFAULT NULL,
  `uc_produto` varchar(20) DEFAULT NULL,
  `vuc_produto` decimal(10,2) DEFAULT NULL,
  `ut_produto` varchar(20) DEFAULT NULL,
  `qt_produto` varchar(20) DEFAULT NULL,
  `vut_produto` decimal(10,2) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_modificado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produtos`, `descricao_produto`, `ncm_produto`, `cest_produto`, `uc_produto`, `vuc_produto`, `ut_produto`, `qt_produto`, `vut_produto`, `data_cadastro`, `data_modificado`) VALUES
(1, 'CAPA PLASTICA BURITI 144/200-EDITORA MODERNA', '49019900', '123456', 'un', '0.04', 'un', '1.00', '0.04', '2017-10-01 15:20:04', '2017-10-01 16:26:24'),
(2, 'ENVELOPES A4', '48171000', NULL, 'UN', '15.65', 'UN', '1.00', '15.65', '2017-10-15 21:36:21', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_os`
--

CREATE TABLE `produtos_os` (
  `id_produtos_os` int(11) NOT NULL,
  `os_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `valor_unitario` decimal(10,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `sub_total` varchar(100) NOT NULL,
  `data_inserido` datetime NOT NULL,
  `data_modificacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos_os`
--

INSERT INTO `produtos_os` (`id_produtos_os`, `os_id`, `produto_id`, `valor_unitario`, `quantidade`, `sub_total`, `data_inserido`, `data_modificacao`) VALUES
(1, 3, 1, '4.15', 3, '12,45', '2017-10-16 03:22:26', NULL),
(2, 3, 2, '15.65', 2, '31,30', '2017-10-16 03:23:39', NULL),
(3, 3, 1, '0.04', 12, '0,48', '2017-10-16 03:24:54', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `email_user` varchar(250) DEFAULT NULL,
  `senha_user` varchar(250) DEFAULT NULL,
  `codigo` varchar(250) DEFAULT NULL,
  `data_expirar` datetime DEFAULT NULL,
  `permissoes_id` int(11) DEFAULT NULL,
  `situacao_user` int(11) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`idUser`, `email_user`, `senha_user`, `codigo`, `data_expirar`, `permissoes_id`, `situacao_user`, `data_cadastro`) VALUES
(1, 'edsonrcoosta@gmail.com', 'e179f970ab54e1c33d0fdbb0b21018d72b5025a3', NULL, NULL, 1, 1, '2017-09-24 20:49:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_perfil`
--

CREATE TABLE `user_perfil` (
  `idPerfil` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nome_user` varchar(250) DEFAULT NULL,
  `genero_user` enum('Masculino','Feminino') DEFAULT NULL,
  `cpf_user` varchar(50) DEFAULT NULL,
  `rg_user` varchar(50) DEFAULT NULL,
  `data_nasc_user` date DEFAULT NULL,
  `profissao_user` varchar(100) DEFAULT NULL,
  `foto_user` varchar(250) DEFAULT NULL,
  `foto_capa_user` varchar(250) DEFAULT NULL,
  `celular_user` varchar(20) DEFAULT NULL,
  `cep_user` varchar(20) DEFAULT NULL,
  `rua_user` varchar(100) DEFAULT NULL,
  `numero_user` varchar(10) DEFAULT NULL,
  `bairro_user` varchar(100) DEFAULT NULL,
  `cidade_user` varchar(100) DEFAULT NULL,
  `uf_user` varchar(20) DEFAULT NULL,
  `pais_user` varchar(100) DEFAULT NULL,
  `resumo_user` varchar(250) DEFAULT NULL,
  `estadoCivil_user` enum('Casado','Solteiro','Outros','') NOT NULL,
  `facebook_user` varchar(100) DEFAULT NULL,
  `skype_user` varchar(100) DEFAULT NULL,
  `twitter_user` varchar(100) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user_perfil`
--

INSERT INTO `user_perfil` (`idPerfil`, `id_user`, `nome_user`, `genero_user`, `cpf_user`, `rg_user`, `data_nasc_user`, `profissao_user`, `foto_user`, `foto_capa_user`, `celular_user`, `cep_user`, `rua_user`, `numero_user`, `bairro_user`, `cidade_user`, `uf_user`, `pais_user`, `resumo_user`, `estadoCivil_user`, `facebook_user`, `skype_user`, `twitter_user`, `data_cadastro`) VALUES
(1, 1, 'Edson Costa', 'Feminino', '03725655308', '452280199', '1989-06-18', 'Operador Impressão', 'afcc6e0eec79657c64bf17a95db3d4d4.png', 'jeremy-bishop-289214.jpg', '11 940277034', '06416020', 'Rua Maria de Fátima Vaz', '23', 'Vila Engenho Novo', 'Barueri', 'SP', 'Brasil', 'fale um pouco sobre você.....', 'Casado', '@edsonrcoosta', 'edsonrcoosta', '@edsonrcoosta', '2017-10-09 23:10:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_clientes`);

--
-- Indexes for table `config_sistema`
--
ALTER TABLE `config_sistema`
  ADD PRIMARY KEY (`idConfig`);

--
-- Indexes for table `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id_imagens`);

--
-- Indexes for table `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`id_os`);

--
-- Indexes for table `permissoes`
--
ALTER TABLE `permissoes`
  ADD PRIMARY KEY (`idPermissao`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produtos`);

--
-- Indexes for table `produtos_os`
--
ALTER TABLE `produtos_os`
  ADD PRIMARY KEY (`id_produtos_os`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- Indexes for table `user_perfil`
--
ALTER TABLE `user_perfil`
  ADD PRIMARY KEY (`idPerfil`),
  ADD KEY `fk_user_perfil` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_clientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `config_sistema`
--
ALTER TABLE `config_sistema`
  MODIFY `idConfig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id_imagens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `os`
--
ALTER TABLE `os`
  MODIFY `id_os` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `permissoes`
--
ALTER TABLE `permissoes`
  MODIFY `idPermissao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produtos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produtos_os`
--
ALTER TABLE `produtos_os`
  MODIFY `id_produtos_os` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_perfil`
--
ALTER TABLE `user_perfil`
  MODIFY `idPerfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `user_perfil`
--
ALTER TABLE `user_perfil`
  ADD CONSTRAINT `fk_user_perfil` FOREIGN KEY (`id_user`) REFERENCES `user` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
