<?php 
    class Login extends MY_Controller
    {
        function __construct()
        {
            parent:: __construct();
        }
        
        function index()
        {
            $this->data['content'] = 'site/login/index';
            $this->load->view('site/layout', $this->data);
        }
    }
?>