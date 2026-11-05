ALTER TABLE `scholarship`
	ADD COLUMN `banner` VARCHAR(20) NULL DEFAULT NULL AFTER `types`,
	ADD INDEX `scholarshipProviderId` (`scholarshipProviderId`);
ALTER TABLE `admission`
	ADD COLUMN `scholarshipId` BIGINT(10) NULL DEFAULT NULL AFTER `admissionScheduleId`;
