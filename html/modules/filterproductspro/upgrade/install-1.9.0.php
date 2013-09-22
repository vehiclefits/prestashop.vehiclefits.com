<?php

if (!defined('_PS_VERSION_'))
  exit;
 
function upgrade_module_1_9_0($object)
{
    return $object->updateVersion();
}
?>