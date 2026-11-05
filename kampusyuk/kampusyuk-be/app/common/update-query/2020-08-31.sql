INSERT INTO `kampusyuk`.`adminAcl` (`adminId`, `name`) VALUES ('1', 'ASSESSMENT_LIST');
INSERT INTO `kampusyuk`.`adminAcl` (`adminId`, `name`) VALUES ('1', 'ASSESSMENT_DETAILS');
INSERT INTO `kampusyuk`.`adminAcl` (`adminId`, `name`) VALUES ('1', 'ASSESSMENT_DELETE');


INSERT INTO `country` (`id`, `name`, `currency`, `status`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `deletedAt`, `deletedBy`) VALUES
    (4, 'Germany', 'EUR','ACTIVE', '2020-08-31 11:20:49', '1', '2020-08-31 11:20:49', '1', NULL, NULL);
INSERT INTO `countryDetail` (`id`, `countryId`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `deletedAt`, `deletedBy`) VALUES
    (4, 4, '2020-04-13 11:20:49', '1', '2020-04-13 11:20:49', '1', NULL, NULL);

INSERT INTO `country` (`id`, `name`, `currency`, `status`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `deletedAt`, `deletedBy`) VALUES
    (5, 'United Kingdom', 'GBP','ACTIVE', '2020-08-31 11:20:49', '1', '2020-08-31 11:20:49', '1', NULL, NULL);
INSERT INTO `countryDetail` (`id`, `countryId`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `deletedAt`, `deletedBy`) VALUES
    (5, 5, '2020-04-13 11:20:49', '1', '2020-04-13 11:20:49', '1', NULL, NULL);


