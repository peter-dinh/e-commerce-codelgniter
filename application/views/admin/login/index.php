<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('admin/login/head'); ?>
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
            <a href="#"><b>Nora</b> Shop</a>
            <?php echo form_error('login','<h4 class="alert alert-danger">', '</h4>'); ?>
         </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
            <p class="login-box-msg">Đăng nhập vào hệ thống</p>
            
            <form action="" method="post">
            <div class="form-group has-feedback">
                <input type="text" name='username' class="form-control" placeholder="Username">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name='password' class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                         <input type="checkbox"> Ghi nhớ
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <a href="#">Quên mật khẩu</a><br>
    </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->
    </body>
</html>