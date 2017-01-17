<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="addLangModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?php echo $catagory->default_title; ?></h4>
      </div><!-- /.modal-header -->


      <div class="col-sm-10 col-sm-offset-1">
         <div class="modal-body">
            <?php echo form_open('admin/catagories/translation', array('name' => 'add_lang_form', 'id' => $modal_id)); ?>

            <!-- HIDDEN VALUES -->
            <?php echo form_hidden(array('cat_id' => $catagory->id)); ?>


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
              <label for="catTitle">Title</label>
              <?php
                $input_attr = array(
                      'name'        => 'cat_title',
                      'id'          => 'catTitle',
                      'class'       => 'form-control',
                      'placeholder' => 'Example: Sport, Concert, Theatre',
                      'value'       => $catagory->default_title
                  );

                echo form_input($input_attr);
              ?>
            </div><!-- /.form-group -->

            

            <!-- CATAGORY DESCRIPTION -->
            <div class="form-group">
              <label for="catDesc">Description: </label>
              <?php
                $textarea_attr = array(
                      'name'        => 'cat_desc',
                      'id'          => 'catDesc',
                      'class'       => 'form-control',
                      'value'       => $catagory->default_summary
                  );

                echo form_textarea($textarea_attr);
              ?>
            </div><!-- .form-group -->
           



         </div><!-- /.modal-body -->
      </div><!-- /.col-sm-10 -->
     


      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" name="submit_lang" class="btn btn-primary" id="submitModalForm" value="Save changes">
      </div><!-- /.modal-footer -->
    
        <?php echo form_close(); ?>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->