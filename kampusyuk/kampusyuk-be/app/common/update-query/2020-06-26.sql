ALTER TABLE `kampusyuk`.`programStudy`   
  ADD COLUMN `paymentRequired` VARCHAR(1) DEFAULT 'N' NULL AFTER `banner`;

INSERT INTO `kampusyuk`.`adminAcl` (`adminId`, `name`) VALUES ('1', 'TRANSACTION_LIST');