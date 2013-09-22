<?php /* Smarty version Smarty-3.1.13, created on 2013-09-22 11:46:51
         compiled from "/var/www/prestashop.vehiclefits.com/html/modules/blockcustomerprivacy/blockcustomerprivacy.tpl" */ ?>
<?php /*%%SmartyHeaderCode:503683915523f10ebe24030-53472617%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '159ae76d51a18dc0544da06b53430298df6d1683' => 
    array (
      0 => '/var/www/prestashop.vehiclefits.com/html/modules/blockcustomerprivacy/blockcustomerprivacy.tpl',
      1 => 1366914190,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '503683915523f10ebe24030-53472617',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'privacy_message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_523f10ebe56996_31456899',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_523f10ebe56996_31456899')) {function content_523f10ebe56996_31456899($_smarty_tpl) {?>

<div class="error_customerprivacy" style="color:red;"></div>
<fieldset class="account_creation customerprivacy">
	<h3><?php echo smartyTranslate(array('s'=>'Customer data privacy','mod'=>'blockcustomerprivacy'),$_smarty_tpl);?>
</h3>
	<p class="required">
		<input type="checkbox" value="1" id="customer_privacy" name="customer_privacy" style="float:left;margin: 15px;" />				
	</p>
	<label for="customer_privacy"><?php echo $_smarty_tpl->tpl_vars['privacy_message']->value;?>
</label>		
</fieldset><?php }} ?>