<section class="content">
    <div class="row">
      <?php if($this->data['message']){ ?> 
        <div class="alert alert-info alert-dismissible"><?php echo $this->data['message']; ?></div>
      <?php } ?>
    </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh sách Catalog</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Tên danh mục</th>
                  <th>Danh mục cha</th>
                  <th>Thứ tự hiển thị</th>
                  <th>Công cụ</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($list as $row){ ?>
                  <tr>
                    <td><?php echo $row->id; ?></td>
                    <td><?php echo $row->name; ?></td>
                    <td><?php echo $row->parent_id; ?></td>
                    <td><?php echo $row->sort_order; ?></td>
                    <td>
                      <a href="<?php echo admin_url('catalog/edit/').$row->id; ?>"class="btn btn-info btn-xs edit">
                        <i class="fa fa-edit"></i> Edit
                      </a> 
                      <a href="<?php echo admin_url('catalog/del/').$row->id; ?>" class="btn btn-danger btn-xs delete">
                        <i class="fa fa-trash-o"></i> Delete
                      <a>
                    </td>
                  </tr>
                  <?php }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Tên danh mục</th>
                  <th>Danh mục cha</th>
                  <th>Thứ tự hiển thị</th>
                  <th>Công cụ</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    
<script src="/public/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/public/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>

    <script>
      $(function () {
        $("#example1").DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
          "order": [[ 0, "desc" ]]
        });
      });
</script>

<style type="text/css">
  .dataTables_filter
  {
     float:right;
  }
  
</style>