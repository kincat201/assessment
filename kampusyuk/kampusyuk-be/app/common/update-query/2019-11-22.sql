ALTER TABLE `article`
    ADD COLUMN `description` TEXT NULL AFTER `content`,
    ADD COLUMN `universityId` BIGINT NULL DEFAULT NULL AFTER `metaTitle`,
    CHANGE COLUMN `universityId` `universityId` BIGINT(20) NULL DEFAULT NULL AFTER `id`,
    ADD COLUMN `tags` TEXT NULL AFTER `description`,
    ADD INDEX `universityId` (`universityId`);
