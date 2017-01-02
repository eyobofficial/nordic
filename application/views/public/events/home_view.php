<div class="row">
	<h2 class="h3 eventTypes" id="featuredTitle">Featured Events</h2>

	<!-- Featured Events -->
	<?php if(count($featured_events) == 1):{$featured = $featured_events;} ?>
	<?php else: ?>
	<?php foreach($featured_events as $featured): ?>
		<section class="featured concert col-lg-3 col-md-4 col-sm-6 col-xs-12">
			<div class="panel panel-warning">
				<img class="preview img-responsive" src="pictures/event_photos/<?php //echo $featured->event_photo; ?>" alt="<?php echo $featured->event_title; ?>">
				<div class="panel-body">
					<h4><a href="<?php echo site_url('events/id/' . $featured->id); ?>"><?php echo ucwords($featured->event_title); ?></a></h4>
					<div class="eventMeta">
						<a class="eventDate push-left"><span class="glyphicon glyphicon-calendar"></span> <?php echo date("M d", strtotime($featured->event_date)); ?></a>

						<a class="pull-right"><span class="glyphicon glyphicon-map-marker"></span> <?php echo ucwords($featured->venue); ?>, <?php echo strtoupper($featured->city); ?></a>
					</div><!-- .eventMeta -->
				</div><!-- .panel-body -->

				<div class="panel-footer">
					<a href="event.php?id=<?php echo $featured->id; ?>" class="btn btn-warning btn-sm">
					  <b><span class="glyphicon glyphicon-shopping-cart"></span> Buy Now</b>
					 </a>

					 <a href="<?php echo site_url('events/id/' . $featured->id); ?>" class="btn btn-info btn-sm pull-right"><b>Read More</b></a>
				</div><!-- .panel-footer -->
			</div><!-- .panel -->
		</section><!-- .featured -->
	<?php endforeach; ?>
	<?php endif; ?>

</div><!-- .row -->

<div class="text-center moreEvent">
	<a href="featured.php" type="button" class="btn btn-warning moreEvent">More Featured Events</a>
</div><!-- moreEvent -->

<div class="row">
	<h2 class="h3 eventTypes" id="concertTitle">Recent Events</h2>

	<!-- Recent Events -->
	<?php if(count($recent_events) == 1):{$recent = $recent_events;} ?>
	<?php else: ?>
	<?php foreach($recent_events as $recent): ?>
		<section class="recent col-sm-3 col-md-4 col-sm-6">	
			<div class="eventContainer">
				<a href="<?php echo site_url('events/id/' . $recent->id); ?>">
				<img src="pictures/event_photos/<?php echo $recent->event_photo; ?>" alt="<?php echo $recent->event_title; ?>" class="img-responsive eventPrev thumbnail">

				<div class="eventMeta">
					<h2 class="h4"> <?php echo ucwords($recent->event_title); ?></h2>

					<div class="eventMetaBody">
						<a class="eventDate push-left">
							<span class="glyphicon glyphicon-calendar"></span> <?php echo date("M d", strtotime($recent->event_date)); ?>
						</a>
					
						<a class="pull-right text-success">
							<span class="glyphicon glyphicon-map-marker"></span> <?php echo ucwords($recent->city); ?>
						</a>
					</div><!-- .eventMetaBody -->

				</div><!-- .eventMeta -->
				</a>
			</div><!-- .eventContainer -->
		</section><!-- .recent -->
	<?php endforeach; ?>
	<?php endif; ?>

</div><!-- .row -->

<div class="text-center moreEvent">
	<a href="events.php" type="button" class="btn btn-warning moreEvent">More Recent Events</a>
</div><!-- moreEvent -->