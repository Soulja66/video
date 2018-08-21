/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : video

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-08-21 13:36:48
*/

SET FOREIGN_KEY_CHECKS=0;

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of slide
-- ----------------------------
INSERT INTO `slide` VALUES ('3', '0', '1', '新说唱：吴亦凡忍痛淘汰引泪目', 'http://sdgsdfgdsfg', '/uploads/20180820\\81a99f19dc37fbd8abf114aa5465ddad.jpg');
INSERT INTO `slide` VALUES ('4', '0', '2', '好声音：梁博御用和声惊艳献唱', 'http://dgfdgsdhd', '/uploads/20180820\\08605d861a524803d6790764ecebe51d.jpg');
INSERT INTO `slide` VALUES ('5', '0', '3', '天盛长歌：陈坤倪妮博弈天下', 'http://sdgdsfghds', '/uploads/20180820\\d6211884dac91acd1ec499f75c9ab186.jpg');
INSERT INTO `slide` VALUES ('6', '0', '4', '延禧攻略：皇上深陷璎珞套路', 'http://gjdfghs', '/uploads/20180820\\bc07ae1f4f5122ea4514ae3ed7fe8941.jpg');
INSERT INTO `slide` VALUES ('7', '0', '5', '跨界喜剧王：张檬直面恐婚心魔', 'http://hjhjdfgh', '/uploads/20180820\\ace687fdb9ad81eb1c1ebc079db123ab.jpg');
INSERT INTO `slide` VALUES ('8', '0', '6', '香蜜：杨紫邓伦演绎千年挚爱', 'http://rfgdsfgdsf', '/uploads/20180820\\b975536b1dc68f0795487760b9788da3.jpg');
INSERT INTO `slide` VALUES ('9', '0', '7', '了不起的孩子：滑板王坑妈不停', 'http://fdghdfhfgh', '/uploads/20180820\\a4478c3c74633dedd8003d9b7ca744ff.jpg');
INSERT INTO `slide` VALUES ('10', '0', '8', '相声有新人：老郭鼓励选手追梦', 'http://trghrgfhfg', '/uploads/20180820\\59f744a2a585429ae524148a7c7448ff.jpg');
INSERT INTO `slide` VALUES ('11', '0', '9', '陪你看说唱：满舒克回应被淘汰', 'http://rfgdfh', '/uploads/20180820\\bfa173b566f5465cecd19be6cb62a700.jpg');
INSERT INTO `slide` VALUES ('12', '0', '10', '燃烧青春：精彩青春 回忆一夏', 'http://dgsfhg', '/uploads/20180820\\7a4e789393dcb5c530addfb40a910e0a.jpg');
