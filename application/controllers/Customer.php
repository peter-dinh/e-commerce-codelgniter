<?php 
    class Customer extends MY_Controller
    {
        function  __construct()
        {
            parent:: __construct();
        }
        
        function check_email()
        {
            $email = $this->input->post('');
            
        }
        
        function register()
        {
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            if($this->input->post())
            {
                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('first_name', 'Họ', 'required');
                $this->form_validation->set_rules('last_name', 'Tên', 'required');
                $this->form_validation->set_rules('address', 'Địa chỉ', 'required');
                $this->form_validation->set_rules('phone', 'Điện thoại', 'required|numeric');
                $this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_lenght[6]');
                $this->form_validation->set_rules('re_caption', 'Nhập lại', 'required|matches[password]');
                $this->form_validation->set_rules('sex', 'Giới tính', 'required|numeric');
                
                if($this->form_validation->run())
                {
                    $email       = $this->input->post('email');
                    $first_name  = $this->input->post('first_name');
                    $mid_name    = $this->input->post('mid_name');
                    $last_name   = $this->input->post('last_name');
                    $address     = $this->input->post('address');
                    $phone       = $this->input->post('phone');
                    $password    = $this->input->post('password');
                    $re_caption  = $this->input->post('re_caption');
                    $sex         = $this->input->post('sex');
                    $company     = $this->input->post('company');
                    $zip_code    = $this->input->post('zip_code');
                    $fax         = $this->input->post('fax');
                    
                    $array = array(
                        'email'       => $email,
                        'first_name'  => $first_name,
                        'mid_name'    => $mid_name,
                        'last_name'   => $last_name,
                        'address'     => $address,
                        'phone'       => $phone,
                        'password'    => md5($password),
                        'sex'         => $sex,
                        'company'     => $company,
                        'zip_code'    => $zip_code,
                        'fax'         => $fax,
                        'created'     => now(),
                        );
                    $this->load->model('admin/customer_model');
                    
                    if($this->customer_model->insert())
                    {
                        $this->session->set_flashdata('thongbao', 'Bạn đã đăng ký thành công! <br /> Vui lòng kiểm tra email để kích hoạt');
                        redirect();
                    }
                    
                }
            }
            $this->data['content'] = 'site/customer/register';
            $this->load->view('site/layout', $this->data);
        }
        
        function login()
        {
            $this->data['content'] = 'site/customer/login';
            $this->load->view('site/layout', $this->data);
        }
    }
?>