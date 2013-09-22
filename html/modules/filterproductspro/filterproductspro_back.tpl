{*
 * @author PresTeamShop.com
 * @copyright PresTeamShop.com - 2013
 *}
 
<div id="div_filterproductspro" class="fpp">
    <script>
        var filterproductspro_dir = '{$paramsBack.FILTERPRODUCTSPRO_DIR}';
        var filterproductspro_img = '{$paramsBack.FILTERPRODUCTSPRO_IMG}';
        var id_language = Number({$paramsBack.DEFAULT_LENGUAGE});
        var id_default_language = Number({$paramsBack.DEFAULT_LENGUAGE});
        var GLOBALS = {$paramsBack.GLOBALS};    
        
        var home = "{l s='Home' mod='filterproductspro'}";
        var selectedLabel = "{l s='selected' mod='filterproductspro'}";
        
        var sort_asc = true;
        
        var languages = new Array();
        {foreach from=$paramsBack.LANGUAGES item=language name=f_languages}
                languages.push({$language.id_lang});
        {/foreach}
        var id_language = Number({$paramsBack.DEFAULT_LENGUAGE});
        
        //filter page
        var filter_page = {ldelim}{rdelim};
        {foreach from=$paramsBack.GLOBALS_SMARTY.FILTER_PAGE item='filter_page' key='key'}
            filter_page.{$key} = '{$filter_page}';
        {/foreach}
            
        var Msg = {literal}{{/literal}
            confirm_delete : "{l s='Are you sure you want delete' mod='filterproductspro'}",
            confirm_delete_custom_option : "{l s='Are you sure you want to delete this option? If you delete this option will lose all dependencies created.' mod='filterproductspro' js=1}",
            rocessing : "{l s='Processing' mod='filterproductspro'}",
            save : "{l s='Save' mod='filterproductspro'}",
            update : "{l s='Update' mod='filterproductspro'}",
            searcher_null : "{l s='Choose a searcher' mod='filterproductspro'}",
            filters_empty : "{l s='No filters to the searcher' mod='filterproductspro'}",
            edit : "{l s='Edit' mod='filterproductspro'}",
            del : "{l s='Delete' mod='filterproductspro'}",
            enabled : "{l s='Enable' mod='filterproductspro'}",
            disable : "{l s='Disable' mod='filterproductspro'}",
            is_loading : "{l s='is loading, please wait' mod='filterproductspro'}",
            is_deleting : "{l s='is being removed, please wait' mod='filterproductspro'}",
            is_updating : "{l s='is being updated, please wait' mod='filterproductspro'}",
            loading_options : "{l s='Loading options, please wait' mod='filterproductspro'}",
            options_empty : "{l s='No options to the filter' mod='filterproductspro'}",
            options_null : "{l s='Choose a filter' mod='filterproductspro'}",
            configure : "{l s='Configure' mod='filterproductspro'}",
            columns_none : "{l s='Drag and drop the options' mod='filterproductspro'}",
            columns_empty : "{l s='No avaible columns for the filter' mod='filterproductspro'}",
            without_results : "{l s='Without results' mod='filterproductspro'}",
            add : "{l s='Add' mod='filterproductspro'}",
            options_empty_reindex : "{l s='No options to the filter, please reindex' mod='filterproductspro'}",
            choose : "{l s='Choose...' mod='filterproductspro'}",
            choose_filter : "{l s='Choose a filter' mod='filterproductspro'}",
            choose_searcher : "{l s='Choose a searcher' mod='filterproductspro'}",
            options_children_empty : "{l s='No options for filter child' mod='filterproductspro'}",
            checked_all : "{l s='Check all' mod='filterproductspro'}",
            choose_option : "{l s='Choose a option' mod='filterproductspro'}",
            _undefined : "{l s='Undefined' mod='filterproductspro'}",
            and : "{l s='and' mod='filterproductspro'}",
            save_dependencies : "{l s='Want to save? The following options will lose all dependencies:' mod='filterproductspro'}",
            renindex_products : {literal}{{/literal}
                "off" : "{l s='Reindexing products...' mod='filterproductspro'}",
                "on" : "{l s='Reindex products' mod='filterproductspro'}"
            },
            reindex_options_by_filter: {literal}{{/literal}
                "off" : "{l s='Reindexing data...' mod='filterproductspro'}",
                "on" : "{l s='Reindex options for this filter' mod='filterproductspro'}"
            },
            save_dependency_filters: {literal}{{/literal}
                "off" : "{l s='Creating dependency...' mod='filterproductspro'}",
                "on" : "{l s='Save' mod='filterproductspro'}"
            },
            save_dependency_options: {literal}{{/literal}
                "off" : "{l s='Creating dependency...' mod='filterproductspro'}",
                "on" : "{l s='Save' mod='filterproductspro'}"
            },
            errors : {literal}{{/literal} 
                "invalid_public_name_searcher" : "{l s='You must enter a searcher public name in the default language of your store' mod='filterproductspro'}",
                "invalid_name_filter" : "{l s='You must enter a filter name in the default language of your store' mod='filterproductspro'}",
                "invalid_name_option" : "{l s='You must enter a filter name in the default language of your store' mod='filterproductspro'}",
                "empty_categories_selected" : "{l s='You must select at least one category' mod='filterproductspro'}"
            },
            image_loaded : "{l s='File loaded' mod='filterproductspro'}",
            allow_extensions : "{l s='It is only allowed extensions of files:' mod='filterproductspro'}",
            select_import_file : "{l s='Must choose a file' mod='filterproductspro'}",
            select_dependencies : "{l s='Select dependencies hierarchy' mod='filterproductspro'}",
            separators_equals : "{l s='Separators cannot be equals' mod='filterproductspro'}"
        };                                
    </script>
    
    {foreach from=$paramsBack.JS_FILES item="file"}
        <script type="text/javascript" src="{$file}"></script>
    {/foreach}
    {foreach from=$paramsBack.CSS_FILES item="file"}
        <link type="text/css" rel="stylesheet" href="{$file}"/>
    {/foreach}
    
    {if !$paramsBack.FPP_RM}
        <button type="button" id="display_form_register" onclick="$('#frm_register_product').toggle(500);">Register and validate your module!</button>    
        <div id="fpp_register_product">        
            <form id="frm_register_product" name="frm_register_product" method="post">
                <fieldset>
                    <legend>Register and validate</legend>
                    
                    <p style="font-weight: bold;">
                        Discover the latest updates and news about this module, free and easy registering from this short form.
                    </p>
                    
                    <table>
                        <tr>
                            <td>
                                <label>Email:</label>
                                <sup>*</sup>
                            </td>
                            <td>
                                <input type="text" id="txt_email" name="email" size="50"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Seller:</label>
                                <sup>*</sup>
                            </td>
                            <td>
                                <select id="lst_sellet" name="seller">
                                    <option value="">Choose...</option>                                
                                    <option value="presteamshop.com">PresTeamShop.com</option>
                                    <option value="prestashop.com">Addons PrestaShop</option>                                
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>&numero; Order:</label>
                                <sup>*</sup>
                            </td>
                            <td>
                                <input type="text" id="txt_number_order" name="number_order" />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="submit" id="btn_sent_register" name="sent_register">Sent</button> 
                            </td>
                        </tr>
                    </table>                
                    <table>
                        <tr>
                            <td>
                                <p style="font-weight: bold;">
                                    Do you already have your license number?
                                </p>
                            </td> 
                        </tr>
                        <tr>                     
                            <td>
                                <input type="text" id="txt_license_number" name="license_number" size="40"/>
                                <button type="submit" id="btn_validate_license" name="validate_license">Validate</button>
                            </td>
                        </tr>
                    </table>                             
                </fieldset>
            </form>                          
        </div>
    {/if}
    
    <form action="{$paramsBack.ACTION_URL}" method="post" class="std ui-helper-hidden" id="frmFilterProductsPro" >
        <div id="flags_for_columns" class="ui-helper-hidden">
            {*Flags para idiomas de columnas*}
            {section name="s_num_columns" start=$paramsBack.BETWEEN_COLUMNS.start loop=$paramsBack.BETWEEN_COLUMNS.end}
                <div id="languages_for_{$smarty.section.s_num_columns.index}">
                    {*$smarty.section.s_num_columns.index*}
                    {foreach from=$paramsBack.LANGUAGES item=language name=f_languages}  
                        <div id="column_value_{$smarty.section.s_num_columns.index}_{$language.id_lang}" style="display: {if $language.id_lang == $paramsBack.DEFAULT_LENGUAGE}block{else}none{/if};">
                            <input type="text" id="column_value_lang_{$smarty.section.s_num_columns.index}_{$language.id_lang}" name="column_value_lang_{$language.id_lang}" />
                        </div>                            
                    {/foreach}
                    {$paramsBack.HTML_COLUMNS_VALUE[$smarty.section.s_num_columns.index]}
                </div>
            {/section}
        </div>
        
        <div id="tabs">
            <ul>
                <li><a href="#tab_searcher">{l s='Searcher' mod='filterproductspro'}</a></li>
                <li><a href="#tab_filter_options">{l s='Filters & Options' mod='filterproductspro'}</a></li>             
                <li><a href="#tab_options_custom">{l s='Options Custom' mod='filterproductspro'}</a></li>   
                <li><a href="#tab_range_price">{l s='Range Price' mod='filterproductspro'}</a></li>   
                <li><a href="#tab_dependency_filters">{l s='Dependency of Filters' mod='filterproductspro'}</a></li>
                <li><a href="#tab_dependency_options">{l s='Dependency of Options' mod='filterproductspro'}</a></li>   
                <li><a href="#tab_tools">{l s='Tools' mod='filterproductspro'}</a></li>             
            </ul>
            
            {*Searcher*}
            <div id="tab_searcher">                
                <input id="id_searcher" type="hidden" />
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <span>{l s='Internal name' mod='filterproductspro'}</span>
                            </td>
                            <td>
                                <input type="text" id="internal_name" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>{l s='Public name' mod='filterproductspro'}</span>
                            </td>
                            <td>
                                {foreach from=$paramsBack.LANGUAGES item=language name=f_languages}  
                                    <div id="public_name_{$language.id_lang}" class="public_name_lang" style="display: {if $language.id_lang == $paramsBack.DEFAULT_LENGUAGE}block{else}none{/if}; float: left;">
                                        <input type="text" id="public_name_lang_{$language.id_lang}" name="public_name_lang_{$language.id_lang}" />
                                    </div>                            
                                {/foreach}
                                {$paramsBack.FLAGS_INTERNAL_NAME}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>{l s='Position' mod='filterproductspro'}</span>
                            </td>
                            <td>
                                <select id="position">
                                    {foreach from=$paramsBack.GLOBALS_SMARTY.POSITIONS item=position key=value}
                                        <option value="{$value}">{$position}</option>
                                    {/foreach}
                                </select>
                                <span>({l s='Hook' mod='filterproductspro'})</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>{l s='Show in page' mod='filterproductspro'}</span>
                            </td>
                            <td>
                                <select id="lst_filter_page" name="filter_page">
                                    {foreach from=$paramsBack.GLOBALS_SMARTY.FILTER_PAGE item='filter_page' key='value'}
                                        <option value="{$value}">{$filter_page}</option>
                                    {/foreach}
                                </select>
                                <span>{l s='Show and filter options by page.' mod='filterproductspro'}</span>
                            </td>
                        </tr>
                        <tr id="type_filter_page_container">
                            <td>
                                <span>{l s='Pages' mod='filterproductspro'}</span>
                            </td>
                            <td>
                                <select id="type_filter_page">                                    
                                    {foreach from=$paramsBack.GLOBALS_SMARTY.TYPE_FILTER_PAGE item=type key=value}
                                        <option value="{$value}">{$type}</option>
                                    {/foreach}
                                </select>
                                <input type="text" id="filter_pages" value="" />
                                <span>{l s='Enter the IDs separated by comma (,).' mod='filterproductspro'}&nbsp;Ex: 1,20,3,90</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>{l s='Instant search' mod='filterproductspro'}</span>
                            </td>
                            <td>
                                <input type="radio" name="instant_search" id="instant_search_on" value="1" />                                     
                                <label class="t" for="instant_search_on"> <img src="{$paramsBack.FILTERPRODUCTSPRO_IMG}enabled.gif" alt="{l s='Enabled' mod='filterproductspro'}" title="{l s='Enabled' mod='filterproductspro'}" /></label>
                                <input type="radio" name="instant_search" id="instant_search_off" value="0" checked />
                                <label class="t" for="instant_search_off"> <img src="{$paramsBack.FILTERPRODUCTSPRO_IMG}disabled.gif" alt="{l s='Disabled' mod='filterproductspro'}" title="{l s='Disabled' mod='filterproductspro'}" /></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>{l s='Multi-option' mod='filterproductspro'}</span>
                            </td>
                            <td>
                                <input type="radio" name="searcher_multi_option" id="searcher_multi_option_on" value="1" />                                     
                                <label class="t" for="searcher_multi_option_on"> <img src="{$paramsBack.FILTERPRODUCTSPRO_IMG}enabled.gif" alt="{l s='Enabled' mod='filterproductspro'}" title="{l s='Enabled' mod='filterproductspro'}" /></label>
                                <input type="radio" name="searcher_multi_option" id="searcher_multi_option_off" value="0" checked />
                                <label class="t" for="searcher_multi_option_off"> <img src="{$paramsBack.FILTERPRODUCTSPRO_IMG}disabled.gif" alt="{l s='Disabled' mod='filterproductspro'}" title="{l s='Disabled' mod='filterproductspro'}" /></label>
                                <span>{l s='Allow selection of multiple options in the filters.' mod='filterproductspro'}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>{l s='Active' mod='filterproductspro'}</span>
                            </td>
                            <td>
                                <input type="radio" name="searcher_active" id="searcher_active_on" value="1" checked />                                     
                                <label class="t" for="searcher_active_on"> <img src="{$paramsBack.FILTERPRODUCTSPRO_IMG}enabled.gif" alt="{l s='Enabled' mod='filterproductspro'}" title="{l s='Enabled' mod='filterproductspro'}" /></label>
                                <input type="radio" name="searcher_active" id="searcher_active_off" value="0" />
                                <label class="t" for="searcher_active_off"> <img src="{$paramsBack.FILTERPRODUCTSPRO_IMG}disabled.gif" alt="{l s='Disabled' mod='filterproductspro'}" title="{l s='Disabled' mod='filterproductspro'}" /></label>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" class="center">
                                <button type="button" id="save_searcher" class="button_save">{l s='Save' mod='filterproductspro'}</button>
                                <button type="button" id="clear_searcher" class="button_clean">{l s='Clear' mod='filterproductspro'}</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <br />
                <div id="div_loading_searcher"></div>            
                <br />
                <table id="searchers_list" class="dataTable">
                    <thead>
                        <tr>
                            <th>{l s='ID Searcher' mod='filterproductspro'}</th>
                            <th>{l s='Internal name' mod='filterproductspro'}</th>
                            <th>{l s='Public name' mod='filterproductspro'}</th>
                            <th>{l s='Position' mod='filterproductspro'}</th>
                            <th>{l s='Instant search' mod='filterproductspro'}</th>
                            <th>{l s='Show in page' mod='filterproductspro'}</th>
                            <th>{l s='Multi-option' mod='filterproductspro'}</th>
                            <th>{l s='Active' mod='filterproductspro'}</th>
                            <th>{l s='Actions' mod='filterproductspro'}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach from=$paramsBack.SEARCHERS item=searcher name=f_searchers}
                            <tr>
                                <td>{$searcher.id_searcher}</td>
                                <td>{$searcher.internal_name}</td>
                                <td>{$searcher.name}</td>
                                <td>{$searcher.position}</td>
                                <td>
                                    {if $searcher.instant_search}
                                        <img src="{$paramsBack.FILTERPRODUCTSPRO_IMG}enabled.gif" alt="{l s='Enabled' mod='filterproductspro'}" title="{l s='Enabled' mod='filterproductspro'}" />
                                    {else}
                                        <img src="{$paramsBack.FILTERPRODUCTSPRO_IMG}disabled.gif" alt="{l s='Disabled' mod='filterproductspro'}" title="{l s='Disabled' mod='filterproductspro'}" />
                                    {/if}
                                </td>
                                <td>{$paramsBack.GLOBALS_SMARTY.FILTER_PAGE[$searcher.filter_page]}</td>
                                <td>
                                    {if $searcher.multi_option}
                                        <img src="{$paramsBack.FILTERPRODUCTSPRO_IMG}enabled.gif" alt="{l s='Enabled' mod='filterproductspro'}" title="{l s='Enabled' mod='filterproductspro'}" />
                                    {else}
                                        <img src="{$paramsBack.FILTERPRODUCTSPRO_IMG}disabled.gif" alt="{l s='Disabled' mod='filterproductspro'}" title="{l s='Disabled' mod='filterproductspro'}" />
                                    {/if}
                                </td>
                                <td>
                                    {if $searcher.active}
                                        <img src="{$paramsBack.FILTERPRODUCTSPRO_IMG}enabled.gif" alt="{l s='Enabled' mod='filterproductspro'}" title="{l s='Enabled' mod='filterproductspro'}" />
                                    {else}
                                        <img src="{$paramsBack.FILTERPRODUCTSPRO_IMG}disabled.gif" alt="{l s='Disabled' mod='filterproductspro'}" title="{l s='Disabled' mod='filterproductspro'}" />
                                    {/if}
                                </td>
                                <td class="actions">
                                    <img id="edit_{$searcher.id_searcher}" onclick="Searcher.editSearcher({$searcher.id_searcher})" src="{$paramsBack.FILTERPRODUCTSPRO_IMG}edit.png" title="{l s='Edit' mod='filterproductspro'}" />
                                    <img id="delete_{$searcher.id_searcher}" onclick="Searcher.deleteSearcher({$searcher.id_searcher})" src="{$paramsBack.FILTERPRODUCTSPRO_IMG}delete.png" title="{l s='Delete' mod='filterproductspro'}" />
                                </td>
                            </tr>
                        {/foreach}
                    </tbody>
                    <tfoot>
                        {if $smarty.foreach.f_searchers.iteration eq 0}
                            <tr>
                                <td colspan="9">
                                    {l s='Without results to show' mod='filterproductspro'}
                                </td>
                            </tr>
                        {/if}
                    </tfoot>
                </table>
            </div>
                                    
            {*Filters and Options*}                        
            <div id="tab_filter_options">
                <input id="id_filter" type="hidden" />
                <input id="id_filter_sort" type="hidden" />
                <div>
                    <table id="form_filter">
                        <tbody>
                            <tr>
                                <td>
                                    <span>{l s='Searcher' mod='filterproductspro'}</span>
                                </td>
                                <td colspan="3">
                                    <select id="searchers">
                                        <option value="">{l s='Choose a searcher' mod='filterproductspro'}</option>
                                        {foreach from=$paramsBack.SEARCHERS item=searcher name=f_searchers}
                                            <option value="{$searcher.id_searcher}">{$searcher.internal_name}</option>
                                        {/foreach}
                                    </select>
                                    <button type="button" id="add_filter" title="{l s='Show/Hide creation panel' mod='filterproductspro'}">{l s='Add a filter' mod='filterproductspro'}</button>
                                </td>
                            </tr>
                            <tr class="internal_name_container">
                                <td>
                                    <span>{l s='Internal name' mod='filterproductspro'}</span>
                                </td>
                                <td colspan="3">
                                    <input type="text" id="txt_filter_internal_name" name="filter_internal_name" >
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>{l s='Name' mod='filterproductspro'}</span>
                                </td>
                                <td colspan="3">
                                    {foreach from=$paramsBack.LANGUAGES item=language name=f_languages}  
                                        <div id="filter_name_{$language.id_lang}" class="filter_name_lang" style="display: {if $language.id_lang == $paramsBack.DEFAULT_LENGUAGE}block{else}none{/if}; float: left;">
                                            <input type="text" id="filter_name_lang_{$language.id_lang}" name="filter_name_lang_{$language.id_lang}" />
                                        </div>                            
                                    {/foreach}
                                    {$paramsBack.FLAGS_FILTER_NAME}
                                </td>
                            </tr>                            
                            <tr id="tr_criterions">
                                <td>
                                    <span>{l s='Criterion' mod='filterproductspro'}</span>
                                </td>
                                <td>
                                    <select id="criterions">
                                        {foreach from=$paramsBack.GLOBALS_SMARTY.CRITERIONS item=criterion key=value}
                                            <option value="{$value}">{$criterion}</option>
                                        {/foreach}
                                    </select>
                                </td>
                                <td class="category">
                                    <span>{l s='Include subcategories in the search' mod='filterproductspro'}</span>
                                </td>
                                <td class="category">
                                    <input type="radio" name="include_subcategories_search" id="include_subcategories_search_on" value="1" />                                     
                                    <label class="t" for="include_subcategories_search_on"> <img src="{$paramsBack.FILTERPRODUCTSPRO_IMG}enabled.gif" alt="{l s='Enabled' mod='filterproductspro'}" title="{l s='Enabled' mod='filterproductspro'}" /></label>
                                    <input type="radio" name="include_subcategories_search" id="include_subcategories_search_off" value="0" checked />
                                    <label class="t" for="include_subcategories_search_off"> <img src="{$paramsBack.FILTERPRODUCTSPRO_IMG}disabled.gif" alt="{l s='Disabled' mod='filterproductspro'}" title="{l s='Disabled' mod='filterproductspro'}" /></label>
                                </td>
                                <td class="feature">
                                    <span>{l s='Feature' mod='filterproductspro'}</span>
                                </td>
                                <td class="feature">
                                    <select id="features">
                                        {foreach from=$paramsBack.FEATURES item=feature}
                                            <option value="{$feature.id_feature}">{$feature.name}</option>
                                        {/foreach}
                                    </select>
                                </td>
                                <td class="attribute_group">
                                    <span>{l s='Attribute group' mod='filterproductspro'}</span>
                                </td>
                                <td class="attribute_group">
                                    <select id="attributes_group">
                                        {foreach from=$paramsBack.ATTRIBUTES_GROUP item=attr}
                                            <option value="{$attr.id_attribute_group}">{$attr.public_name}</option>
                                        {/foreach}
                                    </select>
                                </td>
                                <td class="custom">
                                    <span>{l s='Use engine prestashop search ' mod='filterproductspro'}</span>
                                </td>
                                <td class="custom">
                                    <input type="radio" name="use_engine_ps_search" id="use_engine_ps_search_on" value="1" />                                     
                                    <label class="t" for="use_engine_ps_search_on"> <img src="{$paramsBack.FILTERPRODUCTSPRO_IMG}enabled.gif" alt="{l s='Enabled' mod='filterproductspro'}" title="{l s='Enabled' mod='filterproductspro'}" /></label>
                                    <input type="radio" name="use_engine_ps_search" id="use_engine_ps_search_off" value="0" checked />
                                    <label class="t" for="use_engine_ps_search_off"> <img src="{$paramsBack.FILTERPRODUCTSPRO_IMG}disabled.gif" alt="{l s='Disabled' mod='filterproductspro'}" title="{l s='Disabled' mod='filterproductspro'}" /></label>
                                </td>
                            </tr>
                            <tr id="tr_clone_filter_custom">
                                <td>
                                    <span>{l s='Clone options of filter' mod='filterproductspro'}</span>
                                </td>
                                <td>
                                    <select id="clone_filter_custom">
                                        <option selected="true" value="">{l s='No clone...' mod='filterproductspro'}</option>
                                        {foreach from=$paramsBack.FILTERS_CUSTOM item="filter"}
                                            <option value="{$filter.id_filter}">{$filter.name}</option>
                                        {/foreach}
                                    </select>
                                </td>
                            </tr>
                            <tr id="tr_types">
                                <td>
                                    <span>{l s='Type' mod='filterproductspro'}</span>
                                </td>
                                <td>
                                    <select id="types">
                                        {foreach from=$paramsBack.GLOBALS_SMARTY.TYPES item=type key=value}
                                            <option value="{$value}">{$type}</option>
                                        {/foreach}
                                    </select>
                                </td>
                            </tr>
                            <tr id="tr_num_columns">
                                <td>
                                    <span>{l s='Num Columns' mod='filterproductspro'}</span>
                                </td>
                                <td colspan="3">
                                    <select id="num_columns">
                                        {section name="s_num_columns" start=$paramsBack.BETWEEN_COLUMNS.start loop=$paramsBack.BETWEEN_COLUMNS.end}
                                            <option value="{$smarty.section.s_num_columns.index}">{$smarty.section.s_num_columns.index}</option>
                                        {/section}
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="center">
                                    <button type="button" id="save_filter" class="button_save">{l s='Save' mod='filterproductspro'}</button>
                                    <button type="button" id="clear_filter" class="button_clean">{l s='Clear' mod='filterproductspro'}</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <div id="data_list" class="list">
                        <span>{l s='Preview options' mod='filterproductspro'}</span>
                        <div class="content">
                            {l s='Without results' mod='filterproductspro'}
                        </div>
                    </div>
                    <div class="ui-helper-clearfix"></div>
                    <div id="div_categories_treeview" class="list">
                        <span>{l s='Select categories' mod='filterproductspro'}</span>
                        <div class="toolbar">
                            <a href="#" id="collapse_all" title="{l s='Collapse All' mod='filterproductspro'}" >{l s='Collapse All' mod='filterproductspro'}</a>
                            - <a href="#" id="expand_all" title="{l s='Expand All' mod='filterproductspro'}" >{l s='Expand All' mod='filterproductspro'}</a>			
                            - <a href="#" id="check_all" title="{l s='Check All' mod='filterproductspro'}">{l s='Check All' mod='filterproductspro'}</a>
                            - <a href="#" id="uncheck_all" title="{l s='Uncheck All' mod='filterproductspro'}" >{l s='Uncheck All' mod='filterproductspro'}</a>
                        </div>
                        <div class="content">
                            <ul id="categories-treeview" class="filetree">                            
                            </ul>
                        </div>
                    </div>
                    <br />
                    <div id="div_loading_filter"></div>
                    <br />
                    <div id="filters_list" class="list">
                        <span>{l s='Filters' mod='filterproductspro'}</span>
                        <div class="content">
                            {l s='Choose a searcher' mod='filterproductspro'}
                        </div>
                    </div>
                    <div id="options_list" class="list">
                        <span>{l s='Options' mod='filterproductspro'}</span>
                        <ul class="sortable" style="float: right;">
                            <li>
                                <span id='sort_options_filter' title="{l s='Sort' mod='filterproductspro'}" class="ui-icon ui-icon-carat-2-n-s tools ui-corner-all"></span>
                            </li>
                        </ul>
                        <div class="content">
                            {l s='Choose a filter' mod='filterproductspro'}
                        </div>
                        <div class="msg_info">
                            <i>{l s='Remember that options are not results, will not be displayed in the search' mod='filterproductspro'}</i>
                        </div>
                    </div>
                    <div class="ui-helper-clearfix"></div>
                    <br />
                    <div id="columns_list" class="list">
                        <span>{l s='Columns' mod='filterproductspro'}</span>
                        <div class="content">
                            {l s='Drag and drop the options' mod='filterproductspro'}
                        </div>
                    </div><br />
                    <div id="div_loading_options_column"></div>
                    <div class="ui-helper-clearfix"></div>
                </div>    
                <br>
            </div>
                        
            {*Tools*}
            <div id="tab_tools">
                <fieldset>
                    <legend>{l s='Reindexing' mod='filterproductspro'}</legend>
                    <button id="reindex_categories" type="button" class="button_refresh">{l s='Reindex data for all categories' mod='filterproductspro'}</button>
                    <button id="renindex_products" type="button" class="button_refresh">{l s='Reindex products' mod='filterproductspro'}</button>
                    <br/><br/>
                    {l s='Automate the task of re index the categories and products for optimal results in the search.' mod='filterproductspro'}
                    <br />
                    {l s='Fix cron job daily, weekly, biweekly, depending on how you add or modify categories and products.' mod='filterproductspro'}
                    <br/>Url CRON:&nbsp;<b>{$paramsBack.FILTERPRODUCTSPRO_DIR_FULL}cron_filterproductspro.php</b>
                </fieldset>  
                <br />
                <fieldset class="cnf">
                    <legend>{l s='Settings' mod='filterproductspro'}</legend>
                    <input type="checkbox" id="show_button_back_filters" {if $paramsBack.FPP_DISPLAY_BACK_BUTTON_FILTERS}checked="true"{/if} />
                    <label for="show_button_back_filters">{l s='Show button "back" in the searchers' mod='filterproductspro'}</label>
                    <br />
                    <input type="checkbox" id="show_button_expand_options" {if $paramsBack.FPP_DISPLAY_EXPAND_BUTTON_OPTION}checked="true"{/if} />
                    <label for="show_button_expand_options">{l s='Show button to expand/collapse options' mod='filterproductspro'}</label>
                    <br />
                    <input type="checkbox" id="show_only_products_stock" {if $paramsBack.FPP_ONLY_PRODUCTS_STOCK}checked="true"{/if} />
                    <label for="show_only_products_stock">{l s='Only show products in stock' mod='filterproductspro'}</label>
                    <br />
                    <label for="id_content_results">{l s='ID of the container html show the results (Change only if necessary)' mod='filterproductspro'}</label>
                    <input type="text" id="id_content_results" value="{$paramsBack.FPP_ID_CONTENT_RESULTS}"/>                    
                    <br />
                    <br />
                    <button id="save_configuration" type="button">{l s='Save' mod='filterproductspro'}</button>
                </fieldset>
                <br />
                <fieldset id="import_searcher">
                    <legend>{l s='Import' mod='filterproductspro'}</legend>
                    <div class="floatr">
                        <a href="{$paramsBack.FILTERPRODUCTSPRO_DIR}import/example_year_make_model.csv" target="_blank">{l s='Download example with prestashop engine searcher'}</a>
                        <br />
                        <a href="{$paramsBack.FILTERPRODUCTSPRO_DIR}import/example_year_make_model_products.csv" target="_blank">{l s='Download example with allocation manually  products'}</a>
                    </div>
                    <table>
                        <tr>
                            <td>
                                <span>{l s='Select searcher' mod='filterproductspro'}</span>
                            </td>
                            <td>
                                <select id="lst_searcher" name="lst_searcher">
                                    <option value="0">{l s='New searcher' mod='filterproductspro'}</option>
                                    {foreach from=$paramsBack.SEARCHERS item=searcher}
                                        <option value="{$searcher.id_searcher}">{$searcher.internal_name}</option>
                                    {/foreach}
                                </select>
                            </td>
                        </tr>
                        <tr class="searcher_name_container">
                            <td>
                                <span>{l s='Searcher internal name' mod='filterproductspro'}</span>
                            </td>
                            <td>
                                <input type="text" id="import_internal_name" />
                            </td>
                        </tr>
                        <tr class="searcher_name_container">
                            <td>
                                <span>{l s='Searcher public name' mod='filterproductspro'}</span>
                            </td>
                            <td>
                                {foreach from=$paramsBack.LANGUAGES item=language name=f_languages}  
                                    <div id="import_public_name_{$language.id_lang}" class="import_public_name_lang" style="display: {if $language.id_lang == $paramsBack.DEFAULT_LENGUAGE}block{else}none{/if}; float: left;">
                                        <input type="text" id="import_public_name_lang_{$language.id_lang}" name="import_public_name_lang_{$language.id_lang}" />
                                    </div>                            
                                {/foreach}
                                {$paramsBack.FLAGS_IMPORT_INTERNAL_NAME}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>{l s='Separator' mod='filterproductspro'}</span>
                            </td>
                            <td>
                                <input type="text" id="import_separator" value=";" size="2" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>{l s='CSV File to import' mod='filterproductspro'}</span>
                            </td>
                            <td>
                                <button id="upload_csv" class="button">{l s='Upload' mod='filterproductspro'}</button>
                                <div id="file_loaded"></div>
                            </td>
                        </tr>
                        <tr class="searcher_name_container">
                            <td>
                                <span>{l s='Create dependency' mod='filterproductspro'}</span>
                            </td>
                            <td>
                                <input type="radio" name="create_dependency" id="create_dependency_on" value="1" />                                     
                                <label class="t" for="create_dependency_on"> <img src="{$paramsBack.FILTERPRODUCTSPRO_IMG}enabled.gif" alt="{l s='Enabled' mod='filterproductspro'}" title="{l s='Enabled' mod='filterproductspro'}" /></label>
                                <input type="radio" name="create_dependency" id="create_dependency_off" value="0" checked />
                                <label class="t" for="create_dependency_off"> <img src="{$paramsBack.FILTERPRODUCTSPRO_IMG}disabled.gif" alt="{l s='Disabled' mod='filterproductspro'}" title="{l s='Disabled' mod='filterproductspro'}" /></label>
                            </td>
                        </tr>
                        <tr class="load_create_dependency_container">
                            <td>&nbsp;</td>
                            <td>
                                <div id="load_create_dependency"></div>
                            </td>
                        </tr>
                        <tr class="contain_ids_container">
                            <td>
                                <span>{l s='Contains products ids' mod='filterproductspro'}</span>
                            </td>
                            <td>
                                <input type="radio" name="contain_ids" id="contain_ids_on" value="1" />                                     
                                <label class="t" for="contain_ids_on"> <img src="{$paramsBack.FILTERPRODUCTSPRO_IMG}enabled.gif" alt="{l s='Enabled' mod='filterproductspro'}" title="{l s='Enabled' mod='filterproductspro'}" /></label>
                                <input type="radio" name="contain_ids" id="conain_ids_off" value="0" checked />
                                <label class="t" for="contain_ids_off"> <img src="{$paramsBack.FILTERPRODUCTSPRO_IMG}disabled.gif" alt="{l s='Disabled' mod='filterproductspro'}" title="{l s='Disabled' mod='filterproductspro'}" /></label>
                            </td>
                        </tr>
                        <tr class="product_ids_separator_container">
                            <td>
                                <span>{l s='Product ids separator' mod='filterproductspro'}</span>
                            </td>
                            <td>
                                <input type="text" id="import_product_separator" value="," size="2" />
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <button id="btn_import_searcher" type="button">{l s='Import' mod='filterproductspro'}</button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" id="loading_import"></td>
                        </tr>
                    </table>
                </fieldset>
                <br />
                <div id="div_loading_tools"></div>
            </div>
                
            {*Dependency Of Filters *}
            <div id="tab_dependency_filters">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <span>{l s='Searcher' mod='filterproductspro'}</span>
                            </td>
                            <td>
                                <select id="searchers_dependency_filters">
                                    <option value="">{l s='Choose a searcher' mod='filterproductspro'}</option>
                                    {foreach from=$paramsBack.SEARCHERS item=searcher name=f_searchers}
                                        <option value="{$searcher.id_searcher}">{$searcher.internal_name}</option>
                                    {/foreach}
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br />
                <div id="div_loading_dependency_filters"></div>
                <div id="dependencies_filters" class="list">
                    <span>{l s='Dependencies' mod='filterproductspro'}</span>
                    <div class="content">
                        <div class="block">
                            
                        </div>
                        <span class="msg">{l s='Choose a searcher' mod='filterproductspro'}</span>
                    </div>
                </div>
                <br/>
                <button type="button" id="save_dependency_filters">{l s="Save"  mod='filterproductspro'}</button>
            </div>
            
            {*Dependency Of Options *}
            <div id="tab_dependency_options">
                <input type="hidden" id="dependency_options-is_parent" value="0" />
                <input type="hidden" id="dependency_options-page" value="0" />
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <span>{l s='Searcher' mod='filterproductspro'}</span>
                            </td>
                            <td>
                                <select id="searchers_dependency_options">
                                    <option value="">{l s='Choose a searcher' mod='filterproductspro'}</option>
                                    {foreach from=$paramsBack.SEARCHERS item=searcher name=f_searchers}
                                        <option value="{$searcher.id_searcher}">{$searcher.internal_name}</option>
                                    {/foreach}
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>{l s='Filter' mod='filterproductspro'}</span>
                            </td>
                            <td>
                                <select id="filters_dependency_options">
                                    <option value="">{l s='Choose a filter' mod='filterproductspro'}</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br />
                <div id="div_loading_dependency_options"></div>
                <div id="dependency_options-pagination"></div><div class="clear"></div>
                <div id="dependencies_options" class="list">                    
                    <span>{l s='Dependencies' mod='filterproductspro'}</span>
                    <div class="content">
                        {l s='Choose a searcher' mod='filterproductspro'}
                    </div>                    
                </div>
                <br />
                <button type="button" id="save_dependency_options" class="button_save">{l s="Save"  mod='filterproductspro'}</button>
            </div>
            
            {*Options Custom*}
            <div id="tab_options_custom">
                <input type="hidden" id="options_custom-page" value="0" />
                <input type="hidden" id="id_custom_option" value="" />
                <input type="hidden" id="id_custom_option_criterion" value="" />
                <input type="hidden" id="options_custom_id_product" value="" />
                <input type="hidden" id="options_custom_product_name" value="" />
                <input type="hidden" id="id_element_custom_option" value="" />
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <span>{l s='Searcher' mod='filterproductspro'}</span>
                            </td>
                            <td>
                                <select id="searchers_options_custom">
                                    <option value="">{l s='Choose a searcher' mod='filterproductspro'}</option>
                                    {foreach from=$paramsBack.SEARCHERS item=searcher name=f_searchers}
                                        <option value="{$searcher.id_searcher}">{$searcher.internal_name}</option>
                                    {/foreach}
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>{l s='Filter' mod='filterproductspro'}</span>
                            </td>
                            <td>
                                <select id="filters_options_custom">
                                    <option value="">{l s='Choose a filter' mod='filterproductspro'}</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>{l s='Option name' mod='filterproductspro'}</span>
                            </td>
                            <td>
                                {foreach from=$paramsBack.LANGUAGES item=language name=f_languages}  
                                    <div id="option_custom_name_{$language.id_lang}" class="option_custom_name_lang" style="display: {if $language.id_lang == $paramsBack.DEFAULT_LENGUAGE}block{else}none{/if}; float: left;">
                                        <input type="text" id="option_custom_name_lang_{$language.id_lang}" name="option_custom_name_lang_{$language.id_lang}" />
                                    </div>                            
                                {/foreach}
                                {$paramsBack.FLAGS_OPTION_CUSTOM_NAME}
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">
                                <button type="button" id="save_option_custom" class="button_save">{l s='Save' mod='filterproductspro'}</button>
                                <button type="button" id="clear_custom_option" class="button_clean">{l s='Clear' mod='filterproductspro'}</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <br />
                <div id="div_loading_options_custom"></div>
                <div id="options_custom-filter-container"></div>
                <div id="options_custom-pagination"></div>
                <div class="clear"></div>
                <div id="options_custom" class="list">
                    <span>{l s='Options' mod='filterproductspro'}</span>
                    <div class="content">
                        {l s='Choose a searcher' mod='filterproductspro'}
                    </div>                    
                </div>
                <div id="options_custom_products" class="list">
                    <span>{l s='Products' mod='filterproductspro'}</span>
                    <div id="options_custom_products_searcher">
                        <input type="text" id="options_custom_product" autocomplete="off" />
                        {*<button type="button" id="options_custom_add_product" title="{l s='Add' mod='filterproductspro'}">&nbsp;</button>*}
                    </div>
                    <div class="content">
                        {l s='Choose a option' mod='filterproductspro'}
                    </div>                    
                </div>
                <div class="ui-helper-clearfix"></div>
            </div>
                    
            {*Range Price*}
            <div id="tab_range_price">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <span>{l s='Condition' mod='filterproductspro'}</span>
                            </td>
                            <td>
                                <select id="conditions">
                                    <option value="">{l s='Choose a condition' mod='filterproductspro'}</option>
                                    {foreach from=$paramsBack.GLOBALS_SMARTY.CONDITIONS_RANGE_PRICE item=condition key=value}
                                        <option value="{$value}">{$condition}</option>
                                    {/foreach}
                                </select>
                            </td>
                        </tr>
                        <tr class="range_price_first_value">
                            <td>
                                <span>1<sup>{l s='st' mod='filterproductspro'}</sup>&nbsp;{l s='value' mod='filterproductspro'}</span>
                            </td>
                            <td>
                                <input type="text" id="first_value" />
                            </td>
                        </tr>
                        <tr class="range_price_second_value">
                            <td>
                                <span>2<sup>{l s='nd' mod='filterproductspro'}</sup>&nbsp;{l s='value' mod='filterproductspro'}</span>
                            </td>
                            <td>
                                <input type="text" id="second_value" />
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">
                                <button type="button" id="save_range_price" class="button_save">{l s='Save' mod='filterproductspro'}</button>
                                <button type="button" id="clear_range_price" class="button_clean">{l s='Clear' mod='filterproductspro'}</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <br />
                <p class="bold">{l s='Note: The prices should be set to the default currency. The filter only works with the default currency.' mod='filterproductspro'}</p>
                <br />
                <div id="div_loading_range_price"></div>
                <table id="ranges_price_list" class="dataTable">
                    <thead>
                        <tr>
                            <th>{l s='Condition' mod='filterproductspro'}</th>
                            <th>1<sup>{l s='st' mod='filterproductspro'}</sup>&nbsp;{l s='value' mod='filterproductspro'}</th>
                            <th>2<sup>{l s='nd' mod='filterproductspro'}</sup>&nbsp;{l s='value' mod='filterproductspro'}</th>
                            <th>{l s='Actions' mod='filterproductspro'}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach from=$paramsBack.RANGES_PRICE item=range_price name=f_ranges_price}
                            {assign var=data value=","|@explode:$range_price.value}    
                            {assign var=_data value=$data[0]}                             
                            <tr>                                
                                <td>{if isset($paramsBack.GLOBALS_SMARTY.CONDITIONS_RANGE_PRICE[$_data])}{$paramsBack.GLOBALS_SMARTY.CONDITIONS_RANGE_PRICE[$_data]}{else}{l s='Undefined' mod='filterproductspro'}{/if}</td>
                                <td>{if isset($data[1])}{$data[1]}{/if}</td>
                                <td>{if isset($data[2])}{$data[2]}{/if}</td>
                                <td class="actions">
                                    <img id="delete_range_price_{$range_price.id_option_criterion}" onclick="RangePrice.deleteRangePrice({$range_price.id_option_criterion})" src="{$paramsBack.FILTERPRODUCTSPRO_IMG}delete.png" title="{l s='Delete' mod='filterproductspro'}" />
                                </td>
                            </tr>
                        {/foreach}
                    </tbody>
                    <tfoot {if $smarty.foreach.f_ranges_price.iteration gt 0}class="ui-helper-hidden"{/if}>                        
                        <tr>
                            <td colspan="6">
                                {l s='Without results to show' mod='filterproductspro'}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </form>
    
    <br class="clear"/>    
    
    <fieldset id="fpp_content_credits">
        <legend>
            <a href="http://www.presteamshop.com" target="_blank">Developed by: PresTeamShop</a>
        </legend>
                
        <div>
            <a style="text-decoration: underline; color: blue" target="_blank" href="{$paramsBack.FILTERPRODUCTSPRO_DIR}user_guide_es.pdf">User guide module(Spanish)</span></a>
            &nbsp;&nbsp;&nbsp;
            <a style="text-decoration: underline; color: blue" target="_blank" href="{$paramsBack.FILTERPRODUCTSPRO_DIR}user_guide_en.pdf">User guide module(English)</span></a>            
        </div>
        
        <br />
        
        <table style="float: left;">
            <tr>
                <td colspan="2">
                    <b>Development of templates, modules and custom modifications.</b><br /><br />
                </td>
            </tr>                    
            <tr>
                <td><b>Information:</b></td>
                <td>info@presteamshop.com</td>
            </tr>
            <tr>
                <td><b>Support:</b></td>
                <td>support@presteamshop.com</td>
            </tr>
            <tr>
                <td><b>Web site &amp; Store:</b></td>
                <td><a style="text-decoration: underline" href="http://www.presteamshop.com" target="_blank">www.presteamshop.com</a></td>
            </tr>
        </table>
        
        <div style="float: right; margin-top: -30px;">
            <a href="http://www.presteamshop.com" target="_blank">
                <img src="{$module_dir}img/presteamshop.png"/>                     
            </a>
            <br /><br />
            <a style="text-decoration: underline" href="http://www.presteamshop.com/contact-form.php" target="_blank">
                <b>Suggestions, bugs or problems to report here!</b>
            </a>  
        </div>                                               
     </fieldset>
</div>