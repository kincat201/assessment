ALTER TABLE `admission`
	ADD COLUMN `registrationId` VARCHAR(100) NULL DEFAULT NULL AFTER `admissionScheduleId`;
