<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Corporate Controller
 *
 * @author marwansaleh 11:54:07 AM
 */
class Corporate extends MY_FrontController{
    
    function __construct() {
        parent::__construct();
        
        $this->data['mainmenu'] = $this->get_menu(CT_MAINMENU_CORPORATE, FALSE, $this->get_language());
    }
    function index(){
        $language = $this->get_language();
        //get tabs title
        $this->data['main_tabs'] = $this->get_static_strings(CT_STATICGROUP_CORPTABS, $language);
        
        $corpbox = $this->get_static_strings(CT_STATICGROUP_CORPBOX, $language);
        $this->data['corpbox'] = array();
        foreach ($corpbox as $cb){
            $this->data['corpbox'][$cb->name] = $cb;
        }
        
        $this->data['subview'] = 'corporate/index';
        $this->load->view('_layout_main', $this->data);
    }
}

/**
 * Filename : corporate.php
 * Location : application/controllers/corporate.php
 */
