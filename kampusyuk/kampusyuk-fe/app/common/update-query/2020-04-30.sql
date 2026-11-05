ALTER TABLE `admission`
	ADD COLUMN `status` VARCHAR(50) NULL DEFAULT 'NONE' AFTER `tuitionAttachment`;
UPDATE admission SET STATUS = 'PAID_APPLICATION' WHERE registrationFee = 'PAID';
UPDATE admission SET STATUS = 'PAID_TUITION' WHERE tuitionFee = 'PAID';
ALTER TABLE `admission`
	ADD COLUMN `userId` BIGINT(10) NULL DEFAULT NULL AFTER `scholarshipId`,
	ADD INDEX `userId` (`userId`);
