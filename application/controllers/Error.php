<?php 
    class Error extends MY_Controller
    {
        function __construct()
        {
            parent:: __construct();
        }
        
        function index()
        {
            $this->data['content'] = 'site/blocks/404';
            $this->load->view('site/layout', $this->data);
        }
    }
?>