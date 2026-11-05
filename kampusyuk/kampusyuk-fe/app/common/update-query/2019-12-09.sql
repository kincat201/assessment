ALTER TABLE `faculty`
	DROP COLUMN `cityId`,
	DROP COLUMN `provinceId`,
	DROP COLUMN `banner`;

ALTER TABLE `programStudy`
	ADD COLUMN `registrationFeeDiscount` DECIMAL(10,0) NULL DEFAULT NULL AFTER `registrationFee`,
	ADD COLUMN `registrationFormFeeDiscount` DECIMAL(10,0) NULL DEFAULT NULL AFTER `registrationFormFee`;

ALTER TABLE `programStudy`
	DROP COLUMN `icon`,
	DROP COLUMN `thumbnail`;

INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','SCHOLARSHIP_LIST');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','SCHOLARSHIP_DETAILS');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','SCHOLARSHIP_CREATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','SCHOLARSHIP_UPDATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','SCHOLARSHIP_DELETE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','SCHOLARSHIP_PROVIDER_LIST');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','SCHOLARSHIP_PROVIDER_DETAILS');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','SCHOLARSHIP_PROVIDER_CREATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','SCHOLARSHIP_PROVIDER_UPDATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','SCHOLARSHIP_PROVIDER_DELETE');

CREATE TABLE IF NOT EXISTS `scholarshipStudyLevel` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `scholarshipId` bigint(10) NULL,
    `level` VARCHAR(200) COLLATE utf8_unicode_ci DEFAULT NULL,
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

ALTER TABLE `scholarship`
	DROP COLUMN `studyLevel`;

ALTER TABLE `article`
    ADD COLUMN `slug` text;

ALTER TABLE `university`
	ADD COLUMN `slug` TEXT NULL AFTER `addressOthers`;

INSERT INTO `kampusyuk`.`scholarshipStudyLevel` (`scholarshipId`, `level`) VALUES ('1', 'S1');
INSERT INTO `kampusyuk`.`scholarshipStudyLevel` (`scholarshipId`, `level`) VALUES ('1', 'S2');
INSERT INTO `kampusyuk`.`scholarshipStudyLevel` (`scholarshipId`, `level`) VALUES ('2', 'D3');

INSERT INTO `kampusyuk`.`scholarshipUniversity` (`universityId`, `scholarshipId`) VALUES ('1', '1');
INSERT INTO `kampusyuk`.`scholarshipUniversity` (`universityId`, `scholarshipId`) VALUES ('1', '2');







