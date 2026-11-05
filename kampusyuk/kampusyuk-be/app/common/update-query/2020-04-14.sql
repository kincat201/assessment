ALTER TABLE `province`
	ADD COLUMN `countryId` BIGINT(10) NOT NULL DEFAULT '0' AFTER `id`;

UPDATE province SET countryId = 1;

ALTER TABLE `university`
	ADD COLUMN `countryId` BIGINT(10) NOT NULL DEFAULT '0' AFTER `provinceId`;

UPDATE university SET countryId = 1;

