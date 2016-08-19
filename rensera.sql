/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : rensera

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-08-19 21:14:24
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'eee');
INSERT INTO `category` VALUES ('12', '444ss');

-- ----------------------------
-- Table structure for `project`
-- ----------------------------
DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `template_id` int(11) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project
-- ----------------------------
INSERT INTO `project` VALUES ('1', 'sfs', '1', '2', null, '2016-08-19 00:36:12', '2016-08-19 02:56:13');
INSERT INTO `project` VALUES ('2', 'asfafa', '12', '2', null, '2016-08-19 00:48:13', null);
INSERT INTO `project` VALUES ('3', 'asfa', '1', '2', null, '2016-08-19 00:48:22', null);
INSERT INTO `project` VALUES ('4', 'aaaa', '1', '3', null, '2016-08-19 00:48:28', null);
INSERT INTO `project` VALUES ('5', 'abc', '1', '2', null, '2016-08-19 03:21:28', null);

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'Admin');
INSERT INTO `roles` VALUES ('2', 'Marketing User');
INSERT INTO `roles` VALUES ('3', 'Lawyer');

-- ----------------------------
-- Table structure for `template`
-- ----------------------------
DROP TABLE IF EXISTS `template`;
CREATE TABLE `template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of template
-- ----------------------------
INSERT INTO `template` VALUES ('2', 'abcdww', '2016-08-18 20:55:17', '2016-08-18 22:17:59');
INSERT INTO `template` VALUES ('3', 'aec', '2016-08-18 20:55:23', '2016-08-18 22:18:20');

-- ----------------------------
-- Table structure for `template_version`
-- ----------------------------
DROP TABLE IF EXISTS `template_version`;
CREATE TABLE `template_version` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_id` int(11) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of template_version
-- ----------------------------

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
INSERT INTO `user` VALUES ('310', 'Marketing Admin', null, 'admin@rensera.com', null, '1', '2016-08-19 06:10:39', null, null, '$2a$06$7D4tBqva/ETgfv28qPzuu.DzNA8bPo2BtvYWGDmXe8e/krC63Aelm', '1', '1', '2016-08-18 00:49:20');
INSERT INTO `user` VALUES ('311', 'Marketing Agent', null, 'agent@rensera.com', null, '1', null, null, null, '$2a$06$7hZafoJoA8iZ5lno5yGxbuG7CkbVhlE55p5jqt9QtmLgJrBviol12', '2', null, '2016-08-18 00:49:20');
INSERT INTO `user` VALUES ('312', 'Lawyer', null, 'lawyer@rensera.com', null, '1', null, null, null, '$2a$06$jv5xy0QPNj1qNRvcqkrv0OHILj6hgQNYfCtKjY79Mr4Bc1igXFwvK', '3', null, '2016-08-18 00:49:20');
