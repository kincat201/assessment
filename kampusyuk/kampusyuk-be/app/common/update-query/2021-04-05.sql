ALTER TABLE `scholarship` 
ADD COLUMN `metaTitle` varchar(255) NULL AFTER `id`,
ADD COLUMN `metaDescription` text NULL AFTER `metaTitle`;

ALTER TABLE `university` 
ADD COLUMN `metaTitle` varchar(255) NULL AFTER `name`,
ADD COLUMN `metaDescription` text NULL AFTER `metaTitle`;

ALTER TABLE `programStudy` 
ADD COLUMN `metaTitle` varchar(255) NULL AFTER `name`,
ADD COLUMN `metaDescription` text NULL AFTER `metaTitle`;