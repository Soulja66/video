/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : video

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-07-24 15:50:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin_groups
-- ----------------------------
DROP TABLE IF EXISTS `admin_groups`;
CREATE TABLE `admin_groups` (
  `gid` int(11) NOT NULL DEFAULT '1' COMMENT '角色ID',
  `title` varchar(20) NOT NULL COMMENT '角色名称',
  `rights` text NOT NULL COMMENT '角色权限，json',
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_groups
-- ----------------------------
INSERT INTO `admin_groups` VALUES ('1', '系统管理员', '');
INSERT INTO `admin_groups` VALUES ('2', '开发人员', '');
