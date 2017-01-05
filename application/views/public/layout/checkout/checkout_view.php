<main role="main" id="main" class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active"><a href="checkout.php">Checkout</a></li>
		</ol>
	</div><!-- .row -->
	
	<div class="eventHeader row">
		<h2 class="h3 eventHeaderTitle">
			Payment Checkout  
			<span class="pull-right">Step 1 of 4 </span>
		</h2>
		
	</div><!-- .eventHeader -->

	<div class="row">
		
		<!-- LEFT PART -->
		<!-- Event and Ticket Price Summary Section -->
		<div class="col-sm-4" id="checkoutSummary">
			<?php $this->load->view($checkout_summary); ?>
		</div><!-- /#chekcoutSummary -->
		
		
		
		<!-- User Checkout Info - Right Part -->
		<div class="col-sm-8">
			<?php $this->load->view($checkout_main); ?>
		</div>
		
	

	</div><!-- .row -->

	<hr>

	<div class="row">
		<?php $this->load->view('templates/social_media_view'); ?>
	</div>
	
</main>
