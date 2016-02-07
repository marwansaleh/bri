<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Userrole_m
 *
 * @author Marwan Saleh <marwan.saleh@ymail.com>
 */
class Userrole_m extends MY_Model {
    protected $_table_name = 'roles';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'name';
    
    public $rules = array(
        'name'  => array(
            'field' => 'name', 
            'label' => 'Nama rule', 
            'rules' => 'trim|required|xss_clean'
        )
    );
    
}

/*
 * file location: engine/application/models/users/userrole_m.php
 */