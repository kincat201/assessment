CREATE TABLE IF NOT EXISTS `scholarshipProvider` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(200) COLLATE utf8_unicode_ci DEFAULT NULL,
    `logo` TEXT COLLATE utf8_unicode_ci DEFAULT NULL,
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

ALTER TABLE `scholarship`
	ADD COLUMN `scholarshipProviderId` BIGINT(10) NULL DEFAULT NULL AFTER `universityId`;

ALTER TABLE `scholarship`
	DROP COLUMN `universityId`;

ALTER TABLE `scholarship`
	DROP COLUMN `locationTypes`,
	DROP COLUMN `universityTypes`,
	DROP COLUMN `categoryTypes`,
	DROP COLUMN `scholarshipLevel`;

ALTER TABLE `scholarship`
	DROP COLUMN `providerName`,
	DROP COLUMN `providerLogo`;

ALTER TABLE `scholarshipProvider`
	ADD COLUMN `banner` TEXT NULL AFTER `logo`;

UPDATE `kampusyuk`.`scholarshipProvider` SET `logo`='provider/logo/default.png' WHERE  `id`=1;
UPDATE `kampusyuk`.`scholarshipProvider` SET `logo`='provider/logo/default.png' WHERE  `id`=2;
UPDATE `kampusyuk`.`scholarshipProvider` SET `banner`='provider/banner/default.png' WHERE  `id`=1;
UPDATE `kampusyuk`.`scholarshipProvider` SET `banner`='provider/banner/default.png' WHERE  `id`=1;
