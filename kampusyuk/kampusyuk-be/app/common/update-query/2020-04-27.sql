ALTER TABLE `admission`
	ADD COLUMN `englishProficiency` VARCHAR(255) NULL DEFAULT NULL AFTER `schoolFrom`,
	ADD COLUMN `jobTitle` VARCHAR(255) NULL DEFAULT NULL AFTER `englishProficiency`,
	ADD COLUMN `graduateUniversity` VARCHAR(255) NULL DEFAULT NULL AFTER `jobTitle`;
ALTER TABLE `scholarship`
	ADD COLUMN `area` VARCHAR(100) NULL DEFAULT 'INDONESIA' AFTER `types`;
ALTER TABLE `scholarship`
	ADD COLUMN `amountText` VARCHAR(100) NULL DEFAULT NULL AFTER `amountTypes`;
UPDATE scholarship SET amountText =
IF(amountTypes = 'PERCENT',CONCAT(amount,' %'),CONCAT('Rp ',FORMAT(amount,0,'de_DE')));
ALTER TABLE `university`
	ADD COLUMN `area` VARCHAR(100) NULL DEFAULT 'INDONESIA' AFTER `types`;
