<div class="table-responsive">
	<?php if(isset($tickets) && count($tickets) > 0): ?>
	<div class="panel panel-default">
	<table class="table table-bordered table-condensed table-striped table-hover">
		<thead>
			<th scope="col">PACKAGE</th>
			<th scope="col">PRICE</th>
			<th scope="col">TICKET TYPE</th>
		</thead>
		<?php foreach($tickets as $ticket): ?>
		<tr>
			<td><strong><?php echo $ticket->ticket_title; ?></strong></td>
			<td class="text-right"><strong><?php echo $this->currency->convert($ticket->ticket_price);  ?> <?php echo $this->currency->code(); ?></strong></td>
			<td class="text-center">
				<em>
					<?php echo isset($ticket->left) && $ticket->left <= 50 ? $ticket->left : "20+"; ?> Left</em>
				&nbsp; &nbsp;
			</td>

			<td class="text-center">

			<?php echo form_open('events/id' ); ?>
				<!-- Hidden Values -->
				<?php echo form_hidden('event_id', $event->event_id); ?>
				<?php echo form_hidden('ticket_id', $ticket->ticket_id); ?>

				<label for="quantity">Qty:</label>
				<select name="quantity" id="quantity">
					<?php $ticket_number = (!is_null($ticket->left) && $ticket->left < 30) ? $ticket->left : 30; ?>
					<?php for($i = 1; $i <= $ticket_number; $i++): ?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
					<?php endfor; ?>
				</select>
				
			</td>
			
			<td class="text-center">
				<!-- <button type="submit" name="add_to_cart" class="btn btn-success btn-xs">	
					<b><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</b>
				</button> -->
				<button type="submit" name="buy_now" class="btn btn-danger btn-xs">	
					<b> Buy Now</b>
				</button>
			</td>

			<!-- <td>
				<button type="submit" name="add_to_cart" class="btn btn-success btn-xs">	
					<b><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</b>
				</button>
			</td> -->

			<?php echo form_close(); ?><!-- End Form -->

		</tr>
	<?php endforeach; ?>
	</table>
	</div><!-- /.panel-default -->
	<?php else: ?>
		<p class="noticeMsg text-center"><span class="fa fa-exclamation-circle"></span>  No ticket package is available </p>
	<?php endif; ?>
</div><!-- .table-responsive -->