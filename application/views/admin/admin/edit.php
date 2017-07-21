<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Sửa tài khoản Admin</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <form method='post' action=''>
        <div class="box-body">
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                  <label> Tên admin:</label>
                  <input type="text" name='ten' class="form-control" value="<?php echo $result->name; ?>" placeholder="Tên admin ...">
                  <?php echo form_error('ten','<div class="alert alert-danger alert-dismissible">','</div>'); ?>
                </div>
                <div class="form-group">
                  <label> Tài khoản:</label>
                  <input type="text" name='taikhoan' class="form-control" value="<?php echo $result->username; ?>" placeholder="Tài khoản ...">
                  <?php echo form_error('taikhoan','<div class="alert alert-danger alert-dismissible">','</div>'); ?>
                </div>
                <div class="form-group">
                  <label> Mật khẩu:</label>
                  <input type="password" name='matkhau' class="form-control" placeholder="Mật khẩu ...">
                  <?php echo form_error('matkhau','<div class="alert alert-danger alert-dismissible">','</div>'); ?>
                </div>
                <div class="form-group">
                  <label> Nhập lại:</label>
                  <input type="password" name='nhaplai' class="form-control" placeholder="Nhập lại ...">
                  <?php echo form_error('nhaplai','<div class="alert alert-danger alert-dismissible">','</div>'); ?>
                </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <p class='pull-left'>Nếu muốn đổi mật khẩu vui lòng nhập mật khẩu hợp lệ</p>
          <button type="submit" class="btn btn-primary pull-right">Cập nhật</button>
        </div>
        </form>
      </div>
</section>