/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.22-MariaDB : Database - bd-anie-pasteleria
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bd-anie-pasteleria` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `bd-anie-pasteleria`;

/*Table structure for table `categoria_producto` */

DROP TABLE IF EXISTS `categoria_producto`;

CREATE TABLE `categoria_producto` (
  `Cat_Id_Categoria` int(15) NOT NULL,
  `Cat_Nombre` varchar(20) DEFAULT NULL,
  `Cat_Descripcion` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`Cat_Id_Categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `categoria_producto` */

insert  into `categoria_producto`(`Cat_Id_Categoria`,`Cat_Nombre`,`Cat_Descripcion`) values (1,'Postres','Descripcion de Postres'),(2,'Pasteles','Descripcion de Pasteles'),(3,'Biscochos','Descripcion Biscochos'),(4,'Chocolates','Descripcion Chocolates'),(5,'Tortas','Descripcion Tortas');

/*Table structure for table `ciudad` */

DROP TABLE IF EXISTS `ciudad`;

CREATE TABLE `ciudad` (
  `Ciu_Id` int(15) NOT NULL,
  `Ciu_Nombre` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`Ciu_Id`),
  CONSTRAINT `ciudad_ibfk_2` FOREIGN KEY (`Ciu_Id`) REFERENCES `departamento` (`Dep_Id`) on delete cascade
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `ciudad` */

/*Table structure for table `departamento` */

DROP TABLE IF EXISTS `departamento`;

