<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="catPhotoModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?php echo $catagory->default_title; ?></h4>
      </div><!-- /.modal-header -->

      <div class="col-sm-10 col-sm-offset-1">
         <div class="modal-body">
        <?php echo form_open_multipart('admin/catagories/photo/' . $catagory->id, array('name' => 'cat_photo_form', 'id' => 'catPhotoForm')); ?>

            <!-- HIDDEN VALUES -->
            <?php echo form_hidden(array('catagory_id' => $catagory->id)); ?>
            
            <div class="form-group">
              <label for="eventPhoto">Upload Photo</label>
              <input type="file" class="form-control" name="cat_photo" id="catPhoto">
            </div><!--/.form-group -->
           
      </div><!-- /.modal-body -->
      </div><!-- /.col-sm-10 -->
     


      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" name="submit_photo" class="btn btn-primary" id="submitModalForm" value="Upload Photo">
      </div><!-- /.modal-footer -->
    
        <?php echo form_close(); ?>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->