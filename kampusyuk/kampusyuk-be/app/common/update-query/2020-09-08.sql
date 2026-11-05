CREATE TABLE `countryInquiry`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `countryId` bigint(20) NULL,
  `name` varchar(150) NULL,
  `email` varchar(100) NULL,
  `phone` varchar(15) NULL,
  `studyLevel` varchar(20) NULL,
  `latestEducation` varchar(100) NULL,
  `createdAt` datetime(0) NULL,
  `updatedAt` datetime(0) NULL,
  PRIMARY KEY (`id`)
);