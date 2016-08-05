-- MySQL dump 10.13  Distrib 5.6.27, for Win64 (x86_64)
--
-- Host: localhost    Database: pam
-- ------------------------------------------------------
-- Server version	5.6.27-log

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
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `uf` varchar(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`),
  UNIQUE KEY `uf_UNIQUE` (`uf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'Amazonas','AM');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_reserved_reserved_at_index` (`queue`,`reserved`,`reserved_at`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (15,'default','{\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"data\":{\"command\":\"O:28:\\\"portal\\\\Jobs\\\\SendWelcomeEmail\\\":5:{s:7:\\\"\\u0000*\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":2:{s:5:\\\"class\\\";s:11:\\\"portal\\\\User\\\";s:2:\\\"id\\\";i:60;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;}\"}}',0,1,1459148897,1459148863,1459148863);
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_03_03_032541_create_roles_table',2),('2016_03_03_032826_create_users_roles_table',2),('2016_03_04_185905_create_municipios_table',3),('2016_03_28_052125_create_jobs_table',4),('2016_03_28_053824_create_jobs_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipio`
--

DROP TABLE IF EXISTS `municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `municipio` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `estado_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`),
  KEY `FK_CidadeEstado_idx` (`estado_id`),
  CONSTRAINT `FK_CidadeEstado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipio`
--

LOCK TABLES `municipio` WRITE;
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
INSERT INTO `municipio` VALUES (1,'Alvarães',1),(2,'Amaturá',1),(3,'Anamã',1),(4,'Anori',1),(5,'Apuí',1),(6,'Atalaia do Norte',1),(7,'Autazes',1),(8,'Barcelos',1),(9,'Barreirinha',1),(10,'Benjamin Constant',1),(11,'Beruri',1),(12,'Boa Vista do Ramos',1),(13,'Boca do Acre',1),(14,'Borba',1),(15,'Caapiranga',1),(16,'Canutama',1),(17,'Carauari',1),(18,'Careiro',1),(19,'Careiro da Várzea',1),(20,'Coari',1),(21,'Codajás',1),(22,'Eirunepé',1),(23,'Envira',1),(24,'Fonte Boa',1),(25,'Guajará',1),(26,'Humaitá',1),(27,'Ipixuna',1),(28,'Iranduba',1),(29,'Itacoatiara',1),(30,'Itamarati',1),(31,'Itapiranga',1),(32,'Japurá',1),(33,'Juruá',1),(34,'Jutaí',1),(35,'Lábrea',1),(36,'Manacapuru',1),(37,'Manaquiri',1),(38,'Manaus',1),(39,'Manicoré',1),(40,'Maraã',1),(41,'Maués',1),(42,'Nhamundá',1),(43,'Nova Olinda do Norte',1),(44,'Novo Airão',1),(45,'Novo Aripuanã',1),(46,'Parintins',1),(47,'Pauini',1),(48,'Presidente Figueiredo',1),(49,'Rio Preto da Eva',1),(50,'Santa Isabel do Rio Negro',1),(51,'Santo Antônio do Içá',1),(52,'São Gabriel da Cachoeira',1),(53,'São Paulo de Olivença',1),(54,'São Sebastião do Uatumã',1),(55,'Silves',1),(56,'Tabatinga',1),(57,'Tapauá',1),(58,'Tefé',1),(59,'Tonantins',1),(60,'Uarini',1),(61,'Urucará',1),(62,'Urucurituba',1);
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orgao`
--

