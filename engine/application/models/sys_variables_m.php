<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Sys_variables_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Sys_variables_m extends MY_Model {
    protected $_table_name = 'system_variables';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'name';
    
    public $rules = array(
        'name' => array(
            'field' => 'name', 
            'label' => 'Variable', 
            'rules' => 'required|xss_clean'
        ),
        'value' => array(
            'field' => 'value', 
            'label' => 'Value', 
            'rules' => 'required|xss_clean'
        )
    );
}

/*
 * file location: /application/models/sys_variables_m.php
 */
