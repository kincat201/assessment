CREATE TABLE IF NOT EXISTS `assessment` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `userId` BIGINT(10) COLLATE utf8_unicode_ci DEFAULT NULL,
    `schoolClass` VARCHAR(20) COLLATE utf8_unicode_ci DEFAULT NULL,
    `field` VARCHAR(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    `hopes` VARCHAR(250) COLLATE utf8_unicode_ci DEFAULT NULL,
    `photo` VARCHAR(250) COLLATE utf8_unicode_ci DEFAULT NULL,
    `status` VARCHAR(20) COLLATE utf8_unicode_ci DEFAULT NULL,
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `assessmentAnswer` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `assessmentId` BIGINT(10) COLLATE utf8_unicode_ci DEFAULT NULL,
    `question` VARCHAR(20) COLLATE utf8_unicode_ci DEFAULT NULL,
    `answer` INT(2) COLLATE utf8_unicode_ci DEFAULT NULL,
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

ALTER TABLE `assessment`
	CHANGE COLUMN `status` `status` VARCHAR(20) NULL DEFAULT 'PENDING' COLLATE 'utf8_unicode_ci' AFTER `photo`,
	ADD COLUMN `paymentStatus` VARCHAR(20) NULL DEFAULT 'UNPAID' AFTER `status`;
ALTER TABLE `assessment`
	ADD COLUMN `assessmentNo` VARCHAR(50) NULL DEFAULT NULL AFTER `userId`;

INSERT INTO userAcl (`userId`,`name`)
SELECT id,'ASSESSMENT_LIST' FROM user WHERE role = 'STUDENT';

INSERT INTO userAcl (`userId`,`name`)
SELECT id,'ASSESSMENT_DETAILS' FROM user WHERE role = 'STUDENT';

INSERT INTO userAcl (`userId`,`name`)
SELECT id,'ASSESSMENT_CREATE' FROM user WHERE role = 'STUDENT';

ALTER TABLE `assessmentAnswer`
	ADD COLUMN `types` VARCHAR(20) NULL DEFAULT NULL AFTER `question`;


