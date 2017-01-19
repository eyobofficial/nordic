<section class="col-sm-12">

	<!-- TITLE HEADER -->
	<header class="headerBox clearfix">

		<h2 class="h4 text-left"><span class="fa fa-book"></span>&nbsp; <?php echo $event->default_title; ?></h2>

		
		<!-- Delete Event link(button) -->
		<a title="Delete <?php echo $event->default_title; ?> Event" href="<?php echo site_url('admin/events/delete/' . $event->id); ?>" class="delete-event btn btn-danger pull-right"><span class="fa fa-trash"></span> Delete</a>
		
		

		<!-- Publish/Unpublish Event link -->
		<?php if($event->publish == 1): ?>
			<a title="Publish <?php echo $event->default_title; ?> Event" href="<?php echo site_url('admin/events/publish/' . $event->id); ?>" class="publish-event btn btn-default pull-right"><span class="fa fa-pause-circle"></span> Unpublish</a>
		<?php else: ?>
			<a title="Publish <?php echo $event->default_title; ?> Event" href="<?php echo site_url('admin/events/publish/' . $event->id); ?>" class="publish-event btn btn-success pull-right"><span class="fa fa-play-circle"></span> Publish</a>
		<?php endif; ?>
		
	</header>

	<!-- Flash Messages -->
	<?php echo flash($this->session->flash_msg); ?>


	<!-- SUCCESS STATUS -->
	<?php if($this->session->success_msg): ?>
	<div class="panel panel-success">
		<div class="panel-body">
			<?php echo $this->session->success_msg; ?>
		</div>
	</div>
    <?php endif; ?>


	<!-- VALIDATION ERRORS -->
	<?php if(!empty(validation_errors())): ?>
	<div class="panel panel-danger">
		<div class="panel-body">
			<?php echo validation_errors(); ?>
		</div>
	</div>
    <?php endif; ?>
	
	<article class="subsection row">

		<!-- EVENT DETAILS -->
		<div class="col-sm-6" id="eventDetails">
			<div class="panel panel-warning panel-md">
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
								<td><?php echo ucwords($event->default_title); ?></td>
							</tr>


							<tr>
								<td>Catagory: </td>
								<td><?php echo ucwords($catagory->default_title); ?></td>
							</tr>


							<tr>
								<td>Event Date: </td>
								<td>
									<?php echo is_null($event->event_date) ? '-' : date('d M, Y', strtotime($event->event_date)) ; ?>
								</td>
							</tr>

							<tr>
								<td>Venue: </td>
								<td>
									<?php echo empty($event->venue) ? '-' : ucwords($event->venue); ?>
								</td>
							</tr>

							<tr>
								<td>Location: </td>
								<td><b><?php echo empty($event->city) ? '-' : ucwords($event->city); ?></b> <br>England</td>
							</tr>
						</table>
					</div>
				</div><!-- /.panel-body -->
			</div>
		</div><!-- /.col-sm-6 -->
		
		

		<!-- EVENT PHOTO -->
		<div class="col-sm-6" id="eventPhoto">
			<div class="panel panel-warning panel-md">
				<div class="panel-heading">
					<strong>Event Photo</strong>

					<span class="pull-right">

						<!-- Button(link) trigger modal -->
						<a href="#" type="button" data-toggle="modal" data-target="#eventPhotoModal" title="Update Photo">
							<span class="fa fa-gear"></span> Edit
						</a>

						<!-- modal -->
						<?php $this->load->view('admin/events/modals/event_photo_modal'); ?>
						
					</span>
				</div><!-- /.panel-heading -->

				<div class="panel-body">
					

					<!-- PHOTO CONTAINERS GOES HERE -->


				</div><!-- /.panel-body -->
			</div>
		</div><!-- /.col-sm-6 -->


		<!-- EVENT DESCRIPTION -->
		<div class="col-sm-12" id="eventDesc">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<strong>Description</strong>

					<span class="pull-right">

						<!-- Button(link) trigger modal -->
						<a href="#" type="button" data-toggle="modal" data-target="#descModal" title="Edit Description">
							<span class="fa fa-gear"></span> Edit
						</a>

						<!-- modal -->
						<?php $this->load->view('admin/events/modals/edit_desc_modal'); ?>
						
					</span>
				</div><!-- /.panel-heading -->

				<div class="panel-body">
					<?php if(empty($event->summary)): ?>
						<p class="h4 text-center fadeMe">No Description</p>
					<?php else: ?>
						<p><?php echo ucfirst($event->summary); ?></p>
					<?php endif; ?>
				</div><!-- /.panel-body -->
			</div>
		</div><!-- /.col-sm-6 -->




		<!-- LANGUAGE TRANSLATION  -->
		<div class="col-sm-6" id="eventDetails">
			<div class="panel panel-warning panel-md">
				<div class="panel-heading">
					<strong>Language Translations</strong>

					<span class="pull-right">
						
						<!-- Button(link) trigger modal -->
						<a href="#" type="button" data-toggle="modal" data-target="#addTransModal" title="Add Translations">
							<span class="fa fa-plus"></span> Add
						</a>
			

						<!-- add translations modal -->
						<?php $this->load->view('admin/events/modals/add_trans_modal'); ?>
						
					</span>
				</div><!-- /.panel-heading -->

			<div class="table-responsive">
				<table class="table table-striped table-hover listTable">
					
					<!-- LANGAUGES TRANSLATIONS -->
					<?php foreach($translations as $translation): ?>
		
						<?php
							$lang = $this->Lang_model->get($translation->lang_id);
							$data = array(
										'translation'   => $translation,
										'lang'			=> $lang,
										'modal_id'      => 'editTransModal' . $translation->id
								);
						?>

						<!-- modal -->
						<?php $this->load->view('admin/events/modals/edit_translation_modal', $data); ?>

						<tr>
							<td>
								<!-- Button(link) trigger modal -->
								<a href="#" type="button" data-toggle="modal" data-target="#<?php echo $data['modal_id']; ?>" title="<?php echo ucwords($translation->title); ?>">
									<?php echo ucwords($translation->title); ?>
								</a>
							</td>

							<td class="text-center">
								<?php echo ucwords($lang->name); ?> <b>(<?php echo strtoupper($lang->abbr); ?>)</b>
							</td> 

							<td class="text-right">
								<!-- Button(link) trigger modal -->
								<a href="#" type="button" data-toggle="modal" data-target="#<?php echo $data['modal_id']; ?>" title="Edit Translations">
									<span class="fa fa-gear"></span> Edit
								</a>
							</td>
						</tr>
					<?php endforeach; ?>

					
					
				</table>
			</div><!-- /.table-resposive -->
			</div>
		</div><!-- /.col-sm-6 -->


	</article><!-- /.subsection -->
	

</section>