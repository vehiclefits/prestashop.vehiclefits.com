<?php /* Smarty version Smarty-3.1.13, created on 2013-07-16 20:25:14
         compiled from "/var/www/prestashop.vehiclefits.com/html/themes/default/mobile/manufacturer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:184703132451e5ac2ae53542-98129910%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '926869848ab67973edb292612194cfcf14b7bff1' => 
    array (
      0 => '/var/www/prestashop.vehiclefits.com/html/themes/default/mobile/manufacturer.tpl',
      1 => 1366914192,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184703132451e5ac2ae53542-98129910',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'manufacturer' => 0,
    'errors' => 0,
    'link' => 0,
    'products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51e5ac2aec3101_42919019',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e5ac2aec3101_42919019')) {function content_51e5ac2aec3101_42919019($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/var/www/prestashop.vehiclefits.com/html/tools/smarty/plugins/modifier.escape.php';
?>

<?php $_smarty_tpl->_capture_stack[0][] = array('default', 'page_title', null); ob_start(); ?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['manufacturer']->value->name, 'htmlall', 'UTF-8');?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php echo $_smarty_tpl->getSubTemplate ('./page-title.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php if (!isset($_smarty_tpl->tpl_vars['errors']->value)||!sizeof($_smarty_tpl->tpl_vars['errors']->value)){?>

<div data-role="content" id="content">
	<p><a data-role="button" data-icon="arrow-l" data-theme="a" data-mini="true" data-inline="true" href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('manufacturer',true);?>
" data-ajax="false"><?php echo smartyTranslate(array('s'=>'Manufacturers:'),$_smarty_tpl);?>
</a></p>
	<?php if (!empty($_smarty_tpl->tpl_vars['manufacturer']->value->description)||!empty($_smarty_tpl->tpl_vars['manufacturer']->value->short_description)){?>
		<div class="category_desc clearfix">
			<?php if (!empty($_smarty_tpl->tpl_vars['manufacturer']->value->short_description)){?>
				<p><?php echo $_smarty_tpl->tpl_vars['manufacturer']->value->short_description;?>
</p>
				<p class="hide_desc"><?php echo $_smarty_tpl->tpl_vars['manufacturer']->value->description;?>
</p>
				<a href="#" data-theme="f" data-role="button" data-mini="true" data-inline="true" data-icon="arrow-d" class="lnk_more" onclick="$(this).prev().slideDown('slow'); $(this).hide(); return false;" data-ajax="false"><?php echo smartyTranslate(array('s'=>'More'),$_smarty_tpl);?>
</a>
			<?php }else{ ?>
				<p><?php echo $_smarty_tpl->tpl_vars['manufacturer']->value->description;?>
</p>
			<?php }?>
		</div><!-- .category_desc -->
	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['products']->value){?>
			<div class="clearfix">
				<?php echo $_smarty_tpl->getSubTemplate ("./category-product-sort.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('container_class'=>"container-sort"), 0);?>

			</div>
			<hr/>
			<?php echo $_smarty_tpl->getSubTemplate ("./pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<?php echo $_smarty_tpl->getSubTemplate ("./category-product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('products'=>$_smarty_tpl->tpl_vars['products']->value), 0);?>

			<?php echo $_smarty_tpl->getSubTemplate ("./pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			
	<?php }else{ ?>
		<p class="warning"><?php echo smartyTranslate(array('s'=>'No products for this manufacturer.'),$_smarty_tpl);?>
</p>
	<?php }?>
		<?php echo $_smarty_tpl->getSubTemplate ('./sitemap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div><!-- #content -->
<?php }?>
<?php }} ?>