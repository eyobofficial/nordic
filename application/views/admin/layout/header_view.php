<nav id="adminHeader" class="navbar navbar-default">
	<div class="container-fluid">

		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			 </button>
		</div><!-- /.navbar-header -->
		
		
		<div id="menu" class="collapse navbar-collapse" >

			<!-- Left Side - Quick Links -->
			<ul class="topIcons shortcuts list-inline list-unstyled col-sm-6">
				<li><a href="add_event.php"><span class="glyphicon glyphicon-plus"></span> Add Event</a></li>
				<li><a href="all_users.php"><span class="glyphicon glyphicon-user"></span> Manage Users</a></li>
				<li><a href="general_settings.php"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
			</ul>


			<!-- Right Side - Account & Message -->
			<ul class="topIcons notifications list-inline list-unstyled col-sm-6 navbar-right text-right">
				<li><a href="#">Welcome <?php echo "John Doe"; ?></a> </li> /
				<li><a href="#"><span class="fa fa-bell-o"></span> <sup><span class="badge">2</span></sup> </a> </li> /
				<li><a href="#"><span class="fa fa-envelope-o"></span> <sup><span class="badge">2</span></sup> </a> </li> /
				<li><a href="<?php echo site_url(); ?>" target="_blank">Visit Site</a> </li> /
				<li><a href="#"> Sign Out</a></li>
			</ul>
		</div><!-- /#menu -->

		
	</div><!-- /.container-fluid -->
</header>