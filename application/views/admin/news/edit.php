<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <form class="form-horizontal" method="post" action="<?php echo admin_url('news/edit/'.$id) ?>" enctype="multipart/form-data" >
                    <div class="box-header">
                        <h4>Sửa bài viết</h4>
                    </div>
                    
                    <div class="box-body">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                              <li class="bg-gray-active color-palette active"><a href="#info" data-toggle="tab" aria-expanded="true">Thông tin chung</a></li>
                              <li class="bg-gray-active color-palette"><a href="#seo" data-toggle="tab" aria-expanded="false">Seo Onpage</a></li>
                              <li class="bg-gray-active color-palette"><a href="#post" data-toggle="tab" aria-expanded="false">Nội dung bài viết</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="info">
                                    <div class="form-group">
                                        <label for="inputTitle" class="col-sm-2 control-label">Tên:</label>
                            
                                        <div class="col-sm-10">
                                            <input type="text" value="<?php echo $info->title; ?>" class="form-control" name="inputTitle" id="inputName" placeholder="Tên sản phẩm">
                                            <?php echo form_error('inputTitle','<div class="alert alert-danger alert-dismissible">','</div>'); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputIntro" class="col-sm-2 control-label">Giới thiệu:</label>
                    
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="inputIntro" id="inputTitle" placeholder="Title" rows="5" style="resize: none;"><?php echo $info->intro; ?></textarea>
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
                                            <img src="<?php if($info->image_link != '') echo base_url().'upload/news/'.$info->image_link; else echo base_url().'/public/admin/image/no-image.png'; ?>" height="125" >
                                        </div>
                                    </div>
                                </div>
                              
                                <div class="tab-pane" id="seo">
                                    
                                    <div class="form-group">
                                        <label for="inputMetaDes" class="col-sm-2 control-label">Meta description:</label>
                    
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="inputMetaDes" id="inputMetaDes" placeholder="Meta description"><?php echo $info->meta_desc; ?></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputMetaKey" class="col-sm-2 control-label">Meta keywords:</label>
                    
                                        <div class="col-sm-10">
                                            <textarea class="form-control"  name="inputMetaKey" id="inputMetaKey" placeholder="Meta keywords"><?php echo $info->meta_key; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="tab-pane" id="post">
                                    <div class="form-group">
                                        <label for="inputTitle" class="col-sm-2 control-label">Nội dung:</label>
                    
                                        <div class="col-sm-10">
                                            <textarea id="editor1" name="inputContent" rows="10" cols="80">
                                            <?php echo $info->content; ?>
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" name="submit" class="btn btn-danger pull-right">Sửa sản phẩm</button>
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

<script src="/public/admin/plugins/ckeditor/ckeditor.js"></script>

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

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>