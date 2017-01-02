<main role="main" id="main" class="container">
	<div class="row">
		<!-- breadcrumbs goes here -->
	</div><!-- .row -->
	
	<div class="eventHeader row">
		<h2 class="h3 eventHeaderTitle col-sm-8">
			<?php echo ucwords($event->event_title); ?>
		</h2>
		
	</div><!-- .eventHeader -->

	<div class="row">
		<div class="col-sm-3">
			<img src="pictures/event_photos/<?php echo $event->event_photo; ?>" alt="<?php echo $event->event_title; ?>" class="fullEventPhoto">

			<div class="eventSummary">
				<ul class="list-unstyled">
					<li><span class="glyphicon glyphicon-calendar text-success"></span> <?php echo date("H:i a M d, Y", strtotime($event->event_date)); ?></li>
					<li>
						<span class="glyphicon glyphicon-map-marker text-success"></span> 
						<?php echo ucwords($event->venue); ?>, <?php echo strtoupper($event->city); ?>
					</li>
				</ul>
			</div><!-- .eventSummary -->
		</div><!-- .col-sm-12 -->

		<div class="col-sm-7 text-left">
			<?php if(empty($event->overview)): ?>
			<p class="text-center"><span class="fa fa-exclamation-circle"></span> There is no descripition of this event.</p>
			<?php
				else: 
					echo ucwords($event->overview);
				endif; 
			?>
		</div>
	</div><!-- .row -->
	
	<hr>

	<div class="row">
		<div class="ticketList col-sm-6">
			<h4 class="subheadings">Tickets</h4>

			<!-- Tickets listing -->
			<?php $this->load->view('tickets/tickets_view'); ?>
		</div><!-- .ticketListing -->

		<!-- SEATTING POSITION PHOTO -->
		<div class="col-sm-6">
			<h4 class="subheadings text-right"> Seating Map </h4>

			<div class="seatingPhoto text-center">
				<img src="pictures/event_photos/<?php echo $event->seating_map; ?>" alt="<?php echo $event->event_title; ?>"  class="img-responsive">
			</div>
			
		</div>

	</div><!-- .row -->

	<hr>

	<div class="row">
		<div class="col-sm-12 text-center">
			<a href="#" class="h1"><span class="fa fa-facebook-square"></span> </a>
			<a href="#" class="h1"><span class="fa fa-twitter-square"></span> </a>
			<a href="#" class="h1"><span class="fa fa-google-plus-square"></span> </a>
			<a href="#" class="h1"><span class="fa fa-youtube-square"></span> </a>
		</div>
	</div>
	
</main>