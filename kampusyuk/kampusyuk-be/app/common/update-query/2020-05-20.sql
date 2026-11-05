ALTER TABLE `admission`
	ADD COLUMN `userId` BIGINT(10) NULL DEFAULT '0' AFTER `scholarshipId`,
	ADD INDEX `userId` (`userId`);

INSERT INTO userAcl (`userId`,`name`)
SELECT id,'ADMISSION_SUBMISSION' FROM user WHERE role = 'STUDENT';

INSERT INTO `kampusyuk`.`userAcl` (`userId`, `name`) VALUES ('1', 'USER_UPDATE');

CREATE TABLE `kampusyuk`.`admin` (
	`id` BIGINT(10) NOT NULL AUTO_INCREMENT,
	`email` VARCHAR(100) NOT NULL COLLATE 'utf8_unicode_ci',
	`name` VARCHAR(100) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	`phone` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	`password` VARCHAR(80) NOT NULL COLLATE 'utf8_unicode_ci',
	`role` VARCHAR(20) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	`verificationToken` VARCHAR(255) NULL DEFAULT NULL,
	`verificationAt` DATETIME NULL DEFAULT NULL,
	`resetToken` VARCHAR(255) NULL DEFAULT NULL,
	`lastResetAt` DATETIME NULL DEFAULT NULL,
	`lastLogin` DATETIME NULL DEFAULT NULL,
	`status` VARCHAR(20) NULL DEFAULT 'ACTIVE' COLLATE 'utf8_unicode_ci',
	`createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`createdBy` VARCHAR(50) NULL DEFAULT '0' COLLATE 'utf8_unicode_ci',
	`updatedAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updatedBy` VARCHAR(50) NULL DEFAULT '0' COLLATE 'utf8_unicode_ci',
	`deletedAt` TIMESTAMP NULL DEFAULT NULL,
	`deletedBy` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	`socialiteId` VARCHAR(255) NULL DEFAULT NULL,
	`socialiteType` VARCHAR(20) NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
 COLLATE 'utf8mb4_general_ci' ENGINE=InnoDB ROW_FORMAT=Compact AUTO_INCREMENT=60;
INSERT INTO `kampusyuk`.`admin` (`id`, `email`, `name`, `phone`, `password`, `role`, `verificationToken`, `verificationAt`, `resetToken`, `lastResetAt`, `lastLogin`, `status`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `deletedAt`, `deletedBy`, `socialiteId`, `socialiteType`)
SELECT `id`, `email`, `name`, `phone`, `password`, `role`, `verificationToken`, `verificationAt`, `resetToken`, `lastResetAt`, `lastLogin`, `status`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `deletedAt`, `deletedBy`, `socialiteId`, `socialiteType` FROM `user` WHERE `user`.`role` = 'ADMIN';

CREATE TABLE `kampusyuk`.`adminAcl` (
	`id` BIGINT(10) NOT NULL AUTO_INCREMENT,
	`adminId` BIGINT(10) NOT NULL,
	`name` VARCHAR(100) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	`createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`createdBy` VARCHAR(50) NULL DEFAULT '0' COLLATE 'utf8_unicode_ci',
	`updatedAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updatedBy` VARCHAR(50) NULL DEFAULT '0' COLLATE 'utf8_unicode_ci',
	`deletedAt` TIMESTAMP NULL DEFAULT NULL,
	`deletedBy` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	PRIMARY KEY (`id`)
)
 COLLATE 'utf8mb4_general_ci' ENGINE=InnoDB ROW_FORMAT=Compact AUTO_INCREMENT=306;
INSERT INTO `kampusyuk`.`adminAcl` (`id`, `userId`, `name`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `deletedAt`, `deletedBy`)
SELECT `id`, `userId`, `name`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `deletedAt`, `deletedBy` FROM `userAcl` where `userId` = 1;

ALTER TABLE `admin`
	DROP COLUMN `verificationToken`,
	DROP COLUMN `verificationAt`,
	DROP COLUMN `lastResetAt`,
	DROP COLUMN `socialiteId`,
	DROP COLUMN `socialiteType`;

INSERT INTO `kampusyuk`.`adminAcl` (`adminId`, `name`) VALUES ('1', 'ADMIN_LIST');
INSERT INTO `kampusyuk`.`adminAcl` (`adminId`, `name`) VALUES ('1', 'ADMIN_DETAILS');
INSERT INTO `kampusyuk`.`adminAcl` (`adminId`, `name`) VALUES ('1', 'ADMIN_UPDATE');
INSERT INTO `kampusyuk`.`adminAcl` (`adminId`, `name`) VALUES ('1', 'ADMIN_DELETE');
INSERT INTO `kampusyuk`.`adminAcl` (`adminId`, `name`) VALUES ('1', 'ADMIN_CREATE');


