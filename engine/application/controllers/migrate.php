<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migrate
 *
 * @author marwansaleh 5:29:17 PM
 */
class Migrate extends CI_Controller {
    function index(){
        $this->load->library('migration');

        if ($this->migration->current() === FALSE)
        {
            show_error($this->migration->error_string());
        }else{
            echo 'Migration to last version success!';
        }
    }
}

/**
 * Filename : migrate.php
 * Location : /application/controllers/migrate.php
 */
