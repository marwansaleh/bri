<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Staticstring_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Staticstring_m extends MY_Model {
    protected $_table_name = 'static_strings';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'sort,name';
    protected $_timestamps = TRUE;
    
}

/*
 * file location: /application/models/staticstring_m.php
 */
