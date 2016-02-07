<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Useraccess_g_m
 *
 * @author Marwan Saleh <marwan.saleh@ymail.com>
 */
class Useraccess_g_m extends MY_Model {
    protected $_table_name = 'group_privileges';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'group_id';
    
    public $rules = array(
        'group_id'  => array(
            'field' => 'group_id', 
            'label' => 'group group_id', 
            'rules' => 'trim|required|xss_clean'
        )
    );
}

/*
 * file location: engine/application/models/users/useraccess_g_m.php
 */