<?php /* Smarty version Smarty-3.1.13, created on 2013-07-16 16:27:44
         compiled from "/var/www/prestashop.vehiclefits.com/html/modules/blockadvertising/blockadvertising.tpl" */ ?>
<?php /*%%SmartyHeaderCode:150277611851e5acc0b04b20-59460805%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '893763ec1fa5eacfe487f788114959103fddf887' => 
    array (
      0 => '/var/www/prestashop.vehiclefits.com/html/modules/blockadvertising/blockadvertising.tpl',
      1 => 1366914190,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '150277611851e5acc0b04b20-59460805',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'adv_link' => 0,
    'adv_title' => 0,
    'image' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51e5acc0b12c70_44074775',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e5acc0b12c70_44074775')) {function content_51e5acc0b12c70_44074775($_smarty_tpl) {?>

<!-- MODULE Block advertising -->
<div class="advertising_block">
	<a href="<?php echo $_smarty_tpl->tpl_vars['adv_link']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['adv_title']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['adv_title']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['adv_title']->value;?>
" width="155"  height="163" /></a>
</div>
<!-- /MODULE Block advertising -->
<?php }} ?>