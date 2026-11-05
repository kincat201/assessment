CREATE TABLE IF NOT EXISTS `country` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
    `currency` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `status` varchar(20) COLLATE UTF8_UNICODE_CI DEFAULT 'ACTIVE',
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

INSERT INTO `country` (`id`, `name`, `currency`, `status`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `deletedAt`, `deletedBy`) VALUES
    (1, 'Indonesia', 'IDR','ACTIVE', '2020-04-13 11:20:49', '1', '2020-04-13 11:20:49', '1', NULL, NULL);
INSERT INTO `country` (`id`, `name`, `currency`, `status`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `deletedAt`, `deletedBy`) VALUES
    (1, 'Australia', 'AUD','ACTIVE', '2020-04-13 11:20:49', '1', '2020-04-13 11:20:49', '1', NULL, NULL);
INSERT INTO `country` (`id`, `name`, `currency`, `status`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `deletedAt`, `deletedBy`) VALUES
    (1, 'Singapore', 'SGD','ACTIVE', '2020-04-13 11:20:49', '1', '2020-04-13 11:20:49', '1', NULL, NULL);

CREATE TABLE IF NOT EXISTS `countryDetail` (
    `id` bigint(10) NOT NULL AUTO_INCREMENT,
    `countryId` BIGINT(10) COLLATE utf8_unicode_ci NOT NULL,
    `meta` text COLLATE utf8_unicode_ci DEFAULT NULL,
    `header` text COLLATE utf8_unicode_ci DEFAULT NULL,
    `studying` text COLLATE utf8_unicode_ci DEFAULT NULL,
    `whyChoose` text COLLATE utf8_unicode_ci DEFAULT NULL,
    `livingCost` text COLLATE utf8_unicode_ci DEFAULT NULL,
    `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `createdBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
    `deletedAt` timestamp NULL DEFAULT NULL,
    `deletedBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
);

INSERT INTO `countryDetail` (`id`, `countryId`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `deletedAt`, `deletedBy`) VALUES
    (1, 1, '2020-04-13 11:20:49', '1', '2020-04-13 11:20:49', '1', NULL, NULL);
INSERT INTO `countryDetail` (`id`, `countryId`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `deletedAt`, `deletedBy`) VALUES
    (2, 2, '2020-04-13 11:20:49', '1', '2020-04-13 11:20:49', '1', NULL, NULL);
INSERT INTO `countryDetail` (`id`, `countryId`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `deletedAt`, `deletedBy`) VALUES
    (3, 3, '2020-04-13 11:20:49', '1', '2020-04-13 11:20:49', '1', NULL, NULL);

INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','COUNTRY_LIST');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','COUNTRY_DETAILS');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','COUNTRY_UPDATE');
