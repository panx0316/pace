/*
Navicat MySQL Data Transfer

Source Server         : Nueva
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : pace

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-08-15 19:37:54
*/

SET FOREIGN_KEY_CHECKS=0;

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
