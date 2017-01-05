<main role="main" id="main" class="container">
	<div class="row">
		<?php echo breadcrumb(array('home', 'events/' . $page_title => $page_title)); ?>
	</div><!-- .row -->
	
	<div class="eventHeader row">
		<h2 class="h3 eventHeaderTitle col-sm-8">
			<?php echo ucwords($heading); ?>
		</h2>

		<form action="search_concerts.php" method="GET" class="col-sm-4">
			<div class="input-group">
				<input type="search" name="q" class="form-control" placeholder="Search for Concert Events">
				<span class="input-group-btn">
					<input type="submit" value="Go" class="btn btn-warning">
				</span>
			</div><!-- .input-group -->
		</form>
	</div><!-- .eventHeader -->

	<div class="row">
		<div class="col-sm-12">
			<div class="row">

				<!-- Events listing -->
				<?php if(count($events)): ?>
				<?php foreach($events as $event): ?>
				<section class="recent col-xs-12 col-md-4 col-sm-6 col-sm-offset-0 col-md-offset-0">	
					<div class="eventContainer">
						<a href="<?php echo site_url('events/id/' . $event->id); ?>">
						<img src="pictures/event_photos/<?php //echo $event->event_photo; ?>" alt="<?php echo $event->event_title; ?>" class="img-responsive eventPrev thumbnail">

						<div class="eventMeta">
							<h2 class="h4"> <?php echo ucwords($event->event_title); ?></h2>

							<div class="eventMetaBody">
								<a class="eventDate push-left">
									<span class="glyphicon glyphicon-calendar"></span> <?php echo date("M d", strtotime($event->event_date)); ?>
								</a>
							
								<a class="pull-right text-success">
									<span class="glyphicon glyphicon-map-marker"></span> <?php echo ucwords($event->city); ?>
								</a>
							</div><!-- .eventMetaBody -->

						</div><!-- .eventMeta -->
						</a>
					</div><!-- .eventContainer -->
				</section><!-- .recent -->
				<?php endforeach; ?>
				<?php endif; ?>

			</div><!-- .row -->
			
			<!-- Page Pagination -->
			<?php //include_once("layout/pagination_layout.inc.php"); ?>
		</div><!-- .col-sm-8 -->
	</div><!-- .row -->
	
	
	

	
</main>