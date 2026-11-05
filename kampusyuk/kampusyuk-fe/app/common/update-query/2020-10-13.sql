CREATE TABLE `page`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `page` text NULL,
  `metaTitle` text NULL,
  `metaDescription` text NULL,
  `content` text NULL,
  `createdAt` datetime NULL,
  `createdBy` bigint NULL,
  `updatedAt` datetime NULL,
  `updatedBy` bigint NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `kampusyuk`.`adminAcl` (`adminId`, `name`) VALUES ('1', 'PAGE_LIST');
INSERT INTO `kampusyuk`.`adminAcl` (`adminId`, `name`) VALUES ('1', 'PAGE_DETAILS');
INSERT INTO `kampusyuk`.`adminAcl` (`adminId`, `name`) VALUES ('1', 'PAGE_UPDATE');