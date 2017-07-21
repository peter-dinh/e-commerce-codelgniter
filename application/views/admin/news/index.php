<section class="content">
    <div class="row">
      <?php if($this->data['message']){ ?> 
        <div class="alert alert-info alert-dismissible"><?php echo $this->data['message']; ?></div>
      <?php } ?>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <form class="form-inline" role="form" method="get" action="<?php echo admin_url("news"); ?>">
                        <div class="form-group">
                            <label>ID bài viết: </label>
                            <input type="text" name="maso"/>
                        </div>
                        
                        <div class="form-group">
                            <label>Tên bài viết: </label>
                            <input type="text" name="ten"/>
                        </div>
                        
                        
                        <div class="form-group">
                            <button class="btn btn-default" type="submit">Lọc</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh sách bài viết</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Tên bài viết</th>
                  <th>Ngày tạo</th>
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
                            <img src="<?php echo base_url()."upload/news/".$row->image_link ?>" height="50"></img>
                            <div class="form-group name_news">
                                <p><?php echo "   ".$row->title; ?></p>
                                <p>  Đã xem: <?php echo $row->count_view; ?></p>
                            </div>
                        </div>
                    </td>
                    
                    <td>
                        <?php echo get_date($row->created); ?>
                    </td>
                    
                    <td>
                        <div class="form-inline">
                            <a href="<?php echo admin_url('news/see/').$row->id; ?>"class="btn btn-warning btn-xs star">
                                <i class="fa fa-eye"></i> See
                            </a>
                            <a href="#"></a>
                            <a href="<?php echo admin_url('news/edit/').$row->id; ?>"class="btn btn-info btn-xs edit">
                                <i class="fa fa-edit"></i> Edit
                            </a> 
                            <a href="<?php echo admin_url('news/del/').$row->id; ?>" class="btn btn-danger btn-xs delete">
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
                  <th>Ngày tạo</th>
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
  
  .name_news
  {
     margin-left: 10px;
  }
  
  .text-decoration
  {
      text-decoration: line-through;
  }
  
</style>