<?php 
    class MY_Controller extends CI_Controller
    {
        
        public $data = array();
        
        function __construct()
        {
            parent:: __construct();
            
            $control  = $this->uri->segment(1);
            
            switch ($control) {
                case 'admin':
                    {
                        $this->load->helper('admin');
                        $this->check_login();
                    }
                    break;
                default:
                    {
                       $this->load->model('admin/catalog_model');
                       $input = array();
                       $input['where'] = array('parent_id' => 0);
                       $input['order'] = array('sort_order', 'asc');
                       $catalog = $this->catalog_model->get_list($input);
                       foreach($catalog as  $row)
                       {
                           $input['where'] = array('parent_id' => $row->id);
                           $sub = $this->catalog_model->get_list($input);
                           $row->sub = $sub;
                       }
                       
                       $this->data['catalog_list'] = $catalog;
                       
                       $this->load->model('admin/slide_model');
                       $input = array();
                       $input['order'] = array('sort_order', 'asc');
                       $slide = $this->slide_model->get_list($input);
                       $this->data['slide'] = $slide;
                       
                       $this->load->model('admin/product_model');
                    }
                    break;
            }
        }
        
        private function check_login()
        {
            $controller = $this->uri->rsegment(1);
            $controller = strtolower($controller);
            if(!isset($controller)) redirect(admin_url('login'));
            $login = $this->session->userdata('login');
            if(!$login && $controller != 'login')
                redirect(admin_url('login'));
            if($login && $controller == 'login')
                redirect(admin_url('dashboard'));
        }
    }
?>