DROP TABLE IF EXISTS `orgao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orgao` (
  `id` int(11) NOT NULL,
  `nome` enum('Prefeitura','Camara') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orgao`
--

LOCK TABLES `orgao` WRITE;
/*!40000 ALTER TABLE `orgao` DISABLE KEYS */;
INSERT INTO `orgao` VALUES (1,'Prefeitura'),(2,'Camara');
/*!40000 ALTER TABLE `orgao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('erick.bogarin@gmail.com','a5932e2379d03fd8fceefec10e8697d323c7e098095792861ee329413e28952f','2016-03-27 21:12:19');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setor`
--

DROP TABLE IF EXISTS `setor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setor` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `representante` varchar(50) NOT NULL,
  `endereco` varchar(75) NOT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `horario_atendimento` varchar(20) NOT NULL,
  `orgao_id` int(11) DEFAULT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`),
  KEY `FK_SetorMunicipio_idx` (`orgao_id`),
  KEY `FK_SetorMunicipio_idx1` (`municipio_id`),
  CONSTRAINT `FK_SetorMunicipio` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_SetorOrgao` FOREIGN KEY (`orgao_id`) REFERENCES `orgao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setor`
--

LOCK TABLES `setor` WRITE;
/*!40000 ALTER TABLE `setor` DISABLE KEYS */;
/*!40000 ALTER TABLE `setor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_transparencia`
--

DROP TABLE IF EXISTS `tipo_transparencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_transparencia` (
  `id` int(11) NOT NULL,
  `nome` enum('Receitas','Despesas','Balancos','LRF - Responsabilidade Fiscal','Planejamento Orcamentario','Convenios','Contratos e Licitacoes','Servidores','Atos Oficiais','Secretarias e Orgaos') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_transparencia`
--

LOCK TABLES `tipo_transparencia` WRITE;
/*!40000 ALTER TABLE `tipo_transparencia` DISABLE KEYS */;
INSERT INTO `tipo_transparencia` VALUES (1,'Receitas'),(2,'Despesas');
/*!40000 ALTER TABLE `tipo_transparencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transparencia`
--

DROP TABLE IF EXISTS `transparencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transparencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `data` date NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `orgao_id` int(11) DEFAULT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  `usuario_id` int(10) unsigned DEFAULT NULL,
  `tipo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_TransparenciaMunicipio_idx` (`municipio_id`),
  KEY `FK_TransparenciaOrgao_idx` (`orgao_id`),
  KEY `FK_TransparenciaUsuario_idx` (`usuario_id`),
  KEY `FK_TransparenciaTipo_idx` (`tipo_id`),
  CONSTRAINT `FK_TransparenciaMunicipio` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_TransparenciaOrgao` FOREIGN KEY (`orgao_id`) REFERENCES `orgao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_TransparenciaTipo` FOREIGN KEY (`tipo_id`) REFERENCES `tipo_transparencia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_TransparenciaUsuario` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=208 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transparencia`
--

LOCK TABLES `transparencia` WRITE;
/*!40000 ALTER TABLE `transparencia` DISABLE KEYS */;
INSERT INTO `transparencia` VALUES (196,'Gastos com a copa','2016-03-24','laravel5essencial.pdf',1,38,2,1),(207,'Teste','2016-03-28','laravel-5-essencial---Copia.pdf',1,38,2,2);
/*!40000 ALTER TABLE `transparencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  `orgao_id` int(11) DEFAULT NULL,
  `conta` enum('ADMIN','EMPLOYER') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `municipio_id` (`municipio_id`),
  KEY `UsuarioOrgao_idx` (`orgao_id`),
  CONSTRAINT `UsuarioOrgao` FOREIGN KEY (`orgao_id`) REFERENCES `orgao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Erick Bogarin','erick.bogarin@gmail.com','$2a$06$W0gHVSZvryl23WKuJJIBJe8tiVKSAUe3ttq45ZuDEvjCD3ECWydPe','Vj3FJUZhNKdwdH2WmNHlQRi8JvmkYClfzdDNcdZMHjeuFbawcbJHHYXRfKNm','2016-03-06 01:09:51','2016-07-09 02:02:35',38,1,'EMPLOYER'),(3,'Chris Sevilleja','chris@scotch.io','$2y$10$l05Ctkf0w0m6MiEcYaQXRetfhMHpPw3jK5K1Ckjklv5GZJhuk.Q8.',NULL,'2016-03-06 01:09:51','2016-03-06 01:09:51',NULL,1,'EMPLOYER'),(5,'Adnan Kukic','adnan@scotch.io','$2y$10$ykRE9AKdXLFw2vu0VeTqM.MA1Y8v5I58iulsBqcR.syK8BohhHJUW',NULL,'2016-03-06 01:09:51','2016-03-06 01:09:51',NULL,1,'EMPLOYER');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_roles`
--

DROP TABLE IF EXISTS `users_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_roles`
--

LOCK TABLES `users_roles` WRITE;
/*!40000 ALTER TABLE `users_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_roles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-05  0:28:23
