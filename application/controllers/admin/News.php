<?php 
    class News extends MY_Controller
    {
        function __construct()
        {
            parent:: __construct();
            $this->load->model('admin/news_model');
            $this->load->helper('admin');
            $this->load->library('form_validation');
            $this->load->helper('form');
        }
        
        function index()
        {
            $this->data['message'] = $this->session->flashdata('message');
            
            $input = array();

            if($this->input->get())
            {
                $id = $this->input->get('maso');
                
                if($id)
                {
                    if(is_numeric($id))
                    {
                        $input['where'] = array('id' => $id);
                    }
                    else
                    {
                        $this->session->set_flashdata('message', "Ma so khong hop le");
                        redirect(admin_url('news'));
                    }
                }
                
                $name = $this->input->get('ten');
                
                if($name)
                {
                    $input['like'] = array('title' => $name);
                }
            }
            
            $result = $this->news_model->get_list($input);
            $this->data['result'] = $result;
            
            $this->data['temp'] = 'admin/news/index';
            $this->load->view('admin/main', $this->data);
        }
        
        function add()
        {
            if($this->input->post())
            {
                $this->form_validation->set_rules('inputTitle', 'Tiêu đề', 'required');
                
                if($this->form_validation->run())
                {
                    $title          = $this->input->post('inputTitle');
                    $intro          = $this->input->post('inputIntro');
                    
                    $image_link     = '';
                    $this->load->library('upload_library');
                    $path           = './upload/news';
                    $data           = $this->upload_library->upload($path, 'image');
                    if(isset($data['file_name']))
                        $image_link = $data['file_name'];
                        
                    $meta_desc      = $this->input->post('inputMetaDes');
                    $meta_key       = $this->input->post('inputMetaKey');
                    $content        = $this->input->post('inputContent');
                    
                    $array = array(
                        'title' => $title,
                        'intro' => $intro,
                        'image_link' => $image_link,
                        'meta_desc' => $meta_desc,
                        'meta_key' => $meta_key,
                        'content' => $content,
                        );
                    
                    if($this->news_model->insert($array))
                    {
                        $this->session->set_flashdata('message', 'Them thanh cong');
                        redirect(admin_url('news'));
                    }
                    else
                    {
                        $this->session->set_flashdata('message', 'Khong them duoc');
                        redirect(admin_url('news'));
                    }
                }
            }
            
            $this->data['temp'] = 'admin/news/add';
            $this->load->view('admin/main', $this->data);
        }
        
        function edit()
        {
            $id = $this->uri->rsegment(3);
            $id = intval($id);
            $this->data['id'] = $id;
            
            $info = $this->news_model->get_info($id);
            
            if(!$info)
            {
                $this->session->set_flashdata('message', 'Không tồn tại bài viết này');
                redirect(admin_url('news'));
            }
            
            $this->data['info'] = $info;
            if($this->input->post())
            {
                $this->form_validation->set_rules('inputTitle', 'Tiêu đề', 'required');
                
                if($this->form_validation->run())
                {
                    $title       = $this->input->post('inputTitle');
                    $intro       = $this->input->post('inputIntro');
                    
                    $image_link  = '';
                    $this->load->library('upload_library');
                    $path        = './upload/news';
                    $data  = $this->upload_library->upload($path, 'image');
                    if(isset($data['file_name']))
                        $image_link = $data['file_name'];
                    
                    $meta_desc   = $this->input->post('inputMetaDes');
                    $meta_key    = $this->input->post('inputMetaKey');
                    $content     = $this->input->post('inputContent');
                    
                    
                    $array = array(
                        'title'      => $title,
                        'intro'      => $intro,
                        'meta_desc'  => $meta_desc,
                        'meta_key'   => $meta_key,
                        'content'    => $content,
                        );
                    
                    if($image_link != '')
                    {
                        $array['image_link'] = $image_link;
                        $image_url = './upload/news/'.$info->image_link;
                        if(file_exists($image_url))
                        unlink($image_url);
                    }
                    
                    if($this->news_model->update($id, $array))
                    {
                        $this->session->set_flashdata('message', "Đã sửa thành công");
                        redirect(admin_url('news'));
                    }
                    else
                    {
                        $this->session->set_flashdata('message', 'Không sửa được');
                        redirect(admin_url('news'));
                    }
                    
                }
            }
            
            
            $this->data['temp'] = 'admin/news/edit';
            $this->load->view('admin/main', $this->data);
        }
        
        function del()
        {
            $id = $this->uri->rsegment(3);
            $id = intval($id);
            

            $info = $this->news_model->get_info($id);
            
            if(!$info)
            {
                $this->session->set_flashdata('message', 'Khong ton tai bai viet');
                redirect(admin_url('news'));
            }
            
            
            $image_url = './upload/news/'.$info->image_link;
            if(file_exists($image_url))
                unlink($image_url);
                
            $this->news_model->del($id);
            $this->session->set_flashdata('message', 'Da xoa thanh cong');
            redirect(admin_url('news'));
        }
    }
?>