<section class="col-sm-12">
	
	<!-- ADD NEW EVENT SECTION -->
	<article class="subsection">
		<!-- TITLE HEADER -->
		<header>
			<h2 class="h4 text-left actionTitle"><span class="fa fa-book"></span>&nbsp; Add New Event</h1>
		</header>


		<div class="panel panel-warning">
			<div class="panel-heading">
				<strong><span class="fa fa-book"></span> New Event</strong>
			</div>


			<div class="panel-body">
				<div class="row">
					<div class="col-sm-6">

						<?php echo form_open('admin/events/add', array('name' => 'add_event', 'id' => 'addEvent')); ?>
							
							
							<!-- Event Title -->
							<div class="form-group">
								<label for"eventTitle">Event Title: </label>
								<?php
									$input_attr = array(
												'name'        => 'event_title',
												'id'          => 'eventName',
												'class'       => 'form-control',
												'value'       => set_value('event_title')
										);

									echo form_input($input_attr);
								?>
							</div><!-- /.form-group -->


							<!-- Event Catagory -->
							<div class="form-group">
								<label for"eventCatagory">Event Catagory: </label>
								<select name="event_catagory" id="eventCatagory" class="form-control">
									<option value=""></option>
								</select>
							</div><!-- /.form-group -->



							<!-- SUBMIT INPUT BUTTON -->
							<div class="form-group">
								<?php
									$submit_attr = array(
												'name'  => 'submit',
												'id'    => 'submitForm',
												'class' => 'btn btn-danger btn-block',
												'value' => 'Create'
										);

									echo form_submit($submit_attr);
								?>
							</div><!-- .form-group -->
							
						<?php echo form_close(); ?>
					</div><!-- /.col-sm-8 -->



					<div class="eventInstructions col-sm-6">
						<legend>To create new event: </legend>

						<dl>
							<dt>Step 1:</dt>
							<dd>Create a new event below by entering the Event Title and selecting the Event Catagory.</dd>

							<dt>Step 2:</dt>
							<dd>Select the new created event and edit the event details such as Event Venue, Event Date, Photos etc</dd>

							<dt>Step 3:</dt>
							<dd>Publish the Event</dd>
						</dl>

					</div><!-- /.eventInstructions -->
				</div><!-- /.row -->
				
			</div><!-- /.panel-body -->
		</div><!-- /.panel -->
	</article>

</section>