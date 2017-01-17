<section class="col-sm-12">

	<!-- TITLE HEADER -->
	<header>
		<h2 class="h4 text-left actionTitle"><span class="fa fa-book"></span>&nbsp; <?php echo $catagory->default_title; ?></h1>
	</header>

	
	<!-- VALIDATION ERRORS -->
	<?php if(!empty(validation_errors())): ?>
	<div class="panel panel-danger">
		<div class="panel-body">
			<?php echo validation_errors(); ?>
		</div>
	</div>
    <?php endif; ?>

	
	<article class="subsection row">

		<!-- EVENT DETAILS -->
		<div class="col-sm-12" id="catDetails">
			<div class="panel panel-warning panel-md">
				<div class="panel-heading">
					<strong>Catagory Details</strong>

					<span class="pull-right">

						<!-- Button(link) trigger modal -->
						<a href="#" type="button" data-toggle="modal" data-target="#editDetailsModal" title="Edit Event">
							<span class="fa fa-gear"></span> Edit
						</a>

						<!-- modal -->
						<?php $this->load->view('admin/catagory/modals/edit_details_modal'); ?>
						
					</span>
				</div><!-- /.panel-heading -->

				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-invisible table-dl">
							<tr>
								<td class="td-xs">Title: </td>
								<td><?php echo $catagory->default_title; ?></td>
							</tr>

							<tr>
								<td class="td-xs">Event Count: </td>
								<td>5</td>
							</tr>

							<tr>
								<td class="td-xs">Description: </td>
								<td>
									<p><?php echo $catagory->default_summary; ?></p>
								</td>
							</tr>

						</table>
					</div>
				</div><!-- /.panel-body -->
			</div>
		</div><!-- /.col-sm-6 -->
		



		<!-- DEFAULT CATAGORY PHOTO -->
		<div class="col-sm-6" id="catPhoto">
			<div class="panel panel-warning panel-md">
				<div class="panel-heading">
					<strong>Default Photo</strong>

					<span class="pull-right">

						<!-- Button(link) trigger modal -->
						<a href="#" type="button" data-toggle="modal" data-target="#catPhotoModal" title="Update Photo">
							<span class="fa fa-gear"></span> Edit
						</a>

						<!-- modal -->
						<?php $this->load->view('admin/catagory/modals/cat_photo_modal'); ?>
						
					</span>
				</div><!-- /.panel-heading -->

				<div class="panel-body">
					

					<!-- PHOTO CONTAINERS GOES HERE -->


				</div><!-- /.panel-body -->
			</div>
		</div><!-- /.col-sm-6 -->

		<!-- LANGUAGE TRANSLATION -->
		<div class="col-sm-6" id="eventDetails">
			<div class="panel panel-warning panel-md">
				<div class="panel-heading">
					<strong>Language Translations</strong>

					<span class="pull-right">
						
						<!-- Button(link) trigger modal -->
						<a href="#" type="button" data-toggle="modal" data-target="#addLangModal" title="Add Translations">
							<span class="fa fa-plus"></span> Add
						</a>
			

						<!-- add translations modal -->
						<?php $this->load->view('admin/catagory/modals/add_lang_modal'); ?>
						
					</span>
				</div><!-- /.panel-heading -->

			<div class="table-responsive">
				<table class="table table-striped table-hover listTable">
					
					<!-- LANGAUGES TRANSLATIONS -->
					<?php foreach($translations as $translation): ?>
						<?php $lang = $this->Lang_model->get($translation->lang_id); ?>
						<tr>
							<td><?php echo $lang->name; ?></td>
							<td><?php echo $lang->abbr; ?></td>
							<td class="text-center"><i><?php $translation->title; ?></i></td>
							<td class="text-center">
							<!-- Button(link) trigger modal -->
							<a href="#" type="button" data-toggle="modal" data-target="#editLangModal" title="Edit Translations">
								<span class="fa fa-gear"></span> Edit
							</a>
						</td>
						</tr>
					<?php endforeach; ?>

					
					
				</table>
			</div><!-- /.table-resposive -->
			</div>
		</div><!-- /.col-sm-6 -->


	</article><!-- /.subsection -->
	

</section>