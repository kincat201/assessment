ALTER TABLE `assessment` 
ADD COLUMN `hash` varchar(255) NULL AFTER `id`;

ALTER TABLE `countryDetail` 
ADD COLUMN `help` text NULL AFTER `whyChoose`,
ADD COLUMN `otherThing` text NULL AFTER `help`;

ALTER TABLE `countryDetail` 
ADD COLUMN `known` text NULL AFTER `help`;