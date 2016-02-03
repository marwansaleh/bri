<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_Add_sysvars
 *
 * @author marwansaleh
 */
class Migration_Add_pages extends CI_Migration {
    private $_table_name = 'pages';
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
            'category' => array(
                'type' => 'INT',
                'default' => 0
            ),
            'title_id'    => array(
                'type' => 'VARCHAR',
                'constraint' => 254,
                'null' => FALSE
            ),
            'title_en'    => array(
                'type' => 'VARCHAR',
                'constraint' => 254,
                'null' => FALSE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => 254,
                'null' => FALSE
            ),
            'date_time'    => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
            'editable'    => array(
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 1
            ),
            'images' => array(
                'type' => TEXT,
                'null' => TRUE
            ),
            'content_id'    => array(
                'type' => 'TEXT',
                'null' => TRUE
            ),
            'content_en'    => array(
                'type' => 'TEXT',
                'null' => TRUE
            ),
            'link'    => array (
                'type' => 'VARCHAR',
                'constraint' => 254
            ),
            'sort'  => array(
                'type'  =>'INT',
                'constraint' => 7,
                'default' => 0
            ),
            'created_by'   => array(
                'type'  => 'INT',
                'constraint' => 11
            ),
            'updated_by'   => array(
                'type'  => 'INT',
                'constraint' => 11
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
                'category'      => CT_PAGECATEGORY_PRODUCT,
                'title_id'      => 'Sejarah BRI',
                'title_en'      => 'The History of BRI',
                'name'          => 'about_the_history_of_bri',
                'date_time'     => '2016-01-6 08:59:1',
                'content_id'    => 'Sejarah BRI',
                'content_en'    => 'The History of BRI',
                'link'          => 'corporate/detail/about_the_history_of_bri',
                'created_by'    => 1,
                'updated_by'    => 1,
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
 * filename : 012_add_pages.php
 * location : /application/migrations/012_add_pages.php
 */
