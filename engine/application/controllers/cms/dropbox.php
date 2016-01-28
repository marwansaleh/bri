<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Corporate Dropbox
 *
 * @author marwansaleh 11:54:07 AM
 */
class Dropbox extends MY_AdminController{
    
    
    function __construct() {
        parent::__construct();
        
        $this->data['active_menu'] = 'dropbox';
        $this->data['page_title'] = '<i class="fa fa-chain"></i> Dropdown Links';
        
        $this->load->model('dropbox_category_m');
    }
    
    function index($page=1){
        $this->data['page_description'] = 'Display links';
        
        $this->data['page'] = $page;
        $this->data['categories'] = $this->dropbox_category_m->get();
        
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], 'Home', site_url('home'));
        breadcumb_add($this->data['breadcumb'], 'Dashboard', get_cms_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'Dropdown Links', get_cms_url('dropbox'), TRUE);
        $this->data['subview'] = 'cms/dropbox/index';
        $this->load->view('_layout_admin', $this->data);
    }
    
    function edit($id=NULL, $page=1){
        $this->data['categories'] = $this->dropbox_category_m->get();
        
        $this->data['id'] = $id;
        
        $this->data['page_description'] = $id ? 'Edit item' : 'Create new item';
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], 'Home', site_url('home'));
        breadcumb_add($this->data['breadcumb'], 'Dashboard', get_cms_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'Dropbox', get_cms_url('dropbox'));
        breadcumb_add($this->data['breadcumb'], 'Edit', get_cms_url('dropbox/edit'), TRUE);
        
        $this->data['back_url'] = get_cms_url('dropbox/index/'.$page);
        $this->data['subview'] = 'cms/dropbox/edit';
        $this->load->view('_layout_admin', $this->data);
    }
}

/**
 * Filename : dropbox.php
 * Location : application/controllers/cms/dropbox.php
 */
