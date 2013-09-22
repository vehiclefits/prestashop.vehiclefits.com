<?php

/**
 * @author PresTeamShop.com
 * @copyright PresTeamShop.com - 2012
 */

require_once(dirname(__FILE__).'/../../config/config.inc.php');
require_once(dirname(__FILE__).'/../../init.php');
require_once(dirname(__FILE__)."/filterproductspro.php");

$filterproductspro = new FilterProductsPro();

echo $filterproductspro->uploadCsv();

?>