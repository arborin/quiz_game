/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : quiz_app

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 09/07/2022 00:21:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2022_07_07_164205_create_questions_table', 1);
INSERT INTO `migrations` VALUES (6, '2022_07_07_164401_create_user_statistics_table', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for questions
-- ----------------------------
DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `quote` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of questions
-- ----------------------------
INSERT INTO `questions` VALUES (21, 'Quote 1', '1', '2022-07-08 19:31:17', '2022-07-08 19:31:17');
INSERT INTO `questions` VALUES (22, 'Quote 2', '2', '2022-07-08 19:31:22', '2022-07-08 19:31:22');
INSERT INTO `questions` VALUES (23, 'Quote 3', '3', '2022-07-08 19:31:31', '2022-07-08 19:31:31');
INSERT INTO `questions` VALUES (24, 'Quote 4', '4', '2022-07-08 19:31:37', '2022-07-08 19:31:37');
INSERT INTO `questions` VALUES (25, 'Quote 5', '5', '2022-07-08 19:31:43', '2022-07-08 19:31:43');
INSERT INTO `questions` VALUES (26, 'Quote 6', '6', '2022-07-08 19:31:55', '2022-07-08 19:31:55');
INSERT INTO `questions` VALUES (27, 'Quote 7', '7', '2022-07-08 19:32:04', '2022-07-08 19:32:04');
INSERT INTO `questions` VALUES (28, 'Quote 8', '8', '2022-07-08 19:32:11', '2022-07-08 19:32:11');
INSERT INTO `questions` VALUES (29, 'Quote 9', '9', '2022-07-08 19:32:16', '2022-07-08 19:32:16');
INSERT INTO `questions` VALUES (30, 'Quote 10', '10', '2022-07-08 19:32:22', '2022-07-08 19:32:22');
INSERT INTO `questions` VALUES (31, 'Quote 11', '11', '2022-07-08 19:32:38', '2022-07-08 19:32:38');
INSERT INTO `questions` VALUES (32, 'Quote 12', '12', '2022-07-08 19:32:44', '2022-07-08 19:32:44');
INSERT INTO `questions` VALUES (33, 'Quote 13', '13', '2022-07-08 19:32:51', '2022-07-08 19:32:51');
INSERT INTO `questions` VALUES (34, 'Quote 14', '14', '2022-07-08 19:32:59', '2022-07-08 19:32:59');
INSERT INTO `questions` VALUES (35, 'Quote 15', '15', '2022-07-08 19:33:07', '2022-07-08 19:33:07');
INSERT INTO `questions` VALUES (36, 'Quote 16', '16', '2022-07-08 19:33:15', '2022-07-08 19:33:15');
INSERT INTO `questions` VALUES (37, 'Quote 17', '17', '2022-07-08 19:33:23', '2022-07-08 19:33:23');
INSERT INTO `questions` VALUES (38, 'Quote 18', '18', '2022-07-08 19:33:32', '2022-07-08 19:33:32');
INSERT INTO `questions` VALUES (39, 'Quote 19', '19', '2022-07-08 19:33:38', '2022-07-08 19:33:38');
INSERT INTO `questions` VALUES (40, 'Quote 20', '20', '2022-07-08 19:33:44', '2022-07-08 19:33:44');
INSERT INTO `questions` VALUES (41, 'Quote 21', '21', '2022-07-08 19:33:50', '2022-07-08 19:33:50');

-- ----------------------------
-- Table structure for user_statistics
-- ----------------------------
DROP TABLE IF EXISTS `user_statistics`;
CREATE TABLE `user_statistics`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answered_question_count` int NOT NULL,
  `correct_question_count` int NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_statistics
-- ----------------------------
INSERT INTO `user_statistics` VALUES (1, '9HBM08ABHXONFER', 10, 10, '2022-07-08 19:33:59', '2022-07-08 19:34:34');
INSERT INTO `user_statistics` VALUES (2, '5GFZGV5CDVCX4WT', 5, 2, '2022-07-08 19:43:13', '2022-07-08 19:44:11');
INSERT INTO `user_statistics` VALUES (3, 'DGVB5KD7NNJGYL7', 10, 6, '2022-07-08 19:46:14', '2022-07-08 19:46:30');
INSERT INTO `user_statistics` VALUES (4, '3YOV3U5BF3DWLXU', 10, 10, '2022-07-08 19:47:04', '2022-07-08 19:47:25');
INSERT INTO `user_statistics` VALUES (5, '9QN95Y2JVMTJOQ5', 7, 5, '2022-07-08 19:49:30', '2022-07-08 19:49:53');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
