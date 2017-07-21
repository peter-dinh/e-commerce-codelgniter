<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Thêm Catalog</h3>

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
                  <label> Tên:</label>
                  <input type="text" name='ten' class="form-control" placeholder="Tên danh mục ...">
                  <?php echo form_error('ten','<div class="alert alert-danger alert-dismissible">','</div>'); ?>
                </div>
                <div class="form-group">
                  <label> Danh mục cha:</label>
                  <select class="form-control" name="parent">
                      <option value="0"> Là danh mục cha</option>
                      <?php foreach ($list as $value) {?>
                      <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                      <?php } ?>
                  </select>
                  <?php echo form_error('parent','<div class="alert alert-danger alert-dismissible">','</div>'); ?>
                </div>
                <div class="form-group">
                  <label> Thứ tự hiện thị:</label>
                  <input type="text" name='stt' class="form-control" placeholder="Thứ tự hiện thị ...">
                  <?php echo form_error('stt','<div class="alert alert-danger alert-dismissible">','</div>'); ?>
                </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <p class='pull-left'></p>
          <button type="submit" class="btn btn-primary pull-right">Thêm mới</button>
        </div>
        </form>
      </div>
</section>