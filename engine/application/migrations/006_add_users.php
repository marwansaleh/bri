<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_add_users
 *
 * @author marwansaleh
 */
class Migration_add_users extends CI_Migration {
    private $_table_name = 'users';
    private $_primary_key = 'id';
    private $_index_keys = array('username','group_id');
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
                'constraint' => 50
            ),
            'group_id' => array(
                'type'  => 'INT',
                'constraint' => 11
            ),
            'username' => array(
                'type'  => 'VARCHAR',
                'constraint' => 30,
                'null' => FALSE
            ),
            'password' => array(
                'type'  => 'VARCHAR',
                'constraint' => 48,
                'null' => FALSE
            ),
            'last_login' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ),
            'last_ip' => array(
                'type'  => 'VARCHAR',
                'constraint' => 15,
                'null' => TRUE
            ),
            'last_url' => array(
                'type' => 'VARCHAR',
                'constraint' => 254,
                'null' => TRUE
            ),
            'session_id' => array(
                'type' => 'VARCHAR',
                'constraint' => 40,
                'null' => TRUE
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
                'name'          => 'Superadmin',
                'group_id'      => CT_USERTYPE_ROOT,
                'username'      => 'root',
                'password'      => '',
                'last_login'    => 0,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'name'          => 'Admin',
                'group_id'      => CT_USERTYPE_USER,
                'username'      => 'user',
                'password'      => '',
                'last_login'    => 0,
                'created'       => time(),
                'modified'      => time()
            )
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
        
        if (is_array($array)){
            for ($i=0; $i<count($array); $i++){
                $this->db->insert($this->_table_name, $array[$i]);
                $count++;
            }
        }
        return $count;
    }
}

/*
 * filename : 006_add_users.php
 * location : /application/migrations/006_add_users.php
 */
