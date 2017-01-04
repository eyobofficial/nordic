<section class="col-sm-12">
	
	<article class="subsection">
		<!-- TITLE HEADER -->
		<header>
			<h2 class="h4 text-left actionTitle"><span class="fa fa-book"></span>&nbsp; Events</h1>
		</header>



		<div class="panel panel-warning">
			<div class="panel-heading">
				<strong><span class="fa fa-book"></span> All Events</strong>

				<span class="pull-right">
					<a href="admin/catagories/add" title="Add New Catagory">
						<span class="fa fa-plus-circle"></span> New
					</a>
					
				</span>
			</div>

			
			<div class="table-responsive">
				<table class="table table-striped table-hover listTable">
					<thead>
						<tr>
							<th span="col">Event Name</th>
							<th span="col">Catagory</th>
							<th span="col">City</th>
							<th span="col">Country</th>
							<th span="col">Event Date</th>
							<th span="col">Publihed</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td>Arsenal Vs Bornmouth</td>
							<td>Sport</td>
							<td>London</td>
							<td>England</td>
							<td>Jan 03, 2017</td>
							<td><span class="fa fa-check-circle text-success"></span></td>
						</tr>

						<tr>
							<td>Christmas Concert</td>
							<td>Concert</td>
							<td>Addis Ababa</td>
							<td>Ethiopia</td>
							<td>Jan 07, 2017</td>
							<td><span class="fa fa-check-circle text-success"></span></td>
						</tr>
					</tbody>
				</table>
			</div><!-- /.table-resposive -->
		</div><!-- /.panel -->
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
						<legend>To create a new event: </legend>

						<ol class="list-unstyled">
							<li><strong>Step 1:</strong>&nbsp; Create a new event below by entering the Event Title and selecting the Event Catagory.</li>

							<li><strong>Step 2:</strong>&nbsp; Select the new created event and edit the event details such as <i>Event Venue, Event Date, Photos etc</i></li>

							<li><strong>Step 3:</strong>&nbsp; Publish the Event</li>
						</ol>
					</div><!-- /.eventInstructions -->
				</div><!-- /.row -->
				
			</div><!-- /.panel-body -->
		</div><!-- /.panel -->
	</article>
	



</section>