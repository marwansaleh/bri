<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Corporate Page
 *
 * @author marwansaleh 11:54:07 AM
 */
class Page extends MY_AdminController{
    
    
    function __construct() {
        parent::__construct();
        
        $this->data['active_menu'] = 'page';
        $this->data['page_title'] = '<i class="fa fa-file-text"></i> Pages';
    }
    
    function index($page=1){
        $this->data['page_description'] = 'Display page list';
        
        $this->data['page'] = $page;
        
        $this->data['page_categories'] = array(
            CT_PAGECATEGORY_PRODUCT => 'Product', CT_PAGECATEGORY_NEWS => 'News',
            CT_PAGECATEGORY_COMPLIANCES => 'Compliances', CT_PAGECATEGORY_ANNOUNCEMENT => 'Announcement',
            CT_PAGECATEGORY_ECOREV => 'Economic Review'
        );
        
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], 'Home', site_url('home'));
        breadcumb_add($this->data['breadcumb'], 'Dashboard', get_cms_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'Pages', get_cms_url('page'), TRUE);
        $this->data['subview'] = 'cms/page/index';
        $this->load->view('_layout_admin', $this->data);
    }
    
    function edit($id=NULL, $page=1){
        $this->data['page_categories'] = array(
            CT_PAGECATEGORY_PRODUCT => 'Product', CT_PAGECATEGORY_NEWS => 'News',
            CT_PAGECATEGORY_COMPLIANCES => 'Compliances', CT_PAGECATEGORY_ANNOUNCEMENT => 'Announcement',
            CT_PAGECATEGORY_ECOREV => 'Economic Review'
        );
        
        $this->data['id'] = $id;
        
        $this->data['page_description'] = $id ? 'Edit item' : 'Create new item';
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], 'Home', site_url('home'));
        breadcumb_add($this->data['breadcumb'], 'Dashboard', get_cms_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'Page', get_cms_url('page'));
        breadcumb_add($this->data['breadcumb'], 'Edit', get_cms_url('page/edit'), TRUE);
        
        $this->data['back_url'] = get_cms_url('page/index/'.$page);
        $this->data['subview'] = 'cms/page/edit';
        $this->load->view('_layout_admin', $this->data);
    }
}

/**
 * Filename : page.php
 * Location : application/controllers/cms/page.php
 */
