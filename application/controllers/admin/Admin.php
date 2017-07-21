<?php 
    class Admin extends MY_Controller
    {
        
        function __construct()
        {
            parent:: __construct();
            $this->load->model('admin/admin_model');
        }
        
        function index()
        {
            $input = array();
            $result = $this->admin_model->get_list($input);
            $this->data['result'] = $result;
            
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
            $this->data['temp'] = 'admin/admin/index';
            
            $this->load->view('admin/main', $this->data);
        }
        
        public function check_username()
        {
            $username = $this->input->post('taikhoan');
            $where = array('username' => $username);
            if($this->admin_model->check_exists($where))
            {
                $this->form_validation->set_message(__FUNCTION__, "Tai khoan da ton tai");
                return false;
            }
            return true;
        }
        
        function add()
        {
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            if($this->input->post())
            {
                $this->form_validation->set_rules('ten', "Tên", 'required');
                $this->form_validation->set_rules('taikhoan', 'Tài khản', 'required|callback_check_username');
                $this->form_validation->set_rules('matkhau', 'Mật khẩu', 'required|min_length[6]');
                $this->form_validation->set_rules('nhaplai', 'Nhập lại', 'required|matches[matkhau]');
                
                if($this->form_validation->run())
                {
                    $name        = $this->input->post('ten');
                    $username    = $this->input->post('taikhoan');
                    $password    = $this->input->post('matkhau');
                    $re_password = $this->input->post('nhaplai');
                    
                    $data = array(
                        'name' => $name,
                        'username' => $username,
                        'password' => md5($password),
                    );
                    
                    
                    if($this->admin_model->insert($data))
                        $this->session->set_flashdata('message','Đã thêm thành công');
                    else
                        $this->session->set_flashdata('message', 'Không thêm được tài khoản');
                    redirect(admin_url('admin'));
                }
                
            }
            
            $this->data['temp'] = 'admin/admin/add';
            $this->load->view('admin/main', $this->data);
        }
        
        
        // Cần thêm hàm check username update
        
        public function edit()
        {
            $id = $this->uri->rsegment(3);
            $id = intval($id);
            
            $result = $this->admin_model->get_info($id);
            
            if(!$result)
            {
                $this->session->set_flashdata('message', "Khong ton tai tai khoan nay");
                redirect(admin_url('admin'));
            }
            
            
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            $this->data['result'] = $result;
            
            if($this->input->post())
            {
                $this->form_validation->set_rules('ten', "Tên", 'required');
                $this->form_validation->set_rules('taikhoan', 'Tài khản', 'required');
                
                $pass  = $this->input->post('matkhau');
                if($pass)
                {
                    $this->form_validation->set_rules('matkhau', 'Mật khẩu', 'required|min_length[6]');
                    $this->form_validation->set_rules('nhaplai', 'Nhập lại', 'required|matches[matkhau]');
                }
                if($this->form_validation->run())
                {
                    $name            = $this->input->post('ten');
                    $username        = $this->input->post('taikhoan');
                    
                    $data = array(
                        "name"     => $name,
                        "username" => $username
                        );
                        
                    if($pass)
                    {
                        $data['password'] = md5($this->input->post('matkhau'));
                    }
                    
                    if($this->admin_model->update($id, $data))
                        $this->session->set_flashdata('message', 'Tài khoản đã được cập nhật lại');
                    else
                        $this->session->set_flashdata('message', 'Không cập nhật được!');
                    redirect(admin_url('admin'));
                }
            }
            
            $this->data['temp'] = 'admin/admin/edit';
            $this->load->view('admin/main', $this->data);
        }
        
        public function del()
        {
            $id = $this->uri->rsegment(3);
            $id = intval($id);
            
            $result = $this->admin_model->get_info($id);
            
            if(!$result)
            {
                $this->session->set_flashdata('message', 'Không tồn tại admin');
                redirect(admin_url('admin'));
            }
                
            $this->admin_model->del($id);
            $this->session->set_flashdata('message', 'Đã xóa thành công');
            redirect(admin_url('admin'));
        }
        
        public function logout()
        {
            $this->session->unset_userdata('login');
            redirect(admin_url('login'));
        }
    }
 ?>