<?php 
    class Login extends MY_Controller
    {
        function __construct()
        {
            parent:: __construct();
            $this->load->library('form_validation');
            $this->load->helper('form');
            $this->load->helper('admin');
            $this->load->model('admin/admin_model');
        }
        
        function  index()
        {
            
            if($this->input->post())
            {
                $this->form_validation->set_rules('login', 'login', 'callback_check_login');
                if($this->form_validation->run())
                {
                    $this->session->set_userdata('login', true);
                    redirect(admin_url('dashboard'));
                }
            }
            
            $this->load->view('admin/login/index');
        }
        
        function check_login()
        {
            $username  = $this->input->post('username');
            $password = $this->input->post('password');
            $password = md5($password);
            
            
            $where = array('username' => $username, 'password' => $password);
            
            if($this->admin_model->check_exists($where) == true)
                return true;
            $this->form_validation->set_message(__FUNCTION__, "Không đăng nhập được");
            return false;
                
        }
    }
?>