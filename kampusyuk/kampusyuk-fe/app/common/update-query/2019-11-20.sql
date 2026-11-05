ALTER TABLE `programStudy` ADD `icon` TEXT NULL DEFAULT NULL AFTER `onlineClass`;
ALTER TABLE `programStudy` ADD `thumbnail` TEXT NULL DEFAULT NULL AFTER `icon`;

INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','ARTICLE_LIST');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','ARTICLE_DETAILS');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','ARTICLE_CREATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','ARTICLE_UPDATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','ARTICLE_DELETE');

INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','FACULTY_LIST');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','FACULTY_DETAILS');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','FACULTY_CREATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','FACULTY_UPDATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','FACULTY_DELETE');

INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','PROGRAM_STUDY_LIST');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','PROGRAM_STUDY_DETAILS');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','PROGRAM_STUDY_CREATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','PROGRAM_STUDY_UPDATE');
INSERT INTO `userAcl` (`userId`,`name`) VALUES ('1','PROGRAM_STUDY_DELETE');