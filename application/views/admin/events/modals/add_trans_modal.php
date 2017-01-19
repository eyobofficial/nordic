<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="addTransModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?php echo $event->default_title; ?></h4>
      </div><!-- /.modal-header -->


      <div class="col-sm-10 col-sm-offset-1">
         <div class="modal-body">
            <?php echo form_open('admin/events/translation', array('name' => 'add_lang_form', 'id' => 'addTranslationForm')); ?>

            <!-- HIDDEN VALUES -->
            <?php echo form_hidden(array('event_id' => $event->id)); ?>

            <legend>Add Translation</legend>
            
            <!-- SELECT LANGUAGE -->
            <div class="form-group">
              <label for="lang">Select Language</label>
              <select name="lang" id="langTitle" class="form-control">
                <?php foreach($all_languages as $language): ?>
                    <option value="<?php echo $language->id; ?>">
                        <?php echo ucwords($language->name); ?>
                    </option>
                <?php endforeach; ?>
              </select>
            </div><!-- /.form-group -->
        
            
            <!-- CATAGORY TITLE -->
            <div class="form-group">
              <label for="eventTitle">Title</label>
              <?php
                $input_attr = array(
                      'name'        => 'event_title',
                      'id'          => 'eventTitle',
                      'class'       => 'form-control',
                      'value'       => $event->default_title
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
                  );

                echo form_textarea($textarea_attr);
              ?>
            </div><!-- .form-group -->
           



         </div><!-- /.modal-body -->
      </div><!-- /.col-sm-10 -->
     


      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" name="submit_add_trans" class="btn btn-primary" id="submitModalForm" value="Save changes">
      </div><!-- /.modal-footer -->
    
        <?php echo form_close(); ?>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->