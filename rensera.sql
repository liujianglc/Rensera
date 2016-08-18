/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : rensera

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-08-18 18:03:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of category
-- ----------------------------

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'Admin');
INSERT INTO `roles` VALUES ('2', 'Marketing User');
INSERT INTO `roles` VALUES ('3', 'Lawyer');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `photo_url` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_online` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=313 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('310', 'Marketing Admin', null, 'admin@rensera.com', null, '1', '2016-08-18 02:16:45', null, null, '$2a$06$7D4tBqva/ETgfv28qPzuu.DzNA8bPo2BtvYWGDmXe8e/krC63Aelm', '1', '1', '2016-08-18 00:49:20');
INSERT INTO `user` VALUES ('311', 'Marketing Agent', null, 'agent@rensera.com', null, '1', null, null, null, '$2a$06$7hZafoJoA8iZ5lno5yGxbuG7CkbVhlE55p5jqt9QtmLgJrBviol12', '2', null, '2016-08-18 00:49:20');
INSERT INTO `user` VALUES ('312', 'Lawyer', null, 'lawyer@rensera.com', null, '1', null, null, null, '$2a$06$jv5xy0QPNj1qNRvcqkrv0OHILj6hgQNYfCtKjY79Mr4Bc1igXFwvK', '3', null, '2016-08-18 00:49:20');
