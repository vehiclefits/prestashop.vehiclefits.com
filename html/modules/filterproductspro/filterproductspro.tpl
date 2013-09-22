{*
 * @author PresTeamShop.com
 * @copyright PresTeamShop.com - 2012
 *}

{foreach from=$SEARCHERS item=searcher}
    <script>
        FilterProducts._options[{$searcher.id_searcher}] = {ldelim}
            select: new Array(),
            checkbox: new Array(),
            radio: new Array(),
            button: new Array()
        {rdelim};
    </script>
    {if $searcher.filters|@count neq 0}
        <input type="hidden" id="searcher_multi_option_{$searcher.id_searcher}" value="{$searcher.multi_option}" />
        <div id="searcher_{$searcher.id_searcher}" class="block filterproductspro_seacher">
            <h4>
                <img src="{$FILTERPRODUCTSPRO_IMG}bg_searcher_header.png"/>
                {$searcher.name}
                <span class="clear_filter clear_all_filters" title="{l s='Clear all filters' mod='filterproductspro'}">&nbsp;{*l s='Clear all' mod='filterproductspro'*}</span>
            </h4>
            <div class="block_content">
                {if $FPP_DISPLAY_BACK_BUTTON_FILTERS}
                    <a class="back" href="{$URL}" title="{l s='Back' mod='filterproductspro'}">{l s='Back' mod='filterproductspro'}</a>
                    <div class="clear"></div>
                {/if}
                
                {foreach from=$searcher.filters item=filter}
                    {if $filter.num_columns gt 0}
                        {assign var=block_id_filter value="filter_"|cat:$filter.id_filter}
                        <div id="{$block_id_filter}" class="filter_content">
                            {if isset($OPTIONS_FILTER_HIDE[$filter.id_filter])}
                                {assign var=options_filter_hide value=$OPTIONS_FILTER_HIDE[$filter.id_filter]}
                            {else}
                                {assign var=options_filter_hide value=FALSE}
                            {/if}
                            {if $filter.num_columns eq 1 && $filter.free_options|@count gt 0}
                                <div class="wrapper_name">
                                    {if $FPP_DISPLAY_EXPAND_BUTTON_OPTION}
                                        <span class="expand off" title="{l s='Expand/Collapse options' mod='filterproductspro'}"></span>
                                    {/if}
                                    <label class="filter_name">{$filter.name}</label>
                                    <span name="{$block_id_filter}" class="clear_filter one_filter" title="{l s='Clear filter' mod='filterproductspro'}"></span>
                                </div> 
                                {assign var=options value=$filter.free_options}
                                {include file="$FILTERPRODUCTSPRO_DIR_TPL./controls.tpl"}
                            {elseif $filter.num_columns gt 1}
                                <div class="wrapper_name">
                                    {if $FPP_DISPLAY_EXPAND_BUTTON_OPTION}
                                        <span class="expand off" title="{l s='Expand/Collapse options' mod='filterproductspro'}"></span>
                                    {/if}
                                    <label class="filter_name">&nbsp;{$filter.name}</label>
                                    <span name="{$block_id_filter}" class="clear_filter one_filter" title="{l s='Clear filter' mod='filterproductspro'}"></span>
                                </div>
                                <table class="column_list">                        
                                    <tbody>
                                        <tr>
                                            {foreach from=$filter.columns key=id_column item=column name=f_columns}
                                                {if $column.options|count neq 0}
                                                    <td>
                                                        <span class="value_column">{if $column.data.value neq ''}{$column.data.value}{else}&nbsp;{/if}</span>
                                                        {assign var=options value=$column.options}                                                        
                                                        {include file="$FILTERPRODUCTSPRO_DIR_TPL./controls.tpl"}
                                                    </td>
                                                {/if}
                                            {/foreach}
                                        </tr>
                                    </tbody>
                                </table>
                            {elseif $filter.criterion eq 'Sq'}
                                <div class="wrapper_name">
                                    {if $FPP_DISPLAY_EXPAND_BUTTON_OPTION}
                                        <span class="expand off" title="{l s='Expand/Collapse options' mod='filterproductspro'}"></span>
                                    {/if}
                                    <label class="filter_name">{$filter.name}</label>
                                    <span name="{$block_id_filter}" class="clear_filter one_filter" title="{l s='Clear filter' mod='filterproductspro'}"></span>
                                </div> 
                                <input type="text" value="" name="fpp_search_query" id="txt_fpp_search_query" class="search_query ac_input" autocomplete="off">
                            {/if}
                            <div class="clear"></div>
                        </div>
                    {/if}
                {/foreach}
                {if !$searcher.instant_search}
                    <a class="button go_search" id="go_search_{$searcher.id_searcher}" title="{l s='Search' mod='filterproductspro'}">{l s='Search' mod='filterproductspro'}</a>
                {/if}
            </div>
        </div>
    {/if}
{/foreach}