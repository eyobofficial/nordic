<section class="col-sm-12">

	<!-- TITLE HEADER -->
	<header>
		<h2 class="h4 text-left actionTitle"><span class="fa fa-book"></span>&nbsp; Some Cool Event</h1>
	</header>
	
	<article class="subsection row">
	<?php echo form_open('admin/events/event', array('name' => 'update_event', 'id' => 'updateEvent')); ?>
		

		<!-- EVENT DETAILS -->
		<div class="col-sm-6" id="eventDetails">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<strong>Event Details</strong>

					<span class="pull-right">

						<!-- Button(link) trigger modal -->
						<a href="#" type="button" data-toggle="modal" data-target="#editDetailsModal" title="Edit Event">
							<span class="fa fa-gear"></span> Edit
						</a>

						<!-- modal -->
						<?php $this->load->view('admin/events/modals/edit_details_modal'); ?>
						
					</span>
				</div><!-- /.panel-heading -->

				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-invisible table-dl">
							<tr>
								<td>Title: </td>
								<td>Chelsea vs Tottenham</td>
							</tr>


							<tr>
								<td>Catagory: </td>
								<td>Sport Events</td>
							</tr>


							<tr>
								<td>Event Date: </td>
								<td>Jan 07, 2017</td>
							</tr>

							<tr>
								<td>Venue: </td>
								<td>Shit-ford Bridge</td>
							</tr>

							<tr>
								<td>Location: </td>
								<td>London, England</td>
							</tr>
						</table>
					</div>
				</div><!-- /.panel-body -->
			</div>
		</div><!-- /.col-sm-6 -->
		
		
		<!-- EVENT LOCATIONS -->
		<div class="col-sm-6" id="eventLocation">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<strong>Venue &amp; Location</strong>
				</div><!-- /.panel-heading -->

				<div class="panel-body">
					<div class="row">
						<!-- Event Venue -->
						<div class="col-sm-8 col-sm-offset-2">
							<div class="form-group">
								<label for="eventVenue">Venue</label>
								<?php
									$input_attr = array(
												'name'        => 'event_venue',
												'id'          => 'eventVenue',
												'class'       => 'form-control',
												'value'       => set_value('event_venue')
										);

									echo form_input($input_attr);
								?>
							</div><!-- /.form-group -->


							<div class="form-group">
								<label for="city">City</label>
								<?php
									$input_attr = array(
												'name'        => 'city',
												'id'          => 'city',
												'class'       => 'form-control',
												'value'       => set_value('city')
										);

									echo form_input($input_attr);
								?>
							</div><!-- /.form-group -->


							<!-- Event Catagory -->
							<div class="form-group">
								<label for"country">Country: </label>
								<select name="country" id="country" class="form-control">
									<option value=""></option>
								</select>
							</div><!-- /.form-group -->
						</div><!-- /.col-sm-6 -->
					</div><!-- /.row -->
				</div><!-- /.panel-body -->
			</div>
		</div><!-- /.col-sm-6 -->
		

		<!-- EVENT PHOTO -->
		<div class="col-sm-6">
			<div class="panel panel-warning panel-md">
				<div class="panel-heading">
					<strong>Event Photo</strong>
				</div><!-- /.panel-heading -->


				<div class="panel-body">
					
				</div><!-- /.panel-body -->
			</div>
		</div><!-- /.col-sm-6 -->



		<!-- EVENT PHOTO -->
		<div class="col-sm-6">
			<div class="panel panel-warning panel-md">
				<div class="panel-heading">
					<strong>Language Translations</strong>
				</div><!-- /.panel-heading -->


				<div class="panel-body">
					
				</div><!-- /.panel-body -->
			</div>
		</div><!-- /.col-sm-6 -->


		<!-- EVENT DESCRIPTION -->
		<div class="col-sm-12">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<strong>Description</strong>
				</div><!-- /.panel-heading -->
					

				<div class="panel-body">
					<div class="form-group">
					<?php
						$textarea_attr = array(
									'name'        => 'summary',
									'id'          => 'summary',
									'class'       => 'form-control',
									'value'       => set_value('summary')
							);

						echo form_textarea($textarea_attr);
					?>
					</div><!-- /.form-group -->
				</div><!-- /.panel-body -->
			</div>
		</div><!-- /.col-sm-6 -->
	
	<?php echo form_close(); ?>
	</article><!-- /.subsection -->
	


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