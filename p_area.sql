/*
Navicat MySQL Data Transfer

Source Server         : Nueva
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : pace

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-08-15 13:16:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for p_area
-- ----------------------------
DROP TABLE IF EXISTS `p_area`;
CREATE TABLE `p_area` (
  `P_ID_AREA` int(11) NOT NULL,
  `P_NOMBRE_AREA` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `P_ABREVIACION_AREA` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `P_ID_PROYECTO` int(11) DEFAULT NULL,
  PRIMARY KEY (`P_ID_AREA`),
  KEY `P_ID_PROYECTO` (`P_ID_PROYECTO`),
  CONSTRAINT `FK_AREA_PROYECTO` FOREIGN KEY (`P_ID_PROYECTO`) REFERENCES `p_proyecto` (`P_ID_PROYECTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of p_area
-- ----------------------------
INSERT INTO `p_area` VALUES ('1', 'AREA 1', 'PAAD', '1');
INSERT INTO `p_area` VALUES ('2', 'AREA 2', 'PPV', '1');
INSERT INTO `p_area` VALUES ('3', 'AREA 3', 'VEC', '1');
