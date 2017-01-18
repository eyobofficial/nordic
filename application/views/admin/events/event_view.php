<section class="col-sm-12">

	<!-- TITLE HEADER -->
	<header class="headerBox clearfix">

		<h2 class="h4 text-left"><span class="fa fa-book"></span>&nbsp; <?php echo $event->default_title; ?></h2>


		<a title="Delete <?php echo $event->default_title; ?> Event" href="<?php echo site_url('admin/events/delete/' . $event->id); ?>" class="delete-event btn btn-danger pull-right"><span class="fa fa-trash"></span> Delete</a>

		<a title="Publish <?php echo $event->default_title; ?> Event" href="<?php echo site_url('admin/events/publish/' . $event->id); ?>" class="publish-event btn btn-success pull-right"><span class="fa fa-trash"></span> Publish</a>
		
	</header>
	
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
								<?php 
									if($event->event_date == NULL){
										echo '-';
									}else{
										echo date('d M, Y', strtotime($event->event_date)) ;
									}
								?>
								</td>
							</tr>

							<tr>
								<td>Venue: </td>
								<td>
								<?php 
									if($event->venue == NULL OR empty($event->venue)){
										echo '-';
									}else{
										echo ucwords($event->venue);
									}
								?>
								</td>
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
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum, recusandae voluptates nostrum similique repellendus. Debitis quos placeat distinctio earum, facilis velit possimus consequatur impedit! Suscipit, quas recusandae ratione quam. Ipsum.</p>
				</div><!-- /.panel-body -->
			</div>
		</div><!-- /.col-sm-6 -->





		<!-- LANGUAGE TRANSLATION -->
		<div class="col-sm-6" id="eventDetails">
			<div class="panel panel-warning panel-md">
				<div class="panel-heading">
					<strong>Language Translations</strong>

					<span class="pull-right">
						
						<!-- Button(link) trigger modal -->
						<a href="#" type="button" data-toggle="modal" data-target="#addLangModal" title="Add Translations">
							<span class="fa fa-plus"></span> Add
						</a>
			

						<!-- edit translations modal -->
						<?php //$this->load->view('admin/events/modals/edit_langs_modal'); ?>

						<!-- add translations modal -->
						<?php //$this->load->view('admin/events/modals/add_langs_modal'); ?>
						
					</span>
				</div><!-- /.panel-heading -->

			<div class="table-responsive">
				<table class="table table-striped table-hover listTable">
					
					<tr>
						<td>Svenska</td>
						<td class="text-center">SV</td>
						<td class="text-center"><i>Futbol Match<i></td>
						<td class="text-center">
							<!-- Button(link) trigger modal -->
							<a href="#" type="button" data-toggle="modal" data-target="#editLangModal" title="Edit Translations">
								<span class="fa fa-gear"></span> Edit
							</a>
						</td>
					</tr>
					

					<tr>
						<td>French</td>
						<td class="text-center">FR</td>
						<td class="text-center"><i>Futbol Game<i></td>
						<td class="text-center">
							<!-- Button(link) trigger modal -->
							<a href="#" type="button" data-toggle="modal" data-target="#editLangModal" title="Edit Translations">
								<span class="fa fa-gear"></span> Edit
							</a>
						</td>
					</tr>
					
					
				</table>
			</div><!-- /.table-resposive -->
			</div>
		</div><!-- /.col-sm-6 -->


	</article><!-- /.subsection -->
	

</section>