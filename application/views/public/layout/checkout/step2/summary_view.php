<div class="checkoutSummaryTitle">
	<h1 class="h3"><?php echo ucwords($this->session->event->event_title); ?></h1>
</div><!-- .checkoutSummaryTitle -->

<div class="checkoutSummaryTime">
	<h4><?php echo date("D M d, Y H:i", strtotime($this->session->event->event_date)); ?></h4>
	<h5><span class="glyphicon glyphicon-map-marker"></span> <?php echo ucwords($this->session->event->venue); ?>, <?php echo strtoupper($this->session->event->city); ?> <?php //echo strtoupper($event->country); ?></h5>
</div><!-- .checkoutSummaryTime -->

<div class="checkoutSummaryTicket">
	<ul class="list-unstyled">
		<li><b>Ticket Type</b>  <span class="pull-right"><?php echo ucwords($this->session->ticket->ticket_title); ?></span></li>
		<li><b>Price Per Ticket</b>  <span class="pull-right"><?php echo $this->currency->convert($this->session->ticket->ticket_price); ?> <em><?php echo $this->currency->code(); ?></em></span></li>
		<li><b>Number of Tickets (<a href="#">Edit</a>)</b>  <span class="pull-right">x <?php echo $this->session->checkout['quantity']; ?></span></li>
		<li class="subtotal"><b>SUBTOTAL</b>  <span class="pull-right"><b><?php echo $this->currency->code(); ?> <?php echo $this->currency->convert($this->session->subtotal); ?></b></span></li>
	</ul>
	<p class="footnote"><span class="fa fa-exclamation-circle"></span> Price does NOT include VAT and delivery.</p>
</div><!-- .checkoutSummaryTicket -->
