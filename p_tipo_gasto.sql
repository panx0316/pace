/*
Navicat MySQL Data Transfer

Source Server         : Nueva
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : pace

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-08-15 19:38:08
*/

SET FOREIGN_KEY_CHECKS=0;

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