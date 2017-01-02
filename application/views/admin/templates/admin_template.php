<!-- HTML <head> element -->
<?php $this->load->view('admin/layout/head_view'); ?>


<!-- MAIN SECTION -->
<main class="container-fluid">
	<div class="row">
		
		<!-- LEFT COLOUMN -->
		<div class="col-sm-2" id="leftCol">
			<!-- Include page navigation -->
			<?php $this->load->view('admin/layout/nav_view'); ?>
		</div><!-- /#leftCol -->


		
		<!-- RIGHT COLOUMN -->
		<div id="rightCol" class="col-sm-10">
			<div class="row">
				<?php $this->load->view('admin/layout/header_view'); ?>
			</div><!-- /.row -->


			<div class="row">
				<?php if(isset($main_view)){$this->load->view('admin/' . $main_view);} ?>
			</div><!-- /.row -->
			
		</div><!-- /#rightCol -->


	</div><!-- .row -->
</main>


<!-- PAGE FOOTER -->
<?php $this->load->view('admin/layout/footer_view'); ?>