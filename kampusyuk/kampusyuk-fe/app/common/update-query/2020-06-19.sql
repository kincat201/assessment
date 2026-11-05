SET FOREIGN_KEY_CHECKS=0;

ALTER TABLE `kampusyuk`.`transaction` ADD COLUMN `totalPrice` decimal(10, 2) NULL DEFAULT NULL AFTER `assessmentId`;
ALTER TABLE `kampusyuk`.`transaction` ADD COLUMN `bankProduct` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL AFTER `totalPrice`;
ALTER TABLE `kampusyuk`.`transaction` ADD COLUMN `vaNumber` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL AFTER `bankProduct`;
ALTER TABLE `kampusyuk`.`transaction` ADD COLUMN `paymentRef` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL AFTER `paymentDate`;
ALTER TABLE `kampusyuk`.`transaction` ADD COLUMN `expiredAt` datetime(0) NULL DEFAULT NULL AFTER `status`;
ALTER TABLE `kampusyuk`.`transaction` ADD COLUMN `txStatus` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL AFTER `expiredAt`;
ALTER TABLE `kampusyuk`.`transaction` ADD COLUMN `txReason` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL AFTER `txStatus`;

SET FOREIGN_KEY_CHECKS=1;