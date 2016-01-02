<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_weblog
 *
 * @author marwansaleh
 */
class Migration_add_weblog extends CI_Migration {
    private $_table_name = 'weblog';
    private $_primary_key = 'id';
    private $_index_keys = array();
    private $_attributes = array('ENGINE' => 'InnoDB');
    
    public function up(){
        $this->dbforge->add_field(array(
            $this->_primary_key    => array (
                'type'  => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'datetime'    => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ),
            'visitor_id' => array(
                'type'  => 'VARCHAR',
                'constraint' => 30
            ),
            'ip_address' => array(
                'type' => 'VARCHAR',
                'constraint' => 15
            ),
            'uri'   => array(
                'type'  => 'VARCHAR',
                'constraint' => 254
            ),
            'user_agent' => array(
                'type'  => 'VARCHAR',
                'constraint' => 254
            ),
            'device_type' => array(
                'type'  => 'ENUM("mobile","tablet","desktop")',
                'default' => 'desktop',
                'NULL' => FALSE
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
 * filename : 002_add_visitor.php
 * location : /application/migrations/002_add_visitor.php
 */
