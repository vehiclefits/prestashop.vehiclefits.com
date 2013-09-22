<?php

/**
 * @author PresTeamShop.com
 * @copyright PresTeamShop.com - 2012
 */

class OptionClass extends ObjectModel {
    public $id;
    public $id_filter;
    public $position;
    public $active;
    public $id_option_criterion;
    protected $table = 'fpp_option';
    protected $identifier = 'id_option';
    protected $tables = array('fpp_option');
    protected $fieldsRequired = array('id_filter', 'position');
    protected $fieldsValidate = array();
    protected $fieldsRequiredLang = array();
    protected $fieldsSizeLang = array();
    protected $fieldsValidateLang = array();
    
    /**
	 * @see ObjectModel::$definition
	 */
	public static $definition;
	
	public	function __construct($id = null, $id_lang = null, $id_shop = null)
	{		        
        if(version_compare(_PS_VERSION_, '1.5') >= 0){                        
            self::$definition = array(
        		'table' => 'fpp_option',
        		'primary' => 'id_option',
        		'multilang' => false,
        		'multilang_shop' => false,
        		'fields' => array(
        			'id_filter' =>          array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'required' => true),
        		    'position' => 	        array('type' => self::TYPE_INT, 'required' => true),
                    'active' => 	        array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),
                    'id_option_criterion' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'required' => false)
        		)
        	);
            
            parent::__construct($id, $id_lang, $id_shop);
        }else{
            parent::__construct($id, $id_lang);
        }
	}
    
    public function getFields() {
        parent::validateFields();
        if (isset($this->id))
            $fields['id_option'] = (int) ($this->id);
        $fields['id_filter'] = (int) ($this->id_filter);
        $fields['position'] = $this->position;
        $fields['active'] = $this->active;
        $fields['id_option_criterion'] = (int) ($this->id_option_criterion);
        return $fields;
    }
    
    public static function getOptionListByFilter($id_lang, $id_filter, $active = NULL, $count = false){
        $active = is_null($active) ? -999999 : (int)$active;

        $where_options = '';
        $filter_by_options = array();
        if (Tools::isSubmit('filter_by_options')) {
            $filter_by_options = implode(',', Tools::getValue('filter_by_options'));                
            $where_options = ' AND o.id_option IN (' . $filter_by_options . ') ';
        }
        
        if ($count)
            return Db::getInstance()->getValue("
                SELECT
                    count(o.id_option)
                FROM 
                    " . _DB_PREFIX_ . "fpp_option AS o,
                    " . _DB_PREFIX_ . "fpp_option_criterion_lang AS ocl
                WHERE
                    o.id_option_criterion = ocl.id_option_criterion
                    AND o.id_filter = " . (int)$id_filter . "
                    AND ocl.id_lang = " . (int)$id_lang . $where_options . "
                    AND (o.active = " . (is_null($active) ? 'active' : $active) . " OR " . $active ."= -999999) 
            ");        
        
        $limit = 40;
        $page = Tools::getValue('page', 0);
        $star = ($page == 0 ? 0 : $page * $limit);          
                                   
        return Db::getInstance()->ExecuteS("
            SELECT
                o.*,
                ocl.value
            FROM 
                " . _DB_PREFIX_ . "fpp_option AS o,
                " . _DB_PREFIX_ . "fpp_option_criterion_lang AS ocl
            WHERE
                o.id_option_criterion = ocl.id_option_criterion
                AND o.id_filter = " . (int)$id_filter . "
                AND ocl.id_lang = " . (int)$id_lang . $where_options . "
                AND (o.active = " . (is_null($active) ? 'active' : $active) . " OR " . $active ."= -999999)
            ORDER BY
                o.position
            " . (isset($_POST['page']) ? "LIMIT ". $star .", ". $limit : "" ) . "
        ");
    }
        
    public static function getOptionListByFilterDependency($id_lang, $id_filter, $active = NULL, $count = false, $show_option_without_dependency = false) {
        $where_options = '';
        $filter_by_options = array();
        if (Tools::isSubmit('filter_by_options')) {
            //$filter_by_options = implode(',', Tools::getValue('filter_by_options'));
            $filter_by_options = Tools::getValue('filter_by_options');
            if (count($filter_by_options) == 1)
                $_filter_by_options = implode(',', Tools::getValue('filter_by_options')) . ',';
            else 
                $_filter_by_options = implode(',', Tools::getValue('filter_by_options'));
                
            $where_options = ' AND ids_option LIKE \'' . $_filter_by_options . '%\' ';
        }
        $active = is_null($active) ? -999999 : (int)$active;
        
        $FilterClass = new FilterClass($id_filter);
        
        $options = array();
        if (Validate::isLoadedObject($FilterClass)){
                        
            if ($count)
                return Db::getInstance()->getValue("
                            SELECT 
                                count(*) 
                            FROM 
                                " . _DB_PREFIX_ . "fpp_dependency_option 
                            WHERE 
                                id_filter = " . (int)$id_filter . $where_options);
            
            $limit = 40;
            $page = Tools::getValue('page', 0);
            $star = ($page == 0 ? 0 : $page * $limit); 
                                
            //anadimos las opciones que no tienen dependencias, para que puedan ser borradas luego.
            //-------------------------------------------------------------------------------------
            if ($page == 0 && $show_option_without_dependency){
                $ids_options = array();
                $dependency_options = Db::getInstance()->ExecuteS("
                    SELECT 
                        * 
                    FROM 
                        " . _DB_PREFIX_ . "fpp_dependency_option 
                    WHERE 
                        id_filter = " . (int)$id_filter);
                
                foreach($dependency_options AS $dependency_option){
                    $ids_option = $dependency_option['ids_option'];
                    $arr_ids_option = explode(',', $ids_option);
                    
                    array_push($ids_options, (int)$arr_ids_option[$FilterClass->level_depth]);
                }
                
                if (is_array($ids_options) /*&& count($ids_options)*/) {
                          
                        $query_options_without_dependency = 'SELECT ' .
                                'o.*, ' .
                                'ocl.value ' .
                            'FROM ' .
                                _DB_PREFIX_ . 'fpp_option AS o, ' .
                                _DB_PREFIX_ . 'fpp_option_criterion_lang AS ocl ' .
                            'WHERE ' .
                                'o.id_option_criterion = ocl.id_option_criterion ' .
                                'AND ocl.id_lang = ' . (int)$id_lang . ' ';
                    
                            if (Tools::isSubmit('filter_by_options'))
                                 $query_options_without_dependency .= 'AND o.id_option = ' . end($filter_by_options) . ' ';
                            else if (count($ids_options))
                                 $query_options_without_dependency .= 'AND o.id_option NOT IN (' . implode(',', $ids_options) . ') ';
                               
                            $query_options_without_dependency .= 'AND o.id_filter = ' . (int)$id_filter . ' ' .
                            'AND (o.active = ' . (is_null($active) ? 'active' : $active) . ' OR ' . $active . ' = -999999)';
                    
                    $options_without_dependency = Db::getInstance()->ExecuteS($query_options_without_dependency);
                    
                    if (is_array($options_without_dependency))
                        foreach($options_without_dependency AS $option){
                            array_push($options, $option);
                        }
                }
                    
            }
            //-------------------------------------------------------------------------------------                                            
        
            $dependency_options = Db::getInstance()->ExecuteS("
                SELECT 
                    * 
                FROM 
                    " . _DB_PREFIX_ . "fpp_dependency_option 
                WHERE 
                    id_filter = " . (int)$id_filter . $where_options . "
                ORDER BY
                    ids_option
                " . (isset($_POST['page']) ? "LIMIT ". $star .", ". $limit : "" ));
                    
            $i = sizeof($options);
            
            foreach($dependency_options AS $dependency_option){                
                $ids_option = $dependency_option['ids_option'];
                $arr_ids_option = explode(',', $ids_option);
                $str_dependency = '';
                
                $x=0;
                foreach($arr_ids_option AS $id_option){
                    $value_option = Db::getInstance()->getValue("
                        SELECT
                            ocl.value
                        FROM 
                            " . _DB_PREFIX_ . "fpp_option AS o,
                            " . _DB_PREFIX_ . "fpp_option_criterion_lang AS ocl
                        WHERE
                            o.id_option_criterion = ocl.id_option_criterion                        
                            AND ocl.id_lang = " . (int)$id_lang . "
                            AND o.id_option = " . $id_option . "
                            AND (o.active = " . (is_null($active) ? 'active' : $active) . " OR " . $active ."= -999999) 
                    ");
                    
                    if ($x <= $FilterClass->level_depth){
                        if (!empty($str_dependency))
                            $str_dependency .= ' > ';
                        
                        $str_dependency .= $value_option;
                    }
                    
                    $x++;
                }
                
                $_option = Db::getInstance()->getRow("
                    SELECT
                        o.*,
                        ocl.value
                    FROM 
                        " . _DB_PREFIX_ . "fpp_option AS o,
                        " . _DB_PREFIX_ . "fpp_option_criterion_lang AS ocl
                    WHERE
                        o.id_option_criterion = ocl.id_option_criterion                        
                        AND ocl.id_lang = " . (int)$id_lang . "
                        AND o.id_option = " . (int)$arr_ids_option[$FilterClass->level_depth] . "
                        AND (o.active = " . (is_null($active) ? 'active' : $active) . " OR " . $active ."= -999999) 
                ");
                if ($_option){
                    $options[$i] = $_option;
                    $options[$i]['id_dependency_option'] = $dependency_option['id_dependency_option'];
                    $options[$i]['ids_dependency'] = $ids_option;
                    $options[$i]['str_dependency'] = $str_dependency;
                }
                
                $i++;  
                
            }                        
        }
        
        if (Tools::isSubmit('filter_by_options')) {
            $ids_options = array();
            foreach ($options as $key => $_option) {
                if (!isset($_option['id_dependency_option']) || in_array($_option['id_option'], $ids_options))
                    unset($options[$key]);
                else
                    $ids_options[] = $_option['id_option'];
            }
        }
                
        return $options;
    }

    public static function getOptionListByFilterAndCheckIndexProducts($id_lang, $id_filter, $active = NULL, $check_index_product = TRUE){
        global $FilterProducts;
        $active = is_null($active) ? -999999 : (int)$active;
                                                                      
        return Db::getInstance()->ExecuteS("
            SELECT
                o.*,
                ocl.value
            FROM 
                " . _DB_PREFIX_ . "fpp_option AS o,
                " . _DB_PREFIX_ . "fpp_option_criterion_lang AS ocl
            WHERE
                o.id_option_criterion = ocl.id_option_criterion
                AND o.id_filter = " . (int)$id_filter . "
                AND ocl.id_lang = " . (int)$id_lang . "
                AND (o.active = " . (is_null($active) ? 'active' : $active) . " OR " . $active ."= -999999)                
                AND o.id_option " . (!$check_index_product ? "NOT" : "" ) . " IN (
                    SELECT DISTINCT(id_option) FROM " . _DB_PREFIX_ . "fpp_index_product
                    " . (!$check_index_product ? "" : "
                        UNION
			SELECT id_option 
			FROM 
                            " . _DB_PREFIX_ . "fpp_filter AS f,
                            " . _DB_PREFIX_ . "fpp_option AS o
			WHERE
                            o.id_filter = f.id_filter
                            AND f.id_filter = " . (int)$id_filter . "
                            AND f.criterion = '" . $FilterProducts->Criterions->Custom . "'") . "
                )    
            ORDER BY
                o.position
        ");
    }
    
    public static function getOptionById($id_lang, $id_option, $active = NULL){
        $active = is_null($active) ? -999999 : (int)$active;
        
        return Db::getInstance()->ExecuteS("
            SELECT
                o.*,
                ocl.value
            FROM 
                " . _DB_PREFIX_ . "fpp_option AS o,
                " . _DB_PREFIX_ . "fpp_option_criterion_lang AS ocl
            WHERE
                o.id_option_criterion = ocl.id_option_criterion
                AND ocl.id_lang = " . (int)$id_lang . "
                AND o.id_option = " . (int)$id_option . "
                AND (o.active = " . (is_null($active) ? 'active' : $active) . " OR " . $active ."= -999999)
        ");
    }
    
    public static function getColorByOption($id_option){
        global $FilterProducts;
        $color = NULL;
        
        $option = Db::getInstance()->ExecuteS("
            SELECT
                a.color
            FROM
                " . _DB_PREFIX_ . "fpp_option AS o,
                " . _DB_PREFIX_ . "fpp_option_criterion AS oc,
                " . _DB_PREFIX_ . "attribute_group AS ag,
                " . _DB_PREFIX_ . "attribute AS a
            WHERE
                oc.id_option_criterion = o.id_option_criterion
                AND ag.id_attribute_group = oc.level_depth
                AND a.id_attribute = oc.id_table
                AND a.id_attribute_group = ag.id_attribute_group
                AND ag.is_color_group = TRUE
                AND oc.criterion = '" . $FilterProducts->Criterions->Attribute . "'
                AND o.id_option = " . (int)$id_option . "
        ");
                
        if($option)
            $color = (isset($option[0]['color']) && !empty($option[0]['color'])) ? $option[0]['color'] : $color;
        
        return $color;
    }

    public static function deleteOptionsByIdOptionCriterion($id_option_criterion){
        $options = Db::getInstance()->ExecuteS("
            SELECT
                *
            FROM 
                " . _DB_PREFIX_ . "fpp_option
            WHERE
                id_option_criterion = " . $id_option_criterion ."
        ");
        
        foreach ($options as $option) {
            if(!Db::getInstance()->Execute("
                DELETE FROM " . _DB_PREFIX_ . "fpp_index_product
                WHERE
                    id_option = " . $option['id_option'] ."
            "))
                return FALSE;
        }
        
        return Db::getInstance()->Execute("
            DELETE FROM " . _DB_PREFIX_ . "fpp_option
            WHERE
                id_option_criterion = " . $id_option_criterion ."
        ");
    }
    
    public static function getOptionsByIdOptionCriterion($id_option_criterion){
        return Db::getInstance()->ExecuteS("
            SELECT
                *
            FROM 
                " . _DB_PREFIX_ . "fpp_option
            WHERE
                id_option_criterion = " . $id_option_criterion ."
        ");
    }
    
    public static function getOptionsByIdOptionCriterionAndFilter($id_option_criterion, $id_filter){
        return Db::getInstance()->ExecuteS("
            SELECT
                *
            FROM 
                " . _DB_PREFIX_ . "fpp_option
            WHERE
                id_option_criterion = " . $id_option_criterion ."
                AND id_filter = " . $id_filter . "
        ");
    }
    
    public static function getIdsProductsFromIndexByOptions($options, $id_searcher, $search_query, $id_lang){
        global $FilterProducts;
        
        $products = array();
        
        //buscar productos de la caja de texto
        $ids_product_search_query = array();
        if (!empty($search_query)) {
            $search_query = Tools::replaceAccentedChars(urldecode($search_query));
            $searchResults = Search::find($id_lang, $search_query, 1, 9999999, 'position', 'desc', true);
            foreach ($searchResults as $_result) 
                $ids_product_search_query[] = $_result['id_product'];
        }
        
        $_options_ps = Db::getInstance()->ExecuteS("
            SELECT
                o.id_option
            FROM
                " . _DB_PREFIX_ . "fpp_option AS o,
                " . _DB_PREFIX_ . "fpp_searcher AS s,
                " . _DB_PREFIX_ . "fpp_filter AS f
            WHERE
                s.id_searcher = f.id_searcher
                AND f.id_filter = o.id_filter
                AND f.criterion = '" . $FilterProducts->Criterions->Custom . "'
                AND s.id_searcher = " . $id_searcher . "
                AND f.search_ps = TRUE
        ");
        
        foreach ($_options_ps AS $_option_ps) {
            if (in_array($_option_ps['id_option'], $options))
                unset($options[array_search ($_option_ps['id_option'], $options)]);
        }
        
        if (!sizeof($options) && sizeof($ids_product_search_query))
            return $ids_product_search_query;
        else if (!sizeof($options) && !sizeof($ids_product_search_query))
            return array();
        
        //TRAE TODAS LAS OPCIONES PERSONALIZADAS.
        //------------------------------------------------------------------------------------
        $options_custom_availables = array();

        $_options_custom_availables = Db::getInstance()->ExecuteS("
            SELECT
                o.id_option
            FROM
                " . _DB_PREFIX_ . "fpp_option AS o,
                " . _DB_PREFIX_ . "fpp_searcher AS s,
                " . _DB_PREFIX_ . "fpp_filter AS f
            WHERE
                s.id_searcher = f.id_searcher
                AND f.id_filter = o.id_filter
                AND f.criterion = '" . $FilterProducts->Criterions->Custom . "'
                AND s.id_searcher = " . $id_searcher . "
                AND f.search_ps = FALSE
        ");
        
        foreach ($_options_custom_availables as $option) {
            array_push($options_custom_availables, $option['id_option']);
        }
        //------------------------------------------------------------------------------------  
        $options_custom = array();
        
        //Eliminar de las opciones enviadas aquellas que sean customizadas de las opciones enviadas y asigna un nuevo arreglo con solo las personalizadas.
        foreach($options as $it => $option){
            if(in_array($option, $options_custom_availables)){
                array_push($options_custom, $option);
                
                unset($options[$it]);
            }
        }
        
        $_products_normal = array();
        
        $count_options = 0;
        foreach ($options as $id_option) {
            $option_object = new OptionClass($id_option);
            $filter_object = new FilterClass($option_object->id_filter);
            if ($filter_object->criterion != $FilterProducts->Criterions->Custom || ($filter_object->criterion == $FilterProducts->Criterions->Custom && !$filter_object->search_ps)) 
                $count_options++;
        }
        
        //check multi_option
        $having = '';
        $where = '';
        $mo_filters = array();
        $searcher = new SearcherClass($id_searcher);
        if (!$searcher->multi_option) {
            $having = 'HAVING COUNT( * ) = ' . $count_options;
            if (sizeof($ids_product_search_query)) {
                $ids_product_search_query = join(',', $ids_product_search_query);
                $where = ' AND id_product IN (' . $ids_product_search_query . ')';
            }
        } else {
            //buscar la cantidad de filtros de las opciones para hacer que coincidan en todas
            foreach ($options as $mo_id_option) {
                $mo_id_filter = FilterClass::getIdFilterByOption($mo_id_option);
                if (!isset($mo_filters[$mo_id_filter]))
                    $mo_filters[$mo_id_filter] = array();

                if (!in_array($mo_id_option, $mo_filters[$mo_id_filter])) 
                    $mo_filters[$mo_id_filter][] = $mo_id_option;

            }
        }
                
        if (sizeof($options)) 
            //si hay mas de un filtro
            if (count($mo_filters) > 1) {
                $mo_final = array();
                foreach ($mo_filters as $mo_filter) {
                    if (is_array($mo_filter)) {
                        $new_final = array();
                        foreach ($mo_filter as $mo_option) {
                            if (count($mo_final)) {
                                foreach($mo_final as $_mo_final) {
                                    $_options = array();
                                    
                                    if (is_array($_mo_final))
                                        $_options = $_mo_final;
                                    else
                                        $_options[] = $_mo_final;
                                    
                                    $_options[] = $mo_option;
                                    $new_final[] = $_options;
                                }
                            } else {
                                $new_final[] = $mo_option;
                            }
                        }
                        $mo_final = $new_final;
                    }
                }
                if (count($mo_final)) {
                    foreach ($mo_final as $_options) {
                        
                        $having = 'HAVING COUNT( * ) = ' . count($_options);
                        
                        $query_mo_product = 'SELECT id_product ' .
                            'FROM ' .
                                _DB_PREFIX_ . 'fpp_filter AS f, ' .
                                _DB_PREFIX_ . 'fpp_index_product AS ip ' .
                            'WHERE ' .
                                'f.id_filter = ip.id_filter ' .
                                'AND f.search_ps = FALSE ' .
                                'AND f.criterion != "' . $FilterProducts->Criterions->Custom . '" ' .
                                'AND ip.id_option IN(' . implode(',', $_options) .') ' . $where . ' ' .
                            'GROUP BY id_product ' . $having;
                        
                        $_mo_product_normal = Db::getInstance()->ExecuteS($query_mo_product);
                        
                        foreach ($_mo_product_normal as $_mo_product) {
                            $_products_normal[] = $_mo_product;
                        }
                    }
                }
            } else {
                $_products_normal = Db::getInstance()->ExecuteS("
                    SELECT
                        id_product
                    FROM 
                        " . _DB_PREFIX_ . "fpp_filter AS f,
                        " . _DB_PREFIX_ . "fpp_index_product AS ip
                    WHERE 
                        f.id_filter = ip.id_filter                            
                        AND f.search_ps = FALSE
                        AND f.criterion <> '" . $FilterProducts->Criterions->Custom . "'
                        AND ip.id_option IN(" . implode(',', $options) .") " . $where . "
                    GROUP BY id_product
                    " . $having
                );
            }
        
        $_products_custom = array();
        if (sizeof($options_custom)) {
            if ($searcher->multi_option) {
                $_products_custom = Db::getInstance()->ExecuteS("
                    SELECT 
                        id_product
                    FROM
                        " . _DB_PREFIX_ . "fpp_index_product AS ip
                        LEFT JOIN " . _DB_PREFIX_ . "fpp_dependency_option AS do ON ip.id_dependency_option = do.id_dependency_option
                    WHERE                    
                        ip.id_option IN (" . implode(',', $options_custom) . ")
                ");
            } else {
                //consulta para cuando se tienen dependencias.
                $_products_custom = Db::getInstance()->ExecuteS("
                    SELECT 
                        id_product
                    FROM
                        " . _DB_PREFIX_ . "fpp_index_product AS ip
                        INNER JOIN " . _DB_PREFIX_ . "fpp_dependency_option AS do ON ip.id_dependency_option = do.id_dependency_option
                    WHERE                    
                        do.ids_option = '" . implode(',', $options_custom) . "'
                ");
                
                //si no encuentra productos anteriormente, se hace la consulta suponiendo que no tienen dependencias.
                if(!count($_products_custom)){
                    foreach ($options_custom as $option_custom) {
                        $query_option_custom = 'SELECT id_product ' .
                            'FROM ' . _DB_PREFIX_ . 'fpp_index_product AS ip ' .                                
                            'WHERE ' .
                                'ip.id_option = ' . $option_custom;
                        $_products_custom[] = Db::getInstance()->executeS($query_option_custom);
                    }
                    
                    //comprobar que no se repitan
                    $products_option_custom = array();
                    foreach ($_products_custom as $_product_custom) {
                        $aux = array();
                        foreach($_product_custom as $_pc) {
                            $aux[] = $_pc['id_product'];
                        }
                        $products_option_custom[] = $aux;
                    }
                    
                    $total_ids_products_custom = array();
                    foreach ($products_option_custom as $_ids_products_custom) {
                        if (!count($total_ids_products_custom)) {
                            $total_ids_products_custom = $_ids_products_custom;
                            continue;
                        } 
                        else
                            $total_ids_products_custom = array_intersect($_ids_products_custom, $total_ids_products_custom);
                    }
                    
                    $_products_custom = array();
                    foreach ($total_ids_products_custom as $id_product_custom) 
                        $_products_custom[] = array('id_product' => $id_product_custom);
                }
            }
        }
                                        
        if ($_products_normal && $_products_custom) {
            //productos normales y custom
            foreach($_products_normal AS $product_normal) {
                foreach($_products_custom AS $product_custom) {
                    if ($product_custom['id_product'] == $product_normal['id_product'])
                        array_push($products, $product_normal['id_product']);
                }
            }
        } else if ($_products_normal && !$_products_custom) {
            //productos normales
            foreach($_products_normal AS $product_normal) {
                array_push($products, $product_normal['id_product']);                
            }
        } else if (!$_products_normal && $_products_custom) {
            //productos custom        
            foreach($_products_custom AS $product_custom) {
                array_push($products, $product_custom['id_product']);                
            }
        }
        
        //Si hay opciones de busqueda por caja de texto y es multiopcion, entonces se mezclan, si no es multiopcion entonces se toman...
        //...las opciones que se repitan en ambos arrays
        if (sizeof($ids_product_search_query) > 0) 
            if ($searcher->multi_option)
                $products = array_merge($products, $ids_product_search_query);
            else 
                if (sizeof($products) > 0) 
                    $products = array_intersect($products, $ids_product_search_query);
            
        return $products;
    }
    
    public static function getUnavailableOptionsByOptions($options, $id_searcher, $id_filter = ''){ 
        global $FilterProducts;
        
        $first_option = 0;
        if (count($options))
            $first_option = $options[0];
        //TRAE TODAS LAS OPCIONES PERSONALIZADAS.
        //------------------------------------------------------------------------------------
        $options_custom_availables = array();

        $_options_custom_availables = Db::getInstance()->ExecuteS("
            SELECT
                o.id_option
            FROM
                " . _DB_PREFIX_ . "fpp_option AS o,
                " . _DB_PREFIX_ . "fpp_searcher AS s,
                " . _DB_PREFIX_ . "fpp_filter AS f
            WHERE
                s.id_searcher = f.id_searcher
                AND f.id_filter = o.id_filter
                AND f.criterion = '" . $FilterProducts->Criterions->Custom . "'
                AND s.id_searcher = " . $id_searcher . "
        ");
                
        foreach ($_options_custom_availables as $option) {
            array_push($options_custom_availables, $option['id_option']);
        }
        //------------------------------------------------------------------------------------  
        
        //Eliminar de las opciones enviadas aquellas que sean customizadas, sin productos y cuyo filtro no busque en el motor de PS
        foreach($options as $it => $option){
            if(in_array($option, $options_custom_availables))
                unset($options[$it]);
        }
   
        //Quitar las opciones personalizadas que usan PS de la lista de las 'no disponibles'
        $_options_custom_availables_ps = Db::getInstance()->ExecuteS("
            SELECT
                o.id_option
            FROM
                " . _DB_PREFIX_ . "fpp_option AS o,
                " . _DB_PREFIX_ . "fpp_searcher AS s,
                " . _DB_PREFIX_ . "fpp_filter AS f
            WHERE
                s.id_searcher = f.id_searcher
                AND f.id_filter = o.id_filter
                AND f.criterion = '" . $FilterProducts->Criterions->Custom . "'
                AND s.id_searcher = " . $id_searcher . "
                AND f.search_ps = TRUE
        ");
                
        $options_custom_availables_ps = array();
        foreach ($_options_custom_availables_ps as $_option_ps) {
            array_push($options_custom_availables_ps, $_option_ps['id_option']);
        }
        
        //Obtiene los productos del filtro ya sea categoria, fabricante o proveedor y lo coloca en la consulta que trae las opciones,
        //para que solo devuelva las opciones segun los productos de la pagina en donde esta ubicado el cliente.
        //-----------------------------------------------------------------------
        $ids_products = array();
        $searcher = new SearcherClass($id_searcher);
        
        if(Validate::isLoadedObject($searcher) && ($searcher->filter_page == $FilterProducts->FilterPage->Category && Tools::isSubmit('id_category'))){
            $_ids_products_category = Db::getInstance()->ExecuteS("
                SELECT id_product
                FROM " . _DB_PREFIX_ . "category_product
                WHERE id_category = " . (int)Tools::getValue('id_category') . "
            ");
            
            foreach ($_ids_products_category as $data) {
                $ids_products[] = $data['id_product'];
            }
        }
        if(Validate::isLoadedObject($searcher) && ($searcher->filter_page == $FilterProducts->FilterPage->Manufacturer && Tools::isSubmit('id_manufacturer'))){
            $_ids_products_manufacturer = Db::getInstance()->ExecuteS("
                SELECT id_product
                FROM " . _DB_PREFIX_ . "product
                WHERE id_manufacturer = " . (int)Tools::getValue('id_manufacturer') . "
            ");

            foreach ($_ids_products_manufacturer as $data) {
                $ids_products[] = $data['id_product'];
            }
        }
        if(Validate::isLoadedObject($searcher) && ($searcher->filter_page == $FilterProducts->FilterPage->Supplier && Tools::isSubmit('id_supplier'))){
            $_ids_products_supplier = Db::getInstance()->ExecuteS("
                SELECT id_product
                FROM " . _DB_PREFIX_ . (version_compare(_PS_VERSION_, '1.5') >= 0 ? 'product_supplier' : 'product') ."
                WHERE id_supplier = " . (int)Tools::getValue('id_supplier') . "
            ");

            foreach ($_ids_products_supplier as $data) {
                $ids_products[] = $data['id_product'];
            }
        }
        //-----------------------------------------------------------------------
        $query_all_options = 'SELECT ip.* ' .
            'FROM ' .
                _DB_PREFIX_ . 'fpp_index_product AS ip, ' .
                _DB_PREFIX_ . 'fpp_option AS o, ' . 
                _DB_PREFIX_ . 'fpp_filter AS f ' . 
            'WHERE ' .
                'ip.id_option = o.id_option ' .
                'AND o.id_filter = f.id_filter ' .
                'AND f.id_searcher = ' . $id_searcher . ' ' . 
                'AND f.criterion != \'' . $FilterProducts->Criterions->Custom . '\' ' .
                (sizeof($ids_products) ? ' AND ip.id_product IN (' . implode(',', $ids_products) . ')' : '' );
        
        $all_options = Db::getInstance()->ExecuteS($query_all_options);//filtra opciones segun la pagina donde este el cliente.
           
        $index_products = array();
        
        foreach ($all_options as $option) {
            $index_products[$option['id_product']][] = (string)$option['id_option'];
        }
                                     
        $_available_options = array();
                
        foreach ($index_products as $id_product => $_options) {
            $valid = 0;
            foreach($options AS $id_option){   
                foreach ($_options AS $i => $_id_option){
                    if ($id_option == $_id_option){                        
                        $valid += 1;
                    }                    
                }
            }
            if ($valid == sizeof($options) /*&& $valid != sizeof($_options)*/)
                $_available_options[] = $_options;
        }
                                              
        $available_options = array();
                
        foreach ($_available_options as $option) {
            foreach ($option as $opt) {
                if(!in_array($opt, $available_options))
                    $available_options[] = $opt;
            }
        }
                
        //Incluir en arreglo de opciones validas, las opciones customizadas consultadas anteriormente
        $available_options = array_merge($available_options, $options_custom_availables);
                        
        if(!sizeof($available_options))
            return array();
        
        $unavailable_options = Db::getInstance()->ExecuteS("
            SELECT 
                DISTINCT(o.id_option), f.id_filter, f.type
            FROM
                " . _DB_PREFIX_ . "fpp_option AS o,
                " . _DB_PREFIX_ . "fpp_filter AS f
            WHERE
                o.id_filter = f.id_filter
                AND f.id_searcher = " . $id_searcher . "                
                AND o.id_option NOT IN(" . implode(',', $available_options) . ")
        ");
        
        $_unavailable_options = array();   
        foreach($unavailable_options AS $option){
            if (in_array($option['id_option'], $options_custom_availables_ps)) 
                continue;
            
            $_unavailable_options[$option['id_filter']]['type'] = $option['type'];
            $_unavailable_options[$option['id_filter']]['options'][] = (int)$option['id_option'];
        }
        
        $query_available_options_select = 'SELECT 
                DISTINCT(o.id_option), f.id_filter, f.type
            FROM
                ' . _DB_PREFIX_ . 'fpp_option AS o,
                ' . _DB_PREFIX_ . 'fpp_filter AS f
            WHERE
                o.id_filter = f.id_filter
                AND f.id_searcher = ' . $id_searcher . '
                AND f.type = \'select\'
                AND o.id_option IN(' . implode(',', $available_options) . ')
                AND f.criterion <> \'' . $FilterProducts->Criterions->Custom . '\'
            ORDER BY o.position';
        
        
        $available_options_select = Db::getInstance()->ExecuteS($query_available_options_select);
                
        //buscar la categoria de la primera opcion
        $first_option_class = new OptionClass($first_option);
        $first_option_criterion_class = new OptionCriterionClass($first_option_class->id_option_criterion);
        $first_category = array('level_depth' => $first_option_criterion_class->level_depth, 'id_category' => $first_option_criterion_class->id_table);
        unset($first_option_class);
        unset($first_option_criterion_class);
        //recorrer
        foreach($available_options_select AS $option){
            if (in_array($option['id_option'], $options_custom_availables_ps)) 
                continue;
            //si la opcion tiene dependencia, es categoria y pertenece a la categoria de la opcion enviada por ajax, entonces agregar
            if (FilterClass::haveDependency($option['id_filter']) 
                    && FilterClass::getCriterionByFilter($option['id_filter']) == $FilterProducts->Criterions->Category
                    && !$searcher->multi_option) {
                //buscar la categoria de la opcion actual
                $option_class = new OptionClass($option['id_option']);
                $option_criterion_class = new OptionCriterionClass($option_class->id_option_criterion);
                if ($option_criterion_class->level_depth == $first_category['level_depth'] && $option_criterion_class->id_table == $first_category['id_category']) {
                    $_unavailable_options[$option['id_filter']]['options_select'][] = (int)$option['id_option'];
                } else {
                    for ($i = $option_criterion_class->level_depth; $i >= $first_category['level_depth']; $i--) {
                        $id_category_depth = 0;
                        if ($i == $first_category['level_depth']) {
                            if ($id_category_depth == $first_category['id_category']) {
                                $_unavailable_options[$option['id_filter']]['options_select'][] = (int)$option['id_option'];
                            }
                        } else {
                            $id_parent_category_depth = Db::getInstance()->getValue('SELECT id_parent FROM ' . _DB_PREFIX_ . 'category WHERE id_category = ' . $option_criterion_class->id_table);
                            
                            if ($id_parent_category_depth == $first_category['id_category']) {
                                $_unavailable_options[$option['id_filter']]['options_select'][] = (int)$option['id_option'];
                            } else {
                                $id_category_depth = $id_parent_category_depth;
                            }
                        }
                    }
                }
            } else {
                $_unavailable_options[$option['id_filter']]['options_select'][] = (int)$option['id_option'];
            }
        }

        return $_unavailable_options;
    }
    
    public function delete($delete_criterion = FALSE){
        $OptionCriterionClass = new OptionCriterionClass($this->id_option_criterion);
        if(parent::delete()){
            $dependency_options = Db::getInstance()->ExecuteS('
                SELECT * FROM '. _DB_PREFIX_ . 'fpp_index_product
                    WHERE 
                        id_option = '.(int)$this->id.'
            ');
            
            foreach($dependency_options AS $dependency_option){
                if (empty($dependency_option['id_dependency_option']))
                    continue;
                    
                if(!Db::getInstance()->Execute("
                    DELETE FROM " . _DB_PREFIX_ . "fpp_dependency_option
                        WHERE 
                            id_dependency_option = " . $dependency_option['id_dependency_option']."
                "))
                    return FALSE;
            }
            
            if(!Db::getInstance()->Execute("
                DELETE FROM " . _DB_PREFIX_ . "fpp_index_product
                    WHERE 
                        id_option = " . $this->id ."
            "))
                return FALSE;
            
            if(!ColumnOptionClass::deletePositionByOption($this->id))
                return FALSE;
            
            if($delete_criterion)
                if(!$OptionCriterionClass->delete())
                    return FALSE;
                
            return TRUE;
        }
        else
            return FALSE;
    }
}
?>