CREATE DATABASE  IF NOT EXISTS `facomcrm` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `facomcrm`;
-- MySQL dump 10.13  Distrib 5.5.29, for debian-linux-gnu (i686)
--
-- Host: 127.0.0.1    Database: facomcrm
-- ------------------------------------------------------
-- Server version	5.5.29-0ubuntu0.12.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `anotacao`
--

DROP TABLE IF EXISTS `anotacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anotacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `observacao` text,
  `data` datetime NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `pessoa_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_anotacao_empresa1_idx` (`empresa_id`),
  KEY `fk_anotacao_usuario1_idx` (`usuario_id`),
  KEY `fk_anotacao_pessoa1_idx` (`pessoa_id`),
  CONSTRAINT `fk_anotacao_empresa1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_anotacao_pessoa1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_anotacao_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anotacao`
--

LOCK TABLES `anotacao` WRITE;
/*!40000 ALTER TABLE `anotacao` DISABLE KEYS */;
INSERT INTO `anotacao` VALUES (2,'Compra de papel descartável','Donec sit amet libero ante, ac condimentum risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum ultricies molestie sem, quis porttitor dui gravida condimentum. Nulla a enim in mi suscipit semper. Morbi turpis eros, mattis at tincidunt id, hendrerit et quam. In sollicitudin ultricies lacinia. Praesent eget nunc leo. In et pharetra purus. Curabitur libero erat, adipiscing a sollicitudin sed, pellentesque non orci. In hac habitasse platea dictumst. Maecenas at vestibulum magna. Ut congue lacinia nisl, sed euismod felis luctus sed. Mauris hendrerit, enim a imperdiet ultrices, felis purus sodales lacus, sit amet elementum mi nibh feugiat erat. Donec nec sem at enim pharetra congue sed ut mauris. Ut dapibus dapibus hendrerit.','2013-02-27 19:11:24',3,14,2),(3,'Ligou atrás de flores','Donec sit amet libero ante, ac condimentum risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum ultricies molestie sem, quis porttitor dui gravida condimentum. Nulla a enim in mi suscipit semper. Morbi turpis eros, mattis at tincidunt id, hendrerit et quam. In sollicitudin ultricies lacinia. Praesent eget nunc leo. In et pharetra purus. Curabitur libero erat, adipiscing a sollicitudin sed, pellentesque non orci. In hac habitasse platea dictumst. Maecenas at vestibulum magna. Ut congue lacinia nisl, sed euismod felis luctus sed. Mauris hendrerit, enim a imperdiet ultrices, felis purus sodales lacus, sit amet elementum mi nibh feugiat erat. Donec nec sem at enim pharetra congue sed ut mauris. Ut dapibus dapibus hendrerit.\r\n\r\nDonec sit amet libero ante, ac condimentum risus. Vestibulum ante ipsum primis in faucibus orci lut, enim a imperdiet ultrices, felis purus sodales lacus, sit amet elementum mi nibh feugiat erat. Donec nec sem at enim pharetra congue sed ut mauris. Ut dapibus dapibus hendrerit.','2013-02-27 14:24:23',3,14,1),(4,'Pedido de Madereira','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc porta lorem ut leo euismod sit amet volutpat tellus interdum. Fusce sit amet risus libero. Mauris massa nunc, feugiat in auctor quis, venenatis at nisl. Duis pharetra mi rhoncus justo facilisis in consectetur risus accumsan. Quisque in ante quis libero pulvinar rhoncus et vitae quam. Integer luctus dui risus. Curabitur suscipit, velit eget pharetra porttitor, nisi dui tempus orci, sit amet euismod magna ipsum non nulla. Nunc sem risus, rhoncus vitae tincidunt sit amet, ultrices a tellus. Donec aliquam, metus eu interdum pellentesque, diam orci blandit metus, ac auctor justo ipsum elementum orci. Sed lobortis iaculis erat in vehicula. Donec placerat velit id augue porttitor at sagittis justo pulvinar.\r\n','2013-02-27 19:05:58',3,14,6),(5,'Pedido de Compensado','Donec sit amet libero ante, ac condimentum risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum ultricies molestie sem, quis porttitor dui gravida condimentum. Nulla a enim in mi suscipit semper. Morbi turpis eros, mattis at tincidunt id, hendrerit et quam. In sollicitudin ultricies lacinia. Praesent eget nunc leo. In et pharetra purus. Curabitur libero erat, adipiscing a sollicitudin sed, pellentesque non orci. In hac habitasse platea dictumst. Maecenas at vestibulum magna. Ut congue lacinia nisl, sed euismod felis luctus sed. Mauris hendrerit, enim a imperdiet ultrices, felis purus sodales lacus, sit amet elementum mi nibh feugiat erat. Donec nec sem at enim pharetra congue sed ut mauris. Ut dapibus dapibus hendrerit.\r\n','2013-02-27 19:26:37',3,14,6);
/*!40000 ALTER TABLE `anotacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `tipo` enum('PJ','PF') NOT NULL,
  `cnpj` varchar(45) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `telefone1` varchar(20) DEFAULT NULL,
  `telefone2` varchar(20) DEFAULT NULL,
  `telefone3` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `nome_fantasia` varchar(45) DEFAULT NULL,
  `inscricao_estadual` varchar(45) DEFAULT NULL,
  `inscricao_municipal` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `observacao` text,
  `site` varchar(45) DEFAULT NULL,
  `cep` varchar(45) NOT NULL,
  `logradouro` varchar(150) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `numero` int(11) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `uf` char(2) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_atualizacao` datetime DEFAULT NULL,
  `empresa_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pessoa_empresa_idx` (`empresa_id`),
  KEY `fk_pessoa_usuario1_idx` (`usuario_id`),
  CONSTRAINT `fk_pessoa_empresa` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pessoa_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa`
