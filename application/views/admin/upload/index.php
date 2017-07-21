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
                    <p>Upload Image</p>
                </div>
                <form enctype="multipart/form-data" method="post" class="form-inline"  action = "<?php echo admin_url("upload"); ?>">
                <div class="box-body">
                    <div class="input-group text_input_file">
                        <label class="input-group-btn">
                            <span class="btn btn-primary text_input_file">
                                Browse&hellip; <input type="file" style="display: none;" name="image" >
                            </span>
                        </label>
                        <input type="text" class="form-control text_input_file" readonly>
                    </div>
                </div>
                <div class="box-footer">
                    <input type="submit" name="submit" class="btn btn-primary pull-right" value="Tai len" />
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
<style type="text/css">
    .text_input_file
    {
        width: 100%;
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