<?php 
    class Home extends MY_Controller
    {
        function __construct()
        {
            parent:: __construct();
        }
        
        function index()
        {
            $this->load->model('admin/product_model');
            
            $input = array();
            $input['where'] = array('feature' => '1');
            $input['order'] = array('id' => 'desc');
            $input['limit'] = array('3', '0');
            $featured_product1 = $this->product_model->get_list($input);
            $this->data['featured_product1'] = $featured_product1;
            
            
            $input = array();
            $input['where'] = array('feature' => '1');
            $input['order'] = array('id' => 'desc');
            $input['limit'] = array('3', '3');
            $featured_product2 = $this->product_model->get_list($input);
            $this->data['featured_product2'] = $featured_product2;
            
            
            $input = array();
            $input['order'] = array('created', 'desc');
            $input['limit'] = array('4', '0');
            $new_product = $this->product_model->get_list($input);
            $this->data['new_product'] = $new_product;
            
            
            $input = array();
            $input['order'] = array('buyed', 'desc');
            $input['limit'] = array('4', '0');
            $popular_product = $this->product_model->get_list($input);
            $this->data['popular_product'] = $popular_product;
            
            
            $input = array();
            $input['order'] = array('rate_count', 'desc');
            $input['limit'] = array('4', '0');
            $rating_product = $this->product_model->get_list($input);
            $this->data['rating_product'] = $rating_product;
            
            
            $input = array();
            $input['where'] = array('gifts !=' => '');
            $input['order'] = array('view', 'desc');
            $input['limit'] = array('4', '0');
            $gifts_product = $this->product_model->get_list($input);
            $this->data['gifts_product'] = $gifts_product;
            
            
            $input = array();
            $input['order'] = array('discount', 'desc');
            $input['limit'] = array('4', '0');
            $sale_product = $this->product_model->get_list($input);
            $this->data['sale_product'] = $sale_product;
            
            
            $input = array();
            $input['order'] = array('view', 'desc');
            $input['limit'] = array('3', '0');
            $record_product1 = $this->product_model->get_list($input);
            $this->data['record_product1'] = $record_product1;
            
            
            $input = array();
            $input['order'] = array('view','desc');
            $input['limit'] = array('3', '3');
            $record_product2 = $this->product_model->get_list($input);
            $this->data['record_product2'] = $record_product2;
            

            $this->data['content'] = 'site/home/index';
            $this->load->view('site/layout',$this->data);
        }
    }
?>