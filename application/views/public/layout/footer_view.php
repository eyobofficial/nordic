<footer id="pageFooter">
	<section class="container">
		<div class="row">
			<section class="col-xs-12 col-sm-3 footerLinks">
				<h2 class="h4"><a href="index.php">Nordic</a></h2>
				<ul class="list-unstyled">
					<li><a href="about.php" title="about us">About Us</a></li>
					<li><a href="contact.php" title="contact us">Contact Us</a></li>
					<li><a href="privacy.php" title="privacy policy">Privacy Policy</a></li>
					<li><a href="agreement.php" title="User Agreement">User Agreement</a></li>
				</ul>
			</section>

			<section class="col-xs-12 col-sm-3 footerLinks">
				<h2 class="h4"><a href="events.php">Events</a></h2>
				<ul class="list-unstyled">
					<li><a href="concerts.php" title="concert tickets">Concert Tickets</a></li>
					<li><a href="sports.php" title="sport tickets">Sport Tickets</a></li>
					<li><a href="festivals.php" title="festival tickets">Festival Tickets</a></li>
					<li><a href="featured.php" title="featured tickets">Featured Tickets</a></li>
				</ul>
			</section>

			
			<section class="col-xs-12 col-sm-3 footerLinks">
				<h2 class="h4"><a href="contact.php">Contact Us</a></h2>
				<ul class="list-unstyled">
					<li><a href="contact.php" title="contact us"><span class="glyphicon glyphicon-phone"></span> <?php //echo PHONE; ?></a></li>
					<li><a href="mailto:<?php //echo EMAIL; ?>" title="email us"><span class="glyphicon glyphicon-envelope"></span> &nbsp; Email Us</a></li>
					<li><a href="<?php //echo FACEBOOK; ?>" title="follow us on facebook"><span class="fa fa-facebook"></span> &nbsp; Facebook</a></li>
					<li><a href="<?php //echo TWITTER; ?>" title="follow us on twitter"><span class="fa fa-twitter"></span> &nbsp; Twitter</a></li>
				</ul>
			</section>


			<section class="col-xs-12 col-sm-3 footerLinks">
				<h2 class="h4">Currency</h2>
				<?php echo form_open('events/change_currency', array('class' => 'form_inline', 'id' => 'currencyForm')); ?>
					<?php echo form_hidden('current_url', current_url()); ?>
					<div class="form-group">
						<label for="currency" class="sr-only">Currency</label>
						<select name="currency_id" id="currency" class="form-control">

							<?php foreach($all_currency as $currency): ?>
								<option value="<?php echo $currency->id; ?>" <?php echo $currency->id == $this->session->id ? "selected='selected' " : "";  ?>>
									<?php echo strtoupper($currency->code); ?>
								</option>
							<?php endforeach; ?>
						</select>
					</div><!-- .form-group -->

					<div class="form-group">
						<input type="submit" name="submit" value="GO" class="btn btn-success">
					</div><!-- .form-group -->
				<?php echo form_close(); ?>
			</section>


			<section class="col-sm-12 copyright">
				<p class="text-center">All Rights Reserved. Copyright &copy;  2016</p>
			</section>
		</div>
	</section><!-- .row -->
</footer>