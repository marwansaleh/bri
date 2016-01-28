<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Menu_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Menu_m extends MY_Model {
    protected $_table_name = 'menu';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'sort';
    protected $_timestamps = TRUE;
    protected $_timestamps_field = array('created','modified');
    
    public $rules = array(
        'parent_id' => array(
            'field' => 'parent_id',
            'label' => 'Parent ID', 
            'rules' => 'required|trim|xss_clean'
        ),
        'caption_id' => array(
            'field' => 'caption_id',
            'label' => 'Caption in Bahasa', 
            'rules' => 'trim|xss_clean'
        ),
        'caption_en' => array(
            'field' => 'caption_en',
            'label' => 'Caption in English', 
            'rules' => 'trim|xss_clean'
        ),
        'title_id' => array(
            'field' => 'title_id',
            'label' => 'Title in Bahasa', 
            'rules' => 'trim|xss_clean'
        ),
        'title_en' => array(
            'field' => 'title_en',
            'label' => 'Title in English', 
            'rules' => 'trim|xss_clean'
        ),
        'href' => array(
            'field' => 'href',
            'label' => 'URL link', 
            'rules' => 'trim|xss_clean'
        ),
        'category' => array(
            'field' => 'category',
            'label' => 'Menu category', 
            'rules' => 'trim|xss_clean'
        ),
        'sort' => array(
            'field' => 'sort',
            'label' => 'Display index order', 
            'rules' => 'trim|xss_clean'
        )
    );
}

/*
 * file location: /application/models/menu_m.php
 */
