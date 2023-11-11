-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: db_senac
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comentarios` (
  `idComentarios` int NOT NULL AUTO_INCREMENT,
  `comentario` varchar(150) DEFAULT NULL,
  `Usuarios_idUsuarios` int NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `data_comentario` timestamp NULL DEFAULT NULL,
  `Cursos_idCursos` int NOT NULL,
  PRIMARY KEY (`idComentarios`,`Cursos_idCursos`),
  KEY `fk_Comentarios_Usuarios1_idx` (`Usuarios_idUsuarios`),
  KEY `fk_Comentarios_Cursos1_idx` (`Cursos_idCursos`),
  CONSTRAINT `fk_Comentarios_Cursos1` FOREIGN KEY (`Cursos_idCursos`) REFERENCES `cursos` (`idCursos`),
  CONSTRAINT `fk_Comentarios_Usuarios1` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `usuarios` (`idUsuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
INSERT INTO `comentarios` VALUES (2,'Boa aula professor',3,'Matheus15','2023-08-14 17:43:55',2),(3,'fala professor estou em duvida em questão pode me ajudar?',4,'Edu','2023-08-14 17:46:33',2);
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cursos` (
  `idCursos` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `descrição` varchar(255) DEFAULT NULL,
  `Categoria` varchar(45) DEFAULT NULL,
  `Usuarios_idUsuarios` int NOT NULL,
  PRIMARY KEY (`idCursos`),
  KEY `fk_Cursos_Usuarios1_idx` (`Usuarios_idUsuarios`),
  CONSTRAINT `fk_Cursos_Usuarios1` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `usuarios` (`idUsuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (2,'Técnico em adm','1800 horas\r\nteorias administrativas\r\npraticas com documentação\r\npraticas em sistemas de gerenciamento','adm',1),(3,'escrivao da caixa','800 horas\r\nteorias administrativas\r\nportugues\r\nmatematica','bancario',1),(4,'analista de TI banco do brasil','800 horas\r\nportugues\r\nmatematica\r\nweb,java 8 e 11,python ,swift','tecnologia',1),(5,'Funarte engenharias','1500 horas\r\nportugues\r\nmatematica\r\nconhecimentos especificos','engenharia',2),(6,'EEAR','1500 horas\r\nportugues\r\nmatematica\r\nfisica\r\ninglês','militar',1),(9,'Hospital santa helena','portugues, matematica, conhecimentos especificos para cada área.','medicinal',2),(10,'PM-DF','portugues,matematica,conhecimentos especificos.','direito',2);
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `idUsuarios` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `logradouro` varchar(45) DEFAULT NULL,
  `uf` varchar(45) DEFAULT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `imagem` longblob,
  `tipo_usuario` int DEFAULT NULL,
  `sobre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idUsuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Professor1','andremourao123','04627213026','61 993838031','professor8@gmail.com','2019-03-11','Brasília','Asa Norte','05','04','CLN 403 Bloco E','DF','70835-550',_binary '../img/alunosimg/Main2.jpg',1,'Sou formado em sistema de informação e tenho pos em arquitetura de software'),(2,'professor2','katarina123','85095387000','99999000','professor1@gmail.com','2008-07-17','Brasília','Asa Sul','08','b5','SQS 411 Bloco A','DF','70277-010',_binary '../img/alunosimg/mulheres-profissionas0303.jpg',1,'Sou katarina pretendo seguir carreira de ADM'),(3,'Matheus15','matheus123','75250480020','88881646','Matheus@gmail.com','2017-07-14','Brasília','Samambaia Norte (Samambaia)','05','07','QN 425 Área Especial 2 Escola Classe 425','DF','72327-512',_binary '../img/alunosimg/download.jfif',0,'ola meu nome é matheus'),(4,'Edu','edu123','87797596026','618641635','aluno2@gmail27.com','2003-02-12','Brasília','Setor de Habitações Individuais Sul','18','156','SHDB QL 32 Conjunto 3','DF','71676-115',_binary '../img/alunosimg/3460658-asian-male-student-portrait-isolated-on-blue-background-foto.jpg',0,'Meu nome é edu sou , estou concursando adm na Brasil concursos'),(11,'aluno1','senha123','123.456.789-09','987654321','aluno1@example.com','1980-01-01','Cidade A','Bairro X','Apto 101','123','Rua Principal','UF','12345-678',NULL,0,'Sou um professor experiente.'),(12,'aluno2','senha456','987.654.321-09','123456789','aluno2@example.com','1975-05-15','Cidade B','Bairro Y','Casa 20','456','Rua Secundária','UF','98765-432',NULL,0,'Ensino há mais de 10 anos.'),(13,'aluno3','senha789','654.321.098-76','543216789','aluno3@example.com','1990-11-20','Cidade C','Bairro Z','Bloco 5','789','Avenida Central','UF','54321-678',NULL,0,'Especializado em ciências.'),(14,'Professor 4','senhaabc','890.123.456-78','678901234','professor4@example.com','1988-07-03','Cidade D','Bairro W','Sala 15','987','Rua Secundária','UF','89012-345',NULL,1,'Mestre em matemática.'),(15,'Professor 5','senhaxyz','567.890.123-45','345678901','professor5@example.com','1985-03-10','Cidade E','Bairro V','Andar 7','654','Avenida Principal','UF','56789-012',NULL,0,'Autor de diversos artigos acadêmicos.'),(16,'Professor 1','senha123','123.456.789-09','987654321','professor1@example.com','1980-01-01','Cidade A','Bairro X','Apto 101','123','Rua Principal','UF','12345-678',NULL,1,'Sou um professor experiente.'),(17,'Professor 2','senha456','987.654.321-09','123456789','professor2@example.com','1975-05-15','Cidade B','Bairro Y','Casa 20','456','Rua Secundária','UF','98765-432',NULL,1,'Ensino há mais de 10 anos.'),(18,'Professor 3','senha789','654.321.098-76','543216789','professor3@example.com','1990-11-20','Cidade C','Bairro Z','Bloco 5','789','Avenida Central','UF','54321-678',NULL,0,'Especializado em ciências.'),(19,'Professor 4','senhaabc','890.123.456-78','678901234','professor4@example.com','1988-07-03','Cidade D','Bairro W','Sala 15','987','Rua Secundária','UF','89012-345',NULL,1,'Mestre em matemática.'),(20,'Professor 5','senhaxyz','567.890.123-45','345678901','professor5@example.com','1985-03-10','Cidade E','Bairro V','Andar 7','654','Avenida Principal','UF','56789-012',NULL,0,'Autor de diversos artigos acadêmicos.'),(21,'Professor 1','senha123','123.456.789-09','987654321','professor1@example.com','1980-01-01','Cidade A','Bairro X','Apto 101','123','Rua Principal','UF','12345-678',NULL,0,'Sou um professor experiente.'),(22,'Professor 2','senha456','987.654.321-09','123456789','professor2@example.com','1975-05-15','Cidade B','Bairro Y','Casa 20','456','Rua Secundária','UF','98765-432',NULL,0,'Ensino há mais de 10 anos.'),(23,'Professor 3','senha789','654.321.098-76','543216789','professor3@example.com','1990-11-20','Cidade C','Bairro Z','Bloco 5','789','Avenida Central','UF','54321-678',NULL,0,'Especializado em ciências.'),(24,'Professor 4','senhaabc','890.123.456-78','678901234','professor4@example.com','1988-07-03','Cidade D','Bairro W','Sala 15','987','Rua Secundária','UF','89012-345',NULL,0,'Mestre em matemática.'),(25,'Professor 5','senhaxyz','567.890.123-45','345678901','professor5@example.com','1985-03-10','Cidade E','Bairro V','Andar 7','654','Avenida Principal','UF','56789-012',NULL,0,'Autor de diversos artigos acadêmicos.'),(26,'Professor 1','senha123','123.456.789-09','987654321','professor1@example.com','1980-01-01','Cidade A','Bairro X','Apto 101','123','Rua Principal','UF','12345-678',NULL,0,'Sou um professor experiente.'),(27,'Professor 2','senha456','987.654.321-09','123456789','professor2@example.com','1975-05-15','Cidade B','Bairro Y','Casa 20','456','Rua Secundária','UF','98765-432',NULL,0,'Ensino há mais de 10 anos.'),(28,'Professor 3','senha789','654.321.098-76','543216789','professor3@example.com','1990-11-20','Cidade C','Bairro Z','Bloco 5','789','Avenida Central','UF','54321-678',NULL,0,'Especializado em ciências.'),(29,'Professor 4','senhaabc','890.123.456-78','678901234','professor4@example.com','1988-07-03','Cidade D','Bairro W','Sala 15','987','Rua Secundária','UF','89012-345',NULL,0,'Mestre em matemática.');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `video` (
  `idvideo` int NOT NULL AUTO_INCREMENT,
  `link` varchar(400) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descrição` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `duracao` varchar(45) DEFAULT NULL,
  `thumb` longblob,
  `Cursos_idCursos` int NOT NULL,
  PRIMARY KEY (`idvideo`,`Cursos_idCursos`),
  KEY `fk_video_Cursos1_idx` (`Cursos_idCursos`),
  CONSTRAINT `fk_video_Cursos1` FOREIGN KEY (`Cursos_idCursos`) REFERENCES `cursos` (`idCursos`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video`
--

LOCK TABLES `video` WRITE;
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
INSERT INTO `video` VALUES (4,'https://www.youtube.com/embed/rdAIUcPqpTY','DESCRIÇÂO DOS ELEMENTOS EXCEL 365','Neste vídeo introdutório do Excel, iremos aprender a identificar os elementos da tela inicial, apesar de básico, é muito importante saber identificar os elementos da tela. Aprenda Excel conosco. Acompanhe a série desde o Excel Básico até o Excel Avançado. Bem vindos! Professor Clenio Emidio','0h 4m 21s',_binary '../img/thumb/Excel 03.jpg',2),(5,'https://www.youtube.com/embed/cveufkhb-RA','10 OPÇÕES DE SOMA E AUTOSOMA EXCEL ','Neste vídeo tratamos de 10 opções distintas para efetuarmos a soma de valores, seja na vertical ou horizontal de células em uma planilha do Excel. Confira! Gostaria de aprender mais sobre o Excel? Aguarde que iremos publicar mais vídeos como este! Bons estudos!','0h 13m 12s',_binary '../img/thumb/comprar.png',2),(6,'https://www.youtube.com/embed/hpayJq30ax4','FUNÇÃO SE - EXCEL ','Entenda a função SE no Excel com exemplos práticos de 2 , 3 e 4 condições distintas. Gostaria de aprender Excel?  Então assista os vídeos do canal, pretendemos postar um vídeo novo por semana! Fique ligado!','0h 29m 33s',_binary '../img/thumb/comprar (1).png',2),(8,'https://www.youtube.com/embed/QOiwGrjwSbY','FUNÇÃO PROCV - EXCEL','Entenda como funciona a função PROCV no Excel baseado em 3 exemplos bem práticos e resumidos. Também verá uma breve comparação com a função SE. Veja outros vídeos sobre Excel em nosso canal! Trabalhamos com treinamentos presenciais e online. Entre em contato conosco!','0h 12m 49s',_binary '../img/thumb/comprar.jpg',2);
/*!40000 ALTER TABLE `video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visualizacao`
--

DROP TABLE IF EXISTS `visualizacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `visualizacao` (
  `idvisualizacao` int NOT NULL AUTO_INCREMENT,
  `assistido` tinyint(1) DEFAULT NULL,
  `data_assistido` date DEFAULT NULL,
  `video_idvideo` int NOT NULL,
  `video_Cursos_idCursos` int NOT NULL,
  `usuarios_idUsuarios` int NOT NULL,
  PRIMARY KEY (`idvisualizacao`,`video_idvideo`,`video_Cursos_idCursos`,`usuarios_idUsuarios`),
  KEY `fk_visualizacao_video1_idx` (`video_idvideo`,`video_Cursos_idCursos`),
  KEY `fk_visualizacao_usuarios1_idx` (`usuarios_idUsuarios`),
  CONSTRAINT `fk_visualizacao_usuarios1` FOREIGN KEY (`usuarios_idUsuarios`) REFERENCES `usuarios` (`idUsuarios`),
  CONSTRAINT `fk_visualizacao_video1` FOREIGN KEY (`video_idvideo`, `video_Cursos_idCursos`) REFERENCES `video` (`idvideo`, `Cursos_idCursos`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visualizacao`
--

LOCK TABLES `visualizacao` WRITE;
/*!40000 ALTER TABLE `visualizacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `visualizacao` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-17 14:38:43
