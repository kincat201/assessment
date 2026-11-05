ALTER TABLE `university`
	ADD COLUMN `popularity` DOUBLE NULL DEFAULT NULL AFTER `partner`,
	ADD COLUMN `galleryBanner` TEXT NULL AFTER `banner`;

ALTER TABLE `university`
    ADD COLUMN `featured` VARCHAR(1) NULL DEFAULT 'N' AFTER `partner`;

ALTER TABLE `university`
	CHANGE COLUMN `banner` `admissionBanner` TEXT NULL COLLATE 'utf8_unicode_ci' AFTER `logo`;

ALTER TABLE `article`
	ADD COLUMN `metaTitle` TEXT NULL DEFAULT NULL AFTER `id`,
	ADD COLUMN `metaDescription` TEXT NULL DEFAULT NULL AFTER `metaTitle`,
	DROP COLUMN `universityId`,
	DROP COLUMN `description`;

ALTER TABLE `article`
    ADD COLUMN `author` VARCHAR(100) NULL DEFAULT NULL AFTER `content`;

ALTER TABLE `admissionSchedule`
	ADD COLUMN `status` VARCHAR(20) NULL DEFAULT 'ACTIVE' AFTER `availability`;

ALTER TABLE `university`
	ADD COLUMN `addressOthers` TEXT NULL AFTER `companyPartnerLogo`;
