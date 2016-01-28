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
            'caption_id' => array(
                'type'  => 'VARCHAR',
                'constraint' => 30
            ),
            'caption_en' => array(
                'type'  => 'VARCHAR',
                'constraint' => 30
            ),
            'title_id' => array(
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => TRUE
            ),
            'title_en' => array(
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => TRUE
            ),
            'href'   => array(
                'type'  => 'VARCHAR',
                'constraint' => 254,
                'null' => TRUE
            ),
            'category'   => array(
                'type'  => 'TINYINT',
                'constraint' => 1,
                'default' => CT_MAINMENU_CORPORATE
            ),
            'sort'   => array(
                'type'  => 'INT',
                'constraint' => 9,
                'default' => 0
            ),
            'created'   => array(
                'type'  => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'modified'   => array(
                'type'  => 'INT',
                'constraint' => 11,
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
                'id'            => 1,
                'parent_id'     => 0,
                'caption_id'    => 'Situs Perusahaan',
                'caption_en'    => 'Corporate Website',
                'title_id'      => 'Situs Perusahaan',
                'title_en'      => 'Corporate website',
                'href'          => 'corporate',
                'category'      => CT_MAINMENU_HOME,
                'sort'          => 0,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'id'            => 2,
                'parent_id'     => 0,
                'caption_id'    => 'Karir',
                'caption_en'    => 'Career',
                'title_id'      => 'Karir',
                'title_en'      => 'Career',
                'href'          => 'http://karir.bri.co.id',
                'category'      => CT_MAINMENU_HOME,
                'sort'          => 1,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'id'            => 3,
                'parent_id'     => 0,
                'caption_id'    => 'Hubungan Investor',
                'caption_en'    => 'Investor Relationship',
                'title_id'      => 'Hubungan investor',
                'title_en'      => 'Investor relationship',
                'href'          => 'http://ib.bri.co.id',
                'category'      => CT_MAINMENU_HOME,
                'sort'          => 2,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'id'            => 4,
                'parent_id'     => 0,
                'caption_id'    => 'Anak Perusahaan',
                'caption_en'    => 'Subsidiary',
                'title_id'      => 'Anak perusahaan',
                'title_en'      => 'Subsidiary',
                'href'          => 'http://karir.bri.co.id',
                'category'      => CT_MAINMENU_HOME,
                'sort'          => 3,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'id'            => 5,
                'parent_id'     => 0,
                'caption_id'    => 'CSR BRI',
                'caption_en'    => 'CSR BRI',
                'title_id'      => 'CSR BRI',
                'title_en'      => 'CSR RI',
                'href'          => 'http://karir.bri.co.id',
                'category'      => CT_MAINMENU_HOME,
                'sort'          => 4,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'id'            => 6,
                'parent_id'     => 0,
                'caption_id'    => 'Tentang Kami',
                'caption_en'    => 'About Us',
                'title_id'      => 'Tentang kami',
                'title_en'      => 'About us',
                'href'          => 'corporate/aboutus',
                'category'      => CT_MAINMENU_CORPORATE,
                'sort'          => 0,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'id'            => 7,
                'parent_id'     => 6,
                'caption_id'    => 'Sejarah BRI',
                'caption_en'    => 'BRI History',
                'title_id'      => 'Sejarah BRI',
                'title_en'      => 'BRI history',
                'href'          => 'corporate/detail/about_the_history_of_bri',
                'category'      => CT_MAINMENU_CORPORATE,
                'sort'          => 0,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'parent_id'     => 0,
                'caption_id'    => 'Simpanan',
                'caption_en'    => 'Savings',
                'title_id'      => 'Simpanan',
                'title_en'      => 'Savings',
                'href'          => 'corporate/saving',
                'category'      => CT_MAINMENU_CORPORATE,
                'sort'          => 1,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'parent_id'     => 0,
                'caption_id'    => 'Pinjaman',
                'caption_en'    => 'Loans',
                'title_id'      => 'Pinjaman',
                'title_en'      => 'Loans',
                'href'          => 'corporate/loans',
                'category'      => CT_MAINMENU_CORPORATE,
                'sort'          => 2,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'parent_id'     => 0,
                'caption_id'    => 'Internasional',
                'caption_en'    => 'International',
                'title_id'      => 'Internasional',
                'title_en'      => 'International',
                'href'          => 'corporate/internasional',
                'category'      => CT_MAINMENU_CORPORATE,
                'sort'          => 3,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'parent_id'     => 0,
                'caption_id'    => 'Jasa Bank',
                'caption_en'    => 'Bank Services',
                'title_id'      => 'Jasa Bank',
                'title_en'      => 'Bank Services',
                'href'          => 'corporate/bankservice',
                'category'      => CT_MAINMENU_CORPORATE,
                'sort'          => 4,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'parent_id'     => 0,
                'caption_id'    => 'Produk Konsumer',
                'caption_en'    => 'Consumer Banking',
                'title_id'      => 'Produk Konsumer',
                'title_en'      => 'Consumer Banking',
                'href'          => 'corporate/consumerbanking',
                'category'      => CT_MAINMENU_CORPORATE,
                'sort'          => 5,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'parent_id'     => 0,
                'caption_id'    => 'Investasi Perbankan',
                'caption_en'    => 'Investment Banking',
                'title_id'      => 'Investasi Perbankan',
                'title_en'      => 'Investment Banking',
                'href'          => 'corporate/investmentbanking',
                'category'      => CT_MAINMENU_CORPORATE,
                'sort'          => 6,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'parent_id'     => 0,
                'caption_id'    => 'Layanan Prioritas',
                'caption_en'    => 'Priority Banking',
                'title_id'      => 'Layanan Prioritas',
                'title_en'      => 'Priority Banking',
                'href'          => 'corporate/prioritybanking',
                'category'      => CT_MAINMENU_CORPORATE,
                'sort'          => 7,
                'created'       => time(),
                'modified'      => time()
            ),
            array(
                'parent_id'     => 0,
                'caption_id'    => 'Info Lelang',
                'caption_en'    => 'Auction Information',
                'title_id'      => 'Info Lelang',
                'title_en'      => 'Auction Information',
                'href'          => 'corporate/auctioninfo',
                'category'      => CT_MAINMENU_CORPORATE,
                'sort'          => 8,
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
 * filename : 004_add_menu.php
 * location : /application/migrations/004_add_menu.php
 */
