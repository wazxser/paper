/*
Navicat MySQL Data Transfer

Source Server         : yuehuan
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : paper

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2016-04-05 21:30:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `wenziID` int(11) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `ctime` datetime NOT NULL,
  `user` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', '0', '4', '评论', '2016-03-31 00:34:54', 'www');
INSERT INTO `comment` VALUES ('2', '0', '1', '评论', '2016-04-05 16:19:35', 'qqq');
INSERT INTO `comment` VALUES ('3', '0', '2', '评论', '2016-04-05 16:20:25', 'qqq');
INSERT INTO `comment` VALUES ('4', '0', '2', '评论', '2016-04-05 16:21:54', 'qqq');
INSERT INTO `comment` VALUES ('5', '0', '2', '这是第二篇论文的评论', '2016-04-05 16:25:14', 'qqq');
INSERT INTO `comment` VALUES ('6', '0', '3', '这是第三篇论文的评论', '2016-04-05 16:25:47', 'qqq');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `score` int(100) NOT NULL,
  `limit` int(1) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('14', 'admin', '21232f297a57a5a743894a0e4a801fc3', '10', '0', '2016-03-30 19:00:01');
INSERT INTO `user` VALUES ('15', 'www', '', '10', '1', '2016-04-04 20:30:27');
INSERT INTO `user` VALUES ('20', 'qqq', 'b2ca678b4c936f905fb82f2733f5297f', '20', '1', '2016-04-04 20:55:07');
INSERT INTO `user` VALUES ('21', 'baiud', 'bfe279945c6109d067bcd295b5189d86', '10', '1', '2016-04-04 20:55:20');
INSERT INTO `user` VALUES ('22', 'wyh', 'wyh', '10', '1', '2016-04-04 20:55:32');
INSERT INTO `user` VALUES ('23', '王月欢', '43a55d571509e665be8344fdc34460f0', '10', '1', '2016-04-04 20:55:48');

-- ----------------------------
-- Table structure for wenzi
-- ----------------------------
DROP TABLE IF EXISTS `wenzi`;
CREATE TABLE `wenzi` (
  `title` varchar(100) NOT NULL,
  `content` varchar(100) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `up` varchar(50) NOT NULL,
  `value` int(100) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `ctime` datetime NOT NULL,
  `downtimes` int(11) NOT NULL,
  `filepath` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wenzi
-- ----------------------------
INSERT INTO `wenzi` VALUES ('title', '描述', '1', '', '10', 'keyword', '0000-00-00 00:00:00', '10', '');
INSERT INTO `wenzi` VALUES ('题目', '描述', '2', 'www', '10', '关键词', '2016-03-30 20:11:41', '0', '');
INSERT INTO `wenzi` VALUES ('上传文件', '上传文件', '3', 'www', '10', '上传文件', '2016-03-30 20:52:51', '0', '');
INSERT INTO `wenzi` VALUES ('oracle', '文件存储  对数据的存储需求一直存在。保存数据的方式，经历了手工管理、文件管理等阶段，直至数据库管理阶段。  文件存储方式保存数据的弊端：   缺乏对数据的整体管理,数据不便修改；  不利于数据分', '4', 'www', '10', '数据库', '2016-03-30 23:44:12', '0', '');
INSERT INTO `wenzi` VALUES ('jQuery', '在您开始学习 jQuery 之前，您应该对以下知识有基本的了解：\r\nHTML\r\nCSS\r\nJavaScript\r\n如果您需要首先学习这些科目，请在我们的 首页 查找这些教程。', '5', 'www', '10', 'JavaScript 库    容易学习', '2016-03-31 00:38:05', '0', '');
INSERT INTO `wenzi` VALUES ('aaa', 'aaaa', '6', 'www', '10', 'aaa', '2016-04-01 18:15:39', '0', '');
INSERT INTO `wenzi` VALUES ('bbb', 'bbb', '7', 'www', '10', 'bbb', '2016-04-01 18:18:24', '0', '');
INSERT INTO `wenzi` VALUES ('汇编作业', '汇编的代码', '8', 'www', '10', '代码', '2016-04-01 18:31:10', '0', '');
INSERT INTO `wenzi` VALUES ('huibian', '汇编的代码', '9', 'www', '10', 'huibian', '2016-04-01 18:44:18', '0', '');
INSERT INTO `wenzi` VALUES ('PHP 文件上传', '&lt;form&gt; 标签的 enctype 属性规定了在提交表单时要使用哪种内容类型。在表单需要二进制数据时，比如文件内容，请使用 &quot;multipart/form-data&quot;', '10', 'www', '10', '创建一个文件上传表单', '2016-04-03 14:05:47', '0', '');
INSERT INTO `wenzi` VALUES ('PHP mail() 函数', 'hanshu', '11', 'www', '10', 'mail', '2016-04-03 14:25:08', '0', '');
INSERT INTO `wenzi` VALUES ('测试', '测试', '12', 'www', '10', '测试', '2016-04-03 14:30:26', '0', '');
INSERT INTO `wenzi` VALUES ('测试', '测试', '13', 'www', '10', '测试', '2016-04-03 14:34:03', '0', '');
INSERT INTO `wenzi` VALUES ('测试', '测试', '14', 'www', '10', '测试', '2016-04-03 14:36:31', '0', '');
INSERT INTO `wenzi` VALUES ('测试', '测试', '15', 'www', '10', '测试', '2016-04-03 14:37:15', '0', '');
INSERT INTO `wenzi` VALUES ('测试', '测试', '16', 'www', '10', '测试', '2016-04-03 14:38:55', '0', '');
INSERT INTO `wenzi` VALUES ('测试', '测试', '17', 'www', '10', '测试', '2016-04-03 14:43:40', '0', '');
INSERT INTO `wenzi` VALUES ('测试', '测试', '18', 'www', '10', '测试', '2016-04-03 14:46:00', '0', '');
INSERT INTO `wenzi` VALUES ('测试', '测试', '19', 'www', '10', '测试', '2016-04-03 14:46:34', '0', '');
INSERT INTO `wenzi` VALUES ('测试', '测试', '20', 'www', '10', '测试', '2016-04-03 14:48:04', '0', '');
INSERT INTO `wenzi` VALUES ('测试', '测试', '21', 'www', '10', '测试', '2016-04-03 15:04:02', '0', '');
INSERT INTO `wenzi` VALUES ('测试', '测试', '22', 'www', '10', '测试', '2016-04-03 15:43:48', '0', '');
INSERT INTO `wenzi` VALUES ('测试', '测试', '23', 'www', '10', '测试', '2016-04-04 16:42:21', '0', '');
INSERT INTO `wenzi` VALUES ('测试', '测试', '24', 'www', '10', '测试', '2016-04-04 16:43:49', '0', '');
INSERT INTO `wenzi` VALUES ('测试', '测试', '25', 'www', '10', '测试', '2016-04-04 16:49:09', '0', '');
INSERT INTO `wenzi` VALUES ('测试', '测试', '26', 'www', '10', '测试', '2016-04-04 17:03:02', '0', '');
INSERT INTO `wenzi` VALUES ('测试', '测试', '27', 'www', '10', '测试', '2016-04-04 17:07:35', '0', '');
INSERT INTO `wenzi` VALUES ('测试', '测试', '28', 'www', '10', '测试', '2016-04-04 17:11:36', '0', '');
INSERT INTO `wenzi` VALUES ('测试', '测试', '29', 'www', '11', '测试', '2016-04-04 17:15:06', '0', '');
INSERT INTO `wenzi` VALUES ('测试', '测试', '30', 'www', '11', '测试', '2016-04-04 17:16:57', '0', '');
INSERT INTO `wenzi` VALUES ('测试', '测试', '31', 'www', '11', '测试', '2016-04-04 17:19:23', '0', '');
INSERT INTO `wenzi` VALUES ('测试', '测试', '32', 'www', '11', '测试', '2016-04-04 17:19:55', '0', '');
INSERT INTO `wenzi` VALUES ('测试', '测试', '33', 'www', '11', '测试', '2016-04-04 17:20:45', '0', '');
INSERT INTO `wenzi` VALUES ('测试', '测试', '34', 'admin', '10', '测试', '2016-04-04 23:59:53', '0', '');
