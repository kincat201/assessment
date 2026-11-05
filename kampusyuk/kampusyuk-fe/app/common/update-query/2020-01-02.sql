ALTER TABLE `programStudy` ADD `icon` TEXT NULL DEFAULT NULL AFTER `onlineClass`;
ALTER TABLE `programStudy` ADD `thumbnail` TEXT NULL DEFAULT NULL AFTER `icon`;
ALTER TABLE `programStudy` ADD `banner` TEXT NULL DEFAULT NULL AFTER `thumbnail`;

ALTER TABLE `programStudyCategory` ADD `thumbnail` TEXT NULL DEFAULT NULL AFTER `name`;

ALTER TABLE `admission`
	ADD COLUMN `registrationFee` VARCHAR(50) NULL DEFAULT NULL AFTER `remark`,
	ADD COLUMN `registrationFeeDate` DATETIME NULL DEFAULT CURRENT_TIMESTAMP() AFTER `paymentStatus`,
    ADD COLUMN `registrationFeeMethod` VARCHAR(50) NULL DEFAULT NULL AFTER `paymentDate`,
    ADD COLUMN `registrationAttachment` VARCHAR(50) NULL DEFAULT NULL AFTER `paymentMethod`,
    ADD COLUMN `tuitionFee` VARCHAR(50) NULL DEFAULT 'UNPAID' AFTER `paymentAttachment`,
    ADD COLUMN `tuitionFeeDate` DATETIME NULL DEFAULT CURRENT_TIMESTAMP() AFTER `tuitionStatus`,
    ADD COLUMN `tuitionFeeMethod` VARCHAR(50) NULL DEFAULT NULL AFTER `tuitionDate`,
    ADD COLUMN `tuitionAttachment` VARCHAR(50) NULL DEFAULT NULL AFTER `tuitionMethod`;
