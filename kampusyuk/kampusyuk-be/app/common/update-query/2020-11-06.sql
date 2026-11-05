ALTER TABLE `kampusyuk`.`programStudy` 
ADD COLUMN `progressRegistration` text NULL AFTER `paymentRequired`,
ADD COLUMN `progressTest` text NULL AFTER `progressRegistration`,
ADD COLUMN `progressAcceptance` text NULL AFTER `progressTest`,
ADD COLUMN `progressRemark` text NULL AFTER `progressAcceptance`;