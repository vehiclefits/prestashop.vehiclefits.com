<?php

if (!defined('_PS_VERSION_'))
  exit;
 
function upgrade_module_1_8_9($object)
{
    return $object->updateVersion();
}
?>