--

LOCK TABLES `pessoa` WRITE;
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` VALUES (1,'Jairo Ricardes Rodrigues Filho','PF',NULL,'040.470.231-75','(67)8445-0179','(67)9275-2215','(67)3361-1516','',NULL,NULL,NULL,'jairocgr@gmail.com','','','79115-345','Rua Ibirapuã','Itapuã','',22,'Campo Grande','MS','2013-02-27 12:33:51',NULL,3,14),(2,'Tacito Jeremias ','PF',NULL,'480.883.572-09','(67)5512-3313','','','',NULL,NULL,NULL,'tacctoo@terra.com.br','','','79115-231','Rua do Transito Coccomarolla','Santo Amaro','',32,'Aral Moreira','MS','2013-02-21 06:10:50',NULL,3,14),(5,'Joaquim Faustino','PF',NULL,'548.141.255-18','(67)8445-0179','','','',NULL,NULL,NULL,'faustino@terra.com.br','','','79455-581','Rua Faustina','Jardim dos Ipes','',355,'Jardim','MS','2013-02-21 10:13:18',NULL,3,15),(6,'Cora Saloio Ltda.','PJ','51.857.467/0001-93',NULL,'(67)3662-5451','(67)5445-1333','','','Floricultura Florida','29307490a234','7130937139071','','','','79155-345','Rua Faustina','Jardim dos Ipes','',5788,'Sidrolândia','MS','2013-02-27 07:08:44',NULL,3,15),(8,'Fernando José Boldrin','PF',NULL,'011.065.364-52','(67)3362-1419','','','',NULL,NULL,NULL,'fernandoboldrin@terra.com.br','','','79115-345','Rua Faustina','Santa Tereza','',980,'CAMPO GRANDE','MS','2013-02-26 07:03:24',NULL,3,14),(10,'Mario Roberto Machado','PF',NULL,'382.523.513-01','(67)3366-1166','','','',NULL,NULL,NULL,'marioroberto@terra.py','','','79115-334','Rua Faustina','Santo Amaro','',355,'Campo Grande','MS','2013-02-27 12:46:23',NULL,3,14),(11,'Juliano Mendes','PF',NULL,'824.376.655-36','(67)9979-9000','','','',NULL,NULL,NULL,'juliano@bol.com','','','79115-344','Rua Santa Monica','Santo Antônio','',878,'Jardim','MS','2013-02-27 07:01:14',NULL,3,14),(12,'Felipe Souza','PF',NULL,'501.957.143-18','(67)6635-7888','','','',NULL,NULL,NULL,'felipesouza@terra.com','','','78990-000','Rua Santa Monica','Santo Amaro','',677,'Aral Moreira','MS','2013-02-27 07:25:50',NULL,3,14);
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'FACOM','(67)3325-1518','contato@facom.ufms.br'),(2,'LEDES','(67)3355-1518','contato@ledes.net'),(3,'Marcenaria Nacional','(67)3352-1418','ouvidoria@cnpgc.embrapa.br');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auditoria`
--

