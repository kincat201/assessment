ALTER TABLE `facultyCategory`
	CHANGE COLUMN `name` `name` VARCHAR(100) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci' AFTER `id`,
	ADD COLUMN `nameEn` VARCHAR(100) NULL DEFAULT NULL AFTER `name`;
ALTER TABLE `programStudyCategory`
	ADD COLUMN `nameEn` VARCHAR(100) NULL DEFAULT NULL AFTER `name`;
UPDATE `programStudyCategory` SET nameEn = NAME;
UPDATE `facultyCategory` SET nameEn = NAME;
