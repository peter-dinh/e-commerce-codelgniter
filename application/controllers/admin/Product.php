<?php 
    class Product extends MY_Controller
    {
        function __construct()
        {
            parent:: __construct();
            $this->load->model('admin/product_model');
        }
        
        function index()
        {
            $id = $this->input->get('maso');
            $id = intval($id);
            $input = array();
            
            $input['where'] = array();
            if($id > 0)
            {
                $input['where']['id'] = $id;
            }
            $name = $this->input->get('ten');
            if($name)
            {
                $input['like'] = array('name' => $name);
            }
            $catalog_id = $this->input->get('danhmuc');
            $catalog_id = intval($catalog_id);
            if($catalog_id > 0)
            {
                $input['where']['catalog_id'] = $catalog_id;
            }

            $this->load->model('admin/product_model');
            $this->data['result'] = $this->product_model->get_list($input);
            
            $this->load->model('admin/catalog_model');
            $input = array();
            $input['where'] = array('parent_id' => 0);
            $catalog = $this->catalog_model->get_list($input);
            foreach ($catalog as $row)
            {
                $input['where'] = array('parent_id' => $row->id);
                $sub = $this->catalog_model->get_list($input);
                $row->sub = $sub;
            }
            $this->data['catalog'] = $catalog;
            
            //lay nội dung của biến message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
            
            $this->data['temp'] = 'admin/product/index';
            $this->load->view('admin/main', $this->data);
        }
        
        
        function add()
        {
            $this->load->model('admin/catalog_model');
            $input = array();
            $input['where'] = array('parent_id' => 0);
            $catalog = $this->catalog_model->get_list($input);
            foreach ($catalog as $row)
            {
                $input['where'] = array('parent_id' => $row->id);
                $sub = $this->catalog_model->get_list($input);
                $row->sub = $sub;
            }
            $this->data['catalog'] = $catalog;
            
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            if($this->input->post())
            {
                $this->form_validation->set_rules('inputName', 'Tên sản phẩm', 'required');
                $this->form_validation->set_rules('inputPrice', 'Giá gốc', 'required');
                $this->form_validation->set_rules('inputCatalog', 'Danh mục', 'required|numeric');
                if($this->form_validation->run())
                {
                    $name        = $this->input->post('inputName');
                    $catalog_id  = $this->input->post('inputCatalog');
                    $price       = $this->input->post('inputPrice');
                    $price       = str_replace(',', '', $price);
                    
                    $this->load->library('upload_library');
                    $upload_path = './upload/product';
                    $upload_data = $this->upload_library->upload($upload_path, 'image');  
                    $image_link = '';
                    if(isset($upload_data['file_name']))
                    {
                        $image_link = $upload_data['file_name'];
                    }
                    //upload cac anh kem theo
                    $image_list = array();
                    $image_list = $this->upload_library->upload_files($upload_path, 'image_list');
                    $image_list = json_encode($image_list);                
    
                    $discount = $this->input->post('inputSale');
                    $discount = str_replace(',', '', $discount);
                    $gifts = $this->input->post('inputGifts');
                    $site_title = $this->input->post('inputTitle');
                    $meta_desc = $this->input->post('inputMetaDes');
                    $meta_key = $this->input->post('inputMetaKey');
                    $content = $this->input->post('inputContent');
                    
                    $array = array(
                        'name' => $name,
                        'catalog_id' => $catalog_id,
                        'price' => $price,
                        'discount' => $discount,
                        'image_link' => $image_link,
                        'image_list' => $image_list,
                        'gifts' => $gifts,
                        'site_title' => $site_title,
                        'meta_desc' => $meta_desc,
                        'meta_key' => $meta_key,
                        'content' => $content,
                        );
                    
                    if($this->product_model->insert($array))
                    {
                        $this->session->set_flashdata('message', 'Da them thanh cong');
                        redirect(admin_url('product'));
                    }
                    else
                    {
                        $this->session->set_flashdata('message', 'Khong them duoc');
                        redirect(admin_url('product'));
                    }
                    
                }
            }
            
            $this->data['temp'] = 'admin/product/add';
            $this->load->view('admin/main', $this->data);
        }
        
        function edit()
        {
            
            $this->load->model('admin/catalog_model');
            $input = array();
            $input['where'] = array('parent_id' => 0);
            $catalog = $this->catalog_model->get_list($input);
            foreach ($catalog as $row)
            {
                $input['where'] = array('parent_id' => $row->id);
                $sub = $this->catalog_model->get_list($input);
                $row->sub = $sub;
            }
            $this->data['catalog'] = $catalog;
            
            
            $id = $this->uri->segment(4);
            $id = intval($id);
            $this->data['id'] = $id;
            
            $this->load->model('admin/product_model');
            $info = $this->product_model->get_info($id);
            $this->data['info'] =$info;
            
            
            if(!$info)
            {
                $this->session->set_flashdata('message', 'Không tồn tại sản phẩm này');
                redirect(admin_url('product'));
            }
            
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            if($this->input->post())
            {
                $this->form_validation->set_rules('inputName', 'Tên sản phẩm', 'required');
                $this->form_validation->set_rules('inputPrice', 'Giá gốc', 'required');
                $this->form_validation->set_rules('inputCatalog', 'Danh mục', 'required|numeric');
                if($this->form_validation->run())
                {
                    $name        = $this->input->post('inputName');
                    $catalog_id  = $this->input->post('inputCatalog');
                    $price       = $this->input->post('inputPrice');
                    $price       = str_replace(',', '', $price);
                    
                    $this->load->library('upload_library');
                    $upload_path = './upload/product';
                    $upload_data = $this->upload_library->upload($upload_path, 'image');  
                    $image_link = '';
                    if(isset($upload_data['file_name']))
                    {
                        $image_link = $upload_data['file_name'];
                    }
                    //upload cac anh kem theo
                    $image_list = array();
                    $image_list = $this->upload_library->upload_files($upload_path, 'image_list');
                    $image_list_json = json_encode($image_list);                
    
                    $discount = $this->input->post('inputSale');
                    $discount = str_replace(',', '', $discount);
                    $gifts = $this->input->post('inputGifts');
                    $site_title = $this->input->post('inputTitle');
                    $meta_desc = $this->input->post('inputMetaDes');
                    $meta_key = $this->input->post('inputMetaKey');
                    $content = $this->input->post('inputContent');
                    
                    $array = array(
                        'name' => $name,
                        'catalog_id' => $catalog_id,
                        'price' => $price,
                        'discount' => $dicount,
                        'gifts' => $gifts,
                        'site_title' => $site_title,
                        'meta_desc' => $meta_desc,
                        'meta_key' => $meta_key,
                        'content' => $content,
                        );
                        
                    if($image_link != '')
                    {
                        $array['image_link'] = $image_link;
                        $image_url = './upload/product/'.$info->image_link;
                        if(file_exists($image_url))
                            unlink($image_url);
                    }
                    
                    if(!empty($image_list))
                    {
                        $array['image_list'] = $image_list_json;
                        $image = json_decode($info->image_list);
                        foreach($image as $value)
                        {
                            $image_url = './upload/product/'.$value;
                            if(file_exists($image_url))
                                unlink($image_url);
                        }
                    }
                    
                    if($this->product_model->update($id,$array))
                    {
                        $this->session->set_flashdata('message', 'Da them thanh cong');
                        redirect(admin_url('product'));
                    }
                    else
                    {
                        $this->session->set_flashdata('message', 'Khong them duoc');
                        redirect(admin_url('product'));
                    }
                }
            }
            $this->data['temp'] = 'admin/product/edit';
            $this->load->view('admin/main', $this->data);
        }
        
        
        function del()
        {
            $id = $this->uri->segment(4);
            $id = intval($id);
            
            $this->load->model('admin/product_model');
            $info = $this->product_model->get_info($id);
            
            if(!$info)
            {
                $this->session->set_flashdata('message', 'Khong ton tai san pham nay');
                redirect(admin_url('product'));
            }
            
            $image_url = './upload/product.'.$info->image_link;
            if(file_exists($image_url))
                unlink($image_url);
            
            $x = json_decode($info->image_list);
            foreach ($x as $value) {
                $image_url = './upload/product/'.$value;
                if(file_exists($image_url))
                    unlink($image_url);
            }
            
            $this->product_model->del($id);
            $this->session->set_flashdata('message', 'Khong xoa duoc');
            redirect(admin_url('product'));
        }
    }
?>