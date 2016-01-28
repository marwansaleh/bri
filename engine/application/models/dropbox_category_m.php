<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Dropbox_category_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Dropbox_category_m extends MY_Model {
    protected $_table_name = 'dropbox_category';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'sort';
    protected $_timestamps = TRUE;
    protected $_timestamps_field = array('created','modified');
}

/*
 * file location: /application/models/dropbox_category_m.php
 */
