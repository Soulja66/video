/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : video

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-08-19 22:35:00
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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES ('1', '陈冰清', '1', '陈冰清', '1', '0', '0');
INSERT INTO `admins` VALUES ('18', 'cbq', '1', 'cbq', '2', '1', '0');

-- ----------------------------
-- Table structure for admin_groups
-- ----------------------------
DROP TABLE IF EXISTS `admin_groups`;
CREATE TABLE `admin_groups` (
  `gid` int(11) NOT NULL AUTO_INCREMENT COMMENT '角色ID',
  `title` varchar(20) NOT NULL COMMENT '角色名称',
  `rights` text NOT NULL COMMENT '角色权限，json',
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_groups
-- ----------------------------
INSERT INTO `admin_groups` VALUES ('1', '系统管理员', '[1,4,9,5,6,2,12,13,3,10,11,14,15,16,17,19,20,21,22,23,27,29,28]');
INSERT INTO `admin_groups` VALUES ('2', '开发人员', '0');

-- ----------------------------
-- Table structure for admin_menus
-- ----------------------------
DROP TABLE IF EXISTS `admin_menus`;
CREATE TABLE `admin_menus` (
  `mid` int(10) NOT NULL AUTO_INCREMENT,
  `pid` int(10) NOT NULL DEFAULT '1' COMMENT '上级菜单',
  `ord` int(10) NOT NULL DEFAULT '1' COMMENT '排序',
  `title` varchar(20) NOT NULL COMMENT '菜单名称',
  `controller` varchar(30) NOT NULL COMMENT '控制器',
  `method` varchar(30) NOT NULL,
  `ishidden` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否隐藏：0是，1不是',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态：0正常，1禁用',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_menus
-- ----------------------------
INSERT INTO `admin_menus` VALUES ('1', '0', '0', '管理员管理', '', '', '0', '0');
INSERT INTO `admin_menus` VALUES ('2', '0', '0', '权限管理', '', '', '0', '0');
INSERT INTO `admin_menus` VALUES ('3', '0', '0', '系统设置', '', '', '0', '0');
INSERT INTO `admin_menus` VALUES ('4', '1', '0', '管理员列表', 'Admin', 'index', '0', '0');
INSERT INTO `admin_menus` VALUES ('5', '1', '0', '管理员添加', 'Admin', 'add', '1', '0');
INSERT INTO `admin_menus` VALUES ('6', '1', '0', '管理员保存', 'Admin', 'save', '1', '0');
INSERT INTO `admin_menus` VALUES ('9', '4', '0', '角色测试', 'test', 'test', '0', '0');
INSERT INTO `admin_menus` VALUES ('10', '3', '0', '网站设置', 'Site', 'index', '0', '0');
INSERT INTO `admin_menus` VALUES ('11', '3', '0', '保存设置', 'Site', 'save', '1', '0');
INSERT INTO `admin_menus` VALUES ('12', '2', '0', '菜单管理', 'Menu', 'index', '0', '0');
INSERT INTO `admin_menus` VALUES ('13', '2', '0', '角色管理', 'Roles', 'index', '0', '0');
INSERT INTO `admin_menus` VALUES ('14', '0', '0', '标签管理', '', '', '0', '0');
INSERT INTO `admin_menus` VALUES ('15', '14', '0', '频道标签', 'labels', 'channel', '0', '0');
INSERT INTO `admin_menus` VALUES ('16', '14', '0', '资费标签', 'labels', 'charge', '0', '0');
INSERT INTO `admin_menus` VALUES ('17', '14', '0', '地区标签', 'labels', 'area', '0', '0');
INSERT INTO `admin_menus` VALUES ('19', '0', '0', '影片管理', '', '', '0', '0');
INSERT INTO `admin_menus` VALUES ('20', '19', '0', '影片列表', 'Video', 'index', '0', '0');
INSERT INTO `admin_menus` VALUES ('21', '19', '0', '添加影片', 'Video', 'add', '1', '0');
INSERT INTO `admin_menus` VALUES ('22', '19', '0', '保存影片', 'Video', 'save', '1', '0');
INSERT INTO `admin_menus` VALUES ('23', '19', '0', '图片上传', 'Video', 'upload_img', '1', '0');
INSERT INTO `admin_menus` VALUES ('29', '27', '0', '幻灯片保存', 'Slide', 'save', '1', '0');
INSERT INTO `admin_menus` VALUES ('28', '27', '0', '首页首屏', 'Slide', 'index', '0', '0');
INSERT INTO `admin_menus` VALUES ('27', '0', '0', '幻灯片管理', '', '', '0', '0');

-- ----------------------------
-- Table structure for sites
-- ----------------------------
DROP TABLE IF EXISTS `sites`;
CREATE TABLE `sites` (
  `names` varchar(50) NOT NULL,
  `values` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sites
-- ----------------------------
INSERT INTO `sites` VALUES ('site', '\"\\u9648\\u51b0\\u6e05\\u7684\\u4e2a\\u4eba\\u7f51\\u7ad9\"');

-- ----------------------------
-- Table structure for slide
-- ----------------------------
DROP TABLE IF EXISTS `slide`;
CREATE TABLE `slide` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` tinyint(2) NOT NULL DEFAULT '0' COMMENT '类型：0首页',
  `ord` tinyint(2) NOT NULL DEFAULT '0' COMMENT '排序',
  `title` varchar(30) NOT NULL COMMENT '标题',
  `url` varchar(255) NOT NULL COMMENT '连接地址',
  `img` varchar(255) NOT NULL COMMENT '图片地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of slide
-- ----------------------------
INSERT INTO `slide` VALUES ('2', '0', '0', 'eawfaw', 'eaeg', '/uploads/20180819\\61a2e6b7c956bf58b41730c0618d38a5.jpg');

-- ----------------------------
-- Table structure for video
-- ----------------------------
DROP TABLE IF EXISTS `video`;
CREATE TABLE `video` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `channel_id` int(10) NOT NULL COMMENT '频道',
  `charge_id` int(10) NOT NULL COMMENT '资费',
  `area_id` int(10) NOT NULL COMMENT '地区',
  `title` varchar(50) NOT NULL COMMENT '影片名称',
  `keywords` varchar(255) NOT NULL COMMENT '关键字',
  `desc` varchar(255) NOT NULL COMMENT '描述',
  `img` varchar(255) NOT NULL COMMENT '封面',
  `url` varchar(255) NOT NULL COMMENT '影片url',
  `pv` int(10) NOT NULL COMMENT '点击量',
  `score` int(3) NOT NULL COMMENT '分数',
  `is_vip` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否vip才能看：0否，1是',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态：0正常，1下线',
  `add_time` int(10) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of video
-- ----------------------------
INSERT INTO `video` VALUES ('1', '5', '11', '14', '测试影片', '生发丸', '啊恶法违法', '/uploads/20180812\\4acf2059c3a2c61f4cbd8eafb9cf0105.jpg', 'http://dhfaidhgiawjg.mp4', '0', '0', '0', '1', '1534053339');
INSERT INTO `video` VALUES ('2', '3', '12', '15', '测试影片2', 'aefaef', 'awdegfawga', '', 'http://ahfiaefhi.mp4', '0', '0', '0', '1', '1534053545');
INSERT INTO `video` VALUES ('3', '4', '12', '16', '测试影片3', 'fadfa', 'dgasdgfas', '', 'aesfaf', '0', '0', '0', '1', '1534053882');
INSERT INTO `video` VALUES ('4', '1', '11', '13', 'fr', 'fasdf', 'asdfa', '', 'dfa', '0', '0', '0', '1', '1534054109');
INSERT INTO `video` VALUES ('5', '3', '12', '14', 'awera', 'asdf', 'asdfa', '', 'adfa', '0', '0', '0', '1', '1534054205');
INSERT INTO `video` VALUES ('6', '4', '12', '15', 'aefasf', 'dsfasdf', 'asdfasdf', '', 'asdfa', '0', '0', '0', '1', '1534054315');
INSERT INTO `video` VALUES ('7', '2', '12', '16', 'aefafa', 'asdfasdfa', 'dsfasdfasdf', '', 'adfad', '0', '0', '0', '1', '1534060388');
INSERT INTO `video` VALUES ('8', '3', '12', '16', 'dsfasdfas', 'asdfasd', 'fasdfasdf', '', 'adsfasdf', '0', '0', '0', '1', '1534060401');
INSERT INTO `video` VALUES ('9', '1', '11', '13', 'asdfasdf', 'asdfasdf', 'asdfasdf', '', 'adsfasdf', '0', '0', '0', '1', '1534060414');

-- ----------------------------
-- Table structure for video_label
-- ----------------------------
DROP TABLE IF EXISTS `video_label`;
CREATE TABLE `video_label` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ord` int(3) NOT NULL DEFAULT '0' COMMENT '排序',
  `title` varchar(50) NOT NULL COMMENT '标签标题',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态：0正常，1禁用',
  `flag` varchar(50) NOT NULL COMMENT '标签分类标识',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of video_label
-- ----------------------------
INSERT INTO `video_label` VALUES ('1', '0', '电视剧', '0', 'channel');
INSERT INTO `video_label` VALUES ('2', '0', '电影', '0', 'channel');
INSERT INTO `video_label` VALUES ('3', '0', '综艺', '0', 'channel');
INSERT INTO `video_label` VALUES ('4', '0', '动漫', '0', 'channel');
INSERT INTO `video_label` VALUES ('5', '0', '纪录片', '0', 'channel');
INSERT INTO `video_label` VALUES ('6', '0', '游戏', '0', 'channel');
INSERT INTO `video_label` VALUES ('7', '0', '资讯', '0', 'channel');
INSERT INTO `video_label` VALUES ('8', '0', '娱乐', '0', 'channel');
INSERT INTO `video_label` VALUES ('9', '0', '财经', '0', 'channel');
INSERT INTO `video_label` VALUES ('10', '0', '网络电影', '0', 'channel');
INSERT INTO `video_label` VALUES ('11', '0', '免费', '0', 'charge');
INSERT INTO `video_label` VALUES ('12', '0', '付费', '0', 'charge');
INSERT INTO `video_label` VALUES ('13', '0', '华语', '0', 'area');
INSERT INTO `video_label` VALUES ('14', '0', '香港', '0', 'area');
INSERT INTO `video_label` VALUES ('15', '0', '美国', '0', 'area');
INSERT INTO `video_label` VALUES ('16', '0', '欧洲', '0', 'area');
INSERT INTO `video_label` VALUES ('17', '0', '韩国', '0', 'area');
INSERT INTO `video_label` VALUES ('18', '0', '日本', '0', 'area');
INSERT INTO `video_label` VALUES ('19', '0', '泰国', '0', 'area');
INSERT INTO `video_label` VALUES ('20', '0', '其它', '0', 'area');
