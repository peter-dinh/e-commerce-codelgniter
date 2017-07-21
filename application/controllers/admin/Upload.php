<?php 
    class Upload extends MY_Controller
    {
        function __construct()
        {
            parent:: __construct();
            $this->load->helper('admin');
        }
        
        function index()
        {
            $this->data['message'] = $this->session->flashdata('message');
            
            $this->load->helper('form');
            if($this->input->post('submit'))
            {
                $this->load->library('upload_library');
                
                $data = $this->upload_library->upload('./upload/product', 'image');
            }
            
            $this->data['temp'] = 'admin/upload/index';
            $this->load->view('admin/main', $this->data);
        }
        
        function upload_files()
        {
            
            $this->load->helper('form');
            
            if($this->input->post('submit'))
            {
                $this->load->library('upload_library');
                $array = $this->upload_library->upload_files('./upload/product', 'image_list');
                
                print_r ($array);
            }
            
            $this->data['temp'] = 'admin/upload/upload_files';
            $this->load->view('admin/main', $this->data);
        }
    }
?>