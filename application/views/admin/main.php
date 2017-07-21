<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('admin/head'); ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <?php $this->load->view('admin/nav_admin'); ?>
            </header>
            
                <?php $this->load->view('admin/menu_admin'); ?>
                
                <div class="content-wrapper">
                    <?php $this->load->view('admin/content_head'); ?>
                    
                    <?php $this->load->view($temp); ?>
                </div>
            <footer class="main-footer">
                <?php $this->load->view('admin/footer'); ?>
            </footer>
        </div>
    </body>
</html>