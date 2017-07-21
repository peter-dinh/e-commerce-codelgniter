<?php 
    class Sendmail extends MY_Controller
    {
        function __construct()
        {
            parent:: __construct();
        }
        
        function index()
        {
            $config['protocol']     = 'smtp';
            $config['charset']  = 'utf-8';
            $config['mailtype'] = 'html';
            $config['wordwrap'] = TRUE;
            $config['smtp_host']    = 'ssl://smtp.googlemail.com'; //neu sử dụng gmail
            $config['smtp_user']    = 'dinhtai018@gmail.com';
            $config['smtp_pass']    = 'unpjkmgajosgyxzv';
            $config['smtp_port']    = '465'; //nếu sử dụng gmail
            $config['smtp_crypt']   = 'ssl';
            $config['charset']      = 'iso-8859-1';
            
            $this->load->library('email', $config);
            
            $this->email->from('dinhtruong018@gmail.com');
            $this->email->to('dinhtruong018@gmail.com');
           
            
            $this->email->subject('Email Test');
            $this->email->message('Testing the email class.');
            
            if($this->email->send())
            {
                 echo $this->email->print_debugger();
            echo "Đã gửi thành công";
            }
            else
            {
                echo $this->email->print_debugger();
            echo "Không gửi được";
            }
        }
    }
?>