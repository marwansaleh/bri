<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Page_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Page_m extends MY_Model {
    protected $_table_name = 'pages';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'date_time desc,category';
    protected $_timestamps = TRUE;
    protected $_timestamps_field = array('created','modified');
    
}

/*
 * file location: /application/models/page_m.php
 */
