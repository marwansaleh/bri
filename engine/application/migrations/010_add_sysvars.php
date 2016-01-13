<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_Add_sysvars
 *
 * @author marwansaleh
 */
class Migration_Add_sysvars extends CI_Migration {
    private $_table_name = 'system_variables';
    private $_primary_key = 'id';
    private $_index_keys = array('name');
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
                'constraint' => 30,
                'null' => FALSE
            ),
            'value'    => array(
                'type' => 'VARCHAR',
                'constraint' => 254,
                'null' => TRUE
            ),
            'datatype'    => array(
                'type' => 'ENUM("string","integer","numeric","boolean","list")',
                'null' => FALSE,
                'default' => 'string'
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
                'name'          => 'GOOGLE_GA_ID',
                'value'         => '12243124123',
                'datatype'      => 'string',
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'name'          => 'GOOGLE_API_KEY',
                'value'         => 'AIzaSyAnzGc6TmL55KVR7NO1-HqwLGcUir794Dg',
                'datatype'      => 'string',
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'name'          => 'FB_APP_ID',
                'value'         => '12243124123',
                'datatype'      => 'string',
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'name'          => 'FB_APP_SCOPE',
                'value'         => 'email,public_profile',
                'datatype'      => 'list',
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'name'          => 'FB_APP_SECRET',
                'value'         => '543b16b8a1b919a77b83e3fc5043eda1',
                'datatype'      => 'string',
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'name'          => 'TW_NAME',
                'value'         => 'bri',
                'datatype'      => 'string',
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'name'          => 'TW_API_KEY',
                'value'         => 'NXOtnYZ2qqSWPErSBWuVLnSaY',
                'datatype'      => 'string',
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'name'          => 'TW_API_SECRET',
                'value'         => 'QOcUJiQup7UciWXWWje4VpPS6JfKtzZ504C4FrQvELboYCcDEc',
                'datatype'      => 'string',
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
 * filename : 010_add_sysvars.php
 * location : /application/migrations/010_add_sysvars.php
 */
