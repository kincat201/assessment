CREATE TABLE `kampusyuk`.`partnership`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `university` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `createdAt` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updatedAt` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `deletedAt` timestamp NULL DEFAULT NULL,
  `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

INSERT INTO `kampusyuk`.`adminAcl` (`adminId`, `name`) VALUES ('1', 'PARTNERSHIP_LIST');
INSERT INTO `kampusyuk`.`adminAcl` (`adminId`, `name`) VALUES ('1', 'PARTNERSHIP_DETAILS');
INSERT INTO `kampusyuk`.`adminAcl` (`adminId`, `name`) VALUES ('1', 'PARTNERSHIP_DELETE');

