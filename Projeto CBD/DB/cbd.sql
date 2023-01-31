-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 09-Jan-2023 às 12:57
-- Versão do servidor: 8.0.27
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cbd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1673268144),
('client', '3', 1673268278),
('employee', '2', 1673268236);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('addEmploye', 2, 'Add an employe', NULL, NULL, 1673268044, 1673268044),
('addProductToCart', 2, 'Add a product to the cart', NULL, NULL, 1673268044, 1673268044),
('addStock', 2, 'Add Stock', NULL, NULL, 1673268044, 1673268044),
('admin', 1, NULL, NULL, NULL, 1673268045, 1673268045),
('client', 1, NULL, NULL, NULL, 1673268044, 1673268044),
('createProduct', 2, 'Create a Product', NULL, NULL, 1673268044, 1673268044),
('deleteProduct', 2, 'Delete a Product', NULL, NULL, 1673268044, 1673268044),
('deleteUser', 2, 'Delete a user', NULL, NULL, 1673268044, 1673268044),
('deliverySpot', 2, 'Choose an order\'s delivery spot', NULL, NULL, 1673268044, 1673268044),
('editOrderStatus', 2, 'Edit order status', NULL, NULL, 1673268044, 1673268044),
('editOwnData', 2, 'Edit your own data', NULL, NULL, 1673268044, 1673268044),
('editProduct', 2, 'Edit a Product', NULL, NULL, 1673268044, 1673268044),
('editProductAmmountInCart', 2, 'Edit the quantity of a product in the cart', NULL, NULL, 1673268044, 1673268044),
('editUser', 2, 'Edit employes and clients data', NULL, NULL, 1673268044, 1673268044),
('employee', 1, NULL, NULL, NULL, 1673268045, 1673268045),
('removeProductFromCart', 2, 'Remove a product from the cart', NULL, NULL, 1673268044, 1673268044),
('removeStock', 2, 'Remove Stock', NULL, NULL, 1673268044, 1673268044),
('viewAllOrders', 2, 'View all orders history', NULL, NULL, 1673268044, 1673268044),
('viewOrders', 2, 'View own orders', NULL, NULL, 1673268044, 1673268044),
('viewProductDetails', 2, 'View product details', NULL, NULL, 1673268044, 1673268044),
('viewProducts', 2, 'View all Products in back office', NULL, NULL, 1673268044, 1673268044);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'addEmploye'),
('client', 'addProductToCart'),
('employee', 'addStock'),
('admin', 'createProduct'),
('admin', 'deleteProduct'),
('admin', 'deleteUser'),
('client', 'deliverySpot'),
('admin', 'editOrderStatus'),
('client', 'editOwnData'),
('client', 'editProductAmmountInCart'),
('admin', 'editUser'),
('admin', 'employee'),
('client', 'removeProductFromCart'),
('admin', 'removeStock'),
('employee', 'viewAllOrders'),
('client', 'viewOrders'),
('client', 'viewProductDetails'),
('employee', 'viewProducts');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
CREATE TABLE IF NOT EXISTS `carrinho` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quant` int NOT NULL,
  `dadosPessoais_id` int NOT NULL,
  `produto_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_carrinho_dadosPessoais1_idx` (`dadosPessoais_id`),
  KEY `fk_carrinho_produtos1_idx` (`produto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'Óleos'),
(2, 'Flores'),
(3, 'Resina');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dadospessoais`
--

DROP TABLE IF EXISTS `dadospessoais`;
CREATE TABLE IF NOT EXISTS `dadospessoais` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `morada` varchar(45) DEFAULT NULL,
  `dtaNasc` date DEFAULT NULL,
  `codigopostal` varchar(45) DEFAULT NULL,
  `nif` varchar(9) DEFAULT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_dadosPessoais_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `dadospessoais`
--

INSERT INTO `dadospessoais` (`id`, `nome`, `morada`, `dtaNasc`, `codigopostal`, `nif`, `user_id`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, 1),
(2, NULL, NULL, NULL, NULL, NULL, 2),
(3, 'Joaquim', 'Rua dos Oleos', NULL, '2430-001', '123456789', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fatura`
--

