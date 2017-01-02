<ul class="nav nav-tabs">
	<li role="presentation" class="active">
		<a href="#guestCheckout" data-toggle="tab">Guest Checkout (No Account Required)</a>
	</li>

	<li role="presentation">
		<a href="#userCheckout" data-toggle="tab">Checkout By Loggin in</a>
	</li>
</ul>

<div class="tab-content">
	<div class="tab-pane <?php echo !empty($errors['login']) ? '' : 'active'; ?>" id="guestCheckout">

		<!-- Form registration error, if any -->
		<?php if(!empty($errors['guest'])): ?>
			<div class="errorMsg">
				
				<ul>
					<?php foreach($errors['guest'] as $error_key => $error): ?>
						<li><?php echo ucfirst($error); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>


		<!-- GUEST CHECKOUT FORM -->
		<?php echo validation_errors(); ?>
		<?php echo form_open('checkout', array('name' => "guest_form", 'id' => "guestForm")); ?>

			<!-- Hidden value for current url -->
			<?php echo form_hidden("current_url", current_url()); ?>


			<div class="form-group">
				<label for="firstName">First Name: </label>
				<?php echo form_input(array('name' => "first_name", 'id' => "firstName", 'class' => "form-control", 'placeholder' => "John")); ?>
			</div><!-- .form-group -->

			<div class="form-group">
				<label for="lastName">Last Name: </label>
				<?php echo form_input(array('name' => "last_name", 'id' => "lastName", 'class' => "form-control", 'placeholder' => "Doe")); ?>
			</div><!-- .form-group -->

			
			<div class="form-group" id="guestEmail">
				<label for="email">Email: </label>
				<?php echo form_input(array('type' => "email", 'name' => "email", 'id' => "email", 'class' => "form-control", 'placeholder' => "johndoe@example.com")); ?>
			</div><!-- .form-group -->

			<div class="checkbox">
				<label>
					<input type="checkbox" name="update_me" value="1" checked="checked">
					&nbsp; Please update me with the latest news, great deals, and special offers
				</label>
			</div><!-- .checkbox -->
			
			<div class="form-group">
				<?php echo form_submit(array('name' => 'guest_submit', 'value'=> "Continue", 'class' => "btn btn-success btn-block")); ?>
			</div><!-- .form-group -->

		<?php echo form_close(); ?>
	</div><!-- #guestCheckout -->


	<div class="tab-pane <?php echo !empty($errors['login']) ? 'active' : ''; ?>" id="userCheckout">

		<!-- Form registration error, if any -->
		<?php if(!empty($errors['login'])): ?>
			<div class="errorMsg">
				
				<ul>
					<?php foreach($errors['login'] as $error_key => $error): ?>
						<li><?php echo ucfirst($error); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>


		<!-- REGISTERED USER CHEKOUT - LOGIN FORM -->
		<?php echo form_open('checkout/index', array('name' => "loggin", 'id' => 'logginCheckoutForm')); ?>

			<!-- Hidden value for current url -->
			<?php echo form_hidden("current_url", current_url()); ?>

			<div class="form-group">
				<label for="email2">Email or email</label>
				<input type="text" name="email" id="email2" class="form-control" placeholder="johndoe@example.com">
			</div><!-- .form-group -->

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" class="form-control" placeholder="********">
			</div><!-- .form-group -->

			<div class="form-group">
				<?php echo form_submit(array('name' => 'login_submit', 'value' => 'Log In', 'class' => "btn btn-success btn-block")); ?>
			</div><!-- .form-group -->
		<?php echo form_close(); ?><!-- /#logginCheckoutForm -->


		<ul class="text-right list-unstyled">
			<li><?php echo anchor('users/reset_password', 'Forget your password?'); ?></li>
			<li><?php echo anchor('users/register', 'Register'); ?></li>
		</ul>
	</div><!-- #guestCheckout -->
</div><!-- .tab-content -->