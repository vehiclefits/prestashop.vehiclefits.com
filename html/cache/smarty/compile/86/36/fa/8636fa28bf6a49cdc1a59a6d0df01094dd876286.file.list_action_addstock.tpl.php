<?php /* Smarty version Smarty-3.1.13, created on 2013-07-16 20:25:11
         compiled from "/var/www/prestashop.vehiclefits.com/html/admin/themes/default/template/helpers/list/list_action_addstock.tpl" */ ?>
<?php /*%%SmartyHeaderCode:117125989751e5ac273ae6b3-51807354%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8636fa28bf6a49cdc1a59a6d0df01094dd876286' => 
    array (
      0 => '/var/www/prestashop.vehiclefits.com/html/admin/themes/default/template/helpers/list/list_action_addstock.tpl',
      1 => 1366914186,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117125989751e5ac273ae6b3-51807354',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51e5ac273b6cb8_31197350',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e5ac273b6cb8_31197350')) {function content_51e5ac273b6cb8_31197350($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/add_stock.png" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a>
<?php }} ?>