<div id="brand-container">
	<h1><a href="<?php echo site_url('admin/'); ?>" title="Admin"><?php echo strtoupper($site_name); ?></a></h1>
</div>


<!-- AMDIN PAGE NAVIGATION -->
<nav class="row" id="sideNav">
	<ul class="list-unstyled">
	
		<!-- MANAGE DASHBOARD -->
		<?php echo open_menu($page_section, 'dashboard'); ?>
			<a href="<?php echo site_url('admin/dashboard'); ?>">
				<span class="fa fa-home push-left"></span> &nbsp; &nbsp; Dashboard <span class="fa fa-chevron-down pull-right"></span>
			</a>
		<?php echo close_menu(); ?>

	
		<!-- MANAGE CATAGORIES -->
		<?php echo open_menu($page_section, 'catagories'); ?>
			<a href="<?php echo site_url('admin/catagories'); ?>">
				<span class="fa fa-book push-left"></span> &nbsp; &nbsp; Catagories <span class="fa fa-chevron-down pull-right"></span>
			</a>


		<?php echo close_menu(); ?><!-- /End MANAGE CATAGORIES -->

			<?php if(is_active($page_section, 'catagories')): ?>
				<ul class="submenu list-unstyled">
					<?php echo open_menu($page_title, 'Add Catagory'); ?>
						<a href="<?php echo site_url('admin/catagories/add'); ?>"> Add Catagory </a>
					<?php echo close_menu(); ?>

				</ul>
			<?php endif; ?>



		<!-- MANAGE EVENTS -->
		<?php echo open_menu($page_section, 'events'); ?>
			<a href="#">
				<span class="fa fa-glass push-left"></span> &nbsp; &nbsp; Events <span class="fa fa-chevron-down pull-right"></span>
			</a>
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


		<!-- MANAGE SETTINGS -->
		<li  <?php if(isset($page_section) && strtolower($page_section) == 'settings'): ?> class="active" <?php endif; ?>>
			<a href="#">
				<span class="fa fa-sliders push-left"></span> &nbsp; &nbsp;
				settings
				<span class="fa fa-chevron-down pull-right"></span>
			</a>
		</li>
	</ul>
</nav>
