<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_ci_session
 *
 * @author marwansaleh
 */
class Migration_add_ci_session extends CI_Migration {
    private $_table_name = 'ci_sessions';
    private $_primary_key = 'id';
    private $_index_keys = array('timestamp');
    private $_attributes = array('ENGINE' => 'InnoDB');
    
    public function up(){
        $this->dbforge->add_field(array(
            $this->_primary_key    => array (
                'type'  => 'VARCHAR',
                'constraint' => 40,
                'NULL' => FALSE
            ),
            'ip_address'    => array(
                'type' => 'VARCHAR',
                'constraint' => 45,
                'NULL' => FALSE
            ),
            'timestamp' => array(
                'type'  => 'INT',
                'constraint' => 10,
                'unsigned' => TRUE,
                'default' => 0,
                'NULL' => FALSE
            ),
            'data' => array(
                'type' => 'BLOB',
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
 * filename : 001_add_ci_session.php
 * location : /application/migrations/001_add_ci_session.php
 */
