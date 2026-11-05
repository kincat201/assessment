ALTER TABLE `cms`
	ADD COLUMN `title` VARCHAR(255) NULL DEFAULT NULL AFTER `id`;

INSERT INTO `kampusyuk`.`userAcl` (`userId`, `name`) VALUES ('1', 'CONTENT_LIST');
INSERT INTO `kampusyuk`.`userAcl` (`userId`, `name`) VALUES ('1', 'CONTENT_DETAILS');
INSERT INTO `kampusyuk`.`userAcl` (`userId`, `name`) VALUES ('1', 'CONTENT_UPDATE');

INSERT INTO `kampusyuk`.`cms` (`title`, `key`, `value`) VALUES ('Home', 'HOME', 'this is home');
INSERT INTO `kampusyuk`.`cms` (`title`, `key`, `value`) VALUES ('Kampusyuk Journey', 'JOURNEY', 'this is Kampusyuk Journey');
INSERT INTO `kampusyuk`.`cms` (`title`, `key`, `value`) VALUES ('University List', 'UNIVERSITY_LIST', 'this is University List');
INSERT INTO `kampusyuk`.`cms` (`title`, `key`, `value`) VALUES ('Program Study List', 'PROGRAM_STUDY_LIST', 'this is Program Study List');
INSERT INTO `kampusyuk`.`cms` (`title`, `key`, `value`) VALUES ('Scholarship List', 'SCHOLARSHIP_LIST', 'this is Scholarship List');
INSERT INTO `kampusyuk`.`cms` (`title`, `key`, `value`) VALUES ('Article List', 'ARTICLE_LIST', 'this is Article List');
INSERT INTO `kampusyuk`.`cms` (`title`, `key`, `value`) VALUES ('About Us', 'ABOUT_US', 'this is About Us');
INSERT INTO `kampusyuk`.`cms` (`title`, `key`, `value`) VALUES ('Term and Condition', 'TERM_AND_CODITION', 'this is Term and Condition');
INSERT INTO `kampusyuk`.`cms` (`title`, `key`, `value`) VALUES ('Privacy Policy', 'PRIVACY_POLICY', 'this is Privacy Policy');

INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','ADMISSION_LIST');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','ADMISSION_DETAILS');