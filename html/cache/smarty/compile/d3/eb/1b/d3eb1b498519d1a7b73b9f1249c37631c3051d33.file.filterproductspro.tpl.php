<?php /* Smarty version Smarty-3.1.13, created on 2013-09-22 11:47:04
         compiled from "/var/www/prestashop.vehiclefits.com/html/modules/filterproductspro/filterproductspro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1666927632523f10f8479077-07133705%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3eb1b498519d1a7b73b9f1249c37631c3051d33' => 
    array (
      0 => '/var/www/prestashop.vehiclefits.com/html/modules/filterproductspro/filterproductspro.tpl',
      1 => 1379094787,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1666927632523f10f8479077-07133705',
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
    'OPTIONS_FILTER_HIDE' => 0,
    'FPP_DISPLAY_EXPAND_BUTTON_OPTION' => 0,
    'column' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_523f10f85c3370_90559511',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_523f10f85c3370_90559511')) {function content_523f10f85c3370_90559511($_smarty_tpl) {?>

<?php  $_smarty_tpl->tpl_vars['searcher'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['searcher']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SEARCHERS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['searcher']->key => $_smarty_tpl->tpl_vars['searcher']->value){
$_smarty_tpl->tpl_vars['searcher']->_loop = true;
?>
    <script>
        FilterProducts._options[<?php echo $_smarty_tpl->tpl_vars['searcher']->value['id_searcher'];?>
] = {
            select: new Array(),
            checkbox: new Array(),
            radio: new Array(),
            button: new Array()
        };
    </script>
    <?php if (count($_smarty_tpl->tpl_vars['searcher']->value['filters'])!=0){?>
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
                            <?php if (isset($_smarty_tpl->tpl_vars['OPTIONS_FILTER_HIDE']->value[$_smarty_tpl->tpl_vars['filter']->value['id_filter']])){?>
                                <?php $_smarty_tpl->tpl_vars['options_filter_hide'] = new Smarty_variable($_smarty_tpl->tpl_vars['OPTIONS_FILTER_HIDE']->value[$_smarty_tpl->tpl_vars['filter']->value['id_filter']], null, 0);?>
                            <?php }else{ ?>
                                <?php $_smarty_tpl->tpl_vars['options_filter_hide'] = new Smarty_variable(false, null, 0);?>
                            <?php }?>
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
                            <?php }elseif($_smarty_tpl->tpl_vars['filter']->value['criterion']=='Sq'){?>
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
                                <input type="text" value="" name="fpp_search_query" id="txt_fpp_search_query" class="search_query ac_input" autocomplete="off">
                            <?php }?>
                            <div class="clear"></div>
                        </div>
                    <?php }?>
                <?php } ?>
                <?php if (!$_smarty_tpl->tpl_vars['searcher']->value['instant_search']){?>
                    <a class="button go_search" id="go_search_<?php echo $_smarty_tpl->tpl_vars['searcher']->value['id_searcher'];?>
" title="<?php echo smartyTranslate(array('s'=>'Search','mod'=>'filterproductspro'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Search','mod'=>'filterproductspro'),$_smarty_tpl);?>
</a>
                <?php }?>
            </div>
        </div>
    <?php }?>
<?php } ?><?php }} ?>