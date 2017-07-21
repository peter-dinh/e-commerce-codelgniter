<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <p>Upload File</p>
                </div>
                <form method="post" action = "<?php echo admin_url("upload/upload_files"); ?>" enctype="multipart/form-data" >
                    <div class="box-body">
                        <label>Anh minh hoa</label>
                        <input type="file" name="image" id="image">
                        <br />
                        <label>Anh kem theo:</label><input type="file" name="image_list[]" id="image_list" multiple/>
                        <br />
                    </div>
                    <div class="box-footer">
                        <input type="submit" name="submit" class="btn btn-primary pull-right" value="Tai len" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>