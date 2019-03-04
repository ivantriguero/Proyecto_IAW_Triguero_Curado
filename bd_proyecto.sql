-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: mercado
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

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
-- Table structure for table `incluyen`
--

DROP TABLE IF EXISTS `incluyen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incluyen` (
  `cod_producto` int(11) NOT NULL DEFAULT '0',
  `cod_pedido` int(11) NOT NULL DEFAULT '0',
  `Unidades` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_producto`,`cod_pedido`),
  KEY `cod_pedido` (`cod_pedido`),
  CONSTRAINT `incluyen_ibfk_1` FOREIGN KEY (`cod_producto`) REFERENCES `productos` (`cod_producto`),
  CONSTRAINT `incluyen_ibfk_2` FOREIGN KEY (`cod_pedido`) REFERENCES `pedidos` (`cod_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incluyen`
--

LOCK TABLES `incluyen` WRITE;
/*!40000 ALTER TABLE `incluyen` DISABLE KEYS */;
/*!40000 ALTER TABLE `incluyen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos` (
  `cod_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `cod_usuario` int(11) DEFAULT NULL,
  `precio` decimal(6,2) DEFAULT NULL,
  `productos` varchar(20000) DEFAULT NULL,
  PRIMARY KEY (`cod_pedido`),
  KEY `cod_usuario` (`cod_usuario`),
  CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`cod_usuario`) REFERENCES `usuarios` (`cod_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (13,'2019-03-03',18,12.00,' 27(4)'),(16,'2019-03-03',18,6.00,' 28(4) 33(2)'),(17,'2019-03-03',18,117.00,' 27(2) 26(1) 33(5) 27(1) 27(10) 26(1) 28(40) 33(11)'),(19,'2019-03-03',18,5.00,' 28(5)'),(20,'2019-03-03',18,4.00,' 28(4)'),(21,'2019-03-03',18,1.00,' 28(1)'),(22,'2019-03-03',16,45.00,' 27(11) 33(12)'),(23,'2019-03-03',16,45.00,''),(24,'2019-03-03',16,45.00,''),(25,'2019-03-03',16,261.00,' 27(87)');
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `cod_producto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) DEFAULT NULL,
  `precio` decimal(4,2) DEFAULT NULL,
  `cod_proveedor` int(11) DEFAULT NULL,
  `imagen` longblob,
  `stock` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_producto`),
  KEY `cod_proveedor` (`cod_proveedor`),
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`cod_proveedor`) REFERENCES `proveedores` (`cod_proveedor`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedores` (
  `cod_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `tlf` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedores`
--

LOCK TABLES `proveedores` WRITE;
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `cod_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `passwd` varchar(128) NOT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `tipo` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`cod_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (16,'antonio','202cb962ac59075b964b07152d234b70','perez','calle antonio n 1','antonio@perez.com','cliente'),(17,'antonio','202cb962ac59075b964b07152d234b70','perez','calle antonio n 1','antonio1@perez.com','administrador'),(18,'Iván','827ccb0eea8a706c4c34a16891f84e7b','Triguero','C//Picasso Nº1','ivantriguero17@gmail.com','administrador');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-04 19:37:29
