<?php
if (!function_exists('create_alert_box')){
    function create_alert_box($alert_text, $alert_type=NULL, $alert_title=NULL, $autohide=TRUE){
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
            $s.= PHP_EOL . '<script>setTimeout(function(){$(".alert-dismissible").fadeOut("slow");},2500);</script>';
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

/*
 * Filename: general_helper.php
 * Location: application/helpers/general_helper.php
 */