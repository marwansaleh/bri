<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Corporate Auth
 *
 * @author marwansaleh 11:54:07 AM
 */
class Auth extends MY_FrontController{
    private $_cookie_remember = array('remember'=>'login_remember','username'=>'remember_username','password'=>'remember_password');
    
    function __construct() {
        parent::__construct();
        
        $this->load->helper('captcha');
    }
    
    function index(){
        if (get_cookie($this->_cookie_remember['remember'])){
            $remember  = new stdClass();
            $remember->username= get_cookie($this->_cookie_remember['username']);
            $remember->password = get_cookie($this->_cookie_remember['password']);
            
            $this->data['remember'] = $remember;
        }
        
        $this->load->helper('captcha');
        $vals = array(
            'img_path'      => './userfiles/',
            'img_url'       => site_url('userfiles') .'/'
        );

        $captcha = create_captcha($vals);
        $data_captcha = array(
            'captcha_time'  => $captcha['time'],
            'ip_address'    => $this->input->ip_address(),
            'word'          => $captcha['word']
        );

        $query = $this->db->insert_string('captcha', $data_captcha);
        $this->db->query($query);
        
        $this->data['captcha'] = $captcha;
        $this->data['submit'] = site_url(config_item('cms') . 'auth/login');
        $this->data['subview'] = 'auth/login';
        $this->load->view('_layout_login', $this->data);
    }
    
    function login(){
        
    }
}

/**
 * Filename : corporate.php
 * Location : application/controllers/cms/auth.php
 */
