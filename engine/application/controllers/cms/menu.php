<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Corporate Menu
 *
 * @author marwansaleh 11:54:07 AM
 */
class Menu extends MY_AdminController{
    
    
    function __construct() {
        parent::__construct();
        
        $this->data['active_menu'] = 'menu';
        $this->data['page_title'] = '<i class="fa fa-list-alt"></i> Menu';
    }
    
    function index($page=1){
        $this->data['page_description'] = 'Display menu list';
        
        $this->data['page'] = $page;
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], 'Home', site_url('home'));
        breadcumb_add($this->data['breadcumb'], 'Dashboard', get_cms_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'Menus', get_cms_url('menu'), TRUE);
        $this->data['subview'] = 'cms/menu/index';
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
 * Filename : menu.php
 * Location : application/controllers/cms/menu.php
 */
