<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of User_m
 *
 * @author Marwan Saleh <marwan.saleh@ymail.com>
 */
class User_m extends MY_Model {
    protected $_table_name = 'users';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'name, group_id';
    
    public $rules_login = array(
        'username' => array(
            'field' => 'username', 
            'label' => 'Username', 
            'rules' => 'trim|required|xss_clean'
        ),
        'password' => array(
            'field' => 'password', 
            'label' => 'Password', 
            'rules' => 'trim|required|xss_clean'
        )
    );
    
    public $rules_update = array(
        'username' => array(
            'field' => 'username', 
            'label' => 'Username', 
            'rules' => 'trim|required|xss_clean'
        ),
        'group_id' => array(
            'field' => 'group_id', 
            'label' => 'Group access', 
            'rules' => 'trim|greater_than[0]|required|xss_clean'
        )
    );
    
}

/*
 * file location: engine/application/models/users/user_m.php
 */