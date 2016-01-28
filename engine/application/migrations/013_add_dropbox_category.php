<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_Add_dropbox_category
 *
 * @author marwansaleh
 */
class Migration_Add_dropbox_category extends CI_Migration {
    private $_table_name = 'dropbox_category';
    private $_primary_key = 'id';
    private $_index_keys = array();
    private $_attributes = array('ENGINE' => 'InnoDB');
    
    public function up(){
        $this->dbforge->add_field(array(
            $this->_primary_key    => array (
                'type'  => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'label_id'    => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => FALSE
            ),
            'label_en'    => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => FALSE
            ),
            'sort'    => array(
                'type' => 'INT',
                'constraint' => 4,
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
        $this->_seed(array(
            array(
                'label_id'      => 'Laporan',
                'label_en'      => 'Reports',
                'sort'          => 0,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'label_id'      => 'Suku Bunga',
                'label_en'      => 'Rates and Fare',
                'sort'          => 1,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'label_id'      => 'BRI Links',
                'label_en'      => 'BRI Links',
                'sort'          => 2,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'label_id'      => 'Layanan Lainnya',
                'label_en'      => 'Other Services',
                'sort'          => 3,
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
 * filename : 013_add_drobox_category.php
 * location : /application/migrations/013_add_drobox_category.php
 */
