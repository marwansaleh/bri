<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class MY_Controller inherit from CI_Controller 
 * which will be the base controller for all controllers used
 * in this application
 *
 * @author marwansaleh 5:42:25 PM
 */
class MY_Controller extends CI_Controller {
    private $_cookie_visitor = 'visitor';
    private $_log_type = 'file';
    
    protected $data = array();
            
    function __construct() {
        parent::__construct();
    }
    
    protected function create_visitor_log(){
        //check if cookie for this visitor exists, if not create one
        
        if (!$this->input->cookie($this->_cookie_visitor)){
            $cookie = array(
                'name'   => $this->_cookie_visitor,
                'value'  => md5(time() . $this->input->ip_address()),
                'expire' => 8640 * 365
            );
            $this->input->set_cookie($cookie);
            
            //register new user
            if (!$this->agent->is_robot()){
                $this->_visitor_register();
            }
        }
    }
    
    protected function get_visitor_id(){
        return $this->input->cookie($this->_cookie_visitor);
    }
    
    protected function create_log($event_name, $log_type = NULL){
        $_log_type = $this->get_log_type();
        
        if ($log_type && ($log_type==CT_LOG_TYPE_FILE || $log_type==CT_LOG_TYPE_DB || $log_type==CT_LOG_TYPE_DUAL)){
            $_log_type = $log_type;
        }
        
        $log_data = array(
            'datetime'  => date('Y-m-d H:i:s'),
            'visitor_id' => $this->get_visitor_id(),
            'ip_address' => $this->input->ip_address(),
            'event_name' => $event_name
        );
        
        switch ($_log_type){
            case CT_LOG_TYPE_FILE:
                $this->_create_log_infile($log_data);
                break;
            case CT_LOG_TYPE_DB:
                $this->_create_log_indb($log_data);
                break;
            case CT_LOG_TYPE_DUAL:
                $this->_create_log_infiledb($log_data);
                break;
        }
    }
    
    protected function read_log($lines=15){
        
    }
    
    protected function set_log_type($type){
        if ($type==CT_LOG_TYPE_FILE || $type==CT_LOG_TYPE_DB || $type==CT_LOG_TYPE_DUAL){
            $this->_log_type = $type;
            
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    protected function get_log_type(){
        return $this->_log_type;
    }
    
    protected function get_menu($type=CT_MAINMENU_CORPORATE){
        $menu = array();
        switch ($type){
            case CT_MAINMENU_HOME:
                $menu = array();
        }
        
        return $menu;
    }
    
    private function _create_log_infile($log_data){
        
    }
    
    private function _create_log_indb($log_data){
        
    }
    
    private function _create_log_infiledb($log_data){
        $this->_create_log_infile($log_data);
        $this->_create_log_indb($log_data);
    }
    
    private function _visitor_register(){
        $this->db->insert('unique_visitors', array(
            'visitor_id'    => $this->get_visitor_id(),
            'date'          => time(),
            'ip_address'    => $this->input->ip_address()
        ));
    }
}

class MY_FrontController extends MY_Controller {
    function __construct() {
        parent::__construct();
    }
    
    function get_home_menu(){
        
    }
    
    function get_corporate_menu(){
        return array();
    }
}

class MY_AdminController extends MY_Controller {
    
}

/**
 * Filename : MY_Controller.php
 * Location : applications/core/MY_Controller.php
 */