DROP TABLE IF EXISTS `fatura`;
CREATE TABLE IF NOT EXISTS `fatura` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dtaEmissao` datetime NOT NULL,
  `moradaEntrega` varchar(80) NOT NULL,
  `moradaFaturacao` varchar(80) NOT NULL,
  `estado` enum('entregue','levantar','transito') NOT NULL,
  `pago` tinyint NOT NULL,
  `dadospessoais_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fatura_dadospessoais1_idx` (`dadospessoais_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `fatura`
--

INSERT INTO `fatura` (`id`, `dtaEmissao`, `moradaEntrega`, `moradaFaturacao`, `estado`, `pago`, `dadospessoais_id`) VALUES
(1, '2023-01-09 12:52:06', 'levantarloja', 'Rua dos Oleos', 'levantar', 0, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

DROP TABLE IF EXISTS `imagem`;
CREATE TABLE IF NOT EXISTS `imagem` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_bin NOT NULL,
  `produto_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_imagem_produtos1_idx` (`produto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `imagem`
--

INSERT INTO `imagem` (`id`, `nome`, `produto_id`) VALUES
(1, '010923125019.png', 1),
(2, '010923125024.png', 1),
(3, '010923125352.png', 2),
(4, '010923125356.png', 2),
(5, '010923125521.png', 3),
(6, '010923125629.png', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `linhafatura`
--

DROP TABLE IF EXISTS `linhafatura`;
CREATE TABLE IF NOT EXISTS `linhafatura` (
  `id` int NOT NULL AUTO_INCREMENT,
  `qnt` int NOT NULL,
  `precoProduto` decimal(8,2) NOT NULL,
  `produto_id` int NOT NULL,
  `fatura_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_table1_produtos1_idx` (`produto_id`),
  KEY `fk_linhafatura_fatura1_idx` (`fatura_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `linhafatura`
--

INSERT INTO `linhafatura` (`id`, `qnt`, `precoProduto`, `produto_id`, `fatura_id`) VALUES
(1, 2, '57.50', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `listadesejo`
--

DROP TABLE IF EXISTS `listadesejo`;
CREATE TABLE IF NOT EXISTS `listadesejo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dadosPessoais_id` int NOT NULL,
  `produto_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_listaDesejos_dadosPessoais1_idx` (`dadosPessoais_id`),
  KEY `fk_listaDesejos_produtos1_idx` (`produto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `loja`
--

DROP TABLE IF EXISTS `loja`;
CREATE TABLE IF NOT EXISTS `loja` (
  `id` int NOT NULL AUTO_INCREMENT,
  `morada` varchar(45) NOT NULL,
  `longitude` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `contactos` varchar(45) NOT NULL,
  `dadosPessoais_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_lojas_dadosPessoais1_idx` (`dadosPessoais_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1673268016),
('m130524_201442_init', 1673268018),
('m140506_102106_rbac_init', 1673268035),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1673268035),
('m180523_151638_rbac_updates_indexes_without_prefix', 1673268035),
('m190124_110200_add_verification_token_column_to_user_table', 1673268018),
('m200409_110543_rbac_update_mssql_trigger', 1673268035);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(245) DEFAULT NULL,
  `preco` decimal(8,2) NOT NULL,
  `stock` int NOT NULL,
  `categoria_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_produtos_categorias1_idx` (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `descricao`, `preco`, `stock`, `categoria_id`) VALUES
(1, 'Óleo CBD Azeite 10% - 10 ml', 'O óleo aromático 10% CBD é uma das melhores versões disponíveis no mercado europeu, e não utiliza cristais de CBD. Este produto oferece a melhor relação qualidade- preço, com altas concentrações de CBD. O óleo CBD não é psicoativo e é processado', '57.50', 100, 1),
(2, 'Bubblegum 2g', 'A Cannabis Light Bubblegum CBD é uma variedade indoor, o que significa que cresce dentro das nossas instalações num ambiente altamente controlado onde a humidade, ventilação e iluminação são reguladas pelos nossos cultivadores para assegurar um ', '19.90', 100, 2),
(3, 'Charas CBD', 'O charas é provavelmente o mais raro de todos os tipos de haxixe, devido à dificuldade de o produzir: é feito através da extracção de resina de cannabis. Originário da Índia, é tradicionalmente obtido descascando à mão a parte inferior da flor d', '10.00', 100, 3),
(4, 'Meladol – 30ml CBD & Melatonina', 'O Meladol é um regulador do sono cuja fórmula líquida lipossomal o torna fácil de usar e maximiza as concentrações de CBD e melatonina.', '25.00', 10, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint NOT NULL DEFAULT '10',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin123', 'bRleB9P-jPaVmGMpdXxod1TeotTj7W6j', '$2y$13$Nob84dM.5j3Eh1L.VYC43.K3jV7gsJuyDctSxa9DRfOe0du1KqC9W', NULL, 'admin123@admin123.pt', 10, 1673268144, 1673268144, 'Z0UK2nEl7OspsnavpJQhTW2gxWYuymYQ_1673268144'),
(2, 'funcionario123', 's7U78eD69diNG6O4_rPK7tH-pMB-p1iG', '$2y$13$C/Ez2cHWBXKmKYXhys.2zeISU0G5Iy75R.4g4QWmQlmchhWzSgiwK', NULL, 'funcionario123@funcionario.pt', 10, 1673268236, 1673268236, 'gE5iUh2msJ8XTRikFHdg2TTtcdWuDLGd_1673268236'),
(3, 'utilizador123', 'thYiQGuaLcFEnihcPgss1QC_maNnYOQ7', '$2y$13$UAkYRLQDnYd6xNBtgSWnWerpDUfa642H.Ahcj3aNhZ0UdScQIzUfW', NULL, 'utilizador123@utilizador.pt', 10, 1673268278, 1673268278, 'ZcNnjOoFLrz0qzVdLRacMD0ThUBKzRNV_1673268278');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `fk_carrinho_dadosPessoais1` FOREIGN KEY (`dadosPessoais_id`) REFERENCES `dadospessoais` (`id`),
  ADD CONSTRAINT `fk_carrinho_produtos1` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`);

--
-- Limitadores para a tabela `dadospessoais`
--
ALTER TABLE `dadospessoais`
  ADD CONSTRAINT `fk_dadosPessoais_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `fatura`
--
ALTER TABLE `fatura`
  ADD CONSTRAINT `fk_fatura_dadospessoais1` FOREIGN KEY (`dadospessoais_id`) REFERENCES `dadospessoais` (`id`);

--
-- Limitadores para a tabela `imagem`
--
ALTER TABLE `imagem`
  ADD CONSTRAINT `fk_imagem_produtos1` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`);

--
-- Limitadores para a tabela `linhafatura`
--
ALTER TABLE `linhafatura`
  ADD CONSTRAINT `fk_linhafatura_fatura1` FOREIGN KEY (`fatura_id`) REFERENCES `fatura` (`id`),
  ADD CONSTRAINT `fk_table1_produtos1` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`);

--
-- Limitadores para a tabela `listadesejo`
--
ALTER TABLE `listadesejo`
  ADD CONSTRAINT `fk_listaDesejos_dadosPessoais1` FOREIGN KEY (`dadosPessoais_id`) REFERENCES `dadospessoais` (`id`),
  ADD CONSTRAINT `fk_listaDesejos_produtos1` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`);

--
-- Limitadores para a tabela `loja`
--
ALTER TABLE `loja`
  ADD CONSTRAINT `fk_lojas_dadosPessoais1` FOREIGN KEY (`dadosPessoais_id`) REFERENCES `dadospessoais` (`id`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_produtos_categorias1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
