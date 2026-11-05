ALTER TABLE `kampusyuk`.`programStudy` 
MODIFY COLUMN `registrationFee` decimal(18, 2) NULL DEFAULT NULL AFTER `website`,
MODIFY COLUMN `registrationFeeDiscount` decimal(18, 2) NULL DEFAULT NULL AFTER `registrationFee`,
MODIFY COLUMN `registrationFormFee` decimal(18, 2) NULL DEFAULT NULL AFTER `registrationFeeDiscount`,
MODIFY COLUMN `registrationFormFeeDiscount` decimal(18, 2) NULL DEFAULT NULL AFTER `registrationFormFee`;