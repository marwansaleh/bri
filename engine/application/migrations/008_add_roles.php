<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_groups
 *
 * @author marwansaleh
 */
class Migration_add_roles extends CI_Migration {
    private $_table_name = 'roles';
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
            'name'    => array(
                'type' => 'VARCHAR',
                'constraint' => 30
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
        $this->_seed(array(
            array(
                'name'          => 'USER_CREATE',
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'name'          => 'USER_UPDATE',
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'name'          => 'USER_DELETE',
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'name'          => 'GROUP_CREATE',
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'name'          => 'GROUP_UPDATE',
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'name'          => 'GROUP_DELETE',
                'created'       => time(),
                'modified'      => time()
            ),
        ));
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
 * filename : 008_add_roles.php
 * location : /application/migrations/008_add_roles.php
 */
