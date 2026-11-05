ALTER TABLE `scholarship`
	ADD COLUMN `status` TEXT NULL AFTER `scholarshipLevel`,
	ADD COLUMN `amountTypes` TEXT NULL AFTER `amount`;

ALTER TABLE `faculty` DROP COLUMN `provinceId`;
ALTER TABLE `faculty` DROP COLUMN `cityId`;
