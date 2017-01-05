<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="eventPhotoModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?php echo $modal_title; ?></h4>
      </div><!-- /.modal-header -->

      <div class="col-sm-10 col-sm-offset-1">
         <div class="modal-body">
        <?php echo form_open('admin/events/event', array('name' => 'event_photo_form', 'id' => 'eventPhotoForm')); ?>
            
            <div class="form-group">
              <label for="eventPhoto">Upload Photo</label>
              <input type="file" class="form-control" name="event_photo" id="eventPhoto">
            </div><!--/.form-group -->
           
      </div><!-- /.modal-body -->
      </div><!-- /.col-sm-10 -->
     


      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" name="submit_details" class="btn btn-primary" id="submitModalForm" value="Upload Photo">
      </div><!-- /.modal-footer -->
    
        <?php echo form_close(); ?>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->