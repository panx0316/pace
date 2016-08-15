/*
Navicat MySQL Data Transfer

Source Server         : Nueva
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : pace

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-08-15 19:38:19
*/

SET FOREIGN_KEY_CHECKS=0;

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
