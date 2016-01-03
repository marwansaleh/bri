<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home Controller
 *
 * @author marwansaleh 11:49:07 AM
 */
class Home extends MY_FrontController {
    
    function index(){
        $this->data['mainmenu'] = $this->get_menu(CT_MAINMENU_HOME, FALSE, CT_LANG_INDONESIA);
        $this->data['subview'] = 'home/index';
        $this->load->view('_layout_main', $this->data);
    }
}

/**
 * Filename : home.php
 * Location : application/controllers/home.php
 */
