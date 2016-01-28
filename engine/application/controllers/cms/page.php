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
        $this->data['id'] = $id;
        
        //get supporting data
        $this->load->model('menu_m');
        if ($id){
            $parents = $this->menu_m->get_by(array('id !='=>$id));
        }else{
            $parents = $this->menu_m->get();
        }
        $this->data['parents'] = $parents;
        
        $this->data['page_description'] = $id ? 'Edit menu item' : 'Create menu item';
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], 'Home', site_url('home'));
        breadcumb_add($this->data['breadcumb'], 'Dashboard', get_cms_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'Menus', get_cms_url('menu'));
        breadcumb_add($this->data['breadcumb'], 'Edit', get_cms_url('menu/edit'), TRUE);
        
        $this->data['back_url'] = get_cms_url('menu/index/'.$page);
        $this->data['subview'] = 'cms/menu/edit';
        $this->load->view('_layout_admin', $this->data);
    }
}

/**
 * Filename : page.php
 * Location : application/controllers/cms/page.php
 */
