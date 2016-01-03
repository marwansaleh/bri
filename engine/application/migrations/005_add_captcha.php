<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_captcha
 *
 * @author marwansaleh
 */
class Migration_add_captcha extends CI_Migration {
    private $_table_name = 'captcha';
    private $_primary_key = 'captcha_id';
    private $_index_keys = array('word');
    private $_attributes = array('ENGINE' => 'InnoDB');
    
    public function up(){
        $this->dbforge->add_field(array(
            $this->_primary_key    => array (
                'type'  => 'BIGINT',
                'constraint' => 13,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'captcha_time'    => array(
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => TRUE
            ),
            'ip_address' => array(
                'type'  => 'VARCHAR',
                'constraint' => 45
            ),
            'word' => array(
                'type'  => 'VARCHAR',
                'constraint' => 20
            )
        ));
        
        //create primary key
        $this->dbforge->add_key($this->_primary_key, TRUE);
        //create optional index from array
        if (count($this->_index_keys)){
            $this->dbforge->add_key($this->_index_keys);
        }
        //build the table if not exists (set second param TRUE)
        $this->dbforge->create_table($this->_table_name, TRUE, $this->_attributes);
    }
    
    public function down(){
        //remove the table if exists
        $this->dbforge->drop_table($this->_table_name, TRUE);
    }
}

/*
 * filename : 005_add_captcha.php
 * location : /application/migrations/005_add_captcha.php
 */
