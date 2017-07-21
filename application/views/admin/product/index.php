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
                    <form class="form-inline" role="form" method="get" action="<?php echo admin_url("product"); ?>">
                        <div class="form-group">
                            <label>Mã số: </label>
                            <input type="text" name="maso"/>
                        </div>
                        
                        <div class="form-group">
                            <label>Tên: </label>
                            <input type="text" name="ten"/>
                        </div>
                        
                        <div class="form-group">
                            <label>Thể loại: </label>
                            <select class="form-control" name="danhmuc">
                                <option value=""></option>
                                <?php 
                                    foreach($catalog as $row)
                                    {
                                        if(count($row->sub) > 0)
                                        {
                                ?>      
                                    <optgroup label="<?php echo $row->name; ?>">
                                        <?php foreach($row->sub as $row_sub){ ?>
                                        <option value="<?php echo $row_sub->id; ?>"><?php echo $row_sub->name; ?></option>
                                        <?php } ?>
                                    </optgroup>                                
                                <?php             
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <button class="btn btn-default" type="submit">Lọc</button>
                        </div>
                        <div class="form-group">
                            <a class="btn btn-default" href="<?php echo admin_url('product') ?>">Làm mới</a>
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
              <h3 class="box-title">Danh sách Admin</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Tên sản phẩm</th>
                  <th>Giá</th>
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
                            <img src="<?php echo base_url()."upload/product/".$row->image_link ?>" height="50"></img>
                            <div class="form-group name_product">
                                <p><?php echo "   ".$row->name ?></p>
                                <p>   Đã bán: <?php echo $row->buyed; ?> | Đã xem: <?php echo $row->view ?></p>
                            </div>
                        </div>
                    </td>
                    
                    <td>
                        <?php 
                            if($row->discount > 0) 
                                echo "<p class=\"text-danger\">".number_format($row->price - $row->discount)."</p><p class=\"text-decoration\">".number_format($row->price)."<p>";
                            else 
                                echo "<p class=\"text-danger\">".number_format($row->price)."</p>" 
                        ?>
                    </td>
                    
                    <td>
                        <?php echo get_date($row->created); ?>
                    </td>
                    
                    <td>
                        <div class="form-inline">
                            <a href="<?php echo admin_url('product/see/').$row->id; ?>"class="btn btn-warning btn-xs star">
                                <i class="fa fa-eye"></i> See
                            </a>
                            <a href="#"></a>
                            <a href="<?php echo admin_url('product/edit/').$row->id; ?>"class="btn btn-info btn-xs edit">
                                <i class="fa fa-edit"></i> Edit
                            </a> 
                            <a href="<?php echo admin_url('product/del/').$row->id; ?>" class="btn btn-danger btn-xs delete">
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
                  <th>Tên sản phẩm</th>
                  <th>Giá</th>
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
  
  .name_product
  {
     margin-left: 10px;
  }
  
  .text-decoration
  {
      text-decoration: line-through;
  }
  
</style>