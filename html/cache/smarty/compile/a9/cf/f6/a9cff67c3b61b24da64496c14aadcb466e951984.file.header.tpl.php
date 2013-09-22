<?php /* Smarty version Smarty-3.1.13, created on 2013-09-22 11:47:03
         compiled from "/var/www/prestashop.vehiclefits.com/html/modules/filterproductspro/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:722524949523f10f775dc83-94762575%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a9cff67c3b61b24da64496c14aadcb466e951984' => 
    array (
      0 => '/var/www/prestashop.vehiclefits.com/html/modules/filterproductspro/header.tpl',
      1 => 1379094787,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '722524949523f10f775dc83-94762575',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'URL' => 0,
    'ID_CATEGORY' => 0,
    'ID_MANUFACTURER' => 0,
    'ID_SUPPLIER' => 0,
    'FILTERPRODUCTSPRO_DIR' => 0,
    'FILTERPRODUCTSPRO_IMG' => 0,
    'GLOBAL_JS' => 0,
    'FPP_ID_CONTENT_RESULTS' => 0,
    'FPP_IS_PS_15' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_523f10f777e928_83253779',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_523f10f777e928_83253779')) {function content_523f10f777e928_83253779($_smarty_tpl) {?>

<script type="text/javascript">
    var uri = '<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
';
    var id_category = <?php echo $_smarty_tpl->tpl_vars['ID_CATEGORY']->value;?>
;
    var id_manufacturer = <?php echo $_smarty_tpl->tpl_vars['ID_MANUFACTURER']->value;?>
;
    var id_supplier = <?php echo $_smarty_tpl->tpl_vars['ID_SUPPLIER']->value;?>
;
    var filterproductspro_dir = '<?php echo $_smarty_tpl->tpl_vars['FILTERPRODUCTSPRO_DIR']->value;?>
';
    var filterproductspro_img = '<?php echo $_smarty_tpl->tpl_vars['FILTERPRODUCTSPRO_IMG']->value;?>
';
    var GLOBALS = <?php echo $_smarty_tpl->tpl_vars['GLOBAL_JS']->value;?>
;
    var id_content_results = '<?php echo $_smarty_tpl->tpl_vars['FPP_ID_CONTENT_RESULTS']->value;?>
';
    var fpp_is_ps_15 = Boolean(<?php echo $_smarty_tpl->tpl_vars['FPP_IS_PS_15']->value;?>
);
</script><?php }} ?>