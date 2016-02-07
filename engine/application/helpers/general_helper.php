<?php
if (!function_exists('breadcumb')){
    function breadcrumb($pages, $showServerTime=FALSE){
        $str = '<ol class="breadcrumb">';
        
        if (is_array($pages)){
            if ($showServerTime){
                $new_bc = array (array('title'=> date('D, dMY H:i:s')));
                array_splice($pages, 0,0, $new_bc);
            }
            foreach ($pages as $page){
                $active = (isset($page['active'])&&$page['active']==TRUE);
                $str.= '<li';
                if ($active)
                    $str.= ' class="active"';
                        
                $str.= '>';
                if (isset($page['link']))
                    $str.= '<a href="'.$page['link'].'">'. $page['title'].'</a>';
                else
                    $str.= $page['title'];
                
                
                $str.= '</li>';
            }
        }
        else
        {
            $str.= '<li>'.$page.'</li>';
        }
        $str.= '</ol>';
        return $str;
    }
}

if (!function_exists('breadcumb_add')){
    function breadcumb_add(&$breadcumb,$title,$link=NULL,$active=FALSE){
        if (is_array($breadcumb)){
            $item = array('title'=>$title, 'active'=>$active);
            if ($link){
                $item['link'] = $link;
            }
            $breadcumb [] = $item;
        }
    }
}

if (!function_exists('create_alert_box')){
    function create_alert_box($alert_text, $alert_type=NULL, $alert_title=NULL, $autohide=TRUE, $secs=2500){
        $type_labels = array(
            'default' => 'Information', 'info'=>'Information', 'success'=>'Successfull', 
            'warning'=>'Warning', 'danger'=>'Danger', 'error'=>'Error'
        );
        $type_alerts = array(
            'default'=>'alert-info', 'info'=>'alert-info', 'success'=>'alert-success', 
            'warning'=>'alert-warning', 'danger'=>'alert-danger', 'error'=>'alert-danger'
        );
        $s = '<div class="alert '.(isset($type_alerts[$alert_type])?$type_alerts[$alert_type]:$type_alerts['default']).' alert-dismissible" role="alert">';
        //button dismiss
        $s.= '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
        //Label in bold
        $s.= '<strong>'. ($alert_title?$alert_title:(isset($type_labels[$alert_type])?$type_labels[$alert_type]:$type_labels['default']).'!').'</strong> ';
        //Alert text
        $s.= $alert_text;
        $s.= '</div>';
        
        //add js to hide automatically
        if ($autohide){
            $s.= PHP_EOL . '<script>setTimeout(function(){$(".alert-dismissible").fadeOut("slow");},'.$secs.');</script>';
        }
        
        return $s;
    }
}

if (!function_exists('get_asset_url')){
    function get_asset_url($filename=NULL){
        $base_assets = config_item('assets_path');
        if (!$filename){
            return site_url($base_assets) . '/';
        }else{
            return site_url($base_assets . $filename);
        }
    }
}

if (!function_exists('get_lib_path')){
    function get_lib_path(){
        return config_item('lib_path');
    }
}

if (!function_exists('get_lib_url')){
    function get_lib_url($filename=NULL){
        $base_lib = config_item('lib_path');
        if (!$filename){
            return site_url($base_lib) . '/';
        }else{
            return site_url($base_lib . $filename);
        }
    }
}

if (!function_exists('get_userfiles_base_path')){
    function get_userfiles_base_path(){
        return config_item('userfiles_base_path');
    }
}

if (!function_exists('get_userfiles_base_url')){
    function get_userfiles_base_url(){
        return config_item('userfiles_base_url');
    }
}

if (!function_exists('get_userfile')){
    function get_userfile($filename){
        $base_userfile = get_userfiles_base_url();
        return $base_userfile . $filename;
    }
}

if (!function_exists('array_submits')){
    function array_submits($keys, $posts){
        $data = array();
        foreach (explode(',', $keys) as $key){
            $data[$key] = isset($posts[$key])?$posts[$key] : NULL;
        }
        
        return $data;
    }
}

if (!function_exists('get_cms_url')){
    function get_cms_url($file=NULL){
        if ($file){
            return site_url(config_item('cms_path') . $file);
        }else{
            return site_url(config_item('cms_path')) .'/';
        }
    }
}

if (!function_exists('variable_type_cast')){
    function variable_type_cast($value, $type='string'){
        switch ($type){
            case 'integer': return intval($value); 
            case 'numeric': return floatval($value);
            case 'boolean': return boolval($value);
            case 'list': return __make_list($value);
            default : return strval($value);
        }
    }
    
    function __make_list($value, $delim=','){
        $list = explode($delim, $value);
        
        return $list;
    }
}

if (!function_exists('create_menus_from_array')){
    function create_menus_from_array($data, $level=0){
        $str = '<ul ' . ($level==0?'class="nav navbar-nav navbar-left"':'class="dropdown-menu '.($level>1?'sub-menu':'').'"').'>';
        foreach($data as $menuitem){
            if ($menuitem->children){
                $str.= '<li class="dropdown">';
                $str.= '<a href="'. ($menuitem->href?$menuitem->href:'#').'" '.($menuitem->external?'target="_blank"':'').' class="'.($level==0?'dropdown-toggle':'trigger right-caret').'"' .($level==0?' data-toggle="dropdown"':'').'>';
                $str.= strtoupper($menuitem->caption);
                if ($level==0){
                    $str.= ' <span class="caret"></span>';
                }
                $str.= '</a>';
                $str.= create_menus_from_array($menuitem->children, ($level+1));
                $str.= '</li>';
            }else{
                $str.= '<li>';
                $str.= '<a href="'. ($menuitem->href?$menuitem->href:'#').'" '.($menuitem->external?'target="_blank"':'').'>';
                $str.= strtoupper($menuitem->caption);
                $str.= '</a>';
                $str.= '</li>';
            }
        }
        $str.= '</ul>';
        
        return $str;
    }
}

if (!function_exists('page_category_name')){
    function page_category_name($category){
        $category_name = 'Product';
        
        switch ($category){
            case CT_PAGECATEGORY_ECOREV:
                $category_name = 'Economic'; break;
            case CT_PAGECATEGORY_ANNOUNCEMENT:
                $category_name = 'announcement'; break;
            case CT_PAGECATEGORY_COMPLIANCES:
                $category_name = 'Compliances'; break;
            case CT_PAGECATEGORY_NEWS:
                $category_name = 'News'; break;
            case CT_PAGECATEGORY_PRODUCT:
            default: $category_name = 'Product';
        }
        
        return $category_name;
    }
}

if (!function_exists('menu_category_name')){
    function menu_category_name($category){
        $category_name = 'Product';
        
        switch ($category){
            case CT_MAINMENU_HOME:
                $category_name = 'HOME'; break;
            case CT_MAINMENU_TOP:
                $category_name = 'TOP MENU'; break;
            case CT_MAINMENU_CORPORATE:
            default: $category_name = 'CORPORATE';
        }
        
        return $category_name;
    }
}

/*
 * Filename: general_helper.php
 * Location: application/helpers/general_helper.php
 */