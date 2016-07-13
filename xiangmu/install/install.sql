/*
Navicat MySQL Data Transfer

Source Server         : like
Source Server Version : 50547
Source Host           : 127.0.0.1:3306
Source Database       : weixin

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-07-13 10:28:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for we_user
-- ----------------------------
DROP TABLE IF EXISTS `we_user`;
CREATE TABLE `we_user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(30) DEFAULT NULL,
  `u_pwd` varchar(255) DEFAULT NULL,
  `u_time` datetime DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of we_user
-- ----------------------------
