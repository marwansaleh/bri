<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_menu
 *
 * @author marwansaleh
 */
class Migration_add_menu extends CI_Migration {
    private $_table_name = 'menu';
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
            'parent_id'    => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ),
            'caption' => array(
                'type'  => 'VARCHAR',
                'constraint' => 30
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => 150
            ),
            'href'   => array(
                'type'  => 'VARCHAR',
                'constraint' => 254
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
 * filename : 004_add_menu.php
 * location : /application/migrations/004_add_menu.php
 */
