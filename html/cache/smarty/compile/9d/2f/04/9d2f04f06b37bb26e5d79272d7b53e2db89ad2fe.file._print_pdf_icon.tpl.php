<?php /* Smarty version Smarty-3.1.13, created on 2013-07-16 20:25:07
         compiled from "/var/www/prestashop.vehiclefits.com/html/admin/themes/default/template/controllers/slip/_print_pdf_icon.tpl" */ ?>
<?php /*%%SmartyHeaderCode:124689466351e5ac23c04f52-22589663%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d2f04f06b37bb26e5d79272d7b53e2db89ad2fe' => 
    array (
      0 => '/var/www/prestashop.vehiclefits.com/html/admin/themes/default/template/controllers/slip/_print_pdf_icon.tpl',
      1 => 1366914186,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '124689466351e5ac23c04f52-22589663',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'order_slip' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51e5ac23c11743_12274651',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e5ac23c11743_12274651')) {function content_51e5ac23c11743_12274651($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/var/www/prestashop.vehiclefits.com/html/tools/smarty/plugins/modifier.escape.php';
?>


<span style="width:20px; margin-right:5px;">
<a target="_blank" href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminPdf'), 'htmlall', 'UTF-8');?>
&submitAction=generateOrderSlipPDF&id_order_slip=<?php echo $_smarty_tpl->tpl_vars['order_slip']->value->id;?>
"><img src="../img/admin/tab-invoice.gif" alt="order_slip" /></a>
</span>
<?php }} ?>