<?php 
    class Slide extends  MY_Controller
    {
        
        function __construct()
        {
            parent:: __construct();
            $this->load->helper('admin');
            $this->load->model('admin/slide_model');
        }
        
        function index()
        {
            $this->data['message'] = $this->session->flashdata('message');
            
            $input = array();
            $result = $this->slide_model->get_list($input);
            
            $this->data['result'] = $result;
            
            $this->data['temp'] = 'admin/slide/index';
            $this->load->view('admin/main', $this->data);
        }
        
        function add()
        {
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            if($this->input->post())
            {
                $this->form_validation->set_rules('inputName', 'Tên Slide', 'required');
                $this->form_validation->set_rules('inputSort', 'Thứ tự', 'required|numeric');
                
                if($this->form_validation->run())
                {
                    $name       = $this->input->post('inputName');
                    $image_link = '';
                    $this->load->library('upload_library');
                    $data = $this->upload_library->upload('./upload/slide', 'image');
                    if(isset($data['file_name']))
                        $image_link = $data['file_name'];
                    
                    $link       = $this->input->post('inputLink');
                    $info       = $this->input->post('inputInfo');
                    $sort_order = $this->input->post('inputSort');
                    
                    $array = array(
                        'name'        => $name,
                        'image_link'  => $image_link,
                        'link'        => $link,
                        'info'        => $info,
                        'sort_order'  => $sort_order,
                        );
                        
                    if($this->slide_model->insert($array))
                    {
                        $this->session->set_flashdata('message', 'Đã thêm thành công');
                        redirect(admin_url('slide'));
                    }
                    else
                    {
                        $this->session->set_flashdata('message', 'Không thêm được');
                        redirect(admin_url('slide'));
                    }
                }
            }
            
            $this->data['temp'] = 'admin/slide/add';
            $this->load->view('admin/main', $this->data);
        }
        
        
        function edit()
        {
            $id = $this->uri->rsegment(3);
            $id = intval($id);
            $this->data['id'] = $id;
            
            $info = $this->slide_model->get_info($id);
            $x = $info->image_link;
            
            if(!$info)
            {
                $this->session->set_flashdata('message', 'Khong ton tai Slide nay');
                redirect(admin_url('slide'));
            }
            
            $this->data['info'] = $info;
            
            $this->load->library('form_validation');
            $this->load->helper('form');
            if($this->input->post())
            {
                $this->form_validation->set_rules('inputName', 'Tên Slide', 'required');
                $this->form_validation->set_rules('inputSort', 'Thứ tự', 'required|numeric');
                
                
                if($this->form_validation->run())
                {
                    $name       = $this->input->post('inputName');
                    
                    $image_link = '';
                    $this->load->library('upload_library');
                    $data = $this->upload_library->upload('./upload/slide','image');
                    if(isset($data['file_name']))
                        $image_link = $data['file_name'];
                    
                    $link       = $this->input->post('inputLink');
                    $info       = $this->input->post('inputInfo');
                    $sort_order = $this->input->post('inputSort');
                    
                    $array = array(
                        'name'        => $name,
                        'link'        => $link,
                        'info'        => $info,
                        'sort_order'  => $sort_order,
                        );
                    
                    if($image_link != '') 
                    {    
                        $array['image_link'] = $image_link;
                        
                        $image_url = './upload/slide/'.$x;
                        if(file_exists($image_url))
                            unlink($image_url);
                    }
                    
                    if($this->slide_model->update($id, $array))
                    {
                        $this->session->set_flashdata('message', 'Đã cập nhật thành công');
                        redirect(admin_url('slide'));
                    }
                    else
                    {
                        $this->session->set_flashdata('message', 'Không cập nhật được');
                        redirect(admin_url('slide'));
                    }
                }
            }
            
            $this->data['temp'] = 'admin/slide/edit';
            $this->load->view('admin/main', $this->data);
        }
        
        function del()
        {
            $id = $this->uri->rsegment(3);
            $id = intval($id);
            
            $info = $this->slide_model->get_info($id);
            if(!$info)
            {
                $this->session->set_flashdata('message', 'Không tồn tại Slide');
                redirect(admin_url('slide'));
            }
            
            $this->slide_model->del($id);
            $image_url = './upload/slide/'.$info->image_link;
            if(file_exists($image_url))
                unlink($image_url);
            redirect(admin_url('slide'));
        }
        
    }
?>