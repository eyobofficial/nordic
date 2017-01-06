<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="addLangsModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">New Language</h4>
      </div><!-- /.modal-header -->

      <div class="col-sm-10 col-sm-offset-1">
         <div class="modal-body">
          <?php echo form_open('admin/languages/all_languages', array('name' => 'new_language_form', 'id' => 'newLanguageForm')); ?>
        
            
            <!-- Language Name -->
            <div class="form-group">
              <label for="langName">Language Name</label>
              <?php
                $input_attr = array(
                      'name'        => 'lang_name',
                      'id'          => 'langName',
                      'class'       => 'form-control',
                      'placeholder' => 'Example: Spanish, French, Danish',
                      'value'       => set_value('lang_name')
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
                      'value'       => set_value('lang_name')
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
        <input type="submit" name="submit_details" class="btn btn-primary" id="submitModalForm" value="Save changes">
      </div><!-- /.modal-footer -->
    
        <?php echo form_close(); ?>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->