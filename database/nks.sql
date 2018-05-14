/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 50719
 Source Host           : localhost:3306
 Source Schema         : bdm256143399_db

 Target Server Type    : MySQL
 Target Server Version : 50719
 File Encoding         : 65001

 Date: 14/05/2018 15:39:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for nks_academy
-- ----------------------------
DROP TABLE IF EXISTS `nks_academy`;
CREATE TABLE `nks_academy`  (
  `ac_id` int(11) NOT NULL AUTO_INCREMENT,
  `ac_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ac_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nks_academy
-- ----------------------------
INSERT INTO `nks_academy` VALUES (1, '计算机科学与技术学院');

-- ----------------------------
-- Table structure for nks_class
-- ----------------------------
DROP TABLE IF EXISTS `nks_class`;
CREATE TABLE `nks_class`  (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`class_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nks_class
-- ----------------------------
INSERT INTO `nks_class` VALUES (1, '1-3班');
INSERT INTO `nks_class` VALUES (2, '4-6班');
INSERT INTO `nks_class` VALUES (3, '7-9班');
INSERT INTO `nks_class` VALUES (4, '10-12班');
INSERT INTO `nks_class` VALUES (5, '13-15班');

-- ----------------------------
-- Table structure for nks_exam
-- ----------------------------
DROP TABLE IF EXISTS `nks_exam`;
CREATE TABLE `nks_exam`  (
  `ex_id` int(11) NOT NULL AUTO_INCREMENT,
  `ex_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ex_grade` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nt_id` int(11) NULL DEFAULT NULL,
  `ex_mode` int(11) NULL DEFAULT NULL,
  `ex_date` date NULL DEFAULT NULL,
  `tm_id` int(11) NULL DEFAULT 0,
  `pl_id` int(11) NULL DEFAULT 0,
  `ac_id` int(11) NULL DEFAULT 0,
  `mj_id` int(11) NULL DEFAULT 0,
  `class_id` int(11) NULL DEFAULT 0,
  `ex_stunum` int(11) NULL DEFAULT NULL,
  `ex_absence` int(11) NULL DEFAULT NULL,
  `ex_invinum` int(11) NULL DEFAULT NULL,
  `ex_maininv` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ex_invname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ex_xunkao` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ex_note` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ex_lab` int(11) NULL DEFAULT 0,
  `ex_input_date` datetime(0) NULL DEFAULT NULL,
  `ex_not_lab` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ex_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nks_exam
-- ----------------------------
INSERT INTO `nks_exam` VALUES (1, '高等数学AIII', '2018', 1, 1, '2018-01-12', 3, 5, 1, 1, 2, 125, 0, 3, '', '闫昭 张雪松 王英', '', '', 1, '2018-05-07 15:39:13', NULL);
INSERT INTO `nks_exam` VALUES (2, '计算机导论', '2017', 2, 1, '2018-01-09', 3, 5, 1, 1, 4, 123, 0, 3, '张浩', '', '', '', 7, '2018-05-07 14:03:15', NULL);
INSERT INTO `nks_exam` VALUES (5, '模拟电子技术基础', '2017', 1, 0, '2018-01-08', 6, 7, 1, 11, 4, 123, 0, 5, '申铉京', '刘大有 欧阳继红 王生生 杨博 虞强源', '', '', 2, '2018-05-13 16:06:23', '');
INSERT INTO `nks_exam` VALUES (6, '线性代数A', '2018', 3, 0, '2019-08-10', 5, 4, 1, 12, 5, 41, 0, 5, '', '', '', '', 13, '2018-05-13 16:03:57', '');
INSERT INTO `nks_exam` VALUES (7, '离散数学II', '2016', 1, 0, '2018-01-08', 3, 4, 1, 1, 3, 123, 0, 5, '', '', '', '', 4, '2018-05-11 12:00:20', '2-5-');
INSERT INTO `nks_exam` VALUES (8, '离散数学II', '2017', 1, 0, '2018-01-08', 3, 7, 1, 1, 1, 123, 0, 2, '', '', '', '', 14, '2018-05-10 22:03:03', NULL);
INSERT INTO `nks_exam` VALUES (9, '人工智能', '2037', 1, 0, '2018-05-10', 2, 3, 1, 10, 4, 454, 0, 12, '', '彭涛 谢文慧 邱旭光 周世奇 靖思婷 张林 崔海 梁琪 王碧琳 刘姝秀 于洪江 王磊', '', '', 1, '2018-05-13 16:33:34', '6-');
INSERT INTO `nks_exam` VALUES (10, '可计算性与计算复杂性', '2018', 1, 0, '2018-05-19', 5, 5, 1, 12, 0, 123, 0, 8, '', '彭涛 谢文慧 周世奇 崔海 宋健 邱旭光 杨妮亚 王岩', '', '', 1, '2018-05-13 16:29:11', '7-8-10-');
INSERT INTO `nks_exam` VALUES (11, '人工智能', '2016', 1, 0, '2018-05-27', 3, 3, 1, 10, 3, 103, 32, 3, '', '', '', '', 6, '2018-05-11 18:20:06', '5-');
INSERT INTO `nks_exam` VALUES (12, '测试考试', '2015', 3, 1, '2018-05-09', 5, 4, 1, 10, 1, 454, 0, 1, '', '', '', '', 12, '2018-05-13 16:03:08', '1-3-');
INSERT INTO `nks_exam` VALUES (13, '测试考试2', '2017', 3, 0, '2018-05-09', 3, 3, 1, 10, 4, 123, 0, 3, '哈哈', '', '', '', 8, '2018-05-13 16:24:14', '1-3-5-');
INSERT INTO `nks_exam` VALUES (14, '测试考试23', '2017', 3, 0, '2018-05-09', 3, 7, 1, 10, 5, 234, 0, 4, 'aaaa', '', '', '', 5, '2018-05-13 16:25:21', '1-6-10-');

-- ----------------------------
-- Table structure for nks_lab
-- ----------------------------
DROP TABLE IF EXISTS `nks_lab`;
CREATE TABLE `nks_lab`  (
  `lb_id` int(11) NOT NULL AUTO_INCREMENT,
  `lb_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `us_id` int(11) NULL DEFAULT NULL,
  `lb_num` int(11) NULL DEFAULT NULL,
  `lb_ex_num` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`lb_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 21 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nks_lab
-- ----------------------------
INSERT INTO `nks_lab` VALUES (1, '数据库与WEB智能', 5, 7, 3);
INSERT INTO `nks_lab` VALUES (2, '知识科学与知识工程', 6, 20, 1);
INSERT INTO `nks_lab` VALUES (3, '计算智能', 7, 12, 0);
INSERT INTO `nks_lab` VALUES (4, '智能信息处理', 8, 23, 1);
INSERT INTO `nks_lab` VALUES (5, '智能工程', 9, 13, 1);
INSERT INTO `nks_lab` VALUES (6, '软件形式化', 10, 11, 1);
INSERT INTO `nks_lab` VALUES (7, '计算机图形学与数字媒体', 11, 7, 1);
INSERT INTO `nks_lab` VALUES (8, '计算机图像和虚拟现实技术', 12, 11, 1);
INSERT INTO `nks_lab` VALUES (9, '移动通信与网络系统', 13, 12, 0);
INSERT INTO `nks_lab` VALUES (10, '计算机协同工作技术', 14, 11, 0);
INSERT INTO `nks_lab` VALUES (11, '智能控制与嵌入式系统', 15, 11, 0);
INSERT INTO `nks_lab` VALUES (12, '数据库与智能网络', 16, 7, 1);
INSERT INTO `nks_lab` VALUES (13, '网格计算与网络安全', 17, 22, 1);
INSERT INTO `nks_lab` VALUES (14, '生物识别与信息安全技术', 18, 6, 1);
INSERT INTO `nks_lab` VALUES (15, '传感器网络与环境智能', 19, 8, 0);
INSERT INTO `nks_lab` VALUES (16, '软件工程', 20, 11, 0);
INSERT INTO `nks_lab` VALUES (17, '通信软件与协议工程', 21, 11, 0);
INSERT INTO `nks_lab` VALUES (18, '计算机空间信息处理技术', 22, 7, 0);

-- ----------------------------
-- Table structure for nks_major
-- ----------------------------
DROP TABLE IF EXISTS `nks_major`;
CREATE TABLE `nks_major`  (
  `mj_id` int(11) NOT NULL AUTO_INCREMENT,
  `mj_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ac_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`mj_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 22 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nks_major
-- ----------------------------
INSERT INTO `nks_major` VALUES (1, '计算机科学与技术', 1);
INSERT INTO `nks_major` VALUES (10, '网络与信息安全', 1);
INSERT INTO `nks_major` VALUES (11, '物联网', 1);
INSERT INTO `nks_major` VALUES (12, '唐敖庆计算机班', 1);

-- ----------------------------
-- Table structure for nks_nature
-- ----------------------------
DROP TABLE IF EXISTS `nks_nature`;
CREATE TABLE `nks_nature`  (
  `nt_id` int(11) NOT NULL AUTO_INCREMENT,
  `nt_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`nt_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nks_nature
-- ----------------------------
INSERT INTO `nks_nature` VALUES (1, '必修课');
INSERT INTO `nks_nature` VALUES (2, '限选课');
INSERT INTO `nks_nature` VALUES (3, '选修课');

-- ----------------------------
-- Table structure for nks_place
-- ----------------------------
DROP TABLE IF EXISTS `nks_place`;
CREATE TABLE `nks_place`  (
  `pl_id` int(11) NOT NULL AUTO_INCREMENT,
  `pl_place` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`pl_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nks_place
-- ----------------------------
INSERT INTO `nks_place` VALUES (1, '逸夫-10阶');
INSERT INTO `nks_place` VALUES (2, '逸夫-11阶');
INSERT INTO `nks_place` VALUES (3, '逸夫-12阶');
INSERT INTO `nks_place` VALUES (4, '逸夫-13阶');
INSERT INTO `nks_place` VALUES (5, '逸夫-14阶');
INSERT INTO `nks_place` VALUES (7, '逸夫-421');

-- ----------------------------
-- Table structure for nks_time
-- ----------------------------
DROP TABLE IF EXISTS `nks_time`;
CREATE TABLE `nks_time`  (
  `tm_id` int(11) NOT NULL AUTO_INCREMENT,
  `tm_time` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`tm_id`) USING BTREE,
  UNIQUE INDEX `tm_time`(`tm_time`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nks_time
-- ----------------------------
INSERT INTO `nks_time` VALUES (1, '8:30-11:30');
INSERT INTO `nks_time` VALUES (2, '9:00-11:00');
INSERT INTO `nks_time` VALUES (3, '9:00-11:30');
INSERT INTO `nks_time` VALUES (4, '13:00-15:00');
INSERT INTO `nks_time` VALUES (5, '13:00-15:30');
INSERT INTO `nks_time` VALUES (6, '18:30-20:30');
INSERT INTO `nks_time` VALUES (7, '18:00-21:00');

-- ----------------------------
-- Table structure for nks_user
-- ----------------------------
DROP TABLE IF EXISTS `nks_user`;
CREATE TABLE `nks_user`  (
  `us_id` int(11) NOT NULL AUTO_INCREMENT,
  `us_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `us_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `us_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `us_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `us_img` blob NULL,
  `us_admin` int(11) NULL DEFAULT 0,
  `us_phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `us_solt` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`us_id`) USING BTREE,
  UNIQUE INDEX `us_number`(`us_number`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 30 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nks_user
-- ----------------------------
INSERT INTO `nks_user` VALUES (29, '0000', '', 'fe1acd900a3fe3e7e281', '', NULL, 2, '', 'BGcahQ2OU1');
INSERT INTO `nks_user` VALUES (5, '1001', '彭涛', 'df69ead67e089506ab88', '', NULL, 1, '', '1IG2zxvf5O');
INSERT INTO `nks_user` VALUES (6, '1002', '贾海洋', '261a97bafbcc678b0bda', '', NULL, 1, '', 'UDSA4CpRui');
INSERT INTO `nks_user` VALUES (7, '1003', '王喆', 'c65bed286c524354fe16', '', NULL, 1, '', 'DJqyhv2KwE');
INSERT INTO `nks_user` VALUES (8, '1004', '张永刚', '0ea550ac38745b4422eb', '', NULL, 1, '', 'a8P4LMf1eb');
INSERT INTO `nks_user` VALUES (9, '1005', '吴春国', 'd7cd1986b54e7c34a181', '', NULL, 1, '', '85wMCJPI6i');
INSERT INTO `nks_user` VALUES (10, '1006', '郭德贵', '0db4f689f3fdba6f6332', '', NULL, 1, '', 'A5bmqogZwY');
INSERT INTO `nks_user` VALUES (11, '1007', '王欣', '514666c5784768e2c279', '', NULL, 1, '', 'pJCBdoR71D');
INSERT INTO `nks_user` VALUES (12, '1008', '李慧盈', 'd5e9146b5836d31f81c2', '', NULL, 1, '', 'h27TVD4vBl');
INSERT INTO `nks_user` VALUES (13, '1009', '王健', '008b3218c521a3294203', '', NULL, 1, '', '9PlXt8opqz');
INSERT INTO `nks_user` VALUES (14, '1010', '姚志林', '3a3f06e5280fa02d8877', '', NULL, 1, '', '6Dzt1Kvq9x');
INSERT INTO `nks_user` VALUES (15, '1011', '赵宏伟', '70a5afa5a1bb324d5a67', '', NULL, 1, '', 'KOEwr9spuh');
INSERT INTO `nks_user` VALUES (16, '1012', '王利民', '95456d746d2ac3d9a22f', '', NULL, 1, '', '2XzcoNgy1q');
INSERT INTO `nks_user` VALUES (17, '1013', '李强', '48958a03624c83c5a1ab', '', NULL, 1, '', 'BToPtrUqM2');
INSERT INTO `nks_user` VALUES (18, '1014', '刘元宁', 'af8e2cfb8eeb25c1ab76', '', NULL, 1, '', 'BzFnQkpg60');
INSERT INTO `nks_user` VALUES (19, '1015', '胡成全', '7a1c766a8324f093fd93', '', NULL, 1, '', 'hlxI2ceOFX');
INSERT INTO `nks_user` VALUES (20, '1016', '冯铁', 'e1ae1fadb52308d42587', '', NULL, 1, '', 'to9aXCuiKP');
INSERT INTO `nks_user` VALUES (21, '1017', '王勇', 'b7302d277da4925bcb8b', '', NULL, 1, '', 'qZOLaiPgu9');
INSERT INTO `nks_user` VALUES (22, '1018', '李颖', 'e49075cf10c456271b2b', '', NULL, 1, '', 'JshirtdjeF');

SET FOREIGN_KEY_CHECKS = 1;
