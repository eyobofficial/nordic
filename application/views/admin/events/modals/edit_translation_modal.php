<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="<?php echo $modal_id; ?>">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?php echo $event->default_title; ?> (<?php echo ucwords($lang->name); ?>)</h4>
      </div><!-- /.modal-header -->


      <div class="col-sm-10 col-sm-offset-1">
         <div class="modal-body">
            <?php echo form_open('admin/events/translation', array('name' => 'edit_trans_form', 'id' => 'editTransForm')); ?>

            <!-- HIDDEN VALUES -->
            <?php echo form_hidden(array('translation_id' => $translation->id, 'event_id' => $event->id)); ?>


            <legend>Edit Translation</legend>
            
            <!-- TRANSLATION TITLE -->
            <div class="form-group">
              <label for="eventTitle">Title</label>
              <?php
                $input_attr = array(
                      'name'        => 'event_title',
                      'id'          => 'eventTitle',
                      'class'       => 'form-control',
                      'value'       => $translation->title
                  );

                echo form_input($input_attr);
              ?>
            </div><!-- /.form-group -->

            

            <!-- CATAGORY DESCRIPTION -->
            <div class="form-group">
              <label for="eventDesc">Description: </label>
              <?php
                $textarea_attr = array(
                      'name'        => 'event_desc',
                      'id'          => 'eventDesc',
                      'class'       => 'form-control',
                      'value'       => $translation->summary
                  );

                echo form_textarea($textarea_attr);
              ?>
            </div><!-- .form-group -->
           



         </div><!-- /.modal-body -->
      </div><!-- /.col-sm-10 -->
     


      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" name="delete_trans" class="btn btn-danger" id="deleteModalForm" value="Delete">
        <input type="submit" name="submit_edit_trans" class="btn btn-primary" id="submitModalForm" value="Save changes">
      </div><!-- /.modal-footer -->
    
        <?php echo form_close(); ?>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->