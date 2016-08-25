/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : pace

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-08-25 00:08:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for p_actividad
-- ----------------------------
DROP TABLE IF EXISTS `p_actividad`;
CREATE TABLE `p_actividad` (
  `P_ID_ACTIVIDAD` int(11) NOT NULL,
  `P_ID_PROYECTO` int(11) NOT NULL,
  `P_NOMBRE_ACTIVIDAD` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `P_RESPONSABLE_ACTIVIDAD` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `P_FECHA_INICIO` date NOT NULL,
  `P_FECHA_TERMINO` date NOT NULL,
  `P_VALOR` int(11) NOT NULL,
  `P_PORC_AVANCE` int(11) NOT NULL,
  `P_NIVEL_ACTIVIDAD` int(11) NOT NULL,
  `P_DESCRIPCION` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `P_ID_COMPONENTE` int(11) NOT NULL,
  `P_ID_ESTRATEGIA` int(11) NOT NULL,
  `P_SEM_EJECUTADAS` int(11) NOT NULL,
  PRIMARY KEY (`P_ID_ACTIVIDAD`),
  KEY `P_ID_COMPONENTE` (`P_ID_COMPONENTE`),
  KEY `P_ID_ESTRATEGIA` (`P_ID_ESTRATEGIA`),
  KEY `P_RESPONSABLE_ACTIVIDAD` (`P_RESPONSABLE_ACTIVIDAD`),
  CONSTRAINT `FK_ACTIVIDAD_COMPONENTE` FOREIGN KEY (`P_ID_COMPONENTE`) REFERENCES `p_componente` (`P_ID_COMPONENTE`),
  CONSTRAINT `FK_ACTIVIDAD_ESTRATEGIA` FOREIGN KEY (`P_ID_ESTRATEGIA`) REFERENCES `p_estrategia` (`P_ID_ESTRATEGIA`),
  CONSTRAINT `FK_RUT_RESPONSABLE` FOREIGN KEY (`P_RESPONSABLE_ACTIVIDAD`) REFERENCES `p_usuario` (`P_RUT_RESPONSABLE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of p_actividad
-- ----------------------------
INSERT INTO `p_actividad` VALUES ('1', '1', 'primera actividad', '166219132', '2016-08-09', '2016-11-16', '10000', '10', '1', 'prueba', '1', '1', '14');
INSERT INTO `p_actividad` VALUES ('2', '1', 'segunda actividad', '166219132', '2016-08-09', '2016-11-16', '10000', '100', '1', 'prueba', '1', '1', '14');
INSERT INTO `p_actividad` VALUES ('3', '1', 'tercera actividad', '166219132', '2016-08-09', '2016-11-16', '10000', '100', '1', 'prueba', '1', '1', '14');
INSERT INTO `p_actividad` VALUES ('4', '1', 'primera actividad dos', '166219132', '2016-08-09', '2016-11-16', '10000', '50', '1', 'prueba', '2', '2', '1');
INSERT INTO `p_actividad` VALUES ('5', '1', 'segunda actividad dos', '166219132', '2016-08-09', '2016-11-16', '10000', '50', '1', 'prueba', '2', '2', '1');
INSERT INTO `p_actividad` VALUES ('6', '1', 'primera actividad tres', '166219132', '2016-08-09', '2016-11-16', '10000', '10', '1', 'prueba', '3', '3', '1');
INSERT INTO `p_actividad` VALUES ('7', '1', 'segunda actividad tres', '166219132', '2016-08-09', '2016-11-16', '10000', '10', '1', 'prueba', '3', '3', '1');
INSERT INTO `p_actividad` VALUES ('8', '1', 'primera actividad cuatro', '166219132', '2016-08-09', '2016-11-16', '10000', '10', '1', 'prueba', '4', '3', '1');
INSERT INTO `p_actividad` VALUES ('9', '1', 'segunda actividad cuatro', '166219132', '2016-08-09', '2016-11-16', '10000', '10', '1', 'prueba', '4', '3', '1');
INSERT INTO `p_actividad` VALUES ('10', '2', 'NUEVA ACTIVIDAD', '166219132', '2016-08-16', '2016-08-23', '0', '0', '0', 'prueba', '6', '5', '1');
INSERT INTO `p_actividad` VALUES ('11', '3', 'ACTIVIDAD 1 DE PRUEBA', '166219132', '2016-08-16', '2016-08-23', '0', '0', '0', 'DESCRIPCIÓN PRUEBA', '7', '6', '0');

-- ----------------------------
-- Table structure for p_clasificacion_item
-- ----------------------------
DROP TABLE IF EXISTS `p_clasificacion_item`;
CREATE TABLE `p_clasificacion_item` (
  `P_CLASIFICACION_ITEM` int(11) NOT NULL,
  `P_NOMBRE_CLASIFICACION_ITEM` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`P_CLASIFICACION_ITEM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of p_clasificacion_item
-- ----------------------------
INSERT INTO `p_clasificacion_item` VALUES ('1', 'Tecnologia');

-- ----------------------------
-- Table structure for p_componente
-- ----------------------------
DROP TABLE IF EXISTS `p_componente`;
CREATE TABLE `p_componente` (
  `P_ID_COMPONENTE` int(11) NOT NULL,
  `P_NOMBRE_COMPONENTE` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `P_VALOR_ASIGNADO` int(11) DEFAULT NULL,
  `P_TIEMPO_ASIGNADO` int(11) DEFAULT NULL,
  `P_ID_PROYECTO` int(11) NOT NULL,
  `P_ID_ESTRATEGIA` int(11) NOT NULL,
  `P_ID_RESPONSABLE` int(11) NOT NULL,
  PRIMARY KEY (`P_ID_COMPONENTE`),
  KEY `P_ID_PROYECTO` (`P_ID_PROYECTO`) USING BTREE,
  KEY `P_ID_ESTRATEGIA` (`P_ID_ESTRATEGIA`),
  CONSTRAINT `FK_COMPONENTES_ESTRATEGIA` FOREIGN KEY (`P_ID_ESTRATEGIA`) REFERENCES `p_estrategia` (`P_ID_ESTRATEGIA`),
  CONSTRAINT `FK_COMPONENTES_PROYECTO` FOREIGN KEY (`P_ID_PROYECTO`) REFERENCES `p_proyecto` (`P_ID_PROYECTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of p_componente
-- ----------------------------
INSERT INTO `p_componente` VALUES ('1', 'COMPONENTE DE PRUEBA 1', '5000', '50', '1', '1', '1');
INSERT INTO `p_componente` VALUES ('2', 'COMPONENTE DE PRUEBA 2', '5000', '50', '1', '1', '1');
INSERT INTO `p_componente` VALUES ('3', 'COMPONENTE DE PRUEBA 3', '5000', '50', '1', '2', '1');
INSERT INTO `p_componente` VALUES ('4', 'COMPONENTE DE PRUEBA 4', '5000', '50', '1', '3', '1');
INSERT INTO `p_componente` VALUES ('5', 'NUEVO COMPONENTE', null, null, '1', '4', '2');
INSERT INTO `p_componente` VALUES ('6', 'componente secreto', null, null, '2', '5', '2');
INSERT INTO `p_componente` VALUES ('7', 'COMPONENTE DE PRUEBA', null, null, '3', '6', '2');

-- ----------------------------
-- Table structure for p_estrategia
-- ----------------------------
DROP TABLE IF EXISTS `p_estrategia`;
CREATE TABLE `p_estrategia` (
  `P_ID_ESTRATEGIA` int(11) NOT NULL,
  `P_NOMBRE_ESTRATEGIA` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `P_ABREVIACION_ESTRATEGIA` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `P_ID_PROYECTO` int(11) DEFAULT NULL,
  `P_ID_RESPONSABLE` int(11) NOT NULL,
  PRIMARY KEY (`P_ID_ESTRATEGIA`),
  KEY `P_ID_PROYECTO` (`P_ID_PROYECTO`),
  KEY `P_ID_RESPONSABLE` (`P_ID_RESPONSABLE`),
  CONSTRAINT `FK_ESTRATEGIA_PROYECTO` FOREIGN KEY (`P_ID_PROYECTO`) REFERENCES `p_proyecto` (`P_ID_PROYECTO`),
  CONSTRAINT `FK_ID_USUARIO` FOREIGN KEY (`P_ID_RESPONSABLE`) REFERENCES `p_usuario` (`P_ID_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of p_estrategia
-- ----------------------------
INSERT INTO `p_estrategia` VALUES ('1', 'ESTRATEGIA 1', 'PAAD', '1', '1');
INSERT INTO `p_estrategia` VALUES ('2', 'ESTRATEGIA 2', 'PPV', '1', '1');
INSERT INTO `p_estrategia` VALUES ('3', 'ESTRATEGIA 3', 'VEC', '1', '1');
INSERT INTO `p_estrategia` VALUES ('4', 'ESTRATEGIA 5', 'NEWARE', '1', '2');
INSERT INTO `p_estrategia` VALUES ('5', 'nueva estrategia', 'NEWFER', '2', '2');
INSERT INTO `p_estrategia` VALUES ('6', 'ESTRATEGIA DE PRUEBA', 'E01', '3', '2');

-- ----------------------------
-- Table structure for p_gasto_item
-- ----------------------------
DROP TABLE IF EXISTS `p_gasto_item`;
CREATE TABLE `p_gasto_item` (
  `P_ID_ITEM` int(11) NOT NULL,
  `P_ID_ACTIVIDAD` int(11) NOT NULL,
  `P_COSTO_PLANIF` int(11) NOT NULL,
  `P_COSTO` int(11) NOT NULL,
  `P_CLASIFICACION_ITEM` int(11) NOT NULL,
  `P_DETALLE_ITEM` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `P_ID_TIPO_GASTO` int(11) NOT NULL,
  `P_ID_ITEM_TIPO_GASTO` int(11) NOT NULL,
  PRIMARY KEY (`P_ID_ITEM`),
  KEY `P_ID_ACTIVIDAD` (`P_ID_ACTIVIDAD`),
  KEY `P_CLASIFICACION_ITEM` (`P_CLASIFICACION_ITEM`),
  KEY `P_ID_TIPO_GASTO` (`P_ID_TIPO_GASTO`),
  CONSTRAINT `FK_CLASIF_ITEM` FOREIGN KEY (`P_CLASIFICACION_ITEM`) REFERENCES `p_clasificacion_item` (`P_CLASIFICACION_ITEM`),
  CONSTRAINT `FK_GASTO_ITEM_ACTIVIDAD` FOREIGN KEY (`P_ID_ACTIVIDAD`) REFERENCES `p_actividad` (`P_ID_ACTIVIDAD`),
  CONSTRAINT `FK_ID_TIPO_GASTO` FOREIGN KEY (`P_ID_TIPO_GASTO`) REFERENCES `p_tipo_gasto` (`P_ID_TIPO_GASTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of p_gasto_item
-- ----------------------------
INSERT INTO `p_gasto_item` VALUES ('1', '1', '100000', '80000', '1', 'Equipos Computacionales para la implementacion del protecto', '1', '3');
INSERT INTO `p_gasto_item` VALUES ('2', '1', '100000', '70000', '1', 'Pantallas FullHD LG', '1', '3');

-- ----------------------------
-- Table structure for p_item_tipo_gasto
-- ----------------------------
DROP TABLE IF EXISTS `p_item_tipo_gasto`;
CREATE TABLE `p_item_tipo_gasto` (
  `P_ID_ITEM_TIPO_GASTO` int(11) NOT NULL,
  `P_NOMBRE_ITEM_TIPO_GASTO` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `P_ID_TIPO:_GASTO` int(11) DEFAULT NULL,
  PRIMARY KEY (`P_ID_ITEM_TIPO_GASTO`),
  KEY `P_ID_TIPO:_GASTO` (`P_ID_TIPO:_GASTO`),
  CONSTRAINT `FK_ITEM_TIPO_GASTO` FOREIGN KEY (`P_ID_TIPO:_GASTO`) REFERENCES `p_tipo_gasto` (`P_ID_TIPO_GASTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of p_item_tipo_gasto
-- ----------------------------
INSERT INTO `p_item_tipo_gasto` VALUES ('1', 'Bienes', '1');
INSERT INTO `p_item_tipo_gasto` VALUES ('2', 'Obras Menores', '1');
INSERT INTO `p_item_tipo_gasto` VALUES ('3', 'Servicios de consultoría', '1');
INSERT INTO `p_item_tipo_gasto` VALUES ('4', 'Servicios de no consultoría', '1');
INSERT INTO `p_item_tipo_gasto` VALUES ('5', 'Otros Servicios', '2');

-- ----------------------------
-- Table structure for p_proyecto
-- ----------------------------
DROP TABLE IF EXISTS `p_proyecto`;
CREATE TABLE `p_proyecto` (
  `P_ID_PROYECTO` int(11) NOT NULL,
  `P_NOMBRE_PROYECTO` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `P_CODIGO_PROYECTO` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `P_ID_USUARIO_RESPONSABLE` int(11) NOT NULL,
  `P_RUT_RESPONSABLE` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `P_NOMBRE_RESPONSABLE` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `P_FECHA_INICIO` date NOT NULL,
  `P_FECHA_TERMINO` date NOT NULL,
  `P_VALOR` int(11) NOT NULL,
  `P_PORC_AVANCE` int(11) NOT NULL,
  `P_DESCRIPCION` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`P_ID_PROYECTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of p_proyecto
-- ----------------------------
INSERT INTO `p_proyecto` VALUES ('1', 'PROYECTO 1', 'UCS - 1677', '2', '166219132', 'Francisco', '2016-08-09', '2016-08-16', '100000', '10', 'DESCRIPCION');
INSERT INTO `p_proyecto` VALUES ('2', 'PROYECTO FERNANDO', '', '2', '166219132', 'Francisco', '2016-08-16', '2016-08-23', '100', '0', 'prueba');
INSERT INTO `p_proyecto` VALUES ('3', 'PROYECTO DE PRUEBA', '', '2', '166219132', 'Francisco', '2016-08-16', '2016-08-23', '500000', '0', 'DESCRIPCION DE PRUEBA');

-- ----------------------------
-- Table structure for p_resultado
-- ----------------------------
DROP TABLE IF EXISTS `p_resultado`;
CREATE TABLE `p_resultado` (
  `P_ID_RESULTADO` int(11) NOT NULL,
  `P_DESCRIPCION_RESULTADO` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `P_ID_ACTIVIDAD` int(11) DEFAULT NULL,
  `P_ID_COMPONENTE` int(11) DEFAULT NULL,
  `P_ID_ESTRATEGIA` int(11) DEFAULT NULL,
  `P_ID_PROYECTO` int(11) DEFAULT NULL,
  PRIMARY KEY (`P_ID_RESULTADO`),
  KEY `P_ID_ACTIVIDAD` (`P_ID_ACTIVIDAD`),
  KEY `P_ID_COMPONENTE` (`P_ID_COMPONENTE`),
  KEY `P_ID_ESTRATEGIA` (`P_ID_ESTRATEGIA`),
  KEY `P_ID_PROYECTO` (`P_ID_PROYECTO`),
  CONSTRAINT `FK_RESULTADO_ACTIVIDAD` FOREIGN KEY (`P_ID_ACTIVIDAD`) REFERENCES `p_actividad` (`P_ID_ACTIVIDAD`),
  CONSTRAINT `FK_RESULTADO_COMPONENTE` FOREIGN KEY (`P_ID_COMPONENTE`) REFERENCES `p_componente` (`P_ID_COMPONENTE`),
  CONSTRAINT `FK_RESULTADO_ESTRATEGIA` FOREIGN KEY (`P_ID_ESTRATEGIA`) REFERENCES `p_estrategia` (`P_ID_ESTRATEGIA`),
  CONSTRAINT `FK_RESULTADO_PROYECTO` FOREIGN KEY (`P_ID_PROYECTO`) REFERENCES `p_proyecto` (`P_ID_PROYECTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of p_resultado
-- ----------------------------
INSERT INTO `p_resultado` VALUES ('1', 'RESULTADO 1', '1', '1', '1', '1');
INSERT INTO `p_resultado` VALUES ('2', 'RESULTADO 2', '1', '1', '1', '1');
INSERT INTO `p_resultado` VALUES ('3', 'RESULTADO 3', '2', '1', '1', '1');
INSERT INTO `p_resultado` VALUES ('4', 'RESULTADO 4', '2', '1', '1', '1');
INSERT INTO `p_resultado` VALUES ('5', 'RESULTADO 5', '3', '1', '1', '1');

-- ----------------------------
-- Table structure for p_tipo_gasto
-- ----------------------------
DROP TABLE IF EXISTS `p_tipo_gasto`;
CREATE TABLE `p_tipo_gasto` (
  `P_ID_TIPO_GASTO` int(11) NOT NULL,
  `P_NOMBRE_TIPO_GASTO` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`P_ID_TIPO_GASTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of p_tipo_gasto
-- ----------------------------
INSERT INTO `p_tipo_gasto` VALUES ('1', 'Gastos Adquiribles');
INSERT INTO `p_tipo_gasto` VALUES ('2', 'Gastos Recurrentes');

-- ----------------------------
-- Table structure for p_usuario
-- ----------------------------
DROP TABLE IF EXISTS `p_usuario`;
CREATE TABLE `p_usuario` (
  `P_ID_USUARIO` int(11) NOT NULL,
  `P_RUT_RESPONSABLE` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `P_NOMBRE_USUARIO` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `P_PASSWORD` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `P_CORREO_USUARIO` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `P_ID_PERFIL` int(11) DEFAULT NULL,
  PRIMARY KEY (`P_ID_USUARIO`),
  KEY `P_RUT_RESPONSABLE` (`P_RUT_RESPONSABLE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of p_usuario
-- ----------------------------
INSERT INTO `p_usuario` VALUES ('1', '181062738', 'Darling', '123456', 'dxdiaz@ing.ucsc.cl', '1');
INSERT INTO `p_usuario` VALUES ('2', '166219132', 'Francisco', '654321', 'fcordero@ucsc.cl', '2');
INSERT INTO `p_usuario` VALUES ('3', '13508155', 'Fernando', '999999', 'farcos@ucsc.cl', '2');

-- ----------------------------
-- View structure for v_avance_actividades
-- ----------------------------
DROP VIEW IF EXISTS `v_avance_actividades`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `v_avance_actividades` AS SELECT *,
(DATEDIFF(P_FECHA_TERMINO,P_FECHA_INICIO) DIV 7)AS P_TOTAL_SEMANAS,
((P_SEM_EJECUTADAS*100) DIV (DATEDIFF(P_FECHA_TERMINO,P_FECHA_INICIO) DIV 7))AS P_PORC_INDIVIDUAL
FROM p_actividad ;

-- ----------------------------
-- View structure for v_detalle_gastos
-- ----------------------------
DROP VIEW IF EXISTS `v_detalle_gastos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_detalle_gastos` AS SELECT 
A.*,
B.P_COSTO_PLANIF,
SUM(B.P_COSTO)AS P_COSTO,
(select C.P_CLASIFICACION_ITEM  from p_clasificacion_item C WHERE A.P_ID_ACTIVIDAD=B.P_ID_ACTIVIDAD)AS P_CLASIFICACION_ITEM,
(select C.P_NOMBRE_CLASIFICACION_ITEM from p_clasificacion_item C WHERE A.P_ID_ACTIVIDAD=B.P_ID_ACTIVIDAD)AS P_NOMBRE_CLASIFICACION_ITEM,
(select D.P_ABREVIACION_ESTRATEGIA from p_estrategia D WHERE A.P_ID_PROYECTO=D.P_ID_PROYECTO AND A.P_ID_ESTRATEGIA=D.P_ID_ESTRATEGIA)AS P_ABREVIACION_ESTRATEGIA,
B.P_DETALLE_ITEM,
B.P_ID_TIPO_GASTO,
(SELECT P_NOMBRE_TIPO_GASTO FROM p_tipo_gasto WHERE P_ID_TIPO_GASTO=B.P_ID_TIPO_GASTO)AS P_NOMBRE_TIPO_GASTO,
B.P_ID_ITEM_TIPO_GASTO,
(SELECT P_NOMBRE_ITEM_TIPO_GASTO FROM p_item_tipo_gasto WHERE P_ID_ITEM_TIPO_GASTO=B.P_ID_ITEM_TIPO_GASTO)AS P_NOMBRE_ITEM_TIPO_GASTO
FROM p_actividad A
LEFT JOIN p_gasto_item B ON A.P_ID_ACTIVIDAD=B.P_ID_ACTIVIDAD GROUP BY A.P_ID_ACTIVIDAD ;

-- ----------------------------
-- View structure for v_promedio_componente
-- ----------------------------
DROP VIEW IF EXISTS `v_promedio_componente`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_promedio_componente` AS SELECT *,
(SELECT(SUM(B.P_PORC_INDIVIDUAL*B.P_TOTAL_SEMANAS)) DIV SUM(B.P_TOTAL_SEMANAS) FROM v_avance_actividades B where B.P_ID_PROYECTO=A.P_ID_PROYECTO AND B.P_ID_COMPONENTE=A.P_ID_COMPONENTE)AS PORCENTAJE_COMPONENTE
FROM p_componente A ;

-- ----------------------------
-- View structure for v_promedio_estrategia
-- ----------------------------
DROP VIEW IF EXISTS `v_promedio_estrategia`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_promedio_estrategia` AS select A.*,
(select ROUND(AVG(B.PORCENTAJE_COMPONENTE),0) from v_promedio_componente B WHERE B.P_ID_PROYECTO=A.P_ID_PROYECTO AND B.P_ID_ESTRATEGIA=A.P_ID_ESTRATEGIA)AS PORCENTAJE_ESTRATEGIA
from p_estrategia A ;

-- ----------------------------
-- View structure for v_promedio_proyecto
-- ----------------------------
DROP VIEW IF EXISTS `v_promedio_proyecto`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_promedio_proyecto` AS select A.*,
(select ROUND(AVG(B.PORCENTAJE_ESTRATEGIA),0) from v_promedio_estrategia B WHERE B.P_ID_PROYECTO=A.P_ID_PROYECTO)AS PORCENTAJE_PROYECTO
from p_proyecto A ;
