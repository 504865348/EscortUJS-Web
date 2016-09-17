/*
Navicat MySQL Data Transfer

Source Server         : express
Source Server Version : 50540
Source Host           : 120.26.110.181:3306
Source Database       : express

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-01-12 19:36:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for exp_address
-- ----------------------------
DROP TABLE IF EXISTS `exp_address`;
CREATE TABLE `exp_address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `address_info` varchar(128) NOT NULL,
  `address_userid` int(11) NOT NULL,
  `address_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`address_id`),
  KEY `addressInfo` (`address_info`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of exp_address
-- ----------------------------

-- ----------------------------
-- Table structure for exp_admin
-- ----------------------------
DROP TABLE IF EXISTS `exp_admin`;
CREATE TABLE `exp_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_account` varchar(20) NOT NULL,
  `admin_password` varchar(40) NOT NULL,
  `admin_priority` tinyint(4) DEFAULT '2',
  `admin_time` int(11) NOT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `adminAccount` (`admin_account`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of exp_admin
-- ----------------------------

-- ----------------------------
-- Table structure for exp_log
-- ----------------------------
DROP TABLE IF EXISTS `exp_log`;
CREATE TABLE `exp_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_time` int(11) NOT NULL,
  `log_table` varchar(30) DEFAULT NULL,
  `log_sql` text NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of exp_log
-- ----------------------------

-- ----------------------------
-- Table structure for exp_order
-- ----------------------------
DROP TABLE IF EXISTS `exp_order`;
CREATE TABLE `exp_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_state` tinyint(4) DEFAULT '0',
  `order_time` int(11) NOT NULL,
  `order_comment` varchar(128) DEFAULT NULL,
  `order_qrcode` varchar(50) NOT NULL,
  `order_sms` text NOT NULL,
  `order_way` tinyint(4) NOT NULL,
  `order_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`order_id`),
  FULLTEXT KEY `orderSMS` (`order_sms`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of exp_order
-- ----------------------------

-- ----------------------------
-- Table structure for exp_user
-- ----------------------------
DROP TABLE IF EXISTS `exp_user`;
CREATE TABLE `exp_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `user_account` varchar(20) NOT NULL,
  `user_password` varchar(40) NOT NULL,
  `user_deleted` tinyint(1) DEFAULT '0',
  `user_phone` varchar(15) NOT NULL,
  `user_default_address` int(11) DEFAULT NULL,
  `user_regtime` int(11) NOT NULL,
  `user_count` int(11) DEFAULT '0',
  PRIMARY KEY (`user_id`),
  KEY `userAccount` (`user_account`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of exp_user
-- ----------------------------

-- ----------------------------
-- Table structure for exp_webinfo
-- ----------------------------
DROP TABLE IF EXISTS `exp_webinfo`;
CREATE TABLE `exp_webinfo` (
  `webinfo_usernum` int(11) DEFAULT '0',
  `webinfo_createtime` int(11) DEFAULT NULL,
  `webinfo_table_prefix` varchar(10) DEFAULT 'exp'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of exp_webinfo
-- ----------------------------
