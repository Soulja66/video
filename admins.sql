/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : video

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-07-24 15:51:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `truename` varchar(20) NOT NULL COMMENT '真实姓名',
  `gid` int(10) NOT NULL COMMENT '角色ID',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态:0正常，1禁用',
  `add_time` int(10) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES ('1', '陈冰清', '1', '陈冰清', '1', '0', '0');
INSERT INTO `admins` VALUES ('6', 'test', '', 'test', '1', '1', '1532073001');
INSERT INTO `admins` VALUES ('18', 'cbq', '1', 'cbq', '2', '1', '0');
