<!-- Page Header -->
<header id="pageHeader" class="container-fluid">
	<div class="row">
		<div id="logoText" class="col-sm-4">
			<h1 class="text-warning" id="pageTitle"><a href="<?php echo site_url(); ?>" title="Home"><?php echo ucwords($site_name); ?></a></h1>
			<h2 class="small motto"><?php echo ucwords($tagline); ?></h2>
		</div><!-- #logoText -->
		
		<!-- Top Navigation -->
		<nav class="col-sm-8 hidden-xs text-right" id="topNav">
			<?php if(isset($logged_user)): ?>

				<ul class="list-inline" id="register">
					<li><a href="account.php" title="<?php echo ucwords($logged_user->fullname); ?>">Hello, <?php echo ucwords($logged_user->fullname); ?></a></li>
					<li><a href="#" title="shopping cart"><span class="glyphicon glyphicon-shopping-cart"></span> Buy</a></li>
					<li><a href="logout.php" title="logout">Logout</a></li>
				</ul>

			<?php else: ?>

				<ul class="list-inline" id="register">
					<li><a href="register.php" title="Register">Register</a></li>
					<li><a href="sell.php" title="sell your tickets">Sell Tickets</a></li>
					<li><a href="login.php" title="login">Login</a></li>
				</ul>

			<?php endif; ?>

			<ul class="list-inline" id="misc">
				<li><a href="about.php">About Us</a></li>
				<li><a href="contact.php">Contact Us</a></li>
				<li><a href="agreement.php">Terms &amp; Aggreements</a></li>
			</ul>
		</nav>
	</div><!-- .row -->
</header><!-- #pageHeader -->