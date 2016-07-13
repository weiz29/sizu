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
DROP TABLE IF EXISTS `wex_user`;
CREATE TABLE `wex_user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(30) DEFAULT NULL,
  `u_pwd` varchar(255) DEFAULT NULL,
  `u_time` datetime DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of we_user
-- ----------------------------
-- ----------------------------
-- Table structure for wex_account
-- ----------------------------
DROP TABLE IF EXISTS `wex_account`;
CREATE TABLE `wex_account` (
  `wx_id` int(11) NOT NULL AUTO_INCREMENT,
  `wx_name` varchar(50) DEFAULT NULL COMMENT '微信公众号名称',
  `wx_appid` char(18) DEFAULT NULL COMMENT '公众号AppID',
  `wx_secret` varchar(32) DEFAULT NULL COMMENT '公众号AppSecret',
  `wx_remark` varchar(200) DEFAULT NULL COMMENT '备注',
  `wx_time` datetime DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`wx_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wex_account
-- ----------------------------