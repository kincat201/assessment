ALTER TABLE `admission` 
ADD COLUMN `progressRegistration` text NULL AFTER `takingExam`,
ADD COLUMN `progressTest` text NULL AFTER `progressRegistration`,
ADD COLUMN `progressAcceptance` text NULL AFTER `progressTest`,
ADD COLUMN `progressRemark` text NULL AFTER `progressAcceptance`;