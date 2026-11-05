ALTER TABLE `facultyCategory` ADD COLUMN `color` VARCHAR(50) NULL DEFAULT NULL AFTER `name`,
ALTER TABLE `programStudyCategory` ADD COLUMN `facultyCategoryId` BIGINT(10) NULL DEFAULT NULL AFTER `id`;
