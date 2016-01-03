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
    }
    
    function index(){
        if (get_cookie($this->_cookie_remember['remember'])){
            $remember  = new stdClass();
            $remember->username= get_cookie($this->_cookie_remember['username']);
            $remember->password = get_cookie($this->_cookie_remember['password']);
            
            $this->data['remember'] = $remember;
        }
        
        $captcha = $this->_create_captcha();
        $data_captcha = array(
            'captcha_time'  => $captcha['time'],
            'ip_address'    => $this->input->ip_address(),
            'word'          => $captcha['word']
        );
        $this->session->set_userdata('captcha', $captcha);
        $query = $this->db->insert_string('captcha', $data_captcha);
        $this->db->query($query);
        
        if ($this->session->flashdata('login_error')){
            $this->data['message_error'] = create_alert_box($this->session->flashdata('login_error'), 'error', 'Login error!!', TRUE);
        }
        
        $this->data['captcha'] = $captcha;
        //get previous submitted data if any
        $this->data['submitted'] = $this->session->flashdata('submitted');
        //set submit form action url
        $this->data['submit'] = site_url(config_item('cms_path') . 'auth/login');
        $this->data['subview'] = 'auth/login';
        $this->load->view('_layout_login', $this->data);
    }
    
    function login(){
        //remove captcha images
        $captcha = $this->session->userdata('captcha');
        $captcha_file = get_userfiles_base_path() . 'captcha/' . $captcha['time'] .'.jpg';
        if (file_exists($captcha_file)){
            unlink($captcha_file);
        }
        //get posting data
        $this->session->set_flashdata('submitted', array_submits('username,password', $this->input->post()));
        
        //check captcha
        if (!$this->_check_captcha($this->input->post('captcha'))){
            $this->session->set_flashdata('login_error', 'Masukkan captcha sesuai dengan gambar.');
        }else{
            $login_result = TRUE;
            if ($login_result){
                redirect(config_item('cms_path') .'dashboard');
                exit;
            }
        }
        
        redirect(config_item('cms_path') . 'auth/index');
    }
    
    private function _create_captcha(){
        $this->load->helper('captcha');
        
        //create random word
        $original_string = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random = substr(str_shuffle($original_string), 0, 6);
        $vals = array(
            'word'          => $random,
            'img_path'      => get_userfiles_base_path().'captcha/',
            'img_url'       => get_userfile('captcha/'),
            'img_width'     => '140',
            'img_height'    => 42,
            'font_size'     => 19,
            'font_path'     => get_lib_path() . 'ttf/Junicode-RegularCondensed.ttf',
            'img_id'        => 'captcha',
            // White background and border, black text and red grid
            'colors'        => array(
                'background' => array(255, 255, 255), 'border' => array(255, 255, 255),
                'text' => array(0, 0, 0), 'grid' => array(255, 40, 40)
            )
        );
        $captcha = create_captcha($vals);
        return $captcha;
    }
    
    private function _check_captcha($word){
        // First, delete old captchas
        $expiration = time() - 900;
        $this->db->where('captcha_time < ', $expiration)->delete('captcha');

        // Then see if a captcha exists:
        $sql = 'SELECT COUNT(*) AS count FROM '.$this->db->dbprefix('captcha').' WHERE word = ? AND ip_address = ? AND captcha_time > ?';
        $binds = array($word, $this->input->ip_address(), $expiration);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();

        if ($row->count == 0)
        {
            return FALSE;
        }
        
        return TRUE;
    }
}

/**
 * Filename : auth.php
 * Location : application/controllers/cms/auth.php
 */
