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
              <h3 class="box-title">Danh sách Admin</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Name</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($result as $row){ ?>
                  <tr>
                    <td><?php echo $row->id; ?></td>
                    <td><a href="<?php echo admin_url('admin/edit/').$row->id; ?>"><?php echo $row->username; ?></a></td>
                    <td><?php echo $row->name; ?></td>
                    <td><a href="<?php echo admin_url('admin/del/').$row->id; ?>"><div class="text-center"><i class="glyphicon glyphicon-trash"></i></div><a></td>
                  </tr>
                  <?php }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Name</th>
                  <th>Delete</th>
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