<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="editDetailsModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?php echo $event->default_title; ?></h4>
      </div><!-- /.modal-header -->

      <div class="col-sm-10 col-sm-offset-1">
         <div class="modal-body">
         <?php echo form_open('admin/events/details/' . $event->id, array('name' => 'event_details_form', 'id' => 'eventDetailsForm')); ?>
        
            
            <!-- Event Title -->
            <div class="form-group">
              <label for="eventTitle">Event Title</label>
              <?php
                $input_attr = array(
                      'name'        => 'event_title',
                      'id'          => 'eventTitle',
                      'class'       => 'form-control',
                      'placeholder' => 'Example: Sport, Concert, Theatre',
                      'value'       =>  $event->default_title
                  );

                echo form_input($input_attr);
              ?>
            </div><!-- /.form-group -->



            <!-- Event Catagory -->
            <div class="form-group">
              <label for"eventCatagory">Event Catagory: </label>
              <select name="event_catagory" id="eventCatagory" class="form-control">

                <?php foreach($catagories as $catagory): ?>
                     <option value="<?php echo $catagory->id; ?>" <?php if($catagory->id == $event->catagory_id) echo 'selected'; ?>>
                        <?php echo ucwords($catagory->default_title); ?>
                     </option>
                <?php endforeach; ?>

              </select>
            </div><!-- /.form-group -->


            <!-- Event Date -->
            <div class="form-group">
              <label for="eventDate">Event Date</label>
              <?php
                $event_date = empty($event->event_date) ? date('d-m-Y H:i:s') : date('d-m-Y H:i:s', strtotime($event->event_date));

                $input_attr = array(
                      'name'        => 'event_date',
                      'id'          => 'eventDate',
                      'class'       => 'form-control',
                      'value'       => $event_date
                  );

                echo form_input($input_attr);
              ?>
            </div><!-- /.form-group -->


            <!-- Event Venue -->
            <div class="form-group">
              <label for="eventVenue">Venue</label>
              <?php
                $input_attr = array(
                      'name'        => 'event_venue',
                      'id'          => 'eventVenue',
                      'class'       => 'form-control',
                      'value'       => $event->venue
                  );

                echo form_input($input_attr);
              ?>
            </div><!-- /.form-group -->

            
            <!-- Event City -->
            <div class="form-group">
              <label for="city">City</label>
              <?php
                $input_attr = array(
                      'name'        => 'city',
                      'id'          => 'city',
                      'class'       => 'form-control',
                      'value'       => $event->city
                  );

                echo form_input($input_attr);
              ?>
            </div><!-- /.form-group -->


            <!-- Event Country -->
            <div class="form-group">
              <label for"country">Country: </label>
              <select name="country" id="country" class="form-control">
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