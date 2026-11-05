CREATE TABLE `kampusyuk`.`transaction`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userId` bigint(20) NULL DEFAULT NULL,
  `admissionId` bigint(20) NULL DEFAULT NULL,
  `assessmentId` bigint(20) NULL DEFAULT NULL,
  `paymentAmount` decimal(10, 2) NULL DEFAULT NULL,
  `paymentDate` datetime(0) NULL DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `createdAt` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `createdBy` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '0',
  `updatedAt` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updatedBy` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;