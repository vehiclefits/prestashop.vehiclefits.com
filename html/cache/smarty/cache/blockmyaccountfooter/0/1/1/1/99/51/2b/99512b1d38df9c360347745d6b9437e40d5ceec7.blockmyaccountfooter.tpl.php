<?php /*%%SmartyHeaderCode:47978294951e5acc0d6c100-80476205%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99512b1d38df9c360347745d6b9437e40d5ceec7' => 
    array (
      0 => '/var/www/prestashop.vehiclefits.com/html/themes/default/modules/blockmyaccountfooter/blockmyaccountfooter.tpl',
      1 => 1366914192,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47978294951e5acc0d6c100-80476205',
  'variables' => 
  array (
    'link' => 0,
    'returnAllowed' => 0,
    'voucherAllowed' => 0,
    'HOOK_BLOCK_MY_ACCOUNT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51e5acc0e17a30_68737028',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e5acc0e17a30_68737028')) {function content_51e5acc0e17a30_68737028($_smarty_tpl) {?>
<!-- Block myaccount module -->
<div class="block myaccount">
	<p class="title_block"><a href="http://prestashop.vehiclefits.com/index.php?controller=my-account" title="Manage my customer account" rel="nofollow">My account</a></p>
	<div class="block_content">
		<ul class="bullet">
			<li><a href="http://prestashop.vehiclefits.com/index.php?controller=history" title="My orders" rel="nofollow">My orders</a></li>
						<li><a href="http://prestashop.vehiclefits.com/index.php?controller=order-slip" title="My credit slips" rel="nofollow">My credit slips</a></li>
			<li><a href="http://prestashop.vehiclefits.com/index.php?controller=addresses" title="My addresses" rel="nofollow">My addresses</a></li>
			<li><a href="http://prestashop.vehiclefits.com/index.php?controller=identity" title="Manage my personal information" rel="nofollow">My personal info</a></li>
						
<li class="favoriteproducts">
	<a href="http://prestashop.vehiclefits.com/index.php?fc=module&amp;module=favoriteproducts&amp;controller=account" title="My favorite products.">
				My favorite products.
	</a>
</li>

		</ul>
		<p class="logout"><a href="http://prestashop.vehiclefits.com/index.php?mylogout" title="Sign out" rel="nofollow">Sign out</a></p>
	</div>
</div>
<!-- /Block myaccount module -->
<?php }} ?>