DROP TABLE IF EXISTS `auditoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auditoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `observacao` text,
  `acao` text,
  `nome_usuario` varchar(50) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=ARCHIVE AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditoria`
--

LOCK TABLES `auditoria` WRITE;
/*!40000 ALTER TABLE `auditoria` DISABLE KEYS */;
INSERT INTO `auditoria` VALUES (1,'2013-02-27 12:42:56','Tabela: pessoa - Id:9','INSERT','jairo',3),(2,'2013-02-27 12:44:00','Tabela: pessoa - Id:10','INSERT','jairo',3),(3,'2013-02-27 12:46:23','Tabela: Pessoa - Id:0','UPDATE','jairo',3),(4,'2013-02-27 12:47:19','Tabela: Pessoa - Id:9','DELETE','jairo',3),(5,'2013-02-27 13:42:26','Tabela: anotacao - Id:1','INSERT','jairo',3),(6,'2013-02-27 14:23:46','Tabela: anotacao - Id:2','INSERT','jairo',3),(7,'2013-02-27 14:24:23','Tabela: anotacao - Id:3','INSERT','jairo',3),(8,'2013-02-27 14:31:28','Tabela: Anotacoes - Id:1','DELETE','jairo',3),(9,'2013-02-27 19:01:14','Tabela: pessoa - Id:11','INSERT','jairo',3),(10,'2013-02-27 19:05:15','Tabela: Pessoa - Id:3','DELETE','jairo',3),(11,'2013-02-27 19:05:58','Tabela: anotacao - Id:4','INSERT','jairo',3),(12,'2013-02-27 19:06:34','Tabela: Pessoa - Id:6<br> Valores antigos: <pre>Array\n(\n    [id] => 6\n    [nome] => Cora Saloio Ltda.\n    [tipo] => PJ\n    [cnpj] => 51.857.467/0001-93\n    [cpf] => \n    [telefone1] => (67)3662-5451\n    [telefone2] => (67)5445-1333\n    [telefone3] => \n    [fax] => \n    [nome_fantasia] => Floricultura Florida\n    [inscricao_estadual] => 29307490a234\n    [inscricao_municipal] => \n    [email] => \n    [observacao] => \n    [site] => \n    [cep] => 79155-345\n    [logradouro] => Rua Faustina\n    [bairro] => Jardim dos Ipes\n    [complemento] => \n    [numero] => 5788\n    [cidade] => Sidrolândia\n    [uf] => MS\n    [data_criacao] => 2013-02-21 10:22:44\n    [data_atualizacao] => \n    [empresa_id] => 3\n    [usuario_id] => 15\n)\n</pre>','UPDATE','jairo',3),(13,'2013-02-27 19:08:19','Tabela: Pessoa - Id:6<br> Valores antigos: <pre>Array\n(\n    [id] => 6\n    [nome] => Cora Saloio Ltda.\n    [tipo] => PJ\n    [cnpj] => 51.857.467/0001-93\n    [cpf] => \n    [telefone1] => (67)3662-5451\n    [telefone2] => (67)5445-1333\n    [telefone3] => \n    [fax] => \n    [nome_fantasia] => Floricultura Florida\n    [inscricao_estadual] => 29307490a234\n    [inscricao_municipal] => 7130937139071\n    [email] => \n    [observacao] => \n    [site] => \n    [cep] => 79155-345\n    [logradouro] => Rua Faustina\n    [bairro] => Jardim dos Ipes\n    [complemento] => \n    [numero] => 5788\n    [cidade] => Sidrolândia\n    [uf] => MS\n    [data_criacao] => 2013-02-27 07:06:34\n    [data_atualizacao] => \n    [empresa_id] => 3\n    [usuario_id] => 15\n)\n</pre>','UPDATE','jairo',3),(14,'2013-02-27 19:08:44','Tabela: Pessoa - Id:6<br> Valores antigos: <pre>Array\n(\n    [id] => 6\n    [nome] => Cora Saloio Ltda.\n    [tipo] => PJ\n    [cnpj] => 51.857.467/0001-93\n    [cpf] => \n    [telefone1] => (67)3662-5451\n    [telefone2] => (67)5445-1333\n    [telefone3] => \n    [fax] => \n    [nome_fantasia] => Floricultura Florida\n    [inscricao_estadual] => 29307490a234\n    [inscricao_municipal] => 7130937139071\n    [email] => \n    [observacao] => \n    [site] => \n    [cep] => 79155-345\n    [logradouro] => Rua Faustina\n    [bairro] => Jardim dos Ipes\n    [complemento] => \n    [numero] => 5788\n    [cidade] => Sidrolândia\n    [uf] => MS\n    [data_criacao] => 2013-02-27 07:08:19\n    [data_atualizacao] => \n    [empresa_id] => 3\n    [usuario_id] => 15\n)\n</pre>','UPDATE','jairo',3),(15,'2013-02-27 19:10:11','Tabela: Usuario - Id: 14 alterou a senha','UPDATE','jairo',3),(16,'2013-02-27 19:11:24','Tabela: anotacao - Id:2<br> Valores antigos: <pre>Array\n(\n    [id] => 2\n    [titulo] => Compra de papel descartável #46667a\n    [observacao] => Donec sit amet libero ante, ac condimentum risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum ultricies molestie sem, quis porttitor dui gravida condimentum. Nulla a enim in mi suscipit semper. Morbi turpis eros, mattis at tincidunt id, hendrerit et quam. In sollicitudin ultricies lacinia. Praesent eget nunc leo. In et pharetra purus. Curabitur libero erat, adipiscing a sollicitudin sed, pellentesque non orci. In hac habitasse platea dictumst. Maecenas at vestibulum magna. Ut congue lacinia nisl, sed euismod felis luctus sed. Mauris hendrerit, enim a imperdiet ultrices, felis purus sodales lacus, sit amet elementum mi nibh feugiat erat. Donec nec sem at enim pharetra congue sed ut mauris. Ut dapibus dapibus hendrerit.\n    [data] => 2013-02-27 15:01:21\n    [empresa_id] => 3\n    [usuario_id] => 14\n    [pessoa_id] => 2\n)\n</pre>','UPDATE','jairo',3),(17,'2013-02-27 19:25:50','Tabela: pessoa - Id:12','INSERT','jairo',3),(18,'2013-02-27 19:26:37','Tabela: anotacao - Id:5','INSERT','jairo',3);
/*!40000 ALTER TABLE `auditoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `senha` char(32) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `nivel` enum('SUPERADMIN','ADMINISTRADOR','USUARIO') DEFAULT NULL,
  `empresa_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario_empresa1_idx` (`empresa_id`),
  CONSTRAINT `fk_usuario_empresa1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (9,'joao','827ccb0eea8a706c4c34a16891f84e7b','João Paulo Andrade','jpga@hotmail.com','ADMINISTRADOR',1),(14,'jairo','9b0afae9a65cb28dc907eeaae067914c','Jairo Ricardes Rodrigues Filho','jairocgr@gmail.com','SUPERADMIN',3),(15,'teste','698dc19d489c4e4db73e28a713eab07b','Teste','teste@teste.com','USUARIO',3),(16,'sebastiao','cc167a169c644de060010d3096a0d8d2','Sebastião Machado Rodrigues','seba@terra.com.br','ADMINISTRADOR',3);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'facomcrm'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-02-28 10:52:22
