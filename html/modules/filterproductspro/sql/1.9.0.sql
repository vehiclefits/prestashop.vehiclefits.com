ALTER TABLE `PREFIX_fpp_searcher` ADD COLUMN `multi_option` TINYINT(1) NULL AFTER `filter_pages`;
UPDATE `PREFIX_fpp_searcher` SET `multi_option` = 0;