ALTER TABLE `user`
ADD COLUMN `verificationToken` varchar(255) NULL AFTER `role`,
ADD COLUMN `verificationAt` datetime(0) NULL AFTER `verificationToken`,
ADD COLUMN `resetToken` varchar(255) NULL AFTER `verificationAt`,
ADD COLUMN `lastResetAt` datetime(0) NULL AFTER `resetToken`,
ADD COLUMN `lastLogin` datetime(0) NULL AFTER `lastResetAt`
ADD COLUMN `socialiteId` varchar(20) NULL AFTER `lastLogin`,
ADD COLUMN `socialiteType` varchar(20) NULL AFTER `socialiteId`;
