<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migration_Add_sysvars
 *
 * @author marwansaleh
 */
class Migration_Add_staticstrings extends CI_Migration {
    private $_table_name = 'static_strings';
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
                'constraint' => 45,
                'null' => FALSE
            ),
            'category' => array(
                'type' => 'VARCHAR',
                'constraint' => 45,
                'null' => TRUE
            ),
            'value_id'    => array(
                'type' => 'VARCHAR',
                'constraint' => 254,
                'null' => TRUE
            ),
            'value_en'    => array(
                'type' => 'VARCHAR',
                'constraint' => 254,
                'null' => TRUE
            ),
            'sort'   => array(
                'type'  => 'INT',
                'constraint' => 5,
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
                'name'          => 'top_menu_home',
                'category'      => 'topmenu',
                'value_id'      => 'Beranda',
                'value_en'      => 'Home',
                'sort'          => 0,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'name'          => 'top_menu_lang',
                'category'      => 'topmenu',
                'value_id'      => 'English',
                'value_en'      => 'Bahasa',
                'sort'          => 1,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'name'          => 'top_menu_contactus',
                'category'      => 'topmenu',
                'value_id'      => 'Hubungi Kami',
                'value_en'      => 'Contact Us',
                'sort'          => 2,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'name'          => 'top_menu_faq',
                'category'      => 'topmenu',
                'value_id'      => 'FAQ',
                'value_en'      => 'FAQ',
                'sort'          => 3,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'name'          => 'corp_tab_01',
                'category'      => 'corptabs',
                'value_id'      => 'Warta BRI',
                'value_en'      => 'BRI News',
                'sort'          => 0,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'name'          => 'corp_tab_02',
                'category'      => 'corptabs',
                'value_id'      => 'Ulasan Ekonomi',
                'value_en'      => 'Economic Review',
                'sort'          => 1,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'name'          => 'corp_tab_03',
                'category'      => 'corptabs',
                'value_id'      => 'Compliances',
                'value_en'      => 'Compliances',
                'sort'          => 2,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'name'          => 'corp_tab_04',
                'category'      => 'corptabs',
                'value_id'      => 'Pengumuman',
                'value_en'      => 'Announcement',
                'sort'          => 3,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'name'          => 'corp_tab_05',
                'category'      => 'corptabs',
                'value_id'      => 'Kabar Ekonomi',
                'value_en'      => 'Economic News',
                'sort'          => 4,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'name'          => 'corp_drop_report',
                'category'      => 'corpbox',
                'value_id'      => 'Laporan',
                'value_en'      => 'Report',
                'sort'          => 0,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'name'          => 'corp_drop_rate',
                'category'      => 'corpbox',
                'value_id'      => 'Suku bunga',
                'value_en'      => 'Rates and Fare',
                'sort'          => 1,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'name'          => 'corp_drop_link',
                'category'      => 'corpbox',
                'value_id'      => 'BRI Links',
                'value_en'      => 'BRI Links',
                'sort'          => 2,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'name'          => 'corp_drop_other',
                'category'      => 'corpbox',
                'value_id'      => 'Layanan Lainnya',
                'value_en'      => 'Other Services',
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
 * filename : 011_add_staticstrings.php
 * location : /application/migrations/011_add_staticstrings.php
 */
