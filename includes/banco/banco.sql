-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.12-log - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela mbntecnologia04.compras
CREATE TABLE IF NOT EXISTS `compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_fornecedor` varchar(60) DEFAULT NULL,
  `descricao` text,
  `valor` decimal(7,2) DEFAULT '0.00',
  `quant` int(5) DEFAULT NULL,
  `data` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COMMENT='Aqui vou cadastrar todas as compras, assim fica mais facil para visualizar os relatorios. ';

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela mbntecnologia04.compras_produtos
CREATE TABLE IF NOT EXISTS `compras_produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico do produto',
  `id_produtos` int(11) NOT NULL DEFAULT '0' COMMENT 'relacionado com tabela produto',
  `valor_compra` decimal(7,2) NOT NULL DEFAULT '0.00' COMMENT 'Valor de compra declarado na entrada do estoque',
  `valor_venda` decimal(7,2) NOT NULL DEFAULT '0.00' COMMENT 'valor de venda pego do orçamento',
  `id_compra` int(11) NOT NULL DEFAULT '0' COMMENT 'Tabela relacionada pegar todos os dados da compra como data de quem comprou',
  `id_venda` int(11) NOT NULL DEFAULT '0' COMMENT 'numero do orçamento ou numero do pedido onde tem todo o valor da compra, e pra quem foi vendido e data.',
  `lucro` decimal(7,2) NOT NULL DEFAULT '0.00',
  `etiqueta` int(11) DEFAULT NULL COMMENT 'se ja foi impresso a etiqueta 0=nao e 1 = sim',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COMMENT='Essa tabela serve para colocar todos os produtos, cada produto terá um identificador unico no nosso sistema, que saberemos a compra quando foi feita. ';

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela mbntecnologia04.emp_contatos
CREATE TABLE IF NOT EXISTS `emp_contatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COMMENT='Os contatos daquela empresa';

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela mbntecnologia04.emp_empresas
CREATE TABLE IF NOT EXISTS `emp_empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razao_social` varchar(60) DEFAULT NULL,
  `nome_fantasia` varchar(60) DEFAULT NULL,
  `cnpj_cpf` char(50) DEFAULT NULL,
  `ie` varchar(20) DEFAULT NULL COMMENT 'inscrição estadual',
  `logradoro` varchar(60) DEFAULT NULL,
  `n` int(5) DEFAULT NULL,
  `complemento` varchar(60) DEFAULT NULL,
  `bairro` varchar(20) DEFAULT NULL,
  `cep` char(10) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `site` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COMMENT='Armazenará todos os dados da empresa';

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela mbntecnologia04.prod_fabricante
CREATE TABLE IF NOT EXISTS `prod_fabricante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COMMENT='Colocar todos os fabricantes de todos os prosutos';

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela mbntecnologia04.prod_marca
CREATE TABLE IF NOT EXISTS `prod_marca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COMMENT='colocar todas as marcas';

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela mbntecnologia04.prod_produtos
CREATE TABLE IF NOT EXISTS `prod_produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pn_gaveta` varchar(50) DEFAULT NULL,
  `pn_model_fabricante` varchar(50) DEFAULT NULL,
  `pn_fabricante` varchar(50) DEFAULT NULL,
  `pn_model` varchar(50) DEFAULT NULL,
  `pn_hp` varchar(50) DEFAULT NULL,
  `gpn` varchar(50) DEFAULT NULL,
  `capacidade` int(3) DEFAULT NULL COMMENT '1=36,2=72,3=73,4=80,5=146,6=160,7=200,8=250,9=300,10=320,11=400,12=450,13=500,14=600,15=750,16=900,17=1000,18=1200,19=1500,20=2000,21=3000,22=4000,23=5000,24=6000,',
  `rpm` int(1) DEFAULT NULL COMMENT '1=5.4K,2=5.9K,3=7.2K,4=10K,5=15K',
  `conexao` int(1) DEFAULT NULL COMMENT '1=sas,2=sata,3=ide,4=SCSI 80 PINOS,5=SCSI 68 PINOS',
  `tamanho` int(1) DEFAULT NULL COMMENT '1=2.5,2=3.5;',
  `memoria_cache` int(1) DEFAULT NULL COMMENT '1=8mb,2=16mb,3=32mb,4=64mb,5=128',
  `descricao` text,
  `quantidade` int(5) DEFAULT '0',
  `valor` decimal(7,2) DEFAULT '0.00',
  `id_fabricante` int(11) DEFAULT '0',
  `id_tipo_produto` int(11) DEFAULT '0',
  `id_marca` int(11) DEFAULT '0',
  `pn_dell` varchar(50) DEFAULT NULL,
  `site` int(1) DEFAULT '0' COMMENT '0=nao esta no site, 1= ja esta cadastrado',
  `tranferencia` int(1) NOT NULL COMMENT '1=1.5Gb/s,2=3Gb/s,3=6Gb/s,4=12Gb/s,5=U160,6=U320',
  `pn_fru` varchar(50) NOT NULL,
  `pn_option` varchar(50) NOT NULL,
  `pn_ibm` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela mbntecnologia04.prod_tipo_produto
CREATE TABLE IF NOT EXISTS `prod_tipo_produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `cod_nota_fiscal` varchar(50) DEFAULT NULL COMMENT 'Codigos que será usado na crição da nota',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COMMENT='Colocar todos os tipos como hd, placa mae e tambem colocar os codigos que ira para nota';

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela mbntecnologia04.sis_cidades
CREATE TABLE IF NOT EXISTS `sis_cidades` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_CIDADE_ESTADO_idx` (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela mbntecnologia04.sis_estados
CREATE TABLE IF NOT EXISTS `sis_estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `uf` char(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela mbntecnologia04.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Todos os usuarios do sistema';

-- Exportação de dados foi desmarcado.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
