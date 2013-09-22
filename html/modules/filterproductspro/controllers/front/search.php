<?php

/**
 * @author PresTeamShop.com
 * @copyright PresTeamShop.com - 2013
 */

class filterproductsproSearchModuleFrontController extends ModuleFrontController 
{
    public $ssl = false;
	public $php_self = 'search';
    
    public $filterproductspro;

    public function init()
	{
        parent::init();        
        
        $this->filterproductspro = Module::getInstanceByName('filterproductspro');        
	}

    public function initContent()
	{  
        $this->filterproductspro->preSearchProducts();        
    }  
    
}

?>