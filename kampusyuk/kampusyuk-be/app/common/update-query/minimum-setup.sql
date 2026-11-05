CREATE TABLE IF NOT EXISTS `user` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
    `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
    `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `password` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
    `role` VARCHAR(20) COLLATE utf8_unicode_ci DEFAULT NULL,
    `status` varchar(20) COLLATE UTF8_UNICODE_CI DEFAULT 'ACTIVE',
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

INSERT INTO `user` (`id`, `email`, `name`, `phone`, `password`, `role`, `status`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `deletedAt`, `deletedBy`) VALUES
    (1, 'admin@gmail.com', 'Admin', NULL, '$2b$10$fADdcKQKluk9SADG88OvvOJZchmIsrxoB9A/YGI1zCi0W/2tyrcwu', 'ADMIN','ACTIVE', '2017-02-16 23:41:49', '1', '2018-10-15 03:02:25', '1', NULL, NULL);

CREATE TABLE IF NOT EXISTS `userAcl` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `userId` BIGINT(10) COLLATE utf8_unicode_ci NOT NULL,
    `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','DASHBOARD');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','USER_LIST');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','USER_DETAILS');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','USER_CREATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','USER_DELETE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','UNIVERSITY_LIST');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','UNIVERSITY_DETAILS');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','UNIVERSITY_CREATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','UNIVERSITY_UPDATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','UNIVERSITY_DELETE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','UNIVERSITY_ADMISSION_LIST');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','ADMISSION_LIST');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','ADMISSION_DETAILS');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','ADMISSION_SCHEDULE_LIST');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','ADMISSION_SCHEDULE_DETAILS');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','ADMISSION_SCHEDULE_CREATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','ADMISSION_SCHEDULE_UPDATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','ADMISSION_SCHEDULE_DELETE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','ARTICLE_LIST');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','ARTICLE_DETAILS');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','ARTICLE_CREATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','ARTICLE_UPDATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','ARTICLE_DELETE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','FACULTY_LIST');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','FACULTY_DETAILS');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','FACULTY_CREATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','FACULTY_UPDATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','FACULTY_DELETE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','FACULTY_CATEGORY_LIST');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','FACULTY_CATEGORY_DETAILS');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','FACULTY_CATEGORY_CREATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','FACULTY_CATEGORY_UPDATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','FACULTY_CATEGORY_DELETE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','FAQ_LIST');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','FAQ_DETAILS');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','FAQ_CREATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','FAQ_UPDATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','FAQ_DELETE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','FAQ_CATEGORY_LIST');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','FAQ_CATEGORY_DETAILS');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','FAQ_CATEGORY_CREATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','FAQ_CATEGORY_UPDATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','FAQ_CATEGORY_DELETE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','PROGRAM_STUDY_CATEGORY_LIST');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','PROGRAM_STUDY_CATEGORY_DETAILS');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','PROGRAM_STUDY_CATEGORY_CREATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','PROGRAM_STUDY_CATEGORY_UPDATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','PROGRAM_STUDY_CATEGORY_DELETE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','PROGRAM_STUDY_LIST');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','PROGRAM_STUDY_DETAILS');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','PROGRAM_STUDY_CREATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','PROGRAM_STUDY_UPDATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','PROGRAM_STUDY_DELETE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','SETTING_DETAILS');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','SETTING_CREATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','SETTING_UPDATE');

CREATE TABLE IF NOT EXISTS `faq` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `faqCategoryId` bigint(10) COLLATE utf8_unicode_ci NOT NULL,
    `question` text COLLATE utf8_unicode_ci DEFAULT NULL,
    `answer` text COLLATE utf8_unicode_ci DEFAULT NULL,
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `faqCategory` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `cms` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `key` VARCHAR(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    `value` text COLLATE utf8_unicode_ci DEFAULT NULL,
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `university` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(200) COLLATE utf8_unicode_ci DEFAULT NULL,
    `abbrevation` VARCHAR(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    `description` TEXT COLLATE utf8_unicode_ci DEFAULT NULL,
    `accreditation` VARCHAR(1) COLLATE utf8_unicode_ci DEFAULT NULL,
    `types` VARCHAR(20) COLLATE utf8_unicode_ci DEFAULT NULL,
    `email` VARCHAR(100) COLLATE utf8_unicode_ci DEFAULT NULL,
    `website` VARCHAR(100) COLLATE utf8_unicode_ci DEFAULT NULL,
    `phone` VARCHAR(100) COLLATE utf8_unicode_ci DEFAULT NULL,
    `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
    `studentAmount` INT(10) COLLATE utf8_unicode_ci DEFAULT NULL,
    `map` text COLLATE utf8_unicode_ci DEFAULT NULL,
    `cityId` bigint(10) COLLATE utf8_unicode_ci DEFAULT NULL,
    `provinceId` bigint(10) COLLATE utf8_unicode_ci DEFAULT NULL,
    `status` VARCHAR(20) COLLATE utf8_unicode_ci DEFAULT 'ACTIVE',
    `partner` VARCHAR(1) COLLATE utf8_unicode_ci DEFAULT 'N',
    `logo` text COLLATE utf8_unicode_ci DEFAULT NULL,
    `banner` text COLLATE utf8_unicode_ci DEFAULT NULL,
    `companyPartnerDescription` text COLLATE utf8_unicode_ci DEFAULT NULL,
    `companyPartnerLogo` text COLLATE utf8_unicode_ci DEFAULT NULL,
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `userUniversity` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `userId` BIGINT(10) COLLATE utf8_unicode_ci NOT NULL,
    `universityId` BIGINT(10) COLLATE utf8_unicode_ci DEFAULT NULL,
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `universityView` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `universityId` BIGINT(10) COLLATE utf8_unicode_ci DEFAULT NULL,
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `universityGallery` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `universityId` BIGINT(10) COLLATE utf8_unicode_ci DEFAULT NULL,
    `image` text COLLATE utf8_unicode_ci DEFAULT NULL,
    `types` VARCHAR(20) COLLATE utf8_unicode_ci DEFAULT NULL,
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `faculty` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `universityId` BIGINT(10) COLLATE utf8_unicode_ci DEFAULT NULL,
    `facultyCategoryId` BIGINT(10) COLLATE utf8_unicode_ci DEFAULT NULL,
    `name` VARCHAR(100) COLLATE utf8_unicode_ci DEFAULT NULL,
    `description` TEXT NULL DEFAULT NULL,
    `banner` text COLLATE utf8_unicode_ci DEFAULT NULL,
    `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
    `status` VARCHAR(20) COLLATE utf8_unicode_ci DEFAULT 'ACTIVE',
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `facultyCategory` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) COLLATE utf8_unicode_ci DEFAULT NULL,
    `code` VARCHAR(100) COLLATE utf8_unicode_ci DEFAULT NULL,
    `color` VARCHAR(100) COLLATE utf8_unicode_ci DEFAULT NULL,
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `programStudy` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `universityId` BIGINT(10) COLLATE utf8_unicode_ci DEFAULT NULL,
    `facultyId` BIGINT(10) COLLATE utf8_unicode_ci DEFAULT NULL,
    `programStudyCategoryId` BIGINT(10) COLLATE utf8_unicode_ci DEFAULT NULL,
    `name` VARCHAR(100) COLLATE utf8_unicode_ci DEFAULT NULL,
    `accreditation` VARCHAR(1) COLLATE utf8_unicode_ci DEFAULT NULL,
    `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
    `studyLevel` VARCHAR(5) COLLATE utf8_unicode_ci DEFAULT NULL,
    `website` VARCHAR(100) COLLATE utf8_unicode_ci DEFAULT NULL,
    `registrationFee` DECIMAL(10,0) COLLATE utf8_unicode_ci DEFAULT NULL,
    `registrationFormFee` DECIMAL(10,0) COLLATE utf8_unicode_ci DEFAULT NULL,
    `regulerClass` VARCHAR(1) COLLATE utf8_unicode_ci DEFAULT 'Y',
    `staffClass` VARCHAR(1) COLLATE utf8_unicode_ci DEFAULT 'N',
    `onlineClass` VARCHAR(1) COLLATE utf8_unicode_ci DEFAULT 'N',
    `icon` TEXT NULL DEFAULT NULL,
    `thumbnail` TEXT NULL DEFAULT NULL,
    `banner` TEXT NULL DEFAULT NULL,
    `status` VARCHAR(20) COLLATE utf8_unicode_ci DEFAULT 'ACTIVE',
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `programStudyCategory` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `facultyCategoryId` bigint(10) NULL DEFAULT NULL,
    `name` VARCHAR(100) COLLATE utf8_unicode_ci DEFAULT NULL,
    `thumbnail` TEXT NULL DEFAULT NULL,
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `programStudyCategoryProspect` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `programStudyCategoryId` BIGINT(10) COLLATE utf8_unicode_ci DEFAULT NULL,
    `prospectId` BIGINT(10) COLLATE utf8_unicode_ci DEFAULT NULL,
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `prospect` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    `banner` text COLLATE utf8_unicode_ci DEFAULT NULL,
    `types` text COLLATE utf8_unicode_ci DEFAULT NULL,
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `province` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) COLLATE utf8_unicode_ci DEFAULT NULL,
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `city` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `provinceId` BIGINT(10) COLLATE utf8_unicode_ci DEFAULT NULL,
    `name` VARCHAR(100) COLLATE utf8_unicode_ci DEFAULT NULL,
    `types` VARCHAR(20) COLLATE utf8_unicode_ci DEFAULT NULL,
    `postalCode` VARCHAR(20) COLLATE utf8_unicode_ci DEFAULT NULL,
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `article` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `universityId` BIGINT(10) COLLATE utf8_unicode_ci DEFAULT NULL,
    `title` VARCHAR(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
    `content` text COLLATE utf8_unicode_ci DEFAULT NULL,
    `thumbnail` text COLLATE utf8_unicode_ci DEFAULT NULL,
    `status` VARCHAR(20) COLLATE utf8_unicode_ci DEFAULT 'ACTIVE',
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `articleTag` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `articleId` BIGINT(10) COLLATE utf8_unicode_ci DEFAULT NULL,
    `tag` VARCHAR(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `student` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `userId` BIGINT(10) COLLATE utf8_unicode_ci DEFAULT NULL,
    `birthDate` date COLLATE utf8_unicode_ci DEFAULT NULL,
    `birthPlace` VARCHAR(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    `gender` VARCHAR(20) COLLATE utf8_unicode_ci DEFAULT NULL,
    `religion` VARCHAR(20) COLLATE utf8_unicode_ci DEFAULT NULL,
    `nationality` VARCHAR(20) COLLATE utf8_unicode_ci DEFAULT NULL,
    `graduateYear` VARCHAR(20) COLLATE utf8_unicode_ci DEFAULT NULL,
    `graduateField` VARCHAR(20) COLLATE utf8_unicode_ci DEFAULT NULL,
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `studentProgramStudyCategory` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `studentId` BIGINT(10) COLLATE utf8_unicode_ci DEFAULT NULL,
    `programStudyCategoryId` BIGINT(10) COLLATE utf8_unicode_ci DEFAULT NULL,
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `admission` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `programStudyId` BIGINT(10) COLLATE utf8_unicode_ci DEFAULT NULL,
    `admissionScheduleId` BIGINT(10) COLLATE utf8_unicode_ci DEFAULT NULL,
    `name` VARCHAR(100) COLLATE utf8_unicode_ci DEFAULT NULL,
    `email` VARCHAR(100) COLLATE utf8_unicode_ci DEFAULT NULL,
    `phone` VARCHAR(20) COLLATE utf8_unicode_ci DEFAULT NULL,
    `registrationType` VARCHAR(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    `classType` VARCHAR(20) COLLATE utf8_unicode_ci DEFAULT NULL,
    `remark` text COLLATE utf8_unicode_ci DEFAULT NULL,
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `admissionSchedule` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `universityId` BIGINT(10) COLLATE utf8_unicode_ci DEFAULT NULL,
    `name` VARCHAR(100) COLLATE utf8_unicode_ci DEFAULT NULL,
    `deadline` date COLLATE utf8_unicode_ci DEFAULT NULL,
    `remark` text COLLATE utf8_unicode_ci DEFAULT NULL,
    `availability` VARCHAR(20) COLLATE utf8_unicode_ci DEFAULT 'ALL',
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `scholarship` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `universityId` BIGINT(10) COLLATE utf8_unicode_ci DEFAULT NULL,
    `name` VARCHAR(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `types` VARCHAR(20) COLLATE utf8_unicode_ci DEFAULT NULL,
    `deadline` date COLLATE utf8_unicode_ci DEFAULT NULL,
    `amount` DECIMAL(12,0) COLLATE utf8_unicode_ci DEFAULT NULL,
    `providerName` VARCHAR(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `providerLogo` text COLLATE utf8_unicode_ci DEFAULT NULL,
    `content` text COLLATE utf8_unicode_ci DEFAULT NULL,
    `locationTypes` VARCHAR(20) COLLATE utf8_unicode_ci DEFAULT NULL,
    `universityTypes` VARCHAR(20) COLLATE utf8_unicode_ci DEFAULT NULL,
    `studyLevel` VARCHAR(20) COLLATE utf8_unicode_ci DEFAULT NULL,
    `categoryTypes` VARCHAR(20) COLLATE utf8_unicode_ci DEFAULT NULL,
    `scholarshipLevel` VARCHAR(20) COLLATE utf8_unicode_ci DEFAULT NULL,
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `scholarshipUniversity` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `universityId` BIGINT(10) COLLATE utf8_unicode_ci DEFAULT NULL,
    `scholarshipId` BIGINT(10) COLLATE utf8_unicode_ci DEFAULT NULL,
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `setting` (
    `id` bigint(20) NOT NULL AUTO_INCREMENT,
    `footerLogo` TEXT NULL DEFAULT NULL,
    `callCenterNumber` VARCHAR(20) NULL DEFAULT NULL,
    `callCenterTime` VARCHAR(100) NULL DEFAULT NULL,
    `newsletterDescription` VARCHAR(255) NULL DEFAULT NULL,
    `footerDescription` TEXT NULL DEFAULT NULL,
    `facebookLink` VARCHAR(255) NULL DEFAULT NULL,
    `instagramLink` VARCHAR(255) NULL DEFAULT NULL,
    `linkedInLink` VARCHAR(255) NULL DEFAULT NULL,
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

