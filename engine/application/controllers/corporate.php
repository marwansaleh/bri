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
        
        $this->data['subview'] = 'corporate/index';
        $this->load->view('_layout_main', $this->data);
    }
}

/**
 * Filename : corporate.php
 * Location : application/controllers/corporate.php
 */
