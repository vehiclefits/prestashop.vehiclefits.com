UPDATE `PREFIX_fpp_filter` SET `type` = 'radio' WHERE multi_options = 0 AND `type` = 'checkbox';
ALTER TABLE `PREFIX_fpp_filter` DROP multi_options;