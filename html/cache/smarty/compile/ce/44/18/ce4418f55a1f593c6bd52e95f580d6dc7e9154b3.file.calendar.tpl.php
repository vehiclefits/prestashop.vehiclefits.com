<?php /* Smarty version Smarty-3.1.13, created on 2013-07-16 20:25:07
         compiled from "/var/www/prestashop.vehiclefits.com/html/admin/themes/default/template/controllers/referrers/calendar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:174316448351e5ac23d49b70-76586249%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce4418f55a1f593c6bd52e95f580d6dc7e9154b3' => 
    array (
      0 => '/var/www/prestashop.vehiclefits.com/html/admin/themes/default/template/controllers/referrers/calendar.tpl',
      1 => 1366914186,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '174316448351e5ac23d49b70-76586249',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'current' => 0,
    'token' => 0,
    'action' => 0,
    'table' => 0,
    'identifier' => 0,
    'id' => 0,
    'translations' => 0,
    'datepickerFrom' => 0,
    'datepickerTo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51e5ac23dabf49_54486657',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e5ac23dabf49_54486657')) {function content_51e5ac23dabf49_54486657($_smarty_tpl) {?>

<div id="referrersContainer">
	<div id="calendar">
				<form action="<?php echo $_smarty_tpl->tpl_vars['current']->value;?>
&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
<?php if ($_smarty_tpl->tpl_vars['action']->value&&$_smarty_tpl->tpl_vars['table']->value){?>&<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['identifier']->value&&$_smarty_tpl->tpl_vars['id']->value){?>&<?php echo $_smarty_tpl->tpl_vars['identifier']->value;?>
=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
<?php }?>" method="post" id="calendar_form" name="calendar_form">
					<input type="submit" name="submitDateDay" class="button submitDateDay" value="<?php echo $_smarty_tpl->tpl_vars['translations']->value['Day'];?>
">
					<input type="submit" name="submitDateMonth" class="button submitDateMonth" value="<?php echo $_smarty_tpl->tpl_vars['translations']->value['Month'];?>
">
					<input type="submit" name="submitDateYear" class="button submitDateYear" value="<?php echo $_smarty_tpl->tpl_vars['translations']->value['Year'];?>
">
					<input type="submit" name="submitDateDayPrev" class="button submitDateDayPrev" value="<?php echo $_smarty_tpl->tpl_vars['translations']->value['Day'];?>
-1">
					<input type="submit" name="submitDateMonthPrev" class="button submitDateMonthPrev" value="<?php echo $_smarty_tpl->tpl_vars['translations']->value['Month'];?>
-1">
					<input type="submit" name="submitDateYearPrev" class="button submitDateYearPrev" value="<?php echo $_smarty_tpl->tpl_vars['translations']->value['Year'];?>
-1">
					<p><span><?php if (isset($_smarty_tpl->tpl_vars['translations']->value['From'])){?><?php echo $_smarty_tpl->tpl_vars['translations']->value['From'];?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'From:'),$_smarty_tpl);?>
<?php }?></span>
						<input type="text" name="datepickerFrom" id="datepickerFrom" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['datepickerFrom']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="datepicker">
					</p>
					<p><span><?php if (isset($_smarty_tpl->tpl_vars['translations']->value['To'])){?><?php echo $_smarty_tpl->tpl_vars['translations']->value['To'];?>
<?php }else{ ?><span><?php echo smartyTranslate(array('s'=>'From:'),$_smarty_tpl);?>
</span><?php }?></span>
						<input type="text" name="datepickerTo" id="datepickerTo" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['datepickerTo']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="datepicker">
					</p>
					<input type="submit" name="submitDatePicker" id="submitDatePicker" class="button" value="<?php if (isset($_smarty_tpl->tpl_vars['translations']->value['Save'])){?><?php echo $_smarty_tpl->tpl_vars['translations']->value['Save'];?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'   Save   '),$_smarty_tpl);?>
<?php }?>" />
				</form>

				<script type="text/javascript">
					$(document).ready(function() {
						if ($("form#calendar_form .datepicker").length > 0)
							$("form#calendar_form .datepicker").datepicker({
								prevText: '',
								nextText: '',
								dateFormat: 'yy-mm-dd'
							});
					});
				</script>
	</div><?php }} ?>