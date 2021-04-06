/*
 Navicat Premium Data Transfer

 Source Server         : medcon server
 Source Server Type    : MySQL
 Source Server Version : 100138
 Source Host           : 192.168.161.100:3306
 Source Schema         : webinarsegmi

 Target Server Type    : MySQL
 Target Server Version : 100138
 File Encoding         : 65001

 Date: 06/04/2021 10:36:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for instansi
-- ----------------------------
DROP TABLE IF EXISTS `instansi`;
CREATE TABLE `instansi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instansi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of instansi
-- ----------------------------
INSERT INTO `instansi` VALUES (1, 'Instalatur', '2021-04-05 12:06:08', '2021-04-05 12:06:08');
INSERT INTO `instansi` VALUES (2, 'Rumah Sakit', '2021-04-05 12:06:13', '2021-04-05 12:06:13');
INSERT INTO `instansi` VALUES (3, 'Mahasiswa', '2021-04-05 12:06:18', '2021-04-05 12:06:18');

-- ----------------------------
-- Table structure for perusahaan
-- ----------------------------
DROP TABLE IF EXISTS `perusahaan`;
CREATE TABLE `perusahaan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `tlpn` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `hp` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ig` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `fb` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `tw` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of perusahaan
-- ----------------------------
INSERT INTO `perusahaan` VALUES (1, 'Sinarmed Group', 'Jl. Taman Borobudur Indah Blok B No.15C Malang, Jawa Timur 65142', 'info@sinarmed.com', '0341 - 492294', '08113387052', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for segmen
-- ----------------------------
DROP TABLE IF EXISTS `segmen`;
CREATE TABLE `segmen`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `segmen` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `jadwal` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `link_zoom` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of segmen
-- ----------------------------
INSERT INTO `segmen` VALUES (1, 'Segmi', '606aaad6e8453.jpg', '&lt;ul&gt;&lt;li&gt;Zoom Meeting : &lt;/li&gt;&lt;li&gt;Meeting ID:&amp;nbsp;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;Passcode:&amp;nbsp;&lt;/p&gt;', '1', '2021-04-05 13:14:47', '2021-04-06 08:35:09');

-- ----------------------------
-- Table structure for sertifikat
-- ----------------------------
DROP TABLE IF EXISTS `sertifikat`;
CREATE TABLE `sertifikat`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `segmend_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sertifikat
-- ----------------------------
INSERT INTO `sertifikat` VALUES (1, '2', '1', '606acc88aa612.jpg', '2021-04-05 15:38:33', '2021-04-05 15:38:33');
INSERT INTO `sertifikat` VALUES (2, '3', '1', '', '2021-04-06 09:15:01', '2021-04-06 09:15:01');

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES (1, 'aktif', '2021-04-05 13:36:26', '2021-04-05 13:36:26');
INSERT INTO `status` VALUES (2, 'tidak aktif', '2021-04-05 13:36:39', '2021-04-05 13:36:39');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `instansi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `nohp` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `status` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '1',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'Sinarmed', 'sinarmed', NULL, 'info@sinarmed.com', '08113387052', '4f208e87dbf1f6ded475ec7a7c8dea87', '2021-04-05 11:18:42', '2021-04-05 11:24:31', '0');
INSERT INTO `user` VALUES (2, 'Gugus Darmayanto', 'Instalatur', 'IT Programmer', 'ggsd09031997@gmail.com', '08113387052', '550e1bafe077ff0b0b67f4e32f29d751', '2021-04-05 14:48:29', '2021-04-05 14:48:29', '1');
INSERT INTO `user` VALUES (3, 'Sandi Yuda Asmara', 'Karyawan', 'IT', 'sandissa.48@gmail.com', '081131105050', '14e1b600b1fd579f47433b88e8d85291', '2021-04-05 16:05:58', '2021-04-05 16:05:58', '1');
INSERT INTO `user` VALUES (4, 'fitria', 'Mahasiswa', 'teknik', 'fitri@sinarmed.com', '08113387052', '710ae8f9438fc2d7c621153bdfc9e7e5', '2021-04-06 09:28:57', '2021-04-06 09:28:57', '1');
INSERT INTO `user` VALUES (5, 'KARIEF SETIAWAN, S.Tr.Kes', 'Rumah Sakit', 'Teknisi Elektromedis', 'karief.ks@gmail.com', '081358494500', 'c2f1366c51911b52369fe27df307ff84', '2021-04-06 09:45:53', '2021-04-06 09:45:53', '1');
INSERT INTO `user` VALUES (6, 'sugino', 'Rumah Sakit', 'teknisi Gas Medis RSUP dr. Soeradji Tirtonegoro Klaten', 'ginuxginola@gmail.com', '085642044354', '020aeeaec054c58d193e3e64e076cd39', '2021-04-06 09:58:38', '2021-04-06 09:58:38', '1');
INSERT INTO `user` VALUES (7, 'Hery Tommi', 'Rumah Sakit', 'Teknisi Elektromedis', 'herytommi159@gmail.com', '087738253326', 'a8706e684a7d25687a3e3e1821c5df0c', '2021-04-06 10:02:54', '2021-04-06 10:02:54', '1');

SET FOREIGN_KEY_CHECKS = 1;
