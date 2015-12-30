<?php

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

/*
 * Filename: general_helper.php
 * Location: application/helpers/general_helper.php
 */