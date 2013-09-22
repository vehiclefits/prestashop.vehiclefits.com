<?php /* Smarty version Smarty-3.1.13, created on 2013-09-22 16:15:01
         compiled from "/var/www/prestashop.vehiclefits.com/html/modules/feeder/feederHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:749445225523f4fc5012267-75138188%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e686eceab9672bde245da07e44a902352854f92b' => 
    array (
      0 => '/var/www/prestashop.vehiclefits.com/html/modules/feeder/feederHeader.tpl',
      1 => 1366914192,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '749445225523f4fc5012267-75138188',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'meta_title' => 0,
    'feedUrl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_523f4fc50284d7_74948906',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_523f4fc50284d7_74948906')) {function content_523f4fc50284d7_74948906($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/var/www/prestashop.vehiclefits.com/html/tools/smarty/plugins/modifier.escape.php';
?>

<link rel="alternate" type="application/rss+xml" title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_title']->value, 'html', 'UTF-8');?>
" href="<?php echo $_smarty_tpl->tpl_vars['feedUrl']->value;?>
" /><?php }} ?>