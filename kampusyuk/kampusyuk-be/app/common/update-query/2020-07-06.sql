ALTER TABLE `kampusyuk`.`admission`   
  ADD COLUMN `submitDocument` VARCHAR(1) DEFAULT 'N' NULL AFTER `tuitionAttachment`,
  ADD COLUMN `takingExam` VARCHAR(1) NULL AFTER `submitDocument`;
