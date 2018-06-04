/*
Navicat MySQL Data Transfer

Source Server         : JLUNLPServer
Source Server Version : 50173
Source Host           : bdm256143399.my3w.com:3306
Source Database       : bdm256143399_db

Target Server Type    : MYSQL
Target Server Version : 50173
File Encoding         : 65001

Date: 2018-06-04 09:35:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `nks_academy`
-- ----------------------------
DROP TABLE IF EXISTS `nks_academy`;
CREATE TABLE `nks_academy` (
  `ac_id` int(11) NOT NULL AUTO_INCREMENT,
  `ac_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ac_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nks_academy
-- ----------------------------
INSERT INTO `nks_academy` VALUES ('1', '计算机科学与技术学院');

-- ----------------------------
-- Table structure for `nks_class`
-- ----------------------------
DROP TABLE IF EXISTS `nks_class`;
CREATE TABLE `nks_class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`class_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nks_class
-- ----------------------------
INSERT INTO `nks_class` VALUES ('1', '1-3班');
INSERT INTO `nks_class` VALUES ('2', '4-6班');
INSERT INTO `nks_class` VALUES ('3', '7-9班');
INSERT INTO `nks_class` VALUES ('4', '10-12班');
INSERT INTO `nks_class` VALUES ('5', '13-15班');
INSERT INTO `nks_class` VALUES ('10', '10-15班');
INSERT INTO `nks_class` VALUES ('11', '7-10班');
INSERT INTO `nks_class` VALUES ('12', '21-22班');
INSERT INTO `nks_class` VALUES ('13', '23-26班');
INSERT INTO `nks_class` VALUES ('14', '27-29班');
INSERT INTO `nks_class` VALUES ('15', '30班、11-12班');
INSERT INTO `nks_class` VALUES ('16', '16班');
INSERT INTO `nks_class` VALUES ('17', '11-13班');
INSERT INTO `nks_class` VALUES ('18', '1-4班');
INSERT INTO `nks_class` VALUES ('19', '5-7班');
INSERT INTO `nks_class` VALUES ('20', '8-10班');
INSERT INTO `nks_class` VALUES ('21', '21-23班');
INSERT INTO `nks_class` VALUES ('22', '24-26班');
INSERT INTO `nks_class` VALUES ('23', '27-29班');
INSERT INTO `nks_class` VALUES ('24', '30班、14-15班');
INSERT INTO `nks_class` VALUES ('25', '重修');
INSERT INTO `nks_class` VALUES ('26', '1-13班');
INSERT INTO `nks_class` VALUES ('27', '14-15班');
INSERT INTO `nks_class` VALUES ('28', '23-24班');
INSERT INTO `nks_class` VALUES ('29', '25-27班');
INSERT INTO `nks_class` VALUES ('30', '28-30班');
INSERT INTO `nks_class` VALUES ('31', '11-15班');
INSERT INTO `nks_class` VALUES ('32', '10班');
INSERT INTO `nks_class` VALUES ('33', '21-24班');
INSERT INTO `nks_class` VALUES ('34', '14-16班');

-- ----------------------------
-- Table structure for `nks_exam`
-- ----------------------------
DROP TABLE IF EXISTS `nks_exam`;
CREATE TABLE `nks_exam` (
  `ex_id` int(11) NOT NULL AUTO_INCREMENT,
  `ex_name` varchar(255) DEFAULT NULL,
  `ex_grade` varchar(255) DEFAULT NULL,
  `nt_id` int(11) DEFAULT NULL,
  `ex_mode` int(11) DEFAULT NULL,
  `ex_date` date DEFAULT NULL,
  `tm_id` int(11) DEFAULT '0',
  `pl_id` int(11) DEFAULT '0',
  `ac_id` int(11) DEFAULT '0',
  `mj_id` int(11) DEFAULT '0',
  `class_id` int(11) DEFAULT '0',
  `ex_stunum` int(11) DEFAULT NULL,
  `ex_absence` int(11) DEFAULT NULL,
  `ex_invinum` int(11) DEFAULT NULL,
  `ex_maininv` varchar(255) DEFAULT NULL,
  `ex_invname` varchar(255) DEFAULT NULL,
  `ex_xunkao` varchar(255) DEFAULT NULL,
  `ex_note` varchar(255) DEFAULT NULL,
  `ex_lab` int(11) DEFAULT '0',
  `ex_input_date` datetime DEFAULT NULL,
  `ex_not_lab` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ex_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=146 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nks_exam
-- ----------------------------
INSERT INTO `nks_exam` VALUES ('17', '网络安全', '2015', '1', '0', '2018-06-23', '5', '12', '1', '10', '17', '0', '0', '3', '杨可新', '', '高冬', '', '13', '2018-06-04 09:26:10', '');
INSERT INTO `nks_exam` VALUES ('10', '形势与政策Ⅱ', '2016', '1', '1', '2018-06-10', '12', '9', '1', '24', '1', '0', '0', '2', '', '', '', '', '7', '2018-05-28 10:46:50', '');
INSERT INTO `nks_exam` VALUES ('11', '形势与政策Ⅱ', '2016', '1', '1', '2018-06-10', '12', '2', '1', '24', '2', '0', '0', '3', '', '', '', '', '8', '2018-05-28 10:47:07', '');
INSERT INTO `nks_exam` VALUES ('12', '形势与政策Ⅱ', '2016', '1', '1', '2018-06-10', '12', '5', '1', '24', '3', '0', '0', '3', '', '', '', '', '6', '2018-05-28 10:47:22', '');
INSERT INTO `nks_exam` VALUES ('13', '形势与政策Ⅱ', '2016', '1', '1', '2018-06-10', '12', '1', '1', '24', '10', '0', '0', '5', '', '', '', '', '0', '2018-05-29 16:02:30', '');
INSERT INTO `nks_exam` VALUES ('14', '单片机控制与应用实验', '2015', '1', '1', '2018-06-23', '5', '10', '1', '1', '1', '0', '0', '3', '郭东伟', '', '高冬', '', '0', '2018-06-04 09:33:14', '');
INSERT INTO `nks_exam` VALUES ('15', '单片机控制与应用实验', '2015', '1', '1', '2018-06-23', '5', '11', '1', '1', '2', '0', '0', '3', '郭东伟', '', '高冬', '', '0', '2018-06-04 09:33:14', '');
INSERT INTO `nks_exam` VALUES ('16', '单片机控制与应用实验', '2015', '1', '1', '2018-06-23', '5', '1', '1', '1', '11', '0', '0', '4', '郭东伟', '', '高冬', '', '0', '2018-06-04 09:33:13', '');
INSERT INTO `nks_exam` VALUES ('18', '大学英语AⅡ', '2017唐', '1', '0', '2018-06-24', '7', '11', '1', '12', '16', '0', '0', '1', '', '', '', '', '0', '2018-06-04 09:33:16', '');
INSERT INTO `nks_exam` VALUES ('19', '离散数学Ⅰ', '2017唐', '1', '0', '2018-06-23', '5', '15', '1', '12', '16', '0', '0', '2', '欧阳丹彤', '', '高冬', '', '0', '2018-06-04 09:33:15', '4-');
INSERT INTO `nks_exam` VALUES ('20', '软件工程', '2015', '1', '0', '2018-06-26', '3', '3', '1', '1', '1', '0', '0', '3', '付宏', '', '高冬', '', '0', '2018-06-04 09:33:14', '10-16-');
INSERT INTO `nks_exam` VALUES ('21', '软件工程', '2015', '1', '0', '2018-06-26', '3', '4', '1', '1', '2', '0', '0', '3', '付宏', '', '高冬', '', '0', '2018-06-04 09:33:14', '10-16-');
INSERT INTO `nks_exam` VALUES ('22', '软件工程', '2015', '1', '0', '2018-06-26', '3', '1', '1', '1', '11', '0', '0', '4', '车海燕', '', '高冬', '', '0', '2018-06-04 09:33:13', '14-16-');
INSERT INTO `nks_exam` VALUES ('23', '软件工程', '2015唐', '1', '0', '2018-06-26', '3', '13', '1', '12', '16', '0', '0', '2', '冯铁', '', '高冬', '', '0', '2018-06-04 09:33:15', '14-16-');
INSERT INTO `nks_exam` VALUES ('24', '面向对象程序设计', '2017', '1', '0', '2018-06-26', '5', '2', '1', '24', '21', '0', '0', '3', '张家晨', '', '白江', '', '0', '2018-06-04 09:33:15', '10-16-');
INSERT INTO `nks_exam` VALUES ('25', '面向对象程序设计', '2017', '1', '0', '2018-06-26', '5', '3', '1', '24', '22', '0', '0', '3', '张欣佳', '', '白江', '', '0', '2018-06-04 09:33:14', '10-16-');
INSERT INTO `nks_exam` VALUES ('26', '面向对象程序设计', '2017', '1', '0', '2018-06-26', '5', '4', '1', '24', '23', '0', '0', '3', '张欣佳', '', '白江', '', '0', '2018-06-04 09:33:14', '10-16-');
INSERT INTO `nks_exam` VALUES ('27', '面向对象程序设计', '2017', '1', '0', '2018-06-26', '5', '5', '1', '24', '24', '0', '0', '3', '张家晨', '', '白江', '', '0', '2018-06-04 09:33:14', '10-16-');
INSERT INTO `nks_exam` VALUES ('28', '面向对象程序设计', '2017', '1', '0', '2018-06-26', '5', '1', '1', '24', '17', '0', '0', '4', '陈伟', '', '白江', '', '0', '2018-06-04 09:33:13', '10-16-');
INSERT INTO `nks_exam` VALUES ('30', '单片机控制与应用实验', '2015', '1', '1', '2018-06-23', '5', '1', '1', '1', '25', '0', '0', '0', '郭东伟', '', '高冬', '', '0', '2018-06-01 08:24:32', '');
INSERT INTO `nks_exam` VALUES ('31', '网络安全', '2015', '1', '0', '2018-06-23', '5', '12', '1', '10', '25', '0', '0', '0', '杨可新', '', '高冬', '', '0', '2018-06-04 09:16:24', '');
INSERT INTO `nks_exam` VALUES ('32', '离散数学Ⅰ', '2017唐', '1', '0', '2018-06-23', '5', '15', '1', '12', '25', '0', '0', '0', '欧阳丹彤', '', '白江', '', '0', '2018-06-01 08:25:25', '');
INSERT INTO `nks_exam` VALUES ('33', '大学英语AⅡ', '2017唐', '1', '0', '2018-06-24', '7', '11', '1', '12', '25', '0', '0', '1', '公共外语学院', '', '', '', '0', '2018-06-04 09:33:16', '');
INSERT INTO `nks_exam` VALUES ('34', '软件工程', '2015', '1', '0', '2018-06-26', '3', '1', '1', '1', '25', '0', '0', '0', '车海燕', '', '高冬', '', '0', '2018-06-01 08:28:00', '');
INSERT INTO `nks_exam` VALUES ('35', '软件工程', '2015唐', '1', '0', '2018-06-26', '3', '13', '1', '12', '25', '0', '0', '0', '冯铁', '', '高冬', '', '0', '2018-06-04 09:25:00', '10-16-');
INSERT INTO `nks_exam` VALUES ('36', '面向对象程序设计', '2017', '1', '0', '2018-06-26', '5', '1', '1', '24', '25', '0', '0', '0', '陈伟', '', '白江', '', '0', '2018-06-01 08:29:42', '');
INSERT INTO `nks_exam` VALUES ('37', '计算机硬件系统设计原理Ⅱ', '2016唐', '1', '0', '2018-06-27', '5', '13', '1', '12', '16', '0', '0', '2', '齐红', '', '', '', '15', '2018-06-04 09:17:46', '');
INSERT INTO `nks_exam` VALUES ('38', '计算机硬件系统设计原理Ⅱ', '2016唐', '1', '0', '2018-06-27', '5', '13', '1', '12', '25', '0', '0', '0', '齐红', '', '', '', '0', '2018-06-04 09:17:57', '');
INSERT INTO `nks_exam` VALUES ('39', '数据库应用技术', '2015', '2', '1', '2018-06-28', '3', '2', '1', '22', '26', '0', '0', '2', '刘淼', '', '高冬', '', '15', '2018-06-04 08:57:06', '');
INSERT INTO `nks_exam` VALUES ('40', '数据库应用技术', '2015', '2', '1', '2018-06-28', '3', '2', '1', '22', '25', '0', '0', '0', '刘淼', '', '高冬', '', '0', '2018-06-04 09:17:26', '');
INSERT INTO `nks_exam` VALUES ('41', 'Linux编程', '2015唐', '2', '0', '2018-06-28', '2', '13', '1', '12', '16', '0', '0', '2', '李强', '', '高冬', '', '13', '2018-06-04 08:56:40', '');
INSERT INTO `nks_exam` VALUES ('42', 'Linux编程', '2015唐', '2', '0', '2018-06-28', '2', '13', '1', '12', '25', '0', '0', '0', '李强', '', '高冬', '', '0', '2018-06-04 08:56:00', '');
INSERT INTO `nks_exam` VALUES ('43', '数字逻辑电路', '2017', '1', '0', '2018-06-28', '5', '10', '1', '23', '21', '0', '0', '3', '朱建启', '', '白江', '', '0', '2018-06-04 09:33:14', '9-');
INSERT INTO `nks_exam` VALUES ('44', '数字逻辑电路', '2017', '1', '0', '2018-06-28', '5', '11', '1', '23', '22', '0', '0', '3', '朱建启', '', '白江', '', '0', '2018-06-04 09:33:14', '9-');
INSERT INTO `nks_exam` VALUES ('45', '数字逻辑电路', '2017', '1', '0', '2018-06-28', '5', '2', '1', '23', '23', '0', '0', '3', '刘雪洁', '', '白江', '', '0', '2018-06-04 09:33:14', '9-');
INSERT INTO `nks_exam` VALUES ('46', '数字逻辑电路', '2017', '1', '0', '2018-06-28', '5', '3', '1', '23', '24', '0', '0', '3', '吴静', '', '白江', '', '0', '2018-06-04 09:33:14', '9-');
INSERT INTO `nks_exam` VALUES ('47', '数字逻辑电路', '2017', '1', '0', '2018-06-28', '5', '4', '1', '23', '25', '0', '0', '2', '吴静', '', '白江', '', '0', '2018-06-04 09:33:15', '9-');
INSERT INTO `nks_exam` VALUES ('48', '数字逻辑', '2017唐', '1', '0', '2018-06-28', '5', '14', '1', '12', '16', '0', '0', '2', '金玉善', '', '白江', '', '11', '2018-06-04 08:42:08', '');
INSERT INTO `nks_exam` VALUES ('49', '信息安全数学基础', '2017', '1', '0', '2018-06-28', '5', '1', '1', '10', '17', '0', '0', '4', '董旭初', '', '白江', '', '4', '2018-06-04 08:39:15', '');
INSERT INTO `nks_exam` VALUES ('50', '信息安全数学基础', '2017', '1', '0', '2018-06-28', '5', '1', '1', '10', '25', '0', '0', '0', '董旭初', '', '白江', '', '0', '2018-06-04 08:39:28', '');
INSERT INTO `nks_exam` VALUES ('51', '操作系统', '2016', '1', '0', '2018-06-29', '3', '12', '1', '24', '1', '0', '0', '3', '闫昭', '', '侯树范', '', '0', '2018-06-04 09:33:14', '1-');
INSERT INTO `nks_exam` VALUES ('52', '操作系统', '2016', '1', '0', '2018-06-29', '3', '10', '1', '24', '2', '0', '0', '3', '闫昭', '', '侯树范', '', '0', '2018-06-04 09:33:14', '1-');
INSERT INTO `nks_exam` VALUES ('53', '操作系统', '2016', '1', '0', '2018-06-29', '3', '11', '1', '24', '3', '0', '0', '3', '赵冬范', '', '侯树范', '', '0', '2018-06-04 09:33:14', '1-');
INSERT INTO `nks_exam` VALUES ('54', '操作系统', '2016', '1', '0', '2018-06-29', '3', '2', '1', '24', '4', '0', '0', '3', '赵冬范', '', '侯树范', '', '0', '2018-06-04 09:33:14', '1-');
INSERT INTO `nks_exam` VALUES ('55', '操作系统', '2016', '1', '0', '2018-06-29', '3', '3', '1', '24', '5', '0', '0', '3', '王英', '', '侯树范', '', '0', '2018-06-04 09:33:14', '1-');
INSERT INTO `nks_exam` VALUES ('56', '操作系统', '2016', '1', '0', '2018-06-29', '3', '4', '1', '24', '25', '0', '0', '3', '王英', '', '侯树范', '', '0', '2018-06-04 09:33:14', '1-');
INSERT INTO `nks_exam` VALUES ('57', '操作系统', '2016唐', '1', '0', '2018-06-29', '3', '15', '1', '12', '16', '0', '0', '2', '左万利', '', '侯树范', '', '0', '2018-06-04 09:33:15', '1-');
INSERT INTO `nks_exam` VALUES ('58', '操作系统', '2016唐', '1', '0', '2018-06-29', '3', '15', '1', '12', '25', '0', '0', '0', '左万利', '', '侯树范', '', '0', '2018-06-04 08:36:42', '1-');
INSERT INTO `nks_exam` VALUES ('59', '空间解析几何（荣誉课程）', '2017唐', '1', '0', '2018-06-29', '4', '0', '1', '12', '16', '0', '0', '0', '公共数学中心', '', '', '', '0', '2018-06-01 09:53:53', '');
INSERT INTO `nks_exam` VALUES ('60', '网络协议分析与故障诊断技术实验', '2015', '1', '1', '2018-06-30', '2', '1', '1', '22', '18', '0', '0', '4', '周斌', '', '高冬', '', '0', '2018-06-04 09:33:13', '');
INSERT INTO `nks_exam` VALUES ('61', '网络协议分析与故障诊断技术实验', '2015', '1', '1', '2018-06-30', '2', '1', '1', '22', '25', '0', '0', '0', '周斌', '', '高冬', '', '0', '2018-06-01 10:07:57', '');
INSERT INTO `nks_exam` VALUES ('62', '网络协议分析与故障诊断技术实验', '2015', '1', '1', '2018-06-30', '2', '2', '1', '22', '19', '0', '0', '4', '周斌', '', '高冬', '', '0', '2018-06-04 09:33:13', '');
INSERT INTO `nks_exam` VALUES ('63', '网络协议分析与故障诊断技术实验', '2015', '1', '1', '2018-06-30', '2', '3', '1', '22', '20', '0', '0', '3', '周斌', '', '高冬', '', '0', '2018-06-04 09:33:14', '');
INSERT INTO `nks_exam` VALUES ('64', '网络协议分析与故障诊断技术实验', '2015', '1', '1', '2018-06-30', '2', '4', '1', '22', '17', '0', '0', '3', '周斌', '', '高冬', '', '0', '2018-06-04 09:33:14', '');
INSERT INTO `nks_exam` VALUES ('65', '无线网络技术', '2015', '1', '0', '2018-06-30', '3', '5', '1', '11', '27', '0', '0', '2', '王健', '', '高冬', '', '9', '2018-06-04 08:55:28', '');
INSERT INTO `nks_exam` VALUES ('66', '无线网络技术', '2015', '1', '0', '2018-06-30', '3', '5', '1', '11', '25', '0', '0', '0', '王健', '', '高冬', '', '0', '2018-06-04 08:55:40', '');
INSERT INTO `nks_exam` VALUES ('67', '程序设计综合课Ⅱ', '2017唐', '1', '0', '2018-06-30', '3', '15', '1', '11', '16', '0', '0', '2', '谷方明', '', '高冬', '', '2', '2018-06-04 09:17:00', '');
INSERT INTO `nks_exam` VALUES ('68', '中国近现代史纲要', '2017', '1', '0', '2018-06-30', '4', '9', '1', '24', '12', '0', '0', '2', '马克思主义学院', '', '白江', '', '0', '2018-06-04 09:33:15', '');
INSERT INTO `nks_exam` VALUES ('69', '中国近现代史纲要', '2017', '1', '0', '2018-06-30', '4', '17', '1', '24', '28', '0', '0', '2', '马克思主义学院', '', '白江', '', '0', '2018-06-04 09:33:15', '');
INSERT INTO `nks_exam` VALUES ('70', '中国近现代史纲要', '2017', '1', '0', '2018-06-30', '4', '2', '1', '24', '29', '0', '0', '3', '马克思主义学院', '', '白江', '', '0', '2018-06-04 09:33:14', '');
INSERT INTO `nks_exam` VALUES ('71', '中国近现代史纲要', '2017', '1', '0', '2018-06-30', '4', '3', '1', '24', '30', '0', '0', '3', '马克思主义学院', '', '白江', '', '0', '2018-06-04 09:33:14', '');
INSERT INTO `nks_exam` VALUES ('72', '中国近现代史纲要', '2017', '1', '0', '2018-06-30', '4', '1', '1', '24', '31', '0', '0', '5', '马克思主义学院', '', '白江', '', '0', '2018-06-01 10:37:03', '');
INSERT INTO `nks_exam` VALUES ('73', '中国近现代史纲要', '2017', '1', '0', '2018-06-30', '4', '0', '1', '24', '25', '0', '0', '0', '马克思主义学院', '', '', '', '0', '2018-06-01 10:37:37', '');
INSERT INTO `nks_exam` VALUES ('74', '空间解析几何（荣誉课程）', '2017唐', '1', '0', '2018-06-29', '4', '0', '1', '12', '25', '0', '0', '0', '公共数学中心', '', '', '', '0', '2018-06-01 10:38:49', '');
INSERT INTO `nks_exam` VALUES ('75', '微型计算机技术及应用', '2016', '1', '0', '2018-07-01', '3', '1', '1', '23', '18', '0', '0', '4', '秦贵和', '', '侯树范', '', '0', '2018-06-04 09:33:13', '11-');
INSERT INTO `nks_exam` VALUES ('76', '微型计算机技术及应用', '2016', '1', '0', '2018-07-01', '3', '2', '1', '23', '19', '0', '0', '3', '赵宏伟', '', '侯树范', '', '0', '2018-06-04 09:33:14', '11-');
INSERT INTO `nks_exam` VALUES ('77', '微型计算机技术及应用', '2016', '1', '0', '2018-07-01', '3', '3', '1', '23', '20', '0', '0', '3', '赵宏伟', '', '侯树范', '', '0', '2018-06-04 09:33:15', '11-');
INSERT INTO `nks_exam` VALUES ('78', '微型计算机技术及应用', '2016', '1', '0', '2018-07-01', '3', '4', '1', '23', '27', '0', '0', '3', '黄永平', '', '侯树范', '', '0', '2018-06-04 09:33:15', '11-');
INSERT INTO `nks_exam` VALUES ('79', '微型计算机技术及应用', '2016', '1', '0', '2018-07-01', '3', '4', '1', '23', '25', '0', '0', '0', '黄永平', '', '侯树范', '', '0', '2018-06-04 08:34:49', '11-');
INSERT INTO `nks_exam` VALUES ('80', '大学英语AⅣ', '2016唐', '1', '0', '2018-07-01', '2', '18', '1', '12', '16', '0', '0', '0', '公共外语学院', '', '', '', '0', '2018-06-01 13:58:59', '');
INSERT INTO `nks_exam` VALUES ('81', '大学英语AⅣ', '2016唐', '1', '0', '2018-07-01', '2', '18', '1', '12', '25', '0', '0', '0', '公共外语学院', '', '', '', '0', '2018-06-01 13:59:17', '');
INSERT INTO `nks_exam` VALUES ('82', '高等数学AⅡ', '2017', '1', '0', '2018-07-01', '4', '17', '1', '24', '12', '76', '0', '2', '公共数学中心', '', '白江', '', '0', '2018-06-04 09:33:16', '');
INSERT INTO `nks_exam` VALUES ('83', '高等数学AⅡ', '2017', '1', '0', '2018-07-01', '4', '1', '1', '24', '13', '151', '0', '4', '公共数学中心', '', '白江', '', '0', '2018-06-04 09:33:13', '');
INSERT INTO `nks_exam` VALUES ('84', '高等数学AⅡ', '2017', '1', '0', '2018-07-01', '4', '3', '1', '24', '14', '110', '0', '3', '公共数学中心', '', '白江', '', '0', '2018-06-04 09:33:14', '');
INSERT INTO `nks_exam` VALUES ('85', '高等数学AⅡ', '2017', '1', '0', '2018-07-01', '4', '4', '1', '24', '15', '112', '0', '3', '公共数学中心', '', '白江', '', '0', '2018-06-04 09:33:13', '');
INSERT INTO `nks_exam` VALUES ('86', '高等数学AⅡ', '2017', '1', '0', '2018-07-01', '4', '5', '1', '24', '5', '100', '0', '3', '公共数学中心', '', '白江', '', '0', '2018-06-04 09:33:14', '');
INSERT INTO `nks_exam` VALUES ('87', '高等数学AⅡ', '2017唐', '1', '0', '2018-07-01', '4', '0', '1', '12', '16', '0', '0', '0', '公共数学中心', '', '', '', '0', '2018-06-01 13:58:37', '');
INSERT INTO `nks_exam` VALUES ('88', '编译原理与实现', '2015', '1', '0', '2018-07-02', '3', '1', '1', '22', '1', '0', '0', '3', '刘华虓', '', '高冬', '', '0', '2018-06-04 09:33:13', '6-');
INSERT INTO `nks_exam` VALUES ('89', '编译原理与实现', '2015', '1', '0', '2018-07-02', '3', '5', '1', '22', '25', '0', '0', '0', '刘华虓', '', '高冬', '', '0', '2018-06-04 08:29:04', '');
INSERT INTO `nks_exam` VALUES ('90', '编译原理与实现', '2015', '1', '0', '2018-07-02', '3', '2', '1', '22', '2', '0', '0', '3', '张鹏', '', '高冬', '', '0', '2018-06-04 09:33:13', '6-');
INSERT INTO `nks_exam` VALUES ('91', '编译原理与实现', '2015', '1', '0', '2018-07-02', '3', '3', '1', '22', '3', '0', '0', '3', '张晶', '', '高冬', '', '0', '2018-06-04 09:33:13', '6-');
INSERT INTO `nks_exam` VALUES ('92', '编译原理与实现', '2015', '1', '0', '2018-07-02', '3', '5', '1', '22', '32', '0', '0', '2', '张鹏', '', '高冬', '', '0', '2018-06-04 09:33:16', '6-');
INSERT INTO `nks_exam` VALUES ('93', '编译原理与实现', '2015', '1', '0', '2018-07-02', '3', '4', '1', '22', '17', '0', '0', '3', '张晶', '', '高冬', '', '0', '2018-06-04 09:33:13', '6-');
INSERT INTO `nks_exam` VALUES ('94', '编译原理与实现', '2015唐', '1', '0', '2018-07-02', '3', '0', '1', '12', '16', '0', '0', '2', '郭德贵', '', '高冬', '', '0', '2018-06-04 09:33:15', '6-');
INSERT INTO `nks_exam` VALUES ('95', '大学英语BⅡ', '2017', '1', '0', '2018-07-02', '4', '19', '1', '24', '21', '0', '0', '3', '公共外语学院', '', '白江', '', '0', '2018-06-04 09:33:13', '');
INSERT INTO `nks_exam` VALUES ('96', '大学英语BⅡ', '2017', '1', '0', '2018-07-02', '4', '20', '1', '24', '22', '0', '0', '3', '公共外语学院', '', '白江', '', '0', '2018-06-04 09:33:13', '');
INSERT INTO `nks_exam` VALUES ('97', '大学英语BⅡ', '2017', '1', '0', '2018-07-02', '4', '21', '1', '24', '14', '0', '0', '3', '公共外语学院', '', '白江', '', '0', '2018-06-04 09:33:13', '');
INSERT INTO `nks_exam` VALUES ('98', '大学英语BⅡ', '2017', '1', '0', '2018-07-02', '4', '22', '1', '24', '15', '0', '0', '3', '公共外语学院', '', '白江', '', '0', '2018-06-04 09:33:13', '');
INSERT INTO `nks_exam` VALUES ('99', '大学英语BⅡ', '2017', '1', '0', '2018-07-02', '4', '23', '1', '24', '5', '0', '0', '3', '公共外语学院', '', '白江', '', '0', '2018-06-04 09:33:13', '');
INSERT INTO `nks_exam` VALUES ('100', '大学英语BⅢ', '2017', '1', '0', '2018-07-02', '4', '0', '1', '24', '0', '0', '0', '1', '公共外语学院', '', '白江', '', '0', '2018-06-04 09:33:16', '');
INSERT INTO `nks_exam` VALUES ('101', '大学英语BⅣ', '2016', '1', '0', '2018-07-03', '2', '19', '1', '24', '1', '0', '0', '3', '公共外语学院', '', '侯树范', '', '0', '2018-06-04 09:33:13', '');
INSERT INTO `nks_exam` VALUES ('102', '大学英语BⅣ', '2016', '1', '0', '2018-07-03', '2', '20', '1', '24', '2', '0', '0', '3', '公共外语学院', '', '侯树范', '', '0', '2018-06-04 09:33:13', '');
INSERT INTO `nks_exam` VALUES ('103', '大学英语BⅣ', '2016', '1', '0', '2018-07-03', '2', '21', '1', '24', '3', '0', '0', '3', '公共外语学院', '', '侯树范', '', '0', '2018-06-04 09:33:13', '');
INSERT INTO `nks_exam` VALUES ('104', '大学英语BⅣ', '2016', '1', '0', '2018-07-03', '2', '22', '1', '24', '4', '0', '0', '3', '公共外语学院', '', '侯树范', '', '0', '2018-06-04 09:33:13', '');
INSERT INTO `nks_exam` VALUES ('105', '大学英语BⅣ', '2016', '1', '0', '2018-07-03', '2', '23', '1', '24', '5', '0', '0', '3', '公共外语学院', '', '侯树范', '', '0', '2018-06-04 09:33:13', '');
INSERT INTO `nks_exam` VALUES ('106', '大学英语（语言能力提高）', '2016', '1', '0', '2018-07-03', '2', '0', '1', '24', '0', '0', '0', '1', '公共外语学院', '', '侯树范', '', '0', '2018-06-04 09:33:16', '');
INSERT INTO `nks_exam` VALUES ('107', '组合数学', '2016唐', '2', '0', '2018-07-02', '4', '0', '1', '12', '16', '0', '0', '2', '郭晓新', '', '白江', '', '7', '2018-06-04 08:27:23', '');
INSERT INTO `nks_exam` VALUES ('108', '大学英语BⅠ', '重修', '1', '0', '2018-07-03', '2', '0', '1', '12', '25', '0', '0', '0', '公共外语学院', '', '', '', '0', '2018-06-01 14:49:14', '');
INSERT INTO `nks_exam` VALUES ('109', '线性代数Ａ', '重修', '1', '0', '2018-07-03', '4', '0', '1', '0', '0', '0', '0', '0', '公共数学中心', '', '', '', '0', '2018-06-01 14:53:10', '');
INSERT INTO `nks_exam` VALUES ('110', '马克思主义基本原理概论', '2017', '1', '0', '2018-07-04', '4', '17', '1', '24', '12', '0', '0', '2', '马克思主义学院', '', '白江', '', '0', '2018-06-04 09:33:15', '');
INSERT INTO `nks_exam` VALUES ('111', '马克思主义基本原理概论', '2017', '1', '0', '2018-07-04', '4', '17', '1', '24', '28', '0', '0', '2', '马克思主义学院', '', '白江', '', '0', '2018-06-04 09:33:15', '');
INSERT INTO `nks_exam` VALUES ('112', '马克思主义基本原理概论', '2017', '1', '0', '2018-07-04', '4', '2', '1', '24', '29', '0', '0', '3', '马克思主义学院', '', '白江', '', '0', '2018-06-04 09:33:14', '');
INSERT INTO `nks_exam` VALUES ('113', '马克思主义基本原理概论', '2017', '1', '0', '2018-07-04', '4', '3', '1', '24', '30', '0', '0', '3', '马克思主义学院', '', '白江', '', '0', '2018-06-04 09:33:14', '');
INSERT INTO `nks_exam` VALUES ('114', '马克思主义基本原理概论', '2017', '1', '0', '2018-07-04', '4', '1', '1', '24', '31', '0', '0', '5', '马克思主义学院', '', '白江', '', '0', '2018-06-01 14:56:45', '');
INSERT INTO `nks_exam` VALUES ('115', '概论论与数理统计Ａ', '重修', '1', '0', '2018-07-04', '13', '0', '1', '24', '25', '0', '0', '0', '公共数学中心', '', '', '', '0', '2018-06-01 14:58:11', '');
INSERT INTO `nks_exam` VALUES ('116', '计算机系统结构', '2016', '1', '0', '2018-07-05', '3', '2', '1', '24', '1', '0', '0', '3', '李宏图', '', '侯树范', '', '0', '2018-06-04 09:33:13', '3-13-');
INSERT INTO `nks_exam` VALUES ('117', '计算机系统结构', '2016', '1', '0', '2018-07-05', '3', '3', '1', '24', '2', '0', '0', '3', '李宏图', '', '侯树范', '', '0', '2018-06-04 09:33:14', '3-13-');
INSERT INTO `nks_exam` VALUES ('118', '计算机系统结构', '2016', '1', '0', '2018-07-05', '3', '4', '1', '24', '3', '0', '0', '3', '车喜龙', '', '侯树范', '', '0', '2018-06-04 09:33:14', '3-13-');
INSERT INTO `nks_exam` VALUES ('119', '计算机系统结构', '2016', '1', '0', '2018-07-05', '3', '5', '1', '24', '4', '0', '0', '3', '刘桂霞', '', '侯树范', '', '0', '2018-06-04 09:33:14', '3-13-');
INSERT INTO `nks_exam` VALUES ('120', '计算机系统结构', '2016', '1', '0', '2018-07-05', '3', '1', '1', '24', '5', '0', '0', '3', '车喜龙', '', '侯树范', '', '0', '2018-06-04 09:33:14', '3-13-');
INSERT INTO `nks_exam` VALUES ('121', '计算机系统结构', '2016', '1', '0', '2018-07-05', '3', '1', '1', '24', '25', '0', '0', '2', '车喜龙', '', '侯树范', '', '0', '2018-06-04 09:33:15', '3-13-');
INSERT INTO `nks_exam` VALUES ('122', '基础物理学', '2017', '1', '0', '2018-07-05', '4', '12', '1', '25', '21', '0', '0', '4', '公共物理中心', '', '白江', '', '0', '2018-06-04 09:33:13', '');
INSERT INTO `nks_exam` VALUES ('123', '基础物理学', '2017', '1', '0', '2018-07-05', '4', '2', '1', '24', '29', '0', '0', '3', '公共物理中心', '', '白江', '', '0', '2018-06-04 09:33:14', '');
INSERT INTO `nks_exam` VALUES ('124', '基础物理学', '2017', '1', '0', '2018-07-05', '4', '3', '1', '24', '30', '0', '0', '3', '公共物理中心', '', '白江', '', '0', '2018-06-04 09:33:13', '');
INSERT INTO `nks_exam` VALUES ('125', '基础物理学', '2017', '1', '0', '2018-07-05', '4', '4', '1', '24', '17', '0', '0', '3', '公共物理中心', '', '白江', '', '0', '2018-06-04 09:33:14', '');
INSERT INTO `nks_exam` VALUES ('126', '基础物理学', '2017', '1', '0', '2018-07-05', '4', '5', '1', '24', '34', '0', '0', '3', '公共物理中心', '', '白江', '', '0', '2018-06-04 09:33:14', '');
INSERT INTO `nks_exam` VALUES ('127', '基础物理学', '2017', '1', '0', '2018-07-05', '4', '0', '1', '24', '25', '0', '0', '3', '公共物理中心', '', '白江', '', '0', '2018-06-04 09:33:14', '');
INSERT INTO `nks_exam` VALUES ('128', '离散数学Ⅰ', '2017', '1', '0', '2018-07-06', '3', '2', '1', '24', '21', '0', '0', '3', '张永刚', '', '白江', '', '0', '2018-06-04 09:33:14', '4-');
INSERT INTO `nks_exam` VALUES ('129', '离散数学Ⅰ', '2017', '1', '0', '2018-07-06', '3', '3', '1', '24', '22', '0', '0', '3', '于海鸿', '', '白江', '', '0', '2018-06-04 09:33:13', '4-');
INSERT INTO `nks_exam` VALUES ('130', '离散数学Ⅰ', '2017', '1', '0', '2018-07-06', '3', '4', '1', '24', '23', '0', '0', '3', '卢欣华', '', '白江', '', '0', '2018-06-04 09:33:13', '4-');
INSERT INTO `nks_exam` VALUES ('131', '离散数学Ⅰ', '2017', '1', '0', '2018-07-06', '3', '5', '1', '24', '15', '0', '0', '3', '张永刚', '', '白江', '', '0', '2018-06-04 09:33:13', '4-');
INSERT INTO `nks_exam` VALUES ('132', '离散数学Ⅰ', '2017', '1', '0', '2018-07-06', '3', '1', '1', '24', '5', '0', '0', '4', '卢欣华', '', '白江', '', '0', '2018-06-04 09:33:13', '4-');
INSERT INTO `nks_exam` VALUES ('133', '离散数学Ⅰ', '2017', '1', '0', '2018-07-06', '3', '1', '1', '24', '25', '0', '0', '0', '卢欣华', '', '白江', '', '0', '2018-06-04 08:21:28', '4-');
INSERT INTO `nks_exam` VALUES ('134', '组合数学', '2016', '2', '0', '2018-07-06', '4', '2', '1', '1', '1', '0', '0', '3', '郭晓新', '', '侯树范', '', '0', '2018-06-04 09:33:13', '7-8-');
INSERT INTO `nks_exam` VALUES ('135', '组合数学', '2016', '2', '0', '2018-07-06', '4', '3', '1', '1', '2', '0', '0', '3', '卢奕南', '', '侯树范', '', '0', '2018-06-04 09:33:13', '7-8-');
INSERT INTO `nks_exam` VALUES ('136', '组合数学', '2016', '2', '0', '2018-07-06', '4', '1', '1', '1', '11', '0', '0', '4', '卢奕南', '', '侯树范', '', '0', '2018-06-04 09:33:13', '7-8-');
INSERT INTO `nks_exam` VALUES ('137', '组合数学', '2016', '2', '0', '2018-07-06', '4', '1', '1', '1', '25', '0', '0', '0', '卢奕南', '', '侯树范', '', '0', '2018-06-04 08:21:05', '');
INSERT INTO `nks_exam` VALUES ('138', '射频识别（RFID）原理与应用', '2016', '1', '0', '2018-07-06', '4', '5', '1', '11', '27', '0', '0', '2', '王勇', '', '侯树范', '', '17', '2018-06-04 08:40:29', '');
INSERT INTO `nks_exam` VALUES ('139', 'Java程序设计', '2016', '2', '0', '2018-06-14', '6', '2', '1', '24', '1', '102', '0', '3', '黄岚', '', '侯树范', '', '0', '2018-06-04 09:33:14', '3-5-');
INSERT INTO `nks_exam` VALUES ('140', 'Java程序设计', '2016', '2', '0', '2018-06-14', '6', '3', '1', '24', '2', '107', '0', '3', '杜伟', '', '侯树范', '', '0', '2018-06-04 09:33:14', '3-5-');
INSERT INTO `nks_exam` VALUES ('141', 'Java程序设计', '2016', '2', '0', '2018-06-14', '6', '4', '1', '24', '3', '105', '0', '3', '杜伟', '', '侯树范', '', '0', '2018-06-04 09:33:14', '3-5-');
INSERT INTO `nks_exam` VALUES ('142', 'Java程序设计', '2016', '2', '0', '2018-06-14', '6', '5', '1', '24', '4', '104', '0', '3', '黄岚', '', '侯树范', '', '0', '2018-06-04 09:33:14', '3-5-');
INSERT INTO `nks_exam` VALUES ('143', 'Java程序设计', '2016', '2', '0', '2018-06-14', '6', '1', '1', '24', '5', '96', '0', '4', '王岩', '', '侯树范', '', '0', '2018-06-04 09:33:13', '3-5-');
INSERT INTO `nks_exam` VALUES ('144', 'Java程序设计', '2016', '2', '0', '2018-06-14', '6', '1', '1', '24', '25', '24', '0', '0', '王岩', '', '侯树范', '', '0', '2018-06-01 16:24:46', '');
INSERT INTO `nks_exam` VALUES ('145', 'Java程序设计', '2016唐', '2', '0', '2018-06-14', '6', '13', '1', '12', '16', '24', '0', '2', '白天', '', '侯树范', '', '0', '2018-06-04 09:33:15', '3-5-');

-- ----------------------------
-- Table structure for `nks_lab`
-- ----------------------------
DROP TABLE IF EXISTS `nks_lab`;
CREATE TABLE `nks_lab` (
  `lb_id` int(11) NOT NULL AUTO_INCREMENT,
  `lb_name` varchar(255) DEFAULT NULL,
  `us_id` int(11) DEFAULT NULL,
  `lb_num` int(11) DEFAULT NULL,
  `lb_ex_num` int(11) DEFAULT '0',
  PRIMARY KEY (`lb_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nks_lab
-- ----------------------------
INSERT INTO `nks_lab` VALUES ('1', '数据库与WEB智能', '5', '7', '0');
INSERT INTO `nks_lab` VALUES ('2', '知识科学与知识工程', '6', '16', '0');
INSERT INTO `nks_lab` VALUES ('3', '计算智能', '7', '11', '0');
INSERT INTO `nks_lab` VALUES ('4', '智能信息处理', '8', '10', '0');
INSERT INTO `nks_lab` VALUES ('5', '机器学习', '9', '13', '0');
INSERT INTO `nks_lab` VALUES ('6', '软件形式化', '10', '8', '0');
INSERT INTO `nks_lab` VALUES ('7', '计算机图形学与数字媒体', '11', '5', '1');
INSERT INTO `nks_lab` VALUES ('8', '计算机图像和虚拟现实技术', '12', '10', '0');
INSERT INTO `nks_lab` VALUES ('9', '移动通信与网络系统', '13', '9', '0');
INSERT INTO `nks_lab` VALUES ('10', '计算机协同工作技术', '14', '10', '0');
INSERT INTO `nks_lab` VALUES ('11', '智能控制与嵌入式系统', '15', '10', '0');
INSERT INTO `nks_lab` VALUES ('12', '数据库与智能网络', '31', '6', '0');
INSERT INTO `nks_lab` VALUES ('13', '网格计算与网络安全', '17', '15', '0');
INSERT INTO `nks_lab` VALUES ('14', '生物识别与信息安全技术', '18', '6', '0');
INSERT INTO `nks_lab` VALUES ('15', '传感器网络与环境智能', '30', '5', '0');
INSERT INTO `nks_lab` VALUES ('16', '软件工程', '20', '10', '1');
INSERT INTO `nks_lab` VALUES ('17', '通信软件与协议工程', '21', '10', '0');
INSERT INTO `nks_lab` VALUES ('18', '计算机空间信息处理技术', '22', '5', '0');
INSERT INTO `nks_lab` VALUES ('21', 'IBM中心', '32', '3', '0');

-- ----------------------------
-- Table structure for `nks_major`
-- ----------------------------
DROP TABLE IF EXISTS `nks_major`;
CREATE TABLE `nks_major` (
  `mj_id` int(11) NOT NULL AUTO_INCREMENT,
  `mj_name` varchar(255) DEFAULT NULL,
  `ac_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`mj_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nks_major
-- ----------------------------
INSERT INTO `nks_major` VALUES ('1', '计算机科学与技术', '1');
INSERT INTO `nks_major` VALUES ('10', '网络与信息安全', '1');
INSERT INTO `nks_major` VALUES ('11', '物联网', '1');
INSERT INTO `nks_major` VALUES ('12', '唐敖庆计算机班', '1');
INSERT INTO `nks_major` VALUES ('22', '计算机科学与技术、网络与信息安全', '1');
INSERT INTO `nks_major` VALUES ('23', '计算机科学与技术、物联网', '1');
INSERT INTO `nks_major` VALUES ('24', '计算机科学与技术、网络与信息安全、物联网', '1');
INSERT INTO `nks_major` VALUES ('25', '计算机科学与技术、网络与信息安全、物联网工程、唐班', '1');

-- ----------------------------
-- Table structure for `nks_nature`
-- ----------------------------
DROP TABLE IF EXISTS `nks_nature`;
CREATE TABLE `nks_nature` (
  `nt_id` int(11) NOT NULL AUTO_INCREMENT,
  `nt_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`nt_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nks_nature
-- ----------------------------
INSERT INTO `nks_nature` VALUES ('1', '必修课');
INSERT INTO `nks_nature` VALUES ('2', '限选课');
INSERT INTO `nks_nature` VALUES ('3', '选修课');

-- ----------------------------
-- Table structure for `nks_place`
-- ----------------------------
DROP TABLE IF EXISTS `nks_place`;
CREATE TABLE `nks_place` (
  `pl_id` int(11) NOT NULL AUTO_INCREMENT,
  `pl_place` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pl_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nks_place
-- ----------------------------
INSERT INTO `nks_place` VALUES ('1', '逸夫-10阶');
INSERT INTO `nks_place` VALUES ('2', '逸夫-11阶');
INSERT INTO `nks_place` VALUES ('3', '逸夫-12阶');
INSERT INTO `nks_place` VALUES ('4', '逸夫-13阶');
INSERT INTO `nks_place` VALUES ('5', '逸夫-14阶');
INSERT INTO `nks_place` VALUES ('7', '逸夫-421');
INSERT INTO `nks_place` VALUES ('9', '逸夫-2阶');
INSERT INTO `nks_place` VALUES ('10', '逸夫-7阶');
INSERT INTO `nks_place` VALUES ('11', '逸夫-8阶');
INSERT INTO `nks_place` VALUES ('12', '逸夫-5阶');
INSERT INTO `nks_place` VALUES ('13', '逸夫-320');
INSERT INTO `nks_place` VALUES ('14', '逸夫-423');
INSERT INTO `nks_place` VALUES ('15', '逸夫-413');
INSERT INTO `nks_place` VALUES ('16', '逸夫-417');
INSERT INTO `nks_place` VALUES ('17', '逸夫-3阶');
INSERT INTO `nks_place` VALUES ('18', '逸夫-4阶');
INSERT INTO `nks_place` VALUES ('19', '经信-F1阶');
INSERT INTO `nks_place` VALUES ('20', '经信-F2阶');
INSERT INTO `nks_place` VALUES ('21', '经信-F3阶');
INSERT INTO `nks_place` VALUES ('22', '经信-F4阶');
INSERT INTO `nks_place` VALUES ('23', '经信-F5阶');
INSERT INTO `nks_place` VALUES ('24', '经信-C105');
INSERT INTO `nks_place` VALUES ('25', '经信-C107');
INSERT INTO `nks_place` VALUES ('26', '经信-C109');

-- ----------------------------
-- Table structure for `nks_time`
-- ----------------------------
DROP TABLE IF EXISTS `nks_time`;
CREATE TABLE `nks_time` (
  `tm_id` int(11) NOT NULL AUTO_INCREMENT,
  `tm_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tm_id`) USING BTREE,
  UNIQUE KEY `tm_time` (`tm_time`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nks_time
-- ----------------------------
INSERT INTO `nks_time` VALUES ('2', '09:00-11:00');
INSERT INTO `nks_time` VALUES ('3', '09:00-11:30');
INSERT INTO `nks_time` VALUES ('4', '13:00-15:00');
INSERT INTO `nks_time` VALUES ('5', '13:00-15:30');
INSERT INTO `nks_time` VALUES ('6', '18:00-20:30');
INSERT INTO `nks_time` VALUES ('7', '18:00-20:00');
INSERT INTO `nks_time` VALUES ('13', '15:30-17:30');
INSERT INTO `nks_time` VALUES ('12', '18:00-19:30');

-- ----------------------------
-- Table structure for `nks_user`
-- ----------------------------
DROP TABLE IF EXISTS `nks_user`;
CREATE TABLE `nks_user` (
  `us_id` int(11) NOT NULL AUTO_INCREMENT,
  `us_number` varchar(255) DEFAULT NULL,
  `us_name` varchar(255) DEFAULT NULL,
  `us_password` varchar(255) DEFAULT NULL,
  `us_email` varchar(255) DEFAULT NULL,
  `us_img` blob,
  `us_admin` int(11) DEFAULT '0',
  `us_phone` varchar(255) DEFAULT NULL,
  `us_solt` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`us_id`) USING BTREE,
  UNIQUE KEY `us_number` (`us_number`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nks_user
-- ----------------------------
INSERT INTO `nks_user` VALUES ('30', '1019', '何丽莉', '420c4d312074d67475ad', '', null, '1', '', 'Uk70w1xKSy');
INSERT INTO `nks_user` VALUES ('29', '0000', '', 'fe1acd900a3fe3e7e281', '', null, '2', '', 'BGcahQ2OU1');
INSERT INTO `nks_user` VALUES ('5', '1001', '彭涛', 'df69ead67e089506ab88', '', null, '1', '', '1IG2zxvf5O');
INSERT INTO `nks_user` VALUES ('6', '1002', '贾海洋', '261a97bafbcc678b0bda', '', null, '1', '', 'UDSA4CpRui');
INSERT INTO `nks_user` VALUES ('7', '1003', '王喆', 'c65bed286c524354fe16', '', null, '1', '', 'DJqyhv2KwE');
INSERT INTO `nks_user` VALUES ('8', '1004', '张永刚', '0ea550ac38745b4422eb', '', null, '1', '', 'a8P4LMf1eb');
INSERT INTO `nks_user` VALUES ('9', '1005', '吴春国', 'd7cd1986b54e7c34a181', '', null, '1', '', '85wMCJPI6i');
INSERT INTO `nks_user` VALUES ('10', '1006', '郭德贵', '0db4f689f3fdba6f6332', '', null, '1', '', 'A5bmqogZwY');
INSERT INTO `nks_user` VALUES ('11', '1007', '王欣', '514666c5784768e2c279', '', null, '1', '', 'pJCBdoR71D');
INSERT INTO `nks_user` VALUES ('12', '1008', '李慧盈', 'd5e9146b5836d31f81c2', '', null, '1', '', 'h27TVD4vBl');
INSERT INTO `nks_user` VALUES ('13', '1009', '王健', '008b3218c521a3294203', '', null, '1', '', '9PlXt8opqz');
INSERT INTO `nks_user` VALUES ('14', '1010', '姚志林', '3a3f06e5280fa02d8877', '', null, '1', '', '6Dzt1Kvq9x');
INSERT INTO `nks_user` VALUES ('15', '1011', '赵宏伟', '70a5afa5a1bb324d5a67', '', null, '1', '', 'KOEwr9spuh');
INSERT INTO `nks_user` VALUES ('16', '1012', '王利民', '95456d746d2ac3d9a22f', '', null, '0', '', '2XzcoNgy1q');
INSERT INTO `nks_user` VALUES ('17', '1013', '李强', '48958a03624c83c5a1ab', '', null, '1', '', 'BToPtrUqM2');
INSERT INTO `nks_user` VALUES ('18', '1014', '刘元宁', 'af8e2cfb8eeb25c1ab76', '', null, '1', '', 'BzFnQkpg60');
INSERT INTO `nks_user` VALUES ('19', '1015', '胡成全', '7a1c766a8324f093fd93', '', null, '0', '', 'hlxI2ceOFX');
INSERT INTO `nks_user` VALUES ('20', '1016', '冯铁', 'e1ae1fadb52308d42587', '', null, '1', '', 'to9aXCuiKP');
INSERT INTO `nks_user` VALUES ('21', '1017', '王勇', 'b7302d277da4925bcb8b', '', null, '1', '', 'qZOLaiPgu9');
INSERT INTO `nks_user` VALUES ('22', '1018', '李颖', 'e49075cf10c456271b2b', '', null, '1', '', 'JshirtdjeF');
INSERT INTO `nks_user` VALUES ('31', '1020', '李雄飞', '85e49628c4958049faea', '', null, '1', '', 'amXwS69Fvz');
INSERT INTO `nks_user` VALUES ('32', '1021', '董立岩', 'e7a618e97ee7cdb90a14', '', null, '1', '', '1XoIalSdH7');