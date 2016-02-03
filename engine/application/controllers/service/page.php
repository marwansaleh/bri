<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Page
 *
 * @author marwansaleh 1:31:58 PM
 */
class Page extends REST_Api {
    private $_remap_fields = array(
        'id'            => 'id',
        'title_id'      => 'title_id',
        'title_en'      => 'title_en',
        'title'         => 'title',
        'link'          => 'link',
        'name'          => 'name',
        'images'        => 'images',
        'editable'      => 'editable',
        'category'      => 'category',
        'content_id'    => 'content_id',
        'content_en'    => 'content_en',
        'content'       => 'content',
        'sort'          => 'sort',
        'date_time'     => 'date_time',
        'created'       => 'created',
        'created_dt'    => 'created_dt',
        'modified'      => 'modified',
        'modified_dt'   => 'modified_dt'
    );
    
    function __construct($config = 'rest') {
        parent::__construct($config);
        
        $this->load->model('page_m');
    }
    
    function index_get($id=NULL){
        $lang = $this->get('lang') ? $this->get('lang') : CT_LANG_INDONESIA;
        if ($id){
            //manipulate result item before return
            $result = $this->remap_fields($this->_remap_fields, $this->_proccess_item($this->page_m->get($id), $lang));
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
                $this->db->like('title_id', $search);
                $this->db->or_like('title_en', $search);
            }
            
            $totalRecords = $this->page_m->get_count($where);
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
                    $this->db->like('title_id', $search);
                    $this->db->or_like('title_en', $search);
                }
                $query_result = $this->page_m->get();
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
    
    function all_get(){
        $result = array();
        
        $lang = $this->get('lang') ? $this->get('lang') : CT_LANG_INDONESIA;
        $all = $this->page_m->get();
        foreach ($all as $item){
            $result[] = $this->_proccess_item($item, $lang);
        }
        if (count($result)){
            $result = $this->remap_fields($this->_remap_fields, $result);
        }
        $this->response($result);
    }
    
    function index_post(){
        $title_id = $this->post('title_id');
        $title_en = $this->post('title_en');
        $link = $this->post('link');
        $category = $this->post('category');
        $name = $this->post('name');
        $sort = $this->post('sort');
        $date_time = $this->post('date_time');
        $content_id = $this->post('content_id');
        $content_en = $this->post('content_en');
        $editable = $this->post('editable');
        $images = $this->post('images');
        
        $data = array(
            'category'      => $category,
            'title_id'      => $title_id,
            'title_en'      => $title_en,
            'link'          => $link,
            'name'          => $name,
            'editable'      => $editable,
            'images'        => is_array($images)?json_encode($images):  json_encode(explode(',', $images)),
            'sort'          => $sort,
            'date_time'     => $date_time,
            'content_id'    => $content_id,
            'content_en'    => $content_en
        );
        
        if (($id=$this->page_m->save($data))){
            $result = array('status'=>TRUE, 'id'=>$id);
        }else{
            $result = array('status'=>FALSE, 'message' =>'Gagal menyimpan data');
        }
        
        $this->response($result);
    }
    
    function index_put($id){
        $data = $this->array_from_post(
                array('category', 'title_id', 'title_en', 'date_time','link', 'editable', 'images', 'name', 'sort','content_id','content_en'),
                $this->put(), TRUE
        );
        
        if (is_array($data['images'])){
            $data['images'] = json_encode($data['images']);
        }else{
            $data['images'] = json_encode(explode(',', $data['images']));
        }
        
        if ($this->page_m->save($data, $id)){
            $result = array('status' => TRUE);
        }else{
            $result = array('status'=>FALSE, 'message'=>'Gagal menyimpan perubahan dengan pesan: '. $this->menu_m->get_last_message());
        }
        
        $this->response($result);
    }
    
    function index_delete($id){
        if ($this->page_m->delete($id)){
            $result = array('status'=>TRUE);
        }else{
            $result = array('status'=>FALSE, 'message'=>'Gagal menghapus data dengan pesan: '. $this->menu_m->get_last_message());
        }
        
        $this->response($result);
    }
    
    private function _proccess_item($item=NULL, $lang = CT_LANG_INDONESIA){
        if ($item){
            $item->title = $lang == CT_LANG_INDONESIA ? $item->title_id : $item->title_en;
            $item->content = $lang==CT_LANG_INDONESIA ? $item->content_id : $item->content_en;
            $item->created_dt = date('Y-m-d H:i:s', $item->created);
            $item->modified_dt = date('Y-m-d H:i:s', $item->modified);
            $item->images = $item->images ? json_decode($item->images) : NULL;
        }
        
        return $item;
    }
}

/**
 * Filename : page.php
 * Location : application/controllers/service/page.php
 */
