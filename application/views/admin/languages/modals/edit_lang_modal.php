<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="<?php echo $modal_id; ?>">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Language</h4>
      </div><!-- /.modal-header -->

      <div class="col-sm-10 col-sm-offset-1">
         <div class="modal-body">
          <?php echo form_open('admin/languages/all', array('name' => 'new_lang_form', 'id' => 'newLangForm')); ?>
        
            <!-- HIDDEN FIELD - Lang Id -->
            <?php echo form_hidden(array('lang_id' => $lang->id)); ?>


            <!-- Language Name -->
            <div class="form-group">
              <label for="langName">Language Name</label>
              <?php
                $input_attr = array(
                      'name'        => 'lang_name',
                      'id'          => 'langName',
                      'class'       => 'form-control',
                      'placeholder' => 'Example: Spanish, French, Danish',
                      'value'       => $lang->name
                  );

                echo form_input($input_attr);
              ?>
            </div><!-- /.form-group -->



            <!-- Language Code -->
            <div class="form-group">
              <label for"langCode">Short Abbreviation: </label>
              <?php
                $input_attr = array(
                      'name'        => 'lang_code',
                      'id'          => 'langCode',
                      'class'       => 'form-control',
                      'placeholder' => 'Example: SV',
                      'maxlength'   => '2',
                      'value'       => $lang->abbr
                  );

                echo form_input($input_attr);
              ?>
            </div><!-- /.form-group -->


            <!-- Flags -->
            <div class="form-group">
              <label for"flags">Flag: </label>
              <select name="flag" id="flag" class="form-control">
                <option value=""></option>
              </select>
            </div><!-- /.form-group -->


          

       </div><!-- /.modal-body -->
      </div><!-- /.col-sm-10 -->
     


      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="<?php echo site_url('admin/languages/delete/' . $lang->id); ?>" title="Delete Language" class="btn btn-danger"> Delete </a>
        <input type="submit" name="edit_lang" class="btn btn-primary" id="submitModalForm" value="Save changes">
      </div><!-- /.modal-footer -->
    
        <?php echo form_close(); ?>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->