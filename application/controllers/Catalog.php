<?php 
    class Catalog extends MY_Controller
    {
        function __construct()
        {
            parent:: __construct();
            $this->load->helper('admin');
        }
        
        function index()
        {
            
            $id = $this->uri->segment(3);
            $id = intval($id);
            $where = array('id' => $id);
            
            if($this->catalog_model->check_exists($where) == false)
            {
                $this->session->set_flashdata('thongbao', 'Không tồn tại Danh mục này');
                redirect(base_url().'error');
            }
            
            $input = array();
            $input['where'] = array('catalog_id' => $id );
            $input['order'] = array('created', 'desc');
            $list_product = $this->product_model->get_list($input);
            $this->data['list_product'] = $list_product;
            
               
            $this->data['content'] = 'site/catalog/index';
            $this->load->view('site/layout', $this->data);
        }
    }
?>