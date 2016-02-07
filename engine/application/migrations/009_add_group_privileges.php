<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_group_privileges
 *
 * @author marwansaleh
 */
class Migration_add_group_privileges extends CI_Migration {
    private $_table_name = 'group_privileges';
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
            'group_id'    => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE
            ),
            'role_id'    => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE
            ),
            'granted'    => array(
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0
            ),
            'created'   => array(
                'type'  => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'default' => 0
            ),
            'modified'   => array(
                'type'  => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'default' => 0
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
        
        //Need seeding ?
    }
    
    public function down(){
        //remove the table if exists
        $this->dbforge->drop_table($this->_table_name, TRUE);
    }
    
    private function _seed($array){
        $count = 0;
        if (!isset($this->db)){
            $this->load->database();
        }
        
        if (is_array($array) && count ($array)){
            for ($i=0; $i<count($array); $i++){
                $this->db->insert($this->_table_name, $array[$i]);
                $count++;
            }
        }
        return $count;
    }
}

/*
 * filename : 009_add_privileges.php
 * location : /application/migrations/009_add_group_privileges.php
 */
