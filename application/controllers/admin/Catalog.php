<?php 
    class Catalog extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('admin/catalog_model');
            $this->load->helper('admin');
        }
        
        function index()
        {
            
            $this->data['message'] = $this->session->flashdata('message');
            
            $input = array();
            $list = $this->catalog_model->get_list($input);
            $this->data['list'] = $list;
            
            
            $this->data['temp'] = 'admin/catalog/index';
            $this->load->view('admin/main', $this->data);
            
        }
        
        function check_stt()
        {
            return true;
        }
        
        function add()
        {
            
            $this->load->library('form_validation');
            $this->load->helper('form');
            if($this->input->post())
            {
                $this->form_validation->set_rules('ten', "Tên danh mục", "required");
                $this->form_validation->set_rules('stt', "Thứ tự hiện thị", "required|callback_check_stt");
            }
            if($this->form_validation->run())
            {
                $name        = $this->input->post('ten');
                $parent_id   = $this->input->post('parent');
                $sort_order  = $this->input->post('stt');
                
                $array = array(
                    "name"        => $name,
                    "parent_id"   => $parent_id,
                    "sort_order"  => intval($sort_order),
                    );
                    
                if($this->catalog_model->insert($array))
                {
                    $this->session->set_flashdata('message', "Đã thêm danh mục thành công");
                    redirect(admin_url('catalog'));
                }
                else
                {
                    $this->session->set_flashdata('message', "Không thêm được");
                    redirect(admin_url('catalog'));
                }
            }
            $input = array();
            $input['where'] = array('parent_id' => '0');
            $list = $this->catalog_model->get_list($input);
            $this->data['list'] = $list;
            $this->data['temp'] = 'admin/catalog/add';
            $this->load->view('admin/main', $this->data);
        }
        
        function edit()
        {
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            $id = $this->uri->rsegment(3);
            $id = intval($id);
            
            $info = $this->catalog_model->get_info($id);
            if(!$info)
            {
                $this->session->set_flashdata('message', "Không tài tại danh mục này");
                redirect(admin_url('catalog'));
            }
            $this->data['info'] = $info;
            
            if($this->input->post())
            {
                $this->form_validation->set_rules('ten', 'Tên danh mục', "required");
                $this->form_validation->set_rules('stt', "Thứ thự danh mục", "required");
            }
            
            if($this->form_validation->run())
            {
                $name       = $this->input->post('ten');
                $parent_id  = $this->input->post('parent');
                $sort_order = $this->input->post('stt');
                
                $array = array(
                    "name"        => $name,
                    "parent_id"   => intval($parent_id),
                    "sort_order"  => intval($sort_order),
                    );
                    
                if($this->catalog_model->update($id, $array))
                {
                    $this->session->set_flashdata('message', 'Đã sửa thành công');
                    redirect(admin_url('catalog'));
                }
                else
                {
                    $this->session->set_flashdata('message', 'Không sửa được');
                    redirect(admin_url('catalog'));
                }
            }
            
            $input = array();
            $input['where'] = array('parent_id' => '0');
            $list = $this->catalog_model->get_list($input);
            $this->data['list'] = $list;
            $this->data['temp'] = "admin/catalog/edit";
            $this->load->view('admin/main', $this->data);
        }
        
        function del()
        {
            $id = $this->uri->rsegment(3);
            $id = intval($id);
            
            $where = array("id" => $id);
            if($this->catalog_model->check_exists($where) == FALSE)
            {
                $this->session->set_flashdata('message', "Không tồn tại danh mục này");
                redirect(admin_url('catalog'));
            }
            
            $this->load->model('admin/product_model');
            $where = array('catalog_id' => $id);
            if($this->product_model->check_exists($where) == true)
            {
                $this->session->set_flashdata('message', "Danh mục này có chứa sản phẩm! Bạn vui lòng xóa hoặc sửa những sản phẩm đó");
                redirect(admin_url('catalog'));
            }
            
            $this->catalog_model->del($id);
            $this->session->set_flashdata('message', "Đã xóa thành công");
            redirect(admin_url('catalog'));
        }
        
    }
    
?>