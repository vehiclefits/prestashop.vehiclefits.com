<?php /* Smarty version Smarty-3.1.13, created on 2013-09-22 11:47:03
         compiled from "/var/www/prestashop.vehiclefits.com/html/modules/filterproductspro/filterproductspro_top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:430707809523f10f7dfd6e1-00016557%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ad2601b4470794237b6d78aa5f5e2c0e7d35649' => 
    array (
      0 => '/var/www/prestashop.vehiclefits.com/html/modules/filterproductspro/filterproductspro_top.tpl',
      1 => 1379094787,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '430707809523f10f7dfd6e1-00016557',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SEARCHERS' => 0,
    'searcher' => 0,
    'FILTERPRODUCTSPRO_IMG' => 0,
    'FPP_DISPLAY_BACK_BUTTON_FILTERS' => 0,
    'URL' => 0,
    'filter' => 0,
    'block_id_filter' => 0,
    'FPP_DISPLAY_EXPAND_BUTTON_OPTION' => 0,
    'column' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_523f10f7eef060_20713918',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_523f10f7eef060_20713918')) {function content_523f10f7eef060_20713918($_smarty_tpl) {?>
 <?php if (sizeof($_smarty_tpl->tpl_vars['SEARCHERS']->value)){?>
    </div>
    <div class="clear"></div>
    <div class="filterproductspro_seacher_top">
    <?php  $_smarty_tpl->tpl_vars['searcher'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['searcher']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SEARCHERS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['searcher']->key => $_smarty_tpl->tpl_vars['searcher']->value){
$_smarty_tpl->tpl_vars['searcher']->_loop = true;
?>
        <?php if (count($_smarty_tpl->tpl_vars['searcher']->value['filters'])!=0){?>
            <script>
                FilterProducts._options[<?php echo $_smarty_tpl->tpl_vars['searcher']->value['id_searcher'];?>
] = {
                    select: new Array(),
                    checkbox: new Array(),
                    radio: new Array(),
                    button: new Array()
                };            
            </script> 
            <input type="hidden" id="searcher_multi_option_<?php echo $_smarty_tpl->tpl_vars['searcher']->value['id_searcher'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['searcher']->value['multi_option'];?>
" />
            <div id="searcher_<?php echo $_smarty_tpl->tpl_vars['searcher']->value['id_searcher'];?>
" class="block filterproductspro_seacher">
                <h4>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['FILTERPRODUCTSPRO_IMG']->value;?>
bg_searcher_header.png"/>
                    <?php echo $_smarty_tpl->tpl_vars['searcher']->value['name'];?>

                    <span class="clear_filter clear_all_filters" title="<?php echo smartyTranslate(array('s'=>'Clear all filters','mod'=>'filterproductspro'),$_smarty_tpl);?>
">&nbsp;</span>
                </h4>
                <div class="block_content">
                    <?php if ($_smarty_tpl->tpl_vars['FPP_DISPLAY_BACK_BUTTON_FILTERS']->value){?>
                        <a class="back" href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
" title="<?php echo smartyTranslate(array('s'=>'Back','mod'=>'filterproductspro'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Back','mod'=>'filterproductspro'),$_smarty_tpl);?>
</a>
                        <div class="clear"></div>
                    <?php }?>
                    <?php  $_smarty_tpl->tpl_vars['filter'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['filter']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['searcher']->value['filters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['filter']->key => $_smarty_tpl->tpl_vars['filter']->value){
$_smarty_tpl->tpl_vars['filter']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['filter']->value['num_columns']>0){?>
                            <?php $_smarty_tpl->tpl_vars['block_id_filter'] = new Smarty_variable(("filter_").($_smarty_tpl->tpl_vars['filter']->value['id_filter']), null, 0);?>
                            <div id="<?php echo $_smarty_tpl->tpl_vars['block_id_filter']->value;?>
" class="filter_content">
                                <?php if ($_smarty_tpl->tpl_vars['filter']->value['num_columns']==1&&count($_smarty_tpl->tpl_vars['filter']->value['free_options'])>0){?>                        
                                    <div class="wrapper_name">
                                        <?php if ($_smarty_tpl->tpl_vars['FPP_DISPLAY_EXPAND_BUTTON_OPTION']->value){?>
                                            <span class="expand off" title="<?php echo smartyTranslate(array('s'=>'Expand/Collapse options','mod'=>'filterproductspro'),$_smarty_tpl);?>
"></span>
                                        <?php }?>
                                        <label class="filter_name"><?php echo $_smarty_tpl->tpl_vars['filter']->value['name'];?>
</label>
                                        <span name="<?php echo $_smarty_tpl->tpl_vars['block_id_filter']->value;?>
" class="clear_filter one_filter" title="<?php echo smartyTranslate(array('s'=>'Clear filter','mod'=>'filterproductspro'),$_smarty_tpl);?>
"></span>
                                    </div> 
                                    <?php $_smarty_tpl->tpl_vars['options'] = new Smarty_variable($_smarty_tpl->tpl_vars['filter']->value['free_options'], null, 0);?>
                                    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['FILTERPRODUCTSPRO_DIR_TPL']->value)."./controls.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                                <?php }elseif($_smarty_tpl->tpl_vars['filter']->value['num_columns']>1){?>
                                    <div class="wrapper_name">
                                        <?php if ($_smarty_tpl->tpl_vars['FPP_DISPLAY_EXPAND_BUTTON_OPTION']->value){?>
                                            <span class="expand off" title="<?php echo smartyTranslate(array('s'=>'Expand/Collapse options','mod'=>'filterproductspro'),$_smarty_tpl);?>
"></span>
                                        <?php }?>
                                        <label class="filter_name">&nbsp;<?php echo $_smarty_tpl->tpl_vars['filter']->value['name'];?>
</label>
                                        <span name="<?php echo $_smarty_tpl->tpl_vars['block_id_filter']->value;?>
" class="clear_filter one_filter" title="<?php echo smartyTranslate(array('s'=>'Clear filter','mod'=>'filterproductspro'),$_smarty_tpl);?>
"></span>
                                    </div>
                                    <table class="column_list">                        
                                        <tbody>
                                            <tr>
                                                <?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_smarty_tpl->tpl_vars['id_column'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['filter']->value['columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value){
$_smarty_tpl->tpl_vars['column']->_loop = true;
 $_smarty_tpl->tpl_vars['id_column']->value = $_smarty_tpl->tpl_vars['column']->key;
?>
                                                    <?php if (count($_smarty_tpl->tpl_vars['column']->value['options'])!=0){?>
                                                        <td>
                                                            <span class="value_column"><?php if ($_smarty_tpl->tpl_vars['column']->value['data']['value']!=''){?><?php echo $_smarty_tpl->tpl_vars['column']->value['data']['value'];?>
<?php }else{ ?>&nbsp;<?php }?></span>
                                                            <?php $_smarty_tpl->tpl_vars['options'] = new Smarty_variable($_smarty_tpl->tpl_vars['column']->value['options'], null, 0);?>
                                                            <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['FILTERPRODUCTSPRO_DIR_TPL']->value)."./controls.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                                                        </td>
                                                    <?php }?>
                                                <?php } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php }?>
                                <div class="clear"></div>
                            </div>
                        <?php }?>
                    <?php } ?>
                    <?php if (!$_smarty_tpl->tpl_vars['searcher']->value['instant_search']){?>
                        <div class="clear">&nbsp;</div>
                        <a class="button go_search" id="go_search_<?php echo $_smarty_tpl->tpl_vars['searcher']->value['id_searcher'];?>
" title="<?php echo smartyTranslate(array('s'=>'Search','mod'=>'filterproductspro'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Search','mod'=>'filterproductspro'),$_smarty_tpl);?>
</a>
                    <?php }?>
                </div>
            </div>
        <?php }?>
    <?php } ?>
<?php }?><?php }} ?>