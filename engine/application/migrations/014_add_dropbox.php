<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_Add_dropbox
 *
 * @author marwansaleh
 */
class Migration_Add_dropbox extends CI_Migration {
    private $_table_name = 'dropbox';
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
            'category' => array(
                'type' => 'INT',
                'constraint' => 5
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
            'href'    => array(
                'type' => 'VARCHAR',
                'constraint' => 254,
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
                'category'      => 1,
                'label_id'      => 'Laporan Tahunan',
                'label_en'      => 'Annual Report',
                'href'          => '#',
                'sort'          => 0,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'category'      => 1,
                'label_id'      => 'Laporan Publikasi',
                'label_en'      => 'Publication Report',
                'href'          => '#',
                'sort'          => 1,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'category'      => 2,
                'label_id'      => 'Kurs Harian',
                'label_en'      => 'BRI Daily Rates',
                'href'          => '#',
                'sort'          => 0,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'category'      => 2,
                'label_id'      => 'Bunga Deposito',
                'label_en'      => 'Deposits Interest',
                'href'          => '#',
                'sort'          => 1,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'category'      => 3,
                'label_id'      => 'Internet Banking',
                'label_en'      => 'Internet Banking',
                'href'          => '#',
                'sort'          => 0,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'category'      => 3,
                'label_id'      => 'Investor Relations',
                'label_en'      => 'Investor Relations',
                'href'          => '#',
                'sort'          => 1,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'category'      => 4,
                'label_id'      => 'Unit Kerja BRI',
                'label_en'      => 'BRI Branches',
                'href'          => '#',
                'sort'          => 0,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'category'      => 4,
                'label_id'      => 'Weekend Banking',
                'label_en'      => 'Weekend Bnking',
                'href'          => '#',
                'sort'          => 1,
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
 * filename : 014_add_drobox.php
 * location : /application/migrations/014_add_drobox.php
 */
