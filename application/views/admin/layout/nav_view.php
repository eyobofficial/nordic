<div id="brand-container">
	<h1><a href="<?php echo site_url('admin/'); ?>" title="Admin"><?php echo strtoupper($site_name); ?></a></h1>
</div>


<!-- AMDIN PAGE NAVIGATION -->
<nav class="row" id="sideNav">
	<ul class="list-unstyled" id="primaryMenu">
	
		<!-- MANAGE DASHBOARD -->
		<?php echo open_menu($page_section, 'dashboard'); ?>
			<a href="<?php echo site_url('admin/dashboard'); ?>">
				<span class="fa fa-home push-left"></span> &nbsp; &nbsp; Dashboard <span class="fa fa-chevron-right disabled pull-right"></span>
			</a>
		<?php echo close_menu(); ?>

	
		<!-- MANAGE CATAGORIES -->
		<?php echo open_menu($page_section, 'catagories'); ?>
			<a href="<?php echo site_url('admin/catagories'); ?>">
				<span class="fa fa-book push-left"></span> 
					&nbsp; &nbsp; Catagories
					<?php if(is_active($page_section, 'catagories')): ?>
						<span class="fa fa-chevron-down pull-right">
					<?php else: ?>
						<span class="fa fa-chevron-right pull-right">
					<?php endif; ?>
				</span>
			</a>
			
			<?php if(is_active($page_section, 'catagories')): ?>
				<ul class="submenu list-unstyled">
					<?php echo open_menu($page_title, 'All Catagories'); ?>
						<a href="<?php echo site_url('admin/catagories'); ?>"> All Catagories </a>
					<?php echo close_menu(); ?>


					<?php echo open_menu($page_title, 'Add Catagory'); ?>
						<a href="<?php echo site_url('admin/catagories/add'); ?>"> Add Catagory </a>
					<?php echo close_menu(); ?>

				</ul>
			<?php endif; ?>

		<?php echo close_menu(); ?><!-- /End MANAGE CATAGORIES -->

			



		<!-- MANAGE EVENTS -->
		<?php echo open_menu($page_section, 'events'); ?>
			<a href="<?php echo site_url('admin/events'); ?>">
				<span class="fa fa-glass push-left"></span> 
				&nbsp; &nbsp; Events 
				<?php if(is_active($page_section, 'events')): ?>
					<span class="fa fa-chevron-down pull-right">
				<?php else: ?>
					<span class="fa fa-chevron-right pull-right">
				<?php endif; ?>
			</a>

			<!-- EVENTS SUBMENU (secondary menus) -->
			<?php if(is_active($page_section, 'events')): ?>
				<ul class="submenu list-unstyled">

					<!-- ALL EVENTS -->
					<?php echo open_menu($page_title, 'All Events'); ?>
						<a href="<?php echo site_url('admin/events'); ?>"> All Events </a>
					<?php echo close_menu(); ?>

					
					<!-- ADD NEW EVENT -->
					<?php echo open_menu($page_title, 'Add Event'); ?>
						<a href="<?php echo site_url('admin/events/add'); ?>"> Add Event </a>
					<?php echo close_menu(); ?>

				</ul>
			<?php endif; ?>
		<?php echo close_menu(); ?>



		<!-- MANAGE TICKETS -->
		<li <?php if(isset($page_section) && strtolower($page_section) == 'tickets'): ?> class="active" <?php endif; ?>>
			<a href="#">
				<span class="fa fa-ticket push-left"></span> &nbsp; &nbsp;
				Tickets
				<span class="fa fa-chevron-down pull-right"></span>
			</a>
		</li>



		<!-- MANAGE ORDERS -->
		<li  <?php if(isset($page_section) && strtolower($page_section) == 'orders'): ?> class="active" <?php endif; ?>>
			<a href="#">
				<span class="fa fa-usd push-left"></span> &nbsp; &nbsp;
				Orders
				<span class="fa fa-chevron-down pull-right"></span>
			</a>
		</li>


		<!-- MANAGE DELIVERY METHODS -->
		<li  <?php if(isset($page_section) && strtolower($page_section) == 'delivery'): ?> class="active" <?php endif; ?>>
			<a href="#">
				<span class="fa fa-arrows-h push-left"></span> &nbsp; &nbsp;
				Delivery
				<span class="fa fa-chevron-down pull-right"></span>
			</a>
		</li>


		<!-- MANAGE USERS -->
		<li  <?php if(isset($page_section) && strtolower($page_section) == 'users'): ?> class="active" <?php endif; ?>>
			<a href="#">
				<span class="fa fa-user push-left"></span> &nbsp; &nbsp;
				Users
				<span class="fa fa-chevron-down pull-right"></span>
			</a>
		</li>


		<!-- MANAGE MESSAGES -->
		<li  <?php if(isset($page_section) && strtolower($page_section) == 'messages'): ?> class="active" <?php endif; ?>>
			<a href="#">
				<span class="fa fa-envelope push-left"></span> &nbsp; &nbsp;
				Messages
				<span class="fa fa-chevron-down pull-right"></span>
			</a>
		</li>


		<!-- SETTINGS -->
		<?php echo open_menu($page_section, 'settings'); ?>
			<a href="<?php echo site_url('admin/languages'); ?>">
				<span class="fa fa-sliders push-left"></span> 
				&nbsp; &nbsp; Settings 
				<?php if(is_active($page_section, 'settings')): ?>
					<span class="fa fa-chevron-down pull-right">
				<?php else: ?>
					<span class="fa fa-chevron-right pull-right">
				<?php endif; ?>
			</a>

			<!-- SETTINGS SUBMENU (secondary menus) -->
			<?php if(is_active($page_section, 'settings')): ?>
				<ul class="submenu list-unstyled">

					<!-- WEBSITE SETTINGS -->
					<?php echo open_menu($page_title, 'website'); ?>
						<a href="<?php echo site_url('admin/website'); ?>"> General Settings </a>
					<?php echo close_menu(); ?>

					
					<!-- LANGUAGES SETTINGS -->
					<?php echo open_menu($page_title, 'languages'); ?>
						<a href="<?php echo site_url('admin/languages'); ?>"> Languages </a>
					<?php echo close_menu(); ?>

				</ul>
			<?php endif; ?>
		<?php echo close_menu(); ?>

	</ul>
</nav>
