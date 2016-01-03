<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Corporate Language
 *
 * @author marwansaleh 11:54:07 AM
 */
class Language extends MY_FrontController{
    
    function index($lang=CT_LANG_INDONESIA){
        $this->set($lang);
    }
    
    function set($lang=CT_LANG_INDONESIA){
        if ($lang != CT_LANG_ENGLISH && $lang != CT_LANG_INDONESIA){
            show_404();
            exit;
        }
        $referrer = $this->agent->referrer();
        if (!$referrer){
            $referrer = site_url();
        }
        $this->set_language($lang);
        
        redirect($referrer);
    }
}

/**
 * Filename : language.php
 * Location : application/controllers/language.php
 */