CREATE TABLE `departamento` (
  `Dep_Id` int(15) NOT NULL,
  `Dep_Nombre` varchar(20) DEFAULT NULL,
  `Dep_Ciu_Id` varchar(15) DEFAULT NULL,
  `Dep_Pai_Id` int(15) DEFAULT NULL,
  PRIMARY KEY (`Dep_Id`),
  KEY `Dep_Pai_Id` (`Dep_Pai_Id`),
  CONSTRAINT `departamento_ibfk_1` FOREIGN KEY (`Dep_Pai_Id`) REFERENCES `pais` (`Pai_Id`) on delete cascade
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `departamento` */

/*Table structure for table `direccion` */

DROP TABLE IF EXISTS `direccion`;

CREATE TABLE `direccion` (
  `Dir_Usu_Cedula` int(15) DEFAULT NULL,
  `Dir_Calle` varchar(15) DEFAULT NULL,
  `Dir_Carrera` varchar(15) DEFAULT NULL,
  `Dir_Numero` varchar(15) DEFAULT NULL,
  KEY `Dir_Usu_Cedula` (`Dir_Usu_Cedula`),
  CONSTRAINT `direccion_ibfk_1` FOREIGN KEY (`Dir_Usu_Cedula`) REFERENCES `usuarios` (`Usu_Cedula`) on delete cascade
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `direccion` */

/*Table structure for table `pago` */

DROP TABLE IF EXISTS `pago`;

CREATE TABLE `pago` (
  `Pag_Id_Pago` int(15) NOT NULL,
  `Pag_Forma_Pago` varchar(15) DEFAULT NULL,
  `Pag_Valor` int(10) DEFAULT NULL,
  `Pag_Comprobante` blob DEFAULT NULL,
  PRIMARY KEY (`Pag_Id_Pago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pago` */

insert  into `pago`(`Pag_Id_Pago`,`Pag_Forma_Pago`,`Pag_Valor`,`Pag_Comprobante`) values (1,'Efectivo',12000,NULL),(2,'Transferencia',50000,NULL);

/*Table structure for table `pais` */

DROP TABLE IF EXISTS `pais`;

CREATE TABLE `pais` (
  `Pai_Id` int(15) NOT NULL,
  `Pai_Nombre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Pai_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pais` */

/*Table structure for table `pedido` */

DROP TABLE IF EXISTS `pedido`;

CREATE TABLE `pedido` (
  `Ped_Id_Pedido` int(15) NOT NULL,
  `Ped_Fecha_Pedido` date DEFAULT NULL,
  `Ped_Fecha_Entrega` date DEFAULT NULL,
  `Ped_Total_Pedido` int(15) DEFAULT NULL,
  `Ped_Usu_Cedula` int(15) DEFAULT NULL,
  PRIMARY KEY (`Ped_Id_Pedido`),
  KEY `Ped_Cli_Usu_Cedula` (`Ped_Usu_Cedula`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`Ped_Usu_Cedula`) REFERENCES `usuarios` (`Usu_Cedula`) on delete cascade
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pedido` */

/*Table structure for table `pedido_producto` */

DROP TABLE IF EXISTS `pedido_producto`;

CREATE TABLE `pedido_producto` (
  `Ped_Pro_Id_Producto` int(15) DEFAULT NULL,
  `Ped_Pro_Id_Pedido` int(15) DEFAULT NULL,
  `Ped_Pro_Cantidad` varchar(10) DEFAULT NULL,
  `Ped_Pro_Valor_Numerico` int(15) DEFAULT NULL,
  `Ped_Pro_Tipo_Entrega` varchar(15) DEFAULT NULL,
  `Ped_Pro_Peso` varchar(15) DEFAULT NULL,
  KEY `Ped_Pro_Id_Producto` (`Ped_Pro_Id_Producto`),
  KEY `Ped_Pro_Id_Pedido` (`Ped_Pro_Id_Pedido`),
  CONSTRAINT `pedido_producto_ibfk_1` FOREIGN KEY (`Ped_Pro_Id_Producto`) REFERENCES `productos` (`Pro_ID_Producto`) on delete cascade,
  CONSTRAINT `pedido_producto_ibfk_2` FOREIGN KEY (`Ped_Pro_Id_Pedido`) REFERENCES `pedido` (`Ped_Id_Pedido`) on delete cascade
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pedido_producto` */

/*Table structure for table `pedido_transaciones` */

DROP TABLE IF EXISTS `pedido_transaciones`;

CREATE TABLE `pedido_transaciones` (
  `Ped_Tra_Id_Pedido` int(15) DEFAULT NULL,
  `Ped_Tra_Id_Transaciones` int(15) DEFAULT NULL,
  KEY `Ped_Tra_Id_Pedido` (`Ped_Tra_Id_Pedido`),
  KEY `Ped_Tra_Id_Transaciones` (`Ped_Tra_Id_Transaciones`),
  CONSTRAINT `pedido_transaciones_ibfk_1` FOREIGN KEY (`Ped_Tra_Id_Pedido`) REFERENCES `pedido` (`Ped_Id_Pedido` ) on delete cascade,
  CONSTRAINT `pedido_transaciones_ibfk_2` FOREIGN KEY (`Ped_Tra_Id_Transaciones`) REFERENCES `transaciones` (`Tra_Id_Transaciones`) on delete cascade
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pedido_transaciones` */

/*Table structure for table `producto_provedor` */

DROP TABLE IF EXISTS `producto_provedor`;

CREATE TABLE `producto_provedor` (
  `Pro_Pro_Id_Producto` int(15) DEFAULT NULL,
  `Pro_Pro_Id_Provedor` int(15) DEFAULT NULL,
  KEY `Pro_Pro_Id_Producto` (`Pro_Pro_Id_Producto`),
  KEY `Pro_Pro_Id_Provedor` (`Pro_Pro_Id_Provedor`),
  CONSTRAINT `producto_provedor_ibfk_1` FOREIGN KEY (`Pro_Pro_Id_Producto`) REFERENCES `productos` (`Pro_ID_Producto`) on delete cascade,
  CONSTRAINT `producto_provedor_ibfk_2` FOREIGN KEY (`Pro_Pro_Id_Provedor`) REFERENCES `provedores` (`Pro_Id_Provedor`) on delete cascade
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `producto_provedor` */

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `Pro_Id_Producto` int(15) NOT NULL,
  `Pro_Nombre` varchar(25) DEFAULT NULL,
  `Pro_Precio` int(15) DEFAULT NULL,
  `Pro_Cat_Id_Categoria` int(15) DEFAULT NULL,
  `Pro_Detalle` varchar(20) DEFAULT NULL,
  `Pro_Descripcion` varchar(50) DEFAULT NULL,
  `Pro_Estado` varchar(15) DEFAULT NULL,
  `Pro_Foto_Producto` blob DEFAULT NULL,
  PRIMARY KEY (`Pro_Id_Producto`),
  KEY `Pro_Cat_Id_Categoria` (`Pro_Cat_Id_Categoria`),
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`Pro_Cat_Id_Categoria`) REFERENCES `categoria_producto` (`Cat_Id_Categoria`) on delete cascade
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `productos` */

insert  into `productos`(`Pro_Id_Producto`,`Pro_Nombre`,`Pro_Precio`,`Pro_Cat_Id_Categoria`,`Pro_Detalle`,`Pro_Descripcion`,`Pro_Estado`,`Pro_Foto_Producto`) values (1,'Cakey',12000,3,'2 Libras','Chocolate','Propio',NULL),(2,'Galletas',2000,1,'1 Libra','Vainilla','Propio',NULL),(5,'Torta',15000,2,'5 Libras','Descripcion','Propio',NULL);

/*Table structure for table `provedores` */

DROP TABLE IF EXISTS `provedores`;

CREATE TABLE `provedores` (
  `Pro_Id_Provedor` int(15) NOT NULL,
  `Pro_Telefono` bigint(15) DEFAULT NULL,
  `Pro_Correo` varchar(20) DEFAULT NULL,
  `Pro_Razon_Social` varchar(20) DEFAULT NULL,
  `Pro_Direccion` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`Pro_Id_Provedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `provedores` */

insert  into `provedores`(`Pro_Id_Provedor`,`Pro_Telefono`,`Pro_Correo`,`Pro_Razon_Social`,`Pro_Direccion`) values (1,310223298,'provedor@gmai.com','prueba.SA','Calle 33 # 16'),(5,323245437,'provedor@gmai.com','prueba.SA','Calle 33 # 12');

/*Table structure for table `recibo` */

DROP TABLE IF EXISTS `recibo`;

CREATE TABLE `recibo` (
  `Rec_Consecutivo` varchar(15) NOT NULL,
  PRIMARY KEY (`Rec_Consecutivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `recibo` */

/*Table structure for table `rol` */

DROP TABLE IF EXISTS `rol`;

CREATE TABLE `rol` (
  `Rol_Usu_Cedula` int(15) DEFAULT NULL,
  `Rol_Administrador` varchar(20) DEFAULT NULL,
  `Rol_Cliente` varchar(20) DEFAULT NULL,
  KEY `Rol_Usu_Cedula` (`Rol_Usu_Cedula`),
  CONSTRAINT `rol_ibfk_1` FOREIGN KEY (`Rol_Usu_Cedula`) REFERENCES `usuarios` (`Usu_Cedula`) on delete cascade
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `rol` */

/*Table structure for table `telefono` */

DROP TABLE IF EXISTS `telefono`;

CREATE TABLE `telefono` (
  `Tel_Usu_Cedula` int(15) DEFAULT NULL,
  `Tel_Fijo` int(15) DEFAULT NULL,
  `Tel_Celular` int(15) DEFAULT NULL,
  KEY `Tel_Celular` (`Tel_Celular`),
  KEY `telefono_ibfk_1` (`Tel_Usu_Cedula`),
  CONSTRAINT `telefono_ibfk_1` FOREIGN KEY (`Tel_Usu_Cedula`) REFERENCES `usuarios` (`Usu_Cedula`) on delete cascade
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `telefono` */

/*Table structure for table `trabajadores` */

DROP TABLE IF EXISTS `trabajadores`;

CREATE TABLE `trabajadores` (
  `Tra_Usu_Cedula` int(15) DEFAULT NULL,
  `Tra_Area` varchar(15) DEFAULT NULL,
  `Tra_Cargo` varchar(15) DEFAULT NULL,
  `Tra_Sexo` varchar(15) DEFAULT NULL,
  `Tra_Salario` int(15) DEFAULT NULL,
  KEY `Tra_Usu_Cedula` (`Tra_Usu_Cedula`),
  CONSTRAINT `trabajadores_ibfk_1` FOREIGN KEY (`Tra_Usu_Cedula`) REFERENCES `usuarios` (`Usu_Cedula`) on delete cascade
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `trabajadores` */

insert  into `trabajadores`(`Tra_Usu_Cedula`,`Tra_Area`,`Tra_Cargo`,`Tra_Sexo`,`Tra_Salario`) values (1238232,'horno','supervisor','M',120000),(19823930,'Ventas','supervisor','F',1000000);

/*Table structure for table `transaciones` */

DROP TABLE IF EXISTS `transaciones`;

CREATE TABLE `transaciones` (
  `Tra_Id_Transaciones` int(11) NOT NULL,
  `Tra_Fecha` date DEFAULT NULL,
  `Tra_Pag_Id_Pago` int(15) DEFAULT NULL,
  PRIMARY KEY (`Tra_Id_Transaciones`),
  KEY `Tra_Pag_Id_Pago` (`Tra_Pag_Id_Pago`),
  CONSTRAINT `transaciones_ibfk_1` FOREIGN KEY (`Tra_Pag_Id_Pago`) REFERENCES `pago` (`Pag_Id_Pago`) on delete cascade
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `transaciones` */

/*Table structure for table `transaciones_recibo` */

DROP TABLE IF EXISTS `transaciones_recibo`;

CREATE TABLE `transaciones_recibo` (
  `Tra_Rec_Id_Transaciones` int(15) DEFAULT NULL,
  `Tra_Rec_Consecutivo` varchar(20) DEFAULT NULL,
  KEY `Tra_Rec_Id_Transaciones` (`Tra_Rec_Id_Transaciones`),
  KEY `Tra_Rec_Consecutivo` (`Tra_Rec_Consecutivo`),
  CONSTRAINT `transaciones_recibo_ibfk_1` FOREIGN KEY (`Tra_Rec_Id_Transaciones`) REFERENCES `transaciones` (`Tra_Id_Transaciones`) on delete cascade,
  CONSTRAINT `transaciones_recibo_ibfk_2` FOREIGN KEY (`Tra_Rec_Consecutivo`) REFERENCES `recibo` (`Rec_Consecutivo`) on delete cascade
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `transaciones_recibo` */

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `Usu_Cedula` int(15) NOT NULL,
  `Usu_Nombre` varchar(20) DEFAULT NULL,
  `Usu_Apellido` varchar(20) DEFAULT NULL,
  `Usu_Telefono` bigint(15) DEFAULT NULL,
  `Usu_Usuario` varchar(15) DEFAULT NULL,
  `Usu_Contraseña` int(15) DEFAULT NULL,
  `Usu_Fecha` date DEFAULT NULL,
  `Usu_Email` varchar(25) DEFAULT NULL,
  `Usu_Rol` varchar(15) DEFAULT NULL,
  `Usu_Direccion` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Usu_Cedula`),
  KEY `Usu_Crea_Usuario` (`Usu_Usuario`),
  KEY `Usu_Telefono` (`Usu_Telefono`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `usuarios` */

insert  into `usuarios`(`Usu_Cedula`,`Usu_Nombre`,`Usu_Apellido`,`Usu_Telefono`,`Usu_Usuario`,`Usu_Contraseña`,`Usu_Fecha`,`Usu_Email`,`Usu_Rol`,`Usu_Direccion`) values (1238232,'Anna','Perez',2147483646,'Anaa',0,'2022-02-26','ana@gmail.com','Administrador',NULL),(19823930,'Sofia','Marin',30244678,'Marin123',0,'0000-00-00','maria@gmail.com','Trabajador',NULL),(1006817345,'Adonis','Bustamante',2147483647,'Ozaky06',0,'2022-02-23','adonisxavier06@gmail.com','Administrador',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
