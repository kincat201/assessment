ALTER TABLE `assessment` 
ADD COLUMN `name` varchar(255) NULL AFTER `assessmentNo`,
ADD COLUMN `gender` varchar(10) NULL AFTER `name`,
ADD COLUMN `dateOfBirth` date NULL AFTER `gender`,
ADD COLUMN `schoolName` varchar(255) NULL AFTER `dateOfBirth`;