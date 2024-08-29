SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(230) DEFAULT NULL,
  `class` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` (`id`, `name`, `class`) VALUES (1, 'Pendiente', 'bg-danger');
INSERT INTO `status` (`id`, `name`, `class`) VALUES (2, 'En progreso', 'bg-warning');
INSERT INTO `status` (`id`, `name`, `class`) VALUES (3, 'Completada', 'bg-success');

-- ----------------------------
-- Table structure for tasks
-- ----------------------------
CREATE TABLE `tasks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text,
  `task` blob,
  `statusid` int DEFAULT NULL,
  `create` datetime DEFAULT NULL,
  `userid` int DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- --------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

SET FOREIGN_KEY_CHECKS = 1;
