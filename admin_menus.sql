/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : video

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-07-24 15:51:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin_menus
-- ----------------------------
DROP TABLE IF EXISTS `admin_menus`;
CREATE TABLE `admin_menus` (
  `mid` int(10) NOT NULL AUTO_INCREMENT,
  `pid` int(10) NOT NULL DEFAULT '0' COMMENT '上级菜单',
  `ord` varchar(30) NOT NULL DEFAULT '0' COMMENT '排序',
  `title` varchar(20) NOT NULL COMMENT '菜单名称',
  `controller` varchar(30) NOT NULL COMMENT '控制器',
  `method` varchar(30) NOT NULL,
  `ishidden` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否隐藏：0是，1不是',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态：0正常，1禁用',
  PRIMARY KEY (`mid`,`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_menus
-- ----------------------------
INSERT INTO `admin_menus` VALUES ('1', '0', '0', '管理员管理', '', '', '0', '0');
INSERT INTO `admin_menus` VALUES ('2', '0', '0', '权限管理', '', '', '0', '0');
INSERT INTO `admin_menus` VALUES ('3', '0', '0', '系统设置', '', '', '0', '0');
INSERT INTO `admin_menus` VALUES ('4', '1', '0', '管理员列表', 'Admin', 'index', '0', '0');
INSERT INTO `admin_menus` VALUES ('5', '1', '0', '管理员添加', 'Admin', 'add', '1', '0');
INSERT INTO `admin_menus` VALUES ('6', '1', '0', '管理员保存', 'Admin', 'save', '1', '0');
