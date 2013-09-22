{*
* @author PresTeamShop.com
 * @copyright PresTeamShop.com - 2013
*}
{if isset($js_files)}
    {foreach from=$js_files item="file"}
        <script type="text/javascript" src="{$file}"></script>
    {/foreach}
{/if}

{capture name=path}{l s='Results' mod='filterproductspro'}{/capture}

<h2>    
    {l s='Results' mod='filterproductspro'}
    <span class="category-product-count">
    {if $nb_products == 0}
        {l s='There are no products.' mod='filterproductspro'}
    {else}
        {if isset($no_options_selected) && $no_options_selected}
            {l s='No filters selected' mod='filterproductspro'}&nbsp;-&nbsp;
        {/if}
        {if $nb_products == 1}{l s='There is' mod='filterproductspro'}{else}{l s='There are' mod='filterproductspro'}{/if}
        {$nb_products}
        {if $nb_products == 1}{l s='product.' mod='filterproductspro'}{else}{l s='products.' mod='filterproductspro'}{/if}
    {/if}
    </span>
</h2>

{if $products}
    <div id="result_filterproductspro">
        {if $theme_name == 'warehouse'}
            <div class="content_sortPagiBar">
        		<div class="sortPagiBar clearfix">        			
                    {if isset($comparator_max_item)}
                    {include file="$tpl_dir./product-compare.tpl"}
                    {/if}
                    {include file="$tpl_dir./product-sort.tpl"}
        			{include file="$tpl_dir./nbr-product-page.tpl"}
        		</div>
        	</div>
        	<div id="view_way" class="{if isset($warehouse_vars.product_view) && $warehouse_vars.product_view == 1}list_view{else} grid_view{/if}">
        	   {include file="$tpl_dir./product-list.tpl" products=$products}
        	</div>
        	
            {if isset($comparator_max_item)}
                {include file="$tpl_dir./product-compare.tpl"}
            {/if}
        	{include file="$tpl_dir./pagination.tpl"}
        {else}                        
            {if $FPP_IS_PS_15}
                <div class="content_sortPagiBar">
                    {include file="$tpl_dir./pagination.tpl"}
                    <div class="sortPagiBar clearfix">
                        {include file="$tpl_dir./product-sort.tpl"}
                        {if isset($comparator_max_item)}
                            {include file="$tpl_dir./product-compare.tpl"}
                        {/if}
                        {*include file="$tpl_dir./nbr-product-page.tpl"*}                        
                    </div>
                </div>
                
                {include file="$tpl_dir./product-list.tpl" products=$products}
                                
                <div class="content_sortPagiBar">                    
                    <div class="sortPagiBar clearfix">
                        {include file="$tpl_dir./product-sort.tpl"}
                        {if isset($comparator_max_item)}
                            {include file="$tpl_dir./product-compare.tpl"}
                        {/if}
                        {*include file="$tpl_dir./nbr-product-page.tpl"*}                        
                    </div>
                    {include file="$tpl_dir./pagination.tpl"}
                </div>
            {else}
                {if isset($comparator_max_item)}
                    {include file="$tpl_dir./product-compare.tpl"}
                {/if}
                {include file="$tpl_dir./product-sort.tpl"}
                {include file="$tpl_dir./product-list.tpl" products=$products}
                {if isset($comparator_max_item)}
                    {include file="$tpl_dir./product-compare.tpl"}
                {/if}
                {include file="$tpl_dir./pagination.tpl"}
            {/if}
        
            {if isset($compare_ajax)}
                <script>
                    $.each($('input:checkbox.comparator'), function(i, element) {ldelim}
                        $(element).click(function(){ldelim}
                            Compare.compareProduct($(this));
                        {rdelim});
                    {rdelim});
                    {if isset($compare_products) && is_array($compare_products) && count($compare_products)}
                        {foreach from=$compare_products item='compare_product'}
                            $('#comparator_item_{$compare_product}').attr('checked', 'checked');
                        {/foreach}
                    {/if}
                </script>
            {/if}
        {/if}
    </div>
{else}
    <p class="warning">{l s='Without results' mod='filterproductspro'}</p>
    <p class="warning">
        {l s='Not find the product you want? Tell us what product you need and we will help you.' mod='filterproductspro'}
        <br />
        <a href="{$base_dir_ssl}contact-form.php">{l s='Go to contact form, click here!' mod='filterproductspro'}</a>
    </p>
    <br />
    <ul class="back_tools">    	
    	<li>
            <a href="{$base_dir}"><img src="{$img_dir}icon/home.gif" alt="" class="icon" /></a>
            <a href="{$base_dir}">{l s='Home'}</a>
        </li>        
        <!--<li>
            <a href="{$cookie->fpp_url}"><img src="{$img_dir}icon/cancel_16x18" alt="" class="icon" /></a>
            <a href="{$cookie->fpp_url}">{l s='Back'}</a>
        </li>-->
    </ul>
{/if}