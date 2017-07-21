<?php 
    class Dashboard extends MY_Controller
    {
        function index()
        {
            $this->data['temp'] = 'admin/dashboard/index';
            $this->load->view('admin/main', $this->data);
        }
    }
?>