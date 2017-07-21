<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <form class="form-horizontal" method="post" action="<?php echo admin_url('slide/edit/'.$id); ?>" enctype="multipart/form-data" >
                    <div class="box-header">
                        <h4>Sửa Slide</h4>
                    </div>
                    
                    <div class="box-body">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                              <li class="bg-gray-active color-palette active"><a href="#info" data-toggle="tab" aria-expanded="true">Thông tin chung</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="info">
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Tên Slide:</label>
                            
                                        <div class="col-sm-10">
                                            <input type="text" value="<?php echo $info->name; ?>" class="form-control" name="inputName" id="inputName" placeholder="Tên Slide">
                                            <?php echo form_error('inputName','<div class="alert alert-danger alert-dismissible">','</div>'); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputLink" class="col-sm-2 control-label">Link:</label>
                            
                                        <div class="col-sm-10">
                                            <input type="text" value="<?php echo $info->link; ?>" class="form-control" name="inputLink" id="inputLink" placeholder="Link">
                                            <?php echo form_error('inputLink','<div class="alert alert-danger alert-dismissible">','</div>'); ?>
                                        </div>
                                    </div>
    

                                    <div class="form-group">
                                        <label for="inputImage" class="col-sm-2 control-label">Hình ảnh:</label>
                            
                                        <div class="col-sm-10">
                                            <div class="input-group text_input_file">
                                                <label class="input-group-btn">
                                                    <span class="btn btn-primary text_input_file">
                                                        Browse&hellip; <input type="file" style="display: none;" name="image" >
                                                    </span>
                                                </label>
                                                <input type="text" class="form-control text_input_file" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-10 col-sm-offset-2">
                                            <img src="<?php if($info->image_link != '') echo base_url().'upload/slide/'.$info->image_link; else echo base_url().'/public/admin/image/no-image.png'; ?>" height="125" >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputInfo" class="col-sm-2 control-label">Mô tả:</label>
                            
                                        <div class="col-sm-10">
                                            <input type="text" value="<?php echo $info->info; ?>" class="form-control" name="inputInfo" id="inputInfo" placeholder="Mô tả">
                                            <?php echo form_error('inputInfo','<div class="alert alert-danger alert-dismissible">','</div>'); ?>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="inputSort" class="col-sm-2 control-label">Thứ tự:</label>
                            
                                        <div class="col-sm-10">
                                            <input type="text" value="<?php echo $info->sort_order; ?>" class="form-control" name="inputSort" id="inputSort" placeholder="Vị trí">
                                            <?php echo form_error('inputSort','<div class="alert alert-danger alert-dismissible">','</div>'); ?>
                                        </div>
                                    </div>
                                   
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" name="submit" class="btn btn-danger pull-right">Sửa Slide</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</section>
<style type="text/css">
    .control-label
    {
        text-align: left;
    }
</style>

<script type="text/javascript">
    $(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });
  
});
</script>
