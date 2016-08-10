/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : pace

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-08-10 12:33:02
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
  `P_FECHA_INICIO` date NOT NULL,
  `P_FECHA_TERMINO` date NOT NULL,
  `P_VALOR` int(11) NOT NULL,
  `P_PORC_AVANCE` int(11) NOT NULL,
  `P_NIVEL_ACTIVIDAD` int(11) NOT NULL,
  `P_DESCRIPCION` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `P_ID_HITO` int(11) NOT NULL,
  PRIMARY KEY (`P_ID_ACTIVIDAD`),
  KEY `P_ID_HITO` (`P_ID_HITO`),
  CONSTRAINT `p_actividad_hito` FOREIGN KEY (`P_ID_HITO`) REFERENCES `p_hitos` (`P_ID_HITO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of p_actividad
-- ----------------------------
INSERT INTO `p_actividad` VALUES ('1', '1', 'primera actividad', '2016-08-09', '2016-08-16', '10000', '10', '1', 'prueba', '1');
INSERT INTO `p_actividad` VALUES ('2', '1', 'segunda actividad', '2016-08-09', '2016-08-16', '10000', '10', '1', 'prueba', '1');
INSERT INTO `p_actividad` VALUES ('3', '1', 'tercera actividad', '2016-08-09', '2016-08-16', '10000', '10', '1', 'prueba', '1');
INSERT INTO `p_actividad` VALUES ('4', '1', 'primera actividad dos', '2016-08-09', '2016-08-16', '10000', '10', '1', 'prueba', '2');
INSERT INTO `p_actividad` VALUES ('5', '1', 'segunda actividad dos', '2016-08-09', '2016-08-16', '10000', '10', '1', 'prueba', '2');
INSERT INTO `p_actividad` VALUES ('6', '1', 'primera actividad tres', '2016-08-09', '2016-08-16', '10000', '10', '1', 'prueba', '3');
INSERT INTO `p_actividad` VALUES ('7', '1', 'segunda actividad dos', '2016-08-09', '2016-08-16', '10000', '10', '1', 'prueba', '3');

-- ----------------------------
-- Table structure for p_hitos
-- ----------------------------
DROP TABLE IF EXISTS `p_hitos`;
CREATE TABLE `p_hitos` (
  `P_ID_HITO` int(11) NOT NULL,
  `P_NOMBRE_HITO` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `P_PORC_AVANCE_HITO` int(11) NOT NULL,
  `P_VALOR_ASIGNADO` int(11) NOT NULL,
  `P_VALOR_UTILIZADO` int(11) NOT NULL,
  `P_TIEMPO_ASIGNADO` int(11) NOT NULL,
  `P_TIEMPO_UTILIZADO` int(11) NOT NULL,
  `P_ID_PROYECTO` int(11) NOT NULL,
  PRIMARY KEY (`P_ID_HITO`),
  KEY `P_ID_PROYECTO` (`P_ID_PROYECTO`),
  CONSTRAINT `fk_proyecto_hitos` FOREIGN KEY (`P_ID_PROYECTO`) REFERENCES `p_proyecto` (`P_ID_PROYECTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of p_hitos
-- ----------------------------
INSERT INTO `p_hitos` VALUES ('1', 'HITO DE PRUEBA 1', '10', '5000', '1000', '50', '10', '1');
INSERT INTO `p_hitos` VALUES ('2', 'HITO DE PRUEBA 2', '10', '5000', '1000', '50', '10', '1');
INSERT INTO `p_hitos` VALUES ('3', 'HITO DE PRUEBA 3', '10', '5000', '1000', '50', '10', '1');
INSERT INTO `p_hitos` VALUES ('4', 'HITO DE PRUEBA 4', '10', '5000', '1000', '50', '10', '1');

-- ----------------------------
-- Table structure for p_proyecto
-- ----------------------------
DROP TABLE IF EXISTS `p_proyecto`;
CREATE TABLE `p_proyecto` (
  `P_ID_PROYECTO` int(11) NOT NULL,
  `P_NOMBRE_PROYECTO` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `P_ID_USUARIO_RESPONSABLE` int(11) NOT NULL,
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
INSERT INTO `p_proyecto` VALUES ('1', 'PROYECTO 1', '16621913', '2016-08-09', '2016-08-16', '100000', '10', 'DESCRIPCION');

-- ----------------------------
-- Table structure for p_usuario
-- ----------------------------
DROP TABLE IF EXISTS `p_usuario`;
CREATE TABLE `p_usuario` (
  `P_ID_USUARIO` int(11) NOT NULL,
  `P_NOMBRE_USUARIO` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `P_PASSWORD` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `P_CORREO_USUARIO` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of p_usuario
-- ----------------------------
INSERT INTO `p_usuario` VALUES ('1', 'Darling', '123456', 'dxdiaz@ing.ucsc.cl');
INSERT INTO `p_usuario` VALUES ('2', 'Francisco', '654321', 'fcordero@ucsc.cl');
