/*
 Navicat Premium Data Transfer

 Source Server         : yuanyuan-ali
 Source Server Type    : MySQL
 Source Server Version : 50728
 Source Host           : 127.0.0.1:3306
 Source Schema         : wechat

 Target Server Type    : MySQL
 Target Server Version : 50728
 File Encoding         : 65001

 Date: 17/02/2020 09:49:06
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `openid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`admin_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'admin', 'admin', 'ocsMa5xHL7dvaamWPhpAFC--cyTs');
INSERT INTO `admin` VALUES (2, 'index', 'index', '');

-- ----------------------------
-- Table structure for blii
-- ----------------------------
DROP TABLE IF EXISTS `blii`;
CREATE TABLE `blii`  (
  `b_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  PRIMARY KEY (`b_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of blii
-- ----------------------------
INSERT INTO `blii` VALUES (1, '柯基', 112);
INSERT INTO `blii` VALUES (2, '周芷若', 113);
INSERT INTO `blii` VALUES (3, '10', 114);

-- ----------------------------
-- Table structure for channl
-- ----------------------------
DROP TABLE IF EXISTS `channl`;
CREATE TABLE `channl`  (
  `c_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `c_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `c_80` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '标识',
  `jpg_path` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `channl_num` int(255) DEFAULT NULL,
  `add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`c_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of channl
-- ----------------------------
INSERT INTO `channl` VALUES (1, '视频渠道', '111', 'channel/cb4c355e6c66c85ff67a91b674a43849.jpg', 23, 1562819458);
INSERT INTO `channl` VALUES (2, '街道推广', '152', 'channel/46f583f154c0df1e8bab7b452d25cf68.jpg', 6, 1562827479);
INSERT INTO `channl` VALUES (5, '视频退网', '676', 'channel/7c62ba7abf8ed787add065ca38714acc.jpg', NULL, 1563615219);
INSERT INTO `channl` VALUES (6, '电脑推广', '801', 'channel/151a4be7fd335d13df57f3418264962d.jpg', NULL, 1563861922);

-- ----------------------------
-- Table structure for geography
-- ----------------------------
DROP TABLE IF EXISTS `geography`;
CREATE TABLE `geography`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `openid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Latitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Longitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nickname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `headimgurl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 55 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of geography
-- ----------------------------
INSERT INTO `geography` VALUES (39, 'ocsMa5xHL7dvaamWPhpAFC--cyTs', '40.144135', '116.283119', '缓存```温柔', 'http://thirdwx.qlogo.cn/mmopen/7TuqCUC7rePMA5fjqMlicOTpvewjjrGwQZKjepqia1Wre4yCjuaibFqibZmYwSpTk1UC69ib4bBoM0DZSBq6bmh1ibPhlINlqTFWgr/132');
INSERT INTO `geography` VALUES (40, 'ocsMa5xHL7dvaamWPhpAFC--cyTs', '40.144135', '116.283119', '缓存```温柔', 'http://thirdwx.qlogo.cn/mmopen/7TuqCUC7rePMA5fjqMlicOTpvewjjrGwQZKjepqia1Wre4yCjuaibFqibZmYwSpTk1UC69ib4bBoM0DZSBq6bmh1ibPhlINlqTFWgr/132');
INSERT INTO `geography` VALUES (41, 'ocsMa5xHL7dvaamWPhpAFC--cyTs', '40.144135', '116.283119', '缓存```温柔', 'http://thirdwx.qlogo.cn/mmopen/7TuqCUC7rePMA5fjqMlicOTpvewjjrGwQZKjepqia1Wre4yCjuaibFqibZmYwSpTk1UC69ib4bBoM0DZSBq6bmh1ibPhlINlqTFWgr/132');
INSERT INTO `geography` VALUES (42, 'ocsMa5xHL7dvaamWPhpAFC--cyTs', '40.144135', '116.283119', '缓存```温柔', 'http://thirdwx.qlogo.cn/mmopen/7TuqCUC7rePMA5fjqMlicOTpvewjjrGwQZKjepqia1Wre4yCjuaibFqibZmYwSpTk1UC69ib4bBoM0DZSBq6bmh1ibPhlINlqTFWgr/132');
INSERT INTO `geography` VALUES (43, 'ocsMa5xHL7dvaamWPhpAFC--cyTs', '40.144135', '116.283119', '缓存```温柔', 'http://thirdwx.qlogo.cn/mmopen/7TuqCUC7rePMA5fjqMlicOTpvewjjrGwQZKjepqia1Wre4yCjuaibFqibZmYwSpTk1UC69ib4bBoM0DZSBq6bmh1ibPhlINlqTFWgr/132');
INSERT INTO `geography` VALUES (44, 'ocsMa5xHL7dvaamWPhpAFC--cyTs', '40.144135', '116.283119', '缓存```温柔', 'http://thirdwx.qlogo.cn/mmopen/7TuqCUC7rePMA5fjqMlicOTpvewjjrGwQZKjepqia1Wre4yCjuaibFqibZmYwSpTk1UC69ib4bBoM0DZSBq6bmh1ibPhlINlqTFWgr/132');
INSERT INTO `geography` VALUES (45, 'ocsMa5xHL7dvaamWPhpAFC--cyTs', '40.144135', '116.283119', '缓存```温柔', 'http://thirdwx.qlogo.cn/mmopen/7TuqCUC7rePMA5fjqMlicOTpvewjjrGwQZKjepqia1Wre4yCjuaibFqibZmYwSpTk1UC69ib4bBoM0DZSBq6bmh1ibPhlINlqTFWgr/132');
INSERT INTO `geography` VALUES (46, 'ocsMa5xHL7dvaamWPhpAFC--cyTs', '40.144135', '116.283119', '缓存```温柔', 'http://thirdwx.qlogo.cn/mmopen/7TuqCUC7rePMA5fjqMlicOTpvewjjrGwQZKjepqia1Wre4yCjuaibFqibZmYwSpTk1UC69ib4bBoM0DZSBq6bmh1ibPhlINlqTFWgr/132');
INSERT INTO `geography` VALUES (47, 'ocsMa5xHL7dvaamWPhpAFC--cyTs', '40.144135', '116.283119', '缓存```温柔', 'http://thirdwx.qlogo.cn/mmopen/7TuqCUC7rePMA5fjqMlicOTpvewjjrGwQZKjepqia1Wre4yCjuaibFqibZmYwSpTk1UC69ib4bBoM0DZSBq6bmh1ibPhlINlqTFWgr/132');
INSERT INTO `geography` VALUES (48, 'ocsMa5xHL7dvaamWPhpAFC--cyTs', '40.144135', '116.283119', '缓存```温柔', 'http://thirdwx.qlogo.cn/mmopen/7TuqCUC7rePMA5fjqMlicOTpvewjjrGwQZKjepqia1Wre4yCjuaibFqibZmYwSpTk1UC69ib4bBoM0DZSBq6bmh1ibPhlINlqTFWgr/132');
INSERT INTO `geography` VALUES (49, 'ocsMa5xHL7dvaamWPhpAFC--cyTs', '40.144135', '116.283119', '缓存```温柔', 'http://thirdwx.qlogo.cn/mmopen/7TuqCUC7rePMA5fjqMlicOTpvewjjrGwQZKjepqia1Wre4yCjuaibFqibZmYwSpTk1UC69ib4bBoM0DZSBq6bmh1ibPhlINlqTFWgr/132');
INSERT INTO `geography` VALUES (50, 'ocsMa5xHL7dvaamWPhpAFC--cyTs', '40.144135', '116.283119', '缓存```温柔', 'http://thirdwx.qlogo.cn/mmopen/7TuqCUC7rePMA5fjqMlicOTpvewjjrGwQZKjepqia1Wre4yCjuaibFqibZmYwSpTk1UC69ib4bBoM0DZSBq6bmh1ibPhlINlqTFWgr/132');
INSERT INTO `geography` VALUES (51, 'ocsMa5xHL7dvaamWPhpAFC--cyTs', '40.144135', '116.283119', '缓存```温柔', 'http://thirdwx.qlogo.cn/mmopen/7TuqCUC7rePMA5fjqMlicOTpvewjjrGwQZKjepqia1Wre4yCjuaibFqibZmYwSpTk1UC69ib4bBoM0DZSBq6bmh1ibPhlINlqTFWgr/132');
INSERT INTO `geography` VALUES (52, 'ocsMa5xHL7dvaamWPhpAFC--cyTs', '40.144135', '116.283119', '缓存```温柔', 'http://thirdwx.qlogo.cn/mmopen/7TuqCUC7rePMA5fjqMlicOTpvewjjrGwQZKjepqia1Wre4yCjuaibFqibZmYwSpTk1UC69ib4bBoM0DZSBq6bmh1ibPhlINlqTFWgr/132');
INSERT INTO `geography` VALUES (53, 'ocsMa5xHL7dvaamWPhpAFC--cyTs', '40.144135', '116.283119', '缓存```温柔', 'http://thirdwx.qlogo.cn/mmopen/7TuqCUC7rePMA5fjqMlicOTpvewjjrGwQZKjepqia1Wre4yCjuaibFqibZmYwSpTk1UC69ib4bBoM0DZSBq6bmh1ibPhlINlqTFWgr/132');
INSERT INTO `geography` VALUES (54, 'ocsMa5xHL7dvaamWPhpAFC--cyTs', '40.145657', '116.283562', '缓存```温柔', 'http://thirdwx.qlogo.cn/mmopen/7TuqCUC7rePMA5fjqMlicOTpvewjjrGwQZKjepqia1Wre4yCjuaibFqibZmYwSpTk1UC69ib4bBoM0DZSBq6bmh1ibPhlINlqTFWgr/132');

-- ----------------------------
-- Table structure for login
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login`  (
  `login_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `login_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `login_pwd` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `openid` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`login_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of login
-- ----------------------------
INSERT INTO `login` VALUES (1, 'admin', 'admin', 'ocsMa5xHL7dvaamWPhpAFC--cyTs');

-- ----------------------------
-- Table structure for mass
-- ----------------------------
DROP TABLE IF EXISTS `mass`;
CREATE TABLE `mass`  (
  `mass_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '标签id',
  `openid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '关注用户openid',
  PRIMARY KEY (`mass_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mass
-- ----------------------------
INSERT INTO `mass` VALUES (1, '112', '[\"ocsMa5ys0zc7akt5XWgjLzubR9X4\"]');
INSERT INTO `mass` VALUES (2, '112', '[\"ocsMa5xuojFVms8Kh_4aQGp_ycf4\",\"ocsMa58vHb6HP_EvO1f7ZVHSJ-as\"]');
INSERT INTO `mass` VALUES (14, '113', '[\"ocsMa5xuojFVms8Kh_4aQGp_ycf4\"]');
INSERT INTO `mass` VALUES (15, '113', '[\"ocsMa58QUf89zO3CFd5m9P8Yihls\"]');
INSERT INTO `mass` VALUES (16, '113', '[\"ocsMa5xHL7dvaamWPhpAFC--cyTs\",\"ocsMa53RfIe3E2MZ1ZGYkjlte3wI\"]');

-- ----------------------------
-- Table structure for media
-- ----------------------------
DROP TABLE IF EXISTS `media`;
CREATE TABLE `media`  (
  `m_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `m_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '素材名称',
  `m_path` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '素材类型',
  `m_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'temporary临时素材，perpetual永久素材',
  `m_format` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '素材格式 ',
  `m_addtime` int(255) DEFAULT NULL COMMENT '素材添加时间',
  `wechat_media_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '微信服务器存储图片的标识',
  PRIMARY KEY (`m_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 36 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of media
-- ----------------------------
INSERT INTO `media` VALUES (34, '图1', 'uploads/fa7bf74692caabcee6af5ab6af7abe9b.mp3', 'perpetual', 'voice', 1563604454, 'jM4v2zS35BHDeANdLHwPKstkDDaFPzNHaRGBTcNgF5Q');
INSERT INTO `media` VALUES (32, '图1', 'uploads/77d2a378c8886ca3985a31f53ae96c6b.mp3', 'perpetual', 'voice', 1563604320, 'jM4v2zS35BHDeANdLHwPKnX7Rzg81lhdDOVdZqz0GSs');
INSERT INTO `media` VALUES (35, '图1', 'uploads/9381a57da8f1d54b89c03a7eb24047a5.jpg', 'temporary', 'image', 1563604466, 'KegFgEoNCQ4GQxutgWYzIKbz73YuxaLPPj9_jqGBBRttzo35hq8GksahVQQWmNHb');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `menu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `menu_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `menu_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `p_id` int(11) DEFAULT 0,
  PRIMARY KEY (`menu_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (1, '查人品', 'click', '883', 0);
INSERT INTO `menu` VALUES (4, '许愿墙', 'click', '', 0);
INSERT INTO `menu` VALUES (8, '绑定账号', 'view', 'http://www.yuanyuanliuliu.com/login_add', 0);
INSERT INTO `menu` VALUES (11, '许愿墙发布', 'view', 'http://www.yuanyuanliuliu.com/wish_add', 4);
INSERT INTO `menu` VALUES (12, '许愿墙列表', 'view', 'http://www.yuanyuanliuliu.com/wish_index', 4);

-- ----------------------------
-- Table structure for menu1
-- ----------------------------
DROP TABLE IF EXISTS `menu1`;
CREATE TABLE `menu1`  (
  `menu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '菜单名字',
  `menu_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '菜单类型 点击或跳转',
  `menu_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '菜单标识',
  `p_id` int(11) DEFAULT NULL COMMENT '二级菜单',
  PRIMARY KEY (`menu_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu1
-- ----------------------------
INSERT INTO `menu1` VALUES (1, '我要表白', 'view', 'http://www.yuanyuanliuliu.com/profress_add', NULL);
INSERT INTO `menu1` VALUES (2, '我de表白', 'view', 'http://www.yuanyuanliuliu.com/my_profress', NULL);

-- ----------------------------
-- Table structure for profess
-- ----------------------------
DROP TABLE IF EXISTS `profess`;
CREATE TABLE `profess`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `openid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `anonymity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '是否匿名',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of profess
-- ----------------------------
INSERT INTO `profess` VALUES (1, '[\"ocsMa5xuojFVms8Kh_4aQGp_ycf4\",\"ocsMa5_yyhMCN3c7_SZprqUYZOKA\"]', '嗯', '');
INSERT INTO `profess` VALUES (2, '[\"ocsMa57NBaBHAQpQBcAst2zl1QS4\",\"ocsMa5_yyhMCN3c7_SZprqUYZOKA\"]', '非得', '');
INSERT INTO `profess` VALUES (3, '[\"ocsMa5xHL7dvaamWPhpAFC--cyTs\"]', '给别人', '');
INSERT INTO `profess` VALUES (4, '[\"ocsMa5xHL7dvaamWPhpAFC--cyTs\"]', '非得', '');
INSERT INTO `profess` VALUES (5, '[\"ocsMa5xHL7dvaamWPhpAFC--cyTs\"]', '能发货', '');
INSERT INTO `profess` VALUES (6, '[\"ocsMa5xHL7dvaamWPhpAFC--cyTs\"]', '人呢', '匿名');
INSERT INTO `profess` VALUES (7, '[\"ocsMa5xHL7dvaamWPhpAFC--cyTs\"]', '会拒绝', '匿名');
INSERT INTO `profess` VALUES (8, '[\"ocsMa5xuojFVms8Kh_4aQGp_ycf4\"]', '好好好', '非匿名');

-- ----------------------------
-- Table structure for receipt
-- ----------------------------
DROP TABLE IF EXISTS `receipt`;
CREATE TABLE `receipt`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `receipt_show` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `openid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of receipt
-- ----------------------------
INSERT INTO `receipt` VALUES (1, '油价', 'fromUser');
INSERT INTO `receipt` VALUES (2, '想你想你', 'ocsMa5xHL7dvaamWPhpAFC--cyTs');
INSERT INTO `receipt` VALUES (3, '晋级赛', 'ocsMa5xHL7dvaamWPhpAFC--cyTs');

-- ----------------------------
-- Table structure for red_packet
-- ----------------------------
DROP TABLE IF EXISTS `red_packet`;
CREATE TABLE `red_packet`  (
  `red_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `red_money` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `red_people` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`red_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of red_packet
-- ----------------------------
INSERT INTO `red_packet` VALUES (1, '23', '435');

-- ----------------------------
-- Table structure for reply
-- ----------------------------
DROP TABLE IF EXISTS `reply`;
CREATE TABLE `reply`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of reply
-- ----------------------------
INSERT INTO `reply` VALUES (2, '{\"path\":\"uploads\\/8aa8a6da7c32e4b2f9db83614d516081.jpg\",\"media_id\":\"1k3JQ6ARulz4gHID-3ShcKCM2NKbNX4m_AmuIvSayQyyzngGDTCX7sMBETSmQZ2E\",\"type\":\"image\"}');
INSERT INTO `reply` VALUES (4, '{\"type\":\"text\",\"content\":\"\\u5206\\u644a\"}');
INSERT INTO `reply` VALUES (5, '{\"type\":\"text\",\"content\":\"\\u5206\\u644a\"}');
INSERT INTO `reply` VALUES (9, '{\"type\":\"text\",\"content\":\"\\u8ba2\\u5355\"}');

-- ----------------------------
-- Table structure for send
-- ----------------------------
DROP TABLE IF EXISTS `send`;
CREATE TABLE `send`  (
  `send_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `send_way` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'part 部分，all全部，blii 标签',
  `tag_id` int(11) DEFAULT NULL COMMENT '标签id',
  `openid` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`send_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of send
-- ----------------------------
INSERT INTO `send` VALUES (1, 'blii', 112, NULL, '查询v成', 1563440064);
INSERT INTO `send` VALUES (2, 'all', NULL, '[\"ocsMa5ys0zc7akt5XWgjLzubR9X4\",\"ocsMa5xuojFVms8Kh_4aQGp_ycf4\",\"ocsMa58vHb6HP_EvO1f7ZVHSJ-as\",\"ocsMa57ROt2P4RkQbh1TbnspKsBs\",\"ocsMa57NBaBHAQpQBcAst2zl1QS4\",\"ocsMa58QUf89zO3CFd5m9P8Yihls\",\"ocsMa548z8cy7-NZ05IDd6kNt5gg\",\"ocsMa5xHL7dvaamWPhpAFC--cyTs\",\"ocsMa53RfIe3E2MZ1ZGYkjlte3wI\"]', '触发', 1563447527);
INSERT INTO `send` VALUES (3, 'part', NULL, '[\"ocsMa5ys0zc7akt5XWgjLzubR9X4\",\"ocsMa57NBaBHAQpQBcAst2zl1QS4\"]', '胸部', 1563454716);
INSERT INTO `send` VALUES (9, 'all', NULL, '[\"ocsMa5ys0zc7akt5XWgjLzubR9X4\",\"ocsMa5xuojFVms8Kh_4aQGp_ycf4\",\"ocsMa58vHb6HP_EvO1f7ZVHSJ-as\",\"ocsMa57ROt2P4RkQbh1TbnspKsBs\",\"ocsMa57NBaBHAQpQBcAst2zl1QS4\",\"ocsMa58QUf89zO3CFd5m9P8Yihls\",\"ocsMa548z8cy7-NZ05IDd6kNt5gg\",\"ocsMa5xHL7dvaamWPhpAFC--cyTs\",\"ocsMa53RfIe3E2MZ1ZGYkjlte3wI\"]', '终于好使了，大家同乐啊 ，哈哈哈哈哈哈哈哈哈哈或哈哈', 1563497109);

-- ----------------------------
-- Table structure for suggest
-- ----------------------------
DROP TABLE IF EXISTS `suggest`;
CREATE TABLE `suggest`  (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`s_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of suggest
-- ----------------------------
INSERT INTO `suggest` VALUES (1, 'ocsMa5xHL7dvaamWPhpAFC--cyTs', '的抗衰老');
INSERT INTO `suggest` VALUES (2, 'ocsMa5xHL7dvaamWPhpAFC--cyTs', '的抗衰老');
INSERT INTO `suggest` VALUES (3, 'ocsMa5xHL7dvaamWPhpAFC--cyTs', ' DDD');

-- ----------------------------
-- Table structure for title
-- ----------------------------
DROP TABLE IF EXISTS `title`;
CREATE TABLE `title`  (
  `title_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `title_A` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `title_B` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `title_correct` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`title_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of title
-- ----------------------------
INSERT INTO `title` VALUES (1, '你未来有钱吗？？', '不好有意思，我将来有钻石', '有很多，很多money', 'A');
INSERT INTO `title` VALUES (2, '丹凤可爱吗', '很可爱', '不，她在我心里是纯洁，无可替代的人', 'B');

-- ----------------------------
-- Table structure for title_reply
-- ----------------------------
DROP TABLE IF EXISTS `title_reply`;
CREATE TABLE `title_reply`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title_id` int(11) DEFAULT NULL,
  `title_correct` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `title_reply` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `openid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `num` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of title_reply
-- ----------------------------
INSERT INTO `title_reply` VALUES (1, 1, 'A', 'B', 'ocsMa5xHL7dvaamWPhpAFC--cyTs', 0);
INSERT INTO `title_reply` VALUES (10, 1, 'A', 'A', 'ocsMa5xHL7dvaamWPhpAFC--cyTs', 1);
INSERT INTO `title_reply` VALUES (11, 1, 'A', 'A', 'ocsMa5xHL7dvaamWPhpAFC--cyTs', 1);
INSERT INTO `title_reply` VALUES (14, 1, 'A', 'A', 'ocsMa5_yyhMCN3c7_SZprqUYZOKA', 1);
INSERT INTO `title_reply` VALUES (15, 1, 'A', 'B', 'ocsMa5_yyhMCN3c7_SZprqUYZOKA', 0);
INSERT INTO `title_reply` VALUES (16, 2, 'B', 'B', 'ocsMa5_yyhMCN3c7_SZprqUYZOKA', 1);
INSERT INTO `title_reply` VALUES (17, 1, 'A', NULL, 'ocsMa58vHb6HP_EvO1f7ZVHSJ-as', NULL);
INSERT INTO `title_reply` VALUES (18, 2, 'B', NULL, 'ocsMa5xHL7dvaamWPhpAFC--cyTs', NULL);
INSERT INTO `title_reply` VALUES (19, 1, 'A', NULL, 'ocsMa58vHb6HP_EvO1f7ZVHSJ-as', NULL);
INSERT INTO `title_reply` VALUES (20, 2, 'B', NULL, 'ocsMa58vHb6HP_EvO1f7ZVHSJ-as', NULL);
INSERT INTO `title_reply` VALUES (21, 1, 'A', 'A', 'ocsMa58vHb6HP_EvO1f7ZVHSJ-as', 1);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `openid` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nickname` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sex` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `headimgurl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subscribe_time` int(11) DEFAULT NULL,
  `channel_status` int(11) DEFAULT NULL,
  `channel_ticket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (7, 'ocsMa5xHL7dvaamWPhpAFC--cyTs', '缓存```温柔', '2', 'http://thirdwx.qlogo.cn/mmopen/7TuqCUC7rePMA5fjqMlicOTpvewjjrGwQZKjepqia1Wre4yCjuaibFqibZmYwSpTk1UC69ib4bBoM0DZSBq6bmh1ibPhlINlqTFWgr/132', '哈尔滨', '2', 1563160107, 1, NULL);
INSERT INTO `user` VALUES (8, 'ocsMa5_2-u7_D8LfDMwzRYywuJk4', '。。。', '1', 'http://thirdwx.qlogo.cn/mmopen/PpJOdakOp6iciavXeBpELc8D1pfavAjuvCKpPyxOW6bzbrL8ibotraB3fGQYkiaZZcJfftb8KWBDYMsgD8SjHZwrdygrMsxVNFev/132', '邯郸', '2', 1563353795, 1, NULL);
INSERT INTO `user` VALUES (9, 'ocsMa58QUf89zO3CFd5m9P8Yihls', '阿尼', '1', 'http://thirdwx.qlogo.cn/mmopen/heNSJSe6iaibKWjjKvwd0gpIo1pdVPM2uEa0Nv280KFAofd90kmEn11uhee24YusO49jeP67Ih2zqgPeC7g62yq9p3icrpYnrB6/132', '运城', '1', 1563353803, 1, NULL);
INSERT INTO `user` VALUES (10, 'ocsMa58vHb6HP_EvO1f7ZVHSJ-as', '柚子君', '2', 'http://thirdwx.qlogo.cn/mmopen/3lxXfP8aqwPOwJV5icj6P4n48jopRwTD0cU5qBGxribLNzrHAjDJ606UWVG8OQz6m5h0m9vIiaX41icyzZE9g7pdZPb3bA3dlJ3A/132', '', '2', 1563353832, 1, NULL);
INSERT INTO `user` VALUES (11, 'ocsMa5xuojFVms8Kh_4aQGp_ycf4', 'DD', '1', 'http://thirdwx.qlogo.cn/mmopen/7TuqCUC7reOROC78dIGJ6MZWYoeI4tRS6dlq5NysoPh18EEHfOTDiapxWtZrc7ZVTbOuhbOaML01ma9UP87oq7BOFKibmZB3BV/132', '', '1', 1563353849, 1, NULL);
INSERT INTO `user` VALUES (12, 'ocsMa57ROt2P4RkQbh1TbnspKsBs', '空白\\', '1', 'http://thirdwx.qlogo.cn/mmopen/3lxXfP8aqwPOwJV5icj6P4uN1MccbQ3JsNfg611pOTtuZbMKC2rfflmnpyn0iaxWibXSlf6SdpHsehSVPJfBYlicxANqD0QNTdHk/132', '', '2', 1563353912, 1, NULL);
INSERT INTO `user` VALUES (13, 'ocsMa53RfIe3E2MZ1ZGYkjlte3wI', '', '1', 'http://thirdwx.qlogo.cn/mmopen/Q3auHgzwzM5kdIkoSPPuiaKzhicRALCVPJibP60s3jkZBiag0ic50TjmwVzVws79LBnMDWibiasy4ssmko9sVCAmmnwApxM64nB0wXGhbRBxcgyeDg/132', '', '1', 1563353998, 1, NULL);
INSERT INTO `user` VALUES (14, 'ocsMa57NBaBHAQpQBcAst2zl1QS4', '张英杰', '1', 'http://thirdwx.qlogo.cn/mmopen/3lxXfP8aqwPOwJV5icj6P4ohln0vOekak3c7Q7LLghfJhbugT0Mc9T5m3JVpnAgnnRribK1PU4sBBQBkkqVX2nLJcNMaiagVx2d/132', '', '1', 1563354045, 1, NULL);
INSERT INTO `user` VALUES (15, 'ocsMa5ys0zc7akt5XWgjLzubR9X4', '小吕', '1', 'http://thirdwx.qlogo.cn/mmopen/ajNVdqHZLLBj5v3V6iavn2pcAy15LdSMusBfTHyE2oNiajAQQgdJAlKVbxO2b2MicHe0gurFFyoEHicibrmGLHATomA/132', '枣庄', '2', 1563354071, 1, NULL);
INSERT INTO `user` VALUES (16, 'ocsMa548z8cy7-NZ05IDd6kNt5gg', 'M', '1', 'http://thirdwx.qlogo.cn/mmopen/oLU121BePGmELGlUJ7x8Yw9pA8ajlD3vBtlH76niaTFq2RRknsaw5ibOf9Lx4kUicsiccFpzqHzmFLsSTpv8suJPKBSKoJyJ3X9Z/132', '昌平', '2', 1563442784, 1, NULL);

-- ----------------------------
-- Table structure for userInfo
-- ----------------------------
DROP TABLE IF EXISTS `userInfo`;
CREATE TABLE `userInfo`  (
  `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nickname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `openid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sex` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '1为男，2为女',
  `headimgurl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subscribe_time` int(11) DEFAULT NULL COMMENT '关注时间',
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of userInfo
-- ----------------------------
INSERT INTO `userInfo` VALUES (1, '小吕', 'ocsMa5ys0zc7akt5XWgjLzubR9X4', '1', 'http://thirdwx.qlogo.cn/mmopen/ajNVdqHZLLBj5v3V6iavn2pcAy15LdSMusBfTHyE2oNiajAQQgdJAlKVbxO2b2MicHe0gurFFyoEHicibrmGLHATomA/132', '中国', 1563354070);
INSERT INTO `userInfo` VALUES (2, 'DD', 'ocsMa5xuojFVms8Kh_4aQGp_ycf4', '1', 'http://thirdwx.qlogo.cn/mmopen/7TuqCUC7reOROC78dIGJ6MZWYoeI4tRS6dlq5NysoPh18EEHfOTDiapxWtZrc7ZVTbOuhbOaML01ma9UP87oq7BOFKibmZB3BV/132', '黑山', 1563353848);
INSERT INTO `userInfo` VALUES (3, '柚子君', 'ocsMa58vHb6HP_EvO1f7ZVHSJ-as', '2', 'http://thirdwx.qlogo.cn/mmopen/3lxXfP8aqwPOwJV5icj6P4n48jopRwTD0cU5qBGxribLNzrHAjDJ606UWVG8OQz6m5h0m9vIiaX41icyzZE9g7pdZPb3bA3dlJ3A/132', '白俄罗斯', 1563353831);
INSERT INTO `userInfo` VALUES (4, '空白\\', 'ocsMa57ROt2P4RkQbh1TbnspKsBs', '1', 'http://thirdwx.qlogo.cn/mmopen/3lxXfP8aqwPOwJV5icj6P4uN1MccbQ3JsNfg611pOTtuZbMKC2rfflmnpyn0iaxWibXSlf6SdpHsehSVPJfBYlicxANqD0QNTdHk/132', '中国', 1563353911);
INSERT INTO `userInfo` VALUES (5, '张英杰', 'ocsMa57NBaBHAQpQBcAst2zl1QS4', '1', 'http://thirdwx.qlogo.cn/mmopen/3lxXfP8aqwPOwJV5icj6P4ohln0vOekak3c7Q7LLghfJhbugT0Mc9T5m3JVpnAgnnRribK1PU4sBBQBkkqVX2nLJcNMaiagVx2d/132', '', 1563354045);
INSERT INTO `userInfo` VALUES (6, '阿尼', 'ocsMa58QUf89zO3CFd5m9P8Yihls', '1', 'http://thirdwx.qlogo.cn/mmopen/heNSJSe6iaibKWjjKvwd0gpIo1pdVPM2uEa0Nv280KFAofd90kmEn11uhee24YusO49jeP67Ih2zqgPeC7g62yq9p3icrpYnrB6/132', '中国', 1563353802);
INSERT INTO `userInfo` VALUES (7, '缓存```温柔', 'ocsMa5xHL7dvaamWPhpAFC--cyTs', '2', 'http://thirdwx.qlogo.cn/mmopen/7TuqCUC7rePMA5fjqMlicOTpvewjjrGwQZKjepqia1Wre4yCjuaibFqibZmYwSpTk1UC69ib4bBoM0DZSBq6bmh1ibPhlINlqTFWgr/132', '中国', 1563349454);
INSERT INTO `userInfo` VALUES (8, '', 'ocsMa53RfIe3E2MZ1ZGYkjlte3wI', '1', 'http://thirdwx.qlogo.cn/mmopen/Q3auHgzwzM5kdIkoSPPuiaKzhicRALCVPJibP60s3jkZBiag0ic50TjmwVzVws79LBnMDWibiasy4ssmko9sVCAmmnwApxM64nB0wXGhbRBxcgyeDg/132', '中非共和国', 1563353997);

-- ----------------------------
-- Table structure for weather
-- ----------------------------
DROP TABLE IF EXISTS `weather`;
CREATE TABLE `weather`  (
  `weather_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `weather` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  PRIMARY KEY (`weather_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of weather
-- ----------------------------
INSERT INTO `weather` VALUES (1, '北京', '{\"success\":\"1\",\"result\":[{\"weaid\":\"1\",\"days\":\"2019-08-31\",\"week\":\"星期六\",\"cityno\":\"beijing\",\"citynm\":\"北京\",\"cityid\":\"101010100\",\"temperature\":\"32℃/18℃\",\"humidity\":\"0%/0%\",\"weather\":\"晴\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/0.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/0.gif\",\"wind\":\"东南风转西南风\",\"winp\":\"小于3级\",\"temp_high\":\"32\",\"temp_low\":\"18\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"1\",\"weatid1\":\"1\",\"windid\":\"3\",\"winpid\":\"0\",\"weather_iconid\":\"0\",\"weather_iconid1\":\"0\"},{\"weaid\":\"1\",\"days\":\"2019-09-01\",\"week\":\"星期日\",\"cityno\":\"beijing\",\"citynm\":\"北京\",\"cityid\":\"101010100\",\"temperature\":\"33℃/19℃\",\"humidity\":\"0%/0%\",\"weather\":\"多云转晴\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/1.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/0.gif\",\"wind\":\"西南风\",\"winp\":\"3-4级转3-4级\",\"temp_high\":\"33\",\"temp_low\":\"19\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"2\",\"weatid1\":\"1\",\"windid\":\"5\",\"winpid\":\"1\",\"weather_iconid\":\"1\",\"weather_iconid1\":\"0\"},{\"weaid\":\"1\",\"days\":\"2019-09-02\",\"week\":\"星期一\",\"cityno\":\"beijing\",\"citynm\":\"北京\",\"cityid\":\"101010100\",\"temperature\":\"33℃/20℃\",\"humidity\":\"0%/0%\",\"weather\":\"晴\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/0.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/0.gif\",\"wind\":\"西南风\",\"winp\":\"小于3级\",\"temp_high\":\"33\",\"temp_low\":\"20\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"1\",\"weatid1\":\"1\",\"windid\":\"5\",\"winpid\":\"0\",\"weather_iconid\":\"0\",\"weather_iconid1\":\"0\"},{\"weaid\":\"1\",\"days\":\"2019-09-03\",\"week\":\"星期二\",\"cityno\":\"beijing\",\"citynm\":\"北京\",\"cityid\":\"101010100\",\"temperature\":\"34℃/20℃\",\"humidity\":\"0%/0%\",\"weather\":\"晴\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/0.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/0.gif\",\"wind\":\"西南风转北风\",\"winp\":\"小于3级\",\"temp_high\":\"34\",\"temp_low\":\"20\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"1\",\"weatid1\":\"1\",\"windid\":\"5\",\"winpid\":\"0\",\"weather_iconid\":\"0\",\"weather_iconid1\":\"0\"},{\"weaid\":\"1\",\"days\":\"2019-09-04\",\"week\":\"星期三\",\"cityno\":\"beijing\",\"citynm\":\"北京\",\"cityid\":\"101010100\",\"temperature\":\"33℃/20℃\",\"humidity\":\"0%/0%\",\"weather\":\"晴转多云\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/0.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/1.gif\",\"wind\":\"东南风\",\"winp\":\"小于3级\",\"temp_high\":\"33\",\"temp_low\":\"20\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"1\",\"weatid1\":\"2\",\"windid\":\"3\",\"winpid\":\"0\",\"weather_iconid\":\"0\",\"weather_iconid1\":\"1\"},{\"weaid\":\"1\",\"days\":\"2019-09-05\",\"week\":\"星期四\",\"cityno\":\"beijing\",\"citynm\":\"北京\",\"cityid\":\"101010100\",\"temperature\":\"34℃/21℃\",\"humidity\":\"0%/0%\",\"weather\":\"多云\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/1.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/1.gif\",\"wind\":\"西南风\",\"winp\":\"小于3级\",\"temp_high\":\"34\",\"temp_low\":\"21\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"2\",\"weatid1\":\"2\",\"windid\":\"5\",\"winpid\":\"0\",\"weather_iconid\":\"1\",\"weather_iconid1\":\"1\"}]}');
INSERT INTO `weather` VALUES (2, '广州', '{\"success\":\"1\",\"result\":[{\"weaid\":\"165\",\"days\":\"2019-08-31\",\"week\":\"星期六\",\"cityno\":\"guangzhou\",\"citynm\":\"广州\",\"cityid\":\"101280101\",\"temperature\":\"32℃/26℃\",\"humidity\":\"0%/0%\",\"weather\":\"大雨\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/9.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/9.gif\",\"wind\":\"无持续风向\",\"winp\":\"小于3级\",\"temp_high\":\"32\",\"temp_low\":\"26\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"10\",\"weatid1\":\"10\",\"windid\":\"0\",\"winpid\":\"0\",\"weather_iconid\":\"9\",\"weather_iconid1\":\"9\"},{\"weaid\":\"165\",\"days\":\"2019-09-01\",\"week\":\"星期日\",\"cityno\":\"guangzhou\",\"citynm\":\"广州\",\"cityid\":\"101280101\",\"temperature\":\"31℃/26℃\",\"humidity\":\"0%/0%\",\"weather\":\"大雨转中雨\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/9.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/8.gif\",\"wind\":\"无持续风向\",\"winp\":\"小于3级\",\"temp_high\":\"31\",\"temp_low\":\"26\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"10\",\"weatid1\":\"9\",\"windid\":\"0\",\"winpid\":\"0\",\"weather_iconid\":\"9\",\"weather_iconid1\":\"8\"},{\"weaid\":\"165\",\"days\":\"2019-09-02\",\"week\":\"星期一\",\"cityno\":\"guangzhou\",\"citynm\":\"广州\",\"cityid\":\"101280101\",\"temperature\":\"31℃/25℃\",\"humidity\":\"0%/0%\",\"weather\":\"中雨\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/8.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/8.gif\",\"wind\":\"无持续风向转东北风\",\"winp\":\"小于3级转小于3级\",\"temp_high\":\"31\",\"temp_low\":\"25\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"9\",\"weatid1\":\"9\",\"windid\":\"0\",\"winpid\":\"0\",\"weather_iconid\":\"8\",\"weather_iconid1\":\"8\"},{\"weaid\":\"165\",\"days\":\"2019-09-03\",\"week\":\"星期二\",\"cityno\":\"guangzhou\",\"citynm\":\"广州\",\"cityid\":\"101280101\",\"temperature\":\"31℃/25℃\",\"humidity\":\"0%/0%\",\"weather\":\"中雨\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/8.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/8.gif\",\"wind\":\"东北风\",\"winp\":\"3-4级\",\"temp_high\":\"31\",\"temp_low\":\"25\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"9\",\"weatid1\":\"9\",\"windid\":\"1\",\"winpid\":\"1\",\"weather_iconid\":\"8\",\"weather_iconid1\":\"8\"},{\"weaid\":\"165\",\"days\":\"2019-09-04\",\"week\":\"星期三\",\"cityno\":\"guangzhou\",\"citynm\":\"广州\",\"cityid\":\"101280101\",\"temperature\":\"30℃/25℃\",\"humidity\":\"0%/0%\",\"weather\":\"大雨转大到暴雨\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/9.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/23.gif\",\"wind\":\"东风\",\"winp\":\"3-4级转3-4级\",\"temp_high\":\"30\",\"temp_low\":\"25\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"10\",\"weatid1\":\"24\",\"windid\":\"2\",\"winpid\":\"1\",\"weather_iconid\":\"9\",\"weather_iconid1\":\"23\"},{\"weaid\":\"165\",\"days\":\"2019-09-05\",\"week\":\"星期四\",\"cityno\":\"guangzhou\",\"citynm\":\"广州\",\"cityid\":\"101280101\",\"temperature\":\"30℃/25℃\",\"humidity\":\"0%/0%\",\"weather\":\"大到暴雨转大雨\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/23.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/9.gif\",\"wind\":\"东风转东南风\",\"winp\":\"3-4级\",\"temp_high\":\"30\",\"temp_low\":\"25\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"24\",\"weatid1\":\"10\",\"windid\":\"2\",\"winpid\":\"1\",\"weather_iconid\":\"23\",\"weather_iconid1\":\"9\"}]}');
INSERT INTO `weather` VALUES (3, '天津', '{\"success\":\"1\",\"result\":[{\"weaid\":\"23\",\"days\":\"2019-08-31\",\"week\":\"星期六\",\"cityno\":\"tianjin\",\"citynm\":\"天津\",\"cityid\":\"101030100\",\"temperature\":\"32℃/21℃\",\"humidity\":\"0%/0%\",\"weather\":\"晴\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/0.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/0.gif\",\"wind\":\"西南风\",\"winp\":\"小于3级\",\"temp_high\":\"32\",\"temp_low\":\"21\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"1\",\"weatid1\":\"1\",\"windid\":\"5\",\"winpid\":\"0\",\"weather_iconid\":\"0\",\"weather_iconid1\":\"0\"},{\"weaid\":\"23\",\"days\":\"2019-09-01\",\"week\":\"星期日\",\"cityno\":\"tianjin\",\"citynm\":\"天津\",\"cityid\":\"101030100\",\"temperature\":\"32℃/22℃\",\"humidity\":\"0%/0%\",\"weather\":\"多云\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/1.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/1.gif\",\"wind\":\"南风转西南风\",\"winp\":\"小于3级\",\"temp_high\":\"32\",\"temp_low\":\"22\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"2\",\"weatid1\":\"2\",\"windid\":\"4\",\"winpid\":\"0\",\"weather_iconid\":\"1\",\"weather_iconid1\":\"1\"},{\"weaid\":\"23\",\"days\":\"2019-09-02\",\"week\":\"星期一\",\"cityno\":\"tianjin\",\"citynm\":\"天津\",\"cityid\":\"101030100\",\"temperature\":\"33℃/22℃\",\"humidity\":\"0%/0%\",\"weather\":\"晴\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/0.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/0.gif\",\"wind\":\"西南风\",\"winp\":\"小于3级\",\"temp_high\":\"33\",\"temp_low\":\"22\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"1\",\"weatid1\":\"1\",\"windid\":\"5\",\"winpid\":\"0\",\"weather_iconid\":\"0\",\"weather_iconid1\":\"0\"},{\"weaid\":\"23\",\"days\":\"2019-09-03\",\"week\":\"星期二\",\"cityno\":\"tianjin\",\"citynm\":\"天津\",\"cityid\":\"101030100\",\"temperature\":\"34℃/23℃\",\"humidity\":\"0%/0%\",\"weather\":\"晴\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/0.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/0.gif\",\"wind\":\"西南风转南风\",\"winp\":\"小于3级\",\"temp_high\":\"34\",\"temp_low\":\"23\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"1\",\"weatid1\":\"1\",\"windid\":\"5\",\"winpid\":\"0\",\"weather_iconid\":\"0\",\"weather_iconid1\":\"0\"},{\"weaid\":\"23\",\"days\":\"2019-09-04\",\"week\":\"星期三\",\"cityno\":\"tianjin\",\"citynm\":\"天津\",\"cityid\":\"101030100\",\"temperature\":\"32℃/22℃\",\"humidity\":\"0%/0%\",\"weather\":\"晴\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/0.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/0.gif\",\"wind\":\"东南风\",\"winp\":\"3-4级转3-4级\",\"temp_high\":\"32\",\"temp_low\":\"22\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"1\",\"weatid1\":\"1\",\"windid\":\"3\",\"winpid\":\"1\",\"weather_iconid\":\"0\",\"weather_iconid1\":\"0\"},{\"weaid\":\"23\",\"days\":\"2019-09-05\",\"week\":\"星期四\",\"cityno\":\"tianjin\",\"citynm\":\"天津\",\"cityid\":\"101030100\",\"temperature\":\"32℃/22℃\",\"humidity\":\"0%/0%\",\"weather\":\"晴转多云\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/0.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/1.gif\",\"wind\":\"西南风\",\"winp\":\"小于3级\",\"temp_high\":\"32\",\"temp_low\":\"22\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"1\",\"weatid1\":\"2\",\"windid\":\"5\",\"winpid\":\"0\",\"weather_iconid\":\"0\",\"weather_iconid1\":\"1\"}]}');
INSERT INTO `weather` VALUES (4, '深圳', '{\"success\":\"1\",\"result\":[{\"weaid\":\"169\",\"days\":\"2019-08-31\",\"week\":\"星期六\",\"cityno\":\"shenzhen\",\"citynm\":\"深圳\",\"cityid\":\"101280601\",\"temperature\":\"30℃/26℃\",\"humidity\":\"0%/0%\",\"weather\":\"大雨\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/9.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/9.gif\",\"wind\":\"无持续风向转西南风\",\"winp\":\"小于3级转小于3级\",\"temp_high\":\"30\",\"temp_low\":\"26\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"10\",\"weatid1\":\"10\",\"windid\":\"0\",\"winpid\":\"0\",\"weather_iconid\":\"9\",\"weather_iconid1\":\"9\"},{\"weaid\":\"169\",\"days\":\"2019-09-01\",\"week\":\"星期日\",\"cityno\":\"shenzhen\",\"citynm\":\"深圳\",\"cityid\":\"101280601\",\"temperature\":\"30℃/26℃\",\"humidity\":\"0%/0%\",\"weather\":\"大雨转阵雨\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/9.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/3.gif\",\"wind\":\"西南风转无持续风向\",\"winp\":\"3-4级转3-4级\",\"temp_high\":\"30\",\"temp_low\":\"26\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"10\",\"weatid1\":\"4\",\"windid\":\"5\",\"winpid\":\"1\",\"weather_iconid\":\"9\",\"weather_iconid1\":\"3\"},{\"weaid\":\"169\",\"days\":\"2019-09-02\",\"week\":\"星期一\",\"cityno\":\"shenzhen\",\"citynm\":\"深圳\",\"cityid\":\"101280601\",\"temperature\":\"31℃/27℃\",\"humidity\":\"0%/0%\",\"weather\":\"阵雨\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/3.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/3.gif\",\"wind\":\"无持续风向\",\"winp\":\"小于3级\",\"temp_high\":\"31\",\"temp_low\":\"27\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"4\",\"weatid1\":\"4\",\"windid\":\"0\",\"winpid\":\"0\",\"weather_iconid\":\"3\",\"weather_iconid1\":\"3\"},{\"weaid\":\"169\",\"days\":\"2019-09-03\",\"week\":\"星期二\",\"cityno\":\"shenzhen\",\"citynm\":\"深圳\",\"cityid\":\"101280601\",\"temperature\":\"31℃/25℃\",\"humidity\":\"0%/0%\",\"weather\":\"阵雨\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/3.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/3.gif\",\"wind\":\"无持续风向转东北风\",\"winp\":\"小于3级转小于3级\",\"temp_high\":\"31\",\"temp_low\":\"25\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"4\",\"weatid1\":\"4\",\"windid\":\"0\",\"winpid\":\"0\",\"weather_iconid\":\"3\",\"weather_iconid1\":\"3\"},{\"weaid\":\"169\",\"days\":\"2019-09-04\",\"week\":\"星期三\",\"cityno\":\"shenzhen\",\"citynm\":\"深圳\",\"cityid\":\"101280601\",\"temperature\":\"29℃/25℃\",\"humidity\":\"0%/0%\",\"weather\":\"阵雨\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/3.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/3.gif\",\"wind\":\"东北风\",\"winp\":\"3-4级\",\"temp_high\":\"29\",\"temp_low\":\"25\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"4\",\"weatid1\":\"4\",\"windid\":\"1\",\"winpid\":\"1\",\"weather_iconid\":\"3\",\"weather_iconid1\":\"3\"},{\"weaid\":\"169\",\"days\":\"2019-09-05\",\"week\":\"星期四\",\"cityno\":\"shenzhen\",\"citynm\":\"深圳\",\"cityid\":\"101280601\",\"temperature\":\"29℃/26℃\",\"humidity\":\"0%/0%\",\"weather\":\"阵雨\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/3.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/3.gif\",\"wind\":\"东北风\",\"winp\":\"3-4级\",\"temp_high\":\"29\",\"temp_low\":\"26\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"4\",\"weatid1\":\"4\",\"windid\":\"1\",\"winpid\":\"1\",\"weather_iconid\":\"3\",\"weather_iconid1\":\"3\"}]}');
INSERT INTO `weather` VALUES (5, '上海', '{\"success\":\"1\",\"result\":[{\"weaid\":\"36\",\"days\":\"2019-08-31\",\"week\":\"星期六\",\"cityno\":\"shanghai\",\"citynm\":\"上海\",\"cityid\":\"101020100\",\"temperature\":\"30℃/21℃\",\"humidity\":\"0%/0%\",\"weather\":\"小雨\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/7.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/7.gif\",\"wind\":\"东风转东北风\",\"winp\":\"小于3级\",\"temp_high\":\"30\",\"temp_low\":\"21\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"8\",\"weatid1\":\"8\",\"windid\":\"2\",\"winpid\":\"0\",\"weather_iconid\":\"7\",\"weather_iconid1\":\"7\"},{\"weaid\":\"36\",\"days\":\"2019-09-01\",\"week\":\"星期日\",\"cityno\":\"shanghai\",\"citynm\":\"上海\",\"cityid\":\"101020100\",\"temperature\":\"23℃/21℃\",\"humidity\":\"0%/0%\",\"weather\":\"大雨\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/9.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/9.gif\",\"wind\":\"东北风\",\"winp\":\"小于3级转小于3级\",\"temp_high\":\"23\",\"temp_low\":\"21\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"10\",\"weatid1\":\"10\",\"windid\":\"1\",\"winpid\":\"0\",\"weather_iconid\":\"9\",\"weather_iconid1\":\"9\"},{\"weaid\":\"36\",\"days\":\"2019-09-02\",\"week\":\"星期一\",\"cityno\":\"shanghai\",\"citynm\":\"上海\",\"cityid\":\"101020100\",\"temperature\":\"25℃/23℃\",\"humidity\":\"0%/0%\",\"weather\":\"中雨转大雨\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/8.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/9.gif\",\"wind\":\"东北风转西北风\",\"winp\":\"4-5级转4-5级\",\"temp_high\":\"25\",\"temp_low\":\"23\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"9\",\"weatid1\":\"10\",\"windid\":\"1\",\"winpid\":\"2\",\"weather_iconid\":\"8\",\"weather_iconid1\":\"9\"},{\"weaid\":\"36\",\"days\":\"2019-09-03\",\"week\":\"星期二\",\"cityno\":\"shanghai\",\"citynm\":\"上海\",\"cityid\":\"101020100\",\"temperature\":\"26℃/23℃\",\"humidity\":\"0%/0%\",\"weather\":\"小雨转中雨\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/7.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/8.gif\",\"wind\":\"西北风转南风\",\"winp\":\"小于3级\",\"temp_high\":\"26\",\"temp_low\":\"23\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"8\",\"weatid1\":\"9\",\"windid\":\"7\",\"winpid\":\"0\",\"weather_iconid\":\"7\",\"weather_iconid1\":\"8\"},{\"weaid\":\"36\",\"days\":\"2019-09-04\",\"week\":\"星期三\",\"cityno\":\"shanghai\",\"citynm\":\"上海\",\"cityid\":\"101020100\",\"temperature\":\"28℃/24℃\",\"humidity\":\"0%/0%\",\"weather\":\"小雨\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/7.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/7.gif\",\"wind\":\"南风转东南风\",\"winp\":\"小于3级\",\"temp_high\":\"28\",\"temp_low\":\"24\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"8\",\"weatid1\":\"8\",\"windid\":\"4\",\"winpid\":\"0\",\"weather_iconid\":\"7\",\"weather_iconid1\":\"7\"},{\"weaid\":\"36\",\"days\":\"2019-09-05\",\"week\":\"星期四\",\"cityno\":\"shanghai\",\"citynm\":\"上海\",\"cityid\":\"101020100\",\"temperature\":\"28℃/24℃\",\"humidity\":\"0%/0%\",\"weather\":\"小雨转多云\",\"weather_icon\":\"http://api.k780.com/upload/weather/d/7.gif\",\"weather_icon1\":\"http://api.k780.com/upload/weather/n/1.gif\",\"wind\":\"西风\",\"winp\":\"小于3级\",\"temp_high\":\"28\",\"temp_low\":\"24\",\"humi_high\":\"0\",\"humi_low\":\"0\",\"weatid\":\"8\",\"weatid1\":\"2\",\"windid\":\"6\",\"winpid\":\"0\",\"weather_iconid\":\"7\",\"weather_iconid1\":\"1\"}]}');

-- ----------------------------
-- Table structure for wish
-- ----------------------------
DROP TABLE IF EXISTS `wish`;
CREATE TABLE `wish`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `openid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nickname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `headimgurl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `wish_content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of wish
-- ----------------------------
INSERT INTO `wish` VALUES (6, 'ocsMa5xHL7dvaamWPhpAFC--cyTs', '缓存```温柔', 'http://thirdwx.qlogo.cn/mmopen/7TuqCUC7rePMA5fjqMlicOTpvewjjrGwQZKjepqia1Wre4yCjuaibFqibZmYwSpTk1UC69ib4bBoM0DZSBq6bmh1ibPhlINlqTFWgr/132', '赶快回家');

SET FOREIGN_KEY_CHECKS = 1;
