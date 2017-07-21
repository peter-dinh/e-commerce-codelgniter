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
              <h3 class="box-title">Danh sách slide</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Tên bài viết</th>
                  <th>Thu tu</th>
                  <th>Công cụ</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($result as $row){ ?>
                  <tr>
                    <td>
                        <?php echo $row->id; ?>
                    </td>
                    
                    <td>
                        <div class="form-inline">
                            <img src="<?php echo base_url()."upload/slide/".$row->image_link; ?>" height="50"></img>
                            <div class="form-group name_slide">
                                <p><?php echo "   ".$row->name; ?></p>
                            </div>
                        </div>
                    </td>
                    
                    <td>
                        <?php echo $row->sort_order; ?>
                    </td>
                    
                    <td>
                        <div class="form-inline">

                            <a href="<?php echo admin_url('slide/edit/').$row->id; ?>"class="btn btn-info btn-xs edit">
                                <i class="fa fa-edit"></i> Edit
                            </a> 
                            <a href="<?php echo admin_url('slide/del/').$row->id; ?>" class="btn btn-danger btn-xs delete">
                                <i class="fa fa-trash-o"></i> Delete
                            <a>
                        </div>
                    </td>
                  </tr>
                  <?php }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Tên bài viết</th>
                  <th>Thu tu</th>
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
  
  .name_slide
  {
     margin-left: 10px;
  }
  
  .text-decoration
  {
      text-decoration: line-through;
  }
  
</style>