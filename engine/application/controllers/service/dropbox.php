<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Dropbox
 *
 * @author marwansaleh 1:31:58 PM
 */
class Dropbox extends REST_Api {
    private $_remap_fields = array(
        'id'            => 'id',
        'category'      => 'category',
        'category_name' => 'category_name',
        'label_id'      => 'label_id',
        'label_en'      => 'label_en',
        'label'         => 'label',
        'href'          => 'href',
        'sort'          => 'sort',
        'created'       => 'created',
        'created_dt'    => 'created_dt',
        'modified'      => 'modified',
        'modified_dt'   => 'modified_dt'
    );
    
    function __construct($config = 'rest') {
        parent::__construct($config);
        
        $this->load->model(array('dropbox_m','dropbox_category_m'));
    }
    
    function index_get($id=NULL){
        $lang = $this->get('lang') ? $this->get('lang') : CT_LANG_INDONESIA;
        if ($id){
            //manipulate result item before return
            $result = $this->remap_fields($this->_remap_fields, $this->_proccess_item($this->dropbox_m->get($id), $lang));
        } else {
            $page = $this->get('page') ? $this->get('page') : 1;
            $limit = $this->get('limit') ? $this->get('limit') : 12;
            $search = $this->get('search') ? $this->get('search') : NULL;
            
            $where = NULL;
            
            //Count total records
            if ($this->get('category')>=0){
                $where = array ('category' => $this->get('category'));
            }
            if ($search){
                $this->db->like('label_id', $search);
                $this->db->or_like('label_en', $search);
            }
            
            $totalRecords = $this->dropbox_m->get_count($where);
            $totalPages = ceil($totalRecords / $limit);
            
            $result = array('currentPage' => $page, 'totalPages' => $totalPages, 'items'=>array());
            
            if ($totalRecords > 0){
                $offset = ($page-1) * $limit;
                //apply offset and limit of data
                $this->db->offset($offset)->limit($limit);
                if (isset($where) && !empty($where)){
                    $this->db->where($where);
                }
                //if searching
                if ($search){
                    $this->db->like('label_id', $search);
                    $this->db->or_like('label_en', $search);
                }
                $query_result = $this->dropbox_m->get();
                if ($query_result){
                    $items = array();
                    foreach ($query_result as $item){
                        //manipulate result item before return
                        $items [] = $this->_proccess_item($item, $lang);
                    }
                    //manipulate result item before return
                    $result['items'] = $this->remap_fields($this->_remap_fields, $items);
                }
            }
        }
        //sleep(1);
        $this->response($result);
        
    }
    
    function index_post(){
        $category = $this->post('category');
        $label_id = $this->post('label_id');
        $label_en = $this->post('label_en');
        $href = $this->post('href');
        $sort = $this->post('sort');
        
        $data = array(
            'category'     => $category,
            'label_id'    => $label_id,
            'label_en'    => $label_en,
            'href'          => $href,
            'sort'          => $sort
        );
        
        if (($id=$this->dropbox_m->save($data))){
            $result = array('status'=>TRUE, 'id'=>$id);
        }else{
            $result = array('status'=>FALSE, 'message' =>'Gagal menyimpan data');
        }
        
        $this->response($result);
    }
    
    function index_put($id){
        $data = $this->array_from_post(
                array('category', 'label_id','label_en','href','sort'),
                $this->put(), TRUE
        );
        
        if ($this->dropbox_m->save($data, $id)){
            $result = array('status' => TRUE);
        }else{
            $result = array('status'=>FALSE, 'message'=>'Gagal menyimpan perubahan dengan pesan: '. $this->dropbox_m->get_last_message());
        }
        
        $this->response($result);
    }
    
    function index_delete($id){
        if ($this->dropbox_m->delete($id)){
            $result = array('status'=>TRUE);
        }else{
            $result = array('status'=>FALSE, 'message'=>'Gagal menghapus data dengan pesan: '. $this->dropbox_m->get_last_message());
        }
        
        $this->response($result);
    }
    
    private function _proccess_item($item=NULL, $lang = CT_LANG_INDONESIA){
        if ($item){
            $item->label = $lang == CT_LANG_INDONESIA ? $item->label_id : $item->label_en;
            $item->created_dt = date('Y-m-d H:i:s', $item->created);
            $item->modified_dt = date('Y-m-d H:i:s', $item->modified);
            
            if ($item->category){
                //get category name
                $category = $this->dropbox_category_m->get($item->category);
                $item->category_name = CT_LANG_INDONESIA ? $category->label_id : $category->label_en;
                $item->category_name_id = $category->label_id;
                $item->category_name_en = $category->label_en;
            }else{
                $item->category_name = 'No category';
                $item->category_name_id = 'No category';
                $item->category_name_en = 'No category';
            }
        }
        
        return $item;
    }
}

/**
 * Filename : dropbox.php
 * Location : application/controllers/service/dropbox.php
 */
