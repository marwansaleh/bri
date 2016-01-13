<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Corporate Dashboard
 *
 * @author marwansaleh 11:54:07 AM
 */
class Dashboard extends MY_AdminController{
    
    
    function __construct() {
        parent::__construct();
        
        $this->data['active_menu'] = 'dashboard';
        $this->data['page_title'] = '<i class="fa fa-home"></i> Dashboard';
    }
    
    function index(){
        $this->data['page_description'] = 'Display important parameters';
        
        $this->set_skin_active($this->get_skin('blue'));
        
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], 'Home', site_url('home'), TRUE);
        breadcumb_add($this->data['breadcumb'], 'Dashboard', get_cms_url('dashboard'), TRUE);
        $this->data['subview'] = 'cms/dashboard/index';
        $this->load->view('_layout_admin', $this->data);
    }
    
}

/**
 * Filename : dashboard.php
 * Location : application/controllers/cms/dashboard.php
 */
